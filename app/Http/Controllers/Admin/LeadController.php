<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{BusinessInteligence, ExpectedBusiness, BusinessInfoDetails,AddressDetails,FinancialPreferences,Document,ServiceExpectation,Note,SocialMedia,SampleTestCapability,InHouseTest,DiagnosticNeeds,CurrentServiceChallenges,InPatient};
use App\Models\ContactDetail;
use App\Models\Salesheadquarter;
use Yajra\DataTables\Facades\DataTables;
use DB;


class LeadController extends Controller
{
    public function index()
    {

        $is_sales_module = true;
        $sales_head_quarters = Salesheadquarter::all();
        $records = BusinessInfoDetails::paginate(10);
        return view('lead.index', compact('sales_head_quarters','is_sales_module','records'));
    }

     public function my_accounts(){
       $is_sales_module = true;
         return view('account.index',compact('is_sales_module'));
    }

     public function my_contacts(){
       $is_sales_module = true;
         return view('contact.index',compact('is_sales_module'));
    }


    public function getReports(Request $request)
    {
        $reports = BusinessInfoDetails::with(['user', 'salesheadquarters'])->orderBy('id', 'desc');

        return DataTables::of($reports)
            ->addColumn('action', function ($report) {
                return '
                    <a href="' . route('lead.view', $report->id) . '" class="view-link"><i class="far fa-eye"></i></a>
                    <a href="' . route('lead.edit', $report->id) . '" class="edit-link"><i class="fas fa-edit"></i></a>
                    <span class="delete-link" style="cursor:pointer;" onclick="confirmDelete(\'' . $report->id . '\')"><i class="fas fa-trash"></i></span>
                ';
            })
            ->editColumn('status', function ($report) {
                return $report->status === 'own' ? '<span class="text-green-600">' . $report->status . '</span>' : '<span class="text-red-600">' . $report->status . '</span>';
            })
            ->addColumn('headquarters', function ($report) {
                return $report->salesheadquarters ? $report->salesheadquarters->name : 'N/A';
            })
            ->addColumn('assign_user', function ($report) {
                return $report->user ? $report->user->first_name . ' ' . $report->user->last_name : 'N/A';
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }

    public function create()
    {
        $sales_head_quarters = Salesheadquarter::all();
        $expected_business[] = ['test_name' => '', 'expected_qty_day' => '', 'expected_l2l_price' => '', 'amount' => '', 'total' => ''];
        return view('lead.create', compact('sales_head_quarters', 'expected_business'));
    }
/*
   public function store(Request $request)
    {
        // dd($request->all());
        // Validate input
        $request->validate([
            'business_name' => 'required|string|max:255'
        ]);

        // Save Business Info Details
        $businessInfo = BusinessInfoDetails::create([
            'business_name' => $request->business_name,
            'business_type' => $request->business_type,
            'legal_business_type' => $request->legal_business_type,
            'registered_no' => $request->registered_no,
            'incorporation_no' => $request->incorporation_no,
            'pan_no' => $request->pan_no,
            'tan_no' => $request->tan_no,
            'incorporation_date' => $request->incorporation_date,
            'remark_description' => $request->remark_description,
            'registered_no_expiry' => $request->registered_no_expiry,
            'gst_no' => $request->gst_no,
            'company_whatsapp' => $request->company_whatsapp,
        ]);

        // Save Address Details
        $addressDetails = AddressDetails::create([
            'address1' => $request->address1,
            'address2' => $request->address2,
            'state' => $request->state,
            'city' => $request->city,
            'pincode' => $request->pincode,
            'salesheadquarter' => $request->salesheadquarter,
            'phone' => $request->phone,
            'alternate_phone' => $request->alternate_phone,
            'email' => $request->email,
            'website' => $request->website,
            'lead_id' => $businessInfo->id, // Associate with BusinessInfo
        ]);

        // Save Contacts
        foreach ($request->contacts as $contact) {
            $photoPath = null;

            // Check if a photo is uploaded
              if (isset($contact['contact_photo']) && $contact['contact_photo']->isValid()) {
                // Define the path to save the photo in 'public/contact_photos'
                    $destinationPath = public_path('contact_photos');

                    // Generate a unique file name
                    $fileName = time() . '_' . $contact['contact_photo']->getClientOriginalName();

                    // Move the file to the destination path
                    $contact['contact_photo']->move($destinationPath, $fileName);

                    // Save the relative path to the database
                    $photoPath = 'contact_photos/' . $fileName;
                }

                // dd($photoPath);
                // Save contact details
                ContactDetail::create([
                    'salutation' => $contact['salutation'],
                    'first_name' => $contact['first_name'],
                    'last_name' => $contact['last_name'],
                    'department' => $contact['department'],
                    'designation' => $contact['designation'],
                    'authority' => $contact['authority'],
                    'mobile_no' => $contact['mobile_no'],
                    'whats_phone' => $contact['whats_phone'],
                    'office_phone' => $contact['office_phone'],
                    'office_email' => $contact['office_email'],
                    'personal_email' => $contact['personal_email'],
                    'fb_id' => $contact['fb_id'],
                    'insta_id' => $contact['insta_id'],
                    'twitter_id' => $contact['twitter_id'],
                    'linked_id' => $contact['linked_id'],
                    'birthday' => $contact['birthday'],
                    'anniversary' => $contact['anniversary'],
                    'reli_belief' => $contact['reli_belief'],
                    'contact_photo' => $photoPath, // Save the photo path
                ]);
            }   
             $serviceExpectation = ServiceExpectation::create([
                'open_timings_from_week' => $request->open_timings_from_week,
                'open_timings_to_week' => $request->open_timings_to_week,
                'no_of_pickup_week' => $request->no_of_pickup_week,
                'no_of_pickup_1' => $request->no_of_pickup_1,
                'no_of_pickup_2' => $request->no_of_pickup_2,
                'no_of_pickup_3' => $request->no_of_pickup_3,
                'no_of_pickup_4' => $request->no_of_pickup_4,
                'no_of_pickup_5' => $request->no_of_pickup_5,
                'open_timings_from_public' => $request->open_timings_from_public,
                'open_timings_to_public' => $request->open_timings_to_public,
                'no_of_pickup_public' => $request->no_of_pickup_public,
                'no_of_pickup_public_1' => $request->no_of_pickup_public_1,
                'business_type_week' => $request->business_type_week,
                'business_type_public' => $request->business_type_public,
                'no_of_pickup_public_2' => $request->no_of_pickup_public_2,
                'no_of_pickup_public_3' => $request->no_of_pickup_public_3,
                'no_of_pickup_public_4' => $request->no_of_pickup_public_4,
                'no_of_pickup_public_5' => $request->no_of_pickup_public_5,
                'home_collection' => $request->home_collection,
                'it_integration' => $request->it_integration,
                'nabl_certificate' => $request->nabl_certificate,
                'nabl_accreditation' => $request->nabl_accreditation,
                'cus_tat_sensitive' => $request->cus_tat_sensitive,
                'cus_willing_to_pay' => $request->cus_willing_to_pay,
                'cus_quality_focus' => $request->cus_quality_focus,
                'cus_price_sensitive' => $request->cus_price_sensitive,
                'lead_id' => $businessInfo->id
            ]);

    // dd($request->expected_business,$businessInfo);
              foreach ($request->expected_business as $business) {
                $expected_business = DB::table('business_intelligence_expected_business')->create([
                'business_inteligence_id' => $serviceExpectation->id,
                'lead_id' => $businessinfo->id,
                 "test_name" => $business["test_name"],
                      "method" => $business["method"],
                      "current_load_month" => $business["current_load_month"],
                      "inhouse" => $business["inhouse"],
                      "outsource" => $business["outsource"],
                      "outsource_to" => $business["outsource_to"],
                      "current_l2l_price" => $business["current_l2l_price"],
                      "expected_qty_day" => $business["expected_qty_day"],
                      "expected_revenue" => $business["expected_revenue"],
                ]);
            }
     
             foreach ($request->expected_business as $business) {

            $expected_business = DB::table('sales_expected_speciality')->create([
            'sales_id' => $serviceExpectation->id,
            'lead_id' => $businessinfo->id,
             "speciality_name" => $business["speciality_name"],
                  "doctor_name" => $business["doctor_name"]
            ]);
            }
            $financialPreferences = FinancialPreferences::create([
                'lead_id' => $businessinfo->id,
                'payment_preference' => $request->payment_preference,
                'payment_term' => $request->payment_term,
                'payment_method' => $request->payment_method,
                'volume_discount' => $request->volume_discount,
                'pref_day_samples' => $request->pref_day_samples,
                'pref_day_rs' => $request->pref_day_rs,
                'communication_preference' => $request->communication_preference,
                'pref_meeting_day' => $request->pref_meeting_day,
                'pref_meeting_time' => $request->pref_meeting_time,
            ]);


        return response()->json(['message' => 'Data saved successfully!'], 201);
    }

    */
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'business_name' => 'required|string|max:255',
            'contacts.*.contact_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        DB::beginTransaction();

        try {
            // Save Business Info Details
            $businessInfo = BusinessInfoDetails::create($request->only([
                'business_name', 'business_type', 'legal_business_type', 'registered_no',
                'incorporation_no', 'pan_no', 'tan_no', 'incorporation_date', 
                'remark_description', 'registered_no_expiry', 'gst_no', 'company_whatsapp',
            ]));

            // Save Financial Preferences
            FinancialPreferences::create([
                'lead_id' => $businessInfo->id,
                'payment_preference' => $request->payment_preference,
                'payment_term' => $request->payment_term,
                'payment_method' => $request->payment_method,
                'volume_discount' => $request->volume_discount,
                'pref_day_samples' => $request->pref_day_samples,
                'pref_day_rs' => $request->pref_day_rs,
                'communication_preference' => $request->communication_preference,
                'pref_meeting_day' => $request->pref_meeting_day,
                'pref_meeting_time' => $request->pref_meeting_time,
            ]);

            // Save Social Media
            SocialMedia::create([
                'lead_id' => $businessInfo->id,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
            ]);

            // Save Sample Test Capability
            SampleTestCapability::create([
                'lead_id' => $businessInfo->id,
                'in_house_check' => $request->in_house_check,
                'lab_departments' => $request->lab_departments,
                'lab_equipments' => $request->lab_equipments,
            ]);

            // Save In-House Tests
            InHouseTest::create([
                'lead_id' => $businessInfo->id,
                'inhouse_test_volume' => $request->inhouse_test_volume,
                'outsource_test_volume' => $request->outsource_test_volume,
                'daily_patient_footfall' => $request->daily_patient_footfall,
                'inhouse_test_value' => $request->inhouse_test_value,
                'outsource_test_value' => $request->outsource_test_value,
                'annual_lab_revenue' => $request->annual_lab_revenue,
            ]);

            // Save Diagnostic Needs
            DiagnosticNeeds::create([
                'lead_id' => $businessInfo->id,
                'routine' => $request->routine,
                'speciality' => $request->speciality,
                'genetics' => $request->genetics,
                'super_speciality' => $request->super_speciality,
            ]);

            // Save Current Service Challenges
            CurrentServiceChallenges::create([
                'lead_id' => $businessInfo->id,
                'challenges_faced_1' => $request->challenges_faced_1,
                'challenges_faced_2' => $request->challenges_faced_2,
                'challenges_faced_3' => $request->challenges_faced_3,
                'challenges_faced_4' => $request->challenges_faced_4,
                'challenges_faced_5' => $request->challenges_faced_5,
                'challenges_faced_6' => $request->challenges_faced_6,
            ]);

            // Handle Document File Upload
            $docPath = $this->uploadFile($request, 'doc_file', 'doc_files');
            Document::create([
                'lead_id' => $businessInfo->id,
                'doc_file' => $docPath,
                'doc_notes' => $request->doc_notes,
            ]);

            // Handle Notes Attachment Upload
            $notePath = $this->uploadFile($request, 'note_upload_attch', 'note_upload_attchs');
            Note::create([
                'lead_id' => $businessInfo->id,
                'note_title' => $request->note_title,
                'note_date' => $request->note_date,
                'note_time' => $request->note_time,
                'created_by' => $request->created_by,
                'write_note' => $request->write_note,
                'note_upload_attch' => $notePath,
            ]);

            // Save Address Details
            AddressDetails::create(array_merge(
                $request->only([
                    'address1', 'address2', 'state', 'city', 'pincode',
                    'salesheadquarter', 'phone', 'alternate_phone', 'email', 'website',
                ]),
                ['lead_id' => $businessInfo->id]
            ));
            InPatient::create([
                $request->only([
                    'no_of_beds' ,'no_of_doctors','hos_revenue' ,'expected_speciality'
                ]),
                ['lead_id' => $businessInfo->id]
            ]);

            // Save Contacts
            foreach ($request->contacts as $contact) {
                $contact['contact_photo'] = $this->uploadFile($contact, 'contact_photo', 'contact_photos');
                ContactDetail::create(array_merge($contact, ['lead_id' => $businessInfo->id]));
            }

            // Save Service Expectations
            ServiceExpectation::create(array_merge(
                $request->only([
                    'open_timings_from_week', 'open_timings_to_week', 'no_of_pickup_week',
                    'no_of_pickup_1', 'no_of_pickup_2', 'no_of_pickup_3', 'no_of_pickup_4', 
                    'no_of_pickup_5', 'open_timings_from_public', 'open_timings_to_public',
                    'no_of_pickup_public', 'home_collection', 'it_integration',
                    'nabl_certificate', 'nabl_accreditation', 'cus_tat_sensitive',
                    'cus_quality_focus', 'cus_price_sensitive',
                ]),
                ['lead_id' => $businessInfo->id]
            ));

            // Save Expected Business
            foreach ($request->expected_business as $business) {
                ExpectedBusiness::create(array_merge($business, [
                    'lead_id' => $businessInfo->id
                ]));
            }

            DB::commit();

            return response()->json(['message' => 'Lead created successfully'], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed to create lead: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Helper function to handle file uploads.
     */
    private function uploadFile($request, $key, $destination)
    {
        // if ($request->hasFile($key) && $request->file($key)->isValid()) {
        //     return $request->file($key)->store($destination, 'public');
        // }
        return null;
    }

       
    public function edit($id)
    {
        // dd($id);

        $report = BusinessInfoDetails::find($id);
        $contact_details = ContactDetail::where('lead_id', $id)->get();
        // dd($contact_details);
        $FinancialPreferences = FinancialPreferences::where('lead_id', $id)->first();
        $ServiceExpectation = ServiceExpectation::where('lead_id', $id)->first();
        $ExpectedBusiness = ExpectedBusiness::where('lead_id', $id)->get();
        // dd($ExpectedBusiness);
        $AddressDetails = AddressDetails::where('lead_id', $id)->first();
        // dd($contact_details);
        $Note = Note::where('lead_id', $id)->get();
        $Document = Document::where('lead_id', $id)->get();
        $bus_intl = BusinessInteligence::where('lead_id', $id)->first();
        $sales_head_quarters = Salesheadquarter::all();
        $SocialMedia = SocialMedia::where('lead_id',$id)->first();
        $SampleTestCapability= SampleTestCapability::where('lead_id',$id)->first();
        $InHouseTest = InHouseTest::where('lead_id',$id)->first();
        $DiagnosticNeeds = DiagnosticNeeds::where('lead_id',$id)->first();
        $CurrentServiceChallenges= CurrentServiceChallenges::where('lead_id',$id)->first();
        // Fetch expected business details
        if(!empty($bus_intl)){

            $ex_leads = ExpectedBusiness::where('business_inteligence_id', $bus_intl->id)->get() ?? [];
            return view('lead.edit_lead', compact('report', 'contact_details','FinancialPreferences','ServiceExpectation','ExpectedBusiness','AddressDetails','Note','Document', 'bus_intl', 'ex_leads','SocialMedia', 'sales_head_quarters','SampleTestCapability','InHouseTest','DiagnosticNeeds','CurrentServiceChallenges'));

        }else{

return view('lead.edit_lead', compact('report', 'contact_details','FinancialPreferences','ServiceExpectation','ExpectedBusiness','AddressDetails','Note','Document', 'bus_intl', 'InHouseTest', 'sales_head_quarters','SocialMedia','SampleTestCapability','DiagnosticNeeds','CurrentServiceChallenges'));        }

    }

   public function update(Request $request, $id)
{
    $businessInfo = BusinessInfoDetails::findOrFail($id); // Ensure the business info exists

    $request->validate([
        'business_name' => 'required|string|max:255',
        'contacts.*.contact_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'expected_business.*.test_name' => 'required|string',
        'expected_business.*.expected_qty_day' => 'required|integer|min:0',
    ]);

    DB::beginTransaction();

    try {
        // Update Business Info Details
        $businessInfo->update($request->only([
            'business_name', 'business_type', 'legal_business_type', 'registered_no',
            'incorporation_no', 'pan_no', 'tan_no', 'incorporation_date',
            'remark_description', 'registered_no_expiry', 'gst_no', 'company_whatsapp',
        ]));

        // Update related models (use find or create for flexibility)
        $businessInfo->financialPreferences()->updateOrCreate(
            [],
            array_merge($request->only([
                'payment_preference', 'payment_term', 'payment_method', 'volume_discount',
                'pref_day_samples', 'pref_day_rs', 'communication_preference',
                'pref_meeting_day', 'pref_meeting_time',
            ]), ['lead_id' => $businessInfo->id]) // Add lead_id to the data
        );

        $businessInfo->socialMedia()->updateOrCreate(
            [],
            array_merge($request->only([
                'facebook', 'instagram', 'twitter', 'linkedin',
            ]), ['lead_id' => $businessInfo->id]) // Add lead_id to the data
        );

        $businessInfo->sampleTestCapability()->updateOrCreate(
            [],
            array_merge($request->only([
                'in_house_check', 'lab_departments', 'lab_equipments',
            ]), ['lead_id' => $businessInfo->id]) // Add lead_id to the data
        );

         $businessInfo->Inpatient()->updateOrCreate(
            [],
            array_merge($request->only([
                'no_of_beds' ,'no_of_doctors','hos_revenue' ,'expected_speciality'
            ]), ['lead_id' => $businessInfo->id]) // Add lead_id to the data
        );

        $businessInfo->inHouseTests()->updateOrCreate(
            [],
            array_merge($request->only([
                'inhouse_test_volume', 'outsource_test_volume', 'daily_patient_footfall',
                'inhouse_test_value', 'outsource_test_value', 'annual_lab_revenue',
            ]), ['lead_id' => $businessInfo->id]) // Add lead_id to the data
        );

        $businessInfo->diagnosticNeeds()->updateOrCreate(
            [],
            array_merge($request->only([
                'routine', 'speciality', 'genetics', 'super_speciality',
            ]), ['lead_id' => $businessInfo->id]) // Add lead_id to the data
        );

        $businessInfo->currentServiceChallenges()->updateOrCreate(
            [],
            array_merge($request->only([
                'challenges_faced_1', 'challenges_faced_2', 'challenges_faced_3',
                'challenges_faced_4', 'challenges_faced_5', 'challenges_faced_6',
            ]), ['lead_id' => $businessInfo->id]) // Add lead_id to the data
        );

        // Handle File Uploads
        if ($request->hasFile('doc_file')) {
            $docPath = $this->uploadFile($request, 'doc_file', 'doc_files');
            $businessInfo->document()->updateOrCreate([], [
                'doc_file' => $docPath,
                'doc_notes' => $request->doc_notes,
            ]);
        }

        if ($request->hasFile('note_upload_attch')) {
            $notePath = $this->uploadFile($request, 'note_upload_attch', 'note_upload_attchs');
            $businessInfo->note()->updateOrCreate([], [
                'note_title' => $request->note_title,
                'note_date' => $request->note_date,
                'note_time' => $request->note_time,
                'created_by' => $request->created_by,
                'write_note' => $request->write_note,
                'note_upload_attch' => $notePath,
            ]);
        }

        // Update Contacts
        foreach ($request->contacts as $contact) {
            $contactData = $contact;
            if (isset($contact['contact_photo']) && $request->hasFile('contacts.*.contact_photo')) {
                $contactData['contact_photo'] = $this->uploadFile($contact, 'contact_photo', 'contact_photos');
            }
            ContactDetail::updateOrCreate(
                ['id' => $contact['id'] ?? null], // Use ID for updating, if available
                array_merge($contactData, ['lead_id' => $businessInfo->id]) // Add lead_id to the data
            );
        }

        // Update Expected Business
        foreach ($request->expected_business as $business) {
            ExpectedBusiness::updateOrCreate(
                ['id' => $business['id'] ?? null],
                array_merge($business, ['lead_id' => $businessInfo->id]) // Add lead_id to the data
            );
        }

        DB::commit();

        return response()->json(['message' => 'Lead updated successfully'], 200);
    } catch (\Exception $e) {
        DB::rollBack();
        \Log::error('Update Error: ' . $e->getMessage());
        return response()->json(['error' => 'Failed to update lead: ' . $e->getMessage()], 500);
    }
}

    public function view($id)
    {
        // dd($id);

        $report = BusinessInfoDetails::find($id);
        $contact_details = ContactDetail::where('lead_id', $id)->get();
        $bus_intl = BusinessInteligence::where('lead_id', $id)->first();
        $sales_head_quarters = Salesheadquarter::all();
        // Fetch expected business details
        if(!empty($bus_intl)){

            $ex_leads = ExpectedBusiness::where('business_inteligence_id', $bus_intl->id)->get() ?? [];
            return view('lead.view', compact('report', 'contact_details', 'bus_intl', 'ex_leads', 'sales_head_quarters'));

        }else{

            return view('lead.view', compact('report', 'contact_details', 'bus_intl',  'sales_head_quarters'));
        }
// dd($bus_intl);
    }

    public function addContactDetails(Request $request, $lead_id)
    {

        $validated = $request->validate([
            'salutation' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'department' => 'required|string',
            'designation' => 'required|string',
            'office_phone' => 'required|string',
            'mobile_no' => 'required|string',
            'office_email' => 'required|email',
            'other_email' => 'nullable|email',
        ]);
        ContactDetail::create([
            'salutation' => $request->salutation,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'department' => $request->department,
            'designation' => $request->designation,
            'office_phone' => $request->office_phone,
            'mobile_no' => $request->mobile_no,
            'office_email' => $request->office_email,
            'other_email' => $request->other_email,
            'lead_id' => $lead_id,
        ]);

        return redirect()->route('lead.edit', $lead_id);
    }

    public function updateContactDetails(Request $request)
    {
        $validated = $request->validate([
            'salutation' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'department' => 'required|string',
            'designation' => 'required|string',
            'office_phone' => 'required|string',
            'mobile_no' => 'required|number|max:10',
            'office_email' => 'required|email',
            'other_email' => 'nullable|email',
        ]);
        $contact = ContactDetail::find($request->contact_id);
        $contact->update([
            'salutation' => $request->salutation,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'department' => $request->department,
            'designation' => $request->designation,
            'office_phone' => $request->office_phone,
            'mobile_no' => $request->mobile_no,
            'office_email' => $request->office_email,
            'other_email' => $request->other_email
        ]);

        return redirect()->route('lead.edit', $contact->lead_id);
    }

    public function contactDestroy($id)
    {
        $contact = ContactDetail::find($id);

        if ($contact) {
            $contact->delete();
            return response()->json(['message' => 'Contact deleted successfully.']);
        } else {
            return response()->json(['message' => 'Contact not found.'], 404);
        }
    }

    public function businessfinfoupdate(Request $request,$lead_id){
        // dd($request->all(),$lead_id);
        $report = BusinessInteligence::find($lead_id);

        if ($report) {
            $report->update([
                'no_of_doctors' => $request->no_of_doctors,
                'lab_revenue' => $request->lab_revenue,
                'currently_outsourceed_to' => $request->currently_outsourceed_to,
                'description' => $request->description,
                'specialities' => json_encode($request->specialities), // Encode to JSON
                'lead_id' => $lead_id
            ]);
    
    
            // Save expected business data to the pivot table (if it exists)
            if (!empty($expectedBusinessData)) {
                foreach ($expectedBusinessData as $business) {
                    $report->expectedBusiness()->create([
                        'test_name' => $business['test_name'],
                        'expected_qty_day' => $business['expected_qty_day'],
                        'expected_l2l_price' => $business['expected_l2l_price'],
                        'amount' => $business['amount'],
                        'total' => $business['total'],
                        'lead_id' => $lead_id,
                    ]);
                }
            }
        }
        return redirect()->route('lead.edit',$lead_id);

    }

    public function BusinessInteligence(Request $request, $lead_id) {
        // Validate the incoming request data

        $validatedData = $request->validate([
            'no_of_doctors' => 'required|integer',
            'lab_revenue' => 'required|numeric',
            'currently_outsourceed_to' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'specialities' => 'required|array', // Assuming specialities is an array
            'expected_business' => 'required|array',
        ]);
    
        $report = BusinessInteligence::where('lead_id',$lead_id)->first();
    
        if ($report) {
            // Update the report fields
            $report->update([
                'no_of_doctors' => $validatedData['no_of_doctors'],
                'lab_revenue' => $validatedData['lab_revenue'],
                'currently_outsourceed_to' => $validatedData['currently_outsourceed_to'],
                'description' => $validatedData['description'],
                'specialities' => json_encode($validatedData['specialities']), // Encode to JSON
                'lead_id' => $lead_id
            ]);
    
            // Save expected business data to the pivot table (if it exists)
            if (!empty($validatedData['expected_business'])) {
                foreach ($validatedData['expected_business'] as $business) {
                    $report->expectedBusiness()->create([
                        'test_name' => $business['test_name'],
                        'expected_qty_day' => $business['expected_qty_day'],
                        'expected_l2l_price' => $business['expected_l2l_price'],
                        'amount' => $business['amount'],
                        'total' => $business['total'],
                        'lead_id' => $lead_id,
                    ]);
                }
            }
        }
    
        return redirect()->route('lead.edit', $lead_id)->with('success', 'Business intelligence updated successfully.');
    }
    
    public function remark(Request $request ,$lead_id){
        $record = BusinessInfoDetails::find($lead_id);
        $record->update(['remark_description' => $request->remark_description]);
        return redirect()->route('lead.edit',$lead_id);
    }

    public function relationship(){
        $sales_head_quarters = \App\Models\Salesheadquarter::all();
        $expected_business[] = ['test_name' => '', 'expected_qty_day' => '', 'expected_l2l_price' => '', 'amount' => '', 'total' => ''];
        //return view('lead.create', compact('sales_head_quarters', 'expected_business'));
         return view('leaddata.relationship', compact('sales_head_quarters', 'expected_business'));
    }

    public function marketing(){
        $sales_head_quarters = \App\Models\Salesheadquarter::all();
        $expected_business[] = ['test_name' => '', 'expected_qty_day' => '', 'expected_l2l_price' => '', 'amount' => '', 'total' => ''];
        //return view('lead.create', compact('sales_head_quarters', 'expected_business'));
         return view('leaddata.marketing', compact('sales_head_quarters', 'expected_business'));
    }

    public function forecast(){
        $sales_head_quarters = \App\Models\Salesheadquarter::all();
        $expected_business[] = ['test_name' => '', 'expected_qty_day' => '', 'expected_l2l_price' => '', 'amount' => '', 'total' => ''];
        //return view('lead.create', compact('sales_head_quarters', 'expected_business'));
         return view('leaddata.forecast', compact('sales_head_quarters', 'expected_business'));
    }

    public function pricebook(){
        $sales_head_quarters = \App\Models\Salesheadquarter::all();
        $expected_business[] = ['test_name' => '', 'expected_qty_day' => '', 'expected_l2l_price' => '', 'amount' => '', 'total' => ''];
        //return view('lead.create', compact('sales_head_quarters', 'expected_business'));
         return view('leaddata.pricebook', compact('sales_head_quarters', 'expected_business'));
    }public function profitability(){
        $sales_head_quarters = \App\Models\Salesheadquarter::all();
        $expected_business[] = ['test_name' => '', 'expected_qty_day' => '', 'expected_l2l_price' => '', 'amount' => '', 'total' => ''];
        //return view('lead.create', compact('sales_head_quarters', 'expected_business'));
         return view('leaddata.profitability', compact('sales_head_quarters', 'expected_business'));
    }
    public function quotes(){
        $sales_head_quarters = \App\Models\Salesheadquarter::all();
        $expected_business[] = ['test_name' => '', 'expected_qty_day' => '', 'expected_l2l_price' => '', 'amount' => '', 'total' => ''];
        //return view('lead.create', compact('sales_head_quarters', 'expected_business'));
         return view('leaddata.quotes', compact('sales_head_quarters', 'expected_business'));
    }

    public function notes(){
        $sales_head_quarters = \App\Models\Salesheadquarter::all();
        $expected_business[] = ['test_name' => '', 'expected_qty_day' => '', 'expected_l2l_price' => '', 'amount' => '', 'total' => ''];
        //return view('lead.create', compact('sales_head_quarters', 'expected_business'));
         return view('leaddata.notes', compact('sales_head_quarters', 'expected_business'));
    }
    public function my_activity(){
        $sales_head_quarters = \App\Models\Salesheadquarter::all();
        $expected_business[] = ['test_name' => '', 'expected_qty_day' => '', 'expected_l2l_price' => '', 'amount' => '', 'total' => ''];
        //return view('lead.create', compact('sales_head_quarters', 'expected_business'));
         return view('leaddata.activity', compact('sales_head_quarters', 'expected_business'));
    }
    public function my_expenses(){
        $sales_head_quarters = \App\Models\Salesheadquarter::all();
        $expected_business[] = ['test_name' => '', 'expected_qty_day' => '', 'expected_l2l_price' => '', 'amount' => '', 'total' => ''];
        //return view('lead.create', compact('sales_head_quarters', 'expected_business'));
         return view('leaddata.my-expenses', compact('sales_head_quarters', 'expected_business'));
    }public function my_dcr(){
        $sales_head_quarters = \App\Models\Salesheadquarter::all();
        $expected_business[] = ['test_name' => '', 'expected_qty_day' => '', 'expected_l2l_price' => '', 'amount' => '', 'total' => ''];
        //return view('lead.create', compact('sales_head_quarters', 'expected_business'));
         return view('leaddata.dcr', compact('sales_head_quarters', 'expected_business'));
    }public function my_approvals(){
        $sales_head_quarters = \App\Models\Salesheadquarter::all();
        $expected_business[] = ['test_name' => '', 'expected_qty_day' => '', 'expected_l2l_price' => '', 'amount' => '', 'total' => ''];
        //return view('lead.create', compact('sales_head_quarters', 'expected_business'));
         return view('leaddata.my_approvals', compact('sales_head_quarters', 'expected_business'));
    }public function documents(){
        $sales_head_quarters = \App\Models\Salesheadquarter::all();
        $expected_business[] = ['test_name' => '', 'expected_qty_day' => '', 'expected_l2l_price' => '', 'amount' => '', 'total' => ''];
        //return view('lead.create', compact('sales_head_quarters', 'expected_business'));
         return view('leaddata.documents', compact('sales_head_quarters', 'expected_business'));
    }
    public function my_tasks(){
        $sales_head_quarters = \App\Models\Salesheadquarter::all();
        $expected_business[] = ['test_name' => '', 'expected_qty_day' => '', 'expected_l2l_price' => '', 'amount' => '', 'total' => ''];
        //return view('lead.create', compact('sales_head_quarters', 'expected_business'));
         return view('leaddata.tasks', compact('sales_head_quarters', 'expected_business'));
    }
 

}
