<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientMedicalRecord extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'patient_medical_records';
    protected $fillable = [ 'patient_name', 'mri' , 'ct_scan','chest','lumbo_sacral_vertebrae', "shoulder_joint", "pelvic_joint",
        "humerus", "fingers", "cervical_vertebrae", "thoraco_lumbar_vertebrae", "elbow_joint", "hip_joint" , "radius_or_ulner" ,
        "toes", "thoracic_vertebrae", "wrist_joint" , "knee_joint", "femoral", "foot" , "lumvar_vertebrae", "thoracic_inlet",
        "sacro_lliac_joint", "ankle", "tibia_or_fibula", "obstetric", "abdioninal", "pelvis", "prostrate", "breast", "thyroid"
    ];
}
