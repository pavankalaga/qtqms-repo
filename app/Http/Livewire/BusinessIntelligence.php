<?php

namespace App\Http\Livewire;

use Livewire\Component;


class BusinessIntelligence extends Component
{
    public $specialities = [];
    public $expected_business = [];
    public $no_of_doctors;
    public $lab_revenue;
    public $currently_outsourceed_to;
    public $description;

    public function mount()
    {
        $this->expected_business[] = ['test_name' => '', 'expected_qty_day' => ''];
    }

    public function addNewField()
    {
        $this->expected_business[] = ['test_name' => '', 'expected_qty_day' => ''];
    }

    public function removeField($index)
    {
        unset($this->expected_business[$index]);
        $this->expected_business = array_values($this->expected_business); // Re-index the array
    }

    public function submitAll()
    {

        $businessIntelligence = \App\Models\BusinessInteligence::create([
            'no_of_doctors' => $this->no_of_doctors,
            'lab_revenue' => $this->lab_revenue,
            'currently_outsourceed_to' => $this->currently_outsourceed_to,
            'description' => $this->description,
            'specialities' => $this->specialities,
        ]);
    
        // Save the expected business data to the pivot table
        foreach ($this->expected_business as $business) {
            $businessIntelligence->expectedBusiness()->create([
                'test_name' => $business['test_name'],
                'expected_qty_day' => $business['expected_qty_day'],
            ]);
        }
    
        $this->no_of_doctors = '';
        $this->lab_revenue = '';
        $this->currently_outsourceed_to = '';
        $this->description = '';
        $this->specialities = []; // Reset to an empty array
        $this->expected_business = []; // Reset to an empty array
        // Optionally, you can reset the form fields or emit a success message
        $this->emit('alert', ['type' => 'success', 'message' => 'Business Intelligence data saved successfully.']);
    }

    public function render()
    {
        return view('livewire.business-intelligence');
    }
}
