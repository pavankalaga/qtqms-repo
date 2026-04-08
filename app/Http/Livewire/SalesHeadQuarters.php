<?php

namespace App\Http\Livewire;

use App\Models\Salesheadquarter; // Ensure the model name is correct
use Livewire\Component;

class SalesHeadQuarters extends Component
{
    public $name;

    public function save()
    {
        // Use create() method instead of created()
        Salesheadquarter::create(['name' => $this->name]);

        // Emit alert message
        $this->emit('alert', ['type' => 'success', 'message' => 'Sales Headquarters saved successfully.']);
        $this->name = ''; // Reset the name input
    }

    public function render()
    {
        return view('livewire.sales-head-quarters');
    }
}
