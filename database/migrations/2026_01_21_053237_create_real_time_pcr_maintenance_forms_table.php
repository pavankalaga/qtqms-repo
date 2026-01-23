<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('real_time_pcr_maintenance_forms', function (Blueprint $table) {

            $table->id();

            // 🔑 FILTER FIELDS
            $table->string('rtpcr_month_year', 7);          // YYYY-MM
            $table->string('rtpcr_instrument_id', 100)->nullable();

            // 🧾 DAILY MAINTENANCE JSON
            $table->json('rtpcr_daily')->nullable();

            // COMMON
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('real_time_pcr_maintenance_forms');
    }
};
