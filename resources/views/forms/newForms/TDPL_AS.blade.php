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


        <x-formTemplete id="TDPL/AS/FOM-001" docNo="TDPL/AS/FOM-001" docName="Sample Volume Check Form" issueNo="2.0"
            issueDate="01/10/2024" buttonText="Submit" action="{{ route('newforms.as.forms.submit') }}">

            <!-- Header Section -->
            <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
                <div>
                    <strong>Month & Year:</strong>
                    <input type="month" name="month_year" id="svc_month_year"
                        style="border:1px solid #000; padding:5px;"
                        onchange="loadSampleVolumeCheck()">
                </div>
                <div>
                    <strong>Location:</strong>
                    <input type="text" name="location" id="svc_location" list="svcLocationList"
                        style="border:1px solid #000; padding:5px; width:180px;" placeholder="All"
                        onchange="loadSampleVolumeCheck()" onblur="loadSampleVolumeCheck()">
                    <datalist id="svcLocationList">
                        <option value="Hyderabad">
                        <option value="Bangalore">
                        <option value="Chennai">
                        <option value="Mumbai">
                        <option value="Delhi">
                    </datalist>
                </div>
                <div>
                    <strong>Department:</strong>
                    <input type="text" name="department" id="svc_department" list="svcDeptList"
                        style="border:1px solid #000; padding:5px; width:200px;" placeholder="All"
                        onchange="loadSampleVolumeCheck()" onblur="loadSampleVolumeCheck()">
                    <datalist id="svcDeptList">
                        <option value="Pathology">
                        <option value="Clinical Laboratory">
                        <option value="Biochemistry">
                        <option value="Hematology">
                        <option value="Microbiology">
                        <option value="Sample Collection">
                        <option value="Diagnostics">
                        <option value="Lab Operations">
                    </datalist>
                </div>
                <button type="button" onclick="clearSampleVolumeCheck()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>

            <input type="hidden" name="form_id" id="svc_form_id">

            <!-- Table -->
            <table style="width:100%; border-collapse:collapse;" border="1">
                <tbody>
                    <tr>
                        <th rowspan="2" style="border:1px solid #000; padding:4px; text-align:center;">Type of Container</th>
                        <th rowspan="2" style="border:1px solid #000; padding:4px; text-align:center;">Required Sample Quantity (ml)</th>
                        <th colspan="12" style="border:1px solid #000; padding:4px; text-align:center;">Date of Sample Volume Review</th>
                    </tr>

                    <tr>
                        @foreach (['Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'] as $m)
                            <th style="border:1px solid #000; padding:4px; text-align:center;">{{ $m }}</th>
                        @endforeach
                    </tr>

                    @php
                        $containers = [
                            'SST Gel Vial (Yellow Top)',
                            'Plain Vial (Red Top)',
                            'EDTA Vial (Lavender Top)',
                            'Sodium Fluoride Vial (Gray Top)',
                            'Sodium Citrate Vial (Blue Top)',
                            'Sodium Heparin Vial (Green Top)',
                        ];
                        $months = ['jul', 'aug', 'sep', 'oct', 'nov', 'dec', 'jan', 'feb', 'mar', 'apr', 'may', 'jun'];
                    @endphp

                    @foreach ($containers as $key => $item)
                        <tr>
                            <td style="border:1px solid #000; padding:4px;">
                                <strong>{{ $item }}</strong>
                                <input type="hidden" name="containers[{{ $key }}][container_type]"
                                    value="{{ $item }}">
                            </td>
                            <td style="border:1px solid #000; padding:4px; text-align:center;">
                                <input type="number" id="svc_required_qty_{{ $key }}"
                                    name="containers[{{ $key }}][required_qty]"
                                    style="width:80px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                            </td>
                            @foreach ($months as $month)
                                <td style="border:1px solid #000; padding:4px; text-align:center;">
                                    <input type="number" id="svc_actual_qty_{{ $key }}_{{ $month }}"
                                        name="containers[{{ $key }}][actual_qty][{{ $month }}]"
                                        style="width:70px; padding:4px; border:1px solid #aaa; border-radius:4px;">
                                </td>
                            @endforeach
                        </tr>
                    @endforeach

                    <tr>
                        <td style="border:1px solid #000; padding:4px;"><strong>Done By</strong></td>
                        <td colspan="13" style="border:1px solid #000; padding:4px;">
                            <input type="text" name="done_by" id="svc_done_by"
                                style="width:100%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>
                    </tr>

                    <tr>
                        <td style="border:1px solid #000; padding:4px;"><strong>Reviewed By</strong></td>
                        <td colspan="13" style="border:1px solid #000; padding:4px;">
                            <input type="text" name="reviewed_by" id="svc_reviewed_by"
                                style="width:100%; padding:4px; border:1px solid #aaa; border-radius:4px;">
                        </td>
                    </tr>

                </tbody>
            </table>

            <p><strong>Note:</strong>
                This random check is done once a month to track and record that the samples are collected up to the required
                mark indicated on the respective vials.
            </p>

            <script>
                function loadSampleVolumeCheck() {
                    const monthYear = document.getElementById('svc_month_year').value;
                    if (!monthYear) return;

                    const location = document.getElementById('svc_location').value;
                    const department = document.getElementById('svc_department').value;

                    const params = new URLSearchParams();
                    params.append('month_year', monthYear);
                    if (location) params.append('location', location);
                    if (department) params.append('department', department);

                    fetch(`/newforms/as/sample-volume-check/load?${params.toString()}`, {
                        headers: { 'X-Requested-With': 'XMLHttpRequest' }
                    })
                    .then(res => res.json())
                    .then(res => {
                        // Clear all inputs first
                        clearSampleVolumeCheckInputs();

                        if (!res.data) {
                            document.getElementById('svc_form_id').value = '';
                            return;
                        }

                        // Set form ID for update
                        document.getElementById('svc_form_id').value = res.data.id;

                        // Populate header fields
                        if (res.data.location) {
                            document.getElementById('svc_location').value = res.data.location;
                        }
                        if (res.data.department) {
                            document.getElementById('svc_department').value = res.data.department;
                        }
                        if (res.data.done_by) {
                            document.getElementById('svc_done_by').value = res.data.done_by;
                        }
                        if (res.data.reviewed_by) {
                            document.getElementById('svc_reviewed_by').value = res.data.reviewed_by;
                        }

                        // Populate container rows
                        if (res.data.containers) {
                            const containerNames = [
                                'SST Gel Vial (Yellow Top)',
                                'Plain Vial (Red Top)',
                                'EDTA Vial (Lavender Top)',
                                'Sodium Fluoride Vial (Gray Top)',
                                'Sodium Citrate Vial (Blue Top)',
                                'Sodium Heparin Vial (Green Top)',
                            ];
                            const months = ['jul','aug','sep','oct','nov','dec','jan','feb','mar','apr','may','jun'];

                            containerNames.forEach((name, key) => {
                                if (!res.data.containers[name]) return;
                                const data = res.data.containers[name];

                                // Required qty
                                const reqEl = document.getElementById(`svc_required_qty_${key}`);
                                if (reqEl && data.required_qty) reqEl.value = data.required_qty;

                                // Month values
                                months.forEach(m => {
                                    const el = document.getElementById(`svc_actual_qty_${key}_${m}`);
                                    if (el && data[m]) el.value = data[m];
                                });
                            });
                        }
                    })
                    .catch(err => console.error('Load error:', err));
                }

                function clearSampleVolumeCheckInputs() {
                    const months = ['jul','aug','sep','oct','nov','dec','jan','feb','mar','apr','may','jun'];
                    for (let k = 0; k < 6; k++) {
                        const reqEl = document.getElementById(`svc_required_qty_${k}`);
                        if (reqEl) reqEl.value = '';
                        months.forEach(m => {
                            const el = document.getElementById(`svc_actual_qty_${k}_${m}`);
                            if (el) el.value = '';
                        });
                    }
                    document.getElementById('svc_location').value = '';
                    document.getElementById('svc_department').value = '';
                    document.getElementById('svc_done_by').value = '';
                    document.getElementById('svc_reviewed_by').value = '';
                    document.getElementById('svc_form_id').value = '';
                }

                function clearSampleVolumeCheck() {
                    document.getElementById('svc_month_year').value = '';
                    clearSampleVolumeCheckInputs();
                }

                // AJAX Submit for Sample Volume Check
                (function() {
                    function initSampleVolumeCheckForm() {
                        const formContainer = document.querySelector('[id="TDPL/AS/FOM-001"]');
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
                                    showToastSVC('success', result.message || 'Saved successfully!');
                                    // Update form_id if returned
                                    if (result.form_id) {
                                        document.getElementById('svc_form_id').value = result.form_id;
                                    }
                                } else {
                                    showToastSVC('error', result.message || 'Failed to save');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                showToastSVC('error', 'Failed to save. Please try again.');
                            })
                            .finally(() => {
                                if (submitBtn) {
                                    submitBtn.textContent = originalText;
                                    submitBtn.disabled = false;
                                }
                            });
                        });
                    }

                    function showToastSVC(type, message) {
                        const toast = document.createElement('div');
                        toast.style.cssText = `
                            position:fixed; top:20px; right:20px; z-index:9999;
                            padding:12px 24px; border-radius:6px; color:#fff; font-size:14px;
                            box-shadow:0 4px 12px rgba(0,0,0,0.15);
                            background:${type === 'success' ? '#28a745' : '#dc3545'};
                        `;
                        toast.textContent = message;
                        document.body.appendChild(toast);
                        setTimeout(() => toast.remove(), 3000);
                    }

                    if (document.readyState === 'loading') {
                        document.addEventListener('DOMContentLoaded', initSampleVolumeCheckForm);
                    } else {
                        initSampleVolumeCheckForm();
                    }
                })();
            </script>

        </x-formTemplete>

        <x-formTemplete id="TDPL/AS/REG-001" docNo="TDPL/AS/REG-001" docName="Sample Receiving Register" issueNo="2.0"
            issueDate="01/10/2024" buttonText="Submit"
            action="{{ route('newforms.as.forms.submit') }}">

            <!-- Filter Section -->
            <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
                <div>
                    <label><strong>From Date</strong></label>
                    <input type="date" id="srFromDate" name="srFromDate"
                        onchange="loadSampleReceivingRegister()"
                        style="border:1px solid #000; padding:4px; width:140px; display:block;">
                </div>
                <div>
                    <label><strong>To Date</strong></label>
                    <input type="date" id="srToDate"
                        onchange="loadSampleReceivingRegister()"
                        style="border:1px solid #000; padding:4px; width:140px; display:block;">
                </div>
                <div>
                    <label><strong>Location</strong></label>
                    <input type="text" name="srLocation" id="srLocation" list="srLocList"
                        onchange="loadSampleReceivingRegister()" onblur="loadSampleReceivingRegister()"
                        style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                    <datalist id="srLocList">
                        <option value="Hyderabad">
                        <option value="Bangalore">
                        <option value="Chennai">
                    </datalist>
                </div>
                <div>
                    <label><strong>Department</strong></label>
                    <input type="text" name="srDepartment" id="srDepartment" list="srDeptList"
                        onchange="loadSampleReceivingRegister()" onblur="loadSampleReceivingRegister()"
                        style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                    <datalist id="srDeptList">
                        <option value="Biochemistry">
                        <option value="Pathology">
                        <option value="Hematology">
                    </datalist>
                </div>
                <div>
                    <label><strong>Equipment / TL Code</strong></label>
                    <input type="text" name="srEquipmentId" id="srEquipmentId" list="srEquipList"
                        onchange="loadSampleReceivingRegister()" onblur="loadSampleReceivingRegister()"
                        style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                    <datalist id="srEquipList">
                        <option value="TL001">
                        <option value="TL002">
                    </datalist>
                </div>
                <div style="display:flex; align-items:flex-end;">
                    <button type="button" onclick="clearSampleReceivingFilters()"
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
                        <td style="padding:6px; border:1px solid #000; font-weight:bold;">Time</td>
                        <td style="padding:6px; border:1px solid #000; font-weight:bold;">Client Location</td>
                        <td style="padding:6px; border:1px solid #000; font-weight:bold;">Client Name</td>
                        <td style="padding:6px; border:1px solid #000; font-weight:bold;">TL Code</td>
                        <td style="padding:6px; border:1px solid #000; font-weight:bold;"># Blood Samples</td>
                        <td style="padding:6px; border:1px solid #000; font-weight:bold;"># Other Samples</td>
                        <td style="padding:6px; border:1px solid #000; font-weight:bold;">CSR Name</td>
                        <td style="padding:6px; border:1px solid #000; font-weight:bold;">CSR Sign</td>
                        <td style="padding:6px; border:1px solid #000; font-weight:bold;">Sample Temp</td>
                        <td style="padding:6px; border:1px solid #000; font-weight:bold;">Receiver Name</td>
                        <td style="padding:6px; border:1px solid #000; font-weight:bold;">Remarks</td>
                    </tr>
                </thead>
                <tbody id="srTableBody">
                    <tr>
                        <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input type="time" name="row_time[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_client_location[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_client_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_tl_code[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input type="number" name="row_blood_samples[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input type="number" name="row_other_samples[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_csr_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_csr_sign[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_sample_temp[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_receiver_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_remarks[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    </tr>
                </tbody>
            </table>

            <script>
                function loadSampleReceivingRegister() {
                    const fromDate = document.getElementById('srFromDate').value;
                    const toDate = document.getElementById('srToDate').value;

                    if (!fromDate && !toDate) return;

                    const params = new URLSearchParams();
                    if (fromDate) params.append('from_date', fromDate);
                    if (toDate) params.append('to_date', toDate);

                    const location = document.getElementById('srLocation').value;
                    if (location) params.append('location', location);

                    const department = document.getElementById('srDepartment').value;
                    if (department) params.append('department', department);

                    const equipment = document.getElementById('srEquipmentId').value;
                    if (equipment) params.append('equipment', equipment);

                    fetch(`/newforms/as/sample-receiving-register/load?${params.toString()}`, {
                        headers: { 'X-Requested-With': 'XMLHttpRequest' }
                    })
                    .then(res => res.json())
                    .then(res => {
                        const tbody = document.getElementById('srTableBody');
                        if (!tbody) return;

                        tbody.innerHTML = '';

                        if (!res.data || res.data.length === 0) {
                            addEmptyRowREG001();
                            return;
                        }

                        res.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildREG001RowHTML(row);
                            tbody.appendChild(tr);
                        });

                        addEmptyRowREG001();
                    })
                    .catch(error => console.error('Error loading data:', error));
                }

                function buildREG001RowHTML(row) {
                    return `
                        <td style="border:1px solid #000; padding:4px;">
                            <input type="hidden" name="row_id[]" value="${row.id}">
                            <input type="date" name="row_date[]" value="${row.date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                        </td>
                        <td style="border:1px solid #000; padding:4px;"><input type="time" name="row_time[]" value="${row.time || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_client_location[]" value="${row.client_location || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_client_name[]" value="${row.client_name || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_tl_code[]" value="${row.tl_code || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input type="number" name="row_blood_samples[]" value="${row.blood_samples || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input type="number" name="row_other_samples[]" value="${row.other_samples || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_csr_name[]" value="${row.csr_name || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_csr_sign[]" value="${row.csr_sign || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_sample_temp[]" value="${row.sample_temp || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_receiver_name[]" value="${row.receiver_name || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_remarks[]" value="${row.remarks || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    `;
                }

                function addEmptyRowREG001() {
                    const tbody = document.getElementById('srTableBody');
                    if (!tbody) return;

                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input type="time" name="row_time[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_client_location[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_client_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_tl_code[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input type="number" name="row_blood_samples[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input type="number" name="row_other_samples[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_csr_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_csr_sign[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_sample_temp[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_receiver_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_remarks[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    `;
                    tbody.appendChild(tr);
                }

                function clearSampleReceivingFilters() {
                    document.getElementById('srFromDate').value = '';
                    document.getElementById('srToDate').value = '';
                    document.getElementById('srLocation').value = '';
                    document.getElementById('srDepartment').value = '';
                    document.getElementById('srEquipmentId').value = '';
                    const tbody = document.getElementById('srTableBody');
                    if (tbody) {
                        tbody.innerHTML = '';
                        addEmptyRowREG001();
                    }
                }

                // AJAX Submit for REG-001
                (function() {
                    function initSampleReceivingForm() {
                        const formContainer = document.querySelector('[id="TDPL/AS/REG-001"]');
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

                                    const tbody = document.getElementById('srTableBody');
                                    if (tbody && result.data && result.data.length > 0) {
                                        tbody.innerHTML = '';
                                        result.data.forEach(row => {
                                            const tr = document.createElement('tr');
                                            tr.innerHTML = buildREG001RowHTML(row);
                                            tbody.appendChild(tr);
                                        });
                                        addEmptyRowREG001();
                                    }
                                } else {
                                    showToastREG001('error', result.message || 'Save failed!');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                showToastREG001('error', 'Failed to save data');
                            })
                            .finally(() => {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            });
                        });
                    }

                    if (document.readyState === 'loading') {
                        document.addEventListener('DOMContentLoaded', initSampleReceivingForm);
                    } else {
                        initSampleReceivingForm();
                    }
                })();

                function showToastREG001(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = `
                        position:fixed; top:20px; right:20px; z-index:9999;
                        padding:12px 24px; border-radius:6px; color:#fff; font-size:14px;
                        box-shadow:0 4px 12px rgba(0,0,0,0.15);
                        background:${type === 'success' ? '#28a745' : '#dc3545'};
                    `;
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }
            </script>

        </x-formTemplete>

        <x-formTemplete id="TDPL/AS/REG-003" docNo="TDPL/AS/REG-003"
            docName="Sample Delivery Register" issueNo="2.0" issueDate="01/10/2024" buttonText="Submit"
            action="{{ route('newforms.as.forms.submit') }}">

            <!-- Filter Section -->
            <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
                <div>
                    <label><strong>From Date</strong></label>
                    <input type="date" id="sdFromDate"
                        onchange="loadSampleDeliveryRegister()"
                        style="border:1px solid #000; padding:4px; width:140px; display:block;">
                </div>
                <div>
                    <label><strong>To Date</strong></label>
                    <input type="date" id="sdToDate"
                        onchange="loadSampleDeliveryRegister()"
                        style="border:1px solid #000; padding:4px; width:140px; display:block;">
                </div>
                <div>
                    <label><strong>Location</strong></label>
                    <input type="text" name="sdLocation" id="sdLocation" list="sdLocList"
                        onchange="loadSampleDeliveryRegister()" onblur="loadSampleDeliveryRegister()"
                        style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                    <datalist id="sdLocList">
                        <option value="Hyderabad">
                        <option value="Bangalore">
                        <option value="Chennai">
                    </datalist>
                </div>
                <div>
                    <label><strong>Department</strong></label>
                    <input type="text" name="sdDepartment" id="sdDepartment" list="sdDeptList"
                        onchange="loadSampleDeliveryRegister()" onblur="loadSampleDeliveryRegister()"
                        style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                    <datalist id="sdDeptList">
                        <option value="Biochemistry">
                        <option value="Pathology">
                        <option value="Hematology">
                    </datalist>
                </div>
                <div>
                    <label><strong>Equipment / TL Code</strong></label>
                    <input type="text" name="sdEquipmentId" id="sdEquipmentId" list="sdEquipList"
                        onchange="loadSampleDeliveryRegister()" onblur="loadSampleDeliveryRegister()"
                        style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                    <datalist id="sdEquipList">
                        <option value="TL001">
                        <option value="TL002">
                    </datalist>
                </div>
                <div style="display:flex; align-items:flex-end;">
                    <button type="button" onclick="clearSampleDeliveryFilters()"
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
                        <td style="padding:6px; border:1px solid #000; font-weight:bold;">Barcode</td>
                        <td style="padding:6px; border:1px solid #000; font-weight:bold;"># Samples</td>
                        <td style="padding:6px; border:1px solid #000; font-weight:bold;">Dest. Department</td>
                        <td style="padding:6px; border:1px solid #000; font-weight:bold;">Taken from Accession</td>
                        <td style="padding:6px; border:1px solid #000; font-weight:bold;">Verified by</td>
                        <td style="padding:6px; border:1px solid #000; font-weight:bold;">Delivered to Dept.</td>
                        <td style="padding:6px; border:1px solid #000; font-weight:bold;">Received at Dept.</td>
                        <td style="padding:6px; border:1px solid #000; font-weight:bold;">Remarks</td>
                    </tr>
                </thead>
                <tbody id="sdTableBody">
                    <tr>
                        <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_barcode[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input type="number" name="row_samples[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_department[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_taken_from_accession[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_verified_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_delivered_to_dept[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_received_at_dept[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_remarks[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    </tr>
                </tbody>
            </table>

            <script>
                function loadSampleDeliveryRegister() {
                    const fromDate = document.getElementById('sdFromDate').value;
                    const toDate = document.getElementById('sdToDate').value;

                    if (!fromDate && !toDate) return;

                    const params = new URLSearchParams();
                    if (fromDate) params.append('from_date', fromDate);
                    if (toDate) params.append('to_date', toDate);

                    const location = document.getElementById('sdLocation').value;
                    if (location) params.append('location', location);

                    const department = document.getElementById('sdDepartment').value;
                    if (department) params.append('department', department);

                    const equipment = document.getElementById('sdEquipmentId').value;
                    if (equipment) params.append('equipment', equipment);

                    fetch(`/newforms/as/sample-delivery-register/load?${params.toString()}`, {
                        headers: { 'X-Requested-With': 'XMLHttpRequest' }
                    })
                    .then(res => res.json())
                    .then(res => {
                        const tbody = document.getElementById('sdTableBody');
                        if (!tbody) return;

                        tbody.innerHTML = '';

                        if (!res.data || res.data.length === 0) {
                            addEmptyRowREG003();
                            return;
                        }

                        res.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildREG003RowHTML(row);
                            tbody.appendChild(tr);
                        });

                        addEmptyRowREG003();
                    })
                    .catch(error => console.error('Error loading data:', error));
                }

                function buildREG003RowHTML(row) {
                    return `
                        <td style="border:1px solid #000; padding:4px;">
                            <input type="hidden" name="row_id[]" value="${row.id}">
                            <input type="date" name="row_date[]" value="${row.date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                        </td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_barcode[]" value="${row.barcode || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input type="number" name="row_samples[]" value="${row.samples || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_department[]" value="${row.department || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_taken_from_accession[]" value="${row.taken_from_accession || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_verified_by[]" value="${row.verified_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_delivered_to_dept[]" value="${row.delivered_to_dept || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_received_at_dept[]" value="${row.received_at_dept || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_remarks[]" value="${row.remarks || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    `;
                }

                function addEmptyRowREG003() {
                    const tbody = document.getElementById('sdTableBody');
                    if (!tbody) return;

                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_barcode[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input type="number" name="row_samples[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_department[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_taken_from_accession[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_verified_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_delivered_to_dept[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_received_at_dept[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_remarks[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    `;
                    tbody.appendChild(tr);
                }

                function clearSampleDeliveryFilters() {
                    document.getElementById('sdFromDate').value = '';
                    document.getElementById('sdToDate').value = '';
                    document.getElementById('sdLocation').value = '';
                    document.getElementById('sdDepartment').value = '';
                    document.getElementById('sdEquipmentId').value = '';
                    const tbody = document.getElementById('sdTableBody');
                    if (tbody) {
                        tbody.innerHTML = '';
                        addEmptyRowREG003();
                    }
                }

                // AJAX Submit for REG-003
                (function() {
                    function initSampleDeliveryForm() {
                        const formContainer = document.querySelector('[id="TDPL/AS/REG-003"]');
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

                                    const tbody = document.getElementById('sdTableBody');
                                    if (tbody && result.data && result.data.length > 0) {
                                        tbody.innerHTML = '';
                                        result.data.forEach(row => {
                                            const tr = document.createElement('tr');
                                            tr.innerHTML = buildREG003RowHTML(row);
                                            tbody.appendChild(tr);
                                        });
                                        addEmptyRowREG003();
                                    }
                                } else {
                                    showToastREG003('error', result.message || 'Save failed!');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                showToastREG003('error', 'Failed to save data');
                            })
                            .finally(() => {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            });
                        });
                    }

                    function showToastREG003(type, message) {
                        const toast = document.createElement('div');
                        toast.style.cssText = `
                            position:fixed; top:20px; right:20px; z-index:9999;
                            padding:12px 24px; border-radius:6px; color:#fff; font-size:14px;
                            box-shadow:0 4px 12px rgba(0,0,0,0.15);
                            background:${type === 'success' ? '#28a745' : '#dc3545'};
                        `;
                        toast.textContent = message;
                        document.body.appendChild(toast);
                        setTimeout(() => toast.remove(), 3000);
                    }

                    if (document.readyState === 'loading') {
                        document.addEventListener('DOMContentLoaded', initSampleDeliveryForm);
                    } else {
                        initSampleDeliveryForm();
                    }
                })();
            </script>

        </x-formTemplete>


        <x-formTemplete id="TDPL/AS/REG-004" docNo="TDPL/AS/REG-004" docName="Ice Gel Packs Distribution Register"
            issueNo="2.0" issueDate="01/10/2024" buttonText="Submit"
            action="{{ route('newforms.as.forms.submit') }}">

            <!-- Filter Section -->
            <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
                <div>
                    <label><strong>From Date</strong></label>
                    <input type="date" id="igFromDate"
                        onchange="loadIceGelRegister()"
                        style="border:1px solid #000; padding:4px; width:140px; display:block;">
                </div>
                <div>
                    <label><strong>To Date</strong></label>
                    <input type="date" id="igToDate"
                        onchange="loadIceGelRegister()"
                        style="border:1px solid #000; padding:4px; width:140px; display:block;">
                </div>
                <div>
                    <label><strong>Location</strong></label>
                    <input type="text" name="igLocation" id="igLocation" list="igLocList"
                        onchange="loadIceGelRegister()" onblur="loadIceGelRegister()"
                        style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                    <datalist id="igLocList">
                        <option value="Hyderabad">
                        <option value="Bangalore">
                        <option value="Chennai">
                    </datalist>
                </div>
                <div>
                    <label><strong>Department</strong></label>
                    <input type="text" name="igDepartment" id="igDepartment" list="igDeptList"
                        onchange="loadIceGelRegister()" onblur="loadIceGelRegister()"
                        style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                    <datalist id="igDeptList">
                        <option value="Biochemistry">
                        <option value="Pathology">
                        <option value="Hematology">
                    </datalist>
                </div>
                <div style="display:flex; align-items:flex-end;">
                    <button type="button" onclick="clearIceGelFilters()"
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
                        <td style="padding:6px; border:1px solid #000; font-weight:bold;">Quantity</td>
                        <td style="padding:6px; border:1px solid #000; font-weight:bold;">Handed over by (Name & Time)</td>
                        <td style="padding:6px; border:1px solid #000; font-weight:bold;">Received by (Name & Time)</td>
                        <td style="padding:6px; border:1px solid #000; font-weight:bold;">Returned</td>
                        <td style="padding:6px; border:1px solid #000; font-weight:bold;">Remarks</td>
                    </tr>
                </thead>
                <tbody id="igTableBody">
                    <tr>
                        <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input type="number" name="row_quantity[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_handed_over_by[]" placeholder="Name & Time" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_received_by[]" placeholder="Name & Time" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;">
                            <select name="row_returned[]" style="width:100%; border:1px solid #ccc; padding:4px;">
                                <option value="">--</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_remarks[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    </tr>
                </tbody>
            </table>

            <script>
                function loadIceGelRegister() {
                    const fromDate = document.getElementById('igFromDate').value;
                    const toDate = document.getElementById('igToDate').value;

                    if (!fromDate && !toDate) return;

                    const params = new URLSearchParams();
                    if (fromDate) params.append('from_date', fromDate);
                    if (toDate) params.append('to_date', toDate);

                    const location = document.getElementById('igLocation').value;
                    if (location) params.append('location', location);

                    const department = document.getElementById('igDepartment').value;
                    if (department) params.append('department', department);

                    fetch(`/newforms/as/ice-gel-register/load?${params.toString()}`, {
                        headers: { 'X-Requested-With': 'XMLHttpRequest' }
                    })
                    .then(res => res.json())
                    .then(res => {
                        const tbody = document.getElementById('igTableBody');
                        if (!tbody) return;

                        tbody.innerHTML = '';

                        if (!res.data || res.data.length === 0) {
                            addEmptyRowREG004();
                            return;
                        }

                        res.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildREG004RowHTML(row);
                            tbody.appendChild(tr);
                        });

                        addEmptyRowREG004();
                    })
                    .catch(error => console.error('Error loading data:', error));
                }

                function buildREG004RowHTML(row) {
                    return `
                        <td style="border:1px solid #000; padding:4px;">
                            <input type="hidden" name="row_id[]" value="${row.id}">
                            <input type="date" name="row_date[]" value="${row.date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                        </td>
                        <td style="border:1px solid #000; padding:4px;"><input type="number" name="row_quantity[]" value="${row.quantity || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_handed_over_by[]" value="${row.handed_over_by || ''}" placeholder="Name & Time" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_received_by[]" value="${row.received_by || ''}" placeholder="Name & Time" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;">
                            <select name="row_returned[]" style="width:100%; border:1px solid #ccc; padding:4px;">
                                <option value="">--</option>
                                <option value="yes" ${row.returned === 'yes' ? 'selected' : ''}>Yes</option>
                                <option value="no" ${row.returned === 'no' ? 'selected' : ''}>No</option>
                            </select>
                        </td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_remarks[]" value="${row.remarks || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    `;
                }

                function addEmptyRowREG004() {
                    const tbody = document.getElementById('igTableBody');
                    if (!tbody) return;

                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input type="number" name="row_quantity[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_handed_over_by[]" placeholder="Name & Time" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_received_by[]" placeholder="Name & Time" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;">
                            <select name="row_returned[]" style="width:100%; border:1px solid #ccc; padding:4px;">
                                <option value="">--</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_remarks[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    `;
                    tbody.appendChild(tr);
                }

                function clearIceGelFilters() {
                    document.getElementById('igFromDate').value = '';
                    document.getElementById('igToDate').value = '';
                    document.getElementById('igLocation').value = '';
                    document.getElementById('igDepartment').value = '';
                    const tbody = document.getElementById('igTableBody');
                    if (tbody) {
                        tbody.innerHTML = '';
                        addEmptyRowREG004();
                    }
                }

                // AJAX Submit for REG-004
                (function() {
                    function initIceGelForm() {
                        const formContainer = document.querySelector('[id="TDPL/AS/REG-004"]');
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
                                    showToastREG004('success', result.message || 'Saved successfully!');

                                    const tbody = document.getElementById('igTableBody');
                                    if (tbody && result.data && result.data.length > 0) {
                                        tbody.innerHTML = '';
                                        result.data.forEach(row => {
                                            const tr = document.createElement('tr');
                                            tr.innerHTML = buildREG004RowHTML(row);
                                            tbody.appendChild(tr);
                                        });
                                        addEmptyRowREG004();
                                    }
                                } else {
                                    showToastREG004('error', result.message || 'Save failed!');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                showToastREG004('error', 'Failed to save data');
                            })
                            .finally(() => {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            });
                        });
                    }

                    function showToastREG004(type, message) {
                        const toast = document.createElement('div');
                        toast.style.cssText = `
                            position:fixed; top:20px; right:20px; z-index:9999;
                            padding:12px 24px; border-radius:6px; color:#fff; font-size:14px;
                            box-shadow:0 4px 12px rgba(0,0,0,0.15);
                            background:${type === 'success' ? '#28a745' : '#dc3545'};
                        `;
                        toast.textContent = message;
                        document.body.appendChild(toast);
                        setTimeout(() => toast.remove(), 3000);
                    }

                    if (document.readyState === 'loading') {
                        document.addEventListener('DOMContentLoaded', initIceGelForm);
                    } else {
                        initIceGelForm();
                    }
                })();
            </script>

        </x-formTemplete>


        <x-formTemplete id="TDPL/AS/REG-005" docNo="TDPL/AS/REG-005" docName="Sample Outsource Register" issueNo="2.0"
            issueDate="01/10/2024" buttonText="Submit" action="{{ route('newforms.as.forms.submit') }}">

            <!-- Filter Section -->
            <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
                <div>
                    <label><strong>From Date</strong></label>
                    <input type="date" id="soFromDate"
                        onchange="loadSampleOutsourceRegister()"
                        style="border:1px solid #000; padding:4px; width:140px; display:block;">
                </div>
                <div>
                    <label><strong>To Date</strong></label>
                    <input type="date" id="soToDate"
                        onchange="loadSampleOutsourceRegister()"
                        style="border:1px solid #000; padding:4px; width:140px; display:block;">
                </div>
                <div>
                    <label><strong>Location</strong></label>
                    <input type="text" name="soLocation" id="soLocation" list="soLocList"
                        onchange="loadSampleOutsourceRegister()" onblur="loadSampleOutsourceRegister()"
                        style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                    <datalist id="soLocList">
                        <option value="Hyderabad">
                        <option value="Bangalore">
                        <option value="Chennai">
                    </datalist>
                </div>
                <div>
                    <label><strong>Department</strong></label>
                    <input type="text" name="soDepartment" id="soDepartment" list="soDeptList"
                        onchange="loadSampleOutsourceRegister()" onblur="loadSampleOutsourceRegister()"
                        style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                    <datalist id="soDeptList">
                        <option value="Biochemistry">
                        <option value="Pathology">
                        <option value="Hematology">
                    </datalist>
                </div>
                <div>
                    <label><strong>Equipment / TL Code</strong></label>
                    <input type="text" name="soEquipmentId" id="soEquipmentId" list="soEquipList"
                        onchange="loadSampleOutsourceRegister()" onblur="loadSampleOutsourceRegister()"
                        style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                    <datalist id="soEquipList">
                        <option value="TL001">
                        <option value="TL002">
                    </datalist>
                </div>
                <div style="display:flex; align-items:flex-end;">
                    <button type="button" onclick="clearSampleOutsourceFilters()"
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
                        <td style="padding:6px; border:1px solid #000; font-weight:bold;">Barcode</td>
                        <td style="padding:6px; border:1px solid #000; font-weight:bold;">Patient Name</td>
                        <td style="padding:6px; border:1px solid #000; font-weight:bold;">Department</td>
                        <td style="padding:6px; border:1px solid #000; font-weight:bold;">Test Name & Code</td>
                        <td style="padding:6px; border:1px solid #000; font-weight:bold;">Sample Handover Sign (Accession)</td>
                        <td style="padding:6px; border:1px solid #000; font-weight:bold;">Sample Receiver Sign (Front Office)</td>
                        <td style="padding:6px; border:1px solid #000; font-weight:bold;">Sample Handover to OS Lab By</td>
                        <td style="padding:6px; border:1px solid #000; font-weight:bold;">OS Lab Receiver Name, Sign</td>
                    </tr>
                </thead>
                <tbody id="soTableBody">
                    <tr>
                        <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_bar_code[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_patient_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_department[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_testname_code[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_sample_handover_sign[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_sample_receiver_sign[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_sample_handover_to_os[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_os_lab_receiver_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    </tr>
                </tbody>
            </table>

            <p><em>*OS = Outsource</em></p>

            <script>
                function loadSampleOutsourceRegister() {
                    const fromDate = document.getElementById('soFromDate').value;
                    const toDate = document.getElementById('soToDate').value;

                    if (!fromDate && !toDate) return;

                    const params = new URLSearchParams();
                    if (fromDate) params.append('from_date', fromDate);
                    if (toDate) params.append('to_date', toDate);

                    const location = document.getElementById('soLocation').value;
                    if (location) params.append('location', location);

                    const department = document.getElementById('soDepartment').value;
                    if (department) params.append('department', department);

                    const equipment = document.getElementById('soEquipmentId').value;
                    if (equipment) params.append('equipment', equipment);

                    fetch(`/newforms/as/sample-outsource-register/load?${params.toString()}`, {
                        headers: { 'X-Requested-With': 'XMLHttpRequest' }
                    })
                    .then(res => res.json())
                    .then(res => {
                        const tbody = document.getElementById('soTableBody');
                        if (!tbody) return;

                        tbody.innerHTML = '';

                        if (!res.data || res.data.length === 0) {
                            addEmptyRowREG005();
                            return;
                        }

                        res.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildREG005RowHTML(row);
                            tbody.appendChild(tr);
                        });

                        addEmptyRowREG005();
                    })
                    .catch(error => console.error('Error loading data:', error));
                }

                function buildREG005RowHTML(row) {
                    return `
                        <td style="border:1px solid #000; padding:4px;">
                            <input type="hidden" name="row_id[]" value="${row.id}">
                            <input type="date" name="row_date[]" value="${row.date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                        </td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_bar_code[]" value="${row.bar_code || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_patient_name[]" value="${row.patient_name || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_department[]" value="${row.destination_department || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_testname_code[]" value="${row.testname_code || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_sample_handover_sign[]" value="${row.sample_handover_sign || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_sample_receiver_sign[]" value="${row.sample_receiver_sign || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_sample_handover_to_os[]" value="${row.sample_handover_to_os || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_os_lab_receiver_name[]" value="${row.os_lab_receiver_name || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    `;
                }

                function addEmptyRowREG005() {
                    const tbody = document.getElementById('soTableBody');
                    if (!tbody) return;

                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_bar_code[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_patient_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_department[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_testname_code[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_sample_handover_sign[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_sample_receiver_sign[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_sample_handover_to_os[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                        <td style="border:1px solid #000; padding:4px;"><input name="row_os_lab_receiver_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    `;
                    tbody.appendChild(tr);
                }

                function clearSampleOutsourceFilters() {
                    document.getElementById('soFromDate').value = '';
                    document.getElementById('soToDate').value = '';
                    document.getElementById('soLocation').value = '';
                    document.getElementById('soDepartment').value = '';
                    document.getElementById('soEquipmentId').value = '';
                    const tbody = document.getElementById('soTableBody');
                    if (tbody) {
                        tbody.innerHTML = '';
                        addEmptyRowREG005();
                    }
                }

                // AJAX Submit for REG-005
                (function() {
                    function initSampleOutsourceForm() {
                        const formContainer = document.querySelector('[id="TDPL/AS/REG-005"]');
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

                                    const tbody = document.getElementById('soTableBody');
                                    if (tbody && result.data && result.data.length > 0) {
                                        tbody.innerHTML = '';
                                        result.data.forEach(row => {
                                            const tr = document.createElement('tr');
                                            tr.innerHTML = buildREG005RowHTML(row);
                                            tbody.appendChild(tr);
                                        });
                                        addEmptyRowREG005();
                                    }
                                } else {
                                    showToastREG005('error', result.message || 'Save failed!');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                showToastREG005('error', 'Failed to save data');
                            })
                            .finally(() => {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            });
                        });
                    }

                    function showToastREG005(type, message) {
                        const toast = document.createElement('div');
                        toast.style.cssText = `
                            position:fixed; top:20px; right:20px; z-index:9999;
                            padding:12px 24px; border-radius:6px; color:#fff; font-size:14px;
                            box-shadow:0 4px 12px rgba(0,0,0,0.15);
                            background:${type === 'success' ? '#28a745' : '#dc3545'};
                        `;
                        toast.textContent = message;
                        document.body.appendChild(toast);
                        setTimeout(() => toast.remove(), 3000);
                    }

                    if (document.readyState === 'loading') {
                        document.addEventListener('DOMContentLoaded', initSampleOutsourceForm);
                    } else {
                        initSampleOutsourceForm();
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
            // 🔥 MANUAL LOAD (on open)

        }

        function goBack() {
            // 🔥 Full page refresh to clear:
            // - filters
            // - JS state
            // - fetched table data
            // - active/inactive sections
            window.location.reload();
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

        // // Submit form data
        // document.getElementById('submitBtn1').addEventListener('click', function() {
        //     // Get analyzer data
        //     // const analyzerRows = document.querySelectorAll('#analyzerTable tbody tr');
        //     // const analyzerData = {
        //     //     department: analyzerRows[0].cells[1].textContent.trim(),
        //     //     analyzer_sr_no: analyzerRows[1].cells[1].textContent.trim(),
        //     //     analyzer_type: analyzerRows[2].cells[1].textContent.trim(),
        //     //     validation: analyzerRows[3].cells[1].textContent.trim(),
        //     //     remarks: analyzerRows[5].cells[1].textContent.trim()
        //     // };

        //     // Get tests data
        //     const testRows = document.querySelectorAll('#testsTable tbody tr');
        //     const testsData = [];

        //     testRows.forEach(row => {
        //         const cells = row.cells;
        //         testsData.push({
        //             sr_no: cells[0].textContent.trim(),
        //             device: cells[1].textContent.trim(),
        //             assay_code: cells[2].textContent.trim(),
        //             test_name: cells[3].textContent.trim(),
        //             equipment: cells[4].textContent.trim(),
        //             lis: cells[5].textContent.trim()
        //         });
        //     });

        //     // Prepare complete data
        //     const formData = {
        //         // analyzer: analyzerData,
        //         tests: testsData
        //     };

        //     // Send to server
        //     fetch('/lis-interface-logs-store', {
        //             method: 'POST',
        //             headers: {
        //                 'Content-Type': 'application/json',
        //                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        //             },
        //             body: JSON.stringify(formData)
        //         })
        //         .then(response => response.json())
        //         .then(data => {
        //             if (data.success) {
        //                 alert('Data saved successfully!');
        //             } else {
        //                 alert('Error: ' + (data.message || 'Failed to save data'));
        //             }
        //         })
        //         .catch(error => {
        //             console.error('Error:', error);
        //             alert('Failed to save data');
        //         });
        // });

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

    // (Sample Volume Check load/clear functions moved into form template script)





    function renderTableRows(tbody, rows, type) {

        tbody.replaceChildren();

        if (!rows || rows.length === 0) {
            const tr = document.createElement('tr');
            const td = document.createElement('td');
            td.colSpan = tbody.closest('table').rows[0].cells.length;
            td.className = 'text-center';
            td.textContent = 'No records found';
            tr.appendChild(td);
            tbody.appendChild(tr);
            return;
        }

        rows.forEach((row, index) => {

            const tr = document.createElement('tr');

            // ✅ Hidden ID inside TD
            const idTd = document.createElement('td');
            idTd.style.display = 'none';

            const idInput = document.createElement('input');
            idInput.type = 'hidden';
            idInput.name = `rows[${index}][id]`;
            idInput.value = row.id;

            idTd.appendChild(idInput);
            tr.appendChild(idTd);

            getColumns(type).forEach(col => {
                tr.appendChild(
                    createCell(col, row[col], index, fullRow = row)
                );
            });

            tbody.appendChild(tr);
        });
    }


    function getColumns(type) {

        const map = {
            SR: [
                'date', 'time', 'client_location', 'client_name', 'tl_code',
                'blood_samples', 'other_samples', 'csr_name', 'csr_sign',
                'sample_temp', 'receiver_name', 'remarks'
            ],
            SD: [
                'date', 'barcode', 'samples', 'department', 'taken_from_accession',
                'verified_by', 'delivered_to_dept', 'received_at_dept', 'remarks'
            ],
            IG: [
                'date', 'quantity', 'handed_over_by', 'received_by',
                'returned_yes', 'returned_no', 'remarks'
            ],
            SO: [
                'date', 'bar_code', 'patient_name', 'department', 'testname_code',
                'sample_handover_sign', 'sample_receiver_sign',
                'sample_handover_to_os', 'os_lab_receiver_name'
            ]
        };

        return map[type];
    }

    function createCell(name, value, rowIndex, fullRow = {}) {

        const td = document.createElement('td');

        // ICE GEL RADIO
        if (name === 'returned_yes' || name === 'returned_no') {

            const radio = document.createElement('input');
            radio.type = 'radio';
            radio.name = `rows[${rowIndex}][returned]`;

            if (name === 'returned_yes') {
                radio.value = 'yes';
                radio.checked = fullRow.returned === 'yes';
            }

            if (name === 'returned_no') {
                radio.value = 'no';
                radio.checked = fullRow.returned === 'no';
            }

            td.appendChild(radio);
            return td;
        }

        // NORMAL INPUT
        const input = document.createElement('input');
        input.className = 'w-full border-0';
        input.name = `rows[${rowIndex}][${name}]`; // ✅ KEY FIX
        input.value = value ?? '';

        td.appendChild(input);
        return td;
    }

    function handleDatalistInput(inputEl, datalistId, callback) {
        const value = inputEl.value;

        const options = document.querySelectorAll(`#${datalistId} option`);
            const matched = [...options].some(opt => opt.value === value);

            // ✅ ONLY dropdown select
            if (matched && typeof callback === 'function') {

                callback(); // apply filter / load data

            }
        }


        function handleFormSubmit(event, form) {

            if (form.hasAttribute('data-inline')) {
                event.preventDefault();

                const formData = new FormData(form);

                fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: formData
                    })
                    .then(res => res.json())
                    .then(res => {
                        if (res.success) {
                            const srTable = document.getElementById('srTableBody');
                            if (srTable && res.data) {
                                renderTableRows(srTable, res.data, 'SR');
                            }
                        }
                    })
                    .catch(err => console.error(err));

                return false; // 🔴 VERY IMPORTANT
            }

            return true; // 🟢 allow normal submit
        }
    </script>

    </html>
@endsection
