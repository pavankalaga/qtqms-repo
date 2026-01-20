<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sample_receiving_registers', function (Blueprint $table) {
            $table->id();

            $table->date('date');
            $table->time('time');

            $table->string('location')->nullable();
            $table->string('department')->nullable();
            $table->string('equipment_id')->nullable();

            $table->string('tl_code')->nullable();

            $table->string('client_location');
            $table->string('client_name');

            $table->integer('blood_samples')->nullable();
            $table->integer('other_samples')->nullable();

            $table->string('csr_name')->nullable();
            $table->string('csr_sign')->nullable();

            $table->string('sample_temp')->nullable();
            $table->string('receiver_name')->nullable();

            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sample_receiving_registers');
    }
};
