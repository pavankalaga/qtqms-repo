<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceExpectation extends Model
{
    use HasFactory;

    protected $fillable = [
        'open_timings_from_week','open_timings_to_week','no_of_pickup_week','no_of_pickup_1','no_of_pickup_2','no_of_pickup_3','no_of_pickup_4','no_of_pickup_5','open_timings_from_public','open_timings_to_public','no_of_pickup_public','no_of_pickup_public_1','business_type_week','business_type_public','no_of_pickup_public_2','no_of_pickup_public_3','no_of_pickup_public_4','no_of_pickup_public_5','lead_id','home_collection','it_integration','nabl_certificate','nabl_accreditation','cus_tat_sensitive','cus_willing_to_pay','cus_quality_focus','cus_price_sensitive',
'business_inteligence_id','lead_id', 'inhouse','test_name','method','current_load_month','outsource','outsource_to','current_l2l_price','expected_revenue','expected_qty_day',
        '','','','','',
    ];

    protected $table = 'service_exception';
}


 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 