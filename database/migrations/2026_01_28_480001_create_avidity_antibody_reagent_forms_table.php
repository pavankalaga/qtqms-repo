<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('avidity_antibody_reagent_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/HM/FOM-004');
            $table->date('check_date')->nullable();
            $table->string('antibody_reagent')->nullable();
            $table->string('company')->nullable();
            $table->string('lot_number')->nullable();
            $table->string('expiry_date')->nullable();
            $table->string('time')->nullable();
            $table->string('performed_by')->nullable();
            $table->string('reviewed_by')->nullable();
            $table->text('remarks')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->index('check_date', 'avidity_check_date_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('avidity_antibody_reagent_forms');
    }
};
