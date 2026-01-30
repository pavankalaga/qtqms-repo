<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * TDPL/GE/FOM-003 - Sample Rejection Form
     */
    public function up(): void
    {
        Schema::create('sample_rejection_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/GE/FOM-003');

            // Filter fields
            $table->string('month_year')->nullable();
            $table->string('location')->nullable();
            $table->string('department')->nullable();

            // Form fields
            $table->datetime('date_time')->nullable();
            $table->string('patient_barcode')->nullable();
            $table->string('parameter')->nullable();
            $table->string('collected_by')->nullable();
            $table->string('sample_type')->nullable();
            $table->string('reason_rejection')->nullable();
            $table->string('informed_by_name')->nullable();
            $table->string('informed_by_sign')->nullable();
            $table->string('informed_to_csd')->nullable();
            $table->string('fresh_sample_yes_no')->nullable();
            $table->string('new_barcode')->nullable();

            // Audit fields
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->timestamps();

            // Foreign keys
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');

            // Index for filter queries
            $table->index(['month_year', 'location', 'department']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sample_rejection_forms');
    }
};
