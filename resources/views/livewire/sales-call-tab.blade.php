<div>
    <!-- <h2>Vertical Tabs</h2> -->
    <div class="contain-tabs">

        <div class="tab space-y-2 bg-gray-200 p-3 rounded-lg mt-2">
            <a class="nav-link active cc-businessinfo " id="v-pills-link1-tab" data-mdb-pill-init
                href="{{route('sales_call')}}" role="tab" aria-controls="v-pills-link1" aria-selected="true">Day
                Plan</a>
            <a class="nav-link p-2 rounded-lg text-nowrap ga-sidebar bg-white text-black ga-sidebar"
                id="v-pills-link2-tab" data-mdb-pill-init href="{{route('call-log')}}" role="tab"
                aria-controls="v-pills-link2" aria-selected="false">Call Log</a>
        </div>

        <div id="Uni1" x-show="activeTab === 'Uni1'" class="tabcontent">
            <div class="lg:p-3 pt-3">
                <!-- <h1 class="font-bold">Opportunity Details</h1> -->
                <div class="tabs-content">
                    <div class="filter-btn">
                        <div x-data="{ addUser: false }" @close-modal.window="addUser = false">
                            <button @click="addUser = true"
                                class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700 focus:outline-none focus:bg-blue-700">
                                Create Day Plan
                            </button>
                            <div x-show="addUser"
                                class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50"
                                x-transition>
                                <div class="bg-white px-5 py-5 rounded-lg shadow-lg w-1/3">
                                <form wire:submit.prevent="salesUsers" @submit="addUser = false">
                                        <h2 class="text-lg font-bold mb-4">Update Status</h2>
                                        
                                        <!-- Alpine.js Multi-Select Dropdown -->
                                        <div x-data="{ open: false, selectedUsers: @entangle('lead_ids').defer }" class="relative">
                                            <button @click="open = !open" type="button"
                                                    class="w-full text-left p-2 border border-gray-300 rounded bg-white flex justify-between items-center">
                                                <span class="truncate">
                                                    <template x-if="selectedUsers.length > 0">
                                                        <!-- Display selected user names if any are selected -->
                                                        <span x-text="selectedUsers.length + ' user(s) selected'"></span>
                                                    </template>
                                                    <template x-if="selectedUsers.length === 0">
                                                        Choose an Option
                                                    </template>
                                                </span>
                                                <span class="ml-2">▼</span>
                                            </button>

                                            <!-- Dropdown menu -->
                                            <div x-show="open" @click.away="open = false"
                                                class="absolute z-10 mt-2 w-full bg-white border border-gray-300 rounded shadow-lg max-h-60 overflow-y-auto">
                                                <template x-for="user in {{ json_encode($users) }}" :key="user.id">
                                                    <label class="flex items-center p-2 hover:bg-gray-100">
                                                        <input type="checkbox" x-model="selectedUsers" :value="user.id" class="mr-2">
                                                        <span x-text="user.business_name"></span>
                                                    </label>
                                                </template>
                                            </div>

                                            @error('lead_ids')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Date input -->
                                        <input type="date" wire:model="assign_date" class="w-full p-2 border border-gray-300 rounded mt-4 mb-4" required>

                                        <div class="flex justify-end gap-3 mt-4">
                                            <button type="button" @click="addUser = false" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-700">
                                                Cancel
                                            </button>
                                            <button type="submit" class="ml-2 px-4 py-2 text-white rounded" style="background-color: #0c9207;">
                                                Save
                                            </button>
                                        </div>
                                    </form>


                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Business Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Head Quarters</th>
                                    <th scope="col">State</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Assign User</th>
                                    <th scope="col">View</th>
                                    <th scope="col">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($reports && $reports->count() > 0)
                                    @foreach($reports->take(10) as $report) 
                                        <tr>
                                            <td>
                                                {{$report->business_name}}
                                            </td>
                                            <td>{{ $report->email }}</td>
                                            <td>{{ $report->phone }}</td>
                                            <td>{{ $report->salesheadquarters?->name }}</td>
                                            <td>{{ $report->state }}</td>
                                            <td class="{{ $report->status === 'own' ? 'text-green-600' : 'text-red-600' }}">
                                                {{ $report->status }}
                                            </td>
                                            <td>{{ $report->user?->first_name }} {{ $report->user?->last_name }}</td>

                                            <td>
                                                <a href="{{ route('business.info.view', $report->id) }}" class="view-link"><i
                                                        class="far fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <a href="{{ route('business.info.edit', $report->id) }}" class="edit-link"><i
                                                        class="fas fa-edit"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="10" class="text-center">No Reports Found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $reports->links() }} <!-- Pagination if $reports is paginated -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <style>
        .contain-tabs {
            display: flex;
            width: 100%;
        }

        .tab {
            width: 250px;
            background-color: #eee;
            /* height: 100vh; */
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            align-items: left;
            /* Center buttons horizontally */
            padding: 15px;
            position: fixed;
        }

        .tab button {
            background-color: inherit;
            color: black;
            padding: 12px;
            width: 100%;
            border: none;
            text-align: left;
            cursor: pointer;
            transition: 0.3s;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .tab button:hover {
            background-color: #ddd;
            border-radius: 8px;
        }

        .tab button.active {
            background-color: #0c9207;
            color: #fff;
            font-weight: bold;
            border-radius: 8px;
        }

        .tabcontent {
            margin-left: 260px;
            padding: 20px;
            width: calc(100% - 260px);
        }

        .table-responsive {
            overflow-x: auto;
        }


        /* General styles */
        .tabcontent {
            padding: 20px;
        }

        .card-row {
            /* display: flex; */
            /* gap: 20px; */
            margin-bottom: 20px;
            margin-top: 2px
        }

        .card {
            background-color: gray;
            padding: 20px;
            border-radius: 8px;
            flex: 1;
            text-align: center;
            height: 200px;
            padding: 6px 118px;
            justify-content: center;
            margin: 20px
        }

        /* Different card background classes */
        .card-1 {
            background-color: #d9d9d9;
        }

        .card-2 {
            background-color: #d9d9d9;
        }

        .card-3 {
            background-color: #d9d9d9;
        }

        .card-4 {
            background-color: #d9d9d9;
        }

        /* Text styles for Check In/Check Out */
        .date-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .check-in,
        .check-out,
        .get-in,
        .get-out {
            font-size: 14px;
            font-weight: 500;
        }

        .cc-businessinfo {
            appearance: none;
            background-color: #2ea44f;
            border: 1px solid rgba(27, 31, 35, .15);
            border-radius: 6px;
            box-shadow: rgba(27, 31, 35, .1) 0 1px 0;
            box-sizing: border-box;
            color: #fff !important;
            cursor: pointer;
            display: inline-block;
            font-family: -apple-system, system-ui, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
            font-size: 12px;
            font-weight: 600;
            line-height: 28px;
            padding: 6px 6px;
            position: relative;
            text-align: left;
            text-decoration: none;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            vertical-align: middle;
            white-space: nowrap;
        }

        .cc-businessinfo:focus:not(:focus-visible):not(.focus-visible) {
            box-shadow: none;
            outline: none;
        }

        .cc-businessinfo:hover {
            background-color: #2c974b;
        }

        .cc-businessinfo:focus {
            box-shadow: rgba(46, 164, 79, .4) 0 0 0 3px;
            outline: none;
        }

        .cc-businessinfo:disabled {
            background-color: #94d3a2;
            border-color: rgba(27, 31, 35, .1);
            color: rgba(255, 255, 255, .8);
            cursor: default;
        }

        .cc-businessinfo:active {
            background-color: #298e46;
            box-shadow: rgba(20, 70, 32, .2) 0 1px 0 inset;
        }

        /* Text styles for Get In/Get Out */
        .action-info {
            display: flex;
            justify-content: space-between;
        }

        .ga-sidebar {
    font-size: 14px;
    font-weight: 400;
}
.table .thead-dark th {
    background-color: #1F2937;
    color: #ffffff;
}
    </style>

</div>