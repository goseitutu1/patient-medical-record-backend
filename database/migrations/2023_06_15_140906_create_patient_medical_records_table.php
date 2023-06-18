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
            $table->string('patient_name')->nullable();
            $table->boolean('chest')->nullable()->default(false);
            $table->boolean('lumbo_sacral_vertebrae')->nullable()->default(false);
            $table->boolean('shoulder_joint')->nullable()->default(false);
            $table->boolean('pelvic_joint')->nullable()->default(false);
            $table->boolean('humerus')->nullable()->default(false);
            $table->boolean('fingers')->nullable()->default(false);
            $table->boolean('cervical_vertebrae')->nullable()->default(false);
            $table->boolean('thoraco_lumbar_vertebrae')->nullable()->default(false);
            $table->boolean('elbow_joint')->nullable()->default(false);
            $table->boolean('hip_joint')->nullable()->default(false);
            $table->boolean('radius_or_ulner')->nullable()->default(false);
            $table->boolean('toes')->nullable()->default(false);
            $table->boolean('thoracic_vertebrae')->nullable()->default(false);
            $table->boolean('wrist_joint')->nullable()->default(false);
            $table->boolean('knee_joint')->nullable()->default(false);
            $table->boolean('femoral')->nullable()->default(false);
            $table->boolean('foot')->nullable()->default(false);
            $table->boolean('lumvar_vertebrae')->nullable()->default(false);
            $table->boolean('thoracic_inlet')->nullable()->default(false);
            $table->boolean('sacro_lliac_joint')->nullable()->default(false);
            $table->boolean('ankle')->nullable()->default(false);
            $table->boolean('tibia_or_fibula')->nullable()->default(false);
            $table->boolean('obstetric')->nullable()->default(false);
            $table->boolean('abdioninal')->nullable()->default(false);
            $table->boolean('pelvis')->nullable()->default(false);
            $table->boolean('prostrate')->nullable()->default(false);
            $table->boolean('breast')->nullable()->default(false);
            $table->boolean('thyroid')->nullable()->default(false);
            $table->string('ct_scan')->nullable();
            $table->string('mri')->nullable();
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
