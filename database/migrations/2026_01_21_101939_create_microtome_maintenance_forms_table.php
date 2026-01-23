<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('microtome_maintenance_forms', function (Blueprint $table) {
            $table->id();

            // 🔹 FILTER / HEADER FIELDS
            $table->string('microtome_month_year', 7); // YYYY-MM
            $table->string('microtome_instrument_id')->nullable();

            // 🔹 DAILY MAINTENANCE (JSON)
            $table->json('microtome_daily')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('microtome_maintenance_forms');
    }
};
