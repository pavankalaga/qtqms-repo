<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactDetail extends Model
{
    use HasFactory;

    protected $fillable = [
       'salutation',
       'first_name',
       'last_name',
       'department',
       'designation',
       'office_phone',
       'mobile_no',
       'office_email',
       'other_email','lead_id',
 

'whats_phone','personal_email','insta_id','twitter_id','linked_id','birthday',
       'authority','anniversary','reli_belief','contact_photo'
    ];
}
