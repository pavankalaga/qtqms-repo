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
        Schema::create('eqas_capa_outlier_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/GE/FOM-035');
            $table->string('month_year')->nullable();
            $table->string('department')->nullable();
            $table->string('location')->nullable();
            $table->date('corrective_action_date')->nullable();
            $table->string('survey_name')->nullable();
            $table->text('sample_details')->nullable();
            $table->date('sample_run_date')->nullable();
            $table->text('outlier_results')->nullable();
            $table->text('eqas_trends')->nullable();
            $table->text('root_cause_summary')->nullable();
            $table->json('root_cause_checklist')->nullable();
            $table->text('other_root_cause')->nullable();
            $table->text('immediate_action')->nullable();
            $table->json('reassay_results')->nullable();
            $table->text('reassay_comment')->nullable();
            $table->text('preventive_action')->nullable();
            $table->string('conclusion')->nullable();
            $table->string('action_taken_by')->nullable();
            $table->string('action_approved_by')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            // Indexes for faster queries
            $table->index('month_year');
            $table->index('department');
            $table->index('location');
            $table->index('corrective_action_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eqas_capa_outlier_forms');
    }
};
