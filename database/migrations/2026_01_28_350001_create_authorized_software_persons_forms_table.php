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
        Schema::create('authorized_software_persons_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/GE/FOM-037');
            $table->string('month_year')->nullable();
            $table->string('location')->nullable();
            $table->string('department')->nullable();
            $table->json('daily_data')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            // Indexes for faster queries
            $table->index('month_year');
            $table->index('location');
            $table->index('department');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authorized_software_persons_forms');
    }
};
