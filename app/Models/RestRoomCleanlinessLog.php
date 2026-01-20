<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestRoomCleanlinessLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'log_date',
        'month_year',
        'floor_morning',
        'floor_afternoon',
        'floor_evening',
        'hand_wash_morning',
        'hand_wash_afternoon',
        'hand_wash_evening',
        'wc_morning',
        'wc_afternoon',
        'wc_evening'
    ];

    protected $dates = ['log_date'];
}
