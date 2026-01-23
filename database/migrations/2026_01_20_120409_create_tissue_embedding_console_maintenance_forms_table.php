<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tissue_embedding_console_maintenance_forms', function (Blueprint $table) {
            $table->id();

            // 🔹 FILTER / HEADER FIELDS
            $table->string('tec_month_year', 7); // YYYY-MM
            $table->string('tec_instrument_id')->nullable();

            // 🔹 DAILY MAINTENANCE JSON (31 days)
            $table->json('tec_daily')->nullable();

            // 🔹 DOC META (COMMON FOR BE FORMS)
            $table->string('doc_no')->nullable();
            $table->string('issue_no')->nullable();
            $table->string('issue_date')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tissue_embedding_console_maintenance_forms');
    }
};
