@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ILC SetUp</title>
        <!-- FullCalendar CSS (optional) -->
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet">

        <!-- FullCalendar JS -->
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
    </head>
    <style>
        .multi-select-container {
            width: 300px;
            position: relative;
            font-size: 14px;
        }

        .multi-select-dropdown {
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 10px;
            cursor: pointer;
            background: #f9f9f9;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
        }

        .multi-select-dropdown span {
            margin: 5px;
            background-color: #007BFF;
            color: white;
            padding: 5px;
            border-radius: 3px;
            display: inline-flex;
            align-items: center;
        }

        .multi-select-dropdown span button {
            background: transparent;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 12px;
            margin-left: 5px;
        }

        .multi-select-dropdown::after {
            content: '▼';
            margin-left: auto;
            color: #666;
        }

        .dropdown-options {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 4px;
            background: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: none;
            max-height: 150px;
            overflow-y: auto;
            z-index: 1000;
        }

        .dropdown-options label {
            display: block;
            padding: 8px;
            cursor: pointer;
            user-select: none;
        }

        .dropdown-options label:hover {
            background: #007BFF;
            color: white;
        }

        .multi-select-container.active .dropdown-options {
            display: block;
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

        .ILC-container {

            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .ILC-title {
            text-align: center;
            color: #333;
        }

        .ILC-filter-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .ILC-filter-section select,
        input {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .ILC-table {
            width: 100%;
            border-collapse: collapse;
        }

        .ILC-table th,
        .ILC-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        .ILC-table th {
            background-color: #f4f4f4;
            color: #333;
        }

        .ILC-add-new {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        .ILC-add-new button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .ILC-add-new button:hover {
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

        /* From Uiverse.io by vishnupprajapat */
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

        .ILC-modal {
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

        .ILC-modal-content {
            background-color: #fefefe;
            margin: 8% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            overflow: auto;
        }

        .ILC-close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .ILC-close:hover,
        .ILC-close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .ILC-selected-items {
            margin-top: 10px;
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

        .form-container-sub input[type="file"] {
            padding: 5px;
            width: 100%;
        }
    </style>

    <body>
        <div class="main ">
            <form id="eqasForm" action="{{ route('ilc.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
                    <div style="font-size: 20px;">ILC Submission</div>
                    <div style="font-size: 20px;">

                        @if(auth()->user()->role == 1)
                            <select id="labDropdown" name="lab" class="form-select" style="width: 200px;"
                                onchange="fetchDataForSelectedLab()">
                                <option value="">-- Select Labs --</option>
                                @foreach ($labs as $lab)
                                    <option value="{{ $lab->id }}" {{ $lab->id == auth()->user()->lab_id ? 'selected' : '' }}>
                                        {{ $lab->location }}
                                    </option>
                                @endforeach
                            </select>
                        @else
                            <input type="text" value="{{ auth()->user()->lab->location ?? 'My Lab' }}" disabled
                                class="form-control" style="width: 200px;">
                            <input type="hidden" id="labDropdown" name="lab" value="{{ auth()->user()->lab_id }}">
                        @endif
                    </div>
                </div>


                <div class="table-responsive p-3">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Department</th>
                                <th>ILC Provider</th>
                                <th>ILC Program</th>
                                <th>ILC Cycles</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select name="department" class="form-control" required>
                                        <option value="">-- Select --</option>
                                        @foreach ($departs as $department)
                                            <option value="{{ $department->department }}">{{ $department->department }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="ilc_provider" class="form-control" required>
                                        <option value="">-- Select --</option>
                                        <option value="ILC1">ILC 1</option>
                                        <option value="ILC2">ILC 2</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="ilc_program" class="form-control" required>
                                        <option value="">-- Select --</option>
                                        <option value="Program 1">Program 1</option>
                                        <option value="Program 2">Program 2</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="ilc_cycle" class="form-control" required>
                                        <option value="">-- Select --</option>
                                        <option value="Cycle 1">Cycle 1</option>
                                        <option value="Cycle 2">Cycle 2</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label>ILC Last Submission Date</label>
                            <input type="date" name="last_submission_date" class="form-control" disabled>
                        </div>
                        <div class="col-md-3">
                            <label>ILC Submission Date</label>
                            <input type="date" name="submission_date" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label>Status</label>
                            <select name="status" class="form-control" required>
                                <option value="">Select</option>
                                <option value="Completed">Completed</option>
                                <option value="Inprogress">In Progress</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Attachment</label>
                            <input type="file" name="file" class="form-control">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label>All Parameters</label>
                            <textarea name="parameters" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label>Notes</label>
                            <textarea name="notes" class="form-control" rows="5"></textarea>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>
        </div>

        </div>

    </body>

    <script>
        $(document).ready(function () {
            $("#eqasForm").submit(function (event) {
                event.preventDefault(); // Prevent default form submission

                var formData = new FormData(this); // Get form data including files

                $.ajax({
                    url: $(this).attr("action"), // Get form action URL
                    type: $(this).attr("method"), // Get form method (POST)
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        alert("Form submitted successfully!"); // Show success alert
                        location.reload(); // Reload page after submission
                    },
                    error: function (xhr, status, error) {
                        alert("An error occurred: " + xhr.responseText); // Show error message
                    }
                });
            });
        });

    </script>

    </html>

@endsection