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
        Schema::create('laboratory_incident_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/GE/FOM-018');
            $table->string('incident_date_patient_id')->nullable();
            $table->string('report_filed_by')->nullable();
            $table->text('complaint_identification')->nullable();
            $table->string('department_involved')->nullable();
            $table->text('incident_description')->nullable();
            $table->text('damage_description')->nullable();
            $table->text('root_cause_description')->nullable();
            $table->text('corrective_action')->nullable();
            $table->text('management_decision')->nullable();
            $table->string('signature_quality_manager')->nullable();
            $table->string('signature_lab_head')->nullable();
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
        Schema::dropIfExists('laboratory_incident_forms');
    }
};
