@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mol-Bio</title>
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
                <div style="font-size: 20px; ">Mol-Bio </div>

            </div>
            <div class="icon-view">
                <div class="pc-content">
                    <div class="pc-folder" onclick="showSection('bio-safety-cabinet-maintenance-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Bio Safety Cabinet Maintenance Log </span>
                    </div>
                    <div class="pc-folder" onclick="showSection('cooling-centrifuge-maintenance-sheet')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Cooling Centrifuge Maintenance Sheet </span>
                    </div>


                </div>
            </div>

        </div>


        <!-- Sections -->
        <div id="bio-safety-cabinet-maintenance-log" class="main inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/MOL/001</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Bio Safety Cabinet Maintenance Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitBioSafetyLog()">Submit</button>
                </div>
            </div>

            <div class="mt-3 mb-3">
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
                    <label>Department: </label>
                    <input type="text" id="department1" name="department1" placeholder="Department" required>
                </div>
                <div class="col-md-4">
                    <label>Month/Year: </label>
                    <input type="month" id="monthYear1" name="month_year1" required>
                </div>
                <div class="col-md-4">
                    <label>Equipment Id/No.: </label>
                    <select id="cabinetId1" name="cabinet_id1" class="form-control" required>
                        <option value="">Select Equipment</option>
                        @foreach($instruments as $cabinet)
                            <option value="{{ $cabinet->id }}">{{ $cabinet->instrument_id }} - {{ $cabinet->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="table-responsive mt-4">
                <table class="stock-planner-table">
                    <thead>
                        <tr>
                            <th rowspan="3">Date</th>
                            <th rowspan="3">Clean with 70% Isopropyl Alcohol</th>
                            <th rowspan="3">UV Light 15 mins</th>
                            <th rowspan="3">Manometer Reading (10±1)</th>
                            <th rowspan="3">Done by Sign</th>
                            <th rowspan="3">Availability of 1% Hypo Container</th>
                            <th colspan="7" style="text-align: center !important;"> Weekly Maintenance</th>
                        </tr>
                        <tr>
                            <th rowspan="2">Test for Settle plate done date</th>
                            <th colspan="2">Results of Settle plate (colony count within range 0 to 5 CFU)</th>
                            <th rowspan="2">UV Efficacy</th>
                            <th rowspan="2">Checked by sign</th>
                            <th rowspan="2">Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($day = 1; $day <= 31; $day++)
                            <tr data-day="{{ $day }}">
                                <td>{{ $day }}</td>
                                <td><input type="checkbox" name="logs[{{ $day }}][clean_with_alcohol]" value="1"></td>
                                <td><input type="checkbox" name="logs[{{ $day }}][uv_light]" value="1"></td>
                                <td><input type="text" name="logs[{{ $day }}][manometer_reading]" class="form-control"></td>
                                <td><input type="text" name="logs[{{ $day }}][done_by_sign]" class="form-control"></td>
                                <td><input type="checkbox" name="logs[{{ $day }}][hypo_container_available]" value="1"></td>
                                <td><input type="date" name="logs[{{ $day }}][settle_plate_test_date]" class="form-control">
                                </td>
                                <td><input type="text" name="logs[{{ $day }}][settle_plate_results_1]" class="form-control">
                                </td>
                                <td><input type="text" name="logs[{{ $day }}][settle_plate_results_2]" class="form-control">
                                </td>
                                <td><input type="checkbox" name="logs[{{ $day }}][uv_efficacy]" value="1"></td>
                                <td><input type="text" name="logs[{{ $day }}][checked_by_sign]" class="form-control"></td>
                                <td><input type="text" name="logs[{{ $day }}][remarks]" class="form-control"></td>
                            </tr>
                        @endfor
                    </tbody>
                </table>

            </div>
        </div>



        <div id="cooling-centrifuge-maintenance-sheet" class="main inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/MOL/002</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Cooling Centrifuge Maintenance Sheet</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitCoolingMaintenanceLogNew()">Submit</button>
                </div>
            </div>

            <div class="mt-3 mb-3">
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
                    <label>Department: </label>
                    <input type="text" id="department4" placeholder="Department">
                </div>
                <div class="col-md-4">
                    <label>Month/Year: </label>
                    <input type="month" id="maintenance_month4" onchange="fetchCoolingMaintenanceLog()">
                </div>
                <div class="col-md-4">
                    <label>Centrifuge Id/No.: </label>
                    <select id="equipment_id4" class="form-control" onchange="fetchCoolingMaintenanceLog()">
                        <option value="">Select Equipment</option>
                        @foreach($instruments as $instrument)
                            <option value="{{ $instrument->instrument_id }}">
                                {{ $instrument->instrument_id }} - {{ $instrument->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="table-responsive">
                <table class="stock-planner-table" id="maintenanceTable">
                    <thead>
                        <tr class="section-title">
                            <th colspan="32" style="text-align: center !important;">Daily Maintenance</th>
                        </tr>
                        <tr>
                            <th>Day</th>
                            @for($i = 1; $i <= 31; $i++)
                                <th>{{ $i }}</th>
                            @endfor
                        </tr>
                    </thead>
                    <tbody id="Cooling-maintenance-logs1">

                    </tbody>
                    <thead>
                        <tr class="section-title">
                            <th colspan="32" style="text-align: center !important;">Monthly Maintenance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Bushes Checked</td>
                            <td colspan="11">Date Checked: <input type="date" id="bushes_checked_date" class="form-control">
                            </td>
                            <td colspan="6">Date Checked: <input type="date" id="bushes_checked_date_2"
                                    class="form-control"></td>
                            <td colspan="14">Next Due Date: <input type="date" id="next_due_date" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>Signature</td>
                            <td colspan="31">
                                <input type="text" id="monthly_signature" class="form-control"
                                    placeholder="Enter supervisor signature">
                            </td>
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


        // function bioSafetyLog() {
        //     alert("Form been Submitted!!");
        //     location.reload();
        // }
        // function coolingCentrifuge() {
        //     alert("Form Submitted!, Unknown ID");
        //     location.reload();

        // }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Set current month as default
            const currentDate = new Date();
            document.getElementById('monthYear1').value = currentDate.toISOString().slice(0, 7);

            // Load data when cabinet or month changes
            document.getElementById('cabinetId1').addEventListener('change', fetchMaintenanceData);
            document.getElementById('monthYear1').addEventListener('change', fetchMaintenanceData);
        });

        function fetchMaintenanceData() {
            const cabinetId = document.getElementById('cabinetId1').value;
            const monthYear = document.getElementById('monthYear1').value;

            if (!cabinetId || !monthYear) {
                return;
            }

            fetch(`/fetch-bio-safety-logs?month_year=${monthYear}&cabinet_id=${cabinetId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Clear all inputs first
                        clearForm();

                        if (data.department) {
                            document.getElementById('department1').value = data.department;
                        }

                        if (data.logs && data.logs.length > 0) {
                            data.logs.forEach(log => {
                                const day = new Date(log.log_date).getDate();
                                const row = document.querySelector(`tr[data-day="${day}"]`);

                                if (row) {
                                    row.querySelector(`input[name="logs[${day}][clean_with_alcohol]"]`).checked = log.clean_with_alcohol;
                                    row.querySelector(`input[name="logs[${day}][uv_light]"]`).checked = log.uv_light;
                                    row.querySelector(`input[name="logs[${day}][manometer_reading]"]`).value = log.manometer_reading || '';
                                    row.querySelector(`input[name="logs[${day}][done_by_sign]"]`).value = log.done_by_sign || '';
                                    row.querySelector(`input[name="logs[${day}][hypo_container_available]"]`).checked = log.hypo_container_available;
                                    row.querySelector(`input[name="logs[${day}][settle_plate_test_date]"]`).value = log.settle_plate_test_date || '';
                                    row.querySelector(`input[name="logs[${day}][uv_efficacy]"]`).checked = log.uv_efficacy;
                                    row.querySelector(`input[name="logs[${day}][checked_by_sign]"]`).value = log.checked_by_sign || '';
                                    row.querySelector(`input[name="logs[${day}][remarks]"]`).value = log.remarks || '';

                                    // Handle settle plate results (split if needed)
                                    if (log.settle_plate_results) {
                                        const results = log.settle_plate_results.split('/');
                                        row.querySelector(`input[name="logs[${day}][settle_plate_results_1]"]`).value = results[0] || '';
                                        if (results.length > 1) {
                                            row.querySelector(`input[name="logs[${day}][settle_plate_results_2]"]`).value = results[1] || '';
                                        }
                                    }
                                }
                            });
                        }
                    } else {
                        console.error('Error:', data.message);
                        alert('Error fetching data: ' + (data.message || 'Unknown error'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error fetching data');
                });
        }

        function clearForm() {
            document.getElementById('department1').value = '';

            document.querySelectorAll('#maintenanceTable input').forEach(input => {
                if (input.type === 'checkbox') {
                    input.checked = false;
                } else {
                    input.value = '';
                }
            });
        }

        function submitBioSafetyLog() {
            const formData = {
                department: document.getElementById('department1').value,
                month_year: document.getElementById('monthYear1').value,
                cabinet_id: document.getElementById('cabinetId1').value,
                logs: []
            };

            // Collect data for each day
            for (let day = 1; day <= 31; day++) {
                const row = document.querySelector(`tr[data-day="${day}"]`);
                if (!row) continue;

                const logData = {
                    date: `${formData.month_year}-${day.toString().padStart(2, '0')}`,
                    clean_with_alcohol: row.querySelector(`input[name="logs[${day}][clean_with_alcohol]"]`).checked,
                    uv_light: row.querySelector(`input[name="logs[${day}][uv_light]"]`).checked,
                    manometer_reading: row.querySelector(`input[name="logs[${day}][manometer_reading]"]`).value,
                    done_by_sign: row.querySelector(`input[name="logs[${day}][done_by_sign]"]`).value,
                    hypo_container_available: row.querySelector(`input[name="logs[${day}][hypo_container_available]"]`).checked,
                    settle_plate_test_date: row.querySelector(`input[name="logs[${day}][settle_plate_test_date]"]`).value,
                    settle_plate_results: [
                        row.querySelector(`input[name="logs[${day}][settle_plate_results_1]"]`).value,
                        row.querySelector(`input[name="logs[${day}][settle_plate_results_2]"]`).value
                    ].filter(Boolean).join('/'),
                    uv_efficacy: row.querySelector(`input[name="logs[${day}][uv_efficacy]"]`).checked,
                    checked_by_sign: row.querySelector(`input[name="logs[${day}][checked_by_sign]"]`).value,
                    remarks: row.querySelector(`input[name="logs[${day}][remarks]"]`).value,
                };

                formData.logs.push(logData);
            }

            fetch('/bio-safety-log', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(formData)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Maintenance logs saved successfully!');
                    } else {
                        let errorMessage = 'Failed to save data';
                        if (data.errors) {
                            errorMessage += ': ' + Object.values(data.errors).join(', ');
                        } else if (data.message) {
                            errorMessage += ': ' + data.message;
                        }
                        alert(errorMessage);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while saving the data.');
                });
        }



    </script>
    <!-- <script>
                                                                                    document.addEventListener('DOMContentLoaded', function () {
                                                                                        // Set current month as default
                                                                                        const currentDate = new Date();
                                                                                        document.getElementById('monthYear').value = currentDate.toISOString().slice(0, 7);

                                                                                        // Load data when centrifuge or month changes
                                                                                        document.getElementById('centrifugeId').addEventListener('change', fetchMaintenanceData);
                                                                                        document.getElementById('monthYear').addEventListener('change', fetchMaintenanceData);

                                                                                        // Initialize with empty data
                                                                                        initializeEmptyData();
                                                                                    });

                                                                                    function initializeEmptyData() {
                                                                                        // Clear all inputs
                                                                                        document.querySelectorAll('#maintenanceTable input[type="text"]').forEach(input => {
                                                                                            input.value = '';
                                                                                        });

                                                                                        document.querySelector('input[name="bushes_checked_date"]').value = '';
                                                                                        document.querySelector('input[name="next_due_date"]').value = '';
                                                                                        document.querySelector('input[name="monthly_signature"]').value = '';
                                                                                    }

                                                                                    function fetchMaintenanceData() {
                                                                                        const centrifugeId = document.getElementById('centrifugeId').value;
                                                                                        const monthYear = document.getElementById('monthYear').value;

                                                                                        if (!centrifugeId || !monthYear) {
                                                                                            return;
                                                                                        }

                                                                                        fetch(`/cooling-centrifuge-maintenance/fetch?month_year=${monthYear}&centrifuge_id=${centrifugeId}`)
                                                                                            .then(response => response.json())
                                                                                            .then(data => {
                                                                                                if (data.success) {
                                                                                                    if (data.data) {
                                                                                                        populateForm(data.data);
                                                                                                    } else {
                                                                                                        initializeEmptyData();
                                                                                                    }
                                                                                                } else {
                                                                                                    console.error('Error:', data.message);
                                                                                                    alert('Error fetching data: ' + (data.message || 'Unknown error'));
                                                                                                }
                                                                                            })
                                                                                            .catch(error => {
                                                                                                console.error('Error:', error);
                                                                                                alert('Error fetching data');
                                                                                            });
                                                                                    }

                                                                                    function populateForm(logData) {
                                                                                        // Set basic fields
                                                                                        document.getElementById('department').value = logData.department || '';

                                                                                        // Set daily maintenance data
                                                                                        const dailyMaintenance = logData.daily_maintenance || {};

                                                                                        if (dailyMaintenance.buckets_cleaned) {
                                                                                            dailyMaintenance.buckets_cleaned.forEach((value, index) => {
                                                                                                document.querySelectorAll('input[name="buckets_cleaned[]"]')[index].value = value || '';
                                                                                            });
                                                                                        }

                                                                                        if (dailyMaintenance.power_cord) {
                                                                                            dailyMaintenance.power_cord.forEach((value, index) => {
                                                                                                document.querySelectorAll('input[name="power_cord[]"]')[index].value = value || '';
                                                                                            });
                                                                                        }

                                                                                        if (dailyMaintenance.dusting) {
                                                                                            dailyMaintenance.dusting.forEach((value, index) => {
                                                                                                document.querySelectorAll('input[name="dusting[]"]')[index].value = value || '';
                                                                                            });
                                                                                        }

                                                                                        if (dailyMaintenance.signature) {
                                                                                            dailyMaintenance.signature.forEach((value, index) => {
                                                                                                document.querySelectorAll('input[name="signature[]"]')[index].value = value || '';
                                                                                            });
                                                                                        }

                                                                                        // Set monthly maintenance data
                                                                                        document.querySelector('input[name="bushes_checked_date"]').value = logData.bushes_checked_date || '';
                                                                                        document.querySelector('input[name="next_due_date"]').value = logData.next_due_date || '';

                                                                                        // Set monthly signature (only first day is editable)
                                                                                        const monthlySignatureInputs = document.querySelectorAll('input[name="monthly_signature[]"]');
                                                                                        if (monthlySignatureInputs.length > 0) {
                                                                                            monthlySignatureInputs[0].value = logData.monthly_signature || '';
                                                                                        }
                                                                                    }

                                                                                    function submitCoolingCentrifugeForm() {
                                                                                        const formData = {
                                                                                            department: document.getElementById('department').value,
                                                                                            month_year: document.getElementById('monthYear').value,
                                                                                            centrifuge_id: document.getElementById('centrifugeId').value,
                                                                                            bushes_checked_date: document.querySelector('input[name="bushes_checked_date"]').value,
                                                                                            next_due_date: document.querySelector('input[name="next_due_date"]').value,
                                                                                            monthly_signature: document.querySelector('input[name="monthly_signature[]"]').value,
                                                                                            buckets_cleaned: Array.from(document.querySelectorAll('input[name="buckets_cleaned[]"]')).map(input => input.value),
                                                                                            power_cord: Array.from(document.querySelectorAll('input[name="power_cord[]"]')).map(input => input.value),
                                                                                            dusting: Array.from(document.querySelectorAll('input[name="dusting[]"]')).map(input => input.value),
                                                                                            signature: Array.from(document.querySelectorAll('input[name="signature[]"]')).map(input => input.value),
                                                                                        };

                                                                                        fetch('/cooling-centrifuge-maintenance/store', {
                                                                                            method: 'POST',
                                                                                            headers: {
                                                                                                'Content-Type': 'application/json',
                                                                                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                                                                            },
                                                                                            body: JSON.stringify(formData)
                                                                                        })
                                                                                            .then(response => response.json())
                                                                                            .then(data => {
                                                                                                if (data.success) {
                                                                                                    alert('Maintenance log saved successfully!');
                                                                                                } else {
                                                                                                    let errorMessage = 'Failed to save data';
                                                                                                    if (data.errors) {
                                                                                                        errorMessage += ': ' + Object.values(data.errors).join(', ');
                                                                                                    } else if (data.message) {
                                                                                                        errorMessage += ': ' + data.message;
                                                                                                    }
                                                                                                    alert(errorMessage);
                                                                                                }
                                                                                            })
                                                                                            .catch(error => {
                                                                                                console.error('Error:', error);
                                                                                                alert('An error occurred while saving the data.');
                                                                                            });
                                                                                    }

                                                                                    function goBack() {
                                                                                        window.history.back();
                                                                                    }
                                                                                </script> -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            initializeCoolingMaintenanceTable();
        });

        // Initialize table
        function initializeCoolingMaintenanceTable() {
            const tasks = [
                "Buckets Cleaned",
                "Power Cord",
                "Dusting",
                "Signature",
            ];

            const tbody = document.querySelector('#Cooling-maintenance-logs1');
            tbody.innerHTML = '';

            tasks.forEach(task => {
                const row = document.createElement('tr');
                const taskCell = document.createElement('td');
                taskCell.textContent = task;
                row.appendChild(taskCell);

                for (let i = 1; i <= 31; i++) {
                    const dayCell = document.createElement('td');
                    dayCell.setAttribute('contenteditable', 'true');
                    dayCell.setAttribute('data-day', i);
                    row.appendChild(dayCell);
                }

                tbody.appendChild(row);
            });
        }

        // Fetch data
        function fetchCoolingMaintenanceLog() {
            const monthInput = document.getElementById('maintenance_month4');
            const equipmentSelect = document.getElementById('equipment_id4');
            const equipmentId = equipmentSelect.value;

            if (!monthInput.value || !equipmentId) return;

            const tbody = document.querySelector('#Cooling-maintenance-logs1');
            tbody.innerHTML = '<tr><td colspan="32">Loading...</td></tr>';

            fetch(`/cooling-centrifuge-maintenance/fetch?month=${monthInput.value}&equipment_id=${equipmentId}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            })
                .then(handleResponse)
                .then(data => {
                    if (data.success) {
                        if (data.data.length > 0) {
                            populateCoolingMaintenanceTable(data.data);
                            const firstLog = data.data[0];
                            document.getElementById('department4').value = firstLog.department || '';
                            document.getElementById('bushes_checked_date').value = firstLog.bushes_checked_date || '';
                            document.getElementById('bushes_checked_date_2').value = firstLog.bushes_checked_date_2 || '';
                            document.getElementById('next_due_date').value = firstLog.next_due_date || '';

                            // Set monthly signature (single field now)
                            document.getElementById('monthly_signature').value =
                                firstLog.monthly_signatures && firstLog.monthly_signatures.length > 0
                                    ? firstLog.monthly_signatures[0]
                                    : '';
                        } else {
                            initializeCoolingMaintenanceTable();
                        }
                    }
                })
        }

        function handleResponse(response) {
            if (!response.ok) {
                return response.json().then(err => { throw new Error(err.message || 'Request failed'); });
            }
            return response.json();
        }

        // Populate table with data
        function populateCoolingMaintenanceTable(logs) {
            const tbody = document.querySelector('#Cooling-maintenance-logs1');
            tbody.innerHTML = '';

            const taskMap = new Map();
            logs.forEach(log => {
                if (!taskMap.has(log.task)) {
                    taskMap.set(log.task, {});
                }
                Object.entries(log.days_data || {}).forEach(([day, value]) => {
                    if (value) taskMap.get(log.task)[day] = value;
                });
            });

            taskMap.forEach((daysData, task) => {
                const row = document.createElement('tr');
                row.innerHTML = `<td>${task}</td>`;

                for (let day = 1; day <= 31; day++) {
                    const dayCell = document.createElement('td');
                    dayCell.setAttribute('contenteditable', 'true');
                    dayCell.setAttribute('data-day', day);
                    dayCell.textContent = daysData[`day_${day}`] || '';
                    row.appendChild(dayCell);
                }

                tbody.appendChild(row);
            });
        }

        // Submit data
        function submitCoolingMaintenanceLogNew() {
            const monthInput = document.getElementById('maintenance_month4');
            const equipmentSelect = document.getElementById('equipment_id4');
            const departmentInput = document.getElementById('department4');

            const monthYear = monthInput.value;
            const equipmentId = equipmentSelect.value;
            const department = departmentInput.value;

            if (!monthYear || !equipmentId || !department) {
                alert('Please fill all required fields');
                return;
            }

            // Collect daily maintenance data
            const dailyLogs = [];
            document.querySelectorAll('#Cooling-maintenance-logs1 tr').forEach(row => {
                const task = row.cells[0].textContent.trim();
                const daysData = {};

                for (let i = 1; i <= 31; i++) {
                    const value = row.cells[i].textContent.trim();
                    if (value) daysData[`day_${i}`] = value;
                }

                if (Object.keys(daysData).length > 0) {
                    dailyLogs.push({ task, days_data: daysData });
                }
            });

            // Collect monthly maintenance data
            const monthlySignatures = [];
            document.querySelectorAll('input[name="monthly_signature[]"]').forEach(input => {
                monthlySignatures.push(input.value.trim());
            });

            const payload = {
                month_year: monthYear,
                equipment_id: equipmentId,
                department: department,
                logs: dailyLogs,
                bushes_checked_date: document.getElementById('bushes_checked_date').value,
                bushes_checked_date_2: document.getElementById('bushes_checked_date_2').value,
                next_due_date: document.getElementById('next_due_date').value,
                monthly_signatures: [document.getElementById('monthly_signature').value.trim()]
            };

            const submitBtn = document.querySelector('button[onclick="submitCoolingMaintenanceLogNew()"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch('/cooling-centrifuge-maintenance/store', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(payload)
            })
                .then(handleResponse)
                .then(data => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                    if (data.success) {
                        alert('Data saved successfully!');
                        fetchCoolingMaintenanceLog();
                    }
                })
                .catch(error => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                    console.error('Error:', error);
                    alert('Error: ' + error.message);
                });
        }
    </script>

    </html>


@endsection