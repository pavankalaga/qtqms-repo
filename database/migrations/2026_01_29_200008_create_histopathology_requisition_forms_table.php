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
        Schema::create('histopathology_requisition_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->nullable();
            $table->string('sin_no')->nullable();

            // Patient Information
            $table->string('patient_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('sex')->nullable();
            $table->string('mobile')->nullable();

            // Client & Referral Information
            $table->string('client_name')->nullable();
            $table->string('client_code')->nullable();
            $table->string('ref_doctor')->nullable();
            $table->date('ref_date')->nullable();

            // Clinical Information
            $table->text('specimen_site')->nullable();
            $table->text('clinical_history')->nullable();
            $table->text('additional_data')->nullable();
            $table->text('clinical_diagnosis')->nullable();

            // Specimen Type
            $table->boolean('specimen_large')->default(false);
            $table->boolean('specimen_medium')->default(false);
            $table->boolean('specimen_small')->default(false);
            $table->string('specimen_misc')->nullable();
            $table->text('ihc_markers')->nullable();
            $table->text('special_stains')->nullable();

            // Fixation
            $table->string('fixation')->nullable();

            // Specimen Details Table
            $table->json('type_selected')->nullable();
            $table->string('test_code_small')->nullable();
            $table->string('test_code_medium')->nullable();
            $table->string('test_code_large')->nullable();
            $table->string('test_code_complex')->nullable();
            $table->string('small_other')->nullable();
            $table->string('medium_other')->nullable();
            $table->string('large_other')->nullable();
            $table->string('complex_other')->nullable();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histopathology_requisition_forms');
    }
};
