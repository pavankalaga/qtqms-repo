<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * TDPL/GE/FOM-006 - Biomedical Waste Disposal Form
     * Stores daily data as JSON (1-31 days per month)
     */
    public function up(): void
    {
        Schema::create('biomedical_waste_disposal_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/GE/FOM-006');

            // Filters (unique per month)
            $table->string('month_year', 7); // Format: 2026-01
            $table->string('agency_name')->nullable();

            // Daily data stored as JSON
            // Structure: { "1": { red, red_weight, yellow, yellow_weight, blue, blue_weight, sharp, sharp_weight, handover_signature, handler_signature }, "2": {...}, ... }
            $table->json('daily_data')->nullable();

            // Audit fields
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->timestamps();

            // Foreign keys
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');

            // Unique constraint - one record per month
            $table->unique(['month_year', 'agency_name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biomedical_waste_disposal_forms');
    }
};
