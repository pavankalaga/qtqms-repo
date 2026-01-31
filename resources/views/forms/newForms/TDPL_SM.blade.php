@extends('layouts.base')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SM</title>
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
            <div style="font-size: 20px; ">SM </div>

        </div>
        <div class="icon-view">
            <div class="pc-content">
                <div class="pc-folder" onclick="showSection('TDPL/SE/REG-001')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">SerologyWork Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/SM/FOM-001')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Incoming Material Inspection Form</span>
                </div>

                <div class="pc-folder" onclick="showSection('TDPL/SM/FOM-004')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Supplier Corrective Action Request & Report</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/SM/FOM-008')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Expired Reagent and Consumable Supplies Tracking Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/SM/FOM-009')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Reagent & Consumable Supplies Borrowing Tracking Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/SM/FOM-010')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Reagent-Consumable Recall Tracking Form</span>
                </div>

            </div>
        </div>
    </div>


    <x-formTemplete
        id="TDPL/SE/REG-001"
        docNo="TDPL/SE/REG-001"
        docName="SerologyWork Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.sm.forms.submit') }}">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="swrFromDate" name="swrFromDate"
                    onchange="loadSerologyWorkRegister()" oninput="loadSerologyWorkRegister()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="swrToDate"
                    onchange="loadSerologyWorkRegister()" oninput="loadSerologyWorkRegister()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>Investigation</strong></label>
                <input type="text" id="swrInvestigation" list="swrInvestigationList"
                    onchange="loadSerologyWorkRegister()" onblur="loadSerologyWorkRegister()"
                    style="border:1px solid #000; padding:4px; width:180px; display:block;" placeholder="Select or type">
                <datalist id="swrInvestigationList">
                    <option value="HIV">
                    <option value="HBsAg">
                    <option value="HCV">
                    <option value="VDRL">
                    <option value="Dengue NS1">
                    <option value="Dengue IgM/IgG">
                    <option value="Widal">
                    <option value="CRP">
                    <option value="ASO">
                    <option value="RF">
                    <option value="ANA">
                    <option value="Troponin">
                </datalist>
            </div>
            <div>
                <label><strong>Sample Type</strong></label>
                <input type="text" id="swrSampleType" list="swrSampleTypeList"
                    onchange="loadSerologyWorkRegister()" onblur="loadSerologyWorkRegister()"
                    style="border:1px solid #000; padding:4px; width:160px; display:block;" placeholder="Select or type">
                <datalist id="swrSampleTypeList">
                    <option value="Serum">
                    <option value="Plasma">
                    <option value="Whole Blood">
                    <option value="CSF">
                    <option value="Urine">
                </datalist>
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearSwrFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <table border="1" style="width:100%; border-collapse:collapse; text-align:left;">
            <thead>
                <tr>
                    <td style="padding:6px; border:1px solid #000;"><strong>S. No.</strong></td>
                    <td style="padding:6px; border:1px solid #000;"><strong>Barcode</strong></td>
                    <td style="padding:6px; border:1px solid #000;"><strong>Patient Name</strong></td>
                    <td style="padding:6px; border:1px solid #000;"><strong>Age/Gender</strong></td>
                    <td style="padding:6px; border:1px solid #000;"><strong>Investigation</strong></td>
                    <td colspan="2" style="padding:6px; text-align:center; border:1px solid #000;"><strong>Sample Type</strong></td>
                    <td colspan="2" style="padding:6px; text-align:center; border:1px solid #000;"><strong>Sample Received<br>Date/Time</strong></td>
                    <td style="padding:6px; border:1px solid #000;"><strong>Sample Received by</strong></td>
                    <td style="padding:6px; border:1px solid #000;"><strong>Sample Processing<br>Date/Time</strong></td>
                    <td colspan="2" style="padding:6px; text-align:center; border:1px solid #000;"><strong>Sample Processed by</strong></td>
                    <td colspan="2" style="padding:6px; text-align:center; border:1px solid #000;"><strong>Observations</strong></td>
                    <td style="padding:6px; border:1px solid #000;"><strong>HoD Signature</strong></td>
                </tr>
            </thead>
            <tbody id="swrTableBody">
                <tr>
                    <td style="border:1px solid #000; padding:4px; text-align:center;"><strong>1</strong></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_barcode[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_patient_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_age_gender[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_investigation[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td colspan="2" style="border:1px solid #000; padding:4px;"><input name="row_sample_type[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td colspan="2" style="border:1px solid #000; padding:4px;"><input type="datetime-local" name="row_sample_received[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_sample_received_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="datetime-local" name="row_processing_datetime[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td colspan="2" style="border:1px solid #000; padding:4px;"><input name="row_processed_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td colspan="2" style="border:1px solid #000; padding:4px;"><input name="row_observations[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_hod_signature[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                </tr>
            </tbody>
        </table>

        <script>
            var swrRowCounter = 1;

            function loadSerologyWorkRegister() {
                const fromDate = document.getElementById('swrFromDate').value;
                const toDate = document.getElementById('swrToDate').value;
                const investigation = document.getElementById('swrInvestigation').value;
                const sampleType = document.getElementById('swrSampleType').value;

                if (!fromDate && !toDate && !investigation && !sampleType) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);
                if (investigation) params.append('investigation', investigation);
                if (sampleType) params.append('sample_type', sampleType);

                fetch(`/newforms/sm/serology-work-register/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    const tbody = document.getElementById('swrTableBody');
                    if (!tbody) return;

                    tbody.innerHTML = '';
                    swrRowCounter = 0;

                    if (!res.data || res.data.length === 0) {
                        showToastREG001SM('info', 'No records found. You can add new entries below.');
                        addEmptyRowREG001_SM();
                        return;
                    }

                    showToastREG001SM('success', res.data.length + ' record(s) loaded.');
                    res.data.forEach(row => {
                        swrRowCounter++;
                        const tr = document.createElement('tr');
                        tr.innerHTML = buildREG001_SM_RowHTML(row, swrRowCounter);
                        tbody.appendChild(tr);
                    });

                    addEmptyRowREG001_SM();
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function formatDatetimeLocal(val) {
                if (!val) return '';
                // Handle "2026-01-31 14:30:00" → "2026-01-31T14:30"
                if (val.includes(' ')) {
                    return val.replace(' ', 'T').substring(0, 16);
                }
                return val.substring(0, 16);
            }

            function buildREG001_SM_RowHTML(row, sno) {
                return `
                    <td style="border:1px solid #000; padding:4px; text-align:center;">
                        <input type="hidden" name="row_id[]" value="${row.id}">
                        <strong>${sno}</strong>
                    </td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_barcode[]" value="${row.barcode || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_patient_name[]" value="${row.patient_name || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_age_gender[]" value="${row.age_gender || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_investigation[]" value="${row.investigation || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td colspan="2" style="border:1px solid #000; padding:4px;"><input name="row_sample_type[]" value="${row.sample_type || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td colspan="2" style="border:1px solid #000; padding:4px;"><input type="datetime-local" name="row_sample_received[]" value="${formatDatetimeLocal(row.sample_received)}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_sample_received_by[]" value="${row.sample_received_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="datetime-local" name="row_processing_datetime[]" value="${formatDatetimeLocal(row.processing_datetime)}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td colspan="2" style="border:1px solid #000; padding:4px;"><input name="row_processed_by[]" value="${row.processed_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td colspan="2" style="border:1px solid #000; padding:4px;"><input name="row_observations[]" value="${row.observations || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_hod_signature[]" value="${row.hod_signature || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                `;
            }

            function addEmptyRowREG001_SM() {
                const tbody = document.getElementById('swrTableBody');
                if (!tbody) return;

                swrRowCounter++;
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td style="border:1px solid #000; padding:4px; text-align:center;"><strong>${swrRowCounter}</strong></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_barcode[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_patient_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_age_gender[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_investigation[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td colspan="2" style="border:1px solid #000; padding:4px;"><input name="row_sample_type[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td colspan="2" style="border:1px solid #000; padding:4px;"><input type="datetime-local" name="row_sample_received[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_sample_received_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="datetime-local" name="row_processing_datetime[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td colspan="2" style="border:1px solid #000; padding:4px;"><input name="row_processed_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td colspan="2" style="border:1px solid #000; padding:4px;"><input name="row_observations[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_hod_signature[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                `;
                tbody.appendChild(tr);
            }

            function clearSwrFilters() {
                document.getElementById('swrFromDate').value = '';
                document.getElementById('swrToDate').value = '';
                document.getElementById('swrInvestigation').value = '';
                document.getElementById('swrSampleType').value = '';
                const tbody = document.getElementById('swrTableBody');
                if (tbody) {
                    tbody.innerHTML = '';
                    swrRowCounter = 0;
                    addEmptyRowREG001_SM();
                }
            }

            // AJAX Submit for REG-001 (Serology)
            (function() {
                function initSerologyWorkForm() {
                    const formContainer = document.querySelector('[id="TDPL/SE/REG-001"]');
                    if (!formContainer) return;

                    const form = formContainer.querySelector('form');
                    if (!form || form.dataset.ajaxBound === 'true') return;
                    form.dataset.ajaxBound = 'true';

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const formData = new FormData(form);

                        // Pass the from-date as form_date context
                        const fromDate = document.getElementById('swrFromDate').value;
                        if (fromDate) formData.append('swrFormDate', fromDate);

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
                                showToastREG001SM('success', result.message || 'Saved successfully!');

                                const tbody = document.getElementById('swrTableBody');
                                if (tbody && result.data && result.data.length > 0) {
                                    tbody.innerHTML = '';
                                    swrRowCounter = 0;
                                    result.data.forEach(row => {
                                        swrRowCounter++;
                                        const tr = document.createElement('tr');
                                        tr.innerHTML = buildREG001_SM_RowHTML(row, swrRowCounter);
                                        tbody.appendChild(tr);
                                    });
                                    addEmptyRowREG001_SM();
                                }
                            } else {
                                showToastREG001SM('error', result.message || 'Save failed!');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastREG001SM('error', 'Failed to save data');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });
                    });
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initSerologyWorkForm);
                } else {
                    initSerologyWorkForm();
                }
            })();

            function showToastREG001SM(type, message) {
                const colors = { success: '#28a745', error: '#dc3545', info: '#17a2b8' };
                const toast = document.createElement('div');
                toast.style.cssText = `
                    position:fixed; top:20px; right:20px; z-index:9999;
                    padding:12px 24px; border-radius:6px; color:#fff; font-size:14px;
                    box-shadow:0 4px 12px rgba(0,0,0,0.15);
                    background:${colors[type] || '#17a2b8'};
                `;
                toast.textContent = message;
                document.body.appendChild(toast);
                setTimeout(() => toast.remove(), 3000);
            }
        </script>

    </x-formTemplete>


    <x-formTemplete
        id="TDPL/SM/FOM-001"
        docNo="TDPL/SM/FOM-001"
        docName="Incoming Material Inspection Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.sm.forms.submit') }}">

        <!-- Hidden form ID for edit mode -->
        <input type="hidden" id="imi_form_id" name="imi_form_id" value="">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>Supplier Name</strong></label>
                <input type="text" id="imiFilterSupplier" placeholder="Type supplier name"
                    style="border:1px solid #000; padding:6px 10px; width:250px; display:block; border-radius:4px;">
            </div>
            <div style="display:flex; gap:8px; align-items:flex-end;">
                <button type="button" onclick="loadImiFom001()"
                    style="padding:6px 15px; background:#3498db; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Search
                </button>
                <button type="button" onclick="clearImiFom001()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <div style=" padding: 10px; background: white; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); ">

            <!-- Header Section -->
            <div style="text-align: center; margin-bottom: 40px; padding-bottom: 30px; border-bottom: 3px solid #2c3e50;">
                <h1 style="color: #2c3e50; margin: 0 0 10px 0; font-size: 28px;">RAW MATERIAL INCOMING INSPECTION CHECKLIST</h1>
                <p style="color: #7f8c8d; margin: 0; font-size: 14px;">Quality Assurance & Control</p>
            </div>

            <!-- Basic Information -->
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; margin-bottom: 30px;">
                <div>
                    <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Supplier Name</label>
                    <input type="text" name="supplier_name" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">P.O. #</label>
                    <input type="text" name="po_number" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Inspector Name</label>
                    <input type="text" name="inspector_name" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">P.O. Date</label>
                    <input type="date" name="po_date" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Inspection Date</label>
                    <input type="date" name="inspection_date" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Invoice #</label>
                    <input type="text" name="invoice_number" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;">
                </div>
            </div>

            <!-- Instructions -->
            <div style="background: #ecf0f1; padding: 20px; border-radius: 8px; margin-bottom: 30px; border-left: 4px solid #3498db;">
                <h3 style="margin: 0 0 10px 0; color: #2c3e50; font-size: 16px;">INSTRUCTIONS</h3>
                <p style="margin: 0; color: #34495e; font-size: 14px; line-height: 1.6;">
                    This checklist is designed to conduct an incoming inspection of purchased raw materials to validate their quality based on set acceptance criteria. Carefully review each item and mark the corresponding checkbox to indicate compliance or note any observations and non-conformities. Use the "Notes/Observations" section to provide additional details, corrective actions and any required follow-up.
                </p>
            </div>

            <!-- Section 1: Product Identification -->
            <div style="background: white; border: 2px solid #e0e0e0; border-radius: 8px; padding: 25px; margin-bottom: 25px;">
                <h2 style="color: #2c3e50; margin: 0 0 20px 0; font-size: 18px; padding-bottom: 10px; border-bottom: 2px solid #3498db;">1. PRODUCT IDENTIFICATION AND DOCUMENTATION</h2>

                @foreach([
                'Product name and description match the purchase order and packing slip',
                'Product specifications and documentation are provided by the supplier',
                'Material certification or test reports are included as required',
                'Batch/Lot numbers and expiration dates are clearly labeled (if applicable)'
                ] as $index => $item)
                <div style="display: flex; align-items: center; padding: 12px; background: {{ $index % 2 == 0 ? '#f8f9fa' : 'white' }}; border-radius: 4px; margin-bottom: 8px;">
                    <span style="flex: 1; color: #34495e; font-size: 14px;">{{ $item }}</span>
                    <div style="display: flex; gap: 15px; margin-left: 20px;">
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section1_item{{ $index }}" value="yes" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #27ae60;">Yes</span>
                        </label>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section1_item{{ $index }}" value="no" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #e74c3c;">No</span>
                        </label>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section1_item{{ $index }}" value="na" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #95a5a6;">N/A</span>
                        </label>
                    </div>
                </div>
                @endforeach

                <div style="margin-top: 15px;">
                    <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: 600; font-size: 14px;">Observations/Notes/Corrective actions, if any:</label>
                    <textarea name="section1_notes" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; font-family: Arial, sans-serif; resize: vertical;"></textarea>
                </div>
            </div>

            <!-- Section 2: Quantity Verification -->
            <div style="background: white; border: 2px solid #e0e0e0; border-radius: 8px; padding: 25px; margin-bottom: 25px;">
                <h2 style="color: #2c3e50; margin: 0 0 20px 0; font-size: 18px; padding-bottom: 10px; border-bottom: 2px solid #3498db;">2. QUANTITY VERIFICATION</h2>

                @foreach([
                'The quantity received matches the quantity stated on the packing slip/purchase order',
                'Overages or shortages are documented and communicated to the Purchase Dept.',
                'Quantity discrepancies are investigated and resolved'
                ] as $index => $item)
                <div style="display: flex; align-items: center; padding: 12px; background: {{ $index % 2 == 0 ? '#f8f9fa' : 'white' }}; border-radius: 4px; margin-bottom: 8px;">
                    <span style="flex: 1; color: #34495e; font-size: 14px;">{{ $item }}</span>
                    <div style="display: flex; gap: 15px; margin-left: 20px;">
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section2_item{{ $index }}" value="yes" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #27ae60;">Yes</span>
                        </label>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section2_item{{ $index }}" value="no" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #e74c3c;">No</span>
                        </label>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section2_item{{ $index }}" value="na" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #95a5a6;">N/A</span>
                        </label>
                    </div>
                </div>
                @endforeach

                <div style="margin-top: 15px;">
                    <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: 600; font-size: 14px;">Observations/Notes/Corrective actions, if any:</label>
                    <textarea name="section2_notes" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; font-family: Arial, sans-serif; resize: vertical;"></textarea>
                </div>
            </div>

            <!-- Section 3: Packaging and Labeling -->
            <div style="background: white; border: 2px solid #e0e0e0; border-radius: 8px; padding: 25px; margin-bottom: 25px;">
                <h2 style="color: #2c3e50; margin: 0 0 20px 0; font-size: 18px; padding-bottom: 10px; border-bottom: 2px solid #3498db;">3. PACKAGING AND LABELING</h2>

                @foreach([
                'Packaging is intact, clean and free from damage',
                'All labels and markings are clear, legible and accurate',
                'Packaging materials are suitable for transportation and storage of the raw material',
                'Special handling instructions, if any, are followed'
                ] as $index => $item)
                <div style="display: flex; align-items: center; padding: 12px; background: {{ $index % 2 == 0 ? '#f8f9fa' : 'white' }}; border-radius: 4px; margin-bottom: 8px;">
                    <span style="flex: 1; color: #34495e; font-size: 14px;">{{ $item }}</span>
                    <div style="display: flex; gap: 15px; margin-left: 20px;">
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section3_item{{ $index }}" value="yes" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #27ae60;">Yes</span>
                        </label>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section3_item{{ $index }}" value="no" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #e74c3c;">No</span>
                        </label>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section3_item{{ $index }}" value="na" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #95a5a6;">N/A</span>
                        </label>
                    </div>
                </div>
                @endforeach

                <div style="margin-top: 15px;">
                    <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: 600; font-size: 14px;">Observations/Notes/Corrective actions, if any:</label>
                    <textarea name="section3_notes" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; font-family: Arial, sans-serif; resize: vertical;"></textarea>
                </div>
            </div>

            <!-- Section 4: Visual Inspection -->
            <div style="background: white; border: 2px solid #e0e0e0; border-radius: 8px; padding: 25px; margin-bottom: 25px;">
                <h2 style="color: #2c3e50; margin: 0 0 20px 0; font-size: 18px; padding-bottom: 10px; border-bottom: 2px solid #3498db;">4. VISUAL INSPECTION</h2>

                @foreach([
                'The raw material appears free from physical defects, contamination or foreign objects',
                'Color, texture and appearance meet the specified requirements',
                'No visible signs of spoilage or degradation are observed'
                ] as $index => $item)
                <div style="display: flex; align-items: center; padding: 12px; background: {{ $index % 2 == 0 ? '#f8f9fa' : 'white' }}; border-radius: 4px; margin-bottom: 8px;">
                    <span style="flex: 1; color: #34495e; font-size: 14px;">{{ $item }}</span>
                    <div style="display: flex; gap: 15px; margin-left: 20px;">
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section4_item{{ $index }}" value="yes" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #27ae60;">Yes</span>
                        </label>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section4_item{{ $index }}" value="no" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #e74c3c;">No</span>
                        </label>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section4_item{{ $index }}" value="na" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #95a5a6;">N/A</span>
                        </label>
                    </div>
                </div>
                @endforeach

                <div style="margin-top: 15px;">
                    <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: 600; font-size: 14px;">Observations/Notes/Corrective actions, if any:</label>
                    <textarea name="section4_notes" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; font-family: Arial, sans-serif; resize: vertical;"></textarea>
                </div>
            </div>

            <!-- Section 5: Arrival Temperature -->
            <div style="background: white; border: 2px solid #e0e0e0; border-radius: 8px; padding: 25px; margin-bottom: 25px;">
                <h2 style="color: #2c3e50; margin: 0 0 20px 0; font-size: 18px; padding-bottom: 10px; border-bottom: 2px solid #3498db;">5. ARRIVAL TEMPERATURE</h2>

                @foreach([
                'Measured temperature of the received goods is between 2–8°C',
                'Measured temperature of the received goods is below –20°C',
                'Measured temperature of the received goods is at room temperature'
                ] as $index => $item)
                <div style="display: flex; align-items: center; padding: 12px; background: {{ $index % 2 == 0 ? '#f8f9fa' : 'white' }}; border-radius: 4px; margin-bottom: 8px;">
                    <span style="flex: 1; color: #34495e; font-size: 14px;">{{ $item }}</span>
                    <div style="display: flex; gap: 15px; margin-left: 20px;">
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section5_item{{ $index }}" value="yes" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #27ae60;">Yes</span>
                        </label>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section5_item{{ $index }}" value="no" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #e74c3c;">No</span>
                        </label>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section5_item{{ $index }}" value="na" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #95a5a6;">N/A</span>
                        </label>
                    </div>
                </div>
                @endforeach

                <div style="margin-top: 15px;">
                    <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: 600; font-size: 14px;">Observations/Notes/Corrective actions, if any:</label>
                    <textarea name="section5_notes" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; font-family: Arial, sans-serif; resize: vertical;"></textarea>
                </div>
            </div>

            <!-- Section 6: Functional and Performance Testing -->
            <div style="background: white; border: 2px solid #e0e0e0; border-radius: 8px; padding: 25px; margin-bottom: 25px;">
                <h2 style="color: #2c3e50; margin: 0 0 20px 0; font-size: 18px; padding-bottom: 10px; border-bottom: 2px solid #3498db;">6. FUNCTIONAL AND PERFORMANCE TESTING</h2>

                @foreach([
                'Functional tests are conducted to ensure the raw material meets its intended purpose',
                'Performance testing is performed according to the specified requirements',
                'Test results meet the acceptance criteria for the raw material'
                ] as $index => $item)
                <div style="display: flex; align-items: center; padding: 12px; background: {{ $index % 2 == 0 ? '#f8f9fa' : 'white' }}; border-radius: 4px; margin-bottom: 8px;">
                    <span style="flex: 1; color: #34495e; font-size: 14px;">{{ $item }}</span>
                    <div style="display: flex; gap: 15px; margin-left: 20px;">
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section6_item{{ $index }}" value="yes" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #27ae60;">Yes</span>
                        </label>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section6_item{{ $index }}" value="no" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #e74c3c;">No</span>
                        </label>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section6_item{{ $index }}" value="na" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #95a5a6;">N/A</span>
                        </label>
                    </div>
                </div>
                @endforeach

                <div style="margin-top: 15px;">
                    <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: 600; font-size: 14px;">Observations/Notes/Corrective actions, if any:</label>
                    <textarea name="section6_notes" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; font-family: Arial, sans-serif; resize: vertical;"></textarea>
                </div>
            </div>

            <!-- Section 7: Non-Conformance and Disposition -->
            <div style="background: white; border: 2px solid #e0e0e0; border-radius: 8px; padding: 25px; margin-bottom: 25px;">
                <h2 style="color: #2c3e50; margin: 0 0 20px 0; font-size: 18px; padding-bottom: 10px; border-bottom: 2px solid #3498db;">7. NON-CONFORMANCE AND DISPOSITION</h2>

                @foreach([
                'Non-conforming raw materials are identified and segregated',
                'Disposition of non-conforming materials is determined and documented',
                'Actions taken to address non-conformities are recorded'
                ] as $index => $item)
                <div style="display: flex; align-items: center; padding: 12px; background: {{ $index % 2 == 0 ? '#f8f9fa' : 'white' }}; border-radius: 4px; margin-bottom: 8px;">
                    <span style="flex: 1; color: #34495e; font-size: 14px;">{{ $item }}</span>
                    <div style="display: flex; gap: 15px; margin-left: 20px;">
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section7_item{{ $index }}" value="yes" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #27ae60;">Yes</span>
                        </label>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section7_item{{ $index }}" value="no" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #e74c3c;">No</span>
                        </label>
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="section7_item{{ $index }}" value="na" style="margin-right: 5px;">
                            <span style="font-size: 14px; color: #95a5a6;">N/A</span>
                        </label>
                    </div>
                </div>
                @endforeach

                <div style="margin-top: 15px;">
                    <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: 600; font-size: 14px;">Observations/Notes/Corrective actions, if any:</label>
                    <textarea name="section7_notes" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; font-family: Arial, sans-serif; resize: vertical;"></textarea>
                </div>
            </div>

            <!-- Additional Notes -->
            <div style="background: white; border: 2px solid #e0e0e0; border-radius: 8px; padding: 25px; margin-bottom: 25px;">
                <h2 style="color: #2c3e50; margin: 0 0 15px 0; font-size: 18px;">ADDITIONAL NOTES/OBSERVATIONS</h2>
                <textarea name="additional_notes" rows="5" placeholder="Insert any additional notes or incoming inspection observations made during the inspection" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; font-family: Arial, sans-serif; resize: vertical;"></textarea>
            </div>

            <!-- Statement of Compliance -->
            <div style="background: #e8f5e9; border: 2px solid #4caf50; border-radius: 8px; padding: 25px; margin-bottom: 25px;">
                <h2 style="color: #2c3e50; margin: 0 0 15px 0; font-size: 18px;">STATEMENT OF COMPLIANCE</h2>
                <p style="color: #34495e; font-size: 14px; line-height: 1.6; margin-bottom: 20px;">
                    I certify that I have conducted the above incoming material inspection and that the inspected raw materials meet the set acceptance criteria and are in compliance with the specified requirements of TRUSTlab.
                </p>
                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Inspector's Name</label>
                        <input type="text" name="compliance_inspector_name" style="width: 100%; padding: 10px; border: 1px solid #4caf50; border-radius: 6px; font-size: 14px; background: white;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Signature</label>
                        <input type="text" name="compliance_signature" style="width: 100%; padding: 10px; border: 1px solid #4caf50; border-radius: 6px; font-size: 14px; background: white;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Inspection Date</label>
                        <input type="date" name="compliance_inspection_date" style="width: 100%; padding: 10px; border: 1px solid #4caf50; border-radius: 6px; font-size: 14px; background: white;">
                    </div>
                </div>
            </div>

            <!-- Approved By -->
            <div style="background: #fff3e0; border: 2px solid #ff9800; border-radius: 8px; padding: 25px;">
                <h2 style="color: #2c3e50; margin: 0 0 15px 0; font-size: 18px;">APPROVED BY</h2>
                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Name</label>
                        <input type="text" name="approver_name" style="width: 100%; padding: 10px; border: 1px solid #ff9800; border-radius: 6px; font-size: 14px; background: white;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Signature</label>
                        <input type="text" name="approver_signature" style="width: 100%; padding: 10px; border: 1px solid #ff9800; border-radius: 6px; font-size: 14px; background: white;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Date</label>
                        <input type="date" name="approver_date" style="width: 100%; padding: 10px; border: 1px solid #ff9800; border-radius: 6px; font-size: 14px; background: white;">
                    </div>
                </div>
            </div>


        </div>

    <script>
    // ── LOAD Incoming Material Inspection ──
    function loadImiFom001() {
        const supplierName = document.getElementById('imiFilterSupplier').value.trim();
        if (!supplierName) {
            showToastFOM001SM('info', 'Please enter a supplier name to search.');
            return;
        }

        fetch(`/newforms/sm/incoming-material-inspection/load?supplier_name=${encodeURIComponent(supplierName)}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(res => res.json())
        .then(res => {
            clearImiFom001Fields();

            if (!res.data) {
                document.getElementById('imi_form_id').value = '';
                showToastFOM001SM('info', 'No records found. You can fill a new form.');
                return;
            }

            document.getElementById('imi_form_id').value = res.data.id;

            // Text / date / textarea fields
            const textFields = [
                'supplier_name','po_number','inspector_name',
                'po_date','inspection_date','invoice_number',
                'section1_notes','section2_notes','section3_notes',
                'section4_notes','section5_notes','section6_notes','section7_notes',
                'additional_notes',
                'compliance_inspector_name','compliance_signature','compliance_inspection_date',
                'approver_name','approver_signature','approver_date'
            ];

            textFields.forEach(field => {
                const el = document.querySelector('[id="TDPL/SM/FOM-001"] [name="' + field + '"]');
                if (el && res.data[field] != null) el.value = res.data[field];
            });

            // Radio buttons (section items)
            const radioFields = [
                'section1_item0','section1_item1','section1_item2','section1_item3',
                'section2_item0','section2_item1','section2_item2',
                'section3_item0','section3_item1','section3_item2','section3_item3',
                'section4_item0','section4_item1','section4_item2',
                'section5_item0','section5_item1','section5_item2',
                'section6_item0','section6_item1','section6_item2',
                'section7_item0','section7_item1','section7_item2'
            ];

            radioFields.forEach(field => {
                const val = res.data[field];
                if (!val) return;
                const radio = document.querySelector('[id="TDPL/SM/FOM-001"] input[name="' + field + '"][value="' + val + '"]');
                if (radio) radio.checked = true;
            });

            showToastFOM001SM('success', 'Record loaded successfully.');
        })
        .catch(err => {
            console.error('Load error:', err);
            showToastFOM001SM('error', 'Failed to load data.');
        });
    }

    // ── CLEAR ──
    function clearImiFom001() {
        document.getElementById('imiFilterSupplier').value = '';
        document.getElementById('imi_form_id').value = '';
        clearImiFom001Fields();
        showToastFOM001SM('info', 'Form cleared.');
    }

    function clearImiFom001Fields() {
        const container = document.querySelector('[id="TDPL/SM/FOM-001"]');
        if (!container) return;
        container.querySelectorAll('input, textarea, select').forEach(el => {
            if (el.id === 'imiFilterSupplier' || el.id === 'imi_form_id' || el.name === 'doc_no') return;
            if (el.type === 'radio' || el.type === 'checkbox') {
                el.checked = false;
            } else {
                el.value = '';
            }
        });
    }

    // ── AJAX SUBMIT + TOAST ──
    (function() {
        function initImiFom001() {
            const formContainer = document.querySelector('[id="TDPL/SM/FOM-001"]');
            if (!formContainer) return;

            const form = formContainer.querySelector('form');
            if (!form || form.dataset.ajaxBoundImi === 'true') return;
            form.dataset.ajaxBoundImi = 'true';

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
                        showToastFOM001SM('success', result.message || 'Saved successfully!');
                        if (result.form_id) {
                            document.getElementById('imi_form_id').value = result.form_id;
                        }
                    } else {
                        showToastFOM001SM('error', result.message || 'Failed to save.');
                    }
                })
                .catch(err => {
                    console.error('Submit error:', err);
                    showToastFOM001SM('error', 'Failed to save. Please try again.');
                })
                .finally(() => {
                    if (submitBtn) {
                        submitBtn.textContent = originalText;
                        submitBtn.disabled = false;
                    }
                });
            });
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initImiFom001);
        } else {
            initImiFom001();
        }
    })();

    function showToastFOM001SM(type, message) {
        const colors = { success: '#28a745', error: '#dc3545', info: '#17a2b8' };
        const toast = document.createElement('div');
        toast.style.cssText = 'position:fixed;top:20px;right:20px;z-index:9999;padding:12px 24px;border-radius:6px;color:#fff;font-size:14px;box-shadow:0 4px 12px rgba(0,0,0,0.15);background:' + (colors[type] || colors.info);
        toast.textContent = message;
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }
    </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/SM/FOM-004"
        docNo="TDPL/SM/FOM-004"
        docName="Supplier Corrective Action Request & Report"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.sm.forms.submit') }}">

        <!-- Hidden form ID for edit mode -->
        <input type="hidden" id="scar_form_id" name="scar_form_id" value="">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>Supplier Name</strong></label>
                <input type="text" id="scarFilterSupplier" placeholder="Type supplier name"
                    style="border:1px solid #000; padding:6px 10px; width:250px; display:block; border-radius:4px;">
            </div>
            <div style="display:flex; gap:8px; align-items:flex-end;">
                <button type="button" onclick="loadScarFom004()"
                    style="padding:6px 15px; background:#3498db; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Search
                </button>
                <button type="button" onclick="clearScarFom004()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <div style=" padding: 10px; background: white; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); ">

            <!-- Header -->
            <div style="text-align: center; margin-bottom: 40px; padding-bottom: 30px; border-bottom: 3px solid #e74c3c;">
                <h1 style="color: #2c3e50; margin: 0; font-size: 28px;">Supplier Corrective Action Request (SCAR)</h1>
            </div>

            <!-- Supplier Information Section -->
            <div style="background: white; border: 2px solid #e0e0e0; border-radius: 8px; padding: 25px; margin-bottom: 25px;">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Supplier:</label>
                        <input type="text" name="supplier_name" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Attention:</label>
                        <input type="text" name="attention" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;">
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Phone #:</label>
                        <input type="text" name="phone" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Email:</label>
                        <input type="email" name="email" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;">
                    </div>
                </div>
            </div>

            <!-- Description of Nonconformance and Product Details -->
            <div style="background: white; border: 2px solid #e0e0e0; border-radius: 8px; padding: 25px; margin-bottom: 25px;">
                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: 600; font-size: 14px;">Description of Nonconformance:</label>
                    <textarea name="nonconformance_description" rows="5" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; font-family: Arial, sans-serif; resize: vertical;"></textarea>
                </div>

                <div style="background: #f8f9fa; padding: 15px; border-radius: 6px; margin-bottom: 15px;">
                    <p style="margin: 0; color: #7f8c8d; font-style: italic; font-size: 13px;">If the nonconformance is product-related, complete the following:</p>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    @foreach([
                    ['label' => 'Our PO #:', 'name' => 'po_number', 'type' => 'text'],
                    ['label' => 'Product Number:', 'name' => 'product_number', 'type' => 'text'],
                    ['label' => 'Product Name:', 'name' => 'product_name', 'type' => 'text'],
                    ['label' => 'Quantity Affected:', 'name' => 'quantity_affected', 'type' => 'text']
                    ] as $field)
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">{{ $field['label'] }}</label>
                        <input type="{{ $field['type'] }}" name="{{ $field['name'] }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;">
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Date and Employee Information -->
            <div style="background: white; border: 2px solid #e0e0e0; border-radius: 8px; padding: 25px; margin-bottom: 25px;">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Date Sent to Supplier:</label>
                        <input type="date" name="date_sent" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Sent by (TDPL Employee Name):</label>
                        <input type="text" name="sent_by" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;">
                    </div>
                </div>
            </div>

            <!-- Important Notice -->
            <div style="background: #fff3cd; border: 2px solid #ffc107; border-radius: 8px; padding: 20px; margin-bottom: 30px; text-align: center;">
                <p style="margin: 0 0 8px 0; color: #856404; font-style: italic; font-size: 14px; font-weight: 600;">
                    RESPONSE TO THIS ISSUE MUST BE RECEIVED WITHIN <span style="text-decoration: underline;">7 WORKING DAYS</span> OF RECEIPT:
                </p>
                <p style="margin: 0; color: #856404; font-style: italic; font-size: 13px;">
                    FAILURE TO DO SO MAY RESULT IN REMOVAL OF YOUR COMPANY FROM FUTURE PURCHASING CONSIDERATION
                </p>
            </div>

            <!-- Supplier Response Section -->
            <div style="background: #e3f2fd; border: 2px solid #2196f3; border-radius: 8px; padding: 25px; margin-bottom: 25px;">
                <div style="background: #2196f3; color: white; padding: 12px; border-radius: 6px; margin-bottom: 20px; text-align: center;">
                    <h3 style="margin: 0; font-size: 16px; font-style: italic;">This section to be completed by Supplier</h3>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: 600; font-size: 14px;">Root Cause of Nonconformance:</label>
                    <textarea name="root_cause" rows="4" style="width: 100%; padding: 12px; border: 1px solid #2196f3; border-radius: 6px; font-size: 14px; font-family: Arial, sans-serif; resize: vertical; background: white;"></textarea>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: 600; font-size: 14px;">Corrective Action Taken or Planned:</label>
                    <textarea name="corrective_action" rows="4" style="width: 100%; padding: 12px; border: 1px solid #2196f3; border-radius: 6px; font-size: 14px; font-family: Arial, sans-serif; resize: vertical; background: white;"></textarea>
                </div>

                <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Signature of responsible manager:</label>
                        <input type="text" name="supplier_manager_signature" style="width: 100%; padding: 10px; border: 1px solid #2196f3; border-radius: 6px; font-size: 14px; background: white;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Date:</label>
                        <input type="date" name="supplier_signature_date" style="width: 100%; padding: 10px; border: 1px solid #2196f3; border-radius: 6px; font-size: 14px; background: white;">
                    </div>
                </div>

                <div>
                    <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Print Name and Title:</label>
                    <input type="text" name="supplier_name_title" style="width: 100%; padding: 10px; border: 1px solid #2196f3; border-radius: 6px; font-size: 14px; background: white;">
                </div>
            </div>

            <!-- TRUSTlab Review Section -->
            <div style="background: #f3e5f5; border: 2px solid #9c27b0; border-radius: 8px; padding: 25px;">
                <div style="background: #9c27b0; color: white; padding: 12px; border-radius: 6px; margin-bottom: 20px; text-align: center;">
                    <h3 style="margin: 0; font-size: 16px; font-style: italic;">This section to be completed by TRUSTlab</h3>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 10px; color: #34495e; font-weight: 600; font-size: 14px;">Response Accepted?</label>
                    <div style="display: flex; gap: 20px;">
                        @foreach(['Yes', 'No'] as $option)
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="radio" name="response_accepted" value="{{ strtolower($option) }}" style="margin-right: 8px;">
                            <span style="font-size: 14px; color: #34495e;">{{ $option }}</span>
                        </label>
                        @endforeach
                    </div>
                    <p style="margin: 10px 0 0 0; color: #7f8c8d; font-size: 13px; font-style: italic;">If not, attach additional sheets with explanation and follow-up.</p>
                </div>

                <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px;">
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Purchasing Signature:</label>
                        <input type="text" name="purchasing_signature" style="width: 100%; padding: 10px; border: 1px solid #9c27b0; border-radius: 6px; font-size: 14px; background: white;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #34495e; font-weight: 600; font-size: 14px;">Date:</label>
                        <input type="date" name="purchasing_date" style="width: 100%; padding: 10px; border: 1px solid #9c27b0; border-radius: 6px; font-size: 14px; background: white;">
                    </div>
                </div>
            </div>


        </div>

    <script>
    // ── LOAD Supplier Corrective Action Request ──
    function loadScarFom004() {
        const supplierName = document.getElementById('scarFilterSupplier').value.trim();
        if (!supplierName) {
            showToastFOM004SM('info', 'Please enter a supplier name to search.');
            return;
        }

        fetch(`/newforms/sm/supplier-corrective-action/load?supplier_name=${encodeURIComponent(supplierName)}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(res => res.json())
        .then(res => {
            clearScarFom004Fields();

            if (!res.data) {
                document.getElementById('scar_form_id').value = '';
                showToastFOM004SM('info', 'No records found. You can fill a new form.');
                return;
            }

            document.getElementById('scar_form_id').value = res.data.id;

            // Text / date / email / textarea fields
            const textFields = [
                'supplier_name','attention','phone','email',
                'nonconformance_description',
                'po_number','product_number','product_name','quantity_affected',
                'date_sent','sent_by',
                'root_cause','corrective_action',
                'supplier_manager_signature','supplier_signature_date','supplier_name_title',
                'purchasing_signature','purchasing_date'
            ];

            textFields.forEach(field => {
                const el = document.querySelector('[id="TDPL/SM/FOM-004"] [name="' + field + '"]');
                if (el && res.data[field] != null) el.value = res.data[field];
            });

            // Radio button: response_accepted
            const respVal = res.data.response_accepted;
            if (respVal) {
                const radio = document.querySelector('[id="TDPL/SM/FOM-004"] input[name="response_accepted"][value="' + respVal + '"]');
                if (radio) radio.checked = true;
            }

            showToastFOM004SM('success', 'Record loaded successfully.');
        })
        .catch(err => {
            console.error('Load error:', err);
            showToastFOM004SM('error', 'Failed to load data.');
        });
    }

    // ── CLEAR ──
    function clearScarFom004() {
        document.getElementById('scarFilterSupplier').value = '';
        document.getElementById('scar_form_id').value = '';
        clearScarFom004Fields();
        showToastFOM004SM('info', 'Form cleared.');
    }

    function clearScarFom004Fields() {
        const container = document.querySelector('[id="TDPL/SM/FOM-004"]');
        if (!container) return;
        container.querySelectorAll('input, textarea, select').forEach(el => {
            if (el.id === 'scarFilterSupplier' || el.id === 'scar_form_id' || el.name === 'doc_no') return;
            if (el.type === 'radio' || el.type === 'checkbox') {
                el.checked = false;
            } else {
                el.value = '';
            }
        });
    }

    // ── AJAX SUBMIT + TOAST ──
    (function() {
        function initScarFom004() {
            const formContainer = document.querySelector('[id="TDPL/SM/FOM-004"]');
            if (!formContainer) return;

            const form = formContainer.querySelector('form');
            if (!form || form.dataset.ajaxBoundScar === 'true') return;
            form.dataset.ajaxBoundScar = 'true';

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
                        showToastFOM004SM('success', result.message || 'Saved successfully!');
                        if (result.form_id) {
                            document.getElementById('scar_form_id').value = result.form_id;
                        }
                    } else {
                        showToastFOM004SM('error', result.message || 'Failed to save.');
                    }
                })
                .catch(err => {
                    console.error('Submit error:', err);
                    showToastFOM004SM('error', 'Failed to save. Please try again.');
                })
                .finally(() => {
                    if (submitBtn) {
                        submitBtn.textContent = originalText;
                        submitBtn.disabled = false;
                    }
                });
            });
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initScarFom004);
        } else {
            initScarFom004();
        }
    })();

    function showToastFOM004SM(type, message) {
        const colors = { success: '#28a745', error: '#dc3545', info: '#17a2b8' };
        const toast = document.createElement('div');
        toast.style.cssText = 'position:fixed;top:20px;right:20px;z-index:9999;padding:12px 24px;border-radius:6px;color:#fff;font-size:14px;box-shadow:0 4px 12px rgba(0,0,0,0.15);background:' + (colors[type] || colors.info);
        toast.textContent = message;
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }
    </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/SM/FOM-008"
        docNo="TDPL/SM/FOM-008"
        docName="Expired Reagent and Consumable Supplies Tracking Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.sm.forms.submit') }}">

        <!-- Hidden month/year for form submit -->
        <input type="hidden" id="ertMonth" name="ert_month" value="">
        <input type="hidden" id="ertYear" name="ert_year" value="">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>Month</strong></label>
                <select id="ertFilterMonth" onchange="loadExpiredReagentTracking()" oninput="loadExpiredReagentTracking()"
                    style="border:1px solid #000; padding:6px 10px; width:160px; display:block; border-radius:4px;">
                    <option value="">-- Select --</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>
            <div>
                <label><strong>Year</strong></label>
                <input type="number" id="ertFilterYear" min="2020" max="2099"
                    onchange="loadExpiredReagentTracking()" oninput="loadExpiredReagentTracking()"
                    style="border:1px solid #000; padding:6px 10px; width:100px; display:block; border-radius:4px;"
                    placeholder="2026">
            </div>
            <div style="display:flex; gap:8px; align-items:flex-end;">
                <button type="button" onclick="clearErtFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center; width:50px;">S. No.</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Name of Reagent<br>or Material/Supply</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Lot Number</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Date Manufactured</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Expiration Date</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Unit of Measurement</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Quantity</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Removal Date</th>
                </tr>
            </thead>
            <tbody id="ertTableBody"></tbody>
        </table>

        <br>

        <!-- Footer: Reported by / Approved by -->
        <p style="font-size:14px;">
            <strong>Reported by:</strong>
            <input type="text" id="ertReportedBy" name="reported_by" style="border:none; border-bottom:1px solid #000; width:200px;">
            &nbsp;&nbsp;&nbsp;
            <strong>Sign:</strong>
            <input type="text" id="ertReportedSign" name="reported_sign" style="border:none; border-bottom:1px solid #000; width:150px;">
            &nbsp;&nbsp;&nbsp;
            <strong>Date:</strong>
            <input type="date" id="ertReportedDate" name="reported_date" style="border:none; border-bottom:1px solid #000; width:150px;">
        </p>

        <p style="font-size:14px;">
            <strong>Approved by:</strong>
            <input type="text" id="ertApprovedBy" name="approved_by" style="border:none; border-bottom:1px solid #000; width:200px;">
            &nbsp;&nbsp;&nbsp;
            <strong>Sign:</strong>
            <input type="text" id="ertApprovedSign" name="approved_sign" style="border:none; border-bottom:1px solid #000; width:150px;">
            &nbsp;&nbsp;&nbsp;
            <strong>Date:</strong>
            <input type="date" id="ertApprovedDate" name="approved_date" style="border:none; border-bottom:1px solid #000; width:150px;">
        </p>

        <script>
        var ertRowCounter = 1;

        // ── LOAD ──
        function loadExpiredReagentTracking() {
            const month = document.getElementById('ertFilterMonth').value;
            const year  = document.getElementById('ertFilterYear').value;

            // Sync hidden fields for form submit
            document.getElementById('ertMonth').value = month;
            document.getElementById('ertYear').value = year;

            if (!month || !year) return;

            fetch(`/newforms/sm/expired-reagent-tracking/load?month=${month}&year=${year}`, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.json())
            .then(res => {
                const tbody = document.getElementById('ertTableBody');
                if (!tbody) return;

                tbody.innerHTML = '';
                ertRowCounter = 0;

                if (!res.data || res.data.length === 0) {
                    showToastFOM008SM('info', 'No records found. You can add new entries below.');
                    addEmptyRowERT();
                    return;
                }

                showToastFOM008SM('success', res.data.length + ' record(s) loaded.');

                res.data.forEach(row => {
                    ertRowCounter++;
                    const tr = document.createElement('tr');
                    tr.innerHTML = buildErtRowHTML(row, ertRowCounter);
                    tbody.appendChild(tr);
                });

                // Populate footer from first record
                const first = res.data[0];
                document.getElementById('ertReportedBy').value   = first.reported_by || '';
                document.getElementById('ertReportedSign').value = first.reported_sign || '';
                document.getElementById('ertReportedDate').value = first.reported_date || '';
                document.getElementById('ertApprovedBy').value   = first.approved_by || '';
                document.getElementById('ertApprovedSign').value = first.approved_sign || '';
                document.getElementById('ertApprovedDate').value = first.approved_date || '';

                // Add one empty row for new entry
                addEmptyRowERT();
            })
            .catch(err => {
                console.error('Load error:', err);
                showToastFOM008SM('error', 'Failed to load data.');
            });
        }

        function buildErtRowHTML(row, sno) {
            return `
                <td style="border:1px solid #000; padding:4px; text-align:center;">
                    <input type="hidden" name="row_id[]" value="${row.id}">
                    <strong>${sno}</strong>
                </td>
                <td style="border:1px solid #000; padding:4px;"><input name="row_reagent_name[]" value="${row.reagent_name || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                <td style="border:1px solid #000; padding:4px;"><input name="row_lot_number[]" value="${row.lot_number || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date_manufactured[]" value="${row.date_manufactured || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_expiration_date[]" value="${row.expiration_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                <td style="border:1px solid #000; padding:4px;"><input name="row_unit[]" value="${row.unit_of_measurement || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                <td style="border:1px solid #000; padding:4px;"><input name="row_quantity[]" value="${row.quantity || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_removal_date[]" value="${row.removal_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
            `;
        }

        function addEmptyRowERT() {
            const tbody = document.getElementById('ertTableBody');
            if (!tbody) return;

            ertRowCounter++;
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td style="border:1px solid #000; padding:4px; text-align:center;"><strong>${ertRowCounter}</strong></td>
                <td style="border:1px solid #000; padding:4px;"><input name="row_reagent_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                <td style="border:1px solid #000; padding:4px;"><input name="row_lot_number[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date_manufactured[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_expiration_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                <td style="border:1px solid #000; padding:4px;"><input name="row_unit[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                <td style="border:1px solid #000; padding:4px;"><input name="row_quantity[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_removal_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
            `;
            tbody.appendChild(tr);

            // Auto-add next row when user starts typing in this last row
            tr.addEventListener('input', function handleErtInput() {
                tr.removeEventListener('input', handleErtInput);
                addEmptyRowERT();
            }, { once: true });
        }

        function clearErtFilters() {
            document.getElementById('ertFilterMonth').value = '';
            document.getElementById('ertFilterYear').value = '';
            document.getElementById('ertMonth').value = '';
            document.getElementById('ertYear').value = '';
            document.getElementById('ertReportedBy').value = '';
            document.getElementById('ertReportedSign').value = '';
            document.getElementById('ertReportedDate').value = '';
            document.getElementById('ertApprovedBy').value = '';
            document.getElementById('ertApprovedSign').value = '';
            document.getElementById('ertApprovedDate').value = '';
            const tbody = document.getElementById('ertTableBody');
            if (tbody) {
                tbody.innerHTML = '';
                ertRowCounter = 0;
                addEmptyRowERT();
            }
            showToastFOM008SM('info', 'Form cleared.');
        }

        // ── AJAX SUBMIT ──
        (function() {
            function initErtForm() {
                const formContainer = document.querySelector('[id="TDPL/SM/FOM-008"]');
                if (!formContainer) return;

                const form = formContainer.querySelector('form');
                if (!form || form.dataset.ajaxBoundErt === 'true') return;
                form.dataset.ajaxBoundErt = 'true';

                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    // Sync hidden month/year before submit
                    document.getElementById('ertMonth').value = document.getElementById('ertFilterMonth').value;
                    document.getElementById('ertYear').value  = document.getElementById('ertFilterYear').value;

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
                            showToastFOM008SM('success', result.message || 'Saved successfully!');

                            const tbody = document.getElementById('ertTableBody');
                            if (tbody && result.data && result.data.length > 0) {
                                tbody.innerHTML = '';
                                ertRowCounter = 0;
                                result.data.forEach(row => {
                                    ertRowCounter++;
                                    const tr = document.createElement('tr');
                                    tr.innerHTML = buildErtRowHTML(row, ertRowCounter);
                                    tbody.appendChild(tr);
                                });
                                addEmptyRowERT();
                            }
                        } else {
                            showToastFOM008SM('error', result.message || 'Save failed!');
                        }
                    })
                    .catch(err => {
                        console.error('Submit error:', err);
                        showToastFOM008SM('error', 'Failed to save. Please try again.');
                    })
                    .finally(() => {
                        if (submitBtn) {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        }
                    });
                });
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', function() {
                    initErtForm();
                    addEmptyRowERT();
                });
            } else {
                initErtForm();
                addEmptyRowERT();
            }
        })();

        function showToastFOM008SM(type, message) {
            const colors = { success: '#28a745', error: '#dc3545', info: '#17a2b8' };
            const toast = document.createElement('div');
            toast.style.cssText = 'position:fixed;top:20px;right:20px;z-index:9999;padding:12px 24px;border-radius:6px;color:#fff;font-size:14px;box-shadow:0 4px 12px rgba(0,0,0,0.15);background:' + (colors[type] || colors.info);
            toast.textContent = message;
            document.body.appendChild(toast);
            setTimeout(() => toast.remove(), 3000);
        }
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/SM/FOM-009"
        docNo="TDPL/SM/FOM-009"
        docName="Reagent & Consumable Supplies Borrowing Tracking Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.sm.forms.submit') }}">

        <!-- Hidden month/year for form submit -->
        <input type="hidden" id="btMonth" name="bt_month" value="">
        <input type="hidden" id="btYear" name="bt_year" value="">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>Month</strong></label>
                <select id="btFilterMonth" onchange="loadBorrowingTracking()" oninput="loadBorrowingTracking()"
                    style="border:1px solid #000; padding:6px 10px; width:160px; display:block; border-radius:4px;">
                    <option value="">-- Select --</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>
            <div>
                <label><strong>Year</strong></label>
                <input type="number" id="btFilterYear" min="2020" max="2099"
                    onchange="loadBorrowingTracking()" oninput="loadBorrowingTracking()"
                    style="border:1px solid #000; padding:6px 10px; width:100px; display:block; border-radius:4px;"
                    placeholder="2026">
            </div>
            <div style="display:flex; gap:8px; align-items:flex-end;">
                <button type="button" onclick="clearBtFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center; width:50px;">S. No.</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Name of Reagent<br>or Material</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Borrowed From</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Lot Number</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Date Manufactured</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Expiration Date</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Quantity & Unit<br>of Measurement</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">LIMS Ticket<br>Number</th>
                </tr>
            </thead>
            <tbody id="btTableBody"></tbody>
        </table>

        <br>

        <!-- Footer: Reported by / Approved by -->
        <p style="font-size:14px;">
            <strong>Reported by:</strong>
            <input type="text" id="btReportedBy" name="reported_by" style="border:none; border-bottom:1px solid #000; width:250px;">
            &nbsp;&nbsp;&nbsp;
            <strong>Sign:</strong>
            <input type="text" id="btReportedSign" name="reported_sign" style="border:none; border-bottom:1px solid #000; width:150px;">
            &nbsp;&nbsp;&nbsp;
            <strong>Date:</strong>
            <input type="date" id="btReportedDate" name="reported_date" style="border:none; border-bottom:1px solid #000; width:150px;">
        </p>

        <p style="font-size:14px;">
            <strong>Approved by:</strong>
            <input type="text" id="btApprovedBy" name="approved_by" style="border:none; border-bottom:1px solid #000; width:250px;">
            &nbsp;&nbsp;&nbsp;
            <strong>Sign:</strong>
            <input type="text" id="btApprovedSign" name="approved_sign" style="border:none; border-bottom:1px solid #000; width:150px;">
            &nbsp;&nbsp;&nbsp;
            <strong>Date:</strong>
            <input type="date" id="btApprovedDate" name="approved_date" style="border:none; border-bottom:1px solid #000; width:150px;">
        </p>

        <script>
        var btRowCounter = 0;

        // ── LOAD ──
        function loadBorrowingTracking() {
            const month = document.getElementById('btFilterMonth').value;
            const year  = document.getElementById('btFilterYear').value;

            document.getElementById('btMonth').value = month;
            document.getElementById('btYear').value = year;

            if (!month || !year) return;

            fetch(`/newforms/sm/borrowing-tracking/load?month=${month}&year=${year}`, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.json())
            .then(res => {
                const tbody = document.getElementById('btTableBody');
                if (!tbody) return;

                tbody.innerHTML = '';
                btRowCounter = 0;

                if (!res.data || res.data.length === 0) {
                    showToastFOM009SM('info', 'No records found. You can add new entries below.');
                    addEmptyRowBT();
                    return;
                }

                showToastFOM009SM('success', res.data.length + ' record(s) loaded.');

                res.data.forEach(row => {
                    btRowCounter++;
                    const tr = document.createElement('tr');
                    tr.innerHTML = buildBtRowHTML(row, btRowCounter);
                    tbody.appendChild(tr);
                });

                // Populate footer from first record
                const first = res.data[0];
                document.getElementById('btReportedBy').value   = first.reported_by || '';
                document.getElementById('btReportedSign').value = first.reported_sign || '';
                document.getElementById('btReportedDate').value = first.reported_date || '';
                document.getElementById('btApprovedBy').value   = first.approved_by || '';
                document.getElementById('btApprovedSign').value = first.approved_sign || '';
                document.getElementById('btApprovedDate').value = first.approved_date || '';

                addEmptyRowBT();
            })
            .catch(err => {
                console.error('Load error:', err);
                showToastFOM009SM('error', 'Failed to load data.');
            });
        }

        function buildBtRowHTML(row, sno) {
            return `
                <td style="border:1px solid #000; padding:4px; text-align:center;">
                    <input type="hidden" name="row_id[]" value="${row.id}">
                    <strong>${sno}</strong>
                </td>
                <td style="border:1px solid #000; padding:4px;"><input name="row_reagent_name[]" value="${row.reagent_name || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                <td style="border:1px solid #000; padding:4px;"><input name="row_borrowed_from[]" value="${row.borrowed_from || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                <td style="border:1px solid #000; padding:4px;"><input name="row_lot_number[]" value="${row.lot_number || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date_manufactured[]" value="${row.date_manufactured || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_expiration_date[]" value="${row.expiration_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                <td style="border:1px solid #000; padding:4px;"><input name="row_quantity_unit[]" value="${row.quantity_unit || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                <td style="border:1px solid #000; padding:4px;"><input name="row_lims_ticket[]" value="${row.lims_ticket || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
            `;
        }

        function addEmptyRowBT() {
            const tbody = document.getElementById('btTableBody');
            if (!tbody) return;

            btRowCounter++;
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td style="border:1px solid #000; padding:4px; text-align:center;"><strong>${btRowCounter}</strong></td>
                <td style="border:1px solid #000; padding:4px;"><input name="row_reagent_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                <td style="border:1px solid #000; padding:4px;"><input name="row_borrowed_from[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                <td style="border:1px solid #000; padding:4px;"><input name="row_lot_number[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date_manufactured[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_expiration_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                <td style="border:1px solid #000; padding:4px;"><input name="row_quantity_unit[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                <td style="border:1px solid #000; padding:4px;"><input name="row_lims_ticket[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
            `;
            tbody.appendChild(tr);

            // Auto-add next row when user starts typing in this last row
            tr.addEventListener('input', function handleBtInput() {
                tr.removeEventListener('input', handleBtInput);
                addEmptyRowBT();
            }, { once: true });
        }

        function clearBtFilters() {
            document.getElementById('btFilterMonth').value = '';
            document.getElementById('btFilterYear').value = '';
            document.getElementById('btMonth').value = '';
            document.getElementById('btYear').value = '';
            document.getElementById('btReportedBy').value = '';
            document.getElementById('btReportedSign').value = '';
            document.getElementById('btReportedDate').value = '';
            document.getElementById('btApprovedBy').value = '';
            document.getElementById('btApprovedSign').value = '';
            document.getElementById('btApprovedDate').value = '';
            const tbody = document.getElementById('btTableBody');
            if (tbody) {
                tbody.innerHTML = '';
                btRowCounter = 0;
                addEmptyRowBT();
            }
            showToastFOM009SM('info', 'Form cleared.');
        }

        // ── AJAX SUBMIT ──
        (function() {
            function initBtForm() {
                const formContainer = document.querySelector('[id="TDPL/SM/FOM-009"]');
                if (!formContainer) return;

                const form = formContainer.querySelector('form');
                if (!form || form.dataset.ajaxBoundBt === 'true') return;
                form.dataset.ajaxBoundBt = 'true';

                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    document.getElementById('btMonth').value = document.getElementById('btFilterMonth').value;
                    document.getElementById('btYear').value  = document.getElementById('btFilterYear').value;

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
                            showToastFOM009SM('success', result.message || 'Saved successfully!');

                            const tbody = document.getElementById('btTableBody');
                            if (tbody && result.data && result.data.length > 0) {
                                tbody.innerHTML = '';
                                btRowCounter = 0;
                                result.data.forEach(row => {
                                    btRowCounter++;
                                    const tr = document.createElement('tr');
                                    tr.innerHTML = buildBtRowHTML(row, btRowCounter);
                                    tbody.appendChild(tr);
                                });
                                addEmptyRowBT();
                            }
                        } else {
                            showToastFOM009SM('error', result.message || 'Save failed!');
                        }
                    })
                    .catch(err => {
                        console.error('Submit error:', err);
                        showToastFOM009SM('error', 'Failed to save. Please try again.');
                    })
                    .finally(() => {
                        if (submitBtn) {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        }
                    });
                });
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', function() {
                    initBtForm();
                    addEmptyRowBT();
                });
            } else {
                initBtForm();
                addEmptyRowBT();
            }
        })();

        function showToastFOM009SM(type, message) {
            const colors = { success: '#28a745', error: '#dc3545', info: '#17a2b8' };
            const toast = document.createElement('div');
            toast.style.cssText = 'position:fixed;top:20px;right:20px;z-index:9999;padding:12px 24px;border-radius:6px;color:#fff;font-size:14px;box-shadow:0 4px 12px rgba(0,0,0,0.15);background:' + (colors[type] || colors.info);
            toast.textContent = message;
            document.body.appendChild(toast);
            setTimeout(() => toast.remove(), 3000);
        }
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/SM/FOM-010"
        docNo="TDPL/SM/FOM-010"
        docName="Reagent-Consumable Recall Tracking Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.sm.forms.submit') }}">

        <!-- Hidden form ID for edit mode -->
        <input type="hidden" id="recall_form_id" name="recall_form_id" value="">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>Product Name</strong></label>
                <input type="text" id="recallFilterProduct" placeholder="Type product name"
                    style="border:1px solid #000; padding:6px 10px; width:250px; display:block; border-radius:4px;">
            </div>
            <div style="display:flex; gap:8px; align-items:flex-end;">
                <button type="button" onclick="loadRecallFom010()"
                    style="padding:6px 15px; background:#3498db; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Search
                </button>
                <button type="button" onclick="clearRecallFom010()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <p style="font-size:18px; font-weight:bold;">REAGENT/CONSUMABLE RECALL TRACKING FORM</p>

        <!-- Product Information Table -->
        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center; width:50px;">S. No.</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">DESCRIPTION</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">DETAILS</th>
                </tr>
            </thead>
            <tbody>
                @foreach([
                    ['label' => 'Product Category', 'name' => 'product_category', 'type' => 'text'],
                    ['label' => 'Product Name', 'name' => 'product_name', 'type' => 'text'],
                    ['label' => 'Manufacturer', 'name' => 'manufacturer', 'type' => 'text'],
                    ['label' => 'Supplier', 'name' => 'supplier', 'type' => 'text'],
                    ['label' => 'Lot Number', 'name' => 'lot_number', 'type' => 'text'],
                    ['label' => 'Batch Number', 'name' => 'batch_number', 'type' => 'text'],
                    ['label' => 'Date of Manufacture', 'name' => 'date_of_manufacture', 'type' => 'date'],
                    ['label' => 'Expiry Date', 'name' => 'expiry_date', 'type' => 'date'],
                    ['label' => 'Quantity available on Hand', 'name' => 'quantity_on_hand', 'type' => 'text'],
                ] as $index => $field)
                <tr>
                    <td style="padding:6px; text-align:center;"><strong>{{ $index + 1 }}</strong></td>
                    <td style="padding:6px;">{{ $field['label'] }}</td>
                    <td style="padding:6px;">
                        <input type="{{ $field['type'] }}" name="{{ $field['name'] }}"
                            style="width:100%; border:none; outline:none; padding:4px;">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <br><br>

        <!-- Reason For Recall -->
        <table style="width:100%;">
            <tbody>
                <tr><td><strong>Reason For Recall:</strong></td></tr>
                <tr>
                    <td style="padding:8px;">
                        <label style="margin-right:40px;">
                            <input type="checkbox" name="reason[]" value="Patient Complaint"> Patient Complaint
                        </label>
                        <label style="margin-right:40px;">
                            <input type="checkbox" name="reason[]" value="Supplier Recall"> Supplier Recall
                        </label>
                        <label>
                            <input type="checkbox" name="reason[]" value="Self Inspection"> Self Inspection
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span>Additional Notes: (Provide & Attach Supplier Recall Notice details)</span><br>
                        <textarea name="additional_notes" style="width:100%; height:80px; border:1px solid #ccc; padding:8px; border-radius:4px;"></textarea>
                    </td>
                </tr>
            </tbody>
        </table>

        <br>

        <!-- Disposal Plan -->
        <table style="width:100%; border-collapse:collapse;" border="1">
            <tbody>
                <tr>
                    <td colspan="3" style="padding:6px;"><strong>Disposal Plan:</strong></td>
                </tr>
                <tr>
                    <td style="padding:8px;">
                        <label><input type="checkbox" name="disposal[]" value="Return to Supplier/Manufacturer"> Return to Supplier/Manufacturer</label>
                    </td>
                    <td style="padding:8px;">
                        <label><input type="checkbox" name="disposal[]" value="Destroy & Dispose"> Destroy & Dispose</label>
                    </td>
                    <td style="padding:8px;">
                        <label><input type="checkbox" name="disposal[]" value="Autoclave and Send to Biomedical Waste"> Autoclave and Send to Biomedical Waste</label>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="padding:6px;">
                        Details of disposal method:
                        <textarea name="disposal_details" style="width:100%; height:80px; border:1px solid #ccc; padding:8px; border-radius:4px;"></textarea>
                    </td>
                </tr>
            </tbody>
        </table>

        <br>

        <!-- Locations Sub-table -->
        <p><strong>Quantities available in different locations.</strong></p>
        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center; width:50px;">S. No.</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Name of the Stores/Department</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Quantity & UOM</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Action Taken</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Signature of Dept In-charge</th>
                </tr>
            </thead>
            <tbody id="recallLocBody"></tbody>
        </table>

        <br><br>

        <p>
            I declare that the above quantities were received at the Central Stores and the disposal method mentioned above was followed to dispose the recalled product.
        </p>

        <br>

        <p><strong>Name of the Store Executive/Manager:</strong><br>
            <input type="text" name="store_manager" style="border:none; border-bottom:1px solid #000; width:60%; padding:4px;">
        </p>
        <p><strong>Designation:</strong><br>
            <input type="text" name="designation" style="border:none; border-bottom:1px solid #000; width:60%; padding:4px;">
        </p>
        <p><strong>Date:</strong><br>
            <input type="date" name="store_date" style="border:none; border-bottom:1px solid #000; width:30%; padding:4px;">
        </p>
        <p><strong>Signature:</strong><br>
            <input type="text" name="store_signature" style="border:none; border-bottom:1px solid #000; width:40%; padding:4px;">
        </p>

        <script>
        var recallLocCounter = 0;

        // ── LOAD ──
        function loadRecallFom010() {
            const productName = document.getElementById('recallFilterProduct').value.trim();
            if (!productName) {
                showToastFOM010SM('info', 'Please enter a product name to search.');
                return;
            }

            fetch(`/newforms/sm/recall-tracking/load?product_name=${encodeURIComponent(productName)}`, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.json())
            .then(res => {
                clearRecallFom010Fields();

                if (!res.data) {
                    document.getElementById('recall_form_id').value = '';
                    showToastFOM010SM('info', 'No records found. You can fill a new form.');
                    return;
                }

                document.getElementById('recall_form_id').value = res.data.id;
                const container = document.querySelector('[id="TDPL/SM/FOM-010"]');

                // Text / date fields
                const textFields = [
                    'product_category','product_name','manufacturer','supplier',
                    'lot_number','batch_number','date_of_manufacture','expiry_date',
                    'quantity_on_hand','additional_notes','disposal_details',
                    'store_manager','designation','store_date','store_signature'
                ];
                textFields.forEach(field => {
                    const el = container.querySelector('[name="' + field + '"]');
                    if (el && res.data[field] != null) el.value = res.data[field];
                });

                // Checkboxes: reason[]
                if (Array.isArray(res.data.reason)) {
                    res.data.reason.forEach(val => {
                        const cb = container.querySelector('input[name="reason[]"][value="' + val + '"]');
                        if (cb) cb.checked = true;
                    });
                }

                // Checkboxes: disposal[]
                if (Array.isArray(res.data.disposal)) {
                    res.data.disposal.forEach(val => {
                        const cb = container.querySelector('input[name="disposal[]"][value="' + val + '"]');
                        if (cb) cb.checked = true;
                    });
                }

                // Locations sub-table
                const locBody = document.getElementById('recallLocBody');
                locBody.innerHTML = '';
                recallLocCounter = 0;

                if (Array.isArray(res.data.locations) && res.data.locations.length > 0) {
                    res.data.locations.forEach(loc => {
                        recallLocCounter++;
                        const tr = document.createElement('tr');
                        tr.innerHTML = buildRecallLocRow(loc, recallLocCounter);
                        locBody.appendChild(tr);
                    });
                }
                addEmptyRecallLoc();

                showToastFOM010SM('success', 'Record loaded successfully.');
            })
            .catch(err => {
                console.error('Load error:', err);
                showToastFOM010SM('error', 'Failed to load data.');
            });
        }

        function buildRecallLocRow(loc, sno) {
            return `
                <td style="border:1px solid #000; padding:4px; text-align:center;"><strong>${sno}</strong></td>
                <td style="border:1px solid #000; padding:4px;"><input name="loc_department[]" value="${loc.department || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                <td style="border:1px solid #000; padding:4px;"><input name="loc_quantity[]" value="${loc.quantity || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                <td style="border:1px solid #000; padding:4px;"><input name="loc_action[]" value="${loc.action || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                <td style="border:1px solid #000; padding:4px;"><input name="loc_signature[]" value="${loc.signature || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
            `;
        }

        function addEmptyRecallLoc() {
            const tbody = document.getElementById('recallLocBody');
            if (!tbody) return;

            recallLocCounter++;
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td style="border:1px solid #000; padding:4px; text-align:center;"><strong>${recallLocCounter}</strong></td>
                <td style="border:1px solid #000; padding:4px;"><input name="loc_department[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                <td style="border:1px solid #000; padding:4px;"><input name="loc_quantity[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                <td style="border:1px solid #000; padding:4px;"><input name="loc_action[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                <td style="border:1px solid #000; padding:4px;"><input name="loc_signature[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
            `;
            tbody.appendChild(tr);

            tr.addEventListener('input', function handleLocInput() {
                tr.removeEventListener('input', handleLocInput);
                addEmptyRecallLoc();
            }, { once: true });
        }

        // ── CLEAR ──
        function clearRecallFom010() {
            document.getElementById('recallFilterProduct').value = '';
            document.getElementById('recall_form_id').value = '';
            clearRecallFom010Fields();
            showToastFOM010SM('info', 'Form cleared.');
        }

        function clearRecallFom010Fields() {
            const container = document.querySelector('[id="TDPL/SM/FOM-010"]');
            if (!container) return;
            container.querySelectorAll('input, textarea, select').forEach(el => {
                if (el.id === 'recallFilterProduct' || el.id === 'recall_form_id' || el.name === 'doc_no') return;
                if (el.type === 'checkbox' || el.type === 'radio') {
                    el.checked = false;
                } else {
                    el.value = '';
                }
            });
            // Reset locations sub-table
            const locBody = document.getElementById('recallLocBody');
            if (locBody) {
                locBody.innerHTML = '';
                recallLocCounter = 0;
                addEmptyRecallLoc();
            }
        }

        // ── AJAX SUBMIT ──
        (function() {
            function initRecallForm() {
                const formContainer = document.querySelector('[id="TDPL/SM/FOM-010"]');
                if (!formContainer) return;

                const form = formContainer.querySelector('form');
                if (!form || form.dataset.ajaxBoundRecall === 'true') return;
                form.dataset.ajaxBoundRecall = 'true';

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
                            showToastFOM010SM('success', result.message || 'Saved successfully!');
                            if (result.form_id) {
                                document.getElementById('recall_form_id').value = result.form_id;
                            }
                        } else {
                            showToastFOM010SM('error', result.message || 'Failed to save.');
                        }
                    })
                    .catch(err => {
                        console.error('Submit error:', err);
                        showToastFOM010SM('error', 'Failed to save. Please try again.');
                    })
                    .finally(() => {
                        if (submitBtn) {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        }
                    });
                });
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', function() {
                    initRecallForm();
                    addEmptyRecallLoc();
                });
            } else {
                initRecallForm();
                addEmptyRecallLoc();
            }
        })();

        function showToastFOM010SM(type, message) {
            const colors = { success: '#28a745', error: '#dc3545', info: '#17a2b8' };
            const toast = document.createElement('div');
            toast.style.cssText = 'position:fixed;top:20px;right:20px;z-index:9999;padding:12px 24px;border-radius:6px;color:#fff;font-size:14px;box-shadow:0 4px 12px rgba(0,0,0,0.15);background:' + (colors[type] || colors.info);
            toast.textContent = message;
            document.body.appendChild(toast);
            setTimeout(() => toast.remove(), 3000);
        }
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