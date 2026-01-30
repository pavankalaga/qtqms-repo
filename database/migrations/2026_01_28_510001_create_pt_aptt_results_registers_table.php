<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pt_aptt_results_registers', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/HM/REG-001');
            $table->date('check_date')->nullable();
            $table->string('sin_no')->nullable();
            $table->string('analyte_name')->nullable();
            $table->string('result')->nullable();
            $table->string('done_by')->nullable();
            $table->string('verified_by')->nullable();
            $table->text('remarks')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->index('check_date', 'pt_aptt_check_date_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pt_aptt_results_registers');
    }
};
