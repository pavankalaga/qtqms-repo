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
        Schema::create('employee_vaccination_records', function (Blueprint $table) {
            $table->id();

            $table->string('emp_id')->nullable();
            $table->string('name')->nullable();
            $table->string('department')->nullable();
            $table->string('designation')->nullable();

            // I Dose
            $table->date('dose1_due')->nullable();
            $table->date('dose1_given')->nullable();
            $table->string('dose1_lot')->nullable();

            // II Dose
            $table->date('dose2_due')->nullable();
            $table->date('dose2_given')->nullable();
            $table->string('dose2_lot')->nullable();

            // III Dose
            $table->date('dose3_due')->nullable();
            $table->date('dose3_given')->nullable();
            $table->string('dose3_lot')->nullable();

            $table->string('titre')->nullable();
            $table->string('status')->nullable();
            $table->string('signature')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_vaccination_records');
    }
};
