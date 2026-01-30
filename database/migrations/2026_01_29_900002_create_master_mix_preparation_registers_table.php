<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('master_mix_preparation_registers', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->nullable();
            $table->date('row_date')->nullable();
            $table->string('row_time')->nullable();
            $table->string('kit_name_lot_no')->nullable();
            $table->string('batch_number')->nullable();
            $table->string('no_of_reactions')->nullable();
            $table->string('reagent_name_components')->nullable();
            $table->string('total_reaction_volume')->nullable();
            $table->string('prepared_by')->nullable();
            $table->text('remarks')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->index(['row_date'], 'master_mix_prep_date_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('master_mix_preparation_registers');
    }
};
