@extends('layouts.base')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BE</title>
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
            <div style="font-size: 20px; ">BE </div>

        </div>
        <div class="icon-view">
            <div class="pc-content">
                <div class="pc-folder" onclick="showSection('TDPL-BC-FOM-001')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Matermal Marker & Pre-eclampsia TRF</span>
                </div>

                <div class="pc-folder" onclick="showSection('TDPL/BE/FOM-0##')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Daily QC Form for Hot Plate Maintenance</span>
                </div>

                <div class="pc-folder" onclick="showSection('TDPL/BE/FOM-006')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Bio Safety Cabinet Maintenance Form</span>
                </div>

                <div class="pc-folder" onclick="showSection('TDPL/BE-FOM-007')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Hot Air Oven Temperature Monitoring Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/BE-FOM-008')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Incubator Temperature Monitoring Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/BE-FOM-009')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Laminar Air Flow Maintenance Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/BE/FOM-010')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Autoclave Maintenance Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/BE/FOM-012')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Hot Air Oven Maintenance Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/BE/FOM-013')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Incubator Maintenance Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/BE/FOM-014')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Centrifuge Maintenance Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/BE/FOM-015')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Beckman Coulter DXC700AU Maintenance Form</span>
                </div>

                <div class="pc-folder" onclick="showSection('TDPL/BE/FOM-016')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Beckman Coulter DxI800 Maintenance Form</span>
                </div>

                <div class="pc-folder" onclick="showSection('TDPL/BE/FOM-017')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Sensa Core aQua ST-200 Maintenance Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/BE/FOM-018')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Tosoh HLC-723GX Maintenance Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/BE/FOM-019')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Beckman Coulter DXH560 Maintenance Form</span>
                </div>

                <div class="pc-folder" onclick="showSection('TDPL/BE/FOM-020')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">HORIBA Yumizen H550 Maintenance Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/BE/FOM-021')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Bio-Rad D10 Maintenance Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/BE/FOM-022')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Automatic Tissue Processor Maintenance Form</span>
                </div>

                <div class="pc-folder" onclick="showSection('TDPL/BE/FOM-023')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Tissue Embedding Console System Equipment Maintenance Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/BE/FOM-024')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Bact Alert Maintenance Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/BE/FOM-025')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Vitek 2 Maintenance Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/BE/FOM-026')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Elisa Reader Maintenance Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/BE/FOM-028')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Real Time PCR Maintenance Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/BE/FOM-029')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Cooling Centrifuge Maintenance Form</span>
                </div>

                <div class="pc-folder" onclick="showSection('TDPL/BE/FOM-034')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Microscope Maintenance Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/BE/FOM-035')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Laura M Maintenance Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/BE/FOM-036')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Microtome Maintenance Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/BE/FOM-037')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Flotation Bath Maintenance Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/BE/FOM-038')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Grossing Station Maintenance Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/BE/REG-001')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Equipment Breakdown Maintenance Register</span>
                </div>
            </div>
        </div>
    </div>


    <x-formTemplete
        id="TDPL-BC-FOM-001"
        docNo="TDPL-BC-FOM-001"
        docName="Matermal Marker & Pre-eclampsia TRF"
        issueNo="1.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <p><strong>MATERNAL SERUM / PRE-ECLAMPSIA SCREENING</strong></p>

        <table style="width:100%; border-collapse: collapse;" border="1" cellpadding="6">
            <tbody>

                <!-- Requester Information -->
                <tr>
                    <td colspan="3"><strong>Requester Information:</strong></td>
                </tr>

                <tr>
                    <td colspan="3">
                        Physician's Name: <input type="text" class="border p-1 w-48">
                        Mobile No: <input type="text" class="border p-1 w-40"><br>

                        Client Name: <input type="text" class="border p-1 w-48">
                        Client Code: <input type="text" class="border p-1 w-40">
                    </td>
                </tr>

                <!-- Test Panels -->
                <tr>
                    <td colspan="3"><strong>Test Panels:</strong></td>
                </tr>

                <tr>
                    <td colspan="3">
                        <p>
                            <input type="checkbox"> Maternal Screening &nbsp;
                            <input type="checkbox"> First Trimester - Dual Marker &nbsp;
                            <input type="checkbox"> Second Trimester - Triple Marker &nbsp;
                            <input type="checkbox"> Quad Marker (15–20 Weeks)
                        </p>
                        <p>
                            <input type="checkbox"> Pre-Eclampsia Screening &nbsp;
                            <input type="checkbox"> 1T Quad Test
                        </p>
                        <p>
                            <input type="checkbox"> PAPP-A, Free BHCG, PLGF, NT (11–13 Weeks + 6 days)
                        </p>
                    </td>
                </tr>

                <!-- Clinical History -->
                <tr>
                    <td colspan="3"><strong>Clinical History:</strong></td>
                </tr>

                <tr>
                    <td colspan="3">
                        Name of Patient: <input type="text" class="border p-1 w-48">
                        Age: <input type="number" class="border p-1 w-20">
                        DOB: <input type="date" class="border p-1 w-40">
                        Mobile: <input type="text" class="border p-1 w-40">
                        Email: <input type="email" class="border p-1 w-48"><br><br>

                        Weight (kgs): <input type="number" class="border p-1 w-24">
                        Ethnicity: <input type="text" class="border p-1 w-40">
                        LMP: <input type="date" class="border p-1 w-40"><br><br>

                        Diabetic Status: <input type="text" class="border p-1 w-32">
                        Chronic Hypertension: <input type="text" class="border p-1 w-40"><br><br>

                        On Medication (Y/N):
                        <select class="border p-1">
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                        </select>

                        If Yes, Specify: <input type="text" class="border p-1 w-64"><br><br>

                        Smoking:
                        <select class="border p-1">
                            <option>Not Known</option>
                            <option>Non-Smoker</option>
                            <option>Smoker</option>
                        </select><br><br>

                        <strong>Blood Pressure:</strong>
                        Date: <input type="date" class="border p-1">
                        Right Arm: <input type="text" class="border p-1 w-32">
                        Left Arm: <input type="text" class="border p-1 w-32">
                    </td>
                </tr>

                <!-- USG Details -->
                <tr>
                    <td colspan="3"><strong>USG Details:</strong></td>
                </tr>

                <tr>
                    <td colspan="3">
                        Date of Sample Collection: <input type="date" class="border p-1">
                        Time: <input type="time" class="border p-1">
                        Date of Ultrasound: <input type="date" class="border p-1">
                    </td>
                </tr>

                <!-- Marker Table -->
                <tr>
                    <td><strong>Marker</strong></td>
                    <td><strong>Single / Twin - A</strong></td>
                    <td><strong>Twin - B</strong></td>
                </tr>

                <tr>
                    <td>CRL (MM)</td>
                    <td><input type="text" class="border p-1 w-full"></td>
                    <td><input type="text" class="border p-1 w-full"></td>
                </tr>

                <tr>
                    <td>NT</td>
                    <td><input type="text" class="border p-1 w-full"></td>
                    <td><input type="text" class="border p-1 w-full"></td>
                </tr>

                <tr>
                    <td>NB</td>
                    <td><input type="text" class="border p-1 w-full"></td>
                    <td><input type="text" class="border p-1 w-full"></td>
                </tr>

                <tr>
                    <td>BPD</td>
                    <td><input type="text" class="border p-1 w-full"></td>
                    <td><input type="text" class="border p-1 w-full"></td>
                </tr>

                <!-- Uterine Artery -->
                <tr>
                    <td colspan="3">
                        <strong>Uterine Artery PI</strong>
                        Left: <input type="text" class="border p-1 w-24">
                        Right: <input type="text" class="border p-1 w-24">
                    </td>
                </tr>

                <!-- IVF Pregnancy -->
                <tr>
                    <td colspan="3"><strong>IVF Pregnancy:</strong></td>
                </tr>

                <tr>
                    <td colspan="3">
                        Donor Age: <input type="number" class="border p-1 w-20">
                        Donor DOB: <input type="date" class="border p-1">
                        Type of IVF: <input type="text" class="border p-1 w-40"><br><br>

                        Extraction Date: <input type="date" class="border p-1">
                        Transfer Date: <input type="date" class="border p-1">
                        HCG Injection Taken:
                        <select class="border p-1">
                            <option>No</option>
                            <option>Yes</option>
                        </select>

                        If Yes, Date: <input type="date" class="border p-1">
                    </td>
                </tr>

            </tbody>
        </table>

        <br>

        <!-- Consent -->
        <p><strong>Patient's Consent</strong></p>
        <p class="border p-2 w-full" rows="8">I have read and understood your prenatal screening consent form. I understand that this test represents only the risks and not actual diagnostic outcomes - Increased risk does not mean that the baby is affected and further tests must be performed before a ﬁrm diagnosis can be made; A low risk does not exclude possibility of Down’s syndrome or other abnormalities, as risk assessment does not detect all affected pregnancies. I understand that therapeutic decisions should not be made based solely on screening results. I give my consent that the specimen(s) shall be the sole exclusive property of TRUSTlab Diagnostics, and I transfer all my rights on those specimens to TRUSTlab Diagnostics, for its commercial and research use. I understand that you may contact me for patient outcome information. I give my permission as required in order to process my claim. I do not object to this information being transmitted through mail, fax, telephone or mobile. I also know that I may be called to give follow up information about the pregnancy and I give my consent for the same. The referring doctor has explained the details of the screening program to me, and I herewith give my consent for this test.

        </p>

        <br><br>

        Patient’s Signature: <input type="text" class="border p-1 w-48">
        Date: <input type="date" class="border p-1">

        <br><br>

        <!-- Notes -->
        <p><strong>NOTE:</strong> Requirements as per test:</p>

        <p>
            Quad Marker / Pre-eclampsia Screening: Complete USG report with PI values, CRL, NT, NB, BP (both arms)
        </p>

        <p>
            Dual Marker: LMP, DOB, Weight, CRL, NT, NB
            Triple Marker: LMP, DOB, Weight, CRL, BPD
        </p>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/BE/FOM-0##"
        docNo="TDPL/BE/FOM-0##"
        docName="Daily QC Form for Hot Plate Maintenance"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <style>
            .qc-table,
            .qc-table td,
            .qc-table th {
                border: 1px solid #000;
                border-collapse: collapse;
            }

            .qc-table td {
                padding: 4px;
                text-align: center;
            }

            .qc-input {
                width: 70px;
                padding: 4px;
                border: 1px solid #aaa;
                border-radius: 4px;
            }

            .qc-input-wide {
                width: 100%;
                padding: 4px;
                border: 1px solid #aaa;
                border-radius: 4px;
            }
        </style>

        <!-- ================= HEADER TABLE ================= -->



        <p>
            <strong>Month & Year:</strong>
            <input type="month" class="qc-input">

            &nbsp;&nbsp;

            <strong>Instrument S. No.:</strong>
            <input type="text" class="qc-input">
        </p>

        <!-- ================= MAIN TABLE ================= -->

        <table class="qc-table" style="width: 100%;">
            <tbody>
                <tr>
                    <th><strong>Date</strong></th>

                    @for ($d = 1; $d <= 31; $d++)
                        <th><strong>{{ $d }}</strong></th>
                        @endfor
                </tr>

                <!-- Cleaning Row -->
                <tr>
                    <td><strong>Cleaning From Outside</strong></td>

                    @for ($d = 1; $d <= 31; $d++)
                        <td><input type="text" class="qc-input"></td>
                        @endfor
                </tr>

                <!-- Temperature Row -->
                <tr>
                    <td><strong>Temperature Check</strong></td>

                    @for ($d = 1; $d <= 31; $d++)
                        <td><input type="text" class="qc-input"></td>
                        @endfor
                </tr>

                <!-- Lab Staff -->
                <tr>
                    <td><strong>Lab Staff Signature</strong></td>

                    @for ($d = 1; $d <= 31; $d++)
                        <td><input type="text" class="qc-input"></td>
                        @endfor
                </tr>

                <!-- Supervisor -->
                <tr>
                    <td><strong>Lab Supervisor Signature</strong></td>

                    @for ($d = 1; $d <= 31; $d++)
                        <td><input type="text" class="qc-input"></td>
                        @endfor
                </tr>
            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/BE/FOM-006"
        docNo="TDPL/BE/FOM-006"
        docName="Bio Safety Cabinet Maintenance Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">


        <!-- ================= DETAILS ================= -->

        <p>
            <strong>Department:</strong>
            <input type="text" class="qc-input" style="width: 200px;">

            &nbsp;&nbsp;&nbsp;

            <strong>Month & Year:</strong>
            <input type="month" class="qc-input" style="width: 180px;">

            &nbsp;&nbsp;&nbsp;

            <strong>Equipment ID:</strong>
            <input type="text" class="qc-input" style="width: 180px;">
        </p>

        <br>

        <!-- ================= MAIN TABLE ================= -->

        <table class="qc-table" style="width: 100%;">
            <tbody>

                <!-- HEADER ROW 1 -->
                <tr>
                    <th rowspan="3"><strong>Date</strong></th>
                    <th rowspan="3"><strong>Clean<br>with 70% Isopropyl Alcohol</strong></th>
                    <th rowspan="3"><strong>UV Light 15 mins</strong></th>
                    <th rowspan="3"><strong>Manometer Reading<br>(10±1)</strong></th>
                    <th rowspan="3"><strong>Done By<br>Sign</strong></th>
                    <th rowspan="3"><strong>Availability of<br>1% Hypo Container</strong></th>

                    <th></th>
                    <th></th>

                    <th colspan="3"><strong>Weekly Maintenance</strong></th>

                    <th></th>
                    <th></th>
                </tr>

                <!-- HEADER ROW 2 -->
                <tr>
                    <th rowspan="2"><strong>Test for Settle plate done date</strong></th>

                    <th colspan="3"><strong>Settle Plate Results<br>(0–5 CFU)</strong></th>

                    <th rowspan="2"><strong>UV Efficacy</strong></th>
                    <th rowspan="2"><strong>Checked<br>By Sign</strong></th>
                    <th rowspan="2"><strong>Remarks</strong></th>
                </tr>

                <!-- HEADER ROW 3 -->
                <tr>
                    <th><strong>Yes</strong></th>
                    <th><strong>No</strong></th>
                    <th><strong>CFU</strong></th>
                </tr>

                <!-- ================= GENERATE DAYS 1–31 ================= -->
                @for ($d = 1; $d <= 31; $d++)
                    <tr>
                    <td><strong>{{ $d }}</strong></td>

                    <!-- Main Daily Columns -->
                    <td><input type="text" class="qc-input"></td>
                    <td><input type="text" class="qc-input"></td>
                    <td><input type="text" class="qc-input"></td>
                    <td><input type="text" class="qc-input"></td>
                    <td><input type="text" class="qc-input"></td>

                    <!-- Settle plate date -->
                    <td><input type="date" class="qc-input"></td>

                    <!-- Weekly maintenance results -->
                    <td><input type="checkbox"></td>
                    <td><input type="checkbox"></td>
                    <td><input type="text" class="qc-input" placeholder="0-5"></td>

                    <!-- UV Efficacy -->
                    <td><input type="text" class="qc-input"></td>

                    <!-- Checked by sign -->
                    <td><input type="text" class="qc-input"></td>

                    <!-- Remarks -->
                    <td><input type="text" class="qc-input"></td>
                    </tr>
                    @endfor

            </tbody>
        </table>


    </x-formTemplete>

    <x-formTemplete
        id="TDPL/BE-FOM-007"
        docNo="TDPL/BE-FOM-007"
        docName="Hot Air Oven Temperature Monitoring Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <style>
            .tlog-table,
            .tlog-table td,
            .tlog-table th {
                border: 1px solid #000;
                border-collapse: collapse;
            }

            .tlog-table td,
            .tlog-table th {
                padding: 4px;
                text-align: center;
            }

            .tlog-input {
                width: 100%;
                padding: 4px;
                border: 1px solid #999;
                border-radius: 4px;
            }
        </style>

        <p>
            <strong>Month/Year:</strong>
            <input type="month" class="tlog-input" style="width:180px;">

            &nbsp;&nbsp;&nbsp;

            <strong>Instrument ID/No.:</strong>
            <input type="text" class="tlog-input" style="width:200px;">
        </p>

        <br>

        <table class="tlog-table" style="width:100%;">
            <tbody>

                <!-- Header Row -->
                <tr>
                    <th rowspan="2"><strong>Date</strong></th>
                    <th colspan="2"><strong>Morning</strong></th>
                    <th colspan="2"><strong>Evening</strong></th>
                </tr>
                <tr>
                    <th><strong>Temperature</strong></th>
                    <th><strong>Signature</strong></th>
                    <th><strong>Temperature</strong></th>
                    <th><strong>Signature</strong></th>
                </tr>

                <!-- Generate Days 1–31 -->
                @for ($day = 1; $day <= 31; $day++)
                    <tr>
                    <td><strong>{{ $day }}</strong></td>

                    <!-- Morning Temp -->
                    <td><input type="text" class="tlog-input" placeholder="°C"></td>

                    <!-- Morning Sign -->
                    <td><input type="text" class="tlog-input"></td>

                    <!-- Evening Temp -->
                    <td><input type="text" class="tlog-input" placeholder="°C"></td>

                    <!-- Evening Sign -->
                    <td><input type="text" class="tlog-input"></td>
                    </tr>
                    @endfor

            </tbody>
        </table>

        <br>

        <p>
            <strong>Acceptable Temperature:</strong> +10°C to +25°C
        </p>

    </x-formTemplete>


    <x-formTemplete
        id="TDPL/BE-FOM-008"
        docNo="TDPL/BE-FOM-008"
        docName="Incubator Temperature Monitoring Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">


        <p>
            <strong>Month/Year:</strong>
            <input type="month" class="tlog-input" style="width:180px;">

            &nbsp;&nbsp;&nbsp;

            <strong>Instrument ID/No.:</strong>
            <input type="text" class="tlog-input" style="width:200px;">
        </p>

        <br>

        <table class="tlog-table" style="width:100%;">
            <tbody>

                <!-- Header Row -->
                <tr>
                    <th rowspan="2"><strong>Date</strong></th>
                    <th colspan="2"><strong>Morning</strong></th>
                    <th colspan="2"><strong>Evening</strong></th>
                </tr>
                <tr>
                    <th><strong>Temperature</strong></th>
                    <th><strong>Signature</strong></th>
                    <th><strong>Temperature</strong></th>
                    <th><strong>Signature</strong></th>
                </tr>

                <!-- Generate Days 1–31 -->
                @for ($day = 1; $day <= 31; $day++)
                    <tr>
                    <td><strong>{{ $day }}</strong></td>

                    <!-- Morning Temp -->
                    <td><input type="text" class="tlog-input" placeholder="°C"></td>

                    <!-- Morning Sign -->
                    <td><input type="text" class="tlog-input"></td>

                    <!-- Evening Temp -->
                    <td><input type="text" class="tlog-input" placeholder="°C"></td>

                    <!-- Evening Sign -->
                    <td><input type="text" class="tlog-input"></td>
                    </tr>
                    @endfor

            </tbody>
        </table>

        <br>

        <p>
            <strong>Acceptable Temperature:</strong> ~37ﹾC
        </p>

    </x-formTemplete>


    <x-formTemplete
        id="TDPL/BE-FOM-009"
        docNo="TDPL/BE-FOM-009"
        docName="Laminar Air Flow Maintenance Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <style>
            .maint-table,
            .maint-table th,
            .maint-table td {
                border: 1px solid #000;
                border-collapse: collapse;
                text-align: center;
                padding: 4px;
            }

            .input-box {
                width: 100%;
                padding: 4px;
                border: 1px solid #888;
                border-radius: 4px;
            }
        </style>

        <!-- Header section -->
        <p>
            <strong>Department:</strong>
            <input type="text" class="input-box" style="width: 200px;">

            &nbsp;&nbsp;&nbsp;&nbsp;

            <strong>Month & Year:</strong>
            <input type="month" class="input-box" style="width: 180px;">

            &nbsp;&nbsp;&nbsp;&nbsp;

            <strong>Equipment ID:</strong>
            <input type="text" class="input-box" style="width: 180px;">
        </p>

        <br>

        <table class="maint-table" style="width:100%;">

            <tr>
                <th rowspan="3">Date</th>
                <th rowspan="3">Clean<br>with 70% IPA</th>
                <th rowspan="3">UV<br>Light<br>15 mins</th>
                <th rowspan="3">Manometer Reading<br>(10±1)</th>
                <th rowspan="3">Done by<br>Sign</th>
                <th rowspan="3">Availability of<br>1% Hypo</th>
                <th colspan="4">Weekly Maintenance</th>
                <th rowspan="3" colspan="2">Checked by<br>Sign</th>
                <th rowspan="3">Remarks</th>
            </tr>

            <tr>
                <th rowspan="2">Test for Settle Plate<br>Done Date</th>
                <th colspan="2">Settle Plate Result<br>(0–5 CFU)</th>
                <th>UV Efficacy</th>
            </tr>

            <tr>
                <th>Yes</th>
                <th>No</th>
                <th></th>
            </tr>

            @for ($i = 1; $i <= 31; $i++)
                <tr>
                <td><strong>{{ $i }}</strong></td>

                <!-- Clean with 70% IPA -->
                <td><input type="checkbox"></td>

                <!-- UV Light -->
                <td><input type="checkbox"></td>

                <!-- Manometer -->
                <td><input type="text" class="input-box" placeholder="value"></td>

                <!-- Done by -->
                <td><input type="text" class="input-box"></td>

                <!-- Hypo -->
                <td>
                    <select class="input-box">
                        <option value="">Select</option>
                        <option>Available</option>
                        <option>Not Available</option>
                    </select>
                </td>

                <!-- Weekly Maintenance -->
                <td><input type="date" class="input-box"></td>

                <td><input type="radio" name="sp{{ $i }}" value="yes"></td>
                <td><input type="radio" name="sp{{ $i }}" value="no"></td>

                <td>
                    <select class="input-box">
                        <option value="">Select</option>
                        <option>OK</option>
                        <option>Not OK</option>
                    </select>
                </td>

                <!-- Checked by -->
                <td colspan="2"><input type="text" class="input-box"></td>

                <!-- Remarks -->
                <td><input type="text" class="input-box"></td>
                </tr>
                @endfor

        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/BE/FOM-010"
        docNo="TDPL/BE/FOM-010"
        docName="Autoclave Maintenance Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <style>
            .clean-table,
            .clean-table th,
            .clean-table td {
                border: 1px solid #000;
                border-collapse: collapse;
                text-align: center;
                padding: 4px;
            }

            .input-box {
                width: 100%;
                padding: 4px;
                border: 1px solid #777;
                border-radius: 4px;
            }
        </style>

        <p>
            <strong>Month & Year:</strong>
            <input type="month" class="input-box" style="width: 180px;">

            &nbsp;&nbsp;&nbsp;&nbsp;

            <strong>Instrument ID / S. No.:</strong>
            <input type="text" class="input-box" style="width: 200px;">
        </p>

        <br>

        <table class="clean-table" style="width: 100%;">
            <tr>
                <th>Date</th>
                <th>Cleaning of the Outside</th>
                <th>Chamber Water Change</th>
                <th>Cleaning of the Inside</th>
                <th>Check Power ON with Light</th>
                <th>Lab Staff Signature</th>
                <th>Lab Supervisor Signature</th>
            </tr>

            @for ($i = 1; $i <= 31; $i++)
                <tr>
                <td><strong>{{ $i }}</strong></td>

                <!-- Cleaning of Outside -->
                <td><input type="checkbox"></td>

                <!-- Chamber Water Change -->
                <td><input type="checkbox"></td>

                <!-- Cleaning Inside -->
                <td><input type="checkbox"></td>

                <!-- Check Power ON -->
                <td><input type="checkbox"></td>

                <!-- Lab Staff Signature -->
                <td><input type="text" class="input-box"></td>

                <!-- Lab Supervisor Signature -->
                <td><input type="text" class="input-box"></td>
                </tr>
                @endfor
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/BE/FOM-012"
        docNo="TDPL/BE/FOM-012"
        docName="Hot Air Oven Maintenance Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <p><strong>Month & Year:</strong> <input type="month">
            <strong>Instrument ID / S. No.:</strong> <input type="text">
        </p>

        <table border="1" cellpadding="5" cellspacing="0" width="100%" style="border-collapse: collapse; text-align:center;">
            <tr>
                <td><strong>Date</strong></td>
                @for ($i = 1; $i <= 31; $i++)
                    <td><strong>{{ $i }}</strong></td>
                    @endfor
            </tr>

            <tr>
                <td><strong>Cleaning from Outside</strong></td>
                @for ($i = 1; $i <= 31; $i++)
                    <td><input type="checkbox"></td>
                    @endfor
            </tr>

            <tr>
                <td><strong>Cleaning from Inside with Isopropyl Alcohol</strong></td>
                @for ($i = 1; $i <= 31; $i++)
                    <td><input type="checkbox"></td>
                    @endfor
            </tr>

            <tr>
                <td><strong>Temperature Check</strong></td>
                @for ($i = 1; $i <= 31; $i++)
                    <td><input type="checkbox"></td>
                    @endfor
            </tr>

            <tr>
                <td><strong>Check Power ON with Light</strong></td>
                @for ($i = 1; $i <= 31; $i++)
                    <td><input type="checkbox"></td>
                    @endfor
            </tr>

            <tr>
                <td><strong>Lab Staff Signature</strong></td>
                @for ($i = 1; $i <= 31; $i++)
                    <td><input type="text" style="width: 70px;"></td>
                    @endfor
            </tr>

            <tr>
                <td><strong>Lab Supervisor Signature</strong></td>
                @for ($i = 1; $i <= 31; $i++)
                    <td><input type="text" style="width: 70px;"></td>
                    @endfor
            </tr>
        </table>
        <br><br>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/BE/FOM-013"
        docNo="TDPL/BE/FOM-013"
        docName="Incubator Maintenance Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <p>
            <strong>Month & Year:</strong>
            <input type="month" class="qc-input">

            &nbsp;&nbsp;

            <strong>Instrument S. No.:</strong>
            <input type="text" class="qc-input">
        </p>
        <table border="1" cellpadding="6" cellspacing="0" style="border-collapse: collapse; width: 100%; text-align: center;">
            <tbody>
                <tr style="background:#f2f2f2;">
                    <td><strong>Date</strong></td>
                    <td><strong>Cleaning of the Outside</strong></td>
                    <td><strong>Cleaning of the Inside</strong></td>
                    <td><strong>Temperature Check</strong></td>
                    <td><strong>Check Power On with Light</strong></td>
                    <td><strong>Lab Staff Signature</strong></td>
                    <td><strong>Lab Supervisor Signature</strong></td>
                </tr>

                <!-- Generate rows 1 to 31 -->
                @for ($i = 1; $i <= 31; $i++)
                    <tr>
                    <td><strong>{{ $i }}</strong></td>
                    <td><input type="text" name="outside_{{ $i }}" style="width:100%; "></td>
                    <td><input type="text" name="inside_{{ $i }}" style="width:100%; "></td>
                    <td><input type="text" name="temp_{{ $i }}" style="width:100%; "></td>
                    <td><input type="text" name="power_{{ $i }}" style="width:100%; "></td>
                    <td><input type="text" name="staff_{{ $i }}" style="width:100%; "></td>
                    <td><input type="text" name="supervisor_{{ $i }}" style="width:100%; "></td>
                    </tr>
                    @endfor

            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/BE/FOM-014"
        docNo="TDPL/BE/FOM-014"
        docName="Centrifuge Maintenance Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <p>
            <strong>Month & Year:</strong>
            <input type="month" class="qc-input">

            &nbsp;&nbsp;

            <strong>Instrument S. No.:</strong>
            <input type="text" class="qc-input">
        </p>
        <table border="1" cellpadding="6" cellspacing="0" style="border-collapse: collapse; width:100%; text-align:center;">
            <tbody>

                <!-- DATE HEADER -->
                <tr>
                    <td><strong>Date</strong></td>
                    @for ($d = 1; $d <= 31; $d++)
                        @if (in_array($d, [8,16,24]))
                        <td colspan="2"><strong>{{ $d }}</strong></td>
                        @else
                        <td><strong>{{ $d }}</strong></td>
                        @endif
                        @endfor
                </tr>

                <tr>
                    <td colspan="35"><strong>Daily Maintenance</strong></td>
                </tr>

                <!-- ROW TEMPLATE FOR DAILY MAINTENANCE -->
                @php
                $rows = [
                'Cleaning from outside',
                'Cleaning from Inside',
                'Check Power Cord & Switch',
                'Check Carbon Brush',
                'Lab Staff Signature',
                'Lab Supervisor Signature'
                ];
                @endphp

                @foreach ($rows as $row)
                <tr>
                    <td><strong>{{ $row }}</strong></td>

                    @for ($d = 1; $d <= 31; $d++)
                        @if (in_array($d, [8,16,24]))
                        <td colspan="2"><input type="text" name="{{ Str::slug($row).'_'.$d }}" class="qc-input"></td>
                        @else
                        <td><input type="text" name="{{ Str::slug($row).'_'.$d }}" class="qc-input"></td>
                        @endif
                        @endfor
                </tr>
                @endforeach

                <tr>
                    <td colspan="35"><strong>Weekly Maintenance</strong></td>
                </tr>

                <!-- WEEKLY MAINTENANCE -->
                <tr>
                    <td><strong>Clean Tube holders with 1% Sodium Hypochlorite</strong></td>
                    <td colspan="8"><input type="text" name="week1_date" style="width:100%; " class="qc-input"></td>
                    <td colspan="9"><input type="text" name="week2_date" style="width:100%; " class="qc-input"></td>
                    <td colspan="9"><input type="text" name="week3_date" style="width:100%; " class="qc-input"></td>
                    <td colspan="8"><input type="text" name="week4_date" style="width:100%; " class="qc-input"></td>
                </tr>

                <tr>
                    <td><strong>Lab Staff Signature</strong></td>
                    <td colspan="8"><input type="text" name="week1_staff" style="width:100%; " class="qc-input"></td>
                    <td colspan="9"><input type="text" name="week2_staff" style="width:100%; " class="qc-input"></td>
                    <td colspan="9"><input type="text" name="week3_staff" style="width:100%; " class="qc-input"></td>
                    <td colspan="8"><input type="text" name="week4_staff" style="width:100%; " class="qc-input"></td>
                </tr>

                <tr>
                    <td><strong>Lab Supervisor Signature</strong></td>
                    <td colspan="8"><input type="text" name="week1_supervisor" style="width:100%; " class="qc-input"></td>
                    <td colspan="9"><input type="text" name="week2_supervisor" style="width:100%; " class="qc-input"></td>
                    <td colspan="9"><input type="text" name="week3_supervisor" style="width:100%; " class="qc-input"></td>
                    <td colspan="8"><input type="text" name="week4_supervisor" style="width:100%; " class="qc-input"></td>
                </tr>

            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/BE/FOM-015"
        docNo="TDPL/BE/FOM-015"
        docName="Beckman Coulter DXC700AU Maintenance Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <form method="POST">
            @csrf

            <div class="flex gap-6 mb-4">
                <span>
                    <label><strong>Month/Year:</strong></label>
                    <input type="text" class="qc-input" name="month_year">
                </span>

                <span>
                    <label><strong>Location:</strong></label>
                    <input type="text" class="qc-input" name="location">
                </span>

                <span>
                    <label><strong>Department:</strong></label>
                    <input type="text" class="qc-input" name="department">
                </span>
            </div>

            <table class="w-full border-collapse" border="1">
                <tbody>
                    <tr>
                        <td><strong>Date</strong></td>
                        @for($i=1;$i<=31;$i++)
                            @if($i==9 || $i==17 || $i==24)
                            <td colspan="2"><strong>{{ $i }}</strong></td>
                            @else
                            <td><strong>{{ $i }}</strong></td>
                            @endif
                            @endfor
                    </tr>

                    <!-- Daily Maintenance Header -->
                    <tr>
                        <td colspan="35"><strong>Daily Maintenance</strong></td>
                    </tr>

                    <!-- Daily Maintenance Rows -->
                    @php
                    $dailyRows = [
                    'Inspect the Syringes for Leaks',
                    'Inspect the Wash Solution Roller Pump for Leaks',
                    'Inspect The Sample Probe, Reagent Probe, and Mix Bars',
                    'Replace the Deionized Water or Diluent in the Pre- Dilution Bottle',
                    'Replace the Sample Probe Wash Solutions',
                    'Clean the ISE',
                    'Calibrate the ISE',
                    'Performed by',
                    'Reviewed By'
                    ];
                    @endphp

                    @foreach($dailyRows as $index => $label)
                    <tr>
                        <td><strong>{{ $label }}</strong></td>

                        @for($i=1;$i<=31;$i++)
                            @if($i==9 || $i==17 || $i==24)
                            <td colspan="2">
                            <input type="text" class="qc-input" name="{{ Str::slug($label) }}_{{ $i }}">
                            </td>
                            @else
                            <td>
                                <input type="text" class="qc-input" name="{{ Str::slug($label) }}_{{ $i }}">
                            </td>
                            @endif
                            @endfor
                    </tr>
                    @endforeach

                    <!-- Weekly Header -->
                    <tr>
                        <td><strong>Weekly Maintenance</strong></td>
                        <td colspan="9"><strong>1st Week – Date:</strong> <input type="text" class="qc-input" name="week1_date"></td>
                        <td colspan="9"><strong>2nd Week – Date:</strong> <input type="text" class="qc-input" name="week2_date"></td>
                        <td colspan="8"><strong>3rd Week – Date:</strong> <input type="text" class="qc-input" name="week3_date"></td>
                        <td colspan="8"><strong>4th Week – Date:</strong> <input type="text" class="qc-input" name="week4_date"></td>
                    </tr>

                    <!-- Weekly Rows -->
                    @php
                    $weeklyRows = [
                    'Clean the Sample Probe and Mix Bars',
                    'Perform a W2',
                    'Performed by Supervisor'
                    ];
                    @endphp

                    @foreach($weeklyRows as $label)
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        <td colspan="9"><input type="text" class="qc-input-wide" name="{{ Str::slug($label) }}_week1"></td>
                        <td colspan="9"><input type="text" class="qc-input-wide" name="{{ Str::slug($label) }}_week2"></td>
                        <td colspan="8"><input type="text" class="qc-input-wide" name="{{ Str::slug($label) }}_week3"></td>
                        <td colspan="8"><input type="text" class="qc-input-wide" name="{{ Str::slug($label) }}_week4"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


        </form>

    </x-formTemplete>


    <x-formTemplete
        id="TDPL/BE/FOM-016"
        docNo="TDPL/BE/FOM-016"
        docName="Beckman Coulter DxI800 Maintenance Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <form>

            <!-- Top Section -->
            <div class="flex gap-6 mb-4">
                <span>
                    <label><strong>Month / Year:</strong></label>
                    <input type="text" class="qc-input">
                </span>

                <span>
                    <label><strong>Location:</strong></label>
                    <input type="text" class="qc-input">
                </span>

                <span>
                    <label><strong>Department:</strong></label>
                    <input type="text" class="qc-input">
                </span>
            </div>

            <!-- Full Table -->
            <table class="qc-table" border="1" style="width:100%; border-collapse: collapse;">

                <!-- Date Row -->
                <tr>
                    <td><strong>Date</strong></td>
                    @for($d = 1; $d <= 31; $d++)
                        <td><strong>{{ $d }}</strong></td>
                        @endfor
                </tr>

                <!-- Daily Maintenance Title -->
                <tr>
                    <td colspan="32"><strong>DAILY MAINTENANCE</strong></td>
                </tr>

                <!-- Daily Rows -->
                @php
                $dailyRows = [
                "System Backup Successful",
                "Check Zone Temperature",
                "Check System Supplies",
                "Clean Probe Exteriors",
                "Check Solid Waste",
                "Prime Substrate",
                "Run The Daily Cleaning",
                "Performed By",
                "Reviewed By"
                ];
                @endphp

                @foreach($dailyRows as $row)
                <tr>
                    <td><strong>{{ $row }}</strong></td>
                    @for($i = 1; $i <= 31; $i++)
                        <td><input type="text" class="qc-input"></td>
                        @endfor
                </tr>
                @endforeach


                <!-- Weekly Maintenance Section -->
                <tr>
                    <td><strong>WEEKLY MAINTENANCE</strong></td>
                    <td colspan="8"><strong>1st Week – Date:</strong> <input type="text" class="qc-input"></td>
                    <td colspan="9"><strong>2nd Week – Date:</strong> <input type="text" class="qc-input"></td>
                    <td colspan="9"><strong>3rd Week – Date:</strong> <input type="text" class="qc-input"></td>
                    <td colspan="8"><strong>4th Week – Date:</strong> <input type="text" class="qc-input"></td>
                </tr>

                @php
                $weeklyRows = [
                "Clean Instrument Exterior",
                "Inspect / Clean Primary Probe",
                "Check Waste Filter Bottle",
                "Run System Check",
                "Performed by Supervisor"
                ];
                @endphp

                @foreach($weeklyRows as $row)
                <tr>
                    <td><strong>{{ $row }}</strong></td>
                    <td colspan="8"><input type="text" class="qc-input-wide"></td>
                    <td colspan="9"><input type="text" class="qc-input-wide"></td>
                    <td colspan="9"><input type="text" class="qc-input-wide"></td>
                    <td colspan="8"><input type="text" class="qc-input-wide"></td>
                </tr>
                @endforeach

            </table>

        </form>

    </x-formTemplete>


    <x-formTemplete
        id="TDPL/BE/FOM-017"
        docNo="TDPL/BE/FOM-017"
        docName="Sensa Core aQua ST-200 Maintenance Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <form>

            <p>
                <strong>Month & Year:</strong>
                <input type="text" class="qc-input" style="width:150px; margin-right:40px;">
                <strong>Instrument S. No.:</strong>
                <input type="text" class="qc-input" style="width:150px;">
            </p>

            <table border="1" style="width:100%; border-collapse:collapse;">
                <tbody>

                    <!-- Header Row -->
                    <tr>
                        <td><strong>Date</strong></td>
                        <td><strong>Clean the Instrument</strong></td>
                        <td><strong>Empty Waste Container</strong></td>
                        <td><strong>Check Printer & Paper Status</strong></td>
                        <td><strong>Daily Cleaning Solution</strong></td>
                        <td><strong>Calibration</strong></td>
                        <td><strong>Shutdown</strong></td>
                        <td><strong>Lab Staff Signature</strong></td>
                        <td><strong>Lab Supervisor Signature</strong></td>
                    </tr>

                    <!-- Days 1 to 31 Rows -->
                    @for($day = 1; $day <= 31; $day++)
                        <tr>
                        <td><strong>{{ $day }}</strong></td>
                        <td><input type="text" class="qc-input-wide"></td>
                        <td><input type="text" class="qc-input-wide"></td>
                        <td><input type="text" class="qc-input-wide"></td>
                        <td><input type="text" class="qc-input-wide"></td>
                        <td><input type="text" class="qc-input-wide"></td>
                        <td><input type="text" class="qc-input-wide"></td>
                        <td><input type="text" class="qc-input-wide"></td>
                        <td><input type="text" class="qc-input-wide"></td>
                        </tr>
                        @endfor

                </tbody>
            </table>

        </form>


    </x-formTemplete>

    <x-formTemplete
        id="TDPL/BE/FOM-018"
        docNo="TDPL/BE/FOM-018"
        docName="Tosoh HLC-723GX Maintenance Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <table class="table table-bordered" style="border-collapse: collapse; width: 100%;">
            <tbody>

                {{-- DATE ROW --}}
                <tr>
                    <td colspan="2"><strong>Date 🡺</strong></td>

                    @for ($i = 1; $i <= 31; $i++)
                        <td><strong>{{ $i }}</strong></td>
                        @endfor
                </tr>

                {{-- SECTIONS --}}
                @php
                $sections = [
                'Buffer 1',
                'Buffer 2',
                'Buffer 3',
                'H/W Soln',
                'Filter Count',
                'Column Count',
                ];
                @endphp

                @foreach ($sections as $section)
                {{-- CHECK ROW --}}
                <tr>
                    <td rowspan="2"><strong>{{ $section }}</strong></td>
                    <td><strong>Check</strong></td>

                    @for ($i = 1; $i <= 31; $i++)
                        <td><input type="text" name="{{ Str::slug($section) }}_check_{{ $i }}" class="form-control"></td>
                        @endfor
                </tr>

                {{-- CHANGE ROW --}}
                <tr>
                    <td><strong>Change</strong></td>

                    @for ($i = 1; $i <= 31; $i++)
                        <td><input type="text" name="{{ Str::slug($section) }}_change_{{ $i }}" class="form-control"></td>
                        @endfor
                </tr>

                <tr>
                    <td colspan="33"></td>
                </tr>
                @endforeach

                {{-- Operator Sign --}}
                <tr>
                    <td colspan="2"><strong>Operator's Sign</strong></td>
                    @for ($i = 1; $i <= 31; $i++)
                        <td><input type="text" name="operator_sign_{{ $i }}" class="form-control"></td>
                        @endfor
                </tr>

                <tr>
                    <td colspan="33"></td>
                </tr>

                {{-- Reviewed By --}}
                <tr>
                    <td colspan="2"><strong>Reviewed By</strong></td>
                    @for ($i = 1; $i <= 31; $i++)
                        <td><input type="text" name="reviewed_by_{{ $i }}" class="form-control"></td>
                        @endfor
                </tr>

            </tbody>
        </table>


    </x-formTemplete>

    <x-formTemplete
        id="TDPL/BE/FOM-019"
        docNo="TDPL/BE/FOM-019"
        docName="Beckman Coulter DXH560 Maintenance Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">


        <form method="POST" action="">
            @csrf

            <p>
                <strong>Month &amp; Year:</strong>
                <input type="text" name="month_year" class="qc-input" style="width:180px;">
                &nbsp;&nbsp;
                <strong>Instrument S. No.:</strong>
                <input type="text" name="instrument_serial" class="qc-input" style="width:180px;">
            </p>

            <table border="1" cellpadding="4" cellspacing="0" style="border-collapse:collapse; width:100%;">
                <tbody>

                    {{-- HEADER: Date row (1..31) with specific colspan days --}}
                    @php
                    $doubleCols = [8,16,17,24]; // days that were colspan="2" in your source
                    @endphp

                    <tr>
                        <td><strong>Date</strong></td>

                        @for($i = 1; $i <= 31; $i++)
                            @if(in_array($i, $doubleCols))
                            <td colspan="2"><strong>{{ $i }}</strong></td>
                            @else
                            <td><strong>{{ $i }}</strong></td>
                            @endif
                            @endfor
                    </tr>

                    {{-- DAILY MAINTENANCE HEADER --}}
                    <tr>
                        <td colspan="36"><strong>Daily Maintenance</strong></td>
                    </tr>

                    {{-- Daily rows (with inputs) --}}
                    @php
                    $dailyRows = [
                    "Cleaning of Baths",
                    "Remove any dust on the machine, by dusting / pat drying the analyzer",
                    "Staff Initial"
                    ];
                    @endphp

                    @foreach($dailyRows as $row)
                    <tr>
                        <td><strong>{{ $row }}</strong></td>

                        @for($i = 1; $i <= 31; $i++)
                            @php
                            $baseName=Str::slug($row);
                            @endphp

                            @if(in_array($i, $doubleCols))
                            {{-- merged cell covering 2 columns --}}
                            <td colspan="2">
                            <input type="text" name="{{ $baseName }}_{{ $i }}" class="qc-input" style="width:100%;">
                            </td>
                            @else
                            <td>
                                <input type="text" name="{{ $baseName }}_{{ $i }}" class="qc-input" style="width:100%;">
                            </td>
                            @endif
                            @endfor
                    </tr>
                    @endforeach

                    {{-- WEEKLY MAINTENANCE HEADER --}}
                    <tr>
                        <td colspan="36"><strong>Weekly Maintenance</strong></td>
                    </tr>

                    {{-- Week date header row (same colspan split as your source) --}}
                    <tr>
                        <td></td>
                        <td colspan="8"><strong>Week 1 - Date:</strong></td>
                        <td colspan="9"><strong>Week 2 - Date:</strong></td>
                        <td colspan="10"><strong>Week 3 - Date:</strong></td>
                        <td colspan="8"><strong>Week 4 - Date:</strong></td>
                    </tr>

                    @php
                    $weeklyRows = [
                    "Rinsing of Baths",
                    "Draining the Baths",
                    "Flushing the aperture",
                    "Initial of the person who conducted the maintenance"
                    ];
                    @endphp

                    @foreach($weeklyRows as $wrow)
                    <tr>
                        <td><strong>{{ $wrow }}</strong></td>

                        <td colspan="8">
                            <input type="text" name="{{ Str::slug($wrow) }}_week1" class="qc-input" style="width:100%;">
                        </td>

                        <td colspan="9">
                            <input type="text" name="{{ Str::slug($wrow) }}_week2" class="qc-input" style="width:100%;">
                        </td>

                        <td colspan="10">
                            <input type="text" name="{{ Str::slug($wrow) }}_week3" class="qc-input" style="width:100%;">
                        </td>

                        <td colspan="8">
                            <input type="text" name="{{ Str::slug($wrow) }}_week4" class="qc-input" style="width:100%;">
                        </td>
                    </tr>
                    @endforeach

                    {{-- MONTHLY MAINTENANCE --}}
                    <tr>
                        <td colspan="36"><strong>Monthly Maintenance</strong></td>
                    </tr>

                    <tr>
                        <td colspan="36"><strong>Depends on the usage cycles/day</strong></td>
                    </tr>

                    <tr>
                        <td><strong>Perform Bleaching cycle (Use 5ml Bleach + 5ml D/W, filter and use)</strong></td>

                        {{-- left block --}}
                        <td colspan="19">
                            <input type="text" name="bleach_cycle_notes" class="qc-input" style="width:100%;">
                        </td>

                        {{-- right block for dates --}}
                        <td colspan="16">
                            <input type="text" name="bleach_cycle_dates" class="qc-input" style="width:100%;">
                        </td>
                    </tr>

                    <tr>
                        <td><strong>Technician Signature</strong></td>

                        <td colspan="19">
                            <input type="text" name="technician_signature" class="qc-input" style="width:100%;">
                        </td>

                        <td colspan="16">
                            <input type="text" name="technician_signature_dates" class="qc-input" style="width:100%;">
                        </td>
                    </tr>

                </tbody>
            </table>

        </form>


    </x-formTemplete>


    <x-formTemplete
        id="TDPL/BE/FOM-020"
        docNo="TDPL/BE/FOM-020"
        docName="HORIBA Yumizen H550 Maintenance Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <form method="POST" action="">
            @csrf

            <p>
                <strong>Month &amp; Year:</strong>
                <input type="text" name="month_year" class="qc-input" style="width:180px;">
                &nbsp;&nbsp;
                <strong>Instrument S. No.:</strong>
                <input type="text" name="instrument_serial" class="qc-input" style="width:180px;">
            </p>

            <table border="1" cellpadding="4" cellspacing="0" style="border-collapse:collapse; width:100%;">
                <tbody>

                    {{-- HEADER: Date row --}}
                    <tr>
                        <td><strong>Date</strong></td>

                        @for($i = 1; $i <= 31; $i++)
                            <td><strong>{{ $i }}</strong></td>
                            @endfor
                    </tr>

                    {{-- DAILY MAINTENANCE HEADER --}}
                    <tr>
                        <td colspan="32"><strong>Daily Maintenance</strong></td>
                    </tr>

                    {{-- DAILY ROWS --}}
                    @php
                    $dailyRows = [
                    "Clean the Instrument",
                    "Empty Waste Container",
                    "Check Printer and Paper status",
                    "Check the Reagent levels in Analyzer Tab",
                    "Reagent Inventory",
                    "Start up (Pass/Fail)",
                    "Backflush LMNEB (Weekly)",
                    "Backflush RBC/PLT (Weekly)",
                    "Shutdown",
                    "Performed By",
                    "Verified By",
                    "Concentrated Cleaning (Weekly or After 100 Samples)"
                    ];
                    @endphp

                    @foreach($dailyRows as $row)
                    <tr>
                        <td><strong>{{ $row }}</strong></td>

                        @for($d = 1; $d <= 31; $d++)
                            <td>
                            <input
                                type="text"
                                name="{{ Str::slug($row) }}_day_{{ $d }}"
                                class="qc-input"
                                style="width:100%;">
                            </td>
                            @endfor
                    </tr>
                    @endforeach


                </tbody>
            </table>

            {{-- Additional info blocks (Background Limits and Notes) --}}
            <div style="margin-top:12px;">
                <table>
                    <tr>
                        <td>
                            <strong>Background Limits: &nbsp; WBC 0.3 &nbsp;&nbsp; RBC 0.03 &nbsp;&nbsp; HB 0.3 &nbsp;&nbsp; PLT 5</strong>
                        </td>
                    </tr>
                </table>

                <table style="margin-top:8px;">
                    <tr>
                        <td>
                            <strong>Backflush LMNEB or RBC/PLT → Maintenance → Hydraulic service → Back flush LMNEB or RBC/PLT</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Concentrated Cleaning → Maintenance → Concentrated Cleaning</strong>
                        </td>
                    </tr>
                </table>
            </div>


        </form>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/BE/FOM-021"
        docNo="TDPL/BE/FOM-021"
        docName="Bio-Rad D10 Maintenance Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <form method="POST" action="">
            @csrf

            {{-- TOP DETAILS --}}
            <p>
                <strong>Month/Year:</strong>
                <input type="text" name="month_year" class="qc-input" style="width:120px;">

                <strong>Location:</strong>
                <input type="text" name="location" class="qc-input" style="width:120px;">

                <strong>Department:</strong>
                <input type="text" name="department" class="qc-input" style="width:120px;">

                <strong>Instrument ID/S. No.:</strong>
                <input type="text" name="instrument_id" class="qc-input" style="width:150px;">
            </p>



            {{-- ===================== DAILY MAINTENANCE ===================== --}}
            <table border="1" cellspacing="0" cellpadding="4" style="border-collapse: collapse; width:100%; margin-top:10px;">

                <tbody>
                    <tr>
                        <td colspan="13"><strong>Daily Maintenance Log</strong></td>
                    </tr>

                    <tr>
                        <td rowspan="2">
                            <strong>MO/YR:</strong><br><br>
                            <strong>Date</strong>
                        </td>

                        <td colspan="9"><strong>Pre-Run</strong></td>
                        <td colspan="2"><strong>Post-Run</strong></td>

                        <td rowspan="2">
                            <strong>Technician</strong><br>
                            <strong>Initials</strong>
                        </td>
                    </tr>

                    {{-- Pre-run + Post-run column labels --}}
                    <tr>
                        @php
                        $columns = [
                        "Check Method Setting",
                        "Check Reagent Levels 1",
                        "Check Reagent Levels 2",
                        "Check Reagent Onboard Expiration date(s)",
                        "Cartridge Injection Count",
                        "Check Waste Levels",
                        "Pressure Reading",
                        "Check for Leaks",
                        "Check Paper Supply",
                        "Remove Samples",
                        "Wipe Spills"
                        ];
                        @endphp

                        @foreach($columns as $col)
                        <td><strong>{{ $col }}</strong></td>
                        @endforeach
                    </tr>
                </tbody>



                {{-- DAILY ROWS FOR DAYS 1–31 --}}
                <tbody>
                    @for($day = 1; $day <= 31; $day++)
                        <tr>
                        {{-- DATE NUMBER --}}
                        <td><strong>{{ $day }}</strong></td>

                        {{-- Input cells: 11 columns --}}
                        @foreach($columns as $col)
                        <td>
                            <input
                                type="text"
                                name="daily[{{ $day }}][{{ Str::slug($col) }}]"
                                class="qc-input"
                                style="width:100%;">
                        </td>
                        @endforeach

                        {{-- Technician Initials --}}
                        <td>
                            <input
                                type="text"
                                name="daily[{{ $day }}][technician_initials]"
                                class="qc-input"
                                style="width:100%;">
                        </td>
                        </tr>
                        @endfor
                </tbody>
            </table>




            {{-- ===================== MONTHLY MAINTENANCE ===================== --}}
            <p style="margin-top:20px;">
                <strong>Year:</strong>
                <input type="text" name="year" class="qc-input" style="width:120px;">

                <strong>Instrument ID/S. No.:</strong>
                <input type="text" name="monthly_instrument_id" class="qc-input" style="width:150px;">
            </p>


            <table border="1" cellspacing="0" cellpadding="4" style="border-collapse: collapse; width:100%; margin-top:10px;">
                <tbody>

                    <tr>
                        <td colspan="13"><strong>Monthly Maintenance Log</strong></td>
                    </tr>

                    {{-- Month Columns --}}
                    @php
                    $months = ["JUL","AUG","SEP","OCT","NOV","DEC","JAN","FEB","MAR","APR","MAY","JUN"];
                    @endphp

                    <tr>
                        <td><strong>MAINTENANCE</strong></td>
                        @foreach($months as $m)
                        <td><strong>{{ $m }}</strong></td>
                        @endforeach
                    </tr>

                    {{-- Monthly maintenance tasks --}}
                    @php
                    $monthlyTasks = [
                    "Clean Exterior Surfaces",
                    "Clean Interior Surfaces",
                    "Clean/Decontaminate",
                    "Sampling Fluid Path",
                    "Clean Dilution Well",
                    "Clean Internal Waste Bottle",
                    "Clean/Inspect Sample Racks",
                    "Clean Rack Loader"
                    ];
                    @endphp

                    @foreach($monthlyTasks as $task)
                    <tr>
                        <td><strong>{{ $task }}</strong></td>

                        @foreach($months as $m)
                        <td>
                            <input
                                type="text"
                                name="monthly[{{ Str::slug($task) }}][{{ strtolower($m) }}]"
                                class="qc-input"
                                style="width:100%;">
                        </td>
                        @endforeach
                    </tr>
                    @endforeach

                    {{-- Technician initials --}}
                    <tr>
                        <td><strong>Technician Initials</strong></td>
                        @foreach($months as $m)
                        <td>
                            <input
                                type="text"
                                name="monthly[technician_initials][{{ strtolower($m) }}]"
                                class="qc-input"
                                style="width:100%;">
                        </td>
                        @endforeach
                    </tr>

                </tbody>
            </table>




        </form>


    </x-formTemplete>

    <x-formTemplete
        id="TDPL/BE/FOM-022"
        docNo="TDPL/BE/FOM-022"
        docName="Automatic Tissue Processor Maintenance Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <form method="POST" action="">
            @csrf

            <p>
                <strong>Month & Year:</strong>
                <input type="text" name="month_year" class="qc-input" style="width:140px; margin-right:30px;">

                <strong>Instrument ID/S. No:</strong>
                <input type="text" name="instrument_id" class="qc-input" style="width:140px;">
            </p>

            <table border="1" cellspacing="0" cellpadding="6" style="border-collapse: collapse; width:100%; margin-top:10px;">
                <tbody>

                    {{-- HEADER --}}
                    <tr>
                        <td colspan="7"><strong>Daily Maintenance Log</strong></td>
                    </tr>

                    {{-- Column Titles --}}
                    <tr>
                        <td rowspan="2"><strong>Date</strong></td>
                        <td rowspan="2"><strong>Clean Exterior</strong></td>
                        <td rowspan="2"><strong>Change Reagent</strong></td>
                        <td rowspan="2"><strong>Check Reagent Level</strong></td>
                        <td colspan="2"><strong>Wax Bath Temperature (°C)</strong></td>
                        <td rowspan="2"><strong>Done By</strong></td>
                    </tr>

                    <tr>
                        <td>AM</td>
                        <td>PM</td>
                    </tr>

                    {{-- BODY: Days 1–31 --}}
                    @for($day = 1; $day <= 31; $day++)
                        <tr>
                        {{-- Date --}}
                        <td><strong>{{ $day }}</strong></td>

                        {{-- Clean Exterior --}}
                        <td>
                            <input type="text"
                                name="daily[{{ $day }}][clean_exterior]"
                                class="qc-input"
                                style="width:100%;">
                        </td>

                        {{-- Change Reagent --}}
                        <td>
                            <input type="text"
                                name="daily[{{ $day }}][change_reagent]"
                                class="qc-input"
                                style="width:100%;">
                        </td>

                        {{-- Check Reagent Level --}}
                        <td>
                            <input type="text"
                                name="daily[{{ $day }}][check_reagent_level]"
                                class="qc-input"
                                style="width:100%;">
                        </td>

                        {{-- AM Temperature --}}
                        <td>
                            <input type="text"
                                name="daily[{{ $day }}][temperature_am]"
                                class="qc-input"
                                style="width:100%;">
                        </td>

                        {{-- PM Temperature --}}
                        <td>
                            <input type="text"
                                name="daily[{{ $day }}][temperature_pm]"
                                class="qc-input"
                                style="width:100%;">
                        </td>

                        {{-- Done By --}}
                        <td>
                            <input type="text"
                                name="daily[{{ $day }}][done_by]"
                                class="qc-input"
                                style="width:100%;">
                        </td>
                        </tr>
                        @endfor

                </tbody>
            </table>


        </form>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/BE/FOM-023"
        docNo="TDPL/BE/FOM-023"
        docName="Tissue Embedding Console System Equipment Maintenance Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <p>
            <strong>Month/Year:</strong>
            <input type="text" name="month_year" class="qc-input" style="width:120px;">

            <strong>Instrument ID/S. No.:</strong>
            <input type="text" name="instrument_id" class="qc-input" style="width:150px;">
        </p>

        <table style="width: 100%;">
            <tbody>
                <tr>
                    <td colspan="6" style="text-align: center;">
                        <strong>Daily Maintenance Log</strong>
                    </td>
                </tr>

                <tr>
                    <td><strong>Date</strong></td>
                    <td><strong>Cold Plate Temperature (°C)</strong></td>
                    <td><strong>Hot Plate Temperature (°C)</strong></td>
                    <td><strong>Wax Bath Temperature (°C)</strong></td>
                    <td><strong>Check Cleaning</strong></td>
                    <td><strong>Technician Signature</strong></td>
                </tr>

                @for ($i = 1; $i <= 31; $i++)
                    <tr>
                    <td><strong>{{ $i }}</strong></td>
                    <td> <input type="text" name="instrument_id" class="qc-input" style="width:150px;"></td>
                    <td> <input type="text" name="instrument_id" class="qc-input" style="width:150px;"></td>
                    <td> <input type="text" name="instrument_id" class="qc-input" style="width:150px;"></td>
                    <td> <input type="text" name="instrument_id" class="qc-input" style="width:150px;"></td>
                    <td> <input type="text" name="instrument_id" class="qc-input" style="width:150px;"></td>
                    </tr>
                    @endfor
            </tbody>
        </table>



        <p><strong>Note:</strong>
            Optimum temperature ranges:
            Cold plate -5 to -9°C; Hotplate 80 to 90°C; Wax bath 65 to 75°C
        </p>


    </x-formTemplete>

    <x-formTemplete
        id="TDPL/BE/FOM-024"
        docNo="TDPL/BE/FOM-024"
        docName="Bact Alert Maintenance Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        @php
        // Define the fields for the maintenance log
        $fields = [
        'Clean Outer Cover',
        'Clean Monitor',
        "Check Temp (37°C)",
        "Check for Error 60 and calibrate cells flagged 60",
        "Signature of the Technician",
        "Signature of HOD"
        ];

        // Days in the month (1 to 31)
        $days = range(1, 31);
        @endphp

        <div class="mb-4">
            <label class="font-bold">Month & Year:</label>
            <input type="month" name="month_year" class="border p-1 rounded ml-2">

            <label class="font-bold ml-4">Instrument ID / S. No:</label>
            <input type="text" name="instrument_id" class="border p-1 rounded ml-2">
        </div>

        <table class="border-collapse border border-gray-400 w-full text-center">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 p-2">Date</th>
                    @foreach ($days as $day)
                    <th class="border border-gray-300 p-2 ">{{ $day }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($fields as $field)
                <tr>
                    <td class="border border-gray-300 p-2 font-semibold text-left w-48" style="    min-width: 176px;">{{ $field }}</td>
                    @foreach ($days as $day)
                    <td class="border border-gray-300 p-1">
                        @if(str_contains(strtolower($field), 'signature'))
                        <input type="text" name="{{ Str::slug($field) }}[{{ $day }}]" class="border rounded w-full p-1" placeholder="Sign">
                        @elseif(str_contains(strtolower($field), 'check temp'))
                        <input type="number" name="{{ Str::slug($field) }}[{{ $day }}]" class="border rounded w-full p-1" step="0.1" placeholder="°C">
                        @else
                        <input type="text" name="{{ Str::slug($field) }}[{{ $day }}]" class="border rounded w-full p-1">
                        @endif
                    </td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/BE/FOM-025"
        docNo="TDPL/BE/FOM-025"
        docName="Vitek 2 Maintenance Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        @php
        // Define the maintenance fields
        $dailyFields = [
        'Clean Waste bin',
        'Densi-check calibration',
        'Sterility check/Autoclave (only dispenser if contaminated)',
        'Check Instrument Status Daily',
        'Carousel temperature',
        'Cabin temperature',
        'Optics self-test',
        'Signature of Technician',
        ];

        $monthlyFields = [
        'Clean Carousel',
        'Clean Optics',
        'Clean Cassettes',
        'Clean filler Seal',
        'Clean filler Station',
        'Signature of Technician',
        'Signature of HOD',
        ];

        // Days in a month
        $days = range(1, 31);

        // Helper function to generate slug names for inputs
        function fieldSlug($field) {
        return \Illuminate\Support\Str::slug($field);
        }
        @endphp

        <div class="mb-4">
            <label class="font-bold">Month & Year:</label>
            <input type="month" name="month_year" class="border p-1 rounded ml-2">

            <label class="font-bold ml-4">Instrument ID / S. No:</label>
            <input type="text" name="instrument_id" class="border p-1 rounded ml-2">
        </div>

        {{-- Daily Maintenance Table --}}
        <h2 class="text-lg font-bold mb-2">Daily Maintenance</h2>
        <table class="border-collapse border border-gray-400 w-full text-center mb-6">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 p-2">Field</th>
                    @foreach ($days as $day)
                    <th class="border border-gray-300 p-2">{{ $day }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($dailyFields as $field)
                <tr>
                    <td class="border border-gray-300 p-2 font-semibold text-left">{{ $field }}</td>
                    @foreach ($days as $day)
                    <td class="border border-gray-300 p-1">
                        @if(str_contains(strtolower($field), 'signature'))
                        <input type="text" name="{{ fieldSlug($field) }}[{{ $day }}]" class="border rounded w-full p-1" placeholder="Sign">
                        @elseif(str_contains(strtolower($field), 'temperature'))
                        <input type="number" name="{{ fieldSlug($field) }}[{{ $day }}]" class="border rounded w-full p-1" step="0.1" placeholder="°C">
                        @else
                        <input type="text" name="{{ fieldSlug($field) }}[{{ $day }}]" class="border rounded w-full p-1">
                        @endif
                    </td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Monthly Maintenance Table --}}
        <h2 class="text-lg font-bold mb-2">Monthly Maintenance</h2>
        <table class="border-collapse border border-gray-400 w-full text-center">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 p-2">Field</th>
                    @foreach ($days as $day)
                    <th class="border border-gray-300 p-2">{{ $day }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($monthlyFields as $field)
                <tr>
                    <td class="border border-gray-300 p-2 font-semibold text-left">{{ $field }}</td>
                    @foreach ($days as $day)
                    <td class="border border-gray-300 p-1">
                        @if(str_contains(strtolower($field), 'signature'))
                        <input type="text" name="{{ fieldSlug($field) }}[{{ $day }}]" class="border rounded w-full p-1" placeholder="Sign">
                        @else
                        <input type="text" name="{{ fieldSlug($field) }}[{{ $day }}]" class="border rounded w-full p-1">
                        @endif
                    </td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/BE/FOM-026"
        docNo="TDPL/BE/FOM-026"
        docName="Elisa Reader Maintenance Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <div class="mb-4">
            <label class="font-bold">MONTH & YEAR:</label>
            <input type="month" name="month_year" class="border p-1 rounded ml-2">

            <label class="font-bold ml-4">INSTRUMENT ID / S. No:</label>
            <input type="text" name="instrument_id" class="border p-1 rounded ml-2">
        </div>

        <p class="mb-2">Put a tick mark (✓) against each maintenance activity after performance</p>

        <table class="border-collapse border border-gray-400 w-full text-center">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 p-2">DATE 🡺</th>
                    @for($day = 1; $day <= 31; $day++)
                        <th class="border border-gray-300 p-2">{{ $day }}</th>
                        @endfor
                </tr>
            </thead>
            <tbody>
                @foreach([
                'Is the power source secure',
                'Is the power cord safe',
                'Is the power plug tightly inserted',
                'Is the outside of the system free from contamination',
                'Is the microplate absorbance system clean',
                'Signature of Operator'
                ] as $field)
                <tr>
                    <td class="border border-gray-300 p-2 font-semibold text-left">{{ $field }}</td>
                    @for($day = 1; $day <= 31; $day++)
                        <td class="border border-gray-300 p-1">
                        @if(str_contains(strtolower($field), 'signature'))
                        <input type="text" name="{{ \Illuminate\Support\Str::slug($field) }}[{{ $day }}]" class="border rounded w-full p-1" placeholder="Sign">
                        @else
                        <input type="checkbox" name="{{ \Illuminate\Support\Str::slug($field) }}[{{ $day }}]" value="1" class="mx-auto">
                        @endif
                        </td>
                        @endfor
                </tr>
                @endforeach
            </tbody>
        </table>


    </x-formTemplete>

    <x-formTemplete
        id="TDPL/BE/FOM-028"
        docNo="TDPL/BE/FOM-028"
        docName="Real Time PCR Maintenance Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <div class="mb-4">
            <label class="font-bold">MONTH & YEAR:</label>
            <input type="month" name="month_year" class="border p-1 rounded ml-2">

            <label class="font-bold ml-4">INSTRUMENT ID / S. No:</label>
            <input type="text" name="instrument_id" class="border p-1 rounded ml-2">
        </div>

        <p class="mb-2">Put a tick mark (✓) against each maintenance activity after performance</p>

        <table class="border-collapse border border-gray-400 w-full text-center">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 p-2">DATE 🡺</th>
                    @for($day = 1; $day <= 31; $day++)
                        <th class="border border-gray-300 p-2">{{ $day }}</th>
                        @endfor
                </tr>
            </thead>
            <tbody>
                @foreach([
                "Sample stand Cleaning",
                "Rotor Cleaning",
                "Power cord attached",
                "Laptop screen cleaning",
                "Check Cord of laptop",
                "Check Fuse",
                "Signature"
                ] as $field)
                <tr>
                    <td class="border border-gray-300 p-2 font-semibold text-left">{{ $field }}</td>
                    @for($day = 1; $day <= 31; $day++)
                        <td class="border border-gray-300 p-1">
                        @if(str_contains(strtolower($field), 'signature'))
                        <input type="text" name="{{ \Illuminate\Support\Str::slug($field) }}[{{ $day }}]" class="border rounded w-full p-1" placeholder="Sign">
                        @else
                        <input type="checkbox" name="{{ \Illuminate\Support\Str::slug($field) }}[{{ $day }}]" value="1" class="mx-auto">
                        @endif
                        </td>
                        @endfor
                </tr>
                @endforeach
            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/BE/FOM-029"
        docNo="TDPL/BE/FOM-029"
        docName="Cooling Centrifuge Maintenance Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <p><strong>Month/Year:</strong> <input type="month" name="month_year" class="border p-1 rounded">
            <strong>Department:</strong> <input type="text" name="department" class="border p-1 rounded">
            <strong>Instrument ID/S. No.:</strong> <input type="text" name="instrument_id" class="border p-1 rounded">
        </p>

        <table class="border-collapse border border-gray-400 w-full text-center">
            <thead>
                <tr>
                    <th class="border border-gray-400">Daily Maintenance</th>
                    @for ($day = 1; $day <= 31; $day++)
                        <th class="border border-gray-400">{{ $day }}</th>
                        @endfor
                </tr>
            </thead>
            <tbody>


                @foreach (['Buckets Cleaned', 'Power Cord', 'Dusting', 'Signature'] as $item)
                <tr>
                    <td class="border border-gray-400 font-semibold">{{ $item }}</td>
                    @for ($day = 1; $day <= 31; $day++)
                        <td class="border border-gray-400 p-1">
                        @if($item == 'Signature')
                        <input type="text" name="{{ Str::slug($item) }}[{{ $day }}]" class="w-full border p-1 rounded" placeholder="Sign">
                        @else
                        <input type="checkbox" name="{{ Str::slug($item) }}[{{ $day }}]" class="mx-auto">
                        @endif
                        </td>
                        @endfor
                </tr>
                @endforeach

                <!-- Monthly Maintenance -->
                <tr>
                    <td colspan="32" class="border border-gray-400 font-semibold text-left p-2">Monthly Maintenance</td>
                </tr>
                <tr>
                    <td class="border border-gray-400 font-semibold">Bushes Checked</td>
                    <td colspan="6" class="border border-gray-400"><input type="text" name="bushes_checked_notes" class="w-full border p-1 rounded"></td>
                    <td colspan="14" class="border border-gray-400"><strong>Date:</strong> <input type="date" name="bushes_checked_date" class="border p-1 rounded"></td>
                    <td colspan="11" class="border border-gray-400"><strong>Next Due Date:</strong> <input type="date" name="bushes_next_due" class="border p-1 rounded"></td>
                </tr>
                <tr>
                    <td class="border border-gray-400 font-semibold">Signature</td>
                    <td colspan="31" class="border border-gray-400"><input type="text" name="monthly_signature" class="w-full border p-1 rounded"></td>
                </tr>
            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/BE/FOM-034"
        docNo="TDPL/BE/FOM-034"
        docName="Microscope Maintenance Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <p>
            <strong>Month & Year:</strong> <input type="month" name="month_year" class="border p-1 rounded">
            <strong>Instrument ID/S. No.:</strong> <input type="text" name="instrument_id" class="border p-1 rounded">
        </p>

        <table class="border-collapse border border-gray-400 w-full text-center">
            <thead>
                <tr>
                    <th class="border border-gray-400">Daily Maintenance</th>
                    @for ($day = 1; $day <= 31; $day++)
                        <th class="border border-gray-400">{{ $day }}</th>
                        @endfor
                </tr>
            </thead>
            <tbody>
                @foreach (['Cleaning outside & inside', 'Check mechanical stage', 'Check fine & adjustment', 'Cleaning of lens', 'Check light source', 'Check plug cord', 'Lab Staff Signature', 'Lab Supervisor Signature'] as $item)
                <tr>
                    <td class="border border-gray-400 font-semibold">{{ $item }}</td>
                    @for ($day = 1; $day <= 31; $day++)
                        <td class="border border-gray-400 p-1">
                        @if(str_contains($item, 'Signature'))
                        <input type="text" name="{{ Str::slug($item) }}[{{ $day }}]" class="w-full border p-1 rounded" placeholder="Sign">
                        @else
                        <input type="checkbox" name="{{ Str::slug($item) }}[{{ $day }}]" class="mx-auto">
                        @endif
                        </td>
                        @endfor
                </tr>
                @endforeach
            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/BE/FOM-035"
        docNo="TDPL/BE/FOM-035"
        docName="Laura M Maintenance Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <p>
            <strong>Month & Year:</strong> <input type="month" name="month_year" class="border p-1 rounded">
            <strong>Instrument ID/S. No.:</strong> <input type="text" name="instrument_id" class="border p-1 rounded">
        </p>

        <table class="border-collapse border border-gray-400 text-center w-full">
            <thead>
                <tr>
                    <th class="border border-gray-400">Daily Maintenance</th>
                    @for ($day = 1; $day <= 31; $day++)
                        <th class="border border-gray-400">{{ $day }}</th>
                        @endfor
                </tr>
            </thead>
            <tbody>
                @foreach ([
                'Cleaning procedure of Plastic Feeder' => [
                '1. Rinse the feeder with water and wipe it with wet cloth',
                '2. Dry the plastic feeder, and insert into analyzer (Correct position)'
                ],
                'Cleaning procedure of Waste Container' => [
                '1. Remove the waste container with used strips from the analyzer.',
                '2. Empty the container and rinse it with water',
                '3. Wipe with a dry cloth.',
                '4. Insert the waste container back and ensure it is positioned correctly'
                ],
                ] as $section => $steps)
                <tr>
                    <td class="border border-gray-400 font-semibold text-left" style="min-width: 250px;">{{ $section }}</td>
                    <td colspan="31" class="border border-gray-400">&nbsp;</td>
                </tr>

                @foreach ($steps as $step)
                <tr>
                    <td class="border border-gray-400 text-left" style="min-width: 250px;">{{ $step }}</td>
                    @for ($day = 1; $day <= 31; $day++)
                        <td class="border border-gray-400 p-1">
                        <input type="checkbox" name="{{ Str::slug($section) }}[{{ $day }}]" class="mx-auto">
                        </td>
                        @endfor
                </tr>
                @endforeach
                @endforeach

                {{-- Signature Rows --}}
                @foreach (['Technician Signature', 'Supervisor Signature'] as $signature)
                <tr>
                    <td class="border border-gray-400 font-semibold text-left" style="min-width: 250px;">{{ $signature }}</td>
                    @for ($day = 1; $day <= 31; $day++)
                        <td class="border border-gray-400 p-1">
                        <input type="text" name="{{ Str::slug($signature) }}[{{ $day }}]" class="w-full border p-1 rounded" placeholder="Sign">
                        </td>
                        @endfor
                </tr>
                @endforeach
            </tbody>
        </table>


    </x-formTemplete>


    <x-formTemplete
        id="TDPL/BE/FOM-036"
        docNo="TDPL/BE/FOM-036"
        docName="Microtome Maintenance Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <p>
            <strong>Month & Year:</strong>
            <input type="month" name="month_year" class="border p-1 rounded">
            <strong>Instrument ID/S. No.:</strong>
            <input type="text" name="instrument_id" class="border p-1 rounded">
        </p>

        <table class="border-collapse border border-gray-400 w-full text-center">
            <thead>
                <tr>
                    <th class="border border-gray-400 p-4">Date</th>
                    <th class="border border-gray-400 p-4">Blade Change</th>
                    <th class="border border-gray-400 p-4">Lubrication</th>
                    <th class="border border-gray-400 p-4">Clean Knife Holder</th>
                    <th class="border border-gray-400 p-4">Remove Accumulated Paraffin / Tissue & Clean Material Parts</th>
                    <th class="border border-gray-400 p-4">Technician Signature</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop for 31 days -->
                <!-- Replace this with a server-side loop if using Blade / PHP -->
                <!-- Example static version below -->
                <?php for ($day = 1; $day <= 31; $day++): ?>
                    <tr>
                        <td class="border border-gray-400 font-semibold"><?= str_pad($day, 2, '0', STR_PAD_LEFT) ?></td>
                        <td class="border border-gray-400 p-1">
                            <input type="checkbox" name="blade_change[<?= $day ?>]">
                        </td>
                        <td class="border border-gray-400 p-1">
                            <input type="checkbox" name="lubrication[<?= $day ?>]">
                        </td>
                        <td class="border border-gray-400 p-1">
                            <input type="checkbox" name="clean_knife[<?= $day ?>]">
                        </td>
                        <td class="border border-gray-400 p-1">
                            <input type="checkbox" name="remove_paraffin[<?= $day ?>]">
                        </td>
                        <td class="border border-gray-400 p-1">
                            <input type="text" name="technician_signature[<?= $day ?>]" class="w-full border p-1 rounded" placeholder="Sign">
                        </td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>

    </x-formTemplete>

    
    <x-formTemplete
        id="TDPL/BE/FOM-037"
        docNo="TDPL/BE/FOM-037"
        docName="Flotation Bath Maintenance Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <p>
  <strong>Month & Year:</strong>
  <input type="month" name="month_year" class="border p-1 rounded">
  <strong>Instrument ID/S. No.:</strong>
  <input type="text" name="instrument_id" class="border p-1 rounded">
</p>

<p>Note: Optimum temperature range is 52 - 56°C.</p>

<table class="border-collapse border border-gray-400 w-full text-center">
  <thead>
    <tr>
      <th class="border border-gray-400 p-4">Date</th>
      <th class="border border-gray-400 p-4">Clean Exterior</th>
      <th class="border border-gray-400 p-4">Temperature @10:00 AM</th>
      <th class="border border-gray-400 p-4">Distilled Water Changed</th>
      <th class="border border-gray-400 p-4">Signature</th>
      <th class="border border-gray-400 p-4">Temperature @5:30 PM</th>
      <th class="border border-gray-400 p-4">Signature</th>
    </tr>
  </thead>
  <tbody>
    <!-- Loop for 31 days -->
    <?php for ($day = 1; $day <= 31; $day++): ?>
    <tr>
      <td class="border border-gray-400 font-semibold"><?= str_pad($day, 2, '0', STR_PAD_LEFT) ?></td>
      <td class="border border-gray-400 p-1">
        <input type="checkbox" name="clean_exterior[<?= $day ?>]">
      </td>
      <td class="border border-gray-400 p-1">
        <input type="number" name="temp_morning[<?= $day ?>]" class="w-full border p-1 rounded" placeholder="°C">
      </td>
      <td class="border border-gray-400 p-1">
        <input type="checkbox" name="water_changed[<?= $day ?>]">
      </td>
      <td class="border border-gray-400 p-1">
        <input type="text" name="signature_morning[<?= $day ?>]" class="w-full border p-1 rounded" placeholder="Sign">
      </td>
      <td class="border border-gray-400 p-1">
        <input type="number" name="temp_evening[<?= $day ?>]" class="w-full border p-1 rounded" placeholder="°C">
      </td>
      <td class="border border-gray-400 p-1">
        <input type="text" name="signature_evening[<?= $day ?>]" class="w-full border p-1 rounded" placeholder="Sign">
      </td>
    </tr>
    <?php endfor; ?>
  </tbody>
</table>

    </x-formTemplete>

     <x-formTemplete
        id="TDPL/BE/FOM-038"
        docNo="TDPL/BE/FOM-038"
        docName="Grossing Station Maintenance Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
 

<div class="p-4">
    
    <form action="" method="POST">
        @csrf
        
        <span class="mb-4">
            <label class="block font-semibold">Month & Year:</label>
            <input type="month" name="month_year" class="border rounded px-2 py-1 w-40">
        </span>
        <span class="mb-4">
            <label class="block font-semibold">Instrument ID/S. No.:</label>
            <input type="text" name="instrument_id" class="border rounded px-2 py-1 w-40">
        </span>
        
        <h2 class="text-xl font-bold" style="margin: 20px 0;">Daily Maintenance</h2>
        <table class="table-auto border-collapse border border-gray-300 w-full text-center">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-2 py-1">Date</th>
                    <th class="border px-2 py-1">Clean with 70% Isopropyl Alcohol</th>
                    <th class="border px-2 py-1">Check Filters</th>
                    <th class="border px-2 py-1">Check Power Cord</th>
                    <th class="border px-2 py-1">Check Air Flow</th>
                    <th class="border px-2 py-1">Check UV Lamp</th>
                    <th class="border px-2 py-1">Check Fuse</th>
                    <th class="border px-2 py-1">Technician Signature</th>
                </tr>
            </thead>
            <tbody>
                @for ($day = 1; $day <= 31; $day++)
                    <tr>
                        <td class="border px-2 py-1">{{ $day }}</td>
                        @foreach (['clean', 'filters', 'power_cord', 'airflow', 'uv_lamp', 'fuse', 'technician'] as $field)
                            <td class="border px-2 py-1">
                                <input 
                                    type="text" 
                                    name="maintenance[{{ $day }}][{{ $field }}]" 
                                    class="border rounded px-1 py-1 w-full"
                                >
                            </td>
                        @endforeach
                    </tr>
                @endfor
            </tbody>
        </table>

       
    </form>
</div>

    
    </x-formTemplete>


    
     <x-formTemplete
        id="TDPL/BE/REG-001"
        docNo="TDPL/BE/REG-001"
        docName="Equipment Breakdown Maintenance Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
    <div class="p-4">
    

    <form action="" method="POST">
        @csrf

        <div class="flex gap-4 mb-4">
            <span>
                <label class="block font-semibold">Month & Year:</label>
                <input type="month" name="month_year" class="border rounded px-2 py-1 w-40">
            </span>
            <span>
                <label class="block font-semibold">Location:</label>
                <input type="text" name="location" class="border rounded px-2 py-1 w-60">
            </span>
        </div>

        <table class="table-auto border-collapse border border-gray-300 w-full text-center">
            <thead>
                <tr class="bg-gray-200">
                    <th rowspan="2" class="border px-2 py-1">Date</th>
                    <th rowspan="2" class="border px-2 py-1">Equipment Name & ID</th>
                    <th rowspan="2" class="border px-2 py-1">Problem Identified</th>
                    <th colspan="3" class="border px-2 py-1">Time attended & Other details</th>
                    <th rowspan="2" class="border px-2 py-1">Total Downtime</th>
                    <th rowspan="2" class="border px-2 py-1">Remarks if any</th>
                    <th rowspan="2" class="border px-2 py-1">Signature</th>
                </tr>
                <tr class="bg-gray-200">
                    <th class="border px-2 py-1">Breakdown Time</th>
                    <th class="border px-2 py-1">Action Taken</th>
                    <th class="border px-2 py-1">Name of Engineer</th>
                </tr>
            </thead>
            <tbody>
                @for($row = 1; $row <= 10; $row++)
                    <tr>
                        <td class="border px-2 py-1">
                            <input type="date" name="logs[{{ $row }}][date]" class="border rounded px-1 py-1 w-full">
                        </td>
                        <td class="border px-2 py-1">
                            <input type="text" name="logs[{{ $row }}][equipment]" class="border rounded px-1 py-1 w-full">
                        </td>
                        <td class="border px-2 py-1">
                            <input type="text" name="logs[{{ $row }}][problem]" class="border rounded px-1 py-1 w-full">
                        </td>
                        @foreach(['breakdown_time', 'action_taken', 'engineer_name'] as $field)
                            <td class="border px-2 py-1">
                                <input type="text" name="logs[{{ $row }}][{{ $field }}]" class="border rounded px-1 py-1 w-full">
                            </td>
                        @endforeach
                        <td class="border px-2 py-1">
                            <input type="text" name="logs[{{ $row }}][total_downtime]" class="border rounded px-1 py-1 w-full">
                        </td>
                        <td class="border px-2 py-1">
                            <input type="text" name="logs[{{ $row }}][remarks]" class="border rounded px-1 py-1 w-full">
                        </td>
                        <td class="border px-2 py-1">
                            <input type="text" name="logs[{{ $row }}][signature]" class="border rounded px-1 py-1 w-full">
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>

     
    </form>
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