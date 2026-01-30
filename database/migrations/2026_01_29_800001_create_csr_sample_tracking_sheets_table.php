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
        Schema::create('csr_sample_tracking_sheets', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->nullable();
            $table->string('department')->nullable();
            $table->string('location')->nullable();
            $table->date('row_date')->nullable();

            // Header fields (per-trip info, stored on each row)
            $table->string('csr_name')->nullable();
            $table->string('route')->nullable();
            $table->string('route_start_time')->nullable();
            $table->string('start_km')->nullable();
            $table->string('end_km')->nullable();
            $table->string('total_km')->nullable();

            // Row-level fields (per-client stop)
            $table->string('client_name')->nullable();
            $table->string('client_code')->nullable();
            $table->string('barcode')->nullable();
            $table->string('work_order')->nullable();
            $table->string('trf')->nullable();
            $table->string('clinical_history')->nullable();
            $table->string('sample_volume')->nullable();
            $table->string('temp_pickup')->nullable();
            $table->string('temp_drop')->nullable();
            $table->string('client_signature')->nullable();
            $table->string('pickup_time')->nullable();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->index(['row_date', 'department', 'location'], 'csr_tracking_lookup_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('csr_sample_tracking_sheets');
    }
};
