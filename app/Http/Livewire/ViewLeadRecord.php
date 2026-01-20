<?php

namespace App\Http\Livewire;

use App\Models\BusinessInteligence;
use App\Models\ContactDetail;
use App\Models\ExpectedBusiness;
use App\Models\Salesheadquarter;
use Livewire\Component;
use App\Models\{User, BusinessInfoDetails};
use Illuminate\Http\Request;
class ViewLeadRecord extends Component
{
    
    public $remark_description;
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
    public $sales_head_quarters;
    public $salesheadquarter;
    public $specialities = [];
    public $expected_business = [];
    public $no_of_doctors;
    public $lab_revenue;
    public $currently_outsourceed_to;
    public $description;
    public $list_contact_details;

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

    public $activeTab = 'business-info'; // Default active tab
    public function mount(Request $request)
    {
        $this->users = User::all();
        $this->reportId = $request->route('id'); // Store report ID
        if ($this->reportId) {
            $this->edit($this->reportId); // Load the report details for editing
        }
        $this->list_contact_details = ContactDetail::where('lead_id', $this->reportId)->get();
        $this->sales_head_quarters = Salesheadquarter::all();
    }
   
    public function getListContactDetailsProperty() // Getter method
    {
        return $this->list_contact_details;
    }
    public function addNewField()
    {
        $this->expected_business[] = ['test_name' => '', 'expected_qty_day' => '', 'expected_l2l_price' => '', 'amount' => '','total' => ''];
    }

    public function removeField($index)
    {
        unset($this->expected_business[$index]);
        $this->expected_business = array_values($this->expected_business); // Re-index the array
    }
   

    public function edit($id)
    {
        $report = BusinessInfoDetails::find($id);
        $contact_details = ContactDetail::where('lead_id', $id)->first();
        $bus_intl = BusinessInteligence::where('lead_id', $id)->first();
    
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
            $this->currently_outsourceed_to = $bus_intl->currently_outsourceed_to;
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
                    'total' => $lead->total,
                ];
            }
        }
    }
    

    public function submitAll()
    {
        
        // Validate based on the active tab
        // if ($this->activeTab === 'business-info') {
        //     $this->validate([
        //         'business_name' => 'required|string|max:255',
        //         'business_type' => 'required|string|max:255',
        //         'legal_business_type' => 'required|string|max:255',
        //         'registered_no' => 'required|string|max:255',
        //         'incorporation_no' => 'required|string|max:255',
        //         'pan_no' => 'required|string|max:255',
        //         'tan_no' => 'required|string|max:255',
        //         'alternate_phone' => 'required|string|max:15',
        //         'incorporation_date' => 'required|date',
        //         'alternative_email' => 'required|email|max:255',
        //         'country' => 'required|string|max:255',
        //         'state' => 'required|string|max:255',
        //         'city' => 'required|string|max:255',
        //         'address' => 'required|string|max:255',
        //         'pincode' => 'required|integer',
        //         'email' => 'required|email|max:255',
        //         'phone' => 'required|string|max:15',
        //         'website' => 'nullable|url|max:255',
        //     ]);

        //     // Move to the next tab
        //     $this->activeTab = 'contact-details';
        //     return; // Stop further execution
        // }

        // if ($this->activeTab === 'contact-details') {
        //     $this->validate([
        //         'salutation' => 'required|string|max:255',
        //         'first_name' => 'required|string|max:255',
        //         'last_name' => 'required|string|max:255',
        //         'department' => 'required|string|max:255',
        //         'designation' => 'required|string|max:255',
        //         'office_phone' => 'required|digits:10',
        //         'mobile_no' => 'required|string|max:15',
        //         'office_email' => 'required|email|max:255',
        //         'other_email' => 'nullable|email|max:255',
        //     ]);

        //     // Move to the next tab
        //     $this->activeTab = 'business-intelligence';
        //     return; // Stop further execution
        // }

        // if ($this->activeTab === 'business-intelligence') {
        //     // Validate business intelligence fields
        //     $this->validate([
        //         'no_of_doctors' => 'required|integer',
        //         'lab_revenue' => 'required|numeric',
        //         'currently_outsourceed_to' => 'required|string|max:255',
        //         'description' => 'nullable|string|max:255',
        //         'specialities' => 'required|string|max:255', // Adjust according to your needs
        //     ]);

        //     // Move to the next tab
        //     $this->activeTab = 'remarks';
        //     return; // Stop further execution
        // }

        if ($this->activeTab === 'remarks') {
            // $this->validate([
            //     'remark_description' => 'required|string|max:1000',
            // ]);

            // Start transaction to ensure all data is saved correctly
            \DB::transaction(function () {
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
                    // Create new record if it doesn't exist
                    $bus_intl = BusinessInteligence::create([
                        'lead_id' => $report->id,
                        'no_of_doctors' => $this->no_of_doctors,
                        'lab_revenue' => $this->lab_revenue,
                        'currently_outsourceed_to' => $this->currently_outsourceed_to,
                        'description' => $this->description,
                        'specialities' => $this->specialities,
                    ]);
                }
    
                // Save expected business data to the pivot table
                foreach ($this->expected_business as $business) {
                    $bus_intl->expectedBusiness()->create([
                        'test_name' => $business['test_name'],
                        'expected_qty_day' => $business['expected_qty_day'],
                    ]);
                }
    
                // Emit success alert
                $this->emit('alert', ['type' => 'success', 'message' => 'All information updated successfully.']);
            });
            
            // Redirect to another route after completion
            return redirect()->route('lead_tagging');
        }
    }
    
    
    public function updateReport()
    {
        // $this->validate([
        //     'name' => 'required|string|max:255',
        //     'description' => 'nullable|string|max:255',
        //     'country' => 'required|string|max:255',
        //     'state' => 'required|string|max:255',
        //     'city' => 'required|string|max:255',
        //     'address' => 'required|string|max:255',
        //     'pincode' => 'required|integer',
        //     'email' => 'required|email',
        //     'phone' => 'required|string|max:15',
        //     'website' => 'nullable|url',
        //     'status' => 'required|string|max:255',
        //     'source' => 'required|string|max:255',
        //     'opportunity' => 'nullable|string|max:255',
        //     'industry' => 'nullable|string|max:255',
        //     'assign_user' => 'nullable|exists:users,id',
        //     'intelligence_description' => 'nullable|string|max:255',
        //     'remark_date' => 'required|date',
        //     'remark_description' => 'nullable|string|max:255',
        // ]);

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
            session()->flash('message' ,'Report not found.');
        }
    }

    public function render()
    {
        $contactDetails = ContactDetail::paginate(5);
        return view('livewire.view-lead-record', ['contactDetails' => $contactDetails]);
    }
}
