<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sample_delivery_registers', function (Blueprint $table) {
            $table->id();

            $table->date('date');
            $table->string('barcode');
            $table->unsignedInteger('samples')->nullable();

            $table->string('department')->nullable();
            $table->string('taken_from_accession')->nullable();
            $table->string('verified_by')->nullable();
            $table->string('delivered_to_dept')->nullable();
            $table->string('received_at_dept')->nullable();

            $table->text('remarks')->nullable();

            // Filters support
            $table->string('location')->nullable();
            $table->string('equipment_id')->nullable();
            $table->string('destination_department')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sample_delivery_registers');
    }
};
