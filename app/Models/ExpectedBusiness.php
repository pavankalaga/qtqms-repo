<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpectedBusiness extends Model
{
    use HasFactory;

    protected $table = 'business_intelligence_expected_business';
    protected $fillable = ['business_inteligence_id','lead_id', 'inhouse','test_name','method','current_load_month','outsource','outsource_to','current_l2l_price','expected_revenue','expected_qty_day'];
    public function businessIntelligence()
    {
        return $this->belongsTo(BusinessInteligence::class);
    }


}
