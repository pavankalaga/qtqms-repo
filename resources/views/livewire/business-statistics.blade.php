<div>
    <div class="contain-tabs">
        <div class="tab space-y-2 bg-gray-200 p-3 rounded-lg mt-2">
            <a class="nnav-link p-2 rounded-lg text-nowrap ga-sidebar bg-white text-black ga-sidebar" id="v-pills-link1-tab" data-mdb-pill-init href="#businessinfo"
                role="tab" aria-controls="v-pills-link1" aria-selected="true">Business Info</a>
            <a class="nav-link p-2 rounded-lg text-nowrap ga-sidebar bg-white text-black ga-sidebar" id="v-pills-link2-tab" data-mdb-pill-init href="#contactdetails" role="tab"
                aria-controls="v-pills-link2" aria-selected="false">Contact Details</a>
            <a class="nav-link p-2 rounded-lg text-nowrap ga-sidebar bg-white text-black ga-sidebar" id="v-pills-link3-tab" data-mdb-pill-init href="#businessintelligence" role="tab"
                aria-controls="v-pills-link3" aria-selected="false">Business Intelligence
            </a>
            <a class="nav-link p-2 rounded-lg text-nowrap ga-sidebar bg-white text-black ga-sidebar" id="v-pills-link4-tab" data-mdb-pill-init href="#remarks" role="tab"
                aria-controls="v-pills-link4" aria-selected="false">Remarks
            </a>
            <a class="nav-link p-2 rounded-lg text-nowrap ga-sidebar bg-white text-black ga-sidebar" id="v-pills-link5-tab" data-mdb-pill-init href="{{route('sales_funnel')}}" role="tab"
                aria-controls="v-pills-link5" aria-selected="false">Sales Funnel</a>
            <a class="nav-link p-2 rounded-lg text-nowrap ga-sidebar bg-white text-black ga-sidebar" id="v-pills-link6-tab" data-mdb-pill-init href="{{route('opportunity')}}" role="tab"
                aria-controls="v-pills-link6" aria-selected="false">Call Logs</a>
            <a class="nav-link active cc-businessinfo text-sm" id="v-pills-link6-tab" data-mdb-pill-init href="#" role="tab"
                aria-controls="v-pills-link6" aria-selected="false">Business Statistics</a>
                
        </div>


        <div id="Uni7" class="tabcontent">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
                
                <h1 class="font-bold ">Leads List</h1>
            </div>
            <div class="flex flex-wrap space-x-4">
    <div class="flex-1">
        <input wire:model.debounce.300ms="searchExpectedBusiness"
            class="outline-none bg-[#F0F2F5] rounded-md py-2 px-3 border border-gray-300 transition duration-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full"
            placeholder="Expected Business" type="text" id="searchExpectedBusiness">
    </div>
    <div class="flex-1">
        <input wire:model.debounce.300ms="searchAgreedBusiness"
            class="outline-none bg-[#F0F2F5] rounded-md py-2 px-3 border border-gray-300 transition duration-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full"
            placeholder="Agreed Business" type="text" id="searchAgreedBusiness">
    </div>
    <div class="flex-1">
        <input wire:model.debounce.300ms="searchActualBusiness"
            class="outline-none bg-[#F0F2F5] rounded-md py-2 px-3 border border-gray-300 transition duration-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full"
            placeholder="Actual Business" type="text" id="searchActualBusiness">
    </div>
    <div class="flex-1">
        <input wire:model.debounce.300ms="searchVariation"
            class="outline-none bg-[#F0F2F5] rounded-md py-2 px-3 border border-gray-300 transition duration-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full"
            placeholder="Variation" type="text" id="searchVariation">
    </div>
</div>

            <div class="card-row">
                <div class="card-table">
                    <h1 class="ga-actual-head">Expected Business </h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Test</th>
                                <th scope="col">Qty/Day</th>
                                <th scope="col">L2L Price</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expectedBusinesses as $ex)
                                <tr>
                                    <td data-label="Test">{{ $ex->test_name }}</td>
                                    <td data-label="Qty/Day">{{ $ex->expected_qty_day }}</td>
                                    <td data-label="L2L Price">{{ $ex->expected_l2l_price }}</td>
                                    <td data-label="Amount">{{ $ex->amount }}</td>
                                    <td data-label="Total">{{ $ex->total }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-row">
                <div class="card-table">
                    <h1 class="ga-actual-head">Agreed Business </h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Test</th>
                                <th scope="col">Qty/Day</th>
                                <th scope="col">L2L Price</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agreedBusinesses as $ex)
                                <tr>
                                    <td data-label="Test">{{ $ex->test_name }}</td>
                                    <td data-label="Qty/Day">{{ $ex->expected_qty_day }}</td>
                                    <td data-label="L2L Price">{{ $ex->expected_l2l_price }}</td>
                                    <td data-label="Amount">{{ $ex->amount }}</td>
                                    <td data-label="Total">{{ $ex->total }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-row">
                <div class="card-table">
                    <h1 class="ga-actual-head">Actual Business </h1>
                    <table class="table">
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
                justify-content: center;
            }

            .tab button {
                background-color: inherit;
                color: black;
                padding: 12px;
                width: 100%;
                border: none;
                text-align: center;
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
                background-color: #2ea44f;
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
                line-height: 20px;
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

            .ga-actual-head {
                font-size: 18px;
                font-weight: 700;
                padding-bottom: 8px;
                line-height: 32px;
                color: #197619;
            }
            .ga-sidebar {
    font-size: 14px;
    font-weight: 400;
}
.card-table {
    background-color: #eee;
    padding: 20px;
    border-radius: 8px;
    flex: 1;
    text-align: center;
    height: 339px;
    justify-content: center;
    margin: 3px;
    margin-top: 26px;
}
        </style>

        <script>
            // Make sure the correct tab is shown when the page loads
            document.addEventListener('DOMContentLoaded', function () {
                // Set default tab to open
                const defaultTab = document.querySelector('.tab a.active');
                if (defaultTab) {
                    defaultTab.click();
                }

                // Add click event listeners to the tab links
                const tabLinks = document.querySelectorAll('.tab a');
                tabLinks.forEach(link => {
                    link.addEventListener('click', function (evt) {
                        // Remove active class from all links
                        tabLinks.forEach(l => l.classList.remove('active'));
                        // Add active class to the clicked link
                        this.classList.add('active');
                    });
                });
            });
        </script>
    </div>