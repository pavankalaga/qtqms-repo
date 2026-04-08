<?php

namespace App\Http\Livewire;
use App\Models\SalesCall;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\BusinessInfoDetails;
use App\Models\Salesheadquarter;
use Auth;
use App\Models\CallLog;
use App\Models\LeadTag;

class SalesCallTab extends Component
{

    public $check_in;
    public $check_out;
    public $follow_up_start; // Corrected naming
    public $follow_up_end;   // Corrected naming
    public $call_log_remarks;
    private $call_logs;
    protected $reports; // Change visibility to protected
    protected $listeners = ['deleteReport'];
    public $user;
    public $lead_ids = [];
    public $sales_head_quarters = [];
    public $users, $assign_date;

    public function mount() // Fetch all reports when the component is mounted
    {
        $this->user = Auth::user();
        $this->reports = BusinessInfoDetails::with(['user', 'salesheadquarters'])
            // ->whereNotIn('id', SalesCall::pluck('lead_ids')) // Get business info ids not in sales_call
            ->orderBy('id', 'desc')
            ->paginate(10);
        $this->sales_head_quarters = Salesheadquarter::all();
        $this->call_logs = CallLog::paginate(10);
        $this->users = BusinessInfoDetails::with('user')->get();
        // dd($this->users);
    }

    public function salesUsers()
    {
        // Validate input
        $this->validate([
            'lead_ids' => 'required|array|min:1',
            'assign_date' => 'required|date',
        ]);
    
        try {
            foreach ($this->lead_ids as $lead_id) {
                DB::table('sales_call')->insert([
                    'lead_ids' => $lead_id,
                    'assign_date' => $this->assign_date,
                ]);
            }
    
            session()->flash('message', 'Sales calls assigned successfully.');
        } catch (Exception $th) {
            dd($th);
        }
        
        // Reset fields after submission
        $this->lead_ids = [];
        $this->assign_date = null;
    
        return redirect()->route('sales_call');
    }
    

    public function render()
    {
        $call_logs = CallLog::paginate(10);
        $reports = BusinessInfoDetails::with(['user', 'salesheadquarters'])
        // ->whereNotIn('id', SalesCall::pluck('lead_ids')) // Get business info ids not in sales_call
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('livewire.sales-call-tab', [
            'reports' => $reports,
            'call_logs' => $call_logs
        ]);
    }
}
