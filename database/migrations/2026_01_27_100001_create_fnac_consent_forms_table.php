<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * TDPL/CY/FOM-002 - Consent Form for FNAC
     */
    public function up(): void
    {
        Schema::create('fnac_consent_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/CY/FOM-002');

            // Consent Details
            $table->string('consent_name')->nullable(); // Person giving consent
            $table->string('test_area')->nullable(); // Area for FNAC procedure

            // Patient & Doctor Information
            $table->string('patient_name')->nullable();
            $table->string('doctor_name')->nullable();

            // Signatures
            $table->string('patient_signature')->nullable();
            $table->string('doctor_signature')->nullable();

            // Date
            $table->date('date')->nullable();

            // Audit fields
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->timestamps();

            // Foreign keys
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fnac_consent_forms');
    }
};
