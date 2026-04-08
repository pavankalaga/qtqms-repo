<div x-data="{ step: @entangle('currentStep'), activeStep: 1 }" class="flex space-x-4">
    <div class="w-1/4  p-2">
        <div class="flex flex-col space-y-2 bg-gray-200 p-3 rounded-lg">
            <span @click.prevent="validateStep(1)"
                :class="{ 'bg-blue-500 text-sm text-white': step === 1, 'bg-white text-black': step !== 1 }"
                class="p-2 rounded-lg text-sm text-nowrap ga-business-info">Business Info</span>

                <span @click.prevent="validateStep(2)"
      :class="{ 'text-sm text-white': step === 2, 'bg-white text-black': step !== 2 }"
      class="p-2 rounded-lg text-nowrap ga-sidebar"
      :style="step === 2 ? 'background-color: #0c9207;' : ''">
    Contact Details
</span>


            <span @click.prevent="validateStep(3)"
                :class="{ 'text-sm text-white': step === 3, 'bg-white text-black': step !== 3 }"
                class="p-2 rounded-lg text-nowrap ga-sidebar" :style="step === 3 ? 'background-color: #0c9207;' : ''">Business Intelligence</span>

            <span @click.prevent="validateStep(4)"
                :class="{ 'bg-blue-500 text-sm text-white': step === 4, 'bg-white text-black': step !== 4 }"
                class="p-2 rounded-lg text-nowrap ga-sidebar">Remarks</span>
        </div>
    </div>

    <div class="p-4 bg-gray-200 w-full mt-4">
        <!-- Progress Indicator -->
        <div class="mb-4">
            <span class="font-bold text-color">Step: <span x-text="step"></span></span>


        </div>

        <!-- Step 1: Business Info -->
        <div x-show="step === 1" class="space-y-4">
        <livewire:business-info>
            <button class="bg-color text-white px-4 py-2 rounded" wire:click.prevent="nextStep">
                Next
            </button>
        </div>

        <!-- Step 2: Contact Details -->
        <div x-show="step === 2" class="space-y-4">
        <livewire:contact-details>
        <div class="flex gap-3">
                    <button class="bg-red-500 text-white px-4 py-2 rounded" wire:click.prevent="previousStep">
                        Previous
                    </button>
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
                    <input type="number" class="form-control small-placeholder" id="description"
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

            <button class="bg-red-500 text-white px-4 py-2 rounded" wire:click.prevent="previousStep">
                Previous
            </button>
            <button class="bg-color text-white px-4 py-2 rounded" wire:click.prevent="nextStep">
                Next
            </button>
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
            <button class="bg-red-500 text-white px-4 py-2 rounded" wire:click.prevent="previousStep">
                Previous
            </button>

            <button class="bg-color text-white px-4 py-2 rounded" wire:click.prevent="submitForm">
                Submit
            </button>
        </div>

    </div>
</div>

<script>
function validateStep(targetStep) {
    Livewire.emit('validateStep', targetStep);
}
</script>
<style>
    .ga-business-info {
        background-color: #0c9207;
    }
   .ga-sidebar {
    font-size: 14px;
    font-weight: 400;
    /* line-height: 32px; */
}
</style>