<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceLog extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'instrument_id', 'task', 'days_data', 'type', 'tasks'];

    protected $casts = [
        'days_data' => 'array', // Automatically decode JSON to array
    ];
}
