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
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('item_name')->nullable();
            $table->string('item_code')->nullable();
            $table->string('generic_item_name')->nullable();
            $table->string('item_category')->nullable();
            $table->string('department')->nullable();
            $table->string('machine')->nullable();
            $table->string('test_code')->nullable();
            $table->string('test_name')->nullable();            
            $table->string('supplier_name')->nullable();
            $table->string('address')->nullable();
            $table->string('manufacture')->nullable();
            $table->string('hsn_code')->nullable();
            $table->string('unit_of_purchase')->nullable();
            $table->string('pack_size')->nullable();
            $table->string('test')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('cgst')->nullable();
            $table->string('sgst')->nullable();
            $table->string('price_gst')->nullable(); 
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
