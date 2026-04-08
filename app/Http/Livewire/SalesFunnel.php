<?php

namespace App\Http\Livewire;

use App\Models\AgreedBusiness;
use App\Models\CallLog;
use App\Models\Salesheadquarter;
use Livewire\Component;
use App\Models\BusinessInfoDetails;
use App\Models\{User, ContactDetail};
use Livewire\WithPagination;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class SalesFunnel extends Component
{
    use WithPagination; // Enable pagination


    protected $reports; // Change visibility to protected
    protected $listeners = ['deleteReport'];
    public $user;
    public $status;
    public $lead_id;
    public $loss_description;
    public $searchTest;
    public $all_assigned_users;
    public $selectedUser;

    public $remark_description;
    public $currentStep = 1;
    public $report_id;
    public $salutation;
    public $first_name;
    public $last_name;
    public $department;
    public $designation;
    public $office_phone;
    public $mobile_no;
    public $office_email;
    public $other_email;
    public $searchInput = '';
    public $sortField = 'first_name'; // Default sort field
    public $sortDirection = 'asc'; // Default sort direction
    public $contactId = null;

    public $specialities = [];
    public $new_business = []; // Holds new entries to be added
    public $expected_business = [];
    public $no_of_doctors;
    public $lab_revenue;
    public $currently_outsourceed_to;
    public $description;
    public $openModal = false;
    public $editMode = false; // To check if we're in edit mode
    public $business_name;
    public $business_type;
    public $legal_business_type;
    public $registered_no;
    public $incorporation_no;
    public $pan_no;
    public $tan_no;
    public $alternate_phone;
    public $incorporation_date;
    public $alternative_email;
    public $country;
    public $state;
    public $city;
    public $address;
    public $pincode;
    public $email;
    public $phone;
    public $website;
    public $list_contact_details;
    public $lead_contact_id;
    public $sales_head_quarters;
    public $salesheadquarter;
    public $check_in;
    public $check_out;
    public $follow_up_start; // Corrected naming
    public $follow_up_end;   // Corrected naming
    public $call_log_remarks;
    public $sales_users = [];
    private $call_logs;
    
    public function mount(Request $request) // Fetch all reports when the component is mounted
    {
        $this->user = Auth::user();
        $this->reports = BusinessInfoDetails::with(['user', 'salesheadquarters'])->orderBy('id', 'desc')->paginate(10);
        $this->all_assigned_users = User::join('business_info', 'business_info.assign_user', '=', 'users.id')
        ->select('users.*') // Only select unique user fields
        ->distinct() // Make sure results are distinct
        ->groupBy('users.id') // Group by user ID to ensure uniqueness
        ->get();
    
        $this->expected_business[] = ['test_name' => '', 'expected_qty_day' => '', 'expected_l2l_price' => '', 'amount' => '' ,'total' => ''];
        
        $this->users = User::all();
        $this->reportId = $request->route('id'); // Store report ID
        $this->new_business = []; // Initialize the new_business array
        if ($this->reportId) {
            $this->lead_contact_id = $this->reportId;
            $this->edit($this->reportId); // Load the report details for editing
        }
        $this->call_logs = CallLog::paginate(10);
        $this->sales_head_quarters = Salesheadquarter::all();
        $this->list_contact_details = ContactDetail::where('lead_id', $this->reportId)->get();
    }
    public function setLeadId($id)
    {
        $this->lead_id = $id;
    }
    public function nextStep()
    {
        $this->validateStep();
        $this->currentStep++;
    }
    public function addNewField()
    {
        $this->expected_business[] = ['test_name' => '', 'expected_qty_day' => '', 'expected_l2l_price' => '', 'amount' => '','total' => ''];
    }

    public function removeField($index)
    {
        unset($this->expected_business[$index]);
        $this->expected_business = array_values($this->expected_business); // Re-index the array
    }

    // Move to the previous step
    public function previousStep()
    {
        $this->currentStep--;
    }


    public function updatedSelectedUser()
    {
        $this->searchFeedMessage(); // Call the search method when the input changes
        $this->emit('userSelected'); // Emit an event to reinitialize Select2
    }

    public function resetContactFields()
    {
        $this->check_in = '';
        $this->check_out = '';
        $this->call_log_remarks = '';
        $this->fallow_up_date = '';
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
    public function searchFeedMessage()
    {
        $query = BusinessInfoDetails::query();

        // Apply search filter based on searchTest input
        if (!empty($this->searchTest)) {
            $query->where(function ($q) {
                $q->where('business_name', 'like', '%' . $this->searchTest . '%')
                    ->orWhere('email', 'like', '%' . $this->searchTest . '%')
                    ->orWhere('phone', 'like', '%' . $this->searchTest . '%')
                    ->orWhere('status', 'like', '%' . $this->searchTest . '%')
                    ->orWhere('state', 'like', '%' . $this->searchTest . '%')
                    ->orWhereHas('user', function ($q) {
                        $q->where('first_name', 'like', '%' . $this->searchTest . '%')
                            ->orWhere('last_name', 'like', '%' . $this->searchTest . '%');
                    })
                    ->orWhereHas('salesheadquarters', function ($q) {
                        $q->where('name', 'like', '%' . $this->searchTest . '%');
                    });
            });
        }

        // Filter by selected user
        if (!empty($this->selectedUser)) {
            $query->whereHas('user', function ($q) {
                $q->where('id', $this->selectedUser);
            });
        }

        // Execute the query and paginate results
        $this->reports = $query->orderBy('id', 'desc')->paginate(10);
    }


    public function saveUser()
    {

        
        $bus_info = BusinessInfoDetails::find($this->lead_id);
        $bus_info->status = $this->status;
        $bus_info->save();
        if (!empty($this->expected_business)) {
            foreach ($this->expected_business as $business) {
                AgreedBusiness::create([
                    'lead_id' => $bus_info->id,
                    'test_name' => $business['test_name'],
                    'expected_qty_day' => $business['expected_qty_day'],
                    'expected_l2l_price' => $business['expected_l2l_price'],
                    'amount' => $business['amount'],
                    'total' => $business['total'],
                ]);
            }
        }
        session()->flash('message', 'User successfully added.');
        $this->reset(['status', 'loss_description', 'lead_id']);
        $this->emit('closeModal');

        return redirect()->route('sales_funnel');
    }

    public function render()
    {
        $call_logs = CallLog::paginate(10);
        return view('livewire.sales-funnel', [
            'reports' => $this->reports ?? BusinessInfoDetails::orderBy('id', 'desc')->paginate(10),
            'call_logs' => $call_logs
        ]);
    }
}
