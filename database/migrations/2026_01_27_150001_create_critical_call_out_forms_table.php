<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * TDPL/GE/FOM-008 - Critical Call-Out Form
     */
    public function up(): void
    {
        Schema::create('critical_call_out_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/GE/FOM-008');

            // Form fields
            $table->date('call_date')->nullable();
            $table->string('patient_id')->nullable();
            $table->string('test_parameter')->nullable();
            $table->string('initial_value')->nullable();
            $table->string('cross_check_value')->nullable();
            $table->time('reporting_time')->nullable();
            $table->string('informed')->nullable();
            $table->string('readback_value')->nullable();
            $table->time('informing_time')->nullable();
            $table->string('person_sign')->nullable();

            // Audit fields
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->timestamps();

            // Foreign keys
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');

            // Index for filter queries
            $table->index('call_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('critical_call_out_forms');
    }
};
