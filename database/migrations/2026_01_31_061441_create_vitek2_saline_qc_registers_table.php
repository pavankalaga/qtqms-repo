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
        Schema::create('vitek2_saline_qc_registers', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->nullable();

            $table->date('row_date')->nullable();
            $table->string('vitek_saline')->nullable();
            $table->string('blood_agar_growth')->nullable();
            $table->string('qc_status')->nullable();
            $table->string('done_by')->nullable();
            $table->string('hod_sign')->nullable();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->index(['doc_no', 'row_date'], 'vitek2_sal_qc_docno_date_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vitek2_saline_qc_registers');
    }
};
