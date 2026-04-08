@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Accessioning</title>
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
                <div style="font-size: 20px;">Accessioning </div>

            </div>
            <div class="icon-view">
                <div class="pc-content">
                    <div class="pc-folder" onclick="showSection('section-sample-rejection')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Sample Rejection Log</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('section-sample-volume')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Sample Volume Check Log</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('section-sample-receiving')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Sample Receiving Record</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('section-outsourcing-samples')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Outsourcing Samples Record</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('section-first-aid')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">First Aid Kit Monitoring Log</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('record-of-specimen-signatures')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Record of Specimen Signatures</span>
                    </div>
                </div>
            </div>
        </div>


        <div id="section-sample-rejection" class="main inactive">
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/ACC/003</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Sample Rejection Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitSampleRejectionData()">Submit</button>
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
                    <input type="month" id="dateFilter" onchange="fetchSampleRejections()" value="{{ date('Y-m') }}">
                </div>
            </div>

            <div class="table-responsive">
                <table class="stock-planner-table" id="sample-rejection-table">
                    <thead>
                        <tr>
                            <th rowspan="2">Date/Time</th>
                            <th rowspan="2">Patient Name</th>
                            <th rowspan="2">Parameter</th>
                            <th rowspan="2">Collected By</th>
                            <th rowspan="2">Primary Sample Type</th>
                            <th rowspan="2">Reason for Rejection</th>
                            <th colspan="2">Informed By</th>
                            <th rowspan="2">Informed To (Name)</th>
                            <th colspan="2">Fresh Sample Received</th>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <th>Dated Signature</th>
                            <th>Yes/No</th>
                            <th>Reg No</th>
                        </tr>
                    </thead>
                    <tbody id="sampleRejectionBody">
                        <!-- Initial row -->
                        <tr class="sample-rejection-row">
                            <td><input type="datetime-local" class="rejection-datetime" required></td>
                            <td contenteditable="true"></td>
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
                <button class="btn btn-primary m-1" onclick="addSampleRejectionRow()">+ Add Row</button>
            </div>
        </div>


        <div id="section-sample-volume" class="main inactive">
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/ACC/004</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Sample Volume Check Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitVolumeTableData()">Submit</button>
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
                    <input type="month" id="datePicker4" onchange="fetchVolumeData()" value="{{ date('Y-m') }}">
                </div>
            </div>

            <div class="table-responsive">
                <table class="stock-planner-table" id="volume">
                    <thead>
                        <tr>
                            <th rowspan="2">Type of Container</th>
                            <th rowspan="2">Sample Quantity in ml</th>
                            <th colspan="5">Date of Sample Volume Review</th>
                        </tr>
                        <tr class="review-dates-header">
                            <th contenteditable="true"></th>
                            <th contenteditable="true"></th>
                            <th contenteditable="true"></th>
                            <th contenteditable="true"></th>
                            <th contenteditable="true"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>SST Gel Vial (Yellow)</td>
                            <td contenteditable="true" class="sample-quantity"></td>
                            <td contenteditable="true" class="review-date"></td>
                            <td contenteditable="true" class="review-date"></td>
                            <td contenteditable="true" class="review-date"></td>
                            <td contenteditable="true" class="review-date"></td>
                            <td contenteditable="true" class="review-date"></td>
                        </tr>
                        <tr>
                            <td>Plain Vial (Red)</td>
                            <td contenteditable="true" class="sample-quantity"></td>
                            <td contenteditable="true" class="review-date"></td>
                            <td contenteditable="true" class="review-date"></td>
                            <td contenteditable="true" class="review-date"></td>
                            <td contenteditable="true" class="review-date"></td>
                            <td contenteditable="true" class="review-date"></td>
                        </tr>
                        <tr>
                            <td>EDTA Vial (Lavender)</td>
                            <td contenteditable="true" class="sample-quantity"></td>
                            <td contenteditable="true" class="review-date"></td>
                            <td contenteditable="true" class="review-date"></td>
                            <td contenteditable="true" class="review-date"></td>
                            <td contenteditable="true" class="review-date"></td>
                            <td contenteditable="true" class="review-date"></td>
                        </tr>
                        <tr>
                            <td>Sodium Fluoride Vial (Gray)</td>
                            <td contenteditable="true" class="sample-quantity"></td>
                            <td contenteditable="true" class="review-date"></td>
                            <td contenteditable="true" class="review-date"></td>
                            <td contenteditable="true" class="review-date"></td>
                            <td contenteditable="true" class="review-date"></td>
                            <td contenteditable="true" class="review-date"></td>
                        </tr>
                        <tr>
                            <td>Sodium Citrate Vial (Blue)</td>
                            <td contenteditable="true" class="sample-quantity"></td>
                            <td contenteditable="true" class="review-date"></td>
                            <td contenteditable="true" class="review-date"></td>
                            <td contenteditable="true" class="review-date"></td>
                            <td contenteditable="true" class="review-date"></td>
                            <td contenteditable="true" class="review-date"></td>
                        </tr>
                        <tr>
                            <td>Done By</td>
                            <td colspan="6" contenteditable="true" class="done-by"></td>
                        </tr>
                        <tr>
                            <td>Reviewed By</td>
                            <td colspan="6" contenteditable="true" class="reviewed-by"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <div id="section-sample-receiving" class="main inactive">
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/ACC/005</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Sample Receiving Record</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitReceivingTableData()">Submit</button>
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
                    <input type="month" id="dateFilter5" onchange="fetchReceivingTableData()" value="{{ date('Y-m') }}">
                </div>
            </div>

            <div class="table-responsive">
                <table class="stock-planner-table" id="receiving">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Client Location</th>
                            <th>Client Name</th>
                            <th>TL Code</th>
                            <th>Blood</th>
                            <th>Covid</th>
                            <th>CSR Name</th>
                            <th>CSR Sign</th>
                            <th>Sample Temp.</th>
                            <th>Receiver Name</th>
                            <th>Remark</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody1">
                        <!-- Initial empty row -->
                        <tr class="receiving-row">
                            <td><input type="date" class="receiving-date" required></td>
                            <td><input type="time" class="receiving-time" required></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td><button class="btn btn-sm btn-danger" onclick="removeReceivingRow(this)">×</button></td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-primary m-1" onclick="addReceivingRow()">+ Add Row</button>
            </div>
        </div>


        <div id="section-outsourcing-samples" class="main inactive">
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/ACC/006</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Outsourcing Samples Record</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitOutSourcingTableData()">Submit</button>
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
                    <input type="month" id="dateFilter6" onchange="fetchOutSourceData()" value="{{ date('Y-m') }}">
                </div>
            </div>

            <div class="table-responsive">
                <table class="stock-planner-table" id="outsourcing-table">
                    <thead>
                        <tr>
                            <th>S.NO.</th>
                            <th>Date</th>
                            <th>Barcode</th>
                            <th>Patient Name</th>
                            <th>Department</th>
                            <th>Test Name & Code</th>
                            <th>Sample Handover sign, Date & Time</th>
                            <th>Sample Receiver Sign, Date & Time</th>
                            <th>Sample Handover to Outsourced lab by</th>
                            <th>Outsourced lab sample receiver name, date & time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="outsourcingBody">
                        <!-- Initial row -->
                        <tr class="outsourcing-row">
                            <td></td>
                            <td><input type="date" class="outsourcing-date" required></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td><button class="btn btn-sm btn-danger" onclick="removeOutsourcingRow(this)">×</button></td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-primary m-1" onclick="addOutsourcingRow()">+ Add Row</button>
            </div>
        </div>


        <div id="section-first-aid" class="main inactive">
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/ACC/007</strong></label>
                    <label class="doc-detail">Doc Name: <strong>First Aid Kit Monitoring Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitFirstAidTableData()">Submit</button>
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
                    <input type="text" id="departmentSelect">
                </div>
                <div class="col-md-4">
                    <label>Month/Year: </label>
                    <input type="month" id="monthYearFilter" onchange="fetchFirstAidLogs()" value="{{ date('Y-m') }}">
                </div>
            </div>

            <div class="table-responsive">
                <table class="stock-planner-table" id="firstAidTable">
                    <thead>
                        <tr>
                            <th>S.NO.</th>
                            <th>Items Available</th>
                            <th>Expiry Date</th>
                            <th>Replaced Item</th>
                            <th>Quantity replaced</th>
                            <th>Expiry Date</th>
                            <th>Replaced by & sign</th>
                            <th>Remarks</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="firstAidBody">
                        <!-- Initial row -->
                        <tr class="first-aid-row">
                            <td>1</td>
                            <td contenteditable="true"></td>
                            <td><input type="date" class="expiry-date"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td><input type="date" class="replaced-expiry-date"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td><button class="btn btn-sm btn-danger" onclick="removeFirstAidRow(this)">×</button></td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-primary m-1" onclick="addFirstAidRow()">+ Add Row</button>
            </div>
        </div>

        <div id="record-of-specimen-signatures" class="main inactive">
            <meta name="csrf-token1" content="{{ csrf_token() }}">
            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/ACC/009</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Record of Specimen Signatures</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitSpecimenTableData()">Submit</button>
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
                    <label>Department: </label><input type="text" name="department1">
                </div>
                <div class="col-md-4">
                    <label>Month/Year: </label><input type="date" id="datePicked" onchange="fetchSpecimenLogs()">
                </div>
            </div>
            <div class="table-responsive">
                <table class="stock-planner-table">
                    <thead>
                        <tr>
                            <th>
                                <p><strong>S. No.</strong></p>
                            </th>
                            <th>
                                <p><strong>Employee Name</strong></p>
                            </th>
                            <th>
                                <p><strong>Designation</strong></p>
                            </th>
                            <th>
                                <p><strong>Full Signature</strong></p>
                            </th>
                            <th>
                                <p><strong>Short Signature</strong></p>
                            </th>
                        </tr>

                    </thead>
                    <tbody id="tableBody4">
                        <tr class="new-row5">
                            <td>&nbsp;</td>
                            <td contenteditable="true">&nbsp;</td>
                            <td contenteditable="true">&nbsp;</td>
                            <td contenteditable="true">&nbsp;</td>
                            <td contenteditable="true">&nbsp;</td>
                        </tr>

                    </tbody>
                </table>
                <button class="btn btn-primary m-1" onclick="newRowToSpecimenTable(this)">+</button>

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


        function newRowToReceivingTable() {
            let tbody = document.getElementById("tableBody1");
            let row = document.createElement("tr");
            row.classList.add("new-row2"); // Ensure the row has the class

            row.innerHTML = `
                                                                                                                                                                                                                                <td><input type="date" id="date2" required></td>
                                                                                                                                                                                                                                <td><input type="time" id="time2" required></td>
                                                                                                                                                                                                                                <td contenteditable="true"></td>
                                                                                                                                                                                                                                <td contenteditable="true"></td>
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
            console.log("New row added:", row); // Debugging log
        }

        function newRowToSourcingTable() {
            let tbody = document.getElementById("tableBody2");
            let row = document.createElement("tr");
            row.classList.add("new-row3"); // Ensure the row has the class

            row.innerHTML = `
                                                                                                                                                                                                    <td></td>
                                                                                                                                                                                                    <td><input type="date" id="date4" required></td>
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
            console.log("New row added:", row); // Debugging log
        }
        function newRowToFirstAidTable() {
            let tbody = document.getElementById("tableBody3");
            let row = document.createElement("tr");
            row.classList.add("new-row4"); // Ensure the row has the class

            row.innerHTML = `
                                                                                                                                                                <td ></td>
                                                                                                                                                                <td contenteditable="true"></td>
                                                                                                                                                                <td><input type="date" id="date5" required></td>
                                                                                                                                                                <td contenteditable="true"></td>
                                                                                                                                                                <td contenteditable="true"></td>
                                                                                                                                                                <td><input type="date" id="date6" required></td>
                                                                                                                                                                <td contenteditable="true"></td>
                                                                                                                                                                <td contenteditable="true"></td>



                                                                                                                                                            `;

            tbody.appendChild(row);
            console.log("New row added:", row); // Debugging log
        }
        function newRowToSpecimenTable() {
            let tbody = document.getElementById("tableBody4");
            let row = document.createElement("tr");
            row.classList.add("new-row5"); // Ensure the row has the class

            row.innerHTML = `
                                                                                                                                                                                                                                                                            <td ></td>
                                                                                                                                                                                                                                                                            <td contenteditable="true"></td>
                                                                                                                                                                                                                                                                            <td contenteditable="true"></td>
                                                                                                                                                                                                                                                                            <td contenteditable="true"></td>
                                                                                                                                                                                                                                                                            <td contenteditable="true"></td>

                                                                                                                                                                                                                                                                        `;

            tbody.appendChild(row);
            console.log("New row added:", row); // Debugging log
        }
    </script>

    <script>
        // Submit sample rejection data
        function submitSampleRejectionData() {
            const rows = document.querySelectorAll("#sampleRejectionBody tr.sample-rejection-row");
            const selectedMonth = document.getElementById("dateFilter").value;

            if (!selectedMonth) {
                alert("Please select a month/year first");
                return;
            }

            const data = [];
            let hasData = false;

            rows.forEach(row => {
                const cells = row.querySelectorAll("td");
                const dateInput = row.querySelector(".rejection-datetime");

                // Only include rows with at least some data
                let rowHasData = false;
                for (let i = 1; i < cells.length; i++) {
                    if (cells[i].innerText.trim() !== "") {
                        rowHasData = true;
                        break;
                    }
                }

                if (rowHasData || (dateInput && dateInput.value)) {
                    hasData = true;
                    data.push({
                        date_time: dateInput ? dateInput.value : '',
                        patient_name: cells[1].innerText.trim(),
                        parameter: cells[2].innerText.trim(),
                        collected_by: cells[3].innerText.trim(),
                        sample_type: cells[4].innerText.trim(),
                        reason_for_rejection: cells[5].innerText.trim(),
                        informed_by_name: cells[6].innerText.trim(),
                        informed_by_signature: cells[7].innerText.trim(),
                        informed_to_name: cells[8].innerText.trim(),
                        fresh_sample_received: cells[9].innerText.trim().toLowerCase() === "yes" ? 1 : 0,
                        reg_no: cells[10].innerText.trim(),
                        month_year: selectedMonth
                    });
                }
            });

            if (!hasData) {
                alert("No data to save! Please enter at least some information.");
                return;
            }

            fetch("/save-accessioning", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                    "Accept": "application/json"
                },
                body: JSON.stringify({ rejections: data })
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(result => {
                    if (result.success) {
                        alert("Data saved successfully!");
                        fetchSampleRejections(); // Refresh the table
                    } else {
                        alert("Error: " + (result.message || "Failed to save data"));
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert("Error saving data. Please check console for details.");
                });
        }

        // Fetch sample rejections by month
        function fetchSampleRejections() {
            const selectedMonth = document.getElementById("dateFilter").value;

            if (!selectedMonth) {
                return;
            }

            fetch(`/get-sample-rejections?month_year=${selectedMonth}`, {
                headers: {
                    "Accept": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                }
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    const tbody = document.getElementById("sampleRejectionBody");
                    tbody.innerHTML = ""; // Clear existing rows

                    if (data.length === 0) {
                        // Add one empty row if no data found
                        addSampleRejectionRow();
                        return;
                    }

                    data.forEach(item => {
                        const row = document.createElement("tr");
                        row.className = "sample-rejection-row";

                        row.innerHTML = `
                                                                                                                            <td><input type="datetime-local" class="rejection-datetime" value="${item.date_time || ''}" required></td>
                                                                                                                            <td contenteditable="true">${item.patient_name || ''}</td>
                                                                                                                            <td contenteditable="true">${item.parameter || ''}</td>
                                                                                                                            <td contenteditable="true">${item.collected_by || ''}</td>
                                                                                                                            <td contenteditable="true">${item.sample_type || ''}</td>
                                                                                                                            <td contenteditable="true">${item.reason_for_rejection || ''}</td>
                                                                                                                            <td contenteditable="true">${item.informed_by_name || ''}</td>
                                                                                                                            <td contenteditable="true">${item.informed_by_signature || ''}</td>
                                                                                                                            <td contenteditable="true">${item.informed_to_name || ''}</td>
                                                                                                                            <td contenteditable="true">${item.fresh_sample_received ? 'Yes' : 'No'}</td>
                                                                                                                            <td contenteditable="true">${item.reg_no || ''}</td>
                                                                                                                        `;

                        tbody.appendChild(row);
                    });
                })
                .catch(error => {
                    console.error("Error fetching data:", error);
                    alert("Error fetching data. Please check console for details.");
                });
        }

        // Add new row to the table
        function addSampleRejectionRow() {
            const tbody = document.getElementById("sampleRejectionBody");
            const row = document.createElement("tr");
            row.className = "sample-rejection-row";

            row.innerHTML = `
                                                                                                                    <td><input type="datetime-local" class="rejection-datetime" required></td>
                                                                                                                    <td contenteditable="true"></td>
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
            // Scroll to the new row
            row.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }

        // Initialize the table when the page loads
        document.addEventListener('DOMContentLoaded', function () {
            const monthInput = document.getElementById("dateFilter");
            if (monthInput.value) {
                fetchSampleRejections();
            }
        });
    </script>
    <script>
        // Submit volume data
        function submitVolumeTableData() {
            const selectedMonth = document.getElementById("datePicker4").value;

            if (!selectedMonth) {
                alert("Please select a month/year first");
                return;
            }

            const table = document.getElementById("volume");
            const headerDates = [];
            const headerCells = table.querySelectorAll(".review-dates-header th[contenteditable='true']");

            // Collect header dates
            headerCells.forEach(cell => {
                const dateText = cell.innerText.trim();
                if (dateText) headerDates.push(dateText);
            });

            const containerTypes = [
                "SST Gel Vial (Yellow)",
                "Plain Vial (Red)",
                "EDTA Vial (Lavender)",
                "Sodium Fluoride Vial (Gray)",
                "Sodium Citrate Vial (Blue)",
                "Done By",
                "Reviewed By"
            ];

            const data = [];
            const rows = table.querySelectorAll("tbody tr");

            rows.forEach((row, index) => {
                if (index >= containerTypes.length) return;

                const cells = row.querySelectorAll("td");
                const rowData = {
                    container_type: containerTypes[index],
                    month_year: selectedMonth
                };

                // Special handling for "Done By" and "Reviewed By" rows
                if (containerTypes[index] === "Done By" || containerTypes[index] === "Reviewed By") {
                    rowData.special_value = cells[1].innerText.trim();
                } else {
                    // Regular container rows
                    rowData.sample_quantity = cells[1].innerText.trim();

                    const reviewDates = [];
                    for (let i = 2; i < cells.length; i++) {
                        const dateText = cells[i].innerText.trim();
                        if (dateText) reviewDates.push(dateText);
                    }
                    rowData.sample_review_dates = reviewDates;
                }

                // Only add if there's actual data
                if ((rowData.sample_quantity && rowData.sample_quantity !== "") ||
                    (rowData.special_value && rowData.special_value !== "") ||
                    (rowData.sample_review_dates && rowData.sample_review_dates.length > 0)) {
                    data.push(rowData);
                }
            });

            if (data.length === 0 && headerDates.length === 0) {
                alert("No data to save! Please enter information.");
                return;
            }

            // Show loading indicator
            const submitBtn = document.querySelector('button[onclick="submitVolumeTableData()"]');
            const originalBtnText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...';
            submitBtn.disabled = true;

            fetch("/save-sample-volume", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                    "Accept": "application/json"
                },
                body: JSON.stringify({
                    samples: data,
                    header_dates: headerDates,
                    month_year: selectedMonth
                })
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(result => {
                    if (result.success) {
                        alert("Data saved successfully!");
                    } else {
                        alert("Error: " + (result.message || "Failed to save data"));
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert("Error saving data. Please check console for details.");
                })
                .finally(() => {
                    submitBtn.innerHTML = originalBtnText;
                    submitBtn.disabled = false;
                });
        }

        // Fetch volume data by month
        function fetchVolumeData() {
            const selectedMonth = document.getElementById("datePicker4").value;

            if (!selectedMonth) {
                return;
            }

            // Show loading indicator
            const datePicker = document.getElementById("datePicker4");
            datePicker.disabled = true;

            fetch(`/get-sample-volume?month_year=${selectedMonth}`, {
                headers: {
                    "Accept": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                }
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    const table = document.getElementById("volume");

                    // Clear existing data
                    table.querySelectorAll(".sample-quantity, .review-date, .done-by, .reviewed-by").forEach(cell => {
                        cell.innerText = "";
                    });

                    // Update header dates if available
                    if (data.header_dates && data.header_dates.length > 0) {
                        const headerCells = table.querySelectorAll(".review-dates-header th");
                        data.header_dates.forEach((date, index) => {
                            if (headerCells[index]) {
                                headerCells[index].innerText = date;
                            }
                        });
                    }

                    // Update table data if available
                    if (data.samples && data.samples.length > 0) {
                        const containerTypes = [
                            "SST Gel Vial (Yellow)",
                            "Plain Vial (Red)",
                            "EDTA Vial (Lavender)",
                            "Sodium Fluoride Vial (Gray)",
                            "Sodium Citrate Vial (Blue)",
                            "Done By",
                            "Reviewed By"
                        ];

                        data.samples.forEach(sample => {
                            const index = containerTypes.indexOf(sample.container_type);
                            if (index === -1) return;

                            const row = table.querySelectorAll("tbody tr")[index];
                            if (!row) return;

                            const cells = row.querySelectorAll("td");

                            // Special handling for "Done By" and "Reviewed By"
                            if (sample.container_type === "Done By" || sample.container_type === "Reviewed By") {
                                if (cells[1]) cells[1].innerText = sample.special_value || "";
                            } else {
                                // Regular container rows
                                if (cells[1]) cells[1].innerText = sample.sample_quantity || "";

                                if (sample.sample_review_dates) {
                                    sample.sample_review_dates.forEach((date, dateIndex) => {
                                        if (cells[2 + dateIndex]) {
                                            cells[2 + dateIndex].innerText = date;
                                        }
                                    });
                                }
                            }
                        });
                    }
                })
                .catch(error => {
                    console.error("Error fetching data:", error);
                    alert("Error fetching data. Please check console for details.");
                })
                .finally(() => {
                    datePicker.disabled = false;
                });
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function () {
            // Set default month filter to current month
            const monthInput = document.getElementById("datePicker4");
            if (monthInput && !monthInput.value) {
                const now = new Date();
                monthInput.value = now.toISOString().slice(0, 7); // YYYY-MM format
            }

            // Load initial data
            if (monthInput && monthInput.value) {
                fetchVolumeData();
            }
        });
    </script>
    <script type="text/javascript">

        function updateTable(samples) {
            let table = document.getElementById("volume");
            let tableHead = table.querySelector("thead");
            let tableBody = table.querySelector("tbody");

            tableBody.innerHTML = ""; // Clear existing table data
            let headerDates = samples[0].header_dates;
            // **Ensure headerDates is an array**
            if (!Array.isArray(headerDates)) {
                console.error("headerDates is not an array:", headerDates);
                headerDates = [];
            }

            // **Update Header Dates**
            let headerRow = tableHead.querySelector("tr:nth-child(2)"); // Get second row in thead
            headerRow.innerHTML = "";

            headerDates.forEach(date => {
                headerRow.innerHTML += `<th contenteditable="true">${date}</th>`;
            });

            // **Update Table Body with Sample Data**
            samples.forEach(sample => {
                let reviewDates = Array.isArray(sample.sample_review_dates) ? sample.sample_review_dates : [];
                let row = `<tr>
                                                                                                                                                                                                                                                                                <td>${sample.container_type}</td>
                                                                                                                                                                                                                                                                                <td contenteditable="true">${sample.sample_quantity || ''}</td>
                                                                                                                                                                                                                                                                                ${reviewDates.map(date => `<td contenteditable="true">${date}</td>`).join('')}
                                                                                                                                                                                                                                                                            </tr>`;

                tableBody.innerHTML += row;
            });
        }


    </script>
    <script>
        // Function to add a new row to the receiving table
        function addReceivingRow(sampleData = null) {
            const tbody = document.getElementById("tableBody1");
            const row = document.createElement("tr");
            row.className = "receiving-row";

            // Set row ID if editing existing record
            if (sampleData && sampleData.id) {
                row.setAttribute("data-id", sampleData.id);
            }

            // Create row HTML
            row.innerHTML = `
                                                                                                    <td><input type="date" class="receiving-date" value="${sampleData ? sampleData.date : ''}" required></td>
                                                                                                    <td><input type="time" class="receiving-time" value="${sampleData ? sampleData.time : ''}" required></td>
                                                                                                    <td contenteditable="true">${sampleData ? (sampleData.client_location || '') : ''}</td>
                                                                                                    <td contenteditable="true">${sampleData ? (sampleData.client_name || '') : ''}</td>
                                                                                                    <td contenteditable="true">${sampleData ? (sampleData.tl_code || '') : ''}</td>
                                                                                                    <td contenteditable="true">${sampleData ? (sampleData.blood || '') : ''}</td>
                                                                                                    <td contenteditable="true">${sampleData ? (sampleData.covid || '') : ''}</td>
                                                                                                    <td contenteditable="true">${sampleData ? (sampleData.csr_name || '') : ''}</td>
                                                                                                    <td contenteditable="true">${sampleData ? (sampleData.csr_sign || '') : ''}</td>
                                                                                                    <td contenteditable="true">${sampleData ? (sampleData.sample_temp || '') : ''}</td>
                                                                                                    <td contenteditable="true">${sampleData ? (sampleData.receiver_name || '') : ''}</td>
                                                                                                    <td contenteditable="true">${sampleData ? (sampleData.remark || '') : ''}</td>
                                                                                                    <td>
                                                                                                        <button class="btn btn-sm btn-danger" onclick="removeReceivingRow(this)">×</button>
                                                                                                    </td>
                                                                                                `;

            // Add row to table
            tbody.appendChild(row);

            // Set current date as default if new row
            if (!sampleData) {
                const dateInput = row.querySelector('.receiving-date');
                if (dateInput) {
                    dateInput.valueAsDate = new Date();
                }

                const timeInput = row.querySelector('.receiving-time');
                if (timeInput) {
                    const now = new Date();
                    timeInput.value = now.toTimeString().substring(0, 5); // HH:mm format
                }
            }

            // Scroll to the new row
            row.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

            // Focus on the first editable cell
            const firstEditableCell = row.querySelector('td[contenteditable="true"]');
            if (firstEditableCell) {
                firstEditableCell.focus();
            }
        }

        // Function to remove a row
        function removeReceivingRow(button) {
            const row = button.closest('tr');
            const rowId = row.getAttribute('data-id');

            if (!confirm("Are you sure you want to delete this record?")) {
                return;
            }

            if (rowId) {
                // Show loading state
                const originalText = button.innerHTML;
                button.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Deleting...';
                button.disabled = true;

                fetch(`/receiving-records/${rowId}`, {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                        "Accept": "application/json",
                        "Content-Type": "application/json"
                    }
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(result => {
                        if (result.success) {
                            row.remove();
                            showToast("Record deleted successfully", "success");
                            // Optional: Refresh the table or update UI as needed
                        } else {
                            showToast(result.message || "Failed to delete record", "error");
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        showToast("Error deleting record: " + error.message, "error");
                    })
                    .finally(() => {
                        button.innerHTML = originalText;
                        button.disabled = false;
                    });
            } else {
                // For rows not yet saved to database (no ID)
                row.remove();
                showToast("Row removed", "info");
            }
        }
        // Submit all receiving data
        function submitReceivingTableData() {
            const rows = document.querySelectorAll("#tableBody1 .receiving-row");
            const selectedMonth = document.getElementById("dateFilter5").value;

            if (!selectedMonth) {
                showToast("Please select a month/year first", "error");
                return;
            }

            const data = [];
            let hasData = false;

            rows.forEach(row => {
                const dateInput = row.querySelector(".receiving-date");
                const timeInput = row.querySelector(".receiving-time");
                const cells = row.querySelectorAll("td");

                // Create row data object
                const rowData = {
                    date: dateInput ? dateInput.value : '',
                    time: timeInput ? timeInput.value : '',
                    client_location: cells[2].innerText.trim(),
                    client_name: cells[3].innerText.trim(),
                    tl_code: cells[4].innerText.trim(),
                    blood: cells[5].innerText.trim(),
                    covid: cells[6].innerText.trim(),
                    csr_name: cells[7].innerText.trim(),
                    csr_sign: cells[8].innerText.trim(),
                    sample_temp: cells[9].innerText.trim(),
                    receiver_name: cells[10].innerText.trim(),
                    remark: cells[11].innerText.trim(),
                    month_year: selectedMonth
                };

                // Check if row has any data
                const rowHasData = Object.values(rowData).some(
                    value => value && value.toString().trim() !== ''
                );

                if (rowHasData) {
                    hasData = true;
                    // Add ID if this is an existing row
                    const rowId = row.getAttribute("data-id");
                    if (rowId) {
                        rowData.id = rowId;
                    }
                    data.push(rowData);
                }
            });

            if (!hasData) {
                showToast("No data to save! Please enter information.", "error");
                return;
            }

            // Show loading indicator
            const submitBtn = document.querySelector('button[onclick="submitReceivingTableData()"]');
            const originalBtnText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...';
            submitBtn.disabled = true;

            fetch("/save-receiving-data", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                    "Accept": "application/json"
                },
                body: JSON.stringify({ samples: data })
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(result => {
                    if (result.success) {
                        showToast("Data saved successfully!", "success");
                        // Update row IDs if new records were created
                        if (result.updatedIds) {
                            result.updatedIds.forEach((id, index) => {
                                if (rows[index]) {
                                    rows[index].setAttribute("data-id", id);
                                }
                            });
                        }
                    } else {
                        showToast(result.message || "Failed to save data", "error");
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    showToast("Error saving data", "error");
                })
                .finally(() => {
                    submitBtn.innerHTML = originalBtnText;
                    submitBtn.disabled = false;
                });
        }

        // Fetch data for selected month
        function fetchReceivingTableData() {
            const selectedMonth = document.getElementById("dateFilter5").value;

            if (!selectedMonth) {
                return;
            }

            // Show loading indicator
            const dateFilter = document.getElementById("dateFilter5");
            dateFilter.disabled = true;

            fetch(`/fetch-sample-receiving?month_year=${selectedMonth}`, {
                headers: {
                    "Accept": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                }
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    const tbody = document.getElementById("tableBody1");
                    tbody.innerHTML = ""; // Clear existing rows

                    if (data.samples && data.samples.length > 0) {
                        data.samples.forEach(sample => {
                            addReceivingRow(sample);
                        });
                    } else {
                        // Add one empty row if no data found
                        addReceivingRow();
                        // showToast("No records found for selected month", "info");
                    }
                })
                .catch(error => {
                    console.error("Error fetching data:", error);
                    showToast("Error fetching data", "error");
                })
                .finally(() => {
                    dateFilter.disabled = false;
                });
        }

        // Helper function to show toast notifications
        function showToast(message, type = 'info') {
            // You can implement a toast notification system here
            // For now using simple alerts
            alert(`${type.toUpperCase()}: ${message}`);
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function () {
            // Set default month filter to current month
            const monthInput = document.getElementById("dateFilter5");
            if (monthInput && !monthInput.value) {
                const now = new Date();
                monthInput.value = now.toISOString().slice(0, 7); // YYYY-MM format
            }

            // Add event listener for Enter key in cells
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Enter' && e.target.hasAttribute('contenteditable')) {
                    e.preventDefault();
                    const row = e.target.closest('tr');
                    const nextCell = e.target.nextElementSibling;
                    if (nextCell) {
                        if (nextCell.hasAttribute('contenteditable')) {
                            nextCell.focus();
                        } else {
                            const nextEditable = nextCell.querySelector('[contenteditable="true"]');
                            if (nextEditable) nextEditable.focus();
                        }
                    }
                }
            });

            // Load initial data
            if (monthInput && monthInput.value) {
                fetchReceivingTableData();
            } else {
                // Ensure at least one empty row exists
                addReceivingRow();
            }
        });
    </script>
    <script>
        // Submit outsourcing data
        function submitOutSourcingTableData() {
            const rows = document.querySelectorAll("#outsourcingBody .outsourcing-row");
            const selectedMonth = document.getElementById("dateFilter6").value;

            if (!selectedMonth) {
                alert("Please select a month/year first");
                return;
            }

            const data = [];
            let hasData = false;
            let rowCounter = 1;

            rows.forEach(row => {
                const dateInput = row.querySelector(".outsourcing-date");
                const cells = row.querySelectorAll("td");

                // Only include rows with at least some data
                let rowHasData = false;
                for (let i = 2; i < cells.length - 1; i++) { // Skip S.NO, date and action columns
                    if (cells[i].innerText.trim() !== "") {
                        rowHasData = true;
                        break;
                    }
                }

                if (rowHasData || (dateInput && dateInput.value)) {
                    hasData = true;
                    const rowData = {
                        date: dateInput ? dateInput.value : '',
                        barcode: cells[2].innerText.trim(),
                        patient_name: cells[3].innerText.trim(),
                        department: cells[4].innerText.trim(),
                        test_name_code: cells[5].innerText.trim(),
                        handover_sign_date_time: cells[6].innerText.trim(),
                        receiver_sign_date_time: cells[7].innerText.trim(),
                        handover_outsourced_lab: cells[8].innerText.trim(),
                        outsourced_receiver_date_time: cells[9].innerText.trim(),
                        month_year: selectedMonth
                    };

                    // Add ID if this is an existing row
                    const rowId = row.getAttribute("data-id");
                    if (rowId) {
                        rowData.id = rowId;
                    }

                    data.push(rowData);
                }
            });

            if (!hasData) {
                alert("No data to save! Please enter at least some information.");
                return;
            }

            // Show loading indicator
            const submitBtn = document.querySelector('button[onclick="submitOutSourcingTableData()"]');
            const originalBtnText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...';
            submitBtn.disabled = true;

            fetch("/save-outsourcing-data", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                    "Accept": "application/json"
                },
                body: JSON.stringify({ samples: data })
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(result => {
                    if (result.success) {
                        alert("Data saved successfully!");
                        fetchOutSourceData(); // Refresh the table
                    } else {
                        alert("Error: " + (result.message || "Failed to save data"));
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert("Error saving data. Please check console for details.");
                })
                .finally(() => {
                    submitBtn.innerHTML = originalBtnText;
                    submitBtn.disabled = false;
                });
        }

        // Fetch outsourcing data by month
        function fetchOutSourceData() {
            const selectedMonth = document.getElementById("dateFilter6").value;

            if (!selectedMonth) {
                return;
            }

            // Show loading indicator
            const dateFilter = document.getElementById("dateFilter6");
            dateFilter.disabled = true;

            fetch(`/fetch-sample-outsourcing?month_year=${selectedMonth}`, {
                headers: {
                    "Accept": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                }
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    const tbody = document.getElementById("outsourcingBody");
                    tbody.innerHTML = ""; // Clear existing rows

                    if (data.samples && data.samples.length > 0) {
                        data.samples.forEach((sample, index) => {
                            addOutsourcingRow(sample, index + 1);
                        });
                    } else {
                        // Add one empty row if no data found
                        addOutsourcingRow();
                        // alert("No records found for selected month");
                    }
                })
                .catch(error => {
                    console.error("Error fetching data:", error);
                    alert("Error fetching data. Please check console for details.");
                })
                .finally(() => {
                    dateFilter.disabled = false;
                });
        }

        // Add new row to the table
        function addOutsourcingRow(sampleData = null, rowNumber = null) {
            const tbody = document.getElementById("outsourcingBody");
            const row = document.createElement("tr");
            row.className = "outsourcing-row";

            if (sampleData && sampleData.id) {
                row.setAttribute("data-id", sampleData.id);
            }

            // Auto-increment row number if not provided
            if (rowNumber === null) {
                const existingRows = tbody.querySelectorAll(".outsourcing-row");
                rowNumber = existingRows.length + 1;
            }

            row.innerHTML = `
                                                        <td>${rowNumber}</td>
                                                        <td><input type="date" class="outsourcing-date" value="${sampleData ? sampleData.date : ''}" required></td>
                                                        <td contenteditable="true">${sampleData ? sampleData.barcode : ''}</td>
                                                        <td contenteditable="true">${sampleData ? sampleData.patient_name : ''}</td>
                                                        <td contenteditable="true">${sampleData ? sampleData.department : ''}</td>
                                                        <td contenteditable="true">${sampleData ? sampleData.test_name_code : ''}</td>
                                                        <td contenteditable="true">${sampleData ? sampleData.handover_sign_date_time : ''}</td>
                                                        <td contenteditable="true">${sampleData ? sampleData.receiver_sign_date_time : ''}</td>
                                                        <td contenteditable="true">${sampleData ? sampleData.handover_outsourced_lab : ''}</td>
                                                        <td contenteditable="true">${sampleData ? sampleData.outsourced_receiver_date_time : ''}</td>
                                                        <td><button class="btn btn-sm btn-danger" onclick="removeOutsourcingRow(this)">×</button></td>
                                                    `;

            tbody.appendChild(row);

            // Set current date as default if new row
            if (!sampleData) {
                const dateInput = row.querySelector('.outsourcing-date');
                if (dateInput) {
                    dateInput.valueAsDate = new Date();
                }
            }

            // Scroll to the new row
            row.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

            // Focus on the first editable cell
            const firstEditableCell = row.querySelector('td[contenteditable="true"]');
            if (firstEditableCell) {
                firstEditableCell.focus();
            }
        }

        // Remove a row
        function removeOutsourcingRow(button) {
            const row = button.closest('tr');
            const rowId = row.getAttribute('data-id');

            if (rowId) {
                if (confirm("Are you sure you want to delete this record?")) {
                    fetch(`/delete-outsourcing-record/${rowId}`, {
                        method: "DELETE",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                            "Accept": "application/json"
                        }
                    })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                row.remove();
                                updateRowNumbers();
                            } else {
                                // alert("Error: " + (result.message || "Failed to delete record"));
                            }
                        })
                        .catch(error => {
                            console.error("Error:", error);
                            alert("Error deleting record. Please check console for details.");
                        });
                }
            } else {
                row.remove();
                updateRowNumbers();
            }
        }

        // Update row numbers sequentially
        function updateRowNumbers() {
            const rows = document.querySelectorAll("#outsourcingBody .outsourcing-row");
            rows.forEach((row, index) => {
                const numberCell = row.querySelector('td:first-child');
                if (numberCell) {
                    numberCell.textContent = index + 1;
                }
            });
        }

        // Initialize the table when the page loads
        document.addEventListener('DOMContentLoaded', function () {
            // Set default month filter to current month
            const monthInput = document.getElementById("dateFilter6");
            if (monthInput && !monthInput.value) {
                const now = new Date();
                monthInput.value = now.toISOString().slice(0, 7); // YYYY-MM format
            }

            // Add event listener for Enter key in cells
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Enter' && e.target.hasAttribute('contenteditable')) {
                    e.preventDefault();
                    const row = e.target.closest('tr');
                    const nextCell = e.target.nextElementSibling;
                    if (nextCell) {
                        if (nextCell.hasAttribute('contenteditable')) {
                            nextCell.focus();
                        } else {
                            const nextEditable = nextCell.querySelector('[contenteditable="true"]');
                            if (nextEditable) nextEditable.focus();
                        }
                    }
                }
            });

            // Load initial data
            if (monthInput && monthInput.value) {
                fetchOutSourceData();
            } else {
                // Ensure at least one empty row exists
                addOutsourcingRow();
            }
        });
    </script>
    <script>
        // Submit first aid data
        function submitFirstAidTableData() {
            const department = document.getElementById("departmentSelect").value;
            const monthYear = document.getElementById("monthYearFilter").value;

            if (!department) {
                alert("Please select a department");
                return;
            }

            if (!monthYear) {
                alert("Please select a month/year");
                return;
            }

            const rows = document.querySelectorAll("#firstAidBody .first-aid-row");
            const data = [];
            let hasData = false;

            rows.forEach((row, index) => {
                const cells = row.querySelectorAll("td");
                const expiryDate = row.querySelector(".expiry-date").value;
                const replacedExpiryDate = row.querySelector(".replaced-expiry-date").value;

                const rowData = {
                    item_available: cells[1].innerText.trim(),
                    expiry_date: expiryDate,
                    replaced_item: cells[3].innerText.trim(),
                    quantity_replaced: cells[4].innerText.trim(),
                    replaced_expiry_date: replacedExpiryDate,
                    replaced_by: cells[6].innerText.trim(),
                    remarks: cells[7].innerText.trim(),
                    department: department,
                    month_year: monthYear
                };

                // Only include rows with at least some data
                if (rowData.item_available || rowData.replaced_item) {
                    hasData = true;

                    // Add ID if this is an existing row
                    const rowId = row.getAttribute("data-id");
                    if (rowId) {
                        rowData.id = rowId;
                    }

                    data.push(rowData);
                }
            });

            if (!hasData) {
                alert("No data to save! Please enter at least some information.");
                return;
            }

            // Show loading indicator
            const submitBtn = document.querySelector('button[onclick="submitFirstAidTableData()"]');
            const originalBtnText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...';
            submitBtn.disabled = true;

            fetch("/save-first-aid-kit-log", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                    "Accept": "application/json"
                },
                body: JSON.stringify({ data })
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(result => {
                    if (result.success) {
                        alert("Data saved successfully!");
                        fetchFirstAidLogs(); // Refresh the table
                    } else {
                        alert("Error: " + (result.message || "Failed to save data"));
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert("Error saving data. Please check console for details.");
                })
                .finally(() => {
                    submitBtn.innerHTML = originalBtnText;
                    submitBtn.disabled = false;
                });
        }

        // Fetch first aid logs
        function fetchFirstAidLogs() {
            const department = document.getElementById("departmentSelect").value;
            const monthYear = document.getElementById("monthYearFilter").value;

            if (!monthYear) {
                return;
            }

            // Show loading indicator
            const departmentSelect = document.getElementById("departmentSelect");
            const monthYearFilter = document.getElementById("monthYearFilter");
            departmentSelect.disabled = true;
            monthYearFilter.disabled = true;

            fetch(`/get-first-aid-kit-logs?month_year=${monthYear}&department=${department}`, {
                headers: {
                    "Accept": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                }
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    const tbody = document.getElementById("firstAidBody");
                    tbody.innerHTML = ""; // Clear existing rows

                    if (data.logs && data.logs.length > 0) {
                        data.logs.forEach((log, index) => {
                            addFirstAidRow(log, index + 1);
                        });
                    } else {
                        // Add one empty row if no data found
                        addFirstAidRow();
                        alert("No records found for selected criteria");
                    }
                })
                .catch(error => {
                    console.error("Error fetching data:", error);
                    alert("Error fetching data. Please check console for details.");
                })
                .finally(() => {
                    departmentSelect.disabled = false;
                    monthYearFilter.disabled = false;
                });
        }

        // Add new row to the table
        function addFirstAidRow(logData = null, rowNumber = null) {
            const tbody = document.getElementById("firstAidBody");
            const row = document.createElement("tr");
            row.className = "first-aid-row";

            if (logData && logData.id) {
                row.setAttribute("data-id", logData.id);
            }

            // Auto-increment row number if not provided
            if (rowNumber === null) {
                const existingRows = tbody.querySelectorAll(".first-aid-row");
                rowNumber = existingRows.length + 1;
            }

            row.innerHTML = `
                                    <td>${rowNumber}</td>
                                    <td contenteditable="true">${logData ? logData.item_available : ''}</td>
                                    <td><input type="date" class="expiry-date" value="${logData ? logData.expiry_date : ''}"></td>
                                    <td contenteditable="true">${logData ? logData.replaced_item : ''}</td>
                                    <td contenteditable="true">${logData ? logData.quantity_replaced : ''}</td>
                                    <td><input type="date" class="replaced-expiry-date" value="${logData ? logData.replaced_expiry_date : ''}"></td>
                                    <td contenteditable="true">${logData ? logData.replaced_by : ''}</td>
                                    <td contenteditable="true">${logData ? logData.remarks : ''}</td>
                                    <td><button class="btn btn-sm btn-danger" onclick="removeFirstAidRow(this)">×</button></td>
                                `;

            tbody.appendChild(row);

            // Scroll to the new row
            row.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

            // Focus on the first editable cell
            const firstEditableCell = row.querySelector('td[contenteditable="true"]');
            if (firstEditableCell) {
                firstEditableCell.focus();
            }
        }

        // Remove a row
        function removeFirstAidRow(button) {
            const row = button.closest('tr');
            const rowId = row.getAttribute('data-id');

            if (rowId) {
                if (confirm("Are you sure you want to delete this record?")) {
                    fetch(`/delete-first-aid-record/${rowId}`, {
                        method: "DELETE",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                            "Accept": "application/json"
                        }
                    })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                row.remove();
                                updateFirstAidRowNumbers();
                            } else {
                                alert("Error: " + (result.message || "Failed to delete record"));
                            }
                        })
                        .catch(error => {
                            console.error("Error:", error);
                            alert("Error deleting record. Please check console for details.");
                        });
                }
            } else {
                row.remove();
                updateFirstAidRowNumbers();
            }
        }

        // Update row numbers sequentially
        function updateFirstAidRowNumbers() {
            const rows = document.querySelectorAll("#firstAidBody .first-aid-row");
            rows.forEach((row, index) => {
                const numberCell = row.querySelector('td:first-child');
                if (numberCell) {
                    numberCell.textContent = index + 1;
                }
            });
        }

        // Initialize the table when the page loads
        document.addEventListener('DOMContentLoaded', function () {
            // Set default month filter to current month
            const monthInput = document.getElementById("monthYearFilter");
            if (monthInput && !monthInput.value) {
                const now = new Date();
                monthInput.value = now.toISOString().slice(0, 7); // YYYY-MM format
            }

            // Add event listener for Enter key in cells
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Enter' && e.target.hasAttribute('contenteditable')) {
                    e.preventDefault();
                    const row = e.target.closest('tr');
                    const nextCell = e.target.nextElementSibling;
                    if (nextCell) {
                        if (nextCell.hasAttribute('contenteditable')) {
                            nextCell.focus();
                        } else {
                            const nextEditable = nextCell.querySelector('[contenteditable="true"]');
                            if (nextEditable) nextEditable.focus();
                        }
                    }
                }
            });

            // Load initial data if department is selected
            const department = document.getElementById("departmentSelect").value;
            if (department && monthInput && monthInput.value) {
                fetchFirstAidLogs();
            } else {
                // Ensure at least one empty row exists
                addFirstAidRow();
            }
        });
    </script>
    <script type="text/javascript">
        function submitSpecimenTableData() {
            let department = document.querySelector('input[name="department1"]').value;

            let rows = document.querySelectorAll("tbody .new-row5");
            let data = [];
            const dateValue = document.getElementById("datePicked").value || new Date().toISOString().split("T")[0];

            rows.forEach(row => {
                let cells = row.querySelectorAll("td");
                let rowData = {
                    employee_name: cells[1].innerText.trim() || '',
                    designation: cells[2].innerText.trim() || '',
                    full_signature: cells[3].innerText.trim() || '',
                    short_signature: cells[4].innerText.trim() || ''
                };
                let rowId = row.getAttribute("data-id");
                if (rowId) {
                    rowData.id = rowId; // Add ID if exists
                }
                data.push(rowData);
            });

            if (data.length === 0) {
                alert("No new rows to save!");
                return;
            }

            // Send data to backend
            fetch("/save-specimen-signatures", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                },
                body: JSON.stringify({ department, month_year: dateValue, data }),
            })
                .then(response => response.json())
                .then(result => {
                    alert(result.message);
                })
                .catch(error => console.error("Error:", error));
        }
        function fetchSpecimenLogs() {

            let department = document.querySelector('input[name="department1"]').value;
            let monthYear = document.getElementById("datePicked").value;
            if (!monthYear) {
                alert("Please select a month and year!");
                return;
            }

            fetch(`/get-specimen-logs?month_year=${monthYear}&department=${department}`, {
                method: "GET",
                headers: {
                    "Content-Type": "application/json"
                }
            })
                .then(response => response.json())
                .then(data => {
                    let tbody = document.getElementById("tableBody4");
                    tbody.innerHTML = ""; // Clear previous data

                    if (data.length === 0) {
                        tbody.innerHTML = "<tr><td colspan='8'>No records found</td></tr>";
                        return;
                    }
                    document.querySelector('input[name="department1"]').value = data[0].department;
                    data.forEach((row, index) => {
                        let newRow = `<tr class="new-row5" data-id="${row.id || ''}">
                                                                                                                                                                                                                                                                                    <td >${index + 1}</td>
                                                                                                                                                                                                                                                                                    <td contenteditable="true">${row.employee_name}</td>
                                                                                                                                                                                                                                                                                    <td contenteditable="true">${row.designation}</td>
                                                                                                                                                                                                                                                                                    <td contenteditable="true">${row.full_signature}</td>
                                                                                                                                                                                                                                                                                    <td contenteditable="true">${row.short_signature}</td>
                                                                                                                                                                                                                                                                                </tr>`;
                        tbody.innerHTML += newRow;
                    });
                })
                .catch(error => console.error("Error:", error));
        }
    </script>

    </html>


@endsection