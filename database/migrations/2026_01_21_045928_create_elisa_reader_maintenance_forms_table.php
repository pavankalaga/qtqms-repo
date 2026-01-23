<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('elisa_reader_maintenance_forms', function (Blueprint $table) {

            $table->id();

            // 🔑 FILTER FIELDS (INLINE LOAD)
            $table->string('elisa_month_year', 7);   // YYYY-MM
            $table->string('elisa_instrument_id')->nullable();

            // 📦 DAILY MAINTENANCE (JSON)
            $table->json('elisa_daily')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('elisa_reader_maintenance_forms');
    }
};
