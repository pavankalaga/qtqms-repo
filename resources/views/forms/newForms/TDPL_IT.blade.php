@extends('layouts.base')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT</title>
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
            <div style="font-size: 20px; ">IT </div>

        </div>
        <div class="icon-view">
            <div class="pc-content">
                <div class="pc-folder" onclick="showSection('TDPL/IT/FOM-001')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">LIS Interface Validation Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/IT/FOM-002')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">LIS Validation Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/IT/FOM-003')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Auto Approval Authorization</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/IT/FOM-004')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">LIS User ID & Mail ID Login Creation Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/IT/FOM-005')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">LIMS User Role Access Matrix</span>
                </div>  
            </div>
        </div>
    </div>


    <x-formTemplete
        id="TDPL/IT/FOM-001"
        docNo="TDPL/IT/FOM-001"
        docName="LIS Interface Validation Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <!-- MAIN ANALYZER INFORMATION TABLE -->
        <table style="width:100%; border-collapse: collapse;" border="1">
            <tbody>

                <tr>
                    <td style="padding:6px; width:80px;"><strong>S. No.</strong></td>
                    <td colspan="3" style="padding:6px;">
                        <strong>Department:</strong>
                        <input type="text" name="department" style="width:95%; border:none; outline:none;">
                    </td>
                </tr>

                <tr>
                    <td style="padding:6px;"><strong>1</strong></td>
                    <td colspan="3" style="padding:6px;">
                        <strong>Analyzer Name:</strong>
                        <input type="text" name="analyzer_name" style="width:95%; border:none; outline:none;">
                    </td>
                </tr>

                <tr>
                    <td style="padding:6px;"><strong>2</strong></td>
                    <td colspan="2" style="padding:6px;">
                        <strong>Instrument S. No.:</strong>
                        <input type="text" name="instrument_serial" style="width:90%; border:none; outline:none;">
                    </td>
                    <td style="padding:6px;">
                        <strong>Instrument ID:</strong>
                        <input type="text" name="instrument_id" style="width:90%; border:none; outline:none;">
                    </td>
                </tr>

                <tr>
                    <td style="padding:6px;"><strong>3</strong></td>
                    <td colspan="3" style="padding:6px;">
                        <strong>Analyzer Type:</strong>
                        <input type="text" name="analyzer_type" style="width:95%; border:none; outline:none;">
                    </td>
                </tr>

                <!-- VALIDATION SECTION -->
                <tr>
                    <td rowspan="6" style="padding:6px; vertical-align: top;"><strong>4</strong></td>
                    <td colspan="3" style="padding:6px;">
                        <strong>Validation:</strong>
                        <em>(attach sample parameter screenshots for each step)</em>
                    </td>
                </tr>

                <tr>
                    <td style="padding:6px; width:120px;"><strong>Step 1</strong></td>
                    <td colspan="2" style="padding:6px;">
                        <strong>Registration:</strong>
                        <input type="text" name="validation_step_1" style="width:90%; border:none; outline:none;">
                    </td>
                </tr>

                <tr>
                    <td style="padding:6px;"><strong>Step 2</strong></td>
                    <td colspan="2" style="padding:6px;">
                        <strong>Sample Receipt in Department:</strong>
                        <input type="text" name="validation_step_2" style="width:90%; border:none; outline:none;">
                    </td>
                </tr>

                <tr>
                    <td style="padding:6px;"><strong>Step 3</strong></td>
                    <td colspan="2" style="padding:6px;">
                        <strong>Result Transfer from Analyzer to ITDose LIMS</strong>
                        <input type="text" name="validation_step_3" style="width:90%; border:none; outline:none;">
                    </td>
                </tr>

                <tr>
                    <td style="padding:6px;"><strong>Step 4</strong></td>
                    <td colspan="2" style="padding:6px;">
                        <strong>Result Validation:</strong><br>
                        <ul style="margin:4px 0 4px 18px;">
                            <li><strong>Interface Logfile</strong></li>
                            <li><strong>Analyzer Screen</strong></li>
                        </ul>
                        <input type="text" name="validation_step_4" style="width:90%; border:none; outline:none;">
                    </td>
                </tr>

                <tr>
                    <td style="padding:6px;"><strong>Step 5</strong></td>
                    <td colspan="2" style="padding:6px;">
                        <strong>Report:</strong>
                        <input type="text" name="validation_step_5" style="width:90%; border:none; outline:none;">
                    </td>
                </tr>

                <tr>
                    <td style="padding:6px;"><strong>5</strong></td>
                    <td colspan="3" style="padding:6px;">
                        <strong>Remarks:</strong>
                        <textarea name="remarks" style="width:98%; height:60px; border:none; outline:none;">Machine raw data and report values match.</textarea>
                    </td>
                </tr>

            </tbody>
        </table>


        <br><br>


        <!-- TEST LIST TABLE WITH LOOP -->
        <table style="width:100%; border-collapse: collapse;" border="1">
            <thead>
                <tr>
                    <td style="padding:6px; width:60px;"><strong>S. No.</strong></td>
                    <td style="padding:6px;"><strong>Test Code</strong></td>
                    <td style="padding:6px;"><strong>Test Name</strong></td>
                    <td style="padding:6px;"><strong>LIS</strong></td>
                </tr>
            </thead>

            <tbody>
                @for ($i = 1; $i <= 40; $i++)
                    <tr>
                    <td style="padding:6px; text-align:center;">{{ $i }}</td>
                    <td style="padding:6px;">
                        <input type="text" name="tests[{{ $i }}][code]" style="width:95%; border:none; outline:none;">
                    </td>
                    <td style="padding:6px;">
                        <input type="text" name="tests[{{ $i }}][name]" style="width:95%; border:none; outline:none;">
                    </td>
                    <td style="padding:6px;">
                        <input type="text" name="tests[{{ $i }}][lis]" style="width:95%; border:none; outline:none;">
                    </td>
                    </tr>
                    @endfor
            </tbody>
        </table>

        <p><strong>Parameters Interfaced and Validated</strong></p>


    </x-formTemplete>

    <x-formTemplete
        id="TDPL/IT/FOM-002"
        docNo="TDPL/IT/FOM-002"
        docName="LIS Validation Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <p>&nbsp;</p>
        <p><strong>VALIDATION OF LABORATORY INFORMATION SYSTEM.</strong></p>
        <p><strong>ITDose Infosystems Pvt. Ltd.</strong></p>
        <p><span style="font-weight: 400;">G-19, Sector-6 NOIDA-201301</span></p>
        <p><span style="font-weight: 400;">Tel No.: 0120-4115455</span></p>
        <p><span style="font-weight: 400;">Email: </span><a href="mailto:info@itdoseinfo.com"><span style="font-weight: 400;">info@itdoseinfo.com</span></a></p>
        <p>&nbsp;</p>
        <p><span style="font-weight: 400;">This is to certify that the </span><strong><em>&ldquo;Laboratory Information System (LIS)&rdquo; </em></strong><span style="font-weight: 400;">has been validated for consistent performance according to its specified requirements and is deemed fit for operational use.</span></p>
        <p><span style="font-weight: 400;">The system demonstrates seamless performance across all Windows and Mac</span></p>
        <p><span style="font-weight: 400;">operating systems and is compatible with all major web browsers. The </span><strong><em>&ldquo;Laboratory Information System (LIS)&rdquo; </em></strong><span style="font-weight: 400;">utilized by </span><strong><em>TRUSTlab Diagnostics Private Limited </em></strong><span style="font-weight: 400;">is secured with password protection and is currently operating on version 6.0.13.</span></p>
        <p><span style="font-weight: 400;">The </span><strong><em>&ldquo;Laboratory Information System (LIS)&rdquo; </em></strong><span style="font-weight: 400;">has shown satisfactory performance, managing information with expected accuracy, reliability, file integrity, auditability, and management control. This validates the system&rsquo;s effectiveness in fulfilling its intended functionalities.</span></p>
        <p>&nbsp;</p>
        <p><strong>Dated: </strong><span style="font-weight: 400;">01/08/2022</span></p>
        <p><strong>Lab Address:</strong></p>
        <p><strong>TRUSTlab Diagnostics Private Limited.</strong></p>
        <p><span style="font-weight: 400;">#31, St #5, Prakash Nagar, Begumpet, Hyderabad, Telangana-500016.</span></p>
        <p>&nbsp;</p>
        <p><span style="font-weight: 400;">Calibrated by</span></p>
        <p><strong><em>Dharmendra Singh</em></strong></p>
        <p><em><span style="font-weight: 400;">(Project Manager)</span></em></p>
        <p><span style="font-weight: 400;">ITDOSEINFO SYSTEMS PVT. LTD.</span></p>
        <p><span style="font-weight: 400;">G-19, 2</span><span style="font-weight: 400;">nd</span> <span style="font-weight: 400;">Floor, Sector -6, NOIDA-201301 (U.P.) Tel.: +91-120-4115455</span></p>
        <p><span style="font-weight: 400;">Email: </span><a href="mailto:info@itdoseinfo.com"><span style="font-weight: 400;">info@itdoseinfo.com </span></a><span style="font-weight: 400;">Website: </span><a href="http://www.itdoseinfo.com/"><span style="font-weight: 400;">www.itdoseinfo.com</span></a></p>
    </x-formTemplete>
    <x-formTemplete
        id="TDPL/IT/FOM-003"
        docNo="TDPL/IT/FOM-003"
        docName="Auto Approval Authorization"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <p><strong>Department: <select name="" id="">
                    <option value="">Bio</option>
                    <option value="">It</option>
                    <option value=""></option>
                </select></strong></p>
        <p><strong>Section A:<input type="text" name="Test and Equipment Details" value="Test and Equipment Details" style="width:200px; ">
            </strong></p>

        <table style="width:100%; border-collapse:collapse;" border="1">
            <tr>
                <td><strong>Test Name</strong></td>
                <td><strong>Department</strong></td>
                <td><strong>Equipment Used</strong></td>
                <td><strong>Reference Range Verified (Y/N)</strong></td>
                <td><strong>Auto-approval Enabled (Y/N)</strong></td>
            </tr>

            @foreach([
            ['name' => 'Alanine Transaminase (ALT/SGPT)', 'dept' => 'Biochemistry', 'equip' => 'DxC 700 AU'],
            ['name' => 'Albumin', 'dept' => 'Biochemistry', 'equip' => 'DxC 700 AU'],
            ['name' => 'Alkaline Phosphatase (ALP)', 'dept' => 'Biochemistry', 'equip' => 'DxC 700 AU'],
            ['name' => 'Amylase', 'dept' => 'Biochemistry', 'equip' => 'DxC 700 AU'],
            ['name' => 'Aspartate Aminotransferase (SGOT)', 'dept' => 'Biochemistry', 'equip' => 'DxC 700 AU'],
            ['name' => 'Calcium', 'dept' => 'Biochemistry', 'equip' => 'DxC 700 AU'],
            ['name' => 'Creatinine', 'dept' => 'Biochemistry', 'equip' => 'DxC 700 AU'],
            ['name' => 'Follicle Stimulating Hormone (FSH)', 'dept' => 'Biochemistry', 'equip' => 'DxI 800'],
            ['name' => 'Gamma Glutamyl Transferase (GGT)', 'dept' => 'Biochemistry', 'equip' => 'DxC 700 AU'],
            ['name' => 'Luteinising Hormone (LH)', 'dept' => 'Biochemistry', 'equip' => 'DxI 800'],
            ['name' => 'Prolactin', 'dept' => 'Biochemistry', 'equip' => 'DxI 800'],
            ['name' => 'Prostate Specific Antigen (Total PSA)', 'dept' => 'Biochemistry', 'equip' => 'DxI 800'],
            ['name' => 'Testosterone-Total', 'dept' => 'Biochemistry', 'equip' => 'DxI 800'],
            ['name' => 'Thyroid Stimulating Hormone (TSH)', 'dept' => 'Biochemistry', 'equip' => 'DxI 800'],
            ['name' => 'Thyroxine-Total (TT4)', 'dept' => 'Biochemistry', 'equip' => 'DxI 800'],
            ['name' => 'Tri-Iodothyronine Total (TT3)', 'dept' => 'Biochemistry', 'equip' => 'DxI 800'],
            ['name' => 'Urea', 'dept' => 'Biochemistry', 'equip' => 'DxC 700 AU'],
            ['name' => 'Uric Acid', 'dept' => 'Biochemistry', 'equip' => 'DxC 700 AU'],
            ['name' => 'Vitamin-B12', 'dept' => 'Biochemistry', 'equip' => 'DxC 700 AU'],
            ] as $i => $t)
            <tr>
                <td><input type="text" name="tests[{{ $i }}][name]" value="{{ $t['name'] }}" style="width:100%; border:0;"></td>
                <td><input type="text" name="tests[{{ $i }}][dept]" value="{{ $t['dept'] }}" style="width:100%; border:0;"></td>
                <td><input type="text" name="tests[{{ $i }}][equip]" value="{{ $t['equip'] }}" style="width:100%; border:0;"></td>
                <td><input type="text" name="tests[{{ $i }}][ref]" value="Y" style="width:100%; border:0;"></td>
                <td><input type="text" name="tests[{{ $i }}][auto]" value="Y" style="width:100%; border:0;"></td>
            </tr>
            @endforeach
        </table>

        <p><strong>Section B: <input type="text" name="Auto-Approval Criteria" value="Auto-Approval Criteria" style="width:200px; "></strong></p>

        <table style="width:100%; border-collapse:collapse;" border="1">
            <tr>
                <td><strong>Please check all that apply</strong></td>
                <td><strong>Y/N</strong></td>
            </tr>

            @foreach([
            'Result is within established biological reference intervals',
            'Delta checks performed',
            'Critical values excluded',
            'Auto-validation rules configured and validated',
            'Peer review not required for this test'
            ] as $i => $c)
            <tr>
                <td><input type="text" name="criteria[{{ $i }}][text]" value="{{ $c }}" style="width:100%; border:0;"></td>
                <td><input type="text" name="criteria[{{ $i }}][yn]" value="Y" style="width:100%; border:0;"></td>
            </tr>
            @endforeach
        </table>

        <p><strong>Section C:<input type="text" name=" Authorized Personnel" value=" Authorized Personnel" style="width:200px; "></strong></p>

        <table style="width:100%; border-collapse:collapse;" border="1">
            <tr>
                <td><strong>S. No.</strong></td>
                <td><strong>Name</strong></td>
                <td><strong>Designation</strong></td>
                <td><strong>Qualification</strong></td>
                <td><strong>Department</strong></td>
                <td><strong>Signature</strong></td>
            </tr>

            @foreach([
            ['name' => 'Dr. Anusha Kommagiri', 'designation' => 'Consultant MD Biochemistry', 'qualification' => 'MD Biochemistry', 'dept' => 'Biochemistry']
            ] as $i => $a)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td><input type="text" name="authorized[{{ $i }}][name]" value="{{ $a['name'] }}" style="width:100%; border:0;"></td>
                <td><input type="text" name="authorized[{{ $i }}][designation]" value="{{ $a['designation'] }}" style="width:100%; border:0;"></td>
                <td><input type="text" name="authorized[{{ $i }}][qualification]" value="{{ $a['qualification'] }}" style="width:100%; border:0;"></td>
                <td><input type="text" name="authorized[{{ $i }}][department]" value="{{ $a['dept'] }}" style="width:100%; border:0;"></td>
                <td><input type="text" name="authorized[{{ $i }}][signature]" style="width:100%; border:0;"></td>
            </tr>
            @endforeach
        </table>

        <p><strong>Section D: <input type="text" name="Validation and Review Log" value="Validation and Review Log" style="width:200px; "></strong></p>

        <ul>
            <li><strong>Registration:</strong> <input type="text" name="log_registration" style="width:50%;"></li>
            <li><strong>Department Receive:</strong> <input type="text" name="log_receive" style="width:50%;"></li>
            <li><strong>Result:</strong> <input type="text" name="log_result" style="width:50%;"></li>
            <li><strong>Reports:</strong> <input type="text" name="log_reports" style="width:50%;"></li>
        </ul>

        <p><strong>Declaration:</strong></p>
        <p>
            <em>
                <input type="text" name="declaration"
                    value="We confirm that the above-mentioned tests have been evaluated and validated for auto-approval by the authorized personnel."
                    style="width:100%; border:0;">
            </em>
        </p>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/IT/FOM-004"
        docNo="TDPL/IT/FOM-004"
        docName="LIS User ID & Mail ID Login Creation Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <!-- IT Department Form -->
        <table style="width:100%; border-collapse: collapse;">
            <tr>
                <td colspan="4" style="text-align:center; font-weight:bold; padding:6px;">IT DEPARTMENT</td>
            </tr>

            <tr>
                <td style="padding:6px; font-weight:bold;">Date:</td>
                <td><input type="date" name="date" style="width:100%; padding:4px;"></td>

                <td style="padding:6px; font-weight:bold;">Employee No.:</td>
                <td><input type="text" name="employee_no" style="width:100%; padding:4px;"></td>
            </tr>

            <tr>
                <td style="padding:6px; font-weight:bold;">Employee Name:</td>
                <td><input type="text" name="employee_name" style="width:100%; padding:4px;"></td>

                <td style="padding:6px; font-weight:bold;">Department:</td>
                <td><input type="text" name="department" style="width:100%; padding:4px;"></td>
            </tr>

            <tr>
                <td style="padding:6px; font-weight:bold;">Email ID:</td>
                <td colspan="3">
                    <input type="email" name="email" style="width:100%; padding:4px;">
                </td>
            </tr>

            <tr>
                <td style="padding:6px; font-weight:bold;">LIMS Login ID:</td>
                <td><input type="text" name="lims_id" style="width:100%; padding:4px;"></td>

                <td style="padding:6px; font-weight:bold;">Requested By:</td>
                <td><input type="text" name="requested_by" style="width:100%; padding:4px;"></td>
            </tr>
        </table>

        <br><br>

        <!-- User Role Table -->
        <table style="width:100%; border-collapse:collapse; border:1px solid #000;">
            <tr>
                <td style="padding:6px; font-weight:bold;">User Role Requested</td>
                <td style="padding:6px; font-weight:bold;">Y/N</td>
                <td></td>
                <td style="padding:6px; font-weight:bold;">User Role</td>
                <td style="padding:6px; font-weight:bold;">Y/N</td>
            </tr>

            @foreach(['Accounts','Accounts Admin','Billing','Front Office','MIS','Histopathology','Sample Collection','Front Office Manager','Sales'] as $index => $role)
            <tr>
                <!-- Left Role -->
                <td style="padding:6px; font-weight:bold;">{{ $role }}</td>
                <td style="text-align:center;">
                    <input type="checkbox" name="roles[]" value="{{ $role }}">
                </td>

                <td></td>

                <!-- Right Role (only if exists) -->
                <td style="padding:6px; font-weight:bold;">
                    {{ ['Lab User','Customer care','Doctor','Quality Admin','Purchase','Front Office Supervisor','Collection Boy','Dispatch','Store'][$index] ?? '' }}
                </td>
                <td style="text-align:center;">
                    @if(isset(['Lab User','Customer care','Doctor','Quality Admin','Purchase','Front Office Supervisor','Collection Boy','Dispatch','Store'][$index]))
                    <input type="checkbox" name="roles[]" value="{{ ['Lab User','Customer care','Doctor','Quality Admin','Purchase','Front Office Supervisor','Collection Boy','Dispatch','Store'][$index] }}">
                    @endif
                </td>
            </tr>
            @endforeach

            <tr>
                <td colspan="5" style="padding:12px;">&nbsp;</td>
            </tr>
        </table>

        <br><br>

        <!-- Authorization Section -->
        <table style="width:100%; border-collapse: collapse;">
            <tr>
                <td style="padding:6px; font-weight:bold;">
                    Authorized by:<br>
                    <span style="font-weight:400;">(Name & Designation)</span>
                </td>
                <td><input type="text" name="authorized_by" style="width:100%; padding:4px;"></td>

                <td colspan="2" style="padding:6px; font-weight:bold;">Reason</td>
                <td><input type="text" name="reason" style="width:100%; padding:4px;"></td>
            </tr>

            <tr>
                <td colspan="5" style="text-align:center; padding:10px; font-weight:bold;">
                    To be filled by the IT Department
                </td>
            </tr>

            <tr>
                <td style="padding:6px; font-weight:bold;">Login Created:</td>
                <td><input type="text" name="login_created" style="width:100%; padding:4px;"></td>

                <td style="padding:6px; font-weight:bold;">Date:</td>
                <td colspan="2"><input type="date" name="created_date" style="width:100%; padding:4px;"></td>
            </tr>

            <tr>
                <td colspan="5" style="padding:12px;"></td>
            </tr>

            <tr>
                <td style="padding:6px; font-weight:bold;">Login Created by:</td>
                <td><input type="text" name="login_by" style="width:100%; padding:4px;"></td>

                <td style="padding:6px; font-weight:bold;">Sign:</td>
                <td colspan="2"><input type="text" name="sign" style="width:100%; padding:4px;"></td>
            </tr>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/IT/FOM-005"
        docNo="TDPL/IT/FOM-005"
        docName="LIMS User Role Access Matrix"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        
        <table>
            <tbody>
                <tr>
                    <td>
                        <p><strong>S. No.</strong></p>
                    </td>
                    <td>
                        <p><strong>Designation</strong></p>
                    </td>
                    <td>
                        <p><strong>User Role</strong></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p><strong>1</strong></p>
                    </td>
                    <td>
                        <p><span style="font-weight: 400;">Lab Technician</span></p>
                    </td>
                    <td>
                        <p><span style="font-weight: 400;">Lab User</span></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p><strong>2</strong></p>
                    </td>
                    <td>
                        <p><span style="font-weight: 400;">Lab Supervisor</span></p>
                    </td>
                    <td>
                        <p><span style="font-weight: 400;">Lab User, Store MGMT.</span></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p><strong>3</strong></p>
                    </td>
                    <td>
                        <p><span style="font-weight: 400;">Lab Manager</span></p>
                    </td>
                    <td>
                        <p><span style="font-weight: 400;">Lab User, Store MGMT.</span></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p><strong>4</strong></p>
                    </td>
                    <td>
                        <p><span style="font-weight: 400;">Pathologist</span></p>
                    </td>
                    <td>
                        <p><span style="font-weight: 400;">Lab User</span></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p><strong>5</strong></p>
                    </td>
                    <td>
                        <p><span style="font-weight: 400;">Store Executive</span></p>
                    </td>
                    <td>
                        <p><span style="font-weight: 400;">Store</span></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p><strong>6</strong></p>
                    </td>
                    <td>
                        <p><span style="font-weight: 400;">Store Manager</span></p>
                    </td>
                    <td>
                        <p><span style="font-weight: 400;">Store</span></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p><strong>7</strong></p>
                    </td>
                    <td>
                        <p><span style="font-weight: 400;">Lab Head</span></p>
                    </td>
                    <td>
                        <p><span style="font-weight: 400;">Lab User, Store MGMT.</span></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p><strong>8</strong></p>
                    </td>
                    <td>
                        <p><span style="font-weight: 400;">Quality Manager</span></p>
                    </td>
                    <td>
                        <p><span style="font-weight: 400;">Lab User, Store MGMT, Quality</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p>&nbsp;</p>
        <p><strong>Note</strong><span style="font-weight: 400;">: Access to the department is provided based on departmental assignment and responsibilities</span><span style="font-weight: 400;">.</span></p>
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