<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{BusinessInteligence, ExpectedBusiness, BusinessInfoDetails,AddressDetails,FinancialPreferences,Document,ServiceExpectation,Note,SocialMedia,SampleTestCapability,InHouseTest,DiagnosticNeeds,CurrentServiceChallenges};
use App\Models\ContactDetail;
use App\Models\Salesheadquarter;

class BusinessInfoDetails extends Model
{
    use HasFactory;

    protected $table = 'business_info';
    protected $fillable = [
        'business_name',
        'business_type',
        'legal_business_type',
        'registered_no',
        'incorporation_date',
        'incorporation_no',
        'pan_no',
        'tan_no',
        'gst_no',
        'trading_name','registered_no_expiry','inc_state'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'assign_user');
    }

    public function salesheadquarters(){
        return $this->belongsTo(Salesheadquarter::class,'salesheadquarter');
    }
    public function assign_user()
    {
        return $this->hasOne(SalesCall::class, 'lead_ids', 'id');
    }

      public function financialPreferences()
    {
        return $this->hasOne(FinancialPreferences::class); // or hasMany if there are multiple records
    }

    public function socialMedia()
    {
        return $this->hasOne(SocialMedia::class); // or hasMany if there are multiple records
    }

    public function sampleTestCapability()
    {
        return $this->hasOne(SampleTestCapability::class); // or hasMany if there are multiple records
    }

    public function inHouseTests()
    {
        return $this->hasOne(InHouseTest::class); // or hasMany if there are multiple records
    }

    public function diagnosticNeeds()
    {
        return $this->hasOne(DiagnosticNeeds::class); // or hasMany if there are multiple records
    }

    public function currentServiceChallenges()
    {
        return $this->hasOne(CurrentServiceChallenges::class); // or hasMany if there are multiple records
    }

      public function Inpatient()
    {
        return $this->hasOne(InPatient::class); // or hasMany if there are multiple records
    }

}
