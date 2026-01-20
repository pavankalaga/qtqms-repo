@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Microbiology</title>
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
            text-align: center !important;
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
            gap: 5rem;
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
                <div style="font-size: 20px; ">Microbiology</div>

            </div>
            <div class="icon-view">
                <div class="pc-content">
                    <div class="pc-folder" onclick="showSection('bio-safety-cabinet-maintenance-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Bio Safety Cabinet Maintenance Log </span>
                    </div>
                    <div class="pc-folder" onclick="showSection('laminar-airflow-maintenance-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Laminar Airflow Maintenance Log </span>
                    </div>

                    <div class="pc-folder" onclick="showSection('hot-air-oven-temperature-monitoring-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Hot Air Oven Temperature Monitoring Log
                        </span>
                    </div>
                    <div class="pc-folder" onclick="showSection('hot-air-oven-maintenance-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Hot Air Oven Maintenance Log
                        </span>
                    </div>
                    <div class="pc-folder" onclick="showSection('incubator-temperature-monitoring-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Incubator Temperature Monitoring Log</span>
                    </div>

                    <div class="pc-folder" onclick="showSection('incubator-maintenance-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Incubator Maintenance Log </span>
                    </div>
                    <div class="pc-folder" onclick="showSection('bact-alert-maintenance-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Bact Alert Maintenance Log</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('vitek-2-maintenance-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Vitek 2 Maintenance Log</span>
                    </div>

                    <div class="pc-folder" onclick="showSection('autoclave-maintenance-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Autoclave Maintenance Log </span>
                    </div>
                    <div class="pc-folder" onclick="showSection('autoclave-chemical-indicator-monitoring-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Autoclave Chemical Indicator Monitoring Log </span>
                    </div>
                    <div class="pc-folder" onclick="showSection('autoclave-biological-indicator-monitoring-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Autoclave Biological Indicator Monitoring Log </span>
                    </div>
                </div>
            </div>
        </div>


        <!-- Sections -->
        <div id="bio-safety-cabinet-maintenance-log" class="main  inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/MIC/001</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Bio Safety Cabinet Maintenance Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitBioSafetyLog()">Submit</button>
                </div>
            </div>
            <!-- Back Button -->
            <div class="mt-3 mb-3 ">
                <button class="button" onclick="goBack(this)">
                    <svg class="svgIcon" viewBox="0 0 384 512">
                        <path
                            d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"
                            transform="rotate(-90, 192, 256)"></path>
                    </svg>
                </button>
            </div>


            <div class="row tableHeader">
                <div class="col-md-4">
                    <label>Department: </label>
                    <input type="text" id="department1" name="department1" placeholder="Department" required>
                </div>
                <div class="col-md-4">
                    <label>Month/Year: </label>
                    <input type="month" id="monthYear1" name="month_year1" required>
                </div>
                <div class="col-md-4">
                    <label>Equipment Id/No.: </label>
                    <select id="cabinetId1" name="cabinet_id1" class="form-control" required>
                        <option value="">Select Equipment</option>
                        @foreach($instruments as $cabinet)
                            <option value="{{ $cabinet->id }}">{{ $cabinet->instrument_id }} - {{ $cabinet->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="table-responsive mt-4">
                <table class="stock-planner-table">
                    <thead>
                        <tr>
                            <th rowspan="3">Date</th>
                            <th rowspan="3">Clean with 70% Isopropyl Alcohol</th>
                            <th rowspan="3">UV Light 15 mins</th>
                            <th rowspan="3">Manometer Reading (10±1)</th>
                            <th rowspan="3">Done by Sign</th>
                            <th rowspan="3">Availability of 1% Hypo Container</th>
                            <th colspan="7" style="text-align: center !important;"> Weekly Maintenance</th>
                        </tr>
                        <tr>
                            <th rowspan="2">Test for Settle plate done date</th>
                            <th colspan="2">Results of Settle plate (colony count within range 0 to 5 CFU)</th>
                            <th rowspan="2">UV Efficacy</th>
                            <th rowspan="2">Checked by sign</th>
                            <th rowspan="2">Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($day = 1; $day <= 31; $day++)
                            <tr data-day="{{ $day }}">
                                <td>{{ $day }}</td>
                                <td><input type="checkbox" name="logs[{{ $day }}][clean_with_alcohol]" value="1"></td>
                                <td><input type="checkbox" name="logs[{{ $day }}][uv_light]" value="1"></td>
                                <td><input type="text" name="logs[{{ $day }}][manometer_reading]" class="form-control"></td>
                                <td><input type="text" name="logs[{{ $day }}][done_by_sign]" class="form-control"></td>
                                <td><input type="checkbox" name="logs[{{ $day }}][hypo_container_available]" value="1"></td>
                                <td><input type="date" name="logs[{{ $day }}][settle_plate_test_date]" class="form-control">
                                </td>
                                <td><input type="text" name="logs[{{ $day }}][settle_plate_results_1]" class="form-control">
                                </td>
                                <td><input type="text" name="logs[{{ $day }}][settle_plate_results_2]" class="form-control">
                                </td>
                                <td><input type="checkbox" name="logs[{{ $day }}][uv_efficacy]" value="1"></td>
                                <td><input type="text" name="logs[{{ $day }}][checked_by_sign]" class="form-control"></td>
                                <td><input type="text" name="logs[{{ $day }}][remarks]" class="form-control"></td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>

        </div>

        <div id="laminar-airflow-maintenance-log" class="main inactive">
            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/MIC/002</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Laminar Airflow Maintenance Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitLaminarMaintenanceLog()">Submit</button>
                </div>
            </div>

            <!-- Back Button -->
            <div class="mt-3 mb-3">
                <button class="button" onclick="goBack(this)">
                    <svg class="svgIcon" viewBox="0 0 384 512">
                        <path
                            d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"
                            transform="rotate(-90, 192, 256)"></path>
                    </svg>
                </button>
            </div>

            <div class="row tableHeader">
                <div class="col-md-4">
                    <label>Department: </label>
                    <input type="text" id="laminar_department" name="laminar_department" placeholder="Department" required>
                </div>
                <div class="col-md-4">
                    <label>Month/Year: </label>
                    <input type="month" id="laminar_month_year" name="laminar_month_year" required>
                </div>
                <div class="col-md-4">
                    <label>Equipment Id/No.: </label>
                    <select id="laminar_cabinet_id" name="laminar_cabinet_id" class="form-control" required>
                        <option value="">Select Equipment</option>
                        @foreach($instruments as $cabinet)
                            <option value="{{ $cabinet->id }}">{{ $cabinet->instrument_id }} - {{ $cabinet->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="table-responsive mt-4">
                <table class="stock-planner-table" id="laminar-maintenance-table">
                    <thead>
                        <tr>
                            <th rowspan="3">Date</th>
                            <th rowspan="3">Clean with 70% Isopropyl Alcohol</th>
                            <th rowspan="3">UV Light 15 mins</th>
                            <th rowspan="3">Manometer Reading (10±1)</th>
                            <th rowspan="3">Done by Sign</th>
                            <th rowspan="3">Availability of 1% Hypo Container</th>
                            <th colspan="7" style="text-align: center !important;"> Weekly Maintenance</th>
                        </tr>
                        <tr>
                            <th rowspan="2">Test for Settle plate done date</th>
                            <th colspan="2">Results of Settle plate (colony count within range 0 to 5 CFU)</th>
                            <th rowspan="2">UV Efficacy</th>
                            <th rowspan="2">Checked by sign</th>
                            <th rowspan="2">Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($day = 1; $day <= 31; $day++)
                            <tr data-day="{{ $day }}">
                                <td>{{ $day }}</td>
                                <td><input type="checkbox" name="laminar_logs[{{ $day }}][clean_with_alcohol]" value="1"></td>
                                <td><input type="checkbox" name="laminar_logs[{{ $day }}][uv_light]" value="1"></td>
                                <td><input type="text" name="laminar_logs[{{ $day }}][manometer_reading]" class="form-control">
                                </td>
                                <td><input type="text" name="laminar_logs[{{ $day }}][done_by_sign]" class="form-control"></td>
                                <td><input type="checkbox" name="laminar_logs[{{ $day }}][hypo_container_available]" value="1">
                                </td>
                                <td><input type="date" name="laminar_logs[{{ $day }}][settle_plate_test_date]"
                                        class="form-control"></td>
                                <td><input type="text" name="laminar_logs[{{ $day }}][settle_plate_results_1]"
                                        class="form-control"></td>
                                <td><input type="text" name="laminar_logs[{{ $day }}][settle_plate_results_2]"
                                        class="form-control"></td>
                                <td><input type="checkbox" name="laminar_logs[{{ $day }}][uv_efficacy]" value="1"></td>
                                <td><input type="text" name="laminar_logs[{{ $day }}][checked_by_sign]" class="form-control">
                                </td>
                                <td><input type="text" name="laminar_logs[{{ $day }}][remarks]" class="form-control"></td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>

        <div id="hot-air-oven-temperature-monitoring-log" class="main inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/MIC/003</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Hot Air Oven Temperature Monitoring log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitOvenTemperatureLog()">Submit</button>
                </div>
            </div>

            <div class="mt-3 mb-3">
                <button type="button" class="button" onclick="goBack(this)">
                    <svg class="svgIcon" viewBox="0 0 384 512">
                        <path
                            d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"
                            transform="rotate(-90, 192, 256)"></path>
                    </svg>
                </button>
            </div>

            <div class="row tableHeader">
                <div class="col-md-4">
                    <label>Month/Year: </label>
                    <input type="month" id="monthYear33" name="month_year" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label>Instrument Id/No.: </label>
                    <select id="ovenId33" name="oven_id" class="form-control" required>
                        <option value="">Select Instrument</option>
                        @foreach($instruments as $oven)
                            <option value="{{ $oven->id }}">{{ $oven->instrument_id }} - {{ $oven->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="table-responsive mt-4">
                <table class="stock-planner-table">
                    <thead>
                        <tr>
                            <th rowspan="2">Date</th>
                            <th colspan="2">Morning</th>
                            <th colspan="2">Evening</th>
                        </tr>
                        <tr>
                            <th>Temperature</th>
                            <th>Signature</th>
                            <th>Temperature</th>
                            <th>Signature</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>17</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>18</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>19</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>20</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>21</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>22</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>23</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>24</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>25</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>26</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>27</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>28</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>29</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>30</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>31</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                    </tbody>

                </table>
            </div>

        </div>
        <div id="hot-air-oven-maintenance-log" class="main inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/MIC/004</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Hot Air Oven Maintenance Log </strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitOvenMaintenanceLogNew()">Submit</button>
                </div>
            </div>
            <!-- Back Button -->
            <div class="mt-3 mb-3 ">
                <button class="button" onclick="goBack(this)">
                    <svg class="svgIcon" viewBox="0 0 384 512">
                        <path
                            d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"
                            transform="rotate(-90, 192, 256)"></path>
                    </svg>
                </button>
            </div>

            <div class="row tableHeader">
                <div class="col-md-4">
                    <label>Department: </label>
                    <input type="text" id="department4" placeholder="Department">
                </div>
                <div class="col-md-4">
                    <label>Month/Year: </label>
                    <input type="month" id="maintenance_month4" onchange="fetchOvenMaintenanceLog()">
                </div>
                <div class="col-md-4">
                    <label>Oven Id/No.: </label>
                    <select id="equipment_id4" class="form-control" onchange="fetchOvenMaintenanceLog()">
                        <option value="">Select Equipment</option>
                        @foreach($instruments as $instrument)
                            <option value="{{ $instrument->instrument_id }}">
                                {{ $instrument->instrument_id }} - {{ $instrument->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="table-responsive mt-4">
                <table class="stock-planner-table" id="oven-maintenance-logs1">
                    <thead>
                        <tr>
                            <th>Maintenance Task</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                            <th>8</th>
                            <th>9</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                            <th>14</th>
                            <th>15</th>
                            <th>16</th>
                            <th>17</th>
                            <th>18</th>
                            <th>19</th>
                            <th>20</th>
                            <th>21</th>
                            <th>22</th>
                            <th>23</th>
                            <th>24</th>
                            <th>25</th>
                            <th>26</th>
                            <th>27</th>
                            <th>28</th>
                            <th>29</th>
                            <th>30</th>
                            <th>31</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Rows will be added dynamically -->
                    </tbody>
                </table>
            </div>

        </div>

        <div id="incubator-temperature-monitoring-log" class="main  inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/MIC/005</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Incubator Temperature Monitoring Log </strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="form16()">Submit</button>
                </div>
            </div>
            <!-- Back Button -->
            <div class="mt-3 mb-3 ">
                <button class="button" onclick="goBack(this)">
                    <svg class="svgIcon" viewBox="0 0 384 512">
                        <path
                            d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"
                            transform="rotate(-90, 192, 256)"></path>
                    </svg>
                </button>
            </div>

            <div class="row tableHeader">
                <div class="col-md-4">
                    <label>Month/Year: </label><input type="date" id="monthYear16">
                </div>
                <div class="col-md-4">
                    <label>Instrument: </label>
                    <select id="instrumentId16" class="form-control">
                        <option value="">Loading instruments...</option>
                    </select>
                </div>
            </div>
            <div class="table-responsive mt-4">
                <table class="stock-planner-table">
                    <thead>
                        <tr>
                            <th rowspan="2">Date</th>
                            <th colspan="2">Morning</th>
                            <th colspan="2">Evening</th>
                        </tr>
                        <tr>
                            <th>Temperature</th>
                            <th>Signature</th>
                            <th>Temperature</th>
                            <th>Signature</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>17</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>18</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>19</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>20</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>21</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>22</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>23</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>24</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>25</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>26</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>27</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>28</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>29</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>30</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                        <tr>
                            <td>31</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>
                    </tbody>

                </table>
            </div>

        </div>
        <div id="incubator-maintenance-log" class="main inactive">
            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/MIC/006</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Incubator Maintenance Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitIncubatorMaintenanceLog()">Submit</button>
                </div>
            </div>

            <!-- Back Button -->
            <div class="mt-3 mb-3">
                <button class="button" onclick="goBack(this)">
                    <svg class="svgIcon" viewBox="0 0 384 512">
                        <path
                            d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"
                            transform="rotate(-90, 192, 256)"></path>
                    </svg>
                </button>
            </div>

            <div class="row tableHeader">
                <div class="col-md-4">
                    <label>Department: </label>
                    <input type="text" id="incubator_department" placeholder="Department" required>
                </div>
                <div class="col-md-4">
                    <label>Month/Year: </label>
                    <input type="month" id="incubator_month_year" onchange="fetchIncubatorMaintenanceData()" required>
                </div>
                <div class="col-md-4">
                    <label>Instrument Id: </label>
                    <select id="incubator_instrument_id" class="form-control" onchange="fetchIncubatorMaintenanceData()"
                        required>
                        <option value="">Select Instrument</option>
                        @foreach($instruments as $instrument)
                            <option value="{{ $instrument->id }}">{{ $instrument->instrument_id }} - {{ $instrument->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="table-responsive mt-4">
                <table class="stock-planner-table" id="incubator-maintenance-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Cleaning from outside</th>
                            <th>Cleaning from Inside</th>
                            <th>Temperature check</th>
                            <th>Check power On with Light</th>
                            <th>Scientific officer Signature</th>
                            <th>Supervisor Signature</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($day = 1; $day <= 31; $day++)
                            <tr data-day="{{ $day }}">
                                <td>{{ $day }}</td>
                                <td contenteditable="true" data-field="cleaning_outside"></td>
                                <td contenteditable="true" data-field="cleaning_inside"></td>
                                <td contenteditable="true" data-field="temperature_check"></td>
                                <td contenteditable="true" data-field="power_check"></td>
                                <td contenteditable="true" data-field="scientific_signature"></td>
                                <td contenteditable="true" data-field="supervisor_signature"></td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
        <div id="bact-alert-maintenance-log" class="main inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/MIC/008</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Bact Alert Maintenance Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submit8()">Submit</button>
                </div>
            </div>
            <!-- Back Button -->
            <div class="mt-3 mb-3 ">
                <button class="button" onclick="goBack(this)">
                    <svg class="svgIcon" viewBox="0 0 384 512">
                        <path
                            d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"
                            transform="rotate(-90, 192, 256)"></path>
                    </svg>
                </button>
            </div>


            <div class="row tableHeader">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Month/Year:</label>
                    <input type="month" class="form-control" id="monthYearInput8" onchange="fetchLog8()">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Instrument:</label>
                    <select id="instrumentSelect8" class="form-select" onchange="fetchLog8()">
                        <option value="">Select Instrument</option>
                        @foreach($instruments as $instrument)
                            <option value="{{ $instrument->instrument_id }}">{{ $instrument->instrument_id }}
                                ({{ $instrument->name }})
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="table-responsive">
                <table class="stock-planner-table" id="logTable8">
                    <thead>

                        <tr>
                            <th>Day</th>
                            <!-- Days 1 to 31 -->
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                            <th>8</th>
                            <th>9</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                            <th>14</th>
                            <th>15</th>
                            <th>16</th>
                            <th>17</th>
                            <th>18</th>
                            <th>19</th>
                            <th>20</th>
                            <th>21</th>
                            <th>22</th>
                            <th>23</th>
                            <th>24</th>
                            <th>25</th>
                            <th>26</th>
                            <th>27</th>
                            <th>28</th>
                            <th>29</th>
                            <th>30</th>
                            <th>31</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>

                </table>
            </div>

        </div>

        <div id="vitek-2-maintenance-log" class="main inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/MIC/009</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Vitek 2 Maintenance Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submit9()">Submit</button>
                </div>
            </div>
            <!-- Back Button -->
            <div class="mt-3 mb-3 ">
                <button class="button" onclick="goBack(this)">
                    <svg class="svgIcon" viewBox="0 0 384 512">
                        <path
                            d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"
                            transform="rotate(-90, 192, 256)"></path>
                    </svg>
                </button>
            </div>



            <div class="row tableHeader">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Month/Year:</label>
                    <input type="month" class="form-control" id="monthYearInput9" onchange="fetchLog9()">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Instrument:</label>
                    <select id="instrumentSelect9" class="form-select" onchange="fetchLog9()">
                        <option value="">Select Instrument</option>
                        @foreach($instruments as $instrument)
                            <option value="{{ $instrument->instrument_id }}">{{ $instrument->instrument_id }}
                                ({{ $instrument->name }})
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="table-responsive">
                <table class="stock-planner-table" id="logTable9">
                    <thead>

                        <tr>
                            <th>Day</th>
                            <!-- Days 1 to 31 -->
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                            <th>8</th>
                            <th>9</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                            <th>14</th>
                            <th>15</th>
                            <th>16</th>
                            <th>17</th>
                            <th>18</th>
                            <th>19</th>
                            <th>20</th>
                            <th>21</th>
                            <th>22</th>
                            <th>23</th>
                            <th>24</th>
                            <th>25</th>
                            <th>26</th>
                            <th>27</th>
                            <th>28</th>
                            <th>29</th>
                            <th>30</th>
                            <th>31</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>

                </table>
            </div>

        </div>

        <div id="autoclave-maintenance-log" class="main inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/MIC/010</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Autoclave Maintenance Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submit10()">Submit</button>
                </div>
            </div>
            <!-- Back Button -->
            <div class="mt-3 mb-3 ">
                <button class="button" onclick="goBack(this)">
                    <svg class="svgIcon" viewBox="0 0 384 512">
                        <path
                            d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"
                            transform="rotate(-90, 192, 256)"></path>
                    </svg>
                </button>
            </div>



            <div class="row tableHeader">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Month/Year:</label>
                    <input type="month" class="form-control" id="monthYearInput10" onchange="fetchLog10()">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Instrument:</label>
                    <select id="instrumentSelect10" class="form-select" onchange="fetchLog10()">
                        <option value="">Select Instrument</option>
                        @foreach($instruments as $instrument)
                            <option value="{{ $instrument->instrument_id }}">{{ $instrument->instrument_id }}
                                ({{ $instrument->name }})
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="table-responsive">
                <table class="stock-planner-table" id="logTable10">
                    <thead>

                        <tr>
                            <th>Day</th>
                            <!-- Days 1 to 31 -->
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                            <th>8</th>
                            <th>9</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                            <th>14</th>
                            <th>15</th>
                            <th>16</th>
                            <th>17</th>
                            <th>18</th>
                            <th>19</th>
                            <th>20</th>
                            <th>21</th>
                            <th>22</th>
                            <th>23</th>
                            <th>24</th>
                            <th>25</th>
                            <th>26</th>
                            <th>27</th>
                            <th>28</th>
                            <th>29</th>
                            <th>30</th>
                            <th>31</th>
                        </tr>
                    </thead>
                    <tbody>


                    </tbody>

                </table>
            </div>

        </div>
        <div id="autoclave-chemical-indicator-monitoring-log" class="main inactive">
            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/MIC/011</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Autoclave Chemical Indicator Monitoring Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitAutoclaveChemicalLog()">Submit</button>
                </div>
            </div>

            <!-- Back Button -->
            <div class="mt-3 mb-3">
                <button class="button" onclick="goBack(this)">
                    <svg class="svgIcon" viewBox="0 0 384 512">
                        <path
                            d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"
                            transform="rotate(-90, 192, 256)"></path>
                    </svg>
                </button>
            </div>

            <div class="row tableHeader">
                <div class="col-md-4">
                    <label>Department: </label>
                    <input type="text" id="autoclave_department" placeholder="Department" required>
                </div>
                <div class="col-md-4">
                    <label>Month/Year: </label>
                    <input type="month" id="autoclave_month_year" onchange="fetchAutoclaveChemicalData()" required>
                </div>
                <div class="col-md-4">
                    <label>Instrument Sr No.: </label>
                    <select id="autoclave_instrument_id" class="form-control" onchange="fetchAutoclaveChemicalData()"
                        required>
                        <option value="">Select Instrument</option>
                        @foreach($instruments as $instrument)
                            <option value="{{ $instrument->id }}">{{ $instrument->instrument_id }} - {{ $instrument->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="table-responsive">
                <table class="stock-planner-table" id="autoclave-chemical-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Chemical Indicator Strip</th>
                            <th>Start Time</th>
                            <th>Pressure</th>
                            <th>Holding Time</th>
                            <th>Stop Time</th>
                            <th>Technical Staff Signature</th>
                            <th>Verified By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Rows will be added dynamically -->
                    </tbody>
                </table>
                <button class="btn btn-primary m-1" onclick="addAutoclaveChemicalRow()">+ Add Row</button>
            </div>
        </div>
        <div id="autoclave-biological-indicator-monitoring-log" class="main inactive">
            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/MIC/012</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Autoclave Biological Indicator Monitoring
                            Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitAutoclaveBiologicalLog()">Submit</button>
                </div>
            </div>

            <!-- Back Button -->
            <div class="mt-3 mb-3">
                <button class="button" onclick="goBack(this)">
                    <svg class="svgIcon" viewBox="0 0 384 512">
                        <path
                            d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"
                            transform="rotate(-90, 192, 256)"></path>
                    </svg>
                </button>
            </div>

            <div class="row tableHeader">
                <div class="col-md-4">
                    <label>Department: </label>
                    <input type="text" id="autoclave_bio_department" placeholder="Department" required>
                </div>
                <div class="col-md-4">
                    <label>Month/Year: </label>
                    <input type="month" id="autoclave_bio_month_year" onchange="fetchAutoclaveBiologicalData()" required>
                </div>
                <div class="col-md-4">
                    <label>Instrument Sr No.: </label>
                    <select id="autoclave_bio_instrument_id" class="form-control" onchange="fetchAutoclaveBiologicalData()"
                        required>
                        <option value="">Select Instrument</option>
                        @foreach($instruments as $instrument)
                            <option value="{{ $instrument->id }}">{{ $instrument->instrument_id }} - {{ $instrument->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="table-responsive">
                <table class="stock-planner-table" id="autoclave-biological-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Biological Indicator</th>
                            <th>Start Time</th>
                            <th>Pressure</th>
                            <th>Holding Time</th>
                            <th>Stop Time</th>
                            <th>Technical Staff Signature</th>
                            <th>Verified By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Rows will be added dynamically -->
                    </tbody>
                </table>
                <button class="btn btn-primary m-1" onclick="addAutoclaveBiologicalRow()">+ Add Row</button>
            </div>
        </div>
    </body>


    <script>
        //-----------------------------4
        document.addEventListener('DOMContentLoaded', function () {
            initializeOvenMaintenance4Table();
        });

        // Initialize table with maintenance tasks
        function initializeOvenMaintenance4Table() {
            const tasks = [
                "Cleaning from outside",
                "Cleaning from Inside with Isopropyl Alcohol",
                "Temperature check",
                "Check power ON with Light",

                "Lab Staff Signature",
                "Lab Supervisor Signature",
            ];

            const tbody = document.querySelector('#oven-maintenance-logs1 tbody');
            tbody.innerHTML = '';

            tasks.forEach(task => {
                const row = document.createElement('tr');
                const taskCell = document.createElement('td');
                taskCell.textContent = task;
                row.appendChild(taskCell);

                // Add 31 cells for each day of the month
                for (let i = 1; i <= 31; i++) {
                    const dayCell = document.createElement('td');
                    dayCell.setAttribute('contenteditable', 'true');
                    dayCell.setAttribute('data-day', i);
                    row.appendChild(dayCell);
                }

                tbody.appendChild(row);
            });
        }

        // Fetch maintenance data when month/year and equipment ID are selected


        function fetchOvenMaintenanceLog() {
            const monthInput = document.getElementById('maintenance_month4');
            const equipmentSelect = document.getElementById('equipment_id4');
            const equipmentId = equipmentSelect.value;

            if (!monthInput.value || !equipmentId) {
                return;
            }

            console.log('Fetching data for:', monthInput.value, equipmentId);

            const tbody = document.querySelector('#oven-maintenance-logs1 tbody');
            tbody.innerHTML = '<tr><td colspan="32" class="text-center">Loading data...</td></tr>';

            fetch(`/fetchMicro4?month=${monthInput.value}&equipment_id=${equipmentId}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
            })
                .then(response => {
                    console.log('Response status:', response.status);
                    if (!response.ok) {
                        return response.json().then(errData => {
                            throw new Error(errData.message || `HTTP error! status: ${response.status}`);
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Received data:', data);
                    if (data.success) {
                        if (data.data && data.data.length > 0) {
                            populateOvenMaintenanceTable(data.data);
                            if (data.data[0].department) {
                                document.getElementById('department4').value = data.data[0].department;
                            }
                        } else {
                            initializeOvenMaintenance4Table();
                            alert('No maintenance records found for selected criteria');
                        }
                    } else {
                        throw new Error(data.message || 'Failed to fetch data');
                    }
                })
                .catch(error => {
                    console.error('Fetch Error:', error);
                    initializeOvenMaintenance4Table();
                    alert('Error loading maintenance data: ' + error.message);
                });
        }

        // Populate table with maintenance data
        function populateOvenMaintenanceTable(logs) {
            const tbody = document.querySelector('#oven-maintenance-logs1 tbody');
            tbody.innerHTML = '';

            console.log('Populating table with:', logs); // Debug log

            // Create a map of tasks to their day data
            const taskMap = new Map();

            logs.forEach(log => {
                if (!taskMap.has(log.task)) {
                    taskMap.set(log.task, {});
                }
                const taskData = taskMap.get(log.task);

                // Merge days_data into the task's data
                Object.entries(log.days_data || {}).forEach(([day, value]) => {
                    if (value) { // Only add if value exists
                        taskData[day] = value;
                    }
                });
            });

            // Create rows for each task
            taskMap.forEach((daysData, task) => {
                const row = document.createElement('tr');

                // Task name cell
                const taskCell = document.createElement('td');
                taskCell.textContent = task;
                row.appendChild(taskCell);

                // Create cells for each day (1-31)
                for (let day = 1; day <= 31; day++) {
                    const dayCell = document.createElement('td');
                    dayCell.setAttribute('contenteditable', 'true');
                    dayCell.setAttribute('data-day', day);

                    // Set cell value if data exists for this day
                    const dayKey = `day_${day}`;
                    dayCell.textContent = daysData[dayKey] || '';

                    row.appendChild(dayCell);
                }

                tbody.appendChild(row);
            });

            console.log('Table populated successfully'); // Debug log
        }

        function submitOvenMaintenanceLogNew() {
            const monthInput = document.getElementById('maintenance_month4');
            const equipmentSelect = document.getElementById('equipment_id4');
            const departmentInput = document.getElementById('department4');

            const monthYear = monthInput.value;
            const equipmentId = equipmentSelect.value;
            const department = departmentInput.value;

            // Client-side validation
            if (!monthYear || !equipmentId || !department) {
                alert('Please fill all required fields');
                return;
            }

            const rows = document.querySelectorAll('#oven-maintenance-logs1 tbody tr');
            const logs = [];

            rows.forEach(row => {
                const task = row.cells[0].textContent.trim();
                const daysData = {};

                for (let i = 1; i <= 31; i++) {
                    const dayCell = row.cells[i];
                    const value = dayCell.textContent.trim();
                    if (value) {
                        daysData[`day_${i}`] = value;
                    }
                }

                if (Object.keys(daysData).length > 0) {
                    logs.push({
                        month_year: monthYear,
                        equipment_id: equipmentId,
                        department: department,
                        task: task,
                        days_data: daysData
                    });
                }
            });

            if (logs.length === 0) {
                alert('No data to save! Please enter maintenance records.');
                return;
            }

            // Debug the payload
            console.log('Final payload:', { logs: logs });

            const submitBtn = document.querySelector('button[onclick="submitOvenMaintenanceLogNew()"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch('/storeMicro4', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({ logs: logs })
            })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(errData => {
                            console.error('Server validation errors:', errData);
                            throw new Error(errData.message || 'Validation failed');
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;

                    if (data.success) {
                        alert('Maintenance log saved successfully!');
                        fetchOvenMaintenanceLog();
                    } else {
                        throw new Error(data.message || 'Failed to save data');
                    }
                })
                .catch(error => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                    console.error('Error:', error);
                    alert('Error: ' + error.message);
                });
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Set current month as default
            const currentDate = new Date();
            document.getElementById('monthYear1').value = currentDate.toISOString().slice(0, 7);

            // Load data when cabinet or month changes
            document.getElementById('cabinetId1').addEventListener('change', fetchMaintenanceData);
            document.getElementById('monthYear1').addEventListener('change', fetchMaintenanceData);
        });

        function fetchMaintenanceData() {
            const cabinetId = document.getElementById('cabinetId1').value;
            const monthYear = document.getElementById('monthYear1').value;

            if (!cabinetId || !monthYear) {
                return;
            }

            fetch(`/bio-safety-maintenance/fetch?month_year=${monthYear}&cabinet_id=${cabinetId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Clear all inputs first
                        clearForm();

                        if (data.department) {
                            document.getElementById('department1').value = data.department;
                        }

                        if (data.logs && data.logs.length > 0) {
                            data.logs.forEach(log => {
                                const day = new Date(log.log_date).getDate();
                                const row = document.querySelector(`tr[data-day="${day}"]`);

                                if (row) {
                                    row.querySelector(`input[name="logs[${day}][clean_with_alcohol]"]`).checked = log.clean_with_alcohol;
                                    row.querySelector(`input[name="logs[${day}][uv_light]"]`).checked = log.uv_light;
                                    row.querySelector(`input[name="logs[${day}][manometer_reading]"]`).value = log.manometer_reading || '';
                                    row.querySelector(`input[name="logs[${day}][done_by_sign]"]`).value = log.done_by_sign || '';
                                    row.querySelector(`input[name="logs[${day}][hypo_container_available]"]`).checked = log.hypo_container_available;
                                    row.querySelector(`input[name="logs[${day}][settle_plate_test_date]"]`).value = log.settle_plate_test_date || '';
                                    row.querySelector(`input[name="logs[${day}][uv_efficacy]"]`).checked = log.uv_efficacy;
                                    row.querySelector(`input[name="logs[${day}][checked_by_sign]"]`).value = log.checked_by_sign || '';
                                    row.querySelector(`input[name="logs[${day}][remarks]"]`).value = log.remarks || '';

                                    // Handle settle plate results (split if needed)
                                    if (log.settle_plate_results) {
                                        const results = log.settle_plate_results.split('/');
                                        row.querySelector(`input[name="logs[${day}][settle_plate_results_1]"]`).value = results[0] || '';
                                        if (results.length > 1) {
                                            row.querySelector(`input[name="logs[${day}][settle_plate_results_2]"]`).value = results[1] || '';
                                        }
                                    }
                                }
                            });
                        }
                    } else {
                        console.error('Error:', data.message);
                        alert('Error fetching data: ' + (data.message || 'Unknown error'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error fetching data');
                });
        }

        function clearForm() {
            document.getElementById('department1').value = '';

            document.querySelectorAll('#maintenanceTable input').forEach(input => {
                if (input.type === 'checkbox') {
                    input.checked = false;
                } else {
                    input.value = '';
                }
            });
        }

        function submitBioSafetyLog() {
            const formData = {
                department: document.getElementById('department1').value,
                month_year: document.getElementById('monthYear1').value,
                cabinet_id: document.getElementById('cabinetId1').value,
                logs: []
            };

            // Collect data for each day
            for (let day = 1; day <= 31; day++) {
                const row = document.querySelector(`tr[data-day="${day}"]`);
                if (!row) continue;

                const logData = {
                    date: `${formData.month_year}-${day.toString().padStart(2, '0')}`,
                    clean_with_alcohol: row.querySelector(`input[name="logs[${day}][clean_with_alcohol]"]`).checked,
                    uv_light: row.querySelector(`input[name="logs[${day}][uv_light]"]`).checked,
                    manometer_reading: row.querySelector(`input[name="logs[${day}][manometer_reading]"]`).value,
                    done_by_sign: row.querySelector(`input[name="logs[${day}][done_by_sign]"]`).value,
                    hypo_container_available: row.querySelector(`input[name="logs[${day}][hypo_container_available]"]`).checked,
                    settle_plate_test_date: row.querySelector(`input[name="logs[${day}][settle_plate_test_date]"]`).value,
                    settle_plate_results: [
                        row.querySelector(`input[name="logs[${day}][settle_plate_results_1]"]`).value,
                        row.querySelector(`input[name="logs[${day}][settle_plate_results_2]"]`).value
                    ].filter(Boolean).join('/'),
                    uv_efficacy: row.querySelector(`input[name="logs[${day}][uv_efficacy]"]`).checked,
                    checked_by_sign: row.querySelector(`input[name="logs[${day}][checked_by_sign]"]`).value,
                    remarks: row.querySelector(`input[name="logs[${day}][remarks]"]`).value,
                };

                formData.logs.push(logData);
            }

            fetch('/bio-safety-maintenance/store', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(formData)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Maintenance logs saved successfully!');
                    } else {
                        let errorMessage = 'Failed to save data';
                        if (data.errors) {
                            errorMessage += ': ' + Object.values(data.errors).join(', ');
                        } else if (data.message) {
                            errorMessage += ': ' + data.message;
                        }
                        alert(errorMessage);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while saving the data.');
                });
        }


        //2nd form-control

        document.addEventListener('DOMContentLoaded', function () {
            // Set current month as default
            const currentDate = new Date();
            document.getElementById('laminar_month_year').value = currentDate.toISOString().slice(0, 7);

            // Load data when cabinet or month changes
            document.getElementById('laminar_cabinet_id').addEventListener('change', fetchLaminarMaintenanceData);
            document.getElementById('laminar_month_year').addEventListener('change', fetchLaminarMaintenanceData);
        });

        function fetchLaminarMaintenanceData() {
            const cabinetId = document.getElementById('laminar_cabinet_id').value;
            const monthYear = document.getElementById('laminar_month_year').value;

            if (!cabinetId || !monthYear) {
                return;
            }

            fetch(`/bio-safety-maintenance-two/fetch?month_year=${monthYear}&cabinet_id=${cabinetId}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        // Clear all inputs first
                        clearLaminarForm();

                        if (data.department) {
                            document.getElementById('laminar_department').value = data.department;
                        }

                        if (data.logs && data.logs.length > 0) {
                            data.logs.forEach(log => {
                                const day = new Date(log.log_date).getDate();
                                const row = document.querySelector(`#laminar-maintenance-table tr[data-day="${day}"]`);

                                if (row) {
                                    row.querySelector(`input[name="laminar_logs[${day}][clean_with_alcohol]"]`).checked = log.clean_with_alcohol;
                                    row.querySelector(`input[name="laminar_logs[${day}][uv_light]"]`).checked = log.uv_light;
                                    row.querySelector(`input[name="laminar_logs[${day}][manometer_reading]"]`).value = log.manometer_reading || '';
                                    row.querySelector(`input[name="laminar_logs[${day}][done_by_sign]"]`).value = log.done_by_sign || '';
                                    row.querySelector(`input[name="laminar_logs[${day}][hypo_container_available]"]`).checked = log.hypo_container_available;
                                    row.querySelector(`input[name="laminar_logs[${day}][settle_plate_test_date]"]`).value = log.settle_plate_test_date || '';
                                    row.querySelector(`input[name="laminar_logs[${day}][uv_efficacy]"]`).checked = log.uv_efficacy;
                                    row.querySelector(`input[name="laminar_logs[${day}][checked_by_sign]"]`).value = log.checked_by_sign || '';
                                    row.querySelector(`input[name="laminar_logs[${day}][remarks]"]`).value = log.remarks || '';

                                    // Handle settle plate results (split if needed)
                                    if (log.settle_plate_results) {
                                        const results = log.settle_plate_results.split('/');
                                        row.querySelector(`input[name="laminar_logs[${day}][settle_plate_results_1]"]`).value = results[0] || '';
                                        if (results.length > 1) {
                                            row.querySelector(`input[name="laminar_logs[${day}][settle_plate_results_2]"]`).value = results[1] || '';
                                        }
                                    }
                                }
                            });
                        }
                    } else {
                        console.error('Error:', data.message);
                        alert('Error fetching data: ' + (data.message || 'Unknown error'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error fetching data');
                });
        }

        function clearLaminarForm() {
            document.getElementById('laminar_department').value = '';

            document.querySelectorAll('#laminar-maintenance-table input').forEach(input => {
                if (input.type === 'checkbox') {
                    input.checked = false;
                } else {
                    input.value = '';
                }
            });
        }

        function submitLaminarMaintenanceLog() {
            const formData = {
                department: document.getElementById('laminar_department').value,
                month_year: document.getElementById('laminar_month_year').value,
                cabinet_id: document.getElementById('laminar_cabinet_id').value,
                logs: []
            };

            // Validate required fields
            if (!formData.department || !formData.month_year || !formData.cabinet_id) {
                alert('Please fill all required fields (Department, Month/Year, and Equipment)');
                return;
            }

            // Collect data for each day
            for (let day = 1; day <= 31; day++) {
                const row = document.querySelector(`#laminar-maintenance-table tr[data-day="${day}"]`);
                if (!row) continue;

                // Format date as YYYY-MM-DD
                const formattedDate = `${formData.month_year}-${day.toString().padStart(2, '0')}`;

                const logData = {
                    date: formattedDate, // Changed from log_date to date to match validation
                    clean_with_alcohol: row.querySelector(`input[name="laminar_logs[${day}][clean_with_alcohol]"]`).checked,
                    uv_light: row.querySelector(`input[name="laminar_logs[${day}][uv_light]"]`).checked,
                    manometer_reading: row.querySelector(`input[name="laminar_logs[${day}][manometer_reading]"]`).value,
                    done_by_sign: row.querySelector(`input[name="laminar_logs[${day}][done_by_sign]"]`).value,
                    hypo_container_available: row.querySelector(`input[name="laminar_logs[${day}][hypo_container_available]"]`).checked,
                    settle_plate_test_date: row.querySelector(`input[name="laminar_logs[${day}][settle_plate_test_date]"]`).value,
                    settle_plate_results: [
                        row.querySelector(`input[name="laminar_logs[${day}][settle_plate_results_1]"]`).value,
                        row.querySelector(`input[name="laminar_logs[${day}][settle_plate_results_2]"]`).value
                    ].filter(Boolean).join('/'),
                    uv_efficacy: row.querySelector(`input[name="laminar_logs[${day}][uv_efficacy]"]`).checked,
                    checked_by_sign: row.querySelector(`input[name="laminar_logs[${day}][checked_by_sign]"]`).value,
                    remarks: row.querySelector(`input[name="laminar_logs[${day}][remarks]"]`).value,
                };

                formData.logs.push(logData);
            }

            // Debug the payload before sending
            console.log('Form data being sent:', formData);

            // Show loading state
            const submitBtn = document.querySelector('button[onclick="submitLaminarMaintenanceLog()"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch('/bio-safety-maintenance/store/two', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(formData)
            })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(errData => {
                            throw new Error(errData.message || JSON.stringify(errData.errors) || 'Request failed');
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;

                    if (data.success) {
                        alert('Maintenance logs saved successfully!');
                    } else {
                        let errorMessage = 'Failed to save data';
                        if (data.errors) {
                            errorMessage += ': ' + Object.values(data.errors).join(', ');
                        } else if (data.message) {
                            errorMessage += ': ' + data.message;
                        }
                        throw new Error(errorMessage);
                    }
                })
                .catch(error => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                    console.error('Error:', error);
                    alert('Error: ' + error.message);
                });
        }


        // document.addEventListener('DOMContentLoaded', function () {
        //     // Set current month as default
        //     const currentDate = new Date();
        //     const monthYearInput = document.getElementById('monthYear3');
        //     if (monthYearInput) {
        //         monthYearInput.value = currentDate.toISOString().slice(0, 7);
        //     }

        //     // Load data when oven or month changes
        //     const ovenSelect = document.getElementById('ovenId');
        //     if (ovenSelect) {
        //         ovenSelect.addEventListener('change', fetchTemperatureData);
        //     }

        //     const monthYearSelect = document.getElementById('monthYear3');
        //     if (monthYearSelect) {
        //         monthYearSelect.addEventListener('change', fetchTemperatureData);
        //     }
        // });


        function clearForm() {
            const inputs = document.querySelectorAll('#temperatureTable input');
            inputs.forEach(input => {
                input.value = '';
            });
        }


        function goBack() {
            window.history.back();
        }





        //--------------------/4




    </script>
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

        function biosafetyLog() {
            alert("Form Data Submitted");
            location.reload();
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            initializeTable8();
        });

        function initializeTable8() {
            const tasks = [
                "Clean Outer Cover",
                "Clean Monitor",
                "Check Temp 37 'C ",
                "Check for error 60 and calibrate cells flagged 60.",
                "Signature of the Technician",
                "Signature of HOD",

            ];

            const tbody = document.querySelector('#logTable8 tbody');
            tbody.innerHTML = '';

            tasks.forEach(task => {
                const row = document.createElement('tr');
                const taskCell = document.createElement('td');
                taskCell.textContent = task;
                row.appendChild(taskCell);

                // Add 31 cells for each day of the month
                for (let i = 1; i <= 31; i++) {
                    const dayCell = document.createElement('td');
                    dayCell.setAttribute('contenteditable', 'true');
                    dayCell.setAttribute('data-day', i);
                    row.appendChild(dayCell);
                }

                tbody.appendChild(row);
            });
        }

        function fetchLog8() {
            const monthInput = document.getElementById('monthYearInput8');
            const equipmentSelect = document.getElementById('instrumentSelect8');
            const equipmentId = equipmentSelect.value;

            if (!monthInput.value || !equipmentId) {
                // Don't show alert here as it might trigger during initial selection
                return;
            }

            console.log('Fetching data for:', monthInput.value, equipmentId);

            const tbody = document.querySelector('#logTable8 tbody');
            tbody.innerHTML = '<tr><td colspan="32" class="text-center">Loading data...</td></tr>';

            fetch(`/fetchMicro8?month=${monthInput.value}&equipment_id=${equipmentId}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
            })
                .then(response => {
                    console.log('Response status:', response.status); // Debug log
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Received data:', data); // Debug log
                    if (data.success) {
                        if (data.data && data.data.length > 0) {
                            populateMaintenanceTable8(data.data);
                            // Update department if it exists in the first record
                            // if (data.data[0].department) {
                            //     document.getElementById('department2').value = data.data[0].department;
                            // }
                        } else {
                            initializeTable8();
                            alert('No maintenance records found for selected criteria');
                        }
                    } else {
                        throw new Error(data.message || 'Failed to fetch data');
                    }
                })
                .catch(error => {
                    console.error('Fetch Error:', error);
                    initializeTable8();
                    alert('Error loading maintenance data: ' + error.message);
                });
        }
        // Populate table with maintenance data
        function populateMaintenanceTable8(logs) {
            const tbody = document.querySelector('#logTable8 tbody');
            tbody.innerHTML = '';

            console.log('Populating table with:', logs); // Debug log

            // Create a map of tasks to their day data
            const taskMap = new Map();

            logs.forEach(log => {
                if (!taskMap.has(log.task)) {
                    taskMap.set(log.task, {});
                }
                const taskData = taskMap.get(log.task);

                // Merge days_data into the task's data
                Object.entries(log.days_data || {}).forEach(([day, value]) => {
                    if (value) { // Only add if value exists
                        taskData[day] = value;
                    }
                });
            });

            // Create rows for each task
            taskMap.forEach((daysData, task) => {
                const row = document.createElement('tr');

                // Task name cell
                const taskCell = document.createElement('td');
                taskCell.textContent = task;
                row.appendChild(taskCell);

                // Create cells for each day (1-31)
                for (let day = 1; day <= 31; day++) {
                    const dayCell = document.createElement('td');
                    dayCell.setAttribute('contenteditable', 'true');
                    dayCell.setAttribute('data-day', day);

                    // Set cell value if data exists for this day
                    const dayKey = `day_${day}`;
                    dayCell.textContent = daysData[dayKey] || '';

                    row.appendChild(dayCell);
                }

                tbody.appendChild(row);
            });

            console.log('Table populated successfully'); // Debug log
        }

        // Submit maintenance form
        function submit8() {
            const monthInput = document.getElementById('monthYearInput8');
            const equipmentSelect = document.getElementById('instrumentSelect8');
            const equipmentId = equipmentSelect.value;
            //const department = document.getElementById('department2').value;

            if (!monthInput.value || !equipmentId) {
                alert('Please select a month/year, select equipment ');
                return;
            }


            const rows = document.querySelectorAll('#logTable8 tbody tr');
            const logs = [];
            const monthYear = monthInput.value;

            rows.forEach(row => {
                const task = row.cells[0].textContent.trim();
                const daysData = {};

                // Collect data for each day (1-31)
                for (let i = 1; i <= 31; i++) {
                    const dayCell = row.cells[i];
                    const value = dayCell.textContent.trim();
                    if (value) {
                        daysData[`day_${i}`] = value;
                    }
                }

                // Only add if there's data for at least one day
                if (Object.keys(daysData).length > 0) {
                    logs.push({
                        month_year: monthYear,
                        equipment_id: equipmentId,
                        // department: department,
                        task: task,
                        days_data: daysData
                    });
                }
            });

            if (logs.length === 0) {
                alert('No data to save! Please enter maintenance records.');
                return;
            }

            // Show loading state
            const submitBtn = document.querySelector('button[onclick="submit8()"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch('/storeMicro8', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({ logs: logs })
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;

                    if (data.success) {
                        alert('Maintenance log saved successfully!');
                        fetchLog8(); // Refresh the data
                    } else {
                        throw new Error(data.message || 'Failed to save data');
                    }
                })
                .catch(error => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                    console.error('Error:', error);
                    alert('Error saving maintenance log: ' + error.message);
                });
        }










        ///////////////9999999999999999
        document.addEventListener('DOMContentLoaded', function () {
            initializeTable9();
        });

        function initializeTable9() {
            const tasks = [
                "Clean Carousel",
                "Clean Optics",
                "Clean Cassettes ",
                "Clean Waste bin",
                "Clean filler Seal",
                "Clean filler Station",

                "Perform Daily",
                "Densi-check calibration",
                "Sterility check/Autoclave only dispenser if contaminated",
                "Check Instrument Status Daily",
                "Carousel temperature",
                "Cabin temperature",
                "Optics self-test",


            ];

            const tbody = document.querySelector('#logTable9 tbody');
            tbody.innerHTML = '';

            tasks.forEach(task => {
                const row = document.createElement('tr');
                const taskCell = document.createElement('td');
                taskCell.textContent = task;
                row.appendChild(taskCell);

                // Add 31 cells for each day of the month
                for (let i = 1; i <= 31; i++) {
                    const dayCell = document.createElement('td');
                    dayCell.setAttribute('contenteditable', 'true');
                    dayCell.setAttribute('data-day', i);
                    row.appendChild(dayCell);
                }

                tbody.appendChild(row);
            });
        }

        function fetchLog9() {
            const monthInput = document.getElementById('monthYearInput9');
            const equipmentSelect = document.getElementById('instrumentSelect9');
            const equipmentId = equipmentSelect.value;

            if (!monthInput.value || !equipmentId) {
                // Don't show alert here as it might trigger during initial selection
                return;
            }

            console.log('Fetching data for:', monthInput.value, equipmentId);

            const tbody = document.querySelector('#logTable9 tbody');
            tbody.innerHTML = '<tr><td colspan="32" class="text-center">Loading data...</td></tr>';

            fetch(`/fetchMicro9?month=${monthInput.value}&equipment_id=${equipmentId}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
            })
                .then(response => {
                    console.log('Response status:', response.status); // Debug log
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Received data:', data); // Debug log
                    if (data.success) {
                        if (data.data && data.data.length > 0) {
                            populateMaintenanceTable9(data.data);
                            // Update department if it exists in the first record
                            // if (data.data[0].department) {
                            //     document.getElementById('department2').value = data.data[0].department;
                            // }
                        } else {
                            initializeTable9();
                            alert('No maintenance records found for selected criteria');
                        }
                    } else {
                        throw new Error(data.message || 'Failed to fetch data');
                    }
                })
                .catch(error => {
                    console.error('Fetch Error:', error);
                    initializeTable9();
                    alert('Error loading maintenance data: ' + error.message);
                });
        }
        // Populate table with maintenance data
        function populateMaintenanceTable9(logs) {
            const tbody = document.querySelector('#logTable9 tbody');
            tbody.innerHTML = '';

            console.log('Populating table with:', logs); // Debug log

            // Create a map of tasks to their day data
            const taskMap = new Map();

            logs.forEach(log => {
                if (!taskMap.has(log.task)) {
                    taskMap.set(log.task, {});
                }
                const taskData = taskMap.get(log.task);

                // Merge days_data into the task's data
                Object.entries(log.days_data || {}).forEach(([day, value]) => {
                    if (value) { // Only add if value exists
                        taskData[day] = value;
                    }
                });
            });

            // Create rows for each task
            taskMap.forEach((daysData, task) => {
                const row = document.createElement('tr');

                // Task name cell
                const taskCell = document.createElement('td');
                taskCell.textContent = task;
                row.appendChild(taskCell);

                // Create cells for each day (1-31)
                for (let day = 1; day <= 31; day++) {
                    const dayCell = document.createElement('td');
                    dayCell.setAttribute('contenteditable', 'true');
                    dayCell.setAttribute('data-day', day);

                    // Set cell value if data exists for this day
                    const dayKey = `day_${day}`;
                    dayCell.textContent = daysData[dayKey] || '';

                    row.appendChild(dayCell);
                }

                tbody.appendChild(row);
            });

            console.log('Table populated successfully'); // Debug log
        }

        // Submit maintenance form
        function submit9() {
            const monthInput = document.getElementById('monthYearInput9');
            const equipmentSelect = document.getElementById('instrumentSelect9');
            const equipmentId = equipmentSelect.value;
            //const department = document.getElementById('department2').value;

            if (!monthInput.value || !equipmentId) {
                alert('Please select a month/year, select equipment ');
                return;
            }


            const rows = document.querySelectorAll('#logTable9 tbody tr');
            const logs = [];
            const monthYear = monthInput.value;

            rows.forEach(row => {
                const task = row.cells[0].textContent.trim();
                const daysData = {};

                // Collect data for each day (1-31)
                for (let i = 1; i <= 31; i++) {
                    const dayCell = row.cells[i];
                    const value = dayCell.textContent.trim();
                    if (value) {
                        daysData[`day_${i}`] = value;
                    }
                }

                // Only add if there's data for at least one day
                if (Object.keys(daysData).length > 0) {
                    logs.push({
                        month_year: monthYear,
                        equipment_id: equipmentId,
                        // department: department,
                        task: task,
                        days_data: daysData
                    });
                }
            });

            if (logs.length === 0) {
                alert('No data to save! Please enter maintenance records.');
                return;
            }

            // Show loading state
            const submitBtn = document.querySelector('button[onclick="submit9()"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch('/storeMicro9', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({ logs: logs })
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;

                    if (data.success) {
                        alert('Maintenance log saved successfully!');
                        fetchLog9(); // Refresh the data
                    } else {
                        throw new Error(data.message || 'Failed to save data');
                    }
                })
                .catch(error => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                    console.error('Error:', error);
                    alert('Error saving maintenance log: ' + error.message);
                });
        }



        //----------------------10
        document.addEventListener('DOMContentLoaded', function () {
            initializeTable10();
        });

        function initializeTable10() {
            const tasks = [
                "Cleaning from outside and inside also",
                "Chamber water change",
                "Cleaning of Inside",
                "Check power ON with Light",
                "Lab Staff Signature",
                "Lab Supervisor Signature",
            ];

            const tbody = document.querySelector('#logTable10 tbody');
            tbody.innerHTML = '';

            tasks.forEach(task => {
                const row = document.createElement('tr');
                const taskCell = document.createElement('td');
                taskCell.textContent = task;
                row.appendChild(taskCell);

                // Add 31 cells for each day of the month
                for (let i = 1; i <= 31; i++) {
                    const dayCell = document.createElement('td');
                    dayCell.setAttribute('contenteditable', 'true');
                    dayCell.setAttribute('data-day', i);
                    row.appendChild(dayCell);
                }

                tbody.appendChild(row);
            });
        }

        function fetchLog10() {
            const monthInput = document.getElementById('monthYearInput10');
            const equipmentSelect = document.getElementById('instrumentSelect10');
            const equipmentId = equipmentSelect.value;

            if (!monthInput.value || !equipmentId) {
                // Don't show alert here as it might trigger during initial selection
                return;
            }

            console.log('Fetching data for:', monthInput.value, equipmentId);

            const tbody = document.querySelector('#logTable10 tbody');
            tbody.innerHTML = '<tr><td colspan="32" class="text-center">Loading data...</td></tr>';

            fetch(`/fetchMicro10?month=${monthInput.value}&equipment_id=${equipmentId}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
            })
                .then(response => {
                    console.log('Response status:', response.status); // Debug log
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Received data:', data); // Debug log
                    if (data.success) {
                        if (data.data && data.data.length > 0) {
                            populateMaintenanceTable10(data.data);
                            // Update department if it exists in the first record
                            // if (data.data[0].department) {
                            //     document.getElementById('department2').value = data.data[0].department;
                            // }
                        } else {
                            initializeTable10();
                            alert('No maintenance records found for selected criteria');
                        }
                    } else {
                        throw new Error(data.message || 'Failed to fetch data');
                    }
                })
                .catch(error => {
                    console.error('Fetch Error:', error);
                    initializeTable10();
                    alert('Error loading maintenance data: ' + error.message);
                });
        }
        // Populate table with maintenance data
        function populateMaintenanceTable10(logs) {
            const tbody = document.querySelector('#logTable10 tbody');
            tbody.innerHTML = '';

            console.log('Populating table with:', logs); // Debug log

            // Create a map of tasks to their day data
            const taskMap = new Map();

            logs.forEach(log => {
                if (!taskMap.has(log.task)) {
                    taskMap.set(log.task, {});
                }
                const taskData = taskMap.get(log.task);

                // Merge days_data into the task's data
                Object.entries(log.days_data || {}).forEach(([day, value]) => {
                    if (value) { // Only add if value exists
                        taskData[day] = value;
                    }
                });
            });

            // Create rows for each task
            taskMap.forEach((daysData, task) => {
                const row = document.createElement('tr');

                // Task name cell
                const taskCell = document.createElement('td');
                taskCell.textContent = task;
                row.appendChild(taskCell);

                // Create cells for each day (1-31)
                for (let day = 1; day <= 31; day++) {
                    const dayCell = document.createElement('td');
                    dayCell.setAttribute('contenteditable', 'true');
                    dayCell.setAttribute('data-day', day);

                    // Set cell value if data exists for this day
                    const dayKey = `day_${day}`;
                    dayCell.textContent = daysData[dayKey] || '';

                    row.appendChild(dayCell);
                }

                tbody.appendChild(row);
            });

            console.log('Table populated successfully'); // Debug log
        }

        // Submit maintenance form
        function submit10() {
            const monthInput = document.getElementById('monthYearInput10');
            const equipmentSelect = document.getElementById('instrumentSelect10');
            const equipmentId = equipmentSelect.value;
            //const department = document.getElementById('department2').value;

            if (!monthInput.value || !equipmentId) {
                alert('Please select a month/year, select equipment ');
                return;
            }


            const rows = document.querySelectorAll('#logTable10 tbody tr');
            const logs = [];
            const monthYear = monthInput.value;

            rows.forEach(row => {
                const task = row.cells[0].textContent.trim();
                const daysData = {};

                // Collect data for each day (1-31)
                for (let i = 1; i <= 31; i++) {
                    const dayCell = row.cells[i];
                    const value = dayCell.textContent.trim();
                    if (value) {
                        daysData[`day_${i}`] = value;
                    }
                }

                // Only add if there's data for at least one day
                if (Object.keys(daysData).length > 0) {
                    logs.push({
                        month_year: monthYear,
                        equipment_id: equipmentId,
                        // department: department,
                        task: task,
                        days_data: daysData
                    });
                }
            });

            if (logs.length === 0) {
                alert('No data to save! Please enter maintenance records.');
                return;
            }

            // Show loading state
            const submitBtn = document.querySelector('button[onclick="submit10()"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch('/storeMicro10', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({ logs: logs })
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;

                    if (data.success) {
                        alert('Maintenance log saved successfully!');
                        fetchLog9(); // Refresh the data
                    } else {
                        throw new Error(data.message || 'Failed to save data');
                    }
                })
                .catch(error => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                    console.error('Error:', error);
                    alert('Error saving maintenance log: ' + error.message);
                });
        }






        // Load instruments on page load
        document.addEventListener('DOMContentLoaded', function () {
            loadRefrigerationInstruments();

            // Initialize with current month
            const currentDate = new Date();
            const currentMonthYear = `${currentDate.getFullYear()}-${String(currentDate.getMonth() + 1).padStart(2, '0')}`;
            document.getElementById('monthYear16').value = `${currentMonthYear}-01`;
        });

        document.addEventListener('DOMContentLoaded', function () {
            loadRefrigerationInstruments();

            // Initialize with current month
            const currentDate = new Date();
            const currentMonthYear = `${currentDate.getFullYear()}-${String(currentDate.getMonth() + 1).padStart(2, '0')}`;
            document.getElementById('monthYear33').value = `${currentMonthYear}-01`;
        });

        // document.addEventListener('DOMContentLoaded', function () {
        //     loadDeepfrigerationInstruments();

        //     // Initialize with current month
        //     const currentDate = new Date();
        //     const currentMonthYear = `${currentDate.getFullYear()}-${String(currentDate.getMonth() + 1).padStart(2, '0')}`;
        //     document.getElementById('monthYear17').value = `${currentMonthYear}-01`;
        // });


        // Function to load instruments
        function loadRefrigerationInstruments() {
            fetch('/all-instruments', {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
                .then(response => response.json())
                .then(data => {
                    const select = document.getElementById('instrumentId16');
                    select.innerHTML = '<option value="">Select Instrument</option>';

                    data.instruments.forEach(instrument => {
                        const option = document.createElement('option');
                        option.value = instrument.id;
                        // Format: instrument_id (instrument_name)
                        option.textContent = `${instrument.instrument_id} (${instrument.name})`;
                        select.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error loading instruments:', error);
                });
        }

        // Function to handle form submission
        function form16() {
            const monthYearInput = document.getElementById('monthYear16');
            const instrumentSelect = document.getElementById('instrumentId16');
            const monthYear = monthYearInput.value;
            const instrumentId = instrumentSelect.value;

            if (!monthYear || !instrumentId) {
                alert('Please select Month/Year and Instrument');
                return;
            }

            // Extract YYYY-MM format
            const formattedMonthYear = monthYear.substring(0, 7);
            const year = parseInt(formattedMonthYear.split('-')[0]);
            const month = parseInt(formattedMonthYear.split('-')[1]);

            // Get the last day of the selected month
            const lastDay = new Date(year, month, 0).getDate();

            // Prepare logs data - only for rows with at least one field filled
            const logs = [];
            const rows = document.querySelectorAll('#incubator-temperature-monitoring-log table tbody tr');

            rows.forEach((row, index) => {
                const day = index + 1;

                // Skip days beyond the last day of the month
                if (day > lastDay) return;

                // Check if any editable cell has content
                let hasContent = false;
                const cells = row.querySelectorAll('td[contenteditable="true"]');

                cells.forEach(cell => {
                    if (cell.textContent.trim() !== '') {
                        hasContent = true;
                    }
                });

                if (hasContent) {
                    const dateStr = `${formattedMonthYear}-${String(day).padStart(2, '0')}`;
                    const dateObj = new Date(dateStr);

                    if (isNaN(dateObj.getTime())) {
                        console.error(`Invalid date: ${dateStr}`);
                        return;
                    }

                    logs.push({
                        date: dateStr,
                        morning_temperature: row.cells[1].textContent.trim(),
                        morning_signature: row.cells[2].textContent.trim(),
                        evening_temperature: row.cells[3].textContent.trim(),
                        evening_signature: row.cells[4].textContent.trim()
                    });
                }
            });

            if (logs.length === 0) {
                if (!confirm('No data entered. Do you want to save empty records for this month?')) {
                    return;
                }
            }

            // Send data to server
            fetch('/storeMicro5', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    month_year: formattedMonthYear,
                    instrument_id: instrumentId,
                    logs: logs
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        alert(data.message);
                    } else if (data.error) {
                        alert(data.error);
                    } else if (data.errors) {
                        let errorMessages = [];
                        for (const [key, value] of Object.entries(data.errors)) {
                            errorMessages.push(value.join('\n'));
                        }
                        alert('Validation errors:\n' + errorMessages.join('\n'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to save data');
                });
        }

        function submitOvenTemperatureLog() {
            const monthYearInput = document.getElementById('monthYear33');
            const instrumentSelect = document.getElementById('ovenId33');
            const monthYear = monthYearInput.value;
            const instrumentId = instrumentSelect.value;

            if (!monthYear || !instrumentId) {
                alert('Please select Month/Year and Instrument');
                return;
            }

            // Extract YYYY-MM format
            const formattedMonthYear = monthYear.substring(0, 7);
            const year = parseInt(formattedMonthYear.split('-')[0]);
            const month = parseInt(formattedMonthYear.split('-')[1]);

            // Get the last day of the selected month
            const lastDay = new Date(year, month, 0).getDate();

            // Prepare logs data - only for rows with at least one field filled
            const logs = [];
            const rows = document.querySelectorAll('#hot-air-oven-temperature-monitoring-log table tbody tr');

            rows.forEach((row, index) => {
                const day = index + 1;

                // Skip days beyond the last day of the month
                if (day > lastDay) return;

                // Check if any editable cell has content
                let hasContent = false;
                const cells = row.querySelectorAll('td[contenteditable="true"]');

                cells.forEach(cell => {
                    if (cell.textContent.trim() !== '') {
                        hasContent = true;
                    }
                });

                if (hasContent) {
                    const dateStr = `${formattedMonthYear}-${String(day).padStart(2, '0')}`;
                    const dateObj = new Date(dateStr);

                    if (isNaN(dateObj.getTime())) {
                        console.error(`Invalid date: ${dateStr}`);
                        return;
                    }

                    logs.push({
                        date: dateStr,
                        morning_temperature: row.cells[1].textContent.trim(),
                        morning_signature: row.cells[2].textContent.trim(),
                        evening_temperature: row.cells[3].textContent.trim(),
                        evening_signature: row.cells[4].textContent.trim()
                    });
                }
            });

            if (logs.length === 0) {
                if (!confirm('No data entered. Do you want to save empty records for this month?')) {
                    return;
                }
            }

            // Send data to server
            fetch('/oven-temperature-monitoring/store', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    month_year: formattedMonthYear,
                    instrument_id: instrumentId,
                    logs: logs
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        alert(data.message);
                    } else if (data.error) {
                        alert(data.error);
                    } else if (data.errors) {
                        let errorMessages = [];
                        for (const [key, value] of Object.entries(data.errors)) {
                            errorMessages.push(value.join('\n'));
                        }
                        alert('Validation errors:\n' + errorMessages.join('\n'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to save data');
                });
        }

        // Function to load data for selected month/year and instrument
        function loadRefrigerationTemperatureData() {
            const monthYearInput = document.getElementById('monthYear16');
            const instrumentSelect = document.getElementById('instrumentId16');
            const monthYear = monthYearInput.value;
            const instrumentId = instrumentSelect.value;

            if (!monthYear || !instrumentId) return;

            const formattedMonthYear = monthYear.substring(0, 7);
            const year = parseInt(formattedMonthYear.split('-')[0]);
            const month = parseInt(formattedMonthYear.split('-')[1]);
            const lastDay = new Date(year, month, 0).getDate();

            // Hide rows for days beyond the last day of the month
            const rows = document.querySelectorAll('#incubator-temperature-monitoring-log table tbody tr');
            rows.forEach((row, index) => {
                const day = index + 1;
                row.style.display = day > lastDay ? 'none' : '';
            });

            fetch(`/fetchMicro5?month_year=${formattedMonthYear}&instrument_id=${instrumentId}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
                .then(response => response.json())
                .then(data => {
                    // Clear all cells first
                    document.querySelectorAll('#incubator-temperature-monitoring-log table tbody td[contenteditable="true"]').forEach(cell => {
                        cell.textContent = ' ';
                    });

                    if (data.logs && data.logs.length > 0) {
                        data.logs.forEach(log => {
                            const day = new Date(log.log_date).getDate();
                            const row = document.querySelector(`#incubator-temperature-monitoring-log table tbody tr:nth-child(${day})`);

                            if (row) {
                                row.cells[1].textContent = log.morning_temperature || ' ';
                                row.cells[2].textContent = log.morning_signature || ' ';
                                row.cells[3].textContent = log.evening_temperature || ' ';
                                row.cells[4].textContent = log.evening_signature || ' ';
                            }
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    //alert('Failed to load data');
                });
        }

        // Add event listeners
        document.getElementById('monthYear16').addEventListener('change', loadRefrigerationTemperatureData);
        document.getElementById('instrumentId16').addEventListener('change', loadRefrigerationTemperatureData);




        document.addEventListener('DOMContentLoaded', function () {
            // Set current month as default
            const currentDate = new Date();
            document.getElementById('incubator_month_year').value = currentDate.toISOString().slice(0, 7);
        });

        function fetchIncubatorMaintenanceData() {
            const instrumentId = document.getElementById('incubator_instrument_id').value;
            const monthYear = document.getElementById('incubator_month_year').value;

            if (!instrumentId || !monthYear) {
                return;
            }

            console.log('Fetching data for:', { instrumentId, monthYear }); // Debug log

            // Show loading state
            const tableBody = document.querySelector('#incubator-maintenance-table tbody');
            tableBody.innerHTML = '<tr><td colspan="7" class="text-center">Loading data...</td></tr>';

            fetch(`/incubator-maintenance/fetch?month_year=${monthYear}&instrument_id=${instrumentId}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            })
                .then(response => {
                    console.log('Response status:', response.status); // Debug log
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Received data:', data); // Debug log
                    if (data.success) {
                        if (data.logs && data.logs.length > 0) {
                            renderIncubatorData(data);
                        } else {
                            initializeEmptyIncubatorTable();
                            console.log('No data found for selected criteria');
                        }
                    } else {
                        throw new Error(data.message || 'Failed to fetch data');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    initializeEmptyIncubatorTable();
                    alert('Error loading data: ' + error.message);
                });
        }

        function renderIncubatorData(data) {
            const tableBody = document.querySelector('#incubator-maintenance-table tbody');
            tableBody.innerHTML = ''; // Clear loading message

            // Set department if exists
            if (data.department) {
                document.getElementById('incubator_department').value = data.department;
            }

            // Create rows for each day (1-31)
            for (let day = 1; day <= 31; day++) {
                const row = document.createElement('tr');
                row.setAttribute('data-day', day);

                // Find log for this day (if exists)
                const dayLog = data.logs.find(log => {
                    const logDay = new Date(log.log_date).getDate();
                    return logDay === day;
                });

                row.innerHTML = `
                                                                <td>${day}</td>
                                                                <td contenteditable="true" data-field="cleaning_outside">${dayLog?.cleaning_outside || ''}</td>
                                                                <td contenteditable="true" data-field="cleaning_inside">${dayLog?.cleaning_inside || ''}</td>
                                                                <td contenteditable="true" data-field="temperature_check">${dayLog?.temperature_check || ''}</td>
                                                                <td contenteditable="true" data-field="power_check">${dayLog?.power_check || ''}</td>
                                                                <td contenteditable="true" data-field="scientific_signature">${dayLog?.scientific_signature || ''}</td>
                                                                <td contenteditable="true" data-field="supervisor_signature">${dayLog?.supervisor_signature || ''}</td>
                                                            `;

                tableBody.appendChild(row);
            }
        }

        function initializeEmptyIncubatorTable() {
            const tableBody = document.querySelector('#incubator-maintenance-table tbody');
            tableBody.innerHTML = '';

            for (let day = 1; day <= 31; day++) {
                const row = document.createElement('tr');
                row.setAttribute('data-day', day);
                row.innerHTML = `
                                                                <td>${day}</td>
                                                                <td contenteditable="true" data-field="cleaning_outside"></td>
                                                                <td contenteditable="true" data-field="cleaning_inside"></td>
                                                                <td contenteditable="true" data-field="temperature_check"></td>
                                                                <td contenteditable="true" data-field="power_check"></td>
                                                                <td contenteditable="true" data-field="scientific_signature"></td>
                                                                <td contenteditable="true" data-field="supervisor_signature"></td>
                                                            `;
                tableBody.appendChild(row);
            }
        }

        function clearIncubatorForm() {
            document.querySelectorAll('#incubator-maintenance-table [contenteditable="true"]').forEach(cell => {
                cell.textContent = '';
            });
        }

        function submitIncubatorMaintenanceLog() {
            const formData = {
                department: document.getElementById('incubator_department').value,
                month_year: document.getElementById('incubator_month_year').value,
                instrument_id: document.getElementById('incubator_instrument_id').value,
                logs: []
            };

            // Validate required fields
            if (!formData.department || !formData.month_year || !formData.instrument_id) {
                alert('Please fill all required fields (Department, Month/Year, and Instrument)');
                return;
            }

            // Collect data for each day
            for (let day = 1; day <= 31; day++) {
                const row = document.querySelector(`#incubator-maintenance-table tr[data-day="${day}"]`);
                if (!row) continue;

                const logData = {
                    log_date: `${formData.month_year}-${day.toString().padStart(2, '0')}`,
                    cleaning_outside: row.querySelector('[data-field="cleaning_outside"]').textContent.trim(),
                    cleaning_inside: row.querySelector('[data-field="cleaning_inside"]').textContent.trim(),
                    temperature_check: row.querySelector('[data-field="temperature_check"]').textContent.trim(),
                    power_check: row.querySelector('[data-field="power_check"]').textContent.trim(),
                    scientific_signature: row.querySelector('[data-field="scientific_signature"]').textContent.trim(),
                    supervisor_signature: row.querySelector('[data-field="supervisor_signature"]').textContent.trim()
                };

                formData.logs.push(logData);
            }

            // Show loading state
            const submitBtn = document.querySelector('button[onclick="submitIncubatorMaintenanceLog()"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch('/incubator-maintenance/store', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(formData)
            })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(errData => {
                            throw new Error(errData.message || 'Request failed');
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;

                    if (data.success) {
                        alert('Maintenance logs saved successfully!');
                    } else {
                        let errorMessage = 'Failed to save data';
                        if (data.errors) {
                            errorMessage += ': ' + Object.values(data.errors).join(', ');
                        } else if (data.message) {
                            errorMessage += ': ' + data.message;
                        }
                        throw new Error(errorMessage);
                    }
                })
                .catch(error => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                    console.error('Error:', error);
                    alert('Error: ' + error.message);
                });
        }


        // Initialize when DOM is loaded
        document.addEventListener('DOMContentLoaded', function () {
            // Set current month as default
            const currentDate = new Date();
            document.getElementById('autoclave_month_year').value = currentDate.toISOString().slice(0, 7);

            // Add initial row
            addAutoclaveChemicalRow();
        });

        // Add new row to the table
        function addAutoclaveChemicalRow(rowData = null) {
            const tbody = document.querySelector('#autoclave-chemical-table tbody');
            const rowId = Date.now(); // Unique ID for each row

            const row = document.createElement('tr');
            row.setAttribute('data-row-id', rowId);

            row.innerHTML = `
                                                    <td><input type="date" class="form-control" data-field="log_date" value="${rowData?.log_date || ''}"></td>
                                                    <td><input type="text" class="form-control" data-field="chemical_indicator" value="${rowData?.chemical_indicator || ''}"></td>
                                                    <td><input type="time" class="form-control" data-field="start_time" value="${rowData?.start_time || ''}"></td>
                                                    <td><input type="text" class="form-control" data-field="pressure" value="${rowData?.pressure || ''}"></td>
                                                    <td><input type="text" class="form-control" data-field="holding_time" value="${rowData?.holding_time || ''}"></td>
                                                    <td><input type="time" class="form-control" data-field="stop_time" value="${rowData?.stop_time || ''}"></td>
                                                    <td><input type="text" class="form-control" data-field="staff_signature" value="${rowData?.staff_signature || ''}"></td>
                                                    <td><input type="text" class="form-control" data-field="verified_by" value="${rowData?.verified_by || ''}"></td>
                                                    <td><button class="btn btn-danger btn-sm" onclick="removeAutoclaveChemicalRow(this)">×</button></td>
                                                `;

            tbody.appendChild(row);
        }

        // Remove row from table
        function removeAutoclaveChemicalRow(button) {
            const row = button.closest('tr');
            row.remove();
        }

        // Fetch data when month/year or instrument changes
        function fetchAutoclaveChemicalData() {
            const instrumentId = document.getElementById('autoclave_instrument_id').value;
            const monthYear = document.getElementById('autoclave_month_year').value;

            if (!instrumentId || !monthYear) {
                return;
            }

            // Show loading state
            const tbody = document.querySelector('#autoclave-chemical-table tbody');
            tbody.innerHTML = '<tr><td colspan="9" class="text-center">Loading data...</td></tr>';

            fetch(`/fetchMicro11?month_year=${monthYear}&instrument_id=${instrumentId}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        // Clear all inputs first
                        clearAutoclaveChemicalForm();

                        if (data.department) {
                            document.getElementById('autoclave_department').value = data.department;
                        }

                        if (data.logs && data.logs.length > 0) {
                            data.logs.forEach(log => {
                                addAutoclaveChemicalRow({
                                    log_date: log.log_date,
                                    chemical_indicator: log.chemical_indicator,
                                    start_time: log.start_time,
                                    pressure: log.pressure,
                                    holding_time: log.holding_time,
                                    stop_time: log.stop_time,
                                    staff_signature: log.staff_signature,
                                    verified_by: log.verified_by
                                });
                            });
                        } else {
                            // Add one empty row if no data found
                            addAutoclaveChemicalRow();
                        }
                    } else {
                        throw new Error(data.message || 'Failed to fetch data');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    clearAutoclaveChemicalForm();
                    alert('Error fetching data: ' + error.message);
                });
        }

        // Clear form
        function clearAutoclaveChemicalForm() {
            const tbody = document.querySelector('#autoclave-chemical-table tbody');
            tbody.innerHTML = '';
        }

        // Submit form data
        function submitAutoclaveChemicalLog() {
            const formData = {
                department: document.getElementById('autoclave_department').value,
                month_year: document.getElementById('autoclave_month_year').value,
                instrument_id: document.getElementById('autoclave_instrument_id').value,
                logs: []
            };

            // Validate required fields
            if (!formData.department || !formData.month_year || !formData.instrument_id) {
                alert('Please fill all required fields (Department, Month/Year, and Instrument)');
                return;
            }

            // Collect data from each row
            document.querySelectorAll('#autoclave-chemical-table tbody tr').forEach(row => {
                const rowData = {
                    log_date: row.querySelector('[data-field="log_date"]').value,
                    chemical_indicator: row.querySelector('[data-field="chemical_indicator"]').value,
                    start_time: row.querySelector('[data-field="start_time"]').value,
                    pressure: row.querySelector('[data-field="pressure"]').value,
                    holding_time: row.querySelector('[data-field="holding_time"]').value,
                    stop_time: row.querySelector('[data-field="stop_time"]').value,
                    staff_signature: row.querySelector('[data-field="staff_signature"]').value,
                    verified_by: row.querySelector('[data-field="verified_by"]').value
                };

                // Only add row if at least one field has data
                if (Object.values(rowData).some(value => value.trim() !== '')) {
                    formData.logs.push(rowData);
                }
            });

            if (formData.logs.length === 0) {
                alert('Please enter at least one log entry');
                return;
            }

            // Show loading state
            const submitBtn = document.querySelector('button[onclick="submitAutoclaveChemicalLog()"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch('/storeMicro11', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(formData)
            })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(errData => {
                            throw new Error(errData.message || 'Request failed');
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;

                    if (data.success) {
                        alert('Logs saved successfully!');
                        fetchAutoclaveChemicalData(); // Refresh the data
                    } else {
                        let errorMessage = 'Failed to save data';
                        if (data.errors) {
                            errorMessage += ': ' + Object.values(data.errors).join(', ');
                        } else if (data.message) {
                            errorMessage += ': ' + data.message;
                        }
                        throw new Error(errorMessage);
                    }
                })
                .catch(error => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                    console.error('Error:', error);
                    alert('Error: ' + error.message);
                });
        }


        // Initialize when DOM is loaded
        document.addEventListener('DOMContentLoaded', function () {
            // Set current month as default
            const currentDate = new Date();
            document.getElementById('autoclave_bio_month_year').value = currentDate.toISOString().slice(0, 7);

            // Add initial row
            addAutoclaveBiologicalRow();
        });

        // Add new row to the table
        function addAutoclaveBiologicalRow(rowData = null) {
            const tbody = document.querySelector('#autoclave-biological-table tbody');
            const rowId = Date.now(); // Unique ID for each row

            const row = document.createElement('tr');
            row.setAttribute('data-row-id', rowId);

            row.innerHTML = `
                                        <td><input type="date" class="form-control" data-field="log_date" value="${rowData?.log_date || ''}"></td>
                                        <td><input type="text" class="form-control" data-field="biological_indicator" value="${rowData?.biological_indicator || ''}"></td>
                                        <td><input type="time" class="form-control" data-field="start_time" value="${rowData?.start_time || ''}"></td>
                                        <td><input type="text" class="form-control" data-field="pressure" value="${rowData?.pressure || ''}"></td>
                                        <td><input type="text" class="form-control" data-field="holding_time" value="${rowData?.holding_time || ''}"></td>
                                        <td><input type="time" class="form-control" data-field="stop_time" value="${rowData?.stop_time || ''}"></td>
                                        <td><input type="text" class="form-control" data-field="staff_signature" value="${rowData?.staff_signature || ''}"></td>
                                        <td><input type="text" class="form-control" data-field="verified_by" value="${rowData?.verified_by || ''}"></td>
                                        <td><button class="btn btn-danger btn-sm" onclick="removeAutoclaveBiologicalRow(this)">×</button></td>
                                    `;

            tbody.appendChild(row);
        }

        // Remove row from table
        function removeAutoclaveBiologicalRow(button) {
            const row = button.closest('tr');
            row.remove();
        }

        // Fetch data when month/year or instrument changes
        function fetchAutoclaveBiologicalData() {
            const instrumentId = document.getElementById('autoclave_bio_instrument_id').value;
            const monthYear = document.getElementById('autoclave_bio_month_year').value;

            if (!instrumentId || !monthYear) {
                return;
            }

            // Show loading state
            const tbody = document.querySelector('#autoclave-biological-table tbody');
            tbody.innerHTML = '<tr><td colspan="9" class="text-center">Loading data...</td></tr>';

            fetch(`/autoclave-biological/fetch?month_year=${monthYear}&instrument_id=${instrumentId}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        // Clear all inputs first
                        clearAutoclaveBiologicalForm();

                        if (data.department) {
                            document.getElementById('autoclave_bio_department').value = data.department;
                        }

                        if (data.logs && data.logs.length > 0) {
                            data.logs.forEach(log => {
                                addAutoclaveBiologicalRow({
                                    log_date: log.log_date,
                                    biological_indicator: log.biological_indicator,
                                    start_time: log.start_time,
                                    pressure: log.pressure,
                                    holding_time: log.holding_time,
                                    stop_time: log.stop_time,
                                    staff_signature: log.staff_signature,
                                    verified_by: log.verified_by
                                });
                            });
                        } else {
                            // Add one empty row if no data found
                            addAutoclaveBiologicalRow();
                        }
                    } else {
                        throw new Error(data.message || 'Failed to fetch data');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    clearAutoclaveBiologicalForm();
                    alert('Error fetching data: ' + error.message);
                });
        }

        // Clear form
        function clearAutoclaveBiologicalForm() {
            const tbody = document.querySelector('#autoclave-biological-table tbody');
            tbody.innerHTML = '';
        }

        // Submit form data
        function submitAutoclaveBiologicalLog() {
            const formData = {
                department: document.getElementById('autoclave_bio_department').value,
                month_year: document.getElementById('autoclave_bio_month_year').value,
                instrument_id: document.getElementById('autoclave_bio_instrument_id').value,
                logs: []
            };

            // Validate required fields
            if (!formData.department || !formData.month_year || !formData.instrument_id) {
                alert('Please fill all required fields (Department, Month/Year, and Instrument)');
                return;
            }

            // Collect data from each row
            document.querySelectorAll('#autoclave-biological-table tbody tr').forEach(row => {
                const rowData = {
                    log_date: row.querySelector('[data-field="log_date"]').value,
                    biological_indicator: row.querySelector('[data-field="biological_indicator"]').value,
                    start_time: row.querySelector('[data-field="start_time"]').value,
                    pressure: row.querySelector('[data-field="pressure"]').value,
                    holding_time: row.querySelector('[data-field="holding_time"]').value,
                    stop_time: row.querySelector('[data-field="stop_time"]').value,
                    staff_signature: row.querySelector('[data-field="staff_signature"]').value,
                    verified_by: row.querySelector('[data-field="verified_by"]').value
                };

                // Only add row if at least one field has data
                if (Object.values(rowData).some(value => value.trim() !== '')) {
                    formData.logs.push(rowData);
                }
            });

            if (formData.logs.length === 0) {
                alert('Please enter at least one log entry');
                return;
            }

            // Show loading state
            const submitBtn = document.querySelector('button[onclick="submitAutoclaveBiologicalLog()"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch('/autoclave-biological/store', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(formData)
            })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(errData => {
                            throw new Error(errData.message || 'Request failed');
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;

                    if (data.success) {
                        alert('Logs saved successfully!');
                        fetchAutoclaveBiologicalData(); // Refresh the data
                    } else {
                        let errorMessage = 'Failed to save data';
                        if (data.errors) {
                            errorMessage += ': ' + Object.values(data.errors).join(', ');
                        } else if (data.message) {
                            errorMessage += ': ' + data.message;
                        }
                        throw new Error(errorMessage);
                    }
                })
                .catch(error => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                    console.error('Error:', error);
                    alert('Error: ' + error.message);
                });
        }








        // Function to load data for selected month/year and instrument
        function load33Data() {
            const monthYearInput = document.getElementById('monthYear33');
            const instrumentSelect = document.getElementById('ovenId33');
            const monthYear = monthYearInput.value;
            const instrumentId = instrumentSelect.value;

            if (!monthYear || !instrumentId) return;

            const formattedMonthYear = monthYear.substring(0, 7);
            const year = parseInt(formattedMonthYear.split('-')[0]);
            const month = parseInt(formattedMonthYear.split('-')[1]);
            const lastDay = new Date(year, month, 0).getDate();

            // Hide rows for days beyond the last day of the month
            const rows = document.querySelectorAll('#hot-air-oven-temperature-monitoring-log table tbody tr');
            rows.forEach((row, index) => {
                const day = index + 1;
                row.style.display = day > lastDay ? 'none' : '';
            });

            fetch(`/oven-temperature-monitoring/fetch?month_year=${formattedMonthYear}&instrument_id=${instrumentId}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
                .then(response => response.json())
                .then(data => {
                    // Clear all cells first
                    document.querySelectorAll('#hot-air-oven-temperature-monitoring-log table tbody td[contenteditable="true"]').forEach(cell => {
                        cell.textContent = ' ';
                    });

                    if (data.logs && data.logs.length > 0) {
                        data.logs.forEach(log => {
                            const day = new Date(log.log_date).getDate();
                            const row = document.querySelector(`#hot-air-oven-temperature-monitoring-log table tbody tr:nth-child(${day})`);

                            if (row) {
                                row.cells[1].textContent = log.morning_temperature || ' ';
                                row.cells[2].textContent = log.morning_signature || ' ';
                                row.cells[3].textContent = log.evening_temperature || ' ';
                                row.cells[4].textContent = log.evening_signature || ' ';
                            }
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    //alert('Failed to load data');
                });
        }

        // Add event listeners
        document.getElementById('monthYear33').addEventListener('change', load33Data);
        document.getElementById('ovenId33').addEventListener('change', load33Data);
    </script>

    </html>


@endsection