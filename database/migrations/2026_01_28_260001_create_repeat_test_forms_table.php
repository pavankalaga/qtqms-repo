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
        Schema::create('repeat_test_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/GE/FOM-023');
            $table->string('department')->nullable();
            $table->string('location')->nullable();
            $table->date('test_date')->nullable();
            $table->string('visit_id')->nullable();
            $table->string('parameter')->nullable();
            $table->text('reason')->nullable();
            $table->string('authorised_by')->nullable();
            $table->string('result_a')->nullable();
            $table->string('result_b')->nullable();
            $table->string('result_c')->nullable();
            $table->string('lims_entry')->nullable();
            $table->string('reviewed_by')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            // Index for faster queries
            $table->index('test_date');
            $table->index('department');
            $table->index('location');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repeat_test_forms');
    }
};
