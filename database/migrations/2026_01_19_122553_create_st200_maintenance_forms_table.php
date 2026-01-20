<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('st200_maintenance_forms', function (Blueprint $table) {
            $table->id();

            // ===== FILTER FIELDS =====
            $table->string('st200_month_year', 7); // YYYY-MM
            $table->string('st200_instrument_id', 100)->nullable();

            // ===== DAILY LOGS (JSON: day => value) =====
            $table->json('st200_clean_instrument')->nullable();
            $table->json('st200_empty_waste')->nullable();
            $table->json('st200_printer_status')->nullable();
            $table->json('st200_daily_cleaning_solution')->nullable();
            $table->json('st200_calibration')->nullable();
            $table->json('st200_shutdown')->nullable();
            $table->json('st200_lab_staff_sign')->nullable();
            $table->json('st200_lab_supervisor_sign')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('st200_maintenance_forms');
    }
};
