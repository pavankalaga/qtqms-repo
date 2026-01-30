<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * TDPL/CY/FOM-001 - Cytopathology Requisition Form
     */
    public function up(): void
    {
        Schema::create('cytopathology_requisition_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/CY/FOM-001');

            // Basic Information
            $table->string('lab_no')->nullable();
            $table->date('date')->nullable();
            $table->string('name')->nullable(); // Patient name
            $table->date('dob')->nullable(); // Date of birth
            $table->enum('sex', ['Male', 'Female'])->nullable();
            $table->string('mobile')->nullable();
            $table->string('client_name')->nullable();
            $table->string('client_code')->nullable();
            $table->string('ref_doctor')->nullable(); // Referring doctor

            // Gynae Cytology (checkboxes stored as JSON)
            // Options: Conventional Pap Smear, Thin Prep, L.B.C
            $table->json('gynae')->nullable();

            // Non-Gynae Cytology (checkboxes stored as JSON)
            // Options: Ascitic/Peritoneal Fluid, Pleural Fluid, CSF, Urine, Pericardial, Others
            $table->json('non_gynae')->nullable();

            // Clinical Features (checkboxes stored as JSON)
            // Options: Normal, Post Menopausal, Suspicious Lesions, Others
            $table->json('clinical_features')->nullable();

            // Site of Sample (checkboxes stored as JSON)
            // Options: Cervix, Endocervix, Post Fornix, Lat. Vaginal Wall, Vault, Others, Bronchial Brush, BAL Fluid, Sputum
            $table->json('sample_site')->nullable();

            // History (checkboxes stored as JSON)
            // Options: Post Menopausal, HRT, Others
            $table->json('history')->nullable();

            // Nipple Discharge (checkboxes stored as JSON)
            // Options: Right, Left, Both
            $table->json('nipple')->nullable();

            // LMP & FNAC
            $table->date('lmp')->nullable(); // Last Menstrual Period
            $table->string('fnac')->nullable();

            // Miscellaneous - Site & Provisional Diagnosis
            $table->text('misc')->nullable();

            // Relevant Details
            $table->text('details')->nullable();

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
        Schema::dropIfExists('cytopathology_requisition_forms');
    }
};
