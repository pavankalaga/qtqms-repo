<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cg_cytogenetics_trfs', function (Blueprint $table) {
            $table->id();

            // Patient
            $table->string('patient_name')->nullable();
            $table->string('patient_age')->nullable();
            $table->string('patient_gender')->nullable();
            $table->text('patient_address')->nullable();

            // Physician / collection
            $table->text('physician_address')->nullable();
            $table->string('physician_phone')->nullable();
            $table->string('hospital_lab')->nullable();
            $table->date('collection_date')->nullable();
            $table->string('collection_time')->nullable();
            $table->string('specimen_type')->nullable();

            // Sample receiving
            $table->dateTime('sample_received_at')->nullable();
            $table->string('sample_condition')->nullable();

            // Study requests
            $table->json('study_requests')->nullable();
            $table->string('study_other_details')->nullable();

            // Prenatal
            $table->json('prenatal_studies')->nullable();
            $table->string('prenatal_ultrasound_details')->nullable();
            $table->string('prenatal_other_details')->nullable();

            // Pediatric
            $table->json('pediatric_studies')->nullable();
            $table->string('pediatric_cardiac_details')->nullable();
            $table->string('pediatric_anomalies_details')->nullable();

            // Adult constitutional
            $table->json('adult_studies')->nullable();
            $table->string('familial_translocation_details')->nullable();
            $table->string('previous_child_details')->nullable();
            $table->string('adult_other_details')->nullable();

            // Additional questions
            $table->string('suspected_chromosome')->nullable();
            $table->text('study_indication')->nullable();
            $table->json('additional_conditions')->nullable();
            $table->string('suspected_trisomy')->nullable();

            $table->string('major_birth_defect')->nullable();
            $table->string('multiple_anomalies')->nullable();
            $table->string('parental_followup')->nullable();
            $table->string('other_notes')->nullable();

            // Oncology
            $table->string('oncology_diagnosis')->nullable();
            $table->enum('new_diagnosis', ['yes','no'])->nullable();
            $table->string('wbc')->nullable();
            $table->string('blasts_percentage')->nullable();
            $table->enum('repeat_study', ['yes','no'])->nullable();
            $table->enum('bone_marrow_transplant', ['yes','no'])->nullable();
            $table->enum('donor_sex', ['male','female'])->nullable();
            $table->enum('previous_therapy', ['yes','no'])->nullable();

            // Sample / study type
            $table->json('sample_types')->nullable();
            $table->json('study_categories')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cg_cytogenetics_trfs');
    }
};
