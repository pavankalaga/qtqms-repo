<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('hot_air_oven_temperature_logs', function (Blueprint $table) {
            $table->id();

            // ===== FILTER FIELDS =====
            $table->string('hao_month_year', 7);          // YYYY-MM
            $table->string('hao_instrument_id', 100)->nullable();

            // ===== DAILY LOGS =====
            $table->json('hao_morning_temp')->nullable();
            $table->json('hao_morning_sign')->nullable();
            $table->json('hao_evening_temp')->nullable();
            $table->json('hao_evening_sign')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hot_air_oven_temperature_logs');
    }
};
