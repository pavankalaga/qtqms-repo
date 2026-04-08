<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentServiceChallenges extends Model
{
    use HasFactory;

     protected $fillable = [
        'challenges_faced_1' ,'challenges_faced_2','challenges_faced_3' ,'challenges_faced_4','challenges_faced_5','challenges_faced_6','lead_id'
    ];

    protected $table = 'current_service_challenges';
}

