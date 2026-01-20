<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('beckman_dxc_maintenance_forms', function (Blueprint $table) {
            $table->id();

            // ===== FILTER FIELDS =====
            $table->string('dxc_month_year', 7); // YYYY-MM
            $table->string('dxc_location', 100)->nullable();
            $table->string('dxc_department', 100)->nullable();

            // ===== DAILY MAINTENANCE (JSON: day => value) =====
            $table->json('dxc_inspect_syringes')->nullable();
            $table->json('dxc_inspect_roller_pump')->nullable();
            $table->json('dxc_inspect_probes')->nullable();
            $table->json('dxc_replace_diluent')->nullable();
            $table->json('dxc_replace_probe_wash')->nullable();
            $table->json('dxc_clean_ise')->nullable();
            $table->json('dxc_calibrate_ise')->nullable();
            $table->json('dxc_performed_by')->nullable();
            $table->json('dxc_reviewed_by')->nullable();

            // ===== WEEKLY MAINTENANCE (JSON: week => value) =====
            $table->json('dxc_week_date')->nullable();               // {1: date, 2: date, 3: date, 4: date}
            $table->json('dxc_clean_probe_mix')->nullable();         // {1: value, 2: value, 3: value, 4: value}
            $table->json('dxc_perform_w2')->nullable();              // {1: value, 2: value, 3: value, 4: value}
            $table->json('dxc_performed_supervisor')->nullable();    // {1: value, 2: value, 3: value, 4: value}

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('beckman_dxc_maintenance_forms');
    }
};
