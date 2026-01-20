@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hematology</title>
    </head>
    <style>
        .footer {
            margin-top: 20px;
            font-size: 12px;
        }

        .stock-planner-table {
            width: 100% !important;
            border-collapse: collapse !important;
            margin-top: 20px !important;
        }

        .stock-planner-table th,
        .stock-planner-table td {
            padding: 10px !important;
            text-align: left !important;
            border: 1px solid #ddd !important;
        }

        .stock-planner-table th {
            background-color: #007BFF !important;
            color: white !important;
        }

        .table th,
        td {
            border: 1px solid black !important;
            border-collapse: collapse !important;
        }

        .pc-header {
            background-color: #0078d7;
            color: white;
            padding: 10px;
            display: flex;
            align-items: center;
            font-size: 18px;
        }

        .pc-header-icon {
            margin-right: 10px;
        }

        .pc-content {
            display: flex;
            flex-wrap: wrap;
            padding: 20px;
            gap: 120px;
        }

        .pc-folder {
            text-decoration: none;
            transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out;
            text-align: center;
            padding: 6px 12px;
            border-radius: 10px;
            cursor: pointer;
        }

        .pc-folder:hover {
            transform: scale(1.2);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            background-color: #b3b3b3;

        }

        .pc-folder-icon {
            font-size: 120px;
            background: linear-gradient(to bottom, #1b3774, #028c4a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .pc-folder-label {
            display: block;
            margin-top: 5px;
            font-size: 14px;
            color: #333;
        }

        .pc-content {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            height: calc(100vh - 240px);
            padding: 10px;
            position: relative;
        }

        .pc-folder {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 180px;
            height: fit-content;
            padding: 18px;
            text-align: center;
            cursor: pointer;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: #f9f9f9;
            transition: 0.3s;
        }

        .pc-folder:hover {
            background: #e3f2fd;
        }

        .pc-folder-icon {
            /* font-size: 24px; */
            margin-bottom: 5px;
        }

        .inactive {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .active {
            display: block;
            position: relative;
            pointer-events: auto;
            transition: opacity 0.3s ease-in-out;
        }

        .hidden {
            display: none;
        }

        .animated-button {
            position: relative;
            animation-duration: 1s;
            /* Duration of the animation */
            animation-fill-mode: forwards;
            /* Ensure it stays in the final position */
        }

        @keyframes slide-left {
            0% {
                transform: translateX(0);
                /* Start position */
            }


            50% {
                transform: translateX(600px);
            }



            100% {
                transform: translateX(-200px);
                /* End position */
            }
        }

        .animated-button.animate {
            animation-name: slide-left;
            animation-timing-function: ease-in-out;
            /* Smooth animation */
        }


        /* Heading Container */
        .expandedHeading {
            background: #010046;
            /* Dark blue background */
            color: white;
            border-radius: 8px;
            /* Slightly rounded corners */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Subtle shadow */
            padding: 1rem;
            /* Internal spacing */
            overflow: hidden;
            /* Hide excess content */
            transition: all 1s ease;
            /* Smoother animation */
            display: flex;

        }



        /* Visible Content */
        .expandedHeadingVisible {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 5rem;
            width: 100%;
            /* Standard gap for spacing */
        }

        /* Typography */
        .doc-detail {
            font-size: 1rem;
            /* Medium weight for readability */
            margin: 0;
            /* Reset default margin */
            white-space: nowrap;
            /* Prevent wrapping */
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .expandedHeading {
                padding: 0.75rem;
                /* Adjust padding for smaller screens */
            }

            .doc-detail {
                font-size: 0.9rem;
                /* Slightly smaller text on smaller screens */
            }
        }
    </style>

    <body>
        <div class="main ">
            <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
                <div style="font-size: 20px;  ">Hematology </div>

            </div>
            <div class="icon-view">
                <div class="pc-content">
                    <div class="pc-folder" onclick="showSection('horiba-yumizen-h550-maintenance-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">HORIBA Yumizen H550 Maintenance log </span>
                    </div>
                    <div class="pc-folder" onclick="showSection('beckman-coulter-dxh560-maintenance-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Beckman Coulter DXH560 Maintenance Log </span>
                    </div>


                </div>
            </div>
        </div>


        <!-- Sections -->
        <div id="horiba-yumizen-h550-maintenance-log" class="main  inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/HEM/001</strong></label>
                    <label class="doc-detail">Doc Name: <strong>HORIBA Yumizen H550 Maintenance log </strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitMaintenanceLog1()">Submit</button>
                </div>
            </div>
            <!-- Back Button -->
            <div class="mt-3 mb-3 ">
                <button class="button" onclick="goBack(this)">
                    <svg class="svgIcon" viewBox="0 0 384 512">
                        <path
                            d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"
                            transform="rotate(-90, 192, 256)"></path>
                    </svg>
                </button>
            </div>

            <div class="row tableHeader">
                <div class="col-md-4">
                    <label>Month/Year: </label><input type="month" id="dateFilter" onclick="fetchMaintenanceLog()">
                </div>
                <div class="col-md-4">
                    <select id="instrumentId10" class="form-select" onclick="fetchMaintenanceLog()">
                        <option value="">Select Instrument</option>
                        @foreach($instruments as $instrument)
                            <option value="{{ $instrument->instrument_id }}">{{ $instrument->instrument_id }}
                                ({{ $instrument->name }})
                            </option>
                        @endforeach
                    </select>

                </div>
            </div>

            <div class="table-responsive mt-4">
                <table class="stock-planner-table" id="maintenancelogs">
                    <thead>
                        <tr>
                            <th>Date</th>

                            @for ($day = 1; $day <= 31; $day++)
                                <th>{{ $day }}</th>
                            @endfor
                        </tr>

                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="32" style="text-align: center !important;">Daily Maintenance</td>
                        </tr>
                        <tr>
                            <td>Cleaned Instrument</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="cleaned_instrument" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Empty Waste Container</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="empty_waste_container" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Check Printer & Paper Status</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="check_printe" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Check the Reagent levels in Analyzer Tab</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="check_the_reagent" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Reagent Inventory</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="reagent_inventory" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Start up (Pass/fail)</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="start_up_result" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Backflush LMNEB (Weekly)</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="backflush_LMNEB_weekly" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Backflush RBC/PLT (Weekly)</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="backflush_RBC_weekly" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Shutdown</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="shutdown" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Backflush RBC/PLT (Weekly)</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="backflush_PLT_weekly" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Performed By</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="performed_by" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Verified By</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="verified_by" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Concentrated Cleaning (Weekly or After 100 Samples)</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="concentrated_cleaning" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>


        <div id="beckman-coulter-dxh560-maintenance-log" class="main inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/HEM/002</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Beckman Coulter DXH560 Maintenance Log </strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitMaintenanceLog2()">Submit</button>
                </div>
            </div>
            <!-- Back Button -->
            <div class="mt-3 mb-3 ">
                <button class="button" onclick="goBack(this)">
                    <svg class="svgIcon" viewBox="0 0 384 512">
                        <path
                            d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"
                            transform="rotate(-90, 192, 256)"></path>
                    </svg>
                </button>
            </div>


            <div class="row tableHeader">
                <div class="col-md-4">
                    <label>Month/Year: </label><input type="month" id="dateFilter2" onchange="fetchMaintenanceLog2()">
                </div>
                <div class="col-md-4">
                    <select id="instrumentId2" class="form-select" onchange="fetchMaintenanceLog2()">
                        <option value="">Select Instrument</option>
                        @foreach($instruments as $instrument)
                            <option value="{{ $instrument->instrument_id }}">{{ $instrument->instrument_id }}
                                ({{ $instrument->name }})
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="table-responsive">
                <table class="stock-planner-table" id="beckmanmaintenancelogs">
                    <thead>
                        <tr>
                            <th>Date</th>
                            @for ($day = 1; $day <= 31; $day++)
                                <th>{{ $day }}</th>
                            @endfor
                        </tr>

                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="32" style="text-align: center !important;">Daily Maintenance</td>
                        </tr>
                        <tr>
                            <td>Cleaning of Baths</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="cleaning_of_baths" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Remove any dust on the machine, by dusting / pat drying the analyzer</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="remove_any_dust_on_the_machine" data-day="{{ $day }}">
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Staff Initial</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="staff_initial" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td colspan="32" style="text-align: center !important;">Weekly Maintenance</td>
                        </tr>
                        <tr>
                            <td>Rinsing of Baths</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="Rinsing_of_Baths" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Draining the Baths</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="Draining_the_Baths" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>

                        <tr>
                            <td>Flushing the aperture</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="Flushing_the_aperture" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Initial of the person who conducted the maintenance</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="Initial_of_the_person" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td colspan="32" style="text-align: center !important;">Monthly Maintenance</td>
                        </tr>
                        <tr>
                            <td>Depends on the usage cycles/day</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="Depends_on_the_usage_cycles/day" data-day="{{ $day }}">
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Bleaching cycle Performing (Use 5ml Bleach+5ml D/W, Filter and use)</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="Bleaching_cycle_Performing" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Technician Signature:</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="Technician_Signature" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>




    </body>
    <script>
        function showSection(sectionId) {


            // Add 'inactive' class to all main sections
            const sections = document.querySelectorAll('.main');
            sections.forEach(section => section.classList.add('inactive'));

            // Remove 'inactive' and add 'active' class to the selected section
            const selectedSection = document.getElementById(sectionId);
            selectedSection.classList.remove('inactive');
            selectedSection.classList.add('active');


        }

        function goBack() {
            // Hide all main sections by adding 'inactive' class
            const sections = document.querySelectorAll('.main');
            sections.forEach(section => {
                section.classList.remove('active');
                section.classList.add('inactive');
            });
            // Show the icon view
            document.querySelector('.icon-view').parentElement.classList.remove('inactive');
        }
    </script>
    <script type="text/javascript">
        // Initialize form with current month/year
        document.addEventListener('DOMContentLoaded', function () {
            const monthYearInput = document.getElementById('dateFilter');
            if (!monthYearInput.value) {
                const today = new Date();
                const year = today.getFullYear();
                const month = String(today.getMonth() + 1).padStart(2, '0');
                monthYearInput.value = `${year}-${month}`;
            }
        });

        function submitMaintenanceLog1() {
            // alert('hello');
            const monthYear = document.getElementById('dateFilter').value;
            const instrumentId = document.getElementById('instrumentId10').value;

            if (!monthYear || !instrumentId) {
                alert('Please select Month/Year and Instrument');
                return;
            }

            // Initialize data object with all possible tasks
            const data = {
                month_year: `${monthYear}-01`,
                instrument_id: instrumentId,
                tasks: {
                    cleaned_instrument: {},
                    empty_waste_container: {},
                    check_printe: {},
                    check_the_reagent: {},
                    reagent_inventory: {},
                    start_up_result: {},
                    backflush_LMNEB_weekly: {},
                    backflush_RBC_weekly: {},
                    shutdown: {},
                    backflush_PLT_weekly: {},
                    performed_by: {},
                    verified_by: {},
                    concentrated_cleaning: {},

                }
            };

            // Safely collect all task data
            document.querySelectorAll('[contenteditable="true"][data-task]').forEach(cell => {
                const task = cell.getAttribute('data-task');
                const day = cell.getAttribute('data-day');
                const value = cell.textContent.trim();

                // Only add if there's a value
                if (value) {
                    if (!data.tasks[task]) {
                        console.warn(`Unknown task: ${task}`);
                        return;
                    }
                    data.tasks[task][day] = value;
                }
            });

            // Send data to server
            fetch("/save-horiba-maintenance-log", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(data)
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        alert('Maintenance log saved successfully');
                    } else {
                        alert('Error: ' + (data.message || 'Failed to save data'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while saving data');
                });
        }
        function fetchMaintenanceLog() {
            const monthYear = document.getElementById('dateFilter').value;
            const instrumentId = document.getElementById('instrumentId10').value;

            if (!monthYear || !instrumentId) return;
            // alert('hello');

            fetch("/get-horiba-maintenance-log", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    month_year: `${monthYear}-01`,
                    instrument_id: instrumentId
                })
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success && data.data) {
                        // Clear all cells first
                        document.querySelectorAll('[contenteditable="true"]').forEach(cell => {
                            cell.textContent = '';
                        });

                        // Populate the table with fetched data
                        if (data.data.tasks) {
                            const tasks = JSON.parse(data.data.tasks);
                            for (const task in tasks) {
                                for (const day in tasks[task]) {
                                    const cell = document.querySelector(`[data-task="${task}"][data-day="${day}"]`);
                                    if (cell) {
                                        cell.textContent = tasks[task][day];
                                    }
                                }
                            }
                        }
                    } else if (data.success) {
                        // No data found - clear the table
                        document.querySelectorAll('[contenteditable="true"]').forEach(cell => {
                            cell.textContent = '';
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>


    <script type="text/javascript">
        // Initialize form with current month/year
        document.addEventListener('DOMContentLoaded', function () {
            const monthYearInput = document.getElementById('dateFilter2');
            if (!monthYearInput.value) {
                const today = new Date();
                const year = today.getFullYear();
                const month = String(today.getMonth() + 1).padStart(2, '0');
                monthYearInput.value = `${year}-${month}`;
            }
        });

        function submitMaintenanceLog2() {
            // alert('hello');
            const monthYear = document.getElementById('dateFilter2').value;
            const instrumentId = document.getElementById('instrumentId2').value;

            if (!monthYear || !instrumentId) {
                alert('Please select Month/Year and Instrument');
                return;
            }

            // Initialize data object with all possible tasks
            const data = {
                month_year: `${monthYear}-01`,
                instrument_id: instrumentId,
                tasks: {
                    cleaning_of_baths: {},
                    remove_any_dust_on_the_machine: {},
                    staff_initial: {},
                    Rinsing_of_Baths: {},
                    Draining_the_Baths: {},
                    Flushing_the_aperture: {},
                    Initial_of_the_person: {},
                    Depends_on_the_usage_cycles: {},
                    Bleaching_cycle_Performing: {},
                    Technician_Signature: {},


                }
            };

            // Safely collect all task data
            document.querySelectorAll('[contenteditable="true"][data-task]').forEach(cell => {
                const task = cell.getAttribute('data-task');
                const day = cell.getAttribute('data-day');
                const value = cell.textContent.trim();

                // Only add if there's a value
                if (value) {
                    if (!data.tasks[task]) {
                        console.warn(`Unknown task: ${task}`);
                        return;
                    }
                    data.tasks[task][day] = value;
                }
            });

            // Send data to server
            fetch("/save-horiba-beckman-maintenance-log", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(data)
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        alert('Maintenance log saved successfully');
                    } else {
                        alert('Error: ' + (data.message || 'Failed to save data'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while saving data');
                });
        }
        function fetchMaintenanceLog2() {
            const monthYear = document.getElementById('dateFilter2').value;
            const instrumentId = document.getElementById('instrumentId2').value;

            if (!monthYear || !instrumentId) return;
            // alert('hello');

            fetch("/get-horiba-beckman-maintenance-log", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    month_year: `${monthYear}-01`,
                    instrument_id: instrumentId
                })
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success && data.data) {
                        // Clear all cells first
                        document.querySelectorAll('[contenteditable="true"]').forEach(cell => {
                            cell.textContent = '';
                        });

                        // Populate the table with fetched data
                        if (data.data.tasks) {
                            const tasks = JSON.parse(data.data.tasks);
                            for (const task in tasks) {
                                for (const day in tasks[task]) {
                                    const cell = document.querySelector(`[data-task="${task}"][data-day="${day}"]`);
                                    if (cell) {
                                        cell.textContent = tasks[task][day];
                                    }
                                }
                            }
                        }
                    } else if (data.success) {
                        // No data found - clear the table
                        document.querySelectorAll('[contenteditable="true"]').forEach(cell => {
                            cell.textContent = '';
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>

    </html>


@endsection