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
        Schema::create('reagent_consumables_consumption_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/GE/FOM-047');
            $table->string('month_year')->nullable(); // For grouping by month
            $table->string('department')->nullable();
            $table->string('location')->nullable();
            $table->date('consumption_date')->nullable();
            $table->string('reagent_name')->nullable();
            $table->decimal('quantity', 10, 2)->nullable();
            $table->string('lot_no')->nullable();
            $table->date('expiry_date')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            // Indexes for faster queries
            $table->index('month_year');
            $table->index('department');
            $table->index('location');
            $table->index('consumption_date');
            $table->index('reagent_name');
            $table->index('lot_no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reagent_consumables_consumption_forms');
    }
};
