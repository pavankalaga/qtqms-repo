<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('automatic_tissue_processor_maintenance_forms', function (Blueprint $table) {

            $table->id();

            // 🔑 FILTER FIELDS
            $table->string('month_year', 7);          // YYYY-MM
            $table->string('instrument_id')->nullable();

            // 🧠 DAILY MAINTENANCE JSON
            $table->json('daily')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('automatic_tissue_processor_maintenance_forms');
    }
};
