<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('incubator_temperature_logs', function (Blueprint $table) {
            $table->id();

            // ===== FILTER FIELDS =====
            $table->string('inc_month_year', 7);           // YYYY-MM
            $table->string('inc_instrument_id', 100)->nullable();

            // ===== DAILY LOGS (JSON) =====
            $table->json('inc_morning_temp')->nullable();
            $table->json('inc_morning_sign')->nullable();
            $table->json('inc_evening_temp')->nullable();
            $table->json('inc_evening_sign')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('incubator_temperature_logs');
    }
};
