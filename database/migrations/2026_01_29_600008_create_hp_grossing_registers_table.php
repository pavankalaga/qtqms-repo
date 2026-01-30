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
        Schema::create('hp_grossing_registers', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->nullable();
            $table->string('department')->nullable();
            $table->string('location')->nullable();
            $table->date('row_date')->nullable();
            $table->string('hp_number')->nullable();
            $table->string('alphabets')->nullable();
            $table->string('doctor_name_date')->nullable();
            $table->string('technician_signature')->nullable();
            $table->string('hod_signature')->nullable();
            $table->text('remarks')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->index(['row_date', 'department', 'location'], 'hp_grossing_reg_lookup_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hp_grossing_registers');
    }
};
