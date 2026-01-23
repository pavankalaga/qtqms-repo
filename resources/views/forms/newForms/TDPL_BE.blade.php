@extends('layouts.base')
@section('content')
    {{-- <!DOCTYPE html> --}}
    {{-- <html lang="en"> --}}

    {{-- <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BE</title>
    </head> --}}
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

    {{-- <body> --}}
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


    <x-formTemplete id="TDPL-BC-FOM-001" docNo="TDPL-BC-FOM-001" docName="Matermal Marker & Pre-eclampsia TRF"
        issueNo="1.0" issueDate="01/10/2024" action="{{ route('be.forms.submit') }}" buttonText="Submit">
        <input type="hidden" id="mm_form_id" name="form_id">


        <p><strong>MATERNAL SERUM / PRE-ECLAMPSIA SCREENING</strong></p>

        <!-- EXTRA PATIENT MOBILE FILTER -->
        <div style="margin-bottom:10px;">
            <strong>Patient Mobile (Filter):</strong>
            <input type="text" id="filter_patient_mobile" name="filter_patient_mobile"
                placeholder="Enter Patient Mobile" oninput="handlePatientMobileFilter(event)"
                onkeydown="return blockEnter(event)">

        </div>

        <table style="width:100%; border-collapse: collapse;" border="1" cellpadding="6">
            <tbody>

                <!-- Requester Information -->
                <tr>
                    <td colspan="3"><strong>Requester Information:</strong></td>
                </tr>

                <tr>
                    <td colspan="3">
                        Physician's Name:
                        <input type="text" class="border p-1 w-48" id="physician_name" name="physician_name">

                        Mobile No:
                        <input type="text" class="border p-1 w-40" id="physician_mobile" name="physician_mobile">
                        <br>

                        Client Name:
                        <input type="text" class="border p-1 w-48" id="client_name" name="client_name">

                        Client Code:
                        <input type="text" class="border p-1 w-40" id="client_code" name="client_code">
                    </td>
                </tr>

                <!-- Test Panels -->
                <tr>
                    <td colspan="3"><strong>Test Panels:</strong></td>
                </tr>

                <tr>
                    <td colspan="3">
                        <p>
                            <input type="checkbox" id="test_maternal" name="test_panels[]" value="maternal_screening">
                            Maternal Screening &nbsp;
                            <input type="checkbox" id="test_dual" name="test_panels[]" value="dual_marker">
                            First Trimester - Dual Marker &nbsp;
                            <input type="checkbox" id="test_triple" name="test_panels[]" value="triple_marker">
                            Second Trimester - Triple Marker &nbsp;
                            <input type="checkbox" id="test_quad" name="test_panels[]" value="quad_marker">
                            Quad Marker (15–20 Weeks)
                        </p>
                        <p>
                            <input type="checkbox" id="test_preeclampsia" name="test_panels[]" value="pre_eclampsia">
                            Pre-Eclampsia Screening &nbsp;
                            <input type="checkbox" id="test_1t_quad" name="test_panels[]" value="1t_quad">
                            1T Quad Test
                        </p>
                        <p>
                            <input type="checkbox" id="test_pappa" name="test_panels[]" value="pappa_panel">
                            PAPP-A, Free BHCG, PLGF, NT (11–13 Weeks + 6 days)
                        </p>
                    </td>
                </tr>

                <!-- Clinical History -->
                <tr>
                    <td colspan="3"><strong>Clinical History:</strong></td>
                </tr>

                <tr>
                    <td colspan="3">
                        Name of Patient:
                        <input type="text" class="border p-1 w-48" id="patient_name" name="patient_name">

                        Age:
                        <input type="number" class="border p-1 w-20" id="patient_age" name="patient_age">

                        DOB:
                        <input type="date" class="border p-1 w-40" id="patient_dob" name="patient_dob">

                        Mobile:
                        <input type="text" class="border p-1 w-40" id="patient_mobile" name="patient_mobile">

                        Email:
                        <input type="email" class="border p-1 w-48" id="patient_email" name="patient_email">
                        <br><br>

                        Weight (kgs):
                        <input type="number" class="border p-1 w-24" id="patient_weight" name="patient_weight">

                        Ethnicity:
                        <input type="text" class="border p-1 w-40" id="ethnicity" name="ethnicity">

                        LMP:
                        <input type="date" class="border p-1 w-40" id="lmp" name="lmp">
                        <br><br>

                        Diabetic Status:
                        <input type="text" class="border p-1 w-32" id="diabetic_status" name="diabetic_status">

                        Chronic Hypertension:
                        <input type="text" class="border p-1 w-40" id="chronic_hypertension"
                            name="chronic_hypertension">
                        <br><br>

                        On Medication (Y/N):
                        <select class="border p-1" id="on_medication" name="on_medication">
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                        </select>

                        If Yes, Specify:
                        <input type="text" class="border p-1 w-64" id="medication_details" name="medication_details">
                        <br><br>

                        Smoking:
                        <select class="border p-1" id="smoking_status" name="smoking_status">
                            <option>Not Known</option>
                            <option>Non-Smoker</option>
                            <option>Smoker</option>
                        </select>
                        <br><br>

                        <strong>Blood Pressure:</strong>
                        Date:
                        <input type="date" class="border p-1" id="bp_date" name="bp_date">

                        Right Arm:
                        <input type="text" class="border p-1 w-32" id="bp_right" name="bp_right">

                        Left Arm:
                        <input type="text" class="border p-1 w-32" id="bp_left" name="bp_left">
                    </td>
                </tr>

                <!-- USG Details -->
                <tr>
                    <td colspan="3"><strong>USG Details:</strong></td>
                </tr>

                <tr>
                    <td colspan="3">
                        Date of Sample Collection:
                        <input type="date" class="border p-1" id="sample_collection_date"
                            name="sample_collection_date">

                        Time:
                        <input type="time" class="border p-1" id="sample_collection_time"
                            name="sample_collection_time">

                        Date of Ultrasound:
                        <input type="date" class="border p-1" id="ultrasound_date" name="ultrasound_date">
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
                    <td><input type="text" class="border p-1 w-full" id="crl_a" name="crl_a"></td>
                    <td><input type="text" class="border p-1 w-full" id="crl_b" name="crl_b"></td>
                </tr>

                <tr>
                    <td>NT</td>
                    <td><input type="text" class="border p-1 w-full" id="nt_a" name="nt_a"></td>
                    <td><input type="text" class="border p-1 w-full" id="nt_b" name="nt_b"></td>
                </tr>

                <tr>
                    <td>NB</td>
                    <td><input type="text" class="border p-1 w-full" id="nb_a" name="nb_a"></td>
                    <td><input type="text" class="border p-1 w-full" id="nb_b" name="nb_b"></td>
                </tr>

                <tr>
                    <td>BPD</td>
                    <td><input type="text" class="border p-1 w-full" id="bpd_a" name="bpd_a"></td>
                    <td><input type="text" class="border p-1 w-full" id="bpd_b" name="bpd_b"></td>
                </tr>

                <!-- Uterine Artery -->
                <tr>
                    <td colspan="3">
                        <strong>Uterine Artery PI</strong>
                        Left:
                        <input type="text" class="border p-1 w-24" id="uterine_left" name="uterine_left">
                        Right:
                        <input type="text" class="border p-1 w-24" id="uterine_right" name="uterine_right">
                    </td>
                </tr>

                <!-- IVF Pregnancy -->
                <tr>
                    <td colspan="3"><strong>IVF Pregnancy:</strong></td>
                </tr>

                <tr>
                    <td colspan="3">
                        Donor Age:
                        <input type="number" class="border p-1 w-20" id="donor_age" name="donor_age">

                        Donor DOB:
                        <input type="date" class="border p-1" id="donor_dob" name="donor_dob">

                        Type of IVF:
                        <input type="text" class="border p-1 w-40" id="ivf_type" name="ivf_type">
                        <br><br>

                        Extraction Date:
                        <input type="date" class="border p-1" id="extraction_date" name="extraction_date">

                        Transfer Date:
                        <input type="date" class="border p-1" id="transfer_date" name="transfer_date">

                        HCG Injection Taken:
                        <select class="border p-1" id="hcg_taken" name="hcg_taken">
                            <option>No</option>
                            <option>Yes</option>
                        </select>

                        If Yes, Date:
                        <input type="date" class="border p-1" id="hcg_date" name="hcg_date">
                    </td>
                </tr>

            </tbody>
        </table>

        <br>

        <!-- Consent -->
        <p><strong>Patient's Consent</strong></p>
        <p class="border p-2 w-full" rows="8">
            I have read and understood your prenatal screening consent form. I
            understand that this test represents only the risks and not actual diagnostic outcomes - Increased risk does
            not mean that the baby is affected and further tests must be performed before a ﬁrm diagnosis can be made; A
            low risk does not exclude possibility of Down’s syndrome or other abnormalities, as risk assessment does not
            detect all affected pregnancies. I understand that therapeutic decisions should not be made based solely on
            screening results. I give my consent that the specimen(s) shall be the sole exclusive property of TRUSTlab
            Diagnostics, and I transfer all my rights on those specimens to TRUSTlab Diagnostics, for its commercial and
            research use. I understand that you may contact me for patient outcome information. I give my permission as
            required in order to process my claim. I do not object to this information being transmitted through mail,
            fax, telephone or mobile. I also know that I may be called to give follow up information about the pregnancy
            and I give my consent for the same. The referring doctor has explained the details of the screening program
            to me, and I herewith give my consent for this test.
        </p>

        <br><br>

        Patient’s Signature:
        <input type="text" class="border p-1 w-48" id="patient_signature" name="patient_signature">

        Date:
        <input type="date" class="border p-1" id="patient_signature_date" name="patient_signature_date">

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


    <x-formTemplete id="TDPL/BE/FOM-0##" docNo="TDPL/BE/FOM-0##" docName="Daily QC Form for Hot Plate Maintenance"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('be.forms.submit') }}">

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
        </style>

        <!-- HEADER -->
        <p>
            <strong>Month & Year:</strong>
            <input type="month" class="qc-input" id="month_year" name="month_year" onchange="loadHotPlateQc()">

            &nbsp;&nbsp;

            <strong>Instrument S. No.:</strong>
            <input type="text" class="qc-input" id="instrument_serial_no" name="instrument_serial_no">
        </p>

        <!-- TABLE -->
        <table class="qc-table" style="width:100%;">
            <input type="hidden" name="form_id" id="form_id">

            <tbody>

                <tr>
                    <th>Date</th>
                    @for ($d = 1; $d <= 31; $d++)
                        <th>{{ $d }}</th>
                    @endfor
                </tr>

                <!-- Cleaning -->
                <tr>
                    <td><strong>Cleaning From Outside</strong></td>
                    @for ($d = 1; $d <= 31; $d++)
                        <td>
                            <input type="text" class="qc-input hotplate-input"
                                id="cleaning_outside_{{ $d }}" name="cleaning_outside[{{ $d }}]">
                        </td>
                    @endfor
                </tr>

                <!-- Temperature -->
                <tr>
                    <td><strong>Temperature Check</strong></td>
                    @for ($d = 1; $d <= 31; $d++)
                        <td>
                            <input type="text" class="qc-input hotplate-input"
                                id="temperature_check_{{ $d }}" name="temperature_check[{{ $d }}]">
                        </td>
                    @endfor
                </tr>

                <!-- Lab Staff -->
                <tr>
                    <td><strong>Lab Staff Signature</strong></td>
                    @for ($d = 1; $d <= 31; $d++)
                        <td>
                            <input type="text" class="qc-input hotplate-input"
                                id="lab_staff_signature_{{ $d }}"
                                name="lab_staff_signature[{{ $d }}]">
                        </td>
                    @endfor
                </tr>

                <!-- Supervisor -->
                <tr>
                    <td><strong>Lab Supervisor Signature</strong></td>
                    @for ($d = 1; $d <= 31; $d++)
                        <td>
                            <input type="text" class="qc-input hotplate-input"
                                id="lab_supervisor_signature_{{ $d }}"
                                name="lab_supervisor_signature[{{ $d }}]">
                        </td>
                    @endfor
                </tr>

            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete id="TDPL/BE/FOM-006" docNo="TDPL/BE/FOM-006" docName="Bio Safety Cabinet Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('be.forms.submit') }}">
        <input type="hidden" name="bsc_form_id" id="bsc_form_id">
        <!-- ================= FILTER / HEADER DETAILS ================= -->

        <p>
            <strong>Department:</strong>
            <input list="bscDeptList" class="qc-input" name="bsc_department" id="bsc_department" style="width:200px;"
                placeholder="All" oninput="loadBscForm()">

            <datalist id="bscDeptList">
                <option value="Biochemistry">
                <option value="Pathology">
                <option value="Hematology">
                <option value="Microbiology">
            </datalist>

            &nbsp;&nbsp;&nbsp;

            <strong>Month & Year:</strong>
            <input type="month" class="qc-input" name="bsc_month_year" id="bsc_month_year" style="width:180px;"
                onchange="loadBscForm()">

            &nbsp;&nbsp;&nbsp;

            <strong>Equipment ID:</strong>
            <input list="bscEquipList" class="qc-input" name="bsc_equipment_id" id="bsc_equipment_id"
                style="width:180px;" placeholder="All" oninput="loadBscForm()">

            <datalist id="bscEquipList">
                <option value="BSC-001">
                <option value="BSC-002">
                <option value="BSC-003">
            </datalist>

        </p>

        <br>

        <!-- ================= MAIN TABLE ================= -->

        <table class="qc-table" style="width:100%;">

            <tbody>

                <!-- HEADER ROW 1 -->
                <tr>
                    <th rowspan="3">Date</th>
                    <th rowspan="3">Clean with 70% IPA</th>
                    <th rowspan="3">UV Light 15 mins</th>
                    <th rowspan="3">Manometer Reading (10±1)</th>
                    <th rowspan="3">Done By Sign</th>
                    <th rowspan="3">1% Hypo Available</th>
                    <th></th>
                    <th></th>
                    <th colspan="3">Weekly Maintenance</th>
                    <th></th>
                    <th></th>
                </tr>

                <!-- HEADER ROW 2 -->
                <tr>
                    <th rowspan="2">Settle Plate Date</th>
                    <th colspan="3">Settle Plate Results (0–5 CFU)</th>
                    <th rowspan="2">UV Efficacy</th>
                    <th rowspan="2">Checked By</th>
                    <th rowspan="2">Remarks</th>
                </tr>

                <!-- HEADER ROW 3 -->
                <tr>
                    <th>Yes</th>
                    <th>No</th>
                    <th>CFU</th>
                </tr>

                <!-- ================= DAYS 1–31 ================= -->
                @for ($d = 1; $d <= 31; $d++)
                    <tr>
                        <td><strong>{{ $d }}</strong></td>

                        <td>
                            <input type="text" class="qc-input" name="bsc_clean_ipa[{{ $d }}]"
                                id="bsc_clean_ipa_{{ $d }}">
                        </td>

                        <td>
                            <input type="text" class="qc-input" name="bsc_uv_light[{{ $d }}]"
                                id="bsc_uv_light_{{ $d }}">
                        </td>

                        <td>
                            <input type="text" class="qc-input" name="bsc_manometer[{{ $d }}]"
                                id="bsc_manometer_{{ $d }}">
                        </td>

                        <td>
                            <input type="text" class="qc-input" name="bsc_done_by[{{ $d }}]"
                                id="bsc_done_by_{{ $d }}">
                        </td>

                        <td>
                            <input type="text" class="qc-input" name="bsc_hypo_available[{{ $d }}]"
                                id="bsc_hypo_available_{{ $d }}">
                        </td>

                        <td>
                            <input type="date" class="qc-input" name="bsc_settle_plate_date[{{ $d }}]"
                                id="bsc_settle_plate_date_{{ $d }}">
                        </td>

                        <td>
                            <input type="checkbox" name="bsc_settle_yes[{{ $d }}]"
                                id="bsc_settle_yes_{{ $d }}" value="1">
                        </td>

                        <td>
                            <input type="checkbox" name="bsc_settle_no[{{ $d }}]"
                                id="bsc_settle_no_{{ $d }}" value="1">
                        </td>

                        <td>
                            <input type="text" class="qc-input" name="bsc_settle_cfu[{{ $d }}]"
                                id="bsc_settle_cfu_{{ $d }}" placeholder="0–5">
                        </td>

                        <td>
                            <input type="text" class="qc-input" name="bsc_uv_efficacy[{{ $d }}]"
                                id="bsc_uv_efficacy_{{ $d }}">
                        </td>

                        <td>
                            <input type="text" class="qc-input" name="bsc_checked_by[{{ $d }}]"
                                id="bsc_checked_by_{{ $d }}">
                        </td>

                        <td>
                            <input type="text" class="qc-input" name="bsc_remarks[{{ $d }}]"
                                id="bsc_remarks_{{ $d }}">
                        </td>
                    </tr>
                @endfor

            </tbody>
        </table>

    </x-formTemplete>


    <x-formTemplete id="TDPL/BE-FOM-007" docNo="TDPL/BE-FOM-007" docName="Hot Air Oven Temperature Monitoring Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('be.forms.submit') }}">

        {{-- 🔑 UNIQUE FORM ID --}}
        <input type="hidden" name="hao_form_id" id="hao_form_id">

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

        <!-- ================= FILTERS ================= -->

        <p>
            <strong>Month / Year:</strong>
            <input type="month" class="tlog-input" style="width:180px;" name="hao_month_year" id="hao_month_year"
                onchange="loadHotAirOven()">

            &nbsp;&nbsp;&nbsp;
            <strong>Instrument ID / No.:</strong>
            <input list="haoEquipList" class="tlog-input" style="width:200px;" name="hao_instrument_id"
                id="hao_instrument_id" placeholder="All" oninput="loadHotAirOven()">

            <datalist id="haoEquipList">
                <option value="HAO-001">
                <option value="HAO-002">
                <option value="HAO-003">
            </datalist>


        </p>

        <br>

        <!-- ================= MAIN TABLE ================= -->

        <table class="tlog-table" style="width:100%;">
            <tbody>

                <!-- HEADER -->
                <tr>
                    <th rowspan="2">Date</th>
                    <th colspan="2">Morning</th>
                    <th colspan="2">Evening</th>
                </tr>
                <tr>
                    <th>Temperature (°C)</th>
                    <th>Signature</th>
                    <th>Temperature (°C)</th>
                    <th>Signature</th>
                </tr>

                <!-- DAYS 1–31 -->
                @for ($day = 1; $day <= 31; $day++)
                    <tr>
                        <td><strong>{{ $day }}</strong></td>

                        <td>
                            <input type="text" class="tlog-input" name="hao_morning_temp[{{ $day }}]"
                                id="hao_morning_temp_{{ $day }}">
                        </td>

                        <td>
                            <input type="text" class="tlog-input" name="hao_morning_sign[{{ $day }}]"
                                id="hao_morning_sign_{{ $day }}">
                        </td>

                        <td>
                            <input type="text" class="tlog-input" name="hao_evening_temp[{{ $day }}]"
                                id="hao_evening_temp_{{ $day }}">
                        </td>

                        <td>
                            <input type="text" class="tlog-input" name="hao_evening_sign[{{ $day }}]"
                                id="hao_evening_sign_{{ $day }}">
                        </td>
                    </tr>
                @endfor

            </tbody>
        </table>

        <br>

        <p>
            <strong>Acceptable Temperature:</strong> +10°C to +25°C
        </p>

    </x-formTemplete>


    <x-formTemplete id="TDPL/BE-FOM-008" docNo="TDPL/BE-FOM-008" docName="Incubator Temperature Monitoring Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('be.forms.submit') }}">

        {{-- 🔑 UNIQUE FORM ID --}}
        <input type="hidden" name="inc_form_id" id="inc_form_id">

        <!-- ================= FILTERS ================= -->

        <p>
            <strong>Month / Year:</strong>
            <input type="month" class="tlog-input" style="width:180px;" name="inc_month_year" id="inc_month_year"
                onchange="loadIncubator()">

            &nbsp;&nbsp;&nbsp;

            <strong>Instrument ID / No.:</strong>
            <input list="incEquipList" class="tlog-input" style="width:200px;" name="inc_instrument_id"
                id="inc_instrument_id" placeholder="All" oninput="loadIncubator()">

            <datalist id="incEquipList">
                <option value="INC-001">
                <option value="INC-002">
                <option value="INC-003">
            </datalist>

        </p>

        <br>

        <!-- ================= MAIN TABLE ================= -->

        <table class="tlog-table" style="width:100%;">
            <tbody>

                <!-- HEADER -->
                <tr>
                    <th rowspan="2">Date</th>
                    <th colspan="2">Morning</th>
                    <th colspan="2">Evening</th>
                </tr>
                <tr>
                    <th>Temperature (°C)</th>
                    <th>Signature</th>
                    <th>Temperature (°C)</th>
                    <th>Signature</th>
                </tr>

                <!-- DAYS 1–31 -->
                @for ($day = 1; $day <= 31; $day++)
                    <tr>
                        <td><strong>{{ $day }}</strong></td>

                        <td>
                            <input type="text" class="tlog-input" name="inc_morning_temp[{{ $day }}]"
                                id="inc_morning_temp_{{ $day }}"
                                onblur="inlineSaveInc(this,'inc_morning_temp',{{ $day }})">
                        </td>

                        <td>
                            <input type="text" class="tlog-input" name="inc_morning_sign[{{ $day }}]"
                                id="inc_morning_sign_{{ $day }}"
                                onblur="inlineSaveInc(this,'inc_morning_sign',{{ $day }})">
                        </td>

                        <td>
                            <input type="text" class="tlog-input" name="inc_evening_temp[{{ $day }}]"
                                id="inc_evening_temp_{{ $day }}"
                                onblur="inlineSaveInc(this,'inc_evening_temp',{{ $day }})">
                        </td>

                        <td>
                            <input type="text" class="tlog-input" name="inc_evening_sign[{{ $day }}]"
                                id="inc_evening_sign_{{ $day }}"
                                onblur="inlineSaveInc(this,'inc_evening_sign',{{ $day }})">
                        </td>
                    </tr>
                @endfor

            </tbody>
        </table>

        <br>

        <p>
            <strong>Acceptable Temperature:</strong> ~37°C
        </p>

    </x-formTemplete>

    <x-formTemplete id="TDPL/BE-FOM-009" docNo="TDPL/BE-FOM-009" docName="Laminar Air Flow Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('be.forms.submit') }}">

        {{-- 🔑 UNIQUE FORM ID --}}
        <input type="hidden" name="laf_form_id" id="laf_form_id">

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

        <!-- ================= HEADER ================= -->

        <p>
            <strong>Department:</strong>
            <input list="lafDeptList" class="input-box" style="width:200px;" name="laf_department" id="laf_department"
                placeholder="All" oninput="loadLafForm()">

            <datalist id="lafDeptList">
                <option value="Biochemistry">
                <option value="Pathology">
                <option value="Hematology">
                <option value="Microbiology">
            </datalist>


            &nbsp;&nbsp;&nbsp;&nbsp;

            <strong>Month & Year:</strong>
            <input type="month" class="input-box" style="width:180px;" name="laf_month_year" id="laf_month_year"
                onchange="loadLafForm()">

            &nbsp;&nbsp;&nbsp;&nbsp;

            <strong>Equipment ID:</strong>
            <input list="lafEquipList" class="input-box" style="width:180px;" name="laf_equipment_id"
                id="laf_equipment_id" placeholder="All" oninput="loadLafForm()">

            <datalist id="lafEquipList">
                <option value="LAF-001">
                <option value="LAF-002">
                <option value="LAF-003">
            </datalist>

        </p>

        <br>

        <!-- ================= TABLE ================= -->

        <table class="maint-table" style="width:100%;">
            <tbody>

                {{-- HEADERS (UNCHANGED) --}}
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

                {{-- DAYS 1–31 --}}
                @for ($i = 1; $i <= 31; $i++)
                    <tr>
                        <td><strong>{{ $i }}</strong></td>

                        {{-- Clean with 70% IPA --}}
                        <td>
                            <input type="checkbox" name="laf_clean_ipa[{{ $i }}]"
                                id="laf_clean_ipa_{{ $i }}" value="1">
                        </td>

                        {{-- UV Light --}}
                        <td>
                            <input type="checkbox" name="laf_uv_light[{{ $i }}]"
                                id="laf_uv_light_{{ $i }}" value="1">
                        </td>

                        {{-- Manometer --}}
                        <td>
                            <input type="text" class="input-box" name="laf_manometer[{{ $i }}]"
                                id="laf_manometer_{{ $i }}">
                        </td>

                        {{-- Done by --}}
                        <td>
                            <input type="text" class="input-box" name="laf_done_by[{{ $i }}]"
                                id="laf_done_by_{{ $i }}">
                        </td>

                        {{-- Hypo --}}
                        <td>
                            <select class="input-box" name="laf_hypo_available[{{ $i }}]"
                                id="laf_hypo_available_{{ $i }}">
                                <option value="">Select</option>
                                <option value="Available">Available</option>
                                <option value="Not Available">Not Available</option>
                            </select>
                        </td>

                        {{-- Settle plate date --}}
                        <td>
                            <input type="date" class="input-box" name="laf_settle_plate_date[{{ $i }}]"
                                id="laf_settle_plate_date_{{ $i }}">
                        </td>

                        {{-- Settle plate yes --}}
                        <td>
                            <input type="radio" name="laf_settle_result[{{ $i }}]"
                                id="laf_settle_yes_{{ $i }}" value="yes">
                        </td>

                        {{-- Settle plate no --}}
                        <td>
                            <input type="radio" name="laf_settle_result[{{ $i }}]"
                                id="laf_settle_no_{{ $i }}" value="no">
                        </td>

                        {{-- UV efficacy --}}
                        <td>
                            <select class="input-box" name="laf_uv_efficacy[{{ $i }}]"
                                id="laf_uv_efficacy_{{ $i }}">
                                <option value="">Select</option>
                                <option value="OK">OK</option>
                                <option value="Not OK">Not OK</option>
                            </select>
                        </td>

                        {{-- Checked by --}}
                        <td colspan="2">
                            <input type="text" class="input-box" name="laf_checked_by[{{ $i }}]"
                                id="laf_checked_by_{{ $i }}">
                        </td>

                        {{-- Remarks --}}
                        <td>
                            <input type="text" class="input-box" name="laf_remarks[{{ $i }}]"
                                id="laf_remarks_{{ $i }}">
                        </td>
                    </tr>
                @endfor

            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete id="TDPL/BE/FOM-010" docNo="TDPL/BE/FOM-010" docName="Autoclave Maintenance Form" issueNo="2.0"
        issueDate="01/10/2024" buttonText="Submit" action="{{ route('be.forms.submit') }}">

        {{-- 🔑 UNIQUE FORM ID --}}
        <input type="hidden" name="aut_form_id" id="aut_form_id">

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

        <!-- ================= FILTERS ================= -->

        <p>
            <strong>Month & Year:</strong>
            <input type="month" class="input-box" style="width:180px;" name="aut_month_year" id="aut_month_year"
                onchange="loadAutoclave()">

            &nbsp;&nbsp;&nbsp;&nbsp;

            <strong>Instrument ID / S. No.:</strong>
            <input list="autEquipList" class="input-box" style="width:200px;" name="aut_instrument_id"
                id="aut_instrument_id" placeholder="All" oninput="loadAutoclave()">

            <datalist id="autEquipList">
                <option value="AUTO-001">
                <option value="AUTO-002">
                <option value="AUTO-003">
            </datalist>

            <datalist id="autEquipList">
                <option value="AUTO-001">
                <option value="AUTO-002">
                <option value="AUTO-003">
            </datalist>
        </p>

        <br>

        <!-- ================= TABLE ================= -->

        <table class="clean-table" style="width:100%;">
            <tbody>

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

                        <!-- Cleaning Outside -->
                        <td>
                            <input type="checkbox" name="aut_clean_outside[{{ $i }}]"
                                id="aut_clean_outside_{{ $i }}" value="1">
                        </td>

                        <!-- Chamber Water Change -->
                        <td>
                            <input type="checkbox" name="aut_chamber_water[{{ $i }}]"
                                id="aut_chamber_water_{{ $i }}" value="1">
                        </td>

                        <!-- Cleaning Inside -->
                        <td>
                            <input type="checkbox" name="aut_clean_inside[{{ $i }}]"
                                id="aut_clean_inside_{{ $i }}" value="1">
                        </td>

                        <!-- Power ON Check -->
                        <td>
                            <input type="checkbox" name="aut_power_check[{{ $i }}]"
                                id="aut_power_check_{{ $i }}" value="1">
                        </td>

                        <!-- Lab Staff Signature -->
                        <td>
                            <input type="text" class="input-box" name="aut_lab_staff_sign[{{ $i }}]"
                                id="aut_lab_staff_sign_{{ $i }}">
                        </td>

                        <!-- Lab Supervisor Signature -->
                        <td>
                            <input type="text" class="input-box" name="aut_lab_supervisor_sign[{{ $i }}]"
                                id="aut_lab_supervisor_sign_{{ $i }}">
                        </td>
                    </tr>
                @endfor

            </tbody>
        </table>

    </x-formTemplete>


    <x-formTemplete id="TDPL/BE/FOM-012" docNo="TDPL/BE/FOM-012" docName="Hot Air Oven Maintenance Form" issueNo="2.0"
        issueDate="01/10/2024" buttonText="Submit" action="{{ route('be.forms.submit') }}">

        {{-- 🔑 UNIQUE FORM ID --}}
        <input type="hidden" name="hao_maint_form_id" id="hao_maint_form_id">

        <p>
            <strong>Month & Year:</strong>
            <input type="month" name="hao_maint_month_year" id="hao_maint_month_year" onchange="loadHaoMaintenance()">

            <strong>Instrument ID / S. No.:</strong>
            <input list="haoMaintEquipList" name="hao_maint_instrument_id" id="hao_maint_instrument_id"
                placeholder="All" oninput="loadHaoMaintenance()">

            <datalist id="haoMaintEquipList">
                <option value="HAO-001">
                <option value="HAO-002">
                <option value="HAO-003">
            </datalist>

        </p>

        <table border="1" cellpadding="5" cellspacing="0" width="100%"
            style="border-collapse: collapse; text-align:center;">

            <tr>
                <td><strong>Date</strong></td>
                @for ($i = 1; $i <= 31; $i++)
                    <td><strong>{{ $i }}</strong></td>
                @endfor
            </tr>

            <tr>
                <td><strong>Cleaning from Outside</strong></td>
                @for ($i = 1; $i <= 31; $i++)
                    <td>
                        <input type="checkbox" name="hao_maint_clean_outside[{{ $i }}]"
                            id="hao_maint_clean_outside_{{ $i }}" value="1">
                    </td>
                @endfor
            </tr>

            <tr>
                <td><strong>Cleaning from Inside with Isopropyl Alcohol</strong></td>
                @for ($i = 1; $i <= 31; $i++)
                    <td>
                        <input type="checkbox" name="hao_maint_clean_inside[{{ $i }}]"
                            id="hao_maint_clean_inside_{{ $i }}" value="1">
                    </td>
                @endfor
            </tr>

            <tr>
                <td><strong>Temperature Check</strong></td>
                @for ($i = 1; $i <= 31; $i++)
                    <td>
                        <input type="checkbox" name="hao_maint_temperature_check[{{ $i }}]"
                            id="hao_maint_temperature_check_{{ $i }}" value="1">
                    </td>
                @endfor
            </tr>

            <tr>
                <td><strong>Check Power ON with Light</strong></td>
                @for ($i = 1; $i <= 31; $i++)
                    <td>
                        <input type="checkbox" name="hao_maint_power_check[{{ $i }}]"
                            id="hao_maint_power_check_{{ $i }}" value="1">
                    </td>
                @endfor
            </tr>

            <tr>
                <td><strong>Lab Staff Signature</strong></td>
                @for ($i = 1; $i <= 31; $i++)
                    <td>
                        <input type="text" style="width: 70px;" name="hao_maint_lab_staff_sign[{{ $i }}]"
                            id="hao_maint_lab_staff_sign_{{ $i }}">
                    </td>
                @endfor
            </tr>

            <tr>
                <td><strong>Lab Supervisor Signature</strong></td>
                @for ($i = 1; $i <= 31; $i++)
                    <td>
                        <input type="text" style="width: 70px;"
                            name="hao_maint_lab_supervisor_sign[{{ $i }}]"
                            id="hao_maint_lab_supervisor_sign_{{ $i }}">
                    </td>
                @endfor
            </tr>

        </table>

        <br><br>

    </x-formTemplete>


    <x-formTemplete id="TDPL/BE/FOM-013" docNo="TDPL/BE/FOM-013" docName="Incubator Maintenance Form" issueNo="2.0"
        issueDate="01/10/2024" buttonText="Submit" action="{{ route('be.forms.submit') }}">

        {{-- 🔑 UNIQUE FORM ID --}}
        <input type="hidden" name="inc_maint_form_id" id="inc_maint_form_id">

        <p style="display:flex; align-items:center; gap:24px; flex-wrap:wrap;">

            <span style="display:flex; align-items:center; gap:8px;">
                <strong>Month & Year:</strong>
                <input type="month" class="qc-input" name="inc_maint_month_year" id="inc_maint_month_year"
                    style="width:180px;" onchange="loadIncubatorMaintenance()">
            </span>

            <span style="display:flex; align-items:center; gap:8px;">
                <strong>Instrument S. No.:</strong>
                <input list="incMaintEquipList" class="qc-input" name="inc_maint_instrument_id"
                    id="inc_maint_instrument_id" placeholder="All" style="width:220px;"
                    oninput="loadIncubatorMaintenance()">

                <datalist id="incMaintEquipList">
                    <option value="INC-001">
                    <option value="INC-002">
                    <option value="INC-003">
                </datalist>
            </span>

        </p>

        <table border="1" cellpadding="6" cellspacing="0"
            style="border-collapse: collapse; width: 100%; text-align: center;">
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

                @for ($i = 1; $i <= 31; $i++)
                    <tr>
                        <td><strong>{{ $i }}</strong></td>

                        <td>
                            <input type="text" name="inc_maint_clean_outside[{{ $i }}]"
                                id="inc_maint_clean_outside_{{ $i }}" style="width:100%;">
                        </td>

                        <td>
                            <input type="text" name="inc_maint_clean_inside[{{ $i }}]"
                                id="inc_maint_clean_inside_{{ $i }}" style="width:100%;">
                        </td>

                        <td>
                            <input type="text" name="inc_maint_temperature_check[{{ $i }}]"
                                id="inc_maint_temperature_check_{{ $i }}" style="width:100%;">
                        </td>

                        <td>
                            <input type="text" name="inc_maint_power_check[{{ $i }}]"
                                id="inc_maint_power_check_{{ $i }}" style="width:100%;">
                        </td>

                        <td>
                            <input type="text" name="inc_maint_lab_staff_sign[{{ $i }}]"
                                id="inc_maint_lab_staff_sign_{{ $i }}" style="width:100%;">
                        </td>

                        <td>
                            <input type="text" name="inc_maint_lab_supervisor_sign[{{ $i }}]"
                                id="inc_maint_lab_supervisor_sign_{{ $i }}" style="width:100%;">
                        </td>
                    </tr>
                @endfor

            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete id="TDPL/BE/FOM-014" docNo="TDPL/BE/FOM-014" docName="Centrifuge Maintenance Form" issueNo="2.0"
        issueDate="01/10/2024" buttonText="Submit" action="{{ route('be.forms.submit') }}">

        {{-- 🔑 UNIQUE FORM ID --}}
        <input type="hidden" name="cen_form_id" id="cen_form_id">

        <p style="display:flex; align-items:center; gap:24px; flex-wrap:wrap;">

            <span style="display:flex; align-items:center; gap:8px;">
                <strong>Month & Year:</strong>
                <input type="month" class="qc-input" name="cen_month_year" id="cen_month_year" style="width:180px;"
                    onchange="loadCentrifuge()">
            </span>

            <span style="display:flex; align-items:center; gap:8px;">
                <strong>Instrument S. No.:</strong>
                <input list="cenEquipList" class="qc-input" name="cen_instrument_id" id="cen_instrument_id"
                    placeholder="All" style="width:220px;" oninput="loadCentrifuge()">

                <datalist id="cenEquipList">
                    <option value="CEN-001">
                    <option value="CEN-002">
                    <option value="CEN-003">
                </datalist>
            </span>

        </p>

        <table border="1" cellpadding="6" cellspacing="0"
            style="border-collapse: collapse; width:100%; text-align:center;">
            <tbody>

                <!-- DATE HEADER -->
                <tr>
                    <td><strong>Date</strong></td>
                    @for ($d = 1; $d <= 31; $d++)
                        @if (in_array($d, [8, 16, 24]))
                            <td colspan="2"><strong>{{ $d }}</strong></td>
                        @else
                            <td><strong>{{ $d }}</strong></td>
                        @endif
                    @endfor
                </tr>

                <tr>
                    <td colspan="35"><strong>Daily Maintenance</strong></td>
                </tr>

                @php
                    $rows = [
                        'Cleaning from outside' => 'clean_outside',
                        'Cleaning from Inside' => 'clean_inside',
                        'Check Power Cord & Switch' => 'power_check',
                        'Check Carbon Brush' => 'carbon_brush',
                        'Lab Staff Signature' => 'lab_staff_sign',
                        'Lab Supervisor Signature' => 'lab_supervisor_sign',
                    ];
                @endphp

                @foreach ($rows as $label => $key)
                    <tr>
                        <td><strong>{{ $label }}</strong></td>

                        @for ($d = 1; $d <= 31; $d++)
                            @if (in_array($d, [8, 16, 24]))
                                <td colspan="2">
                                    <input type="text" class="qc-input"
                                        name="cen_{{ $key }}[{{ $d }}]"
                                        id="cen_{{ $key }}_{{ $d }}">
                                </td>
                            @else
                                <td>
                                    <input type="text" class="qc-input"
                                        name="cen_{{ $key }}[{{ $d }}]"
                                        id="cen_{{ $key }}_{{ $d }}">
                                </td>
                            @endif
                        @endfor
                    </tr>
                @endforeach

                <tr>
                    <td colspan="35"><strong>Weekly Maintenance</strong></td>
                </tr>

                <tr>
                    <td><strong>Clean Tube holders with 1% Sodium Hypochlorite</strong></td>
                    <td colspan="8"><input type="text" class="qc-input" name="cen_week1_date"></td>
                    <td colspan="9"><input type="text" class="qc-input" name="cen_week2_date"></td>
                    <td colspan="9"><input type="text" class="qc-input" name="cen_week3_date"></td>
                    <td colspan="8"><input type="text" class="qc-input" name="cen_week4_date"></td>
                </tr>

                <tr>
                    <td><strong>Lab Staff Signature</strong></td>
                    <td colspan="8"><input type="text" class="qc-input" name="cen_week1_staff"></td>
                    <td colspan="9"><input type="text" class="qc-input" name="cen_week2_staff"></td>
                    <td colspan="9"><input type="text" class="qc-input" name="cen_week3_staff"></td>
                    <td colspan="8"><input type="text" class="qc-input" name="cen_week4_staff"></td>
                </tr>

                <tr>
                    <td><strong>Lab Supervisor Signature</strong></td>
                    <td colspan="8"><input type="text" class="qc-input" name="cen_week1_supervisor"></td>
                    <td colspan="9"><input type="text" class="qc-input" name="cen_week2_supervisor"></td>
                    <td colspan="9"><input type="text" class="qc-input" name="cen_week3_supervisor"></td>
                    <td colspan="8"><input type="text" class="qc-input" name="cen_week4_supervisor"></td>
                </tr>

            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete id="TDPL/BE/FOM-015" docNo="TDPL/BE/FOM-015" docName="Beckman Coulter DXC700AU Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('be.forms.submit') }}">

        {{-- 🔑 UNIQUE FORM ID --}}
        <input type="hidden" name="dxc_form_id" id="dxc_form_id">
        <div style="display:flex; gap:24px; align-items:center; flex-wrap:wrap; margin-bottom:12px;">

            <div style="display:flex; align-items:center; gap:8px;">
                <label><strong>Month/Year:</strong></label>
                <input type="month" class="qc-input" name="dxc_month_year" id="dxc_month_year" style="width:180px;"
                    onchange="loadDxcForm()">
            </div>

            <div style="display:flex; align-items:center; gap:8px;">
                <label><strong>Location:</strong></label>
                <input list="dxcLocationList" class="qc-input" name="dxc_location" id="dxc_location" placeholder="All"
                    style="width:220px;" oninput="loadDxcForm()">

                <datalist id="dxcLocationList">
                    <option value="Hyderabad">
                    <option value="Bangalore">
                    <option value="Chennai">
                    <option value="Mumbai">
                </datalist>
            </div>

            <div style="display:flex; align-items:center; gap:8px;">
                <label><strong>Department:</strong></label>
                <input list="dxcDeptList" class="qc-input" name="dxc_department" id="dxc_department" placeholder="All"
                    style="width:220px;" oninput="loadDxcForm()">

                <datalist id="dxcDeptList">
                    <option value="Biochemistry">
                    <option value="Pathology">
                    <option value="Hematology">
                    <option value="Microbiology">
                </datalist>
            </div>

        </div>


        <table class="w-full border-collapse" border="1">
            <tbody>

                <!-- DATE HEADER -->
                <tr>
                    <td><strong>Date</strong></td>
                    @for ($i = 1; $i <= 31; $i++)
                        @if ($i == 9 || $i == 17 || $i == 24)
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

                {{-- DAILY ROWS --}}
                @php
                    $dailyRows = [
                        'Inspect the Syringes for Leaks' => 'inspect_syringes',
                        'Inspect the Wash Solution Roller Pump for Leaks' => 'inspect_roller_pump',
                        'Inspect The Sample Probe, Reagent Probe, and Mix Bars' => 'inspect_probes',
                        'Replace the Deionized Water or Diluent in the Pre- Dilution Bottle' => 'replace_diluent',
                        'Replace the Sample Probe Wash Solutions' => 'replace_probe_wash',
                        'Clean the ISE' => 'clean_ise',
                        'Calibrate the ISE' => 'calibrate_ise',
                        'Performed by' => 'performed_by',
                        'Reviewed By' => 'reviewed_by',
                    ];
                @endphp

                @foreach ($dailyRows as $label => $key)
                    <tr>
                        <td><strong>{{ $label }}</strong></td>

                        @for ($i = 1; $i <= 31; $i++)
                            @if ($i == 9 || $i == 17 || $i == 24)
                                <td colspan="2">
                                    <input type="text" class="qc-input"
                                        name="dxc_{{ $key }}[{{ $i }}]"
                                        id="dxc_{{ $key }}_{{ $i }}">
                                </td>
                            @else
                                <td>
                                    <input type="text" class="qc-input"
                                        name="dxc_{{ $key }}[{{ $i }}]"
                                        id="dxc_{{ $key }}_{{ $i }}">
                                </td>
                            @endif
                        @endfor
                    </tr>
                @endforeach

                <!-- Weekly Header -->
                <tr>
                    <td><strong>Weekly Maintenance</strong></td>

                    <td colspan="9">
                        <strong>1st Week – Date:</strong>
                        <input type="text" class="qc-input" name="dxc_week_date[1]">
                    </td>

                    <td colspan="9">
                        <strong>2nd Week – Date:</strong>
                        <input type="text" class="qc-input" name="dxc_week_date[2]">
                    </td>

                    <td colspan="8">
                        <strong>3rd Week – Date:</strong>
                        <input type="text" class="qc-input" name="dxc_week_date[3]">
                    </td>

                    <td colspan="8">
                        <strong>4th Week – Date:</strong>
                        <input type="text" class="qc-input" name="dxc_week_date[4]">
                    </td>
                </tr>

                {{-- WEEKLY ROWS --}}
                @php
                    $weeklyRows = [
                        'Clean the Sample Probe and Mix Bars' => 'clean_probe_mix',
                        'Perform a W2' => 'perform_w2',
                        'Performed by Supervisor' => 'performed_supervisor',
                    ];
                @endphp

                @foreach ($weeklyRows as $label => $key)
                    <tr>
                        <td><strong>{{ $label }}</strong></td>

                        <td colspan="9">
                            <input type="text" class="qc-input-wide" name="dxc_{{ $key }}[1]">
                        </td>

                        <td colspan="9">
                            <input type="text" class="qc-input-wide" name="dxc_{{ $key }}[2]">
                        </td>

                        <td colspan="8">
                            <input type="text" class="qc-input-wide" name="dxc_{{ $key }}[3]">
                        </td>

                        <td colspan="8">
                            <input type="text" class="qc-input-wide" name="dxc_{{ $key }}[4]">
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </x-formTemplete>



    <x-formTemplete id="TDPL/BE/FOM-016" docNo="TDPL/BE/FOM-016" docName="Beckman Coulter DxI800 Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('be.forms.submit') }}">

        {{-- 🔑 UNIQUE FORM ID --}}
        <input type="hidden" name="dxi_form_id" id="dxi_form_id">

        <!-- Top Section -->
        <div style="display:flex; gap:24px; align-items:flex-end; margin-bottom:16px; flex-wrap:wrap;">

            <div style="display:flex; flex-direction:column;">
                <label><strong>Month / Year:</strong></label>
                <input type="month" class="qc-input" style="min-width:180px; height:34px;" name="dxi_month_year"
                    id="dxi_month_year" onchange="loadDxiForm()">
            </div>

            <div style="display:flex; flex-direction:column;">
                <label><strong>Location:</strong></label>
                <input list="dxiLocationList" class="qc-input" style="min-width:200px; height:34px;"
                    name="dxi_location" id="dxi_location" placeholder="All" oninput="loadDxiForm()">

                <datalist id="dxiLocationList">
                    <option value="Hyderabad">
                    <option value="Bangalore">
                    <option value="Chennai">
                    <option value="Mumbai">
                </datalist>
            </div>

            <div style="display:flex; flex-direction:column;">
                <label><strong>Department:</strong></label>
                <input list="dxiDeptList" class="qc-input" style="min-width:220px; height:34px;"
                    name="dxi_department" id="dxi_department" placeholder="All" oninput="loadDxiForm()">

                <datalist id="dxiDeptList">
                    <option value="Biochemistry">
                    <option value="Pathology">
                    <option value="Hematology">
                    <option value="Microbiology">
                </datalist>
            </div>

        </div>


        <!-- Full Table -->
        <table class="qc-table" border="1" style="width:100%; border-collapse: collapse;">

            <!-- Date Row -->
            <tr>
                <td><strong>Date</strong></td>
                @for ($d = 1; $d <= 31; $d++)
                    <td><strong>{{ $d }}</strong></td>
                @endfor
            </tr>

            <!-- Daily Maintenance Title -->
            <tr>
                <td colspan="32"><strong>DAILY MAINTENANCE</strong></td>
            </tr>

            @php
                $dailyRows = [
                    'System Backup Successful' => 'system_backup',
                    'Check Zone Temperature' => 'zone_temperature',
                    'Check System Supplies' => 'system_supplies',
                    'Clean Probe Exteriors' => 'clean_probe',
                    'Check Solid Waste' => 'solid_waste',
                    'Prime Substrate' => 'prime_substrate',
                    'Run The Daily Cleaning' => 'daily_cleaning',
                    'Performed By' => 'performed_by',
                    'Reviewed By' => 'reviewed_by',
                ];
            @endphp

            @foreach ($dailyRows as $label => $key)
                <tr>
                    <td><strong>{{ $label }}</strong></td>
                    @for ($i = 1; $i <= 31; $i++)
                        <td>
                            <input type="text" class="qc-input"
                                name="dxi_{{ $key }}[{{ $i }}]"
                                id="dxi_{{ $key }}_{{ $i }}">
                        </td>
                    @endfor
                </tr>
            @endforeach

            <!-- Weekly Maintenance Section -->
            <tr>
                <td><strong>WEEKLY MAINTENANCE</strong></td>
                <td colspan="8">
                    <strong>1st Week – Date:</strong>
                    <input type="text" class="qc-input" name="dxi_week_date[week1]" id="dxi_week_date_week1">
                </td>
                <td colspan="9">
                    <strong>2nd Week – Date:</strong>
                    <input type="text" class="qc-input" name="dxi_week_date[week2]" id="dxi_week_date_week2">
                </td>
                <td colspan="9">
                    <strong>3rd Week – Date:</strong>
                    <input type="text" class="qc-input" name="dxi_week_date[week3]" id="dxi_week_date_week3">
                </td>
                <td colspan="8">
                    <strong>4th Week – Date:</strong>
                    <input type="text" class="qc-input" name="dxi_week_date[week4]" id="dxi_week_date_week4">
                </td>
            </tr>

            @php
                $weeklyRows = [
                    'Clean Instrument Exterior' => 'clean_exterior',
                    'Inspect / Clean Primary Probe' => 'clean_primary_probe',
                    'Check Waste Filter Bottle' => 'waste_filter',
                    'Run System Check' => 'system_check',
                    'Performed by Supervisor' => 'supervisor_sign',
                ];
            @endphp

            @foreach ($weeklyRows as $label => $key)
                <tr>
                    <td><strong>{{ $label }}</strong></td>

                    <td colspan="8">
                        <input type="text" class="qc-input-wide" name="dxi_{{ $key }}[week1]"
                            id="dxi_{{ $key }}_week1">
                    </td>

                    <td colspan="9">
                        <input type="text" class="qc-input-wide" name="dxi_{{ $key }}[week2]"
                            id="dxi_{{ $key }}_week2">
                    </td>

                    <td colspan="9">
                        <input type="text" class="qc-input-wide" name="dxi_{{ $key }}[week3]"
                            id="dxi_{{ $key }}_week3">
                    </td>

                    <td colspan="8">
                        <input type="text" class="qc-input-wide" name="dxi_{{ $key }}[week4]"
                            id="dxi_{{ $key }}_week4">
                    </td>
                </tr>
            @endforeach

        </table>

    </x-formTemplete>



    <x-formTemplete id="TDPL/BE/FOM-017" docNo="TDPL/BE/FOM-017" docName="Sensa Core aQua ST-200 Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('be.forms.submit') }}">

        {{-- 🔑 UNIQUE FORM ID --}}
        <input type="hidden" name="st200_form_id" id="st200_form_id">

        <form>

            <p>
                <strong>Month & Year:</strong>
                <input type="month" class="qc-input" style="width:150px; margin-right:40px;"
                    name="st200_month_year" id="st200_month_year" onchange="loadSt200Form()">

                <strong>Instrument S. No.:</strong>
                <input list="st200EquipList" class="qc-input" style="width:150px;" name="st200_instrument_id"
                    id="st200_instrument_id" placeholder="All" oninput="loadSt200Form()">

                <datalist id="st200EquipList">
                    <option value="ST200-001">
                    <option value="ST200-002">
                    <option value="ST200-003">
                </datalist>

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
                    @for ($day = 1; $day <= 31; $day++)
                        <tr>
                            <td><strong>{{ $day }}</strong></td>

                            <td>
                                <input type="text" class="qc-input-wide"
                                    name="st200_clean_instrument[{{ $day }}]"
                                    id="st200_clean_instrument_{{ $day }}">
                            </td>

                            <td>
                                <input type="text" class="qc-input-wide"
                                    name="st200_empty_waste[{{ $day }}]"
                                    id="st200_empty_waste_{{ $day }}">
                            </td>

                            <td>
                                <input type="text" class="qc-input-wide"
                                    name="st200_printer_status[{{ $day }}]"
                                    id="st200_printer_status_{{ $day }}">
                            </td>

                            <td>
                                <input type="text" class="qc-input-wide"
                                    name="st200_daily_cleaning_solution[{{ $day }}]"
                                    id="st200_daily_cleaning_solution_{{ $day }}">
                            </td>

                            <td>
                                <input type="text" class="qc-input-wide"
                                    name="st200_calibration[{{ $day }}]"
                                    id="st200_calibration_{{ $day }}">
                            </td>

                            <td>
                                <input type="text" class="qc-input-wide"
                                    name="st200_shutdown[{{ $day }}]"
                                    id="st200_shutdown_{{ $day }}">
                            </td>

                            <td>
                                <input type="text" class="qc-input-wide"
                                    name="st200_lab_staff_sign[{{ $day }}]"
                                    id="st200_lab_staff_sign_{{ $day }}">
                            </td>

                            <td>
                                <input type="text" class="qc-input-wide"
                                    name="st200_lab_supervisor_sign[{{ $day }}]"
                                    id="st200_lab_supervisor_sign_{{ $day }}">
                            </td>
                        </tr>
                    @endfor

                </tbody>
            </table>

        </form>

    </x-formTemplete>

    <x-formTemplete id="TDPL/BE/FOM-018" docNo="TDPL/BE/FOM-018" docName="Tosoh HLC-723GX Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('be.forms.submit') }}">

        {{-- 🔑 INLINE EDIT ID --}}
        <input type="hidden" name="form_id" id="tosoh_form_id">

        <p>
            <strong>Month &amp; Year:</strong>
            <input type="month" name="tosoh_month_year" id="tosoh_month_year" class="qc-input"
                style="width:180px;" onchange="loadTosohForm()">

            &nbsp;&nbsp;

            <strong>Instrument S. No.:</strong>
            <input list="tosohEquipList" class="qc-input" style="width:180px;" name="tosoh_instrument_serial"
                id="tosoh_instrument_serial" placeholder="All" oninput="loadTosohForm()">

            <datalist id="tosohEquipList">
                <option value="HLC-723GX-001">
                <option value="HLC-723GX-002">
                <option value="HLC-723GX-003">
            </datalist>
        </p>

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
                    $sections = ['Buffer 1', 'Buffer 2', 'Buffer 3', 'H/W Soln', 'Filter Count', 'Column Count'];
                @endphp

                @foreach ($sections as $section)
                    {{-- CHECK ROW --}}
                    <tr>
                        <td rowspan="2"><strong>{{ $section }}</strong></td>
                        <td><strong>Check</strong></td>

                        @for ($i = 1; $i <= 31; $i++)
                            <td>
                                <input type="text" name="{{ Str::slug($section) }}_check_{{ $i }}"
                                    class="form-control qc-input">
                            </td>
                        @endfor
                    </tr>

                    {{-- CHANGE ROW --}}
                    <tr>
                        <td><strong>Change</strong></td>

                        @for ($i = 1; $i <= 31; $i++)
                            <td>
                                <input type="text" name="{{ Str::slug($section) }}_change_{{ $i }}"
                                    class="form-control qc-input">
                            </td>
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
                        <td>
                            <input type="text" name="operator_sign_{{ $i }}"
                                class="form-control qc-input">
                        </td>
                    @endfor
                </tr>

                <tr>
                    <td colspan="33"></td>
                </tr>

                {{-- Reviewed By --}}
                <tr>
                    <td colspan="2"><strong>Reviewed By</strong></td>
                    @for ($i = 1; $i <= 31; $i++)
                        <td>
                            <input type="text" name="reviewed_by_{{ $i }}"
                                class="form-control qc-input">
                        </td>
                    @endfor
                </tr>

            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete id="TDPL/BE/FOM-019" docNo="TDPL/BE/FOM-019" docName="Beckman Coulter DXH560 Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('be.forms.submit') }}">

        {{-- 🔑 UNIQUE FORM ID (INLINE EDIT SUPPORT) --}}
        <input type="hidden" name="dxh560_form_id" id="dxh560_form_id">

        @csrf

        {{-- FILTERS --}}
        <p>
            <strong>Month &amp; Year:</strong>
            <input type="month" name="dxh560_month_year" id="dxh560_month_year" class="qc-input"
                style="width:180px;" onchange="loadDxh560Form()">

            &nbsp;&nbsp;

            <strong>Instrument S. No.:</strong>
            <input list="dxh560EquipList" name="dxh560_instrument_serial" id="dxh560_instrument_serial"
                class="qc-input" style="width:180px;" placeholder="All" oninput="loadDxh560Form()">

            <datalist id="dxh560EquipList">
                <option value="DXH560-001">
                <option value="DXH560-002">
                <option value="DXH560-003">
            </datalist>
        </p>

        <table border="1" cellpadding="4" cellspacing="0" style="border-collapse:collapse; width:100%;">
            <tbody>

                {{-- DATE HEADER --}}
                <tr>
                    <td><strong>Date</strong></td>
                    @for ($i = 1; $i <= 31; $i++)
                        <td><strong>{{ $i }}</strong></td>
                    @endfor
                </tr>

                {{-- DAILY MAINTENANCE --}}
                <tr>
                    <td colspan="32"><strong>Daily Maintenance</strong></td>
                </tr>

                @php
                    $dailyRows = [
                        'Cleaning of Baths' => 'cleaning_of_baths',
                        'Remove any dust on the machine, by dusting / pat drying the analyzer' => 'dust_cleaning',
                        'Staff Initial' => 'staff_initial',
                    ];
                @endphp

                @foreach ($dailyRows as $label => $key)
                    <tr>
                        <td><strong>{{ $label }}</strong></td>
                        @for ($i = 1; $i <= 31; $i++)
                            <td>
                                <input type="text" name="dxh560_daily[{{ $key }}][{{ $i }}]"
                                    id="dxh560_daily_{{ $key }}_{{ $i }}" class="qc-input"
                                    style="width:100%;">
                            </td>
                        @endfor
                    </tr>
                @endforeach

                {{-- WEEKLY MAINTENANCE --}}
                <tr>
                    <td colspan="32"><strong>Weekly Maintenance</strong></td>
                </tr>

                <tr>
                    <td></td>
                    <td colspan="8"><strong>Week 1 - Date:</strong></td>
                    <td colspan="8"><strong>Week 2 - Date:</strong></td>
                    <td colspan="8"><strong>Week 3 - Date:</strong></td>
                    <td colspan="7"><strong>Week 4 - Date:</strong></td>
                </tr>

                @php
                    $weeklyRows = [
                        'Rinsing of Baths' => 'rinsing_of_baths',
                        'Draining the Baths' => 'draining_baths',
                        'Flushing the aperture' => 'flushing_aperture',
                        'Initial of the person who conducted the maintenance' => 'maintenance_initial',
                    ];
                @endphp

                @foreach ($weeklyRows as $label => $key)
                    <tr>
                        <td><strong>{{ $label }}</strong></td>

                        <td colspan="8">
                            <input type="text" name="dxh560_weekly[{{ $key }}][week1]" class="qc-input"
                                style="width:100%;">
                        </td>

                        <td colspan="8">
                            <input type="text" name="dxh560_weekly[{{ $key }}][week2]" class="qc-input"
                                style="width:100%;">
                        </td>

                        <td colspan="8">
                            <input type="text" name="dxh560_weekly[{{ $key }}][week3]" class="qc-input"
                                style="width:100%;">
                        </td>

                        <td colspan="7">
                            <input type="text" name="dxh560_weekly[{{ $key }}][week4]" class="qc-input"
                                style="width:100%;">
                        </td>
                    </tr>
                @endforeach

                {{-- 🔒 GRID RESET (INVISIBLE – DO NOT REMOVE) --}}
                <tr>
                    <td colspan="32" style="padding:0;border:none;height:0;"></td>
                </tr>

                {{-- MONTHLY MAINTENANCE --}}
                <tr>
                    <td colspan="32"><strong>Monthly Maintenance</strong></td>
                </tr>

                <tr>
                    <td colspan="32"><strong>Depends on the usage cycles/day</strong></td>
                </tr>

                <tr>
                    <td>
                        <strong>
                            Perform Bleaching cycle
                            (Use 5ml Bleach + 5ml D/W, filter and use)
                        </strong>
                    </td>

                    <td colspan="15">
                        <input type="text" name="dxh560_monthly[bleach_cycle][notes]" class="qc-input"
                            style="width:100%;">
                    </td>

                    <td colspan="16">
                        <input type="text" name="dxh560_monthly[bleach_cycle][dates]" class="qc-input"
                            style="width:100%;">
                    </td>
                </tr>

                {{-- TECHNICIAN SIGNATURE --}}
                <tr>
                    <td><strong>Technician Signature</strong></td>

                    <td colspan="15">
                        <input type="text" name="dxh560_technician[name]" class="qc-input" style="width:100%;">
                    </td>

                    <td colspan="16">
                        <input type="text" name="dxh560_technician[date]" class="qc-input" style="width:100%;">
                    </td>
                </tr>

            </tbody>
        </table>
    </x-formTemplete>



    <x-formTemplete id="TDPL/BE/FOM-020" docNo="TDPL/BE/FOM-020" docName="HORIBA Yumizen H550 Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('be.forms.submit') }}">

        {{-- 🔑 UNIQUE FORM ID --}}
        <input type="hidden" name="h550_form_id" id="h550_form_id">

        <form method="POST" action="">
            @csrf

            <p>
                <strong>Month &amp; Year:</strong>
                <input type="month" name="h550_month_year" id="h550_month_year" class="qc-input"
                    style="width:180px;" onchange="loadH550Form()">

                &nbsp;&nbsp;

                <strong>Instrument S. No.:</strong>
                <input list="h550EquipList" class="qc-input" style="width:180px;" name="h550_instrument_serial"
                    id="h550_instrument_serial" placeholder="All" oninput="loadH550Form()">

                <datalist id="h550EquipList">
                    <option value="H550-001">
                    <option value="H550-002">
                    <option value="H550-003">
                </datalist>

            </p>

            <table border="1" cellpadding="4" cellspacing="0" style="border-collapse:collapse; width:100%;">
                <tbody>

                    {{-- HEADER --}}
                    <tr>
                        <td><strong>Date</strong></td>
                        @for ($d = 1; $d <= 31; $d++)
                            <td><strong>{{ $d }}</strong></td>
                        @endfor
                    </tr>

                    {{-- DAILY MAINTENANCE --}}
                    <tr>
                        <td colspan="32"><strong>Daily Maintenance</strong></td>
                    </tr>

                    @php
                        $dailyRows = [
                            'Clean the Instrument' => 'clean_instrument',
                            'Empty Waste Container' => 'empty_waste',
                            'Check Printer and Paper status' => 'printer_status',
                            'Check the Reagent levels in Analyzer Tab' => 'reagent_levels',
                            'Reagent Inventory' => 'reagent_inventory',
                            'Start up (Pass/Fail)' => 'startup_status',
                            'Backflush LMNEB (Weekly)' => 'backflush_lmneb',
                            'Backflush RBC/PLT (Weekly)' => 'backflush_rbc_plt',
                            'Shutdown' => 'shutdown',
                            'Performed By' => 'performed_by',
                            'Verified By' => 'verified_by',
                            'Concentrated Cleaning (Weekly or After 100 Samples)' => 'concentrated_cleaning',
                        ];
                    @endphp

                    @foreach ($dailyRows as $label => $key)
                        <tr>
                            <td><strong>{{ $label }}</strong></td>

                            @for ($d = 1; $d <= 31; $d++)
                                <td>
                                    <input type="text" class="qc-input" style="width:100%;"
                                        name="h550_daily[{{ $key }}][{{ $d }}]"
                                        id="h550_daily_{{ $key }}_{{ $d }}">
                                </td>
                            @endfor
                        </tr>
                    @endforeach

                </tbody>
            </table>

            {{-- INFO BLOCKS (UNCHANGED) --}}
            <div style="margin-top:12px;">
                <table>
                    <tr>
                        <td>
                            <strong>
                                Background Limits:
                                WBC 0.3 &nbsp; RBC 0.03 &nbsp; HB 0.3 &nbsp; PLT 5
                            </strong>
                        </td>
                    </tr>
                </table>

                <table style="margin-top:8px;">
                    <tr>
                        <td>
                            <strong>
                                Backflush LMNEB or RBC/PLT →
                                Maintenance → Hydraulic service → Back flush LMNEB or RBC/PLT
                            </strong>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>
                                Concentrated Cleaning → Maintenance → Concentrated Cleaning
                            </strong>
                        </td>
                    </tr>
                </table>
            </div>

        </form>

    </x-formTemplete>
    <x-formTemplete id="TDPL/BE/FOM-021" docNo="TDPL/BE/FOM-021" docName="Bio-Rad D10 Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('be.forms.submit') }}">

        {{-- 🔑 UNIQUE FORM ID --}}
        <input type="hidden" name="d10_form_id" id="d10_form_id">

        <form method="POST" action="">
            @csrf

            {{-- ===================== TOP DETAILS ===================== --}}
            <p>
                <strong>Month/Year:</strong>
                <input type="month" name="d10_month_year" id="d10_month_year" class="qc-input"
                    style="width:120px;" onchange="loadD10Form()">


                <strong>Location:</strong>
                <input list="d10LocationList" name="d10_location" id="d10_location" class="qc-input"
                    style="width:120px;" placeholder="All" oninput="loadD10Form()">

                <datalist id="d10LocationList">
                    <option value="Hyderabad">
                    <option value="Bangalore">
                    <option value="Chennai">
                </datalist>

                <strong>Department:</strong>
                <input list="d10DepartmentList" name="d10_department" id="d10_department" class="qc-input"
                    style="width:120px;" placeholder="All" oninput="loadD10Form()">

                <datalist id="d10DepartmentList">
                    <option value="Hematology">
                    <option value="Biochemistry">
                    <option value="Pathology">
                </datalist>

                <strong>Instrument ID/S. No.:</strong>
                <input list="d10InstrumentList" name="d10_instrument_serial" id="d10_instrument_serial"
                    class="qc-input" style="width:150px;" placeholder="All" oninput="loadD10Form()">

                <datalist id="d10InstrumentList">
                    <option value="D10-001">
                    <option value="D10-002">
                    <option value="D10-003">
                </datalist>


            </p>

            {{-- ===================== DAILY MAINTENANCE ===================== --}}
            <table border="1" cellspacing="0" cellpadding="4"
                style="border-collapse: collapse; width:100%; margin-top:10px;">

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
                                'Check Method Setting',
                                'Check Reagent Levels 1',
                                'Check Reagent Levels 2',
                                'Check Reagent Onboard Expiration date(s)',
                                'Cartridge Injection Count',
                                'Check Waste Levels',
                                'Pressure Reading',
                                'Check for Leaks',
                                'Check Paper Supply',
                                'Remove Samples',
                                'Wipe Spills',
                            ];
                        @endphp

                        @foreach ($columns as $col)
                            <td><strong>{{ $col }}</strong></td>
                        @endforeach
                    </tr>
                </tbody>

                {{-- DAILY ROWS FOR DAYS 1–31 --}}
                <tbody>
                    @for ($day = 1; $day <= 31; $day++)
                        <tr>
                            {{-- DATE NUMBER --}}
                            <td><strong>{{ $day }}</strong></td>

                            {{-- Input cells --}}
                            @foreach ($columns as $col)
                                <td>
                                    <input type="text" class="qc-input" style="width:100%;"
                                        name="d10_daily[{{ Str::slug($col) }}][{{ $day }}]"
                                        id="d10_daily_{{ Str::slug($col) }}_{{ $day }}">
                                </td>
                            @endforeach

                            {{-- Technician Initials --}}
                            <td>
                                <input type="text" class="qc-input" style="width:100%;"
                                    name="d10_daily[technician_initials][{{ $day }}]"
                                    id="d10_daily_technician_initials_{{ $day }}">
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>

            {{-- ===================== MONTHLY MAINTENANCE ===================== --}}
            <p style="margin-top:20px;">
                <strong>Year:</strong>
                <input type="text" name="d10_year" id="d10_year" class="qc-input" style="width:120px;">

                <strong>Instrument ID/S. No.:</strong>
                <input type="text" name="d10_monthly_instrument_serial" id="d10_monthly_instrument_serial"
                    class="qc-input" style="width:150px;">
            </p>

            <table border="1" cellspacing="0" cellpadding="4"
                style="border-collapse: collapse; width:100%; margin-top:10px;">
                <tbody>

                    <tr>
                        <td colspan="13"><strong>Monthly Maintenance Log</strong></td>
                    </tr>

                    {{-- Month Columns --}}
                    @php
                        $months = ['JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC', 'JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN'];
                    @endphp

                    <tr>
                        <td><strong>MAINTENANCE</strong></td>
                        @foreach ($months as $m)
                            <td><strong>{{ $m }}</strong></td>
                        @endforeach
                    </tr>

                    {{-- Monthly maintenance tasks --}}
                    @php
                        $monthlyTasks = [
                            'Clean Exterior Surfaces',
                            'Clean Interior Surfaces',
                            'Clean/Decontaminate',
                            'Sampling Fluid Path',
                            'Clean Dilution Well',
                            'Clean Internal Waste Bottle',
                            'Clean/Inspect Sample Racks',
                            'Clean Rack Loader',
                        ];
                    @endphp

                    @foreach ($monthlyTasks as $task)
                        <tr>
                            <td><strong>{{ $task }}</strong></td>

                            @foreach ($months as $m)
                                <td>
                                    <input type="text" class="qc-input" style="width:100%;"
                                        name="d10_monthly[{{ Str::slug($task) }}][{{ strtolower($m) }}]"
                                        id="d10_monthly_{{ Str::slug($task) }}_{{ strtolower($m) }}">
                                </td>
                            @endforeach
                        </tr>
                    @endforeach

                    {{-- Technician initials --}}
                    <tr>
                        <td><strong>Technician Initials</strong></td>
                        @foreach ($months as $m)
                            <td>
                                <input type="text" class="qc-input" style="width:100%;"
                                    name="d10_monthly[technician_initials][{{ strtolower($m) }}]"
                                    id="d10_monthly_technician_initials_{{ strtolower($m) }}">
                            </td>
                        @endforeach
                    </tr>

                </tbody>
            </table>

        </form>
    </x-formTemplete>

    <x-formTemplete id="TDPL/BE/FOM-022" docNo="TDPL/BE/FOM-022" docName="Automatic Tissue Processor Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('be.forms.submit') }}">

        {{-- 🔑 UNIQUE FORM ID (INLINE UPDATE) --}}
        <input type="hidden" name="atp_form_id" id="atp_form_id">

        <form method="POST" action="">
            @csrf

            {{-- ===================== TOP DETAILS ===================== --}}
            <p>
                <strong>Month & Year:</strong>
                <input type="month" name="atp_month_year" id="atp_month_year" class="qc-input"
                    style="width:140px; margin-right:30px;" onchange="loadAtpForm()">

                <strong>Instrument ID/S. No:</strong>
                <input type="text" name="atp_instrument_id" id="atp_instrument_id" class="qc-input"
                    style="width:140px;" oninput="loadAtpForm()">
            </p>

            {{-- ===================== DAILY MAINTENANCE ===================== --}}
            <table border="1" cellspacing="0" cellpadding="6"
                style="border-collapse: collapse; width:100%; margin-top:10px;">
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
                    @for ($day = 1; $day <= 31; $day++)
                        <tr>
                            {{-- Date --}}
                            <td><strong>{{ $day }}</strong></td>

                            <td>
                                <input type="text" class="qc-input" style="width:100%;"
                                    name="atp_daily[clean_exterior][{{ $day }}]"
                                    id="atp_daily_clean_exterior_{{ $day }}">
                            </td>

                            <td>
                                <input type="text" class="qc-input" style="width:100%;"
                                    name="atp_daily[change_reagent][{{ $day }}]"
                                    id="atp_daily_change_reagent_{{ $day }}">
                            </td>

                            <td>
                                <input type="text" class="qc-input" style="width:100%;"
                                    name="atp_daily[check_reagent_level][{{ $day }}]"
                                    id="atp_daily_check_reagent_level_{{ $day }}">
                            </td>

                            <td>
                                <input type="text" class="qc-input" style="width:100%;"
                                    name="atp_daily[temperature_am][{{ $day }}]"
                                    id="atp_daily_temperature_am_{{ $day }}">
                            </td>

                            <td>
                                <input type="text" class="qc-input" style="width:100%;"
                                    name="atp_daily[temperature_pm][{{ $day }}]"
                                    id="atp_daily_temperature_pm_{{ $day }}">
                            </td>

                            <td>
                                <input type="text" class="qc-input" style="width:100%;"
                                    name="atp_daily[done_by][{{ $day }}]"
                                    id="atp_daily_done_by_{{ $day }}">
                            </td>
                        </tr>
                    @endfor

                </tbody>
            </table>

        </form>
    </x-formTemplete>

    <x-formTemplete id="TDPL/BE/FOM-023" docNo="TDPL/BE/FOM-023"
        docName="Tissue Embedding Console System Equipment Maintenance Form" issueNo="2.0" issueDate="01/10/2024"
        buttonText="Submit" action="{{ route('be.forms.submit') }}">

        {{-- 🔑 UNIQUE FORM ID (INLINE UPDATE SUPPORT) --}}
        <input type="hidden" name="tec_form_id" id="tec_form_id">

        <form method="POST" action="">
            @csrf

            <p>
                <strong>Month/Year:</strong>
                <input type="month" name="tec_month_year" id="tec_month_year" class="qc-input"
                    style="width:120px;" onchange="loadTecForm()">

                <strong>Instrument ID/S. No.:</strong>
                <input list="tecEquipList" name="tec_instrument_id" id="tec_instrument_id" class="qc-input"
                    style="width:150px;" placeholder="All" oninput="loadTecForm()">

                <datalist id="tecEquipList">
                    <option value="TEC-001">
                    <option value="TEC-002">
                    <option value="TEC-003">
                </datalist>

            </p>

            <table style="width: 100%;" border="1" cellspacing="0" cellpadding="6">
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

                            <td>
                                <input type="text" name="tec_daily[cold_plate_temp][{{ $i }}]"
                                    id="tec_daily_cold_plate_temp_{{ $i }}" class="qc-input"
                                    style="width:100%;">
                            </td>

                            <td>
                                <input type="text" name="tec_daily[hot_plate_temp][{{ $i }}]"
                                    id="tec_daily_hot_plate_temp_{{ $i }}" class="qc-input"
                                    style="width:100%;">
                            </td>

                            <td>
                                <input type="text" name="tec_daily[wax_bath_temp][{{ $i }}]"
                                    id="tec_daily_wax_bath_temp_{{ $i }}" class="qc-input"
                                    style="width:100%;">
                            </td>

                            <td>
                                <input type="text" name="tec_daily[check_cleaning][{{ $i }}]"
                                    id="tec_daily_check_cleaning_{{ $i }}" class="qc-input"
                                    style="width:100%;">
                            </td>

                            <td>
                                <input type="text" name="tec_daily[technician_signature][{{ $i }}]"
                                    id="tec_daily_technician_signature_{{ $i }}" class="qc-input"
                                    style="width:100%;">
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>

            <p>
                <strong>Note:</strong>
                Optimum temperature ranges:
                Cold plate -5 to -9°C;
                Hotplate 80 to 90°C;
                Wax bath 65 to 75°C
            </p>

        </form>
    </x-formTemplete>


    <x-formTemplete id="TDPL/BE/FOM-024" docNo="TDPL/BE/FOM-024" docName="Bact Alert Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('be.forms.submit') }}">

        {{-- 🔑 UNIQUE FORM ID (INLINE UPDATE SUPPORT) --}}
        <input type="hidden" name="ba_form_id" id="ba_form_id">

        @php
            // Define the fields for the maintenance log
            $fields = [
                'Clean Outer Cover',
                'Clean Monitor',
                'Check Temp (37°C)',
                'Check for Error 60 and calibrate cells flagged 60',
                'Signature of the Technician',
                'Signature of HOD',
            ];

            // Days in the month (1 to 31)
            $days = range(1, 31);
        @endphp

        {{-- ===================== TOP DETAILS ===================== --}}
        <div class="mb-4" style="display:flex; align-items:center; gap:16px; flex-wrap:wrap;">

            <label class="font-bold">Month &amp; Year:</label>
            <input type="month" name="ba_month_year" id="ba_month_year" class="qc-input" style="width:150px;"
                onchange="loadBactAlertForm()">

            <label class="font-bold">Instrument ID / S. No:</label>
            <input list="baEquipList" name="ba_instrument_id" id="ba_instrument_id" class="qc-input"
                style="width:180px;" placeholder="All" oninput="loadBactAlertForm()">

            <datalist id="baEquipList">
                <option value="BACT-001">
                <option value="BACT-002">
                <option value="BACT-003">
            </datalist>

        </div>


        {{-- ===================== DAILY MAINTENANCE TABLE ===================== --}}
        <table class="border-collapse border border-gray-400 w-full text-center">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 p-2">Date</th>
                    @foreach ($days as $day)
                        <th class="border border-gray-300 p-2">{{ $day }}</th>
                    @endforeach
                </tr>
            </thead>

            <tbody>
                @foreach ($fields as $field)
                    @php
                        $slug = Str::slug($field);
                    @endphp
                    <tr>
                        <td class="border border-gray-300 p-2 font-semibold text-left w-48" style="min-width:176px;">
                            {{ $field }}
                        </td>

                        @foreach ($days as $day)
                            <td class="border border-gray-300 p-1">

                                @if (str_contains(strtolower($field), 'signature'))
                                    <input type="text" name="ba_daily[{{ $slug }}][{{ $day }}]"
                                        id="ba_daily_{{ $slug }}_{{ $day }}"
                                        class="border rounded w-full p-1 qc-input" placeholder="Sign">
                                @elseif(str_contains(strtolower($field), 'check temp'))
                                    <input type="number" step="0.1"
                                        name="ba_daily[{{ $slug }}][{{ $day }}]"
                                        id="ba_daily_{{ $slug }}_{{ $day }}"
                                        class="border rounded w-full p-1 qc-input" placeholder="°C">
                                @else
                                    <input type="text" name="ba_daily[{{ $slug }}][{{ $day }}]"
                                        id="ba_daily_{{ $slug }}_{{ $day }}"
                                        class="border rounded w-full p-1 qc-input">
                                @endif

                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete id="TDPL/BE/FOM-025" docNo="TDPL/BE/FOM-025" docName="Vitek 2 Maintenance Form" issueNo="2.0"
        issueDate="01/10/2024" buttonText="Submit" action="{{ route('be.forms.submit') }}">

        {{-- 🔑 INLINE EDIT SUPPORT --}}
        <input type="hidden" name="vitek_form_id" id="vitek_form_id">

        @php
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

            $days = range(1, 31);

            function fieldSlug($field)
            {
                return \Illuminate\Support\Str::slug($field, '_');
            }
        @endphp

        <div class="mb-4">

            <label class="font-bold" style="margin-right:8px;">
                Month &amp; Year:
            </label>

            <input type="month" name="vitek_month_year" id="vitek_month_year" class="border p-1 rounded qc-input"
                style="width:180px;" onchange="loadVitekForm()">

            &nbsp;&nbsp;&nbsp;&nbsp;

            <label class="font-bold" style="margin-right:8px;">
                Instrument ID / S. No:
            </label>

            <input list="vitekInstrumentList" name="vitek_instrument_id" id="vitek_instrument_id"
                class="border p-1 rounded qc-input" style="width:180px;" placeholder="All"
                onchange="loadVitekForm()">

            <datalist id="vitekInstrumentList">
                <option value="VITEK2-001">
                <option value="VITEK2-002">
                <option value="VITEK2-003">
            </datalist>

        </div>



        {{-- DAILY --}}
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
                    @php $slug = fieldSlug($field); @endphp
                    <tr>
                        <td class="border border-gray-300 p-2 font-semibold text-left">{{ $field }}</td>
                        @foreach ($days as $day)
                            <td class="border border-gray-300 p-1">
                                <input type="{{ str_contains(strtolower($field), 'temperature') ? 'number' : 'text' }}"
                                    step="0.1" name="vitek_daily[{{ $slug }}][{{ $day }}]"
                                    id="vitek_daily_{{ $slug }}_{{ $day }}"
                                    class="border rounded w-full p-1 qc-input"
                                    placeholder="{{ str_contains(strtolower($field), 'signature') ? 'Sign' : '' }}">
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- MONTHLY --}}
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
                    @php $slug = fieldSlug($field); @endphp
                    <tr>
                        <td class="border border-gray-300 p-2 font-semibold text-left">{{ $field }}</td>
                        @foreach ($days as $day)
                            <td class="border border-gray-300 p-1">
                                <input type="text" name="vitek_monthly[{{ $slug }}][{{ $day }}]"
                                    id="vitek_monthly_{{ $slug }}_{{ $day }}"
                                    class="border rounded w-full p-1 qc-input"
                                    placeholder="{{ str_contains(strtolower($field), 'signature') ? 'Sign' : '' }}">
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete id="TDPL/BE/FOM-026" docNo="TDPL/BE/FOM-026" docName="Elisa Reader Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('be.forms.submit') }}">

        {{-- 🔑 UNIQUE FORM ID (INLINE UPDATE SUPPORT) --}}
        <input type="hidden" name="elisa_form_id" id="elisa_form_id">

        {{-- ===================== TOP DETAILS ===================== --}}
        <div class="mb-4" style="display:flex; align-items:center; gap:16px; flex-wrap:wrap;">
            <label class="font-bold">MONTH &amp; YEAR:</label>
            <input type="month" name="elisa_month_year" id="elisa_month_year" class="qc-input"
                style="width:150px;" onchange="loadElisaForm()">
            <label class="font-bold">INSTRUMENT ID / S. No:</label>
            <input list="elisaEquipList" name="elisa_instrument_id" id="elisa_instrument_id" class="qc-input"
                style="width:180px;" placeholder="All" oninput="loadElisaForm()">

            <datalist id="elisaEquipList">
                <option value="ELISA-001">
                <option value="ELISA-002">
                <option value="ELISA-003">
            </datalist>

        </div>

        <p class="mb-2">
            Put a tick mark (✓) against each maintenance activity after performance
        </p>

        {{-- ===================== DAILY MAINTENANCE TABLE ===================== --}}
        <table class="border-collapse border border-gray-400 w-full text-center">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 p-2">DATE 🡺</th>
                    @for ($day = 1; $day <= 31; $day++)
                        <th class="border border-gray-300 p-2">{{ $day }}</th>
                    @endfor
                </tr>
            </thead>

            <tbody>
                @php
                    $fields = [
                        'Is the power source secure',
                        'Is the power cord safe',
                        'Is the power plug tightly inserted',
                        'Is the outside of the system free from contamination',
                        'Is the microplate absorbance system clean',
                        'Signature of Operator',
                    ];
                @endphp

                @foreach ($fields as $field)
                    @php
                        $slug = \Illuminate\Support\Str::slug($field);
                    @endphp
                    <tr>
                        <td class="border border-gray-300 p-2 font-semibold text-left">
                            {{ $field }}
                        </td>

                        @for ($day = 1; $day <= 31; $day++)
                            <td class="border border-gray-300 p-1">

                                @if (str_contains(strtolower($field), 'signature'))
                                    <input type="text"
                                        name="elisa_daily[{{ $slug }}][{{ $day }}]"
                                        id="elisa_daily_{{ $slug }}_{{ $day }}" class="qc-input"
                                        style="width:100%;" placeholder="Sign">
                                @else
                                    <input type="checkbox" class="qc-input"
                                        name="elisa_daily[{{ $slug }}][{{ $day }}]"
                                        id="elisa_daily_{{ $slug }}_{{ $day }}" value="1">
                                @endif

                            </td>
                        @endfor
                    </tr>
                @endforeach
            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete id="TDPL/BE/FOM-028" docNo="TDPL/BE/FOM-028" docName="Real Time PCR Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('be.forms.submit') }}">

        {{-- 🔑 UNIQUE FORM ID (INLINE UPDATE SUPPORT) --}}
        <input type="hidden" name="rtpcr_form_id" id="rtpcr_form_id">

        {{-- ===================== TOP DETAILS ===================== --}}
        <div class="mb-4" style="display:flex; align-items:center; gap:16px; flex-wrap:wrap;">
            <label class="font-bold">MONTH &amp; YEAR:</label>
            <input type="month" name="rtpcr_month_year" id="rtpcr_month_year" class="qc-input"
                style="width:150px;" onchange="loadRtpcrForm()">

            <label class="font-bold">INSTRUMENT ID / S. No:</label>
            <input list="rtpcrEquipList" name="rtpcr_instrument_id" id="rtpcr_instrument_id" class="qc-input"
                style="width:180px;" placeholder="All" oninput="loadRtpcrForm()">

            <datalist id="rtpcrEquipList">
                <option value="RTPCR-001">
                <option value="RTPCR-002">
                <option value="RTPCR-003">
            </datalist>

        </div>

        <p class="mb-2">
            Put a tick mark (✓) against each maintenance activity after performance
        </p>

        {{-- ===================== DAILY MAINTENANCE TABLE ===================== --}}
        <table class="border-collapse border border-gray-400 w-full text-center">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 p-2">DATE 🡺</th>
                    @for ($day = 1; $day <= 31; $day++)
                        <th class="border border-gray-300 p-2">{{ $day }}</th>
                    @endfor
                </tr>
            </thead>

            <tbody>
                @php
                    $fields = [
                        'Sample stand Cleaning',
                        'Rotor Cleaning',
                        'Power cord attached',
                        'Laptop screen cleaning',
                        'Check Cord of laptop',
                        'Check Fuse',
                        'Signature',
                    ];
                @endphp

                @foreach ($fields as $field)
                    @php
                        $slug = \Illuminate\Support\Str::slug($field);
                    @endphp
                    <tr>
                        <td class="border border-gray-300 p-2 font-semibold text-left">
                            {{ $field }}
                        </td>

                        @for ($day = 1; $day <= 31; $day++)
                            <td class="border border-gray-300 p-1">

                                @if (str_contains(strtolower($field), 'signature'))
                                    <input type="text"
                                        name="rtpcr_daily[{{ $slug }}][{{ $day }}]"
                                        id="rtpcr_daily_{{ $slug }}_{{ $day }}" class="qc-input"
                                        style="width:100%;" placeholder="Sign">
                                @else
                                    <input type="checkbox" class="qc-input"
                                        name="rtpcr_daily[{{ $slug }}][{{ $day }}]"
                                        id="rtpcr_daily_{{ $slug }}_{{ $day }}" value="1">
                                @endif

                            </td>
                        @endfor
                    </tr>
                @endforeach
            </tbody>
        </table>

    </x-formTemplete>


    <x-formTemplete id="TDPL/BE/FOM-029" docNo="TDPL/BE/FOM-029" docName="Cooling Centrifuge Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('be.forms.submit') }}">

        {{-- 🔑 UNIQUE FORM ID (INLINE UPDATE SUPPORT) --}}
        <input type="hidden" name="cc_form_id" id="cc_form_id">

        <div style="display:flex; align-items:center; gap:14px; flex-wrap:wrap; margin-bottom:10px;">

            <strong>Month/Year:</strong>
            <input type="month" name="cc_month_year" id="cc_month_year" class="border p-1 rounded qc-input"
                style="width:150px;" onchange="loadCcForm()">

            <strong>Department:</strong>
            <input list="ccDepartmentList" name="cc_department" id="cc_department"
                class="border p-1 rounded qc-input" style="width:160px;" placeholder="All" oninput="loadCcForm()">

            <datalist id="ccDepartmentList">
                <option value="Hematology">
                <option value="Biochemistry">
                <option value="Microbiology">
                <option value="Pathology">
            </datalist>

            <strong>Instrument ID/S. No.:</strong>
            <input list="ccEquipList" name="cc_instrument_id" id="cc_instrument_id"
                class="border p-1 rounded qc-input" style="width:180px;" placeholder="All" oninput="loadCcForm()">

            <datalist id="ccEquipList">
                <option value="CC-001">
                <option value="CC-002">
                <option value="CC-003">
            </datalist>

        </div>


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
                    @php
                        $slug = \Illuminate\Support\Str::slug($item);
                    @endphp
                    <tr>
                        <td class="border border-gray-400 font-semibold">{{ $item }}</td>

                        @for ($day = 1; $day <= 31; $day++)
                            <td class="border border-gray-400 p-1">

                                @if ($item === 'Signature')
                                    <input type="text" name="cc_daily[{{ $slug }}][{{ $day }}]"
                                        id="cc_daily_{{ $slug }}_{{ $day }}"
                                        class="w-full border p-1 rounded qc-input" placeholder="Sign">
                                @else
                                    <input type="checkbox" name="cc_daily[{{ $slug }}][{{ $day }}]"
                                        id="cc_daily_{{ $slug }}_{{ $day }}" value="1"
                                        class="qc-input mx-auto">
                                @endif

                            </td>
                        @endfor
                    </tr>
                @endforeach

                {{-- ===================== MONTHLY MAINTENANCE ===================== --}}
                <tr>
                    <td colspan="32" class="border border-gray-400 font-semibold text-left p-2">
                        Monthly Maintenance
                    </td>
                </tr>

                <tr>
                    <td class="border border-gray-400 font-semibold">
                        Bushes Checked
                    </td>

                    <td colspan="6" class="border border-gray-400">
                        <input type="text" name="cc_monthly[bushes_checked_notes]"
                            id="cc_monthly_bushes_checked_notes" class="w-full border p-1 rounded qc-input">
                    </td>

                    <td colspan="14" class="border border-gray-400">
                        <strong>Date:</strong>
                        <input type="date" name="cc_monthly[bushes_checked_date]"
                            id="cc_monthly_bushes_checked_date" class="border p-1 rounded qc-input">
                    </td>

                    <td colspan="11" class="border border-gray-400">
                        <strong>Next Due Date:</strong>
                        <input type="date" name="cc_monthly[bushes_next_due]" id="cc_monthly_bushes_next_due"
                            class="border p-1 rounded qc-input">
                    </td>
                </tr>

                <tr>
                    <td class="border border-gray-400 font-semibold">
                        Signature
                    </td>
                    <td colspan="31" class="border border-gray-400">
                        <input type="text" name="cc_monthly[signature]" id="cc_monthly_signature"
                            class="w-full border p-1 rounded qc-input">
                    </td>
                </tr>

            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete id="TDPL/BE/FOM-034" docNo="TDPL/BE/FOM-034" docName="Microscope Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('be.forms.submit') }}">

        {{-- 🔑 UNIQUE FORM ID (INLINE UPDATE SUPPORT) --}}
        <input type="hidden" name="mic_form_id" id="mic_form_id">

        <p style="display:flex; align-items:center; gap:14px; flex-wrap:wrap;">

            <strong>Month & Year:</strong>
            <input type="month" name="mic_month_year" id="mic_month_year" class="border p-1 rounded qc-input"
                style="width:150px;" onchange="loadMicForm()">

            <strong>Instrument ID/S. No.:</strong>
            <input list="micEquipList" name="mic_instrument_id" id="mic_instrument_id"
                class="border p-1 rounded qc-input" style="width:180px;" placeholder="All" oninput="loadMicForm()">

            <datalist id="micEquipList">
                <option value="MIC-001">
                <option value="MIC-002">
                <option value="MIC-003">
            </datalist>

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
                @php
                    $items = [
                        'Cleaning outside & inside',
                        'Check mechanical stage',
                        'Check fine & adjustment',
                        'Cleaning of lens',
                        'Check light source',
                        'Check plug cord',
                        'Lab Staff Signature',
                        'Lab Supervisor Signature',
                    ];
                @endphp

                @foreach ($items as $item)
                    @php
                        $slug = \Illuminate\Support\Str::slug($item);
                    @endphp
                    <tr>
                        <td class="border border-gray-400 font-semibold">{{ $item }}</td>

                        @for ($day = 1; $day <= 31; $day++)
                            <td class="border border-gray-400 p-1">

                                @if (str_contains($item, 'Signature'))
                                    <input type="text" name="mic_daily[{{ $slug }}][{{ $day }}]"
                                        id="mic_daily_{{ $slug }}_{{ $day }}"
                                        class="w-full border p-1 rounded qc-input" placeholder="Sign">
                                @else
                                    <input type="checkbox"
                                        name="mic_daily[{{ $slug }}][{{ $day }}]"
                                        id="mic_daily_{{ $slug }}_{{ $day }}" value="1"
                                        class="qc-input mx-auto">
                                @endif

                            </td>
                        @endfor
                    </tr>
                @endforeach
            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete id="TDPL/BE/FOM-035" docNo="TDPL/BE/FOM-035" docName="Laura M Maintenance Form" issueNo="2.0"
        issueDate="01/10/2024" buttonText="Submit" action="{{ route('be.forms.submit') }}">

        {{-- 🔑 UNIQUE FORM ID (INLINE UPDATE SUPPORT) --}}
        <input type="hidden" name="lauram_form_id" id="lauram_form_id">

        <div style="display:flex; align-items:center; gap:12px; flex-wrap:wrap; margin-bottom:10px;">

            <strong>Month & Year:</strong>
            <input type="month" name="lauram_month_year" id="lauram_month_year"
                class="border p-1 rounded qc-input" style="width:150px;" onchange="loadLauramForm()">

            <strong>Instrument ID/S. No.:</strong>
            <input list="lauramEquipList" name="lauram_instrument_id" id="lauram_instrument_id"
                class="border p-1 rounded qc-input" style="width:180px;" placeholder="All"
                oninput="loadLauramForm()">

            <datalist id="lauramEquipList">
                <option value="LAURAM-001">
                <option value="LAURAM-002">
                <option value="LAURAM-003">
            </datalist>

        </div>

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
            'Cleaning procedure of Plastic Feeder' => ['1. Rinse the feeder with water and wipe it with wet cloth', '2. Dry the plastic feeder, and insert into analyzer (Correct position)'],
            'Cleaning procedure of Waste Container' => ['1. Remove the waste container with used strips from the analyzer.', '2. Empty the container and rinse it with water', '3. Wipe with a dry cloth.', '4. Insert the waste container back and ensure it is positioned correctly'],
        ] as $section => $steps)
                    @php $sectionSlug = Str::slug($section); @endphp

                    <tr>
                        <td class="border border-gray-400 font-semibold text-left" style="min-width:250px;">
                            {{ $section }}
                        </td>
                        <td colspan="31" class="border border-gray-400">&nbsp;</td>
                    </tr>

                    @foreach ($steps as $step)
                        @php $stepSlug = Str::slug($step); @endphp
                        <tr>
                            <td class="border border-gray-400 text-left" style="min-width:250px;">
                                {{ $step }}
                            </td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td class="border border-gray-400 p-1">
                                    <input type="checkbox"
                                        name="lauram_daily[{{ $sectionSlug }}][{{ $stepSlug }}][{{ $day }}]"
                                        id="lauram_daily_{{ $sectionSlug }}_{{ $stepSlug }}_{{ $day }}"
                                        value="1" class="qc-input mx-auto">
                                </td>
                            @endfor
                        </tr>
                    @endforeach
                @endforeach

                {{-- SIGNATURES --}}
                @foreach (['Technician Signature', 'Supervisor Signature'] as $signature)
                    @php $sigSlug = Str::slug($signature); @endphp
                    <tr>
                        <td class="border border-gray-400 font-semibold text-left" style="min-width:250px;">
                            {{ $signature }}
                        </td>
                        @for ($day = 1; $day <= 31; $day++)
                            <td class="border border-gray-400 p-1">
                                <input type="text" name="lauram_daily[{{ $sigSlug }}][{{ $day }}]"
                                    id="lauram_daily_{{ $sigSlug }}_{{ $day }}"
                                    class="w-full border p-1 rounded qc-input" placeholder="Sign">
                            </td>
                        @endfor
                    </tr>
                @endforeach

            </tbody>
        </table>

    </x-formTemplete>


    <x-formTemplete id="TDPL/BE/FOM-036" docNo="TDPL/BE/FOM-036" docName="Microtome Maintenance Form" issueNo="2.0"
        issueDate="01/10/2024" buttonText="Submit" action="{{ route('be.forms.submit') }}">

        {{-- 🔑 UNIQUE FORM ID (INLINE UPDATE SUPPORT) --}}
        <input type="hidden" name="microtome_form_id" id="microtome_form_id">

        <div style="display:flex; align-items:center; gap:16px; flex-wrap:wrap;">

            <label style="font-weight:bold;">Month &amp; Year:</label>
            <input type="month" name="microtome_month_year" id="microtome_month_year"
                class="border p-1 rounded qc-input" style="width:150px;" onchange="loadMicrotomeForm()">

            <label style="font-weight:bold;">Instrument ID/S. No.:</label>
            <input list="microtomeEquipList" name="microtome_instrument_id" id="microtome_instrument_id"
                class="border p-1 rounded qc-input" style="width:180px;" placeholder="All"
                oninput="loadMicrotomeForm()">

            <datalist id="microtomeEquipList">
                <option value="MICROTOME-001">
                <option value="MICROTOME-002">
                <option value="MICROTOME-003">
            </datalist>

        </div>

        <table class="border-collapse border border-gray-400 w-full text-center">
            <thead>
                <tr>
                    <th class="border border-gray-400 p-4">Date</th>
                    <th class="border border-gray-400 p-4">Blade Change</th>
                    <th class="border border-gray-400 p-4">Lubrication</th>
                    <th class="border border-gray-400 p-4">Clean Knife Holder</th>
                    <th class="border border-gray-400 p-4">
                        Remove Accumulated Paraffin / Tissue & Clean Material Parts
                    </th>
                    <th class="border border-gray-400 p-4">Technician Signature</th>
                </tr>
            </thead>

            <tbody>
                @for ($day = 1; $day <= 31; $day++)
                    <tr>
                        <td class="border border-gray-400 font-semibold">
                            {{ str_pad($day, 2, '0', STR_PAD_LEFT) }}
                        </td>

                        <td class="border border-gray-400 p-1">
                            <input type="checkbox" name="microtome_daily[blade_change][{{ $day }}]"
                                id="microtome_daily_blade_change_{{ $day }}" value="1"
                                class="qc-input">
                        </td>

                        <td class="border border-gray-400 p-1">
                            <input type="checkbox" name="microtome_daily[lubrication][{{ $day }}]"
                                id="microtome_daily_lubrication_{{ $day }}" value="1"
                                class="qc-input">
                        </td>

                        <td class="border border-gray-400 p-1">
                            <input type="checkbox" name="microtome_daily[clean_knife][{{ $day }}]"
                                id="microtome_daily_clean_knife_{{ $day }}" value="1"
                                class="qc-input">
                        </td>

                        <td class="border border-gray-400 p-1">
                            <input type="checkbox" name="microtome_daily[remove_paraffin][{{ $day }}]"
                                id="microtome_daily_remove_paraffin_{{ $day }}" value="1"
                                class="qc-input">
                        </td>

                        <td class="border border-gray-400 p-1">
                            <input type="text" name="microtome_daily[technician_signature][{{ $day }}]"
                                id="microtome_daily_technician_signature_{{ $day }}"
                                class="w-full border p-1 rounded qc-input" placeholder="Sign">
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>

    </x-formTemplete>


    <x-formTemplete id="TDPL/BE/FOM-037" docNo="TDPL/BE/FOM-037" docName="Flotation Bath Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('be.forms.submit') }}">

        {{-- 🔑 UNIQUE FORM ID (INLINE UPDATE SUPPORT) --}}
        <input type="hidden" name="fb_form_id" id="fb_form_id">
        <p style="display:flex; align-items:center; gap:12px; flex-wrap:wrap;">

            <strong>Month &amp; Year:</strong>
            <input type="month" name="fb_month_year" id="fb_month_year" class="border p-1 rounded qc-input"
                style="width:150px;" onchange="loadFbForm()">

            <strong>Instrument ID/S. No.:</strong>
            <input list="fbEquipList" name="fb_instrument_id" id="fb_instrument_id"
                class="border p-1 rounded qc-input" style="width:180px;" placeholder="All" oninput="loadFbForm()">

            <datalist id="fbEquipList">
                <option value="FB-001">
                <option value="FB-002">
                <option value="FB-003">
            </datalist>

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
                @for ($day = 1; $day <= 31; $day++)
                    <tr>
                        <td class="border border-gray-400 font-semibold">
                            {{ str_pad($day, 2, '0', STR_PAD_LEFT) }}
                        </td>

                        <td class="border border-gray-400 p-1">
                            <input type="checkbox" name="fb_daily[clean_exterior][{{ $day }}]"
                                id="fb_daily_clean_exterior_{{ $day }}" value="1" class="qc-input">
                        </td>

                        <td class="border border-gray-400 p-1">
                            <input type="number" name="fb_daily[temp_morning][{{ $day }}]"
                                id="fb_daily_temp_morning_{{ $day }}"
                                class="w-full border p-1 rounded qc-input" placeholder="°C">
                        </td>

                        <td class="border border-gray-400 p-1">
                            <input type="checkbox" name="fb_daily[water_changed][{{ $day }}]"
                                id="fb_daily_water_changed_{{ $day }}" value="1" class="qc-input">
                        </td>

                        <td class="border border-gray-400 p-1">
                            <input type="text" name="fb_daily[signature_morning][{{ $day }}]"
                                id="fb_daily_signature_morning_{{ $day }}"
                                class="w-full border p-1 rounded qc-input" placeholder="Sign">
                        </td>

                        <td class="border border-gray-400 p-1">
                            <input type="number" name="fb_daily[temp_evening][{{ $day }}]"
                                id="fb_daily_temp_evening_{{ $day }}"
                                class="w-full border p-1 rounded qc-input" placeholder="°C">
                        </td>

                        <td class="border border-gray-400 p-1">
                            <input type="text" name="fb_daily[signature_evening][{{ $day }}]"
                                id="fb_daily_signature_evening_{{ $day }}"
                                class="w-full border p-1 rounded qc-input" placeholder="Sign">
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>

    </x-formTemplete>


    <x-formTemplete id="TDPL/BE/FOM-038" docNo="TDPL/BE/FOM-038" docName="Grossing Station Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('be.forms.submit') }}">

        {{-- 🔑 UNIQUE FORM ID (INLINE UPDATE SUPPORT) --}}
        <input type="hidden" name="gs_form_id" id="gs_form_id">

        <div class="p-4">

            {{-- ⚠️ DO NOT REMOVE – FORM WRAPPER KEPT AS IS --}}
            <form method="POST">
                @csrf

                <p style="display:flex; align-items:center; gap:12px; flex-wrap:wrap;">

                    <strong>Month &amp; Year:</strong>
                    <input type="month" name="gs_month_year" id="gs_month_year"
                        class="border p-1 rounded qc-input" style="width:150px;" onchange="loadGsForm()">

                    <strong>Instrument ID/S. No.:</strong>
                    <input list="gsEquipList" name="gs_instrument_id" id="gs_instrument_id"
                        class="border p-1 rounded qc-input" style="width:180px;" placeholder="All"
                        oninput="loadGsForm()">

                    <datalist id="gsEquipList">
                        <option value="GS-001">
                        <option value="GS-002">
                        <option value="GS-003">
                    </datalist>

                </p>


                <h2 class="text-xl font-bold" style="margin: 20px 0;">
                    Daily Maintenance
                </h2>

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
                                <td class="border px-2 py-1 font-semibold">
                                    {{ $day }}
                                </td>

                                @foreach (['clean', 'filters', 'power_cord', 'airflow', 'uv_lamp', 'fuse', 'technician'] as $field)
                                    <td class="border px-2 py-1">
                                        <input type="text"
                                            name="gs_daily[{{ $field }}][{{ $day }}]"
                                            id="gs_daily_{{ $field }}_{{ $day }}"
                                            class="border rounded px-1 py-1 w-full qc-input">
                                    </td>
                                @endforeach
                            </tr>
                        @endfor
                    </tbody>
                </table>

            </form>
        </div>

    </x-formTemplete>


    <x-formTemplete id="TDPL/BE/REG-001" docNo="TDPL/BE/REG-001" docName="Equipment Breakdown Maintenance Register"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('be.forms.submit') }}">

        {{-- 🔑 INLINE EDIT SUPPORT --}}
        <input type="hidden" name="eb_form_id" id="eb_form_id">

        <div class="p-4">
            @csrf

            {{-- 🔹 FILTERS --}}
            <div class="flex gap-6 mb-4 items-end">

                <span>
                    <label class="block font-semibold">From Date:</label>
                    <input type="date" id="eb_from_date" class="border rounded px-2 py-1 w-44"
                        onchange="loadEquipmentBreakdownRegister()">
                </span>

                <span>
                    <label class="block font-semibold">To Date:</label>
                    <input type="date" id="eb_to_date" class="border rounded px-2 py-1 w-44"
                        onchange="loadEquipmentBreakdownRegister()">
                </span>



                <span>
                    <label class="block font-semibold">Location:</label>

                    <input list="ebLocationList" id="eb_location" name="eb_location"
                        class="border rounded px-2 py-1 w-60" placeholder="All"
                        oninput="handleDatalistInput(this,'ebLocationList',loadEquipmentBreakdownRegister)">

                    <datalist id="ebLocationList">
                        <option value="Hyderabad">
                        <option value="Bangalore">
                        <option value="Chennai">
                        <option value="Mumbai">
                        <option value="Delhi">
                    </datalist>
                </span>

            </div>

            {{-- 🔹 REGISTER TABLE --}}
            <table id="equipmentBreakdownTable"
                class="table-auto border-collapse border border-gray-300 w-full text-center">

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

                {{-- ✅ IMPORTANT --}}
                <tbody id="equipmentBreakdownBody">

                    {{-- ✅ INITIAL EMPTY ROW (NEW ENTRY) --}}
                    <tr>
                        <td class="border px-2 py-1">
                            <input type="date" name="eb_date" class="border rounded px-1 py-1 w-full">
                        </td>
                        <td class="border px-2 py-1">
                            <input type="text" name="eb_equipment" class="border rounded px-1 py-1 w-full">
                        </td>
                        <td class="border px-2 py-1">
                            <input type="text" name="eb_problem" class="border rounded px-1 py-1 w-full">
                        </td>
                        <td class="border px-2 py-1">
                            <input type="text" name="eb_breakdown_time" class="border rounded px-1 py-1 w-full">
                        </td>
                        <td class="border px-2 py-1">
                            <input type="text" name="eb_action_taken" class="border rounded px-1 py-1 w-full">
                        </td>
                        <td class="border px-2 py-1">
                            <input type="text" name="eb_engineer_name" class="border rounded px-1 py-1 w-full">
                        </td>
                        <td class="border px-2 py-1">
                            <input type="text" name="eb_total_downtime" class="border rounded px-1 py-1 w-full">
                        </td>
                        <td class="border px-2 py-1">
                            <input type="text" name="eb_remarks" class="border rounded px-1 py-1 w-full">
                        </td>
                        <td class="border px-2 py-1">
                            <input type="text" name="eb_signature" class="border rounded px-1 py-1 w-full">
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </x-formTemplete>


    {{-- </body> --}}
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




    function loadHotPlateQc() {
        const monthYear = document.getElementById('month_year').value;
        const instrument = document.getElementById('instrument_serial_no').value;
        if (!monthYear) return;
        fetch(`/be/hot-plate-qc/load?month_year=${monthYear}&instrument_serial_no=${instrument}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
            .then(res => res.json())
            .then(res => {

                clearQcTable();

                if (!res.data) {
                    document.getElementById('form_id').value = '';
                    return;
                }

                // ✅ SET FORM ID
                document.getElementById('form_id').value = res.data.id;

                fillRow('cleaning_outside', res.data.cleaning_outside);
                fillRow('temperature_check', res.data.temperature_check);
                fillRow('lab_staff_signature', res.data.lab_staff_signature);
                fillRow('lab_supervisor_signature', res.data.lab_supervisor_signature);
            });
    }


    function clearQcTable() {
        document.querySelectorAll('.qc-input').forEach(i => {
            if (i.id !== 'month_year' && i.id !== 'instrument_serial_no') {
                i.value = '';
            }
        });
    }




    function handleFormSubmit(event, form) {

        // Inline form → AJAX
        if (form.hasAttribute('data-inline')) {

            event.preventDefault();

            fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document
                            .querySelector('meta[name="csrf-token"]')
                            .content
                    },
                    body: new FormData(form)
                })
                .then(res => res.json())
                .then(res => {
                    if (res.success) {
                        console.log('Inline form saved');
                    } else {
                        console.error('Save failed', res);
                    }
                })
                .catch(err => {
                    console.error('Network error', err);
                });

            return false; // ❌ stop normal submit
        }

        // Normal form → allow submit
        return true;
    }


    // document.addEventListener('keydown', function(e) {

    //     if (
    //         e.target.classList.contains('hotplate-input') &&
    //         e.key === 'Enter'
    //     ) {
    //         e.preventDefault(); // 🚫 stop submit
    //         e.target.blur(); // trigger change event
    //         return false;
    //     }

    // });



    // /* ===============================
    //    INLINE SAVE (CHANGE EVENT)
    // ================================ */
    // document.addEventListener('blur', function(e) {

    //     if (!e.target.classList.contains('hotplate-input')) return;
    //     if (!window.currentHotPlateFormId) return;

    //     const id = e.target.id;
    //     if (!id.includes('_')) return;

    //     const parts = id.split('_');
    //     const day = parts.pop();
    //     const row = parts.join('_');

    //     fetch("{{ route('be.forms.inline') }}", {
    //         method: 'POST',
    //         headers: {
    //             'Content-Type': 'application/json',
    //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    //         },
    //         body: JSON.stringify({
    //             inline: true,
    //             form_id: window.currentHotPlateFormId,
    //             row,
    //             day,
    //             value: e.target.value
    //         })
    //     });

    // }, true); // 👈 capture phase

    function loadBscForm() {
        const monthYear = document.getElementById('bsc_month_year').value;
        const department = document.getElementById('bsc_department').value;
        const equipment = document.getElementById('bsc_equipment_id').value;

        if (!monthYear) return;

        fetch(`/be/bsc/load?bsc_month_year=${monthYear}&bsc_department=${department}&bsc_equipment_id=${equipment}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
            .then(res => res.json())
            .then(res => {

                clearBscTable(); // 🔑 separate clear for BSC

                if (!res.data) {
                    document.getElementById('bsc_form_id').value = '';
                    return;
                }

                document.getElementById('bsc_form_id').value = res.data.id;

                fillRow('bsc_clean_ipa', res.data.bsc_clean_ipa);
                fillRow('bsc_uv_light', res.data.bsc_uv_light);
                fillRow('bsc_manometer', res.data.bsc_manometer);
                fillRow('bsc_done_by', res.data.bsc_done_by);
                fillRow('bsc_hypo_available', res.data.bsc_hypo_available);

                fillRow('bsc_settle_plate_date', res.data.bsc_settle_plate_date);
                fillRow('bsc_settle_cfu', res.data.bsc_settle_cfu);
                fillRow('bsc_uv_efficacy', res.data.bsc_uv_efficacy);
                fillRow('bsc_checked_by', res.data.bsc_checked_by);
                fillRow('bsc_remarks', res.data.bsc_remarks);

                fillCheckboxRow('bsc_settle_yes', res.data.bsc_settle_yes);
                fillCheckboxRow('bsc_settle_no', res.data.bsc_settle_no);
            });
    }

    function clearBscTable() {
        document.querySelectorAll('.qc-input').forEach(i => {
            if (
                i.id !== 'bsc_month_year' &&
                i.id !== 'bsc_department' &&
                i.id !== 'bsc_equipment_id'
            ) {
                i.value = '';
            }
        });

        document.querySelectorAll('input[type="checkbox"]').forEach(cb => {
            cb.checked = false;
        });
    }


    function loadHotAirOven() {

        const month = document.getElementById('hao_month_year').value;
        const inst = document.getElementById('hao_instrument_id').value;

        if (!month) return;

        fetch(`/be/hot-air-oven/load?hao_month_year=${month}&hao_instrument_id=${inst}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(r => r.json())
            .then(res => {

                clearHaoTable();

                if (!res.data) {
                    // 🟢 No record yet → NEW FORM MODE
                    document.getElementById('hao_form_id').value = '';
                    return;
                }

                // 🟢 Existing record → EDIT MODE
                document.getElementById('hao_form_id').value = res.data.id;

                fillRow('hao_morning_temp', res.data.hao_morning_temp);
                fillRow('hao_morning_sign', res.data.hao_morning_sign);
                fillRow('hao_evening_temp', res.data.hao_evening_temp);
                fillRow('hao_evening_sign', res.data.hao_evening_sign);
            });
    }

    function clearHaoTable() {
        document.querySelectorAll('.tlog-input').forEach(i => {
            if (i.id !== 'hao_month_year' && i.id !== 'hao_instrument_id') {
                i.value = '';
            }
        });
    }

    function loadIncubator() {
        const month = document.getElementById('inc_month_year').value;
        const inst = document.getElementById('inc_instrument_id').value;

        if (!month) return;

        fetch(`/be/incubator/load?inc_month_year=${month}&inc_instrument_id=${inst}`)
            .then(res => res.json())
            .then(res => {

                clearIncTable();

                if (!res.data) {
                    document.getElementById('inc_form_id').value = '';
                    return;
                }

                document.getElementById('inc_form_id').value = res.data.id;

                fillRow('inc_morning_temp', res.data.inc_morning_temp);
                fillRow('inc_morning_sign', res.data.inc_morning_sign);
                fillRow('inc_evening_temp', res.data.inc_evening_temp);
                fillRow('inc_evening_sign', res.data.inc_evening_sign);
            });
    }

    function clearIncTable() {

        // 🔹 Clear all incubator text inputs (except filters)
        document.querySelectorAll('.tlog-input').forEach(input => {
            if (
                input.id !== 'inc_month_year' &&
                input.id !== 'inc_instrument_id'
            ) {
                input.value = '';
            }
        });
    }

    function loadLafForm() {

        const monthYear = document.getElementById('laf_month_year').value;
        const department = document.getElementById('laf_department').value;
        const equipment = document.getElementById('laf_equipment_id').value;

        if (!monthYear) return;

        fetch(`/be/laf/load?laf_month_year=${monthYear}&laf_department=${department}&laf_equipment_id=${equipment}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
            .then(res => res.json())
            .then(res => {

                clearLafTable();

                if (!res.data) {
                    document.getElementById('laf_form_id').value = '';
                    return;
                }

                // ✅ SET FORM ID
                document.getElementById('laf_form_id').value = res.data.id;

                fillCheckboxRow('laf_clean_ipa', res.data.laf_clean_ipa);
                fillCheckboxRow('laf_uv_light', res.data.laf_uv_light);

                fillRow('laf_manometer', res.data.laf_manometer);
                fillRow('laf_done_by', res.data.laf_done_by);
                fillRow('laf_hypo_available', res.data.laf_hypo_available);
                fillRow('laf_settle_plate_date', res.data.laf_settle_plate_date);
                fillRow('laf_uv_efficacy', res.data.laf_uv_efficacy);
                fillRow('laf_checked_by', res.data.laf_checked_by);
                fillRow('laf_remarks', res.data.laf_remarks);

                fillRadioRow('laf_settle_result', res.data.laf_settle_result);
            });
    }

    function clearLafTable() {

        document.querySelectorAll('.input-box').forEach(i => {
            if (
                i.id !== 'laf_month_year' &&
                i.id !== 'laf_department' &&
                i.id !== 'laf_equipment_id'
            ) {
                i.value = '';
            }
        });

        document.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.checked = false);
        document.querySelectorAll('input[type="radio"]').forEach(r => r.checked = false);
    }


    function loadAutoclave() {

        const monthYear = document.getElementById('aut_month_year').value;
        const instrument = document.getElementById('aut_instrument_id').value;

        // ❗ very important – do not load without month
        if (!monthYear) return;

        fetch(`/be/autoclave/load?aut_month_year=${monthYear}&aut_instrument_id=${instrument}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
            .then(res => res.json())
            .then(res => {

                clearAutoclaveTable();

                if (!res.data) {
                    document.getElementById('aut_form_id').value = '';
                    return;
                }

                // ✅ SET FORM ID FOR INLINE + UPDATE
                document.getElementById('aut_form_id').value = res.data.id;

                // ✅ FILL DATA
                fillCheckboxRow('aut_clean_outside', res.data.aut_clean_outside);
                fillCheckboxRow('aut_chamber_water', res.data.aut_chamber_water);
                fillCheckboxRow('aut_clean_inside', res.data.aut_clean_inside);
                fillCheckboxRow('aut_power_check', res.data.aut_power_check);

                fillRow('aut_lab_staff_sign', res.data.aut_lab_staff_sign);
                fillRow('aut_lab_supervisor_sign', res.data.aut_lab_supervisor_sign);
            });
    }


    function clearAutoclaveTable() {

        document.querySelectorAll('.input-box').forEach(i => {
            if (
                i.id !== 'aut_month_year' &&
                i.id !== 'aut_instrument_id'
            ) {
                i.value = '';
            }
        });

        document.querySelectorAll('input[type="checkbox"]').forEach(cb => {
            cb.checked = false;
        });
    }

    function loadHaoMaintenance() {

        const monthYear = document.getElementById('hao_maint_month_year').value;
        const instrument = document.getElementById('hao_maint_instrument_id').value;

        // ❗ do not load without month
        if (!monthYear) return;

        fetch(`/be/hao-maintenance/load?hao_maint_month_year=${monthYear}&hao_maint_instrument_id=${instrument}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
            .then(res => res.json())
            .then(res => {

                clearHaoMaintenanceTable();

                if (!res.data) {
                    document.getElementById('hao_maint_form_id').value = '';
                    return;
                }

                // ✅ SET FORM ID
                document.getElementById('hao_maint_form_id').value = res.data.id;

                // ✅ FILL CHECKBOX DATA
                fillCheckboxRow('hao_maint_clean_outside', res.data.hao_maint_clean_outside);
                fillCheckboxRow('hao_maint_clean_inside', res.data.hao_maint_clean_inside);
                fillCheckboxRow('hao_maint_temperature_check', res.data.hao_maint_temperature_check);
                fillCheckboxRow('hao_maint_power_check', res.data.hao_maint_power_check);

                // ✅ FILL TEXT DATA
                fillRow('hao_maint_lab_staff_sign', res.data.hao_maint_lab_staff_sign);
                fillRow('hao_maint_lab_supervisor_sign', res.data.hao_maint_lab_supervisor_sign);
            });
    }

    function clearHaoMaintenanceTable() {

        // clear text inputs
        document.querySelectorAll('input[type="text"]').forEach(i => {
            if (
                i.id !== 'hao_maint_month_year' &&
                i.id !== 'hao_maint_instrument_id'
            ) {
                i.value = '';
            }
        });

        // clear checkboxes
        document.querySelectorAll('input[type="checkbox"]').forEach(cb => {
            cb.checked = false;
        });
    }


    function loadIncubatorMaintenance() {

        const monthYear = document.getElementById('inc_maint_month_year').value;
        const instrument = document.getElementById('inc_maint_instrument_id').value;

        // ❗ DO NOT LOAD WITHOUT MONTH
        if (!monthYear) return;

        fetch(`/be/incubator-maintenance/load?inc_maint_month_year=${monthYear}&inc_maint_instrument_id=${instrument}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
            .then(res => res.json())
            .then(res => {

                clearIncubatorMaintenanceTable();

                if (!res.data) {
                    document.getElementById('inc_maint_form_id').value = '';
                    return;
                }

                // ✅ SET FORM ID (VERY IMPORTANT)
                document.getElementById('inc_maint_form_id').value = res.data.id;

                // ✅ FILL DATA
                fillRow('inc_maint_clean_outside', res.data.inc_maint_clean_outside);
                fillRow('inc_maint_clean_inside', res.data.inc_maint_clean_inside);
                fillRow('inc_maint_temperature_check', res.data.inc_maint_temperature_check);
                fillRow('inc_maint_power_check', res.data.inc_maint_power_check);
                fillRow('inc_maint_lab_staff_sign', res.data.inc_maint_lab_staff_sign);
                fillRow('inc_maint_lab_supervisor_sign', res.data.inc_maint_lab_supervisor_sign);
            });
    }

    function clearIncubatorMaintenanceTable() {

        document.querySelectorAll('.qc-input').forEach(i => {
            if (
                i.id !== 'inc_maint_month_year' &&
                i.id !== 'inc_maint_instrument_id'
            ) {
                i.value = '';
            }
        });
    }

    function loadCentrifuge() {

        const monthYear = document.getElementById('cen_month_year').value;
        const instrument = document.getElementById('cen_instrument_id').value;

        // ❗ Do NOT load without month (same rule as others)
        if (!monthYear) return;

        fetch(`/be/centrifuge/load?cen_month_year=${monthYear}&cen_instrument_id=${instrument}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
            .then(res => res.json())
            .then(res => {

                clearCentrifugeTable();

                if (!res.data) {
                    document.getElementById('cen_form_id').value = '';
                    return;
                }

                // ✅ SET FORM ID (VERY IMPORTANT)
                document.getElementById('cen_form_id').value = res.data.id;

                // ===== DAILY =====
                fillRow('cen_clean_outside', res.data.cen_clean_outside);
                fillRow('cen_clean_inside', res.data.cen_clean_inside);
                fillRow('cen_power_check', res.data.cen_power_check);
                fillRow('cen_carbon_brush', res.data.cen_carbon_brush);
                fillRow('cen_lab_staff_sign', res.data.cen_lab_staff_sign);
                fillRow('cen_lab_supervisor_sign', res.data.cen_lab_supervisor_sign);

                // ===== WEEKLY =====
                document.querySelector('[name="cen_week1_date"]').value = res.data.cen_week1_date ?? '';
                document.querySelector('[name="cen_week2_date"]').value = res.data.cen_week2_date ?? '';
                document.querySelector('[name="cen_week3_date"]').value = res.data.cen_week3_date ?? '';
                document.querySelector('[name="cen_week4_date"]').value = res.data.cen_week4_date ?? '';

                document.querySelector('[name="cen_week1_staff"]').value = res.data.cen_week1_staff ?? '';
                document.querySelector('[name="cen_week2_staff"]').value = res.data.cen_week2_staff ?? '';
                document.querySelector('[name="cen_week3_staff"]').value = res.data.cen_week3_staff ?? '';
                document.querySelector('[name="cen_week4_staff"]').value = res.data.cen_week4_staff ?? '';

                document.querySelector('[name="cen_week1_supervisor"]').value = res.data.cen_week1_supervisor ?? '';
                document.querySelector('[name="cen_week2_supervisor"]').value = res.data.cen_week2_supervisor ?? '';
                document.querySelector('[name="cen_week3_supervisor"]').value = res.data.cen_week3_supervisor ?? '';
                document.querySelector('[name="cen_week4_supervisor"]').value = res.data.cen_week4_supervisor ?? '';
            });
    }

    function clearCentrifugeTable() {

        // clear daily inputs
        document.querySelectorAll('.qc-input').forEach(i => {
            if (
                i.id !== 'cen_month_year' &&
                i.id !== 'cen_instrument_id'
            ) {
                i.value = '';
            }
        });

        // clear weekly inputs
        document.querySelectorAll('[name^="cen_week"]').forEach(i => {
            i.value = '';
        });
    }

    function loadDxcForm() {

        const monthYear = document.getElementById('dxc_month_year').value;
        const location = document.getElementById('dxc_location').value;
        const department = document.getElementById('dxc_department').value;

        // ❗ month mandatory
        if (!monthYear) return;

        fetch(`/be/dxc/load?dxc_month_year=${monthYear}&dxc_location=${location}&dxc_department=${department}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
            .then(res => res.json())
            .then(res => {

                clearDxcTable(); // 🔑 always clear first

                if (!res.data) {
                    document.getElementById('dxc_form_id').value = '';
                    return;
                }

                // ✅ SET FORM ID (INLINE + UPDATE)
                document.getElementById('dxc_form_id').value = res.data.id;

                // ===== DAILY (JSON DAY → VALUE) =====
                fillRow('dxc_inspect_syringes', res.data.dxc_inspect_syringes);
                fillRow('dxc_inspect_roller_pump', res.data.dxc_inspect_roller_pump);
                fillRow('dxc_inspect_probes', res.data.dxc_inspect_probes);
                fillRow('dxc_replace_diluent', res.data.dxc_replace_diluent);
                fillRow('dxc_replace_probe_wash', res.data.dxc_replace_probe_wash);
                fillRow('dxc_clean_ise', res.data.dxc_clean_ise);
                fillRow('dxc_calibrate_ise', res.data.dxc_calibrate_ise);
                fillRow('dxc_performed_by', res.data.dxc_performed_by);
                fillRow('dxc_reviewed_by', res.data.dxc_reviewed_by);

                // ===== WEEKLY (ARRAY INDEX → WEEK NO) =====
                fillWeeklyRow('dxc_week_date', res.data.dxc_week_date);
                fillWeeklyRow('dxc_clean_probe_mix', res.data.dxc_clean_probe_mix);
                fillWeeklyRow('dxc_perform_w2', res.data.dxc_perform_w2);
                fillWeeklyRow('dxc_performed_supervisor', res.data.dxc_performed_supervisor);
            });
    }


    function clearDxcTable() {

        document.querySelectorAll('.qc-input, .qc-input-wide').forEach(el => {

            // ❌ DO NOT CLEAR FILTERS
            if (
                el.id === 'dxc_month_year' ||
                el.id === 'dxc_location' ||
                el.id === 'dxc_department'
            ) {
                return;
            }

            el.value = '';
        });
    }

    function loadDxiForm() {

        const monthYear = document.getElementById('dxi_month_year').value;
        const location = document.getElementById('dxi_location').value;
        const department = document.getElementById('dxi_department').value;

        // ❗ SAME RULE – DO NOT LOAD WITHOUT MONTH
        if (!monthYear) return;

        fetch(`/be/dxi800/load?dxi_month_year=${monthYear}&dxi_location=${location}&dxi_department=${department}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
            .then(res => res.json())
            .then(res => {

                clearDxiTable(); // 🔑 always clear first

                if (!res.data) {
                    document.getElementById('dxi_form_id').value = '';
                    return;
                }

                // ✅ SET FORM ID (INLINE UPDATE)
                document.getElementById('dxi_form_id').value = res.data.id;

                // ===== DAILY =====
                fillRow('dxi_system_backup', res.data.dxi_system_backup);
                fillRow('dxi_zone_temperature', res.data.dxi_zone_temperature);
                fillRow('dxi_system_supplies', res.data.dxi_system_supplies);
                fillRow('dxi_clean_probe', res.data.dxi_clean_probe);
                fillRow('dxi_solid_waste', res.data.dxi_solid_waste);
                fillRow('dxi_prime_substrate', res.data.dxi_prime_substrate);
                fillRow('dxi_daily_cleaning', res.data.dxi_daily_cleaning);
                fillRow('dxi_performed_by', res.data.dxi_performed_by);
                fillRow('dxi_reviewed_by', res.data.dxi_reviewed_by);

                fillWeeklyRow('dxi_week_date', res.data.dxi_week_date);

                fillWeeklyRow('dxi_clean_exterior', res.data.dxi_clean_exterior);
                fillWeeklyRow('dxi_clean_primary_probe', res.data.dxi_clean_primary_probe);
                fillWeeklyRow('dxi_waste_filter', res.data.dxi_waste_filter);
                fillWeeklyRow('dxi_system_check', res.data.dxi_system_check);
                fillWeeklyRow('dxi_supervisor_sign', res.data.dxi_supervisor_sign);
            });
    }

    function clearDxiTable() {

        document.querySelectorAll('.qc-input, .qc-input-wide').forEach(input => {

            // ❌ DO NOT CLEAR FILTERS
            if (
                input.id === 'dxi_month_year' ||
                input.id === 'dxi_location' ||
                input.id === 'dxi_department'
            ) {
                return;
            }

            input.value = '';
        });
    }

    function loadSt200Form() {

        const monthYear = document.getElementById('st200_month_year').value;
        const instrument = document.getElementById('st200_instrument_id').value;

        // ❗ SAME RULE – DO NOT LOAD WITHOUT MONTH
        if (!monthYear) return;

        fetch(`/be/st200/load?st200_month_year=${monthYear}&st200_instrument_id=${instrument}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
            .then(res => res.json())
            .then(res => {

                clearSt200Table(); // 🔑 ALWAYS CLEAR FIRST

                if (!res.data) {
                    document.getElementById('st200_form_id').value = '';
                    return;
                }

                // ✅ SET FORM ID (INLINE UPDATE)
                document.getElementById('st200_form_id').value = res.data.id;

                // ===== DAILY ROWS =====
                fillRow('st200_clean_instrument', res.data.st200_clean_instrument);
                fillRow('st200_empty_waste', res.data.st200_empty_waste);
                fillRow('st200_printer_status', res.data.st200_printer_status);
                fillRow('st200_daily_cleaning_solution', res.data.st200_daily_cleaning_solution);
                fillRow('st200_calibration', res.data.st200_calibration);
                fillRow('st200_shutdown', res.data.st200_shutdown);
                fillRow('st200_lab_staff_sign', res.data.st200_lab_staff_sign);
                fillRow('st200_lab_supervisor_sign', res.data.st200_lab_supervisor_sign);
            });
    }

    function clearSt200Table() {
        document.querySelectorAll('.qc-input-wide').forEach(input => {
            input.value = '';
        });
    }

    function loadH550Form() {
        const monthYear = document.getElementById('h550_month_year').value;
        const instrument = document.getElementById('h550_instrument_serial').value;

        if (!monthYear) return;

        fetch(`/be/h550/load?h550_month_year=${monthYear}&h550_instrument_serial=${instrument}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
            .then(res => res.json())
            .then(res => {

                clearH550Table();

                if (!res.data) {
                    document.getElementById('h550_form_id').value = '';
                    return;
                }

                document.getElementById('h550_form_id').value = res.data.id;

                const daily = typeof res.data.h550_daily === 'string' ?
                    JSON.parse(res.data.h550_daily) :
                    res.data.h550_daily;

                // 🔑 THIS LINE IS THE FIX
                fillH550Daily('h550_daily', daily);
            });
    }


    function clearH550Table() {

        document.querySelectorAll('.qc-input, .qc-input-wide').forEach(input => {

            // ❌ DO NOT CLEAR FILTER FIELDS
            if (
                input.id === 'h550_month_year' ||
                input.id === 'h550_instrument_serial'
            ) {
                return;
            }

            input.value = '';
        });
    }


    function loadD10Form() {

        const monthYear = document.getElementById('d10_month_year').value;
        const instrument = document.getElementById('d10_instrument_serial').value;

        // ❗ SAME RULE AS ALL FORMS
        if (!monthYear) return;

        fetch(`/be/d10/load?d10_month_year=${monthYear}&d10_instrument_serial=${instrument}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
            .then(res => res.json())
            .then(res => {

                clearD10Form(); // 🔑 always clear first

                if (!res.data) {
                    document.getElementById('d10_form_id').value = '';
                    return;
                }

                // ✅ SET FORM ID (INLINE UPDATE)
                document.getElementById('d10_form_id').value = res.data.id;

                // ✅ FILL TOP FIELDS
                document.getElementById('d10_location').value = res.data.d10_location ?? '';
                document.getElementById('d10_department').value = res.data.d10_department ?? '';
                document.getElementById('d10_year').value = res.data.d10_year ?? '';
                document.getElementById('d10_monthly_instrument_serial').value =
                    res.data.d10_monthly_instrument_serial ?? '';

                // ✅ DAILY JSON
                fillNestedRows('d10_daily', res.data.d10_daily);

                // ✅ MONTHLY JSON
                fillNestedRows('d10_monthly', res.data.d10_monthly);
            });
    }

    function clearD10Form() {

        document.querySelectorAll('.qc-input').forEach(input => {

            // ❌ DO NOT CLEAR FILTER FIELDS
            if (
                input.id === 'd10_month_year' ||
                input.id === 'd10_instrument_serial'
            ) {
                return;
            }

            input.value = '';
        });
    }

    function loadAtpForm() {
        const monthYear = document.getElementById('atp_month_year').value;
        const instrument = document.getElementById('atp_instrument_id').value;
        // ❗ SAME RULE AS ALL FORMS
        if (!monthYear) return;
        fetch(`/be/atp/load?atp_month_year=${monthYear}&atp_instrument_id=${instrument}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
            .then(res => res.json())
            .then(res => {

                clearAtpForm(); // 🔑 ALWAYS CLEAR FIRST

                if (!res.data) {
                    document.getElementById('atp_form_id').value = '';
                    return;
                }

                // ✅ SET FORM ID (INLINE UPDATE)
                document.getElementById('atp_form_id').value = res.data.id;

                // ✅ DAILY JSON FILL
                fillNestedRows('atp_daily', res.data.daily);
            });
    }

    function clearAtpForm() {

        document.querySelectorAll('.qc-input').forEach(input => {

            // ❌ DO NOT CLEAR FILTER FIELDS
            if (
                input.id === 'atp_month_year' ||
                input.id === 'atp_instrument_id'
            ) {
                return;
            }

            input.value = '';
        });
    }

    function loadTecForm() {

        const monthYear = document.getElementById('tec_month_year').value;
        const instrument = document.getElementById('tec_instrument_id').value;

        // ❗ SAME RULE AS ALL BE FORMS
        if (!monthYear) return;

        fetch(`/be/tec/load?tec_month_year=${monthYear}&tec_instrument_id=${instrument}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
            .then(res => res.json())
            .then(res => {

                clearTecForm(); // 🔑 always clear first

                if (!res.data) {
                    document.getElementById('tec_form_id').value = '';
                    return;
                }

                // ✅ SET FORM ID (INLINE UPDATE)
                document.getElementById('tec_form_id').value = res.data.id;

                // ✅ DAILY JSON
                fillNestedRows('tec_daily', res.data.tec_daily);
            });
    }

    function clearTecForm() {

        document.querySelectorAll('.qc-input').forEach(input => {

            // ❌ DO NOT CLEAR FILTER FIELDS
            if (
                input.id === 'tec_month_year' ||
                input.id === 'tec_instrument_id'
            ) {
                return;
            }

            input.value = '';
        });
    }

    function loadBactAlertForm() {

        const monthYear = document.getElementById('ba_month_year').value;
        const instrument = document.getElementById('ba_instrument_id').value;

        // ❗ SAME RULE AS ALL FORMS
        if (!monthYear) return;

        fetch(`/be/ba/load?ba_month_year=${monthYear}&ba_instrument_id=${instrument}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
            .then(res => res.json())
            .then(res => {

                clearBactAlertForm(); // 🔑 always clear first

                if (!res.data) {
                    document.getElementById('ba_form_id').value = '';
                    return;
                }

                // ✅ SET FORM ID (INLINE UPDATE)
                document.getElementById('ba_form_id').value = res.data.id;

                // ✅ FILL DAILY JSON
                fillNestedRows('ba_daily', res.data.ba_daily);
            });
    }

    function clearBactAlertForm() {

        document.querySelectorAll('.qc-input').forEach(input => {

            // ❌ DO NOT CLEAR FILTER FIELDS
            if (
                input.id === 'ba_month_year' ||
                input.id === 'ba_instrument_id'
            ) {
                return;
            }

            input.value = '';
        });
    }


    function loadElisaForm() {

        const monthYear = document.getElementById('elisa_month_year').value;
        const instrument = document.getElementById('elisa_instrument_id').value;

        // ❗ SAME RULE AS ALL FORMS
        if (!monthYear) return;

        fetch(`/be/elisa/load?elisa_month_year=${monthYear}&elisa_instrument_id=${instrument}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
            .then(res => res.json())
            .then(res => {

                clearElisaForm(); // 🔑 always clear first

                if (!res.data) {
                    document.getElementById('elisa_form_id').value = '';
                    return;
                }

                // ✅ SET FORM ID (INLINE UPDATE)
                document.getElementById('elisa_form_id').value = res.data.id;

                // ✅ DAILY JSON
                fillNestedRows('elisa_daily', res.data.elisa_daily);
            });
    }

    function clearElisaForm() {

        document.querySelectorAll('.qc-input').forEach(input => {

            // ❌ DO NOT CLEAR FILTER FIELDS
            if (
                input.id === 'elisa_month_year' ||
                input.id === 'elisa_instrument_id'
            ) {
                return;
            }

            // for checkbox + text
            if (input.type === 'checkbox') {
                input.checked = false;
            } else {
                input.value = '';
            }
        });
    }


    function loadRtpcrForm() {

        const monthYear = document.getElementById('rtpcr_month_year').value;
        const instrument = document.getElementById('rtpcr_instrument_id').value;

        // ❗ SAME RULE AS ALL FORMS
        if (!monthYear) return;

        fetch(`/be/rtpcr/load?rtpcr_month_year=${monthYear}&rtpcr_instrument_id=${instrument}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
            .then(res => res.json())
            .then(res => {

                clearRtpcrForm(); // 🔑 always clear first

                if (!res.data) {
                    document.getElementById('rtpcr_form_id').value = '';
                    return;
                }

                // ✅ SET FORM ID (INLINE UPDATE)
                document.getElementById('rtpcr_form_id').value = res.data.id;

                // ✅ FILL DAILY JSON (checkbox + text safe)
                fillNestedRows('rtpcr_daily', res.data.rtpcr_daily);
            });
    }

    function clearRtpcrForm() {

        document.querySelectorAll('.qc-input').forEach(input => {

            // ❌ DO NOT CLEAR FILTER FIELDS
            if (
                input.id === 'rtpcr_month_year' ||
                input.id === 'rtpcr_instrument_id'
            ) {
                return;
            }

            if (input.type === 'checkbox') {
                input.checked = false;
            } else {
                input.value = '';
            }
        });
    }


    function loadCcForm() {

        const monthYear = document.getElementById('cc_month_year').value;
        const instrument = document.getElementById('cc_instrument_id').value;

        if (!monthYear) return;

        fetch(`/be/cc/load?cc_month_year=${monthYear}&cc_instrument_id=${instrument}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
            .then(res => res.json())
            .then(res => {

                clearCcForm();

                if (!res.data) {
                    document.getElementById('cc_form_id').value = '';
                    return;
                }

                document.getElementById('cc_form_id').value = res.data.id;

                // ✅ HEADER
                document.getElementById('cc_department').value =
                    res.data.cc_department ?? '';

                // ✅ DAILY JSON
                fillNestedRows('cc_daily', res.data.cc_daily);

                // ✅ MONTHLY (FLAT)
                document.getElementById('cc_monthly_bushes_checked_notes').value =
                    res.data.cc_bushes_checked_notes ?? '';

                document.getElementById('cc_monthly_bushes_checked_date').value =
                    res.data.cc_bushes_checked_date ?? '';

                document.getElementById('cc_monthly_bushes_next_due').value =
                    res.data.cc_bushes_next_due ?? '';

                document.getElementById('cc_monthly_signature').value =
                    res.data.cc_monthly_signature ?? '';
            });
    }

    function clearCcForm() {
        document.querySelectorAll('.qc-input').forEach(input => {
            if (
                input.id === 'cc_month_year' ||
                input.id === 'cc_instrument_id'
            ) return;

            if (input.type === 'checkbox') {
                input.checked = false;
            } else {
                input.value = '';
            }
        });
    }


    function loadMicForm() {

        const monthYear = document.getElementById('mic_month_year').value;
        const instrument = document.getElementById('mic_instrument_id').value;

        // ❗ SAME RULE AS ALL FORMS
        if (!monthYear) return;

        fetch(`/be/mic/load?mic_month_year=${monthYear}&mic_instrument_id=${instrument}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
            .then(res => res.json())
            .then(res => {

                clearMicForm(); // 🔑 always clear first

                if (!res.data) {
                    document.getElementById('mic_form_id').value = '';
                    return;
                }

                // ✅ SET FORM ID (INLINE UPDATE)
                document.getElementById('mic_form_id').value = res.data.id;

                // ✅ FILL DAILY JSON
                fillNestedRows('mic_daily', res.data.mic_daily);
            });
    }

    function clearMicForm() {

        document.querySelectorAll('.qc-input').forEach(input => {

            // ❌ DO NOT CLEAR FILTER FIELDS
            if (
                input.id === 'mic_month_year' ||
                input.id === 'mic_instrument_id'
            ) {
                return;
            }

            // checkbox vs text
            if (input.type === 'checkbox') {
                input.checked = false;
            } else {
                input.value = '';
            }
        });
    }


    function loadLauramForm() {

        const monthYear = document.getElementById('lauram_month_year').value;
        const instrument = document.getElementById('lauram_instrument_id').value;

        // ❗ GLOBAL RULE – Month mandatory
        if (!monthYear) return;

        fetch(`/be/lauram/load?lauram_month_year=${monthYear}&lauram_instrument_id=${instrument}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
            .then(res => res.json())
            .then(res => {

                clearLauramForm(); // 🔑 always clear first

                if (!res.data) {
                    document.getElementById('lauram_form_id').value = '';
                    return;
                }

                // ✅ SET FORM ID (INLINE UPDATE)
                document.getElementById('lauram_form_id').value = res.data.id;

                // ✅ FILL DAILY JSON (DEEP NESTED)
                fillLauramDaily(res.data.lauram_daily);
            });
    }

    function clearLauramForm() {

        document.querySelectorAll('.qc-input').forEach(input => {

            // ❌ DO NOT CLEAR FILTER FIELDS
            if (
                input.id === 'lauram_month_year' ||
                input.id === 'lauram_instrument_id'
            ) {
                return;
            }

            if (input.type === 'checkbox') {
                input.checked = false;
            } else {
                input.value = '';
            }
        });
    }


    function loadEquipmentBreakdownRegister() {

        const fromDate = document.getElementById('eb_from_date').value;
        const toDate = document.getElementById('eb_to_date').value;
        const location = document.getElementById('eb_location').value;

        // ❗ At least ONE date required
        if (!fromDate && !toDate) return;

        fetch(`/be/equipment-breakdown/load?eb_from_date=${fromDate}&eb_to_date=${toDate}&eb_location=${location}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
            .then(res => res.json())
            .then(res => {

                clearEquipmentBreakdownRegister();

                if (!res.data) {
                    document.getElementById('eb_form_id').value = '';
                    return;
                }

                // ✅ INLINE EDIT ID
                document.getElementById('eb_form_id').value = res.data.id;

                // ✅ SIMPLE FIELD BINDING
                Object.keys(res.data).forEach(key => {
                    const el = document.getElementById(key);
                    if (el) el.value = res.data[key] ?? '';
                });
            });
    }




    function clearEquipmentBreakdownRegister() {

        document.querySelectorAll('.qc-input').forEach(input => {

            // ❌ DO NOT CLEAR FILTER FIELDS
            if (
                input.id === 'eb_from_date' ||
                input.id === 'eb_to_date' ||
                input.id === 'eb_location'
            ) {
                return;
            }

            input.value = '';
        });
    }




    function fillLauramDaily(data) {

        if (!data) return;

        Object.keys(data).forEach(section => {

            const sectionData = data[section];

            Object.keys(sectionData).forEach(key => {

                const value = sectionData[key];

                // 🔹 CASE 1: SIGNATURES (section → day)
                if (typeof value === 'string') {

                    const day = key;
                    const inputId = `lauram_daily_${section}_${day}`;
                    const input = document.getElementById(inputId);

                    if (input) {
                        input.value = value;
                    }

                }

                // 🔹 CASE 2: CLEANING STEPS (section → step → day)
                else if (typeof value === 'object') {

                    const step = key;

                    Object.keys(value).forEach(day => {

                        const inputId =
                            `lauram_daily_${section}_${step}_${day}`;

                        const input = document.getElementById(inputId);

                        if (!input) return;

                        if (input.type === 'checkbox') {
                            input.checked = value[day] == 1;
                        } else {
                            input.value = value[day] ?? '';
                        }
                    });
                }
            });
        });
    }



    function loadMicrotomeForm() {

        const monthYear = document.getElementById('microtome_month_year').value;
        const instrument = document.getElementById('microtome_instrument_id').value;

        // ❗ GLOBAL RULE – Month mandatory
        if (!monthYear) return;

        fetch(`/be/microtome/load?microtome_month_year=${monthYear}&microtome_instrument_id=${instrument}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
            .then(res => res.json())
            .then(res => {

                clearMicrotomeForm(); // 🔑 always clear first

                if (!res.data) {
                    document.getElementById('microtome_form_id').value = '';
                    return;
                }

                // ✅ SET FORM ID (INLINE UPDATE)
                document.getElementById('microtome_form_id').value = res.data.id;

                // ✅ FILL DAILY JSON
                fillNestedRows('microtome_daily', res.data.microtome_daily);
            });
    }

    function clearMicrotomeForm() {

        document.querySelectorAll('.qc-input').forEach(input => {

            // ❌ DO NOT CLEAR FILTER FIELDS
            if (
                input.id === 'microtome_month_year' ||
                input.id === 'microtome_instrument_id'
            ) {
                return;
            }

            if (input.type === 'checkbox') {
                input.checked = false;
            } else {
                input.value = '';
            }
        });
    }

    function loadFbForm() {

        const monthYear = document.getElementById('fb_month_year').value;
        const instrument = document.getElementById('fb_instrument_id').value;

        // ❗ GLOBAL RULE – month mandatory
        if (!monthYear) return;

        fetch(`/be/fb/load?fb_month_year=${monthYear}&fb_instrument_id=${instrument}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
            .then(res => res.json())
            .then(res => {

                clearFbForm(); // 🔑 always clear first

                if (!res.data) {
                    document.getElementById('fb_form_id').value = '';
                    return;
                }

                // ✅ INLINE UPDATE ID
                document.getElementById('fb_form_id').value = res.data.id;

                // ✅ FILL DAILY JSON
                fillNestedRows('fb_daily', res.data.fb_daily);
            });
    }

    /* ---------------- CLEAR FORM ---------------- */
    function clearFbForm() {

        document.querySelectorAll('.qc-input').forEach(input => {

            // ❌ DO NOT CLEAR FILTER FIELDS
            if (
                input.id === 'fb_month_year' ||
                input.id === 'fb_instrument_id'
            ) {
                return;
            }

            if (input.type === 'checkbox') {
                input.checked = false;
            } else {
                input.value = '';
            }
        });
    }

    function loadGsForm() {

        const monthYear = document.getElementById('gs_month_year').value;
        const instrument = document.getElementById('gs_instrument_id').value;

        // ❗ GLOBAL RULE – Month mandatory
        if (!monthYear) return;

        fetch(`/be/gs/load?gs_month_year=${monthYear}&gs_instrument_id=${instrument}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
            .then(res => res.json())
            .then(res => {

                clearGsForm(); // 🔑 always clear first

                if (!res.data) {
                    document.getElementById('gs_form_id').value = '';
                    return;
                }

                // ✅ INLINE EDIT ID
                document.getElementById('gs_form_id').value = res.data.id;

                // ✅ FILL DAILY JSON
                fillNestedRows('gs_daily', res.data.gs_daily);
            });
    }

    function clearGsForm() {

        document.querySelectorAll('.qc-input').forEach(input => {

            // ❌ DO NOT CLEAR FILTER FIELDS
            if (
                input.id === 'gs_month_year' ||
                input.id === 'gs_instrument_id'
            ) {
                return;
            }

            if (input.type === 'checkbox') {
                input.checked = false;
            } else {
                input.value = '';
            }
        });
    }

    function handlePatientMobileFilter(e) {
        e.preventDefault();
        e.stopPropagation();
        loadMaternalMarkerForm();
    }

    function blockEnter(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            return false; // ⛔ STOP submit
        }
    }



    function loadMaternalMarkerForm() {

        const mobile = document.getElementById('filter_patient_mobile').value;

        // ❗ GLOBAL RULE – filter mandatory
        if (!mobile) return;

        fetch(`/be/maternal-marker/load?filter_patient_mobile=${mobile}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
            .then(res => res.json())
            .then(res => {

                clearMaternalMarkerForm(); // 🔑 clear first

                if (!res.data) {
                    document.getElementById('mm_form_id').value = '';
                    return;
                }

                // ✅ SET INLINE EDIT ID (MOST IMPORTANT)
                document.getElementById('mm_form_id').value = res.data.id;

                // ✅ FILL SIMPLE INPUTS
                Object.keys(res.data).forEach(key => {

                    const el = document.getElementById(key);
                    if (!el) return;

                    if (el.type === 'checkbox') {
                        el.checked = true;
                    } else {
                        el.value = res.data[key] ?? '';
                    }
                });

                // ✅ TEST PANELS (ARRAY CHECKBOXES)
                if (Array.isArray(res.data.test_panels)) {
                    res.data.test_panels.forEach(val => {
                        const cb = document.querySelector(
                            `input[name="test_panels[]"][value="${val}"]`
                        );
                        if (cb) cb.checked = true;
                    });
                }
            });
    }

    /* ---------------- CLEAR FORM ---------------- */
    function clearMaternalMarkerForm() {

        document.querySelectorAll('.qc-input').forEach(input => {

            // ❌ DO NOT CLEAR FILTER
            if (input.id === 'filter_patient_mobile') return;

            // ❌ DO NOT CLEAR form_id
            if (input.id === 'mm_form_id') return;

            if (input.type === 'checkbox') {
                input.checked = false;
            } else {
                input.value = '';
            }
        });
    }



    function loadTosohForm() {

        const monthYear = document.getElementById('tosoh_month_year').value;
        const serial = document.getElementById('tosoh_instrument_serial').value;

        // ❗ SAME GLOBAL RULE AS OTHER FORMS
        if (!monthYear) return;

        fetch(`/be/tosoh/load?tosoh_month_year=${monthYear}&tosoh_instrument_serial=${serial}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
            .then(res => res.json())
            .then(res => {

                clearTosohForm(); // 🔑 same pattern

                if (!res.data) {
                    document.getElementById('tosoh_form_id').value = '';
                    return;
                }

                // ✅ INLINE EDIT ID
                document.getElementById('tosoh_form_id').value = res.data.id;

                // ✅ USE EXISTING COMMON FILL FUNCTION
                fillTosohDaily(res.data.tosoh_daily);

            });
    }

    function clearTosohForm() {

        document.querySelectorAll('.qc-input').forEach(input => {

            // ❌ DO NOT CLEAR FILTER FIELDS
            if (
                input.id === 'tosoh_month_year' ||
                input.id === 'tosoh_instrument_serial'
            ) {
                return;
            }

            input.value = '';
        });
    }


    function fillTosohDaily(data) {

        if (!data) return;

        Object.keys(data).forEach(section => {

            Object.keys(data[section]).forEach(type => {

                Object.keys(data[section][type]).forEach(day => {

                    const inputName = `${section}_${type}_${day}`;

                    const input = document.querySelector(
                        `input[name="${inputName}"]`
                    );

                    if (!input) return;

                    input.value = data[section][type][day] ?? '';
                });
            });
        });
    }



    function loadDxh560Form() {

        const monthYear = document.getElementById('dxh560_month_year').value;
        const instrument = document.getElementById('dxh560_instrument_serial').value;

        // ❗ GLOBAL RULE – Month mandatory
        if (!monthYear) return;

        fetch(`/be/dxh560/load?dxh560_month_year=${monthYear}&dxh560_instrument_serial=${instrument}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
            .then(res => res.json())
            .then(res => {

                clearDxh560Form(); // 🔑 clear FIRST

                if (!res.data) {
                    document.getElementById('dxh560_form_id').value = '';
                    return;
                }

                // ✅ INLINE EDIT ID
                document.getElementById('dxh560_form_id').value = res.data.id;

                /* =========================
                   DAILY MAINTENANCE
                ========================= */
                fillNestedRows('dxh560_daily', res.data.dxh560_daily);

                /* =========================
                   WEEKLY MAINTENANCE
                ========================= */
                if (res.data.dxh560_weekly) {
                    Object.keys(res.data.dxh560_weekly).forEach(field => {
                        fillWeeklyRow(
                            `dxh560_weekly[${field}]`,
                            res.data.dxh560_weekly[field]
                        );
                    });
                }

                /* =========================
                   MONTHLY MAINTENANCE
                ========================= */
                if (res.data.dxh560_monthly && res.data.dxh560_monthly.bleach_cycle) {

                    const bc = res.data.dxh560_monthly.bleach_cycle;

                    const notesEl = document.querySelector(
                        `[name="dxh560_monthly[bleach_cycle][notes]"]`
                    );
                    if (notesEl) notesEl.value = bc.notes ?? '';

                    const datesEl = document.querySelector(
                        `[name="dxh560_monthly[bleach_cycle][dates]"]`
                    );
                    if (datesEl) datesEl.value = bc.dates ?? '';
                }

                /* =========================
                   TECHNICIAN SIGNATURE
                ========================= */
                if (res.data.dxh560_technician) {

                    const nameEl = document.querySelector(
                        `[name="dxh560_technician[name]"]`
                    );
                    if (nameEl) nameEl.value = res.data.dxh560_technician.name ?? '';

                    const dateEl = document.querySelector(
                        `[name="dxh560_technician[date]"]`
                    );
                    if (dateEl) dateEl.value = res.data.dxh560_technician.date ?? '';
                }
            });
    }


    function clearVitekForm() {

        document.querySelectorAll('input.qc-input').forEach(input => {

            // ❌ DO NOT CLEAR FILTERS OR FORM ID
            if (
                input.id === 'vitek_month_year' ||
                input.id === 'vitek_instrument_id' ||
                input.id === 'vitek_form_id'
            ) {
                return;
            }

            input.value = '';
        });
    }





    function clearDxh560Form() {

        document.querySelectorAll('input.qc-input').forEach(input => {

            // ❌ DO NOT CLEAR FILTERS OR FORM ID
            if (
                input.id === 'dxh560_month_year' ||
                input.id === 'dxh560_instrument_serial' ||
                input.id === 'dxh560_form_id'
            ) {
                return;
            }

            input.value = '';
        });
    }


    function loadVitekForm() {

        const monthYear = document.getElementById('vitek_month_year').value;
        const instrument = document.getElementById('vitek_instrument_id').value;

        // ❗ GLOBAL RULE – Month mandatory
        if (!monthYear) return;

        fetch(`/be/vitek/load?vitek_month_year=${monthYear}&vitek_instrument_id=${instrument}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            })
            .then(res => res.json())
            .then(res => {

                clearVitekForm(); // 🔑 always clear first

                if (!res.data) {
                    document.getElementById('vitek_form_id').value = '';
                    return;
                }

                // ✅ INLINE EDIT ID
                document.getElementById('vitek_form_id').value = res.data.id;

                // ✅ DAILY JSON
                fillNestedRows('vitek_daily', res.data.vitek_daily);

                // ✅ MONTHLY JSON
                fillNestedRows('vitek_monthly', res.data.vitek_monthly);
            });
    }

    function clearTbody(tbody) {
        while (tbody.firstChild) {
            tbody.removeChild(tbody.firstChild);
        }
    }

    /* 🔹 Create input cell */
    function createInputCell(name, value = '', type = 'text') {

        const td = document.createElement('td');
        td.className = 'border px-2 py-1';

        const input = document.createElement('input');
        input.type = type;
        input.name = name;
        input.value = value ?? '';
        input.className = 'border rounded px-1 py-1 w-full';

        td.appendChild(input);
        return td;
    }

    /* 🔹 Create one row (new / existing) */
    function createEquipmentBreakdownRow(row = {}, index = 0) {

        const tr = document.createElement('tr');

        // 🔑 hidden id for inline edit
        if (row.id) {
            const hidden = document.createElement('input');
            hidden.type = 'hidden';
            hidden.name = `rows[${index}][id]`;
            hidden.value = row.id;
            tr.appendChild(hidden);
        }

        tr.appendChild(createInputCell(`rows[${index}][eb_date]`, row.eb_date, 'date'));
        tr.appendChild(createInputCell(`rows[${index}][eb_equipment]`, row.eb_equipment));
        tr.appendChild(createInputCell(`rows[${index}][eb_problem]`, row.eb_problem));
        tr.appendChild(createInputCell(`rows[${index}][eb_breakdown_time]`, row.eb_breakdown_time));
        tr.appendChild(createInputCell(`rows[${index}][eb_action_taken]`, row.eb_action_taken));
        tr.appendChild(createInputCell(`rows[${index}][eb_engineer_name]`, row.eb_engineer_name));
        tr.appendChild(createInputCell(`rows[${index}][eb_total_downtime]`, row.eb_total_downtime));
        tr.appendChild(createInputCell(`rows[${index}][eb_remarks]`, row.eb_remarks));
        tr.appendChild(createInputCell(`rows[${index}][eb_signature]`, row.eb_signature));

        return tr;
    }

    function loadEquipmentBreakdownRegister() {

        const fromDate = document.getElementById('eb_from_date').value;
        const toDate = document.getElementById('eb_to_date').value;
        const location = document.getElementById('eb_location').value;

        // ✅ Allow load if ANY filter is present
        if (!fromDate && !toDate && !location) return;

        fetch(
                `/be/equipment-breakdown/load?` +
                `eb_from_date=${fromDate}` +
                `&eb_to_date=${toDate}` +
                `&eb_location=${location}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                }
            )
            .then(res => res.json())
            .then(res => {

                const tbody = document.getElementById('equipmentBreakdownBody');
                clearTbody(tbody);

                // No data → keep one empty row
                if (!res.data || res.data.length === 0) {
                    tbody.appendChild(createEquipmentBreakdownRow({}, 0));
                    return;
                }

                res.data.forEach((row, index) => {
                    tbody.appendChild(createEquipmentBreakdownRow(row, index));
                });
            })
            .catch(console.error);
    }



    function handleDatalistInput(input, datalistId, callback) {
        const list = document.getElementById(datalistId);
        const options = Array.from(list.options).map(o => o.value);

        // ✅ Only when user selects a valid option
        if (options.includes(input.value)) {
            if (typeof callback === 'function') {
                callback();
            }
        }
    }



    function fillNestedRows(prefix, data) {

        if (!data) return;

        Object.keys(data).forEach(field => {

            Object.keys(data[field]).forEach(day => {

                const input = document.getElementById(
                    `${prefix}_${field}_${day}`
                );

                if (!input) return;

                // ✅ ONLY checkbox → use checked
                if (input.type === 'checkbox') {
                    input.checked = String(data[field][day]) === '1';
                }
                // ✅ ALL other inputs (text, number, etc.)
                else {
                    input.value = data[field][day] ?? '';
                }
            });
        });
    }



    // function fillNestedRows(prefix, data) {

    // if (!data) return;

    // Object.keys(data).forEach(key => {

    // Object.keys(data[key]).forEach(subKey => {

    // const input = document.getElementById(
    // `${prefix}_${key}_${subKey}`
    // );

    // if (input) {
    // input.value = data[key][subKey] ?? '';
    // }
    // });
    // });
    // }



    function fillH550Daily(prefix, data) {
        if (!data) return;

        // field loop (shutdown, empty_waste, etc)
        Object.keys(data).forEach(field => {

            // day loop (1..31)
            Object.keys(data[field]).forEach(day => {

                const inputId = `${prefix}_${field}_${day}`;

                const input = document.getElementById(inputId);

                if (input) {
                    input.value = data[field][day] ?? '';
                }
            });
        });
    }

    function fillRow(prefix, data) {
        if (!data) return;

        Object.keys(data).forEach(day => {
            const input = document.getElementById(`${prefix}_${day}`);
            if (input) input.value = data[day];
        });
    }

    function fillWeeklyRow(prefix, data) {
        if (!data) return;

        Object.keys(data).forEach(week => {
            const el = document.querySelector(`[name="${prefix}[${week}]"]`);
            if (el) el.value = data[week];
        });
    }


    function fillCheckboxRow(prefix, data) {
        if (!data) return;

        Object.keys(data).forEach(day => {
            const cb = document.getElementById(`${prefix}_${day}`);
            if (cb) cb.checked = true;
        });
    }

    function fillRadioRow(prefix, data) {
        if (!data) return;

        Object.keys(data).forEach(day => {
            const radio = document.querySelector(
                `input[name="${prefix}[${day}]"][value="${data[day]}"]`
                );
                if (radio) radio.checked = true;
            });
        }
    </script>

    {{-- </html> --}}
@endsection
