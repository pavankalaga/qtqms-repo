<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('incubator_maintenance_forms', function (Blueprint $table) {
            $table->id();

            // ===== FILTER FIELDS =====
            $table->string('inc_maint_month_year', 7); // YYYY-MM
            $table->string('inc_maint_instrument_id', 100)->nullable();

            // ===== DAILY LOGS (JSON) =====
            $table->json('inc_maint_clean_outside')->nullable();
            $table->json('inc_maint_clean_inside')->nullable();
            $table->json('inc_maint_temperature_check')->nullable();
            $table->json('inc_maint_power_check')->nullable();
            $table->json('inc_maint_lab_staff_sign')->nullable();
            $table->json('inc_maint_lab_supervisor_sign')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('incubator_maintenance_forms');
    }
};
