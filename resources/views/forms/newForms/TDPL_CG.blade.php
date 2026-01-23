@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CG</title>
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
                <div style="font-size: 20px; ">CG </div>

            </div>
            <div class="icon-view">
                <div class="pc-content">
                    <div class="pc-folder" onclick="showSection('TDPL/CG/FOM-001')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Cytogenetics Test Request Form</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('TDPL/CG/FOM-002')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label"> Cytogenetics Consent Form</span>
                    </div>


                </div>
            </div>
        </div>


        <x-formTemplete id="TDPL/CG/FOM-001" docNo="TDPL/CG/FOM-001" docName="Cytogenetics Test Request Form" issueNo="2.0"
            issueDate="01/10/2024" buttonText="Submit" action="{{ route('cg.forms.submit') }}">

            <div style="width:100%; font-family:Arial; font-size:14px; line-height:1.4;">

                <h2 style="text-align:center; margin-bottom:10px;">CYTOGENETICS TEST REQUISITION FORM</h2>

                <!-- Patient / Physician Info -->
                <table style="width:100%; border-collapse:collapse;">
                    <tr>
                        <td style="width:50%; vertical-align:top; padding:8px; border:1px solid #000;">
                            Patient’s Name: <input type="text" id="patient_name" name="patient_name"
                                style="width:90%;"><br><br>
                            Age: <input type="text" id="patient_age" name="patient_age" style="width:25%;"> &nbsp;&nbsp;
                            Gender: <input type="text" id="patient_gender" name="patient_gender"
                                style="width:30%;"><br><br>
                            Address: <input type="text" id="patient_address" name="patient_address" style="width:95%;">
                        </td>

                        <td style="width:50%; vertical-align:top; padding:8px; border:1px solid #000;">
                            Physician Name & Address:<br>
                            <textarea id="physician_address" name="physician_address" style="width:95%; height:60px;"></textarea><br>
                            Phone Number: <input type="text" id="physician_phone" name="physician_phone"
                                style="width:60%;"><br><br>
                            Hospital/Lab: <input type="text" id="hospital_lab" name="hospital_lab"
                                style="width:70%;"><br><br>
                            Collection Date: <input type="date" id="collection_date" name="collection_date"> &nbsp;&nbsp;
                            Time: <input type="time" id="collection_time" name="collection_time"><br><br>
                            Specimen Type: <input type="text" id="specimen_type" name="specimen_type" style="width:90%;">
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:8px; border:1px solid #000;">
                            <strong>Date & Time of Sample Received:</strong><br>
                            <input type="datetime-local" id="sample_received_at" name="sample_received_at"
                                style="width:90%;">
                        </td>
                        <td style="padding:8px; border:1px solid #000;">
                            <strong>Sample Condition at Receiving:</strong><br>
                            <input type="text" id="sample_condition" name="sample_condition" style="width:90%;">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" style="padding:12px; border:1px solid #000;">
                            <strong>Sample Type:</strong>
                            Whole Blood / Amniotic Fluid / CVS / Cord Blood / Tissue / POC / Skin Biopsy
                            <br><br>

                            <strong>Study Type:</strong>
                            Karyotype / FISH
                            <br><br>

                            <strong>Request for Karyotype and/or FISH Studies:</strong><br><br>

                            <label><input type="checkbox" name="study_requests[]" value="karyotype"> Karyotype</label><br>
                            <label><input type="checkbox" name="study_requests[]" value="karyotype_reflex_fish"> Karyotype +
                                Reflex FISH</label><br>
                            <label><input type="checkbox" name="study_requests[]" value="fish_5_probes"> FISH – 5 Probes
                                (13, 21, 18, X, Y)</label><br>
                            <label><input type="checkbox" name="study_requests[]" value="karyotype_fish_3_probes"> Karyotype
                                + FISH – 3 Probes (18, X, Y)</label><br>
                            <label><input type="checkbox" name="study_requests[]" value="others"> Others: <input
                                    type="text" id="study_other_details" name="study_other_details" style="width:60%;">
                                2-Probes (13 & 21)</label>
                            <br><br>

                            <strong>PRENATAL STUDIES:</strong><br>
                            <label><input type="checkbox" name="prenatal_studies[]" value="abnormal_serum"> Abnormal
                                maternal serum screen (T21/T18/ONTD)</label><br>
                            <label><input type="checkbox" name="prenatal_studies[]" value="abnormal_ultrasound"> Abnormal
                                ultrasound (Specify): <input type="text" id="prenatal_ultrasound_details"
                                    name="prenatal_ultrasound_details" style="width:50%;"></label><br>
                            <label><input type="checkbox" name="prenatal_studies[]" value="advanced_maternal_age">
                                Advanced maternal age</label><br>
                            <label><input type="checkbox" name="prenatal_studies[]" value="other"> Other: <input
                                    type="text" id="prenatal_other_details" name="prenatal_other_details"
                                    style="width:60%;"></label>
                            <br><br>

                            <strong>PEDIATRIC STUDIES:</strong><br>
                            <label><input type="checkbox" name="pediatric_studies[]" value="cardiac_defect"> Cardiac
                                Defect (Specify): <input type="text" id="pediatric_cardiac_details"
                                    name="pediatric_cardiac_details" style="width:50%;"></label><br>
                            <label><input type="checkbox" name="pediatric_studies[]" value="multiple_anomalies"> Multiple
                                congenital anomalies (Specify): <input type="text" id="pediatric_anomalies_details"
                                    name="pediatric_anomalies_details" style="width:50%;"></label><br>
                            <label><input type="checkbox" name="pediatric_studies[]" value="developmental_delay">
                                Developmental delay / Mental retardation</label><br>
                            <label><input type="checkbox" name="pediatric_studies[]" value="learning_disabilities">
                                Learning disabilities</label><br>
                            <label><input type="checkbox" name="pediatric_studies[]" value="dysmorphic_features">
                                Dysmorphic features</label>
                            <br><br>

                            <strong>ADULT CONSTITUTIONAL STUDIES:</strong><br>
                            <label><input type="checkbox" name="adult_studies[]" value="infertility">
                                Infertility</label><br>
                            <label><input type="checkbox" name="adult_studies[]" value="recurrent_miscarriage"> Recurrent
                                miscarriage</label><br>
                            <label><input type="checkbox" name="adult_studies[]" value="partner_recurrent_miscarriage">
                                Partner with recurrent miscarriage</label><br>
                            <label><input type="checkbox" name="adult_studies[]" value="genital_anomalies"> Genital
                                anomalies</label><br>
                            <label><input type="checkbox" name="adult_studies[]" value="ambiguous_genitalia"> Ambiguous
                                genitalia</label><br>
                            <label><input type="checkbox" name="adult_studies[]" value="familial_translocation"> Familial
                                translocation/inversion (Specify): <input type="text"
                                    id="familial_translocation_details" name="familial_translocation_details"
                                    style="width:50%;"></label><br>
                            <label><input type="checkbox" name="adult_studies[]" value="previous_child_abnormality">
                                Previous child chromosome abnormality (Specify): <input type="text"
                                    id="previous_child_details" name="previous_child_details"
                                    style="width:50%;"></label><br>
                            <label><input type="checkbox" name="adult_studies[]" value="other"> Other: <input
                                    type="text" id="adult_other_details" name="adult_other_details"
                                    style="width:60%;"></label>
                        </td>
                    </tr>
                </table>

                <br>

                <!-- Additional Questions -->
                <ol>
                    <li>If you suspect a specific chromosome abnormality, indicate which one:
                        <input type="text" id="suspected_chromosome" name="suspected_chromosome" style="width:60%;">
                    </li>
                    <br>
                    <li>Indication for study (clinical features / family history):<br>
                        <textarea id="study_indication" name="study_indication" style="width:90%; height:70px;"></textarea>
                    </li>
                </ol>

                <br>

                <label><input type="checkbox" name="additional_conditions[]" value="developmental_delay"> Developmental
                    delay / Mental retardation</label>&nbsp;&nbsp;
                <label><input type="checkbox" name="additional_conditions[]" value="seizure_disorder"> Seizure
                    disorder</label><br>
                <label><input type="checkbox" name="additional_conditions[]" value="dysmorphic_features"> Dysmorphic
                    features</label>&nbsp;&nbsp;
                <label><input type="checkbox" name="additional_conditions[]" value="short_stature"> Short
                    stature</label><br>
                <label><input type="checkbox" name="additional_conditions[]" value="autism"> Autism</label>&nbsp;&nbsp;
                Suspect Trisomy for Chromosomes: <input type="text" id="suspected_trisomy" name="suspected_trisomy"
                    style="width:30%;"><br><br>

                Major birth defect (Specify): <input type="text" id="major_birth_defect" name="major_birth_defect"
                    style="width:60%;"><br><br>
                Multiple congenital anomalies (Specify): <input type="text" id="multiple_anomalies"
                    name="multiple_anomalies" style="width:60%;"><br><br>
                Parental follow-up (Proband name): <input type="text" id="parental_followup" name="parental_followup"
                    style="width:60%;"><br><br>
                Other: <input type="text" id="other_notes" name="other_notes" style="width:60%;">

                <br><br><br>

                <!-- ONCOLOGY -->
                <h2>ONCOLOGY</h2>

                Diagnosis: <input type="text" id="oncology_diagnosis" name="oncology_diagnosis" style="width:50%;">
                [Attach Histopathology Report]<br><br>

                Is this a new diagnosis?
                <label>[ <input type="checkbox" name="new_diagnosis" value="yes"> ] Yes</label>
                <label>[ <input type="checkbox" name="new_diagnosis" value="no"> ] No</label>
                <br><br>

                WBC: <input type="text" id="wbc" name="wbc" style="width:20%;"> &nbsp;&nbsp;
                % Blasts: <input type="text" id="blasts_percentage" name="blasts_percentage" style="width:20%;">
                &nbsp;&nbsp;

                Repeat study?
                <label>[ <input type="checkbox" name="repeat_study" value="yes"> ] Yes</label>
                <label>[ <input type="checkbox" name="repeat_study" value="no"> ] No</label>
                (Attach Report)
                <br><br>

                Bone marrow transplant?
                <label>[ <input type="checkbox" name="bone_marrow_transplant" value="yes"> ] Yes</label>
                <label>[ <input type="checkbox" name="bone_marrow_transplant" value="no"> ] No</label>&nbsp;&nbsp;
                Donor Sex: <label>[ <input type="checkbox" name="donor_sex" value="male"> ] Male</label>
                <label>[ <input type="checkbox" name="donor_sex" value="female"> ] Female</label>
                <br><br>

                Previous radiation / chemotherapy?
                <label>[ <input type="checkbox" name="previous_therapy" value="yes"> ] Yes</label>
                <label>[ <input type="checkbox" name="previous_therapy" value="no"> ] No</label>
                <br><br>

                <h2>Sample Type & Study Type</h2>
                <label><input type="checkbox" name="sample_types[]" value="whole_blood"> Whole Blood</label>
                <label><input type="checkbox" name="sample_types[]" value="bone_marrow"> Bone Marrow</label><br><br>

                <label><input type="checkbox" name="study_categories[]" value="lymphoid"> Lymphoid Disorder</label>
                <label><input type="checkbox" name="study_categories[]" value="myeloid"> Myeloid Disorder</label>
                <br><br><br>

                <!-- Consent -->
                <h3>Patient / Guardian Consent</h3>
                I acknowledge the implications of genetic testing and give my consent for analysis and storage of the
                sample.
                <br><br><br>

                Signature of Patient/Guardian:<br><br>
                ________________________________
            </div>

        </x-formTemplete>

     <x-formTemplete id="TDPL/CG/FOM-002" docNo="TDPL/CG/FOM-002" docName=" Cytogenetics Consent Form" issueNo="2.0"
            issueDate="01/10/2024" buttonText="Submit" action="{{ route('cg.forms.submit') }}">

            <form style="font-family: Arial, sans-serif; font-size: 14px; line-height: 1.6; padding: 10px;">

                <h2 style="text-align: center; margin-bottom: 15px;">
                    INFORMED CONSENT AND RELEASE FOR CONVENTIONAL AND MOLECULAR CYTOGENETIC STUDIES, CONSTITUTIONAL GENETICS
                    ANALYSIS
                </h2>

                <p>I voluntarily consent for the following tests to be performed on my / my child’s / my fetus’s specimen.
                </p>

                <div style="margin-left:20px; margin-bottom:10px;">
                    <label style="display:flex; align-items:center;">
                        <input type="checkbox" id="consent_karyotype" name="consent_karyotype" value="1" style="margin-right:6px;">
                        Conventional cytogenetic analysis (Karyotype)
                    </label>
                    <label style="display:flex; align-items:center; margin-top:5px;">
                        <input type="checkbox" id="consent_fish" name="consent_fish" value="1" style="margin-right:6px;">
                        Molecular cytogenetic analysis (FISH)
                    </label>
                </div>

                <h3 style="margin-top:20px;">Description and Purpose of the Tests:</h3>

                <p>
                    Chromosome and sub-microscopic chromosome abnormalities may be associated with developmental delay
                    (mental retardation,
                    behavioral and/or learning disabilities), congenital abnormalities, infertility, history of miscarriage,
                    embryonic and fetal death,
                    short stature, and family history of a chromosome abnormality.
                </p>

                <p>
                    <strong>Karyotype Analysis:</strong> Karyotype analysis is the study of the chromosomes that are present
                    in human cells.
                    Chromosomes are structures on which the genes are located. Genes encode the hereditary material (DNA)
                    that provides the
                    blueprint for an individual.
                </p>

                <p>
                    <strong>Purpose Of Karyotype Analysis and Its Limitations:</strong>
                    This test examines the chromosomes to determine if there is any change in the total number or structure
                    that might be associated
                    with the patient’s clinical history or clinical abnormalities. Occasionally, a structural defect may not
                    be detected because it is
                    too small to be seen visually.
                </p>

                <p>
                    <strong>Cytogenetics and fluorescence in situ hybridization (FISH):</strong>
                    FISH is a specialized technology that uses fluorescently labeled DNA fragments of known composition that
                    can bind to a patient’s
                    DNA. The chromosome constitution of my specimen will be analyzed by growing the cells in culture and
                    examining the chromosomes
                    under the microscope. This test will reveal major chromosomal abnormalities and is greater than 99%
                    accurate. In some cases,
                    a preliminary FISH analysis may be performed on uncultured cells and this test will reveal information
                    on a limited subset of
                    chromosome abnormalities.
                </p>

                <h3 style="margin-top:20px;">The following points have been explained and I understand and accept them:
                </h3>

                <ol style="padding-left:18px;">
                    <li>I have the option of receiving genetic counseling before and after the procedure.</li>
                    <li>Tissue culture from the cells of any particular sample may be unsuccessful or the chromosome
                        preparations may be of poor quality and unusable (Conventional Cytogenetics and FISH).</li>
                    <li>Conventional Cytogenetics, FISH assays may not detect very small deletions, duplications, and subtle
                        rearrangements, or low-level mosaicism. In rare cases, the test may provide results that are
                        difficult to interpret.</li>
                    <li>Additional testing may be needed to confirm or refine the interpretation of test results, by
                        cytogenomic microarray or Next Generation Genomics (NGS).</li>
                    <li>I have the option if my or my child’s or my fetus’s test is “positive” I may consider further
                        independent testing and pursue genetic counseling.</li>
                    <li>A Normal test result does not exclude the possibility that I/my child/my fetus may have a genetic
                        condition not evaluable by Cytogenetics, FISH, or microarray testing.</li>
                    <li>I understand that all tests do not rule out genetic disorders caused by single gene mutations.</li>
                    <li>The specimen may be used for comparison, further investigation, or research at our referral lab if
                        required. Part of my sample may be used for validation or research without revealing personal
                        details.</li>
                    <li>The test results are forwarded to treating practitioners, counselors, and physicians and will be
                        part of my medical record.</li>
                    <li>I have been given the opportunity to ask questions about the ordered tests and told how I will get
                        the results.</li>
                    <li>No test other than those authorized shall be performed on the biological sample and the sample will
                        be discarded as per biomedical waste policy.</li>
                </ol>

                <!-- Patient Signature Section -->
                <div style="display: flex; flex-wrap: wrap; gap:10px">

                    <div style="margin-top:40px; padding:20px; border:1px solid #ccc; border-radius:6px;">
                        <h3 style="margin-top:0;">Patient / Authorized Representative</h3>

                        <div style="margin-bottom:15px;">
                            <label>Signature:</label><br>
                            <input type="text" id="patient_signature" name="patient_signature" style="width:300px; margin-top:5px;">
                        </div>

                        <div style="margin-bottom:15px;">
                            <label>Full Name:</label><br>
                            <input type="text" id="patient_full_name" name="patient_full_name" style="width:300px; margin-top:5px;">
                        </div>

                        <div style="display:flex; gap:20px; margin-bottom:15px;">
                            <div>
                                <label>Date:</label><br>
                                <input type="date" id="patient_date" name="patient_date" style="width:180px; margin-top:5px;">
                            </div>

                            <div>
                                <label>Time (AM/PM):</label><br>
                                <input type="text" id="patient_time" name="patient_time" placeholder="AM / PM" style="width:120px; margin-top:5px;">
                            </div>
                        </div>
                    </div>

                    <!-- Person Obtaining Consent -->
                    <div style="margin-top:40px; padding:20px; border:1px solid #ccc; border-radius:6px;">
                        <h3 style="margin-top:0;">Person Obtaining Consent</h3>

                        <div style="margin-bottom:15px;">
                            <label>Signature:</label><br>
                            <input type="text" id="obtainer_signature" name="obtainer_signature" style="width:300px; margin-top:5px;">
                        </div>

                        <div style="margin-bottom:15px;">
                            <label>Full Name:</label><br>
                            <input type="text" id="obtainer_full_name" name="obtainer_full_name" style="width:300px; margin-top:5px;">
                        </div>

                        <div style="display:flex; gap:20px; margin-bottom:15px;">
                            <div>
                                <label>Date:</label><br>
                                <input type="date" id="obtainer_date" name="obtainer_date" style="width:180px; margin-top:5px;">
                            </div>

                            <div>
                                <label>Time (AM/PM):</label><br>
                                <input type="text" id="obtainer_time" name="obtainer_time" placeholder="AM / PM" style="width:120px; margin-top:5px;">
                            </div>
                        </div>
                    </div>
                </div>

            </form>

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
