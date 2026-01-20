<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('autoclave_maintenances', function (Blueprint $table) {
            $table->id();

            // ===== FILTERS =====
            $table->string('aut_month_year', 7);              // YYYY-MM
            $table->string('aut_instrument_id', 100)->nullable();

            // ===== DAILY LOGS (JSON) =====
            $table->json('aut_clean_outside')->nullable();
            $table->json('aut_chamber_water')->nullable();
            $table->json('aut_clean_inside')->nullable();
            $table->json('aut_power_check')->nullable();

            $table->json('aut_lab_staff_sign')->nullable();
            $table->json('aut_lab_supervisor_sign')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('autoclave_maintenances');
    }
};
