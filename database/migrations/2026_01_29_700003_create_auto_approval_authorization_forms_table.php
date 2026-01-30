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
        Schema::create('auto_approval_authorization_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->nullable();
            $table->string('department')->nullable();
            $table->json('tests_data')->nullable();
            $table->json('criteria_data')->nullable();
            $table->json('authorized_data')->nullable();
            $table->string('log_registration')->nullable();
            $table->string('log_receive')->nullable();
            $table->string('log_result')->nullable();
            $table->string('log_reports')->nullable();
            $table->text('declaration')->nullable();
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
        Schema::dropIfExists('auto_approval_authorization_forms');
    }
};
