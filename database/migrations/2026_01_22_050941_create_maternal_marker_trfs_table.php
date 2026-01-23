<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('maternal_marker_trfs', function (Blueprint $table) {
            $table->id();

            // 🔹 Top Filter
            $table->string('filter_patient_mobile', 20)->nullable();

            // 🔹 Requester Information
            $table->string('physician_name')->nullable();
            $table->string('physician_mobile', 20)->nullable();
            $table->string('client_name')->nullable();
            $table->string('client_code')->nullable();

            // 🔹 Test Panels
            $table->json('test_panels')->nullable();

            // 🔹 Patient Details
            $table->string('patient_name')->nullable();
            $table->integer('patient_age')->nullable();
            $table->date('patient_dob')->nullable();
            $table->string('patient_mobile', 20)->nullable();
            $table->string('patient_email')->nullable();

            $table->decimal('patient_weight', 6, 2)->nullable();
            $table->string('ethnicity')->nullable();
            $table->date('lmp')->nullable();

            $table->string('diabetic_status')->nullable();
            $table->string('chronic_hypertension')->nullable();

            $table->string('on_medication')->nullable();
            $table->text('medication_details')->nullable();

            $table->string('smoking_status')->nullable();

            // 🔹 Blood Pressure
            $table->date('bp_date')->nullable();
            $table->string('bp_right')->nullable();
            $table->string('bp_left')->nullable();

            // 🔹 USG Details
            $table->date('sample_collection_date')->nullable();
            $table->time('sample_collection_time')->nullable();
            $table->date('ultrasound_date')->nullable();

            // 🔹 Marker Values
            $table->string('crl_a')->nullable();
            $table->string('crl_b')->nullable();

            $table->string('nt_a')->nullable();
            $table->string('nt_b')->nullable();

            $table->string('nb_a')->nullable();
            $table->string('nb_b')->nullable();

            $table->string('bpd_a')->nullable();
            $table->string('bpd_b')->nullable();

            // 🔹 Uterine Artery
            $table->string('uterine_left')->nullable();
            $table->string('uterine_right')->nullable();

            // 🔹 IVF Pregnancy
            $table->integer('donor_age')->nullable();
            $table->date('donor_dob')->nullable();
            $table->string('ivf_type')->nullable();

            $table->date('extraction_date')->nullable();
            $table->date('transfer_date')->nullable();
            $table->string('hcg_taken')->nullable();
            $table->date('hcg_date')->nullable();

            // 🔹 Consent
            $table->string('patient_signature')->nullable();
            $table->date('patient_signature_date')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('maternal_marker_trfs');
    }
};
