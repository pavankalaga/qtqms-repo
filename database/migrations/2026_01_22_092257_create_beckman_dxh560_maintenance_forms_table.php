<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('beckman_dxh560_maintenance_forms', function (Blueprint $table) {
            $table->id();

            // 🔑 FILTERS (INLINE EDIT IDENTIFIER)
            $table->string('dxh560_month_year', 7); // YYYY-MM
            $table->string('dxh560_instrument_serial')->nullable();

            // 🔹 DAILY MAINTENANCE (31 days grid)
            $table->json('dxh560_daily')->nullable();

            // 🔹 WEEKLY MAINTENANCE (week1–week4)
            $table->json('dxh560_weekly')->nullable();

            // 🔹 MONTHLY MAINTENANCE
            $table->json('dxh560_monthly')->nullable();

            // 🔹 TECHNICIAN SIGNATURE
            $table->json('dxh560_technician')->nullable();

            $table->timestamps();


        });
    }

    public function down(): void
    {
        Schema::dropIfExists('beckman_dxh560_maintenance_forms');
    }
};
