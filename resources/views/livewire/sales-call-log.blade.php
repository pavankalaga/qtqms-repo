<div>
    <!-- <h2>Vertical Tabs</h2> -->
    <div class="contain-tabs">
    <div class="tab space-y-2 bg-gray-200 p-3 rounded-lg mt-2">
            <a class="nav-link p-2 rounded-lg text-nowrap ga-sidebar bg-white text-black ga-sidebar " id="v-pills-link1-tab" data-mdb-pill-init href="{{route('sales_call')}}" role="tab"
                aria-controls="v-pills-link1" aria-selected="true">Day Plan</a>
            <a class="nav-link active cc-businessinfo" id="v-pills-link2-tab" data-mdb-pill-init href="{{route('call-log')}}" role="tab"
                aria-controls="v-pills-link2" aria-selected="false">Call Log</a>
        </div>

        <div id="Uni1" x-show="activeTab === 'Uni1'" class="tabcontent">
            <div class="lg:p-3 pt-3">
                <!-- <h1 class="font-bold">Opportunity Details</h1> -->
               
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
                                    <th scope="col">Assign Date</th>
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
                                                {{ $report->assign_date ?? 'N/A' }}
                                            </td>
                                            <td>
                                                <button class="text-blue-500">
                                                    <i class="fa fa-eye"></i> <!-- View icon -->
                                                </button>
                                            </td>
                                            <td>
                                                <button class="text-green-500">
                                                    <i class="fa fa-edit"></i> <!-- Edit icon -->
                                                </button>
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

        .filter-btn {
            display: flex;
            justify-content: flex-end;
        }


        /* General styles */
        .tabcontent {
            padding: 20px;
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