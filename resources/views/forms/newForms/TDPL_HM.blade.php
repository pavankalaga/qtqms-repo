@extends('layouts.base')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HM</title>
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
            <div style="font-size: 20px; ">HM </div>

        </div>
        <div class="icon-view">
            <div class="pc-content">
                <div class="pc-folder" onclick="showSection('TDPL/HM/FOM-001')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Coagulation MNPT Form.</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HM/FOM-002')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">ABO & Rh Typing QC Form</span>
                </div>

                <div class="pc-folder" onclick="showSection('TDPL/HM/FOM-003')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Titration of Antibody Reagent in Blood Grouping</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HM/FOM-004')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Avidity of Antibody Reagent in Blood Grouping</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HM/FOM-005')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Bone Marrow Examination Requisition Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HM/FOM-006')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Coagulation Requisition Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HM/REG-001')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">PT APTT Results Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HM/REG-002')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Leishman Stain QC Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HM/REG-003')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label"> ABO & Rh Typing Result Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HM/REG-004')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">ICT DCT Malaria Result Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HM/REG-005')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Erythrocyte Sedimentation Rate (ESR) Results Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HM/REG-006')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Body Fluids Examination Results Register</span>
                </div>




            </div>
        </div>
    </div>


    <x-formTemplete
        id="TDPL/HM/FOM-001"
        docNo="TDPL/HM/FOM-001"
        docName="Coagulation MNPT Form."
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <div style="margin-bottom:20px;">
            <strong>Location:</strong> <input type="text" name="location" style="width:200px;">
            <strong>Instrument Name:</strong> <input type="text" name="instrument_name" style="width:200px;">
            <strong>Instrument ID:</strong> <input type="text" name="instrument_id" style="width:150px;">
        </div>

        <table style="width:100%; border-collapse:collapse;" border="1">
            <tr>
                <td style="padding:6px;"><strong>S. No</strong></td>
                <td colspan="2" style="padding:6px;"><strong>Name</strong></td>
                <td style="padding:6px;"><strong>PT</strong></td>
                <td style="padding:6px;"><strong>APTT</strong></td>
            </tr>

            @for($i = 1; $i <= 20; $i++)
                <tr>
                <td style="padding:6px;"><strong>{{ $i }}</strong></td>
                <td colspan="2" style="padding:6px;">
                    <input type="text" name="rows[{{ $i }}][name]" style="width:100%;">
                </td>
                <td style="padding:6px;">
                    <input type="text" name="rows[{{ $i }}][pt]" style="width:100%;">
                </td>
                <td style="padding:6px;">
                    <input type="text" name="rows[{{ $i }}][aptt]" style="width:100%;">
                </td>
                </tr>
                @endfor

                <tr>
                    <td></td>
                    <td colspan="2" style="padding:6px;">Geometric Mean</td>
                    <td><input type="text" name="geo_mean_pt" style="width:100%;"></td>
                    <td><input type="text" name="geo_mean_aptt" style="width:100%;"></td>
                </tr>

                <tr>
                    <td></td>
                    <td colspan="2" style="padding:6px;">Arithmetic Mean</td>
                    <td><input type="text" name="arith_mean_pt" style="width:100%;"></td>
                    <td><input type="text" name="arith_mean_aptt" style="width:100%;"></td>
                </tr>

                <tr>
                    <td></td>
                    <td colspan="2" style="padding:6px;">SD</td>
                    <td><input type="text" name="sd_pt" style="width:100%;"></td>
                    <td><input type="text" name="sd_aptt" style="width:100%;"></td>
                </tr>

                <tr>
                    <td></td>
                    <td colspan="2" style="padding:6px;">Mean + 2SD</td>
                    <td><input type="text" name="mean2sd_pt" style="width:100%;"></td>
                    <td><input type="text" name="mean2sd_aptt" style="width:100%;"></td>
                </tr>

                <tr>
                    <td></td>
                    <td colspan="2" style="padding:6px;">Mean - 2SD</td>
                    <td><input type="text" name="mean_minus_2sd_pt" style="width:100%;"></td>
                    <td><input type="text" name="mean_minus_2sd_aptt" style="width:100%;"></td>
                </tr>

                <tr>
                    <td></td>
                    <td colspan="2" style="padding:6px;">CV%</td>
                    <td><input type="text" name="cv_pt" style="width:100%;"></td>
                    <td><input type="text" name="cv_aptt" style="width:100%;"></td>
                </tr>

                <!-- PT Section -->
                <tr>
                    <td rowspan="3" style="padding:6px;"><strong>PT</strong></td>
                    <td style="padding:6px;">Lot #</td>
                    <td colspan="3">
                        <input type="text" name="pt_lot" style="width:100%;">
                    </td>
                </tr>
                <tr>
                    <td style="padding:6px;">Expiry Date</td>
                    <td colspan="3">
                        <input type="date" name="pt_expiry" style="width:100%;">
                    </td>
                </tr>
                <tr>
                    <td style="padding:6px;">Performed Date</td>
                    <td colspan="3">
                        <input type="date" name="pt_performed" style="width:100%;">
                    </td>
                </tr>

                <!-- APTT Section -->
                <tr>
                    <td rowspan="3" style="padding:6px;"><strong>APTT</strong></td>
                    <td style="padding:6px;">Lot #</td>
                    <td colspan="3">
                        <input type="text" name="aptt_lot" style="width:100%;">
                    </td>
                </tr>
                <tr>
                    <td style="padding:6px;">Expiry Date</td>
                    <td colspan="3">
                        <input type="date" name="aptt_expiry" style="width:100%;">
                    </td>
                </tr>
                <tr>
                    <td style="padding:6px;">Performed Date</td>
                    <td colspan="3">
                        <input type="date" name="aptt_performed" style="width:100%;">
                    </td>
                </tr>
        </table>

        <div style="margin-top:20px;">
            <strong>Performed By:</strong>
            <input type="text" name="performed_by" style="width:200px;">

            <strong>Verified By:</strong>
            <input type="text" name="verified_by" style="width:200px;">
        </div>


    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HM/FOM-002"
        docNo="TDPL/HM/FOM-002"
        docName="ABO & Rh Typing QC Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <table style="width:100%; border-collapse: collapse;" border="1">
            <thead>
                <tr>
                    <td rowspan="2" style="padding:4px; text-align:center;">Date</td>

                    @foreach (['Anti-A','Anti-B','Anti-D IgM','Anti-D IgG','Anti-A1','Anti-H'] as $group)
                    <td colspan="4" style="padding:4px; text-align:center; font-weight:bold;">{{ $group }}</td>
                    @endforeach

                    <td rowspan="2" style="padding:4px; text-align:center;">Done By</td>
                    <td rowspan="2" style="padding:4px; text-align:center;">Verified By</td>
                    <td rowspan="2" style="padding:4px; text-align:center;">Remarks</td>
                </tr>

                <tr>
                    @for ($i = 0; $i < 6; $i++)
                        @foreach (['Appearance','A','B','O'] as $label)
                        <td style="padding:4px; text-align:center; font-weight:bold;">{{ $label }}</td>
                        @endforeach
                        @endfor
                </tr>
            </thead>

            <tbody>
                @for ($row = 1; $row <= 10; $row++)
                    <tr>
                    <!-- DATE -->
                    <td style="padding:2px;">
                        <input type="date" name="rows[{{ $row }}][date]"
                            style="width:100%; border:0; padding:4px;" />
                    </td>

                    <!-- 6 Groups × 4 Columns = 24 inputs -->
                    @for ($g = 1; $g <= 6; $g++)
                        @foreach (['appearance','a','b','o'] as $field)
                        <td style="padding:2px;">
                        <input type="text"
                            name="rows[{{ $row }}][group{{ $g }}][{{ $field }}]"
                            style="width:100%; border:0; padding:4px;" />
                        </td>
                        @endforeach
                        @endfor

                        <!-- Done By -->
                        <td style="padding:2px;">
                            <input type="text" name="rows[{{ $row }}][done_by]"
                                style="width:100%; border:0; padding:4px;" />
                        </td>

                        <!-- Verified By -->
                        <td style="padding:2px;">
                            <input type="text" name="rows[{{ $row }}][verified_by]"
                                style="width:100%; border:0; padding:4px;" />
                        </td>

                        <!-- Remarks -->
                        <td style="padding:2px;">
                            <input type="text" name="rows[{{ $row }}][remarks]"
                                style="width:100%; border:0; padding:4px;" />
                        </td>
                        </tr>
                        @endfor
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HM/FOM-003"
        docNo="TDPL/HM/FOM-003"
        docName="Titration of Antibody Reagent in Blood Grouping"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    @foreach ([
                    'DATE',
                    'Anti Body Reagent',
                    'Company',
                    'Lot Number',
                    'Expiry Date',
                    'Time',
                    'Performed By',
                    'Reviewed By',
                    'Remarks'
                    ] as $header)
                    <td style="padding:6px; text-align:center; font-weight:bold;">
                        {{ $header }}
                    </td>
                    @endforeach
                </tr>
            </thead>

            <tbody>
                @for ($row = 1; $row <= 18; $row++)
                    <tr>
                    <!-- DATE -->
                    <td style="padding:4px;">
                        <input type="date"
                            name="rows[{{ $row }}][date]"
                            style="width:100%; border:0; padding:4px;">
                    </td>

                    <!-- TEXT INPUT COLUMNS -->
                    @foreach ([
                    'reagent',
                    'company',
                    'lot_number',
                    'expiry_date',
                    'time',
                    'performed_by',
                    'reviewed_by',
                    'remarks'
                    ] as $field)
                    <td style="padding:4px;">
                        <input type="text"
                            name="rows[{{ $row }}][{{ $field }}]"
                            style="width:100%; border:0; padding:4px;">
                    </td>
                    @endforeach
                    </tr>
                    @endfor
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HM/FOM-004"
        docNo="TDPL/HM/FOM-004"
        docName="Avidity of Antibody Reagent in Blood Grouping"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    @foreach ([
                    'DATE',
                    'Anti Body Reagent',
                    'Company',
                    'Lot Number',
                    'Expiry Date',
                    'Time',
                    'Performed By',
                    'Reviewed By',
                    'Remarks'
                    ] as $header)
                    <td style="padding:6px; text-align:center; font-weight:bold;">
                        {{ $header }}
                    </td>
                    @endforeach
                </tr>
            </thead>

            <tbody>
                @for ($row = 1; $row <= 18; $row++)
                    <tr>
                    <!-- DATE -->
                    <td style="padding:4px;">
                        <input type="date"
                            name="rows[{{ $row }}][date]"
                            style="width:100%; border:0; padding:4px;">
                    </td>

                    <!-- TEXT INPUT COLUMNS -->
                    @foreach ([
                    'reagent',
                    'company',
                    'lot_number',
                    'expiry_date',
                    'time',
                    'performed_by',
                    'reviewed_by',
                    'remarks'
                    ] as $field)
                    <td style="padding:4px;">
                        <input type="text"
                            name="rows[{{ $row }}][{{ $field }}]"
                            style="width:100%; border:0; padding:4px;">
                    </td>
                    @endforeach
                    </tr>
                    @endfor
            </tbody>
        </table>
    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HM/FOM-005"
        docNo="TDPL/HM/FOM-005"
        docName="Bone Marrow Examination Requisition Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <div style="    width:100%;font-size:14px;background:#fff;padding:25px;border-radius:12px;border:1px solid #ddd;">

            <h3 style="text-align:center; margin-bottom:20px;">
                <strong>BONE MARROW EXAMINATION REQUISITION FORM</strong>
            </h3>

            <!-- TOP FIELDS -->
            @foreach ([
            ['Patient Name', 'Lab Number'],
            ['Age & Sex', 'Date'],
            ['Ref. Doctor', 'Time'],
            ['Client Name', 'Mobile No.'],
            ['Client Code', ''],
            ] as $row)
            <div style="display:flex; margin-bottom:8px; gap:20px;">
                <div style="flex:1;">
                    <label>{{ $row[0] }}:</label>
                    <input type="text"
                        name="{{ \Str::snake(str_replace(' ', '_', strtolower($row[0]))) }}"
                        style="width:100%; border:1px solid #000; padding:4px;">
                </div>

                @if($row[1] != '')
                <div style="flex:1;">
                    <label>{{ $row[1] }}:</label>
                    <input type="text"
                        name="{{ \Str::snake(str_replace(' ', '_', strtolower($row[1]))) }}"
                        style="width:100%; border:1px solid #000; padding:4px;">
                </div>
                @endif
            </div>
            @endforeach

            <!-- CLINICAL HISTORY -->
            <div style="margin:15px 0;">
                <label>Relevant Clinical History:</label>
                <textarea name="clinical_history"
                    rows="4"
                    style="width:100%; border:1px solid #000; padding:6px;"></textarea>
            </div>

            <!-- CBC FIELDS -->
            @foreach ([
            'Hemoglobin',
            'RBC count',
            'MCV',
            'RDW',
            'Total leukocyte count',
            'Differential leukocyte count',
            'Platelet count'
            ] as $cbcField)
            <div style="margin-bottom:8px;">
                <label>{{ $cbcField }}:</label>
                <input type="text"
                    name="{{ \Str::snake(str_replace(' ', '_', strtolower($cbcField))) }}"
                    style="width:100%; border:1px solid #000; padding:4px;">
            </div>
            @endforeach

            <!-- PERIPHERAL SMEAR -->
            <div style="margin:15px 0;">
                <label>Peripheral Smear Findings:</label>
                <textarea name="peripheral_smear_findings"
                    rows="4"
                    style="width:100%; border:1px solid #000; padding:6px;"></textarea>
            </div>

            <!-- NOTE -->
            <p><strong>Note:</strong></p>
            <p>Above details are essential for evaluation of bone marrow specimens.</p>
            <p><strong>Kindly fix aspirate slide in Methanol prior to dispatch.</strong></p>

        </div>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HM/FOM-006"
        docNo="TDPL/HM/FOM-006"
        docName="Coagulation Requisition Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <div style="    width:100%;background:#fff;padding:25px;border-radius:12px;border:1px solid #ccc;font-size:14px;line-height:1.6;">

            <h2 style="text-align:center; margin-bottom:20px;">
                <strong>COAGULATION REQUISITION FORM</strong>
            </h2>

            <!-- First Row -->
            <div style="display:flex; gap:20px; margin-bottom:12px;">
                <div style="flex:1;">
                    <label>Lab No.:</label>
                    <input type="text" name="lab_no"
                        style="width:100%; border:1px solid #777; padding:6px; border-radius:8px;">
                </div>
                <div style="flex:1;">
                    <label>Date:</label>
                    <input type="date" name="date"
                        style="width:100%; border:1px solid #777; padding:6px; border-radius:8px;">
                </div>
            </div>

            <!-- Specimen -->
            <div style="margin-bottom:12px;">
                <label>Type of specimen:</label>

                @foreach (['Fasting', 'Non-fasting'] as $option)
                <label style="margin-right:15px; margin-left:10px;">
                    <input type="radio" name="specimen_type" value="{{ $option }}"> {{ $option }}
                </label>
                @endforeach

                <div style="margin-top:8px;">
                    <label>Time of specimen:</label>
                    <input type="text" name="specimen_time"
                        style="width:50%; border:1px solid #777; padding:6px; border-radius:8px;">
                </div>
            </div>

            <!-- Name / Age / Sex -->
            <div style="margin-bottom:12px;">
                <div style="margin-bottom:8px;">
                    <label>Name:</label>
                    <input type="text" name="patient_name"
                        style="width:100%; border:1px solid #777; padding:6px; border-radius:8px;">
                </div>

                <div style="display:flex; gap:20px; margin-bottom:8px;">
                    <div style="flex:1;">
                        <label>Age:</label>
                        <input type="text" name="age"
                            style="width:100%; border:1px solid #777; padding:6px; border-radius:8px;">
                    </div>

                    <div style="flex:1;">
                        <label>Sex:</label>
                        @foreach (['Male', 'Female'] as $sex)
                        <label style="margin-right:15px; margin-left:10px;">
                            <input type="radio" name="sex" value="{{ $sex }}"> {{ $sex }}
                        </label>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Contact -->
            <div style="margin-bottom:12px;">
                <label>Tel No. Patient:</label>
                <input type="text" name="tel_patient"
                    style="width:100%; border:1px solid #777; padding:6px; border-radius:8px; margin-bottom:10px;">

                <label>Tel No. Physician:</label>
                <input type="text" name="tel_physician"
                    style="width:100%; border:1px solid #777; padding:6px; border-radius:8px;">
            </div>

            <!-- Clinical History -->
            <h3 style="margin-top:20px;"><strong>Clinical History:</strong></h3>

            @foreach ([
            'Bleeding Disorder',
            'Congenital (Bleeding)',
            'Acquired (Bleeding)',
            'Thrombotic Disorder',
            'Congenital (Thrombotic)',
            'Acquired (Thrombotic)',
            'History of blood transfusion / blood products'
            ] as $index => $label)
            <div style="margin-bottom:10px;">
                <label>{{ $label }}:</label>
                @foreach (['Yes', 'No'] as $option)
                <label style="margin-right:15px; margin-left:10px;">
                    <input type="radio"
                        name="clinical_{{ $index }}"
                        value="{{ $option }}"> {{ $option }}
                </label>
                @endforeach
            </div>
            @endforeach

            <!-- Transfusion Extra -->
            <div style="margin-bottom:20px;">
                <label>If yes, Date of Last Transfusion:</label>
                <input type="date" name="last_transfusion_date"
                    style="border:1px solid #777; padding:6px; border-radius:8px; margin-right:20px;">

                <label>Type:</label>
                <input type="text" name="transfusion_type"
                    style="border:1px solid #777; padding:6px; border-radius:8px;">
            </div>

            <!-- Lab Investigation History -->
            <h3><strong>History of Laboratory Investigations:</strong></h3>

            @foreach ([
            'Prothrombin Time',
            'APTT'
            ] as $i => $test)
            <div style="margin-bottom:10px;">
                <label>{{ $test }}:</label>
                @foreach (['Yes', 'No'] as $yn)
                <label style="margin-right:15px; margin-left:10px;">
                    <input type="radio" name="lab_{{ $i }}" value="{{ $yn }}"> {{ $yn }}
                </label>
                @endforeach
            </div>

            <div style="margin-bottom:15px;">
                <label>If yes: Last value:</label>
                <input type="text" name="lab_{{ $i }}_value"
                    style="border:1px solid #777; padding:6px; border-radius:8px; width:50%;">
            </div>
            @endforeach

            <!-- Liver Function -->
            <div style="margin-bottom:12px;">
                <label>Liver function test:</label>
                @foreach (['Normal', 'Abnormal'] as $lft)
                <label style="margin-right:15px; margin-left:10px;">
                    <input type="radio" name="liver_function" value="{{ $lft }}"> {{ $lft }}
                </label>
                @endforeach

                <input type="text" name="liver_function_note"
                    style="border:1px solid #777; padding:6px; border-radius:8px; margin-left:15px;">
            </div>

            <!-- Others -->
            <div style="margin-bottom:15px;">
                <label>Others specify:</label>
                <input type="text" name="others_specify"
                    style="width:100%; border:1px solid #777; padding:6px; border-radius:8px;">
            </div>

            <!-- Medication -->
            <h3><strong>History of Drug/Medication for Coagulation Disorder:</strong></h3>

            <div style="margin-bottom:12px;">
                <label>Current dose:</label>
                <input type="text" name="current_dose"
                    style="width:60%; border:1px solid #777; padding:6px; border-radius:8px; margin-left:15px;">
            </div>

            <div style="margin-bottom:20px;">
                <label>Date of last change in dose:</label>
                <input type="date" name="dose_change_date"
                    style="border:1px solid #777; padding:6px; border-radius:8px; margin-left:15px;">
            </div>

            <!-- Medications Loop -->
            @foreach ([
            'Warfarin / Acetrom',
            'Hirudin',
            'Coumarin',
            'Others (specify)'
            ] as $m => $drug)
            <div style="margin-bottom:10px;">
                <label>{{ $drug }}:</label>

                @foreach (['Yes','No'] as $yn)
                <label style="margin-right:15px; margin-left:10px;">
                    <input type="radio" name="drug_{{ $m }}" value="{{ $yn }}"> {{ $yn }}
                </label>
                @endforeach

                <input type="text"
                    name="drug_{{ $m }}_notes"
                    style="border:1px solid #777; padding:6px; border-radius:8px; width:40%;">
            </div>
            @endforeach

            <!-- Heparin -->
            @foreach ([
            'Low Molecular Weight Heparin',
            'Unfractionated Heparin'
            ] as $h => $hep)
            <div style="margin-bottom:10px;">
                <label>{{ $hep }}:</label>

                @foreach (['Yes','No'] as $yn)
                <label style="margin-right:15px; margin-left:10px;">
                    <input type="radio" name="heparin_{{ $h }}" value="{{ $yn }}"> {{ $yn }}
                </label>
                @endforeach

                <input type="text"
                    name="heparin_{{ $h }}_notes"
                    style="border:1px solid #777; padding:6px; border-radius:8px; width:40%;">
            </div>
            @endforeach

            <!-- Surgery -->
            <div style="margin-bottom:20px;">
                <label>History of major surgery (last 1 year):</label>
                @foreach (['Yes','No'] as $yn)
                <label style="margin-left:10px; margin-right:10px;">
                    <input type="radio" name="major_surgery" value="{{ $yn }}"> {{ $yn }}
                </label>
                @endforeach
            </div>

            <!-- Diagnosis -->
            <div style="margin-bottom:15px;">
                <label>Probable Diagnosis:</label>
                <textarea name="probable_diagnosis" rows="3"
                    style="width:100%; border:1px solid #777; padding:6px; border-radius:8px;"></textarea>
            </div>

            <!-- Footer Info -->
            <div style="margin-bottom:15px;">
                <label>Sample collected by:</label>
                <input type="text" name="sample_collected_by"
                    style="width:100%; border:1px solid #777; padding:6px; border-radius:8px; margin-bottom:10px;">

                <label>Client Name & Code:</label>
                <input type="text" name="client_name_code"
                    style="width:100%; border:1px solid #777; padding:6px; border-radius:8px;">
            </div>

        </div>
    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HM/REG-001"
        docNo="TDPL/HM/REG-001"
        docName="PT APTT Results Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table style="width:100%; border-collapse:collapse; font-size:14px;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px;">S. No.</th>
                    <th style="border:1px solid #000; padding:6px;">Date</th>
                    <th style="border:1px solid #000; padding:6px;">SIN No</th>
                    <th style="border:1px solid #000; padding:6px;">Analyte Name</th>
                    <th style="border:1px solid #000; padding:6px;">Result</th>
                    <th style="border:1px solid #000; padding:6px;">Done By</th>
                    <th style="border:1px solid #000; padding:6px;">Verified By</th>
                    <th style="border:1px solid #000; padding:6px;">Remarks</th>
                </tr>
            </thead>

            <tbody>
                @foreach(range(1,10) as $i)
                <tr>
                    <td style="border:1px solid #000; padding:6px; text-align:center;">
                        {{ $i }}
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="date" name="rows[{{ $i }}][date]"
                            style="width:100%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $i }}][sin_no]"
                            style="width:100%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $i }}][analyte]"
                            style="width:100%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $i }}][result]"
                            style="width:100%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $i }}][done_by]"
                            style="width:100%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $i }}][verified_by]"
                            style="width:100%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $i }}][remarks]"
                            style="width:100%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HM/REG-002"
        docNo="TDPL/HM/REG-002"
        docName="Leishman Stain QC Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table style="width:100%; border-collapse:collapse; font-size:13px;">
            <thead>
                <tr>
                    @foreach([
                    'Date','Buffer PH','SIN No','Smear Prepared By','Shape','Thickness','Length of Smear',
                    'Distribution of Cells','Uniform Stain','Deposit','RBC Cytoplasm','WBC Cytoplasm',
                    'Eosinophils Granules','Overall Stain','Verified By','Approved By HOD','Remarks'
                    ] as $header)
                    <th style="border:1px solid #000; padding:6px; white-space:nowrap;">
                        {{ $header }}
                    </th>
                    @endforeach
                </tr>
            </thead>

            <tbody>
                @foreach(range(1,5) as $i)
                <tr>
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="date" name="rows[{{ $i }}][date]"
                            style="width:120px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>

                    {{-- Buffer PH --}}
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $i }}][buffer_ph]"
                            style="width:80px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>

                    {{-- SIN No --}}
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $i }}][sin_no]"
                            style="width:110px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>

                    {{-- Smear Prepared By --}}
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $i }}][smear_prepared_by]"
                            style="width:140px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>

                    {{-- Shape --}}
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $i }}][shape]"
                            style="width:100px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>

                    {{-- Thickness --}}
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $i }}][thickness]"
                            style="width:100px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>

                    {{-- Length of Smear --}}
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $i }}][length_of_smear]"
                            style="width:130px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>

                    {{-- Distribution of Cells --}}
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $i }}][distribution_of_cells]"
                            style="width:150px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>

                    {{-- Uniform Stain --}}
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $i }}][uniform_stain]"
                            style="width:110px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>

                    {{-- Deposit --}}
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $i }}][deposit]"
                            style="width:110px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>

                    {{-- RBC Cytoplasm --}}
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $i }}][rbc_cytoplasm]"
                            style="width:130px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>

                    {{-- WBC Cytoplasm --}}
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $i }}][wbc_cytoplasm]"
                            style="width:130px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>

                    {{-- Eosinophils Granules --}}
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $i }}][eosinophils_granules]"
                            style="width:150px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>

                    {{-- Overall Stain --}}
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $i }}][overall_stain]"
                            style="width:120px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>

                    {{-- Verified By --}}
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $i }}][verified_by]"
                            style="width:120px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>

                    {{-- Approved By HOD --}}
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $i }}][approved_by_hod]"
                            style="width:130px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>

                    {{-- Remarks --}}
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $i }}][remarks]"
                            style="width:150px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HM/REG-003"
        docNo="TDPL/HM/REG-003"
        docName="ABO & Rh Typing Result Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">


        <table style="width:100%; border-collapse:collapse; font-size:14px;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px;" rowspan="2">Date/Time</th>
                    <th style="border:1px solid #000; padding:6px;" rowspan="2">SIN No</th>
                    <th style="border:1px solid #000; padding:6px;" rowspan="2">Patient Name</th>
                    <th style="border:1px solid #000; padding:6px;" rowspan="2">Age/Sex</th>

                    <th style="border:1px solid #000; padding:6px;" colspan="3">Reverse Grouping</th>
                    <th style="border:1px solid #000; padding:6px;" colspan="3">Forward Grouping</th>

                    <th style="border:1px solid #000; padding:6px;" rowspan="2">Result</th>
                    <th style="border:1px solid #000; padding:6px;" rowspan="2">Test Done By</th>
                    <th style="border:1px solid #000; padding:6px;" rowspan="2">Test Verified By</th>
                    <th style="border:1px solid #000; padding:6px;" rowspan="2">Approved By</th>
                </tr>

                <tr>
                    <th style="border:1px solid #000; padding:6px;">Pool-A cells</th>
                    <th style="border:1px solid #000; padding:6px;">Pool-B cells</th>
                    <th style="border:1px solid #000; padding:6px;">Pool-O cells</th>

                    <th style="border:1px solid #000; padding:6px;">Anti-A</th>
                    <th style="border:1px solid #000; padding:6px;">Anti-B</th>
                    <th style="border:1px solid #000; padding:6px;">Anti-D</th>
                </tr>
            </thead>

            <tbody>
                @for($i = 1; $i <= 12; $i++)
                    <tr>
                    <!-- 4 Normal Columns -->
                    <td><input type="text" name="rows[{{ $i }}][datetime]" class="cell-input"></td>
                    <td><input type="text" name="rows[{{ $i }}][sin]" class="cell-input"></td>
                    <td><input type="text" name="rows[{{ $i }}][patient]" class="cell-input"></td>
                    <td><input type="text" name="rows[{{ $i }}][age_sex]" class="cell-input"></td>

                    <!-- Reverse Grouping (3) -->
                    <td><input type="text" name="rows[{{ $i }}][pool_a]" class="cell-input"></td>
                    <td><input type="text" name="rows[{{ $i }}][pool_b]" class="cell-input"></td>
                    <td><input type="text" name="rows[{{ $i }}][pool_o]" class="cell-input"></td>

                    <!-- Forward Grouping (3) -->
                    <td><input type="text" name="rows[{{ $i }}][anti_a]" class="cell-input"></td>
                    <td><input type="text" name="rows[{{ $i }}][anti_b]" class="cell-input"></td>
                    <td><input type="text" name="rows[{{ $i }}][anti_d]" class="cell-input"></td>

                    <!-- Remaining Columns -->
                    <td><input type="text" name="rows[{{ $i }}][result]" class="cell-input"></td>
                    <td><input type="text" name="rows[{{ $i }}][done_by]" class="cell-input"></td>
                    <td><input type="text" name="rows[{{ $i }}][verified_by]" class="cell-input"></td>
                    <td><input type="text" name="rows[{{ $i }}][approved_by]" class="cell-input"></td>
                    </tr>
                    @endfor
            </tbody>
        </table>


        <style>
            .cell-input {
                width: 100%;
                border: 0;
                padding: 6px;
                font-size: 14px;
                outline: none;
                box-sizing: border-box;
            }

            table th,
            table td {
                padding: 6px;
                text-align: center;
            }
        </style>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HM/REG-004"
        docNo="TDPL/HM/REG-004"
        docName="ICT DCT Malaria Result Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table style="width:100%; border-collapse: collapse;" border="1">
            <thead>
                <tr style="text-align: center; font-weight: bold;">
                    <td style="border:1px solid #000;padding:6px;">Date</td>
                    <td style="border:1px solid #000;padding:6px;">Sin No.</td>
                    <td style="border:1px solid #000;padding:6px;">Patient Name</td>
                    <td style="border:1px solid #000;padding:6px;">Age/Sex</td>
                    <td style="border:1px solid #000;padding:6px;">Analyte Name</td>
                    <td style="border:1px solid #000;padding:6px;">Result</td>
                    <td style="border:1px solid #000;padding:6px;">Done By</td>
                    <td style="border:1px solid #000;padding:6px;">Verified By</td>
                    <td style="border:1px solid #000;padding:6px;">Remarks</td>
                </tr>
            </thead>

            <tbody>
                @for ($i = 0; $i < 20; $i++)
                    <tr>
                    <td style="padding:6px;">
                        <input type="date" name="rows[{{ $i }}][date]" style="width:100%; border:none;">
                    </td>
                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][sin_no]" style="width:100%; border:none;">
                    </td>
                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][patient_name]" style="width:100%; border:none;">
                    </td>
                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][age_sex]" style="width:100%; border:none;">
                    </td>
                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][analyte_name]" style="width:100%; border:none;">
                    </td>
                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][result]" style="width:100%; border:none;">
                    </td>
                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][done_by]" style="width:100%; border:none;">
                    </td>
                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][verified_by]" style="width:100%; border:none;">
                    </td>
                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][remarks]" style="width:100%; border:none;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HM/REG-005"
        docNo="TDPL/HM/REG-005"
        docName="Erythrocyte Sedimentation Rate (ESR) Results Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table style="width:100%; border-collapse: collapse;" border="1">
            <thead>
                <tr style="text-align: center; font-weight: bold;">
                    <td style="border:1px solid #000;padding:6px;">S. No.</td>
                    <td style="border:1px solid #000;padding:6px;">Date</td>
                    <td style="border:1px solid #000;padding:6px;">SIN No</td>
                    <td style="border:1px solid #000;padding:6px;">ESR Start Time</td>
                    <td style="border:1px solid #000;padding:6px;">ESR End Time</td>
                    <td style="border:1px solid #000;padding:6px;">ESR Result</td>
                    <td style="border:1px solid #000;padding:6px;">Done By</td>
                    <td style="border:1px solid #000;padding:6px;">Verified By</td>
                </tr>
            </thead>

            <tbody>
                @for ($i = 1; $i <= 20; $i++)
                    <tr>
                    <td style="padding:6px; text-align:center;">
                        {{ $i }}
                    </td>

                    <td style="padding:6px;">
                        <input type="date" name="rows[{{ $i }}][date]" style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][sin_no]" style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="time" name="rows[{{ $i }}][esr_start]" style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="time" name="rows[{{ $i }}][esr_end]" style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][esr_result]" style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][done_by]" style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][verified_by]" style="width:100%; border:none;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HM/REG-006"
        docNo="TDPL/HM/REG-006"
        docName="Body Fluids Examination Results Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
         <table style="width:100%; border-collapse: collapse;" border="1">
            <thead>
                <tr style="text-align: center; font-weight: bold;">
                    <td style="border:1px solid #000;padding:6px;">S. No.</td>
                    <td style="border:1px solid #000;padding:6px;">Date</td>
                    <td style="border:1px solid #000;padding:6px;">SIN No</td>
                    <td style="border:1px solid #000;padding:6px;">Analyte name</td>
                    <td style="border:1px solid #000;padding:6px;">Done By</td>
                    <td style="border:1px solid #000;padding:6px;">Verified By</td>
                    <td style="border:1px solid #000;padding:6px;">Remarks</td>
                </tr>
            </thead>

            <tbody>
                @for ($i = 1; $i <= 20; $i++)
                    <tr>
                    <td style="padding:6px; text-align:center;">
                        {{ $i }}
                    </td>

                    <td style="padding:6px;">
                        <input type="date" name="rows[{{ $i }}][date]" style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][sin_no]" style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][esr_start]" style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][esr_end]" style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][esr_result]" style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][done_by]" style="width:100%; border:none;">
                    </td>

               
                    </tr>
                    @endfor
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