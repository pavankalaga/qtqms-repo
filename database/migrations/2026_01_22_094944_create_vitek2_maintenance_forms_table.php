<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vitek2_maintenance_forms', function (Blueprint $table) {

            $table->id();

            // 🔹 FILTERS
            $table->string('vitek_month_year', 7); // YYYY-MM
            $table->string('vitek_instrument_id')->nullable();

            // 🔹 DAILY + MONTHLY JSON
            $table->json('vitek_daily')->nullable();
            $table->json('vitek_monthly')->nullable();

            // 🔹 META
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vitek2_maintenance_forms');
    }
};
