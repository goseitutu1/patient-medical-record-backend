<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    public function login(Request $request){

        $validator = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required|min:6"
        ]);

        if ($validator->fails()) {
            return response()->json(['Errors' => $validator->errors()], 422);
        }

        try {
            if (auth()->attempt(['email' => request('email'), 'password' => request('password')])) {
                $user = auth()->user();
                $token = $user->createToken('patient')->accessToken;

                return response()->json(
                    [
                        "user_information" => new UserResource($user),
                        "auth_token" => $token
                    ]
                );
            }
            else {
                return response()->json(['message' => "Illegal login attempt"], 401);
            }
        }
        catch (\Exception $exception){
            Log::channel('app_error')->error("LOGIN: ".$exception->getMessage());

            return response()->json(['message' => "Login failed. Kindly contact administrator"], 401);
        }
    }

    public function signup(Request $request){

        $validator = Validator::make($request->all(), [
            "email" => "required|email|unique:users",
            "full_name" => "required",
            "password" => "required|min:6|confirmed"
        ]);

        if ($validator->fails()) {
            return response()->json(['Errors' => $validator->errors()], 422);
        }

        try {
            DB::beginTransaction();

            $new_user = User::create([
                "email" => request("email"),
                "password" => bcrypt(request("password")),
                "name" => ucwords(request("full_name"))
            ]);

            $token = $new_user->createToken('patient')->accessToken;

            DB::commit();

            return response()->json(
                [
                    "user_information" => new UserResource($new_user),
                    "auth_token" => $token
                ]
            );
        }
        catch (\Exception $exception){
            DB::rollback();

            Log::channel('app_error')->error("SIGNUP: ".$exception->getMessage());

            return response()->json(["Errors" => "Signup failed. Kindly contact administrator"], 401);
        }
    }
}
