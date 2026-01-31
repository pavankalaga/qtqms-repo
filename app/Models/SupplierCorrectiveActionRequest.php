<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierCorrectiveActionRequest extends Model
{
    protected $table = 'supplier_corrective_action_requests';

    protected $fillable = [
        // Supplier Information
        'supplier_name',
        'attention',
        'phone',
        'email',

        // Description of Nonconformance
        'nonconformance_description',
        'po_number',
        'product_number',
        'product_name',
        'quantity_affected',

        // Date and Employee
        'date_sent',
        'sent_by',

        // Supplier Response
        'root_cause',
        'corrective_action',
        'supplier_manager_signature',
        'supplier_signature_date',
        'supplier_name_title',

        // TRUSTlab Review
        'response_accepted',
        'purchasing_signature',
        'purchasing_date',
    ];
}
