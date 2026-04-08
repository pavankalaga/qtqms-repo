<div>
    @if (session()->has('message'))
    <div class="alert alert-success mt-4">
        {{ session('message') }}
    </div>
    @endif

    <div x-data="{ activeTab: 'business-info' }" class="flex space-x-4">
        <!-- Tab Navigation -->
        <div class="w-1/4  p-2">
            <div class="flex flex-col space-y-2 bg-gray-200 p-3 rounded-lg">
                <span @click.prevent="activeTab = 'business-info'"
                    :class="{ 'bussiness-info-active text-sm text-white': activeTab === 'business-info', 'bg-white text-black': activeTab !== 'business-info' }"
                    class="p-2 rounded-lg text-sm text-nowrap ga-sidebar">Business Info</span>

                <span @click.prevent="activeTab = 'contact-details'"
                    :class="{ 'bussiness-info-active text-sm text-white': activeTab === 'contact-details', 'bg-white text-black': activeTab !== 'contact-details' }"
                    class="p-2 rounded-lg text-sm text-nowrap ga-sidebar">Contact Details</span>

                <span @click.prevent="activeTab = 'business-intelligence'"
                    :class="{ 'bussiness-info-active text-sm text-white': activeTab === 'business-intelligence', 'bg-white text-black': activeTab !== 'business-intelligence' }"
                    class="p-2 rounded-lg text-sm text-nowrap ga-sidebar">Business Intelligence</span>

                <span @click.prevent="activeTab = 'remarks'"
                    :class="{ 'bussiness-info-active text-sm text-white': activeTab === 'remarks', 'bg-white text-black': activeTab !== 'remarks' }"
                    class="p-2 rounded-lg text-sm text-nowrap ga-sidebar">Remarks</span>
            </div>
        </div>


        <div class="py-4 w-full">

            <form wire:submit.prevent="submitAll">
                <!-- Business Info Section -->
                <div x-show="activeTab === 'business-info'" class="space-y-4">
                    <h2 class="text-lg font-bold mb-1">Business Info</h2>

                    <div class="flex lg:flex-nowrap  gap-4 ">
                        <div class="w-full lg:w-1/2">
                            <label for="business_type" class="col-form-label">Business Type: </label>
                            <select id="business_type" name="business_type" class="form-control" wire:model="business_type" required>
                                <option value="">Select Business Type</option>
                                <option value="Hospital">Hospital</option>
                                <option value="Diagnostic Center">Diagnostic Center</option>
                                <option value="Independent Doctor">Independent Doctor</option>
                                <option value="Registered Medical Practitioner">Registered Medical Practitioner</option>
                                <option value="Clinic">Clinic</option>
                                <option value="Clinical Research Business">Clinical Research Business</option>
                                <option value="Government Agency">Government Agency</option>
                            </select>
                            @error('business_type') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full lg:w-1/2">
                            <label for="legal_business_type" class="col-form-label">Legal Business Type: </label>
                            <select id="legal_business_type" name="legal_business_type" class="form-control" wire:model="legal_business_type" required>
                                <option value="">Select Legal Business Type</option>
                                <option value="Incorporated">Incorporated</option>
                                <option value="Partnership">Partnership</option>
                                <option value="LLP">LLP</option>
                                <option value="Sole Proprietor">Sole Proprietor</option>
                            </select>
                            @error('legal_business_type') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="flex lg:flex-nowrap  gap-4 ">

                    <div class="w-full lg:w-1/2">
                        <label for="business_name"  class="col-form-label">Business Name: </label>
                        <div class="">
                            <input type="text" class="form-control small-placeholder" id="business_name" name="business_name" placeholder="Enter Your Business Name" wire:model="business_name" required>
                            @error('business_name') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="w-full lg:w-1/2">
                        <label for="registered_no" class=" col-form-label">Registered No: </label>
                        <div class="">
                            <input type="text" class="form-control small-placeholder" id="registered_no" placeholder="Enter Your Registered No" wire:model="registered_no" required>
                            @error('registered_no') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    </div>

                    <div class="flex lg:flex-nowrap  gap-4">
                        <div class="w-full lg:w-1/2">
                            <label for="incorporation_date" class="col-form-label">Incorporation Date: </label>
                            <input type="date" class="form-control small-placeholder" id="incorporation_date" wire:model="incorporation_date" required>
                            @error('incorporation_date') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full lg:w-1/2">
                            <label for="incorporation_no" class="col-form-label">Inc No: </label>
                            <input type="number" class="form-control small-placeholder" placeholder="Enter Your Inc No" id="incorporation_no" wire:model="incorporation_no" required>
                            @error('incorporation_no') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="flex lg:flex-nowrap  gap-4">
                        <div class="w-full lg:w-1/2">
                            <label for="pan_no" class="col-form-label">PAN No:</label>
                            <input type="text" class="form-control small-placeholder" id="pan_no" placeholder="Enter Your PAN No" wire:model="pan_no" required>
                            @error('pan_no') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full lg:w-1/2">
                            <label for="tan_no" class="col-form-label">TAN No:</label>
                            <input type="text" class="form-control small-placeholder" id="tan_no" placeholder="Enter Your TAN No" wire:model="tan_no" required>
                            @error('tan_no') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="flex lg:flex-nowrap  gap-4">
                        <div class="w-full lg:w-1/2">
                            <label for="country" class="col-form-label">Country: </label>
                            <input type="text" class="form-control small-placeholder" id="country" placeholder="Country" wire:model="country" required>
                            @error('country') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full lg:w-1/2">
                            <label for="state" class="col-form-label">State: </label>
                            <input type="text" class="form-control small-placeholder" id="state" placeholder="State" wire:model="state" required>
                            @error('state') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="flex lg:flex-nowrap  gap-4">
                        <div class="w-full lg:w-1/2 ">
                            <label for="city" class="col-form-label">City: </label>
                            <input type="text" class="form-control small-placeholder" id="city" placeholder="City"
                                wire:model="city" required>
                            @error('city') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full lg:w-1/2 ">
                            <label for="pincode" class="col-form-label">Sales HeadQuarters: </label>
                            <select wire:model="salesheadquarter" class="form-select "  required>
                                <option selected>Choose...</option>
                                @foreach ($sales_head_quarters as $sales)
                                    <option value="{{ $sales->id }}">{{ $sales->name }}</option>
                                @endforeach
                            </select>
                            @error('pincode') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="flex lg:flex-nowrap  gap-4">
                        <div class="w-full lg:w-1/2">
                            <label for="address" class="col-form-label">Address: </label>
                            <textarea type="text" class="form-control small-placeholder" id="address" placeholder="Address" wire:model="address" required></textarea>
                            @error('address') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full lg:w-1/2">
                            <label for="pincode" class="col-form-label">Pincode: </label>
                            <input type="number" class="form-control small-placeholder" id="pincode" placeholder="Pincode" wire:model="pincode" minlength="6" maxlength="6" required>
                            @error('pincode') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="flex lg:flex-nowrap  gap-4">
                        <div class="w-full lg:w-1/2">
                            <label for="phone" class="col-form-label">Phone: </label>
                            <input type="number" class="form-control small-placeholder" id="phone" placeholder="Enter Your Phone Number" wire:model="phone" minlength="10" maxlength="10" required />
                            @error('phone') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full lg:w-1/2">
                            <label for="alternate_phone" class="col-form-label">Alternative Phone: </label>
                            <input type="number" class="form-control small-placeholder" id="alternate_phone" placeholder="Alternate Phone" wire:model="alternate_phone" minlength="10" maxlength="10" required>
                            @error('alternate_phone') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="w-full lg:w-1/2">
                            <label for="email" class="col-form-label">Email: </label>
                            <input type="email" class="form-control small-placeholder" id="email" placeholder="Enter Your Email" wire:model="email" required />
                            @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full lg:w-1/2">
                            <label for="alternative_email" class="col-form-label">Alternative Email: </label>
                            <input type="email" class="form-control small-placeholder" id="alternative_email" placeholder="Enter Alternative Email" wire:model="alternative_email" required>
                            @error('alternative_email') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="w-full lg:w-1/2">
                        <label for="website" class="col-form-label">Website: </label>
                        <input type="text" class="form-control small-placeholder" id="website" placeholder="Website" wire:model="website" required>
                        @error('website') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <!-- <button 
                        type="button" 
                        @click="if (validateForm()) activeTab = 'contact-details'" 
                        class="btn btn-primary">
                        Next
                    </button> -->
                    
                </div>




                <!-- Contact Details Section -->
                <div x-show="activeTab === 'contact-details'" class="">
                <div x-data="{ openModal: false, step: 2 }">
                <!-- <div class="flex space-x-4">
                    <button @click="openModal = true; @this.resetContactFields()" class="bg-green-500 text-white px-4 py-2 rounded">Add Contact</button>
                </div> -->

                <!-- Contact Details Modal -->
                <div x-show="openModal" class="fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex justify-center items-center" style="display: none;">
                    <div class="bg-white rounded-lg p-5 w-11/12 md:w-1/3">
                        <h2 class="text-lg font-bold mb-4">Contact Details</h2>
                        <form>
                            <input type="hidden" wire:model="lead_contact_id">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="salutation" class="col-form-label">Salutation:</label>
                                    <select id="salutation" class="form-control select2" wire:model="salutation" required>
                                        <option value="">Select salutation</option>
                                        <option value="Dr.">Dr.</option>
                                        <option value="Mr.">Mr.</option>
                                        <option value="Mrs.">Mrs.</option>
                                        <option value="Ms.">Ms.</option>
                                    </select>
                                    @error('salutation') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="first_name" class="col-form-label">First Name</label>
                                    <input type="text" class="form-control small-placeholder" id="first_name" placeholder="Enter First Name" wire:model="first_name" required>
                                    @error('first_name') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="last_name" class="col-form-label">Last Name</label>
                                    <input type="text" class="form-control small-placeholder" id="last_name" placeholder="Enter Last Name" wire:model="last_name" required>
                                    @error('last_name') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="department" class="col-form-label">Department</label>
                                    <input type="text" class="form-control small-placeholder" id="department" placeholder="Enter Department" wire:model="department" required>
                                    @error('department') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="designation" class="col-form-label">Designation</label>
                                    <input type="text" class="form-control small-placeholder" id="designation" placeholder="Enter Designation" wire:model="designation" required>
                                    @error('designation') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="office_phone" class="col-form-label">Office Phone</label>
                                    <input type="number" class="form-control small-placeholder" id="office_phone" placeholder="Enter Office Phone" wire:model="office_phone" required>
                                    @error('office_phone') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="mobile_no" class="col-form-label">Mobile No.</label>
                                    <input type="text" class="form-control small-placeholder" maxlength="10" minlength="10" id="mobile_no" placeholder="Enter Mobile No." wire:model="mobile_no" required>
                                    @error('mobile_no') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="office_email" class="col-form-label">Office Email</label>
                                    <input type="email" class="form-control small-placeholder" id="office_email" placeholder="Enter Office Email" wire:model="office_email" required>
                                    @error('office_email') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="other_email" class="col-form-label">Other Email</label>
                                    <input type="text" class="form-control small-placeholder" id="other_email" placeholder="Enter Other Email" wire:model="other_email" required>
                                    @error('other_email') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="flex justify-end mt-4">
                                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded mr-2" @click="openModal = false">Close</button>
                                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded" wire:click.prevent="saveContactDetails">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <h2 class="text-lg font-bold mb-4 text-primary">Business Intelligence</h2>
            <div class="border-b border-gray-200 shadow">
                <div class="overflow-x-auto">
                    <table class="table divide-y divide-green-400 w-full">
                        <thead class="thead-dark">
                            <tr>
                                <th class="px-6 py-2 text-xs ">ID</th>
                                <th class="px-6 py-2 text-xs ">Name</th>
                                <th class="px-6 py-2 text-xs ">Department</th>
                                <th class="px-6 py-2 text-xs ">Designation</th>
                                <th class="px-6 py-2 text-xs ">Office Phone</th>
                                <th class="px-6 py-2 text-xs ">Office Email</th>
                                <th class="px-6 py-2 text-xs ">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-300">
                            @if($list_contact_details->count() > 0)
                                @foreach($list_contact_details as $contact)
                                    <tr class="whitespace-nowrap">
                                        <td class="px-6 py-4 text-sm text-gray-900">{{$contact->id}}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900">
                                            {{$contact->salutation}} {{$contact->first_name}} {{$contact->last_name}}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900">{{$contact->department}}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900">{{$contact->designation}}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">{{$contact->office_phone}}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">{{$contact->office_email}}</td>
                                        <td class="px-6 py-4">
                                            <span wire:click="editContactDetails('{{ $contact->id }}')" class="edit-link cursor-pointer text-blue-500 hover:underline">Edit</span>
                                            <span class="delete-link cursor-pointer text-red-500 hover:underline ml-4" onclick="confirmDelete('{{ $contact->id }}')">Delete</span>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-sm text-gray-500">No Details found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
                <div class="mt-4">
                    {{ $contactDetails->links() }} <!-- This will generate pagination links -->
                </div>
                </div>

                <!-- Business Intelligence Section -->
                <div x-show="activeTab === 'business-intelligence'" class="space-y-4">
    <h2 class="text-lg font-semibold mb-4 text-primary">Business Intelligence</h2>

    <!-- No. of Doctors -->
    <div class="form-group row">
        <label for="no_of_doctors" class="col-sm-2 col-form-label font-weight-bold">No. of Doctors</label>
        <div class="col-sm-10">
            <input type="text" class="form-control small-placeholder" id="no_of_doctors"
                placeholder="Enter No. of Doctors" required wire:model="no_of_doctors">
            @error('no_of_doctors')
            <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <!-- Specialities -->
    <div class="form-group row">
        <label for="specialities" class="col-sm-2 col-form-label font-weight-bold">Specialities</label>
        <div class="col-sm-10">
            <select id="specialities" class="form-control select2" wire:model="specialities">
                <option value="">Select Business Type</option>
                <option value="Hospital">Hospital</option>
                <option value="Diagnostic Center">Diagnostic Center</option>
                <option value="Independent Doctor">Independent Doctor</option>
                <option value="Registered Medical Practioner">Registered Medical Practioner</option>
                <option value="Clinic">Clinic</option>
                <option value="Clinical Research Business">Clinical Research Business</option>
                <option value="Governament Agency">Governament Agency</option>
            </select>
            @error('specialities')
            <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <!-- Lab Revenue -->
    <div class="form-group row">
        <label for="lab_revenue" class="col-sm-2 col-form-label font-weight-bold">Lab Revenue</label>
        <div class="col-sm-10">
            <input type="text" class="form-control small-placeholder" id="lab_revenue"
                placeholder="Enter Lab Revenue" required wire:model="lab_revenue">
            @error('lab_revenue')
            <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <!-- Currently Outsourced To -->
    <div class="form-group row">
        <label for="currently_outsourceed_to" class="col-sm-2 col-form-label font-weight-bold">Currently Outsourced To</label>
        <div class="col-sm-10">
            <input type="text" class="form-control small-placeholder" id="currently_outsourceed_to"
                placeholder="Enter Currently Outsourced To" required wire:model="currently_outsourceed_to">
            @error('currently_outsourceed_to')
            <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <!-- Description -->
    <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label font-weight-bold">Description</label>
        <div class="col-sm-10">
            <input type="text" class="form-control small-placeholder" id="description"
                placeholder="Enter Description" wire:model="description">
            @error('description')
            <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <!-- Expected Business Table -->
    <div class="form-group row">
        <label for="expected_business" class="col-sm-2 col-form-label font-weight-bold">Expected Business</label>
        <div class="col-sm-10">
            <table class="table table-bordered table-striped table-hover table-sm text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>S.No</th>
                        <th>Test Name</th>
                        <th>Expected Qty Day</th>
                        <th>Expected L2L Price</th>
                        <th>Amount</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($expected_business as $index => $field)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <input type="text" class="form-control form-control-sm"
                                wire:model="expected_business.{{ $index }}.test_name">
                        </td>
                        <td>
                            <input type="text" class="form-control form-control-sm"
                                wire:model="expected_business.{{ $index }}.expected_qty_day">
                        </td>
                        <td>
                            <input type="text" class="form-control form-control-sm"
                                wire:model="expected_business.{{ $index }}.expected_l2l_price">
                        </td>
                        <td>
                            <input type="number" class="form-control form-control-sm"
                                wire:model="expected_business.{{ $index }}.amount">
                        </td>
                        <td>
                            <input type="number" class="form-control form-control-sm"
                                wire:model="expected_business.{{ $index }}.total">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


                <div x-show="activeTab === 'remarks'" class="">
                    <h2 class="text-lg font-bold mb-1">Remarks Details</h2>
                    <div class="form-group row">
                        <label for="remark_description" class="col-sm-10 col-form-label">Remarks</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control small-placeholder" id="remark_description"
                                placeholder="Enter Remarks" wire:model="remark_description"></textarea>
                            @error('remark_description') <!-- Validation error for remark_description -->
                            <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                </div>

            </form>


        </div>

    </div>
</div>

</div>
<style>
    .ga-sidebar {
    font-size: 14px;
    font-weight: 400;
    /* line-height: 32px; */
}
.table .thead-dark th {
    background-color: #1F2937;
    color: #ffffff;
}
</style>