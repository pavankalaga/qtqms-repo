<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Drop child items table first (has FK to parent)
        Schema::dropIfExists('sample_volume_check_items');

        // Restructure parent table to use JSON storage (matching Hot Plate QC pattern)
        Schema::table('sample_volume_checks', function (Blueprint $table) {
            $table->dropUnique(['month', 'year']);
            $table->dropColumn(['month', 'year', 'status']);

            $table->string('month_year')->nullable();
            $table->json('containers')->nullable();
            $table->string('doc_no')->nullable();
            $table->string('issue_no')->nullable();
            $table->date('issue_date')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('sample_volume_checks', function (Blueprint $table) {
            $table->dropColumn(['month_year', 'containers', 'doc_no', 'issue_no', 'issue_date']);

            $table->unsignedTinyInteger('month');
            $table->unsignedSmallInteger('year');
            $table->enum('status', ['draft', 'submitted', 'reviewed'])->default('draft');
            $table->unique(['month', 'year']);
        });

        Schema::create('sample_volume_check_items', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sample_volume_check_id');
            $table->string('container_type');
            $table->integer('required_qty')->nullable();
            $table->integer('actual_qty')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
            $table->foreign('sample_volume_check_id')
                  ->references('id')
                  ->on('sample_volume_checks')
                  ->onDelete('cascade');
        });
    }
};
