<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('beckman_dxi800_maintenance_forms', function (Blueprint $table) {
            $table->id();

            // ===== FILTER FIELDS =====
            $table->string('dxi_month_year', 7); // YYYY-MM
            $table->string('dxi_location', 100)->nullable();
            $table->string('dxi_department', 100)->nullable();

            // ===== DAILY MAINTENANCE (JSON: day => value) =====
            $table->json('dxi_system_backup')->nullable();
            $table->json('dxi_zone_temperature')->nullable();
            $table->json('dxi_system_supplies')->nullable();
            $table->json('dxi_clean_probe')->nullable();
            $table->json('dxi_solid_waste')->nullable();
            $table->json('dxi_prime_substrate')->nullable();
            $table->json('dxi_daily_cleaning')->nullable();
            $table->json('dxi_performed_by')->nullable();
            $table->json('dxi_reviewed_by')->nullable();

            // ===== WEEKLY MAINTENANCE =====
            $table->json('dxi_week_date')->nullable(); // week1–week4 dates

            $table->json('dxi_clean_exterior')->nullable();
            $table->json('dxi_clean_primary_probe')->nullable();
            $table->json('dxi_waste_filter')->nullable();
            $table->json('dxi_system_check')->nullable();
            $table->json('dxi_supervisor_sign')->nullable();

            $table->timestamps();

          });
    }

    public function down(): void
    {
        Schema::dropIfExists('beckman_dxi800_maintenance_forms');
    }
};
