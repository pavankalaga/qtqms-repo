<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncomingMaterialInspection extends Model
{
    protected $table = 'incoming_material_inspections';

    protected $fillable = [
        // Basic Info
        'supplier_name',
        'po_number',
        'inspector_name',
        'po_date',
        'inspection_date',
        'invoice_number',

        // Section 1: Product Identification & Documentation
        'section1_item0', 'section1_item1', 'section1_item2', 'section1_item3',
        'section1_notes',

        // Section 2: Quantity Verification
        'section2_item0', 'section2_item1', 'section2_item2',
        'section2_notes',

        // Section 3: Packaging and Labeling
        'section3_item0', 'section3_item1', 'section3_item2', 'section3_item3',
        'section3_notes',

        // Section 4: Visual Inspection
        'section4_item0', 'section4_item1', 'section4_item2',
        'section4_notes',

        // Section 5: Arrival Temperature
        'section5_item0', 'section5_item1', 'section5_item2',
        'section5_notes',

        // Section 6: Functional & Performance Testing
        'section6_item0', 'section6_item1', 'section6_item2',
        'section6_notes',

        // Section 7: Non-Conformance & Disposition
        'section7_item0', 'section7_item1', 'section7_item2',
        'section7_notes',

        // Additional
        'additional_notes',

        // Compliance
        'compliance_inspector_name',
        'compliance_signature',
        'compliance_inspection_date',

        // Approver
        'approver_name',
        'approver_signature',
        'approver_date',
    ];
}
