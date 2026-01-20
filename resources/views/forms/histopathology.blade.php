@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Histopathology</title>
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
                <div style="font-size: 20px; ">Histopathology</div>

            </div>
            <div class="icon-view">
                <div class="pc-content">
                    <div class="pc-folder" onclick="showSection('daily-qc-log-for-hot-plate-maintenance')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label"> Daily QC Log for Hot Plate Maintenance </span>
                    </div>
                    <div class="pc-folder" onclick="showSection('tissue-processor-timming-accuracy-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Tissue Processor Timing Accuracy Log</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('daily-temperature-log-for-tissue-processor')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">Daily Temperature Log for Tissue Processor</span>
                    </div>


                </div>
            </div>
        </div>


        <!-- Sections -->
        <div id="daily-qc-log-for-hot-plate-maintenance" class="main  inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/HIST/010</strong></label>
                    <label class="doc-detail">Doc Name: <strong>Daily QC Log for Hot Plate Maintenance</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" onclick="dailyQCLog1()">Submit</button>
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
                    <input type="month" class="form-control" id="monthYearInput1" onchange="fetchLog1()">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Instrument:</label>
                    <select id="instrumentSelect1" class="form-select" onchange="fetchLog1()">
                        <option value="">Select Instrument</option>
                        @foreach($instruments as $instrument)
                            <option value="{{ $instrument->instrument_id }}">{{ $instrument->instrument_id }}
                                ({{ $instrument->name }})
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="table-responsive mt-4">
                <table class="stock-planner-table" id="maintenance-logs1">
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


        <div id="tissue-processor-timming-accuracy-log" class="main inactive">
            <form id="tissueProcessorForm">
                @csrf
                <div class="d-flex align-items-center heading mb-4 expandedHeading">
                    <div class="d-flex align-items-center expandedHeadingVisible">
                        <label class="doc-detail">Doc No.: <strong>TDPL/HYD/HIST/011</strong></label>
                        <label class="doc-detail">Doc Name: <strong>Tissue Processor Timing Accuracy Log</strong></label>
                        <label class="doc-detail">Issue No.: <strong>01</strong></label>
                        <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                        <button type="button" class="btn btn-warning" onclick="submitTissueProcessorLog()">Submit</button>
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
                        <input type="month" id="monthYear" name="month_year" class="form-control" 
                           onchange="fetchTissueProcessorData()">
                    </div>
                    <div class="col-md-4">
                        <label>Instrument Sr No.: </label>
                        <select id="instrumentId" name="instrument_id" class="form-control" 
                        onclick="fetchTissueProcessorData()">
                            <option value="">Select Instrument</option>
                            @foreach($instruments as $instrument)
                                <option value="{{ $instrument->id }}">{{ $instrument->instrument_id }} - {{ $instrument->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="table-responsive mt-4">
                    <table class="stock-planner-table" id="tissueProcessorTable">
                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Date</th>
                                <th>Cleaning Status</th>
                                <th>Processor Timing</th>
                                <th>Calibrated Timing</th>
                                <th>Comments</th>
                                <th>Staff Signature</th>
                                <th>Supervisor Signature</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($day = 1; $day <= 31; $day++)
                                <tr data-day="{{ $day }}" @if($day > 31) style="display:none" @endif>
                                    <td>{{ $day }}</td>
                                    <td><input type="date" name="logs[{{ $day }}][date]" class="form-control date-input"
                                            data-day="{{ $day }}" @if($day > 31) disabled @endif></td>
                                    <td><input type="text" name="logs[{{ $day }}][cleaning_status]" class="form-control"></td>
                                    <td><input type="time" name="logs[{{ $day }}][processor_timing]" class="form-control"></td>
                                    <td><input type="time" name="logs[{{ $day }}][calibrated_timing]" class="form-control"></td>
                                    <td><input type="text" name="logs[{{ $day }}][comments]" class="form-control"></td>
                                    <td><input type="text" name="logs[{{ $day }}][staff_signature]" class="form-control"></td>
                                    <td><input type="text" name="logs[{{ $day }}][supervisor_signature]" class="form-control">
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </form>
        </div>

        <div id="daily-temperature-log-for-tissue-processor" class="main inactive">
    <div class="d-flex align-items-center heading mb-4 expandedHeading">
        <div class="d-flex align-items-center expandedHeadingVisible">
            <label class="doc-detail">Doc No.: <strong>TDPL/HYD/HIST/012</strong></label>
            <label class="doc-detail">Doc Name: <strong>Daily Temperature Log for Tissue Processor</strong></label>
            <label class="doc-detail">Issue No.: <strong>01</strong></label>
            <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
            <button type="button" class="btn btn-warning" onclick="submitTemperatureLog()">Submit</button>
        </div>
    </div>
    
    <div class="mt-3 mb-3">
        <button class="button" onclick="goBack(this)">
            <svg class="svgIcon" viewBox="0 0 384 512">
                <path d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z" transform="rotate(-90, 192, 256)"></path>
            </svg>
        </button>
    </div>

    <div class="row tableHeader">
        <div class="col-md-4">
            <label>Month/Year: </label><input type="month" id="logMonthYear">
        </div>
        <div class="col-md-4 mb-3">
            <label class="form-label">Instrument:</label>
            <select id="instrumentSelect" class="form-select">
                <option value="">Select Instrument</option>
                @foreach($instruments as $instrument)
                    <option value="{{ $instrument->instrument_id }}">{{ $instrument->instrument_id }}
                        ({{ $instrument->name }})</option>
                @endforeach
            </select>
        </div>
    </div>
    
    <div class="table-responsive">
        <table class="stock-planner-table" id="temperatureLogTable">
            <thead>
                <tr>
                    <th>Month</th>
                    <th>Date</th>
                    @for ($day = 1; $day <= 31; $day++)
                        <th>{{ $day }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @foreach(['january', 'february', 'march', 'april', 'may', 'june', 
                        'july', 'august', 'september', 'october', 'november', 'december'] as $month)
                    <tr>
                        <td rowspan="4">{{ ucfirst($month) }}</td>
                    </tr>
                    <tr>
                        <td>Temperature</td>
                        @for ($day = 1; $day <= 31; $day++)
                            <td contenteditable="true" data-month="{{ $month }}" data-day="{{ $day }}" data-type="temperature"></td>
                        @endfor
                    </tr>
                    <tr>
                        <td>Staff Signature</td>
                        @for ($day = 1; $day <= 31; $day++)
                            <td contenteditable="true" data-month="{{ $month }}" data-day="{{ $day }}" data-type="staff_signature"></td>
                        @endfor
                    </tr>
                    <tr>
                        <td>Lab Supervisor</td>
                        @for ($day = 1; $day <= 31; $day++)
                            <td contenteditable="true" data-month="{{ $month }}" data-day="{{ $day }}" data-type="supervisor_signature"></td>
                        @endfor
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

    </body>

    <script>
        // Update date fields when month/year changes
        document.getElementById('monthYear').addEventListener('change', function () {
            const [year, month] = this.value.split('-');
            const daysInMonth = new Date(year, month, 0).getDate();

            document.querySelectorAll('#tissueProcessorTable tbody tr').forEach((row, index) => {
                const day = index + 1;
                const dateInput = row.querySelector('.date-input');

                if (day <= daysInMonth) {
                    dateInput.value = `${year}-${month}-${day.toString().padStart(2, '0')}`;
                    dateInput.disabled = false;
                    row.style.display = '';
                } else {
                    dateInput.value = '';
                    dateInput.disabled = true;
                    row.style.display = 'none';
                    // Clear other fields for this day
                    row.querySelectorAll('input:not(.date-input)').forEach(input => input.value = '');
                }
            });
        });

        function fetchTissueProcessorData() {
            // alert('hello');
            const instrumentId = document.getElementById('instrumentId').value;
            const monthYear = document.getElementById('monthYear').value;

            if (!instrumentId || !monthYear) return;

            fetch(`/tissue-processor-logs/fetch?month_year=${monthYear}&instrument_id=${instrumentId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        clearTissueProcessorForm();

                        if (data.logs && data.logs.length > 0) {
                            data.logs.forEach(log => {
                                const day = new Date(log.log_date).getDate();
                                const row = document.querySelector(`tr[data-day="${day}"]`);

                                if (row) {
                                    row.querySelector(`input[name="logs[${day}][date]"]`).value = log.log_date;
                                    row.querySelector(`input[name="logs[${day}][cleaning_status]"]`).value = log.cleaning_status || '';

                                    // Format time values properly
                                    const formatTime = (time) => time ? time.substring(0, 5) : '';

                                    row.querySelector(`input[name="logs[${day}][processor_timing]"]`).value = formatTime(log.processor_timing);
                                    row.querySelector(`input[name="logs[${day}][calibrated_timing]"]`).value = formatTime(log.calibrated_timing);

                                    row.querySelector(`input[name="logs[${day}][comments]"]`).value = log.comments || '';
                                    row.querySelector(`input[name="logs[${day}][staff_signature]"]`).value = log.staff_signature || '';
                                    row.querySelector(`input[name="logs[${day}][supervisor_signature]"]`).value = log.supervisor_signature || '';
                                }
                            });
                        }
                    } else {
                        alert('Error fetching data: ' + (data.message || 'Unknown error'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error fetching data');
                });
        }

        function clearTissueProcessorForm() {
            document.querySelectorAll('#tissueProcessorTable tbody input').forEach(input => {
                if (!input.classList.contains('date-input')) {
                    input.value = '';
                }
            });
        }

        function submitTissueProcessorLog() {
            const monthYear = document.getElementById('monthYear').value;
            const instrumentId = document.getElementById('instrumentId').value;

            if (!monthYear || !instrumentId) {
                alert('Please select both Month/Year and Instrument');
                return;
            }

            const formData = {
                month_year: monthYear,
                instrument_id: instrumentId,
                logs: []
            };

            // Collect data for each visible day
            document.querySelectorAll('#tissueProcessorTable tbody tr').forEach(row => {
                if (row.style.display !== 'none') {
                    const day = row.getAttribute('data-day');
                    const dateInput = row.querySelector(`input[name="logs[${day}][date]"]`);

                    // Only include days with valid dates
                    if (dateInput.value) {
                        formData.logs.push({
                            date: dateInput.value,
                            cleaning_status: row.querySelector(`input[name="logs[${day}][cleaning_status]"]`).value,
                            processor_timing: row.querySelector(`input[name="logs[${day}][processor_timing]"]`).value,
                            calibrated_timing: row.querySelector(`input[name="logs[${day}][calibrated_timing]"]`).value,
                            comments: row.querySelector(`input[name="logs[${day}][comments]"]`).value,
                            staff_signature: row.querySelector(`input[name="logs[${day}][staff_signature]"]`).value,
                            supervisor_signature: row.querySelector(`input[name="logs[${day}][supervisor_signature]"]`).value
                        });
                    }
                }
            });

            fetch('/tissue-processor-logs/store', {
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
                        alert('Log saved successfully!');
                      location.reload();
                    } else {
                        let errorMessage = 'Error saving data';
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
                    alert('An error occurred while saving data');
                });
        }





        //////////////////#0078d7

        document.addEventListener('DOMContentLoaded', function () {
    const monthYearInput = document.getElementById('logMonthYear');
    if (!monthYearInput.value) {
        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0');
        monthYearInput.value = `${year}-${month}`;
    }

    // Load data when instrument or month changes
    document.getElementById('logMonthYear').addEventListener('change', fetchTemperatureLog);
    document.getElementById('instrumentSelect').addEventListener('change', fetchTemperatureLog);
});

function submitTemperatureLog() {
    const monthYear = document.getElementById('logMonthYear').value;
    const instrumentId = document.getElementById('instrumentSelect').value;

    if (!monthYear || !instrumentId) {
        alert('Please select Month/Year and Instrument');
        return;
    }

    // Prepare data object
    const data = {
        month_year: `${monthYear}-01`, // Add day to make it valid date
        instrument_id: instrumentId,
        temperature: {},
        staff_signature: {},
        supervisor_signature: {}
    };

    // Process all months
    const months = ['january', 'february', 'march', 'april', 'may', 'june',
                   'july', 'august', 'september', 'october', 'november', 'december'];

    months.forEach(month => {
        data.temperature[month] = {};
        data.staff_signature[month] = {};
        data.supervisor_signature[month] = {};

        // Process each day (1-31)
        for (let day = 1; day <= 31; day++) {
            // Get temperature cells
            const tempCell = document.querySelector(`[data-month="${month}"][data-day="${day}"][data-type="temperature"]`);
            data.temperature[month][day] = tempCell ? tempCell.textContent.trim() : '';

            // Get staff signature cells
            const staffCell = document.querySelector(`[data-month="${month}"][data-day="${day}"][data-type="staff_signature"]`);
            data.staff_signature[month][day] = staffCell ? staffCell.textContent.trim() : '';

            // Get supervisor signature cells
            const supervisorCell = document.querySelector(`[data-month="${month}"][data-day="${day}"][data-type="supervisor_signature"]`);
            data.supervisor_signature[month][day] = supervisorCell ? supervisorCell.textContent.trim() : '';
        }
    });

    // Send data to server
    fetch("{{ route('tissue-processor.store') }}", {
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
            alert('Data saved successfully');
        } else {
            alert('Error: ' + (data.message || 'Failed to save data'));
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while saving data');
    });
}

function fetchTemperatureLog() {
    const monthYear = document.getElementById('logMonthYear').value;
    const instrumentId = document.getElementById('instrumentSelect').value;

    if (!monthYear || !instrumentId) return;

    fetch("{{ route('tissue-processor.fetch') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            month_year: `${monthYear}-01`, // Add day to make it valid date
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
            const months = ['january', 'february', 'march', 'april', 'may', 'june',
                          'july', 'august', 'september', 'october', 'november', 'december'];

            months.forEach(month => {
                for (let day = 1; day <= 31; day++) {
                    // Update temperature cells
                    const tempCell = document.querySelector(`[data-month="${month}"][data-day="${day}"][data-type="temperature"]`);
                    if (tempCell && data.data.temperature && data.data.temperature[month]) {
                        tempCell.textContent = data.data.temperature[month][day] || '';
                    }

                    // Update staff signature cells
                    const staffCell = document.querySelector(`[data-month="${month}"][data-day="${day}"][data-type="staff_signature"]`);
                    if (staffCell && data.data.staff_signature && data.data.staff_signature[month]) {
                        staffCell.textContent = data.data.staff_signature[month][day] || '';
                    }

                    // Update supervisor signature cells
                    const supervisorCell = document.querySelector(`[data-month="${month}"][data-day="${day}"][data-type="supervisor_signature"]`);
                    if (supervisorCell && data.data.supervisor_signature && data.data.supervisor_signature[month]) {
                        supervisorCell.textContent = data.data.supervisor_signature[month][day] || '';
                    }
                }
            });
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

        // function dailyQCLog() {
        //     alert("Form Submitted!, ID not found");
        //     location.reload();
        // }
        // function dailyQCLog2() {
        //     alert("Form Submitted");
        //     location.reload();
        // }



    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            initializeTable1();
        });

        function initializeTable1() {
            const tasks = [
                "Cleaning from outside",
                "Temperature Check",
                "Lab Staff Signature",
                "Lab Supervisor Signature",

            ];

            const tbody = document.querySelector('#maintenance-logs1 tbody');
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

        function fetchLog1() {
            const monthInput = document.getElementById('monthYearInput1');
            const equipmentSelect = document.getElementById('instrumentSelect1');
            const equipmentId = equipmentSelect.value;

            if (!monthInput.value || !equipmentId) {
                // Don't show alert here as it might trigger during initial selection
                return;
            }

            console.log('Fetching data for:', monthInput.value, equipmentId);

            const tbody = document.querySelector('#maintenance-logs1 tbody');
            tbody.innerHTML = '<tr><td colspan="32" class="text-center">Loading data...</td></tr>';

            fetch(`/hot-plate-maintenance/fetch?month=${monthInput.value}&equipment_id=${equipmentId}`, {
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
                            populateMaintenanceTable1(data.data);
                            // Update department if it exists in the first record
                            // if (data.data[0].department) {
                            //     document.getElementById('department2').value = data.data[0].department;
                            // }
                        } else {
                            initializeTable1();
                            alert('No maintenance records found for selected criteria');
                        }
                    } else {
                        throw new Error(data.message || 'Failed to fetch data');
                    }
                })
                .catch(error => {
                    console.error('Fetch Error:', error);
                    initializeTable1();
                    alert('Error loading maintenance data: ' + error.message);
                });
        }
        // Populate table with maintenance data
        function populateMaintenanceTable1(logs) {
            const tbody = document.querySelector('#maintenance-logs1 tbody');
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
        function dailyQCLog1() {
            const monthInput = document.getElementById('monthYearInput1');
            const equipmentSelect = document.getElementById('instrumentSelect1');
            const equipmentId = equipmentSelect.value;
            //const department = document.getElementById('department2').value;

            if (!monthInput.value || !equipmentId) {
                alert('Please select a month/year, select equipment ');
                return;
            }


            const rows = document.querySelectorAll('#maintenance-logs1 tbody tr');
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
            const submitBtn = document.querySelector('button[onclick="dailyQCLog1()"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch('/hot-plate-maintenance/store', {
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
                        fetchLog1(); // Refresh the data
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

    </script>

    <script>
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

    </html>


@endsection