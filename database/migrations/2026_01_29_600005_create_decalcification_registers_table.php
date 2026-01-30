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
        Schema::create('decalcification_registers', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->nullable();
            $table->string('department')->nullable();
            $table->string('location')->nullable();
            $table->date('row_date')->nullable();
            $table->string('sin')->nullable();
            $table->string('hp_no')->nullable();
            $table->string('patient_name')->nullable();
            $table->string('age_sex')->nullable();
            $table->string('site_of_biopsy')->nullable();
            $table->date('start_date')->nullable();
            $table->date('completed_date')->nullable();
            $table->string('reagent')->nullable();
            $table->text('remarks')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->index(['row_date', 'department', 'location'], 'decalc_reg_lookup_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('decalcification_registers');
    }
};
