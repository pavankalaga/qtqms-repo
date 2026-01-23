<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cg_cytogenetics_consents', function (Blueprint $table) {
            $table->id();

            // Consent checkboxes
            $table->boolean('consent_karyotype')->default(false);
            $table->boolean('consent_fish')->default(false);

            // Patient / Authorized Representative
            $table->string('patient_signature')->nullable();
            $table->string('patient_full_name')->nullable();
            $table->date('patient_date')->nullable();
            $table->string('patient_time')->nullable();

            // Person Obtaining Consent
            $table->string('obtainer_signature')->nullable();
            $table->string('obtainer_full_name')->nullable();
            $table->date('obtainer_date')->nullable();
            $table->string('obtainer_time')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cg_cytogenetics_consents');
    }
};
