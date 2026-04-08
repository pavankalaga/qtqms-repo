<div x-data="{ step: @entangle('currentStep'), activeStep: 1 }" class="flex space-x-4">
    <div class="w-1/4  p-2">
        <div class="flex flex-col space-y-2 bg-gray-200 p-3 rounded-lg">
            <ul class="space-y-3">
                <li @click.prevent="validateStep(1)"
                :class="{ 'bussiness-info-active text-sm text-white': step === 1, 'bg-white text-sm text-black': step !== 1 }"
                class="p-2 rounded-lg ga-sidebar">Business Info</li>
                <li @click.prevent="validateStep(2)"
                :class="{ 'bussiness-info-active text-sm text-white': step === 2, 'bg-white text-sm text-black': step !== 2 }"
                class="p-2 rounded-lg ga-sidebar">Contact Details</li>
                <li @click.prevent="validateStep(3)"
                :class="{ 'bussiness-info-active text-sm text-white': step === 3, 'bg-white text-sm text-black': step !== 3 }"
                class="p-2 rounded-lg ga-sidebar">Business Intelligence</li>
                <li @click.prevent="validateStep(4)"
                :class="{ 'bussiness-info-active text-sm text-white': step === 4, 'bg-white text-sm text-black': step !== 4 }"
                class="p-2 rounded-lg ga-sidebar">Remarks</li>
            </ul>
        </div>
    </div>

    <div class="p-4 bg-gray-200 w-full">
        <!-- Progress Indicator -->
        <div class="mb-4">
            <span class="font-bold text-color">Step: <span x-text="step"></span></span>


        </div>

        <!-- Step 1: Business Info -->
        <div x-show="step === 1" class="space-y-4">
            <div class="w-full flex gap-4 lg:flex-nowrap ">
                <div class="form-group   lg:w-1/2 w-full">
                    <label for="business_type" class="col-form-label text-nowrap">Business Type: </label>
                    <select id="business_type" name="business_type" class="form-control"
                        wire:model="business_type" required>
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
                <div class="form-group   lg:w-1/2 w-full">
                    <label for="legal_business_type" class="col-form-label text-nowrap">Legal Business Type: </label>
                    <select id="legal_business_type" name="legal_business_type" class="form-control"
                        wire:model="legal_business_type" required>
                        <option value="">Select Legal Business Type</option>
                        <option value="Incorporated">Incorporated</option>
                        <option value="Partnership">Partnership</option>
                        <option value="LLP">LLP</option>
                        <option value="Sole Proprietor">Sole Proprietor</option>
                    </select>
                    @error('legal_business_type') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="w-full flex gap-4 lg:flex-nowrap">

                <div class="flex flex-col lg:w-1/2 w-full">
                    <label for="business_name" class="mb-2 text-sm font-medium text-gray-700 whitespace-nowrap">Business
                        Name: </label>
                    <div class="flex-grow">
                        <input type="text"
                            class="w-full p-2 border border-gray-300 rounded-md placeholder-gray-500 text-sm"
                            id="business_name" name="business_name" placeholder="Enter Your Business Name"
                            wire:model="business_name" required>
                        @error('business_name')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col lg:w-1/2 w-full">
                    <label for="registered_no"
                        class="mb-2 text-sm font-medium text-gray-700 whitespace-nowrap">Registered No: </label>
                    <div class="flex-grow">
                        <input type="text"
                            class="w-full p-2 border border-gray-300 rounded-md placeholder-gray-500 text-sm"
                            id="registered_no" placeholder="Enter Your Registered No" wire:model="registered_no"
                            required>
                        @error('registered_no')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>




            <div class="flex lg:flex-nowrap  gap-4">

                <div class="w-full lg:w-1/2">
                    <label for="incorporation_date" class="block text-sm font-medium text-gray-700">Incorporation
                        Date:</label>
                    <input type="date" id="incorporation_date"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-sm"
                        wire:model="incorporation_date" required>
                    @error('incorporation_date')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full lg:w-1/2">
                    <label for="incorporation_no" class="block text-sm font-medium text-gray-700">Inc No:</label>
                    <input type="number" id="incorporation_no" placeholder="Enter Your Inc No"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-sm"
                        wire:model="incorporation_no" required>
                    @error('incorporation_no')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

            </div>


            <div class="flex lg:flex-nowrap  gap-4">
                <div class="w-full lg:w-1/2">
                    <label for="pan_no" class="col-form-label">PAN No:</label>
                    <input type="text" class="form-control small-placeholder" id="pan_no"
                        placeholder="Enter Your PAN No" wire:model="pan_no" required>
                    @error('pan_no') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
                <div class="w-full lg:w-1/2">
                    <label for="tan_no" class="col-form-label">TAN No:</label>
                    <input type="text" class="form-control small-placeholder" id="tan_no"
                        placeholder="Enter Your TAN No" wire:model="tan_no" required>
                    @error('tan_no') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="flex lg:flex-nowrap  gap-4">
                <div class="w-full lg:w-1/2">
                    <label for="country" class="col-form-label">Country: </label>
                    <input type="text" class="form-control small-placeholder" id="country" placeholder="Country"
                        wire:model="country" required>
                    @error('country') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
                <div class="w-full lg:w-1/2">
                    <label for="state" class="col-form-label">State: </label>
                    <input type="text" class="form-control small-placeholder" id="state" placeholder="State"
                        wire:model="state" required>
                    @error('state') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="flex lg:flex-nowrap  gap-4">
                <div class="w-full lg:w-1/2">
                    <label for="city" class="col-form-label">City: </label>
                    <input type="text" class="form-control small-placeholder" id="city" placeholder="City"
                        wire:model="city" required>
                    @error('city') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
                <div class="w-full lg:w-1/2">
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
                    <label for="phone" class="col-form-label">Phone: </label>
                    <input type="number" class="form-control small-placeholder" id="phone"
                        placeholder="Enter Your Phone Number" wire:model="phone" minlength="10" maxlength="10"
                        required />
                    @error('phone') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
                <div class="w-full lg:w-1/2">
                    <label for="pincode" class="col-form-label">Pincode: </label>
                    <input type="number" class="form-control small-placeholder" id="pincode" placeholder="Pincode"
                        wire:model="pincode" minlength="6" maxlength="6" required>
                    @error('pincode') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="flex lg:flex-nowrap  gap-4">
                <div class="w-full lg:w-1/2">
                    <label for="email" class="col-form-label">Email: </label>
                    <input type="email" class="form-control small-placeholder" id="email" placeholder="Enter Your Email"
                        wire:model="email" required />
                    @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
                <div class="w-full lg:w-1/2">
                    <label for="alternate_phone" class="col-form-label">Alternative Phone: </label>
                    <input type="number" class="form-control small-placeholder" id="alternate_phone"
                        placeholder="Alternate Phone" wire:model="alternate_phone" minlength="10" maxlength="10"
                        required>
                    @error('alternate_phone') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="flex lg:flex-nowrap  gap-4">
                <div class="w-full lg:w-1/2">
                    <label for="website" class="col-form-label">Website: </label>
                    <input type="text" class="form-control small-placeholder" id="website" placeholder="Website"
                        wire:model="website" required>
                    @error('website') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>

                <div class="w-full lg:w-1/2">
                    <label for="alternative_email" class="col-form-label">Alternative Email: </label>
                    <input type="email" class="form-control small-placeholder" id="alternative_email"
                        placeholder="Enter Alternative Email" wire:model="alternative_email" required>
                    @error('alternative_email') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
            </div>


            <div class="form-group col-sm-6">
                <label for="address" class="col-form-label">Address: </label>
                <textarea type="text" class="form-control small-placeholder" id="address" placeholder="Address"
                    wire:model="address" required></textarea>
                @error('address') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
            <button class="bg-color text-white px-4 py-2 rounded next-button " wire:click.prevent="nextStep">
                Next
            </button>
        </div>

        <!-- Step 2: Contact Details -->
        <div x-show="step === 2" class="space-y-4">
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="salutation" class="col-form-label">salutation : </label>
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
                    <input type="first_name" class="form-control small-placeholder" id="first_name"
                        placeholder="Enter First Name" wire:model="first_name" required>
                    @error('first_name') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label for="last_name" class="col-form-label">Last Name</label>
                    <input type="text" class="form-control small-placeholder" id="last_name"
                        placeholder="Enter Last Name" wire:model="last_name" required>
                    @error('last_name') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="department" class="col-form-label">Department</label>
                    <input type="text" class="form-control small-placeholder" id="department"
                        placeholder="Enter Department" wire:model="department" required>
                    @error('department') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label for="designation" class="col-form-label">Designation</label>
                    <input type="text" class="form-control small-placeholder" id="designation"
                        placeholder="Enter Designation" wire:model="designation" required>
                    @error('designation') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="office_phone" class="col-form-label">Office Phone</label>
                    <input type="number" minlength="10" maxlength="10" class="form-control small-placeholder"
                        id="office_phone" placeholder="Enter Office Phone" wire:model="office_phone" required>
                    @error('office_phone') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label for="mobile_no" class="col-form-label">Mobile No.</label>
                    <input type="number" class="form-control small-placeholder" id="mobile_no" maxlength="10" minlength="10"
                        placeholder="Enter Mobile No." wire:model="mobile_no" required>
                    @error('mobile_no') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="office_email" class="col-form-label">Office Email</label>
                    <input type="email" class="form-control small-placeholder" id="office_email"
                        placeholder="Enter Office Email" wire:model="office_email" required>
                    @error('office_email') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label for="other_email" class="col-form-label">Other Email</label>
                    <input type="text" class="form-control small-placeholder" id="other_email"
                        placeholder="Enter Other Email" wire:model="other_email" required>
                    @error('other_email') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="flex gap-2">


            <button class="bg-red-500 text-white px-4 py-2 rounded ml-auto" wire:click.prevent="previousStep">
                Previous
            </button>

            <!-- <button class="bg-blue-500 text-white px-4 py-2 rounded" wire:click.prevent="submitForm">
                    Submit
                </button> -->
            <button class="bg-color text-white px-4 py-2 rounded" wire:click.prevent="nextStep">
                Next
            </button>
            </div>

        </div>

        <!-- Step 3: Business Intelligence -->
        <div x-show="step === 3" class="space-y-4">
            <div class="form-group row">
                <label for="no_of_doctors" class="col-sm-2 col-form-label">No. of Doctors</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control small-placeholder" id="no_of_doctors"
                        placeholder="Enter No. of Doctors" required wire:model="no_of_doctors">
                    @error('no_of_doctors')
                    <!-- Validation error for no_of_doctors -->
                    <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="specialities" class="col-sm-2 col-form-label">Specialities</label>
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

            <div class="form-group row">
                <label for="lab_revenue" class="col-sm-2 col-form-label">Lab Revenue</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control small-placeholder" id="lab_revenue"
                        placeholder="Enter Lab Revenue" required wire:model="lab_revenue">
                    @error('lab_revenue')
                    <!-- Validation error for lab_revenue -->
                    <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="currently_outsourceed_to" class="col-sm-2 col-form-label">Currently Outsourceed
                    To</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control small-placeholder" id="currently_outsourceed_to"
                        placeholder="Enter Currently Outsourceed To" required wire:model="currently_outsourceed_to">
                    @error('currently_outsourceed_to')
                    <!-- Validation error for currently_outsourceed_to -->
                    <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control small-placeholder" id="description"
                        placeholder="Enter Description" wire:model="description">
                    @error('description')
                    <!-- Validation error for description -->
                    <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="expected_business" class="col-sm-2 col-form-label">Expected Business</label>
                <div class="col-sm-10">
                    <table class="table table-bordered align-items-center table-sm">
                        <thead class="thead-light">
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
                            @foreach($expected_business as $index => $field)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <input type="text" class="form-control"
                                        wire:model="expected_business.{{ $index }}.test_name">
                                </td>
                                <td>
                                    <input type="text" class="form-control"
                                        wire:model="expected_business.{{ $index }}.expected_qty_day">
                                </td>
                                <td>
                                    <input type="text" class="form-control"
                                        wire:model="expected_business.{{ $index }}.expected_l2l_price">
                                </td>
                                <td>
                                    <input type="number" class="form-control"
                                        wire:model="expected_business.{{ $index }}.amount">
                                </td>
                                <td>
                                    <input type="number" class="form-control"
                                        wire:model="expected_business.{{ $index }}.total">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-small"
                                        wire:click="removeField({{ $index }})">&times;</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-right">
                                    <button type="button" class="btn btn-info" wire:click="addNewField()">+ Add
                                        Row</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="flex gap-2">

            <button class="bg-red-500 text-white px-4 py-2 rounded ml-auto" wire:click.prevent="previousStep">
                Previous
            </button>

            <!-- <button class="bg-blue-500 text-white px-4 py-2 rounded" wire:click.prevent="submitForm">
                    Submit
                </button> -->
            <button class="bg-color text-white px-4 py-2 rounded" wire:click.prevent="nextStep">
                Next
            </button>
</div>
        </div>

        <!-- Step 4: Remarks -->
        <div x-show="step === 4" class="space-y-4">
            <div class="form-group row">
                <label for="remark_description" class="col-sm-10 col-form-label">Remarks</label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control small-placeholder" id="remark_description"
                        placeholder="Enter Remarks" wire:model="remark_description"></textarea>
                    @error('remark_description')
                    <!-- Validation error for remark_description -->
                    <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex gap-2">

            <button class="bg-red-500 text-white px-4 py-2 rounded ml-auto" wire:click.prevent="previousStep">
                Previous
            </button>

            <button class="bg-color text-white px-4 py-2 rounded" wire:click.prevent="submitForm">
                Submit
            </button>
</div>
        </div>

    </div>
</div>

<script>
function validateStep(targetStep) {
    Livewire.emit('validateStep', targetStep);
}
</script>
<style>
    .ga-sidebar {
    font-size: 14px;
    font-weight: 400;
}
</style>