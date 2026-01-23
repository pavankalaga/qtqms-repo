<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('microscope_maintenance_forms', function (Blueprint $table) {
            $table->id();

            // 🔹 FILTER / HEADER FIELDS
            $table->string('mic_month_year', 7); // YYYY-MM
            $table->string('mic_instrument_id')->nullable();

            // 🔹 DAILY MAINTENANCE (JSON)
            $table->json('mic_daily')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('microscope_maintenance_forms');
    }
};
