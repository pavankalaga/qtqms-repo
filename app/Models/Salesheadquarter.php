<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salesheadquarter extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    protected $table = 'sales_headquarters';
}
