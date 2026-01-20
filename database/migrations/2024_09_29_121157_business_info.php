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
        Schema::create('business_info', function (Blueprint $table) {
            $table->id();
            $table->string('business_name')->nullable();
            $table->string('business_type')->nullable();
            $table->string('legal_business_type')->nullable();
            $table->string('registered_no')->nullable();
            $table->string('incorporation_no')->nullable();
            $table->string('pan_no')->nullable();
            $table->string('tan_no')->nullable();

            $table->string('alternate_phone')->nullable();
            $table->string('alternative_email')->nullable();
            $table->string('incorporation_date')->nullable();


            $table->string('description')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('pincode')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->string('status')->nullable();
            $table->string('source')->nullable();
            $table->string('opportunity')->nullable();
            $table->string('industry')->nullable();
            $table->unsignedBigInteger('assign_user')->nullable();
            $table->text('intelligence_description')->nullable();
            $table->text('remark_description')->nullable();
            $table->text('loss_description')->nullable();
            $table->string('salesheadquarter')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_info');
    }
};
