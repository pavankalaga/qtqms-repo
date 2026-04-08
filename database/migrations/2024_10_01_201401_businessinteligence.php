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
        Schema::create('business_intelligences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lead_id')->nullable();

            $table->foreign('lead_id')->references('id')->on('business_info')->onDelete('cascade');
            
            $table->string('no_of_doctors')->nullable();
            $table->string('specialities')->nullable();
            $table->string('lab_revenue')->nullable();
            $table->string('currently_outsourceed_to')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_inteligence');
    }
};
