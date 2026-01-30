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
        Schema::create('lis_interface_validation_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->nullable();
            $table->string('department')->nullable();
            $table->string('analyzer_name')->nullable();
            $table->string('instrument_serial')->nullable();
            $table->string('instrument_id')->nullable();
            $table->string('analyzer_type')->nullable();
            $table->text('validation_step_1')->nullable();
            $table->text('validation_step_2')->nullable();
            $table->text('validation_step_3')->nullable();
            $table->text('validation_step_4')->nullable();
            $table->text('validation_step_5')->nullable();
            $table->text('remarks')->nullable();
            $table->json('tests_data')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->index(['department', 'analyzer_name'], 'lis_validation_dept_analyzer_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lis_interface_validation_forms');
    }
};
