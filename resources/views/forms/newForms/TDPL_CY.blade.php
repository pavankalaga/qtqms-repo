@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CY/CS</title>
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
                <div style="font-size: 20px; ">CY/CS </div>

            </div>
            <div class="icon-view">
                <div class="pc-content">
                    <div class="pc-folder" onclick="showSection('TDPL/CS/FOM-001')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">CustomerPatient Feedback Form</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('TDPL/CY/FOM-001')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Cytopathology Requisition Form</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('TDPL/CY/FOM-002')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Consent Form for FNAC</span>
                    </div>



                </div>
            </div>
        </div>


        <x-formTemplete id="TDPL/CS/FOM-001" docNo="TDPL/CS/FOM-001" docName="CustomerPatient Feedback Form" issueNo="2.0"
            issueDate="01/10/2024" buttonText="Submit" action="{{ route('newforms.cy.forms.submit') }}">

            <form>

                <p>Dear Sir/Madam,</p>

                <p>
                    We request your valuable time for providing feedback/suggestions and/or complaints,
                    if any, regarding the services provided by TRUSTlab Diagnostics.
                </p>

                <p>
                    Name:
                    <input type="text" name="name" id="TDPL_CS_FOM_001__name" style="width:200px;">
                    &nbsp;&nbsp;&nbsp;
                    Client Code/Barcode No.:
                    <input type="text" name="barcode" id="TDPL_CS_FOM_001__barcode" style="width:200px;">
                    &nbsp;&nbsp;&nbsp;
                    Date:
                    <input type="date" name="date" id="TDPL_CS_FOM_001__date">
                </p>

                <p>
                    Address:
                    <input type="text" name="address" id="TDPL_CS_FOM_001__address" style="width:400px;">
                </p>

                <p>
                    Contact No.:
                    <input type="text" name="contact_no" id="TDPL_CS_FOM_001__contact_no" style="width:200px;">
                </p>

                <p>Please provide a rating score in the respective column as per the applicable service description.</p>
                <p><strong>Rating Score Guidelines: Poor = 0–2, Average = 3–4, Good = 5</strong></p>

                <table border="1" cellspacing="0" cellpadding="4" style="width:100%; border-collapse: collapse;">
                    <tr>
                        <th rowspan="2">Description</th>
                        <th colspan="3">Service Rating</th>
                        <th rowspan="2">Remarks</th>
                    </tr>
                    <tr>
                        <th>Poor</th>
                        <th>Average</th>
                        <th>Good</th>
                    </tr>

                    @foreach (['Was your query regarding any test answered promptly?', 'Were you satisfied with the adequacy of the information provided?', 'How do you rate the quality of the report provided by our lab?', 'Was the query pertaining to your patient’s report answered satisfactorily?', 'Was the report available on the committed date and time?', 'How do you rate our laboratory services in comparison to other labs?', 'Are the academic comments/test interpretation in our reports appropriate?', 'Are the biological reference intervals comparable to medical decision points?', 'Does our representative continually inform you of the new developments within our laboratory?'] as $i => $question)
                        <tr>
                            <td>{{ $question }}</td>

                            <td>
                                <input type="radio" name="rating_{{ $i }}"
                                    id="TDPL_CS_FOM_001__rating_{{ $i }}_poor" value="poor">
                            </td>

                            <td>
                                <input type="radio" name="rating_{{ $i }}"
                                    id="TDPL_CS_FOM_001__rating_{{ $i }}_average" value="average">
                            </td>

                            <td>
                                <input type="radio" name="rating_{{ $i }}"
                                    id="TDPL_CS_FOM_001__rating_{{ $i }}_good" value="good">
                            </td>

                            <td>
                                <input type="text" name="remarks_{{ $i }}"
                                    id="TDPL_CS_FOM_001__remarks_{{ $i }}" style="width:100%;">
                            </td>
                        </tr>
                    @endforeach
                </table>

                <br>

                <p>If you have any other compliments, complaints or suggestions for improvement:</p>

                <textarea name="additional_feedback" id="TDPL_CS_FOM_001__additional_feedback" rows="4" style="width:100%;"></textarea>

                <p>
                    Signature:
                    <input type="text" name="signature" id="TDPL_CS_FOM_001__signature" style="width:200px;">
                </p>

                <h2>FOR OFFICE USE ONLY</h2>
                <p>(Do not write here)</p>

                <p>
                    Whether communicated to the Customer:
                    <select name="communicated" id="TDPL_CS_FOM_001__communicated">
                        <option value="YES">YES</option>
                        <option value="NO">NO</option>
                    </select>
                </p>

                <ul>
                    <li>
                        Identification of the complainant:
                        <input type="text" name="complainant_id" id="TDPL_CS_FOM_001__complainant_id">
                    </li>
                    <li>
                        Date of complaint:
                        <input type="date" name="complaint_date" id="TDPL_CS_FOM_001__complaint_date">
                    </li>
                    <li>
                        Brief description:
                        <textarea name="complaint_description" id="TDPL_CS_FOM_001__complaint_description" style="width:100%;"></textarea>
                    </li>
                </ul>

                <ul>
                    <li>
                        Analysis / resolution / action taken:
                        <textarea name="complaint_action" id="TDPL_CS_FOM_001__complaint_action" style="width:100%;"></textarea>
                    </li>
                </ul>

                <ul>
                    <li>
                        Date of closure:
                        <input type="date" name="closure_date" id="TDPL_CS_FOM_001__closure_date">
                    </li>
                </ul>

                <p>
                    BY:
                    <input type="text" name="by" id="TDPL_CS_FOM_001__by" style="width:200px;">
                    &nbsp;&nbsp;&nbsp;
                    ON:
                    <input type="date" name="on" id="TDPL_CS_FOM_001__on">
                </p>

                <p>Preventive action planned:</p>
                <textarea name="preventive_action" id="TDPL_CS_FOM_001__preventive_action" rows="3" style="width:100%;"></textarea>

                <p>
                    Reviewed By:
                    <input type="text" name="reviewed_by" id="TDPL_CS_FOM_001__reviewed_by" style="width:250px;">
                    &nbsp;&nbsp;&nbsp;
                    Approved By:
                    <input type="text" name="approved_by" id="TDPL_CS_FOM_001__approved_by" style="width:250px;">
                </p>

            </form>
        </x-formTemplete>



        <x-formTemplete id="TDPL/CY/FOM-001" docNo="TDPL/CY/FOM-001" docName="Cytopathology Requisition Form"
            issueNo="2.0" issueDate="01/10/2024" buttonText="Submit" action="{{ route('newforms.cy.forms.submit') }}">
            <form action="#" method="POST"
                style="background:#ffffff;border:1px solid #000;border-radius: 10px;padding:20px;width:100%;margin:auto;font-family:Arial, sans-serif;font-size:14px;">
                @csrf

                <h2 style="text-align:center; font-weight:bold; margin-bottom:20px;">CYTOPATHOLOGY REQUISITION FORM</h2>

                <!-- Row 1 -->
                <div style="margin-bottom:12px;">
                    <label><strong>LAB NO:</strong></label>
                    <input type="text" name="lab_no" id="CY_FOM_001__lab_no"
                        style="border:1px solid #000; padding:4px; width:120px;">

                    <label style="margin-left:40px;"><strong>DATE:</strong></label>
                    <input type="date" name="date" id="CY_FOM_001__date"
                        style="border:1px solid #000; padding:4px;">
                </div>

                <!-- Row 2 -->
                <div style="margin-bottom:12px;">
                    <label><strong>NAME:</strong></label>
                    <input type="text" name="name" id="CY_FOM_001__name"
                        style="border:1px solid #000; padding:4px; width:200px;">

                    <label style="margin-left:40px;"><strong>DATE OF BIRTH:</strong></label>
                    <input type="date" name="dob" id="CY_FOM_001__dob"
                        style="border:1px solid #000; padding:4px;">

                    <label style="margin-left:40px;"><strong>SEX:</strong></label>
                    <label>
                        <input type="radio" name="sex" id="CY_FOM_001__sex_male" value="Male"> Male
                    </label>
                    <label>
                        <input type="radio" name="sex" id="CY_FOM_001__sex_female" value="Female"> Female
                    </label>
                </div>

                <!-- Row 3 -->
                <div style="margin-bottom:12px;">
                    <label><strong>MOBILE NO.:</strong></label>
                    <input type="text" name="mobile" id="CY_FOM_001__mobile"
                        style="border:1px solid #000; padding:4px; width:140px;">

                    <label style="margin-left:40px;"><strong>CLIENT NAME:</strong></label>
                    <input type="text" name="client_name" id="CY_FOM_001__client_name"
                        style="border:1px solid #000; padding:4px; width:220px;">

                    <label style="margin-left:40px;"><strong>CLIENT CODE:</strong></label>
                    <input type="text" name="client_code" id="CY_FOM_001__client_code"
                        style="border:1px solid #000; padding:4px; width:100px;">
                </div>

                <!-- Doctor -->
                <div style="margin-bottom:12px;">
                    <label><strong>REFERRING DOCTOR:</strong></label>
                    <input type="text" name="ref_doctor" id="CY_FOM_001__ref_doctor"
                        style="border:1px solid #000; padding:4px; width:400px;">
                </div>

                <!-- Section Titles -->
                <div style="margin:20px 0 10px;">
                    <strong>GYNAE CYTOLOGY:</strong>
                    <strong style="margin-left:150px;">NON-GYNAE CYTOLOGY:</strong>
                </div>

                <!-- Checkboxes -->
                <div style="margin-bottom:12px; line-height:26px;">
                    @foreach (['Conventional Pap Smear', 'Thin Prep', 'L.B.C'] as $i => $item)
                        <label style="margin-right:25px;">
                            <input type="checkbox" name="gynae[]" id="CY_FOM_001__gynae_{{ $i }}"
                                value="{{ $item }}"> {{ $item }}
                        </label>
                    @endforeach
                    <br>
                    @foreach (['Ascitic / Peritoneal Fluid', 'Pleural Fluid', 'CSF', 'Urine', 'Pericardial'] as $i => $item)
                        <label style="margin-right:25px;">
                            <input type="checkbox" name="non_gynae[]" id="CY_FOM_001__non_gynae_{{ $i }}"
                                value="{{ $item }}"> {{ $item }}
                        </label>
                    @endforeach

                    <label style="margin-right:25px;">
                        <input type="checkbox" name="non_gynae[]" id="CY_FOM_001__non_gynae_other" value="Others">
                        Others ________
                    </label>
                </div>

                <!-- Clinical Features -->
                <div style="margin:20px 0 5px;">
                    <strong>CLINICAL FEATURES:</strong>
                    <div style="margin-top:8px; line-height:26px;">
                        @foreach (['Normal', 'Post Menopausal', 'Suspicious Lesions'] as $i => $item)
                            <label style="margin-right:40px;">
                                <input type="checkbox" name="clinical_features[]"
                                    id="CY_FOM_001__clinical_features_{{ $i }}" value="{{ $item }}">
                                {{ $item }}
                            </label>
                        @endforeach

                        <label>
                            <input type="checkbox" name="clinical_features[]" id="CY_FOM_001__clinical_features_other"
                                value="Others"> Others ________
                        </label>
                    </div>
                </div>

                <!-- Site of Sample -->
                <div style="margin:20px 0 5px;">
                    <strong>SITE OF SAMPLE:</strong>

                    <div style="margin-top:8px; line-height:26px;">
                        @foreach (['Cervix', 'Endocervix', 'Post Fornix', 'Lat. Vaginal Wall', 'Vault'] as $i => $item)
                            <label style="margin-right:40px;">
                                <input type="checkbox" name="sample_site[]"
                                    id="CY_FOM_001__sample_site_{{ $i }}" value="{{ $item }}">
                                {{ $item }}
                            </label>
                        @endforeach

                        <label>
                            <input type="checkbox" name="sample_site[]" id="CY_FOM_001__sample_site_other"
                                value="Others"> Others ________
                        </label>
                    </div>

                    <div style="margin-top:10px; line-height:26px;">
                        <label style="margin-right:40px;">
                            <input type="checkbox" name="sample_site[]" id="CY_FOM_001__sample_site_bronchial"
                                value="Bronchial Brush"> Bronchial Brush
                        </label>
                        <label style="margin-right:40px;">
                            <input type="checkbox" name="sample_site[]" id="CY_FOM_001__sample_site_bal"
                                value="BAL Fluid"> BAL Fluid
                        </label>
                        <label style="margin-right:40px;">
                            <input type="checkbox" name="sample_site[]" id="CY_FOM_001__sample_site_sputum"
                                value="Sputum"> Sputum
                        </label>
                    </div>
                </div>

                <!-- History -->
                <div style="margin:20px 0 5px;">
                    <strong>HISTORY:</strong>

                    <div style="margin-top:8px; line-height:26px;">
                        <label>
                            <input type="checkbox" name="history[]" id="CY_FOM_001__history_post"
                                value="Post Menopausal"> Post Menopausal
                        </label>
                        <label style="margin-left:20px;">
                            <input type="checkbox" name="history[]" id="CY_FOM_001__history_hrt" value="HRT"> Hormone
                            Replacement (HRT)
                        </label>
                        <label style="margin-left:20px;">
                            <input type="checkbox" name="history[]" id="CY_FOM_001__history_other" value="Others">
                            Others
                        </label>
                    </div>
                </div>

                <!-- Nipple Discharge -->
                <div style="margin:20px 0 5px;">
                    <strong>NIPPLE DISCHARGE:</strong>
                    <label style="margin-left:20px;">
                        <input type="checkbox" name="nipple[]" id="CY_FOM_001__nipple_right" value="Right"> Right
                    </label>
                    <label style="margin-left:20px;">
                        <input type="checkbox" name="nipple[]" id="CY_FOM_001__nipple_left" value="Left"> Left
                    </label>
                    <label style="margin-left:20px;">
                        <input type="checkbox" name="nipple[]" id="CY_FOM_001__nipple_both" value="Both"> Both
                    </label>
                </div>

                <!-- LMP FNAC -->
                <div style="margin:20px 0 5px;">
                    <strong>LMP:</strong>
                    <input type="date" name="lmp" id="CY_FOM_001__lmp"
                        style="border:1px solid #000; padding:4px; margin-left:10px;">

                    <strong style="margin-left:60px;">FNAC:</strong>
                    <input type="text" name="fnac" id="CY_FOM_001__fnac"
                        style="border:1px solid #000; padding:4px; width:250px;">
                </div>

                <!-- Misc -->
                <div style="margin:20px 0 5px;">
                    <strong>MISCELLANEOUS:</strong>
                    <p style="font-size:12px; margin:5px 0;">Site & Provisional Diagnosis</p>
                    <textarea name="misc" id="CY_FOM_001__misc" style="border:1px solid #000; padding:6px; width:100%; height:80px;"></textarea>
                </div>

                <!-- Relevant -->
                <div style="margin:20px 0 10px;">
                    <strong>RELEVANT DETAILS:</strong>
                    <textarea name="details" id="CY_FOM_001__details"
                        style="border:1px solid #000; padding:6px; width:100%; height:120px;"></textarea>
                </div>

                <!-- Instructions -->
                <h3 style="margin-top:30px; font-weight:bold;">INSTRUCTIONS FOR FILLING UP FORM:</h3>

                <ol style="margin-left:20px; line-height:22px; margin-top:10px;">
                    <li>Please tick appropriate boxes only</li>
                    <li>Please furnish complete clinical details along with Request form.</li>
                    <li>Samples details not covered above should be entered in miscellaneous box.</li>
                    <li>Do not omit telephone number of Patient / Referring Doctor.</li>
                </ol>

            </form>
        </x-formTemplete>


        <x-formTemplete id="TDPL/CY/FOM-002" docNo="TDPL/CY/FOM-002" docName="Consent Form for FNAC" issueNo="2.0"
            issueDate="01/10/2024" buttonText="Submit" action="{{ route('newforms.cy.forms.submit') }}">
            <style>
                .containerCY {

                    margin: 0 auto;
                    background: #ffffff;
                    border: 1px solid #333;
                    border-radius: 12px;
                    padding: 25px;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                }

                .language-toggle {
                    margin-bottom: 20px;
                    display: flex;
                    justify-content: flex-end
                }

                .lang-btn {
                    padding: 10px 22px;
                    border: 2px solid #ccc;
                    cursor: pointer;
                    background: white;
                    color: #333;
                    font-weight: 600;
                    border-radius: 8px;
                    transition: all 0.3s;
                    font-size: 14px;
                    margin-left: 10px;
                }

                .lang-btn.active {
                    background: #067f50;
                    color: white;
                    border-color: #067f50;
                }

                .lang-btn:hover {
                    transform: translateY(-2px);
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
                }

                .form-content {
                    display: none;
                    animation: fadeIn 0.3s ease;
                }

                .form-content.active {
                    display: block;
                }

                @keyframes fadeIn {
                    from {
                        opacity: 0;
                    }

                    to {
                        opacity: 1;
                    }
                }

                h1 {
                    text-align: center;
                    font-weight: bold;
                    margin-bottom: 25px;
                    font-size: 20px;
                    color: #333;
                }

                p {
                    margin-bottom: 20px;
                    line-height: 1.8;
                }

                input[type="text"],
                input[type="date"] {
                    border: 1px solid #333;
                    padding: 8px 10px;
                    border-radius: 5px;
                    font-size: 14px;
                    transition: border-color 0.3s;
                }

                input[type="text"]:focus,
                input[type="date"]:focus {
                    outline: none;
                    border-color: #067f50;
                    box-shadow: 0 0 0 2px rgba(6, 127, 80, 0.1);
                }

                .form-row {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 20px;
                    margin-bottom: 20px;
                }

                .form-field {
                    flex: 1;
                    min-width: 250px;
                }

                .form-field label {
                    display: block;
                    font-weight: bold;
                    margin-bottom: 8px;
                    color: #333;
                }

                .form-field input {
                    width: 100%;
                }

                .inline-input {
                    display: inline-block;
                    margin: 0 5px;
                }

                .section-title {
                    margin-top: 35px;
                    font-weight: bold;
                    font-size: 16px;
                    text-decoration: underline;
                    color: #067f50;
                }

                @media (max-width: 768px) {
                    .containerCY {
                        padding: 20px;
                    }

                    .form-row {
                        flex-direction: column;
                    }

                    .form-field {
                        min-width: 100%;
                    }

                    .lang-btn {
                        padding: 8px 16px;
                        font-size: 13px;
                    }

                    h1 {
                        font-size: 18px;
                    }
                }
            </style>
            <div class="containerCY">
                <!-- Language Toggle -->
                <div class="language-toggle">
                    <button class="lang-btn active" data-lang="en">English</button>
                    <button class="lang-btn" data-lang="hi">हिंदी</button>
                </div>

                <!-- English Form -->
                <div class="form-content active" id="form-en">
                    <h1>CONSENT FORM FOR FNAC</h1>

                    <p>
                        I <input type="text" class="inline-input" style="width:230px;" placeholder="Your name"
                            name="consent_name" id="CY_FOM_002__consent_name">
                        hereby give my informed consent for performing FNAC (Fine Needle Aspiration Cytology)
                        procedure on me for <input type="text" class="inline-input" style="width:230px;"
                            placeholder="Test area" name="test_area" id="CY_FOM_002__test_area">.
                        Details of the procedure, associated risks and possible complications have been explained to me in
                        detail.
                    </p>

                    <div class="form-row">
                        <div class="form-field">
                            <label>Patient Name:</label>
                            <input type="text" placeholder="Enter patient name" name="patient_name"
                                id="CY_FOM_002__patient_name">
                        </div>
                        <div class="form-field">
                            <label>Doctor's Name:</label>
                            <input type="text" placeholder="Enter doctor name" name="doctor_name"

                                id="CY_FOM_002__doctor_name">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-field">
                            <label>Patient Signature:</label>
                            <input type="text" placeholder="Signature" name="patient_signature"
                                id="CY_FOM_002__patient_signature">
                        </div>
                        <div class="form-field">
                            <label>Doctor Signature:</label>
                            <input type="text" placeholder="Signature" name="doctor_signature"
                                id="CY_FOM_002__doctor_signature">
                        </div>
                    </div>

                    <div class="form-field" style="max-width: 300px;">
                        <label>Date:</label>
                        <input type="date" name="date" id="CY_FOM_002__date">
                    </div>

                    <p class="section-title">If the procedure is done in-house:</p>
                </div>

                <!-- Hindi Form -->
                <div class="form-content" id="form-hi">
                    <h1>फाइन नीडल एस्पिरेशन साइटोलॉजी हेतु सहमति पत्र</h1>

                    <p>
                        मैं <input type="text" class="inline-input" style="width:230px;" placeholder="आपका नाम"
                            name="consent_name" id="CY_FOM_002__consent_name_hi">
                        अपने
                        <input type="text" class="inline-input" style="width:230px;" placeholder="परीक्षण क्षेत्र"
                            name="test_area" id="CY_FOM_002__test_area_hi">
                        (परीक्षण क्षेत्र) के लिए फाइन नीडल एस्पिरेशन साइटोलॉजी (FNAC) जाँच कराने हेतु अपनी सहमति देता/देती
                        हूँ।
                        मुझे इस प्रक्रिया तथा इसके संभावित जोखिमों और जटिलताओं के बारे में पूरी जानकारी दे दी गई है।
                    </p>

                    <div class="form-row">
                        <div class="form-field">
                            <label>मरीज़ का नाम:</label>
                            <input type="text" placeholder="मरीज़ का नाम दर्ज करें" name="patient_name"
                                id="CY_FOM_002__patient_name_hi">
                        </div>
                        <div class="form-field">
                            <label>डॉक्टर का नाम:</label>
                            <input type="text" placeholder="डॉक्टर का नाम दर्ज करें" name="doctor_name"
                                id="CY_FOM_002__doctor_name_hi">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-field">
                            <label>हस्ताक्षर (मरीज़):</label>
                            <input type="text" placeholder="हस्ताक्षर" name="patient_signature"
                                id="CY_FOM_002__patient_signature_hi">
                        </div>
                        <div class="form-field">
                            <label>हस्ताक्षर (डॉक्टर):</label>
                            <input type="text" placeholder="हस्ताक्षर" name="doctor_signature"
                                id="CY_FOM_002__doctor_signature_hi">
                        </div>
                    </div>

                    <div class="form-field" style="max-width: 300px;">
                        <label>दिनांक:</label>
                        <input type="date" name="date" id="CY_FOM_002__date_hi">
                    </div>

                    <p class="section-title">यदि प्रक्रिया इन-हाउस की गई है:</p>
                </div>
            </div>

            <script>
                // Language toggle functionality
                const langButtons = document.querySelectorAll('.lang-btn');
                const formContents = document.querySelectorAll('.form-content');

                langButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const lang = this.getAttribute('data-lang');

                        // Update button states
                        langButtons.forEach(btn => btn.classList.remove('active'));
                        this.classList.add('active');

                        // Update form visibility
                        formContents.forEach(form => form.classList.remove('active'));
                        document.getElementById(`form-${lang}`).classList.add('active');
                    });
                });
            </script>


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
