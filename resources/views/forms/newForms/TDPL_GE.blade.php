@extends('layouts.base')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GE</title>
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
            <div style="font-size: 20px; ">GE </div>

        </div>
        <div class="icon-view">
            <div class="pc-content">
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-001')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">First Aid Kit Monitoring Form</span>
                </div>

                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-002')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Needle Stick Injury Log Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-003')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Sample Rejection Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-004')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Accident Reporting Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-005')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Analyte Calibration Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-006')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Biomedical Waste Disposal Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-007')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Physician Feedback Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-008')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Critical Call-Out Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-009')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">EQAS Sample Processing Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-010')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Daily Cleaning Checklist for Lab</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-011')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Daily Cleanliness Log for Rest Room</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-012')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Daily IQC Data Monitoring Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-014')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Distilled Water Plant Checklist</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-015')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Equipment Startup and Shutdown Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-016')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Eye Wash Monitoring Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-017')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label"> Inter-Laboratory Comparison Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-018')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label"> Laboratory Incident Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-019')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label"> Employee Suggestion for Improvement Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-020')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label"> New Reagent Lot Verification</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-021')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label"> Non-Conformity & Corrective Action Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-022')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Refrigerator Temperature Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-023')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Repeat Test Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-025')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">NiU-Transcription Check Forms</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-027')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label"> Meeting Agenda Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-029')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Approved Referral Laboratories Consultants Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-030')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Room Temperature and Humidity Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-031')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label"> Amendment Report Monitoring Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-033')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Daily Preparation of 1% Sodium Hypochlorite Solution Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-034')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Deep Freezer Temperature Monitoring Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-035')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Corrective Action & Preventive Action Form for EQAS Outliers</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-036')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Daily IQC Outlier Non-Conformity & Preventive Action Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-037')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label"> Authorized Persons on Software Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-038')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Authorized Personnel for Handling the Instruments Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-039')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label"> Minutes of Meeting</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-040')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label"> Test Requisition Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-044')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label"> Split Sample Analysis Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/FOM-047')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Reagent & Consumables Consumption Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/REG-001')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Shift Handover Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/REG-002')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Department Sample Storage & Discard Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/REG-003')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Sample Integrity Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/GE/REG-005')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Inter-Department Sample Transfer Register</span>
                </div>
            </div>
        </div>
    </div>


    <x-formTemplete
        id="TDPL/GE/FOM-001"
        docNo="TDPL/GE/FOM-001"
        docName="First Aid Kit Monitoring Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.ge.forms.submit') }}">

        <!-- Hidden field for update -->
        <input type="hidden" name="first_aid_kit_monitoring_form_id" id="GE_FOM_001__record_id">

        <p>
            <strong>Month/Year:</strong>
            <input type="month" name="month_year" id="GE_FOM_001__month_year" onchange="loadFirstAidKitData()" style="border:1px solid #000; padding:4px; width:150px; margin-right:20px;">

            <strong>Location:</strong>
            <input type="text" name="location" id="GE_FOM_001__location" list="GE_FOM_001__location_list"
                onchange="loadFirstAidKitData()" onblur="loadFirstAidKitData()" onkeyup="debounceLoadFirstAidKit()"
                style="border:1px solid #000; padding:4px; width:150px; margin-right:20px;" placeholder="Select or type">
            <datalist id="GE_FOM_001__location_list">
                <option value="Main Lab">
                <option value="Branch Lab 1">
                <option value="Branch Lab 2">
                <option value="Collection Center 1">
                <option value="Collection Center 2">
                <option value="Head Office">
                <option value="Warehouse">
            </datalist>

            <strong>Department:</strong>
            <input type="text" name="department" id="GE_FOM_001__department" list="GE_FOM_001__department_list"
                onchange="loadFirstAidKitData()" onblur="loadFirstAidKitData()" onkeyup="debounceLoadFirstAidKit()"
                style="border:1px solid #000; padding:4px; width:150px;" placeholder="Select or type">
            <datalist id="GE_FOM_001__department_list">
                <option value="Biochemistry">
                <option value="Hematology">
                <option value="Microbiology">
                <option value="Histopathology">
                <option value="Cytology">
                <option value="Molecular Biology">
                <option value="Clinical Pathology">
                <option value="Accessioning">
                <option value="Quality Assurance">
                <option value="Administration">
                <option value="IT">
                <option value="Logistics">
            </datalist>
        </p>

        <table style="width:100%; border-collapse:collapse; margin-top:10px;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px;">S. No.</th>
                    <th style="border:1px solid #000; padding:6px;">Items Available</th>
                    <th style="border:1px solid #000; padding:6px;">Expiry Date</th>
                    <th style="border:1px solid #000; padding:6px;">Replaced Item</th>
                    <th style="border:1px solid #000; padding:6px;">Quantity Replaced</th>
                    <th style="border:1px solid #000; padding:6px;">Expiry Date</th>
                    <th style="border:1px solid #000; padding:6px;">Replaced on - Date</th>
                    <th style="border:1px solid #000; padding:6px;">Replaced by &amp; Sign</th>
                    <th style="border:1px solid #000; padding:6px;">Remarks</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td style="border:1px solid #000; padding:6px; text-align:center;">
                        1
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="items_available" id="GE_FOM_001__items_available" style="width:100%; border:1px solid #000; padding:4px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="date" name="expiry_date_1" id="GE_FOM_001__expiry_date_1" style="width:100%; border:1px solid #000; padding:4px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="replaced_item" id="GE_FOM_001__replaced_item" style="width:100%; border:1px solid #000; padding:4px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="number" name="quantity_replaced" id="GE_FOM_001__quantity_replaced" style="width:100%; border:1px solid #000; padding:4px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="date" name="expiry_date_2" id="GE_FOM_001__expiry_date_2" style="width:100%; border:1px solid #000; padding:4px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="date" name="replaced_on" id="GE_FOM_001__replaced_on" style="width:100%; border:1px solid #000; padding:4px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="replaced_by" id="GE_FOM_001__replaced_by" style="width:100%; border:1px solid #000; padding:4px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="remarks" id="GE_FOM_001__remarks" style="width:100%; border:1px solid #000; padding:4px;">
                    </td>
                </tr>
            </tbody>
        </table>

        <p style="margin-top:20px;">
            <strong>Verified by QM:</strong>
            <input type="text" name="verified_by" id="GE_FOM_001__verified_by" style="border:1px solid #000; padding:4px; width:250px;">
        </p>

        <script>
            // Debounce timer for text input
            let firstAidKitDebounceTimer = null;

            // Debounce function - loads data after user stops typing (500ms delay)
            function debounceLoadFirstAidKit() {
                clearTimeout(firstAidKitDebounceTimer);
                firstAidKitDebounceTimer = setTimeout(function() {
                    loadFirstAidKitData();
                }, 500);
            }

            // Load First Aid Kit data based on filters
            function loadFirstAidKitData() {
                const monthYear = document.getElementById('GE_FOM_001__month_year').value;
                const location = document.getElementById('GE_FOM_001__location').value;
                const department = document.getElementById('GE_FOM_001__department').value;

                // Only fetch if at least one filter is set
                if (!monthYear && !location && !department) {
                    clearFirstAidKitForm();
                    return;
                }

                const params = new URLSearchParams();
                if (monthYear) params.append('month_year', monthYear);
                if (location) params.append('location', location);
                if (department) params.append('department', department);

                fetch(`/newforms/ge/first-aid-kit/load?${params.toString()}`)
                    .then(response => response.json())
                    .then(result => {
                        if (result.success && result.data) {
                            populateFirstAidKitForm(result.data);
                        } else {
                            clearFirstAidKitForm(true); // Keep filters
                        }
                    })
                    .catch(error => {
                        console.error('Error loading data:', error);
                    });
            }

            // Populate form with loaded data
            function populateFirstAidKitForm(data) {
                document.getElementById('GE_FOM_001__record_id').value = data.id || '';
                document.getElementById('GE_FOM_001__items_available').value = data.items_available || '';
                document.getElementById('GE_FOM_001__expiry_date_1').value = data.expiry_date_1 ? data.expiry_date_1.split('T')[0] : '';
                document.getElementById('GE_FOM_001__replaced_item').value = data.replaced_item || '';
                document.getElementById('GE_FOM_001__quantity_replaced').value = data.quantity_replaced || '';
                document.getElementById('GE_FOM_001__expiry_date_2').value = data.expiry_date_2 ? data.expiry_date_2.split('T')[0] : '';
                document.getElementById('GE_FOM_001__replaced_on').value = data.replaced_on ? data.replaced_on.split('T')[0] : '';
                document.getElementById('GE_FOM_001__replaced_by').value = data.replaced_by || '';
                document.getElementById('GE_FOM_001__remarks').value = data.remarks || '';
                document.getElementById('GE_FOM_001__verified_by').value = data.verified_by || '';
            }

            // Clear form fields (optionally keep filters)
            function clearFirstAidKitForm(keepFilters = false) {
                document.getElementById('GE_FOM_001__record_id').value = '';
                document.getElementById('GE_FOM_001__items_available').value = '';
                document.getElementById('GE_FOM_001__expiry_date_1').value = '';
                document.getElementById('GE_FOM_001__replaced_item').value = '';
                document.getElementById('GE_FOM_001__quantity_replaced').value = '';
                document.getElementById('GE_FOM_001__expiry_date_2').value = '';
                document.getElementById('GE_FOM_001__replaced_on').value = '';
                document.getElementById('GE_FOM_001__replaced_by').value = '';
                document.getElementById('GE_FOM_001__remarks').value = '';
                document.getElementById('GE_FOM_001__verified_by').value = '';

                if (!keepFilters) {
                    document.getElementById('GE_FOM_001__month_year').value = '';
                    document.getElementById('GE_FOM_001__location').value = '';
                    document.getElementById('GE_FOM_001__department').value = '';
                }
            }

            // Load datalist options for location and department from database
            // TODO: Enable this later to load from database
            // function loadFilterOptions() {
            //     fetch('/newforms/ge/filter-options')
            //         .then(response => response.json())
            //         .then(data => {
            //             // Populate location datalist
            //             const locationList = document.getElementById('GE_FOM_001__location_list');
            //             if (locationList && data.locations) {
            //                 locationList.innerHTML = '';
            //                 data.locations.forEach(loc => {
            //                     const option = document.createElement('option');
            //                     option.value = loc;
            //                     locationList.appendChild(option);
            //                 });
            //             }
            //
            //             // Populate department datalist
            //             const departmentList = document.getElementById('GE_FOM_001__department_list');
            //             if (departmentList && data.departments) {
            //                 departmentList.innerHTML = '';
            //                 data.departments.forEach(dept => {
            //                     const option = document.createElement('option');
            //                     option.value = dept;
            //                     departmentList.appendChild(option);
            //                 });
            //             }
            //         })
            //         .catch(error => console.error('Error loading filter options:', error));
            // }

            // AJAX form submission for inline edit (no page redirect)
            (function() {
                function initFormHandler() {
                    // TODO: Enable this later to load from database
                    // loadFilterOptions();

                    // Use escaped selector for ID with slashes
                    const formContainer = document.querySelector('[id="TDPL/GE/FOM-001"]');
                    if (!formContainer) {
                        console.log('Form container not found');
                        return;
                    }

                    const form = formContainer.querySelector('form');
                    if (!form) {
                        console.log('Form not found');
                        return;
                    }

                    // Prevent double binding
                    if (form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    console.log('AJAX form handler attached for GE FOM-001');

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn.textContent;

                        // Show loading state
                        submitBtn.textContent = 'Saving...';
                        submitBtn.disabled = true;

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                // Update record ID for future edits
                                if (result.data && result.data.id) {
                                    document.getElementById('GE_FOM_001__record_id').value = result.data.id;
                                }
                                // TODO: Enable this later to refresh from database
                                // loadFilterOptions();
                                // Show success message
                                showToast('success', result.message || 'Saved successfully!');
                            } else {
                                showToast('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToast('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            // Reset button state
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                // Run when DOM is ready
                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initFormHandler);
                } else {
                    // DOM already loaded, run immediately
                    initFormHandler();
                }
            })();

            // Simple toast notification
            function showToast(type, message) {
                // Remove existing toast
                const existingToast = document.querySelector('.ge-toast');
                if (existingToast) existingToast.remove();

                const toast = document.createElement('div');
                toast.className = 'ge-toast';
                toast.style.cssText = `
                    position: fixed;
                    top: 20px;
                    right: 20px;
                    padding: 15px 25px;
                    border-radius: 5px;
                    color: white;
                    font-weight: bold;
                    z-index: 9999;
                    animation: slideIn 0.3s ease;
                    background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                `;
                toast.textContent = message;

                document.body.appendChild(toast);

                // Auto remove after 3 seconds
                setTimeout(() => {
                    toast.style.animation = 'slideOut 0.3s ease';
                    setTimeout(() => toast.remove(), 300);
                }, 3000);
            }

            // Add CSS for toast animation
            const style = document.createElement('style');
            style.textContent = `
                @keyframes slideIn {
                    from { transform: translateX(100%); opacity: 0; }
                    to { transform: translateX(0); opacity: 1; }
                }
                @keyframes slideOut {
                    from { transform: translateX(0); opacity: 1; }
                    to { transform: translateX(100%); opacity: 0; }
                }
            `;
            document.head.appendChild(style);
        </script>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-002"
        docNo="TDPL/GE/FOM-002"
        docName="Needle Stick Injury Log Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.ge.forms.submit') }}">

        <!-- Hidden field for update -->
        <input type="hidden" name="needle_stick_injury_log_id" id="GE_FOM_002__record_id">

        <p style="margin-bottom:10px;">
            <strong>Name of injured person:</strong>
            <input type="text" name="injured_person" id="GE_FOM_002__injured_person"
                style="border:1px solid #000; padding:4px; width:60%; margin-left:10px;">
        </p>

        <p style="margin-bottom:10px;">
            <strong>Date &amp; Time of exposure:</strong>
            <input type="datetime-local" name="exposure_datetime" id="GE_FOM_002__exposure_datetime"
                style="border:1px solid #000; padding:4px; width:40%; margin-left:10px;">
        </p>

        <p style="margin-top:15px; margin-bottom:5px;">
            <strong>Sequence of events leading to exposure:</strong>
        </p>
        <textarea name="sequence_of_events" id="GE_FOM_002__sequence_of_events"
            style="width:100%; height:80px; border:1px solid #000; padding:6px;"></textarea>

        <p style="margin-top:15px; margin-bottom:5px;">
            <strong>Details of exposure:</strong>
        </p>
        <textarea name="details_of_exposure" id="GE_FOM_002__details_of_exposure"
            style="width:100%; height:80px; border:1px solid #000; padding:6px;"></textarea>

        <p style="margin-top:15px; margin-bottom:5px;">
            <strong>Details of counseling and post-exposure management:</strong>
        </p>
        <textarea name="counseling_details" id="GE_FOM_002__counseling_details"
            style="width:100%; height:80px; border:1px solid #000; padding:6px;"></textarea>

        <p style="margin-top:15px; margin-bottom:5px;">
            <strong>Information about the source person:</strong>
        </p>
        <textarea name="source_person_info" id="GE_FOM_002__source_person_info"
            style="width:100%; height:80px; border:1px solid #000; padding:6px;"></textarea>

        <p style="margin-top:15px; margin-bottom:5px;">
            <strong>Steps taken to prevent the recurrence of such an accident:</strong>
        </p>
        <textarea name="preventive_steps" id="GE_FOM_002__preventive_steps"
            style="width:100%; height:100px; border:1px solid #000; padding:6px;"></textarea>

        <p style="margin-top:20px;">
            <strong>Name, Designation & Signature with Date (of person recording the above):</strong>
        </p>

        <input type="text" name="recorded_by" id="GE_FOM_002__recorded_by"
            placeholder="Name & Designation"
            style="border:1px solid #000; padding:4px; width:50%; margin-top:5px;">

        <input type="date" name="recorded_date" id="GE_FOM_002__recorded_date"
            style="border:1px solid #000; padding:4px; width:20%; margin-left:20px;">

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-003"
        docNo="TDPL/GE/FOM-003"
        docName="Sample Rejection Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.ge.forms.submit') }}">

        <!-- Hidden field for update -->
        <input type="hidden" name="sample_rejection_form_id" id="GE_FOM_003__record_id">

        <p style="margin-bottom:10px;">
            <strong>Month/Year:</strong>
            <input type="month" name="month_year" id="GE_FOM_003__month_year" onchange="loadSampleRejectionData()" style="border:1px solid #000; padding:4px; width:150px; margin-right:20px;">

            <strong>Location:</strong>
            <input type="text" name="location" id="GE_FOM_003__location" list="GE_FOM_003__location_list"
                onchange="loadSampleRejectionData()" onblur="loadSampleRejectionData()" onkeyup="debounceSampleRejection()"
                style="border:1px solid #000; padding:4px; width:150px; margin-right:20px;" placeholder="Select or type">
            <datalist id="GE_FOM_003__location_list">
                <option value="Main Lab">
                <option value="Branch Lab 1">
                <option value="Branch Lab 2">
                <option value="Collection Center 1">
                <option value="Collection Center 2">
            </datalist>

            <strong>Department:</strong>
            <input type="text" name="department" id="GE_FOM_003__department" list="GE_FOM_003__department_list"
                onchange="loadSampleRejectionData()" onblur="loadSampleRejectionData()" onkeyup="debounceSampleRejection()"
                style="border:1px solid #000; padding:4px; width:150px;" placeholder="Select or type">
            <datalist id="GE_FOM_003__department_list">
                <option value="Biochemistry">
                <option value="Hematology">
                <option value="Microbiology">
                <option value="Histopathology">
                <option value="Cytology">
                <option value="Clinical Pathology">
            </datalist>
        </p>

        <table style="width:100%; border-collapse:collapse; margin-top:10px;">
            <thead>
                <tr>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;">Date/Time</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;">Patient Name &amp; Barcode</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;">Parameter</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;">Collected By</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;">Primary Sample Type</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;">Reason for Rejection</th>
                    <th colspan="2" style="border:1px solid #000; padding:6px;">Informed By</th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;">Informed To CSD with Tkt. #</th>
                    <th colspan="2" style="border:1px solid #000; padding:6px;">Fresh sample Received</th>
                </tr>
                <tr>
                    <th style="border:1px solid #000; padding:6px;">Name</th>
                    <th style="border:1px solid #000; padding:6px;">Dated Signature</th>
                    <th style="border:1px solid #000; padding:6px;">Y (Dt.&amp;Time) / N</th>
                    <th style="border:1px solid #000; padding:6px;">New Barcode</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="datetime-local" name="date_time" id="GE_FOM_003__date_time" style="width:100%; padding:4px; border:1px solid #000;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="patient_barcode" id="GE_FOM_003__patient_barcode" style="width:100%; padding:4px; border:1px solid #000;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="parameter" id="GE_FOM_003__parameter" style="width:100%; padding:4px; border:1px solid #000;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="collected_by" id="GE_FOM_003__collected_by" style="width:100%; padding:4px; border:1px solid #000;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="sample_type" id="GE_FOM_003__sample_type" style="width:100%; padding:4px; border:1px solid #000;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="reason_rejection" id="GE_FOM_003__reason_rejection" style="width:100%; padding:4px; border:1px solid #000;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="informed_by_name" id="GE_FOM_003__informed_by_name" style="width:100%; padding:4px; border:1px solid #000;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="informed_by_sign" id="GE_FOM_003__informed_by_sign" style="width:100%; padding:4px; border:1px solid #000;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="informed_to_csd" id="GE_FOM_003__informed_to_csd" style="width:100%; padding:4px; border:1px solid #000;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="fresh_sample_yes_no" id="GE_FOM_003__fresh_sample_yes_no" style="width:100%; padding:4px; border:1px solid #000;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="new_barcode" id="GE_FOM_003__new_barcode" style="width:100%; padding:4px; border:1px solid #000;">
                    </td>
                </tr>
            </tbody>
        </table>

        <script>
            // Debounce timer for Sample Rejection Form
            let sampleRejectionDebounceTimer = null;

            function debounceSampleRejection() {
                clearTimeout(sampleRejectionDebounceTimer);
                sampleRejectionDebounceTimer = setTimeout(function() {
                    loadSampleRejectionData();
                }, 500);
            }

            // Load Sample Rejection data based on filters
            function loadSampleRejectionData() {
                const monthYear = document.getElementById('GE_FOM_003__month_year').value;
                const location = document.getElementById('GE_FOM_003__location').value;
                const department = document.getElementById('GE_FOM_003__department').value;

                if (!monthYear && !location && !department) {
                    clearSampleRejectionForm();
                    return;
                }

                const params = new URLSearchParams();
                if (monthYear) params.append('month_year', monthYear);
                if (location) params.append('location', location);
                if (department) params.append('department', department);

                fetch(`/newforms/ge/sample-rejection/load?${params.toString()}`)
                    .then(response => response.json())
                    .then(result => {
                        if (result.success && result.data) {
                            populateSampleRejectionForm(result.data);
                        } else {
                            clearSampleRejectionForm(true);
                        }
                    })
                    .catch(error => console.error('Error loading data:', error));
            }

            function populateSampleRejectionForm(data) {
                document.getElementById('GE_FOM_003__record_id').value = data.id || '';
                document.getElementById('GE_FOM_003__date_time').value = data.date_time ? data.date_time.replace(' ', 'T').substring(0, 16) : '';
                document.getElementById('GE_FOM_003__patient_barcode').value = data.patient_barcode || '';
                document.getElementById('GE_FOM_003__parameter').value = data.parameter || '';
                document.getElementById('GE_FOM_003__collected_by').value = data.collected_by || '';
                document.getElementById('GE_FOM_003__sample_type').value = data.sample_type || '';
                document.getElementById('GE_FOM_003__reason_rejection').value = data.reason_rejection || '';
                document.getElementById('GE_FOM_003__informed_by_name').value = data.informed_by_name || '';
                document.getElementById('GE_FOM_003__informed_by_sign').value = data.informed_by_sign || '';
                document.getElementById('GE_FOM_003__informed_to_csd').value = data.informed_to_csd || '';
                document.getElementById('GE_FOM_003__fresh_sample_yes_no').value = data.fresh_sample_yes_no || '';
                document.getElementById('GE_FOM_003__new_barcode').value = data.new_barcode || '';
            }

            function clearSampleRejectionForm(keepFilters = false) {
                document.getElementById('GE_FOM_003__record_id').value = '';
                document.getElementById('GE_FOM_003__date_time').value = '';
                document.getElementById('GE_FOM_003__patient_barcode').value = '';
                document.getElementById('GE_FOM_003__parameter').value = '';
                document.getElementById('GE_FOM_003__collected_by').value = '';
                document.getElementById('GE_FOM_003__sample_type').value = '';
                document.getElementById('GE_FOM_003__reason_rejection').value = '';
                document.getElementById('GE_FOM_003__informed_by_name').value = '';
                document.getElementById('GE_FOM_003__informed_by_sign').value = '';
                document.getElementById('GE_FOM_003__informed_to_csd').value = '';
                document.getElementById('GE_FOM_003__fresh_sample_yes_no').value = '';
                document.getElementById('GE_FOM_003__new_barcode').value = '';

                if (!keepFilters) {
                    document.getElementById('GE_FOM_003__month_year').value = '';
                    document.getElementById('GE_FOM_003__location').value = '';
                    document.getElementById('GE_FOM_003__department').value = '';
                }
            }

            // AJAX form submission for FOM-003
            (function() {
                function initSampleRejectionForm() {
                    const formContainer = document.querySelector('[id="TDPL/GE/FOM-003"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form) return;

                    if (form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn.textContent;

                        submitBtn.textContent = 'Saving...';
                        submitBtn.disabled = true;

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                if (result.data && result.data.id) {
                                    document.getElementById('GE_FOM_003__record_id').value = result.data.id;
                                }
                                showToastFOM003('success', result.message || 'Saved successfully!');
                            } else {
                                showToastFOM003('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastFOM003('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                function showToastFOM003(type, message) {
                    const existingToast = document.querySelector('.ge-toast-fom003');
                    if (existingToast) existingToast.remove();

                    const toast = document.createElement('div');
                    toast.className = 'ge-toast-fom003';
                    toast.style.cssText = `
                        position: fixed; top: 20px; right: 20px; padding: 15px 25px;
                        border-radius: 5px; color: white; font-weight: bold; z-index: 9999;
                        background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initSampleRejectionForm);
                } else {
                    initSampleRejectionForm();
                }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-004"
        docNo="TDPL/GE/FOM-004"
        docName="Accident Reporting Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.ge.forms.submit') }}">

        {{-- FILTERS --}}
        <div style="display:flex; gap:16px; margin-bottom:12px;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="GE_FOM_004__from_date" onchange="loadAccidentReportingData()"
                    style="border:1px solid #000; padding:4px;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="GE_FOM_004__to_date" onchange="loadAccidentReportingData()"
                    style="border:1px solid #000; padding:4px;">
            </div>
            <div>
                <label><strong>Location</strong></label>
                <input type="text" name="location" id="GE_FOM_004__location" list="GE_FOM_004__location_list"
                    onchange="loadAccidentReportingData()" onblur="loadAccidentReportingData()"
                    style="border:1px solid #000; padding:4px; width:200px;" placeholder="Select or type">
                <datalist id="GE_FOM_004__location_list">
                    <option value="Main Lab">
                    <option value="Branch Lab 1">
                    <option value="Branch Lab 2">
                    <option value="Collection Center 1">
                    <option value="Collection Center 2">
                    <option value="Head Office">
                    <option value="Warehouse">
                </datalist>
            </div>
        </div>

        {{-- TABLE --}}
        <table border="1" cellspacing="0" cellpadding="4" style="width:100%; border-collapse:collapse;">
            <thead>
                <tr>
                    <th style="padding:6px; border:1px solid #000;">S.No</th>
                    <th style="padding:6px; border:1px solid #000;">Date &amp; Time</th>
                    <th style="padding:6px; border:1px solid #000;">Person Involved</th>
                    <th style="padding:6px; border:1px solid #000;">Injuries Sustained</th>
                    <th style="padding:6px; border:1px solid #000;">Emergency First-Aid Given</th>
                    <th style="padding:6px; border:1px solid #000;">First-Aid Given By<br><span style="font-weight:400;">(Name &amp; Signature)</span></th>
                    <th style="padding:6px; border:1px solid #000;">Follow-Up Action</th>
                    <th style="padding:6px; border:1px solid #000;">Preventive Action</th>
                </tr>
            </thead>
            <tbody id="GE_FOM_004__tbody">
                {{-- Single empty row for new entry --}}
                <tr>
                    <td style="border:1px solid #000; padding:4px;"><input name="sno[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="datetime-local" name="date_time[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="person_involved[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="injuries_sustained[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="emergency_first_aid[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="first_aid_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="follow_up_action[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="preventive_action[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                </tr>
            </tbody>
        </table>

        <script>
            // Load Accident Reporting records based on date range filters
            function loadAccidentReportingData() {
                const fromDate = document.getElementById('GE_FOM_004__from_date').value;
                const toDate = document.getElementById('GE_FOM_004__to_date').value;

                // At least one date filter required
                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                const location = document.getElementById('GE_FOM_004__location').value;
                if (location) params.append('location', location);

                fetch(`/newforms/ge/accident-reporting/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    clearAccidentReportingForm();

                    const tbody = document.getElementById('GE_FOM_004__tbody');
                    if (!tbody || !res.data || res.data.length === 0) return;

                    res.data.forEach((row, index) => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td style="border:1px solid #000; padding:4px;">
                                <input type="hidden" name="row_id[]" value="${row.id}">
                                <input name="sno[]" value="${index + 1}" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #000; padding:4px;">
                                <input type="datetime-local" name="date_time[]" value="${row.date_time ? row.date_time.replace(' ', 'T').substring(0, 16) : ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #000; padding:4px;">
                                <input name="person_involved[]" value="${row.person_involved || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #000; padding:4px;">
                                <input name="injuries_sustained[]" value="${row.injuries_sustained || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #000; padding:4px;">
                                <input name="emergency_first_aid[]" value="${row.emergency_first_aid || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #000; padding:4px;">
                                <input name="first_aid_by[]" value="${row.first_aid_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #000; padding:4px;">
                                <input name="follow_up_action[]" value="${row.follow_up_action || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #000; padding:4px;">
                                <input name="preventive_action[]" value="${row.preventive_action || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                        `;
                        tbody.appendChild(tr);
                    });
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function clearAccidentReportingForm() {
                const tbody = document.getElementById('GE_FOM_004__tbody');
                if (tbody) tbody.innerHTML = '';
            }

            // Toast notification
            function showToastFOM004(type, message) {
                const existingToast = document.querySelector('.ge-toast-fom004');
                if (existingToast) existingToast.remove();

                const toast = document.createElement('div');
                toast.className = 'ge-toast-fom004';
                toast.style.cssText = `
                    position: fixed; top: 20px; right: 20px; padding: 15px 25px;
                    border-radius: 5px; color: white; font-weight: bold; z-index: 9999;
                    background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                `;
                toast.textContent = message;
                document.body.appendChild(toast);
                setTimeout(() => toast.remove(), 3000);
            }

            // AJAX form submission - stay on same page
            (function() {
                function initAccidentReportingForm() {
                    const formContainer = document.querySelector('[id="TDPL/GE/FOM-004"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn.textContent;

                        submitBtn.textContent = 'Saving...';
                        submitBtn.disabled = true;

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            showToastFOM004('success', result.message || 'Saved successfully!');
                            // Reload data to show updated records
                            loadAccidentReportingData();
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastFOM004('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initAccidentReportingForm);
                } else {
                    initAccidentReportingForm();
                }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-005"
        docNo="TDPL/GE/FOM-005"
        docName="Analyte Calibration Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.ge.forms.submit') }}">

        {{-- FILTERS --}}
        <div style="display:flex; gap:16px; margin-bottom:12px; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="GE_FOM_005__from_date" onchange="loadAnalyteCalibrationData()"
                    style="border:1px solid #000; padding:4px;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="GE_FOM_005__to_date" onchange="loadAnalyteCalibrationData()"
                    style="border:1px solid #000; padding:4px;">
            </div>
            <div>
                <label><strong>Location</strong></label>
                <input type="text" name="location" id="GE_FOM_005__location" list="GE_FOM_005__location_list"
                    onchange="loadAnalyteCalibrationData()" onblur="loadAnalyteCalibrationData()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="GE_FOM_005__location_list">
                    <option value="Main Lab">
                    <option value="Branch Lab 1">
                    <option value="Branch Lab 2">
                    <option value="Collection Center 1">
                    <option value="Collection Center 2">
                </datalist>
            </div>
            <div>
                <label><strong>Department</strong></label>
                <input type="text" name="department" id="GE_FOM_005__department" list="GE_FOM_005__department_list"
                    onchange="loadAnalyteCalibrationData()" onblur="loadAnalyteCalibrationData()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="GE_FOM_005__department_list">
                    <option value="Biochemistry">
                    <option value="Hematology">
                    <option value="Microbiology">
                    <option value="Clinical Pathology">
                    <option value="Histopathology">
                </datalist>
            </div>
        </div>

        {{-- TABLE --}}
        <table border="1" cellspacing="0" cellpadding="4" style="width:100%; border-collapse:collapse;">
            <thead>
                <tr>
                    <th rowspan="2" style="border:1px solid #000; padding:4px;">S.No</th>
                    <th rowspan="2" style="border:1px solid #000; padding:4px;">Date</th>
                    <th rowspan="2" style="border:1px solid #000; padding:4px;">Parameters</th>
                    <th rowspan="2" style="border:1px solid #000; padding:4px;">Calibrator Used</th>
                    <th rowspan="2" style="border:1px solid #000; padding:4px;">Lot No.</th>
                    <th colspan="6" style="border:1px solid #000; padding:4px; text-align:center;">QC Value</th>
                    <th rowspan="2" style="border:1px solid #000; padding:4px;">Lab Staff Sign</th>
                    <th rowspan="2" style="border:1px solid #000; padding:4px;">Supervisor Sign</th>
                </tr>
                <tr>
                    <th style="border:1px solid #000; padding:4px;">Level 1</th>
                    <th style="border:1px solid #000; padding:4px;">Accept/Unaccept</th>
                    <th style="border:1px solid #000; padding:4px;">Level 2</th>
                    <th style="border:1px solid #000; padding:4px;">Accept/Unaccept</th>
                    <th style="border:1px solid #000; padding:4px;">Level 3</th>
                    <th style="border:1px solid #000; padding:4px;">Accept/Unaccept</th>
                </tr>
            </thead>
            <tbody id="GE_FOM_005__tbody">
                {{-- Single empty row for new entry --}}
                <tr>
                    <td style="border:1px solid #000; padding:4px;"><input name="sno[]" style="width:50px; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="calibration_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="parameters[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="calibrator_used[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="lot_no[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="level1[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;">
                        <select name="level1_status[]" style="width:100%; border:1px solid #ccc; padding:4px;">
                            <option value="">--</option>
                            <option value="Acceptable">Acceptable</option>
                            <option value="Unacceptable">Unacceptable</option>
                        </select>
                    </td>
                    <td style="border:1px solid #000; padding:4px;"><input name="level2[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;">
                        <select name="level2_status[]" style="width:100%; border:1px solid #ccc; padding:4px;">
                            <option value="">--</option>
                            <option value="Acceptable">Acceptable</option>
                            <option value="Unacceptable">Unacceptable</option>
                        </select>
                    </td>
                    <td style="border:1px solid #000; padding:4px;"><input name="level3[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;">
                        <select name="level3_status[]" style="width:100%; border:1px solid #ccc; padding:4px;">
                            <option value="">--</option>
                            <option value="Acceptable">Acceptable</option>
                            <option value="Unacceptable">Unacceptable</option>
                        </select>
                    </td>
                    <td style="border:1px solid #000; padding:4px;"><input name="lab_staff_sign[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="supervisor_sign[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                </tr>
            </tbody>
        </table>

        <script>
            // Load Analyte Calibration records based on date range filters
            function loadAnalyteCalibrationData() {
                const fromDate = document.getElementById('GE_FOM_005__from_date').value;
                const toDate = document.getElementById('GE_FOM_005__to_date').value;

                // At least one date filter required
                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                const location = document.getElementById('GE_FOM_005__location').value;
                if (location) params.append('location', location);

                const department = document.getElementById('GE_FOM_005__department').value;
                if (department) params.append('department', department);

                fetch(`/newforms/ge/analyte-calibration/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    clearAnalyteCalibrationForm();

                    const tbody = document.getElementById('GE_FOM_005__tbody');
                    if (!tbody || !res.data || res.data.length === 0) return;

                    res.data.forEach((row, index) => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td style="border:1px solid #000; padding:4px;">
                                <input type="hidden" name="row_id[]" value="${row.id}">
                                <input name="sno[]" value="${index + 1}" style="width:50px; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #000; padding:4px;">
                                <input type="date" name="calibration_date[]" value="${row.calibration_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #000; padding:4px;">
                                <input name="parameters[]" value="${row.parameters || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #000; padding:4px;">
                                <input name="calibrator_used[]" value="${row.calibrator_used || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #000; padding:4px;">
                                <input name="lot_no[]" value="${row.lot_no || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #000; padding:4px;">
                                <input name="level1[]" value="${row.level1 || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #000; padding:4px;">
                                <select name="level1_status[]" style="width:100%; border:1px solid #ccc; padding:4px;">
                                    <option value="">--</option>
                                    <option value="Acceptable" ${row.level1_status === 'Acceptable' ? 'selected' : ''}>Acceptable</option>
                                    <option value="Unacceptable" ${row.level1_status === 'Unacceptable' ? 'selected' : ''}>Unacceptable</option>
                                </select>
                            </td>
                            <td style="border:1px solid #000; padding:4px;">
                                <input name="level2[]" value="${row.level2 || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #000; padding:4px;">
                                <select name="level2_status[]" style="width:100%; border:1px solid #ccc; padding:4px;">
                                    <option value="">--</option>
                                    <option value="Acceptable" ${row.level2_status === 'Acceptable' ? 'selected' : ''}>Acceptable</option>
                                    <option value="Unacceptable" ${row.level2_status === 'Unacceptable' ? 'selected' : ''}>Unacceptable</option>
                                </select>
                            </td>
                            <td style="border:1px solid #000; padding:4px;">
                                <input name="level3[]" value="${row.level3 || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #000; padding:4px;">
                                <select name="level3_status[]" style="width:100%; border:1px solid #ccc; padding:4px;">
                                    <option value="">--</option>
                                    <option value="Acceptable" ${row.level3_status === 'Acceptable' ? 'selected' : ''}>Acceptable</option>
                                    <option value="Unacceptable" ${row.level3_status === 'Unacceptable' ? 'selected' : ''}>Unacceptable</option>
                                </select>
                            </td>
                            <td style="border:1px solid #000; padding:4px;">
                                <input name="lab_staff_sign[]" value="${row.lab_staff_sign || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #000; padding:4px;">
                                <input name="supervisor_sign[]" value="${row.supervisor_sign || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                        `;
                        tbody.appendChild(tr);
                    });
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function clearAnalyteCalibrationForm() {
                const tbody = document.getElementById('GE_FOM_005__tbody');
                if (tbody) tbody.innerHTML = '';
            }

            // Toast notification
            function showToastFOM005(type, message) {
                const existingToast = document.querySelector('.ge-toast-fom005');
                if (existingToast) existingToast.remove();

                const toast = document.createElement('div');
                toast.className = 'ge-toast-fom005';
                toast.style.cssText = `
                    position: fixed; top: 20px; right: 20px; padding: 15px 25px;
                    border-radius: 5px; color: white; font-weight: bold; z-index: 9999;
                    background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                `;
                toast.textContent = message;
                document.body.appendChild(toast);
                setTimeout(() => toast.remove(), 3000);
            }

            // AJAX form submission - stay on same page
            (function() {
                function initAnalyteCalibrationForm() {
                    const formContainer = document.querySelector('[id="TDPL/GE/FOM-005"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn.textContent;

                        submitBtn.textContent = 'Saving...';
                        submitBtn.disabled = true;

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            showToastFOM005('success', result.message || 'Saved successfully!');
                            // Reload data to show updated records
                            loadAnalyteCalibrationData();
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastFOM005('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initAnalyteCalibrationForm);
                } else {
                    initAnalyteCalibrationForm();
                }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-006"
        docNo="TDPL/GE/FOM-006"
        docName="Biomedical Waste Disposal Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.ge.forms.submit') }}">

        {{-- FILTERS --}}
        <div style="display:flex; gap:16px; margin-bottom:12px; flex-wrap:wrap;">
            <div>
                <label><strong>Month &amp; Year</strong></label>
                <input type="month" name="month_year" id="GE_FOM_006__month_year"
                    onchange="loadBiomedicalWasteData()"
                    style="border:1px solid #000; padding:4px;">
            </div>
            <div>
                <label><strong>Biomedical Waste Collection Agency Name</strong></label>
                <input type="text" name="agency_name" id="GE_FOM_006__agency_name"
                    list="GE_FOM_006__agency_list"
                    onchange="loadBiomedicalWasteData()" onblur="loadBiomedicalWasteData()"
                    style="border:1px solid #000; padding:4px; width:280px;" placeholder="Select or type">
                <datalist id="GE_FOM_006__agency_list">
                    <option value="Agency 1">
                    <option value="Agency 2">
                    <option value="Agency 3">
                    <option value="Biomedical Waste Services">
                    <option value="Medical Waste Solutions">
                </datalist>
            </div>
        </div>

        {{-- TABLE --}}
        <table style="width:100%; border-collapse:collapse; background:#fff; border:1px solid #000;">
            <thead>
                <tr>
                    <th rowspan="2" style="border:1px solid #000; padding:4px;">Date</th>
                    <th colspan="8" style="border:1px solid #000; padding:4px; text-align:center;">Waste Category / Waste in Kg</th>
                    <th rowspan="2" style="border:1px solid #000; padding:4px;">Handover Staff Sign</th>
                    <th rowspan="2" style="border:1px solid #000; padding:4px;">BMW Handler Sign</th>
                </tr>
                <tr>
                    <th style="border:1px solid #000; padding:4px;">Red Colour</th>
                    <th style="border:1px solid #000; padding:4px;">Weight</th>
                    <th style="border:1px solid #000; padding:4px;">Yellow Colour</th>
                    <th style="border:1px solid #000; padding:4px;">Weight</th>
                    <th style="border:1px solid #000; padding:4px;">Blue Colour</th>
                    <th style="border:1px solid #000; padding:4px;">Weight</th>
                    <th style="border:1px solid #000; padding:4px;">Sharp Container</th>
                    <th style="border:1px solid #000; padding:4px;">Weight</th>
                </tr>
            </thead>
            <tbody id="GE_FOM_006__tbody">
                @for($day = 1; $day <= 31; $day++)
                <tr>
                    <td style="border:1px solid #000; padding:4px; text-align:center;">
                        <strong>{{ $day }}</strong>
                        <input type="hidden" name="rows[{{ $day }}][date]" value="{{ $day }}">
                    </td>
                    <td style="border:1px solid #000; padding:4px;">
                        <input type="number" name="rows[{{ $day }}][red]" id="GE_FOM_006__red_{{ $day }}"
                            style="width:100%; border:1px solid #ccc; padding:3px;">
                    </td>
                    <td style="border:1px solid #000; padding:4px;">
                        <input type="number" step="0.01" name="rows[{{ $day }}][red_weight]" id="GE_FOM_006__red_weight_{{ $day }}"
                            style="width:100%; border:1px solid #ccc; padding:3px;">
                    </td>
                    <td style="border:1px solid #000; padding:4px;">
                        <input type="number" name="rows[{{ $day }}][yellow]" id="GE_FOM_006__yellow_{{ $day }}"
                            style="width:100%; border:1px solid #ccc; padding:3px;">
                    </td>
                    <td style="border:1px solid #000; padding:4px;">
                        <input type="number" step="0.01" name="rows[{{ $day }}][yellow_weight]" id="GE_FOM_006__yellow_weight_{{ $day }}"
                            style="width:100%; border:1px solid #ccc; padding:3px;">
                    </td>
                    <td style="border:1px solid #000; padding:4px;">
                        <input type="number" name="rows[{{ $day }}][blue]" id="GE_FOM_006__blue_{{ $day }}"
                            style="width:100%; border:1px solid #ccc; padding:3px;">
                    </td>
                    <td style="border:1px solid #000; padding:4px;">
                        <input type="number" step="0.01" name="rows[{{ $day }}][blue_weight]" id="GE_FOM_006__blue_weight_{{ $day }}"
                            style="width:100%; border:1px solid #ccc; padding:3px;">
                    </td>
                    <td style="border:1px solid #000; padding:4px;">
                        <input type="number" name="rows[{{ $day }}][sharp]" id="GE_FOM_006__sharp_{{ $day }}"
                            style="width:100%; border:1px solid #ccc; padding:3px;">
                    </td>
                    <td style="border:1px solid #000; padding:4px;">
                        <input type="number" step="0.01" name="rows[{{ $day }}][sharp_weight]" id="GE_FOM_006__sharp_weight_{{ $day }}"
                            style="width:100%; border:1px solid #ccc; padding:3px;">
                    </td>
                    <td style="border:1px solid #000; padding:4px;">
                        <input type="text" name="rows[{{ $day }}][handover_signature]" id="GE_FOM_006__handover_{{ $day }}"
                            style="width:100%; border:1px solid #ccc; padding:3px;">
                    </td>
                    <td style="border:1px solid #000; padding:4px;">
                        <input type="text" name="rows[{{ $day }}][handler_signature]" id="GE_FOM_006__handler_{{ $day }}"
                            style="width:100%; border:1px solid #ccc; padding:3px;">
                    </td>
                </tr>
                @endfor
            </tbody>
        </table>

        <script>
            // Load Biomedical Waste data based on month_year filter
            function loadBiomedicalWasteData() {
                const monthYear = document.getElementById('GE_FOM_006__month_year').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('month_year', monthYear);

                const agencyName = document.getElementById('GE_FOM_006__agency_name').value;
                if (agencyName) params.append('agency_name', agencyName);

                fetch(`/newforms/ge/biomedical-waste/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    // Clear all fields first
                    clearBiomedicalWasteForm();

                    if (!res.data || !res.data.daily_data) return;

                    // Populate data into form
                    const dailyData = res.data.daily_data;
                    for (let day = 1; day <= 31; day++) {
                        if (dailyData[day]) {
                            const row = dailyData[day];
                            setFieldValue('GE_FOM_006__red_' + day, row.red);
                            setFieldValue('GE_FOM_006__red_weight_' + day, row.red_weight);
                            setFieldValue('GE_FOM_006__yellow_' + day, row.yellow);
                            setFieldValue('GE_FOM_006__yellow_weight_' + day, row.yellow_weight);
                            setFieldValue('GE_FOM_006__blue_' + day, row.blue);
                            setFieldValue('GE_FOM_006__blue_weight_' + day, row.blue_weight);
                            setFieldValue('GE_FOM_006__sharp_' + day, row.sharp);
                            setFieldValue('GE_FOM_006__sharp_weight_' + day, row.sharp_weight);
                            setFieldValue('GE_FOM_006__handover_' + day, row.handover_signature);
                            setFieldValue('GE_FOM_006__handler_' + day, row.handler_signature);
                        }
                    }

                    // Set agency name if returned
                    if (res.data.agency_name) {
                        document.getElementById('GE_FOM_006__agency_name').value = res.data.agency_name;
                    }
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function setFieldValue(id, value) {
                const el = document.getElementById(id);
                if (el && value !== undefined && value !== null) {
                    el.value = value;
                }
            }

            function clearBiomedicalWasteForm() {
                for (let day = 1; day <= 31; day++) {
                    setFieldValue('GE_FOM_006__red_' + day, '');
                    setFieldValue('GE_FOM_006__red_weight_' + day, '');
                    setFieldValue('GE_FOM_006__yellow_' + day, '');
                    setFieldValue('GE_FOM_006__yellow_weight_' + day, '');
                    setFieldValue('GE_FOM_006__blue_' + day, '');
                    setFieldValue('GE_FOM_006__blue_weight_' + day, '');
                    setFieldValue('GE_FOM_006__sharp_' + day, '');
                    setFieldValue('GE_FOM_006__sharp_weight_' + day, '');
                    setFieldValue('GE_FOM_006__handover_' + day, '');
                    setFieldValue('GE_FOM_006__handler_' + day, '');
                }
            }

            // Toast notification
            function showToastFOM006(type, message) {
                const existingToast = document.querySelector('.ge-toast-fom006');
                if (existingToast) existingToast.remove();

                const toast = document.createElement('div');
                toast.className = 'ge-toast-fom006';
                toast.style.cssText = `
                    position: fixed; top: 20px; right: 20px; padding: 15px 25px;
                    border-radius: 5px; color: white; font-weight: bold; z-index: 9999;
                    background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                `;
                toast.textContent = message;
                document.body.appendChild(toast);
                setTimeout(() => toast.remove(), 3000);
            }

            // AJAX form submission - stay on same page
            (function() {
                function initBiomedicalWasteForm() {
                    const formContainer = document.querySelector('[id="TDPL/GE/FOM-006"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn.textContent;

                        submitBtn.textContent = 'Saving...';
                        submitBtn.disabled = true;

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastFOM006('success', result.message || 'Saved successfully!');
                            } else {
                                showToastFOM006('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastFOM006('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initBiomedicalWasteForm);
                } else {
                    initBiomedicalWasteForm();
                }
            })();
        </script>

    </x-formTemplete>


    <x-formTemplete
        id="TDPL/GE/FOM-007"
        docNo="TDPL/GE/FOM-007"
        docName="Physician Feedback Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.ge.forms.submit') }}">

        {{-- FILTERS --}}
        <div style="display:flex; gap:16px; margin-bottom:12px; flex-wrap:wrap;">
            <div>
                <label><strong>Month &amp; Year</strong></label>
                <input type="month" name="month_year" id="GE_FOM_007__month_year"
                    onchange="loadPhysicianFeedbackData()"
                    style="border:1px solid #000; padding:4px;">
            </div>
            <div>
                <label><strong>Client Code</strong></label>
                <input type="text" name="client_code" id="GE_FOM_007__client_code"
                    list="GE_FOM_007__client_list"
                    onchange="loadPhysicianFeedbackData()" onblur="loadPhysicianFeedbackData()"
                    style="border:1px solid #000; padding:4px; width:200px;" placeholder="Select or type">
                <datalist id="GE_FOM_007__client_list">
                    <option value="CLIENT001">
                    <option value="CLIENT002">
                    <option value="CLIENT003">
                    <option value="HOSP001">
                    <option value="HOSP002">
                    <option value="CLINIC001">
                </datalist>
            </div>
        </div>

        <p style="text-align:center; font-weight:bold; margin:20px 0;">
            Kindly rate the services provided by TRUSTlab Diagnostics
        </p>

        <table style="width:100%; border-collapse:collapse; border:1px solid #000;">
            <tr>
                <td style="border:1px solid #000; padding:6px;"><strong>S. No.</strong></td>
                <td style="border:1px solid #000; padding:6px;"><strong>Laboratory Service</strong></td>
                @foreach(['very_good' => 'Very Good', 'good' => 'Good', 'satisfactory' => 'Satisfactory', 'needs_improvement' => 'Needs Improvement'] as $label)
                <td style="border:1px solid #000; padding:6px; text-align:center;">
                    <strong>{{ $label }}</strong>
                </td>
                @endforeach
            </tr>

            @foreach([
                'Sample collection',
                'Lab Results',
                'Lab Reports & Dispatch',
                'Emergency Lab services',
                'Critical Alerts',
                'Communication',
                'Turn Around Time (TAT)',
            ] as $index => $service)
            <tr>
                <td style="border:1px solid #000; padding:6px;">{{ $index + 1 }}</td>
                <td style="border:1px solid #000; padding:6px;">{{ $service }}</td>
                @foreach(['very_good' => 'Very Good', 'good' => 'Good', 'satisfactory' => 'Satisfactory', 'needs_improvement' => 'Needs Improvement'] as $key => $label)
                <td style="border:1px solid #000; padding:6px; text-align:center;">
                    <input type="radio"
                        name="rating[{{ $index }}]"
                        id="GE_FOM_007__rating_{{ $index }}_{{ $key }}"
                        value="{{ $key }}"
                        style="width:16px; height:16px;">
                </td>
                @endforeach
            </tr>
            @endforeach
        </table>

        <p style="margin-top:25px; font-weight:bold;">Additional Feedback/Comments:</p>
        <textarea name="comments" id="GE_FOM_007__comments" style="width:100%; height:150px; border:1px solid #000; padding:8px;"></textarea>

        <p style="margin-top:30px; font-weight:bold;">Name of the Doctor:</p>
        <input type="text" name="doctor_name" id="GE_FOM_007__doctor_name" style="width:100%; border:1px solid #000; padding:6px;">

        <p style="margin-top:30px; font-weight:bold;">Signature of the Doctor:</p>
        <input type="text" name="doctor_signature" id="GE_FOM_007__doctor_signature" style="width:100%; border:1px solid #000; padding:6px;">

        <script>
            // Load Physician Feedback data based on month_year filter
            function loadPhysicianFeedbackData() {
                const monthYear = document.getElementById('GE_FOM_007__month_year').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('month_year', monthYear);

                const clientCode = document.getElementById('GE_FOM_007__client_code').value;
                if (clientCode) params.append('client_code', clientCode);

                fetch(`/newforms/ge/physician-feedback/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    // Clear all fields first
                    clearPhysicianFeedbackForm();

                    if (!res.data) return;

                    // Populate ratings (radio buttons)
                    if (res.data.ratings) {
                        for (const [index, value] of Object.entries(res.data.ratings)) {
                            const radio = document.getElementById('GE_FOM_007__rating_' + index + '_' + value);
                            if (radio) radio.checked = true;
                        }
                    }

                    // Populate other fields
                    if (res.data.comments) {
                        document.getElementById('GE_FOM_007__comments').value = res.data.comments;
                    }
                    if (res.data.doctor_name) {
                        document.getElementById('GE_FOM_007__doctor_name').value = res.data.doctor_name;
                    }
                    if (res.data.doctor_signature) {
                        document.getElementById('GE_FOM_007__doctor_signature').value = res.data.doctor_signature;
                    }
                    if (res.data.client_code) {
                        document.getElementById('GE_FOM_007__client_code').value = res.data.client_code;
                    }
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function clearPhysicianFeedbackForm() {
                // Clear radio buttons
                const ratingKeys = ['very_good', 'good', 'satisfactory', 'needs_improvement'];
                for (let i = 0; i < 7; i++) {
                    ratingKeys.forEach(key => {
                        const radio = document.getElementById('GE_FOM_007__rating_' + i + '_' + key);
                        if (radio) radio.checked = false;
                    });
                }

                // Clear other fields
                document.getElementById('GE_FOM_007__comments').value = '';
                document.getElementById('GE_FOM_007__doctor_name').value = '';
                document.getElementById('GE_FOM_007__doctor_signature').value = '';
            }

            // Toast notification
            function showToastFOM007(type, message) {
                const existingToast = document.querySelector('.ge-toast-fom007');
                if (existingToast) existingToast.remove();

                const toast = document.createElement('div');
                toast.className = 'ge-toast-fom007';
                toast.style.cssText = `
                    position: fixed; top: 20px; right: 20px; padding: 15px 25px;
                    border-radius: 5px; color: white; font-weight: bold; z-index: 9999;
                    background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                `;
                toast.textContent = message;
                document.body.appendChild(toast);
                setTimeout(() => toast.remove(), 3000);
            }

            // AJAX form submission - stay on same page
            (function() {
                function initPhysicianFeedbackForm() {
                    const formContainer = document.querySelector('[id="TDPL/GE/FOM-007"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn.textContent;

                        submitBtn.textContent = 'Saving...';
                        submitBtn.disabled = true;

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastFOM007('success', result.message || 'Saved successfully!');
                            } else {
                                showToastFOM007('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastFOM007('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initPhysicianFeedbackForm);
                } else {
                    initPhysicianFeedbackForm();
                }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-008"
        docNo="TDPL/GE/FOM-008"
        docName="Critical Call-Out Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.ge.forms.submit') }}">

        <!-- Filters -->
        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="fom008_from_date"
                    style="border:1px solid #000; padding:5px; margin-left:5px;"
                    onchange="loadCriticalCallOutForm()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="fom008_to_date"
                    style="border:1px solid #000; padding:5px; margin-left:5px;"
                    onchange="loadCriticalCallOutForm()">
            </div>
            <button type="button" onclick="clearCriticalCallOutForm()"
                style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <table style="width:100%; border-collapse:collapse; border:1px solid #000;">
            <thead>
                <tr>
                    @foreach([
                    'Date',
                    'Patient ID',
                    'Test Parameter',
                    'Initial Value',
                    'Cross Check Value',
                    'Reporting Time',
                    'Concern Clinician/ Patient Informed',
                    'Readback Value from Clinician/Patient',
                    'Time of Informing',
                    'Signature of Person Informing'
                    ] as $header)
                    <td style="border:1px solid #000; padding:6px; font-weight:bold;">
                        {{ $header }}
                    </td>
                    @endforeach
                </tr>
            </thead>
            <tbody id="fom008_tbody">
                <!-- Rows loaded via JS -->
                <tr>
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="hidden" name="row_id[]" value="">
                        <input type="date" name="call_date[]"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="patient_id[]"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="test_parameter[]"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="initial_value[]"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="cross_check_value[]"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="time" name="reporting_time[]"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="informed[]"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="readback_value[]"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="time" name="informing_time[]"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="person_sign[]"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>
                </tr>
            </tbody>
        </table>

        <script>
            function loadCriticalCallOutForm() {
                const fromDate = document.getElementById('fom008_from_date').value;
                const toDate = document.getElementById('fom008_to_date').value;

                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                fetch(`/newforms/ge/critical-callout/load?${params.toString()}`)
                    .then(res => res.json())
                    .then(result => {
                        const tbody = document.getElementById('fom008_tbody');
                        tbody.innerHTML = '';

                        if (result.success && result.data.length > 0) {
                            result.data.forEach(row => {
                                tbody.innerHTML += buildCriticalCallOutRow(row);
                            });
                        }
                        // Always add one empty row for new entry
                        tbody.innerHTML += buildCriticalCallOutRow(null);
                    })
                    .catch(err => console.error('Load error:', err));
            }

            function buildCriticalCallOutRow(data) {
                const d = data || {};
                return `
                <tr>
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="hidden" name="row_id[]" value="${d.id || ''}">
                        <input type="date" name="call_date[]" value="${d.call_date ? d.call_date.split('T')[0] : ''}"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="patient_id[]" value="${d.patient_id || ''}"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="test_parameter[]" value="${d.test_parameter || ''}"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="initial_value[]" value="${d.initial_value || ''}"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="cross_check_value[]" value="${d.cross_check_value || ''}"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="time" name="reporting_time[]" value="${d.reporting_time || ''}"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="informed[]" value="${d.informed || ''}"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="readback_value[]" value="${d.readback_value || ''}"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="time" name="informing_time[]" value="${d.informing_time || ''}"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="person_sign[]" value="${d.person_sign || ''}"
                            style="width:100%; border:1px solid #000; padding:4px;">
                    </td>
                </tr>`;
            }

            function clearCriticalCallOutForm() {
                document.getElementById('fom008_from_date').value = '';
                document.getElementById('fom008_to_date').value = '';
                const tbody = document.getElementById('fom008_tbody');
                tbody.innerHTML = buildCriticalCallOutRow(null);
            }

            // AJAX Submit for FOM-008
            (function() {
                function initCriticalCallOutForm() {
                    const formContainer = document.querySelector('[id="TDPL/GE/FOM-008"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastFOM008('success', result.message || 'Saved successfully!');
                                loadCriticalCallOutForm();
                            } else {
                                showToastFOM008('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastFOM008('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });

                        return false;
                    });
                }

                function showToastFOM008(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position: fixed; top: 20px; right: 20px; z-index: 9999;
                        padding: 15px 25px; border-radius: 5px; color: white;
                        font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.3);
                        background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initCriticalCallOutForm);
                } else {
                    initCriticalCallOutForm();
                }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-009"
        docNo="TDPL/GE/FOM-009"
        docName="EQAS Sample Processing Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.ge.forms.submit') }}">

        <!-- Hidden field for record ID (for inline edit) -->
        <input type="hidden" name="eqas_sample_processing_form_id" id="fom009_record_id" value="">

        <div style="font-size:14px; line-height:22px; background:#fff; border:1px solid #ccc; padding:20px; border-radius:10px; width:100%;">

            <p style="margin-bottom:12px;">
                <strong style="display:inline-block; width:250px;">Name Of EQAS Provider:</strong>
                <input type="text" name="eqas_provider" id="fom009_eqas_provider" list="fom009_provider_list"
                    style="border:1px solid #000; padding:6px; width:60%; border-radius:6px;"
                    onchange="loadEqasSampleProcessingForm()">
                <datalist id="fom009_provider_list"></datalist>
            </p>

            <p style="margin-bottom:12px;">
                <strong style="display:inline-block; width:250px;">EQAS Lab ID:</strong>
                <input type="text" name="eqas_lab_id" id="fom009_eqas_lab_id"
                    style="border:1px solid #000; padding:6px; width:20%; border-radius:6px;">

                <strong style="display:inline-block; width:150px; margin-left:20px;">Department Name:</strong>
                <input type="text" name="department_name" id="fom009_department_name" list="fom009_dept_list"
                    style="border:1px solid #000; padding:6px; width:28%; border-radius:6px;">
                <datalist id="fom009_dept_list"></datalist>
            </p>

            <p style="margin-bottom:12px;">
                <strong style="display:inline-block; width:250px;">Temperature at Receiving:</strong>
                <input type="text" name="sample_temperature" id="fom009_sample_temperature"
                    style="border:1px solid #000; padding:6px; width:40%; border-radius:6px;">
            </p>

            <p style="margin-bottom:12px;">
                <strong style="display:inline-block; width:250px;">EQAS Sample No.:</strong>
                <input type="text" name="sample_no" id="fom009_sample_no"
                    style="border:1px solid #000; padding:6px; width:40%; border-radius:6px;"
                    onchange="loadEqasSampleProcessingForm()">
            </p>

            <p style="margin-bottom:12px;">
                <strong style="display:inline-block; width:250px;">EQAS Accession/SIN No.:</strong>
                <input type="text" name="accession_no" id="fom009_accession_no"
                    style="border:1px solid #000; padding:6px; width:40%; border-radius:6px;">
            </p>

            <p style="margin-bottom:12px;">
                <strong style="display:inline-block; width:250px;">Reconstituted By (Name):</strong>
                <input type="text" name="reconstituted_by" id="fom009_reconstituted_by"
                    style="border:1px solid #000; padding:6px; width:40%; border-radius:6px;">
            </p>

            <p style="margin-bottom:12px;">
                <strong style="display:inline-block; width:250px;">Reconstitution Date:</strong>
                <input type="date" name="reconstitution_date" id="fom009_reconstitution_date"
                    style="border:1px solid #000; padding:6px; width:25%; border-radius:6px;">
            </p>

            <p style="margin-bottom:12px;">
                <strong style="display:inline-block; width:250px;">Processed By:</strong>
                <input type="text" name="processed_by" id="fom009_processed_by"
                    style="border:1px solid #000; padding:6px; width:40%; border-radius:6px;">
            </p>

            <p style="margin-bottom:12px;">
                <strong style="display:inline-block; width:250px;">Reviewed By (Pathologist):</strong>
                <input type="text" name="reviewed_by" id="fom009_reviewed_by"
                    style="border:1px solid #000; padding:6px; width:40%; border-radius:6px;">
            </p>

            <p style="margin-bottom:12px;">
                <strong style="display:inline-block; width:250px;">Result Shared with QA Dept:</strong>
                <input type="text" name="qa_shared" id="fom009_qa_shared"
                    style="border:1px solid #000; padding:6px; width:40%; border-radius:6px;">
            </p>

            <p style="margin-bottom:12px;">
                <strong style="display:inline-block; width:250px;">Result Dispatched Date:</strong>
                <input type="date" name="result_dispatched_date" id="fom009_result_dispatched_date"
                    style="border:1px solid #000; padding:6px; width:25%; border-radius:6px;">
            </p>

            <p style="margin-bottom:5px;">
                <strong style="display:inline-block; width:250px;">EQAS Evaluation Received:</strong>
                <input type="date" name="evaluation_received_date" id="fom009_evaluation_received_date"
                    style="border:1px solid #000; padding:6px; width:25%; border-radius:6px;">
            </p>

            <p style="margin-top:15px;">
                <button type="button" onclick="clearEqasSampleProcessingForm()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear Form
                </button>
            </p>

        </div>

        <script>
            function loadEqasSampleProcessingForm() {
                const provider = document.getElementById('fom009_eqas_provider').value;
                const sampleNo = document.getElementById('fom009_sample_no').value;

                if (!provider && !sampleNo) return;

                const params = new URLSearchParams();
                if (provider) params.append('eqas_provider', provider);
                if (sampleNo) params.append('sample_no', sampleNo);

                fetch(`/newforms/ge/eqas-sample-processing/load?${params.toString()}`)
                    .then(res => res.json())
                    .then(result => {
                        if (result.success && result.data) {
                            const d = result.data;
                            document.getElementById('fom009_record_id').value = d.id || '';
                            document.getElementById('fom009_eqas_provider').value = d.eqas_provider || '';
                            document.getElementById('fom009_eqas_lab_id').value = d.eqas_lab_id || '';
                            document.getElementById('fom009_department_name').value = d.department_name || '';
                            document.getElementById('fom009_sample_temperature').value = d.sample_temperature || '';
                            document.getElementById('fom009_sample_no').value = d.sample_no || '';
                            document.getElementById('fom009_accession_no').value = d.accession_no || '';
                            document.getElementById('fom009_reconstituted_by').value = d.reconstituted_by || '';
                            document.getElementById('fom009_reconstitution_date').value = d.reconstitution_date ? d.reconstitution_date.split('T')[0] : '';
                            document.getElementById('fom009_processed_by').value = d.processed_by || '';
                            document.getElementById('fom009_reviewed_by').value = d.reviewed_by || '';
                            document.getElementById('fom009_qa_shared').value = d.qa_shared || '';
                            document.getElementById('fom009_result_dispatched_date').value = d.result_dispatched_date ? d.result_dispatched_date.split('T')[0] : '';
                            document.getElementById('fom009_evaluation_received_date').value = d.evaluation_received_date ? d.evaluation_received_date.split('T')[0] : '';
                        }
                    })
                    .catch(err => console.error('Load error:', err));
            }

            function clearEqasSampleProcessingForm() {
                document.getElementById('fom009_record_id').value = '';
                document.getElementById('fom009_eqas_provider').value = '';
                document.getElementById('fom009_eqas_lab_id').value = '';
                document.getElementById('fom009_department_name').value = '';
                document.getElementById('fom009_sample_temperature').value = '';
                document.getElementById('fom009_sample_no').value = '';
                document.getElementById('fom009_accession_no').value = '';
                document.getElementById('fom009_reconstituted_by').value = '';
                document.getElementById('fom009_reconstitution_date').value = '';
                document.getElementById('fom009_processed_by').value = '';
                document.getElementById('fom009_reviewed_by').value = '';
                document.getElementById('fom009_qa_shared').value = '';
                document.getElementById('fom009_result_dispatched_date').value = '';
                document.getElementById('fom009_evaluation_received_date').value = '';
            }

            // AJAX Submit for FOM-009
            (function() {
                function initEqasSampleProcessingForm() {
                    const formContainer = document.querySelector('[id="TDPL/GE/FOM-009"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastFOM009('success', result.message || 'Saved successfully!');
                                if (result.data && result.data.id) {
                                    document.getElementById('fom009_record_id').value = result.data.id;
                                }
                            } else {
                                showToastFOM009('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastFOM009('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });

                        return false;
                    });
                }

                function showToastFOM009(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position: fixed; top: 20px; right: 20px; z-index: 9999;
                        padding: 15px 25px; border-radius: 5px; color: white;
                        font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.3);
                        background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initEqasSampleProcessingForm);
                } else {
                    initEqasSampleProcessingForm();
                }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-010"
        docNo="TDPL/GE/FOM-010"
        docName="Daily Cleaning Checklist for Lab"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.ge.forms.submit') }}">

        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Month & Year:</strong>
                <input type="month" name="month_year" id="fom010_month_year"
                    style="border:1px solid #000; padding:4px;"
                    onchange="loadDailyCleaningChecklist()">
            </div>
            <div>
                <strong>Department:</strong>
                <input type="text" name="department" id="fom010_department" list="fom010_dept_list"
                    style="border:1px solid #000; padding:4px;"
                    onchange="loadDailyCleaningChecklist()">
                <datalist id="fom010_dept_list"></datalist>
            </div>
            <div>
                <strong>Location:</strong>
                <input type="text" name="location" id="fom010_location" list="fom010_loc_list"
                    style="border:1px solid #000; padding:4px;"
                    onchange="loadDailyCleaningChecklist()">
                <datalist id="fom010_loc_list"></datalist>
            </div>
            <button type="button" onclick="clearDailyCleaningChecklist()"
                style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <table style="width:100%; border-collapse:collapse; margin-top:15px;">
            <tbody>

                <!-- HEADER ROW -->
                <tr>
                    <td colspan="2" style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Date</strong>
                    </td>

                    @for ($d = 1; $d <= 31; $d++)
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                        <strong>{{ $d }}</strong>
                        </td>
                        @endfor
                </tr>



                @foreach ([
                'Floor' => [
                'Free from debris?',
                'Sufficient aisle space?',
                'Disinfection of floor?'
                ],
                'Dustbins' => [
                'Availability of covered dustbin?',
                'Are all bins emptied?'
                ],
                'Counters' => [
                'Work-Surface clean?',
                'All material neat and orderly?',
                'Disinfection of bench top?'
                ],
                'Equipment' => [
                'Cleaning of equipment',
                'Daily Maintenance'
                ]
                ] as $sectionTitle => $questions)
                @foreach ($questions as $index => $question)
                <tr>

                    <!-- FIRST COLUMN MERGED: DISPLAY ONLY ONCE FOR SECTION -->
                    @if ($index === 0)
                    <td rowspan="{{ count($questions) }}"
                        style="border:1px solid #000; padding:6px; text-align:center; font-weight:bold;">
                        {{ $sectionTitle }}
                    </td>
                    @endif

                    <!-- QUESTION TEXT -->
                    <td style="border:1px solid #000; padding:6px; font-weight:bold;">
                        {{ $question }}
                    </td>

                    <!-- 31 INPUT CELLS -->
                    @for ($i = 1; $i <= 31; $i++)
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                        <input type="text"
                            name="{{ strtolower($sectionTitle) }}_{{ $index }}_{{ $i }}"
                            id="fom010_{{ strtolower($sectionTitle) }}_{{ $index }}_{{ $i }}"
                            style="width:40px; border:1px solid #999; padding:2px; text-align:center;">
                        </td>
                        @endfor

                </tr>
                @endforeach
                @endforeach

                <!-- SIGNATURES ROW -->
                <tr>
                    <td colspan="2" style="border:1px solid #000; padding:6px; font-weight:bold;">
                        Lab Staff Signature
                    </td>
                    @for ($i = 1; $i <= 31; $i++)
                        <td style="border:1px solid #000; padding:4px;">
                        <input type="text"
                            name="lab_staff_signature_{{ $i }}"
                            id="fom010_lab_staff_signature_{{ $i }}"
                            style="width:60px; border:1px solid #999; padding:2px;">
                        </td>
                        @endfor
                </tr>

                <tr>
                    <td colspan="2" style="border:1px solid #000; padding:6px; font-weight:bold;">
                        Lab Supervisor Signature
                    </td>
                    @for ($i = 1; $i <= 31; $i++)
                        <td style="border:1px solid #000; padding:4px;">
                        <input type="text"
                            name="lab_supervisor_signature_{{ $i }}"
                            id="fom010_lab_supervisor_signature_{{ $i }}"
                            style="width:60px; border:1px solid #999; padding:2px;">
                        </td>
                        @endfor
                </tr>

            </tbody>
        </table>

        <script>
            function loadDailyCleaningChecklist() {
                const monthYear = document.getElementById('fom010_month_year').value;
                const department = document.getElementById('fom010_department').value;
                const location = document.getElementById('fom010_location').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('month_year', monthYear);
                if (department) params.append('department', department);
                if (location) params.append('location', location);

                fetch(`/newforms/ge/daily-cleaning-checklist/load?${params.toString()}`)
                    .then(res => res.json())
                    .then(result => {
                        // Populate datalists
                        if (result.departments) {
                            const deptList = document.getElementById('fom010_dept_list');
                            deptList.innerHTML = result.departments.map(d => `<option value="${d}">`).join('');
                        }
                        if (result.locations) {
                            const locList = document.getElementById('fom010_loc_list');
                            locList.innerHTML = result.locations.map(l => `<option value="${l}">`).join('');
                        }

                        // Clear all inputs first
                        clearDailyCleaningChecklistInputs();

                        // If data found, populate fields
                        if (result.success && result.data && result.data.daily_data) {
                            const data = result.data.daily_data;
                            for (const [key, value] of Object.entries(data)) {
                                const el = document.getElementById('fom010_' + key);
                                if (el) el.value = value;
                            }
                        }
                    })
                    .catch(err => console.error('Load error:', err));
            }

            function clearDailyCleaningChecklistInputs() {
                // Clear section inputs (floor, dustbins, counters, equipment)
                const sections = ['floor', 'dustbins', 'counters', 'equipment'];
                const questionCounts = { floor: 3, dustbins: 2, counters: 3, equipment: 2 };

                sections.forEach(section => {
                    for (let q = 0; q < questionCounts[section]; q++) {
                        for (let d = 1; d <= 31; d++) {
                            const el = document.getElementById(`fom010_${section}_${q}_${d}`);
                            if (el) el.value = '';
                        }
                    }
                });

                // Clear signature inputs
                for (let d = 1; d <= 31; d++) {
                    const staff = document.getElementById(`fom010_lab_staff_signature_${d}`);
                    const supervisor = document.getElementById(`fom010_lab_supervisor_signature_${d}`);
                    if (staff) staff.value = '';
                    if (supervisor) supervisor.value = '';
                }
            }

            function clearDailyCleaningChecklist() {
                document.getElementById('fom010_month_year').value = '';
                document.getElementById('fom010_department').value = '';
                document.getElementById('fom010_location').value = '';
                clearDailyCleaningChecklistInputs();
            }

            // AJAX Submit for FOM-010
            (function() {
                function initDailyCleaningChecklistForm() {
                    const formContainer = document.querySelector('[id="TDPL/GE/FOM-010"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastFOM010('success', result.message || 'Saved successfully!');
                            } else {
                                showToastFOM010('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastFOM010('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });

                        return false;
                    });
                }

                function showToastFOM010(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position: fixed; top: 20px; right: 20px; z-index: 9999;
                        padding: 15px 25px; border-radius: 5px; color: white;
                        font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.3);
                        background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initDailyCleaningChecklistForm);
                } else {
                    initDailyCleaningChecklistForm();
                }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-011"
        docNo="TDPL/GE/FOM-011"
        docName="Daily Cleanliness Log for Rest Room"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.ge.forms.submit') }}">

        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Month & Year:</strong>
                <input type="month" name="month_year" id="fom011_month_year"
                    style="border:1px solid #000; padding:4px;"
                    onchange="loadDailyCleanlinessLog()">
            </div>
            <div>
                <strong>Floor:</strong>
                <input type="text" name="floor" id="fom011_floor" list="fom011_floor_list"
                    style="border:1px solid #000; padding:4px;"
                    onchange="loadDailyCleanlinessLog()">
                <datalist id="fom011_floor_list"></datalist>
            </div>
            <div>
                <strong>Location:</strong>
                <input type="text" name="location" id="fom011_location" list="fom011_loc_list"
                    style="border:1px solid #000; padding:4px;"
                    onchange="loadDailyCleanlinessLog()">
                <datalist id="fom011_loc_list"></datalist>
            </div>
            <button type="button" onclick="clearDailyCleanlinessLog()"
                style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <table style="width:100%; border-collapse:collapse; margin-top:15px;">
            <tbody>
                <!-- HEADER ROW: Date -->
                <tr>
                    <td colspan="2" style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>Date</strong>
                    </td>
                    @for ($d = 1; $d <= 31; $d++)
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <strong>{{ $d }}</strong>
                        </td>
                    @endfor
                </tr>

                <!-- Floor Cleaned & Odour Free -->
                @foreach(['Morning', 'Afternoon', 'Evening'] as $index => $time)
                <tr>
                    @if ($index === 0)
                    <td rowspan="3" style="border:1px solid #000; padding:6px; text-align:center; font-weight:bold;">
                        Floor Cleaned & Odour Free
                    </td>
                    @endif
                    <td style="border:1px solid #000; padding:6px; font-weight:bold;">
                        {{ $time }}
                    </td>
                    @for ($d = 1; $d <= 31; $d++)
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text"
                                name="floor_cleaned_{{ strtolower($time) }}_{{ $d }}"
                                id="fom011_floor_cleaned_{{ strtolower($time) }}_{{ $d }}"
                                style="width:40px; border:1px solid #999; padding:2px; text-align:center;">
                        </td>
                    @endfor
                </tr>
                @endforeach

                <!-- Hand Wash Facility Cleaned -->
                @foreach(['Morning', 'Afternoon', 'Evening'] as $index => $time)
                <tr>
                    @if ($index === 0)
                    <td rowspan="3" style="border:1px solid #000; padding:6px; text-align:center; font-weight:bold;">
                        Hand Wash Facility Cleaned
                    </td>
                    @endif
                    <td style="border:1px solid #000; padding:6px; font-weight:bold;">
                        {{ $time }}
                    </td>
                    @for ($d = 1; $d <= 31; $d++)
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text"
                                name="hand_wash_{{ strtolower($time) }}_{{ $d }}"
                                id="fom011_hand_wash_{{ strtolower($time) }}_{{ $d }}"
                                style="width:40px; border:1px solid #999; padding:2px; text-align:center;">
                        </td>
                    @endfor
                </tr>
                @endforeach

                <!-- Wash Basin & WC Cleaned -->
                @foreach(['Morning', 'Afternoon', 'Evening'] as $index => $time)
                <tr>
                    @if ($index === 0)
                    <td rowspan="3" style="border:1px solid #000; padding:6px; text-align:center; font-weight:bold;">
                        Wash Basin & WC Cleaned
                    </td>
                    @endif
                    <td style="border:1px solid #000; padding:6px; font-weight:bold;">
                        {{ $time }}
                    </td>
                    @for ($d = 1; $d <= 31; $d++)
                        <td style="border:1px solid #000; padding:4px; text-align:center;">
                            <input type="text"
                                name="wash_basin_{{ strtolower($time) }}_{{ $d }}"
                                id="fom011_wash_basin_{{ strtolower($time) }}_{{ $d }}"
                                style="width:40px; border:1px solid #999; padding:2px; text-align:center;">
                        </td>
                    @endfor
                </tr>
                @endforeach

                <!-- Lab Staff Signature -->
                <tr>
                    <td colspan="2" style="border:1px solid #000; padding:6px; font-weight:bold;">
                        Lab Staff Signature
                    </td>
                    @for ($d = 1; $d <= 31; $d++)
                        <td style="border:1px solid #000; padding:4px;">
                            <input type="text"
                                name="lab_staff_signature_{{ $d }}"
                                id="fom011_lab_staff_signature_{{ $d }}"
                                style="width:60px; border:1px solid #999; padding:2px;">
                        </td>
                    @endfor
                </tr>

                <!-- Lab Supervisor Signature -->
                <tr>
                    <td colspan="2" style="border:1px solid #000; padding:6px; font-weight:bold;">
                        Lab Supervisor Signature
                    </td>
                    @for ($d = 1; $d <= 31; $d++)
                        <td style="border:1px solid #000; padding:4px;">
                            <input type="text"
                                name="lab_supervisor_signature_{{ $d }}"
                                id="fom011_lab_supervisor_signature_{{ $d }}"
                                style="width:60px; border:1px solid #999; padding:2px;">
                        </td>
                    @endfor
                </tr>

            </tbody>
        </table>

        <script>
            function loadDailyCleanlinessLog() {
                const monthYear = document.getElementById('fom011_month_year').value;
                const floor = document.getElementById('fom011_floor').value;
                const location = document.getElementById('fom011_location').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('month_year', monthYear);
                if (floor) params.append('floor', floor);
                if (location) params.append('location', location);

                fetch(`/newforms/ge/daily-cleanliness-log/load?${params.toString()}`)
                    .then(res => res.json())
                    .then(result => {
                        // Populate datalists
                        if (result.floors) {
                            const floorList = document.getElementById('fom011_floor_list');
                            floorList.innerHTML = result.floors.map(f => `<option value="${f}">`).join('');
                        }
                        if (result.locations) {
                            const locList = document.getElementById('fom011_loc_list');
                            locList.innerHTML = result.locations.map(l => `<option value="${l}">`).join('');
                        }

                        // Clear all inputs first
                        clearDailyCleanlinessLogInputs();

                        // If data found, populate fields
                        if (result.success && result.data && result.data.daily_data) {
                            const data = result.data.daily_data;
                            for (const [key, value] of Object.entries(data)) {
                                const el = document.getElementById('fom011_' + key);
                                if (el) el.value = value;
                            }
                        }
                    })
                    .catch(err => console.error('Load error:', err));
            }

            function clearDailyCleanlinessLogInputs() {
                // Clear floor cleaned inputs
                ['morning', 'afternoon', 'evening'].forEach(time => {
                    for (let d = 1; d <= 31; d++) {
                        const el = document.getElementById(`fom011_floor_cleaned_${time}_${d}`);
                        if (el) el.value = '';
                    }
                });

                // Clear hand wash inputs
                ['morning', 'afternoon', 'evening'].forEach(time => {
                    for (let d = 1; d <= 31; d++) {
                        const el = document.getElementById(`fom011_hand_wash_${time}_${d}`);
                        if (el) el.value = '';
                    }
                });

                // Clear wash basin inputs
                ['morning', 'afternoon', 'evening'].forEach(time => {
                    for (let d = 1; d <= 31; d++) {
                        const el = document.getElementById(`fom011_wash_basin_${time}_${d}`);
                        if (el) el.value = '';
                    }
                });

                // Clear signature inputs
                for (let d = 1; d <= 31; d++) {
                    const staff = document.getElementById(`fom011_lab_staff_signature_${d}`);
                    const supervisor = document.getElementById(`fom011_lab_supervisor_signature_${d}`);
                    if (staff) staff.value = '';
                    if (supervisor) supervisor.value = '';
                }
            }

            function clearDailyCleanlinessLog() {
                document.getElementById('fom011_month_year').value = '';
                document.getElementById('fom011_floor').value = '';
                document.getElementById('fom011_location').value = '';
                clearDailyCleanlinessLogInputs();
            }

            // AJAX Submit for FOM-011
            (function() {
                function initDailyCleanlinessLogForm() {
                    const formContainer = document.querySelector('[id="TDPL/GE/FOM-011"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastFOM011('success', result.message || 'Saved successfully!');
                            } else {
                                showToastFOM011('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastFOM011('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });

                        return false;
                    });
                }

                function showToastFOM011(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position: fixed; top: 20px; right: 20px; z-index: 9999;
                        padding: 15px 25px; border-radius: 5px; color: white;
                        font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.3);
                        background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initDailyCleanlinessLogForm);
                } else {
                    initDailyCleanlinessLogForm();
                }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-012"
        docNo="TDPL/GE/FOM-012"
        docName="Daily IQC Data Monitoring Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.ge.forms.submit') }}">

        <!-- Header Section -->
        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Month & Year:</strong>
                <input type="month" name="month_year" id="fom012_month_year"
                    style="border:1px solid #000; padding:4px;"
                    onchange="loadDailyIqcMonitoring()">
            </div>
            <div>
                <strong>Department:</strong>
                <input type="text" name="department" id="fom012_department" list="fom012_dept_list"
                    style="border:1px solid #000; padding:4px; width:180px;"
                    onchange="loadDailyIqcMonitoring()">
                <datalist id="fom012_dept_list">
                    <option value="Biochemistry">
                    <option value="Hematology">
                    <option value="Microbiology">
                    <option value="Pathology">
                    <option value="Immunology">
                    <option value="Serology">
                    <option value="Clinical Chemistry">
                    <option value="Molecular Biology">
                </datalist>
            </div>
            <div>
                <strong>Level:</strong>
                <input type="text" name="level" id="fom012_level" list="fom012_level_list"
                    style="border:1px solid #000; padding:4px; width:150px;">
                <datalist id="fom012_level_list">
                    <option value="Level 1">
                    <option value="Level 2">
                    <option value="Level 3">
                    <option value="Low">
                    <option value="Normal">
                    <option value="High">
                </datalist>
            </div>
            <div>
                <strong>Instrument S. No.:</strong>
                <input type="text" name="instrument_no" id="fom012_instrument_no" list="fom012_inst_list"
                    style="border:1px solid #000; padding:4px; width:180px;"
                    onchange="loadDailyIqcMonitoring()">
                <datalist id="fom012_inst_list">
                    <option value="INS-001">
                    <option value="INS-002">
                    <option value="INS-003">
                    <option value="INS-004">
                    <option value="INS-005">
                </datalist>
            </div>
            <button type="button" onclick="clearDailyIqcMonitoring()"
                style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <div style="margin-bottom:20px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Control Lot No.:</strong>
                <input type="text" name="control_lot_no" id="fom012_control_lot_no" list="fom012_lot_list"
                    style="border:1px solid #000; padding:4px; width:180px;">
                <datalist id="fom012_lot_list">
                    <option value="LOT-001">
                    <option value="LOT-002">
                    <option value="LOT-003">
                    <option value="LOT-004">
                    <option value="LOT-005">
                </datalist>
            </div>
            <div>
                <strong>Control Expiry Date:</strong>
                <input type="date" name="control_expiry" id="fom012_control_expiry"
                    style="border:1px solid #000; padding:4px;">
            </div>
        </div>

        <!-- TABLE START -->
        <table style="width:100%; border-collapse:collapse; margin-top:20px;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:4px; width:60px;">Parameter</th>
                    @for($i=1;$i<=16;$i++)
                        <th style="border:1px solid #000; padding:4px; width:40px;"></th>
                    @endfor
                    <th style="border:1px solid #000; padding:4px; width:90px;">Done By</th>
                    <th style="border:1px solid #000; padding:4px; width:110px;">Reviewed By</th>
                </tr>

                <!-- LOW / MEAN / HIGH ROWS -->
                @foreach(['LOW','MEAN','HIGH'] as $labelIndex => $label)
                <tr>
                    <th style="border:1px solid #000; padding:4px; text-align:left;">{{ $label }}</th>
                    @for($i=1;$i<=16;$i++)
                        <td style="border:1px solid #000; padding:4px;">
                            <input type="text" name="range_{{ strtolower($label) }}_{{ $i }}"
                                id="fom012_range_{{ strtolower($label) }}_{{ $i }}"
                                style="width:100%; border:1px solid #000; padding:2px;">
                        </td>
                    @endfor
                    <td style="border:1px solid #000; padding:4px;">
                        <input type="text" name="range_{{ strtolower($label) }}_done"
                            id="fom012_range_{{ strtolower($label) }}_done"
                            style="width:100%; border:1px solid #000; padding:2px;">
                    </td>
                    <td style="border:1px solid #000; padding:4px;">
                        <input type="text" name="range_{{ strtolower($label) }}_reviewed"
                            id="fom012_range_{{ strtolower($label) }}_reviewed"
                            style="width:100%; border:1px solid #000; padding:2px;">
                    </td>
                </tr>
                @endforeach
            </thead>

            <tbody>
                <!-- PARAMETER ROWS 1 TO 31 -->
                @for($row=1;$row<=31;$row++)
                <tr>
                    <td style="border:1px solid #000; padding:4px; font-weight:bold; text-align:center;">
                        {{ $row }}
                    </td>
                    @for($col=1;$col<=16;$col++)
                        <td style="border:1px solid #000; padding:4px;">
                            <input type="text"
                                name="param_{{ $row }}_{{ $col }}"
                                id="fom012_param_{{ $row }}_{{ $col }}"
                                style="width:100%; border:1px solid #000; padding:2px;">
                        </td>
                    @endfor
                    <td style="border:1px solid #000; padding:4px;">
                        <input type="text"
                            name="done_by_{{ $row }}"
                            id="fom012_done_by_{{ $row }}"
                            style="width:100%; border:1px solid #000; padding:2px;">
                    </td>
                    <td style="border:1px solid #000; padding:4px;">
                        <input type="text"
                            name="reviewed_by_{{ $row }}"
                            id="fom012_reviewed_by_{{ $row }}"
                            style="width:100%; border:1px solid #000; padding:2px;">
                    </td>
                </tr>
                @endfor
            </tbody>
        </table>
        <!-- TABLE END -->

        <div style="margin-top:25px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Control Lot No. (2):</strong>
                <input type="text" name="control_lot_no_2" id="fom012_control_lot_no_2"
                    style="border:1px solid #000; padding:4px; width:180px;">
            </div>
            <div>
                <strong>Control Expiry Date (2):</strong>
                <input type="date" name="control_expiry_2" id="fom012_control_expiry_2"
                    style="border:1px solid #000; padding:4px;">
            </div>
        </div>

        <script>
            function loadDailyIqcMonitoring() {
                const monthYear = document.getElementById('fom012_month_year').value;
                const department = document.getElementById('fom012_department').value;
                const instrumentNo = document.getElementById('fom012_instrument_no').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('month_year', monthYear);
                if (department) params.append('department', department);
                if (instrumentNo) params.append('instrument_no', instrumentNo);

                fetch(`/newforms/ge/daily-iqc-monitoring/load?${params.toString()}`)
                    .then(res => res.json())
                    .then(result => {
                        // Populate datalists
                        if (result.departments) {
                            const deptList = document.getElementById('fom012_dept_list');
                            deptList.innerHTML = result.departments.map(d => `<option value="${d}">`).join('');
                        }
                        if (result.levels) {
                            const levelList = document.getElementById('fom012_level_list');
                            levelList.innerHTML = result.levels.map(l => `<option value="${l}">`).join('');
                        }
                        if (result.instrument_nos) {
                            const instList = document.getElementById('fom012_inst_list');
                            instList.innerHTML = result.instrument_nos.map(i => `<option value="${i}">`).join('');
                        }
                        if (result.control_lot_nos) {
                            const lotList = document.getElementById('fom012_lot_list');
                            lotList.innerHTML = result.control_lot_nos.map(l => `<option value="${l}">`).join('');
                        }

                        // Clear all inputs first
                        clearDailyIqcMonitoringInputs();

                        // If data found, populate fields
                        if (result.success && result.data) {
                            const data = result.data;

                            // Populate header fields
                            if (data.level) document.getElementById('fom012_level').value = data.level;
                            if (data.control_lot_no) document.getElementById('fom012_control_lot_no').value = data.control_lot_no;
                            if (data.control_expiry) document.getElementById('fom012_control_expiry').value = data.control_expiry;
                            if (data.control_lot_no_2) document.getElementById('fom012_control_lot_no_2').value = data.control_lot_no_2;
                            if (data.control_expiry_2) document.getElementById('fom012_control_expiry_2').value = data.control_expiry_2;

                            // Populate daily data
                            if (data.daily_data) {
                                for (const [key, value] of Object.entries(data.daily_data)) {
                                    const el = document.getElementById('fom012_' + key);
                                    if (el) el.value = value;
                                }
                            }
                        }
                    })
                    .catch(err => console.error('Load error:', err));
            }

            function clearDailyIqcMonitoringInputs() {
                // Clear range rows (LOW, MEAN, HIGH)
                ['low', 'mean', 'high'].forEach(label => {
                    for (let i = 1; i <= 16; i++) {
                        const el = document.getElementById(`fom012_range_${label}_${i}`);
                        if (el) el.value = '';
                    }
                    const doneEl = document.getElementById(`fom012_range_${label}_done`);
                    const reviewedEl = document.getElementById(`fom012_range_${label}_reviewed`);
                    if (doneEl) doneEl.value = '';
                    if (reviewedEl) reviewedEl.value = '';
                });

                // Clear parameter rows (1-31)
                for (let row = 1; row <= 31; row++) {
                    for (let col = 1; col <= 16; col++) {
                        const el = document.getElementById(`fom012_param_${row}_${col}`);
                        if (el) el.value = '';
                    }
                    const doneEl = document.getElementById(`fom012_done_by_${row}`);
                    const reviewedEl = document.getElementById(`fom012_reviewed_by_${row}`);
                    if (doneEl) doneEl.value = '';
                    if (reviewedEl) reviewedEl.value = '';
                }

                // Clear additional header fields
                document.getElementById('fom012_level').value = '';
                document.getElementById('fom012_control_lot_no').value = '';
                document.getElementById('fom012_control_expiry').value = '';
                document.getElementById('fom012_control_lot_no_2').value = '';
                document.getElementById('fom012_control_expiry_2').value = '';
            }

            function clearDailyIqcMonitoring() {
                document.getElementById('fom012_month_year').value = '';
                document.getElementById('fom012_department').value = '';
                document.getElementById('fom012_instrument_no').value = '';
                clearDailyIqcMonitoringInputs();
            }

            // AJAX Submit for FOM-012
            (function() {
                function initDailyIqcMonitoringForm() {
                    const formContainer = document.querySelector('[id="TDPL/GE/FOM-012"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastFOM012('success', result.message || 'Saved successfully!');
                            } else {
                                showToastFOM012('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastFOM012('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });

                        return false;
                    });
                }

                function showToastFOM012(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position: fixed; top: 20px; right: 20px; z-index: 9999;
                        padding: 15px 25px; border-radius: 5px; color: white;
                        font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.3);
                        background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initDailyIqcMonitoringForm);
                } else {
                    initDailyIqcMonitoringForm();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/GE/FOM-014"
        docNo="TDPL/GE/FOM-014"
        docName="Distilled Water Plant Checklist"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.ge.forms.submit') }}">

        <!-- Header Section -->
        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Month/Year:</strong>
                <input type="month" name="month_year" id="fom014_month_year"
                    style="border:1px solid #000; padding:5px;"
                    onchange="loadDistilledWaterPlant()">
            </div>
            <div>
                <strong>Location:</strong>
                <input type="text" name="location" id="fom014_location" list="fom014_loc_list"
                    style="border:1px solid #000; padding:5px; width:150px;"
                    onchange="loadDistilledWaterPlant()">
                <datalist id="fom014_loc_list">
                    <option value="Main Lab">
                    <option value="Branch Lab">
                    <option value="Collection Center">
                    <option value="Hospital Lab">
                    <option value="Clinic Lab">
                </datalist>
            </div>
            <div>
                <strong>Department:</strong>
                <input type="text" name="department" id="fom014_department" list="fom014_dept_list"
                    style="border:1px solid #000; padding:5px; width:150px;"
                    onchange="loadDistilledWaterPlant()">
                <datalist id="fom014_dept_list">
                    <option value="Biochemistry">
                    <option value="Hematology">
                    <option value="Microbiology">
                    <option value="Pathology">
                    <option value="Immunology">
                    <option value="Serology">
                </datalist>
            </div>
            <button type="button" onclick="clearDistilledWaterPlant()"
                style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <table style="width:100%; border-collapse:collapse;" border="1">
            <tbody>
                <tr>
                    <td rowspan="2" style="text-align:center; font-weight:bold;">Date</td>
                    <td rowspan="2" style="text-align:center; font-weight:bold;">Motor Working</td>
                    <td style="text-align:center; font-weight:bold;">Water Check Daily</td>
                    <td rowspan="2" style="text-align:center; font-weight:bold;">
                        Check Filters <br>(Ensure that it is clean)
                    </td>
                    <td rowspan="2" style="text-align:center; font-weight:bold;">Water Leakage</td>
                    <td rowspan="2" style="text-align:center; font-weight:bold;">Done By</td>
                </tr>

                <tr>
                    <td style="text-align:center; font-weight:bold;">TDS (0 to 0.2)</td>
                </tr>

                @for ($i = 1; $i <= 31; $i++)
                <tr>
                    <td style="text-align:center; font-weight:bold;">{{ sprintf('%02d', $i) }}</td>

                    <td style="text-align:center;">
                        <input type="text" name="motor_working_{{ $i }}" id="fom014_motor_working_{{ $i }}"
                            style="width:100%; border:none; padding:5px;">
                    </td>

                    <td style="text-align:center;">
                        <input type="text" name="tds_{{ $i }}" id="fom014_tds_{{ $i }}"
                            style="width:100%; border:none; padding:5px;">
                    </td>

                    <td style="text-align:center;">
                        <input type="text" name="filter_check_{{ $i }}" id="fom014_filter_check_{{ $i }}"
                            style="width:100%; border:none; padding:5px;">
                    </td>

                    <td style="text-align:center;">
                        <input type="text" name="water_leakage_{{ $i }}" id="fom014_water_leakage_{{ $i }}"
                            style="width:100%; border:none; padding:5px;">
                    </td>

                    <td style="text-align:center;">
                        <input type="text" name="done_by_{{ $i }}" id="fom014_done_by_{{ $i }}"
                            style="width:100%; border:none; padding:5px;">
                    </td>
                </tr>
                @endfor
            </tbody>
        </table>

        <p style="margin-top:20px;">
            <strong>Lab In-charge:</strong>
            <input type="text" name="lab_incharge" id="fom014_lab_incharge"
                style="border:1px solid #000; padding:5px; width:200px; margin-left:10px;">
        </p>

        <script>
            function loadDistilledWaterPlant() {
                const monthYear = document.getElementById('fom014_month_year').value;
                const location = document.getElementById('fom014_location').value;
                const department = document.getElementById('fom014_department').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('month_year', monthYear);
                if (location) params.append('location', location);
                if (department) params.append('department', department);

                fetch(`/newforms/ge/distilled-water-plant/load?${params.toString()}`)
                    .then(res => res.json())
                    .then(result => {
                        // Populate datalists with dynamic values
                        if (result.locations) {
                            const locList = document.getElementById('fom014_loc_list');
                            const defaultLocs = ['Main Lab', 'Branch Lab', 'Collection Center', 'Hospital Lab', 'Clinic Lab'];
                            const allLocs = [...new Set([...defaultLocs, ...result.locations])];
                            locList.innerHTML = allLocs.map(l => `<option value="${l}">`).join('');
                        }
                        if (result.departments) {
                            const deptList = document.getElementById('fom014_dept_list');
                            const defaultDepts = ['Biochemistry', 'Hematology', 'Microbiology', 'Pathology', 'Immunology', 'Serology'];
                            const allDepts = [...new Set([...defaultDepts, ...result.departments])];
                            deptList.innerHTML = allDepts.map(d => `<option value="${d}">`).join('');
                        }

                        // Clear all inputs first
                        clearDistilledWaterPlantInputs();

                        // If data found, populate fields
                        if (result.success && result.data) {
                            const data = result.data;

                            // Populate lab incharge
                            if (data.lab_incharge) {
                                document.getElementById('fom014_lab_incharge').value = data.lab_incharge;
                            }

                            // Populate daily data
                            if (data.daily_data) {
                                for (const [key, value] of Object.entries(data.daily_data)) {
                                    const el = document.getElementById('fom014_' + key);
                                    if (el) el.value = value;
                                }
                            }
                        }
                    })
                    .catch(err => console.error('Load error:', err));
            }

            function clearDistilledWaterPlantInputs() {
                for (let i = 1; i <= 31; i++) {
                    const motorWorking = document.getElementById(`fom014_motor_working_${i}`);
                    const tds = document.getElementById(`fom014_tds_${i}`);
                    const filterCheck = document.getElementById(`fom014_filter_check_${i}`);
                    const waterLeakage = document.getElementById(`fom014_water_leakage_${i}`);
                    const doneBy = document.getElementById(`fom014_done_by_${i}`);
                    if (motorWorking) motorWorking.value = '';
                    if (tds) tds.value = '';
                    if (filterCheck) filterCheck.value = '';
                    if (waterLeakage) waterLeakage.value = '';
                    if (doneBy) doneBy.value = '';
                }
                document.getElementById('fom014_lab_incharge').value = '';
            }

            function clearDistilledWaterPlant() {
                document.getElementById('fom014_month_year').value = '';
                document.getElementById('fom014_location').value = '';
                document.getElementById('fom014_department').value = '';
                clearDistilledWaterPlantInputs();
            }

            // AJAX Submit for FOM-014
            (function() {
                function initDistilledWaterPlantForm() {
                    const formContainer = document.querySelector('[id="TDPL/GE/FOM-014"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastFOM014('success', result.message || 'Saved successfully!');
                            } else {
                                showToastFOM014('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastFOM014('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });

                        return false;
                    });
                }

                function showToastFOM014(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position: fixed; top: 20px; right: 20px; z-index: 9999;
                        padding: 15px 25px; border-radius: 5px; color: white;
                        font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.3);
                        background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initDistilledWaterPlantForm);
                } else {
                    initDistilledWaterPlantForm();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/GE/FOM-015"
        docNo="TDPL/GE/FOM-015"
        docName="Equipment Startup and Shutdown Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.ge.forms.submit') }}">

        <!-- Header Section -->
        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Month & Year:</strong>
                <input type="month" name="month_year" id="fom015_month_year"
                    style="border:1px solid #000; padding:5px;"
                    onchange="loadEquipmentStartupShutdown()">
            </div>
            <div>
                <strong>Instrument Name:</strong>
                <input type="text" name="instrument_name" id="fom015_instrument_name" list="fom015_inst_name_list"
                    style="border:1px solid #000; padding:5px; width:180px;">
                <datalist id="fom015_inst_name_list">
                    <option value="Analyzer">
                    <option value="Centrifuge">
                    <option value="Microscope">
                    <option value="Spectrophotometer">
                    <option value="Incubator">
                    <option value="Autoclave">
                </datalist>
            </div>
            <div>
                <strong>Department:</strong>
                <input type="text" name="department" id="fom015_department" list="fom015_dept_list"
                    style="border:1px solid #000; padding:5px; width:150px;"
                    onchange="loadEquipmentStartupShutdown()">
                <datalist id="fom015_dept_list">
                    <option value="Biochemistry">
                    <option value="Hematology">
                    <option value="Microbiology">
                    <option value="Pathology">
                    <option value="Immunology">
                    <option value="Serology">
                </datalist>
            </div>
            <div>
                <strong>Instrument S. No.:</strong>
                <input type="text" name="instrument_serial" id="fom015_instrument_serial" list="fom015_serial_list"
                    style="border:1px solid #000; padding:5px; width:150px;"
                    onchange="loadEquipmentStartupShutdown()">
                <datalist id="fom015_serial_list">
                    <option value="INS-001">
                    <option value="INS-002">
                    <option value="INS-003">
                    <option value="INS-004">
                    <option value="INS-005">
                </datalist>
            </div>
            <button type="button" onclick="clearEquipmentStartupShutdown()"
                style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <table border="1" style="width:100%; border-collapse:collapse; margin-top:10px;">
            <tbody>
                <tr>
                    <td style="font-weight:bold; text-align:center;">S. No.</td>
                    <td style="font-weight:bold; text-align:center;">Date</td>
                    <td style="font-weight:bold; text-align:center;">Start Time</td>
                    <td style="font-weight:bold; text-align:center;">Shutdown Time</td>
                </tr>

                @for($i = 1; $i <= 31; $i++)
                <tr>
                    <td style="text-align:center; font-weight:bold;">
                        {{ $i }}
                    </td>

                    <td style="text-align:center;">
                        <input type="date"
                            name="date_{{ $i }}" id="fom015_date_{{ $i }}"
                            style="width:100%; border:none; padding:5px;">
                    </td>

                    <td style="text-align:center;">
                        <input type="time"
                            name="start_time_{{ $i }}" id="fom015_start_time_{{ $i }}"
                            style="width:100%; border:none; padding:5px;">
                    </td>

                    <td style="text-align:center;">
                        <input type="time"
                            name="shutdown_time_{{ $i }}" id="fom015_shutdown_time_{{ $i }}"
                            style="width:100%; border:none; padding:5px;">
                    </td>
                </tr>
                @endfor
            </tbody>
        </table>

        <script>
            function loadEquipmentStartupShutdown() {
                const monthYear = document.getElementById('fom015_month_year').value;
                const department = document.getElementById('fom015_department').value;
                const instrumentSerial = document.getElementById('fom015_instrument_serial').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('month_year', monthYear);
                if (department) params.append('department', department);
                if (instrumentSerial) params.append('instrument_serial', instrumentSerial);

                fetch(`/newforms/ge/equipment-startup-shutdown/load?${params.toString()}`)
                    .then(res => res.json())
                    .then(result => {
                        // Populate datalists with dynamic values
                        if (result.instrument_names) {
                            const instNameList = document.getElementById('fom015_inst_name_list');
                            const defaultNames = ['Analyzer', 'Centrifuge', 'Microscope', 'Spectrophotometer', 'Incubator', 'Autoclave'];
                            const allNames = [...new Set([...defaultNames, ...result.instrument_names])];
                            instNameList.innerHTML = allNames.map(n => `<option value="${n}">`).join('');
                        }
                        if (result.departments) {
                            const deptList = document.getElementById('fom015_dept_list');
                            const defaultDepts = ['Biochemistry', 'Hematology', 'Microbiology', 'Pathology', 'Immunology', 'Serology'];
                            const allDepts = [...new Set([...defaultDepts, ...result.departments])];
                            deptList.innerHTML = allDepts.map(d => `<option value="${d}">`).join('');
                        }
                        if (result.instrument_serials) {
                            const serialList = document.getElementById('fom015_serial_list');
                            const defaultSerials = ['INS-001', 'INS-002', 'INS-003', 'INS-004', 'INS-005'];
                            const allSerials = [...new Set([...defaultSerials, ...result.instrument_serials])];
                            serialList.innerHTML = allSerials.map(s => `<option value="${s}">`).join('');
                        }

                        // Clear all inputs first
                        clearEquipmentStartupShutdownInputs();

                        // If data found, populate fields
                        if (result.success && result.data) {
                            const data = result.data;

                            // Populate instrument name
                            if (data.instrument_name) {
                                document.getElementById('fom015_instrument_name').value = data.instrument_name;
                            }

                            // Populate daily data
                            if (data.daily_data) {
                                for (const [key, value] of Object.entries(data.daily_data)) {
                                    const el = document.getElementById('fom015_' + key);
                                    if (el) el.value = value;
                                }
                            }
                        }
                    })
                    .catch(err => console.error('Load error:', err));
            }

            function clearEquipmentStartupShutdownInputs() {
                document.getElementById('fom015_instrument_name').value = '';
                for (let i = 1; i <= 31; i++) {
                    const dateEl = document.getElementById(`fom015_date_${i}`);
                    const startTime = document.getElementById(`fom015_start_time_${i}`);
                    const shutdownTime = document.getElementById(`fom015_shutdown_time_${i}`);
                    if (dateEl) dateEl.value = '';
                    if (startTime) startTime.value = '';
                    if (shutdownTime) shutdownTime.value = '';
                }
            }

            function clearEquipmentStartupShutdown() {
                document.getElementById('fom015_month_year').value = '';
                document.getElementById('fom015_department').value = '';
                document.getElementById('fom015_instrument_serial').value = '';
                clearEquipmentStartupShutdownInputs();
            }

            // AJAX Submit for FOM-015
            (function() {
                function initEquipmentStartupShutdownForm() {
                    const formContainer = document.querySelector('[id="TDPL/GE/FOM-015"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastFOM015('success', result.message || 'Saved successfully!');
                            } else {
                                showToastFOM015('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastFOM015('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });

                        return false;
                    });
                }

                function showToastFOM015(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position: fixed; top: 20px; right: 20px; z-index: 9999;
                        padding: 15px 25px; border-radius: 5px; color: white;
                        font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.3);
                        background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initEquipmentStartupShutdownForm);
                } else {
                    initEquipmentStartupShutdownForm();
                }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-016"
        docNo="TDPL/GE/FOM-016"
        docName="Eye Wash Monitoring Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.ge.forms.submit') }}">

        <!-- Header Section -->
        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Month/Year:</strong>
                <input type="month" name="month_year" id="fom016_month_year"
                    style="border:1px solid #000; padding:5px;"
                    onchange="loadEyeWashMonitoring()">
            </div>
            <div>
                <strong>Department:</strong>
                <input type="text" name="department" id="fom016_department" list="fom016_dept_list"
                    style="border:1px solid #000; padding:5px; width:250px;"
                    onchange="loadEyeWashMonitoring()">
                <datalist id="fom016_dept_list">
                    <option value="Biochemistry">
                    <option value="Hematology">
                    <option value="Microbiology">
                    <option value="Pathology">
                    <option value="Immunology">
                    <option value="Serology">
                    <option value="Clinical Chemistry">
                    <option value="Molecular Biology">
                </datalist>
            </div>
            <button type="button" onclick="clearEyeWashMonitoring()"
                style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <table border="1" style="width:100%; border-collapse:collapse; margin-top:10px;">
            <tbody>
                <tr>
                    <td style="font-weight:bold; text-align:center;">Date</td>
                    <td style="font-weight:bold; text-align:center;">Water Changed</td>
                    <td style="font-weight:bold; text-align:center;">Changed By</td>
                    <td style="font-weight:bold; text-align:center;">Signature</td>
                    <td style="font-weight:bold; text-align:center;">Remarks</td>
                </tr>

                @for($i = 1; $i <= 31; $i++)
                <tr>
                    <td style="text-align:center; font-weight:bold;">
                        {{ $i }}
                    </td>

                    <td style="text-align:center;">
                        <input type="text"
                            name="water_changed_{{ $i }}" id="fom016_water_changed_{{ $i }}"
                            placeholder="Yes / No"
                            style="width:100%; border:none; padding:5px;">
                    </td>

                    <td style="text-align:center;">
                        <input type="text"
                            name="changed_by_{{ $i }}" id="fom016_changed_by_{{ $i }}"
                            style="width:100%; border:none; padding:5px;">
                    </td>

                    <td style="text-align:center;">
                        <input type="text"
                            name="signature_{{ $i }}" id="fom016_signature_{{ $i }}"
                            style="width:100%; border:none; padding:5px;">
                    </td>

                    <td style="text-align:center;">
                        <input type="text"
                            name="remarks_{{ $i }}" id="fom016_remarks_{{ $i }}"
                            style="width:100%; border:none; padding:5px;">
                    </td>
                </tr>
                @endfor

            </tbody>
        </table>

        <script>
            function loadEyeWashMonitoring() {
                const monthYear = document.getElementById('fom016_month_year').value;
                const department = document.getElementById('fom016_department').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('month_year', monthYear);
                if (department) params.append('department', department);

                fetch(`/newforms/ge/eye-wash-monitoring/load?${params.toString()}`)
                    .then(res => res.json())
                    .then(result => {
                        // Populate datalists with dynamic values
                        if (result.departments) {
                            const deptList = document.getElementById('fom016_dept_list');
                            const defaultDepts = ['Biochemistry', 'Hematology', 'Microbiology', 'Pathology', 'Immunology', 'Serology', 'Clinical Chemistry', 'Molecular Biology'];
                            const allDepts = [...new Set([...defaultDepts, ...result.departments])];
                            deptList.innerHTML = allDepts.map(d => `<option value="${d}">`).join('');
                        }

                        // Clear all inputs first
                        clearEyeWashMonitoringInputs();

                        // If data found, populate fields
                        if (result.success && result.data && result.data.daily_data) {
                            const data = result.data.daily_data;
                            for (const [key, value] of Object.entries(data)) {
                                const el = document.getElementById('fom016_' + key);
                                if (el) el.value = value;
                            }
                        }
                    })
                    .catch(err => console.error('Load error:', err));
            }

            function clearEyeWashMonitoringInputs() {
                for (let i = 1; i <= 31; i++) {
                    const waterChanged = document.getElementById(`fom016_water_changed_${i}`);
                    const changedBy = document.getElementById(`fom016_changed_by_${i}`);
                    const signature = document.getElementById(`fom016_signature_${i}`);
                    const remarks = document.getElementById(`fom016_remarks_${i}`);
                    if (waterChanged) waterChanged.value = '';
                    if (changedBy) changedBy.value = '';
                    if (signature) signature.value = '';
                    if (remarks) remarks.value = '';
                }
            }

            function clearEyeWashMonitoring() {
                document.getElementById('fom016_month_year').value = '';
                document.getElementById('fom016_department').value = '';
                clearEyeWashMonitoringInputs();
            }

            // AJAX Submit for FOM-016
            (function() {
                function initEyeWashMonitoringForm() {
                    const formContainer = document.querySelector('[id="TDPL/GE/FOM-016"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastFOM016('success', result.message || 'Saved successfully!');
                            } else {
                                showToastFOM016('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastFOM016('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });

                        return false;
                    });
                }

                function showToastFOM016(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position: fixed; top: 20px; right: 20px; z-index: 9999;
                        padding: 15px 25px; border-radius: 5px; color: white;
                        font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.3);
                        background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initEyeWashMonitoringForm);
                } else {
                    initEyeWashMonitoringForm();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/GE/FOM-017"
        docNo="TDPL/GE/FOM-017"
        docName="Inter-Laboratory Comparison Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.ge.forms.submit') }}">

        {{-- FILTERS --}}
        <div style="display:flex; gap:16px; margin-bottom:12px; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="GE_FOM_017__from_date" onchange="loadInterLabComparisonData()"
                    style="border:1px solid #000; padding:4px;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="GE_FOM_017__to_date" onchange="loadInterLabComparisonData()"
                    style="border:1px solid #000; padding:4px;">
            </div>
            <div>
                <label><strong>Name of Lab A</strong></label>
                <input type="text" name="lab_a" id="GE_FOM_017__lab_a" list="GE_FOM_017__lab_a_list"
                    onchange="loadInterLabComparisonData()" onblur="loadInterLabComparisonData()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="GE_FOM_017__lab_a_list">
                    <option value="TRUSTlab Main">
                    <option value="TRUSTlab Branch 1">
                    <option value="TRUSTlab Branch 2">
                    <option value="TRUSTlab Central">
                </datalist>
            </div>
            <div>
                <label><strong>Name of Lab B</strong></label>
                <input type="text" name="lab_b" id="GE_FOM_017__lab_b" list="GE_FOM_017__lab_b_list"
                    onchange="loadInterLabComparisonData()" onblur="loadInterLabComparisonData()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="GE_FOM_017__lab_b_list">
                    <option value="Reference Lab 1">
                    <option value="Reference Lab 2">
                    <option value="External Lab A">
                    <option value="External Lab B">
                </datalist>
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearInterLabComparisonFilters()"
                    style="background:#dc3545; color:white; border:none; padding:5px 15px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        {{-- TABLE --}}
        <table border="1" cellspacing="0" cellpadding="4" style="width:100%; border-collapse:collapse;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:4px;">S.No</th>
                    <th style="border:1px solid #000; padding:4px;">Date</th>
                    <th style="border:1px solid #000; padding:4px;">Registration No.</th>
                    <th style="border:1px solid #000; padding:4px;">Test Parameter</th>
                    <th style="border:1px solid #000; padding:4px;">TRUSTlab Results (A)</th>
                    <th style="border:1px solid #000; padding:4px;">Referring Lab Results (B)</th>
                    <th style="border:1px solid #000; padding:4px;">%Difference*</th>
                    <th style="border:1px solid #000; padding:4px;">Acceptable / Not Acceptable</th>
                    <th style="border:1px solid #000; padding:4px;">Done By</th>
                    <th style="border:1px solid #000; padding:4px;">Reviewed By</th>
                </tr>
            </thead>
            <tbody id="GE_FOM_017__tbody">
                {{-- Single empty row for new entry --}}
                <tr>
                    <td style="border:1px solid #000; padding:4px;"><input name="sno[]" style="width:50px; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="comparison_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="reg_no[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="test_parameter[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="number" step="0.01" name="result_a[]" onchange="calculateInterLabDifference(this)" onkeyup="calculateInterLabDifference(this)" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="number" step="0.01" name="result_b[]" onchange="calculateInterLabDifference(this)" onkeyup="calculateInterLabDifference(this)" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="number" step="0.01" name="difference_percent[]" style="width:100%; border:1px solid #ccc; padding:4px; background:#f0f0f0;" readonly></td>
                    <td style="border:1px solid #000; padding:4px;">
                        <select name="status[]" style="width:100%; border:1px solid #ccc; padding:4px;">
                            <option value="">--</option>
                            <option value="Acceptable">Acceptable</option>
                            <option value="Not Acceptable">Not Acceptable</option>
                        </select>
                    </td>
                    <td style="border:1px solid #000; padding:4px;"><input name="done_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="reviewed_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                </tr>
            </tbody>
        </table>

        <p style="margin-top:10px;"><strong>* % Difference = ((A - B) / A) × 100</strong></p>

        <script>
            // Calculate percentage difference
            function calculateInterLabDifference(input) {
                const row = input.closest('tr');
                const resultAInput = row.querySelector('input[name="result_a[]"]');
                const resultBInput = row.querySelector('input[name="result_b[]"]');
                const differenceField = row.querySelector('input[name="difference_percent[]"]');

                if (resultAInput && resultBInput && differenceField) {
                    const resultA = parseFloat(resultAInput.value) || 0;
                    const resultB = parseFloat(resultBInput.value) || 0;

                    if (resultA !== 0) {
                        const diff = ((resultA - resultB) / resultA) * 100;
                        differenceField.value = diff.toFixed(2);
                    } else {
                        differenceField.value = '';
                    }
                }
            }

            // Load Inter-Laboratory Comparison records based on date range filters
            function loadInterLabComparisonData() {
                const fromDate = document.getElementById('GE_FOM_017__from_date').value;
                const toDate = document.getElementById('GE_FOM_017__to_date').value;

                // At least one date filter required
                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                const labA = document.getElementById('GE_FOM_017__lab_a').value;
                if (labA) params.append('lab_a', labA);

                const labB = document.getElementById('GE_FOM_017__lab_b').value;
                if (labB) params.append('lab_b', labB);

                fetch(`/newforms/ge/inter-lab-comparison/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    clearInterLabComparisonForm();

                    // Update datalists
                    if (res.lab_as) {
                        updateInterLabDatalist('GE_FOM_017__lab_a_list', res.lab_as);
                    }
                    if (res.lab_bs) {
                        updateInterLabDatalist('GE_FOM_017__lab_b_list', res.lab_bs);
                    }

                    const tbody = document.getElementById('GE_FOM_017__tbody');
                    if (!tbody || !res.data || res.data.length === 0) return;

                    res.data.forEach((row, index) => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td style="border:1px solid #000; padding:4px;">
                                <input type="hidden" name="row_id[]" value="${row.id}">
                                <input name="sno[]" value="${index + 1}" style="width:50px; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #000; padding:4px;">
                                <input type="date" name="comparison_date[]" value="${row.comparison_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #000; padding:4px;">
                                <input name="reg_no[]" value="${row.reg_no || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #000; padding:4px;">
                                <input name="test_parameter[]" value="${row.test_parameter || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #000; padding:4px;">
                                <input type="number" step="0.01" name="result_a[]" value="${row.result_a || ''}" onchange="calculateInterLabDifference(this)" onkeyup="calculateInterLabDifference(this)" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #000; padding:4px;">
                                <input type="number" step="0.01" name="result_b[]" value="${row.result_b || ''}" onchange="calculateInterLabDifference(this)" onkeyup="calculateInterLabDifference(this)" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #000; padding:4px;">
                                <input type="number" step="0.01" name="difference_percent[]" value="${row.difference_percent || ''}" style="width:100%; border:1px solid #ccc; padding:4px; background:#f0f0f0;" readonly>
                            </td>
                            <td style="border:1px solid #000; padding:4px;">
                                <select name="status[]" style="width:100%; border:1px solid #ccc; padding:4px;">
                                    <option value="">--</option>
                                    <option value="Acceptable" ${row.status === 'Acceptable' ? 'selected' : ''}>Acceptable</option>
                                    <option value="Not Acceptable" ${row.status === 'Not Acceptable' ? 'selected' : ''}>Not Acceptable</option>
                                </select>
                            </td>
                            <td style="border:1px solid #000; padding:4px;">
                                <input name="done_by[]" value="${row.done_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #000; padding:4px;">
                                <input name="reviewed_by[]" value="${row.reviewed_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                        `;
                        tbody.appendChild(tr);
                    });
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function clearInterLabComparisonForm() {
                const tbody = document.getElementById('GE_FOM_017__tbody');
                if (tbody) tbody.innerHTML = '';
            }

            function clearInterLabComparisonFilters() {
                document.getElementById('GE_FOM_017__from_date').value = '';
                document.getElementById('GE_FOM_017__to_date').value = '';
                document.getElementById('GE_FOM_017__lab_a').value = '';
                document.getElementById('GE_FOM_017__lab_b').value = '';
                clearInterLabComparisonForm();
            }

            function updateInterLabDatalist(datalistId, values) {
                const datalist = document.getElementById(datalistId);
                if (!datalist) return;
                const existingOptions = Array.from(datalist.options).map(opt => opt.value);
                values.forEach(value => {
                    if (!existingOptions.includes(value)) {
                        const option = document.createElement('option');
                        option.value = value;
                        datalist.appendChild(option);
                    }
                });
            }

            // Toast notification
            function showToastFOM017(type, message) {
                const existingToast = document.querySelector('.ge-toast-fom017');
                if (existingToast) existingToast.remove();

                const toast = document.createElement('div');
                toast.className = 'ge-toast-fom017';
                toast.style.cssText = `
                    position: fixed; top: 20px; right: 20px; padding: 15px 25px;
                    border-radius: 5px; color: white; font-weight: bold; z-index: 9999;
                    background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                `;
                toast.textContent = message;
                document.body.appendChild(toast);
                setTimeout(() => toast.remove(), 3000);
            }

            // AJAX form submission - stay on same page
            (function() {
                function initInterLabComparisonForm() {
                    const formContainer = document.querySelector('[id="TDPL/GE/FOM-017"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn.textContent;

                        submitBtn.textContent = 'Saving...';
                        submitBtn.disabled = true;

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            showToastFOM017('success', result.message || 'Saved successfully!');
                            // Reload data to show updated records
                            loadInterLabComparisonData();
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastFOM017('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initInterLabComparisonForm);
                } else {
                    initInterLabComparisonForm();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/GE/FOM-018"
        docNo="TDPL/GE/FOM-018"
        docName="Laboratory Incident Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.ge.forms.submit') }}">

        <!-- Hidden field for update -->
        <input type="hidden" name="laboratory_incident_form_id" id="GE_FOM_018__record_id">

        <div style="font-size:14px; line-height:22px; background:#fff; border:1px solid #ccc; padding:20px; border-radius:10px; width:100%;">

            <p>
                <strong>Date of Incident Reported by Patient/Stakeholder (With Patient ID):</strong><br>
                <input type="text" name="incident_date_patient_id" id="GE_FOM_018__incident_date_patient_id"
                    style="border:1px solid #000; padding:6px; width:60%; margin-top:5px;">
            </p>

            <p>
                <strong>Name & designation of the individual filing the report:</strong><br>
                <input type="text" name="report_filed_by" id="GE_FOM_018__report_filed_by"
                    style="border:1px solid #000; padding:6px; width:60%; margin-top:5px;">
            </p>

            <p>
                <strong>Identification of Complaint (Complaint/Query justified or not by department):</strong><br>
                <input type="text" name="complaint_identification" id="GE_FOM_018__complaint_identification"
                    style="border:1px solid #000; padding:6px; width:80%; margin-top:5px;">
            </p>

            <p>
                <strong>Department involved in the incident:</strong><br>
                <input type="text" name="department_involved" id="GE_FOM_018__department_involved"
                    style="border:1px solid #000; padding:6px; width:50%; margin-top:5px;">
            </p>

            <p>
                <strong>Description of the incident:</strong><br>
                <textarea name="incident_description" id="GE_FOM_018__incident_description"
                    style="border:1px solid #000; padding:6px; width:90%; height:80px; margin-top:5px;"></textarea>
            </p>

            <p>
                <strong>Description of the damage claimed by the Patient/Stakeholder:</strong><br>
                <textarea name="damage_description" id="GE_FOM_018__damage_description"
                    style="border:1px solid #000; padding:6px; width:90%; height:80px; margin-top:5px;"></textarea>
            </p>

            <p>
                <strong>Description of Root Cause Identified by the department involved:</strong><br>
                <textarea name="root_cause_description" id="GE_FOM_018__root_cause_description"
                    style="border:1px solid #000; padding:6px; width:90%; height:80px; margin-top:5px;"></textarea>
            </p>

            <p>
                <strong>Corrective Action (If Any) and follow-up action:</strong><br>
                <textarea name="corrective_action" id="GE_FOM_018__corrective_action"
                    style="border:1px solid #000; padding:6px; width:90%; height:80px; margin-top:5px;"></textarea>
            </p>

            <p>
                <strong>Medical/Management decision on the claim of Patient/Stakeholder including applicable medical liability:</strong><br>
                <textarea name="management_decision" id="GE_FOM_018__management_decision"
                    style="border:1px solid #000; padding:6px; width:90%; height:80px; margin-top:5px;"></textarea>
            </p>

            <br><br><br>

            <p>
                <strong>Signature of Quality Manager:</strong><br>
                <input type="text" name="signature_quality_manager" id="GE_FOM_018__signature_quality_manager"
                    style="border:1px solid #000; padding:6px; width:40%; margin-top:5px;">
            </p>

            <p>
                <strong>Signature of Lab Head:</strong><br>
                <input type="text" name="signature_lab_head" id="GE_FOM_018__signature_lab_head"
                    style="border:1px solid #000; padding:6px; width:40%; margin-top:5px;">
            </p>
        </div>
    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-019"
        docNo="TDPL/GE/FOM-019"
        docName="Employee Suggestion for Improvement Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.ge.forms.submit') }}">

        <!-- Hidden field for update -->
        <input type="hidden" name="employee_suggestion_form_id" id="GE_FOM_019__record_id">

        <div style="font-size:14px; line-height:22px; background:#fff; border:1px solid #ccc; padding:20px; border-radius:10px; width:100%;">

            <p>
                <strong>Employee Name:</strong><br>
                <input type="text" name="employee_name" id="GE_FOM_019__employee_name"
                    style="border:1px solid #000; padding:6px; width:50%; margin-top:5px;">
            </p>

            <p>
                <strong>Date:</strong><br>
                <input type="date" name="suggestion_date" id="GE_FOM_019__suggestion_date"
                    style="border:1px solid #000; padding:6px; width:30%; margin-top:5px;">
            </p>

            <p>
                <strong>Employee ID:</strong><br>
                <input type="text" name="employee_id" id="GE_FOM_019__employee_id"
                    style="border:1px solid #000; padding:6px; width:40%; margin-top:5px;">
            </p>

            <p>
                <strong>Staff suggestions for Continual Improvement in Laboratory Quality Management System:</strong><br>
                <textarea name="staff_suggestions" id="GE_FOM_019__staff_suggestions"
                    style="border:1px solid #000; padding:6px; width:90%; height:100px; margin-top:5px;"></textarea>
            </p>

            <p>
                <strong>Suggested Requirement of following:</strong><br>
                <textarea name="suggested_requirements" id="GE_FOM_019__suggested_requirements"
                    style="border:1px solid #000; padding:6px; width:90%; height:120px; margin-top:5px;"></textarea>
            </p>

            <p>
                <strong>Employee Signature:</strong><br>
                <input type="text" name="employee_signature" id="GE_FOM_019__employee_signature"
                    style="border:1px solid #000; padding:6px; width:40%; margin-top:5px;">
            </p>

            <p>
                <strong>Corrective action taken by the Management:</strong>
                <span style="font-weight:400;">(All suggestions that were considered and made available)</span><br>
                <textarea name="corrective_action_management" id="GE_FOM_019__corrective_action_management"
                    style="border:1px solid #000; padding:6px; width:90%; height:120px; margin-top:5px;"></textarea>
            </p>

            <p>
                <strong>Lab Supervisor:</strong><br>
                <input type="text" name="lab_supervisor" id="GE_FOM_019__lab_supervisor"
                    style="border:1px solid #000; padding:6px; width:40%; margin-top:5px;">
            </p>

            <p>
                <strong>Lab Director Signature:</strong><br>
                <input type="text" name="lab_director_signature" id="GE_FOM_019__lab_director_signature"
                    style="border:1px solid #000; padding:6px; width:40%; margin-top:5px;">
            </p>
        </div>
    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-020"
        docNo="TDPL/GE/FOM-020"
        docName="New Reagent Lot Verification"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.ge.forms.submit') }}">

        {{-- FILTERS --}}
        <div style="display:flex; gap:16px; margin-bottom:12px; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="GE_FOM_020__from_date" onchange="loadNewReagentLotVerificationData()"
                    style="border:1px solid #000; padding:4px;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="GE_FOM_020__to_date" onchange="loadNewReagentLotVerificationData()"
                    style="border:1px solid #000; padding:4px;">
            </div>
            <div>
                <label><strong>Location</strong></label>
                <input type="text" name="location" id="GE_FOM_020__location" list="GE_FOM_020__location_list"
                    onchange="loadNewReagentLotVerificationData()" onblur="loadNewReagentLotVerificationData()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="GE_FOM_020__location_list">
                    <option value="Main Lab">
                    <option value="Branch Lab 1">
                    <option value="Branch Lab 2">
                    <option value="Collection Center 1">
                    <option value="Collection Center 2">
                </datalist>
            </div>
            <div>
                <label><strong>Department</strong></label>
                <input type="text" name="department" id="GE_FOM_020__department" list="GE_FOM_020__department_list"
                    onchange="loadNewReagentLotVerificationData()" onblur="loadNewReagentLotVerificationData()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="GE_FOM_020__department_list">
                    <option value="Biochemistry">
                    <option value="Hematology">
                    <option value="Microbiology">
                    <option value="Clinical Pathology">
                    <option value="Histopathology">
                </datalist>
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearNewReagentLotVerificationFilters()"
                    style="background:#dc3545; color:white; border:none; padding:5px 15px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        {{-- TABLE --}}
        <table border="1" cellspacing="0" cellpadding="4" style="width:100%; border-collapse:collapse; text-align:center;">
            <thead>
                <tr>
                    <th rowspan="2" style="border:1px solid #000; padding:4px;">Date</th>
                    <th rowspan="2" style="border:1px solid #000; padding:4px;">Reagent/Kit</th>
                    <th colspan="2" style="border:1px solid #000; padding:4px;">Old Reagent</th>
                    <th colspan="2" style="border:1px solid #000; padding:4px;">New Reagent</th>
                    <th colspan="5" style="border:1px solid #000; padding:4px;">Verification</th>
                    <th rowspan="2" style="border:1px solid #000; padding:4px;">Observed Variation %</th>
                    <th rowspan="2" style="border:1px solid #000; padding:4px;">Acceptance Criteria</th>
                    <th rowspan="2" style="border:1px solid #000; padding:4px;">Acceptable / Not Acceptable</th>
                    <th rowspan="2" style="border:1px solid #000; padding:4px;">Lab Tech Signature</th>
                    <th rowspan="2" style="border:1px solid #000; padding:4px;">Verified By</th>
                </tr>
                <tr>
                    <th style="border:1px solid #000; padding:4px;">Lot No.</th>
                    <th style="border:1px solid #000; padding:4px;">Expiry Date</th>
                    <th style="border:1px solid #000; padding:4px;">Lot No.</th>
                    <th style="border:1px solid #000; padding:4px;">Expiry Date</th>
                    <th style="border:1px solid #000; padding:4px;">Analytes</th>
                    <th style="border:1px solid #000; padding:4px;">Materials Used</th>
                    <th style="border:1px solid #000; padding:4px;">Specimen Source *</th>
                    <th style="border:1px solid #000; padding:4px;">Old Lot Result</th>
                    <th style="border:1px solid #000; padding:4px;">New Lot Result</th>
                </tr>
            </thead>
            <tbody id="GE_FOM_020__tbody">
                {{-- Single empty row for new entry --}}
                <tr>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="verification_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="reagent[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="old_lot[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="old_expiry[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="new_lot[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="new_expiry[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="analytes[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="materials_used[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="specimen_source[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="old_result[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="new_result[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="variation[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="criteria[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;">
                        <select name="acceptable[]" style="width:100%; border:1px solid #ccc; padding:4px;">
                            <option value="">--</option>
                            <option value="Acceptable">Acceptable</option>
                            <option value="Not Acceptable">Not Acceptable</option>
                        </select>
                    </td>
                    <td style="border:1px solid #000; padding:4px;"><input name="lab_tech_signature[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="verified_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                </tr>
            </tbody>
        </table>

        <p style="margin-top:10px;">
            <strong>* Specimen Source:</strong> Serum, Plasma, Urine, etc.
        </p>

        <script>
            // Load New Reagent Lot Verification records based on date range filters
            function loadNewReagentLotVerificationData() {
                const fromDate = document.getElementById('GE_FOM_020__from_date').value;
                const toDate = document.getElementById('GE_FOM_020__to_date').value;

                // At least one date filter required
                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                const location = document.getElementById('GE_FOM_020__location').value;
                if (location) params.append('location', location);

                const department = document.getElementById('GE_FOM_020__department').value;
                if (department) params.append('department', department);

                fetch(`/newforms/ge/new-reagent-lot-verification/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    const tbody = document.getElementById('GE_FOM_020__tbody');
                    if (!tbody) return;

                    // Clear existing rows
                    tbody.innerHTML = '';

                    // Update datalists
                    if (res.locations) {
                        updateFOM020Datalist('GE_FOM_020__location_list', res.locations);
                    }
                    if (res.departments) {
                        updateFOM020Datalist('GE_FOM_020__department_list', res.departments);
                    }

                    // If no records found, add one empty row for new entry
                    if (!res.data || res.data.length === 0) {
                        addEmptyRowFOM020();
                        return;
                    }

                    // Add all loaded records
                    res.data.forEach((row, index) => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td style="border:1px solid #000; padding:4px;">
                                <input type="hidden" name="row_id[]" value="${row.id}">
                                <input type="date" name="verification_date[]" value="${row.verification_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #000; padding:4px;"><input name="reagent[]" value="${row.reagent || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="old_lot[]" value="${row.old_lot || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="old_expiry[]" value="${row.old_expiry || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="new_lot[]" value="${row.new_lot || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="new_expiry[]" value="${row.new_expiry || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="analytes[]" value="${row.analytes || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="materials_used[]" value="${row.materials_used || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="specimen_source[]" value="${row.specimen_source || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="old_result[]" value="${row.old_result || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="new_result[]" value="${row.new_result || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="variation[]" value="${row.variation || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="criteria[]" value="${row.criteria || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;">
                                <select name="acceptable[]" style="width:100%; border:1px solid #ccc; padding:4px;">
                                    <option value="">--</option>
                                    <option value="Acceptable" ${row.acceptable === 'Acceptable' ? 'selected' : ''}>Acceptable</option>
                                    <option value="Not Acceptable" ${row.acceptable === 'Not Acceptable' ? 'selected' : ''}>Not Acceptable</option>
                                </select>
                            </td>
                            <td style="border:1px solid #000; padding:4px;"><input name="lab_tech_signature[]" value="${row.lab_tech_signature || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="verified_by[]" value="${row.verified_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        `;
                        tbody.appendChild(tr);
                    });

                    // Add empty row BELOW loaded records
                    addEmptyRowFOM020();
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function clearNewReagentLotVerificationForm() {
                const tbody = document.getElementById('GE_FOM_020__tbody');
                if (tbody) {
                    tbody.innerHTML = '';
                    // Add empty row for new entry
                    addEmptyRowFOM020();
                }
            }

            function addEmptyRowFOM020() {
                const tbody = document.getElementById('GE_FOM_020__tbody');
                if (!tbody) return;

                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="verification_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="reagent[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="old_lot[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="old_expiry[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="new_lot[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="new_expiry[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="analytes[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="materials_used[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="specimen_source[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="old_result[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="new_result[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="variation[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="criteria[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;">
                        <select name="acceptable[]" style="width:100%; border:1px solid #ccc; padding:4px;">
                            <option value="">--</option>
                            <option value="Acceptable">Acceptable</option>
                            <option value="Not Acceptable">Not Acceptable</option>
                        </select>
                    </td>
                    <td style="border:1px solid #000; padding:4px;"><input name="lab_tech_signature[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="verified_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                `;
                tbody.appendChild(tr);
            }

            function clearNewReagentLotVerificationFilters() {
                document.getElementById('GE_FOM_020__from_date').value = '';
                document.getElementById('GE_FOM_020__to_date').value = '';
                document.getElementById('GE_FOM_020__location').value = '';
                document.getElementById('GE_FOM_020__department').value = '';
                clearNewReagentLotVerificationForm();
            }

            function updateFOM020Datalist(datalistId, values) {
                const datalist = document.getElementById(datalistId);
                if (!datalist) return;
                const existingOptions = Array.from(datalist.options).map(opt => opt.value);
                values.forEach(value => {
                    if (!existingOptions.includes(value)) {
                        const option = document.createElement('option');
                        option.value = value;
                        datalist.appendChild(option);
                    }
                });
            }

            // Toast notification
            function showToastFOM020(type, message) {
                const existingToast = document.querySelector('.ge-toast-fom020');
                if (existingToast) existingToast.remove();

                const toast = document.createElement('div');
                toast.className = 'ge-toast-fom020';
                toast.style.cssText = `
                    position: fixed; top: 20px; right: 20px; padding: 15px 25px;
                    border-radius: 5px; color: white; font-weight: bold; z-index: 9999;
                    background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                `;
                toast.textContent = message;
                document.body.appendChild(toast);
                setTimeout(() => toast.remove(), 3000);
            }

            // AJAX form submission - stay on same page
            (function() {
                function initNewReagentLotVerificationForm() {
                    const formContainer = document.querySelector('[id="TDPL/GE/FOM-020"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn.textContent;

                        submitBtn.textContent = 'Saving...';
                        submitBtn.disabled = true;

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastFOM020('success', result.message || 'Saved successfully!');

                                // Display saved records directly from response
                                const tbody = document.getElementById('GE_FOM_020__tbody');
                                if (tbody && result.data && result.data.length > 0) {
                                    tbody.innerHTML = '';

                                    // Add all saved records
                                    result.data.forEach(row => {
                                        const tr = document.createElement('tr');
                                        tr.innerHTML = `
                                            <td style="border:1px solid #000; padding:4px;">
                                                <input type="hidden" name="row_id[]" value="${row.id}">
                                                <input type="date" name="verification_date[]" value="${row.verification_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                                            </td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="reagent[]" value="${row.reagent || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="old_lot[]" value="${row.old_lot || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="old_expiry[]" value="${row.old_expiry || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="new_lot[]" value="${row.new_lot || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="new_expiry[]" value="${row.new_expiry || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="analytes[]" value="${row.analytes || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="materials_used[]" value="${row.materials_used || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="specimen_source[]" value="${row.specimen_source || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="old_result[]" value="${row.old_result || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="new_result[]" value="${row.new_result || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="variation[]" value="${row.variation || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="criteria[]" value="${row.criteria || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;">
                                                <select name="acceptable[]" style="width:100%; border:1px solid #ccc; padding:4px;">
                                                    <option value="">--</option>
                                                    <option value="Acceptable" ${row.acceptable === 'Acceptable' ? 'selected' : ''}>Acceptable</option>
                                                    <option value="Not Acceptable" ${row.acceptable === 'Not Acceptable' ? 'selected' : ''}>Not Acceptable</option>
                                                </select>
                                            </td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="lab_tech_signature[]" value="${row.lab_tech_signature || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="verified_by[]" value="${row.verified_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                        `;
                                        tbody.appendChild(tr);
                                    });

                                    // Add empty row at end for new entry
                                    addEmptyRowFOM020();
                                }
                            } else {
                                showToastFOM020('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastFOM020('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initNewReagentLotVerificationForm);
                } else {
                    initNewReagentLotVerificationForm();
                }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-021"
        docNo="TDPL/GE/FOM-021"
        docName="Non-Conformity & Corrective Action Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.ge.forms.submit') }}">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="GE_FOM_021__from_date"
                    onchange="loadNonConformityCorrectiveActionData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="GE_FOM_021__to_date"
                    onchange="loadNonConformityCorrectiveActionData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>Location</strong></label>
                <input type="text" name="location" id="GE_FOM_021__location" list="GE_FOM_021__location_list"
                    onchange="loadNonConformityCorrectiveActionData()" onblur="loadNonConformityCorrectiveActionData()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="GE_FOM_021__location_list">
                    <option value="Main Lab">
                    <option value="Branch Lab 1">
                    <option value="Branch Lab 2">
                    <option value="Collection Center">
                </datalist>
            </div>
            <div>
                <label><strong>Department</strong></label>
                <input type="text" name="department" id="GE_FOM_021__department" list="GE_FOM_021__department_list"
                    onchange="loadNonConformityCorrectiveActionData()" onblur="loadNonConformityCorrectiveActionData()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="GE_FOM_021__department_list">
                    <option value="Biochemistry">
                    <option value="Hematology">
                    <option value="Microbiology">
                    <option value="Pathology">
                    <option value="Immunology">
                </datalist>
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearNonConformityCorrectiveActionFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <table style="width:100%; border-collapse:collapse; border:1px solid #000;">
            <thead>
                <tr>
                    <td style="border:1px solid #000; padding:6px; font-weight:bold; text-align:center;">Date</td>
                    <td style="border:1px solid #000; padding:6px; font-weight:bold; text-align:center;">Non-Conformity Observed</td>
                    <td style="border:1px solid #000; padding:6px; font-weight:bold; text-align:center;">Responsible Person</td>
                    <td style="border:1px solid #000; padding:6px; font-weight:bold; text-align:center;">Root Cause Analysis</td>
                    <td style="border:1px solid #000; padding:6px; font-weight:bold; text-align:center;">Corrective Actions Taken</td>
                    <td style="border:1px solid #000; padding:6px; font-weight:bold; text-align:center;">Preventive Action Taken</td>
                    <td style="border:1px solid #000; padding:6px; font-weight:bold; text-align:center;">Date of Closure</td>
                    <td style="border:1px solid #000; padding:6px; font-weight:bold; text-align:center;">Signature</td>
                </tr>
            </thead>
            <tbody id="GE_FOM_021__tbody">
                <!-- Empty row for new entry -->
                <tr>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="nc_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="non_conformity[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="responsible_person[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="root_cause[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="corrective_action[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="preventive_action[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="closure_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="signature[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                </tr>
            </tbody>
        </table>

        <script>
            // Load Non-Conformity & Corrective Action records based on date range filters
            function loadNonConformityCorrectiveActionData() {
                const fromDate = document.getElementById('GE_FOM_021__from_date').value;
                const toDate = document.getElementById('GE_FOM_021__to_date').value;

                // At least one date filter required
                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                const location = document.getElementById('GE_FOM_021__location').value;
                if (location) params.append('location', location);

                const department = document.getElementById('GE_FOM_021__department').value;
                if (department) params.append('department', department);

                fetch(`/newforms/ge/non-conformity-corrective-action/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    const tbody = document.getElementById('GE_FOM_021__tbody');
                    if (!tbody) return;

                    // Clear existing rows
                    tbody.innerHTML = '';

                    // Update datalists
                    if (res.locations) {
                        updateFOM021Datalist('GE_FOM_021__location_list', res.locations);
                    }
                    if (res.departments) {
                        updateFOM021Datalist('GE_FOM_021__department_list', res.departments);
                    }

                    // If no records found, add one empty row for new entry
                    if (!res.data || res.data.length === 0) {
                        addEmptyRowFOM021();
                        return;
                    }

                    // Add all loaded records
                    res.data.forEach((row, index) => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td style="border:1px solid #000; padding:4px;">
                                <input type="hidden" name="row_id[]" value="${row.id}">
                                <input type="date" name="nc_date[]" value="${row.nc_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #000; padding:4px;"><input name="non_conformity[]" value="${row.non_conformity || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="responsible_person[]" value="${row.responsible_person || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="root_cause[]" value="${row.root_cause || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="corrective_action[]" value="${row.corrective_action || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="preventive_action[]" value="${row.preventive_action || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input type="date" name="closure_date[]" value="${row.closure_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="signature[]" value="${row.signature || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        `;
                        tbody.appendChild(tr);
                    });

                    // Add empty row BELOW loaded records
                    addEmptyRowFOM021();
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function clearNonConformityCorrectiveActionForm() {
                const tbody = document.getElementById('GE_FOM_021__tbody');
                if (tbody) {
                    tbody.innerHTML = '';
                    // Add empty row for new entry
                    addEmptyRowFOM021();
                }
            }

            function addEmptyRowFOM021() {
                const tbody = document.getElementById('GE_FOM_021__tbody');
                if (!tbody) return;

                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="nc_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="non_conformity[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="responsible_person[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="root_cause[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="corrective_action[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="preventive_action[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="closure_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="signature[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                `;
                tbody.appendChild(tr);
            }

            function clearNonConformityCorrectiveActionFilters() {
                document.getElementById('GE_FOM_021__from_date').value = '';
                document.getElementById('GE_FOM_021__to_date').value = '';
                document.getElementById('GE_FOM_021__location').value = '';
                document.getElementById('GE_FOM_021__department').value = '';
                clearNonConformityCorrectiveActionForm();
            }

            function updateFOM021Datalist(datalistId, values) {
                const datalist = document.getElementById(datalistId);
                if (!datalist) return;
                const existingOptions = Array.from(datalist.options).map(opt => opt.value);
                values.forEach(value => {
                    if (!existingOptions.includes(value)) {
                        const option = document.createElement('option');
                        option.value = value;
                        datalist.appendChild(option);
                    }
                });
            }

            // AJAX Submit for FOM-021
            (function() {
                function initNonConformityCorrectiveActionForm() {
                    const formContainer = document.querySelector('[id="TDPL/GE/FOM-021"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn.textContent;

                        submitBtn.textContent = 'Saving...';
                        submitBtn.disabled = true;

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastFOM021('success', result.message || 'Saved successfully!');

                                // Display saved records directly from response
                                const tbody = document.getElementById('GE_FOM_021__tbody');
                                if (tbody && result.data && result.data.length > 0) {
                                    tbody.innerHTML = '';

                                    // Add all saved records
                                    result.data.forEach(row => {
                                        const tr = document.createElement('tr');
                                        tr.innerHTML = `
                                            <td style="border:1px solid #000; padding:4px;">
                                                <input type="hidden" name="row_id[]" value="${row.id}">
                                                <input type="date" name="nc_date[]" value="${row.nc_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                                            </td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="non_conformity[]" value="${row.non_conformity || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="responsible_person[]" value="${row.responsible_person || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="root_cause[]" value="${row.root_cause || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="corrective_action[]" value="${row.corrective_action || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="preventive_action[]" value="${row.preventive_action || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input type="date" name="closure_date[]" value="${row.closure_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="signature[]" value="${row.signature || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                        `;
                                        tbody.appendChild(tr);
                                    });

                                    // Add empty row at end for new entry
                                    addEmptyRowFOM021();
                                }
                            } else {
                                showToastFOM021('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastFOM021('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                function showToastFOM021(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position: fixed; top: 20px; right: 20px; z-index: 9999;
                        padding: 15px 25px; border-radius: 5px; color: white;
                        font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.3);
                        background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initNonConformityCorrectiveActionForm);
                } else {
                    initNonConformityCorrectiveActionForm();
                }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-022"
        docNo="TDPL/GE/FOM-022"
        docName="Refrigerator Temperature Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.ge.forms.submit') }}">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>Month/Year</strong></label>
                <input type="month" name="month_year" id="GE_FOM_022__month_year"
                    onchange="loadRefrigeratorTemperatureData()"
                    style="border:1px solid #000; padding:4px; width:150px; display:block;">
            </div>
            <div>
                <label><strong>Dept.</strong></label>
                <input type="text" name="department" id="GE_FOM_022__department" list="GE_FOM_022__department_list"
                    onchange="loadRefrigeratorTemperatureData()" onblur="loadRefrigeratorTemperatureData()"
                    style="border:1px solid #000; padding:4px; width:150px;" placeholder="Select or type">
                <datalist id="GE_FOM_022__department_list">
                    <option value="Biochemistry">
                    <option value="Hematology">
                    <option value="Microbiology">
                    <option value="Pathology">
                    <option value="Immunology">
                </datalist>
            </div>
            <div>
                <label><strong>Instrument ID/S. No.</strong></label>
                <input type="text" name="instrument_id" id="GE_FOM_022__instrument_id" list="GE_FOM_022__instrument_list"
                    onchange="loadRefrigeratorTemperatureData()" onblur="loadRefrigeratorTemperatureData()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="GE_FOM_022__instrument_list">
                    <option value="REF-001">
                    <option value="REF-002">
                    <option value="REF-003">
                    <option value="REF-004">
                    <option value="REF-005">
                </datalist>
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearRefrigeratorTemperatureForm()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <table border="1" style="width:100%; border-collapse:collapse; margin-top:15px;">
            <thead>
                <tr style="background:#f2f2f2; text-align:center;">
                    <td rowspan="2" style="padding:6px; border:1px solid #000; font-weight:bold;">Date</td>
                    <td colspan="2" style="padding:6px; border:1px solid #000; font-weight:bold;">Morning (9–10 AM)</td>
                    <td colspan="2" style="padding:6px; border:1px solid #000; font-weight:bold;">Evening (4–5 PM)</td>
                </tr>
                <tr style="background:#f9f9f9; text-align:center;">
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Temperature</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Signature</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Temperature</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Signature</td>
                </tr>
            </thead>
            <tbody id="GE_FOM_022__tbody">
                @foreach(range(1, 31) as $day)
                <tr>
                    <td style="padding:6px; text-align:center; border:1px solid #000; font-weight:bold;">
                        {{ $day }}
                    </td>
                    <td style="padding:4px; border:1px solid #000;">
                        <input type="number" name="morning_temp_{{ $day }}" id="fom022_morning_temp_{{ $day }}"
                            step="0.1" style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>
                    <td style="padding:4px; border:1px solid #000;">
                        <input type="text" name="morning_sign_{{ $day }}" id="fom022_morning_sign_{{ $day }}"
                            style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>
                    <td style="padding:4px; border:1px solid #000;">
                        <input type="number" name="evening_temp_{{ $day }}" id="fom022_evening_temp_{{ $day }}"
                            step="0.1" style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>
                    <td style="padding:4px; border:1px solid #000;">
                        <input type="text" name="evening_sign_{{ $day }}" id="fom022_evening_sign_{{ $day }}"
                            style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <p style="margin-top:12px;">
            <strong>NOTE: Acceptable Temperature:</strong>
            <span style="font-weight:400;">2–8°C</span>
        </p>

        <script>
            function loadRefrigeratorTemperatureData() {
                const monthYear = document.getElementById('GE_FOM_022__month_year').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('month_year', monthYear);

                const department = document.getElementById('GE_FOM_022__department').value;
                if (department) params.append('department', department);

                const instrumentId = document.getElementById('GE_FOM_022__instrument_id').value;
                if (instrumentId) params.append('instrument_id', instrumentId);

                fetch(`/newforms/ge/refrigerator-temperature/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    // Update datalists
                    if (res.departments) {
                        updateFOM022Datalist('GE_FOM_022__department_list', res.departments);
                    }
                    if (res.instrument_ids) {
                        updateFOM022Datalist('GE_FOM_022__instrument_list', res.instrument_ids);
                    }

                    // Clear all inputs first
                    clearRefrigeratorTemperatureInputs();

                    // If data found, populate fields
                    if (res.success && res.data) {
                        const dailyData = res.data.daily_data || {};

                        for (const [key, value] of Object.entries(dailyData)) {
                            const el = document.getElementById('fom022_' + key);
                            if (el && value) el.value = value;
                        }
                    }
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function clearRefrigeratorTemperatureInputs() {
                for (let i = 1; i <= 31; i++) {
                    const morningTemp = document.getElementById(`fom022_morning_temp_${i}`);
                    const morningSign = document.getElementById(`fom022_morning_sign_${i}`);
                    const eveningTemp = document.getElementById(`fom022_evening_temp_${i}`);
                    const eveningSign = document.getElementById(`fom022_evening_sign_${i}`);
                    if (morningTemp) morningTemp.value = '';
                    if (morningSign) morningSign.value = '';
                    if (eveningTemp) eveningTemp.value = '';
                    if (eveningSign) eveningSign.value = '';
                }
            }

            function clearRefrigeratorTemperatureForm() {
                document.getElementById('GE_FOM_022__month_year').value = '';
                document.getElementById('GE_FOM_022__department').value = '';
                document.getElementById('GE_FOM_022__instrument_id').value = '';
                clearRefrigeratorTemperatureInputs();
            }

            function updateFOM022Datalist(datalistId, values) {
                const datalist = document.getElementById(datalistId);
                if (!datalist) return;
                const existingOptions = Array.from(datalist.options).map(opt => opt.value);
                values.forEach(value => {
                    if (!existingOptions.includes(value)) {
                        const option = document.createElement('option');
                        option.value = value;
                        datalist.appendChild(option);
                    }
                });
            }

            // AJAX Submit for FOM-022
            (function() {
                function initRefrigeratorTemperatureForm() {
                    const formContainer = document.querySelector('[id="TDPL/GE/FOM-022"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn.textContent;

                        submitBtn.textContent = 'Saving...';
                        submitBtn.disabled = true;

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastFOM022('success', result.message || 'Saved successfully!');
                            } else {
                                showToastFOM022('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastFOM022('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                function showToastFOM022(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position: fixed; top: 20px; right: 20px; z-index: 9999;
                        padding: 15px 25px; border-radius: 5px; color: white;
                        font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.3);
                        background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initRefrigeratorTemperatureForm);
                } else {
                    initRefrigeratorTemperatureForm();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/GE/FOM-023"
        docNo="TDPL/GE/FOM-023"
        docName="Repeat Test Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.ge.forms.submit') }}">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="GE_FOM_023__from_date"
                    onchange="loadRepeatTestData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="GE_FOM_023__to_date"
                    onchange="loadRepeatTestData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>Department</strong></label>
                <input type="text" name="department" id="GE_FOM_023__department" list="GE_FOM_023__department_list"
                    onchange="loadRepeatTestData()" onblur="loadRepeatTestData()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="GE_FOM_023__department_list">
                    <option value="Biochemistry">
                    <option value="Hematology">
                    <option value="Microbiology">
                    <option value="Pathology">
                    <option value="Immunology">
                </datalist>
            </div>
            <div>
                <label><strong>Location</strong></label>
                <input type="text" name="location" id="GE_FOM_023__location" list="GE_FOM_023__location_list"
                    onchange="loadRepeatTestData()" onblur="loadRepeatTestData()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="GE_FOM_023__location_list">
                    <option value="Main Lab">
                    <option value="Branch Lab 1">
                    <option value="Branch Lab 2">
                    <option value="Collection Center">
                </datalist>
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearRepeatTestFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <table border="1" style="width:100%; border-collapse:collapse; text-align:center;">
            <thead>
                <tr style="background:#f2f2f2;">
                    <td rowspan="2" style="padding:6px; border:1px solid #000; font-weight:bold;">Date</td>
                    <td rowspan="2" style="padding:6px; border:1px solid #000; font-weight:bold;">Visit ID</td>
                    <td rowspan="2" style="padding:6px; border:1px solid #000; font-weight:bold;">Parameter being repeated</td>
                    <td rowspan="2" style="padding:6px; border:1px solid #000; font-weight:bold;">Reason for repeat</td>
                    <td rowspan="2" style="padding:6px; border:1px solid #000; font-weight:bold;">Repeat authorised by sign/date</td>
                    <td colspan="3" style="padding:6px; border:1px solid #000; font-weight:bold;">Repeat Result</td>
                    <td rowspan="2" style="padding:6px; border:1px solid #000; font-weight:bold;">Result entered in LIMS</td>
                    <td rowspan="2" style="padding:6px; border:1px solid #000; font-weight:bold;">Final Result reviewed by sign/date</td>
                </tr>
                <tr style="background:#f9f9f9;">
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">A</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">B</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">C</td>
                </tr>
            </thead>
            <tbody id="GE_FOM_023__tbody">
                <!-- Empty row for new entry -->
                <tr>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="test_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="visit_id[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="parameter[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="reason[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="authorised_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="result_a[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="result_b[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="result_c[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="lims_entry[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="reviewed_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                </tr>
            </tbody>
        </table>

        <p style="margin-top:12px;">
            <strong>KEY:</strong>
            <span style="font-weight:400;">
                'A' – Original Result,
                'B' – 1st Repeat,
                'C' – 2nd Repeat (as relevant)
            </span>
        </p>

        <script>
            // Load Repeat Test records based on date range filters
            function loadRepeatTestData() {
                const fromDate = document.getElementById('GE_FOM_023__from_date').value;
                const toDate = document.getElementById('GE_FOM_023__to_date').value;

                // At least one date filter required
                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                const department = document.getElementById('GE_FOM_023__department').value;
                if (department) params.append('department', department);

                const location = document.getElementById('GE_FOM_023__location').value;
                if (location) params.append('location', location);

                fetch(`/newforms/ge/repeat-test/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    const tbody = document.getElementById('GE_FOM_023__tbody');
                    if (!tbody) return;

                    // Clear existing rows
                    tbody.innerHTML = '';

                    // Update datalists
                    if (res.departments) {
                        updateFOM023Datalist('GE_FOM_023__department_list', res.departments);
                    }
                    if (res.locations) {
                        updateFOM023Datalist('GE_FOM_023__location_list', res.locations);
                    }

                    // If no records found, add one empty row for new entry
                    if (!res.data || res.data.length === 0) {
                        addEmptyRowFOM023();
                        return;
                    }

                    // Add all loaded records
                    res.data.forEach((row, index) => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td style="border:1px solid #000; padding:4px;">
                                <input type="hidden" name="row_id[]" value="${row.id}">
                                <input type="date" name="test_date[]" value="${row.test_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #000; padding:4px;"><input name="visit_id[]" value="${row.visit_id || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="parameter[]" value="${row.parameter || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="reason[]" value="${row.reason || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="authorised_by[]" value="${row.authorised_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="result_a[]" value="${row.result_a || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="result_b[]" value="${row.result_b || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="result_c[]" value="${row.result_c || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="lims_entry[]" value="${row.lims_entry || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="reviewed_by[]" value="${row.reviewed_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        `;
                        tbody.appendChild(tr);
                    });

                    // Add empty row BELOW loaded records
                    addEmptyRowFOM023();
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function clearRepeatTestForm() {
                const tbody = document.getElementById('GE_FOM_023__tbody');
                if (tbody) {
                    tbody.innerHTML = '';
                    // Add empty row for new entry
                    addEmptyRowFOM023();
                }
            }

            function addEmptyRowFOM023() {
                const tbody = document.getElementById('GE_FOM_023__tbody');
                if (!tbody) return;

                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="test_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="visit_id[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="parameter[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="reason[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="authorised_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="result_a[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="result_b[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="result_c[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="lims_entry[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="reviewed_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                `;
                tbody.appendChild(tr);
            }

            function clearRepeatTestFilters() {
                document.getElementById('GE_FOM_023__from_date').value = '';
                document.getElementById('GE_FOM_023__to_date').value = '';
                document.getElementById('GE_FOM_023__department').value = '';
                document.getElementById('GE_FOM_023__location').value = '';
                clearRepeatTestForm();
            }

            function updateFOM023Datalist(datalistId, values) {
                const datalist = document.getElementById(datalistId);
                if (!datalist) return;
                const existingOptions = Array.from(datalist.options).map(opt => opt.value);
                values.forEach(value => {
                    if (!existingOptions.includes(value)) {
                        const option = document.createElement('option');
                        option.value = value;
                        datalist.appendChild(option);
                    }
                });
            }

            // AJAX Submit for FOM-023
            (function() {
                function initRepeatTestForm() {
                    const formContainer = document.querySelector('[id="TDPL/GE/FOM-023"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn.textContent;

                        submitBtn.textContent = 'Saving...';
                        submitBtn.disabled = true;

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastFOM023('success', result.message || 'Saved successfully!');

                                // Display saved records directly from response
                                const tbody = document.getElementById('GE_FOM_023__tbody');
                                if (tbody && result.data && result.data.length > 0) {
                                    tbody.innerHTML = '';

                                    // Add all saved records
                                    result.data.forEach(row => {
                                        const tr = document.createElement('tr');
                                        tr.innerHTML = `
                                            <td style="border:1px solid #000; padding:4px;">
                                                <input type="hidden" name="row_id[]" value="${row.id}">
                                                <input type="date" name="test_date[]" value="${row.test_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                                            </td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="visit_id[]" value="${row.visit_id || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="parameter[]" value="${row.parameter || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="reason[]" value="${row.reason || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="authorised_by[]" value="${row.authorised_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="result_a[]" value="${row.result_a || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="result_b[]" value="${row.result_b || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="result_c[]" value="${row.result_c || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="lims_entry[]" value="${row.lims_entry || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="reviewed_by[]" value="${row.reviewed_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                        `;
                                        tbody.appendChild(tr);
                                    });

                                    // Add empty row at end for new entry
                                    addEmptyRowFOM023();
                                }
                            } else {
                                showToastFOM023('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastFOM023('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                function showToastFOM023(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position: fixed; top: 20px; right: 20px; z-index: 9999;
                        padding: 15px 25px; border-radius: 5px; color: white;
                        font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.3);
                        background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initRepeatTestForm);
                } else {
                    initRepeatTestForm();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/GE/FOM-025"
        docNo="TDPL/GE/FOM-025"
        docName="NiU-Transcription Check Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.ge.forms.submit') }}">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="GE_FOM_025__from_date"
                    onchange="loadNiuTranscriptionCheckData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="GE_FOM_025__to_date"
                    onchange="loadNiuTranscriptionCheckData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>Department</strong></label>
                <input type="text" name="department" id="GE_FOM_025__department" list="GE_FOM_025__department_list"
                    onchange="loadNiuTranscriptionCheckData()" onblur="loadNiuTranscriptionCheckData()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="GE_FOM_025__department_list">
                    <option value="Biochemistry">
                    <option value="Hematology">
                    <option value="Microbiology">
                    <option value="Pathology">
                    <option value="Immunology">
                </datalist>
            </div>
            <div>
                <label><strong>Location</strong></label>
                <input type="text" name="location" id="GE_FOM_025__location" list="GE_FOM_025__location_list"
                    onchange="loadNiuTranscriptionCheckData()" onblur="loadNiuTranscriptionCheckData()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="GE_FOM_025__location_list">
                    <option value="Main Lab">
                    <option value="Branch Lab 1">
                    <option value="Branch Lab 2">
                    <option value="Collection Center">
                </datalist>
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearNiuTranscriptionCheckFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Date</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Visit No.</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Results Recorded on Worksheet</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Results Entered In LIS</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Result Entered By</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Results Verified By</td>
                </tr>
            </thead>
            <tbody id="GE_FOM_025__tbody">
                <!-- Empty row for new entry -->
                <tr>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="check_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="visit_no[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="worksheet_result[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="lis_result[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="entered_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="verified_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                </tr>
            </tbody>
        </table>

        <script>
            // Load NiU-Transcription Check records based on date range filters
            function loadNiuTranscriptionCheckData() {
                const fromDate = document.getElementById('GE_FOM_025__from_date').value;
                const toDate = document.getElementById('GE_FOM_025__to_date').value;

                // At least one date filter required
                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                const department = document.getElementById('GE_FOM_025__department').value;
                if (department) params.append('department', department);

                const location = document.getElementById('GE_FOM_025__location').value;
                if (location) params.append('location', location);

                fetch(`/newforms/ge/niu-transcription-check/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    const tbody = document.getElementById('GE_FOM_025__tbody');
                    if (!tbody) return;

                    // Clear existing rows
                    tbody.innerHTML = '';

                    // Update datalists
                    if (res.departments) {
                        updateFOM025Datalist('GE_FOM_025__department_list', res.departments);
                    }
                    if (res.locations) {
                        updateFOM025Datalist('GE_FOM_025__location_list', res.locations);
                    }

                    // If no records found, add one empty row for new entry
                    if (!res.data || res.data.length === 0) {
                        addEmptyRowFOM025();
                        return;
                    }

                    // Add all loaded records
                    res.data.forEach((row, index) => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td style="border:1px solid #000; padding:4px;">
                                <input type="hidden" name="row_id[]" value="${row.id}">
                                <input type="date" name="check_date[]" value="${row.check_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #000; padding:4px;"><input name="visit_no[]" value="${row.visit_no || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="worksheet_result[]" value="${row.worksheet_result || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="lis_result[]" value="${row.lis_result || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="entered_by[]" value="${row.entered_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="verified_by[]" value="${row.verified_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        `;
                        tbody.appendChild(tr);
                    });

                    // Add empty row BELOW loaded records
                    addEmptyRowFOM025();
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function clearNiuTranscriptionCheckForm() {
                const tbody = document.getElementById('GE_FOM_025__tbody');
                if (tbody) {
                    tbody.innerHTML = '';
                    // Add empty row for new entry
                    addEmptyRowFOM025();
                }
            }

            function addEmptyRowFOM025() {
                const tbody = document.getElementById('GE_FOM_025__tbody');
                if (!tbody) return;

                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="check_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="visit_no[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="worksheet_result[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="lis_result[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="entered_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="verified_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                `;
                tbody.appendChild(tr);
            }

            function clearNiuTranscriptionCheckFilters() {
                document.getElementById('GE_FOM_025__from_date').value = '';
                document.getElementById('GE_FOM_025__to_date').value = '';
                document.getElementById('GE_FOM_025__department').value = '';
                document.getElementById('GE_FOM_025__location').value = '';
                clearNiuTranscriptionCheckForm();
            }

            function updateFOM025Datalist(datalistId, values) {
                const datalist = document.getElementById(datalistId);
                if (!datalist) return;
                const existingOptions = Array.from(datalist.options).map(opt => opt.value);
                values.forEach(value => {
                    if (!existingOptions.includes(value)) {
                        const option = document.createElement('option');
                        option.value = value;
                        datalist.appendChild(option);
                    }
                });
            }

            // AJAX Submit for FOM-025
            (function() {
                function initNiuTranscriptionCheckForm() {
                    const formContainer = document.querySelector('[id="TDPL/GE/FOM-025"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn.textContent;

                        submitBtn.textContent = 'Saving...';
                        submitBtn.disabled = true;

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastFOM025('success', result.message || 'Saved successfully!');

                                // Display saved records directly from response
                                const tbody = document.getElementById('GE_FOM_025__tbody');
                                if (tbody && result.data && result.data.length > 0) {
                                    tbody.innerHTML = '';

                                    // Add all saved records
                                    result.data.forEach(row => {
                                        const tr = document.createElement('tr');
                                        tr.innerHTML = `
                                            <td style="border:1px solid #000; padding:4px;">
                                                <input type="hidden" name="row_id[]" value="${row.id}">
                                                <input type="date" name="check_date[]" value="${row.check_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                                            </td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="visit_no[]" value="${row.visit_no || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="worksheet_result[]" value="${row.worksheet_result || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="lis_result[]" value="${row.lis_result || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="entered_by[]" value="${row.entered_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="verified_by[]" value="${row.verified_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                        `;
                                        tbody.appendChild(tr);
                                    });

                                    // Add empty row at end for new entry
                                    addEmptyRowFOM025();
                                }
                            } else {
                                showToastFOM025('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastFOM025('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                function showToastFOM025(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position: fixed; top: 20px; right: 20px; z-index: 9999;
                        padding: 15px 25px; border-radius: 5px; color: white;
                        font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.3);
                        background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initNiuTranscriptionCheckForm);
                } else {
                    initNiuTranscriptionCheckForm();
                }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-027"
        docNo="TDPL/GE/FOM-027"
        docName=" Meeting Agenda Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.ge.forms.submit') }}">

        <!-- Hidden field for record ID (for inline edit) -->
        <input type="hidden" name="meeting_agenda_form_id" id="fom027_record_id" value="">

        <div style="background:#fff; border:1px solid #ccc; border-radius:12px; padding:25px; width:100%; font-family:Arial;">

            <h2 style="text-align:center; margin-bottom:20px;">Meeting Agenda Form</h2>

            <!-- Meeting Details -->
            <div style="padding:15px; border:1px solid #ddd; border-radius:10px; margin-bottom:20px;">
                <p style="font-weight:bold; margin-bottom:10px;">Meeting Details</p>

                <div style="margin-bottom:10px;">
                    <label style="width:120px; display:inline-block;">Date:</label>
                    <input type="date" name="meeting_date" id="fom027_meeting_date"
                        style="border:1px solid #000; border-radius:6px; padding:6px;">

                    <label style="margin-left:40px; width:60px; display:inline-block;">Time:</label>
                    <input type="text" name="meeting_time" id="fom027_meeting_time"
                        style="border:1px solid #000; border-radius:6px; padding:6px;">
                </div>

                <div style="margin-bottom:10px;">
                    <label style="width:120px; display:inline-block;">Location:</label>
                    <input type="text" name="meeting_location" id="fom027_meeting_location"
                        style="border:1px solid #000; border-radius:6px; padding:6px; width:30%;">

                    <label style="margin-left:40px; width:150px; display:inline-block;">Expected Duration:</label>
                    <input type="text" name="meeting_duration" id="fom027_meeting_duration"
                        style="border:1px solid #000; border-radius:6px; padding:6px;">
                </div>

                <div style="margin-bottom:10px;">
                    <label style="width:120px; display:inline-block;">Chairperson:</label>
                    <input type="text" name="chairperson" id="fom027_chairperson"
                        style="border:1px solid #000; border-radius:6px; padding:6px; width:30%;">

                    <label style="margin-left:40px; width:90px; display:inline-block;">Recorder:</label>
                    <input type="text" name="recorder" id="fom027_recorder"
                        style="border:1px solid #000; border-radius:6px; padding:6px;">
                </div>
            </div>

            <!-- Attendees -->
            <div style="padding:15px; border:1px solid #ddd; border-radius:10px; margin-bottom:20px;">
                <p style="font-weight:bold; margin-bottom:10px;">Attendees</p>

                @for($i = 1; $i <= 10; $i++)
                    <div style="display:flex; align-items:center; margin-bottom:8px;">
                    <span style="width:25px;">{{ $i }}.</span>
                    <input type="text" name="attendees[{{ $i }}]" id="fom027_attendee_{{ $i }}"
                        style="border:1px solid #000; border-radius:6px; padding:6px; width:40%;">
            </div>
            @endfor
        </div>

        <!-- Invitation Message -->
        <div style="padding:15px; border:1px solid #ddd; border-radius:10px; margin-bottom:20px;">
            <p>Dear Team,</p>

            <p>
                You are cordially invited to attend the upcoming <strong>Meeting</strong> for
                <input type="text" name="meeting_topic" id="fom027_meeting_topic"
                    style="border:1px solid #000; border-radius:6px; padding:4px; width:25%; display:inline-block;">
            </p>

            <h3 style="font-size:18px; margin-top:20px;">AGENDA ITEMS</h3>
            <ol>
                @for($i = 1; $i <= 10; $i++)
                    <li style="margin-bottom:8px;">
                    <input type="text" name="agenda_items[{{ $i }}]" id="fom027_agenda_item_{{ $i }}"
                        style="border:1px solid #000; border-radius:6px; padding:6px; width:85%;">
                    </li>
                    @endfor
            </ol>

            <p>
                Your participation is critical to ensure a comprehensive and effective review.
                Kindly prepare and bring any relevant data or presentations from your department.
            </p>

            <p>
                Please confirm your availability by:
                <input type="date" name="confirmation_date" id="fom027_confirmation_date"
                    style="border:1px solid #000; border-radius:6px; padding:4px;">
            </p>
        </div>

        <!-- Sender Info -->
        <div style="padding:15px; border:1px solid #ddd; border-radius:10px;">
            <p style="font-weight:bold;">Warm Regards,</p>

            <div style="margin-top:10px;">
                <label style="display:block; margin-bottom:5px;">Your Full Name:</label>
                <input type="text" name="sender_name" id="fom027_sender_name"
                    style="border:1px solid #000; border-radius:6px; padding:6px; width:40%;">

                <br><br>

                <label style="display:block; margin-bottom:5px;">Designation:</label>
                <input type="text" name="sender_designation" id="fom027_sender_designation"
                    style="border:1px solid #000; border-radius:6px; padding:6px; width:40%;">

                <br><br>

                <label style="display:block; margin-bottom:5px;">Contact Details:</label>
                <input type="text" name="sender_contact" id="fom027_sender_contact"
                    style="border:1px solid #000; border-radius:6px; padding:6px; width:40%;">

                <p style="margin-top:15px;">TRUSTlab Diagnostics Pvt Ltd</p>
            </div>
        </div>

        </div>

        <script>
            // AJAX Submit for FOM-027
            (function() {
                function initMeetingAgendaForm() {
                    const formContainer = document.querySelector('[id="TDPL/GE/FOM-027"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn.textContent;

                        submitBtn.textContent = 'Saving...';
                        submitBtn.disabled = true;

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastFOM027('success', result.message || 'Saved successfully!');
                                // Set record ID for future updates
                                if (result.data && result.data.id) {
                                    document.getElementById('fom027_record_id').value = result.data.id;
                                }
                            } else {
                                showToastFOM027('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastFOM027('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                function showToastFOM027(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position: fixed; top: 20px; right: 20px; z-index: 9999;
                        padding: 15px 25px; border-radius: 5px; color: white;
                        font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.3);
                        background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initMeetingAgendaForm);
                } else {
                    initMeetingAgendaForm();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/GE/FOM-029"
        docNo="TDPL/GE/FOM-029"
        docName="Approved Referral Laboratories Consultants Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.ge.forms.submit') }}">

        <!-- Header Section -->
        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Month & Year:</strong>
                <input type="month" name="month_year" id="fom029_month_year"
                    style="border:1px solid #000; padding:4px;"
                    onchange="loadApprovedReferralLab()">
            </div>
            <div>
                <strong>Location:</strong>
                <input type="text" name="location" id="fom029_location" list="fom029_loc_list"
                    style="border:1px solid #000; padding:4px; width:200px;"
                    onchange="loadApprovedReferralLab()">
                <datalist id="fom029_loc_list">
                    <option value="Main Lab">
                    <option value="Branch Lab">
                    <option value="Collection Center">
                    <option value="Hospital Lab">
                    <option value="Clinic Lab">
                </datalist>
            </div>
            <button type="button" onclick="clearApprovedReferralLab()"
                style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <table style="width:100%; border-collapse:collapse; border:1px solid #000;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:8px; width:60px;">S. No.</th>
                    <th style="border:1px solid #000; padding:8px;">Outsource Lab / Consultant Name</th>
                    <th style="border:1px solid #000; padding:8px;">Location</th>
                    <th style="border:1px solid #000; padding:8px;">MoU Date</th>
                    <th style="border:1px solid #000; padding:8px;">User Code</th>
                </tr>
            </thead>

            <tbody>
                @for($i = 1; $i <= 31; $i++)
                <tr>
                    <td style="border:1px solid #000; padding:6px; text-align:center; font-weight:bold;">
                        {{ $i }}
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="lab_name_{{ $i }}" id="fom029_lab_name_{{ $i }}"
                            style="width:100%; border:1px solid #000; border-radius:6px; padding:5px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="row_location_{{ $i }}" id="fom029_row_location_{{ $i }}"
                            style="width:100%; border:1px solid #000; border-radius:6px; padding:5px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="date" name="mou_date_{{ $i }}" id="fom029_mou_date_{{ $i }}"
                            style="width:100%; border:1px solid #000; border-radius:6px; padding:5px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="user_code_{{ $i }}" id="fom029_user_code_{{ $i }}"
                            style="width:100%; border:1px solid #000; border-radius:6px; padding:5px;">
                    </td>
                </tr>
                @endfor
            </tbody>
        </table>

        <script>
            function loadApprovedReferralLab() {
                const monthYear = document.getElementById('fom029_month_year').value;
                const location = document.getElementById('fom029_location').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('month_year', monthYear);
                if (location) params.append('location', location);

                fetch(`/newforms/ge/approved-referral-lab/load?${params.toString()}`)
                    .then(res => res.json())
                    .then(result => {
                        // Populate datalists
                        if (result.locations) {
                            const locList = document.getElementById('fom029_loc_list');
                            const currentOptions = ['Main Lab', 'Branch Lab', 'Collection Center', 'Hospital Lab', 'Clinic Lab'];
                            const allLocations = [...new Set([...currentOptions, ...result.locations])];
                            locList.innerHTML = allLocations.map(l => `<option value="${l}">`).join('');
                        }

                        // Clear all inputs first
                        clearApprovedReferralLabInputs();

                        // If data found, populate fields
                        if (result.success && result.data && result.data.daily_data) {
                            const data = result.data.daily_data;
                            for (const [key, value] of Object.entries(data)) {
                                const el = document.getElementById('fom029_' + key);
                                if (el) el.value = value;
                            }
                        }
                    })
                    .catch(err => console.error('Load error:', err));
            }

            function clearApprovedReferralLabInputs() {
                for (let i = 1; i <= 31; i++) {
                    const labName = document.getElementById(`fom029_lab_name_${i}`);
                    const rowLoc = document.getElementById(`fom029_row_location_${i}`);
                    const mouDate = document.getElementById(`fom029_mou_date_${i}`);
                    const userCode = document.getElementById(`fom029_user_code_${i}`);
                    if (labName) labName.value = '';
                    if (rowLoc) rowLoc.value = '';
                    if (mouDate) mouDate.value = '';
                    if (userCode) userCode.value = '';
                }
            }

            function clearApprovedReferralLab() {
                document.getElementById('fom029_month_year').value = '';
                document.getElementById('fom029_location').value = '';
                clearApprovedReferralLabInputs();
            }

            // AJAX Submit for FOM-029
            (function() {
                function initApprovedReferralLabForm() {
                    const formContainer = document.querySelector('[id="TDPL/GE/FOM-029"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastFOM029('success', result.message || 'Saved successfully!');
                            } else {
                                showToastFOM029('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastFOM029('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });

                        return false;
                    });
                }

                function showToastFOM029(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position: fixed; top: 20px; right: 20px; z-index: 9999;
                        padding: 15px 25px; border-radius: 5px; color: white;
                        font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.3);
                        background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initApprovedReferralLabForm);
                } else {
                    initApprovedReferralLabForm();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/GE/FOM-030"
        docNo="TDPL/GE/FOM-030"
        docName="Room Temperature and Humidity Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.ge.forms.submit') }}">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>Month/Year</strong></label>
                <input type="month" name="month_year" id="GE_FOM_030__month_year"
                    onchange="loadRoomTemperatureHumidityData()"
                    style="border:1px solid #000; padding:4px; width:150px; display:block;">
            </div>
            <div>
                <label><strong>Department</strong></label>
                <input type="text" name="department" id="GE_FOM_030__department" list="GE_FOM_030__department_list"
                    onchange="loadRoomTemperatureHumidityData()" onblur="loadRoomTemperatureHumidityData()"
                    style="border:1px solid #000; padding:4px; width:150px;" placeholder="Select or type">
                <datalist id="GE_FOM_030__department_list">
                    <option value="Biochemistry">
                    <option value="Hematology">
                    <option value="Microbiology">
                    <option value="Pathology">
                    <option value="Immunology">
                </datalist>
            </div>
            <div>
                <label><strong>Instrument ID/S. No.</strong></label>
                <input type="text" name="instrument_id" id="GE_FOM_030__instrument_id" list="GE_FOM_030__instrument_list"
                    onchange="loadRoomTemperatureHumidityData()" onblur="loadRoomTemperatureHumidityData()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="GE_FOM_030__instrument_list">
                    <option value="RTH-001">
                    <option value="RTH-002">
                    <option value="RTH-003">
                    <option value="RTH-004">
                    <option value="RTH-005">
                </datalist>
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearRoomTemperatureHumidityForm()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <p style="margin-bottom:10px;">
            <strong>Acceptable Range:</strong> Humidity: 30% - 85%, Temperature: 25 ± 5 °C
        </p>

        <!-- Data Table -->
        <table border="1" style="width:100%; border-collapse:collapse; margin-top:10px;">
            <thead>
                <tr style="background:#f2f2f2; text-align:center;">
                    <td rowspan="2" style="padding:6px; border:1px solid #000; font-weight:bold; width:6%;">Date</td>
                    <td colspan="3" style="padding:6px; border:1px solid #000; font-weight:bold;">
                        Morning (9:00 AM - 9:30 AM)
                    </td>
                    <td colspan="3" style="padding:6px; border:1px solid #000; font-weight:bold;">
                        Evening (3:30 PM - 4:00 PM)
                    </td>
                </tr>
                <tr style="background:#f9f9f9; text-align:center;">
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Humidity</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Temperature</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Signature</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Humidity</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Temperature</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Signature</td>
                </tr>
            </thead>
            <tbody id="GE_FOM_030__tbody">
                @foreach(range(1, 31) as $day)
                <tr>
                    <td style="padding:6px; text-align:center; border:1px solid #000; font-weight:bold;">
                        {{ $day }}
                    </td>
                    <!-- Morning Humidity -->
                    <td style="padding:4px; border:1px solid #000;">
                        <input type="text" name="morning_humidity_{{ $day }}" id="fom030_morning_humidity_{{ $day }}"
                            style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>
                    <!-- Morning Temperature -->
                    <td style="padding:4px; border:1px solid #000;">
                        <input type="text" name="morning_temp_{{ $day }}" id="fom030_morning_temp_{{ $day }}"
                            style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>
                    <!-- Morning Signature -->
                    <td style="padding:4px; border:1px solid #000;">
                        <input type="text" name="morning_sign_{{ $day }}" id="fom030_morning_sign_{{ $day }}"
                            style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>
                    <!-- Evening Humidity -->
                    <td style="padding:4px; border:1px solid #000;">
                        <input type="text" name="evening_humidity_{{ $day }}" id="fom030_evening_humidity_{{ $day }}"
                            style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>
                    <!-- Evening Temperature -->
                    <td style="padding:4px; border:1px solid #000;">
                        <input type="text" name="evening_temp_{{ $day }}" id="fom030_evening_temp_{{ $day }}"
                            style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>
                    <!-- Evening Signature -->
                    <td style="padding:4px; border:1px solid #000;">
                        <input type="text" name="evening_sign_{{ $day }}" id="fom030_evening_sign_{{ $day }}"
                            style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <script>
            function loadRoomTemperatureHumidityData() {
                const monthYear = document.getElementById('GE_FOM_030__month_year').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('month_year', monthYear);

                const department = document.getElementById('GE_FOM_030__department').value;
                if (department) params.append('department', department);

                const instrumentId = document.getElementById('GE_FOM_030__instrument_id').value;
                if (instrumentId) params.append('instrument_id', instrumentId);

                fetch(`/newforms/ge/room-temperature-humidity/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    // Update datalists
                    if (res.departments) {
                        updateFOM030Datalist('GE_FOM_030__department_list', res.departments);
                    }
                    if (res.instrument_ids) {
                        updateFOM030Datalist('GE_FOM_030__instrument_list', res.instrument_ids);
                    }

                    // Clear all inputs first
                    clearRoomTemperatureHumidityInputs();

                    // If data found, populate fields
                    if (res.success && res.data) {
                        const dailyData = res.data.daily_data || {};

                        for (const [key, value] of Object.entries(dailyData)) {
                            const el = document.getElementById('fom030_' + key);
                            if (el && value) el.value = value;
                        }
                    }
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function clearRoomTemperatureHumidityInputs() {
                for (let i = 1; i <= 31; i++) {
                    const morningHumidity = document.getElementById(`fom030_morning_humidity_${i}`);
                    const morningTemp = document.getElementById(`fom030_morning_temp_${i}`);
                    const morningSign = document.getElementById(`fom030_morning_sign_${i}`);
                    const eveningHumidity = document.getElementById(`fom030_evening_humidity_${i}`);
                    const eveningTemp = document.getElementById(`fom030_evening_temp_${i}`);
                    const eveningSign = document.getElementById(`fom030_evening_sign_${i}`);
                    if (morningHumidity) morningHumidity.value = '';
                    if (morningTemp) morningTemp.value = '';
                    if (morningSign) morningSign.value = '';
                    if (eveningHumidity) eveningHumidity.value = '';
                    if (eveningTemp) eveningTemp.value = '';
                    if (eveningSign) eveningSign.value = '';
                }
            }

            function clearRoomTemperatureHumidityForm() {
                document.getElementById('GE_FOM_030__month_year').value = '';
                document.getElementById('GE_FOM_030__department').value = '';
                document.getElementById('GE_FOM_030__instrument_id').value = '';
                clearRoomTemperatureHumidityInputs();
            }

            function updateFOM030Datalist(datalistId, values) {
                const datalist = document.getElementById(datalistId);
                if (!datalist) return;
                const existingOptions = Array.from(datalist.options).map(opt => opt.value);
                values.forEach(value => {
                    if (!existingOptions.includes(value)) {
                        const option = document.createElement('option');
                        option.value = value;
                        datalist.appendChild(option);
                    }
                });
            }

            // AJAX Submit for FOM-030
            (function() {
                function initRoomTemperatureHumidityForm() {
                    const formContainer = document.querySelector('[id="TDPL/GE/FOM-030"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn.textContent;

                        submitBtn.textContent = 'Saving...';
                        submitBtn.disabled = true;

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastFOM030('success', result.message || 'Saved successfully!');
                            } else {
                                showToastFOM030('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastFOM030('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                function showToastFOM030(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position: fixed; top: 20px; right: 20px; z-index: 9999;
                        padding: 15px 25px; border-radius: 5px; color: white;
                        font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.3);
                        background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initRoomTemperatureHumidityForm);
                } else {
                    initRoomTemperatureHumidityForm();
                }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-031"
        docNo="TDPL/GE/FOM-031"
        docName="Amendment Report Monitoring Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.ge.forms.submit') }}">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="GE_FOM_031__from_date"
                    onchange="loadAmendmentReportMonitoringData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="GE_FOM_031__to_date"
                    onchange="loadAmendmentReportMonitoringData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>Department</strong></label>
                <input type="text" name="department" id="GE_FOM_031__department" list="GE_FOM_031__department_list"
                    onchange="loadAmendmentReportMonitoringData()" onblur="loadAmendmentReportMonitoringData()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="GE_FOM_031__department_list">
                    <option value="Biochemistry">
                    <option value="Hematology">
                    <option value="Microbiology">
                    <option value="Pathology">
                    <option value="Immunology">
                </datalist>
            </div>
            <div>
                <label><strong>Location</strong></label>
                <input type="text" name="location" id="GE_FOM_031__location" list="GE_FOM_031__location_list"
                    onchange="loadAmendmentReportMonitoringData()" onblur="loadAmendmentReportMonitoringData()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="GE_FOM_031__location_list">
                    <option value="Main Lab">
                    <option value="Branch Lab 1">
                    <option value="Branch Lab 2">
                    <option value="Collection Center">
                </datalist>
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearAmendmentReportMonitoringFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Date</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Visit No.</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Parameter</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Reason for Amendment</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Amendment Done By</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Original Result</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Final Result in LIMS</td>
                </tr>
            </thead>
            <tbody id="GE_FOM_031__tbody">
                <!-- Empty row for new entry -->
                <tr>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="amendment_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="visit_no[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="parameter[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="amendment_reason[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="amendment_done_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="original_result[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="final_result_lims[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                </tr>
            </tbody>
        </table>

        <script>
            // Load Amendment Report Monitoring records based on date range filters
            function loadAmendmentReportMonitoringData() {
                const fromDate = document.getElementById('GE_FOM_031__from_date').value;
                const toDate = document.getElementById('GE_FOM_031__to_date').value;

                // At least one date filter required
                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                const department = document.getElementById('GE_FOM_031__department').value;
                if (department) params.append('department', department);

                const location = document.getElementById('GE_FOM_031__location').value;
                if (location) params.append('location', location);

                fetch(`/newforms/ge/amendment-report-monitoring/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    const tbody = document.getElementById('GE_FOM_031__tbody');
                    if (!tbody) return;

                    // Clear existing rows
                    tbody.innerHTML = '';

                    // Update datalists
                    if (res.departments) {
                        updateFOM031Datalist('GE_FOM_031__department_list', res.departments);
                    }
                    if (res.locations) {
                        updateFOM031Datalist('GE_FOM_031__location_list', res.locations);
                    }

                    // If no records found, add one empty row for new entry
                    if (!res.data || res.data.length === 0) {
                        addEmptyRowFOM031();
                        return;
                    }

                    // Add all loaded records
                    res.data.forEach((row, index) => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td style="border:1px solid #000; padding:4px;">
                                <input type="hidden" name="row_id[]" value="${row.id}">
                                <input type="date" name="amendment_date[]" value="${row.amendment_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #000; padding:4px;"><input name="visit_no[]" value="${row.visit_no || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="parameter[]" value="${row.parameter || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="amendment_reason[]" value="${row.amendment_reason || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="amendment_done_by[]" value="${row.amendment_done_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="original_result[]" value="${row.original_result || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="final_result_lims[]" value="${row.final_result_lims || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        `;
                        tbody.appendChild(tr);
                    });

                    // Add empty row BELOW loaded records
                    addEmptyRowFOM031();
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function clearAmendmentReportMonitoringForm() {
                const tbody = document.getElementById('GE_FOM_031__tbody');
                if (tbody) {
                    tbody.innerHTML = '';
                    // Add empty row for new entry
                    addEmptyRowFOM031();
                }
            }

            function addEmptyRowFOM031() {
                const tbody = document.getElementById('GE_FOM_031__tbody');
                if (!tbody) return;

                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="amendment_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="visit_no[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="parameter[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="amendment_reason[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="amendment_done_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="original_result[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="final_result_lims[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                `;
                tbody.appendChild(tr);
            }

            function clearAmendmentReportMonitoringFilters() {
                document.getElementById('GE_FOM_031__from_date').value = '';
                document.getElementById('GE_FOM_031__to_date').value = '';
                document.getElementById('GE_FOM_031__department').value = '';
                document.getElementById('GE_FOM_031__location').value = '';
                clearAmendmentReportMonitoringForm();
            }

            function updateFOM031Datalist(datalistId, values) {
                const datalist = document.getElementById(datalistId);
                if (!datalist) return;
                const existingOptions = Array.from(datalist.options).map(opt => opt.value);
                values.forEach(value => {
                    if (!existingOptions.includes(value)) {
                        const option = document.createElement('option');
                        option.value = value;
                        datalist.appendChild(option);
                    }
                });
            }

            // AJAX Submit for FOM-031
            (function() {
                function initAmendmentReportMonitoringForm() {
                    const formContainer = document.querySelector('[id="TDPL/GE/FOM-031"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn.textContent;

                        submitBtn.textContent = 'Saving...';
                        submitBtn.disabled = true;

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastFOM031('success', result.message || 'Saved successfully!');

                                // Display saved records directly from response
                                const tbody = document.getElementById('GE_FOM_031__tbody');
                                if (tbody && result.data && result.data.length > 0) {
                                    tbody.innerHTML = '';

                                    // Add all saved records
                                    result.data.forEach(row => {
                                        const tr = document.createElement('tr');
                                        tr.innerHTML = `
                                            <td style="border:1px solid #000; padding:4px;">
                                                <input type="hidden" name="row_id[]" value="${row.id}">
                                                <input type="date" name="amendment_date[]" value="${row.amendment_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                                            </td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="visit_no[]" value="${row.visit_no || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="parameter[]" value="${row.parameter || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="amendment_reason[]" value="${row.amendment_reason || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="amendment_done_by[]" value="${row.amendment_done_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="original_result[]" value="${row.original_result || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="final_result_lims[]" value="${row.final_result_lims || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                        `;
                                        tbody.appendChild(tr);
                                    });

                                    // Add empty row at end for new entry
                                    addEmptyRowFOM031();
                                }
                            } else {
                                showToastFOM031('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastFOM031('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                function showToastFOM031(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position: fixed; top: 20px; right: 20px; z-index: 9999;
                        padding: 15px 25px; border-radius: 5px; color: white;
                        font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.3);
                        background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initAmendmentReportMonitoringForm);
                } else {
                    initAmendmentReportMonitoringForm();
                }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-033"
        docNo="TDPL/GE/FOM-033"
        docName="Daily Preparation of 1% Sodium Hypochlorite Solution Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.ge.forms.submit') }}">

        <!-- Header Section -->
        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Month/Year:</strong>
                <input type="month" name="month_year" id="fom033_month_year"
                    style="border:1px solid #000; padding:4px;"
                    onchange="loadSodiumHypochloritePreparation()">
            </div>
            <div>
                <strong>Location:</strong>
                <input type="text" name="location" id="fom033_location" list="fom033_loc_list"
                    style="border:1px solid #000; padding:4px; width:200px;"
                    onchange="loadSodiumHypochloritePreparation()">
                <datalist id="fom033_loc_list">
                    <option value="Main Lab">
                    <option value="Branch Lab">
                    <option value="Collection Center">
                    <option value="Hospital Lab">
                    <option value="Clinic Lab">
                </datalist>
            </div>
            <div>
                <strong>Department:</strong>
                <input type="text" name="department" id="fom033_department" list="fom033_dept_list"
                    style="border:1px solid #000; padding:4px; width:200px;"
                    onchange="loadSodiumHypochloritePreparation()">
                <datalist id="fom033_dept_list">
                    <option value="Biochemistry">
                    <option value="Hematology">
                    <option value="Microbiology">
                    <option value="Pathology">
                    <option value="Immunology">
                </datalist>
            </div>
            <button type="button" onclick="clearSodiumHypochloritePreparation()"
                style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <table style="width:100%; border-collapse:collapse; border:1px solid #000;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:8px; width:60px;">Date</th>
                    <th style="border:1px solid #000; padding:8px;">Original Concentration</th>
                    <th style="border:1px solid #000; padding:8px;">Quantity Prepared</th>
                    <th style="border:1px solid #000; padding:8px;">Prepared By</th>
                    <th style="border:1px solid #000; padding:8px;">Verified By</th>
                </tr>
            </thead>

            <tbody>
                @for($i = 1; $i <= 31; $i++)
                <tr>
                    <td style="border:1px solid #000; padding:6px; text-align:center; font-weight:bold;">
                        {{ $i }}
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="original_concentration_{{ $i }}" id="fom033_original_concentration_{{ $i }}"
                            style="width:100%; border:1px solid #000; border-radius:6px; padding:5px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="quantity_prepared_{{ $i }}" id="fom033_quantity_prepared_{{ $i }}"
                            style="width:100%; border:1px solid #000; border-radius:6px; padding:5px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="prepared_by_{{ $i }}" id="fom033_prepared_by_{{ $i }}"
                            style="width:100%; border:1px solid #000; border-radius:6px; padding:5px;">
                    </td>

                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="verified_by_{{ $i }}" id="fom033_verified_by_{{ $i }}"
                            style="width:100%; border:1px solid #000; border-radius:6px; padding:5px;">
                    </td>
                </tr>
                @endfor
            </tbody>
        </table>

        <p style="margin-top:20px; font-weight:bold;">
            Take 5% Sodium Hypochlorite Solution: Mix 1 part with 4 parts of water
        </p>

        <script>
            function loadSodiumHypochloritePreparation() {
                const monthYear = document.getElementById('fom033_month_year').value;
                const location = document.getElementById('fom033_location').value;
                const department = document.getElementById('fom033_department').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('month_year', monthYear);
                if (location) params.append('location', location);
                if (department) params.append('department', department);

                fetch(`/newforms/ge/sodium-hypochlorite-preparation/load?${params.toString()}`)
                    .then(res => res.json())
                    .then(result => {
                        // Populate datalists
                        if (result.locations) {
                            const locList = document.getElementById('fom033_loc_list');
                            const currentOptions = ['Main Lab', 'Branch Lab', 'Collection Center', 'Hospital Lab', 'Clinic Lab'];
                            const allLocations = [...new Set([...currentOptions, ...result.locations])];
                            locList.innerHTML = allLocations.map(l => `<option value="${l}">`).join('');
                        }
                        if (result.departments) {
                            const deptList = document.getElementById('fom033_dept_list');
                            const currentOptions = ['Biochemistry', 'Hematology', 'Microbiology', 'Pathology', 'Immunology'];
                            const allDepts = [...new Set([...currentOptions, ...result.departments])];
                            deptList.innerHTML = allDepts.map(d => `<option value="${d}">`).join('');
                        }

                        // Clear all inputs first
                        clearSodiumHypochloriteInputs();

                        // If data found, populate fields
                        if (result.success && result.data && result.data.daily_data) {
                            const data = result.data.daily_data;
                            for (const [key, value] of Object.entries(data)) {
                                const el = document.getElementById('fom033_' + key);
                                if (el) el.value = value;
                            }
                        }
                    })
                    .catch(err => console.error('Load error:', err));
            }

            function clearSodiumHypochloriteInputs() {
                for (let i = 1; i <= 31; i++) {
                    const originalConc = document.getElementById(`fom033_original_concentration_${i}`);
                    const qtyPrepared = document.getElementById(`fom033_quantity_prepared_${i}`);
                    const preparedBy = document.getElementById(`fom033_prepared_by_${i}`);
                    const verifiedBy = document.getElementById(`fom033_verified_by_${i}`);
                    if (originalConc) originalConc.value = '';
                    if (qtyPrepared) qtyPrepared.value = '';
                    if (preparedBy) preparedBy.value = '';
                    if (verifiedBy) verifiedBy.value = '';
                }
            }

            function clearSodiumHypochloritePreparation() {
                document.getElementById('fom033_month_year').value = '';
                document.getElementById('fom033_location').value = '';
                document.getElementById('fom033_department').value = '';
                clearSodiumHypochloriteInputs();
            }

            // AJAX Submit for FOM-033
            (function() {
                function initSodiumHypochloriteForm() {
                    const formContainer = document.querySelector('[id="TDPL/GE/FOM-033"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastFOM033('success', result.message || 'Saved successfully!');
                            } else {
                                showToastFOM033('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastFOM033('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });

                        return false;
                    });
                }

                function showToastFOM033(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position: fixed; top: 20px; right: 20px; z-index: 9999;
                        padding: 15px 25px; border-radius: 5px; color: white;
                        font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.3);
                        background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initSodiumHypochloriteForm);
                } else {
                    initSodiumHypochloriteForm();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/GE/FOM-034"
        docNo="TDPL/GE/FOM-034"
        docName="Deep Freezer Temperature Monitoring Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.ge.forms.submit') }}">

        <!-- Header Section -->
        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Month/Year:</strong>
                <input type="month" name="month_year" id="fom034_month_year"
                    style="border:1px solid #000; padding:4px;"
                    onchange="loadDeepFreezerTemperature()">
            </div>
            <div>
                <strong>Department:</strong>
                <input type="text" name="department" id="fom034_department" list="fom034_dept_list"
                    style="border:1px solid #000; padding:4px; width:200px;"
                    onchange="loadDeepFreezerTemperature()">
                <datalist id="fom034_dept_list">
                    <option value="Biochemistry">
                    <option value="Hematology">
                    <option value="Microbiology">
                    <option value="Pathology">
                    <option value="Immunology">
                </datalist>
            </div>
            <div>
                <strong>Instrument ID/S. No.:</strong>
                <input type="text" name="instrument_id" id="fom034_instrument_id" list="fom034_inst_list"
                    style="border:1px solid #000; padding:4px; width:200px;"
                    onchange="loadDeepFreezerTemperature()">
                <datalist id="fom034_inst_list">
                    <option value="DF-001">
                    <option value="DF-002">
                    <option value="DF-003">
                    <option value="DF-004">
                    <option value="DF-005">
                </datalist>
            </div>
            <button type="button" onclick="clearDeepFreezerTemperature()"
                style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <table style="width:100%; border-collapse:collapse; border:1px solid #000;">
            <thead>
                <tr>
                    <th rowspan="2" style="border:1px solid #000; padding:8px; width:60px;">Date</th>
                    <th colspan="2" style="border:1px solid #000; padding:8px; text-align:center;">
                        Morning (9 - 10 AM)
                    </th>
                    <th colspan="2" style="border:1px solid #000; padding:8px; text-align:center;">
                        Evening (4 - 5 PM)
                    </th>
                </tr>
                <tr>
                    <th style="border:1px solid #000; padding:8px;">Temperature</th>
                    <th style="border:1px solid #000; padding:8px;">Signature</th>
                    <th style="border:1px solid #000; padding:8px;">Temperature</th>
                    <th style="border:1px solid #000; padding:8px;">Signature</th>
                </tr>
            </thead>

            <tbody>
                @for($i = 1; $i <= 31; $i++)
                <tr>
                    <td style="border:1px solid #000; padding:6px; text-align:center; font-weight:bold;">
                        {{ $i }}
                    </td>

                    <!-- Morning Temperature -->
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="morning_temp_{{ $i }}" id="fom034_morning_temp_{{ $i }}"
                            style="width:100%; border:1px solid #000; border-radius:6px; padding:5px;">
                    </td>

                    <!-- Morning Signature -->
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="morning_sign_{{ $i }}" id="fom034_morning_sign_{{ $i }}"
                            style="width:100%; border:1px solid #000; border-radius:6px; padding:5px;">
                    </td>

                    <!-- Evening Temperature -->
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="evening_temp_{{ $i }}" id="fom034_evening_temp_{{ $i }}"
                            style="width:100%; border:1px solid #000; border-radius:6px; padding:5px;">
                    </td>

                    <!-- Evening Signature -->
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="evening_sign_{{ $i }}" id="fom034_evening_sign_{{ $i }}"
                            style="width:100%; border:1px solid #000; border-radius:6px; padding:5px;">
                    </td>
                </tr>
                @endfor
            </tbody>
        </table>

        <p style="margin-top:20px; font-weight:bold;">
            Acceptable Temperature: -20˚C ± 2˚C
        </p>

        <script>
            function loadDeepFreezerTemperature() {
                const monthYear = document.getElementById('fom034_month_year').value;
                const department = document.getElementById('fom034_department').value;
                const instrumentId = document.getElementById('fom034_instrument_id').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('month_year', monthYear);
                if (department) params.append('department', department);
                if (instrumentId) params.append('instrument_id', instrumentId);

                fetch(`/newforms/ge/deep-freezer-temperature/load?${params.toString()}`)
                    .then(res => res.json())
                    .then(result => {
                        // Populate datalists
                        if (result.departments) {
                            const deptList = document.getElementById('fom034_dept_list');
                            const currentOptions = ['Biochemistry', 'Hematology', 'Microbiology', 'Pathology', 'Immunology'];
                            const allDepts = [...new Set([...currentOptions, ...result.departments])];
                            deptList.innerHTML = allDepts.map(d => `<option value="${d}">`).join('');
                        }
                        if (result.instrument_ids) {
                            const instList = document.getElementById('fom034_inst_list');
                            const currentOptions = ['DF-001', 'DF-002', 'DF-003', 'DF-004', 'DF-005'];
                            const allInst = [...new Set([...currentOptions, ...result.instrument_ids])];
                            instList.innerHTML = allInst.map(i => `<option value="${i}">`).join('');
                        }

                        // Clear all inputs first
                        clearDeepFreezerInputs();

                        // If data found, populate fields
                        if (result.success && result.data && result.data.daily_data) {
                            const data = result.data.daily_data;
                            for (const [key, value] of Object.entries(data)) {
                                const el = document.getElementById('fom034_' + key);
                                if (el) el.value = value;
                            }
                        }
                    })
                    .catch(err => console.error('Load error:', err));
            }

            function clearDeepFreezerInputs() {
                for (let i = 1; i <= 31; i++) {
                    const morningTemp = document.getElementById(`fom034_morning_temp_${i}`);
                    const morningSign = document.getElementById(`fom034_morning_sign_${i}`);
                    const eveningTemp = document.getElementById(`fom034_evening_temp_${i}`);
                    const eveningSign = document.getElementById(`fom034_evening_sign_${i}`);
                    if (morningTemp) morningTemp.value = '';
                    if (morningSign) morningSign.value = '';
                    if (eveningTemp) eveningTemp.value = '';
                    if (eveningSign) eveningSign.value = '';
                }
            }

            function clearDeepFreezerTemperature() {
                document.getElementById('fom034_month_year').value = '';
                document.getElementById('fom034_department').value = '';
                document.getElementById('fom034_instrument_id').value = '';
                clearDeepFreezerInputs();
            }

            // AJAX Submit for FOM-034
            (function() {
                function initDeepFreezerForm() {
                    const formContainer = document.querySelector('[id="TDPL/GE/FOM-034"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastFOM034('success', result.message || 'Saved successfully!');
                            } else {
                                showToastFOM034('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastFOM034('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });

                        return false;
                    });
                }

                function showToastFOM034(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position: fixed; top: 20px; right: 20px; z-index: 9999;
                        padding: 15px 25px; border-radius: 5px; color: white;
                        font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.3);
                        background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initDeepFreezerForm);
                } else {
                    initDeepFreezerForm();
                }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-035"
        docNo="TDPL/GE/FOM-035"
        docName="Corrective Action & Preventive Action Form for EQAS Outliers"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.ge.forms.submit') }}">

        <div style="background:#fff; padding:20px; border:1px solid #ccc; border-radius:8px;">

            <!-- Hidden record ID for editing -->
            <input type="hidden" name="record_id" id="fom035_record_id" value="">

            <!-- TOP SECTION / FILTERS -->
            <div style="margin-bottom:20px; display:flex; gap:15px; align-items:center; flex-wrap:wrap;">
                <div>
                    <label style="font-weight:bold;">Month/Year:</label>
                    <input type="month" name="month_year" id="fom035_month_year"
                        style="border:1px solid #000; padding:5px; width:150px;"
                        onchange="loadEqasCapaOutlier()">
                </div>
                <div>
                    <label style="font-weight:bold;">Department:</label>
                    <input type="text" name="department" id="fom035_department" list="fom035_dept_list"
                        style="border:1px solid #000; padding:5px; width:180px;"
                        onchange="loadEqasCapaOutlier()">
                    <datalist id="fom035_dept_list">
                        <option value="Biochemistry">
                        <option value="Hematology">
                        <option value="Microbiology">
                        <option value="Pathology">
                        <option value="Immunology">
                    </datalist>
                </div>
                <div>
                    <label style="font-weight:bold;">Location:</label>
                    <input type="text" name="location" id="fom035_location" list="fom035_loc_list"
                        style="border:1px solid #000; padding:5px; width:180px;"
                        onchange="loadEqasCapaOutlier()">
                    <datalist id="fom035_loc_list">
                        <option value="Main Lab">
                        <option value="Branch Lab 1">
                        <option value="Branch Lab 2">
                        <option value="Collection Center">
                    </datalist>
                </div>
                <button type="button" onclick="clearEqasCapaOutlierForm()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>

            <!-- SIMPLE INPUT FIELDS -->
            <div style="margin-bottom:12px;">
                <label style="font-weight:bold;">Date of Corrective Action Taken:</label><br>
                <input type="date" name="corrective_action_date" id="fom035_corrective_action_date"
                    style="border:1px solid #000; padding:5px; width:40%;">
            </div>

            <div style="margin-bottom:12px;">
                <label style="font-weight:bold;">Name of the Survey:</label><br>
                <input type="text" name="survey_name" id="fom035_survey_name"
                    style="border:1px solid #000; padding:5px; width:70%;">
            </div>

            <div style="margin-bottom:12px;">
                <label style="font-weight:bold;">Details of Samples:</label><br>
                <textarea name="sample_details" id="fom035_sample_details"
                    style="border:1px solid #000; padding:5px; width:80%; height:60px;"></textarea>
            </div>

            <div style="margin-bottom:12px;">
                <label style="font-weight:bold;">EQAS Sample Run Date:</label><br>
                <input type="date" name="sample_run_date" id="fom035_sample_run_date"
                    style="border:1px solid #000; padding:5px; width:40%;">
            </div>

            <div style="margin-bottom:12px;">
                <label style="font-weight:bold;">Outlier Results:</label><br>
                <textarea name="outlier_results" id="fom035_outlier_results"
                    style="border:1px solid #000; padding:5px; width:80%; height:60px;"></textarea>
            </div>

            <div style="margin-bottom:12px;">
                <label style="font-weight:bold;">EQAS Trends of last 2 cycles (if applicable):</label><br>
                <textarea name="eqas_trends" id="fom035_eqas_trends"
                    style="border:1px solid #000; padding:5px; width:80%; height:60px;"></textarea>
            </div>

            <div style="margin-bottom:20px;">
                <label style="font-weight:bold;">Root Cause Analysis (Summary):</label><br>
                <textarea name="root_cause_summary" id="fom035_root_cause_summary"
                    style="border:1px solid #000; padding:5px; width:80%; height:80px;"></textarea>
            </div>

            <!-- ROOT CAUSE TABLE -->
            <table style="width:100%; border-collapse:collapse; background:#fff; border:1px solid #ccc; border-radius:6px; overflow:hidden;">
                <thead>
                    <tr style="background:#f5f5f5;">
                        <th style="border:1px solid #ccc; padding:6px;">S. No.</th>
                        <th style="border:1px solid #ccc; padding:6px;">Root Cause Analysis</th>
                        <th style="border:1px solid #ccc; padding:6px;">Acceptable</th>
                        <th style="border:1px solid #ccc; padding:6px;">Unacceptable</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach([
                    'IQC Status',
                    'Preventive Maintenance Status',
                    'Calibration Status',
                    'Reagent Status',
                    'Clerical Error',
                    'Technical Problem',
                    'Problem with EQAS Samples'
                    ] as $index => $item)
                    <tr>
                        <td style="border:1px solid #ccc; padding:6px; text-align:center;">
                            {{ $index + 1 }}
                        </td>
                        <td style="border:1px solid #ccc; padding:6px;">
                            {{ $item }}
                        </td>
                        <td style="border:1px solid #ccc; padding:6px; text-align:center;">
                            <input type="checkbox" name="root_cause_{{ $index }}_acceptable" id="fom035_root_cause_{{ $index }}_acceptable">
                        </td>
                        <td style="border:1px solid #ccc; padding:6px; text-align:center;">
                            <input type="checkbox" name="root_cause_{{ $index }}_unacceptable" id="fom035_root_cause_{{ $index }}_unacceptable">
                        </td>
                    </tr>
                    @endforeach

                    <tr>
                        <td colspan="4" style="border:1px solid #ccc; padding:6px;">
                            Any Other (Please Specify):<br>
                            <textarea name="other_root_cause" id="fom035_other_root_cause"
                                style="border:1px solid #000; padding:5px; width:98%; height:60px;"></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- IMMEDIATE ACTION -->
            <div style="margin-top:25px;">
                <label style="font-weight:bold;">Immediate Action Taken, if any:</label><br>
                <textarea name="immediate_action" id="fom035_immediate_action"
                    style="border:1px solid #000; padding:5px; width:80%; height:80px;"></textarea>
            </div>

            <!-- RE-ASSAY TABLE -->
            <h3 style="margin-top:30px; font-weight:bold;">Summary of Re-Assayed Results</h3>

            <table style="width:100%; border-collapse:collapse; border:1px solid #ccc; background:#fff; border-radius:6px; overflow:hidden;">
                <thead>
                    <tr style="background:#f5f5f5;">
                        <th style="border:1px solid #ccc; padding:6px;">S. No.</th>
                        <th style="border:1px solid #ccc; padding:6px;">Analyte</th>
                        <th style="border:1px solid #ccc; padding:6px;">Previous Results</th>
                        <th style="border:1px solid #ccc; padding:6px;">Re-assayed Results / ILC Result</th>
                        <th style="border:1px solid #ccc; padding:6px;">Acceptability Limits / CV</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i = 1; $i <= 4; $i++)
                    <tr>
                        <td style="border:1px solid #ccc; padding:6px; text-align:center;">{{ $i }}</td>
                        <td style="border:1px solid #ccc; padding:6px;">
                            <input type="text" name="analyte_{{ $i }}" id="fom035_analyte_{{ $i }}"
                                style="width:95%; border:1px solid #000; padding:4px;">
                        </td>
                        <td style="border:1px solid #ccc; padding:6px;">
                            <input type="text" name="previous_result_{{ $i }}" id="fom035_previous_result_{{ $i }}"
                                style="width:95%; border:1px solid #000; padding:4px;">
                        </td>
                        <td style="border:1px solid #ccc; padding:6px;">
                            <input type="text" name="reassayed_result_{{ $i }}" id="fom035_reassayed_result_{{ $i }}"
                                style="width:95%; border:1px solid #000; padding:4px;">
                        </td>
                        <td style="border:1px solid #ccc; padding:6px;">
                            <input type="text" name="acceptability_limit_{{ $i }}" id="fom035_acceptability_limit_{{ $i }}"
                                style="width:95%; border:1px solid #000; padding:4px;">
                        </td>
                    </tr>
                    @endfor
                </tbody>
            </table>

            <!-- COMMENTS -->
            <div style="margin-top:25px;">
                <label style="font-weight:bold;">Comment on Re-Assayed Results:</label><br>
                <textarea name="reassay_comment" id="fom035_reassay_comment"
                    style="border:1px solid #000; padding:5px; width:80%; height:80px;"></textarea>
            </div>

            <div style="margin-top:25px;">
                <label style="font-weight:bold;">Preventive Action to Prevent Recurrence:</label><br>
                <textarea name="preventive_action" id="fom035_preventive_action"
                    style="border:1px solid #000; padding:5px; width:80%; height:80px;"></textarea>
            </div>

            <div style="margin-top:25px;">
                <label style="font-weight:bold;">Conclusion:</label>
                <select name="conclusion" id="fom035_conclusion" style="border:1px solid #000; padding:5px; width:300px; margin-left:10px;">
                    <option value="">-- Select --</option>
                    <option value="Clerical Error">1. Clerical Error</option>
                    <option value="Methodology Error">2. Methodology Error</option>
                    <option value="Technical Problem">3. Technical Problem</option>
                    <option value="Problem with EQAS Material">4. Problem with EQAS Material</option>
                    <option value="Others">5. Others (Specify)</option>
                </select>
            </div>

            <div style="margin-top:25px;">
                <label style="font-weight:bold;">Corrective Action Taken By:</label><br>
                <input type="text" name="action_taken_by" id="fom035_action_taken_by"
                    style="border:1px solid #000; padding:5px; width:60%;">
            </div>

            <div style="margin-top:15px;">
                <label style="font-weight:bold;">Corrective Action Reviewed/Approved By:</label><br>
                <input type="text" name="action_approved_by" id="fom035_action_approved_by"
                    style="border:1px solid #000; padding:5px; width:60%;">
            </div>

        </div>

        <script>
            function loadEqasCapaOutlier() {
                const monthYear = document.getElementById('fom035_month_year').value;
                const department = document.getElementById('fom035_department').value;
                const location = document.getElementById('fom035_location').value;

                if (!monthYear && !department && !location) return;

                const params = new URLSearchParams();
                if (monthYear) params.append('month_year', monthYear);
                if (department) params.append('department', department);
                if (location) params.append('location', location);

                fetch(`/newforms/ge/eqas-capa-outlier/load?${params.toString()}`)
                    .then(res => res.json())
                    .then(result => {
                        // Update datalists
                        if (result.departments) {
                            const deptList = document.getElementById('fom035_dept_list');
                            const currentOptions = ['Biochemistry', 'Hematology', 'Microbiology', 'Pathology', 'Immunology'];
                            const allDepts = [...new Set([...currentOptions, ...result.departments])];
                            deptList.innerHTML = allDepts.map(d => `<option value="${d}">`).join('');
                        }
                        if (result.locations) {
                            const locList = document.getElementById('fom035_loc_list');
                            const currentOptions = ['Main Lab', 'Branch Lab 1', 'Branch Lab 2', 'Collection Center'];
                            const allLocs = [...new Set([...currentOptions, ...result.locations])];
                            locList.innerHTML = allLocs.map(l => `<option value="${l}">`).join('');
                        }

                        // Clear form first
                        clearEqasCapaOutlierInputs();

                        // If data found, populate first record
                        if (result.success && result.data && result.data.length > 0) {
                            const data = result.data[0];
                            populateEqasCapaOutlierForm(data);
                        }
                    })
                    .catch(err => console.error('Load error:', err));
            }

            function populateEqasCapaOutlierForm(data) {
                document.getElementById('fom035_record_id').value = data.id || '';
                document.getElementById('fom035_corrective_action_date').value = data.corrective_action_date || '';
                document.getElementById('fom035_survey_name').value = data.survey_name || '';
                document.getElementById('fom035_sample_details').value = data.sample_details || '';
                document.getElementById('fom035_sample_run_date').value = data.sample_run_date || '';
                document.getElementById('fom035_outlier_results').value = data.outlier_results || '';
                document.getElementById('fom035_eqas_trends').value = data.eqas_trends || '';
                document.getElementById('fom035_root_cause_summary').value = data.root_cause_summary || '';
                document.getElementById('fom035_other_root_cause').value = data.other_root_cause || '';
                document.getElementById('fom035_immediate_action').value = data.immediate_action || '';
                document.getElementById('fom035_reassay_comment').value = data.reassay_comment || '';
                document.getElementById('fom035_preventive_action').value = data.preventive_action || '';
                document.getElementById('fom035_conclusion').value = data.conclusion || '';
                document.getElementById('fom035_action_taken_by').value = data.action_taken_by || '';
                document.getElementById('fom035_action_approved_by').value = data.action_approved_by || '';

                // Root cause checklist
                if (data.root_cause_checklist) {
                    const items = ['iqc_status', 'preventive_maintenance_status', 'calibration_status',
                        'reagent_status', 'clerical_error', 'technical_problem', 'eqas_sample_problem'];
                    items.forEach((item, index) => {
                        if (data.root_cause_checklist[item]) {
                            document.getElementById(`fom035_root_cause_${index}_acceptable`).checked = data.root_cause_checklist[item].acceptable || false;
                            document.getElementById(`fom035_root_cause_${index}_unacceptable`).checked = data.root_cause_checklist[item].unacceptable || false;
                        }
                    });
                }

                // Re-assay results
                if (data.reassay_results) {
                    for (let i = 1; i <= 4; i++) {
                        if (data.reassay_results[i]) {
                            document.getElementById(`fom035_analyte_${i}`).value = data.reassay_results[i].analyte || '';
                            document.getElementById(`fom035_previous_result_${i}`).value = data.reassay_results[i].previous_result || '';
                            document.getElementById(`fom035_reassayed_result_${i}`).value = data.reassay_results[i].reassayed_result || '';
                            document.getElementById(`fom035_acceptability_limit_${i}`).value = data.reassay_results[i].acceptability_limit || '';
                        }
                    }
                }
            }

            function clearEqasCapaOutlierInputs() {
                document.getElementById('fom035_record_id').value = '';
                document.getElementById('fom035_corrective_action_date').value = '';
                document.getElementById('fom035_survey_name').value = '';
                document.getElementById('fom035_sample_details').value = '';
                document.getElementById('fom035_sample_run_date').value = '';
                document.getElementById('fom035_outlier_results').value = '';
                document.getElementById('fom035_eqas_trends').value = '';
                document.getElementById('fom035_root_cause_summary').value = '';
                document.getElementById('fom035_other_root_cause').value = '';
                document.getElementById('fom035_immediate_action').value = '';
                document.getElementById('fom035_reassay_comment').value = '';
                document.getElementById('fom035_preventive_action').value = '';
                document.getElementById('fom035_conclusion').value = '';
                document.getElementById('fom035_action_taken_by').value = '';
                document.getElementById('fom035_action_approved_by').value = '';

                // Clear checkboxes
                for (let i = 0; i < 7; i++) {
                    document.getElementById(`fom035_root_cause_${i}_acceptable`).checked = false;
                    document.getElementById(`fom035_root_cause_${i}_unacceptable`).checked = false;
                }

                // Clear re-assay results
                for (let i = 1; i <= 4; i++) {
                    document.getElementById(`fom035_analyte_${i}`).value = '';
                    document.getElementById(`fom035_previous_result_${i}`).value = '';
                    document.getElementById(`fom035_reassayed_result_${i}`).value = '';
                    document.getElementById(`fom035_acceptability_limit_${i}`).value = '';
                }
            }

            function clearEqasCapaOutlierForm() {
                document.getElementById('fom035_month_year').value = '';
                document.getElementById('fom035_department').value = '';
                document.getElementById('fom035_location').value = '';
                clearEqasCapaOutlierInputs();
            }

            // AJAX Submit for FOM-035
            (function() {
                function initEqasCapaOutlierForm() {
                    const formContainer = document.querySelector('[id="TDPL/GE/FOM-035"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastFOM035('success', result.message || 'Saved successfully!');
                                // Update record_id if new record was created
                                if (result.data && result.data.id) {
                                    document.getElementById('fom035_record_id').value = result.data.id;
                                }
                            } else {
                                showToastFOM035('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastFOM035('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });

                        return false;
                    });
                }

                function showToastFOM035(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position: fixed; top: 20px; right: 20px; z-index: 9999;
                        padding: 15px 25px; border-radius: 5px; color: white;
                        font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.3);
                        background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initEqasCapaOutlierForm);
                } else {
                    initEqasCapaOutlierForm();
                }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-036"
        docNo="TDPL/GE/FOM-036"
        docName="Daily IQC Outlier Non-Conformity & Preventive Action Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.ge.forms.submit') }}">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="GE_FOM_036__from_date"
                    onchange="loadDailyIqcOutlierNcpaData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="GE_FOM_036__to_date"
                    onchange="loadDailyIqcOutlierNcpaData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>Department</strong></label>
                <input type="text" name="department" id="GE_FOM_036__department" list="GE_FOM_036__department_list"
                    onchange="loadDailyIqcOutlierNcpaData()" onblur="loadDailyIqcOutlierNcpaData()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="GE_FOM_036__department_list">
                    <option value="Biochemistry">
                    <option value="Hematology">
                    <option value="Microbiology">
                    <option value="Pathology">
                    <option value="Immunology">
                </datalist>
            </div>
            <div>
                <label><strong>Location</strong></label>
                <input type="text" name="location" id="GE_FOM_036__location" list="GE_FOM_036__location_list"
                    onchange="loadDailyIqcOutlierNcpaData()" onblur="loadDailyIqcOutlierNcpaData()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="GE_FOM_036__location_list">
                    <option value="Main Lab">
                    <option value="Branch Lab 1">
                    <option value="Branch Lab 2">
                    <option value="Collection Center">
                </datalist>
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearDailyIqcOutlierNcpaFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr style="background:#f5f5f5;">
                    <th style="border:1px solid #ccc; padding:6px; width:100px;">Date</th>
                    <th style="border:1px solid #ccc; padding:6px;">Outlier Parameter</th>
                    <th style="border:1px solid #ccc; padding:6px;">Non-Conformity Observed</th>
                    <th style="border:1px solid #ccc; padding:6px;">Root Cause Analysis</th>
                    <th style="border:1px solid #ccc; padding:6px;">Corrective Actions Taken</th>
                    <th style="border:1px solid #ccc; padding:6px;">Preventive Action Taken</th>
                    <th style="border:1px solid #ccc; padding:6px; width:100px;">Date of Closure</th>
                    <th style="border:1px solid #ccc; padding:6px; width:100px;">Signature</th>
                </tr>
            </thead>
            <tbody id="GE_FOM_036__tbody">
                <!-- Empty row for new entry -->
                <tr>
                    <td style="border:1px solid #ccc; padding:4px;"><input type="date" name="outlier_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #ccc; padding:4px;"><input name="outlier_parameter[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #ccc; padding:4px;"><textarea name="non_conformity[]" style="width:100%; border:1px solid #ccc; padding:4px; height:40px;"></textarea></td>
                    <td style="border:1px solid #ccc; padding:4px;"><textarea name="root_cause[]" style="width:100%; border:1px solid #ccc; padding:4px; height:40px;"></textarea></td>
                    <td style="border:1px solid #ccc; padding:4px;"><textarea name="corrective_action[]" style="width:100%; border:1px solid #ccc; padding:4px; height:40px;"></textarea></td>
                    <td style="border:1px solid #ccc; padding:4px;"><textarea name="preventive_action[]" style="width:100%; border:1px solid #ccc; padding:4px; height:40px;"></textarea></td>
                    <td style="border:1px solid #ccc; padding:4px;"><input type="date" name="closure_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #ccc; padding:4px;"><input name="signature[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                </tr>
            </tbody>
        </table>

        <script>
            // Load Daily IQC Outlier NCPA records based on date range filters
            function loadDailyIqcOutlierNcpaData() {
                const fromDate = document.getElementById('GE_FOM_036__from_date').value;
                const toDate = document.getElementById('GE_FOM_036__to_date').value;

                // At least one date filter required
                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                const department = document.getElementById('GE_FOM_036__department').value;
                if (department) params.append('department', department);

                const location = document.getElementById('GE_FOM_036__location').value;
                if (location) params.append('location', location);

                fetch(`/newforms/ge/daily-iqc-outlier-ncpa/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    const tbody = document.getElementById('GE_FOM_036__tbody');
                    if (!tbody) return;

                    // Clear existing rows
                    tbody.innerHTML = '';

                    // Update datalists
                    if (res.departments) {
                        updateFOM036Datalist('GE_FOM_036__department_list', res.departments);
                    }
                    if (res.locations) {
                        updateFOM036Datalist('GE_FOM_036__location_list', res.locations);
                    }

                    // If no records found, add one empty row for new entry
                    if (!res.data || res.data.length === 0) {
                        addEmptyRowFOM036();
                        return;
                    }

                    // Add all loaded records
                    res.data.forEach((row, index) => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td style="border:1px solid #ccc; padding:4px;">
                                <input type="hidden" name="row_id[]" value="${row.id}">
                                <input type="date" name="outlier_date[]" value="${row.outlier_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #ccc; padding:4px;"><input name="outlier_parameter[]" value="${row.outlier_parameter || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #ccc; padding:4px;"><textarea name="non_conformity[]" style="width:100%; border:1px solid #ccc; padding:4px; height:40px;">${row.non_conformity || ''}</textarea></td>
                            <td style="border:1px solid #ccc; padding:4px;"><textarea name="root_cause[]" style="width:100%; border:1px solid #ccc; padding:4px; height:40px;">${row.root_cause || ''}</textarea></td>
                            <td style="border:1px solid #ccc; padding:4px;"><textarea name="corrective_action[]" style="width:100%; border:1px solid #ccc; padding:4px; height:40px;">${row.corrective_action || ''}</textarea></td>
                            <td style="border:1px solid #ccc; padding:4px;"><textarea name="preventive_action[]" style="width:100%; border:1px solid #ccc; padding:4px; height:40px;">${row.preventive_action || ''}</textarea></td>
                            <td style="border:1px solid #ccc; padding:4px;"><input type="date" name="closure_date[]" value="${row.closure_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #ccc; padding:4px;"><input name="signature[]" value="${row.signature || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        `;
                        tbody.appendChild(tr);
                    });

                    // Add empty row BELOW loaded records
                    addEmptyRowFOM036();
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function clearDailyIqcOutlierNcpaForm() {
                const tbody = document.getElementById('GE_FOM_036__tbody');
                if (tbody) {
                    tbody.innerHTML = '';
                    // Add empty row for new entry
                    addEmptyRowFOM036();
                }
            }

            function addEmptyRowFOM036() {
                const tbody = document.getElementById('GE_FOM_036__tbody');
                if (!tbody) return;

                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td style="border:1px solid #ccc; padding:4px;"><input type="date" name="outlier_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #ccc; padding:4px;"><input name="outlier_parameter[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #ccc; padding:4px;"><textarea name="non_conformity[]" style="width:100%; border:1px solid #ccc; padding:4px; height:40px;"></textarea></td>
                    <td style="border:1px solid #ccc; padding:4px;"><textarea name="root_cause[]" style="width:100%; border:1px solid #ccc; padding:4px; height:40px;"></textarea></td>
                    <td style="border:1px solid #ccc; padding:4px;"><textarea name="corrective_action[]" style="width:100%; border:1px solid #ccc; padding:4px; height:40px;"></textarea></td>
                    <td style="border:1px solid #ccc; padding:4px;"><textarea name="preventive_action[]" style="width:100%; border:1px solid #ccc; padding:4px; height:40px;"></textarea></td>
                    <td style="border:1px solid #ccc; padding:4px;"><input type="date" name="closure_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #ccc; padding:4px;"><input name="signature[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                `;
                tbody.appendChild(tr);
            }

            function clearDailyIqcOutlierNcpaFilters() {
                document.getElementById('GE_FOM_036__from_date').value = '';
                document.getElementById('GE_FOM_036__to_date').value = '';
                document.getElementById('GE_FOM_036__department').value = '';
                document.getElementById('GE_FOM_036__location').value = '';
                clearDailyIqcOutlierNcpaForm();
            }

            function updateFOM036Datalist(datalistId, values) {
                const datalist = document.getElementById(datalistId);
                if (!datalist) return;
                const existingOptions = Array.from(datalist.options).map(opt => opt.value);
                values.forEach(value => {
                    if (!existingOptions.includes(value)) {
                        const option = document.createElement('option');
                        option.value = value;
                        datalist.appendChild(option);
                    }
                });
            }

            // AJAX Submit for FOM-036
            (function() {
                function initDailyIqcOutlierNcpaForm() {
                    const formContainer = document.querySelector('[id="TDPL/GE/FOM-036"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn.textContent;

                        submitBtn.textContent = 'Saving...';
                        submitBtn.disabled = true;

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastFOM036('success', result.message || 'Saved successfully!');

                                // Display saved records directly from response
                                const tbody = document.getElementById('GE_FOM_036__tbody');
                                if (tbody && result.data && result.data.length > 0) {
                                    tbody.innerHTML = '';

                                    // Add all saved records
                                    result.data.forEach(row => {
                                        const tr = document.createElement('tr');
                                        tr.innerHTML = `
                                            <td style="border:1px solid #ccc; padding:4px;">
                                                <input type="hidden" name="row_id[]" value="${row.id}">
                                                <input type="date" name="outlier_date[]" value="${row.outlier_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                                            </td>
                                            <td style="border:1px solid #ccc; padding:4px;"><input name="outlier_parameter[]" value="${row.outlier_parameter || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #ccc; padding:4px;"><textarea name="non_conformity[]" style="width:100%; border:1px solid #ccc; padding:4px; height:40px;">${row.non_conformity || ''}</textarea></td>
                                            <td style="border:1px solid #ccc; padding:4px;"><textarea name="root_cause[]" style="width:100%; border:1px solid #ccc; padding:4px; height:40px;">${row.root_cause || ''}</textarea></td>
                                            <td style="border:1px solid #ccc; padding:4px;"><textarea name="corrective_action[]" style="width:100%; border:1px solid #ccc; padding:4px; height:40px;">${row.corrective_action || ''}</textarea></td>
                                            <td style="border:1px solid #ccc; padding:4px;"><textarea name="preventive_action[]" style="width:100%; border:1px solid #ccc; padding:4px; height:40px;">${row.preventive_action || ''}</textarea></td>
                                            <td style="border:1px solid #ccc; padding:4px;"><input type="date" name="closure_date[]" value="${row.closure_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #ccc; padding:4px;"><input name="signature[]" value="${row.signature || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                        `;
                                        tbody.appendChild(tr);
                                    });

                                    // Add empty row at end for new entry
                                    addEmptyRowFOM036();
                                }
                            } else {
                                showToastFOM036('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastFOM036('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                function showToastFOM036(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position: fixed; top: 20px; right: 20px; z-index: 9999;
                        padding: 15px 25px; border-radius: 5px; color: white;
                        font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.3);
                        background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initDailyIqcOutlierNcpaForm);
                } else {
                    initDailyIqcOutlierNcpaForm();
                }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-037"
        docNo="TDPL/GE/FOM-037"
        docName="Authorized Persons on Software Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.ge.forms.submit') }}">

        <!-- Header Section -->
        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Month/Year:</strong>
                <input type="month" name="month_year" id="fom037_month_year"
                    style="border:1px solid #000; padding:4px;"
                    onchange="loadAuthorizedSoftwarePersons()">
            </div>
            <div>
                <strong>Location:</strong>
                <input type="text" name="location" id="fom037_location" list="fom037_loc_list"
                    style="border:1px solid #000; padding:4px; width:200px;"
                    onchange="loadAuthorizedSoftwarePersons()">
                <datalist id="fom037_loc_list">
                    <option value="Main Lab">
                    <option value="Branch Lab">
                    <option value="Collection Center">
                    <option value="Hospital Lab">
                    <option value="Clinic Lab">
                </datalist>
            </div>
            <div>
                <strong>Department:</strong>
                <input type="text" name="department" id="fom037_department" list="fom037_dept_list"
                    style="border:1px solid #000; padding:4px; width:200px;"
                    onchange="loadAuthorizedSoftwarePersons()">
                <datalist id="fom037_dept_list">
                    <option value="Biochemistry">
                    <option value="Hematology">
                    <option value="Microbiology">
                    <option value="Pathology">
                    <option value="Immunology">
                </datalist>
            </div>
            <button type="button" onclick="clearAuthorizedSoftwarePersons()"
                style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <table style="width:100%; border-collapse:collapse; border:1px solid #000;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; width:60px;">S. No.</th>
                    <th style="border:1px solid #000; padding:6px;">Software Name</th>
                    <th style="border:1px solid #000; padding:6px;">Authorized Person Name</th>
                    <th style="border:1px solid #000; padding:6px;">Signature</th>
                </tr>
            </thead>
            <tbody>
                @foreach(range(1,15) as $i)
                <tr>
                    <td style="border:1px solid #000; padding:6px; text-align:center; font-weight:bold;">{{ $i }}</td>
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="software_name_{{ $i }}" id="fom037_software_name_{{ $i }}"
                            style="width:100%; border:1px solid #ccc; padding:4px; border-radius:4px;">
                    </td>
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="authorized_person_{{ $i }}" id="fom037_authorized_person_{{ $i }}"
                            style="width:100%; border:1px solid #ccc; padding:4px; border-radius:4px;">
                    </td>
                    <td style="border:1px solid #000; padding:6px;">
                        <input type="text" name="signature_{{ $i }}" id="fom037_signature_{{ $i }}"
                            style="width:100%; border:1px solid #ccc; padding:4px; border-radius:4px;">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <script>
            function loadAuthorizedSoftwarePersons() {
                const monthYear = document.getElementById('fom037_month_year').value;
                const location = document.getElementById('fom037_location').value;
                const department = document.getElementById('fom037_department').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('month_year', monthYear);
                if (location) params.append('location', location);
                if (department) params.append('department', department);

                fetch(`/newforms/ge/authorized-software-persons/load?${params.toString()}`)
                    .then(res => res.json())
                    .then(result => {
                        // Populate datalists
                        if (result.locations) {
                            const locList = document.getElementById('fom037_loc_list');
                            const currentOptions = ['Main Lab', 'Branch Lab', 'Collection Center', 'Hospital Lab', 'Clinic Lab'];
                            const allLocations = [...new Set([...currentOptions, ...result.locations])];
                            locList.innerHTML = allLocations.map(l => `<option value="${l}">`).join('');
                        }
                        if (result.departments) {
                            const deptList = document.getElementById('fom037_dept_list');
                            const currentOptions = ['Biochemistry', 'Hematology', 'Microbiology', 'Pathology', 'Immunology'];
                            const allDepts = [...new Set([...currentOptions, ...result.departments])];
                            deptList.innerHTML = allDepts.map(d => `<option value="${d}">`).join('');
                        }

                        // Clear all inputs first
                        clearAuthorizedSoftwareInputs();

                        // If data found, populate fields
                        if (result.success && result.data && result.data.daily_data) {
                            const data = result.data.daily_data;
                            for (const [key, value] of Object.entries(data)) {
                                const el = document.getElementById('fom037_' + key);
                                if (el) el.value = value;
                            }
                        }
                    })
                    .catch(err => console.error('Load error:', err));
            }

            function clearAuthorizedSoftwareInputs() {
                for (let i = 1; i <= 15; i++) {
                    const softwareName = document.getElementById(`fom037_software_name_${i}`);
                    const authorizedPerson = document.getElementById(`fom037_authorized_person_${i}`);
                    const signature = document.getElementById(`fom037_signature_${i}`);
                    if (softwareName) softwareName.value = '';
                    if (authorizedPerson) authorizedPerson.value = '';
                    if (signature) signature.value = '';
                }
            }

            function clearAuthorizedSoftwarePersons() {
                document.getElementById('fom037_month_year').value = '';
                document.getElementById('fom037_location').value = '';
                document.getElementById('fom037_department').value = '';
                clearAuthorizedSoftwareInputs();
            }

            // AJAX Submit for FOM-037
            (function() {
                function initAuthorizedSoftwarePersonsForm() {
                    const formContainer = document.querySelector('[id="TDPL/GE/FOM-037"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn ? submitBtn.textContent : 'Submit';

                        if (submitBtn) {
                            submitBtn.textContent = 'Saving...';
                            submitBtn.disabled = true;
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastFOM037('success', result.message || 'Saved successfully!');
                            } else {
                                showToastFOM037('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastFOM037('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });

                        return false;
                    });
                }

                function showToastFOM037(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position: fixed; top: 20px; right: 20px; z-index: 9999;
                        padding: 15px 25px; border-radius: 5px; color: white;
                        font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.3);
                        background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initAuthorizedSoftwarePersonsForm);
                } else {
                    initAuthorizedSoftwarePersonsForm();
                }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-038"
        docNo="TDPL/GE/FOM-038"
        docName="Authorized Personnel for Handling the Instruments Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <!-- Filter Row -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:center; flex-wrap:wrap;">
            <div>
                <label><strong>Month/Year:</strong></label>
                <input type="month" id="fom038_month_year" name="month_year"
                    style="border:1px solid #ccc; padding:4px; border-radius:4px;"
                    onchange="loadFOM038Records()">
            </div>
            <div>
                <label><strong>Department:</strong></label>
                <input type="text" id="fom038_department" name="department" list="fom038_department_list"
                    style="border:1px solid #ccc; padding:4px; border-radius:4px;"
                    onchange="loadFOM038Records()">
                <datalist id="fom038_department_list"></datalist>
            </div>
            <div>
                <label><strong>Location:</strong></label>
                <input type="text" id="fom038_location" name="location" list="fom038_location_list"
                    style="border:1px solid #ccc; padding:4px; border-radius:4px;"
                    onchange="loadFOM038Records()">
                <datalist id="fom038_location_list"></datalist>
            </div>
            <div>
                <button type="button" onclick="clearFOM038Form()"
                    style="background-color:#dc3545; color:white; border:none; padding:6px 15px; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <table style="width:100%; border-collapse: collapse;" border="1">
            <tbody>
                <tr>
                    <td style="padding:6px; font-weight:bold;">S. No.</td>
                    <td style="padding:6px; font-weight:bold;">Employee Name</td>
                    <td style="padding:6px; font-weight:bold;">Instruments authorized to handle</td>
                    <td style="padding:6px; font-weight:bold;">Designation</td>
                    <td style="padding:6px; font-weight:bold;">Signature</td>
                </tr>

                @for($i = 1; $i <= 30; $i++)
                    <tr>
                    <td style="padding:6px; text-align:center;">{{ $i }}</td>

                    <td style="padding:6px;">
                        <input type="text" id="fom038_employee_name_{{ $i }}" name="employee_name_{{ $i }}"
                            style="width:100%; border:none; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" id="fom038_instruments_{{ $i }}" name="instruments_{{ $i }}"
                            style="width:100%; border:none; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" id="fom038_designation_{{ $i }}" name="designation_{{ $i }}"
                            style="width:100%; border:none; outline:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" id="fom038_signature_{{ $i }}" name="signature_{{ $i }}"
                            style="width:100%; border:none; outline:none;">
                    </td>
                    </tr>
                @endfor
            </tbody>
        </table>

        <script>
            // Load records on page load for datalists
            document.addEventListener('DOMContentLoaded', function() {
                loadFOM038Records();
            });

            function loadFOM038Records() {
                const monthYear = document.getElementById('fom038_month_year').value;
                const department = document.getElementById('fom038_department').value;
                const location = document.getElementById('fom038_location').value;

                let url = '/newforms/ge/authorized-instrument-personnel/load?';
                if (monthYear) url += 'month_year=' + encodeURIComponent(monthYear) + '&';
                if (department) url += 'department=' + encodeURIComponent(department) + '&';
                if (location) url += 'location=' + encodeURIComponent(location);

                fetch(url)
                    .then(response => response.json())
                    .then(result => {
                        // Populate datalists
                        if (result.departments) {
                            let deptList = document.getElementById('fom038_department_list');
                            deptList.innerHTML = '';
                            result.departments.forEach(d => {
                                let opt = document.createElement('option');
                                opt.value = d;
                                deptList.appendChild(opt);
                            });
                        }
                        if (result.locations) {
                            let locList = document.getElementById('fom038_location_list');
                            locList.innerHTML = '';
                            result.locations.forEach(l => {
                                let opt = document.createElement('option');
                                opt.value = l;
                                locList.appendChild(opt);
                            });
                        }

                        // Clear form fields first
                        for (let i = 1; i <= 30; i++) {
                            document.getElementById('fom038_employee_name_' + i).value = '';
                            document.getElementById('fom038_instruments_' + i).value = '';
                            document.getElementById('fom038_designation_' + i).value = '';
                            document.getElementById('fom038_signature_' + i).value = '';
                        }

                        // Populate form if data exists
                        if (result.success && result.data && result.data.daily_data) {
                            const data = result.data.daily_data;
                            for (let i = 1; i <= 30; i++) {
                                if (data['employee_name_' + i]) {
                                    document.getElementById('fom038_employee_name_' + i).value = data['employee_name_' + i];
                                }
                                if (data['instruments_' + i]) {
                                    document.getElementById('fom038_instruments_' + i).value = data['instruments_' + i];
                                }
                                if (data['designation_' + i]) {
                                    document.getElementById('fom038_designation_' + i).value = data['designation_' + i];
                                }
                                if (data['signature_' + i]) {
                                    document.getElementById('fom038_signature_' + i).value = data['signature_' + i];
                                }
                            }
                        }
                    })
                    .catch(error => console.error('Error loading FOM-038:', error));
            }

            function clearFOM038Form() {
                document.getElementById('fom038_month_year').value = '';
                document.getElementById('fom038_department').value = '';
                document.getElementById('fom038_location').value = '';

                for (let i = 1; i <= 30; i++) {
                    document.getElementById('fom038_employee_name_' + i).value = '';
                    document.getElementById('fom038_instruments_' + i).value = '';
                    document.getElementById('fom038_designation_' + i).value = '';
                    document.getElementById('fom038_signature_' + i).value = '';
                }
            }

            // AJAX form submission
            (function() {
                const form = document.querySelector('#TDPL\\/GE\\/FOM-038 form') ||
                             document.getElementById('TDPL/GE/FOM-038')?.querySelector('form');
                if (form) {
                    form.addEventListener('submit', function(e) {
                        e.preventDefault();

                        const monthYear = document.getElementById('fom038_month_year').value;
                        if (!monthYear) {
                            showToast('Please select Month/Year', 'error');
                            return;
                        }

                        const formData = new FormData(form);

                        fetch('/newforms/ge/forms/submit', {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToast(result.message || 'Form saved successfully', 'success');
                                loadFOM038Records();
                            } else {
                                showToast(result.message || 'Error saving form', 'error');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToast('Error saving form', 'error');
                        });
                    });
                }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-039"
        docNo="TDPL/GE/FOM-039"
        docName="Minutes of Meeting"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <!-- Filter Row -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:center; flex-wrap:wrap;">
            <div>
                <label><strong>Meeting Date:</strong></label>
                <input type="date" id="fom039_meeting_date" name="meeting_date"
                    style="border:1px solid #ccc; padding:4px; border-radius:4px;"
                    onchange="loadFOM039Records()">
            </div>
            <div>
                <button type="button" onclick="clearFOM039Form()"
                    style="background-color:#dc3545; color:white; border:none; padding:6px 15px; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <div style="background:#ffffff; padding:20px; border-radius:10px; font-size:14px; width:100%; box-sizing:border-box; border:1px solid #ddd;">

            <table style="width:100%; border-collapse: collapse;">
                <tbody>

                    <!-- Header -->
                    <tr>
                        <td></td>
                        <td colspan="6" style="text-align:center; font-weight:bold; padding:10px;">MINUTES OF MEETING</td>
                    </tr>

                    <!-- Present / Absent / Date -->
                    <tr>
                        <td colspan="3" style="font-weight:bold;">Present</td>
                        <td colspan="2" style="font-weight:bold;">Absent (include reason)</td>
                        <td colspan="2" style="font-weight:bold;">Details:</td>
                    </tr>

                    <tr>
                        <!-- Present names -->
                        <td colspan="3" style="border:1px solid #ddd; padding:8px; border-radius:6px;">
                            @for($i=1;$i <= 3;$i++)
                                <p><input type="text" id="fom039_present_name_{{ $i }}" name="present_name_{{ $i }}" placeholder="Name" style="width:95%; padding:6px; border:1px solid #ccc; border-radius:5px;"></p>
                            @endfor
                        </td>

                        <!-- Absent list -->
                        <td colspan="2" style="border:1px solid #ddd; padding:8px; border-radius:6px;">
                            @for($i=1;$i <= 2;$i++)
                                <p>
                                <input type="text" id="fom039_absent_name_{{ $i }}" name="absent_name_{{ $i }}" placeholder="Name" style="width:45%; padding:6px; border:1px solid #ccc; border-radius:5px;">
                                –
                                <input type="text" id="fom039_absent_reason_{{ $i }}" name="absent_reason_{{ $i }}" placeholder="Reason" style="width:45%; padding:6px; border:1px solid #ccc; border-radius:5px;">
                                </p>
                            @endfor
                        </td>

                        <!-- Venue / Time -->
                        <td colspan="2" style="border:1px solid #ddd; padding:10px; border-radius:6px;">
                            <p>Venue: <input type="text" id="fom039_venue" name="venue" style="width:70%; padding:6px; border-radius:5px; border:1px solid #ccc;"></p>
                            <p>Start Time: <input type="time" id="fom039_start_time" name="start_time" style="width:60%; padding:6px; border-radius:5px; border:1px solid #ccc;"></p>
                            <p>End Time: <input type="time" id="fom039_end_time" name="end_time" style="width:60%; padding:6px; border-radius:5px; border:1px solid #ccc;"></p>
                        </td>
                    </tr>

                    <!-- Agenda Header -->
                    <tr>
                        <td style="font-weight:bold; padding:8px;">S. No.</td>
                        <td colspan="6" style="font-weight:bold; padding:8px;">Agenda</td>
                    </tr>

                    <!-- Previous Meeting Review -->
                    <tr>
                        <td rowspan="7" style="text-align:center; font-weight:bold; padding:10px;">1</td>
                        <td colspan="6" style="font-weight:bold; padding:10px;">Review from Previous Meeting – Action Plan</td>
                    </tr>

                    <tr>
                        <td colspan="6" style="font-weight:bold;"><em>Action Plan & Responsibilities:</em></td>
                    </tr>

                    <!-- Header Row -->
                    <tr>
                        <td style="font-weight:bold;">Action</td>
                        <td colspan="2" style="font-weight:bold;">Responsible Person</td>
                        <td colspan="2" style="font-weight:bold;">Target Date</td>
                        <td style="font-weight:bold;">Status</td>
                    </tr>

                    <!-- Previous Meeting Action Rows -->
                    @for($i=1;$i <= 4;$i++)
                        <tr>
                        <td><input type="text" id="fom039_prev_action_{{ $i }}" name="prev_action_{{ $i }}" style="width:95%; padding:6px; border-radius:5px; border:1px solid #ccc;"></td>
                        <td colspan="2"><input type="text" id="fom039_prev_responsible_{{ $i }}" name="prev_responsible_{{ $i }}" style="width:95%; padding:6px; border-radius:5px; border:1px solid #ccc;"></td>
                        <td colspan="2"><input type="date" id="fom039_prev_target_date_{{ $i }}" name="prev_target_date_{{ $i }}" style="width:95%; padding:6px; border-radius:5px; border:1px solid #ccc;"></td>
                        <td><input type="text" id="fom039_prev_status_{{ $i }}" name="prev_status_{{ $i }}" style="width:95%; padding:6px; border-radius:5px; border:1px solid #ccc;"></td>
                        </tr>
                    @endfor

                    <!-- Present Meeting Section -->
                    <tr>
                        <td rowspan="9" style="text-align:center; font-weight:bold; padding:10px;">2</td>
                        <td colspan="6" style="font-weight:bold; padding:10px;">Present Meeting</td>
                    </tr>

                    <tr>
                        <td colspan="6">
                            <p style="font-weight:bold;"><em>Summary of Discussions & Key Points:</em></p>
                            <textarea id="fom039_summary_discussions" name="summary_discussions" style="width:98%; height:120px; padding:6px; border-radius:6px; border:1px solid #ccc;"></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="6">
                            <p style="font-weight:bold;"><em>Decisions Made:</em></p>
                            <textarea id="fom039_decisions_made" name="decisions_made" style="width:98%; height:120px; padding:6px; border-radius:6px; border:1px solid #ccc;"></textarea>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="6" style="font-weight:bold;"><em>Action Plan & Responsibilities:</em></td>
                    </tr>

                    <!-- Header Row -->
                    <tr>
                        <td style="font-weight:bold;">Action</td>
                        <td colspan="2" style="font-weight:bold;">Responsible Person</td>
                        <td colspan="2" style="font-weight:bold;">Target Date</td>
                        <td style="font-weight:bold;">Status</td>
                    </tr>

                    <!-- Present Meeting Action Rows -->
                    @for($i=1;$i <= 4;$i++)
                        <tr>
                        <td><input type="text" id="fom039_curr_action_{{ $i }}" name="curr_action_{{ $i }}" style="width:95%; padding:6px; border-radius:5px; border:1px solid #ccc;"></td>
                        <td colspan="2"><input type="text" id="fom039_curr_responsible_{{ $i }}" name="curr_responsible_{{ $i }}" style="width:95%; padding:6px; border-radius:5px; border:1px solid #ccc;"></td>
                        <td colspan="2"><input type="date" id="fom039_curr_target_date_{{ $i }}" name="curr_target_date_{{ $i }}" style="width:95%; padding:6px; border-radius:5px; border:1px solid #ccc;"></td>
                        <td><input type="text" id="fom039_curr_status_{{ $i }}" name="curr_status_{{ $i }}" style="width:95%; padding:6px; border-radius:5px; border:1px solid #ccc;"></td>
                        </tr>
                    @endfor

                </tbody>
            </table>

            <!-- Conclusion Section -->
            <h2 style="margin-top:20px;"><strong>Conclusion</strong></h2>

            <p>
                Overall Performance:
                <label><input type="checkbox" id="fom039_satisfactory" name="satisfactory"> Satisfactory</label>
                &nbsp;&nbsp;
                <label><input type="checkbox" id="fom039_needs_improvement" name="needs_improvement"> Needs Improvement</label>
            </p>

            <p>Additional remarks:
                <input type="text" id="fom039_additional_remarks" name="additional_remarks" style="width:60%; padding:6px; border-radius:5px; border:1px solid #ccc;">
            </p>

            <p>Next review scheduled on:
                <input type="date" id="fom039_next_review_date" name="next_review_date" style="padding:6px; border-radius:5px; border:1px solid #ccc;">
            </p>

            <!-- Signatures -->
            <h2 style="margin-top:20px;"><strong>Signatures</strong></h2>

            <p>
                Chairperson: <input type="text" id="fom039_chairperson_name" name="chairperson_name" style="width:40%; padding:6px; border-radius:5px; border:1px solid #ccc;">
                Date: <input type="date" id="fom039_chairperson_date" name="chairperson_date" style="padding:6px; border-radius:5px; border:1px solid #ccc;">
            </p>

            <p>
                Recorder: <input type="text" id="fom039_recorder_name" name="recorder_name" style="width:40%; padding:6px; border-radius:5px; border:1px solid #ccc;">
                Date: <input type="date" id="fom039_recorder_date" name="recorder_date" style="padding:6px; border-radius:5px; border:1px solid #ccc;">
            </p>

        </div>

        <script>
            function loadFOM039Records() {
                const meetingDate = document.getElementById('fom039_meeting_date').value;
                if (!meetingDate) return;

                fetch('/newforms/ge/minutes-of-meeting/load?meeting_date=' + encodeURIComponent(meetingDate))
                    .then(response => response.json())
                    .then(result => {
                        // Clear form first
                        clearFOM039FormFields();

                        if (result.success && result.data) {
                            const data = result.data;

                            // Populate basic fields
                            if (data.venue) document.getElementById('fom039_venue').value = data.venue;
                            if (data.start_time) document.getElementById('fom039_start_time').value = data.start_time;
                            if (data.end_time) document.getElementById('fom039_end_time').value = data.end_time;
                            if (data.summary_discussions) document.getElementById('fom039_summary_discussions').value = data.summary_discussions;
                            if (data.decisions_made) document.getElementById('fom039_decisions_made').value = data.decisions_made;
                            if (data.additional_remarks) document.getElementById('fom039_additional_remarks').value = data.additional_remarks;
                            if (data.next_review_date) document.getElementById('fom039_next_review_date').value = data.next_review_date.split('T')[0];
                            if (data.chairperson_name) document.getElementById('fom039_chairperson_name').value = data.chairperson_name;
                            if (data.chairperson_date) document.getElementById('fom039_chairperson_date').value = data.chairperson_date.split('T')[0];
                            if (data.recorder_name) document.getElementById('fom039_recorder_name').value = data.recorder_name;
                            if (data.recorder_date) document.getElementById('fom039_recorder_date').value = data.recorder_date.split('T')[0];

                            // Overall performance checkboxes
                            if (data.overall_performance === 'Satisfactory') {
                                document.getElementById('fom039_satisfactory').checked = true;
                            } else if (data.overall_performance === 'Needs Improvement') {
                                document.getElementById('fom039_needs_improvement').checked = true;
                            }

                            // Present attendees
                            if (data.present_attendees) {
                                for (let i = 0; i < data.present_attendees.length && i < 3; i++) {
                                    if (data.present_attendees[i]) {
                                        document.getElementById('fom039_present_name_' + (i+1)).value = data.present_attendees[i];
                                    }
                                }
                            }

                            // Absent attendees
                            if (data.absent_attendees) {
                                for (let i = 0; i < data.absent_attendees.length && i < 2; i++) {
                                    if (data.absent_attendees[i]) {
                                        if (data.absent_attendees[i].name) {
                                            document.getElementById('fom039_absent_name_' + (i+1)).value = data.absent_attendees[i].name;
                                        }
                                        if (data.absent_attendees[i].reason) {
                                            document.getElementById('fom039_absent_reason_' + (i+1)).value = data.absent_attendees[i].reason;
                                        }
                                    }
                                }
                            }

                            // Previous meeting actions
                            if (data.previous_meeting_actions) {
                                for (let i = 0; i < data.previous_meeting_actions.length && i < 4; i++) {
                                    const action = data.previous_meeting_actions[i];
                                    if (action) {
                                        if (action.action) document.getElementById('fom039_prev_action_' + (i+1)).value = action.action;
                                        if (action.responsible_person) document.getElementById('fom039_prev_responsible_' + (i+1)).value = action.responsible_person;
                                        if (action.target_date) document.getElementById('fom039_prev_target_date_' + (i+1)).value = action.target_date;
                                        if (action.status) document.getElementById('fom039_prev_status_' + (i+1)).value = action.status;
                                    }
                                }
                            }

                            // Present meeting actions
                            if (data.present_meeting_actions) {
                                for (let i = 0; i < data.present_meeting_actions.length && i < 4; i++) {
                                    const action = data.present_meeting_actions[i];
                                    if (action) {
                                        if (action.action) document.getElementById('fom039_curr_action_' + (i+1)).value = action.action;
                                        if (action.responsible_person) document.getElementById('fom039_curr_responsible_' + (i+1)).value = action.responsible_person;
                                        if (action.target_date) document.getElementById('fom039_curr_target_date_' + (i+1)).value = action.target_date;
                                        if (action.status) document.getElementById('fom039_curr_status_' + (i+1)).value = action.status;
                                    }
                                }
                            }
                        }
                    })
                    .catch(error => console.error('Error loading FOM-039:', error));
            }

            function clearFOM039FormFields() {
                // Basic fields
                document.getElementById('fom039_venue').value = '';
                document.getElementById('fom039_start_time').value = '';
                document.getElementById('fom039_end_time').value = '';
                document.getElementById('fom039_summary_discussions').value = '';
                document.getElementById('fom039_decisions_made').value = '';
                document.getElementById('fom039_additional_remarks').value = '';
                document.getElementById('fom039_next_review_date').value = '';
                document.getElementById('fom039_chairperson_name').value = '';
                document.getElementById('fom039_chairperson_date').value = '';
                document.getElementById('fom039_recorder_name').value = '';
                document.getElementById('fom039_recorder_date').value = '';
                document.getElementById('fom039_satisfactory').checked = false;
                document.getElementById('fom039_needs_improvement').checked = false;

                // Present attendees
                for (let i = 1; i <= 3; i++) {
                    document.getElementById('fom039_present_name_' + i).value = '';
                }

                // Absent attendees
                for (let i = 1; i <= 2; i++) {
                    document.getElementById('fom039_absent_name_' + i).value = '';
                    document.getElementById('fom039_absent_reason_' + i).value = '';
                }

                // Previous meeting actions
                for (let i = 1; i <= 4; i++) {
                    document.getElementById('fom039_prev_action_' + i).value = '';
                    document.getElementById('fom039_prev_responsible_' + i).value = '';
                    document.getElementById('fom039_prev_target_date_' + i).value = '';
                    document.getElementById('fom039_prev_status_' + i).value = '';
                }

                // Present meeting actions
                for (let i = 1; i <= 4; i++) {
                    document.getElementById('fom039_curr_action_' + i).value = '';
                    document.getElementById('fom039_curr_responsible_' + i).value = '';
                    document.getElementById('fom039_curr_target_date_' + i).value = '';
                    document.getElementById('fom039_curr_status_' + i).value = '';
                }
            }

            function clearFOM039Form() {
                document.getElementById('fom039_meeting_date').value = '';
                clearFOM039FormFields();
            }

            // AJAX form submission
            (function() {
                const form = document.querySelector('#TDPL\\/GE\\/FOM-039 form') ||
                             document.getElementById('TDPL/GE/FOM-039')?.querySelector('form');
                if (form) {
                    form.addEventListener('submit', function(e) {
                        e.preventDefault();

                        const meetingDate = document.getElementById('fom039_meeting_date').value;
                        if (!meetingDate) {
                            showToast('Please select Meeting Date', 'error');
                            return;
                        }

                        const formData = new FormData(form);

                        fetch('/newforms/ge/forms/submit', {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToast(result.message || 'Form saved successfully', 'success');
                                loadFOM039Records();
                            } else {
                                showToast(result.message || 'Error saving form', 'error');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToast('Error saving form', 'error');
                        });
                    });
                }
            })();
        </script>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-040"
        docNo="TDPL/GE/FOM-040"
        docName="Test Requisition Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">

        <!-- Filter Row -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:center; flex-wrap:wrap;">
            <div>
                <label><strong>From Date:</strong></label>
                <input type="date" id="fom040_from_date"
                    style="border:1px solid #ccc; padding:4px; border-radius:4px;"
                    onchange="loadFOM040Records()">
            </div>
            <div>
                <label><strong>To Date:</strong></label>
                <input type="date" id="fom040_to_date"
                    style="border:1px solid #ccc; padding:4px; border-radius:4px;"
                    onchange="loadFOM040Records()">
            </div>
            <div>
                <button type="button" onclick="clearFOM040Form()"
                    style="background-color:#dc3545; color:white; border:none; padding:6px 15px; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- Hidden field for record ID (for inline edit) -->
        <input type="hidden" id="fom040_record_id" name="test_requisition_form_id">

        <div style="background:#ffffff; padding:20px; border-radius:12px; border:1px solid #ccc; font-size:14px; width:100%; box-sizing:border-box;">

            <!-- Header Contact Info -->
            <p>Email: <a href="mailto:customercare@mytrustlab.com">customercare@mytrustlab.com</a></p>
            <p>Toll Free: 1800 599 5656 <a href="http://www.mytrustlab.com/">www.mytrustlab.com</a></p>
            <p>+91 90146 38633</p>

            <h3 style="margin-top:15px;">TEST REQUISITION FORM</h3>

            <!-- Basic Details -->
            <p>
                <strong>Requisition Date:</strong>
                <input type="date" id="fom040_requisition_date" name="requisition_date" style="padding:5px; border-radius:6px; border:1px solid #ccc;">
            </p>

            <p>
                Client Name: <input type="text" id="fom040_client_name" name="client_name" style="padding:5px; border-radius:6px; border:1px solid #ccc; width:20%;">
                &nbsp;&nbsp; Client Code: <input type="text" id="fom040_client_code" name="client_code" style="padding:5px; border-radius:6px; border:1px solid #ccc; width:15%;">
                &nbsp;&nbsp; Patient Name: <input type="text" id="fom040_patient_name" name="patient_name" style="padding:5px; border-radius:6px; border:1px solid #ccc; width:20%;">
                &nbsp;&nbsp; Mobile No.: <input type="text" id="fom040_mobile_no" name="mobile_no" style="padding:5px; border-radius:6px; border:1px solid #ccc; width:15%;">
                &nbsp;&nbsp; Email ID: <input type="email" id="fom040_email_id" name="email_id" style="padding:5px; border-radius:6px; border:1px solid #ccc; width:20%;">
            </p>

            <p>
                Date of Birth: <input type="date" id="fom040_date_of_birth" name="date_of_birth" style="padding:5px; border-radius:6px; border:1px solid #ccc;">
                &nbsp;&nbsp; Age:
                <input type="text" id="fom040_age_years" name="age_years" placeholder="Y" style="width:40px; padding:5px; border-radius:6px; border:1px solid #ccc;">
                <input type="text" id="fom040_age_months" name="age_months" placeholder="M" style="width:40px; padding:5px; border-radius:6px; border:1px solid #ccc;">
                <input type="text" id="fom040_age_days" name="age_days" placeholder="D" style="width:40px; padding:5px; border-radius:6px; border:1px solid #ccc;">
            </p>

            <p>
                Gender:
                <select id="fom040_gender" name="gender" style="padding:5px; border-radius:6px; border:1px solid #ccc;">
                    <option value="">Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">Others</option>
                </select>
            </p>

            <p>
                Referring Doctor/Hospital:
                <input type="text" id="fom040_referring_doctor" name="referring_doctor" style="padding:5px; border-radius:6px; border:1px solid #ccc; width:25%;">
                &nbsp;&nbsp; Address & Contact No.:
                <input type="text" id="fom040_address_contact" name="address_contact" style="padding:5px; border-radius:6px; border:1px solid #ccc; width:25%;">
                &nbsp;&nbsp; Sample Drawn Date:
                <input type="date" id="fom040_sample_drawn_date" name="sample_drawn_date" style="padding:5px; border-radius:6px; border:1px solid #ccc;">
                Time:
                <input type="time" id="fom040_sample_drawn_time" name="sample_drawn_time" style="width:100px; padding:5px; border-radius:6px; border:1px solid #ccc;">
                AM/PM
                <select id="fom040_sample_drawn_ampm" name="sample_drawn_ampm" style="padding:4px; border-radius:6px; border:1px solid #ccc;">
                    <option value="AM">AM</option>
                    <option value="PM">PM</option>
                </select>
                &nbsp;&nbsp; LMP:
                <input type="date" id="fom040_lmp_date" name="lmp_date" style="padding:5px; border-radius:6px; border:1px solid #ccc;">
                &nbsp;&nbsp; Sample Shipment Date:
                <input type="date" id="fom040_sample_shipment_date" name="sample_shipment_date" style="padding:5px; border-radius:6px; border:1px solid #ccc;">
                &nbsp;&nbsp; No. of Containers:
                <input type="number" id="fom040_no_of_containers" name="no_of_containers" style="width:60px; padding:5px; border-radius:6px; border:1px solid #ccc;">
            </p>

            <!-- TEST TABLE -->
            <table style="width:100%; border-collapse:collapse; margin-top:20px;">
                <tbody>

                    <tr style="background:#f6f6f6;">
                        <td style="border:1px solid #ccc; padding:8px; font-weight:bold; width:15%;">Test Codes</td>
                        <td colspan="3" style="border:1px solid #ccc; padding:8px; font-weight:bold;">Test Description</td>
                        <td colspan="2" style="border:1px solid #ccc; padding:8px; font-weight:bold;">Sample Type</td>
                        <td colspan="2" style="border:1px solid #ccc; padding:8px; font-weight:bold;">Barcode / SIN No.</td>
                    </tr>

                    <!-- Loop for 6 rows -->
                    @for($i=1;$i<=6;$i++)
                        <tr>
                        <td style="border:1px solid #ccc; padding:5px;">
                            <input type="text" id="fom040_test_code_{{ $i }}" name="test_code_{{ $i }}" style="width:90%; padding:5px; border-radius:5px; border:1px solid #ccc;">
                        </td>
                        <td colspan="3" style="border:1px solid #ccc; padding:5px;">
                            <input type="text" id="fom040_test_description_{{ $i }}" name="test_description_{{ $i }}" style="width:95%; padding:5px; border-radius:5px; border:1px solid #ccc;">
                        </td>
                        <td colspan="2" style="border:1px solid #ccc; padding:5px;">
                            <input type="text" id="fom040_sample_type_{{ $i }}" name="sample_type_{{ $i }}" style="width:90%; padding:5px; border-radius:5px; border:1px solid #ccc;">
                        </td>
                        <td colspan="2" style="border:1px solid #ccc; padding:5px;">
                            <input type="text" id="fom040_barcode_sin_{{ $i }}" name="barcode_sin_{{ $i }}" style="width:90%; padding:5px; border-radius:5px; border:1px solid #ccc;">
                        </td>
                        </tr>
                    @endfor

                    <!-- Clinical History -->
                    <tr>
                        <td colspan="8" style="border:1px solid #ccc; padding:10px; font-weight:bold;">
                            Clinical History (Attach relevant clinical details)
                        </td>
                    </tr>
                    <tr>
                        <td colspan="8" style="border:1px solid #ccc; padding:10px;">
                            <textarea id="fom040_clinical_history" name="clinical_history" style="width:100%; height:100px; padding:8px; border-radius:6px; border:1px solid #ccc;"></textarea>
                        </td>
                    </tr>

                    <!-- Temperature Section -->
                    <tr style="background:#f9f9f9;">
                        <td colspan="3" style="border:1px solid #ccc; padding:8px; font-weight:bold;">Sample sent @ Temperature</td>
                        <td colspan="5" style="border:1px solid #ccc; padding:8px; font-weight:bold;">Sample Received @ Temperature</td>
                    </tr>

                    <tr>
                        <td style="border:1px solid #ccc; padding:8px;">
                            <label><input type="checkbox" id="fom040_temp_sent_18_24" name="temp_sent_18_24" value="1"> 18–24°C</label>
                        </td>
                        <td style="border:1px solid #ccc; padding:8px;">
                            <label><input type="checkbox" id="fom040_temp_sent_2_8" name="temp_sent_2_8" value="1"> 2–8°C</label>
                        </td>
                        <td style="border:1px solid #ccc; padding:8px;">
                            <label><input type="checkbox" id="fom040_temp_sent_below_0" name="temp_sent_below_0" value="1"> &lt;0°C</label>
                        </td>
                        <td colspan="2" style="border:1px solid #ccc; padding:8px;">
                            <label><input type="checkbox" id="fom040_temp_received_18_24" name="temp_received_18_24" value="1"> 18–24°C</label>
                        </td>
                        <td colspan="2" style="border:1px solid #ccc; padding:8px;">
                            <label><input type="checkbox" id="fom040_temp_received_2_8" name="temp_received_2_8" value="1"> 2–8°C</label>
                        </td>
                        <td style="border:1px solid #ccc; padding:8px;">
                            <label><input type="checkbox" id="fom040_temp_received_below_0" name="temp_received_below_0" value="1"> &lt;0°C</label>
                        </td>
                    </tr>

                </tbody>
            </table>

            <!-- Laboratory Use Only -->
            <h4 style="margin-top:20px;">FOR LABORATORY USE ONLY</h4>
            <p>
                TRUSTlab DIAGNOSTICS PRIVATE LIMITED
                Hyderabad,Bengaluru,Jammu,Guntur,Mahbubnagar,Nizamabad,Visakhapatnam,Karimnagar,Noida,Khammam,Vijayawada,Ananthapuramu,Hanumakonda,Chandigarh
            </p>

            <p>
                Date & Time of Specimen Received:
                <input type="datetime-local" id="fom040_specimen_received_datetime" name="specimen_received_datetime" style="padding:5px; border-radius:6px; border:1px solid #ccc;">
                &nbsp;&nbsp; No. of Samples:
                <input type="number" id="fom040_no_of_samples" name="no_of_samples" style="width:70px; padding:5px; border-radius:6px; border:1px solid #ccc;">
            </p>

            <p>
                Transported by:
                <input type="text" id="fom040_transported_by" name="transported_by" style="padding:5px; border-radius:6px; border:1px solid #ccc;">
                &nbsp;&nbsp; Received by:
                <input type="text" id="fom040_received_by" name="received_by" style="padding:5px; border-radius:6px; border:1px solid #ccc;">
                &nbsp;&nbsp; Received Time:
                <input type="time" id="fom040_received_time" name="received_time" style="padding:5px; border-radius:6px; border:1px solid #ccc;">
            </p>

        </div>

        <!-- Saved Records Display -->
        <div id="fom040_records_container" style="margin-top:20px; display:none;">
            <h4>Saved Records</h4>
            <table id="fom040_records_table" style="width:100%; border-collapse:collapse; font-size:13px;">
                <thead>
                    <tr style="background:#f0f0f0;">
                        <th style="border:1px solid #ccc; padding:6px;">Date</th>
                        <th style="border:1px solid #ccc; padding:6px;">Patient Name</th>
                        <th style="border:1px solid #ccc; padding:6px;">Client Name</th>
                        <th style="border:1px solid #ccc; padding:6px;">Mobile</th>
                        <th style="border:1px solid #ccc; padding:6px;">Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

        <script>
            function loadFOM040Records() {
                const fromDate = document.getElementById('fom040_from_date').value;
                const toDate = document.getElementById('fom040_to_date').value;

                if (!fromDate) return;

                let url = '/newforms/ge/test-requisition/load?from_date=' + encodeURIComponent(fromDate);
                if (toDate) url += '&to_date=' + encodeURIComponent(toDate);

                fetch(url)
                    .then(response => response.json())
                    .then(result => {
                        const container = document.getElementById('fom040_records_container');
                        const tbody = document.querySelector('#fom040_records_table tbody');
                        tbody.innerHTML = '';

                        if (result.success && result.data && result.data.length > 0) {
                            container.style.display = 'block';
                            result.data.forEach(record => {
                                const tr = document.createElement('tr');
                                tr.innerHTML = `
                                    <td style="border:1px solid #ccc; padding:6px;">${record.requisition_date ? record.requisition_date.split('T')[0] : ''}</td>
                                    <td style="border:1px solid #ccc; padding:6px;">${record.patient_name || ''}</td>
                                    <td style="border:1px solid #ccc; padding:6px;">${record.client_name || ''}</td>
                                    <td style="border:1px solid #ccc; padding:6px;">${record.mobile_no || ''}</td>
                                    <td style="border:1px solid #ccc; padding:6px;">
                                        <button type="button" onclick="editFOM040Record(${record.id})"
                                            style="background:#007bff; color:white; border:none; padding:3px 8px; border-radius:3px; cursor:pointer;">
                                            Edit
                                        </button>
                                    </td>
                                `;
                                tbody.appendChild(tr);
                            });
                        } else {
                            container.style.display = 'none';
                        }
                    })
                    .catch(error => console.error('Error loading FOM-040:', error));
            }

            function editFOM040Record(id) {
                fetch('/newforms/ge/test-requisition/load?from_date=1900-01-01&to_date=2100-12-31')
                    .then(response => response.json())
                    .then(result => {
                        if (result.success && result.data) {
                            const record = result.data.find(r => r.id === id);
                            if (record) {
                                populateFOM040Form(record);
                            }
                        }
                    });
            }

            function populateFOM040Form(data) {
                document.getElementById('fom040_record_id').value = data.id || '';
                document.getElementById('fom040_requisition_date').value = data.requisition_date ? data.requisition_date.split('T')[0] : '';
                document.getElementById('fom040_client_name').value = data.client_name || '';
                document.getElementById('fom040_client_code').value = data.client_code || '';
                document.getElementById('fom040_patient_name').value = data.patient_name || '';
                document.getElementById('fom040_mobile_no').value = data.mobile_no || '';
                document.getElementById('fom040_email_id').value = data.email_id || '';
                document.getElementById('fom040_date_of_birth').value = data.date_of_birth ? data.date_of_birth.split('T')[0] : '';
                document.getElementById('fom040_age_years').value = data.age_years || '';
                document.getElementById('fom040_age_months').value = data.age_months || '';
                document.getElementById('fom040_age_days').value = data.age_days || '';
                document.getElementById('fom040_gender').value = data.gender || '';
                document.getElementById('fom040_referring_doctor').value = data.referring_doctor || '';
                document.getElementById('fom040_address_contact').value = data.address_contact || '';
                document.getElementById('fom040_sample_drawn_date').value = data.sample_drawn_date ? data.sample_drawn_date.split('T')[0] : '';
                document.getElementById('fom040_sample_drawn_time').value = data.sample_drawn_time || '';
                document.getElementById('fom040_sample_drawn_ampm').value = data.sample_drawn_ampm || 'AM';
                document.getElementById('fom040_lmp_date').value = data.lmp_date ? data.lmp_date.split('T')[0] : '';
                document.getElementById('fom040_sample_shipment_date').value = data.sample_shipment_date ? data.sample_shipment_date.split('T')[0] : '';
                document.getElementById('fom040_no_of_containers').value = data.no_of_containers || '';
                document.getElementById('fom040_clinical_history').value = data.clinical_history || '';

                // Test details
                if (data.test_details) {
                    for (let i = 0; i < data.test_details.length && i < 6; i++) {
                        const test = data.test_details[i];
                        if (test) {
                            document.getElementById('fom040_test_code_' + (i+1)).value = test.test_code || '';
                            document.getElementById('fom040_test_description_' + (i+1)).value = test.test_description || '';
                            document.getElementById('fom040_sample_type_' + (i+1)).value = test.sample_type || '';
                            document.getElementById('fom040_barcode_sin_' + (i+1)).value = test.barcode_sin || '';
                        }
                    }
                }

                // Temperature checkboxes
                document.getElementById('fom040_temp_sent_18_24').checked = !!data.temp_sent_18_24;
                document.getElementById('fom040_temp_sent_2_8').checked = !!data.temp_sent_2_8;
                document.getElementById('fom040_temp_sent_below_0').checked = !!data.temp_sent_below_0;
                document.getElementById('fom040_temp_received_18_24').checked = !!data.temp_received_18_24;
                document.getElementById('fom040_temp_received_2_8').checked = !!data.temp_received_2_8;
                document.getElementById('fom040_temp_received_below_0').checked = !!data.temp_received_below_0;

                // Laboratory fields
                document.getElementById('fom040_specimen_received_datetime').value = data.specimen_received_datetime ? data.specimen_received_datetime.replace(' ', 'T').substring(0, 16) : '';
                document.getElementById('fom040_no_of_samples').value = data.no_of_samples || '';
                document.getElementById('fom040_transported_by').value = data.transported_by || '';
                document.getElementById('fom040_received_by').value = data.received_by || '';
                document.getElementById('fom040_received_time').value = data.received_time || '';
            }

            function clearFOM040Form() {
                document.getElementById('fom040_from_date').value = '';
                document.getElementById('fom040_to_date').value = '';
                document.getElementById('fom040_record_id').value = '';
                document.getElementById('fom040_requisition_date').value = '';
                document.getElementById('fom040_client_name').value = '';
                document.getElementById('fom040_client_code').value = '';
                document.getElementById('fom040_patient_name').value = '';
                document.getElementById('fom040_mobile_no').value = '';
                document.getElementById('fom040_email_id').value = '';
                document.getElementById('fom040_date_of_birth').value = '';
                document.getElementById('fom040_age_years').value = '';
                document.getElementById('fom040_age_months').value = '';
                document.getElementById('fom040_age_days').value = '';
                document.getElementById('fom040_gender').value = '';
                document.getElementById('fom040_referring_doctor').value = '';
                document.getElementById('fom040_address_contact').value = '';
                document.getElementById('fom040_sample_drawn_date').value = '';
                document.getElementById('fom040_sample_drawn_time').value = '';
                document.getElementById('fom040_sample_drawn_ampm').value = 'AM';
                document.getElementById('fom040_lmp_date').value = '';
                document.getElementById('fom040_sample_shipment_date').value = '';
                document.getElementById('fom040_no_of_containers').value = '';
                document.getElementById('fom040_clinical_history').value = '';

                for (let i = 1; i <= 6; i++) {
                    document.getElementById('fom040_test_code_' + i).value = '';
                    document.getElementById('fom040_test_description_' + i).value = '';
                    document.getElementById('fom040_sample_type_' + i).value = '';
                    document.getElementById('fom040_barcode_sin_' + i).value = '';
                }

                document.getElementById('fom040_temp_sent_18_24').checked = false;
                document.getElementById('fom040_temp_sent_2_8').checked = false;
                document.getElementById('fom040_temp_sent_below_0').checked = false;
                document.getElementById('fom040_temp_received_18_24').checked = false;
                document.getElementById('fom040_temp_received_2_8').checked = false;
                document.getElementById('fom040_temp_received_below_0').checked = false;

                document.getElementById('fom040_specimen_received_datetime').value = '';
                document.getElementById('fom040_no_of_samples').value = '';
                document.getElementById('fom040_transported_by').value = '';
                document.getElementById('fom040_received_by').value = '';
                document.getElementById('fom040_received_time').value = '';

                document.getElementById('fom040_records_container').style.display = 'none';
            }

            // AJAX form submission
            (function() {
                const form = document.querySelector('#TDPL\\/GE\\/FOM-040 form') ||
                             document.getElementById('TDPL/GE/FOM-040')?.querySelector('form');
                if (form) {
                    form.addEventListener('submit', function(e) {
                        e.preventDefault();

                        const formData = new FormData(form);

                        fetch('/newforms/ge/forms/submit', {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToast(result.message || 'Form saved successfully', 'success');
                                // Set the record ID for future edits
                                if (result.data && result.data.id) {
                                    document.getElementById('fom040_record_id').value = result.data.id;
                                }
                                // Reload records if filter is set
                                if (document.getElementById('fom040_from_date').value) {
                                    loadFOM040Records();
                                }
                            } else {
                                showToast(result.message || 'Error saving form', 'error');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToast('Error saving form', 'error');
                        });
                    });
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/GE/FOM-042"
        docNo="TDPL/GE/FOM-042"
        docName="Referral Lab Evaluation Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit">
        <div style="background:#ffffff; padding:20px; border-radius:12px; border:1px solid #ccc; font-size:14px; width:100%; box-sizing:border-box; line-height:1.6;">


            <!-- TOP SECTION -->
            <div style="margin-bottom: 20px;">
                <label>Laboratory’s Name:</label>
                <input type="text" name="laboratory_name" style="width: 60%; border: 1px solid #000;">
            </div>

            <div style="margin-bottom: 10px;">
                <label>Contact Person and Details:</label>
                <textarea name="contact_details" style="width: 90%; height: 80px; border: 1px solid #000;"></textarea>
            </div>

            <div style="margin-bottom: 10px;">
                <label>Reason for Evaluation:</label>
                <div>
                    Routine Testing <input type="checkbox" name="reason_routine"> &nbsp;&nbsp;
                    Back-up System <input type="checkbox" name="reason_backup"> &nbsp;&nbsp;
                    Special Circumstance <input type="checkbox" name="reason_special">
                </div>
                <label>(Explain):</label>
                <textarea name="special_explanation" style="width: 100%; height: 80px; border: 1px solid #000;"></textarea>
            </div>

            <p>Evaluated for the following tests:</p>

            <!-- TEST TABLE -->
            <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;" border="1">
                <tr>
                    <th style="padding: 4px;">Analyte / Test</th>
                    <th style="padding: 4px;">Matrix</th>
                </tr>

                @foreach(range(1,10) as $i)
                <tr>
                    <td style="padding: 4px;">
                        <input type="text" name="test[{{ $i }}][analyte]" style="width: 100%; border: none;">
                    </td>
                    <td style="padding: 4px;">
                        <input type="text" name="test[{{ $i }}][matrix]" style="width: 100%; border: none;">
                    </td>
                </tr>
                @endforeach

            </table>

            <div style="margin-bottom: 20px;">
                <label>Evaluation done by:</label>
                <input type="text" name="evaluation_done_by" style="width: 60%; border: 1px solid #000;">
                <br><br>
                <label>Date:</label>
                <input type="date" name="evaluation_date" style="border: 1px solid #000;">
            </div>

            <strong>PLEASE ATTACH SUPPORTING DOCUMENTS AS AND WHERE NECESSARY</strong>

            <hr style="margin: 25px 0;">

            <!-- SECTION 1 -->
            <ul>
                <li><strong>Laboratory’s Capabilities (maximum 25 points)</strong></li>
            </ul>

            <ol>
                <li>Background (1–5 points):</li>
            </ol>

            @foreach([
            "Does the laboratory have a reputation for high quality and integrity?",
            "How long has the lab been in business (e.g. 5 years, 10, more)?",
            "What are clients' general observations regarding the lab's services?"
            ] as $key => $question)
            <div style="margin-bottom: 10px;">
                {{ $question }}
                <input type="text" name="background_{{ $key }}" style="width: 150px; border: 1px solid #000;">
            </div>
            @endforeach

            <ol>
                <li>Experience and references (1-5 points):</li>
            </ol>

            @foreach([
            "Has the laboratory provided a list of References?",
            "How long have clients been served by the lab?"
            ] as $key => $question)
            <div style="margin-bottom: 10px;">
                {{ $question }}
                <input type="text" name="experience_{{ $key }}" style="width: 150px; border: 1px solid #000;">
            </div>
            @endforeach

            <ol>
                <li>Quality Management (1-5 points):</li>
            </ol>

            @foreach([
            "Does the lab have a QMS?",
            "Does the Lab have a Quality Assurance Plan?",
            "Is the Laboratory accredited? Is the documentation available?"
            ] as $key => $question)
            <div style="margin-bottom: 10px;">
                {{ $question }}
                <input type="text" name="quality_management_{{ $key }}" style="width: 150px; border: 1px solid #000;">
            </div>
            @endforeach

            <ol>
                <li>Equipment (lab and data handling) (1–5 points):</li>
            </ol>

            @foreach([
            "Is the testing equipment adequate for the scope and volume of services offered?",
            "Is there adequate backup in the event of equipment failure?",
            "Does the automated data processing equipment capability appear to be adequate for the scope of the work contract (e.g., direct transmissions, online result reporting)?"
            ] as $key => $question)
            <div style="margin-bottom: 10px;">
                {{ $question }}
                <input type="text" name="equipment_{{ $key }}" style="width: 150px; border: 1px solid #000;">
            </div>
            @endforeach

            <ol>
                <li>Accreditation and certifications (1–5 points):</li>
            </ol>

            @foreach([
            "NABL?",
            "Other?"
            ] as $key => $question)
            <div style="margin-bottom: 10px;">
                {{ $question }}
                <input type="text" name="accreditation_{{ $key }}" style="width: 150px; border: 1px solid #000;">
            </div>
            @endforeach

            <p><strong>Total points for section 1:</strong> <input type="text" name="total_section_1" style="width: 150px; border: 1px solid #000;"></p>

            <p><strong>Document where the lab was lacking:</strong>
                <input type="text" name="lacking_section_1" style="width: 300px; border: 1px solid #000;">
            </p>

            <hr style="margin: 25px 0;">

            <!-- SECTION 2 -->
            <ul>
                <li><strong>Quality assurance (maximum 25 points)</strong></li>
            </ul>

            @foreach([
            "Is a written, organized, comprehensive quality control (QC) program in place?",
            "Is there a process for remedial action when QC tolerance limits are exceeded?",
            "Is an ongoing monitoring program in place to review, detect, and correct system errors?",
            "Is a copy of proficiency testing results available for previous 24 months, and corrective actions documented?",
            "Does the laboratory have a written protocol for notifying clients of critical values?"
            ] as $key => $question)
            <div style="margin-bottom: 10px;">
                {{ $question }}
                <input type="text" name="quality_assurance_{{ $key }}" style="width: 150px; border: 1px solid #000;">
            </div>
            @endforeach

            <p><strong>Total points for section 2:</strong>
                <input type="text" name="total_section_2" style="width: 150px; border: 1px solid #000;">
            </p>

            <p><strong>Document where the lab was lacking:</strong>
                <input type="text" name="lacking_section_2" style="width: 300px; border: 1px solid #000;">
            </p>

            <hr style="margin: 25px 0;">

            <!-- SECTION 3 -->
            <ul>
                <li><strong>Efficiency of referral services (maximum 15 points)</strong></li>
            </ul>

            @foreach([
            "Does the lab offer a sufficient range of services to satisfy our needs?",
            "Does the lab provide a written TAT for each test performed, and does it meet our needs?",
            "Are data elements for each test complete?"
            ] as $key => $question)
            <div style="margin-bottom: 10px;">
                {{ $question }}
                <input type="text" name="efficiency_{{ $key }}" style="width: 150px; border: 1px solid #000;">
            </div>
            @endforeach

            <p><strong>Total points for section 3:</strong>
                <input type="text" name="total_section_3" style="width: 150px; border: 1px solid #000;">
            </p>

            <p><strong>Document where the lab was lacking:</strong>
                <input type="text" name="lacking_section_3" style="width: 300px; border: 1px solid #000;">
            </p>

            <hr style="margin: 25px 0;">

            <!-- SECTION 4 -->
            <ul>
                <li><strong>Operational systems (1–5 points for each item)</strong></li>
            </ul>

            @foreach([
            "General management/overall assessment of policies/procedures.",
            "Methods used for testing/reporting results.",
            "Specimen handling policies/procedures, including preparation instructions and rejection criteria.",
            "Equipment maintenance policies.",
            "Information and data handling policies/procedures.",
            "Printing of reports via computer or printer (is printer provided?).",
            "Adequate specimen pick-up service?",
            "Does the lab have a protocol for reviewing test reports for possible errors?",
            "Is the test report format clear and easily readable?",
            "Does the lab provide client consultation services daily?"
            ] as $key => $question)
            <div style="margin-bottom: 10px;">
                {{ $question }}
                <input type="text" name="ops_{{ $key }}" style="width: 150px; border: 1px solid #000;">
            </div>
            @endforeach

            <p><strong>Total points for section 4:</strong>
                <input type="text" name="total_section_4" style="width: 150px; border: 1px solid #000;">
            </p>

            <p><strong>Document where the lab was lacking:</strong>
                <input type="text" name="lacking_section_4" style="width: 300px; border: 1px solid #000;">
            </p>

            <hr style="margin: 25px 0;">

            <!-- SECTION 5 -->
            <ul>
                <li><strong>Personnel (maximum 30 points)</strong></li>
            </ul>

            @foreach([
            "Percentage of technologists to technicians.",
            "Does the lab employ a qualified supervisor during all hours of operation?",
            "Are specific staff members assigned to assist us at all times?",
            "Are doctoral-level scientists or pathologists available for consultation?",
            "Does the technical staff have expertise in all required areas?",
            "Does the technical staff receive continuing education and is it documented?"
            ] as $key => $question)
            <div style="margin-bottom: 10px;">
                {{ $question }}
                <input type="text" name="personnel_{{ $key }}" style="width: 150px; border: 1px solid #000;">
            </div>
            @endforeach

            <p><strong>Total points for section 5:</strong>
                <input type="text" name="total_section_5" style="width: 150px; border: 1px solid #000;">
            </p>

            <p><strong>Document where the lab was lacking:</strong>
                <input type="text" name="lacking_section_5" style="width: 300px; border: 1px solid #000;">
            </p>

            <hr style="margin: 25px 0;">

            <!-- COMPARISON SECTION -->
            <p><strong>Results for method and instrument comparison studies:</strong></p>

            Acceptable <input type="checkbox" name="comparison_acceptable">
            /
            Unacceptable <input type="checkbox" name="comparison_unacceptable">

            <br><br>

            <label>Explain:</label>
            <textarea name="comparison_explain" style="width: 100%; height: 100px; border: 1px solid #000;"></textarea>

            <br><br>

            <label>Evaluator’s comments:</label>
            <textarea name="evaluators_comments" style="width: 100%; height: 120px; border: 1px solid #000;"></textarea>

            <br><br>

            <label>Lab Manager:</label>
            <input type="text" name="lab_manager" style="width: 60%; border: 1px solid #000;">

            <br><br>

            <label>Comments:</label>
            <textarea name="lab_manager_comments" style="width: 100%; height: 100px; border: 1px solid #000;"></textarea>

            <br><br>

            Lab Approved <input type="checkbox" name="lab_approved"> /
            Not Approved <input type="checkbox" name="lab_not_approved">

            <br><br>

            <label>Signature:</label>
            <input type="text" name="signature" style="width: 200px; border: 1px solid #000;">
            &nbsp;&nbsp;&nbsp;
            <label>Date:</label>
            <input type="date" name="final_date" style="border: 1px solid #000;">

        </div>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/GE/FOM-044"
        docNo="TDPL/GE/FOM-044"
        docName="Split Sample Analysis Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ route('newforms.ge.forms.submit') }}"
        buttonText="Submit">
        <div style="padding: 20px;  font-size: 14px;">

            <!-- HEADER SECTION -->
            <p>
                <strong>Department: </strong>
                <input type="text" id="split_sample_department" name="department" style="width: 300px; border: 1px solid #000;">
                &nbsp;&nbsp;&nbsp;
                <strong>Location: </strong>
                <input type="text" id="split_sample_location" name="location" style="width: 200px; border: 1px solid #000;">
            </p>

            <!-- TABLE -->
            <table style="width: 100%; border-collapse: collapse; margin-top: 20px;" border="1">
                <thead>
                    <tr>
                        <td style="padding: 6px;">S. No.</td>
                        <td style="padding: 6px;">Name of the Test</td>
                        <td style="padding: 6px;">Tech/Dr.01 Result</td>
                        <td style="padding: 6px;">Tech/Dr.02 Result</td>
                        <td style="padding: 6px;">Correlated /<br>Non-Correlated</td>
                        <td style="padding: 6px;">Remarks</td>
                        <td style="padding: 6px;">Signature of HOD/QM</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach(range(1,10) as $i)
                    <tr>
                        <td style="padding: 6px; text-align:center;">
                            {{ $i }}
                        </td>

                        <td style="padding: 6px;">
                            <input type="text" id="split_sample_test_name_{{ $i }}" name="rows[{{ $i }}][test_name]" style="width: 100%; border: none;">
                        </td>

                        <td style="padding: 6px;">
                            <input type="text" id="split_sample_tech1_result_{{ $i }}" name="rows[{{ $i }}][tech1_result]" style="width: 100%; border: none;">
                        </td>

                        <td style="padding: 6px;">
                            <input type="text" id="split_sample_tech2_result_{{ $i }}" name="rows[{{ $i }}][tech2_result]" style="width: 100%; border: none;">
                        </td>

                        <td style="padding: 6px; text-align:center;">
                            <select id="split_sample_correlation_{{ $i }}" name="rows[{{ $i }}][correlation]" style="width: 100%; border: none;">
                                <option value="">--Select--</option>
                                <option value="Correlated">Correlated</option>
                                <option value="Non-Correlated">Non-Correlated</option>
                            </select>
                        </td>

                        <td style="padding: 6px;">
                            <input type="text" id="split_sample_remarks_{{ $i }}" name="rows[{{ $i }}][remarks]" style="width: 100%; border: none;">
                        </td>

                        <td style="padding: 6px;">
                            <input type="text" id="split_sample_signature_{{ $i }}" name="rows[{{ $i }}][signature]" style="width: 100%; border: none;">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/GE/FOM-047"
        docNo="TDPL/GE/FOM-047"
        docName="Reagent & Consumables Consumption Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ route('newforms.ge.forms.submit') }}"
        buttonText="Submit">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="GE_FOM_047__from_date"
                    onchange="loadReagentConsumptionData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="GE_FOM_047__to_date"
                    onchange="loadReagentConsumptionData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>Department</strong></label>
                <input type="text" name="department" id="GE_FOM_047__department" list="GE_FOM_047__department_list"
                    onchange="loadReagentConsumptionData()" onblur="loadReagentConsumptionData()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="GE_FOM_047__department_list">
                    <option value="Biochemistry">
                    <option value="Hematology">
                    <option value="Microbiology">
                    <option value="Histopathology">
                    <option value="Cytology">
                    <option value="Molecular Biology">
                    <option value="Clinical Pathology">
                    <option value="Immunology">
                </datalist>
            </div>
            <div>
                <label><strong>Location</strong></label>
                <input type="text" name="location" id="GE_FOM_047__location" list="GE_FOM_047__location_list"
                    onchange="loadReagentConsumptionData()" onblur="loadReagentConsumptionData()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="GE_FOM_047__location_list">
                    <option value="Main Lab">
                    <option value="Branch Lab 1">
                    <option value="Branch Lab 2">
                    <option value="Collection Center 1">
                    <option value="Collection Center 2">
                </datalist>
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearReagentConsumptionFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr style="background:#f2f2f2;">
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Date</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Reagent Name</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Quantity</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Lot No.</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Expiry Date</td>
                </tr>
            </thead>
            <tbody id="GE_FOM_047__tbody">
                <!-- Empty row for new entry -->
                <tr>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="consumption_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="reagent_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="number" step="0.01" name="quantity[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="lot_no[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="expiry_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                </tr>
            </tbody>
        </table>

        <script>
            // Load Reagent Consumption records based on date range filters
            function loadReagentConsumptionData() {
                const fromDate = document.getElementById('GE_FOM_047__from_date').value;
                const toDate = document.getElementById('GE_FOM_047__to_date').value;

                // At least one date filter required
                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                const department = document.getElementById('GE_FOM_047__department').value;
                if (department) params.append('department', department);

                const location = document.getElementById('GE_FOM_047__location').value;
                if (location) params.append('location', location);

                fetch(`/newforms/ge/reagent-consumables-consumption/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    const tbody = document.getElementById('GE_FOM_047__tbody');
                    if (!tbody) return;

                    // Clear existing rows
                    tbody.innerHTML = '';

                    // Update datalists
                    if (res.departments) {
                        updateFOM047Datalist('GE_FOM_047__department_list', res.departments);
                    }
                    if (res.locations) {
                        updateFOM047Datalist('GE_FOM_047__location_list', res.locations);
                    }

                    // If no records found, add one empty row for new entry
                    if (!res.data || res.data.length === 0) {
                        addEmptyRowFOM047();
                        return;
                    }

                    // Add all loaded records
                    res.data.forEach((row, index) => {
                        const tr = document.createElement('tr');
                        const consumptionDate = row.consumption_date ? row.consumption_date.split('T')[0] : '';
                        const expiryDate = row.expiry_date ? row.expiry_date.split('T')[0] : '';
                        tr.innerHTML = `
                            <td style="border:1px solid #000; padding:4px;">
                                <input type="hidden" name="row_id[]" value="${row.id}">
                                <input type="date" name="consumption_date[]" value="${consumptionDate}" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #000; padding:4px;"><input name="reagent_name[]" value="${row.reagent_name || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input type="number" step="0.01" name="quantity[]" value="${row.quantity || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="lot_no[]" value="${row.lot_no || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input type="date" name="expiry_date[]" value="${expiryDate}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        `;
                        tbody.appendChild(tr);
                    });

                    // Add empty row BELOW loaded records
                    addEmptyRowFOM047();
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function clearReagentConsumptionForm() {
                const tbody = document.getElementById('GE_FOM_047__tbody');
                if (tbody) {
                    tbody.innerHTML = '';
                    // Add empty row for new entry
                    addEmptyRowFOM047();
                }
            }

            function addEmptyRowFOM047() {
                const tbody = document.getElementById('GE_FOM_047__tbody');
                if (!tbody) return;

                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="consumption_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="reagent_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="number" step="0.01" name="quantity[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="lot_no[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="expiry_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                `;
                tbody.appendChild(tr);
            }

            function clearReagentConsumptionFilters() {
                document.getElementById('GE_FOM_047__from_date').value = '';
                document.getElementById('GE_FOM_047__to_date').value = '';
                document.getElementById('GE_FOM_047__department').value = '';
                document.getElementById('GE_FOM_047__location').value = '';
                clearReagentConsumptionForm();
            }

            function updateFOM047Datalist(datalistId, values) {
                const datalist = document.getElementById(datalistId);
                if (!datalist) return;
                const existingOptions = Array.from(datalist.options).map(opt => opt.value);
                values.forEach(value => {
                    if (!existingOptions.includes(value)) {
                        const option = document.createElement('option');
                        option.value = value;
                        datalist.appendChild(option);
                    }
                });
            }

            // AJAX Submit for FOM-047
            (function() {
                function initReagentConsumptionForm() {
                    const formContainer = document.querySelector('[id="TDPL/GE/FOM-047"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn.textContent;

                        submitBtn.textContent = 'Saving...';
                        submitBtn.disabled = true;

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastFOM047('success', result.message || 'Saved successfully!');

                                // Display saved records directly from response
                                const tbody = document.getElementById('GE_FOM_047__tbody');
                                if (tbody && result.data && result.data.length > 0) {
                                    tbody.innerHTML = '';

                                    // Add all saved records
                                    result.data.forEach(row => {
                                        const tr = document.createElement('tr');
                                        const consumptionDate = row.consumption_date ? row.consumption_date.split('T')[0] : '';
                                        const expiryDate = row.expiry_date ? row.expiry_date.split('T')[0] : '';
                                        tr.innerHTML = `
                                            <td style="border:1px solid #000; padding:4px;">
                                                <input type="hidden" name="row_id[]" value="${row.id}">
                                                <input type="date" name="consumption_date[]" value="${consumptionDate}" style="width:100%; border:1px solid #ccc; padding:4px;">
                                            </td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="reagent_name[]" value="${row.reagent_name || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input type="number" step="0.01" name="quantity[]" value="${row.quantity || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="lot_no[]" value="${row.lot_no || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input type="date" name="expiry_date[]" value="${expiryDate}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                        `;
                                        tbody.appendChild(tr);
                                    });

                                    // Add empty row at end for new entry
                                    addEmptyRowFOM047();
                                }
                            } else {
                                showToastFOM047('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastFOM047('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                function showToastFOM047(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position: fixed; top: 20px; right: 20px; z-index: 9999;
                        padding: 15px 25px; border-radius: 5px; color: white;
                        font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.3);
                        background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initReagentConsumptionForm);
                } else {
                    initReagentConsumptionForm();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/GE/REG-001"
        docNo="TDPL/GE/REG-001"
        docName="Shift Handover Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ route('newforms.ge.forms.submit') }}"
        buttonText="Submit">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="GE_REG_001__from_date"
                    onchange="loadShiftHandoverData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="GE_REG_001__to_date"
                    onchange="loadShiftHandoverData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>Department</strong></label>
                <input type="text" name="department" id="GE_REG_001__department" list="GE_REG_001__department_list"
                    onchange="loadShiftHandoverData()" onblur="loadShiftHandoverData()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="GE_REG_001__department_list">
                    <option value="Biochemistry">
                    <option value="Hematology">
                    <option value="Microbiology">
                    <option value="Histopathology">
                    <option value="Cytology">
                    <option value="Molecular Biology">
                    <option value="Clinical Pathology">
                    <option value="Immunology">
                </datalist>
            </div>
            <div>
                <label><strong>Location</strong></label>
                <input type="text" name="location" id="GE_REG_001__location" list="GE_REG_001__location_list"
                    onchange="loadShiftHandoverData()" onblur="loadShiftHandoverData()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="GE_REG_001__location_list">
                    <option value="Main Lab">
                    <option value="Branch Lab 1">
                    <option value="Branch Lab 2">
                    <option value="Collection Center 1">
                    <option value="Collection Center 2">
                </datalist>
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearShiftHandoverFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr style="background:#f2f2f2;">
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Date</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Barcode</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Test Name</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">No of Samples</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Reason for Pending</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Handover By</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Received By</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Remarks</td>
                </tr>
            </thead>
            <tbody id="GE_REG_001__tbody">
                <!-- Empty row for new entry -->
                <tr>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="handover_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="barcode[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="test_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="number" name="no_of_samples[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="pending_reason[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="handover_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="received_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="remarks[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                </tr>
            </tbody>
        </table>

        <script>
            // Load Shift Handover records based on date range filters
            function loadShiftHandoverData() {
                const fromDate = document.getElementById('GE_REG_001__from_date').value;
                const toDate = document.getElementById('GE_REG_001__to_date').value;

                // At least one date filter required
                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                const department = document.getElementById('GE_REG_001__department').value;
                if (department) params.append('department', department);

                const location = document.getElementById('GE_REG_001__location').value;
                if (location) params.append('location', location);

                fetch(`/newforms/ge/shift-handover-register/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    const tbody = document.getElementById('GE_REG_001__tbody');
                    if (!tbody) return;

                    // Clear existing rows
                    tbody.innerHTML = '';

                    // Update datalists
                    if (res.departments) {
                        updateREG001Datalist('GE_REG_001__department_list', res.departments);
                    }
                    if (res.locations) {
                        updateREG001Datalist('GE_REG_001__location_list', res.locations);
                    }

                    // If no records found, add one empty row for new entry
                    if (!res.data || res.data.length === 0) {
                        addEmptyRowREG001();
                        return;
                    }

                    // Add all loaded records
                    res.data.forEach((row, index) => {
                        const tr = document.createElement('tr');
                        const handoverDate = row.handover_date ? row.handover_date.split('T')[0] : '';
                        tr.innerHTML = `
                            <td style="border:1px solid #000; padding:4px;">
                                <input type="hidden" name="row_id[]" value="${row.id}">
                                <input type="date" name="handover_date[]" value="${handoverDate}" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #000; padding:4px;"><input name="barcode[]" value="${row.barcode || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="test_name[]" value="${row.test_name || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input type="number" name="no_of_samples[]" value="${row.no_of_samples || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="pending_reason[]" value="${row.pending_reason || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="handover_by[]" value="${row.handover_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="received_by[]" value="${row.received_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="remarks[]" value="${row.remarks || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        `;
                        tbody.appendChild(tr);
                    });

                    // Add empty row BELOW loaded records
                    addEmptyRowREG001();
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function clearShiftHandoverForm() {
                const tbody = document.getElementById('GE_REG_001__tbody');
                if (tbody) {
                    tbody.innerHTML = '';
                    addEmptyRowREG001();
                }
            }

            function addEmptyRowREG001() {
                const tbody = document.getElementById('GE_REG_001__tbody');
                if (!tbody) return;

                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="handover_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="barcode[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="test_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="number" name="no_of_samples[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="pending_reason[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="handover_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="received_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="remarks[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                `;
                tbody.appendChild(tr);
            }

            function clearShiftHandoverFilters() {
                document.getElementById('GE_REG_001__from_date').value = '';
                document.getElementById('GE_REG_001__to_date').value = '';
                document.getElementById('GE_REG_001__department').value = '';
                document.getElementById('GE_REG_001__location').value = '';
                clearShiftHandoverForm();
            }

            function updateREG001Datalist(datalistId, values) {
                const datalist = document.getElementById(datalistId);
                if (!datalist) return;
                const existingOptions = Array.from(datalist.options).map(opt => opt.value);
                values.forEach(value => {
                    if (!existingOptions.includes(value)) {
                        const option = document.createElement('option');
                        option.value = value;
                        datalist.appendChild(option);
                    }
                });
            }

            // AJAX Submit for REG-001
            (function() {
                function initShiftHandoverForm() {
                    const formContainer = document.querySelector('[id="TDPL/GE/REG-001"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn.textContent;

                        submitBtn.textContent = 'Saving...';
                        submitBtn.disabled = true;

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastREG001('success', result.message || 'Saved successfully!');

                                // Display saved records directly from response
                                const tbody = document.getElementById('GE_REG_001__tbody');
                                if (tbody && result.data && result.data.length > 0) {
                                    tbody.innerHTML = '';

                                    // Add all saved records
                                    result.data.forEach(row => {
                                        const tr = document.createElement('tr');
                                        const handoverDate = row.handover_date ? row.handover_date.split('T')[0] : '';
                                        tr.innerHTML = `
                                            <td style="border:1px solid #000; padding:4px;">
                                                <input type="hidden" name="row_id[]" value="${row.id}">
                                                <input type="date" name="handover_date[]" value="${handoverDate}" style="width:100%; border:1px solid #ccc; padding:4px;">
                                            </td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="barcode[]" value="${row.barcode || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="test_name[]" value="${row.test_name || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input type="number" name="no_of_samples[]" value="${row.no_of_samples || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="pending_reason[]" value="${row.pending_reason || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="handover_by[]" value="${row.handover_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="received_by[]" value="${row.received_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="remarks[]" value="${row.remarks || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                        `;
                                        tbody.appendChild(tr);
                                    });

                                    // Add empty row at end for new entry
                                    addEmptyRowREG001();
                                }
                            } else {
                                showToastREG001('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastREG001('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                function showToastREG001(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position: fixed; top: 20px; right: 20px; z-index: 9999;
                        padding: 15px 25px; border-radius: 5px; color: white;
                        font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.3);
                        background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initShiftHandoverForm);
                } else {
                    initShiftHandoverForm();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/GE/REG-002"
        docNo="TDPL/GE/REG-002"
        docName="Department Sample Storage & Discard Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ route('newforms.ge.forms.submit') }}"
        buttonText="Submit">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="GE_REG_002__from_date"
                    onchange="loadDeptSampleStorageData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="GE_REG_002__to_date"
                    onchange="loadDeptSampleStorageData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>Department</strong></label>
                <input type="text" name="department" id="GE_REG_002__department" list="GE_REG_002__department_list"
                    onchange="loadDeptSampleStorageData()" onblur="loadDeptSampleStorageData()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="GE_REG_002__department_list">
                    <option value="Biochemistry">
                    <option value="Hematology">
                    <option value="Microbiology">
                    <option value="Histopathology">
                    <option value="Cytology">
                    <option value="Molecular Biology">
                    <option value="Clinical Pathology">
                    <option value="Immunology">
                </datalist>
            </div>
            <div>
                <label><strong>Location</strong></label>
                <input type="text" name="location" id="GE_REG_002__location" list="GE_REG_002__location_list"
                    onchange="loadDeptSampleStorageData()" onblur="loadDeptSampleStorageData()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="GE_REG_002__location_list">
                    <option value="Main Lab">
                    <option value="Branch Lab 1">
                    <option value="Branch Lab 2">
                    <option value="Collection Center 1">
                    <option value="Collection Center 2">
                </datalist>
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearDeptSampleStorageFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr style="background:#f2f2f2;">
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Barcode</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Sample Received Date</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Sample Discard Date</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Discard By</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Reviewed By</td>
                </tr>
            </thead>
            <tbody id="GE_REG_002__tbody">
                <!-- Empty row for new entry -->
                <tr>
                    <td style="border:1px solid #000; padding:4px;"><input name="barcode[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="sample_received_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="sample_discard_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="discard_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="reviewed_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                </tr>
            </tbody>
        </table>

        <script>
            // Load Department Sample Storage records based on date range filters
            function loadDeptSampleStorageData() {
                const fromDate = document.getElementById('GE_REG_002__from_date').value;
                const toDate = document.getElementById('GE_REG_002__to_date').value;

                // At least one date filter required
                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                const department = document.getElementById('GE_REG_002__department').value;
                if (department) params.append('department', department);

                const location = document.getElementById('GE_REG_002__location').value;
                if (location) params.append('location', location);

                fetch(`/newforms/ge/department-sample-storage/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    const tbody = document.getElementById('GE_REG_002__tbody');
                    if (!tbody) return;

                    // Clear existing rows
                    tbody.innerHTML = '';

                    // Update datalists
                    if (res.departments) {
                        updateREG002Datalist('GE_REG_002__department_list', res.departments);
                    }
                    if (res.locations) {
                        updateREG002Datalist('GE_REG_002__location_list', res.locations);
                    }

                    // If no records found, add one empty row for new entry
                    if (!res.data || res.data.length === 0) {
                        addEmptyRowREG002();
                        return;
                    }

                    // Add all loaded records
                    res.data.forEach((row, index) => {
                        const tr = document.createElement('tr');
                        const receivedDate = row.sample_received_date ? row.sample_received_date.split('T')[0] : '';
                        const discardDate = row.sample_discard_date ? row.sample_discard_date.split('T')[0] : '';
                        tr.innerHTML = `
                            <td style="border:1px solid #000; padding:4px;">
                                <input type="hidden" name="row_id[]" value="${row.id}">
                                <input name="barcode[]" value="${row.barcode || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #000; padding:4px;"><input type="date" name="sample_received_date[]" value="${receivedDate}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input type="date" name="sample_discard_date[]" value="${discardDate}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="discard_by[]" value="${row.discard_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="reviewed_by[]" value="${row.reviewed_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        `;
                        tbody.appendChild(tr);
                    });

                    // Add empty row BELOW loaded records
                    addEmptyRowREG002();
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function clearDeptSampleStorageForm() {
                const tbody = document.getElementById('GE_REG_002__tbody');
                if (tbody) {
                    tbody.innerHTML = '';
                    addEmptyRowREG002();
                }
            }

            function addEmptyRowREG002() {
                const tbody = document.getElementById('GE_REG_002__tbody');
                if (!tbody) return;

                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td style="border:1px solid #000; padding:4px;"><input name="barcode[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="sample_received_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="sample_discard_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="discard_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="reviewed_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                `;
                tbody.appendChild(tr);
            }

            function clearDeptSampleStorageFilters() {
                document.getElementById('GE_REG_002__from_date').value = '';
                document.getElementById('GE_REG_002__to_date').value = '';
                document.getElementById('GE_REG_002__department').value = '';
                document.getElementById('GE_REG_002__location').value = '';
                clearDeptSampleStorageForm();
            }

            function updateREG002Datalist(datalistId, values) {
                const datalist = document.getElementById(datalistId);
                if (!datalist) return;
                const existingOptions = Array.from(datalist.options).map(opt => opt.value);
                values.forEach(value => {
                    if (!existingOptions.includes(value)) {
                        const option = document.createElement('option');
                        option.value = value;
                        datalist.appendChild(option);
                    }
                });
            }

            // AJAX Submit for REG-002
            (function() {
                function initDeptSampleStorageForm() {
                    const formContainer = document.querySelector('[id="TDPL/GE/REG-002"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn.textContent;

                        submitBtn.textContent = 'Saving...';
                        submitBtn.disabled = true;

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastREG002('success', result.message || 'Saved successfully!');

                                // Display saved records directly from response
                                const tbody = document.getElementById('GE_REG_002__tbody');
                                if (tbody && result.data && result.data.length > 0) {
                                    tbody.innerHTML = '';

                                    // Add all saved records
                                    result.data.forEach(row => {
                                        const tr = document.createElement('tr');
                                        const receivedDate = row.sample_received_date ? row.sample_received_date.split('T')[0] : '';
                                        const discardDate = row.sample_discard_date ? row.sample_discard_date.split('T')[0] : '';
                                        tr.innerHTML = `
                                            <td style="border:1px solid #000; padding:4px;">
                                                <input type="hidden" name="row_id[]" value="${row.id}">
                                                <input name="barcode[]" value="${row.barcode || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                                            </td>
                                            <td style="border:1px solid #000; padding:4px;"><input type="date" name="sample_received_date[]" value="${receivedDate}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input type="date" name="sample_discard_date[]" value="${discardDate}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="discard_by[]" value="${row.discard_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="reviewed_by[]" value="${row.reviewed_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                        `;
                                        tbody.appendChild(tr);
                                    });

                                    // Add empty row at end for new entry
                                    addEmptyRowREG002();
                                }
                            } else {
                                showToastREG002('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastREG002('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                function showToastREG002(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position: fixed; top: 20px; right: 20px; z-index: 9999;
                        padding: 15px 25px; border-radius: 5px; color: white;
                        font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.3);
                        background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initDeptSampleStorageForm);
                } else {
                    initDeptSampleStorageForm();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/GE/REG-003"
        docNo="TDPL/GE/REG-003"
        docName="Sample Integrity Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ route('newforms.ge.forms.submit') }}"
        buttonText="Submit">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="GE_REG_003__from_date"
                    onchange="loadSampleIntegrityData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="GE_REG_003__to_date"
                    onchange="loadSampleIntegrityData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>Department</strong></label>
                <input type="text" name="department" id="GE_REG_003__department" list="GE_REG_003__department_list"
                    onchange="loadSampleIntegrityData()" onblur="loadSampleIntegrityData()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="GE_REG_003__department_list">
                    <option value="Biochemistry">
                    <option value="Hematology">
                    <option value="Microbiology">
                    <option value="Histopathology">
                    <option value="Cytology">
                    <option value="Molecular Biology">
                    <option value="Clinical Pathology">
                    <option value="Immunology">
                </datalist>
            </div>
            <div>
                <label><strong>Location</strong></label>
                <input type="text" name="location" id="GE_REG_003__location" list="GE_REG_003__location_list"
                    onchange="loadSampleIntegrityData()" onblur="loadSampleIntegrityData()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="GE_REG_003__location_list">
                    <option value="Main Lab">
                    <option value="Branch Lab 1">
                    <option value="Branch Lab 2">
                    <option value="Collection Center 1">
                    <option value="Collection Center 2">
                </datalist>
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearSampleIntegrityFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr style="background:#f2f2f2;">
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Date</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Sample ID</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Test Parameter</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Initial Result (A)</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Result Next Day (B)</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">% Difference</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Variation Accepted?</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Done By</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Verified By</td>
                </tr>
            </thead>
            <tbody id="GE_REG_003__tbody">
                <!-- Empty row for new entry -->
                <tr>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="check_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="sample_id[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="test_parameter[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="number" step="0.01" name="initial_result[]" onchange="calcPercentDiff(this)" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="number" step="0.01" name="next_day_result[]" onchange="calcPercentDiff(this)" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="percent_difference[]" readonly style="width:100%; border:1px solid #ccc; padding:4px; background:#f0f0f0;"></td>
                    <td style="border:1px solid #000; padding:4px;">
                        <select name="is_variation_accepted[]" style="width:100%; border:1px solid #ccc; padding:4px;">
                            <option value="">--Select--</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </td>
                    <td style="border:1px solid #000; padding:4px;"><input name="done_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="verified_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                </tr>
            </tbody>
        </table>

        <p style="margin-top:15px;">
            <strong>Acceptability Criteria:</strong>
            % Difference = [(A - B) / A] × 100
        </p>

        <script>
            // Calculate % Difference automatically
            function calcPercentDiff(input) {
                const row = input.closest('tr');
                const initialResult = parseFloat(row.querySelector('[name="initial_result[]"]').value) || 0;
                const nextDayResult = parseFloat(row.querySelector('[name="next_day_result[]"]').value) || 0;
                const percentField = row.querySelector('[name="percent_difference[]"]');

                if (initialResult !== 0) {
                    const diff = ((initialResult - nextDayResult) / initialResult) * 100;
                    percentField.value = diff.toFixed(2);
                } else {
                    percentField.value = '';
                }
            }

            // Load Sample Integrity records based on date range filters
            function loadSampleIntegrityData() {
                const fromDate = document.getElementById('GE_REG_003__from_date').value;
                const toDate = document.getElementById('GE_REG_003__to_date').value;

                // At least one date filter required
                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                const department = document.getElementById('GE_REG_003__department').value;
                if (department) params.append('department', department);

                const location = document.getElementById('GE_REG_003__location').value;
                if (location) params.append('location', location);

                fetch(`/newforms/ge/sample-integrity-register/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    const tbody = document.getElementById('GE_REG_003__tbody');
                    if (!tbody) return;

                    // Clear existing rows
                    tbody.innerHTML = '';

                    // Update datalists
                    if (res.departments) {
                        updateREG003Datalist('GE_REG_003__department_list', res.departments);
                    }
                    if (res.locations) {
                        updateREG003Datalist('GE_REG_003__location_list', res.locations);
                    }

                    // If no records found, add one empty row for new entry
                    if (!res.data || res.data.length === 0) {
                        addEmptyRowREG003();
                        return;
                    }

                    // Add all loaded records
                    res.data.forEach((row, index) => {
                        const tr = document.createElement('tr');
                        const checkDate = row.check_date ? row.check_date.split('T')[0] : '';
                        tr.innerHTML = `
                            <td style="border:1px solid #000; padding:4px;">
                                <input type="hidden" name="row_id[]" value="${row.id}">
                                <input type="date" name="check_date[]" value="${checkDate}" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #000; padding:4px;"><input name="sample_id[]" value="${row.sample_id || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="test_parameter[]" value="${row.test_parameter || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input type="number" step="0.01" name="initial_result[]" value="${row.initial_result || ''}" onchange="calcPercentDiff(this)" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input type="number" step="0.01" name="next_day_result[]" value="${row.next_day_result || ''}" onchange="calcPercentDiff(this)" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="percent_difference[]" value="${row.percent_difference || ''}" readonly style="width:100%; border:1px solid #ccc; padding:4px; background:#f0f0f0;"></td>
                            <td style="border:1px solid #000; padding:4px;">
                                <select name="is_variation_accepted[]" style="width:100%; border:1px solid #ccc; padding:4px;">
                                    <option value="">--Select--</option>
                                    <option value="Yes" ${row.is_variation_accepted === 'Yes' ? 'selected' : ''}>Yes</option>
                                    <option value="No" ${row.is_variation_accepted === 'No' ? 'selected' : ''}>No</option>
                                </select>
                            </td>
                            <td style="border:1px solid #000; padding:4px;"><input name="done_by[]" value="${row.done_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="verified_by[]" value="${row.verified_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        `;
                        tbody.appendChild(tr);
                    });

                    // Add empty row BELOW loaded records
                    addEmptyRowREG003();
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function clearSampleIntegrityForm() {
                const tbody = document.getElementById('GE_REG_003__tbody');
                if (tbody) {
                    tbody.innerHTML = '';
                    addEmptyRowREG003();
                }
            }

            function addEmptyRowREG003() {
                const tbody = document.getElementById('GE_REG_003__tbody');
                if (!tbody) return;

                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="check_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="sample_id[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="test_parameter[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="number" step="0.01" name="initial_result[]" onchange="calcPercentDiff(this)" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="number" step="0.01" name="next_day_result[]" onchange="calcPercentDiff(this)" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="percent_difference[]" readonly style="width:100%; border:1px solid #ccc; padding:4px; background:#f0f0f0;"></td>
                    <td style="border:1px solid #000; padding:4px;">
                        <select name="is_variation_accepted[]" style="width:100%; border:1px solid #ccc; padding:4px;">
                            <option value="">--Select--</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </td>
                    <td style="border:1px solid #000; padding:4px;"><input name="done_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="verified_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                `;
                tbody.appendChild(tr);
            }

            function clearSampleIntegrityFilters() {
                document.getElementById('GE_REG_003__from_date').value = '';
                document.getElementById('GE_REG_003__to_date').value = '';
                document.getElementById('GE_REG_003__department').value = '';
                document.getElementById('GE_REG_003__location').value = '';
                clearSampleIntegrityForm();
            }

            function updateREG003Datalist(datalistId, values) {
                const datalist = document.getElementById(datalistId);
                if (!datalist) return;
                const existingOptions = Array.from(datalist.options).map(opt => opt.value);
                values.forEach(value => {
                    if (!existingOptions.includes(value)) {
                        const option = document.createElement('option');
                        option.value = value;
                        datalist.appendChild(option);
                    }
                });
            }

            // AJAX Submit for REG-003
            (function() {
                function initSampleIntegrityForm() {
                    const formContainer = document.querySelector('[id="TDPL/GE/REG-003"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn.textContent;

                        submitBtn.textContent = 'Saving...';
                        submitBtn.disabled = true;

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastREG003('success', result.message || 'Saved successfully!');

                                // Display saved records directly from response
                                const tbody = document.getElementById('GE_REG_003__tbody');
                                if (tbody && result.data && result.data.length > 0) {
                                    tbody.innerHTML = '';

                                    // Add all saved records
                                    result.data.forEach(row => {
                                        const tr = document.createElement('tr');
                                        const checkDate = row.check_date ? row.check_date.split('T')[0] : '';
                                        tr.innerHTML = `
                                            <td style="border:1px solid #000; padding:4px;">
                                                <input type="hidden" name="row_id[]" value="${row.id}">
                                                <input type="date" name="check_date[]" value="${checkDate}" style="width:100%; border:1px solid #ccc; padding:4px;">
                                            </td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="sample_id[]" value="${row.sample_id || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="test_parameter[]" value="${row.test_parameter || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input type="number" step="0.01" name="initial_result[]" value="${row.initial_result || ''}" onchange="calcPercentDiff(this)" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input type="number" step="0.01" name="next_day_result[]" value="${row.next_day_result || ''}" onchange="calcPercentDiff(this)" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="percent_difference[]" value="${row.percent_difference || ''}" readonly style="width:100%; border:1px solid #ccc; padding:4px; background:#f0f0f0;"></td>
                                            <td style="border:1px solid #000; padding:4px;">
                                                <select name="is_variation_accepted[]" style="width:100%; border:1px solid #ccc; padding:4px;">
                                                    <option value="">--Select--</option>
                                                    <option value="Yes" ${row.is_variation_accepted === 'Yes' ? 'selected' : ''}>Yes</option>
                                                    <option value="No" ${row.is_variation_accepted === 'No' ? 'selected' : ''}>No</option>
                                                </select>
                                            </td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="done_by[]" value="${row.done_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="verified_by[]" value="${row.verified_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                        `;
                                        tbody.appendChild(tr);
                                    });

                                    // Add empty row at end for new entry
                                    addEmptyRowREG003();
                                }
                            } else {
                                showToastREG003('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastREG003('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                function showToastREG003(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position: fixed; top: 20px; right: 20px; z-index: 9999;
                        padding: 15px 25px; border-radius: 5px; color: white;
                        font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.3);
                        background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initSampleIntegrityForm);
                } else {
                    initSampleIntegrityForm();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/GE/REG-005"
        docNo="TDPL/GE/REG-005"
        docName="Inter-Department Sample Transfer Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ route('newforms.ge.forms.submit') }}"
        buttonText="Submit">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="GE_REG_005__from_date"
                    onchange="loadInterDeptTransferData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="GE_REG_005__to_date"
                    onchange="loadInterDeptTransferData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>From Department</strong></label>
                <input type="text" id="GE_REG_005__from_department_filter" list="GE_REG_005__from_dept_list"
                    onchange="loadInterDeptTransferData()" onblur="loadInterDeptTransferData()"
                    style="border:1px solid #000; padding:4px; width:150px;" placeholder="Select or type">
                <datalist id="GE_REG_005__from_dept_list">
                    <option value="Biochemistry">
                    <option value="Hematology">
                    <option value="Microbiology">
                    <option value="Histopathology">
                    <option value="Cytology">
                    <option value="Molecular Biology">
                    <option value="Clinical Pathology">
                    <option value="Immunology">
                </datalist>
            </div>
            <div>
                <label><strong>To Department</strong></label>
                <input type="text" id="GE_REG_005__to_department_filter" list="GE_REG_005__to_dept_list"
                    onchange="loadInterDeptTransferData()" onblur="loadInterDeptTransferData()"
                    style="border:1px solid #000; padding:4px; width:150px;" placeholder="Select or type">
                <datalist id="GE_REG_005__to_dept_list">
                    <option value="Biochemistry">
                    <option value="Hematology">
                    <option value="Microbiology">
                    <option value="Histopathology">
                    <option value="Cytology">
                    <option value="Molecular Biology">
                    <option value="Clinical Pathology">
                    <option value="Immunology">
                </datalist>
            </div>
            <div>
                <label><strong>Location</strong></label>
                <input type="text" name="location" id="GE_REG_005__location" list="GE_REG_005__location_list"
                    onchange="loadInterDeptTransferData()" onblur="loadInterDeptTransferData()"
                    style="border:1px solid #000; padding:4px; width:150px;" placeholder="Select or type">
                <datalist id="GE_REG_005__location_list">
                    <option value="Main Lab">
                    <option value="Branch Lab 1">
                    <option value="Branch Lab 2">
                </datalist>
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearInterDeptTransferFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr style="background:#f2f2f2;">
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Barcode</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Sample Received Date/Time</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Parameter</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">From Department</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">To Department</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Sample Processed Date/Time</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Handed Over By</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Receiving Dept. Sign</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Verified By</td>
                </tr>
            </thead>
            <tbody id="GE_REG_005__tbody">
                <!-- Empty row for new entry -->
                <tr>
                    <td style="border:1px solid #000; padding:4px;"><input name="barcode[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="datetime-local" name="sample_received_datetime[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="parameter[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="from_department[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="to_department[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="datetime-local" name="sample_processed_datetime[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="handed_over_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="receiving_sign[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="verified_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                </tr>
            </tbody>
        </table>

        <script>
            // Load Inter-Department Sample Transfer records based on filters
            function loadInterDeptTransferData() {
                const fromDate = document.getElementById('GE_REG_005__from_date').value;
                const toDate = document.getElementById('GE_REG_005__to_date').value;

                // At least one date filter required
                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                const fromDepartment = document.getElementById('GE_REG_005__from_department_filter').value;
                if (fromDepartment) params.append('from_department', fromDepartment);

                const toDepartment = document.getElementById('GE_REG_005__to_department_filter').value;
                if (toDepartment) params.append('to_department', toDepartment);

                const location = document.getElementById('GE_REG_005__location').value;
                if (location) params.append('location', location);

                fetch(`/newforms/ge/inter-department-sample-transfer/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    const tbody = document.getElementById('GE_REG_005__tbody');
                    if (!tbody) return;

                    // Clear existing rows
                    tbody.innerHTML = '';

                    // Update datalists
                    if (res.from_departments) {
                        updateREG005Datalist('GE_REG_005__from_dept_list', res.from_departments);
                    }
                    if (res.to_departments) {
                        updateREG005Datalist('GE_REG_005__to_dept_list', res.to_departments);
                    }
                    if (res.locations) {
                        updateREG005Datalist('GE_REG_005__location_list', res.locations);
                    }

                    // If no records found, add one empty row for new entry
                    if (!res.data || res.data.length === 0) {
                        addEmptyRowREG005();
                        return;
                    }

                    // Add all loaded records
                    res.data.forEach((row, index) => {
                        const tr = document.createElement('tr');
                        const receivedDt = row.sample_received_datetime ? row.sample_received_datetime.replace(' ', 'T').substring(0, 16) : '';
                        const processedDt = row.sample_processed_datetime ? row.sample_processed_datetime.replace(' ', 'T').substring(0, 16) : '';
                        tr.innerHTML = `
                            <td style="border:1px solid #000; padding:4px;">
                                <input type="hidden" name="row_id[]" value="${row.id}">
                                <input name="barcode[]" value="${row.barcode || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                            </td>
                            <td style="border:1px solid #000; padding:4px;"><input type="datetime-local" name="sample_received_datetime[]" value="${receivedDt}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="parameter[]" value="${row.parameter || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="from_department[]" value="${row.from_department || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="to_department[]" value="${row.to_department || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input type="datetime-local" name="sample_processed_datetime[]" value="${processedDt}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="handed_over_by[]" value="${row.handed_over_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="receiving_sign[]" value="${row.receiving_sign || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                            <td style="border:1px solid #000; padding:4px;"><input name="verified_by[]" value="${row.verified_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        `;
                        tbody.appendChild(tr);
                    });

                    // Add empty row BELOW loaded records
                    addEmptyRowREG005();
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function clearInterDeptTransferForm() {
                const tbody = document.getElementById('GE_REG_005__tbody');
                if (tbody) {
                    tbody.innerHTML = '';
                    addEmptyRowREG005();
                }
            }

            function addEmptyRowREG005() {
                const tbody = document.getElementById('GE_REG_005__tbody');
                if (!tbody) return;

                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td style="border:1px solid #000; padding:4px;"><input name="barcode[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="datetime-local" name="sample_received_datetime[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="parameter[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="from_department[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="to_department[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="datetime-local" name="sample_processed_datetime[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="handed_over_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="receiving_sign[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="verified_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                `;
                tbody.appendChild(tr);
            }

            function clearInterDeptTransferFilters() {
                document.getElementById('GE_REG_005__from_date').value = '';
                document.getElementById('GE_REG_005__to_date').value = '';
                document.getElementById('GE_REG_005__from_department_filter').value = '';
                document.getElementById('GE_REG_005__to_department_filter').value = '';
                document.getElementById('GE_REG_005__location').value = '';
                clearInterDeptTransferForm();
            }

            function updateREG005Datalist(datalistId, values) {
                const datalist = document.getElementById(datalistId);
                if (!datalist) return;
                const existingOptions = Array.from(datalist.options).map(opt => opt.value);
                values.forEach(value => {
                    if (!existingOptions.includes(value)) {
                        const option = document.createElement('option');
                        option.value = value;
                        datalist.appendChild(option);
                    }
                });
            }

            // AJAX Submit for REG-005
            (function() {
                function initInterDeptTransferForm() {
                    const formContainer = document.querySelector('[id="TDPL/GE/REG-005"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);
                        const submitBtn = form.querySelector('button[type="submit"]');
                        const originalText = submitBtn.textContent;

                        submitBtn.textContent = 'Saving...';
                        submitBtn.disabled = true;

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                showToastREG005('success', result.message || 'Saved successfully!');

                                // Display saved records directly from response
                                const tbody = document.getElementById('GE_REG_005__tbody');
                                if (tbody && result.data && result.data.length > 0) {
                                    tbody.innerHTML = '';

                                    // Add all saved records
                                    result.data.forEach(row => {
                                        const tr = document.createElement('tr');
                                        const receivedDt = row.sample_received_datetime ? row.sample_received_datetime.replace(' ', 'T').substring(0, 16) : '';
                                        const processedDt = row.sample_processed_datetime ? row.sample_processed_datetime.replace(' ', 'T').substring(0, 16) : '';
                                        tr.innerHTML = `
                                            <td style="border:1px solid #000; padding:4px;">
                                                <input type="hidden" name="row_id[]" value="${row.id}">
                                                <input name="barcode[]" value="${row.barcode || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                                            </td>
                                            <td style="border:1px solid #000; padding:4px;"><input type="datetime-local" name="sample_received_datetime[]" value="${receivedDt}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="parameter[]" value="${row.parameter || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="from_department[]" value="${row.from_department || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="to_department[]" value="${row.to_department || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input type="datetime-local" name="sample_processed_datetime[]" value="${processedDt}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="handed_over_by[]" value="${row.handed_over_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="receiving_sign[]" value="${row.receiving_sign || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                            <td style="border:1px solid #000; padding:4px;"><input name="verified_by[]" value="${row.verified_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                                        `;
                                        tbody.appendChild(tr);
                                    });

                                    // Add empty row at end for new entry
                                    addEmptyRowREG005();
                                }
                            } else {
                                showToastREG005('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastREG005('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                function showToastREG005(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position: fixed; top: 20px; right: 20px; z-index: 9999;
                        padding: 15px 25px; border-radius: 5px; color: white;
                        font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.3);
                        background-color: ${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initInterDeptTransferForm);
                } else {
                    initInterDeptTransferForm();
                }
            })();
        </script>

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
