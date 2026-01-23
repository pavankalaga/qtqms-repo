<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('daily_urine_qc_forms', function (Blueprint $table) {

            $table->id();
            $table->string('month_year', 7);          // YYYY-MM
            $table->string('lot_no')->nullable();
            $table->date('expiry_date')->nullable();
            $table->string('level')->nullable();
            $table->string('instrument_name')->nullable();
            $table->string('instrument_id')->nullable();

            // 🔑 DAILY DATA (JSON)
            $table->json('data')->nullable();

            // 🔑 AUDIT
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('daily_urine_qc_forms');
    }
};
