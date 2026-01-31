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
        Schema::create('authorized_specimen_signatures', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->nullable();
            $table->string('issue_no')->nullable();
            $table->string('issue_date')->nullable();
            $table->string('month_year')->nullable();
            $table->string('location')->nullable();
            $table->string('department')->nullable();
            $table->json('signatures')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authorized_specimen_signatures');
    }
};
