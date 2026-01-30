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
        Schema::create('inter_department_sample_transfer_registers', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/GE/REG-005');
            $table->string('location')->nullable();
            $table->string('barcode')->nullable();
            $table->datetime('sample_received_datetime')->nullable();
            $table->string('parameter')->nullable();
            $table->string('from_department')->nullable();
            $table->string('to_department')->nullable();
            $table->datetime('sample_processed_datetime')->nullable();
            $table->string('handed_over_by')->nullable();
            $table->string('receiving_sign')->nullable();
            $table->string('verified_by')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            // Indexes for faster queries (using short names to avoid MySQL 64-char limit)
            $table->index('location', 'idstr_location_idx');
            $table->index('barcode', 'idstr_barcode_idx');
            $table->index('sample_received_datetime', 'idstr_received_dt_idx');
            $table->index('from_department', 'idstr_from_dept_idx');
            $table->index('to_department', 'idstr_to_dept_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inter_department_sample_transfer_registers');
    }
};
