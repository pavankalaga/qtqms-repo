<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leishman_stain_qc_registers', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/HM/REG-002');
            $table->date('check_date')->nullable();
            $table->string('buffer_ph')->nullable();
            $table->string('sin_no')->nullable();
            $table->string('smear_prepared_by')->nullable();
            $table->string('shape')->nullable();
            $table->string('thickness')->nullable();
            $table->string('length_of_smear')->nullable();
            $table->string('distribution_of_cells')->nullable();
            $table->string('uniform_stain')->nullable();
            $table->string('deposit')->nullable();
            $table->string('rbc_cytoplasm')->nullable();
            $table->string('wbc_cytoplasm')->nullable();
            $table->string('eosinophils_granules')->nullable();
            $table->string('overall_stain')->nullable();
            $table->string('verified_by')->nullable();
            $table->string('approved_by_hod')->nullable();
            $table->text('remarks')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->index('check_date', 'leishman_check_date_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leishman_stain_qc_registers');
    }
};
