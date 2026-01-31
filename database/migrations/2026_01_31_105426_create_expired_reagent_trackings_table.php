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
        Schema::create('expired_reagent_trackings', function (Blueprint $table) {
            $table->id();

            // Filter keys
            $table->unsignedTinyInteger('tracking_month')->nullable();
            $table->unsignedSmallInteger('tracking_year')->nullable();

            // Row data
            $table->string('reagent_name')->nullable();
            $table->string('lot_number')->nullable();
            $table->date('date_manufactured')->nullable();
            $table->date('expiration_date')->nullable();
            $table->string('unit_of_measurement')->nullable();
            $table->string('quantity')->nullable();
            $table->date('removal_date')->nullable();

            // Footer – Reported by
            $table->string('reported_by')->nullable();
            $table->string('reported_sign')->nullable();
            $table->date('reported_date')->nullable();

            // Footer – Approved by
            $table->string('approved_by')->nullable();
            $table->string('approved_sign')->nullable();
            $table->date('approved_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expired_reagent_trackings');
    }
};
