<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('daily_iqc_data_monitoring_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->nullable();
            $table->string('month_year')->nullable();
            $table->string('department')->nullable();
            $table->string('level')->nullable();
            $table->string('instrument_no')->nullable();
            $table->string('control_lot_no')->nullable();
            $table->date('control_expiry')->nullable();
            $table->string('control_lot_no_2')->nullable();
            $table->date('control_expiry_2')->nullable();
            $table->json('daily_data')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            // Index for faster lookups
            $table->index(['month_year', 'department', 'instrument_no'], 'iqc_monitoring_lookup_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_iqc_data_monitoring_forms');
    }
};
