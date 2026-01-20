<div>
    <div class="lg:p-3 pt-3">
         
       <!-- <input wire:model.debounce.300ms="searchItem"
            class="outline-none bg-[#F0F2F5] rounded-md pl-16 py-1 w-[26vw] mr-2" placeholder="Search Item Name"
            type="text" id="searchItem"> -->
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">

                <h1 class="font-bold ">Leads List</h1>
                <div class="flex items-center space-x-2">
                <input wire:model.debounce.300ms="searchTest"
                    class="outline-none bg-gray-200 rounded-md pl-12 py-2 w-[26vw] mr-2 focus:ring-2 focus:ring-blue-500 transition duration-200"
                    placeholder="Search" type="text" id="searchTest">
                <a href="{{ route('business_info') }}">
                    <button class="px-4 py-2 text-white font-semibold rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200" style="background-color: #0c9207;">
                        <i class="fas fa-plus text-white"></i> Add Lead
                    </button>
                </a>
            </div>
            </div>

        <div class="tabs-content">
            <div x-show="activeTab === 'details'" class="tab-content" id="details">
                <div class="m-2">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Business Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Head Quarters</th>
                                    <th scope="col">State</th>
                                    <th scope="col">Staus</th>
                                    <th scope="col">Assign User</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if ($reports && $reports->count() > 0)
                                    @foreach($reports as $report)
                                        <tr class="leades-list-tr text-gray-700">
                                            <td>{{ $report->business_name }}</td>
                                            <td>{{ $report->email }}</td>
                                            <td>{{ $report->phone }}</td>
                                            <td>{{ $report->salesheadquarters?->name }}</td>
                                            <td>{{ $report->state }}</td>
                                            <td class="{{ $report->status === 'own' ? 'text-green-600' : 'text-red-600' }}">
                                                {{ $report->status }}
                                            </td>
                                            <!-- <td class="{{ $report->status === 'own' ? 'text-green-600' : 'text-red-600' }}" x-data="{ expanded: false }">
                                                <span x-show="!expanded">
                                                    {{ Str::limit($report->loss_description, 10) }} 
                                                    <a href="#" @click.prevent="expanded = true" class="text-blue-500"><strong>...more</strong></a>
                                                </span>
                                                
                                                <span x-show="expanded">
                                                    {{ $report->loss_description }}
                                                    <a href="#" @click.prevent="expanded = false" class="text-blue-500"><strong>show less</strong></a>
                                                </span>
                                            </td> -->

                                            <td>{{ $report->user?->first_name }} {{ $report->user?->last_name }} </td>
                                            <td>
                                                <!-- <div x-data="{ open: false }">
                                                    <button @click="open = true"
                                                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700 focus:outline-none focus:bg-blue-700">
                                                        Open Modal
                                                    </button>

                                                    <div @keydown.escape.window="open = false"
                                                        class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                                                        x-show="open" x-cloak>
                                                        <div class="flex items-center justify-center min-h-screen">
                                                            <div class="bg-white p-3 rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full"
                                                                @click.away="open = false"
                                                                x-transition:enter="ease-out duration-100"
                                                                x-transition:enter-start="opacity-0 scale-95"
                                                                x-transition:enter-end="opacity-100 scale-100"
                                                                x-transition:leave="ease-in duration-200"
                                                                x-transition:leave-start="opacity-100 scale-100"
                                                                x-transition:leave-end="opacity-0 scale-95">

                                                                <div class="flex items-start justify-between">
                                                                    <h3 class="text-lg leading-6 font-medium text-gray-900">Add
                                                                        Leads</h3>
                                                                    <span class="cursor-pointer" @click="open = false">✕</span>
                                                                </div>

                                                                <div class="mt-4 text-left">
                                                                    <div class="container mx-auto">
                                                                        <div class="grid grid-cols-3 gap-4">
                                                                            <div class="flex-col justify-between p-1">
                                                                                <div class="font-semibold">Name:</div>
                                                                                <div>{{ $report->name ?? 'N/A'}}</div>
                                                                            </div>
                                                                            <div class="flex-col justify-between p-1">
                                                                                <div class="font-semibold">Account Executive
                                                                                    Email:</div>
                                                                                <div>{{ $report->email ?? 'N/A'}}</div>
                                                                            </div>

                                                                            <div class="flex-col justify-between p-1">
                                                                                <div class="font-semibold">Sales HQ:</div>
                                                                                <div>{{ $report->sales_hq ?? 'N/A' }}</div>
                                                                            </div>

                                                                            <div class="flex-col justify-between p-1">
                                                                                <div class="font-semibold">Phone:</div>
                                                                                <div>{{ $report->phone ?? 'N/A'}}</div>
                                                                            </div>

                                                                            <div class="flex-col justify-between p-1">
                                                                                <div class="font-semibold">Title:</div>
                                                                                <div>{{ $report->phone ?? 'N/A'}}</div>
                                                                            </div>

                                                                            <div class="flex-col justify-between p-1">
                                                                                <div class="font-semibold">Website:</div>
                                                                                <div>{{ $report->website ?? 'N/A' }}</div>
                                                                            </div>

                                                                            <div class="flex-col justify-between p-1">
                                                                                <div class="font-semibold">Leads Address:</div>
                                                                                <div>{{ $report->address ?? 'N/A' }}</div>
                                                                            </div>

                                                                            <div class="flex-col justify-between p-1">
                                                                                <div class="font-semibold">City:</div>
                                                                                <div>{{ $report->city ?? 'N/A' }}</div>
                                                                            </div>

                                                                            <div class="flex-col justify-between p-1">
                                                                                <div class="font-semibold">State:</div>
                                                                                <div>{{ $report->state ?? 'N/A'}}</div>
                                                                            </div>

                                                                            <div class="flex-col justify-between p-1">
                                                                                <div class="font-semibold">Country:</div>
                                                                                <div>{{ $report->country ?? 'N/A'}}</div>
                                                                            </div>

                                                                            <div class="flex-col justify-between p-1">
                                                                                <div class="font-semibold">Assigned User:</div>
                                                                                <div>
                                                                                    {{ $report->user ? $report->user->first_name . ' ' . $report->user->last_name : 'N/A' }}
                                                                                </div>
                                                                            </div>

                                                                            <div class="flex-col justify-between p-1">
                                                                                <div class="font-semibold">Created:</div>
                                                                                <div>{{ $report->created_at }}</div>
                                                                            </div>
                                                                        </div>

                                                                        <h4 class="font-bold">Details</h4>

                                                                        <div class="grid grid-cols-2 gap-4">
                                                                            <div class="flex-col justify-between p-1">
                                                                                <div class="font-semibold">Status:</div>
                                                                                <div><button
                                                                                        class="bg-red-500 text-white">{{ $report->status ?? 'N/A'}}</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="flex-col justify-between p-1">
                                                                                <div class="font-semibold">Source:</div>
                                                                                <div>{{ $report->source ?? 'N/A'}}</div>
                                                                            </div>
                                                                            <div class="flex-col justify-between p-1">
                                                                                <div class="font-semibold">Campaign:</div>
                                                                                <div>{{ $report->phone ?? 'N/A'}}</div>
                                                                            </div>
                                                                            <div class="flex-col justify-between p-1">
                                                                                <div class="font-semibold">Industry:</div>
                                                                                <div>
                                                                                    {{ $report->user ? $report->user->first_name . ' ' . $report->user->last_name : 'N/A' }}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="flex items-center justify-end gap-2 mt-4">
                                                                    <button @click="open = false"
                                                                        class="w-full sm:w-auto inline-flex justify-center rounded-md border border-blue-500 px-4 py-2 text-base font-medium text-blue-500 hover:text-white hover:bg-blue-400 sm:text-sm">Close</button>
                                                                    <a href="{{ route('business.info.edit', $report->id) }}"><button
                                                                            class="w-full sm:w-auto inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-400 sm:text-sm">Edit</button></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div x-data="{ addUser: false }" @close-modal.window="open = false">
                                                    <button @click="addUser = true"
                                                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700 focus:outline-none focus:bg-blue-700">
                                                        Add User
                                                    </button>

                                                    <div @keydown.escape.window="addUser = false"
                                                        class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                                                        x-show="addUser" x-cloak>
                                                        <div class="flex items-center justify-center min-h-screen">
                                                            <div class="bg-white p-3 rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full"
                                                                @click.away="addUser = false"
                                                                x-transition:enter="ease-out duration-100"
                                                                x-transition:enter-start="opacity-0 scale-95"
                                                                x-transition:enter-end="opacity-100 scale-100"
                                                                x-transition:leave="ease-in duration-200"
                                                                x-transition:leave-start="opacity-100 scale-100"
                                                                x-transition:leave-end="opacity-0 scale-95">

                                                                <div class="flex items-start justify-between">
                                                                    <h3 class="text-lg leading-6 font-medium text-gray-900">Add
                                                                        User</h3>
                                                                    <span class="cursor-pointer"
                                                                        @click="addUser = false">✕</span>
                                                                </div>

                                                                <form wire:submit.prevent="saveUser">
                                                                    <div class="mt-4 text-left">
                                                                        <div class="container mx-auto">
                                                                            <div class="grid grid-cols-3 gap-4">
                                                                                <div class="flex-col justify-between p-1">
                                                                                    <div class="font-semibold">Name:</div>
                                                                                    <input type="text" class="form-control small-placeholder" id="name" placeholder="Enter Name" wire:model="first_name">
                                                                                    @error('first_name') <span class="text-danger small">{{ $message }}</span> @enderror
                                                                                </div>

                                                                                <div class="flex-col justify-between p-1">
                                                                                    <div class="font-semibold">Email:</div>
                                                                                    <input type="email" class="form-control small-placeholder" id="email" placeholder="Enter Email" wire:model="email">
                                                                                    @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="flex items-center justify-end gap-2 mt-4">
                                                                            <button type="button" class="w-full sm:w-auto inline-flex justify-center rounded-md border border-blue-500 px-4 py-2 text-base font-medium text-blue-500 hover:text-white hover:bg-blue-400 sm:text-sm" @click="addUser = false">Close</button>
                                                                            <button type="submit" class="w-full sm:w-auto inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-400 sm:text-sm">Save User</button>
                                                                        </div>
                                                                    </div>
                                                                </form>

                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <a href="{{ route('business.info.view', $report->id) }}"
                                                class="view-link"><i class="far fa-eye"></i></a>
                                                <a href="{{ route('business.info.edit', $report->id) }}"
                                                    class="edit-link"><i class="fas fa-edit"></i></a>
                                                <span class="delete-link" style="cursor:pointer;"
                                                    onclick="confirmDelete('{{ $report->id }}')"><i class="fas fa-trash"></i></span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="20" class="text-center">No Reports Found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $reports->links() }} <!-- Use links() only if $reports is paginated -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    [x-cloak] {
        display: none !important;
    }

    input#searchTest,
    input#searchItem {
        outline: none;
        background-color: #F0F2F5;
        border-radius: 8px;
        padding-left: 16px;
        padding-top: 8px;
        padding-bottom: 8px;
        width: 26vw;
        margin-right: 8px;
        font-size: 15px;
        border: 1px solid gray;
    }

    input::placeholder {
        color: #888888;
        font-size: 13px;
        font-weight: normal;
    }

    .pagination {
        margin: 20px 0;
    }

    .pagination .page-item.active .page-link {
        background-color: #191970;
        /* Customize active page background */
        color: white;
        /* Customize active page text color */
    }

    .pagination .page-link {
        border: 1px solid #ccc;
        /* Customize border for pagination links */
        color: #191970;
        /* Customize text color */
    }

    .pagination .page-link:hover {
        background-color: #f0f2f5;
        /* Change background on hover */
    }

    @media (max-width: 768px) {

        input#searchTest,
        input#searchItem {
            width: 60vw;
            padding-left: 12px;
            padding-right: 12px;
            font-size: 14px;
            margin-top: 10px;
        }

        input::placeholder {
            font-size: 14px;
        }
    }

    @media (max-width: 480px) {

        input#searchTest,
        input#searchItem {
            width: 80vw;
            padding-left: 10px;
            padding-right: 10px;
            font-size: 13px;
        }

        input::placeholder {
            font-size: 13px;
        }
    }

    .edit-link {
        color: blue;
        font-size: 14px;
        margin:0px 5px;
    }

    .edit-link:hover {
        color: darkblue;
    }

    .view-link {
        color: green;
        font-size: 14px;
    }

    .view-link:hover {
        color: darkblue;
    }

    .delete-link {
        color: red;
        cursor: pointer;
        font-size: 14px;
    }

    .delete-link:hover {
        color: darkred;
    }
    td {
    color: #000 !important;
}
.table .thead-dark th {
    background-color: #1F2937;
    color: #ffffff;
}
</style>

<script>
    function confirmDelete(reportId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#191970',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If confirmed, call the Livewire method to delete the record
                Livewire.emit('deleteReport', reportId);
                Swal.fire(
                    'Deleted!',
                    'Your record has been deleted.',
                    'success'
                )
            }
        })
    }
    document.addEventListener('livewire:load', function () {
        Livewire.on('closeModal', () => {
            document.querySelector('[x-data="{ addUser: false }"]').__x.$data.addUser = false;
        });
    });
</script>