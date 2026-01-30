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
        Schema::create('slides_blocks_return_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->nullable();

            // Section 1
            $table->string('date')->nullable();
            $table->string('place')->nullable();
            $table->string('patient_name')->nullable();
            $table->string('old_barcode')->nullable();
            $table->string('new_barcode')->nullable();
            $table->string('client_code')->nullable();
            $table->string('department')->nullable();
            $table->integer('slides_blocks')->nullable();

            // Handed Over By
            $table->string('employee_name')->nullable();
            $table->string('employee_signature')->nullable();

            // Receiver
            $table->string('receiver_name')->nullable();
            $table->string('receiver_signature')->nullable();
            $table->string('id_proof')->nullable();
            $table->string('mobile')->nullable();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slides_blocks_return_forms');
    }
};
