<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * TDPL/GE/FOM-005 - Analyte Calibration Form
     */
    public function up(): void
    {
        Schema::create('analyte_calibration_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/GE/FOM-005');

            // Filters
            $table->string('location')->nullable();
            $table->string('department')->nullable();

            // Form fields
            $table->date('calibration_date')->nullable();
            $table->string('parameters')->nullable();
            $table->string('calibrator_used')->nullable();
            $table->string('lot_no')->nullable();

            // QC Levels
            $table->string('level1')->nullable();
            $table->string('level1_status')->nullable();
            $table->string('level2')->nullable();
            $table->string('level2_status')->nullable();
            $table->string('level3')->nullable();
            $table->string('level3_status')->nullable();

            // Signatures
            $table->string('lab_staff_sign')->nullable();
            $table->string('supervisor_sign')->nullable();

            // Audit fields
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->timestamps();

            // Foreign keys
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analyte_calibration_forms');
    }
};
