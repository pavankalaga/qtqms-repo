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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role')->nullable();
            $table->string('reported_to')->nullable();
            $table->unsignedBigInteger('tree_role_id')->nullable(); // Links to tree_roles
            $table->string('address')->nullable();
            $table->string('number')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->unsignedBigInteger('sales_headquarter_id')->nullable();
            $table->string('ZIP')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();

            // // Foreign Key Constraints
            // $table->foreign('sales_headquarter_id')
            //       ->references('id')
            //       ->on('sales_headquarters') // Correct table name
            //       ->onDelete('set null');

            // $table->foreign('tree_role_id')
            //       ->references('id')
            //       ->on('tree_roles')
            //       ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
