<div>
    <!-- <h2>Vertical Tabs</h2> -->
    <div class="contain-tabs">
        <div class="tab bg-gray-200 p-3 rounded-lg mt-2 space-y-2">
        <a
        class="nav-link active  p-2 rounded-lg text-nowrap ga-sidebar bg-white text-black ga-sidebar"
        id="v-pills-link1-tab"
        data-mdb-pill-init
        href="#businessinfo"
        role="tab"
        aria-controls="v-pills-link1"
        aria-selected="true"
        >Business Info</a
      >
      <a
        class="nav-link p-2 rounded-lg text-nowrap ga-sidebar bg-white text-black ga-sidebar"
        id="v-pills-link2-tab"
        data-mdb-pill-init
        href="#contactdetails"
        role="tab"
        aria-controls="v-pills-link2"
        aria-selected="false"
        >Contact Details</a
      >
      <a
        class="nav-link p-2 rounded-lg text-nowrap ga-sidebar bg-white text-black ga-sidebar"
        id="v-pills-link3-tab"
        data-mdb-pill-init
        href="#businessinteligence"
        role="tab"
        aria-controls="v-pills-link3"
        aria-selected="false"
        >Business Intelligence        </a
      >
      <a
        class="nav-link p-2 rounded-lg text-nowrap ga-sidebar bg-white text-black ga-sidebar"
        id="v-pills-link4-tab"
        data-mdb-pill-init
        href="#remarks"
        role="tab"
        aria-controls="v-pills-link4"
        aria-selected="false"
        >Remarks        </a
      >
      <a
        class="nav-link p-2 rounded-lg text-nowrap ga-sidebar bg-white text-black ga-sidebar"
        id="v-pills-link5-tab"
        data-mdb-pill-init
        href="sales_funnel"
        role="tab"
        aria-controls="v-pills-link5"
        aria-selected="false"
        >Sales Funnel</a
      >
      <a
        class="nav-link cc-businessinfo"
        id="v-pills-link6-tab"
        data-mdb-pill-init
        href="opportunity"
        role="tab"
        aria-controls="v-pills-link6"
        aria-selected="false"
        >Call Logs</a
      >
        </div>

        <!-- Add content for other tabs -->
        <div id="Uni2" class="tabcontent">
          <div class="flex justify-between items-center">
        <h1 class="text-lg font-bold">Call logs </h1>
            <div x-data="{ open: false }" class="relative">
                <!-- Button to open modal -->
                <div class="filter-btn">
                    <button @click="open = true" class=" text-white px-4 py-2 rounded" style="background-color: #0c9207;">Add call
                        log</button>
                </div>

                <!-- Modal background -->
                <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                    <!-- Modal container -->
                    <div class="bg-white px-4 py-4 rounded-lg shadow-lg w-1/2">
                        <!-- Modal content -->
                        <div class="text-right">
                            <!-- Close button -->
                            <button @click="open = false"
                                class="text-gray-500 hover:text-red-500 text-xl">&times;</button>
                        </div>
                        <form wire:submit.prevent="saveCallLogs">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="check_in" class="col-form-label">Check In</label>
                                    <input type="datetime-local" class="form-control small-placeholder" id="check_in"
                                        wire:model="check_in" required>
                                    @error('check_in') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="check_out" class="col-form-label">Check Out</label>
                                    <input type="datetime-local" class="form-control small-placeholder" id="check_out"
                                        wire:model="check_out" required>
                                    @error('check_out') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="follow_up_start" class="col-form-label">Follow Up Start Date</label>
                                    <input type="datetime-local" class="form-control small-placeholder" id="follow_up_start"
                                        wire:model="follow_up_start" required>
                                    @error('follow_up_start') <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="call_log_remarks" class="col-form-label">Remarks</label>
                                    <input type="text" class="form-control small-placeholder" id="call_log_remarks"
                                        wire:model="call_log_remarks" required>
                                    @error('call_log_remarks') <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                           
                            <div class="flex justify-end mt-4">
                                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded mr-2"
                                    @click="openModal = false">Close</button>
                                <button type="submit" class="text-white px-4 py-2 rounded" style="background-color: #0c9207;">Save</button>
                            </div>

                            @if (session()->has('message'))
                                <div class="alert alert-success mt-3">
                                    {{ session('message') }}
                                </div>
                            @endif
                        </form>

                    </div>
                </div>
            </div>
            </div>

            <div class="card-row">
                @if ($call_logs->count() > 0)
                @foreach($call_logs as $call_log)
                    <div class="card card-1">
                        <div class="date-info">
                            <span class="check-in">Check In : {{$call_log->check_in}}</span>
                            <span class="check-out">Check Out :{{$call_log->check_out}}</span>
                        </div>
                        <div class="date-info">
                            <span class="get-in">Follow From date : {{$call_log->follow_up_start}}</span>
                            <!-- <span class="get-out">Follow To date :{{$call_log->follow_up_end}}</span> -->
                            <span class="get-in">Remarks : {{$call_log->call_log_remarks}}</span>
                        </div>
                        <div class="date-info">
                        </div>
                    </div>
                @endforeach

                @else
                    <tr>
                        <td> No Data Found </td>
                    </tr>
                @endif
                
                <div class="text-center">
                    {{$call_logs->links()}}
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
      background-color: white;
    color: black;
    padding: 10px;
    width: 100%;
    border-radius: 8px;
    border: none;
    text-align: left;
    cursor: pointer;
    transition: 0.3s;
    font-size: 14px;
    margin-bottom: 10px;
    text-decoration: none;
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
      text-align: left;
    }

    /* Text styles for Get In/Get Out */
    .action-info {
      display: flex;
      justify-content: space-between;
    }
    .card-table{
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
    line-height: 32px;
}
    </style>

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