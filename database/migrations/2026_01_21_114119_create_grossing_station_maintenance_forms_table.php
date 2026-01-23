<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('grossing_station_maintenance_forms', function (Blueprint $table) {
            $table->id();

            // 🔹 HEADER / FILTER FIELDS
            $table->string('gs_month_year', 7); // YYYY-MM
            $table->string('gs_instrument_id')->nullable();

            // 🔹 DAILY MAINTENANCE (JSON)
            // clean, filters, power_cord, airflow, uv_lamp, fuse, technician
            $table->json('gs_daily')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('grossing_station_maintenance_forms');
    }
};
