<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeepFreezerTemperatureLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'lab_id',
        'instrument_id',
        'log_date',
        'month_year',
        'morning_temperature',
        'morning_signature',
        'evening_temperature',
        'evening_signature'
    ];

    protected $dates = ['log_date'];

    public function lab()
    {
        return $this->belongsTo(Location::class);
    }

    // public function instrument()
    // {
    //     return $this->belongsTo(Instrument::class);
    // }
}
