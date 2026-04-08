<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contact_details', function (Blueprint $table) {
            $table->id();
            $table->string('salutation')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('department')->nullable();
            $table->string('designation')->nullable();
            $table->string('office_phone')->nullable();
            $table->string('mobile_no')->nullable();

            $table->string('office_email')->nullable();
            $table->string('other_email')->nullable();

            $table->unsignedBigInteger('lead_id')->nullable();

            $table->foreign('lead_id')->references('id')->on('business_info')->onDelete('cascade');


            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_details');
    }
};
