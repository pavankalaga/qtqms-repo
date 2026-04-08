<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadTag extends Model
{
    use HasFactory;

    protected $fillable = ['lead_id', 'salesheadquarter_id', 'assign_user'];

    protected $table = 'lead_assign_users';

    
}
