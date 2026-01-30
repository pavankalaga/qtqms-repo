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
        Schema::create('department_sample_storage_registers', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/GE/REG-002');
            $table->string('department')->nullable();
            $table->string('location')->nullable();
            $table->string('barcode')->nullable();
            $table->date('sample_received_date')->nullable();
            $table->date('sample_discard_date')->nullable();
            $table->string('discard_by')->nullable();
            $table->string('reviewed_by')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            // Indexes for faster queries
            $table->index('department');
            $table->index('location');
            $table->index('barcode');
            $table->index('sample_received_date');
            $table->index('sample_discard_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('department_sample_storage_registers');
    }
};
