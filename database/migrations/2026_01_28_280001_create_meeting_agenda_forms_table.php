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
        Schema::create('meeting_agenda_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/GE/FOM-027');
            $table->date('meeting_date')->nullable();
            $table->string('meeting_time')->nullable();
            $table->string('meeting_location')->nullable();
            $table->string('meeting_duration')->nullable();
            $table->string('chairperson')->nullable();
            $table->string('recorder')->nullable();
            $table->json('attendees')->nullable();
            $table->string('meeting_topic')->nullable();
            $table->json('agenda_items')->nullable();
            $table->date('confirmation_date')->nullable();
            $table->string('sender_name')->nullable();
            $table->string('sender_designation')->nullable();
            $table->string('sender_contact')->nullable();
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
        Schema::dropIfExists('meeting_agenda_forms');
    }
};
