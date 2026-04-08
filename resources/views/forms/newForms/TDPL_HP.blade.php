@extends('layouts.base')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HP</title>
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
            <div style="font-size: 20px; ">HP </div>

        </div>
        <div class="icon-view">
            <div class="pc-content">
                <div class="pc-folder" onclick="showSection('TDPL/HP/FOM-001')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Quality Handling of H&E Stain</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HP/FOM-002')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Record of Histo Sample Discard</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HP/FOM-003')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">IQC-Histopathology Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HP/FOM-004')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Tissue Processor Reagent Change Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HP/FOM-005')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Used Reagents Discard Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HP/FOM-006')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label"> Formalin Preparation Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HP/FOM-007')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Formalin & TVOC Monitoring Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HP/FOM-008')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Histopathology Requisition Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HP/FOM-009')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Slides & Blocks Return Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HP/REG-001')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Histopathology Work Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HP/REG-002')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Histopathology Clinical Correlation Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HP/REG-003')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Slides and Blocks Return Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HP/REG-004')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Sample Labelling Errors Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HP/REG-005')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Decalcification Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HP/REG-006')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label"> Slides Storage Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HP/REG-007')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Blocks Storage Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HP/REG-008')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Histopathology Grossing Register</span>
                </div>
            </div>
        </div>
    </div>


    <x-formTemplete
        id="TDPL/HP/FOM-001"
        docNo="TDPL/HP/FOM-001"
        docName="Quality Handling of H&E Stain"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <p><strong>Month & Year:</strong>
            <input type="date" name="date" style="border:1px solid #000; padding:4px;">
        </p>

        <table style="border-collapse: collapse; width:100%; text-align:center;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px;"><strong>Date</strong></th>



                    @foreach([
                    'Xylene 1','Xylene 2','Xylene 3',
                    'Alcohol 1','Alcohol 2','Alcohol 3',
                    'Hematoxylin Stain Top Up','Eosin','Og6',
                    'Alcohol 1','Alcohol 2','EA36',
                    'Alcohol 1','Alcohol 2','Sign'
                    ] as $col)
                    <th style="border:1px solid #000; padding:6px;"><strong>{{ $col }}</strong></th>
                    @endforeach
                </tr>
            </thead>

            <tbody>
                @for($i = 1; $i <= 31; $i++)
                    <tr>
                    <td style="padding:6px;"><strong>{{ $i }}</strong></td>

                    @foreach([
                    'Xylene 1','Xylene 2','Xylene 3',
                    'Alcohol 1','Alcohol 2','Alcohol 3',
                    'Hematoxylin Stain Top Up','Eosin','Og6',
                    'Alcohol 1','Alcohol 2','EA36',
                    'Alcohol 1','Alcohol 2','Sign'
                    ] as $col)
                    <td style="padding:4px;">
                        <input
                            type="text"
                            name="{{ strtolower(str_replace(' ', '_', $col)) }}[{{ $i }}]"
                            style="width:100%; padding:4px; border:1px solid #ccc;" />
                    </td>
                    @endforeach
                    </tr>
                    @endfor
            </tbody>
        </table>


    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HP/FOM-002"
        docNo="TDPL/HP/FOM-002"
        docName="Record of Histo Sample Discard"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <p><strong>Month & Year:</strong>
            <input type="date" name="date" style="border:1px solid #000; padding:4px;">
        </p>

        <table style="width:100%; border-collapse: collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px;"><strong>S. No.</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Date &amp; Time</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Histopathology No.</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Preserve Sample No.</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>No. of Samples</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Samples Discard Date &amp; Time</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Discarded By<br>Sign &amp; Date</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Reviewed By<br>Sign &amp; Date</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>HOD<br>Sign &amp; Date</strong></th>
                </tr>
            </thead>

            <tbody>
                @for($i = 1; $i <= 31; $i++)
                    <tr>
                    <td style="padding:6px; text-align:center;"><strong>{{ $i }}</strong></td>

                    <td style="padding:6px;">
                        <input type="datetime-local" name="date_time[{{ $i }}]" style="width:100%; padding:4px;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="histo_no[{{ $i }}]" style="width:100%; padding:4px;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="preserve_no[{{ $i }}]" style="width:100%; padding:4px;">
                    </td>

                    <td style="padding:6px;">
                        <input type="number" name="sample_count[{{ $i }}]" style="width:100%; padding:4px;">
                    </td>

                    <td style="padding:6px;">
                        <input type="datetime-local" name="discard_date[{{ $i }}]" style="width:100%; padding:4px;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="discarded_by[{{ $i }}]" placeholder="Name" style="width:100%; padding:4px; margin-bottom:4px;">
                        <input type="date" name="discard_sign_date[{{ $i }}]" style="width:100%; padding:4px;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="reviewed_by[{{ $i }}]" placeholder="Name" style="width:100%; padding:4px; margin-bottom:4px;">
                        <input type="date" name="review_sign_date[{{ $i }}]" style="width:100%; padding:4px;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="hod[{{ $i }}]" placeholder="Name" style="width:100%; padding:4px; margin-bottom:4px;">
                        <input type="date" name="hod_sign_date[{{ $i }}]" style="width:100%; padding:4px;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HP/FOM-003"
        docNo="TDPL/HP/FOM-003"
        docName="IQC-Histopathology Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">


        <div style="margin-bottom: 30px;">
            <label style="font-weight: bold; margin-right: 10px; font-size: 14px;">Month/Year:</label>
            <input type="month" name="month_year" required style="padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
        </div>

        <!-- TABLE 1: TISSUE PROCESSING & MICROTOMY -->
        <div style="overflow-x: auto; margin-bottom: 40px;">
            <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
                <thead>
                    <tr style="background-color: #34495e; color: white;">
                        <th style="border: 1px solid #2c3e50; padding: 10px; text-align: left; min-width: 220px; font-weight: bold;">
                            Mo/Yr: <input type="month" name="month_year" required style="border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
                            Date →
                        </th>
                        @for($day = 1; $day <= 31; $day++)
                            <th style="border: 1px solid #2c3e50; padding: 8px; text-align: center; min-width: 35px; font-weight: bold;">
                            {{ $day }}
                            </th>
                            @endfor
                            <th style="border: 1px solid #2c3e50; padding: 10px; text-align: left; min-width: 150px; font-weight: bold;">
                                Remarks
                            </th>
                    </tr>
                </thead>
                <tbody>
                    <!-- HP NUMBER Row -->
                    <tr style="background-color: #f8f9fa;">
                        <td style="border: 1px solid #ddd; padding: 8px; font-weight: 500;">HP NUMBER</td>
                        @for($day = 1; $day <= 31; $day++)
                            <td style="border: 1px solid #ddd; padding: 4px; text-align: center;">
                            <input type="text" name="hp_number[{{ $day }}]"
                                style="width: 100%; border: none; text-align: center; padding: 4px; font-size: 11px;">
                            </td>
                            @endfor
                            <td style="border: 1px solid #ddd; padding: 4px;">
                                <input type="text" name="hp_number_remarks"
                                    style="width: 100%; border: none; padding: 4px; font-size: 11px;">
                            </td>
                    </tr>

                    <!-- TISSUE PROCESSING Section Header -->
                    <tr style="background-color: #3498db; color: white;">
                        <td colspan="33" style="border: 1px solid #2980b9; padding: 8px; font-weight: bold;">
                            TISSUE PROCESSING
                        </td>
                    </tr>

                    @foreach([
                    'absence_formation_pigment' => 'Absence of formation pigment',
                    'dehydration' => 'Dehydration',
                    'clearing' => 'Clearing',
                    'paraffin_wax' => 'Paraffin wax impregnation',
                    'orientation_embedding' => 'Orientation during embedding'
                    ] as $key => $label)
                    <tr style="background-color: {{ $loop->iteration % 2 == 0 ? '#f8f9fa' : '#ffffff' }};">
                        <td style="border: 1px solid #ddd; padding: 8px;">{{ $label }}</td>
                        @for($day = 1; $day <= 31; $day++)
                            <td style="border: 1px solid #ddd; padding: 4px; text-align: center;">
                            <input type="checkbox" name="tissue_processing[{{ $key }}][{{ $day }}]" value="1"
                                style="cursor: pointer;">
                            </td>
                            @endfor
                            <td style="border: 1px solid #ddd; padding: 4px;">
                                <input type="text" name="tissue_processing[{{ $key }}][remarks]"
                                    style="width: 100%; border: none; padding: 4px; font-size: 11px;">
                            </td>
                    </tr>
                    @endforeach

                    <!-- MICROTOMY Section Header -->
                    <tr style="background-color: #3498db; color: white;">
                        <td colspan="33" style="border: 1px solid #2980b9; padding: 8px; font-weight: bold;">
                            MICROTOMY
                        </td>
                    </tr>

                    @foreach([
                    'thickness_section' => 'Thickness of section',
                    'knife_artefacts' => 'Knife artefacts (nicks/vibration/chatter)',
                    'section_artefacts' => 'Section artefacts (folds/tears/cracks)',
                    'floaters_position' => 'Floaters and position of section of slide'
                    ] as $key => $label)
                    <tr style="background-color: {{ $loop->iteration % 2 == 0 ? '#f8f9fa' : '#ffffff' }};">
                        <td style="border: 1px solid #ddd; padding: 8px;">{{ $label }}</td>
                        @for($day = 1; $day <= 31; $day++)
                            <td style="border: 1px solid #ddd; padding: 4px; text-align: center;">
                            <input type="checkbox" name="microtomy[{{ $key }}][{{ $day }}]" value="1"
                                style="cursor: pointer;">
                            </td>
                            @endfor
                            <td style="border: 1px solid #ddd; padding: 4px;">
                                <input type="text" name="microtomy[{{ $key }}][remarks]"
                                    style="width: 100%; border: none; padding: 4px; font-size: 11px;">
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- TABLE 2: STAINING & MOUNTING -->
        <div style="overflow-x: auto; margin-bottom: 40px;">
            <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
                <thead>
                    <tr style="background-color: #34495e; color: white;">
                        <th style="border: 1px solid #2c3e50; padding: 10px; text-align: left; min-width: 220px; font-weight: bold;">
                            Mo/Yr: <input type="month" name="month_year" required style=" border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
                            Date →
                        </th>
                        @for($day = 1; $day <= 31; $day++)
                            <th style="border: 1px solid #2c3e50; padding: 8px; text-align: center; min-width: 35px; font-weight: bold;">
                            {{ $day }}
                            </th>
                            @endfor
                            <th style="border: 1px solid #2c3e50; padding: 10px; text-align: left; min-width: 150px; font-weight: bold;">
                                Remarks
                            </th>
                    </tr>
                </thead>
                <tbody>
                    <!-- HP NUMBER Row -->
                    <tr style="background-color: #f8f9fa;">
                        <td style="border: 1px solid #ddd; padding: 8px; font-weight: bold;">HP Number</td>
                        @for($day = 1; $day <= 31; $day++)
                            <td style="border: 1px solid #ddd; padding: 4px; text-align: center;">
                            <input type="text" name="hp_number_2[{{ $day }}]"
                                style="width: 100%; border: none; text-align: center; padding: 4px; font-size: 11px;">
                            </td>
                            @endfor
                            <td style="border: 1px solid #ddd; padding: 4px;">
                                <input type="text" name="hp_number_2_remarks"
                                    style="width: 100%; border: none; padding: 4px; font-size: 11px;">
                            </td>
                    </tr>

                    <!-- STAINING Section Header -->
                    <tr style="background-color: #e74c3c; color: white;">
                        <td colspan="33" style="border: 1px solid #c0392b; padding: 8px; font-weight: bold;">
                            STAINING
                        </td>
                    </tr>

                    @foreach([
                    'contrast_lowest_power' => 'Contrast at lowest power',
                    'chromatin_detail' => 'Chromatin detail',
                    'hematoxylin_intensity' => 'Hematoxylin intensity and differentiation',
                    'uniformity_staining' => 'Uniformity of staining',
                    'eosin_intensity' => 'Eosin intensity and selectivity',
                    'residual_wax' => 'Residual Wax'
                    ] as $key => $label)
                    <tr style="background-color: {{ $loop->iteration % 2 == 0 ? '#f8f9fa' : '#ffffff' }};">
                        <td style="border: 1px solid #ddd; padding: 8px;">{{ $label }}</td>
                        @for($day = 1; $day <= 31; $day++)
                            <td style="border: 1px solid #ddd; padding: 4px; text-align: center;">
                            <input type="checkbox" name="staining[{{ $key }}][{{ $day }}]" value="1"
                                style="cursor: pointer;">
                            </td>
                            @endfor
                            <td style="border: 1px solid #ddd; padding: 4px;">
                                <input type="text" name="staining[{{ $key }}][remarks]"
                                    style="width: 100%; border: none; padding: 4px; font-size: 11px;">
                            </td>
                    </tr>
                    @endforeach

                    <!-- MOUNTING AND LABELLING Section Header -->
                    <tr style="background-color: #e74c3c; color: white;">
                        <td colspan="33" style="border: 1px solid #c0392b; padding: 8px; font-weight: bold;">
                            MOUNTING AND LABELLING
                        </td>
                    </tr>

                    @foreach([
                    'dehydration_clarity' => 'Dehydration of section and clarity',
                    'air_bubbles' => 'Air bubbles under cover slip',
                    'messy_mounting' => 'Messy mounting',
                    'tissue_exposed' => 'Tissue section exposed',
                    'label_details' => 'Label details'
                    ] as $key => $label)
                    <tr style="background-color: {{ $loop->iteration % 2 == 0 ? '#f8f9fa' : '#ffffff' }};">
                        <td style="border: 1px solid #ddd; padding: 8px;">{{ $label }}</td>
                        @for($day = 1; $day <= 31; $day++)
                            <td style="border: 1px solid #ddd; padding: 4px; text-align: center;">
                            <input type="checkbox" name="mounting[{{ $key }}][{{ $day }}]" value="1"
                                style="cursor: pointer;">
                            </td>
                            @endfor
                            <td style="border: 1px solid #ddd; padding: 4px;">
                                <input type="text" name="mounting[{{ $key }}][remarks]"
                                    style="width: 100%; border: none; padding: 4px; font-size: 11px;">
                            </td>
                    </tr>
                    @endforeach

                    <!-- Signature Rows -->
                    <tr style="background-color: #fff3cd;">
                        <td style="border: 1px solid #ddd; padding: 8px; font-weight: bold;">Technician Signature</td>
                        @for($day = 1; $day <= 31; $day++)
                            <td style="border: 1px solid #ddd; padding: 4px; text-align: center;">
                            <input type="text" name="technician_signature[{{ $day }}]"
                                style="width: 100%; border: none; text-align: center; padding: 4px; font-size: 10px;">
                            </td>
                            @endfor
                            <td style="border: 1px solid #ddd; padding: 4px;">
                                <input type="text" name="technician_signature_remarks"
                                    style="width: 100%; border: none; padding: 4px; font-size: 11px;">
                            </td>
                    </tr>

                    <tr style="background-color: #d4edda;">
                        <td style="border: 1px solid #ddd; padding: 8px; font-weight: bold;">Doctor Signature</td>
                        @for($day = 1; $day <= 31; $day++)
                            <td style="border: 1px solid #ddd; padding: 4px; text-align: center;">
                            <input type="text" name="doctor_signature[{{ $day }}]"
                                style="width: 100%; border: none; text-align: center; padding: 4px; font-size: 10px;">
                            </td>
                            @endfor
                            <td style="border: 1px solid #ddd; padding: 4px;">
                                <input type="text" name="doctor_signature_remarks"
                                    style="width: 100%; border: none; padding: 4px; font-size: 11px;">
                            </td>
                    </tr>
                </tbody>
            </table>
        </div>


    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HP/FOM-004"
        docNo="TDPL/HP/FOM-004"
        docName="Tissue Processor Reagent Change Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <div style="margin-bottom: 30px;">
            <label style="font-weight: bold; margin-right: 10px; font-size: 14px;">Month/Year:</label>
            <input type="month" name="month_year" required style="padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
        </div>


        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px;">S. No.</th>
                    <th style="border:1px solid #000; padding:6px;">Date</th>

                    {{-- Column headers --}}
                    @foreach([
                    'Formalin 1','Formalin 2','Processing Water',
                    'Alcohol 70%','Alcohol 80%','Alcohol 90%',
                    'Absolute Alcohol','Absolute Alcohol','Absolute Alcohol',
                    'Xylene 1','Xylene 2','Wax 1','Wax 2',
                    'Cleaning Xylene','Cleaning Alcohol'
                    ] as $col)
                    <th style="border:1px solid #000; padding:6px;">{{ $col }}</th>
                    @endforeach
                </tr>
            </thead>

            <tbody>
                {{-- Generate 15 rows dynamically --}}
                @for($i = 1; $i <= 15; $i++)
                    <tr>
                    <td style="padding:4px; text-align:center;">{{ $i }}</td>

                    {{-- Date input --}}
                    <td style="padding:4px;">
                        <input type="date" name="rows[{{ $i }}][date]"
                            style="width:100%; padding:4px; border:1px solid #ccc;">
                    </td>

                    {{-- Input fields for each column --}}
                    @foreach([
                    'formalin1','formalin2','processing_water',
                    'alcohol70','alcohol80','alcohol90',
                    'absolute1','absolute2','absolute3',
                    'xylene1','xylene2','wax1','wax2',
                    'cleaning_xylene','cleaning_alcohol'
                    ] as $field)
                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][{{ $field }}]"
                            style="width:100%; padding:4px; border:1px solid #ccc;">
                    </td>
                    @endforeach
                    </tr>
                    @endfor
            </tbody>
        </table>

        <p><strong>Note:</strong> Reagent change is scheduled every 15 days.</p>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HP/FOM-005"
        docNo="TDPL/HP/FOM-005"
        docName="Used Reagents Discard Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    @foreach([
                    'S. No.',
                    'Date',
                    'Reagent Name',
                    'Quantity',
                    'Handover By',
                    'Received By',
                    'Name of the Agency',
                    'Collection Date & Time by Agency',
                    'HOD Sign'
                    ] as $header)
                    <th style="border:1px solid #000; padding:6px;">{{ $header }}</th>
                    @endforeach
                </tr>
            </thead>

            <tbody>
                {{-- Generate 25 rows --}}
                @for($i = 1; $i <= 25; $i++)
                    <tr>
                    {{-- S. No. --}}
                    <td style="padding:4px; text-align:center;">{{ $i }}</td>

                    {{-- Date --}}
                    <td style="padding:4px;">
                        <input type="date"
                            name="rows[{{ $i }}][date]"
                            style="width:100%; padding:4px; border:1px solid #ccc;">
                    </td>

                    {{-- Text inputs for remaining columns --}}
                    @foreach([
                    'reagent_name',
                    'quantity',
                    'handover_by',
                    'received_by',
                    'agency_name',
                    'collection_datetime',
                    'hod_sign'
                    ] as $field)
                    <td style="padding:4px;">
                        <input type="{{ $field === 'collection_datetime' ? 'datetime-local' : 'text' }}"
                            name="rows[{{ $i }}][{{ $field }}]"
                            style="width:100%; padding:4px; border:1px solid #ccc;">
                    </td>
                    @endforeach
                    </tr>
                    @endfor
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HP/FOM-006"
        docNo="TDPL/HP/FOM-006"
        docName="Formalin Preparation Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px;"><strong>Date</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>pH</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Volume Prepared</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Prepared By</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Verified By</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Remarks</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>HOD Signature</strong></th>
                </tr>
            </thead>

            <tbody>
                @for($i = 0; $i < 30; $i++)
                    <tr>
                    <td style="padding:4px;">
                        <input type="date" name="records[{{ $i }}][date]"
                            style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="records[{{ $i }}][ph]"
                            style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="records[{{ $i }}][volume_prepared]"
                            placeholder="ml"
                            style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="records[{{ $i }}][prepared_by]"
                            style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="records[{{ $i }}][verified_by]"
                            style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="records[{{ $i }}][remarks]"
                            style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="records[{{ $i }}][hod_signature]"
                            style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HP/FOM-007"
        docNo="TDPL/HP/FOM-007"
        docName="Formalin & TVOC Monitoring Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <p><strong>Month & Year:</strong>
            <input type="text" name="month_year"
                style="border:1px solid #ccc; padding:4px; margin-left:10px; width:150px;">
        </p>

        <table border="1" style="width:100%; border-collapse:collapse;">
            <tbody>

                <tr>
                    <td colspan="8" style="padding:6px;">
                        Ref. Formaldehyde (Formalin) levels: &lt; 0.94 mg/m³;
                        Ref. Total Volatile Organic Compounds (TVOC): &lt; 2.0 mg/m³
                    </td>
                </tr>

                <tr>
                    <td colspan="4" style="text-align:center; padding:6px;"><strong>10:00 AM</strong></td>
                    <td colspan="4" style="text-align:center; padding:6px;"><strong>04:00 PM</strong></td>
                </tr>

                <tr>
                    <td style="padding:6px;"><strong>Date</strong></td>
                    <td style="padding:6px;"><strong>Formalin</strong></td>
                    <td style="padding:6px;"><strong>TVOC</strong></td>
                    <td style="padding:6px;"><strong>Sign</strong></td>

                    <td style="padding:6px;"><strong>Formalin</strong></td>
                    <td style="padding:6px;"><strong>TVOC</strong></td>
                    <td style="padding:6px;"><strong>Sign</strong></td>

                    <td style="padding:6px;"><strong>Remarks</strong></td>
                </tr>

                @for($i = 1; $i <= 31; $i++)
                    <tr>

                    <td style="padding:4px; text-align:center;">
                        <input type="text" value="{{ $i }}" readonly
                            style="width:40px; text-align:center; border:1px solid #ccc; padding:4px;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="records[{{ $i }}][formalin_am]"
                            style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="records[{{ $i }}][tvoc_am]"
                            style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="records[{{ $i }}][sign_am]"
                            style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="records[{{ $i }}][formalin_pm]"
                            style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="records[{{ $i }}][tvoc_pm]"
                            style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="records[{{ $i }}][sign_pm]"
                            style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="records[{{ $i }}][remarks]"
                            style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>

                    </tr>
                    @endfor

            </tbody>
        </table>

        <p style="margin-top:10px;">
            <em>Reference: WHO guidelines for indoor air quality: selected pollutants</em>
        </p>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HP/FOM-008"
        docNo="TDPL/HP/FOM-008"
        docName="Histopathology Requisition Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <div style=" margin: 0 auto; background: white; border-radius: 16px; box-shadow: 0 20px 60px rgba(0,0,0,0.3); overflow: hidden;">

            <!-- Header Section -->
            <div style="background: linear-gradient(135deg, #7a66eaff 0%, #4ba261ff 100%); padding: 30px; text-align: center; color: white;">
                <div style="background: rgba(255,255,255,0.2); padding: 10px; border-radius: 8px; display: inline-block; margin-top: 15px;">
                    <label style="font-weight: 500; margin-right: 10px;">SIN No.</label>
                    <input type="text" name="sin_no" style="border: none; padding: 8px 12px; border-radius: 6px; width: 180px; font-size: 14px;">
                </div>
            </div>

            <!-- Form Content -->
            <div style="padding: 40px;">

                <!-- Patient Information -->
                <div style="background: #f8f9fa; padding: 25px; border-radius: 12px; margin-bottom: 25px; border-left: 4px solid #667eea;">
                    <h2 style="margin: 0 0 20px 0; color: #667eea; font-size: 20px; font-weight: 600;">Patient Information</h2>

                    <div style="margin-bottom: 15px;">
                        <label style="display: inline-block; width: 120px; font-weight: 600; color: #333;">Name:</label>
                        <input type="text" name="name" style="border: 1px solid #ddd; padding: 10px; border-radius: 6px; width: calc(100% - 140px); font-size: 14px;">
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label style="display: inline-block; width: 120px; font-weight: 600; color: #333;">Date of Birth:</label>
                        <input type="date" name="dob" style="border: 1px solid #ddd; padding: 10px; border-radius: 6px; width: 200px; margin-right: 20px; font-size: 14px;">

                        <label style="font-weight: 600; color: #333; margin-left: 20px;">Sex:</label>
                        <select name="sex" style="border: 1px solid #ddd; padding: 10px; border-radius: 6px; margin-left: 10px; font-size: 14px;">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>

                    <div style="margin-bottom: 0;">
                        <label style="display: inline-block; width: 120px; font-weight: 600; color: #333;">Mobile:</label>
                        <input type="text" name="mobile" style="border: 1px solid #ddd; padding: 10px; border-radius: 6px; width: 200px; font-size: 14px;">
                    </div>
                </div>

                <!-- Client & Doctor Information -->
                <div style="background: #f8f9fa; padding: 25px; border-radius: 12px; margin-bottom: 25px; border-left: 4px solid #764ba2;">
                    <h2 style="margin: 0 0 20px 0; color: #764ba2; font-size: 20px; font-weight: 600;">Client & Referral Information</h2>

                    <div style="margin-bottom: 15px;">
                        <label style="display: inline-block; width: 120px; font-weight: 600; color: #333;">Client Name:</label>
                        <input type="text" name="client_name" style="border: 1px solid #ddd; padding: 10px; border-radius: 6px; width: 250px; margin-right: 20px; font-size: 14px;">

                        <label style="font-weight: 600; color: #333;">Client Code:</label>
                        <input type="text" name="client_code" style="border: 1px solid #ddd; padding: 10px; border-radius: 6px; width: 150px; margin-left: 10px; font-size: 14px;">
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label style="display: inline-block; width: 120px; font-weight: 600; color: #333;">Referring Doctor:</label>
                        <input type="text" name="ref_doctor" style="border: 1px solid #ddd; padding: 10px; border-radius: 6px; width: calc(100% - 140px); font-size: 14px;">
                    </div>

                    <div style="margin-bottom: 0;">
                        <label style="display: inline-block; width: 120px; font-weight: 600; color: #333;">Date:</label>
                        <input type="date" name="ref_date" style="border: 1px solid #ddd; padding: 10px; border-radius: 6px; width: 200px; font-size: 14px;">
                    </div>
                </div>

                <!-- Clinical Information -->
                <div style="background: #f8f9fa; padding: 25px; border-radius: 12px; margin-bottom: 25px; border-left: 4px solid #667eea;">
                    <h2 style="margin: 0 0 20px 0; color: #667eea; font-size: 20px; font-weight: 600;">Clinical Information</h2>

                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-weight: 600; color: #333; margin-bottom: 8px;">Site of Specimen:</label>
                        <textarea name="specimen_site" style="width: 100%; height: 60px; border: 1px solid #ddd; padding: 10px; border-radius: 6px; font-family: inherit; font-size: 14px; resize: vertical;"></textarea>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-weight: 600; color: #333; margin-bottom: 8px;">Relevant Clinical History:</label>
                        <textarea name="clinical_history" style="width: 100%; height: 70px; border: 1px solid #ddd; padding: 10px; border-radius: 6px; font-family: inherit; font-size: 14px; resize: vertical;"></textarea>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-weight: 600; color: #333; margin-bottom: 8px;">Additional Clinical & Relevant Data:</label>
                        <textarea name="additional_data" style="width: 100%; height: 70px; border: 1px solid #ddd; padding: 10px; border-radius: 6px; font-family: inherit; font-size: 14px; resize: vertical;"></textarea>
                    </div>

                    <div style="margin-bottom: 0;">
                        <label style="display: block; font-weight: 600; color: #333; margin-bottom: 8px;">Previous Biopsy / FNAC / X-ray etc. Clinical Diagnosis:</label>
                        <textarea name="clinical_diagnosis" style="width: 100%; height: 70px; border: 1px solid #ddd; padding: 10px; border-radius: 6px; font-family: inherit; font-size: 14px; resize: vertical;"></textarea>
                    </div>
                </div>

                <!-- Specimen Type -->
                <div style="background: #f8f9fa; padding: 25px; border-radius: 12px; margin-bottom: 25px; border-left: 4px solid #764ba2;">
                    <h2 style="margin: 0 0 20px 0; color: #764ba2; font-size: 20px; font-weight: 600;">Type of Specimen</h2>

                    <div style="margin-bottom: 15px;">
                        <label style="margin-right: 20px; font-size: 16px;">
                            <input type="checkbox" name="specimen_large" style="margin-right: 8px; transform: scale(1.2);">
                            <span style="font-weight: 600;">Large</span>
                        </label>
                        <label style="margin-right: 20px; font-size: 16px;">
                            <input type="checkbox" name="specimen_medium" style="margin-right: 8px; transform: scale(1.2);">
                            <span style="font-weight: 600;">Medium</span>
                        </label>
                        <label style="margin-right: 20px; font-size: 16px;">
                            <input type="checkbox" name="specimen_small" style="margin-right: 8px; transform: scale(1.2);">
                            <span style="font-weight: 600;">Small</span>
                        </label>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label style="display: inline-block; font-weight: 600; color: #333; margin-right: 10px;">Miscellaneous:</label>
                        <input type="text" name="specimen_misc" style="border: 1px solid #ddd; padding: 10px; border-radius: 6px; width: calc(100% - 150px); font-size: 14px;">
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-weight: 600; color: #333; margin-bottom: 8px;">IHC Markers:</label>
                        <input type="text" name="ihc_markers" style="width: 100%; border: 1px solid #ddd; padding: 10px; border-radius: 6px; font-size: 14px;">
                    </div>

                    <div style="margin-bottom: 0;">
                        <label style="display: block; font-weight: 600; color: #333; margin-bottom: 8px;">Special Stains:</label>
                        <input type="text" name="special_stains" style="width: 100%; border: 1px solid #ddd; padding: 10px; border-radius: 6px; font-size: 14px;">
                    </div>
                </div>

                <!-- Fixation -->
                <div style="background: #f8f9fa; padding: 25px; border-radius: 12px; margin-bottom: 25px; border-left: 4px solid #667eea;">
                    <h2 style="margin: 0 0 15px 0; color: #667eea; font-size: 20px; font-weight: 600;">Histopath Slides / Block for Review - Fixation</h2>

                    <label style="margin-right: 30px; font-size: 16px;">
                        <input type="radio" name="fixation" value="Adequate" style="margin-right: 8px; transform: scale(1.2);">
                        <span style="font-weight: 600;">Adequate</span>
                    </label>
                    <label style="font-size: 16px;">
                        <input type="radio" name="fixation" value="Inadequate" style="margin-right: 8px; transform: scale(1.2);">
                        <span style="font-weight: 600;">Inadequate</span>
                    </label>
                </div>

                <!-- Instructions -->
                <div style="background: #fff3cd; padding: 20px; border-radius: 12px; margin-bottom: 25px; border-left: 4px solid #ffc107;">
                    <h2 style="margin: 0 0 15px 0; color: #856404; font-size: 18px; font-weight: 600;">Instructions for Filling Up Form</h2>
                    <ol style="margin: 0; padding-left: 20px; color: #856404; line-height: 1.8;">
                        <li>Please tick appropriate boxes only as applicable</li>
                        <li>Please furnish complete clinical details along with Request form</li>
                        <li>Samples details not covered above should be entered next to "Miscellaneous"</li>
                        <li>Do not omit telephone number of Patient / Referring Doctor</li>
                        <li>Immerse specimen completely in an appropriate fixative before dispatch</li>
                    </ol>
                </div>

                <!-- Specimen Details Table -->
                <div style="background: #f8f9fa; padding: 25px; border-radius: 12px; border-left: 4px solid #764ba2;">
                    <h2 style="margin: 0 0 20px 0; color: #764ba2; font-size: 20px; font-weight: 600;">Specimen Details</h2>

                    <table style="width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden;">
                        <thead>
                            <tr style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                                <th style="padding: 15px; text-align: center; font-weight: 600; width: 80px;">SELECT</th>
                                <th style="padding: 15px; text-align: center; font-weight: 600; width: 150px;">TEST CODE</th>
                                <th style="padding: 15px; text-align: left; font-weight: 600;">SPECIMEN DETAILS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Small Specimen -->
                            <tr style="border-bottom: 1px solid #e9ecef;">
                                <td style="padding: 20px; text-align: center; vertical-align: top;">
                                    <input type="checkbox" name="type_selected[]" value="small" style="transform: scale(1.3);">
                                </td>
                                <td style="padding: 20px; vertical-align: top;">
                                    <input type="text" name="test_code_small" style="width: 100%; border: 1px solid #ddd; padding: 8px; border-radius: 6px; font-size: 14px;">
                                </td>
                                <td style="padding: 20px;">
                                    <strong style="color: #667eea; font-size: 15px;">BIOPSY, SMALL SPECIMEN - LESS THAN 2 cm:</strong>
                                    <p style="margin: 10px 0; color: #666; line-height: 1.6; font-size: 14px;">
                                        Endometrium, Cervical biopsy, Endoscopic biopsies, Trucut biopsies, Appendix, Fallopian Tubes, Conjunctival Biopsy, Small diagnostic / incision biopsies
                                    </p>
                                    <input type="text" name="small_other" placeholder="Others..." style="width: 100%; border: 1px solid #ddd; padding: 8px; border-radius: 6px; margin-top: 10px; font-size: 14px;">
                                </td>
                            </tr>

                            <!-- Medium Specimen -->
                            <tr style="border-bottom: 1px solid #e9ecef;">
                                <td style="padding: 20px; text-align: center; vertical-align: top;">
                                    <input type="checkbox" name="type_selected[]" value="medium" style="transform: scale(1.3);">
                                </td>
                                <td style="padding: 20px; vertical-align: top;">
                                    <input type="text" name="test_code_medium" style="width: 100%; border: 1px solid #ddd; padding: 8px; border-radius: 6px; font-size: 14px;">
                                </td>
                                <td style="padding: 20px;">
                                    <strong style="color: #667eea; font-size: 15px;">BIOPSY, MEDIUM SPECIMEN - UPTO 5 cm:</strong>
                                    <p style="margin: 10px 0; color: #666; line-height: 1.6; font-size: 14px;">
                                        Breast lump, Pilonidal sinus, Fistula, Lymph Node, Ovarian Cyst, Gall bladder, Prostate (TURP), Brain & Spine tumors, Small excision biopsies, Fibroids, Products of Conception, Bladder TURBT, Ectopic Gestation
                                    </p>
                                    <input type="text" name="medium_other" placeholder="Others..." style="width: 100%; border: 1px solid #ddd; padding: 8px; border-radius: 6px; margin-top: 10px; font-size: 14px;">
                                </td>
                            </tr>

                            <!-- Large Specimen -->
                            <tr style="border-bottom: 1px solid #e9ecef;">
                                <td style="padding: 20px; text-align: center; vertical-align: top;">
                                    <input type="checkbox" name="type_selected[]" value="large" style="transform: scale(1.3);">
                                </td>
                                <td style="padding: 20px; vertical-align: top;">
                                    <input type="text" name="test_code_large" style="width: 100%; border: 1px solid #ddd; padding: 8px; border-radius: 6px; font-size: 14px;">
                                </td>
                                <td style="padding: 20px;">
                                    <strong style="color: #667eea; font-size: 15px;">BIOPSY, LARGE SPECIMEN - GREATER THAN 5 cm:</strong>
                                    <p style="margin: 10px 0; color: #666; line-height: 1.6; font-size: 14px;">
                                        Uterus with cervix, Ovarian tumors, Thyroid/Testes/Kidney resections, Intestinal resections, Lymph node blocks, Placenta, Eyeball, Lipomas, Gall bladder with cancer
                                    </p>
                                    <input type="text" name="large_other" placeholder="Others..." style="width: 100%; border: 1px solid #ddd; padding: 8px; border-radius: 6px; margin-top: 10px; font-size: 14px;">
                                </td>
                            </tr>

                            <!-- Complex Specimen -->
                            <tr>
                                <td style="padding: 20px; text-align: center; vertical-align: top;">
                                    <input type="checkbox" name="type_selected[]" value="complex" style="transform: scale(1.3);">
                                </td>
                                <td style="padding: 20px; vertical-align: top;">
                                    <input type="text" name="test_code_complex" style="width: 100%; border: 1px solid #ddd; padding: 8px; border-radius: 6px; font-size: 14px;">
                                </td>
                                <td style="padding: 20px;">
                                    <strong style="color: #667eea; font-size: 15px;">BIOPSY, LARGE COMPLEX / CANCER RESECTION SPECIMENS:</strong>
                                    <p style="margin: 10px 0; color: #666; line-height: 1.6; font-size: 14px;">
                                        Esophagectomy, Gastrectomy, Mastectomy, Colostomy, Bone resection, Radical surgeries etc.
                                    </p>
                                    <input type="text" name="complex_other" placeholder="Others..." style="width: 100%; border: 1px solid #ddd; padding: 8px; border-radius: 6px; margin-top: 10px; font-size: 14px;">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Submit Button -->
                <div style="text-align: center; margin-top: 30px;">
                    <button type="submit" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 15px 50px; border: none; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer; box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4); transition: transform 0.2s;">
                        Submit Form
                    </button>
                </div>

            </div>

        </div>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HP/FOM-009"
        docNo="TDPL/HP/FOM-009"
        docName="Slides & Blocks Return Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <div style="padding:20px; background: #fff;border:1px solid black; border-radius: 16px; box-shadow: 0 4px 18px rgba(0,0,0,0.08);">


            <!-- SECTION 1 -->
            <div style="border-left: 5px solid #6a11cb; padding-left: 15px; margin-bottom: 20px;">
                <label>Date:</label>
                <input type="text" name="date" style="width:100%; padding:8px; margin-top:4px; margin-bottom:14px; border:1px solid #ccc; border-radius:8px;">

                <label>Place:</label>
                <input type="text" name="place" style="width:100%; padding:8px; margin-top:4px; margin-bottom:14px; border:1px solid #ccc; border-radius:8px;">

                <label>Patient Name:</label>
                <input type="text" name="patient_name" style="width:100%; padding:8px; margin-top:4px; margin-bottom:14px; border:1px solid #ccc; border-radius:8px;">

                <label>Old Barcode:</label>
                <input type="text" name="old_barcode" style="width:100%; padding:8px; margin-top:4px; margin-bottom:14px; border:1px solid #ccc; border-radius:8px;">

                <label>New Barcode:</label>
                <input type="text" name="new_barcode" style="width:100%; padding:8px; margin-top:4px; margin-bottom:14px; border:1px solid #ccc; border-radius:8px;">

                <label>Client Code:</label>
                <input type="text" name="client_code" style="width:100%; padding:8px; margin-top:4px; margin-bottom:14px; border:1px solid #ccc; border-radius:8px;">

                <label>Department:</label>
                <input type="text" name="department" style="width:100%; padding:8px; margin-top:4px; margin-bottom:14px; border:1px solid #ccc; border-radius:8px;">

                <label>Number of Slides & Blocks:</label>
                <input type="number" name="slides_blocks" style="width:100%; padding:8px; margin-top:4px; margin-bottom:14px; border:1px solid #ccc; border-radius:8px;">
            </div>

            <!-- SECTION 2 -->
            <div style="border-left: 5px solid #8e44ad; padding-left: 15px; margin-bottom: 20px;">
                <label>Handed Over By (Employee) Name:</label>
                <input type="text" name="employee_name" style="width:100%; padding:8px; margin-top:4px; margin-bottom:14px; border:1px solid #ccc; border-radius:8px;">

                <label>Signature:</label>
                <input type="text" name="employee_signature" style="width:100%; padding:8px; margin-top:4px; margin-bottom:14px; border:1px solid #ccc; border-radius:8px;">
            </div>

            <!-- IMPORTANT NOTE -->
            <div style="background:#fff7cc; padding:12px 16px; border-radius:10px; margin-bottom:25px;">
                Kindly acknowledge the receipt of the above-mentioned slides & blocks.
            </div>

            <!-- RECEIVER SECTION -->
            <div style="border-left: 5px solid #b76ce6; padding-left: 15px; margin-bottom: 20px;">

                <label>Receiver Name:</label>
                <input type="text" name="receiver_name" style="width:100%; padding:8px; margin-top:4px; margin-bottom:14px; border:1px solid #ccc; border-radius:8px;">

                <label>Signature:</label>
                <input type="text" name="receiver_signature" style="width:100%; padding:8px; margin-top:4px; margin-bottom:14px; border:1px solid #ccc; border-radius:8px;">

                <label>Type of ID Proof Provided:</label>
                <input type="text" name="id_proof" style="width:100%; padding:8px; margin-top:4px; margin-bottom:14px; border:1px solid #ccc; border-radius:8px;">

                <label>Mobile No.:</label>
                <input type="text" name="mobile" style="width:100%; padding:8px; margin-top:4px; margin-bottom:14px; border:1px solid #ccc; border-radius:8px;">
            </div>

        </div>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HP/REG-001"
        docNo="TDPL/HP/REG-001"
        docName="Histopathology Work Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <table style="width:100%; border-collapse:collapse; border:1px solid #000;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px;">S. No.</th>
                    <th style="border:1px solid #000; padding:6px;">Date</th>
                    <th style="border:1px solid #000; padding:6px;">HP No</th>
                    <th style="border:1px solid #000; padding:6px;">Patient Name</th>
                    <th style="border:1px solid #000; padding:6px;">Age/Sex</th>
                    <th style="border:1px solid #000; padding:6px;">SIN No.</th>
                    <th style="border:1px solid #000; padding:6px;">Specimen</th>
                    <th style="border:1px solid #000; padding:6px;">Diagnosis</th>
                    <th style="border:1px solid #000; padding:6px;">HOD Sign</th>
                </tr>
            </thead>

            <tbody>
                @for($i = 1; $i <= 5; $i++)
                    <tr>
                    <td style="border:1px solid #000; padding:6px; text-align:center;">
                        {{ $i }}
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="date" name="rows[{{ $i }}][date]"
                            style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $i }}][hp_no]"
                            style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $i }}][patient_name]"
                            style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $i }}][age_sex]"
                            placeholder="45/M"
                            style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $i }}][sin_no]"
                            style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $i }}][specimen]"
                            style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $i }}][diagnosis]"
                            style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $i }}][hod_sign]"
                            style="width:100%; border:0; outline:none;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HP/REG-002"
        docNo="TDPL/HP/REG-002"
        docName="Histopathology Clinical Correlation Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <table style="width:100%; border-collapse:collapse; border:1px solid #000;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px;">S. No.</th>
                    <th style="border:1px solid #000; padding:6px;">Date</th>
                    <th style="border:1px solid #000; padding:6px;">SIN No.</th>
                    <th style="border:1px solid #000; padding:6px;">Patient Name</th>
                    <th style="border:1px solid #000; padding:6px;">Age/Sex</th>
                    <th style="border:1px solid #000; padding:6px;">Clinical History</th>
                    <th style="border:1px solid #000; padding:6px;">Site</th>
                    <th style="border:1px solid #000; padding:6px;">Histopathology No. & Impression</th>
                    <th style="border:1px solid #000; padding:6px;">Cytopathology No. & Impression</th>
                    <th style="border:1px solid #000; padding:6px;">Correlated / Not Correlated</th>
                    <th style="border:1px solid #000; padding:6px;">Remarks</th>
                    <th style="border:1px solid #000; padding:6px;">HOD Sign</th>
                </tr>
            </thead>

            <tbody>
                @for($row = 1; $row <= 6; $row++)
                    <tr>
                    <td style="border:1px solid #000; padding:6px; text-align:center;">
                        {{ $row }}
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="date" name="rows[{{ $row }}][date]"
                            style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $row }}][sin_no]"
                            style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $row }}][patient_name]"
                            style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" placeholder="45/M"
                            name="rows[{{ $row }}][age_sex]"
                            style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <textarea name="rows[{{ $row }}][clinical_history]"
                            style="width:100%; height:40px; border:0; outline:none;"></textarea>
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $row }}][site]"
                            style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <textarea name="rows[{{ $row }}][hp_impression]"
                            style="width:100%; height:40px; border:0; outline:none;"></textarea>
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <textarea name="rows[{{ $row }}][cyto_impression]"
                            style="width:100%; height:40px; border:0; outline:none;"></textarea>
                    </td>

                    <td style="border:1px solid #000; padding:6px; text-align:center;">
                        <select name="rows[{{ $row }}][correlation]"
                            style="width:100%; border:0; outline:none;">
                            <option value="">-- Select --</option>
                            <option value="Correlated">Correlated</option>
                            <option value="Not Correlated">Not Correlated</option>
                        </select>
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <textarea name="rows[{{ $row }}][remarks]"
                            style="width:100%; height:40px; border:0; outline:none;"></textarea>
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $row }}][hod_sign]"
                            style="width:100%; border:0; outline:none;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HP/REG-003"
        docNo="TDPL/HP/REG-003"
        docName="Slides and Blocks Return Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table style="width:100%; border-collapse:collapse; border:1px solid #000;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px;">S. No.</th>
                    <th style="border:1px solid #000; padding:6px;">Date</th>
                    <th style="border:1px solid #000; padding:6px;">SIN No.</th>
                    <th style="border:1px solid #000; padding:6px;">Patient Name</th>
                    <th style="border:1px solid #000; padding:6px;">Age/Sex</th>
                    <th style="border:1px solid #000; padding:6px;">Histopathology Number / Blocks / Slides</th>
                    <th style="border:1px solid #000; padding:6px;">Handover By Signature</th>
                    <th style="border:1px solid #000; padding:6px;">Received By Signature & Contact No.</th>
                    <th style="border:1px solid #000; padding:6px;">Remarks</th>
                    <th style="border:1px solid #000; padding:6px;">HOD Sign</th>
                </tr>
            </thead>

            <tbody>
                @for($row = 1; $row <= 5; $row++)
                    <tr>
                    <!-- S No -->
                    <td style="border:1px solid #000; padding:6px; text-align:center;">
                        {{ $row }}
                    </td>

                    <!-- Date -->
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="date" name="rows[{{ $row }}][date]"
                            style="width:100%; border:0; outline:none;">
                    </td>

                    <!-- SIN No -->
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $row }}][sin_no]"
                            style="width:100%; border:0; outline:none;">
                    </td>

                    <!-- Patient Name -->
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $row }}][patient_name]"
                            style="width:100%; border:0; outline:none;">
                    </td>

                    <!-- Age/Sex -->
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" placeholder="45/M"
                            name="rows[{{ $row }}][age_sex]"
                            style="width:100%; border:0; outline:none;">
                    </td>

                    <!-- Histopathology Blocks / Slides -->
                    <td style="border:1px solid #000; padding:6px;">
                        <textarea name="rows[{{ $row }}][hp_details]"
                            style="width:100%; height:40px; border:0; outline:none;"></textarea>
                    </td>

                    <!-- Handover By Signature -->
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $row }}][handover_sign]"
                            style="width:100%; border:0; outline:none;">
                    </td>

                    <!-- Received By Signature & Contact No -->
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" placeholder="Signature / Mobile"
                            name="rows[{{ $row }}][received_by]"
                            style="width:100%; border:0; outline:none;">
                    </td>

                    <!-- Remarks -->
                    <td style="border:1px solid #000; padding:6px;">
                        <textarea name="rows[{{ $row }}][remarks]"
                            style="width:100%; height:40px; border:0; outline:none;"></textarea>
                    </td>

                    <!-- HOD Sign -->
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="rows[{{ $row }}][hod_sign]"
                            style="width:100%; border:0; outline:none;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HP/REG-004"
        docNo="TDPL/HP/REG-004"
        docName="Sample Labelling Errors Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table style="width:100%; border-collapse: collapse;" border="1">
            <thead>
                <tr style="background:#f2f2f2; text-align:center;">
                    <th style="border:1px solid #000; padding:6px;"><strong>S. No.</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Date</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>SIN No.</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Details of Labelling Error</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Labelling Error Done By</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Corrective Action Done</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Status</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Sign</strong></th>
                </tr>
            </thead>

            <tbody>
                @foreach(range(1,7) as $i)
                <tr>
                    <td style="padding:6px; text-align:center;">
                        <input type="text" name="rows[{{ $i }}][sno]"
                            style="width:100%; border:0; text-align:center;">
                    </td>

                    <td style="padding:6px;">
                        <input type="date" name="rows[{{ $i }}][date]"
                            style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][sin_no]"
                            style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][label_error]"
                            style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][error_by]"
                            style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][corrective_action]"
                            style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][status]"
                            style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][sign]"
                            style="width:100%; border:0;">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HP/REG-005"
        docNo="TDPL/HP/REG-005"
        docName="Decalcification Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <p><strong>Month & Year:</strong>
            <input type="date" name="date" style="border:1px solid #000; padding:4px;">
        </p>
        <table style="width:100%; border-collapse: collapse;" border="1">
            <thead>
                <tr style="background:#f2f2f2; text-align:center;">
                    <th style="border:1px solid #000; padding:6px;"><strong>S. No.</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Date</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>SIN</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>HP No.</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Patient Name</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Age/Sex</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Site of Biopsy</strong></th>
                    <th style="border:1px solid #000; padding:6px;">
                        <strong>Decalcification on:</strong><br>
                        <strong>Start Date</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px;">
                        <strong>Decalcification on:</strong><br>
                        <strong>Completed Date</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Reagent Used</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Remarks</strong></th>
                </tr>
            </thead>

            <tbody>

                @foreach(range(1,5) as $i)
                <tr>
                    <td style="padding:5px; text-align:center;">
                        <input type="text" name="rows[{{ $i }}][sno]"
                            style="width:100%; border:0; text-align:center;">
                    </td>

                    <td style="padding:5px;">
                        <input type="date" name="rows[{{ $i }}][date]"
                            style="width:100%; border:0;">
                    </td>

                    <td style="padding:5px;">
                        <input type="text" name="rows[{{ $i }}][sin]"
                            style="width:100%; border:0;">
                    </td>

                    <td style="padding:5px;">
                        <input type="text" name="rows[{{ $i }}][hp_no]"
                            style="width:100%; border:0;">
                    </td>

                    <td style="padding:5px;">
                        <input type="text" name="rows[{{ $i }}][patient_name]"
                            style="width:100%; border:0;">
                    </td>

                    <td style="padding:5px;">
                        <input type="text" name="rows[{{ $i }}][age_sex]"
                            style="width:100%; border:0;">
                    </td>

                    <td style="padding:5px;">
                        <input type="text" name="rows[{{ $i }}][site_of_biopsy]"
                            style="width:100%; border:0;">
                    </td>

                    <td style="padding:5px;">
                        <input type="date" name="rows[{{ $i }}][start_date]"
                            style="width:100%; border:0;">
                    </td>

                    <td style="padding:5px;">
                        <input type="date" name="rows[{{ $i }}][completed_date]"
                            style="width:100%; border:0;">
                    </td>

                    <td style="padding:5px;">
                        <input type="text" name="rows[{{ $i }}][reagent]"
                            style="width:100%; border:0;">
                    </td>

                    <td style="padding:5px;">
                        <input type="text" name="rows[{{ $i }}][remarks]"
                            style="width:100%; border:0;">
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HP/REG-006"
        docNo="TDPL/HP/REG-006"
        docName=" Slides Storage Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table style="width:100%; border-collapse: collapse;" border="1">

            <thead>
                <tr style="background:#f2f2f2; text-align:center;">
                    <th rowspan="2" style="border:1px solid #000; padding:6px;"><strong>S. No.</strong></th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;"><strong>Cabinet Number</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Slides Serial Numbers</strong></th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;"><strong>Stored By</strong></th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;"><strong>Reviewed By</strong></th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;"><strong>HOD Signature</strong></th>
                </tr>

                <tr style="background:#f2f2f2; text-align:center;">
                    <th style="border:1px solid #000; padding:6px;"><strong>From &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; To</strong></th>
                </tr>
            </thead>

            <tbody>

                @foreach(range(1,12) as $i)
                <tr>

                    <!-- S. No. -->
                    <td style="padding:5px; text-align:center;">
                        <input type="text"
                            name="rows[{{ $i }}][sno]"
                            style="width:100%; border:0; text-align:center;">
                    </td>

                    <!-- Cabinet Number -->
                    <td style="padding:5px;">
                        <input type="text"
                            name="rows[{{ $i }}][cabinet_number]"
                            style="width:100%; border:0;">
                    </td>

                    <!-- Slides Serial Numbers From - To -->
                    <td style="padding:5px; display:flex; gap:6px; justify-content:space-between;">
                        <input type="text"
                            name="rows[{{ $i }}][slide_from]"
                            style="width:48%; border:0;">

                        <input type="text"
                            name="rows[{{ $i }}][slide_to]"
                            style="width:48%; border:0;">
                    </td>

                    <!-- Stored By -->
                    <td style="padding:5px;">
                        <input type="text"
                            name="rows[{{ $i }}][stored_by]"
                            style="width:100%; border:0;">
                    </td>

                    <!-- Reviewed By -->
                    <td style="padding:5px;">
                        <input type="text"
                            name="rows[{{ $i }}][reviewed_by]"
                            style="width:100%; border:0;">
                    </td>

                    <!-- HOD Signature -->
                    <td style="padding:5px;">
                        <input type="text"
                            name="rows[{{ $i }}][hod_signature]"
                            style="width:100%; border:0;">
                    </td>

                </tr>
                @endforeach

            </tbody>

        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HP/REG-007"
        docNo="TDPL/HP/REG-007"
        docName="Blocks Storage Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table style="width:100%; border-collapse: collapse;" border="1">

            <thead>
                <tr style="background:#f2f2f2; text-align:center;">
                    <th rowspan="2" style="border:1px solid #000; padding:6px;"><strong>S. No.</strong></th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;"><strong>Cabinet Number</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Block Serial Numbers</strong></th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;"><strong>Stored By</strong></th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;"><strong>Reviewed By</strong></th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;"><strong>HOD Signature</strong></th>
                </tr>

                <tr style="background:#f2f2f2; text-align:center;">
                    <th style="border:1px solid #000; padding:6px;"><strong>From &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; To</strong></th>
                </tr>
            </thead>

            <tbody>

                @foreach(range(1,12) as $i)
                <tr>

                    <!-- S. No. -->
                    <td style="padding:5px; text-align:center;">
                        <input type="text"
                            name="rows[{{ $i }}][sno]"
                            style="width:100%; border:0; text-align:center;">
                    </td>

                    <!-- Cabinet Number -->
                    <td style="padding:5px;">
                        <input type="text"
                            name="rows[{{ $i }}][cabinet_number]"
                            style="width:100%; border:0;">
                    </td>

                    <!-- Slides Serial Numbers From - To -->
                    <td style="padding:5px; display:flex; gap:6px; justify-content:space-between;">
                        <input type="text"
                            name="rows[{{ $i }}][slide_from]"
                            style="width:48%; border:0;">

                        <input type="text"
                            name="rows[{{ $i }}][slide_to]"
                            style="width:48%; border:0;">
                    </td>

                    <!-- Stored By -->
                    <td style="padding:5px;">
                        <input type="text"
                            name="rows[{{ $i }}][stored_by]"
                            style="width:100%; border:0;">
                    </td>

                    <!-- Reviewed By -->
                    <td style="padding:5px;">
                        <input type="text"
                            name="rows[{{ $i }}][reviewed_by]"
                            style="width:100%; border:0;">
                    </td>

                    <!-- HOD Signature -->
                    <td style="padding:5px;">
                        <input type="text"
                            name="rows[{{ $i }}][hod_signature]"
                            style="width:100%; border:0;">
                    </td>

                </tr>
                @endforeach

            </tbody>

        </table>
    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HP/REG-008"
        docNo="TDPL/HP/REG-008"
        docName="Histopathology Grossing Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table style="width:100%; border-collapse: collapse;" border="1">

            <thead>
                <tr style="background:#f2f2f2; text-align:center;">
                    <th style="border:1px solid #000; padding:6px;"><strong>Date</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>HP Number</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Alphabets</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Doctor Name & Date</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Technician Signature</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>HOD Signature</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Remarks</strong></th>
                </tr>
            </thead>

            <tbody>

                @foreach(range(1,15) as $i)
                <tr>

                    <!-- Date -->
                    <td style="padding:5px;">
                        <input type="date"
                            name="rows[{{ $i }}][date]"
                            style="width:100%; border:0;">
                    </td>

                    <!-- HP Number -->
                    <td style="padding:5px;">
                        <input type="text"
                            name="rows[{{ $i }}][hp_number]"
                            style="width:100%; border:0;">
                    </td>

                    <!-- Alphabets -->
                    <td style="padding:5px;">
                        <input type="text"
                            name="rows[{{ $i }}][alphabets]"
                            style="width:100%; border:0;">
                    </td>

                    <!-- Doctor Name & Date -->
                    <td style="padding:5px;">
                        <input type="text"
                            name="rows[{{ $i }}][doctor_name_date]"
                            placeholder="Doctor Name, Date"
                            style="width:100%; border:0;">
                    </td>

                    <!-- Technician Signature -->
                    <td style="padding:5px;">
                        <input type="text"
                            name="rows[{{ $i }}][technician_signature]"
                            style="width:100%; border:0;">
                    </td>

                    <!-- HOD Signature -->
                    <td style="padding:5px;">
                        <input type="text"
                            name="rows[{{ $i }}][hod_signature]"
                            style="width:100%; border:0;">
                    </td>

                    <!-- Remarks -->
                    <td style="padding:5px;">
                        <input type="text"
                            name="rows[{{ $i }}][remarks]"
                            style="width:100%; border:0;">
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