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
        Schema::create('sample_integrity_registers', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/GE/REG-003');
            $table->string('department')->nullable();
            $table->string('location')->nullable();
            $table->date('check_date')->nullable();
            $table->string('sample_id')->nullable();
            $table->string('test_parameter')->nullable();
            $table->decimal('initial_result', 10, 2)->nullable();
            $table->decimal('next_day_result', 10, 2)->nullable();
            $table->decimal('percent_difference', 10, 2)->nullable();
            $table->string('is_variation_accepted')->nullable();
            $table->string('done_by')->nullable();
            $table->string('verified_by')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            // Indexes for faster queries
            $table->index('department');
            $table->index('location');
            $table->index('check_date');
            $table->index('sample_id');
            $table->index('test_parameter');
            $table->index('is_variation_accepted');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sample_integrity_registers');
    }
};
