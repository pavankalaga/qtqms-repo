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
        Schema::create('vaccination_procurement_forms', function (Blueprint $table) {
            $table->id();

            $table->date('purchase_date')->nullable();
            $table->string('vaccine_name')->nullable();
            $table->string('manufacturer_name')->nullable();
            $table->string('supplier_name')->nullable();
            $table->string('lot_no')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaccination_procurement_forms');
    }
};
