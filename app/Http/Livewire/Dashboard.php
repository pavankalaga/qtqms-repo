<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    use WithPagination; // Add pagination trait for Livewire

    public $search = ''; // Initialize search as an empty string
    public $confirmingDelete = false;
    public $user;

    public function render()
    {
        // Get the authenticated user
        $this->user = Auth::user();

        // Query for reports, applying search filter if present
        $query = Report::query();

        // Apply search filter
        if (!empty($this->search)) {
            $query->where('item_name', 'like', '%' . $this->search . '%');
        }

        // Get paginated results
        $reports = $query->paginate(10);

        // Return view with data
        return view('livewire.dashboard', [
            'user' => $this->user,
            'reports' => $reports
        ]);
    }

    public function updatingSearch()
    {
        // Reset pagination when the search term is updated
        $this->resetPage();
    }
}
