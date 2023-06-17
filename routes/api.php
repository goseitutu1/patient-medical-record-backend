<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::post('/signup',[\App\Http\Controllers\AuthenticationController::class,'signup'])->name('signup');
Route::post('/login',[\App\Http\Controllers\AuthenticationController::class,'login'])->name('login');


Route::namespace('Auth')->middleware('auth:api')->group(function(){
    Route::post('/edit-patient-medical-record',[\App\Http\Controllers\PatientMedicalRecordController::class,'editPatientMedicalRecord'])->name('edit.patient.medical.record');
    Route::post('/create-patient-medical-record',[\App\Http\Controllers\PatientMedicalRecordController::class,'createPatientMedicalRecord'])->name('create.patient.medical.record');
    Route::get('/get-patient-medical-record',[\App\Http\Controllers\PatientMedicalRecordController::class,'getPatientMedicalRecord'])->name('get.patient.medical.record');
    Route::get('/get-all-medical-records',[\App\Http\Controllers\PatientMedicalRecordController::class,'getAllMedicalRecords'])->name('get.all.medical.records');
});
