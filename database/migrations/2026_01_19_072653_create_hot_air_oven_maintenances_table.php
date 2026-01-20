<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('hot_air_oven_maintenances', function (Blueprint $table) {
            $table->id();

            // ===== FILTER FIELDS =====
            $table->string('hao_maint_month_year', 7);   // YYYY-MM
            $table->string('hao_maint_instrument_id', 100)->nullable();

            // ===== DAILY LOGS (JSON 1–31) =====
            $table->json('hao_maint_clean_outside')->nullable();
            $table->json('hao_maint_clean_inside')->nullable();
            $table->json('hao_maint_temperature_check')->nullable();
            $table->json('hao_maint_power_check')->nullable();

            $table->json('hao_maint_lab_staff_sign')->nullable();
            $table->json('hao_maint_lab_supervisor_sign')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hot_air_oven_maintenances');
    }
};
