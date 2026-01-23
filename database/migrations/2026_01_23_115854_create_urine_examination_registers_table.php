<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('urine_examination_registers', function (Blueprint $table) {
            $table->id();

            // 🔑 MAIN FILTER COLUMN
            $table->date('urine_date');

            // BASIC DETAILS
            $table->string('sno')->nullable();
            $table->string('sin_no')->nullable();
            $table->string('patient_name')->nullable();
            $table->string('age_sex')->nullable();

            // EXAMINATION DATA
            $table->string('quantity')->nullable();
            $table->string('colour')->nullable();
            $table->string('appearance')->nullable();
            $table->string('blood')->nullable();
            $table->string('bilirubin')->nullable();
            $table->string('urobilinogen')->nullable();
            $table->string('ketone')->nullable();
            $table->string('glucose')->nullable();
            $table->string('protein')->nullable();
            $table->string('ph')->nullable();
            $table->string('nitrites')->nullable();
            $table->string('leucocytosis')->nullable();
            $table->string('specific_gravity')->nullable();
            $table->string('pus_cells')->nullable();
            $table->string('epithelial_cells')->nullable();
            $table->string('rbcs')->nullable();

            // OTHER INFO
            $table->string('others')->nullable();
            $table->string('done_by')->nullable();
            $table->string('verified_by')->nullable();
            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('urine_examination_registers');
    }
};
