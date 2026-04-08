<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessInteligence extends Model
{
    use HasFactory;

    protected $table = 'business_intelligences'; // Ensure this matches the actual table name

    protected $fillable = [
        'no_of_doctors',
        'specialities',
        'lab_revenue',
        'currently_outsourceed_to',
        'description','lead_id'
    ];

    public function expectedBusiness()
    {
        return $this->hasMany(ExpectedBusiness::class, 'business_inteligence_id'); // Ensure the foreign key is correct
    }
    

}
