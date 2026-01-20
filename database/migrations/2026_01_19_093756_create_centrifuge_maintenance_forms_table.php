<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('centrifuge_maintenance_forms', function (Blueprint $table) {
            $table->id();

            // ===== FILTERS =====
            $table->string('cen_month_year', 7); // YYYY-MM
            $table->string('cen_instrument_id', 100)->nullable();

            // ===== DAILY MAINTENANCE (JSON) =====
            $table->json('cen_clean_outside')->nullable();
            $table->json('cen_clean_inside')->nullable();
            $table->json('cen_power_check')->nullable();
            $table->json('cen_carbon_brush')->nullable();
            $table->json('cen_lab_staff_sign')->nullable();
            $table->json('cen_lab_supervisor_sign')->nullable();

            // ===== WEEKLY MAINTENANCE =====
            $table->string('cen_week1_date')->nullable();
            $table->string('cen_week2_date')->nullable();
            $table->string('cen_week3_date')->nullable();
            $table->string('cen_week4_date')->nullable();

            $table->string('cen_week1_staff')->nullable();
            $table->string('cen_week2_staff')->nullable();
            $table->string('cen_week3_staff')->nullable();
            $table->string('cen_week4_staff')->nullable();

            $table->string('cen_week1_supervisor')->nullable();
            $table->string('cen_week2_supervisor')->nullable();
            $table->string('cen_week3_supervisor')->nullable();
            $table->string('cen_week4_supervisor')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('centrifuge_maintenance_forms');
    }
};
