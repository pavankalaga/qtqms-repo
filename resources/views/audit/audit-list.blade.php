@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Audit List</title>
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
    </style>

    <body>
        <div class="main ">
            <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
                <div style="font-size: 20px;">Audit List</div>
            </div>

            <option value="internal_audit">Internal Audit</option>
            <div class="table-responsive">
                <table class="stock-planner-table">
                    <thead>
                        <tr>
                            <th>QI. No.</th>
                            <th>Audit Location</th>
                            <th>Scheduled Audit Date</th>
                            <th>Type of Audit</th>
                            <th>No of N/C's</th>
                            <th>Audit Cycle Closure Status</th>
                            <th>Audit Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td onclick='openDocument1({{ $item->id }}, @json($item->departments))'
                                    style="color: #36C;cursor: pointer;text-decoration: underline;">
                                    {{ $item->audit_location }}
                                </td>
                                <td>{{$item->audit_start_date}}</td>
                                <td>{{ ucwords(str_replace('_', ' ', $item->audit_type)) }}</td>
                                <td>---</td>
                                <td>---</td>
                                <td>{{$item->audit_status}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div id="documentClose1" class="closeBtn1" onclick="documentClose1()">
            X
        </div>
        <div id="documentOpen1" class="panel1">
            <div style="position: relative; ">
                <div class="mb-4 heading" style="margin-top: 0.6rem;">
                    <div style="font-size: 20px;"> Audit Details </div>
                    <input type="file" id="mainInputUpload" multiple class="btn btn-warning" name="" id="">

                </div>
            </div>

            <div class="main ">




                <div class="pivot-tabs">

                    <button class="pivot-tab active" data-target="AuditSchedule">Audit Schedule</button>
                    <!-- <button class="pivot-tab" data-target="tab4">Message</button> -->
                    <button class="pivot-tab" data-target="AuditFindings">Audit Findings</button>
                    <button class="pivot-tab" data-target="PostAuditActivities">Post Audit Activities</button>


                </div>

                <div class="pivot-content">
                    <div class="form-container pivot-panel active" id="AuditSchedule">
                        <form class="row" onsubmit="handleFormSubmit(event)" style="pointer-events: none;opacity: 0.7;">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="col-md-3">
                                <label class="form-label">Audit Type</label>
                                <select class="form-control" name="audit_type" required>
                                    <option value="" disabled selected>Select Audit</option>
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
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <div class="attendees-div">
                                        <label class="form-label">Department To Be Audited</label>

                                        <ul id="DepartmentList" class="list-group mt-2"></ul>
                                        <div id="departmentsDisplay" class="selected-items-container">
                                            <!-- Departments will be displayed here -->
                                        </div>
                                        <button id="addDepartmentBtn" class="btn btn-primary mt-2"><i
                                                class="fa-solid fa-plus"></i></button>
                                        <input type="hidden" name="departments">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="attendees-div">
                                        <label class="form-label">Auditors</label>

                                        <ul id="auditorsList" class="list-group mt-2"></ul>
                                        <div id="auditorsDisplay" class="selected-items-container">
                                            <!-- Auditors will be displayed here -->
                                        </div>
                                        <button id="addAuditorBtn" class="btn btn-primary mt-2"><i
                                                class="fa-solid fa-plus"></i></button>
                                        <input type="hidden" name="auditors">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="attendees-div">
                                        <label class="form-label">Attendees</label>

                                        <ul id="attendeesList" class="list-group mt-2"></ul>
                                        <div id="attendeesDisplay" class="selected-items-container">
                                            <!-- Attendees will be displayed here -->
                                        </div>
                                        <button id="addAttendeeBtn" class="btn btn-primary mt-2"><i
                                                class="fa-solid fa-plus"></i></button>
                                        <input type="hidden" name="attendees">
                                    </div>
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
                        </form>

                    </div>

                    <label class="form-label">Total No. of NC's</label>
                    <div class="pivot-panel" id="AuditFindings">
                        <div class="AuditFindingsSummary row">
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Audit Scheduled End Date</label>
                                <input class="form-control" type="date" name="audit_end_date" disabled>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label class="form-label">Nature of Audit</label>
                                <input class="form-control" type="text" name="nature_of_audit" id="natureOfAuditInput"
                                    disabled>
                            </div>
                            <div class="col-md-2 mt-3">
                                <input class="form-control" type="text" value="{{ $totalNC ?? '0' }}" disabled>
                            </div>
                            <div class="col-md-2 mt-3">
                                <label class="form-label">Total No. of Observations</label>
                                <input class="form-control" type="text" value="{{ $totalObservations ?? '0' }}" disabled>
                            </div>
                            <div class="col-md-6 mt-3"></div>
                            <div class="col-md-1 mt-3">
                                <label class="form-label">Major</label>
                                <input class="form-control" type="text" value="{{ $majorCount ?? '0' }}" disabled>
                            </div>
                            <div class="col-md-1 mt-3">
                                <label class="form-label">Minor</label>
                                <input class="form-control" type="text" value="{{ $minorCount ?? '0' }}" disabled>
                            </div>
                        </div>

                        <td>
                            <form action="{{ route('auditFindings.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="audit_schedule_id" id="auditScheduleId">

                                <div class="table-responsive">
                                    <table class="table stock-planner-table">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">Audit Date</th>
                                                <th rowspan="2">Department</th>
                                                <th rowspan="2">Assessor</th>
                                                <th rowspan="2">NC's / Observations</th>
                                                <th colspan="2">No of NC's</th>
                                                <th rowspan="2">No. of Observations</th>
                                                <!-- <th rowspan="2">NC/Observations Details</th> -->
                                                <th rowspan="2">Choose File</th>
                                            </tr>
                                            <tr>
                                                <th>Major</th>
                                                <th>Minor</th>
                                            </tr>
                                        </thead>
                                        <tbody id="auditFindingsTable">
                                            <tr class="audit-row">
                                                <td><input type="date" name="audit_findings[0][audit_date]"
                                                        class="form-control"></td>
                                                <td>
                                                    <select name="audit_findings[0][department]"
                                                        class="form-control department-select">
                                                        <option value="">Select</option>
                                                        <!-- Departments will be populated dynamically -->
                                                    </select>
                                                </td>
                                                <td><input type="text" name="audit_findings[0][assessor]"
                                                        class="form-control">
                                                </td>
                                                <td><input type="number" name="audit_findings[0][major]"
                                                        class="form-control">
                                                </td>
                                                <td><input type="number" name="audit_findings[0][minor]"
                                                        class="form-control">
                                                </td>
                                                <td><input type="number" name="audit_findings[0][observations]"
                                                        class="form-control"></td>
                                                <td>
                                                    <textarea name="audit_findings[0][details]"
                                                        class="form-control"></textarea>
                                                </td>
                                                <td>
                                                    @if(isset($auditFinding) && isset($auditFinding['documents']))
                                                        @foreach(json_decode($auditFinding['documents']) as $document)
                                                            <div
                                                                style="margin: 4px 0; padding: 5px; background: #f8f9fa; border-radius: 4px; display: inline-block;">
                                                                <a href="{{ route('audit.document.download', [urlencode($document)]) }}"
                                                                    target="_blank"
                                                                    style="color: #007bff; text-decoration: none; display: flex; align-items: center; gap: 5px;">
                                                                    <i class="fas fa-file-download" style="color: #6c757d;"></i>
                                                                    {{ basename($document) }}
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                    @endif

                                                    <input type="file" name="audit_findings[0][documents][]"
                                                        class="form-control mt-1" multiple>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <!-- <select name="audit_findings[0][nc_type]" class="form-control">
                                                                                                        <option value="">Select</option>
                                                                                                        <option value="Major Nc">Major NC</option>
                                                                                                        <option value="Minor Nc">Minor NC</option>
                                                                                                        <option value="Observations">Observations</option>
                                                                                                    </select> -->
                        </td>
                        </table>
                        <button type="button" class="btn btn-primary m-1" id="addRowBtn">+</button>
                    </div>

                    <button type="submit" class="save-button btn btn-success">Save</button>
                    </form>
                    <table class="table stock-planner-table">
                        <thead>
                            <tr>
                                <th rowspan="2">Audit Date</th>
                                <th rowspan="2">Department</th>
                                <th rowspan="2">Assessor</th>
                                <th rowspan="2">NC's / Observations</th>
                                <th colspan="2">No of NC's</th>
                                <th rowspan="2">No. of Observations</th>
                                <!-- <th rowspan="2">NC/Observations Details</th> -->
                                <th rowspan="2">Choose File</th>
                            </tr>
                            <tr>
                                <th>Major</th>
                                <th>Minor</th>
                            </tr>
                        </thead>
                        <tbody id="auditFindingsTable">
                            @foreach ($findings as $item)

                                <tr class="audit-row">
                                    <td>{{ $item->audit_date }}</td>
                                    <td>
                                        {{ $item->department }}
                                    </td>
                                    <td>
                                        {{ $item->assessor }}
                                    </td>
                                    <td>
                                        {{ $item->nc_type }}
                                    </td>
                                    <td>
                                        {{ $item->major }}
                                    </td>
                                    <td>
                                        {{ $item->minor }}
                                    </td>
                                    <td>
                                        {{ $item->observations }}
                                    </td>
                                    <td>
                                        @if($item->documents)
                                            @foreach(json_decode($item->documents) as $document)
                                                <div
                                                    style="margin: 4px 0; padding: 5px; background: #f8f9fa; border-radius: 4px; display: inline-block;">
                                                    <a href="{{ route('audit.document.download', [urlencode($document)]) }}"
                                                        target="_blank"
                                                        style="color: #007bff; text-decoration: none; display: flex; align-items: center; gap: 5px;">
                                                        <i class="fas fa-file-download" style="color: #6c757d;"></i>
                                                        {{ basename($document) }}
                                                    </a>
                                                </div>
                                            @endforeach
                                        @else
                                            No documents
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <!-- <select name="audit_findings[0][nc_type]" class="form-control">
                                                                                                        <option value="">Select</option>
                                                                                                        <option value="Major Nc">Major NC</option>
                                                                                                        <option value="Minor Nc">Minor NC</option>
                                                                                                        <option value="Observations">Observations</option>
                                                                                                    </select> -->
                        </td>
                    </table>

                </div>

                <div class="pivot-panel" id="PostAuditActivities">
                    <div class="AuditFindingsSummary row">
                        <div class="col-md-3 mt-3">
                            <label class="form-label">Nature of Audit</label>
                            <input class="form-control" type="text" name="nature_of_audit" id="natureOfAuditInput2"
                                disabled>
                        </div>
                        <div class="col-md-3 mt-3">
                            <label class="form-label">Audit Scheduled End Date</label>
                            <input class="form-control" type="date" name="audit_end_date" disabled>
                        </div>

                        <div class="col-md-2 mt-3">
                            <label class="form-label">Total No. of NC's</label>
                            <input class="form-control" type="text" name="totalNC" disabled>
                        </div>
                        <div class="col-md-2 mt-3">
                            <label class="form-label">Total No. of Observations</label>
                            <input class="form-control" type="text" name="totalObservations" disabled>
                        </div>
                        <div class="col-md-6 mt-3"></div>
                        <div class="col-md-1 mt-3">
                            <label class="form-label">Major</label>
                            <input class="form-control" type="text" name="majorCount" disabled>
                        </div>
                        <div class="col-md-1 mt-3">
                            <label class="form-label">Minor</label>
                            <input class="form-control" type="text" name="minorCount" disabled>
                        </div>
                    </div>

                    <form id="postAuditActivitiesForm" action="{{ route('postAuditActivities.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="audit_schedule_id" id="auditScheduleId">
                        <!-- Ensure this is inside the form -->

                        <!-- Other form fields -->
                        <div class="table-responsive">
                            <table class="stock-planner-table">
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
                                <tbody id="postAuditActivitiesTable">
                                    <tr class="post-audit-row">
                                        <td><input type="text" name="nc_no" class="form-control" required></td>
                                        <td><input type="text" name="department" class="form-control" required></td>
                                        <td><input type="text" name="nature_of_nc" class="form-control" required></td>
                                        <td><textarea name="rca" class="form-control"></textarea></td>
                                        <td><input type="file" name="electronic_documents[]" class="form-control" multiple>
                                        </td>
                                        <td><input type="text" name="risk_profile" class="form-control"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <button type="submit" class="btn btn-success mt-3">Save</button>
                    </form>
                </div>
            </div>

        </div>

        </div>
    </body>
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
            function handleFormSubmit(event) {
                event.preventDefault();
                updateHiddenInput(document.getElementById("DepartmentList"), document.querySelector('input[name="departments"]'));
                updateHiddenInput(document.getElementById("auditorsList"), document.querySelector('input[name="auditors"]'));
                updateHiddenInput(document.getElementById("attendeesList"), document.querySelector('input[name="attendees"]'));

                let formData = new FormData(event.target);

                // Append CSRF token manually if it's not in the form
                if (!formData.has("_token")) {
                    let csrfToken = document.querySelector('meta[name="csrf-token"]')?.content ||
                        document.querySelector('input[name="_token"]')?.value;
                    formData.append("_token", csrfToken);
                }

                fetch('/audit-schedule/store', {
                    method: "POST",
                    body: formData,
                })
                    .then(response => response.json())
                    .then(data => {
                        alert("Form submitted successfully!");
                        console.log(data);
                    })
                    .catch(error => {
                        console.error("Error:", error);
                    });
            }

            // Ensure the global function is defined (if it's not already defined elsewhere)
            window.handleFormSubmit = handleFormSubmit;
        });
    </script>


    <script>

        document.querySelector('form[action="{{ route('auditFindings.store') }}"]').addEventListener('submit', async function (e) {
            e.preventDefault();

            const form = this;
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;

            try {
                // Show loading state
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...';

                const response = await fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: formData
                });

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(data.message || 'Failed to save findings');
                }

                // Show success message
                alert('Audit findings saved successfully!');

                // Update the table with the saved data
                updateFindingsTable(data.data);

            } catch (error) {
                console.error('Error:', error);
                alert('Error: ' + error.message);
            } finally {
                // Reset button state
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
            }
        });

        function updateFindingsTable(findings) {
            const tableBody = document.getElementById('auditFindingsTable');
            tableBody.innerHTML = ''; // Clear existing rows

            findings.forEach((finding, index) => {
                const row = document.createElement('tr');
                row.className = 'audit-row';
                row.dataset.id = finding.id;

                // Parse documents if they exist
                const documents = finding.documents ? JSON.parse(finding.documents) : [];
                const documentsDisplay = documents.map(file =>
                    `<a href="/storage/${file}" target="_blank" class="file-link"></a>`
                ).join(', ');

                row.innerHTML = `
                                                                                                                                                                                                                                        <td>${finding.audit_date}</td>
                                                                                                                                                                                                                                        <td>${finding.department}</td>
                                                                                                                                                                                                                                        <td>${finding.assessor}</td>
                                                                                                                                                                                                                                        <td>${finding.major}</td>
                                                                                                                                                                                                                                        <td>${finding.minor}</td>
                                                                                                                                                                                                                                        <td>${finding.observations}</td>
                                                                                                                                                                                                                                        <td>${finding.details || ''}</td>
                                                                                                                                                                                                                                        <td>${documents.length > 0 ? documentsDisplay : 'No files'}</td>
                                                                                                                                                                                                                                    `;

                tableBody.appendChild(row);
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


        // document.querySelector('form').addEventListener('submit', function (e) {
        //     e.preventDefault(); // Prevent default form submission

        //     const formData = new FormData(this); // Get form data
        //     const auditFindings = [];

        //     // Loop through the table rows and collect data
        //     document.querySelectorAll('#auditFindingsTable .audit-row').forEach((row, index) => {
        //         const finding = {
        //             audit_date: row.querySelector('input[name="audit_findings[' + index + '][audit_date]"]').value,
        //             department: row.querySelector('select[name="audit_findings[' + index + '][department]"]').value,
        //             assessor: row.querySelector('input[name="audit_findings[' + index + '][assessor]"]').value,
        //             nc_type: row.querySelector('select[name="audit_findings[' + index + '][nc_type]"]').value,
        //             major: row.querySelector('input[name="audit_findings[' + index + '][major]"]').value || null,
        //             minor: row.querySelector('input[name="audit_findings[' + index + '][minor]"]').value || null,
        //             observations: row.querySelector('input[name="audit_findings[' + index + '][observations]"]').value || null,
        //             details: row.querySelector('textarea[name="audit_findings[' + index + '][details]"]').value || null,
        //         };
        //         auditFindings.push(finding);
        //     });

        //     // Add audit findings to the form data
        //     formData.append('audit_findings', JSON.stringify(auditFindings));

        //     // Submit the form via AJAX
        //     fetch("{{ route('auditFindings.store') }}", {
        //         method: 'POST',
        //         headers: {
        //             'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
        //             'Accept': 'application/json',
        //         },
        //         body: formData,
        //     })
        //         .then(response => response.json())
        //         .then(data => {
        //             if (data.status === 'success') {
        //                 alert(data.message); // Show success message
        //             } else {
        //                 alert('Error: ' + data.message); // Show error message
        //             }
        //         })
        //         .catch(error => {
        //             console.error('Error:', error);
        //         });
        // });

        document.querySelector('form').addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent default form submission

            const form = this;
            const formData = new FormData(form);

            // Remove this if it's already handled in blade
            formData.delete('audit_findings');

            const rows = document.querySelectorAll('.audit-finding-row'); // your rows class

            rows.forEach((row, index) => {

                console.log(row);
                const auditDate = row.querySelector('[name="audit_date[]"]').value;
                const department = row.querySelector('[name="department[]"]').value;
                const assessor = row.querySelector('[name="assessor[]"]').value;
                const major = row.querySelector('[name="major[]"]').value;
                const minor = row.querySelector('[name="minor[]"]').value;
                const observations = row.querySelector('[name="observations[]"]').value;
                const details = row.querySelector('[name="details[]"]').value;
                const documents = row.querySelector('[name="documents[]"]');

                formData.append(`audit_findings[${index}][audit_date]`, auditDate);
                formData.append(`audit_findings[${index}][department]`, department);
                formData.append(`audit_findings[${index}][assessor]`, assessor);
                formData.append(`audit_findings[${index}][major]`, major);
                formData.append(`audit_findings[${index}][minor]`, minor);
                formData.append(`audit_findings[${index}][observations]`, observations);
                formData.append(`audit_findings[${index}][details]`, details);

                if (documents && documents.files.length > 0) {
                    for (let i = 0; i < documents.files.length; i++) {
                        formData.append(`audit_findings[${index}][documents][${i}]`, documents.files[i]);
                    }
                }
            });

            fetch("{{ route('auditFindings.store') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json',
                },
                body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        alert(data.message);
                    } else {
                        alert('Error: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
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

        function openDocument1(auditId, departments) {
            console.log('Opening audit:', auditId);

            // Show the modal
            document.getElementById('documentClose1').classList.add('opened');
            document.getElementById('documentOpen1').classList.add('open');

            // Set the audit ID in the hidden field
            document.getElementById('auditScheduleId').value = auditId;

            // Fetch audit details
            fetch(`/get-audit-details/${auditId}`)
                .then(response => {
                    if (!response.ok) {
                        // throw new Error('Network response was not ok');
                        return response.text().then(text => {
                            throw new Error(`HTTP ${response.status}: ${text}`);
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Received data:', data);

                    // Populate basic form fields
                    document.querySelector('select[name="audit_type"]').value = data.audit_type || '';
                    document.querySelector('select[name="nature_of_audit"]').value = data.nature_of_audit || '';
                    document.querySelector('input[name="audit_start_date"]').value = data.audit_start_date || '';
                    // Set nature of audit in Audit Findings section
                    document.getElementById('natureOfAuditInput').value = data.nature_of_audit || 'Not given';
                    document.getElementById('natureOfAuditInput2').value = data.nature_of_audit || 'Not given';
                    // Set end date in all sections
                    const endDateInputs = document.querySelectorAll('input[name="audit_end_date"]');
                    endDateInputs.forEach(input => {
                        input.value = data.audit_end_date || '';
                    });

                    document.querySelector('input[name="audit_location"]').value = data.audit_location || '';
                    document.querySelector('select[name="audit_status"]').value = data.audit_status || '';

                    if (Array.isArray(data.departments)) {
                        displayItems(data.departments, 'departmentsDisplay');
                        setFormValue('input[name="departments"]', JSON.stringify(data.departments));
                        populateDepartmentDropdown(data.departments);
                    } else if (departments && Array.isArray(departments)) {
                        // Fallback to passed departments
                        displayItems(departments, 'departmentsDisplay');
                        populateDepartmentDropdown(departments);
                    }


                    // Handle departments
                    // if (data.departments) {
                    //     try {
                    //         const departmentsArray = typeof data.departments === 'string'
                    //             ? JSON.parse(data.departments)
                    //             : data.departments;

                    //         // Display departments in the UI
                    //         displayItems(departmentsArray, 'departmentsDisplay');

                    //         // Set the hidden input value
                    //         document.querySelector('input[name="departments"]').value = JSON.stringify(departmentsArray);

                    //         // Populate department dropdown in AuditFindings section
                    //         populateDepartmentDropdown(departmentsArray);
                    //     } catch (e) {
                    //         console.error('Error parsing departments:', e);
                    //     }
                    // }

                    // Handle auditors
                    if (data.auditors) {
                        try {
                            const auditorsArray = typeof data.auditors === 'string'
                                ? JSON.parse(data.auditors)
                                : data.auditors;
                            displayItems(auditorsArray, 'auditorsDisplay');
                            document.querySelector('input[name="auditors"]').value = JSON.stringify(auditorsArray);
                        } catch (e) {
                            console.error('Error parsing auditors:', e);
                        }
                    }

                    // Handle attendees
                    if (data.attendees) {
                        try {
                            const attendeesArray = typeof data.attendees === 'string'
                                ? JSON.parse(data.attendees)
                                : data.attendees;
                            displayItems(attendeesArray, 'attendeesDisplay');
                            document.querySelector('input[name="attendees"]').value = JSON.stringify(attendeesArray);
                        } catch (e) {
                            console.error('Error parsing attendees:', e);
                        }
                    }

                    // Set audit notes
                    const notesEditor = document.getElementById('auditNotesEditor');
                    if (data.audit_notes) {
                        notesEditor.innerHTML = data.audit_notes;
                    } else {
                        notesEditor.innerHTML = '<p>Start typing here...</p>';
                    }

                    // Now fetch the audit findings
                    return fetch(`/get-audit-findings/${auditId}`);

                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(findingsData => {
                    console.log('Received findings:', findingsData);

                    // Populate the findings table if data exists
                    if (findingsData && findingsData.findings && findingsData.findings.length > 0) {
                        populateFindingsTable(findingsData.findings);
                    }
                })
                .catch(error => {
                    console.error('Error loading audit details:', error);
                    // alert('Error loading audit details. Please try again.');
                    // Optionally close the modal or show an error state
                });
        }


        function setFormValue(selector, value) {
            const element = document.querySelector(selector);
            if (element) element.value = value || '';
        }
        function resetFormFields() {
            // Reset all form fields to empty/default values
            document.querySelectorAll('input, select, textarea').forEach(field => {
                if (field.type !== 'button' && field.type !== 'submit') {
                    field.value = '';
                }
            });
            document.getElementById('auditNotesEditor').innerHTML = '<p>Start typing here...</p>';
            document.getElementById('departmentsDisplay').innerHTML = '';
            document.getElementById('auditorsDisplay').innerHTML = '';
            document.getElementById('attendeesDisplay').innerHTML = '';
        }

        function setFormValue(selector, value) {
            const element = document.querySelector(selector);
            if (element) {
                element.value = value || '';
            }
        }

        function safeParseJSON(jsonString) {
            if (typeof jsonString === 'string') {
                return JSON.parse(jsonString);
            }
            return jsonString; // Already parsed or is an object
        }

        function populateFindingsTable(findings) {
            const tableBody = document.getElementById('auditFindingsTable');
            tableBody.innerHTML = ''; // Clear existing rows

            findings.forEach((finding, index) => {
                const newRow = document.createElement('tr');
                newRow.classList.add('audit-row');
                newRow.dataset.id = finding.id;

                // Get departments for dropdown
                const departments = JSON.parse(finding.audit_schedule.departments || '[]');
                let departmentOptions = '<option value="">Select</option>';
                departments.forEach(dept => {
                    departmentOptions += `<option value="${dept.id}" ${dept.id === finding.department ? 'selected' : ''}>${dept.name}</option>`;
                });

                // Prepare documents display
                let documentsDisplay = 'No files';
                if (finding.documents) {
                    const documents = JSON.parse(finding.documents);
                    documentsDisplay = documents.map(file =>
                        `<a href="/storage/${file}" target="_blank" class="file-link">View File</a>`
                    ).join(', ');
                }

                newRow.innerHTML = `
                                                                                                                                                                                                                <td><input type="date" name="audit_findings[${index}][audit_date]" class="form-control" value="${finding.audit_date}"></td>
                                                                                                                                                                                                                <td>
                                                                                                                                                                                                                    <select name="audit_findings[${index}][department]" class="form-control department-select">
                                                                                                                                                                                                                        ${departmentOptions}
                                                                                                                                                                                                                    </select>
                                                                                                                                                                                                                </td>
                                                                                                                                                                                                                <td><input type="text" name="audit_findings[${index}][assessor]" class="form-control" value="${finding.assessor || ''}"></td>
                                                                                                                                                                                                                <td><input type="number" name="audit_findings[${index}][major]" class="form-control" value="${finding.major || 0}"></td>
                                                                                                                                                                                                                <td><input type="number" name="audit_findings[${index}][minor]" class="form-control" value="${finding.minor || 0}"></td>
                                                                                                                                                                                                                <td><input type="number" name="audit_findings[${index}][observations]" class="form-control" value="${finding.observations || 0}"></td>
                                                                                                                                                                                                                <td>
                                                                                                                                                                                                                    <textarea name="audit_findings[${index}][details]" class="form-control">${finding.details || ''}</textarea>
                                                                                                                                                                                                                </td>
                                                                                                                                                                                                                <td>
                                                                                                                                                                                                                    ${documentsDisplay}
                                                                                                                                                                                                                    <input type="file" name="audit_findings[${index}][documents][]" class="form-control mt-1" multiple>
                                                                                                                                                                                                                </td>
                                                                                                                                                                                                            `;
                tableBody.appendChild(newRow);
            });
        }


        function populateDepartmentDropdown(departments) {
            const selects = document.querySelectorAll('.department-select');

            selects.forEach(select => {
                // Save current value
                const currentValue = select.value;

                // Clear existing options
                select.innerHTML = '<option value="">Select</option>';

                // Add new options
                departments.forEach(dept => {
                    const option = document.createElement('option');
                    option.value = typeof dept === 'object' ? dept.id : dept;
                    option.textContent = typeof dept === 'object' ? dept.name : dept;
                    select.appendChild(option);
                });

                // Restore previous value if it exists in new options
                if (currentValue && Array.from(select.options).some(opt => opt.value === currentValue)) {
                    select.value = currentValue;
                }
            });
        }

        function displayItems(items, containerId) {
            const container = document.getElementById(containerId);
            if (!container) {
                console.error('Container not found:', containerId);
                return;
            }

            container.innerHTML = ''; // Clear previous items

            if (!items || items.length === 0) {
                container.innerHTML = '<div class="no-items">No items selected</div>';
                return;
            }

            items.forEach(item => {
                const itemElement = document.createElement('div');
                itemElement.className = 'selected-item';

                // Handle both object and string items
                const displayText = typeof item === 'object'
                    ? (item.name || item.id || JSON.stringify(item))
                    : item;

                itemElement.textContent = displayText;
                container.appendChild(itemElement);
            });
        }

        function documentClose1() {
            document.getElementById('documentClose1').classList.remove('opened');
            document.getElementById('documentOpen1').classList.remove('open');
        }

        document.getElementById('addRowBtn').addEventListener('click', function () {
            let table = document.getElementById('auditFindingsTable');
            let rowCount = table.getElementsByClassName('audit-row').length;
            let newRow = document.createElement('tr');
            newRow.classList.add('audit-row');

            // Get departments from the hidden input
            const departmentsInput = document.querySelector('input[name="departments"]');
            let departments = [];

            try {
                departments = departmentsInput?.value ? JSON.parse(departmentsInput.value) : [];
            } catch (e) {
                console.error('Error parsing departments:', e);
            }

            // Build department options
            let departmentOptions = '<option value="">Select</option>';
            departments.forEach(dept => {
                // Handle both object and string department representations
                const value = typeof dept === 'object' ? (dept.id || dept.name || JSON.stringify(dept)) : dept;
                const text = typeof dept === 'object' ? dept.name || dept.id || JSON.stringify(dept) : dept;
                departmentOptions += `<option value="${value}">${text}</option>`;
            });

            newRow.innerHTML = `
                                                                                                                <td><input type="date" name="audit_findings[${rowCount}][audit_date]" class="form-control"></td>
                                                                                                                <td>
                                                                                                                    <select name="audit_findings[${rowCount}][department]" class="form-control department-select">
                                                                                                                        ${departmentOptions}
                                                                                                                    </select>
                                                                                                                </td>
                                                                                                                <td><input type="text" name="audit_findings[${rowCount}][assessor]" class="form-control"></td>
                                                                                                                <td><input type="number" name="audit_findings[${rowCount}][major]" class="form-control" value="0"></td>
                                                                                                                <td><input type="number" name="audit_findings[${rowCount}][minor]" class="form-control" value="0"></td>
                                                                                                                <td><input type="number" name="audit_findings[${rowCount}][observations]" class="form-control" value="0"></td>
                                                                                                                <td>
                                                                                                                    <textarea name="audit_findings[${rowCount}][details]" class="form-control"></textarea>
                                                                                                                </td>
                                                                                                                <td>
                                <div class="uploaded-documents-preview-${rowCount}">
                                </div>
                                <input type="file" name="audit_findings[${rowCount}][documents][]" class="form-control mt-1" multiple>
                            </td>
                                                                                                            `;
            table.appendChild(newRow);
        });

        function displayDocumentLinks(documentsJson) {
            if (!documentsJson) return 'No documents';

            try {
                const documents = JSON.parse(documentsJson);
                let html = '';

                documents.forEach(file => {
                    const fileName = file.split('/').pop();
                    html += `
                            <div style="margin: 4px 0; padding: 5px; background: #f8f9fa; border-radius: 4px;">
                                <a href="/download/audit-document/${encodeURIComponent(file)}" 
                                   target="_blank"
                                   style="color: #007bff; text-decoration: none; display: flex; align-items: center; gap: 5px;">
                                   <i class="fas fa-file-download" style="color: #6c757d;"></i>
                                   ${fileName}
                                </a>
                            </div>
                        `;
                });

                return html;
            } catch (e) {
                console.error('Error parsing documents:', e);
                return 'Error loading documents';
            }
        }

        // Usage example:
        const documentsHtml = displayDocumentLinks(finding.documents);
        document.getElementById('documents-cell').innerHTML = documentsHtml;

        document.getElementById('postAuditActivitiesForm').addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent default form submission

            let auditScheduleId = document.getElementById('auditScheduleId').value;

            console.log("Audit Schedule ID before submit:", auditScheduleId); // Debugging

            if (!auditScheduleId) {
                alert("Audit Schedule ID is missing!");
                return;
            }

            let formData = new FormData(this);

            // Ensure audit_schedule_id is included (force add it)
            formData.set('audit_schedule_id', auditScheduleId);

            // Debugging: Check formData content
            for (let [key, value] of formData.entries()) {
                console.log(`${key}: ${value}`);
            }

            fetch(this.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json'
                },
                body: formData
            })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(err => Promise.reject(err));
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.status === 'success') {
                        alert(data.message);
                        location.reload();
                    } else {
                        alert('Error: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again.');
                });
        });
        function fetchAuditFindings(auditScheduleId) {
            $.ajax({
                url: '/audit-findings/' + auditScheduleId,
                type: 'GET',
                success: function (response) {
                    if (response.auditSchedule) {
                        $('#auditScheduleId').val(response.auditSchedule.id);

                        // Set end date in AuditFindings section
                        $('input[name="audit_end_date"]').val(response.auditSchedule.audit_end_date);

                        // Set nature of audit in AuditFindings section
                        $('input[name="nature_of_audit"]').val(response.auditSchedule.nature_of_audit);

                        // Set other values
                        $('input[name="department"]').val(response.latestAuditFinding?.department || '');
                        $('input[name="totalNC"]').val(response.latestAuditFinding?.total_nc || '0');
                        $('input[name="totalObservations"]').val(response.latestAuditFinding?.total_observations || '0');
                        $('input[name="majorCount"]').val(response.latestAuditFinding?.major || '0');
                        $('input[name="minorCount"]').val(response.latestAuditFinding?.minor || '0');

                        // If you need to repopulate departments from the response:
                        if (response.auditSchedule.departments) {
                            try {
                                const departmentsArray = typeof response.auditSchedule.departments === 'string'
                                    ? JSON.parse(response.auditSchedule.departments)
                                    : response.auditSchedule.departments;
                                populateDepartmentDropdown(departmentsArray);
                            } catch (e) {
                                console.error('Error parsing departments:', e);
                            }
                        }
                    }
                },
                error: function (error) {
                    console.error('Error fetching audit findings:', error);
                }
            });
        }

        function renderDocuments(rowCount, documents) {
            let container = document.querySelector(`.uploaded-documents-preview-${rowCount}`);
            if (!container || !documents) return;

            documents.forEach(doc => {
                const fileName = doc.split('/').pop();
                const link = document.createElement('a');
                link.href = `/download/audit-document${encodeURIComponent(doc)}`;
                link.target = '_blank';
                link.innerHTML = `<i class="fas fa-file-download" style="color: #6c757d;"></i> ${fileName}`;
                link.style.cssText = "color: #007bff; text-decoration: none; display: flex; align-items: center; gap: 5px;";

                const wrapper = document.createElement('div');
                wrapper.style.cssText = "margin: 4px 0; padding: 5px; background: #f8f9fa; border-radius: 4px; display: inline-block;";
                wrapper.appendChild(link);

                container.appendChild(wrapper);
            });
        }

    </script>

    </html>

@endsection