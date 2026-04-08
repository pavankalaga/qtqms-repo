<?php

namespace App\Http\Livewire;

use App\Models\{User, BusinessInfoDetails};
use App\Models\ContactDetail;
use App\Models\Salesheadquarter;
use Livewire\Component;

class Remarks extends Component
{
    public $remark_description;
    public $currentStep = 1;

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
    public $expected_business = [];
    public $no_of_doctors;
    public $lab_revenue;
    public $currently_outsourceed_to;
    public $description;


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
    public $user;
    public $sales_head_quarters;
    public $salesheadquarter;

    public function mount()
    {
        // Fetch all users for the assign_user dropdown
        $this->users = User::all();
        $this->expected_business[] = ['test_name' => '', 'expected_qty_day' => '', 'expected_l2l_price' => '', 'amount' => '' ,'total' => ''];
        $this->sales_head_quarters = Salesheadquarter::all();
    }

    // Move to the next step with validation
    public function nextStep()
    {
        $this->validateStep();
        $this->currentStep++;
    }

    // Move to the previous step
    public function previousStep()
    {
        $this->currentStep--;
    }

    // Validation based on the current step
    public function validateStep()
    {
        // Debugging: Uncomment this if you need to inspect data
        // dd([
        //     'business_name' => $this->business_name,
        //     'sales_head_quarters' => is_array($this->sales_head_quarters) ? array_column($this->sales_head_quarters, 'name') : null,
        //     'expected_business' => !empty($this->expected_business) ? $this->expected_business : 'No expected business provided',
        //     'users' => is_array($this->users) ? array_column($this->users, 'name') : null,
        // ]);

        // Validation logic based on current step
        if ($this->currentStep == 1) {
            $this->validate([
                'business_name' => 'required|string|max:255',
                // 'registered_no' => 'required|string|max:255',
                // 'country' => 'required|string|max:255',
                // 'state' => 'required|string|max:255',
                // 'city' => 'required|string|max:255',
                // 'phone' => 'required|string|max:15',
                // 'salesheadquarter' => 'required'
            ]);
        }

        if ($this->currentStep == 2) {
            // Validation for step 2 fields (currently commented out, add if necessary)
            // $this->validate([
            //     'salutation' => 'required|string|max:255',
            //     'first_name' => 'required|string|max:255',
            //     'last_name' => 'required|string|max:255',
            //     'department' => 'required|string|max:255',
            //     'designation' => 'required|string|max:255',
            //     'office_phone' => 'required|digits:10',
            //     'mobile_no' => 'required|string|max:15',
            //     'office_email' => 'required|email',
            //     'other_email' => 'nullable|email',
            // ]);
        }

        if ($this->currentStep == 3) {
            // $this->validate([
            //     // 'no_of_doctors' => 'required|integer',
            //     // 'lab_revenue' => 'required|numeric',
            //     // 'currently_outsourceed_to' => 'required|string|max:255',
            //     // 'description' => 'required|string|max:1000',
            //     // 'expected_business' => 'nullable|array', // Handle expected business as an array
            //     // 'expected_business.*.test_name' => 'nullable|string|max:255', // Validate each field in expected business
            //     // 'expected_business.*.expected_qty_day' => 'nullable|string|max:255',
            //     // 'expected_business.*.expected_l2l_price' => 'nullable|string|max:255',
            //     // 'expected_business.*.amount' => 'nullable|string|max:255',
            // ]);
        }
        
        if ($this->currentStep == 4) {
            // Validation for step 4 fields (only remark_description is required in this step)
            // $this->validate([
            //     'remark_description' => 'nullable|string|max:1000',
            // ]);
        }
    }
    
    public function submitForm()
{
    // dd($this->all());
    try {
        $this->validateStep();

        // Prepare the expected business array for saving
        $expectedBusinessData = [];
        if (!empty($this->expected_business)) {
            foreach ($this->expected_business as $business) {
                $expectedBusinessData[] = [
                    'test_name' => $business['test_name'],
                    'expected_qty_day' => $business['expected_qty_day'],
                    'expected_l2l_price' => $business['expected_l2l_price'],
                    'amount' => $business['amount'],
                    'total' => $business['total'],
                ];
            }
        }

        // Save Business Info Details
        $businessinfo = BusinessInfoDetails::create([
            'business_name' => $this->business_name,
            'business_type' => $this->business_type,
            'legal_business_type' => $this->legal_business_type,
            'registered_no' => $this->registered_no,
            'incorporation_no' => $this->incorporation_no,
            'pan_no' => $this->pan_no,
            'tan_no' => $this->tan_no,
            'alternate_phone' => $this->alternate_phone,
            'incorporation_date' => $this->incorporation_date,
            'alternative_email' => $this->alternative_email,
            'country' => $this->country,
            'state' => $this->state,
            'city' => $this->city,
            'address' => $this->address,
            'pincode' => $this->pincode,
            'email' => $this->email,
            'phone' => $this->phone,
            'website' => $this->website,
            'remark_description' => $this->remark_description,
            'salesheadquarter' => $this->salesheadquarter
        ]);

        // Debugging
        if (!$businessinfo) {
            throw new \Exception('Business info could not be saved.');
        }

        // Save Contact Details
        $contactDetail = ContactDetail::create([
            'salutation' => $this->salutation,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'department' => $this->department,
            'designation' => $this->designation,
            'office_phone' => $this->office_phone,
            'mobile_no' => $this->mobile_no,
            'office_email' => $this->office_email,
            'other_email' => $this->other_email,
            'lead_id' => $businessinfo->id
        ]);

        if (!$contactDetail) {
            throw new \Exception('Contact details could not be saved.');
        }

        // Save Business Intelligence
        $businessIntelligence = \App\Models\BusinessInteligence::create([
            'no_of_doctors' => $this->no_of_doctors,
            'lab_revenue' => $this->lab_revenue,
            'currently_outsourceed_to' => $this->currently_outsourceed_to,
            'description' => $this->description,
            'specialities' => json_encode($this->specialities), // Encode to JSON
            'lead_id' => $businessinfo->id
        ]);

        if (!$businessIntelligence) {
            throw new \Exception('Business intelligence could not be saved.');
        }

        // Save expected business data to the pivot table (if it exists)
        if (!empty($expectedBusinessData)) {
            foreach ($expectedBusinessData as $business) {
                $businessIntelligence->expectedBusiness()->create([
                    'test_name' => $business['test_name'],
                    'expected_qty_day' => $business['expected_qty_day'],
                    'expected_l2l_price' => $business['expected_l2l_price'],
                    'amount' => $business['amount'],
                    'total' => $business['total'],
                    'lead_id' => $businessinfo->id,
                ]);
            }
        }

        // Commit the transaction if everything went well
        // DB::commit();

        // Emit success alert
        $this->emit('alert', ['type' => 'success', 'message' => 'All information saved successfully.']);

        // Reset the form
        $this->resetForm();

        return redirect()->route('lead_tagging');

    } catch (\Exception $e) {
        // Rollback the transaction if any error occurs
        // DB::rollBack();

        // Debugging: Log the error or use dd()
        // Log::error($e->getMessage());
        dd($e->getMessage());
        // Emit an error alert
        $this->emit('alert', ['type' => 'error', 'message' => 'Failed to save data. ' . $e->getMessage()]);
        return redirect()->route('lead_tagging');
    }
}

    
    // Submit the form
    // public function submitForm()
    // {
    //     // dd($this->all());
    //     try {
    //         $this->validateStep();

    //         // Save Business Info Details
    //         $businessinfo = BusinessInfoDetails::create([
    //             'business_name' => $this->business_name,
    //             'business_type' => $this->business_type,
    //             'legal_business_type' => $this->legal_business_type,
    //             'registered_no' => $this->registered_no,
    //             'incorporation_no' => $this->incorporation_no,
    //             'pan_no' => $this->pan_no,
    //             'tan_no' => $this->tan_no,
    //             'alternate_phone' => $this->alternate_phone,
    //             'incorporation_date' => $this->incorporation_date,
    //             'alternative_email' => $this->alternative_email,
    //             'country' => $this->country,
    //             'state' => $this->state,
    //             'city' => $this->city,
    //             'address' => $this->address,
    //             'pincode' => $this->pincode,
    //             'email' => $this->email,
    //             'phone' => $this->phone,
    //             'website' => $this->website,
    //             'remark_description' => $this->remark_description,
    //             'salesheadquarter' => $this->salesheadquarter
    //         ]);

    //         // Debugging
    //         if (!$businessinfo) {
    //             throw new \Exception('Business info could not be saved.');
    //         }

    //         // Save Contact Details
    //         $contactDetail = ContactDetail::create([
    //             'salutation' => $this->salutation,
    //             'first_name' => $this->first_name,
    //             'last_name' => $this->last_name,
    //             'department' => $this->department,
    //             'designation' => $this->designation,
    //             'office_phone' => $this->office_phone,
    //             'mobile_no' => $this->mobile_no,
    //             'office_email' => $this->office_email,
    //             'other_email' => $this->other_email,
    //             'lead_id' => $businessinfo->id
    //         ]);

    //         if (!$contactDetail) {
    //             throw new \Exception('Contact details could not be saved.');
    //         }
    //         // Save Business Intelligence
    //         $businessIntelligence = \App\Models\BusinessInteligence::create([
    //             'no_of_doctors' => $this->no_of_doctors,
    //             'lab_revenue' => $this->lab_revenue,
    //             'currently_outsourceed_to' => $this->currently_outsourceed_to,
    //             'description' => $this->description,
    //             'specialities' => $this->specialities,
    //             'lead_id' => $businessinfo->id
    //         ]);

    //         if (!$businessIntelligence) {
    //             throw new \Exception('Business intelligence could not be saved.');
    //         }

    //         // Save expected business data to the pivot table (if it exists)
    //         if (!empty($this->expected_business)) {
    //             foreach ($this->expected_business as $business) {
    //                 $businessIntelligence->expectedBusiness()->create([
    //                     'test_name' => $business['test_name'],
    //                     'expected_qty_day' => $business['expected_qty_day'],
    //                     'expected_l2l_price' => $business['expected_l2l_price'],
    //                     'amount' => $business['amount'],
    //                     'total' => $business['total'],
    //                     'lead_id' => $businessinfo->id,
    //                 ]);
    //             }
    //         }

    //         // Commit the transaction if everything went well
    //         // DB::commit();

    //         // Emit success alert
    //         $this->emit('alert', ['type' => 'success', 'message' => 'All information saved successfully.']);

    //         // Reset the form
    //         $this->resetForm();

    //         return redirect()->route('lead_tagging');

    //     } catch (\Exception $e) {
    //         // Rollback the transaction if any error occurs
    //         // DB::rollBack();

    //         // Debugging: Log the error or use dd()
    //         // Log::error($e->getMessage());
    //         dd($e->getMessage());
    //         // Emit an error alert
    //         $this->emit('alert', ['type' => 'error', 'message' => 'Failed to save data. ' . $e->getMessage()]);
    //         return redirect()->route('lead_tagging');
    //     }
    // }
    public function addNewField()
    {
        $this->expected_business[] = ['test_name' => '', 'expected_qty_day' => '', 'expected_l2l_price' => '', 'amount' => '' , 'total' => ''];
    }

    public function removeField($index)
    {
        unset($this->expected_business[$index]);
        $this->expected_business = array_values($this->expected_business); // Re-index the array
    }
    // Reset form fields and steps
    public function resetForm()
    {
        $this->no_of_doctors = '';
        $this->lab_revenue = '';
        $this->currently_outsourceed_to = '';
        $this->description = '';
        $this->specialities = '';
        $this->salutation = '';
        $this->first_name = '';
        $this->last_name = '';
        $this->department = '';
        $this->designation = '';
        $this->office_phone = '';
        $this->mobile_no = '';
        $this->office_email = '';
        $this->other_email = '';
        $this->salutation = '';
        $this->first_name = '';
        $this->last_name = '';
        $this->department = '';
        $this->designation = '';
        $this->office_phone = '';
        $this->mobile_no = '';
        $this->office_email = '';
        $this->other_email = '';
        $this->business_name = '';
        $this->business_type = '';
        $this->legal_business_type = '';
        $this->registered_no = '';
        $this->incorporation_no = '';
        $this->pan_no = '';
        $this->tan_no = '';
        $this->alternate_phone = '';
        $this->incorporation_date = '';
        $this->alternative_email = '';
        $this->country = '';
        $this->state = '';
        $this->city = '';
        $this->address = '';
        $this->pincode = '';
        $this->email = '';
        $this->phone = '';
        $this->website = '';
        $this->remark_description = '';


    }

    public function submitAll()
    {
        BusinessInfoDetails::create(['remark_description' => $this->remark_description]);
        $this->emit('alert', ['type' => 'success', 'message' => 'Remarks submitted successfully.']);
        $this->remark_description = '';
    }

    public function render()
    {
        return view('livewire.remarks');
    }
}
