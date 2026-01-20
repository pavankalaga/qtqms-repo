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
        Schema::create('agreed_business', function (Blueprint $table) {
            $table->id();
           $table->integer('lead_id');
            $table->string('test_name')->nullable();
            $table->string('expected_qty_day')->nullable();
            $table->string('expected_l2l_price')->nullable();
            $table->string('amount')->nullable();
            $table->string('total')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::dropIfExists('agreed_business');
    }
};
