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
        // Parent table for form header
        Schema::create('split_sample_analysis_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/GE/FOM-044');
            $table->string('department')->nullable();
            $table->string('location')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            // Indexes for faster queries
            $table->index('department');
            $table->index('location');
            $table->index('created_at');
        });

        // Child table for form rows
        Schema::create('split_sample_analysis_rows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('split_sample_analysis_form_id');
            $table->integer('row_number')->default(1);
            $table->string('test_name')->nullable();
            $table->string('tech1_result')->nullable();
            $table->string('tech2_result')->nullable();
            $table->enum('correlation', ['Correlated', 'Non-Correlated'])->nullable();
            $table->text('remarks')->nullable();
            $table->string('signature')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('split_sample_analysis_form_id')
                  ->references('id')
                  ->on('split_sample_analysis_forms')
                  ->onDelete('cascade');

            // Indexes for faster queries
            $table->index('split_sample_analysis_form_id');
            $table->index('correlation');
            $table->index('test_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('split_sample_analysis_rows');
        Schema::dropIfExists('split_sample_analysis_forms');
    }
};
