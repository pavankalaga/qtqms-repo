<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\BusinessInfoDetails;
use App\Models\Salesheadquarter; 
use Auth;
use App\Models\CallLog;
use App\Models\LeadTag;

class SalesCallLog extends Component
{
    private $call_logs;
    protected $reports; // Change visibility to protected
    protected $listeners = ['deleteReport'];
    public $user,$lead_ids ;
    public $sales_head_quarters = []; 
    public $users , $assign_date;

    public function mount() // Fetch all reports when the component is mounted
    {
        $this->user = Auth::user();
        $this->reports = BusinessInfoDetails::with(['user','salesheadquarters'])->join('sales_call','sales_call.lead_ids','=','business_info.id')->orderBy('business_info.id', 'desc')->paginate(10);
        $this->sales_head_quarters = Salesheadquarter::all();
        $this->call_logs = CallLog::paginate(10);
        $this->users = User::get();
        // dd($this->users);
    }
    public function render()
    {
        $call_logs = CallLog::paginate(10);
        return view('livewire.sales-call-log', [
            'reports' => $this->reports ?? BusinessInfoDetails::with(['user','salesheadquarters','assign_user'])->whereNull('assign_user')->orderBy('id', 'desc')->paginate(10),
            'call_logs' => $call_logs
         ]);
    }
}
