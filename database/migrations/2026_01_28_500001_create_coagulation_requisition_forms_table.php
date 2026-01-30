<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('coagulation_requisition_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/HM/FOM-006');

            // Basic info
            $table->string('lab_no')->nullable();
            $table->date('form_date')->nullable();
            $table->string('specimen_type')->nullable();
            $table->string('specimen_time')->nullable();

            // Patient info
            $table->string('patient_name')->nullable();
            $table->string('age')->nullable();
            $table->string('sex')->nullable();
            $table->string('tel_patient')->nullable();
            $table->string('tel_physician')->nullable();

            // Clinical History (Yes/No fields)
            $table->string('clinical_0')->nullable(); // Bleeding Disorder
            $table->string('clinical_1')->nullable(); // Congenital (Bleeding)
            $table->string('clinical_2')->nullable(); // Acquired (Bleeding)
            $table->string('clinical_3')->nullable(); // Thrombotic Disorder
            $table->string('clinical_4')->nullable(); // Congenital (Thrombotic)
            $table->string('clinical_5')->nullable(); // Acquired (Thrombotic)
            $table->string('clinical_6')->nullable(); // History of blood transfusion

            // Transfusion details
            $table->date('last_transfusion_date')->nullable();
            $table->string('transfusion_type')->nullable();

            // Lab Investigation History
            $table->string('lab_0')->nullable(); // Prothrombin Time
            $table->string('lab_0_value')->nullable();
            $table->string('lab_1')->nullable(); // APTT
            $table->string('lab_1_value')->nullable();

            // Liver function
            $table->string('liver_function')->nullable();
            $table->string('liver_function_note')->nullable();
            $table->text('others_specify')->nullable();

            // Drug/Medication history
            $table->string('current_dose')->nullable();
            $table->date('dose_change_date')->nullable();

            // Drugs (Yes/No with notes)
            $table->string('drug_0')->nullable(); // Warfarin / Acetrom
            $table->string('drug_0_notes')->nullable();
            $table->string('drug_1')->nullable(); // Hirudin
            $table->string('drug_1_notes')->nullable();
            $table->string('drug_2')->nullable(); // Coumarin
            $table->string('drug_2_notes')->nullable();
            $table->string('drug_3')->nullable(); // Others
            $table->string('drug_3_notes')->nullable();

            // Heparin
            $table->string('heparin_0')->nullable(); // Low Molecular Weight
            $table->string('heparin_0_notes')->nullable();
            $table->string('heparin_1')->nullable(); // Unfractionated
            $table->string('heparin_1_notes')->nullable();

            // Surgery
            $table->string('major_surgery')->nullable();

            // Diagnosis
            $table->text('probable_diagnosis')->nullable();

            // Footer
            $table->string('sample_collected_by')->nullable();
            $table->string('client_name_code')->nullable();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->index('lab_no', 'coag_req_lab_no_idx');
            $table->index('form_date', 'coag_req_form_date_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coagulation_requisition_forms');
    }
};
