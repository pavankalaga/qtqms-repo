@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clinical Pathology</title>
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
                <div style="font-size: 20px;">Clinical Pathology </div>
            </div>

            <div class="icon-view">
                <div class="pc-content">
                    <div class="pc-folder" onclick="showSection('laura-m-maintenance-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Laura M - Maintenance Log </span>
                    </div>
                    <div class="pc-folder" onclick="showSection('seman-fructose-qc-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Seman Fructose QC Log </span>
                    </div>
                    <div class="pc-folder" onclick="showSection('daily-urine-qc-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Daily Urine QC Log </span>
                    </div>


                </div>
            </div>
        </div>


        <!-- Sections -->



        <div id="laura-m-maintenance-log" class="main inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/CP/001</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Laura M - Maintenance Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitMaintenanceLog1()">Submit</button>

                </div>
                <div class="expandedHeadingHidden d-flex align-items-center">

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
                    <label>Month/Year: </label><input type="date" id="dateFilter1" onchange="fetchMaintenanceLog()">
                </div>
                <div class="col-md-4">
                    <select id="instrumentId10" class="form-select" onchange="fetchMaintenanceLog()">
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
                            <th>DAILY MAINTENANCE STEPS & Date</th>
                            @for ($day = 1; $day <= 31; $day++)
                                <th>{{ $day }}</th>
                            @endfor
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Cleaning procedure of Plastic Feeder</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="cleaning_plastic_feeder" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Rinse the feeder with water and wipe it with wet cloth</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="rines_feeder" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Dry the plastic feeder, and insert in to analyzer (Correct position)</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="dry_plastic_feeder" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Cleaning Procedure of waste container</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="cleaning_waste_container" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Remove the waste container with used strips from the analyzer.</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="remove_waste_container" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Empty the container and rinse it with water</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="empty_the_container" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Wipe with a dry cloth.</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="wipe_with_drycloth" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Insert the waste container back and ensure it is positioned correctly</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="insert_waste_container" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Technician Signature</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="technician_signature" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                        <tr>
                            <td>Supervisor Signature</td>
                            @for ($day = 1; $day <= 31; $day++)
                                <td contenteditable="true" data-task="supervisor_signature" data-day="{{ $day }}"></td>
                            @endfor
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <div id="seman-fructose-qc-log" class="main inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/CP/003</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Seman Fructose QC Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitQCLog()">Submit</button>
                </div>
                <div class="expandedHeadingHidden d-flex align-items-center">

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
                    <label> Instrument Name: </label><input type="text" id="instrumentName" placeholder=" Instrument Name">
                </div>
                <div class="col-md-4">
                    <label>Instrument ID: </label>
                    <select id="instrumentId1" class="form-select" onchange="fetchQcLogs()">
                        <option value="">Select Instrument</option>
                        @foreach($instruments as $instrument)
                            <option value="{{ $instrument->instrument_id }}">{{ $instrument->instrument_id }}
                                ({{ $instrument->name }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label>QC Lot No: </label><input type="text" id="qcLotNo" placeholder="QC Lot No">
                </div>
                <div class="col-md-4">
                    <label>Month/Year: </label><input type="date" id="monthYear" onchange="fetchQcLogs()">
                </div>
                <!-- <div class="col-md-4">
                                                                                                                    <label>Instrument Id/No.: </label><input type="text" placeholder="Instrument Id/No.">
                                                                                                                </div> -->
            </div>
            <div class="table-responsive">
                <table class="stock-planner-table" id="qc-log-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Positive Control</th>
                            <th>Negative Control</th>
                            <th>Technician sign</th>
                            <th>Pathologist sign</th>
                            <th>Remark</th>

                        </tr>

                    </thead>
                    <tbody id="qcLogTableBody">
                        <tr>
                            <td>1</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td> 17</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>18</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>19</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>20</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>21</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>22</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>23</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>24</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>25</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>26</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>27</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>28</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>29</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>30</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                        <tr>
                            <td>31</td>
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
        <div id="daily-urine-qc-log" class="main inactive">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/CP/002</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Daily Urine QC Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="submitUrineQCLog()">Submit</button>
                </div>
                <div class="expandedHeadingHidden d-flex align-items-center"></div>
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
                    <label>Month/Year: </label>
                    <input type="month" id="monthYear1" onchange="fetchUrineQCLogs()" value="{{ date('Y-m') }}">
                </div>
                <div class="col-md-4">
                    <select id="instrumentId3" class="form-select" onchange="fetchUrineQCLogs()" required>
                        <option value="">Select Instrument</option>
                        @foreach($instruments as $instrument)
                            <option value="{{ $instrument->instrument_id }}">{{ $instrument->instrument_id }}
                                ({{ $instrument->name }})</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="table-responsive">
                <table class="stock-planner-table" id="urine-qc-log-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th colspan="2">Blood</th>
                            <th colspan="2">Leucocyte</th>
                            <th colspan="2">Bilirubin</th>
                            <th colspan="2">Urobilinogen</th>
                            <th colspan="2">Ketones</th>
                            <th colspan="2">Glucose</th>
                            <th colspan="2">Proteins</th>
                            <th colspan="2">PH</th>
                            <th colspan="2">Nitrites</th>
                            <th colspan="2">Specific Gravity</th>
                            <th>Performed by</th>
                            <th>Reviewed By</th>
                        </tr>
                        <tr>
                            <th>Ref Range</th>
                            <th contenteditable="true"></th>
                            <th contenteditable="true"></th>
                            <th contenteditable="true"></th>
                            <th contenteditable="true"></th>
                            <th contenteditable="true"></th>
                            <th contenteditable="true"></th>
                            <th contenteditable="true"></th>
                            <th contenteditable="true"></th>
                            <th contenteditable="true"></th>
                            <th contenteditable="true"></th>
                            <th contenteditable="true"></th>
                            <th contenteditable="true"></th>
                            <th contenteditable="true"></th>
                            <th contenteditable="true"></th>
                            <th contenteditable="true"></th>
                            <th contenteditable="true"></th>
                            <th contenteditable="true"></th>
                            <th contenteditable="true"></th>
                            <th contenteditable="true"></th>
                            <th contenteditable="true"></th>
                            <th contenteditable="true"></th>
                            <th contenteditable="true"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i = 1; $i <= 31; $i++)
                            <tr>
                                <td>{{ $i }}</td>
                                <td contenteditable="true"></td>
                                <td contenteditable="true"></td>
                                <td contenteditable="true"></td>
                                <td contenteditable="true"></td>
                                <td contenteditable="true"></td>
                                <td contenteditable="true"></td>
                                <td contenteditable="true"></td>
                                <td contenteditable="true"></td>
                                <td contenteditable="true"></td>
                                <td contenteditable="true"></td>
                                <td contenteditable="true"></td>
                                <td contenteditable="true"></td>
                                <td contenteditable="true"></td>
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
                        @endfor
                    </tbody>
                </table>
            </div>

        </div>



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
    </script>
    <script type="text/javascript">
        // Initialize form with current month/year
        document.addEventListener('DOMContentLoaded', function () {
            const monthYearInput = document.getElementById('dateFilter1');
            if (!monthYearInput.value) {
                const today = new Date();
                const year = today.getFullYear();
                const month = String(today.getMonth() + 1).padStart(2, '0');
                monthYearInput.value = `${year}-${month}`;
            }
        });

        function submitMaintenanceLog1() {
            // alert('hello');
            const monthYear = document.getElementById('dateFilter1').value;
            const instrumentId = document.getElementById('instrumentId10').value;

            if (!monthYear || !instrumentId) {
                alert('Please select Month/Year and Instrument');
                return;
            }

            // Initialize data object with all possible tasks
            const data = {
                month_year: `${monthYear}-01`,
                instrument_id: instrumentId,
                tasks: {
                    cleaning_plastic_feeder: {},
                    rines_feeder: {},
                    dry_plastic_feeder: {},
                    cleaning_waste_container: {},
                    remove_waste_container: {},
                    empty_the_container: {},
                    wipe_with_drycloth: {},
                    insert_waste_container: {},
                    technician_signature: {},
                    supervisor_signature: {},

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
            fetch("{{ route('laura.maintenancelog.save') }}", {
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
            const monthYear = document.getElementById('dateFilter1').value;
            const instrumentId = document.getElementById('instrumentId10').value;

            if (!monthYear || !instrumentId) return;

            fetch("{{ route('laura.maintenancelog.fetch') }}", {
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
        function submitQCLog() {
            let table = document.getElementById("qc-log-table");
            let rows = table.querySelectorAll("tbody tr");
            let data = [];

            const instrumentName = document.getElementById("instrumentName").value.trim();
            const instrumentId = document.getElementById("instrumentId1").value.trim();
            const qcLotNo = document.getElementById("qcLotNo").value.trim();
            const monthYear = document.getElementById("monthYear").value || new Date().toISOString().split("T")[0];

            // Validate required fields
            if (!instrumentId || !monthYear) {
                alert("Please fill in Instrument ID and Month/Year fields");
                return;
            }

            // Process each row from the table
            rows.forEach(row => {
                let cells = row.querySelectorAll("td");
                let day = cells[0].innerText.trim(); // First column contains day number (1-31) 

                // Only include rows that have at least one value besides the day number
                if (cells[1].innerText.trim() || cells[2].innerText.trim() || cells[3].innerText.trim() ||
                    cells[4].innerText.trim() || cells[5].innerText.trim()) {

                    data.push({
                        date: day, // This is the day number (1-31)
                        positive_control: cells[1].innerText.trim() || null,
                        negative_control: cells[2].innerText.trim() || null,
                        technician_sign: cells[3].innerText.trim() || null,
                        pathologist_sign: cells[4].innerText.trim() || null,
                        remark: cells[5].innerText.trim() || null
                    });
                }
            });

            if (data.length === 0) {
                alert("No data to save! Please fill in at least one row.");
                return;
            }

            // Send data to backend
            fetch("/save-qc-log", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    instrument_name: instrumentName,
                    instrument_id: instrumentId,
                    qc_lot_no: qcLotNo,
                    month_year: monthYear,
                    data: data
                })
            })
                .then(response => response.json())
                .then(result => {
                    alert(result.message || "Data saved successfully!");
                    // Refresh data display after save
                    fetchQcLogs();
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert("Error saving data. Please try again.");
                });
        }

        function fetchQcLogs() {
            const instrumentId = document.getElementById("instrumentId1").value.trim();
            const monthYear = document.getElementById("monthYear").value.trim();

            if (!monthYear) {
                alert("Please select a month/year");
                return;
            }

            fetch(`/get-qc-logs?instrument_id=${instrumentId}&month_year=${monthYear}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    const tableBody = document.getElementById("qcLogTableBody");

                    // Clear existing rows
                    tableBody.innerHTML = "";

                    // If data exists, populate form fields
                    if (data && data.length > 0) {
                        document.getElementById("instrumentName").value = data[0].instrument_name || '';
                        document.getElementById("instrumentId1").value = data[0].instrument_id || '';
                        document.getElementById("qcLotNo").value = data[0].qc_lot_no || '';
                    }

                    // Create rows for days 1-31 regardless of whether data exists
                    for (let day = 1; day <= 31; day++) {
                        // Find data entry for this day if it exists
                        const dayData = data?.find(log => parseInt(log.date) === day);

                        const row = document.createElement("tr");
                        row.innerHTML = `
                                                        <td>${day}</td>
                                                        <td contenteditable="true">${dayData?.positive_control || ''}</td>
                                                        <td contenteditable="true">${dayData?.negative_control || ''}</td>
                                                        <td contenteditable="true">${dayData?.technician_sign || ''}</td>
                                                        <td contenteditable="true">${dayData?.pathologist_sign || ''}</td>
                                                        <td contenteditable="true">${dayData?.remark || ''}</td>
                                                    `;
                        tableBody.appendChild(row);
                    }
                })
                .catch(error => {
                    console.error("Error fetching data:", error);
                    const tableBody = document.getElementById("qcLogTableBody");

                    // Clear existing rows
                    tableBody.innerHTML = "";

                    // On error, show empty form with days 1-31
                    for (let day = 1; day <= 31; day++) {
                        const row = document.createElement("tr");
                        row.innerHTML = `
                                                        <td>${day}</td>
                                                        <td contenteditable="true"></td>
                                                        <td contenteditable="true"></td>
                                                        <td contenteditable="true"></td>
                                                        <td contenteditable="true"></td>
                                                        <td contenteditable="true"></td>
                                                    `;
                        tableBody.appendChild(row);
                    }

                    // Clear other form fields
                    document.getElementById("instrumentName").value = '';
                    document.getElementById("instrumentId1").value = instrumentId; // Keep the selected instrument ID
                    document.getElementById("qcLotNo").value = '';

                    alert("No data found for the selected month. You can enter new data.");
                });
        }
        document.addEventListener('DOMContentLoaded', function () {
            // Set default month/year to current month if not set
            if (!document.getElementById("monthYear").value) {
                const today = new Date();
                const year = today.getFullYear();
                const month = String(today.getMonth() + 1).padStart(2, '0');
                document.getElementById("monthYear").value = `${year}-${month}`;
            }

            // Initialize the form with empty rows for days 1-31
            const tableBody = document.getElementById("qcLogTableBody");
            tableBody.innerHTML = "";
            for (let day = 1; day <= 31; day++) {
                const row = document.createElement("tr");
                row.innerHTML = `
                                        <td>${day}</td>
                                        <td contenteditable="true"></td>
                                        <td contenteditable="true"></td>
                                        <td contenteditable="true"></td>
                                        <td contenteditable="true"></td>
                                        <td contenteditable="true"></td>
                                    `;
                tableBody.appendChild(row);
            }

            // If instrument and month are already selected, fetch data
            const instrumentId = document.getElementById("instrumentId1").value;
            const monthYear = document.getElementById("monthYear").value;
            if (instrumentId && monthYear) {
                fetchQcLogs();
            }
        });
    </script>
    <script>
        // Define columnNames in the global scope or within the script
        const columnNames = [
            "blood_1", "blood_2", "leucocyte_1", "leucocyte_2",
            "bilirubin_1", "bilirubin_2", "urobilinogen_1", "urobilinogen_2",
            "ketones_1", "ketones_2", "glucose_1", "glucose_2",
            "proteins_1", "proteins_2", "ph_1", "ph_2",
            "nitrites_1", "nitrites_2", "specific_gravity_1", "specific_gravity_2",
            "performed_by", "reviewed_by"
        ];

        function submitUrineQCLog() {
            const selectedDate = document.getElementById("monthYear1").value;
            const instrumentId = document.getElementById("instrumentId3").value;

            if (!selectedDate) {
                alert("Please select a month/year");
                return;
            }

            if (!instrumentId) {
                alert("Please select an instrument");
                return;
            }

            let tableData = [];
            const table = document.getElementById("urine-qc-log-table");
            const theadRows = table.querySelectorAll("thead tr");
            const tbodyRows = table.querySelectorAll("tbody tr");

            // Extract reference range data from the second row of <thead>
            if (theadRows.length > 1) {
                const theadCells = theadRows[1].querySelectorAll("th, td");
                const headerData = { date: "Ref Range" };

                theadCells.forEach((cell, index) => {
                    if (index > 0 && columnNames[index - 1]) {
                        headerData[columnNames[index - 1]] = cell.innerText.trim();
                    }
                });

                tableData.push(headerData);
            }

            // Extract data from <tbody>
            tbodyRows.forEach(row => {
                const rowData = {};
                const cells = row.querySelectorAll("td");

                // Only include rows with actual data (at least one field filled)
                let hasData = false;

                rowData["date"] = cells[0].innerText.trim();

                cells.forEach((cell, index) => {
                    if (index > 0 && columnNames[index - 1]) {
                        const value = cell.innerText.trim();
                        rowData[columnNames[index - 1]] = value;
                        if (value) hasData = true;
                    }
                });

                if (hasData || rowData["date"] === "Ref Range") {
                    tableData.push(rowData);
                }
            });

            // Send data to Laravel backend
            fetch("/store-urine-qc-log", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    month_year: selectedDate,
                    instrument_id: instrumentId,
                    data: tableData
                })
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        alert("Data saved successfully!");
                    } else {
                        alert("Error: " + (data.message || "Unknown error occurred"));
                    }
                })
                .catch(error => {
                    console.error("Error saving data:", error);
                    alert("Error saving data. Please check console for details.");
                });
        }

        function fetchUrineQCLogs() {
            const selectedDate = document.getElementById("monthYear1").value;
            const instrumentId = document.getElementById("instrumentId3").value;

            if (!selectedDate || !instrumentId) {
                return; // Don't fetch if either field is empty
            }

            fetch("/fetch-urine-qc-logs", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    month_year: selectedDate,
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
                    const table = document.getElementById("urine-qc-log-table");
                    const thead = table.querySelector("thead");
                    const tbody = table.querySelector("tbody");

                    // Clear existing data rows (keep header structure)
                    while (thead.rows.length > 2) {
                        thead.deleteRow(2);
                    }

                    // Reset reference range row (second row in thead)
                    const refRangeRow = thead.rows[1];
                    const refRangeCells = refRangeRow.querySelectorAll("th, td");
                    refRangeCells.forEach((cell, index) => {
                        if (index > 0) cell.textContent = "";
                    });

                    // Reset all tbody rows
                    const tbodyRows = tbody.querySelectorAll("tr");
                    tbodyRows.forEach(row => {
                        const cells = row.querySelectorAll("td");
                        cells.forEach((cell, index) => {
                            if (index > 0) cell.textContent = "";
                        });
                    });

                    // Populate with fetched data
                    if (data.length > 0) {
                        // First find and populate reference range
                        const refRangeData = data.find(item => item.date === "Ref Range");
                        if (refRangeData) {
                            refRangeCells.forEach((cell, index) => {
                                if (index > 0) {
                                    const fieldName = columnNames[index - 1];
                                    cell.textContent = refRangeData[fieldName] || "";
                                }
                            });
                        }

                        // Then populate daily data
                        data.forEach(item => {
                            if (item.date !== "Ref Range") {
                                const day = parseInt(item.date);
                                if (day >= 1 && day <= 31) {
                                    const row = tbodyRows[day - 1];
                                    if (row) {
                                        const cells = row.querySelectorAll("td");
                                        cells.forEach((cell, index) => {
                                            if (index > 0) {
                                                const fieldName = columnNames[index - 1];
                                                cell.textContent = item[fieldName] || "";
                                            }
                                        });
                                    }
                                }
                            }
                        });
                    }
                })
                .catch(error => {
                    console.error("Error fetching data:", error);
                    alert("Error fetching data. Please check console for details.");
                });
        }

        // Initialize the table when the page loads
        document.addEventListener('DOMContentLoaded', function () {
            // Optionally fetch data if default values are set
            const monthInput = document.getElementById("monthYear1");
            const instrumentSelect = document.getElementById("instrumentId3");

            if (monthInput.value && instrumentSelect.value) {
                fetchUrineQCLogs();
            }
        });
    </script>

    </html>


@endsection