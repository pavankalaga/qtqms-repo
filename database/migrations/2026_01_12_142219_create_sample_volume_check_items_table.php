<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sample_volume_check_items', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');

            $table->unsignedBigInteger('sample_volume_check_id');

            $table->string('container_type');
            $table->integer('required_qty')->nullable();
            $table->integer('actual_qty')->nullable();
            $table->string('remarks')->nullable();

            $table->timestamps();

            $table->foreign('sample_volume_check_id')
                  ->references('id')
                  ->on('sample_volume_checks')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sample_volume_check_items');
    }
};
