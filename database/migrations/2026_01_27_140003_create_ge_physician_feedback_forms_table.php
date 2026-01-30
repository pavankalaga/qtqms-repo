<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * TDPL/GE/FOM-007 - Physician Feedback Form (GE version)
     */
    public function up(): void
    {
        Schema::create('ge_physician_feedback_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/GE/FOM-007');

            // Filters
            $table->string('month_year', 7); // Format: 2026-01
            $table->string('client_code')->nullable();

            // Ratings stored as JSON
            $table->json('ratings')->nullable();

            // Additional fields
            $table->text('comments')->nullable();
            $table->string('doctor_name')->nullable();
            $table->string('doctor_signature')->nullable();

            // Audit fields
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->timestamps();

            // Foreign keys
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');

            // Index for filter queries
            $table->index(['month_year', 'client_code']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ge_physician_feedback_forms');
    }
};
