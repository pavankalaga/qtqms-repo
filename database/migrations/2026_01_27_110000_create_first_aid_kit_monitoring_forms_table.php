<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * TDPL/GE/FOM-001 - First Aid Kit Monitoring Form
     */
    public function up(): void
    {
        Schema::create('first_aid_kit_monitoring_forms', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no')->default('TDPL/GE/FOM-001');

            // Filter fields
            $table->string('month_year')->nullable(); // Format: YYYY-MM
            $table->string('location')->nullable();
            $table->string('department')->nullable();

            // Table row data
            $table->string('items_available')->nullable();
            $table->date('expiry_date_1')->nullable();
            $table->string('replaced_item')->nullable();
            $table->integer('quantity_replaced')->nullable();
            $table->date('expiry_date_2')->nullable();
            $table->date('replaced_on')->nullable();
            $table->string('replaced_by')->nullable();
            $table->text('remarks')->nullable();

            // Footer
            $table->string('verified_by')->nullable();

            // Audit fields
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->timestamps();

            // Foreign keys
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('first_aid_kit_monitoring_forms');
    }
};
