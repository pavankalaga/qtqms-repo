<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Report;
use Illuminate\Http\Request;

class EditReport extends Component
{
    public $item_name, $item_code, $generic_item_name, $item_category, $department, $machine, $test_code, $test_name;
    public $supplier_name, $address, $manufacture, $hsn_code, $unit_of_purchase, $pack_size, $test, $unit_price, $cgst, $sgst, $price_gst;
    public $reportId; // For storing the current report ID for editing

    public function mount(Request $request)
    {
        $this->reportId = $request->route('id'); // Store report ID
        if ($this->reportId) {
            $this->edit($this->reportId); // Load the report details for editing
        }
    }

    public function edit($id)
    {
        $report = Report::find($id);

        if ($report) {
            // Load report data into properties for the form
            $this->item_name = $report->item_name;
            $this->item_code = $report->item_code;
            $this->generic_item_name = $report->generic_item_name;
            $this->item_category = $report->item_category;
            $this->department = $report->department;
            $this->machine = $report->machine;
            $this->test_code = $report->test_code;
            $this->test_name = $report->test_name;
            $this->supplier_name = $report->supplier_name;
            $this->address = $report->address;
            $this->manufacture = $report->manufacture;
            $this->hsn_code = $report->hsn_code;
            $this->unit_of_purchase = $report->unit_of_purchase;
            $this->pack_size = $report->pack_size;
            $this->test = $report->test;
            $this->unit_price = $report->unit_price;
            $this->cgst = $report->cgst;
            $this->sgst = $report->sgst;
            $this->price_gst = $report->price_gst;
        } else {
            // Handle case when the report is not found
            session()->flash('error', 'Report not found.');
        }
    }

    public function updateReport()
{
    $report = Report::find($this->reportId);
    $this->validate( [
        'item_name' => 'required|string',
        'item_code' => 'required|string',
        'generic_item_name' => 'required|string',
        'item_category' => 'required|string',
        // 'department' => 'required|string',
        // 'machine' => 'required|string',
        // 'test_code' => 'required|string',
        // 'test_name' => 'required|string',
        'supplier_name' => 'required|string',
        'address' => 'required|string',
        'manufacture' => 'required|string',
        'hsn_code' => 'required|string',
        'unit_of_purchase' => 'required|string',
        'pack_size' => 'required|string',
        'test' => 'required|string',
        'unit_price' => 'required|numeric',
        'cgst' => 'required|numeric',
        'sgst' => 'required|numeric',
        'price_gst' => 'required|numeric',
    ]);
    if ($report) {
        // Update the report details
        $report->item_name = $this->item_name;
        $report->item_code = $this->item_code;
        $report->generic_item_name = $this->generic_item_name;
        $report->item_category = $this->item_category;
        $report->department = $this->department;
        $report->machine = $this->machine;
        $report->test_code = $this->test_code;
        $report->test_name = $this->test_name;
        $report->supplier_name = $this->supplier_name;
        $report->address = $this->address;
        $report->manufacture = $this->manufacture;
        $report->hsn_code = $this->hsn_code;
        $report->unit_of_purchase = $this->unit_of_purchase;
        $report->pack_size = $this->pack_size;
        $report->test = $this->test;
        $report->unit_price = $this->unit_price;
        $report->cgst = $this->cgst;
        $report->sgst = $this->sgst;
        $report->price_gst = $this->price_gst;
        
        // Save the changes
        $report->save();

        // Optionally flash a success message
        $this->emit('alert', ['type' => 'success', 'message' => 'Details updated successfully.']);

        // Close the modal
        $this->showForm = false;

        // Reset the input fields
        // $this->resetInputFields();

        // return redirect()->route('admin');
    } else {
        $this->emit('alert', ['type' => 'error', 'message' => 'Report not found.']);

    }
}

public function resetInputFields()
{
    $this->item_name = '';
    $this->item_code = '';
    $this->generic_item_name = '';
    $this->item_category = '';
    $this->department = '';
    $this->machine = '';
    $this->test_code = '';
    $this->test_name = '';
    $this->supplier_name = '';
    $this->address = '';
    $this->manufacture = '';
    $this->hsn_code = '';
    $this->unit_of_purchase = '';
    $this->pack_size = '';
    $this->test = '';
    $this->unit_price = '';
    $this->cgst = '';
    $this->sgst = '';
    $this->price_gst = '';
}


    public function render()
    {
        return view('livewire.edit-report');
    }
}
