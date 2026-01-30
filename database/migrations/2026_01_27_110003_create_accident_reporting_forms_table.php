<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * TDPL/GE/FOM-004 - Accident Reporting Form
     * Note: from_date and to_date are filters only (not stored in DB)
     */
    public function up(): void
    {
        Schema::create('accident_reporting_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/GE/FOM-004');

            // Only location is stored (from_date/to_date are filter-only)
            $table->string('location')->nullable();

            // Form fields
            $table->datetime('date_time')->nullable();
            $table->string('person_involved')->nullable();
            $table->string('injuries_sustained')->nullable();
            $table->string('emergency_first_aid')->nullable();
            $table->string('first_aid_by')->nullable();
            $table->text('follow_up_action')->nullable();
            $table->text('preventive_action')->nullable();

            // Audit fields
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->timestamps();

            // Foreign keys
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');

            // Index for filter queries
            $table->index(['location', 'date_time']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accident_reporting_forms');
    }
};
