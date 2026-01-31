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
        Schema::create('supplier_corrective_action_requests', function (Blueprint $table) {
            $table->id();

            // Supplier Information
            $table->string('supplier_name')->nullable();
            $table->string('attention')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            // Description of Nonconformance
            $table->text('nonconformance_description')->nullable();
            $table->string('po_number')->nullable();
            $table->string('product_number')->nullable();
            $table->string('product_name')->nullable();
            $table->string('quantity_affected')->nullable();

            // Date and Employee
            $table->date('date_sent')->nullable();
            $table->string('sent_by')->nullable();

            // Supplier Response
            $table->text('root_cause')->nullable();
            $table->text('corrective_action')->nullable();
            $table->string('supplier_manager_signature')->nullable();
            $table->date('supplier_signature_date')->nullable();
            $table->string('supplier_name_title')->nullable();

            // TRUSTlab Review
            $table->string('response_accepted')->nullable();
            $table->string('purchasing_signature')->nullable();
            $table->date('purchasing_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier_corrective_action_requests');
    }
};
