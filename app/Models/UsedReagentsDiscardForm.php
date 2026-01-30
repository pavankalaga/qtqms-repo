<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsedReagentsDiscardForm extends Model
{
    use HasFactory;

    protected $table = 'used_reagents_discard_forms';

    protected $fillable = [
        'doc_no',
        'department',
        'location',
        'row_date',
        'reagent_name',
        'quantity',
        'handover_by',
        'received_by',
        'agency_name',
        'collection_datetime',
        'hod_sign',
        'created_by',
        'updated_by',
    ];
}
