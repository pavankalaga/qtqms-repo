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
        Schema::create('tissue_processor_reagent_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/HP/FOM-004');
            $table->string('department')->nullable();
            $table->string('location')->nullable();
            $table->date('row_date')->nullable();
            $table->string('formalin1')->nullable();
            $table->string('formalin2')->nullable();
            $table->string('processing_water')->nullable();
            $table->string('alcohol70')->nullable();
            $table->string('alcohol80')->nullable();
            $table->string('alcohol90')->nullable();
            $table->string('absolute1')->nullable();
            $table->string('absolute2')->nullable();
            $table->string('absolute3')->nullable();
            $table->string('xylene1')->nullable();
            $table->string('xylene2')->nullable();
            $table->string('wax1')->nullable();
            $table->string('wax2')->nullable();
            $table->string('cleaning_xylene')->nullable();
            $table->string('cleaning_alcohol')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            // Index for faster queries
            $table->index('row_date');
            $table->index('department');
            $table->index('location');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tissue_processor_reagent_forms');
    }
};
