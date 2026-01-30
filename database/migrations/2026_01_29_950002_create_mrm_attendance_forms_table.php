<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mrm_attendance_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->nullable();
            $table->date('meeting_date')->nullable();
            $table->string('meeting_time')->nullable();
            $table->string('venue')->nullable();
            $table->json('attendees')->nullable();
            $table->text('remarks')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->index(['meeting_date'], 'mrm_attendance_date_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mrm_attendance_forms');
    }
};
