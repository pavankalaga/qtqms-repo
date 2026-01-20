<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('hot_plate_qc_forms', function (Blueprint $table) {
            $table->id();

            // Header fields
            $table->date('month_year'); // stores YYYY-MM-01
            $table->string('instrument_serial_no')->nullable();

            // QC rows (31 days stored as JSON)
            $table->json('cleaning_outside')->nullable();
            $table->json('temperature_check')->nullable();
            $table->json('lab_staff_signature')->nullable();
            $table->json('lab_supervisor_signature')->nullable();

            // Common form tracking (optional but recommended)
            $table->string('form_id')->nullable(); // TDPL/BE/FOM-0##
            $table->string('doc_no')->nullable();
            $table->string('issue_no')->nullable();
            $table->date('issue_date')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hot_plate_qc_forms');
    }
};
