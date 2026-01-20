@extends('layouts.base')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GE</title>
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
            <div style="font-size: 20px; ">GE </div>

        </div>
        <div class="icon-view">
            <div class="pc-content">
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-001')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">First Aid Kit Monitoring Form</span>
                </div>

                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-002')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Needle Stick Injury Log Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-003')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Sample Rejection Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-004')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Accident Reporting Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-005')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Analyte Calibration Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-006')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Biomedical Waste Disposal Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-007')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Physician Feedback Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-008')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Critical Call-Out Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-009')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">EQAS Sample Processing Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-010')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Daily Cleaning Checklist for Lab</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-011')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Daily Cleanliness Log for Rest Room</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-012')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Daily IQC Data Monitoring Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-014')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Distilled Water Plant Checklist</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-015')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Equipment Startup and Shutdown Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-016')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Eye Wash Monitoring Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-017')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label"> Inter-Laboratory Comparison Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-018')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label"> Laboratory Incident Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-019')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label"> Employee Suggestion for Improvement Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-020')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label"> New Reagent Lot Verification</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-021')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label"> Non-Conformity & Corrective Action Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-022')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Refrigerator Temperature Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-023')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Repeat Test Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-025')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">NiU-Transcription Check Forms</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-027')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label"> Meeting Agenda Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-029')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Approved Referral Laboratories Consultants Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-030')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Room Temperature and Humidity Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-031')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label"> Amendment Report Monitoring Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-033')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Daily Preparation of 1% Sodium Hypochlorite Solution Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-034')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Deep Freezer Temperature Monitoring Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-035')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Corrective Action & Preventive Action Form for EQAS Outliers</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-036')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Daily IQC Outlier Non-Conformity & Preventive Action Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-037')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label"> Authorized Persons on Software Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-038')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Authorized Personnel for Handling the Instruments Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-039')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label"> Minutes of Meeting</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-040')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label"> Test Requisition Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-044')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label"> Split Sample Analysis Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-047')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Reagent & Consumables Consumption Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/REG-001')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Shift Handover Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/REG-002')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Department Sample Storage & Discard Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/REG-003')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Sample Integrity Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/REG-005')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Inter-Department Sample Transfer Register</span>
                </div>
            </div>
        </div>
    </div>


    <x-formTemplete
        id="TDPL/GE/FOM-001"
        docNo="TDPL/GE/FOM-001"
        docName="First Aid Kit Monitoring Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <p>
            <strong>Month/Year:</strong>
            <input type="month" name="month_year" style="border:1px solid #000; padding:4px; width:150px; margin-right:20px;">

            <strong>Location:</strong>
            <input type="text" name="location" style="border:1px solid #000; padding:4px; width:150px; margin-right:20px;">

            <strong>Department:</strong>
            <input type="text" name="department" style="border:1px solid #000; padding:4px; width:150px;">
        </p>

        <table style="width:100%; border-collapse:collapse; margin-top:10px;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px;">S. No.</th>
                    <th style="border:1px solid #000; padding:6px;">Items Available</th>
                    <th style="border:1px solid #000; padding:6px;">Expiry Date</th>
                    <th style="border:1px solid #000; padding:6px;">Replaced Item</th>
                    <th style="border:1px solid #000; padding:6px;">Quantity Replaced</th>
                    <th style="border:1px solid #000; padding:6px;">Expiry Date</th>
                    <th style="border:1px solid #000; padding:6px;">Replaced on - Date</th>
                    <th style="border:1px solid #000; padding:6px;">Replaced by &amp; Sign</th>
                    <th style="border:1px solid #000; padding:6px;">Remarks</th>
                </tr>
            </thead>

            <tbody>
                @foreach(range(1,20) as $i)
                <tr>
                    <td style="border:1px solid #000; padding:6px; text-align:center;">
                        {{ $i }}
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="items_available[{{ $i }}]" style="width:100%; border:1px solid #000; padding:4px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="date" name="expiry_date_1[{{ $i }}]" style="width:100%; border:1px solid #000; padding:4px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="replaced_item[{{ $i }}]" style="width:100%; border:1px solid #000; padding:4px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="number" name="quantity_replaced[{{ $i }}]" style="width:100%; border:1px solid #000; padding:4px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="date" name="expiry_date_2[{{ $i }}]" style="width:100%; border:1px solid #000; padding:4px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="date" name="replaced_on[{{ $i }}]" style="width:100%; border:1px solid #000; padding:4px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="replaced_by[{{ $i }}]" style="width:100%; border:1px solid #000; padding:4px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="remarks[{{ $i }}]" style="width:100%; border:1px solid #000; padding:4px;">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <p style="margin-top:20px;">
            <strong>Verified by QM:</strong>
            <input type="text" name="verified_by" style="border:1px solid #000; padding:4px; width:250px;">
        </p>



    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-002"
        docNo="TDPL/GE/FOM-002"
        docName="Needle Stick Injury Log Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <p style="margin-bottom:10px;">
            <strong>Name of injured person:</strong>
            <input type="text" name="injured_person"
                style="border:1px solid #000; padding:4px; width:60%; margin-left:10px;">
        </p>

        <p style="margin-bottom:10px;">
            <strong>Date &amp; Time of exposure:</strong>
            <input type="datetime-local" name="exposure_datetime"
                style="border:1px solid #000; padding:4px; width:40%; margin-left:10px;">
        </p>

        <p style="margin-top:15px; margin-bottom:5px;">
            <strong>Sequence of events leading to exposure:</strong>
        </p>
        <textarea name="sequence_of_events"
            style="width:100%; height:80px; border:1px solid #000; padding:6px;"></textarea>

        <p style="margin-top:15px; margin-bottom:5px;">
            <strong>Details of exposure:</strong>
        </p>
        <textarea name="details_of_exposure"
            style="width:100%; height:80px; border:1px solid #000; padding:6px;"></textarea>

        <p style="margin-top:15px; margin-bottom:5px;">
            <strong>Details of counseling and post-exposure management:</strong>
        </p>
        <textarea name="counseling_details"
            style="width:100%; height:80px; border:1px solid #000; padding:6px;"></textarea>

        <p style="margin-top:15px; margin-bottom:5px;">
            <strong>Information about the source person:</strong>
        </p>
        <textarea name="source_person_info"
            style="width:100%; height:80px; border:1px solid #000; padding:6px;"></textarea>

        <p style="margin-top:15px; margin-bottom:5px;">
            <strong>Steps taken to prevent the recurrence of such an accident:</strong>
        </p>
        <textarea name="preventive_steps"
            style="width:100%; height:100px; border:1px solid #000; padding:6px;"></textarea>

        <p style="margin-top:20px;">
            <strong>Name, Designation & Signature with Date (of person recording the above):</strong>
        </p>

        <input type="text" name="recorded_by"
            placeholder="Name & Designation"
            style="border:1px solid #000; padding:4px; width:50%; margin-top:5px;">

        <input type="date" name="recorded_date"
            style="border:1px solid #000; padding:4px; width:20%; margin-left:20px;">

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-003"
        docNo="TDPL/GE/FOM-003"
        docName="Sample Rejection Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <p style="margin-bottom:10px;">
            <strong>Month/Year:</strong>
            <input type="month" name="month_year" style="border:1px solid #000; padding:4px; width:150px; margin-right:20px;">

            <strong>Location:</strong>
            <input type="text" name="location" style="border:1px solid #000; padding:4px; width:150px; margin-right:20px;">

            <strong>Department:</strong>
            <input type="text" name="department" style="border:1px solid #000; padding:4px; width:150px;">
        </p>

        <table style="width:100%; border-collapse:collapse; margin-top:10px;">
            <thead>
                <tr>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;">Date/Time</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;">Patient Name &amp; Barcode</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;">Parameter</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;">Collected By</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;">Primary Sample Type</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;">Reason for Rejection</th>
                    <th colspan="2" style="border:1px solid #000; padding:6px;">Informed By</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;">Informed To CSD with Tkt. #</th>
                    <th colspan="2" style="border:1px solid #000; padding:6px;">Fresh sample Received</th>
                </tr>
                <tr>
                    <th style="border:1px solid #000; padding:6px;">Name</th>
                    <th style="border:1px solid #000; padding:6px;">Dated Signature</th>
                    <th style="border:1px solid #000; padding:6px;">Y (Dt.&amp;Time) / N</th>
                    <th style="border:1px solid #000; padding:6px;">New Barcode</th>
                </tr>
            </thead>

            <tbody>
                @foreach(range(1,12) as $i)
                <tr>
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="datetime-local" name="date_time[{{ $i }}]" style="width:100%; padding:4px; border:1px solid #000;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="patient_barcode[{{ $i }}]" style="width:100%; padding:4px; border:1px solid #000;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="parameter[{{ $i }}]" style="width:100%; padding:4px; border:1px solid #000;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="collected_by[{{ $i }}]" style="width:100%; padding:4px; border:1px solid #000;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="sample_type[{{ $i }}]" style="width:100%; padding:4px; border:1px solid #000;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="reason_rejection[{{ $i }}]" style="width:100%; padding:4px; border:1px solid #000;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="informed_by_name[{{ $i }}]" style="width:100%; padding:4px; border:1px solid #000;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="informed_by_sign[{{ $i }}]" style="width:100%; padding:4px; border:1px solid #000;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="informed_to_csd[{{ $i }}]" style="width:100%; padding:4px; border:1px solid #000;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="fresh_sample_yes_no[{{ $i }}]" style="width:100%; padding:4px; border:1px solid #000;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="new_barcode[{{ $i }}]" style="width:100%; padding:4px; border:1px solid #000;">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-004"
        docNo="TDPL/GE/FOM-004"
        docName="Accident Reporting Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <p style="margin-bottom:10px;">
            <strong>Year:</strong>
            <input type="number" name="year" style="border:1px solid #000; padding:4px; width:120px; margin-right:20px;">

            <strong>Location:</strong>
            <input type="text" name="location" style="border:1px solid #000; padding:4px; width:200px;">
        </p>

        <table style="width:100%; border-collapse:collapse; margin-top:10px;">
            <thead>
                <tr>
                    <th style="padding:6px; border:1px solid #000;">Date &amp; Time</th>
                    <th style="padding:6px; border:1px solid #000;">Person Involved</th>
                    <th style="padding:6px; border:1px solid #000;">Injuries Sustained</th>
                    <th style="padding:6px; border:1px solid #000;">Emergency First-Aid Given</th>
                    <th style="padding:6px; border:1px solid #000;">
                        First-Aid Given By<br>
                        <span style="font-weight:400;">(Name &amp; Signature)</span>
                    </th>
                    <th style="padding:6px; border:1px solid #000;">Follow-Up Action</th>
                    <th style="padding:6px; border:1px solid #000;">Preventive Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach(range(1,9) as $i)
                <tr>
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="datetime-local" name="date_time[{{ $i }}]"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="person_involved[{{ $i }}]"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="injuries_sustained[{{ $i }}]"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="emergency_first_aid[{{ $i }}]"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="first_aid_by[{{ $i }}]"
                            placeholder="Name & Signature"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="follow_up_action[{{ $i }}]"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="preventive_action[{{ $i }}]"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-005"
        docNo="TDPL/GE/FOM-005"
        docName="Analyte Calibration Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <p>
            <strong>Month &amp; Year:</strong>
            <input type="month" name="month_year" style="border:1px solid #000; padding:4px; margin-left:10px;" />

            <strong style="margin-left:20px;">Location:</strong>
            <input type="text" name="location" style="border:1px solid #000; padding:4px; margin-left:10px;" />

            <strong style="margin-left:20px;">Department:</strong>
            <input type="text" name="department" style="border:1px solid #000; padding:4px; margin-left:10px;" />
        </p>

        <table style="width:100%; border-collapse:collapse; margin-top:15px;">
            <thead>
                <tr>
                    <th rowspan="2" style="border:1px solid #000; padding:4px;">Date</th>
                    <th rowspan="2" style="border:1px solid #000; padding:4px;">Parameters</th>
                    <th rowspan="2" style="border:1px solid #000; padding:4px;">Calibrator Used</th>
                    <th rowspan="2" style="border:1px solid #000; padding:4px;">Lot No.</th>

                    <th colspan="6" style="border:1px solid #000; padding:4px;text-align:center">QC Value</th>

                    <th rowspan="2" style="border:1px solid #000; padding:4px;">Signature of Lab Technical Staff</th>
                    <th rowspan="2" style="border:1px solid #000; padding:4px;">Signature of Supervisor</th>
                </tr>

                <tr>
                    <th style="border:1px solid #000; padding:4px;">Level 1</th>
                    <th style="border:1px solid #000; padding:4px;">Accept/Unaccept</th>
                    <th style="border:1px solid #000; padding:4px;">Level 2</th>
                    <th style="border:1px solid #000; padding:4px;">Accept/Unaccept</th>
                    <th style="border:1px solid #000; padding:4px;">Level 3</th>
                    <th style="border:1px solid #000; padding:4px;">Accept/Unaccept</th>
                </tr>
            </thead>

            <tbody>

                {{-- Generate 12 rows using Laravel loops --}}
                @for ($i = 0; $i < 12; $i++)
                    <tr>
                    <td style="border:1px solid #000; padding:4px;">
                        <input type="date" name="rows[{{ $i }}][date]" style="width:100%; border:1px solid #000; padding:4px;" />
                    </td>

                    <td style="border:1px solid #000; padding:4px;">
                        <input type="text" name="rows[{{ $i }}][parameters]" style="width:100%; border:1px solid #000; padding:4px;" />
                    </td>

                    <td style="border:1px solid #000; padding:4px;">
                        <input type="text" name="rows[{{ $i }}][calibrator_used]" style="width:100%; border:1px solid #000; padding:4px;" />
                    </td>

                    <td style="border:1px solid #000; padding:4px;">
                        <input type="text" name="rows[{{ $i }}][lot_no]" style="width:100%; border:1px solid #000; padding:4px;" />
                    </td>

                    <!-- QC LEVEL 1 -->
                    <td style="border:1px solid #000; padding:4px;">
                        <input type="text" name="rows[{{ $i }}][level1]" style="width:100%; border:1px solid #000; padding:4px;" />
                    </td>
                    <td style="border:1px solid #000; padding:4px;">
                        <select name="rows[{{ $i }}][level1_status]" style="width:100%; border:1px solid #000; padding:4px;">
                            <option value="">--</option>
                            <option value="Acceptable">Acceptable</option>
                            <option value="Unacceptable">Unacceptable</option>
                        </select>
                    </td>

                    <!-- QC LEVEL 2 -->
                    <td style="border:1px solid #000; padding:4px;">
                        <input type="text" name="rows[{{ $i }}][level2]" style="width:100%; border:1px solid #000; padding:4px;" />
                    </td>
                    <td style="border:1px solid #000; padding:4px;">
                        <select name="rows[{{ $i }}][level2_status]" style="width:100%; border:1px solid #000; padding:4px;">
                            <option value="">--</option>
                            <option value="Acceptable">Acceptable</option>
                            <option value="Unacceptable">Unacceptable</option>
                        </select>
                    </td>

                    <!-- QC LEVEL 3 -->
                    <td style="border:1px solid #000; padding:4px;">
                        <input type="text" name="rows[{{ $i }}][level3]" style="width:100%; border:1px solid #000; padding:4px;" />
                    </td>
                    <td style="border:1px solid #000; padding:4px;">
                        <select name="rows[{{ $i }}][level3_status]" style="width:100%; border:1px solid #000; padding:4px;">
                            <option value="">--</option>
                            <option value="Acceptable">Acceptable</option>
                            <option value="Unacceptable">Unacceptable</option>
                        </select>
                    </td>

                    <!-- Signatures -->
                    <td style="border:1px solid #000; padding:4px;">
                        <input type="text" name="rows[{{ $i }}][lab_staff_sign]" style="width:100%; border:1px solid #000; padding:4px;" />
                    </td>

                    <td style="border:1px solid #000; padding:4px;">
                        <input type="text" name="rows[{{ $i }}][supervisor_sign]" style="width:100%; border:1px solid #000; padding:4px;" />
                    </td>
                    </tr>
                    @endfor

            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-006"
        docNo="TDPL/GE/FOM-006"
        docName="Biomedical Waste Disposal Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <p style="margin-bottom:10px;">
            <strong>Month &amp; Year:</strong>
            <input type="month" name="month_year"
                style="border:1px solid #000; padding:4px; margin-right:20px;">

            <strong>Biomedical Waste Collection Agency Name:</strong>
            <input type="text" name="agency_name"
                style="border:1px solid #000; padding:4px; width:250px;">
        </p>

        <table style="width:100%; border-collapse:collapse; background:#fff; border:1px solid #000;">
            <thead>
                <tr>
                    <th rowspan="2" style="border:1px solid #000; padding:4px;">Date</th>

                    <th colspan="8" style="border:1px solid #000; padding:4px;text-align:center">
                        Waste Category / Waste in Kg
                    </th>

                    <th rowspan="2" style="border:1px solid #000; padding:4px;">
                        Handover Staff Signature
                    </th>
                    <th rowspan="2" style="border:1px solid #000; padding:4px;">
                        BMW Handler Signature
                    </th>
                </tr>

                <tr>
                    <th style="border:1px solid #000; padding:4px;">Red Colour</th>
                    <th style="border:1px solid #000; padding:4px;">Weight (Approx)</th>

                    <th style="border:1px solid #000; padding:4px;">Yellow Colour</th>
                    <th style="border:1px solid #000; padding:4px;">Weight (Approx)</th>

                    <th style="border:1px solid #000; padding:4px;">Blue Colour</th>
                    <th style="border:1px solid #000; padding:4px;">Weight (Approx)</th>

                    <th style="border:1px solid #000; padding:4px;">Sharp Container</th>
                    <th style="border:1px solid #000; padding:4px;">Weight (Approx)</th>
                </tr>
            </thead>

            <tbody>

                {{-- LOOP FOR DAYS 1 TO 31 --}}
                @for($day = 1; $day <= 31; $day++)
                    <tr>
                    <td style="border:1px solid #000; padding:4px; text-align:center;">
                        <strong>{{ $day }}</strong>
                        <input type="hidden" name="rows[{{ $day }}][date]" value="{{ $day }}">
                    </td>

                    {{-- Red --}}
                    <td style="border:1px solid #000; padding:4px;">
                        <input type="number" name="rows[{{ $day }}][red]"
                            style="width:100%; border:1px solid #000; padding:3px;">
                    </td>
                    <td style="border:1px solid #000; padding:4px;">
                        <input type="number" name="rows[{{ $day }}][red_weight]"
                            style="width:100%; border:1px solid #000; padding:3px;">
                    </td>

                    {{-- Yellow --}}
                    <td style="border:1px solid #000; padding:4px;">
                        <input type="number" name="rows[{{ $day }}][yellow]"
                            style="width:100%; border:1px solid #000; padding:3px;">
                    </td>
                    <td style="border:1px solid #000; padding:4px;">
                        <input type="number" name="rows[{{ $day }}][yellow_weight]"
                            style="width:100%; border:1px solid #000; padding:3px;">
                    </td>

                    {{-- Blue --}}
                    <td style="border:1px solid #000; padding:4px;">
                        <input type="number" name="rows[{{ $day }}][blue]"
                            style="width:100%; border:1px solid #000; padding:3px;">
                    </td>
                    <td style="border:1px solid #000; padding:4px;">
                        <input type="number" name="rows[{{ $day }}][blue_weight]"
                            style="width:100%; border:1px solid #000; padding:3px;">
                    </td>

                    {{-- Sharp Container --}}
                    <td style="border:1px solid #000; padding:4px;">
                        <input type="number" name="rows[{{ $day }}][sharp]"
                            style="width:100%; border:1px solid #000; padding:3px;">
                    </td>
                    <td style="border:1px solid #000; padding:4px;">
                        <input type="number" name="rows[{{ $day }}][sharp_weight]"
                            style="width:100%; border:1px solid #000; padding:3px;">
                    </td>

                    {{-- Signatures --}}
                    <td style="border:1px solid #000; padding:4px;">
                        <input type="text" name="rows[{{ $day }}][handover_signature]"
                            style="width:100%; border:1px solid #000; padding:3px;">
                    </td>

                    <td style="border:1px solid #000; padding:4px;">
                        <input type="text" name="rows[{{ $day }}][handler_signature]"
                            style="width:100%; border:1px solid #000; padding:3px;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

    </x-formTemplete>


    <x-formTemplete
        id="TDPL/GE/FOM-007"
        docNo="TDPL/GE/FOM-007"
        docName="Physician Feedback Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <p style="margin-bottom:10px;">
            <strong>Month &amp; Year:</strong>
            <input type="month" name="month_year" style="border:1px solid #000; padding:4px; margin-left:10px;">

            <strong style="margin-left:40px;">Client Code:</strong>
            <input type="text" name="client_code" style="border:1px solid #000; padding:4px; margin-left:10px;">
        </p>

        <p style="text-align:center; font-weight:bold; margin:20px 0;">
            Kindly rate the services provided by TRUSTlab Diagnostics
        </p>


        <table style="width:100%; border-collapse:collapse; border:1px solid #000;">
            <tr>
                <td style="border:1px solid #000; padding:6px;"><strong>S. No.</strong></td>
                <td style="border:1px solid #000; padding:6px;"><strong>Laboratory Service</strong></td>

                @foreach( ['very_good' => 'Very Good', 'good' => 'Good', 'satisfactory' => 'Satisfactory', 'needs_improvement' => 'Needs Improvement'] as $label)
                <td style="border:1px solid #000; padding:6px; text-align:center;">
                    <strong>{{ $label }}</strong>
                </td>
                @endforeach
            </tr>

            @foreach([
            'Sample collection',
            'Lab Results',
            'Lab Reports & Dispatch',
            'Emergency Lab services',
            'Critical Alerts',
            'Communication',
            'Turn Around Time (TAT)',
            ] as $index => $service)
            <tr>
                <td style="border:1px solid #000; padding:6px;">{{ $index + 1 }}</td>

                <td style="border:1px solid #000; padding:6px;">{{ $service }}</td>

                @foreach( ['very_good' => 'Very Good', 'good' => 'Good', 'satisfactory' => 'Satisfactory', 'needs_improvement' => 'Needs Improvement'] as $key => $label)
                <td style="border:1px solid #000; padding:6px; text-align:center;">
                    <input type="radio"
                        name="rating[{{ $index }}]"
                        value="{{ $key }}"
                        style="width:16px; height:16px;">
                </td>
                @endforeach

            </tr>
            @endforeach
        </table>

        <p style="margin-top:25px; font-weight:bold;">Additional Feedback/Comments:</p>
        <textarea name="comments" style="width:100%; height:150px; border:1px solid #000; padding:8px;"></textarea>

        <p style="margin-top:30px; font-weight:bold;">Name of the Doctor:</p>
        <input type="text" name="doctor_name" style="width:100%; border:1px solid #000; padding:6px;">

        <p style="margin-top:30px; font-weight:bold;">Signature of the Doctor:</p>
        <input type="text" name="doctor_signature" style="width:100%; border:1px solid #000; padding:6px;">

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-008"
        docNo="TDPL/GE/FOM-008"
        docName="Critical Call-Out Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <p style="margin-bottom:10px;">
            <strong>Month &amp; Year:</strong>
            <input type="month" name="month_year"
                style="border:1px solid #000; padding:5px; margin-left:10px;">
        </p>

        <table style="width:100%; border-collapse:collapse; border:1px solid #000;">
            <tr>
                @foreach([
                'Date',
                'Patient ID',
                'Test Parameter',
                'Initial Value',
                'Cross Check Value',
                'Reporting Time',
                'Concern Clinician/ Patient Informed',
                'Readback Value from Clinician/Patient',
                'Time of Informing',
                'Signature of Person Informing'
                ] as $header)

                <td style="border:1px solid #000; padding:6px; font-weight:bold;">
                    {{ $header }}
                </td>

                @endforeach
            </tr>
            @foreach(range(1,10) as $i)

            <tr>
                <td style="border:1px solid #000; padding:6px;">
                    <input type="date" name="rows[{{ $i }}][date]"
                        style="width:100%; border:1px solid #000; padding:4px;">
                </td>

                <td style="border:1px solid #000; padding:6px;">
                    <input type="text" name="rows[{{ $i }}][patient_id]"
                        style="width:100%; border:1px solid #000; padding:4px;">
                </td>

                <td style="border:1px solid #000; padding:6px;">
                    <input type="text" name="rows[{{ $i }}][test_parameter]"
                        style="width:100%; border:1px solid #000; padding:4px;">
                </td>

                <td style="border:1px solid #000; padding:6px;">
                    <input type="text" name="rows[{{ $i }}][initial_value]"
                        style="width:100%; border:1px solid #000; padding:4px;">
                </td>

                <td style="border:1px solid #000; padding:6px;">
                    <input type="text" name="rows[{{ $i }}][cross_check_value]"
                        style="width:100%; border:1px solid #000; padding:4px;">
                </td>

                <td style="border:1px solid #000; padding:6px;">
                    <input type="time" name="rows[{{ $i }}][reporting_time]"
                        style="width:100%; border:1px solid #000; padding:4px;">
                </td>

                <td style="border:1px solid #000; padding:6px;">
                    <input type="text" name="rows[{{ $i }}][informed]"
                        style="width:100%; border:1px solid #000; padding:4px;">
                </td>

                <td style="border:1px solid #000; padding:6px;">
                    <input type="text" name="rows[{{ $i }}][readback_value]"
                        style="width:100%; border:1px solid #000; padding:4px;">
                </td>

                <td style="border:1px solid #000; padding:6px;">
                    <input type="time" name="rows[{{ $i }}][informing_time]"
                        style="width:100%; border:1px solid #000; padding:4px;">
                </td>

                <td style="border:1px solid #000; padding:6px;">
                    <input type="text" name="rows[{{ $i }}][sign]"
                        style="width:100%; border:1px solid #000; padding:4px;">
                </td>
            </tr>


            @endforeach

        </table>


    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-009"
        docNo="TDPL/GE/FOM-009"
        docName="EQAS Sample Processing Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <div style="font-size:14px; line-height:22px; background:#fff; border:1px solid #ccc; padding:20px; border-radius:10px; width:100%;">

            <p style="margin-bottom:12px;">
                <strong style="display:inline-block; width:250px;">Name Of EQAS Provider:</strong>
                <input type="text" name="eqas_provider"
                    style="border:1px solid #000; padding:6px; width:60%; border-radius:6px;">
            </p>

            <p style="margin-bottom:12px;">
                <strong style="display:inline-block; width:250px;">EQAS Lab ID:</strong>
                <input type="text" name="eqas_lab_id"
                    style="border:1px solid #000; padding:6px; width:20%; border-radius:6px;">

                <strong style="display:inline-block; width:150px; margin-left:20px;">Department Name:</strong>
                <input type="text" name="department_name"
                    style="border:1px solid #000; padding:6px; width:28%; border-radius:6px;">
            </p>

            <p style="margin-bottom:12px;">
                <strong style="display:inline-block; width:250px;">Temperature at Receiving:</strong>
                <input type="text" name="sample_temperature"
                    style="border:1px solid #000; padding:6px; width:40%; border-radius:6px;">
            </p>

            <p style="margin-bottom:12px;">
                <strong style="display:inline-block; width:250px;">EQAS Sample No.:</strong>
                <input type="text" name="sample_no"
                    style="border:1px solid #000; padding:6px; width:40%; border-radius:6px;">
            </p>

            <p style="margin-bottom:12px;">
                <strong style="display:inline-block; width:250px;">EQAS Accession/SIN No.:</strong>
                <input type="text" name="accession_no"
                    style="border:1px solid #000; padding:6px; width:40%; border-radius:6px;">
            </p>

            <p style="margin-bottom:12px;">
                <strong style="display:inline-block; width:250px;">Reconstituted By (Name):</strong>
                <input type="text" name="reconstituted_by"
                    style="border:1px solid #000; padding:6px; width:40%; border-radius:6px;">
            </p>

            <p style="margin-bottom:12px;">
                <strong style="display:inline-block; width:250px;">Reconstitution Date:</strong>
                <input type="date" name="reconstitution_date"
                    style="border:1px solid #000; padding:6px; width:25%; border-radius:6px;">
            </p>

            <p style="margin-bottom:12px;">
                <strong style="display:inline-block; width:250px;">Processed By:</strong>
                <input type="text" name="processed_by"
                    style="border:1px solid #000; padding:6px; width:40%; border-radius:6px;">
            </p>

            <p style="margin-bottom:12px;">
                <strong style="display:inline-block; width:250px;">Reviewed By (Pathologist):</strong>
                <input type="text" name="reviewed_by"
                    style="border:1px solid #000; padding:6px; width:40%; border-radius:6px;">
            </p>

            <p style="margin-bottom:12px;">
                <strong style="display:inline-block; width:250px;">Result Shared with QA Dept:</strong>
                <input type="text" name="qa_shared"
                    style="border:1px solid #000; padding:6px; width:40%; border-radius:6px;">
            </p>

            <p style="margin-bottom:12px;">
                <strong style="display:inline-block; width:250px;">Result Dispatched Date:</strong>
                <input type="date" name="result_dispatched_date"
                    style="border:1px solid #000; padding:6px; width:25%; border-radius:6px;">
            </p>

            <p style="margin-bottom:5px;">
                <strong style="display:inline-block; width:250px;">EQAS Evaluation Received:</strong>
                <input type="date" name="evaluation_received_date"
                    style="border:1px solid #000; padding:6px; width:25%; border-radius:6px;">
            </p>

        </div>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-010"
        docNo="TDPL/GE/FOM-010"
        docName="Daily Cleaning Checklist for Lab"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <p>
            <strong>Month & Year:</strong>
            <input type="month" name="month_year" style="border:1px solid #000; padding:4px; margin-right:20px;">

            <strong>Department:</strong>
            <input type="text" name="department" style="border:1px solid #000; padding:4px; margin-right:20px;">

            <strong>Location:</strong>
            <input type="text" name="location" style="border:1px solid #000; padding:4px;">
        </p>

        <table style="width:100%; border-collapse:collapse; margin-top:15px;">
            <tbody>

                <!-- HEADER ROW -->
                <tr>
                    <td colspan="2" style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Date</strong>
                    </td>

                    @for ($d = 1; $d <= 31; $d++)
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                        <strong>{{ $d }}</strong>
                        </td>
                        @endfor
                </tr>



                @foreach ([
                'Floor' => [
                'Free from debris?',
                'Sufficient aisle space?',
                'Disinfection of floor?'
                ],
                'Dustbins' => [
                'Availability of covered dustbin?',
                'Are all bins emptied?'
                ],
                'Counters' => [
                'Work-Surface clean?',
                'All material neat and orderly?',
                'Disinfection of bench top?'
                ],
                'Equipment' => [
                'Cleaning of equipment',
                'Daily Maintenance'
                ]
                ] as $sectionTitle => $questions)
                @foreach ($questions as $index => $question)
                <tr>

                    <!-- FIRST COLUMN MERGED: DISPLAY ONLY ONCE FOR SECTION -->
                    @if ($index === 0)
                    <td rowspan="{{ count($questions) }}"
                        style="border:1px solid #000; padding:6px; text-align:center; font-weight:bold;">
                        {{ $sectionTitle }}
                    </td>
                    @endif

                    <!-- QUESTION TEXT -->
                    <td style="border:1px solid #000; padding:6px; font-weight:bold;">
                        {{ $question }}
                    </td>

                    <!-- 31 INPUT CELLS -->
                    @for ($i = 1; $i <= 31; $i++)
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                        <input type="text"
                            name="{{ strtolower($sectionTitle) }}_{{ $loop->parent->index }}_{{ $i }}"
                            style="width:40px; border:1px solid #999; padding:2px; text-align:center;">
                        </td>
                        @endfor

                </tr>
                @endforeach
                @endforeach

                <!-- SIGNATURES ROW -->
                <tr>
                    <td colspan="2" style="border:1px solid #000; padding:6px; font-weight:bold;">
                        Lab Staff Signature
                    </td>
                    @for ($i = 1; $i <= 31; $i++)
                        <td style="border:1px solid #000; padding:4px;">
                        <input type="text"
                            name="lab_staff_signature_{{ $i }}"
                            style="width:60px; border:1px solid #999; padding:2px;">
                        </td>
                        @endfor
                </tr>

                <tr>
                    <td colspan="2" style="border:1px solid #000; padding:6px; font-weight:bold;">
                        Lab Supervisor Signature
                    </td>
                    @for ($i = 1; $i <= 31; $i++)
                        <td style="border:1px solid #000; padding:4px;">
                        <input type="text"
                            name="lab_supervisor_signature_{{ $i }}"
                            style="width:60px; border:1px solid #999; padding:2px;">
                        </td>
                        @endfor
                </tr>

            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-011"
        docNo="TDPL/GE/FOM-011"
        docName="Daily Cleanliness Log for Rest Room"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <div style="margin-bottom:15px; font-size:14px;">
            <label><strong>Month & Year:</strong></label>
            <input type="month" name="month_year"
                style="border:1px solid #000; padding:4px; margin-right:20px;">

            <label><strong>Floor:</strong></label>
            <input type="text" name="floor"
                style="border:1px solid #000; padding:4px; margin-right:20px;">

            <label><strong>Location:</strong></label>
            <input type="text" name="location"
                style="border:1px solid #000; padding:4px;">
        </div>

        <table style="width:100%; border-collapse:collapse; font-size:13px;">
            <thead>
                <tr>
                    <th rowspan="2" style="border:1px solid #000; padding:4px; text-align:center;">Date</th>

                    <th colspan="3" style="border:1px solid #000; padding:4px; text-align:center;">Floor Cleaned & Odour Free</th>
                    <th colspan="3" style="border:1px solid #000; padding:4px; text-align:center;">Hand Wash Facility Cleaned</th>
                    <th colspan="3" style="border:1px solid #000; padding:4px; text-align:center;">Wash Basin & WC Cleaned</th>
                </tr>

                <tr>
                    <!-- Floor Cleaned -->
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Morning</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Afternoon</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Evening</th>

                    <!-- Hand Wash -->
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Morning</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Afternoon</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Evening</th>

                    <!-- Wash Basin -->
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Morning</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Afternoon</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Evening</th>
                </tr>
            </thead>

            <tbody>
                @foreach(range(1, 31) as $day)
                <tr>
                    <td style="border:1px solid #000; padding:4px; text-align:center;">
                        <strong>{{ $day }}</strong>
                    </td>

                    <!-- Floor Cleaned inputs -->
                    @foreach(['morning','afternoon','evening'] as $time)
                    <td style="border:1px solid #000; padding:4px;">
                        <input type="text"
                            name="floor_cleaned[{{ $day }}][{{ $time }}]"
                            style="width:100%; border:1px solid #000; padding:3px;">
                    </td>
                    @endforeach

                    <!-- Hand Wash inputs -->
                    @foreach(['morning','afternoon','evening'] as $time)
                    <td style="border:1px solid #000; padding:4px;">
                        <input type="text"
                            name="hand_wash[{{ $day }}][{{ $time }}]"
                            style="width:100%; border:1px solid #000; padding:3px;">
                    </td>
                    @endforeach

                    <!-- Wash Basin & WC inputs -->
                    @foreach(['morning','afternoon','evening'] as $time)
                    <td style="border:1px solid #000; padding:4px;">
                        <input type="text"
                            name="wash_basin[{{ $day }}][{{ $time }}]"
                            style="width:100%; border:1px solid #000; padding:3px;">
                    </td>
                    @endforeach

                </tr>
                @endforeach
            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-012"
        docNo="TDPL/GE/FOM-012"
        docName="Daily IQC Data Monitoring Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <!-- Header Section -->
        <div style="margin-bottom:20px;">
            <label style="font-weight:bold;">Department:</label>
            <input type="text" name="department" style="border:1px solid #000; padding:4px; width:200px;">

            <label style="font-weight:bold; margin-left:40px;">Level:</label>
            <input type="text" name="level" style="border:1px solid #000; padding:4px; width:200px;">

            <label style="font-weight:bold; margin-left:40px;">Instrument S. No.:</label>
            <input type="text" name="instrument_no" style="border:1px solid #000; padding:4px; width:200px;">
        </div>

        <div style="margin-bottom:20px;">
            <label style="font-weight:bold;">Month & Year:</label>
            <input type="month" name="month_year" style="border:1px solid #000; padding:4px;">

            <label style="font-weight:bold; margin-left:40px;">Control Lot No.:</label>
            <input type="text" name="control_lot_no" style="border:1px solid #000; padding:4px; width:180px;">

            <label style="font-weight:bold; margin-left:40px;">Control Expiry Date:</label>
            <input type="date" name="control_expiry" style="border:1px solid #000; padding:4px;">
        </div>

        <!-- TABLE START -->
        <table style="width:100%; border-collapse:collapse; margin-top:20px;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:4px; width:60px;">Parameter</th>

                    @for($i=1;$i<=16;$i++)
                        <th style="border:1px solid #000; padding:4px; width:40px;">
                        </th>
                        @endfor

                        <th style="border:1px solid #000; padding:4px; width:90px;">Done By</th>
                        <th style="border:1px solid #000; padding:4px; width:110px;">Reviewed By</th>
                </tr>

                <!-- LOW / MEAN / HIGH ROWS -->
                @foreach(['LOW','MEAN','HIGH'] as $label)
                <tr>
                    <th style="border:1px solid #000; padding:4px; text-align:left;">{{ $label }}</th>

                    @for($i=1;$i<=16;$i++)
                        <td style="border:1px solid #000; padding:4px;">
                        <input type="text" name="range_{{ strtolower($label) }}[]"
                            style="width:100%; border:1px solid #000; padding:2px;">
                        </td>
                        @endfor

                        <td style="border:1px solid #000; padding:4px;"> <input type="text" name="range_{{ strtolower($label) }}[]"
                                style="width:100%; border:1px solid #000; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:4px;"> <input type="text" name="range_{{ strtolower($label) }}[]"
                                style="width:100%; border:1px solid #000; padding:2px;"></td>
                </tr>
                @endforeach
            </thead>

            <tbody>
                <!-- PARAMETER ROWS 1 TO 31 -->
                @for($row=1;$row<=31;$row++)
                    <tr>
                    <td style="border:1px solid #000; padding:4px; font-weight:bold; text-align:center;">
                        {{ $row }}
                    </td>

                    @for($col=1;$col<=16;$col++)
                        <td style="border:1px solid #000; padding:4px;">
                        <input type="text"
                            name="param_{{ $row }}[]"
                            style="width:100%; border:1px solid #000; padding:2px;">
                        </td>
                        @endfor

                        <td style="border:1px solid #000; padding:4px;">
                            <input type="text"
                                name="done_by_{{ $row }}"
                                style="width:100%; border:1px solid #000; padding:2px;">
                        </td>

                        <td style="border:1px solid #000; padding:4px;">
                            <input type="text"
                                name="reviewed_by_{{ $row }}"
                                style="width:100%; border:1px solid #000; padding:2px;">
                        </td>
                        </tr>
                        @endfor
            </tbody>
        </table>
        <!-- TABLE END -->


        <div style="margin-top:25px;">
            <label style="font-weight:bold;">Month & Year:</label>
            <input type="month" name="month_year_2" style="border:1px solid #000; padding:4px;">

            <label style="font-weight:bold; margin-left:40px;">Control Lot No.:</label>
            <input type="text" name="control_lot_no_2" style="border:1px solid #000; padding:4px; width:180px;">

            <label style="font-weight:bold; margin-left:40px;">Control Expiry Date:</label>
            <input type="date" name="control_expiry_2" style="border:1px solid #000; padding:4px;">
        </div>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/GE/FOM-014"
        docNo="TDPL/GE/FOM-014"
        docName="Distilled Water Plant Checklist"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <p style="font-weight:bold;">
            Month/Year:
            <input type="text" name="month_year" style="border:1px solid #000; padding:5px; width:120px; margin-right:40px;">

            Location:
            <input type="text" name="location" style="border:1px solid #000; padding:5px; width:120px; margin-right:40px;">

            Department:
            <input type="text" name="department" style="border:1px solid #000; padding:5px; width:120px;">
        </p>

        <table style="width:100%; border-collapse:collapse;" border="1">
            <tbody>
                <tr>
                    <td rowspan="2" style="text-align:center; font-weight:bold;">Date</td>
                    <td rowspan="2" style="text-align:center; font-weight:bold;">Motor Working</td>
                    <td style="text-align:center; font-weight:bold;">Water Check Daily</td>
                    <td rowspan="2" style="text-align:center; font-weight:bold;">
                        Check Filters <br>(Ensure that it is clean)
                    </td>
                    <td rowspan="2" style="text-align:center; font-weight:bold;">Water Leakage</td>
                    <td rowspan="2" style="text-align:center; font-weight:bold;">Done By</td>
                </tr>

                <tr>
                    <td style="text-align:center; font-weight:bold;">TDS (0 to 0.2)</td>
                </tr>

                @for ($i = 1; $i <= 31; $i++)
                    <tr>
                    <td style="text-align:center; font-weight:bold;">{{ sprintf('%02d', $i) }}</td>

                    <td style="text-align:center;">
                        <input type="text" name="motor_working_{{ $i }}"
                            style="width:100%; border:none; padding:5px;">
                    </td>

                    <td style="text-align:center;">
                        <input type="text" name="tds_{{ $i }}"
                            style="width:100%; border:none; padding:5px;">
                    </td>

                    <td style="text-align:center;">
                        <input type="text" name="filter_check_{{ $i }}"
                            style="width:100%; border:none; padding:5px;">
                    </td>

                    <td style="text-align:center;">
                        <input type="text" name="water_leakage_{{ $i }}"
                            style="width:100%; border:none; padding:5px;">
                    </td>

                    <td style="text-align:center;">
                        <input type="text" name="done_by_{{ $i }}"
                            style="width:100%; border:none; padding:5px;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

        <p style="margin-top:20px;">
            <strong>Lab In-charge:</strong>
            <input type="text" name="lab_incharge" style="border:1px solid #000; padding:5px; width:200px; margin-left:10px;">
        </p>


    </x-formTemplete>
    <x-formTemplete
        id="TDPL/GE/FOM-015"
        docNo="TDPL/GE/FOM-015"
        docName="Equipment Startup and Shutdown Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <p style="margin-top:20px;">
            <strong>Instrument Name:</strong>
            <input type="text" name="instrument_name"
                style="border:1px solid #000; padding:5px; width:200px; margin-right:40px;">

            <strong>Department:</strong>
            <input type="text" name="department"
                style="border:1px solid #000; padding:5px; width:200px; margin-right:40px;">

            <strong>Instrument S. No.:</strong>
            <input type="text" name="instrument_serial"
                style="border:1px solid #000; padding:5px; width:200px;">
        </p>
        <table border="1" style="width:100%; border-collapse:collapse; margin-top:10px;">
            <tbody>
                <tr>
                    <td style="font-weight:bold; text-align:center;">S. No.</td>
                    <td style="font-weight:bold; text-align:center;">Date</td>
                    <td style="font-weight:bold; text-align:center;">Start Time</td>
                    <td style="font-weight:bold; text-align:center;">Shutdown Time</td>
                </tr>

                @for($i = 1; $i <= 31; $i++)
                    <tr>
                    <td style="text-align:center; font-weight:bold;">
                        {{ $i }}
                    </td>

                    <td style="text-align:center;">
                        <input type="date"
                            name="date_{{ $i }}"
                            style="width:100%; border:none; padding:5px;">
                    </td>

                    <td style="text-align:center;">
                        <input type="time"
                            name="start_time_{{ $i }}"
                            style="width:100%; border:none; padding:5px;">
                    </td>

                    <td style="text-align:center;">
                        <input type="time"
                            name="shutdown_time_{{ $i }}"
                            style="width:100%; border:none; padding:5px;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>



    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-016"
        docNo="TDPL/GE/FOM-016"
        docName="Eye Wash Monitoring Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <p style="margin-top:20px;">
            <strong>Month/Year:</strong>
            <input type="text" name="month_year"
                style="border:1px solid #000; padding:5px; width:200px; margin-right:40px;">

            <strong>Department:</strong>
            <input type="text" name="department"
                style="border:1px solid #000; padding:5px; width:300px;">
        </p>
        <table border="1" style="width:100%; border-collapse:collapse; margin-top:10px;">
            <tbody>
                <tr>
                    <td style="font-weight:bold; text-align:center;">Date</td>
                    <td style="font-weight:bold; text-align:center;">Water Changed</td>
                    <td style="font-weight:bold; text-align:center;">Changed By</td>
                    <td style="font-weight:bold; text-align:center;">Signature</td>
                    <td style="font-weight:bold; text-align:center;">Remarks</td>
                </tr>

                @for($i = 1; $i <= 31; $i++)
                    <tr>
                    <td style="text-align:center; font-weight:bold;">
                        {{ $i }}
                    </td>

                    <td style="text-align:center;">
                        <input type="text"
                            name="water_changed_{{ $i }}"
                            placeholder="Yes / No"
                            style="width:100%; border:none; padding:5px;">
                    </td>

                    <td style="text-align:center;">
                        <input type="text"
                            name="changed_by_{{ $i }}"
                            style="width:100%; border:none; padding:5px;">
                    </td>

                    <td style="text-align:center;">
                        <input type="text"
                            name="signature_{{ $i }}"
                            style="width:100%; border:none; padding:5px;">
                    </td>

                    <td style="text-align:center;">
                        <input type="text"
                            name="remarks_{{ $i }}"
                            style="width:100%; border:none; padding:5px;">
                    </td>
                    </tr>
                    @endfor

            </tbody>
        </table>



    </x-formTemplete>
    <x-formTemplete
        id="TDPL/GE/FOM-017"
        docNo="TDPL/GE/FOM-017"
        docName="Inter-Laboratory Comparison Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <p>
            <strong>Name of Lab A:</strong>
            <input type="text" name="lab_a" style="border:1px solid #000; padding:5px; width:200px; margin-right:40px;">

            <strong>Name of Lab B:</strong>
            <input type="text" name="lab_b" style="border:1px solid #000; padding:5px; width:200px;">
        </p>

        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <td style="padding:6px;"><strong>Date</strong></td>
                    <td style="padding:6px;"><strong>Registration No.</strong></td>
                    <td style="padding:6px;"><strong>Test Parameter</strong></td>
                    <td style="padding:6px;"><strong>TRUSTlab Results (A)</strong></td>
                    <td style="padding:6px;"><strong>Referring Lab Results (B)</strong></td>
                    <td style="padding:6px;"><strong>%Difference*</strong></td>
                    <td style="padding:6px;"><strong>Acceptable / Not Acceptable</strong></td>
                    <td style="padding:6px;"><strong>Done By</strong></td>
                    <td style="padding:6px;"><strong>Reviewed By</strong></td>
                </tr>
            </thead>

            <tbody>
                @for($i = 0; $i < 10; $i++)
                    <tr>
                    <td style="padding:6px;">
                        <input type="date" name="rows[{{ $i }}][date]" style="width:100%; border:1px solid #000; padding:5px;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][reg_no]" style="width:100%; border:1px solid #000; padding:5px;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][test_parameter]" style="width:100%; border:1px solid #000; padding:5px;">
                    </td>

                    <td style="padding:6px;">
                        <input type="number" step="0.01" name="rows[{{ $i }}][a]" style="width:100%; border:1px solid #000; padding:5px;">
                    </td>

                    <td style="padding:6px;">
                        <input type="number" step="0.01" name="rows[{{ $i }}][b]" style="width:100%; border:1px solid #000; padding:5px;">
                    </td>

                    <td style="padding:6px;">
                        <input type="number" step="0.01" name="rows[{{ $i }}][difference]" style="width:100%; border:1px solid #000; padding:5px;" readonly>
                    </td>

                    <td style="padding:6px;">
                        <select name="rows[{{ $i }}][status]" style="width:100%; border:1px solid #000; padding:5px;">
                            <option value="">--Select--</option>
                            <option value="Acceptable">Acceptable</option>
                            <option value="Not Acceptable">Not Acceptable</option>
                        </select>
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][done_by]" style="width:100%; border:1px solid #000; padding:5px;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][reviewed_by]" style="width:100%; border:1px solid #000; padding:5px;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

        <p><strong>* % Difference = ((A - B) / A) × 100</strong></p>


    </x-formTemplete>
    <x-formTemplete
        id="TDPL/GE/FOM-018"
        docNo="TDPL/GE/FOM-018"
        docName="Laboratory Incident Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <div style="font-size:14px; line-height:22px; background:#fff; border:1px solid #ccc; padding:20px; border-radius:10px; width:100%;">



            <p>
                <strong>Date of Incident Reported by Patient/Stakeholder (With Patient ID):</strong><br>
                <input type="text" name="incident_date_patient_id"
                    style="border:1px solid #000; padding:6px; width:60%; margin-top:5px;">
            </p>

            <p>
                <strong>Name & designation of the individual filing the report:</strong><br>
                <input type="text" name="report_filed_by"
                    style="border:1px solid #000; padding:6px; width:60%; margin-top:5px;">
            </p>

            <p>
                <strong>Identification of Complaint (Complaint/Query justified or not by department):</strong><br>
                <input type="text" name="complaint_identification"
                    style="border:1px solid #000; padding:6px; width:80%; margin-top:5px;">
            </p>

            <p>
                <strong>Department involved in the incident:</strong><br>
                <input type="text" name="department_involved"
                    style="border:1px solid #000; padding:6px; width:50%; margin-top:5px;">
            </p>

            <p>
                <strong>Description of the incident:</strong><br>
                <textarea name="incident_description"
                    style="border:1px solid #000; padding:6px; width:90%; height:80px; margin-top:5px;"></textarea>
            </p>

            <p>
                <strong>Description of the damage claimed by the Patient/Stakeholder:</strong><br>
                <textarea name="damage_description"
                    style="border:1px solid #000; padding:6px; width:90%; height:80px; margin-top:5px;"></textarea>
            </p>

            <p>
                <strong>Description of Root Cause Identified by the department involved:</strong><br>
                <textarea name="root_cause_description"
                    style="border:1px solid #000; padding:6px; width:90%; height:80px; margin-top:5px;"></textarea>
            </p>

            <p>
                <strong>Corrective Action (If Any) and follow-up action:</strong><br>
                <textarea name="corrective_action"
                    style="border:1px solid #000; padding:6px; width:90%; height:80px; margin-top:5px;"></textarea>
            </p>

            <p>
                <strong>Medical/Management decision on the claim of Patient/Stakeholder including applicable medical liability:</strong><br>
                <textarea name="management_decision"
                    style="border:1px solid #000; padding:6px; width:90%; height:80px; margin-top:5px;"></textarea>
            </p>

            <br><br><br>

            <p>
                <strong>Signature of Quality Manager:</strong><br>
                <input type="text" name="signature_quality_manager"
                    style="border:1px solid #000; padding:6px; width:40%; margin-top:5px;">
            </p>

            <p>
                <strong>Signature of Lab Head:</strong><br>
                <input type="text" name="signature_lab_head"
                    style="border:1px solid #000; padding:6px; width:40%; margin-top:5px;">
            </p>
        </div>
    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-019"
        docNo="TDPL/GE/FOM-019"
        docName="Employee Suggestion for Improvement Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <div style="font-size:14px; line-height:22px; background:#fff; border:1px solid #ccc; padding:20px; border-radius:10px; width:100%;">

            <p>
                <strong>Employee Name:</strong><br>
                <input type="text" name="employee_name"
                    style="border:1px solid #000; padding:6px; width:50%; margin-top:5px;">
            </p>

            <p>
                <strong>Date:</strong><br>
                <input type="date" name="date"
                    style="border:1px solid #000; padding:6px; width:30%; margin-top:5px;">
            </p>

            <p>
                <strong>Employee ID:</strong><br>
                <input type="text" name="employee_id"
                    style="border:1px solid #000; padding:6px; width:40%; margin-top:5px;">
            </p>

            <p>
                <strong>Staff suggestions for Continual Improvement in Laboratory Quality Management System:</strong><br>
                <textarea name="staff_suggestions"
                    style="border:1px solid #000; padding:6px; width:90%; height:100px; margin-top:5px;"></textarea>
            </p>

            <p>
                <strong>Suggested Requirement of following:</strong><br>
                <textarea name="suggested_requirements"
                    style="border:1px solid #000; padding:6px; width:90%; height:120px; margin-top:5px;"></textarea>
            </p>

            <p>
                <strong>Employee Signature:</strong><br>
                <input type="text" name="employee_signature"
                    style="border:1px solid #000; padding:6px; width:40%; margin-top:5px;">
            </p>

            <p>
                <strong>Corrective action taken by the Management:</strong>
                <span style="font-weight:400;">(All suggestions that were considered and made available)</span><br>
                <textarea name="corrective_action_management"
                    style="border:1px solid #000; padding:6px; width:90%; height:120px; margin-top:5px;"></textarea>
            </p>

            <p>
                <strong>Lab Supervisor:</strong><br>
                <input type="text" name="lab_supervisor"
                    style="border:1px solid #000; padding:6px; width:40%; margin-top:5px;">
            </p>

            <p>
                <strong>Lab Director Signature:</strong><br>
                <input type="text" name="lab_director_signature"
                    style="border:1px solid #000; padding:6px; width:40%; margin-top:5px;">
            </p>
        </div>
    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-020"
        docNo="TDPL/GE/FOM-020"
        docName="New Reagent Lot Verification"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <p>
            <strong>Month/Year:</strong>
            <input type="date" name="month_year"
                style="border:1px solid #000; padding:5px; width:150px; margin-right:30px;">

            <strong>Location:</strong>
            <input type="text" name="location"
                style="border:1px solid #000; padding:5px; width:150px; margin-right:30px;">

            <strong>Department:</strong>
            <input type="text" name="department"
                style="border:1px solid #000; padding:5px; width:180px;">
        </p>

        <br>

        <table border="1" style="width:100%; border-collapse:collapse; text-align:center;">
            <tbody>
                <tr>
                    <td rowspan="2" style="font-weight:bold;">Date</td>
                    <td rowspan="2" style="font-weight:bold;">Reagent/Kit</td>

                    <td colspan="2" style="font-weight:bold;">Old Reagent</td>
                    <td colspan="2" style="font-weight:bold;">New Reagent</td>

                    <td colspan="5" style="font-weight:bold;">Verification</td>

                    <td rowspan="2" style="font-weight:bold;">Observed Variation %</td>
                    <td rowspan="2" style="font-weight:bold;">Acceptance Criteria</td>
                    <td rowspan="2" style="font-weight:bold;">Acceptable / Not<br>Acceptable</td>
                    <td rowspan="2" style="font-weight:bold;">Lab Tech Signature</td>
                    <td rowspan="2" style="font-weight:bold;">Verified By</td>
                </tr>

                <tr>
                    <td style="font-weight:bold;">Lot No.</td>
                    <td style="font-weight:bold;">Expiry Date</td>

                    <td style="font-weight:bold;">Lot No.</td>
                    <td style="font-weight:bold;">Expiry Date</td>

                    <td style="font-weight:bold;">Analytes</td>
                    <td style="font-weight:bold;">Materials Used for Verification</td>
                    <td style="font-weight:bold;">Specimen Source *</td>
                    <td style="font-weight:bold;">Old Lot Result</td>
                    <td style="font-weight:bold;">New Lot Result</td>
                </tr>

                @for($i = 1; $i <= 15; $i++)
                    <tr>
                    <td><input type="text" name="date_{{ $i }}" style="width:100%; border:none; padding:4px;"></td>

                    <td><input type="text" name="reagent_{{ $i }}" style="width:100%; border:none; padding:4px;"></td>

                    <td><input type="text" name="old_lot_{{ $i }}" style="width:100%; border:none; padding:4px;"></td>
                    <td><input type="text" name="old_expiry_{{ $i }}" style="width:100%; border:none; padding:4px;"></td>

                    <td><input type="text" name="new_lot_{{ $i }}" style="width:100%; border:none; padding:4px;"></td>
                    <td><input type="text" name="new_expiry_{{ $i }}" style="width:100%; border:none; padding:4px;"></td>

                    <td><input type="text" name="analytes_{{ $i }}" style="width:100%; border:none; padding:4px;"></td>

                    <td><input type="text" name="materials_used_{{ $i }}" style="width:100%; border:none; padding:4px;"></td>

                    <td><input type="text" name="specimen_source_{{ $i }}" style="width:100%; border:none; padding:4px;"></td>

                    <td><input type="text" name="old_result_{{ $i }}" style="width:100%; border:none; padding:4px;"></td>
                    <td><input type="text" name="new_result_{{ $i }}" style="width:100%; border:none; padding:4px;"></td>

                    <td><input type="text" name="variation_{{ $i }}" style="width:100%; border:none; padding:4px;"></td>

                    <td><input type="text" name="criteria_{{ $i }}" style="width:100%; border:none; padding:4px;"></td>

                    <td><input type="text" name="acceptable_{{ $i }}" style="width:100%; border:none; padding:4px;"></td>

                    <td><input type="text" name="lab_tech_signature_{{ $i }}" style="width:100%; border:none; padding:4px;"></td>

                    <td><input type="text" name="verified_by_{{ $i }}" style="width:100%; border:none; padding:4px;"></td>
                    </tr>
                    @endfor

            </tbody>
        </table>

        <p style="margin-top:10px;">
            <strong>* Specimen Source:</strong> Serum, Plasma, Urine, etc.
        </p>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-021"
        docNo="TDPL/GE/FOM-021"
        docName="Non-Conformity & Corrective Action Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <div style="font-size:14px;">

            <p style="margin-bottom:10px;">
                <strong>Month & Year:</strong>
                <input type="date" name="month_year"
                    style="border:1px solid #000; padding:4px; width:150px; margin-right:20px;">

                <strong>Location:</strong>
                <input type="text" name="location"
                    style="border:1px solid #000; padding:4px; width:180px; margin-right:20px;">

                <strong>Department:</strong>
                <input type="text" name="department"
                    style="border:1px solid #000; padding:4px; width:180px;">
            </p>

            <table style="width:100%; border-collapse:collapse; margin-top:15px;" border="1">
                <thead>
                    <tr style="background:#f2f2f2; text-align:center;">
                        <td style="padding:6px;">Date</td>
                        <td style="padding:6px;">Non-Conformity Observed</td>
                        <td style="padding:6px;">Responsible Person</td>
                        <td style="padding:6px;">Root Cause Analysis</td>
                        <td style="padding:6px;">Corrective Actions Taken</td>
                        <td style="padding:6px;">Preventive Action Taken</td>
                        <td style="padding:6px;">Date of Closure</td>
                        <td style="padding:6px;">Signature</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach(range(1, 10) as $i)
                    <tr>
                        <td style="padding:6px;">
                            <input type="date" name="rows[{{ $i }}][date]"
                                style="border:1px solid #000; padding:4px; width:120px;">
                        </td>

                        <td style="padding:6px;">
                            <input type="text" name="rows[{{ $i }}][non_conformity]"
                                style="border:1px solid #000; padding:4px; width:160px;">
                        </td>

                        <td style="padding:6px;">
                            <input type="text" name="rows[{{ $i }}][responsible_person]"
                                style="border:1px solid #000; padding:4px; width:140px;">
                        </td>

                        <td style="padding:6px;">
                            <input type="text" name="rows[{{ $i }}][root_cause]"
                                style="border:1px solid #000; padding:4px; width:180px;">
                        </td>

                        <td style="padding:6px;">
                            <input type="text" name="rows[{{ $i }}][corrective_action]"
                                style="border:1px solid #000; padding:4px; width:180px;">
                        </td>

                        <td style="padding:6px;">
                            <input type="text" name="rows[{{ $i }}][preventive_action]"
                                style="border:1px solid #000; padding:4px; width:180px;">
                        </td>

                        <td style="padding:6px;">
                            <input type="date" name="rows[{{ $i }}][closure_date]"
                                style="border:1px solid #000; padding:4px; width:120px;">
                        </td>

                        <td style="padding:6px;">
                            <input type="text" name="rows[{{ $i }}][signature]"
                                style="border:1px solid #000; padding:4px; width:100px;">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <p style="margin-top:20px;">
                <strong>Monitoring Authority Signature:</strong>
                <input type="text" name="monitoring_signature"
                    style="border:1px solid #000; padding:4px; width:250px; margin-left:10px;">
            </p>

        </div>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-022"
        docNo="TDPL/GE/FOM-022"
        docName="Refrigerator Temperature Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <div style="font-size:14px;">

            <p style="margin-bottom:12px;">
                <strong>Month/Year:</strong>
                <input type="text" name="month_year"
                    style="border:1px solid #000; padding:4px; width:150px; margin-right:20px;">

                <strong>Dept.:</strong>
                <input type="text" name="department"
                    style="border:1px solid #000; padding:4px; width:150px; margin-right:20px;">

                <strong>Instrument ID/S. No.:</strong>
                <input type="text" name="instrument_id"
                    style="border:1px solid #000; padding:4px; width:180px;">
            </p>

            <table border="1" style="width:100%; border-collapse:collapse; margin-top:15px;">
                <thead>
                    <tr style="background:#f2f2f2; text-align:center;">
                        <td rowspan="2" style="padding:6px;">Date</td>
                        <td colspan="2" style="padding:6px;">Morning (9–10 AM)</td>
                        <td colspan="2" style="padding:6px;">Evening (4–5 PM)</td>
                    </tr>

                    <tr style="background:#f9f9f9; text-align:center;">
                        <td style="padding:6px;">Temperature</td>
                        <td style="padding:6px;">Signature</td>
                        <td style="padding:6px;">Temperature</td>
                        <td style="padding:6px;">Signature</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach(range(1, 31) as $day)
                    <tr>
                        <td style="padding:6px; text-align:center;">
                            <strong>{{ $day }}</strong>
                        </td>

                        <!-- Morning Temperature -->
                        <td style="padding:6px;">
                            <input type="number" name="rows[{{ $day }}][morning_temp]"
                                step="0.1"
                                style="border:1px solid #000; padding:4px; width:100%;">
                        </td>

                        <!-- Morning Signature -->
                        <td style="padding:6px;">
                            <input type="text" name="rows[{{ $day }}][morning_sign]"
                                style="border:1px solid #000; padding:4px; width:100%;">
                        </td>

                        <!-- Evening Temperature -->
                        <td style="padding:6px;">
                            <input type="number" name="rows[{{ $day }}][evening_temp]"
                                step="0.1"
                                style="border:1px solid #000; padding:4px; width:100%;">
                        </td>

                        <!-- Evening Signature -->
                        <td style="padding:6px;">
                            <input type="text" name="rows[{{ $day }}][evening_sign]"
                                style="border:1px solid #000; padding:4px; width:100%;">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <p style="margin-top:12px;">
                <strong>NOTE: Acceptable Temperature:</strong>
                <span style="font-weight:400;">2–8°C</span>
            </p>

        </div>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/GE/FOM-023"
        docNo="TDPL/GE/FOM-023"
        docName="Repeat Test Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <div style="font-size:14px;">

            <p style="margin-bottom:12px;">
                <strong>Department:</strong>
                <input type="text" name="department"
                    style="border:1px solid #000; padding:4px; width:200px; margin-right:20px;">

                <strong>Location:</strong>
                <input type="text" name="location"
                    style="border:1px solid #000; padding:4px; width:200px;">
            </p>

            <table border="1" style="width:100%; border-collapse:collapse; margin-top:15px; text-align:center;">
                <thead>
                    <tr style="background:#f2f2f2;">
                        <td rowspan="2" style="padding:6px;">S. No.</td>
                        <td rowspan="2" style="padding:6px;">Date</td>
                        <td rowspan="2" style="padding:6px;">Visit ID</td>
                        <td rowspan="2" style="padding:6px;">Parameter being repeated</td>
                        <td rowspan="2" style="padding:6px;">Reason for repeat</td>
                        <td rowspan="2" style="padding:6px;">Repeat autdorised by sign/date</td>
                        <td colspan="3" style="padding:6px;">Repeat Result</td>
                        <td rowspan="2" style="padding:6px;">Result entered in LIMS</td>
                        <td rowspan="2" style="padding:6px;">Final Result reviewed by sign/date</td>
                    </tr>

                    <tr style="background:#f9f9f9;">
                        <td style="padding:6px;">A</td>
                        <td style="padding:6px;">B</td>
                        <td style="padding:6px;">C</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach(range(1, 10) as $i)
                    <tr>
                        <td style="padding:6px;">{{ $i }}</td>

                        <td style="padding:6px;">
                            <input type="date" name="rows[{{ $i }}][date]"
                                style="border:1px solid #000; padding:4px; width:130px;">
                        </td>

                        <td style="padding:6px;">
                            <input type="text" name="rows[{{ $i }}][visit_id]"
                                style="border:1px solid #000; padding:4px; width:120px;">
                        </td>

                        <td style="padding:6px;">
                            <input type="text" name="rows[{{ $i }}][parameter]"
                                style="border:1px solid #000; padding:4px; width:160px;">
                        </td>

                        <td style="padding:6px;">
                            <input type="text" name="rows[{{ $i }}][reason]"
                                style="border:1px solid #000; padding:4px; width:160px;">
                        </td>

                        <td style="padding:6px;">
                            <input type="text" name="rows[{{ $i }}][authorised_by]"
                                style="border:1px solid #000; padding:4px; width:160px;">
                        </td>

                        <!-- Repeat Result A -->
                        <td style="padding:6px;">
                            <input type="text" name="rows[{{ $i }}][result_a]"
                                style="border:1px solid #000; padding:4px; width:120px;">
                        </td>

                        <!-- Repeat Result B -->
                        <td style="padding:6px;">
                            <input type="text" name="rows[{{ $i }}][result_b]"
                                style="border:1px solid #000; padding:4px; width:120px;">
                        </td>

                        <!-- Repeat Result C -->
                        <td style="padding:6px;">
                            <input type="text" name="rows[{{ $i }}][result_c]"
                                style="border:1px solid #000; padding:4px; width:120px;">
                        </td>

                        <td style="padding:6px;">
                            <input type="text" name="rows[{{ $i }}][lims_entry]"
                                style="border:1px solid #000; padding:4px; width:130px;">
                        </td>

                        <td style="padding:6px;">
                            <input type="text" name="rows[{{ $i }}][reviewed_by]"
                                style="border:1px solid #000; padding:4px; width:150px;">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <p style="margin-top:12px;">
                <strong>KEY:</strong>
                <span style="font-weight:400;">
                    ‘A’ – Original Result,
                    ‘B’ – 1st Repeat,
                    ‘C’ – 2nd Repeat (as relevant)
                </span>
            </p>

        </div>


    </x-formTemplete>
    <x-formTemplete
        id="TDPL/GE/FOM-025"
        docNo="TDPL/GE/FOM-025"
        docName="NiU-Transcription Check Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <p style="margin-bottom:10px;">
            <strong>Month & Year:</strong>
            <input type="date" name="month_year"
                style="border:1px solid #000; padding:4px; width:150px; margin-right:20px;">
        </p>

        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <td style="padding:6px;">Date</td>
                    <td style="padding:6px;">Visit No.</td>
                    <td style="padding:6px;">Results Recorded on Worksheet</td>
                    <td style="padding:6px;">Results Entered In LIS</td>
                    <td style="padding:6px;">Result Entered By</td>
                    <td style="padding:6px;">Results Verified By</td>
                </tr>
            </thead>

            <tbody>
                @for($i = 0; $i < 8; $i++)
                    <tr>
                    <td style="padding:4px;">
                        <input type="date" name="rows[{{ $i }}][date]"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][visit_no]"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][worksheet_result]"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][lis_result]"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][entered_by]"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][verified_by]"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

        <p style="margin-top:20px;">
            <strong>Section Head Signature:</strong>
        </p>
        <input type="text" name="section_head_signature"
            style="width:40%; border:1px solid #000; padding:6px; margin-top:6px;">

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-027"
        docNo="TDPL/GE/FOM-027"
        docName=" Meeting Agenda Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <div style="background:#fff; border:1px solid #ccc; border-radius:12px; padding:25px; width:100%; font-family:Arial;">

            <h2 style="text-align:center; margin-bottom:20px;">Meeting Agenda Form</h2>

            <!-- Meeting Details -->
            <div style="padding:15px; border:1px solid #ddd; border-radius:10px; margin-bottom:20px;">
                <p style="font-weight:bold; margin-bottom:10px;">Meeting Details</p>

                <div style="margin-bottom:10px;">
                    <label style="width:120px; display:inline-block;">Date:</label>
                    <input type="date" name="meeting_date"
                        style="border:1px solid #000; border-radius:6px; padding:6px;">

                    <label style="margin-left:40px; width:60px; display:inline-block;">Time:</label>
                    <input type="text" name="meeting_time"
                        style="border:1px solid #000; border-radius:6px; padding:6px;">
                </div>

                <div style="margin-bottom:10px;">
                    <label style="width:120px; display:inline-block;">Location:</label>
                    <input type="text" name="meeting_location"
                        style="border:1px solid #000; border-radius:6px; padding:6px; width:30%;">

                    <label style="margin-left:40px; width:150px; display:inline-block;">Expected Duration:</label>
                    <input type="text" name="meeting_duration"
                        style="border:1px solid #000; border-radius:6px; padding:6px;">
                </div>

                <div style="margin-bottom:10px;">
                    <label style="width:120px; display:inline-block;">Chairperson:</label>
                    <input type="text" name="chairperson"
                        style="border:1px solid #000; border-radius:6px; padding:6px; width:30%;">

                    <label style="margin-left:40px; width:90px; display:inline-block;">Recorder:</label>
                    <input type="text" name="recorder"
                        style="border:1px solid #000; border-radius:6px; padding:6px;">
                </div>
            </div>

            <!-- Attendees -->
            <div style="padding:15px; border:1px solid #ddd; border-radius:10px; margin-bottom:20px;">
                <p style="font-weight:bold; margin-bottom:10px;">Attendees</p>

                @for($i = 1; $i <= 10; $i++)
                    <div style="display:flex; align-items:center; margin-bottom:8px;">
                    <span style="width:25px;">{{ $i }}.</span>
                    <input type="text" name="attendees[{{ $i }}]"
                        style="border:1px solid #000; border-radius:6px; padding:6px; width:40%;">
            </div>
            @endfor
        </div>

        <!-- Invitation Message -->
        <div style="padding:15px; border:1px solid #ddd; border-radius:10px; margin-bottom:20px;">
            <p>Dear Team,</p>

            <p>
                You are cordially invited to attend the upcoming <strong>Meeting</strong> for
                <input type="text" name="meeting_topic"
                    style="border:1px solid #000; border-radius:6px; padding:4px; width:25%; display:inline-block;">
            </p>

            <h3 style="font-size:18px; margin-top:20px;">AGENDA ITEMS</h3>
            <ol>
                @for($i = 1; $i <= 10; $i++)
                    <li style="margin-bottom:8px;">
                    <input type="text" name="agenda_items[{{ $i }}]"
                        style="border:1px solid #000; border-radius:6px; padding:6px; width:85%;">
                    </li>
                    @endfor
            </ol>

            <p>
                Your participation is critical to ensure a comprehensive and effective review.
                Kindly prepare and bring any relevant data or presentations from your department.
            </p>

            <p>
                Please confirm your availability by:
                <input type="date" name="confirmation_date"
                    style="border:1px solid #000; border-radius:6px; padding:4px;">
            </p>
        </div>

        <!-- Sender Info -->
        <div style="padding:15px; border:1px solid #ddd; border-radius:10px;">
            <p style="font-weight:bold;">Warm Regards,</p>

            <div style="margin-top:10px;">
                <label style="display:block; margin-bottom:5px;">Your Full Name:</label>
                <input type="text" name="sender_name"
                    style="border:1px solid #000; border-radius:6px; padding:6px; width:40%;">

                <br><br>

                <label style="display:block; margin-bottom:5px;">Designation:</label>
                <input type="text" name="sender_designation"
                    style="border:1px solid #000; border-radius:6px; padding:6px; width:40%;">

                <br><br>

                <label style="display:block; margin-bottom:5px;">Contact Details:</label>
                <input type="text" name="sender_contact"
                    style="border:1px solid #000; border-radius:6px; padding:6px; width:40%;">

                <p style="margin-top:15px;">TRUSTlab Diagnostics Pvt Ltd</p>
            </div>
        </div>

        </div>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/GE/FOM-029"
        docNo="TDPL/GE/FOM-029"
        docName="Approved Referral Laboratories Consultants Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <table style="width:100%; border-collapse:collapse; border:1px solid #000;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:8px;">S. No.</th>
                    <th style="border:1px solid #000; padding:8px;">Outsource Lab / Consultant Name</th>
                    <th style="border:1px solid #000; padding:8px;">Location</th>
                    <th style="border:1px solid #000; padding:8px;">MoU Date</th>
                    <th style="border:1px solid #000; padding:8px;">User Code</th>
                </tr>
            </thead>

            <tbody>
                @for($i = 1; $i <= 30; $i++)
                    <tr>
                    <td style="border:1px solid #000; padding:6px; text-align:center;">
                        {{ $i }}
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="lab_name[{{ $i }}]"
                            style="width:100%; border:1px solid #000; border-radius:6px; padding:5px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="location[{{ $i }}]"
                            style="width:100%; border:1px solid #000; border-radius:6px; padding:5px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="date" name="mou_date[{{ $i }}]"
                            style="width:100%; border:1px solid #000; border-radius:6px; padding:5px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="user_code[{{ $i }}]"
                            style="width:100%; border:1px solid #000; border-radius:6px; padding:5px;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>


    </x-formTemplete>
    <x-formTemplete
        id="TDPL/GE/FOM-030"
        docNo="TDPL/GE/FOM-030"
        docName="Room Temperature and Humidity Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">


        <p><strong>Month/Year:</strong>
            <input type="text" name="month_year"
                style="padding:5px; border:1px solid #aaa; border-radius:4px; width:200px;">
            <strong>Department:</strong>
            <input type="text" name="department"
                style="padding:5px; border:1px solid #aaa; border-radius:4px; width:200px;">
            <strong>Instrument ID/S. No.:</strong>
            <input type="text" name="instrument_id"
                style="padding:5px; border:1px solid #aaa; border-radius:4px; width:200px;">
            <strong>Acceptable Range:</strong> Humidity: 30% - 85%, Temperature: 25 ± 5 °C
        </p>


        <table style="width:100%; border-collapse:collapse; text-align:center; font-size:14px;">
            <tr>
                <td rowspan="2" style="border:1px solid #000; padding:6px; font-weight:bold; width:6%;">Date</td>

                <td colspan="3" style="border:1px solid #000; padding:6px; font-weight:bold;">
                    Morning (9:00 AM - 9:30 AM)
                </td>

                <td colspan="3" style="border:1px solid #000; padding:6px; font-weight:bold;">
                    Evening (3:30 PM - 4:00 PM)
                </td>
            </tr>

            <tr>
                <td style="border:1px solid #000; padding:6px; font-weight:bold;">Humidity</td>
                <td style="border:1px solid #000; padding:6px; font-weight:bold;">Temperature</td>
                <td style="border:1px solid #000; padding:6px; font-weight:bold;">Signature</td>

                <td style="border:1px solid #000; padding:6px; font-weight:bold;">Humidity</td>
                <td style="border:1px solid #000; padding:6px; font-weight:bold;">Temperature</td>
                <td style="border:1px solid #000; padding:6px; font-weight:bold;">Signature</td>
            </tr>

            @for($i = 1; $i <= 31; $i++)
                <tr>
                <td style="border:1px solid #000; padding:6px; font-weight:bold;">{{ $i }}</td>

                <!-- Morning Humidity -->
                <td style="border:1px solid #000; padding:6px;">
                    <input type="text" name="morning_humidity[{{ $i }}]"
                        style="width:90%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                </td>

                <!-- Morning Temperature -->
                <td style="border:1px solid #000; padding:6px;">
                    <input type="text" name="morning_temp[{{ $i }}]"
                        style="width:90%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                </td>

                <!-- Morning Signature -->
                <td style="border:1px solid #000; padding:6px;">
                    <input type="text" name="morning_sign[{{ $i }}]"
                        style="width:90%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                </td>

                <!-- Evening Humidity -->
                <td style="border:1px solid #000; padding:6px;">
                    <input type="text" name="evening_humidity[{{ $i }}]"
                        style="width:90%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                </td>

                <!-- Evening Temperature -->
                <td style="border:1px solid #000; padding:6px;">
                    <input type="text" name="evening_temp[{{ $i }}]"
                        style="width:90%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                </td>

                <!-- Evening Signature -->
                <td style="border:1px solid #000; padding:6px;">
                    <input type="text" name="evening_sign[{{ $i }}]"
                        style="width:90%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                </td>
                </tr>
                @endfor
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-031"
        docNo="TDPL/GE/FOM-031"
        docName=" Amendment Report Monitoring Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">


        <p style="font-size:15px; margin-bottom:15px;">
            <strong>Month & Year:</strong>
            <input type="text" name="month_year"
                style="padding:5px; border:1px solid #aaa; border-radius:4px; width:180px; margin-right:20px;">

            <strong>Location:</strong>
            <input type="text" name="location"
                style="padding:5px; border:1px solid #aaa; border-radius:4px; width:180px; margin-right:20px;">

            <strong>Department:</strong>
            <input type="text" name="department"
                style="padding:5px; border:1px solid #aaa; border-radius:4px; width:180px;">
        </p>

        <table style="width:100%; border-collapse:collapse; text-align:center; font-size:14px;">
            <tr>
                <td style="border:1px solid #000; padding:6px; font-weight:bold;">Date</td>
                <td style="border:1px solid #000; padding:6px; font-weight:bold;">Visit No.</td>
                <td style="border:1px solid #000; padding:6px; font-weight:bold;">Parameter</td>
                <td style="border:1px solid #000; padding:6px; font-weight:bold;">Reason for Amendment</td>
                <td style="border:1px solid #000; padding:6px; font-weight:bold;">Amendment Done By</td>
                <td style="border:1px solid #000; padding:6px; font-weight:bold;">Original Result</td>
                <td style="border:1px solid #000; padding:6px; font-weight:bold;">Final Result Reported in LIMS</td>
            </tr>

            @for($i = 1; $i <= 10; $i++)
                <tr>
                <!-- Date -->
                <td style="border:1px solid #000; padding:6px;">
                    <input type="date" name="date[{{ $i }}]"
                        style="width:95%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                </td>

                <!-- Visit No -->
                <td style="border:1px solid #000; padding:6px;">
                    <input type="text" name="visit_no[{{ $i }}]"
                        style="width:90%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                </td>

                <!-- Parameter -->
                <td style="border:1px solid #000; padding:6px;">
                    <input type="text" name="parameter[{{ $i }}]"
                        style="width:90%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                </td>

                <!-- Reason for Amendment -->
                <td style="border:1px solid #000; padding:6px;">
                    <input type="text" name="reason[{{ $i }}]"
                        style="width:90%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                </td>

                <!-- Amendment Done By -->
                <td style="border:1px solid #000; padding:6px;">
                    <input type="text" name="done_by[{{ $i }}]"
                        style="width:90%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                </td>

                <!-- Original Result -->
                <td style="border:1px solid #000; padding:6px;">
                    <input type="text" name="original_result[{{ $i }}]"
                        style="width:90%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                </td>

                <!-- Final Result in LIMS -->
                <td style="border:1px solid #000; padding:6px;">
                    <input type="text" name="final_result[{{ $i }}]"
                        style="width:90%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                </td>
                </tr>
                @endfor

        </table>


    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-033"
        docNo="TDPL/GE/FOM-033"
        docName="Daily Preparation of 1% Sodium Hypochlorite Solution Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">


        <p style="margin-bottom:15px;">
            <strong>Month/Year:</strong>
            <input type="text" name="month_year"
                style="border:1px solid #000; padding:5px; margin-right:20px;">

            <strong>Location:</strong>
            <input type="text" name="location"
                style="border:1px solid #000; padding:5px; margin-right:20px;">

            <strong>Department:</strong>
            <input type="text" name="department"
                style="border:1px solid #000; padding:5px;">
        </p>

        <table style="width:100%; border-collapse:collapse; margin-top:10px;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:8px;">Date</th>
                    <th style="border:1px solid #000; padding:8px;">Original Concentration</th>
                    <th style="border:1px solid #000; padding:8px;">Quantity Prepared</th>
                    <th style="border:1px solid #000; padding:8px;">Prepared By</th>
                    <th style="border:1px solid #000; padding:8px;">Verified By</th>
                </tr>
            </thead>

            <tbody>
                @for($i = 1; $i <= 31; $i++)
                    <tr>
                    <td style="border:1px solid #000; padding:8px; text-align:center;">
                        <strong>{{ $i }}</strong>
                    </td>

                    <td style="border:1px solid #000; padding:8px;">
                        <input type="text" name="original_concentration[{{ $i }}]"
                            style="width:100%; border:1px solid #000; padding:5px;">
                    </td>

                    <td style="border:1px solid #000; padding:8px;">
                        <input type="text" name="quantity_prepared[{{ $i }}]"
                            style="width:100%; border:1px solid #000; padding:5px;">
                    </td>

                    <td style="border:1px solid #000; padding:8px;">
                        <input type="text" name="prepared_by[{{ $i }}]"
                            style="width:100%; border:1px solid #000; padding:5px;">
                    </td>

                    <td style="border:1px solid #000; padding:8px;">
                        <input type="text" name="verified_by[{{ $i }}]"
                            style="width:100%; border:1px solid #000; padding:5px;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

        <p style="margin-top:20px; font-weight:bold;">
            Take 5% Sodium Hypochlorite Solution: Mix 1 part with 4 parts of water
        </p>


    </x-formTemplete>
    <x-formTemplete
        id="TDPL/GE/FOM-034"
        docNo="TDPL/GE/FOM-034"
        docName="Deep Freezer Temperature Monitoring Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <p style="margin-bottom:15px;">
            <strong>Month/Year:</strong>
            <input type="text" name="month_year"
                style="border:1px solid #000; padding:5px; margin-right:20px;">

            <strong>Department:</strong>
            <input type="text" name="department"
                style="border:1px solid #000; padding:5px; margin-right:20px;">

            <strong>Instrument ID/S. No.:</strong>
            <input type="text" name="instrument_id"
                style="border:1px solid #000; padding:5px;">
        </p>

        <table style="width:100%; border-collapse:collapse; margin-top:10px;">
            <thead>
                <tr>
                    <th rowspan="2" style="border:1px solid #000; padding:8px; width:60px;">Date</th>
                    <th colspan="2" style="border:1px solid #000; padding:8px; text-align:center;">
                        Morning (9 - 10 AM)
                    </th>
                    <th colspan="2" style="border:1px solid #000; padding:8px; text-align:center;">
                        Evening (4 - 5 PM)
                    </th>
                </tr>
                <tr>
                    <th style="border:1px solid #000; padding:8px;">Temperature</th>
                    <th style="border:1px solid #000; padding:8px;">Signature</th>
                    <th style="border:1px solid #000; padding:8px;">Temperature</th>
                    <th style="border:1px solid #000; padding:8px;">Signature</th>
                </tr>
            </thead>

            <tbody>
                @for($i = 1; $i <= 31; $i++)
                    <tr>
                    <td style="border:1px solid #000; padding:8px; text-align:center;">
                        <strong>{{ $i }}</strong>
                    </td>

                    <!-- Morning Temperature -->
                    <td style="border:1px solid #000; padding:8px;">
                        <input type="text"
                            name="morning_temp[{{ $i }}]"
                            style="width:100%; border:1px solid #000; padding:5px;">
                    </td>

                    <!-- Morning Signature -->
                    <td style="border:1px solid #000; padding:8px;">
                        <input type="text"
                            name="morning_signature[{{ $i }}]"
                            style="width:100%; border:1px solid #000; padding:5px;">
                    </td>

                    <!-- Evening Temperature -->
                    <td style="border:1px solid #000; padding:8px;">
                        <input type="text"
                            name="evening_temp[{{ $i }}]"
                            style="width:100%; border:1px solid #000; padding:5px;">
                    </td>

                    <!-- Evening Signature -->
                    <td style="border:1px solid #000; padding:8px;">
                        <input type="text"
                            name="evening_signature[{{ $i }}]"
                            style="width:100%; border:1px solid #000; padding:5px;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

        <p style="margin-top:20px; font-weight:bold;">
            Acceptable Temperature: -20˚C ± 2˚C
        </p>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-035"
        docNo="TDPL/GE/FOM-035"
        docName="Corrective Action & Preventive Action Form for EQAS Outliers"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <div style="background:#fff; padding:20px; border:1px solid #ccc; border-radius:8px;">

            <!-- TOP SECTION -->
            <div style="margin-bottom:20px;">
                <label style="font-weight:bold;">Month/Year:</label>
                <input type="text" name="month_year" style="border:1px solid #000; padding:5px; width:20%; margin-right:20px;">

                <label style="font-weight:bold;">Department:</label>
                <input type="text" name="department" style="border:1px solid #000; padding:5px; width:20%; margin-right:20px;">

                <label style="font-weight:bold;">Location:</label>
                <input type="text" name="location" style="border:1px solid #000; padding:5px; width:20%;">
            </div>

            <!-- SIMPLE INPUT FIELDS -->
            <div style="margin-bottom:12px;">
                <label style="font-weight:bold;">Date of Corrective Action Taken:</label><br>
                <input type="date" name="corrective_action_date" style="border:1px solid #000; padding:5px; width:40%;">
            </div>

            <div style="margin-bottom:12px;">
                <label style="font-weight:bold;">Name of the Survey:</label><br>
                <input type="text" name="survey_name" style="border:1px solid #000; padding:5px; width:70%;">
            </div>

            <div style="margin-bottom:12px;">
                <label style="font-weight:bold;">Details of Samples:</label><br>
                <textarea name="sample_details" style="border:1px solid #000; padding:5px; width:80%; height:60px;"></textarea>
            </div>

            <div style="margin-bottom:12px;">
                <label style="font-weight:bold;">EQAS Sample Run Date:</label><br>
                <input type="date" name="sample_run_date" style="border:1px solid #000; padding:5px; width:40%;">
            </div>

            <div style="margin-bottom:12px;">
                <label style="font-weight:bold;">Outlier Results:</label><br>
                <textarea name="outlier_results" style="border:1px solid #000; padding:5px; width:80%; height:60px;"></textarea>
            </div>

            <div style="margin-bottom:12px;">
                <label style="font-weight:bold;">EQAS Trends of last 2 cycles (if applicable):</label><br>
                <textarea name="eqas_trends" style="border:1px solid #000; padding:5px; width:80%; height:60px;"></textarea>
            </div>

            <div style="margin-bottom:20px;">
                <label style="font-weight:bold;">Root Cause Analysis (Summary):</label><br>
                <textarea name="root_cause_summary" style="border:1px solid #000; padding:5px; width:80%; height:80px;"></textarea>
            </div>

            <!-- ROOT CAUSE TABLE -->
            <table style="width:100%; border-collapse:collapse; background:#fff; border:1px solid #ccc; border-radius:6px; overflow:hidden;">
                <thead>
                    <tr style="background:#f5f5f5;">
                        <th style="border:1px solid #ccc; padding:6px;">S. No.</th>
                        <th style="border:1px solid #ccc; padding:6px;">Root Cause Analysis</th>
                        <th style="border:1px solid #ccc; padding:6px;">Acceptable</th>
                        <th style="border:1px solid #ccc; padding:6px;">Unacceptable</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach([
                    'IQC Status',
                    'Preventive Maintenance Status',
                    'Calibration Status',
                    'Reagent Status',
                    'Clerical Error',
                    'Technical Problem',
                    'Problem with EQAS Samples'
                    ] as $index => $item)
                    <tr>
                        <td style="border:1px solid #ccc; padding:6px; text-align:center;">
                            {{ $index + 1 }}
                        </td>
                        <td style="border:1px solid #ccc; padding:6px;">
                            {{ $item }}
                        </td>
                        <td style="border:1px solid #ccc; padding:6px; text-align:center;">
                            <input type="checkbox" name="root_cause[{{ $index }}][acceptable]">
                        </td>
                        <td style="border:1px solid #ccc; padding:6px; text-align:center;">
                            <input type="checkbox" name="root_cause[{{ $index }}][unacceptable]">
                        </td>
                    </tr>
                    @endforeach

                    <tr>
                        <td colspan="4" style="border:1px solid #ccc; padding:6px;">
                            Any Other (Please Specify):<br>
                            <textarea name="other_root_cause" style="border:1px solid #000; padding:5px; width:98%; height:60px;"></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- IMMEDIATE ACTION -->
            <div style="margin-top:25px;">
                <label style="font-weight:bold;">Immediate Action Taken, if any:</label><br>
                <textarea name="immediate_action" style="border:1px solid #000; padding:5px; width:80%; height:80px;"></textarea>
            </div>

            <!-- RE-ASSAY TABLE -->
            <h3 style="margin-top:30px; font-weight:bold;">Summary of Re-Assayed Results</h3>

            <table style="width:100%; border-collapse:collapse; border:1px solid #ccc; background:#fff; border-radius:6px; overflow:hidden;">
                <thead>
                    <tr style="background:#f5f5f5;">
                        <th style="border:1px solid #ccc; padding:6px;">S. No.</th>
                        <th style="border:1px solid #ccc; padding:6px;">Analyte</th>
                        <th style="border:1px solid #ccc; padding:6px;">Previous Results</th>
                        <th style="border:1px solid #ccc; padding:6px;">Re-assayed Results / ILC Result</th>
                        <th style="border:1px solid #ccc; padding:6px;">Acceptability Limits / CV</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i = 1; $i <= 4; $i++)
                        <tr>
                        <td style="border:1px solid #ccc; padding:6px; text-align:center;">{{ $i }}</td>
                        <td style="border:1px solid #ccc; padding:6px;"><input type="text" name="analyte[{{ $i }}]" style="width:95%; border:1px solid #000; padding:4px;"></td>
                        <td style="border:1px solid #ccc; padding:6px;"><input type="text" name="previous_result[{{ $i }}]" style="width:95%; border:1px solid #000; padding:4px;"></td>
                        <td style="border:1px solid #ccc; padding:6px;"><input type="text" name="reassayed_result[{{ $i }}]" style="width:95%; border:1px solid #000; padding:4px;"></td>
                        <td style="border:1px solid #ccc; padding:6px;"><input type="text" name="acceptability_limit[{{ $i }}]" style="width:95%; border:1px solid #000; padding:4px;"></td>
                        </tr>
                        @endfor
                </tbody>
            </table>

            <!-- COMMENTS -->
            <div style="margin-top:25px;">
                <label style="font-weight:bold;">Comment on Re-Assayed Results:</label><br>
                <textarea name="reassay_comment" style="border:1px solid #000; padding:5px; width:80%; height:80px;"></textarea>
            </div>

            <div style="margin-top:25px;">
                <label style="font-weight:bold;">Preventive Action to Prevent Recurrence:</label><br>
                <textarea name="preventive_action" style="border:1px solid #000; padding:5px; width:80%; height:80px;"></textarea>
            </div>

            <div style="margin-top:25px;">
                <label style="font-weight:bold;">Documents Attached:</label><br>
                <input type="file" name="documents[]" multiple style="margin-top:5px;">
            </div>

            <div style="margin-top:25px;">
                <label style="font-weight:bold;">Conclusion:</label>
                <ol style="margin-top:10px;">
                    <li>Clerical Error</li>
                    <li>Methodology Error</li>
                    <li>Technical Problem</li>
                    <li>Problem with EQAS Material</li>
                    <li>Others (Specify)</li>
                </ol>
            </div>

            <div style="margin-top:25px;">
                <label style="font-weight:bold;">Corrective Action Taken By:</label><br>
                <input type="text" name="action_taken_by" style="border:1px solid #000; padding:5px; width:60%;">
            </div>

            <div style="margin-top:15px;">
                <label style="font-weight:bold;">Corrective Action Reviewed/Approved By:</label><br>
                <input type="text" name="action_approved_by" style="border:1px solid #000; padding:5px; width:60%;">
            </div>

        </div>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-036"
        docNo="TDPL/GE/FOM-036"
        docName="Daily IQC Outlier Non-Conformity & Preventive Action Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">


        <!-- HEADER FIELDS -->
        <div style="margin-bottom:20px;">
            <label style="font-weight:bold;">Month & Year:</label>
            <input type="text" name="month_year"
                style="border:1px solid #000; padding:5px; width:20%; margin-right:20px;">

            <label style="font-weight:bold;">Department:</label>
            <input type="text" name="department"
                style="border:1px solid #000; padding:5px; width:20%; margin-right:20px;">

            <label style="font-weight:bold;">Location:</label>
            <input type="text" name="location"
                style="border:1px solid #000; padding:5px; width:20%;">
        </div>

        <!-- MAIN TABLE -->
        <table style="width:100%; border-collapse:collapse; background:#fff; border:1px solid #ccc; border-radius:6px; overflow:hidden;">
            <thead>
                <tr style="background:#f5f5f5;">
                    <th style="border:1px solid #ccc; padding:6px;">Date</th>
                    <th style="border:1px solid #ccc; padding:6px;">Outlier Parameter</th>
                    <th style="border:1px solid #ccc; padding:6px;">Non-Conformity Observed</th>
                    <th style="border:1px solid #ccc; padding:6px;">Root Cause Analysis</th>
                    <th style="border:1px solid #ccc; padding:6px;">Corrective Actions Taken</th>
                    <th style="border:1px solid #ccc; padding:6px;">Preventive Action Taken</th>
                    <th style="border:1px solid #ccc; padding:6px;">Date of Closure</th>
                    <th style="border:1px solid #ccc; padding:6px;">Signature</th>
                </tr>
            </thead>

            <tbody>
                @for($i = 1; $i <= 10; $i++)
                    <tr>
                    <td style="border:1px solid #ccc; padding:4px;">
                        <input type="date" name="rows[{{ $i }}][date]"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>

                    <td style="border:1px solid #ccc; padding:4px;">
                        <input type="text" name="rows[{{ $i }}][outlier_parameter]"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>

                    <td style="border:1px solid #ccc; padding:4px;">
                        <textarea name="rows[{{ $i }}][non_conformity]"
                            style="width:100%; border:1px solid #000; padding:4px; height:40px;"></textarea>
                    </td>

                    <td style="border:1px solid #ccc; padding:4px;">
                        <textarea name="rows[{{ $i }}][root_cause]"
                            style="width:100%; border:1px solid #000; padding:4px; height:40px;"></textarea>
                    </td>

                    <td style="border:1px solid #ccc; padding:4px;">
                        <textarea name="rows[{{ $i }}][corrective_action]"
                            style="width:100%; border:1px solid #000; padding:4px; height:40px;"></textarea>
                    </td>

                    <td style="border:1px solid #ccc; padding:4px;">
                        <textarea name="rows[{{ $i }}][preventive_action]"
                            style="width:100%; border:1px solid #000; padding:4px; height:40px;"></textarea>
                    </td>

                    <td style="border:1px solid #ccc; padding:4px;">
                        <input type="date" name="rows[{{ $i }}][closure_date]"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>

                    <td style="border:1px solid #ccc; padding:4px; text-align:center;">
                        <input type="text" name="rows[{{ $i }}][signature]"
                            style="width:90%; border:1px solid #000; padding:4px;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

        <!-- FOOTER -->
        <div style="margin-top:20px;">
            <label style="font-weight:bold;">Monitoring Authority Signature:</label><br>
            <input type="text" name="monitoring_signature"
                style="border:1px solid #000; padding:5px; width:40%; margin-top:5px;">
        </div>


    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-037"
        docNo="TDPL/GE/FOM-037"
        docName="Authorized Persons on Software Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table style="width:100%; border-collapse:collapse;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px;">S. No.</th>
                    <th style="border:1px solid #000; padding:6px;">Software Name</th>
                    <th style="border:1px solid #000; padding:6px;">Authorized Person Name</th>
                    <th style="border:1px solid #000; padding:6px;">Signature</th>
                </tr>
            </thead>
            <tbody>
                @foreach(range(1,15) as $i)
                <tr>
                    <td style="border:1px solid #000; padding:6px; text-align:center;">{{ $i }}</td>
                    <td style="border:1px solid #000; padding:6px;"><input type="text" name="software_name[{{ $i }}]" style="width:100%; border:none; outline:none;" /></td>
                    <td style="border:1px solid #000; padding:6px;"><input type="text" name="authorized_person[{{ $i }}]" style="width:100%; border:none; outline:none;" /></td>
                    <td style="border:1px solid #000; padding:6px;"><input type="text" name="signature[{{ $i }}]" style="width:100%; border:none; outline:none;" /></td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-038"
        docNo="TDPL/GE/FOM-038"
        docName="Authorized Personnel for Handling the Instruments Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <p style="margin-top:20px;">
            <strong>Department:</strong>
            <input type="text" name="department"
                style="margin-left:10px; border:1px solid #ccc; padding:4px;">

            <strong style="margin-left:40px;">Location:</strong>
            <input type="text" name="location"
                style="margin-left:10px; border:1px solid #ccc; padding:4px;">
        </p>

        <table style="width:100%; border-collapse: collapse;" border="1">
            <tbody>
                <tr>
                    <td style="padding:6px; font-weight:bold;">S. No.</td>
                    <td style="padding:6px; font-weight:bold;">Employee Name</td>
                    <td style="padding:6px; font-weight:bold;">Instruments authorized to handle</td>
                    <td style="padding:6px; font-weight:bold;">Designation</td>
                    <td style="padding:6px; font-weight:bold;">Signature</td>
                </tr>

                @for($i = 1; $i <= 30; $i++)
                    <tr>
                    <td style="padding:6px; text-align:center;">
                        <input type="text" name="records[{{ $i }}][sno]" value="{{ $i }}"
                            style="width:100%; border:none; outline:none; text-align:center;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="records[{{ $i }}][employee_name]"
                            style="width:100%; border:none; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="records[{{ $i }}][instruments]"
                            style="width:100%; border:none; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="records[{{ $i }}][designation]"
                            style="width:100%; border:none; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="records[{{ $i }}][signature]"
                            style="width:100%; border:none; outline:none;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>


    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-039"
        docNo="TDPL/GE/FOM-039"
        docName="Minutes of Meeting"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <div style="background:#ffffff; padding:20px; border-radius:10px; font-size:14px; width:100%; box-sizing:border-box; border:1px solid #ddd;">

            <table style="width:100%; border-collapse: collapse;">
                <tbody>

                    <!-- Header -->
                    <tr>
                        <td></td>
                        <td colspan="6" style="text-align:center; font-weight:bold; padding:10px;">MINUTES OF MEETING</td>
                    </tr>

                    <!-- Present / Absent / Date -->
                    <tr>
                        <td colspan="3" style="font-weight:bold;">Present</td>
                        <td colspan="2" style="font-weight:bold;">Absent (include reason)</td>
                        <td colspan="2" style="font-weight:bold;">Date:</td>
                    </tr>

                    <tr>
                        <!-- Present names -->
                        <td colspan="3" style="border:1px solid #ddd; padding:8px; border-radius:6px;">
                            @for($i=0;$i < 3;$i++)
                                <p><input type="text" placeholder="Name" style="width:95%; padding:6px; border:1px solid #ccc; border-radius:5px;"></p>
                                @endfor
                        </td>

                        <!-- Absent list -->
                        <td colspan="2" style="border:1px solid #ddd; padding:8px; border-radius:6px;">
                            @for($i=0;$i < 2;$i++)
                                <p>
                                <input type="text" placeholder="Name" style="width:45%; padding:6px; border:1px solid #ccc; border-radius:5px;">
                                –
                                <input type="text" placeholder="Reason" style="width:45%; padding:6px; border:1px solid #ccc; border-radius:5px;">
                                </p>
                                @endfor
                        </td>

                        <!-- Date / Venue -->
                        <td colspan="2" style="border:1px solid #ddd; padding:10px; border-radius:6px;">
                            <p>Venue: <input type="text" style="width:70%; padding:6px; border-radius:5px; border:1px solid #ccc;"></p>
                            <p>Start Time: <input type="text" style="width:60%; padding:6px; border-radius:5px; border:1px solid #ccc;"></p>
                            <p>End Time: <input type="text" style="width:60%; padding:6px; border-radius:5px; border:1px solid #ccc;"></p>
                        </td>
                    </tr>

                    <!-- Agenda Header -->
                    <tr>
                        <td style="font-weight:bold; padding:8px;">S. No.</td>
                        <td colspan="6" style="font-weight:bold; padding:8px;">Agenda</td>
                    </tr>

                    <!-- Previous Meeting Review -->
                    <tr>
                        <td rowspan="7" style="text-align:center; font-weight:bold; padding:10px;">1</td>
                        <td colspan="6" style="font-weight:bold; padding:10px;">Review from Previous Meeting – Action Plan</td>
                    </tr>

                    <tr>
                        <td colspan="6" style="font-weight:bold;"><em>Action Plan & Responsibilities:</em></td>
                    </tr>

                    <!-- Header Row -->
                    <tr>
                        <td style="font-weight:bold;">Action</td>
                        <td colspan="2" style="font-weight:bold;">Responsible Person</td>
                        <td colspan="2" style="font-weight:bold;">Target Date</td>
                        <td style="font-weight:bold;">Status</td>
                    </tr>

                    <!-- Previous Meeting Action Rows -->
                    @for($i=0;$i < 4;$i++)
                        <tr>
                        <td><input type="text" style="width:95%; padding:6px; border-radius:5px; border:1px solid #ccc;"></td>
                        <td colspan="2"><input type="text" style="width:95%; padding:6px; border-radius:5px; border:1px solid #ccc;"></td>
                        <td colspan="2"><input type="date" style="width:95%; padding:6px; border-radius:5px; border:1px solid #ccc;"></td>
                        <td><input type="text" style="width:95%; padding:6px; border-radius:5px; border:1px solid #ccc;"></td>
                        </tr>
                        @endfor

                        <!-- Present Meeting Section -->
                        <tr>
                            <td rowspan="9" style="text-align:center; font-weight:bold; padding:10px;">2</td>
                            <td colspan="6" style="font-weight:bold; padding:10px;">Present Meeting</td>
                        </tr>

                        <tr>
                            <td colspan="6">
                                <p style="font-weight:bold;"><em>Summary of Discussions & Key Points:</em></p>
                                <textarea style="width:98%; height:120px; padding:6px; border-radius:6px; border:1px solid #ccc;"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="6">
                                <p style="font-weight:bold;"><em>Decisions Made:</em></p>
                                <textarea style="width:98%; height:120px; padding:6px; border-radius:6px; border:1px solid #ccc;"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="6" style="font-weight:bold;"><em>Action Plan & Responsibilities:</em></td>
                        </tr>

                        <!-- Header Row -->
                        <tr>
                            <td style="font-weight:bold;">Action</td>
                            <td colspan="2" style="font-weight:bold;">Responsible Person</td>
                            <td colspan="2" style="font-weight:bold;">Target Date</td>
                            <td style="font-weight:bold;">Status</td>
                        </tr>

                        <!-- Present Meeting Action Rows -->
                        @for($i=0;$i < 4;$i++)
                            <tr>
                            <td><input type="text" style="width:95%; padding:6px; border-radius:5px; border:1px solid #ccc;"></td>
                            <td colspan="2"><input type="text" style="width:95%; padding:6px; border-radius:5px; border:1px solid #ccc;"></td>
                            <td colspan="2"><input type="date" style="width:95%; padding:6px; border-radius:5px; border:1px solid #ccc;"></td>
                            <td><input type="text" style="width:95%; padding:6px; border-radius:5px; border:1px solid #ccc;"></td>
                            </tr>
                            @endfor

                </tbody>
            </table>

            <!-- Conclusion Section -->
            <h2 style="margin-top:20px;"><strong>Conclusion</strong></h2>

            <p>
                Overall Performance:
                <label><input type="checkbox"> Satisfactory</label>
                &nbsp;&nbsp;
                <label><input type="checkbox"> Needs Improvement</label>
            </p>

            <p>Additional remarks:
                <input type="text" style="width:60%; padding:6px; border-radius:5px; border:1px solid #ccc;">
            </p>

            <p>Next review scheduled on:
                <input type="date" style="padding:6px; border-radius:5px; border:1px solid #ccc;">
            </p>

            <!-- Signatures -->
            <h2 style="margin-top:20px;"><strong>Signatures</strong></h2>

            <p>
                Chairperson: <input type="text" style="width:40%; padding:6px; border-radius:5px; border:1px solid #ccc;">
                Date: <input type="date" style="padding:6px; border-radius:5px; border:1px solid #ccc;">
            </p>

            <p>
                Recorder: <input type="text" style="width:40%; padding:6px; border-radius:5px; border:1px solid #ccc;">
                Date: <input type="date" style="padding:6px; border-radius:5px; border:1px solid #ccc;">
            </p>

        </div>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-040"
        docNo="TDPL/GE/FOM-040"
        docName="Test Requisition Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <div style="background:#ffffff; padding:20px; border-radius:12px; border:1px solid #ccc; font-size:14px; width:100%; box-sizing:border-box;">

            <!-- Header Contact Info -->
            <p>Email: <a href="mailto:customercare@mytrustlab.com">customercare@mytrustlab.com</a></p>
            <p>Toll Free: 1800 599 5656 <a href="http://www.mytrustlab.com/">www.mytrustlab.com</a></p>
            <p>+91 90146 38633</p>

            <h3 style="margin-top:15px;">TEST REQUISITION FORM</h3>

            <!-- Basic Details -->
            <p>
                Client Name: <input type="text" style="padding:5px; border-radius:6px; border:1px solid #ccc; width:20%;">
                &nbsp;&nbsp; Client Code: <input type="text" style="padding:5px; border-radius:6px; border:1px solid #ccc; width:15%;">
                &nbsp;&nbsp; Patient Name: <input type="text" style="padding:5px; border-radius:6px; border:1px solid #ccc; width:20%;">
                &nbsp;&nbsp; Mobile No.: <input type="text" style="padding:5px; border-radius:6px; border:1px solid #ccc; width:15%;">
                &nbsp;&nbsp; Email ID: <input type="email" style="padding:5px; border-radius:6px; border:1px solid #ccc; width:20%;">
            </p>

            <p>
                Date of Birth: <input type="date" style="padding:5px; border-radius:6px; border:1px solid #ccc;">
                &nbsp;&nbsp; Age:
                <input type="text" placeholder="Y" style="width:40px; padding:5px; border-radius:6px; border:1px solid #ccc;">
                <input type="text" placeholder="M" style="width:40px; padding:5px; border-radius:6px; border:1px solid #ccc;">
                <input type="text" placeholder="D" style="width:40px; padding:5px; border-radius:6px; border:1px solid #ccc;">
            </p>

            <p>
                Gender:
                <select style="padding:5px; border-radius:6px; border:1px solid #ccc;">
                    <option>Male</option>
                    <option>Female</option>
                    <option>Others</option>
                </select>
            </p>

            <p>
                Referring Doctor/Hospital:
                <input type="text" style="padding:5px; border-radius:6px; border:1px solid #ccc; width:25%;">
                &nbsp;&nbsp; Address & Contact No.:
                <input type="text" style="padding:5px; border-radius:6px; border:1px solid #ccc; width:25%;">
                &nbsp;&nbsp; Sample Drawn Date:
                <input type="date" style="padding:5px; border-radius:6px; border:1px solid #ccc;">
                Time:
                <input type="text" placeholder="HH:MM" style="width:70px; padding:5px; border-radius:6px; border:1px solid #ccc;">
                AM/PM
                <select style="padding:4px; border-radius:6px; border:1px solid #ccc;">
                    <option>AM</option>
                    <option>PM</option>
                </select>
                &nbsp;&nbsp; LMP:
                <input type="date" style="padding:5px; border-radius:6px; border:1px solid #ccc;">
                &nbsp;&nbsp; Sample Shipment Date:
                <input type="date" style="padding:5px; border-radius:6px; border:1px solid #ccc;">
                &nbsp;&nbsp; No. of Containers:
                <input type="number" style="width:60px; padding:5px; border-radius:6px; border:1px solid #ccc;">
            </p>

            <!-- TEST TABLE -->
            <table style="width:100%; border-collapse:collapse; margin-top:20px;">
                <tbody>

                    <tr style="background:#f6f6f6;">
                        <td style="border:1px solid #ccc; padding:8px; font-weight:bold; width:15%;">Test Codes</td>
                        <td colspan="3" style="border:1px solid #ccc; padding:8px; font-weight:bold;">Test Description</td>
                        <td colspan="2" style="border:1px solid #ccc; padding:8px; font-weight:bold;">Sample Type</td>
                        <td colspan="2" style="border:1px solid #ccc; padding:8px; font-weight:bold;">Barcode / SIN No.</td>
                    </tr>

                    <!-- Loop for 6 blank rows -->
                    @for($i=0;$i<6;$i++)
                        <tr>
                        <td style="border:1px solid #ccc; padding:5px;">
                            <input type="text" style="width:90%; padding:5px; border-radius:5px; border:1px solid #ccc;">
                        </td>
                        <td colspan="3" style="border:1px solid #ccc; padding:5px;">
                            <input type="text" style="width:95%; padding:5px; border-radius:5px; border:1px solid #ccc;">
                        </td>
                        <td colspan="2" style="border:1px solid #ccc; padding:5px;">
                            <input type="text" style="width:90%; padding:5px; border-radius:5px; border:1px solid #ccc;">
                        </td>
                        <td colspan="2" style="border:1px solid #ccc; padding:5px;">
                            <input type="text" style="width:90%; padding:5px; border-radius:5px; border:1px solid #ccc;">
                        </td>
                        </tr>
                        @endfor

                        <!-- Clinical History -->
                        <tr>
                            <td colspan="8" style="border:1px solid #ccc; padding:10px; font-weight:bold;">
                                Clinical History (Attach relevant clinical details)
                            </td>
                        </tr>
                        <tr>
                            <td colspan="8" style="border:1px solid #ccc; padding:10px;">
                                <textarea style="width:100%; height:100px; padding:8px; border-radius:6px; border:1px solid #ccc;"></textarea>
                            </td>
                        </tr>

                        <!-- Temperature Section -->
                        <tr style="background:#f9f9f9;">
                            <td colspan="3" style="border:1px solid #ccc; padding:8px; font-weight:bold;">Sample sent @ Temperature</td>
                            <td colspan="5" style="border:1px solid #ccc; padding:8px; font-weight:bold;">Sample Received @ Temperature</td>
                        </tr>

                        <tr>
                            <td style="border:1px solid #ccc; padding:8px;">18–24°C</td>
                            <td style="border:1px solid #ccc; padding:8px;">2–8°C</td>
                            <td style="border:1px solid #ccc; padding:8px;">&lt;0°C</td>
                            <td colspan="2" style="border:1px solid #ccc; padding:8px;">18–24°C</td>
                            <td colspan="2" style="border:1px solid #ccc; padding:8px;">2–8°C</td>
                            <td style="border:1px solid #ccc; padding:8px;">&lt;0°C</td>
                        </tr>

                </tbody>
            </table>

            <!-- Laboratory Use Only -->
            <h4 style="margin-top:20px;">FOR LABORATORY USE ONLY</h4>
            <p>
                TRUSTlab DIAGNOSTICS PRIVATE LIMITED
                Hyderabad,Bengaluru,Jammu,Guntur,Mahbubnagar,Nizamabad,Visakhapatnam,Karimnagar,Noida,Khammam,Vijayawada,Ananthapuramu,Hanumakonda,Chandigarh
            </p>

            <p>
                Date & Time of Specimen Received:
                <input type="datetime-local" style="padding:5px; border-radius:6px; border:1px solid #ccc;">
                &nbsp;&nbsp; No. of Samples:
                <input type="number" style="width:70px; padding:5px; border-radius:6px; border:1px solid #ccc;">
            </p>

            <p>
                Transported by:
                <input type="text" style="padding:5px; border-radius:6px; border:1px solid #ccc;">
                &nbsp;&nbsp; Received by:
                <input type="text" style="padding:5px; border-radius:6px; border:1px solid #ccc;">
                &nbsp;&nbsp; Received Time:
                <input type="time" style="padding:5px; border-radius:6px; border:1px solid #ccc;">
            </p>

        </div>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/GE/FOM-042"
        docNo="TDPL/GE/FOM-042"
        docName="Referral Lab Evaluation Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <div style="background:#ffffff; padding:20px; border-radius:12px; border:1px solid #ccc; font-size:14px; width:100%; box-sizing:border-box; line-height:1.6;">


            <!-- TOP SECTION -->
            <div style="margin-bottom: 20px;">
                <label>Laboratory’s Name:</label>
                <input type="text" name="laboratory_name" style="width: 60%; border: 1px solid #000;">
            </div>

            <div style="margin-bottom: 10px;">
                <label>Contact Person and Details:</label>
                <textarea name="contact_details" style="width: 90%; height: 80px; border: 1px solid #000;"></textarea>
            </div>

            <div style="margin-bottom: 10px;">
                <label>Reason for Evaluation:</label>
                <div>
                    Routine Testing <input type="checkbox" name="reason_routine"> &nbsp;&nbsp;
                    Back-up System <input type="checkbox" name="reason_backup"> &nbsp;&nbsp;
                    Special Circumstance <input type="checkbox" name="reason_special">
                </div>
                <label>(Explain):</label>
                <textarea name="special_explanation" style="width: 100%; height: 80px; border: 1px solid #000;"></textarea>
            </div>

            <p>Evaluated for the following tests:</p>

            <!-- TEST TABLE -->
            <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;" border="1">
                <tr>
                    <th style="padding: 4px;">Analyte / Test</th>
                    <th style="padding: 4px;">Matrix</th>
                </tr>

                @foreach(range(1,10) as $i)
                <tr>
                    <td style="padding: 4px;">
                        <input type="text" name="test[{{ $i }}][analyte]" style="width: 100%; border: none;">
                    </td>
                    <td style="padding: 4px;">
                        <input type="text" name="test[{{ $i }}][matrix]" style="width: 100%; border: none;">
                    </td>
                </tr>
                @endforeach

            </table>

            <div style="margin-bottom: 20px;">
                <label>Evaluation done by:</label>
                <input type="text" name="evaluation_done_by" style="width: 60%; border: 1px solid #000;">
                <br><br>
                <label>Date:</label>
                <input type="date" name="evaluation_date" style="border: 1px solid #000;">
            </div>

            <strong>PLEASE ATTACH SUPPORTING DOCUMENTS AS AND WHERE NECESSARY</strong>

            <hr style="margin: 25px 0;">

            <!-- SECTION 1 -->
            <ul>
                <li><strong>Laboratory’s Capabilities (maximum 25 points)</strong></li>
            </ul>

            <ol>
                <li>Background (1–5 points):</li>
            </ol>

            @foreach([
            "Does the laboratory have a reputation for high quality and integrity?",
            "How long has the lab been in business (e.g. 5 years, 10, more)?",
            "What are clients' general observations regarding the lab's services?"
            ] as $key => $question)
            <div style="margin-bottom: 10px;">
                {{ $question }}
                <input type="text" name="background_{{ $key }}" style="width: 150px; border: 1px solid #000;">
            </div>
            @endforeach

            <ol>
                <li>Experience and references (1-5 points):</li>
            </ol>

            @foreach([
            "Has the laboratory provided a list of References?",
            "How long have clients been served by the lab?"
            ] as $key => $question)
            <div style="margin-bottom: 10px;">
                {{ $question }}
                <input type="text" name="experience_{{ $key }}" style="width: 150px; border: 1px solid #000;">
            </div>
            @endforeach

            <ol>
                <li>Quality Management (1-5 points):</li>
            </ol>

            @foreach([
            "Does the lab have a QMS?",
            "Does the Lab have a Quality Assurance Plan?",
            "Is the Laboratory accredited? Is the documentation available?"
            ] as $key => $question)
            <div style="margin-bottom: 10px;">
                {{ $question }}
                <input type="text" name="quality_management_{{ $key }}" style="width: 150px; border: 1px solid #000;">
            </div>
            @endforeach

            <ol>
                <li>Equipment (lab and data handling) (1–5 points):</li>
            </ol>

            @foreach([
            "Is the testing equipment adequate for the scope and volume of services offered?",
            "Is there adequate backup in the event of equipment failure?",
            "Does the automated data processing equipment capability appear to be adequate for the scope of the work contract (e.g., direct transmissions, online result reporting)?"
            ] as $key => $question)
            <div style="margin-bottom: 10px;">
                {{ $question }}
                <input type="text" name="equipment_{{ $key }}" style="width: 150px; border: 1px solid #000;">
            </div>
            @endforeach

            <ol>
                <li>Accreditation and certifications (1–5 points):</li>
            </ol>

            @foreach([
            "NABL?",
            "Other?"
            ] as $key => $question)
            <div style="margin-bottom: 10px;">
                {{ $question }}
                <input type="text" name="accreditation_{{ $key }}" style="width: 150px; border: 1px solid #000;">
            </div>
            @endforeach

            <p><strong>Total points for section 1:</strong> <input type="text" name="total_section_1" style="width: 150px; border: 1px solid #000;"></p>

            <p><strong>Document where the lab was lacking:</strong>
                <input type="text" name="lacking_section_1" style="width: 300px; border: 1px solid #000;">
            </p>

            <hr style="margin: 25px 0;">

            <!-- SECTION 2 -->
            <ul>
                <li><strong>Quality assurance (maximum 25 points)</strong></li>
            </ul>

            @foreach([
            "Is a written, organized, comprehensive quality control (QC) program in place?",
            "Is there a process for remedial action when QC tolerance limits are exceeded?",
            "Is an ongoing monitoring program in place to review, detect, and correct system errors?",
            "Is a copy of proficiency testing results available for previous 24 months, and corrective actions documented?",
            "Does the laboratory have a written protocol for notifying clients of critical values?"
            ] as $key => $question)
            <div style="margin-bottom: 10px;">
                {{ $question }}
                <input type="text" name="quality_assurance_{{ $key }}" style="width: 150px; border: 1px solid #000;">
            </div>
            @endforeach

            <p><strong>Total points for section 2:</strong>
                <input type="text" name="total_section_2" style="width: 150px; border: 1px solid #000;">
            </p>

            <p><strong>Document where the lab was lacking:</strong>
                <input type="text" name="lacking_section_2" style="width: 300px; border: 1px solid #000;">
            </p>

            <hr style="margin: 25px 0;">

            <!-- SECTION 3 -->
            <ul>
                <li><strong>Efficiency of referral services (maximum 15 points)</strong></li>
            </ul>

            @foreach([
            "Does the lab offer a sufficient range of services to satisfy our needs?",
            "Does the lab provide a written TAT for each test performed, and does it meet our needs?",
            "Are data elements for each test complete?"
            ] as $key => $question)
            <div style="margin-bottom: 10px;">
                {{ $question }}
                <input type="text" name="efficiency_{{ $key }}" style="width: 150px; border: 1px solid #000;">
            </div>
            @endforeach

            <p><strong>Total points for section 3:</strong>
                <input type="text" name="total_section_3" style="width: 150px; border: 1px solid #000;">
            </p>

            <p><strong>Document where the lab was lacking:</strong>
                <input type="text" name="lacking_section_3" style="width: 300px; border: 1px solid #000;">
            </p>

            <hr style="margin: 25px 0;">

            <!-- SECTION 4 -->
            <ul>
                <li><strong>Operational systems (1–5 points for each item)</strong></li>
            </ul>

            @foreach([
            "General management/overall assessment of policies/procedures.",
            "Methods used for testing/reporting results.",
            "Specimen handling policies/procedures, including preparation instructions and rejection criteria.",
            "Equipment maintenance policies.",
            "Information and data handling policies/procedures.",
            "Printing of reports via computer or printer (is printer provided?).",
            "Adequate specimen pick-up service?",
            "Does the lab have a protocol for reviewing test reports for possible errors?",
            "Is the test report format clear and easily readable?",
            "Does the lab provide client consultation services daily?"
            ] as $key => $question)
            <div style="margin-bottom: 10px;">
                {{ $question }}
                <input type="text" name="ops_{{ $key }}" style="width: 150px; border: 1px solid #000;">
            </div>
            @endforeach

            <p><strong>Total points for section 4:</strong>
                <input type="text" name="total_section_4" style="width: 150px; border: 1px solid #000;">
            </p>

            <p><strong>Document where the lab was lacking:</strong>
                <input type="text" name="lacking_section_4" style="width: 300px; border: 1px solid #000;">
            </p>

            <hr style="margin: 25px 0;">

            <!-- SECTION 5 -->
            <ul>
                <li><strong>Personnel (maximum 30 points)</strong></li>
            </ul>

            @foreach([
            "Percentage of technologists to technicians.",
            "Does the lab employ a qualified supervisor during all hours of operation?",
            "Are specific staff members assigned to assist us at all times?",
            "Are doctoral-level scientists or pathologists available for consultation?",
            "Does the technical staff have expertise in all required areas?",
            "Does the technical staff receive continuing education and is it documented?"
            ] as $key => $question)
            <div style="margin-bottom: 10px;">
                {{ $question }}
                <input type="text" name="personnel_{{ $key }}" style="width: 150px; border: 1px solid #000;">
            </div>
            @endforeach

            <p><strong>Total points for section 5:</strong>
                <input type="text" name="total_section_5" style="width: 150px; border: 1px solid #000;">
            </p>

            <p><strong>Document where the lab was lacking:</strong>
                <input type="text" name="lacking_section_5" style="width: 300px; border: 1px solid #000;">
            </p>

            <hr style="margin: 25px 0;">

            <!-- COMPARISON SECTION -->
            <p><strong>Results for method and instrument comparison studies:</strong></p>

            Acceptable <input type="checkbox" name="comparison_acceptable">
            /
            Unacceptable <input type="checkbox" name="comparison_unacceptable">

            <br><br>

            <label>Explain:</label>
            <textarea name="comparison_explain" style="width: 100%; height: 100px; border: 1px solid #000;"></textarea>

            <br><br>

            <label>Evaluator’s comments:</label>
            <textarea name="evaluators_comments" style="width: 100%; height: 120px; border: 1px solid #000;"></textarea>

            <br><br>

            <label>Lab Manager:</label>
            <input type="text" name="lab_manager" style="width: 60%; border: 1px solid #000;">

            <br><br>

            <label>Comments:</label>
            <textarea name="lab_manager_comments" style="width: 100%; height: 100px; border: 1px solid #000;"></textarea>

            <br><br>

            Lab Approved <input type="checkbox" name="lab_approved"> /
            Not Approved <input type="checkbox" name="lab_not_approved">

            <br><br>

            <label>Signature:</label>
            <input type="text" name="signature" style="width: 200px; border: 1px solid #000;">
            &nbsp;&nbsp;&nbsp;
            <label>Date:</label>
            <input type="date" name="final_date" style="border: 1px solid #000;">

        </div>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/GE/FOM-044"
        docNo="TDPL/GE/FOM-044"
        docName="Split Sample Analysis Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <div style="padding: 20px;  font-size: 14px;">

            <!-- HEADER SECTION -->
            <p>
                <strong>Department: </strong>
                <input type="text" name="department" style="width: 300px; border: 1px solid #000;">
                &nbsp;&nbsp;&nbsp;
                <strong>Location: </strong>
                <input type="text" name="location" style="width: 200px; border: 1px solid #000;">
            </p>

            <!-- TABLE -->
            <table style="width: 100%; border-collapse: collapse; margin-top: 20px;" border="1">
                <thead>
                    <tr>
                        <td style="padding: 6px;">S. No.</td>
                        <td style="padding: 6px;">Name of tde Test</td>
                        <td style="padding: 6px;">Tech/Dr.01 Result</td>
                        <td style="padding: 6px;">Tech/Dr.02 Result</td>
                        <td style="padding: 6px;">Correlated /<br>Non-Correlated</td>
                        <td style="padding: 6px;">Remarks</td>
                        <td style="padding: 6px;">Signature of HOD/QM</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach(range(1,10) as $i)
                    <tr>
                        <td style="padding: 6px; text-align:center;">
                            {{ $i }}
                        </td>

                        <td style="padding: 6px;">
                            <input type="text" name="rows[{{ $i }}][test_name]" style="width: 100%; border: none;">
                        </td>

                        <td style="padding: 6px;">
                            <input type="text" name="rows[{{ $i }}][tech1_result]" style="width: 100%; border: none;">
                        </td>

                        <td style="padding: 6px;">
                            <input type="text" name="rows[{{ $i }}][tech2_result]" style="width: 100%; border: none;">
                        </td>

                        <td style="padding: 6px; text-align:center;">
                            <select name="rows[{{ $i }}][correlation]" style="width: 100%; border: none;">
                                <option value="">--Select--</option>
                                <option value="Correlated">Correlated</option>
                                <option value="Non Correlated">Non Correlated</option>
                            </select>
                        </td>

                        <td style="padding: 6px;">
                            <input type="text" name="rows[{{ $i }}][remarks]" style="width: 100%; border: none;">
                        </td>

                        <td style="padding: 6px;">
                            <input type="text" name="rows[{{ $i }}][signature]" style="width: 100%; border: none;">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-047"
        docNo="TDPL/GE/FOM-047"
        docName="Reagent & Consumables Consumption Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">


        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <td style="padding:6px;">Date</td>
                    <td style="padding:6px;">Reagent Name</td>
                    <td style="padding:6px;">Quantity</td>
                    <td style="padding:6px;">Lot No.</td>
                    <td style="padding:6px;">Expiry Date</td>
                </tr>
            </thead>

            <tbody>
                @foreach(range(1,15) as $i)
                <tr>
                    <td style="padding:6px;">
                        <input type="date" name="rows[{{ $i }}][date]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][reagent_name]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="number" name="rows[{{ $i }}][quantity]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][lot_no]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="date" name="rows[{{ $i }}][expiry_date]"
                            style="width:100%; border:none;">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


    </x-formTemplete>
    <x-formTemplete
        id="TDPL/GE/REG-001"
        docNo="TDPL/GE/REG-001"
        docName="Shift Handover Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <p style="margin-top:15px;">
            <strong>Department:</strong>
            <input type="text" name="department" style="width:300px; border:1px solid #000;">
        </p>

        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <td style="padding:6px;">S. No.</td>
                    <td style="padding:6px;">Date</td>
                    <td style="padding:6px;">Barcode</td>
                    <td style="padding:6px;">Test Name</td>
                    <td style="padding:6px;">No of Samples</td>
                    <td style="padding:6px;">Reason for Pending</td>
                    <td style="padding:6px;">Handover By</td>
                    <td style="padding:6px;">Received By</td>
                    <td style="padding:6px;">Remarks</td>
                </tr>
            </thead>

            <tbody>
                @foreach(range(1,12) as $i)
                <tr>
                    <td style="padding:6px; text-align:center;">
                        {{ $i }}
                    </td>

                    <td style="padding:6px;">
                        <input type="date" name="rows[{{ $i }}][date]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][barcode]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][test_name]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="number" name="rows[{{ $i }}][samples]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][pending_reason]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][handover_by]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][received_by]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][remarks]"
                            style="width:100%; border:none;">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>



    </x-formTemplete>
    <x-formTemplete
        id="TDPL/GE/REG-002"
        docNo="TDPL/GE/REG-002"
        docName="Department Sample Storage & Discard Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">


        <p style="margin-bottom:10px;">
            <strong>Month/Year:</strong>
            <input type="text" name="month_year"
                style="width:200px; border:1px solid #000; margin-left:10px;">
        </p>

        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <td style="padding:6px;">Barcode</td>
                    <td style="padding:6px;">Sample Received Date</td>
                    <td style="padding:6px;">Department</td>
                    <td style="padding:6px;">Sample Discard Date</td>
                    <td style="padding:6px;">Discard By</td>
                    <td style="padding:6px;">Reviewed By</td>
                </tr>
            </thead>

            <tbody>
                @foreach(range(1,12) as $i)
                <tr>
                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][barcode]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="date" name="rows[{{ $i }}][sample_received]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][department]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="date" name="rows[{{ $i }}][discard_date]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][discard_by]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][reviewed_by]"
                            style="width:100%; border:none;">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


    </x-formTemplete>
    <x-formTemplete
        id="TDPL/GE/REG-003"
        docNo="TDPL/GE/REG-003"
        docName="Sample Integrity Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">


        <p style="margin-bottom:10px;">
            <strong>Month/Year:</strong>
            <input type="text" name="month_year"
                style="border:1px solid #000; margin-right:20px;">

            <strong>Department:</strong>
            <input type="text" name="department"
                style="border:1px solid #000;">
        </p>

        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <td style="padding:6px;">Date</td>
                    <td style="padding:6px;">Sample ID</td>
                    <td style="padding:6px;">Test Parameter</td>
                    <td style="padding:6px;">Initial Result</td>
                    <td style="padding:6px;">Result Next Day</td>
                    <td style="padding:6px;">% Difference</td>
                    <td style="padding:6px;">Is Variation Accepted</td>
                    <td style="padding:6px;">Done By</td>
                    <td style="padding:6px;">Verified By</td>
                </tr>
            </thead>

            <tbody>
                @foreach(range(1,15) as $i)
                <tr>
                    <td style="padding:6px;">
                        <input type="date" name="rows[{{ $i }}][date]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][sample_id]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][test_parameter]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="number" step="0.01" name="rows[{{ $i }}][initial_result]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="number" step="0.01" name="rows[{{ $i }}][next_day_result]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][difference]"
                            style="width:100%; border:none;" readonly>
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][accepted]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][done_by]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][verified_by]"
                            style="width:100%; border:none;">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <p style="margin-top:15px;">
            <strong>Acceptability Criteria:</strong>
            % Difference = [(A - B) / A] × 100
        </p>


    </x-formTemplete>
    <x-formTemplete
        id="TDPL/GE/REG-005"
        docNo="TDPL/GE/REG-005"
        docName="Inter-Department Sample Transfer Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        

    <table style="width:100%; border-collapse:collapse;" border="1">
        <thead>
            <tr>
                <td style="padding:6px;">S. No.</td>
                <td style="padding:6px;">Barcode</td>
                <td style="padding:6px;">Sample Received Date/Time</td>
                <td style="padding:6px;">Parameter</td>
                <td style="padding:6px;">From Department</td>
                <td style="padding:6px;">Sample Processed Date &amp; Time</td>
                <td style="padding:6px;">Sample Handed Over to Dept. (Name) By</td>
                <td style="padding:6px;">Receiving Dept. Sign</td>
                <td style="padding:6px;">Verified By</td>
            </tr>
        </thead>

        <tbody>
            @foreach(range(1,10) as $i)
            <tr>
                <td style="padding:6px; text-align:center;">
                    {{ $i }}
                </td>

                <td style="padding:6px;">
                    <input type="text" name="rows[{{ $i }}][barcode]" 
                           style="width:100%; border:none;">
                </td>

                <td style="padding:6px;">
                    <input type="datetime-local" 
                           name="rows[{{ $i }}][received_datetime]" 
                           style="width:100%; border:none;">
                </td>

                <td style="padding:6px;">
                    <input type="text" name="rows[{{ $i }}][parameter]" 
                           style="width:100%; border:none;">
                </td>

                <td style="padding:6px;">
                    <input type="text" name="rows[{{ $i }}][from_department]" 
                           style="width:100%; border:none;">
                </td>

                <td style="padding:6px;">
                    <input type="datetime-local" 
                           name="rows[{{ $i }}][processed_datetime]" 
                           style="width:100%; border:none;">
                </td>

                <td style="padding:6px;">
                    <input type="text" name="rows[{{ $i }}][handed_over_by]" 
                           style="width:100%; border:none;">
                </td>

                <td style="padding:6px;">
                    <input type="text" name="rows[{{ $i }}][receiving_sign]" 
                           style="width:100%; border:none;">
                </td>

                <td style="padding:6px;">
                    <input type="text" name="rows[{{ $i }}][verified_by]" 
                           style="width:100%; border:none;">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


    </x-formTemplete>

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

    // Add new row to tests table
    document.getElementById('addRowBtn1').addEventListener('click', function() {
        const tbody = document.querySelector('#testsTable tbody');
        const newRow = tbody.insertRow();
        const rowCount = tbody.rows.length;

        // Create cells
        ['', '', '', '', '', ''].forEach((content, index) => {
            const cell = newRow.insertCell();
            cell.contentEditable = 'true';
            cell.textContent = index === 0 ? rowCount : content;
        });
    });

    // Submit form data
    document.getElementById('submitBtn1').addEventListener('click', function() {
        // Get analyzer data
        // const analyzerRows = document.querySelectorAll('#analyzerTable tbody tr');
        // const analyzerData = {
        //     department: analyzerRows[0].cells[1].textContent.trim(),
        //     analyzer_sr_no: analyzerRows[1].cells[1].textContent.trim(),
        //     analyzer_type: analyzerRows[2].cells[1].textContent.trim(),
        //     validation: analyzerRows[3].cells[1].textContent.trim(),
        //     remarks: analyzerRows[5].cells[1].textContent.trim()
        // };

        // Get tests data
        const testRows = document.querySelectorAll('#testsTable tbody tr');
        const testsData = [];

        testRows.forEach(row => {
            const cells = row.cells;
            testsData.push({
                sr_no: cells[0].textContent.trim(),
                device: cells[1].textContent.trim(),
                assay_code: cells[2].textContent.trim(),
                test_name: cells[3].textContent.trim(),
                equipment: cells[4].textContent.trim(),
                lis: cells[5].textContent.trim()
            });
        });

        // Prepare complete data
        const formData = {
            // analyzer: analyzerData,
            tests: testsData
        };

        // Send to server
        fetch('/lis-interface-logs-store', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Data saved successfully!');
                } else {
                    alert('Error: ' + (data.message || 'Failed to save data'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to save data');
            });
    });

    // Load saved data
    function loadLisData() {
        fetch('/lis-interface-logs')
            .then(response => response.json())
            .then(data => {
                // if (data.analyzer) {
                //     // Update analyzer table
                //     const analyzerRows = document.querySelectorAll('#analyzerTable tbody tr');
                //     analyzerRows[1].cells[1].textContent = data.analyzer.analyzer_sr_no || '';
                //     analyzerRows[2].cells[1].textContent = data.analyzer.analyzer_type || '';
                //     analyzerRows[5].cells[1].textContent = data.analyzer.remarks || '';
                // }

                if (data.tests && data.tests.length > 0) {
                    // Update tests table
                    const tbody = document.querySelector('#testsTable tbody');

                    // Clear existing rows
                    while (tbody.rows.length > 0) {
                        tbody.deleteRow(0);
                    }

                    // Add new rows with data
                    data.tests.forEach((test, index) => {
                        const newRow = tbody.insertRow();
                        newRow.innerHTML = `
                                                                                <td contenteditable="true">${index + 1}</td>
                                                                                <td contenteditable="true">${test.device || ''}</td>
                                                                                <td contenteditable="true">${test.assay_code || ''}</td>
                                                                                <td contenteditable="true">${test.test_name || ''}</td>
                                                                                <td contenteditable="true">${test.equipment || ''}</td>
                                                                                <td contenteditable="true">${test.lis || ''}</td>
                                                                            `;
                    });
                }
            })
            .catch(error => {
                console.error('Error loading data:', error);
            });
    }

    // Load data when page loads
    document.addEventListener('DOMContentLoaded', loadLisData);


    // Helper function to safely escape the ID
    function escapeSelector(selector) {
        return selector.replace(/([!\"#$%&'()*+,\-./:;<=>?@[\\\]^`{|}~])/g, '\\$1');
    }

    // Submit form function
</script>


</html>


@endsection