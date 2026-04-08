@extends('layouts.base')
@section('content')

<section class="dash-container">
    <div class="dash-content">

        <div class="row lead-editor">
            <div class="col-12 mb-3">
                <div class="row">
                    <div class="col-3">
                        <div class="card sticky-top" style="top:30px">
                            <div class="list-group list-group-flush" id="useradd-sidenav">
                                <a class="list-group-item list-group-item-action border-0" href="#tasks">Tasks
                                    <div class="float-end"><i class="fa-solid fa-chevron-right"></i></div>
                                </a>
                                <a class="list-group-item list-group-item-action border-0" href="#users-products">Users
                                    | Products
                                    <div class="float-end"><i class="fa-solid fa-chevron-right"></i></div>
                                </a>
                                <a class="list-group-item list-group-item-action border-0"
                                    href="#sources-emails">Sources | Emails
                                    <div class="float-end"><i class="fa-solid fa-chevron-right"></i></div>
                                </a>
                                <a class="list-group-item list-group-item-action border-0"
                                    href="#discussion-notes">Discussion | Notes
                                    <div class="float-end"><i class="fa-solid fa-chevron-right"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-9">

                        @csrf
                        <div id="general">
                            <div class="col-xxl-12">
                                <div id="tasks">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card table-card">
                                                    <div class="card-header">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <h5>Business Info</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <form action="{{route('lead.businessfinfoupdate', $report->id)}}"
                                                        method="post">
                                                        @csrf
                                                        <div class="card-body pt-0 table-border-style bg-none"
                                                            style="height:300px;overflow: auto;">
                                                            <div class="">
                                                                <div class="w-full flex gap-4 lg:flex-nowrap ">
                                                                    <div class="form-group   lg:w-1/2 w-full">
                                                                        <label for="business_type"
                                                                            class="col-form-label text-nowrap">Business
                                                                            Type: </label>
                                                                        <select id="business_type" name="business_type"
                                                                            class="form-control">
                                                                            <option value="">Select Business Type
                                                                            </option>
                                                                            <option value="Hospital" {{ $report->business_type == 'Hospital' ? 'selected' : '' }}>Hospital</option>
                                                                            <option value="Diagnostic Center" {{ $report->business_type == 'Diagnostic Center' ? 'selected' : '' }}>Diagnostic
                                                                                Center</option>
                                                                            <option value="Independent Doctor" {{ $report->business_type == 'Independent Doctor' ? 'selected' : '' }}>Independent
                                                                                Doctor</option>
                                                                            <option
                                                                                value="Registered Medical Practitioner"
                                                                                {{ $report->business_type == 'Registered Medical Practitioner' ? 'selected' : '' }}>Registered Medical Practitioner
                                                                            </option>
                                                                            <option value="Clinic" {{ $report->business_type == 'Clinic' ? 'selected' : '' }}>Clinic</option>
                                                                            <option value="Clinical Research Business"
                                                                                {{ $report->business_type == 'Clinical Research Business' ? 'selected' : '' }}>
                                                                                Clinical Research Business</option>
                                                                            <option value="Government Agency" {{ $report->business_type == 'Government Agency' ? 'selected' : '' }}>Government
                                                                                Agency</option>
                                                                        </select>
                                                                        @error('business_type') <span
                                                                            class="text-danger small">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group   lg:w-1/2 w-full">
                                                                        <label for="legal_business_type"
                                                                            class="col-form-label text-nowrap">Legal
                                                                            Business Type: </label>
                                                                        <select id="legal_business_type"
                                                                            name="legal_business_type"
                                                                            class="form-control">
                                                                            <option value="">Select Legal Business Type
                                                                            </option>
                                                                            <option value="Incorporated" {{ $report->legal_business_type == 'Incorporated' ? 'selected' : '' }}>Incorporated
                                                                            </option>
                                                                            <option value="Partnership" {{ $report->legal_business_type == 'Partnership' ? 'selected' : '' }}>Partnership
                                                                            </option>
                                                                            <option value="LLP" {{ $report->legal_business_type == 'LLP' ? 'selected' : '' }}>LLP</option>
                                                                            <option value="Sole Proprietor" {{ $report->legal_business_type == 'Sole Proprietor' ? 'selected' : '' }}>Sole
                                                                                Proprietor</option>
                                                                        </select>
                                                                        @error('legal_business_type') <span
                                                                            class="text-danger small">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="w-full flex gap-4 lg:flex-nowrap">

                                                                    <div class="flex flex-col lg:w-1/2 w-full">
                                                                        <label for="business_name"
                                                                            class="mb-2 text-sm font-medium text-gray-700 whitespace-nowrap">Business
                                                                            Name: </label>
                                                                        <div class="flex-grow">
                                                                            <input type="text" class="form-control"
                                                                                id="business_name" name="business_name"
                                                                                placeholder="Enter Your Business Name"
                                                                                name="business_name"
                                                                                value="{{ old('business_name', $report->business_name) }}">
                                                                            @error('business_name')
                                                                                <span
                                                                                    class="text-red-600 text-sm">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                    <div class="flex flex-col lg:w-1/2 w-full">
                                                                        <label for="registered_no"
                                                                            class="mb-2 text-sm font-medium text-gray-700 whitespace-nowrap">Registered
                                                                            No: </label>
                                                                        <div class="flex-grow">
                                                                            <input type="text" class="form-control"
                                                                                id="registered_no"
                                                                                placeholder="Enter Your Registered No"
                                                                                name="registered_no"
                                                                                value="{{ old('registered_no', $report->registered_no) }}">
                                                                            @error('registered_no')
                                                                                <span
                                                                                    class="text-red-600 text-sm">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                </div>




                                                                <div class="flex lg:flex-nowrap  gap-4">

                                                                    <div class="w-full lg:w-1/2">
                                                                        <label for="incorporation_date"
                                                                            class="block text-sm font-medium text-gray-700">Incorporation
                                                                            Date:</label>
                                                                        <input type="date" id="incorporation_date"
                                                                            class="form-control"
                                                                            name="incorporation_date"
                                                                            value="{{ old('incorporation_date', $report->incorporation_date) }}">
                                                                        @error('incorporation_date')
                                                                            <span
                                                                                class="text-red-600 text-sm">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="w-full lg:w-1/2">
                                                                        <label for="incorporation_no"
                                                                            class="block text-sm font-medium text-gray-700">Inc
                                                                            No:</label>
                                                                        <input type="number" id="incorporation_no"
                                                                            placeholder="Enter Your Inc No"
                                                                            class="form-control" name="incorporation_no"
                                                                            value="{{ old('incorporation_no', $report->incorporation_no) }}">
                                                                        @error('incorporation_no')
                                                                            <span
                                                                                class="text-red-600 text-sm">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>

                                                                </div>


                                                                <div class="flex lg:flex-nowrap  gap-4">
                                                                    <div class="w-full lg:w-1/2">
                                                                        <label for="pan_no" class="col-form-label">PAN
                                                                            No:</label>
                                                                        <input type="text"
                                                                            class="form-control small-placeholder"
                                                                            id="pan_no" placeholder="Enter Your PAN No"
                                                                            name="pan_no"
                                                                            value="{{ old('pan_no', $report->pan_no) }}">
                                                                        @error('pan_no') <span
                                                                            class="text-danger small">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="w-full lg:w-1/2">
                                                                        <label for="tan_no" class="col-form-label">TAN
                                                                            No:</label>
                                                                        <input type="text"
                                                                            class="form-control small-placeholder"
                                                                            id="tan_no" placeholder="Enter Your TAN No"
                                                                            name="tan_no"
                                                                            value="{{ old('tan_no', $report->tan_no) }}">
                                                                        @error('tan_no') <span
                                                                            class="text-danger small">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="flex lg:flex-nowrap  gap-4">
                                                                    <div class="w-full lg:w-1/2">
                                                                        <label for="country"
                                                                            class="col-form-label">Country:
                                                                        </label>
                                                                        <input type="text"
                                                                            class="form-control small-placeholder"
                                                                            id="country" placeholder="Country"
                                                                            name="country"
                                                                            value="{{ old('country', $report->country) }}">
                                                                        @error('country') <span
                                                                            class="text-danger small">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="w-full lg:w-1/2">
                                                                        <label for="state" class="col-form-label">State:
                                                                        </label>
                                                                        <input type="text"
                                                                            class="form-control small-placeholder"
                                                                            id="state" placeholder="State" name="state"
                                                                            value="{{ old('state', $report->state) }}">
                                                                        @error('state') <span
                                                                            class="text-danger small">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="flex lg:flex-nowrap  gap-4">
                                                                    <div class="w-full lg:w-1/2">
                                                                        <label for="city" class="col-form-label">City:
                                                                        </label>
                                                                        <input type="text"
                                                                            class="form-control small-placeholder"
                                                                            id="city" placeholder="City" name="city"
                                                                            value="{{ old('city', $report->city) }}">
                                                                        @error('city') <span
                                                                            class="text-danger small">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="w-full lg:w-1/2">
                                                                        <label for="pincode"
                                                                            class="col-form-label">Sales
                                                                            HeadQuarters: </label>
                                                                        <select name="salesheadquarter"
                                                                            class="form-select ">
                                                                            <option selected>Choose...</option>
                                                                            @foreach ($sales_head_quarters as $sales)
                                                                                <option value="{{ $sales->id }}" {{ $report->salesheadquarter_id == $sales->id ? 'selected' : '' }}>
                                                                                    {{ $sales->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('pincode') <span
                                                                            class="text-danger small">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="flex lg:flex-nowrap  gap-4">
                                                                    <div class="w-full lg:w-1/2">
                                                                        <label for="phone" class="col-form-label">Phone:
                                                                        </label>
                                                                        <input type="number"
                                                                            class="form-control small-placeholder"
                                                                            id="phone"
                                                                            placeholder="Enter Your Phone Number"
                                                                            name="phone" minlength="10" maxlength="10"
                                                                            value="{{ old('phone', $report->phone) }}" />
                                                                        @error('phone') <span
                                                                            class="text-danger small">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="w-full lg:w-1/2">
                                                                        <label for="pincode"
                                                                            class="col-form-label">Pincode:
                                                                        </label>
                                                                        <input type="number"
                                                                            class="form-control small-placeholder"
                                                                            id="pincode" placeholder="Pincode"
                                                                            name="pincode" minlength="6" maxlength="6"
                                                                            value="{{ old('pincode', $report->pincode) }}">
                                                                        @error('pincode') <span
                                                                            class="text-danger small">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="flex lg:flex-nowrap  gap-4">
                                                                    <div class="w-full lg:w-1/2">
                                                                        <label for="email" class="col-form-label">Email:
                                                                        </label>
                                                                        <input type="email"
                                                                            class="form-control small-placeholder"
                                                                            id="email" placeholder="Enter Your Email"
                                                                            value="{{ old('email', $report->email) }}"
                                                                            name="email" />
                                                                        @error('email') <span
                                                                            class="text-danger small">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="w-full lg:w-1/2">
                                                                        <label for="alternate_phone"
                                                                            class="col-form-label">Alternative Phone:
                                                                        </label>
                                                                        <input type="number"
                                                                            class="form-control small-placeholder"
                                                                            id="alternate_phone"
                                                                            placeholder="Alternate Phone"
                                                                            name="alternate_phone" minlength="10"
                                                                            value="{{ old('alternate_phone', $report->alternate_phone) }}"
                                                                            maxlength="10">
                                                                        @error('alternate_phone') <span
                                                                            class="text-danger small">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="flex lg:flex-nowrap  gap-4">
                                                                    <div class="w-full lg:w-1/2">
                                                                        <label for="website"
                                                                            class="col-form-label">Website:
                                                                        </label>
                                                                        <input type="text"
                                                                            class="form-control small-placeholder"
                                                                            value="{{ old('website', $report->website) }}"
                                                                            id="website" placeholder="Website"
                                                                            name="website">
                                                                        @error('website') <span
                                                                            class="text-danger small">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="w-full lg:w-1/2">
                                                                        <label for="alternative_email"
                                                                            class="col-form-label">Alternative Email:
                                                                        </label>
                                                                        <input type="email"
                                                                            class="form-control small-placeholder"
                                                                            id="alternative_email"
                                                                            placeholder="Enter Alternative Email"
                                                                            value="{{ old('alternative_email', $report->alternative_email) }}"
                                                                            name="alternative_email">
                                                                        @error('alternative_email') <span
                                                                            class="text-danger small">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>


                                                                <div class="form-group col-sm-6">
                                                                    <label for="address" class="col-form-label">Address:
                                                                    </label>
                                                                    <textarea type="text"
                                                                        class="form-control small-placeholder"
                                                                        id="address" placeholder="Address"
                                                                        name="address"> {{ old('address', $report->address) }}</textarea>
                                                                    @error('address') <span
                                                                        class="text-danger small">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <button type="submit">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="users-products">
                            <div class="row lead-edit-card">
                                <div class="col-md-12">
                                    <div class="card table-card deal-card">
                                        <div class="card-header py-0">
                                            <d class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h5>Contact Details</h5>
                                                </div>

                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#myModal">
                                                    Add Contact Details
                                                </button>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0 table-border-style bg-none"
                                        style="height:300px;overflow: auto;">
                                        <div>
                                            <table class="table" id="datatable" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th title="Id">Id</th>
                                                        <th title="Name">Name</th>
                                                        <th title="Department">Department</th>
                                                        <th title="Designation">Designation</th>
                                                        <th title="Office Phone">Office Phone</th>
                                                        <th title="Office Email">Office Email</th>
                                                        <th title="Action" width="60">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if($contact_details)
                                                        @foreach ($contact_details as $contact)
                                                            <tr>
                                                                <td>{{ $contact->id }}</td>
                                                                <td>{{ $contact->name }}</td>
                                                                <td>{{ $contact->department }}</td>
                                                                <td>{{ $contact->designation }}</td>
                                                                <td>{{ $contact->office_phone }}</td>
                                                                <td>{{ $contact->office_email }}</td>
                                                                <td>
                                                                    <button class="btn btn-warning btn-sm edit-button"
                                                                        data-id="{{ $contact->id }}"
                                                                        data-salutation="{{ $contact->salutation }}"
                                                                        data-first_name="{{ $contact->first_name }}"
                                                                        data-last_name="{{ $contact->last_name }}"
                                                                        data-department="{{ $contact->department }}"
                                                                        data-designation="{{ $contact->designation }}"
                                                                        data-office_phone="{{ $contact->office_phone }}"
                                                                        data-mobile_no="{{ $contact->mobile_no }}"
                                                                        data-office_email="{{ $contact->office_email }}"
                                                                        data-other_email="{{ $contact->other_email }}"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#editmyModal">Edit</button>

                                                                    <button class="btn btn-danger btn-sm delete-button"
                                                                        data-id="{{ $contact->id }}">Delete</button>

                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="7" class="text-center">No contact details
                                                                available.</td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <div id="sources-emails">
                            <div class="row pt-2">
                                <div class="col-md-12">
                                    <div class="card table-card">
                                        <div class="card-header">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h5>Business Intelligence</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0 table-border-style bg-none"
                                            style="height:300px;overflow: auto;">
                                            <form action="{{route('lead.BusinessInteligence',$report->id)}}" method="post">
                                                @csrf
                                            <div class="">
                                                <div class="form-group row">
                                                    <label for="no_of_doctors" class="col-sm-2 col-form-label">No.
                                                        of Doctors</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control small-placeholder"
                                                            id="no_of_doctors" placeholder="Enter No. of Doctors" value="{{old('no_of_doctors',$bus_intl?->no_of_doctors)}}"
                                                            name="no_of_doctors">
                                                        @error('no_of_doctors')
                                                            <!-- Validation error for no_of_doctors -->
                                                            <span class="text-danger small">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="specialities"
                                                        class="col-sm-2 col-form-label">Specialities</label>
                                                    <div class="col-sm-10">
                                                        <select id="specialities" class="form-control select2" name="specialities[]" >
                                                            <option value="Hospital" {{ old('Hospital', $bus_intl?->specialities) ? 'selected' : '' }}>Hospital</option>
                                                            <option value="Diagnostic Center" {{ old('Diagnostic Center', $bus_intl?->specialities) ? 'selected' : '' }}>Diagnostic Center</option>
                                                            <option value="Independent Doctor" {{ old('Independent Doctor', $bus_intl?->specialities) ? 'selected' : '' }}>Independent Doctor</option>
                                                            <option value="Registered Medical Practioner" {{ old('Registered Medical Practioner', $bus_intl?->specialities) ? 'selected' : '' }}>Registered Medical Practioner</option>
                                                            <option value="Clinic" {{ old('Clinic', $bus_intl?->specialities) ? 'selected' : '' }}>Clinic</option>
                                                            <option value="Clinical Research Business" {{ old('Clinical Research Business', $bus_intl?->specialities) ? 'selected' : '' }}>Clinical Research Business</option>
                                                            <option value="Governament Agency" {{ old('Governament Agency', $bus_intl?->specialities) ? 'selected' : '' }}>Governament Agency</option>
                                                        </select>
                                                        @error('specialities')
                                                            <span class="text-danger small">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="lab_revenue" class="col-sm-2 col-form-label">Lab
                                                        Revenue</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control small-placeholder"
                                                            id="lab_revenue" placeholder="Enter Lab Revenue"value="{{old('lab_revenue',$bus_intl?->lab_revenue)}}"
                                                            name="lab_revenue">
                                                        @error('lab_revenue')
                                                            <!-- Validation error for lab_revenue -->
                                                            <span class="text-danger small">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="currently_outsourceed_to"
                                                        class="col-sm-2 col-form-label">Currently Outsourceed
                                                        To</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control small-placeholder"
                                                            id="currently_outsourceed_to"
                                                            placeholder="Enter Currently Outsourceed To"  value="{{old('currently_outsourceed_to',$bus_intl?->currently_outsourceed_to)}}"
                                                            name="currently_outsourceed_to">
                                                        @error('currently_outsourceed_to')
                                                            <!-- Validation error for currently_outsourceed_to -->
                                                            <span class="text-danger small">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="description"
                                                        class="col-sm-2 col-form-label">Description</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control small-placeholder"
                                                            id="description" placeholder="Enter Description" value="{{old('description',$bus_intl?->description)}}"
                                                            name="description">
                                                        @error('description')
                                                            <!-- Validation error for description -->
                                                            <span class="text-danger small">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="expected_business"
                                                        class="col-sm-2 col-form-label">Expected Business</label>
                                                    <div class="col-sm-10">
                                                        <table class="table table-bordered align-items-center table-sm"
                                                            id="expected-business-table">
                                                            <thead>
                                                                <tr>
                                                                    <th>S.No</th>
                                                                    <th>Test Name</th>
                                                                    <th>Expected Qty Day</th>
                                                                    <th>Expected L2L Price</th>
                                                                    <th>Amount</th>
                                                                    <th>Total</th>
                                                                    <th>Remove</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if (isset($ex_leads) && $ex_leads->count() > 0)
                                                                
                                                                @forelse($ex_leads as $index => $business)
                                                                    <tr>
                                                                        <td>{{ $index + 1 }}</td>
                                                                        <td><input type="text" name="expected_business[{{ $index }}][test_name]" value="{{ $business->test_name ?? '' }}" class="form-control"></td>
                                                                        <td><input type="number" name="expected_business[{{ $index }}][expected_qty_day]" value="{{ $business->expected_qty_day ?? '' }}" class="form-control"></td>
                                                                        <td><input type="number" name="expected_business[{{ $index }}][expected_l2l_price]" value="{{ $business->expected_l2l_price ?? '' }}" class="form-control"></td>
                                                                        <td><input type="number" name="expected_business[{{ $index }}][amount]" value="{{ $business->amount ?? '' }}" class="form-control"></td>
                                                                        <td><input type="number" name="expected_business[{{ $index }}][total]" value="{{ $business->total ?? '' }}" class="form-control"></td>
                                                                        <td><button type="button" class="btn btn-danger btn-small remove-row">&times;</button></td>
                                                                    </tr>
                                                                @empty
                                                                @endforelse
                                                                @endif
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td colspan="6" class="text-right">
                                                                        <button type="button" class="btn btn-info"
                                                                            id="add-row">+ Add Row</button>
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit">update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div id="discussion-notes">
                            <div class="row pt-2">
                                <div class="col-md-12">
                                    <div class="card table-card">
                                        <div class="card-header">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h5>Remarks</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{route('lead.remark',$report->id)}}" method="post">
                                         @csrf
                                            <div class="card-body pt-0 table-border-style bg-none"
                                                style="height:300px;overflow: auto;">
                                                <div class="">
                                                    <div class="form-group row">
                                                        <label for="remark_description"
                                                            class="col-sm-10 col-form-label">Remarks</label>
                                                        <div class="col-sm-10">
                                                            <textarea type="text" class="form-control small-placeholder"
                                                                id="remark_description" placeholder="Enter Remarks"
                                                                name="remark_description">{{old('remark_description',$report->remark_description)}}</textarea>
                                                            @error('remark_description')
                                                                <!-- Validation error for remark_description -->
                                                                <span class="text-danger small">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="submit">Submit</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- The Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add Contact Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="addContactForm" action="{{ route('lead.add.contacts', $report->id) }}">
                    @csrf
                    <div class="modal-body">
                        <div class="flex lg:flex-nowrap gap-4">
                            <div class="w-full lg:w-1/2">
                                <label for="salutation" class="col-form-label">Salutation:</label>
                                <select id="salutation" class="form-control select2" name="salutation" required>
                                    <option value="">Select salutation</option>
                                    <option value="Dr.">Dr.</option>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Ms.">Ms.</option>
                                </select>
                                @error('salutation') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="flex lg:flex-nowrap gap-4">
                            <div class="w-full lg:w-1/2">
                                <label for="first_name" class="col-form-label">First Name</label>
                                <input type="text" class="form-control small-placeholder" id="first_name"
                                    placeholder="Enter First Name" name="first_name" required>
                                @error('first_name') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full lg:w-1/2">
                                <label for="last_name" class="col-form-label">Last Name</label>
                                <input type="text" class="form-control small-placeholder" id="last_name"
                                    placeholder="Enter Last Name" name="last_name" required>
                                @error('last_name') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="flex lg:flex-nowrap gap-4">
                            <div class="w-full lg:w-1/2">
                                <label for="department" class="col-form-label">Department</label>
                                <input type="text" class="form-control small-placeholder" id="department"
                                    placeholder="Enter Department" name="department" required>
                                @error('department') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full lg:w-1/2">
                                <label for="designation" class="col-form-label">Designation</label>
                                <input type="text" class="form-control small-placeholder" id="designation"
                                    placeholder="Enter Designation" name="designation" required>
                                @error('designation') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="flex lg:flex-nowrap gap-4">
                            <div class="w-full lg:w-1/2">
                                <label for="office_phone" class="col-form-label">Office Phone</label>
                                <input type="number" class="form-control small-placeholder" id="office_phone"
                                    placeholder="Enter Office Phone" name="office_phone" required>
                                @error('office_phone') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full lg:w-1/2">
                                <label for="mobile_no" class="col-form-label">Mobile No.</label>
                                <input type="text" class="form-control small-placeholder" id="mobile_no"
                                    placeholder="Enter Mobile No." name="mobile_no" required>
                                @error('mobile_no') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="flex lg:flex-nowrap gap-4">
                            <div class="w-full lg:w-1/2">
                                <label for="office_email" class="col-form-label">Office Email</label>
                                <input type="email" class="form-control small-placeholder" id="office_email"
                                    placeholder="Enter Office Email" name="office_email" required>
                                @error('office_email') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full lg:w-1/2">
                                <label for="other_email" class="col-form-label">Other Email</label>
                                <input type="text" class="form-control small-placeholder" id="other_email"
                                    placeholder="Enter Other Email" name="other_email" required>
                                @error('other_email') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="text-white px-4 py-2 rounded"
                            style="background-color: #0c9207;">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editmyModal" tabindex="-1" aria-labelledby="editmyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editmyModalLabel">Edit Contact Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="editContactForm" action="{{ route('lead.update.contact') }}">
                    @csrf
                    <input type="hidden" name="contact_id" id="contact_id" value="">
                    <div class="modal-body">
                        <div class="flex lg:flex-nowrap gap-4">
                            <div class="w-full lg:w-1/2">
                                <label for="salutation" class="col-form-label">Salutation:</label>
                                <select id="salutation" class="form-control select2" name="salutation" required>
                                    <option value="">Select salutation</option>
                                    <option value="Dr.">Dr.</option>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Ms.">Ms.</option>
                                </select>
                                @error('salutation') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="flex lg:flex-nowrap gap-4">
                            <div class="w-full lg:w-1/2">
                                <label for="first_name" class="col-form-label">First Name</label>
                                <input type="text" class="form-control small-placeholder" id="first_name"
                                    placeholder="Enter First Name" name="first_name" required>
                                @error('first_name') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full lg:w-1/2">
                                <label for="last_name" class="col-form-label">Last Name</label>
                                <input type="text" class="form-control small-placeholder" id="last_name"
                                    placeholder="Enter Last Name" name="last_name" required>
                                @error('last_name') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="flex lg:flex-nowrap gap-4">
                            <div class="w-full lg:w-1/2">
                                <label for="department" class="col-form-label">Department</label>
                                <input type="text" class="form-control small-placeholder" id="department"
                                    placeholder="Enter Department" name="department" required>
                                @error('department') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full lg:w-1/2">
                                <label for="designation" class="col-form-label">Designation</label>
                                <input type="text" class="form-control small-placeholder" id="designation"
                                    placeholder="Enter Designation" name="designation" required>
                                @error('designation') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="flex lg:flex-nowrap gap-4">
                            <div class="w-full lg:w-1/2">
                                <label for="office_phone" class="col-form-label">Office Phone</label>
                                <input type="text" class="form-control small-placeholder" id="office_phone"
                                    placeholder="Enter Office Phone" name="office_phone" required>
                                @error('office_phone') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full lg:w-1/2">
                                <label for="mobile_no" class="col-form-label">Mobile No.</label>
                                <input type="text" class="form-control small-placeholder" id="mobile_no"
                                    placeholder="Enter Mobile No." name="mobile_no" required>
                                @error('mobile_no') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="flex lg:flex-nowrap gap-4">
                            <div class="w-full lg:w-1/2">
                                <label for="office_email" class="col-form-label">Office Email</label>
                                <input type="email" class="form-control small-placeholder" id="office_email"
                                    placeholder="Enter Office Email" name="office_email" required>
                                @error('office_email') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full lg:w-1/2">
                                <label for="other_email" class="col-form-label">Other Email</label>
                                <input type="email" class="form-control small-placeholder" id="other_email"
                                    placeholder="Enter Other Email" name="other_email" required>
                                @error('other_email') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="text-white px-4 py-2 rounded"
                            style="background-color: #0c9207;">Save</button>
                    </div>

            </div>
        </div>
    </div>



</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // $(document).ready(function() {
    //     $('#salutation').select2();
    // });

    $(document).ready(function () {
        // Set up CSRF token for all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Delete button click event
        $(document).on('click', '.delete-button', function (event) {
            event.preventDefault(); // Prevent default form submission

            const contactId = $(this).data('id');

            // Show confirmation dialog
            if (confirm('Are you sure you want to delete this contact?')) {
                const button = this; // Store reference to the clicked button
                $.ajax({
                    url: '/contact_delete/' + contactId,
                    type: 'DELETE',
                    success: function (response) {
                        alert('Contact deleted successfully.');
                        // Remove the row from DataTable
                        $('#datatable').DataTable().row($(button).closest('tr')).remove().draw();
                    },
                    error: function (xhr) {
                        alert('Error deleting contact: ' + xhr.responseText);
                    }
                });
            }
        });
    });
    document.querySelectorAll('.btn-close').forEach(button => {
        button.addEventListener('click', function () {
            const myModal = bootstrap.Modal.getInstance(document.getElementById('delete-button'));
            if (myModal) {
                myModal.hide();
            }
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Show the modal when the edit button is clicked
        $(document).on('click', '.edit-button', function (event) {
            event.preventDefault(); // Prevent the default action (form submission)

            // Get data attributes from the clicked button
            const contactId = $(this).data('id');
            const salutation = $(this).data('salutation');
            const firstName = $(this).data('first_name'); // Corrected to match data attributes
            const lastName = $(this).data('last_name');   // Corrected to match data attributes
            const department = $(this).data('department');
            const designation = $(this).data('designation');
            const officePhone = $(this).data('office_phone'); // Corrected to match data attributes
            const mobileNo = $(this).data('mobile_no');       // Corrected to match data attributes
            const officeEmail = $(this).data('office_email'); // Corrected to match data attributes
            const otherEmail = $(this).data('other_email');   // Corrected to match data attributes

            // Populate the modal fields
            $('#contact_id').val(contactId);
            $('#salutation').val(salutation).trigger('change'); // If using Select2
            $('#first_name').val(firstName);
            $('#last_name').val(lastName);
            $('#department').val(department);
            $('#designation').val(designation);
            $('#office_phone').val(officePhone);
            $('#mobile_no').val(mobileNo);
            $('#office_email').val(officeEmail);
            $('#other_email').val(otherEmail);
            // Show the modal
            const myModal = new bootstrap.Modal(document.getElementById('editmyModal'));
            myModal.show();
        });

        // Close modal functionality
        document.querySelectorAll('.btn-close').forEach(button => {
            button.addEventListener('click', function () {
                const myModal = bootstrap.Modal.getInstance(document.getElementById('editmyModal'));
                if (myModal) {
                    myModal.hide();
                }
            });
        });
    });

</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('myModal').addEventListener('click', function () {
            const myModal = new bootstrap.Modal(document.getElementById('myModal'));
            myModal.show();
        });

        // Close modal
        document.querySelectorAll('.btn-close').forEach(button => {
            button.addEventListener('click', function () {
                const myModal = bootstrap.Modal.getInstance(document.getElementById('myModal'));
                if (myModal) {
                    myModal.hide();
                }
            });
        });
    });


</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    const tableBody = document.querySelector('#expected-business-table tbody');
    let rowCount = tableBody.rows.length;

    document.getElementById('add-row').addEventListener('click', function() {
        const newRow = tableBody.insertRow();
        newRow.innerHTML = `
            <td>${rowCount + 1}</td>
            <td><input type="text" name="expected_business[${rowCount}][test_name]" class="form-control"></td>
            <td><input type="number" name="expected_business[${rowCount}][expected_qty_day]" class="form-control"></td>
            <td><input type="number" name="expected_business[${rowCount}][expected_l2l_price]" class="form-control"></td>
            <td><input type="number" name="expected_business[${rowCount}][amount]" class="form-control"></td>
            <td><input type="number" name="expected_business[${rowCount}][total]" class="form-control"></td>
            <td><button type="button" class="btn btn-danger btn-small remove-row">&times;</button></td>
        `;
        rowCount++;
    });

    tableBody.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-row')) {
            e.target.closest('tr').remove();
            rowCount--;
            updateRowNumbers();
        }
    });

    function updateRowNumbers() {
        Array.from(tableBody.rows).forEach((row, index) => {
            row.cells[0].textContent = index + 1;
        });
    }
});
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('lead.data') }}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'business_name', name: 'business_name' },
                { data: 'email', name: 'email' },
                { data: 'phone', name: 'phone' },
                { data: 'headquarters', name: 'headquarters', orderable: false, searchable: false },
                { data: 'state', name: 'state' },
                { data: 'status', name: 'status', orderable: false, searchable: false },
                { data: 'assign_user', name: 'assign_user', orderable: false, searchable: false },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });

    @endsection