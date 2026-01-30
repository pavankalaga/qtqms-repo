<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hiv_consent_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->nullable();

            // ---- English ----
            $table->string('patient_name')->nullable();
            $table->string('age')->nullable();
            $table->string('sex')->nullable();
            $table->date('form_date')->nullable();
            $table->text('address')->nullable();
            $table->string('mobile')->nullable();
            $table->string('lab_id')->nullable();
            $table->boolean('consent_given')->default(false);
            $table->string('doctor_name')->nullable();
            $table->string('doctor_address')->nullable();
            $table->string('doctor_contact')->nullable();
            $table->string('patient_signature')->nullable();
            $table->date('signature_date')->nullable();

            // ---- Hindi ----
            $table->string('patient_name_hi')->nullable();
            $table->string('age_hi')->nullable();
            $table->string('sex_hi')->nullable();
            $table->date('form_date_hi')->nullable();
            $table->text('address_hi')->nullable();
            $table->string('mobile_hi')->nullable();
            $table->string('lab_id_hi')->nullable();
            $table->boolean('consent_given_hi')->default(false);
            $table->string('doctor_name_hi')->nullable();
            $table->string('doctor_address_hi')->nullable();
            $table->string('doctor_contact_hi')->nullable();
            $table->string('patient_signature_hi')->nullable();
            $table->date('signature_date_hi')->nullable();

            // ---- Telugu ----
            $table->string('patient_name_te')->nullable();
            $table->string('age_te')->nullable();
            $table->string('sex_te')->nullable();
            $table->date('form_date_te')->nullable();
            $table->text('address_te')->nullable();
            $table->string('mobile_te')->nullable();
            $table->string('lab_id_te')->nullable();
            $table->boolean('consent_given_te')->default(false);
            $table->string('doctor_name_te')->nullable();
            $table->string('doctor_address_te')->nullable();
            $table->string('doctor_contact_te')->nullable();
            $table->string('patient_signature_te')->nullable();
            $table->date('signature_date_te')->nullable();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->index(['mobile'], 'hiv_consent_mobile_idx');
            $table->index(['mobile_hi'], 'hiv_consent_mobile_hi_idx');
            $table->index(['mobile_te'], 'hiv_consent_mobile_te_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hiv_consent_forms');
    }
};
