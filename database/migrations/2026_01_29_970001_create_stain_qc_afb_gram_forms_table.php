<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stain_qc_afb_gram_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->nullable();

            $table->date('row_date')->nullable();
            $table->string('manufacturer')->nullable();
            $table->string('lot_no')->nullable();
            $table->date('expiry_date')->nullable();
            $table->string('atcc')->nullable();
            $table->string('result_expected')->nullable();
            $table->string('result_obtained')->nullable();
            $table->string('done_by')->nullable();
            $table->text('corrective_action')->nullable();
            $table->text('remarks')->nullable();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->index(['row_date'], 'stain_qc_afb_gram_row_date_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stain_qc_afb_gram_forms');
    }
};
