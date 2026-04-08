@extends('layouts.base')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LO</title>
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
            <div style="font-size: 20px; ">LO </div>

        </div>
        <div class="icon-view">
            <div class="pc-content">
                <div class="pc-folder" onclick="showSection('TDPL/LO/FOM-005')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">CSR Sample Tracking Sheet</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/LO/FOM-006')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">CSR Sample Tracking - Outliers</span>
                </div>



            </div>
        </div>
    </div>


    <x-formTemplete
        id="TDPL/LO/FOM-005"
        docNo="TDPL/LO/FOM-005"
        docName="CSR Sample Tracking Sheet"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <p style="font-size:14px;">
            <strong>Name of CSR:</strong> <input type="text" name="csr_name" style="border:1px solid #000; width:150px;">
            &nbsp;&nbsp;
            <strong>Route:</strong> <input type="text" name="route" style="border:1px solid #000; width:120px;">
            &nbsp;&nbsp;
            <strong>Route Start Time:</strong> <input type="text" name="route_start_time" style="border:1px solid #000; width:120px;">
            &nbsp;&nbsp;
            <strong>Odometer Reading - Starting KM:</strong>
            <input type="text" name="start_km" style="border:1px solid #000; width:80px;">
            &nbsp;&nbsp;
            <strong>End KM:</strong>
            <input type="text" name="end_km" style="border:1px solid #000; width:80px;">
            &nbsp;&nbsp;
            <strong>Total KMS:</strong>
            <input type="text" name="total_km" style="border:1px solid #000; width:80px;">
        </p>

        <table style="width:100%; border-collapse: collapse; font-size:14px;" border="1">
            <thead>
                <tr>
                    <th rowspan="2" style=" border:1px solid #000;padding:6px; text-align:center;">S. No.</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;">Client Name</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;">Client Code</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;">Barcode</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;">Work Order Done</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;">TRF</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;">Clinical History</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;">Sample Volume</th>
                    <th colspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Temperature</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;">Client Signature</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;">Pick-up Time</th>
                </tr>
                <tr>
                    <th style="border:1px solid #000; padding:6px;">Pick-up @Client</th>
                    <th style="border:1px solid #000; padding:6px;">Drop-off @Lab</th>
                </tr>
            </thead>

            <tbody>
                @for ($i = 1; $i <= 14; $i++)
                    <tr>
                    <td style="padding:6px; text-align:center;">{{ $i }}</td>
                    <td><input type="text" name="client_name_{{ $i }}" style="width:100%; border:none;"></td>
                    <td><input type="text" name="client_code_{{ $i }}" style="width:100%; border:none;"></td>
                    <td><input type="text" name="barcode_{{ $i }}" style="width:100%; border:none;"></td>
                    <td><input type="text" name="work_order_{{ $i }}" style="width:100%; border:none;"></td>
                    <td><input type="text" name="trf_{{ $i }}" style="width:100%; border:none;"></td>
                    <td><input type="text" name="clinical_history_{{ $i }}" style="width:100%; border:none;"></td>
                    <td><input type="text" name="sample_volume_{{ $i }}" style="width:100%; border:none;"></td>

                    <td><input type="text" name="temp_pickup_{{ $i }}" style="width:100%; border:none;"></td>
                    <td><input type="text" name="temp_drop_{{ $i }}" style="width:100%; border:none;"></td>

                    <td><input type="text" name="client_signature_{{ $i }}" style="width:100%; border:none;"></td>
                    <td><input type="text" name="pickup_time_{{ $i }}" style="width:100%; border:none;"></td>
                    </tr>
                    @endfor
            </tbody>
        </table>



    </x-formTemplete>


    <x-formTemplete
        id="TDPL/LO/FOM-006"
        docNo="TDPL/LO/FOM-006"
        docName="CSR Sample Tracking - Outliers"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <p style="font-size:14px;">
            <strong>Month & Year:</strong> <input type="date" name="csr_name" style="border:1px solid #000; width:150px;">
            &nbsp;&nbsp;

        </p>

        <table style="width:100%; border-collapse: collapse; font-size:14px;" border="1">
            <thead>
                <tr>
                    <th rowspan="2" style=" border:1px solid #000;padding:6px; text-align:center;">S. No.</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;">Client Name</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;">Client Code</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;">Barcode</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;">Work Order Done</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;">TRF</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;">Clinical History</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;">Sample Volume</th>
                    <th colspan="2" style="border:1px solid #000; padding:6px; text-align:center;">Temperature</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;">Observations</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;">Accession Signature</th>
                </tr>
                <tr>
                    <th style="border:1px solid #000; padding:6px;">Pick-up @Client</th>
                    <th style="border:1px solid #000; padding:6px;">Drop-off @Lab</th>
                </tr>
            </thead>

            <tbody>
                @for ($i = 1; $i <= 14; $i++)
                    <tr>
                    <td style="padding:6px; text-align:center;">{{ $i }}</td>
                    <td><input type="text" name="client_name_{{ $i }}" style="width:100%; border:none;"></td>
                    <td><input type="text" name="client_code_{{ $i }}" style="width:100%; border:none;"></td>
                    <td><input type="text" name="barcode_{{ $i }}" style="width:100%; border:none;"></td>
                    <td><input type="text" name="work_order_{{ $i }}" style="width:100%; border:none;"></td>
                    <td><input type="text" name="trf_{{ $i }}" style="width:100%; border:none;"></td>
                    <td><input type="text" name="clinical_history_{{ $i }}" style="width:100%; border:none;"></td>
                    <td><input type="text" name="sample_volume_{{ $i }}" style="width:100%; border:none;"></td>

                    <td><input type="text" name="temp_pickup_{{ $i }}" style="width:100%; border:none;"></td>
                    <td><input type="text" name="temp_drop_{{ $i }}" style="width:100%; border:none;"></td>

                    <td><textarea type="text" name="client_signature_{{ $i }}" style="width:100%; border:none;"></textarea></td>
                    <td><input type="text" name="pickup_time_{{ $i }}" style="width:100%; border:none;"></td>
                    </tr>
                    @endfor
            </tbody>
        </table>
    </x-formTemplete>
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
    document.getElementById('addRowBtn1').addEventListener('click', function() {
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
    document.getElementById('submitBtn1').addEventListener('click', function() {
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


</html>


@endsection