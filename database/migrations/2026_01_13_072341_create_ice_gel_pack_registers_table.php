<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ice_gel_pack_registers', function (Blueprint $table) {
            $table->id();

            // 🔎 Filters
            $table->date('date')->index();
            $table->string('location')->nullable();
            $table->string('department')->nullable();

            // 📋 Form Fields
            $table->integer('quantity')->nullable();
            $table->string('handed_over_by')->nullable();   // Name & Time
            $table->string('received_by')->nullable();      // Name & Time

            // Returned status
            $table->enum('returned', ['yes', 'no'])->nullable();

            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ice_gel_pack_registers');
    }
};
