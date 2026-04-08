<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'address1' ,'address2','state',
        'city','pincode','salesheadquarter','phone','alternate_phone','email','website','lead_id'
    ];

    protected $table = 'address_details';
}
