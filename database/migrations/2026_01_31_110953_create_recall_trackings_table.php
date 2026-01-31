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
        Schema::create('recall_trackings', function (Blueprint $table) {
            $table->id();

            // Product Information
            $table->string('product_category')->nullable();
            $table->string('product_name')->nullable();
            $table->string('manufacturer')->nullable();
            $table->string('supplier')->nullable();
            $table->string('lot_number')->nullable();
            $table->string('batch_number')->nullable();
            $table->date('date_of_manufacture')->nullable();
            $table->date('expiry_date')->nullable();
            $table->string('quantity_on_hand')->nullable();

            // Reason & Notes
            $table->json('reason')->nullable();
            $table->text('additional_notes')->nullable();

            // Disposal
            $table->json('disposal')->nullable();
            $table->text('disposal_details')->nullable();

            // Locations (JSON array of objects)
            $table->json('locations')->nullable();

            // Declaration
            $table->string('store_manager')->nullable();
            $table->string('designation')->nullable();
            $table->date('store_date')->nullable();
            $table->string('store_signature')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recall_trackings');
    }
};
