<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialPreferences extends Model
{
    use HasFactory;
    protected $fillable = [
       'payment_preference','lead_id','payment_term','payment_method','volume_discount','pref_day_samples','pref_day_rs','communication_preference','pref_meeting_day','pref_meeting_time','volume_discount','pref_day_samples','pref_day_rs'
    ];

    protected $table = 'finance_preferences';
}



