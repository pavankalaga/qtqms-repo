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
        issueNo="1.0" issueDate="01/10/2024" action="{{ route('newforms.be.forms.submit') }}" buttonText="Submit">
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
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('newforms.be.forms.submit') }}">

        <!-- Header Section -->
        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Month & Year:</strong>
                <input type="month" name="month_year" id="hotplate_month_year"
                    style="border:1px solid #000; padding:5px;"
                    onchange="loadHotPlateQc()">
            </div>
            <div>
                <strong>Instrument S. No.:</strong>
                <input type="text" name="instrument_serial_no" id="hotplate_instrument_serial_no"
                    style="border:1px solid #000; padding:5px; width:150px;">
            </div>
            <button type="button" onclick="clearHotPlateQc()"
                style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <input type="hidden" name="form_id" id="hotplate_form_id">

        <!-- Table -->
        <table style="width:100%; border-collapse:collapse;" border="1">
            <tbody>
                <tr>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Date</th>
                    @for ($d = 1; $d <= 31; $d++)
                        <th style="border:1px solid #000; padding:4px; text-align:center;">{{ $d }}</th>
                    @endfor
                </tr>

                <tr>
                    <td style="border:1px solid #000; padding:4px;"><strong>Cleaning From Outside</strong></td>
                    @for ($d = 1; $d <= 31; $d++)
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" id="hotplate_cleaning_outside_{{ $d }}" name="cleaning_outside[{{ $d }}]"
                                style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>
                    @endfor
                </tr>

                <tr>
                    <td style="border:1px solid #000; padding:4px;"><strong>Temperature Check</strong></td>
                    @for ($d = 1; $d <= 31; $d++)
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" id="hotplate_temperature_check_{{ $d }}" name="temperature_check[{{ $d }}]"
                                style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>
                    @endfor
                </tr>

                <tr>
                    <td style="border:1px solid #000; padding:4px;"><strong>Lab Staff Signature</strong></td>
                    @for ($d = 1; $d <= 31; $d++)
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" id="hotplate_lab_staff_signature_{{ $d }}" name="lab_staff_signature[{{ $d }}]"
                                style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>
                    @endfor
                </tr>

                <tr>
                    <td style="border:1px solid #000; padding:4px;"><strong>Lab Supervisor Signature</strong></td>
                    @for ($d = 1; $d <= 31; $d++)
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" id="hotplate_lab_supervisor_signature_{{ $d }}" name="lab_supervisor_signature[{{ $d }}]"
                                style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>
                    @endfor
                </tr>
            </tbody>
        </table>

        <script>
            function loadHotPlateQc() {
                const monthYear = document.getElementById('hotplate_month_year').value;
                const instrument = document.getElementById('hotplate_instrument_serial_no').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('month_year', monthYear);
                if (instrument) params.append('instrument_serial_no', instrument);

                fetch(`/newforms/be/hot-plate-qc/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    // Clear all inputs first
                    clearHotPlateQcInputs();

                    if (!res.data) {
                        document.getElementById('hotplate_form_id').value = '';
                        return;
                    }

                    // Set form ID for update
                    document.getElementById('hotplate_form_id').value = res.data.id;

                    // Populate rows
                    const fields = ['cleaning_outside', 'temperature_check', 'lab_staff_signature', 'lab_supervisor_signature'];
                    fields.forEach(field => {
                        if (res.data[field]) {
                            Object.keys(res.data[field]).forEach(day => {
                                const el = document.getElementById(`hotplate_${field}_${day}`);
                                if (el) el.value = res.data[field][day];
                            });
                        }
                    });
                })
                .catch(err => console.error('Load error:', err));
            }

            function clearHotPlateQcInputs() {
                const fields = ['cleaning_outside', 'temperature_check', 'lab_staff_signature', 'lab_supervisor_signature'];
                for (let d = 1; d <= 31; d++) {
                    fields.forEach(field => {
                        const el = document.getElementById(`hotplate_${field}_${d}`);
                        if (el) el.value = '';
                    });
                }
                document.getElementById('hotplate_form_id').value = '';
            }

            function clearHotPlateQc() {
                document.getElementById('hotplate_month_year').value = '';
                document.getElementById('hotplate_instrument_serial_no').value = '';
                clearHotPlateQcInputs();
            }

            // AJAX Submit for Hot Plate QC
            (function() {
                function initHotPlateQcForm() {
                    const formContainer = document.querySelector('[id="TDPL/BE/FOM-0##"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastHotPlate('success', result.message || 'Saved successfully!');
                                // Update form_id if returned
                                if (result.form_id) {
                                    document.getElementById('hotplate_form_id').value = result.form_id;
                                }
                            } else {
                                showToastHotPlate('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastHotPlate('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });
                    });
                }

                function showToastHotPlate(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position:fixed; top:20px; right:20px; z-index:9999;
                        padding:12px 24px; border-radius:6px; color:#fff; font-size:14px;
                        box-shadow:0 4px 12px rgba(0,0,0,0.15);
                        background:${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initHotPlateQcForm);
                } else {
                    initHotPlateQcForm();
                }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete id="TDPL/BE/FOM-006" docNo="TDPL/BE/FOM-006" docName="Bio Safety Cabinet Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('newforms.be.forms.submit') }}">

        <!-- Header Section -->
        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Department:</strong>
                <input type="text" name="bsc_department" id="bsc_department" list="bscDeptList"
                    style="border:1px solid #000; padding:5px; width:200px;" placeholder="All"
                    onchange="loadBscForm()" onblur="loadBscForm()">
                <datalist id="bscDeptList">
                    <option value="Biochemistry">
                    <option value="Pathology">
                    <option value="Hematology">
                    <option value="Microbiology">
                </datalist>
            </div>
            <div>
                <strong>Month & Year:</strong>
                <input type="month" name="bsc_month_year" id="bsc_month_year"
                    style="border:1px solid #000; padding:5px; width:180px;"
                    onchange="loadBscForm()">
            </div>
            <div>
                <strong>Equipment ID:</strong>
                <input type="text" name="bsc_equipment_id" id="bsc_equipment_id" list="bscEquipList"
                    style="border:1px solid #000; padding:5px; width:180px;" placeholder="All"
                    onchange="loadBscForm()" onblur="loadBscForm()">
                <datalist id="bscEquipList">
                    <option value="BSC-001">
                    <option value="BSC-002">
                    <option value="BSC-003">
                </datalist>
            </div>
            <button type="button" onclick="clearBscForm()"
                style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <input type="hidden" name="bsc_form_id" id="bsc_form_id">

        <!-- Table -->
        <table style="width:100%; border-collapse:collapse;" border="1">
            <tbody>
                <!-- HEADER ROW 1 -->
                <tr>
                    <th style="border:1px solid #000; padding:4px;" rowspan="3">Date</th>
                    <th style="border:1px solid #000; padding:4px;" rowspan="3">Clean with 70% IPA</th>
                    <th style="border:1px solid #000; padding:4px;" rowspan="3">UV Light 15 mins</th>
                    <th style="border:1px solid #000; padding:4px;" rowspan="3">Manometer Reading (10&plusmn;1)</th>
                    <th style="border:1px solid #000; padding:4px;" rowspan="3">Done By Sign</th>
                    <th style="border:1px solid #000; padding:4px;" rowspan="3">1% Hypo Available</th>
                    <th style="border:1px solid #000; padding:4px;"></th>
                    <th style="border:1px solid #000; padding:4px;"></th>
                    <th style="border:1px solid #000; padding:4px;" colspan="3">Weekly Maintenance</th>
                    <th style="border:1px solid #000; padding:4px;"></th>
                    <th style="border:1px solid #000; padding:4px;"></th>
                </tr>
                <!-- HEADER ROW 2 -->
                <tr>
                    <th style="border:1px solid #000; padding:4px;" rowspan="2">Settle Plate Date</th>
                    <th style="border:1px solid #000; padding:4px;" colspan="3">Settle Plate Results (0-5 CFU)</th>
                    <th style="border:1px solid #000; padding:4px;" rowspan="2">UV Efficacy</th>
                    <th style="border:1px solid #000; padding:4px;" rowspan="2">Checked By</th>
                    <th style="border:1px solid #000; padding:4px;" rowspan="2">Remarks</th>
                </tr>
                <!-- HEADER ROW 3 -->
                <tr>
                    <th style="border:1px solid #000; padding:4px;">Yes</th>
                    <th style="border:1px solid #000; padding:4px;">No</th>
                    <th style="border:1px solid #000; padding:4px;">CFU</th>
                </tr>

                @for ($d = 1; $d <= 31; $d++)
                    <tr>
                        <td style="border:1px solid #000; padding:4px; text-align:center;"><strong>{{ $d }}</strong></td>
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" id="bsc_clean_ipa_{{ $d }}" name="bsc_clean_ipa[{{ $d }}]"
                                style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" id="bsc_uv_light_{{ $d }}" name="bsc_uv_light[{{ $d }}]"
                                style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" id="bsc_manometer_{{ $d }}" name="bsc_manometer[{{ $d }}]"
                                style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" id="bsc_done_by_{{ $d }}" name="bsc_done_by[{{ $d }}]"
                                style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" id="bsc_hypo_available_{{ $d }}" name="bsc_hypo_available[{{ $d }}]"
                                style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="date" id="bsc_settle_plate_date_{{ $d }}" name="bsc_settle_plate_date[{{ $d }}]"
                                style="padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="checkbox" id="bsc_settle_yes_{{ $d }}" name="bsc_settle_yes[{{ $d }}]" value="1">
                        </td>
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="checkbox" id="bsc_settle_no_{{ $d }}" name="bsc_settle_no[{{ $d }}]" value="1">
                        </td>
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" id="bsc_settle_cfu_{{ $d }}" name="bsc_settle_cfu[{{ $d }}]"
                                placeholder="0-5" style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" id="bsc_uv_efficacy_{{ $d }}" name="bsc_uv_efficacy[{{ $d }}]"
                                style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" id="bsc_checked_by_{{ $d }}" name="bsc_checked_by[{{ $d }}]"
                                style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" id="bsc_remarks_{{ $d }}" name="bsc_remarks[{{ $d }}]"
                                style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>

        <script>
            function loadBscForm() {
                const monthYear = document.getElementById('bsc_month_year').value;
                const department = document.getElementById('bsc_department').value;
                const equipment = document.getElementById('bsc_equipment_id').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('bsc_month_year', monthYear);
                if (department) params.append('bsc_department', department);
                if (equipment) params.append('bsc_equipment_id', equipment);

                fetch(`/newforms/be/bsc/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    clearBscInputs();

                    if (!res.data) {
                        document.getElementById('bsc_form_id').value = '';
                        return;
                    }

                    document.getElementById('bsc_form_id').value = res.data.id;

                    // Text fields
                    const textFields = [
                        'bsc_clean_ipa', 'bsc_uv_light', 'bsc_manometer', 'bsc_done_by',
                        'bsc_hypo_available', 'bsc_settle_plate_date', 'bsc_settle_cfu',
                        'bsc_uv_efficacy', 'bsc_checked_by', 'bsc_remarks'
                    ];
                    textFields.forEach(field => {
                        if (res.data[field]) {
                            Object.keys(res.data[field]).forEach(day => {
                                const el = document.getElementById(`${field}_${day}`);
                                if (el) el.value = res.data[field][day];
                            });
                        }
                    });

                    // Checkbox fields
                    ['bsc_settle_yes', 'bsc_settle_no'].forEach(field => {
                        if (res.data[field]) {
                            Object.keys(res.data[field]).forEach(day => {
                                const el = document.getElementById(`${field}_${day}`);
                                if (el) el.checked = true;
                            });
                        }
                    });
                })
                .catch(err => console.error('Load error:', err));
            }

            function clearBscInputs() {
                const textFields = [
                    'bsc_clean_ipa', 'bsc_uv_light', 'bsc_manometer', 'bsc_done_by',
                    'bsc_hypo_available', 'bsc_settle_plate_date', 'bsc_settle_cfu',
                    'bsc_uv_efficacy', 'bsc_checked_by', 'bsc_remarks'
                ];
                for (let d = 1; d <= 31; d++) {
                    textFields.forEach(field => {
                        const el = document.getElementById(`${field}_${d}`);
                        if (el) el.value = '';
                    });
                    // Checkboxes
                    ['bsc_settle_yes', 'bsc_settle_no'].forEach(field => {
                        const el = document.getElementById(`${field}_${d}`);
                        if (el) el.checked = false;
                    });
                }
                document.getElementById('bsc_form_id').value = '';
            }

            function clearBscForm() {
                document.getElementById('bsc_month_year').value = '';
                document.getElementById('bsc_department').value = '';
                document.getElementById('bsc_equipment_id').value = '';
                clearBscInputs();
            }

            // AJAX Submit for BSC Form
            (function() {
                function initBscForm() {
                    const formContainer = document.querySelector('[id="TDPL/BE/FOM-006"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastBSC('success', result.message || 'Saved successfully!');
                                if (result.form_id) {
                                    document.getElementById('bsc_form_id').value = result.form_id;
                                }
                            } else {
                                showToastBSC('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastBSC('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });
                    });
                }

                function showToastBSC(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position:fixed; top:20px; right:20px; z-index:9999;
                        padding:12px 24px; border-radius:6px; color:#fff; font-size:14px;
                        box-shadow:0 4px 12px rgba(0,0,0,0.15);
                        background:${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initBscForm);
                } else {
                    initBscForm();
                }
            })();
        </script>

    </x-formTemplete>


    <x-formTemplete id="TDPL/BE-FOM-007" docNo="TDPL/BE-FOM-007" docName="Hot Air Oven Temperature Monitoring Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('newforms.be.forms.submit') }}">

        <!-- Header Section -->
        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Month / Year:</strong>
                <input type="month" name="hao_month_year" id="hao_month_year"
                    style="border:1px solid #000; padding:5px; width:180px;"
                    onchange="loadHotAirOven()">
            </div>
            <div>
                <strong>Instrument ID / No.:</strong>
                <input type="text" name="hao_instrument_id" id="hao_instrument_id" list="haoEquipList"
                    style="border:1px solid #000; padding:5px; width:200px;" placeholder="All"
                    onchange="loadHotAirOven()" onblur="loadHotAirOven()">
                <datalist id="haoEquipList">
                    <option value="HAO-001">
                    <option value="HAO-002">
                    <option value="HAO-003">
                </datalist>
            </div>
            <button type="button" onclick="clearHotAirOven()"
                style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <input type="hidden" name="hao_form_id" id="hao_form_id">

        <!-- Table -->
        <table style="width:100%; border-collapse:collapse;" border="1">
            <tbody>
                <tr>
                    <th style="border:1px solid #000; padding:4px; text-align:center;" rowspan="2">Date</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;" colspan="2">Morning</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;" colspan="2">Evening</th>
                </tr>
                <tr>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Temperature (&deg;C)</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Signature</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Temperature (&deg;C)</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Signature</th>
                </tr>

                @for ($day = 1; $day <= 31; $day++)
                    <tr>
                        <td style="border:1px solid #000; padding:4px; text-align:center;"><strong>{{ $day }}</strong></td>
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" id="hao_morning_temp_{{ $day }}" name="hao_morning_temp[{{ $day }}]"
                                style="width:100%; padding:4px; border:1px solid #999; border-radius:4px;">
                        </td>
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" id="hao_morning_sign_{{ $day }}" name="hao_morning_sign[{{ $day }}]"
                                style="width:100%; padding:4px; border:1px solid #999; border-radius:4px;">
                        </td>
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" id="hao_evening_temp_{{ $day }}" name="hao_evening_temp[{{ $day }}]"
                                style="width:100%; padding:4px; border:1px solid #999; border-radius:4px;">
                        </td>
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" id="hao_evening_sign_{{ $day }}" name="hao_evening_sign[{{ $day }}]"
                                style="width:100%; padding:4px; border:1px solid #999; border-radius:4px;">
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>

        <p><strong>Acceptable Temperature:</strong> +10&deg;C to +25&deg;C</p>

        <script>
            function loadHotAirOven() {
                const monthYear = document.getElementById('hao_month_year').value;
                const instrument = document.getElementById('hao_instrument_id').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('hao_month_year', monthYear);
                if (instrument) params.append('hao_instrument_id', instrument);

                fetch(`/newforms/be/hot-air-oven/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    clearHotAirOvenInputs();

                    if (!res.data) {
                        document.getElementById('hao_form_id').value = '';
                        return;
                    }

                    document.getElementById('hao_form_id').value = res.data.id;

                    const fields = ['hao_morning_temp', 'hao_morning_sign', 'hao_evening_temp', 'hao_evening_sign'];
                    fields.forEach(field => {
                        if (res.data[field]) {
                            Object.keys(res.data[field]).forEach(day => {
                                const el = document.getElementById(`${field}_${day}`);
                                if (el) el.value = res.data[field][day];
                            });
                        }
                    });
                })
                .catch(err => console.error('Load error:', err));
            }

            function clearHotAirOvenInputs() {
                const fields = ['hao_morning_temp', 'hao_morning_sign', 'hao_evening_temp', 'hao_evening_sign'];
                for (let d = 1; d <= 31; d++) {
                    fields.forEach(field => {
                        const el = document.getElementById(`${field}_${d}`);
                        if (el) el.value = '';
                    });
                }
                document.getElementById('hao_form_id').value = '';
            }

            function clearHotAirOven() {
                document.getElementById('hao_month_year').value = '';
                document.getElementById('hao_instrument_id').value = '';
                clearHotAirOvenInputs();
            }

            // AJAX Submit for Hot Air Oven
            (function() {
                function initHotAirOvenForm() {
                    const formContainer = document.querySelector('[id="TDPL/BE-FOM-007"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastHAO('success', result.message || 'Saved successfully!');
                                if (result.form_id) {
                                    document.getElementById('hao_form_id').value = result.form_id;
                                }
                            } else {
                                showToastHAO('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastHAO('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });
                    });
                }

                function showToastHAO(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position:fixed; top:20px; right:20px; z-index:9999;
                        padding:12px 24px; border-radius:6px; color:#fff; font-size:14px;
                        box-shadow:0 4px 12px rgba(0,0,0,0.15);
                        background:${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initHotAirOvenForm);
                } else {
                    initHotAirOvenForm();
                }
            })();
        </script>

    </x-formTemplete>


    <x-formTemplete id="TDPL/BE-FOM-008" docNo="TDPL/BE-FOM-008" docName="Incubator Temperature Monitoring Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('newforms.be.forms.submit') }}">

        <!-- Header Section -->
        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Month / Year:</strong>
                <input type="month" name="inc_month_year" id="inc_month_year"
                    style="border:1px solid #000; padding:5px; width:180px;"
                    onchange="loadIncubator()">
            </div>
            <div>
                <strong>Instrument ID / No.:</strong>
                <input type="text" name="inc_instrument_id" id="inc_instrument_id" list="incEquipList"
                    style="border:1px solid #000; padding:5px; width:200px;" placeholder="All"
                    onchange="loadIncubator()" onblur="loadIncubator()">
                <datalist id="incEquipList">
                    <option value="INC-001">
                    <option value="INC-002">
                    <option value="INC-003">
                </datalist>
            </div>
            <button type="button" onclick="clearIncubator()"
                style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <input type="hidden" name="inc_form_id" id="inc_form_id">

        <!-- Table -->
        <table style="width:100%; border-collapse:collapse;" border="1">
            <tbody>
                <tr>
                    <th style="border:1px solid #000; padding:4px; text-align:center;" rowspan="2">Date</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;" colspan="2">Morning</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;" colspan="2">Evening</th>
                </tr>
                <tr>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Temperature (&deg;C)</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Signature</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Temperature (&deg;C)</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Signature</th>
                </tr>

                @for ($day = 1; $day <= 31; $day++)
                    <tr>
                        <td style="border:1px solid #000; padding:4px; text-align:center;"><strong>{{ $day }}</strong></td>
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" id="inc_morning_temp_{{ $day }}" name="inc_morning_temp[{{ $day }}]"
                                style="width:100%; padding:4px; border:1px solid #999; border-radius:4px;">
                        </td>
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" id="inc_morning_sign_{{ $day }}" name="inc_morning_sign[{{ $day }}]"
                                style="width:100%; padding:4px; border:1px solid #999; border-radius:4px;">
                        </td>
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" id="inc_evening_temp_{{ $day }}" name="inc_evening_temp[{{ $day }}]"
                                style="width:100%; padding:4px; border:1px solid #999; border-radius:4px;">
                        </td>
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" id="inc_evening_sign_{{ $day }}" name="inc_evening_sign[{{ $day }}]"
                                style="width:100%; padding:4px; border:1px solid #999; border-radius:4px;">
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>

        <p><strong>Acceptable Temperature:</strong> ~37&deg;C</p>

        <script>
            function loadIncubator() {
                const monthYear = document.getElementById('inc_month_year').value;
                const instrument = document.getElementById('inc_instrument_id').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('inc_month_year', monthYear);
                if (instrument) params.append('inc_instrument_id', instrument);

                fetch(`/newforms/be/incubator/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    clearIncubatorInputs();

                    if (!res.data) {
                        document.getElementById('inc_form_id').value = '';
                        return;
                    }

                    document.getElementById('inc_form_id').value = res.data.id;

                    const fields = ['inc_morning_temp', 'inc_morning_sign', 'inc_evening_temp', 'inc_evening_sign'];
                    fields.forEach(field => {
                        if (res.data[field]) {
                            Object.keys(res.data[field]).forEach(day => {
                                const el = document.getElementById(`${field}_${day}`);
                                if (el) el.value = res.data[field][day];
                            });
                        }
                    });
                })
                .catch(err => console.error('Load error:', err));
            }

            function clearIncubatorInputs() {
                const fields = ['inc_morning_temp', 'inc_morning_sign', 'inc_evening_temp', 'inc_evening_sign'];
                for (let d = 1; d <= 31; d++) {
                    fields.forEach(field => {
                        const el = document.getElementById(`${field}_${d}`);
                        if (el) el.value = '';
                    });
                }
                document.getElementById('inc_form_id').value = '';
            }

            function clearIncubator() {
                document.getElementById('inc_month_year').value = '';
                document.getElementById('inc_instrument_id').value = '';
                clearIncubatorInputs();
            }

            // AJAX Submit for Incubator
            (function() {
                function initIncubatorForm() {
                    const formContainer = document.querySelector('[id="TDPL/BE-FOM-008"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastINC('success', result.message || 'Saved successfully!');
                                if (result.form_id) {
                                    document.getElementById('inc_form_id').value = result.form_id;
                                }
                            } else {
                                showToastINC('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastINC('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });
                    });
                }

                function showToastINC(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position:fixed; top:20px; right:20px; z-index:9999;
                        padding:12px 24px; border-radius:6px; color:#fff; font-size:14px;
                        box-shadow:0 4px 12px rgba(0,0,0,0.15);
                        background:${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initIncubatorForm);
                } else {
                    initIncubatorForm();
                }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete id="TDPL/BE-FOM-009" docNo="TDPL/BE-FOM-009" docName="Laminar Air Flow Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('newforms.be.forms.submit') }}">

        <input type="hidden" name="laf_form_id" id="laf_form_id">

        <!-- Header Section -->
        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Department:</strong>
                <input list="lafDeptList" name="laf_department" id="laf_department"
                    style="border:1px solid #000; padding:5px; width:200px;"
                    placeholder="All" oninput="loadLafForm()">
                <datalist id="lafDeptList">
                    <option value="Biochemistry">
                    <option value="Pathology">
                    <option value="Hematology">
                    <option value="Microbiology">
                </datalist>
            </div>
            <div>
                <strong>Month & Year:</strong>
                <input type="month" name="laf_month_year" id="laf_month_year"
                    style="border:1px solid #000; padding:5px; width:180px;"
                    onchange="loadLafForm()">
            </div>
            <div>
                <strong>Equipment ID:</strong>
                <input list="lafEquipList" name="laf_equipment_id" id="laf_equipment_id"
                    style="border:1px solid #000; padding:5px; width:180px;"
                    placeholder="All" oninput="loadLafForm()">
                <datalist id="lafEquipList">
                    <option value="LAF-001">
                    <option value="LAF-002">
                    <option value="LAF-003">
                </datalist>
            </div>
            <button type="button" onclick="clearLafForm()"
                style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <!-- Table -->
        <table style="width:100%; border-collapse:collapse;" border="1">
            <tbody>
                <tr>
                    <th rowspan="3" style="border:1px solid #000; padding:4px; text-align:center;">Date</th>
                    <th rowspan="3" style="border:1px solid #000; padding:4px; text-align:center;">Clean<br>with 70% IPA</th>
                    <th rowspan="3" style="border:1px solid #000; padding:4px; text-align:center;">UV<br>Light<br>15 mins</th>
                    <th rowspan="3" style="border:1px solid #000; padding:4px; text-align:center;">Manometer Reading<br>(10±1)</th>
                    <th rowspan="3" style="border:1px solid #000; padding:4px; text-align:center;">Done by<br>Sign</th>
                    <th rowspan="3" style="border:1px solid #000; padding:4px; text-align:center;">Availability of<br>1% Hypo</th>
                    <th colspan="4" style="border:1px solid #000; padding:4px; text-align:center;">Weekly Maintenance</th>
                    <th rowspan="3" colspan="2" style="border:1px solid #000; padding:4px; text-align:center;">Checked by<br>Sign</th>
                    <th rowspan="3" style="border:1px solid #000; padding:4px; text-align:center;">Remarks</th>
                </tr>
                <tr>
                    <th rowspan="2" style="border:1px solid #000; padding:4px; text-align:center;">Test for Settle Plate<br>Done Date</th>
                    <th colspan="2" style="border:1px solid #000; padding:4px; text-align:center;">Settle Plate Result<br>(0–5 CFU)</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">UV Efficacy</th>
                </tr>
                <tr>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Yes</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">No</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;"></th>
                </tr>

                @for ($i = 1; $i <= 31; $i++)
                    <tr>
                        <td style="border:1px solid #000; padding:4px; text-align:center;"><strong>{{ $i }}</strong></td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="checkbox" name="laf_clean_ipa[{{ $i }}]"
                                id="laf_clean_ipa_{{ $i }}" value="1">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="checkbox" name="laf_uv_light[{{ $i }}]"
                                id="laf_uv_light_{{ $i }}" value="1">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="laf_manometer[{{ $i }}]"
                                id="laf_manometer_{{ $i }}"
                                style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="laf_done_by[{{ $i }}]"
                                id="laf_done_by_{{ $i }}"
                                style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <select name="laf_hypo_available[{{ $i }}]"
                                id="laf_hypo_available_{{ $i }}"
                                style="padding:4px; border:1px solid #aaa; border-radius:4px;">
                                <option value="">Select</option>
                                <option value="Available">Available</option>
                                <option value="Not Available">Not Available</option>
                            </select>
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="date" name="laf_settle_plate_date[{{ $i }}]"
                                id="laf_settle_plate_date_{{ $i }}"
                                style="padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="radio" name="laf_settle_result[{{ $i }}]"
                                id="laf_settle_yes_{{ $i }}" value="yes">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="radio" name="laf_settle_result[{{ $i }}]"
                                id="laf_settle_no_{{ $i }}" value="no">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <select name="laf_uv_efficacy[{{ $i }}]"
                                id="laf_uv_efficacy_{{ $i }}"
                                style="padding:4px; border:1px solid #aaa; border-radius:4px;">
                                <option value="">Select</option>
                                <option value="OK">OK</option>
                                <option value="Not OK">Not OK</option>
                            </select>
                        </td>

                        <td colspan="2" style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="laf_checked_by[{{ $i }}]"
                                id="laf_checked_by_{{ $i }}"
                                style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="laf_remarks[{{ $i }}]"
                                id="laf_remarks_{{ $i }}"
                                style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>

        <script>
            function loadLafForm() {
                const monthYear = document.getElementById('laf_month_year').value;
                const department = document.getElementById('laf_department').value;
                const equipment = document.getElementById('laf_equipment_id').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('laf_month_year', monthYear);
                if (department) params.append('laf_department', department);
                if (equipment) params.append('laf_equipment_id', equipment);

                fetch(`/newforms/be/laf/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    clearLafInputs();

                    if (!res.data) {
                        document.getElementById('laf_form_id').value = '';
                        return;
                    }

                    document.getElementById('laf_form_id').value = res.data.id;

                    // Checkbox fields
                    const checkboxFields = ['laf_clean_ipa', 'laf_uv_light'];
                    checkboxFields.forEach(field => {
                        if (res.data[field]) {
                            Object.keys(res.data[field]).forEach(day => {
                                const el = document.getElementById(`${field}_${day}`);
                                if (el) el.checked = true;
                            });
                        }
                    });

                    // Text / date / select fields
                    const textFields = ['laf_manometer', 'laf_done_by', 'laf_hypo_available', 'laf_settle_plate_date', 'laf_uv_efficacy', 'laf_checked_by', 'laf_remarks'];
                    textFields.forEach(field => {
                        if (res.data[field]) {
                            Object.keys(res.data[field]).forEach(day => {
                                const el = document.getElementById(`${field}_${day}`);
                                if (el) el.value = res.data[field][day];
                            });
                        }
                    });

                    // Radio fields
                    if (res.data.laf_settle_result) {
                        Object.keys(res.data.laf_settle_result).forEach(day => {
                            const val = res.data.laf_settle_result[day];
                            if (val === 'yes') {
                                const el = document.getElementById(`laf_settle_yes_${day}`);
                                if (el) el.checked = true;
                            } else if (val === 'no') {
                                const el = document.getElementById(`laf_settle_no_${day}`);
                                if (el) el.checked = true;
                            }
                        });
                    }
                })
                .catch(err => console.error('Load error:', err));
            }

            function clearLafInputs() {
                const textFields = ['laf_manometer', 'laf_done_by', 'laf_hypo_available', 'laf_settle_plate_date', 'laf_uv_efficacy', 'laf_checked_by', 'laf_remarks'];
                const checkboxFields = ['laf_clean_ipa', 'laf_uv_light'];

                for (let d = 1; d <= 31; d++) {
                    textFields.forEach(field => {
                        const el = document.getElementById(`${field}_${d}`);
                        if (el) el.value = '';
                    });
                    checkboxFields.forEach(field => {
                        const el = document.getElementById(`${field}_${d}`);
                        if (el) el.checked = false;
                    });
                    // Radio buttons
                    const yesEl = document.getElementById(`laf_settle_yes_${d}`);
                    const noEl = document.getElementById(`laf_settle_no_${d}`);
                    if (yesEl) yesEl.checked = false;
                    if (noEl) noEl.checked = false;
                }
                document.getElementById('laf_form_id').value = '';
            }

            function clearLafForm() {
                document.getElementById('laf_department').value = '';
                document.getElementById('laf_month_year').value = '';
                document.getElementById('laf_equipment_id').value = '';
                clearLafInputs();
            }

            // AJAX Submit
            (function() {
                function initLafForm() {
                    const formContainer = document.querySelector('[id="TDPL/BE-FOM-009"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastLaf('success', result.message || 'Saved successfully!');
                                if (result.form_id) {
                                    document.getElementById('laf_form_id').value = result.form_id;
                                }
                            } else {
                                showToastLaf('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastLaf('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });
                    });
                }

                function showToastLaf(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position:fixed; top:20px; right:20px; z-index:9999;
                        padding:12px 24px; border-radius:6px; color:#fff; font-size:14px;
                        box-shadow:0 4px 12px rgba(0,0,0,0.15);
                        background:${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initLafForm);
                } else {
                    initLafForm();
                }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete id="TDPL/BE/FOM-010" docNo="TDPL/BE/FOM-010" docName="Autoclave Maintenance Form" issueNo="2.0"
        issueDate="01/10/2024" buttonText="Submit" action="{{ route('newforms.be.forms.submit') }}">

        <input type="hidden" name="aut_form_id" id="aut_form_id">

        <!-- Header Section -->
        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Month & Year:</strong>
                <input type="month" name="aut_month_year" id="aut_month_year"
                    style="border:1px solid #000; padding:5px; width:180px;"
                    onchange="loadAutoclave()">
            </div>
            <div>
                <strong>Instrument ID / S. No.:</strong>
                <input list="autEquipList" name="aut_instrument_id" id="aut_instrument_id"
                    style="border:1px solid #000; padding:5px; width:200px;"
                    placeholder="All" oninput="loadAutoclave()">
                <datalist id="autEquipList">
                    <option value="AUTO-001">
                    <option value="AUTO-002">
                    <option value="AUTO-003">
                </datalist>
            </div>
            <button type="button" onclick="clearAutoclaveForm()"
                style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <!-- Table -->
        <table style="width:100%; border-collapse:collapse;" border="1">
            <tbody>
                <tr>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Date</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Cleaning of the Outside</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Chamber Water Change</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Cleaning of the Inside</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Check Power ON with Light</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Lab Staff Signature</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Lab Supervisor Signature</th>
                </tr>

                @for ($i = 1; $i <= 31; $i++)
                    <tr>
                        <td style="border:1px solid #000; padding:4px; text-align:center;"><strong>{{ $i }}</strong></td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="checkbox" name="aut_clean_outside[{{ $i }}]"
                                id="aut_clean_outside_{{ $i }}" value="1">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="checkbox" name="aut_chamber_water[{{ $i }}]"
                                id="aut_chamber_water_{{ $i }}" value="1">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="checkbox" name="aut_clean_inside[{{ $i }}]"
                                id="aut_clean_inside_{{ $i }}" value="1">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="checkbox" name="aut_power_check[{{ $i }}]"
                                id="aut_power_check_{{ $i }}" value="1">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="aut_lab_staff_sign[{{ $i }}]"
                                id="aut_lab_staff_sign_{{ $i }}"
                                style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="aut_lab_supervisor_sign[{{ $i }}]"
                                id="aut_lab_supervisor_sign_{{ $i }}"
                                style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>

        <script>
            function loadAutoclave() {
                const monthYear = document.getElementById('aut_month_year').value;
                const instrument = document.getElementById('aut_instrument_id').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('aut_month_year', monthYear);
                if (instrument) params.append('aut_instrument_id', instrument);

                fetch(`/newforms/be/autoclave/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    clearAutoclaveInputs();

                    if (!res.data) {
                        document.getElementById('aut_form_id').value = '';
                        return;
                    }

                    document.getElementById('aut_form_id').value = res.data.id;

                    // Checkbox fields
                    const checkboxFields = ['aut_clean_outside', 'aut_chamber_water', 'aut_clean_inside', 'aut_power_check'];
                    checkboxFields.forEach(field => {
                        if (res.data[field]) {
                            Object.keys(res.data[field]).forEach(day => {
                                const el = document.getElementById(`${field}_${day}`);
                                if (el) el.checked = true;
                            });
                        }
                    });

                    // Text fields
                    const textFields = ['aut_lab_staff_sign', 'aut_lab_supervisor_sign'];
                    textFields.forEach(field => {
                        if (res.data[field]) {
                            Object.keys(res.data[field]).forEach(day => {
                                const el = document.getElementById(`${field}_${day}`);
                                if (el) el.value = res.data[field][day];
                            });
                        }
                    });
                })
                .catch(err => console.error('Load error:', err));
            }

            function clearAutoclaveInputs() {
                const textFields = ['aut_lab_staff_sign', 'aut_lab_supervisor_sign'];
                const checkboxFields = ['aut_clean_outside', 'aut_chamber_water', 'aut_clean_inside', 'aut_power_check'];

                for (let d = 1; d <= 31; d++) {
                    textFields.forEach(field => {
                        const el = document.getElementById(`${field}_${d}`);
                        if (el) el.value = '';
                    });
                    checkboxFields.forEach(field => {
                        const el = document.getElementById(`${field}_${d}`);
                        if (el) el.checked = false;
                    });
                }
                document.getElementById('aut_form_id').value = '';
            }

            function clearAutoclaveForm() {
                document.getElementById('aut_month_year').value = '';
                document.getElementById('aut_instrument_id').value = '';
                clearAutoclaveInputs();
            }

            // AJAX Submit
            (function() {
                function initAutoclaveForm() {
                    const formContainer = document.querySelector('[id="TDPL/BE/FOM-010"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastAutoclave('success', result.message || 'Saved successfully!');
                                if (result.form_id) {
                                    document.getElementById('aut_form_id').value = result.form_id;
                                }
                            } else {
                                showToastAutoclave('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastAutoclave('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });
                    });
                }

                function showToastAutoclave(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position:fixed; top:20px; right:20px; z-index:9999;
                        padding:12px 24px; border-radius:6px; color:#fff; font-size:14px;
                        box-shadow:0 4px 12px rgba(0,0,0,0.15);
                        background:${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initAutoclaveForm);
                } else {
                    initAutoclaveForm();
                }
            })();
        </script>

    </x-formTemplete>


    <x-formTemplete id="TDPL/BE/FOM-012" docNo="TDPL/BE/FOM-012" docName="Hot Air Oven Maintenance Form" issueNo="2.0"
        issueDate="01/10/2024" buttonText="Submit" action="{{ route('newforms.be.forms.submit') }}">

        <input type="hidden" name="hao_maint_form_id" id="hao_maint_form_id">

        <!-- Header Section -->
        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Month & Year:</strong>
                <input type="month" name="hao_maint_month_year" id="hao_maint_month_year"
                    style="border:1px solid #000; padding:5px; width:180px;"
                    onchange="loadHaoMaintenance()">
            </div>
            <div>
                <strong>Instrument ID / S. No.:</strong>
                <input list="haoMaintEquipList" name="hao_maint_instrument_id" id="hao_maint_instrument_id"
                    style="border:1px solid #000; padding:5px; width:200px;"
                    placeholder="All" oninput="loadHaoMaintenance()">
                <datalist id="haoMaintEquipList">
                    <option value="HAO-001">
                    <option value="HAO-002">
                    <option value="HAO-003">
                </datalist>
            </div>
            <button type="button" onclick="clearHaoMaintForm()"
                style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <!-- Table -->
        <table style="width:100%; border-collapse:collapse;" border="1">
            <tr>
                <th style="border:1px solid #000; padding:4px; text-align:center;">Date</th>
                @for ($i = 1; $i <= 31; $i++)
                    <th style="border:1px solid #000; padding:4px; text-align:center;">{{ $i }}</th>
                @endfor
            </tr>

            <tr>
                <td style="border:1px solid #000; padding:4px;"><strong>Cleaning from Outside</strong></td>
                @for ($i = 1; $i <= 31; $i++)
                    <td style="border:1px solid #000; padding:4px; text-align:center;">
                        <input type="checkbox" name="hao_maint_clean_outside[{{ $i }}]"
                            id="hao_maint_clean_outside_{{ $i }}" value="1">
                    </td>
                @endfor
            </tr>

            <tr>
                <td style="border:1px solid #000; padding:4px;"><strong>Cleaning from Inside with Isopropyl Alcohol</strong></td>
                @for ($i = 1; $i <= 31; $i++)
                    <td style="border:1px solid #000; padding:4px; text-align:center;">
                        <input type="checkbox" name="hao_maint_clean_inside[{{ $i }}]"
                            id="hao_maint_clean_inside_{{ $i }}" value="1">
                    </td>
                @endfor
            </tr>

            <tr>
                <td style="border:1px solid #000; padding:4px;"><strong>Temperature Check</strong></td>
                @for ($i = 1; $i <= 31; $i++)
                    <td style="border:1px solid #000; padding:4px; text-align:center;">
                        <input type="checkbox" name="hao_maint_temperature_check[{{ $i }}]"
                            id="hao_maint_temperature_check_{{ $i }}" value="1">
                    </td>
                @endfor
            </tr>

            <tr>
                <td style="border:1px solid #000; padding:4px;"><strong>Check Power ON with Light</strong></td>
                @for ($i = 1; $i <= 31; $i++)
                    <td style="border:1px solid #000; padding:4px; text-align:center;">
                        <input type="checkbox" name="hao_maint_power_check[{{ $i }}]"
                            id="hao_maint_power_check_{{ $i }}" value="1">
                    </td>
                @endfor
            </tr>

            <tr>
                <td style="border:1px solid #000; padding:4px;"><strong>Lab Staff Signature</strong></td>
                @for ($i = 1; $i <= 31; $i++)
                    <td style="border:1px solid #000; padding:4px; text-align:center;">
                        <input type="text" name="hao_maint_lab_staff_sign[{{ $i }}]"
                            id="hao_maint_lab_staff_sign_{{ $i }}"
                            style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>
                @endfor
            </tr>

            <tr>
                <td style="border:1px solid #000; padding:4px;"><strong>Lab Supervisor Signature</strong></td>
                @for ($i = 1; $i <= 31; $i++)
                    <td style="border:1px solid #000; padding:4px; text-align:center;">
                        <input type="text" name="hao_maint_lab_supervisor_sign[{{ $i }}]"
                            id="hao_maint_lab_supervisor_sign_{{ $i }}"
                            style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>
                @endfor
            </tr>
        </table>

        <script>
            function loadHaoMaintenance() {
                const monthYear = document.getElementById('hao_maint_month_year').value;
                const instrument = document.getElementById('hao_maint_instrument_id').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('hao_maint_month_year', monthYear);
                if (instrument) params.append('hao_maint_instrument_id', instrument);

                fetch(`/newforms/be/hao-maintenance/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    clearHaoMaintInputs();

                    if (!res.data) {
                        document.getElementById('hao_maint_form_id').value = '';
                        return;
                    }

                    document.getElementById('hao_maint_form_id').value = res.data.id;

                    // Checkbox fields
                    const checkboxFields = ['hao_maint_clean_outside', 'hao_maint_clean_inside', 'hao_maint_temperature_check', 'hao_maint_power_check'];
                    checkboxFields.forEach(field => {
                        if (res.data[field]) {
                            Object.keys(res.data[field]).forEach(day => {
                                const el = document.getElementById(`${field}_${day}`);
                                if (el) el.checked = true;
                            });
                        }
                    });

                    // Text fields
                    const textFields = ['hao_maint_lab_staff_sign', 'hao_maint_lab_supervisor_sign'];
                    textFields.forEach(field => {
                        if (res.data[field]) {
                            Object.keys(res.data[field]).forEach(day => {
                                const el = document.getElementById(`${field}_${day}`);
                                if (el) el.value = res.data[field][day];
                            });
                        }
                    });
                })
                .catch(err => console.error('Load error:', err));
            }

            function clearHaoMaintInputs() {
                const checkboxFields = ['hao_maint_clean_outside', 'hao_maint_clean_inside', 'hao_maint_temperature_check', 'hao_maint_power_check'];
                const textFields = ['hao_maint_lab_staff_sign', 'hao_maint_lab_supervisor_sign'];

                for (let d = 1; d <= 31; d++) {
                    checkboxFields.forEach(field => {
                        const el = document.getElementById(`${field}_${d}`);
                        if (el) el.checked = false;
                    });
                    textFields.forEach(field => {
                        const el = document.getElementById(`${field}_${d}`);
                        if (el) el.value = '';
                    });
                }
                document.getElementById('hao_maint_form_id').value = '';
            }

            function clearHaoMaintForm() {
                document.getElementById('hao_maint_month_year').value = '';
                document.getElementById('hao_maint_instrument_id').value = '';
                clearHaoMaintInputs();
            }

            // AJAX Submit
            (function() {
                function initHaoMaintForm() {
                    const formContainer = document.querySelector('[id="TDPL/BE/FOM-012"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastHaoMaint('success', result.message || 'Saved successfully!');
                                if (result.form_id) {
                                    document.getElementById('hao_maint_form_id').value = result.form_id;
                                }
                            } else {
                                showToastHaoMaint('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastHaoMaint('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });
                    });
                }

                function showToastHaoMaint(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position:fixed; top:20px; right:20px; z-index:9999;
                        padding:12px 24px; border-radius:6px; color:#fff; font-size:14px;
                        box-shadow:0 4px 12px rgba(0,0,0,0.15);
                        background:${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initHaoMaintForm);
                } else {
                    initHaoMaintForm();
                }
            })();
        </script>

    </x-formTemplete>


    <x-formTemplete id="TDPL/BE/FOM-013" docNo="TDPL/BE/FOM-013" docName="Incubator Maintenance Form" issueNo="2.0"
        issueDate="01/10/2024" buttonText="Submit" action="{{ route('newforms.be.forms.submit') }}">

        <input type="hidden" name="inc_maint_form_id" id="inc_maint_form_id">

        <!-- Header Section -->
        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Month & Year:</strong>
                <input type="month" name="inc_maint_month_year" id="inc_maint_month_year"
                    style="border:1px solid #000; padding:5px; width:180px;"
                    onchange="loadIncubatorMaintenance()">
            </div>
            <div>
                <strong>Instrument S. No.:</strong>
                <input list="incMaintEquipList" name="inc_maint_instrument_id" id="inc_maint_instrument_id"
                    style="border:1px solid #000; padding:5px; width:200px;"
                    placeholder="All" oninput="loadIncubatorMaintenance()">
                <datalist id="incMaintEquipList">
                    <option value="INC-001">
                    <option value="INC-002">
                    <option value="INC-003">
                </datalist>
            </div>
            <button type="button" onclick="clearIncMaintForm()"
                style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <!-- Table -->
        <table style="width:100%; border-collapse:collapse;" border="1">
            <tbody>
                <tr>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Date</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Cleaning of the Outside</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Cleaning of the Inside</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Temperature Check</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Check Power On with Light</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Lab Staff Signature</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Lab Supervisor Signature</th>
                </tr>

                @for ($i = 1; $i <= 31; $i++)
                    <tr>
                        <td style="border:1px solid #000; padding:4px; text-align:center;"><strong>{{ $i }}</strong></td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="inc_maint_clean_outside[{{ $i }}]"
                                id="inc_maint_clean_outside_{{ $i }}"
                                style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="inc_maint_clean_inside[{{ $i }}]"
                                id="inc_maint_clean_inside_{{ $i }}"
                                style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="inc_maint_temperature_check[{{ $i }}]"
                                id="inc_maint_temperature_check_{{ $i }}"
                                style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="inc_maint_power_check[{{ $i }}]"
                                id="inc_maint_power_check_{{ $i }}"
                                style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="inc_maint_lab_staff_sign[{{ $i }}]"
                                id="inc_maint_lab_staff_sign_{{ $i }}"
                                style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="inc_maint_lab_supervisor_sign[{{ $i }}]"
                                id="inc_maint_lab_supervisor_sign_{{ $i }}"
                                style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>

        <script>
            function loadIncubatorMaintenance() {
                const monthYear = document.getElementById('inc_maint_month_year').value;
                const instrument = document.getElementById('inc_maint_instrument_id').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('inc_maint_month_year', monthYear);
                if (instrument) params.append('inc_maint_instrument_id', instrument);

                fetch(`/newforms/be/incubator-maintenance/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    clearIncMaintInputs();

                    if (!res.data) {
                        document.getElementById('inc_maint_form_id').value = '';
                        return;
                    }

                    document.getElementById('inc_maint_form_id').value = res.data.id;

                    const fields = ['inc_maint_clean_outside', 'inc_maint_clean_inside', 'inc_maint_temperature_check', 'inc_maint_power_check', 'inc_maint_lab_staff_sign', 'inc_maint_lab_supervisor_sign'];
                    fields.forEach(field => {
                        if (res.data[field]) {
                            Object.keys(res.data[field]).forEach(day => {
                                const el = document.getElementById(`${field}_${day}`);
                                if (el) el.value = res.data[field][day];
                            });
                        }
                    });
                })
                .catch(err => console.error('Load error:', err));
            }

            function clearIncMaintInputs() {
                const fields = ['inc_maint_clean_outside', 'inc_maint_clean_inside', 'inc_maint_temperature_check', 'inc_maint_power_check', 'inc_maint_lab_staff_sign', 'inc_maint_lab_supervisor_sign'];
                for (let d = 1; d <= 31; d++) {
                    fields.forEach(field => {
                        const el = document.getElementById(`${field}_${d}`);
                        if (el) el.value = '';
                    });
                }
                document.getElementById('inc_maint_form_id').value = '';
            }

            function clearIncMaintForm() {
                document.getElementById('inc_maint_month_year').value = '';
                document.getElementById('inc_maint_instrument_id').value = '';
                clearIncMaintInputs();
            }

            // AJAX Submit
            (function() {
                function initIncMaintForm() {
                    const formContainer = document.querySelector('[id="TDPL/BE/FOM-013"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastIncMaint('success', result.message || 'Saved successfully!');
                                if (result.form_id) {
                                    document.getElementById('inc_maint_form_id').value = result.form_id;
                                }
                            } else {
                                showToastIncMaint('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastIncMaint('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });
                    });
                }

                function showToastIncMaint(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position:fixed; top:20px; right:20px; z-index:9999;
                        padding:12px 24px; border-radius:6px; color:#fff; font-size:14px;
                        box-shadow:0 4px 12px rgba(0,0,0,0.15);
                        background:${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initIncMaintForm);
                } else {
                    initIncMaintForm();
                }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete id="TDPL/BE/FOM-014" docNo="TDPL/BE/FOM-014" docName="Centrifuge Maintenance Form" issueNo="2.0"
        issueDate="01/10/2024" buttonText="Submit" action="{{ route('newforms.be.forms.submit') }}">

        <input type="hidden" name="cen_form_id" id="cen_form_id">

        <!-- Header Section -->
        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Month & Year:</strong>
                <input type="month" name="cen_month_year" id="cen_month_year"
                    style="border:1px solid #000; padding:5px; width:180px;"
                    onchange="loadCentrifuge()">
            </div>
            <div>
                <strong>Instrument S. No.:</strong>
                <input list="cenEquipList" name="cen_instrument_id" id="cen_instrument_id"
                    style="border:1px solid #000; padding:5px; width:200px;"
                    placeholder="All" oninput="loadCentrifuge()">
                <datalist id="cenEquipList">
                    <option value="CEN-001">
                    <option value="CEN-002">
                    <option value="CEN-003">
                </datalist>
            </div>
            <button type="button" onclick="clearCenForm()"
                style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <!-- Table -->
        <table style="width:100%; border-collapse:collapse;" border="1">
            <tbody>

                <!-- DATE HEADER -->
                <tr>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Date</th>
                    @for ($d = 1; $d <= 31; $d++)
                        @if (in_array($d, [8, 16, 24]))
                            <th colspan="2" style="border:1px solid #000; padding:4px; text-align:center;">{{ $d }}</th>
                        @else
                            <th style="border:1px solid #000; padding:4px; text-align:center;">{{ $d }}</th>
                        @endif
                    @endfor
                </tr>

                <tr>
                    <td colspan="35" style="border:1px solid #000; padding:4px; text-align:center;"><strong>Daily Maintenance</strong></td>
                </tr>

                @php
                    $cenDailyRows = [
                        'Cleaning from outside' => 'clean_outside',
                        'Cleaning from Inside' => 'clean_inside',
                        'Check Power Cord & Switch' => 'power_check',
                        'Check Carbon Brush' => 'carbon_brush',
                        'Lab Staff Signature' => 'lab_staff_sign',
                        'Lab Supervisor Signature' => 'lab_supervisor_sign',
                    ];
                @endphp

                @foreach ($cenDailyRows as $label => $key)
                    <tr>
                        <td style="border:1px solid #000; padding:4px;"><strong>{{ $label }}</strong></td>

                        @for ($d = 1; $d <= 31; $d++)
                            @if (in_array($d, [8, 16, 24]))
                                <td colspan="2" style="border:1px solid #000; padding:4px; text-align:center;">
                                    <input type="text"
                                        name="cen_{{ $key }}[{{ $d }}]"
                                        id="cen_{{ $key }}_{{ $d }}"
                                        style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                                </td>
                            @else
                                <td style="border:1px solid #000; padding:4px; text-align:center;">
                                    <input type="text"
                                        name="cen_{{ $key }}[{{ $d }}]"
                                        id="cen_{{ $key }}_{{ $d }}"
                                        style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                                </td>
                            @endif
                        @endfor
                    </tr>
                @endforeach

                <tr>
                    <td colspan="35" style="border:1px solid #000; padding:4px; text-align:center;"><strong>Weekly Maintenance</strong></td>
                </tr>

                <tr>
                    <td style="border:1px solid #000; padding:4px;"><strong>Clean Tube holders with 1% Sodium Hypochlorite</strong></td>
                    <td colspan="8" style="border:1px solid #000; padding:4px; text-align:center;">
                        <input type="text" name="cen_week1_date" id="cen_week1_date"
                            style="width:90%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>
                    <td colspan="9" style="border:1px solid #000; padding:4px; text-align:center;">
                        <input type="text" name="cen_week2_date" id="cen_week2_date"
                            style="width:90%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>
                    <td colspan="9" style="border:1px solid #000; padding:4px; text-align:center;">
                        <input type="text" name="cen_week3_date" id="cen_week3_date"
                            style="width:90%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>
                    <td colspan="8" style="border:1px solid #000; padding:4px; text-align:center;">
                        <input type="text" name="cen_week4_date" id="cen_week4_date"
                            style="width:90%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>
                </tr>

                <tr>
                    <td style="border:1px solid #000; padding:4px;"><strong>Lab Staff Signature</strong></td>
                    <td colspan="8" style="border:1px solid #000; padding:4px; text-align:center;">
                        <input type="text" name="cen_week1_staff" id="cen_week1_staff"
                            style="width:90%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>
                    <td colspan="9" style="border:1px solid #000; padding:4px; text-align:center;">
                        <input type="text" name="cen_week2_staff" id="cen_week2_staff"
                            style="width:90%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>
                    <td colspan="9" style="border:1px solid #000; padding:4px; text-align:center;">
                        <input type="text" name="cen_week3_staff" id="cen_week3_staff"
                            style="width:90%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>
                    <td colspan="8" style="border:1px solid #000; padding:4px; text-align:center;">
                        <input type="text" name="cen_week4_staff" id="cen_week4_staff"
                            style="width:90%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>
                </tr>

                <tr>
                    <td style="border:1px solid #000; padding:4px;"><strong>Lab Supervisor Signature</strong></td>
                    <td colspan="8" style="border:1px solid #000; padding:4px; text-align:center;">
                        <input type="text" name="cen_week1_supervisor" id="cen_week1_supervisor"
                            style="width:90%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>
                    <td colspan="9" style="border:1px solid #000; padding:4px; text-align:center;">
                        <input type="text" name="cen_week2_supervisor" id="cen_week2_supervisor"
                            style="width:90%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>
                    <td colspan="9" style="border:1px solid #000; padding:4px; text-align:center;">
                        <input type="text" name="cen_week3_supervisor" id="cen_week3_supervisor"
                            style="width:90%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>
                    <td colspan="8" style="border:1px solid #000; padding:4px; text-align:center;">
                        <input type="text" name="cen_week4_supervisor" id="cen_week4_supervisor"
                            style="width:90%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>
                </tr>

            </tbody>
        </table>

        <script>
            function loadCentrifuge() {
                const monthYear = document.getElementById('cen_month_year').value;
                const instrument = document.getElementById('cen_instrument_id').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('cen_month_year', monthYear);
                if (instrument) params.append('cen_instrument_id', instrument);

                fetch(`/newforms/be/centrifuge/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    clearCenInputs();

                    if (!res.data) {
                        document.getElementById('cen_form_id').value = '';
                        return;
                    }

                    document.getElementById('cen_form_id').value = res.data.id;

                    // Daily fields (array by day)
                    const dailyFields = ['cen_clean_outside', 'cen_clean_inside', 'cen_power_check', 'cen_carbon_brush', 'cen_lab_staff_sign', 'cen_lab_supervisor_sign'];
                    dailyFields.forEach(field => {
                        if (res.data[field]) {
                            Object.keys(res.data[field]).forEach(day => {
                                const el = document.getElementById(`${field}_${day}`);
                                if (el) el.value = res.data[field][day];
                            });
                        }
                    });

                    // Weekly fields (scalar values)
                    const weeklyFields = [
                        'cen_week1_date', 'cen_week2_date', 'cen_week3_date', 'cen_week4_date',
                        'cen_week1_staff', 'cen_week2_staff', 'cen_week3_staff', 'cen_week4_staff',
                        'cen_week1_supervisor', 'cen_week2_supervisor', 'cen_week3_supervisor', 'cen_week4_supervisor'
                    ];
                    weeklyFields.forEach(field => {
                        const el = document.getElementById(field);
                        if (el) el.value = res.data[field] ?? '';
                    });
                })
                .catch(err => console.error('Load error:', err));
            }

            function clearCenInputs() {
                // Daily fields
                const dailyFields = ['cen_clean_outside', 'cen_clean_inside', 'cen_power_check', 'cen_carbon_brush', 'cen_lab_staff_sign', 'cen_lab_supervisor_sign'];
                for (let d = 1; d <= 31; d++) {
                    dailyFields.forEach(field => {
                        const el = document.getElementById(`${field}_${d}`);
                        if (el) el.value = '';
                    });
                }

                // Weekly fields
                const weeklyFields = [
                    'cen_week1_date', 'cen_week2_date', 'cen_week3_date', 'cen_week4_date',
                    'cen_week1_staff', 'cen_week2_staff', 'cen_week3_staff', 'cen_week4_staff',
                    'cen_week1_supervisor', 'cen_week2_supervisor', 'cen_week3_supervisor', 'cen_week4_supervisor'
                ];
                weeklyFields.forEach(field => {
                    const el = document.getElementById(field);
                    if (el) el.value = '';
                });

                document.getElementById('cen_form_id').value = '';
            }

            function clearCenForm() {
                document.getElementById('cen_month_year').value = '';
                document.getElementById('cen_instrument_id').value = '';
                clearCenInputs();
            }

            // AJAX Submit
            (function() {
                function initCenForm() {
                    const formContainer = document.querySelector('[id="TDPL/BE/FOM-014"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastCen('success', result.message || 'Saved successfully!');
                                if (result.form_id) {
                                    document.getElementById('cen_form_id').value = result.form_id;
                                }
                            } else {
                                showToastCen('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastCen('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });
                    });
                }

                function showToastCen(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position:fixed; top:20px; right:20px; z-index:9999;
                        padding:12px 24px; border-radius:6px; color:#fff; font-size:14px;
                        box-shadow:0 4px 12px rgba(0,0,0,0.15);
                        background:${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initCenForm);
                } else {
                    initCenForm();
                }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete id="TDPL/BE/FOM-015" docNo="TDPL/BE/FOM-015" docName="Beckman Coulter DXC700AU Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('newforms.be.forms.submit') }}">

        <input type="hidden" name="dxc_form_id" id="dxc_form_id">

        <!-- Header Section -->
        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Month/Year:</strong>
                <input type="month" name="dxc_month_year" id="dxc_month_year"
                    style="border:1px solid #000; padding:5px; width:180px;"
                    onchange="loadDxcForm()">
            </div>
            <div>
                <strong>Location:</strong>
                <input list="dxcLocationList" name="dxc_location" id="dxc_location"
                    style="border:1px solid #000; padding:5px; width:200px;"
                    placeholder="All" oninput="loadDxcForm()">
                <datalist id="dxcLocationList">
                    <option value="Hyderabad">
                    <option value="Bangalore">
                    <option value="Chennai">
                    <option value="Mumbai">
                </datalist>
            </div>
            <div>
                <strong>Department:</strong>
                <input list="dxcDeptList" name="dxc_department" id="dxc_department"
                    style="border:1px solid #000; padding:5px; width:200px;"
                    placeholder="All" oninput="loadDxcForm()">
                <datalist id="dxcDeptList">
                    <option value="Biochemistry">
                    <option value="Pathology">
                    <option value="Hematology">
                    <option value="Microbiology">
                </datalist>
            </div>
            <button type="button" onclick="clearDxcForm()"
                style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <!-- Table -->
        <table style="width:100%; border-collapse:collapse;" border="1">
            <tbody>

                <!-- DATE HEADER -->
                <tr>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Date</th>
                    @for ($i = 1; $i <= 31; $i++)
                        @if ($i == 9 || $i == 17 || $i == 24)
                            <th colspan="2" style="border:1px solid #000; padding:4px; text-align:center;">{{ $i }}</th>
                        @else
                            <th style="border:1px solid #000; padding:4px; text-align:center;">{{ $i }}</th>
                        @endif
                    @endfor
                </tr>

                <!-- Daily Maintenance Header -->
                <tr>
                    <td colspan="35" style="border:1px solid #000; padding:4px; text-align:center;"><strong>Daily Maintenance</strong></td>
                </tr>

                @php
                    $dxcDailyRows = [
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

                @foreach ($dxcDailyRows as $label => $key)
                    <tr>
                        <td style="border:1px solid #000; padding:4px;"><strong>{{ $label }}</strong></td>

                        @for ($i = 1; $i <= 31; $i++)
                            @if ($i == 9 || $i == 17 || $i == 24)
                                <td colspan="2" style="border:1px solid #000; padding:4px; text-align:center;">
                                    <input type="text"
                                        name="dxc_{{ $key }}[{{ $i }}]"
                                        id="dxc_{{ $key }}_{{ $i }}"
                                        style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                                </td>
                            @else
                                <td style="border:1px solid #000; padding:4px; text-align:center;">
                                    <input type="text"
                                        name="dxc_{{ $key }}[{{ $i }}]"
                                        id="dxc_{{ $key }}_{{ $i }}"
                                        style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                                </td>
                            @endif
                        @endfor
                    </tr>
                @endforeach

                <!-- Weekly Header -->
                <tr>
                    <td style="border:1px solid #000; padding:4px;"><strong>Weekly Maintenance</strong></td>

                    <td colspan="9" style="border:1px solid #000; padding:4px; text-align:center;">
                        <strong>1st Week – Date:</strong>
                        <input type="text" name="dxc_week_date[1]" id="dxc_week_date_1"
                            style="width:80px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>

                    <td colspan="9" style="border:1px solid #000; padding:4px; text-align:center;">
                        <strong>2nd Week – Date:</strong>
                        <input type="text" name="dxc_week_date[2]" id="dxc_week_date_2"
                            style="width:80px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>

                    <td colspan="8" style="border:1px solid #000; padding:4px; text-align:center;">
                        <strong>3rd Week – Date:</strong>
                        <input type="text" name="dxc_week_date[3]" id="dxc_week_date_3"
                            style="width:80px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>

                    <td colspan="8" style="border:1px solid #000; padding:4px; text-align:center;">
                        <strong>4th Week – Date:</strong>
                        <input type="text" name="dxc_week_date[4]" id="dxc_week_date_4"
                            style="width:80px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>
                </tr>

                @php
                    $dxcWeeklyRows = [
                        'Clean the Sample Probe and Mix Bars' => 'clean_probe_mix',
                        'Perform a W2' => 'perform_w2',
                        'Performed by Supervisor' => 'performed_supervisor',
                    ];
                @endphp

                @foreach ($dxcWeeklyRows as $label => $key)
                    <tr>
                        <td style="border:1px solid #000; padding:4px;"><strong>{{ $label }}</strong></td>

                        <td colspan="9" style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="dxc_{{ $key }}[1]" id="dxc_{{ $key }}_1"
                                style="width:90%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>

                        <td colspan="9" style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="dxc_{{ $key }}[2]" id="dxc_{{ $key }}_2"
                                style="width:90%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>

                        <td colspan="8" style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="dxc_{{ $key }}[3]" id="dxc_{{ $key }}_3"
                                style="width:90%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>

                        <td colspan="8" style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="dxc_{{ $key }}[4]" id="dxc_{{ $key }}_4"
                                style="width:90%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        <script>
            function loadDxcForm() {
                const monthYear = document.getElementById('dxc_month_year').value;
                const location = document.getElementById('dxc_location').value;
                const department = document.getElementById('dxc_department').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('dxc_month_year', monthYear);
                if (location) params.append('dxc_location', location);
                if (department) params.append('dxc_department', department);

                fetch(`/newforms/be/dxc/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    clearDxcInputs();

                    if (!res.data) {
                        document.getElementById('dxc_form_id').value = '';
                        return;
                    }

                    document.getElementById('dxc_form_id').value = res.data.id;

                    // Daily fields (array by day 1-31)
                    const dailyFields = ['dxc_inspect_syringes', 'dxc_inspect_roller_pump', 'dxc_inspect_probes', 'dxc_replace_diluent', 'dxc_replace_probe_wash', 'dxc_clean_ise', 'dxc_calibrate_ise', 'dxc_performed_by', 'dxc_reviewed_by'];
                    dailyFields.forEach(field => {
                        if (res.data[field]) {
                            Object.keys(res.data[field]).forEach(day => {
                                const el = document.getElementById(`${field}_${day}`);
                                if (el) el.value = res.data[field][day];
                            });
                        }
                    });

                    // Weekly fields (array by week 1-4)
                    const weeklyFields = ['dxc_week_date', 'dxc_clean_probe_mix', 'dxc_perform_w2', 'dxc_performed_supervisor'];
                    weeklyFields.forEach(field => {
                        if (res.data[field]) {
                            Object.keys(res.data[field]).forEach(week => {
                                const el = document.getElementById(`${field}_${week}`);
                                if (el) el.value = res.data[field][week];
                            });
                        }
                    });
                })
                .catch(err => console.error('Load error:', err));
            }

            function clearDxcInputs() {
                // Daily fields
                const dailyFields = ['dxc_inspect_syringes', 'dxc_inspect_roller_pump', 'dxc_inspect_probes', 'dxc_replace_diluent', 'dxc_replace_probe_wash', 'dxc_clean_ise', 'dxc_calibrate_ise', 'dxc_performed_by', 'dxc_reviewed_by'];
                for (let d = 1; d <= 31; d++) {
                    dailyFields.forEach(field => {
                        const el = document.getElementById(`${field}_${d}`);
                        if (el) el.value = '';
                    });
                }

                // Weekly fields
                const weeklyFields = ['dxc_week_date', 'dxc_clean_probe_mix', 'dxc_perform_w2', 'dxc_performed_supervisor'];
                for (let w = 1; w <= 4; w++) {
                    weeklyFields.forEach(field => {
                        const el = document.getElementById(`${field}_${w}`);
                        if (el) el.value = '';
                    });
                }

                document.getElementById('dxc_form_id').value = '';
            }

            function clearDxcForm() {
                document.getElementById('dxc_month_year').value = '';
                document.getElementById('dxc_location').value = '';
                document.getElementById('dxc_department').value = '';
                clearDxcInputs();
            }

            // AJAX Submit
            (function() {
                function initDxcForm() {
                    const formContainer = document.querySelector('[id="TDPL/BE/FOM-015"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastDxc('success', result.message || 'Saved successfully!');
                                if (result.form_id) {
                                    document.getElementById('dxc_form_id').value = result.form_id;
                                }
                            } else {
                                showToastDxc('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastDxc('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });
                    });
                }

                function showToastDxc(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position:fixed; top:20px; right:20px; z-index:9999;
                        padding:12px 24px; border-radius:6px; color:#fff; font-size:14px;
                        box-shadow:0 4px 12px rgba(0,0,0,0.15);
                        background:${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initDxcForm);
                } else {
                    initDxcForm();
                }
            })();
        </script>

    </x-formTemplete>



    <x-formTemplete id="TDPL/BE/FOM-016" docNo="TDPL/BE/FOM-016" docName="Beckman Coulter DxI800 Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('newforms.be.forms.submit') }}">

        <input type="hidden" name="dxi_form_id" id="dxi_form_id">

        <!-- Header Section -->
        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Month / Year:</strong>
                <input type="month" name="dxi_month_year" id="dxi_month_year"
                    style="border:1px solid #000; padding:5px; width:180px;"
                    onchange="loadDxiForm()">
            </div>
            <div>
                <strong>Location:</strong>
                <input list="dxiLocationList" name="dxi_location" id="dxi_location"
                    style="border:1px solid #000; padding:5px; width:200px;"
                    placeholder="All" oninput="loadDxiForm()">
                <datalist id="dxiLocationList">
                    <option value="Hyderabad">
                    <option value="Bangalore">
                    <option value="Chennai">
                    <option value="Mumbai">
                </datalist>
            </div>
            <div>
                <strong>Department:</strong>
                <input list="dxiDeptList" name="dxi_department" id="dxi_department"
                    style="border:1px solid #000; padding:5px; width:200px;"
                    placeholder="All" oninput="loadDxiForm()">
                <datalist id="dxiDeptList">
                    <option value="Biochemistry">
                    <option value="Pathology">
                    <option value="Hematology">
                    <option value="Microbiology">
                </datalist>
            </div>
            <button type="button" onclick="clearDxiForm()"
                style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <!-- Table -->
        <table style="width:100%; border-collapse:collapse;" border="1">

            <!-- Date Row -->
            <tr>
                <th style="border:1px solid #000; padding:4px; text-align:center;">Date</th>
                @for ($d = 1; $d <= 31; $d++)
                    <th style="border:1px solid #000; padding:4px; text-align:center;">{{ $d }}</th>
                @endfor
            </tr>

            <!-- Daily Maintenance Title -->
            <tr>
                <td colspan="32" style="border:1px solid #000; padding:4px; text-align:center;"><strong>DAILY MAINTENANCE</strong></td>
            </tr>

            @php
                $dxiDailyRows = [
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

            @foreach ($dxiDailyRows as $label => $key)
                <tr>
                    <td style="border:1px solid #000; padding:4px;"><strong>{{ $label }}</strong></td>
                    @for ($i = 1; $i <= 31; $i++)
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text"
                                name="dxi_{{ $key }}[{{ $i }}]"
                                id="dxi_{{ $key }}_{{ $i }}"
                                style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>
                    @endfor
                </tr>
            @endforeach

            <!-- Weekly Maintenance Section -->
            <tr>
                <td style="border:1px solid #000; padding:4px;"><strong>WEEKLY MAINTENANCE</strong></td>
                <td colspan="8" style="border:1px solid #000; padding:4px; text-align:center;">
                    <strong>1st Week – Date:</strong>
                    <input type="text" name="dxi_week_date[week1]" id="dxi_week_date_week1"
                        style="width:80px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                </td>
                <td colspan="9" style="border:1px solid #000; padding:4px; text-align:center;">
                    <strong>2nd Week – Date:</strong>
                    <input type="text" name="dxi_week_date[week2]" id="dxi_week_date_week2"
                        style="width:80px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                </td>
                <td colspan="9" style="border:1px solid #000; padding:4px; text-align:center;">
                    <strong>3rd Week – Date:</strong>
                    <input type="text" name="dxi_week_date[week3]" id="dxi_week_date_week3"
                        style="width:80px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                </td>
                <td colspan="8" style="border:1px solid #000; padding:4px; text-align:center;">
                    <strong>4th Week – Date:</strong>
                    <input type="text" name="dxi_week_date[week4]" id="dxi_week_date_week4"
                        style="width:80px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                </td>
            </tr>

            @php
                $dxiWeeklyRows = [
                    'Clean Instrument Exterior' => 'clean_exterior',
                    'Inspect / Clean Primary Probe' => 'clean_primary_probe',
                    'Check Waste Filter Bottle' => 'waste_filter',
                    'Run System Check' => 'system_check',
                    'Performed by Supervisor' => 'supervisor_sign',
                ];
            @endphp

            @foreach ($dxiWeeklyRows as $label => $key)
                <tr>
                    <td style="border:1px solid #000; padding:4px;"><strong>{{ $label }}</strong></td>

                    <td colspan="8" style="border:1px solid #000; padding:4px; text-align:center;">
                        <input type="text" name="dxi_{{ $key }}[week1]"
                            id="dxi_{{ $key }}_week1"
                            style="width:90%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>

                    <td colspan="9" style="border:1px solid #000; padding:4px; text-align:center;">
                        <input type="text" name="dxi_{{ $key }}[week2]"
                            id="dxi_{{ $key }}_week2"
                            style="width:90%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>

                    <td colspan="9" style="border:1px solid #000; padding:4px; text-align:center;">
                        <input type="text" name="dxi_{{ $key }}[week3]"
                            id="dxi_{{ $key }}_week3"
                            style="width:90%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>

                    <td colspan="8" style="border:1px solid #000; padding:4px; text-align:center;">
                        <input type="text" name="dxi_{{ $key }}[week4]"
                            id="dxi_{{ $key }}_week4"
                            style="width:90%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>
                </tr>
            @endforeach

        </table>

        <script>
            function loadDxiForm() {
                const monthYear = document.getElementById('dxi_month_year').value;
                const location = document.getElementById('dxi_location').value;
                const department = document.getElementById('dxi_department').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('dxi_month_year', monthYear);
                if (location) params.append('dxi_location', location);
                if (department) params.append('dxi_department', department);

                fetch(`/newforms/be/dxi800/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    clearDxiInputs();

                    if (!res.data) {
                        document.getElementById('dxi_form_id').value = '';
                        return;
                    }

                    document.getElementById('dxi_form_id').value = res.data.id;

                    // Daily fields (array by day 1-31)
                    const dailyFields = ['dxi_system_backup', 'dxi_zone_temperature', 'dxi_system_supplies', 'dxi_clean_probe', 'dxi_solid_waste', 'dxi_prime_substrate', 'dxi_daily_cleaning', 'dxi_performed_by', 'dxi_reviewed_by'];
                    dailyFields.forEach(field => {
                        if (res.data[field]) {
                            Object.keys(res.data[field]).forEach(day => {
                                const el = document.getElementById(`${field}_${day}`);
                                if (el) el.value = res.data[field][day];
                            });
                        }
                    });

                    // Weekly fields (array by week1-week4)
                    const weeklyFields = ['dxi_week_date', 'dxi_clean_exterior', 'dxi_clean_primary_probe', 'dxi_waste_filter', 'dxi_system_check', 'dxi_supervisor_sign'];
                    const weeks = ['week1', 'week2', 'week3', 'week4'];
                    weeklyFields.forEach(field => {
                        if (res.data[field]) {
                            weeks.forEach(week => {
                                const el = document.getElementById(`${field}_${week}`);
                                if (el && res.data[field][week]) el.value = res.data[field][week];
                            });
                        }
                    });
                })
                .catch(err => console.error('Load error:', err));
            }

            function clearDxiInputs() {
                // Daily fields
                const dailyFields = ['dxi_system_backup', 'dxi_zone_temperature', 'dxi_system_supplies', 'dxi_clean_probe', 'dxi_solid_waste', 'dxi_prime_substrate', 'dxi_daily_cleaning', 'dxi_performed_by', 'dxi_reviewed_by'];
                for (let d = 1; d <= 31; d++) {
                    dailyFields.forEach(field => {
                        const el = document.getElementById(`${field}_${d}`);
                        if (el) el.value = '';
                    });
                }

                // Weekly fields
                const weeklyFields = ['dxi_week_date', 'dxi_clean_exterior', 'dxi_clean_primary_probe', 'dxi_waste_filter', 'dxi_system_check', 'dxi_supervisor_sign'];
                const weeks = ['week1', 'week2', 'week3', 'week4'];
                weeklyFields.forEach(field => {
                    weeks.forEach(week => {
                        const el = document.getElementById(`${field}_${week}`);
                        if (el) el.value = '';
                    });
                });

                document.getElementById('dxi_form_id').value = '';
            }

            function clearDxiForm() {
                document.getElementById('dxi_month_year').value = '';
                document.getElementById('dxi_location').value = '';
                document.getElementById('dxi_department').value = '';
                clearDxiInputs();
            }

            // AJAX Submit
            (function() {
                function initDxiForm() {
                    const formContainer = document.querySelector('[id="TDPL/BE/FOM-016"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastDxi('success', result.message || 'Saved successfully!');
                                if (result.form_id) {
                                    document.getElementById('dxi_form_id').value = result.form_id;
                                }
                            } else {
                                showToastDxi('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastDxi('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });
                    });
                }

                function showToastDxi(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position:fixed; top:20px; right:20px; z-index:9999;
                        padding:12px 24px; border-radius:6px; color:#fff; font-size:14px;
                        box-shadow:0 4px 12px rgba(0,0,0,0.15);
                        background:${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initDxiForm);
                } else {
                    initDxiForm();
                }
            })();
        </script>

    </x-formTemplete>



    <x-formTemplete id="TDPL/BE/FOM-017" docNo="TDPL/BE/FOM-017" docName="Sensa Core aQua ST-200 Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('newforms.be.forms.submit') }}">

        <input type="hidden" name="st200_form_id" id="st200_form_id">

        <!-- Header Section -->
        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Month & Year:</strong>
                <input type="month" name="st200_month_year" id="st200_month_year"
                    style="border:1px solid #000; padding:5px; width:180px;"
                    onchange="loadSt200Form()">
            </div>
            <div>
                <strong>Instrument S. No.:</strong>
                <input list="st200EquipList" name="st200_instrument_id" id="st200_instrument_id"
                    style="border:1px solid #000; padding:5px; width:200px;"
                    placeholder="All" oninput="loadSt200Form()">
                <datalist id="st200EquipList">
                    <option value="ST200-001">
                    <option value="ST200-002">
                    <option value="ST200-003">
                </datalist>
            </div>
            <button type="button" onclick="clearSt200Form()"
                style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <!-- Table -->
        <table style="width:100%; border-collapse:collapse;" border="1">
            <tbody>
                <tr>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Date</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Clean the Instrument</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Empty Waste Container</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Check Printer & Paper Status</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Daily Cleaning Solution</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Calibration</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Shutdown</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Lab Staff Signature</th>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Lab Supervisor Signature</th>
                </tr>

                @for ($day = 1; $day <= 31; $day++)
                    <tr>
                        <td style="border:1px solid #000; padding:4px; text-align:center;"><strong>{{ $day }}</strong></td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="st200_clean_instrument[{{ $day }}]"
                                id="st200_clean_instrument_{{ $day }}"
                                style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="st200_empty_waste[{{ $day }}]"
                                id="st200_empty_waste_{{ $day }}"
                                style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="st200_printer_status[{{ $day }}]"
                                id="st200_printer_status_{{ $day }}"
                                style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="st200_daily_cleaning_solution[{{ $day }}]"
                                id="st200_daily_cleaning_solution_{{ $day }}"
                                style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="st200_calibration[{{ $day }}]"
                                id="st200_calibration_{{ $day }}"
                                style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="st200_shutdown[{{ $day }}]"
                                id="st200_shutdown_{{ $day }}"
                                style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="st200_lab_staff_sign[{{ $day }}]"
                                id="st200_lab_staff_sign_{{ $day }}"
                                style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="st200_lab_supervisor_sign[{{ $day }}]"
                                id="st200_lab_supervisor_sign_{{ $day }}"
                                style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>

        <script>
            function loadSt200Form() {
                const monthYear = document.getElementById('st200_month_year').value;
                const instrument = document.getElementById('st200_instrument_id').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('st200_month_year', monthYear);
                if (instrument) params.append('st200_instrument_id', instrument);

                fetch(`/newforms/be/st200/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    clearSt200Inputs();

                    if (!res.data) {
                        document.getElementById('st200_form_id').value = '';
                        return;
                    }

                    document.getElementById('st200_form_id').value = res.data.id;

                    const fields = ['st200_clean_instrument', 'st200_empty_waste', 'st200_printer_status', 'st200_daily_cleaning_solution', 'st200_calibration', 'st200_shutdown', 'st200_lab_staff_sign', 'st200_lab_supervisor_sign'];
                    fields.forEach(field => {
                        if (res.data[field]) {
                            Object.keys(res.data[field]).forEach(day => {
                                const el = document.getElementById(`${field}_${day}`);
                                if (el) el.value = res.data[field][day];
                            });
                        }
                    });
                })
                .catch(err => console.error('Load error:', err));
            }

            function clearSt200Inputs() {
                const fields = ['st200_clean_instrument', 'st200_empty_waste', 'st200_printer_status', 'st200_daily_cleaning_solution', 'st200_calibration', 'st200_shutdown', 'st200_lab_staff_sign', 'st200_lab_supervisor_sign'];
                for (let d = 1; d <= 31; d++) {
                    fields.forEach(field => {
                        const el = document.getElementById(`${field}_${d}`);
                        if (el) el.value = '';
                    });
                }
                document.getElementById('st200_form_id').value = '';
            }

            function clearSt200Form() {
                document.getElementById('st200_month_year').value = '';
                document.getElementById('st200_instrument_id').value = '';
                clearSt200Inputs();
            }

            // AJAX Submit
            (function() {
                function initSt200Form() {
                    const formContainer = document.querySelector('[id="TDPL/BE/FOM-017"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastSt200('success', result.message || 'Saved successfully!');
                                if (result.form_id) {
                                    document.getElementById('st200_form_id').value = result.form_id;
                                }
                            } else {
                                showToastSt200('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastSt200('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });
                    });
                }

                function showToastSt200(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position:fixed; top:20px; right:20px; z-index:9999;
                        padding:12px 24px; border-radius:6px; color:#fff; font-size:14px;
                        box-shadow:0 4px 12px rgba(0,0,0,0.15);
                        background:${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initSt200Form);
                } else {
                    initSt200Form();
                }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete id="TDPL/BE/FOM-018" docNo="TDPL/BE/FOM-018" docName="Tosoh HLC-723GX Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('newforms.be.forms.submit') }}">

        {{-- 🔑 INLINE EDIT ID --}}
        <input type="hidden" name="form_id" id="tosoh_form_id">

        <p>
            <strong>Month &amp; Year:</strong>
            <input type="month" name="tosoh_month_year" id="tosoh_month_year"
                style="width:180px; padding:4px; border:1px solid #aaa; border-radius:4px;" onchange="loadTosohForm()">

            &nbsp;&nbsp;

            <strong>Instrument S. No.:</strong>
            <input list="tosohEquipList" style="width:180px; padding:4px; border:1px solid #aaa; border-radius:4px;"
                name="tosoh_instrument_serial" id="tosoh_instrument_serial" placeholder="All" oninput="loadTosohForm()">

            <datalist id="tosohEquipList">
                <option value="HLC-723GX-001">
                <option value="HLC-723GX-002">
                <option value="HLC-723GX-003">
            </datalist>

            &nbsp;&nbsp;

            <button type="button" onclick="clearTosohForm()"
                style="background:#dc3545; color:#fff; border:none; padding:6px 18px; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </p>

        <table class="table table-bordered" style="border-collapse: collapse; width: 100%;">
            <tbody>

                {{-- DATE ROW --}}
                <tr>
                    <td style="border:1px solid #000; padding:4px;" colspan="2"><strong>Date 🡺</strong></td>
                    @for ($i = 1; $i <= 31; $i++)
                        <td style="border:1px solid #000; padding:4px; text-align:center;"><strong>{{ $i }}</strong></td>
                    @endfor
                </tr>

                {{-- SECTIONS --}}
                @php
                    $sections = ['Buffer 1', 'Buffer 2', 'Buffer 3', 'H/W Soln', 'Filter Count', 'Column Count'];
                @endphp

                @foreach ($sections as $section)
                    {{-- CHECK ROW --}}
                    <tr>
                        <td rowspan="2" style="border:1px solid #000; padding:4px;"><strong>{{ $section }}</strong></td>
                        <td style="border:1px solid #000; padding:4px;"><strong>Check</strong></td>

                        @for ($i = 1; $i <= 31; $i++)
                            <td style="border:1px solid #000; padding:4px; text-align:center;">
                                <input type="text" name="{{ Str::slug($section) }}_check_{{ $i }}"
                                    id="{{ Str::slug($section) }}_check_{{ $i }}"
                                    style="width:40px; padding:2px; border:1px solid #aaa; border-radius:4px;">
                            </td>
                        @endfor
                    </tr>

                    {{-- CHANGE ROW --}}
                    <tr>
                        <td style="border:1px solid #000; padding:4px;"><strong>Change</strong></td>

                        @for ($i = 1; $i <= 31; $i++)
                            <td style="border:1px solid #000; padding:4px; text-align:center;">
                                <input type="text" name="{{ Str::slug($section) }}_change_{{ $i }}"
                                    id="{{ Str::slug($section) }}_change_{{ $i }}"
                                    style="width:40px; padding:2px; border:1px solid #aaa; border-radius:4px;">
                            </td>
                        @endfor
                    </tr>

                    <tr>
                        <td colspan="33"></td>
                    </tr>
                @endforeach

                {{-- Operator Sign --}}
                <tr>
                    <td colspan="2" style="border:1px solid #000; padding:4px;"><strong>Operator's Sign</strong></td>
                    @for ($i = 1; $i <= 31; $i++)
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="operator_sign_{{ $i }}"
                                id="operator_sign_{{ $i }}"
                                style="width:40px; padding:2px; border:1px solid #aaa; border-radius:4px;">
                        </td>
                    @endfor
                </tr>

                <tr>
                    <td colspan="33"></td>
                </tr>

                {{-- Reviewed By --}}
                <tr>
                    <td colspan="2" style="border:1px solid #000; padding:4px;"><strong>Reviewed By</strong></td>
                    @for ($i = 1; $i <= 31; $i++)
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="reviewed_by_{{ $i }}"
                                id="reviewed_by_{{ $i }}"
                                style="width:40px; padding:2px; border:1px solid #aaa; border-radius:4px;">
                        </td>
                    @endfor
                </tr>

            </tbody>
        </table>

        <script>
            function loadTosohForm() {
                const monthYear = document.getElementById('tosoh_month_year').value;
                const serial = document.getElementById('tosoh_instrument_serial').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('tosoh_month_year', monthYear);
                if (serial) params.append('tosoh_instrument_serial', serial);

                fetch(`/newforms/be/tosoh/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    clearTosohInputs();

                    if (!res.data) {
                        document.getElementById('tosoh_form_id').value = '';
                        return;
                    }

                    document.getElementById('tosoh_form_id').value = res.data.id;

                    const daily = res.data.tosoh_daily;
                    if (daily) {
                        Object.keys(daily).forEach(section => {
                            Object.keys(daily[section]).forEach(type => {
                                Object.keys(daily[section][type]).forEach(day => {
                                    const el = document.getElementById(`${section}_${type}_${day}`);
                                    if (el) el.value = daily[section][type][day] || '';
                                });
                            });
                        });
                    }
                })
                .catch(err => console.error('Load error:', err));
            }

            function clearTosohInputs() {
                const sections = ['buffer-1', 'buffer-2', 'buffer-3', 'h-w-soln', 'filter-count', 'column-count'];
                const types = ['check', 'change'];
                for (let d = 1; d <= 31; d++) {
                    sections.forEach(section => {
                        types.forEach(type => {
                            const el = document.getElementById(`${section}_${type}_${d}`);
                            if (el) el.value = '';
                        });
                    });
                    const sign = document.getElementById(`operator_sign_${d}`);
                    if (sign) sign.value = '';
                    const rev = document.getElementById(`reviewed_by_${d}`);
                    if (rev) rev.value = '';
                }
                document.getElementById('tosoh_form_id').value = '';
            }

            function clearTosohForm() {
                document.getElementById('tosoh_month_year').value = '';
                document.getElementById('tosoh_instrument_serial').value = '';
                clearTosohInputs();
            }

            // AJAX Submit
            (function() {
                function initTosohForm() {
                    const formContainer = document.querySelector('[id="TDPL/BE/FOM-018"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastTosoh('success', result.message || 'Saved successfully!');
                                if (result.form_id) {
                                    document.getElementById('tosoh_form_id').value = result.form_id;
                                }
                            } else {
                                showToastTosoh('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastTosoh('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });
                    });
                }

                function showToastTosoh(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position:fixed; top:20px; right:20px; z-index:9999;
                        padding:12px 24px; border-radius:6px; color:#fff; font-size:14px;
                        box-shadow:0 4px 12px rgba(0,0,0,0.15);
                        background:${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initTosohForm);
                } else {
                    initTosohForm();
                }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete id="TDPL/BE/FOM-019" docNo="TDPL/BE/FOM-019" docName="Beckman Coulter DXH560 Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('newforms.be.forms.submit') }}">

        {{-- 🔑 UNIQUE FORM ID (INLINE EDIT SUPPORT) --}}
        <input type="hidden" name="dxh560_form_id" id="dxh560_form_id">

        {{-- FILTERS --}}
        <p>
            <strong>Month &amp; Year:</strong>
            <input type="month" name="dxh560_month_year" id="dxh560_month_year"
                style="width:180px; padding:4px; border:1px solid #aaa; border-radius:4px;" onchange="loadDxh560Form()">

            &nbsp;&nbsp;

            <strong>Instrument S. No.:</strong>
            <input list="dxh560EquipList" name="dxh560_instrument_serial" id="dxh560_instrument_serial"
                style="width:180px; padding:4px; border:1px solid #aaa; border-radius:4px;" placeholder="All" oninput="loadDxh560Form()">

            <datalist id="dxh560EquipList">
                <option value="DXH560-001">
                <option value="DXH560-002">
                <option value="DXH560-003">
            </datalist>

            &nbsp;&nbsp;

            <button type="button" onclick="clearDxh560Form()"
                style="background:#dc3545; color:#fff; border:none; padding:6px 18px; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </p>

        <table border="1" cellpadding="4" cellspacing="0" style="border-collapse:collapse; width:100%;">
            <tbody>

                {{-- DATE HEADER --}}
                <tr>
                    <td style="border:1px solid #000; padding:4px;"><strong>Date</strong></td>
                    @for ($i = 1; $i <= 31; $i++)
                        <td style="border:1px solid #000; padding:4px; text-align:center;"><strong>{{ $i }}</strong></td>
                    @endfor
                </tr>

                {{-- DAILY MAINTENANCE --}}
                <tr>
                    <td colspan="32" style="border:1px solid #000; padding:4px;"><strong>Daily Maintenance</strong></td>
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
                        <td style="border:1px solid #000; padding:4px;"><strong>{{ $label }}</strong></td>
                        @for ($i = 1; $i <= 31; $i++)
                            <td style="border:1px solid #000; padding:4px; text-align:center;">
                                <input type="text" name="dxh560_daily[{{ $key }}][{{ $i }}]"
                                    id="dxh560_daily_{{ $key }}_{{ $i }}"
                                    style="width:40px; padding:2px; border:1px solid #aaa; border-radius:4px;">
                            </td>
                        @endfor
                    </tr>
                @endforeach

                {{-- WEEKLY MAINTENANCE --}}
                <tr>
                    <td colspan="32" style="border:1px solid #000; padding:4px;"><strong>Weekly Maintenance</strong></td>
                </tr>

                <tr>
                    <td style="border:1px solid #000; padding:4px;"></td>
                    <td colspan="8" style="border:1px solid #000; padding:4px;"><strong>Week 1 - Date:</strong></td>
                    <td colspan="8" style="border:1px solid #000; padding:4px;"><strong>Week 2 - Date:</strong></td>
                    <td colspan="8" style="border:1px solid #000; padding:4px;"><strong>Week 3 - Date:</strong></td>
                    <td colspan="7" style="border:1px solid #000; padding:4px;"><strong>Week 4 - Date:</strong></td>
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
                        <td style="border:1px solid #000; padding:4px;"><strong>{{ $label }}</strong></td>

                        <td colspan="8" style="border:1px solid #000; padding:4px;">
                            <input type="text" name="dxh560_weekly[{{ $key }}][week1]"
                                id="dxh560_weekly_{{ $key }}_week1"
                                style="width:100%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>

                        <td colspan="8" style="border:1px solid #000; padding:4px;">
                            <input type="text" name="dxh560_weekly[{{ $key }}][week2]"
                                id="dxh560_weekly_{{ $key }}_week2"
                                style="width:100%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>

                        <td colspan="8" style="border:1px solid #000; padding:4px;">
                            <input type="text" name="dxh560_weekly[{{ $key }}][week3]"
                                id="dxh560_weekly_{{ $key }}_week3"
                                style="width:100%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>

                        <td colspan="7" style="border:1px solid #000; padding:4px;">
                            <input type="text" name="dxh560_weekly[{{ $key }}][week4]"
                                id="dxh560_weekly_{{ $key }}_week4"
                                style="width:100%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>
                    </tr>
                @endforeach

                {{-- 🔒 GRID RESET (INVISIBLE – DO NOT REMOVE) --}}
                <tr>
                    <td colspan="32" style="padding:0;border:none;height:0;"></td>
                </tr>

                {{-- MONTHLY MAINTENANCE --}}
                <tr>
                    <td colspan="32" style="border:1px solid #000; padding:4px;"><strong>Monthly Maintenance</strong></td>
                </tr>

                <tr>
                    <td colspan="32" style="border:1px solid #000; padding:4px;"><strong>Depends on the usage cycles/day</strong></td>
                </tr>

                <tr>
                    <td style="border:1px solid #000; padding:4px;">
                        <strong>
                            Perform Bleaching cycle
                            (Use 5ml Bleach + 5ml D/W, filter and use)
                        </strong>
                    </td>

                    <td colspan="15" style="border:1px solid #000; padding:4px;">
                        <input type="text" name="dxh560_monthly[bleach_cycle][notes]"
                            id="dxh560_monthly_bleach_cycle_notes"
                            style="width:100%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>

                    <td colspan="16" style="border:1px solid #000; padding:4px;">
                        <input type="text" name="dxh560_monthly[bleach_cycle][dates]"
                            id="dxh560_monthly_bleach_cycle_dates"
                            style="width:100%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>
                </tr>

                {{-- TECHNICIAN SIGNATURE --}}
                <tr>
                    <td style="border:1px solid #000; padding:4px;"><strong>Technician Signature</strong></td>

                    <td colspan="15" style="border:1px solid #000; padding:4px;">
                        <input type="text" name="dxh560_technician[name]"
                            id="dxh560_technician_name"
                            style="width:100%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>

                    <td colspan="16" style="border:1px solid #000; padding:4px;">
                        <input type="text" name="dxh560_technician[date]"
                            id="dxh560_technician_date"
                            style="width:100%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>
                </tr>

            </tbody>
        </table>

        <script>
            function loadDxh560Form() {
                const monthYear = document.getElementById('dxh560_month_year').value;
                const instrument = document.getElementById('dxh560_instrument_serial').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('dxh560_month_year', monthYear);
                if (instrument) params.append('dxh560_instrument_serial', instrument);

                fetch(`/newforms/be/dxh560/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    clearDxh560Inputs();

                    if (!res.data) {
                        document.getElementById('dxh560_form_id').value = '';
                        return;
                    }

                    document.getElementById('dxh560_form_id').value = res.data.id;

                    // Daily
                    const dailyKeys = ['cleaning_of_baths', 'dust_cleaning', 'staff_initial'];
                    if (res.data.dxh560_daily) {
                        dailyKeys.forEach(key => {
                            if (res.data.dxh560_daily[key]) {
                                Object.keys(res.data.dxh560_daily[key]).forEach(day => {
                                    const el = document.getElementById(`dxh560_daily_${key}_${day}`);
                                    if (el) el.value = res.data.dxh560_daily[key][day];
                                });
                            }
                        });
                    }

                    // Weekly
                    const weeklyKeys = ['rinsing_of_baths', 'draining_baths', 'flushing_aperture', 'maintenance_initial'];
                    const weeks = ['week1', 'week2', 'week3', 'week4'];
                    if (res.data.dxh560_weekly) {
                        weeklyKeys.forEach(key => {
                            if (res.data.dxh560_weekly[key]) {
                                weeks.forEach(w => {
                                    const el = document.getElementById(`dxh560_weekly_${key}_${w}`);
                                    if (el) el.value = res.data.dxh560_weekly[key][w] || '';
                                });
                            }
                        });
                    }

                    // Monthly
                    if (res.data.dxh560_monthly && res.data.dxh560_monthly.bleach_cycle) {
                        const bc = res.data.dxh560_monthly.bleach_cycle;
                        const notesEl = document.getElementById('dxh560_monthly_bleach_cycle_notes');
                        if (notesEl) notesEl.value = bc.notes || '';
                        const datesEl = document.getElementById('dxh560_monthly_bleach_cycle_dates');
                        if (datesEl) datesEl.value = bc.dates || '';
                    }

                    // Technician
                    if (res.data.dxh560_technician) {
                        const nameEl = document.getElementById('dxh560_technician_name');
                        if (nameEl) nameEl.value = res.data.dxh560_technician.name || '';
                        const dateEl = document.getElementById('dxh560_technician_date');
                        if (dateEl) dateEl.value = res.data.dxh560_technician.date || '';
                    }
                })
                .catch(err => console.error('Load error:', err));
            }

            function clearDxh560Inputs() {
                const dailyKeys = ['cleaning_of_baths', 'dust_cleaning', 'staff_initial'];
                for (let d = 1; d <= 31; d++) {
                    dailyKeys.forEach(key => {
                        const el = document.getElementById(`dxh560_daily_${key}_${d}`);
                        if (el) el.value = '';
                    });
                }

                const weeklyKeys = ['rinsing_of_baths', 'draining_baths', 'flushing_aperture', 'maintenance_initial'];
                const weeks = ['week1', 'week2', 'week3', 'week4'];
                weeklyKeys.forEach(key => {
                    weeks.forEach(w => {
                        const el = document.getElementById(`dxh560_weekly_${key}_${w}`);
                        if (el) el.value = '';
                    });
                });

                document.getElementById('dxh560_monthly_bleach_cycle_notes').value = '';
                document.getElementById('dxh560_monthly_bleach_cycle_dates').value = '';
                document.getElementById('dxh560_technician_name').value = '';
                document.getElementById('dxh560_technician_date').value = '';
                document.getElementById('dxh560_form_id').value = '';
            }

            function clearDxh560Form() {
                document.getElementById('dxh560_month_year').value = '';
                document.getElementById('dxh560_instrument_serial').value = '';
                clearDxh560Inputs();
            }

            // AJAX Submit
            (function() {
                function initDxh560Form() {
                    const formContainer = document.querySelector('[id="TDPL/BE/FOM-019"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastDxh560('success', result.message || 'Saved successfully!');
                                if (result.form_id) {
                                    document.getElementById('dxh560_form_id').value = result.form_id;
                                }
                            } else {
                                showToastDxh560('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastDxh560('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });
                    });
                }

                function showToastDxh560(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position:fixed; top:20px; right:20px; z-index:9999;
                        padding:12px 24px; border-radius:6px; color:#fff; font-size:14px;
                        box-shadow:0 4px 12px rgba(0,0,0,0.15);
                        background:${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initDxh560Form);
                } else {
                    initDxh560Form();
                }
            })();
        </script>

    </x-formTemplete>



    <x-formTemplete id="TDPL/BE/FOM-020" docNo="TDPL/BE/FOM-020" docName="HORIBA Yumizen H550 Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('newforms.be.forms.submit') }}">

        {{-- 🔑 UNIQUE FORM ID --}}
        <input type="hidden" name="h550_form_id" id="h550_form_id">

        <p>
            <strong>Month &amp; Year:</strong>
            <input type="month" name="h550_month_year" id="h550_month_year"
                style="width:180px; padding:4px; border:1px solid #aaa; border-radius:4px;" onchange="loadH550Form()">

            &nbsp;&nbsp;

            <strong>Instrument S. No.:</strong>
            <input list="h550EquipList" style="width:180px; padding:4px; border:1px solid #aaa; border-radius:4px;"
                name="h550_instrument_serial" id="h550_instrument_serial" placeholder="All" oninput="loadH550Form()">

            <datalist id="h550EquipList">
                <option value="H550-001">
                <option value="H550-002">
                <option value="H550-003">
            </datalist>

            &nbsp;&nbsp;

            <button type="button" onclick="clearH550Form()"
                style="background:#dc3545; color:#fff; border:none; padding:6px 18px; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </p>

        <table border="1" cellpadding="4" cellspacing="0" style="border-collapse:collapse; width:100%;">
            <tbody>

                {{-- HEADER --}}
                <tr>
                    <td style="border:1px solid #000; padding:4px;"><strong>Date</strong></td>
                    @for ($d = 1; $d <= 31; $d++)
                        <td style="border:1px solid #000; padding:4px; text-align:center;"><strong>{{ $d }}</strong></td>
                    @endfor
                </tr>

                {{-- DAILY MAINTENANCE --}}
                <tr>
                    <td colspan="32" style="border:1px solid #000; padding:4px;"><strong>Daily Maintenance</strong></td>
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
                        <td style="border:1px solid #000; padding:4px;"><strong>{{ $label }}</strong></td>

                        @for ($d = 1; $d <= 31; $d++)
                            <td style="border:1px solid #000; padding:4px; text-align:center;">
                                <input type="text"
                                    name="h550_daily[{{ $key }}][{{ $d }}]"
                                    id="h550_daily_{{ $key }}_{{ $d }}"
                                    style="width:40px; padding:2px; border:1px solid #aaa; border-radius:4px;">
                            </td>
                        @endfor
                    </tr>
                @endforeach

            </tbody>
        </table>

        {{-- INFO BLOCKS --}}
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

        <script>
            function loadH550Form() {
                const monthYear = document.getElementById('h550_month_year').value;
                const instrument = document.getElementById('h550_instrument_serial').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('h550_month_year', monthYear);
                if (instrument) params.append('h550_instrument_serial', instrument);

                fetch(`/newforms/be/h550/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    clearH550Inputs();

                    if (!res.data) {
                        document.getElementById('h550_form_id').value = '';
                        return;
                    }

                    document.getElementById('h550_form_id').value = res.data.id;

                    const dailyKeys = ['clean_instrument', 'empty_waste', 'printer_status', 'reagent_levels', 'reagent_inventory', 'startup_status', 'backflush_lmneb', 'backflush_rbc_plt', 'shutdown', 'performed_by', 'verified_by', 'concentrated_cleaning'];
                    if (res.data.h550_daily) {
                        const daily = typeof res.data.h550_daily === 'string' ? JSON.parse(res.data.h550_daily) : res.data.h550_daily;
                        dailyKeys.forEach(key => {
                            if (daily[key]) {
                                Object.keys(daily[key]).forEach(day => {
                                    const el = document.getElementById(`h550_daily_${key}_${day}`);
                                    if (el) el.value = daily[key][day];
                                });
                            }
                        });
                    }
                })
                .catch(err => console.error('Load error:', err));
            }

            function clearH550Inputs() {
                const dailyKeys = ['clean_instrument', 'empty_waste', 'printer_status', 'reagent_levels', 'reagent_inventory', 'startup_status', 'backflush_lmneb', 'backflush_rbc_plt', 'shutdown', 'performed_by', 'verified_by', 'concentrated_cleaning'];
                for (let d = 1; d <= 31; d++) {
                    dailyKeys.forEach(key => {
                        const el = document.getElementById(`h550_daily_${key}_${d}`);
                        if (el) el.value = '';
                    });
                }
                document.getElementById('h550_form_id').value = '';
            }

            function clearH550Form() {
                document.getElementById('h550_month_year').value = '';
                document.getElementById('h550_instrument_serial').value = '';
                clearH550Inputs();
            }

            // AJAX Submit
            (function() {
                function initH550Form() {
                    const formContainer = document.querySelector('[id="TDPL/BE/FOM-020"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastH550('success', result.message || 'Saved successfully!');
                                if (result.form_id) {
                                    document.getElementById('h550_form_id').value = result.form_id;
                                }
                            } else {
                                showToastH550('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastH550('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });
                    });
                }

                function showToastH550(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position:fixed; top:20px; right:20px; z-index:9999;
                        padding:12px 24px; border-radius:6px; color:#fff; font-size:14px;
                        box-shadow:0 4px 12px rgba(0,0,0,0.15);
                        background:${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initH550Form);
                } else {
                    initH550Form();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete id="TDPL/BE/FOM-021" docNo="TDPL/BE/FOM-021" docName="Bio-Rad D10 Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('newforms.be.forms.submit') }}">

        {{-- 🔑 UNIQUE FORM ID --}}
        <input type="hidden" name="d10_form_id" id="d10_form_id">

        {{-- ===================== TOP FILTERS ===================== --}}
        <p>
            <strong>Month/Year:</strong>
            <input type="month" name="d10_month_year" id="d10_month_year"
                style="width:120px; padding:4px; border:1px solid #aaa; border-radius:4px;" onchange="loadD10Form()">

            &nbsp;

            <strong>Location:</strong>
            <input list="d10LocationList" name="d10_location" id="d10_location"
                style="width:120px; padding:4px; border:1px solid #aaa; border-radius:4px;" placeholder="All" oninput="loadD10Form()">

            <datalist id="d10LocationList">
                <option value="Hyderabad">
                <option value="Bangalore">
                <option value="Chennai">
            </datalist>

            &nbsp;

            <strong>Department:</strong>
            <input list="d10DepartmentList" name="d10_department" id="d10_department"
                style="width:120px; padding:4px; border:1px solid #aaa; border-radius:4px;" placeholder="All" oninput="loadD10Form()">

            <datalist id="d10DepartmentList">
                <option value="Hematology">
                <option value="Biochemistry">
                <option value="Pathology">
            </datalist>

            &nbsp;

            <strong>Instrument ID/S. No.:</strong>
            <input list="d10InstrumentList" name="d10_instrument_serial" id="d10_instrument_serial"
                style="width:150px; padding:4px; border:1px solid #aaa; border-radius:4px;" placeholder="All" oninput="loadD10Form()">

            <datalist id="d10InstrumentList">
                <option value="D10-001">
                <option value="D10-002">
                <option value="D10-003">
            </datalist>

            &nbsp;&nbsp;

            <button type="button" onclick="clearD10Form()"
                style="background:#dc3545; color:#fff; border:none; padding:6px 18px; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </p>

        {{-- ===================== DAILY MAINTENANCE ===================== --}}
        <table border="1" cellspacing="0" cellpadding="4"
            style="border-collapse: collapse; width:100%; margin-top:10px;">

            <tbody>
                <tr>
                    <td colspan="13" style="border:1px solid #000; padding:4px;"><strong>Daily Maintenance Log</strong></td>
                </tr>

                <tr>
                    <td rowspan="2" style="border:1px solid #000; padding:4px;">
                        <strong>MO/YR:</strong><br><br>
                        <strong>Date</strong>
                    </td>

                    <td colspan="9" style="border:1px solid #000; padding:4px;"><strong>Pre-Run</strong></td>
                    <td colspan="2" style="border:1px solid #000; padding:4px;"><strong>Post-Run</strong></td>

                    <td rowspan="2" style="border:1px solid #000; padding:4px;">
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
                        <td style="border:1px solid #000; padding:4px;"><strong>{{ $col }}</strong></td>
                    @endforeach
                </tr>
            </tbody>

            {{-- DAILY ROWS FOR DAYS 1–31 --}}
            <tbody>
                @for ($day = 1; $day <= 31; $day++)
                    <tr>
                        {{-- DATE NUMBER --}}
                        <td style="border:1px solid #000; padding:4px;"><strong>{{ $day }}</strong></td>

                        {{-- Input cells --}}
                        @foreach ($columns as $col)
                            <td style="border:1px solid #000; padding:4px; text-align:center;">
                                <input type="text"
                                    name="d10_daily[{{ Str::slug($col) }}][{{ $day }}]"
                                    id="d10_daily_{{ Str::slug($col) }}_{{ $day }}"
                                    style="width:40px; padding:2px; border:1px solid #aaa; border-radius:4px;">
                            </td>
                        @endforeach

                        {{-- Technician Initials --}}
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text"
                                name="d10_daily[technician_initials][{{ $day }}]"
                                id="d10_daily_technician_initials_{{ $day }}"
                                style="width:40px; padding:2px; border:1px solid #aaa; border-radius:4px;">
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>

        {{-- ===================== MONTHLY MAINTENANCE ===================== --}}
        <p style="margin-top:20px;">
            <strong>Year:</strong>
            <input type="text" name="d10_year" id="d10_year"
                style="width:120px; padding:4px; border:1px solid #aaa; border-radius:4px;">

            &nbsp;

            <strong>Instrument ID/S. No.:</strong>
            <input type="text" name="d10_monthly_instrument_serial" id="d10_monthly_instrument_serial"
                style="width:150px; padding:4px; border:1px solid #aaa; border-radius:4px;">
        </p>

        <table border="1" cellspacing="0" cellpadding="4"
            style="border-collapse: collapse; width:100%; margin-top:10px;">
            <tbody>

                <tr>
                    <td colspan="13" style="border:1px solid #000; padding:4px;"><strong>Monthly Maintenance Log</strong></td>
                </tr>

                {{-- Month Columns --}}
                @php
                    $months = ['JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC', 'JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN'];
                @endphp

                <tr>
                    <td style="border:1px solid #000; padding:4px;"><strong>MAINTENANCE</strong></td>
                    @foreach ($months as $m)
                        <td style="border:1px solid #000; padding:4px; text-align:center;"><strong>{{ $m }}</strong></td>
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
                        <td style="border:1px solid #000; padding:4px;"><strong>{{ $task }}</strong></td>

                        @foreach ($months as $m)
                            <td style="border:1px solid #000; padding:4px; text-align:center;">
                                <input type="text"
                                    name="d10_monthly[{{ Str::slug($task) }}][{{ strtolower($m) }}]"
                                    id="d10_monthly_{{ Str::slug($task) }}_{{ strtolower($m) }}"
                                    style="width:40px; padding:2px; border:1px solid #aaa; border-radius:4px;">
                            </td>
                        @endforeach
                    </tr>
                @endforeach

                {{-- Technician initials --}}
                <tr>
                    <td style="border:1px solid #000; padding:4px;"><strong>Technician Initials</strong></td>
                    @foreach ($months as $m)
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text"
                                name="d10_monthly[technician_initials][{{ strtolower($m) }}]"
                                id="d10_monthly_technician_initials_{{ strtolower($m) }}"
                                style="width:40px; padding:2px; border:1px solid #aaa; border-radius:4px;">
                        </td>
                    @endforeach
                </tr>

            </tbody>
        </table>

        <script>
            function loadD10Form() {
                const monthYear = document.getElementById('d10_month_year').value;
                const instrument = document.getElementById('d10_instrument_serial').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('d10_month_year', monthYear);
                if (instrument) params.append('d10_instrument_serial', instrument);

                fetch(`/newforms/be/d10/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    clearD10Inputs();

                    if (!res.data) {
                        document.getElementById('d10_form_id').value = '';
                        return;
                    }

                    document.getElementById('d10_form_id').value = res.data.id;

                    // Populate data fields (not lookup filters)
                    document.getElementById('d10_location').value = res.data.d10_location || '';
                    document.getElementById('d10_department').value = res.data.d10_department || '';
                    document.getElementById('d10_year').value = res.data.d10_year || '';
                    document.getElementById('d10_monthly_instrument_serial').value = res.data.d10_monthly_instrument_serial || '';

                    // Daily JSON (dynamic keys from Str::slug)
                    if (res.data.d10_daily) {
                        const daily = typeof res.data.d10_daily === 'string' ? JSON.parse(res.data.d10_daily) : res.data.d10_daily;
                        Object.keys(daily).forEach(field => {
                            if (daily[field]) {
                                Object.keys(daily[field]).forEach(day => {
                                    const el = document.getElementById(`d10_daily_${field}_${day}`);
                                    if (el) el.value = daily[field][day] || '';
                                });
                            }
                        });
                    }

                    // Monthly JSON (dynamic keys from Str::slug)
                    if (res.data.d10_monthly) {
                        const monthly = typeof res.data.d10_monthly === 'string' ? JSON.parse(res.data.d10_monthly) : res.data.d10_monthly;
                        Object.keys(monthly).forEach(task => {
                            if (monthly[task]) {
                                Object.keys(monthly[task]).forEach(month => {
                                    const el = document.getElementById(`d10_monthly_${task}_${month}`);
                                    if (el) el.value = monthly[task][month] || '';
                                });
                            }
                        });
                    }
                })
                .catch(err => console.error('Load error:', err));
            }

            function clearD10Inputs() {
                // Clear all daily inputs (id starts with d10_daily_)
                const container = document.querySelector('[id="TDPL/BE/FOM-021"]');
                if (container) {
                    container.querySelectorAll('input[id^="d10_daily_"]').forEach(el => el.value = '');
                    container.querySelectorAll('input[id^="d10_monthly_"]').forEach(el => el.value = '');
                }

                // Clear data fields (NOT lookup filters)
                document.getElementById('d10_location').value = '';
                document.getElementById('d10_department').value = '';
                document.getElementById('d10_year').value = '';
                document.getElementById('d10_monthly_instrument_serial').value = '';
                document.getElementById('d10_form_id').value = '';
            }

            function clearD10Form() {
                // Clear lookup filters
                document.getElementById('d10_month_year').value = '';
                document.getElementById('d10_instrument_serial').value = '';
                clearD10Inputs();
            }

            // AJAX Submit
            (function() {
                function initD10Form() {
                    const formContainer = document.querySelector('[id="TDPL/BE/FOM-021"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastD10('success', result.message || 'Saved successfully!');
                                if (result.form_id) {
                                    document.getElementById('d10_form_id').value = result.form_id;
                                }
                            } else {
                                showToastD10('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastD10('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });
                    });
                }

                function showToastD10(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position:fixed; top:20px; right:20px; z-index:9999;
                        padding:12px 24px; border-radius:6px; color:#fff; font-size:14px;
                        box-shadow:0 4px 12px rgba(0,0,0,0.15);
                        background:${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initD10Form);
                } else {
                    initD10Form();
                }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete id="TDPL/BE/FOM-022" docNo="TDPL/BE/FOM-022" docName="Automatic Tissue Processor Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('newforms.be.forms.submit') }}">

        {{-- 🔑 UNIQUE FORM ID (INLINE UPDATE) --}}
        <input type="hidden" name="atp_form_id" id="atp_form_id">

        {{-- ===================== TOP FILTERS ===================== --}}
        <p>
            <strong>Month & Year:</strong>
            <input type="month" name="atp_month_year" id="atp_month_year"
                style="width:140px; padding:4px; border:1px solid #aaa; border-radius:4px; margin-right:30px;" onchange="loadAtpForm()">

            <strong>Instrument ID/S. No:</strong>
            <input type="text" name="atp_instrument_id" id="atp_instrument_id"
                style="width:140px; padding:4px; border:1px solid #aaa; border-radius:4px;" oninput="loadAtpForm()">

            &nbsp;&nbsp;

            <button type="button" onclick="clearAtpForm()"
                style="background:#dc3545; color:#fff; border:none; padding:6px 18px; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </p>

        {{-- ===================== DAILY MAINTENANCE ===================== --}}
        <table border="1" cellspacing="0" cellpadding="6"
            style="border-collapse: collapse; width:100%; margin-top:10px;">
            <tbody>

                {{-- HEADER --}}
                <tr>
                    <td colspan="7" style="border:1px solid #000; padding:4px;"><strong>Daily Maintenance Log</strong></td>
                </tr>

                {{-- Column Titles --}}
                <tr>
                    <td rowspan="2" style="border:1px solid #000; padding:4px;"><strong>Date</strong></td>
                    <td rowspan="2" style="border:1px solid #000; padding:4px;"><strong>Clean Exterior</strong></td>
                    <td rowspan="2" style="border:1px solid #000; padding:4px;"><strong>Change Reagent</strong></td>
                    <td rowspan="2" style="border:1px solid #000; padding:4px;"><strong>Check Reagent Level</strong></td>
                    <td colspan="2" style="border:1px solid #000; padding:4px;"><strong>Wax Bath Temperature (&deg;C)</strong></td>
                    <td rowspan="2" style="border:1px solid #000; padding:4px;"><strong>Done By</strong></td>
                </tr>

                <tr>
                    <td style="border:1px solid #000; padding:4px;">AM</td>
                    <td style="border:1px solid #000; padding:4px;">PM</td>
                </tr>

                {{-- BODY: Days 1-31 --}}
                @for ($day = 1; $day <= 31; $day++)
                    <tr>
                        <td style="border:1px solid #000; padding:4px;"><strong>{{ $day }}</strong></td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text"
                                name="atp_daily[clean_exterior][{{ $day }}]"
                                id="atp_daily_clean_exterior_{{ $day }}"
                                style="width:70px; padding:2px; border:1px solid #aaa; border-radius:4px;">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text"
                                name="atp_daily[change_reagent][{{ $day }}]"
                                id="atp_daily_change_reagent_{{ $day }}"
                                style="width:70px; padding:2px; border:1px solid #aaa; border-radius:4px;">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text"
                                name="atp_daily[check_reagent_level][{{ $day }}]"
                                id="atp_daily_check_reagent_level_{{ $day }}"
                                style="width:70px; padding:2px; border:1px solid #aaa; border-radius:4px;">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text"
                                name="atp_daily[temperature_am][{{ $day }}]"
                                id="atp_daily_temperature_am_{{ $day }}"
                                style="width:70px; padding:2px; border:1px solid #aaa; border-radius:4px;">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text"
                                name="atp_daily[temperature_pm][{{ $day }}]"
                                id="atp_daily_temperature_pm_{{ $day }}"
                                style="width:70px; padding:2px; border:1px solid #aaa; border-radius:4px;">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text"
                                name="atp_daily[done_by][{{ $day }}]"
                                id="atp_daily_done_by_{{ $day }}"
                                style="width:70px; padding:2px; border:1px solid #aaa; border-radius:4px;">
                        </td>
                    </tr>
                @endfor

            </tbody>
        </table>

        <script>
            function loadAtpForm() {
                const monthYear = document.getElementById('atp_month_year').value;
                const instrument = document.getElementById('atp_instrument_id').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('atp_month_year', monthYear);
                if (instrument) params.append('atp_instrument_id', instrument);

                fetch(`/newforms/be/atp/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    clearAtpInputs();

                    if (!res.data) {
                        document.getElementById('atp_form_id').value = '';
                        return;
                    }

                    document.getElementById('atp_form_id').value = res.data.id;

                    const dailyKeys = ['clean_exterior', 'change_reagent', 'check_reagent_level', 'temperature_am', 'temperature_pm', 'done_by'];
                    if (res.data.daily) {
                        const daily = typeof res.data.daily === 'string' ? JSON.parse(res.data.daily) : res.data.daily;
                        dailyKeys.forEach(key => {
                            if (daily[key]) {
                                Object.keys(daily[key]).forEach(day => {
                                    const el = document.getElementById(`atp_daily_${key}_${day}`);
                                    if (el) el.value = daily[key][day] || '';
                                });
                            }
                        });
                    }
                })
                .catch(err => console.error('Load error:', err));
            }

            function clearAtpInputs() {
                const dailyKeys = ['clean_exterior', 'change_reagent', 'check_reagent_level', 'temperature_am', 'temperature_pm', 'done_by'];
                for (let d = 1; d <= 31; d++) {
                    dailyKeys.forEach(key => {
                        const el = document.getElementById(`atp_daily_${key}_${d}`);
                        if (el) el.value = '';
                    });
                }
                document.getElementById('atp_form_id').value = '';
            }

            function clearAtpForm() {
                document.getElementById('atp_month_year').value = '';
                document.getElementById('atp_instrument_id').value = '';
                clearAtpInputs();
            }

            // AJAX Submit
            (function() {
                function initAtpForm() {
                    const formContainer = document.querySelector('[id="TDPL/BE/FOM-022"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastAtp('success', result.message || 'Saved successfully!');
                                if (result.form_id) {
                                    document.getElementById('atp_form_id').value = result.form_id;
                                }
                            } else {
                                showToastAtp('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastAtp('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });
                    });
                }

                function showToastAtp(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position:fixed; top:20px; right:20px; z-index:9999;
                        padding:12px 24px; border-radius:6px; color:#fff; font-size:14px;
                        box-shadow:0 4px 12px rgba(0,0,0,0.15);
                        background:${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initAtpForm);
                } else {
                    initAtpForm();
                }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete id="TDPL/BE/FOM-023" docNo="TDPL/BE/FOM-023"
        docName="Tissue Embedding Console System Equipment Maintenance Form" issueNo="2.0" issueDate="01/10/2024"
        buttonText="Submit" action="{{ route('newforms.be.forms.submit') }}">

        {{-- 🔑 UNIQUE FORM ID (INLINE UPDATE SUPPORT) --}}
        <input type="hidden" name="tec_form_id" id="tec_form_id">

        <p>
            <strong>Month/Year:</strong>
            <input type="month" name="tec_month_year" id="tec_month_year"
                style="width:120px; padding:4px; border:1px solid #aaa; border-radius:4px;" onchange="loadTecForm()">

            &nbsp;&nbsp;

            <strong>Instrument ID/S. No.:</strong>
            <input list="tecEquipList" name="tec_instrument_id" id="tec_instrument_id"
                style="width:150px; padding:4px; border:1px solid #aaa; border-radius:4px;" placeholder="All" oninput="loadTecForm()">

            <datalist id="tecEquipList">
                <option value="TEC-001">
                <option value="TEC-002">
                <option value="TEC-003">
            </datalist>

            &nbsp;&nbsp;

            <button type="button" onclick="clearTecForm()"
                style="background:#dc3545; color:#fff; border:none; padding:6px 18px; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </p>

        <table style="width:100%; border-collapse:collapse;" border="1" cellspacing="0" cellpadding="6">
            <tbody>
                <tr>
                    <td colspan="6" style="border:1px solid #000; padding:4px; text-align:center;">
                        <strong>Daily Maintenance Log</strong>
                    </td>
                </tr>

                <tr>
                    <td style="border:1px solid #000; padding:4px;"><strong>Date</strong></td>
                    <td style="border:1px solid #000; padding:4px;"><strong>Cold Plate Temperature (&deg;C)</strong></td>
                    <td style="border:1px solid #000; padding:4px;"><strong>Hot Plate Temperature (&deg;C)</strong></td>
                    <td style="border:1px solid #000; padding:4px;"><strong>Wax Bath Temperature (&deg;C)</strong></td>
                    <td style="border:1px solid #000; padding:4px;"><strong>Check Cleaning</strong></td>
                    <td style="border:1px solid #000; padding:4px;"><strong>Technician Signature</strong></td>
                </tr>

                @for ($i = 1; $i <= 31; $i++)
                    <tr>
                        <td style="border:1px solid #000; padding:4px;"><strong>{{ $i }}</strong></td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="tec_daily[cold_plate_temp][{{ $i }}]"
                                id="tec_daily_cold_plate_temp_{{ $i }}"
                                style="width:70px; padding:2px; border:1px solid #aaa; border-radius:4px;">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="tec_daily[hot_plate_temp][{{ $i }}]"
                                id="tec_daily_hot_plate_temp_{{ $i }}"
                                style="width:70px; padding:2px; border:1px solid #aaa; border-radius:4px;">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="tec_daily[wax_bath_temp][{{ $i }}]"
                                id="tec_daily_wax_bath_temp_{{ $i }}"
                                style="width:70px; padding:2px; border:1px solid #aaa; border-radius:4px;">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="tec_daily[check_cleaning][{{ $i }}]"
                                id="tec_daily_check_cleaning_{{ $i }}"
                                style="width:70px; padding:2px; border:1px solid #aaa; border-radius:4px;">
                        </td>

                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="tec_daily[technician_signature][{{ $i }}]"
                                id="tec_daily_technician_signature_{{ $i }}"
                                style="width:70px; padding:2px; border:1px solid #aaa; border-radius:4px;">
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>

        <p>
            <strong>Note:</strong>
            Optimum temperature ranges:
            Cold plate -5 to -9&deg;C;
            Hotplate 80 to 90&deg;C;
            Wax bath 65 to 75&deg;C
        </p>

        <script>
            function loadTecForm() {
                const monthYear = document.getElementById('tec_month_year').value;
                const instrument = document.getElementById('tec_instrument_id').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('tec_month_year', monthYear);
                if (instrument) params.append('tec_instrument_id', instrument);

                fetch(`/newforms/be/tec/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    clearTecInputs();

                    if (!res.data) {
                        document.getElementById('tec_form_id').value = '';
                        return;
                    }

                    document.getElementById('tec_form_id').value = res.data.id;

                    const dailyKeys = ['cold_plate_temp', 'hot_plate_temp', 'wax_bath_temp', 'check_cleaning', 'technician_signature'];
                    if (res.data.tec_daily) {
                        const daily = typeof res.data.tec_daily === 'string' ? JSON.parse(res.data.tec_daily) : res.data.tec_daily;
                        dailyKeys.forEach(key => {
                            if (daily[key]) {
                                Object.keys(daily[key]).forEach(day => {
                                    const el = document.getElementById(`tec_daily_${key}_${day}`);
                                    if (el) el.value = daily[key][day] || '';
                                });
                            }
                        });
                    }
                })
                .catch(err => console.error('Load error:', err));
            }

            function clearTecInputs() {
                const dailyKeys = ['cold_plate_temp', 'hot_plate_temp', 'wax_bath_temp', 'check_cleaning', 'technician_signature'];
                for (let d = 1; d <= 31; d++) {
                    dailyKeys.forEach(key => {
                        const el = document.getElementById(`tec_daily_${key}_${d}`);
                        if (el) el.value = '';
                    });
                }
                document.getElementById('tec_form_id').value = '';
            }

            function clearTecForm() {
                document.getElementById('tec_month_year').value = '';
                document.getElementById('tec_instrument_id').value = '';
                clearTecInputs();
            }

            // AJAX Submit
            (function() {
                function initTecForm() {
                    const formContainer = document.querySelector('[id="TDPL/BE/FOM-023"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastTec('success', result.message || 'Saved successfully!');
                                if (result.form_id) {
                                    document.getElementById('tec_form_id').value = result.form_id;
                                }
                            } else {
                                showToastTec('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastTec('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });
                    });
                }

                function showToastTec(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position:fixed; top:20px; right:20px; z-index:9999;
                        padding:12px 24px; border-radius:6px; color:#fff; font-size:14px;
                        box-shadow:0 4px 12px rgba(0,0,0,0.15);
                        background:${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initTecForm);
                } else {
                    initTecForm();
                }
            })();
        </script>

    </x-formTemplete>


    <x-formTemplete id="TDPL/BE/FOM-024" docNo="TDPL/BE/FOM-024" docName="Bact Alert Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('newforms.be.forms.submit') }}">

        {{-- 🔑 UNIQUE FORM ID (INLINE UPDATE SUPPORT) --}}
        <input type="hidden" name="ba_form_id" id="ba_form_id">

        @php
            $fields = [
                'Clean Outer Cover',
                'Clean Monitor',
                'Check Temp (37°C)',
                'Check for Error 60 and calibrate cells flagged 60',
                'Signature of the Technician',
                'Signature of HOD',
            ];

            $days = range(1, 31);
        @endphp

        {{-- ===================== TOP FILTERS ===================== --}}
        <p>
            <strong>Month &amp; Year:</strong>
            <input type="month" name="ba_month_year" id="ba_month_year"
                style="width:150px; padding:4px; border:1px solid #aaa; border-radius:4px;"
                onchange="loadBactAlertForm()">

            &nbsp;&nbsp;

            <strong>Instrument ID / S. No:</strong>
            <input list="baEquipList" name="ba_instrument_id" id="ba_instrument_id"
                style="width:180px; padding:4px; border:1px solid #aaa; border-radius:4px;" placeholder="All"
                oninput="loadBactAlertForm()">

            <datalist id="baEquipList">
                <option value="BACT-001">
                <option value="BACT-002">
                <option value="BACT-003">
            </datalist>

            &nbsp;&nbsp;

            <button type="button" onclick="clearBaForm()"
                style="background:#dc3545; color:#fff; border:none; padding:6px 18px; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </p>

        {{-- ===================== DAILY MAINTENANCE TABLE ===================== --}}
        <table style="border-collapse:collapse; width:100%; text-align:center;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:4px;">Date</th>
                    @foreach ($days as $day)
                        <th style="border:1px solid #000; padding:4px;">{{ $day }}</th>
                    @endforeach
                </tr>
            </thead>

            <tbody>
                @foreach ($fields as $field)
                    @php
                        $slug = Str::slug($field);
                    @endphp
                    <tr>
                        <td style="border:1px solid #000; padding:4px; text-align:left; min-width:176px; font-weight:600;">
                            {{ $field }}
                        </td>

                        @foreach ($days as $day)
                            <td style="border:1px solid #000; padding:2px; text-align:center;">

                                @if (str_contains(strtolower($field), 'signature'))
                                    <input type="text" name="ba_daily[{{ $slug }}][{{ $day }}]"
                                        id="ba_daily_{{ $slug }}_{{ $day }}"
                                        style="width:40px; padding:2px; border:1px solid #aaa; border-radius:4px;" placeholder="Sign">
                                @elseif(str_contains(strtolower($field), 'check temp'))
                                    <input type="number" step="0.1"
                                        name="ba_daily[{{ $slug }}][{{ $day }}]"
                                        id="ba_daily_{{ $slug }}_{{ $day }}"
                                        style="width:40px; padding:2px; border:1px solid #aaa; border-radius:4px;" placeholder="&deg;C">
                                @else
                                    <input type="text" name="ba_daily[{{ $slug }}][{{ $day }}]"
                                        id="ba_daily_{{ $slug }}_{{ $day }}"
                                        style="width:40px; padding:2px; border:1px solid #aaa; border-radius:4px;">
                                @endif

                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>

        <script>
            function loadBactAlertForm() {
                const monthYear = document.getElementById('ba_month_year').value;
                const instrument = document.getElementById('ba_instrument_id').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('ba_month_year', monthYear);
                if (instrument) params.append('ba_instrument_id', instrument);

                fetch(`/newforms/be/ba/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    clearBaInputs();

                    if (!res.data) {
                        document.getElementById('ba_form_id').value = '';
                        return;
                    }

                    document.getElementById('ba_form_id').value = res.data.id;

                    if (res.data.ba_daily) {
                        const daily = typeof res.data.ba_daily === 'string' ? JSON.parse(res.data.ba_daily) : res.data.ba_daily;
                        Object.keys(daily).forEach(field => {
                            if (daily[field]) {
                                Object.keys(daily[field]).forEach(day => {
                                    const el = document.getElementById(`ba_daily_${field}_${day}`);
                                    if (el) el.value = daily[field][day] || '';
                                });
                            }
                        });
                    }
                })
                .catch(err => console.error('Load error:', err));
            }

            function clearBaInputs() {
                const container = document.querySelector('[id="TDPL/BE/FOM-024"]');
                if (container) {
                    container.querySelectorAll('input[id^="ba_daily_"]').forEach(el => el.value = '');
                }
                document.getElementById('ba_form_id').value = '';
            }

            function clearBaForm() {
                document.getElementById('ba_month_year').value = '';
                document.getElementById('ba_instrument_id').value = '';
                clearBaInputs();
            }

            // AJAX Submit
            (function() {
                function initBaForm() {
                    const formContainer = document.querySelector('[id="TDPL/BE/FOM-024"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastBa('success', result.message || 'Saved successfully!');
                                if (result.form_id) {
                                    document.getElementById('ba_form_id').value = result.form_id;
                                }
                            } else {
                                showToastBa('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastBa('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });
                    });
                }

                function showToastBa(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position:fixed; top:20px; right:20px; z-index:9999;
                        padding:12px 24px; border-radius:6px; color:#fff; font-size:14px;
                        box-shadow:0 4px 12px rgba(0,0,0,0.15);
                        background:${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initBaForm);
                } else {
                    initBaForm();
                }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete id="TDPL/BE/FOM-025" docNo="TDPL/BE/FOM-025" docName="Vitek 2 Maintenance Form" issueNo="2.0"
        issueDate="01/10/2024" buttonText="Submit" action="{{ route('newforms.be.forms.submit') }}">

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

            if (!function_exists('fieldSlug')) {
                function fieldSlug($field)
                {
                    return \Illuminate\Support\Str::slug($field, '_');
                }
            }
        @endphp

        <p>
            <strong>Month &amp; Year:</strong>
            <input type="month" name="vitek_month_year" id="vitek_month_year"
                style="width:180px; padding:4px; border:1px solid #aaa; border-radius:4px;"
                onchange="loadVitekForm()">

            &nbsp;&nbsp;

            <strong>Instrument ID / S. No:</strong>
            <input list="vitekInstrumentList" name="vitek_instrument_id" id="vitek_instrument_id"
                style="width:180px; padding:4px; border:1px solid #aaa; border-radius:4px;" placeholder="All"
                onchange="loadVitekForm()">

            <datalist id="vitekInstrumentList">
                <option value="VITEK2-001">
                <option value="VITEK2-002">
                <option value="VITEK2-003">
            </datalist>

            &nbsp;&nbsp;

            <button type="button" onclick="clearVitekFullForm()"
                style="background:#dc3545; color:#fff; border:none; padding:6px 18px; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </p>

        {{-- DAILY --}}
        <p style="margin-top:14px; margin-bottom:6px;"><strong style="font-size:1.1em;">Daily Maintenance</strong></p>
        <table style="border-collapse:collapse; width:100%; text-align:center; margin-bottom:20px;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:4px;">Field</th>
                    @foreach ($days as $day)
                        <th style="border:1px solid #000; padding:4px;">{{ $day }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($dailyFields as $field)
                    @php $slug = fieldSlug($field); @endphp
                    <tr>
                        <td style="border:1px solid #000; padding:4px; font-weight:600; text-align:left;">{{ $field }}</td>
                        @foreach ($days as $day)
                            <td style="border:1px solid #000; padding:4px; text-align:center;">
                                <input type="{{ str_contains(strtolower($field), 'temperature') ? 'number' : 'text' }}"
                                    step="0.1" name="vitek_daily[{{ $slug }}][{{ $day }}]"
                                    id="vitek_daily_{{ $slug }}_{{ $day }}"
                                    style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;"
                                    placeholder="{{ str_contains(strtolower($field), 'signature') ? 'Sign' : '' }}">
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- MONTHLY --}}
        <p style="margin-bottom:6px;"><strong style="font-size:1.1em;">Monthly Maintenance</strong></p>
        <table style="border-collapse:collapse; width:100%; text-align:center;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:4px;">Field</th>
                    @foreach ($days as $day)
                        <th style="border:1px solid #000; padding:4px;">{{ $day }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($monthlyFields as $field)
                    @php $slug = fieldSlug($field); @endphp
                    <tr>
                        <td style="border:1px solid #000; padding:4px; font-weight:600; text-align:left;">{{ $field }}</td>
                        @foreach ($days as $day)
                            <td style="border:1px solid #000; padding:4px; text-align:center;">
                                <input type="text" name="vitek_monthly[{{ $slug }}][{{ $day }}]"
                                    id="vitek_monthly_{{ $slug }}_{{ $day }}"
                                    style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;"
                                    placeholder="{{ str_contains(strtolower($field), 'signature') ? 'Sign' : '' }}">
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>

        <script>
            function loadVitekForm() {
                const monthYear = document.getElementById('vitek_month_year').value;
                const instrument = document.getElementById('vitek_instrument_id').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('vitek_month_year', monthYear);
                if (instrument) params.append('vitek_instrument_id', instrument);

                fetch(`/newforms/be/vitek/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    clearVitekInputs();

                    if (!res.data) {
                        document.getElementById('vitek_form_id').value = '';
                        return;
                    }

                    document.getElementById('vitek_form_id').value = res.data.id;

                    // Daily JSON
                    if (res.data.vitek_daily) {
                        const daily = typeof res.data.vitek_daily === 'string' ? JSON.parse(res.data.vitek_daily) : res.data.vitek_daily;
                        Object.keys(daily).forEach(field => {
                            if (daily[field]) {
                                Object.keys(daily[field]).forEach(day => {
                                    const el = document.getElementById(`vitek_daily_${field}_${day}`);
                                    if (el) el.value = daily[field][day] || '';
                                });
                            }
                        });
                    }

                    // Monthly JSON
                    if (res.data.vitek_monthly) {
                        const monthly = typeof res.data.vitek_monthly === 'string' ? JSON.parse(res.data.vitek_monthly) : res.data.vitek_monthly;
                        Object.keys(monthly).forEach(field => {
                            if (monthly[field]) {
                                Object.keys(monthly[field]).forEach(day => {
                                    const el = document.getElementById(`vitek_monthly_${field}_${day}`);
                                    if (el) el.value = monthly[field][day] || '';
                                });
                            }
                        });
                    }
                })
                .catch(err => console.error('Load error:', err));
            }

            function clearVitekInputs() {
                const container = document.querySelector('[id="TDPL/BE/FOM-025"]');
                if (container) {
                    container.querySelectorAll('input[id^="vitek_daily_"]').forEach(el => el.value = '');
                    container.querySelectorAll('input[id^="vitek_monthly_"]').forEach(el => el.value = '');
                }
                document.getElementById('vitek_form_id').value = '';
            }

            function clearVitekFullForm() {
                document.getElementById('vitek_month_year').value = '';
                document.getElementById('vitek_instrument_id').value = '';
                clearVitekInputs();
            }

            // AJAX Submit
            (function() {
                function initVitekForm() {
                    const formContainer = document.querySelector('[id="TDPL/BE/FOM-025"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastVitek('success', result.message || 'Saved successfully!');
                                if (result.form_id) {
                                    document.getElementById('vitek_form_id').value = result.form_id;
                                }
                            } else {
                                showToastVitek('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastVitek('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });
                    });
                }

                function showToastVitek(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position:fixed; top:20px; right:20px; z-index:9999;
                        padding:12px 24px; border-radius:6px; color:#fff; font-size:14px;
                        box-shadow:0 4px 12px rgba(0,0,0,0.15);
                        background:${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initVitekForm);
                } else {
                    initVitekForm();
                }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete id="TDPL/BE/FOM-026" docNo="TDPL/BE/FOM-026" docName="Elisa Reader Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('newforms.be.forms.submit') }}">

        <input type="hidden" name="elisa_form_id" id="elisa_form_id">

        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Month &amp; Year:</strong>
                <input type="month" name="elisa_month_year" id="elisa_month_year"
                    style="border:1px solid #000; padding:5px; width:180px;"
                    onchange="loadElisaForm()">
            </div>
            <div>
                <strong>Instrument ID / S. No:</strong>
                <input list="elisaEquipList" name="elisa_instrument_id" id="elisa_instrument_id"
                    style="border:1px solid #000; padding:5px; width:180px;" placeholder="All"
                    oninput="loadElisaForm()">
                <datalist id="elisaEquipList">
                    <option value="ELISA-001">
                    <option value="ELISA-002">
                    <option value="ELISA-003">
                </datalist>
            </div>
            <button type="button" onclick="clearElisaFullForm()"
                style="background:#dc3545; color:#fff; border:none; padding:6px 18px; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <p style="margin-bottom:8px;">
            Put a tick mark (✓) against each maintenance activity after performance
        </p>

        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">DATE 🡺</th>
                    @for ($day = 1; $day <= 31; $day++)
                        <th style="border:1px solid #000; padding:4px; text-align:center;">{{ $day }}</th>
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
                    @php $slug = \Illuminate\Support\Str::slug($field); @endphp
                    <tr>
                        <td style="border:1px solid #000; padding:4px; font-weight:600; text-align:left;">{{ $field }}</td>
                        @for ($day = 1; $day <= 31; $day++)
                            <td style="border:1px solid #000; padding:4px; text-align:center;">
                                @if (str_contains(strtolower($field), 'signature'))
                                    <input type="text"
                                        name="elisa_daily[{{ $slug }}][{{ $day }}]"
                                        id="elisa_daily_{{ $slug }}_{{ $day }}"
                                        style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;"
                                        placeholder="Sign">
                                @else
                                    <input type="checkbox"
                                        name="elisa_daily[{{ $slug }}][{{ $day }}]"
                                        id="elisa_daily_{{ $slug }}_{{ $day }}" value="1">
                                @endif
                            </td>
                        @endfor
                    </tr>
                @endforeach
            </tbody>
        </table>

        <script>
            function loadElisaForm() {
                const monthYear = document.getElementById('elisa_month_year').value;
                const instrument = document.getElementById('elisa_instrument_id').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('elisa_month_year', monthYear);
                if (instrument) params.append('elisa_instrument_id', instrument);

                fetch(`/newforms/be/elisa/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    clearElisaInputs();

                    if (!res.data) {
                        document.getElementById('elisa_form_id').value = '';
                        return;
                    }

                    document.getElementById('elisa_form_id').value = res.data.id;

                    if (res.data.elisa_daily) {
                        const daily = typeof res.data.elisa_daily === 'string'
                            ? JSON.parse(res.data.elisa_daily) : res.data.elisa_daily;
                        Object.keys(daily).forEach(field => {
                            if (daily[field]) {
                                Object.keys(daily[field]).forEach(day => {
                                    const el = document.getElementById(`elisa_daily_${field}_${day}`);
                                    if (el) {
                                        if (el.type === 'checkbox') {
                                            el.checked = !!daily[field][day];
                                        } else {
                                            el.value = daily[field][day] || '';
                                        }
                                    }
                                });
                            }
                        });
                    }
                })
                .catch(err => console.error('Load error:', err));
            }

            function clearElisaInputs() {
                const container = document.querySelector('[id="TDPL/BE/FOM-026"]');
                if (!container) return;
                container.querySelectorAll('input[id^="elisa_daily_"]').forEach(el => {
                    if (el.type === 'checkbox') {
                        el.checked = false;
                    } else {
                        el.value = '';
                    }
                });
            }

            function clearElisaFullForm() {
                document.getElementById('elisa_month_year').value = '';
                document.getElementById('elisa_instrument_id').value = '';
                document.getElementById('elisa_form_id').value = '';
                clearElisaInputs();
            }

            (function() {
                function initElisaForm() {
                    const formContainer = document.querySelector('[id="TDPL/BE/FOM-026"]');
                    if (!formContainer) return;
                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';
                        if (submitBtn) { submitBtn.textContent = 'Saving...'; submitBtn.disabled = true; }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
                        })
                        .then(res => res.json())
                        .then(result => {
                            if (result.success) {
                                showToastElisa('success', result.message || 'Saved successfully!');
                                if (result.form_id) document.getElementById('elisa_form_id').value = result.form_id;
                            } else {
                                showToastElisa('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(err => {
                            console.error('Error:', err);
                            showToastElisa('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) { submitBtn.textContent = originalText; submitBtn.disabled = false; }
                        });
                    });
                }
                function showToastElisa(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = 'position:fixed;top:20px;right:20px;z-index:9999;padding:12px 24px;border-radius:6px;color:#fff;font-size:14px;box-shadow:0 4px 12px rgba(0,0,0,0.15);background:' + (type === 'success' ? '#28a745' : '#dc3545');
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }
                if (document.readyState === 'loading') { document.addEventListener('DOMContentLoaded', initElisaForm); } else { initElisaForm(); }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete id="TDPL/BE/FOM-028" docNo="TDPL/BE/FOM-028" docName="Real Time PCR Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('newforms.be.forms.submit') }}">

        <input type="hidden" name="rtpcr_form_id" id="rtpcr_form_id">

        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Month &amp; Year:</strong>
                <input type="month" name="rtpcr_month_year" id="rtpcr_month_year"
                    style="border:1px solid #000; padding:5px; width:180px;"
                    onchange="loadRtpcrForm()">
            </div>
            <div>
                <strong>Instrument ID / S. No:</strong>
                <input list="rtpcrEquipList" name="rtpcr_instrument_id" id="rtpcr_instrument_id"
                    style="border:1px solid #000; padding:5px; width:180px;" placeholder="All"
                    oninput="loadRtpcrForm()">
                <datalist id="rtpcrEquipList">
                    <option value="RTPCR-001">
                    <option value="RTPCR-002">
                    <option value="RTPCR-003">
                </datalist>
            </div>
            <button type="button" onclick="clearRtpcrFullForm()"
                style="background:#dc3545; color:#fff; border:none; padding:6px 18px; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <p style="margin-bottom:8px;">
            Put a tick mark (✓) against each maintenance activity after performance
        </p>

        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">DATE 🡺</th>
                    @for ($day = 1; $day <= 31; $day++)
                        <th style="border:1px solid #000; padding:4px; text-align:center;">{{ $day }}</th>
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
                    @php $slug = \Illuminate\Support\Str::slug($field); @endphp
                    <tr>
                        <td style="border:1px solid #000; padding:4px; font-weight:600; text-align:left;">{{ $field }}</td>
                        @for ($day = 1; $day <= 31; $day++)
                            <td style="border:1px solid #000; padding:4px; text-align:center;">
                                @if (str_contains(strtolower($field), 'signature'))
                                    <input type="text"
                                        name="rtpcr_daily[{{ $slug }}][{{ $day }}]"
                                        id="rtpcr_daily_{{ $slug }}_{{ $day }}"
                                        style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;"
                                        placeholder="Sign">
                                @else
                                    <input type="checkbox"
                                        name="rtpcr_daily[{{ $slug }}][{{ $day }}]"
                                        id="rtpcr_daily_{{ $slug }}_{{ $day }}" value="1">
                                @endif
                            </td>
                        @endfor
                    </tr>
                @endforeach
            </tbody>
        </table>

        <script>
            function loadRtpcrForm() {
                const monthYear = document.getElementById('rtpcr_month_year').value;
                const instrument = document.getElementById('rtpcr_instrument_id').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('rtpcr_month_year', monthYear);
                if (instrument) params.append('rtpcr_instrument_id', instrument);

                fetch(`/newforms/be/rtpcr/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    clearRtpcrInputs();

                    if (!res.data) {
                        document.getElementById('rtpcr_form_id').value = '';
                        return;
                    }

                    document.getElementById('rtpcr_form_id').value = res.data.id;

                    if (res.data.rtpcr_daily) {
                        const daily = typeof res.data.rtpcr_daily === 'string'
                            ? JSON.parse(res.data.rtpcr_daily) : res.data.rtpcr_daily;
                        Object.keys(daily).forEach(field => {
                            if (daily[field]) {
                                Object.keys(daily[field]).forEach(day => {
                                    const el = document.getElementById(`rtpcr_daily_${field}_${day}`);
                                    if (el) {
                                        if (el.type === 'checkbox') {
                                            el.checked = !!daily[field][day];
                                        } else {
                                            el.value = daily[field][day] || '';
                                        }
                                    }
                                });
                            }
                        });
                    }
                })
                .catch(err => console.error('Load error:', err));
            }

            function clearRtpcrInputs() {
                const container = document.querySelector('[id="TDPL/BE/FOM-028"]');
                if (!container) return;
                container.querySelectorAll('input[id^="rtpcr_daily_"]').forEach(el => {
                    if (el.type === 'checkbox') {
                        el.checked = false;
                    } else {
                        el.value = '';
                    }
                });
            }

            function clearRtpcrFullForm() {
                document.getElementById('rtpcr_month_year').value = '';
                document.getElementById('rtpcr_instrument_id').value = '';
                document.getElementById('rtpcr_form_id').value = '';
                clearRtpcrInputs();
            }

            (function() {
                function initRtpcrForm() {
                    const formContainer = document.querySelector('[id="TDPL/BE/FOM-028"]');
                    if (!formContainer) return;
                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';
                        if (submitBtn) { submitBtn.textContent = 'Saving...'; submitBtn.disabled = true; }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
                        })
                        .then(res => res.json())
                        .then(result => {
                            if (result.success) {
                                showToastRtpcr('success', result.message || 'Saved successfully!');
                                if (result.form_id) document.getElementById('rtpcr_form_id').value = result.form_id;
                            } else {
                                showToastRtpcr('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(err => {
                            console.error('Error:', err);
                            showToastRtpcr('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) { submitBtn.textContent = originalText; submitBtn.disabled = false; }
                        });
                    });
                }
                function showToastRtpcr(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = 'position:fixed;top:20px;right:20px;z-index:9999;padding:12px 24px;border-radius:6px;color:#fff;font-size:14px;box-shadow:0 4px 12px rgba(0,0,0,0.15);background:' + (type === 'success' ? '#28a745' : '#dc3545');
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }
                if (document.readyState === 'loading') { document.addEventListener('DOMContentLoaded', initRtpcrForm); } else { initRtpcrForm(); }
            })();
        </script>

    </x-formTemplete>


    <x-formTemplete id="TDPL/BE/FOM-029" docNo="TDPL/BE/FOM-029" docName="Cooling Centrifuge Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('newforms.be.forms.submit') }}">

        <input type="hidden" name="cc_form_id" id="cc_form_id">

        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Month / Year:</strong>
                <input type="month" name="cc_month_year" id="cc_month_year"
                    style="border:1px solid #000; padding:5px; width:180px;"
                    onchange="loadCcForm()">
            </div>
            <div>
                <strong>Department:</strong>
                <input list="ccDepartmentList" name="cc_department" id="cc_department"
                    style="border:1px solid #000; padding:5px; width:160px;" placeholder="All"
                    oninput="loadCcForm()">
                <datalist id="ccDepartmentList">
                    <option value="Hematology">
                    <option value="Biochemistry">
                    <option value="Microbiology">
                    <option value="Pathology">
                </datalist>
            </div>
            <div>
                <strong>Instrument ID / S. No.:</strong>
                <input list="ccEquipList" name="cc_instrument_id" id="cc_instrument_id"
                    style="border:1px solid #000; padding:5px; width:180px;" placeholder="All"
                    oninput="loadCcForm()">
                <datalist id="ccEquipList">
                    <option value="CC-001">
                    <option value="CC-002">
                    <option value="CC-003">
                </datalist>
            </div>
            <button type="button" onclick="clearCcFullForm()"
                style="background:#dc3545; color:#fff; border:none; padding:6px 18px; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Daily Maintenance</th>
                    @for ($day = 1; $day <= 31; $day++)
                        <th style="border:1px solid #000; padding:4px; text-align:center;">{{ $day }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @foreach (['Buckets Cleaned', 'Power Cord', 'Dusting', 'Signature'] as $item)
                    @php $slug = \Illuminate\Support\Str::slug($item); @endphp
                    <tr>
                        <td style="border:1px solid #000; padding:4px; font-weight:600; text-align:left;">{{ $item }}</td>
                        @for ($day = 1; $day <= 31; $day++)
                            <td style="border:1px solid #000; padding:4px; text-align:center;">
                                @if ($item === 'Signature')
                                    <input type="text" name="cc_daily[{{ $slug }}][{{ $day }}]"
                                        id="cc_daily_{{ $slug }}_{{ $day }}"
                                        style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;"
                                        placeholder="Sign">
                                @else
                                    <input type="checkbox" name="cc_daily[{{ $slug }}][{{ $day }}]"
                                        id="cc_daily_{{ $slug }}_{{ $day }}" value="1">
                                @endif
                            </td>
                        @endfor
                    </tr>
                @endforeach

                {{-- MONTHLY MAINTENANCE --}}
                <tr>
                    <td colspan="32" style="border:1px solid #000; padding:6px; font-weight:600; text-align:left;">
                        Monthly Maintenance
                    </td>
                </tr>
                <tr>
                    <td style="border:1px solid #000; padding:4px; font-weight:600;">Bushes Checked</td>
                    <td colspan="6" style="border:1px solid #000; padding:4px;">
                        <input type="text" name="cc_monthly[bushes_checked_notes]"
                            id="cc_monthly_bushes_checked_notes"
                            style="width:100%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>
                    <td colspan="14" style="border:1px solid #000; padding:4px;">
                        <strong>Date:</strong>
                        <input type="date" name="cc_monthly[bushes_checked_date]"
                            id="cc_monthly_bushes_checked_date"
                            style="padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>
                    <td colspan="11" style="border:1px solid #000; padding:4px;">
                        <strong>Next Due Date:</strong>
                        <input type="date" name="cc_monthly[bushes_next_due]"
                            id="cc_monthly_bushes_next_due"
                            style="padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>
                </tr>
                <tr>
                    <td style="border:1px solid #000; padding:4px; font-weight:600;">Signature</td>
                    <td colspan="31" style="border:1px solid #000; padding:4px;">
                        <input type="text" name="cc_monthly[signature]" id="cc_monthly_signature"
                            style="width:100%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                    </td>
                </tr>
            </tbody>
        </table>

        <script>
            function loadCcForm() {
                const monthYear = document.getElementById('cc_month_year').value;
                const instrument = document.getElementById('cc_instrument_id').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('cc_month_year', monthYear);
                if (instrument) params.append('cc_instrument_id', instrument);

                fetch(`/newforms/be/cc/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    clearCcInputs();

                    if (!res.data) {
                        document.getElementById('cc_form_id').value = '';
                        return;
                    }

                    document.getElementById('cc_form_id').value = res.data.id;

                    // Department (data field populated from record)
                    document.getElementById('cc_department').value = res.data.cc_department ?? '';

                    // Daily JSON (checkboxes + text)
                    if (res.data.cc_daily) {
                        const daily = typeof res.data.cc_daily === 'string'
                            ? JSON.parse(res.data.cc_daily) : res.data.cc_daily;
                        Object.keys(daily).forEach(field => {
                            if (daily[field]) {
                                Object.keys(daily[field]).forEach(day => {
                                    const el = document.getElementById(`cc_daily_${field}_${day}`);
                                    if (el) {
                                        if (el.type === 'checkbox') {
                                            el.checked = !!daily[field][day];
                                        } else {
                                            el.value = daily[field][day] || '';
                                        }
                                    }
                                });
                            }
                        });
                    }

                    // Monthly individual columns (flat DB fields)
                    document.getElementById('cc_monthly_bushes_checked_notes').value =
                        res.data.cc_bushes_checked_notes ?? '';
                    document.getElementById('cc_monthly_bushes_checked_date').value =
                        res.data.cc_bushes_checked_date ?? '';
                    document.getElementById('cc_monthly_bushes_next_due').value =
                        res.data.cc_bushes_next_due ?? '';
                    document.getElementById('cc_monthly_signature').value =
                        res.data.cc_monthly_signature ?? '';
                })
                .catch(err => console.error('Load error:', err));
            }

            function clearCcInputs() {
                const container = document.querySelector('[id="TDPL/BE/FOM-029"]');
                if (!container) return;
                // Daily inputs
                container.querySelectorAll('input[id^="cc_daily_"]').forEach(el => {
                    if (el.type === 'checkbox') {
                        el.checked = false;
                    } else {
                        el.value = '';
                    }
                });
                // Monthly individual inputs
                document.getElementById('cc_monthly_bushes_checked_notes').value = '';
                document.getElementById('cc_monthly_bushes_checked_date').value = '';
                document.getElementById('cc_monthly_bushes_next_due').value = '';
                document.getElementById('cc_monthly_signature').value = '';
            }

            function clearCcFullForm() {
                document.getElementById('cc_month_year').value = '';
                document.getElementById('cc_department').value = '';
                document.getElementById('cc_instrument_id').value = '';
                document.getElementById('cc_form_id').value = '';
                clearCcInputs();
            }

            (function() {
                function initCcForm() {
                    const formContainer = document.querySelector('[id="TDPL/BE/FOM-029"]');
                    if (!formContainer) return;
                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';
                        if (submitBtn) { submitBtn.textContent = 'Saving...'; submitBtn.disabled = true; }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
                        })
                        .then(res => res.json())
                        .then(result => {
                            if (result.success) {
                                showToastCc('success', result.message || 'Saved successfully!');
                                if (result.form_id) document.getElementById('cc_form_id').value = result.form_id;
                            } else {
                                showToastCc('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(err => {
                            console.error('Error:', err);
                            showToastCc('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) { submitBtn.textContent = originalText; submitBtn.disabled = false; }
                        });
                    });
                }
                function showToastCc(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = 'position:fixed;top:20px;right:20px;z-index:9999;padding:12px 24px;border-radius:6px;color:#fff;font-size:14px;box-shadow:0 4px 12px rgba(0,0,0,0.15);background:' + (type === 'success' ? '#28a745' : '#dc3545');
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }
                if (document.readyState === 'loading') { document.addEventListener('DOMContentLoaded', initCcForm); } else { initCcForm(); }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete id="TDPL/BE/FOM-034" docNo="TDPL/BE/FOM-034" docName="Microscope Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('newforms.be.forms.submit') }}">

        <input type="hidden" name="mic_form_id" id="mic_form_id">

        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Month &amp; Year:</strong>
                <input type="month" name="mic_month_year" id="mic_month_year"
                    style="border:1px solid #000; padding:5px; width:180px;"
                    onchange="loadMicForm()">
            </div>
            <div>
                <strong>Instrument ID / S. No.:</strong>
                <input list="micEquipList" name="mic_instrument_id" id="mic_instrument_id"
                    style="border:1px solid #000; padding:5px; width:180px;" placeholder="All"
                    oninput="loadMicForm()">
                <datalist id="micEquipList">
                    <option value="MIC-001">
                    <option value="MIC-002">
                    <option value="MIC-003">
                </datalist>
            </div>
            <button type="button" onclick="clearMicFullForm()"
                style="background:#dc3545; color:#fff; border:none; padding:6px 18px; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Daily Maintenance</th>
                    @for ($day = 1; $day <= 31; $day++)
                        <th style="border:1px solid #000; padding:4px; text-align:center;">{{ $day }}</th>
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
                    @php $slug = \Illuminate\Support\Str::slug($item); @endphp
                    <tr>
                        <td style="border:1px solid #000; padding:4px; font-weight:600; text-align:left;">{{ $item }}</td>
                        @for ($day = 1; $day <= 31; $day++)
                            <td style="border:1px solid #000; padding:4px; text-align:center;">
                                @if (str_contains($item, 'Signature'))
                                    <input type="text" name="mic_daily[{{ $slug }}][{{ $day }}]"
                                        id="mic_daily_{{ $slug }}_{{ $day }}"
                                        style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;"
                                        placeholder="Sign">
                                @else
                                    <input type="checkbox"
                                        name="mic_daily[{{ $slug }}][{{ $day }}]"
                                        id="mic_daily_{{ $slug }}_{{ $day }}" value="1">
                                @endif
                            </td>
                        @endfor
                    </tr>
                @endforeach
            </tbody>
        </table>

        <script>
            function loadMicForm() {
                const monthYear = document.getElementById('mic_month_year').value;
                const instrument = document.getElementById('mic_instrument_id').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('mic_month_year', monthYear);
                if (instrument) params.append('mic_instrument_id', instrument);

                fetch(`/newforms/be/mic/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    clearMicInputs();

                    if (!res.data) {
                        document.getElementById('mic_form_id').value = '';
                        return;
                    }

                    document.getElementById('mic_form_id').value = res.data.id;

                    if (res.data.mic_daily) {
                        const daily = typeof res.data.mic_daily === 'string'
                            ? JSON.parse(res.data.mic_daily) : res.data.mic_daily;
                        Object.keys(daily).forEach(field => {
                            if (daily[field]) {
                                Object.keys(daily[field]).forEach(day => {
                                    const el = document.getElementById(`mic_daily_${field}_${day}`);
                                    if (el) {
                                        if (el.type === 'checkbox') {
                                            el.checked = !!daily[field][day];
                                        } else {
                                            el.value = daily[field][day] || '';
                                        }
                                    }
                                });
                            }
                        });
                    }
                })
                .catch(err => console.error('Load error:', err));
            }

            function clearMicInputs() {
                const container = document.querySelector('[id="TDPL/BE/FOM-034"]');
                if (!container) return;
                container.querySelectorAll('input[id^="mic_daily_"]').forEach(el => {
                    if (el.type === 'checkbox') {
                        el.checked = false;
                    } else {
                        el.value = '';
                    }
                });
            }

            function clearMicFullForm() {
                document.getElementById('mic_month_year').value = '';
                document.getElementById('mic_instrument_id').value = '';
                document.getElementById('mic_form_id').value = '';
                clearMicInputs();
            }

            (function() {
                function initMicForm() {
                    const formContainer = document.querySelector('[id="TDPL/BE/FOM-034"]');
                    if (!formContainer) return;
                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';
                        if (submitBtn) { submitBtn.textContent = 'Saving...'; submitBtn.disabled = true; }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
                        })
                        .then(res => res.json())
                        .then(result => {
                            if (result.success) {
                                showToastMic('success', result.message || 'Saved successfully!');
                                if (result.form_id) document.getElementById('mic_form_id').value = result.form_id;
                            } else {
                                showToastMic('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(err => {
                            console.error('Error:', err);
                            showToastMic('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) { submitBtn.textContent = originalText; submitBtn.disabled = false; }
                        });
                    });
                }
                function showToastMic(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = 'position:fixed;top:20px;right:20px;z-index:9999;padding:12px 24px;border-radius:6px;color:#fff;font-size:14px;box-shadow:0 4px 12px rgba(0,0,0,0.15);background:' + (type === 'success' ? '#28a745' : '#dc3545');
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }
                if (document.readyState === 'loading') { document.addEventListener('DOMContentLoaded', initMicForm); } else { initMicForm(); }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete id="TDPL/BE/FOM-035" docNo="TDPL/BE/FOM-035" docName="Laura M Maintenance Form" issueNo="2.0"
        issueDate="01/10/2024" buttonText="Submit" action="{{ route('newforms.be.forms.submit') }}">

        <input type="hidden" name="lauram_form_id" id="lauram_form_id">

        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Month &amp; Year:</strong>
                <input type="month" name="lauram_month_year" id="lauram_month_year"
                    style="border:1px solid #000; padding:5px; width:180px;"
                    onchange="loadLauramForm()">
            </div>
            <div>
                <strong>Instrument ID / S. No.:</strong>
                <input list="lauramEquipList" name="lauram_instrument_id" id="lauram_instrument_id"
                    style="border:1px solid #000; padding:5px; width:180px;" placeholder="All"
                    oninput="loadLauramForm()">
                <datalist id="lauramEquipList">
                    <option value="LAURAM-001">
                    <option value="LAURAM-002">
                    <option value="LAURAM-003">
                </datalist>
            </div>
            <button type="button" onclick="clearLauramFullForm()"
                style="background:#dc3545; color:#fff; border:none; padding:6px 18px; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:4px; text-align:center;">Daily Maintenance</th>
                    @for ($day = 1; $day <= 31; $day++)
                        <th style="border:1px solid #000; padding:4px; text-align:center;">{{ $day }}</th>
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
                        <td style="border:1px solid #000; padding:4px; font-weight:600; text-align:left; min-width:250px;">
                            {{ $section }}
                        </td>
                        <td colspan="31" style="border:1px solid #000; padding:4px;">&nbsp;</td>
                    </tr>

                    @foreach ($steps as $step)
                        @php $stepSlug = Str::slug($step); @endphp
                        <tr>
                            <td style="border:1px solid #000; padding:4px; text-align:left; min-width:250px;">
                                {{ $step }}
                            </td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td style="border:1px solid #000; padding:4px; text-align:center;">
                                    <input type="checkbox"
                                        name="lauram_daily[{{ $sectionSlug }}][{{ $stepSlug }}][{{ $day }}]"
                                        id="lauram_daily_{{ $sectionSlug }}_{{ $stepSlug }}_{{ $day }}"
                                        value="1">
                                </td>
                            @endfor
                        </tr>
                    @endforeach
                @endforeach

                {{-- SIGNATURES --}}
                @foreach (['Technician Signature', 'Supervisor Signature'] as $signature)
                    @php $sigSlug = Str::slug($signature); @endphp
                    <tr>
                        <td style="border:1px solid #000; padding:4px; font-weight:600; text-align:left; min-width:250px;">
                            {{ $signature }}
                        </td>
                        @for ($day = 1; $day <= 31; $day++)
                            <td style="border:1px solid #000; padding:4px; text-align:center;">
                                <input type="text" name="lauram_daily[{{ $sigSlug }}][{{ $day }}]"
                                    id="lauram_daily_{{ $sigSlug }}_{{ $day }}"
                                    style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;"
                                    placeholder="Sign">
                            </td>
                        @endfor
                    </tr>
                @endforeach
            </tbody>
        </table>

        <script>
            function loadLauramForm() {
                const monthYear = document.getElementById('lauram_month_year').value;
                const instrument = document.getElementById('lauram_instrument_id').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('lauram_month_year', monthYear);
                if (instrument) params.append('lauram_instrument_id', instrument);

                fetch(`/newforms/be/lauram/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    clearLauramInputs();

                    if (!res.data) {
                        document.getElementById('lauram_form_id').value = '';
                        return;
                    }

                    document.getElementById('lauram_form_id').value = res.data.id;

                    if (res.data.lauram_daily) {
                        const daily = typeof res.data.lauram_daily === 'string'
                            ? JSON.parse(res.data.lauram_daily) : res.data.lauram_daily;

                        Object.keys(daily).forEach(section => {
                            const sectionData = daily[section];
                            if (!sectionData || typeof sectionData !== 'object') return;

                            const firstVal = Object.values(sectionData)[0];

                            if (firstVal && typeof firstVal === 'object') {
                                // Step case: section → step → day (checkboxes)
                                Object.keys(sectionData).forEach(step => {
                                    if (sectionData[step] && typeof sectionData[step] === 'object') {
                                        Object.keys(sectionData[step]).forEach(day => {
                                            const el = document.getElementById(`lauram_daily_${section}_${step}_${day}`);
                                            if (el && el.type === 'checkbox') el.checked = !!sectionData[step][day];
                                        });
                                    }
                                });
                            } else {
                                // Signature case: section → day (text)
                                Object.keys(sectionData).forEach(day => {
                                    const el = document.getElementById(`lauram_daily_${section}_${day}`);
                                    if (el) el.value = sectionData[day] || '';
                                });
                            }
                        });
                    }
                })
                .catch(err => console.error('Load error:', err));
            }

            function clearLauramInputs() {
                const container = document.querySelector('[id="TDPL/BE/FOM-035"]');
                if (!container) return;
                container.querySelectorAll('input[id^="lauram_daily_"]').forEach(el => {
                    if (el.type === 'checkbox') {
                        el.checked = false;
                    } else {
                        el.value = '';
                    }
                });
            }

            function clearLauramFullForm() {
                document.getElementById('lauram_month_year').value = '';
                document.getElementById('lauram_instrument_id').value = '';
                document.getElementById('lauram_form_id').value = '';
                clearLauramInputs();
            }

            (function() {
                function initLauramForm() {
                    const formContainer = document.querySelector('[id="TDPL/BE/FOM-035"]');
                    if (!formContainer) return;
                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';
                        if (submitBtn) { submitBtn.textContent = 'Saving...'; submitBtn.disabled = true; }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
                        })
                        .then(res => res.json())
                        .then(result => {
                            if (result.success) {
                                showToastLauram('success', result.message || 'Saved successfully!');
                                if (result.form_id) document.getElementById('lauram_form_id').value = result.form_id;
                            } else {
                                showToastLauram('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(err => {
                            console.error('Error:', err);
                            showToastLauram('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) { submitBtn.textContent = originalText; submitBtn.disabled = false; }
                        });
                    });
                }
                function showToastLauram(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = 'position:fixed;top:20px;right:20px;z-index:9999;padding:12px 24px;border-radius:6px;color:#fff;font-size:14px;box-shadow:0 4px 12px rgba(0,0,0,0.15);background:' + (type === 'success' ? '#28a745' : '#dc3545');
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }
                if (document.readyState === 'loading') { document.addEventListener('DOMContentLoaded', initLauramForm); } else { initLauramForm(); }
            })();
        </script>

    </x-formTemplete>


    <x-formTemplete id="TDPL/BE/FOM-036" docNo="TDPL/BE/FOM-036" docName="Microtome Maintenance Form" issueNo="2.0"
        issueDate="01/10/2024" buttonText="Submit" action="{{ route('newforms.be.forms.submit') }}">

        <input type="hidden" name="microtome_form_id" id="microtome_form_id">

        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Month &amp; Year:</strong>
                <input type="month" name="microtome_month_year" id="microtome_month_year"
                    style="border:1px solid #000; padding:5px; width:180px;"
                    onchange="loadMicrotomeForm()">
            </div>
            <div>
                <strong>Instrument ID / S. No.:</strong>
                <input list="microtomeEquipList" name="microtome_instrument_id" id="microtome_instrument_id"
                    style="border:1px solid #000; padding:5px; width:180px;" placeholder="All"
                    oninput="loadMicrotomeForm()">
                <datalist id="microtomeEquipList">
                    <option value="MICROTOME-001">
                    <option value="MICROTOME-002">
                    <option value="MICROTOME-003">
                </datalist>
            </div>
            <button type="button" onclick="clearMicrotomeFullForm()"
                style="background:#dc3545; color:#fff; border:none; padding:6px 18px; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:8px; text-align:center;">Date</th>
                    <th style="border:1px solid #000; padding:8px; text-align:center;">Blade Change</th>
                    <th style="border:1px solid #000; padding:8px; text-align:center;">Lubrication</th>
                    <th style="border:1px solid #000; padding:8px; text-align:center;">Clean Knife Holder</th>
                    <th style="border:1px solid #000; padding:8px; text-align:center;">
                        Remove Accumulated Paraffin / Tissue &amp; Clean Material Parts
                    </th>
                    <th style="border:1px solid #000; padding:8px; text-align:center;">Technician Signature</th>
                </tr>
            </thead>
            <tbody>
                @for ($day = 1; $day <= 31; $day++)
                    <tr>
                        <td style="border:1px solid #000; padding:4px; font-weight:600; text-align:center;">
                            {{ str_pad($day, 2, '0', STR_PAD_LEFT) }}
                        </td>
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="checkbox" name="microtome_daily[blade_change][{{ $day }}]"
                                id="microtome_daily_blade_change_{{ $day }}" value="1">
                        </td>
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="checkbox" name="microtome_daily[lubrication][{{ $day }}]"
                                id="microtome_daily_lubrication_{{ $day }}" value="1">
                        </td>
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="checkbox" name="microtome_daily[clean_knife][{{ $day }}]"
                                id="microtome_daily_clean_knife_{{ $day }}" value="1">
                        </td>
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="checkbox" name="microtome_daily[remove_paraffin][{{ $day }}]"
                                id="microtome_daily_remove_paraffin_{{ $day }}" value="1">
                        </td>
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="microtome_daily[technician_signature][{{ $day }}]"
                                id="microtome_daily_technician_signature_{{ $day }}"
                                style="width:100%; padding:4px; border:1px solid #aaa; border-radius:4px;"
                                placeholder="Sign">
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>

        <script>
            function loadMicrotomeForm() {
                const monthYear = document.getElementById('microtome_month_year').value;
                const instrument = document.getElementById('microtome_instrument_id').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('microtome_month_year', monthYear);
                if (instrument) params.append('microtome_instrument_id', instrument);

                fetch(`/newforms/be/microtome/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    clearMicrotomeInputs();

                    if (!res.data) {
                        document.getElementById('microtome_form_id').value = '';
                        return;
                    }

                    document.getElementById('microtome_form_id').value = res.data.id;

                    if (res.data.microtome_daily) {
                        const daily = typeof res.data.microtome_daily === 'string'
                            ? JSON.parse(res.data.microtome_daily) : res.data.microtome_daily;
                        Object.keys(daily).forEach(field => {
                            if (daily[field]) {
                                Object.keys(daily[field]).forEach(day => {
                                    const el = document.getElementById(`microtome_daily_${field}_${day}`);
                                    if (el) {
                                        if (el.type === 'checkbox') {
                                            el.checked = !!daily[field][day];
                                        } else {
                                            el.value = daily[field][day] || '';
                                        }
                                    }
                                });
                            }
                        });
                    }
                })
                .catch(err => console.error('Load error:', err));
            }

            function clearMicrotomeInputs() {
                const container = document.querySelector('[id="TDPL/BE/FOM-036"]');
                if (!container) return;
                container.querySelectorAll('input[id^="microtome_daily_"]').forEach(el => {
                    if (el.type === 'checkbox') {
                        el.checked = false;
                    } else {
                        el.value = '';
                    }
                });
            }

            function clearMicrotomeFullForm() {
                document.getElementById('microtome_month_year').value = '';
                document.getElementById('microtome_instrument_id').value = '';
                document.getElementById('microtome_form_id').value = '';
                clearMicrotomeInputs();
            }

            (function() {
                function initMicrotomeForm() {
                    const formContainer = document.querySelector('[id="TDPL/BE/FOM-036"]');
                    if (!formContainer) return;
                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';
                        if (submitBtn) { submitBtn.textContent = 'Saving...'; submitBtn.disabled = true; }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
                        })
                        .then(res => res.json())
                        .then(result => {
                            if (result.success) {
                                showToastMicrotome('success', result.message || 'Saved successfully!');
                                if (result.form_id) document.getElementById('microtome_form_id').value = result.form_id;
                            } else {
                                showToastMicrotome('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(err => {
                            console.error('Error:', err);
                            showToastMicrotome('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) { submitBtn.textContent = originalText; submitBtn.disabled = false; }
                        });
                    });
                }
                function showToastMicrotome(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = 'position:fixed;top:20px;right:20px;z-index:9999;padding:12px 24px;border-radius:6px;color:#fff;font-size:14px;box-shadow:0 4px 12px rgba(0,0,0,0.15);background:' + (type === 'success' ? '#28a745' : '#dc3545');
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }
                if (document.readyState === 'loading') { document.addEventListener('DOMContentLoaded', initMicrotomeForm); } else { initMicrotomeForm(); }
            })();
        </script>

    </x-formTemplete>


    <x-formTemplete id="TDPL/BE/FOM-037" docNo="TDPL/BE/FOM-037" docName="Flotation Bath Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('newforms.be.forms.submit') }}">

        <input type="hidden" name="fb_form_id" id="fb_form_id">

        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Month &amp; Year:</strong>
                <input type="month" name="fb_month_year" id="fb_month_year"
                    style="border:1px solid #000; padding:5px; width:180px;"
                    onchange="loadFbForm()">
            </div>
            <div>
                <strong>Instrument ID / S. No.:</strong>
                <input list="fbEquipList" name="fb_instrument_id" id="fb_instrument_id"
                    style="border:1px solid #000; padding:5px; width:180px;" placeholder="All"
                    oninput="loadFbForm()">
                <datalist id="fbEquipList">
                    <option value="FB-001">
                    <option value="FB-002">
                    <option value="FB-003">
                </datalist>
            </div>
            <button type="button" onclick="clearFbFullForm()"
                style="background:#dc3545; color:#fff; border:none; padding:6px 18px; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <p style="margin-bottom:8px;">Note: Optimum temperature range is 52 - 56°C.</p>

        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:8px; text-align:center;">Date</th>
                    <th style="border:1px solid #000; padding:8px; text-align:center;">Clean Exterior</th>
                    <th style="border:1px solid #000; padding:8px; text-align:center;">Temperature @10:00 AM</th>
                    <th style="border:1px solid #000; padding:8px; text-align:center;">Distilled Water Changed</th>
                    <th style="border:1px solid #000; padding:8px; text-align:center;">Signature</th>
                    <th style="border:1px solid #000; padding:8px; text-align:center;">Temperature @5:30 PM</th>
                    <th style="border:1px solid #000; padding:8px; text-align:center;">Signature</th>
                </tr>
            </thead>
            <tbody>
                @for ($day = 1; $day <= 31; $day++)
                    <tr>
                        <td style="border:1px solid #000; padding:4px; font-weight:600; text-align:center;">
                            {{ str_pad($day, 2, '0', STR_PAD_LEFT) }}
                        </td>
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="checkbox" name="fb_daily[clean_exterior][{{ $day }}]"
                                id="fb_daily_clean_exterior_{{ $day }}" value="1">
                        </td>
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="number" name="fb_daily[temp_morning][{{ $day }}]"
                                id="fb_daily_temp_morning_{{ $day }}"
                                style="width:100%; padding:4px; border:1px solid #aaa; border-radius:4px;"
                                placeholder="°C">
                        </td>
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="checkbox" name="fb_daily[water_changed][{{ $day }}]"
                                id="fb_daily_water_changed_{{ $day }}" value="1">
                        </td>
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="fb_daily[signature_morning][{{ $day }}]"
                                id="fb_daily_signature_morning_{{ $day }}"
                                style="width:100%; padding:4px; border:1px solid #aaa; border-radius:4px;"
                                placeholder="Sign">
                        </td>
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="number" name="fb_daily[temp_evening][{{ $day }}]"
                                id="fb_daily_temp_evening_{{ $day }}"
                                style="width:100%; padding:4px; border:1px solid #aaa; border-radius:4px;"
                                placeholder="°C">
                        </td>
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text" name="fb_daily[signature_evening][{{ $day }}]"
                                id="fb_daily_signature_evening_{{ $day }}"
                                style="width:100%; padding:4px; border:1px solid #aaa; border-radius:4px;"
                                placeholder="Sign">
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>

        <script>
            function loadFbForm() {
                const monthYear = document.getElementById('fb_month_year').value;
                const instrument = document.getElementById('fb_instrument_id').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('fb_month_year', monthYear);
                if (instrument) params.append('fb_instrument_id', instrument);

                fetch(`/newforms/be/fb/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    clearFbInputs();

                    if (!res.data) {
                        document.getElementById('fb_form_id').value = '';
                        return;
                    }

                    document.getElementById('fb_form_id').value = res.data.id;

                    if (res.data.fb_daily) {
                        const daily = typeof res.data.fb_daily === 'string'
                            ? JSON.parse(res.data.fb_daily) : res.data.fb_daily;
                        Object.keys(daily).forEach(field => {
                            if (daily[field]) {
                                Object.keys(daily[field]).forEach(day => {
                                    const el = document.getElementById(`fb_daily_${field}_${day}`);
                                    if (el) {
                                        if (el.type === 'checkbox') {
                                            el.checked = !!daily[field][day];
                                        } else {
                                            el.value = daily[field][day] || '';
                                        }
                                    }
                                });
                            }
                        });
                    }
                })
                .catch(err => console.error('Load error:', err));
            }

            function clearFbInputs() {
                const container = document.querySelector('[id="TDPL/BE/FOM-037"]');
                if (!container) return;
                container.querySelectorAll('input[id^="fb_daily_"]').forEach(el => {
                    if (el.type === 'checkbox') {
                        el.checked = false;
                    } else {
                        el.value = '';
                    }
                });
            }

            function clearFbFullForm() {
                document.getElementById('fb_month_year').value = '';
                document.getElementById('fb_instrument_id').value = '';
                document.getElementById('fb_form_id').value = '';
                clearFbInputs();
            }

            (function() {
                function initFbForm() {
                    const formContainer = document.querySelector('[id="TDPL/BE/FOM-037"]');
                    if (!formContainer) return;
                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';
                        if (submitBtn) { submitBtn.textContent = 'Saving...'; submitBtn.disabled = true; }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
                        })
                        .then(res => res.json())
                        .then(result => {
                            if (result.success) {
                                showToastFb('success', result.message || 'Saved successfully!');
                                if (result.form_id) document.getElementById('fb_form_id').value = result.form_id;
                            } else {
                                showToastFb('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(err => {
                            console.error('Error:', err);
                            showToastFb('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) { submitBtn.textContent = originalText; submitBtn.disabled = false; }
                        });
                    });
                }
                function showToastFb(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = 'position:fixed;top:20px;right:20px;z-index:9999;padding:12px 24px;border-radius:6px;color:#fff;font-size:14px;box-shadow:0 4px 12px rgba(0,0,0,0.15);background:' + (type === 'success' ? '#28a745' : '#dc3545');
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }
                if (document.readyState === 'loading') { document.addEventListener('DOMContentLoaded', initFbForm); } else { initFbForm(); }
            })();
        </script>

    </x-formTemplete>


    <x-formTemplete id="TDPL/BE/FOM-038" docNo="TDPL/BE/FOM-038" docName="Grossing Station Maintenance Form"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('newforms.be.forms.submit') }}">

        <input type="hidden" name="gs_form_id" id="gs_form_id">

        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Month &amp; Year:</strong>
                <input type="month" name="gs_month_year" id="gs_month_year"
                    style="border:1px solid #000; padding:5px; width:180px;"
                    onchange="loadGsForm()">
            </div>
            <div>
                <strong>Instrument ID / S. No.:</strong>
                <input list="gsEquipList" name="gs_instrument_id" id="gs_instrument_id"
                    style="border:1px solid #000; padding:5px; width:180px;" placeholder="All"
                    oninput="loadGsForm()">
                <datalist id="gsEquipList">
                    <option value="GS-001">
                    <option value="GS-002">
                    <option value="GS-003">
                </datalist>
            </div>
            <button type="button" onclick="clearGsFullForm()"
                style="background:#dc3545; color:#fff; border:none; padding:6px 18px; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <h2 style="margin:20px 0; font-size:1.25em; font-weight:bold;">Daily Maintenance</h2>

        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px 8px; text-align:center;">Date</th>
                    <th style="border:1px solid #000; padding:6px 8px; text-align:center;">Clean with 70% Isopropyl Alcohol</th>
                    <th style="border:1px solid #000; padding:6px 8px; text-align:center;">Check Filters</th>
                    <th style="border:1px solid #000; padding:6px 8px; text-align:center;">Check Power Cord</th>
                    <th style="border:1px solid #000; padding:6px 8px; text-align:center;">Check Air Flow</th>
                    <th style="border:1px solid #000; padding:6px 8px; text-align:center;">Check UV Lamp</th>
                    <th style="border:1px solid #000; padding:6px 8px; text-align:center;">Check Fuse</th>
                    <th style="border:1px solid #000; padding:6px 8px; text-align:center;">Technician Signature</th>
                </tr>
            </thead>
            <tbody>
                @for ($day = 1; $day <= 31; $day++)
                    <tr>
                        <td style="border:1px solid #000; padding:4px 8px; font-weight:600; text-align:center;">
                            {{ $day }}
                        </td>
                        @foreach (['clean', 'filters', 'power_cord', 'airflow', 'uv_lamp', 'fuse', 'technician'] as $field)
                            <td style="border:1px solid #000; padding:4px 8px; text-align:center;">
                                <input type="text"
                                    name="gs_daily[{{ $field }}][{{ $day }}]"
                                    id="gs_daily_{{ $field }}_{{ $day }}"
                                    style="width:100%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                            </td>
                        @endforeach
                    </tr>
                @endfor
            </tbody>
        </table>

        <script>
            function loadGsForm() {
                const monthYear = document.getElementById('gs_month_year').value;
                const instrument = document.getElementById('gs_instrument_id').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('gs_month_year', monthYear);
                if (instrument) params.append('gs_instrument_id', instrument);

                fetch(`/newforms/be/gs/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    clearGsInputs();

                    if (!res.data) {
                        document.getElementById('gs_form_id').value = '';
                        return;
                    }

                    document.getElementById('gs_form_id').value = res.data.id;

                    if (res.data.gs_daily) {
                        const daily = typeof res.data.gs_daily === 'string'
                            ? JSON.parse(res.data.gs_daily) : res.data.gs_daily;
                        Object.keys(daily).forEach(field => {
                            if (daily[field]) {
                                Object.keys(daily[field]).forEach(day => {
                                    const el = document.getElementById(`gs_daily_${field}_${day}`);
                                    if (el) el.value = daily[field][day] || '';
                                });
                            }
                        });
                    }
                })
                .catch(err => console.error('Load error:', err));
            }

            function clearGsInputs() {
                const container = document.querySelector('[id="TDPL/BE/FOM-038"]');
                if (!container) return;
                container.querySelectorAll('input[id^="gs_daily_"]').forEach(el => {
                    el.value = '';
                });
            }

            function clearGsFullForm() {
                document.getElementById('gs_month_year').value = '';
                document.getElementById('gs_instrument_id').value = '';
                document.getElementById('gs_form_id').value = '';
                clearGsInputs();
            }

            (function() {
                function initGsForm() {
                    const formContainer = document.querySelector('[id="TDPL/BE/FOM-038"]');
                    if (!formContainer) return;
                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';
                        if (submitBtn) { submitBtn.textContent = 'Saving...'; submitBtn.disabled = true; }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
                        })
                        .then(res => res.json())
                        .then(result => {
                            if (result.success) {
                                showToastGs('success', result.message || 'Saved successfully!');
                                if (result.form_id) document.getElementById('gs_form_id').value = result.form_id;
                            } else {
                                showToastGs('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(err => {
                            console.error('Error:', err);
                            showToastGs('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) { submitBtn.textContent = originalText; submitBtn.disabled = false; }
                        });
                    });
                }
                function showToastGs(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = 'position:fixed;top:20px;right:20px;z-index:9999;padding:12px 24px;border-radius:6px;color:#fff;font-size:14px;box-shadow:0 4px 12px rgba(0,0,0,0.15);background:' + (type === 'success' ? '#28a745' : '#dc3545');
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }
                if (document.readyState === 'loading') { document.addEventListener('DOMContentLoaded', initGsForm); } else { initGsForm(); }
            })();
        </script>

    </x-formTemplete>


    <x-formTemplete id="TDPL/BE/REG-001" docNo="TDPL/BE/REG-001" docName="Equipment Breakdown Maintenance Register"
        issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('newforms.be.forms.submit') }}">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="ebFromDate"
                    onchange="loadEquipmentBreakdownRegister()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="ebToDate"
                    onchange="loadEquipmentBreakdownRegister()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>Location</strong></label>
                <input type="text" name="eb_location" id="ebLocation" list="ebLocList"
                    onchange="loadEquipmentBreakdownRegister()" onblur="loadEquipmentBreakdownRegister()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="ebLocList">
                    <option value="Hyderabad">
                    <option value="Bangalore">
                    <option value="Chennai">
                    <option value="Mumbai">
                    <option value="Delhi">
                </datalist>
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearEquipmentBreakdownFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <td rowspan="2" style="padding:6px; border:1px solid #000; font-weight:bold; text-align:center; background:#e9ecef;">Date</td>
                    <td rowspan="2" style="padding:6px; border:1px solid #000; font-weight:bold; text-align:center; background:#e9ecef;">Equipment Name & ID</td>
                    <td rowspan="2" style="padding:6px; border:1px solid #000; font-weight:bold; text-align:center; background:#e9ecef;">Problem Identified</td>
                    <td colspan="3" style="padding:6px; border:1px solid #000; font-weight:bold; text-align:center; background:#e9ecef;">Time attended & Other details</td>
                    <td rowspan="2" style="padding:6px; border:1px solid #000; font-weight:bold; text-align:center; background:#e9ecef;">Total Downtime</td>
                    <td rowspan="2" style="padding:6px; border:1px solid #000; font-weight:bold; text-align:center; background:#e9ecef;">Remarks if any</td>
                    <td rowspan="2" style="padding:6px; border:1px solid #000; font-weight:bold; text-align:center; background:#e9ecef;">Signature</td>
                </tr>
                <tr>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold; text-align:center; background:#e9ecef;">Breakdown Time</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold; text-align:center; background:#e9ecef;">Action Taken</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold; text-align:center; background:#e9ecef;">Name of Engineer</td>
                </tr>
            </thead>
            <tbody id="ebTableBody">
                <tr>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_equipment[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_problem[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_breakdown_time[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_action_taken[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_engineer_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_total_downtime[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_remarks[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_signature[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                </tr>
            </tbody>
        </table>

        <script>
            function loadEquipmentBreakdownRegister() {
                const fromDate = document.getElementById('ebFromDate').value;
                const toDate = document.getElementById('ebToDate').value;

                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('eb_from_date', fromDate);
                if (toDate) params.append('eb_to_date', toDate);

                const location = document.getElementById('ebLocation').value;
                if (location) params.append('eb_location', location);

                fetch(`/newforms/be/equipment-breakdown/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    const tbody = document.getElementById('ebTableBody');
                    if (!tbody) return;

                    tbody.innerHTML = '';

                    if (!res.data || res.data.length === 0) {
                        addEmptyRowREG001();
                        return;
                    }

                    res.data.forEach(row => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = buildREG001RowHTML(row);
                        tbody.appendChild(tr);
                    });

                    addEmptyRowREG001();
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function buildREG001RowHTML(row) {
                return `
                    <td style="border:1px solid #000; padding:4px;">
                        <input type="hidden" name="row_id[]" value="${row.id}">
                        <input type="date" name="row_date[]" value="${row.eb_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_equipment[]" value="${row.eb_equipment || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_problem[]" value="${row.eb_problem || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_breakdown_time[]" value="${row.eb_breakdown_time || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_action_taken[]" value="${row.eb_action_taken || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_engineer_name[]" value="${row.eb_engineer_name || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_total_downtime[]" value="${row.eb_total_downtime || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_remarks[]" value="${row.eb_remarks || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_signature[]" value="${row.eb_signature || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                `;
            }

            function addEmptyRowREG001() {
                const tbody = document.getElementById('ebTableBody');
                if (!tbody) return;

                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_equipment[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_problem[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_breakdown_time[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_action_taken[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_engineer_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_total_downtime[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_remarks[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_signature[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                `;
                tbody.appendChild(tr);
            }

            function clearEquipmentBreakdownFilters() {
                document.getElementById('ebFromDate').value = '';
                document.getElementById('ebToDate').value = '';
                document.getElementById('ebLocation').value = '';
                const tbody = document.getElementById('ebTableBody');
                if (tbody) {
                    tbody.innerHTML = '';
                    addEmptyRowREG001();
                }
            }

            // AJAX Submit for REG-001
            (function() {
                function initEquipmentBreakdownForm() {
                    const formContainer = document.querySelector('[id="TDPL/BE/REG-001"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastREG001('success', result.message || 'Saved successfully!');

                                const tbody = document.getElementById('ebTableBody');
                                if (tbody && result.data && result.data.length > 0) {
                                    tbody.innerHTML = '';
                                    result.data.forEach(row => {
                                        const tr = document.createElement('tr');
                                        tr.innerHTML = buildREG001RowHTML(row);
                                        tbody.appendChild(tr);
                                    });
                                    addEmptyRowREG001();
                                }
                            } else {
                                showToastREG001('error', result.message || 'Save failed!');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastREG001('error', 'Failed to save data');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });
                    });
                }

                function showToastREG001(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = 'position:fixed;top:20px;right:20px;z-index:9999;padding:12px 24px;border-radius:6px;color:#fff;font-size:14px;box-shadow:0 4px 12px rgba(0,0,0,0.15);background:' + (type === 'success' ? '#28a745' : '#dc3545');
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initEquipmentBreakdownForm);
                } else {
                    initEquipmentBreakdownForm();
                }
            })();
        </script>

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

    //     fetch("{{ route('newforms.be.forms.inline') }}", {
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
































    // loadH550Form, clearH550Table — moved to self-contained script inside FOM-020


    // loadD10Form, clearD10Form — moved to self-contained script inside FOM-021

    // loadAtpForm, clearAtpForm — moved to self-contained script inside FOM-022

    // loadTecForm, clearTecForm — moved to self-contained script inside FOM-023

    // loadBactAlertForm, clearBactAlertForm — moved to self-contained script inside FOM-024


    // loadElisaForm, clearElisaForm — moved to self-contained script inside FOM-026


    // loadRtpcrForm, clearRtpcrForm — moved to self-contained script inside FOM-028


    // loadCcForm, clearCcForm — moved to self-contained script inside FOM-029


    // loadMicForm, clearMicForm — moved to self-contained script inside FOM-034


    // loadLauramForm, clearLauramForm — moved to self-contained script inside FOM-035


    // loadEquipmentBreakdownRegister, clearEquipmentBreakdownRegister — moved to self-contained script inside REG-001




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



    // loadMicrotomeForm, clearMicrotomeForm — moved to self-contained script inside FOM-036

    // loadFbForm, clearFbForm — moved to self-contained script inside FOM-037

    // loadGsForm, clearGsForm — moved to self-contained script inside FOM-038

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

        fetch(`/newforms/be/maternal-marker/load?filter_patient_mobile=${mobile}`, {
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



    // loadTosohForm, clearTosohForm, fillTosohDaily — moved to self-contained script inside FOM-018



    // loadDxh560Form, clearDxh560Form — moved to self-contained script inside FOM-019


    // loadVitekForm, clearVitekForm — moved to self-contained script inside FOM-025

    // clearTbody, createInputCell, createEquipmentBreakdownRow, handleDatalistInput — moved to self-contained script inside REG-001



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



    // fillH550Daily — moved to self-contained script inside FOM-020

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
