<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cooling_centrifuge_maintenance_forms', function (Blueprint $table) {
            $table->id();

            // 🔹 Header / Filters
            $table->string('cc_month_year', 7); // YYYY-MM
            $table->string('cc_department')->nullable();
            $table->string('cc_instrument_id')->nullable();

            // 🔹 Daily Maintenance (JSON grid)
            $table->json('cc_daily')->nullable();

            // 🔹 Monthly Maintenance (INDIVIDUAL FIELDS)
            $table->text('cc_bushes_checked_notes')->nullable();
            $table->date('cc_bushes_checked_date')->nullable();
            $table->date('cc_bushes_next_due')->nullable();
            $table->string('cc_monthly_signature')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cooling_centrifuge_maintenance_forms');
    }
};
