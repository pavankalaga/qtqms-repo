<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgreedBusiness extends Model
{
    use HasFactory;
    protected $fillable = [
        'lead_id',
        'test_name',
        'expected_qty_day',
        'expected_l2l_price',
        'amount',
        'total',
    ];
    protected $table = 'agreed_business';
}
