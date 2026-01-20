<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirstAidKitLog extends Model
{
    use HasFactory;

    protected $table = 'first_aid_kit_log';

    protected $fillable = [
        'department',
        'month_year',
         'item_available',
            'expiry_date',
            'replaced_item',
            'quantity_replaced',
            'replaced_expiry_date',
            'replaced_by',
            'remarks',
    ];
}
