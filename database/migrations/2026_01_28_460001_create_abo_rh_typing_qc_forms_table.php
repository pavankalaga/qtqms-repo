<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('abo_rh_typing_qc_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/HM/FOM-002');
            $table->date('check_date')->nullable();

            // Anti-A group
            $table->string('anti_a_appearance')->nullable();
            $table->string('anti_a_a')->nullable();
            $table->string('anti_a_b')->nullable();
            $table->string('anti_a_o')->nullable();

            // Anti-B group
            $table->string('anti_b_appearance')->nullable();
            $table->string('anti_b_a')->nullable();
            $table->string('anti_b_b')->nullable();
            $table->string('anti_b_o')->nullable();

            // Anti-D IgM group
            $table->string('anti_d_igm_appearance')->nullable();
            $table->string('anti_d_igm_a')->nullable();
            $table->string('anti_d_igm_b')->nullable();
            $table->string('anti_d_igm_o')->nullable();

            // Anti-D IgG group
            $table->string('anti_d_igg_appearance')->nullable();
            $table->string('anti_d_igg_a')->nullable();
            $table->string('anti_d_igg_b')->nullable();
            $table->string('anti_d_igg_o')->nullable();

            // Anti-A1 group
            $table->string('anti_a1_appearance')->nullable();
            $table->string('anti_a1_a')->nullable();
            $table->string('anti_a1_b')->nullable();
            $table->string('anti_a1_o')->nullable();

            // Anti-H group
            $table->string('anti_h_appearance')->nullable();
            $table->string('anti_h_a')->nullable();
            $table->string('anti_h_b')->nullable();
            $table->string('anti_h_o')->nullable();

            $table->string('done_by')->nullable();
            $table->string('verified_by')->nullable();
            $table->text('remarks')->nullable();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->index('check_date', 'abo_rh_check_date_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('abo_rh_typing_qc_forms');
    }
};
