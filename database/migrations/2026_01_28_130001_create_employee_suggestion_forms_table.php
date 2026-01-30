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
        Schema::create('employee_suggestion_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/GE/FOM-019');
            $table->string('employee_name')->nullable();
            $table->date('suggestion_date')->nullable();
            $table->string('employee_id')->nullable();
            $table->text('staff_suggestions')->nullable();
            $table->text('suggested_requirements')->nullable();
            $table->string('employee_signature')->nullable();
            $table->text('corrective_action_management')->nullable();
            $table->string('lab_supervisor')->nullable();
            $table->string('lab_director_signature')->nullable();
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
        Schema::dropIfExists('employee_suggestion_forms');
    }
};
