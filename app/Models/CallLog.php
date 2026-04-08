<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallLog extends Model
{
    use HasFactory;
    protected $fillable = ['check_in' , 'check_out' ,'follow_up_start','follow_up_end' ,'call_log_remarks'];
    protected $table = 'call_logs';
}
