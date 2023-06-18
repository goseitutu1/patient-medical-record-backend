<?php

namespace App\Http\Controllers;

use App\Events\PatientMedicalRecordEvent;
use App\Http\Resources\PatientMedicalRecordResource;
use App\Mail\PatientMedicalRecordMail;
use App\Models\PatientMedicalRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class PatientMedicalRecordController extends Controller
{
    public function getPatientMedicalRecord(Request $request){
        $validator = Validator::make($request->all(), [
            "patient_id" => "required|integer",
        ]);

        if ($validator->fails()) {
            return response()->json(['Errors' => $validator->errors()], 422);
        }

        try {

            $patient_medical_record = PatientMedicalRecord::query()->where('id',request('patient_id'))->first();

            if (empty($patient_medical_record->id)){
                return response()->json(["Message" => "patient medical record not found."], 401);
            }

            return response()->json(
                [
                    "patient_medical_information" => new PatientMedicalRecordResource($patient_medical_record),
                ]
            );
        }
        catch (\Exception $exception){
            DB::rollback();

            Log::channel('app_error')->error("EDITING PATIENT MEDICAL RECORD: ".$exception->getMessage());

            return response()->json(["Errors" => "could not create patient medical record. Kindly contact administrator"], 401);
        }

    }

    public function getAllMedicalRecords(){

        $patient_medical_record = PatientMedicalRecord::query()->paginate(1);

        return response()->json(
            [
                "medical_records" => PatientMedicalRecordResource::collection($patient_medical_record),
                "total_medical_records" =>   $patient_medical_record->total(),
                "number_medical_records" =>   $patient_medical_record->perPage(),
                "last_page_number" =>   $patient_medical_record->lastPage(),
                "current_page"  =>   $patient_medical_record->currentPage(),
                "has_more_pages" =>  $patient_medical_record->hasMorePages(),
                "next_page_url" =>   $patient_medical_record->nextPageUrl(),
            ]
        );
    }

    public function editPatientMedicalRecord(Request $request){
        $validator = Validator::make($request->all(), [
            "patient_id" => "required|integer",
            "patient_name" => "required",
            "mri" => "nullable",
            "ct_scan" => "nullable",
            "chest" => "nullable",
            "lumbo_sacral_vertebrae" => "nullable",
            "shoulder_joint" => "nullable",
            "pelvic_joint" => "nullable",
            "humerus" => "nullable",
            "fingers" => "nullable",
            "cervical_vertebrae" => "nullable",
            "thoraco_lumbar_vertebrae" => "nullable",
            "elbow_joint" => "nullable",
            "hip_joint" => "nullable",
            "radius_or_ulner" => "nullable",
            "toes" => "nullable",
            "thoracic_vertebrae" => "nullable",
            "wrist_joint" => "nullable",
            "knee_joint" => "nullable",
            "femoral" => "nullable",
            "foot" => "nullable",
            "lumvar_vertebrae" => "nullable",
            "thoracic_inlet" => "nullable",
            "sacro_lliac_joint" => "nullable",
            "ankle" => "nullable",
            "tibia_or_fibula" => "nullable",
            "obstetric" => "nullable",
            "abdioninal" => "nullable",
            "pelvis" => "nullable",
            "prostrate" => "nullable",
            "breast" => "nullable",
            "thyroid" => "nullable",
        ]);

        if ($validator->fails()) {
            return response()->json(['Errors' => $validator->errors()], 422);
        }

        try {
            DB::beginTransaction();

            $patient_medical_record = PatientMedicalRecord::query()->where('id',request('patient_id'))->first();

            if (empty($patient_medical_record->id)){
                return response()->json(["Message" => "patient medical record not found."], 401);
            }

            $patient_medical_record->update($this->dBDumb());

            // notify kompletecare
            \event(new PatientMedicalRecordEvent($patient_medical_record));

            DB::commit();

            return response()->json(
                [
                    "patient_medical_information" => new PatientMedicalRecordResource($patient_medical_record),
                    "message" => "saved successfully",
                ]
            );
        }
        catch (\Exception $exception){
            DB::rollback();

            Log::channel('app_error')->error("EDITING PATIENT MEDICAL RECORD: ".$exception->getMessage());

            return response()->json(["Errors" => "could not create patient medical record. Kindly contact administrator"], 401);
        }

    }

    private function validateFields() : array
    {
        return [
            "patient_name" => "required",
            "mri" => "nullable",
            "ct_scan" => "nullable",
            "chest" => "nullable",
            "lumbo_sacral_vertebrae" => "nullable",
            "shoulder_joint" => "nullable",
            "pelvic_joint" => "nullable",
            "humerus" => "nullable",
            "fingers" => "nullable",
            "cervical_vertebrae" => "nullable",
            "thoraco_lumbar_vertebrae" => "nullable",
            "elbow_joint" => "nullable",
            "hip_joint" => "nullable",
            "radius_or_ulner" => "nullable",
            "toes" => "nullable",
            "thoracic_vertebrae" => "nullable",
            "wrist_joint" => "nullable",
            "knee_joint" => "nullable",
            "femoral" => "nullable",
            "foot" => "nullable",
            "lumvar_vertebrae" => "nullable",
            "thoracic_inlet" => "nullable",
            "sacro_lliac_joint" => "nullable",
            "ankle" => "nullable",
            "tibia_or_fibula" => "nullable",
            "obstetric" => "nullable",
            "abdioninal" => "nullable",
            "pelvis" => "nullable",
            "prostrate" => "nullable",
            "breast" => "nullable",
            "thyroid" => "nullable",
        ];
    }

    private function dBDumb() : array
    {
        return [
            "patient_name" => ucwords(request('patient_name')),
            "mri" => request('mri'),
            "ct_scan" => request('ct_scan'),
            "chest" => request('chest'),
            "lumbo_sacral_vertebrae" => request('lumbo_sacral_vertebrae'),
            "shoulder_joint" => request('shoulder_joint'),
            "pelvic_joint" => request('pelvic_joint'),
            "humerus" => request('humerus'),
            "fingers" => request('fingers'),
            "cervical_vertebrae" => request('cervical_vertebrae'),
            "thoraco_lumbar_vertebrae" => request('thoraco_lumbar_vertebrae'),
            "elbow_joint" => request('elbow_joint'),
            "hip_joint" => request('hip_joint'),
            "radius_or_ulner" => request('radius_or_ulner'),
            "toes" => request('toes'),
            "thoracic_vertebrae" => request('thoracic_vertebrae'),
            "wrist_joint" => request('wrist_joint'),
            "knee_joint" => request('knee_joint'),
            "femoral" => request('femoral'),
            "foot" => request('foot'),
            "lumvar_vertebrae" => request('lumvar_vertebrae'),
            "thoracic_inlet" => request('thoracic_inlet'),
            "sacro_lliac_joint" => request('sacro_lliac_joint'),
            "ankle" => request('ankle'),
            "tibia_or_fibula" => request('tibia_or_fibula'),
            "obstetric" => request('obstetric'),
            "abdioninal" => request('abdioninal'),
            "pelvis" => request('pelvis'),
            "prostrate" => request('prostrate'),
            "breast" => request('breast'),
            "thyroid" => request('thyroid'),
        ];
    }

    public function createPatientMedicalRecord(Request $request){
        $validator = Validator::make($request->all(), $this->validateFields());

        if ($validator->fails()) {
            return response()->json(['Errors' => $validator->errors()], 422);
        }

        try {
            DB::beginTransaction();

            $patient_medical_record = PatientMedicalRecord::create($this->dBDumb());

            // notify kompletecare
            \event(new PatientMedicalRecordEvent($patient_medical_record));

            DB::commit();

            return response()->json(
                [
                    "patient_medical_information" => new PatientMedicalRecordResource($patient_medical_record),
                    "message" => "saved successfully",
                ]
            );
        }
        catch (\Exception $exception){
            DB::rollback();

            Log::channel('app_error')->error("CREATING PATIENT MEDICAL RECORD: ".$exception->getMessage());

            return response()->json(["Errors" => "could not create patient medical record. Kindly contact administrator"], 401);
        }
    }
}
