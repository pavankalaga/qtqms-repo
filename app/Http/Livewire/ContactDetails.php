<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Models\BusinessInteligence;
use App\Models\ContactDetail;
use App\Models\ExpectedBusiness;
use App\Models\Salesheadquarter;
use Livewire\Component;
use App\Models\{User, BusinessInfoDetails};
use Illuminate\Http\Request;

class ContactDetails extends Component
{
    use WithPagination;

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
    public $user;
    public $list_contact_details;
    protected $listeners = ['deleteReport'];
    public $lead_contact_id;
    public $sales_head_quarters;
    public $salesheadquarter;
    public function mount(Request $request)
    {
        $this->users = User::all();
        $this->reportId = $request->route('id'); // Store report ID
        $this->new_business = []; // Initialize the new_business array
        if ($this->reportId) {
            $this->lead_contact_id = $this->reportId;
            $this->edit($this->reportId); // Load the report details for editing
        }

        $this->sales_head_quarters = Salesheadquarter::all();
        $this->list_contact_details = ContactDetail::where('lead_id', $this->reportId)->get();
    }


    public function editContactDetails($id)
{
    $contact = ContactDetail::find($id);
    if ($contact) {
        // Assign the contact details to the properties
        $this->contactId = $contact->id;
        $this->salutation = $contact->salutation;
        $this->first_name = $contact->first_name;
        $this->last_name = $contact->last_name;
        $this->department = $contact->department;
        $this->designation = $contact->designation;
        $this->office_phone = $contact->office_phone;
        $this->mobile_no = $contact->mobile_no;
        $this->office_email = $contact->office_email;
        $this->other_email = $contact->other_email;

        // Open the modal
        $this->dispatchBrowserEvent('open-modal');
    }
}


    public function saveContactDetails()
    {
        $this->validate([
            'salutation' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'department' => 'required',
            'designation' => 'required',
            'office_phone' => 'required|digits:10',
            'mobile_no' => 'required',
            'office_email' => 'required|email',
            'other_email' => 'required|email',
        ]);

        if ($this->editMode) {
            // dd($this->all());
            // Update existing contact
            $contact = ContactDetail::find($this->contactId);
            $contact->update([
                'salutation' => $this->salutation,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'department' => $this->department,
                'designation' => $this->designation,
                'office_phone' => $this->office_phone,
                'mobile_no' => $this->mobile_no,
                'office_email' => $this->office_email,
                'other_email' => $this->reportId,
                'lead_id' => $this->lead_contact_id,
            ]);
        } else {
            // dd('sssss');
            // Create new contact
            ContactDetail::create([
                'salutation' => $this->salutation,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'department' => $this->department,
                'designation' => $this->designation,
                'office_phone' => $this->office_phone,
                'mobile_no' => $this->mobile_no,
                'office_email' => $this->office_email,
                'other_email' => $this->other_email,
                'lead_id' => $this->lead_contact_id,
            ]);
        }

        // Close the modal
        $this->resetFields();
        $this->dispatchBrowserEvent('closeModal');

        $this->openModal = false;
        $this->list_contact_details = ContactDetail::where('lead_id', $this->reportId)->get();
    }
    public function resetContactFields()
    {
        $this->salutation = '';
        $this->first_name = '';
        $this->last_name = '';
        $this->department = '';
        $this->designation = '';
        $this->office_phone = '';
        $this->mobile_no = '';
        $this->office_email = '';
        $this->other_email = '';
    }

    public function resetFields()
    {
        $this->salutation = '';
        $this->first_name = '';
        $this->last_name = '';
        $this->department = '';
        $this->designation = '';
        $this->office_phone = '';
        $this->mobile_no = '';
        $this->office_email = '';
        $this->other_email = '';
        $this->editMode = false;
        $this->contactId = null;
    }


    public function getListContactDetailsProperty() // Getter method
    {
        return $this->list_contact_details;
    }

    public function deleteReport($reportId)
    {
        // Delete the report
        $report = ContactDetail::findOrFail($reportId);
        $report->delete();

        // Refresh reports
        $this->list_contact_details = ContactDetail::where('lead_id', $this->reportId)->get();

        // Optionally show a session flash message
        session()->flash('message', 'Contact details deleted successfully.');
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
        if ($this->currentStep == 1) {
            // $this->validate([
            //     // 'business_name' => 'required',
            //     // 'business_type' => 'required',
            //     // 'legal_business_type' => 'required',
            //     // 'registered_no' => 'required',
            //     // 'incorporation_no' => 'required',
            //     // 'pan_no' => 'required',
            //     // 'tan_no' => 'required',
            //     // 'alternate_phone' => 'required',
            //     // 'incorporation_date' => 'required|date',
            //     // 'alternative_email' => 'required|email',
            //     // 'country' => 'required|string|max:255',
            //     // 'state' => 'required|string|max:255',
            //     // 'city' => 'required|string|max:255',
            //     // 'address' => 'required|string|max:255',
            //     // 'pincode' => 'required|integer',
            //     // 'email' => 'required|email',
            //     // 'phone' => 'required|string|max:15',
            //     // 'website' => 'nullable|url',
            //     'business_name' => 'required|string|max:255',
            //     'registered_no' => 'required|string|max:255',
            //     'country' => 'required|string|max:255',
            //     'state' => 'required|string|max:255',
            //     'city' => 'required|string|max:255',
            //     'phone' => 'required|string|max:15',
            //     'salesheadquarter' => 'required'
            // ]);
        }

        if ($this->currentStep == 2) {
            // $this->validate([
            //     'salutation' => 'required',
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

        // Step 3: You can customize fields specific to this step
        if ($this->currentStep == 3) {
            // $this->validate([
            //     'no_of_doctors' => 'required|integer',
            //     'lab_revenue' => 'required|numeric',
            //     'currently_outsourceed_to' => 'required|string|max:255',
            //     'description' => 'required|string|max:1000',
            // ]);
        }

        // Step 4: Only the remark_description field is validated here
        if ($this->currentStep == 4) {
            // $this->validate([
            //     'remark_description' => 'required|string|max:1000',
            // ]);
        }
    }


    public function addNewField()
    {
        $this->expected_business[] = ['test_name' => '', 'expected_qty_day' => '', 'expected_l2l_price' => '', 'amount' => ''];
    }


    public function removeField($index)
    {
        // Check if the index exists before trying to unset it
        if (isset($this->expected_business[$index])) {
            // Find the corresponding expected business entry and delete it from the database
            $business = ExpectedBusiness::where('test_name', $this->expected_business[$index]['test_name'])->first();

            if ($business) {
                $business->delete(); // Remove from the database
            }

            // Remove from the expected_business array
            unset($this->expected_business[$index]);

            // Re-index the array to prevent gaps in the indices
            $this->expected_business = array_values($this->expected_business);
        }
    }



    public function edit($id)
    {
        $report = BusinessInfoDetails::find($id);
        $contact_details = ContactDetail::where('lead_id', $id)->first();
        $bus_intl = BusinessInteligence::where('lead_id', $id)->first();
        // dd($report);
        if ($report) {
            $this->business_name = $report->business_name;
            $this->business_type = $report->business_type;
            $this->legal_business_type = $report->legal_business_type;
            $this->registered_no = $report->registered_no;
            $this->incorporation_no = $report->incorporation_no;
            $this->pan_no = $report->pan_no;
            $this->tan_no = $report->tan_no;
            $this->alternate_phone = $report->alternate_phone;
            $this->incorporation_date = $report->incorporation_date;
            $this->alternative_email = $report->alternative_email;
            $this->country = $report->country;
            $this->state = $report->state;
            $this->city = $report->city;
            $this->address = $report->address;
            $this->pincode = $report->pincode;
            $this->email = $report->email;
            $this->phone = $report->phone;
            $this->website = $report->website;
            $this->remark_description = $report->remark_description;
            $this->salesheadquarter = $report->salesheadquarter;
        }

        if ($contact_details) {
            $this->salutation = $contact_details->salutation;
            $this->first_name = $contact_details->first_name;
            $this->last_name = $contact_details->last_name;
            $this->department = $contact_details->department;
            $this->designation = $contact_details->designation;
            $this->office_phone = $contact_details->office_phone;
            $this->mobile_no = $contact_details->mobile_no;
            $this->office_email = $contact_details->office_email;
            $this->other_email = $contact_details->other_email;
        }

        if ($bus_intl) {
            $this->no_of_doctors = $bus_intl->no_of_doctors;
            $this->lab_revenue = $bus_intl->lab_revenue;
            $this->currently_outsourced_to = $bus_intl->currently_outsourced_to; // Fixed typo
            $this->description = $bus_intl->description;
            $this->specialities = $bus_intl->specialities;

            // Fetch expected business details
            $ex_leads = ExpectedBusiness::where('business_inteligence_id', $bus_intl->id)->get();

            // Initialize the expected_business array
            $this->expected_business = [];

            // Populate expected_business array
            foreach ($ex_leads as $lead) {
                $this->expected_business[] = [
                    'test_name' => $lead->test_name,
                    'expected_qty_day' => $lead->expected_qty_day,
                    'expected_l2l_price' => $lead->expected_l2l_price,
                    'amount' => $lead->amount,
                ];
            }
        }

    }


    public function submitForm()
    {
        $this->validateStep();

        // Start transaction to ensure all data is saved correctly
        \DB::transaction(function () {
            // Find the report and associated data
            $report = BusinessInfoDetails::find($this->reportId);
            $contact_details = ContactDetail::where('lead_id', $this->reportId)->first();
            $bus_intl = BusinessInteligence::where('lead_id', $this->reportId)->first();

            // Update BusinessInfoDetails
            $report->update([
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
            ]);

            // Update Contact Details
            if ($contact_details) {
                $contact_details->update([
                    'salutation' => $this->salutation,
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                    'department' => $this->department,
                    'designation' => $this->designation,
                    'office_phone' => $this->office_phone,
                    'mobile_no' => $this->mobile_no,
                    'office_email' => $this->office_email,
                    'other_email' => $this->other_email,
                ]);
            }

            // Update or create Business Intelligence
            if ($bus_intl) {
                $bus_intl->update([
                    'no_of_doctors' => $this->no_of_doctors,
                    'lab_revenue' => $this->lab_revenue,
                    'currently_outsourceed_to' => $this->currently_outsourceed_to,
                    'description' => $this->description,
                    'specialities' => $this->specialities,
                ]);
            } else {
                // Create new Business Intelligence if it doesn't exist
                $bus_intl = BusinessInteligence::create([
                    'lead_id' => $report->id,
                    'no_of_doctors' => $this->no_of_doctors,
                    'lab_revenue' => $this->lab_revenue,
                    'currently_outsourceed_to' => $this->currently_outsourceed_to,
                    'description' => $this->description,
                    'specialities' => $this->specialities,
                ]);
            }

            // Process expected business entries (update or insert without duplicates)
            $existingBusinesses = $bus_intl->expectedBusiness->keyBy('test_name'); // Get current expected business records keyed by 'test_name'

            foreach ($this->expected_business as $business) {
                if (!empty($business['test_name']) && !empty($business['expected_qty_day']) && !empty($business['total']) && !empty($business['expected_l2l_price']) && !empty($business['amount'])) {

                    // Check if the business exists in the current list
                    if ($existingBusinesses->has($business['test_name'])) {
                        // Get the existing business by test_name
                        $existingBusiness = $existingBusinesses->get($business['test_name']);

                        // Update only the necessary fields
                        $existingBusiness->update([
                            'expected_qty_day' => $business['expected_qty_day'],
                            'expected_l2l_price' => $business['expected_l2l_price'],
                            'amount' => $business['amount'],
                            'total' => $business['total'],
                        ]);
                    }
                }
            }


            // Emit success alert after all updates
            $this->emit('alert', ['type' => 'success', 'message' => 'All information updated successfully.']);
        });

        // Redirect to another route after completion
        return redirect()->route('lead_tagging');
    }





    public function updateReport()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'pincode' => 'required|integer',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'website' => 'nullable|url',
            'status' => 'required|string|max:255',
            'source' => 'required|string|max:255',
            'opportunity' => 'nullable|string|max:255',
            'industry' => 'nullable|string|max:255',
            'assign_user' => 'nullable|exists:users,id',
            'intelligence_description' => 'nullable|string|max:255',
            'remark_date' => 'required|date',
            'remark_description' => 'nullable|string|max:255',
        ]);

        $report = BusinessInfoDetails::find($this->reportId);

        if ($report) {
            // Update the report with the form data
            $report->name = $this->name;
            $report->description = $this->description;
            $report->country = $this->country;
            $report->state = $this->state;
            $report->city = $this->city;
            $report->address = $this->address;
            $report->pincode = $this->pincode;
            $report->email = $this->email;
            $report->phone = $this->phone;
            $report->website = $this->website;
            $report->status = $this->status;
            $report->source = $this->source;
            $report->opportunity = $this->opportunity;
            $report->industry = $this->industry;
            $report->assign_user = $this->assign_user;
            $report->intelligence_description = $this->intelligence_description;
            $report->remark_date = $this->remark_date;
            $report->remark_description = $this->remark_description;

            // dd($report);
            // Save the updated report
            $report->save();

            // Flash success message
            session()->flash('message', 'Details updated successfully.');
            // $this->emit('alert', ['type' => 'success', 'message' => 'Details updated successfully.']);
        } else {
            session()->flash('message', 'Report not found.');
        }
    }

    public function loadContactDetails()
    {
        $this->list_contact_details = ContactDetail::where('lead_id', $this->reportId)->paginate(5)->toArray(); // Convert to array
    }

    public function render()
    {
        $contact_details = ContactDetail::where('first_name', 'like', '%' . $this->searchInput . '%')
            ->orWhere('last_name', 'like', '%' . $this->searchInput . '%')
            ->orWhere('department', 'like', '%' . $this->searchInput . '%')
            ->orWhere('designation', 'like', '%' . $this->searchInput . '%')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.contact-details', [
            'contact_details' => $contact_details,
        ]);
    }
}
