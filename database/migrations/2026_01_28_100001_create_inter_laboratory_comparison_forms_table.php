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
        Schema::create('inter_laboratory_comparison_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/GE/FOM-017');
            $table->string('lab_a')->nullable();
            $table->string('lab_b')->nullable();
            $table->date('comparison_date')->nullable();
            $table->string('reg_no')->nullable();
            $table->string('test_parameter')->nullable();
            $table->decimal('result_a', 15, 2)->nullable();
            $table->decimal('result_b', 15, 2)->nullable();
            $table->decimal('difference_percent', 10, 2)->nullable();
            $table->string('status')->nullable(); // Acceptable / Not Acceptable
            $table->string('done_by')->nullable();
            $table->string('reviewed_by')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            // Index for faster queries
            $table->index('comparison_date');
            $table->index('lab_a');
            $table->index('lab_b');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inter_laboratory_comparison_forms');
    }
};
