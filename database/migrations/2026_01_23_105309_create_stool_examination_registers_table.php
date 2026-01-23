<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('stool_examination_registers', function (Blueprint $table) {
            $table->id();

            $table->date('stool_date')->index();
            $table->string('location')->nullable();

            $table->string('sno')->nullable();
            $table->string('sin_no')->nullable();
            $table->string('patient_name')->nullable();
            $table->string('age_sex')->nullable();
            $table->string('analyte_name')->nullable();
            $table->string('colour')->nullable();
            $table->string('consistency')->nullable();
            $table->string('mucus')->nullable();
            $table->string('blood')->nullable();
            $table->string('worms')->nullable();
            $table->string('reducing_substance')->nullable();
            $table->string('reaction')->nullable();
            $table->string('pus_cells')->nullable();
            $table->string('epithelial_cells')->nullable();
            $table->string('rbc')->nullable();
            $table->string('macrophages')->nullable();
            $table->string('fat_globulins')->nullable();
            $table->string('starch_granules')->nullable();
            $table->string('ova')->nullable();
            $table->string('cyst')->nullable();
            $table->string('larva')->nullable();
            $table->string('undigested_food')->nullable();
            $table->string('occult_blood')->nullable();
            $table->string('others')->nullable();
            $table->string('done_by')->nullable();
            $table->string('verified_by')->nullable();
            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stool_examination_registers');
    }
};
