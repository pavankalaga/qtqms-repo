<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\BusinessInfoDetails;
use App\Models\Salesheadquarter;
use Auth;
use App\Models\LeadTag;

class LeadTagging extends Component
{

    public $searchTest = '';
    public $searchItem = '';
    protected $reports; // Change visibility to protected
    protected $listeners = ['deleteReport'];
    public $user, $lead_id;
    public $first_name;
    public $assign_users = [];
    public $email, $users;
    public $sales_users = []; // Initialize as an array
    public $sales_head_quarters = []; // Initialize as an array
    public $assign_user, $salesheadquarter_id; // Declare the variables
    public $selected_reports = [];
    public function mount() // Fetch all reports when the component is mounted
    {
        $this->user = Auth::user();
        $this->users = User::get();

        $this->reports = BusinessInfoDetails::with(['user'])->whereNull('assign_user')->orderBy('id', 'desc')->paginate(10);
        $this->sales_head_quarters = Salesheadquarter::all();
        foreach ($this->reports as $report) {
            $this->assign_users[$report->id] = null; // Default value
        }
    }

    public function updatedSalesheadquarterId($headquarterId)
    {
        $this->sales_users = User::where('sales_headquarter_id', $headquarterId)->get();
    }

    public function setLeadId($id)
    {
        $this->lead_id = $id;
    }

    public function submitAssignUser($reportId)
    {
        // dd($this->all());
        $this->validate([
            "assign_users.$reportId" => 'required',
        ]);

        $assign_user = $this->assign_users[$reportId];
        $bus_info = BusinessInfoDetails::find($reportId);
        if ($bus_info) {
            $bus_info->assign_user = $assign_user; // Save assigned user
            $bus_info->save();
        }

        // Emit success message
        $this->emit('alert', [
            'type' => 'success',
            'message' => 'User successfully assigned to report ' . $reportId
        ]);

        // Reset the specific user's selection
        // $this->reset("assign_users.$reportId");
    }


    public function submitSelectedUsers()
    {
        // dd($this->all());
        // Check if no reports are selected
        if (empty($this->selected_reports)) {
            $this->emit('alert', [
                'type' => 'error',
                'message' => 'Please select at least one report.'
            ]);
            return; // Early return to stop further execution
        }

        // Validate each selected report for assigned user
        foreach ($this->selected_reports as $reportId) {
            $this->validate([
                "assign_users.$reportId" => 'required',
            ]);
        }

        // Proceed to assign users
        foreach ($this->selected_reports as $reportId) {
            $assign_user = $this->assign_users[$reportId];
            $bus_info = BusinessInfoDetails::find($reportId);
            if ($bus_info) {
                $bus_info->assign_user = $assign_user; // Save assigned user
                $bus_info->save();
            }
        }

        // Emit success message
        $this->emit('alert', [
            'type' => 'success',
            'message' => 'Users successfully assigned to selected reports.'
        ]);

        // Reset form and selections
        $this->reset(['selected_reports', 'assign_users']);
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
        $this->reset(['salesheadquarter_id', 'assign_user', 'sales_users', 'lead_id']);

        // Flash success message
        session()->flash('message', 'User successfully added.');

        // Close the modal
        $this->emit('closeModal');
    }

    public function render()
    {
        return view('livewire.lead-tagging', [
            'reports' => $this->reports ?? BusinessInfoDetails::whereNull('assign_user')->orderBy('id', 'desc')->paginate(10)
        ]);
    }
}
