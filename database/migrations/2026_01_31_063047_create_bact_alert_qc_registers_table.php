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
        Schema::create('bact_alert_qc_registers', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->nullable();

            $table->date('row_date')->nullable();
            $table->string('lot_expiry')->nullable();
            $table->string('atcc_no')->nullable();
            $table->string('inoculum_density')->nullable();
            $table->string('growth_observation')->nullable();
            $table->string('gram_stain_observation')->nullable();
            $table->string('acceptable')->nullable();
            $table->string('not_acceptable')->nullable();
            $table->string('done_by')->nullable();
            $table->string('checked_by')->nullable();
            $table->string('hod_sign')->nullable();
            $table->string('remarks')->nullable();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->index(['doc_no', 'row_date'], 'bact_alert_qc_docno_date_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bact_alert_qc_registers');
    }
};
