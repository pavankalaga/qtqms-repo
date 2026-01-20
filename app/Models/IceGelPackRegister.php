<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IceGelPackRegister extends Model
{
    use HasFactory;

    protected $table = 'ice_gel_pack_registers';

    protected $fillable = [
        'date',
        'location',
        'department',
        'quantity',
        'handed_over_by',
        'received_by',
        'returned',
        'remarks',
    ];

}
