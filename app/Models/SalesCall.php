<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesCall extends Model
{
    use HasFactory;

    protected $table= 'sales_call';
    protected $fillable = ['lead_ids','assign_date'];
    
}
