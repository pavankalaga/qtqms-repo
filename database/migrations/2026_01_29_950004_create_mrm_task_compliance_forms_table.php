<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mrm_task_compliance_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->nullable();
            $table->date('meeting_date')->nullable();
            $table->json('tasks')->nullable();
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

            $table->index(['meeting_date'], 'mrm_task_compl_date_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mrm_task_compliance_forms');
    }
};
