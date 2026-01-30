<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nucleic_acid_extraction_registers', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->nullable();
            $table->date('row_date')->nullable();
            $table->string('time_of_sample_receipt')->nullable();
            $table->string('extraction_kit_lot_no')->nullable();
            $table->string('total_number_of_samples')->nullable();
            $table->string('sample_barcode')->nullable();
            $table->string('performed_by')->nullable();
            $table->string('verified_by')->nullable();
            $table->text('remarks')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->index(['row_date'], 'nucleic_acid_ext_date_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nucleic_acid_extraction_registers');
    }
};
