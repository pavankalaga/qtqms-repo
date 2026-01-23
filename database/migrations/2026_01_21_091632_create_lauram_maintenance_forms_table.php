<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('lauram_maintenance_forms', function (Blueprint $table) {
            $table->id();

            // 🔹 Header / Filters
            $table->string('lauram_month_year', 7); // YYYY-MM
            $table->string('lauram_instrument_id')->nullable();

            // 🔹 Daily Maintenance (nested JSON)
            $table->json('lauram_daily')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lauram_maintenance_forms');
    }
};
