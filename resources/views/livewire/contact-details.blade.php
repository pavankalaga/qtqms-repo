<div>
<div x-data="{ openModal: false, editMode: false }" @open-modal.window="openModal = true">
    <div class="flex space-x-4">
        <button @click="openModal = true; @this.resetContactFields()" 
                class="text-white px-4 py-2 rounded mb-3" 
                style="background-color: #0c9207;">
            Add Contact
        </button>

        <!-- Contact Details Modal -->
        <div x-show="openModal" class="fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex justify-center items-center" style="display: none;">
            <div class="bg-white rounded-lg p-3 w-11/12 md:w-1/3">
                <h2 class="text-lg font-bold">Contact Details</h2>
                <form wire:submit.prevent="saveContactDetails">
                    <input type="hidden" wire:model="lead_contact_id">
                    <input type="hidden" wire:model="contactId">

                    <div class="flex lg:flex-nowrap gap-4">
                        <div class="w-full lg:w-1/2">
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

                    <div class="flex lg:flex-nowrap gap-4">
                        <div class="w-full lg:w-1/2">
                            <label for="first_name" class="col-form-label">First Name</label>
                            <input type="text" class="form-control small-placeholder" id="first_name" placeholder="Enter First Name" wire:model="first_name" required>
                            @error('first_name') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full lg:w-1/2">
                            <label for="last_name" class="col-form-label">Last Name</label>
                            <input type="text" class="form-control small-placeholder" id="last_name" placeholder="Enter Last Name" wire:model="last_name" required>
                            @error('last_name') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    
                    <div class="flex lg:flex-nowrap gap-4">
                        <div class="w-full lg:w-1/2">
                            <label for="department" class="col-form-label">Department</label>
                            <input type="text" class="form-control small-placeholder" id="department" placeholder="Enter Department" wire:model="department" required>
                            @error('department') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full lg:w-1/2">
                            <label for="designation" class="col-form-label">Designation</label>
                            <input type="text" class="form-control small-placeholder" id="designation" placeholder="Enter Designation" wire:model="designation" required>
                            @error('designation') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="flex lg:flex-nowrap gap-4">
                        <div class="w-full lg:w-1/2">
                            <label for="office_phone" class="col-form-label">Office Phone</label>
                            <input type="number" class="form-control small-placeholder" id="office_phone" placeholder="Enter Office Phone" wire:model="office_phone" required>
                            @error('office_phone') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full lg:w-1/2">
                            <label for="mobile_no" class="col-form-label">Mobile No.</label>
                            <input type="text" class="form-control small-placeholder" id="mobile_no" placeholder="Enter Mobile No." wire:model="mobile_no" required>
                            @error('mobile_no') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="flex lg:flex-nowrap gap-4">
                        <div class="w-full lg:w-1/2">
                            <label for="office_email" class="col-form-label">Office Email</label>
                            <input type="email" class="form-control small-placeholder" id="office_email" placeholder="Enter Office Email" wire:model="office_email" required>
                            @error('office_email') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full lg:w-1/2">
                            <label for="other_email" class="col-form-label">Other Email</label>
                            <input type="text" class="form-control small-placeholder" id="other_email" placeholder="Enter Other Email" wire:model="other_email" required>
                            @error('other_email') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="flex justify-end mt-4">
                        <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded mr-2" @click="openModal = false">Close</button>
                        <button type="submit" class="text-white px-4 py-2 rounded" style="background-color: #0c9207;">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div>
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 rounded">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="bg-red-500 text-white p-2 rounded">
            {{ session('error') }}
        </div>
    @endif
</div>


    <!-- Table for displaying contacts -->
    <div class="border border-gray-300 shadow rounded-lg overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-700 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Department</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Designation</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Office Phone</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Office Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @if($list_contact_details->count() > 0)
                    @foreach($list_contact_details as $contact)
                        <tr class="hover:bg-gray-100">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$contact->id}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{$contact->salutation}} {{$contact->first_name}} {{$contact->last_name}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$contact->department}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$contact->designation}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$contact->office_phone}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$contact->office_email}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <span wire:click="editContactDetails('{{ $contact->id }}')" class="text-blue-600 cursor-pointer hover:underline">Edit</span>
                                <span class="text-red-600 cursor-pointer ml-4 hover:underline" onclick="confirmDelete('{{ $contact->id }}')">Delete</span>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500">No Details found</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
               
            </div>
            <script>
    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this contact?')) {
            @this.deleteReport(id);
        }
    }
</script>

</div>