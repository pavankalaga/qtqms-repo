<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('horiba_h550_maintenance_forms', function (Blueprint $table) {
            $table->id();

            // ===== FILTER FIELDS =====
            $table->string('h550_month_year', 7); // YYYY-MM
            $table->string('h550_instrument_serial', 100)->nullable();

            // ===== DAILY MAINTENANCE (JSON) =====
            $table->json('h550_daily')->nullable();

            $table->timestamps();

            // Optional index (safe length)
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('horiba_h550_maintenance_forms');
    }
};
