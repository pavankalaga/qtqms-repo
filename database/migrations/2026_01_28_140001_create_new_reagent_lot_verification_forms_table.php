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
        Schema::create('new_reagent_lot_verification_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/GE/FOM-020');
            $table->string('location')->nullable();
            $table->string('department')->nullable();
            $table->date('verification_date')->nullable();
            $table->string('reagent')->nullable();
            $table->string('old_lot')->nullable();
            $table->string('old_expiry')->nullable();
            $table->string('new_lot')->nullable();
            $table->string('new_expiry')->nullable();
            $table->string('analytes')->nullable();
            $table->string('materials_used')->nullable();
            $table->string('specimen_source')->nullable();
            $table->string('old_result')->nullable();
            $table->string('new_result')->nullable();
            $table->string('variation')->nullable();
            $table->string('criteria')->nullable();
            $table->string('acceptable')->nullable();
            $table->string('lab_tech_signature')->nullable();
            $table->string('verified_by')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            // Index for faster queries
            $table->index('verification_date');
            $table->index('location');
            $table->index('department');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_reagent_lot_verification_forms');
    }
};
