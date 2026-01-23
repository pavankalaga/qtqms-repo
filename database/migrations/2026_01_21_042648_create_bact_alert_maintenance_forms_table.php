<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bact_alert_maintenance_forms', function (Blueprint $table) {

            $table->id();

            // 🔑 FILTER FIELDS
            $table->string('ba_month_year', 7); // YYYY-MM
            $table->string('ba_instrument_id')->nullable();

            // 📦 DAILY MAINTENANCE JSON
            $table->json('ba_daily')->nullable();

            // 📄 DOC META (optional but safe – consistent with BE pattern)
            $table->string('doc_no')->nullable();
            $table->string('issue_no')->nullable();
            $table->string('issue_date')->nullable();

            $table->timestamps();

            // 🔍 INDEXES FOR FAST INLINE LOAD
            $table->index('ba_month_year');
            $table->index('ba_instrument_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bact_alert_maintenance_forms');
    }
};
