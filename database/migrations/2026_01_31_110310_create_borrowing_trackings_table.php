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
        Schema::create('borrowing_trackings', function (Blueprint $table) {
            $table->id();

            $table->unsignedTinyInteger('tracking_month')->nullable();
            $table->unsignedSmallInteger('tracking_year')->nullable();

            $table->string('reagent_name')->nullable();
            $table->string('borrowed_from')->nullable();
            $table->string('lot_number')->nullable();
            $table->date('date_manufactured')->nullable();
            $table->date('expiration_date')->nullable();
            $table->string('quantity_unit')->nullable();
            $table->string('lims_ticket')->nullable();

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
        Schema::dropIfExists('borrowing_trackings');
    }
};
