<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cp_manual_cue_entries', function (Blueprint $table) {
            $table->id();

            $table->date('cue_date')->nullable();
            $table->string('sin_no')->nullable();
            $table->string('analyte')->nullable();
            $table->string('results')->nullable();
            $table->string('done_by')->nullable();
            $table->string('verified_by')->nullable();
            $table->string('remarks')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cp_manual_cue_entries');
    }
};
