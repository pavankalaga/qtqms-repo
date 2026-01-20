<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sample_volume_checks', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');

            $table->unsignedTinyInteger('month'); // 1–12
            $table->unsignedSmallInteger('year'); // 2024, 2025, 2026

            $table->string('location')->nullable();
            $table->string('department')->nullable();

            $table->string('done_by')->nullable();
            $table->string('reviewed_by')->nullable();

            $table->enum('status', ['draft', 'submitted', 'reviewed'])
                  ->default('draft');

            $table->timestamps();

            $table->unique(['month', 'year']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sample_volume_checks');
    }
};
