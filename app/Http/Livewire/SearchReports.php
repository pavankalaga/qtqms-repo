<?php

namespace App\Http\Livewire;

use App\Models\BusinessInfoDetails;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Auth;
use Illuminate\Support\Facades\Hash;


class SearchReports extends Component
{
    use WithPagination; // Enable pagination

    public $searchTest = '';
    public $searchItem = '';
    protected $reports; // Change visibility to protected
    protected $listeners = ['deleteReport'];
    public $user;
    public $first_name;
    public $email;
    public function mount() // Fetch all reports when the component is mounted
    {
        $this->user = Auth::user();
        $this->reports = BusinessInfoDetails::with(['user', 'salesheadquarters'])->orderBy('id', 'desc')->paginate(10);
        // dd($this->reports);
    }

    public function saveUser()
    {
        // Step 2: Validation
        $this->validate([
            'first_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email', // Ensure email is unique in users table
        ]);

        // Step 3: Saving the data
        $user = User::create([
            'first_name' => $this->first_name,
            'email' => $this->email,
            'password' => Hash::make('password'),
        ]);

        // Optionally, clear form fields after saving
        $this->reset(['first_name', 'email']);

        // Step 4: Flash success message or redirect
        session()->flash('message', 'User successfully added.');

        // Optionally, you can close the modal after saving
        $this->emit('closeModal');
    }
    public function updatedSearchTest() // Triggered when the searchTest changes
    {
        $this->searchFeedMessage(); // Call the search method when input changes
    }

    public function searchFeedMessage()
    {
        if ($this->searchTest !== '') {
            // Filter reports based on search input
            $this->reports = BusinessInfoDetails::where(function ($query) {
                $query->where('business_name', 'like', '%' . $this->searchTest . '%') // If 'name' exists in 'business_info'
                    ->orWhere('email', 'like', '%' . $this->searchTest . '%')
                    ->orWhere('phone', 'like', '%' . $this->searchTest . '%')
                    ->orWhere('status', 'like', '%' . $this->searchTest . '%')
                    ->orWhere('state', 'like', '%' . $this->searchTest . '%')
                    ->orWhereHas('user', function($query) {
                        $query->where('first_name', 'like', '%' . $this->searchTest . '%')->orWhere('last_name', 'like', '%' . $this->searchTest . '%'); // Adjust to actual column name
                    })
                    ->orWhereHas('salesheadquarters', function($query) {
                        $query->where('name', 'like', '%' . $this->searchTest . '%'); // Adjust to actual column name
                    });
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
            
        } else {
            // Reset reports to show all records when the search input is empty
            $this->reports = BusinessInfoDetails::orderBy('id', 'desc')->paginate(10);
        }
    }

    public function deleteReport($reportId)
    {
        // Delete the report
        $report = BusinessInfoDetails::findOrFail($reportId);
        $report->delete();

        // Refresh reports
        $this->reports = BusinessInfoDetails::with('user')->orderBy('id', 'desc')->paginate(10);

        // Optionally show a session flash message
        session()->flash('message', 'Report deleted successfully.');
    }

    public function updatedSearchItem() // Triggered when the searchItem changes
    {
        $this->searchItemReports(); // Call the search method when input changes
    }

    public function searchItemReports()
    {
        if ($this->searchItem !== '') {
            // Filter reports based on search input
            $this->reports = BusinessInfoDetails::where('first_name', 'like', '%' . $this->searchItem . '%')
                ->orWhere('item_code', 'like', '%' . $this->searchItem . '%')->orderBy('id', 'desc')
                ->paginate(10);
        } else {
            // Reset reports to show all records when the search input is empty
            $this->reports = BusinessInfoDetails::with('user')->orderBy('id', 'desc')->paginate(10);
        }
    }

    public function render()
    {
        // Pass the current reports to the view
        return view('livewire.search-reports', [
            'reports' => $this->reports ?? BusinessInfoDetails::orderBy('id', 'desc')->paginate(10)
        ]);
    }
}
