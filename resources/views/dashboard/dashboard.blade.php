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
        <script rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"></script>
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
            text-align: center !important;
            border: 1px solid #ddd !important;
        }

        .stock-planner-table th {
            background-color: #007BFF !important;
            color: white !important;
            position: sticky;
            top: 0;
            /* Keeps the header at the top */
            z-index: 2;
            /* Ensures header stays above other content */
            background-color: #007137;
            /* Header background color */
            color: white;
            /* Header text color */
            text-align: center;
            padding: 10px;
            border: 1px solid #ddd;
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

        /* fOR PIVOT */
        .pivot-container1 {
            width: 100%;
            /* max-width: 600px;
                                                                  margin: 50px auto; */
            background-color: white;
            border-radius: 8px;
            /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); */
            /* overflow: hidden; */
        }

        .pivot-tabs1 {
            display: flex;
            background-color: #ffff;
            padding: 5px;
            border: 1px solid #b1b1b1;
            border-radius: 10px;
            /* width: 30%; */
            height: fit-content;


            /* position: relative;
                                                                    left: 60%; */
        }

        .pivot-tab1 {
            flex: 1;
            background: transparent;
            border: none;
            cursor: pointer;
            font-size: 12px;
            text-align: center;
        }

        .pivot-tab1.active {
            color: #005a9e;
            background-color: lightblue;
            font-weight: bold;
            border-radius: 5px;
            /* padding: 0.8rem; */
        }

        .pivot-content1 {
            padding: 10px 0;
        }

        .pivot-panel1 {
            display: none;
        }

        .pivot-panel1.active {
            display: block;
        }

        /* fOR PIVOT */
        .pivot-container2 {
            width: 100%;
            /* max-width: 600px;
                                                                  margin: 50px auto; */
            background-color: white;
            border-radius: 8px;
            /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); */
            /* overflow: hidden; */
        }

        .pivot-tabs2 {
            display: flex;
            background-color: #ffff;
            padding: 5px;
            border: 1px solid #b1b1b1;
            border-radius: 10px;
            /* width: 30%; */
            height: fit-content;


            /* position: relative;
                                                                    left: 60%; */
        }

        .pivot-tab2 {
            flex: 1;
            background: transparent;
            border: none;
            cursor: pointer;
            font-size: 12px;
            text-align: center;
        }

        .pivot-tab2.active {
            color: #005a9e;
            background-color: lightblue;
            font-weight: bold;
            border-radius: 5px;
            /* padding: 0.8rem; */
        }

        .pivot-content2 {
            padding: 10px 0;
        }

        .pivot-panel2 {
            display: none;
        }

        .pivot-panel2.active {
            display: block;
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



        .form-container-search {

            background-color: #ffff;
            padding: 5px;
            border: 1px solid #b1b1b1;
            border-radius: 10px;
            /* width: 30%; */
            height: fit-content;
            display: flex;
            gap: 10px;
            align-items: center;
            /* max-width: 400px; */
        }



        .form-container-search .form-group {
            margin-bottom: 0;
        }

        .form-container-search label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        .form-container-search input[type="date"],
        .form-container-search select {
            width: 100%;
            padding: 10px;
            font-size: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container-search input[type="date"]:focus,
        .form-container-search.form-container-search select:focus {
            border-color: #007bff;
            outline: none;
        }

        .form-container-search button {
            /* width: 100%; */
            height: fit-content;
            padding: 10px;
            font-size: 12px;
            background: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .form-container-search button:hover {
            background: #0056b3;
        }

        /* Heatmap Table Styles */
        .heatmap {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .heatmap th,
        .heatmap td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        /* .heatmap th {
                                                                    background-color: #0073e6;
                                                                    color: white;
                                                                } */

        .heatmap td.low {
            background-color: #69b216;
            /* Green */
            color: rgb(255, 255, 255);
        }

        .heatmap td.medium {
            background-color: #f2cc00;
            /*light Yellow */
            color: rgb(255, 255, 255);
        }

        .heatmap td.hmedium {
            background-color: #ffa001;
            /* Yellow */
            color: rgb(255, 255, 255);
        }

        .heatmap td.high {
            background-color: #d0021a;
            /* Light Red */
            color: rgb(255, 255, 255);
        }

        .heatmap td.critical {
            background-color: #850102;
            /* Dark Red */
            color: rgb(255, 255, 255);
        }

        .heatmap td span {

            background-color: white;
            border-radius: 50%;
            color: black;
            padding: 0px 6px;
            font-size: smaller;
            cursor: pointer;

        }

        .heatmap td span:hover {
            color: #36c;
            text-decoration: underline;
        }

        .diagonal-header div {
            font-size: 10px;
        }

        .cardStyle {
            background-color: #fff;
            border: 1px solid lightgray;
            border-radius: 5px;
            padding: .5rem;
            margin: .5rem;
            box-sizing: border-box;
            transition: transform .3s ease-in-out;
            flex: 1 1 auto;
        }

        .cardStyle:hover {
            transform: translateY(-10px);
            box-shadow: 13px 6px 17px 11px #d9d9d9, -6px -6px 12px #e7e7e7;
        }


        .cardStyle h3::after {
            content: '';
            display: block;
            height: 4px;
            width: 0px;
            border-radius: 5px;
            background-color: #0056b3;
            transition: width .3s ease-in-out;
        }

        .cardStyle:hover>h3::after {
            width: 100%;
        }

        #QualityIndicator .RiskSections,

        #RiskManagement .RiskSections {
            background-color: #fff;
            border: 1px solid lightgray;
            border-radius: 5px;
            padding: .5rem;
            margin: .5rem;
            box-sizing: border-box;
            transition: transform .3s ease-in-out;
            flex: 1 1 auto;
        }

        #RiskManagement .RiskSections:hover {
            transform: translateY(-10px);
            box-shadow: 13px 6px 17px 11px #d9d9d9, -6px -6px 12px #e7e7e7;
        }

        #test2 .dashboard {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        #test2 .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #test2 .progress-bar {
            height: 10px;
            background: #4caf50;
            width: 0;
            transition: width 1s;
        }

        #test2 table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        #test2 th,
        #test2 td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        #test2 .status-icon {
            color: red;
        }

        #test2 .dashboard1 {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;


        }

        #test2 .dashboard1 .card {

            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            min-width: 300px;
            text-align: center;


        }

        #test2 .dashboard1 .card h3 {
            margin-bottom: 10px;
            color: #333;
        }

        #test2 .dashboard1 .card .info {
            background: #f9f9f9;
            padding: 12px;
            margin: 8px 0;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-weight: bold;
            flex-direction: column;
            color: #444;


        }

        #test2 .dashboard1 .card .info i {
            color: #007bff;
            font-size: 3rem;
        }

        #test2 .dashboard1 .card .info strong {

            font-size: 3rem;
        }
    </style>
    <style>

    </style>

    @php
        $folderLabels = [
            'Sample Rejection Log',
            'Sample Volume Check Log',
            'Sample Receiving Record',
            'Outsourcing Samples Record',
            'First Aid Kit Monitoring Log',
            'Record of Specimen Signatures',
            'Distilled Water Plant Checklist',
            'Sensacore Aqua ST-200 Maintenance log',
            'Beckman Coulter DxI800 Maintenance Log',
            'Beckman Coulter DxI800 Maintenance Logs',
            'Document Checklist',
            'Laboratory Safety Assessment',
            'Competency Assessment Form',
            'Laura M - Maintenance Log',
            'Seman Fructose QC Log',
            'Daily Urine QC Log',
            '01 - Read & Understood',
            '02 - Analyte Calibration Log',
            '03 - Maintenance Log Of Microscope',
            '04 - Maintenance Log of Centrifuge',
            '05 - Room Temperature & Humidity Log',
            '06 - New Reagent Lot Verification',
            '07 - Reagent Usage Log',
            '08 - Retained Sample Verification',
            '09 - Report Amendment Log',
            '10 - Inter-Personnel Validation Record',
            '11 - Corrective Action & Preventive Action Log for EQAS Outliers',
            '12 - Critical Call Monitoring Log',
            '13 - Daily Cleaning Checklist for Lab',
            '14 - Daily Cleanliness Log for Rest Room',
            '15 - Daily Preparation of 1% Sodium Hypochlorite Solution',
            '16 - Refrigeration Temperature',
            '17 - Deep Freezer Temperature Log',
            '18 - Transcription Check Record',
            '19 - Instrument Breakdown Record',
            '20 - Non-Conformity and Corrective Action Log',
            '21 - Sample Discard Log',
            '22 - Inter-Laboratory Comparison',
            '23 - Staff Suggestions Form',
            '24 - Customer Feedback Form',
            '25 - Physician Feedback Form',
            '26 - Startup and Shutdown Log',
            '27 - Repeat Test Log',
            '28 - Eye Wash Monitoring Form',
            '29 - 70% IPA Preparation Form',
            '30 - Laboratory Incident Form',
            '31 - Daily IQC Data Monitoring Log',
            '32 - EQAS Sample Processing Log',
            '33 - Daily IQC Outlier Corrective Action & Preventive Action Log',
            'HORIBA Yumizen H550 Maintenance log',
            'Beckman Coulter DXH560 Maintenance Log',
            'Daily QC Log for Hot Plate Maintenance',
            'Tissue Processor Timing Accuracy Log',
            'Daily Temperature Log for Tissue Processor',
            'LIS Interface Validation Log',
            'LIS User ID & Mail ID Creation Login Form',
            'LIS Validation Record',
            'Bio Safety Cabinet Maintenance Log',
            'Laminar Airflow Maintenance Log',
            'Hot Air Oven Temperature Monitoring Log',
            'Hot Air Oven Maintenance Log',
            'Incubator Temperature Monitoring Log',
            'Incubator Maintenance Log',
            'Bact Alert Maintenance Log',
            'Vitek 2 Maintenance Log',
            'Autoclave Maintenance Log',
            'Autoclave Chemical Indicator Monitoring Log',
            'Autoclave Biological Indicator Monitoring Log',
            'Bio Safety Cabinet Maintenance Log',
            'Cooling Centrifuge Maintenance Sheet',
            'Needle Stick Injury',
            'Accident-Incident Reporting Log',
            'Vaccination Monitoring Log',
            'Biomedical Waste Monitoring Log',
        ];
    @endphp

    <body>
        <div class="main " id="EnterAuditDetails" style="overflow: auto;height: calc(100vh - 70px);">
            <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
                <div style="font-size: 20px;">Dashboard</div>
                <div style="font-size: 20px;">

                    <form id="labForm" method="GET" action="{{ url()->current() }}">
                        <select id="labSelect" name="lab_id" class="form-control">
                            <option value="">-- Select Labs --</option>
                            @foreach ($labs as $lab)
                                <option value="{{ $lab->id }}" {{ request('lab_id') == $lab->id ? 'selected' : '' }}>
                                    {{ $lab->location }}
                                </option>
                            @endforeach
                        </select>
                    </form>




                </div>
            </div>




            <div class="pivot-tabs">

                <button class="pivot-tab active" data-target="QualityRecords">Quality Records</button>
                <!-- <button class="pivot-tab" data-target="tab4">Message</button> -->
                <button class="pivot-tab" data-target="QualityIndicator">Quality Indicator</button>
                <button class="pivot-tab" data-target="InternalQualityManagement">Internal Quality Management</button>
                <button class="pivot-tab" data-target="ExternalQualityManagement">External Quality Management</button>
                <button class="pivot-tab" data-target="DeviationsManagementDashboard">Deviations Management</button>
                <button class="pivot-tab" data-target="trainingdashboard">Training Management</button>
                <button class="pivot-tab" data-target="RiskManagement">Risk Management</button>
                <button class="pivot-tab" data-target="AuditFindingsdashboard">Audit Management</button>

            </div>

            <div class="pivot-content">
                <div class="pivot-panel active" id="QualityRecords">
                    <div class="table-responsive">
                        <table class=" stock-planner-table monthview">
                            <thead>
                                <tr style="position:sticky" class="fixedtr">
                                    <th rowspan="2">
                                        <div style="justify-content: space-around;">
                                            <span> Labs <i class="fa-solid fa-arrow-right"></i></span>
                                            <br>
                                            <span> <i class="fa-solid fa-arrow-down"></i> Forms</span>
                                        </div>
                                    </th>
                                    <th rowspan="2">Lab 01</th>
                                    <th rowspan="2">Lab 02</th>
                                    <th rowspan="2">Lab 03</th>
                                    <th rowspan="2">Lab 04</th>
                                    <th rowspan="2">Lab 05</th>
                                    <th rowspan="2">Lab 06</th>
                                    <th rowspan="2">Lab 07</th>
                                    <th rowspan="2">Lab 08</th>
                                    <th rowspan="2">Lab 09</th>
                                    <th rowspan="2">Lab 10</th>
                                    <th rowspan="2">Lab 11</th>
                                    <th rowspan="2">Lab 12</th>
                                    <th rowspan="2">Lab 13</th>
                                    <th rowspan="2">Lab 14</th>
                                    <th rowspan="2">Lab 15</th>
                                    <th rowspan="2">Lab 16</th>
                                    <th rowspan="2">Lab 17</th>
                                    <th rowspan="2">Lab 18</th>
                                    <th rowspan="2">Lab 19</th>
                                    <th rowspan="2">Lab 20</th>


                                </tr>
                            </thead>
                            <tbody>
                            <tbody>

                                <tr>
                                    <td style="background: #007137;color: white;font-weight: 600;" colspan="94">Department
                                        1</td>
                                </tr>
                                @foreach ($folderLabels as $label)
                                    <tr>
                                        <td>
                                            {{ $label }}
                                        </td>

                                        @for ($i = 1; $i <= 20; $i++)
                                            <td>
                                                <span><i class="fa-solid fa-circle-check" style="color: #147500;"></i></span>
                                            </td>
                                        @endfor

                                    </tr>
                                @endforeach

                            </tbody>
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="pivot-panel " id="QualityIndicator">
                    @include('dashboard/QualityIndicator')


                </div>
                <div class="pivot-panel " id="InternalQualityManagement">
                    @include('dashboard/InternalQualityManagement')


                </div>
                <div class="pivot-panel " id="RiskManagement">
                    @include('dashboard/RiskManagement')

                </div>
                <div class="pivot-panel " id="ExternalQualityManagement">
                    @include('dashboard/ExternalQualityManagement')

                </div>
                <div class="pivot-panel " id="trainingdashboard">
                    @include('dashboard/trainingdashboard')
                </div>

                <div class="pivot-panel " id="AuditFindingsdashboard">
                    @include('dashboard/auditdashboard')
                </div>
                <div class="pivot-panel " id="DeviationsManagementDashboard">
                    @include('dashboard/deviationsmanagementdashboard')
                </div>
            </div>

    </body>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById("QualityIndicatorChart").getContext("2d");

        const myLineChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["Labs1", "Labs2", "Labs1", "Labs2", "Labs1", "Labs2"], // X-axis labels
                datasets: [{
                    label: "No. of Errors",
                    data: [5, 8, 5, 8, 5, 8], // Y-axis values (errors)
                    borderColor: "red",
                    backgroundColor: "rgba(255, 88, 88, 0.2)",
                    borderWidth: 2,
                    tension: 0.4, // Smooth curve
                },],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: "No. of Errors",
                        },
                    },
                    x: {
                        title: {
                            display: true,
                            text: "Labs",
                        },
                    },
                },
            },
        });
    </script>
    <script>
        const divheight = document.getElementById('EnterAuditDetails')
        console.log(divheight.scrollHeight)
        divheight.addEventListener("scroll", () => {
            console.log(divheight.scrollHeight)
            document.querySelectorAll('.fixedtr').forEach((a) => {
                a.style.top = (divheight.scrollTop - 275) + 'px'
            })

        })
        document.addEventListener("DOMContentLoaded", () => {
            const tabs = document.querySelectorAll(".pivot-tab");
            const panels = document.querySelectorAll(".pivot-panel");
            debugger
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

        document.addEventListener("DOMContentLoaded", () => {
            const tabs = document.querySelectorAll(".pivot-tab1");
            const panels = document.querySelectorAll(".pivot-panel1");

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
        document.addEventListener("DOMContentLoaded", () => {
            const tabs = document.querySelectorAll(".pivot-tab2");
            const panels = document.querySelectorAll(".pivot-panel2");

            tabs.forEach((tab) => {
                tab.addEventListener("click", () => {
                    // Remove active class from all tabs and panels
                    tabs.forEach((t) => t.classList.remove("active"));
                    panels.forEach((p) => p.classList.remove("active"));

                    // Add active class to the clicked tab and corresponding panel
                    tab.classList.add("active");

                    const dateview = document.querySelectorAll('.dateview')
                    const monthview = document.querySelectorAll('.monthview')
                    debugger
                    if (tab.dataset.target === 'dateview') {
                        dateview.forEach((a) => {
                            a.style.display = ""
                        })
                        monthview.forEach((a) => {
                            a.style.display = "none"
                        })
                    } else {
                        dateview.forEach((a) => {
                            a.style.display = "none"
                        })
                        monthview.forEach((a) => {
                            a.style.display = ""
                        })
                    }
                    // const target = document.querySelectorAll('.' + tab.dataset.target);
                    // target.classList.add("active");
                });
            });
        });
    </script>
    <script>
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const pivotTabs = document.querySelectorAll('.pivot-tab');
            const pivotPanels = document.querySelectorAll('.pivot-panel');

            // When a tab is clicked
            pivotTabs.forEach(button => {
                button.addEventListener('click', function () {
                    const panelId = this.getAttribute('data-target');

                    // Save tab
                    localStorage.setItem('lastOpenedPanel', '#' + panelId);

                    // Update URL hash WITHOUT reloading
                    window.history.replaceState(null, '', window.location.pathname + window.location.search + '#' + panelId);

                    // Activate the clicked tab and show the panel
                    pivotTabs.forEach(tab => tab.classList.remove('active'));
                    this.classList.add('active');

                    pivotPanels.forEach(panel => panel.style.display = 'none');
                    const activePanel = document.getElementById(panelId);
                    if (activePanel) activePanel.style.display = 'block';
                });
            });

            // Restore last opened tab/panel
            const lastPanel = localStorage.getItem('lastOpenedPanel')?.replace('#', '');
            if (lastPanel) {
                const restoreButton = document.querySelector(`.pivot-tab[data-target="${lastPanel}"]`);
                if (restoreButton) restoreButton.click();
            } else {
                // Default: show ExternalQualityManagement
                const defaultButton = document.querySelector('.pivot-tab[data-target="ExternalQualityManagement"]');
                if (defaultButton) defaultButton.click();
            }

            // Handle lab dropdown
            const labSelect = document.getElementById('labSelect');
            const form = document.getElementById('labForm');

            labSelect.addEventListener('change', function () {
                const selectedLabId = labSelect.value;
                const currentTabId = localStorage.getItem('lastOpenedPanel')?.replace('#', '') || 'ExternalQualityManagement';

                const actionUrl = new URL(form.action, window.location.origin);
                actionUrl.searchParams.set('lab_id', selectedLabId);

                // Redirect to same page with selected tab as hash
                window.location.href = actionUrl.toString() + '#' + currentTabId;
            });

            // Scroll to panel based on URL hash (optional)
            const hash = window.location.hash;
            if (hash) {
                const target = document.querySelector(hash);
                if (target) {
                    setTimeout(() => {
                        target.scrollIntoView({ behavior: 'smooth' });
                    }, 300);
                }
            }
        });
    </script>








    </html>
@endsection