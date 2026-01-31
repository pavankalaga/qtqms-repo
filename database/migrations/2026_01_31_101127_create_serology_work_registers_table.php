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
        Schema::create('serology_work_registers', function (Blueprint $table) {
            $table->id();

            $table->date('form_date')->nullable();
            $table->string('barcode')->nullable();
            $table->string('patient_name')->nullable();
            $table->string('age_gender')->nullable();
            $table->string('investigation')->nullable();
            $table->string('sample_type')->nullable();
            $table->datetime('sample_received')->nullable();
            $table->string('sample_received_by')->nullable();
            $table->datetime('processing_datetime')->nullable();
            $table->string('processed_by')->nullable();
            $table->text('observations')->nullable();
            $table->string('hod_signature')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('serology_work_registers');
    }
};
