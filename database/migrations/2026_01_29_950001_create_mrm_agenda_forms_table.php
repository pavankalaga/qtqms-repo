<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mrm_agenda_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->nullable();
            $table->date('mrm_date')->nullable();
            $table->string('mrm_time')->nullable();
            $table->string('location')->nullable();
            $table->string('duration')->nullable();
            $table->string('chairperson')->nullable();
            $table->string('recorder')->nullable();
            $table->json('attendees')->nullable();
            $table->json('agenda_completed')->nullable();
            $table->date('confirmation_date')->nullable();
            $table->string('sender_name')->nullable();
            $table->string('contact_details')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->index(['mrm_date'], 'mrm_agenda_date_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mrm_agenda_forms');
    }
};
