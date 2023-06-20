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
            "mri" => request()->filled('mri') ? request()->get('mri') : 'N/A',
            "ct_scan" => request()->filled('ct_scan') ? request()->get('ct_scan') : 'N/A',
            "chest" => request()->filled('chest') ? request()->get('chest') : 0,
            "lumbo_sacral_vertebrae" => request()->filled('lumbo_sacral_vertebrae') ? request()->get('lumbo_sacral_vertebrae') : 0,
            "shoulder_joint" => request()->filled('shoulder_joint') ? request()->get('shoulder_joint') : 0,
            "pelvic_joint" => request()->filled('pelvic_joint') ? request()->get('pelvic_joint') : 0,
            "humerus" => request()->filled('humerus') ? request()->get('humerus') : 0,
            "fingers" => request()->filled('fingers') ? request()->get('fingers') : 0,
            "cervical_vertebrae" => request()->filled('cervical_vertebrae') ? request()->get('cervical_vertebrae') : 0,
            "thoraco_lumbar_vertebrae" => request()->filled('thoraco_lumbar_vertebrae') ? request()->get('thoraco_lumbar_vertebrae') : 0,
            "elbow_joint" => request()->filled('elbow_joint') ? request()->get('elbow_joint') : 0,
            "hip_joint" => request()->filled('hip_joint') ? request()->get('hip_joint') : 0,
            "radius_or_ulner" => request()->filled('radius_or_ulner') ? request()->get('radius_or_ulner') : 0,
            "toes" => request()->filled('toes') ? request()->get('toes') : 0,
            "thoracic_vertebrae" => request()->filled('thoracic_vertebrae') ? request()->get('thoracic_vertebrae') : 0,
            "wrist_joint" => request()->filled('wrist_joint') ? request()->get('wrist_joint') : 0,
            "knee_joint" => request()->filled('knee_joint') ? request()->get('knee_joint') : 0,
            "femoral" => request()->filled('femoral') ? request()->get('femoral') : 0,
            "foot" => request()->filled('foot') ? request()->get('foot') : 0,
            "lumvar_vertebrae" => request()->filled('lumvar_vertebrae') ? request()->get('lumvar_vertebrae') : 0,
            "thoracic_inlet" => request()->filled('thoracic_inlet') ? request()->get('humerus') : 0,
            "sacro_lliac_joint" => request()->filled('sacro_lliac_joint') ? request()->get('sacro_lliac_joint') : 0,
            "ankle" => request()->filled('ankle') ? request()->get('ankle') : 0,
            "tibia_or_fibula" => request()->filled('tibia_or_fibula') ? request()->get('tibia_or_fibula') : 0,
            "obstetric" => request()->filled('obstetric') ? request()->get('obstetric') : 0,
            "abdioninal" => request()->filled('abdioninal') ? request()->get('abdioninal') : 0,
            "pelvis" => request()->filled('pelvis') ? request()->get('pelvis') : 0,
            "prostrate" => request()->filled('prostrate') ? request()->get('prostrate') : 0,
            "breast" => request()->filled('breast') ? request()->get('breast') : 0,
            "thyroid" => request()->filled('thyroid') ? request()->get('thyroid') : 0,
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
