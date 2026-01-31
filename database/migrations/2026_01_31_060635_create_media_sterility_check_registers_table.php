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
        Schema::create('media_sterility_check_registers', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->nullable();

            $table->date('row_date')->nullable();
            $table->string('batch_no')->nullable();
            $table->string('media_details')->nullable();
            $table->string('expected_growth')->nullable();
            $table->string('sterility_24')->nullable();
            $table->string('sterility_48')->nullable();
            $table->string('sterility_checked')->nullable();
            $table->string('done_by')->nullable();
            $table->string('checked_by')->nullable();
            $table->string('hod_remarks')->nullable();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->index(['doc_no', 'row_date'], 'media_ster_chk_docno_date_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_sterility_check_registers');
    }
};
