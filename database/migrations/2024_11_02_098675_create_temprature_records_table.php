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

       Schema::create('temperature_records', function (Blueprint $table) {
         $table->id();
         $table->integer('record_date');
         $table->decimal('morning_temperature', 5, 2)->nullable();
         $table->string('morning_signature')->nullable();
         $table->decimal('evening_temperature', 5, 2)->nullable();
         $table->string('evening_signature')->nullable();
         $table->timestamps();
     });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_info');
    }
  };

?>