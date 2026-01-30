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
        Schema::create('formalin_preparation_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/HP/FOM-006');
            $table->string('department')->nullable();
            $table->string('location')->nullable();
            $table->date('row_date')->nullable();
            $table->string('ph')->nullable();
            $table->string('volume_prepared')->nullable();
            $table->string('prepared_by')->nullable();
            $table->string('verified_by')->nullable();
            $table->string('remarks')->nullable();
            $table->string('hod_signature')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('formalin_preparation_forms');
    }
};
