<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bone_marrow_examination_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/HM/FOM-005');

            // Top fields
            $table->string('patient_name')->nullable();
            $table->string('lab_number')->nullable();
            $table->string('age_sex')->nullable();
            $table->date('exam_date')->nullable();
            $table->string('ref_doctor')->nullable();
            $table->string('time')->nullable();
            $table->string('client_name')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('client_code')->nullable();

            // Clinical history
            $table->text('clinical_history')->nullable();

            // CBC fields
            $table->string('hemoglobin')->nullable();
            $table->string('rbc_count')->nullable();
            $table->string('mcv')->nullable();
            $table->string('rdw')->nullable();
            $table->string('total_leukocyte_count')->nullable();
            $table->string('differential_leukocyte_count')->nullable();
            $table->string('platelet_count')->nullable();

            // Peripheral smear
            $table->text('peripheral_smear_findings')->nullable();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->index('lab_number', 'bme_lab_number_idx');
            $table->index('exam_date', 'bme_exam_date_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bone_marrow_examination_forms');
    }
};
