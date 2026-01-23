<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tosoh_hlc_723gx_maintenance_forms', function (Blueprint $table) {
            $table->id();

            // 🔹 FILTER / HEADER FIELDS
            $table->string('tosoh_month_year', 7); // YYYY-MM
            $table->string('tosoh_instrument_serial')->nullable();

            // 🔹 DAILY DATA (ALL CELLS STORED AS JSON)
            $table->json('tosoh_daily')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tosoh_hlc_723gx_maintenance_forms');
    }
};
