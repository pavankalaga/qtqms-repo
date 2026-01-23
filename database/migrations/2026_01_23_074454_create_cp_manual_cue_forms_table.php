<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cp_manual_cue_forms', function (Blueprint $table) {
            $table->id();

            // 🔑 FILTERS
            $table->string('month_year', 7);          // 2026-01
            $table->string('instrument_id')->nullable();

            // 🔑 ROW DATA
            $table->json('rows')->nullable();

            $table->timestamps();

            // 🔒 UNIQUE (MONTH + INSTRUMENT)
            $table->unique(['month_year', 'instrument_id'], 'cue_month_instrument_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cp_manual_cue_forms');
    }
};
