@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Biochemistry</title>
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
                <div style="font-size: 20px;">Biochemistry </div>
            </div>
            <div class="icon-view">
                <div class="pc-content">
                    <div class="pc-folder" onclick="showSection('distilled-water-plant-checklist')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Distilled Water Plant Checklist</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('sensacore-aqua-st-200-maintenance-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Sensacore Aqua ST-200 Maintenance log </span>
                    </div>
                    <div class="pc-folder" onclick="showSection('beckman-coulter-dxi800-maintenance-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Beckman Coulter DxI800 Maintenance Log</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('beckman-coulter-dxc700au-maintenance-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Beckman Coulter Dxc700 Maintenance Logs</span>
                    </div>

                </div>
            </div>
        </div>


        <!-- Sections -->
        <div id="distilled-water-plant-checklist" class="main inactive">


            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/BIO/004</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Distilled Water Plant Checklist</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitDistilledTableData()">Submit</button>
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
                    <label>Month/Year: </label><input type="date" id="datePicked" onchange="fetchWaterLogs()">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Instrument:</label>
                    <select id="instrumentId4" class="form-select" onchange="fetchWaterLogs()">
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
                <table class="stock-planner-table">
                    <thead>
                        <tr>
                            <th rowspan="2">Dated</th>
                            <th rowspan="2">Motor working</th>
                            <th colspan="2">Water Check Daily</th>
                            <th rowspan="2">Check Filters (It Should be clean)</th>
                            <th rowspan="2">Water leakage</th>
                            <th rowspan="2">Done By</th>


                        </tr>
                        <tr>

                            <th>TDS (0-0.2)</th>
                            <th>pH (6-6.5)</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <!-- Add rows as needed -->
                        <tr class="new-row">
                            <td><input type="date" id="date4"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-primary m-1" onclick="newRowToTable1(this)">+</button>

            </div>

        </div>


        <div id="sensacore-aqua-st-200-maintenance-log" class="main inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/BIO/006</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Sensacore Aqua ST-200 Maintenance log </strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitMaintenanceLog()">Submit</button>
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
                    <label>Month/Year: </label>
                    <input type="month" id="dateFilter6" class="form-control" onchange="fetchMaintenanceLog()">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Instrument:</label>
                    <select id="instrumentId6" class="form-select" onchange="fetchMaintenanceLog()">
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
                <table class="stock-planner-table" id="maintenancelogs">
                    <thead>
                        <tr>
                            <th>Task</th>
                            @for ($day = 1; $day <= 31; $day++)
                                <th>{{ $day }}</th>
                            @endfor
                        </tr>

                    </thead>
                    <tbody>
                        <tr>
                            <td>Daily Maintenance</td>

                        </tr>
                        <tr>
                            <td>Cleaned Instrument</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="cleaned_instrument" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Empty Waste Container</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="empty_waste_container" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Check Printer & Paper Status</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="check_printer" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Daily Cleaning Solution</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="daily_cleaning_solution" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>

                        <tr>
                            <td>Calibration</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="calibration" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Shutdown</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="shutdown" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Lab Staff Signature</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="lab_staff_signature" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <div id="beckman-coulter-dxi800-maintenance-log" class="main inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/BIO/002</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Beckman Coulter DxI800 Maintenance Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitBeckmanMaintenanceLog()">Submit</button>
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
                    <label>Month/Year: </label><input type="date" id="dateFilters" onchange="fetchBeckmanMaintenanceLog()">
                </div>
                <div class="col-md-4">
                    <select id="instrumentId1" class="form-select" onchange="fetchBeckmanMaintenanceLog()">
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
                <table class="stock-planner-table" id="beckmanmaintenancelogs">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <!-- Dates 1 to 31 -->
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
                        <tr>
                            <td colspan="32" style="text-align: center !important;">Daily Maintenance</td>
                        </tr>
                        <tr>
                            <td>System Back Up Successful</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td> Check Zone Temperature</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td> Check System Supplies</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td> Clean Probe Exteriors</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td> Check Solid Waste</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td> Prime Substrate</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td> Run The Daily Cleaning</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td> Performed by</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>Reviewed By</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td> Weekly Maintenance</td>
                            <td style="text-align: center !important;" colspan="7">1st Week</td>
                            <td style="text-align: center !important;" colspan="8">2nd Week</td>
                            <td style="text-align: center !important;" colspan="8">3rd Week</td>
                            <td style="text-align: center !important;" colspan="8">4th Week</td>

                        </tr>
                        <tr>
                            <td>Clean Instrument Exterior</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td> Inspect/Clean Primary Probe</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>Check Waste Filter Bottle</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td> Run System Check</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <div id="beckman-coulter-dxc700au-maintenance-log" class="main inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/BIO/005</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Beckman Coulter DXC700AU Maintenance Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning"
                        onclick="submitBeckmanCoulterMaintenanceLog()">Submit</button>
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
                    <label>Month/Year: </label><input type="date" id="dateFilter1"
                        onchange="fetchBeckmanCoulterMaintenanceLog()">
                </div>
                <div class="col-md-4">
                    <select id="instrumentId2" class="form-select" onchange="fetchBeckmanCoulterMaintenanceLog()">
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
                <table class="stock-planner-table" id="beckmancoultermaintenancelogs">
                    <thead>
                        <tr>
                            <th>Date</th>
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
                        <tr>
                            <td colspan="32" style="text-align: center !important;">Daily Maintenance</td>
                        </tr>
                        <tr>
                            <td>Inspect the Syringes for Leaks</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>Inspect the Wash Solution Roller Pump for Leaks</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>Inspect The Sample Probe, Reagent Probe, and Mix Bars</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>Replace the Deionized Water or Diluent in the Pre- Dilution Bottle</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>Replace the Sample Probe Wash Solutions</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>Clean the ISE</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>Calibrate the ISE</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td> Performed by</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>Reviewed By</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td> Weekly Maintenance</td>
                            <td style="text-align: center !important;" colspan="7">1st Week</td>
                            <td style="text-align: center !important;" colspan="8">2nd Week</td>
                            <td style="text-align: center !important;" colspan="8">3rd Week</td>
                            <td style="text-align: center !important;" colspan="8">4th Week</td>

                        </tr>
                        <tr>
                            <td>Clean the Sample Probe and Mix Bars</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>Perform a W2</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>



    </body>

    <script>
        function newRowToTable1() {
            let tbody = document.getElementById("tableBody");
            let row = document.createElement("tr");
            row.classList.add("new-row"); // Ensure the row has the class

            row.innerHTML = `
                                                                                                                                                    <td><input type="date" id="date4"></td>
                                                                                                                                                    <td contenteditable="true"></td>
                                                                                                                                                    <td contenteditable="true"></td>
                                                                                                                                                    <td contenteditable="true"></td>
                                                                                                                                                    <td contenteditable="true"></td>
                                                                                                                                                    <td contenteditable="true"></td>
                                                                                                                                                    <td contenteditable="true"></td>

                                                                                                                                                `;

            tbody.appendChild(row);
            console.log("New row added:", row); // Debugging log
        }
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
    </script>
    <script type="text/javascript">
        function submitDistilledTableData() {
            let instrumentId = document.querySelector('#instrumentId4').value;

            let rows = document.querySelectorAll("tbody .new-row");
            let data = [];
            const dateValue = document.getElementById("datePicked").value || new Date().toISOString().split("T")[0];

            rows.forEach(row => {
                let cells = row.querySelectorAll("td");
                let rowData = {
                    dated: cells[0]?.querySelector("input")?.value || null,
                    motor_working: cells[1].innerText.trim() || '',
                    tds: cells[2].innerText.trim() || '',
                    ph: cells[3].innerText.trim() || '',
                    filters: cells[4].innerText.trim() || '',
                    leakage: cells[5].innerText.trim() || '',
                    done_by: cells[6].innerText.trim() || ''
                };
                let rowId = row.getAttribute("data-id");
                if (rowId) {
                    rowData.id = rowId; // Add ID if exists
                }
                data.push(rowData);
            });

            if (data.length === 0) {
                alert("No new rows to save!");
                return;
            }

            // Send data to backend
            fetch("/save-distilledwater", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                },
                body: JSON.stringify({ instrumentId: instrumentId, month_year: dateValue, data }),
            })
                .then(response => response.json())
                .then(result => {
                    alert(result.message);
                })
                .catch(error => console.error("Error:", error));
        }
        function fetchWaterLogs() {

            let instrumentId = document.querySelector('#instrumentId4').value;
            let monthYear = document.getElementById("datePicked").value;
            if (!monthYear) {
                alert("Please select a month and year!");
                return;
            }

            fetch(`/get-distilledwater?month_year=${monthYear}`, {
                method: "GET",
                headers: {
                    "Content-Type": "application/json"
                }
            })
                .then(response => response.json())
                .then(data => {
                    let tbody = document.getElementById("tableBody");
                    tbody.innerHTML = ""; // Clear previous data

                    if (data.length === 0) {
                        tbody.innerHTML = "<tr><td colspan='8'>No records found</td></tr>";
                        return;
                    }
                    document.querySelector('#instrumentId4').value = data[0].instrumentId;
                    data.forEach((row, index) => {
                        let newRow = `<tr class="new-row" data-id="${row.id || ''}">

                                    <td><input type="date" id="date4" value="${row.dated}"></td>
                                    <td contenteditable="true">${row.motor_working}</td>
                                    <td contenteditable="true">${row.tds}</td>
                                    <td contenteditable="true">${row.ph}</td>
                                    <td contenteditable="true">${row.filters}</td>
                                    <td contenteditable="true">${row.leakage}</td>
                                    <td contenteditable="true">${row.done_by}</td>
                                </tr>`;
                        tbody.innerHTML += newRow;
                    });
                })
                .catch(error => console.error("Error:", error));
        }
    </script>
    <script type="text/javascript">
        // Initialize form with current month/year
        document.addEventListener('DOMContentLoaded', function () {
            const monthYearInput = document.getElementById('dateFilter6');
            if (!monthYearInput.value) {
                const today = new Date();
                const year = today.getFullYear();
                const month = String(today.getMonth() + 1).padStart(2, '0');
                monthYearInput.value = `${year}-${month}`;
            }
        });

        function submitMaintenanceLog() {
            // alert('hello');
            const monthYear = document.getElementById('dateFilter6').value;
            const instrumentId = document.getElementById('instrumentId6').value;

            if (!monthYear || !instrumentId) {
                alert('Please select Month/Year and Instrument');
                return;
            }

            // Initialize data object with all possible tasks
            const data = {
                month_year: `${monthYear}-01`,
                instrument_id: instrumentId,
                tasks: {
                    cleaned_instrument: {},
                    empty_waste_container: {},
                    check_printer: {},
                    daily_cleaning_solution: {},
                    calibration: {},
                    shutdown: {},
                    lab_staff_signature: {},
                }
            };

            // Safely collect all task data
            document.querySelectorAll('[contenteditable="true"][data-task]').forEach(cell => {
                const task = cell.getAttribute('data-task');
                const day = cell.getAttribute('data-day');
                const value = cell.textContent.trim();

                // Only add if there's a value
                if (value) {
                    if (!data.tasks[task]) {
                        console.warn(`Unknown task: ${task}`);
                        return;
                    }
                    data.tasks[task][day] = value;
                }
            });

            // Send data to server
            fetch("{{ route('maintenance-log.store') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(data)
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        alert('Maintenance log saved successfully');
                    } else {
                        alert('Error: ' + (data.message || 'Failed to save data'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while saving data');
                });
        }
        function fetchMaintenanceLog() {
            const monthYear = document.getElementById('dateFilter6').value;
            const instrumentId = document.getElementById('instrumentId6').value;

            if (!monthYear || !instrumentId) return;

            fetch("{{ route('maintenance-log.fetch') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    month_year: `${monthYear}-01`,
                    instrument_id: instrumentId
                })
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success && data.data) {
                        // Clear all cells first
                        document.querySelectorAll('[contenteditable="true"]').forEach(cell => {
                            cell.textContent = '';
                        });

                        // Populate the table with fetched data
                        if (data.data.tasks) {
                            const tasks = JSON.parse(data.data.tasks);
                            for (const task in tasks) {
                                for (const day in tasks[task]) {
                                    const cell = document.querySelector(`[data-task="${task}"][data-day="${day}"]`);
                                    if (cell) {
                                        cell.textContent = tasks[task][day];
                                    }
                                }
                            }
                        }
                    } else if (data.success) {
                        // No data found - clear the table
                        document.querySelectorAll('[contenteditable="true"]').forEach(cell => {
                            cell.textContent = '';
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>
    <script type="text/javascript">
        function submitBeckmanMaintenanceLog() {
            let table = document.getElementById("beckmanmaintenancelogs"); // Get the table by ID
            let rows = table.querySelectorAll("tbody tr"); // Select all rows inside the table body
            let data = [];
            const dateValue = document.getElementById("dateFilters").value || new Date().toISOString().split("T")[0];
            const instrumentId = document.getElementById("instrumentId1").value; // Get instrument ID

            rows.forEach((row, index) => {

                let cells = row.querySelectorAll("td");
                let task = cells[0].innerText.trim(); // First column contains task name
                let daysData = {};
                if (task !== "Weekly Maintenance") {
                    // Loop through each day's column and store values in JSON
                    for (let i = 0; i <= 31; i++) {
                        let value = cells[i]?.innerText.trim(); // Get data from each day column
                        if (value) {
                            daysData[`day_${i}`] = value; // Store in JSON object
                        }
                    }
                }
                data.push({
                    date: dateValue,
                    instrument_id: instrumentId,
                    task: task,
                    days_data: daysData
                });
            });

            if (data.length === 0) {
                alert("No data to save!");
                return;
            }

            // Send data to backend
            fetch("/save-beckman-maintenance-log", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ logs: data })
            })
                .then(response => response.json())
                .then(result => {
                    alert(result.message);
                    console.log(result);
                })
                .catch(error => console.error("Error:", error));
        }
        function fetchBeckmanMaintenanceLog() {
            let selectedDate = document.getElementById("dateFilters").value;
            let instrumentId = document.getElementById("instrumentId1").value; // Get instrument ID

            if (!selectedDate || !instrumentId) {
                alert("Please select a date and instrument ID!");
                return;
            }

            fetch(`/get-beckman-maintenance-log?date=${selectedDate}&instrument_id=${instrumentId}`)
                .then(response => response.json())
                .then(result => {
                    if (result.success) {
                        populateBeckmanTable(result.data);
                    } else {
                        alert(result.message || "No data found for the selected date!");
                    }
                })
                .catch(error => console.error("Error:", error));
        }

        function populateBeckmanTable(data) {
            let table = document.getElementById("beckmanmaintenancelogs"); // Get the table by ID
            let tbody = table.querySelector("tbody");

            // Clear existing rows
            tbody.innerHTML = "";

            data.forEach(log => {
                if (log.task === "Weekly Maintenance") {
                    // Create a row for "Weekly Maintenance"
                    let row = document.createElement("tr");

                    // First column for "Weekly Maintenance"
                    let taskCell = document.createElement("td");
                    taskCell.innerText = "Weekly Maintenance";
                    row.appendChild(taskCell);

                    // Create week headers with specified colspan
                    let weekCols = [7, 8, 8, 8]; // Colspan for each week
                    weekCols.forEach((colSpan, index) => {
                        let weekCell = document.createElement("td");
                        weekCell.innerText = `${index + 1} Week`; // 1st, 2nd, 3rd, 4th Week
                        weekCell.style.textAlign = "center";
                        weekCell.colSpan = colSpan;
                        row.appendChild(weekCell);
                    });

                    tbody.appendChild(row);
                } else {
                    // Normal Daily Maintenance (31 days in a single row)
                    let row = document.createElement("tr");
                    let taskCell = document.createElement("td");
                    taskCell.innerText = log.task;
                    row.appendChild(taskCell);

                    for (let i = 1; i <= 31; i++) {
                        let dayCell = document.createElement("td");
                        dayCell.innerText = log.days_data[`day_${i}`] || "";
                        dayCell.setAttribute("contenteditable", "true");
                        row.appendChild(dayCell);
                    }

                    tbody.appendChild(row);
                }
            });
        }


    </script>
    <script type="text/javascript">
        function submitBeckmanCoulterMaintenanceLog() {
            let table = document.getElementById("beckmancoultermaintenancelogs"); // Get the table by ID
            let rows = table.querySelectorAll("tbody tr"); // Select all rows inside the table body
            let data = [];
            const dateValue = document.getElementById("dateFilter1").value || new Date().toISOString().split("T")[0];
            const instrumentId = document.getElementById("instrumentId2").value; // Get instrument ID

            rows.forEach((row, index) => {

                let cells = row.querySelectorAll("td");
                let task = cells[0].innerText.trim(); // First column contains task name
                let daysData = {};
                if (task !== "Weekly Maintenance") {
                    // Loop through each day's column and store values in JSON
                    for (let i = 0; i <= 31; i++) {
                        let value = cells[i]?.innerText.trim(); // Get data from each day column
                        if (value) {
                            daysData[`day_${i}`] = value; // Store in JSON object
                        }
                    }
                }
                data.push({
                    date: dateValue,
                    instrument_id: instrumentId,
                    task: task,
                    days_data: daysData
                });
            });

            if (data.length === 0) {
                alert("No data to save!");
                return;
            }

            // Send data to backend
            fetch("/save-beckman-coulter-maintenance-log", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ logs: data })
            })
                .then(response => response.json())
                .then(result => {
                    alert(result.message);
                    console.log(result);
                })
                .catch(error => console.error("Error:", error));
        }
        function fetchBeckmanCoulterMaintenanceLog() {
            let selectedDate = document.getElementById("dateFilter1").value;
            let instrumentId = document.getElementById("instrumentId2").value; // Get instrument ID

            if (!selectedDate || !instrumentId) {
                alert("Please select a date and instrument ID!");
                return;
            }

            fetch(`/get-beckman-coulter-maintenance-log?date=${selectedDate}&instrument_id=${instrumentId}`)
                .then(response => response.json())
                .then(result => {
                    if (result.success) {
                        populateBeckmanCoulterTable(result.data);
                    } else {
                        alert(result.message || "No data found for the selected date!");
                    }
                })
                .catch(error => console.error("Error:", error));
        }

        function populateBeckmanCoulterTable(data) {
            let table = document.getElementById("beckmancoultermaintenancelogs"); // Get the table by ID
            let tbody = table.querySelector("tbody");

            // Clear existing rows
            tbody.innerHTML = "";

            data.forEach(log => {
                if (log.task === "Weekly Maintenance") {
                    // Create a row for "Weekly Maintenance"
                    let row = document.createElement("tr");

                    // First column for "Weekly Maintenance"
                    let taskCell = document.createElement("td");
                    taskCell.innerText = "Weekly Maintenance";
                    row.appendChild(taskCell);

                    // Create week headers with specified colspan
                    let weekCols = [7, 8, 8, 8]; // Colspan for each week
                    weekCols.forEach((colSpan, index) => {
                        let weekCell = document.createElement("td");
                        weekCell.innerText = `${index + 1} Week`; // 1st, 2nd, 3rd, 4th Week
                        weekCell.style.textAlign = "center";
                        weekCell.colSpan = colSpan;
                        row.appendChild(weekCell);
                    });

                    tbody.appendChild(row);
                } else {
                    // Normal Daily Maintenance (31 days in a single row)
                    let row = document.createElement("tr");
                    let taskCell = document.createElement("td");
                    taskCell.innerText = log.task;
                    row.appendChild(taskCell);

                    for (let i = 1; i <= 31; i++) {
                        let dayCell = document.createElement("td");
                        dayCell.innerText = log.days_data[`day_${i}`] || "";
                        dayCell.setAttribute("contenteditable", "true");
                        row.appendChild(dayCell);
                    }

                    tbody.appendChild(row);
                }
            });
        }


    </script>

    </html>


@endsection