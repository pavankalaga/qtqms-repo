@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>General</title>
    </head>
    <style>
        .footer {
            margin-top: 20px;
            font-size: 12px;
        }

        .stock-planner-table {
            width: 100% !important;
            border-collapse: collapse !important;

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

        .tableHeader label {
            margin-top: 10px;
            font-weight: bold;

        }

        .tableHeader input {
            padding: 10px;
            margin: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
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
            /* gap: auto; */
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


        #transcription-check-record .date-input {
            width: 100%;
            border: none;
            background: transparent;
            padding: 8px;
        }

        #transcription-check-record .date-input:focus {
            outline: 1px solid #86b7fe;
            background: white;
        }


        /* Style for date inputs in table */
        #instrument-breakdown-record input[type="date"] {
            width: 100%;
            border: none;
            background: transparent;
            padding: 8px;
        }

        #instrument-breakdown-record input[type="date"]:focus {
            outline: 1px solid #86b7fe;
            background: white;
        }

        /* Style for content-editable cells */
        #instrument-breakdown-record td[contenteditable="true"] {
            min-width: 100px;
            padding: 8px;
        }

        #instrument-breakdown-record td[contenteditable="true"]:focus {
            outline: 1px solid #86b7fe;
            background-color: #f8f9fa;
        }
    </style>

    <body>
        <div class="main ">
            <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
                <div style="font-size: 20px;  ">General</div>

            </div>

            <div class="icon-view">
                <div class="pc-content">
                    <!-- Dynamic List of Logs -->
                    <div class="pc-folder" onclick="showSection('read-understood')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">01 - Read & Understood</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('analyte-calibration-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">02 - Analyte Calibration Log</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('microscope-maintenance-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">03 - Maintenance Log Of Microscope</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('centrifuge-maintenance-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">04 - Maintenance Log of Centrifuge</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('temperature-humidity-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">05 - Room Temperature & Humidity Log</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('reagent-verification-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">06 - New Reagent Lot Verification</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('reagent-usage-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">07 - Reagent Usage Log</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('retained-sample-verification')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">08 - Retained Sample Verification</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('report-amendment-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">09 - Report Amendment Log</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('personnel-validation-record')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">10 - Split Analysis Record</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('corrective-preventive-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">11 - Corrective Action & Preventive Action Log for EQAS
                            Outliers</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('critical-call-monitoring-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">12 - Critical Call Monitoring Log</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('daily-cleaning-checklist')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">13 - Daily Cleaning Checklist for Lab</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('rest-room-cleanliness-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">14 - Daily Cleanliness Log for Rest Room</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('sodium-hypochlorite-preparation')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">15 - Daily Preparation of 1% Sodium Hypochlorite Solution</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('refrigeration-temperature-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">16 - Refrigeration Temperature</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('deep-freezer-temperature-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">17 - Deep Freezer Temperature Log</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('transcription-check-record')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">18 - Transcription Check Record</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('instrument-breakdown-record')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">19 - Instrument Breakdown Record</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('non-conformity-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">20 - Non-Conformity and Corrective Action Log</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('sample-discard-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">21 - Sample Discard Log</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('inter-laboratory-comparison')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">22 - Inter-Laboratory Comparison</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('staff-suggestions-form')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">23 - Staff Suggestions Form</span>
                    </div>
                    <!-- <div class="pc-folder" onclick="showSection('customer-feedback-form')">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <span class="pc-folder-label">24 - Customer Feedback Form</span>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="pc-folder" onclick="showSection('physician-feedback-form')">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <span class="pc-folder-label">25 - Physician Feedback Form</span>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div> -->
                    <div class="pc-folder" onclick="showSection('startup-shutdown-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">26 - Startup and Shutdown Log</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('repeat-test-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">27 - Repeat Test Log</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('eye-wash-monitoring-form')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">28 - Eye Wash Monitoring Form</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('ipa-preparation-form')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">29 - 70% IPA Preparation Form</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('laboratory-incident-form')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">30 - Laboratory Incident Form</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('daily-iqc-data-monitoring-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">31 - Daily IQC Data Monitoring Log</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('eqas-sample-processing-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">32 - EQAS Sample Processing Log</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('iqc-outlier-corrective-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">33 - Daily IQC Outlier Corrective Action & Preventive Action
                            Log</span>
                    </div>
                </div>
            </div>
        </div>


        <!-- Sections -->
        <div id="read-understood" class="main  inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/GEN/001</strong></label>
                    <label class="doc-detail">Doc Name: <strong>SOP Read & Understood</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <!-- <button type="button" class="btn btn-warning">Submit</button> -->
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

            <div>
                <p>This is to declare that I have read & understood the instructions laid down in this manual/ SOP and shall
                    comply with these procedures, in my day-to-day functions.</p>
            </div>

            <form action="{{ route('form.general.submit') }}" method="POST">
                @csrf
                <input type="hidden" name="form_name" value="read-understood">

                <div class="table-responsive mt-4">
                    <table class="stock-planner-table">
                        <thead>
                            <tr>
                                <th>
                                    <p><strong>Sr. No.</strong></p>
                                </th>
                                <th>
                                    <p><strong>Name</strong></p>
                                </th>
                                <th>
                                    <p><strong>Date</strong></p>
                                </th>
                                <th>
                                    <p><strong>Signature</strong></p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Initial Row -->
                            <tr>
                                <td><span class="sr-no">1</span>
                                    <input type="hidden" name="rows[0][Sr. No.]" value="1">
                                </td>
                                <td><input type="text" name="rows[0][Name]" required></td>
                                <td><input type="date" name="rows[0][Date]" required></td>
                                <td><input type="text" name="rows[0][Signature]" required></td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-primary m-1" type="button" onclick="addRow(this)">+</button>
                </div>

                <button type="submit" class="btn btn-warning">Submit</button>
            </form>

        </div>
        <div id="analyte-calibration-log" class="main inactive">
            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/GEN/002</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Analyte Calibration Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitAnalyteCalibrationForm()">Submit</button>
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
                    <label>Month: </label>
                    <input type="month" id="calibration_month" onchange="fetchAnalyteCalibrationData()">
                </div>
                <div class="col-md-4">
                    <label>Total Records: <span id="calibration-record-count">0</span></label>
                </div>
            </div>

            <div class="table-responsive mt-4">
                <form id="analyte-calibration-form">
                    <table class="stock-planner-table">
                        <thead>
                            <tr>
                                <th rowspan="2">Date</th>
                                <th rowspan="2">Parameters</th>
                                <th rowspan="2">Calibrator Used</th>
                                <th rowspan="2">Lot No.</th>
                                <th colspan="6">QC Value</th>
                                <th rowspan="2">Signature of Scientific Staff</th>
                                <th rowspan="2">Signature of Supervisor</th>
                            </tr>
                            <tr>
                                <th>Level 1</th>
                                <th>Acceptable/Unacceptable</th>
                                <th>Level 2</th>
                                <th>Acceptable/Unacceptable</th>
                                <th>Level 3</th>
                                <th>Acceptable/Unacceptable</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Rows will be added dynamically -->
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary m-1" onclick="addAnalyteCalibrationRow()">+ Add
                        Row</button>
                </form>
            </div>
        </div>
        <div id="microscope-maintenance-log" class="main inactive">
            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/GEN/003</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Maintenance Log of Microscope</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitMaintenanceLog()">Submit</button>
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
                    <input type="month" id="maintenance_month" onchange="fetchMaintenanceLog()">
                </div>
                <div class="col-md-4">
                    <label>Equipment Id/No.: </label>
                    <select id="instrument_id" class="form-control" onchange="fetchMaintenanceLog()">
                        <option value="">Select Equipment</option>
                        @foreach($instruments as $instrument)
                            <option value="{{ $instrument->instrument_id }}">
                                {{ $instrument->instrument_id }} - {{ $instrument->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="table-responsive mt-4">
                <table class="stock-planner-table" id="maintenance-logs">
                    <thead>
                        <tr>
                            <th>Maintenance Task</th>
                            @for ($day = 1; $day <= 31; $day++)
                                <th>{{ $day }}</th>
                            @endfor
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Rows will be added dynamically -->
                        <tr>
                            <td>Cleaning from outside & inside</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="cleaned_in_out" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Check Mechanical stage</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="Check_Mechanical_stage" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Check fine & adjustment</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="Check_fine_adjustment" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Cleaning of lens</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="Cleaning_of_lens" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>

                        <tr>
                            <td>Check light source</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="Check_light_source" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Check plug cord</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="Check_plug_cord" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Lab Staff Signature</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="lab_staff_signature" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Lab Supervisor Signature</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="lab_supervisor_signature" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="centrifuge-maintenance-log" class="main inactive">
            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/GEN/004</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Maintenance Log of Centrifuge</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitCentrifugeMaintenanceLog()">Submit</button>
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
                    <label>Department: </label>
                    <input type="text" id="department2" placeholder="Department">
                </div>
                <div class="col-md-4">
                    <label>Month/Year: </label>
                    <input type="month" id="maintenance_month2" onchange="fetchCentrifugeMaintenanceLog()">
                </div>
                <div class="col-md-4">
                    <label>Equipment Id/No.: </label>
                    <select id="equipment_id2" class="form-control" onchange="fetchCentrifugeMaintenanceLog()">
                        <option value="">Select Equipment</option>
                        @foreach($instruments as $instrument)
                            <option value="{{ $instrument->instrument_id }}">
                                {{ $instrument->instrument_id }} - {{ $instrument->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="table-responsive mt-4">
                <table class="stock-planner-table" id="centrifuge-maintenance-logs">
                    <thead>
                        <tr>
                            <th>Maintenance Task</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                            <th>8</th>
                            <th>9</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                            <th>14</th>
                            <th>15</th>
                            <th>16</th>
                            <th>17</th>
                            <th>18</th>
                            <th>19</th>
                            <th>20</th>
                            <th>21</th>
                            <th>22</th>
                            <th>23</th>
                            <th>24</th>
                            <th>25</th>
                            <th>26</th>
                            <th>27</th>
                            <th>28</th>
                            <th>29</th>
                            <th>30</th>
                            <th>31</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Rows will be added dynamically -->
                    </tbody>
                </table>
            </div>
        </div>
        <!-- </div> -->
        <div id="temperature-humidity-log" class="main  inactive">


            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/GEN/005</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Room Temperature & Humidity Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitTemperatureHumidityLog()">Submit</button>
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
                    <label>Month/Year: </label><input type="date" id="dateFilter3">
                </div>
                <div class="col-md-4">
                    <label>Equipment Id/No.: </label>
                    <select id="equipmentId3" class="form-control" onchange="fetchTemperatureHumidityLog()">
                        <option value="">Select Equipment</option>
                        @foreach($instruments as $instrument)
                            <option value="{{ $instrument->instrument_id }}">
                                {{ $instrument->instrument_id }} - {{ $instrument->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <p>
                    Acceptable Temperature: Humidity: 30% - 85%, Temperature: 25 + 5ﹾC
                </p>
            </div>

            <div class="table-responsive mt-4">
                <table class="stock-planner-table" id="temperature-humidity-log">
                    <thead>
                        <tr>
                            <th rowspan="2"><br />
                                <p><strong>Date</strong></p>
                            </th>
                            <th colspan="3">
                                <p><strong>Morning (9:00 AM - 9:30 AM)</strong></p>
                            </th>
                            <th colspan="3">
                                <p><strong>Evening (3:30 PM-4:00 PM)</strong></p>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <p><strong>Humidity</strong></p>
                            </th>
                            <th>
                                <p><strong>Temperature</strong></p>
                            </th>
                            <th>
                                <p><strong>Signature</strong></p>
                            </th>
                            <th>
                                <p><strong>Humidity</strong></p>
                            </th>
                            <th>
                                <p><strong>Temperature</strong></p>
                            </th>
                            <th>
                                <p><strong>Signature</strong></p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>
                                <p><strong>1</strong></p>
                            </td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>2</strong></p>
                            </td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>3</strong></p>
                            </td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>4</strong></p>
                            </td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>5</strong></p>
                            </td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>6</strong></p>
                            </td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>7</strong></p>
                            </td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>8</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>9</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>10</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>11</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>12</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>13</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>14</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>15</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>16</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>17</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>18</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>19</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>20</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>21</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>22</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>23</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>24</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>25</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>26</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>27</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>28</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>29</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>30</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>31</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <div id="reagent-verification-log" class="main  inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/GEN/006</strong></label>
                    <label class="doc-detail">Doc Name: <strong>New Reagent Lot Verification</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitReagentVerificationLog()">Submit</button>
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
                    <label>Month/Year: </label><input type="date" id="dateFilter4">
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary" onclick="fetchReagentVerificationLog()">Search</button>
                </div>
            </div>

            <div class="table-responsive mt-4">
                <table class="stock-planner-table" id="reagent-verification-log">
                    <thead>
                        <tr>
                            <th rowspan="2">
                                <p>
                                    <strong>
                                        Date
                                    </strong>
                                </p>
                            </th>
                            <th rowspan="2">
                                <p>
                                    <strong>
                                        Reagent/Kit
                                    </strong>
                                </p>
                            </th>
                            <th colspan="2">
                                <p>
                                    <strong>
                                        Old Reagent
                                    </strong>
                                </p>
                            </th>
                            <th colspan="2">
                                <p>
                                    <strong>
                                        New Reagent
                                    </strong>
                                </p>
                            </th>
                            <th colspan="5">
                                <p>
                                    <strong>
                                        Verification
                                    </strong>
                                </p>
                            </th>
                            <th colspan="2">
                                <p>
                                    <strong>
                                        Veriation
                                    </strong>
                                </p>
                            </th>
                            <th rowspan="2">
                                <p>
                                    <strong>
                                        Scientific staff signature
                                    </strong>
                                </p>
                            </th>
                            <th rowspan="2">
                                <p>
                                    <strong>
                                        Verified By
                                    </strong>
                                </p>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <p>
                                    <strong>
                                        Lot No. 
                                    </strong>
                                </p>
                            </th>
                            <th>
                                <p>
                                    <strong>
                                        Expiry Date
                                    </strong>
                                </p>
                            </th>
                            <th>
                                <p>
                                    <strong>
                                        Lot No. 
                                    </strong>
                                </p>
                            </th>
                            <th>
                                <p>
                                    <strong>
                                        Expiry Date
                                    </strong>
                                </p>
                            </th>
                            <th>
                                <p>
                                    <strong>
                                        Analytes
                                    </strong>
                                </p>
                            </th>
                            <th>
                                <p>
                                    <strong>
                                        Materials Used for Verification( Sample ID or Control)
                                    </strong>
                                </p>
                            </th>
                            <th>
                                <p>
                                    <strong>
                                        Specimen Source
                                    </strong>
                                </p>
                            </th>
                            <th>
                                <p>
                                    <strong>
                                        Result with Old Lot Expected Value
                                    </strong>
                                </p>
                            </th>
                            <th>
                                <p>
                                    <strong>
                                        Result With New Lot (ExpectedValue)
                                    </strong>
                                </p>
                            </th>
                            <th>
                                <p>
                                    <strong>
                                        Observed Variation
                                    </strong>
                                </p>
                            </th>
                            <th>
                                <p>
                                    <strong>
                                        Remarks
                                    </strong>
                                </p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td><input type="date" class="form-control"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td><input type="date" class="form-control"></td>
                            <td contenteditable="true"></td>
                            <td><input type="date" class="form-control"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>

                    </tbody>
                </table>
                <button class="btn btn-primary m-1" onclick="newRowToTable4(this)">+</button>

            </div>

        </div>
        <div id="reagent-usage-log" class="main inactive">
            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/GEN/007</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Reagent Usage Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitReagentForm()">Submit</button>
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

            <!-- Input Fields -->
            <div class="row tableHeader">
                <div class="col-md-4">
                    <label>Department: </label>
                    <input type="text" id="reagent_department" placeholder="Department" required>
                </div>
                <div class="col-md-4">
                    <label>Month/Year: </label>
                    <input type="month" id="reagent_month_year" required />
                </div>
            </div>

            <!-- Table -->
            <div class="table-responsive mt-4">
                <table class="stock-planner-table" id="reagent_log_table">
                    <thead>
                        <tr>
                            <th><strong>Date</strong></th>
                            <th><strong>Reagent Name</strong></th>
                            <th><strong>Lot No.</strong></th>
                            <th><strong>Expiry Date</strong></th>
                            <th><strong>Scientific Staff Signature</strong></th>
                            <th><strong>Supervisor Signature</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Template row will be cloned for new entries -->
                        <tr>
                            <td><input type="date" class="form-control" required></td>
                            <td><input type="text" class="form-control" required></td>
                            <td><input type="text" class="form-control" required></td>
                            <td><input type="date" class="form-control" required></td>
                            <td><input type="text" class="form-control" required></td>
                            <td><input type="text" class="form-control" required></td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-primary m-1" onclick="addNewReagentRow()">+ Add Row</button>
            </div>
        </div>


        <div id="retained-sample-verification" class="main inactive">
            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/GEN/008</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Retained Sample Verification</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitRetainedSampleForm()">Submit</button>
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
                    <label>Month/Year: </label>
                    <input type="month" id="retained_month_year" required>
                </div>
            </div>

            <div>
                <p>Acceptability Criteria: A-B/A×100=% Difference</p>
            </div>

            <div class="table-responsive mt-4">
                <table class="stock-planner-table" id="retained_sample_table">
                    <thead>
                        <tr>
                            <th><strong>Date</strong></th>
                            <th><strong>Sample ID</strong></th>
                            <th><strong>Test Parameter</strong></th>
                            <th><strong>Initial Result</strong></th>
                            <th><strong>Result Next Day</strong></th>
                            <th><strong>Variation in Result</strong></th>
                            <th><strong>Is Variation Accepted</strong></th>
                            <th><strong>Done By</strong></th>
                            <th><strong>Verified By</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Template row will be added dynamically -->
                    </tbody>
                </table>
                <button type="button" class="btn btn-primary m-1" onclick="addNewRetainedSampleRow()">+ Add Row</button>
            </div>
        </div>

        <div id="report-amendment-log" class="main inactive">
            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/GEN/009</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Report Amendment Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" id="submitReportAmendmentBtn">Submit</button>
                </div>
            </div>

            <div class="mt-3 mb-3">
                <button class="button" onclick="goBack(this)">
                    <svg class="svgIcon" viewBox="0 0 384 512">
                        <path
                            d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"
                            transform="rotate(-90, 192, 256)">
                        </path>
                    </svg>
                </button>
            </div>

            <div class="row tableHeader">
                <div class="col-md-4">
                    <label>Month/Year: </label>
                    <input type="month" id="report_month_year" required>
                </div>
            </div>

            <div class="table-responsive mt-4">
                <table class="stock-planner-table" id="report_amendment_table">
                    <thead>
                        <tr>
                            <th><strong>Date</strong></th>
                            <th><strong>Visit No</strong></th>
                            <th><strong>Parameter</strong></th>
                            <th><strong>Reason of Amendment</strong></th>
                            <th><strong>Amendment Done By</strong></th>
                            <th><strong>Original Result</strong></th>
                            <th><strong>Final Result Reported in LIS</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Rows will be added dynamically -->
                    </tbody>
                </table>
                <button type="button" class="btn btn-primary m-1" id="addReportAmendmentRowBtn">+ Add Row</button>
            </div>
        </div>

        <div id="personnel-validation-record" class="main inactive">
            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/GEN/010</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Split Analysis Record</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <!-- Add onclick event to the submit button -->
                    <button type="button" class="btn btn-warning"
                        onclick="submitPersonnelValidationRecord()">Submit</button>
                </div>
            </div>
            <!-- Back Button -->
            <div class="mt-3 mb-3">
                <button class="button" onclick="goBack(this)">
                    <svg class="svgIcon" viewBox="0 0 384 512">
                        <path
                            d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"
                            transform="rotate(-90, 192, 256)">
                        </path>
                    </svg>
                </button>
            </div>

            <div class="table-responsive mt-4 safety_forms">
                <!-- Remove the form action since we're using JavaScript to submit -->
                <div>
                    <label>Date:</label>
                    <input type="date" id="record_date" required><br><br>
                    <label>Name of Department:</label>
                    <input type="text" id="department_name" required><br><br>
                    <label>Test Validation:</label>
                    <textarea id="test_validation"></textarea><br><br>
                    <label>Method:</label>
                    <textarea id="method"></textarea><br><br>
                    <label>Name of The Person Involved in The Validation:</label>
                    <textarea id="person_involved"></textarea><br><br>
                </div>
            </div>
            <div class="table-responsive mt-4">
                <table class="stock-planner-table" id="personnel_validation_table">
                    <thead>
                        <tr>
                            <th>
                                <p><strong>Barcode No. </strong></p>
                            </th>
                            <th>
                                <p><strong>Visit Id/No.</strong></p>
                            </th>
                            <th>
                                <p><strong>Result (A)</strong></p>
                            </th>
                            <th>
                                <p><strong>Result (B)</strong></p>
                            </th>
                            <th>
                                <p><strong>Acceptable/</strong></p>
                                <p><strong>Unacceptable</strong></p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Default row -->
                        <tr>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                    </tbody>
                </table>
                <!-- Add onclick event to the "Add Row" button -->
                <button type="button" class="btn btn-primary m-1" onclick="newRowToTable10()">+</button>
            </div>
        </div>
        <div id="corrective-preventive-log" class="main inactive">
            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/GEN/011</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Corrective Action & Preventive Action log for EQAS
                            Outliers</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <!-- Add onclick event to the submit button -->
                    <button type="button" class="btn btn-warning" onclick="submitCorrectivePreventiveLog()">Submit</button>
                </div>
            </div>
            <!-- Back Button -->
            <div class="mt-3 mb-3">
                <button class="button" onclick="goBack(this)">
                    <svg class="svgIcon" viewBox="0 0 384 512">
                        <path
                            d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"
                            transform="rotate(-90, 192, 256)">
                        </path>
                    </svg>
                </button>
            </div>

            <div class="table-responsive mt-4 safety_forms">
                <div>
                    <label>Date of Corrective Action Taken:</label>
                    <input type="date" id="date_of_action" required><br><br>
                    <label>Name of the Survey:</label>
                    <input type="text" id="survey_name" required><br><br>
                    <label>Details of Samples:</label>
                    <textarea id="sample_details"></textarea><br><br>
                    <label>EQAS Sample Run Date:</label>
                    <input type="date" id="eqas_sample_run_date"><br><br>
                    <label>Outlier Results:</label>
                    <textarea id="outlier_results"></textarea><br><br>
                    <label>EQAS Trends of last 2 cycles (if applicable):</label>
                    <textarea id="eqas_trends"></textarea><br><br>
                    <label>Root Cause Analysis</label>
                    <div class="table-responsive mt-4">
                        <table class="stock-planner-table" id="root_cause_table">
                            <thead>
                                <tr>
                                    <th>
                                        <p><strong>Sr No.</strong></p>
                                    </th>
                                    <th>
                                        <p><strong>Root Cause Analysis</strong></p>
                                    </th>
                                    <th>
                                        <p><strong>Acceptable</strong></p>
                                    </th>
                                    <th>
                                        <p><strong>Unacceptable</strong></p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Default rows -->
                                <tr>
                                    <td>
                                        <p><strong>1</strong></p>
                                    </td>
                                    <td>
                                        <p><span style="font-weight: 400;">IQC Status</span></p>
                                    </td>
                                    <td contenteditable="true"></td>
                                    <td contenteditable="true"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><strong>2</strong></p>
                                    </td>
                                    <td>
                                        <p><span style="font-weight: 400;">Preventive Maintenance Status</span></p>
                                    </td>
                                    <td contenteditable="true"></td>
                                    <td contenteditable="true"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><strong>3</strong></p>
                                    </td>
                                    <td>
                                        <p><span style="font-weight: 400;">Calibration Status</span></p>
                                    </td>
                                    <td contenteditable="true"></td>
                                    <td contenteditable="true"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><strong>4</strong></p>
                                    </td>
                                    <td>
                                        <p><span style="font-weight: 400;">Reagent Status</span></p>
                                    </td>
                                    <td contenteditable="true"></td>
                                    <td contenteditable="true"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><strong>5</strong></p>
                                    </td>
                                    <td>
                                        <p><span style="font-weight: 400;">Clerical Error</span></p>
                                    </td>
                                    <td contenteditable="true"></td>
                                    <td contenteditable="true"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><strong>6</strong></p>
                                    </td>
                                    <td>
                                        <p><span style="font-weight: 400;">Technical Problem</span></p>
                                    </td>
                                    <td contenteditable="true"></td>
                                    <td contenteditable="true"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><strong>7</strong></p>
                                    </td>
                                    <td>
                                        <p><span style="font-weight: 400;">Problem with EQAS Samples</span></p>
                                    </td>
                                    <td contenteditable="true"></td>
                                    <td contenteditable="true"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label>Any Other (Please Specify):</label>
                    <textarea id="other_specify"></textarea><br><br>
                    <label>Immediate Action Taken, if any:</label>
                    <textarea id="immediate_action_taken"></textarea><br><br>
                    <label>Summary of re-assayed results:</label>
                    <div class="table-responsive mt-4">
                        <table class="stock-planner-table" id="re_assayed_table">
                            <thead>
                                <tr>
                                    <th>
                                        <p><strong>Sr No.</strong></p>
                                    </th>
                                    <th>
                                        <p><strong>Analyte</strong></p>
                                    </th>
                                    <th>
                                        <p><strong>Previous Results/</strong></p>
                                    </th>
                                    <th>
                                        <p><strong>Re-assayed Results/</strong></p>
                                        <p><strong>ILC Result of Lab</strong></p>
                                    </th>
                                    <th>
                                        <p><strong>Acceptability Limits/ Obtained CV &amp; Acceptable Criteria of
                                                ILC</strong></p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Default row -->
                                <tr>
                                    <td contenteditable="true"></td>
                                    <td contenteditable="true"></td>
                                    <td contenteditable="true"></td>
                                    <td contenteditable="true"></td>
                                    <td contenteditable="true"></td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary m-1"
                            onclick="newRowToTable11('re_assayed_table')">+</button>
                    </div>
                    <label>Comment on Re-Assayed Results</label>
                    <textarea id="comment_on_re_assayed_results"></textarea><br><br>
                    <label>Preventive Action to prevent recurrence:</label>
                    <textarea id="preventive_action"></textarea><br><br>
                    <label>Documents Attached:</label>
                    <textarea id="documents_attached"></textarea><br><br>
                    <label>Conclusion:</label>
                    <textarea id="conclusion"></textarea><br><br>
                    <label>Corrective Action Taken By:</label>
                    <textarea id="corrective_action_taken_by"></textarea><br><br>
                    <label>Corrective Action Reviewed Approved By:</label>
                    <input type="text" id="corrective_action_reviewed_by"><br><br>
                    <label>Remark:</label>
                    <textarea id="remark"></textarea><br><br>
                </div>
            </div>
        </div>
        <div id="critical-call-monitoring-log" class="main inactive">
            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/GEN/012</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Critical Call Out Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" id="submitCriticalCallLog">Submit</button>
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
                    <label>Month/Year: </label>
                    <input type="month" id="critical_call_month_year" required>
                </div>
            </div>

            <div class="table-responsive mt-4">
                <table class="stock-planner-table" id="critical_call_table">
                    <thead>
                        <tr>
                            <th><strong>Date</strong></th>
                            <th><strong>Patient ID</strong></th>
                            <th><strong>Test Parameter</strong></th>
                            <th><strong>Initial Value</strong></th>
                            <th><strong>Cross Check Value</strong></th>
                            <th><strong>Reporting Time</strong></th>
                            <th><strong>Concern Clinician/Patient Informed</strong></th>
                            <th><strong>Readback Value from Clinician/Patient</strong></th>
                            <th><strong>Time of Informing</strong></th>
                            <th><strong>Signature of Person Informing</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Rows will be added dynamically -->
                    </tbody>
                </table>
                <button type="button" class="btn btn-primary m-1" id="addCriticalCallRowBtn">+ Add Row</button>
            </div>
        </div>

        <div id="daily-cleaning-checklist" class="main inactive">
            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/GEN/013</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Daily Cleaning Checklist for Lab</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <!-- Add onclick event to the submit button -->
                    <button type="button" class="btn btn-warning"
                        onclick="saveOrUpdateDailyCleaningChecklist()">Submit</button>
                </div>
            </div>
            <input type="hidden" id="checklist_id" value="">
            <!-- Back Button -->
            <div class="mt-3 mb-3">
                <button class="button" onclick="goBack(this)">
                    <svg class="svgIcon" viewBox="0 0 384 512">
                        <path
                            d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"
                            transform="rotate(-90, 192, 256)">
                        </path>
                    </svg>
                </button>
            </div>

            <div class="row tableHeader">
                <div class="col-md-4">
                    <!-- Add ID to the month/year input -->
                    <label>Month/Year: </label>
                    <input type="date" id="daily_cleaning_month_year" required>
                </div>
            </div>

            <div class="table-responsive mt-4">
                <!-- Floor Table -->
                <table class="stock-planner-table" id="floor_table">
                    <thead>
                        <tr>
                            <th colspan="2">
                                <p><strong>Floor</strong></p>
                            </th>
                            <!-- Dynamically generate 31 days headers -->
                            <!-- <th id="floor_days_header" colspan="31"></th> -->
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                            <th>8</th>
                            <th>9</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                            <th>14</th>
                            <th>15</th>
                            <th>16</th>
                            <th>17</th>
                            <th>18</th>
                            <th>19</th>
                            <th>20</th>
                            <th>21</th>
                            <th>22</th>
                            <th>23</th>
                            <th>24</th>
                            <th>25</th>
                            <th>26</th>
                            <th>27</th>
                            <th>28</th>
                            <th>29</th>
                            <th>30</th>
                            <th>31</th>
                        </tr>
                    </thead>
                    <tbody id="floor_table_body">
                        <!-- Floor Rows will be dynamically generated -->
                    </tbody>
                </table>

                <!-- Dustbins Table -->
                <table class="stock-planner-table" id="dustbins_table">
                    <thead>
                        <tr>
                            <th colspan="2">
                                <p><strong>Dustbins</strong></p>
                            </th>
                            <!-- Dynamically generate 31 days headers -->
                            <!-- <th id="dustbins_days_header" colspan="31"></th> -->
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                            <th>8</th>
                            <th>9</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                            <th>14</th>
                            <th>15</th>
                            <th>16</th>
                            <th>17</th>
                            <th>18</th>
                            <th>19</th>
                            <th>20</th>
                            <th>21</th>
                            <th>22</th>
                            <th>23</th>
                            <th>24</th>
                            <th>25</th>
                            <th>26</th>
                            <th>27</th>
                            <th>28</th>
                            <th>29</th>
                            <th>30</th>
                            <th>31</th>
                        </tr>
                    </thead>
                    <tbody id="dustbins_table_body">
                        <!-- Dustbins Rows will be dynamically generated -->
                    </tbody>
                </table>

                <!-- Counters Table -->
                <table class="stock-planner-table" id="counters_table">
                    <thead>
                        <tr>
                            <th colspan="2">
                                <p><strong>Counters</strong></p>
                            </th>
                            <!-- Dynamically generate 31 days headers -->
                            <!-- <th id="counters_days_header" colspan="31"></th> -->
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                            <th>8</th>
                            <th>9</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                            <th>14</th>
                            <th>15</th>
                            <th>16</th>
                            <th>17</th>
                            <th>18</th>
                            <th>19</th>
                            <th>20</th>
                            <th>21</th>
                            <th>22</th>
                            <th>23</th>
                            <th>24</th>
                            <th>25</th>
                            <th>26</th>
                            <th>27</th>
                            <th>28</th>
                            <th>29</th>
                            <th>30</th>
                            <th>31</th>
                        </tr>
                    </thead>
                    <tbody id="counters_table_body">
                        <!-- Counters Rows will be dynamically generated -->
                    </tbody>
                </table>

                <table class="stock-planner-table" id="equipment_table">
                    <thead>
                        <tr>
                            <th colspan="2">
                                <p><strong>Equipment</strong></p>
                            </th>
                            <!-- Dynamically generate 31 days headers -->
                            <!-- <th id="equipment_days_header" colspan="31"></th> -->
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                            <th>8</th>
                            <th>9</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                            <th>14</th>
                            <th>15</th>
                            <th>16</th>
                            <th>17</th>
                            <th>18</th>
                            <th>19</th>
                            <th>20</th>
                            <th>21</th>
                            <th>22</th>
                            <th>23</th>
                            <th>24</th>
                            <th>25</th>
                            <th>26</th>
                            <th>27</th>
                            <th>28</th>
                            <th>29</th>
                            <th>30</th>
                            <th>31</th>
                        </tr>
                    </thead>
                    <tbody id="equipment_table_body">
                        <!-- Dustbins Rows will be dynamically generated -->
                    </tbody>
                </table>
                <table class="stock-planner-table" id="stffsignature_table">
                    <thead>
                        <tr>
                            <th colspan="2">
                                <p><strong>Lab Staff Signature</strong></p>
                            </th>
                            <!-- Dynamically generate 31 days headers -->
                            <th id="stffsignature_header" colspan="31"></th>
                        </tr>
                    </thead>
                    <tbody id="stffsignature_body">
                        <!-- Dustbins Rows will be dynamically generated -->
                    </tbody>
                </table>
                <table class="stock-planner-table" id="supervisor_signature_table">
                    <thead>
                        <tr>
                            <th colspan="2">
                                <p><strong>Lab Supervisor Signature</strong></p>
                            </th>
                            <!-- Dynamically generate 31 days headers -->
                            <th id="supervisor_signature_days_header" colspan="31"></th>
                        </tr>
                    </thead>
                    <tbody id="supervisor_signature_body">
                        <!-- Dustbins Rows will be dynamically generated -->
                    </tbody>
                </table>

            </div>
        </div>


        <div id="rest-room-cleanliness-log" class="main  inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/GEN/014</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Daily Cleanliness Log for Rest Room </strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="form14()">Submit</button>
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
                    <label>Month/Year: </label><input type="date" id="month_year14">
                </div>
            </div>
            <div class="table-responsive mt-4">
                <table class="stock-planner-table">
                    <thead>
                        <tr>
                            <th rowspan="2"><br />
                                <p><strong>Date</strong></p>
                            </th>
                            <th colspan="3">
                                <p><strong>Floor Cleaning and Oduor Free</strong></p>
                            </th>
                            <th colspan="3">
                                <p><strong>Availability of Hand Washing Facility</strong></p>
                            </th>
                            <th colspan="3">
                                <p><strong>Cleaning of Wash Basin and WC Cleaning</strong></p>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <p><strong>Morning</strong></p>
                            </th>
                            <th>
                                <p><strong>After Noon</strong></p>
                            </th>
                            <th>
                                <p><strong>Evening</strong></p>
                            </th>
                            <th>
                                <p><strong>Morning</strong></p>
                            </th>
                            <th>
                                <p><strong>After Noon</strong></p>
                            </th>
                            <th>
                                <p><strong>Evening</strong></p>
                            </th>
                            <th>
                                <p><strong>Morning</strong></p>
                            </th>
                            <th>
                                <p><strong>After Noon</strong></p>
                            </th>
                            <th>
                                <p><strong>Evening</strong></p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>
                                <p><strong>       1</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>2</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>3</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>4</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>5</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>6</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>7</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>8</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>9</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>10</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>11</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>12</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>13</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>14</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>15</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>16</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>17</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>18</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>19</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>20</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>21</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>22</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>23</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>24</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>25</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>26</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>27</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>28</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>29</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>30</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>31</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <div id="sodium-hypochlorite-preparation" class="main  inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/GEN/015</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Daily Preparation Of 1% Sodium Hypochlorite Solution
                        </strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="form15()">Submit</button>
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
                    <label>Month/Year: </label><input type="date" id="monthYear15">
                </div>
            </div>

            <div class="table-responsive mt-4">
                <table class="stock-planner-table">
                    <thead>
                        <tr>
                            <th>
                                <p><strong>Date</strong></p>
                            </th>
                            <th>
                                <p><strong>Original Concentration</strong></p>
                            </th>
                            <th>
                                <p><strong>Quantity Prepared</strong></p>
                            </th>
                            <th>
                                <p><strong>Prepared By</strong></p>
                            </th>
                            <th>
                                <p><strong>Verified By</strong></p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>
                                <p><strong>1</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>2</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>3</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>4</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>5</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>6</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>7</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>8</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>9</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>10</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>11</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>12</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>13</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>14</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>15</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>16</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>17</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>18</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>19</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>20</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>21</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>22</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>23</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>24</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>25</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>26</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>27</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>28</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>29</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>30</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>31</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <div id="refrigeration-temperature-log" class="main  inactive">


            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/GEN/016</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Refrigerator Temperature Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="form16()">Submit</button>
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
                    <label>Month/Year: </label><input type="date" id="monthYear16">
                </div>
                <div class="col-md-4">
                    <label>Instrument: </label>
                    <select id="instrumentId16" class="form-control">
                        <option value="">Loading instruments...</option>
                    </select>
                </div>
            </div>
            <div>
                <p>Acceptable Temperature: 2-8ﹾC</p>
            </div>
            <div class="table-responsive mt-4">
                <table class="stock-planner-table">
                    <thead>
                        <tr>
                            <th rowspan="2"><br />
                                <p><strong>Date</strong></p>
                            </th>
                            <th colspan="2">
                                <p><strong>Morning (9-10 AM)</strong></p>
                            </th>
                            <th colspan="2">
                                <p><strong>Evening (4-5 PM)</strong></p>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <p><strong>Temperature</strong></p>
                            </th>
                            <th>
                                <p><strong>Signature</strong></p>
                            </th>
                            <th>
                                <p><strong>Temperature</strong></p>
                            </th>
                            <th>
                                <p><strong>Signature</strong></p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>
                                <p><strong>1</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>2</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>3</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>4</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>5</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>6</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>7</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>8</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>9</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>10</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>11</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>12</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>13</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>14</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>15</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>16</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>17</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>18</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>19</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>20</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>21</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>22</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>23</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>24</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>25</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>26</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>27</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>28</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>29</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>30</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>31</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <div id="deep-freezer-temperature-log" class="main  inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/GEN/017</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Deep Freezer Temperature Monitoring Log
                        </strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="form17()">Submit</button>
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
                    <label>Month/Year: </label><input type="date" id="monthYear17">
                </div>
                <div class="col-md-4">
                    <label>Instrument: </label>
                    <select id="instrumentId17" class="form-control">
                        <option value="">Loading instruments...</option>
                    </select>
                </div>
            </div>
            <div>
                <p>Acceptable Temperature: < -15ﹾC </p>
            </div>
            <div class="table-responsive mt-4">
                <table class="stock-planner-table">
                    <thead>
                        <tr>
                            <th rowspan="2"><br />
                                <p><strong>Date</strong></p>
                            </th>
                            <th colspan="2">
                                <p><strong>Morning (9-10 AM)</strong></p>
                            </th>
                            <th colspan="2">
                                <p><strong>Evening (4-5 PM)</strong></p>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <p><strong>Temperature</strong></p>
                            </th>
                            <th>
                                <p><strong>Signature</strong></p>
                            </th>
                            <th>
                                <p><strong>Temperature</strong></p>
                            </th>
                            <th>
                                <p><strong>Signature</strong></p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>
                                <p><strong>1</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>2</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>3</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>4</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>5</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>6</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>7</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>8</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>9</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>10</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>11</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>12</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>13</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>14</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>15</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>16</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>17</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>18</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>19</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>20</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>21</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>22</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>23</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>24</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>25</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>26</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>27</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>28</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>29</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>30</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>31</strong></p>
                            </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <div id="transcription-check-record" class="main  inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/GEN/018</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Transcription Check Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="form18()">Submit</button>
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
                    <label>Month/Year: </label><input type="date" id="monthYear18">
                </div>
            </div>

            <div class="table-responsive mt-4">
                <table class="stock-planner-table">
                    <thead>
                        <tr>
                            <th>
                                <p><strong>Date</strong></p>
                            </th>
                            <th>
                                <p><strong>Visit No. </strong></p>
                            </th>
                            <th>
                                <p><strong>Results Recorded on Worksheet</strong></p>
                            </th>
                            <th>
                                <p><strong>Results Entered In LIS</strong></p>
                            </th>
                            <th>
                                <p><strong>Result Entered By</strong></p>
                            </th>
                            <th>
                                <p><strong>Results Verified By</strong></p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td><input type="date" class="form-control date-input"></td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>

                    </tbody>
                </table>
                <button class="btn btn-primary m-1" onclick="newRowToTable18(this)">+</button>

            </div>

        </div>
        <div id="instrument-breakdown-record" class="main  inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/GEN/019</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Instrument Breakdown Record</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="form19()">Submit</button>
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
                <label>Month/Year:</label>
                <div class="col-md-4" style="border: 1px solid #ccc; padding: 5px; border-radius: 5px;">
                    <input type="date" class="form-control">
                </div>
            </div>


            <div class="table-responsive mt-4">
                <table class="stock-planner-table">
                    <thead>
                        <tr>
                            <th rowspan="2"><br />
                                <p><strong>Date</strong></p>
                            </th>
                            <th rowspan="2"><br />
                                <p><strong>Equipment Name / ID</strong></p>
                            </th>
                            <th rowspan="2"><br />
                                <p><strong>Problem Identified</strong></p>
                            </th>
                            <th colspan="3">
                                <p><strong>When Attended and other details</strong></p>
                            </th>
                            <th rowspan="2">
                                <p><strong>Total Down Time</strong></p>
                            </th>
                            <th rowspan="2"><br />
                                <p><strong>Remarks if any</strong></p>
                            </th>
                            <th rowspan="2"><br /><br />
                                <p><strong>Signature</strong></p>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <p><strong>Breakdown Time</strong></p>
                            </th>
                            <th>
                                <p><strong>Action Taken</strong></p>
                            </th>
                            <th>
                                <p><strong>Name of Engineer </strong></p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>


                        <tr>
                            <td><input type="date" id="date19"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>

                    </tbody>
                </table>
                <!-- Your HTML remains the same, just change the button -->
                <button class="btn btn-primary m-1" id="addRowBtn19">+</button>
            </div>

        </div>
        <div id="non-conformity-log" class="main  inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/GEN/020</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Non-Conformity & Corrective Action Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="form20()">Submit</button>
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
                    <label>Month/Year: </label><input type="date" id="monthYear20">
                </div>
            </div>

            <div class="table-responsive mt-4">
                <table class="stock-planner-table" id="non-conformity-log">
                    <thead>
                        <tr>
                            <th>
                                <p><strong>Date</strong></p>
                            </th>
                            <th>
                                <p><strong>Non Conformity Observed</strong></p>
                            </th>
                            <th>
                                <p><strong>Responsible Person</strong></p>
                            </th>
                            <th>
                                <p><strong>Root Cause Analysis</strong></p>
                            </th>
                            <th>
                                <p><strong>Corrective Actions Taken</strong></p>
                            </th>
                            <th>
                                <p><strong>Preventive Action Taken</strong></p>
                            </th>
                            <th>
                                <p><strong>Date of Closure</strong></p>
                            </th>
                            <th>
                                <p><strong>Signature</strong></p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td><input type="date" id="date20" required></td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td><input type="date" id="date201"></td>
                            <td contenteditable="true"> </td>
                        </tr>

                    </tbody>
                </table>
                <button class="btn btn-primary m-1" onclick="newRowToTable20(this)">+</button>

            </div>

        </div>
        <div id="sample-discard-log" class="main inactive">
            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/GEN/021</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Sample Discard Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" id="submitBtn21" class="btn btn-warning">Submit</button>
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
                    <input type="month" id="month_year21" class="form-control">
                </div>
            </div>
            <div class="table-responsive mt-4">
                <table class="stock-planner-table" id="sampleDiscardTable">
                    <thead>
                        <tr>
                            <th><strong>Sr. No.</strong></th>
                            <th><strong>Sample Received Date</strong></th>
                            <th><strong>Department</strong></th>
                            <th><strong>Sample Discard Date</strong></th>
                            <th><strong>Discard by</strong></th>
                            <th><strong>Reviewed By</strong></th>
                            <th><strong>Action</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Initial row will be added dynamically -->
                    </tbody>
                </table>
                <button type="button" class="btn btn-primary m-1" id="addRowBtn21">+ Add Row</button>
            </div>
        </div>
        <div id="inter-laboratory-comparison" class="main  inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/GEN/022</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Inter Laboratory Comparison</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label>Name of Lab A: </label>
                    <input type="text" class="form-control" id="lab_a">
                </div>
                <div class="col-md-4">
                    <label>Name of Lab B: </label>
                    <input type="text" class="form-control" id="lab_b">
                </div>
            </div>

            <p>% Difference: A-B/A×100</p>

            <div class="table-responsive">
                <form id="labForm">
                    <table class="table table-bordered" id="labTable">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Registration No.</th>
                                <th>Test Parameter</th>
                                <th>Our Lab Result (A)</th>
                                <th>Referring Lab Result (B)</th>
                                <th>Difference as %</th>
                                <th>Acceptable / Not</th>
                                <th>Done By</th>
                                <th>Reviewed By</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @for($i = 0; $i < 9; $i++)
                                    @if($i == 0)
                                        <td><input type="date" class="form-control" name="date[]"></td>
                                    @else
                                        <td><input type="text" class="form-control" name="field{{ $i }}[]"></td>
                                    @endif
                                @endfor
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-success" onclick="addRow22()">+</button>
                    <button type="button" class="btn btn-warning mt-3" onclick="form22()">Submit</button>
                </form>



                <h5 class="mt-5">Saved Records:</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Reg No</th>
                            <th>Test Param</th>
                            <th>A</th>
                            <th>B</th>
                            <th>% Diff</th>
                            <th>Status</th>
                            <th>Done</th>
                            <th>Reviewed</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($records as $record)
                            <tr>
                                <td>{{ $record->date }}</td>
                                <td>{{ $record->registration_no }}</td>
                                <td>{{ $record->test_parameter }}</td>
                                <td>{{ $record->our_lab_result }}</td>
                                <td>{{ $record->referring_lab_result }}</td>
                                <td>{{ $record->difference_percentage }}</td>
                                <td>{{ $record->acceptable_status }}</td>
                                <td>{{ $record->done_by }}</td>
                                <td>{{ $record->reviewed_by }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div id="staff-suggestions-form" class="main  inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/GEN/023</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Staff Suggestions Form</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <!-- <button type="button" class="btn btn-warning" onclick="form23()">Submit</button> -->
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
                <form action="{{ route('suggestion.store') }}" method="post">
                    @csrf
                    <label for="employee-name">Employee Name:</label>
                    <input type="text" id="employee-name" name="employee_name"><br><br>

                    <label for="date">Date:</label>
                    <input type="date" id="date" name="date"><br><br>

                    <label for="employee-id">Employee ID:</label>
                    <input type="text" id="employee-id" name="employee_id"><br><br>

                    <label for="suggestions">Staff Suggestions for Continual Improvement in Laboratory Quality
                        Management
                        System:</label>
                    <textarea id="suggestions" name="suggestions" rows="5" cols="40"></textarea><br><br>

                    <label for="management-action">Corrective action taken by the Management:</label>
                    <textarea id="management-action" name="management_action" rows="3"
                        cols="40">All the suggestions were considered and made them available.</textarea><br><br>

                    <label for="employee-signature">Employee Signature:</label>
                    <input type="text" id="employee-signature" name="employee_signature"><br><br>

                    <label for="lab-supervisor">Lab Supervisor:</label>
                    <input type="text" id="lab-supervisor" name="lab_supervisor"><br><br>

                    <label for="lab-director-signature">Lab Director Signature:</label>
                    <input type="text" id="lab-director-signature" name="lab_director_signature"><br><br>

                    <button type="submit">Submit</button>
                </form>
            </div>

        </div>
        <div id="customer-feedback-form" class="main  inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/GEN/024</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Customer Feedback Form</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="form23()">Submit</button>
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
                <form action="{{ route('customer.feedback.store') }}" method="POST">
                    @csrf
                    <label for="employee-name"> Name:</label>
                    <input type="text" name="name"><br><br>

                    <label>SIN No/Bar Code No:</label>
                    <input type="number" name="sin_no"><br><br>

                    <label>Date:</label>
                    <input type="date" name="date"><br><br>

                    <label>Contact No.:</label>
                    <input type="number" name="contact_no"><br><br>

                    <label>Address:</label>
                    <textarea name="address" rows="5" cols="40"></textarea><br><br>

                    <!-- Ratings Table: Make these checkboxes or radios with same name="ratings[question_id]" -->
                    <input type="radio" name="ratings[q1]" value="Poor"> Poor
                    <input type="radio" name="ratings[q1]" value="Average"> Average
                    <input type="radio" name="ratings[q1]" value="Good"> Good
                    <!-- Repeat above for q2, q3... -->

                    <label for="complaints-suggestions">Complaints/Suggestions:</label>
                    <textarea name="complaints-suggestions"></textarea><br><br>

                    <label>Signature:</label>
                    <input type="text" name="signature"><br><br>

                    <input type="radio" name="communicated" value="yes"> YES
                    <input type="radio" name="communicated" value="no"> NO

                    <!-- Rest of office use fields -->
                    <input type="text" name="complainant-identification"><br>
                    <input type="date" name="complaint-date"><br>
                    <textarea name="complaint-description"></textarea><br>
                    <textarea name="analysis-resolution"></textarea><br>
                    <input type="text" name="closure-by"><br>
                    <input type="date" name="closure-on"><br>
                    <textarea name="preventive-action"></textarea><br>
                    <input type="text" name="reviewed-by"><br>
                    <input type="text" name="approved-by"><br>

                    <button type="submit">Submit</button>
                </form>

            </div>

        </div>
        <div id="physician-feedback-form" class="main  inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/GEN/025</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Physician Feedback Form</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="form25()">Submit</button>
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

            <div>
                <p> Clinicians Feedback Form for Laboratory Services </p>
            </div>
            <div class="table-responsive mt-4 safety_forms">
                <form action="#" method="post">
                    <label for="month-year">Month & Year:</label>
                    <input type="month" id="month-year" name="month-year"><br><br>

                    <label for="services-provided">Services provided by the Clinical Laboratory:</label>
                    <textarea id="services-provided" name="services-provided" rows="5" cols="50"></textarea><br><br>
                    <div class="table-responsive mt-4">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <p><strong>Sr. No.</strong></p>
                                    </th>
                                    <th>
                                        <p><strong>Laboratory service</strong></p>
                                    </th>
                                    <th><br />
                                        <p><strong>Very good</strong></p>
                                    </th>
                                    <th>
                                        <p><strong>Good</strong></p>
                                    </th>
                                    <th>
                                        <p><strong>Satisfactory</strong></p>
                                    </th>
                                    <th>
                                        <p><strong>Need to Improvement</strong></p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>
                                        <p><span style="font-weight: 400;">1</span></p>
                                    </td>
                                    <td>
                                        <p><span style="font-weight: 400;">Sample collection</span></p>
                                    </td>
                                    <td contenteditable="true"> </td>
                                    <td contenteditable="true"> </td>
                                    <td contenteditable="true"> </td>
                                    <td contenteditable="true"> </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><span style="font-weight: 400;">2</span></p>
                                    </td>
                                    <td>
                                        <p><span style="font-weight: 400;">Lab Results</span></p>
                                    </td>
                                    <td contenteditable="true"> </td>
                                    <td contenteditable="true"> </td>
                                    <td contenteditable="true"> </td>
                                    <td contenteditable="true"> </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><span style="font-weight: 400;">3</span></p>
                                    </td>
                                    <td>
                                        <p><span style="font-weight: 400;">Lab Reports &amp; Dispatch</span></p>
                                    </td>
                                    <td contenteditable="true"> </td>
                                    <td contenteditable="true"> </td>
                                    <td contenteditable="true"> </td>
                                    <td contenteditable="true"> </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><span style="font-weight: 400;">4</span></p>
                                    </td>
                                    <td>
                                        <p><span style="font-weight: 400;">Emergency Lab services</span></p>
                                    </td>
                                    <td contenteditable="true"> </td>
                                    <td contenteditable="true"> </td>
                                    <td contenteditable="true"> </td>
                                    <td contenteditable="true"> </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><span style="font-weight: 400;">5</span></p>
                                    </td>
                                    <td>
                                        <p><span style="font-weight: 400;">Critical Alerts</span></p>
                                    </td>
                                    <td contenteditable="true"> </td>
                                    <td contenteditable="true"> </td>
                                    <td contenteditable="true"> </td>
                                    <td contenteditable="true"> </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><span style="font-weight: 400;">6</span></p>
                                    </td>
                                    <td>
                                        <p><span style="font-weight: 400;">Communication</span></p>
                                    </td>
                                    <td contenteditable="true"> </td>
                                    <td contenteditable="true"> </td>
                                    <td contenteditable="true"> </td>
                                    <td contenteditable="true"> </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><span style="font-weight: 400;">7</span></p>
                                    </td>
                                    <td>
                                        <p><span style="font-weight: 400;">Turn Around Time (TAT)</span></p>
                                    </td>
                                    <td contenteditable="true"> </td>
                                    <td contenteditable="true"> </td>
                                    <td contenteditable="true"> </td>
                                    <td contenteditable="true"> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label for="comments">Comments:</label>
                    <textarea id="comments" name="comments" rows="5" cols="50"></textarea><br><br>

                    <label for="doctor-name">Name of the Doctor:</label>
                    <input type="text" id="doctor-name" name="doctor-name"><br><br>

                    <label for="doctor-signature">Signature of the Doctor:</label>
                    <input type="text" id="doctor-signature" name="doctor-signature"><br><br>

                    <button type="submit">Submit</button>
                </form>
            </div>
            <div class="table-responsive mt-4">
                <table class="stock-planner-table"> </table>
            </div>

        </div>
        <div id="startup-shutdown-log" class="main  inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/GEN/026</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Equipment Startup and Shutdown log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="form26()">Submit</button>
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
                    <label>Equipment Name: </label><input type="text" placeholder="Equipment Name" id="eqp_name">
                </div>
                <div class="col-md-4">
                    <label>Instrument Sr No.: </label>
                    <select id="instrument_26_id" class="form-control" onchange="fetchForm26Data()" required>
                        <option value="">Select Instrument</option>
                        @foreach($instruments as $instrument)
                            <option value="{{ $instrument->id }}">{{ $instrument->instrument_id }} - {{ $instrument->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="table-responsive mt-4">
                <table class="stock-planner-table" id="form26">
                    <thead>
                        <tr>
                            <th>
                                <p><strong>Sr. No.</strong></p>
                            </th>
                            <th>
                                <p><strong>Date</strong></p>
                            </th>
                            <th>
                                <p><strong>Start Time</strong></p>
                            </th>
                            <th>
                                <p><strong>Shutdown Time</strong></p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <button class="btn btn-primary m-1" onclick="newRowToTable26(this)">+</button>

            </div>

        </div>
        <div id="repeat-test-log" class="main  inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/GEN/027</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Repeat Test Log </strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" id="submitBtn27" class="btn btn-warning">Submit</button>
                    <!-- <button type="button" class="btn btn-warning" onclick="form27()">Submit</button> -->
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
                    <label>Instrument/Department: </label>
                    <!-- Change the select element to ensure proper value binding -->
                    <select id="instrument_27_id" class="form-control" required>
                        <option value="">Select Instrument</option>
                        @foreach($instruments as $instrument)
                            <option value="{{ $instrument->id }}">{{ $instrument->instrument_id }} - {{ $instrument->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <p>KEY: 'A' – Original Results, 'B' - 1st Repeat, 'C' – 2nd Repeat (as relevant)</p>
            </div>

            <div class="table-responsive mt-4">
                <table class="stock-planner-table" id="form27">
                    <thead>
                        <tr>
                            <th rowspan="2">
                                <p><strong>Sr. No</strong></p>
                            </th>
                            <th rowspan="2">
                                <p><strong>Date</strong></p>
                            </th>
                            <th rowspan="2">
                                <p><strong>Visit id</strong></p>
                            </th>
                            <th rowspan="2">
                                <p><strong>Parameter repeat</strong></p>
                            </th>
                            <th rowspan="2">
                                <p><strong>Reason for repeat</strong></p>
                            </th>
                            <th rowspan="2">
                                <p><strong>Repeat authorised by sign/date</strong></p>
                            </th>
                            <th colspan="3">
                                <p><strong>Repeat Result</strong></p>
                            </th>
                            <th rowspan="2">
                                <p><strong>Result entered in LMS</strong></p>
                            </th>
                            <th rowspan="2">
                                <p><strong>Final Result reviewed by sign/date</strong></p>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <p><strong>A</strong></p>
                            </th>
                            <th>
                                <p><strong>B</strong></p>
                            </th>
                            <th>
                                <p><strong>C</strong></p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Rows will be added dynamically -->
                    </tbody>
                </table>
                <button type="button" class="btn btn-primary m-1" id="addRowBtn27">+ Add Row</button>
            </div>
        </div>
        <div id="eye-wash-monitoring-form" class="main  inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/GEN/028</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Eye Wash Monitoring Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submit28Log()">Submit</button>
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
                    <label>Department: </label><input type="text" id="eye_wash_department" placeholder="Department">
                </div>

                <div class="col-md-4">
                    <label>Month/Year: </label>
                    <input type="month" id="eye_wash_month_year" onchange="fetch28Data()" required>
                </div>

            </div>

            <div class="table-responsive mt-4">
                <table class="stock-planner-table" id="form28-table">
                    <thead>
                        <tr>
                            <th>
                                <p><strong>Date</strong></p>
                            </th>
                            <th>
                                <p><strong>Water Changed</strong></p>
                            </th>
                            <th>
                                <p><strong>Changed by</strong></p>
                            </th>
                            <th>
                                <p><strong>Signature</strong></p>
                            </th>
                            <th>
                                <p><strong>Remarks</strong></p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @php
                            // For the form display, we'll always show 31 rows but disable invalid dates
                            $maxDays = 31;
                        @endphp

                        @for($day = 1; $day <= $maxDays; $day++)
                            <tr data-day="{{ $day }}">
                                <td>{{ $day }}</td>
                                <td contenteditable="true" data-field="water_changed"></td>
                                <td contenteditable="true" data-field="changed_by"></td>
                                <td contenteditable="true" data-field="signature"></td>
                                <td contenteditable="true" data-field="remarks"></td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>

        </div>
        <div id="ipa-preparation-form" class="main  inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/GEN/029</strong></label>
                    <label class="doc-detail">Doc Name: <strong>70% Iso Propyl Alcohol Preparation Log </strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="form29()">Submit</button>
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
                    <label>Department: </label><input type="text" placeholder="Department" id="department_29">
                </div>
                <div class="col-md-4">
                    <label>Month/Year: </label>
                    <input type="month" id="month_year_29" onchange="fetch29()" required>
                </div>
            </div>

            <div class="table-responsive mt-4">
                <table class="stock-planner-table" id="ipa-preparation-table">
                    <thead>
                        <tr>
                            <th>
                                <p><strong>Date</strong></p>
                            </th>
                            <th>
                                <p><strong>Volume Prepared</strong></p>
                            </th>
                            <th>
                                <p><strong>Prepared by </strong></p>
                            </th>
                            <th>
                                <p><strong>Signature</strong></p>
                            </th>
                            <th>
                                <p><strong>Verified by</strong></p>
                            </th>
                            <th>
                                <p><strong>Signature</strong></p>
                            </th>
                            <th>
                                <p><strong>Remarks</strong></p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($day = 1; $day <= 31; $day++)
                            <tr data-day="{{ $day }}">
                                <td>{{ $day }}</td>
                                <td contenteditable="true" data-field="volume_prepared"></td>
                                <td contenteditable="true" data-field="prepared_by"></td>
                                <td contenteditable="true" data-field="signature1"></td>
                                <td contenteditable="true" data-field="verified_by"></td>
                                <td contenteditable="true" data-field="signature2"></td>
                                <td contenteditable="true" data-field="remarks"></td>
                            </tr>

                        @endfor
                    </tbody>
                </table>
            </div>

        </div>
        <div id="laboratory-incident-form" class="main  inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/GEN/030</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Laboratory Incident Form</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="form30()">Submit</button>
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
                <form action="{{ route('incident.reports.store') }}" method="POST">
                    @csrf

                    <label for="incident-doc-no">Incident Document No:</label>
                    <input type="text" id="incident-doc-no" name="incident-doc-no" value="{{ old('incident-doc-no') }}"
                        required><br><br>

                    <label for="incident-date">Date:</label>
                    <input type="date" id="incident-date" name="incident-date"
                        value="{{ old('incident-date', date('Y-m-d')) }}" required><br><br>

                    <label for="location-department">TDPL Location / Department Name:</label>
                    <input type="text" id="location-department" name="location-department"
                        value="{{ old('location-department') }}" required><br><br>

                    <label for="person-reporting">Name and Position of the Person Filling the Report:</label>
                    <textarea id="person-reporting" name="person-reporting" rows="2" cols="50"
                        required>{{ old('person-reporting') }}</textarea><br><br>

                    <label for="patient-barcode">Patient Test Barcode No:</label>
                    <input type="text" id="patient-barcode" name="patient-barcode"
                        value="{{ old('patient-barcode') }}"><br><br>

                    <label>Who was involved?</label>
                    <label>
                        <input type="radio" name="involvement" value="in-house" {{ old('involvement') == 'in-house' ? 'checked' : '' }} required> In-house
                    </label>
                    <label>
                        <input type="radio" name="involvement" value="external" {{ old('involvement') == 'external' ? 'checked' : '' }}> External, person involved
                    </label>
                    <input type="text" id="external-person" name="external-person" placeholder="Name (if any)"
                        value="{{ old('external-person') }}">
                    <input type="text" id="organization" name="organization" placeholder="Organization"
                        value="{{ old('organization') }}"><br><br>

                    <label for="incident-date-time">When did it happen?</label>
                    <label for="incident-date-only">Date of incident:</label>
                    <input type="date" id="incident-date-only" name="incident-date-only"
                        value="{{ old('incident-date-only') }}" required><br><br>
                    <label for="incident-time">Time:</label>
                    <input type="time" id="incident-time" name="incident-time" value="{{ old('incident-time') }}"
                        required><br><br>

                    <label for="incident-awareness">How did the incident come to your attention?</label>
                    <label>
                        <input style="width: fit-content;" type="radio" name="attention" value="was-involved" {{ old('attention') == 'was-involved' ? 'checked' : '' }} required> Was involved
                    </label>
                    <label>
                        <input style="width: fit-content;" type="radio" name="attention" value="reported-to-me" {{ old('attention') == 'reported-to-me' ? 'checked' : '' }}> Reported to me
                    </label>
                    <label>
                        <input style="width: fit-content;" type="radio" name="attention" value="other" {{ old('attention') == 'other' ? 'checked' : '' }}> Other
                    </label>
                    <input type="text" id="other-attention" name="other-attention" placeholder="Specify"
                        value="{{ old('other-attention') }}"><br><br>

                    <label for="incident-type">Type of incident:</label>
                    <textarea id="incident-type" name="incident-type" rows="3" cols="50"
                        required>{{ old('incident-type') }}</textarea><br><br>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <div id="daily-iqc-data-monitoring-log" class="main inactive">
            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/GEN/031</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Daily IQC Data Monitoring Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" id="submitIqcBtn" class="btn btn-warning">Submit</button>
                    <!-- <button type="button" class="btn btn-warning" onclick="submitIqcData()">Submit</button> -->
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
                    <input type="month" id="iqcMonthYear" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Level: </label>
                    <input type="text" id="iqcLevel" class="form-control" placeholder="Level">
                </div>
                <div class="col-md-4">
                    <label>Instrument Sr. No.: </label>
                    <select id="instrumentSerial" class="form-control">
                        <option value="">Select Instrument</option>
                        @foreach($instruments as $instrument)
                            <option value="{{ $instrument->instrument_id }}">
                                {{ $instrument->instrument_id }} - {{ $instrument->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Control Lot No.: </label>
                    <input type="text" id="controlLotNo" class="form-control" placeholder="Control Lot No.">
                </div>
                <div class="col-md-4">
                    <label>Control Expiry Date: </label>
                    <input type="date" id="controlExpiryDate" class="form-control">
                </div>
            </div>

            <div class="table-responsive mt-4">
                <table class="stock-planner-table" id="iqcDataTable">
                    <thead>
                        <tr>
                            <th><strong>Parameter</strong></th>
                            @for ($day = 1; $day <= 31; $day++)
                                <th>{{ $day }}</th>
                            @endfor
                            <th><strong>Done By</strong></th>
                            <th><strong>Reviewed By</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>LOW</strong></td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-parameter="low" data-day="{{ $day }}"></td>
                            @endfor
                            <td contenteditable="true" data-parameter="low_done_by"></td>
                            <td contenteditable="true" data-parameter="low_reviewed_by"></td>
                        </tr>
                        <tr>
                            <td><strong>MEAN</strong></td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-parameter="mean" data-day="{{ $day }}"></td>
                            @endfor
                            <td contenteditable="true" data-parameter="mean_done_by"></td>
                            <td contenteditable="true" data-parameter="mean_reviewed_by"></td>
                        </tr>
                        <tr>
                            <td><strong>HIGH</strong></td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-parameter="high" data-day="{{ $day }}"></td>
                            @endfor
                            <td contenteditable="true" data-parameter="high_done_by"></td>
                            <td contenteditable="true" data-parameter="high_reviewed_by"></td>
                        </tr>
                        @for ($row = 1; $row <= 31; $row++)
                            <tr>
                                <td><strong>{{ $row }}</strong></td>
                                @for ($day = 1; $day <= 31; $day++)
                                    <td contenteditable="true" data-parameter="row_{{ $row }}" data-day="{{ $day }}"></td>
                                @endfor
                                <td contenteditable="true" data-parameter="row_{{ $row }}_done_by"></td>
                                <td contenteditable="true" data-parameter="row_{{ $row }}_reviewed_by"></td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
        <div id="eqas-sample-processing-log" class="main  inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/GEN/032</strong></label>
                    <label class="doc-detail">Doc Name: <strong>EQAS Sample Possessing Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <!-- <button type="button" class="btn btn-warning" onclick="form32()">Submit</button> -->
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
                <form action="{{ route('iqc.sample.logstore') }}" method="POST">
                    @csrf
                    <label for="eqas-provider-name">Name Of EQAS Provider:</label>
                    <input type="text" id="eqas-provider-name" name="eqas_provider_name" required><br><br>

                    <label for="eqas-lab-id">EQAS Lab ID:</label>
                    <input type="text" id="eqas-lab-id" name="eqas_lab_id" required><br><br>

                    <label for="department-name">Department Name:</label>
                    <input type="text" id="department-name" name="department-name"><br><br>

                    <label for="temperature">Temperature of EQAS sample at the time of Receiving:</label>
                    <input type="text" id="temperature" name="temperature" required><br><br>

                    <label for="sample-no">EQAS Sample No.:</label>
                    <input type="text" id="sample-no" name="sample-no" required><br><br>

                    <label for="accession-no">EQAS Accession/SIN No.:</label>
                    <input type="text" id="accession-no" name="accession-no" required><br><br>

                    <label for="reconstitute-by">Reconstitute By:</label>
                    <input type="text" id="reconstitute-by" name="reconstitute-by" required><br><br>

                    <label for="reconstitution-date">Reconstitution Date:</label>
                    <input type="date" id="reconstitution-date" name="reconstitution-date" required><br><br>

                    <label for="processed-by">Processed By:</label>
                    <input type="text" id="processed-by" name="processed-by" required><br><br>

                    <label for="reviewed-by">Reviewed By (Pathologist):</label>
                    <input type="text" id="reviewed-by" name="reviewed-by" required><br><br>

                    <label for="result-qa">Result Share with QA department (Date & Signature):</label>
                    <textarea id="result-qa" name="result-qa" rows="2" cols="50" required></textarea><br><br>

                    <label for="result-dispatched">Result Dispatched to EQAS provider (Date):</label>
                    <input type="date" id="result-dispatched" name="result-dispatched" required><br><br>

                    <label for="evaluation-result">EQAS evaluation result received on:</label>
                    <input type="date" id="evaluation-result" name="evaluation-result" required><br><br>

                    <label for="section-head-signature">Section Head Signature:</label>
                    <input type="text" id="section-head-signature" name="section-head-signature" required><br><br>

                    <button type="submit">Submit</button>
                </form>
            </div>

        </div>
        <div id="iqc-outlier-corrective-log" class="main inactive">
            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/GEN/033</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Daily IQC Non-Conformity & Preventive Action
                            Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitOutlierLog()">Submit</button>
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
                    <input type="month" id="outlierMonthYear" class="form-control">
                </div>
            </div>

            <div class="table-responsive mt-4">
                <table class="stock-planner-table" id="outlierLogTable">
                    <thead>
                        <tr>
                            <th><strong>Date</strong></th>
                            <th><strong>Parameter Outlier</strong></th>
                            <th><strong>Non-Conformity Observed</strong></th>
                            <th><strong>Root Cause Analysis</strong></th>
                            <th><strong>Corrective Actions Taken</strong></th>
                            <th><strong>Preventive Action Taken</strong></th>
                            <th><strong>Date of Closure</strong></th>
                            <th><strong>Signature</strong></th>
                            <th><strong>Action</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Rows will be added dynamically -->
                    </tbody>
                </table>
                <button class="btn btn-primary m-1" onclick="addNewOutlierRow()">+ Add Row</button>
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

        let rowCount = 1; // Start from 1 because the initial row is already present

        function addRow(button) {
            const table = button.closest('.table-responsive').querySelector('table tbody');
            const newRow = document.createElement('tr');

            // Generate unique name attributes for the new row
            newRow.innerHTML = `
                                                                                                                                                                                                                <td><input type="text" name="rows[${rowCount}][Sr. No.]"></td>
                                                                                                                                                                                                                <td><input type="text" name="rows[${rowCount}][Name]" required></td>
                                                                                                                                                                                                                <td><input type="date" name="rows[${rowCount}][Date]"></td>
                                                                                                                                                                                                                <td><input type="text" name="rows[${rowCount}][Signature]"></td>
                                                                                                                                                                                                            `;

            table.appendChild(newRow);
            rowCount++; // Increment the row counter
        }

        let rowCount2 = 1; // Start from 1 because the initial row is already present

        function addRow2(button) {
            const table = button.closest('.table-responsive').querySelector('table tbody');
            const newRow = document.createElement('tr');

            // Generate unique name attributes for the new row
            newRow.innerHTML = `
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <td><input type="text" name="rows[${rowCount2}][Date]"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <td><input type="text" name="rows[${rowCount2}][Parameters]"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <td><input type="text" name="rows[${rowCount2}][Calibrator Used]"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <td><input type="text" name="rows[${rowCount2}][Lot No.]"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <td><input type="text" name="rows[${rowCount2}][Level 1]"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <td><input type="text" name="rows[${rowCount2}][Acceptable/Unacceptable]"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <td><input type="text" name="rows[${rowCount2}][Level 2]"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <td><input type="text" name="rows[${rowCount2}][Acceptable/Unacceptable]"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <td><input type="text" name="rows[${rowCount2}][Level 3]"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <td><input type="text" name="rows[${rowCount2}][Acceptable/Unacceptable]"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <td><input type="text" name="rows[${rowCount2}][Signature of Scientific Staff]"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <td><input type="text" name="rows[${rowCount2}][Signature of Supervisor]"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            `;

            table.appendChild(newRow);
            rowCount2++; // Increment the row counter
        }
    </script>
    <script>
        // Initialize table on page load
        document.addEventListener('DOMContentLoaded', function () {
            // Start with one empty row
            addAnalyteCalibrationRow();
            updateCalibrationRecordCount();
        });

        // Fetch calibration data when month is selected
        function fetchAnalyteCalibrationData() {
            const monthInput = document.getElementById('calibration_month');
            const tbody = document.querySelector('#analyte-calibration-form tbody');

            if (!monthInput.value) {
                // Clear table if no month selected
                tbody.innerHTML = '';
                addAnalyteCalibrationRow();
                updateCalibrationRecordCount();
                return;
            }

            // Show loading state
            tbody.innerHTML = '<tr><td colspan="12" class="text-center">Loading data...</td></tr>';

            fetch(`/get-analyte-calibration-data?month=${monthInput.value}`, {
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
                        populateAnalyteCalibrationTable(data.data);
                    } else {
                        throw new Error(data.message || 'Failed to fetch data');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    tbody.innerHTML = '';
                    addAnalyteCalibrationRow();
                    alert('Error loading calibration data: ' + error.message);
                    updateCalibrationRecordCount();
                });
        }

        // Populate table with calibration data
        function populateAnalyteCalibrationTable(records) {
            const tbody = document.querySelector('#analyte-calibration-form tbody');
            tbody.innerHTML = '';

            if (records.length === 0) {
                addAnalyteCalibrationRow();
                return;
            }

            records.forEach(record => {
                const row = document.createElement('tr');

                row.innerHTML = `
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <td><input type="date" name="date[]" value="${record.date || ''}" required></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <td><input type="text" name="parameters[]" value="${escapeHtml(record.parameters || '')}"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <td><input type="text" name="calibrator_used[]" value="${escapeHtml(record.calibrator_used || '')}"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <td><input type="text" name="lot_no[]" value="${escapeHtml(record.lot_no || '')}"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <td><input type="text" name="level_1[]" value="${escapeHtml(record.level_1 || '')}"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <td><input type="text" name="level_1_status[]" value="${escapeHtml(record.level_1_status || '')}"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <td><input type="text" name="level_2[]" value="${escapeHtml(record.level_2 || '')}"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <td><input type="text" name="level_2_status[]" value="${escapeHtml(record.level_2_status || '')}"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <td><input type="text" name="level_3[]" value="${escapeHtml(record.level_3 || '')}"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <td><input type="text" name="level_3_status[]" value="${escapeHtml(record.level_3_status || '')}"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <td><input type="text" name="scientific_staff_signature[]" value="${escapeHtml(record.scientific_staff_signature || '')}"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <td><input type="text" name="supervisor_signature[]" value="${escapeHtml(record.supervisor_signature || '')}"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                `;
                tbody.appendChild(row);
            });

            updateCalibrationRecordCount();
        }

        // Add new empty row
        function addAnalyteCalibrationRow() {
            const tbody = document.querySelector('#analyte-calibration-form tbody');
            const row = document.createElement('tr');

            // Set default date to today if month is selected
            let defaultDate = '';
            const month = document.getElementById('calibration_month').value;
            if (month) {
                defaultDate = new Date().toISOString().slice(0, 10);
            }

            row.innerHTML = `
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <td><input type="date" name="date[]" value="${defaultDate}" required></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <td><input type="text" name="parameters[]"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <td><input type="text" name="calibrator_used[]"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <td><input type="text" name="lot_no[]"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <td><input type="text" name="level_1[]"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <td><input type="text" name="level_1_status[]"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <td><input type="text" name="level_2[]"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <td><input type="text" name="level_2_status[]"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <td><input type="text" name="level_3[]"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <td><input type="text" name="level_3_status[]"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <td><input type="text" name="scientific_staff_signature[]"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <td><input type="text" name="supervisor_signature[]"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            `;
            tbody.appendChild(row);
            updateCalibrationRecordCount();
        }

        // Submit calibration form
        function submitAnalyteCalibrationForm() {
            const form = document.getElementById('analyte-calibration-form');
            const month = document.getElementById('calibration_month').value;

            if (!month) {
                alert('Please select a month first');
                return;
            }

            // Prepare the data in a structured format
            const formData = {
                month: month,
                entries: []
            };

            // Collect data from each row
            const rows = form.querySelectorAll('tbody tr');
            rows.forEach(row => {
                const entry = {
                    date: row.querySelector('input[name="date[]"]').value,
                    parameters: row.querySelector('input[name="parameters[]"]').value,
                    calibrator_used: row.querySelector('input[name="calibrator_used[]"]').value,
                    lot_no: row.querySelector('input[name="lot_no[]"]').value,
                    level_1: row.querySelector('input[name="level_1[]"]').value,
                    level_1_status: row.querySelector('input[name="level_1_status[]"]').value,
                    level_2: row.querySelector('input[name="level_2[]"]').value,
                    level_2_status: row.querySelector('input[name="level_2_status[]"]').value,
                    level_3: row.querySelector('input[name="level_3[]"]').value,
                    level_3_status: row.querySelector('input[name="level_3_status[]"]').value,
                    scientific_staff_signature: row.querySelector('input[name="scientific_staff_signature[]"]').value,
                    supervisor_signature: row.querySelector('input[name="supervisor_signature[]"]').value
                };

                // Only add entries with at least a date
                if (entry.date) {
                    formData.entries.push(entry);
                }
            });

            if (formData.entries.length === 0) {
                alert('Please enter at least one valid record with date');
                return;
            }

            // Show loading state
            const submitBtn = document.querySelector('button[onclick="submitAnalyteCalibrationForm()"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch('/submit-analyte-calibration-log', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify(formData)
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
                        fetchAnalyteCalibrationData(); // Refresh the data
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

        function updateCalibrationRecordCount() {
            const rowCount = document.querySelectorAll('#analyte-calibration-form tbody tr').length;
            document.getElementById('calibration-record-count').textContent = rowCount;
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

    <script type="text/javascript">
        // Initialize form with current month/year
        document.addEventListener('DOMContentLoaded', function () {
            const monthYearInput = document.getElementById('maintenance_month');
            if (!monthYearInput.value) {
                const today = new Date();
                const year = today.getFullYear();
                const month = String(today.getMonth() + 1).padStart(2, '0');
                monthYearInput.value = `${year}-${month}`;
            }
        });

        function submitMaintenanceLog() {
            // alert('hello');
            const monthYear = document.getElementById('maintenance_month').value;
            const instrumentId = document.getElementById('instrument_id').value;

            if (!monthYear || !instrumentId) {
                alert('Please select Month/Year and Instrument');
                return;
            }

            // Initialize data object with all possible tasks
            const data = {
                month_year: `${monthYear}-01`,
                instrument_id: instrumentId,
                tasks: {
                    cleaned_in_out: {},
                    Check_Mechanical_stage: {},
                    Check_fine_adjustment: {},
                    Cleaning_of_lens: {},
                    Check_light_source: {},
                    Check_plug_cord: {},
                    lab_staff_signature: {},
                    lab_supervisor_signature: {},
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
            fetch("{{ route('maintenance-log.store') }}", {
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
            //alert('yes it is');
            const monthYear = document.getElementById('maintenance_month').value;
            const instrumentId = document.getElementById('instrument_id').value;

            if (!monthYear || !instrumentId) return;

            fetch("{{ route('maintenance-log.fetch') }}", {
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

        document.addEventListener('DOMContentLoaded', function () {
            initializeCentrifugeMaintenanceTable();
        });

        // Initialize table with maintenance tasks
        function initializeCentrifugeMaintenanceTable() {
            const tasks = [
                "Cleaning from outside",
                "Cleaning from Inside",
                "Check the power cord & switch",
                "Check Carbon Brush",

                "Lab Staff Signature",
                "Lab Supervisor Signature",
                "Clean Tube holders with 1%",
                "Lab Staff Signature-week's",
                // Add more tasks as needed
            ];

            const tbody = document.querySelector('#centrifuge-maintenance-logs tbody');
            tbody.innerHTML = '';

            tasks.forEach(task => {
                const row = document.createElement('tr');
                const taskCell = document.createElement('td');
                taskCell.textContent = task;
                row.appendChild(taskCell);

                // Add 31 cells for each day of the month
                for (let i = 1; i <= 31; i++) {
                    const dayCell = document.createElement('td');
                    dayCell.setAttribute('contenteditable', 'true');
                    dayCell.setAttribute('data-day', i);
                    row.appendChild(dayCell);
                }

                tbody.appendChild(row);
            });
        }

        // Fetch maintenance data when month/year and equipment ID are selected
        function fetchCentrifugeMaintenanceLog() {
            const monthInput = document.getElementById('maintenance_month2');
            const equipmentSelect = document.getElementById('equipment_id2');
            const equipmentId = equipmentSelect.value;

            if (!monthInput.value || !equipmentId) {
                // Don't show alert here as it might trigger during initial selection
                return;
            }

            console.log('Fetching data for:', monthInput.value, equipmentId);

            const tbody = document.querySelector('#centrifuge-maintenance-logs tbody');
            tbody.innerHTML = '<tr><td colspan="32" class="text-center">Loading data...</td></tr>';

            fetch(`/get-centrifuge-maintenance-log?month=${monthInput.value}&equipment_id=${equipmentId}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
            })
                .then(response => {
                    console.log('Response status:', response.status); // Debug log
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Received data:', data); // Debug log
                    if (data.success) {
                        if (data.data && data.data.length > 0) {
                            populateCentrifugeMaintenanceTable(data.data);
                            // Update department if it exists in the first record
                            if (data.data[0].department) {
                                document.getElementById('department2').value = data.data[0].department;
                            }
                        } else {
                            initializeCentrifugeMaintenanceTable();
                            alert('No maintenance records found for selected criteria');
                        }
                    } else {
                        throw new Error(data.message || 'Failed to fetch data');
                    }
                })
                .catch(error => {
                    console.error('Fetch Error:', error);
                    initializeCentrifugeMaintenanceTable();
                    alert('Error loading maintenance data: ' + error.message);
                });
        }
        // Populate table with maintenance data
        function populateCentrifugeMaintenanceTable(logs) {
            const tbody = document.querySelector('#centrifuge-maintenance-logs tbody');
            tbody.innerHTML = '';

            console.log('Populating table with:', logs); // Debug log

            // Create a map of tasks to their day data
            const taskMap = new Map();

            logs.forEach(log => {
                if (!taskMap.has(log.task)) {
                    taskMap.set(log.task, {});
                }
                const taskData = taskMap.get(log.task);

                // Merge days_data into the task's data
                Object.entries(log.days_data || {}).forEach(([day, value]) => {
                    if (value) { // Only add if value exists
                        taskData[day] = value;
                    }
                });
            });

            // Create rows for each task
            taskMap.forEach((daysData, task) => {
                const row = document.createElement('tr');

                // Task name cell
                const taskCell = document.createElement('td');
                taskCell.textContent = task;
                row.appendChild(taskCell);

                // Create cells for each day (1-31)
                for (let day = 1; day <= 31; day++) {
                    const dayCell = document.createElement('td');
                    dayCell.setAttribute('contenteditable', 'true');
                    dayCell.setAttribute('data-day', day);

                    // Set cell value if data exists for this day
                    const dayKey = `day_${day}`;
                    dayCell.textContent = daysData[dayKey] || '';

                    row.appendChild(dayCell);
                }

                tbody.appendChild(row);
            });

            console.log('Table populated successfully'); // Debug log
        }

        // Submit maintenance form
        function submitCentrifugeMaintenanceLog() {
            const monthInput = document.getElementById('maintenance_month2');
            const equipmentSelect = document.getElementById('equipment_id2');
            const equipmentId = equipmentSelect.value;
            const department = document.getElementById('department2').value;

            if (!monthInput.value || !equipmentId || !department) {
                alert('Please select a month/year, select equipment and department');
                return;
            }


            const rows = document.querySelectorAll('#centrifuge-maintenance-logs tbody tr');
            const logs = [];
            const monthYear = monthInput.value;

            rows.forEach(row => {
                const task = row.cells[0].textContent.trim();
                const daysData = {};

                // Collect data for each day (1-31)
                for (let i = 1; i <= 31; i++) {
                    const dayCell = row.cells[i];
                    const value = dayCell.textContent.trim();
                    if (value) {
                        daysData[`day_${i}`] = value;
                    }
                }

                // Only add if there's data for at least one day
                if (Object.keys(daysData).length > 0) {
                    logs.push({
                        month_year: monthYear,
                        equipment_id: equipmentId,
                        department: department,
                        task: task,
                        days_data: daysData
                    });
                }
            });

            if (logs.length === 0) {
                alert('No data to save! Please enter maintenance records.');
                return;
            }

            // Show loading state
            const submitBtn = document.querySelector('button[onclick="submitCentrifugeMaintenanceLog()"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch('/save-centrifuge-maintenance-log', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({ logs: logs })
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
                        alert('Maintenance log saved successfully!');
                        fetchCentrifugeMaintenanceLog(); // Refresh the data
                    } else {
                        throw new Error(data.message || 'Failed to save data');
                    }
                })
                .catch(error => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                    console.error('Error:', error);
                    alert('Error saving maintenance log: ' + error.message);
                });
        }


        function submitTemperatureHumidityLog() {
            alert("Submitting temperature and humidity log...");
            let table = document.getElementById("temperature-humidity-log");
            // let table = document.querySelector(".stock-planner-table tbody");
            if (!table) {
                alert("Log table not found!");
                return;
            }

            let rows = table.querySelectorAll("tr");
            let data = [];


            const monthYear = document.getElementById("dateFilter3").value || new Date().toISOString().split("T")[0];
            const instrumentSrNo = document.getElementById("equipmentId3")?.value.trim();

            if (!monthYear || !instrumentSrNo) {
                alert("Month/Year and Instrument Sr. No. are required!");
                return;
            }

            rows.forEach(row => {
                let cells = row.querySelectorAll("td");
                if (cells.length === 0) return;

                let date = cells[0]?.innerText.trim();
                if (!date) return;

                data.push({
                    date: `${monthYear.split('-')[0]}-${monthYear.split('-')[1]}-${date.padStart(2, '0')}`,
                    morning_humidity: cells[1]?.innerText.trim() || null,
                    morning_temperature: cells[2]?.innerText.trim() || null,
                    morning_signature: cells[3]?.innerText.trim() || null,
                    evening_humidity: cells[4]?.innerText.trim() || null,
                    evening_temperature: cells[5]?.innerText.trim() || null,
                    evening_signature: cells[6]?.innerText.trim() || null,
                });
            });

            if (data.length === 0) {
                alert("No data to save!");
                return;
            }

            fetch("/save-temperature-humidity-log", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({
                    month_year: monthYear,
                    instrument_sr_no: instrumentSrNo,
                    logs: data,
                }),
            })
                .then(response => response.json())
                .then(result => {
                    alert(result.message || "Log saved successfully!");
                    console.log(result);
                })
                .catch(error => {
                    alert("Error submitting log: " + error.message);
                    console.error(error);
                });
        }
        document.addEventListener('DOMContentLoaded', function () {
            // Add event listeners to trigger fetch when filters change
            document.getElementById("dateFilter3").addEventListener("change", fetchTemperatureHumidityLog);
            document.getElementById("equipmentId3").addEventListener("change", fetchTemperatureHumidityLog);

            // Or add a search button if you prefer
            // document.getElementById("searchBtn").addEventListener("click", fetchTemperatureHumidityLog);
        });
        function fetchTemperatureHumidityLog() {
            const monthYear = document.getElementById("dateFilter3").value;
            const instrumentSrNo = document.getElementById("equipmentId3").value.trim();

            if (!monthYear || !instrumentSrNo) {
                alert("Please select Month/Year and enter Instrument Sr. No.");
                return;
            }

            fetch("/fetch-temperature-humidity-log", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({
                    month_year: monthYear,
                    instrument_sr_no: instrumentSrNo,
                }),
            })
                .then(response => response.json())
                .then(data => {
                    if (!data.success || !data.logs || data.logs.length === 0) {
                        alert("No data found for the selected criteria");
                        clearTemperatureHumidityTable();
                        return;
                    }

                    populateTemperatureHumidityTable(data.logs);
                })
                .catch(error => {
                    console.error("Error fetching log:", error);
                    alert("Error fetching log data");
                });
        }

        function populateTemperatureHumidityTable(logs) {
            const table = document.getElementById("temperature-humidity-log");
            const rows = table.querySelectorAll("tbody tr");

            // Clear existing data first
            clearTemperatureHumidityTable();

            logs.forEach(log => {
                // Extract day from date (format: YYYY-MM-DD)
                const day = new Date(log.date).getDate();

                // Find the corresponding row (rows are 0-indexed, days are 1-indexed)
                const row = rows[day - 1];
                if (!row) return;

                const cells = row.querySelectorAll("td");

                // Morning data
                cells[1].textContent = log.morning_humidity || '';
                cells[2].textContent = log.morning_temperature || '';
                cells[3].textContent = log.morning_signature || '';

                // Evening data
                cells[4].textContent = log.evening_humidity || '';
                cells[5].textContent = log.evening_temperature || '';
                cells[6].textContent = log.evening_signature || '';
            });
        }

        function clearTemperatureHumidityTable() {
            const table = document.getElementById("temperature-humidity-log");
            const rows = table.querySelectorAll("tbody tr");

            rows.forEach(row => {
                const cells = row.querySelectorAll("td");
                for (let i = 1; i < cells.length; i++) {
                    cells[i].textContent = '';
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            // Set default date to current month/year
            const today = new Date();
            const currentDate = today.toISOString().split('T')[0];
            document.getElementById('dateFilter4').value = currentDate;

            // Load data for default date
            fetchReagentVerificationLog();
        });



        async function submitReagentVerificationLog() {
            const submitBtn = document.querySelector('#reagent-verification-log button.btn-warning');
            const originalText = submitBtn.textContent;

            try {
                submitBtn.textContent = 'Saving...';
                submitBtn.disabled = true;

                const monthYear = document.getElementById('dateFilter4').value;
                if (!monthYear) {
                    throw new Error('Please select a valid date');
                }

                const table = document.getElementById('reagent-verification-log');
                const rows = table.querySelectorAll('tbody tr');
                const logs = [];

                rows.forEach(row => {
                    const cells = row.querySelectorAll('td');
                    if (cells.length < 15) return; // Skip incomplete rows

                    const log = {
                        date: cells[0]?.querySelector('input')?.value || null,
                        reagent_kit: cells[1]?.textContent.trim() || null,
                        old_reagent_lot_no: cells[2]?.textContent.trim() || null,
                        old_reagent_expiry_date: cells[3]?.querySelector('input')?.value || null,
                        new_reagent_lot_no: cells[4]?.textContent.trim() || null,
                        new_reagent_expiry_date: cells[5]?.querySelector('input')?.value || null,
                        analytes: cells[6]?.textContent.trim() || null,
                        materials_used: cells[7]?.textContent.trim() || null,
                        specimen_source: cells[8]?.textContent.trim() || null,
                        result_old_lot: cells[9]?.textContent.trim() || null,
                        result_new_lot: cells[10]?.textContent.trim() || null,
                        observed_variation: cells[11]?.textContent.trim() || null,
                        remarks: cells[12]?.textContent.trim() || null,
                        scientific_staff_signature: cells[13]?.textContent.trim() || null,
                        verified_by: cells[14]?.textContent.trim() || null
                    };

                    // Only add if at least required fields have data
                    if (log.date || log.reagent_kit || log.old_reagent_lot_no || log.new_reagent_lot_no) {
                        logs.push(log);
                    }
                });

                if (logs.length === 0) {
                    throw new Error('No valid data to save');
                }

                const response = await fetch('/save-reagent-verification-log', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        month_year: monthYear,
                        logs: logs
                    })
                });

                const result = await response.json();

                if (!response.ok) {
                    throw new Error(result.message || 'Failed to save data');
                }

                alert('Data saved successfully!');
                fetchReagentVerificationLog(); // Refresh the data

            } catch (error) {
                console.error('Error:', error);
                alert('Error: ' + error.message);
            } finally {
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }
        }

        function newRowToTable4() {
            const tbody = document.querySelector('#reagent-verification-log tbody');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                                                                                                                                                                                    <td><input type="date" class="form-control"></td>
                                                                                                                                                                                    <td contenteditable="true"></td>
                                                                                                                                                                                    <td contenteditable="true"></td>
                                                                                                                                                                                    <td><input type="date" class="form-control"></td>
                                                                                                                                                                                    <td contenteditable="true"></td>
                                                                                                                                                                                    <td><input type="date" class="form-control"></td>
                                                                                                                                                                                    <td contenteditable="true"></td>
                                                                                                                                                                                    <td contenteditable="true"></td>
                                                                                                                                                                                    <td contenteditable="true"></td>
                                                                                                                                                                                    <td contenteditable="true"></td>
                                                                                                                                                                                    <td contenteditable="true"></td>
                                                                                                                                                                                    <td contenteditable="true"></td>
                                                                                                                                                                                    <td contenteditable="true"></td>
                                                                                                                                                                                    <td contenteditable="true"></td>
                                                                                                                                                                                    <td contenteditable="true"></td>
                                                                                                                                                                                `;
            tbody.appendChild(newRow);
            newRow.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }
        // document.getElementById("dateFilter4").addEventListener("change", function () {
        //     if (this.value) {  // Check if a valid date is selected
        //         fetchReagentVerificationLog();
        //     }
        // });
        async function fetchReagentVerificationLog() {
            const loadingIndicator = document.createElement('div');
            loadingIndicator.className = 'text-center p-3';
            loadingIndicator.innerHTML = '<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>';

            const tbody = document.querySelector('#reagent-verification-log tbody');
            tbody.innerHTML = '';
            tbody.appendChild(loadingIndicator);

            const monthYear = document.getElementById('dateFilter4').value;
            if (!monthYear) return;

            try {
                const response = await fetch('/fetch-reagent-verification-log', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        month_year: monthYear
                    })
                });

                if (!response.ok) {
                    throw new Error(`Server returned ${response.status}`);
                }

                const data = await response.json();
                tbody.innerHTML = ''; // Clear loading indicator

                if (data.success && data.logs && data.logs.length > 0) {
                    populateReagentVerificationTable(data.logs);
                } else {
                    // Add one empty row if no data found
                    newRowToTable4();
                }
            } catch (error) {
                console.error('Error:', error);
                tbody.innerHTML = '';
                alert('Error loading data: ' + error.message);
                newRowToTable4(); // Ensure at least one row exists
            }
        }


        function populateReagentVerificationTable(logs) {
            const tbody = document.querySelector('#reagent-verification-log tbody');
            tbody.innerHTML = ''; // Clear existing rows

            logs.forEach(log => {
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                                                                                                                                                                                            <td><input type="date" class="form-control" value="${log.date ? log.date.split('T')[0] : ''}"></td>
                                                                                                                                                                                            <td contenteditable="true">${log.reagent_kit || ''}</td>
                                                                                                                                                                                            <td contenteditable="true">${log.old_reagent_lot_no || ''}</td>
                                                                                                                                                                                            <td><input type="date" class="form-control" value="${log.old_reagent_expiry_date ? log.old_reagent_expiry_date.split('T')[0] : ''}"></td>
                                                                                                                                                                                            <td contenteditable="true">${log.new_reagent_lot_no || ''}</td>
                                                                                                                                                                                            <td><input type="date" class="form-control" value="${log.new_reagent_expiry_date ? log.new_reagent_expiry_date.split('T')[0] : ''}"></td>
                                                                                                                                                                                            <td contenteditable="true">${log.analytes || ''}</td>
                                                                                                                                                                                            <td contenteditable="true">${log.materials_used || ''}</td>
                                                                                                                                                                                            <td contenteditable="true">${log.specimen_source || ''}</td>
                                                                                                                                                                                            <td contenteditable="true">${log.result_old_lot || ''}</td>
                                                                                                                                                                                            <td contenteditable="true">${log.result_new_lot || ''}</td>
                                                                                                                                                                                            <td contenteditable="true">${log.observed_variation || ''}</td>
                                                                                                                                                                                            <td contenteditable="true">${log.remarks || ''}</td>
                                                                                                                                                                                            <td contenteditable="true">${log.scientific_staff_signature || ''}</td>
                                                                                                                                                                                            <td contenteditable="true">${log.verified_by || ''}</td>
                                                                                                                                                                                        `;
                tbody.appendChild(newRow);
            });

            // Always add one empty row at the end
            newRowToTable4();
        }


        function clearReagentVerificationTable() {
            const table = document.getElementById("reagent-verification-log");
            const tbody = table.querySelector("tbody");

            // Clear all rows except the first one (template)
            while (tbody.rows.length > 1) {
                tbody.deleteRow(1);
            }

            // Reset the template row
            const firstRow = tbody.rows[0];
            const cells = firstRow.querySelectorAll("td");

            // Reset date inputs
            cells[0].querySelector("input").value = '';
            cells[3].querySelector("input").value = '';
            cells[5].querySelector("input").value = '';

            // Reset contenteditable cells
            for (let i = 1; i < cells.length; i++) {
                if (cells[i].hasAttribute("contenteditable")) {
                    cells[i].textContent = '';
                }
            }
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize event listeners
            document.getElementById('reagent_month_year').addEventListener('change', function () {
                fetchReagentUsageLogs();
            });

            document.getElementById('reagent_department').addEventListener('change', function () {
                if (document.getElementById('reagent_month_year').value) {
                    fetchReagentUsageLogs();
                }
            });
        });

        function submitReagentForm() {
            let department = document.getElementById("reagent_department").value.trim();
            let monthYear = document.getElementById("reagent_month_year").value.trim();
            let tableRows = document.querySelectorAll("#reagent_log_table tbody tr");
            let logs = [];

            // Validation for empty fields
            if (!department || !monthYear) {
                alert("Department and Month/Year are required.");
                return;
            }

            tableRows.forEach(row => {
                let inputs = row.querySelectorAll("td input");
                if (inputs.length === 6) {
                    let logEntry = {
                        date: inputs[0].value.trim(),
                        reagent_name: inputs[1].value.trim(),
                        lot_no: inputs[2].value.trim(),
                        expiry_date: inputs[3].value.trim(),
                        scientific_staff_signature: inputs[4].value.trim(),
                        supervisor_signature: inputs[5].value.trim(),
                    };

                    // Check if any field is empty
                    if (Object.values(logEntry).some(field => field === "")) {
                        alert("All fields in the table must be filled.");
                        return;
                    }

                    logs.push(logEntry);
                }
            });

            if (logs.length === 0) {
                alert("Please fill at least one row of data.");
                return;
            }

            fetch("/reagent-logs/store", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ department, month_year: monthYear, logs })
            })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    location.reload();
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert("An error occurred while saving. Please try again.");
                });
        }

        function fetchReagentUsageLogs() {
            const department = document.getElementById("reagent_department").value.trim();
            const monthYear = document.getElementById("reagent_month_year").value.trim();

            if (!monthYear) {
                console.error("Month/Year is required");
                return;
            }

            fetch("/reagent-logs/fetch", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    month_year: monthYear,
                    department: department
                })
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`Server error: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    if (!data.success) {
                        throw new Error(data.message || "Failed to fetch logs");
                    }

                    if (!data.logs || data.logs.length === 0) {
                        clearReagentUsageTable();
                        return;
                    }

                    populateReagentUsageTable(data.logs);
                })
                .catch(error => {
                    console.error("Error fetching logs:", error);
                    alert("Error fetching logs: " + error.message);
                });
        }

        function populateReagentUsageTable(logs) {
            const table = document.getElementById("reagent_log_table");
            const tbody = table.querySelector("tbody");

            // Clear all existing rows
            tbody.innerHTML = '';

            // Add a template row if empty
            if (tbody.rows.length === 0) {
                tbody.innerHTML = `
                                                                                                                                                <tr>
                                                                                                                                                    <td><input type="date" class="form-control" required></td>
                                                                                                                                                    <td><input type="text" class="form-control" required></td>
                                                                                                                                                    <td><input type="text" class="form-control" required></td>
                                                                                                                                                    <td><input type="date" class="form-control" required></td>
                                                                                                                                                    <td><input type="text" class="form-control" required></td>
                                                                                                                                                    <td><input type="text" class="form-control" required></td>
                                                                                                                                                </tr>
                                                                                                                                            `;
            }

            logs.forEach(log => {
                const newRow = tbody.insertRow();
                newRow.innerHTML = `
                                                                                                                                                <td><input type="date" class="form-control" value="${formatDateForInput(log.date)}" required></td>
                                                                                                                                                <td><input type="text" class="form-control" value="${log.reagent_name}" required></td>
                                                                                                                                                <td><input type="text" class="form-control" value="${log.lot_no}" required></td>
                                                                                                                                                <td><input type="date" class="form-control" value="${formatDateForInput(log.expiry_date)}" required></td>
                                                                                                                                                <td><input type="text" class="form-control" value="${log.scientific_staff_signature}" required></td>
                                                                                                                                                <td><input type="text" class="form-control" value="${log.supervisor_signature}" required></td>
                                                                                                                                            `;
            });
        }

        function formatDateForInput(dateString) {
            if (!dateString) return '';
            const date = new Date(dateString);
            return date.toISOString().split('T')[0];
        }

        function clearReagentUsageTable() {
            const tbody = document.querySelector("#reagent_log_table tbody");
            tbody.innerHTML = `
                                                                                                                                            <tr>
                                                                                                                                                <td><input type="date" class="form-control" required></td>
                                                                                                                                                <td><input type="text" class="form-control" required></td>
                                                                                                                                                <td><input type="text" class="form-control" required></td>
                                                                                                                                                <td><input type="date" class="form-control" required></td>
                                                                                                                                                <td><input type="text" class="form-control" required></td>
                                                                                                                                                <td><input type="text" class="form-control" required></td>
                                                                                                                                            </tr>
                                                                                                                                        `;
        }

        function addNewReagentRow() {
            const tbody = document.querySelector("#reagent_log_table tbody");
            const newRow = tbody.insertRow();
            newRow.innerHTML = `
                                                                                                                                            <td><input type="date" class="form-control" required></td>
                                                                                                                                            <td><input type="text" class="form-control" required></td>
                                                                                                                                            <td><input type="text" class="form-control" required></td>
                                                                                                                                            <td><input type="date" class="form-control" required></td>
                                                                                                                                            <td><input type="text" class="form-control" required></td>
                                                                                                                                            <td><input type="text" class="form-control" required></td>
                                                                                                                                        `;

            newRow.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize the table with one empty row
            initializeRetainedSampleTable();

            // Set up event listener for month/year change
            const monthYearInput = document.getElementById('retained_month_year');
            monthYearInput.addEventListener('change', function () {
                const monthYear = this.value.trim();
                if (monthYear) {
                    fetchRetainedSampleData(monthYear);
                }
            });
        });

        function initializeRetainedSampleTable() {
            const tbody = document.querySelector('#retained_sample_table tbody');
            tbody.innerHTML = ''; // Clear any existing rows

            // Add one empty row to start with
            addNewRetainedSampleRow(false);
        }

        function submitRetainedSampleForm() {
            const monthYear = document.getElementById('retained_month_year').value.trim();
            // const rowDate = document.getElementById('rowDate2').value.trim();
            if (!monthYear) {
                alert('Month/Year is required!');
                return;
            }



            const allDateInputs = document.querySelectorAll('#retained_sample_table input[type="date"]');
            let isValid = true;

            allDateInputs.forEach(input => {
                if (!input.value) {
                    input.classList.add('is-invalid'); // optional styling
                    isValid = false;
                } else {
                    input.classList.remove('is-invalid');
                }
            });

            if (!isValid) {
                e.preventDefault(); // prevent form submission
                alert('Please fill in all required date fields.');
            }
            // if (!rowDate) {
            //     alert('Please select the date.');
            //     return;
            // }

            const rows = document.querySelectorAll('#retained_sample_table tbody tr');
            const logs = [];

            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                if (cells.length === 9) { // Ensure we have all expected cells
                    const logEntry = {
                        date: cells[0].querySelector('input')?.value || '',
                        sample_id: cells[1].querySelector('input')?.value || '',
                        test_parameter: cells[2].textContent.trim(),
                        initial_result: cells[3].textContent.trim(),
                        result_next_day: cells[4].textContent.trim(),
                        variation_in_result: cells[5].textContent.trim(),
                        is_variation_accepted: cells[6].textContent.trim(),
                        done_by: cells[7].textContent.trim(),
                        verified_by: cells[8].textContent.trim()
                    };

                    // Only add if at least one field has data
                    if (Object.values(logEntry).some(value => value !== '')) {
                        logs.push(logEntry);
                    }
                }
            });

            if (logs.length === 0) {
                alert('No data to save!');
                return;
            }

            fetch('/save-retained-sample-verification', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    month_year: monthYear,
                    logs: logs
                })
            })
                .then(response => response.json())
                .then(data => {
                    alert(data.message || 'Data saved successfully!');
                    fetchRetainedSampleData(monthYear); // Refresh the data
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error saving data: ' + error.message);
                });
        }

        function fetchRetainedSampleData(monthYear) {
            fetch('/fetch-retained-sample-verification', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    month_year: monthYear
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.logs && data.logs.length > 0) {
                        populateRetainedSampleTable(data.logs);
                    } else {
                        clearRetainedSampleTable();
                    }
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                    alert('Error fetching data: ' + error.message);
                });
        }

        function populateRetainedSampleTable(logs) {
            const tbody = document.querySelector('#retained_sample_table tbody');
            tbody.innerHTML = ''; // Clear all rows

            logs.forEach(log => {
                const row = document.createElement('tr');
                row.innerHTML = `
                                                                    <td><input type="date" class="form-control" name="sample_date[]" value="${log.date ? log.date.split('T')[0] : ''}" required></td>
                                                                                                                                <td><input type="text" class="form-control" value="${log.sample_id || ''}"></td>
                                                                                                                                <td contenteditable="true">${log.test_parameter || ''}</td>
                                                                                                                                <td contenteditable="true">${log.initial_result || ''}</td>
                                                                                                                                <td contenteditable="true">${log.result_next_day || ''}</td>
                                                                                                                                <td contenteditable="true">${log.variation_in_result || ''}</td>
                                                                                                                                <td contenteditable="true">${log.is_variation_accepted || ''}</td>
                                                                                                                                <td contenteditable="true">${log.done_by || ''}</td>
                                                                                                                                <td contenteditable="true">${log.verified_by || ''}</td>
                                                                                                                            `;
                tbody.appendChild(row);
            });

            // Ensure there's at least one empty row
            if (logs.length === 0) {
                addNewRetainedSampleRow(false);
            }
        }

        function clearRetainedSampleTable() {
            const tbody = document.querySelector('#retained_sample_table tbody');
            tbody.innerHTML = '';
            addNewRetainedSampleRow(false); // Add one empty row
        }

        function addNewRetainedSampleRow(scroll = true) {
            const tbody = document.querySelector('#retained_sample_table tbody');
            const row = document.createElement('tr');
            row.innerHTML = `
                                                        <td><input type="date" class="form-control" name="sample_date[]" required></td>
                                                                                                                            <td><input type="text" class="form-control"></td>
                                                                                                                            <td contenteditable="true"></td>
                                                                                                                            <td contenteditable="true"></td>
                                                                                                                            <td contenteditable="true"></td>
                                                                                                                            <td contenteditable="true"></td>
                                                                                                                            <td contenteditable="true"></td>
                                                                                                                            <td contenteditable="true"></td>
                                                                                                                            <td contenteditable="true"></td>
                                                                                                                        `;
            tbody.appendChild(row);

            if (scroll) {
                row.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize the table with one empty row
            initializeCriticalCallTable();

            // Set up event listeners
            document.getElementById('critical_call_month_year').addEventListener('change', function () {
                const monthYear = this.value;
                if (monthYear) {
                    fetchCriticalCallData(monthYear);
                }
            });

            document.getElementById('submitCriticalCallLog').addEventListener('click', submitCriticalCallForm);
            document.getElementById('addCriticalCallRowBtn').addEventListener('click', addNewCriticalCallRow);
        });

        function initializeCriticalCallTable() {
            const tbody = document.querySelector('#critical_call_table tbody');
            tbody.innerHTML = '';
            addNewCriticalCallRow(false); // Add one empty row
        }

        function submitCriticalCallForm() {
            const monthYear = document.getElementById('critical_call_month_year').value;
            if (!monthYear) {
                alert('Month/Year is required!');
                return;
            }


            const allDateInputs = document.querySelectorAll('#critical_call_table tbody input[type="date"]');
            let isValid = true;

            allDateInputs.forEach(input => {
                if (!input.value) {
                    input.classList.add('is-invalid'); // optional styling
                    isValid = false;
                } else {
                    input.classList.remove('is-invalid');
                }
            });

            if (!isValid) {
                e.preventDefault(); // prevent form submission
                alert('Please fill in all required date fields.');
            }

            const rows = document.querySelectorAll('#critical_call_table tbody tr');
            const logs = [];

            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                if (cells.length === 10) { // Ensure we have all expected cells
                    const logEntry = {
                        date: cells[0].querySelector('input')?.value || '',
                        patient_id: cells[1].textContent.trim(),
                        test_parameter: cells[2].textContent.trim(),
                        initial_value: cells[3].textContent.trim(),
                        cross_check_value: cells[4].textContent.trim(),
                        reporting_time: cells[5].textContent.trim(),
                        concern_clinician_patient_informed: cells[6].textContent.trim(),
                        readback_value: cells[7].textContent.trim(),
                        time_of_informing: cells[8].textContent.trim(),
                        signature_of_person_informing: cells[9].textContent.trim()
                    };

                    // Only add if at least one field has data
                    if (Object.values(logEntry).some(value => value !== '')) {
                        logs.push(logEntry);
                    }
                }
            });

            if (logs.length === 0) {
                alert('No data to save!');
                return;
            }

            fetch('/save-critical-call-monitoring-log', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    month_year: monthYear,
                    logs: logs
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Data saved successfully!');
                        fetchCriticalCallData(monthYear); // Refresh the data
                    } else {
                        throw new Error(data.message || 'Failed to save data');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error saving data: ' + error.message);
                });
        }

        function fetchCriticalCallData(monthYear) {
            fetch('/fetch-critical-call-logs', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    month_year: monthYear
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.logs && data.logs.length > 0) {
                        populateCriticalCallTable(data.logs);
                    } else {
                        clearCriticalCallTable();
                    }
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                    alert('Error fetching data: ' + error.message);
                });
        }

        function populateCriticalCallTable(logs) {
            const tbody = document.querySelector('#critical_call_table tbody');
            tbody.innerHTML = ''; // Clear all rows

            logs.forEach(log => {
                const row = document.createElement('tr');
                row.innerHTML = `
                                        <td><input type="date" class="form-control" value="${log.date ? log.date.split('T')[0] : ''}"></td>
                                        <td contenteditable="true">${log.patient_id || ''}</td>
                                        <td contenteditable="true">${log.test_parameter || ''}</td>
                                        <td contenteditable="true">${log.initial_value || ''}</td>
                                        <td contenteditable="true">${log.cross_check_value || ''}</td>
                                        <td contenteditable="true">${log.reporting_time || ''}</td>
                                        <td contenteditable="true">${log.concern_clinician_patient_informed || ''}</td>
                                        <td contenteditable="true">${log.readback_value || ''}</td>
                                        <td contenteditable="true">${log.time_of_informing || ''}</td>
                                        <td contenteditable="true">${log.signature_of_person_informing || ''}</td>
                                    `;
                tbody.appendChild(row);
            });

            // Ensure there's at least one empty row
            if (logs.length === 0) {
                addNewCriticalCallRow(false);
            }
        }

        function clearCriticalCallTable() {
            const tbody = document.querySelector('#critical_call_table tbody');
            tbody.innerHTML = '';
            addNewCriticalCallRow(false); // Add one empty row
        }

        function addNewCriticalCallRow(scroll = true) {
            const tbody = document.querySelector('#critical_call_table tbody');
            const row = document.createElement('tr');
            row.innerHTML = `
                                    <td><input type="date" class="form-control"></td>
                                    <td contenteditable="true"></td>
                                    <td contenteditable="true"></td>
                                    <td contenteditable="true"></td>
                                    <td contenteditable="true"></td>
                                    <td contenteditable="true"></td>
                                    <td contenteditable="true"></td>
                                    <td contenteditable="true"></td>
                                    <td contenteditable="true"></td>
                                    <td contenteditable="true"></td>
                                `;
            tbody.appendChild(row);

            if (scroll) {
                row.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize the table with one empty row
            initializeReportAmendmentTable();

            // Set up event listeners
            document.getElementById('report_month_year').addEventListener('change', function () {
                const monthYear = this.value;
                if (monthYear) {
                    fetchReportAmendmentData(monthYear);
                }
            });

            document.getElementById('submitReportAmendmentBtn').addEventListener('click', submitReportAmendmentForm);
            document.getElementById('addReportAmendmentRowBtn').addEventListener('click', addNewReportAmendmentRow);
        });

        function initializeReportAmendmentTable() {
            const tbody = document.querySelector('#report_amendment_table tbody');
            tbody.innerHTML = '';
            addNewReportAmendmentRow(false); // Add one empty row
        }

        function submitReportAmendmentForm() {
            const monthYear = document.getElementById('report_month_year').value;
            if (!monthYear) {
                alert('Month/Year is required!');
                return;
            }


            const allDateInputs = document.querySelectorAll('#report_amendment_table input[type="date"]');
            let isValid = true;

            allDateInputs.forEach(input => {
                if (!input.value) {
                    input.classList.add('is-invalid'); // optional styling
                    isValid = false;
                } else {
                    input.classList.remove('is-invalid');
                }
            });

            if (!isValid) {
                e.preventDefault(); // prevent form submission
                alert('Please fill in all required date fields.');
            }

            const rows = document.querySelectorAll('#report_amendment_table tbody tr');
            const logs = [];

            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                if (cells.length === 7) { // Ensure we have all expected cells
                    const logEntry = {
                        date: cells[0].querySelector('input')?.value || '',
                        visit_no: cells[1].textContent.trim(),
                        parameter: cells[2].textContent.trim(),
                        reason_of_amendment: cells[3].textContent.trim(),
                        amendment_done_by: cells[4].textContent.trim(),
                        original_result: cells[5].textContent.trim(),
                        final_result: cells[6].textContent.trim()
                    };

                    // Only add if at least one field has data
                    if (Object.values(logEntry).some(value => value !== '')) {
                        logs.push(logEntry);
                    }
                }
            });

            if (logs.length === 0) {
                alert('No data to save!');
                return;
            }

            fetch('/save-report-amendment-log', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    month_year: monthYear,
                    logs: logs
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Data saved successfully!');
                        fetchReportAmendmentData(monthYear); // Refresh the data
                    } else {
                        throw new Error(data.message || 'Failed to save data');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error saving data: ' + error.message);
                });
        }

        function fetchReportAmendmentData(monthYear) {
            fetch('/fetch-report-amendment-logs', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    month_year: monthYear
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.logs && data.logs.length > 0) {
                        populateReportAmendmentTable(data.logs);
                    } else {
                        clearReportAmendmentTable();
                    }
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                    alert('Error fetching data: ' + error.message);
                });
        }

        function populateReportAmendmentTable(logs) {
            const tbody = document.querySelector('#report_amendment_table tbody');
            tbody.innerHTML = ''; // Clear all rows

            logs.forEach(log => {
                const row = document.createElement('tr');
                row.innerHTML = `
                                                                                                                <td><input type="date" class="form-control" value="${log.date ? log.date.split('T')[0] : ''}"></td>
                                                                                                                <td contenteditable="true">${log.visit_no || ''}</td>
                                                                                                                <td contenteditable="true">${log.parameter || ''}</td>
                                                                                                                <td contenteditable="true">${log.reason_of_amendment || ''}</td>
                                                                                                                <td contenteditable="true">${log.amendment_done_by || ''}</td>
                                                                                                                <td contenteditable="true">${log.original_result || ''}</td>
                                                                                                                <td contenteditable="true">${log.final_result || ''}</td>
                                                                                                            `;
                tbody.appendChild(row);
            });

            // Ensure there's at least one empty row
            if (logs.length === 0) {
                addNewReportAmendmentRow(false);
            }
        }

        function clearReportAmendmentTable() {
            const tbody = document.querySelector('#report_amendment_table tbody');
            tbody.innerHTML = '';
            addNewReportAmendmentRow(false); // Add one empty row
        }

        function addNewReportAmendmentRow(scroll = true) {
            const tbody = document.querySelector('#report_amendment_table tbody');
            const row = document.createElement('tr');
            row.innerHTML = `
                                                                                                            <td><input type="date" class="form-control"></td>
                                                                                                            <td contenteditable="true"></td>
                                                                                                            <td contenteditable="true"></td>
                                                                                                            <td contenteditable="true"></td>
                                                                                                            <td contenteditable="true"></td>
                                                                                                            <td contenteditable="true"></td>
                                                                                                            <td contenteditable="true"></td>
                                                                                                        `;
            tbody.appendChild(row);

            if (scroll) {
                row.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }
        }
    </script>

    <script>




        function submitPersonnelValidationRecord() {
            alert("Submitting personnel validation record...");

            let table = document.querySelector("#personnel_validation_table tbody");
            if (!table) {
                alert("Log table not found!");
                return;
            }

            let rows = table.querySelectorAll("tr");
            let data = [];

            // Collect form data
            const date = document.getElementById("record_date").value;
            const departmentName = document.getElementById("department_name").value;
            const testValidation = document.getElementById("test_validation").value;
            const method = document.getElementById("method").value;
            const personInvolved = document.getElementById("person_involved").value;

            // Validate required fields
            if (!date || !departmentName) {
                alert("Date and Department Name are required!");
                return;
            }

            // Collect table data
            rows.forEach(row => {
                let cells = row.querySelectorAll("td");
                if (cells.length === 0) return;

                data.push({
                    barcode_no: cells[0]?.innerText.trim() || null,
                    visit_id_no: cells[1]?.innerText.trim() || null,
                    result_a: cells[2]?.innerText.trim() || null,
                    result_b: cells[3]?.innerText.trim() || null,
                    acceptable_unacceptable: cells[4]?.innerText.trim() || null,
                });
            });

            if (data.length === 0) {
                alert("No data to save!");
                return;
            }

            // Submit data via AJAX
            fetch("/save-personnel-validation-record", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({
                    date: date,
                    department_name: departmentName,
                    test_validation: testValidation,
                    method: method,
                    person_involved: personInvolved,
                    logs: data,
                }),
            })
                .then(response => response.json())
                .then(result => {
                    alert(result.message || "Log saved successfully!");
                    console.log(result);
                })
                .catch(error => {
                    alert("Error submitting log: " + error.message);
                    console.error(error);
                });
        }
        function newRowToTable10() {
            let table = document.querySelector("#personnel_validation_table tbody");
            let newRow = document.createElement("tr");

            for (let i = 0; i < 5; i++) {
                let cell = document.createElement("td");
                cell.setAttribute("contenteditable", "true");
                newRow.appendChild(cell);
            }

            table.appendChild(newRow);
        }

        function submitCorrectivePreventiveLog() {
            alert("Submitting corrective/preventive log...");

            // Collect form data using unique IDs
            const dateOfAction = document.getElementById("date_of_action").value;
            const surveyName = document.getElementById("survey_name").value;
            const sampleDetails = document.getElementById("sample_details").value;
            const eqasSampleRunDate = document.getElementById("eqas_sample_run_date").value;
            const outlierResults = document.getElementById("outlier_results").value;
            const eqasTrends = document.getElementById("eqas_trends").value;
            const otherSpecify = document.getElementById("other_specify").value;
            const immediateActionTaken = document.getElementById("immediate_action_taken").value;
            const commentOnReAssayedResults = document.getElementById("comment_on_re_assayed_results").value;
            const preventiveAction = document.getElementById("preventive_action").value;
            const documentsAttached = document.getElementById("documents_attached").value;
            const conclusion = document.getElementById("conclusion").value;
            const correctiveActionTakenBy = document.getElementById("corrective_action_taken_by").value;
            const correctiveActionReviewedBy = document.getElementById("corrective_action_reviewed_by").value;
            const remark = document.getElementById("remark").value;

            // Collect root cause analysis data
            const rootCauseAnalysis = [];
            const rootCauseTable = document.getElementById("root_cause_table").querySelector("tbody");
            rootCauseTable.querySelectorAll("tr").forEach(row => {
                const cells = row.querySelectorAll("td");
                rootCauseAnalysis.push({
                    sr_no: cells[0]?.innerText.trim() || null,
                    root_cause: cells[1]?.innerText.trim() || null,
                    acceptable: cells[2]?.innerText.trim() || null,
                    unacceptable: cells[3]?.innerText.trim() || null,
                });
            });

            // Collect re-assayed results data
            const reAssayedResults = [];
            const reAssayedTable = document.getElementById("re_assayed_table").querySelector("tbody");
            reAssayedTable.querySelectorAll("tr").forEach(row => {
                const cells = row.querySelectorAll("td");
                reAssayedResults.push({
                    sr_no: cells[0]?.innerText.trim() || null,
                    analyte: cells[1]?.innerText.trim() || null,
                    previous_results: cells[2]?.innerText.trim() || null,
                    re_assayed_results: cells[3]?.innerText.trim() || null,
                    acceptability_limits: cells[4]?.innerText.trim() || null,
                });
            });

            // Validate required fields
            if (!dateOfAction || !surveyName) {
                alert("Date of Action and Survey Name are required!");
                return;
            }

            // Submit data via AJAX
            fetch("/save-corrective-preventive-log", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({
                    date_of_action: dateOfAction,
                    survey_name: surveyName,
                    sample_details: sampleDetails,
                    eqas_sample_run_date: eqasSampleRunDate,
                    outlier_results: outlierResults,
                    eqas_trends: eqasTrends,
                    root_cause_analysis: rootCauseAnalysis,
                    other_specify: otherSpecify,
                    immediate_action_taken: immediateActionTaken,
                    re_assayed_results: reAssayedResults,
                    comment_on_re_assayed_results: commentOnReAssayedResults,
                    preventive_action: preventiveAction,
                    documents_attached: documentsAttached,
                    conclusion: conclusion,
                    corrective_action_taken_by: correctiveActionTakenBy,
                    corrective_action_reviewed_by: correctiveActionReviewedBy,
                    remark: remark,
                }),
            })
                .then(response => response.json())
                .then(result => {
                    alert(result.message || "Log saved successfully!");
                    console.log(result);
                })
                .catch(error => {
                    alert("Error submitting log: " + error.message);
                    console.error(error);
                });
        }

        function newRowToTable11(tableId) {
            let table = document.querySelector(`#${tableId} tbody`);
            let newRow = document.createElement("tr");

            for (let i = 0; i < 5; i++) {
                let cell = document.createElement("td");
                cell.setAttribute("contenteditable", "true");
                newRow.appendChild(cell);
            }

            table.appendChild(newRow);
        }




        function generateDaysHeader(headerId) {
            const header = document.getElementById(headerId);
            header.innerHTML = ""; // Clear existing content

            // Add 31 days headers
            for (let i = 1; i <= 31; i++) {
                const th = document.createElement("th");
                th.innerHTML = `<p><strong>${i}</strong></p>`;
                header.appendChild(th);
            }
        }

        // Function to generate table rows
        function generateTableRow(tableBodyId, rowLabel, rowspan = 1) {
            const tableBody = document.getElementById(tableBodyId);
            const row = document.createElement("tr");

            // Add row label
            const labelCell = document.createElement("td");
            labelCell.setAttribute("rowspan", rowspan);
            labelCell.innerHTML = `<p><strong>${rowLabel}</strong></p>`;
            row.appendChild(labelCell);

            // Add question cell (empty or with a different value if needed)
            const questionCell = document.createElement("td");
            questionCell.innerHTML = `<p></p>`; // Leave empty or add a different value
            row.appendChild(questionCell);

            // Add 31 days cells
            for (let i = 1; i <= 31; i++) {
                const dayCell = document.createElement("td");
                dayCell.setAttribute("contenteditable", "true");
                row.appendChild(dayCell);
            }

            tableBody.appendChild(row);
        }

        // Generate headers and rows for all tables
        document.addEventListener("DOMContentLoaded", () => {
            // Clear existing rows (if any)
            document.getElementById("floor_table_body").innerHTML = "";
            document.getElementById("dustbins_table_body").innerHTML = "";
            document.getElementById("counters_table_body").innerHTML = "";

            document.getElementById("equipment_table_body").innerHTML = "";
            document.getElementById("stffsignature_body").innerHTML = "";
            document.getElementById("supervisor_signature_body").innerHTML = "";


            // Generate headers
            // generateDaysHeader("floor_days_header");
            // generateDaysHeader("dustbins_days_header");
            // generateDaysHeader("counters_days_header");

            // generateDaysHeader("equipment_days_header");



            // Generate rows for Floor table
            generateTableRow("floor_table_body", "Free from Debris?");
            generateTableRow("floor_table_body", "Sufficient aisle space");
            generateTableRow("floor_table_body", "Disinfecting of floor?");

            // Generate rows for Dustbins table
            generateTableRow("dustbins_table_body", "Availability of Covered dust bin?");
            generateTableRow("dustbins_table_body", "Are all bins emptied?");

            // Generate rows for Counters table
            generateTableRow("counters_table_body", "Work Surface Clean?");
            generateTableRow("counters_table_body", "All material Neat and Orderly?");
            generateTableRow("counters_table_body", "Disinfecting of bench top?");


            generateTableRow("equipment_table_body", "Cleaning of Equipment");
            generateTableRow("equipment_table_body", "Daily Maintenance");
        });

        function saveOrUpdateDailyCleaningChecklist() {
            const checklistId = document.getElementById("checklist_id").value.trim();
            const isUpdate = !!checklistId;

            alert(isUpdate ? "Updating daily cleaning checklist..." : "Submitting daily cleaning checklist...");

            const monthYear = document.getElementById("daily_cleaning_month_year").value;
            if (!monthYear) {
                alert("Month/Year is required!");
                return;
            }

            // Helper to collect table data
            const collectTableData = (tableId) => {
                const table = document.getElementById(tableId);
                const rows = table.querySelectorAll("tbody tr");
                const data = [];

                rows.forEach(row => {
                    const cells = row.querySelectorAll("td");
                    const rowData = {
                        question: cells[0]?.innerText.trim() || null,
                        days: {},
                    };

                    for (let i = 2; i <= 32; i++) {
                        rowData.days[`day_${i - 1}`] = cells[i]?.innerText.trim() || null;
                    }

                    data.push(rowData);
                });

                return data;
            };

            const payload = {
                checklist_id: checklistId || null,
                month_year: monthYear,
                floor_data: collectTableData("floor_table"),
                dustbins_data: collectTableData("dustbins_table"),
                counters_data: collectTableData("counters_table"),
                equipment_data: collectTableData("equipment_table"),
                staff_signature: collectTableData("stffsignature_table"),
                supervisor_signature: collectTableData("supervisor_signature_table"),
            };

            fetch("/save-daily-cleaning-checklist", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify(payload),
            })
                .then(response => response.json())
                .then(result => {
                    alert(result.message || (isUpdate ? "Checklist updated successfully!" : "Checklist submitted successfully!"));
                    console.log(result);

                    // Optional: refresh or update the checklist_id after submission
                    if (!checklistId && result.id) {
                        document.getElementById("checklist_id").value = result.id;
                    }
                })
                .catch(error => {
                    alert("Error: " + error.message);
                    console.error(error);
                });
        }



        // Auto-fetch when month/year changes
        document.getElementById("daily_cleaning_month_year").addEventListener("change", function () {
            const monthYear = this.value;
            if (monthYear) {
                fetchDailyCleaningData(monthYear);
            }
        });

        function fetchDailyCleaningData(monthYear) {
            fetch("/fetch-daily-cleaning-checklist", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({
                    month_year: monthYear,
                }),
            })
                .then(response => response.json())
                .then(data => {
                    if (!data.success || !data.data) {
                        clearDailyCleaningTables();
                        return;
                    }
                    document.getElementById("checklist_id").value = data.data.id || "";
                    populateDailyCleaningTables(data.data);
                })
                .catch(error => {
                    console.error("Error fetching log:", error);
                });
        }

        function populateDailyCleaningTables(checklistData) {
            // Clear all tables first
            clearDailyCleaningTables();

            // Populate each table
            populateTable("floor_table_body", checklistData.floor_data);
            populateTable("dustbins_table_body", checklistData.dustbins_data);
            populateTable("counters_table_body", checklistData.counters_data);
            populateTable("equipment_table_body", checklistData.equipment_data);
            populateTable("stffsignature_body", checklistData.staff_signature);
            populateTable("supervisor_signature_body", checklistData.supervisor_signature);
        }

        function populateTable(tableBodyId, tableData) {
            if (!tableData) return;

            const tableBody = document.getElementById(tableBodyId);
            const rows = tableBody.querySelectorAll("tr");

            tableData.forEach((rowData, rowIndex) => {
                if (rowIndex >= rows.length) return;

                const cells = rows[rowIndex].querySelectorAll("td");
                // Start from index 2 to skip the row label and question cell
                for (let day = 1; day <= 31; day++) {
                    const dayKey = `day_${day}`;
                    if (cells[day + 1] && rowData.days[dayKey]) {
                        cells[day + 1].textContent = rowData.days[dayKey];
                    }
                }
            });
        }

        function clearDailyCleaningTables() {
            const tableBodies = [
                "floor_table_body",
                "dustbins_table_body",
                "counters_table_body",
                "equipment_table_body",
                "stffsignature_body",
                "supervisor_signature_body"
            ];

            tableBodies.forEach(bodyId => {
                const tableBody = document.getElementById(bodyId);
                const rows = tableBody.querySelectorAll("tr");

                rows.forEach(row => {
                    const cells = row.querySelectorAll("td");
                    // Start from index 2 to skip the row label and question cell
                    for (let i = 2; i <= 32; i++) {
                        if (cells[i]) {
                            cells[i].textContent = '';
                        }
                    }
                });
            });
        }

        function form14() {
            const monthYearInput = document.getElementById('month_year14');
            const monthYear = monthYearInput.value;

            if (!monthYear) {
                alert('Please select Month/Year');
                return;
            }

            // Extract YYYY-MM format
            const formattedMonthYear = monthYear.substring(0, 7);
            const year = parseInt(formattedMonthYear.split('-')[0]);
            const month = parseInt(formattedMonthYear.split('-')[1]);

            // Get the last day of the selected month
            const lastDay = new Date(year, month, 0).getDate();

            // Prepare logs data - only for rows with at least one field filled
            const logs = [];
            const rows = document.querySelectorAll('#rest-room-cleanliness-log table tbody tr');

            rows.forEach((row, index) => {
                const day = index + 1; // Days start from 1

                // Skip days beyond the last day of the month
                if (day > lastDay) return;

                // Check if any editable cell in this row has content (not just whitespace)
                let hasContent = false;
                const cells = row.querySelectorAll('td[contenteditable="true"]');

                cells.forEach(cell => {
                    if (cell.textContent.trim() !== '') {
                        hasContent = true;
                    }
                });

                // Only include this row if at least one field has content
                if (hasContent) {
                    // Create date string (YYYY-MM-DD)
                    const dateStr = `${formattedMonthYear}-${String(day).padStart(2, '0')}`;

                    // Validate the date
                    const dateObj = new Date(dateStr);
                    if (isNaN(dateObj.getTime())) {
                        console.error(`Invalid date: ${dateStr}`);
                        return;
                    }

                    logs.push({
                        date: dateStr,
                        floor_morning: row.cells[1].textContent.trim(),
                        floor_afternoon: row.cells[2].textContent.trim(),
                        floor_evening: row.cells[3].textContent.trim(),
                        hand_wash_morning: row.cells[4].textContent.trim(),
                        hand_wash_afternoon: row.cells[5].textContent.trim(),
                        hand_wash_evening: row.cells[6].textContent.trim(),
                        wc_morning: row.cells[7].textContent.trim(),
                        wc_afternoon: row.cells[8].textContent.trim(),
                        wc_evening: row.cells[9].textContent.trim()
                    });
                }
            });

            // If no rows with content, confirm if user wants to save empty data
            if (logs.length === 0) {
                if (!confirm('No data entered. Do you want to save empty records for this month?')) {
                    return;
                }
            }

            // Send data to server
            fetch('/rest-room-cleanliness-logs', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    month_year: formattedMonthYear,
                    logs: logs
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        alert(data.message);
                    } else if (data.error) {
                        alert(data.error);
                    } else if (data.errors) {
                        // Handle validation errors
                        let errorMessages = [];
                        for (const [key, value] of Object.entries(data.errors)) {
                            errorMessages.push(value.join('\n'));
                        }
                        alert('Validation errors:\n' + errorMessages.join('\n'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to save data');
                });
        }
        function loadRestRoomCleanlinessData() {
            const monthYearInput = document.getElementById('month_year14');
            const monthYear = monthYearInput.value;

            if (!monthYear) return;

            const formattedMonthYear = monthYear.substring(0, 7);
            const year = parseInt(formattedMonthYear.split('-')[0]);
            const month = parseInt(formattedMonthYear.split('-')[1]);
            const lastDay = new Date(year, month, 0).getDate();

            // Hide rows for days beyond the last day of the month
            const rows = document.querySelectorAll('#rest-room-cleanliness-log table tbody tr');
            rows.forEach((row, index) => {
                const day = index + 1;
                row.style.display = day > lastDay ? 'none' : '';
            });

            fetch(`/rest-room-cleanliness-logs?month_year=${formattedMonthYear}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
                .then(response => response.json())
                .then(data => {
                    // Clear all cells first
                    document.querySelectorAll('#rest-room-cleanliness-log table tbody td[contenteditable="true"]').forEach(cell => {
                        cell.textContent = ' ';
                    });

                    if (data.logs && data.logs.length > 0) {
                        // Populate with data from server
                        data.logs.forEach(log => {
                            const day = new Date(log.log_date).getDate();
                            const row = document.querySelector(`#rest-room-cleanliness-log table tbody tr:nth-child(${day})`);

                            if (row) {
                                row.cells[1].textContent = log.floor_morning || ' ';
                                row.cells[2].textContent = log.floor_afternoon || ' ';
                                row.cells[3].textContent = log.floor_evening || ' ';
                                row.cells[4].textContent = log.hand_wash_morning || ' ';
                                row.cells[5].textContent = log.hand_wash_afternoon || ' ';
                                row.cells[6].textContent = log.hand_wash_evening || ' ';
                                row.cells[7].textContent = log.wc_morning || ' ';
                                row.cells[8].textContent = log.wc_afternoon || ' ';
                                row.cells[9].textContent = log.wc_evening || ' ';
                            }
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    //alert('Failed to load data');
                });
        }
        document.getElementById('month_year14').addEventListener('change', loadRestRoomCleanlinessData);

        // Initialize with current month if available
        document.addEventListener('DOMContentLoaded', function () {
            const currentDate = new Date();
            const currentMonthYear = `${currentDate.getFullYear()}-${String(currentDate.getMonth() + 1).padStart(2, '0')}`;
            document.getElementById('month_year14').value = `${currentMonthYear}-01`;
            loadRestRoomCleanlinessData();
        });

        // Function to handle form submission
        function form15() {
            const monthYearInput = document.getElementById('monthYear15');
            const monthYear = monthYearInput.value;

            if (!monthYear) {
                alert('Please select Month/Year');
                return;
            }

            // Extract YYYY-MM format
            const formattedMonthYear = monthYear.substring(0, 7);
            const year = parseInt(formattedMonthYear.split('-')[0]);
            const month = parseInt(formattedMonthYear.split('-')[1]);

            // Get the last day of the selected month
            const lastDay = new Date(year, month, 0).getDate();

            // Prepare logs data - only for rows with at least one field filled
            const logs = [];
            const rows = document.querySelectorAll('#sodium-hypochlorite-preparation table tbody tr');

            rows.forEach((row, index) => {
                const day = index + 1;

                // Skip days beyond the last day of the month
                if (day > lastDay) return;

                // Check if any editable cell has content
                let hasContent = false;
                const cells = row.querySelectorAll('td[contenteditable="true"]');

                cells.forEach(cell => {
                    if (cell.textContent.trim() !== '') {
                        hasContent = true;
                    }
                });

                if (hasContent) {
                    const dateStr = `${formattedMonthYear}-${String(day).padStart(2, '0')}`;
                    const dateObj = new Date(dateStr);

                    if (isNaN(dateObj.getTime())) {
                        console.error(`Invalid date: ${dateStr}`);
                        return;
                    }

                    logs.push({
                        date: dateStr,
                        original_concentration: row.cells[1].textContent.trim(),
                        quantity_prepared: row.cells[2].textContent.trim(),
                        prepared_by: row.cells[3].textContent.trim(),
                        verified_by: row.cells[4].textContent.trim()
                    });
                }
            });

            if (logs.length === 0) {
                if (!confirm('No data entered. Do you want to save empty records for this month?')) {
                    return;
                }
            }

            // Send data to server
            fetch('/sodium-hypochlorite-logs', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    month_year: formattedMonthYear,
                    logs: logs
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        alert(data.message);
                    } else if (data.error) {
                        alert(data.error);
                    } else if (data.errors) {
                        let errorMessages = [];
                        for (const [key, value] of Object.entries(data.errors)) {
                            errorMessages.push(value.join('\n'));
                        }
                        alert('Validation errors:\n' + errorMessages.join('\n'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to save data');
                });
        }

        // Function to load data for selected month/year
        function loadSodiumHypochloriteData() {
            const monthYearInput = document.getElementById('monthYear15');
            const monthYear = monthYearInput.value;

            if (!monthYear) return;

            const formattedMonthYear = monthYear.substring(0, 7);
            const year = parseInt(formattedMonthYear.split('-')[0]);
            const month = parseInt(formattedMonthYear.split('-')[1]);
            const lastDay = new Date(year, month, 0).getDate();

            // Hide rows for days beyond the last day of the month
            const rows = document.querySelectorAll('#sodium-hypochlorite-preparation table tbody tr');
            rows.forEach((row, index) => {
                const day = index + 1;
                row.style.display = day > lastDay ? 'none' : '';
            });

            fetch(`/sodium-hypochlorite-logs?month_year=${formattedMonthYear}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
                .then(response => response.json())
                .then(data => {
                    // Clear all cells first
                    document.querySelectorAll('#sodium-hypochlorite-preparation table tbody td[contenteditable="true"]').forEach(cell => {
                        cell.textContent = ' ';
                    });

                    if (data.logs && data.logs.length > 0) {
                        data.logs.forEach(log => {
                            const day = new Date(log.log_date).getDate();
                            const row = document.querySelector(`#sodium-hypochlorite-preparation table tbody tr:nth-child(${day})`);

                            if (row) {
                                row.cells[1].textContent = log.original_concentration || ' ';
                                row.cells[2].textContent = log.quantity_prepared || ' ';
                                row.cells[3].textContent = log.prepared_by || ' ';
                                row.cells[4].textContent = log.verified_by || ' ';
                            }
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // alert('Failed to load data');
                });
        }

        // Add event listener for month/year change
        document.getElementById('monthYear15').addEventListener('change', loadSodiumHypochloriteData);

        // Initialize with current month if available
        document.addEventListener('DOMContentLoaded', function () {
            const currentDate = new Date();
            const currentMonthYear = `${currentDate.getFullYear()}-${String(currentDate.getMonth() + 1).padStart(2, '0')}`;
            document.getElementById('monthYear15').value = `${currentMonthYear}-01`;
            loadSodiumHypochloriteData();
        });




        // Load instruments on page load
        document.addEventListener('DOMContentLoaded', function () {
            loadRefrigerationInstruments();

            // Initialize with current month
            const currentDate = new Date();
            const currentMonthYear = `${currentDate.getFullYear()}-${String(currentDate.getMonth() + 1).padStart(2, '0')}`;
            document.getElementById('monthYear16').value = `${currentMonthYear}-01`;
        });

        document.addEventListener('DOMContentLoaded', function () {
            loadDeepfrigerationInstruments();

            // Initialize with current month
            const currentDate = new Date();
            const currentMonthYear = `${currentDate.getFullYear()}-${String(currentDate.getMonth() + 1).padStart(2, '0')}`;
            document.getElementById('monthYear17').value = `${currentMonthYear}-01`;
        });


        // Function to load instruments
        function loadRefrigerationInstruments() {
            fetch('/all-instruments', {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
                .then(response => response.json())
                .then(data => {
                    const select = document.getElementById('instrumentId16');
                    select.innerHTML = '<option value="">Select Instrument</option>';

                    data.instruments.forEach(instrument => {
                        const option = document.createElement('option');
                        option.value = instrument.id;
                        // Format: instrument_id (instrument_name)
                        option.textContent = `${instrument.instrument_id} (${instrument.name})`;
                        select.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error loading instruments:', error);
                });
        }

        function loadDeepfrigerationInstruments() {
            fetch('/all-instruments', {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
                .then(response => response.json())
                .then(data => {
                    const select = document.getElementById('instrumentId17');
                    select.innerHTML = '<option value="">Select Instrument</option>';

                    data.instruments.forEach(instrument => {
                        const option = document.createElement('option');
                        option.value = instrument.id;
                        // Format: instrument_id (instrument_name)
                        option.textContent = `${instrument.instrument_id} (${instrument.name})`;
                        select.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error loading instruments:', error);
                });
        }

        // Function to handle form submission
        function form16() {
            const monthYearInput = document.getElementById('monthYear16');
            const instrumentSelect = document.getElementById('instrumentId16');
            const monthYear = monthYearInput.value;
            const instrumentId = instrumentSelect.value;

            if (!monthYear || !instrumentId) {
                alert('Please select Month/Year and Instrument');
                return;
            }

            // Extract YYYY-MM format
            const formattedMonthYear = monthYear.substring(0, 7);
            const year = parseInt(formattedMonthYear.split('-')[0]);
            const month = parseInt(formattedMonthYear.split('-')[1]);

            // Get the last day of the selected month
            const lastDay = new Date(year, month, 0).getDate();

            // Prepare logs data - only for rows with at least one field filled
            const logs = [];
            const rows = document.querySelectorAll('#refrigeration-temperature-log table tbody tr');

            rows.forEach((row, index) => {
                const day = index + 1;

                // Skip days beyond the last day of the month
                if (day > lastDay) return;

                // Check if any editable cell has content
                let hasContent = false;
                const cells = row.querySelectorAll('td[contenteditable="true"]');

                cells.forEach(cell => {
                    if (cell.textContent.trim() !== '') {
                        hasContent = true;
                    }
                });

                if (hasContent) {
                    const dateStr = `${formattedMonthYear}-${String(day).padStart(2, '0')}`;
                    const dateObj = new Date(dateStr);

                    if (isNaN(dateObj.getTime())) {
                        console.error(`Invalid date: ${dateStr}`);
                        return;
                    }

                    logs.push({
                        date: dateStr,
                        morning_temperature: row.cells[1].textContent.trim(),
                        morning_signature: row.cells[2].textContent.trim(),
                        evening_temperature: row.cells[3].textContent.trim(),
                        evening_signature: row.cells[4].textContent.trim()
                    });
                }
            });

            if (logs.length === 0) {
                if (!confirm('No data entered. Do you want to save empty records for this month?')) {
                    return;
                }
            }

            // Send data to server
            fetch('/refrigeration-temperature-logs', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    month_year: formattedMonthYear,
                    instrument_id: instrumentId,
                    logs: logs
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        alert(data.message);
                    } else if (data.error) {
                        alert(data.error);
                    } else if (data.errors) {
                        let errorMessages = [];
                        for (const [key, value] of Object.entries(data.errors)) {
                            errorMessages.push(value.join('\n'));
                        }
                        alert('Validation errors:\n' + errorMessages.join('\n'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to save data');
                });
        }

        // Function to load data for selected month/year and instrument
        function loadRefrigerationTemperatureData() {
            const monthYearInput = document.getElementById('monthYear16');
            const instrumentSelect = document.getElementById('instrumentId16');
            const monthYear = monthYearInput.value;
            const instrumentId = instrumentSelect.value;

            if (!monthYear || !instrumentId) return;

            const formattedMonthYear = monthYear.substring(0, 7);
            const year = parseInt(formattedMonthYear.split('-')[0]);
            const month = parseInt(formattedMonthYear.split('-')[1]);
            const lastDay = new Date(year, month, 0).getDate();

            // Hide rows for days beyond the last day of the month
            const rows = document.querySelectorAll('#refrigeration-temperature-log table tbody tr');
            rows.forEach((row, index) => {
                const day = index + 1;
                row.style.display = day > lastDay ? 'none' : '';
            });

            fetch(`/refrigeration-temperature-logs?month_year=${formattedMonthYear}&instrument_id=${instrumentId}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
                .then(response => response.json())
                .then(data => {
                    // Clear all cells first
                    document.querySelectorAll('#refrigeration-temperature-log table tbody td[contenteditable="true"]').forEach(cell => {
                        cell.textContent = ' ';
                    });

                    if (data.logs && data.logs.length > 0) {
                        data.logs.forEach(log => {
                            const day = new Date(log.log_date).getDate();
                            const row = document.querySelector(`#refrigeration-temperature-log table tbody tr:nth-child(${day})`);

                            if (row) {
                                row.cells[1].textContent = log.morning_temperature || ' ';
                                row.cells[2].textContent = log.morning_signature || ' ';
                                row.cells[3].textContent = log.evening_temperature || ' ';
                                row.cells[4].textContent = log.evening_signature || ' ';
                            }
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    //alert('Failed to load data');
                });
        }

        // Add event listeners
        document.getElementById('monthYear16').addEventListener('change', loadRefrigerationTemperatureData);
        document.getElementById('instrumentId16').addEventListener('change', loadRefrigerationTemperatureData);




        function form17() {
            const monthYearInput = document.getElementById('monthYear17');
            const instrumentSelect = document.getElementById('instrumentId17');
            const monthYear = monthYearInput.value;
            const instrumentId = instrumentSelect.value;

            if (!monthYear || !instrumentId) {
                alert('Please select Month/Year and Instrument');
                return;
            }

            // Extract YYYY-MM format
            const formattedMonthYear = monthYear.substring(0, 7);
            const year = parseInt(formattedMonthYear.split('-')[0]);
            const month = parseInt(formattedMonthYear.split('-')[1]);

            // Get the last day of the selected month
            const lastDay = new Date(year, month, 0).getDate();

            // Prepare logs data - only for rows with at least one field filled
            const logs = [];
            const rows = document.querySelectorAll('#deep-freezer-temperature-log table tbody tr');

            rows.forEach((row, index) => {
                const day = index + 1;

                // Skip days beyond the last day of the month
                if (day > lastDay) return;

                // Check if any editable cell has content
                let hasContent = false;
                const cells = row.querySelectorAll('td[contenteditable="true"]');

                cells.forEach(cell => {
                    if (cell.textContent.trim() !== '') {
                        hasContent = true;
                    }
                });

                if (hasContent) {
                    const dateStr = `${formattedMonthYear}-${String(day).padStart(2, '0')}`;
                    const dateObj = new Date(dateStr);

                    if (isNaN(dateObj.getTime())) {
                        console.error(`Invalid date: ${dateStr}`);
                        return;
                    }

                    logs.push({
                        date: dateStr,
                        morning_temperature: row.cells[1].textContent.trim(),
                        morning_signature: row.cells[2].textContent.trim(),
                        evening_temperature: row.cells[3].textContent.trim(),
                        evening_signature: row.cells[4].textContent.trim()
                    });
                }
            });

            if (logs.length === 0) {
                if (!confirm('No data entered. Do you want to save empty records for this month?')) {
                    return;
                }
            }

            // Send data to server
            fetch('/deefrigeration-temperature-logs', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    month_year: formattedMonthYear,
                    instrument_id: instrumentId,
                    logs: logs
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        alert(data.message);
                    } else if (data.error) {
                        alert(data.error);
                    } else if (data.errors) {
                        let errorMessages = [];
                        for (const [key, value] of Object.entries(data.errors)) {
                            errorMessages.push(value.join('\n'));
                        }
                        alert('Validation errors:\n' + errorMessages.join('\n'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to save data');
                });
        }

        function loadDeefrigerationTemperatureData() {
            const monthYearInput = document.getElementById('monthYear17');
            const instrumentSelect = document.getElementById('instrumentId17');
            const monthYear = monthYearInput.value;
            const instrumentId = instrumentSelect.value;

            if (!monthYear || !instrumentId) return;

            const formattedMonthYear = monthYear.substring(0, 7);
            const year = parseInt(formattedMonthYear.split('-')[0]);
            const month = parseInt(formattedMonthYear.split('-')[1]);
            const lastDay = new Date(year, month, 0).getDate();

            // Hide rows for days beyond the last day of the month
            const rows = document.querySelectorAll('#deep-freezer-temperature-log table tbody tr');
            rows.forEach((row, index) => {
                const day = index + 1;
                row.style.display = day > lastDay ? 'none' : '';
            });

            fetch(`/deefrigeration-temperature-logs?month_year=${formattedMonthYear}&instrument_id=${instrumentId}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
                .then(response => response.json())
                .then(data => {
                    // Clear all cells first
                    document.querySelectorAll('#deep-freezer-temperature-log table tbody td[contenteditable="true"]').forEach(cell => {
                        cell.textContent = ' ';
                    });

                    if (data.logs && data.logs.length > 0) {
                        data.logs.forEach(log => {
                            const day = new Date(log.log_date).getDate();
                            const row = document.querySelector(`#deep-freezer-temperature-log table tbody tr:nth-child(${day})`);

                            if (row) {
                                row.cells[1].textContent = log.morning_temperature || ' ';
                                row.cells[2].textContent = log.morning_signature || ' ';
                                row.cells[3].textContent = log.evening_temperature || ' ';
                                row.cells[4].textContent = log.evening_signature || ' ';
                            }
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    //alert('Failed to load data');
                });
        }

        // Add event listeners
        document.getElementById('monthYear17').addEventListener('change', loadDeefrigerationTemperatureData);
        document.getElementById('instrumentId17').addEventListener('change', loadDeefrigerationTemperatureData);




        // Function to handle form submission
        function form18() {
            const monthYearInput = document.querySelector('#transcription-check-record input[type="date"]');
            const monthYear = monthYearInput.value;

            if (!monthYear) {
                alert('Please select Month/Year');
                return;
            }

            const formattedMonthYear = monthYear.substring(0, 7);
            const logs = [];
            const rows = document.querySelectorAll('#transcription-check-record table tbody tr');

            rows.forEach(row => {
                const dateInput = row.querySelector('.date-input');
                if (!dateInput || !dateInput.value) return;

                // Check if any other field has content
                let hasContent = false;
                const cells = row.querySelectorAll('td[contenteditable="true"]');

                cells.forEach(cell => {
                    if (cell.textContent.trim() !== '') {
                        hasContent = true;
                    }
                });

                if (hasContent || dateInput.value) {
                    logs.push({
                        date: dateInput.value,
                        visit_no: row.cells[1].textContent.trim(),
                        results_recorded: row.cells[2].textContent.trim(),
                        results_entered: row.cells[3].textContent.trim(),
                        entered_by: row.cells[4].textContent.trim(),
                        verified_by: row.cells[5].textContent.trim()
                    });
                }
            });

            if (logs.length === 0) {
                if (!confirm('No data entered. Do you want to save empty records for this month?')) {
                    return;
                }
            }

            fetch('/transcription-check-logs', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    month_year: formattedMonthYear,
                    logs: logs
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        alert(data.message);
                    } else if (data.error) {
                        alert(data.error);
                    } else if (data.errors) {
                        let errorMessages = [];
                        for (const [key, value] of Object.entries(data.errors)) {
                            errorMessages.push(value.join('\n'));
                        }
                        alert('Validation errors:\n' + errorMessages.join('\n'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to save data');
                });
        }

        // Function to add new row
        function newRowToTable() {
            const tbody = document.querySelector('#transcription-check-record table tbody');
            const newRow = tbody.insertRow();

            // Date cell with input
            const dateCell = newRow.insertCell();
            const dateInput = document.createElement('input');
            dateInput.type = 'date';
            dateInput.className = 'form-control date-input';
            dateCell.appendChild(dateInput);

            // Other cells (content-editable)
            for (let i = 1; i < 6; i++) {
                const cell = newRow.insertCell();
                cell.contentEditable = 'true';
                cell.textContent = ' ';
            }
        }

        // Function to load data
        function loadTranscriptionCheckData() {
            const monthYearInput = document.querySelector('#transcription-check-record input[type="date"]');
            const monthYear = monthYearInput.value;

            if (!monthYear) return;

            const formattedMonthYear = monthYear.substring(0, 7);

            fetch(`/transcription-check-logs?month_year=${formattedMonthYear}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
                .then(response => response.json())
                .then(data => {
                    // Clear existing rows (except first one)
                    const tbody = document.querySelector('#transcription-check-record table tbody');
                    while (tbody.rows.length > 1) {
                        tbody.deleteRow(1);
                    }

                    if (data.logs && data.logs.length > 0) {
                        data.logs.forEach(log => {
                            addNewRowWithData(
                                log.log_date,
                                log.visit_no || '',
                                log.results_recorded || '',
                                log.results_entered || '',
                                log.entered_by || '',
                                log.verified_by || ''
                            );
                        });
                    }
                })
                .catch(/* ... error handling ... */);
        }

        // Updated function to add row with data
        function addNewRowWithData(date, visitNo, resultsRecorded, resultsEntered, enteredBy, verifiedBy) {
            const tbody = document.querySelector('#transcription-check-record table tbody');
            const newRow = tbody.insertRow();

            // Date cell with input
            const dateCell = newRow.insertCell();
            const dateInput = document.createElement('input');
            dateInput.type = 'date';
            dateInput.className = 'form-control date-input';
            dateInput.value = date;
            dateCell.appendChild(dateInput);

            // Other cells
            const cell1 = newRow.insertCell();
            cell1.contentEditable = 'true';
            cell1.textContent = visitNo;

            const cell2 = newRow.insertCell();
            cell2.contentEditable = 'true';
            cell2.textContent = resultsRecorded;

            const cell3 = newRow.insertCell();
            cell3.contentEditable = 'true';
            cell3.textContent = resultsEntered;

            const cell4 = newRow.insertCell();
            cell4.contentEditable = 'true';
            cell4.textContent = enteredBy;

            const cell5 = newRow.insertCell();
            cell5.contentEditable = 'true';
            cell5.textContent = verifiedBy;
        }
        // Function to add new empty row
        function newRowToTable18() {
            addNewRowWithData('', '', '', '', '', '');
        }

        // Add event listener for month/year change
        document.querySelector('#transcription-check-record input[type="date"]').addEventListener('change', loadTranscriptionCheckData);

        // Initialize with current month if available
        document.addEventListener('DOMContentLoaded', function () {
            const currentDate = new Date();
            const currentMonthYear = `${currentDate.getFullYear()}-${String(currentDate.getMonth() + 1).padStart(2, '0')}`;
            const dateInput = document.querySelector('#transcription-check-record input[type="date"]');
            dateInput.value = `${currentMonthYear}-01`;
            loadTranscriptionCheckData();
        });
        // Make sure this script is either:
        // 1. At the bottom of the body, or
        // 2. Wrapped in DOMContentLoaded

        function newRowToTable19() {
            // alert("helloo");
            const tbody = document.querySelector('#instrument-breakdown-record table tbody');
            const newRow = tbody.insertRow();

            // Date cell with input
            const dateCell = newRow.insertCell();
            const dateInput = document.createElement('input');
            dateInput.type = 'date';
            dateInput.className = 'form-control';
            dateInput.id = 'date19';
            dateCell.appendChild(dateInput);

            // Other cells (content-editable)
            for (let i = 1; i < 9; i++) {
                const cell = newRow.insertCell();
                cell.contentEditable = 'true';
                cell.textContent = ' ';
            }
        }

        // Attach the event listener
        document.getElementById('addRowBtn19').addEventListener('click', newRowToTable19);

        // Rest of your existing JavaScript code...


        function form19() {
            const monthYearInput = document.querySelector('#instrument-breakdown-record input[type="date"]');
            const monthYear = monthYearInput.value;

            if (!monthYear) {
                alert('Please select Month/Year');
                return;
            }

            const formattedMonthYear = monthYear.substring(0, 7);
            const records = [];
            const rows = document.querySelectorAll('#instrument-breakdown-record table tbody tr');

            rows.forEach(row => {
                const dateInput = row.querySelector('input[type="date"]');
                if (!dateInput || !dateInput.value) return;

                const equipmentName = row.cells[1].textContent.trim();
                const problemIdentified = row.cells[2].textContent.trim();

                // Skip if required fields are empty
                if (!equipmentName || !problemIdentified) {
                    return;
                }

                records.push({
                    date: dateInput.value,
                    equipment_name_id: equipmentName,
                    problem_identified: problemIdentified,
                    breakdown_time: row.cells[3].textContent.trim(),
                    action_taken: row.cells[4].textContent.trim(),
                    engineer_name: row.cells[5].textContent.trim(),
                    total_down_time: row.cells[6].textContent.trim(),
                    remarks: row.cells[7].textContent.trim(),
                    signature: row.cells[8].textContent.trim()
                });
            });

            if (records.length === 0) {
                alert('Please enter at least one record with Equipment Name/ID and Problem Identified');
                return;
            }

            // Send data to server
            fetch('/instrument-breakdown-records', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    month_year: formattedMonthYear,
                    records: records
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        alert(data.message);
                    } else if (data.error) {
                        alert(data.error);
                    } else if (data.errors) {
                        let errorMessages = [];
                        for (const [key, value] of Object.entries(data.errors)) {
                            errorMessages.push(value.join('\n'));
                        }
                        alert('Validation errors:\n' + errorMessages.join('\n'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to save data');
                });
        }


        // Function to load data for selected month/year
        function loadInstrumentBreakdownData() {
            const monthYearInput = document.querySelector('#instrument-breakdown-record input[type="date"]');
            const monthYear = monthYearInput.value;

            if (!monthYear) return;

            const formattedMonthYear = monthYear.substring(0, 7);

            fetch(`/instrument-breakdown-records?month_year=${formattedMonthYear}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
                .then(response => response.json())
                .then(data => {
                    // Clear existing rows (except first one)
                    const tbody = document.querySelector('#instrument-breakdown-record table tbody');
                    while (tbody.rows.length > 1) {
                        tbody.deleteRow(1);
                    }

                    if (data.records && data.records.length > 0) {
                        data.records.forEach(record => {
                            addNewRowWithData19(
                                record.log_date,
                                record.equipment_name_id,
                                record.problem_identified,
                                record.breakdown_time,
                                record.action_taken,
                                record.engineer_name,
                                record.total_down_time,
                                record.remarks,
                                record.signature
                            );
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // alert('Failed to load data');
                });
        }

        // Function to add row with data
        function addNewRowWithData19(date, equipmentName, problemIdentified, breakdownTime, actionTaken,
            engineerName, totalDownTime, remarks, signature) {
            const tbody = document.querySelector('#instrument-breakdown-record table tbody');
            const newRow = tbody.insertRow();

            // Date cell with input
            const dateCell = newRow.insertCell();
            const dateInput = document.createElement('input');
            dateInput.type = 'date';
            dateInput.className = 'form-control';
            dateInput.value = date;
            dateCell.appendChild(dateInput);

            // Other cells
            const cell1 = newRow.insertCell();
            cell1.contentEditable = 'true';
            cell1.textContent = equipmentName || ' ';

            const cell2 = newRow.insertCell();
            cell2.contentEditable = 'true';
            cell2.textContent = problemIdentified || ' ';

            const cell3 = newRow.insertCell();
            cell3.contentEditable = 'true';
            cell3.textContent = breakdownTime || ' ';

            const cell4 = newRow.insertCell();
            cell4.contentEditable = 'true';
            cell4.textContent = actionTaken || ' ';

            const cell5 = newRow.insertCell();
            cell5.contentEditable = 'true';
            cell5.textContent = engineerName || ' ';

            const cell6 = newRow.insertCell();
            cell6.contentEditable = 'true';
            cell6.textContent = totalDownTime || ' ';

            const cell7 = newRow.insertCell();
            cell7.contentEditable = 'true';
            cell7.textContent = remarks || ' ';

            const cell8 = newRow.insertCell();
            cell8.contentEditable = 'true';
            cell8.textContent = signature || ' ';
        }

        // Add event listener for month/year change
        document.querySelector('#instrument-breakdown-record input[type="date"]').addEventListener('change', loadInstrumentBreakdownData);

        // Initialize with current month if available
        document.addEventListener('DOMContentLoaded', function () {
            const currentDate = new Date();
            const currentMonthYear = `${currentDate.getFullYear()}-${String(currentDate.getMonth() + 1).padStart(2, '0')}`;
            const dateInput = document.querySelector('#instrument-breakdown-record input[type="date"]');
            dateInput.value = `${currentMonthYear}-01`;
            loadInstrumentBreakdownData();
        });
        //form 20
        // getNonConformityData(){
        //     const monthYear = document.getElementById("monthYear20").value;
        //     const formattedMonthYear = monthYear.substring(0, 7);

        //     fetch(`/get-non-confirmity-data?month_year=${formattedMonthYear}`, {
        //         headers: {
        //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        //         }
        //     })
        //         .then(response => response.json())
        //         .then(data => {
        //             // Clear existing rows (except first one)
        //             const tbody = document.querySelector('#non-conformity-log table tbody');
        //             while (tbody.rows.length > 1) {
        //                 tbody.deleteRow(1);
        //             }

        //             if (data.logs && data.logs.length > 0) {
        //                 data.logs.forEach(log => {
        //                     addNewRowWithData(
        //                         log.date,
        //                         log.observed || '',
        //                         log.responsable_person || '',
        //                         log.root_cause_analysis || '',
        //                         log.corrective_action_taken || '',
        //                         log.preventive_action_taken || '',
        //                         log.date_of_closure || '',
        //                         log.signature || '',

        //                     );
        //                 });
        //             }
        //         })
        //         .catch(/* ... error handling ... */);
        // }

        // function form20() {
        //     alert("Data submitting...");
        // }

        // function newRowToTable20() {

        // }


        // Add new row function
        function newRowToTable20() {
            const tbody = document.querySelector('#non-conformity-log table tbody');
            const newRow = tbody.insertRow();

            // Date cell
            const dateCell = newRow.insertCell();
            const dateInput = document.createElement('input');
            dateInput.type = 'date';
            dateInput.className = 'form-control';
            // dateInput.required = true; // 🔴 Make it required
            dateCell.appendChild(dateInput);

            // Non-conformity observed (content-editable)
            const ncCell = newRow.insertCell();
            ncCell.contentEditable = 'true';
            ncCell.textContent = ' ';

            // Responsible person (content-editable)
            const respCell = newRow.insertCell();
            respCell.contentEditable = 'true';
            respCell.textContent = ' ';

            // Root cause analysis (content-editable)
            const rcaCell = newRow.insertCell();
            rcaCell.contentEditable = 'true';
            rcaCell.textContent = ' ';

            // Corrective actions (content-editable)
            const caCell = newRow.insertCell();
            caCell.contentEditable = 'true';
            caCell.textContent = ' ';

            // Preventive actions (content-editable)
            const paCell = newRow.insertCell();
            paCell.contentEditable = 'true';
            paCell.textContent = ' ';

            // Date of closure
            const docCell = newRow.insertCell();
            const docInput = document.createElement('input');
            docInput.type = 'date';
            docInput.className = 'form-control';
            docCell.appendChild(docInput);

            // Signature (content-editable)
            const sigCell = newRow.insertCell();
            sigCell.contentEditable = 'true';
            sigCell.textContent = ' ';
        }

        // Submit form function
        function form20() {
            const monthYearInput = document.getElementById('monthYear20');
            const monthYear = monthYearInput.value;

            if (!monthYear) {
                alert('Please select Month/Year');
                return;
            }

            const formattedMonthYear = monthYear.substring(0, 7);
            const records = [];
            const rows = document.querySelectorAll('#non-conformity-log table tbody tr');

            rows.forEach(row => {
                const dateInput = row.querySelector('input[type="date"]:first-of-type');
                const closureDateInput = row.querySelector('input[type="date"]:last-of-type');

                if (!dateInput || !dateInput.value) return;

                const nonConformity = row.cells[1].textContent.trim();
                const responsiblePerson = row.cells[2].textContent.trim();

                // Skip if required fields are empty
                if (!nonConformity || !responsiblePerson) {
                    return;
                }

                records.push({
                    date: dateInput.value,
                    non_conformity: nonConformity,
                    responsible_person: responsiblePerson,
                    root_cause: row.cells[3].textContent.trim(),
                    corrective_action: row.cells[4].textContent.trim(),
                    preventive_action: row.cells[5].textContent.trim(),
                    closure_date: closureDateInput ? closureDateInput.value : null,
                    signature: row.cells[7].textContent.trim()
                });
            });

            if (records.length === 0) {
                alert('Please enter at least one record with Non-Conformity and Responsible Person');
                return;
            }

            // Send data to server
            fetch('/non-conformity-logs-store', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    month_year: formattedMonthYear,
                    records: records
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Data saved successfully!');
                        loadNonConformityData();
                        location.reload();// Refresh the data
                    } else if (data.error) {
                        alert(data.error);
                    } else if (data.errors) {
                        let errorMessages = [];
                        for (const [key, value] of Object.entries(data.errors)) {
                            errorMessages.push(value.join('\n'));
                        }
                        alert('Validation errors:\n' + errorMessages.join('\n'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to save data');
                });
        }

        // Load data function
        function loadNonConformityData() {
            const monthYearInput = document.getElementById('monthYear20');
            const monthYear = monthYearInput.value;

            if (!monthYear) return;

            const formattedMonthYear = monthYear.substring(0, 7);

            fetch(`/non-conformity-logs?month_year=${formattedMonthYear}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
                .then(response => response.json())
                .then(data => {
                    // Clear existing rows (except first one)
                    const tbody = document.querySelector('#non-conformity-log table tbody');
                    while (tbody.rows.length > 1) {
                        tbody.deleteRow(1);
                    }

                    if (data.records && data.records.length > 0) {
                        data.records.forEach(record => {
                            addNewRowWithData20(
                                record.date,
                                record.non_conformity,
                                record.responsible_person,
                                record.root_cause,
                                record.corrective_action,
                                record.preventive_action,
                                record.closure_date,
                                record.signature
                            );
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // alert('Failed to load data');
                });
        }

        // Helper function to add row with data
        function addNewRowWithData20(date, nonConformity, responsiblePerson, rootCause,
            correctiveAction, preventiveAction, closureDate, signature) {
            const tbody = document.querySelector('#non-conformity-log table tbody');
            const newRow = tbody.insertRow();

            // Date cell
            const dateCell = newRow.insertCell();
            const dateInput = document.createElement('input');
            dateInput.type = 'date';
            dateInput.className = 'form-control';
            dateInput.value = date || '';
            dateCell.appendChild(dateInput);

            // Non-conformity
            const ncCell = newRow.insertCell();
            ncCell.contentEditable = 'true';
            ncCell.textContent = nonConformity || ' ';

            // Responsible person
            const respCell = newRow.insertCell();
            respCell.contentEditable = 'true';
            respCell.textContent = responsiblePerson || ' ';

            // Root cause
            const rcaCell = newRow.insertCell();
            rcaCell.contentEditable = 'true';
            rcaCell.textContent = rootCause || ' ';

            // Corrective action
            const caCell = newRow.insertCell();
            caCell.contentEditable = 'true';
            caCell.textContent = correctiveAction || ' ';

            // Preventive action
            const paCell = newRow.insertCell();
            paCell.contentEditable = 'true';
            paCell.textContent = preventiveAction || ' ';

            // Closure date
            const docCell = newRow.insertCell();
            const docInput = document.createElement('input');
            docInput.type = 'date';
            docInput.className = 'form-control';
            docInput.value = closureDate || '';
            docCell.appendChild(docInput);

            // Signature
            const sigCell = newRow.insertCell();
            sigCell.contentEditable = 'true';
            sigCell.textContent = signature || ' ';
        }

        // Event listeners
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize with current month
            const currentDate = new Date();
            const currentMonthYear = `${currentDate.getFullYear()}-${String(currentDate.getMonth() + 1).padStart(2, '0')}`;
            document.getElementById('monthYear20').value = `${currentMonthYear}-01`;

            // Load initial data
            loadNonConformityData();

            // Change event for month/year
            document.getElementById('monthYear20').addEventListener('change', loadNonConformityData);
        });

        // Add new row function

        document.addEventListener('DOMContentLoaded', function () {
            // Initialize with current month
            const currentDate = new Date();
            const currentMonthYear = `${currentDate.getFullYear()}-${String(currentDate.getMonth() + 1).padStart(2, '0')}`;
            document.getElementById('month_year21').value = currentMonthYear;

            // Event listeners
            document.getElementById('month_year21').addEventListener('change', loadSampleDiscardLogData);
            document.getElementById('addRowBtn21').addEventListener('click', addNewRow21);
            document.getElementById('submitBtn21').addEventListener('click', submitSampleDiscardLog);

            // Load initial data
            loadSampleDiscardLogData();
        });

        function addNewRow21() {
            const tbody = document.querySelector('#sampleDiscardTable tbody');
            const rowCount = tbody.rows.length;
            addRowWithData21(tbody, rowCount + 1, '', '', '', '', '');
        }


        async function submitSampleDiscardLog() {
            const monthYear = document.getElementById('month_year21').value;
            if (!monthYear) {
                alert('Please select Month/Year');
                return;
            }

            const tbody = document.querySelector('#sampleDiscardTable tbody');
            const rows = tbody.rows;
            const records = [];

            // Validate and collect data
            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];
                const receivedDate = row.cells[1].querySelector('input').value;
                const department = row.cells[2].querySelector('input').value;
                const discardBy = row.cells[4].querySelector('input').value;

                // Skip empty rows (except for required fields)
                if (!receivedDate && !department && !discardBy) continue;

                // Validate required fields
                if (!receivedDate || !department || !discardBy) {
                    alert(`Row ${i + 1}: Please fill all required fields (Received Date, Department, Discard By)`);
                    return;
                }

                records.push({
                    sr_no: i + 1, // Use row number as serial number
                    received_date: receivedDate,
                    department: department,
                    discard_date: row.cells[3].querySelector('input').value,
                    discard_by: discardBy,
                    reviewed_by: row.cells[5].querySelector('input').value
                });
            }

            if (records.length === 0) {
                alert('Please enter at least one complete record');
                return;
            }

            try {
                const response = await fetch('/sample-discard-logs-store', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        month_year: monthYear,
                        records: records
                    })
                });

                const data = await response.json();

                if (data.success) {
                    alert('Data saved successfully!');
                    loadSampleDiscardLogData(); // Refresh the data
                } else if (data.errors) {
                    let errorMessages = [];
                    for (const [key, value] of Object.entries(data.errors)) {
                        errorMessages.push(value.join('\n'));
                    }
                    alert('Validation errors:\n' + errorMessages.join('\n'));
                } else {
                    alert(data.message || 'Failed to save data');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Failed to save data');
            }
        }

        function newRowToTable21() {
            const tbody = document.querySelector('#sample-discard-log table tbody');
            const newRow = tbody.insertRow();
            const rowCount = tbody.rows.length;

            // Sr. No. cell
            const snCell = newRow.insertCell();
            snCell.contentEditable = 'true';
            snCell.textContent = rowCount;

            // Sample Received Date
            const receivedDateCell = newRow.insertCell();
            const receivedDateInput = document.createElement('input');
            receivedDateInput.type = 'date';
            receivedDateInput.className = 'form-control';
            receivedDateCell.appendChild(receivedDateInput);

            // Department
            const deptCell = newRow.insertCell();
            deptCell.contentEditable = 'true';
            deptCell.textContent = '';

            // Sample Discard Date
            const discardDateCell = newRow.insertCell();
            const discardDateInput = document.createElement('input');
            discardDateInput.type = 'date';
            discardDateInput.className = 'form-control';
            discardDateCell.appendChild(discardDateInput);

            // Discard by
            const discardByCell = newRow.insertCell();
            discardByCell.contentEditable = 'true';
            discardByCell.textContent = '';

            // Reviewed by
            const reviewedByCell = newRow.insertCell();
            reviewedByCell.contentEditable = 'true';
            reviewedByCell.textContent = '';
        }

        // Submit form function
        // function form21() {
        //     const monthYearInput = document.getElementById('month_year21');
        //     const monthYear = monthYearInput.value;

        //     if (!monthYear) {
        //         alert('Please select Month/Year');
        //         return;
        //     }

        //     const formattedMonthYear = monthYear.substring(0, 7);
        //     const records = [];
        //     const rows = document.querySelectorAll('#sample-discard-log table tbody tr');

        //     rows.forEach(row => {
        //         const srNo = row.cells[0].textContent.trim();
        //         const receivedDateInput = row.cells[1].querySelector('input[type="date"]');
        //         const department = row.cells[2].textContent.trim();
        //         const discardDateInput = row.cells[3].querySelector('input[type="date"]');
        //         const discardBy = row.cells[4].textContent.trim();
        //         const reviewedBy = row.cells[5].textContent.trim();

        //         // Skip if required fields are empty
        //         if (!receivedDateInput || !receivedDateInput.value || !department || !discardBy) {
        //             return;
        //         }

        //         records.push({
        //             sr_no: srNo,
        //             received_date: receivedDateInput.value,
        //             department: department,
        //             discard_date: discardDateInput ? discardDateInput.value : null,
        //             discard_by: discardBy,
        //             reviewed_by: reviewedBy
        //         });
        //     });

        //     if (records.length === 0) {
        //         alert('Please enter at least one complete record');
        //         return;
        //     }

        //     // Send data to server
        //     fetch('/sample-discard-logs-store', {
        //         method: 'POST',
        //         headers: {
        //             'Content-Type': 'application/json',
        //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        //         },
        //         body: JSON.stringify({
        //             month_year: formattedMonthYear,
        //             records: records
        //         })
        //     })
        //         .then(response => response.json())
        //         .then(data => {
        //             if (data.success) {
        //                 alert('Data saved successfully!');
        //                 location.reload();
        //                 loadSampleDiscardLogData(); // Refresh the data
        //             } else if (data.error) {
        //                 alert(data.error);
        //             } else if (data.errors) {
        //                 let errorMessages = [];
        //                 for (const [key, value] of Object.entries(data.errors)) {
        //                     errorMessages.push(value.join('\n'));
        //                 }
        //                 alert('Validation errors:\n' + errorMessages.join('\n'));
        //             }
        //         })
        //         .catch(error => {
        //             console.error('Error:', error);
        //             alert('Failed to save data');
        //         });
        // }

        // Load data function
        async function loadSampleDiscardLogData() {
            const monthYear = document.getElementById('month_year21').value;
            if (!monthYear) return;

            try {
                const response = await fetch(`/sample-discard-logs?month_year=${monthYear}`, {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                });

                const data = await response.json();
                const tbody = document.querySelector('#sampleDiscardTable tbody');

                // Clear existing rows
                tbody.innerHTML = '';

                if (data.records && data.records.length > 0) {
                    data.records.forEach(record => {
                        addRowWithData21(
                            tbody,
                            record.sr_no,
                            record.received_date,
                            record.department,
                            record.discard_date,
                            record.discard_by,
                            record.reviewed_by
                        );
                    });
                } else {
                    // Add one empty row if no data exists
                    addNewRow21();
                }
            } catch (error) {
                console.error('Error loading data:', error);
                // alert('Failed to load data');
            }
        }

        function addRowWithData21(tbody, srNo, receivedDate, department, discardDate, discardBy, reviewedBy) {
            const newRow = tbody.insertRow();

            // Sr. No.
            const srNoCell = newRow.insertCell();
            srNoCell.textContent = srNo;

            // Received Date
            const receivedDateCell = newRow.insertCell();
            const receivedDateInput = document.createElement('input');
            receivedDateInput.type = 'date';
            receivedDateInput.className = 'form-control';
            receivedDateInput.value = receivedDate;
            receivedDateCell.appendChild(receivedDateInput);

            // Department
            const deptCell = newRow.insertCell();
            const deptInput = document.createElement('input');
            deptInput.type = 'text';
            deptInput.className = 'form-control';
            deptInput.value = department;
            deptCell.appendChild(deptInput);

            // Discard Date
            const discardDateCell = newRow.insertCell();
            const discardDateInput = document.createElement('input');
            discardDateInput.type = 'date';
            discardDateInput.className = 'form-control';
            discardDateInput.value = discardDate;
            discardDateCell.appendChild(discardDateInput);

            // Discard by
            const discardByCell = newRow.insertCell();
            const discardByInput = document.createElement('input');
            discardByInput.type = 'text';
            discardByInput.className = 'form-control';
            discardByInput.value = discardBy;
            discardByCell.appendChild(discardByInput);

            // Reviewed by
            const reviewedByCell = newRow.insertCell();
            const reviewedByInput = document.createElement('input');
            reviewedByInput.type = 'text';
            reviewedByInput.className = 'form-control';
            reviewedByInput.value = reviewedBy;
            reviewedByCell.appendChild(reviewedByInput);

            // Action (Delete)
            const actionCell = newRow.insertCell();
            const deleteBtn = document.createElement('button');
            deleteBtn.className = 'btn btn-danger btn-sm';
            deleteBtn.textContent = '×';
            deleteBtn.onclick = function () {
                if (confirm('Are you sure you want to delete this row?')) {
                    newRow.remove();
                    renumberRows();
                }
            };
            actionCell.appendChild(deleteBtn);
        }

        function renumberRows() {
            const tbody = document.querySelector('#sampleDiscardTable tbody');
            Array.from(tbody.rows).forEach((row, index) => {
                row.cells[0].textContent = index + 1;
            });
        }

        // Event listeners
        // document.addEventListener('DOMContentLoaded', function () {
        //     // Initialize with current month
        //     const currentDate = new Date();
        //     const currentMonthYear = `${currentDate.getFullYear()}-${String(currentDate.getMonth() + 1).padStart(2, '0')}`;
        //     document.getElementById('month_year21').value = `${currentMonthYear}-01`;

        //     // Load initial data
        //     loadSampleDiscardLogData();

        //     // Change event for month/year
        //     document.getElementById('month_year21').addEventListener('change', loadSampleDiscardLogData);

        //     // Add row button
        //     document.getElementById('addRowBtn21').addEventListener('click', newRowToTable21);

        //     // Submit button
        //     document.getElementById('submitBtn21').addEventListener('click', form21);
        // });







        function form24() {
            alert('Form Submitted.');
            location.reload();
        }

        function form23() {
            alert('Data Saved! updated');;
            location.reload();
        }
    </script>
    <script>
        function addRow22() {
            const row = document.querySelector('#labTable tbody tr').cloneNode(true);
            row.querySelectorAll('input').forEach(input => input.value = '');
            document.querySelector('#labTable tbody').appendChild(row);
        }

        function form22() {
            const rows = [];
            document.querySelectorAll('#labTable tbody tr').forEach(tr => {
                const inputs = tr.querySelectorAll('input');
                const row = {
                    date: inputs[0].value,
                    registration_no: inputs[1].value,
                    test_parameter: inputs[2].value,
                    our_lab_result: inputs[3].value,
                    referring_lab_result: inputs[4].value,
                    difference_percentage: inputs[5].value,
                    acceptable_status: inputs[6].value,
                    done_by: inputs[7].value,
                    reviewed_by: inputs[8].value,
                };
                rows.push(row);
            });

            fetch('{{ route("inter-lab.store") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ rows })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Form submitted successfully!');
                        location.reload();
                    }
                });
        }


    </script>
    <script>
        function form26() {
            // Get all rows from the table
            const rows = document.querySelectorAll('#form26 tbody tr');
            const logs = [];

            rows.forEach(row => {
                const dateInput = row.querySelector('input[type="date"]');
                const startTimeInput = row.querySelector('input[name="start_time"]');
                const shutdownTimeInput = row.querySelector('input[name="shutdown_time"]');

                logs.push({
                    log_date: dateInput.value,
                    start_time: startTimeInput.value,
                    shutdown_time: shutdownTimeInput.value
                });
            });

            // Get other form data
            const instrumentId = document.getElementById('instrument_26_id').value;
            const equipmentName = document.getElementById('eqp_name').value;

            // Validate required fields
            if (!instrumentId) {
                alert('Please select an instrument');
                return;
            }

            if (!equipmentName) {
                alert('Please enter equipment name');
                return;
            }

            // AJAX call to submit data
            fetch('/equipment-logs/store', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    instrument_id: instrumentId,
                    equipment_name: equipmentName,
                    logs: logs
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Data saved successfully');
                    } else {
                        alert('Error saving data');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Something went wrong');
                });
        }

        function fetchForm26Data() {
            const instrumentId = document.getElementById('instrument_26_id').value;

            if (!instrumentId) {
                // Clear the table if no instrument is selected
                document.querySelector('#form26 tbody').innerHTML = '';
                return;
            }

            // Fetch data for the selected instrument
            fetch(`/equipment-logs/${instrumentId}`)
                .then(response => response.json())
                .then(data => {
                    // Get equipment name from first record if available
                    if (data.length > 0) {
                        document.getElementById('eqp_name').value = data[0].equipment_name;
                    } else {
                        document.getElementById('eqp_name').value = '';
                    }

                    // Clear existing rows
                    const tbody = document.querySelector('#form26 tbody');
                    tbody.innerHTML = '';

                    // Add rows for each log
                    data.forEach((log, index) => {
                        const newRow = document.createElement('tr');
                        newRow.innerHTML = `
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <td>${index + 1}</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <td><input type="date" class="form-control" value="${log.log_date}" required></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <td><input type="time" name="start_time" class="form-control" value="${log.start_time}" required></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <td><input type="time" name="shutdown_time" class="form-control" value="${log.shutdown_time}" required></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    `;
                        tbody.appendChild(newRow);
                    });

                    // If no data, add one empty row
                    if (data.length === 0) {
                        newRowToTable26();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error fetching data');
                });
        }

        function newRowToTable26() {
            const tbody = document.querySelector('#form26 tbody');
            const rowCount = tbody.querySelectorAll('tr').length;

            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td>${rowCount + 1}</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td><input type="date" class="form-control" required></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td><input type="time" name="start_time" class="form-control" required></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td><input type="time" name="shutdown_time" class="form-control" required></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        `;

            tbody.appendChild(newRow);
        }


        // Add this to your JS file or a script tag in your view
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize form
            const instrumentSelect = document.getElementById('instrument_27_id');
            const addRowBtn = document.getElementById('addRowBtn27');
            const submitBtn = document.getElementById('submitBtn27');

            // Event listeners
            instrumentSelect.addEventListener('change', fetchForm27Data);
            addRowBtn.addEventListener('click', addNewRow27);
            submitBtn.addEventListener('click', submitForm27);

            // Add initial empty row
            addNewRow27();
        });

        // Add new empty row
        function addNewRow27() {
            const tbody = document.querySelector('#form27 tbody');
            const rowCount = tbody.rows.length;

            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                                                                                                                                                                                                                                            <td>${rowCount + 1}</td>
                                                                                                                                                                                                                                            <td><input type="date" class="form-control" required></td>
                                                                                                                                                                                                                                            <td><input type="text" class="form-control" required></td>
                                                                                                                                                                                                                                            <td><input type="text" class="form-control" required></td>
                                                                                                                                                                                                                                            <td><input type="text" class="form-control" required></td>
                                                                                                                                                                                                                                            <td><input type="text" class="form-control" required></td>
                                                                                                                                                                                                                                            <td><input type="text" class="form-control"></td>
                                                                                                                                                                                                                                            <td><input type="text" class="form-control"></td>
                                                                                                                                                                                                                                            <td><input type="text" class="form-control"></td>
                                                                                                                                                                                                                                            <td><input type="text" class="form-control" required></td>
                                                                                                                                                                                                                                            <td><input type="text" class="form-control" required></td>
                                                                                                                                                                                                                                            <td><button class="btn btn-danger btn-sm remove-row">×</button></td>
                                                                                                                                                                                                                                        `;

            tbody.appendChild(newRow);

            // Add event listener to remove button
            newRow.querySelector('.remove-row').addEventListener('click', function () {
                if (confirm('Are you sure you want to remove this row?')) {
                    newRow.remove();
                    renumberRows27();
                }
            });
        }

        // Renumber rows sequentially
        function renumberRows27() {
            const tbody = document.querySelector('#form27 tbody');
            Array.from(tbody.rows).forEach((row, index) => {
                row.cells[0].textContent = index + 1;
            });
        }

        // Fetch data for selected instrument
        async function fetchForm27Data() {
            const instrumentId = document.getElementById('instrument_27_id').value;
            const submitBtn = document.getElementById('submitBtn27');
            const originalText = submitBtn.textContent;

            if (!instrumentId) {
                // Clear table if no instrument selected
                const tbody = document.querySelector('#form27 tbody');
                tbody.innerHTML = '';
                addNewRow27();
                return;
            }

            try {
                submitBtn.textContent = 'Loading...';
                submitBtn.disabled = true;

                const response = await fetch(`/repeat-tests/${instrumentId}`, {
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                });

                if (!response.ok) {
                    throw new Error(`Server returned ${response.status}`);
                }

                const data = await response.json();
                const tbody = document.querySelector('#form27 tbody');

                // Clear existing rows
                tbody.innerHTML = '';

                if (data.success && data.data && data.data.length > 0) {
                    data.data.forEach((test, index) => {
                        const newRow = document.createElement('tr');
                        newRow.innerHTML = `
                                                                                                                                                                                                                                                        <td>${index + 1}</td>
                                                                                                                                                                                                                                                        <td><input type="date" class="form-control" value="${formatDateForInput(test.test_date)}" required></td>
                                                                                                                                                                                                                                                        <td><input type="text" class="form-control" value="${test.visit_id || ''}" required></td>
                                                                                                                                                                                                                                                        <td><input type="text" class="form-control" value="${test.parameter_repeat || ''}" required></td>
                                                                                                                                                                                                                                                        <td><input type="text" class="form-control" value="${test.reason_for_repeat || ''}" required></td>
                                                                                                                                                                                                                                                        <td><input type="text" class="form-control" value="${test.authorised_by || ''}" required></td>
                                                                                                                                                                                                                                                        <td><input type="text" class="form-control" value="${test.result_a || ''}"></td>
                                                                                                                                                                                                                                                        <td><input type="text" class="form-control" value="${test.result_b || ''}"></td>
                                                                                                                                                                                                                                                        <td><input type="text" class="form-control" value="${test.result_c || ''}"></td>
                                                                                                                                                                                                                                                        <td><input type="text" class="form-control" value="${test.result_entered_in_lms || ''}" required></td>
                                                                                                                                                                                                                                                        <td><input type="text" class="form-control" value="${test.final_result_reviewed_by || ''}" required></td>
                                                                                                                                                                                                                                                        <td><button class="btn btn-danger btn-sm remove-row">×</button></td>
                                                                                                                                                                                                                                                    `;

                        tbody.appendChild(newRow);

                        // Add event listener to remove button
                        newRow.querySelector('.remove-row').addEventListener('click', function () {
                            if (confirm('Are you sure you want to remove this row?')) {
                                newRow.remove();
                                renumberRows27();
                            }
                        });
                    });
                } else {
                    // Add empty row if no data found
                    addNewRow27();
                }
            } catch (error) {
                console.error('Error fetching data:', error);
                alert('Failed to load data: ' + error.message);

                // Ensure we have at least one row
                const tbody = document.querySelector('#form27 tbody');
                if (tbody.rows.length === 0) {
                    addNewRow27();
                }
            } finally {
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }
        }

        // Format date for input field (YYYY-MM-DD)
        function formatDateForInput(dateString) {
            if (!dateString) return '';
            const date = new Date(dateString);
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        }
        // Submit form data
        async function submitForm27() {
            const submitBtn = document.getElementById('submitBtn27');
            const originalText = submitBtn.textContent;

            try {
                submitBtn.textContent = 'Saving...';
                submitBtn.disabled = true;

                const instrumentId = document.getElementById('instrument_27_id').value;
                if (!instrumentId) {
                    throw new Error('Please select an instrument');
                }

                const rows = document.querySelectorAll('#form27 tbody tr');
                const tests = [];

                // Validate and collect data
                for (let i = 0; i < rows.length; i++) {
                    const row = rows[i];
                    const inputs = row.querySelectorAll('input');

                    // Skip empty rows
                    if (!inputs[0].value && !inputs[1].value && !inputs[2].value) continue;

                    // Validate required fields
                    const requiredFields = [0, 1, 2, 3, 4, 5, 8, 9]; // Indices of required fields
                    for (const index of requiredFields) {
                        if (!inputs[index].value.trim()) {
                            throw new Error(`Row ${i + 1}: Please fill all required fields`);
                        }
                    }

                    tests.push({
                        test_date: inputs[0].value,
                        visit_id: inputs[1].value.trim(),
                        parameter_repeat: inputs[2].value.trim(),
                        reason_for_repeat: inputs[3].value.trim(),
                        authorised_by: inputs[4].value.trim(),
                        result_a: inputs[5].value.trim(),
                        result_b: inputs[6].value.trim(),
                        result_c: inputs[7].value.trim(),
                        result_entered_in_lms: inputs[8].value.trim(),
                        final_result_reviewed_by: inputs[9].value.trim()
                    });
                }

                if (tests.length === 0) {
                    throw new Error('Please enter at least one test record');
                }

                // Submit data
                const response = await fetch('/repeat-tests/store', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        instrument_id: instrumentId,
                        tests: tests,
                        clear_previous: true
                    })
                });

                if (!response.ok) {
                    const errorData = await response.json();
                    throw new Error(errorData.message || 'Failed to save data');
                }

                const data = await response.json();

                if (data.success) {
                    alert('Data saved successfully!');
                    fetchForm27Data(); // Refresh the data
                } else {
                    throw new Error(data.message || 'Failed to save data');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Error: ' + error.message);
            } finally {
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }
        }


        document.addEventListener('DOMContentLoaded', function () {
            // Set current month as default
            const currentDate = new Date();
            document.getElementById('eye_wash_month_year').value = currentDate.toISOString().slice(0, 7);
        });

        function fetch28Data() {
            const monthYear = document.getElementById('eye_wash_month_year').value;

            if (!monthYear) {
                return;
            }


            // Show loading state
            const tableBody = document.querySelector('#form28-table tbody');
            tableBody.innerHTML = '<tr><td colspan="7" class="text-center">Loading data...</td></tr>';

            fetch(`/eye-wash-log/fetch?month_year=${monthYear}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            })
                .then(response => {
                    console.log('Response status:', response.status); // Debug log
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Received data:', data); // Debug log
                    if (data.success) {
                        if (data.logs && data.logs.length > 0) {
                            renderIncubatorData(data);
                        } else {
                            initializeEmptyIncubatorTable();
                            console.log('No data found for selected criteria');
                        }
                    } else {
                        throw new Error(data.message || 'Failed to fetch data');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    initializeEmptyIncubatorTable();
                    alert('Error loading data: ' + error.message);
                });
        }

        function renderIncubatorData(data) {
            const tableBody = document.querySelector('#form28-table tbody');
            tableBody.innerHTML = ''; // Clear loading message

            // Set department if exists
            if (data.department) {
                document.getElementById('eye_wash_department').value = data.department;
            }

            // Create rows for each day (1-31)
            for (let day = 1; day <= 31; day++) {
                const row = document.createElement('tr');
                row.setAttribute('data-day', day);

                // Find log for this day (if exists)
                const dayLog = data.logs.find(log => {
                    const logDay = new Date(log.log_date).getDate();
                    return logDay === day;
                });

                row.innerHTML = `
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <td>${day}</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <td contenteditable="true" data-field="water_changed">${dayLog?.water_changed || ''}</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <td contenteditable="true" data-field="changed_by">${dayLog?.changed_by || ''}</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <td contenteditable="true" data-field="signature">${dayLog?.signature || ''}</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <td contenteditable="true" data-field="remarks">${dayLog?.remarks || ''}</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    `;

                tableBody.appendChild(row);
            }
        }

        function initializeEmptyIncubatorTable() {
            const tableBody = document.querySelector('#form28-table tbody');
            tableBody.innerHTML = '';

            for (let day = 1; day <= 31; day++) {
                const row = document.createElement('tr');
                row.setAttribute('data-day', day);
                row.innerHTML = `
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <td>${day}</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <td contenteditable="true" data-field="water_changed"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <td contenteditable="true" data-field="changed_by"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <td contenteditable="true" data-field="signature"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <td contenteditable="true" data-field="remarks"></td>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    `;
                tableBody.appendChild(row);
            }
        }

        function clearIncubatorForm() {
            document.querySelectorAll('#form28-table [contenteditable="true"]').forEach(cell => {
                cell.textContent = '';
            });
        }

        function submit28Log() {
            const formData = {
                department: document.getElementById('eye_wash_department').value,
                month_year: document.getElementById('eye_wash_month_year').value,
                logs: []
            };

            // Validate required fields
            if (!formData.department || !formData.month_year) {
                alert('Please fill all required fields (Department, Month/Year)');
                return;
            }

            // Get the selected month and year
            const [year, month] = formData.month_year.split('-');
            const daysInMonth = new Date(year, month, 0).getDate(); // Get actual days in month

            // Collect data for each day (only up to actual days in month)
            for (let day = 1; day <= daysInMonth; day++) {
                const row = document.querySelector(`#form28-table tr[data-day="${day}"]`);
                if (!row) continue;

                const logData = {
                    log_date: `${formData.month_year}-${day.toString().padStart(2, '0')}`,
                    water_changed: row.querySelector('[data-field="water_changed"]').textContent.trim(),
                    changed_by: row.querySelector('[data-field="changed_by"]').textContent.trim(),
                    signature: row.querySelector('[data-field="signature"]').textContent.trim(),
                    remarks: row.querySelector('[data-field="remarks"]').textContent.trim(),
                };

                // Only add if at least one field has data
                if (logData.water_changed || logData.changed_by || logData.signature || logData.remarks) {
                    formData.logs.push(logData);
                }
            }

            // Show loading state
            const submitBtn = document.querySelector('button[onclick="submit28Log()"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch('/eye-wash-log/store', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(formData)
            })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(errData => {
                            throw new Error(errData.message || 'Request failed');
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;

                    if (data.success) {
                        alert('Maintenance logs saved successfully!');
                    } else {
                        let errorMessage = 'Failed to save data';
                        if (data.errors) {
                            errorMessage += ': ' + Object.values(data.errors).join(', ');
                        } else if (data.message) {
                            errorMessage += ': ' + data.message;
                        }
                        throw new Error(errorMessage);
                    }
                })
                .catch(error => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                    console.error('Error:', error);
                    alert('Error: ' + error.message);
                });
        }




        //29..................................... department_29
        //month_year_29







        document.addEventListener('DOMContentLoaded', function () {
            // Set current month as default
            const currentDate = new Date();
            document.getElementById('month_year_29').value = currentDate.toISOString().slice(0, 7);
        });

        function fetch29() {
            // alert("hello");
            const monthYear = document.getElementById('month_year_29').value;

            if (!monthYear) {
                return;
            }

            // Show loading state
            const tableBody = document.querySelector('#ipa-preparation-table tbody');
            tableBody.innerHTML = '<tr><td colspan="7" class="text-center">Loading data...</td></tr>';

            fetch(`/ipa-preparation/fetch?month_year=${monthYear}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            })
                .then(response => {
                    console.log('Response status:', response.status); // Debug log
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Received data:', data); // Debug log
                    if (data.success) {
                        if (data.logs && data.logs.length > 0) {
                            render29Data(data);
                        } else {
                            initializeEmpty29Table();
                            console.log('No data found for selected criteria');
                        }
                    } else {
                        throw new Error(data.message || 'Failed to fetch data');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    initializeEmpty29Table();
                    alert('Error loading data: ' + error.message);
                });
        }

        function render29Data(data) {
            const tableBody = document.querySelector('#ipa-preparation-table tbody');
            tableBody.innerHTML = ''; // Clear loading message

            // Set department if exists
            if (data.department) {
                document.getElementById('department_29').value = data.department;
            }

            // Create rows for each day (1-31)
            for (let day = 1; day <= 31; day++) {
                const row = document.createElement('tr');
                row.setAttribute('data-day', day);

                // Find log for this day (if exists)
                const dayLog = data.logs.find(log => {
                    const logDay = new Date(log.log_date).getDate();
                    return logDay === day;
                });

                row.innerHTML = `
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td>${day}</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td contenteditable="true" data-field="volume_prepared">${dayLog?.volume_prepared || ''}</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td contenteditable="true" data-field="prepared_by">${dayLog?.prepared_by || ''}</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td contenteditable="true" data-field="signature1">${dayLog?.signature1 || ''}</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td contenteditable="true" data-field="verified_by">${dayLog?.verified_by || ''}</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td contenteditable="true" data-field="signature2">${dayLog?.signature2 || ''}</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td contenteditable="true" data-field="remarks">${dayLog?.remarks || ''}</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        `;

                tableBody.appendChild(row);
            }
        }

        function initializeEmpty29Table() {
            const tableBody = document.querySelector('#ipa-preparation-table tbody');
            tableBody.innerHTML = '';

            for (let day = 1; day <= 31; day++) {
                const row = document.createElement('tr');
                row.setAttribute('data-day', day);
                row.innerHTML = `
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <td>${day}</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <td contenteditable="true" data-field="volume_prepared"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <td contenteditable="true" data-field="prepared_by"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <td contenteditable="true" data-field="signature1"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <td contenteditable="true" data-field="verified_by"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <td contenteditable="true" data-field="signature2"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <td contenteditable="true" data-field="remarks"></td>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    `;
                tableBody.appendChild(row);
            }
        }

        function clear29Form() {
            document.querySelectorAll('#ipa-preparation-table [contenteditable="true"]').forEach(cell => {
                cell.textContent = '';
            });
        }

        function form29() {
            const formData = {
                department: document.getElementById('department_29').value,
                month_year: document.getElementById('month_year_29').value,
                logs: []
            };

            // Validate required fields
            if (!formData.department || !formData.month_year) {
                alert('Please fill all required fields (Department, Month/Year)');
                return;
            }

            // Collect data for each day
            for (let day = 1; day <= 31; day++) {
                const row = document.querySelector(`#ipa-preparation-table tr[data-day="${day}"]`);
                if (!row) continue;

                const logData = {
                    log_date: `${formData.month_year}-${day.toString().padStart(2, '0')}`,
                    volume_prepared: row.querySelector('[data-field="volume_prepared"]').textContent.trim(),
                    prepared_by: row.querySelector('[data-field="prepared_by"]').textContent.trim(),
                    signature1: row.querySelector('[data-field="signature1"]').textContent.trim(),
                    verified_by: row.querySelector('[data-field="verified_by"]').textContent.trim(),
                    signature2: row.querySelector('[data-field="signature2"]').textContent.trim(),
                    remarks: row.querySelector('[data-field="remarks"]').textContent.trim(),
                };

                formData.logs.push(logData);
            }

            // Show loading state
            const submitBtn = document.querySelector('button[onclick="form29()"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch('/ipa-preparation/store', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(formData)
            })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(errData => {
                            throw new Error(errData.message || 'Request failed');
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;

                    if (data.success) {
                        alert('Maintenance logs saved successfully!');
                    } else {
                        let errorMessage = 'Failed to save data';
                        if (data.errors) {
                            errorMessage += ': ' + Object.values(data.errors).join(', ');
                        } else if (data.message) {
                            errorMessage += ': ' + data.message;
                        }
                        throw new Error(errorMessage);
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Show/hide external person and organization fields based on involvement selection
            const involvementRadios = document.querySelectorAll('input[name="involvement"]');
            const externalPersonField = document.getElementById('external-person');
            const organizationField = document.getElementById('organization');

            function toggleExternalFields() {
                const isExternal = document.querySelector('input[name="involvement"]:checked')?.value === 'external';
                externalPersonField.required = isExternal;
                organizationField.required = isExternal;
                externalPersonField.style.display = isExternal ? 'inline-block' : 'none';
                organizationField.style.display = isExternal ? 'inline-block' : 'none';
            }

            involvementRadios.forEach(radio => {
                radio.addEventListener('change', toggleExternalFields);
            });

            // Show/hide other attention field based on attention selection
            const attentionRadios = document.querySelectorAll('input[name="attention"]');
            const otherAttentionField = document.getElementById('other-attention');

            function toggleOtherAttentionField() {
                const isOther = document.querySelector('input[name="attention"]:checked')?.value === 'other';
                otherAttentionField.required = isOther;
                otherAttentionField.style.display = isOther ? 'inline-block' : 'none';
            }

            attentionRadios.forEach(radio => {
                radio.addEventListener('change', toggleOtherAttentionField);
            });

            // Run both toggle functions on page load to set initial state
            toggleExternalFields();
            toggleOtherAttentionField();
        });


        document.addEventListener('DOMContentLoaded', function () {
            // Initialize form with current month/year
            const monthYearInput = document.getElementById('iqcMonthYear');
            if (!monthYearInput.value) {
                const today = new Date();
                const year = today.getFullYear();
                const month = String(today.getMonth() + 1).padStart(2, '0');
                monthYearInput.value = `${year}-${month}`;
            }

            // Event listeners
            monthYearInput.addEventListener('change', fetchIqcData);
            document.getElementById('instrumentSerial').addEventListener('change', fetchIqcData);
            document.getElementById('submitIqcBtn').addEventListener('click', submitIqcData);

            // Initial fetch if instrument is already selected
            if (document.getElementById('instrumentSerial').value) {
                fetchIqcData();
            }
        });
        // Submit form data
        async function submitIqcData() {
            const submitBtn = document.getElementById('submitIqcBtn');
            const originalText = submitBtn.textContent;

            try {
                submitBtn.textContent = 'Saving...';
                submitBtn.disabled = true;

                const monthYear = document.getElementById('iqcMonthYear').value;
                const level = document.getElementById('iqcLevel').value;
                const instrumentSerial = document.getElementById('instrumentSerial').value;
                const controlLotNo = document.getElementById('controlLotNo').value;
                const controlExpiryDate = document.getElementById('controlExpiryDate').value;

                if (!monthYear) {
                    alert('Please select Month/Year');
                    return;
                }

                // Prepare data object
                const data = {
                    month_year: `${monthYear}-01`,
                    level: level,
                    instrument_id: instrumentSerial,
                    control_lot_no: controlLotNo,
                    control_expiry_date: controlExpiryDate,
                    parameters: {}
                };

                // Collect all parameter data
                document.querySelectorAll('[contenteditable="true"]').forEach(cell => {
                    const parameter = cell.getAttribute('data-parameter');
                    const day = cell.getAttribute('data-day');

                    if (!data.parameters[parameter]) {
                        data.parameters[parameter] = {};
                    }

                    if (day) {
                        data.parameters[parameter][day] = cell.textContent.trim();
                    } else {
                        data.parameters[parameter] = cell.textContent.trim();
                    }
                });

                // Send data to server
                const response = await fetch("{{ route('iqc-data.store') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();

                if (result.success) {
                    alert('IQC Data saved successfully');
                } else {
                    throw new Error(result.message || 'Failed to save data');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Error: ' + error.message);
            } finally {
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }
        }

        // Fetch existing data
        async function fetchIqcData() {
            const submitBtn = document.getElementById('submitIqcBtn');
            const originalText = submitBtn.textContent;

            try {
                submitBtn.textContent = 'Loading...';
                submitBtn.disabled = true;

                const monthYear = document.getElementById('iqcMonthYear').value;
                const instrumentId = document.getElementById('instrumentSerial').value;

                if (!monthYear || !instrumentId) {
                    clearIqcForm();
                    return;
                }

                const response = await fetch("{{ route('iqc-data.fetch') }}", {
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
                });

                const data = await response.json();

                if (data.success && data.data) {
                    // Fill header fields
                    document.getElementById('iqcLevel').value = data.data.level || '';
                    document.getElementById('controlLotNo').value = data.data.control_lot_no || '';
                    document.getElementById('controlExpiryDate').value = data.data.control_expiry_date ?
                        data.data.control_expiry_date.split(' ')[0] : '';

                    // Parse parameters
                    const parameters = typeof data.data.parameters === 'string' ?
                        JSON.parse(data.data.parameters) :
                        data.data.parameters || {};

                    // Fill parameter data
                    document.querySelectorAll('[contenteditable="true"]').forEach(cell => {
                        const parameter = cell.getAttribute('data-parameter');
                        const day = cell.getAttribute('data-day');

                        if (day) {
                            cell.textContent = parameters[parameter]?.[day] || '';
                        } else {
                            cell.textContent = parameters[parameter] || '';
                        }
                    });
                } else {
                    clearIqcForm();
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Error fetching data: ' + error.message);
            } finally {
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }
        }

        function clearIqcForm() {
            // Clear all editable cells
            document.querySelectorAll('[contenteditable="true"]').forEach(cell => {
                cell.textContent = '';
            });

            // Clear other fields except month/year and instrument
            document.getElementById('iqcLevel').value = '';
            document.getElementById('controlLotNo').value = '';
            document.getElementById('controlExpiryDate').value = '';
        }

        // document.addEventListener('DOMContentLoaded', function () {
        //     // Initialize form with current month/year
        //     const monthYearInput = document.getElementById('iqcMonthYear');
        //     if (!monthYearInput.value) {
        //         const today = new Date();
        //         const year = today.getFullYear();
        //         const month = String(today.getMonth() + 1).padStart(2, '0');
        //         monthYearInput.value = `${year}-${month}`;
        //     }
        //     =
        //     // Load data when month/year or instrument changes
        //     monthYearInput.addEventListener('change', fetchIqcData);
        //     document.getElementById('instrumentSerial').addEventListener('change', fetchIqcData);

        //     // Initial fetch if instrument is already selected
        //     if (document.getElementById('instrumentSerial').value) {
        //         fetchIqcData();
        //     }
        // });
    </script>



    <script>

        document.addEventListener('DOMContentLoaded', function () {
            // Initialize form with current month/year
            const monthYearInput = document.getElementById('outlierMonthYear');
            const today = new Date();
            const year = today.getFullYear();
            const month = String(today.getMonth() + 1).padStart(2, '0');
            const currentMonthYear = `${year}-${month}`;

            // Set default value
            monthYearInput.value = currentMonthYear;

            // Add first empty row
            addNewOutlierRow();

            // Load data for default month/year immediately
            fetchOutlierLog(currentMonthYear);

            // Load data when month/year changes
            monthYearInput.addEventListener('change', function () {
                fetchOutlierLog(this.value);
            });
        });

        // Add new row to the table
        function addNewOutlierRow(rowData = null) {
            const tbody = document.querySelector('#outlierLogTable tbody');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                                                                                                                                                                                                                            <td><input type="date" class="form-control date-input" data-field="date" value="${rowData?.date || ''}"></td>
                                                                                                                                                                                                                            <td contenteditable="true" data-field="parameter_outlier">${rowData?.parameter_outlier || ''}</td>
                                                                                                                                                                                                                            <td contenteditable="true" data-field="non_conformity">${rowData?.non_conformity || ''}</td>
                                                                                                                                                                                                                            <td contenteditable="true" data-field="root_cause">${rowData?.root_cause || ''}</td>
                                                                                                                                                                                                                            <td contenteditable="true" data-field="corrective_action">${rowData?.corrective_action || ''}</td>
                                                                                                                                                                                                                            <td contenteditable="true" data-field="preventive_action">${rowData?.preventive_action || ''}</td>
                                                                                                                                                                                                                            <td><input type="date" class="form-control date-input" data-field="closure_date" value="${rowData?.closure_date || ''}"></td>
                                                                                                                                                                                                                            <td contenteditable="true" data-field="signature">${rowData?.signature || ''}</td>
                                                                                                                                                                                                                            <td><button class="btn btn-danger btn-sm" onclick="removeOutlierRow(this)">×</button></td>
                                                                                                                                                                                                                        `;

            tbody.appendChild(newRow);
        }

        // Remove row from table
        function removeOutlierRow(button) {
            if (confirm('Are you sure you want to remove this row?')) {
                const row = button.closest('tr');
                row.remove();
            }
        }

        // Submit form data
        async function submitOutlierLog() {
            const submitBtn = document.querySelector('#iqc-outlier-corrective-log button.btn-warning');
            const originalText = submitBtn.textContent;

            try {
                submitBtn.textContent = 'Saving...';
                submitBtn.disabled = true;

                const monthYear = document.getElementById('outlierMonthYear').value;

                if (!monthYear) {
                    alert('Please select Month/Year');
                    return;
                }

                // Prepare data object
                const data = {
                    month_year: `${monthYear}-01`,
                    entries: []
                };

                // Collect all row data
                document.querySelectorAll('#outlierLogTable tbody tr').forEach(row => {
                    const entry = {
                        date: row.querySelector('[data-field="date"]').value,
                        parameter_outlier: row.querySelector('[data-field="parameter_outlier"]').textContent.trim(),
                        non_conformity: row.querySelector('[data-field="non_conformity"]').textContent.trim(),
                        root_cause: row.querySelector('[data-field="root_cause"]').textContent.trim(),
                        corrective_action: row.querySelector('[data-field="corrective_action"]').textContent.trim(),
                        preventive_action: row.querySelector('[data-field="preventive_action"]').textContent.trim(),
                        closure_date: row.querySelector('[data-field="closure_date"]').value,
                        signature: row.querySelector('[data-field="signature"]').textContent.trim()
                    };

                    // Only add if at least one field has data
                    if (entry.date || entry.parameter_outlier || entry.non_conformity ||
                        entry.root_cause || entry.corrective_action || entry.preventive_action ||
                        entry.closure_date || entry.signature) {
                        data.entries.push(entry);
                    }
                });

                // Send data to server
                const response = await fetch("{{ route('outlier-log.store') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();

                if (result.success) {
                    alert('Outlier Log saved successfully');
                    fetchOutlierLog(monthYear); // Refresh the data
                } else {
                    throw new Error(result.message || 'Failed to save data');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Error: ' + error.message);
            } finally {
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }
        }
        // Fetch existing data
        async function fetchOutlierLog(monthYear) {
            if (!monthYear) return;

            const loadingIndicator = document.createElement('div');
            loadingIndicator.className = 'text-center p-3';
            loadingIndicator.innerHTML = '<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>';

            const tbody = document.querySelector('#outlierLogTable tbody');
            tbody.innerHTML = '';
            tbody.appendChild(loadingIndicator);

            try {
                const response = await fetch("{{ route('outlier-log.fetch') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        month_year: `${monthYear}-01`
                    })
                });

                const data = await response.json();

                tbody.innerHTML = ''; // Clear loading indicator

                if (data.success && data.data) {
                    // Parse entries if they exist
                    const entries = data.data.entries ? JSON.parse(data.data.entries) : [];

                    if (entries.length > 0) {
                        entries.forEach(entry => {
                            addNewOutlierRow(entry);
                        });
                    } else {
                        addNewOutlierRow(); // Add empty row if no data
                    }
                } else {
                    addNewOutlierRow(); // Add empty row if no data
                }
            } catch (error) {
                console.error('Error:', error);
                tbody.innerHTML = '';
                addNewOutlierRow(); // Ensure at least one row exists
            }
        }

    </script>
    @if(session('ssuccess'))
        <script>
            alert("Form submitted.");
        </script>
    @endif

    </html>


@endsection