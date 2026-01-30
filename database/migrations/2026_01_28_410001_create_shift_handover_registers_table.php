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
        Schema::create('shift_handover_registers', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/GE/REG-001');
            $table->string('department')->nullable();
            $table->string('location')->nullable();
            $table->date('handover_date')->nullable();
            $table->string('barcode')->nullable();
            $table->string('test_name')->nullable();
            $table->integer('no_of_samples')->nullable();
            $table->text('pending_reason')->nullable();
            $table->string('handover_by')->nullable();
            $table->string('received_by')->nullable();
            $table->text('remarks')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            // Indexes for faster queries
            $table->index('department');
            $table->index('location');
            $table->index('handover_date');
            $table->index('barcode');
            $table->index('test_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shift_handover_registers');
    }
};
