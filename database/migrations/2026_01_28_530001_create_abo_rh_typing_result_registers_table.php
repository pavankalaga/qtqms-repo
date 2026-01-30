<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('abo_rh_typing_result_registers', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/HM/REG-003');
            $table->date('check_date')->nullable();
            $table->string('check_time')->nullable();
            $table->string('sin_no')->nullable();
            $table->string('patient_name')->nullable();
            $table->string('age_sex')->nullable();
            // Reverse Grouping
            $table->string('pool_a_cells')->nullable();
            $table->string('pool_b_cells')->nullable();
            $table->string('pool_o_cells')->nullable();
            // Forward Grouping
            $table->string('anti_a')->nullable();
            $table->string('anti_b')->nullable();
            $table->string('anti_d')->nullable();
            // Result and approvals
            $table->string('result')->nullable();
            $table->string('test_done_by')->nullable();
            $table->string('test_verified_by')->nullable();
            $table->string('approved_by')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->index('check_date', 'abo_rh_result_check_date_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('abo_rh_typing_result_registers');
    }
};
