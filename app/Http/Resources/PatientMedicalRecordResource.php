<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientMedicalRecordResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "patient_name" => $this->patient_name,
            "mri" => $this->mri,
            "ct_scan" => $this->ct_scan,
            "chest" => $this->chest,
            "lumbo_sacral_vertebrae" => $this->lumbo_sacral_vertebrae,
            "shoulder_joint" => $this->shoulder_joint,
            "pelvic_joint" => $this->pelvic_joint,
            "humerus" => $this->humerus,
            "fingers" => $this->fingers,
            "cervical_vertebrae" => $this->cervical_vertebrae,
            "thoraco_lumbar_vertebrae" => $this->thoraco_lumbar_vertebrae,
            "elbow_joint" => $this->elbow_joint,
            "hip_joint" => $this->hip_joint,
            "radius_or_ulner" => $this->radius_or_ulner,
            "toes" => $this->toes,
            "thoracic_vertebrae" => $this->thoracic_vertebrae,
            "wrist_joint" => $this->wrist_joint,
            "knee_joint" => $this->knee_joint,
            "femoral" => $this->femoral,
            "foot" => $this->foot,
            "lumvar_vertebrae" => $this->lumvar_vertebrae,
            "thoracic_inlet" => $this->thoracic_inlet,
            "sacro_lliac_joint" => $this->sacro_lliac_joint,
            "ankle" => $this->ankle,
            "tibia_or_fibula" => $this->tibia_or_fibula,
            "obstetric" => $this->obstetric,
            "abdioninal" => $this->abdioninal,
            "pelvis" => $this->pelvis,
            "prostrate" => $this->prostrate,
            "breast" => $this->breast,
            "thyroid" => $this->thyroid,
        ];
    }
}
