@extends('layouts.base')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MG</title>
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
            <div style="font-size: 20px; ">MG </div>

        </div>
        <div class="icon-view">
            <div class="pc-content">
                <div class="pc-folder" onclick="showSection('TDPL/MG/FOM-002')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Master List of External Documents</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MG/FOM-007')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">MRM Agenda Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MG/FOM-008')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">MRM Attendance Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MG/FOM-009')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Minutes of MRM</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MG/FOM-010')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">MRM Task Completion & Compliance</span>
                </div>
            </div>
        </div>
    </div>


    <x-formTemplete
        id="TDPL/MG/FOM-002"
        docNo="TDPL/MG/FOM-002"
        docName="Master List of External Documents"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table style="width:100%; border-collapse: collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px;"><strong>S. No.</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Document No.</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Document Name</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Issue No.</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Issue Date</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Amendt. No.</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Amendt. Date</strong></th>
                </tr>
            </thead>

            <tbody>
                @foreach([
                [
                'document_no' => 'NABL 100A',
                'document_name' => 'General Information Brochure',
                'issue_no' => '01',
                'issue_date' => '2022-11-23',
                'amend_no' => '02',
                'amend_date' => '2024-11-22',
                ],
                [
                'document_no' => 'NABL 151',
                'document_name' => 'Terms & Conditions of Accreditation',
                'issue_no' => '03',
                'issue_date' => '2022-11-23',
                'amend_no' => '00',
                'amend_date' => '',
                ],
                [
                'document_no' => 'NABL 152',
                'document_name' => 'Policy on Impartiality',
                'issue_no' => '03',
                'issue_date' => '2022-11-23',
                'amend_no' => '00',
                'amend_date' => '',
                ],
                [
                'document_no' => 'NABL 153',
                'document_name' => 'Confidentiality Policy',
                'issue_no' => '03',
                'issue_date' => '2022-11-23',
                'amend_no' => '00',
                'amend_date' => '',
                ],
                [
                'document_no' => 'NABL 155',
                'document_name' => 'Management System Requirements (MSQ)',
                'issue_no' => '01',
                'issue_date' => '2024-02-23',
                'amend_no' => '00',
                'amend_date' => '',
                ],
                [
                'document_no' => 'NABL 156',
                'document_name' => 'Requirements for Competence of Testing Laboratories',
                'issue_no' => '01',
                'issue_date' => '2024-02-23',
                'amend_no' => '00',
                'amend_date' => '',
                ],
                [
                'document_no' => 'NABL 157',
                'document_name' => 'Requirements for Internal Audit',
                'issue_no' => '01',
                'issue_date' => '2024-02-23',
                'amend_no' => '00',
                'amend_date' => '',
                ],
                [
                'document_no' => 'NABL 160',
                'document_name' => 'Application Form for Testing Laboratories',
                'issue_no' => '02',
                'issue_date' => '2022-11-23',
                'amend_no' => '01',
                'amend_date' => '2024-08-27',
                ],
                [
                'document_no' => 'NABL 161',
                'document_name' => 'Checklist for Assessment',
                'issue_no' => '02',
                'issue_date' => '2023-05-10',
                'amend_no' => '00',
                'amend_date' => '',
                ],
                [
                'document_no' => 'NABL 162',
                'document_name' => 'Assessor Guide',
                'issue_no' => '02',
                'issue_date' => '2023-05-10',
                'amend_no' => '00',
                'amend_date' => '',
                ],
                [
                'document_no' => 'NABL 163',
                'document_name' => 'Proficiency Testing Requirements',
                'issue_no' => '02',
                'issue_date' => '2023-05-10',
                'amend_no' => '00',
                'amend_date' => '',
                ],
                [
                'document_no' => 'NABL 164',
                'document_name' => 'Policy on Complaints & Appeals',
                'issue_no' => '02',
                'issue_date' => '2023-05-10',
                'amend_no' => '00',
                'amend_date' => '',
                ],
                [
                'document_no' => 'NABL 165',
                'document_name' => 'Assessment Procedure',
                'issue_no' => '02',
                'issue_date' => '2023-05-10',
                'amend_no' => '00',
                'amend_date' => '',
                ],
                [
                'document_no' => 'NABL 166',
                'document_name' => 'Decision-Making Procedure',
                'issue_no' => '02',
                'issue_date' => '2023-05-10',
                'amend_no' => '00',
                'amend_date' => '',
                ],
                [
                'document_no' => 'NABL 167',
                'document_name' => 'Proficiency Testing Plan',
                'issue_no' => '02',
                'issue_date' => '2023-05-10',
                'amend_no' => '00',
                'amend_date' => '',
                ],
                [
                'document_no' => 'NABL 168',
                'document_name' => 'Requirements for Personnel',
                'issue_no' => '02',
                'issue_date' => '2023-05-10',
                'amend_no' => '00',
                'amend_date' => '',
                ],
                [
                'document_no' => 'NABL 169',
                'document_name' => 'Equipment Calibration Requirements',
                'issue_no' => '02',
                'issue_date' => '2023-05-10',
                'amend_no' => '00',
                'amend_date' => '',
                ],
                [
                'document_no' => 'NABL 170',
                'document_name' => 'Technical Requirements',
                'issue_no' => '02',
                'issue_date' => '2023-05-10',
                'amend_no' => '00',
                'amend_date' => '',
                ],
                ] as $index => $doc)
                <tr>
                    {{-- S. No. --}}
                    <td style="padding:6px; text-align:center;">
                        {{ $index + 1 }}
                    </td>

                    {{-- Document No. --}}
                    <td style="padding:6px;">
                        <input type="text"
                            name="rows[{{ $index }}][document_no]"
                            value="{{ $doc['document_no'] }}"
                            style="width:100%; padding:4px; border:1px solid #ccc;">
                    </td>

                    {{-- Document Name --}}
                    <td style="padding:6px;">
                        <input type="text"
                            name="rows[{{ $index }}][document_name]"
                            value="{{ $doc['document_name'] }}"
                            style="width:100%; padding:4px; border:1px solid #ccc;">
                    </td>

                    {{-- Issue No. --}}
                    <td style="padding:6px;">
                        <input type="text"
                            name="rows[{{ $index }}][issue_no]"
                            value="{{ $doc['issue_no'] }}"
                            style="width:100%; padding:4px; border:1px solid #ccc;">
                    </td>

                    {{-- Issue Date --}}
                    <td style="padding:6px;">
                        <input type="date"
                            name="rows[{{ $index }}][issue_date]"
                            value="{{ $doc['issue_date'] }}"
                            style="width:100%; padding:4px; border:1px solid #ccc;">
                    </td>

                    {{-- Amendment No --}}
                    <td style="padding:6px;">
                        <input type="text"
                            name="rows[{{ $index }}][amend_no]"
                            value="{{ $doc['amend_no'] }}"
                            style="width:100%; padding:4px; border:1px solid #ccc;">
                    </td>

                    {{-- Amendment Date --}}
                    <td style="padding:6px;">
                        <input type="date"
                            name="rows[{{ $index }}][amend_date]"
                            value="{{ $doc['amend_date'] }}"
                            style="width:100%; padding:4px; border:1px solid #ccc;">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


    </x-formTemplete>

    <x-formTemplete
        id="TDPL/MG/FOM-007"
        docNo="TDPL/MG/FOM-007"
        docName="MRM Agenda Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <div style="font-family: Arial, sans-serif; font-size: 14px; line-height: 1.6;background-color:white; padding:20px; border-radius: 10px;border:1px solid #000">

            <h2 style="margin-bottom: 10px;">MRM Agenda</h2>

            <h3 style="margin-top: 20px;">Meeting Details</h3>

            <div style="margin-bottom: 10px;">
                <label>Date of MRM:</label>
                <input type="date" name="mrm_date" style="border:1px solid #ccc; padding:4px; margin-left:10px;">

                <label style="margin-left: 40px;">Time of MRM:</label>
                <input type="text" name="mrm_time" placeholder="HH:MM" style="border:1px solid #ccc; padding:4px;">
            </div>

            <div style="margin-bottom: 10px;">
                <label>Location:</label>
                <input type="text" name="location" style="border:1px solid #ccc; padding:4px; width:250px; margin-left:10px;">

                <label style="margin-left: 40px;">Expected Duration:</label>
                <input type="text" name="duration" style="border:1px solid #ccc; padding:4px; width:200px;">
            </div>

            <div style="margin-bottom: 20px;">
                <label>Chairperson:</label>
                <input type="text" name="chairperson" style="border:1px solid #ccc; padding:4px; width:250px; margin-left:10px;">

                <label style="margin-left: 40px;">Recorder:</label>
                <input type="text" name="recorder" style="border:1px solid #ccc; padding:4px; width:250px;">
            </div>

            <h3>Attendees</h3>

            <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                <tbody>
                    @foreach(range(1, 10) as $i)
                    <tr>
                        <td style="padding: 6px; width:40px;">{{ $i }}.</td>
                        <td style="padding: 6px;">
                            <input type="text"
                                name="attendees[{{ $i }}]"
                                style="width: 95%; border:1px solid #ccc; padding:4px;">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <p>Dear Team,</p>

            <p>You are cordially invited to attend the upcoming <strong>Management Review Meeting</strong>.
                This meeting is conducted as part of our quality management and continuous improvement processes
                to ensure that our system remains effective and aligned with the organization’s strategic direction.</p>

            <h2 style="margin-top: 30px;">AGENDA ITEMS</h2>

            <ol style="margin-left: 20px;">
                @foreach([
                "Opening Remarks and Objectives of the meeting – (Chairperson)",
                "Review of Previous MR meeting minutes & status of action items",
                "Quality objectives and their achievements",
                "Audit Results (Internal / external)",
                "External & Internal Quality Control (EQAS / ILC / IQC)",
                "Quality Indicators",
                "Non-conformities, CAPA status",
                "Resource adequacy (staff, infrastructure)",
                "Training and competency",
                "Customer feedback and complaints",
                "Supplier performance",
                "Employee Feedback",
                "Recommendations for improvement from HOD’s",
                "Review of employees’ suggestions for improvement",
                "Review of Risk & Opportunities",
                "Changes in external/internal issues (legal, clinical ops, etc.)",
                "Define, plan and allocate resources on action items for improvement",
                "Any other Business (AOB)",
                "Conclusion and closing remarks",
                ] as $index => $item)
                <li style="margin-bottom: 6px;">
                    <input type="checkbox" name="agenda_completed[{{ $index }}]" style="margin-right:6px;">
                    {{ $item }}
                </li>
                @endforeach
            </ol>

            <p>Your participation is critical to ensure a comprehensive and effective review. Kindly prepare any
                relevant data or presentations, especially regarding performance indicators, improvement plans,
                and customer concerns.</p>

            <div style="margin-top: 20px;">
                <label>Please confirm your availability by:</label>
                <input type="date" name="confirmation_date" style="border:1px solid #ccc; padding:4px; margin-left:10px;">
            </div>

            <h3 style="margin-top: 30px;">Warm regards,</h3>

            <div style="margin-top: 10px;">
                <input type="text" name="sender_name" placeholder="Your Full Name"
                    style="border:1px solid #ccc; padding:4px; width:250px;"><br>

                <span>Executive Assistant to CMD</span><br>
                <span>TRUSTlab Diagnostics Pvt Ltd</span><br>

                <input type="text" name="contact_details" placeholder="Contact Details"
                    style="border:1px solid #ccc; padding:4px; width:250px; margin-top:5px;">
            </div>

        </div>

    </x-formTemplete>


    <x-formTemplete
        id="TDPL/MG/FOM-008"
        docNo="TDPL/MG/FOM-008"
        docName="MRM Attendance Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <div style="font-family: Arial, sans-serif; font-size:14px;">


            <table style="width:100%; border-collapse:collapse; margin-bottom:25px;">
                <tr>
                    <td style="width:20%; padding:8px;">
                        <label style="font-weight:600;">Meeting Date:</label>
                    </td>
                    <td style="padding:8px;">
                        <input type="date" name="meeting_date"
                            style="width:100%; padding:6px; border:1px solid #ccc;" />
                    </td>
                </tr>

                <tr>
                    <td style="padding:8px;">
                        <label style="font-weight:600;">Meeting Time:</label>
                    </td>
                    <td style="padding:8px;">
                        <input type="time" name="meeting_time"
                            style="width:100%; padding:6px; border:1px solid #ccc;" />
                    </td>
                </tr>

                <tr>
                    <td style="padding:8px;">
                        <label style="font-weight:600;">Venue:</label>
                    </td>
                    <td style="padding:8px;">
                        <input type="text" name="venue"
                            style="width:100%; padding:6px; border:1px solid #ccc;" />
                    </td>
                </tr>
            </table>

            <h3 style="margin-top:20px;">Attendees</h3>

            <table style="width:100%; border-collapse:collapse; margin-top:10px;">
                <thead>
                    <tr>
                        <th style="border:1px solid #000; padding:8px; width:6%;">S No.</th>
                        <th style="border:1px solid #000; padding:8px;">Name</th>
                        <th style="border:1px solid #000; padding:8px;">Department</th>
                        <th style="border:1px solid #000; padding:8px;">Designation</th>
                        <th style="border:1px solid #000; padding:8px;">Signature</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach(range(1, 10) as $i)
                    <tr>
                        <td style="border:1px solid #ccc; padding:8px; text-align:center;">
                            {{ $i }}
                        </td>

                        <td style="border:1px solid #ccc; padding:8px;">
                            <input type="text" name="attendees[{{ $i }}][name]"
                                style="width:100%; padding:6px; border:1px solid #ccc;">
                        </td>

                        <td style="border:1px solid #ccc; padding:8px;">
                            <input type="text" name="attendees[{{ $i }}][department]"
                                style="width:100%; padding:6px; border:1px solid #ccc;">
                        </td>

                        <td style="border:1px solid #ccc; padding:8px;">
                            <input type="text" name="attendees[{{ $i }}][designation]"
                                style="width:100%; padding:6px; border:1px solid #ccc;">
                        </td>

                        <td style="border:1px solid #ccc; padding:8px; text-align:center;">
                            <input type="text" name="attendees[{{ $i }}][signature]"
                                style="width:100%; padding:6px; border:1px solid #ccc;">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <h3 style="margin-top:20px;">Remarks / Notes (if any):</h3>

            <textarea name="remarks"
                style="width:100%; height:120px; padding:10px; border:1px solid #ccc; margin-top:10px;"></textarea>

        </div>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/MG/FOM-009"
        docNo="TDPL/MG/FOM-009"
        docName="Minutes of MRM"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <div style="background:#fff; padding:25px; border-radius:12px; font-family:Arial, sans-serif; font-size:14px;">

            <table style="width:100%; border-collapse:collapse; margin-bottom:25px;">
                <tr>
                    <td style="width:5%;">&nbsp;</td>
                    <td colspan="6" style="text-align:center; padding:10px;">
                        <strong style="font-size:18px;">MINUTES OF MRM</strong>
                    </td>
                </tr>

                <tr>
                    <td colspan="3" style="padding:8px; font-weight:600;">Present</td>
                    <td colspan="2" style="padding:8px; font-weight:600;">Absent (include reason)</td>
                    <td colspan="2" style="padding:8px; font-weight:600;">
                        Date:
                        <input type="date" name="date"
                            style="padding:6px; border:1px solid #ccc; width:100%; margin-top:5px;">
                    </td>
                </tr>

                <tr>
                    <!-- Present Members -->
                    <td colspan="3" style="padding:8px; vertical-align:top;">
                        @foreach(range(1, 6) as $i)
                        <input type="text" name="present[{{ $i }}]"
                            placeholder="Name {{ $i }}"
                            style="width:100%; padding:6px; border:1px solid #ccc; margin-bottom:6px;">
                        @endforeach
                    </td>

                    <!-- Absent Members -->
                    <td colspan="2" style="padding:8px; vertical-align:top;">
                        @foreach(range(1, 4) as $i)
                        <input type="text" name="absent[{{ $i }}][name]"
                            placeholder="Name"
                            style="width:48%; padding:6px; border:1px solid #ccc; margin-bottom:6px;">
                        <input type="text" name="absent[{{ $i }}][reason]"
                            placeholder="Reason"
                            style="width:48%; padding:6px; border:1px solid #ccc; margin-bottom:6px;">
                        <br>
                        @endforeach
                    </td>

                    <!-- Venue / Time -->
                    <td colspan="2" style="padding:8px;">
                        <label style="font-weight:600;">Venue:</label>
                        <input type="text" name="venue"
                            style="width:100%; padding:6px; border:1px solid #ccc; margin-bottom:10px;">

                        <label style="font-weight:600;">Start Time:</label>
                        <input type="time" name="start_time"
                            style="width:100%; padding:6px; border:1px solid #ccc; margin-bottom:10px;">

                        <label style="font-weight:600;">End Time:</label>
                        <input type="time" name="end_time"
                            style="width:100%; padding:6px; border:1px solid #ccc;">
                    </td>
                </tr>

                <!-- Agenda Header -->
                <tr>
                    <td style="border-top:1px solid #000; padding:8px; font-weight:600;">S. No.</td>
                    <td colspan="6" style="border-top:1px solid #000; padding:8px; font-weight:600;">Agenda</td>
                </tr>

                <!-- Section 1 -->
                <tr>
                    <td rowspan="7" style="padding:8px; font-weight:700; text-align:center;">1</td>
                    <td colspan="6" style="padding:8px; font-weight:700;">Review from Previous Meeting – Action Plan</td>
                </tr>

                <tr>
                    <td colspan="6" style="padding:8px; font-weight:700; font-style:italic;">
                        Action Plan & Responsibilities:
                    </td>
                </tr>

                <tr>
                    <td style="padding:6px;">Action</td>
                    <td colspan="2" style="padding:6px;">Responsible Person</td>
                    <td colspan="2" style="padding:6px;">Target Completion Date</td>
                    <td style="padding:6px;">Status</td>
                </tr>

                @foreach(range(1,4) as $i)
                <tr>
                    <td style="padding:6px;">
                        <input type="text" name="previous_actions[{{ $i }}][action]"
                            style="width:100%; padding:6px; border:1px solid #ccc;">
                    </td>
                    <td colspan="2" style="padding:6px;">
                        <input type="text" name="previous_actions[{{ $i }}][responsible]"
                            style="width:100%; padding:6px; border:1px solid #ccc;">
                    </td>
                    <td colspan="2" style="padding:6px;">
                        <input type="date" name="previous_actions[{{ $i }}][target]"
                            style="width:100%; padding:6px; border:1px solid #ccc;">
                    </td>
                    <td style="padding:6px;">
                        <input type="text" name="previous_actions[{{ $i }}][status]"
                            style="width:100%; padding:6px; border:1px solid #ccc;">
                    </td>
                </tr>
                @endforeach

                <!-- Section 2 -->
                <tr>
                    <td rowspan="9" style="padding:8px; font-weight:700; text-align:center;">2</td>
                    <td colspan="6" style="padding:8px; font-weight:700;">Present Meeting</td>
                </tr>

                <tr>
                    <td colspan="6" style="padding:8px; font-weight:700; font-style:italic;">
                        Summary of Discussions & Key Points:
                        <textarea name="summary"
                            style="width:100%; height:120px; padding:10px; border:1px solid #ccc; margin-top:10px;"></textarea>
                    </td>
                </tr>

                <tr>
                    <td colspan="6" style="padding:8px; font-weight:700; font-style:italic;">
                        Decisions Made:
                        <textarea name="decisions"
                            style="width:100%; height:120px; padding:10px; border:1px solid #ccc; margin-top:10px;"></textarea>
                    </td>
                </tr>

                <tr>
                    <td colspan="6" style="padding:8px; font-weight:700; font-style:italic;">
                        Action Plan & Responsibilities:
                    </td>
                </tr>

                <tr>
                    <td style="padding:6px;">Action</td>
                    <td colspan="2" style="padding:6px;">Responsible Person</td>
                    <td colspan="2" style="padding:6px;">Target Completion Date</td>
                    <td style="padding:6px;">Status</td>
                </tr>

                @foreach(range(1,4) as $i)
                <tr>
                    <td style="padding:6px;">
                        <input type="text" name="current_actions[{{ $i }}][action]"
                            style="width:100%; padding:6px; border:1px solid #ccc;">
                    </td>
                    <td colspan="2" style="padding:6px;">
                        <input type="text" name="current_actions[{{ $i }}][responsible]"
                            style="width:100%; padding:6px; border:1px solid #ccc;">
                    </td>
                    <td colspan="2" style="padding:6px;">
                        <input type="date" name="current_actions[{{ $i }}][target]"
                            style="width:100%; padding:6px; border:1px solid #ccc;">
                    </td>
                    <td style="padding:6px;">
                        <input type="text" name="current_actions[{{ $i }}][status]"
                            style="width:100%; padding:6px; border:1px solid #ccc;">
                    </td>
                </tr>
                @endforeach

            </table>

            <!-- Conclusion -->
            <h2 style="margin-top:25px;">Conclusion</h2>

            <p style="margin:10px 0;">
                Overall Performance:
                <label><input type="checkbox" name="performance" value="Satisfactory"> Satisfactory</label>
                &nbsp;&nbsp;&nbsp;
                <label><input type="checkbox" name="performance" value="Needs Improvement"> Needs Improvement</label>
            </p>

            <p>Additional remarks:</p>
            <textarea name="remarks"
                style="width:100%; height:120px; padding:10px; border:1px solid #ccc;"></textarea>

            <p style="margin-top:15px;">
                Next review scheduled on:
                <input type="date" name="next_review"
                    style="padding:6px; border:1px solid #ccc;">
            </p>

            <!-- Signatures -->
            <h2 style="margin-top:25px;">Signatures</h2>

            <p>
                <strong>Chairperson:</strong>
                <input type="text" name="chairperson"
                    style="padding:6px; border:1px solid #ccc; width:250px;">
                &nbsp;&nbsp;
                Date:
                <input type="date" name="chairperson_date"
                    style="padding:6px; border:1px solid #ccc;">
            </p>

            <p>
                <strong>Recorder:</strong>
                <input type="text" name="recorder"
                    style="padding:6px; border:1px solid #ccc; width:250px;">
                &nbsp;&nbsp;
                Date:
                <input type="date" name="recorder_date"
                    style="padding:6px; border:1px solid #ccc;">
            </p>

        </div>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MG/FOM-010"
        docNo="TDPL/MG/FOM-010"
        docName="MRM Task Completion & Compliance"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <div style="background:#fff; padding:25px; border-radius:12px; font-family:Arial, sans-serif; font-size:14px;">

            <table style="width:100%; border-collapse:collapse; margin-bottom:25px;">
                <tr>
                    <td colspan="6" style="text-align:center; padding:10px; font-size:18px;">
                        <strong>MRM TASK COMPLETION & COMPLIANCE</strong>
                    </td>
                </tr>

                <tr>
                    <td colspan="6" style="padding:8px; font-weight:700; font-style:italic;">
                        Actions & Status
                    </td>
                </tr>

                <tr>
                    <td style="padding:6px; font-weight:600;">Action</td>
                    <td style="padding:6px; font-weight:600;">Responsible Person</td>
                    <td style="padding:6px; font-weight:600;">Target Completion Date</td>
                    <td style="padding:6px; font-weight:600;">Status</td>
                    <td style="padding:6px; font-weight:600;">Completed On</td>
                    <td style="padding:6px; font-weight:600;">Compliance</td>
                </tr>

                @foreach(range(1,8) as $i)
                <tr>
                    <td style="padding:6px;">
                        <input type="text" name="tasks[{{ $i }}][action]"
                            style="width:100%; padding:6px; border:1px solid #ccc;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="tasks[{{ $i }}][responsible]"
                            style="width:100%; padding:6px; border:1px solid #ccc;">
                    </td>

                    <td style="padding:6px;">
                        <input type="date" name="tasks[{{ $i }}][target_date]"
                            style="width:100%; padding:6px; border:1px solid #ccc;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="tasks[{{ $i }}][status]"
                            style="width:100%; padding:6px; border:1px solid #ccc;">
                    </td>

                    <td style="padding:6px;">
                        <input type="date" name="tasks[{{ $i }}][completed_on]"
                            style="width:100%; padding:6px; border:1px solid #ccc;">
                    </td>

                    <td style="padding:6px;">
                        <select name="tasks[{{ $i }}][compliance]"
                            style="width:100%; padding:6px; border:1px solid #ccc;">
                            <option value="">Select</option>
                            <option value="Compliant">Compliant</option>
                            <option value="Non-Compliant">Non-Compliant</option>
                            <option value="Pending">Pending</option>
                        </select>
                    </td>
                </tr>
                @endforeach
            </table>

            <!-- Observations -->
            <h2 style="margin-top:20px;">Observations</h2>

            <p style="margin:10px 0;">
                Overall Performance:
                <label><input type="checkbox" name="performance" value="Satisfactory"> Satisfactory</label>
                &nbsp;&nbsp;&nbsp;
                <label><input type="checkbox" name="performance" value="Needs Improvement"> Needs Improvement</label>
            </p>

            <p>Additional remarks:</p>
            <textarea name="remarks"
                style="width:100%; height:120px; padding:10px; border:1px solid #ccc;"></textarea>

            <p style="margin-top:15px;">
                Next review scheduled on:
                <input type="date" name="next_review"
                    style="padding:6px; border:1px solid #ccc;">
            </p>

            <!-- Signatures -->
            <h2 style="margin-top:25px;">Signatures</h2>

            <p>
                <strong>Chairperson:</strong>
                <input type="text" name="chairperson"
                    style="padding:6px; border:1px solid #ccc; width:250px;">
                &nbsp;&nbsp;
                Date:
                <input type="date" name="chairperson_date"
                    style="padding:6px; border:1px solid #ccc;">
            </p>

            <p>
                <strong>Recorder:</strong>
                <input type="text" name="recorder"
                    style="padding:6px; border:1px solid #ccc; width:250px;">
                &nbsp;&nbsp;
                Date:
                <input type="date" name="recorder_date"
                    style="padding:6px; border:1px solid #ccc;">
            </p>

        </div>

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