<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('minutes_of_mrm_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->nullable();
            $table->date('meeting_date')->nullable();
            $table->json('present')->nullable();
            $table->json('absent')->nullable();
            $table->string('venue')->nullable();
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->json('previous_actions')->nullable();
            $table->text('summary')->nullable();
            $table->text('decisions')->nullable();
            $table->json('current_actions')->nullable();
            $table->string('performance')->nullable();
            $table->text('remarks')->nullable();
            $table->date('next_review')->nullable();
            $table->string('chairperson')->nullable();
            $table->date('chairperson_date')->nullable();
            $table->string('recorder')->nullable();
            $table->date('recorder_date')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->index(['meeting_date'], 'minutes_mrm_date_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('minutes_of_mrm_forms');
    }
};
