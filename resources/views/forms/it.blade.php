@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>IT</title>
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
                <div style="font-size: 20px; ">IT </div>

            </div>
            <div class="icon-view">
                <div class="pc-content">
                    <div class="pc-folder" onclick="showSection('lis-interface-validation-log')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label">LIS Interface Validation Log</span>
                    </div>
                    <div class="pc-folder" onclick="showSection('lis-user-form')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label"> LIS User ID & Mail ID Creation Login Form </span>
                    </div>
                    <div class="pc-folder" onclick="showSection('lis-validation-record')">
                        <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                        <span class="pc-folder-label"> LIS Validation Record</span>
                    </div>

                </div>
            </div>
        </div>


        <!-- Sections -->
        <div id="lis-interface-validation-log" class="main inactive">
            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/IT/001</strong></label>
                    <label class="doc-detail">Doc Name: <strong>LIS Interface Validation Log</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" id="submitBtn1">Submit</button>
                </div>
            </div>

            <!-- Back Button -->
            <div class="mt-3 mb-3">
                <button class="button" onclick="goBack(this)">
                <svg class="svgIcon" viewBox="0 0 384 512">
                    <path d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z" transform="rotate(-90, 192, 256)"></path>
                </svg>
                </button>
            </div>

            <div class="table-responsive mt-4">
                <table class="stock-planner-table">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Department:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td contenteditable="true">Analyzer</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td contenteditable="true">Analyzer Sr. No.</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td contenteditable="true">Analyzer Type</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td contenteditable="true">Validation</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Remark:</td>
                        </tr>
                        <tr>
                            <td contenteditable="true">6</td>
                            <td contenteditable="true">Remarks: Machine raw data and report value are matching properly.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="table-responsive mt-4">
                <table class="stock-planner-table" id="testsTable">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Device</th>
                            <th>Assay Code</th>
                            <th>Test Name</th>
                            <th>Equipment</th>
                            <th>LIS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td contenteditable="true">1</td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                            <td contenteditable="true"></td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-primary m-1" id="addRowBtn1">+</button>
            </div>
        </div>

        <div id="lis-user-form" class="main inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/IT/002</strong></label>
                    <label class="doc-detail">Doc Name: <strong>LIS User ID & Mail ID Creation Login Form</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <!-- <button type="button" class="btn btn-warning">Submit</button> -->
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



            <div class="table-responsive">
                <table class="stock-planner-table">

                    <form id="lisUserForm">
                        @csrf
                        <tr>
                            <th colspan="4" class="header">IT DEPARTMENT</th>
                        </tr>
                        <tr>
                            <td>Date:</td>
                            <td><input type="date" name="date"></td>
                            <td>Employee No.:</td>
                            <td><input type="text" name="employee_no"></td>
                        </tr>
                        <tr>
                            <td>Employee Name:</td>
                            <td><input type="text" name="employee_name"></td>
                            <td>Department:</td>
                            <td><input type="text" name="department"></td>
                        </tr>
                        <tr>
                            <td>Email ID:</td>
                            <td><input type="email" name="email"></td>
                            <td>LIS Login ID:</td>
                            <td><input type="text" name="lis_login_id"></td>
                        </tr>
                        <tr>
                            <td>Requested By:</td>
                            <td colspan="3"><input type="text" name="requested_by"></td>
                        </tr>
                        <tr>
                            <th>User Role</th>
                            <th>Y/N</th>
                            <th>User Role</th>
                            <th>Y/N</th>
                        </tr>
                        <tr>
                            <td>Accounts</td>
                            <td><input type="checkbox" name="user_roles[]" value="Accounts"></td>
                            <td>Lab User</td>
                            <td><input type="checkbox" name="user_roles[]" value="Lab User"></td>
                        </tr>
                        <tr>
                            <td>Accounts Admin</td>
                            <td><input type="checkbox" name="user_roles[]" value="Accounts Admin"></td>
                            <td>Customer Care</td>
                            <td><input type="checkbox" name="user_roles[]" value="Customer Care"></td>
                        </tr>
                        <tr>
                            <td>Billing</td>
                            <td><input type="checkbox" name="user_roles[]" value="Billing"></td>
                            <td>Doctor</td>
                            <td><input type="checkbox" name="user_roles[]" value="Doctor"></td>
                        </tr>
                        <tr>
                            <td>Front Office</td>
                            <td><input type="checkbox" name="user_roles[]" value="Front Office"></td>
                            <td>Quality Admin</td>
                            <td><input type="checkbox" name="user_roles[]" value="Quality Admin"></td>
                        </tr>
                        <tr>
                            <td>MIS</td>
                            <td><input type="checkbox" name="user_roles[]" value="MIS"></td>
                            <td>Purchase</td>
                            <td><input type="checkbox" name="user_roles[]" value="Purchase"></td>
                        </tr>
                        <tr>
                            <td>Histopathology</td>
                            <td><input type="checkbox" name="user_roles[]" value="Histopathology"></td>
                            <td>Front Office Supervisor</td>
                            <td><input type="checkbox" name="user_roles[]" value="Front Office Supervisor"></td>
                        </tr>
                        <tr>
                            <td>Sample Collection</td>
                            <td><input type="checkbox" name="user_roles[]" value="Sample Collection"></td>
                            <td>Collection Boy</td>
                            <td><input type="checkbox" name="user_roles[]" value="Collection Boy"></td>
                        </tr>
                        <tr>
                            <td>Front Office Manager</td>
                            <td><input type="checkbox" name="user_roles[]" value="Front Office Manager"></td>
                            <td>Dispatch</td>
                            <td><input type="checkbox" name="user_roles[]" value="Dispatch"></td>
                        </tr>
                        <tr>
                            <td>Authorized by:</td>
                            <td><input type="text" name="authorized_by"></td>
                            <td>Reason:</td>
                            <td><input type="text" name="reason"></td>
                        </tr>
                        <tr>
                            <td colspan="4" style="text-align: center !important;">To be filled by the IT Department</td>
                        </tr>
                        <tr>
                            <td>Login Created:</td>
                            <td><input type="text"></td>
                            <td>Date:</td>
                            <td><input type="date"></td>
                        </tr>
                        <tr>
                            <td>Login Created by:</td>
                            <td><input type="text"></td>
                            <td>Sign:</td>
                            <td><input type="text"></td>
                        </tr>
                        <button type="submit" class=" btn btn-primary">Submit</button>
                    </form>
                </table>
            </div>

        </div>

        <div id="lis-validation-record" class="main  inactive">

            <div class="d-flex align-items-center heading mb-4 expandedHeading">
                <div class="d-flex align-items-center expandedHeadingVisible">
                    <label class="doc-detail">Doc No.: <strong>TDPL/HYD/IT/003</strong></label>
                    <label class="doc-detail">Doc Name: <strong>LIS Validation Record</strong></label>
                    <label class="doc-detail">Issue No.: <strong>01</strong></label>
                    <label class="doc-detail">Issue Date: <strong>10.08.2024</strong></label>
                    <button type="button" class="btn btn-warning" id="submitBtn2">Submit</button>
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


            <div class="table-responsive mt-4">
                <table class="stock-planner-table">
                    <thead>
                        <th>Sr. No. </th>
                        <th>Department:</th>
                    </thead>
                    <tbody>

                        <tr>
                            <td>1</td>
                            <td>From Registration:</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Sample Received in Department</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Result Transfer from Analyzer to IT DOSEA</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Result Validation:</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Remark</td>
                        </tr>
                        <tr>
                            <td contenteditable="true"> </td>
                            <td>Remarks: Machine raw data and report value are matching properly.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="table-responsive mt-4">
                <table class="stock-planner-table" id="validTable">
                    <thead>
                        <th>Sr. No. </th>
                        <th>Device</th>
                        <th>Assay Code</th>
                        <th>Test Name</th>
                        <th>Equipment</th>
                        <th>LIS</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td contenteditable="true">1</td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                            <td contenteditable="true"> </td>
                        </tr>

                    </tbody>
                </table>
                <button class="btn btn-primary m-1" id="addRowBtn2">+</button>

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

        // Add new row to tests table
        document.getElementById('addRowBtn1').addEventListener('click', function () {
            const tbody = document.querySelector('#testsTable tbody');
            const newRow = tbody.insertRow();
            const rowCount = tbody.rows.length;

            // Create cells
            ['', '', '', '', '', ''].forEach((content, index) => {
                const cell = newRow.insertCell();
                cell.contentEditable = 'true';
                cell.textContent = index === 0 ? rowCount : content;
            });
        });

        // Submit form data
        document.getElementById('submitBtn1').addEventListener('click', function () {
            // Get analyzer data
            // const analyzerRows = document.querySelectorAll('#analyzerTable tbody tr');
            // const analyzerData = {
            //     department: analyzerRows[0].cells[1].textContent.trim(),
            //     analyzer_sr_no: analyzerRows[1].cells[1].textContent.trim(),
            //     analyzer_type: analyzerRows[2].cells[1].textContent.trim(),
            //     validation: analyzerRows[3].cells[1].textContent.trim(),
            //     remarks: analyzerRows[5].cells[1].textContent.trim()
            // };

            // Get tests data
            const testRows = document.querySelectorAll('#testsTable tbody tr');
            const testsData = [];

            testRows.forEach(row => {
                const cells = row.cells;
                testsData.push({
                    sr_no: cells[0].textContent.trim(),
                    device: cells[1].textContent.trim(),
                    assay_code: cells[2].textContent.trim(),
                    test_name: cells[3].textContent.trim(),
                    equipment: cells[4].textContent.trim(),
                    lis: cells[5].textContent.trim()
                });
            });

            // Prepare complete data
            const formData = {
                // analyzer: analyzerData,
                tests: testsData
            };

            // Send to server
            fetch('/lis-interface-logs-store', {
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
                        alert('Data saved successfully!');
                    } else {
                        alert('Error: ' + (data.message || 'Failed to save data'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to save data');
                });
        });

        // Load saved data
        function loadLisData() {
            fetch('/lis-interface-logs')
                .then(response => response.json())
                .then(data => {
                    // if (data.analyzer) {
                    //     // Update analyzer table
                    //     const analyzerRows = document.querySelectorAll('#analyzerTable tbody tr');
                    //     analyzerRows[1].cells[1].textContent = data.analyzer.analyzer_sr_no || '';
                    //     analyzerRows[2].cells[1].textContent = data.analyzer.analyzer_type || '';
                    //     analyzerRows[5].cells[1].textContent = data.analyzer.remarks || '';
                    // }

                    if (data.tests && data.tests.length > 0) {
                        // Update tests table
                        const tbody = document.querySelector('#testsTable tbody');

                        // Clear existing rows
                        while (tbody.rows.length > 0) {
                            tbody.deleteRow(0);
                        }

                        // Add new rows with data
                        data.tests.forEach((test, index) => {
                            const newRow = tbody.insertRow();
                            newRow.innerHTML = `
                                                                                <td contenteditable="true">${index + 1}</td>
                                                                                <td contenteditable="true">${test.device || ''}</td>
                                                                                <td contenteditable="true">${test.assay_code || ''}</td>
                                                                                <td contenteditable="true">${test.test_name || ''}</td>
                                                                                <td contenteditable="true">${test.equipment || ''}</td>
                                                                                <td contenteditable="true">${test.lis || ''}</td>
                                                                            `;
                        });
                    }
                })
                .catch(error => {
                    console.error('Error loading data:', error);
                });
        }

        // Load data when page loads
        document.addEventListener('DOMContentLoaded', loadLisData);


        // Helper function to safely escape the ID
        function escapeSelector(selector) {
            return selector.replace(/([!\"#$%&'()*+,\-./:;<=>?@[\\\]^`{|}~])/g, '\\$1');
        }

        // Submit form function



    </script>
    <script type="text/javascript">
        function saveTableData() {
            alert('Data submitting, Id Not found');
            let table = document.getElementById("maintenancelogs"); // Get the table by ID
            let tableRows = table.querySelectorAll("tbody tr"); // Select all rows inside the table body
            let rowDataArray = [];

            tableRows.forEach(row => {
                let rowData = {
                    // sr_no: row.cells[0].innerText.trim(),
                    device: row.cells[1].innerText.trim(),
                    assay_code: row.cells[2].innerText.trim(),
                    test_name: row.cells[3].innerText.trim(),
                    equipment: row.cells[4].innerText.trim(),
                    lis: row.cells[5].innerText.trim()
                };
                rowDataArray.push(rowData);
            });

            fetch("/save-table-data", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content // If using Laravel
                },
                body: JSON.stringify({ table_data: rowDataArray })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert("Table data saved successfully!");
                    } else {
                        alert("Failed to save data.");
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert("An error occurred while saving data.");
                });
        }

        // function loginForm() {
        //     alert("Form Submitted");
        //     location.reload();
        // } function validationRecord() {
        //     alert("Error: Column not found");
        //     location.reload();

        // }

        //..................................................................................................................
        document.getElementById('addRowBtn2').addEventListener('click', function () {
            const tbody = document.querySelector('#validTable tbody');
            const newRow = tbody.insertRow();
            const rowCount = tbody.rows.length;

            // Create cells
            ['', '', '', '', '', ''].forEach((content, index) => {
                const cell = newRow.insertCell();
                cell.contentEditable = 'true';
                cell.textContent = index === 0 ? rowCount : content;
            });
        });

        // Submit form data
        document.getElementById('submitBtn2').addEventListener('click', function () {

            const testRows = document.querySelectorAll('#validTable tbody tr');
            const testsData = [];

            testRows.forEach(row => {
                const cells = row.cells;
                testsData.push({
                    sr_no: cells[0].textContent.trim(),
                    device: cells[1].textContent.trim(),
                    assay_code: cells[2].textContent.trim(),
                    test_name: cells[3].textContent.trim(),
                    equipment: cells[4].textContent.trim(),
                    lis: cells[5].textContent.trim()
                });
            });

            // Prepare complete data
            const formData = {
                // analyzer: analyzerData,
                tests: testsData
            };

            // Send to server
            fetch('/lis-validation-records', {
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
                        alert('Data saved successfully!');
                    } else {
                        alert('Error: ' + (data.message || 'Failed to save data'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to save data');
                });
        });

        // Load saved data
        function loadLisData2() {
            fetch('/lis-validation-records/latest')
                .then(response => response.json())
                .then(data => {

                    if (data.tests && data.tests.length > 0) {
                        // Update tests table
                        const tbody = document.querySelector('#validTable tbody');

                        // Clear existing rows
                        while (tbody.rows.length > 0) {
                            tbody.deleteRow(0);
                        }

                        // Add new rows with data
                        data.tests.forEach((test, index) => {
                            const newRow = tbody.insertRow();
                            newRow.innerHTML = `
                                                                                        <td contenteditable="true">${index + 1}</td>
                                                                                        <td contenteditable="true">${test.device || ''}</td>
                                                                                        <td contenteditable="true">${test.assay_code || ''}</td>
                                                                                        <td contenteditable="true">${test.test_name || ''}</td>
                                                                                        <td contenteditable="true">${test.equipment || ''}</td>
                                                                                        <td contenteditable="true">${test.lis || ''}</td>
                                                                                    `;
                        });
                    }
                })
                .catch(error => {
                    console.error('Error loading data:', error);
                });
        }

        // Load data when page loads
        document.addEventListener('DOMContentLoaded', loadLisData2);


        //........................................................................................................
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("lisUserForm").addEventListener("submit", function (e) {
                e.preventDefault();

                let formData = new FormData(this);

                let userRoles = [];
                document.querySelectorAll("input[name='user_roles[]']:checked").forEach((checkbox) => {
                    userRoles.push(checkbox.value);
                });
                formData.append("user_roles", JSON.stringify(userRoles));

                fetch("{{ route('lis-user-requests.store') }}", {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                        "Accept": "application/json" // Ensure Laravel returns JSON
                    },
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error("Network response was not OK");
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            alert(data.message);
                            document.getElementById("lisUserForm").reset();
                        } else {
                            alert("Failed to submit form. Please check your inputs.");
                        }
                    })
                    .catch(error => console.error("Error:", error));
            });
        });

    </script>

    </html>


@endsection