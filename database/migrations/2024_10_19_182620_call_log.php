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
        Schema::create('call_logs', function (Blueprint $table) {
            $table->increments('id');  // Auto-incrementing primary key
            $table->dateTime('check_in')->nullable(); // Use dateTime to store both date and time
            $table->dateTime('check_out')->nullable(); // Use dateTime to store both date and time
            $table->date('follow_up_start')->nullable(); // For start of follow-up
            // $table->date('follow_up_end')->nullable();   // For end of follow-up
            $table->text('call_log_remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('call_logs');
    }
};
