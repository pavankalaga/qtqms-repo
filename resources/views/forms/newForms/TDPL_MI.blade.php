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
        buttonText="Submit">

        <div style="margin: 0 auto;padding: 20px;font-family: Arial, sans-serif;background: #fff;border: 1px solid;border-radius: 16px;">
            <!-- Language Toggle -->
            <div style="background: #f8f9fa; padding: 15px; border-radius: 8px; margin-bottom: 30px; text-align: center;">
                <label style="margin-right: 20px; font-weight: bold; color: #333;">Select Language:</label>
                <button onclick="TDPL_MI_FOM_001_showLanguage('english')" id="TDPL/MI/FOM-001_btn-english" style="padding: 10px 20px; margin: 5px; border: 2px solid #017535ff; background: #017535ff; color: white; border-radius: 5px; cursor: pointer; font-weight: bold;">English</button>
                <button onclick="TDPL_MI_FOM_001_showLanguage('hindi')" id="TDPL/MI/FOM-001_btn-hindi" style="padding: 10px 20px; margin: 5px; border: 2px solid #017535ff; background: white; color: #017535ff; border-radius: 5px; cursor: pointer; font-weight: bold;">हिंदी</button>
                <button onclick="TDPL_MI_FOM_001_showLanguage('telugu')" id="TDPL/MI/FOM-001_btn-telugu" style="padding: 10px 20px; margin: 5px; border: 2px solid #017535ff; background: white; color: #017535ff; border-radius: 5px; cursor: pointer; font-weight: bold;">తెలుగు</button>
            </div>

            <form style="background: #ffffff; padding: 30px; border: 1px solid #ddd; border-radius: 8px;">
                @csrf

                <!-- ENGLISH VERSION -->
                <div id="TDPL/MI/FOM-001_lang-english" class="language-content">
                    <h1 style="text-align: center; color: #d32f2f; border-bottom: 3px solid #d32f2f; padding-bottom: 10px; margin-bottom: 30px;">CONSENT FOR HIV TESTING</h1>

                    <!-- Patient Information -->
                    <div style="background: #f5f5f5; padding: 20px; border-radius: 5px; margin-bottom: 25px;">
                        <h3 style="color: #333; margin-top: 0;">Patient Information</h3>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Name:</label>
                                <input type="text" name="name" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Age:</label>
                                <input type="number" name="age" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                        </div>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Sex:</label>
                                <select name="sex" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                    <option value="">Select</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Date:</label>
                                <input type="date" name="date" value="{{ date('Y-m-d') }}" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                        </div>
                        <div style="margin-bottom: 15px;">
                            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Address:</label>
                            <textarea name="address" required rows="2" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"></textarea>
                        </div>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Mobile:</label>
                                <input type="tel" name="mobile" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Lab ID:</label>
                                <input type="text" name="lab_id" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
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
                                <input type="checkbox" name="consent_given" required style="width: 20px; height: 20px; margin-right: 10px;">
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
                                <input type="text" name="doctor_name" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                            <div style="margin-bottom: 15px;">
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Address:</label>
                                <input type="text" name="doctor_address" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Contact No:</label>
                                <input type="tel" name="doctor_contact" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                        </div>

                        <p style="line-height: 1.6; margin-top: 15px; font-style: italic;">Post Test Counseling will be given by my treating Clinician/Doctor.</p>
                    </div>

                    <!-- Signatures -->
                    <div style="background: #e8f5e9; padding: 20px; border-radius: 5px; border-left: 4px solid #4caf50;">
                        <div style="margin-bottom: 20px;">
                            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Signature of Patient/Attendant (in case of minors):</label>
                            <input type="text" name="patient_signature" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" placeholder="Type your full name as signature">
                        </div>
                        <div>
                            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Date:</label>
                            <input type="date" name="signature_date" value="{{ date('Y-m-d') }}" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
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
                                <input type="text" name="name_hi" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">आयु:</label>
                                <input type="number" name="age_hi" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                        </div>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">लिंग:</label>
                                <select name="sex_hi" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                    <option value="">चुनें</option>
                                    <option value="male">पुरुष</option>
                                    <option value="female">महिला</option>
                                    <option value="other">अन्य</option>
                                </select>
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">तारीख:</label>
                                <input type="date" name="date_hi" value="{{ date('Y-m-d') }}" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                        </div>
                        <div style="margin-bottom: 15px;">
                            <label style="display: block; margin-bottom: 5px; font-weight: bold;">पता:</label>
                            <textarea name="address_hi" required rows="2" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"></textarea>
                        </div>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">मोबाइल नं:</label>
                                <input type="tel" name="mobile_hi" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">LAB ID संख्या:</label>
                                <input type="text" name="lab_id_hi" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
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
                                <input type="checkbox" name="consent_given_hi" required style="width: 20px; height: 20px; margin-right: 10px;">
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
                                <input type="text" name="doctor_name_hi" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                            <div style="margin-bottom: 15px;">
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">पता:</label>
                                <input type="text" name="doctor_address_hi" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">संपर्क नंबर:</label>
                                <input type="tel" name="doctor_contact_hi" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                        </div>

                        <p style="line-height: 1.6; margin-top: 15px; font-style: italic;">परिक्षण पश्चात काउंसलिंग मेरे चिकित्सक करेंगे।</p>
                    </div>

                    <!-- Signatures -->
                    <div style="background: #e8f5e9; padding: 20px; border-radius: 5px; border-left: 4px solid #4caf50;">
                        <div style="margin-bottom: 20px;">
                            <label style="display: block; margin-bottom: 5px; font-weight: bold;">रोगी का हस्ताक्षर/अभिभावक (नाबालिग के मामले):</label>
                            <input type="text" name="patient_signature_hi" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" placeholder="हस्ताक्षर के रूप में अपना पूरा नाम टाइप करें">
                        </div>
                        <div>
                            <label style="display: block; margin-bottom: 5px; font-weight: bold;">तारीख:</label>
                            <input type="date" name="signature_date_hi" value="{{ date('Y-m-d') }}" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
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
                                <input type="text" name="name_te" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">వయస్సు:</label>
                                <input type="number" name="age_te" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                        </div>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">లింగం:</label>
                                <select name="sex_te" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                                    <option value="">ఎంచుకోండి</option>
                                    <option value="male">పురుషుడు</option>
                                    <option value="female">స్త్రీ</option>
                                    <option value="other">ఇతర</option>
                                </select>
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">తేదీ:</label>
                                <input type="date" name="date_te" value="{{ date('Y-m-d') }}" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                        </div>
                        <div style="margin-bottom: 15px;">
                            <label style="display: block; margin-bottom: 5px; font-weight: bold;">చిరునామా:</label>
                            <textarea name="address_te" required rows="2" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"></textarea>
                        </div>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">మొబైల్:</label>
                                <input type="tel" name="mobile_te" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">ల్యాబ్ ID:</label>
                                <input type="text" name="lab_id_te" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
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
                                <input type="checkbox" name="consent_given_te" required style="width: 20px; height: 20px; margin-right: 10px;">
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
                                <input type="text" name="doctor_name_te" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                            <div style="margin-bottom: 15px;">
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">చిరునామా:</label>
                                <input type="text" name="doctor_address_te" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 5px; font-weight: bold;">సంప్రదింపు నంబర్:</label>
                                <input type="tel" name="doctor_contact_te" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            </div>
                        </div>

                        <p style="line-height: 1.6; margin-top: 15px; font-style: italic;">పోస్ట్ టెస్ట్ కౌన్సెలింగ్ నా చికిత్స చేసే వైద్యుడు/డాక్టర్ ద్వారా ఇవ్వబడుతుంది.</p>
                    </div>

                    <!-- Signatures -->
                    <div style="background: #e8f5e9; padding: 20px; border-radius: 5px; border-left: 4px solid #4caf50;">
                        <div style="margin-bottom: 20px;">
                            <label style="display: block; margin-bottom: 5px; font-weight: bold;">రోగి/అటెండెంట్ సంతకం (మైనర్‌ల విషయంలో):</label>
                            <input type="text" name="patient_signature_te" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" placeholder="సంతకం కోసం మీ పూర్తి పేరును టైప్ చేయండి">
                        </div>
                        <div>
                            <label style="display: block; margin-bottom: 5px; font-weight: bold;">తేదీ:</label>
                            <input type="date" name="signature_date_te" value="{{ date('Y-m-d') }}" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div style="text-align: center; margin-top: 30px;">
                    <button type="submit" style="background: #4caf50; color: white; padding: 15px 40px; border: none; border-radius: 5px; font-size: 18px; font-weight: bold; cursor: pointer; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                        Submit Consent Form
                    </button>
                </div>
            </form>

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
        buttonText="Submit">
        <table style="width:100%; border-collapse:collapse; font-size:14px;" border="1">
            <thead>
                <tr>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">S. No.</th>
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

            <tbody>
                @for ($i = 1; $i <= 15; $i++)
                    <tr>
                    <td style="padding:6px; text-align:center;">
                        <input type="text" name="rows[{{ $i }}][sno]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="date" name="rows[{{ $i }}][date_quality]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][manufacturer]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][lot_no]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="date" name="rows[{{ $i }}][expiry_date]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][atcc]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][result_expected]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][result_obtained]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][done_by]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][corrective_action]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][remarks]" style="width:100%; border:0;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-002(A)"
        docNo="TDPL/MI/FOM-002(A)"
        docName="Stain Quality Control Form - Gram Stain"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table style="width:100%; border-collapse:collapse; font-size:14px;" border="1">
            <thead>
                <tr>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">S. No.</th>
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

            <tbody>
                @for ($i = 1; $i <= 15; $i++)
                    <tr>
                    <td style="padding:6px; text-align:center;">
                        <input type="text" name="rows[{{ $i }}][sno]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="date" name="rows[{{ $i }}][date_quality]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][manufacturer]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][lot_no]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="date" name="rows[{{ $i }}][expiry_date]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][atcc]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][result_expected]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][result_obtained]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][done_by]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][corrective_action]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][remarks]" style="width:100%; border:0;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-002(B)"
        docNo="TDPL/MI/FOM-002(B)"
        docName="Stain Quality Control Form - AFB Stain"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table style="width:100%; border-collapse:collapse; font-size:14px;" border="1">
            <thead>
                <tr>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">S. No.</th>
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

            <tbody>
                @for ($i = 1; $i <= 15; $i++)
                    <tr>
                    <td style="padding:6px; text-align:center;">
                        <input type="text" name="rows[{{ $i }}][sno]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="date" name="rows[{{ $i }}][date_quality]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][manufacturer]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][lot_no]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="date" name="rows[{{ $i }}][expiry_date]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][atcc]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][result_expected]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][result_obtained]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][done_by]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][corrective_action]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][remarks]" style="width:100%; border:0;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-002(C)"
        docNo="TDPL/MI/FOM-002(C)"
        docName="Stain Quality Control Form - KOH Stain"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table style="width:100%; border-collapse:collapse; font-size:14px;" border="1">
            <thead>
                <tr>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">S. No.</th>
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

            <tbody>
                @for ($i = 1; $i <= 15; $i++)
                    <tr>
                    <td style="padding:6px; text-align:center;">
                        <input type="text" name="rows[{{ $i }}][sno]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="date" name="rows[{{ $i }}][date_quality]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][manufacturer]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][lot_no]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="date" name="rows[{{ $i }}][expiry_date]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][atcc]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][result_expected]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][result_obtained]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][done_by]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][corrective_action]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][remarks]" style="width:100%; border:0;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-003"
        docNo="TDPL/MI/FOM-003"
        docName="Biochemical Media QC Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px;">
            <thead>
                <tr>
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

            <tbody>
                @for ($i = 1; $i <= 15; $i++)
                    <tr>
                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][product_info]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][analysis_date_by]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][appearance]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][incubation]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][atcc]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][growth_expected]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][growth_observed]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][corrective_action]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][signature]" style="width:100%; border:0;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-003(A)"
        docNo="TDPL/MI/FOM-003(A)"
        docName="Biochemical Media QC Form - Oxidase Disc"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px;">
            <thead>
                <tr>
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

            <tbody>
                @for ($i = 1; $i <= 15; $i++)
                    <tr>
                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][product_info]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][analysis_date_by]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][appearance]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][incubation]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][atcc]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][growth_expected]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][growth_observed]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][corrective_action]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][signature]" style="width:100%; border:0;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-003(B)"
        docNo="TDPL/MI/FOM-003(B)"
        docName="Biochemical Media QC Form - Optochin Disc"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px;">
            <thead>
                <tr>
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

            <tbody>
                @for ($i = 1; $i <= 15; $i++)
                    <tr>
                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][product_info]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][analysis_date_by]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][appearance]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][incubation]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][atcc]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][growth_expected]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][growth_observed]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][corrective_action]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][signature]" style="width:100%; border:0;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-003(C)"
        docNo="TDPL/MI/FOM-003(C)"
        docName="Biochemical Media QC Form - Urease Agar"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px;">
            <thead>
                <tr>
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

            <tbody>
                @for ($i = 1; $i <= 15; $i++)
                    <tr>
                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][product_info]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][analysis_date_by]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][appearance]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][incubation]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][atcc]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][growth_expected]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][growth_observed]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][corrective_action]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][signature]" style="width:100%; border:0;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-003(D)"
        docNo="TDPL/MI/FOM-003(D)"
        docName="Biochemical Media QC Form - TSI Agar"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px;">
            <thead>
                <tr>
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

            <tbody>
                @for ($i = 1; $i <= 15; $i++)
                    <tr>
                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][product_info]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][analysis_date_by]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][appearance]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][incubation]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][atcc]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][growth_expected]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][growth_observed]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][corrective_action]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][signature]" style="width:100%; border:0;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-003(E)"
        docNo="TDPL/MI/FOM-003(E)"
        docName="Biochemical Media QC Form - Citrate Agar"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px;">
            <thead>
                <tr>
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

            <tbody>
                @for ($i = 1; $i <= 15; $i++)
                    <tr>
                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][product_info]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][analysis_date_by]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][appearance]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][incubation]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][atcc]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][growth_expected]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][growth_observed]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][corrective_action]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][signature]" style="width:100%; border:0;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-003(F)"
        docNo="TDPL/MI/FOM-003(F)"
        docName="Biochemical Media QC Form - BEA Agar"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px;">
            <thead>
                <tr>
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

            <tbody>
                @for ($i = 1; $i <= 15; $i++)
                    <tr>
                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][product_info]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][analysis_date_by]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][appearance]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][incubation]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][atcc]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][growth_expected]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][growth_observed]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][corrective_action]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][signature]" style="width:100%; border:0;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-003(G)"
        docNo="TDPL/MI/FOM-003(G)"
        docName="Biochemical Media QC Form - Indole Test"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table border="1" style="width:100%; border-collapse:collapse; font-size:14px;">
            <thead>
                <tr>
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

            <tbody>
                @for ($i = 1; $i <= 15; $i++)
                    <tr>
                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][product_info]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][analysis_date_by]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][appearance]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][incubation]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][atcc]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][growth_expected]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][growth_observed]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][corrective_action]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][signature]" style="width:100%; border:0;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/MI/FOM-004"
        docNo="TDPL/MI/FOM-004"
        docName="ATCC Strain Quality Control Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
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

            <tbody>
                @for ($i = 1; $i <= 20; $i++)
                    <tr>
                    <td style="padding:4px;">
                        <input type="date" name="rows[{{ $i }}][qc_date]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][atcc_info]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][characteristics]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][antibiotic_name]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="number" name="rows[{{ $i }}][expected_zone]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="number" name="rows[{{ $i }}][obtained_zone]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][done_by]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][capa]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][approved_by]" style="width:100%; border:0;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-004(A)"
        docNo="TDPL/MI/FOM-004(A)"
        docName="ATCC Strain Quality Control Form - E.Coli"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
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

            <tbody>
                @for ($i = 1; $i <= 20; $i++)
                    <tr>
                    <td style="padding:4px;">
                        <input type="date" name="rows[{{ $i }}][qc_date]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][atcc_info]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][characteristics]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][antibiotic_name]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="number" name="rows[{{ $i }}][expected_zone]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="number" name="rows[{{ $i }}][obtained_zone]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][done_by]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][capa]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][approved_by]" style="width:100%; border:0;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-004(B)"
        docNo="TDPL/MI/FOM-004(B)"
        docName="ATCC Strain Quality Control Form - Pseudomonas aeruginosa"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
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

            <tbody>
                @for ($i = 1; $i <= 20; $i++)
                    <tr>
                    <td style="padding:4px;">
                        <input type="date" name="rows[{{ $i }}][qc_date]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][atcc_info]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][characteristics]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][antibiotic_name]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="number" name="rows[{{ $i }}][expected_zone]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="number" name="rows[{{ $i }}][obtained_zone]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][done_by]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][capa]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][approved_by]" style="width:100%; border:0;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-004(C)"
        docNo="TDPL/MI/FOM-004(C)"
        docName="ATCC Strain Quality Control Form - Klebsiella pneumoniae"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
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

            <tbody>
                @for ($i = 1; $i <= 20; $i++)
                    <tr>
                    <td style="padding:4px;">
                        <input type="date" name="rows[{{ $i }}][qc_date]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][atcc_info]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][characteristics]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][antibiotic_name]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="number" name="rows[{{ $i }}][expected_zone]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="number" name="rows[{{ $i }}][obtained_zone]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][done_by]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][capa]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][approved_by]" style="width:100%; border:0;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-004(D)"
        docNo="TDPL/MI/FOM-004(D)"
        docName="ATCC Strain Quality Control Form - Enterococcus faecalis"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
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

            <tbody>
                @for ($i = 1; $i <= 20; $i++)
                    <tr>
                    <td style="padding:4px;">
                        <input type="date" name="rows[{{ $i }}][qc_date]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][atcc_info]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][characteristics]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][antibiotic_name]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="number" name="rows[{{ $i }}][expected_zone]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="number" name="rows[{{ $i }}][obtained_zone]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][done_by]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][capa]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][approved_by]" style="width:100%; border:0;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-004(E)"
        docNo="TDPL/MI/FOM-004(E)"
        docName="ATCC Strain Quality Control Form - Staphylococcus aureus"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
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

            <tbody>
                @for ($i = 1; $i <= 20; $i++)
                    <tr>
                    <td style="padding:4px;">
                        <input type="date" name="rows[{{ $i }}][qc_date]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][atcc_info]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][characteristics]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][antibiotic_name]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="number" name="rows[{{ $i }}][expected_zone]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="number" name="rows[{{ $i }}][obtained_zone]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][done_by]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][capa]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][approved_by]" style="width:100%; border:0;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-004(F)"
        docNo="TDPL/MI/FOM-004(F)"
        docName="ATCC Strain Quality Control Form - Staphylococcus haemolyticus"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
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

            <tbody>
                @for ($i = 1; $i <= 20; $i++)
                    <tr>
                    <td style="padding:4px;">
                        <input type="date" name="rows[{{ $i }}][qc_date]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][atcc_info]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][characteristics]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][antibiotic_name]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="number" name="rows[{{ $i }}][expected_zone]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="number" name="rows[{{ $i }}][obtained_zone]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][done_by]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][capa]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][approved_by]" style="width:100%; border:0;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/FOM-004(G)"
        docNo="TDPL/MI/FOM-004(G)"
        docName="ATCC Strain Quality Control Form - Candida albicans"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
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

            <tbody>
                @for ($i = 1; $i <= 20; $i++)
                    <tr>
                    <td style="padding:4px;">
                        <input type="date" name="rows[{{ $i }}][qc_date]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][atcc_info]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][characteristics]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][antibiotic_name]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="number" name="rows[{{ $i }}][expected_zone]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="number" name="rows[{{ $i }}][obtained_zone]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][done_by]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][capa]" style="width:100%; border:0;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][approved_by]" style="width:100%; border:0;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/MI/FOM-005"
        docNo="TDPL/MI/FOM-005"
        docName="Media Quality Control Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table style="width:100%; border-collapse: collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Product Name/ Code/ Manufacturer/ Lot No./ Date of Expiry</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Date of Analysis; Done by</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Appearance of Media / pH of Media / Appearance on plate / Volume</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Incubation Period / Temperature</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>ATCC Strain Used / Code / Lot No. / Date of Expiry</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Growth Expected</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Growth Observed</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>CAPA</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Microbiologist Signature</strong>
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach(range(1, 20) as $i)
                <tr>
                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][product]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][analysis_date]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][appearance]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][incubation]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][atcc]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][growth_expected]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][growth_observed]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][capa]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px; text-align:center;">
                        <input type="text" name="rows[{{ $i }}][signature]" style="width:100%; border:0; outline:none;">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/MI/FOM-005(A)"
        docNo="TDPL/MI/FOM-005(A)"
        docName="Media Quality Control Form - Sheep Blood Agar"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table style="width:100%; border-collapse: collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Product Name/ Code/ Manufacturer/ Lot No./ Date of Expiry</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Date of Analysis; Done by</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Appearance of Media / pH of Media / Appearance on plate / Volume</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Incubation Period / Temperature</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>ATCC Strain Used / Code / Lot No. / Date of Expiry</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Growth Expected</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Growth Observed</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>CAPA</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Microbiologist Signature</strong>
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach(range(1, 20) as $i)
                <tr>
                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][product]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][analysis_date]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][appearance]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][incubation]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][atcc]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][growth_expected]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][growth_observed]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][capa]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px; text-align:center;">
                        <input type="text" name="rows[{{ $i }}][signature]" style="width:100%; border:0; outline:none;">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/MI/FOM-005(B)"
        docNo="TDPL/MI/FOM-005(B)"
        docName="Media Quality Control Form - MacConkey Agar"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table style="width:100%; border-collapse: collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Product Name/ Code/ Manufacturer/ Lot No./ Date of Expiry</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Date of Analysis; Done by</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Appearance of Media / pH of Media / Appearance on plate / Volume</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Incubation Period / Temperature</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>ATCC Strain Used / Code / Lot No. / Date of Expiry</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Growth Expected</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Growth Observed</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>CAPA</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Microbiologist Signature</strong>
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach(range(1, 20) as $i)
                <tr>
                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][product]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][analysis_date]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][appearance]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][incubation]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][atcc]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][growth_expected]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][growth_observed]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][capa]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px; text-align:center;">
                        <input type="text" name="rows[{{ $i }}][signature]" style="width:100%; border:0; outline:none;">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/MI/FOM-005(C)"
        docNo="TDPL/MI/FOM-005(C)"
        docName="Media Quality Control Form - Mueller Hinton Agar"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table style="width:100%; border-collapse: collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Product Name/ Code/ Manufacturer/ Lot No./ Date of Expiry</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Date of Analysis; Done by</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Appearance of Media / pH of Media / Appearance on plate / Volume</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Incubation Period / Temperature</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>ATCC Strain Used / Code / Lot No. / Date of Expiry</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Growth Expected</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Growth Observed</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>CAPA</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Microbiologist Signature</strong>
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach(range(1, 20) as $i)
                <tr>
                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][product]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][analysis_date]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][appearance]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][incubation]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][atcc]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][growth_expected]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][growth_observed]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][capa]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px; text-align:center;">
                        <input type="text" name="rows[{{ $i }}][signature]" style="width:100%; border:0; outline:none;">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/MI/FOM-005(D)"
        docNo="TDPL/MI/FOM-005(D)"
        docName="Media Quality Control Form - Chocolate Agar"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table style="width:100%; border-collapse: collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Product Name/ Code/ Manufacturer/ Lot No./ Date of Expiry</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Date of Analysis; Done by</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Appearance of Media / pH of Media / Appearance on plate / Volume</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Incubation Period / Temperature</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>ATCC Strain Used / Code / Lot No. / Date of Expiry</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Growth Expected</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Growth Observed</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>CAPA</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Microbiologist Signature</strong>
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach(range(1, 20) as $i)
                <tr>
                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][product]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][analysis_date]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][appearance]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][incubation]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][atcc]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][growth_expected]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][growth_observed]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][capa]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px; text-align:center;">
                        <input type="text" name="rows[{{ $i }}][signature]" style="width:100%; border:0; outline:none;">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/MI/FOM-005(E)"
        docNo="TDPL/MI/FOM-005(E)"
        docName="Media Quality Control Form - SDA Agar"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table style="width:100%; border-collapse: collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Product Name/ Code/ Manufacturer/ Lot No./ Date of Expiry</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Date of Analysis; Done by</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Appearance of Media / pH of Media / Appearance on plate / Volume</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Incubation Period / Temperature</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>ATCC Strain Used / Code / Lot No. / Date of Expiry</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Growth Expected</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Growth Observed</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>CAPA</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Microbiologist Signature</strong>
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach(range(1, 20) as $i)
                <tr>
                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][product]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][analysis_date]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][appearance]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][incubation]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][atcc]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][growth_expected]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][growth_observed]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="rows[{{ $i }}][capa]" style="width:100%; border:0; outline:none;">
                    </td>

                    <td style="padding:6px; text-align:center;">
                        <input type="text" name="rows[{{ $i }}][signature]" style="width:100%; border:0; outline:none;">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/REG-001"
        docNo="TDPL/MI/REG-001"
        docName="Microbiology Work Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <p style="margin-top:20px;">
            <strong>Date:</strong>
            <input type="date" name="form_date" style="border:1px solid #000; padding:4px;">
        </p>

        <table style="width:100%; border-collapse: collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>S. No.</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Barcode</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Patient Name</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Age/Gender</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Investigation</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Sample Type</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Sample Received Date/Time</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Sample Received By</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Sample Processing Date/Time</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Sample Processed By</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Observations</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>HoD Signature</strong></th>
                </tr>
            </thead>

            <tbody>
                @for($i = 1; $i <= 10; $i++)
                    <tr>
                    <td style="padding:4px; text-align:center;">
                        <input type="text" name="rows[{{ $i }}][sno]" value="{{ $i }}"
                            style="width:40px; border:none; text-align:center;" readonly>
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][barcode]" style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][patient_name]" style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][age_gender]" style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][investigation]" style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][sample_type]" style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px;">
                        <input type="datetime-local" name="rows[{{ $i }}][sample_received_dt]" style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][sample_received_by]" style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px;">
                        <input type="datetime-local" name="rows[{{ $i }}][sample_processing_dt]" style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][sample_processed_by]" style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][observations]" style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px; text-align:center;">
                        <input type="text" name="rows[{{ $i }}][hod_signature]" style="width:100%; border:none;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/REG-002"
        docNo="TDPL/MI/REG-002"
        docName="Media Preparation Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table style="width:100%; border-collapse: collapse;" border="1">
            <thead>
                <tr>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Name of the Media Prepared</strong>
                    </th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Media Prepared / Lot No. &amp; Manufacturer</strong>
                    </th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Volume of Media Prepared</strong>
                    </th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Wt. of Media (gm) &amp; Prepared By (name)</strong>
                    </th>

                    <th colspan="6" style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Autoclave Process Details</strong>
                    </th>

                    <th colspan="2" style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Quality Control</strong>
                    </th>

                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>HOD Sign</strong>
                    </th>
                </tr>

                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Autoclave Start Time</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Autoclave End Time</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Sterile Holding Time</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Total Duration</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Temp (121°C)</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Pressure (151 lbs)</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Chemical Indicators</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Biological Indicators</strong></th>
                </tr>
            </thead>

            <tbody>

                @for($i = 1; $i <= 5; $i++)
                    <tr>
                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][media_name]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][lot_details]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][volume_prepared]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][weight_prepared]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px;">
                        <input type="datetime-local" name="rows[{{ $i }}][autoclave_start]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px;">
                        <input type="datetime-local" name="rows[{{ $i }}][autoclave_end]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][sterile_holding]"
                            placeholder="e.g., 20 min"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][total_duration]"
                            placeholder="e.g., 45 min"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px;">
                        <input type="number" name="rows[{{ $i }}][temperature]"
                            placeholder="121"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px;">
                        <input type="number" name="rows[{{ $i }}][pressure]"
                            placeholder="15 lbs"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][chemical_indicators]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][biological_indicators]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text" name="rows[{{ $i }}][hod_sign]"
                            style="width:100%; border:none;">
                    </td>
                    </tr>
                    @endfor

            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/MI/REG-003"
        docNo="TDPL/MI/REG-003"
        docName="Media Sterility Check Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;"><strong>S. No.</strong></th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;"><strong>Date of Preparation</strong></th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;"><strong>Batch No.</strong></th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;"><strong>Details of Media Preparation</strong></th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Expected growth</strong><br>
                        <strong>2–48 Hours</strong>
                    </th>

                    <th colspan="2" style="border:1px solid #000; padding:6px; text-align:center;"><strong>Result Obtained</strong></th>

                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Sterility Checked</strong><br>
                        <strong>Pass/Fail</strong>
                    </th>

                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;"><strong>Done by</strong></th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;"><strong>Checked by</strong></th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px; text-align:center;"><strong>HoD Signature & Remarks</strong></th>
                </tr>

                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Sterility after</strong><br>
                        <strong>24 Hours</strong>
                    </th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Sterility after</strong><br>
                        <strong>48 Hours</strong>
                    </th>
                </tr>
            </thead>

            <tbody>

                @for($i = 1; $i <= 5; $i++)
                    <tr>
                    <td style="padding:4px; text-align:center;">
                        {{ $i }}
                    </td>

                    <td style="padding:4px;">
                        <input type="date"
                            name="rows[{{ $i }}][date_of_preparation]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text"
                            name="rows[{{ $i }}][batch_no]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text"
                            name="rows[{{ $i }}][media_details]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text"
                            name="rows[{{ $i }}][expected_growth]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text"
                            name="rows[{{ $i }}][sterility_24]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text"
                            name="rows[{{ $i }}][sterility_48]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px;">
                        <select name="rows[{{ $i }}][sterility_checked]"
                            style="width:100%; border:none;">
                            <option value="">Select</option>
                            <option value="Pass">Pass</option>
                            <option value="Fail">Fail</option>
                        </select>
                    </td>

                    <td style="padding:4px;">
                        <input type="text"
                            name="rows[{{ $i }}][done_by]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text"
                            name="rows[{{ $i }}][checked_by]"
                            style="width:100%; border:none;">
                    </td>

                    <td style="padding:4px;">
                        <input type="text"
                            name="rows[{{ $i }}][hod_remarks]"
                            style="width:100%; border:none;">
                    </td>
                    </tr>
                    @endfor

            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/REG-004"
        docNo="TDPL/MI/REG-004"
        docName="Vitek 2 Saline Quality Control Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table style="width:100%; border-collapse: collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Date of Q.C.</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Vitek Saline Turbidity after 4 hrs</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Growth on Blood Agar after 48 hrs</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>QC Passed / Failed</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Done By</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>HOD Sign</strong></th>
                </tr>
            </thead>

            <tbody>
                @for($i = 1; $i <= 10; $i++)
                    <tr>
                    <td style="padding:6px;">
                        <input type="date" name="qc_date[]"
                            style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="vitek_saline[]"
                            placeholder="Enter turbidity"
                            style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="blood_agar_growth[]"
                            placeholder="Enter growth details"
                            style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>

                    <td style="padding:6px;">
                        <select name="qc_status[]" style="width:100%; border:1px solid #ccc; padding:4px;">
                            <option value="">Select</option>
                            <option value="Passed">Passed</option>
                            <option value="Failed">Failed</option>
                        </select>
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="done_by[]"
                            placeholder="Technician name"
                            style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="hod_sign[]"
                            placeholder="Signature"
                            style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/REG-005"
        docNo="TDPL/MI/REG-005"
        docName="Loop Maintenance Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table style="width:100%; border-collapse: collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>S. No.</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Date of Receiving</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Lot Number / Expiry Date</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Date of Calibration</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Calibration Passed / Failed</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Verified By</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>HOD Signature</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Remarks</strong></th>
                </tr>
            </thead>

            <tbody>
                @for($i = 1; $i <= 6; $i++)
                    <tr>
                    <td style="padding:6px; text-align:center;">
                        {{ $i }}
                    </td>

                    <td style="padding:6px;">
                        <input type="date" name="date_receiving[]"
                            style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="lot_number[]"
                            placeholder="Lot No / Expiry Date"
                            style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>

                    <td style="padding:6px;">
                        <input type="date" name="date_calibration[]"
                            style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>

                    <td style="padding:6px;">
                        <select name="calibration_status[]" style="width:100%; border:1px solid #ccc; padding:4px;">
                            <option value="">Select</option>
                            <option value="Passed">Passed</option>
                            <option value="Failed">Failed</option>
                        </select>
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="verified_by[]"
                            placeholder="Verified By"
                            style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="hod_sign[]"
                            placeholder="Signature"
                            style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="remarks[]"
                            placeholder="Remarks"
                            style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MI/REG-006"
        docNo="TDPL/MI/REG-006"
        docName="Bact Alert QC Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <table style="width:100%; border-collapse: collapse;" border="1">

            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>S. No.</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Date</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Lot No.<br> & Expiry</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>ATCC No.</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Inoculum / Density</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Growth Observation<br>Date/Time (Hours)</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Gram Stain Observation</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Acceptable</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Not Acceptable</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Done by</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Checked by</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>HoD Signature</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Remarks</strong></th>
                </tr>
            </thead>

            <tbody>

                @for($i = 1; $i <= 2; $i++)
           

                    @foreach(['E. Coli', 'S. Aureus', 'Streptococcus Pneumoniae'] as $index => $org)
                    <tr>
                        @if($index === 0)
                        <!-- Rowspan cells appear only in first organism row -->
                        <td rowspan="3" style="padding:6px; text-align:center;">
                            {{ $i }}
                        </td>

                        <td rowspan="3" style="padding:6px;">
                            <input type="date" name="date[{{ $i }}]"
                                style="width:100%; padding:4px; border:1px solid #ccc;">
                        </td>

                        <td rowspan="3" style="padding:6px;">
                            <input type="text" name="lot_expiry[{{ $i }}]"
                                placeholder="Lot No / Expiry"
                                style="width:100%; padding:4px; border:1px solid #ccc;">
                        </td>
                        @endif

                        <!-- Organism Name -->
                        <td style="padding:6px;">
                            <input type="text" value="{{ $org }}" readonly
                                style="width:200px; padding:4px; border:1px solid #ccc; background:#f7f7f7;">
                        </td>

                        <!-- Inoculum / Density -->
                        <td style="padding:6px;">
                            <input type="text" name="density_{{ $i }}[]"
                                style="width:100%; padding:4px; border:1px solid #ccc;">
                        </td>

                        <!-- Growth Observation -->
                        <td style="padding:6px;">
                            <input type="text" name="growth_obs_{{ $i }}[]"
                                style="width:100%; padding:4px; border:1px solid #ccc;">
                        </td>

                        <!-- Gram Stain -->
                        <td style="padding:6px;">
                            <input type="text" name="gram_obs_{{ $i }}[]"
                                style="width:100%; padding:4px; border:1px solid #ccc;">
                        </td>

                        <!-- Acceptable -->
                        <td style="padding:6px; text-align:center;">
                            <input type="checkbox" name="acceptable_{{ $i }}[]" value="yes">
                        </td>

                        <!-- Not Acceptable -->
                        <td style="padding:6px; text-align:center;">
                            <input type="checkbox" name="not_acceptable_{{ $i }}[]" value="no">
                        </td>

                        @if($index === 0)
                        <!-- Rowspan cells for Done by / Checked by / HOD / Remarks -->
                        <td rowspan="3" style="padding:6px;">
                            <input type="text" name="done_by[{{ $i }}]"
                                style="width:100%; padding:4px; border:1px solid #ccc;">
                        </td>

                        <td rowspan="3" style="padding:6px;">
                            <input type="text" name="checked_by[{{ $i }}]"
                                style="width:100%; padding:4px; border:1px solid #ccc;">
                        </td>

                        <td rowspan="3" style="padding:6px;">
                            <input type="text" name="hod_sign[{{ $i }}]"
                                style="width:100%; padding:4px; border:1px solid #ccc;">
                        </td>

                        <td rowspan="3" style="padding:6px;">
                            <input type="text" name="remarks[{{ $i }}]"
                                style="width:100%; padding:4px; border:1px solid #ccc;">
                        </td>
                        @endif
                    </tr>
                    @endforeach

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