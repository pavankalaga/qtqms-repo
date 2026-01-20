<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bio_safety_cabinet_forms', function (Blueprint $table) {
            $table->id();

            // ===== HEADER / FILTER FIELDS =====
            $table->string('bsc_department', 100)->nullable();
            $table->string('bsc_month_year', 7); // YYYY-MM
            $table->string('bsc_equipment_id', 100)->nullable();

            // ===== DAILY / WEEKLY JSON FIELDS =====
            $table->json('bsc_clean_ipa')->nullable();
            $table->json('bsc_uv_light')->nullable();
            $table->json('bsc_manometer')->nullable();
            $table->json('bsc_done_by')->nullable();
            $table->json('bsc_hypo_available')->nullable();

            $table->json('bsc_settle_plate_date')->nullable();
            $table->json('bsc_settle_yes')->nullable();
            $table->json('bsc_settle_no')->nullable();
            $table->json('bsc_settle_cfu')->nullable();

            $table->json('bsc_uv_efficacy')->nullable();
            $table->json('bsc_checked_by')->nullable();
            $table->json('bsc_remarks')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bio_safety_cabinet_forms');
    }
};
