@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Enter Audit Details</title>
        <!-- FullCalendar CSS (optional) -->
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet">

        <!-- FullCalendar JS -->
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
    </head>
    <style>
        /* for table */
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

        /* fOR PIVOT */
        .pivot-container {
            width: 100%;
            /* max-width: 600px;
            margin: 50px auto; */
            background-color: white;
            border-radius: 8px;
            /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); */
            /* overflow: hidden; */
        }

        .pivot-tabs {
            display: flex;
            background-color: #ffff;
            padding: 5px;
            border: 1px solid #b1b1b1;
            border-radius: 10px;
            width: 100%;
        }

        .pivot-tab {
            flex: 1;
            background: transparent;
            border: none;
            cursor: pointer;
            font-size: 14px;
            text-align: center;
        }

        .pivot-tab.active {
            color: #005a9e;
            background-color: lightblue;
            font-weight: bold;
            border-radius: 5px;
            padding: 0.8rem;
        }

        .pivot-content {
            padding: 20px 0;
        }

        .pivot-panel {
            display: none;
        }

        .pivot-panel.active {
            display: block;
        }


        .form-label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #495057;
            display: inline-block;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 14px;
            color: #495057;
            background-color: #ffffff;
            transition: all 0.2s ease-in-out;
        }

        .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
            outline: none;
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3E%3Cpath fill='%23999' d='M2 0L0 2h4z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 10px 10px;
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            color: #495057;
        }

        .save-button {
            width: 100%;
            padding: 10px;
            background-color: #4a90e2;
            color: #fff;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .save-button:hover {
            background-color: #3b78d2;
        }


        .editor-container {
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
            width: 100%;
            margin: 0.5rem auto;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .toolbar {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            background-color: #e7e7e7;
            padding: 10px;
            font-size: 14px;
        }

        .toolbar label {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .toolbar button,
        .toolbar select,
        .toolbar input[type="color"] {
            border: none;
            background-color: #fff;
            border-radius: 3px;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 14px;
            color: #333;
        }

        .toolbar button:hover {
            background-color: #e0e0e0;
        }

        .toolbar button:active {
            background-color: #ccc;
        }

        .editor {
            padding: 10px;
            min-height: 200px;
            background-color: #fff;
            font-size: 16px;
            line-height: 1.6;
            overflow-y: auto;
        }

        .editor:focus {
            outline: none;
        }

        .list-group-item {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 5px;
            display: flex;
        }

        .list-group-item-text {

            display: flex;
            border: 1px solid lightgray;
            border-radius: 5px;
        }

        .list-group-item span {
            padding: 5px;
        }

        .attendees-div {
            border: 1px solid lightgray;
            padding: 0.5rem;
            border-radius: 10px;
        }

        .stock-planner-table {
            width: 100% !important;
            border-collapse: collapse !important;
            margin-top: 20px !important;
        }



        .stock-planner-table td {
            padding: 10px !important;
            text-align: left !important;
            border: 1px solid #ddd !important;
            vertical-align: top;
        }

        .stock-planner-table th {
            padding: 10px !important;
            text-align: left !important;
            border: 1px solid #ddd !important;
            background-color: #007BFF !important;
            color: white !important;
        }

        .stock-planner-table p {
            padding-top: 1rem;
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
    </style>
    <style>
        /* From Uiverse.io by JkHuger */
        .radio-container {
            margin: 0 auto;
            max-width: 300px;
            /* color: white; */
        }

        .radio-wrapper {
            margin-bottom: 20px;
        }

        .radio-button {
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
        }

        .radio-button:hover {
            transform: translateY(-2px);
        }

        .radio-button input[type="radio"] {
            display: none;
        }

        .radio-checkmark {
            display: inline-block;
            position: relative;
            width: 16px;
            height: 16px;
            margin-right: 10px;
            border: 2px solid #333;
            border-radius: 50%;
        }

        .radio-checkmark:before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: #333;
            transition: all 0.2s ease-in-out;
        }

        .radio-button input[type="radio"]:checked~.radio-checkmark:before {
            transform: translate(-50%, -50%) scale(1);
        }

        .radio-label {
            font-size: 10px;
            font-weight: 600;
        }

        .maxWidthTd {
            max-width: 10rem !important;
        }

        .AuditFindingsSummary {
            border: 1px solid lightgray;
            padding: 0.5rem;
            border-radius: 10px;
            position: relative;
        }

        .AuditFindingsSummary::before {
            content: "Summary";
            position: absolute;
            top: -14px;
            transform: translate(-50%, 0);
            left: 50%;
            background-color: #f5f7f7;
            padding: 0 10px;
            font-weight: 600;
            border: 1px solid lightgray;
            border-radius: 14px
        }

        .tableHref {
            color: #36C;
            cursor: pointer;
        }

        .tableHref:hover {
            text-decoration: underline;
        }
    </style>
    <style>
        .custom-multiselect {
            position: relative;
            width: 100%;
        }

        .multiselect-dropdown {
            border: 1px solid #ced4da;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .multiselect-dropdown.active {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .multiselect-options {
            display: none;
            position: absolute;
            width: 100%;
            max-height: 200px;
            overflow-y: auto;
            border: 1px solid #ced4da;
            border-radius: 4px;
            background: white;
            z-index: 1000;
            margin-top: 4px;
        }

        .multiselect-option {
            padding: 8px 12px;
            cursor: pointer;
        }

        .multiselect-option:hover {
            background-color: #f8f9fa;
        }

        .multiselect-option.selected {
            background-color: #e9ecef;
        }

        .selected-items {
            display: flex;
            flex-wrap: wrap;
            gap: 4px;
            margin-top: 8px;
        }

        .selected-item {
            background-color: #e9ecef;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 14px;
        }

        .remove-item {
            cursor: pointer;
            margin-left: 4px;
        }

        .dropdown-arrow {
            transition: transform 0.2s;
        }

        .rotated {
            transform: rotate(180deg);
        }
    </style>

    <body>
        <div class="main ">
            <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
                <div style="font-size: 20px;">Enter Audit Details</div>
                <input type="file" id="mainInputUpload" multiple class="btn btn-warning" name="" id="">
            </div>




            <div class="pivot-tabs">

                <button class="pivot-tab active" data-target="AuditSchedule">Audit Schedule</button>
                <!-- <button class="pivot-tab" data-target="tab4">Message</button> -->
                <!-- <button class="pivot-tab" data-target="AuditFindings">Audit Findings</button>
                                                                                                    <button class="pivot-tab" data-target="PostAuditActivities">Post Audit Activities</button> -->


            </div>

            <div class="pivot-content">
                <div class="form-container pivot-panel active" id="AuditSchedule">
                    <form class="row" onsubmit="handleFormSubmit(event)">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="col-md-3">
                            <label class="form-label">Audit Type</label>
                            <select class="form-control" name="audit_type" required>
                                <option value="" disabled selected>Select Audit</option>
                                <option value="internal_audit">Internal Audit</option>
                                <option value="external_audit">External Audit</option>
                                <option value="NABL_audit">NABL Audit</option>
                                <option value="CAP_audit">CAP Audit</option>
                                <option value="ISO_audit">ISO Audit</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Nature of Audit</label>
                            <select class="form-control" name="nature_of_audit" required>
                                <option value="" disabled selected>Select Nature of Audit</option>
                                <option value="Quality Audit">Quality Audit</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Audit Scheduled Start Date</label>
                            <input class="form-control" type="date" name="audit_start_date" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Audit Scheduled End Date</label>
                            <input class="form-control" type="date" name="audit_end_date" required>
                        </div>
                        <div class="col-md-3 mt-3">
                            <label class="form-label">Audit Location</label>
                            <input class="form-control" type="text" name="audit_location" placeholder="Audit Location"
                                required>
                        </div>

                        <div class="col-md-3 mt-3">
                            <label class="form-label">Audit Status</label>
                            <select class="form-control" name="audit_status" required>
                                <option value="" disabled selected>Select Audit Status</option>
                                <option value="Scheduled">Scheduled</option>
                                <option value="Ongoing">Ongoing</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                        <div class="col-md-3 mt-3">
                        </div>

                        <div class="col-md-4 mt-3">
                            <div class="attendees-div">
                                <label class="form-label">Department To Be Audited</label>

                                <!-- Custom Multi-Select -->
                                <div class="custom-multiselect">
                                    <div class="multiselect-dropdown" id="departmentDropdown">
                                        <span class="placeholder-text" id="dropdownPlaceholder">Select departments...</span>
                                        <i class="fas fa-chevron-down dropdown-arrow" id="dropdownArrow"></i>
                                    </div>

                                    <div class="multiselect-options" id="departmentOptions">
                                        @foreach ($departments22 as $item)
                                            <div class="multiselect-option" data-value="{{ $item->name }}"
                                                onclick="toggleOption('{{ $item->name }}')">
                                                {{ $item->name }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Hidden inputs for form submission -->
                                <input type="hidden" name="departments[]" value="...">

                                <div id="hiddenInputs"></div>

                                <!-- Selected Items Display -->
                                <div class="selected-items" id="selectedItems"></div>

                                <!-- Selected display with count -->
                                <div id="selectedDepartments" class="mt-2 text-primary fw-bold"></div>
                            </div>
                        </div>


                        <div class="col-md-4 mt-3">
                            <div class="attendees-div">
                                <label class="form-label">Auditors</label>
                                <input id="auditorsInput" class="form-control" type="text"
                                    placeholder="Enter auditor's name">
                                <ul id="auditorsList" class="list-group mt-2"></ul>
                                <button id="addAuditorBtn" class="btn btn-primary mt-2"><i
                                        class="fa-solid fa-plus"></i></button>
                                <input type="hidden" name="auditors">
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <div class="attendees-div">
                                <label class="form-label">Attendees</label>
                                <input id="attendeesInput" class="form-control" type="text"
                                    placeholder="Enter attendee's name">
                                <ul id="attendeesList" class="list-group mt-2"></ul>
                                <button id="addAttendeeBtn" class="btn btn-primary mt-2"><i
                                        class="fa-solid fa-plus"></i></button>
                                <input type="hidden" name="attendees">
                            </div>
                        </div>

                        <div class="mt-3">
                            <label class="form-label">Audit Notes</label>
                            <div class="editor-container">
                                <div class="toolbar">
                                    <button onclick="format('bold')"><b>B</b></button>
                                    <button onclick="format('italic')"><i>I</i></button>
                                    <button onclick="format('underline')"><u>U</u></button>
                                    <button onclick="format('strikeThrough')"><s>S</s></button>
                                    <select onchange="format('fontSize', this.value)">
                                        <option value="1">Small</option>
                                        <option value="3" selected>Normal</option>
                                        <option value="5">Large</option>
                                        <option value="7">Huge</option>
                                    </select>
                                    <label>Font Color: <input type="color"
                                            onchange="format('foreColor', this.value)"></label>
                                    <label>BG Color: <input type="color"
                                            onchange="format('hiliteColor', this.value)"></label>
                                    <button onclick="format('justifyLeft')">Left</button>
                                    <button onclick="format('justifyCenter')">Center</button>
                                    <button onclick="format('justifyRight')">Right</button>
                                    <button onclick="format('justifyFull')">Justify</button>
                                    <button onclick="format('insertUnorderedList')">• List</button>
                                    <button onclick="format('insertOrderedList')">1. List</button>
                                    <button onclick="format('undo')">Undo</button>
                                    <button onclick="format('redo')">Redo</button>
                                    <button onclick="format('removeFormat')">Clear</button>
                                </div>
                                <div id="auditNotesEditor" class="editor" contenteditable="true">
                                    <p>Start typing here...</p>
                                </div>
                                <input type="hidden" name="audit_notes">
                            </div>
                        </div>

                        <button type="submit" class="save-button">Save</button>
                    </form>
                </div>

                <div class="pivot-panel " id="AuditFindings">

                    <div class="AuditFindingsSummary row">


                        <div class="col-md-3 mt-3">
                            <label class="form-label">Audit Scheduled End Date</label>
                            <input class="form-control" type="date" disabled="">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label class="form-label">Audit Department</label>
                            <input class="form-control" type="text" disabled="">
                        </div>

                        <div class="col-md-2 mt-3">
                            <label class="form-label">Total No. of NC's</label>
                            <input class="form-control" type="text" disabled="">
                        </div>
                        <div class="col-md-2 mt-3">
                            <label class="form-label">Total No. of Observation</label>
                            <input class="form-control" type="text" disabled="">
                        </div>
                        <div class="col-md-6 mt-3"></div>
                        <div class="col-md-1 mt-3">
                            <label class="form-label">Major </label>
                            <input class="form-control" type="text" disabled="">
                        </div>

                        <div class="col-md-1 mt-3">
                            <label class="form-label">Minor</label>
                            <input class="form-control" type="text" disabled="">
                        </div>



                    </div>

                    <div class="table-responsive">
                        <table class=" stock-planner-table">
                            <thead>
                                <tr>
                                    <th rowspan="2">Audit Date</th>
                                    <th rowspan="2">Department</th>
                                    <th rowspan="2">Assessor</th>
                                    <th rowspan="2">Nc's / Observations</th>
                                    <th colspan="2">No of Nc's</th>
                                    <th rowspan="2">No. of Observations</th>
                                    <th rowspan="2">NC/Observations Details</th>

                                </tr>
                                <tr>
                                    <th>Major</th>
                                    <th>Minor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p></p>
                                    </td>
                                    <td>
                                        <select name="" id="" class="form-control">
                                            <option value=""> Select</option>
                                            <option value="MajorNc">Hr</option>
                                            <option value="MinorNc"> Quality</option>
                                            <option value="Observations"> It</option>
                                        </select>
                                        <!-- <p onclick="openDocument1()" class="tableHref">test</p> -->
                                    </td>
                                    <td style="width: 20rem;">
                                        <input class="form-control" type="text">

                                    </td>
                                    <td>
                                        <select name="" id="" class="form-control">
                                            <option value=""> Select</option>
                                            <option value="MajorNc">Major Nc</option>
                                            <option value="MinorNc"> Minor Nc</option>
                                            <option value="Observations"> Observations</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input class="form-control" type="number">

                                    </td>
                                    <td>
                                        <input class="form-control" type="number">

                                    </td>
                                    <td>
                                        <input class="form-control" type="number">
                                    </td>
                                    <td>
                                        <textarea class="form-control"></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-primary m-1" onclick="newRowToTable(this,false)">+</button>

                    </div>
                    <button type="submit" class="save-button">Save</button>
                </div>
                <div class="pivot-panel " id="PostAuditActivities">
                    <div class="AuditFindingsSummary row">


                        <div class="col-md-3 mt-3">
                            <label class="form-label">Audit Scheduled End Date</label>
                            <input class="form-control" type="date" disabled="">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label class="form-label">Audit Department</label>
                            <input class="form-control" type="text" disabled="">
                        </div>

                        <div class="col-md-2 mt-3">
                            <label class="form-label">Total No. of NC's</label>
                            <input class="form-control" type="text" disabled="">
                        </div>
                        <div class="col-md-2 mt-3">
                            <label class="form-label">Total No. of Observation</label>
                            <input class="form-control" type="text" disabled="">
                        </div>
                        <div class="col-md-6 mt-3"></div>
                        <div class="col-md-1 mt-3">
                            <label class="form-label">Major </label>
                            <input class="form-control" type="text" disabled="">
                        </div>

                        <div class="col-md-1 mt-3">
                            <label class="form-label">Minor</label>
                            <input class="form-control" type="text" disabled="">
                        </div>



                    </div>

                    <div class="table-responsive">
                        <table class=" stock-planner-table">
                            <thead>
                                <tr>
                                    <th>NC No.</th>
                                    <th>Department</th>
                                    <th>Nature of NC</th>
                                    <th>RCA</th>
                                    <th>Upload Electronic Documents</th>
                                    <th>Risk Profile</th>


                                </tr>

                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p></p>
                                    </td>
                                    <td>
                                        <p></p>
                                    </td>

                                    <td>
                                        <p></p>
                                    </td>
                                    <td>
                                        <p></p>
                                    </td>
                                    <td>
                                        <input type="file" multiple name="" id="">
                                    </td>
                                    <td>
                                        <p></p>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <div id="documentClose1" class="closeBtn1" onclick="documentClose1()">
            X
        </div>
        <div id="documentOpen1" class="panel1">
            <div style="position: relative; ">
                <div class="mb-4 heading" style="margin-top: 0.6rem;">
                    <div style="font-size: 20px;"> Audit CheckPoints </div>
                </div>
            </div>

            <input class="form-control" type="text" placeholder="Search" required
                style="width: 200px;border-color: #0CAF60;box-shadow: 0 0 0 0.2rem rgba(12, 175, 96, 0.25)">

            <div class="table-responsive">
                <table class=" stock-planner-table">
                    <tbody>

                        <tr>
                            <th colspan="30">
                                <p><strong>REQUIREMENTS OF ISO 15189: 2022</strong></p>
                            </th>
                            <th>
                                <p><strong>Documentation</strong></p>
                            </th>
                            <th>
                                <p><strong>Awareness</strong></p>
                            </th>
                            <th>
                                <p><strong>Implementation</strong></p>
                            </th>
                            <th colspan="2">
                                <p><strong>Remark</strong></p>
                            </th>
                        </tr>
                        <tr>
                            <th><strong>4</strong></th>
                            <th colspan="34">
                                <p><strong>General Requirements</strong></p>
                            </th>
                        </tr>

                        <tr>
                            <td rowspan="21"></td>
                            <td>
                                <p><strong>4.1</strong></p>
                            </td>
                            <td colspan="33">
                                <p><strong>Impartiality</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="5">&nbsp;</td>
                            <td colspan="3">&nbsp;</td>
                            <td colspan="25" class="maxWidthTd">
                                <p><span style="font-weight: 400;">Laboratory activities shall be undertaken impartially.
                                        The laboratory shall be structured and managed to safeguard impartiality.</span></p>
                            </td>

                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                            <td colspan="25" class="maxWidthTd">
                                <p><span style="font-weight: 400;">The laboratory management shall be committed to
                                        impartiality.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                            <td colspan="25" class="maxWidthTd">
                                <p><span style="font-weight: 400;">The laboratory shall be responsible for the impartiality
                                        of its laboratory activities and shall not allow commercial, financial or other
                                        pressures to compromise impartiality.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                            <td colspan="25" class="maxWidthTd">
                                <p><span style="font-weight: 400;">The laboratory shall monitor its activities and its
                                        relationships to identify threats to its impartiality. This monitoring shall include
                                        relationships of its personnel.</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE A relationship that threatens the impartiality
                                            of the laboratory can be based on ownership, governance, management, personnel,
                                            shared resources, finances, contracts, marketing (including branding), and
                                            payment of a sales commission or other inducement for the referral of new
                                            laboratory users, etc. Such relationships do not necessarily present the
                                            laboratory with a threat to impartiality.</span></em></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                            <td colspan="25" class="maxWidthTd">
                                <p><span style="font-weight: 400;">If a threat to impartiality is identified, the effect
                                        shall be eliminated or minimized so that the impartiality is not compromised. The
                                        laboratory shall be able to demonstrate how it mitigates such threat.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>

                        <tr>
                            <td>
                                <p><strong>4.2</strong></p>
                            </td>
                            <td colspan="33">
                                <p><strong>Confidentiality</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="3">&nbsp;</td>
                            <td colspan="2">
                                <p><strong>4.2.1</strong></p>
                            </td>
                            <td colspan="26" class="maxWidthTd">
                                <p><strong>Management of information</strong></p>
                                <br />
                                <p><span style="font-weight: 400;">The laboratory shall be responsible, through legally
                                        enforceable agreements, for the management of all patient information obtained or
                                        created during the performance of laboratory activities. Management of patient
                                        information shall include privacy and confidentiality. The laboratory shall inform
                                        the user and/or the patient in advance, of the information it intends to place in
                                        the public domain. Except for information that the user and/or the patient makes
                                        publicly available, or when agreed between the laboratory and the patient (e.g. for
                                        the purpose of responding to complaints), all other information is considered
                                        proprietary information and shall be regarded as confidential.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p><strong>4.2.2</strong></p>
                            </td>
                            <td colspan="26" class="maxWidthTd">
                                <p><strong>Release of information</strong></p>
                                <br />
                                <p><span style="font-weight: 400;">When the laboratory is required by law or authorized by
                                        contractual arrangements to release confidential information, the patient concerned
                                        shall be notified of the information released, unless prohibited by law.</span></p>
                                <br />
                                <p><span style="font-weight: 400;">Information about the patient from a source other than
                                        the patient (e.g. complainant, regulator) shall be kept confidential by the
                                        laboratory. The identity of the source shall be kept confidential by the laboratory
                                        and shall not be shared with the patient, unless agreed by the source.</span></p>
                                <br /><br />
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p><strong>4.2.3</strong></p>
                            </td>
                            <td colspan="26" class="maxWidthTd">
                                <p><strong>Personnel responsibility</strong></p>
                                <br />
                                <p><span style="font-weight: 400;">Personnel, including any committee members, contractors,
                                        personnel of external bodies, or individuals with access to laboratory information
                                        acting on the laboratory&rsquo;s behalf, shall keep confidential all information
                                        obtained or created during the performance of laboratory activities.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>4.3</strong></p>
                            </td>
                            <td colspan="33">
                                <p><strong>Requirements regarding patients</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="10">&nbsp;</td>
                            <td colspan="28" class="maxWidthTd">
                                <p><span style="font-weight: 400;">Laboratory management shall ensure that patients&rsquo;
                                        well-being, safety and rights are the primary considerations. The laboratory shall
                                        establish and implement the following processes:</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="26" class="maxWidthTd">
                                <p><span style="font-weight: 400;">opportunities for patients and laboratory users to
                                        provide helpful information to aid the laboratory in the selection of the
                                        examination methods, and the interpretation of the examination results;&nbsp;</span>
                                </p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="26" class="maxWidthTd">
                                <p><span style="font-weight: 400;">provision of patients and users with publicly available
                                        information about the examination process, including costs when applicable, and when
                                        to expect results;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="26" class="maxWidthTd">
                                <p><span style="font-weight: 400;">periodic review of the examinations offered by the
                                        laboratory to ensure they are clinically appropriate and necessary;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="26" class="maxWidthTd">
                                <p><span style="font-weight: 400;">where appropriate, disclosure to patients, users and any
                                        other relevant persons, of incidents that resulted or could have resulted in patient
                                        harm, and records of actions taken to mitigate those harms;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p><span style="font-weight: 400;">e)</span></p>
                            </td>
                            <td colspan="26" class="maxWidthTd">
                                <p><span style="font-weight: 400;">treatment of patients, samples, or remains, with due care
                                        and respect;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p><span style="font-weight: 400;">f)</span></p>
                            </td>
                            <td colspan="26" class="maxWidthTd">
                                <p><span style="font-weight: 400;">obtaining informed consent when required;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p><span style="font-weight: 400;">g)</span></p>
                            </td>
                            <td colspan="26" class="maxWidthTd">
                                <p><span style="font-weight: 400;">ensuring the ongoing availability and integrity of
                                        retained patient samples and records in the event of the closure, acquisition or
                                        merger of the laboratory;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p><span style="font-weight: 400;">h)</span></p>
                            </td>
                            <td colspan="26" class="maxWidthTd">
                                <p><span style="font-weight: 400;">making relevant information available to a patient and
                                        any other health service provider at the request of the patient or the request of a
                                        healthcare provider acting on their behalf;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p><span style="font-weight: 400;">i)</span></p>
                            </td>
                            <td colspan="26" class="maxWidthTd">
                                <p><span style="font-weight: 400;">upholding the rights of patients to care that is free
                                        from discrimination.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>

                            <th>
                                <p><strong>5</strong></p>
                            </th>
                            <th colspan="34">
                                <p><strong>Structural Requirements</strong></p>
                            </th>
                        </tr>
                        <tr>
                            <td rowspan="37">

                            </td>
                            <td>
                                <p><strong>5.1</strong></p>
                            </td>
                            <td colspan="28" class="maxWidthTd">
                                <p><strong>Legal entity</strong></p>
                                <p><span style="font-weight: 400;">The laboratory or the organization of which the
                                        laboratory is a part shall be an entity that can be held legally responsible for its
                                        activities.</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE For the purposes of this document, a government
                                            laboratory is deemed to be a legal entity on the basis of its government
                                            status.</span></em></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>5.2</strong></p>
                            </td>
                            <td colspan="28" class="maxWidthTd">
                                <p><strong>Laboratory director</strong></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td colspan="4">
                                <p><strong>5.2.1</strong></p>
                            </td>
                            <td colspan="24" class="maxWidthTd">
                                <p><strong>Laboratory director competence</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall be directed by a person, or persons
                                        however named, with the specified qualifications, competence, delegated authority,
                                        responsibility, and resources to fulfil the requirements of this document.</span>
                                </p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td colspan="4">
                                <p><strong>5.2.2</strong></p>
                            </td>
                            <td colspan="24" class="maxWidthTd">
                                <p><strong>Laboratory director responsibilities</strong></p>
                                <p><span style="font-weight: 400;">The laboratory director is responsible for the
                                        implementation of the management system, including the application of risk
                                        management to all aspects of the laboratory operations so that risks to patient care
                                        and opportunities to improve are systematically identified and addressed.</span></p>
                                <p><span style="font-weight: 400;">The duties and responsibilities of the laboratory
                                        director shall be documented.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td colspan="4">
                                <p><strong>5.2.3</strong></p>
                            </td>
                            <td colspan="24" class="maxWidthTd">
                                <p><strong>Delegation of duties</strong></p>
                                <p><span style="font-weight: 400;">The laboratory director may delegate either selected
                                        duties or responsibilities, or both, to qualified and competent personnel and such
                                        delegation shall be documented. However, the laboratory director shall maintain the
                                        ultimate responsibility for the overall operation of the laboratory.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>5.3</strong></p>
                            </td>
                            <td colspan="28" class="maxWidthTd">
                                <p><strong>Laboratory activities</strong></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td rowspan="8">&nbsp;</td>
                            <td colspan="4">
                                <p><strong>5.3.1</strong></p>
                            </td>
                            <td colspan="24" class="maxWidthTd">
                                <p><strong>General</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall specify and document the range of
                                        laboratory activities, including laboratory activities performed at sites other than
                                        the main location (e.g. POCT, sample collection) for which it conforms with this
                                        document. The laboratory shall only claim conformity with this document for this
                                        range of laboratory activities, which excludes externally provided laboratory
                                        activities on an ongoing basis.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><strong>5.3.2</strong></p>
                            </td>
                            <td colspan="24" class="maxWidthTd">
                                <p><strong>Conformance with requirements</strong></p>
                                <p><span style="font-weight: 400;">Laboratory activities shall be carried out in such a way
                                        as to meet the requirements of this document, the users, regulatory authorities and
                                        organizations providing recognition. This applies to the complete range of specified
                                        and documented laboratory activities, regardless of where the service is
                                        provided.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4" rowspan="6">
                                <p><strong>5.3.3</strong></p>
                            </td>
                            <td colspan="24" class="maxWidthTd">
                                <p><strong>Advisory activities</strong></p>
                                <p><span style="font-weight: 400;">Laboratory management shall ensure that appropriate
                                        laboratory advice and interpretation are available and meet the needs of patients
                                        and users.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="24" class="maxWidthTd">
                                <p><span style="font-weight: 400;">The laboratory shall establish arrangements for
                                        communicating with laboratory users on the following when applicable:</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="10">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="14">
                                <p><span style="font-weight: 400;">advising on choice and use of examinations, including
                                        required type of sample, clinical indications and limitations of examination
                                        methods, and the frequency of requesting the examination;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="10">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="14">
                                <p><span style="font-weight: 400;">providing professional judgments on the interpretation of
                                        the results of examinations;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="10">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="14">
                                <p><span style="font-weight: 400;">promoting the effective utilization of laboratory
                                        examinations;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="10">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="14">
                                <p><span style="font-weight: 400;">advising on scientific and logistical matters such as
                                        instances of failure of sample(s) to meet acceptability criteria.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>5.4</strong></p>
                            </td>
                            <td colspan="33">
                                <p><strong>Structure and authority</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="10">&nbsp;</td>
                            <td colspan="4" rowspan="4">
                                <p><strong>5.4.1</strong></p>
                            </td>
                            <td colspan="24" class="maxWidthTd">
                                <p><strong>General</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall:</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="10">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="14">
                                <p><span style="font-weight: 400;">define its organization and management structure, its
                                        place in any parent organization, and the relationships between management,
                                        technical operations and support services;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="10">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="14">
                                <p><span style="font-weight: 400;">specify the responsibility, authority, lines of
                                        communication and interrelationship of all personnel who manage, perform or verify
                                        work affecting the results of laboratory activities;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="10">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="14">
                                <p><span style="font-weight: 400;">specify its procedures to the extent necessary to ensure
                                        the consistent application of its laboratory activities and the validity of the
                                        results.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4" rowspan="6">
                                <p><strong>5.4.2</strong></p>
                            </td>
                            <td colspan="24" class="maxWidthTd">
                                <p><strong>Quality management</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall have personnel who, irrespective of
                                        other responsibilities, have the authority and resources needed to carry out their
                                        duties, including:</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="11">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="13">
                                <p><span style="font-weight: 400;">implementation, maintenance and improvement of the
                                        management system;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="11">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="13">
                                <p><span style="font-weight: 400;">identification of deviations from the management system
                                        or from the procedures for performing laboratory activities;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="11">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="13">
                                <p><span style="font-weight: 400;">initiation of actions to prevent or minimize such
                                        deviations;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="11">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="13">
                                <p><span style="font-weight: 400;">reporting to laboratory management on the performance of
                                        the management system and any need for improvement;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="11">
                                <p><span style="font-weight: 400;">e)</span></p>
                            </td>
                            <td colspan="13">
                                <p><span style="font-weight: 400;">ensuring the effectiveness of laboratory
                                        activities.</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE These responsibilities can be assigned to one or
                                            more persons.</span></em></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>5.5</strong></p>
                            </td>
                            <td colspan="33">
                                <p><strong>Objectives and policies</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="8">&nbsp;</td>
                            <td rowspan="5">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="27">
                                <p><span style="font-weight: 400;">Laboratory management shall establish and maintain
                                        objectives and policies (see 8.2) to:</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">1)</span></p>
                            </td>
                            <td colspan="22">
                                <p><span style="font-weight: 400;">meet the needs and requirements of its patients and
                                        users;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">2)</span></p>
                            </td>
                            <td colspan="22">
                                <p><span style="font-weight: 400;">commit to good professional practice;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">3)</span></p>
                            </td>
                            <td colspan="22">
                                <p><span style="font-weight: 400;">provide examinations that fulfil their intended
                                        use;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">4)</span></p>
                            </td>
                            <td colspan="22">
                                <p><span style="font-weight: 400;">conform to this document.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td>
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="27">
                                <p><span style="font-weight: 400;">Objectives shall be measurable, and consistent with
                                        policies. The laboratory shall ensure that the objectives and policies are
                                        implemented at all levels of the laboratory organization.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td>
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="27">
                                <p><span style="font-weight: 400;">Laboratory management shall ensure that the integrity of
                                        the management system is maintained when changes to the management system are
                                        planned and implemented.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td>
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="27">
                                <p><span style="font-weight: 400;">The laboratory shall establish quality indicators to
                                        evaluate performance throughout key aspects of pre-examination, examination, and
                                        post-examination processes and monitor performance in relation to objectives (see
                                        8.8.2).</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE Types of quality indicators include the number
                                            of unacceptable samples relative to the number received, the number of errors at
                                            either registration or sample receipt, or both, the number of corrected reports,
                                            the rate of achievement of specified turnaround times.</span></em></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td rowspan="3">
                                <p><strong>5.6</strong></p>
                            </td>
                            <td colspan="33">
                                <p><strong>Risk management</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="27">
                                <p><span style="font-weight: 400;">Laboratory management shall establish, implement, and
                                        maintain processes for identifying risks of harm to patients and opportunities for
                                        improved patient care associated with its examinations and activities, and develop
                                        actions to address both risks and opportunities for improvement (see 8.5).</span>
                                </p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td>
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="27">
                                <p><span style="font-weight: 400;">The laboratory director shall ensure that these processes
                                        are evaluated for effectiveness and modified, when identified as being
                                        ineffective.</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE 1 ISO 22367 provides details for managing risk
                                            in medical laboratories.</span></em></p>
                                <p><em><span style="font-weight: 400;">NOTE 2 ISO 35001 provides details for laboratory
                                            biorisk management.</span></em></p>
                                <br /><br /><br /><br />
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <th>
                                <p><strong>6</strong></p>
                            </th>
                            <th colspan="34">
                                <p><strong>Resource Requirements</strong></p>
                            </th>
                        </tr>
                        <tr>
                            <td rowspan="125">&nbsp;</td>
                            <td>
                                <p><strong>6.1</strong></p>
                            </td>
                            <td colspan="28" class="maxWidthTd">
                                <p><strong>General</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall have available the personnel,
                                        facilities, equipment, reagents, consumables and support services necessary to
                                        manage and perform its activities.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>6.2</strong></p>
                            </td>
                            <td colspan="33">
                                <p><strong>Personnel</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="21">&nbsp;</td>
                            <td colspan="3">
                                <p><strong>6.2.1</strong></p>
                            </td>
                            <td colspan="30">
                                <p><strong>General</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="4">&nbsp;</td>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">The laboratory shall have access to a sufficient number
                                        of competent persons to perform its activities.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">All personnel of the laboratory, either internal or
                                        external, that could influence the laboratory activities shall act impartially,
                                        ethically, be competent and work in accordance with the laboratory&rsquo;s
                                        management system.</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE ISO/TS 22583 provides guidance for supervisors
                                            and operators of POCT equipment.</span></em></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">c)&nbsp;</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">The laboratory shall communicate to laboratory personnel
                                        the importance of meeting the needs and requirements of users as well as the
                                        requirements of this document.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">The laboratory shall have a program to introduce
                                        personnel to the organization, the department or area in which the person will work,
                                        the terms and conditions of employment, staff facilities, health and safety
                                        requirements, and occupational health services.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><strong>6.2.2</strong></p>
                            </td>
                            <td colspan="30">
                                <p><strong>Competence requirements</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="4">&nbsp;</td>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">The laboratory shall specify the competence requirements
                                        for each function influencing the results of laboratory activities, including
                                        requirements for education, qualification, training, re-training, technical
                                        knowledge, skills and experience.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">The laboratory shall ensure all personnel have the
                                        competence to perform laboratory activities for which they are responsible.</span>
                                </p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">The laboratory shall have a process for managing
                                        competence of its personnel, that includes requirements for frequency of competence
                                        assessment.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">The laboratory shall have documented information
                                        demonstrating competence of its personnel.</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE Examples of competence assessment methods that
                                            can be used in any combination include:</span></em></p>
                                <p><em><span style="font-weight: 400;">&mdash; direct observation of an
                                            activity,</span></em></p>
                                <p><em><span style="font-weight: 400;">&mdash; monitoring the recording and reporting of
                                            examination results,</span></em></p>
                                <p><em><span style="font-weight: 400;">&mdash; review of work records,</span></em></p>
                                <p><em><span style="font-weight: 400;">&mdash; assessment of problem-solving
                                            skills,</span></em></p>
                                <p><em><span style="font-weight: 400;">&mdash; examination of specially provided samples,
                                            e.g. previously examined samples, interlaboratory comparison materials, or split
                                            samples.</span></em></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><strong>6.2.3</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Authorization</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall authorize personnel to perform
                                        specific laboratory activities, including but not limited to, the following:</span>
                                </p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="3">&nbsp;</td>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">selection, development, modification, validation and
                                        verification of methods;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">review, release, and reporting of results;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">use of laboratory information systems, in particular:
                                        accessing patient data and information, entering patient data and examination
                                        results, changing patient data or examination results.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><strong>6.2.4</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Continuing education and professional development</strong></p>
                                <p><span style="font-weight: 400;">A continuing education programme shall be available to
                                        personnel who participate in managerial and technical processes. All personnel shall
                                        participate in continuing education and regular professional development, or other
                                        professional liaison activities.</span></p>
                                <br />
                                <p><span style="font-weight: 400;">The suitability of the programmes and activities shall be
                                        periodically reviewed.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="6">
                                <p><strong>6.2.5</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Personnel records</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall have procedures and retain records
                                        for:</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">a)&nbsp;</span></p>
                            </td>
                            <td colspan="21">
                                <p><span style="font-weight: 400;">determining the competence requirements specified in
                                        6.2.2 a);</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">b)&nbsp;</span></p>
                            </td>
                            <td colspan="21">
                                <p><span style="font-weight: 400;">position descriptions;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">c)&nbsp;</span></p>
                            </td>
                            <td colspan="21">
                                <p><span style="font-weight: 400;">training and re-training;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">d)&nbsp;</span></p>
                            </td>
                            <td colspan="21">
                                <p><span style="font-weight: 400;">authorization of personnel;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">e)</span></p>
                            </td>
                            <td colspan="21">
                                <p><span style="font-weight: 400;">monitoring competence of personnel.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>6.3</strong></p>
                            </td>
                            <td colspan="33">
                                <p><strong>Facilities and environmental conditions</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="17">&nbsp;</td>
                            <td colspan="3">
                                <p><strong>6.3.1</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>General</strong></p>
                                <p><span style="font-weight: 400;">The facilities and environmental conditions shall be
                                        suitable for the laboratory activities and shall not adversely affect the validity
                                        of results, or the safety of patients, visitors, laboratory users, and personnel.
                                        This shall include pre-examination related facilities and sites other than the main
                                        laboratory premises where examinations are performed, as well as POCT.</span></p>
                                <p><span style="font-weight: 400;">The requirements for facilities and environmental
                                        conditions necessary for the performance of the laboratory activities shall be
                                        specified, monitored, and recorded.</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE 1 ISO 15190 provides details for facility and
                                            environmental conditions.</span></em></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE 2 Environmental conditions that can adversely
                                            affect the validity of results include, but are not limited to: adventitious
                                            amplified nucleic acid, microbial contamination, dust, electromagnetic
                                            disturbances, radiation, lighting conditions (illumination), humidity,
                                            electrical supply, temperature, sound and vibration.</span></em></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="5">
                                <p><strong>6.3.2</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Facility controls</strong></p>
                                <p><span style="font-weight: 400;">Facility controls shall be implemented, recorded,
                                        monitored, periodically reviewed, and shall include:</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">control of access, taking into consideration safety,
                                        confidentiality, quality, and safeguarding medical information and patient
                                        samples;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">prevention of contamination, interference, or adverse
                                        influences on laboratory activities that can arise from energy sources, lighting,
                                        ventilation, noise, water and waste disposal;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">prevention of cross-contamination, where examination
                                        procedures pose a risk, or where work can be affected or influenced by lack of
                                        separation;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">provision of safety facilities and devices, where
                                        applicable and regularly verifying their functioning;</span></p>
                                <p><span style="font-weight: 400;">EXAMPLES The operation of emergency release, intercom and
                                        alarm systems for cold rooms and walk-in freezers, accessibility of emergency
                                        showers, eyewash and resuscitation equipment.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">e)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">maintenance of laboratory facilities in a functional and
                                        reliable condition.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><strong>6.3.3</strong></p>
                            </td>
                            <td colspan="30">
                                <p><strong>Storage facilities</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="3">&nbsp;</td>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">a)&nbsp;</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">Storage space, with conditions that ensure the continuing
                                        integrity of samples, equipment, reagents, consumables, documents and records, shall
                                        be provided.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">Patient samples and materials used in examination
                                        processes shall be stored in a manner that prevents cross contamination and
                                        deterioration.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">Storage and disposal facilities for hazardous materials
                                        and biological waste shall be appropriate to the classification of the materials in
                                        the context of any statutory or regulatory requirements.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><strong>6.3.4</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Personnel facilities</strong></p>
                                <p><span style="font-weight: 400;">There shall be adequate access to toilet facilities and a
                                        supply of drinking water, as well as facilities for storage of personal protective
                                        equipment and clothing.</span></p>
                                <br />
                                <p><span style="font-weight: 400;">Space for personnel activities, such as meetings, quiet
                                        study and a rest area, should be provided.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><strong>6.3.5</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Sample collection facilities</strong></p>
                                <p><span style="font-weight: 400;">Sample collection facilities shall:</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="4">&nbsp;</td>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">enable collection to be undertaken in a manner that does
                                        not invalidate results or adversely affect the quality of examinations;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">consider privacy, comfort and needs (e.g. disabled
                                        access, toilet facility) of patients and accommodation of accompanying persons (e.g.
                                        guardian or interpreter) during collection;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">provide separate patient reception and collection
                                        areas;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">d) maintain first aid materials for both patients and
                                        personnel.</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE ISO 20658 provides details for sample collection
                                            facilities.</span></em></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>6.4</strong></p>
                            </td>
                            <td colspan="33">
                                <p><strong>Equipment</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="31">&nbsp;</td>
                            <td colspan="3">
                                <p><strong>6.4.1</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>General</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall have processes for the selection,
                                        procurement, installation, acceptance testing (including acceptability criteria),
                                        handling, transport, storage, use, maintenance, and decommissioning of equipment, in
                                        order to ensure proper functioning and to prevent contamination or
                                        deterioration.</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE Laboratory equipment includes hardware and
                                            software of instruments, measuring systems, and laboratory information systems,
                                            or any equipment that influences the results of laboratory activities, including
                                            sample transportation systems.</span></em></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><strong>6.4.2</strong></p>
                            </td>
                            <td colspan="30">
                                <p><strong>Equipment requirements</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="4">&nbsp;</td>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">The laboratory shall have access to equipment required
                                        for the correct performance of laboratory activities.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">Where the equipment is used outside the laboratory's
                                        permanent control, or equipment manufacturer's functional specification, laboratory
                                        management shall ensure that the requirements of this document are met.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">Each item of equipment that can influence laboratory
                                        activities shall be uniquely labelled, marked or otherwise identified and a register
                                        maintained.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">The laboratory shall maintain and replace equipment as
                                        needed to ensure the quality of examination results.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><strong>6.4.3</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Equipment acceptance procedure</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall verify that the equipment conforms
                                        to specified acceptability criteria before being placed or returned into
                                        service.</span></p>
                                <p><span style="font-weight: 400;">Equipment used for measurement shall be capable of
                                        achieving either the measurement accuracy or measurement uncertainty, or both,
                                        required to provide a valid result (see 7.3.3 and 7.3.4 for details).</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE 1 This includes equipment used in the
                                            laboratory, equipment on loan, or equipment used in point of care settings, or
                                            in associated or mobile facilities, authorized by the laboratory.</span></em>
                                </p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE 2 The verification of equipment acceptance
                                            testing can be, where relevant, based on the calibration certificate of the
                                            returned equipment.</span></em></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><strong>6.4.4</strong></p>
                            </td>
                            <td colspan="30">
                                <p><strong>Equipment instructions for use</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="4">&nbsp;</td>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">The laboratory shall have appropriate safeguards to
                                        prevent unintended adjustments of equipment that can invalidate examination
                                        results.&nbsp;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">Equipment shall be operated by trained, authorized, and
                                        competent personnel.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">Instructions for the use of equipment, including those
                                        provided by the manufacturer, shall be readily available.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">The equipment shall be used as specified by the
                                        manufacturer, unless validated by the laboratory (see 7.3.3).</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="5">
                                <p><strong>6.4.5</strong></p>
                            </td>
                            <td colspan="30">
                                <p><strong>Equipment maintenance and repair</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">The laboratory shall have preventive maintenance
                                        programs, based on manufacturer&rsquo;s instructions. Deviations from the
                                        manufacturer's schedules or instructions shall be recorded.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">Equipment shall be maintained in a safe working condition
                                        and working order. This shall include electrical safety, any emergency stop devices
                                        and the safe handling and disposal of hazardous materials by authorized
                                        personnel.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">c)&nbsp;</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">Equipment that is defective or outside specified
                                        requirements, shall be taken out of service. It shall be clearly labelled or marked
                                        as being out of service, until it has been verified to perform correctly. The
                                        laboratory shall examine the effect of the defect or deviation from specified
                                        requirements and shall initiate actions when non-conforming work occurs (see
                                        7.5).</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">When applicable, the laboratory shall decontaminate
                                        equipment before service, repair or decommissioning, provide suitable space for
                                        repairs and provide appropriate personal protective equipment.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><strong>6.4.6</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Equipment adverse incident reporting</strong></p>
                                <p><span style="font-weight: 400;">Adverse incidents and accidents that can be attributed
                                        directly to specific equipment shall be investigated and reported to either the
                                        manufacturer or supplier, or both, and appropriate authorities, as required.</span>
                                </p>
                                <br />
                                <p><span style="font-weight: 400;">The laboratory shall have procedures for responding to
                                        any manufacturer's recall or other notice, and taking actions recommended by the
                                        manufacturer.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><strong>6.4.7</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Equipment records</strong></p>
                                <p><span style="font-weight: 400;">Records shall be maintained for each item of equipment
                                        that influences the results of laboratory activities.</span></p>
                                <p><span style="font-weight: 400;">These records shall include the following, where
                                        relevant:</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="12">&nbsp;</td>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="21">
                                <p><span style="font-weight: 400;">manufacturer and supplier details, and sufficient
                                        information to uniquely identify each item of equipment, including software and
                                        firmware;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="21">
                                <p><span style="font-weight: 400;">dates of receipt, acceptance testing and entering into
                                        service;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="21">
                                <p><span style="font-weight: 400;">evidence that equipment conforms with specified
                                        acceptability criteria;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="21">
                                <p><span style="font-weight: 400;">the current location;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">e)</span></p>
                            </td>
                            <td colspan="21">
                                <p><span style="font-weight: 400;">condition when received (e.g. new, used or
                                        reconditioned);&nbsp;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">f)</span></p>
                            </td>
                            <td colspan="21">
                                <p><span style="font-weight: 400;">manufacturer's instructions;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">g)</span></p>
                            </td>
                            <td colspan="21">
                                <p><span style="font-weight: 400;">the program for preventive maintenance;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">h)</span></p>
                            </td>
                            <td colspan="21">
                                <p><span style="font-weight: 400;">any maintenance activities performed by the laboratory or
                                        approved external service provider;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">i)</span></p>
                            </td>
                            <td colspan="21">
                                <p><span style="font-weight: 400;">damage to, malfunction, modification, or repair of the
                                        equipment;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">j)</span></p>
                            </td>
                            <td colspan="21">
                                <p><span style="font-weight: 400;">equipment performance records such as reports or
                                        certificates of calibrations or verifications, or both, including dates, times and
                                        results;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">k)</span></p>
                            </td>
                            <td colspan="21">
                                <p><span style="font-weight: 400;">status of the equipment such as active or in-service,
                                        out-of-service, quarantined, retired or obsolete.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="25" class="maxWidthTd">
                                <p><span style="font-weight: 400;">These records shall be maintained and shall be readily
                                        available for the lifespan of the equipment or longer, as specified in 8.4.3.</span>
                                </p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td rowspan="15">
                                <p><strong>6.5</strong></p>
                            </td>
                            <td colspan="33">
                                <p><strong>Equipment calibration and metrological traceability</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><strong>6.5.1</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>General</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall specify calibration and traceability
                                        requirements that are sufficient to maintain consistent reporting of examination
                                        results. For quantitative methods of a measured analyte, specifications shall
                                        include calibration and metrological traceability requirements. Qualitative methods
                                        and quantitative methods that measure characteristics rather than discrete analytes
                                        shall specify the characteristic being assessed and such requirements necessary for
                                        reproducibility over time.</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE Examples of qualitative methods and quantitative
                                            methods that may not allow metrological traceability include red cell antibody
                                            detection, antibiotic sensitivity assessment, genetic testing, erythrocyte
                                            sedimentation rate, flow cytometry marker staining, and tumour HER2
                                            immunohistochemical staining.</span></em></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="7">
                                <p><strong>6.5.2</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Equipment calibration</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall have procedures for the calibration
                                        of equipment that directly or indirectly affects examination results. The procedures
                                        shall specify:</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">conditions of use and manufacturer's instructions for
                                        calibration;&nbsp;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">b)&nbsp;</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">recording of the metrological traceability;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">verification of the required measurement accuracy and the
                                        functioning of the measuring system at specified intervals;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">recording the calibration status and date of
                                        re-calibration;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">e)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">ensuring that, where correction factors are used, these
                                        are updated and recorded when re-calibration occurs;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">f)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">handling of situations when calibration was out of
                                        control, to minimize risk to service operation and to patients.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="6">
                                <p><strong>6.5.3</strong></p>
                            </td>
                            <td colspan="30">
                                <p><strong>Metrological traceability of measurement results</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">The laboratory shall establish and maintain metrological
                                        traceability of its measurement results by means of a documented unbroken chain of
                                        calibrations, each contributing to the measurement uncertainty, linking them to an
                                        appropriate reference.</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE Information of traceability to a higher order
                                            reference material or reference procedure can be provided by an examination
                                            system manufacturer. Such documentation is acceptable only when the
                                            manufacturer's examination system and calibration procedures are used without
                                            modification.</span></em></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">The laboratory shall ensure that measurement results are
                                        traceable to the highest possible level of traceability and to the International
                                        System of Units (SI) through:</span></p>
                                <p><span style="font-weight: 400;">&mdash; calibration provided by a competent laboratory;
                                        or</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE 1 Calibration laboratories fulfilling the
                                            requirements of ISO/IEC 17025 are considered competent for performing
                                            calibrations.</span></em></p>
                                <br />
                                <p><span style="font-weight: 400;">&mdash; certified values of certified reference materials
                                        provided by a competent producer with stated metrological traceability to the
                                        SI;</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE 2 Reference material producers fulfilling the
                                            requirements of ISO 17034 are considered to be competent.</span></em></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE 3 Certified reference material fulfilling the
                                            requirements of ISO 15194 are considered suitable.</span></em></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">Where it is not possible to provide traceability
                                        according to 6.5.3 a), other means for providing confidence in the results shall be
                                        applied, including but not limited to the following:</span></p>
                                <p><span style="font-weight: 400;">&mdash; results of reference measurement procedures,
                                        specified methods or consensus standards, that are clearly described and accepted as
                                        providing measurement results fit for their intended use and ensured by suitable
                                        comparison;</span></p>
                                <p><span style="font-weight: 400;">&mdash; measurement of calibrator by another
                                        procedure.</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE ISO 17511 provides further information on how to
                                            manage the compromises in the metrological traceability of
                                            measurands.</span></em></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">For genetic examinations, traceability to genetic
                                        reference sequences shall be established.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">e)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">For qualitative methods, traceability may be demonstrated
                                        by testing of known material or previous samples sufficient to show consistent
                                        identification and, when applicable, intensity of reaction.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>6.6</strong></p>
                            </td>
                            <td colspan="33">
                                <p><strong>Reagents and consumables</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="12">&nbsp;</td>
                            <td colspan="3">
                                <p><strong>6.6.1</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>General</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall have processes for the selection,
                                        procurement, reception, storage, acceptance testing and inventory management of
                                        reagents and consumables.</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE Reagents include substances which are
                                            commercially supplied or prepared in-house, reference materials (calibrators and
                                            QC materials), culture media; consumables include pipette tips, glass slides,
                                            POCT supplies etc.</span></em></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><strong>6.6.2</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Reagents and consumables &mdash; Receipt and storage</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall store reagents and consumables
                                        according to manufacturers' specifications and monitor the environmental conditions
                                        where relevant.</span></p>
                                <br />
                                <p><span style="font-weight: 400;">When the laboratory is not the receiving facility, it
                                        shall verify that the receiving facility has adequate storage and handling
                                        capabilities to maintain supplies in a manner that prevents damage and
                                        deterioration.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><strong>6.6.3</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Reagents and consumables &mdash; Acceptance testing</strong></p>
                                <p><span style="font-weight: 400;">Each reagent or new formulation of examination kits with
                                        changes in reagents or procedure, or a new lot or shipment, shall be verified for
                                        performance before placing into use, or before release of results, as
                                        appropriate.</span></p>
                                <br />
                                <p><span style="font-weight: 400;">Consumables that can affect the quality of examinations
                                        shall be verified for performance before placing into use.</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE 1 Comparative IQC performance of new reagent
                                            lots and that of previous lots can be used as evidence for acceptance (see
                                            7.3.7.2). Patient samples are preferred when comparing different reagent lots to
                                            avoid issues with commutability of IQC materials.</span></em></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE 2 Verification can sometimes be based on the
                                            certificate of analysis of the reagent.</span></em></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><strong>6.6.4</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Reagents and consumables &mdash; Inventory management</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall establish an inventory management
                                        system for reagents and consumables.</span></p>
                                <br />
                                <p><span style="font-weight: 400;">The system for inventory management shall segregate
                                        reagents and consumables that have been accepted for use from those that have been
                                        neither inspected nor accepted for use.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><strong>6.6.5</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Reagents and consumables &mdash; Instructions for use</strong></p>
                                <p><span style="font-weight: 400;">Instructions for the use of reagents and consumables,
                                        including those provided by manufacturers, shall be readily available. Reagents and
                                        consumables shall be used according to the manufacturer's specifications. If they
                                        are intended to be used for other purposes see 7.3.3.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><strong>6.6.6</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Reagents and consumables &mdash; Adverse incident reporting</strong></p>
                                <p><span style="font-weight: 400;">Adverse incidents and accidents that can be attributed
                                        directly to specific reagents or consumables shall be investigated and reported to
                                        either the manufacturer or supplier, or both, and appropriate authorities, as
                                        required.</span></p>
                                <br />
                                <p><span style="font-weight: 400;">The laboratory shall have procedures for responding to
                                        any manufacturer's recall or other notice and taking actions recommended by the
                                        manufacturer.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="6">
                                <p><strong>6.6.7</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Reagents and consumables &mdash; Records</strong></p>
                                <p><span style="font-weight: 400;">Records shall be maintained for each reagent and
                                        consumable that contributes to the performance of examinations. These records shall
                                        include, but not be limited, to the following:</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="21">
                                <p><span style="font-weight: 400;">identity of the reagent or consumable;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="21">
                                <p><span style="font-weight: 400;">manufacturer's information, including instructions, name
                                        and batch code or lot number;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="21">
                                <p><span style="font-weight: 400;">date of receipt and condition when received, the expiry
                                        date, date of first use and, where applicable, the date the reagent or consumable
                                        was taken out of service;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="21">
                                <p><span style="font-weight: 400;">records that confirm the reagent's or consumable's
                                        initial and ongoing acceptance for use.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="25" class="maxWidthTd">
                                <p><span style="font-weight: 400;">Where the laboratory uses reagents prepared, resuspended
                                        or combined in-house, the records shall include, in addition to the relevant
                                        information above, reference to the person or persons undertaking the preparation,
                                        as well as the dates of preparation and expiry.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td rowspan="7">
                                <p><strong>6.7</strong></p>
                            </td>
                            <td colspan="33">
                                <p><strong>Service agreements</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="5">
                                <p><strong>6.7.1</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Agreements with laboratory users</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall have a procedure to establish and
                                        periodically review agreements for providing laboratory activities.</span></p>
                                <p><span style="font-weight: 400;">The procedure shall ensure:</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">the requirements are adequately specified;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">the laboratory has the capability and resources to meet
                                        the requirements;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">when applicable, the laboratory advises the user of the
                                        specific activities to be performed by referral laboratories and consultants.</span>
                                </p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="25" class="maxWidthTd">
                                <p><span style="font-weight: 400;">Laboratory users shall be informed of any changes to an
                                        agreement that can affect examination results.</span></p>
                                <p><span style="font-weight: 400;">Records of reviews, including any significant changes,
                                        shall be retained.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><strong>6.7.2</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Agreements with POCT operators</strong></p>
                                <p><span style="font-weight: 400;">Service agreements between the laboratory and other parts
                                        of the organization using laboratory supported POCT, shall ensure that respective
                                        responsibilities and authorities are specified and communicated.</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE Established multidisciplinary POCT committees
                                            can be used to manage such service agreements as described in Annex
                                            A.</span></em></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>6.8</strong></p>
                            </td>
                            <td colspan="33">
                                <p><strong>Externally provided products and services</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="16">&nbsp;</td>
                            <td colspan="3" rowspan="5">
                                <p><strong>6.8.1</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>General</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall ensure that externally provided
                                        products and services that affect laboratory activities are suitable when such
                                        products and services are:</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">intended for incorporation into the laboratory's own
                                        activities;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">provided, in part or in full, directly to the user by the
                                        laboratory, as received from the external provider;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">used to support the operation of the laboratory.</span>
                                </p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="25" class="maxWidthTd">
                                <p><span style="font-weight: 400;">It can be necessary to collaborate with other
                                        organizational departments or functions to fulfil this requirement.</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE Services include, e.g. sample collection
                                            services, pipette and other calibration services, facility and equipment
                                            maintenance services, EQA programs, referral laboratories and
                                            consultants.</span></em></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="5">
                                <p><strong>6.8.2</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Referral laboratories and consultants</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall communicate its requirements to
                                        referral laboratories and consultants who provide interpretations and advice,
                                        for:</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">the procedures, examinations, reports and consulting
                                        activities to be provided;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">management of critical results;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">any required personnel qualifications and demonstration
                                        of competence.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="25" class="maxWidthTd">
                                <p><span style="font-weight: 400;">Unless otherwise specified in the agreement, the
                                        referring laboratory (and not the referral laboratory) shall be responsible for
                                        ensuring that examination results of the referral laboratory are provided to the
                                        person making the request.</span></p>
                                <p><span style="font-weight: 400;">A list of all referral laboratories and consultants shall
                                        be maintained.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="6">
                                <p><strong>6.8.3</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Review and approval of externally provided products and services</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall have procedures and retain records
                                        for:</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">defining, reviewing, and approving the laboratory's
                                        requirements for all externally provided products and services;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">defining the criteria for qualification, selection,
                                        evaluation of performance and re-evaluation of external providers;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">referral of samples;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">ensuring that externally provided products and services
                                        conform to the laboratory's established requirements, or where applicable to the
                                        relevant requirements of this document, before they are used or directly provided to
                                        the user;</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">e)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">taking any actions arising from evaluations of the
                                        performance of external providers.</span></p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <th>
                                <p><strong>7</strong></p>
                            </th>
                            <th colspan="34">
                                <p><strong>PROCESS REQUIREMENTS</strong></p>
                            </th>
                        </tr>
                        <tr>
                            <td rowspan="262">
                                <p><strong>7</strong></p>
                            </td>
                            <td>
                                <p><strong>7.1</strong></p>
                            </td>
                            <td colspan="28" class="maxWidthTd">
                                <p><strong>General</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall identify potential risks to patient
                                        care in the pre-examination, examination and post-examination processes. These risks
                                        shall be assessed and mitigated to the extent possible. The residual risk shall be
                                        communicated to users as appropriate.</span></p>
                                <p><span style="font-weight: 400;">The identified risks and effectiveness of the mitigation
                                        processes shall be monitored and evaluated according to the potential harm to the
                                        patient.</span></p>
                                <p><span style="font-weight: 400;">The laboratory shall also identify opportunities to
                                        improve patient care and develop a framework to manage these opportunities (see
                                        8.5).</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td rowspan="68">
                                <p><strong>7.2</strong></p>
                            </td>
                            <td colspan="33">
                                <p><strong>Pre-examination processes</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><strong>7.2.1</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>General</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall have procedures for all
                                        pre-examination activities and make them accessible to relevant personnel.</span>
                                </p>
                                <p><em><span style="font-weight: 400;">NOTE 1 The pre-examination processes can influence
                                            the outcome of the intended examination.</span></em></p>
                                <p><em><span style="font-weight: 400;">NOTE 2 ISO 20658 provides detailed information for
                                            sample collection and transport.</span></em></p>
                                <p><em><span style="font-weight: 400;">NOTE 3 ISO 20186-1, ISO 20186-2, ISO 20186-3, ISO
                                            20166 (all parts), ISO 20184 (all parts), ISO 23118 and ISO 4307 provide
                                            detailed information for samples from particular sources and for specific
                                            analytes.</span></em></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="8">
                                <p><strong>7.2.2</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Laboratory information for patients and users</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall have appropriate information
                                        available for its users and patients. The information shall be sufficiently detailed
                                        to provide laboratory users with a comprehensive understanding of the laboratory's
                                        scope of activities and requirements.</span></p>
                                <p><span style="font-weight: 400;">The information shall include as appropriate:</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">the location(s) of the laboratory, operating hours and
                                        contact information;&nbsp;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">the procedures for requesting and the collection of
                                        samples;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">the scope of laboratory activities and time for expected
                                        availability of results;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">the availability of advisory services;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">e)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">requirements for patient consent;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">f)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">factors known to significantly impact the performance of
                                        the examination or the interpretation of the results;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">g)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">the laboratory complaint process.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="7">
                                <p><strong>7.2.3</strong></p>
                            </td>
                            <td colspan="30">
                                <p><strong>Requests for providing laboratory examinations</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="15" rowspan="5">
                                <p><strong>7.2.3.1</strong></p>
                            </td>
                            <td colspan="10">
                                <p><strong>General</strong></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">Each request accepted by the laboratory for
                                        examination(s) shall be considered an agreement.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">The examination request shall provide sufficient
                                        information to ensure:</span></p>
                                <p><span style="font-weight: 400;">&mdash; unequivocal traceability of the patient to the
                                        request and sample;</span></p>
                                <p><span style="font-weight: 400;">identity and contact information of requester;</span></p>
                                <p><span style="font-weight: 400;">&mdash; identification of the examination(s)
                                        requested;</span></p>
                                <p><span style="font-weight: 400;">&mdash; informed clinical and technical advice, and
                                        clinical interpretation can be provided.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">The examination request information may be provided in a
                                        format or medium as deemed appropriate by the laboratory and acceptable to the
                                        user.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">Where necessary for patient care, the laboratory shall
                                        communicate with users or their representatives, to clarify the user's
                                        request.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="15">
                                <p><strong>7.2.3.2</strong></p>
                            </td>
                            <td colspan="10">
                                <p><strong>Oral requests</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall have a procedure for managing oral
                                        requests for examinations, if applicable, that includes the provision of documented
                                        confirmation of the examination request to the laboratory, within a given
                                        time.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="22">
                                <p><strong>7.2.4</strong></p>
                            </td>
                            <td colspan="30">
                                <p><strong>Primary sample collection and handling</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="15">
                                <p><strong>7.2.4.1</strong></p>
                            </td>
                            <td colspan="10">
                                <p><strong>General</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall have procedures for the collection
                                        and handling of primary samples. Information shall be available to those responsible
                                        for sample collection.</span></p>
                                <br />
                                <p><span style="font-weight: 400;">Any deviation from the established collection procedures
                                        shall be clearly recorded. The potential risk and impact on the patient outcome of
                                        acceptance or rejection of the sample shall be assessed, recorded and shall be
                                        communicated to the appropriate personnel.</span></p>
                                <br />
                                <p><span style="font-weight: 400;">The laboratory shall periodically review requirements for
                                        sample volume, collection device and preservatives for all sample types, as
                                        applicable, to ensure that neither insufficient nor excessive amounts of sample are
                                        collected, and samples are properly collected to preserve the analyte.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="15" rowspan="7">
                                <p><strong>7.2.4.2</strong></p>
                            </td>
                            <td colspan="10">
                                <p><strong>Information for pre-collection activities</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall provide information and instructions
                                        for pre-collection activities with sufficient detail to ensure that the integrity of
                                        the sample is not compromised.</span></p>
                                <p><span style="font-weight: 400;">This shall include:</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">preparation of the patient (e.g. instructions to
                                        caregivers, sample collectors and patients);&nbsp;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">type and amount of the primary sample to be collected
                                        with descriptions of the containers and any necessary additives, and when relevant
                                        the order of collecting samples;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">special timing of collection, where relevant;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">provision of clinical information relevant to, or
                                        affecting sample collection, examination performance or result interpretation (e.g.
                                        history of administration of drugs);</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">e)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">sample labelling for unequivocal identification of the
                                        patient, as well as source and site of sample, and labelling, when several samples
                                        from the same patient are to be collected, including multiple pieces of tissue or
                                        slides;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">f)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">the laboratory&rsquo;s criteria for acceptance and
                                        rejection of samples specific to the examinations requested.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="15" rowspan="4">
                                <p><strong>7.2.4.3</strong></p>
                            </td>
                            <td colspan="15">
                                <p><strong>Patient consent</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">The laboratory shall obtain the informed consent of the
                                        patient for all procedures carried out on the patient.&nbsp;</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE For most routine laboratory procedures, consent
                                            can be inferred when the patient willingly submits to the sample collecting
                                            procedure, for example, venipuncture.</span></em></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">Special procedures, including more invasive procedures,
                                        or those with an increased risk of complications to the procedure, may need a more
                                        detailed explanation and, in some cases, recorded consent.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">If obtaining consent is not possible in emergency
                                        situations, the laboratory may carry out necessary procedures, provided they are in
                                        the patient&rsquo;s best interest.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="15" rowspan="9">
                                <p><strong>7.2.4.4</strong></p>
                            </td>
                            <td colspan="10">
                                <p><strong>Instructions for collection activities</strong></p>
                                <p><span style="font-weight: 400;">To ensure safe, accurate and clinically appropriate
                                        sample collection and pre-examination storage, the laboratory shall provide
                                        instructions for:</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">verification of the identity of the patient from whom a
                                        primary sample is collected;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">verification and when relevant, recording that the
                                        patient meets pre-examination requirements [e.g. fasting status, medication status
                                        (time of last dose, cessation), sample collection at predetermined time or time
                                        intervals];</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">collection of primary samples, with descriptions of the
                                        primary sample containers and any necessary additives, as well as the order of
                                        sample collection, where relevant;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">labelling of primary samples in a manner that provides an
                                        unequivocal link with the patients from whom they are collected;&nbsp;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">e)</span></p>
                            </td>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">recording of the identity of the person collecting the
                                        primary sample and the collection date, and, when relevant, recording of the
                                        collection time;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">f)</span></p>
                            </td>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">requirements for separating or dividing the primary
                                        sample when necessary;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">g)</span></p>
                            </td>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">stabilization and proper storage conditions before
                                        collected samples are delivered to the laboratory;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">h)</span></p>
                            </td>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">safe disposal of materials used in the collection
                                        process.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="8">
                                <p><strong>7.2.5</strong></p>
                            </td>
                            <td colspan="30">
                                <p><strong>Sample transportation</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" rowspan="5">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">To ensure the timely and safe transportation of samples,
                                        the laboratory shall provide instructions for:&nbsp;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="9">
                                <p><span style="font-weight: 400;">1)</span></p>
                            </td>
                            <td colspan="10">
                                <p><span style="font-weight: 400;">packaging of samples for transportation;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="9">
                                <p><span style="font-weight: 400;">2)</span></p>
                            </td>
                            <td colspan="10">
                                <p><span style="font-weight: 400;">ensuring the time between collection and receipt in the
                                        laboratory is appropriate for the requested examinations;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="9">
                                <p><span style="font-weight: 400;">3)</span></p>
                            </td>
                            <td colspan="10">
                                <p><span style="font-weight: 400;">maintaining the temperature interval specified for sample
                                        collection and handling;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="9">
                                <p><span style="font-weight: 400;">4)</span></p>
                            </td>
                            <td colspan="10">
                                <p><span style="font-weight: 400;">any specific requirements to ensure integrity of samples,
                                        e.g. use of designated preservatives</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">If the integrity of a sample has been compromised and
                                        there is a health risk, the organization responsible for the transport of the sample
                                        shall be notified immediately and action taken to reduce the risk and to prevent
                                        recurrence.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">The laboratory shall establish and periodically evaluate
                                        adequacy of sample transportation systems.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="17">
                                <p><strong>7.2.6</strong></p>
                            </td>
                            <td colspan="30">
                                <p><strong>Sample receipt</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="15" rowspan="8">
                                <p><strong>7.2.6.1</strong></p>
                            </td>
                            <td colspan="10">
                                <p><strong>Sample receipt procedure</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall have a procedure for sample receipt
                                        that includes:</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">the unequivocal traceability of samples by request and
                                        labelling, to a uniquely identified patient and when applicable, the anatomical
                                        site;&nbsp;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">criteria for acceptance and rejection of samples;</span>
                                </p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">recording the date and time of receipt of the sample,
                                        when relevant;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">recording the identity of the person receiving the
                                        sample, when relevant;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">e)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">evaluation of received samples, by authorized personnel,
                                        to ensure compliance with acceptability criteria relevant for the requested
                                        examination(s);</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">f)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">instructions for samples specifically marked as urgent,
                                        which include details of special labelling, transport, any rapid processing method,
                                        turnaround times, and special reporting criteria to be followed;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">g)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">ensuring that all portions of the sample shall be
                                        unequivocally traceable to the original sample.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="15" rowspan="8">
                                <p><strong>7.2.6.2</strong></p>
                            </td>
                            <td colspan="10">
                                <p><strong>Sample acceptance exceptions</strong></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5" rowspan="6">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">The laboratory shall have a process that considers the
                                        best interests of the patient in receiving care, when a sample has been compromised
                                        due to</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">1)</span></p>
                            </td>
                            <td>
                                <p><span style="font-weight: 400;">incorrect patient or sample identification,</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                            <td colspan="2" rowspan="5">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">2)</span></p>
                            </td>
                            <td>
                                <p><span style="font-weight: 400;">sample instability due to, for example, delay in
                                        transport,</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">3)</span></p>
                            </td>
                            <td>
                                <p><span style="font-weight: 400;">incorrect storage or handling temperature,</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">4)</span></p>
                            </td>
                            <td>
                                <p><span style="font-weight: 400;">inappropriate container(s), and</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">5)</span></p>
                            </td>
                            <td>
                                <p><span style="font-weight: 400;">insufficient sample volume.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">When a compromised clinically critical or irreplaceable
                                        sample is accepted, after consideration of the risk to patient safety, the final
                                        report shall indicate the nature of the problem and where applicable, advising
                                        caution when interpreting results that can be affected.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="4">
                                <p><strong>7.2.7</strong></p>
                            </td>
                            <td colspan="30">
                                <p><strong>Pre-examination handling, preparation, and storage</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="15">
                                <p><strong>7.2.7.1</strong></p>
                            </td>
                            <td colspan="10">
                                <p><strong>Sample protection</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall have procedures and appropriate
                                        facilities for securing patient samples, ensuring sample integrity and preventing
                                        loss or damage during, handling, preparation and storage.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="15">
                                <p><strong>7.2.7.2</strong></p>
                            </td>
                            <td colspan="10">
                                <p><strong>Criteria for additional examination requests</strong></p>
                                <br />
                                <p><span style="font-weight: 400;">Laboratory procedures shall include time limits for
                                        requesting additional examinations on the same sample.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="15">
                                <p><strong>7.2.7.3</strong></p>
                            </td>
                            <td colspan="10">
                                <p><strong>Sample stability</strong></p>
                                <p><span style="font-weight: 400;">Considering the stability of the analyte in a primary
                                        sample, the time between sample collection and performing the examination shall be
                                        specified and monitored where relevant.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>7.3</strong></p>
                            </td>
                            <td colspan="33">
                                <p><strong>Examination processes</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="96">&nbsp;</td>
                            <td colspan="3" rowspan="6">
                                <p><strong>7.3.1</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>General</strong></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">The laboratory shall select and use examination methods
                                        which have been validated for their intended use to assure the clinical accuracy of
                                        the examination for patient testing.</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE Preferred methods are those specified in the
                                            instructions for use of in vitro diagnostic medical devices or those that have
                                            been published in established/authoritative textbooks, peer-reviewed texts, or
                                            journals, or in international and national consensus standards or guidelines, or
                                            national or regional regulations.&nbsp;</span></em></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">The performance specifications for each examination
                                        method shall relate to the intended use of that examination and its impact on
                                        patient care.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">All procedures and supporting documentation, such as
                                        instructions, standards, manuals and reference data relevant to the laboratory
                                        activities, shall be kept up to date and be readily available to personnel (see
                                        8.3).</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">Personnel shall follow established procedures and the
                                        identity of persons performing significant activities in examination processes be
                                        recorded, including POCT operators.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">e)</span></p>
                            </td>
                            <td colspan="19">
                                <p><span style="font-weight: 400;">Authorized personnel shall periodically evaluate the
                                        examination methods provided by the laboratory to ensure they are clinically
                                        appropriate for the requests received.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="10">
                                <p><strong>7.3.2</strong></p>
                            </td>
                            <td colspan="30">
                                <p><strong>Verification of examination methods&nbsp;</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="20">
                                <p><span style="font-weight: 400;">The laboratory shall have a procedure to verify that it
                                        can properly perform examination methods before introducing into use, by ensuring
                                        that the required performance, as specified by the manufacturer or method, can be
                                        achieved.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="20">
                                <p><span style="font-weight: 400;">The performance specifications for the examination method
                                        confirmed during the verification process shall be those relevant to the intended
                                        use of the examination results.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="20">
                                <p><span style="font-weight: 400;">The laboratory shall ensure the extent of the
                                        verification of examination methods is sufficient to ensure the validity of results
                                        pertinent to clinical decision making.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="20">
                                <p><span style="font-weight: 400;">Personnel with the appropriate authorization and
                                        competence shall review the verification results and record whether the results meet
                                        the specified requirements.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">e)</span></p>
                            </td>
                            <td colspan="20">
                                <p><span style="font-weight: 400;">If a method is revised by the issuing body, the
                                        laboratory shall repeat verification to the extent necessary.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5" rowspan="4">
                                <p><span style="font-weight: 400;">f)</span></p>
                            </td>
                            <td colspan="20">
                                <p><span style="font-weight: 400;">The following records of verification shall be
                                        retained:</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="9">
                                <p><span style="font-weight: 400;">1)</span></p>
                            </td>
                            <td colspan="11">
                                <p><span style="font-weight: 400;">performance specifications to be achieved,</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="9">
                                <p><span style="font-weight: 400;">2)</span></p>
                            </td>
                            <td colspan="11">
                                <p><span style="font-weight: 400;">results obtained, and</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="9">
                                <p><span style="font-weight: 400;">3)</span></p>
                            </td>
                            <td colspan="11">
                                <p><span style="font-weight: 400;">a statement of whether the performance specifications
                                        were achieved and if not, action taken.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="14">
                                <p><strong>7.3.3</strong></p>
                            </td>
                            <td colspan="30">
                                <p><strong>Validation of examination methods</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" rowspan="4">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="20">
                                <p><span style="font-weight: 400;">The laboratory shall validate examination methods derived
                                        from the following sources:</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="9">
                                <p><span style="font-weight: 400;">1)</span></p>
                            </td>
                            <td colspan="11">
                                <p><span style="font-weight: 400;">laboratory designed or developed methods;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="9">
                                <p><span style="font-weight: 400;">2)</span></p>
                            </td>
                            <td colspan="11">
                                <p><span style="font-weight: 400;">methods used outside their originally intended scope
                                        (i.e. outside of the manufacturer's instructions for use, or original validated
                                        measurement range; third party reagents used on instruments other than intended
                                        instruments and where no validation data are available);</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="9">
                                <p><span style="font-weight: 400;">3)</span></p>
                            </td>
                            <td colspan="11">
                                <p><span style="font-weight: 400;">validated methods subsequently modified.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="20">
                                <p><span style="font-weight: 400;">The validation shall be as extensive as is necessary and
                                        confirm, through the provision of objective evidence in the form of performance
                                        specifications, that the specific requirements for the intended use of the
                                        examination have been fulfilled. The laboratory shall ensure that the extent of
                                        validation of an examination method is sufficient to ensure the validity of results
                                        pertinent to clinical decision making.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="20">
                                <p><span style="font-weight: 400;">Personnel with the appropriate authorization and
                                        competence shall review the validation results and record whether the results meet
                                        the specified requirements.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="20">
                                <p><span style="font-weight: 400;">When changes are proposed to a validated examination
                                        method, the clinical impact shall be reviewed, and a decision made as to whether to
                                        implement the modified method.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5" rowspan="6">
                                <p><span style="font-weight: 400;">e)</span></p>
                            </td>
                            <td colspan="20">
                                <p><span style="font-weight: 400;">The following records of validation shall be
                                        retained:</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="9">
                                <p><span style="font-weight: 400;">1)</span></p>
                            </td>
                            <td colspan="11">
                                <p><span style="font-weight: 400;">the validation procedure used;&nbsp;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="9">
                                <p><span style="font-weight: 400;">2)</span></p>
                            </td>
                            <td colspan="11">
                                <p><span style="font-weight: 400;">specific requirements for the intended use;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="9">
                                <p><span style="font-weight: 400;">3)</span></p>
                            </td>
                            <td colspan="11">
                                <p><span style="font-weight: 400;">determination of the performance specifications of the
                                        method;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="9">
                                <p><span style="font-weight: 400;">4)</span></p>
                            </td>
                            <td colspan="11">
                                <p><span style="font-weight: 400;">results obtained;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="9">
                                <p><span style="font-weight: 400;">5)</span></p>
                            </td>
                            <td colspan="11">
                                <p><span style="font-weight: 400;">a statement on the validity of the method, detailing its
                                        fitness for the intended use.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="9">
                                <p><strong>7.3.4</strong></p>
                            </td>
                            <td colspan="30">
                                <p><strong>Evaluation of measurement uncertainty (MU)</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="20">
                                <p><span style="font-weight: 400;">The MU of measured quantity values shall be evaluated and
                                        maintained for its intended use, where relevant. The MU shall be compared against
                                        performance specifications and documented.</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE ISO/TS 20914 provides details on these
                                            activities together with examples.&nbsp;</span></em></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="20">
                                <p><span style="font-weight: 400;">MU evaluations shall be regularly reviewed.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="20">
                                <p><span style="font-weight: 400;">For examination procedures where evaluation of MU is not
                                        possible or relevant, the rationale for exclusion from MU estimation shall be
                                        documented.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="20">
                                <p><span style="font-weight: 400;">MU information shall be made available to laboratory
                                        users on request.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">e)</span></p>
                            </td>
                            <td colspan="20">
                                <p><span style="font-weight: 400;">When users have inquiries on MU, the laboratory&rsquo;s
                                        response shall take into account other sources of uncertainty, such as, but not
                                        limited to biological variation.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">f)</span></p>
                            </td>
                            <td colspan="20">
                                <p><span style="font-weight: 400;">If the qualitative result of an examination relies on a
                                        test which produces quantitative output data and is specified as positive or
                                        negative, based on a threshold, MU in the output quantity shall be estimated using
                                        representative positive and negative samples.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">g)</span></p>
                            </td>
                            <td colspan="20">
                                <p><span style="font-weight: 400;">For examinations with qualitative results, MU in
                                        intermediate measurement steps or IQC results which produce quantitative data should
                                        also be considered for key (high risk) parts of the process.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">h)</span></p>
                            </td>
                            <td colspan="20">
                                <p><span style="font-weight: 400;">MU should be taken into consideration when performing
                                        verification or validation of a method, when relevant.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="5">
                                <p><strong>7.3.5</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Biological reference intervals and clinical decision limits</strong></p>
                                <br />
                                <p><span style="font-weight: 400;">Biological reference intervals and clinical decision
                                        limits, when needed for interpretation of examination results, shall be defined and
                                        communicated to users.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="20">
                                <p><span style="font-weight: 400;">Biological reference intervals and clinical decision
                                        limits shall be defined, and their basis recorded, to reflect the patient population
                                        served by the laboratory, while considering the risk to patients.</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE Biological reference values, provided by the
                                            manufacturer can be used by the laboratory, if the population base of these
                                            values is verified and deemed acceptable by the laboratory.</span></em></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="20">
                                <p><span style="font-weight: 400;">Biological reference intervals and clinical decision
                                        limits shall be periodically reviewed, and any changes communicated to
                                        users.&nbsp;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="20">
                                <p><span style="font-weight: 400;">When changes are made to an examination or
                                        pre-examination method, the laboratory shall review the impact on associated
                                        biological reference intervals and clinical decision limits and communicate to the
                                        users when applicable.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="20">
                                <p><span style="font-weight: 400;">For examinations that identify presence or absence of a
                                        characteristic, the biological reference interval is the characteristic to be
                                        identified, e.g. genetic examinations.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="7">
                                <p><strong>7.3.6</strong></p>
                            </td>
                            <td colspan="30">
                                <p><strong>Documentation of examination procedures</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="20">
                                <p><span style="font-weight: 400;">The laboratory shall document its examination procedures
                                        to the extent necessary to ensure the consistent application of its activities and
                                        the validity of its results.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="20">
                                <p><span style="font-weight: 400;">Procedures shall be written in a language understood by
                                        laboratory personnel and be available in appropriate locations.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="20">
                                <p><span style="font-weight: 400;">Any abbreviated document content shall correspond to the
                                        procedure.</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE Working instructions, flow process diagrams or
                                            similar systems that summarize key information are acceptable for use as a quick
                                            reference at the workbench, provided that a full procedure is available for
                                            reference and that the summarized information is updated as needed, concurrently
                                            with the full procedure update.</span></em></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="20">
                                <p><span style="font-weight: 400;">Information from product instructions for use, that
                                        contain sufficient information, can be incorporated into procedures by
                                        reference.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">e)</span></p>
                            </td>
                            <td colspan="20">
                                <p><span style="font-weight: 400;">When the laboratory makes a validated change to an
                                        examination procedure which could affect interpretation of results, the implications
                                        of this shall be explained to users.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">f)</span></p>
                            </td>
                            <td colspan="20">
                                <p><span style="font-weight: 400;">All documents associated with the examination process
                                        shall be subject to document control (see 8.3).</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="45">
                                <p><strong>7.3.7</strong></p>
                            </td>
                            <td colspan="30">
                                <p><strong>Ensuring the validity of examination results</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="14">
                                <p><strong>7.3.7.1</strong></p>
                            </td>
                            <td colspan="11">
                                <p><strong>General</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall have a procedure for monitoring the
                                        validity of results. The resulting data shall be recorded in such a way that trends
                                        and shifts are detectable and, where practicable, statistical techniques shall be
                                        applied to review the results. This monitoring shall be planned and reviewed.</span>
                                </p>
                            </td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="14" rowspan="20">
                                <p><strong>7.3.7.2</strong></p>
                            </td>
                            <td colspan="11">
                                <p><strong>Internal quality control (IQC)</strong></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="4">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">The laboratory shall have an IQC procedure for monitoring
                                        the ongoing validity of examination results, according to specified criteria, that
                                        verifies the attainment of the intended quality and ensures validity pertinent to
                                        clinical decision making.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">1)</span></p>
                            </td>
                            <td colspan="2">
                                <p><span style="font-weight: 400;">The intended clinical application of the examination
                                        should be considered, as the performance specifications for the same measurand can
                                        differ in different clinical settings.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">2)</span></p>
                            </td>
                            <td colspan="2">
                                <p><span style="font-weight: 400;">The procedure should also allow for the detection of
                                        either lot-to-lot reagent or calibrator variation, or both, of the examination
                                        method. To enable this, the laboratory procedure should avoid lot change in IQC
                                        material on the same day/run as either lot-to-lot reagent or calibrator change, or
                                        both.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">3)</span></p>
                            </td>
                            <td colspan="2">
                                <p><span style="font-weight: 400;">The use of third-party IQC material should be considered,
                                        either as an alternative to, or in addition to, control material supplied by the
                                        reagent or instrument manufacturer.</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE Monitoring of interpretations and opinions can
                                            be achieved through regular peer review of examination results.</span></em></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="5">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">The laboratory shall select IQC material that is fit for
                                        its intended purpose. When selecting IQC material, factors to be considered shall
                                        include:&nbsp;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">1)</span></p>
                            </td>
                            <td colspan="2">
                                <p><span style="font-weight: 400;">stability with regard to the properties of
                                        interest;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">2)</span></p>
                            </td>
                            <td colspan="2">
                                <p><span style="font-weight: 400;">the matrix is as close as possible to that of patient
                                        samples;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">3)</span></p>
                            </td>
                            <td colspan="2">
                                <p><span style="font-weight: 400;">the IQC material reacts to the examination method in a
                                        manner as close as possible to patient samples;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">4)</span></p>
                            </td>
                            <td colspan="2">
                                <p><span style="font-weight: 400;">the IQC material provides a clinically relevant challenge
                                        to the examination method, has concentration levels at or near clinical decision
                                        limits and when possible, covers the measurement range of the examination
                                        method.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="3" rowspan="4">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">If appropriate IQC material is not available, the
                                        laboratory shall consider the use of other methods for IQC. Examples of such other
                                        methods may include:&nbsp;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">1)</span></p>
                            </td>
                            <td colspan="2">
                                <p><span style="font-weight: 400;">trend analysis of patient results, e.g. with moving
                                        average of patient results, or percentage of samples with results below or above
                                        certain values or associated with a diagnosis;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">2)</span></p>
                            </td>
                            <td colspan="2">
                                <p><span style="font-weight: 400;">comparison of results for patient samples on a specified
                                        schedule to results for patient samples examined by an alternative procedure
                                        validated to have its calibration metrologically traceable to the same or higher
                                        order references as specified in ISO 17511;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">3)</span></p>
                            </td>
                            <td colspan="2">
                                <p><span style="font-weight: 400;">retesting of retained patient samples.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">IQC shall be performed at a frequency that is based on
                                        the stability and robustness of the examination method and the risk of harm to the
                                        patient from an erroneous result.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><span style="font-weight: 400;">e)</span></p>
                            </td>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">The resulting data shall be recorded in such a way that
                                        trends and shifts are detectable and, where applicable, statistical techniques shall
                                        be applied to review the results.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><span style="font-weight: 400;">f)</span></p>
                            </td>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">IQC data shall be reviewed with defined acceptability
                                        criteria at regular intervals, and in a timeframe that allows a meaningful
                                        indication of current performance.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="3" rowspan="3">
                                <p><span style="font-weight: 400;">g)</span></p>
                            </td>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">The laboratory shall prevent the release of patient
                                        results in the event that IQC fails the defined acceptability criteria.&nbsp;</span>
                                </p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">1)</span></p>
                            </td>
                            <td colspan="2">
                                <p><span style="font-weight: 400;">When IQC defined acceptability criteria are not fulfilled
                                        and indicate results are likely to contain clinically significant errors, the
                                        results shall be rejected and relevant patient samples re-examined after the error
                                        has been corrected (see 7.5).</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">2)</span></p>
                            </td>
                            <td colspan="2">
                                <p><span style="font-weight: 400;">The results from patient samples that were examined after
                                        the last successful IQC event shall be evaluated.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="14" rowspan="17">
                                <p><strong>7.3.7.3</strong></p>
                            </td>
                            <td colspan="16">
                                <p><strong>External quality assessment (EQA)</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">The laboratory shall monitor its performance of
                                        examination methods, by comparison with results of other laboratories. This includes
                                        participation in EQA programs appropriate to the examinations and interpretation of
                                        examination results, including POCT examination methods.&nbsp;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">The laboratory shall establish a procedure for EQA
                                        enrollment, participation and performance for examination methods used, where such
                                        programs are available.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">EQA samples shall be processed by personnel who routinely
                                        perform pre-examination, examination, and post-examination procedures.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="4">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">The EQA program(s) selected by the laboratory shall, to
                                        the extent possible:</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">1)</span></p>
                            </td>
                            <td colspan="2">
                                <p><span style="font-weight: 400;">have the effect of checking pre-examination, examination,
                                        and post-examination processes;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">2)</span></p>
                            </td>
                            <td colspan="2">
                                <p><span style="font-weight: 400;">provide samples that mimic patient samples for clinically
                                        relevant challenges;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">3)</span></p>
                            </td>
                            <td colspan="2">
                                <p><span style="font-weight: 400;">fulfill ISO/IEC 17043 requirements.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="3" rowspan="5">
                                <p><span style="font-weight: 400;">e)</span></p>
                            </td>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">When selecting EQA program(s), the laboratory should
                                        consider the type of target value offered.</span></p>
                                <p><span style="font-weight: 400;">Target values are:</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">1)</span></p>
                            </td>
                            <td colspan="2">
                                <p><span style="font-weight: 400;">independently set by a reference method, or</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">2)</span></p>
                            </td>
                            <td colspan="2">
                                <p><span style="font-weight: 400;">set by overall consensus data, and/or</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">3)</span></p>
                            </td>
                            <td colspan="2">
                                <p><span style="font-weight: 400;">set by method peer group consensus data, or</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">4)</span></p>
                            </td>
                            <td colspan="2">
                                <p><span style="font-weight: 400;">set by a panel of experts.</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE 1 When method-independent target values are not
                                            available, consensus values can be used to determine whether deviations are
                                            laboratory- or method-specific.</span></em></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE 2 Where lack of commutability of EQA materials
                                            can hamper comparison between some methods, it can still be useful for
                                            comparisons to be made between methods for which it is commutable, rather than
                                            relying only on within-method comparisons.</span></em></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><span style="font-weight: 400;">f)</span></p>
                            </td>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">When an EQA programme is either not available, or not
                                        considered suitable, the laboratory shall use alternative methodologies to monitor
                                        examination method performance. The laboratory shall justify the rationale for the
                                        chosen alternative and provide evidence of its effectiveness.</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE Acceptable alternatives include:</span></em></p>
                                <ul>
                                    <li style="font-weight: 400;"><em><span style="font-weight: 400;">participation in
                                                sample exchanges with other laboratories;</span></em></li>
                                    <li style="font-weight: 400;"><em><span style="font-weight: 400;">interlaboratory
                                                comparisons of the results of the examination of identical IQC materials,
                                                which evaluates individual laboratory IQC results against pooled results
                                                from participants using the same IQC material;</span></em></li>
                                    <li style="font-weight: 400;"><em><span style="font-weight: 400;">analysis of a
                                                different lot number of the manufacturer's end-user calibrator or the
                                                manufacturer's trueness control material;</span></em></li>
                                    <li style="font-weight: 400;"><em><span style="font-weight: 400;">analysis of
                                                microbiological organisms using split/ blind testing of the same sample by
                                                at least two persons, or on at least two analyzers, or by at least two
                                                methods;</span></em></li>
                                    <li style="font-weight: 400;"><em><span style="font-weight: 400;">analysis of reference
                                                materials considered to be commutable with patient samples;</span></em></li>
                                    <li style="font-weight: 400;"><em><span style="font-weight: 400;">analysis of patient
                                                samples from clinical correlation studies;</span></em></li>
                                </ul>
                                <ul>
                                    <li style="font-weight: 400;"><em><span style="font-weight: 400;">analysis of materials
                                                from cell and tissue repositories.</span></em></li>
                                </ul>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><span style="font-weight: 400;">g)</span></p>
                            </td>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">EQA data shall be reviewed at regular intervals with
                                        specified acceptability criteria, in a time frame which allows for a meaningful
                                        indication of current performance.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><span style="font-weight: 400;">h)</span></p>
                            </td>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">Where EQA results fall outside specified acceptability
                                        criteria, appropriate action shall be taken (see 8.7), including an assessment of
                                        whether the non-conformance is clinically significant as it relates to patient
                                        samples.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><span style="font-weight: 400;">i)</span></p>
                            </td>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">Where it is determined that the impact is clinically
                                        significant, a review of patient results that could have been affected and the need
                                        for amendment shall be considered and users advised as appropriate.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="14" rowspan="6">
                                <p><strong>7.3.7.4</strong></p>
                            </td>
                            <td colspan="11">
                                <p><strong>Comparability of examination results</strong></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="7">
                                <p><span style="font-weight: 400;">When either different methods or equipment, or both, are
                                        used for an examination, and/or the examination is performed at different sites, a
                                        procedure for establishing the comparability of results for patient samples
                                        throughout the clinically significant intervals shall be specified.</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE The use of patient samples when comparing
                                            different examination methods can avoid the difficulties linked to the limited
                                            commutability of IQC materials. When patient samples are either not available or
                                            impractical, see all options described for IQC and EQA.</span></em></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="7">
                                <p><span style="font-weight: 400;">The laboratory shall record the results of comparability
                                        performed and its acceptability.&nbsp;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="7">
                                <p><span style="font-weight: 400;">The laboratory shall periodically review the
                                        comparability of results.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="7">
                                <p><span style="font-weight: 400;">Where differences are identified, the impact of those
                                        differences on biological reference intervals and clinical decision limits shall be
                                        evaluated and acted upon.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">e)</span></p>
                            </td>
                            <td colspan="7">
                                <p><span style="font-weight: 400;">The laboratory shall inform users of any clinically
                                        significant differences in comparability of result</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>7.4</strong></p>
                            </td>
                            <td colspan="33">
                                <p><strong>Post-examination processes</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="56">&nbsp;</td>
                            <td colspan="3" rowspan="50">
                                <p><strong>7.4.1</strong></p>
                            </td>
                            <td colspan="30">
                                <p><strong>Reporting of results</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="14" rowspan="4">
                                <p><strong>7.4.1.1</strong></p>
                            </td>
                            <td colspan="16">
                                <p><strong>General</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">Examination results shall be reported accurately,
                                        clearly, unambiguously and in accordance with any specific instructions in the
                                        examination procedure. The report shall include all available information necessary
                                        for the interpretation of the results.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">The laboratory shall have a procedure to notify users
                                        when examination results are delayed, based on the impact of the delay on the
                                        patient.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">All information associated with issued reports shall be
                                        retained in accordance with management system requirements (see 8.4).</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE For the purposes of this document, reports can
                                            be issued as hard copies or by electronic means, provided that the requirements
                                            of this document are met.</span></em></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="14">
                                <p><strong>7.4.1.2</strong></p>
                            </td>
                            <td colspan="11">
                                <p><strong>Result review and release</strong></p>
                                <p><span style="font-weight: 400;">Results shall be reviewed and authorized prior to
                                        release.</span></p>
                                <p><span style="font-weight: 400;">The laboratory shall ensure that authorized personnel
                                        review the results of examinations and evaluate them against IQC and, as
                                        appropriate, available clinical information and previous examination results.</span>
                                </p>
                                <p><span style="font-weight: 400;">Responsibilities and procedures for how examination
                                        results are released for reporting, including by whom and to whom, shall be
                                        specified.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="14" rowspan="4">
                                <p><strong>7.4.1.3</strong></p>
                            </td>
                            <td colspan="11">
                                <p><strong>Critical result reports</strong></p>
                                <p><span style="font-weight: 400;">When examination results fall within established critical
                                        decision limits:</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">the user or other authorized person is notified as soon
                                        as relevant, based on clinical information available;&nbsp;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">actions taken are documented, including date, time,
                                        responsible person, person notified, results conveyed, verification of accuracy of
                                        communication, and any difficulties encountered in notification;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">the laboratory shall have an escalation procedure for
                                        laboratory personnel when a responsible person cannot be contacted.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="14" rowspan="6">
                                <p><strong>7.4.1.4</strong></p>
                            </td>
                            <td colspan="16">
                                <p><strong>Special considerations for results</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">When agreed with the user, the results may be reported in
                                        a simplified way. Any information listed in 7.4.1.6 and 7.4.1.7 that is not reported
                                        to the user shall be readily available.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">When results are transmitted as a preliminary report, the
                                        final report shall always be forwarded to the user.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">Records shall be kept of all results which are provided
                                        orally, including details of verification of accuracy of communication, as in
                                        7.4.1.3 b). Such results shall always be followed by a report.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">Special counselling may be needed for examination results
                                        with serious implications for the patient (e.g. for genetic or certain infectious
                                        diseases). Laboratory management should ensure that these results are not
                                        communicated to the patient without the opportunity for adequate counselling.</span>
                                </p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">e)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">Results of laboratory examinations that have been
                                        anonymized may be used for such purposes as epidemiology, demography, or other
                                        statistical analyses, provided that all risks to patient privacy and confidentiality
                                        are mitigated and in accordance with any either legal or regulatory requirements, or
                                        both.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="14" rowspan="5">
                                <p><strong>7.4.1.5</strong></p>
                            </td>
                            <td colspan="11">
                                <p><strong>Automated selection, review, release and reporting of results</strong></p>
                                <p><span style="font-weight: 400;">When the laboratory implements a system for automated
                                        selection, review, release and reporting of results, it shall establish a procedure
                                        to ensure that:</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">the criteria for automated selection, review and release
                                        are specified, approved, readily available and understood by personnel responsible
                                        for authorizing the release of results;&nbsp;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">the criteria are validated and approved before use,
                                        regularly reviewed and verified after changes to the reporting system that can
                                        affect their proper functioning and place patient care at risk;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">results selected by an automated reporting system for
                                        manual review are identifiable; and as appropriate, date and time of selection and
                                        review, as well as identity of the reviewer are retrievable;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">when necessary, rapid suspension of automated selection,
                                        review, release and reporting is applied</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="14" rowspan="14">
                                <p><strong>7.4.1.6</strong></p>
                            </td>
                            <td colspan="11">
                                <p><strong>Requirements for reports</strong></p>
                                <p><span style="font-weight: 400;">Each report shall include the following information,
                                        unless the laboratory has documented reasons for omitting any items:</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <p><span style="font-weight: 400;">a</span></p>
                            </td>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">unique patient identification, the date of primary sample
                                        collection and the date of the issue of the report, on each page of the
                                        report;&nbsp;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">identification of the laboratory issuing the
                                        report;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">name or other unique identifier of the user;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">type of primary sample and any specific information
                                        necessary to describe the sample (e.g. source, site of specimen, macroscopic
                                        description);</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <p><span style="font-weight: 400;">e)</span></p>
                            </td>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">clear, unambiguous identification of the examinations
                                        performed;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <p><span style="font-weight: 400;">f)</span></p>
                            </td>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">identification of the examination method used, where
                                        relevant, including, where possible and necessary, harmonized (electronic)
                                        identification of the measurand and measurement principle;</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE Logical Observation Identifiers Names and Codes
                                            (LOINC) and Nomenclature for Properties and Units (NPU, NGC) and SNOMED CT are
                                            examples of electronic identification.</span></em></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <p><span style="font-weight: 400;">g)</span></p>
                            </td>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">examination results with, where appropriate, the units of
                                        measurement, reported in SI units, units traceable to SI units, or other applicable
                                        units;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <p><span style="font-weight: 400;">h)</span></p>
                            </td>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">biological reference intervals, clinical decision limits,
                                        likelihood ratios or diagrams/nomograms supporting clinical decision limits as
                                        necessary;</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE Lists or tables of biological reference
                                            intervals can be distributed to users of the laboratory.</span></em></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <p><span style="font-weight: 400;">i)</span></p>
                            </td>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">identification of examinations undertaken as part of a
                                        research or development programme and for which no specific claims on measurement
                                        performance are available;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <p><span style="font-weight: 400;">j)</span></p>
                            </td>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">identification of the person(s) reviewing the results and
                                        authorizing the release of the report (if not contained in the report, readily
                                        available when needed);&nbsp;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <p><span style="font-weight: 400;">k)</span></p>
                            </td>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">identification of any results that need to be considered
                                        as preliminary;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <p><span style="font-weight: 400;">l)</span></p>
                            </td>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">indications of any critical results;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <p><span style="font-weight: 400;">m)</span></p>
                            </td>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">unique identification that all its components are
                                        recognized as a portion of a complete report and a clear identification of the end
                                        (e.g. page number to total number of pages).</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="14" rowspan="9">
                                <p><strong>7.4.1.7</strong></p>
                            </td>
                            <td colspan="16">
                                <p><strong>Additional information for reports</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">When necessary for patient care, the time of primary
                                        sample collection shall be included.&nbsp;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">Time of report release, if not contained in the report,
                                        shall be readily available when needed.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">Identification of all examinations or parts of
                                        examinations performed by a referral laboratory, including information provided by
                                        consultants, without alteration, as well as the name of the laboratory performing
                                        the examinations.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="7" rowspan="5">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="4">
                                <p><span style="font-weight: 400;">When applicable, a report shall include interpretation of
                                        results and comments on:</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                            <td colspan="2" rowspan="5">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><span style="font-weight: 400;">1)</span></p>
                            </td>
                            <td>
                                <p><span style="font-weight: 400;">sample quality and suitability that can compromise the
                                        clinical value of examination results;&nbsp;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><span style="font-weight: 400;">2)</span></p>
                            </td>
                            <td>
                                <p><span style="font-weight: 400;">discrepancies when examinations are performed by
                                        different procedures (e.g. POCT) or in different locations;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><span style="font-weight: 400;">3)</span></p>
                            </td>
                            <td>
                                <p><span style="font-weight: 400;">possible risk of misinterpretation when different units
                                        of measurement are in use regionally or nationally;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><span style="font-weight: 400;">4)</span></p>
                            </td>
                            <td>
                                <p><span style="font-weight: 400;">result trends or significant changes over time.</span>
                                </p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="14" rowspan="6">
                                <p><strong>7.4.1.8</strong></p>
                            </td>
                            <td colspan="11">
                                <p><strong>Amendments to reported results</strong></p>
                                <p><span style="font-weight: 400;">Procedures for the issue of amended or revised results
                                        shall ensure that:</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">The reason for the change is recorded and included in the
                                        revised report, when relevant.&nbsp;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">Revised results shall be delivered only in the form of an
                                        additional document or data transfer, and clearly identified as having been revised,
                                        and the date and patient's identity in the original report shall be
                                        indicated.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">The user is made aware of the revision.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">When it is necessary to issue a completely new report,
                                        this shall be uniquely identified and shall contain a reference and traceability to
                                        the original report that it replaces.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">e)</span></p>
                            </td>
                            <td colspan="5">
                                <p><span style="font-weight: 400;">When the reporting system cannot capture revisions, a
                                        record of such shall be kept</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="6">
                                <p><strong>7.4.2</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Post-examination handling of samples</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall specify the length of time samples
                                        are to be retained following examination and the conditions under which samples are
                                        to be stored.</span></p>
                                <p><span style="font-weight: 400;">The laboratory shall ensure that after the examination,
                                        the</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="18">
                                <p><span style="font-weight: 400;">patient and source identification of the sample are
                                        maintained,</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="18">
                                <p><span style="font-weight: 400;">suitability of the sample for additional examination is
                                        known,</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="18">
                                <p><span style="font-weight: 400;">sample is stored in a manner that optimally preserves
                                        suitability for additional examination,</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="18">
                                <p><span style="font-weight: 400;">sample can be located and retrieved, and</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <p><span style="font-weight: 400;">e)</span></p>
                            </td>
                            <td colspan="18">
                                <p><span style="font-weight: 400;">sample is discarded appropriately.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td rowspan="10">
                                <p><strong>7.5</strong></p>
                            </td>
                            <td colspan="33">
                                <p><strong>Nonconforming work</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="28" class="maxWidthTd">
                                <p><span style="font-weight: 400;">The laboratory shall have a process for when any aspect
                                        of its laboratory activities or examination results do not conform to its own
                                        procedures, quality specifications, or the user requirements (e.g. equipment or
                                        environmental conditions are out of specified limits, results of monitoring fail to
                                        meet specified criteria). The process shall ensure that:</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><span style="font-weight: 400;">the responsibilities and authorities for the management
                                        of nonconforming work are specified;&nbsp;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><span style="font-weight: 400;">immediate and long-term actions are specified and based
                                        upon the risk analysis process established by the laboratory;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><span style="font-weight: 400;">examinations are halted, and reports withheld when there
                                        is a risk of harm to patients;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><span style="font-weight: 400;">an evaluation is made of the clinical significance of the
                                        nonconforming work, including an impact analysis on examination results which were
                                        or could have been released prior to identification of the nonconformance;</span>
                                </p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><span style="font-weight: 400;">e)</span></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><span style="font-weight: 400;">a decision is made on the acceptability of the
                                        nonconforming work;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><span style="font-weight: 400;">f)</span></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><span style="font-weight: 400;">when necessary, examination results are revised, and the
                                        user is notified;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><span style="font-weight: 400;">g)</span></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><span style="font-weight: 400;">the responsibility for authorizing the resumption of work
                                        is specified.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="28" class="maxWidthTd">
                                <p><span style="font-weight: 400;">The laboratory shall implement corrective action
                                        commensurate with the risk of recurrence of the nonconforming work (see 8.7).</span>
                                </p>
                                <br />
                                <p><span style="font-weight: 400;">The laboratory shall retain records of nonconforming work
                                        and actions as specified in 7.5 a) to g).</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>7.6</strong></p>
                            </td>
                            <td colspan="33">
                                <p><strong>Control of data and information management</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="11">&nbsp;</td>
                            <td colspan="5">
                                <p><strong>7.6.1</strong></p>
                            </td>
                            <td colspan="23">
                                <p><strong>General</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall have access to the data and
                                        information needed to perform laboratory activities.</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE 1 In this document, "laboratory information
                                            systems" includes the management of data and information contained in both
                                            computer and non-computerized systems. Some of the requirements can be more
                                            applicable to computer systems than to non-computerized systems.</span></em></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE 2 Risks associated with computerized laboratory
                                            information systems are discussed in ISO 22367:2020, A.13.</span></em></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE 3 The information security controls, strategies
                                            and best practices to ensure the preservation of confidentiality, integrity and
                                            availability of information, are listed in ISO/IEC 27001:2022, Annex A
                                            Information security controls reference.</span></em></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><strong>7.6.2</strong></p>
                            </td>
                            <td colspan="23">
                                <p><strong>Authorities and responsibilities for information management</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall ensure that the authorities and
                                        responsibilities for the management of the information systems are specified,
                                        including the maintenance and modification to the information systems that can
                                        affect patient care. The laboratory is ultimately responsible for the laboratory
                                        information systems.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5" rowspan="7">
                                <p><strong>7.6.3</strong></p>
                            </td>
                            <td colspan="23">
                                <p><strong>Information systems management</strong></p>
                                <p><span style="font-weight: 400;">The system(s) used for the collection, processing,
                                        recording, reporting, storage or retrieval of examination data and information shall
                                        be:</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="11">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="12">
                                <p><span style="font-weight: 400;">validated by the supplier and verified for functionality
                                        by the laboratory before introduction. Any changes to the system, including
                                        laboratory software configuration or modifications to commercial off-the-shelf
                                        software, shall be authorized, documented and validated before
                                        implementation;</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE 1 Validation and verification include, where
                                            applicable, the proper functioning of interfaces between the laboratory
                                            information system and other systems such as laboratory equipment, hospital
                                            patient administration systems and systems in primary care.</span></em></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE 2 Commercial off-the-shelf software used within
                                            its designed application range can be considered sufficiently validated (e.g.
                                            word processing and spreadsheet software, and quality management software
                                            programs).</span></em></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="11">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="12">
                                <p><span style="font-weight: 400;">documented, and the documentation readily available to
                                        authorized users, including that for day to day functioning of the system;</span>
                                </p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="11">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="12">
                                <p><span style="font-weight: 400;">implemented taking cybersecurity into account, to protect
                                        the system from unauthorized access and safeguard data against tampering or
                                        loss;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="11">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="12">
                                <p><span style="font-weight: 400;">operated in an environment that complies with supplier
                                        specifications or, in the case of non-computerized systems, provides conditions
                                        which safeguard the accuracy of manual recording and transcription;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="11">
                                <p><span style="font-weight: 400;">e)</span></p>
                            </td>
                            <td colspan="12">
                                <p><span style="font-weight: 400;">maintained in a manner that ensures the integrity of the
                                        data and information and includes the recording of system failures and the
                                        appropriate immediate and corrective actions.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="23">
                                <p><span style="font-weight: 400;">Calculations and data transfers shall be checked in an
                                        appropriate and systematic manner.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><strong>7.6.4</strong></p>
                            </td>
                            <td colspan="23">
                                <p><strong>Downtime plans</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall have planned processes to maintain
                                        operations in the event of failure or during downtime in information systems that
                                        affects the laboratory's activities. This includes automated selection and reporting
                                        of results.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><strong>7.6.5&nbsp;</strong></p>
                            </td>
                            <td colspan="23">
                                <p><strong>Off site management</strong></p>
                                <p><span style="font-weight: 400;">When the laboratory information system(s) are managed and
                                        maintained off-site or through an external provider, the laboratory shall ensure
                                        that the provider or operator of the system complies with all applicable
                                        requirements of this document.</span></p>
                                <br /><br /><br />
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td rowspan="11">
                                <p><strong>7.7</strong></p>
                            </td>
                            <td colspan="33">
                                <p><strong>Complaints</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" rowspan="5">
                                <p><strong>7.7.1</strong></p>
                            </td>
                            <td colspan="23">
                                <p><strong>Process</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall have a process for handling
                                        complaints that shall include at least the following:</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="11">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="12">
                                <p><span style="font-weight: 400;">description of the process for receiving, substantiating
                                        and investigating the complaint, and deciding what actions shall be taken in
                                        response;</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE The resolution of complaints can lead to
                                            implementation of corrective actions (see 8.7) or be used as input into the
                                            improvement process (see 8.6).</span></em></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="11">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="12">
                                <p><span style="font-weight: 400;">tracking and recording the complaint, including the
                                        actions undertaken to resolve it;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="11">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="12">
                                <p><span style="font-weight: 400;">ensuring appropriate action is taken.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="23">
                                <p><span style="font-weight: 400;">A description of the process for handling complaints
                                        shall be publicly available.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><strong>7.7.2</strong></p>
                            </td>
                            <td colspan="28" class="maxWidthTd">
                                <p><strong>Receipt of complaint&nbsp;</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" rowspan="3">&nbsp;</td>
                            <td colspan="11">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="12">
                                <p><span style="font-weight: 400;">Upon receipt of a complaint, the laboratory shall confirm
                                        whether the complaint relates to laboratory activities that the laboratory is
                                        responsible for and, if so, shall resolve the complaint. (see 8.7.1).</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="11">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="12">
                                <p><span style="font-weight: 400;">The laboratory receiving the complaint shall be
                                        responsible for gathering all necessary information to determine whether the
                                        complaint is substantiated.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="11">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="12">
                                <p><span style="font-weight: 400;">Whenever possible the laboratory shall acknowledge
                                        receipt of the complaint, and provide the complainant with the outcome and, if
                                        applicable, progress reports.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <p><strong>7.7.3</strong></p>
                            </td>
                            <td colspan="23">
                                <p><strong>Resolution of complaint</strong></p>
                                <p><span style="font-weight: 400;">Investigation and resolution of complaints shall not
                                        result in any discriminatory actions.</span></p>
                                <br />
                                <p><span style="font-weight: 400;">The resolution of complaints shall be made by, or
                                        reviewed and approved by, persons not involved in the subject of the complaint in
                                        question. Where resources do not permit this, any alternative approach shall not
                                        compromise impartiality.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td rowspan="6">
                                <p><strong>7.8</strong></p>
                            </td>
                            <td colspan="33">
                                <p><strong>Continuity and emergency preparedness planning</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="28" class="maxWidthTd">
                                <p><span style="font-weight: 400;">The laboratory shall ensure that risks associated with
                                        emergency situations or other conditions when laboratory activities are limited, or
                                        unavailable, have been identified, and a coordinated strategy exists that involves
                                        plans, procedures, and technical measures to enable continued operations after a
                                        disruption.</span></p>
                                <p><span style="font-weight: 400;">Plans shall be periodically tested and the planned
                                        response capability exercised, where practicable.</span></p>
                                <br />
                                <p><span style="font-weight: 400;">The laboratory shall:</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td>
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="27">
                                <p><span style="font-weight: 400;">establish a planned response to emergency situations,
                                        taking into account the needs and capabilities of all relevant laboratory
                                        personnel;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td>
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="27">
                                <p><span style="font-weight: 400;">provide information and training as appropriate to
                                        relevant laboratory personnel;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td>
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="27">
                                <p><span style="font-weight: 400;">respond to actual emergency situations;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td>
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="27">
                                <p><span style="font-weight: 400;">take action to prevent or mitigate the consequences of
                                        emergency situations, appropriate to the magnitude of the emergency and the
                                        potential impact.</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE CLSI GP36-A [35] provides more
                                            details.</span></em></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <th>
                                <p><strong>8</strong></p>
                            </th>
                            <th colspan="34">
                                <p><strong>Management System Requirements</strong></p>
                            </th>
                        </tr>
                        <tr>
                            <td rowspan="106">

                            </td>
                            <td>
                                <p><strong>8.1</strong></p>
                            </td>
                            <td colspan="33">
                                <p><strong>General Requirements</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="9">&nbsp;</td>
                            <td colspan="3">
                                <p><strong>8.1.1</strong></p>
                            </td>
                            <td colspan="30">
                                <p><strong>General</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                            <td colspan="25" class="maxWidthTd">
                                <p><span style="font-weight: 400;">The laboratory shall establish, document, implement and
                                        maintain a management system to support and demonstrate the consistent fulfilment of
                                        the requirements of this document.</span></p>
                                <p><span style="font-weight: 400;">As a minimum, the management system of the laboratory
                                        shall include the following:</span></p>
                                <p><span style="font-weight: 400;">&mdash; responsibilities (8.1)</span></p>
                                <p><span style="font-weight: 400;">&mdash; objectives and policies (8.2)</span></p>
                                <p><span style="font-weight: 400;">&mdash; documented information (8.2, 8.3 and 8.4)</span>
                                </p>
                                <p><span style="font-weight: 400;">&mdash;actions to address risks and opportunities for
                                        improvement (8.5)</span></p>
                                <p><span style="font-weight: 400;">&mdash; continual improvement (8.6)</span></p>
                                <p><span style="font-weight: 400;">&mdash; corrective actions (8.7)</span></p>
                                <p><span style="font-weight: 400;">&mdash; evaluations and internal audits (8.8)</span></p>
                                <p><span style="font-weight: 400;">&mdash; management reviews (8.9)</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="2">
                                <p><strong>8.1.2</strong></p>
                            </td>
                            <td colspan="30">
                                <p><strong>Fulfilment of management system requirements</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="25" class="maxWidthTd">
                                <p><span style="font-weight: 400;">The laboratory may meet 8.1.1 by establishing,
                                        implementing, and maintaining a quality management system (e.g. in accordance with
                                        the requirements of ISO 9001) (see Table B.1). This quality management system shall
                                        support and demonstrate the consistent fulfilment of the requirements of Clauses 4
                                        to 7 and the requirements specified in 8.2 to 8.9.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="5">
                                <p><strong>8.1.3</strong></p>
                            </td>
                            <td colspan="30">
                                <p><strong>Management system awareness</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="25" class="maxWidthTd">
                                <p><span style="font-weight: 400;">The laboratory shall ensure that persons doing work under
                                        the laboratory&rsquo;s control are aware of:&nbsp;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="18">
                                <p><span style="font-weight: 400;">relevant objectives and policies;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="18">
                                <p><span style="font-weight: 400;">their contribution to the effectiveness of the management
                                        system, including the benefits of improved performance;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="18">
                                <p><span style="font-weight: 400;">the consequences of not conforming with the management
                                        system requirements.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td rowspan="6">
                                <p><strong>8.2</strong></p>
                            </td>
                            <td colspan="33">
                                <p><strong>Management system documentation</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><strong>8.2.1</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>General</strong></p>
                                <p><span style="font-weight: 400;">Laboratory management shall establish, document, and
                                        maintain objectives and policies for the fulfilment of the purposes of this document
                                        and shall ensure that the objectives and policies are acknowledged and implemented
                                        at all levels of the laboratory organization.</span></p>
                                <p><em><span style="font-weight: 400;">NOTE The management system documents can, but are not
                                            required to, be contained in a quality manual.</span></em></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><strong>8.2.2</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Competence and quality</strong></p>
                                <p><span style="font-weight: 400;">The objectives and policies shall address the competence,
                                        quality and consistent operation of the laboratory.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><strong>8.2.3</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Evidence of commitment</strong></p>
                                <p><span style="font-weight: 400;">Laboratory management shall provide evidence of
                                        commitment to the development and implementation of the management system and to
                                        continually improving its effectiveness.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><strong>8.2.4</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Documentation</strong></p>
                                <p><span style="font-weight: 400;">All documentation, processes, systems, and records,
                                        related to the fulfilment of the requirements of this document shall be included in,
                                        referenced from, or linked to the management system.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><strong>8.2.5</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Personnel access</strong></p>
                                <p><span style="font-weight: 400;">All personnel involved in laboratory activities shall
                                        have access to the parts of the management system documentation and related
                                        information that are applicable to their responsibilities.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td rowspan="12">
                                <p><strong>8.3</strong></p>
                            </td>
                            <td colspan="33">
                                <p><strong>Control of management system documents</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><strong>8.3.1</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>General</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall control the documents (internal and
                                        external) that relate to the fulfilment of this document.</span></p>
                                <br />
                                <p><em><span style="font-weight: 400;">NOTE In this context, "document" can be policy
                                            statements, procedures and related job aids, flow charts, instructions for use,
                                            specifications, manufacturer's instructions, calibration tables, biological
                                            reference intervals and their origins, charts, posters, notices, memoranda,
                                            software documentation, drawings, plans, agreements, and documents of external
                                            origin such as laws, regulations, standards and textbooks from which examination
                                            methods are taken, documents describing personnel qualifications (such as job
                                            descriptions), etc. These can be in any form or type of medium, such as hard
                                            copy or digital.</span></em></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="10">
                                <p><strong>8.3.2</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Control of documents</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall ensure that:</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="17">
                                <p><span style="font-weight: 400;">documents are uniquely identified;&nbsp;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="17">
                                <p><span style="font-weight: 400;">documents are approved for adequacy before issue by
                                        authorized personnel who have the expertise and competence to determine
                                        adequacy;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="17">
                                <p><span style="font-weight: 400;">documents are periodically reviewed and updated as
                                        necessary;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="17">
                                <p><span style="font-weight: 400;">relevant versions of applicable documents are available
                                        at points of use and, where necessary, their distribution is controlled;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">e)</span></p>
                            </td>
                            <td colspan="17">
                                <p><span style="font-weight: 400;">changes and the current revision status of documents are
                                        identified</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">f)</span></p>
                            </td>
                            <td colspan="17">
                                <p><span style="font-weight: 400;">documents are protected from unauthorized changes and any
                                        deletion or removal;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">g)</span></p>
                            </td>
                            <td colspan="17">
                                <p><span style="font-weight: 400;">documents are protected from unauthorized access;</span>
                                </p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">h)</span></p>
                            </td>
                            <td colspan="17">
                                <p><span style="font-weight: 400;">the unintended use of obsolete documents is prevented,
                                        and suitable identification is applied to them if they are retained for any
                                        purpose;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">i)</span></p>
                            </td>
                            <td colspan="17">
                                <p><span style="font-weight: 400;">at least one paper or electronic copy of each obsolete
                                        controlled document is retained for a specified time period or in accordance with
                                        applicable specified requirements.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>8.4</strong></p>
                            </td>
                            <td colspan="33">
                                <p><strong>Control of records&nbsp;</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="7">&nbsp;</td>
                            <td colspan="3">
                                <p><strong>8.4.1</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Creation of records</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall establish and retain legible records
                                        to demonstrate fulfilment of the requirements of this document.</span></p>
                                <p><span style="font-weight: 400;">Records shall be created at the time each activity that
                                        affects the quality of an examination is performed.</span></p>
                                <p><em><span style="font-weight: 400;">NOTE Records can be in any form or type of
                                            medium.</span></em></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><strong>8.4.2</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Amendment of records</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall ensure that amendments to records
                                        can be traced to previous versions or to original observations. Both the original
                                        and amended data and files shall be kept, including the date and where relevant, the
                                        time, of alteration, an indication of the altered aspects and the personnel making
                                        the alterations.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><strong>8.4.3</strong></p>
                            </td>
                            <td colspan="30">
                                <p><strong>Retention of records</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="4">&nbsp;</td>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="17">
                                <p><span style="font-weight: 400;">The laboratory shall implement the procedures needed for
                                        the identification, storage, protection from unauthorized access and changes,
                                        back-up, archive, retrieval, retention time, and disposal of its records.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="17">
                                <p><span style="font-weight: 400;">The retention times for records shall be
                                        specified.</span></p>
                                <p><em><span style="font-weight: 400;">NOTE 1 In addition to requirements, retention times
                                            can be chosen based on identified risks.</span></em></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="17">
                                <p><span style="font-weight: 400;">Reported examination results shall be retrievable for as
                                        long as necessary or as required.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="17">
                                <p><span style="font-weight: 400;">All records shall be accessible throughout the entire
                                        retention period, legible in whichever medium the laboratory keeps records, and
                                        available for laboratory management review (see 8.9).</span></p>
                                <p><em><span style="font-weight: 400;">NOTE 2 Legal liability concerns regarding certain
                                            types of procedures (e.g. histology examinations, genetic examinations,
                                            pediatric examinations) can require the retention of certain records for much
                                            longer times than for other records.</span></em></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td rowspan="8">
                                <p><strong>8.5</strong></p>
                            </td>
                            <td colspan="33">
                                <p><strong>Actions to address risks and opportunities for improvement</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="6">
                                <p><strong>8.5.1</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Identification of risks and opportunities for improvement</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall identify risks and opportunities for
                                        improvement associated with the laboratory activities to:</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="17">
                                <p><span style="font-weight: 400;">prevent or reduce undesired impacts and potential
                                        failures in the laboratory activities;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="17">
                                <p><span style="font-weight: 400;">achieve improvement, by acting on opportunities;</span>
                                </p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="17">
                                <p><span style="font-weight: 400;">assure that the management system achieves its intended
                                        results;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="17">
                                <p><span style="font-weight: 400;">mitigate risks to patient care;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">e)</span></p>
                            </td>
                            <td colspan="17">
                                <p><span style="font-weight: 400;">help achieve the purpose and objectives of the
                                        laboratory.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><strong>8.5.2</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Acting on risks and opportunities for improvement</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall prioritize and act on identified
                                        risks. Actions taken to address risks shall be proportional to the potential impact
                                        on laboratory examination results, as well as patient and personnel safety.</span>
                                </p>
                                <p><span style="font-weight: 400;">The laboratory shall record decisions made and actions
                                        taken on risks and opportunities.</span></p>
                                <p><span style="font-weight: 400;">The laboratory shall integrate and implement actions on
                                        identified risks and improvement opportunities into its management system and
                                        evaluate their effectiveness.</span></p>
                                <p><em><span style="font-weight: 400;">NOTE 1 Options to address risks can include
                                            identifying and avoiding threats, eliminating a risk source, reducing the
                                            likelihood or consequences of a risk, transferring a risk, taking a risk in
                                            order to pursue an opportunity for improvement, or accepting risk by informed
                                            decision.</span></em></p>
                                <p><em><span style="font-weight: 400;">NOTE 2 Although this document requires that the
                                            laboratory identifies and addresses risks, there is no requirement for any
                                            particular risk management method. Laboratories can use ISO 22367 and ISO 35001
                                            for guidance.</span></em></p>
                                <p><em><span style="font-weight: 400;">NOTE 3 Opportunities for improvement can lead to
                                            expanding the scope of the laboratory activities, applying new technology, or
                                            creating other possibilities to fulfil patient and user needs.</span></em></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td rowspan="7">
                                <p><strong>8.6</strong></p>
                            </td>
                            <td colspan="33">
                                <p><strong>Improvement&nbsp;</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="5">
                                <p><strong>8.6.1</strong></p>
                            </td>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="17">
                                <p><span style="font-weight: 400;">The laboratory shall continually improve the
                                        effectiveness of the management system, including the pre-examination, examination
                                        and post-examination processes as stated in the objectives and policies.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="17">
                                <p><span style="font-weight: 400;">The laboratory shall identify and select opportunities
                                        for improvement and develop, document, and implement any necessary actions.
                                        Improvement activities shall be directed at areas of highest priority based on risk
                                        assessments and the opportunities identified (see 8.5).</span></p>
                                <p><em><span style="font-weight: 400;">NOTE Opportunities for improvement can be identified
                                            through risk assessment, use of the policies, review of the operational
                                            procedures, overall objectives, external evaluation reports, internal audit
                                            findings, complaints, corrective actions, management reviews, suggestions from
                                            personnel, suggestions or feedback from patients and users, analysis of data and
                                            EQA results.</span></em></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="17">
                                <p><span style="font-weight: 400;">The laboratory shall evaluate the effectiveness of the
                                        actions taken.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="17">
                                <p><span style="font-weight: 400;">Laboratory management shall ensure that the laboratory
                                        participates in continual improvement activities that encompass relevant areas and
                                        outcomes of patient care.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">e)</span></p>
                            </td>
                            <td colspan="17">
                                <p><span style="font-weight: 400;">Laboratory management shall communicate to personnel its
                                        improvement plans and related goals.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><strong>8.6.2</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Laboratory patients, user, and personnel feedback</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall seek feedback from its patients,
                                        users, and personnel. The feedback shall be analyzed and used to improve the
                                        management system, laboratory activities and services to users.</span></p>
                                <p><span style="font-weight: 400;">Records of feedback shall be maintained including the
                                        actions taken. Communication shall be provided to personnel on actions taken arising
                                        from their feedback.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td rowspan="18">
                                <p><strong>8.7</strong></p>
                            </td>
                            <td colspan="33">
                                <p><strong>Nonconformities and corrective actions</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="13">
                                <p><strong>8.7.1</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Actions when nonconformity occurs</strong></p>
                                <p><span style="font-weight: 400;">When a nonconformity occurs, the laboratory shall:</span>
                                </p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="8" rowspan="3">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="17">
                                <p><span style="font-weight: 400;">Respond to the nonconformity and, as applicable:</span>
                                </p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                            <td colspan="2" rowspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">1)</span></p>
                            </td>
                            <td colspan="9">
                                <p><span style="font-weight: 400;">take immediate action to control and correct the
                                        nonconformity;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">2)</span></p>
                            </td>
                            <td colspan="9">
                                <p><span style="font-weight: 400;">address the consequences, with a particular focus on
                                        patient safety including escalation to the appropriate person.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="17">
                                <p><span style="font-weight: 400;">Determine the cause(s) of the nonconformity.&nbsp;</span>
                                </p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="8" rowspan="4">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="17">
                                <p><span style="font-weight: 400;">Evaluate the need for corrective action to eliminate the
                                        cause(s) of the nonconformity, in order to reduce the likelihood of recurrence or
                                        occurrence elsewhere, by:</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">1)</span></p>
                            </td>
                            <td colspan="9">
                                <p><span style="font-weight: 400;">reviewing and analyzing the nonconformity;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                            <td colspan="2" rowspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">2)</span></p>
                            </td>
                            <td colspan="9">
                                <p><span style="font-weight: 400;">determining whether similar nonconformities exist, or
                                        could potentially occur;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">3)</span></p>
                            </td>
                            <td colspan="9">
                                <p><span style="font-weight: 400;">assessing the potential risk(s) and effect(s) if the
                                        nonconformity recurs.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>
                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>

                        </tr>
                        <tr>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="17">
                                <p><span style="font-weight: 400;">Implement any action needed.&nbsp;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">e)</span></p>
                            </td>
                            <td colspan="17">
                                <p><span style="font-weight: 400;">Review and evaluate the effectiveness of any corrective
                                        action taken.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">f)</span></p>
                            </td>
                            <td colspan="17">
                                <p><span style="font-weight: 400;">Update risks and opportunities for improvement, as
                                        needed.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <p><span style="font-weight: 400;">g)</span></p>
                            </td>
                            <td colspan="17">
                                <p><span style="font-weight: 400;">Make changes to the management system, if
                                        necessary.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><strong>8.7.2</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Corrective action effectiveness</strong></p>
                                <p><span style="font-weight: 400;">Corrective actions shall be appropriate to the effects of
                                        the nonconformities encountered and shall mitigate the identified cause(s).</span>
                                </p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="3">
                                <p><strong>8.7.3</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Records of nonconformities and corrective actions</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall retain records as evidence of
                                        the</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="9">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="16">
                                <p><span style="font-weight: 400;">nature of the nonconformities, cause(s) and any
                                        subsequent actions taken, and</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="9">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="16">
                                <p><span style="font-weight: 400;">evaluation of the effectiveness of any corrective
                                        action.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td rowspan="17">
                                <p><strong>8.8</strong></p>
                            </td>
                            <td colspan="33">
                                <p><strong>Evaluations</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><strong>8.8.1</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>General</strong></p>
                                <p><span style="font-weight: 400;">The laboratory shall conduct evaluations at planned
                                        intervals to demonstrate that the management, support, and pre-examination,
                                        examination, and post-examination processes meet the needs and requirements of
                                        patients and laboratory users, and to ensure conformity to the requirements of this
                                        document.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><strong>8.8.2</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Quality indicators</strong></p>
                                <p><span style="font-weight: 400;">The process of monitoring quality indicators [see 5.5 d)]
                                        shall be planned, which includes establishing the objectives, methodology,
                                        interpretation, limits, action plan and duration of monitoring. The indicators shall
                                        be periodically reviewed, to ensure continued appropriateness.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="14">
                                <p><strong>8.8.3</strong></p>
                            </td>
                            <td colspan="30">
                                <p><strong>Internal audits</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="16" rowspan="4">
                                <p><span style="font-weight: 400;">8.8.3.1</span></p>
                            </td>
                            <td colspan="9">
                                <p><span style="font-weight: 400;">The laboratory shall conduct internal audits at planned
                                        intervals to provide information on whether the management system</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="3">
                                <p><span style="font-weight: 400;">conforms to the laboratory&rsquo;s own requirements for
                                        its management system, including the laboratory activities,&nbsp;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="3">
                                <p><span style="font-weight: 400;">conforms to the requirements of this document, and</span>
                                </p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="3">
                                <p><span style="font-weight: 400;">is effectively implemented and maintained.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="16" rowspan="9">
                                <p><span style="font-weight: 400;">8.8.3.2</span></p>
                            </td>
                            <td colspan="9">
                                <p><span style="font-weight: 400;">The laboratory shall plan, establish, implement and
                                        maintain an internal audit program that includes:</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="3">
                                <p><span style="font-weight: 400;">priority given to risk to patients from laboratory
                                        activities;&nbsp;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="3">
                                <p><span style="font-weight: 400;">a schedule which takes into consideration identified
                                        risks; the outcomes of both external evaluations and previous internal audits; the
                                        occurrence of nonconformities, incidents, and complaints; and changes affecting the
                                        laboratory activities;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="3">
                                <p><span style="font-weight: 400;">specified audit objectives, criteria and scope for each
                                        audit;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="3">
                                <p><span style="font-weight: 400;">selection of auditors who are trained, qualified and
                                        authorized to assess the performance of the laboratory's management system, and,
                                        whenever resources permit, are independent of the activity to be audited;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">e)</span></p>
                            </td>
                            <td colspan="3">
                                <p><span style="font-weight: 400;">ensuring objectivity and impartiality of the audit
                                        process;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">f)</span></p>
                            </td>
                            <td colspan="3">
                                <p><span style="font-weight: 400;">ensuring that the results of the audits are reported to
                                        relevant personnel;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">g)</span></p>
                            </td>
                            <td colspan="3">
                                <p><span style="font-weight: 400;">implementation of appropriate correction and corrective
                                        actions without undue delay;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p><span style="font-weight: 400;">h)</span></p>
                            </td>
                            <td colspan="3">
                                <p><span style="font-weight: 400;">retention of records as evidence of the implementation of
                                        the audit program and audit results.</span></p>
                                <p><em><span style="font-weight: 400;">NOTE ISO 19011 provides guidance for auditing
                                            management systems.</span></em></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td rowspan="20">
                                <p><strong>8.9</strong></p>
                            </td>
                            <td colspan="33">
                                <p><strong>Management reviews&nbsp;</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p><strong>8.9.1</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>General</strong></p>
                                <p><span style="font-weight: 400;">Laboratory management shall review its management system
                                        at planned intervals to ensure its continuing suitability, adequacy and
                                        effectiveness, including the stated policies and objectives related to the
                                        fulfilment of this document.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="11">
                                <p><strong>8.9.2</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Review input</strong></p>
                                <br />
                                <p><span style="font-weight: 400;">The inputs to management review shall be recorded and
                                        shall include evaluations of at least the following:</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="10">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="15">
                                <p><span style="font-weight: 400;">status of actions from previous management reviews,
                                        internal and external changes to the management system, changes in the volume and
                                        type of laboratory activities and adequacy of resources;&nbsp;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="10">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="15">
                                <p><span style="font-weight: 400;">fulfilment of objectives and suitability of policies and
                                        procedures;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="10">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="15">
                                <p><span style="font-weight: 400;">outcomes of recent evaluations, process monitoring using
                                        quality indicators, internal audits, analysis of non-conformities, corrective
                                        actions, assessments by external bodies;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="10">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="15">
                                <p><span style="font-weight: 400;">patient, user and personnel feedback and
                                        complaints;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="10">
                                <p><span style="font-weight: 400;">e)</span></p>
                            </td>
                            <td colspan="15">
                                <p><span style="font-weight: 400;">quality assurance of result validity;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="10">
                                <p><span style="font-weight: 400;">f)</span></p>
                            </td>
                            <td colspan="15">
                                <p><span style="font-weight: 400;">effectiveness of any implemented improvements and actions
                                        taken to address risks and opportunities for improvement;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="10">
                                <p><span style="font-weight: 400;">g)</span></p>
                            </td>
                            <td colspan="15">
                                <p><span style="font-weight: 400;">performance of external providers;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="10">
                                <p><span style="font-weight: 400;">h)</span></p>
                            </td>
                            <td colspan="15">
                                <p><span style="font-weight: 400;">results of participation in interlaboratory comparison
                                        programs;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="10">
                                <p><span style="font-weight: 400;">i)</span></p>
                            </td>
                            <td colspan="15">
                                <p><span style="font-weight: 400;">evaluation of POCT activities;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="10">
                                <p><span style="font-weight: 400;">j)</span></p>
                            </td>
                            <td colspan="15">
                                <p><span style="font-weight: 400;">other relevant factors, such as monitoring activities and
                                        training.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="7">
                                <p><strong>8.9.3</strong></p>
                            </td>
                            <td colspan="25" class="maxWidthTd">
                                <p><strong>Review output</strong></p>
                                <p><span style="font-weight: 400;">The output from the management review shall be a record
                                        of decisions and actions related to at least:</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="10">
                                <p><span style="font-weight: 400;">a)</span></p>
                            </td>
                            <td colspan="15">
                                <p><span style="font-weight: 400;">the effectiveness of the management system and its
                                        processes;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="10">
                                <p><span style="font-weight: 400;">b)</span></p>
                            </td>
                            <td colspan="15">
                                <p><span style="font-weight: 400;">improvement of the laboratory activities related to the
                                        fulfilment of the requirements of this document;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="10">
                                <p><span style="font-weight: 400;">c)</span></p>
                            </td>
                            <td colspan="15">
                                <p><span style="font-weight: 400;">provision of required resources;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="10">
                                <p><span style="font-weight: 400;">d)</span></p>
                            </td>
                            <td colspan="15">
                                <p><span style="font-weight: 400;">improvement of services to patients and users;</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="10">
                                <p><span style="font-weight: 400;">e)</span></p>
                            </td>
                            <td colspan="15">
                                <p><span style="font-weight: 400;">any need for change.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="25" class="maxWidthTd">
                                <p><span style="font-weight: 400;">Laboratory management shall ensure that actions arising
                                        from management review are completed within a specified time frame.</span></p>
                                <p><span style="font-weight: 400;">Conclusions and actions arising from management reviews
                                        shall be communicated to laboratory personnel.</span></p>
                            </td>
                            <td colspan="" class="allradiobutons">&nbsp;</td>
                            <td class="allradiobutons">&nbsp;</td>

                            <td colspan="1" class="allradiobutons">&nbsp;</td>
                            <td colspan="2"><textarea name="" id="" cols="50" rows="10"></textarea></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </body>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let selectedDepartments = [];

            const dropdown = document.getElementById('departmentDropdown');
            const optionsContainer = document.getElementById('departmentOptions');
            const arrow = document.getElementById('dropdownArrow');

            // Toggle dropdown
            dropdown.addEventListener('click', () => {
                const isVisible = optionsContainer.style.display === 'block';
                optionsContainer.style.display = isVisible ? 'none' : 'block';
                dropdown.classList.toggle('active', !isVisible);
                arrow.classList.toggle('rotated', !isVisible);
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', (e) => {
                if (!e.target.closest('.custom-multiselect')) {
                    optionsContainer.style.display = 'none';
                    dropdown.classList.remove('active');
                    arrow.classList.remove('rotated');
                }
            });

            // Toggle option selection
            window.toggleOption = function (departmentName) {
                const index = selectedDepartments.indexOf(departmentName);
                const option = document.querySelector(`[data-value="${departmentName}"]`);

                if (index > -1) {
                    selectedDepartments.splice(index, 1);
                    option.classList.remove('selected');
                } else {
                    selectedDepartments.push(departmentName);
                    option.classList.add('selected');
                }

                updateDisplay();
            }

            // Remove selected item
            window.removeItem = function (departmentName) {
                const index = selectedDepartments.indexOf(departmentName);
                if (index > -1) {
                    selectedDepartments.splice(index, 1);
                    const option = document.querySelector(`[data-value="${departmentName}"]`);
                    if (option) {
                        option.classList.remove('selected');
                    }
                    updateDisplay();
                }
            }

            // Update display
            function updateDisplay() {
                const placeholder = document.getElementById('dropdownPlaceholder');
                const selectedItemsContainer = document.getElementById('selectedItems');
                const selectedDepartmentsDiv = document.getElementById('selectedDepartments');
                const hiddenInputsContainer = document.getElementById('hiddenInputs');

                // Clear existing hidden inputs
                hiddenInputsContainer.innerHTML = '';

                // Update placeholder
                if (selectedDepartments.length === 0) {
                    placeholder.textContent = 'Select departments...';
                    placeholder.className = 'placeholder-text';
                } else if (selectedDepartments.length === 1) {
                    placeholder.textContent = selectedDepartments[0];
                    placeholder.className = '';
                } else {
                    placeholder.textContent = `${selectedDepartments.length} departments selected`;
                    placeholder.className = '';
                }

                // Update selected items display
                selectedItemsContainer.innerHTML = '';
                selectedDepartments.forEach(dept => {
                    // Add to visible display
                    const item = document.createElement('div');
                    item.className = 'selected-item';
                    item.innerHTML = `
                                        ${dept}
                                        <span class="remove-item" onclick="removeItem('${dept}')">&times;</span>
                                    `;
                    selectedItemsContainer.appendChild(item);

                    // Add hidden input for form submission
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'departments[]';
                    input.value = dept;
                    hiddenInputsContainer.appendChild(input);
                });

                // Update count display
                if (selectedDepartments.length > 0) {
                    selectedDepartmentsDiv.innerHTML = `
                                        <i class="fas fa-check-circle"></i> 
                                        Selected: ${selectedDepartments.length} department${selectedDepartments.length !== 1 ? 's' : ''}
                                    `;
                } else {
                    selectedDepartmentsDiv.innerHTML = '';
                }
            }
        });


    </script>

    <script>
        $(document).ready(function () {
            $('#DepartmentInput').select2({
                placeholder: "Select Department(s)",
                width: '100%'
            });

            $('#DepartmentInput').on('change', function () {
                const selected = $(this).val();
                $('#selectedDepartments').html(selected && selected.length
                    ? `Selected: ${selected.join(', ')}`
                    : '');
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const auditors = [];
            const attendees = [];

            const auditorsInput = document.getElementById('auditorsInput');
            const attendeesInput = document.getElementById('attendeesInput');
            const auditorsList = document.getElementById('auditorsList');
            const attendeesList = document.getElementById('attendeesList');
            const addAuditorBtn = document.getElementById('addAuditorBtn');
            const addAttendeeBtn = document.getElementById('addAttendeeBtn');

            addAuditorBtn.addEventListener('click', function (e) {
                e.preventDefault();
                const val = auditorsInput.value.trim();
                if (val) {
                    auditors.push(val);
                    const li = document.createElement('li');
                    li.textContent = val;
                    li.className = 'list-group-item';
                    auditorsList.appendChild(li);
                    auditorsInput.value = '';
                }
            });

            addAttendeeBtn.addEventListener('click', function (e) {
                e.preventDefault();
                const val = attendeesInput.value.trim();
                if (val) {
                    attendees.push(val);
                    const li = document.createElement('li');
                    li.textContent = val;
                    li.className = 'list-group-item';
                    attendeesList.appendChild(li);
                    attendeesInput.value = '';
                }
            });

            // Attach to global scope so handleFormSubmit can use them
            window.getAuditors = () => auditors;
            window.getAttendees = () => attendees;
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            function addToList(inputId, listId) {
                let inputElement = document.getElementById(inputId);
                let listElement = document.getElementById(listId);
                let hiddenInput = document.querySelector(`input[name="${hiddenInputName}"]`);

                if (inputElement.value.trim() !== "") {
                    let li = document.createElement("li");
                    li.className = "list-group-item d-flex justify-content-between align-items-center";
                    li.textContent = inputElement.value;

                    // Add remove button to list item
                    let removeBtn = document.createElement("button");
                    removeBtn.className = "btn btn-danger btn-sm ms-2";
                    removeBtn.innerHTML = "<i class='fa-solid fa-trash'></i>";
                    removeBtn.onclick = function () {
                        listElement.removeChild(li);
                        updateHiddenInput(listElement, hiddenInput);
                    };

                    li.appendChild(removeBtn);
                    listElement.appendChild(li);

                    inputElement.value = ""; // Clear input field
                    updateHiddenInput(listElement, hiddenInput);
                }
            }

            function updateHiddenInput(listElement, hiddenInput) {
                let values = [];
                listElement.querySelectorAll("li").forEach(li => {
                    values.push(li.textContent.trim());
                });
                hiddenInput.value = JSON.stringify(values);
            }
            document.getElementById("addDepartmentBtn").addEventListener("click", function (e) {
                e.preventDefault();
                addToList("DepartmentInput", "DepartmentList", "departments");
            });

            document.getElementById("addAuditorBtn").addEventListener("click", function (e) {
                e.preventDefault();
                addToList("auditorsInput", "auditorsList", "auditors");
            });

            document.getElementById("addAttendeeBtn").addEventListener("click", function (e) {
                e.preventDefault();
                addToList("attendeesInput", "attendeesList", "attendees");
            });

            // Form submission handling (if required, ensure handleFormSubmit() exists)


            // Ensure the global function is defined
            window.handleFormSubmit = handleFormSubmit;
            // Ensure the global function is defined (if it's not already defined elsewhere)
            window.handleFormSubmit = handleFormSubmit;
        });
    </script>

    <script>

        function handleFormSubmit(event) {
            event.preventDefault();

            // Update audit_notes
            const auditNotes = document.getElementById("auditNotesEditor").innerHTML;
            document.querySelector('input[name="audit_notes"]').value = auditNotes;

            // Update auditors
            const auditorList = Array.from(document.querySelectorAll('#auditorsList li')).map(li => li.textContent.trim());
            document.querySelector('input[name="auditors"]').value = JSON.stringify(auditorList);

            // Update attendees
            const attendeeList = Array.from(document.querySelectorAll('#attendeesList li')).map(li => li.textContent.trim());
            document.querySelector('input[name="attendees"]').value = JSON.stringify(attendeeList);

            // Get the form and create FormData
            const form = event.target;
            const formData = new FormData(form);

            // Add CSRF token
            formData.append('_token', document.querySelector('input[name="_token"]').value);

            // Convert departments array to JSON string
            const departmentsArray = Array.from(document.querySelectorAll('input[name="departments[]"]')).map(input => input.value);
            formData.set('departments', JSON.stringify(departmentsArray));

            // Send the request
            fetch('/audit-schedule/store', {
                method: "POST",
                headers: {
                    'Accept': 'application/json',
                },
                body: formData,
            })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(err => { throw err; });
                    }
                    return response.json();
                })
                .then(data => {
                    alert("Form submitted successfully!");
                    console.log(data);
                    // Optionally reset the form or redirect
                    // form.reset();
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert("Error submitting form: " + (error.message || 'Unknown error'));
                });
        }
        document.querySelectorAll('.allradiobutons').forEach((rBtn) => {
            rBtn.innerHTML = `
                                                                                                                             <div class="radio-container">
                                                                                                                                <div class="radio-wrapper">
                                                                                                                                    <label class="radio-button">
                                                                                                                                        <input id="option1" name="radio-group" type="radio">
                                                                                                                                        <span class="radio-checkmark"></span>
                                                                                                                                        <span class="radio-label">Yes</span>
                                                                                                                                    </label>
                                                                                                                                </div>

                                                                                                                                <div class="radio-wrapper">
                                                                                                                                    <label class="radio-button">
                                                                                                                                        <input id="option2" name="radio-group" type="radio">
                                                                                                                                        <span class="radio-checkmark"></span>
                                                                                                                                        <span class="radio-label">No</span>
                                                                                                                                    </label>
                                                                                                                                </div>

                                                                                                                                <div class="radio-wrapper">
                                                                                                                                    <label class="radio-button">
                                                                                                                                        <input id="option3" name="radio-group" type="radio">
                                                                                                                                        <span class="radio-checkmark"></span>
                                                                                                                                        <span class="radio-label">Not Applicable</span>
                                                                                                                                    </label>
                                                                                                                                </div>
                                                                                                                            </div>`
        })
        // Function to add data to the list
        function addData(inputId, listId) {
            const input = document.getElementById(inputId);
            const list = document.getElementById(listId);

            if (input.value.trim() !== "") {
                // Create list item
                const listItem = document.createElement("li");
                listItem.className = "list-group-item";

                // Add text to the list item
                const textSpan = document.createElement("span");
                textSpan.textContent = input.value;
                textSpan.className = 'list-group-item-text';

                // Create remove button
                const removeBtn = document.createElement("span");
                removeBtn.innerHTML = `<i class="fa-solid fa-xmark"></i>`;
                removeBtn.className = "btn btn-danger";
                removeBtn.onclick = () => listItem.remove();

                // Append text and button to the list item
                listItem.appendChild(textSpan);
                listItem.appendChild(removeBtn);

                // Append list item to the list
                list.appendChild(listItem);

                // Clear the input field
                input.value = "";
            }
        }

        // Add event listeners to the buttons
        document.getElementById("addAuditorBtn").addEventListener("click", function () {
            event.preventDefault()
            addData("auditorsInput", "auditorsList");
        });

        document.getElementById("addAttendeeBtn").addEventListener("click", function () {
            event.preventDefault()
            addData("attendeesInput", "attendeesList");
        });

        document.getElementById("addDepartmentBtn").addEventListener("click", function () {
            event.preventDefault()
            addData("DepartmentInput", "DepartmentList");
        });
        document.addEventListener("DOMContentLoaded", () => {
            const tabs = document.querySelectorAll(".pivot-tab");
            const panels = document.querySelectorAll(".pivot-panel");

            tabs.forEach((tab) => {
                tab.addEventListener("click", () => {
                    // Remove active class from all tabs and panels
                    tabs.forEach((t) => t.classList.remove("active"));
                    panels.forEach((p) => p.classList.remove("active"));

                    // Add active class to the clicked tab and corresponding panel
                    tab.classList.add("active");
                    const target = document.getElementById(tab.dataset.target);
                    target.classList.add("active");

                    document.getElementById('mainInputUpload').style.display = tab.dataset.target == 'PostAuditActivities' ? 'none' : "block"


                });
            });
        });

        // Function to format the text
        function format(command, value) {
            event.preventDefault()
            document.execCommand(command, false, value || null);
        }

        // Function to add a hyperlink
        function addLink() {
            event.preventDefault()
            const url = prompt("Enter the URL:");
            if (url) {
                format('createLink', url);
            }
        }

        // Function to add an image
        function addImage() {
            event.preventDefault()
            const url = prompt("Enter the image URL:");
            if (url) {
                format('insertImage', url);
            }
        }

        function openDocument1() {

            document.getElementById('documentClose1').classList.add('opened');
            document.getElementById('documentOpen1').classList.add('open');
        }

        function documentClose1() {
            document.getElementById('documentClose1').classList.remove('opened');
            document.getElementById('documentOpen1').classList.remove('open');

        }
    </script>


    </html>

@endsection