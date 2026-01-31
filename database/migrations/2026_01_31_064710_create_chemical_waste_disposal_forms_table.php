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
        Schema::create('chemical_waste_disposal_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->nullable();
            $table->string('issue_no')->nullable();
            $table->string('issue_date')->nullable();
            $table->string('month_year')->nullable();
            $table->string('location')->nullable();

            // 10 item rows – each with 9 fields (shorter varchar to fit row size)
            for ($i = 1; $i <= 10; $i++) {
                $table->string("item_{$i}", 50)->nullable();
                $table->string("description_{$i}", 100)->nullable();
                $table->string("unit_pack_{$i}", 50)->nullable();
                $table->string("reason_{$i}", 100)->nullable();
                $table->string("method_{$i}", 80)->nullable();
                $table->string("qty_{$i}", 30)->nullable();
                $table->string("unit_cost_{$i}", 30)->nullable();
                $table->string("total_value_{$i}", 30)->nullable();
                $table->string("remarks_{$i}", 100)->nullable();
            }

            $table->string('overall_total', 30)->nullable();

            // Signature rows
            $table->string('store_incharge', 100)->nullable();
            $table->string('store_incharge_sign', 100)->nullable();
            $table->string('store_incharge_date', 20)->nullable();
            $table->string('head_facility', 100)->nullable();
            $table->string('head_facility_sign', 100)->nullable();
            $table->string('head_facility_date', 20)->nullable();
            $table->string('disposing_staff', 100)->nullable();
            $table->string('disposing_staff_sign', 100)->nullable();
            $table->string('disposing_staff_date', 20)->nullable();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->index('month_year', 'chem_waste_month_year_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chemical_waste_disposal_forms');
    }
};
