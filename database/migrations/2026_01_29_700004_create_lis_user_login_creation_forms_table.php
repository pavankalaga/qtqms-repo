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
        Schema::create('lis_user_login_creation_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->nullable();
            $table->date('date')->nullable();
            $table->string('employee_no')->nullable();
            $table->string('employee_name')->nullable();
            $table->string('department')->nullable();
            $table->string('email')->nullable();
            $table->string('lims_id')->nullable();
            $table->string('requested_by')->nullable();
            $table->json('roles')->nullable();
            $table->string('authorized_by')->nullable();
            $table->string('reason')->nullable();
            $table->string('login_created')->nullable();
            $table->date('created_date')->nullable();
            $table->string('login_by')->nullable();
            $table->string('sign')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lis_user_login_creation_forms');
    }
};
