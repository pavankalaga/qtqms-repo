<?php

namespace App\Http\Controllers;

use App\Models\Role;

class MyDataController extends Controller
{
    protected $is_my_data_page;

    public function __construct()
    {
        // Set the variable value
        $this->is_my_data_page = true;

        // Share it globally with all views in this controller
        view()->share('is_my_data_page', $this->is_my_data_page);
    }
    
    public function my_tasks(){
       
         return view('mydata.my-activities');
    }
    public function my_sales(){
       
         return view('mydata.my-sales');
    }
    public function my_calender(){
       
         return view('mydata.my-calender');
    }   
    public function my_tourplan(){
       
         return view('mydata.tour-plan');
    }
    public function my_travel_expenses(){
       
         return view('mydata.travel-expenses');
    }
    public function my_messages(){
       
         return view('mydata.my-messages');
    }
    public function my_team(){
       
         return view('mydata.my-team');
    }
    public function my_ageing_receivables(){
       
         return view('mydata.my-ageing-receivables');
    }
    public function my_dcr(){
       
         return view('mydata.my-dcr');
    }
    public function my_dashboard(){
       
         return view('mydata.my-dashboard');
    }
    public function my_approvals(){
       
         return view('mydata.my-approvals');
    }
    public function forecast(){
       
         return view('mydata.forecast');
    }
    public function marketing(){
       
         return view('mydata.marketing');
    }
    public function broadcast(){
       
         return view('mydata.broadcast');
    }
    public function my_global_calander(){
       
         return view('mydata.globalcalendar');
    }
   
}
