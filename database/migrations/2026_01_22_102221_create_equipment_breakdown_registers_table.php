<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('equipment_breakdown_registers', function (Blueprint $table) {
            $table->id();

            // 🔹 Filters (only location stored)
            $table->string('eb_location')->nullable();

            // 🔹 Register fields
            $table->date('eb_date')->nullable();
            $table->string('eb_equipment')->nullable();
            $table->string('eb_problem')->nullable();
            $table->string('eb_breakdown_time')->nullable();
            $table->string('eb_action_taken')->nullable();
            $table->string('eb_engineer_name')->nullable();
            $table->string('eb_total_downtime')->nullable();
            $table->string('eb_remarks')->nullable();
            $table->string('eb_signature')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('equipment_breakdown_registers');
    }
};
