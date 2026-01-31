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
        Schema::create('incoming_material_inspections', function (Blueprint $table) {
            $table->id();

            // Basic Info
            $table->string('supplier_name')->nullable();
            $table->string('po_number')->nullable();
            $table->string('inspector_name')->nullable();
            $table->date('po_date')->nullable();
            $table->date('inspection_date')->nullable();
            $table->string('invoice_number')->nullable();

            // Section 1: Product Identification & Documentation (4 items)
            $table->string('section1_item0')->nullable();
            $table->string('section1_item1')->nullable();
            $table->string('section1_item2')->nullable();
            $table->string('section1_item3')->nullable();
            $table->text('section1_notes')->nullable();

            // Section 2: Quantity Verification (3 items)
            $table->string('section2_item0')->nullable();
            $table->string('section2_item1')->nullable();
            $table->string('section2_item2')->nullable();
            $table->text('section2_notes')->nullable();

            // Section 3: Packaging and Labeling (4 items)
            $table->string('section3_item0')->nullable();
            $table->string('section3_item1')->nullable();
            $table->string('section3_item2')->nullable();
            $table->string('section3_item3')->nullable();
            $table->text('section3_notes')->nullable();

            // Section 4: Visual Inspection (3 items)
            $table->string('section4_item0')->nullable();
            $table->string('section4_item1')->nullable();
            $table->string('section4_item2')->nullable();
            $table->text('section4_notes')->nullable();

            // Section 5: Arrival Temperature (3 items)
            $table->string('section5_item0')->nullable();
            $table->string('section5_item1')->nullable();
            $table->string('section5_item2')->nullable();
            $table->text('section5_notes')->nullable();

            // Section 6: Functional & Performance Testing (3 items)
            $table->string('section6_item0')->nullable();
            $table->string('section6_item1')->nullable();
            $table->string('section6_item2')->nullable();
            $table->text('section6_notes')->nullable();

            // Section 7: Non-Conformance & Disposition (3 items)
            $table->string('section7_item0')->nullable();
            $table->string('section7_item1')->nullable();
            $table->string('section7_item2')->nullable();
            $table->text('section7_notes')->nullable();

            // Additional
            $table->text('additional_notes')->nullable();

            // Compliance
            $table->string('compliance_inspector_name')->nullable();
            $table->string('compliance_signature')->nullable();
            $table->date('compliance_inspection_date')->nullable();

            // Approver
            $table->string('approver_name')->nullable();
            $table->string('approver_signature')->nullable();
            $table->date('approver_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incoming_material_inspections');
    }
};
