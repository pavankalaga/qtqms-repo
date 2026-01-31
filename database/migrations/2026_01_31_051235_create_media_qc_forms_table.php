<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media_qc_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->nullable();

            $table->date('row_date')->nullable();
            $table->text('product_info')->nullable();
            $table->string('analysis_done_by')->nullable();
            $table->string('appearance')->nullable();
            $table->string('incubation')->nullable();
            $table->string('atcc')->nullable();
            $table->string('growth_expected')->nullable();
            $table->string('growth_observed')->nullable();
            $table->text('capa')->nullable();
            $table->string('signature')->nullable();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->index(['doc_no', 'row_date'], 'media_qc_docno_date_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media_qc_forms');
    }
};
