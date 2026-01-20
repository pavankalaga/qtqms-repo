@extends('layouts.base')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QA</title>
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
            <div style="font-size: 20px; ">QA </div>

        </div>
        <div class="icon-view">
            <div class="pc-content">
                <div class="pc-folder" onclick="showSection('TDPL/QA/FOM-001')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Document Change Request Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/QA/FOM-004')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">List of Internal Auditors</span>
                </div>

                <div class="pc-folder" onclick="showSection('TDPL/QA/FOM-013')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label"> Annual IQ Audit Plan</span>
                </div>

                <div class="pc-folder" onclick="showSection('TDPL/QA/FOM-017')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Authorized Specimen-Signatures Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/QA/FOM-018')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Authorized Signatory List</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/QA/FOM-019')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Vaccination Procurement & Traceability Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/QA/REC-0##')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Employee Vaccination Records</span>
                </div>
            </div>
        </div>
    </div>


    <x-formTemplete
        id="TDPL/QA/FOM-001"
        docNo="TDPL/QA/FOM-001"
        docName="Document Change Request Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <table style="width:100%; border-collapse: collapse;" border="1">
            <tbody>

                <!-- TITLE -->
                <tr>
                    <td colspan="7" style="text-align:center; padding:8px; font-weight:bold;">
                        DOCUMENT CHANGE REQUEST
                    </td>
                </tr>

                <!-- NAME & DEPT -->
                <tr>
                    <td colspan="4" style="padding:6px; font-weight:bold;">
                        Name and Designation of the person requesting the change:
                        <br>
                        <input type="text" name="requester_name" style="width:100%; padding:4px;">
                    </td>

                    <td colspan="3" style="padding:6px;">
                        Department:
                        <br>
                        <input type="text" name="department" style="width:100%; padding:4px;">
                    </td>
                </tr>

                <!-- DOCUMENT TYPE + DOCUMENT DETAILS -->
                <tr>
                    <td colspan="4" style="padding:6px; font-weight:bold;">
                        Document Type requiring change (✔):
                    </td>
                    <td colspan="3" rowspan="6" style="padding:6px;">
                        Document Name:
                        <br><input type="text" name="document_name" style="width:100%; padding:4px;">

                        <br><br>Document No.:
                        <br><input type="text" name="document_no" style="width:100%; padding:4px;">

                        <br><br>Page No.:
                        <br><input type="text" name="page_no" style="width:100%; padding:4px;">

                        <br><br>Clause/Entry No.:
                        <br><input type="text" name="clause_no" style="width:100%; padding:4px;">
                    </td>
                </tr>

                <!-- DOCUMENT TYPE LOOP -->
                @foreach([
                'Management System Procedures',
                'Quality Manual',
                'Standard Operating Procedure',
                'Work Instruction',
                'Form / Record / Register'
                ] as $type)

                <tr>
                    <td colspan="2" style="padding:6px;">
                        {{ $type }}
                    </td>
                    <td colspan="2" style="padding:6px; text-align:center;">
                        <input type="checkbox" name="document_types[]" value="{{ $type }}">
                    </td>
                </tr>

                @endforeach

                <!-- NATURE OF CHANGE -->
                <tr>
                    <td colspan="7" style="padding:6px; font-weight:bold;">
                        Nature of Change Requested:
                        <textarea name="nature_of_change" style="width:100%; height:120px; padding:6px;"></textarea>
                    </td>
                </tr>

                <!-- REASONS -->
                <tr>
                    <td colspan="7" style="padding:6px; font-weight:bold;">
                        Reason/s for Change:
                        <textarea name="reason_for_change" style="width:100%; height:120px; padding:6px;"></textarea>
                    </td>
                </tr>

                <!-- PARTICULARS HEADER -->
                <tr>
                    <td colspan="3" style="padding:6px; font-weight:bold;">Particulars</td>
                    <td colspan="3" style="padding:6px; font-weight:bold;">Date</td>
                    <td style="padding:6px; font-weight:bold;">Signature</td>
                </tr>

                <!-- PARTICULARS ROWS -->
                @foreach([
                'Request Approved / Rejected (✔)',
                'Approved By'
                ] as $label)

                <tr>
                    <td colspan="3" style="padding:6px;">
                        {{ $label }}
                        <br>
                        @if($label === 'Request Approved / Rejected (✔)')
                        <label><input type="radio" name="request_status" value="Approved"> Approved</label>
                        &nbsp;&nbsp;
                        <label><input type="radio" name="request_status" value="Rejected"> Rejected</label>
                        @else
                        <input type="text" name="approved_by" style="width:90%; padding:4px;">
                        @endif
                    </td>

                    <td colspan="3" style="padding:6px;">
                        <input type="date" name="{{ Str::slug($label) }}_date" style="width:100%; padding:4px;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="{{ Str::slug($label) }}_signature" style="width:100%; padding:4px;">
                    </td>
                </tr>

                @endforeach

                <!-- CURRENT / NEW VERSION -->
                <tr>
                    <td colspan="7" style="padding:6px;">
                        Current Version No & Date:
                        <input type="text" name="current_version" style="width:50%; padding:4px;">
                    </td>
                </tr>

                <tr>
                    <td colspan="7" style="padding:6px;">
                        New Version No & Date:
                        <input type="text" name="new_version" style="width:50%; padding:4px;">
                    </td>
                </tr>

                <!-- OTHER CHANGES -->
                <tr>
                    <td colspan="7" style="padding:6px; font-weight:bold;">
                        Other changes needed after approval:
                    </td>
                </tr>

                <!-- BULLET ITEMS -->
                @foreach([
                'Change the Version No. & Date and No. of Pages of the changed or amended section.',
                'Update the Version No and No of Pages in Table of contents.',
                'Retain one old copy for reference along with this DCR and stamp it obsolete.',
                'Update in Amendment Record Sheet and get approval from QM / HOD.',
                'Retrieve old copy of procedure and insert the new copy in Departmental Manual and / or QMS.'
                ] as $index => $change)

                <tr>
                    <td colspan="{{ $index < 3 ? 3 : 4 }}" style="padding:6px;">
                        <input type="checkbox" name="followup_changes[]" value="{{ $change }}">
                        {{ $change }}
                    </td>

                    @if($index == 0)
                    <td colspan="4"></td>
                    @elseif($index == 1)
                    <td colspan="4"></td>
                    @elseif($index == 2)
                    <td colspan="2"></td>
                    @elseif($index >= 3)
                    <td colspan="3"></td>
                    @endif

                </tr>

                @endforeach

            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/QA/FOM-004"
        docNo="TDPL/QA/FOM-004"
        docName="List of Internal Auditors"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <table border="1" style="width:100%; border-collapse:collapse; text-align:left;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">S. No.</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Name of the Auditor and Designation</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Qualification</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Affiliation (Internal/External)</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Training status (ISO 15189)</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Training organization & duration</th>
                </tr>
            </thead>

            <tbody>
                @foreach([
                [
                'name' => 'Dr. Anusha K',
                'designation' => 'HoD Biochemistry',
                'qualification' => 'MD Biochemistry',
                'affiliation' => 'Internal',
                'training' => 'Trained on ISO 15189:2022',
                'details' => 'ISQM'
                ],
                [
                'name' => 'Dr. Sai Varun K',
                'designation' => 'Quality Manager',
                'qualification' => 'Ph.D. Biochemistry',
                'affiliation' => 'Internal',
                'training' => 'Trained on ISO 15189:2022',
                'details' => 'FQI'
                ],
                [
                'name' => 'Mr. Apparao P',
                'designation' => 'Lab Manager',
                'qualification' => 'M.Sc. Medical Biochemistry',
                'affiliation' => 'Internal',
                'training' => 'Trained on ISO 15189:2022',
                'details' => 'FQI'
                ]
                ] as $index => $auditor)
                <tr>
                    <td style="padding:6px; width:50px; text-align:center;">
                        {{ $index + 1 }}
                    </td>

                    <td style="padding:6px;">
                        <input type="text"
                            name="auditors[{{ $index }}][name]"
                            placeholder="Auditor Name"
                            value="{{ $auditor['name'] }}"
                            disabled
                            style="width:100%; padding:4px; margin-bottom:4px;">

                        <input type="text"
                            name="auditors[{{ $index }}][designation]"
                            placeholder="Designation"
                            value="{{ $auditor['designation'] }}"
                            disabled
                            style="width:100%; padding:4px;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text"
                            name="auditors[{{ $index }}][qualification]"
                            disabled
                            value="{{ $auditor['qualification'] }}"
                            style="width:100%; padding:4px;">
                    </td>

                    <td style="padding:6px;">
                        <select disabled name="auditors[{{ $index }}][affiliation]"
                            style="width:100%; padding:4px;">
                            <option value="">Select</option>
                            <option value="Internal" {{ $auditor['affiliation'] === 'Internal' ? 'selected' : '' }}>Internal</option>
                            <option value="External" {{ $auditor['affiliation'] === 'External' ? 'selected' : '' }}>External</option>
                        </select>
                    </td>

                    <td style="padding:6px;">
                        <input type="text"
                            name="auditors[{{ $index }}][training]"
                            disabled
                            placeholder="Training status"
                            value="{{ $auditor['training'] }}"
                            style="width:100%; padding:4px;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text"
                            name="auditors[{{ $index }}][details]"
                            placeholder="Training organization & duration"
                            disabled
                            value="{{ $auditor['details'] }}"
                            style="width:100%; padding:4px;">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <p style="font-weight:bold; margin-top:20px;">Signatures:</p>

        <p>
            <strong>Prepared By:</strong>
            <input type="text" name="prepared_by" style="width:250px; padding:4px; margin-left:10px;">

            &nbsp;&nbsp;&nbsp;

            <strong>Approved By:</strong>
            <input type="text" name="approved_by" style="width:250px; padding:4px; margin-left:10px;">
        </p>

        <p>
            <strong>Quality Manager:</strong>
            <input type="text" name="quality_manager" style="width:250px; padding:4px; margin-left:10px;">

            &nbsp;&nbsp;&nbsp;

            <strong>Lab Director:</strong>
            <input type="text" name="lab_director" style="width:250px; padding:4px; margin-left:10px;">
        </p>


    </x-formTemplete>

    <x-formTemplete
        id="TDPL/QA/FOM-013"
        docNo="TDPL/QA/FOM-013"
        docName="Annual IQ Audit Plan"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">



        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Department</th>

                    @foreach([
                    'Nov 2024','Dec 2024','Jan 2025','Feb 2025','Mar 2025',
                    'Apr 2025','May 2025','June 2025','July 2025','Aug 2025',
                    'Sep 2025','Oct 2025','Nov 2025'
                    ] as $month)
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>{{ $month }}</strong>
                    </th>
                    @endforeach
                </tr>
            </thead>

            <tbody>
                @foreach([
                'Clinical Biochemistry',
                'Clinical Pathology',
                'Hematology',
                'Serology',
                'Molecular Biology',
                ] as $dept)
                <tr>
                    <td style="padding:6px;">{{ $dept }}</td>

                    @foreach([
                    'Nov 2024','Dec 2024','Jan 2025','Feb 2025','Mar 2025',
                    'Apr 2025','May 2025','June 2025','July 2025','Aug 2025',
                    'Sep 2025','Oct 2025','Nov 2025'
                    ] as $index => $month)
                    <td style="padding:6px; text-align:center;">
                        @if($index === 0)
                        {{-- First month completed --}}
                        <input type="text" value="✓" style="width:30px; text-align:center; border:none; font-weight:bold;">
                        @elseif($index === (count([
                        'Nov 2024','Dec 2024','Jan 2025','Feb 2025','Mar 2025',
                        'Apr 2025','May 2025','June 2025','July 2025','Aug 2025',
                        'Sep 2025','Oct 2025','Nov 2025'
                        ])-1))
                        {{-- Last month planned --}}
                        <input type="text" value="*" style="width:30px; text-align:center; border:none; font-weight:bold;">
                        @else
                        {{-- Empty input for editable fields --}}
                        <input type="text" style="width:30px; text-align:center; border:none;">
                        @endif
                    </td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>

        <p>
            <strong>✓</strong> - Completed;
            <strong>*</strong> - Planned
        </p>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/QA/FOM-017"
        docNo="TDPL/QA/FOM-017"
        docName=" Authorized Specimen-Signatures Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <p>
            <strong>Month/Year:</strong>
            <input type="text" name="month_year" style="width:150px; border:1px solid #000; margin-right:20px;">

            <strong>Location:</strong>
            <input type="text" name="location" style="width:150px; border:1px solid #000; margin-right:20px;">

            <strong>Department:</strong>
            <input type="text" name="department" style="width:150px; border:1px solid #000;">
        </p>
        <br>

        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>S. No.</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Employee Name</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Designation</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Full Signature</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Short Signature</strong></th>
                </tr>
            </thead>

            <tbody>
                @foreach(range(1, 15) as $i)
                <tr>
                    <td style="padding:6px; text-align:center;">
                        <input type="text" value="{{ $i }}" style="width:40px; border:none; text-align:center;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="employee_name[]" style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="designation[]" style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px; text-align:center;">
                        <input type="text" name="full_signature[]" style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px; text-align:center;">
                        <input type="text" name="short_signature[]" style="width:100%; border:none;">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


    </x-formTemplete>
    <x-formTemplete
        id="TDPL/QA/FOM-018"
        docNo="TDPL/QA/FOM-018"
        docName="Authorized Signatory List"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>S. No.</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Laboratory/ Department/ Section</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Name & Designation of Signatory</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Qualification with Specialization</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Experience (Years)</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Relevant Training</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Part time / Full time</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Authorized Area of Testing</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Specimen Signature</strong></th>
                </tr>
            </thead>

            <tbody>
                @foreach([
                ['id' => 1, 'dept' => 'Biochemistry'],
                ['id' => 2, 'dept' => 'Hematology & Clinical Pathology'],
                ['id' => 3, 'dept' => 'Histopathology'],
                ['id' => 4, 'dept' => 'Serology & Microbiology'],
                ['id' => 5, 'dept' => 'Molecular Biology'],
                ] as $row)
                <tr>
                    <td style="padding:6px; text-align:center;">
                        <input type="text" value="{{ $row['id'] }}" style="width:40px; border:none; text-align:center;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" value="{{ $row['dept'] }}" style="width:100%; border:none; font-weight:bold;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="signatory_name[]" style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="qualification[]" style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="experience[]" style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="training[]" style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px; text-align:center;">
                        <select name="worktype[]" style="width:100%; border:none;">
                            <option value=""></option>
                            <option value="Part Time">Part Time</option>
                            <option value="Full Time">Full Time</option>
                        </select>
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="authorized_area[]" style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="specimen_signature[]" style="width:100%; border:none;">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/QA/FOM-019"
        docNo="TDPL/QA/FOM-019"
        docName="Vaccination Procurement & Traceability Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Date of Purchase</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Name of Vaccine</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Vaccine Manufacturer Name</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Vaccine Purchased from (Supplier Name)</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Lot No.</strong></th>
                </tr>
            </thead>

            <tbody>
                @foreach(range(1, 15) as $i)
                <tr>
                    <td style="padding:4px;">
                        <input type="date" name="purchase_date[]" style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="vaccine_name[]" style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="manufacturer_name[]" style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="supplier_name[]" style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="lot_no[]" style="width:100%; border:none;">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/QA/REC-0##"
        docNo="TDPL/HR/FOM-036"
        docName="Employee Vaccination Records"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table border="1" style="width:100%; border-collapse:collapse; text-align:left;">
            <thead>
                <tr>
                    <td rowspan="3" style="padding:6px;"><strong>S.No</strong></td>
                    <td style="padding:6px;"><strong>&nbsp;</strong></td>
                    <td rowspan="3" style="padding:6px;"><strong>NAME OF THE STAFF</strong></td>
                    <td rowspan="3" style="padding:6px;"><strong>DEPARTMENT</strong></td>
                    <td rowspan="3" style="padding:6px;"><strong>DESIGNATION</strong></td>

                    <td colspan="11" style="padding:6px; text-align:center;"><strong>HEPATITIS B VACCINE</strong></td>

                    <td rowspan="3" style="padding:6px;"><strong>ANTI HBS TITRE (mIU/ml)</strong></td>
                    <td rowspan="3" style="padding:6px;"><strong>STATUS (Responder / Non-Responder / Hypo-Responder)</strong></td>
                    <td rowspan="3" style="padding:6px;"><strong>SIGNATURE OF MICROBIOLOGIST / ICO</strong></td>
                </tr>

                <tr>
                    <td style="padding:6px;"><strong>Emp ID</strong></td>

                    <td colspan="3" style="padding:6px; text-align:center;"><strong>I DOSE</strong></td>
                    <td colspan="5" style="padding:6px; text-align:center;"><strong>II DOSE</strong></td>
                    <td colspan="3" style="padding:6px; text-align:center;"><strong>III DOSE</strong></td>
                </tr>

                <tr>
                    <td style="padding:6px;"><strong>&nbsp;</strong></td>

                    <td style="padding:6px;"><strong>Due on</strong></td>
                    <td style="padding:6px;"><strong>Given on</strong></td>
                    <td style="padding:6px;"><strong>Lot No</strong></td>

                    <td style="padding:6px;"><strong>Due on</strong></td>
                    <td colspan="2" style="padding:6px;"><strong>Given on</strong></td>
                    <td colspan="2" style="padding:6px;"><strong>Lot No</strong></td>

                    <td style="padding:6px;"><strong>Due on</strong></td>
                    <td style="padding:6px;"><strong>Given on</strong></td>
                    <td style="padding:6px;"><strong>Lot No</strong></td>
                </tr>
            </thead>

            <tbody>

                @foreach(range(1,7) as $i)
                <tr>
                    <td style="padding:6px;"><strong>{{ $i }}</strong></td>

                    <!-- Emp ID -->
                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][emp_id]" style="width:100%; border:none;">
                    </td>

                    <!-- Name of Staff -->
                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][name]" style="width:100%; border:none;">
                    </td>

                    <!-- Department -->
                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][department]" style="width:100%; border:none;">
                    </td>

                    <!-- Designation -->
                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][designation]" style="width:100%; border:none;">
                    </td>

                    <!-- I Dose -->
                    <td style="padding:6px;"><input type="date" name="rows[{{ $i }}][dose1_due]" style="width:100%; border:none;"></td>
                    <td style="padding:6px;"><input type="date" name="rows[{{ $i }}][dose1_given]" style="width:100%; border:none;"></td>
                    <td style="padding:6px;"><input type="text" name="rows[{{ $i }}][dose1_lot]" style="width:100%; border:none;"></td>

                    <!-- II Dose -->
                    <td style="padding:6px;"><input type="date" name="rows[{{ $i }}][dose2_due]" style="width:100%; border:none;"></td>
                    <td colspan="2" style="padding:6px;">
                        <input type="date" name="rows[{{ $i }}][dose2_given]" style="width:100%; border:none;">
                    </td>
                    <td colspan="2" style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][dose2_lot]" style="width:100%; border:none;">
                    </td>

                    <!-- III Dose -->
                    <td style="padding:6px;"><input type="date" name="rows[{{ $i }}][dose3_due]" style="width:100%; border:none;"></td>
                    <td style="padding:6px;"><input type="date" name="rows[{{ $i }}][dose3_given]" style="width:100%; border:none;"></td>
                    <td style="padding:6px;"><input type="text" name="rows[{{ $i }}][dose3_lot]" style="width:100%; border:none;"></td>

                    <!-- Anti HBs Titre -->
                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][titre]" style="width:100%; border:none;">
                    </td>

                    <!-- Status -->
                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][status]" style="width:100%; border:none;">
                    </td>

                    <!-- Signature -->
                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][signature]" style="width:100%; border:none;">
                    </td>
                </tr>
                @endforeach

                <!-- Notes Section -->
                <tr>
                    <td colspan="19" style="padding:6px;">* Minimum Interval between 1 and 2 dose should be 4 weeks</td>
                </tr>
                <tr>
                    <td colspan="19" style="padding:6px;">* Minimum Interval between 2 and 3 dose should be __ weeks</td>
                </tr>
                <tr>
                    <td colspan="19" style="padding:6px;">* Anti HBs titre to be checked 8 weeks after the third dose</td>
                </tr>
                <tr>
                    <td colspan="19" style="padding:6px;">* Responder – Anti HBs titre > 100 mIU/ml</td>
                </tr>
                <tr>
                    <td colspan="19" style="padding:6px;">* Hypo Responder – Anti HBs titre 10 - 100 mIU/ml</td>
                </tr>
                <tr>
                    <td colspan="19" style="padding:6px;">* Non-Responder – Anti HBs titre < 10 mIU/ml</td>
                </tr>
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