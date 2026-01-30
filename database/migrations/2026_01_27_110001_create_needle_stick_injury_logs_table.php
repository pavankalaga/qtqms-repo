<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * TDPL/GE/FOM-002 - Needle Stick Injury Log Form
     */
    public function up(): void
    {
        Schema::create('needle_stick_injury_logs', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/GE/FOM-002');

            // Form fields
            $table->string('injured_person')->nullable();
            $table->datetime('exposure_datetime')->nullable();
            $table->text('sequence_of_events')->nullable();
            $table->text('details_of_exposure')->nullable();
            $table->text('counseling_details')->nullable();
            $table->text('source_person_info')->nullable();
            $table->text('preventive_steps')->nullable();
            $table->string('recorded_by')->nullable();
            $table->date('recorded_date')->nullable();

            // Audit fields
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->timestamps();

            // Foreign keys
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('needle_stick_injury_logs');
    }
};
