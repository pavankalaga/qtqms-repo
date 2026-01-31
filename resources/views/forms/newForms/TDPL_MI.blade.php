@extends('layouts.base')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MI</title>
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
            <div style="font-size: 20px; ">MI </div>

        </div>
        <div class="icon-view">
            <div class="pc-content">
                <div class="pc-folder" onclick="showSection('TDPL/MI/FOM-001')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">HIV Consent-Counselling Form (Trilingual)</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MI/FOM-002')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Stain Quality Control Form (AFB Gram Stain)</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MI/FOM-002(A)')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Stain Quality Control Form - Gram Stain</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MI/FOM-002(B)')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Stain Quality Control Form - AFB Stain</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MI/FOM-002(C)')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Stain Quality Control Form - KOH Stain</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MI/FOM-003')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Biochemical Media QC Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MI/FOM-003(A)')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Biochemical Media QC Form - Oxidase Disc</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MI/FOM-003(B)')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Biochemical Media QC Form - Optochin Disc</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MI/FOM-003(C)')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Biochemical Media QC Form - Urease Agar</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MI/FOM-003(D)')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Biochemical Media QC Form - TSI Agar</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MI/FOM-003(E)')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Biochemical Media QC Form - Citrate Agar</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MI/FOM-003(F)')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Biochemical Media QC Form - BEA Agar</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MI/FOM-003(G)')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Biochemical Media QC Form - Indole Test</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MI/FOM-004')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">ATCC Strain Quality Control Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MI/FOM-004(A)')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">ATCC Strain Quality Control Form - E.Coli</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MI/FOM-004(B)')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">ATCC Strain Quality Control Form - Pseudomonas aeruginosa</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MI/FOM-004(C)')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">ATCC Strain Quality Control Form - Klebsiella pneumoniae</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MI/FOM-004(D)')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">ATCC Strain Quality Control Form - Enterococcus faecalis</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MI/FOM-004(E)')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">ATCC Strain Quality Control Form - Staphylococcus aureus</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MI/FOM-004(F)')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">ATCC Strain Quality Control Form - Staphylococcus haemolyticus</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MI/FOM-004(G)')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">ATCC Strain Quality Control Form - Candida albicans</span>
                </div>

                <div class="pc-folder" onclick="showSection('TDPL/MI/FOM-005')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Media Quality Control Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MI/FOM-005(A)')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Media Quality Control Form - Sheep Blood Agar</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MI/FOM-005(B)')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Media Quality Control Form - MacConkey Agar</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MI/FOM-005(C)')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Media Quality Control Form - Mueller Hinton Agar</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MI/FOM-005(D)')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Media Quality Control Form - Chocolate Agar</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MI/FOM-005(E)')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Media Quality Control Form - SDA Agar</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MI/REG-001')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Microbiology Work Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MI/REG-002')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label"> Media Preparation Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MI/REG-003')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Media Sterility Check Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MI/REG-004')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Vitek 2 Saline Quality Control Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MI/REG-005')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Loop Maintenance Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MI/REG-006')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Bact Alert QC Register</span>
                </div>
            </div>
        </div>
    </div>


    <x-formTemplete
        id="TDPL/MI/FOM-001"
        docNo="TDPL/MI/FOM-001"
        docName="HIV Consent-Counselling Form (Trilingual)"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ route('newforms.mi.forms.submit') }}"
        buttonText="Submit">

        <!-- Patient Mobile Filter -->
        <div class="d-flex align-items-center gap-2 mb-3 flex-wrap">
            <label class="fw-bold mb-0">Patient Mobile:</label>
            <input type="tel" id="MI_FOM001__filter_mobile" style="width:200px;" class="form-control form-control-sm"
                   placeholder="Enter mobile number">
            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="clearFOM001Filters()">Clear</button>
        </div>
        <input type="hidden" name="record_id" id="MI_FOM001__record_id">

        <div style="margin: 0 auto;padding: 20px;font-family: Arial, sans-serif;background: #fff;border: 1px solid;border-radius: 16px;">
            <!-- Language Toggle -->
            <div style="background: #f8f9fa; padding: 15px; border-radius: 8px; margin-bottom: 30px; text-align: center;">
                <label style="margin-right: 20px; font-weight: bold; color: #333;">Select Language:</label>
                <button type="button" onclick="TDPL_MI_FOM_001_showLanguage('english')" id="TDPL/MI/FOM-001_btn-english" style="padding: 10px 20px; margin: 5px; border: 2px solid #017535ff; background: #017535ff; color: white; border-radius: 5px; cursor: pointer; font-weight: bold;">English</button>
                <button type="button" onclick="TDPL_MI_FOM_001_showLanguage('hindi')" id="TDPL/MI/FOM-001_btn-hindi" style="padding: 10px 20px; margin: 5px; border: 2px solid #017535ff; background: white; color: #017535ff; border-radius: 5px; cursor: pointer; font-weight: bold;">हिंदी</button>
                <button type="button" onclick="TDPL_MI_FOM_001_showLanguage('telugu')" id="TDPL/MI/FOM-001_btn-telugu" style="padding: 10px 20px; margin: 5px; border: 2px solid #017535ff; background: white; color: #017535ff; border-radius: 5px; cursor: pointer; font-weight: bold;">తెలుగు</button>
            </div>

            <div style="background: #ffffff; padding: 30px; border: 1px solid #ddd; border-radius: 8px;">

                <!-- ENGLISH VERSION -->
                <div id="TDPL/MI/FOM-001_lang-english" class="language-content">
                    <h1 style="text-align: center; color: #d32f2f; border-bottom: 3px solid #d32f2f; padding-bottom: 10px; margin-bottom: 30px;">CONSENT FOR HIV TESTING</h1>

                    <!-- Patient Information -->
                    <div style="background: #f5f5f5; padding: 20px; border-radius: 5px; margin-bottom: 25px;">
                        <h3 style="color: #333; margin-top: 0;">Patient Information</h3>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Name:</label>
                                <input type="text" name="name" id="MI_FOM001__name" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Age:</label>
                                <input type="number" name="age" id="MI_FOM001__age" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                        </div>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Sex:</label>
                                <select name="sex" id="MI_FOM001__sex" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                    <option value="">Select</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Date:</label>
                                <input type="date" name="date" id="MI_FOM001__date" value="{{ date('Y-m-d') }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                        </div>
                        <div style="margin-bottom: 15px;">
                            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Address:</label>
                            <textarea name="address" id="MI_FOM001__address" rows="2" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"></textarea>
                        </div>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Mobile:</label>
                                <input type="tel" name="mobile" id="MI_FOM001__mobile" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Lab ID:</label>
                                <input type="text" name="lab_id" id="MI_FOM001__lab_id" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                        </div>
                    </div>

                    <!-- General Information -->
                    <div style="margin-bottom: 25px;">
                        <h2 style="color: #1976d2; border-bottom: 2px solid #1976d2; padding-bottom: 8px;">GENERAL INFORMATION ON HIV</h2>
                        <p style="line-height: 1.6; text-align: justify;">HIV or Human Immunodeficiency Virus is the causative agent of AIDS (Acquired Immune Deficiency Syndrome). There are two forms of HIV Virus - HIV-1 & HIV-2. However, HIV-1 is the predominant agent of HIV infection worldwide. HIV disease is characterized by progressive immunodeficiency associated with qualitative depletion of CD4+ T cells. Advanced HIV disease is referred to as the Acquired Immunodeficiency Syndrome or AIDS.</p>
                    </div>

                    <!-- Modes of Transmission -->
                    <div style="margin-bottom: 25px;">
                        <h3 style="color: #388e3c;">Modes of transmission</h3>
                        <ul style="line-height: 1.8;">
                            <li>Sexual contact both homosexual and heterosexual</li>
                            <li>Contaminated blood or blood products including contaminated injection and cosmetic equipment</li>
                            <li>Infected mothers to infant's intrapartum, perinatally and breast milk</li>
                        </ul>
                    </div>

                    <!-- Not Transmitted By -->
                    <div style="margin-bottom: 25px;">
                        <h3 style="color: #388e3c;">Not transmitted by:</h3>
                        <ul style="line-height: 1.8;">
                            <li>Kissing and hugging</li>
                            <li>Holding hands</li>
                            <li>Sharing drinking or eating utensils</li>
                            <li>Living in a house with an HIV positive person</li>
                            <li>Toilet seats</li>
                            <li>Mosquitoes or any other nonhuman organism</li>
                        </ul>
                    </div>

                    <!-- Diagnosis -->
                    <div style="margin-bottom: 25px;">
                        <h3 style="color: #f57c00;">Diagnosis</h3>
                        <h4>Demonstration of antibodies to HIV</h4>

                        <p style="line-height: 1.6; margin-bottom: 15px;"><strong>ELISA:</strong> This test detects antibodies to HIV. Antibodies are the body's reaction to the Virus. Generally, it appears in circulation 4-8 weeks after infection. A Reactive test means that a person is infected with HIV and can pass it on to others. By itself a positive test does not mean that a person has AIDS, which is the most advanced stage of HIV infection.</p>

                        <p style="line-height: 1.6; margin-bottom: 15px;"><strong>Non-Reactive:</strong> Non-Reactive test means that antibodies to HIV were not detected. This usually means that a person is not infected with HIV. In some cases, however, it may only mean that the infection has happened too recently for the test to turn reactive.</p>

                        <p style="line-height: 1.6; margin-bottom: 15px;"><strong>HIV Rapid Test (Qualitative):</strong> This test is visual rapid and sensitive immunoassay for the differential detection of HIV-1 & HIV-2 antibodies in human serum or plasma using HIV-1 and HIV-2 antigens immobilized on an Immunofiltration membrane.</p>
                    </div>

                    <!-- Incubation Period -->
                    <div style="margin-bottom: 25px;">
                        <h3 style="color: #7b1fa2;">Incubation Period</h3>
                        <p style="line-height: 1.6;">A person may carry the HIV virus for a span of 10 years before its progression to full blown AIDS. During this period the person may show no signs or symptoms of the underlying disease but is capable of transmitting the infection.</p>
                    </div>

                    <!-- Consent Section -->
                    <div style="background: #fff3e0; padding: 20px; border-radius: 5px; margin-bottom: 25px; border-left: 4px solid #ff9800;">
                        <h3 style="color: #e65100; margin-top: 0;">Consent:</h3>
                        <p style="line-height: 1.6; margin-bottom: 15px;">I, the undersigned agree to get my blood tested for HIV Antibodies. The significance and relevant information of this test (Pre-Test Counseling) have been provided by my treating Physician.</p>

                        <div style="margin-top: 15px;">
                            <label style="display: flex; align-items: center; cursor: pointer;">
                                <input type="checkbox" name="consent_given" id="MI_FOM001__consent_given" style="width: 20px; height: 20px; margin-right: 10px;">
                                <span style="font-weight: bold;">I agree to the above terms and consent to HIV testing</span>
                            </label>
                        </div>
                    </div>

                    <!-- Result Confidentiality -->
                    <div style="margin-bottom: 25px;">
                        <h3 style="color: #d32f2f;">Result:</h3>
                        <p style="line-height: 1.6; margin-bottom: 15px;">I understand that my result will be kept confidential and authorize the following person/agency to collect my report.</p>

                        <div style="background: #f5f5f5; padding: 15px; border-radius: 5px;">
                            <div style="margin-bottom: 15px;">
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Registered Medical Practitioner/Clinician Name:</label>
                                <input type="text" name="doctor_name" id="MI_FOM001__doctor_name" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                            <div style="margin-bottom: 15px;">
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Address:</label>
                                <input type="text" name="doctor_address" id="MI_FOM001__doctor_address" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Contact No:</label>
                                <input type="tel" name="doctor_contact" id="MI_FOM001__doctor_contact" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                        </div>

                        <p style="line-height: 1.6; margin-top: 15px; font-style: italic;">Post Test Counseling will be given by my treating Clinician/Doctor.</p>
                    </div>

                    <!-- Signatures -->
                    <div style="background: #e8f5e9; padding: 20px; border-radius: 5px; border-left: 4px solid #4caf50;">
                        <div style="margin-bottom: 20px;">
                            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Signature of Patient/Attendant (in case of minors):</label>
                            <input type="text" name="patient_signature" id="MI_FOM001__patient_signature" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" placeholder="Type your full name as signature">
                        </div>
                        <div>
                            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Date:</label>
                            <input type="date" name="signature_date" id="MI_FOM001__signature_date" value="{{ date('Y-m-d') }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                        </div>
                    </div>
                </div>

                <!-- HINDI VERSION -->
                <div id="TDPL/MI/FOM-001_lang-hindi" class="language-content" style="display: none;">
                    <h1 style="text-align: center; color: #d32f2f; border-bottom: 3px solid #d32f2f; padding-bottom: 10px; margin-bottom: 30px;">एचआईवी परीक्षण के लिए सहमति</h1>

                    <!-- Patient Information -->
                    <div style="background: #f5f5f5; padding: 20px; border-radius: 5px; margin-bottom: 25px;">
                        <h3 style="color: #333; margin-top: 0;">रोगी की जानकारी</h3>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">नाम:</label>
                                <input type="text" name="name_hi" id="MI_FOM001__name_hi" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">आयु:</label>
                                <input type="number" name="age_hi" id="MI_FOM001__age_hi" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                        </div>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">लिंग:</label>
                                <select name="sex_hi" id="MI_FOM001__sex_hi" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                    <option value="">चुनें</option>
                                    <option value="male">पुरुष</option>
                                    <option value="female">महिला</option>
                                    <option value="other">अन्य</option>
                                </select>
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">तारीख:</label>
                                <input type="date" name="date_hi" id="MI_FOM001__date_hi" value="{{ date('Y-m-d') }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                        </div>
                        <div style="margin-bottom: 15px;">
                            <label style="display: block; margin-bottom: 5px; font-weight: bold;">पता:</label>
                            <textarea name="address_hi" id="MI_FOM001__address_hi" rows="2" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"></textarea>
                        </div>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">मोबाइल नं:</label>
                                <input type="tel" name="mobile_hi" id="MI_FOM001__mobile_hi" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">LAB ID संख्या:</label>
                                <input type="text" name="lab_id_hi" id="MI_FOM001__lab_id_hi" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                        </div>
                    </div>

                    <!-- General Information -->
                    <div style="margin-bottom: 25px;">
                        <h2 style="color: #1976d2; border-bottom: 2px solid #1976d2; padding-bottom: 8px;">एचआईवी पर सामान्य जानकारी</h2>
                        <p style="line-height: 1.6; text-align: justify;">HIV या ह्यूमन इम्यूनो डेफिशिएंसी वायरस AIDS (एक्वायर्ड इम्यून डेफिसिएंसी सिंड्रोम) का कारक है। एचआईवी वायरस के दो रूप हैं। HIV-1 और HIV-2। कैसे भी एचआईवी -1 संक्रमण का मुख्य कारण है। एचआईवी रोग में शरीर की प्रतिरक्षा एवं सीडी 4 + टीसेल्स (CD4+ TCells) कम हो जाते हैं। उन्नत एचआईवी रोग को रोगो की बड़ी हुई अवस्था को एड्स (एक्वायर्ड इम्यून डेफिसिएंसी सिंड्रोम) कहते हैं।</p>
                    </div>

                    <!-- Modes of Transmission -->
                    <div style="margin-bottom: 25px;">
                        <h3 style="color: #388e3c;">संक्रमण के प्रकार</h3>
                        <ul style="line-height: 1.8;">
                            <li>संक्रमित व्यक्ति से असुरक्षित योन सम्बन्ध से या यौन संपर्क समलैंगिक और विषमलैंगिक</li>
                            <li>संक्रमित खून प्राप्त करने से, संक्रमित व्यक्ति के सुई लेने और संक्रमित सौंदर्य उपकरण से</li>
                            <li>संक्रमित माँ क बच्चे को और संक्रमित माँ क दूध से</li>
                        </ul>
                    </div>

                    <!-- Not Transmitted By -->
                    <div style="margin-bottom: 25px;">
                        <h3 style="color: #388e3c;">इनसे संक्रमण नहीं फैलता है</h3>
                        <ul style="line-height: 1.8;">
                            <li>गाल पर चुम्बन लेने और गले लगने से</li>
                            <li>हाथ पक्कडने से</li>
                            <li>खाने और पीने के बर्तनों की साझेदारी से</li>
                            <li>एच.आई.वी व्यक्ति के घर में रहने से</li>
                            <li>शौचालय की सीट से</li>
                            <li>मच्चर बन्दर और अन्य कोई जीव जो मनुष्य न हो</li>
                        </ul>
                    </div>

                    <!-- Diagnosis -->
                    <div style="margin-bottom: 25px;">
                        <h3 style="color: #f57c00;">जांच (परिक्षण)</h3>
                        <h4>एच.आई.वी एंटीबाडी का प्रमाण</h4>

                        <p style="line-height: 1.6; margin-bottom: 15px;"><strong>एलिसा:</strong> यह परीक्षण एचआईवी के लिए एंटीबॉडी का पता लगाता है। एंटीबाडीज वायरस के लिए शरीर की प्रतिक्रिया है। आम तौर पर संक्रमण के 4-8 सप्ताह बाद परिसंचरण में दिखाई देता है।</p>

                        <p style="line-height: 1.6; margin-bottom: 15px;"><strong>नॉन रिएक्टिव (निगेटिव):</strong> नॉन रिएक्टिव परीक्षण का मतलब है कि एचआईवी के लिए एंटीबॉडी का पता नहीं लगाया गया था। इसका आमतौर पर मतलब है कि व्यक्ति एचआईवी से संक्रमित नहीं है।</p>

                        <p style="line-height: 1.6; margin-bottom: 15px;"><strong>HIV RAPID TEST (Qualitative):</strong> यह परीक्षण HIV-1 और HIV-2 एंटीजन का उपयोग करके मानव सीरम या प्लाज्मा में HIV-1 और HIV-2 प्रतिपिंडों के अंतर का पता लगाने के लिए दृश्य तीव्र और संवेदनशील इम्युनोसे है।</p>
                    </div>

                    <!-- Incubation Period -->
                    <div style="margin-bottom: 25px;">
                        <h3 style="color: #7b1fa2;">उद्भवन अवधी (Incubation Period)</h3>
                        <p style="line-height: 1.6;">एचआईवी वायरस संक्रमण से पूरी तरह से एड्स होने में 10 वर्ष का समय लग सकता है। इस समय में व्यक्ति को कोई भी लक्षण या संकेत नहीं दिखाई देता लेकिन वो दूसरे व्यक्ति को संक्रमित कर सकता है।</p>
                    </div>

                    <!-- Consent Section -->
                    <div style="background: #fff3e0; padding: 20px; border-radius: 5px; margin-bottom: 25px; border-left: 4px solid #ff9800;">
                        <h3 style="color: #e65100; margin-top: 0;">सहमति</h3>
                        <p style="line-height: 1.6; margin-bottom: 15px;">मैं, अधोहस्ताक्षरी एचआईवी एंटीबॉडी के लिए अपने रक्त का परीक्षण करवाने के लिए सहमत हूं। इस परीक्षण (प्री टेस्ट काउंसलिंग) का महत्व और प्रासंगिक जानकारी मेरे उपचार चिकित्सक द्वारा प्रदान की गई है।</p>

                        <div style="margin-top: 15px;">
                            <label style="display: flex; align-items: center; cursor: pointer;">
                                <input type="checkbox" name="consent_given_hi" id="MI_FOM001__consent_given_hi" style="width: 20px; height: 20px; margin-right: 10px;">
                                <span style="font-weight: bold;">मैं उपरोक्त शर्तों से सहमत हूं और एचआईवी परीक्षण के लिए सहमति देता हूं</span>
                            </label>
                        </div>
                    </div>

                    <!-- Result Confidentiality -->
                    <div style="margin-bottom: 25px;">
                        <h3 style="color: #d32f2f;">परिणाम:</h3>
                        <p style="line-height: 1.6; margin-bottom: 15px;">मैं समझता हूं कि मेरी रिपोर्ट को एकत्र करने के लिए मेरे परिणाम को गोपनीय रखा जाएगा और निम्नलिखित व्यक्ति / एजेंसी को अधिकृत किया जाएगा।</p>

                        <div style="background: #f5f5f5; padding: 15px; border-radius: 5px;">
                            <div style="margin-bottom: 15px;">
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">परामर्श चिकित्सक का नाम:</label>
                                <input type="text" name="doctor_name_hi" id="MI_FOM001__doctor_name_hi" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                            <div style="margin-bottom: 15px;">
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">पता:</label>
                                <input type="text" name="doctor_address_hi" id="MI_FOM001__doctor_address_hi" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">संपर्क नंबर:</label>
                                <input type="tel" name="doctor_contact_hi" id="MI_FOM001__doctor_contact_hi" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                        </div>

                        <p style="line-height: 1.6; margin-top: 15px; font-style: italic;">परिक्षण पश्चात काउंसलिंग मेरे चिकित्सक करेंगे।</p>
                    </div>

                    <!-- Signatures -->
                    <div style="background: #e8f5e9; padding: 20px; border-radius: 5px; border-left: 4px solid #4caf50;">
                        <div style="margin-bottom: 20px;">
                            <label style="display: block; margin-bottom: 5px; font-weight: bold;">रोगी का हस्ताक्षर/अभिभावक (नाबालिग के मामले):</label>
                            <input type="text" name="patient_signature_hi" id="MI_FOM001__patient_signature_hi" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" placeholder="हस्ताक्षर के रूप में अपना पूरा नाम टाइप करें">
                        </div>
                        <div>
                            <label style="display: block; margin-bottom: 5px; font-weight: bold;">तारीख:</label>
                            <input type="date" name="signature_date_hi" id="MI_FOM001__signature_date_hi" value="{{ date('Y-m-d') }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                        </div>
                    </div>
                </div>

                <!-- TELUGU VERSION -->
                <div id="TDPL/MI/FOM-001_lang-telugu" class="language-content" style="display: none;">
                    <h1 style="text-align: center; color: #d32f2f; border-bottom: 3px solid #d32f2f; padding-bottom: 10px; margin-bottom: 30px;">HIV పరీక్ష కోసం సమ్మతి</h1>

                    <!-- Patient Information -->
                    <div style="background: #f5f5f5; padding: 20px; border-radius: 5px; margin-bottom: 25px;">
                        <h3 style="color: #333; margin-top: 0;">రోగి సమాచారం</h3>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">పేరు:</label>
                                <input type="text" name="name_te" id="MI_FOM001__name_te" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">వయస్సు:</label>
                                <input type="number" name="age_te" id="MI_FOM001__age_te" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                        </div>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">లింగం:</label>
                                <select name="sex_te" id="MI_FOM001__sex_te" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                    <option value="">ఎంచుకోండి</option>
                                    <option value="male">పురుషుడు</option>
                                    <option value="female">స్త్రీ</option>
                                    <option value="other">ఇతర</option>
                                </select>
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">తేదీ:</label>
                                <input type="date" name="date_te" id="MI_FOM001__date_te" value="{{ date('Y-m-d') }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                        </div>
                        <div style="margin-bottom: 15px;">
                            <label style="display: block; margin-bottom: 5px; font-weight: bold;">చిరునామా:</label>
                            <textarea name="address_te" id="MI_FOM001__address_te" rows="2" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"></textarea>
                        </div>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">మొబైల్:</label>
                                <input type="tel" name="mobile_te" id="MI_FOM001__mobile_te" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">ల్యాబ్ ID:</label>
                                <input type="text" name="lab_id_te" id="MI_FOM001__lab_id_te" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                        </div>
                    </div>

                    <!-- General Information -->
                    <div style="margin-bottom: 25px;">
                        <h2 style="color: #1976d2; border-bottom: 2px solid #1976d2; padding-bottom: 8px;">HIV పై సాధారణ సమాచారం</h2>
                        <p style="line-height: 1.6; text-align: justify;">HIV లేదా హ్యూమన్ ఇమ్యునో డెఫిషియెన్సీ వైరస్ AIDS (అక్వైర్డ్ ఇమ్యూన్ డెఫిషియెన్సీ సిండ్రోమ్) యొక్క కారకం. HIV వైరస్ యొక్క రెండు రూపాలు ఉన్నాయి. HIV-1 & HIV-2. అయితే HIV-1 అనేది ప్రపంచవ్యాప్తంగా HIV సంక్రమణ యొక్క ప్రధాన ఏజెంట్. HIV వ్యాధి CD4+ T కణాల గుణాత్మక క్షీణతతో సంబంధం ఉన్న ప్రగతిశీల రోగనిరోధక శక్తి ద్వారా వర్గీకరించబడుతుంది. అధునాతన HIV వ్యాధిని అక్వైర్డ్ ఇమ్యునో డెఫిషియెన్సీ సిండ్రోమ్ లేదా AIDS అని పిలుస్తారు.</p>
                    </div>

                    <!-- Modes of Transmission -->
                    <div style="margin-bottom: 25px;">
                        <h3 style="color: #388e3c;">ట్రాన్స్మిషన్ రీతులు</h3>
                        <ul style="line-height: 1.8;">
                            <li>స్వలింగ సంపర్కం మరియు భిన్న లింగాలు</li>
                            <li>కలుషితమైన ఇంజెక్షన్ మరియు సౌందర్య సాధనాలతో సహా కలుషితమైన రక్తం లేదా రక్త ఉత్పత్తులు</li>
                            <li>వ్యాధి సోకిన తల్లులకు శిశువు యొక్క ఇంట్రాపార్టమ్, పెరినాటల్ మరియు తల్లి పాలు</li>
                        </ul>
                    </div>

                    <!-- Not Transmitted By -->
                    <div style="margin-bottom: 25px;">
                        <h3 style="color: #388e3c;">వ్యాధి వ్యాపించదు</h3>
                        <ul style="line-height: 1.8;">
                            <li>ముద్దులు మరియు కౌగిలించుకోవడం</li>
                            <li>చేతులు పట్టుకోవడం</li>
                            <li>తాగడం లేదా తినే పాత్రలు పంచుకోవడం</li>
                            <li>HIV పాజిటివ్ వ్యక్తి ఉన్న ఇంట్లో నివసించడం</li>
                            <li>టాయిలెట్ సీట్లు</li>
                            <li>దోమలు లేదా మరేదైనా మానవరహిత జీవి</li>
                        </ul>
                    </div>

                    <!-- Diagnosis -->
                    <div style="margin-bottom: 25px;">
                        <h3 style="color: #f57c00;">రోగ నిర్ధారణ</h3>
                        <h4>HIV కి ప్రతిరోధకాల ప్రదర్శన</h4>

                        <p style="line-height: 1.6; margin-bottom: 15px;"><strong>ELISA:</strong> ఈ పరీక్ష HIV కి ప్రతిరోధకాలను గుర్తిస్తుంది. యాంటీబాడీస్ అనేది వైరస్‌కి శరీర ప్రతిచర్య. సాధారణంగా ఇన్‌ఫెక్షన్ తర్వాత 4-8 వారాల తర్వాత రక్తప్రసరణలో కనిపిస్తుంది.</p>

                        <p style="line-height: 1.6; margin-bottom: 15px;"><strong>నాన్-రియాక్టివ్:</strong> నాన్-రియాక్టివ్ పరీక్ష అంటే HIV కి ప్రతిరోధకాలు కనుగొనబడలేదు. దీని అర్థం సాధారణంగా ఆ వ్యక్తికి HIV సోకలేదు.</p>

                        <p style="line-height: 1.6; margin-bottom: 15px;"><strong>HIV ర్యాపిడ్ టెస్ట్ (క్వాలిటేటివ్):</strong> ఇమ్యునోఫిల్ట్రేషన్ పొరపై స్థిరీకరించబడిన HIV-1 మరియు HIV-2 యాంటిజెన్‌లను ఉపయోగించి మానవ సీరం లేదా ప్లాస్మాలో HIV-1 & HIV-2 యాంటీబాడీస్ యొక్క అవకలన గుర్తింపు కోసం ఈ పరీక్ష దృశ్య వేగవంతమైన మరియు సున్నితమైన రోగనిరోధక పరీక్ష.</p>
                    </div>

                    <!-- Incubation Period -->
                    <div style="margin-bottom: 25px;">
                        <h3 style="color: #7b1fa2;">పొదిగే కాలం</h3>
                        <p style="line-height: 1.6;">ఒక వ్యక్తి పూర్తిగా ఎయిడ్స్‌గా మారడానికి ముందు 10 సంవత్సరాల పాటు HIV వైరస్‌ని కలిగి ఉండవచ్చు. ఈ కాలంలో వ్యక్తికి అంతర్లీన వ్యాధి సంకేతాలు మరియు లక్షణాలు కనిపించవు కానీ ఇన్‌ఫెక్షన్‌ను ప్రసారం చేయగల సామర్థ్యం ఉంది.</p>
                    </div>

                    <!-- Consent Section -->
                    <div style="background: #fff3e0; padding: 20px; border-radius: 5px; margin-bottom: 25px; border-left: 4px solid #ff9800;">
                        <h3 style="color: #e65100; margin-top: 0;">సమ్మతి:</h3>
                        <p style="line-height: 1.6; margin-bottom: 15px;">నేను, కింద సంతకం చేసిన వ్యక్తి HIV యాంటీబాడీస్ కోసం నా రక్తాన్ని పరీక్షించుకోవడానికి అంగీకరిస్తున్నాను. ఈ పరీక్ష యొక్క ప్రాముఖ్యత మరియు సంబంధిత సమాచారం (ప్రీ టెస్ట్ కౌన్సెలింగ్) నా చికిత్సా వైద్యుడు అందించారు.</p>

                        <div style="margin-top: 15px;">
                            <label style="display: flex; align-items: center; cursor: pointer;">
                                <input type="checkbox" name="consent_given_te" id="MI_FOM001__consent_given_te" style="width: 20px; height: 20px; margin-right: 10px;">
                                <span style="font-weight: bold;">నేను పై నిబంధనలకు అంగీకరిస్తున్నాను మరియు HIV పరీక్షకు సమ్మతి ఇస్తున్నాను</span>
                            </label>
                        </div>
                    </div>

                    <!-- Result Confidentiality -->
                    <div style="margin-bottom: 25px;">
                        <h3 style="color: #d32f2f;">ఫలితం:</h3>
                        <p style="line-height: 1.6; margin-bottom: 15px;">నా ఫలితం గోప్యంగా ఉంచబడుతుందని నేను అర్థం చేసుకున్నాను మరియు నా నివేదికను సేకరించడానికి క్రింది వ్యక్తి / ఏజెన్సీకి అధికారం నా పర్మిషన్ ఇవ్వబడింది.</p>

                        <div style="background: #f5f5f5; padding: 15px; border-radius: 5px;">
                            <div style="margin-bottom: 15px;">
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">రిజిస్టర్డ్ మెడికల్ ప్రాక్టీషనర్/క్లినిషియన్ పేరు:</label>
                                <input type="text" name="doctor_name_te" id="MI_FOM001__doctor_name_te" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                            <div style="margin-bottom: 15px;">
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">చిరునామా:</label>
                                <input type="text" name="doctor_address_te" id="MI_FOM001__doctor_address_te" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">సంప్రదింపు నంబర్:</label>
                                <input type="tel" name="doctor_contact_te" id="MI_FOM001__doctor_contact_te" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                        </div>

                        <p style="line-height: 1.6; margin-top: 15px; font-style: italic;">పోస్ట్ టెస్ట్ కౌన్సెలింగ్ నా చికిత్స చేసే వైద్యుడు/డాక్టర్ ద్వారా ఇవ్వబడుతుంది.</p>
                    </div>

                    <!-- Signatures -->
                    <div style="background: #e8f5e9; padding: 20px; border-radius: 5px; border-left: 4px solid #4caf50;">
                        <div style="margin-bottom: 20px;">
                            <label style="display: block; margin-bottom: 5px; font-weight: bold;">రోగి/అటెండెంట్ సంతకం (మైనర్‌ల విషయంలో):</label>
                            <input type="text" name="patient_signature_te" id="MI_FOM001__patient_signature_te" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" placeholder="సంతకం కోసం మీ పూర్తి పేరును టైప్ చేయండి">
                        </div>
                        <div>
                            <label style="display: block; margin-bottom: 5px; font-weight: bold;">తేదీ:</label>
                            <input type="date" name="signature_date_te" id="MI_FOM001__signature_date_te" value="{{ date('Y-m-d') }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                        </div>
                    </div>
                </div>

            </div>

            <script>
                function TDPL_MI_FOM_001_showLanguage(lang) {
                    // Hide all language content
                    document.querySelectorAll('.language-content').forEach(function(el) {
                        el.style.display = 'none';
                    });

                    // Reset all button styles
                    document.querySelectorAll('[id^="TDPL/MI/FOM-001_btn-"]').forEach(function(btn) {
                        btn.style.background = 'white';
                        btn.style.color = '#017535ff';
                    });

                    // Show selected language
                    document.getElementById('TDPL/MI/FOM-001_lang-' + lang).style.display = 'block';

                    // Highlight selected button
                    document.getElementById('TDPL/MI/FOM-001_btn-' + lang).style.background = '#017535ff';
                    document.getElementById('TDPL/MI/FOM-001_btn-' + lang).style.color = 'white';
                }
            </script>
        </div>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/MI/FOM-002"
        docNo="TDPL/MI/FOM-002"
        docName="Stain Quality Control Form (AFB Gram Stain)"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ route('newforms.mi.forms.submit') }}"
        buttonText="Submit">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MI_FOM002__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM002Data()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MI_FOM002__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM002Data()">
            </div>
            <div>
                <button type="button" onclick="clearMIFOM002Filters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px;">
            <thead>
                <tr>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Date of Quality Check</th>
                    <th colspan="3" style="border:1px solid #000; padding:6px; text-align:center;">Details of the kit</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">ATCC Strain Used as Control</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Result Expected</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Result Obtained</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Done By</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Corrective & Preventive Action</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Microbiologist and Remarks</th>
                </tr>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Name of Manufacturer</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Code Lot Number</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Expiry Date</th>
                </tr>
            </thead>
            <tbody id="MI_FOM002__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-002(A)"
        docNo="TDPL/MI/FOM-002(A)"
        docName="Stain Quality Control Form - Gram Stain"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ route('newforms.mi.forms.submit') }}"
        buttonText="Submit">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MI_FOM002A__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM002AData()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MI_FOM002A__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM002AData()">
            </div>
            <div>
                <button type="button" onclick="clearMIFOM002AFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px;">
            <thead>
                <tr>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Date of Quality Check</th>
                    <th colspan="3" style="border:1px solid #000; padding:6px; text-align:center;">Details of the kit</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">ATCC Strain Used as Control</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Result Expected</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Result Obtained</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Done By</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Corrective & Preventive Action</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Microbiologist and Remarks</th>
                </tr>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Name of Manufacturer</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Code Lot Number</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Expiry Date</th>
                </tr>
            </thead>
            <tbody id="MI_FOM002A__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-002(B)"
        docNo="TDPL/MI/FOM-002(B)"
        docName="Stain Quality Control Form - AFB Stain"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ route('newforms.mi.forms.submit') }}"
        buttonText="Submit">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MI_FOM002B__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM002BData()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MI_FOM002B__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM002BData()">
            </div>
            <div>
                <button type="button" onclick="clearMIFOM002BFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px;">
            <thead>
                <tr>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Date of Quality Check</th>
                    <th colspan="3" style="border:1px solid #000; padding:6px; text-align:center;">Details of the kit</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">ATCC Strain Used as Control</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Result Expected</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Result Obtained</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Done By</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Corrective & Preventive Action</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Microbiologist and Remarks</th>
                </tr>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Name of Manufacturer</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Code Lot Number</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Expiry Date</th>
                </tr>
            </thead>
            <tbody id="MI_FOM002B__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-002(C)"
        docNo="TDPL/MI/FOM-002(C)"
        docName="Stain Quality Control Form - KOH Stain"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ route('newforms.mi.forms.submit') }}"
        buttonText="Submit">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MI_FOM002C__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM002CData()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MI_FOM002C__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM002CData()">
            </div>
            <div>
                <button type="button" onclick="clearMIFOM002CFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px;">
            <thead>
                <tr>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Date of Quality Check</th>
                    <th colspan="3" style="border:1px solid #000; padding:6px; text-align:center;">Details of the kit</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">ATCC Strain Used as Control</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Result Expected</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Result Obtained</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Done By</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Corrective & Preventive Action</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Microbiologist and Remarks</th>
                </tr>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Name of Manufacturer</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Code Lot Number</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Expiry Date</th>
                </tr>
            </thead>
            <tbody id="MI_FOM002C__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-003"
        docNo="TDPL/MI/FOM-003"
        docName="Biochemical Media QC Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ route('newforms.mi.forms.submit') }}"
        buttonText="Submit">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MI_FOM003__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM003Data()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MI_FOM003__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM003Data()">
            </div>
            <div>
                <button type="button" onclick="clearMIFOM003Filters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Date</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Product name / Code / Manufacturer / Lot No. / Date of Expiry</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Date of Analysis / Done By</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Appearance of Media / pH / Appearance on Tube / Volume</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Incubation Period / Temperature</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">ATCC Strain Used / Code</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Growth Expected</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Growth Observed</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Corrective & Preventive Action</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Microbiologist Signature</th>
                </tr>
            </thead>
            <tbody id="MI_FOM003__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-003(A)"
        docNo="TDPL/MI/FOM-003(A)"
        docName="Biochemical Media QC Form - Oxidase Disc"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ url('/newforms/mi/forms/submit') }}"
        buttonText="Submit">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MI_FOM003A__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM003AData()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MI_FOM003A__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM003AData()">
            </div>
            <div>
                <button type="button" onclick="clearMIFOM003AFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Date</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Product name / Code / Manufacturer / Lot No. / Date of Expiry
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Date of Analysis / Done By
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Appearance of Media / pH / Appearance on Tube / Volume
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Incubation Period / Temperature
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        ATCC Strain Used / Code
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Growth Expected
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Growth Observed
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Corrective & Preventive Action
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Microbiologist Signature
                    </th>
                </tr>
            </thead>

            <tbody id="MI_FOM003A__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-003(B)"
        docNo="TDPL/MI/FOM-003(B)"
        docName="Biochemical Media QC Form - Optochin Disc"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ url('/newforms/mi/forms/submit') }}"
        buttonText="Submit">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MI_FOM003B__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM003BData()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MI_FOM003B__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM003BData()">
            </div>
            <div>
                <button type="button" onclick="clearMIFOM003BFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Date</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Product name / Code / Manufacturer / Lot No. / Date of Expiry
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Date of Analysis / Done By
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Appearance of Media / pH / Appearance on Tube / Volume
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Incubation Period / Temperature
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        ATCC Strain Used / Code
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Growth Expected
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Growth Observed
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Corrective & Preventive Action
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Microbiologist Signature
                    </th>
                </tr>
            </thead>

            <tbody id="MI_FOM003B__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-003(C)"
        docNo="TDPL/MI/FOM-003(C)"
        docName="Biochemical Media QC Form - Urease Agar"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ url('/newforms/mi/forms/submit') }}"
        buttonText="Submit">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MI_FOM003C__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM003CData()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MI_FOM003C__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM003CData()">
            </div>
            <div>
                <button type="button" onclick="clearMIFOM003CFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Date</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Product name / Code / Manufacturer / Lot No. / Date of Expiry
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Date of Analysis / Done By
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Appearance of Media / pH / Appearance on Tube / Volume
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Incubation Period / Temperature
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        ATCC Strain Used / Code
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Growth Expected
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Growth Observed
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Corrective & Preventive Action
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Microbiologist Signature
                    </th>
                </tr>
            </thead>

            <tbody id="MI_FOM003C__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-003(D)"
        docNo="TDPL/MI/FOM-003(D)"
        docName="Biochemical Media QC Form - TSI Agar"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ url('/newforms/mi/forms/submit') }}"
        buttonText="Submit">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MI_FOM003D__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM003DData()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MI_FOM003D__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM003DData()">
            </div>
            <div>
                <button type="button" onclick="clearMIFOM003DFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Date</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Product name / Code / Manufacturer / Lot No. / Date of Expiry
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Date of Analysis / Done By
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Appearance of Media / pH / Appearance on Tube / Volume
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Incubation Period / Temperature
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        ATCC Strain Used / Code
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Growth Expected
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Growth Observed
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Corrective & Preventive Action
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Microbiologist Signature
                    </th>
                </tr>
            </thead>

            <tbody id="MI_FOM003D__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-003(E)"
        docNo="TDPL/MI/FOM-003(E)"
        docName="Biochemical Media QC Form - Citrate Agar"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ url('/newforms/mi/forms/submit') }}"
        buttonText="Submit">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MI_FOM003E__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM003EData()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MI_FOM003E__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM003EData()">
            </div>
            <div>
                <button type="button" onclick="clearMIFOM003EFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Date</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Product name / Code / Manufacturer / Lot No. / Date of Expiry
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Date of Analysis / Done By
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Appearance of Media / pH / Appearance on Tube / Volume
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Incubation Period / Temperature
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        ATCC Strain Used / Code
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Growth Expected
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Growth Observed
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Corrective & Preventive Action
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Microbiologist Signature
                    </th>
                </tr>
            </thead>

            <tbody id="MI_FOM003E__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-003(F)"
        docNo="TDPL/MI/FOM-003(F)"
        docName="Biochemical Media QC Form - BEA Agar"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ url('/newforms/mi/forms/submit') }}"
        buttonText="Submit">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MI_FOM003F__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM003FData()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MI_FOM003F__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM003FData()">
            </div>
            <div>
                <button type="button" onclick="clearMIFOM003FFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Date</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Product name / Code / Manufacturer / Lot No. / Date of Expiry
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Date of Analysis / Done By
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Appearance of Media / pH / Appearance on Tube / Volume
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Incubation Period / Temperature
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        ATCC Strain Used / Code
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Growth Expected
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Growth Observed
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Corrective & Preventive Action
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Microbiologist Signature
                    </th>
                </tr>
            </thead>

            <tbody id="MI_FOM003F__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-003(G)"
        docNo="TDPL/MI/FOM-003(G)"
        docName="Biochemical Media QC Form - Indole Test"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ url('/newforms/mi/forms/submit') }}"
        buttonText="Submit">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MI_FOM003G__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM003GData()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MI_FOM003G__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM003GData()">
            </div>
            <div>
                <button type="button" onclick="clearMIFOM003GFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Date</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Product name / Code / Manufacturer / Lot No. / Date of Expiry
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Date of Analysis / Done By
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Appearance of Media / pH / Appearance on Tube / Volume
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Incubation Period / Temperature
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        ATCC Strain Used / Code
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Growth Expected
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Growth Observed
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Corrective & Preventive Action
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        Microbiologist Signature
                    </th>
                </tr>
            </thead>

            <tbody id="MI_FOM003G__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/MI/FOM-004"
        docNo="TDPL/MI/FOM-004"
        docName="ATCC Strain Quality Control Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ url('/newforms/mi/forms/submit') }}"
        buttonText="Submit">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MI_FOM004__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM004Data()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MI_FOM004__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM004Data()">
            </div>
            <div>
                <button type="button" onclick="clearMIFOM004Filters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px; text-align:center;">
            <thead>
                <tr>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Date Of Q.C.</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">ATCC strain / Code / Lot No. / Manufacturer / Expiry Date</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Cultural Characteristics / Microscopic Features / Biochemical Reactions</th>

                    <th colspan="3" style="border:1px solid #000; padding:6px; text-align:center;">Antibiotic Sensitivity Test</th>

                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Done By</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">CAPA</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Approved By / Signature / Remarks</th>
                </tr>

                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Name</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Expected Zone (mm)</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Obtained Zone (mm)</th>
                </tr>
            </thead>

            <tbody id="MI_FOM004__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-004(A)"
        docNo="TDPL/MI/FOM-004(A)"
        docName="ATCC Strain Quality Control Form - E.Coli"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ url('/newforms/mi/forms/submit') }}"
        buttonText="Submit">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MI_FOM004A__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM004AData()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MI_FOM004A__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM004AData()">
            </div>
            <div>
                <button type="button" onclick="clearMIFOM004AFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px; text-align:center;">
            <thead>
                <tr>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Date Of Q.C.</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">ATCC strain / Code / Lot No. / Manufacturer / Expiry Date</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Cultural Characteristics / Microscopic Features / Biochemical Reactions</th>

                    <th colspan="3" style="border:1px solid #000; padding:6px; text-align:center;">Antibiotic Sensitivity Test</th>

                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Done By</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">CAPA</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Approved By / Signature / Remarks</th>
                </tr>

                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Name</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Expected Zone (mm)</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Obtained Zone (mm)</th>
                </tr>
            </thead>

            <tbody id="MI_FOM004A__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-004(B)"
        docNo="TDPL/MI/FOM-004(B)"
        docName="ATCC Strain Quality Control Form - Pseudomonas aeruginosa"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ url('/newforms/mi/forms/submit') }}"
        buttonText="Submit">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MI_FOM004B__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM004BData()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MI_FOM004B__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM004BData()">
            </div>
            <div>
                <button type="button" onclick="clearMIFOM004BFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px; text-align:center;">
            <thead>
                <tr>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Date Of Q.C.</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">ATCC strain / Code / Lot No. / Manufacturer / Expiry Date</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Cultural Characteristics / Microscopic Features / Biochemical Reactions</th>

                    <th colspan="3" style="border:1px solid #000; padding:6px; text-align:center;">Antibiotic Sensitivity Test</th>

                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Done By</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">CAPA</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Approved By / Signature / Remarks</th>
                </tr>

                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Name</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Expected Zone (mm)</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Obtained Zone (mm)</th>
                </tr>
            </thead>

            <tbody id="MI_FOM004B__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-004(C)"
        docNo="TDPL/MI/FOM-004(C)"
        docName="ATCC Strain Quality Control Form - Klebsiella pneumoniae"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ url('/newforms/mi/forms/submit') }}"
        buttonText="Submit">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MI_FOM004C__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM004CData()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MI_FOM004C__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM004CData()">
            </div>
            <div>
                <button type="button" onclick="clearMIFOM004CFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px; text-align:center;">
            <thead>
                <tr>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Date Of Q.C.</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">ATCC strain / Code / Lot No. / Manufacturer / Expiry Date</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Cultural Characteristics / Microscopic Features / Biochemical Reactions</th>

                    <th colspan="3" style="border:1px solid #000; padding:6px; text-align:center;">Antibiotic Sensitivity Test</th>

                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Done By</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">CAPA</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Approved By / Signature / Remarks</th>
                </tr>

                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Name</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Expected Zone (mm)</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Obtained Zone (mm)</th>
                </tr>
            </thead>

            <tbody id="MI_FOM004C__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-004(D)"
        docNo="TDPL/MI/FOM-004(D)"
        docName="ATCC Strain Quality Control Form - Enterococcus faecalis"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ url('/newforms/mi/forms/submit') }}"
        buttonText="Submit">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MI_FOM004D__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM004DData()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MI_FOM004D__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM004DData()">
            </div>
            <div>
                <button type="button" onclick="clearMIFOM004DFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px; text-align:center;">
            <thead>
                <tr>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Date Of Q.C.</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">ATCC strain / Code / Lot No. / Manufacturer / Expiry Date</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Cultural Characteristics / Microscopic Features / Biochemical Reactions</th>

                    <th colspan="3" style="border:1px solid #000; padding:6px; text-align:center;">Antibiotic Sensitivity Test</th>

                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Done By</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">CAPA</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Approved By / Signature / Remarks</th>
                </tr>

                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Name</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Expected Zone (mm)</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Obtained Zone (mm)</th>
                </tr>
            </thead>

            <tbody id="MI_FOM004D__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-004(E)"
        docNo="TDPL/MI/FOM-004(E)"
        docName="ATCC Strain Quality Control Form - Staphylococcus aureus"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ url('/newforms/mi/forms/submit') }}"
        buttonText="Submit">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MI_FOM004E__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM004EData()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MI_FOM004E__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM004EData()">
            </div>
            <div>
                <button type="button" onclick="clearMIFOM004EFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px; text-align:center;">
            <thead>
                <tr>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Date Of Q.C.</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">ATCC strain / Code / Lot No. / Manufacturer / Expiry Date</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Cultural Characteristics / Microscopic Features / Biochemical Reactions</th>

                    <th colspan="3" style="border:1px solid #000; padding:6px; text-align:center;">Antibiotic Sensitivity Test</th>

                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Done By</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">CAPA</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Approved By / Signature / Remarks</th>
                </tr>

                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Name</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Expected Zone (mm)</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Obtained Zone (mm)</th>
                </tr>
            </thead>

            <tbody id="MI_FOM004E__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-004(F)"
        docNo="TDPL/MI/FOM-004(F)"
        docName="ATCC Strain Quality Control Form - Staphylococcus haemolyticus"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ url('/newforms/mi/forms/submit') }}"
        buttonText="Submit">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MI_FOM004F__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM004FData()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MI_FOM004F__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM004FData()">
            </div>
            <div>
                <button type="button" onclick="clearMIFOM004FFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px; text-align:center;">
            <thead>
                <tr>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Date Of Q.C.</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">ATCC strain / Code / Lot No. / Manufacturer / Expiry Date</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Cultural Characteristics / Microscopic Features / Biochemical Reactions</th>

                    <th colspan="3" style="border:1px solid #000; padding:6px; text-align:center;">Antibiotic Sensitivity Test</th>

                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Done By</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">CAPA</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Approved By / Signature / Remarks</th>
                </tr>

                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Name</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Expected Zone (mm)</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Obtained Zone (mm)</th>
                </tr>
            </thead>

            <tbody id="MI_FOM004F__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-004(G)"
        docNo="TDPL/MI/FOM-004(G)"
        docName="ATCC Strain Quality Control Form - Candida albicans"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ url('/newforms/mi/forms/submit') }}"
        buttonText="Submit">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MI_FOM004G__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM004GData()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MI_FOM004G__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM004GData()">
            </div>
            <div>
                <button type="button" onclick="clearMIFOM004GFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px; text-align:center;">
            <thead>
                <tr>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Date Of Q.C.</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">ATCC strain / Code / Lot No. / Manufacturer / Expiry Date</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Cultural Characteristics / Microscopic Features / Biochemical Reactions</th>

                    <th colspan="3" style="border:1px solid #000; padding:6px; text-align:center;">Antibiotic Sensitivity Test</th>

                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Done By</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">CAPA</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Approved By / Signature / Remarks</th>
                </tr>

                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Name</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Expected Zone (mm)</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Obtained Zone (mm)</th>
                </tr>
            </thead>

            <tbody id="MI_FOM004G__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/MI/FOM-005"
        docNo="TDPL/MI/FOM-005"
        docName="Media Quality Control Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ url('/newforms/mi/forms/submit') }}"
        buttonText="Submit">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MI_FOM005__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM005Data()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MI_FOM005__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM005Data()">
            </div>
            <div>
                <button type="button" onclick="clearMIFOM005Filters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px; text-align:center;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Date</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Product Name/ Code/ Manufacturer/ Lot No./ Date of Expiry</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Date of Analysis; Done by</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Appearance of Media / pH of Media / Appearance on plate / Volume</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Incubation Period / Temperature</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">ATCC Strain Used / Code / Lot No. / Date of Expiry</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Growth Expected</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Growth Observed</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">CAPA</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Microbiologist Signature</th>
                </tr>
            </thead>

            <tbody id="MI_FOM005__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/MI/FOM-005(A)"
        docNo="TDPL/MI/FOM-005(A)"
        docName="Media Quality Control Form - Sheep Blood Agar"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ url('/newforms/mi/forms/submit') }}"
        buttonText="Submit">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MI_FOM005A__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM005AData()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MI_FOM005A__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM005AData()">
            </div>
            <div>
                <button type="button" onclick="clearMIFOM005AFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px; text-align:center;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Date</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Product Name/ Code/ Manufacturer/ Lot No./ Date of Expiry</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Date of Analysis; Done by</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Appearance of Media / pH of Media / Appearance on plate / Volume</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Incubation Period / Temperature</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">ATCC Strain Used / Code / Lot No. / Date of Expiry</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Growth Expected</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Growth Observed</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">CAPA</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Microbiologist Signature</th>
                </tr>
            </thead>

            <tbody id="MI_FOM005A__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/MI/FOM-005(B)"
        docNo="TDPL/MI/FOM-005(B)"
        docName="Media Quality Control Form - MacConkey Agar"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ url('/newforms/mi/forms/submit') }}"
        buttonText="Submit">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MI_FOM005B__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM005BData()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MI_FOM005B__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM005BData()">
            </div>
            <div>
                <button type="button" onclick="clearMIFOM005BFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px; text-align:center;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Date</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Product Name/ Code/ Manufacturer/ Lot No./ Date of Expiry</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Date of Analysis; Done by</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Appearance of Media / pH of Media / Appearance on plate / Volume</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Incubation Period / Temperature</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">ATCC Strain Used / Code / Lot No. / Date of Expiry</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Growth Expected</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Growth Observed</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">CAPA</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Microbiologist Signature</th>
                </tr>
            </thead>

            <tbody id="MI_FOM005B__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/MI/FOM-005(C)"
        docNo="TDPL/MI/FOM-005(C)"
        docName="Media Quality Control Form - Mueller Hinton Agar"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ url('/newforms/mi/forms/submit') }}"
        buttonText="Submit">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MI_FOM005C__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM005CData()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MI_FOM005C__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM005CData()">
            </div>
            <div>
                <button type="button" onclick="clearMIFOM005CFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px; text-align:center;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Date</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Product Name/ Code/ Manufacturer/ Lot No./ Date of Expiry</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Date of Analysis; Done by</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Appearance of Media / pH of Media / Appearance on plate / Volume</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Incubation Period / Temperature</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">ATCC Strain Used / Code / Lot No. / Date of Expiry</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Growth Expected</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Growth Observed</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">CAPA</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Microbiologist Signature</th>
                </tr>
            </thead>

            <tbody id="MI_FOM005C__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/MI/FOM-005(D)"
        docNo="TDPL/MI/FOM-005(D)"
        docName="Media Quality Control Form - Chocolate Agar"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ url('/newforms/mi/forms/submit') }}"
        buttonText="Submit">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MI_FOM005D__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM005DData()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MI_FOM005D__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM005DData()">
            </div>
            <div>
                <button type="button" onclick="clearMIFOM005DFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px; text-align:center;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Date</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Product Name/ Code/ Manufacturer/ Lot No./ Date of Expiry</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Date of Analysis; Done by</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Appearance of Media / pH of Media / Appearance on plate / Volume</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Incubation Period / Temperature</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">ATCC Strain Used / Code / Lot No. / Date of Expiry</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Growth Expected</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Growth Observed</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">CAPA</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Microbiologist Signature</th>
                </tr>
            </thead>

            <tbody id="MI_FOM005D__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/MI/FOM-005(E)"
        docNo="TDPL/MI/FOM-005(E)"
        docName="Media Quality Control Form - SDA Agar"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ url('/newforms/mi/forms/submit') }}"
        buttonText="Submit">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MI_FOM005E__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM005EData()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MI_FOM005E__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIFOM005EData()">
            </div>
            <div>
                <button type="button" onclick="clearMIFOM005EFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px; text-align:center;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Date</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Product Name/ Code/ Manufacturer/ Lot No./ Date of Expiry</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Date of Analysis; Done by</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Appearance of Media / pH of Media / Appearance on plate / Volume</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Incubation Period / Temperature</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">ATCC Strain Used / Code / Lot No. / Date of Expiry</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Growth Expected</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Growth Observed</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">CAPA</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Microbiologist Signature</th>
                </tr>
            </thead>

            <tbody id="MI_FOM005E__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/REG-001"
        docNo="TDPL/MI/REG-001"
        docName="Microbiology Work Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ url('/newforms/mi/forms/submit') }}"
        buttonText="Submit">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MI_REG001__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIREG001Data()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MI_REG001__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIREG001Data()">
            </div>
            <div>
                <button type="button" onclick="clearMIREG001Filters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px; text-align:center;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Date</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Barcode</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Patient Name</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Age/Gender</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Investigation</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Sample Type</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Sample Received Date/Time</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Sample Received By</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Sample Processing Date/Time</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Sample Processed By</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Observations</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">HoD Signature</th>
                </tr>
            </thead>

            <tbody id="MI_REG001__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/REG-002"
        docNo="TDPL/MI/REG-002"
        docName="Media Preparation Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ url('/newforms/mi/forms/submit') }}"
        buttonText="Submit">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MI_REG002__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIREG002Data()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MI_REG002__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIREG002Data()">
            </div>
            <div>
                <button type="button" onclick="clearMIREG002Filters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px; text-align:center;">
            <thead>
                <tr>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Date</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Name of the Media Prepared</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Media Prepared / Lot No. &amp; Manufacturer</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Volume of Media Prepared</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Wt. of Media (gm) &amp; Prepared By (name)</th>
                    <th colspan="6" style="border:1px solid #000; padding:6px; text-align:center;">Autoclave Process Details</th>
                    <th colspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Quality Control</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">HOD Sign</th>
                </tr>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Autoclave Start Time</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Autoclave End Time</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Sterile Holding Time</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Total Duration</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Temp (121°C)</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Pressure (151 lbs)</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Chemical Indicators</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Biological Indicators</th>
                </tr>
            </thead>

            <tbody id="MI_REG002__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/MI/REG-003"
        docNo="TDPL/MI/REG-003"
        docName="Media Sterility Check Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ url('/newforms/mi/forms/submit') }}"
        buttonText="Submit">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MI_REG003__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIREG003Data()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MI_REG003__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIREG003Data()">
            </div>
            <div>
                <button type="button" onclick="clearMIREG003Filters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px; text-align:center;">
            <thead>
                <tr>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Date of Preparation</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Batch No.</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Details of Media Preparation</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Expected growth<br>2–48 Hours</th>
                    <th colspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Result Obtained</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Sterility Checked<br>Pass/Fail</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Done by</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Checked by</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">HoD Signature &amp; Remarks</th>
                </tr>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Sterility after<br>24 Hours</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Sterility after<br>48 Hours</th>
                </tr>
            </thead>

            <tbody id="MI_REG003__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/REG-004"
        docNo="TDPL/MI/REG-004"
        docName="Vitek 2 Saline Quality Control Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ url('/newforms/mi/forms/submit') }}"
        buttonText="Submit">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MI_REG004__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIREG004Data()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MI_REG004__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIREG004Data()">
            </div>
            <div>
                <button type="button" onclick="clearMIREG004Filters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px; text-align:center;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Date of Q.C.</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Vitek Saline Turbidity after 4 hrs</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Growth on Blood Agar after 48 hrs</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">QC Passed / Failed</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Done By</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">HOD Sign</th>
                </tr>
            </thead>

            <tbody id="MI_REG004__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/REG-005"
        docNo="TDPL/MI/REG-005"
        docName="Loop Maintenance Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ url('/newforms/mi/forms/submit') }}"
        buttonText="Submit">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MI_REG005__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIREG005Data()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MI_REG005__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIREG005Data()">
            </div>
            <div>
                <button type="button" onclick="clearMIREG005Filters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px; text-align:center;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Date of Receiving</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Lot Number / Expiry Date</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Date of Calibration</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Calibration Passed / Failed</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Verified By</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">HOD Signature</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Remarks</th>
                </tr>
            </thead>

            <tbody id="MI_REG005__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/REG-006"
        docNo="TDPL/MI/REG-006"
        docName="Bact Alert QC Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ url('/newforms/mi/forms/submit') }}"
        buttonText="Submit">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MI_REG006__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIREG006Data()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MI_REG006__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadMIREG006Data()">
            </div>
            <div>
                <button type="button" onclick="clearMIREG006Filters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px; text-align:center;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Date</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Lot No. &amp; Expiry</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">ATCC No.</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Inoculum / Density</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Growth Observation<br>Date/Time (Hours)</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Gram Stain Observation</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Acceptable</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Not Acceptable</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Done by</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Checked by</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">HoD Signature</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Remarks</th>
                </tr>
            </thead>

            <tbody id="MI_REG006__tbody">
                <!-- rows built by JS -->
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

    /* =========================================================
       FOM-001 – HIV Consent-Counselling Form (Trilingual) AJAX
       ========================================================= */

    // Toast helper
    function showToast(msg, ok) {
        const t = document.createElement('div');
        t.textContent = msg;
        Object.assign(t.style, {
            position:'fixed',top:'20px',right:'20px',padding:'12px 24px',borderRadius:'6px',color:'#fff',zIndex:9999,
            background: ok ? '#28a745' : '#dc3545',fontSize:'14px',boxShadow:'0 4px 12px rgba(0,0,0,.3)'
        });
        document.body.appendChild(t);
        setTimeout(() => t.remove(), 3500);
    }

    // ID helper
    const f1 = id => document.getElementById('MI_FOM001__' + id);

    /* ---------- clear ---------- */
    function clearFOM001Form() {
        const fields = [
            'name','age','sex','date','address','mobile','lab_id','consent_given',
            'doctor_name','doctor_address','doctor_contact','patient_signature','signature_date',
            'name_hi','age_hi','sex_hi','date_hi','address_hi','mobile_hi','lab_id_hi','consent_given_hi',
            'doctor_name_hi','doctor_address_hi','doctor_contact_hi','patient_signature_hi','signature_date_hi',
            'name_te','age_te','sex_te','date_te','address_te','mobile_te','lab_id_te','consent_given_te',
            'doctor_name_te','doctor_address_te','doctor_contact_te','patient_signature_te','signature_date_te'
        ];
        fields.forEach(k => {
            const el = f1(k);
            if (!el) return;
            if (el.type === 'checkbox') el.checked = false;
            else if (el.tagName === 'SELECT') el.selectedIndex = 0;
            else el.value = '';
        });
        f1('record_id').value = '';
    }

    function clearFOM001Filters() {
        f1('filter_mobile').value = '';
        clearFOM001Form();
    }

    /* ---------- populate ---------- */
    function populateFOM001(d) {
        f1('record_id').value = d.id || '';

        // English – note DB column names differ from form name attrs
        f1('name').value             = d.patient_name || '';
        f1('age').value              = d.age || '';
        f1('sex').value              = d.sex || '';
        f1('date').value             = d.form_date || '';
        f1('address').value          = d.address || '';
        f1('mobile').value           = d.mobile || '';
        f1('lab_id').value           = d.lab_id || '';
        f1('consent_given').checked  = !!d.consent_given;
        f1('doctor_name').value      = d.doctor_name || '';
        f1('doctor_address').value   = d.doctor_address || '';
        f1('doctor_contact').value   = d.doctor_contact || '';
        f1('patient_signature').value= d.patient_signature || '';
        f1('signature_date').value   = d.signature_date || '';

        // Hindi
        f1('name_hi').value             = d.patient_name_hi || '';
        f1('age_hi').value              = d.age_hi || '';
        f1('sex_hi').value              = d.sex_hi || '';
        f1('date_hi').value             = d.form_date_hi || '';
        f1('address_hi').value          = d.address_hi || '';
        f1('mobile_hi').value           = d.mobile_hi || '';
        f1('lab_id_hi').value           = d.lab_id_hi || '';
        f1('consent_given_hi').checked  = !!d.consent_given_hi;
        f1('doctor_name_hi').value      = d.doctor_name_hi || '';
        f1('doctor_address_hi').value   = d.doctor_address_hi || '';
        f1('doctor_contact_hi').value   = d.doctor_contact_hi || '';
        f1('patient_signature_hi').value= d.patient_signature_hi || '';
        f1('signature_date_hi').value   = d.signature_date_hi || '';

        // Telugu
        f1('name_te').value             = d.patient_name_te || '';
        f1('age_te').value              = d.age_te || '';
        f1('sex_te').value              = d.sex_te || '';
        f1('date_te').value             = d.form_date_te || '';
        f1('address_te').value          = d.address_te || '';
        f1('mobile_te').value           = d.mobile_te || '';
        f1('lab_id_te').value           = d.lab_id_te || '';
        f1('consent_given_te').checked  = !!d.consent_given_te;
        f1('doctor_name_te').value      = d.doctor_name_te || '';
        f1('doctor_address_te').value   = d.doctor_address_te || '';
        f1('doctor_contact_te').value   = d.doctor_contact_te || '';
        f1('patient_signature_te').value= d.patient_signature_te || '';
        f1('signature_date_te').value   = d.signature_date_te || '';
    }

    /* ---------- load on filter change ---------- */
    function loadFOM001Data() {
        const mobile = f1('filter_mobile').value.trim();
        if (!mobile) return;

        fetch(`/newforms/mi/hiv-consent/load?mobile=${encodeURIComponent(mobile)}`)
            .then(r => r.json())
            .then(res => {
                if (res.success && res.data) {
                    populateFOM001(res.data);
                    showToast('Patient data loaded.', true);
                } else {
                    clearFOM001Form();
                    showToast('No record found for this mobile.', false);
                }
            })
            .catch(() => showToast('Error loading data.', false));
    }

    f1('filter_mobile').addEventListener('change', loadFOM001Data);

    /* ---------- AJAX submit ---------- */
    (function() {
        const formEl = document.getElementById('TDPL/MI/FOM-001');
        if (!formEl) return;
        const form = formEl.querySelector('form');
        if (!form) return;

        // Disable browser validation – hidden language tabs have required fields
        form.setAttribute('novalidate', '');

        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const fd = new FormData(form);
            fd.set('doc_no', 'TDPL/MI/FOM-001');

            fetch(form.action, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                body: fd
            })
            .then(r => r.json())
            .then(res => {
                if (res.success) {
                    showToast(res.message, true);
                    if (res.data && res.data.id) f1('record_id').value = res.data.id;
                } else {
                    showToast(res.message || 'Save failed.', false);
                }
            })
            .catch(() => showToast('Network error.', false));
        });
    })();

    /* ===================================================
       FOM-002 – Stain Quality Control Form (AFB Gram Stain)
       Row-based: From/To date filter on row_date
       =================================================== */

    const MI_FOM002_FIELDS = ['manufacturer','lot_no','atcc','result_expected','result_obtained','done_by','corrective_action','remarks'];

    function buildMIFOM002RowHTML(row) {
        let html = `<td style="border:1px solid #000; padding:4px;">
            <input type="hidden" name="row_id[]" value="${row.id}">
            <input type="date" name="row_date[]" value="${row.row_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
        </td>`;
        html += `<td style="border:1px solid #000; padding:4px;"><input name="manufacturer[]" value="${row.manufacturer || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        html += `<td style="border:1px solid #000; padding:4px;"><input name="lot_no[]" value="${row.lot_no || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        html += `<td style="border:1px solid #000; padding:4px;"><input type="date" name="expiry_date[]" value="${row.expiry_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        const textFields = ['atcc','result_expected','result_obtained','done_by','corrective_action','remarks'];
        textFields.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" value="${row[f] || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        return html;
    }

    function addEmptyRowMIFOM002() {
        const tbody = document.getElementById('MI_FOM002__tbody');
        if (!tbody) return;

        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        html += `<td style="border:1px solid #000; padding:4px;"><input name="manufacturer[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        html += `<td style="border:1px solid #000; padding:4px;"><input name="lot_no[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        html += `<td style="border:1px solid #000; padding:4px;"><input type="date" name="expiry_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        const textFields = ['atcc','result_expected','result_obtained','done_by','corrective_action','remarks'];
        textFields.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMIFOM002Form() {
        const tbody = document.getElementById('MI_FOM002__tbody');
        if (tbody) {
            tbody.innerHTML = '';
            addEmptyRowMIFOM002();
        }
    }

    function clearMIFOM002Filters() {
        document.getElementById('MI_FOM002__from_date').value = '';
        document.getElementById('MI_FOM002__to_date').value = '';
        clearMIFOM002Form();
    }

    function loadMIFOM002Data() {
        const fromDate = document.getElementById('MI_FOM002__from_date').value;
        const toDate   = document.getElementById('MI_FOM002__to_date').value;

        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        params.append('doc_no', 'TDPL/MI/FOM-002');
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mi/stain-qc-afb-gram/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MI_FOM002__tbody');
            if (!tbody) return;

            tbody.innerHTML = '';

            if (!res.data || res.data.length === 0) {
                addEmptyRowMIFOM002();
                return;
            }

            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMIFOM002RowHTML(row);
                tbody.appendChild(tr);
            });

            addEmptyRowMIFOM002();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMIFOM002(type, message) {
        const existing = document.querySelector('.mi-toast-fom002');
        if (existing) existing.remove();

        const toast = document.createElement('div');
        toast.className = 'mi-toast-fom002';
        toast.textContent = message;
        toast.style.cssText =
            'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMIFOM002() {
        const formContainer = document.querySelector('[id="TDPL/MI/FOM-002"]');
        if (!formContainer) return;

        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();

            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;

            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMIFOM002('success', result.message || 'Saved successfully!');

                    const tbody = document.getElementById('MI_FOM002__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';

                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMIFOM002RowHTML(row);
                            tbody.appendChild(tr);
                        });

                        addEmptyRowMIFOM002();
                    }
                } else {
                    showToastMIFOM002('error', result.message || 'Failed to save');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToastMIFOM002('error', 'Failed to save. Please try again.');
            })
            .finally(() => {
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            });

            return false;
        });

        addEmptyRowMIFOM002();
    })();

    /* ===================================================
       FOM-002(A) – Stain Quality Control Form - Gram Stain
       Same table as FOM-002, differentiated by doc_no
       =================================================== */

    function buildMIFOM002ARowHTML(row) {
        return buildMIFOM002RowHTML(row);
    }

    function addEmptyRowMIFOM002A() {
        const tbody = document.getElementById('MI_FOM002A__tbody');
        if (!tbody) return;

        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        html += `<td style="border:1px solid #000; padding:4px;"><input name="manufacturer[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        html += `<td style="border:1px solid #000; padding:4px;"><input name="lot_no[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        html += `<td style="border:1px solid #000; padding:4px;"><input type="date" name="expiry_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        const textFields = ['atcc','result_expected','result_obtained','done_by','corrective_action','remarks'];
        textFields.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMIFOM002AForm() {
        const tbody = document.getElementById('MI_FOM002A__tbody');
        if (tbody) {
            tbody.innerHTML = '';
            addEmptyRowMIFOM002A();
        }
    }

    function clearMIFOM002AFilters() {
        document.getElementById('MI_FOM002A__from_date').value = '';
        document.getElementById('MI_FOM002A__to_date').value = '';
        clearMIFOM002AForm();
    }

    function loadMIFOM002AData() {
        const fromDate = document.getElementById('MI_FOM002A__from_date').value;
        const toDate   = document.getElementById('MI_FOM002A__to_date').value;

        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        params.append('doc_no', 'TDPL/MI/FOM-002(A)');
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mi/stain-qc-afb-gram/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MI_FOM002A__tbody');
            if (!tbody) return;

            tbody.innerHTML = '';

            if (!res.data || res.data.length === 0) {
                addEmptyRowMIFOM002A();
                return;
            }

            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMIFOM002ARowHTML(row);
                tbody.appendChild(tr);
            });

            addEmptyRowMIFOM002A();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMIFOM002A(type, message) {
        const existing = document.querySelector('.mi-toast-fom002a');
        if (existing) existing.remove();

        const toast = document.createElement('div');
        toast.className = 'mi-toast-fom002a';
        toast.textContent = message;
        toast.style.cssText =
            'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMIFOM002A() {
        const formContainer = document.querySelector('[id="TDPL/MI/FOM-002(A)"]');
        if (!formContainer) return;

        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();

            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;

            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMIFOM002A('success', result.message || 'Saved successfully!');

                    const tbody = document.getElementById('MI_FOM002A__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';

                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMIFOM002ARowHTML(row);
                            tbody.appendChild(tr);
                        });

                        addEmptyRowMIFOM002A();
                    }
                } else {
                    showToastMIFOM002A('error', result.message || 'Failed to save');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToastMIFOM002A('error', 'Failed to save. Please try again.');
            })
            .finally(() => {
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            });

            return false;
        });

        addEmptyRowMIFOM002A();
    })();

    /* ===================================================
       FOM-002(B) – Stain Quality Control Form - AFB Stain
       Same table as FOM-002, differentiated by doc_no
       =================================================== */

    function addEmptyRowMIFOM002B() {
        const tbody = document.getElementById('MI_FOM002B__tbody');
        if (!tbody) return;
        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        html += `<td style="border:1px solid #000; padding:4px;"><input name="manufacturer[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        html += `<td style="border:1px solid #000; padding:4px;"><input name="lot_no[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        html += `<td style="border:1px solid #000; padding:4px;"><input type="date" name="expiry_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        ['atcc','result_expected','result_obtained','done_by','corrective_action','remarks'].forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMIFOM002BForm() {
        const tbody = document.getElementById('MI_FOM002B__tbody');
        if (tbody) { tbody.innerHTML = ''; addEmptyRowMIFOM002B(); }
    }

    function clearMIFOM002BFilters() {
        document.getElementById('MI_FOM002B__from_date').value = '';
        document.getElementById('MI_FOM002B__to_date').value = '';
        clearMIFOM002BForm();
    }

    function loadMIFOM002BData() {
        const fromDate = document.getElementById('MI_FOM002B__from_date').value;
        const toDate   = document.getElementById('MI_FOM002B__to_date').value;
        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        params.append('doc_no', 'TDPL/MI/FOM-002(B)');
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mi/stain-qc-afb-gram/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MI_FOM002B__tbody');
            if (!tbody) return;
            tbody.innerHTML = '';
            if (!res.data || res.data.length === 0) { addEmptyRowMIFOM002B(); return; }
            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMIFOM002RowHTML(row);
                tbody.appendChild(tr);
            });
            addEmptyRowMIFOM002B();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMIFOM002B(type, message) {
        const existing = document.querySelector('.mi-toast-fom002b');
        if (existing) existing.remove();
        const toast = document.createElement('div');
        toast.className = 'mi-toast-fom002b';
        toast.textContent = message;
        toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMIFOM002B() {
        const formContainer = document.querySelector('[id="TDPL/MI/FOM-002(B)"]');
        if (!formContainer) return;
        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST', body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMIFOM002B('success', result.message || 'Saved successfully!');
                    const tbody = document.getElementById('MI_FOM002B__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';
                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMIFOM002RowHTML(row);
                            tbody.appendChild(tr);
                        });
                        addEmptyRowMIFOM002B();
                    }
                } else {
                    showToastMIFOM002B('error', result.message || 'Failed to save');
                }
            })
            .catch(error => { console.error('Error:', error); showToastMIFOM002B('error', 'Failed to save. Please try again.'); })
            .finally(() => { submitBtn.textContent = originalText; submitBtn.disabled = false; });
            return false;
        });

        addEmptyRowMIFOM002B();
    })();

    /* ===================================================
       FOM-002(C) – Stain Quality Control Form - KOH Stain
       Same table as FOM-002, differentiated by doc_no
       =================================================== */

    function addEmptyRowMIFOM002C() {
        const tbody = document.getElementById('MI_FOM002C__tbody');
        if (!tbody) return;
        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        html += `<td style="border:1px solid #000; padding:4px;"><input name="manufacturer[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        html += `<td style="border:1px solid #000; padding:4px;"><input name="lot_no[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        html += `<td style="border:1px solid #000; padding:4px;"><input type="date" name="expiry_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        ['atcc','result_expected','result_obtained','done_by','corrective_action','remarks'].forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMIFOM002CForm() {
        const tbody = document.getElementById('MI_FOM002C__tbody');
        if (tbody) { tbody.innerHTML = ''; addEmptyRowMIFOM002C(); }
    }

    function clearMIFOM002CFilters() {
        document.getElementById('MI_FOM002C__from_date').value = '';
        document.getElementById('MI_FOM002C__to_date').value = '';
        clearMIFOM002CForm();
    }

    function loadMIFOM002CData() {
        const fromDate = document.getElementById('MI_FOM002C__from_date').value;
        const toDate   = document.getElementById('MI_FOM002C__to_date').value;
        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        params.append('doc_no', 'TDPL/MI/FOM-002(C)');
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mi/stain-qc-afb-gram/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MI_FOM002C__tbody');
            if (!tbody) return;
            tbody.innerHTML = '';
            if (!res.data || res.data.length === 0) { addEmptyRowMIFOM002C(); return; }
            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMIFOM002RowHTML(row);
                tbody.appendChild(tr);
            });
            addEmptyRowMIFOM002C();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMIFOM002C(type, message) {
        const existing = document.querySelector('.mi-toast-fom002c');
        if (existing) existing.remove();
        const toast = document.createElement('div');
        toast.className = 'mi-toast-fom002c';
        toast.textContent = message;
        toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMIFOM002C() {
        const formContainer = document.querySelector('[id="TDPL/MI/FOM-002(C)"]');
        if (!formContainer) return;
        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST', body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMIFOM002C('success', result.message || 'Saved successfully!');
                    const tbody = document.getElementById('MI_FOM002C__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';
                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMIFOM002RowHTML(row);
                            tbody.appendChild(tr);
                        });
                        addEmptyRowMIFOM002C();
                    }
                } else {
                    showToastMIFOM002C('error', result.message || 'Failed to save');
                }
            })
            .catch(error => { console.error('Error:', error); showToastMIFOM002C('error', 'Failed to save. Please try again.'); })
            .finally(() => { submitBtn.textContent = originalText; submitBtn.disabled = false; });
            return false;
        });

        addEmptyRowMIFOM002C();
    })();

    /* ===================================================
       FOM-003 – Biochemical Media QC Form (Row-based)
       Shared table for FOM-003, FOM-003(A)–(G)
       =================================================== */

    const MI_FOM003_TEXT_FIELDS = ['product_info','analysis_done_by','appearance','incubation','atcc','growth_expected','growth_observed','corrective_action','signature'];

    function buildMIFOM003RowHTML(row) {
        let html = `<td style="border:1px solid #000; padding:4px;">
            <input type="hidden" name="row_id[]" value="${row.id}">
            <input type="date" name="row_date[]" value="${row.row_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
        </td>`;
        MI_FOM003_TEXT_FIELDS.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" value="${row[f] || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        return html;
    }

    function addEmptyRowMIFOM003() {
        const tbody = document.getElementById('MI_FOM003__tbody');
        if (!tbody) return;
        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        MI_FOM003_TEXT_FIELDS.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMIFOM003Form() {
        const tbody = document.getElementById('MI_FOM003__tbody');
        if (tbody) { tbody.innerHTML = ''; addEmptyRowMIFOM003(); }
    }

    function clearMIFOM003Filters() {
        document.getElementById('MI_FOM003__from_date').value = '';
        document.getElementById('MI_FOM003__to_date').value = '';
        clearMIFOM003Form();
    }

    function loadMIFOM003Data() {
        const fromDate = document.getElementById('MI_FOM003__from_date').value;
        const toDate   = document.getElementById('MI_FOM003__to_date').value;
        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        params.append('doc_no', 'TDPL/MI/FOM-003');
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mi/biochemical-media-qc/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MI_FOM003__tbody');
            if (!tbody) return;
            tbody.innerHTML = '';
            if (!res.data || res.data.length === 0) { addEmptyRowMIFOM003(); return; }
            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMIFOM003RowHTML(row);
                tbody.appendChild(tr);
            });
            addEmptyRowMIFOM003();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMIFOM003(type, message) {
        const existing = document.querySelector('.mi-toast-fom003');
        if (existing) existing.remove();
        const toast = document.createElement('div');
        toast.className = 'mi-toast-fom003';
        toast.textContent = message;
        toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMIFOM003() {
        const formContainer = document.querySelector('[id="TDPL/MI/FOM-003"]');
        if (!formContainer) return;
        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST', body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMIFOM003('success', result.message || 'Saved successfully!');
                    const tbody = document.getElementById('MI_FOM003__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';
                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMIFOM003RowHTML(row);
                            tbody.appendChild(tr);
                        });
                        addEmptyRowMIFOM003();
                    }
                } else {
                    showToastMIFOM003('error', result.message || 'Failed to save');
                }
            })
            .catch(error => { console.error('Error:', error); showToastMIFOM003('error', 'Failed to save. Please try again.'); })
            .finally(() => { submitBtn.textContent = originalText; submitBtn.disabled = false; });
            return false;
        });

        addEmptyRowMIFOM003();
    })();

    /* ===================================================
       FOM-003(A) – Biochemical Media QC Form - Oxidase Disc
       Reuses buildMIFOM003RowHTML() + MI_FOM003_TEXT_FIELDS
       =================================================== */

    function addEmptyRowMIFOM003A() {
        const tbody = document.getElementById('MI_FOM003A__tbody');
        if (!tbody) return;
        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        MI_FOM003_TEXT_FIELDS.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMIFOM003AForm() {
        const tbody = document.getElementById('MI_FOM003A__tbody');
        if (tbody) { tbody.innerHTML = ''; addEmptyRowMIFOM003A(); }
    }

    function clearMIFOM003AFilters() {
        document.getElementById('MI_FOM003A__from_date').value = '';
        document.getElementById('MI_FOM003A__to_date').value = '';
        clearMIFOM003AForm();
    }

    function loadMIFOM003AData() {
        const fromDate = document.getElementById('MI_FOM003A__from_date').value;
        const toDate   = document.getElementById('MI_FOM003A__to_date').value;
        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        params.append('doc_no', 'TDPL/MI/FOM-003(A)');
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mi/biochemical-media-qc/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MI_FOM003A__tbody');
            if (!tbody) return;
            tbody.innerHTML = '';
            if (!res.data || res.data.length === 0) { addEmptyRowMIFOM003A(); return; }
            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMIFOM003RowHTML(row);
                tbody.appendChild(tr);
            });
            addEmptyRowMIFOM003A();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMIFOM003A(type, message) {
        const existing = document.querySelector('.mi-toast-fom003a');
        if (existing) existing.remove();
        const toast = document.createElement('div');
        toast.className = 'mi-toast-fom003a';
        toast.textContent = message;
        toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMIFOM003A() {
        const formContainer = document.querySelector('[id="TDPL/MI/FOM-003(A)"]');
        if (!formContainer) return;
        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST', body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMIFOM003A('success', result.message || 'Saved successfully!');
                    const tbody = document.getElementById('MI_FOM003A__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';
                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMIFOM003RowHTML(row);
                            tbody.appendChild(tr);
                        });
                        addEmptyRowMIFOM003A();
                    }
                } else {
                    showToastMIFOM003A('error', result.message || 'Failed to save');
                }
            })
            .catch(error => { console.error('Error:', error); showToastMIFOM003A('error', 'Failed to save. Please try again.'); })
            .finally(() => { submitBtn.textContent = originalText; submitBtn.disabled = false; });
            return false;
        });

        addEmptyRowMIFOM003A();
    })();

    /* ===================================================
       FOM-003(B) – Biochemical Media QC Form - Optochin Disc
       Reuses buildMIFOM003RowHTML() + MI_FOM003_TEXT_FIELDS
       =================================================== */

    function addEmptyRowMIFOM003B() {
        const tbody = document.getElementById('MI_FOM003B__tbody');
        if (!tbody) return;
        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        MI_FOM003_TEXT_FIELDS.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMIFOM003BForm() {
        const tbody = document.getElementById('MI_FOM003B__tbody');
        if (tbody) { tbody.innerHTML = ''; addEmptyRowMIFOM003B(); }
    }

    function clearMIFOM003BFilters() {
        document.getElementById('MI_FOM003B__from_date').value = '';
        document.getElementById('MI_FOM003B__to_date').value = '';
        clearMIFOM003BForm();
    }

    function loadMIFOM003BData() {
        const fromDate = document.getElementById('MI_FOM003B__from_date').value;
        const toDate   = document.getElementById('MI_FOM003B__to_date').value;
        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        params.append('doc_no', 'TDPL/MI/FOM-003(B)');
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mi/biochemical-media-qc/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MI_FOM003B__tbody');
            if (!tbody) return;
            tbody.innerHTML = '';
            if (!res.data || res.data.length === 0) { addEmptyRowMIFOM003B(); return; }
            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMIFOM003RowHTML(row);
                tbody.appendChild(tr);
            });
            addEmptyRowMIFOM003B();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMIFOM003B(type, message) {
        const existing = document.querySelector('.mi-toast-fom003b');
        if (existing) existing.remove();
        const toast = document.createElement('div');
        toast.className = 'mi-toast-fom003b';
        toast.textContent = message;
        toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMIFOM003B() {
        const formContainer = document.querySelector('[id="TDPL/MI/FOM-003(B)"]');
        if (!formContainer) return;
        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST', body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMIFOM003B('success', result.message || 'Saved successfully!');
                    const tbody = document.getElementById('MI_FOM003B__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';
                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMIFOM003RowHTML(row);
                            tbody.appendChild(tr);
                        });
                        addEmptyRowMIFOM003B();
                    }
                } else {
                    showToastMIFOM003B('error', result.message || 'Failed to save');
                }
            })
            .catch(error => { console.error('Error:', error); showToastMIFOM003B('error', 'Failed to save. Please try again.'); })
            .finally(() => { submitBtn.textContent = originalText; submitBtn.disabled = false; });
            return false;
        });

        addEmptyRowMIFOM003B();
    })();

    /* ===================================================
       FOM-003(C) – Biochemical Media QC Form - Urease Agar
       Reuses buildMIFOM003RowHTML() + MI_FOM003_TEXT_FIELDS
       =================================================== */

    function addEmptyRowMIFOM003C() {
        const tbody = document.getElementById('MI_FOM003C__tbody');
        if (!tbody) return;
        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        MI_FOM003_TEXT_FIELDS.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMIFOM003CForm() {
        const tbody = document.getElementById('MI_FOM003C__tbody');
        if (tbody) { tbody.innerHTML = ''; addEmptyRowMIFOM003C(); }
    }

    function clearMIFOM003CFilters() {
        document.getElementById('MI_FOM003C__from_date').value = '';
        document.getElementById('MI_FOM003C__to_date').value = '';
        clearMIFOM003CForm();
    }

    function loadMIFOM003CData() {
        const fromDate = document.getElementById('MI_FOM003C__from_date').value;
        const toDate   = document.getElementById('MI_FOM003C__to_date').value;
        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        params.append('doc_no', 'TDPL/MI/FOM-003(C)');
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mi/biochemical-media-qc/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MI_FOM003C__tbody');
            if (!tbody) return;
            tbody.innerHTML = '';
            if (!res.data || res.data.length === 0) { addEmptyRowMIFOM003C(); return; }
            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMIFOM003RowHTML(row);
                tbody.appendChild(tr);
            });
            addEmptyRowMIFOM003C();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMIFOM003C(type, message) {
        const existing = document.querySelector('.mi-toast-fom003c');
        if (existing) existing.remove();
        const toast = document.createElement('div');
        toast.className = 'mi-toast-fom003c';
        toast.textContent = message;
        toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMIFOM003C() {
        const formContainer = document.querySelector('[id="TDPL/MI/FOM-003(C)"]');
        if (!formContainer) return;
        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST', body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMIFOM003C('success', result.message || 'Saved successfully!');
                    const tbody = document.getElementById('MI_FOM003C__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';
                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMIFOM003RowHTML(row);
                            tbody.appendChild(tr);
                        });
                        addEmptyRowMIFOM003C();
                    }
                } else {
                    showToastMIFOM003C('error', result.message || 'Failed to save');
                }
            })
            .catch(error => { console.error('Error:', error); showToastMIFOM003C('error', 'Failed to save. Please try again.'); })
            .finally(() => { submitBtn.textContent = originalText; submitBtn.disabled = false; });
            return false;
        });

        addEmptyRowMIFOM003C();
    })();

    /* ===================================================
       FOM-003(D) – Biochemical Media QC Form - TSI Agar
       Reuses buildMIFOM003RowHTML() + MI_FOM003_TEXT_FIELDS
       =================================================== */

    function addEmptyRowMIFOM003D() {
        const tbody = document.getElementById('MI_FOM003D__tbody');
        if (!tbody) return;
        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        MI_FOM003_TEXT_FIELDS.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMIFOM003DForm() {
        const tbody = document.getElementById('MI_FOM003D__tbody');
        if (tbody) { tbody.innerHTML = ''; addEmptyRowMIFOM003D(); }
    }

    function clearMIFOM003DFilters() {
        document.getElementById('MI_FOM003D__from_date').value = '';
        document.getElementById('MI_FOM003D__to_date').value = '';
        clearMIFOM003DForm();
    }

    function loadMIFOM003DData() {
        const fromDate = document.getElementById('MI_FOM003D__from_date').value;
        const toDate   = document.getElementById('MI_FOM003D__to_date').value;
        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        params.append('doc_no', 'TDPL/MI/FOM-003(D)');
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mi/biochemical-media-qc/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MI_FOM003D__tbody');
            if (!tbody) return;
            tbody.innerHTML = '';
            if (!res.data || res.data.length === 0) { addEmptyRowMIFOM003D(); return; }
            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMIFOM003RowHTML(row);
                tbody.appendChild(tr);
            });
            addEmptyRowMIFOM003D();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMIFOM003D(type, message) {
        const existing = document.querySelector('.mi-toast-fom003d');
        if (existing) existing.remove();
        const toast = document.createElement('div');
        toast.className = 'mi-toast-fom003d';
        toast.textContent = message;
        toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMIFOM003D() {
        const formContainer = document.querySelector('[id="TDPL/MI/FOM-003(D)"]');
        if (!formContainer) return;
        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST', body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMIFOM003D('success', result.message || 'Saved successfully!');
                    const tbody = document.getElementById('MI_FOM003D__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';
                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMIFOM003RowHTML(row);
                            tbody.appendChild(tr);
                        });
                        addEmptyRowMIFOM003D();
                    }
                } else {
                    showToastMIFOM003D('error', result.message || 'Failed to save');
                }
            })
            .catch(error => { console.error('Error:', error); showToastMIFOM003D('error', 'Failed to save. Please try again.'); })
            .finally(() => { submitBtn.textContent = originalText; submitBtn.disabled = false; });
            return false;
        });

        addEmptyRowMIFOM003D();
    })();

    /* ===================================================
       FOM-003(E) – Biochemical Media QC Form - Citrate Agar
       Reuses buildMIFOM003RowHTML() + MI_FOM003_TEXT_FIELDS
       =================================================== */

    function addEmptyRowMIFOM003E() {
        const tbody = document.getElementById('MI_FOM003E__tbody');
        if (!tbody) return;
        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        MI_FOM003_TEXT_FIELDS.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMIFOM003EForm() {
        const tbody = document.getElementById('MI_FOM003E__tbody');
        if (tbody) { tbody.innerHTML = ''; addEmptyRowMIFOM003E(); }
    }

    function clearMIFOM003EFilters() {
        document.getElementById('MI_FOM003E__from_date').value = '';
        document.getElementById('MI_FOM003E__to_date').value = '';
        clearMIFOM003EForm();
    }

    function loadMIFOM003EData() {
        const fromDate = document.getElementById('MI_FOM003E__from_date').value;
        const toDate   = document.getElementById('MI_FOM003E__to_date').value;
        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        params.append('doc_no', 'TDPL/MI/FOM-003(E)');
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mi/biochemical-media-qc/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MI_FOM003E__tbody');
            if (!tbody) return;
            tbody.innerHTML = '';
            if (!res.data || res.data.length === 0) { addEmptyRowMIFOM003E(); return; }
            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMIFOM003RowHTML(row);
                tbody.appendChild(tr);
            });
            addEmptyRowMIFOM003E();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMIFOM003E(type, message) {
        const existing = document.querySelector('.mi-toast-fom003e');
        if (existing) existing.remove();
        const toast = document.createElement('div');
        toast.className = 'mi-toast-fom003e';
        toast.textContent = message;
        toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMIFOM003E() {
        const formContainer = document.querySelector('[id="TDPL/MI/FOM-003(E)"]');
        if (!formContainer) return;
        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST', body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMIFOM003E('success', result.message || 'Saved successfully!');
                    const tbody = document.getElementById('MI_FOM003E__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';
                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMIFOM003RowHTML(row);
                            tbody.appendChild(tr);
                        });
                        addEmptyRowMIFOM003E();
                    }
                } else {
                    showToastMIFOM003E('error', result.message || 'Failed to save');
                }
            })
            .catch(error => { console.error('Error:', error); showToastMIFOM003E('error', 'Failed to save. Please try again.'); })
            .finally(() => { submitBtn.textContent = originalText; submitBtn.disabled = false; });
            return false;
        });

        addEmptyRowMIFOM003E();
    })();

    /* ===================================================
       FOM-003(F) – Biochemical Media QC Form - BEA Agar
       Reuses buildMIFOM003RowHTML() + MI_FOM003_TEXT_FIELDS
       =================================================== */

    function addEmptyRowMIFOM003F() {
        const tbody = document.getElementById('MI_FOM003F__tbody');
        if (!tbody) return;
        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        MI_FOM003_TEXT_FIELDS.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMIFOM003FForm() {
        const tbody = document.getElementById('MI_FOM003F__tbody');
        if (tbody) { tbody.innerHTML = ''; addEmptyRowMIFOM003F(); }
    }

    function clearMIFOM003FFilters() {
        document.getElementById('MI_FOM003F__from_date').value = '';
        document.getElementById('MI_FOM003F__to_date').value = '';
        clearMIFOM003FForm();
    }

    function loadMIFOM003FData() {
        const fromDate = document.getElementById('MI_FOM003F__from_date').value;
        const toDate   = document.getElementById('MI_FOM003F__to_date').value;
        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        params.append('doc_no', 'TDPL/MI/FOM-003(F)');
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mi/biochemical-media-qc/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MI_FOM003F__tbody');
            if (!tbody) return;
            tbody.innerHTML = '';
            if (!res.data || res.data.length === 0) { addEmptyRowMIFOM003F(); return; }
            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMIFOM003RowHTML(row);
                tbody.appendChild(tr);
            });
            addEmptyRowMIFOM003F();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMIFOM003F(type, message) {
        const existing = document.querySelector('.mi-toast-fom003f');
        if (existing) existing.remove();
        const toast = document.createElement('div');
        toast.className = 'mi-toast-fom003f';
        toast.textContent = message;
        toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMIFOM003F() {
        const formContainer = document.querySelector('[id="TDPL/MI/FOM-003(F)"]');
        if (!formContainer) return;
        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST', body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMIFOM003F('success', result.message || 'Saved successfully!');
                    const tbody = document.getElementById('MI_FOM003F__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';
                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMIFOM003RowHTML(row);
                            tbody.appendChild(tr);
                        });
                        addEmptyRowMIFOM003F();
                    }
                } else {
                    showToastMIFOM003F('error', result.message || 'Failed to save');
                }
            })
            .catch(error => { console.error('Error:', error); showToastMIFOM003F('error', 'Failed to save. Please try again.'); })
            .finally(() => { submitBtn.textContent = originalText; submitBtn.disabled = false; });
            return false;
        });

        addEmptyRowMIFOM003F();
    })();

    /* ===================================================
       FOM-003(G) – Biochemical Media QC Form - Indole Test
       Reuses buildMIFOM003RowHTML() + MI_FOM003_TEXT_FIELDS
       =================================================== */

    function addEmptyRowMIFOM003G() {
        const tbody = document.getElementById('MI_FOM003G__tbody');
        if (!tbody) return;
        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        MI_FOM003_TEXT_FIELDS.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMIFOM003GForm() {
        const tbody = document.getElementById('MI_FOM003G__tbody');
        if (tbody) { tbody.innerHTML = ''; addEmptyRowMIFOM003G(); }
    }

    function clearMIFOM003GFilters() {
        document.getElementById('MI_FOM003G__from_date').value = '';
        document.getElementById('MI_FOM003G__to_date').value = '';
        clearMIFOM003GForm();
    }

    function loadMIFOM003GData() {
        const fromDate = document.getElementById('MI_FOM003G__from_date').value;
        const toDate   = document.getElementById('MI_FOM003G__to_date').value;
        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        params.append('doc_no', 'TDPL/MI/FOM-003(G)');
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mi/biochemical-media-qc/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MI_FOM003G__tbody');
            if (!tbody) return;
            tbody.innerHTML = '';
            if (!res.data || res.data.length === 0) { addEmptyRowMIFOM003G(); return; }
            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMIFOM003RowHTML(row);
                tbody.appendChild(tr);
            });
            addEmptyRowMIFOM003G();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMIFOM003G(type, message) {
        const existing = document.querySelector('.mi-toast-fom003g');
        if (existing) existing.remove();
        const toast = document.createElement('div');
        toast.className = 'mi-toast-fom003g';
        toast.textContent = message;
        toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMIFOM003G() {
        const formContainer = document.querySelector('[id="TDPL/MI/FOM-003(G)"]');
        if (!formContainer) return;
        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST', body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMIFOM003G('success', result.message || 'Saved successfully!');
                    const tbody = document.getElementById('MI_FOM003G__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';
                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMIFOM003RowHTML(row);
                            tbody.appendChild(tr);
                        });
                        addEmptyRowMIFOM003G();
                    }
                } else {
                    showToastMIFOM003G('error', result.message || 'Failed to save');
                }
            })
            .catch(error => { console.error('Error:', error); showToastMIFOM003G('error', 'Failed to save. Please try again.'); })
            .finally(() => { submitBtn.textContent = originalText; submitBtn.disabled = false; });
            return false;
        });

        addEmptyRowMIFOM003G();
    })();

    /* ===================================================
       FOM-004 – ATCC Strain Quality Control Form
       Shared table for FOM-004, FOM-004(A)–(G)
       =================================================== */

    const MI_FOM004_TEXT_FIELDS = ['atcc_info','characteristics','antibiotic_name','expected_zone','obtained_zone','done_by','capa','approved_by'];

    function buildMIFOM004RowHTML(row) {
        let html = `<td style="border:1px solid #000; padding:4px;">
            <input type="hidden" name="row_id[]" value="${row.id}">
            <input type="date" name="row_date[]" value="${row.row_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
        </td>`;
        MI_FOM004_TEXT_FIELDS.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" value="${row[f] || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        return html;
    }

    function addEmptyRowMIFOM004() {
        const tbody = document.getElementById('MI_FOM004__tbody');
        if (!tbody) return;
        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        MI_FOM004_TEXT_FIELDS.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMIFOM004Form() {
        const tbody = document.getElementById('MI_FOM004__tbody');
        if (tbody) { tbody.innerHTML = ''; addEmptyRowMIFOM004(); }
    }

    function clearMIFOM004Filters() {
        document.getElementById('MI_FOM004__from_date').value = '';
        document.getElementById('MI_FOM004__to_date').value = '';
        clearMIFOM004Form();
    }

    function loadMIFOM004Data() {
        const fromDate = document.getElementById('MI_FOM004__from_date').value;
        const toDate   = document.getElementById('MI_FOM004__to_date').value;
        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        params.append('doc_no', 'TDPL/MI/FOM-004');
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mi/atcc-strain-qc/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MI_FOM004__tbody');
            if (!tbody) return;
            tbody.innerHTML = '';
            if (!res.data || res.data.length === 0) { addEmptyRowMIFOM004(); return; }
            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMIFOM004RowHTML(row);
                tbody.appendChild(tr);
            });
            addEmptyRowMIFOM004();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMIFOM004(type, message) {
        const existing = document.querySelector('.mi-toast-fom004');
        if (existing) existing.remove();
        const toast = document.createElement('div');
        toast.className = 'mi-toast-fom004';
        toast.textContent = message;
        toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMIFOM004() {
        const formContainer = document.querySelector('[id="TDPL/MI/FOM-004"]');
        if (!formContainer) return;
        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST', body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMIFOM004('success', result.message || 'Saved successfully!');
                    const tbody = document.getElementById('MI_FOM004__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';
                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMIFOM004RowHTML(row);
                            tbody.appendChild(tr);
                        });
                        addEmptyRowMIFOM004();
                    }
                } else {
                    showToastMIFOM004('error', result.message || 'Failed to save');
                }
            })
            .catch(error => { console.error('Error:', error); showToastMIFOM004('error', 'Failed to save. Please try again.'); })
            .finally(() => { submitBtn.textContent = originalText; submitBtn.disabled = false; });
            return false;
        });

        addEmptyRowMIFOM004();
    })();

    /* ===================================================
       FOM-004(A) – ATCC Strain QC Form - E.Coli
       Reuses buildMIFOM004RowHTML() + MI_FOM004_TEXT_FIELDS
       =================================================== */

    function addEmptyRowMIFOM004A() {
        const tbody = document.getElementById('MI_FOM004A__tbody');
        if (!tbody) return;
        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        MI_FOM004_TEXT_FIELDS.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMIFOM004AForm() {
        const tbody = document.getElementById('MI_FOM004A__tbody');
        if (tbody) { tbody.innerHTML = ''; addEmptyRowMIFOM004A(); }
    }

    function clearMIFOM004AFilters() {
        document.getElementById('MI_FOM004A__from_date').value = '';
        document.getElementById('MI_FOM004A__to_date').value = '';
        clearMIFOM004AForm();
    }

    function loadMIFOM004AData() {
        const fromDate = document.getElementById('MI_FOM004A__from_date').value;
        const toDate   = document.getElementById('MI_FOM004A__to_date').value;
        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        params.append('doc_no', 'TDPL/MI/FOM-004(A)');
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mi/atcc-strain-qc/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MI_FOM004A__tbody');
            if (!tbody) return;
            tbody.innerHTML = '';
            if (!res.data || res.data.length === 0) { addEmptyRowMIFOM004A(); return; }
            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMIFOM004RowHTML(row);
                tbody.appendChild(tr);
            });
            addEmptyRowMIFOM004A();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMIFOM004A(type, message) {
        const existing = document.querySelector('.mi-toast-fom004a');
        if (existing) existing.remove();
        const toast = document.createElement('div');
        toast.className = 'mi-toast-fom004a';
        toast.textContent = message;
        toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMIFOM004A() {
        const formContainer = document.querySelector('[id="TDPL/MI/FOM-004(A)"]');
        if (!formContainer) return;
        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST', body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMIFOM004A('success', result.message || 'Saved successfully!');
                    const tbody = document.getElementById('MI_FOM004A__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';
                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMIFOM004RowHTML(row);
                            tbody.appendChild(tr);
                        });
                        addEmptyRowMIFOM004A();
                    }
                } else {
                    showToastMIFOM004A('error', result.message || 'Failed to save');
                }
            })
            .catch(error => { console.error('Error:', error); showToastMIFOM004A('error', 'Failed to save. Please try again.'); })
            .finally(() => { submitBtn.textContent = originalText; submitBtn.disabled = false; });
            return false;
        });

        addEmptyRowMIFOM004A();
    })();

    /* ===================================================
       FOM-004(B) – ATCC Strain QC Form - Pseudomonas aeruginosa
       Reuses buildMIFOM004RowHTML() + MI_FOM004_TEXT_FIELDS
       =================================================== */

    function addEmptyRowMIFOM004B() {
        const tbody = document.getElementById('MI_FOM004B__tbody');
        if (!tbody) return;
        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        MI_FOM004_TEXT_FIELDS.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMIFOM004BForm() {
        const tbody = document.getElementById('MI_FOM004B__tbody');
        if (tbody) { tbody.innerHTML = ''; addEmptyRowMIFOM004B(); }
    }

    function clearMIFOM004BFilters() {
        document.getElementById('MI_FOM004B__from_date').value = '';
        document.getElementById('MI_FOM004B__to_date').value = '';
        clearMIFOM004BForm();
    }

    function loadMIFOM004BData() {
        const fromDate = document.getElementById('MI_FOM004B__from_date').value;
        const toDate   = document.getElementById('MI_FOM004B__to_date').value;
        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        params.append('doc_no', 'TDPL/MI/FOM-004(B)');
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mi/atcc-strain-qc/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MI_FOM004B__tbody');
            if (!tbody) return;
            tbody.innerHTML = '';
            if (!res.data || res.data.length === 0) { addEmptyRowMIFOM004B(); return; }
            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMIFOM004RowHTML(row);
                tbody.appendChild(tr);
            });
            addEmptyRowMIFOM004B();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMIFOM004B(type, message) {
        const existing = document.querySelector('.mi-toast-fom004b');
        if (existing) existing.remove();
        const toast = document.createElement('div');
        toast.className = 'mi-toast-fom004b';
        toast.textContent = message;
        toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMIFOM004B() {
        const formContainer = document.querySelector('[id="TDPL/MI/FOM-004(B)"]');
        if (!formContainer) return;
        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST', body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMIFOM004B('success', result.message || 'Saved successfully!');
                    const tbody = document.getElementById('MI_FOM004B__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';
                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMIFOM004RowHTML(row);
                            tbody.appendChild(tr);
                        });
                        addEmptyRowMIFOM004B();
                    }
                } else {
                    showToastMIFOM004B('error', result.message || 'Failed to save');
                }
            })
            .catch(error => { console.error('Error:', error); showToastMIFOM004B('error', 'Failed to save. Please try again.'); })
            .finally(() => { submitBtn.textContent = originalText; submitBtn.disabled = false; });
            return false;
        });

        addEmptyRowMIFOM004B();
    })();

    /* ===================================================
       FOM-004(C) – ATCC Strain QC Form - Klebsiella pneumoniae
       Reuses buildMIFOM004RowHTML() + MI_FOM004_TEXT_FIELDS
       =================================================== */

    function addEmptyRowMIFOM004C() {
        const tbody = document.getElementById('MI_FOM004C__tbody');
        if (!tbody) return;
        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        MI_FOM004_TEXT_FIELDS.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMIFOM004CForm() {
        const tbody = document.getElementById('MI_FOM004C__tbody');
        if (tbody) { tbody.innerHTML = ''; addEmptyRowMIFOM004C(); }
    }

    function clearMIFOM004CFilters() {
        document.getElementById('MI_FOM004C__from_date').value = '';
        document.getElementById('MI_FOM004C__to_date').value = '';
        clearMIFOM004CForm();
    }

    function loadMIFOM004CData() {
        const fromDate = document.getElementById('MI_FOM004C__from_date').value;
        const toDate   = document.getElementById('MI_FOM004C__to_date').value;
        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        params.append('doc_no', 'TDPL/MI/FOM-004(C)');
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mi/atcc-strain-qc/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MI_FOM004C__tbody');
            if (!tbody) return;
            tbody.innerHTML = '';
            if (!res.data || res.data.length === 0) { addEmptyRowMIFOM004C(); return; }
            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMIFOM004RowHTML(row);
                tbody.appendChild(tr);
            });
            addEmptyRowMIFOM004C();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMIFOM004C(type, message) {
        const existing = document.querySelector('.mi-toast-fom004c');
        if (existing) existing.remove();
        const toast = document.createElement('div');
        toast.className = 'mi-toast-fom004c';
        toast.textContent = message;
        toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMIFOM004C() {
        const formContainer = document.querySelector('[id="TDPL/MI/FOM-004(C)"]');
        if (!formContainer) return;
        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST', body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMIFOM004C('success', result.message || 'Saved successfully!');
                    const tbody = document.getElementById('MI_FOM004C__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';
                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMIFOM004RowHTML(row);
                            tbody.appendChild(tr);
                        });
                        addEmptyRowMIFOM004C();
                    }
                } else {
                    showToastMIFOM004C('error', result.message || 'Failed to save');
                }
            })
            .catch(error => { console.error('Error:', error); showToastMIFOM004C('error', 'Failed to save. Please try again.'); })
            .finally(() => { submitBtn.textContent = originalText; submitBtn.disabled = false; });
            return false;
        });

        addEmptyRowMIFOM004C();
    })();

    /* ===================================================
       FOM-004(D) – ATCC Strain QC Form - Enterococcus faecalis
       Reuses buildMIFOM004RowHTML() + MI_FOM004_TEXT_FIELDS
       =================================================== */

    function addEmptyRowMIFOM004D() {
        const tbody = document.getElementById('MI_FOM004D__tbody');
        if (!tbody) return;
        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        MI_FOM004_TEXT_FIELDS.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMIFOM004DForm() {
        const tbody = document.getElementById('MI_FOM004D__tbody');
        if (tbody) { tbody.innerHTML = ''; addEmptyRowMIFOM004D(); }
    }

    function clearMIFOM004DFilters() {
        document.getElementById('MI_FOM004D__from_date').value = '';
        document.getElementById('MI_FOM004D__to_date').value = '';
        clearMIFOM004DForm();
    }

    function loadMIFOM004DData() {
        const fromDate = document.getElementById('MI_FOM004D__from_date').value;
        const toDate   = document.getElementById('MI_FOM004D__to_date').value;
        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        params.append('doc_no', 'TDPL/MI/FOM-004(D)');
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mi/atcc-strain-qc/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MI_FOM004D__tbody');
            if (!tbody) return;
            tbody.innerHTML = '';
            if (!res.data || res.data.length === 0) { addEmptyRowMIFOM004D(); return; }
            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMIFOM004RowHTML(row);
                tbody.appendChild(tr);
            });
            addEmptyRowMIFOM004D();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMIFOM004D(type, message) {
        const existing = document.querySelector('.mi-toast-fom004d');
        if (existing) existing.remove();
        const toast = document.createElement('div');
        toast.className = 'mi-toast-fom004d';
        toast.textContent = message;
        toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMIFOM004D() {
        const formContainer = document.querySelector('[id="TDPL/MI/FOM-004(D)"]');
        if (!formContainer) return;
        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST', body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMIFOM004D('success', result.message || 'Saved successfully!');
                    const tbody = document.getElementById('MI_FOM004D__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';
                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMIFOM004RowHTML(row);
                            tbody.appendChild(tr);
                        });
                        addEmptyRowMIFOM004D();
                    }
                } else {
                    showToastMIFOM004D('error', result.message || 'Failed to save');
                }
            })
            .catch(error => { console.error('Error:', error); showToastMIFOM004D('error', 'Failed to save. Please try again.'); })
            .finally(() => { submitBtn.textContent = originalText; submitBtn.disabled = false; });
            return false;
        });

        addEmptyRowMIFOM004D();
    })();

    /* ===================================================
       FOM-004(E) – ATCC Strain QC Form - Staphylococcus aureus
       Reuses buildMIFOM004RowHTML() + MI_FOM004_TEXT_FIELDS
       =================================================== */

    function addEmptyRowMIFOM004E() {
        const tbody = document.getElementById('MI_FOM004E__tbody');
        if (!tbody) return;
        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        MI_FOM004_TEXT_FIELDS.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMIFOM004EForm() {
        const tbody = document.getElementById('MI_FOM004E__tbody');
        if (tbody) { tbody.innerHTML = ''; addEmptyRowMIFOM004E(); }
    }

    function clearMIFOM004EFilters() {
        document.getElementById('MI_FOM004E__from_date').value = '';
        document.getElementById('MI_FOM004E__to_date').value = '';
        clearMIFOM004EForm();
    }

    function loadMIFOM004EData() {
        const fromDate = document.getElementById('MI_FOM004E__from_date').value;
        const toDate   = document.getElementById('MI_FOM004E__to_date').value;
        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        params.append('doc_no', 'TDPL/MI/FOM-004(E)');
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mi/atcc-strain-qc/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MI_FOM004E__tbody');
            if (!tbody) return;
            tbody.innerHTML = '';
            if (!res.data || res.data.length === 0) { addEmptyRowMIFOM004E(); return; }
            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMIFOM004RowHTML(row);
                tbody.appendChild(tr);
            });
            addEmptyRowMIFOM004E();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMIFOM004E(type, message) {
        const existing = document.querySelector('.mi-toast-fom004e');
        if (existing) existing.remove();
        const toast = document.createElement('div');
        toast.className = 'mi-toast-fom004e';
        toast.textContent = message;
        toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMIFOM004E() {
        const formContainer = document.querySelector('[id="TDPL/MI/FOM-004(E)"]');
        if (!formContainer) return;
        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST', body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMIFOM004E('success', result.message || 'Saved successfully!');
                    const tbody = document.getElementById('MI_FOM004E__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';
                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMIFOM004RowHTML(row);
                            tbody.appendChild(tr);
                        });
                        addEmptyRowMIFOM004E();
                    }
                } else {
                    showToastMIFOM004E('error', result.message || 'Failed to save');
                }
            })
            .catch(error => { console.error('Error:', error); showToastMIFOM004E('error', 'Failed to save. Please try again.'); })
            .finally(() => { submitBtn.textContent = originalText; submitBtn.disabled = false; });
            return false;
        });

        addEmptyRowMIFOM004E();
    })();

    /* ===================================================
       FOM-004(F) – ATCC Strain QC Form - Staphylococcus haemolyticus
       Reuses buildMIFOM004RowHTML() + MI_FOM004_TEXT_FIELDS
       =================================================== */

    function addEmptyRowMIFOM004F() {
        const tbody = document.getElementById('MI_FOM004F__tbody');
        if (!tbody) return;
        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        MI_FOM004_TEXT_FIELDS.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMIFOM004FForm() {
        const tbody = document.getElementById('MI_FOM004F__tbody');
        if (tbody) { tbody.innerHTML = ''; addEmptyRowMIFOM004F(); }
    }

    function clearMIFOM004FFilters() {
        document.getElementById('MI_FOM004F__from_date').value = '';
        document.getElementById('MI_FOM004F__to_date').value = '';
        clearMIFOM004FForm();
    }

    function loadMIFOM004FData() {
        const fromDate = document.getElementById('MI_FOM004F__from_date').value;
        const toDate   = document.getElementById('MI_FOM004F__to_date').value;
        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        params.append('doc_no', 'TDPL/MI/FOM-004(F)');
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mi/atcc-strain-qc/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MI_FOM004F__tbody');
            if (!tbody) return;
            tbody.innerHTML = '';
            if (!res.data || res.data.length === 0) { addEmptyRowMIFOM004F(); return; }
            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMIFOM004RowHTML(row);
                tbody.appendChild(tr);
            });
            addEmptyRowMIFOM004F();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMIFOM004F(type, message) {
        const existing = document.querySelector('.mi-toast-fom004f');
        if (existing) existing.remove();
        const toast = document.createElement('div');
        toast.className = 'mi-toast-fom004f';
        toast.textContent = message;
        toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMIFOM004F() {
        const formContainer = document.querySelector('[id="TDPL/MI/FOM-004(F)"]');
        if (!formContainer) return;
        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST', body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMIFOM004F('success', result.message || 'Saved successfully!');
                    const tbody = document.getElementById('MI_FOM004F__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';
                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMIFOM004RowHTML(row);
                            tbody.appendChild(tr);
                        });
                        addEmptyRowMIFOM004F();
                    }
                } else {
                    showToastMIFOM004F('error', result.message || 'Failed to save');
                }
            })
            .catch(error => { console.error('Error:', error); showToastMIFOM004F('error', 'Failed to save. Please try again.'); })
            .finally(() => { submitBtn.textContent = originalText; submitBtn.disabled = false; });
            return false;
        });

        addEmptyRowMIFOM004F();
    })();

    /* ===================================================
       FOM-004(G) – ATCC Strain QC Form - Candida albicans
       Reuses buildMIFOM004RowHTML() + MI_FOM004_TEXT_FIELDS
       =================================================== */

    function addEmptyRowMIFOM004G() {
        const tbody = document.getElementById('MI_FOM004G__tbody');
        if (!tbody) return;
        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        MI_FOM004_TEXT_FIELDS.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMIFOM004GForm() {
        const tbody = document.getElementById('MI_FOM004G__tbody');
        if (tbody) { tbody.innerHTML = ''; addEmptyRowMIFOM004G(); }
    }

    function clearMIFOM004GFilters() {
        document.getElementById('MI_FOM004G__from_date').value = '';
        document.getElementById('MI_FOM004G__to_date').value = '';
        clearMIFOM004GForm();
    }

    function loadMIFOM004GData() {
        const fromDate = document.getElementById('MI_FOM004G__from_date').value;
        const toDate   = document.getElementById('MI_FOM004G__to_date').value;
        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        params.append('doc_no', 'TDPL/MI/FOM-004(G)');
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mi/atcc-strain-qc/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MI_FOM004G__tbody');
            if (!tbody) return;
            tbody.innerHTML = '';
            if (!res.data || res.data.length === 0) { addEmptyRowMIFOM004G(); return; }
            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMIFOM004RowHTML(row);
                tbody.appendChild(tr);
            });
            addEmptyRowMIFOM004G();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMIFOM004G(type, message) {
        const existing = document.querySelector('.mi-toast-fom004g');
        if (existing) existing.remove();
        const toast = document.createElement('div');
        toast.className = 'mi-toast-fom004g';
        toast.textContent = message;
        toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMIFOM004G() {
        const formContainer = document.querySelector('[id="TDPL/MI/FOM-004(G)"]');
        if (!formContainer) return;
        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST', body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMIFOM004G('success', result.message || 'Saved successfully!');
                    const tbody = document.getElementById('MI_FOM004G__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';
                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMIFOM004RowHTML(row);
                            tbody.appendChild(tr);
                        });
                        addEmptyRowMIFOM004G();
                    }
                } else {
                    showToastMIFOM004G('error', result.message || 'Failed to save');
                }
            })
            .catch(error => { console.error('Error:', error); showToastMIFOM004G('error', 'Failed to save. Please try again.'); })
            .finally(() => { submitBtn.textContent = originalText; submitBtn.disabled = false; });
            return false;
        });

        addEmptyRowMIFOM004G();
    })();

    /* ===================================================
       FOM-005 – Media Quality Control Form
       Shared table for FOM-005, FOM-005(A)–(E)
       =================================================== */

    const MI_FOM005_TEXT_FIELDS = ['product_info','analysis_done_by','appearance','incubation','atcc','growth_expected','growth_observed','capa','signature'];

    function buildMIFOM005RowHTML(row) {
        let html = `<td style="border:1px solid #000; padding:4px;">
            <input type="hidden" name="row_id[]" value="${row.id}">
            <input type="date" name="row_date[]" value="${row.row_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
        </td>`;
        MI_FOM005_TEXT_FIELDS.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" value="${row[f] || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        return html;
    }

    /* ---------- FOM-005 (base) ---------- */

    function addEmptyRowMIFOM005() {
        const tbody = document.getElementById('MI_FOM005__tbody');
        if (!tbody) return;
        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        MI_FOM005_TEXT_FIELDS.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMIFOM005Form() {
        const tbody = document.getElementById('MI_FOM005__tbody');
        if (tbody) { tbody.innerHTML = ''; addEmptyRowMIFOM005(); }
    }

    function clearMIFOM005Filters() {
        document.getElementById('MI_FOM005__from_date').value = '';
        document.getElementById('MI_FOM005__to_date').value = '';
        clearMIFOM005Form();
    }

    function loadMIFOM005Data() {
        const fromDate = document.getElementById('MI_FOM005__from_date').value;
        const toDate   = document.getElementById('MI_FOM005__to_date').value;
        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        params.append('doc_no', 'TDPL/MI/FOM-005');
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mi/media-qc/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MI_FOM005__tbody');
            if (!tbody) return;
            tbody.innerHTML = '';
            if (!res.data || res.data.length === 0) { addEmptyRowMIFOM005(); return; }
            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMIFOM005RowHTML(row);
                tbody.appendChild(tr);
            });
            addEmptyRowMIFOM005();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMIFOM005(type, message) {
        const existing = document.querySelector('.mi-toast-fom005');
        if (existing) existing.remove();
        const toast = document.createElement('div');
        toast.className = 'mi-toast-fom005';
        toast.textContent = message;
        toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMIFOM005() {
        const formContainer = document.querySelector('[id="TDPL/MI/FOM-005"]');
        if (!formContainer) return;
        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST', body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMIFOM005('success', result.message || 'Saved successfully!');
                    const tbody = document.getElementById('MI_FOM005__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';
                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMIFOM005RowHTML(row);
                            tbody.appendChild(tr);
                        });
                        addEmptyRowMIFOM005();
                    }
                } else {
                    showToastMIFOM005('error', result.message || 'Failed to save');
                }
            })
            .catch(error => { console.error('Error:', error); showToastMIFOM005('error', 'Failed to save. Please try again.'); })
            .finally(() => { submitBtn.textContent = originalText; submitBtn.disabled = false; });
            return false;
        });

        addEmptyRowMIFOM005();
    })();

    /* ---------- FOM-005(A) – Media QC Form - Sheep Blood Agar ---------- */

    function addEmptyRowMIFOM005A() {
        const tbody = document.getElementById('MI_FOM005A__tbody');
        if (!tbody) return;
        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        MI_FOM005_TEXT_FIELDS.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMIFOM005AForm() {
        const tbody = document.getElementById('MI_FOM005A__tbody');
        if (tbody) { tbody.innerHTML = ''; addEmptyRowMIFOM005A(); }
    }

    function clearMIFOM005AFilters() {
        document.getElementById('MI_FOM005A__from_date').value = '';
        document.getElementById('MI_FOM005A__to_date').value = '';
        clearMIFOM005AForm();
    }

    function loadMIFOM005AData() {
        const fromDate = document.getElementById('MI_FOM005A__from_date').value;
        const toDate   = document.getElementById('MI_FOM005A__to_date').value;
        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        params.append('doc_no', 'TDPL/MI/FOM-005(A)');
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mi/media-qc/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MI_FOM005A__tbody');
            if (!tbody) return;
            tbody.innerHTML = '';
            if (!res.data || res.data.length === 0) { addEmptyRowMIFOM005A(); return; }
            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMIFOM005RowHTML(row);
                tbody.appendChild(tr);
            });
            addEmptyRowMIFOM005A();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMIFOM005A(type, message) {
        const existing = document.querySelector('.mi-toast-fom005a');
        if (existing) existing.remove();
        const toast = document.createElement('div');
        toast.className = 'mi-toast-fom005a';
        toast.textContent = message;
        toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMIFOM005A() {
        const formContainer = document.querySelector('[id="TDPL/MI/FOM-005(A)"]');
        if (!formContainer) return;
        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST', body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMIFOM005A('success', result.message || 'Saved successfully!');
                    const tbody = document.getElementById('MI_FOM005A__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';
                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMIFOM005RowHTML(row);
                            tbody.appendChild(tr);
                        });
                        addEmptyRowMIFOM005A();
                    }
                } else {
                    showToastMIFOM005A('error', result.message || 'Failed to save');
                }
            })
            .catch(error => { console.error('Error:', error); showToastMIFOM005A('error', 'Failed to save. Please try again.'); })
            .finally(() => { submitBtn.textContent = originalText; submitBtn.disabled = false; });
            return false;
        });

        addEmptyRowMIFOM005A();
    })();

    /* ---------- FOM-005(B) – Media QC Form - MacConkey Agar ---------- */

    function addEmptyRowMIFOM005B() {
        const tbody = document.getElementById('MI_FOM005B__tbody');
        if (!tbody) return;
        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        MI_FOM005_TEXT_FIELDS.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMIFOM005BForm() {
        const tbody = document.getElementById('MI_FOM005B__tbody');
        if (tbody) { tbody.innerHTML = ''; addEmptyRowMIFOM005B(); }
    }

    function clearMIFOM005BFilters() {
        document.getElementById('MI_FOM005B__from_date').value = '';
        document.getElementById('MI_FOM005B__to_date').value = '';
        clearMIFOM005BForm();
    }

    function loadMIFOM005BData() {
        const fromDate = document.getElementById('MI_FOM005B__from_date').value;
        const toDate   = document.getElementById('MI_FOM005B__to_date').value;
        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        params.append('doc_no', 'TDPL/MI/FOM-005(B)');
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mi/media-qc/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MI_FOM005B__tbody');
            if (!tbody) return;
            tbody.innerHTML = '';
            if (!res.data || res.data.length === 0) { addEmptyRowMIFOM005B(); return; }
            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMIFOM005RowHTML(row);
                tbody.appendChild(tr);
            });
            addEmptyRowMIFOM005B();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMIFOM005B(type, message) {
        const existing = document.querySelector('.mi-toast-fom005b');
        if (existing) existing.remove();
        const toast = document.createElement('div');
        toast.className = 'mi-toast-fom005b';
        toast.textContent = message;
        toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMIFOM005B() {
        const formContainer = document.querySelector('[id="TDPL/MI/FOM-005(B)"]');
        if (!formContainer) return;
        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST', body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMIFOM005B('success', result.message || 'Saved successfully!');
                    const tbody = document.getElementById('MI_FOM005B__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';
                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMIFOM005RowHTML(row);
                            tbody.appendChild(tr);
                        });
                        addEmptyRowMIFOM005B();
                    }
                } else {
                    showToastMIFOM005B('error', result.message || 'Failed to save');
                }
            })
            .catch(error => { console.error('Error:', error); showToastMIFOM005B('error', 'Failed to save. Please try again.'); })
            .finally(() => { submitBtn.textContent = originalText; submitBtn.disabled = false; });
            return false;
        });

        addEmptyRowMIFOM005B();
    })();

    /* ---------- FOM-005(C) – Media QC Form - Mueller Hinton Agar ---------- */

    function addEmptyRowMIFOM005C() {
        const tbody = document.getElementById('MI_FOM005C__tbody');
        if (!tbody) return;
        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        MI_FOM005_TEXT_FIELDS.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMIFOM005CForm() {
        const tbody = document.getElementById('MI_FOM005C__tbody');
        if (tbody) { tbody.innerHTML = ''; addEmptyRowMIFOM005C(); }
    }

    function clearMIFOM005CFilters() {
        document.getElementById('MI_FOM005C__from_date').value = '';
        document.getElementById('MI_FOM005C__to_date').value = '';
        clearMIFOM005CForm();
    }

    function loadMIFOM005CData() {
        const fromDate = document.getElementById('MI_FOM005C__from_date').value;
        const toDate   = document.getElementById('MI_FOM005C__to_date').value;
        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        params.append('doc_no', 'TDPL/MI/FOM-005(C)');
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mi/media-qc/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MI_FOM005C__tbody');
            if (!tbody) return;
            tbody.innerHTML = '';
            if (!res.data || res.data.length === 0) { addEmptyRowMIFOM005C(); return; }
            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMIFOM005RowHTML(row);
                tbody.appendChild(tr);
            });
            addEmptyRowMIFOM005C();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMIFOM005C(type, message) {
        const existing = document.querySelector('.mi-toast-fom005c');
        if (existing) existing.remove();
        const toast = document.createElement('div');
        toast.className = 'mi-toast-fom005c';
        toast.textContent = message;
        toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMIFOM005C() {
        const formContainer = document.querySelector('[id="TDPL/MI/FOM-005(C)"]');
        if (!formContainer) return;
        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST', body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMIFOM005C('success', result.message || 'Saved successfully!');
                    const tbody = document.getElementById('MI_FOM005C__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';
                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMIFOM005RowHTML(row);
                            tbody.appendChild(tr);
                        });
                        addEmptyRowMIFOM005C();
                    }
                } else {
                    showToastMIFOM005C('error', result.message || 'Failed to save');
                }
            })
            .catch(error => { console.error('Error:', error); showToastMIFOM005C('error', 'Failed to save. Please try again.'); })
            .finally(() => { submitBtn.textContent = originalText; submitBtn.disabled = false; });
            return false;
        });

        addEmptyRowMIFOM005C();
    })();

    /* ---------- FOM-005(D) – Media QC Form - Chocolate Agar ---------- */

    function addEmptyRowMIFOM005D() {
        const tbody = document.getElementById('MI_FOM005D__tbody');
        if (!tbody) return;
        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        MI_FOM005_TEXT_FIELDS.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMIFOM005DForm() {
        const tbody = document.getElementById('MI_FOM005D__tbody');
        if (tbody) { tbody.innerHTML = ''; addEmptyRowMIFOM005D(); }
    }

    function clearMIFOM005DFilters() {
        document.getElementById('MI_FOM005D__from_date').value = '';
        document.getElementById('MI_FOM005D__to_date').value = '';
        clearMIFOM005DForm();
    }

    function loadMIFOM005DData() {
        const fromDate = document.getElementById('MI_FOM005D__from_date').value;
        const toDate   = document.getElementById('MI_FOM005D__to_date').value;
        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        params.append('doc_no', 'TDPL/MI/FOM-005(D)');
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mi/media-qc/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MI_FOM005D__tbody');
            if (!tbody) return;
            tbody.innerHTML = '';
            if (!res.data || res.data.length === 0) { addEmptyRowMIFOM005D(); return; }
            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMIFOM005RowHTML(row);
                tbody.appendChild(tr);
            });
            addEmptyRowMIFOM005D();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMIFOM005D(type, message) {
        const existing = document.querySelector('.mi-toast-fom005d');
        if (existing) existing.remove();
        const toast = document.createElement('div');
        toast.className = 'mi-toast-fom005d';
        toast.textContent = message;
        toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMIFOM005D() {
        const formContainer = document.querySelector('[id="TDPL/MI/FOM-005(D)"]');
        if (!formContainer) return;
        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST', body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMIFOM005D('success', result.message || 'Saved successfully!');
                    const tbody = document.getElementById('MI_FOM005D__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';
                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMIFOM005RowHTML(row);
                            tbody.appendChild(tr);
                        });
                        addEmptyRowMIFOM005D();
                    }
                } else {
                    showToastMIFOM005D('error', result.message || 'Failed to save');
                }
            })
            .catch(error => { console.error('Error:', error); showToastMIFOM005D('error', 'Failed to save. Please try again.'); })
            .finally(() => { submitBtn.textContent = originalText; submitBtn.disabled = false; });
            return false;
        });

        addEmptyRowMIFOM005D();
    })();

    /* ---------- FOM-005(E) – Media QC Form - SDA Agar ---------- */

    function addEmptyRowMIFOM005E() {
        const tbody = document.getElementById('MI_FOM005E__tbody');
        if (!tbody) return;
        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        MI_FOM005_TEXT_FIELDS.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMIFOM005EForm() {
        const tbody = document.getElementById('MI_FOM005E__tbody');
        if (tbody) { tbody.innerHTML = ''; addEmptyRowMIFOM005E(); }
    }

    function clearMIFOM005EFilters() {
        document.getElementById('MI_FOM005E__from_date').value = '';
        document.getElementById('MI_FOM005E__to_date').value = '';
        clearMIFOM005EForm();
    }

    function loadMIFOM005EData() {
        const fromDate = document.getElementById('MI_FOM005E__from_date').value;
        const toDate   = document.getElementById('MI_FOM005E__to_date').value;
        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        params.append('doc_no', 'TDPL/MI/FOM-005(E)');
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mi/media-qc/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MI_FOM005E__tbody');
            if (!tbody) return;
            tbody.innerHTML = '';
            if (!res.data || res.data.length === 0) { addEmptyRowMIFOM005E(); return; }
            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMIFOM005RowHTML(row);
                tbody.appendChild(tr);
            });
            addEmptyRowMIFOM005E();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMIFOM005E(type, message) {
        const existing = document.querySelector('.mi-toast-fom005e');
        if (existing) existing.remove();
        const toast = document.createElement('div');
        toast.className = 'mi-toast-fom005e';
        toast.textContent = message;
        toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMIFOM005E() {
        const formContainer = document.querySelector('[id="TDPL/MI/FOM-005(E)"]');
        if (!formContainer) return;
        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST', body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMIFOM005E('success', result.message || 'Saved successfully!');
                    const tbody = document.getElementById('MI_FOM005E__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';
                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMIFOM005RowHTML(row);
                            tbody.appendChild(tr);
                        });
                        addEmptyRowMIFOM005E();
                    }
                } else {
                    showToastMIFOM005E('error', result.message || 'Failed to save');
                }
            })
            .catch(error => { console.error('Error:', error); showToastMIFOM005E('error', 'Failed to save. Please try again.'); })
            .finally(() => { submitBtn.textContent = originalText; submitBtn.disabled = false; });
            return false;
        });

        addEmptyRowMIFOM005E();
    })();

    /* ================================================================
       REG-001 – Microbiology Work Register
       ================================================================ */

    const MI_REG001_TEXT_FIELDS = ['barcode','patient_name','age_gender','investigation','sample_type','sample_received_dt','sample_received_by','sample_processing_dt','sample_processed_by','observations','hod_signature'];

    function buildMIREG001RowHTML(row) {
        let html = `<td style="border:1px solid #000; padding:4px;">
            <input type="hidden" name="row_id[]" value="${row.id}">
            <input type="date" name="row_date[]" value="${row.row_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
        </td>`;
        MI_REG001_TEXT_FIELDS.forEach(f => {
            if (f === 'sample_received_dt' || f === 'sample_processing_dt') {
                html += `<td style="border:1px solid #000; padding:4px;"><input type="datetime-local" name="${f}[]" value="${row[f] || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
            } else {
                html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" value="${row[f] || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
            }
        });
        return html;
    }

    function addEmptyRowMIREG001() {
        const tbody = document.getElementById('MI_REG001__tbody');
        if (!tbody) return;
        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        MI_REG001_TEXT_FIELDS.forEach(f => {
            if (f === 'sample_received_dt' || f === 'sample_processing_dt') {
                html += `<td style="border:1px solid #000; padding:4px;"><input type="datetime-local" name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
            } else {
                html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
            }
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMIREG001Form() {
        const tbody = document.getElementById('MI_REG001__tbody');
        if (tbody) { tbody.innerHTML = ''; addEmptyRowMIREG001(); }
    }

    function clearMIREG001Filters() {
        document.getElementById('MI_REG001__from_date').value = '';
        document.getElementById('MI_REG001__to_date').value = '';
        clearMIREG001Form();
    }

    function loadMIREG001Data() {
        const fromDate = document.getElementById('MI_REG001__from_date').value;
        const toDate   = document.getElementById('MI_REG001__to_date').value;
        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        params.append('doc_no', 'TDPL/MI/REG-001');
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mi/microbiology-work-register/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MI_REG001__tbody');
            if (!tbody) return;
            tbody.innerHTML = '';
            if (!res.data || res.data.length === 0) { addEmptyRowMIREG001(); return; }
            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMIREG001RowHTML(row);
                tbody.appendChild(tr);
            });
            addEmptyRowMIREG001();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMIREG001(type, message) {
        const existing = document.querySelector('.mi-toast-reg001');
        if (existing) existing.remove();
        const toast = document.createElement('div');
        toast.className = 'mi-toast-reg001';
        toast.textContent = message;
        toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMIREG001() {
        const formContainer = document.querySelector('[id="TDPL/MI/REG-001"]');
        if (!formContainer) return;
        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST', body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMIREG001('success', result.message || 'Saved successfully!');
                    const tbody = document.getElementById('MI_REG001__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';
                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMIREG001RowHTML(row);
                            tbody.appendChild(tr);
                        });
                        addEmptyRowMIREG001();
                    }
                } else {
                    showToastMIREG001('error', result.message || 'Failed to save');
                }
            })
            .catch(error => { console.error('Error:', error); showToastMIREG001('error', 'Failed to save. Please try again.'); })
            .finally(() => { submitBtn.textContent = originalText; submitBtn.disabled = false; });
            return false;
        });

        addEmptyRowMIREG001();
    })();

    /* ================================================================
       REG-002 – Media Preparation Register
       ================================================================ */

    const MI_REG002_TEXT_FIELDS = ['media_name','lot_details','volume_prepared','weight_prepared','autoclave_start','autoclave_end','sterile_holding','total_duration','temperature','pressure','chemical_indicators','biological_indicators','hod_sign'];

    function buildMIREG002RowHTML(row) {
        let html = `<td style="border:1px solid #000; padding:4px;">
            <input type="hidden" name="row_id[]" value="${row.id}">
            <input type="date" name="row_date[]" value="${row.row_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
        </td>`;
        MI_REG002_TEXT_FIELDS.forEach(f => {
            if (f === 'autoclave_start' || f === 'autoclave_end') {
                html += `<td style="border:1px solid #000; padding:4px;"><input type="datetime-local" name="${f}[]" value="${row[f] || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
            } else {
                html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" value="${row[f] || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
            }
        });
        return html;
    }

    function addEmptyRowMIREG002() {
        const tbody = document.getElementById('MI_REG002__tbody');
        if (!tbody) return;
        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        MI_REG002_TEXT_FIELDS.forEach(f => {
            if (f === 'autoclave_start' || f === 'autoclave_end') {
                html += `<td style="border:1px solid #000; padding:4px;"><input type="datetime-local" name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
            } else {
                html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
            }
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMIREG002Form() {
        const tbody = document.getElementById('MI_REG002__tbody');
        if (tbody) { tbody.innerHTML = ''; addEmptyRowMIREG002(); }
    }

    function clearMIREG002Filters() {
        document.getElementById('MI_REG002__from_date').value = '';
        document.getElementById('MI_REG002__to_date').value = '';
        clearMIREG002Form();
    }

    function loadMIREG002Data() {
        const fromDate = document.getElementById('MI_REG002__from_date').value;
        const toDate   = document.getElementById('MI_REG002__to_date').value;
        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        params.append('doc_no', 'TDPL/MI/REG-002');
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mi/media-preparation-register/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MI_REG002__tbody');
            if (!tbody) return;
            tbody.innerHTML = '';
            if (!res.data || res.data.length === 0) { addEmptyRowMIREG002(); return; }
            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMIREG002RowHTML(row);
                tbody.appendChild(tr);
            });
            addEmptyRowMIREG002();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMIREG002(type, message) {
        const existing = document.querySelector('.mi-toast-reg002');
        if (existing) existing.remove();
        const toast = document.createElement('div');
        toast.className = 'mi-toast-reg002';
        toast.textContent = message;
        toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMIREG002() {
        const formContainer = document.querySelector('[id="TDPL/MI/REG-002"]');
        if (!formContainer) return;
        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST', body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMIREG002('success', result.message || 'Saved successfully!');
                    const tbody = document.getElementById('MI_REG002__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';
                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMIREG002RowHTML(row);
                            tbody.appendChild(tr);
                        });
                        addEmptyRowMIREG002();
                    }
                } else {
                    showToastMIREG002('error', result.message || 'Failed to save');
                }
            })
            .catch(error => { console.error('Error:', error); showToastMIREG002('error', 'Failed to save. Please try again.'); })
            .finally(() => { submitBtn.textContent = originalText; submitBtn.disabled = false; });
            return false;
        });

        addEmptyRowMIREG002();
    })();

    /* ================================================================
       REG-003 – Media Sterility Check Register
       ================================================================ */

    const MI_REG003_TEXT_FIELDS = ['batch_no','media_details','expected_growth','sterility_24','sterility_48','sterility_checked','done_by','checked_by','hod_remarks'];

    function buildMIREG003RowHTML(row) {
        let html = `<td style="border:1px solid #000; padding:4px;">
            <input type="hidden" name="row_id[]" value="${row.id}">
            <input type="date" name="row_date[]" value="${row.row_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
        </td>`;
        MI_REG003_TEXT_FIELDS.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" value="${row[f] || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        return html;
    }

    function addEmptyRowMIREG003() {
        const tbody = document.getElementById('MI_REG003__tbody');
        if (!tbody) return;
        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        MI_REG003_TEXT_FIELDS.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMIREG003Form() {
        const tbody = document.getElementById('MI_REG003__tbody');
        if (tbody) { tbody.innerHTML = ''; addEmptyRowMIREG003(); }
    }

    function clearMIREG003Filters() {
        document.getElementById('MI_REG003__from_date').value = '';
        document.getElementById('MI_REG003__to_date').value = '';
        clearMIREG003Form();
    }

    function loadMIREG003Data() {
        const fromDate = document.getElementById('MI_REG003__from_date').value;
        const toDate   = document.getElementById('MI_REG003__to_date').value;
        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        params.append('doc_no', 'TDPL/MI/REG-003');
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mi/media-sterility-check-register/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MI_REG003__tbody');
            if (!tbody) return;
            tbody.innerHTML = '';
            if (!res.data || res.data.length === 0) { addEmptyRowMIREG003(); return; }
            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMIREG003RowHTML(row);
                tbody.appendChild(tr);
            });
            addEmptyRowMIREG003();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMIREG003(type, message) {
        const existing = document.querySelector('.mi-toast-reg003');
        if (existing) existing.remove();
        const toast = document.createElement('div');
        toast.className = 'mi-toast-reg003';
        toast.textContent = message;
        toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMIREG003() {
        const formContainer = document.querySelector('[id="TDPL/MI/REG-003"]');
        if (!formContainer) return;
        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST', body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMIREG003('success', result.message || 'Saved successfully!');
                    const tbody = document.getElementById('MI_REG003__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';
                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMIREG003RowHTML(row);
                            tbody.appendChild(tr);
                        });
                        addEmptyRowMIREG003();
                    }
                } else {
                    showToastMIREG003('error', result.message || 'Failed to save');
                }
            })
            .catch(error => { console.error('Error:', error); showToastMIREG003('error', 'Failed to save. Please try again.'); })
            .finally(() => { submitBtn.textContent = originalText; submitBtn.disabled = false; });
            return false;
        });

        addEmptyRowMIREG003();
    })();

    /* ================================================================
       REG-004 – Vitek 2 Saline Quality Control Register
       ================================================================ */

    const MI_REG004_TEXT_FIELDS = ['vitek_saline','blood_agar_growth','qc_status','done_by','hod_sign'];

    function buildMIREG004RowHTML(row) {
        let html = `<td style="border:1px solid #000; padding:4px;">
            <input type="hidden" name="row_id[]" value="${row.id}">
            <input type="date" name="row_date[]" value="${row.row_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
        </td>`;
        MI_REG004_TEXT_FIELDS.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" value="${row[f] || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        return html;
    }

    function addEmptyRowMIREG004() {
        const tbody = document.getElementById('MI_REG004__tbody');
        if (!tbody) return;
        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        MI_REG004_TEXT_FIELDS.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMIREG004Form() {
        const tbody = document.getElementById('MI_REG004__tbody');
        if (tbody) { tbody.innerHTML = ''; addEmptyRowMIREG004(); }
    }

    function clearMIREG004Filters() {
        document.getElementById('MI_REG004__from_date').value = '';
        document.getElementById('MI_REG004__to_date').value = '';
        clearMIREG004Form();
    }

    function loadMIREG004Data() {
        const fromDate = document.getElementById('MI_REG004__from_date').value;
        const toDate   = document.getElementById('MI_REG004__to_date').value;
        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        params.append('doc_no', 'TDPL/MI/REG-004');
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mi/vitek2-saline-qc-register/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MI_REG004__tbody');
            if (!tbody) return;
            tbody.innerHTML = '';
            if (!res.data || res.data.length === 0) { addEmptyRowMIREG004(); return; }
            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMIREG004RowHTML(row);
                tbody.appendChild(tr);
            });
            addEmptyRowMIREG004();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMIREG004(type, message) {
        const existing = document.querySelector('.mi-toast-reg004');
        if (existing) existing.remove();
        const toast = document.createElement('div');
        toast.className = 'mi-toast-reg004';
        toast.textContent = message;
        toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMIREG004() {
        const formContainer = document.querySelector('[id="TDPL/MI/REG-004"]');
        if (!formContainer) return;
        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST', body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMIREG004('success', result.message || 'Saved successfully!');
                    const tbody = document.getElementById('MI_REG004__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';
                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMIREG004RowHTML(row);
                            tbody.appendChild(tr);
                        });
                        addEmptyRowMIREG004();
                    }
                } else {
                    showToastMIREG004('error', result.message || 'Failed to save');
                }
            })
            .catch(error => { console.error('Error:', error); showToastMIREG004('error', 'Failed to save. Please try again.'); })
            .finally(() => { submitBtn.textContent = originalText; submitBtn.disabled = false; });
            return false;
        });

        addEmptyRowMIREG004();
    })();

    /* ================================================================
       REG-005 – Loop Maintenance Register
       ================================================================ */

    const MI_REG005_TEXT_FIELDS = ['lot_number','date_calibration','calibration_status','verified_by','hod_sign','remarks'];

    function buildMIREG005RowHTML(row) {
        let html = `<td style="border:1px solid #000; padding:4px;">
            <input type="hidden" name="row_id[]" value="${row.id}">
            <input type="date" name="row_date[]" value="${row.row_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
        </td>`;
        MI_REG005_TEXT_FIELDS.forEach(f => {
            if (f === 'date_calibration') {
                html += `<td style="border:1px solid #000; padding:4px;"><input type="date" name="${f}[]" value="${row[f] || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
            } else {
                html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" value="${row[f] || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
            }
        });
        return html;
    }

    function addEmptyRowMIREG005() {
        const tbody = document.getElementById('MI_REG005__tbody');
        if (!tbody) return;
        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        MI_REG005_TEXT_FIELDS.forEach(f => {
            if (f === 'date_calibration') {
                html += `<td style="border:1px solid #000; padding:4px;"><input type="date" name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
            } else {
                html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
            }
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMIREG005Form() {
        const tbody = document.getElementById('MI_REG005__tbody');
        if (tbody) { tbody.innerHTML = ''; addEmptyRowMIREG005(); }
    }

    function clearMIREG005Filters() {
        document.getElementById('MI_REG005__from_date').value = '';
        document.getElementById('MI_REG005__to_date').value = '';
        clearMIREG005Form();
    }

    function loadMIREG005Data() {
        const fromDate = document.getElementById('MI_REG005__from_date').value;
        const toDate   = document.getElementById('MI_REG005__to_date').value;
        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        params.append('doc_no', 'TDPL/MI/REG-005');
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mi/loop-maintenance-register/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MI_REG005__tbody');
            if (!tbody) return;
            tbody.innerHTML = '';
            if (!res.data || res.data.length === 0) { addEmptyRowMIREG005(); return; }
            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMIREG005RowHTML(row);
                tbody.appendChild(tr);
            });
            addEmptyRowMIREG005();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMIREG005(type, message) {
        const existing = document.querySelector('.mi-toast-reg005');
        if (existing) existing.remove();
        const toast = document.createElement('div');
        toast.className = 'mi-toast-reg005';
        toast.textContent = message;
        toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMIREG005() {
        const formContainer = document.querySelector('[id="TDPL/MI/REG-005"]');
        if (!formContainer) return;
        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST', body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMIREG005('success', result.message || 'Saved successfully!');
                    const tbody = document.getElementById('MI_REG005__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';
                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMIREG005RowHTML(row);
                            tbody.appendChild(tr);
                        });
                        addEmptyRowMIREG005();
                    }
                } else {
                    showToastMIREG005('error', result.message || 'Failed to save');
                }
            })
            .catch(error => { console.error('Error:', error); showToastMIREG005('error', 'Failed to save. Please try again.'); })
            .finally(() => { submitBtn.textContent = originalText; submitBtn.disabled = false; });
            return false;
        });

        addEmptyRowMIREG005();
    })();

    /* ================================================================
       REG-006 – Bact Alert QC Register
       ================================================================ */

    const MI_REG006_TEXT_FIELDS = ['lot_expiry','atcc_no','inoculum_density','growth_observation','gram_stain_observation','acceptable','not_acceptable','done_by','checked_by','hod_sign','remarks'];

    function buildMIREG006RowHTML(row) {
        let html = `<td style="border:1px solid #000; padding:4px;">
            <input type="hidden" name="row_id[]" value="${row.id}">
            <input type="date" name="row_date[]" value="${row.row_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
        </td>`;
        MI_REG006_TEXT_FIELDS.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" value="${row[f] || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        return html;
    }

    function addEmptyRowMIREG006() {
        const tbody = document.getElementById('MI_REG006__tbody');
        if (!tbody) return;
        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        MI_REG006_TEXT_FIELDS.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMIREG006Form() {
        const tbody = document.getElementById('MI_REG006__tbody');
        if (tbody) { tbody.innerHTML = ''; addEmptyRowMIREG006(); }
    }

    function clearMIREG006Filters() {
        document.getElementById('MI_REG006__from_date').value = '';
        document.getElementById('MI_REG006__to_date').value = '';
        clearMIREG006Form();
    }

    function loadMIREG006Data() {
        const fromDate = document.getElementById('MI_REG006__from_date').value;
        const toDate   = document.getElementById('MI_REG006__to_date').value;
        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        params.append('doc_no', 'TDPL/MI/REG-006');
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mi/bact-alert-qc-register/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MI_REG006__tbody');
            if (!tbody) return;
            tbody.innerHTML = '';
            if (!res.data || res.data.length === 0) { addEmptyRowMIREG006(); return; }
            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMIREG006RowHTML(row);
                tbody.appendChild(tr);
            });
            addEmptyRowMIREG006();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMIREG006(type, message) {
        const existing = document.querySelector('.mi-toast-reg006');
        if (existing) existing.remove();
        const toast = document.createElement('div');
        toast.className = 'mi-toast-reg006';
        toast.textContent = message;
        toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMIREG006() {
        const formContainer = document.querySelector('[id="TDPL/MI/REG-006"]');
        if (!formContainer) return;
        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch(form.action, {
                method: 'POST', body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
            })
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMIREG006('success', result.message || 'Saved successfully!');
                    const tbody = document.getElementById('MI_REG006__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';
                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMIREG006RowHTML(row);
                            tbody.appendChild(tr);
                        });
                        addEmptyRowMIREG006();
                    }
                } else {
                    showToastMIREG006('error', result.message || 'Failed to save');
                }
            })
            .catch(error => { console.error('Error:', error); showToastMIREG006('error', 'Failed to save. Please try again.'); })
            .finally(() => { submitBtn.textContent = originalText; submitBtn.disabled = false; });
            return false;
        });

        addEmptyRowMIREG006();
    })();
</script>


</html>


@endsection
