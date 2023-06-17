<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patient_medical_records', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->boolean('chest')->default(false);
            $table->boolean('lumbo_sacral_vertebrae')->default(false);
            $table->boolean('shoulder_joint')->default(false);
            $table->boolean('pelvic_joint')->default(false);
            $table->boolean('humerus')->default(false);
            $table->boolean('fingers')->default(false);
            $table->boolean('cervical_vertebrae')->default(false);
            $table->boolean('thoraco_lumbar_vertebrae')->default(false);
            $table->boolean('elbow_joint')->default(false);
            $table->boolean('hip_joint')->default(false);
            $table->boolean('radius_or_ulner')->default(false);
            $table->boolean('toes')->default(false);
            $table->boolean('thoracic_vertebrae')->default(false);
            $table->boolean('wrist_joint')->default(false);
            $table->boolean('knee_joint')->default(false);
            $table->boolean('femoral')->default(false);
            $table->boolean('foot')->default(false);
            $table->boolean('lumvar_vertebrae')->default(false);
            $table->boolean('thoracic_inlet')->default(false);
            $table->boolean('sacro_lliac_joint')->default(false);
            $table->boolean('ankle')->default(false);
            $table->boolean('tibia_or_fibula')->default(false);
            $table->boolean('obstetric')->default(false);
            $table->boolean('abdioninal')->default(false);
            $table->boolean('pelvis')->default(false);
            $table->boolean('prostrate')->default(false);
            $table->boolean('breast')->default(false);
            $table->boolean('thyroid')->default(false);
            $table->string('ct_scan');
            $table->string('mri');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_medical_records');
    }
};
