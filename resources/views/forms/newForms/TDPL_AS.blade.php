@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AS</title>
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
                <div style="font-size: 20px; ">AS </div>

            </div>
            <div class="icon-view">
                <div class="pc-content">
                    <div class="pc-folder" onclick="showSection('TDPL/AS/FOM-001')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Sample Volume Check Form</span>
                    </div>

                    <div class="pc-folder" onclick="showSection('TDPL/AS/REG-001')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Sample Receiving Register</span>
                    </div>

                    <div class="pc-folder" onclick="showSection('TDPL/AS/REG-003')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Sample Delivery Register</span>
                    </div>

                    <div class="pc-folder" onclick="showSection('TDPL/AS/REG-004')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Ice Gel Packs Distribution Register</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('TDPL/AS/REG-005')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Sample Outsource Register</span>
                    </div>

                </div>
            </div>
        </div>


        <x-formTemplete id="TDPL/AS/FOM-001" docNo="TDPL/AS/FOM-001" docName="Sample Volume Check Form" issueNo="2.0"
            issueDate="01/10/2024" buttonText="Submit" action="{{ route('as.forms.submit') }}">

            {{-- FORM BODY GOES HERE --}}

            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Month & Year:</strong>
                    <input type="month" name="month_year" id="monthYear" onchange="onMonthYearChange(this.value)"
                        class="form-control">


                </div>
                <div class="col-md-4">
                    <label><strong>Location</strong></label>
                    <select name="location" id="locationSelect" class="form-control">
                        <option value="">Select Location</option>
                        <option value="Hyderabad">Hyderabad</option>
                        <option value="Bangalore">Bangalore</option>
                        <option value="Chennai">Chennai</option>
                        <option value="Mumbai">Mumbai</option>
                        <option value="Delhi">Delhi</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label><strong>Department</strong></label>
                    <select name="department" id="departmentSelect" class="form-control">
                        <option value="">Select Department</option>
                        <option value="Pathology">Pathology</option>
                        <option value="Clinical Laboratory">Clinical Laboratory</option>
                        <option value="Biochemistry">Biochemistry</option>
                        <option value="Hematology">Hematology</option>
                        <option value="Microbiology">Microbiology</option>
                        <option value="Sample Collection">Sample Collection</option>
                        <option value="Diagnostics">Diagnostics</option>
                        <option value="Lab Operations">Lab Operations</option>
                    </select>
                </div>



            </div>

            <table class="table table-bordered w-100">
                <tbody>
                    <tr>
                        <td rowspan="2"><strong>Type of Container</strong></td>
                        <td rowspan="2"><strong>Required Sample Quantity (ml)</strong></td>
                        <td colspan="12"><strong>Date of Sample Volume Review</strong></td>
                    </tr>

                    <tr>
                        <td><strong>Jul</strong></td>
                        <td><strong>Aug</strong></td>
                        <td><strong>Sep</strong></td>
                        <td><strong>Oct</strong></td>
                        <td><strong>Nov</strong></td>
                        <td><strong>Dec</strong></td>
                        <td><strong>Jan</strong></td>
                        <td><strong>Feb</strong></td>
                        <td><strong>Mar</strong></td>
                        <td><strong>Apr</strong></td>
                        <td><strong>May</strong></td>
                        <td><strong>Jun</strong></td>
                    </tr>

                    {{-- Repeatable Row Template --}}
                    @php
                        $containers = [
                            'SST Gel Vial (Yellow Top)',
                            'Plain Vial (Red Top)',
                            'EDTA Vial (Lavender Top)',
                            'Sodium Fluoride Vial (Gray Top)',
                            'Sodium Citrate Vial (Blue Top)',
                            'Sodium Heparin Vial (Green Top)',
                        ];
                    @endphp
                    @foreach ($containers as $key => $item)
                        <tr>
                            <td>
                                <strong>{{ $item }}</strong>
                                <input type="hidden" name="containers[{{ $key }}][container_type]"
                                    value="{{ $item }}">
                            </td>

                            <td>
                                <input type="number" name="containers[{{ $key }}][required_qty]"
                                    class="form-control">
                            </td>

                            @foreach (['jul', 'aug', 'sep', 'oct', 'nov', 'dec', 'jan', 'feb', 'mar', 'apr', 'may', 'jun'] as $month)
                                <td>
                                    <input type="text"
                                        name="containers[{{ $key }}][actual_qty][{{ $month }}]"
                                        data-month="{{ $month }}" class="form-control">

                                </td>
                            @endforeach
                        </tr>
                    @endforeach

                    <tr>
                        <td><strong>Done By</strong></td>
                        <td colspan="13">
                            <input type="text" name="done_by" id="doneByInput" class="form-control">
                        </td>
                    </tr>

                    <tr>
                        <td><strong>Reviewed By</strong></td>
                        <td colspan="13">
                            <input type="text" name="reviewed_by" id="reviewedByInput" class="form-control">
                        </td>
                    </tr>

                </tbody>
            </table>

            <p><strong>Note:</strong>
                This random check is done once a month to track and record that the samples are collected up to the required
                mark indicated on the respective vials.
            </p>
        </x-formTemplete>

        <x-formTemplete id="TDPL/AS/REG-001" docNo="TDPL/AS/REG-001" docName="Sample Receiving Register" issueNo="2.0"
            issueDate="01/10/2024" buttonText="Submit" data-inline="true" action="{{ route('as.forms.submit') }}">
            <div class="row mb-3">
                <div class="col-md-2">
                    <label><strong>From Date</strong></label>
                    <input type="date" id="srFromDate" name="srFromDate" class="form-control"
                        onchange="loadSampleReceivingRegister()">
                </div>

                <div class="col-md-2">
                    <label><strong>To Date</strong></label>
                    <input type="date" id="srToDate" class="form-control" onchange="loadSampleReceivingRegister()">
                </div>

                <div class="col-md-2">
                    <label><strong>Location</strong></label>
                    <input list="srLocList" id="srLocation" name="srLocation" class="form-control"
                        onfocus="resetIfMatched(this)"
                        oninput="handleDatalistInput(this,'srLocList',loadSampleReceivingRegister)">
                    <datalist id="srLocList">
                        <option value="Hyderabad">
                        <option value="Bangalore">
                        <option value="Chennai">
                    </datalist>

                </div>

                <div class="col-md-2">
                    <label><strong>Department</strong></label>
                    <input list="srDeptList" id="srDepartment" name="srDepartment" class="form-control"
                        placeholder="All" oninput="handleDatalistInput(this,'srDeptList',loadSampleReceivingRegister)">
                    <datalist id="srDeptList">
                        <option value="Biochemistry">
                        <option value="Pathology">
                        <option value="Hematology">
                    </datalist>

                </div>

                <div class="col-md-2">
                    <label><strong>Equipment / TL Code</strong></label>
                    <input list="srEquipList" id="srEquipmentId" name="srEquipmentId" class="form-control"
                        placeholder="All" oninput="handleDatalistInput(this,'srEquipList',loadSampleReceivingRegister)">
                    <datalist id="srEquipList">
                        <option value="TL001">
                        <option value="TL002">
                    </datalist>

                </div>
            </div>




            {{-- MAIN FORM TABLE --}}
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Client Location</th>
                        <th>Client Name</th>
                        <th>TL Code</th>
                        <th># of Blood Samples</th>
                        <th># of Other Samples</th>
                        <th>CSR Name</th>
                        <th>CSR Sign</th>
                        <th>Sample Temperature</th>
                        <th>Receiver Name</th>
                        <th>Remarks</th>
                    </tr>
                </thead>

                <tbody id="srTableBody">
                    <tr>
                        <td>
                            <input type="date" name="date" class="form-control" required>
                        </td>

                        <td>
                            <input type="time" name="time" class="form-control" required>
                        </td>

                        <td>
                            <input type="text" name="client_location" class="form-control" required>
                        </td>

                        <td>
                            <input type="text" name="client_name" class="form-control" required>
                        </td>

                        <td>
                            <input type="text" name="tl_code" class="form-control">
                        </td>

                        <td>
                            <input type="number" name="blood_samples" class="form-control">
                        </td>

                        <td>
                            <input type="number" name="other_samples" class="form-control">
                        </td>

                        <td>
                            <input type="text" name="csr_name" class="form-control">
                        </td>

                        <td>
                            <input type="text" name="csr_sign" class="form-control">
                        </td>

                        <td>
                            <input type="text" name="sample_temp" class="form-control">
                        </td>

                        <td>
                            <input type="text" name="receiver_name" class="form-control">
                        </td>

                        <td>
                            <input type="text" name="remarks" class="form-control">
                        </td>
                    </tr>
                </tbody>
            </table>

        </x-formTemplete>


        <x-formTemplete id="TDPL/AS/REG-003" data-inline="true" docNo="TDPL/AS/REG-003"
            docName="Sample Delivery Register" issueNo="2.0" issueDate="01/10/2024" buttonText="Submit"
            action="{{ route('as.forms.submit') }}">
            <div class="row mb-3">
                <div class="col-md-2">
                    <label><strong>From Date</strong></label>
                    <input type="date" id="sdFromDate" class="form-control" onchange="loadSampleDeliveryRegister()">
                </div>

                <div class="col-md-2">
                    <label><strong>To Date</strong></label>
                    <input type="date" id="sdToDate" class="form-control" onchange="loadSampleDeliveryRegister()">
                </div>

                <div class="col-md-2">
                    <label><strong>Location</strong></label>

                    <input list="locList" id="sdLocation" name="sdLocation" class="form-control"
                        oninput="handleDatalistInput(this,'locList',loadSampleDeliveryRegister)">

                    <datalist id="locList">
                        <option value="Hyderabad">
                        <option value="Bangalore">
                        <option value="Chennai">
                    </datalist>
                </div>



                <div class="col-md-2">
                    <label><strong>Department</strong></label>
                    <input list="deptList" id="sdDepartment" name="sdDepartment" class="form-control" placeholder="All"
                        oninput="handleDatalistInput(this,'deptList',loadSampleDeliveryRegister)">

                    <datalist id="deptList">
                        <option value="Biochemistry">
                        <option value="Pathology">
                        <option value="Hematology">
                    </datalist>
                </div>

                <div class="col-md-2">
                    <label><strong>Equipment / TL Code</strong></label>

                    <input list="equipList" id="sdEquipmentId" name="sdEquipmentId" class="form-control"
                        placeholder="All" oninput="handleDatalistInput(this,'equipList',loadSampleDeliveryRegister)">

                    <datalist id="equipList">
                        <option value="TL001">
                        <option value="TL002">
                    </datalist>
                </div>

            </div>


            <table class="table table-bordered w-100">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Barcode</th>
                        <th>No. of Samples</th>
                        <th>Destination Department</th>
                        <th>Sample taken from Accession by @ time</th>
                        <th>Verified by</th>
                        <th>Sample delivered to Dept. by @ time</th>
                        <th>Sample Received at Dept. by @ time</th>
                        <th>Remarks</th>
                    </tr>
                </thead>

                <tbody id="sdTableBody">


                    {{-- Dynamic Empty Rows --}}

                    <tr>
                        <td><input type="date" name="date" class="form-control"></td>

                        <td><input type="text" name="barcode" class="form-control"></td>

                        <td><input type="number" name="samples" class="form-control"></td>

                        <td><input type="text" name="department" class="form-control"></td>

                        <td><input type="text" name="taken_from_accession" class="form-control"></td>

                        <td><input type="text" name="verified_by" class="form-control"></td>

                        <td><input type="text" name="delivered_to_dept" class="form-control">
                        </td>

                        <td><input type="text" name="received_at_dept" class="form-control">
                        </td>

                        <td><input type="text" name="remarks" class="form-control"></td>
                    </tr>


                </tbody>
            </table>

        </x-formTemplete>


        <x-formTemplete id="TDPL/AS/REG-004" docNo="TDPL/AS/REG-004" docName="Ice Gel Packs Distribution Register"
            data-inline="true" issueNo="2.0" issueDate="01/10/2024" buttonText="Submit"
            action="{{ route('as.forms.submit') }}">

            <div class="row mb-3">
                <div class="col-md-3">
                    <label><strong>From Date</strong></label>
                    <input type="date" id="igFromDate" class="form-control" onchange="loadIceGelRegister()">
                </div>

                <div class="col-md-3">
                    <label><strong>To Date</strong></label>
                    <input type="date" id="igToDate" class="form-control" onchange="loadIceGelRegister()">
                </div>

                <div class="col-md-3">
                    <label><strong>Location</strong></label>

                    <input list="locList" id="igLocation" name="igLocation" class="form-control"
                        oninput="handleDatalistInput(this,'locList',loadSampleDeliveryRegister)">

                    <datalist id="locList">
                        <option value="Hyderabad">
                        <option value="Bangalore">
                        <option value="Chennai">
                    </datalist>
                </div>

                <div class="col-md-3">
                    <label><strong>Department</strong></label>
                    <input list="deptList" id="igDepartment" name="igDepartment" class="form-control" placeholder="All"
                        oninput="handleDatalistInput(this,'deptList',loadSampleDeliveryRegister)">

                    <datalist id="deptList">
                        <option value="Biochemistry">
                        <option value="Pathology">
                        <option value="Hematology">
                    </datalist>
                </div>
            </div>

            <table border="1" cellspacing="0" cellpadding="6"
                style="width:100%; border-collapse: collapse; text-align:left;">
                <thead>
                    <tr>
                        <td rowspan="2"><strong>Date</strong></td>
                        <td rowspan="2"><strong>Quantity</strong></td>
                        <td rowspan="2"><strong>Handed over by (Name & Time)</strong></td>
                        <td rowspan="2"><strong>Received by (Name & Time)</strong></td>
                        <td colspan="2"><strong>Returned</strong></td>
                        <td rowspan="2"><strong>Remarks</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Yes</strong></td>
                        <td><strong>No</strong></td>
                    </tr>
                </thead>
                <tbody id="igTableBody">


                    {{-- Editable Rows --}}

                    <tr>
                        <td><input type="date" name="date" class="w-full border-0 focus:ring-0" /></td>
                        <td><input type="number" name="quantity" class="w-full border-0 focus:ring-0" /></td>
                        <td><input type="text" name="handed_over_by" class="w-full border-0 focus:ring-0"
                                placeholder="Name & Time" />
                        </td>
                        <td><input type="text" name="received_by" class="w-full border-0 focus:ring-0"
                                placeholder="Name & Time" />
                        </td>

                        <td style="text-align:center">
                            <input type="radio" name="returned" value="yes">
                        </td>

                        <td style="text-align:center">
                            <input type="radio" name="returned" value="no">
                        </td>


                        <td>
                            <textarea name="remarks" class="w-full border-0 focus:ring-0" rows="1"></textarea>
                        </td>
                    </tr>


                </tbody>
            </table>

        </x-formTemplete>


        <x-formTemplete id="TDPL/AS/REG-005" docNo="TDPL/AS/REG-005" docName="Sample Outsource Register" issueNo="2.0"
            issueDate="01/10/2024" buttonText="Submit" action="{{ route('as.forms.submit') }}">

            <!-- =================== FILTER SECTION (ONCHANGE ONLY) =================== -->
            <div class="row mb-3">
                <div class="col-md-2">
                    <label><strong>From Date</strong></label>
                    <input type="date" id="soFromDate" class="form-control" onchange="loadSampleOutsourceRegister()">
                </div>

                <div class="col-md-2">
                    <label><strong>To Date</strong></label>
                    <input type="date" id="soToDate" class="form-control" onchange="loadSampleOutsourceRegister()">
                </div>

                <div class="col-md-2">
                    <label><strong>Location</strong></label>

                    <input list="locList" id="soLocation" name="soLocation" class="form-control"
                        oninput="handleDatalistInput(this,'locList',loadSampleDeliveryRegister)">

                    <datalist id="locList">
                        <option value="Hyderabad">
                        <option value="Bangalore">
                        <option value="Chennai">
                    </datalist>
                </div>

                <div class="col-md-2">
                    <label><strong>Department</strong></label>
                    <input list="deptList" id="soDepartment" name="soDepartment" class="form-control" placeholder="All"
                        oninput="handleDatalistInput(this,'deptList',loadSampleDeliveryRegister)">

                    <datalist id="deptList">
                        <option value="Biochemistry">
                        <option value="Pathology">
                        <option value="Hematology">
                    </datalist>
                </div>

                <div class="col-md-2">
                    <label><strong>Equipment / TL Code</strong></label>
                    <input list="equipList" id="soEquipmentId" name="soEquipmentId" class="form-control"
                        placeholder="All" oninput="handleDatalistInput(this,'equipList',loadSampleDeliveryRegister)">

                    <datalist id="equipList">
                        <option value="TL001">
                        <option value="TL002">
                    </datalist>

                </div>
            </div>

            <br>

            <!-- =================== MAIN DATA TABLE =================== -->
            <table border="1" cellspacing="0" cellpadding="6"
                style="width:100%; border-collapse: collapse; text-align:left;">
                <thead>
                    <tr>
                        <td><strong>Date</strong></td>
                        <td><strong>Barcode</strong></td>
                        <td><strong>Patient Name</strong></td>
                        <td><strong>Department</strong></td>
                        <td><strong>Test Name & Code</strong></td>
                        <td><strong>Sample Handover Sign, Date & Time (Accession)</strong></td>
                        <td><strong>Sample Receiver Sign, Date & Time (Front Office)</strong></td>
                        <td><strong>Sample Handover to OS Lab By</strong></td>
                        <td><strong>OS Lab Receiver Name, Sign, Date & Time</strong></td>
                    </tr>
                </thead>

                <tbody id="soTableBody">

                    {{-- ================= VIEW MODE (BLADE LOOP) ================= --}}
                    @isset($records)
                        @forelse($records as $row)
                            <tr>
                                <td>{{ $row->date }}</td>
                                <td>{{ $row->bar_code }}</td>
                                <td>{{ $row->patient_name }}</td>
                                <td>{{ $row->department }}</td>
                                <td>{{ $row->testname_code }}</td>
                                <td>{{ $row->sample_handover_sign }}</td>
                                <td>{{ $row->sample_receiver_sign }}</td>
                                <td>{{ $row->sample_handover_to_os }}</td>
                                <td>{{ $row->os_lab_receiver_name }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">No records found</td>
                            </tr>
                        @endforelse
                    @endisset

                    {{-- ================= ENTRY ROW (UNCHANGED) ================= --}}
                    <tr>
                        <td><input type="date" name="date" class="w-full border-0"></td>
                        <td><input type="text" name="bar_code" class="w-full border-0"></td>
                        <td><input type="text" name="patient_name" class="w-full border-0"></td>
                        <td><input type="text" name="department" class="w-full border-0"></td>
                        <td>
                            <textarea class="w-full border-0" name="testname_code" rows="1"></textarea>
                        </td>
                        <td>
                            <textarea class="w-full border-0" name="sample_handover_sign" rows="1"></textarea>
                        </td>
                        <td>
                            <textarea class="w-full border-0" name="sample_receiver_sign" rows="1"></textarea>
                        </td>
                        <td><input type="text" class="w-full border-0" name="sample_handover_to_os"></td>
                        <td>
                            <textarea class="w-full border-0" name="os_lab_receiver_name" rows="1"></textarea>
                        </td>
                    </tr>

                </tbody>
            </table>

            <br>
            <p><em>*OS = Outsource</em></p>

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
            // 🔥 MANUAL LOAD (on open)

        }

        function goBack() {
            // 🔥 Full page refresh to clear:
            // - filters
            // - JS state
            // - fetched table data
            // - active/inactive sections
            window.location.reload();
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

        // // Submit form data
        // document.getElementById('submitBtn1').addEventListener('click', function() {
        //     // Get analyzer data
        //     // const analyzerRows = document.querySelectorAll('#analyzerTable tbody tr');
        //     // const analyzerData = {
        //     //     department: analyzerRows[0].cells[1].textContent.trim(),
        //     //     analyzer_sr_no: analyzerRows[1].cells[1].textContent.trim(),
        //     //     analyzer_type: analyzerRows[2].cells[1].textContent.trim(),
        //     //     validation: analyzerRows[3].cells[1].textContent.trim(),
        //     //     remarks: analyzerRows[5].cells[1].textContent.trim()
        //     // };

        //     // Get tests data
        //     const testRows = document.querySelectorAll('#testsTable tbody tr');
        //     const testsData = [];

        //     testRows.forEach(row => {
        //         const cells = row.cells;
        //         testsData.push({
        //             sr_no: cells[0].textContent.trim(),
        //             device: cells[1].textContent.trim(),
        //             assay_code: cells[2].textContent.trim(),
        //             test_name: cells[3].textContent.trim(),
        //             equipment: cells[4].textContent.trim(),
        //             lis: cells[5].textContent.trim()
        //         });
        //     });

        //     // Prepare complete data
        //     const formData = {
        //         // analyzer: analyzerData,
        //         tests: testsData
        //     };

        //     // Send to server
        //     fetch('/lis-interface-logs-store', {
        //             method: 'POST',
        //             headers: {
        //                 'Content-Type': 'application/json',
        //                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        //             },
        //             body: JSON.stringify(formData)
        //         })
        //         .then(response => response.json())
        //         .then(data => {
        //             if (data.success) {
        //                 alert('Data saved successfully!');
        //             } else {
        //                 alert('Error: ' + (data.message || 'Failed to save data'));
        //             }
        //         })
        //         .catch(error => {
        //             console.error('Error:', error);
        //             alert('Failed to save data');
        //         });
        // });

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

    /**
     * ✅ EVENT DELEGATION
     * Works even if form is shown later
     */
    document.addEventListener('change', function(e) {
        // Only react to Month & Year input
        if (e.target && e.target.id === 'monthYear') {

            const monthYear = e.target.value;
            if (!monthYear) return;

            fetch(`/as/sample-volume-check/load?month_year=${monthYear}`)
                .then(res => res.json())
                .then(res => {

                    // Clear month cells
                    document.querySelectorAll('input[data-month]').forEach(i => i.value = '');

                    // Clear required qty
                    document.querySelectorAll('input[name*="[required_qty]"]').forEach(i => i.value = '');

                    if (!res.data) return;

                    Object.keys(res.data).forEach(containerType => {

                        const row = [...document.querySelectorAll('tr')]
                            .find(tr => tr.textContent.includes(containerType));

                        if (!row) return;

                        // Required qty
                        const reqInput = row.querySelector('input[name*="[required_qty]"]');
                        if (reqInput && res.data[containerType].required_qty) {
                            reqInput.value = res.data[containerType].required_qty;
                        }

                        // Month value
                        Object.keys(res.data[containerType]).forEach(monthKey => {

                            if (monthKey === 'required_qty') return;

                            const cell = row.querySelector(
                                `input[data-month="${monthKey}"]`
                            );

                            if (cell) {
                                cell.value = res.data[containerType][monthKey];
                            }
                        });
                    });
                })
                .catch(err => console.error(err));
        }
    });

    function onMonthYearChange(monthYear) {

        if (!monthYear) return;

        fetch(`/as/sample-volume-check/load?month_year=${monthYear}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('HTTP error ' + response.status);
                }
                return response.json();
            })
            .then(res => {
                // ✅ Location
                if (res.location !== null) {
                    document.getElementById('locationSelect').value = res.location;
                }

                // ✅ Department
                if (res.department !== null) {
                    document.getElementById('departmentSelect').value = res.department;
                }

                // ✅ Done By
                if (res.done_by !== null) {
                    document.getElementById('doneByInput').value = res.done_by;
                }

                // ✅ Reviewed By
                if (res.reviewed_by !== null) {
                    document.getElementById('reviewedByInput').value = res.reviewed_by;
                }

                // Clear old values
                document.querySelectorAll('input[data-month]').forEach(i => i.value = '');
                document.querySelectorAll('input[name*="[required_qty]"]').forEach(i => i.value = '');

                if (!res.data || Object.keys(res.data).length === 0) return;

                // Fill container rows
                Object.keys(res.data).forEach(containerType => {

                    const row = [...document.querySelectorAll('tr')]
                        .find(tr => tr.textContent.includes(containerType));

                    if (!row) return;

                    // Required qty
                    const reqInput = row.querySelector('input[name*="[required_qty]"]');
                    if (reqInput && res.data[containerType].required_qty) {
                        reqInput.value = res.data[containerType].required_qty;
                    }

                    // Month values
                    Object.keys(res.data[containerType]).forEach(monthKey => {

                        if (monthKey === 'required_qty') return;

                        const cell = row.querySelector(
                            `input[data-month="${monthKey}"]`
                        );

                        if (cell) {
                            cell.value = res.data[containerType][monthKey];
                        }
                    });
                });
            })
            .catch(err => {
                console.error('Load failed:', err);
                alert('Load failed');
            });
    }

    function loadSampleReceivingRegister() {
        const fromDate = document.getElementById('srFromDate').value;
        const toDate = document.getElementById('srToDate').value;
        const location = document.getElementById('srLocation').value;
        const department = document.getElementById('srDepartment').value;
        const equipment = document.getElementById('srEquipmentId').value;

        fetch(
                `/as/sample-receiving-register/load?from_date=${fromDate}&to_date=${toDate}&location=${location}&department=${department}&equipment=${equipment}`
            )
            .then(res => res.json())
            .then(res => {
                const tbody = document.querySelector('#srTableBody');
                renderTableRows(tbody, res.data, 'SR');
            })
            .catch(err => console.error(err));
    }

    function loadSampleDeliveryRegister() {

        const fromDate = document.getElementById('sdFromDate').value;
        const toDate = document.getElementById('sdToDate').value;
        const location = document.getElementById('sdLocation').value;
        const department = document.getElementById('sdDepartment').value;
        const equipment = document.getElementById('sdEquipmentId').value;

        fetch(
                `/as/sample-delivery-register/load` +
                `?from_date=${fromDate}` +
                `&to_date=${toDate}` +
                `&location=${location}` +
                `&department=${department}` +
                `&equipment=${equipment}`
            )
            .then(res => res.json())
            .then(res => {
                const tbody = document.getElementById('sdTableBody');
                renderTableRows(tbody, res.data, 'SD');
            })
            .catch(err => console.error(err));
    }


    function loadIceGelRegister() {

        const fromDate = document.getElementById('igFromDate').value;
        const toDate = document.getElementById('igToDate').value;
        const location = document.getElementById('igLocation').value;
        const department = document.getElementById('igDepartment').value;

        fetch(
                `/as/ice-gel-register/load` +
                `?from_date=${fromDate}` +
                `&to_date=${toDate}` +
                `&location=${location}` +
                `&department=${department}`
            )
            .then(res => res.json())
            .then(res => {
                const tbody = document.getElementById('igTableBody');
                renderTableRows(tbody, res.data, 'IG');
            })
            .catch(err => console.error(err));
    }

    function loadSampleOutsourceRegister() {

        const fromDate = document.getElementById('soFromDate').value;
        const toDate = document.getElementById('soToDate').value;
        const location = document.getElementById('soLocation').value;
        const department = document.getElementById('soDepartment').value;
        const equipment = document.getElementById('soEquipmentId').value;

        fetch(
                `/as/sample-outsource-register/load` +
                `?from_date=${fromDate}` +
                `&to_date=${toDate}` +
                `&location=${location}` +
                `&department=${department}` +
                `&equipment=${equipment}`
            )
            .then(res => res.json())
            .then(res => {
                const tbody = document.querySelector('#soTableBody');
                renderTableRows(tbody, res.data, 'SO');
            })
            .catch(err => console.error(err));
    }

    function renderTableRows(tbody, rows, type) {

        tbody.replaceChildren();

        if (!rows || rows.length === 0) {
            const tr = document.createElement('tr');
            const td = document.createElement('td');
            td.colSpan = tbody.closest('table').rows[0].cells.length;
            td.className = 'text-center';
            td.textContent = 'No records found';
            tr.appendChild(td);
            tbody.appendChild(tr);
            return;
        }

        rows.forEach((row, index) => {

            const tr = document.createElement('tr');

            // ✅ Hidden ID inside TD
            const idTd = document.createElement('td');
            idTd.style.display = 'none';

            const idInput = document.createElement('input');
            idInput.type = 'hidden';
            idInput.name = `rows[${index}][id]`;
            idInput.value = row.id;

            idTd.appendChild(idInput);
            tr.appendChild(idTd);

            getColumns(type).forEach(col => {
                tr.appendChild(
                    createCell(col, row[col], index, fullRow = row)
                );
            });

            tbody.appendChild(tr);
        });
    }


    function getColumns(type) {

        const map = {
            SR: [
                'date', 'time', 'client_location', 'client_name', 'tl_code',
                'blood_samples', 'other_samples', 'csr_name', 'csr_sign',
                'sample_temp', 'receiver_name', 'remarks'
            ],
            SD: [
                'date', 'barcode', 'samples', 'department', 'taken_from_accession',
                'verified_by', 'delivered_to_dept', 'received_at_dept', 'remarks'
            ],
            IG: [
                'date', 'quantity', 'handed_over_by', 'received_by',
                'returned_yes', 'returned_no', 'remarks'
            ],
            SO: [
                'date', 'bar_code', 'patient_name', 'department', 'testname_code',
                'sample_handover_sign', 'sample_receiver_sign',
                'sample_handover_to_os', 'os_lab_receiver_name'
            ]
        };

        return map[type];
    }

    function createCell(name, value, rowIndex, fullRow = {}) {

        const td = document.createElement('td');

        // ICE GEL RADIO
        if (name === 'returned_yes' || name === 'returned_no') {

            const radio = document.createElement('input');
            radio.type = 'radio';
            radio.name = `rows[${rowIndex}][returned]`;

            if (name === 'returned_yes') {
                radio.value = 'yes';
                radio.checked = fullRow.returned === 'yes';
            }

            if (name === 'returned_no') {
                radio.value = 'no';
                radio.checked = fullRow.returned === 'no';
            }

            td.appendChild(radio);
            return td;
        }

        // NORMAL INPUT
        const input = document.createElement('input');
        input.className = 'w-full border-0';
        input.name = `rows[${rowIndex}][${name}]`; // ✅ KEY FIX
        input.value = value ?? '';

        td.appendChild(input);
        return td;
    }

    function handleDatalistInput(inputEl, datalistId, callback) {
        const value = inputEl.value;

        const options = document.querySelectorAll(`#${datalistId} option`);
            const matched = [...options].some(opt => opt.value === value);

            // ✅ ONLY dropdown select
            if (matched && typeof callback === 'function') {

                callback(); // apply filter / load data

            }
        }


        function handleFormSubmit(event, form) {

            if (form.hasAttribute('data-inline')) {
                event.preventDefault();

                const formData = new FormData(form);

                fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: formData
                    })
                    .then(res => res.json())
                    .then(res => {
                        if (res.success) {
                            const srTable = document.getElementById('srTableBody');
                            if (srTable && res.data) {
                                renderTableRows(srTable, res.data, 'SR');
                            }
                        }
                    })
                    .catch(err => console.error(err));

                return false; // 🔴 VERY IMPORTANT
            }

            return true; // 🟢 allow normal submit
        }
    </script>

    </html>
@endsection
