<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('loop_maintenance_registers', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->nullable();

            $table->date('row_date')->nullable();
            $table->string('lot_number')->nullable();
            $table->date('date_calibration')->nullable();
            $table->string('calibration_status')->nullable();
            $table->string('verified_by')->nullable();
            $table->string('hod_sign')->nullable();
            $table->string('remarks')->nullable();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->index(['doc_no', 'row_date'], 'loop_maint_reg_docno_date_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loop_maintenance_registers');
    }
};
