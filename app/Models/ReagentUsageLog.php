<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReagentUsageLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'department',
        'month_year',
        'date',
        'reagent_name',
        'lot_no',
        'expiry_date',
        'scientific_staff_signature',
        'supervisor_signature'
    ];
}
