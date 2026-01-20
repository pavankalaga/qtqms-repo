<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bio_rad_d10_maintenance_forms', function (Blueprint $table) {
            $table->id();

            // ================= HEADER / FILTER FIELDS =================
            $table->string('d10_month_year', 7); // YYYY-MM
            $table->string('d10_location', 100)->nullable();
            $table->string('d10_department', 100)->nullable();
            $table->string('d10_instrument_serial', 150)->nullable();

            // ================= JSON DATA =================
            $table->json('d10_daily')->nullable();
            $table->json('d10_monthly')->nullable();

            // ================= CONTROL =================
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bio_rad_d10_maintenance_forms');
    }
};
