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
        Schema::create('media_preparation_registers', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->nullable();

            $table->date('row_date')->nullable();
            $table->string('media_name')->nullable();
            $table->string('lot_details')->nullable();
            $table->string('volume_prepared')->nullable();
            $table->string('weight_prepared')->nullable();
            $table->string('autoclave_start')->nullable();
            $table->string('autoclave_end')->nullable();
            $table->string('sterile_holding')->nullable();
            $table->string('total_duration')->nullable();
            $table->string('temperature')->nullable();
            $table->string('pressure')->nullable();
            $table->string('chemical_indicators')->nullable();
            $table->string('biological_indicators')->nullable();
            $table->string('hod_sign')->nullable();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->index(['doc_no', 'row_date'], 'media_prep_reg_docno_date_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_preparation_registers');
    }
};
