<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Report;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ReportsImport;
use Illuminate\Support\Facades\Response;
use Livewire\WithFileUploads;


class Reports extends Component
{
    use WithFileUploads;
    public $item_name, $item_code, $generic_item_name, $item_category, $department, $machine, $test_code, $test_name;
    public $supplier_name, $address, $manufacture, $hsn_code, $unit_of_purchase, $pack_size, $test, $unit_price, $cgst, $sgst, $price_gst;
    public $reportId, $reports, $file; // For storing the current report ID for editing
    public $isEditing = false;
    public $showForm = false; // Property to control the modal visibility

    public function mount($id = null)
    {
        if ($id) {
            $this->edit($id);
        }
    }

    protected function rules()
    {
        return [
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
        ];
    }


    public function submit()
    {
        // Validate the form input
        
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
        // Create the report
        Report::create([
            'item_category' => $this->item_category,
            'generic_item_name' => $this->generic_item_name,
            'item_name' => $this->item_name,
            'item_code' => $this->item_code,
            'department' => $this->department,
            'machine' => $this->machine,
            'test_code' => $this->test_code,
            'test_name' => $this->test_name,
            'supplier_name' => $this->supplier_name,
            'address' => $this->address,
            'manufacture' => $this->manufacture,
            'hsn_code' => $this->hsn_code,
            'unit_of_purchase' => $this->unit_of_purchase,
            'pack_size' => $this->pack_size,
            'test' => $this->test,
            'unit_price' => $this->unit_price,
            'cgst' => $this->cgst,
            'sgst' => $this->sgst,
            'price_gst' => $this->price_gst,
        ]);

        // Flash a success message
        $this->emit('alert', ['type' => 'success', 'message' => 'Details submitted successfully.']);

        // Close the modal
        $this->showForm = false;

        // Reset the input fields
        $this->resetInputFields();
    }

    public function bulkImport()
    {
        $this->validate(['file' => 'required|mimes:xlsx,csv']);

        try {
            Excel::import(new ReportsImport, $this->file);

            // Flash a success message if the import is successful
            $this->emit('alert', [
                'type' => 'success',
                'message' => 'Reports imported successfully!'
            ]);

        } catch (\Exception $e) {
            // Flash an error message if the import fails
            $this->emit('alert', [
                'type' => 'error',
                'message' => 'Error importing reports: ' . $e->getMessage()
            ]);
        }
        $this->emit('alert', ['type' => 'success', 'message' => 'File uploaded successfully.']);

        // Emit events for file upload and form submission
        $this->emit('fileUploaded');
        $this->emit('formSubmitted');
    }


    public function updateReport()
    {
        $this->validate($this->rules());
        $report = Report::find($this->reportId);
        $report->update($this->formData());
        $this->isEditing = false;
        $this->emit('alert', [
            'type' => 'success',
            'message' => 'Report created successfully!'
        ]);
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $this->isEditing = true;
        $report = Report::find($id);
        $this->reportId = $report->id;
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
        return view('livewire.reports', ['isEditing' => $this->isEditing]);
    }
    public function download()
    {
        $filePath = public_path('assets/bulkimport.xlsx');

        return Response::download($filePath);
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
        return view('livewire.reports');
    }
}
