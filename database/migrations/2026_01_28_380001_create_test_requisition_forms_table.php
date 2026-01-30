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
        Schema::create('test_requisition_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/GE/FOM-040');
            $table->date('requisition_date')->nullable();
            $table->string('client_name')->nullable();
            $table->string('client_code')->nullable();
            $table->string('patient_name')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email_id')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('age_years')->nullable();
            $table->string('age_months')->nullable();
            $table->string('age_days')->nullable();
            $table->string('gender')->nullable();
            $table->string('referring_doctor')->nullable();
            $table->string('address_contact')->nullable();
            $table->date('sample_drawn_date')->nullable();
            $table->string('sample_drawn_time')->nullable();
            $table->string('sample_drawn_ampm')->nullable();
            $table->date('lmp_date')->nullable();
            $table->date('sample_shipment_date')->nullable();
            $table->integer('no_of_containers')->nullable();
            $table->json('test_details')->nullable();
            $table->text('clinical_history')->nullable();
            $table->string('temp_sent_18_24')->nullable();
            $table->string('temp_sent_2_8')->nullable();
            $table->string('temp_sent_below_0')->nullable();
            $table->string('temp_received_18_24')->nullable();
            $table->string('temp_received_2_8')->nullable();
            $table->string('temp_received_below_0')->nullable();
            $table->datetime('specimen_received_datetime')->nullable();
            $table->integer('no_of_samples')->nullable();
            $table->string('transported_by')->nullable();
            $table->string('received_by')->nullable();
            $table->string('received_time')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            // Indexes for faster queries
            $table->index('requisition_date');
            $table->index('patient_name');
            $table->index('client_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_requisition_forms');
    }
};
