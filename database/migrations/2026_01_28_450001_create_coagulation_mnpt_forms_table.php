<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('coagulation_mnpt_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/HM/FOM-001');
            $table->string('location')->nullable();
            $table->string('instrument_name')->nullable();
            $table->string('instrument_id')->nullable();
            $table->json('rows_data')->nullable();
            $table->string('geo_mean_pt')->nullable();
            $table->string('geo_mean_aptt')->nullable();
            $table->string('arith_mean_pt')->nullable();
            $table->string('arith_mean_aptt')->nullable();
            $table->string('sd_pt')->nullable();
            $table->string('sd_aptt')->nullable();
            $table->string('mean2sd_pt')->nullable();
            $table->string('mean2sd_aptt')->nullable();
            $table->string('mean_minus_2sd_pt')->nullable();
            $table->string('mean_minus_2sd_aptt')->nullable();
            $table->string('cv_pt')->nullable();
            $table->string('cv_aptt')->nullable();
            $table->string('pt_lot')->nullable();
            $table->date('pt_expiry')->nullable();
            $table->date('pt_performed')->nullable();
            $table->string('aptt_lot')->nullable();
            $table->date('aptt_expiry')->nullable();
            $table->date('aptt_performed')->nullable();
            $table->string('performed_by')->nullable();
            $table->string('verified_by')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->index('location', 'cmnpt_location_idx');
            $table->index('instrument_name', 'cmnpt_instrument_idx');
            $table->index('pt_performed', 'cmnpt_pt_performed_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coagulation_mnpt_forms');
    }
};
