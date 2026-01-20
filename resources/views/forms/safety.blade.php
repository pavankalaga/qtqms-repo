@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Safety</title>
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
            text-align: center !important;
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



        .safety_forms form {

            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .safety_forms label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        .safety_forms input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;

            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .safety_forms button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;

            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }

        .safety_forms button:hover {
            background-color: #0056b3;
        }

        .safety_forms textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;

            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            resize: vertical;
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
                <div style="font-size: 20px;  ">Safety</div>
            </div>
            <div class="icon-view">
                <div class="pc-content">
                    <div class="pc-folder" onclick="showSection('needle-stick-injury')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label"> Needle Stick Injury </span>
                    </div>
                    <div class="pc-folder" onclick="showSection('accident-incident-reporting-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label"> Accident-Incident Reporting Log </span>
                    </div>
                    <div class="pc-folder" onclick="showSection('vaccination-monitoring-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Vaccination Monitoring Log</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('biomedical-waste-monitoring-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Biomedical Waste Monitoring Log</span>
                    </div>

                </div>
            </div>
        </div>


        <!-- Sections -->
        <div id="needle-stick-injury" class="main  inactive">


            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/SAF/001</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Needle Stick Injury </strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning">Submit</button>
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







            <div class="table-responsive mt-4 safety_forms">
                <form action="{{ route('needle.stick.injury') }}" method="post">
                    @csrf
                    <label for="name">Name of Person:</label>
                    <input type="text" id="name" name="name" required><br><br>

                    <label for="date_time">Date & Time of Exposure:</label>
                    <input type="datetime-local" id="date_time" name="date_time" required><br><br>

                    <label for="sequencing">Sequencing of Events Leading to Exposure:</label>
                    <textarea id="sequencing" name="sequencing" rows="4" cols="50" required></textarea><br><br>

                    <label for="details_exposure">Details of Exposure:</label>
                    <textarea id="details_exposure" name="details_exposure" rows="4" cols="50" required></textarea><br><br>

                    <label for="counseling">Details of Counseling and Post-Exposure Management:</label>
                    <textarea id="counseling" name="counseling" rows="4" cols="50" required></textarea><br><br>

                    <label for="source_info">Information About the Source Person:</label>
                    <textarea id="source_info" name="source_info" rows="4" cols="50" required></textarea><br><br>

                    <label for="prevention_steps">Steps Taken to Prevent the Recurrence of Such an Accident:</label>
                    <textarea id="prevention_steps" name="prevention_steps" rows="4" cols="50" required></textarea><br><br>

                    <button type="submit">Submit</button>
                </form>
            </div>

        </div>


        <div id="accident-incident-reporting-log" class="main inactive">
            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/SAF/002</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Accident-Incident Reporting Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitAccidentIncidentForm()">Submit</button>
                </div>
            </div>
            <!-- Back Button -->
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
                    <label>Month/Year: </label>
                    <input type="month" id="month_year" onchange="fetchAccidentIncidentReports()">
                </div>
                <div class="col-md-4">
                    <label>Total Records: <span id="record-count">0</span></label>
                </div>
            </div>
            <div class="table-responsive">
                <form id="accident-incident-form">
                    <table class="stock-planner-table">
                        <thead>
                            <tr>
                                <th>Date & Time</th>
                                <th>Person Involved</th>
                                <th>Injuries Sustained</th>
                                <th>Emergency First-Aid Given</th>
                                <th>First-Aid Given By</th>
                                <th>Follow-Up Action</th>
                                <th>Preventive Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Rows will be added dynamically -->
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary m-1" onclick="addAccidentIncidentRow()">+ Add Row</button>
                </form>
            </div>
        </div>


        <div id="vaccination-monitoring-log" class="main inactive">
            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/SAF/003</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Vaccination Monitoring Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning"
                        onclick="submitVaccinationMonitoringForm()">Submit</button>
                </div>
            </div>

            <!-- Back Button -->
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
                    <label>Hepatitis Vaccine Lot No: </label>
                    <input type="text" id="hepatitis_lot_no" placeholder="Hepatitis Vaccine Lot No">
                </div>
                <div class="col-md-4">
                    <label>Tetanus Vaccine Lot No:</label>
                    <input type="text" id="tetanus_lot_no" placeholder="Tetanus Vaccine Lot No">
                </div>
                <div class="col-md-4">
                    <label>Expiry Date: </label>
                    <input type="date" id="expiry_date" onchange="fetchVaccinationMonitoringData()">
                </div>
                <div class="col-md-4">
                    <label>Total Records: <span id="vaccination-record-count">0</span></label>
                </div>
            </div>

            <div class="table-responsive">
                <form id="vaccination-monitoring-form">
                    <table class="stock-planner-table">
                        <thead>
                            <tr>
                                <th>Name of the Employee</th>
                                <th>Hepatitis B Dose 1 (Date)</th>
                                <th>Signature</th>
                                <th>Hepatitis B Dose 2 (Date)</th>
                                <th>Signature</th>
                                <th>Hepatitis B Dose 3 (Date)</th>
                                <th>Signature</th>
                                <th>Hepatitis B Booster Dose (Date)</th>
                                <th>Signature</th>
                                <th>Titre Results</th>
                                <th>Tetanus Booster (Date)</th>
                                <th>Signature</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Rows will be added dynamically -->
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary m-1" onclick="addVaccinationMonitoringRow()">+ Add
                        Row</button>
                </form>
            </div>
        </div>

        <div id="biomedical-waste-monitoring-log" class="main inactive">
            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/SAF/004</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Biomedical Waste Monitoring Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitBiomedicalWasteForm()">Submit</button>
                </div>
            </div>

            <!-- Back Button -->
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
                    <label>Month/Year: </label>
                    <input type="month" id="month_year2" onchange="fetchBiomedicalWasteData()">
                </div>
                <div class="col-md-4">
                    <label>Biomedical Waste Agency Name: </label>
                    <input type="text" id="agency_name" placeholder="Biomedical Waste Agency Name">
                </div>
                <div class="col-md-4">
                    <label>Total Records: <span id="biomedical-record-count">0</span></label>
                </div>
            </div>

            <div class="table-responsive">
                <form id="biomedical-waste-form">
                    <table class="stock-planner-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Red Colour</th>
                                <th>Weight (Approx)</th>
                                <th>Yellow Colour</th>
                                <th>Weight (Approx)</th>
                                <th>Blue Colour</th>
                                <th>Weight (Approx)</th>
                                <th>Sharp Container</th>
                                <th>Weight (Approx)</th>
                                <th>House Keeping Staff Signature</th>
                                <th>BMW Handler Signature</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Rows will be added dynamically -->
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary m-1" onclick="addBiomedicalWasteRow()">+ Add Row</button>
                </form>
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



        // // Handle Needle Stick Injury Form Submission
        // document.getElementById('needle-stick-injury-form').addEventListener('submit', function (e) {
        //     e.preventDefault();
        //     const formData = new FormData(this);

        //     fetch('/submit-needle-stick-injury', {
        //         method: 'POST',
        //         body: formData,
        //         headers: {
        //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        //         },
        //     })
        //         .then(response => response.json())
        //         .then(data => {
        //             alert(data.message);
        //         })
        //         .catch(error => {
        //             console.error('Error:', error);
        //         });
        // });

        // // Handle Accident-Incident Reporting Log Form Submission
        // document.getElementById('accident-incident-form').addEventListener('submit', function (e) {
        //     e.preventDefault();
        //     const formData = new FormData(this);

        //     fetch('/submit-accident-incident-report', {
        //         method: 'POST',
        //         body: formData,
        //         headers: {
        //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        //         },
        //     })
        //         .then(response => response.json())
        //         .then(data => {
        //             alert(data.message);
        //         })
        //         .catch(error => {
        //             console.error('Error:', error);
        //         });
        // });

        // // Handle Vaccination Monitoring Log Form Submission
        // document.getElementById('vaccination-monitoring-form').addEventListener('submit', function (e) {
        //     e.preventDefault();
        //     const formData = new FormData(this);

        //     fetch('/submit-vaccination-monitoring-log', {
        //         method: 'POST',
        //         body: formData,
        //         headers: {
        //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        //         },
        //     })
        //         .then(response => response.json())
        //         .then(data => {
        //             alert(data.message);
        //         })
        //         .catch(error => {
        //             console.error('Error:', error);
        //         });
        // });

        // // Handle Biomedical Waste Monitoring Log Form Submission
        // document.getElementById('biomedical-waste-form').addEventListener('submit', function (e) {
        //     e.preventDefault();
        //     const formData = new FormData(this);

        //     fetch('/submit-biomedical-waste-log', {
        //         method: 'POST',
        //         body: formData,
        //         headers: {
        //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        //         },
        //     })
        //         .then(response => response.json())
        //         .then(data => {
        //             alert(data.message);
        //         })
        //         .catch(error => {
        //             console.error('Error:', error);
        //         });
        // });







        //------------------
        // Initialize table on page load
        document.addEventListener('DOMContentLoaded', function () {
            // Start with one empty row
            addAccidentIncidentRow();
            updateRecordCount();
        });

        // Fetch reports when month/year is selected
        function fetchAccidentIncidentReports() {
            const monthYearInput = document.getElementById('month_year');
            const tbody = document.querySelector('#accident-incident-form tbody');

            if (!monthYearInput.value) {
                // Clear table if no month selected
                tbody.innerHTML = '';
                addAccidentIncidentRow();
                updateRecordCount();
                return;
            }

            // Show loading state
            tbody.innerHTML = '<tr><td colspan="7" class="text-center">Loading data...</td></tr>';

            fetch(`/get-accident-incident-reports?month_year=${monthYearInput.value}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        populateAccidentIncidentTable(data.data);
                    } else {
                        throw new Error(data.message || 'Failed to fetch data');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    tbody.innerHTML = '';
                    addAccidentIncidentRow();
                    alert('Error loading reports: ' + error.message);
                    updateRecordCount();
                });
        }

        // Populate table with data
        function populateAccidentIncidentTable(reports) {
            const tbody = document.querySelector('#accident-incident-form tbody');
            tbody.innerHTML = '';

            if (reports.length === 0) {
                addAccidentIncidentRow();
                return;
            }

            reports.forEach(report => {
                const row = document.createElement('tr');
                const dateTime = new Date(report.date_time);

                // Format date for datetime-local input (removes seconds/ms)
                const formattedDateTime = dateTime.toISOString().slice(0, 16);

                row.innerHTML = `
                                                                                    <td><input type="datetime-local" name="date_time[]" value="${formattedDateTime}" required></td>
                                                                                    <td><input type="text" name="person_involved[]" value="${escapeHtml(report.person_involved || '')}" required></td>
                                                                                    <td><input type="text" name="injuries_sustained[]" value="${escapeHtml(report.injuries_sustained || '')}" required></td>
                                                                                    <td><input type="text" name="emergency_first_aid[]" value="${escapeHtml(report.emergency_first_aid || '')}" required></td>
                                                                                    <td><input type="text" name="first_aid_by[]" value="${escapeHtml(report.first_aid_by || '')}" required></td>
                                                                                    <td><input type="text" name="follow_up_action[]" value="${escapeHtml(report.follow_up_action || '')}" required></td>
                                                                                    <td><input type="text" name="preventive_action[]" value="${escapeHtml(report.preventive_action || '')}" required></td>
                                                                                `;
                tbody.appendChild(row);
            });

            updateRecordCount();
        }

        // Add new empty row
        function addAccidentIncidentRow() {
            const tbody = document.querySelector('#accident-incident-form tbody');
            const row = document.createElement('tr');

            // Set default date to today if month/year is selected
            let defaultDate = '';
            const monthYear = document.getElementById('month_year').value;
            if (monthYear) {
                defaultDate = new Date().toISOString().slice(0, 16);
            }

            row.innerHTML = `
                                                                                <td><input type="datetime-local" name="date_time[]" value="${defaultDate}" required></td>
                                                                                <td><input type="text" name="person_involved[]" required></td>
                                                                                <td><input type="text" name="injuries_sustained[]" required></td>
                                                                                <td><input type="text" name="emergency_first_aid[]" required></td>
                                                                                <td><input type="text" name="first_aid_by[]" required></td>
                                                                                <td><input type="text" name="follow_up_action[]" required></td>
                                                                                <td><input type="text" name="preventive_action[]" required></td>
                                                                            `;
            tbody.appendChild(row);
            updateRecordCount();
        }

        // Submit form data
        function submitAccidentIncidentForm() {
            const form = document.getElementById('accident-incident-form');
            const monthYear = document.getElementById('month_year').value;

            if (!monthYear) {
                alert('Please select a month/year first');
                return;
            }

            // Validate at least one row has data
            const inputs = form.querySelectorAll('input[required]');
            let hasData = false;
            inputs.forEach(input => {
                if (input.value.trim() !== '') {
                    hasData = true;
                }
            });

            if (!hasData) {
                alert('Please enter at least one record');
                return;
            }

            const formData = new FormData(form);
            formData.append('month_year', monthYear);

            // Show loading state
            const submitBtn = document.querySelector('button[onclick="submitAccidentIncidentForm()"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch('/submit-accident-incident-report', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
            })
                .then(response => response.json())
                .then(data => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;

                    if (data.success) {
                        alert('Data saved successfully!');
                        // Refresh the data
                        fetchAccidentIncidentReports();
                    } else {
                        alert('Error: ' + (data.message || 'Failed to save data'));
                    }
                })
                .catch(error => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                    console.error('Error:', error);
                    alert('An error occurred while saving');
                });
        }

        // Update record counter
        function updateRecordCount() {
            const rowCount = document.querySelectorAll('#accident-incident-form tbody tr').length;
            document.getElementById('record-count').textContent = rowCount;
        }

        // Helper function to escape HTML
        function escapeHtml(unsafe) {
            return unsafe
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
        }

        // Add a new row to the Accident-Incident Reporting Log table
        // function addAccidentIncidentRow() {
        //     const table = document.querySelector('#accident-incident-form tbody');
        //     const newRow = document.createElement('tr');
        //     newRow.innerHTML = `
        //                                                                     <td><input type="datetime-local" name="date_time[]" required></td>
        //                                                                     <td><input type="text" name="person_involved[]" required></td>
        //                                                                     <td><input type="text" name="injuries_sustained[]" required></td>
        //                                                                     <td><input type="text" name="emergency_first_aid[]" required></td>
        //                                                                     <td><input type="text" name="first_aid_by[]" required></td>
        //                                                                     <td><input type="text" name="follow_up_action[]" required></td>
        //                                                                     <td><input type="text" name="preventive_action[]" required></td>
        //                                                                 `;
        //     table.appendChild(newRow);
        // }

        // function submitAccidentIncidentForm() {
        //     const form = document.getElementById('accident-incident-form');
        //     const formData = new FormData(form);

        //     console.log('Submitting form data:', formData); // Log form data

        //     fetch('/submit-accident-incident-report', {
        //         method: 'POST',
        //         body: formData,
        //         headers: {
        //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        //         },
        //     })
        //         .then(response => {
        //             console.log('Response status:', response.status); // Log response status
        //             if (!response.ok) {
        //                 throw new Error('Network response was not ok');
        //             }
        //             return response.json(); // Parse the response as JSON
        //         })
        //         .then(data => {
        //             console.log('Response data:', data); // Log response data
        //             if (data.success) {
        //                 alert('Data saved successfully!');
        //             } else {
        //                 alert('Failed to save data: ' + data.message);
        //             }
        //         })
        //         .catch(error => {
        //             console.error('Error:', error); // Log error
        //             alert('An error occurred while submitting the form.');
        //         });
        // }

        // function addVaccinationMonitoringRow() {
        //     const table = document.querySelector('#vaccination-monitoring-form tbody');
        //     const newRow = document.createElement('tr');
        //     newRow.innerHTML = `
        //                                 <td><input type="text" name="employee_name[]" required></td>
        //                                 <td><input type="date" name="hepatitis_dose1_date[]"></td>
        //                                 <td><input type="text" name="hepatitis_dose1_signature[]"></td>
        //                                 <td><input type="date" name="hepatitis_dose2_date[]"></td>
        //                                 <td><input type="text" name="hepatitis_dose2_signature[]"></td>
        //                                 <td><input type="date" name="hepatitis_dose3_date[]"></td>
        //                                 <td><input type="text" name="hepatitis_dose3_signature[]"></td>
        //                                 <td><input type="date" name="hepatitis_booster_date[]"></td>
        //                                 <td><input type="text" name="hepatitis_booster_signature[]"></td>
        //                                 <td><input type="text" name="titre_results[]"></td>
        //                                 <td><input type="date" name="tetanus_booster_date[]"></td>
        //                                 <td><input type="text" name="tetanus_booster_signature[]"></td>
        //                             `;
        //     table.appendChild(newRow);
        // }

        // function submitVaccinationMonitoringForm() {
        //     const form = document.getElementById('vaccination-monitoring-form');
        //     const formData = new FormData(form);

        //     fetch('/submit-vaccination-monitoring-log', {
        //         method: 'POST',
        //         body: formData,
        //         headers: {
        //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        //         },
        //     })
        //         .then(response => {
        //             if (!response.ok) {
        //                 throw new Error('Network response was not ok');
        //             }
        //             return response.json();
        //         })
        //         .then(data => {
        //             if (data.success) {
        //                 alert('Data saved successfully!');
        //                 location.reload();
        //             } else {
        //                 alert('Failed to save data: ' + data.message);
        //             }
        //         })
        //         .catch(error => {
        //             console.error('Error:', error);
        //             alert('An error occurred while submitting the form.');
        //         });
        // }
        // Initialize table on page load
        document.addEventListener('DOMContentLoaded', function () {
            // Start with one empty row
            addVaccinationMonitoringRow();
            updateVaccinationRecordCount();
        });

        // Fetch vaccination data when expiry date is selected
        function fetchVaccinationMonitoringData() {
            const expiryDateInput = document.getElementById('expiry_date');
            const tbody = document.querySelector('#vaccination-monitoring-form tbody');

            if (!expiryDateInput.value) {
                // Clear table if no date selected
                tbody.innerHTML = '';
                addVaccinationMonitoringRow();
                updateVaccinationRecordCount();
                return;
            }

            // Show loading state
            tbody.innerHTML = '<tr><td colspan="12" class="text-center">Loading data...</td></tr>';

            fetch(`/get-vaccination-monitoring-data?expiry_date=${expiryDateInput.value}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        populateVaccinationMonitoringTable(data.data);
                        // Update lot numbers if they exist in the first record
                        if (data.data.length > 0) {
                            document.getElementById('hepatitis_lot_no').value = data.data[0].hepatitis_lot_no || '';
                            document.getElementById('tetanus_lot_no').value = data.data[0].tetanus_lot_no || '';
                        }
                    } else {
                        throw new Error(data.message || 'Failed to fetch data');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    tbody.innerHTML = '';
                    addVaccinationMonitoringRow();
                    alert('Error loading vaccination data: ' + error.message);
                    updateVaccinationRecordCount();
                });
        }

        // Populate table with vaccination data
        function populateVaccinationMonitoringTable(records) {
            const tbody = document.querySelector('#vaccination-monitoring-form tbody');
            tbody.innerHTML = '';

            if (records.length === 0) {
                addVaccinationMonitoringRow();
                return;
            }

            records.forEach(record => {
                const row = document.createElement('tr');

                row.innerHTML = `
                                                                            <td><input type="text" name="employee_name[]" value="${escapeHtml(record.employee_name || '')}" required></td>
                                                                            <td><input type="date" name="hepatitis_dose1_date[]" value="${record.hepatitis_dose1_date || ''}"></td>
                                                                            <td><input type="text" name="hepatitis_dose1_signature[]" value="${escapeHtml(record.hepatitis_dose1_signature || '')}"></td>
                                                                            <td><input type="date" name="hepatitis_dose2_date[]" value="${record.hepatitis_dose2_date || ''}"></td>
                                                                            <td><input type="text" name="hepatitis_dose2_signature[]" value="${escapeHtml(record.hepatitis_dose2_signature || '')}"></td>
                                                                            <td><input type="date" name="hepatitis_dose3_date[]" value="${record.hepatitis_dose3_date || ''}"></td>
                                                                            <td><input type="text" name="hepatitis_dose3_signature[]" value="${escapeHtml(record.hepatitis_dose3_signature || '')}"></td>
                                                                            <td><input type="date" name="hepatitis_booster_date[]" value="${record.hepatitis_booster_date || ''}"></td>
                                                                            <td><input type="text" name="hepatitis_booster_signature[]" value="${escapeHtml(record.hepatitis_booster_signature || '')}"></td>
                                                                            <td><input type="text" name="titre_results[]" value="${escapeHtml(record.titre_results || '')}"></td>
                                                                            <td><input type="date" name="tetanus_booster_date[]" value="${record.tetanus_booster_date || ''}"></td>
                                                                            <td><input type="text" name="tetanus_booster_signature[]" value="${escapeHtml(record.tetanus_booster_signature || '')}"></td>
                                                                        `;
                tbody.appendChild(row);
            });

            updateVaccinationRecordCount();
        }

        // Add new empty row
        function addVaccinationMonitoringRow() {
            const tbody = document.querySelector('#vaccination-monitoring-form tbody');
            const row = document.createElement('tr');

            row.innerHTML = `
                                                                        <td><input type="text" name="employee_name[]" required></td>
                                                                        <td><input type="date" name="hepatitis_dose1_date[]"></td>
                                                                        <td><input type="text" name="hepatitis_dose1_signature[]"></td>
                                                                        <td><input type="date" name="hepatitis_dose2_date[]"></td>
                                                                        <td><input type="text" name="hepatitis_dose2_signature[]"></td>
                                                                        <td><input type="date" name="hepatitis_dose3_date[]"></td>
                                                                        <td><input type="text" name="hepatitis_dose3_signature[]"></td>
                                                                        <td><input type="date" name="hepatitis_booster_date[]"></td>
                                                                        <td><input type="text" name="hepatitis_booster_signature[]"></td>
                                                                        <td><input type="text" name="titre_results[]"></td>
                                                                        <td><input type="date" name="tetanus_booster_date[]"></td>
                                                                        <td><input type="text" name="tetanus_booster_signature[]"></td>
                                                                    `;
            tbody.appendChild(row);
            updateVaccinationRecordCount();
        }

        // Submit vaccination monitoring form
        function submitVaccinationMonitoringForm() {
            const form = document.getElementById('vaccination-monitoring-form');
            const expiryDate = document.getElementById('expiry_date').value;
            const hepatitisLotNo = document.getElementById('hepatitis_lot_no').value;
            const tetanusLotNo = document.getElementById('tetanus_lot_no').value;

            if (!expiryDate) {
                alert('Please select an expiry date first');
                return;
            }

            // Validate at least one row has employee name
            const employeeInputs = form.querySelectorAll('input[name="employee_name[]"]');
            let hasData = false;
            employeeInputs.forEach(input => {
                if (input.value.trim() !== '') {
                    hasData = true;
                }
            });

            if (!hasData) {
                alert('Please enter at least one employee record');
                return;
            }

            const formData = new FormData(form);
            formData.append('expiry_date', expiryDate);
            formData.append('hepatitis_lot_no', hepatitisLotNo);
            formData.append('tetanus_lot_no', tetanusLotNo);

            // Show loading state
            const submitBtn = document.querySelector('button[onclick="submitVaccinationMonitoringForm()"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch('/submit-vaccination-monitoring-log', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
            })
                .then(response => response.json())
                .then(data => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;

                    if (data.success) {
                        alert('Data saved successfully!');
                        // Refresh the data
                        fetchVaccinationMonitoringData();
                    } else {

                        let errorMessages = '';
                        for (let field in data.errors) {
                            data.errors[field].forEach(msg => {
                                errorMessages += `• ${msg}\n`;
                            });
                        }
                        alert('Validation Error:\n' + errorMessages);

                        // alert('Error: ' + (data.message + data.errors || 'Failed to save data'));
                    }
                })
                .catch(error => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                    console.error('Error:', error);
                    alert('An error occurred while saving');
                });
        }

        // Update record counter
        function updateVaccinationRecordCount() {
            const rowCount = document.querySelectorAll('#vaccination-monitoring-form tbody tr').length;
            document.getElementById('vaccination-record-count').textContent = rowCount;
        }

        // Helper function to escape HTML
        function escapeHtml(unsafe) {
            return unsafe
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
        }




        document.addEventListener('DOMContentLoaded', function () {
            // Start with one empty row
            addBiomedicalWasteRow();
            updateBiomedicalRecordCount();
        });

        // Fetch biomedical waste data when month/year is selected
        function fetchBiomedicalWasteData() {
            const monthYearInput = document.getElementById('month_year2');
            const tbody = document.querySelector('#biomedical-waste-form tbody');

            if (!monthYearInput.value) {
                // Clear table if no month selected
                tbody.innerHTML = '';
                addBiomedicalWasteRow();
                updateBiomedicalRecordCount();
                return;
            }

            // Show loading state
            tbody.innerHTML = '<tr><td colspan="11" class="text-center">Loading data...</td></tr>';

            fetch(`/get-biomedical-waste-data?month_year=${monthYearInput.value}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        populateBiomedicalWasteTable(data.data);
                        // Update agency name if it exists in the first record
                        if (data.data.length > 0) {
                            document.getElementById('agency_name').value = data.data[0].agency_name || '';
                        }
                    } else {
                        throw new Error(data.message || 'Failed to fetch data');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    tbody.innerHTML = '';
                    addBiomedicalWasteRow();
                    alert('Error loading biomedical waste data: ' + error.message);
                    updateBiomedicalRecordCount();
                });
        }

        // Populate table with biomedical waste data
        function populateBiomedicalWasteTable(records) {
            const tbody = document.querySelector('#biomedical-waste-form tbody');
            tbody.innerHTML = '';

            if (records.length === 0) {
                addBiomedicalWasteRow();
                return;
            }

            records.forEach(record => {
                const row = document.createElement('tr');

                row.innerHTML = `
                        <td><input type="date" name="date[]" value="${record.date || ''}" required></td>
                        <td><input type="text" name="red_color_waste[]" value="${escapeHtml(record.red_color_waste || '')}"></td>
                        <td><input type="text" name="red_color_weight[]" value="${escapeHtml(record.red_color_weight || '')}"></td>
                        <td><input type="text" name="yellow_color_waste[]" value="${escapeHtml(record.yellow_color_waste || '')}"></td>
                        <td><input type="text" name="yellow_color_weight[]" value="${escapeHtml(record.yellow_color_weight || '')}"></td>
                        <td><input type="text" name="blue_color_waste[]" value="${escapeHtml(record.blue_color_waste || '')}"></td>
                        <td><input type="text" name="blue_color_weight[]" value="${escapeHtml(record.blue_color_weight || '')}"></td>
                        <td><input type="text" name="sharp_container_waste[]" value="${escapeHtml(record.sharp_container_waste || '')}"></td>
                        <td><input type="text" name="sharp_container_weight[]" value="${escapeHtml(record.sharp_container_weight || '')}"></td>
                        <td><input type="text" name="housekeeping_staff_signature[]" value="${escapeHtml(record.housekeeping_staff_signature || '')}"></td>
                        <td><input type="text" name="bmw_handler_signature[]" value="${escapeHtml(record.bmw_handler_signature || '')}"></td>
                    `;
                tbody.appendChild(row);
            });

            updateBiomedicalRecordCount();
        }

        // Add new empty row
        function addBiomedicalWasteRow() {
            const tbody = document.querySelector('#biomedical-waste-form tbody');
            const row = document.createElement('tr');

            // Set default date to today if month/year is selected
            let defaultDate = '';
            const monthYear = document.getElementById('month_year2').value;
            if (monthYear) {
                defaultDate = new Date().toISOString().slice(0, 10);
            }

            row.innerHTML = `
                    <td><input type="date" name="date[]" value="${defaultDate}" required></td>
                    <td><input type="text" name="red_color_waste[]"></td>
                    <td><input type="text" name="red_color_weight[]"></td>
                    <td><input type="text" name="yellow_color_waste[]"></td>
                    <td><input type="text" name="yellow_color_weight[]"></td>
                    <td><input type="text" name="blue_color_waste[]"></td>
                    <td><input type="text" name="blue_color_weight[]"></td>
                    <td><input type="text" name="sharp_container_waste[]"></td>
                    <td><input type="text" name="sharp_container_weight[]"></td>
                    <td><input type="text" name="housekeeping_staff_signature[]"></td>
                    <td><input type="text" name="bmw_handler_signature[]"></td>
                `;
            tbody.appendChild(row);
            updateBiomedicalRecordCount();
        }

        // Submit biomedical waste form
        function submitBiomedicalWasteForm() {
            const form = document.getElementById('biomedical-waste-form');
            const monthYear = document.getElementById('month_year2').value;
            const agencyName = document.getElementById('agency_name').value;

            if (!monthYear) {
                alert('Please select a month/year first');
                return;
            }

            // Prepare the data in a structured format
            const formData = new FormData();
            formData.append('month_year', monthYear);
            formData.append('agency_name', agencyName);

            // Collect data from each row
            const rows = form.querySelectorAll('tbody tr');
            rows.forEach((row, index) => {
                const date = row.querySelector('input[name="date[]"]').value;
                if (!date) {
                    alert('Please fill in the date for all rows');
                    return;
                }

                formData.append(`entries[${index}][date]`, date);
                formData.append(`entries[${index}][red_color_waste]`, row.querySelector('input[name="red_color_waste[]"]').value);
                formData.append(`entries[${index}][red_color_weight]`, row.querySelector('input[name="red_color_weight[]"]').value);
                formData.append(`entries[${index}][yellow_color_waste]`, row.querySelector('input[name="yellow_color_waste[]"]').value);
                formData.append(`entries[${index}][yellow_color_weight]`, row.querySelector('input[name="yellow_color_weight[]"]').value);
                formData.append(`entries[${index}][blue_color_waste]`, row.querySelector('input[name="blue_color_waste[]"]').value);
                formData.append(`entries[${index}][blue_color_weight]`, row.querySelector('input[name="blue_color_weight[]"]').value);
                formData.append(`entries[${index}][sharp_container_waste]`, row.querySelector('input[name="sharp_container_waste[]"]').value);
                formData.append(`entries[${index}][sharp_container_weight]`, row.querySelector('input[name="sharp_container_weight[]"]').value);
                formData.append(`entries[${index}][housekeeping_staff_signature]`, row.querySelector('input[name="housekeeping_staff_signature[]"]').value);
                formData.append(`entries[${index}][bmw_handler_signature]`, row.querySelector('input[name="bmw_handler_signature[]"]').value);
            });

            // Show loading state
            const submitBtn = document.querySelector('button[onclick="submitBiomedicalWasteForm()"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch('/submit-biomedical-waste-log', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;

                    if (data.success) {
                        alert('Data saved successfully!');
                        fetchBiomedicalWasteData(); // Refresh the data
                    } else {
                        throw new Error(data.message || 'Failed to save data');
                    }
                })
                .catch(error => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                    console.error('Error:', error);
                    alert('Error saving data: ' + error.message);
                });
        }

        function updateBiomedicalRecordCount() {
            const rowCount = document.querySelectorAll('#biomedical-waste-form tbody tr').length;
            document.getElementById('biomedical-record-count').textContent = rowCount;
        }

        function escapeHtml(unsafe) {
            return unsafe
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
        }
    </script>

    </html>


@endsection