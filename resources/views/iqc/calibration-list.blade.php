@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Calibration Setup</title>
        <style>
            .table-container-Calibration {

                width: 100%;

                background: #fff;
                border-radius: 10px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                overflow: hidden;
            }

            .table-container-Calibration table {
                width: 100%;
                border-collapse: collapse;
            }

            .table-container-Calibration thead {
                background-color: #4caf50;
                color: #fff;
            }

            .table-container-Calibration thead th {
                padding: 15px;
                text-align: left;
                font-size: 16px;
                text-transform: uppercase;
            }

            .table-container-Calibration tbody tr:nth-child(odd) {
                background-color: #f9f9f9;
            }

            .table-container-Calibration tbody tr:nth-child(even) {
                background-color: #eaf5ea;
            }

            .table-container-Calibration td,
            .table-container-Calibration th {
                padding: 12px 15px;
                border: 1px solid #ddd;
            }

            .table-container-Calibration tbody td {
                font-size: 14px;
            }

            .table-container-Calibration tbody tr:hover {
                background-color: #d4ebd4;
                cursor: pointer;
            }

            .proto-high {
                background: #b70000;
                padding: 5px;
                border-radius: 10px;
                font-weight: 700;
                color: white;
                margin: .5rem;
            }

            .proto-medi {
                background: #b4b700;
                padding: 5px;
                border-radius: 10px;
                font-weight: 700;
                color: white;
                margin: .5rem;
            }

            .proto-low {
                background: #25af03;
                padding: 5px;
                border-radius: 10px;
                font-weight: 700;
                color: white;
                margin: .5rem;
            }


            .form-container-sub {
                margin-top: 1rem;
                /* background: #fff; */
                padding: 20px 30px;
                border-radius: 8px;
                box-shadow: 0 4px 11px 11px rgba(0, 0, 0, 0.1);
                width: 99%;
                margin-bottom: 1rem;
            }

            .form-container-sub h2 {
                margin-bottom: 20px;
                color: #333;
                text-align: center;
            }

            .form-container-sub form {
                display: flex;
                /* flex-direction: column; */
            }

            .form-container-sub label {
                margin-bottom: 5px;
                /* color: #555; */
                font-weight: 700;
                width: 100%;
                font-size: 14px;
            }

            .form-container-sub input,
            .form-container-sub select,
            .form-container-sub textarea {
                margin-bottom: 15px;
                padding: 10px;
                font-size: 14px;
                border: 1px solid #ccc;
                border-radius: 4px;
                outline: none;
                transition: all 0.3s ease;
                width: 100%;
            }

            .form-container-sub input:focus,
            .form-container-sub select:focus {
                border-color: #007bff;
                box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            }

            .form-container-sub button {
                padding: 10px 15px;
                font-size: 16px;
                color: #fff;
                margin: 1rem 0;
                background-color: #007bff;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            .form-container-sub button:hover {
                background-color: #0056b3;
            }

            .form-container-sub input[type="file"] {
                padding: 5px;
                width: 100%;
            }

            .sub-table-header td {
                background-color: rgb(15, 27, 134);
                color: white;
                font-weight: 700;
                padding: .5rem;

            }

            .ilc-modal {
                display: none;
                position: fixed;
                z-index: 1;
                left: 0;
                top: 0;
                width: 100%;
                height: calc(100vh);
                background-color: rgba(0, 0, 0, 0.4);
                overflow: auto;
            }

            .ilc-modal-content {
                background-color: #fefefe;
                margin: 8% auto;
                padding: 20px;
                border: 1px solid #888;
                width: 80%;
                overflow: auto;
            }

            .ilc-close {
                color: #aaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }

            .ilc-close:hover,
            .ilc-close:focus {
                color: black;
                text-decoration: none;
                cursor: pointer;
            }

            .ilc-selected-items {
                margin-top: 10px;
            }

            .selection {
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
            }

            #ControlParameterTaggingTable select {
                width: 100%;
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }

            #ControlParameterTaggingTable a {
                color: #36c !important;
                text-decoration: none !important;
            }

            #ControlParameterTaggingTable a:hover {
                text-decoration: underline !important;
            }


            .checkbox-wrapper-46 input[type="checkbox"] {
                display: none;
                visibility: hidden;
            }

            .checkbox-wrapper-46 .cbx {
                margin: auto;
                -webkit-user-select: none;
                user-select: none;
                cursor: pointer;
            }

            .checkbox-wrapper-46 .cbx span {
                display: inline-block;
                vertical-align: middle;
                transform: translate3d(0, 0, 0);
            }

            .checkbox-wrapper-46 .cbx span:first-child {
                position: relative;
                width: 18px;
                height: 18px;
                border-radius: 3px;
                transform: scale(1);
                vertical-align: middle;
                border: 1px solid #9098a9;
                transition: all 0.2s ease;
            }

            .checkbox-wrapper-46 .cbx span:first-child svg {
                position: absolute;
                top: 3px;
                left: 2px;
                fill: none;
                stroke: #ffffff;
                stroke-width: 2;
                stroke-linecap: round;
                stroke-linejoin: round;
                stroke-dasharray: 16px;
                stroke-dashoffset: 16px;
                transition: all 0.3s ease;
                transition-delay: 0.1s;
                transform: translate3d(0, 0, 0);
            }

            .checkbox-wrapper-46 .cbx span:first-child:before {
                content: "";
                width: 100%;
                height: 100%;
                background: #506eec;
                display: block;
                transform: scale(0);
                opacity: 1;
                border-radius: 50%;
            }

            .checkbox-wrapper-46 .cbx span:last-child {
                padding-left: 8px;
            }

            .checkbox-wrapper-46 .cbx:hover span:first-child {
                border-color: #506eec;
            }

            .checkbox-wrapper-46 .inp-cbx:checked+.cbx span:first-child {
                background: #506eec;
                border-color: #506eec;
                animation: wave-46 0.4s ease;
            }

            .checkbox-wrapper-46 .inp-cbx:checked+.cbx span:first-child svg {
                stroke-dashoffset: 0;
            }

            .checkbox-wrapper-46 .inp-cbx:checked+.cbx span:first-child:before {
                transform: scale(3.5);
                opacity: 0;
                transition: all 0.6s ease;
            }

            @keyframes wave-46 {
                50% {
                    transform: scale(0.9);
                }
            }

            .panel1 {

                overflow: auto;
                top: 50px;
                position: fixed;
                /* top: 0; */
                right: -100%;
                width: calc(100% - 120px);
                height: 90%;
                background: #f8f9fa;
                box-shadow: -2px 0px 5px rgba(0, 0, 0, 0.3);
                padding: 0 20px;
                transition: 0.5s ease;
            }

            .panel1.open {
                right: 0;
                bottom: 0;
                margin: 20px;
                z-index: 1000;
            }

            .closeBtn1 {
                /* overflow: auto; */
                top: 52px;
                position: fixed;
                /* top: 0; */
                right: -100%;
                width: 30px;
                height: 30px;
                background: #ff2222;
                padding: 5px;
                transition: 0.5s ease;
                border-radius: 50% 0 0 50%;
                display: flex;
                align-items: center;
                justify-content: space-evenly;
                color: #f8f9fa;
                font-weight: 700;
                cursor: pointer;
            }

            .closeBtn1.opened {
                right: calc(100% - 100px);
                top: 100px;
                z-index: 1000;
            }

            .form-section-unique {
                margin-bottom: 20px;
            }

            .parameter-table-unique {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            .parameter-table-unique,
            .parameter-table-unique th,
            .parameter-table-unique td {
                border: 1px solid #ddd;
            }

            .parameter-table-unique th,
            .parameter-table-unique td {
                padding: 10px;
                text-align: left;
            }

            .parameter-table-unique select {
                width: 100%;
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }

            .add-row-btn-unique {
                margin-top: 10px;
                padding: 10px 20px;
                background-color: #007BFF;
                color: white;
                border: none;
                cursor: pointer;
            }

            .add-row-btn-unique:hover {
                background-color: #0056b3;
            }

            .ilc-container {

                padding: 20px;
                background: #fff;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
            }

            .ilc-title {
                text-align: center;
                color: #333;
            }

            .ilc-filter-section {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 20px;
            }

            .ilc-filter-section select,
            input {
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }

            .ilc-table {
                width: 100%;
                border-collapse: collapse;
            }

            .ilc-table th,
            .ilc-table td {
                border: 1px solid #ddd;
                padding: 10px;
                text-align: center;
            }

            .ilc-table th {
                background-color: #f4f4f4;
                color: #333;
            }

            .ilc-add-new {
                display: flex;
                justify-content: flex-end;
                margin-top: 20px;
            }

            .ilc-add-new button {
                padding: 10px 20px;
                background-color: #007BFF;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
            }

            .ilc-add-new button:hover {
                background-color: #0056b3;
            }

            .frequency-checkbox {
                display: flex;
                flex-wrap: wrap;
                gap: 5px;
                justify-content: center;
            }

            .frequency-checkbox label {
                display: flex;
                align-items: center;
                gap: 5px;
            }

            .form-container-sub {
                margin-top: 1rem;
                /* background: #fff; */
                padding: 20px 30px;
                border-radius: 8px;
                box-shadow: 0 4px 11px 11px rgba(0, 0, 0, 0.1);
                width: 99%;

            }

            .form-container-sub h2 {
                margin-bottom: 20px;
                color: #333;
                text-align: center;
            }

            .form-container-sub form {
                display: flex;
                /* flex-direction: column; */
            }

            .form-container-sub label {
                margin-bottom: 5px;
                /* color: #555; */
                font-weight: 700;
                width: 100%;
                font-size: 14px;
            }

            .form-container-sub input,
            .form-container-sub select,
            .form-container-sub textarea {
                margin-bottom: 15px;
                padding: 10px;
                font-size: 14px;
                border: 1px solid #ccc;
                border-radius: 4px;
                outline: none;
                transition: all 0.3s ease;
                width: 100%;
            }

            .form-container-sub input:focus,
            .form-container-sub select:focus {
                border-color: #007bff;
                box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            }

            .form-container-sub button {
                padding: 10px 15px;
                font-size: 16px;
                color: #fff;
                margin: 1rem 0;
                background-color: #007bff;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            .form-container-sub button:hover {
                background-color: #0056b3;
            }

            .form-container-sub input[type="checkbox"] {
                padding: 5px;
                width: 28px;
                height: 19px;
            }

            /* Modal styling */
            .ilc-modal {
                display: none;
                /* Hidden by default */
                position: fixed;
                z-index: 1000;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgba(0, 0, 0, 0.5);
                /* Semi-transparent background */
            }

            .ilc-modal-content {
                background-color: #fff;
                margin: 10% auto;
                padding: 20px;
                border: 1px solid #888;
                width: 80%;
                max-width: 600px;
                border-radius: 8px;
            }

            /* Close button styling (optional) */
            .close-modal-btn {
                color: #aaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }

            .close-modal-btn:hover,
            .close-modal-btn:focus {
                color: black;
                text-decoration: none;
                cursor: pointer;
            }
        </style>
    </head>

    <body>
        <div class="main ">
            <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
                <div style="font-size: 20px;">Calibration - Parameter Tagging</div>
                <div style="font-size: 20px; gap:10px" class='d-flex'>
                    <select class='form-control' id="labDropdown">
                        <option value="">-- Select Labs --</option>
                        @foreach ($locations as $lab)
                            <option value="{{ $lab->id }}">{{ $lab->location }}</option>
                        @endforeach
                    </select>
                    <button type="button" class="btn btn-warning">Submit</button>
                </div>
            </div>

            <div class="table-container-Calibration">
                <table id="ControlParameterTaggingTable">
                    <thead>
                        <tr>
                            <th>Department</th>
                            <th>Calibration Manufacturer</th>
                            <th>Calibration Name</th>
                            <th>Suitable Machine</th>
                            <th>Parameter</th>
                            <th>Usage</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <!-- Rows will be dynamically populated here -->
                    </tbody>
                </table>
                <button type="button" class="btn btn-primary" style="float: right; margin:1rem;" onclick="addNewRow()">New
                    Row</button>
            </div>
        </div>
        <div id="documentClose1" class="closeBtn1" onclick="documentClose1()">
            X
        </div>
        <div id="documentOpen1" class="panel1">
            <div style="position: relative; ">
                <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4"
                    style="margin-top: 0.6rem;">
                    <div style="font-size: 20px;" id='documentPanel1Heading'> Planner </div>
                    <div style="font-size: 20px; gap:10px" class='d-flex'>

                        <button type="button" class="btn btn-warning">Submit</button>
                    </div>
                </div>
            </div>
            <div class="form-container-sub">
                <form class="row">
                    <div class="col-md-3">
                        <label for="name">Department</label>
                        <input type="text" name="name" disabled>
                    </div>
                    <div class="col-md-3">
                        <label for="email">Control Manufacturer</label>
                        <input type="text" name="email" disabled>
                    </div>
                    <div class="col-md-3">
                        <label for="name">Control Name</label>
                        <input type="text" name="name" disabled>
                    </div>
                    <div class="col-md-3">
                        <label for="email">Suitable Machine</label>
                        <input type="text" name="email" disabled>
                    </div>
                </form>
            </div>

            <div class="form-container-sub">
                <div class="table-container-Control">
                    <table id="ControlParameterUsageTable">
                        <thead>
                            <tr>
                                <th rowspan="2">
                                    Control Kit Qty
                                </th>
                                <th rowspan="2">
                                    Per Bottle Qty
                                </th>
                                <th rowspan="2">
                                    Micro Liters
                                </th>
                                <th colspan="2">
                                    Machine Aspiration Required Qty
                                </th>
                            </tr>
                            <tr>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <span style="border-radius:3px;border: 2px solid lightgray; padding:10px ;">12</span>
                                    X <span style="border-radius:3px;border: 2px solid lightgray; padding:10px">12</span>
                                    <span
                                        style="border-radius:3px;border: 2px solid lightgray; padding:10px ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                </td>
                                <td>
                                    <span style="border-radius:3px;border: 2px solid lightgray; padding:10px ;">12
                                        ml</span>

                                </td>
                                <td>
                                    <span style="border-radius:3px;border: 2px solid lightgray; padding:10px ;">12
                                        μl</span>

                                </td>
                                <td>
                                    <span style="border-radius:3px;border: 2px solid lightgray; padding:10px ;">12
                                    </span>

                                </td>
                                <td>
                                    <div class="instance">
                                        <button class="open-modal-btn btn btn-info mb-4">Select</button>
                                        <div class="selection"></div>

                                        <!-- Modal -->
                                        <div class="ilc-modal">
                                            <div class="ilc-modal-content">
                                                <input type="text" id="searchInput" class="search-input"
                                                    style="width: 40%; margin:0.5rem"
                                                    placeholder="Search for Test Codes or Names" onkeyup="searchTable()">
                                                <table class="table" style="max-width: 500px;     margin: auto;">
                                                    <thead>
                                                        <tr>

                                                            <th>Parameter</th>
                                                            <th>Aspiration Qty in μl</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>

                                                            <td>Test One</td>
                                                            <td style="width: 1rem;"><input type="number" name="" id="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Test Two</td>
                                                            <td style="width: 1rem;"><input type="number" name="" id="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Test Three</td>
                                                            <td style="width: 1rem;"><input type="number" name="" id="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Test Four</td>
                                                            <td style="width: 1rem;"><input type="number" name="" id="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Test Five</td>
                                                            <td style="width: 1rem;"><input type="number" name="" id="">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <button class="confirm-selection btn btn-primary">Confirm
                                                    Selection</button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>

            <div class="form-container-sub">
                <form class="row">
                    <div class="col-md-3">
                        <label for="name">Required Qty Per Month</label>
                        <input type="text" name="name">
                    </div>
                    <div class="col-md-6 row">
                        <label class="col-md-12" for="email" style="text-align: center;">Required Qty Per Year</label>
                        <div class="col-md-6">
                            <label for="email">In Bottles</label>
                            <input type="text" name="email">
                        </div>
                        <div class="col-md-6">
                            <label for="email">In Kits</label>
                            <input type="text" name="email">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="name"> Total Amount Per Year</label>
                        <input type="text" name="name">
                    </div>
                    <button type="button" class="btn btn-primary" style="float: right;margin:1rem;">Close</button>

                </form>
            </div>
        </div>
    </body>

    </html>
    <script>
        let selectedLabData = null; // Global variable to store lab data

        $(document).ready(function () {
            // Lab dropdown change event
            $('#labDropdown').change(function () {
                const labId = $(this).val();
                if (labId) {
                    // Fetch data for the selected lab
                    $.ajax({
                        url: '/get-lab-dropdown-data', // Replace with your Laravel route
                        type: 'GET',
                        data: {
                            labId: labId
                        },
                        success: function (response) {
                            if (response.success) {
                                // Store the lab data globally
                                selectedLabData = response.data;

                                // Clear existing rows
                                $('#tableBody').html('');

                                // Add a new row with dropdowns populated with the fetched data
                                addNewRow(selectedLabData);
                            } else {
                                alert('No data found for the selected lab.');
                            }
                        },
                        error: function (xhr) {
                            alert('An error occurred while fetching lab data.');
                        }
                    });
                } else {
                    // Clear the table if no lab is selected
                    $('#tableBody').html('');
                    selectedLabData = null; // Reset the global lab data
                }
            });

            // Add new row when "New Row" button is clicked
            $('button[onclick="addNewRow()"]').click(function () {
                if (selectedLabData) {
                    addNewRow(selectedLabData); // Add a new row with the selected lab's data
                } else {
                    alert('Please select a lab first.');
                }
            });

            // Function to add a new row with dropdowns
            function addNewRow(data = null) {
                let row = `
                                                    <tr>
                                                        <td>
                                                            <select class="form-control department">
                                                                <option value="">-- Select Department --</option>
                                                                ${data && data.departments ? data.departments.map(dept => `<option value="${dept}">${dept}</option>`).join('') : ''}
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control manufacturer">
                                                                <option value="">-- Select Manufacturer --</option>
                                                                ${data && data.manufacturers ? data.manufacturers.map(manu => `<option value="${manu}">${manu}</option>`).join('') : ''}
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control calibration-name">
                                                                <option value="">-- Select Calibration Name --</option>
                                                                ${data && data.manufacturers ? data.manufacturers.map(cal => `<option value="${cal}">${cal}</option>`).join('') : ''}
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control machine">
                                                                <option value="">-- Select Machine --</option>
                                                                ${data && data.machines ? data.machines.map(machine => `<option value="${machine}">${machine}</option>`).join('') : ''}
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <div class="instance">
                                                                <button class="open-modal-btn btn btn-info mb-4">Select</button>
                                                                <div class="selection"></div>
                                                                <!-- Modal -->
                                                                <div class="ilc-modal">
                                                                    <div class="ilc-modal-content">
                                                                        <input type="text" id="searchInput" class="search-input" style="width: 40%; margin:0.5rem" placeholder="Search for Test Codes or Names" onkeyup="searchTable()">
                                                                        <table id="testTable" class="table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th><input type="checkbox" id="selectAll" onclick="selectAllCheckboxes()"> Select All</th>
                                                                                    <th>Test Code</th>
                                                                                    <th>Test Name</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <!-- Editable rows for test data -->
                                                                                <tr>
                                                                                    <td><input type="checkbox" class="ilc-modal-option" data-option="Test One"></td>
                                                                                    <td><input type="text" class="form-control test-code" value="T001"></td>
                                                                                    <td><input type="text" class="form-control test-name" value="Test One"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><input type="checkbox" class="ilc-modal-option" data-option="Test Two"></td>
                                                                                    <td><input type="text" class="form-control test-code" value="T002"></td>
                                                                                    <td><input type="text" class="form-control test-name" value="Test Two"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><input type="checkbox" class="ilc-modal-option" data-option="Test Three"></td>
                                                                                    <td><input type="text" class="form-control test-code" value="T003"></td>
                                                                                    <td><input type="text" class="form-control test-name" value="Test Three"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><input type="checkbox" class="ilc-modal-option" data-option="Test Four"></td>
                                                                                    <td><input type="text" class="form-control test-code" value="T004"></td>
                                                                                    <td><input type="text" class="form-control test-name" value="Test Four"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><input type="checkbox" class="ilc-modal-option" data-option="Test Five"></td>
                                                                                    <td><input type="text" class="form-control test-code" value="T005"></td>
                                                                                    <td><input type="text" class="form-control test-name" value="Test Five"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <button class="confirm-selection btn btn-primary">Confirm Selection</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a onclick="openDocument1()">Open</a>
                                                        </td>
                                                    </tr>
                                                `;
                $('#tableBody').append(row);
            }

            // Open modal when "Select" button is clicked
            $(document).on('click', '.open-modal-btn', function () {
                const modal = $(this).closest('.instance').find('.ilc-modal');
                modal.css('display', 'block'); // Show the modal
            });

            // Close modal when clicking outside the modal content
            $(document).on('click', function (event) {
                if ($(event.target).hasClass('ilc-modal')) {
                    $(event.target).css('display', 'none'); // Hide the modal
                }
            });

            // Confirm selection and update the selection div
            $(document).on('click', '.confirm-selection', function () {
                const modal = $(this).closest('.ilc-modal');
                const selectedOptions = [];
                modal.find('.ilc-modal-option:checked').each(function () {
                    const row = $(this).closest('tr');
                    const testCode = row.find('.test-code').val();
                    const testName = row.find('.test-name').val();
                    selectedOptions.push(`${testCode} - ${testName}`);
                });

                const selectionDiv = modal.closest('.instance').find('.selection');
                selectionDiv.html(selectedOptions.join(', ')); // Display selected options
                modal.css('display', 'none'); // Hide the modal
            });

            // Select all checkboxes
            function selectAllCheckboxes() {
                const selectAll = $('#selectAll').is(':checked');
                $('.ilc-modal-option').prop('checked', selectAll);
            }

            // Search functionality
            function searchTable() {
                const input = $('#searchInput').val().toLowerCase();
                $('#testTable tbody tr').each(function () {
                    const rowText = $(this).text().toLowerCase();
                    $(this).toggle(rowText.includes(input));
                });
            }
        });




        $(document).ready(function () {
            // Get the CSRF token from the meta tag
            const csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Submit form data
            $('button.btn-warning').click(function () {
                const labId = $('#labDropdown').val();
                if (!labId) {
                    alert('Please select a lab first.');
                    return;
                }

                const rows = [];
                $('#tableBody tr').each(function () {
                    const row = $(this);
                    const department = row.find('.department').val();
                    const calibrationManufacturer = row.find('.manufacturer').val();
                    const calibrationName = row.find('.calibration-name').val();
                    const suitableMachine = row.find('.machine').val();
                    const parameters = row.find('.selection').text(); // Get selected parameters


                    if (department && calibrationManufacturer && calibrationName &&
                        suitableMachine && parameters) {
                        rows.push({
                            department,
                            calibration_manufacturer: calibrationManufacturer,
                            calibration_name: calibrationName,
                            suitable_machine: suitableMachine,
                            parameters: JSON.stringify(parameters.split(
                                ', ')), // Convert to JSON
                        });
                    }
                });

                if (rows.length === 0) {
                    alert('No valid rows to submit.');
                    return;
                }

                // Send data to the backend
                $.ajax({
                    url: '/calibration-parameter-tagging/store',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken, // Include the CSRF token in the headers
                    },
                    data: {
                        lab_id: labId,
                        rows: rows,
                    },
                    success: function (response) {
                        if (response.success) {
                            alert('Data saved successfully.');
                            location.reload();
                        } else {
                            alert('Failed to save data.');
                            location.reload();
                        }
                    },
                    error: function (xhr) {
                        alert('An error occurred while saving data.');
                    }
                });
            });
        });
    </script>
    <script>
        function openDocument1() {
            //  alert('hello');
            document.getElementById('documentClose1').classList.add('opened');
            document.getElementById('documentOpen1').classList.add('open');
        }

        function documentClose1() {
            document.getElementById('documentClose1').classList.remove('opened');
            document.getElementById('documentOpen1').classList.remove('open');

        }

        function callmodel() {
            // Get all modal triggers
            const openModalBtns = document.querySelectorAll('.open-modal-btn');
            const modals = document.querySelectorAll('.ilc-modal');
            // const closeBtns = document.querySelectorAll('.close');
            const confirmBtns = document.querySelectorAll('.confirm-selection');
            const modalOptions = document.querySelectorAll('.ilc-modal-option');

            // Open modal for each button
            openModalBtns.forEach((button, index) => {
                const modal = modals[index];
                const selectionDiv = button.nextElementSibling;
                const confirmBtn = confirmBtns[index];

                button.addEventListener('click', () => {
                    modal.style.display = 'block';
                });

                // Close the modal
                // closeBtns[index].addEventListener('click', () => {
                //     modal.style.display = 'none';
                // });

                // Handle confirm selection
                confirmBtn.addEventListener('click', () => {
                    const selectedOptions = [];

                    // Gather all selected options
                    modal.querySelectorAll('.ilc-modal-option:checked').forEach(option => {
                        selectedOptions.push(option.dataset.option);
                    });

                    // Show selected options below the button
                    if (selectedOptions.length > 0) {
                        // selectionDiv.innerHTML = `Selected: ${selectedOptions.join(', ')}`;
                        selectedOptions.forEach(option => {
                            const span = document.createElement('span');
                            span.textContent = option;
                            span.style.padding = '5px 10px';
                            span.style.border = '1px solid #ccc';
                            span.style.borderRadius = '5px';
                            span.style.backgroundColor = '#f0f0f0';
                            span.style.color = '#333';
                            selectionDiv.appendChild(span);
                        });
                    } else {
                        selectionDiv.innerHTML = 'No options selected.';
                    }

                    // Close the modal
                    modal.style.display = 'none';
                });
            });

            // Close modal if clicked outside
            window.addEventListener('click', (e) => {
                modals.forEach(modal => {
                    if (e.target === modal) {
                        modal.style.display = 'none';
                    }
                });
            });
        }
        callmodel()
    </script>
@endsection