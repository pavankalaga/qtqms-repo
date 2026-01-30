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
        Schema::create('used_reagents_discard_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/HP/FOM-005');
            $table->string('department')->nullable();
            $table->string('location')->nullable();
            $table->date('row_date')->nullable();
            $table->string('reagent_name')->nullable();
            $table->string('quantity')->nullable();
            $table->string('handover_by')->nullable();
            $table->string('received_by')->nullable();
            $table->string('agency_name')->nullable();
            $table->string('collection_datetime')->nullable();
            $table->string('hod_sign')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->index('row_date');
            $table->index('department');
            $table->index('location');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('used_reagents_discard_forms');
    }
};
