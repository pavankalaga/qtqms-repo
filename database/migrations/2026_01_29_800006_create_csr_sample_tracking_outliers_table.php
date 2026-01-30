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
        Schema::create('csr_sample_tracking_outliers', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->nullable();
            $table->date('row_date')->nullable();
            $table->string('client_name')->nullable();
            $table->string('client_code')->nullable();
            $table->string('barcode')->nullable();
            $table->string('work_order')->nullable();
            $table->string('trf')->nullable();
            $table->string('clinical_history')->nullable();
            $table->string('sample_volume')->nullable();
            $table->string('temp_pickup')->nullable();
            $table->string('temp_drop')->nullable();
            $table->text('observations')->nullable();
            $table->string('accession_signature')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->index(['row_date'], 'csr_outliers_date_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('csr_sample_tracking_outliers');
    }
};
