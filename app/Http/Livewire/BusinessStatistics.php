<?php

namespace App\Http\Livewire;

use App\Models\AgreedBusiness;
use App\Models\ExpectedBusiness;
use Livewire\Component;

class BusinessStatistics extends Component
{
    public $selectedId; // Variable to hold selected ID
    public $showDetails = false; // Control visibility of details
    public $expectedBusinesses = [];
    public $agreedBusinesses = [];

    public function mount($selectedId = null) // Accept the selectedId
    {
        $this->selectedId = $selectedId;
        $this->expectedBusinesses = ExpectedBusiness::where('lead_id', $selectedId)->get();
         $this->agreedBusinesses = AgreedBusiness::where('lead_id', $selectedId)->get();
    }

   
    public function render()
    {
        return view('livewire.business-statistics',[ 'expectedBusinesses' => $this->expectedBusinesses,
        'agreedBusinesses' => $this->agreedBusinesses,
        'showDetails' => $this->showDetails,]);
    }
}
