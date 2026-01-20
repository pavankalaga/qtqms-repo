@extends('layouts.base')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AS</title>
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
            <div style="font-size: 20px; ">AS </div>

        </div>
        <div class="icon-view">
            <div class="pc-content">
                <div class="pc-folder" onclick="showSection('TDPL/AS/FOM-001')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Sample Volume Check Form</span>
                </div>

                <div class="pc-folder" onclick="showSection('TDPL/AS/REG-001')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Sample Receiving Register</span>
                </div>

                <div class="pc-folder" onclick="showSection('TDPL/AS/REG-003')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Sample Delivery Register</span>
                </div>

                <div class="pc-folder" onclick="showSection('TDPL/AS/REG-004')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Ice Gel Packs Distribution Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/AS/REG-005')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Sample Outsource Register</span>
                </div>

            </div>
        </div>
    </div>


<x-formTemplete
    id="TDPL/AS/FOM-001"
    docNo="TDPL/AS/FOM-001"
    docName="Sample Volume Check Form"
    issueNo="2.0"
    issueDate="01/10/2024"
    buttonText="Submit"
>

    {{-- FORM BODY GOES HERE --}}
    
    <div class="row mb-3">
        <div class="col-md-4">
            <label><strong>Year</strong></label>
            <input type="text" name="year" class="form-control">
        </div>
        <div class="col-md-4">
            <label><strong>Location</strong></label>
            <input type="text" name="location" class="form-control">
        </div>
        <div class="col-md-4">
            <label><strong>Department</strong></label>
            <input type="text" name="department" class="form-control">
        </div>
    </div>

    <table class="table table-bordered w-100">
        <tbody>
            <tr>
                <td rowspan="2"><strong>Type of Container</strong></td>
                <td rowspan="2"><strong>Required Sample Quantity (ml)</strong></td>
                <td colspan="12"><strong>Date of Sample Volume Review</strong></td>
            </tr>

            <tr>
                <td><strong>Jul</strong></td>
                <td><strong>Aug</strong></td>
                <td><strong>Sep</strong></td>
                <td><strong>Oct</strong></td>
                <td><strong>Nov</strong></td>
                <td><strong>Dec</strong></td>
                <td><strong>Jan</strong></td>
                <td><strong>Feb</strong></td>
                <td><strong>Mar</strong></td>
                <td><strong>Apr</strong></td>
                <td><strong>May</strong></td>
                <td><strong>Jun</strong></td>
            </tr>

            {{-- Repeatable Row Template --}}
            @php
                $containers = [
                    'SST Gel Vial (Yellow Top)',
                    'Plain Vial (Red Top)',
                    'EDTA Vial (Lavender Top)',
                    'Sodium Fluoride Vial (Gray Top)',
                    'Sodium Citrate Vial (Blue Top)',
                    'Sodium Heparin Vial (Green Top)',
                ];
            @endphp

            @foreach ($containers as $key => $item)
            <tr>
                <td><strong>{{ $item }}</strong></td>
                <td>
                    <input type="number" name="required_qty_{{ $key }}" class="form-control">
                </td>

                {{-- 12 Months --}}
                @foreach (['jul','aug','sep','oct','nov','dec','jan','feb','mar','apr','may','jun'] as $month)
                    <td>
                        <input type="text" name="{{ $month }}_{{ $key }}" class="form-control">
                    </td>
                @endforeach
            </tr>
            @endforeach

            <tr>
                <td><strong>Done By</strong></td>
                <td colspan="13">
                    <input type="text" name="done_by" class="form-control">
                </td>
            </tr>

            <tr>
                <td><strong>Reviewed By</strong></td>
                <td colspan="13">
                    <input type="text" name="reviewed_by" class="form-control">
                </td>
            </tr>

        </tbody>
    </table>

    <p><strong>Note:</strong> 
        This random check is done once a month to track and record that the samples are collected up to the required mark indicated on the respective vials.
    </p>

</x-formTemplete>


<x-formTemplete
    id="TDPL/AS/REG-001"
    docNo="TDPL/AS/REG-001"
    docName="Sample Receiving Register"
    issueNo="2.0"
    issueDate="01/10/2024"
    buttonText="Submit"
>


    {{-- MAIN FORM TABLE --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Client Location</th>
                <th>Client Name</th>
                <th>TL Code</th>
                <th># of Blood Samples</th>
                <th># of Other Samples</th>
                <th>CSR Name</th>
                <th>CSR Sign</th>
                <th>Sample Temperature</th>
                <th>Receiver Name</th>
                <th>Remarks</th>
            </tr>
        </thead>

        <tbody>
            @for ($i = 0; $i < 4; $i++)
            <tr>
                <td><input type="date" name="date_{{ $i }}" class="form-control"></td>
                <td><input type="time" name="time_{{ $i }}" class="form-control"></td>
                <td><input type="text" name="client_location_{{ $i }}" class="form-control"></td>
                <td><input type="text" name="client_name_{{ $i }}" class="form-control"></td>
                <td><input type="text" name="tl_code_{{ $i }}" class="form-control"></td>

                <td><input type="number" name="blood_samples_{{ $i }}" class="form-control"></td>
                <td><input type="number" name="other_samples_{{ $i }}" class="form-control"></td>

                <td><input type="text" name="csr_name_{{ $i }}" class="form-control"></td>
                <td><input type="text" name="csr_sign_{{ $i }}" class="form-control"></td>

                <td><input type="text" name="sample_temp_{{ $i }}" class="form-control"></td>
                <td><input type="text" name="receiver_name_{{ $i }}" class="form-control"></td>
                <td><input type="text" name="remarks_{{ $i }}" class="form-control"></td>
            </tr>
            @endfor
        </tbody>
    </table>

</x-formTemplete>


<x-formTemplete
    id="TDPL/AS/REG-003"
    docNo="TDPL/AS/REG-003"
    docName="Sample Delivery Register"
    issueNo="2.0"
    issueDate="01/10/2024"
    buttonText="Submit"
>

<table class="table table-bordered w-100">
    <thead>
        <tr>
            <th>Date</th>
            <th>Barcode</th>
            <th>No. of Samples</th>
            <th>Destination Department</th>
            <th>Sample taken from Accession by @ time</th>
            <th>Verified by</th>
            <th>Sample delivered to Dept. by @ time</th>
            <th>Sample Received at Dept. by @ time</th>
            <th>Remarks</th>
        </tr>
    </thead>

    <tbody>

        {{-- Example Row --}}
        <tr>
            <td><input type="text" class="form-control" value="E.g."></td>
            <td><input type="text" class="form-control" value="AB123456"></td>
            <td><input type="number" class="form-control" value="2"></td>
            <td><input type="text" class="form-control" value="Biochemistry"></td>
            <td><input type="text" class="form-control" value="Bhanu @9:00 am (sign)"></td>
            <td><input type="text" class="form-control" value="Nandan (sign)"></td>
            <td><input type="text" class="form-control" value="Bhanu @9:05 am (sign)"></td>
            <td><input type="text" class="form-control" value="Kushal @9:05 am (sign)"></td>
            <td><input type="text" class="form-control"></td>
        </tr>

        {{-- Dynamic Empty Rows --}}
        @for ($i = 0; $i < 10; $i++)
        <tr>
            <td><input type="date" name="date_{{ $i }}" class="form-control"></td>

            <td><input type="text" name="barcode_{{ $i }}" class="form-control"></td>

            <td><input type="number" name="samples_{{ $i }}" class="form-control"></td>

            <td><input type="text" name="department_{{ $i }}" class="form-control"></td>

            <td><input type="text" name="taken_from_accession_{{ $i }}" class="form-control"></td>

            <td><input type="text" name="verified_by_{{ $i }}" class="form-control"></td>

            <td><input type="text" name="delivered_to_dept_{{ $i }}" class="form-control"></td>

            <td><input type="text" name="received_at_dept_{{ $i }}" class="form-control"></td>

            <td><input type="text" name="remarks_{{ $i }}" class="form-control"></td>
        </tr>
        @endfor

    </tbody>
</table>

</x-formTemplete>


<x-formTemplete 
    id="TDPL/AS/REG-004"
    docNo="TDPL/AS/REG-004"
    docName="Ice Gel Packs Distribution Register"
    issueNo="2.0"
    issueDate="01/10/2024"
    buttonText="Submit"
>

<table border="1" cellspacing="0" cellpadding="6" style="width:100%; border-collapse: collapse; text-align:left;">
    <tbody>
        <tr>
            <td rowspan="2"><strong>Date</strong></td>
            <td rowspan="2"><strong>Quantity</strong></td>
            <td rowspan="2"><strong>Handed over by (Name & Time)</strong></td>
            <td rowspan="2"><strong>Received by (Name & Time)</strong></td>
            <td colspan="2"><strong>Returned</strong></td>
            <td rowspan="2"><strong>Remarks</strong></td>
        </tr>
        <tr>
            <td><strong>Yes</strong></td>
            <td><strong>No</strong></td>
        </tr>

        {{-- Editable Rows --}}
        @for ($i = 0; $i < 6; $i++)
            <tr>
                <td><input type="date" class="w-full border-0 focus:ring-0" /></td>
                <td><input type="number" class="w-full border-0 focus:ring-0" /></td>
                <td><input type="text" class="w-full border-0 focus:ring-0" placeholder="Name & Time" /></td>
                <td><input type="text" class="w-full border-0 focus:ring-0" placeholder="Name & Time" /></td>

                <td style="text-align:center;">
                    <input type="checkbox" />
                </td>

                <td style="text-align:center;">
                    <input type="checkbox" />
                </td>

                <td>
                    <textarea class="w-full border-0 focus:ring-0" rows="1"></textarea>
                </td>
            </tr>
        @endfor

    </tbody>
</table>

</x-formTemplete>


<x-formTemplete 
    id="TDPL/AS/REG-005"
    docNo="TDPL/AS/REG-005"
    docName="Sample Outsource Register"
    issueNo="2.0"
    issueDate="01/10/2024"
    buttonText="Submit"
>



<!-- =================== FILTER SECTION =================== -->
<p>
    <strong>Month/Year:</strong> 
    <input type="month" class="border p-1" />

    <strong style="margin-left:30px;">Location:</strong>
    <input type="text" class="border p-1" />

    <strong style="margin-left:30px;">Department:</strong>
    <input type="text" class="border p-1" />
</p>

<br>

<!-- =================== MAIN DATA TABLE =================== -->
<table border="1" cellspacing="0" cellpadding="6" style="width:100%; border-collapse: collapse; text-align:left;">
    <tbody>
        <tr>
            <td><strong>S. No.</strong></td>
            <td><strong>Date</strong></td>
            <td><strong>Barcode</strong></td>
            <td><strong>Patient Name</strong></td>
            <td><strong>Department</strong></td>
            <td><strong>Test Name & Code</strong></td>
            <td><strong>Sample Handover Sign, Date & Time (Accession)</strong></td>
            <td><strong>Sample Receiver Sign, Date & Time (Front Office)</strong></td>
            <td><strong>Sample Handover to OS Lab By</strong></td>
            <td><strong>OS Lab Receiver Name, Sign, Date & Time</strong></td>
        </tr>

        @for ($i = 1; $i <= 5; $i++)
        <tr>
            <td><input type="number" class="w-full border-0" value="{{ $i }}"></td>
            <td><input type="date" class="w-full border-0"></td>
            <td><input type="text" class="w-full border-0"></td>
            <td><input type="text" class="w-full border-0"></td>
            <td><input type="text" class="w-full border-0"></td>
            <td><textarea class="w-full border-0" rows="1"></textarea></td>
            <td><textarea class="w-full border-0" rows="1"></textarea></td>
            <td><textarea class="w-full border-0" rows="1"></textarea></td>
            <td><input type="text" class="w-full border-0"></td>
            <td><textarea class="w-full border-0" rows="1"></textarea></td>
        </tr>
        @endfor

    </tbody>
</table>

<br>
<p><em>*OS = Outsource</em></p>

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