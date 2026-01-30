<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('atcc_strain_qc_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->nullable();

            $table->date('row_date')->nullable();
            $table->text('atcc_info')->nullable();
            $table->text('characteristics')->nullable();
            $table->string('antibiotic_name')->nullable();
            $table->string('expected_zone')->nullable();
            $table->string('obtained_zone')->nullable();
            $table->string('done_by')->nullable();
            $table->text('capa')->nullable();
            $table->text('approved_by')->nullable();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->index(['doc_no', 'row_date'], 'atcc_strain_qc_docno_date_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('atcc_strain_qc_forms');
    }
};
