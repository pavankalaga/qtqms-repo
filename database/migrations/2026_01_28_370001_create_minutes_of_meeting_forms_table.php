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
        Schema::create('minutes_of_meeting_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/GE/FOM-039');
            $table->date('meeting_date')->nullable();
            $table->string('venue')->nullable();
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->json('present_attendees')->nullable();
            $table->json('absent_attendees')->nullable();
            $table->json('previous_meeting_actions')->nullable();
            $table->text('summary_discussions')->nullable();
            $table->text('decisions_made')->nullable();
            $table->json('present_meeting_actions')->nullable();
            $table->string('overall_performance')->nullable();
            $table->string('additional_remarks')->nullable();
            $table->date('next_review_date')->nullable();
            $table->string('chairperson_name')->nullable();
            $table->date('chairperson_date')->nullable();
            $table->string('recorder_name')->nullable();
            $table->date('recorder_date')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            // Index for faster queries
            $table->index('meeting_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('minutes_of_meeting_forms');
    }
};
