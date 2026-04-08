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
        Schema::create('lead_assign_users', function (Blueprint $table) {
            $table->increments('id');  // Auto-incrementing primary key
            $table->string('salesheadquarter_id')->nullable();
            $table->string('assign_user')->nullable();
            
            // Foreign key reference
            $table->unsignedBigInteger('lead_id')->nullable();

            $table->foreign('lead_id')->references('id')->on('business_info')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lead_assign_users');
    }
};
