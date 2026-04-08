<?php

namespace App\Http\Livewire;

use App\Models\AgreedBusiness;
use App\Models\ExpectedBusiness;
use App\Models\User;
use Livewire\Component;
use App\Models\BusinessInfoDetails;
use App\Models\Salesheadquarter; 
use Auth;
use App\Models\CallLog;
use App\Models\LeadTag;
class BusinessTab extends Component
{
    public $searchTest = '';
    public $searchItem = '';
    protected $reports; // Change visibility to protected
    protected $listeners = ['deleteReport'];
    public $user,$lead_id ;
    public $first_name;
    public $email;
    public $sales_users = []; // Initialize as an array
    public $sales_head_quarters = []; // Initialize as an array
    public $assign_user, $salesheadquarter_id; // Declare the variables

    public $check_in;
    public $check_out;
    public $follow_up_start; // Corrected naming
    public $follow_up_end;   // Corrected naming
    public $call_log_remarks;
    private $call_logs;
    public $selectedReportId; // Store the ID of the selected report
    public $expectedBusinesses = [];
    public $agreedBusinesses = [];
    public $showDetails = false;
    public function mount() // Fetch all reports when the component is mounted
    {
        $this->user = Auth::user();
        $this->reports = BusinessInfoDetails::with(['user','salesheadquarters'])->orderBy('id', 'desc')->paginate(10);
        $this->sales_head_quarters = Salesheadquarter::all();
        $this->call_logs = CallLog::paginate(10);
    }

    public function showBusinessDetails($id)
    {
        // Reset the detail visibility for any previously selected record
        if ($this->selectedReportId === $id) {
            // If the same record is clicked, toggle the detail visibility
            $this->showDetails = !$this->showDetails;
        } else {
            // Fetch new record details and show them
            $this->selectedReportId = $id;
            $this->expectedBusinesses = ExpectedBusiness::where('lead_id', $id)->get();
            $this->agreedBusinesses = AgreedBusiness::where('lead_id', $id)->get();
            $this->showDetails = true; // Show details when fetching data
        }

        return redirect()->route('business_statistics',$id);
    }

    public function saveCallLogs()
    {
        // dd($this->all());
        $this->validate([
            'check_in' => 'required|date_format:Y-m-d\TH:i',
            'check_out' => 'required|date_format:Y-m-d\TH:i',
            'follow_up_start' => 'required|date',
            'follow_up_end' => 'required|date',
            'call_log_remarks' => 'nullable|string|max:255',
        ]);

        // Save the data
        \DB::table('call_logs')->insert([
            'check_in' => $this->check_in,
            'check_out' => $this->check_out,
            'follow_up_start' => $this->follow_up_start,
            'follow_up_end' => $this->follow_up_end,
            'call_log_remarks' => $this->call_log_remarks,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Reset fields after saving
        $this->reset(['check_in', 'check_out', 'follow_up_start', 'follow_up_end', 'call_log_remarks']);
        return redirect()->route('business');
    }
    public function updatedSalesheadquarterId($headquarterId)
    {
        $this->sales_users = User::where('sales_headquarter_id', $headquarterId)->get();
    }

    public function setLeadId($id)
{
    $this->lead_id = $id;
}

    public function saveUser()
    {
        // Validation
        $this->validate([
            'lead_id' => 'required', // Ensure lead_id is set
            'salesheadquarter_id' => 'required',
            'assign_user' => 'required',
        ]);

        
    
        // Saving the data into the correct model (assuming BusinessInfoDetails is your model)
        LeadTag::create([
            'lead_id' => $this->lead_id,
            'salesheadquarter_id' => $this->salesheadquarter_id,
            'assign_user' => $this->assign_user,
        ]);

        $bus_info = BusinessInfoDetails::find($this->lead_id);
        $bus_info->assign_user = $this->assign_user;
        $bus_info->save();
    
        // Reset form fields
        $this->reset(['salesheadquarter_id', 'assign_user', 'sales_users' ,'lead_id']);
    
        // Flash success message
        session()->flash('message', 'User successfully added.');
    
        // Close the modal
        $this->emit('closeModal');
    }
    
    public function render()
    {
        $call_logs = CallLog::paginate(10);
        return view('livewire.business-tab', [
            'reports' => $this->reports ?? BusinessInfoDetails::whereNull('assign_user')->orderBy('id', 'desc')->paginate(10),
            'call_logs' => $call_logs,
            'expectedBusinesses' => $this->expectedBusinesses,
            'agreedBusinesses' => $this->agreedBusinesses,
            'showDetails' => $this->showDetails,
         ]);
    }
}
