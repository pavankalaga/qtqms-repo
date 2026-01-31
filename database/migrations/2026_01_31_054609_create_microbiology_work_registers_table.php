<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('microbiology_work_registers', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->nullable();

            $table->date('row_date')->nullable();
            $table->string('barcode')->nullable();
            $table->string('patient_name')->nullable();
            $table->string('age_gender')->nullable();
            $table->string('investigation')->nullable();
            $table->string('sample_type')->nullable();
            $table->string('sample_received_dt')->nullable();
            $table->string('sample_received_by')->nullable();
            $table->string('sample_processing_dt')->nullable();
            $table->string('sample_processed_by')->nullable();
            $table->text('observations')->nullable();
            $table->string('hod_signature')->nullable();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->index(['doc_no', 'row_date'], 'micro_work_reg_docno_date_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('microbiology_work_registers');
    }
};
