<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * TDPL/GE/FOM-010 - Daily Cleaning Checklist for Lab
     */
    public function up(): void
    {
        Schema::create('daily_cleaning_checklist_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/GE/FOM-010');

            // Filters
            $table->string('month_year', 7); // Format: 2026-01
            $table->string('department')->nullable();
            $table->string('location')->nullable();

            // Daily data stored as JSON
            // Structure: { "floor_0_1": "Y", "floor_0_2": "Y", ... "lab_staff_signature_1": "ABC", ... }
            $table->json('daily_data')->nullable();

            // Audit fields
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->timestamps();

            // Foreign keys
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');

            // Index for filter queries
            $table->index(['month_year', 'department', 'location'], 'dcc_month_dept_loc_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_cleaning_checklist_forms');
    }
};
