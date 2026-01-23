<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('flotation_bath_maintenance_forms', function (Blueprint $table) {
            $table->id();

            // 🔹 Header / Filters
            $table->string('fb_month_year', 7); // YYYY-MM
            $table->string('fb_instrument_id')->nullable();

            // 🔹 Daily Maintenance (JSON)
            $table->json('fb_daily')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('flotation_bath_maintenance_forms');
    }
};
