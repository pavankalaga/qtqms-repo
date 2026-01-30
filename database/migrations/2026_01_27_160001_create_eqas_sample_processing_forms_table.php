<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * TDPL/GE/FOM-009 - EQAS Sample Processing Form
     */
    public function up(): void
    {
        Schema::create('eqas_sample_processing_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/GE/FOM-009');

            // Form fields
            $table->string('eqas_provider')->nullable();
            $table->string('eqas_lab_id')->nullable();
            $table->string('department_name')->nullable();
            $table->string('sample_temperature')->nullable();
            $table->string('sample_no')->nullable();
            $table->string('accession_no')->nullable();
            $table->string('reconstituted_by')->nullable();
            $table->date('reconstitution_date')->nullable();
            $table->string('processed_by')->nullable();
            $table->string('reviewed_by')->nullable();
            $table->string('qa_shared')->nullable();
            $table->date('result_dispatched_date')->nullable();
            $table->date('evaluation_received_date')->nullable();

            // Audit fields
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->timestamps();

            // Foreign keys
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');

            // Index for queries
            $table->index(['eqas_provider', 'sample_no']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eqas_sample_processing_forms');
    }
};
