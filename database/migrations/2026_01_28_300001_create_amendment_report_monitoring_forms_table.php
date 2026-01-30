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
        Schema::create('amendment_report_monitoring_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/GE/FOM-031');
            $table->date('amendment_date')->nullable();
            $table->string('visit_no')->nullable();
            $table->string('parameter')->nullable();
            $table->text('amendment_reason')->nullable();
            $table->string('amendment_done_by')->nullable();
            $table->string('original_result')->nullable();
            $table->string('final_result_lims')->nullable();
            $table->string('location')->nullable();
            $table->string('department')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            // Indexes for faster queries
            $table->index('amendment_date');
            $table->index('location');
            $table->index('department');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amendment_report_monitoring_forms');
    }
};
