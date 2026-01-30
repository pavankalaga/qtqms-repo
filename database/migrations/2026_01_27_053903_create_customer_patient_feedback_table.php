<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customer_patient_feedbacks', function (Blueprint $table) {
            $table->id();

            // BASIC DETAILS
            $table->string('name')->nullable();
            $table->string('barcode')->nullable();
            $table->date('date')->nullable();
            $table->string('address')->nullable();
            $table->string('contact_no')->nullable();

            // RATINGS (9 QUESTIONS)
            $table->string('rating_0')->nullable();
            $table->string('rating_1')->nullable();
            $table->string('rating_2')->nullable();
            $table->string('rating_3')->nullable();
            $table->string('rating_4')->nullable();
            $table->string('rating_5')->nullable();
            $table->string('rating_6')->nullable();
            $table->string('rating_7')->nullable();
            $table->string('rating_8')->nullable();

            // REMARKS (9 QUESTIONS)
            $table->text('remarks_0')->nullable();
            $table->text('remarks_1')->nullable();
            $table->text('remarks_2')->nullable();
            $table->text('remarks_3')->nullable();
            $table->text('remarks_4')->nullable();
            $table->text('remarks_5')->nullable();
            $table->text('remarks_6')->nullable();
            $table->text('remarks_7')->nullable();
            $table->text('remarks_8')->nullable();

            // ADDITIONAL FEEDBACK
            $table->text('additional_feedback')->nullable();

            // SIGNATURE
            $table->string('signature')->nullable();

            // OFFICE USE
            $table->string('communicated')->nullable();
            $table->string('complainant_id')->nullable();
            $table->date('complaint_date')->nullable();
            $table->text('complaint_description')->nullable();
            $table->text('complaint_action')->nullable();
            $table->date('closure_date')->nullable();

            // ACTION DETAILS
            $table->string('by')->nullable();
            $table->date('on')->nullable();
            $table->text('preventive_action')->nullable();

            // APPROVAL
            $table->string('reviewed_by')->nullable();
            $table->string('approved_by')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customer_patient_feedbacks');
    }
};
