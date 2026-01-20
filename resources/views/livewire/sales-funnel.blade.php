<div>
    <!-- <h2>Vertical Tabs</h2> -->
    <div class="contain-tabs">
        <div class="tab space-y-2 bg-gray-200 p-3 rounded-lg mt-2">
            <a class="nav-link active p-2 rounded-lg text-nowrap ga-sidebar bg-white text-black ga-sidebar"
                id="v-pills-link1-tab" data-mdb-pill-init href="#businessinfo" role="tab" aria-controls="v-pills-link1"
                aria-selected="true">Business Info</a>
            <a class="nav-link p-2 rounded-lg text-nowrap ga-sidebar bg-white text-black ga-sidebar"
                id="v-pills-link2-tab" data-mdb-pill-init href="#contactdetails" role="tab"
                aria-controls="v-pills-link2" aria-selected="false">Contact Details</a>
            <a class="nav-link p-2 rounded-lg text-nowrap ga-sidebar bg-white text-black ga-sidebar"
                id="v-pills-link3-tab" data-mdb-pill-init href="#businessinteligence" role="tab"
                aria-controls="v-pills-link3" aria-selected="false">Business Intelligence
            </a>
            <a class="nav-link p-2 rounded-lg text-nowrap ga-sidebar bg-white text-black ga-sidebar"
                id="v-pills-link4-tab" data-mdb-pill-init href="#remarks" role="tab" aria-controls="v-pills-link4"
                aria-selected="false">Remarks
            </a>
            <a class="nav-link cc-businessinfo" id="v-pills-link5-tab" data-mdb-pill-init href="sales_funnel" role="tab"
                aria-controls="v-pills-link5" aria-selected="false">Sales Funnel</a>
            <a class="nav-link p-2 rounded-lg text-nowrap ga-sidebar bg-white text-black ga-sidebar"
                id="v-pills-link6-tab" data-mdb-pill-init href="opportunity" role="tab" aria-controls="v-pills-link6"
                aria-selected="false">Call Logs</a>
        </div>

        <div class="tabcontent">
            <div class="lg:p-3 pt-3">


                <!-- <h1 class="font-bold">Opportunity Details</h1> -->
                <div class="tabs-content">
                    <div x-data="{ open: false }" class="relative inline-block text-left ">
                        <!-- <div class="filter-btn">
                            <button @click="open = !open"
                                class="bg-green-500 text-white px-4 py-2 rounded">Filter</button>
                        </div> -->
                        <select id="searchTest" name="selectedUser" class="form-control select2"
                            wire:model="selectedUser" required>
                            <option value="">Select User</option>
                            @foreach ($all_assigned_users as $businessInfoDetail)
                                    <option value="{{ $businessInfoDetail->id }}">
                                        {{ $businessInfoDetail->first_name }} {{ $businessInfoDetail->last_name }}
                                    </option>
                            @endforeach
                        </select>
                        <script>
                            document.addEventListener('livewire:load', function () {
                                Livewire.on('userSelected', function () {
                                    $('#searchTest').select2(); // Reinitialize Select2
                                });

                                // Initialize Select2 for the first load
                                $('#searchTest').select2();

                                // Bind change event for select2
                                $('#searchTest').on('change', function (e) {
                                    @this.set('selectedUser', $(this).val()); // Set the selected user value to Livewire
                                });
                            });
                        </script>

                        <div x-show="open" @click.away="open = false"
                            class="absolute z-10 mt-2 w-48 bg-white rounded-md shadow-lg">
                            <div class="py-2">
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Option 1</a>
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Option 2</a>
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Option 3</a>
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
                                    <th scope="col">Assigned User</th>
                                    <th scope="col">View</th>
                                    <th scope="col">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($reports && $reports->count() > 0)
                                    @foreach($reports->take(10) as $report) <!-- Limit to 10 entries -->
                                        <tr>
                                            <td>
                                                {{ $report->business_name }}
                                            </td>
                                            <td>{{ $report->email }}</td>
                                            <td>{{ $report->phone }}</td>
                                            <td>{{ $report->salesheadquarters?->name }}</td>
                                            <td>{{ $report->state }}</td>
                                            <td>
                                                {{ $report->status }}

                                                <div x-data="{ addUser: false, showTextarea: false }"
                                                    @close-modal.window="addUser = false">
                                                    <div x-data="{ openModal: false }">
                                                        <div x-data="{ addUser: false, showTextarea: false }"
                                                            @close-modal.window="addUser = false">
                                                            <button @click="addUser = true"
                                                                wire:click="setLeadId({{ $report->id }})"
                                                               >
                                                               <i class="fas fa-toggle-on"></i>
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

                                                                        <!-- Modal header -->
                                                                        <div class="flex items-start justify-between">
                                                                            <h3
                                                                                class="text-lg leading-6 font-medium text-gray-900">
                                                                                Change Status</h3>
                                                                            <span class="cursor-pointer"
                                                                                @click="addUser = false">✕</span>
                                                                        </div>

                                                                        <!-- Modal body -->
                                                                        <form wire:submit.prevent="saveUser"
                                                                            x-data="{ showTextarea: false }"
                                                                            class="p-4 bg-gray-100 rounded-lg shadow-md">
                                                                            <div class="mb-4">
                                                                                <label for="status"
                                                                                    class="font-semibold">Status</label>
                                                                                <select wire:model="status"
                                                                                    @change="showTextarea = ($event.target.value === 'Agreement Completed')"
                                                                                    class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm"
                                                                                    id="status" required>
                                                                                    <option selected>Choose...</option>
                                                                                    <option value="Open">Open</option>
                                                                                    <option value="Contacted">Contacted</option>
                                                                                    <option value="Opportunity Created">
                                                                                        Opportunity Created</option>
                                                                                    <option value="Follow-up saveCallLogs">
                                                                                        Follow-up saveCallLogs</option>
                                                                                    <option value="Pre-Agreement">Pre-Agreement
                                                                                    </option>
                                                                                    <option value="Agreement Completed">
                                                                                        Agreement Completed</option>
                                                                                    <option value="Customer">Customer</option>
                                                                                    <option value="Opportunity Lost">Opportunity
                                                                                        Lost</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="mt-4" x-show="showTextarea" x-cloak>
                                                                                <label for="loss_description"
                                                                                    class="font-semibold">Agreed
                                                                                    Business</label>
                                                                                <div
                                                                                    class="overflow-x-auto bg-white rounded-lg shadow-md mt-2">
                                                                                    <table
                                                                                        class="table min-w-full border border-gray-200">
                                                                                        <thead class="thead-dark" >
                                                                                            <tr>
                                                                                                <th class="px-4 py-2 text-left">
                                                                                                    S.No</th>
                                                                                                <th class="px-4 py-2 text-left">
                                                                                                    Test Name</th>
                                                                                                <th class="px-4 py-2 text-left">
                                                                                                    Expected Qty Day</th>
                                                                                                <th class="px-4 py-2 text-left">
                                                                                                    Expected L2L Price</th>
                                                                                                <th class="px-4 py-2 text-left">
                                                                                                    Amount</th>
                                                                                                <th class="px-4 py-2 text-left">
                                                                                                    Total</th>
                                                                                                <th class="px-4 py-2 text-left">
                                                                                                    Remove</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody class="text-gray-700">
                                                                                            @foreach($expected_business as $index => $field)
                                                                                                <tr
                                                                                                    class="border-b border-gray-200 bg-gray-100  duration-150">
                                                                                                    <td class="px-4 py-2">
                                                                                                        {{ $loop->iteration }}</td>
                                                                                                    <td class="px-4 py-2">
                                                                                                        <input type="text"
                                                                                                            
                                                                                                            wire:model="expected_business.{{ $index }}.test_name">
                                                                                                    </td>
                                                                                                    <td class="px-4 py-2">
                                                                                                        <input type="text"
                                                                                                            
                                                                                                            wire:model="expected_business.{{ $index }}.expected_qty_day">
                                                                                                    </td>
                                                                                                    <td class="px-4 py-2">
                                                                                                        <input type="text"
                                                                                                            
                                                                                                            wire:model="expected_business.{{ $index }}.expected_l2l_price">
                                                                                                    </td>
                                                                                                    <td class="px-4 py-2">
                                                                                                        <input type="number"
                                                                                                            
                                                                                                            wire:model="expected_business.{{ $index }}.amount">
                                                                                                    </td>
                                                                                                    <td class="px-4 py-2">
                                                                                                        <input type="number"
                                                                                                            
                                                                                                            wire:model="expected_business.{{ $index }}.total">
                                                                                                    </td>
                                                                                                    <td class="px-4 py-2">
                                                                                                        <button type="button"
                                                                                                            class="text-red-500 hover:text-red-700 transition duration-150"
                                                                                                            wire:click="removeField({{ $index }})">
                                                                                                            &times;
                                                                                                        </button>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            @endforeach
                                                                                        </tbody>
                                                                                        <tfoot>
                                                                                            <tr>
                                                                                                <td colspan="6"
                                                                                                    class="text-right py-2 px-4">
                                                                                                    <button type="button"
                                                                                                        class="px-4 py-2 rounded-md text-white"
                                                                                                        style="background-color: #0c9207;"
                                                                                                        wire:click="addNewField()">+
                                                                                                        Add Row
                                                                                                    </button>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tfoot>
                                                                                    </table>
                                                                                </div>
                                                                            </div>

                                                                            <!-- Modal footer -->
                                                                            <div
                                                                                class="mt-4 flex items-center justify-end gap-2">
                                                                                <button type="button"
                                                                                    class="w-full sm:w-auto inline-flex justify-center rounded-md border border-green-500 px-4 py-2 text-base font-medium text-green-500 hover:text-white hover:bg-red-800 transition duration-150"
                                                                                    @click="addUser = false">Close
                                                                                </button>
                                                                                <button type="submit"
                                                                                    class="w-full sm:w-auto inline-flex justify-center rounded-md border border-transparent px-4 py-2"
                                                                                    style="background-color: #0c9207; color: white;">
                                                                                    Save User
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                        <script>
                                                                            $(document).ready(function () {

                                                                                $("#extend").click(function (e) {
                                                                                    e.preventDefault();
                                                                                    $("#extend-field").append('<div><input type="text"><a class="add-text-field form-control"><button>+</button></a><a class="remove-extend-field"><button>-</button></a>');
                                                                                });


                                                                                $("#extend-field").on("click", ".add-text-field", function (e) {
                                                                                    e.preventDefault();

                                                                                    $("#extend-field").append('<div><input type="text"><a class="add-text-field form-control"><button>+</button></a><a class="remove-extend-field"><button>-</button></a>')


                                                                                });

                                                                                $("#extend-field").on("click", ".remove-extend-field", function (e) {
                                                                                    e.preventDefault();
                                                                                    $(this).parent('div').remove();
                                                                                });


                                                                            });

                                                                        </script>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Contact Details Modal -->

                                                    </div>
                                                </div>
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
        <div id="View_Business_Details" class="tabcontent" style="padding: 20px; display: none;">
            <!-- <h2>Business Details</h2> -->
            <div id="business-details-content"></div>
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

        .filter-btn {
            display: flex;
            justify-content: flex-end;
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

        /* Text styles for Get In/Get Out */
        .action-info {
            display: flex;
            justify-content: space-between;
        }

        .card-table {
            background-color: #eee;
            padding: 20px;
            border-radius: 8px;
            flex: 1;
            text-align: center;
            height: 339px;
            justify-content: center;
            margin: 20px;
        }

        .cc-businessinfo {
            appearance: none;
            background-color: #0c9207;
            border: 1px solid rgba(27, 31, 35, .15);
            border-radius: 6px;
            box-shadow: rgba(27, 31, 35, .1) 0 1px 0;
            box-sizing: border-box;
            color: #fff !important;
            cursor: pointer;
            display: inline-block;
            font-family: -apple-system, system-ui, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
            font-size: 14px;
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

        .ga-sidebar {
            font-size: 14px;
            font-weight: 400;
        }
        .table .thead-dark th {
    background-color: #1F2937;
    color: #ffffff;
}
.table .thead-dark th {
    background-color: #1F2937;
    color: #ffffff;
}
    </style>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>


    <script>
        function openCourse(evt, courseName) {
            // Hide all tab contents
            var tabcontent = document.getElementsByClassName("tabcontent");
            for (var i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Remove "active" class from all buttons
            var tablinks = document.getElementsByClassName("tablinks");
            for (var i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab
            document.getElementById(courseName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        function showBusinessDetails(id, name, email, phone, headquarters, state, status, assignedUser) {
            // Create content for the details section
            // const detailsContent = `
            //     <p><strong>ID:</strong> ${id}</p>
            //     <p><strong>Business Name:</strong> ${name}</p>
            //     <p><strong>Email:</strong> ${email}</p>
            //     <p><strong>Phone:</strong> ${phone}</p>
            //     <p><strong>Headquarters:</strong> ${headquarters}</p>
            //     <p><strong>State:</strong> ${state}</p>
            //     <p><strong>Status:</strong> ${status}</p>
            //     <p><strong>Assigned User:</strong> ${assignedUser}</p>
            // `;

            const detailsContent = `
        <div>
        <div class="card-row">
          <div class="card-table">
            <h1>Expected Business </h1>
            <table>
              <caption>Statement Summary</caption>
              <thead>
                <tr>
                  <th scope="col">Account</th>
                  <th scope="col">Due Date</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Period</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td data-label="Account">Visa - 3412</td>
                  <td data-label="Due Date">04/01/2016</td>
                  <td data-label="Amount">$1,190</td>
                  <td data-label="Period">03/01/2016 - 03/31/2016</td>
                </tr>
                <tr>
                  <td scope="row" data-label="Account">Visa - 6076</td>
                  <td data-label="Due Date">03/01/2016</td>
                  <td data-label="Amount">$2,443</td>
                  <td data-label="Period">02/01/2016 - 02/29/2016</td>
                </tr>
                <tr>
                  <td scope="row" data-label="Account">Corporate AMEX</td>
                  <td data-label="Due Date">03/01/2016</td>
                  <td data-label="Amount">$1,181</td>
                  <td data-label="Period">02/01/2016 - 02/29/2016</td>
                </tr>
                <tr>
                  <td scope="row" data-label="Acount">Visa - 3412</td>
                  <td data-label="Due Date">02/01/2016</td>
                  <td data-label="Amount">$842</td>
                  <td data-label="Period">01/01/2016 - 01/31/2016</td>
                </tr>
              </tbody>
            </table>
          </div>
          </div>
          <div class="card-row">
          <div class="card-table">
            <h1>Expected Business </h1>
            <table>
              <caption>Statement Summary</caption>
              <thead>
                <tr>
                  <th scope="col">Account</th>
                  <th scope="col">Due Date</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Period</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td data-label="Account">Visa - 3412</td>
                  <td data-label="Due Date">04/01/2016</td>
                  <td data-label="Amount">$1,190</td>
                  <td data-label="Period">03/01/2016 - 03/31/2016</td>
                </tr>
                <tr>
                  <td scope="row" data-label="Account">Visa - 6076</td>
                  <td data-label="Due Date">03/01/2016</td>
                  <td data-label="Amount">$2,443</td>
                  <td data-label="Period">02/01/2016 - 02/29/2016</td>
                </tr>
                <tr>
                  <td scope="row" data-label="Account">Corporate AMEX</td>
                  <td data-label="Due Date">03/01/2016</td>
                  <td data-label="Amount">$1,181</td>
                  <td data-label="Period">02/01/2016 - 02/29/2016</td>
                </tr>
                <tr>
                  <td scope="row" data-label="Acount">Visa - 3412</td>
                  <td data-label="Due Date">02/01/2016</td>
                  <td data-label="Amount">$842</td>
                  <td data-label="Period">01/01/2016 - 01/31/2016</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="card-row">
          <div class="card-table">
            <h1>Expected Business </h1>
            <table>
              <caption>Statement Summary</caption>
              <thead>
                <tr>
                  <th scope="col">Account</th>
                  <th scope="col">Due Date</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Period</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td data-label="Account">Visa - 3412</td>
                  <td data-label="Due Date">04/01/2016</td>
                  <td data-label="Amount">$1,190</td>
                  <td data-label="Period">03/01/2016 - 03/31/2016</td>
                </tr>
                <tr>
                  <td scope="row" data-label="Account">Visa - 6076</td>
                  <td data-label="Due Date">03/01/2016</td>
                  <td data-label="Amount">$2,443</td>
                  <td data-label="Period">02/01/2016 - 02/29/2016</td>
                </tr>
                <tr>
                  <td scope="row" data-label="Account">Corporate AMEX</td>
                  <td data-label="Due Date">03/01/2016</td>
                  <td data-label="Amount">$1,181</td>
                  <td data-label="Period">02/01/2016 - 02/29/2016</td>
                </tr>
                <tr>
                  <td scope="row" data-label="Acount">Visa - 3412</td>
                  <td data-label="Due Date">02/01/2016</td>
                  <td data-label="Amount">$842</td>
                  <td data-label="Period">01/01/2016 - 01/31/2016</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>`

            // Set the content to the View_Business_Details div
            document.getElementById('business-details-content').innerHTML = detailsContent;

            // Show the Business Details tab
            openCourse(event, 'View_Business_Details');
        }

        // Set the default open tab
        document.getElementById("defaultOpen").click();
    </script>
    <script>
        function openCourse(evt, thisName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(thisName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        document.getElementById("defaultOpen").click();
    </script>
</div>