<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('laminar_air_flow_maintenances', function (Blueprint $table) {
            $table->id();

            // ===== FILTER FIELDS =====
            $table->string('laf_department', 100)->nullable();
            $table->string('laf_month_year', 7); // YYYY-MM
            $table->string('laf_equipment_id', 100)->nullable();

            // ===== DAILY JSON LOGS =====
            $table->json('laf_clean_ipa')->nullable();
            $table->json('laf_uv_light')->nullable();
            $table->json('laf_manometer')->nullable();
            $table->json('laf_done_by')->nullable();
            $table->json('laf_hypo_available')->nullable();
            $table->json('laf_settle_plate_date')->nullable();
            $table->json('laf_settle_result')->nullable();
            $table->json('laf_uv_efficacy')->nullable();
            $table->json('laf_checked_by')->nullable();
            $table->json('laf_remarks')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laminar_air_flow_maintenances');
    }
};
