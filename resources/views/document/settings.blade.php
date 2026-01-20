@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Settings</title>
        <style>
            .wapp-sidebar {
                height: calc(100vh - 185px);
                width: 20%;
                background-color: #010046;
                color: white;
                display: flex;
                flex-direction: column;
            }

            .wapp-sidebar-header {
                padding: 10px;
                background-color: #177445;
                text-align: center;
                font-size: 1.5em;
            }

            .wapp-chat-list {
                flex: 1;
                overflow-y: auto;
            }

            .wapp-chat-item {
                padding: 10px;
                cursor: pointer;
                border-bottom: 1px solid #ccc;
            }

            .wapp-chat-item:hover {
                background-color: #0b8065;
            }

            .wapp-chat-item.active {
                background-color: #0b8065;
            }

            .wapp-main-chat {
                height: calc(100% - 70px);
                flex: 1;
                display: none;
                /* Initially hide all chats */
                flex-direction: column;
                position: relative;
            }

            .wapp-main-chat.active {
                display: flex;

                /* Show only the active chat */
            }

            .wapp-chat-header {
                padding: 10px;
                background-color: #009348;
                color: white;
                font-size: 1.2em;
            }

            .wapp-messages {
                display: contents;
                flex: 1;
                padding: 10px;
                overflow-y: auto;
                background-color: white;
            }

            .wapp-message {
                margin-bottom: 10px;
                padding: 10px;
                border-radius: 10px;
                max-width: 70%;
            }

            .wapp-message.sent {
                background-color: #DCF8C6;
                align-self: flex-end;
            }

            .wapp-message.received {
                background-color: lightblue;
                align-self: flex-start;
            }

            .wapp-message-input {
                display: flex;
                position: absolute;
                width: 100%;
                padding: 10px;
                background-color: #f1f1f1;
                border-top: 1px solid #ccc;
                bottom: 0;
            }

            .wapp-message-input input {
                flex: 1;
                padding: 10px;
                border: none;
                border-radius: 20px;
                outline: none;
            }

            .wapp-message-input button {
                margin-left: 10px;
                padding: 10px 20px;
                border: none;
                border-radius: 20px;
                background-color: #075E54;
                color: white;
                cursor: pointer;
            }


            .update-profile-page .container {
                /* max-width: 400px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    margin: 50px auto; */
                padding: 20px;
                background-color: #f5f5f5;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }

            .update-profile-page h1 {
                text-align: center;
                font-size: 24px;
                margin-bottom: 20px;
                color: #333;
            }

            .update-profile-page .profile-pic {
                display: flex;
                justify-content: center;
                margin-bottom: 20px;
            }

            .update-profile-page .profile-pic img {
                border-radius: 50%;
                width: 80px;
                height: 80px;
            }

            .update-profile-page .form-group {
                margin-bottom: 15px;
            }

            .update-profile-page .form-group label {
                display: block;
                font-size: 14px;
                color: #555;
                margin-bottom: 5px;
            }

            .update-profile-page .form-group input {
                width: calc(100% - 20px);
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 14px;
                display: block;
            }

            .update-profile-page .form-group input:focus {
                outline: none;
                border-color: #4a90e2;
            }

            .update-profile-page .form-group select {
                width: calc(100% - 20px);
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 14px;
                display: block;
            }

            .update-profile-page .form-group select:focus {
                outline: none;
                border-color: #4a90e2;
            }

            .update-profile-page .save-button {
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

            .update-profile-page .save-button:hover {
                background-color: #3b78d2;
            }

            .signature-drop-area {
                width: fit-content;
                height: 80px;
                border: 2px dashed #ccc;
                text-align: center;
                line-height: 80px;
                font-size: 14px;
                color: #888;
                margin-top: 20px;
                cursor: pointer;
            }

            .signature-preview {
                margin-top: 10px;
            }

            .dropdown-container {
                margin-bottom: 15px;
            }

            .dropdown-container {
                background-color: #fff;
                padding: 20px;
                margin: 10px 0;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                display: flex;
                flex-direction: column;
            }

            /* Responsive Layout */
            @media (max-width: 768px) {
                .dropdown-container {
                    padding: 15px;
                }

                select,
                input {
                    font-size: 0.9rem;
                }

                button {
                    font-size: 0.9rem;
                }
            }

            /* Spacing between dropdowns */
            .dropdown-container:not(:last-child) {
                margin-bottom: 20px;
            }

            /* Hover effect for entire form */
            .dropdown-container:hover {
                box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
            }

            .dropdown-container select,
            .dropdown-container input {
                padding: 10px;
                border-radius: 5px;
                border: 1px solid #ccc;
                margin-bottom: 12px;
                font-size: 1rem;
                width: 100%;
            }

            /* Button Styling */
            .dropdown-container button {
                background-color: #007bff;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 1rem;
                transition: background-color 0.3s ease;
            }

            .dropdown-container button:hover {
                background-color: #0056b3;
            }

            .dropdown-container button:active {
                background-color: #003f8b;
            }

            .showFilter {
                background-color: transparent;
                /* border: 1px solid transparent; */
                border-radius: 8px;
                color: transparent;
                font-size: 0.7em;
                position: absolute;
                transition: all 0.3s ease-in;
                background-color: #f9f9f9;
                right: 0px;
                width: 0px;
                margin-top: 0;
                z-index: 1000;
                height: 0px;
                overflow: hidden;
                padding: 0 1rem;
                box-shadow: none;

            }

            .filterIcon {
                position: relative;
                margin-left: 0.5rem;
                cursor: pointer;
            }

            .showFilter.active {
                height: auto;
                width: 300px;
                color: inherit;
                padding: 0.5rem;
                background-color: #f9f9f9;
                border-radius: 8px;
                box-shadow: 1px 1px 6px 4px rgb(0 0 0 / 12%);
                z-index: 09999;
            }

            .filterOptions {
                padding: 10px 0;
                border: 1px solid #e0e0e0;
                border-radius: 8px;
                margin: 0.5rem 0;
                padding: 0.5rem;
                font-size: 12px;
                font-weight: normal;
                background-color: #fff;
                color: black;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                transition: all 0.3s ease;
                text-transform: none;
                font-family: "Quicksand", sans-serif;
            }

            .filterOptions:hover {
                background-color: #efeeee;
                transform: translateY(-2px);
            }

            .permissions-container {
                /* max-width: 1200px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        margin: 40px auto; */
                padding: 20px;
                background: #ffffff;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .permissions-header {
                text-align: center;
                margin-bottom: 20px;
                font-size: 1.8rem;
                font-weight: bold;
                color: #333;
            }

            .permissions-table {
                width: 100%;
                border-collapse: collapse;
                /* display: grid;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        grid-template-columns: 1fr repeat(4, 120px);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        grid-auto-rows: minmax(50px, auto); */
            }

            .permissions-table thead {
                display: contents;
            }

            .permissions-table tbody {
                display: contents;
            }

            .permissions-table th,
            .permissions-table td {
                padding: 12px;
                text-align: center;
                border-bottom: 1px solid #e0e6ed;
            }

            .permissions-table th {
                background-color: #007bff;
                color: white;
                font-weight: bold;
                text-transform: uppercase;
            }

            .permissions-table tr:nth-child(odd) {
                background-color: #f9fafb;
            }

            .permissions-table tr:hover {
                background-color: #eaf3ff;
            }

            .permissions-checkbox {
                width: 20px;
                height: 20px;
                cursor: pointer;
                accent-color: #007bff;
                transition: transform 0.2s ease-in-out;
            }

            .permissions-checkbox:checked {
                transform: scale(1.2);
            }

            .permissions-save-button {
                display: block;
                margin: 30px auto 0;
                padding: 12px 30px;
                font-size: 1rem;
                color: #fff;
                background-color: #007bff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease, transform 0.2s;
            }

            .permissions-save-button:hover {
                background-color: #0056b3;
                transform: scale(1.05);
            }

            .toast {
                position: fixed;
                bottom: 20px;
                right: 20px;
                background: #007bff;
                color: white;
                padding: 10px 20px;
                border-radius: 5px;
                font-size: 0.9rem;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
                opacity: 0;
                visibility: hidden;
                transition: opacity 0.4s ease, visibility 0.4s ease;
            }

            .toast.show {
                opacity: 1;
                visibility: visible;
            }

            .form-label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
            }

            .form-control {
                display: block;
                width: 100%;
                padding: .375rem .75rem;
                font-size: 1rem;
                font-weight: 400;
                line-height: 1.5;
                color: #212529;
                background-color: #fff;
                background-clip: padding-box;
                border: 1px solid #ced4da;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                border-radius: .25rem;
                transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
                box-shadow: 0 0 0 0.2rem rgba(12, 175, 96, 0.25);
                margin-bottom: 0;
            }

            .stock-planner-container {
                background: white;
                padding: 0.5rem;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .stock-planner-table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            .stock-planner-table th,
            .stock-planner-table td {
                padding: 10px;
                text-align: left;
                border: 1px solid #ddd;
            }

            .stock-planner-table th {
                background-color: #007BFF;
                color: white;
            }

            .eqas-modal {
                display: none;
                position: fixed;
                z-index: 1000;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgba(0, 0, 0, 0.5);
            }

            .eqas-modal-content {
                background-color: #fff;
                margin: 10% auto;
                padding: 20px;
                border: 1px solid #888;
                width: 80%;
                max-width: 600px;
                position: relative;
            }

            .close-modal {
                position: absolute;
                right: 10px;
                top: 10px;
                cursor: pointer;
                font-size: 24px;
            }

            .close-modal:hover {
                color: red;
            }

            .instrument-form-container {

                background-color: #f8f9fa;
                border-radius: 8px;

            }

            .instrument-form-header {
                color: #2c3e50;
                margin-bottom: 20px;
                text-align: center;
            }

            .instrument-form-group {
                margin-bottom: 20px;
            }

            .instrument-form-label {
                display: block;
                margin-bottom: 8px;
                font-weight: 600;
                color: #495057;
            }

            .instrument-form-input {
                width: 100%;
                padding: 10px 12px;
                border: 1px solid #ced4da;
                border-radius: 4px;
                font-size: 16px;
                transition: border-color 0.15s;
            }

            .instrument-form-input:focus {
                border-color: #80bdff;
                outline: 0;
                box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
            }

            .instrument-form-select {
                width: 100%;
                padding: 10px 12px;
                border: 1px solid #ced4da;
                border-radius: 4px;
                font-size: 16px;
                background-color: white;
                cursor: pointer;
            }

            .instrument-form-submit {
                background-color: #28a745;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
                font-weight: 600;
                width: 100%;
                transition: background-color 0.3s;
            }

            .instrument-form-submit:hover {
                background-color: #218838;
            }
        </style>
    </head>

    <body>
        <div class="main">
            <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
                <div style="font-size: 20px;">Settings </div>
            </div>
            <div style="height: calc(100vh - 185px);display: flex;width: 100%; gap: 20px;">
                <div class="wapp-sidebar col-md-3">

                    <div class="wapp-chat-list">
                        <div class="wapp-chat-item" data-target="Locations22">Locations</div>
                        <div class="wapp-chat-item" data-target="Departments">Departments</div>
                        <div class="wapp-chat-item active" data-target="Employee">Employee</div>
                        <div class="wapp-chat-item" data-target="EmployeeList">Employee List</div>
                        <div class="wapp-chat-item" data-target="ControlFactors">Control Factors </div>
                        <div class="wapp-chat-item" data-target="ControlSetup">Control Setup</div>
                        <div class="wapp-chat-item" data-target="CalibrationsFactors">Calibrations Factors </div>
                        <div class="wapp-chat-item" data-target="CalibrationsSetup">Calibrations Setup</div>
                        <div class="wapp-chat-item" data-target="CalibrationsPastSetup">Calibrations Past Setup</div>
                        <div class="wapp-chat-item" data-target="permissionControl">Permission Control</div>

                        <div class="wapp-chat-item" data-target="EQASSetUp">EQAS SetUp</div>
                        <div class="wapp-chat-item" data-target="ILCSetUp">ILC SetUp</div>
                        <div class="wapp-chat-item" data-target="RiskSetUp">Risk SetUp</div>
                        <div class="wapp-chat-item" data-target="QualityIndicators">Quality Indicators</div>
                        <div class="wapp-chat-item" data-target="InstrumentSettings">Instrument Setup</div>




                    </div>
                </div>

                <div class="col-md-9" style="padding-right: 3px;height:100%;overflow:auto; width:78%">
                    <div class="update-profile-page wapp-main-chat active" id="Employee">
                        <div class="container">
                            <div class="profile-pic">
                                <label for="profile-image">
                                    <img id="profile-preview" src="https://via.placeholder.com/80" alt="Profile Picture">
                                </label>
                                <input type="file" id="profile-image" accept="image/*" style="display: none;"
                                    onchange="previewImage(event)">
                            </div>
                            <form onsubmit="handleFormSubmit(event)">
                                <div class="form-group">
                                    <label for="employee-code">Employee Code</label>
                                    <input type="text" id="employee-code" name="employee_code" placeholder="Ex: 123456"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="employee-name">Employee Name</label>
                                    <input type="text" id="employee-name" name="employee_name" required>
                                </div>

                                <div class="form-group">
                                    <label for="designation">Designation</label>
                                    <select id="designation" name="designation" class="form-control">
                                        <option value="" disabled selected>Select Designation</option>
                                        <option value="CMD">CMD</option>
                                        <option value="CEO">CEO</option>
                                        <option value="Business Head">Business Head</option>
                                        <option value="Vice President">Vice President</option>
                                        <option value="Assistant Vice President">Assistant Vice President</option>
                                        <option value="General Manager">General Manager</option>
                                        <option value="Deputy General Manager">Deputy General Manager</option>
                                        <option value="Assistant General Manager">Assistant General Manager</option>
                                        <option value="Sr. Zonal Sales Manager">Sr. Zonal Sales Manager</option>
                                        <option value="Zonal Sales Manager">Zonal Sales Manager</option>
                                        <option value="Sr. Regional Sales Manager">Sr. Regional Sales Manager</option>
                                        <option value="Regional Sales Manager">Regional Sales Manager</option>
                                        <option value="Sr. Area Sales Manager">Sr. Area Sales Manager</option>
                                        <option value="Area Sales Manager">Area Sales Manager</option>
                                        <option value="Business Development Executive / Territory Manager">Business
                                            Development Executive / Territory Manager</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <select id="location" name="location">
                                        <option value="">Select</option>
                                        @foreach ($locations22 as $item)
                                            <option value="{{$item->location}}">{{$item->location}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="department">Department</label>
                                    <select id="department1" name="department">
                                        <option value="">Select</option>
                                        @foreach ($departments77 as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="contact-number">Contact Number</label>
                                    <input type="tel" id="contact-number" name="contact_number" placeholder="+91 0000000000"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" placeholder="ABS@AA.com" required>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password" placeholder="......" required>
                                </div>

                                <div class="signature-upload">
                                    <label for="signature-image">
                                        <div class="signature-drop-area" ondrop="dropSignature(event)"
                                            ondragover="allowDrop(event)">
                                            <p>Drag and drop your signature here or click to select</p>
                                        </div>
                                    </label>
                                    <input type="file" id="signature-image" name="signature_image" accept="image/*"
                                        style="display: none;" onchange="previewSignature(event)">
                                    <div id="signature-preview" class="signature-preview" style="display: none;">
                                        <img src="" alt="Signature Preview" id="signature-preview-img"
                                            style="max-width: 100px; max-height: 100px;mix-blend-mode: hard-light;">
                                    </div>
                                </div>

                                <button type="submit" class="save-button">Save</button>
                            </form>

                        </div>
                    </div>
                    <div class="update-profile-page wapp-main-chat" id="InstrumentSettings">
                        <div class="instrument-form-container">
                            <h2 class="instrument-form-header">Instrument Registration</h2>
                            <form id="instrumentForm">
                                @csrf
                                <div class="instrument-form-group">
                                    <label for="name" class="instrument-form-label">Name:</label>
                                    <input type="text" id="name" name="name" class="instrument-form-input" required>
                                </div>

                                <div class="instrument-form-group">
                                    <label for="instrumentid" class="instrument-form-label">Instrument ID:</label>
                                    <input type="text" id="instrumentid" name="instrument_id" class="instrument-form-input"
                                        required>
                                </div>

                                <div class="instrument-form-group">
                                    <label for="type" class="instrument-form-label">Type:</label>
                                    <input type="text" id="type" name="type" class="instrument-form-input" required>
                                </div>

                                <div class="instrument-form-group">
                                    <label for="location" class="instrument-form-label">Location:</label>
                                    <select id="location" name="location" class="instrument-form-select" required>
                                        <option value="">-- Select location --</option>
                                        @foreach ($labs as $lab)
                                            <option value="{{ $lab->id }}">{{ $lab->location }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="instrument-form-group">
                                    <input type="submit" value="Register Instrument" class="instrument-form-submit">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="wapp-main-chat" id="EmployeeList">
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <label for="to" class="form-label">Employee Name</label>
                                <input type="text" id="employee-name" class="form-control" placeholder="Employee Name">
                            </div>
                            <div class="col-md-7"></div>
                            <div class="col-md-2 d-flex align-items-center">
                                <button type="button" id="redirectButton" class="btn btn-success"
                                    style="height: fit-content;">Create</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Profile Picture</th>
                                        <th>Employee Code</th>
                                        <th>Employee Name</th>
                                        <th>Designation</th>
                                        <th>Location</th>
                                        <th>Department</th>

                                        <th>signature</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employee_list as $employee)
                                        <tr>
                                            <td style="display:flex;align-items: center;justify-content: center;">
                                                @if (!empty($employee->imageEmp))
                                                    <img src="{{ asset('/user_images/' . $employee->imageEmp) }}"
                                                        alt="Profile Picture" width="30">
                                                @else
                                                    <img src="{{ asset('/profile_img/default_profile.jpg') }}" alt="Default Picture"
                                                        width="30">
                                                @endif
                                            </td>
                                            <td>{{ $employee->employee_code }}</td>
                                            <td class="employee-name">{{ $employee->first_name }}
                                                {{ $employee->last_name }}
                                            </td>
                                            <td>{{ $employee->designation }}</td>
                                            <td>{{ $employee->address }}</td>
                                            <td>{{ $employee->department }}</td>
                                            <td>--</td>
                                            <td>
                                                <button class="btn btn-success"
                                                    onclick="openEditForm('{{ $employee->id }}')">Edit</button>
                                                <form id="delete-form-{{ $employee->id }}"
                                                    action="{{ route('employees.destroySet', $employee->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                                <button class="btn btn-danger"
                                                    onclick="confirmDelete('{{ $employee->id }}')">Delete</button>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>




                            <div id="close1" class="closeBtn" onclick="closePopup1()">
                                X
                            </div>
                            <div id="popup1" class="popup">
                                <div style="position: relative; height:95%" class="update-profile-page ">
                                    <div class="container">
                                        <form method="POST" enctype="multipart/form-data" id="employee-update-form">
                                            @csrf

                                            @method('PUT')
                                            <input type="hidden" id="employee-id10" name="employee_id">
                                            <div class="profile-pic">
                                                <label for="profile-image2">
                                                    <img id="profile-preview2" src="https://via.placeholder.com/80"
                                                        alt="Profile Picture">
                                                </label>
                                                <input type="file" id="profile-image2" name="imageEmp" accept="image/*"
                                                    style="display: none;" onchange="previewImage2(event)">
                                            </div>

                                            <div class="form-group">
                                                <input type="hidden" id="employee-id10" name="employee_id10">
                                                <label for="employee-code2">Employee Code</label>
                                                <input type="text" id="employee-code2" name="employee_code"
                                                    placeholder="Ex: 123456" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="employee-name2">Employee Name</label>
                                                <input type="text" id="employee-name2" name="employee_name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="designation2">Designation</label>
                                                <select id="designation2" name="designation2" class="form-control" required>
                                                    <option value="" disabled selected>Select Designation</option>
                                                    <option value="CMD">CMD</option>
                                                    <option value="CEO">CEO</option>
                                                    <option value="Business Head">Business Head</option>
                                                    <option value="Vice President">Vice President</option>
                                                    <option value="Assistant Vice President">Assistant Vice President
                                                    </option>
                                                    <option value="General Manager">General Manager</option>
                                                    <option value="Deputy General Manager">Deputy General Manager</option>
                                                    <option value="Assistant General Manager">Assistant General Manager
                                                    </option>
                                                    <option value="Sr. Zonal Sales Manager">Sr. Zonal Sales Manager</option>
                                                    <option value="Zonal Sales Manager">Zonal Sales Manager</option>
                                                    <option value="Sr. Regional Sales Manager">Sr. Regional Sales Manager
                                                    </option>
                                                    <option value="Regional Sales Manager">Regional Sales Manager</option>
                                                    <option value="Sr. Area Sales Manager">Sr. Area Sales Manager</option>
                                                    <option value="Area Sales Manager">Area Sales Manager</option>
                                                    <option value="Business Development Executive / Territory Manager">
                                                        Business
                                                        Development Executive / Territory Manager</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="date-of-joining2">Date Of Joining</label>
                                                <input type="date" id="date-of-joining2" name="date_of_joining" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="contact-number2">Contact Number</label>
                                                <input type="tel" id="contact-number2" name="contact_number"
                                                    placeholder="+91 0000000000" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email2">User ID</label>
                                                <input type="text" id="email2" name="email2" placeholder="Username"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="password2">Password</label>
                                                <input type="password" id="password2" name="password" placeholder="......">
                                            </div>

                                            <button type="submit" class="save-button save-button-for-id">Save</button>
                                        </form>

                                    </div>
                                    <style>
                                        .popup {
                                            display: none;
                                            /* other existing styles */
                                        }

                                        .popup.open {
                                            display: block;
                                        }

                                        .closeBtn {
                                            display: none;
                                        }

                                        .closeBtn.opened {
                                            display: block;
                                        }
                                    </style>
                                    <script>
                                        function confirmDelete(id) {
                                            if (confirm('Are you sure you want to delete this employee?')) {
                                                document.getElementById('delete-form-' + id).submit();
                                            }
                                        }

                                        function closePopup1() {
                                            document.getElementById("popup1").classList.remove("open");
                                            document.getElementById("close1").classList.remove("opened");
                                        }

                                        function openEditForm(id) {
                                            document.getElementById("popup1").classList.add("open");
                                            document.getElementById("close1").classList.add("opened");
                                            console.log('Fetching data for employee ID:', id);
                                            document.getElementById("employee-id10").value = id;

                                            fetch(`/employees/${id}/edit`)
                                                .then(response => {
                                                    if (!response.ok) throw new Error('Network response was not ok');
                                                    return response.json();
                                                })
                                                .then(data => {
                                                    console.log('Fetched employee data:', data);

                                                    // Basic inputs
                                                    document.getElementById("employee-code2").value = data.employee_code || '';
                                                    document.getElementById("employee-name2").value = data.first_name || '';
                                                    document.getElementById("date-of-joining2").value = data.date_of_joining || '';
                                                    document.getElementById("contact-number2").value = data.contact_number || '';
                                                    document.getElementById("email2").value = data.email || '';

                                                    // Designation select
                                                    if (data.position) {
                                                        const designationSelect = document.getElementById("designation2");
                                                        for (let i = 0; i < designationSelect.options.length; i++) {
                                                            if (designationSelect.options[i].value === data.designation) {
                                                                designationSelect.selectedIndex = i;
                                                                break;
                                                            }
                                                        }
                                                    }

                                                    // Profile image
                                                    if (data.imageEmp) {
                                                        const imageUrl = data.imageEmp
                                                            ? `/user_images/${data.imageEmp}`
                                                            : '/profile_img/default_profile.jpg';
                                                        document.getElementById("profile-preview2").src = imageUrl;
                                                    }

                                                    // Update form action
                                                    document.getElementById("employee-update-form").action = `/employees/${id}`;
                                                })
                                                .catch(error => console.error('Error fetching employee data:', error));
                                        }

                                        // Handle form submission
                                        document.getElementById('employee-update-form').addEventListener('submit', function (event) {
                                            event.preventDefault();

                                            const employeeId = document.getElementById('employee-id10').value;
                                            const formData = new FormData(this);

                                            fetch(this.action, {
                                                method: 'POST',
                                                body: formData,
                                                headers: {
                                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                                    'X-HTTP-Method-Override': 'PUT'
                                                }
                                            })
                                                .then(response => {
                                                    if (!response.ok) {
                                                        return response.text().then(text => { throw new Error(text) });
                                                    }
                                                    return response.json();
                                                })
                                                .then(data => {
                                                    if (data.success) {
                                                        alert('Employee updated successfully!');
                                                        window.location.reload();
                                                    } else {
                                                        alert('Error: ' + (data.message || 'Unknown error'));
                                                    }
                                                })
                                                .catch(error => {
                                                    console.error('Error:', error);
                                                    alert('An error occurred: ' + error.message);
                                                });
                                        });
                                        // Function to preview the uploaded image
                                        function previewImage2(event) {
                                            const reader = new FileReader();
                                            reader.onload = function () {
                                                const preview = document.getElementById('profile-preview2');
                                                preview.src = reader.result;
                                            }
                                            reader.readAsDataURL(event.target.files[0]);
                                        }
                                    </script>




                                </div>


                                <div class="wapp-main-chat row" id="Departments">
                                    <div class="instrument-form-group">
                                        <div class="dropdown-container">
                                            <label for="Depart77">Department:</label>
                                            <select id="Depart77" class="instrument-form-select">
                                                <option value="">-- Select Department --</option>
                                                @foreach ($departments77 as $item)
                                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>

                                            <div class="input-group" style="margin-top: 10px;">
                                                <input type="text" id="departInput" placeholder="Add new department"
                                                    class="instrument-form-input">
                                                <button type="button" onclick="addDepartment77('Depart77', 'departInput')"
                                                    class="btn btn-success">Add Department</button>
                                            </div>

                                            <div class="button-group" style="margin-top: 10px;">
                                                <button type="button" onclick="removeDepartment77('Depart77')"
                                                    class="btn btn-danger">Remove
                                                    Selected</button>
                                            </div>
                                        </div>

                                        <div class="instrument-form-group">
                                            <label for="status" class="instrument-form-label">Status:</label>
                                            <select id="status" name="status" class="instrument-form-select" required>
                                                <option value="">-- Select Status --</option>
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                        </div>

                                        <div class="instrument-form-group">
                                            <button type="button" class="instrument-form-submit"
                                                onclick="addDepartment77('Depart77')">Submit
                                                Form</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="wapp-main-chat row" id="Locations22">
                                    <div class="instrument-form-group">
                                        <div class="dropdown-container">
                                            <label for="Location22">Location:</label>
                                            <select id="Location22" class="instrument-form-select">
                                                <option value="">-- Select--</option>
                                                @foreach ($locations22 as $item)
                                                    <option value="{{ $item->location }}">{{ $item->location }}</option>
                                                @endforeach
                                            </select>

                                            <div class="input-group" style="margin-top: 10px;">
                                                <input type="text" id="locationInput" placeholder="Add new location"
                                                    class="instrument-form-input">
                                                <button type="button" onclick="addLocation22('Location22', 'locationInput')"
                                                    class="btn btn-success" style="margin-top: 10px; width: 40%;">Add
                                                    Location</button>
                                            </div>

                                            <div class="button-group" style="margin-top: 10px; width: 40%;">
                                                <button type="button" onclick="removeLocation22('Location22')"
                                                    class="btn btn-danger" style="width:100%;">Remove Selected</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wapp-main-chat row" id="ControlFactors">
                                    <div class="dropdown-container col-md-3">
                                        <label for="Location">Location:</label>
                                        <select id="Locationss">
                                            @foreach ($locations as $location)
                                                <option value="{{ $location->location }}">{{ $location->location }}</option>
                                            @endforeach

                                        </select>
                                        <input type="text" id="countryInput" placeholder="Add option">
                                        <div class="row " style="gap:10px;display: flex;">
                                            <button onclick="addLocationOption('Locationss', 'countryInput')">Add</button>
                                            <!-- <div class="col-md-1"></div> -->
                                            <button onclick="removeLocationOption('Locationss')">Remove Selected</button>
                                        </div>
                                    </div>
                                    <div class="dropdown-container  col-md-3">
                                        <label for="Departments">Department:</label>
                                        <select id="Departments">
                                            @foreach ($dropdowns->where('parent_name', 'Departments') as $department)
                                                <option value="{{ $department->name }}">{{ $department->name }}</option>
                                            @endforeach

                                        </select>
                                        <input type="text" id="DepartmentsInput" placeholder="Add option">
                                        <div class="row " style="gap:10px;display: flex;">
                                            <button onclick="addDep('Departments', 'DepartmentsInput')">Add</button>
                                            <!-- <div class="col-md-1"></div> -->
                                            <button onclick="removeDep('Departments')">Remove Selected</button>
                                        </div>
                                    </div>
                                    <div class="dropdown-container  col-md-3">
                                        <label for="Machine">Machine:</label>
                                        <select id="Machine">
                                            <option value="">Select Machine</option>
                                            @foreach ($dropdowns->where('parent_name', 'Machine') as $machine)
                                                <option value="{{ $machine->name }}">{{ $machine->name }}</option>
                                            @endforeach

                                        </select>
                                        <input type="text" id="MachineInput" placeholder="Add option">
                                        <div class="row " style="gap:10px;display: flex;">
                                            <button onclick="addMachine('Machine', 'MachineInput')">Add</button>
                                            <!-- <div class="col-md-1"></div> -->
                                            <button onclick="removeMachine('Machine')">Remove Selected</button>
                                        </div>
                                    </div>
                                    <div class="dropdown-container  col-md-3">
                                        <label for="ControlSupplier">Control Supplier:</label>
                                        <select id="ControlSupplier">
                                            <option value="">Select Supplier</option>
                                            @foreach ($dropdowns->where('parent_name', 'ControlSupplier') as $supplier)
                                                <option value="{{ $supplier->name }}">{{ $supplier->name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" id="ControlSupplierInput" placeholder="Add option">
                                        <div class="row " style="gap:10px;display: flex;">
                                            <button
                                                onclick="addSupplier('ControlSupplier', 'ControlSupplierInput')">Add</button>
                                            <!-- <div class="col-md-1"></div> -->
                                            <button onclick="removeSupplier('ControlSupplier')">Remove Selected</button>
                                        </div>
                                    </div>
                                    <!-- <div class="dropdown-container">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <label for="Zone">Zone:</label>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <select id="Zone">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <option value="NorthZone">North Zone</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <option value="SouthZone">South Zone</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <option value="EastZone">East Zone</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <option value="WestZone">West Zone</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <option value="CentralZone">Central Zone</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <option value="North-EastZone">North-East Zone</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </select>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <input type="text" id="zoneInput" placeholder="Add option">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="row">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <button class="col-md-3" onclick="addOption('Zone', 'zoneInput')">Add</button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="col-md-1"></div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <button class="col-md-3" onclick="removeOption('Zone')">Remove Selected</button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="dropdown-container">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <label for="State">State:</label>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <select id="State">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <optgroup label="North Zone">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="JK">Jammu and Kashmir</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="LA">Ladakh</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="HP">Himachal Pradesh</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="PB">Punjab</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="HR">Haryana</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="RJ">Rajasthan</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="CH">Chandigarh</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="DL">Delhi</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </optgroup>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <optgroup label="South Zone">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="AP">Andhra Pradesh</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="KA">Karnataka</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="KL">Kerala</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="TN">Tamil Nadu</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="TS">Telangana</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="PY">Puducherry</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="LD">Lakshadweep</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </optgroup>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <optgroup label="East Zone">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="BR">Bihar</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="JH">Jharkhand</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="OR">Odisha</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="WB">West Bengal</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="AN">Andaman and Nicobar Islands</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </optgroup>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <optgroup label="West Zone">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="RJ">Rajasthan</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="GJ">Gujarat</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="MH">Maharashtra</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="GA">Goa</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="DN">Dadra and Nagar Haveli and Daman and Diu</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </optgroup>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <optgroup label="Central Zone">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="MP">Madhya Pradesh</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="UP">Uttar Pradesh</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="CT">Chhattisgarh</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="UK">Uttarakhand</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </optgroup>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <optgroup label="North-East Zone">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="AR">Arunachal Pradesh</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="AS">Assam</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="MN">Manipur</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="ML">Meghalaya</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="MZ">Mizoram</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="NL">Nagaland</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="SK">Sikkim</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <option value="TR">Tripura</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </optgroup>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </select>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <input type="text" id="stateInput" placeholder="Add option">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="row">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <button class="col-md-3" onclick="addOption('State', 'stateInput')">Add</button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="col-md-1"></div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <button class="col-md-3 filterIcon" onclick="stateTagging(this.children[0],true)">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            Tag Zone
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="showFilter">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="filterOptions" onclick="stateTagging(this.parentElement,false)">North Zone </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="filterOptions" onclick="stateTagging(this.parentElement,false)">South Zone </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="filterOptions" onclick="stateTagging(this.parentElement,false)">East Zone </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="filterOptions" onclick="stateTagging(this.parentElement,false)">West Zone </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="filterOptions" onclick="stateTagging(this.parentElement,false)">Central Zone </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="filterOptions" onclick="stateTagging(this.parentElement,false)">North-East Zone </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="dropdown-container">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <label for="District">District:</label>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <select id="District">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <option value="TS"> TS</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <option value="AP"> AP</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </select>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <input type="text" id="DistrictInput" placeholder="Add option">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="row">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <button class="col-md-3" onclick="addOption('District', 'DistrictInput')">Add</button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="col-md-1"></div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <button class="col-md-3 filterIcon" onclick="stateTagging(this.children[0],true)">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            Tag State
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="showFilter " style="bottom: 0;">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="filterOptions" onclick="stateTagging(this.parentElement,false)">Jammu and Kashmir </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="filterOptions" onclick="stateTagging(this.parentElement,false)">Ladakh </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="filterOptions" onclick="stateTagging(this.parentElement,false)">Himachal Pradesh</div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="filterOptions" onclick="stateTagging(this.parentElement,false)">Punjab </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="filterOptions" onclick="stateTagging(this.parentElement,false)">Haryana </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="filterOptions" onclick="stateTagging(this.parentElement,false)">Rajasthan </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="dropdown-container">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <label for="SalesTerritory">Sales Territory:</label>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <select id="SalesTerritory">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <option value="TS"> TS</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <option value="AP"> AP</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </select>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <input type="text" id="SalesTerritoryInput" placeholder="Add option">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="row">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <button class="col-md-3" onclick="addOption('SalesTerritory', 'SalesTerritoryInput')">Add</button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="col-md-1"></div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <button class="col-md-3 filterIcon" onclick="stateTagging(this.children[0],true)">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            Tag State
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="showFilter " style="bottom: 0;">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="filterOptions" onclick="stateTagging(this.parentElement,false)">Jammu and Kashmir </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="filterOptions" onclick="stateTagging(this.parentElement,false)">Ladakh </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="filterOptions" onclick="stateTagging(this.parentElement,false)">Himachal Pradesh</div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="filterOptions" onclick="stateTagging(this.parentElement,false)">Punjab </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="filterOptions" onclick="stateTagging(this.parentElement,false)">Haryana </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="filterOptions" onclick="stateTagging(this.parentElement,false)">Rajasthan </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="dropdown-container">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <label for="City">City/Location:</label>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <select id="City">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <option value="TS"> TS</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <option value="AP"> AP</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </select>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <input type="text" id="CityInput" placeholder="Add option">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="row">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <button class="col-md-3" onclick="addOption('City', 'CityInput')">Add</button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="col-md-1"></div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <button class="col-md-3 filterIcon" onclick="stateTagging(this.children[0],true)">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            Tag Territory
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="showFilter " style="bottom: 0;">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="filterOptions" onclick="stateTagging(this.parentElement,false)">Jammu and Kashmir </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="filterOptions" onclick="stateTagging(this.parentElement,false)">Ladakh </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="filterOptions" onclick="stateTagging(this.parentElement,false)">Himachal Pradesh</div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="filterOptions" onclick="stateTagging(this.parentElement,false)">Punjab </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="filterOptions" onclick="stateTagging(this.parentElement,false)">Haryana </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="filterOptions" onclick="stateTagging(this.parentElement,false)">Rajasthan </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </div> -->
                                </div>
                                <div class="wapp-main-chat row" id="RiskSetUp">
                                    <div class="dropdown-container col-md-3">
                                        <label for="RiskCategory">Risk Category :</label>
                                        <select id="RiskCategory">
                                            <option value="">Select Category</option>
                                            @foreach ($risks1 as $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach

                                        </select>
                                        <input type="text" id="RiskCategoryInput" placeholder="Add option">
                                        <div class="row " style="gap:10px;display: flex;">
                                            <button
                                                onclick="addRiskOption('RiskCategory', 'RiskCategoryInput')">Add</button>
                                            <!-- <div class="col-md-1"></div> -->
                                            <button onclick="removeRiskOption('RiskCategory')">Remove Selected</button>
                                        </div>
                                    </div>
                                    <div class="dropdown-container  col-md-3">
                                        <label for="Severity">Severity:</label>
                                        <select id="Severity">
                                            <option value="">Select Severity</option>
                                            @foreach ($risks2 as $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" id="SeverityInput" placeholder="Add option">
                                        <div class="row " style="gap:10px;display: flex;">
                                            <button onclick="addSeverityOption('Severity', 'SeverityInput')">Add</button>
                                            <!-- <div class="col-md-1"></div> -->
                                            <button onclick="removeSeverityOption('Severity')">Remove Selected</button>
                                        </div>
                                    </div>
                                    <div class="dropdown-container  col-md-3">
                                        <label for="Likelihood">Likelihood:</label>
                                        <select id="Likelihood">
                                            <option value="">Select Likelihood</option>
                                            @foreach ($risks3 as $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" id="LikelihoodInput" placeholder="Add option">
                                        <div class="row " style="gap:10px;display: flex;">
                                            <button
                                                onclick="addLikelihoodOption('Likelihood', 'LikelihoodInput')">Add</button>
                                            <!-- <div class="col-md-1"></div> -->
                                            <button onclick="removeLikelihoodOption('Likelihood')">Remove Selected</button>
                                        </div>
                                    </div>


                                </div>
                                <div class="wapp-main-chat" id="permissionControl">
                                    <div class="permissions-container">
                                        <h2 class="permissions-header">Permission Settings</h2>
                                        <table class="permissions-table">
                                            <thead>
                                                <tr>
                                                    <th>Employee Name</th>
                                                    <th>Read</th>
                                                    <!-- <th>Edit</th>
                                                                                                                                                                                                                                                                                                                                                                                                <th>Delete</th>
                                                                                                                                                                                                                                                                                                                                                                                                <th>Move</th>
                                                                                                                                                                                                                                                                                                                                                                                                <th>Share</th> -->
                                                    <th>Upload</th>
                                                    <!--<th>Lock</th>
                                                                                                                                                                                                                                                                                                                                                                                                <th>Full</th> -->
                                                </tr>
                                            </thead>
                                            <tbody id="permissions-table-body">
                                                @foreach ($employees as $employee)
                                                    <tr>
                                                        <td>
                                                            <div class="fw-bold">{{ $employee->first_name }}</div>
                                                            <small
                                                                class="badge bg-primary">{{ $employee->employee_type }}</small>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" class="permissions-checkbox"
                                                                data-employee="{{ $employee->id }}" data-permission="read" {{ $employee->read ? 'checked' : '' }} {{ $employee->role == '1' ? 'disabled' : '' }}>
                                                        </td>



                                                        <td>
                                                            <input type="checkbox" class="permissions-checkbox"
                                                                data-employee="{{ $employee->id }}" data-permission="upload" {{ $employee->upload ? 'checked' : '' }} {{ $employee->role == '1' ? 'disabled' : '' }}>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <button class="permissions-save-button" type="button">Save Changes</button>
                                    </div>
                                </div>

                                <div class="wapp-main-chat" id="ControlSetup"
                                    style="border-radius: 10px; height:auto;   background: #fff;    padding: 1rem;">
                                    <div class=" py-3 row-design">

                                        <!-- Tag Location Form -->
                                        <form action="{{ route('store.controlSetup') }}" method="POST">
                                            @csrf
                                            <div class="row mx-0 mb-3">
                                                <div class="col-md-3">
                                                    <label class="form-label">Location:</label>
                                                    <select class="form-control" name="location" required>
                                                        <option value="">Select Location</option>
                                                        @foreach ($locations3 as $location)
                                                            <option value="{{ $location->location }}">{{ $location->location }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="form-label">Department:</label>
                                                    <select class="form-control" name="department" required>
                                                        <option value="">Select Department</option>
                                                        @foreach ($dropdowns3->where('parent_name', 'Departments') as $department)
                                                            <option value="{{ $department->name }}">{{ $department->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Machine:</label>
                                                    <select class="form-control" name="machine" required>
                                                        <option value="">Select Machine</option>
                                                        @foreach ($dropdowns3->where('parent_name', 'Machine') as $machine)
                                                            <option value="{{ $machine->name }}">{{ $machine->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="form-label">Control Supplier:</label>
                                                    <select class="form-control" name="supplier" required>
                                                        <option value="">Select Supplier</option>
                                                        @foreach ($dropdowns3->where('parent_name', 'ControlSupplier') as $supplier)
                                                            <option value="{{ $supplier->name }}">{{ $supplier->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <!-- <div class="col-md-3">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <label class="form-label">Parameter:</label>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <select class="form-control" required>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <option value="">Select Parameter</option>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </select>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div> -->

                                            </div>

                                            <div class="d-flex justify-content-center mt-3 mb-0">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                    @if (session('success'))
                                        <div class="alert alert-success mt-3">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <!-- Table of Tag Locations -->
                                    <div class="mt-3 table-responsive">
                                        <table class="stock-planner-table">
                                            <thead>
                                                <tr>
                                                    <th>Location</th>
                                                    <th>Department</th>

                                                    <th>Machine</th>
                                                    <th>Control Supplier</th>
                                                    <!-- <th>Parameter</th> -->

                                                    <!-- <th>Actions</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($control_setup as $item)
                                                    <tr>
                                                        <td>{{ $item->location }}</td>
                                                        <td>{{ $item->department }}</td>
                                                        <td>{{ $item->machine }}</td>
                                                        <td>{{ $item->supplier }}</td>
                                                        <!-- <td>Parameter 1</td> -->
                                                        <!-- <td>Add</td> -->
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="wapp-main-chat row" id="CalibrationsFactors">
                                    <div class="dropdown-container col-md-3">
                                        <label for="Location">Location:</label>
                                        <select id="Locationss">
                                            @foreach ($locations2 as $location)
                                                <option value="{{ $location->location }}">{{ $location->location }}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" id="countryInput2" placeholder="Add option">
                                        <div class="row" style="gap:10px; display: flex;">
                                            <button
                                                onclick="addLocationOptionCalib('Locationss', 'countryInput2')">Add</button>
                                            <button onclick="removeLocationOptionCalib('Locationss')">Remove
                                                Selected</button>
                                        </div>
                                    </div>

                                    <div class="dropdown-container col-md-3">
                                        <label for="Departments">Department:</label>
                                        <select id="Departments">
                                            @foreach ($dropdowns2->where('parent_name', 'Departments') as $department)
                                                <option value="{{ $department->name }}">{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" id="DepartmentsInput2" placeholder="Add option">
                                        <div class="row" style="gap:10px; display: flex;">
                                            <button onclick="addDepCalib('Departments', 'DepartmentsInput2')">Add</button>
                                            <button onclick="removeDepCalib('Departments')">Remove Selected</button>
                                        </div>
                                    </div>
                                    <div class="dropdown-container  col-md-3">
                                        <label for="Machine">Machine:</label>
                                        <select id="Machine">
                                            <option value="">Select Machine</option>
                                            @foreach ($dropdowns2->where('parent_name', 'Machine') as $machine)
                                                <option value="{{ $machine->name }}">{{ $machine->name }}</option>
                                            @endforeach

                                        </select>
                                        <input type="text" id="MachineInput2" placeholder="Add option">
                                        <div class="row " style="gap:10px;display: flex;">
                                            <button onclick="addMachineCalib('Machine', 'MachineInput2')">Add</button>
                                            <!-- <div class="col-md-1"></div> -->
                                            <button onclick="removeMachineCalib('Machine')">Remove Selected</button>
                                        </div>
                                    </div>
                                    <div class="dropdown-container  col-md-3">
                                        <label for="ControlSupplier">Calibrations Supplier:</label>
                                        <select id="ControlSupplier">
                                            <option value="">Select Supplier</option>
                                            @foreach ($dropdowns2->where('parent_name', 'Calibration') as $supplier)
                                                <option value="{{ $supplier->name }}">{{ $supplier->name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" id="CalibrationSupplierInput2" placeholder="Add option">
                                        <div class="row " style="gap:10px;display: flex;">
                                            <button
                                                onclick="addSupplierCalib('Calibration', 'CalibrationSupplierInput2')">Add</button>
                                            <!-- <div class="col-md-1"></div> -->
                                            <button onclick="removeSupplierCalib('CalibrationSupplier')">Remove
                                                Selected</button>
                                        </div>
                                    </div>

                                </div>
                                <div class="wapp-main-chat" id="CalibrationsSetup"
                                    style="border-radius: 10px; height:auto;   background: #fff;    padding: 1rem;">
                                    <div class=" py-3 row-design">

                                        <!-- Tag Location Form -->
                                        <form action="{{ route('store.calibSetup') }}" method="POST">
                                            @csrf
                                            <div class="row mx-0 mb-3">
                                                <div class="col-md-3">
                                                    <label class="form-label">Location:</label>
                                                    <select class="form-control" name="location" required>
                                                        <option value="">Select Location</option>
                                                        @foreach ($locations2 as $location)
                                                            <option value="{{ $location->location }}">{{ $location->location }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="form-label">Department:</label>
                                                    <select class="form-control" name="department" required>
                                                        <option value="">Select Department</option>
                                                        @foreach ($dropdowns2->where('parent_name', 'Departments') as $department)
                                                            <option value="{{ $department->name }}">{{ $department->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Machine:</label>
                                                    <select class="form-control" name="machine" required>
                                                        <option value="">Select Machine</option>
                                                        @foreach ($dropdowns2->where('parent_name', 'Machine') as $machine)
                                                            <option value="{{ $machine->name }}">{{ $machine->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="form-label">Calibration Supplier:</label>
                                                    <select class="form-control" name="supplier" required>
                                                        <option value="">Select Supplier</option>
                                                        @foreach ($dropdowns2->where('parent_name', 'Calibration') as $supplier)
                                                            <option value="{{ $supplier->name }}">{{ $supplier->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- <div class="col-md-3">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <label class="form-label">Parameter:</label>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <select class="form-control" required>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <option value="">Select Parameter</option>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </select>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div> -->

                                            </div>

                                            <div class="d-flex justify-content-center mt-3 mb-0">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Table of Tag Locations -->
                                    <div class="mt-3 table-responsive">
                                        <table class="stock-planner-table">
                                            <thead>
                                                <tr>
                                                    <th>Location</th>
                                                    <th>Department</th>

                                                    <th>Machine</th>
                                                    <th>Calibrations Supplier</th>
                                                    <!-- <th>Parameter</th> -->

                                                    <!-- <th>Actions</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($calib_setup as $item)
                                                    <tr>
                                                        <td>{{ $item->location }}</td>
                                                        <td>{{ $item->department }}</td>
                                                        <td>{{ $item->machine }}</td>
                                                        <td>{{ $item->supplier }}</td>
                                                        <!-- <td>Parameter 1</td> -->
                                                        <!-- <td>Add</td> -->
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="wapp-main-chat" id="CalibrationsPastSetup"
                                    style="border-radius: 10px; height:auto;   background: #fff;    padding: 1rem;">
                                    <div class=" py-3 row-design">

                                        <!-- Tag Location Form -->
                                        <form action="" method="POST">
                                            @csrf
                                            <div class="row mx-0 mb-2">
                                                <div class="col-md-2">
                                                    <label class="form-label">Calibrator :</label>
                                                    <select class="form-control" required>
                                                        <option value="">Select Calibrator</option>

                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">Department:</label>
                                                    <select class="form-control" required>
                                                        <option value="">Select Department</option>

                                                    </select>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="form-label">Machine:</label>
                                                    <select class="form-control" required>
                                                        <option value="">Select Machine</option>

                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Parameter:</label>
                                                    <select class="form-control" required>
                                                        <option value="">Select Parameter</option>

                                                    </select>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label">Last Calibrated Date:</label>
                                                    <input type="date" name="" id="">
                                                </div>



                                            </div>

                                            <div class="d-flex justify-content-center mt-3 mb-0">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Table of Tag Locations -->
                                    <div class="mt-3 table-responsive">
                                        <table class="stock-planner-table">
                                            <thead>
                                                <tr>
                                                    <th>Calibrator</th>
                                                    <th>Department</th>
                                                    <th>Machine</th>

                                                    <th>Parameter</th>
                                                    <th>Last Calibrated Date</th>


                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Calibrator 1</td>
                                                    <td>Department 1</td>
                                                    <td>Machine 1</td>
                                                    <td>Parameter 1</td>
                                                    <td>01-01-2025</td>
                                                    <td>Add</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="wapp-main-chat" id="EQASSetUp"
                                    style="border-radius: 10px;    background: #fff;    padding: 1rem;">

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

                                        .eqas-container {

                                            padding: 20px;
                                            background: #fff;
                                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                                            border-radius: 8px;
                                        }

                                        .eqas-title {
                                            text-align: center;
                                            color: #333;
                                        }

                                        .eqas-filter-section {
                                            display: flex;
                                            justify-content: space-between;
                                            align-items: center;
                                            margin-bottom: 20px;
                                        }

                                        .eqas-filter-section select,
                                        .eqas-filter-section input {
                                            padding: 8px;
                                            border: 1px solid #ccc;
                                            border-radius: 4px;
                                        }

                                        .eqas-table {
                                            width: 100%;
                                            border-collapse: collapse;
                                        }

                                        .eqas-table th,
                                        .eqas-table td {
                                            border: 1px solid #ddd;
                                            padding: 10px;
                                            text-align: center;
                                        }

                                        .eqas-table th {
                                            background-color: #f4f4f4;
                                            color: #333;
                                        }

                                        .eqas-add-new {
                                            display: flex;
                                            justify-content: flex-end;
                                            margin-top: 20px;
                                        }

                                        .eqas-add-new button {
                                            padding: 10px 20px;
                                            background-color: #007BFF;
                                            color: white;
                                            border: none;
                                            border-radius: 4px;
                                            cursor: pointer;
                                            font-size: 16px;
                                        }

                                        .eqas-add-new button:hover {
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



                                        .app-container {
                                            max-width: 800px;
                                            margin: 0 auto;
                                            display: flex;
                                            flex-direction: column;
                                            gap: 2rem;
                                        }

                                        .add-section-btn {
                                            align-self: flex-end;
                                            background: #10b981;
                                            color: white;
                                            border: none;
                                            border-radius: 0.5rem;
                                            padding: 0.75rem 1.5rem;
                                            font-size: 1rem;
                                            cursor: pointer;
                                            transition: all 0.2s ease;
                                            display: flex;
                                            align-items: center;
                                            gap: 0.5rem;
                                        }

                                        .add-section-btn:hover {
                                            background: #059669;
                                            transform: translateY(-1px);
                                        }

                                        .section-wrapper {
                                            background: white;
                                            padding: 1rem;
                                            max-height: 300px;
                                            overflow: auto;
                                            border-radius: 1rem;
                                            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
                                            animation: slideIn 0.3s ease;
                                        }

                                        .section-header {
                                            display: flex;
                                            justify-content: space-between;
                                            align-items: center;
                                            margin-bottom: 1.5rem;
                                        }

                                        .section-title {
                                            font-size: 1.25rem;
                                            font-weight: 600;
                                            color: #1f2937;
                                        }

                                        .btn-remove-section {
                                            background: #ef4444;
                                            color: white;
                                            border: none;
                                            border-radius: 0.5rem;
                                            padding: 0.5rem 1rem;
                                            font-size: 0.875rem;
                                            cursor: pointer;
                                            transition: all 0.2s ease;
                                        }

                                        .btn-remove-section:hover {
                                            background: #dc2626;
                                        }

                                        .form-control {
                                            display: flex;
                                            gap: 1rem;
                                            margin-bottom: 1rem;
                                        }

                                        .text-input {
                                            flex: 1;
                                            padding: 0.75rem;
                                            border: 1px solid #d1d5db;
                                            border-radius: 0.5rem;
                                            font-size: 1rem;
                                            outline: none;
                                            transition: border-color 0.2s ease;
                                        }

                                        .text-input:focus {
                                            border-color: #4f46e5;
                                            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
                                        }

                                        .btn {
                                            padding: 0.75rem 1.5rem;
                                            background: #4f46e5;
                                            color: white;
                                            border: none;
                                            border-radius: 0.5rem;
                                            font-size: 1rem;
                                            cursor: pointer;
                                            transition: all 0.2s ease;
                                        }

                                        .btn:hover {
                                            background: #4338ca;
                                            transform: translateY(-1px);
                                        }

                                        .list-container {
                                            display: flex;
                                            flex-direction: column;
                                            gap: 0.75rem;
                                        }

                                        .list-item {
                                            display: flex;
                                            justify-content: space-between;
                                            align-items: center;
                                            padding: 1rem;
                                            background: #f9fafb;
                                            border-radius: 0.5rem;
                                            animation: slideIn 0.3s ease;
                                        }

                                        .btn-delete {
                                            background: #ef4444;
                                            padding: 0.5rem 1rem;
                                            font-size: 0.875rem;
                                        }

                                        .btn-delete:hover {
                                            background: #dc2626;
                                        }

                                        .list-empty {
                                            text-align: center;
                                            color: #6b7280;
                                            font-style: italic;
                                            padding: 1rem;
                                        }

                                        @keyframes slideIn {
                                            from {
                                                opacity: 0;
                                                transform: translateY(-10px);
                                            }

                                            to {
                                                opacity: 1;
                                                transform: translateY(0);
                                            }
                                        }


                                        .eqas-modal {
                                            display: none;
                                            position: fixed;
                                            z-index: 1000;
                                            left: 0;
                                            top: 0;
                                            width: 100%;
                                            height: 100%;
                                            overflow: auto;
                                            background-color: rgba(0, 0, 0, 0.5);
                                        }

                                        .eqas-modal-content {
                                            background-color: #fff;
                                            margin: 10% auto;
                                            padding: 20px;
                                            border: 1px solid #888;
                                            width: 80%;
                                            max-width: 600px;
                                            position: relative;
                                        }

                                        .close-modal {
                                            position: absolute;
                                            right: 10px;
                                            top: 10px;
                                            cursor: pointer;
                                            font-size: 24px;
                                        }

                                        .close-modal:hover {
                                            color: red;
                                        }
                                    </style>


                                    <div class="table-responsive" style="padding-right: 1rem;">
                                        <table class="parameter-table-unique" id="parametersTable-unique300">
                                            <thead>
                                                <tr>
                                                    <th>Department</th>
                                                    <th>EQA Provider</th>
                                                    <th>EQA Program</th>
                                                    <th>Add Parameter</th>
                                                    <!-- <th>Cycles</th>
                                                                                                                                                                                                <th>Cycles Duration</th>
                                                                                                                                                                                                <th>Cycles Description</th>
                                                                                                                                                                                                <th>Last Date Of Submission</th> -->
                                                    <th>Cost</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Initial Row -->
                                                <tr>
                                                    <td>
                                                        <select class="department-unique" id="depart300_0">
                                                            <option value="">-- Select --</option>
                                                            @foreach ($departments77 as $department)
                                                                <option value="{{ $department->name }}">{{ $department->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="eqas-unique form-control"
                                                            id="eqas-unique_0">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="eqas-program form-control"
                                                            id="eqas-program_0">
                                                    </td>
                                                    <td>
                                                        <div class="instance">
                                                            <button class="open-modal-btn btn btn-info"
                                                                data-row-index="0">Select
                                                                Options</button>
                                                            <div class="selection" id="selection_0"></div>
                                                        </div>
                                                    </td>
                                                    <!-- <td><input type="number" class="cycles" id="cycles_0"></td>
                                                                                                                                                                                                <td>
                                                                                                                                                                                                    <div style="display: flex; gap:5px; align-items: flex-start;">
                                                                                                                                                                                                        <input type="text" class="duration-value" id="duration-value_0"> per
                                                                                                                                                                                                        <select class="duration-unit" id="duration-unit_0">
                                                                                                                                                                                                            <option value="">-- Select --</option>
                                                                                                                                                                                                            <option value="month">Month</option>
                                                                                                                                                                                                            <option value="quarter">Quarter</option>
                                                                                                                                                                                                            <option value="half-year">Half Year</option>
                                                                                                                                                                                                            <option value="year">Year</option>
                                                                                                                                                                                                        </select>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                </td>
                                                                                                                                                                                                <td>
                                                                                                                                                                                                    <textarea class="cycles-description" id="cycles-description_0"></textarea>
                                                                                                                                                                                                </td> -->
                                                    <!-- <td><input type="date" class="last-date" id="last-date_0"></td> -->
                                                    <td><input type="number" class="cost" id="cost_0"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <button class="add-row-btn-unique" onclick="addNewRow300()">Add New Row</button>
                                    <button class="btn btn-primary mt-3" onclick="submitForm300()">Submit</button>

                                    <!-- Modal Container -->
                                    <div id="modal-container"></div>
                                    <script>
                                        let sectionCounter = 0;

                                        function addNewSection() {
                                            sectionCounter++;
                                            const sectionId = `section-${sectionCounter}`;

                                            const section = document.createElement('div');
                                            section.className = 'section-wrapper';
                                            section.innerHTML =
                                                `

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="form-control">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <input type="text" class="text-input" placeholder="Enter your text here...">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <button onclick="addItem(this)" class="btn">Add</button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="list-container">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="list-empty">No items added yet</div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    `;

                                            // Add event listener for Enter key
                                            const input = section.querySelector('.text-input');
                                            input.addEventListener('keypress', function (e) {
                                                if (e.key === 'Enter') {
                                                    addItem(this);
                                                }
                                            });
                                            const appContainer = document.querySelectorAll('.app-container')
                                            appContainer[appContainer.length - 1].appendChild(section);
                                        }

                                        function removeSection(button) {
                                            const section = button.closest('.section-wrapper');
                                            section.style.opacity = '0';
                                            section.style.transform = 'translateY(-10px)';

                                            setTimeout(() => {
                                                section.remove();
                                            }, 200);
                                        }

                                        function addItem(element) {
                                            const section = element.closest('.section-wrapper');
                                            const input = section.querySelector('.text-input');
                                            const listContainer = section.querySelector('.list-container');
                                            const text = input.value.trim();

                                            if (text === '') return;

                                            // Remove empty message if it exists
                                            const emptyMessage = listContainer.querySelector('.list-empty');
                                            if (emptyMessage) {
                                                emptyMessage.remove();
                                            }

                                            // Create new item
                                            const item = document.createElement('div');
                                            item.className = 'list-item';
                                            item.innerHTML =
                                                `
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <span>${text}</span>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <button onclick="removeItem(this)" class="btn btn-delete">Remove</button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  `;

                                            // Add item to list
                                            listContainer.appendChild(item);

                                            // Clear input
                                            input.value = '';
                                            input.focus();
                                        }

                                        function removeItem(button) {
                                            const item = button.parentElement;
                                            const listContainer = item.parentElement;

                                            item.style.opacity = '0';
                                            item.style.transform = 'translateY(-10px)';

                                            setTimeout(() => {
                                                item.remove();

                                                // Show empty message if no items left
                                                if (listContainer.children.length === 0) {
                                                    const emptyMessage = document.createElement('div');
                                                    emptyMessage.className = 'list-empty';
                                                    emptyMessage.textContent = 'No items added yet';
                                                    listContainer.appendChild(emptyMessage);
                                                }
                                            }, 200);
                                        }

                                        // Create first section automatically
                                        addNewSection();

                                        function addNewRow() {
                                            const table = document.getElementById('parametersTable-unique').getElementsByTagName('tbody')[0];
                                            const newRow = table.insertRow();


                                            // Create and append the second cell with a select dropdown for Department
                                            const departmentCell = newRow.insertCell();
                                            departmentCell.innerHTML =
                                                `
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <select id="department-unique">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <option value="">-- Select --</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <option value="dept1">Department 1</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <option value="dept2">Department 2</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </select>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            `;
                                            // Create and append the first cell with a select dropdown for EQAS
                                            const eqasCell = newRow.insertCell();
                                            eqasCell.innerHTML =
                                                `
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <select id="eqas-unique">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <option value="">-- Select --</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <option value="eqas1">EQAS 1</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <option value="eqas2">EQAS 2</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </select>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            `;

                                            const eqasCellProgram = newRow.insertCell();
                                            eqasCellProgram.innerHTML =
                                                `
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <select id="eqas-Program">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <option value="">-- Select --</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <option value="eqas1">Program 1</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <option value="eqas2">Program 2</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </select>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            `;

                                            // Create and append the third cell with a multi-select container
                                            const multiSelectCell = newRow.insertCell();
                                            multiSelectCell.innerHTML =
                                                `
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="instance">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <button class="open-modal-btn btn btn-info">Select Options 2</button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="selection"></div>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <!-- Modal -->
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="eqas-modal">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="eqas-modal-content">
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
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td><input type="checkbox" class="eqas-modal-option" data-option="Test One"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td>T001</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td>Test One</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td><input type="checkbox" class="eqas-modal-option" data-option="Test Two"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td>T002</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td>Test Two</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td><input type="checkbox" class="eqas-modal-option" data-option="Test Three"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td>T003</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td>Test Three</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td><input type="checkbox" class="eqas-modal-option" data-option="Test Four"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td>T004</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td>Test Four</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td><input type="checkbox" class="eqas-modal-option" data-option="Test Five"></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td>T005</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td>Test Five</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </tbody>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </table>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <button class="confirm-selection btn btn-primary">Confirm Selection</button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    `;

                                            const eqasCellCycle = newRow.insertCell();
                                            eqasCellCycle.innerHTML =
                                                `
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <input type="number" name="" id="">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            `;


                                            const eqasCellCycle1 = newRow.insertCell();
                                            eqasCellCycle1.innerHTML =
                                                `

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   <input type="text" name="" id=""> per <select id="department-unique">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <option value="">-- Select --</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <option value="dept1">Month</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <option value="dept1">Quarter</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <option value="dept2">Half Year</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <option value="dept2">Year</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </select>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            `;


                                            const eqasCellCycle2 = newRow.insertCell();
                                            eqasCellCycle2.innerHTML =
                                                `
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 <div class="app-container">


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            `;


                                            const eqasCellProgram3 = newRow.insertCell();
                                            eqasCellProgram3.innerHTML =
                                                `
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <input type="date" name="" id="">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            `;





                                            // Create and append an empty fourth cell
                                            const emptyCell = newRow.insertCell();
                                            emptyCell.innerHTML = '';
                                            callmodel()
                                            addNewSection()
                                        }
                                    </script>





                                    <script>
                                        function callmodel() {
                                            // Get all modal triggers
                                            const openModalBtns = document.querySelectorAll('.open-modal-btn');
                                            const modals = document.querySelectorAll('.eqas-modal');
                                            // const closeBtns = document.querySelectorAll('.close');
                                            const confirmBtns = document.querySelectorAll('.confirm-selection');
                                            const modalOptions = document.querySelectorAll('.eqas-modal-option');

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
                                                    modal.querySelectorAll('.eqas-modal-option:checked').forEach(option => {
                                                        selectedOptions.push(option.dataset.option);
                                                    });

                                                    // Show selected options below the button
                                                    if (selectedOptions.length > 0) {
                                                        selectionDiv.innerHTML = `Selected: ${selectedOptions.join(', ')}`;
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
                                    <script>
                                        function openDocument1() {

                                            document.getElementById('documentClose1').classList.add('opened');
                                            document.getElementById('documentOpen1').classList.add('open');
                                        }

                                        function documentClose1() {
                                            document.getElementById('documentClose1').classList.remove('opened');
                                            document.getElementById('documentOpen1').classList.remove('open');

                                        }

                                        document.getElementById('add-row-button').addEventListener('click', function () {
                                            const table = document.getElementById('eqas-table').getElementsByTagName('tbody')[0];
                                            const rowCount = table.rows.length + 1;

                                            const newRow = document.createElement('tr');
                                            newRow.innerHTML =
                                                `
                                                                                                                                        <td>${rowCount}</td>
                                                                                                                                        <td><input type="text" placeholder="Enter Provider"></td>
                                                                                                                                        <td><input type="text" placeholder="Enter Test Name"></td>
                                                                                                                                        <td><div class="checkbox-wrapper-46">
                                                                                                                                        <input type="checkbox" id="cbx-${rowCount}-Jan" class="inp-cbx" />
                                                                                                                                        <label for="cbx-${rowCount}-Jan" class="cbx"
                                                                                                                                        ><span>
                                                                                                                                        <svg viewBox="0 0 12 10" height="10px" width="12px">
                                                                                                                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
                                                                                                                                        >
                                                                                                                                        </label>
                                                                                                                                        </div></td>
                                                                                                                                        <td><div class="checkbox-wrapper-46">
                                                                                                                                        <input type="checkbox" id="cbx-${rowCount}-Feb" class="inp-cbx" />
                                                                                                                                        <label for="cbx-${rowCount}-Feb" class="cbx"
                                                                                                                                        ><span>
                                                                                                                                        <svg viewBox="0 0 12 10" height="10px" width="12px">
                                                                                                                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
                                                                                                                                        >
                                                                                                                                        </label>
                                                                                                                                        </div></td>
                                                                                                                                        <td><div class="checkbox-wrapper-46">
                                                                                                                                        <input type="checkbox" id="cbx-${rowCount}-Mar" class="inp-cbx" />
                                                                                                                                        <label for="cbx-${rowCount}-Mar" class="cbx"
                                                                                                                                        ><span>
                                                                                                                                        <svg viewBox="0 0 12 10" height="10px" width="12px">
                                                                                                                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
                                                                                                                                        >
                                                                                                                                        </label>
                                                                                                                                        </div></td>
                                                                                                                                        <td><div class="checkbox-wrapper-46">
                                                                                                                                        <input type="checkbox" id="cbx-${rowCount}-Apr" class="inp-cbx" />
                                                                                                                                        <label for="cbx-${rowCount}-Apr" class="cbx"
                                                                                                                                        ><span>
                                                                                                                                        <svg viewBox="0 0 12 10" height="10px" width="12px">
                                                                                                                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
                                                                                                                                        >
                                                                                                                                        </label>
                                                                                                                                        </div></td>
                                                                                                                                        <td><div class="checkbox-wrapper-46">
                                                                                                                                        <input type="checkbox" id="cbx-${rowCount}-May" class="inp-cbx" />
                                                                                                                                        <label for="cbx-${rowCount}-May" class="cbx"
                                                                                                                                        ><span>
                                                                                                                                        <svg viewBox="0 0 12 10" height="10px" width="12px">
                                                                                                                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
                                                                                                                                        >
                                                                                                                                        </label>
                                                                                                                                        </div></td>
                                                                                                                                        <td><div class="checkbox-wrapper-46">
                                                                                                                                        <input type="checkbox" id="cbx-${rowCount}-Jun" class="inp-cbx" />
                                                                                                                                        <label for="cbx-${rowCount}-Jun" class="cbx"
                                                                                                                                        ><span>
                                                                                                                                        <svg viewBox="0 0 12 10" height="10px" width="12px">
                                                                                                                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
                                                                                                                                        >
                                                                                                                                        </label>
                                                                                                                                        </div></td>
                                                                                                                                        <td><div class="checkbox-wrapper-46">
                                                                                                                                        <input type="checkbox" id="cbx-${rowCount}-Jul" class="inp-cbx" />
                                                                                                                                        <label for="cbx-${rowCount}-Jul" class="cbx"
                                                                                                                                        ><span>
                                                                                                                                        <svg viewBox="0 0 12 10" height="10px" width="12px">
                                                                                                                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
                                                                                                                                        >
                                                                                                                                        </label>
                                                                                                                                        </div></td>
                                                                                                                                        <td><div class="checkbox-wrapper-46">
                                                                                                                                        <input type="checkbox" id="cbx-${rowCount}-Aug" class="inp-cbx" />
                                                                                                                                        <label for="cbx-${rowCount}-Aug" class="cbx"
                                                                                                                                        ><span>
                                                                                                                                        <svg viewBox="0 0 12 10" height="10px" width="12px">
                                                                                                                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
                                                                                                                                        >
                                                                                                                                        </label>
                                                                                                                                        </div></td>
                                                                                                                                        <td><div class="checkbox-wrapper-46">
                                                                                                                                        <input type="checkbox" id="cbx-${rowCount}-Sep" class="inp-cbx" />
                                                                                                                                        <label for="cbx-${rowCount}-Sep" class="cbx"
                                                                                                                                        ><span>
                                                                                                                                        <svg viewBox="0 0 12 10" height="10px" width="12px">
                                                                                                                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
                                                                                                                                        >
                                                                                                                                        </label>
                                                                                                                                        </div></td>
                                                                                                                                        <td><div class="checkbox-wrapper-46">
                                                                                                                                        <input type="checkbox" id="cbx-${rowCount}-Oct" class="inp-cbx" />
                                                                                                                                        <label for="cbx-${rowCount}-Oct" class="cbx"
                                                                                                                                        ><span>
                                                                                                                                        <svg viewBox="0 0 12 10" height="10px" width="12px">
                                                                                                                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
                                                                                                                                        >
                                                                                                                                        </label>
                                                                                                                                        </div></td>
                                                                                                                                        <td><div class="checkbox-wrapper-46">
                                                                                                                                        <input type="checkbox" id="cbx-${rowCount}-Nov" class="inp-cbx" />
                                                                                                                                        <label for="cbx-${rowCount}-Nov" class="cbx"
                                                                                                                                        ><span>
                                                                                                                                        <svg viewBox="0 0 12 10" height="10px" width="12px">
                                                                                                                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
                                                                                                                                        >
                                                                                                                                        </label>
                                                                                                                                        </div></td>
                                                                                                                                        <td><div class="checkbox-wrapper-46">
                                                                                                                                        <input type="checkbox" id="cbx-${rowCount}-Dec" class="inp-cbx" />
                                                                                                                                        <label for="cbx-${rowCount}-Dec" class="cbx"
                                                                                                                                        ><span>
                                                                                                                                        <svg viewBox="0 0 12 10" height="10px" width="12px">
                                                                                                                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
                                                                                                                                        >
                                                                                                                                        </label>
                                                                                                                                        </div></td>
                                                                                                                                        <td><input type="submit" class="m-10"> \n  <input type="reset" value="Remove" class="m-10"></td>

                                                                                                                                        `;

                                            table.appendChild(newRow);
                                        });
                                    </script>




                                </div>
                                <div class="wapp-main-chat" id="ILCSetUp"
                                    style="border-radius: 10px;    background: #fff;    padding: 1rem;">

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
                                        .ILC-filter-section input {
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

                                        .app-container {
                                            max-width: 800px;
                                            margin: 0 auto;
                                            display: flex;
                                            flex-direction: column;
                                            gap: 2rem;
                                        }

                                        .add-section-btn {
                                            align-self: flex-end;
                                            background: #10b981;
                                            color: white;
                                            border: none;
                                            border-radius: 0.5rem;
                                            padding: 0.75rem 1.5rem;
                                            font-size: 1rem;
                                            cursor: pointer;
                                            transition: all 0.2s ease;
                                            display: flex;
                                            align-items: center;
                                            gap: 0.5rem;
                                        }

                                        .add-section-btn:hover {
                                            background: #059669;
                                            transform: translateY(-1px);
                                        }

                                        .section-wrapper {
                                            background: white;
                                            padding: 1rem;
                                            max-height: 300px;
                                            overflow: auto;
                                            border-radius: 1rem;
                                            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
                                            animation: slideIn 0.3s ease;
                                        }

                                        .section-header {
                                            display: flex;
                                            justify-content: space-between;
                                            align-items: center;
                                            margin-bottom: 1.5rem;
                                        }

                                        .section-title {
                                            font-size: 1.25rem;
                                            font-weight: 600;
                                            color: #1f2937;
                                        }

                                        .btn-remove-section {
                                            background: #ef4444;
                                            color: white;
                                            border: none;
                                            border-radius: 0.5rem;
                                            padding: 0.5rem 1rem;
                                            font-size: 0.875rem;
                                            cursor: pointer;
                                            transition: all 0.2s ease;
                                        }

                                        .btn-remove-section:hover {
                                            background: #dc2626;
                                        }

                                        .form-control {
                                            display: flex;
                                            gap: 1rem;
                                            margin-bottom: 1rem;
                                        }

                                        .text-input {
                                            flex: 1;
                                            padding: 0.75rem;
                                            border: 1px solid #d1d5db;
                                            border-radius: 0.5rem;
                                            font-size: 1rem;
                                            outline: none;
                                            transition: border-color 0.2s ease;
                                        }

                                        .text-input:focus {
                                            border-color: #4f46e5;
                                            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
                                        }

                                        .btn {
                                            padding: 0.75rem 1.5rem;
                                            background: #4f46e5;
                                            color: white;
                                            border: none;
                                            border-radius: 0.5rem;
                                            font-size: 1rem;
                                            cursor: pointer;
                                            transition: all 0.2s ease;
                                        }

                                        .btn:hover {
                                            background: #4338ca;
                                            transform: translateY(-1px);
                                        }

                                        .list-container {
                                            display: flex;
                                            flex-direction: column;
                                            gap: 0.75rem;
                                        }

                                        .list-item {
                                            display: flex;
                                            justify-content: space-between;
                                            align-items: center;
                                            padding: 1rem;
                                            background: #f9fafb;
                                            border-radius: 0.5rem;
                                            animation: slideIn 0.3s ease;
                                        }

                                        .btn-delete {
                                            background: #ef4444;
                                            padding: 0.5rem 1rem;
                                            font-size: 0.875rem;
                                        }

                                        .btn-delete:hover {
                                            background: #dc2626;
                                        }

                                        .list-empty {
                                            text-align: center;
                                            color: #6b7280;
                                            font-style: italic;
                                            padding: 1rem;
                                        }

                                        @keyframes slideIn {
                                            from {
                                                opacity: 0;
                                                transform: translateY(-10px);
                                            }

                                            to {
                                                opacity: 1;
                                                transform: translateY(0);
                                            }
                                        }
                                    </style>



                                    <div class="table-responsive" style="padding-right: 1rem;">
                                        <table class="parameter-table-unique" id="parametersTable-unique1">
                                            <thead>
                                                <tr>
                                                    <th>Department</th>
                                                    <th>ILC Provider</th>
                                                    <th>ILC Program</th>
                                                    <th>Add Parameter</th>

                                                    <th>Cost</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <select class="department-unique" id="depart301_0">
                                                            <option value="">-- Select --</option>
                                                            @foreach ($departments77 as $department)
                                                                <option value="{{ $department->name }}">{{ $department->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="ILC-unique form-control"
                                                            id="ILC-unique_0">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="ILC-program form-control"
                                                            id="ILC-program_0">
                                                    </td>

                                                    <td>
                                                        <div class="instance">
                                                            <button class="open-modal-btn1 btn btn-info"
                                                                data-row-index="0">Select
                                                                Options</button>
                                                            <div class="selection" id="selection1_0"></div>
                                                        </div>
                                                    </td>
                                                    <td><input type="number" class="cost" id="cost1_0"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <button class="add-row-btn-unique" onclick="addNewRow301()">Add New Row</button>
                                    <button class="btn btn-primary mt-3" onclick="submitForm301()">Submit</button>

                                    <script>
                                        let sectionCounter1 = 0;

                                        function addNewSection1() {
                                            sectionCounter1++;
                                            const sectionId = `section-${sectionCounter1}`;

                                            const section = document.createElement('div');
                                            section.className = 'section-wrapper';
                                            section.innerHTML =
                                                `

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="form-control">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <input type="text" class="text-input" placeholder="Enter your text here...">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <button onclick="addItem1(this)" class="btn">Add</button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="list-container">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="list-empty">No items added yet</div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        `;

                                            // Add event listener for Enter key
                                            const input = section.querySelector('.text-input');
                                            input.addEventListener('keypress', function (e) {
                                                if (e.key === 'Enter') {
                                                    addItem1(this);
                                                }
                                            });
                                            const appContainer = document.querySelectorAll('.app-container')
                                            appContainer[appContainer.length - 1].appendChild(section);
                                        }

                                        function removeSection1(button) {
                                            const section = button.closest('.section-wrapper');
                                            section.style.opacity = '0';
                                            section.style.transform = 'translateY(-10px)';

                                            setTimeout(() => {
                                                section.remove();
                                            }, 200);
                                        }

                                        function addItem1(element) {
                                            const section = element.closest('.section-wrapper');
                                            const input = section.querySelector('.text-input');
                                            const listContainer = section.querySelector('.list-container');
                                            const text = input.value.trim();

                                            if (text === '') return;

                                            // Remove empty message if it exists
                                            const emptyMessage = listContainer.querySelector('.list-empty');
                                            if (emptyMessage) {
                                                emptyMessage.remove();
                                            }

                                            // Create new item
                                            const item = document.createElement('div');
                                            item.className = 'list-item';
                                            item.innerHTML =
                                                `
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <span>${text}</span>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <button onclick="removeItem1(this)" class="btn btn-delete">Remove</button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                `;

                                            // Add item to list
                                            listContainer.appendChild(item);

                                            // Clear input
                                            input.value = '';
                                            input.focus();
                                        }

                                        function removeItem1(button) {
                                            const item = button.parentElement;
                                            const listContainer = item.parentElement;

                                            item.style.opacity = '0';
                                            item.style.transform = 'translateY(-10px)';

                                            setTimeout(() => {
                                                item.remove();

                                                // Show empty message if no items left
                                                if (listContainer.children.length === 0) {
                                                    const emptyMessage = document.createElement('div');
                                                    emptyMessage.className = 'list-empty';
                                                    emptyMessage.textContent = 'No items added yet';
                                                    listContainer.appendChild(emptyMessage);
                                                }
                                            }, 200);
                                        }

                                        // Create first section automatically
                                        addNewSection1();



                                        function addNewRow301() {
                                            const table = document.getElementById('parametersTable-unique1').getElementsByTagName('tbody')[0];
                                            const newRow = table.insertRow();

                                            // Generate options for the department dropdown
                                            const departmentOptions = departments.map(dept => `<option value="${dept.name}">${dept.name}</option>`).join('');

                                            const cells = [
                                                `<select class="department-unique" id="depart301_${rowCounter}"> ... </select>`,
                                                `<input type="text" class="ILC-unique form-control" id="ILC-unique_${rowCounter}">`,
                                                `<input type="text" class="ILC-program form-control" id="ILC-program_${rowCounter}">`,
                                                `<div class="instance">
                                                                                <button class="open-modal-btn1 btn btn-info" data-row-index="${rowCounter}">Select Options</button>
                                                                                <div class="selection" id="selection1_${rowCounter}"></div>
                                                                            </div>`,
                                                `<input type="number" class="cost" id="cost1_${rowCounter}">`
                                            ];

                                            // Removed fields
                                            `<div style="display: flex; gap: 5px; align-items: flex-start;">

                                                                                                                                                            </div>`,


                                                cells.forEach((cell, index) => {
                                                    const newCell = newRow.insertCell(index);
                                                    newCell.innerHTML = cell;
                                                });

                                            // Add event listener to the new "Select Options" button
                                            const openModalButton = newRow.querySelector('.open-modal-btn1');
                                            openModalButton.addEventListener('click', () => openModal(rowCounter));

                                            rowCounter++; // Increment the counter for the next row
                                        }

                                    </script>





                                    <script>
                                        function callmodel1() {
                                            // Get all modal triggers
                                            const openModalBtns = document.querySelectorAll('.open-modal-btn1');
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
                                                        selectionDiv.innerHTML = `Selected: ${selectedOptions.join(', ')}`;
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
                                        callmodel1()
                                    </script>
                                    <script>
                                        function openDocument2() {

                                            document.getElementById('documentClose2').classList.add('opened');
                                            document.getElementById('documentOpen2').classList.add('open');
                                        }

                                        function documentClose2() {
                                            document.getElementById('documentClose2').classList.remove('opened');
                                            document.getElementById('documentOpen2').classList.remove('open');

                                        }

                                        document.getElementById('add-row-button1').addEventListener('click', function () {
                                            const table = document.getElementById('ILC-table').getElementsByTagName('tbody')[0];
                                            const rowCount = table.rows.length + 1;

                                            const newRow = document.createElement('tr');
                                            newRow.innerHTML =
                                                `
                                                                                                                                    <td>${rowCount}</td>
                                                                                                                                    <td><input type="text" placeholder="Enter Provider"></td>
                                                                                                                                    <td><input type="text" placeholder="Enter Test Name"></td>
                                                                                                                                    <td><div class="checkbox-wrapper-46">
                                                                                                                                    <input type="checkbox" id="cbx-${rowCount}-Jan" class="inp-cbx" />
                                                                                                                                    <label for="cbx-${rowCount}-Jan" class="cbx"
                                                                                                                                    ><span>
                                                                                                                                    <svg viewBox="0 0 12 10" height="10px" width="12px">
                                                                                                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
                                                                                                                                    >
                                                                                                                                    </label>
                                                                                                                                    </div></td>
                                                                                                                                    <td><div class="checkbox-wrapper-46">
                                                                                                                                    <input type="checkbox" id="cbx-${rowCount}-Feb" class="inp-cbx" />
                                                                                                                                    <label for="cbx-${rowCount}-Feb" class="cbx"
                                                                                                                                    ><span>
                                                                                                                                    <svg viewBox="0 0 12 10" height="10px" width="12px">
                                                                                                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
                                                                                                                                    >
                                                                                                                                    </label>
                                                                                                                                    </div></td>
                                                                                                                                    <td><div class="checkbox-wrapper-46">
                                                                                                                                    <input type="checkbox" id="cbx-${rowCount}-Mar" class="inp-cbx" />
                                                                                                                                    <label for="cbx-${rowCount}-Mar" class="cbx"
                                                                                                                                    ><span>
                                                                                                                                    <svg viewBox="0 0 12 10" height="10px" width="12px">
                                                                                                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
                                                                                                                                    >
                                                                                                                                    </label>
                                                                                                                                    </div></td>
                                                                                                                                    <td><div class="checkbox-wrapper-46">
                                                                                                                                    <input type="checkbox" id="cbx-${rowCount}-Apr" class="inp-cbx" />
                                                                                                                                    <label for="cbx-${rowCount}-Apr" class="cbx"
                                                                                                                                    ><span>
                                                                                                                                    <svg viewBox="0 0 12 10" height="10px" width="12px">
                                                                                                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
                                                                                                                                    >
                                                                                                                                    </label>
                                                                                                                                    </div></td>
                                                                                                                                    <td><div class="checkbox-wrapper-46">
                                                                                                                                    <input type="checkbox" id="cbx-${rowCount}-May" class="inp-cbx" />
                                                                                                                                    <label for="cbx-${rowCount}-May" class="cbx"
                                                                                                                                    ><span>
                                                                                                                                    <svg viewBox="0 0 12 10" height="10px" width="12px">
                                                                                                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
                                                                                                                                    >
                                                                                                                                    </label>
                                                                                                                                    </div></td>
                                                                                                                                    <td><div class="checkbox-wrapper-46">
                                                                                                                                    <input type="checkbox" id="cbx-${rowCount}-Jun" class="inp-cbx" />
                                                                                                                                    <label for="cbx-${rowCount}-Jun" class="cbx"
                                                                                                                                    ><span>
                                                                                                                                    <svg viewBox="0 0 12 10" height="10px" width="12px">
                                                                                                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
                                                                                                                                    >
                                                                                                                                    </label>
                                                                                                                                    </div></td>
                                                                                                                                    <td><div class="checkbox-wrapper-46">
                                                                                                                                    <input type="checkbox" id="cbx-${rowCount}-Jul" class="inp-cbx" />
                                                                                                                                    <label for="cbx-${rowCount}-Jul" class="cbx"
                                                                                                                                    ><span>
                                                                                                                                    <svg viewBox="0 0 12 10" height="10px" width="12px">
                                                                                                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
                                                                                                                                    >
                                                                                                                                    </label>
                                                                                                                                    </div></td>
                                                                                                                                    <td><div class="checkbox-wrapper-46">
                                                                                                                                    <input type="checkbox" id="cbx-${rowCount}-Aug" class="inp-cbx" />
                                                                                                                                    <label for="cbx-${rowCount}-Aug" class="cbx"
                                                                                                                                    ><span>
                                                                                                                                    <svg viewBox="0 0 12 10" height="10px" width="12px">
                                                                                                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
                                                                                                                                    >
                                                                                                                                    </label>
                                                                                                                                    </div></td>
                                                                                                                                    <td><div class="checkbox-wrapper-46">
                                                                                                                                    <input type="checkbox" id="cbx-${rowCount}-Sep" class="inp-cbx" />
                                                                                                                                    <label for="cbx-${rowCount}-Sep" class="cbx"
                                                                                                                                    ><span>
                                                                                                                                    <svg viewBox="0 0 12 10" height="10px" width="12px">
                                                                                                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
                                                                                                                                    >
                                                                                                                                    </label>
                                                                                                                                    </div></td>
                                                                                                                                    <td><div class="checkbox-wrapper-46">
                                                                                                                                    <input type="checkbox" id="cbx-${rowCount}-Oct" class="inp-cbx" />
                                                                                                                                    <label for="cbx-${rowCount}-Oct" class="cbx"
                                                                                                                                    ><span>
                                                                                                                                    <svg viewBox="0 0 12 10" height="10px" width="12px">
                                                                                                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
                                                                                                                                    >
                                                                                                                                    </label>
                                                                                                                                    </div></td>
                                                                                                                                    <td><div class="checkbox-wrapper-46">
                                                                                                                                    <input type="checkbox" id="cbx-${rowCount}-Nov" class="inp-cbx" />
                                                                                                                                    <label for="cbx-${rowCount}-Nov" class="cbx"
                                                                                                                                    ><span>
                                                                                                                                    <svg viewBox="0 0 12 10" height="10px" width="12px">
                                                                                                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
                                                                                                                                    >
                                                                                                                                    </label>
                                                                                                                                    </div></td>
                                                                                                                                    <td><div class="checkbox-wrapper-46">
                                                                                                                                    <input type="checkbox" id="cbx-${rowCount}-Dec" class="inp-cbx" />
                                                                                                                                    <label for="cbx-${rowCount}-Dec" class="cbx"
                                                                                                                                    ><span>
                                                                                                                                    <svg viewBox="0 0 12 10" height="10px" width="12px">
                                                                                                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline></svg></span
                                                                                                                                    >
                                                                                                                                    </label>
                                                                                                                                    </div></td>
                                                                                                                                    <td><input type="submit" class="m-10"> \n  <input type="reset" value="Remove" class="m-10"></td>

                                                                                                                                    `;

                                            table.appendChild(newRow);
                                        });
                                    </script>




                                </div>

                                <div class="wapp-main-chat" id="QualityIndicators"
                                    style="border-radius: 10px; height:auto;   background: #fff;    padding: 1rem;">
                                    <div class=" py-3 row-design">

                                        <!-- Tag Location Form -->
                                        <form method="POST" action="{{ route('save.qualityIndicators') }}">
                                            @csrf
                                            <div class="row mx-0 mb-3">
                                                <div class="col-md-3">
                                                    <label class="form-label">Phase:</label>
                                                    <select class="form-control" name="phase" required>
                                                        <option value="">Select Phase</option>
                                                        <option value="Pre_Examination">Pre Examination </option>
                                                        <option value="Examination"> Examination </option>
                                                        <option value="Post_Examination">Post Examination </option>
                                                    </select>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="form-label">Quality Indicator:</label>
                                                    <input class="form-control" name="indicator" required>

                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label">Short Description:</label>
                                                    <input class="form-control" name="description" required>

                                                </div>

                                                <div class="col-md-3">
                                                    <label class="form-label">Target:</label>
                                                    <input type="number" class="form-control" name="target">

                                                </div>

                                                <!-- <div class="col-md-3">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <label class="form-label">Parameter:</label>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <select class="form-control" required>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <option value="">Select Parameter</option>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </select>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div> -->

                                            </div>

                                            <div class="d-flex justify-content-center mt-3 mb-0">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Table of Tag Locations -->
                                    <div class="mt-3 table-responsive">
                                        <table class="stock-planner-table">
                                            <thead>
                                                <tr>
                                                    <th>Phase</th>
                                                    <th>Quality Indicator</th>
                                                    <th>Short Description</th>
                                                    <th>Target</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($master_qlty_indicator as $item)
                                                    <tr>
                                                        <td>{{ $item->phase }}</td>
                                                        <td>{{ $item->indicator }}</td>
                                                        <td>{{ $item->description }}</td>
                                                        <td>{{ $item->target }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>

                        </div>


    </body>
    </body>
    <script>
        const permissions = {};
        folderData.children.forEach(folder => {
            permissions[folder.name] = {
                read: false,
                // edit: false,
                // full: false,
                // lock: false,
                // noControl: true,
            };
        });

        const tableBody = document.getElementById("permissions-table-body");

        folderData.children.forEach(folder => {
            const row = document.createElement("tr");
            row.innerHTML = `
                                                                                                                                                                                                                                                                                                                                                                        <td>${folder.name}</td>
                                                                                                                                                                                                                                                                                                                                                                        <td><input type="checkbox" class="permissions-checkbox" data-folder="${folder.name}" data-permission="read"></td>


                                                                                                                                                                                                                                                                                                                                                                        <td><input type="checkbox" class="permissions-checkbox" data-folder="${folder.name}" data-permission="lock"></td>

                                                                                                                                                                                                                                                                                                                                                                    `;
            tableBody.appendChild(row);
        });

        document.addEventListener("change", (event) => {
            if (event.target.classList.contains("permissions-checkbox")) {
                const folderName = event.target.dataset.folder;
                const permission = event.target.dataset.permission;
                permissions[folderName][permission] = event.target.checked;

                if (permission === "noControl" && event.target.checked) {
                    permissions[folderName] = {
                        read: false,
                        // edit: false,
                        // full: false,
                        // lock: false,
                        // noControl: true
                    };
                    updateCheckboxes(folderName);
                } else if (permission === "full" && event.target.checked) {
                    permissions[folderName] = {
                        read: false,
                        // edit: false,
                        // full: true,
                        // lock: true,
                        // noControl: false
                    };
                    updateCheckboxes(folderName);
                } else if (permission === "lock" && event.target.checked) {
                    permissions[folderName] = {

                        lock: true
                    };
                    updateCheckboxes(folderName);
                }
            }
        });

        function updateCheckboxes(folderName) {
            const folderPermissions = permissions[folderName];
            document.querySelectorAll(`[data-folder="${folderName}"]`).forEach(checkbox => {
                checkbox.checked = folderPermissions[checkbox.dataset.permission];
            });
        }

        function savePermissions() {
            console.log("Saved Permissions:", permissions);
            const toast = document.getElementById("toast");
            toast.classList.add("show");
            setTimeout(() => toast.classList.remove("show"), 3000);
        }


        function addDepartment77(dropdownId, inputId) {
            const dropdown = document.getElementById(dropdownId);
            const input = document.getElementById(inputId);
            const status = document.getElementById('status');

            // If inputId is provided, we're adding a new option
            if (inputId && input) {
                const newOptionText = input.value.trim();

                if (newOptionText === "") {
                    alert("Please enter a department name.");
                    return;
                }

                // Check if option already exists
                const existingOptions = Array.from(dropdown.options);
                const optionExists = existingOptions.some(option =>
                    option.value.toLowerCase() === newOptionText.toLowerCase()
                );

                if (optionExists) {
                    alert("This department already exists.");
                    return;
                }

                // Add new department via AJAX
                $.ajax({
                    url: '/department/add77',
                    type: 'POST',
                    data: {
                        name: newOptionText,
                        status: 'Active', // Default status for new departments
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        if (data.success) {
                            // Add the new option to the dropdown
                            const newOption = document.createElement("option");
                            newOption.value = newOptionText;
                            newOption.textContent = newOptionText;
                            dropdown.appendChild(newOption);

                            // Clear the input field
                            input.value = "";

                            alert(data.message || 'Department added successfully!');
                        } else {
                            alert(data.message || 'Error adding department.');
                        }
                    },
                    error: function (xhr) {
                        console.error('Error:', xhr.responseText);
                        alert('An error occurred while adding the department.');
                    }
                });
            }
            // If no inputId, we're submitting the form with selected department
            else {
                const selectedDepartment = dropdown.value;
                const selectedStatus = status.value;

                if (!selectedDepartment) {
                    alert("Please select a department.");
                    return;
                }

                if (!selectedStatus) {
                    alert("Please select a status.");
                    return;
                }

                // Submit the form data
                $.ajax({
                    url: '/department/submit77',
                    type: 'POST',
                    data: {
                        department: selectedDepartment,
                        status: selectedStatus,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        if (data.success) {
                            alert(data.message || 'Form submitted successfully!');

                            // Reset form if needed
                            dropdown.selectedIndex = 0;
                            status.selectedIndex = 0;
                        } else {
                            alert(data.message || 'Error submitting form.');
                        }
                    },
                    error: function (xhr) {
                        console.error('Error:', xhr.responseText);
                        alert('An error occurred while submitting the form.');
                    }
                });
            }
        }

        // Function to remove selected department
        function removeDepartment77(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            const selectedOption = dropdown.options[dropdown.selectedIndex];

            if (!selectedOption || selectedOption.value === "") {
                alert("Please select a department to remove.");
                return;
            }

            const optionText = selectedOption.textContent;

            // Confirm deletion
            if (!confirm(`Are you sure you want to remove "${optionText}"?`)) {
                return;
            }

            $.ajax({
                url: '/department/remove77',
                type: 'POST',
                data: {
                    name: optionText,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    if (data.success) {
                        // Remove the option from the dropdown
                        dropdown.removeChild(selectedOption);
                        alert(data.message || 'Department removed successfully!');
                    } else {
                        alert(data.message || 'Error removing department.');
                    }
                },
                error: function (xhr) {
                    console.error('Error:', xhr.responseText);
                    alert('An error occurred while removing the department.');
                }
            });
        }


        function addLocation22(dropdownId, inputId) {
            const dropdown = document.getElementById(dropdownId);
            const input = document.getElementById(inputId);

            const newOptionText = input.value.trim();

            if (newOptionText === "") {
                alert("Please enter a Location name.");
                return;
            }

            // Check if option already exists
            const existingOptions = Array.from(dropdown.options);
            const optionExists = existingOptions.some(option =>
                option.value.toLowerCase() === newOptionText.toLowerCase()
            );

            if (optionExists) {
                alert("This Location already exists.");
                return;
            }

            // Add new location via AJAX
            $.ajax({
                url: '/location/add77',
                type: 'POST',
                data: {
                    location: newOptionText,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    if (data.success) {
                        // Add the new option to the dropdown
                        const newOption = document.createElement("option");
                        newOption.value = newOptionText;
                        newOption.textContent = newOptionText;
                        dropdown.appendChild(newOption);

                        // Clear the input field
                        input.value = "";

                        alert(data.message || 'Location added successfully!');
                    } else {
                        alert(data.message || 'Error adding Location.');
                    }
                },
                error: function (xhr) {
                    console.error('Error:', xhr.responseText);
                    let errorMessage = 'An error occurred while adding the Location.';

                    // Try to parse error response
                    try {
                        const response = JSON.parse(xhr.responseText);
                        if (response.message) {
                            errorMessage = response.message;
                        }
                    } catch (e) {
                        // Use default error message
                    }

                    alert(errorMessage);
                }
            });
        }


        function removeLocation22(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            const selectedOption = dropdown.options[dropdown.selectedIndex];

            if (!selectedOption || selectedOption.value === "") {
                alert("Please select a Location to remove.");
                return;
            }

            const optionText = selectedOption.textContent;

            // Confirm deletion
            if (!confirm(`Are you sure you want to remove "${optionText}"?`)) {
                return;
            }

            $.ajax({
                url: '/location/remove77',
                type: 'POST',
                data: {
                    location: optionText,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    if (data.success) {
                        // Remove the option from the dropdown
                        dropdown.removeChild(selectedOption);
                        alert(data.message || 'Location removed successfully!');
                    } else {
                        alert(data.message || 'Error removing Location.');
                    }
                },
                error: function (xhr) {
                    console.error('Error:', xhr.responseText);
                    alert('An error occurred while removing the Location.');
                }
            });
        }

        function addDep(dropdownId, inputId) {
            const dropdown = document.getElementById(dropdownId);
            const input = document.getElementById(inputId);
            const newOptionValue = input.value.trim();

            if (newOptionValue) {


                $.ajax({
                    url: '/department/add',
                    type: 'POST',
                    data: {
                        name: newOptionValue.trim(),
                        parent_name: dropdownId,
                        _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                    },
                    success: function (data) {
                        if (data.success) {
                            // Add the new option to the dropdown in the UI
                            const newOption = document.createElement("option");
                            newOption.value = newOptionValue.toLowerCase().replace(/\s+/g, "_");
                            newOption.textContent = newOptionValue;

                            dropdown.appendChild(newOption);
                            input.value = "";
                            alert(data.message);
                        } else {
                            alert(data.message || 'Error adding option.');
                        }
                    },
                    error: function () {
                        alert('An error occurred while adding the option.');
                    }
                });

                // alert(`Option "${newOptionValue}" added successfully!`);
            } else {
                // alert("Please enter a valid option.");
            }
        }

    </script>
    <script>
        function handleFormSubmit(event) {
            event.preventDefault();

            let formData = new FormData();

            formData.append('employee_code', $('#employee-code').val());
            formData.append('employee_name', $('#employee-name').val());
            formData.append('designation', $('#designation').val());
            formData.append('location', $('#location').val());
            formData.append('department', $('#department1').val());
            formData.append('contact_number', $('#contact-number').val());
            formData.append('email', $('#email').val());
            formData.append('password', $('#password').val());

            let signatureImage = $('#signature-image')[0].files[0];
            if (signatureImage) {
                formData.append('imageEmp', signatureImage);
            }

            $.ajax({
                url: '/employee/store',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                success: function (data) {
                    if (data.success) {
                        alert('Employee added successfully');

                        $('#employee-code').val('');
                        $('#employee-name').val('');
                        $('#designation').val('');
                        $('#location').val('');
                        $('#department1').val('');
                        $('#contact-number').val('');
                        $('#email').val('');
                        $('#password').val('');
                        $('#signature-image').val('');
                        $('#signature-preview').hide();
                    } else {
                        alert('Error: ' + data.message);
                    }
                },
                error: function (xhr) {
                    console.error('Error:', xhr);
                    alert('An error occurred while saving data: ' + (xhr.responseJSON?.message ||
                        'Unknown error'));
                }
            });
        }

        function addLocationOption(dropdownId, inputId) {
            const dropdown = document.getElementById(dropdownId);
            const input = document.getElementById(inputId);
            const newOptionValue = input.value.trim();

            if (newOptionValue) {


                $.ajax({
                    url: '/location/add',
                    type: 'POST',
                    data: {
                        name: newOptionValue.trim(),
                        parent_name: dropdownId,
                        _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                    },
                    success: function (data) {
                        if (data.success) {
                            // Add the new option to the dropdown in the UI
                            const newOption = document.createElement("option");
                            newOption.value = newOptionValue.toLowerCase().replace(/\s+/g, "_");
                            newOption.textContent = newOptionValue;

                            dropdown.appendChild(newOption);
                            input.value = "";
                            alert(data.message);
                        } else {
                            alert(data.message || 'Error adding option.');
                        }
                    },
                    error: function () {
                        alert('An error occurred while adding the option.');
                    }
                });

                // alert(`Option "${newOptionValue}" added successfully!`);
            } else {
                // alert("Please enter a valid option.");
            }
        }

        function addDep(dropdownId, inputId) {
            const dropdown = document.getElementById(dropdownId);
            const input = document.getElementById(inputId);
            const newOptionValue = input.value.trim();

            if (newOptionValue) {


                $.ajax({
                    url: '/department/add',
                    type: 'POST',
                    data: {
                        name: newOptionValue.trim(),
                        parent_name: dropdownId,
                        _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                    },
                    success: function (data) {
                        if (data.success) {
                            // Add the new option to the dropdown in the UI
                            const newOption = document.createElement("option");
                            newOption.value = newOptionValue.toLowerCase().replace(/\s+/g, "_");
                            newOption.textContent = newOptionValue;

                            dropdown.appendChild(newOption);
                            input.value = "";
                            alert(data.message);
                        } else {
                            alert(data.message || 'Error adding option.');
                        }
                    },
                    error: function () {
                        alert('An error occurred while adding the option.');
                    }
                });

                // alert(`Option "${newOptionValue}" added successfully!`);
            } else {
                // alert("Please enter a valid option.");
            }
        }

        function addMachine(dropdownId, inputId) {
            const dropdown = document.getElementById(dropdownId);
            const input = document.getElementById(inputId);
            const newOptionValue = input.value.trim();

            if (newOptionValue) {


                $.ajax({
                    url: '/machine/add',
                    type: 'POST',
                    data: {
                        name: newOptionValue.trim(),
                        parent_name: dropdownId,
                        _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                    },
                    success: function (data) {
                        if (data.success) {
                            // Add the new option to the dropdown in the UI
                            const newOption = document.createElement("option");
                            newOption.value = newOptionValue.toLowerCase().replace(/\s+/g, "_");
                            newOption.textContent = newOptionValue;

                            dropdown.appendChild(newOption);
                            input.value = "";
                            alert(data.message);
                        } else {
                            alert(data.message || 'Error adding option.');
                        }
                    },
                    error: function () {
                        alert('An error occurred while adding the option.');
                    }
                });

                // alert(`Option "${newOptionValue}" added successfully!`);
            } else {
                // alert("Please enter a valid option.");
            }
        }

        function addSupplier(dropdownId, inputId) {
            const dropdown = document.getElementById(dropdownId);
            const input = document.getElementById(inputId);
            const newOptionValue = input.value.trim();

            if (newOptionValue) {


                $.ajax({
                    url: '/machine/add',
                    type: 'POST',
                    data: {
                        name: newOptionValue.trim(),
                        parent_name: dropdownId,
                        _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                    },
                    success: function (data) {
                        if (data.success) {
                            // Add the new option to the dropdown in the UI
                            const newOption = document.createElement("option");
                            newOption.value = newOptionValue.toLowerCase().replace(/\s+/g, "_");
                            newOption.textContent = newOptionValue;

                            dropdown.appendChild(newOption);
                            input.value = "";
                            alert(data.message);
                        } else {
                            alert(data.message || 'Error adding option.');
                        }
                    },
                    error: function () {
                        alert('An error occurred while adding the option.');
                    }
                });

                // alert(`Option "${newOptionValue}" added successfully!`);
            } else {
                // alert("Please enter a valid option.");
            }
        }

        function removeLocationOption(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            const selectedOption = dropdown.options[dropdown.selectedIndex];

            if (selectedOption && selectedOption.value !== "") {
                const optionText = selectedOption.textContent;

                $.ajax({
                    url: '/location/remove', // Correct URL for locations
                    type: 'POST',
                    data: {
                        name: optionText,
                        parent_name: 'Locationss', // Ensure correct parent_name for locations
                        _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                    },
                    success: function (data) {
                        if (data.success) {
                            // Remove the option from the dropdown in the UI
                            dropdown.removeChild(selectedOption);
                            alert(data.message);
                        } else {
                            alert(data.message || 'Error removing option.');
                        }
                    },
                    error: function () {
                        alert('An error occurred while removing the location.');
                    }
                });
            } else {
                alert("No option selected for removal.");
            }
        }

        function removeDep(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            const selectedOption = dropdown.options[dropdown.selectedIndex];

            if (selectedOption && selectedOption.value !== "") {
                const optionText = selectedOption.textContent;

                $.ajax({
                    url: '/department/remove', // Correct URL for locations
                    type: 'POST',
                    data: {
                        name: optionText,
                        parent_name: 'Locationss', // Ensure correct parent_name for locations
                        _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                    },
                    success: function (data) {
                        if (data.success) {
                            // Remove the option from the dropdown in the UI
                            dropdown.removeChild(selectedOption);
                            alert(data.message);
                        } else {
                            alert(data.message || 'Error removing option.');
                        }
                    },
                    error: function () {
                        alert('An error occurred while removing the location.');
                    }
                });
            } else {
                alert("No option selected for removal.");
            }
        }

        function removeMachine(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            const selectedOption = dropdown.options[dropdown.selectedIndex];

            if (selectedOption && selectedOption.value !== "") {
                const optionText = selectedOption.textContent;

                $.ajax({
                    url: '/department/remove', // Correct URL for locations
                    type: 'POST',
                    data: {
                        name: optionText,
                        parent_name: 'Locationss', // Ensure correct parent_name for locations
                        _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                    },
                    success: function (data) {
                        if (data.success) {
                            // Remove the option from the dropdown in the UI
                            dropdown.removeChild(selectedOption);
                            alert(data.message);
                        } else {
                            alert(data.message || 'Error removing option.');
                        }
                    },
                    error: function () {
                        alert('An error occurred while removing the location.');
                    }
                });
            } else {
                alert("No option selected for removal.");
            }
        }

        function removeSupplier(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            const selectedOption = dropdown.options[dropdown.selectedIndex];

            if (selectedOption && selectedOption.value !== "") {
                const optionText = selectedOption.textContent;

                $.ajax({
                    url: '/department/remove', // Correct URL for locations
                    type: 'POST',
                    data: {
                        name: optionText,
                        parent_name: 'Locationss', // Ensure correct parent_name for locations
                        _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                    },
                    success: function (data) {
                        if (data.success) {
                            // Remove the option from the dropdown in the UI
                            dropdown.removeChild(selectedOption);
                            alert(data.message);
                        } else {
                            alert(data.message || 'Error removing option.');
                        }
                    },
                    error: function () {
                        alert('An error occurred while removing the location.');
                    }
                });
            } else {
                alert("No option selected for removal.");
            }
        }

        function addOption(dropdownId, inputId) {
            const dropdown = document.getElementById(dropdownId);
            const input = document.getElementById(inputId);
            const newOptionValue = input.value.trim();

            if (newOptionValue) {
                $.ajax({
                    url: '/dropdown/add',
                    type: 'POST',
                    data: {
                        name: newOptionValue,
                        parent_name: dropdownId, // Parent name dynamically assigned
                        _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                    },
                    success: function (data) {
                        if (data.success) {
                            // Add the new option to the dropdown in the UI
                            const newOption = document.createElement("option");
                            newOption.value = newOptionValue.toLowerCase().replace(/\s+/g, "_");
                            newOption.textContent = newOptionValue;

                            dropdown.appendChild(newOption);
                            input.value = "";
                            alert(data.message);
                        } else {
                            alert(data.message || 'Error adding option.');
                        }
                    },
                    error: function () {
                        alert('An error occurred while adding the option.');
                    }
                });
            } else {
                alert("Please enter a valid option.");
            }
        }

        // Calibration factors scripts

        function addLocationOptionCalib(dropdownId, inputId) {
            console.log("addLocationOptionCalib() triggered!");

            const dropdown = document.getElementById(dropdownId);
            const input = document.getElementById(inputId);

            console.log("Dropdown:", dropdown);
            console.log("Input:", input);

            if (!dropdown || !input) {
                console.error("Dropdown or input field not found!");
                alert("Error: Unable to find the dropdown or input field.");
                return;
            }

            const newOptionValue = input.value.trim();

            if (!newOptionValue) {
                alert("Please enter a valid option.");
                return;
            }

            console.log("Sending AJAX request to add location...");

            $.ajax({
                url: '/location/add/calib',
                type: 'POST',
                data: {
                    name: newOptionValue,
                    parent_name: dropdownId,
                    _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                },
                success: function (data) {
                    console.log("AJAX Success Response:", data);

                    if (data.success) {
                        // Add the new option to the dropdown
                        const newOption = document.createElement("option");
                        newOption.value = newOptionValue.toLowerCase().replace(/\s+/g, "_");
                        newOption.textContent = newOptionValue;
                        dropdown.appendChild(newOption);

                        input.value = ""; // Clear input field
                        alert(data.message);
                    } else {
                        alert(data.message || 'Error adding option.');
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", status, error);
                    alert("An error occurred while adding the option.");
                }
            });
        }

        // Function for Department Dropdown
        function addDepCalib(dropdownId, inputId) {
            console.log("addDepCalib() triggered!");

            const dropdown = document.getElementById(dropdownId);
            const input = document.getElementById(inputId);

            console.log("Dropdown:", dropdown);
            console.log("Input:", input);

            if (!dropdown || !input) {
                console.error("Dropdown or input field not found!");
                alert("Error: Unable to find the dropdown or input field.");
                return;
            }

            const newOptionValue = input.value.trim();

            if (!newOptionValue) {
                alert("Please enter a valid option.");
                return;
            }

            console.log("Sending AJAX request to add department...");

            $.ajax({
                url: '/department/add/calib',
                type: 'POST',
                data: {
                    name: newOptionValue,
                    parent_name: dropdownId,
                    _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                },
                success: function (data) {
                    console.log("AJAX Success Response:", data);

                    if (data.success) {
                        // Add the new option to the dropdown
                        const newOption = document.createElement("option");
                        newOption.value = newOptionValue.toLowerCase().replace(/\s+/g, "_");
                        newOption.textContent = newOptionValue;
                        dropdown.appendChild(newOption);

                        input.value = ""; // Clear input field
                        alert(data.message);
                    } else {
                        alert(data.message || 'Error adding option.');
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", status, error);
                    alert("An error occurred while adding the option.");
                }
            });
        }


        function addMachineCalib(dropdownId, inputId) {
            const dropdown = document.getElementById(dropdownId);
            const input = document.getElementById(inputId);
            const newOptionValue = input.value.trim();

            if (newOptionValue) {


                $.ajax({
                    url: '/department/add/calib',
                    type: 'POST',
                    data: {
                        name: newOptionValue.trim(),
                        parent_name: dropdownId,
                        _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                    },
                    success: function (data) {
                        if (data.success) {
                            // Add the new option to the dropdown in the UI
                            const newOption = document.createElement("option");
                            newOption.value = newOptionValue.toLowerCase().replace(/\s+/g, "_");
                            newOption.textContent = newOptionValue;

                            dropdown.appendChild(newOption);
                            input.value = "";
                            alert(data.message);
                        } else {
                            alert(data.message || 'Error adding option.');
                        }
                    },
                    error: function () {
                        alert('An error occurred while adding the option.');
                    }
                });

                // alert(`Option "${newOptionValue}" added successfully!`);
            } else {
                // alert("Please enter a valid option.");
            }
        }

        function addSupplierCalib(dropdownId, inputId) {
            const dropdown = document.getElementById(dropdownId);
            const input = document.getElementById(inputId);
            const newOptionValue = input.value.trim();

            if (newOptionValue) {


                $.ajax({
                    url: '/department/add/calib',
                    type: 'POST',
                    data: {
                        name: newOptionValue.trim(),
                        parent_name: dropdownId,
                        _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                    },
                    success: function (data) {
                        if (data.success) {
                            // Add the new option to the dropdown in the UI
                            const newOption = document.createElement("option");
                            newOption.value = newOptionValue.toLowerCase().replace(/\s+/g, "_");
                            newOption.textContent = newOptionValue;

                            dropdown.appendChild(newOption);
                            input.value = "";
                            alert(data.message);
                        } else {
                            alert(data.message || 'Error adding option.');
                        }
                    },
                    error: function () {
                        alert('An error occurred while adding the option.');
                    }
                });

                // alert(`Option "${newOptionValue}" added successfully!`);
            } else {
                // alert("Please enter a valid option.");
            }
        }


        function removeLocationOptionCalib(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            const selectedOption = dropdown.options[dropdown.selectedIndex];

            if (selectedOption && selectedOption.value !== "") {
                const optionText = selectedOption.textContent;

                $.ajax({
                    url: '/location/remove/calib', // Correct URL for locations
                    type: 'POST',
                    data: {
                        name: optionText,
                        parent_name: 'Locationss', // Ensure correct parent_name for locations
                        _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                    },
                    success: function (data) {
                        if (data.success) {
                            // Remove the option from the dropdown in the UI
                            dropdown.removeChild(selectedOption);
                            alert(data.message);
                        } else {
                            alert(data.message || 'Error removing option.');
                        }
                    },
                    error: function () {
                        alert('An error occurred while removing the location.');
                    }
                });
            } else {
                alert("No option selected for removal.");
            }
        }

        function removeDepCalib(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            const selectedOption = dropdown.options[dropdown.selectedIndex];

            if (selectedOption && selectedOption.value !== "") {
                const optionText = selectedOption.textContent;

                $.ajax({
                    url: '/department/remove/calib', // Correct URL for locations
                    type: 'POST',
                    data: {
                        name: optionText,
                        parent_name: 'Locationss', // Ensure correct parent_name for locations
                        _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                    },
                    success: function (data) {
                        if (data.success) {
                            // Remove the option from the dropdown in the UI
                            dropdown.removeChild(selectedOption);
                            alert(data.message);
                        } else {
                            alert(data.message || 'Error removing option.');
                        }
                    },
                    error: function () {
                        alert('An error occurred while removing the location.');
                    }
                });
            } else {
                alert("No option selected for removal.");
            }
        }

        function removeMachineCalib(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            const selectedOption = dropdown.options[dropdown.selectedIndex];

            if (selectedOption && selectedOption.value !== "") {
                const optionText = selectedOption.textContent;

                $.ajax({
                    url: '/department/remove/calib', // Correct URL for locations
                    type: 'POST',
                    data: {
                        name: optionText,
                        parent_name: 'Locationss', // Ensure correct parent_name for locations
                        _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                    },
                    success: function (data) {
                        if (data.success) {
                            // Remove the option from the dropdown in the UI
                            dropdown.removeChild(selectedOption);
                            alert(data.message);
                        } else {
                            alert(data.message || 'Error removing option.');
                        }
                    },
                    error: function () {
                        alert('An error occurred while removing the location.');
                    }
                });
            } else {
                alert("No option selected for removal.");
            }
        }

        function removeSupplierCalib(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            const selectedOption = dropdown.options[dropdown.selectedIndex];

            if (selectedOption && selectedOption.value !== "") {
                const optionText = selectedOption.textContent;

                $.ajax({
                    url: '/department/remove/calib', // Correct URL for locations
                    type: 'POST',
                    data: {
                        name: optionText,
                        parent_name: 'Locationss', // Ensure correct parent_name for locations
                        _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                    },
                    success: function (data) {
                        if (data.success) {
                            // Remove the option from the dropdown in the UI
                            dropdown.removeChild(selectedOption);
                            alert(data.message);
                        } else {
                            alert(data.message || 'Error removing option.');
                        }
                    },
                    error: function () {
                        alert('An error occurred while removing the location.');
                    }
                });
            } else {
                alert("No option selected for removal.");
            }
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const tabs = document.querySelectorAll(".wapp-chat-item");
            const panels = document.querySelectorAll(".wapp-main-chat");

            tabs.forEach((tab) => {
                tab.addEventListener("click", () => {
                    // Remove active class from all tabs and panels
                    tabs.forEach((t) => t.classList.remove("active"));
                    panels.forEach((p) => p.classList.remove("active"));

                    // Add active class to the clicked tab and corresponding panel
                    tab.classList.add("active");
                    const target = document.getElementById(tab.dataset.target);
                    target.classList.add("active");
                });
            });
        });
        document.getElementById('redirectButton').addEventListener('click', function () {
            const employeeTab = document.querySelector('.wapp-chat-item[data-target="Employee"]');
            if (employeeTab) {
                employeeTab.click()

            }
        });

        function stateTagging(zonesDropDown, show) {
            event.preventDefault();
            event.stopPropagation()
            if (show) {
                document.addEventListener("click", function handleClick(e) {
                    if (!zonesDropDown.contains(e.target)) {
                        zonesDropDown.classList.remove('active');
                        document.removeEventListener("click", handleClick);
                    }
                });
                zonesDropDown.classList.add('active');

            } else
                zonesDropDown.classList.remove('active');

        }

        function addOption(dropdownId, inputId) {
            const dropdown = document.getElementById(dropdownId);
            const input = document.getElementById(inputId);
            const newOptionValue = input.value.trim();

            if (newOptionValue) {
                const newOption = document.createElement("option");
                newOption.value = newOptionValue.toLowerCase().replace(/\s+/g, "_");
                newOption.textContent = newOptionValue;

                dropdown.appendChild(newOption);
                input.value = "";
                alert(data.message);
            } else {
                alert(data.message || 'Error adding option.');
            }

            // $.ajax({
            //     url: '/dropdown/add',
            //     type: 'POST',
            //     data: {
            //         name: newOptionValue.trim(),
            //         parent_name: dropdownId,
            //         _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
            //     },
            //     success: function(data) {
            //         if (data.success) {
            //             // Add the new option to the dropdown in the UI
            //             const newOption = document.createElement("option");
            //             newOption.value = newOptionValue.toLowerCase().replace(/\s+/g, "_");
            //             newOption.textContent = newOptionValue;

            //             dropdown.appendChild(newOption);
            //             input.value = "";
            //             alert(data.message);
            //         } else {
            //             alert(data.message || 'Error adding option.');
            //         }
            //     },
            //     error: function() {
            //         alert('An error occurred while adding the option.');
            //     }
            // });

            // alert(`Option "${newOptionValue}" added successfully!`);
            // } else {
            //     // alert("Please enter a valid option.");
            // }
        }

        function removeOption(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            const selectedOption = dropdown.options[dropdown.selectedIndex];

            if (selectedOption) {
                const optionText = selectedOption.textContent;
                dropdown.removeChild(selectedOption);
                // $.ajax({
                //     url: '/dropdown/remove',
                //     type: 'POST',
                //     data: {
                //         name: optionText,
                //         parent_name: dropdownId,
                //         _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                //     },
                //     success: function(data) {
                //         if (data.success) {
                //             // Remove the option from the dropdown in the UI
                //             dropdown.removeChild(selectedOption);
                //         } else {
                //             alert(data.message || 'Error removing option.');
                //         }
                //     },
                //     error: function() {
                //         alert('An error occurred while removing the option.');
                //     }
                // });

                // alert(`Option "${optionText}" removed successfully!`);
            } else {
                // alert("No option selected for removal.");
            }
        }

        function previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('profile-preview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }

        function allowDrop(event) {
            event.preventDefault();
        }

        function dropSignature(event) {
            event.preventDefault();
            const files = event.dataTransfer.files;
            if (files.length > 0) {
                handleFileUpload(files[0]);
            }
        }

        function previewSignature(event) {
            const file = event.target.files[0];
            if (file) {
                handleFileUpload(file);
            }
        }

        function handleFileUpload(file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const signaturePreview = document.getElementById('signature-preview');
                const signatureImg = document.getElementById('signature-preview-img');
                signaturePreview.style.display = 'block';
                signatureImg.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }





        function addRiskOption(dropdownId, inputId) {
            const dropdown = document.getElementById(dropdownId);
            const input = document.getElementById(inputId);
            const newOptionValue = input.value.trim();

            if (newOptionValue) {


                $.ajax({
                    url: '/drops/add',
                    type: 'POST',
                    data: {
                        name: newOptionValue.trim(),
                        parent_name: dropdownId,
                        _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                    },
                    success: function (data) {
                        if (data.success) {
                            // Add the new option to the dropdown in the UI
                            const newOption = document.createElement("option");
                            newOption.value = newOptionValue.toLowerCase().replace(/\s+/g, "_");
                            newOption.textContent = newOptionValue;

                            dropdown.appendChild(newOption);
                            input.value = "";
                            alert(data.message);
                        } else {
                            alert(data.message || 'Error adding option.');
                        }
                    },
                    error: function () {
                        alert('An error occurred while adding the option.');
                    }
                });

                // alert(`Option "${newOptionValue}" added successfully!`);
            } else {
                // alert("Please enter a valid option.");
            }
        }

        function removeRiskOption(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            const selectedOption = dropdown.options[dropdown.selectedIndex];

            if (selectedOption) {
                const optionText = selectedOption.textContent;

                $.ajax({
                    url: '/drops/remove',
                    type: 'POST',
                    data: {
                        name: optionText,
                        parent_name: dropdownId,
                        _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                    },
                    success: function (data) {
                        if (data.success) {
                            // Remove the option from the dropdown in the UI
                            dropdown.removeChild(selectedOption);
                        } else {
                            alert(data.message || 'Error removing option.');
                        }
                    },
                    error: function () {
                        alert('An error occurred while removing the option.');
                    }
                });

                // alert(`Option "${optionText}" removed successfully!`);
            } else {
                // alert("No option selected for removal.");
            }
        }



        function addSeverityOption(dropdownId, inputId) {
            const dropdown = document.getElementById(dropdownId);
            const input = document.getElementById(inputId);
            const newOptionValue = input.value.trim();

            if (newOptionValue) {


                $.ajax({
                    url: '/drops/add',
                    type: 'POST',
                    data: {
                        name: newOptionValue.trim(),
                        parent_name: dropdownId,
                        _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                    },
                    success: function (data) {
                        if (data.success) {
                            // Add the new option to the dropdown in the UI
                            const newOption = document.createElement("option");
                            newOption.value = newOptionValue.toLowerCase().replace(/\s+/g, "_");
                            newOption.textContent = newOptionValue;

                            dropdown.appendChild(newOption);
                            input.value = "";
                            alert(data.message);
                        } else {
                            alert(data.message || 'Error adding option.');
                        }
                    },
                    error: function () {
                        alert('An error occurred while adding the option.');
                    }
                });

                // alert(`Option "${newOptionValue}" added successfully!`);
            } else {
                // alert("Please enter a valid option.");
            }
        }

        function removeSeverityOption(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            const selectedOption = dropdown.options[dropdown.selectedIndex];

            if (selectedOption) {
                const optionText = selectedOption.textContent;

                $.ajax({
                    url: '/drops/remove',
                    type: 'POST',
                    data: {
                        name: optionText,
                        parent_name: dropdownId,
                        _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                    },
                    success: function (data) {
                        if (data.success) {
                            // Remove the option from the dropdown in the UI
                            dropdown.removeChild(selectedOption);
                        } else {
                            alert(data.message || 'Error removing option.');
                        }
                    },
                    error: function () {
                        alert('An error occurred while removing the option.');
                    }
                });

                // alert(`Option "${optionText}" removed successfully!`);
            } else {
                // alert("No option selected for removal.");
            }
        }


        function addLikelihoodOption(dropdownId, inputId) {
            const dropdown = document.getElementById(dropdownId);
            const input = document.getElementById(inputId);
            const newOptionValue = input.value.trim();

            if (newOptionValue) {


                $.ajax({
                    url: '/drops/add',
                    type: 'POST',
                    data: {
                        name: newOptionValue.trim(),
                        parent_name: dropdownId,
                        _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                    },
                    success: function (data) {
                        if (data.success) {
                            // Add the new option to the dropdown in the UI
                            const newOption = document.createElement("option");
                            newOption.value = newOptionValue.toLowerCase().replace(/\s+/g, "_");
                            newOption.textContent = newOptionValue;

                            dropdown.appendChild(newOption);
                            input.value = "";
                            alert(data.message);
                        } else {
                            alert(data.message || 'Error adding option.');
                        }
                    },
                    error: function () {
                        alert('An error occurred while adding the option.');
                    }
                });

                // alert(`Option "${newOptionValue}" added successfully!`);
            } else {
                // alert("Please enter a valid option.");
            }
        }

        function removeLikelihoodOption(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            const selectedOption = dropdown.options[dropdown.selectedIndex];

            if (selectedOption) {
                const optionText = selectedOption.textContent;

                $.ajax({
                    url: '/drops/remove',
                    type: 'POST',
                    data: {
                        name: optionText,
                        parent_name: dropdownId,
                        _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                    },
                    success: function (data) {
                        if (data.success) {
                            // Remove the option from the dropdown in the UI
                            dropdown.removeChild(selectedOption);
                        } else {
                            alert(data.message || 'Error removing option.');
                        }
                    },
                    error: function () {
                        alert('An error occurred while removing the option.');
                    }
                });

                // alert(`Option "${optionText}" removed successfully!`);
            } else {
                // alert("No option selected for removal.");
            }
        }
    </script>
    <script>
        $(document).ready(function () {
            $('#instrumentForm').submit(function (e) {
                e.preventDefault(); // Prevent page reload

                $.ajax({
                    url: "{{ route('instrument.store') }}",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function (response) {
                        alert(response.success); // Show success alert
                        $('#instrumentForm')[0].reset(); // Reset form on success
                    },
                    error: function (xhr) {
                        let errors = xhr.responseJSON;
                        if (errors.error) {
                            alert("Error: " + errors.error); // Show error alert
                        } else {
                            alert("Validation Error: Please fill all required fields.");
                        }
                    }
                });
            });
        });
    </script>
    <script>
        const departments = @json($departments77);

        let rowCounter = 1; // Counter to generate unique IDs for each row

        function addNewRow300() {
            const table = document.getElementById('parametersTable-unique300').getElementsByTagName('tbody')[0];
            const newRow = table.insertRow();

            // Generate options for the department dropdown
            const departmentOptions = departments.map(dept => `<option value="${dept.name}">${dept.name}</option>`).join('');

            const cells = [
                `<select class="department-unique" id="depart300_${rowCounter}">
                                                                                                                                                                <option value="">-- Select --</option>
                                                                                                                                                                ${departmentOptions}
                                                                                                                                                            </select>`,
                `<input type="text" class="eqas-unique form-control" id="eqas-unique_${rowCounter}">`,
                `<input type="text" class="eqas-program form-control" id="eqas-program_${rowCounter}">`,
                `<div class="instance">
                                                                                                                                                                <button class="open-modal-btn btn btn-info" data-row-index="${rowCounter}">Select Options</button>
                                                                                                                                                                <div class="selection" id="selection_${rowCounter}"></div>
                                                                                                                                                            </div>`,



                `<input type="number" class="cost" id="cost_${rowCounter}">`
            ];

            // Removed fields
            `<div style="display: flex; gap: 5px; align-items: flex-start;">

                                                                                                                                                            </div>`,


                cells.forEach((cell, index) => {
                    const newCell = newRow.insertCell(index);
                    newCell.innerHTML = cell;
                });

            // Add event listener to the new "Select Options" button
            const openModalButton = newRow.querySelector('.open-modal-btn');
            openModalButton.addEventListener('click', () => openModal(rowCounter));

            rowCounter++; // Increment the counter for the next row
        }


        function openModal(rowIndex) {
            const modalContent = `
                                                                                                                                                                                                                                                                                                                                                                                        <div class="eqas-modal" id="eqas-modal_${rowIndex}">
                                                                                                                                                                                                                                                                                                                                                                                            <div class="eqas-modal-content">
                                                                                                                                                                                                                                                                                                                                                                                                <span class="close-modal" onclick="closeModal(${rowIndex})">&times;</span>
                                                                                                                                                                                                                                                                                                                                                                                                <input type="text" id="searchInput_${rowIndex}" class="search-input" placeholder="Search for Test Codes or Names" onkeyup="searchTable(${rowIndex})">
                                                                                                                                                                                                                                                                                                                                                                                                <table id="testTable_${rowIndex}" class="table">
                                                                                                                                                                                                                                                                                                                                                                                                    <thead>
                                                                                                                                                                                                                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                                                                                                                                                                                                                            <th><input type="checkbox" id="selectAll_${rowIndex}" onclick="selectAllCheckboxes(${rowIndex})"> Select All</th>
                                                                                                                                                                                                                                                                                                                                                                                                            <th>Test Code</th>
                                                                                                                                                                                                                                                                                                                                                                                                            <th>Test Name</th>
                                                                                                                                                                                                                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                                                                                                                                                                                                                    </thead>
                                                                                                                                                                                                                                                                                                                                                                                                    <tbody>
                                                                                                                                                                                                                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                                                                                                                                                                                                                            <td><input type="checkbox" class="eqas-modal-option" data-option="Test One"></td>
                                                                                                                                                                                                                                                                                                                                                                                                            <td><input type="text" class="test-code-input" value="T001"></td>
                                                                                                                                                                                                                                                                                                                                                                                                            <td><input type="text" class="test-name-input" value="Test One"></td>
                                                                                                                                                                                                                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                                                                                                                                                                                                                            <td><input type="checkbox" class="eqas-modal-option" data-option="Test Two"></td>
                                                                                                                                                                                                                                                                                                                                                                                                            <td><input type="text" class="test-code-input" value="T002"></td>
                                                                                                                                                                                                                                                                                                                                                                                                            <td><input type="text" class="test-name-input" value="Test Two"></td>
                                                                                                                                                                                                                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                                                                                                                                                                                                                            <td><input type="checkbox" class="eqas-modal-option" data-option="Test Three"></td>
                                                                                                                                                                                                                                                                                                                                                                                                            <td><input type="text" class="test-code-input" value="T003"></td>
                                                                                                                                                                                                                                                                                                                                                                                                            <td><input type="text" class="test-name-input" value="Test Three"></td>
                                                                                                                                                                                                                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                                                                                                                                                                                                                            <td><input type="checkbox" class="eqas-modal-option" data-option="Test Four"></td>
                                                                                                                                                                                                                                                                                                                                                                                                            <td><input type="text" class="test-code-input" value="T004"></td>
                                                                                                                                                                                                                                                                                                                                                                                                            <td><input type="text" class="test-name-input" value="Test Four"></td>
                                                                                                                                                                                                                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                                                                                                                                                                                                                            <td><input type="checkbox" class="eqas-modal-option" data-option="Test Five"></td>
                                                                                                                                                                                                                                                                                                                                                                                                            <td><input type="text" class="test-code-input" value="T005"></td>
                                                                                                                                                                                                                                                                                                                                                                                                            <td><input type="text" class="test-name-input" value="Test Five"></td>
                                                                                                                                                                                                                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                                                                                                                                                                                                                    </tbody>
                                                                                                                                                                                                                                                                                                                                                                                                </table>
                                                                                                                                                                                                                                                                                                                                                                                                <button class="confirm-selection btn btn-primary" id="confirm-selection_${rowIndex}">Confirm Selection</button>
                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                    `;

            // Display the modal
            document.getElementById('modal-container').innerHTML = modalContent;
            document.getElementById(`eqas-modal_${rowIndex}`).style.display = 'block';

            // Add event listener to the "Confirm Selection" button
            const confirmButton = document.getElementById(`confirm-selection_${rowIndex}`);
            confirmButton.addEventListener('click', () => confirmSelection(rowIndex));
        }

        // Confirm Selection
        function confirmSelection(rowIndex) {
            const selectedOptions = [];
            const rows = document.querySelectorAll(`#testTable_${rowIndex} tbody tr`);

            rows.forEach(row => {
                const checkbox = row.querySelector('.eqas-modal-option');
                const testCode = row.querySelector('.test-code-input').value;
                const testName = row.querySelector('.test-name-input').value;

                if (checkbox.checked) {
                    selectedOptions.push(`${testCode}: ${testName}`);
                }
            });

            // Find the selection div for the current row
            const selectionDiv = document.getElementById(`selection_${rowIndex}`);
            if (selectionDiv) {
                // Display the selected options in the selection div
                selectionDiv.innerHTML = selectedOptions.map(option => `<span class="selected-option">${option}</span>`)
                    .join(', ');
            } else {
                console.error(`Selection div not found for row index: ${rowIndex}`);
            }

            // Close the modal
            closeModal(rowIndex);
        }

        // Close Modal
        function closeModal(rowIndex) {
            const modal = document.getElementById(`eqas-modal_${rowIndex}`);
            if (modal) {
                modal.style.display = 'none';
            }
        }


        // Select All Checkboxes
        function selectAllCheckboxes(rowIndex) {
            const checkboxes = document.querySelectorAll(`#testTable_${rowIndex} .eqas-modal-option`);
            const selectAll = document.getElementById(`selectAll_${rowIndex}`).checked;
            checkboxes.forEach(checkbox => checkbox.checked = selectAll);
        }

        // Search Table
        function searchTable(rowIndex) {
            const input = document.getElementById(`searchInput_${rowIndex}`).value.toLowerCase();
            const rows = document.querySelectorAll(`#testTable_${rowIndex} tbody tr`);
            rows.forEach(row => {
                const text = row.innerText.toLowerCase();
                row.style.display = text.includes(input) ? '' : 'none';
            });
        }

        // Submit Form
        function submitForm300() {

            console.log('submitForm300');
            const rows = document.querySelectorAll('#parametersTable-unique300 tbody tr');
            const data = [];

            rows.forEach((row, index) => {
                const rowData = {
                    department: document.getElementById(`depart300_${index}`).value,
                    eqa_provider: document.getElementById(`eqas-unique_${index}`).value,
                    eqa_program: document.getElementById(`eqas-program_${index}`).value,
                    parameters: Array.from(document.querySelectorAll(`#selection_${index} .selected-option`))
                        .map(el => el.innerText),
                    //cycles: document.getElementById(`cycles_${index}`).value,
                    // cycles_duration: {
                    //     value: document.getElementById(`duration-value_${index}`).value,
                    //     unit: document.getElementById(`duration-unit_${index}`).value
                    // },
                    // cycles_description: document.getElementById(`cycles-description_${index}`).value,
                    // last_date_of_submission: document.getElementById(`last-date_${index}`).value,
                    cost: document.getElementById(`cost_${index}`).value
                };
                data.push(rowData);
            });

            fetch('/submit-eqa-data', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(data => {
                    alert('Form submitted successfully!');
                    location.reload();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        // Add event listener to the initial "Select Options" button
        document.addEventListener('DOMContentLoaded', () => {
            const initialOpenModalButton = document.querySelector('.open-modal-btn');
            if (initialOpenModalButton) {
                initialOpenModalButton.addEventListener('click', () => openModal(0));
            }
        });


        function submitForm301(event) {
            event?.preventDefault(); // <-- Prevent form reload

            const rows = document.querySelectorAll('#parametersTable-unique1 tbody tr');
            const data = [];

            rows.forEach((row, index) => {
                const rowData = {
                    department: document.getElementById(`depart301_${index}`)?.value ?? '',
                    eqa_provider: document.getElementById(`ILC-unique_${index}`)?.value ?? '',
                    eqa_program: document.getElementById(`ILC-program_${index}`)?.value ?? '',
                    parameters: Array.from(document.querySelectorAll(`#selection1_${index} .selected-option`))
                        .map(el => el.innerText),
                    cost: document.getElementById(`cost1_${index}`)?.value ?? ''
                };
                data.push(rowData);
            });

            fetch('/submit-ilc-data', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(data)
            })
                .then(response => {
                    if (!response.ok) throw new Error("Server Error");
                    return response.json();
                })
                .then(data => {
                    alert('Form submitted successfully!');
                    location.reload();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }



        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll('.permissions-checkbox[data-permission="full"]').forEach(fullCheckbox => {
                fullCheckbox.addEventListener("change", function () {
                    const row = this.closest("tr");
                    const isChecked = this.checked;

                    if (isChecked)
                        row.querySelectorAll('.permissions-checkbox').forEach(checkbox => {
                            if (checkbox.getAttribute("data-permission") !== "full") {
                                checkbox.checked = isChecked;
                            }
                        });
                });
            });
        });
        document.querySelector('.permissions-save-button').addEventListener('click', function () {
            const permissions = [];

            document.querySelectorAll('.permissions-checkbox:not(:disabled)').forEach(function (checkbox) {
                const employeeId = checkbox.getAttribute('data-employee');
                const permissionType = checkbox.getAttribute('data-permission');

                if (!permissions[employeeId]) {
                    permissions[employeeId] = {
                        id: employeeId
                    };
                }

                // Store the permission state as 1 or 0
                permissions[employeeId][permissionType] = checkbox.checked ? 1 : 0;
            });

            $.ajax({
                url: '/save-permissions',
                type: 'POST',
                data: {
                    permissions: Object.values(permissions),
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.success) {
                        alert(response.message);
                    } else {
                        alert("Error saving permissions");
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Error: ", xhr.responseText);
                }
            });
        });
        $(document).ready(function () {
            $.ajax({
                url: '/fetch-permissions',
                type: 'GET',
                success: function (response) {
                    var permissions = response.permissions;

                    $('.permissions-checkbox').prop('checked', false);

                    $.each(permissions, function (index, employee) {
                        $.each(employee, function (type, value) {
                            $('.permissions-checkbox[data-employee="' + employee.id +
                                '"][data-permission="' + type + '"]').prop(
                                    'checked', value === '1' || value === 1);
                        });
                    });
                },
                error: function () {
                    // alert('Error fetching permissions!');
                }
            });
        });
    </script>

    </html>
@endsection