<div>


    <div x-data="{
            activeTab: 'business-intelligence',
            specialities: @entangle('specialities'),
            addNewField() {
                this.specialities.push({ test_name: '', expected_qty_day: '' });
            },
            removeField(index) {
                this.specialities.splice(index, 1);
            }
        }" class="flex space-x-4">
        <!-- Tab Navigation -->
        <div class="w-1/4 bg-gray-200 p-2">
            <div class="flex flex-col space-y-2 bg-gray-200">
                <a href="{{ route('business_info') }}" 
                    :class="{ 'bg-blue-500 text-sm text-white': activeTab === 'business-info', 'bg-white text-black': activeTab !== 'business-info' }" 
                    class="p-2 rounded-lg">Business Info</a>

                <a href="{{ route('contact_details') }}" 
                    :class="{ 'bg-blue-500 text-sm text-white': activeTab === 'contact-details', 'bg-white text-black': activeTab !== 'contact-details' }" 
                    class="p-2 rounded-lg">Contact Details</a>

                <a href="{{ route('business_intelligence') }}" 
                    :class="{ 'bg-blue-500 text-sm text-white': activeTab === 'business-intelligence', 'bg-white text-black': activeTab !== 'business-intelligence' }" 
                    class="p-2 rounded-lg">Business Intelligence</a>

                <a href="{{ route('remarks') }}" 
                    :class="{ 'bg-blue-500 text-sm
                     text-white': activeTab === 'remarks', 'bg-white text-black': activeTab !== 'remarks' }" 
                    class="p-2 rounded-lg">Remarks</a>
            </div>
        </div>

        <!-- Tab Content -->
        <div class="p-4 w-3/4">
            <div x-show="activeTab === 'business-intelligence'" class="space-y-4">
                <h2 class="text-lg font-bold mb-4">Business Intelligence</h2>
                <form wire:submit.prevent="submitAll">

                <div class="form-group row">
                            <label for="no_of_doctors" class="col-sm-2 col-form-label">No. of Doctors</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control small-placeholder" id="no_of_doctors" placeholder="Enter No. of Doctors" required
                                    wire:model="no_of_doctors">
                                    @error('no_of_doctors') <!-- Validation error for no_of_doctors -->
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
                                <input type="text" class="form-control small-placeholder" id="lab_revenue" placeholder="Enter Lab Revenue" required
                                    wire:model="lab_revenue">
                                    @error('lab_revenue') <!-- Validation error for lab_revenue -->
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="currently_outsourceed_to" class="col-sm-2 col-form-label">Currently Outsourceed To</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control small-placeholder" id="currently_outsourceed_to" placeholder="Enter Currently Outsourceed To"required
                                    wire:model="currently_outsourceed_to">
                                    @error('currently_outsourceed_to') <!-- Validation error for currently_outsourceed_to -->
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control small-placeholder" id="description" placeholder="Enter Description"
                                    wire:model="description">
                                    @error('description') <!-- Validation error for description -->
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
                                            <th>Expected Qty Day / Expected L2L Price</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($expected_business as $index => $field)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <input type="text" class="form-control" wire:model="expected_business.{{ $index }}.test_name">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" wire:model="expected_business.{{ $index }}.expected_qty_day">
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-small" wire:click="removeField({{ $index }})">&times;</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4" class="text-right">
                                                <button type="button" class="btn btn-info" wire:click="addNewField()">+ Add Row</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-8">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
      function handler() {
    return {
        expected_business: @entangle('expected_business'),
        addNewField() {
            this.expected_business.push({ test_name: '', expected_qty_day: '' });
        },
        removeField(index) {
            this.expected_business.splice(index, 1);
        },
        syncSelect2() {
            this.$nextTick(() => {
                $('.js-select2').val(this.specialities).trigger('change');
            });
        },
        // Call this method when specialities changes
        specialities: @entangle('specialities').defer // Use defer for optimal performance
    };
}


function select2Component() {
    return {
        init() {
            const selectElement = $('.js-select2');

            selectElement.select2({
                closeOnSelect: false,
                placeholder: "Select Specialities",
                allowClear: true,
                tags: true
            });

            // Update Livewire property on change
            selectElement.on('change', (e) => {
                this.specialities = $(e.target).val(); // Ensure you are updating this value
            });

            // Initialize with current values
            this.syncSelect2();
        },
        syncSelect2() {
            const selectElement = $('.js-select2');
            selectElement.val(this.specialities).trigger('change'); // Sync with Livewire property
        }
    };
}

Livewire.on('alert', param => {
    Swal.fire({
        icon: param.type,
        title: param.message,
        showConfirmButton: true,
        timer: 3000 // Auto-close after 3 seconds
    });
});

    </script>

</div>
