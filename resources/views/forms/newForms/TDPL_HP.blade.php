@extends('layouts.base')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HP</title>
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
            <div style="font-size: 20px; ">HP </div>

        </div>
        <div class="icon-view">
            <div class="pc-content">
                <div class="pc-folder" onclick="showSection('TDPL/HP/FOM-001')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Quality Handling of H&E Stain</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HP/FOM-002')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Record of Histo Sample Discard</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HP/FOM-003')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">IQC-Histopathology Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HP/FOM-004')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Tissue Processor Reagent Change Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HP/FOM-005')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Used Reagents Discard Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HP/FOM-006')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label"> Formalin Preparation Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HP/FOM-007')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Formalin & TVOC Monitoring Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HP/FOM-008')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Histopathology Requisition Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HP/FOM-009')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Slides & Blocks Return Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HP/REG-001')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Histopathology Work Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HP/REG-002')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Histopathology Clinical Correlation Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HP/REG-003')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Slides and Blocks Return Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HP/REG-004')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Sample Labelling Errors Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HP/REG-005')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Decalcification Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HP/REG-006')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label"> Slides Storage Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HP/REG-007')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Blocks Storage Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HP/REG-008')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Histopathology Grossing Register</span>
                </div>
            </div>
        </div>
    </div>


    <x-formTemplete
        id="TDPL/HP/FOM-001"
        docNo="TDPL/HP/FOM-001"
        docName="Quality Handling of H&E Stain"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.hp.forms.submit') }}">

        <!-- Header Section -->
        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Month/Year:</strong>
                <input type="month" name="month_year" id="fom001_hp_month_year"
                    style="border:1px solid #000; padding:5px;"
                    onchange="loadQualityHandlingHeStain()">
            </div>
            <div>
                <strong>Location:</strong>
                <input type="text" name="location" id="fom001_hp_location" list="fom001_hp_loc_list"
                    style="border:1px solid #000; padding:5px; width:150px;"
                    onchange="loadQualityHandlingHeStain()">
                <datalist id="fom001_hp_loc_list">
                    <option value="Main Lab">
                    <option value="Branch Lab">
                    <option value="Collection Center">
                    <option value="Hospital Lab">
                    <option value="Clinic Lab">
                </datalist>
            </div>
            <div>
                <strong>Department:</strong>
                <input type="text" name="department" id="fom001_hp_department" list="fom001_hp_dept_list"
                    style="border:1px solid #000; padding:5px; width:150px;"
                    onchange="loadQualityHandlingHeStain()">
                <datalist id="fom001_hp_dept_list">
                    <option value="Histopathology">
                    <option value="Cytopathology">
                    <option value="Pathology">
                </datalist>
            </div>
            <button type="button" onclick="clearQualityHandlingHeStain()"
                style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <table style="border-collapse: collapse; width:100%; text-align:center;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px;"><strong>Date</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Xylene 1</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Xylene 2</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Xylene 3</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Alcohol 1</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Alcohol 2</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Alcohol 3</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Hematoxylin Stain Top Up</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Eosin</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Og6</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Alcohol 1</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Alcohol 2</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>EA36</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Alcohol 1</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Alcohol 2</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Sign</strong></th>
                </tr>
            </thead>

            <tbody>
                @for($i = 1; $i <= 31; $i++)
                    <tr>
                    <td style="padding:6px; font-weight:bold;">{{ sprintf('%02d', $i) }}</td>

                    @foreach([
                        'xylene_1','xylene_2','xylene_3',
                        'alcohol_1a','alcohol_2a','alcohol_3a',
                        'hematoxylin','eosin','og6',
                        'alcohol_1b','alcohol_2b','ea36',
                        'alcohol_1c','alcohol_2c','sign'
                    ] as $field)
                    <td style="padding:4px;">
                        <input type="text"
                            name="{{ $field }}_{{ $i }}"
                            id="fom001_hp_{{ $field }}_{{ $i }}"
                            style="width:100%; padding:4px; border:1px solid #ccc;" />
                    </td>
                    @endforeach
                    </tr>
                @endfor
            </tbody>
        </table>

        <script>
            function loadQualityHandlingHeStain() {
                const monthYear = document.getElementById('fom001_hp_month_year').value;
                const location = document.getElementById('fom001_hp_location').value;
                const department = document.getElementById('fom001_hp_department').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('month_year', monthYear);
                if (location) params.append('location', location);
                if (department) params.append('department', department);

                fetch(`/newforms/hp/quality-handling-he-stain/load?${params.toString()}`)
                    .then(res => res.json())
                    .then(result => {
                        // Populate datalists with dynamic values
                        if (result.locations) {
                            const locList = document.getElementById('fom001_hp_loc_list');
                            const defaultLocs = ['Main Lab', 'Branch Lab', 'Collection Center', 'Hospital Lab', 'Clinic Lab'];
                            const allLocs = [...new Set([...defaultLocs, ...result.locations])];
                            locList.innerHTML = allLocs.map(l => `<option value="${l}">`).join('');
                        }
                        if (result.departments) {
                            const deptList = document.getElementById('fom001_hp_dept_list');
                            const defaultDepts = ['Histopathology', 'Cytopathology', 'Pathology'];
                            const allDepts = [...new Set([...defaultDepts, ...result.departments])];
                            deptList.innerHTML = allDepts.map(d => `<option value="${d}">`).join('');
                        }

                        // Clear all inputs first
                        clearQualityHandlingHeStainInputs();

                        // If data found, populate fields
                        if (result.success && result.data) {
                            const data = result.data;

                            // Populate daily data
                            if (data.daily_data) {
                                for (const [key, value] of Object.entries(data.daily_data)) {
                                    const el = document.getElementById('fom001_hp_' + key);
                                    if (el) el.value = value;
                                }
                            }
                        }
                    })
                    .catch(err => console.error('Load error:', err));
            }

            function clearQualityHandlingHeStainInputs() {
                const fields = [
                    'xylene_1','xylene_2','xylene_3',
                    'alcohol_1a','alcohol_2a','alcohol_3a',
                    'hematoxylin','eosin','og6',
                    'alcohol_1b','alcohol_2b','ea36',
                    'alcohol_1c','alcohol_2c','sign'
                ];
                for (let i = 1; i <= 31; i++) {
                    fields.forEach(field => {
                        const el = document.getElementById(`fom001_hp_${field}_${i}`);
                        if (el) el.value = '';
                    });
                }
            }

            function clearQualityHandlingHeStain() {
                document.getElementById('fom001_hp_month_year').value = '';
                document.getElementById('fom001_hp_location').value = '';
                document.getElementById('fom001_hp_department').value = '';
                clearQualityHandlingHeStainInputs();
            }

            // AJAX Submit for FOM-001
            (function() {
                function initQualityHandlingHeStainForm() {
                    const formContainer = document.querySelector('[id="TDPL/HP/FOM-001"]');
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
                                showToastHPFOM001('success', result.message || 'Saved successfully!');
                            } else {
                                showToastHPFOM001('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastHPFOM001('error', 'Failed to save. Please try again.');
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

                function showToastHPFOM001(type, message) {
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
                    document.addEventListener('DOMContentLoaded', initQualityHandlingHeStainForm);
                } else {
                    initQualityHandlingHeStainForm();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HP/FOM-002"
        docNo="TDPL/HP/FOM-002"
        docName="Record of Histo Sample Discard"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.hp.forms.submit') }}">

        <!-- Header Section -->
        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Month/Year:</strong>
                <input type="month" name="month_year" id="fom002_hp_month_year"
                    style="border:1px solid #000; padding:5px;"
                    onchange="loadHistoSampleDiscard()">
            </div>
            <button type="button" onclick="clearHistoSampleDiscard()"
                style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <table style="width:100%; border-collapse: collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px;"><strong>S. No.</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Date &amp; Time</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Histopathology No.</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Preserve Sample No.</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>No. of Samples</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Samples Discard Date &amp; Time</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Discarded By<br>Sign &amp; Date</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Reviewed By<br>Sign &amp; Date</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>HOD<br>Sign &amp; Date</strong></th>
                </tr>
            </thead>

            <tbody>
                @for($i = 1; $i <= 31; $i++)
                    <tr>
                    <td style="padding:6px; text-align:center;"><strong>{{ $i }}</strong></td>

                    <td style="padding:6px;">
                        <input type="datetime-local" name="date_time_{{ $i }}" id="fom002_hp_date_time_{{ $i }}" style="width:100%; padding:4px;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="histo_no_{{ $i }}" id="fom002_hp_histo_no_{{ $i }}" style="width:100%; padding:4px;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="preserve_no_{{ $i }}" id="fom002_hp_preserve_no_{{ $i }}" style="width:100%; padding:4px;">
                    </td>

                    <td style="padding:6px;">
                        <input type="number" name="sample_count_{{ $i }}" id="fom002_hp_sample_count_{{ $i }}" style="width:100%; padding:4px;">
                    </td>

                    <td style="padding:6px;">
                        <input type="datetime-local" name="discard_date_{{ $i }}" id="fom002_hp_discard_date_{{ $i }}" style="width:100%; padding:4px;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="discarded_by_{{ $i }}" id="fom002_hp_discarded_by_{{ $i }}" placeholder="Name" style="width:100%; padding:4px; margin-bottom:4px;">
                        <input type="date" name="discard_sign_date_{{ $i }}" id="fom002_hp_discard_sign_date_{{ $i }}" style="width:100%; padding:4px;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="reviewed_by_{{ $i }}" id="fom002_hp_reviewed_by_{{ $i }}" placeholder="Name" style="width:100%; padding:4px; margin-bottom:4px;">
                        <input type="date" name="review_sign_date_{{ $i }}" id="fom002_hp_review_sign_date_{{ $i }}" style="width:100%; padding:4px;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="hod_{{ $i }}" id="fom002_hp_hod_{{ $i }}" placeholder="Name" style="width:100%; padding:4px; margin-bottom:4px;">
                        <input type="date" name="hod_sign_date_{{ $i }}" id="fom002_hp_hod_sign_date_{{ $i }}" style="width:100%; padding:4px;">
                    </td>
                    </tr>
                @endfor
            </tbody>
        </table>

        <script>
            function loadHistoSampleDiscard() {
                const monthYear = document.getElementById('fom002_hp_month_year').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('month_year', monthYear);

                fetch(`/newforms/hp/record-histo-sample-discard/load?${params.toString()}`)
                    .then(res => res.json())
                    .then(result => {
                        // Clear all inputs first
                        clearHistoSampleDiscardInputs();

                        // If data found, populate fields
                        if (result.success && result.data) {
                            const data = result.data;

                            // Populate daily data
                            if (data.daily_data) {
                                for (const [key, value] of Object.entries(data.daily_data)) {
                                    const el = document.getElementById('fom002_hp_' + key);
                                    if (el) el.value = value;
                                }
                            }
                        }
                    })
                    .catch(err => console.error('Load error:', err));
            }

            function clearHistoSampleDiscardInputs() {
                const fields = [
                    'date_time','histo_no','preserve_no','sample_count',
                    'discard_date','discarded_by','discard_sign_date',
                    'reviewed_by','review_sign_date','hod','hod_sign_date'
                ];
                for (let i = 1; i <= 31; i++) {
                    fields.forEach(field => {
                        const el = document.getElementById(`fom002_hp_${field}_${i}`);
                        if (el) el.value = '';
                    });
                }
            }

            function clearHistoSampleDiscard() {
                document.getElementById('fom002_hp_month_year').value = '';
                clearHistoSampleDiscardInputs();
            }

            // AJAX Submit for FOM-002
            (function() {
                function initHistoSampleDiscardForm() {
                    const formContainer = document.querySelector('[id="TDPL/HP/FOM-002"]');
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
                                showToastHPFOM002('success', result.message || 'Saved successfully!');
                            } else {
                                showToastHPFOM002('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastHPFOM002('error', 'Failed to save. Please try again.');
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

                function showToastHPFOM002(type, message) {
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
                    document.addEventListener('DOMContentLoaded', initHistoSampleDiscardForm);
                } else {
                    initHistoSampleDiscardForm();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HP/FOM-003"
        docNo="TDPL/HP/FOM-003"
        docName="IQC-Histopathology Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.hp.forms.submit') }}">

        <!-- Header Section -->
        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Month/Year:</strong>
                <input type="month" name="month_year" id="fom003_hp_month_year"
                    style="border:1px solid #000; padding:5px;"
                    onchange="loadIqcHistopathology()">
            </div>
            <div>
                <strong>Location:</strong>
                <input type="text" name="location" id="fom003_hp_location" list="fom003_hp_loc_list"
                    style="border:1px solid #000; padding:5px; width:150px;"
                    onchange="loadIqcHistopathology()">
                <datalist id="fom003_hp_loc_list">
                    <option value="Main Lab">
                    <option value="Branch Lab">
                    <option value="Collection Center">
                    <option value="Hospital Lab">
                    <option value="Clinic Lab">
                </datalist>
            </div>
            <div>
                <strong>Department:</strong>
                <input type="text" name="department" id="fom003_hp_department" list="fom003_hp_dept_list"
                    style="border:1px solid #000; padding:5px; width:150px;"
                    onchange="loadIqcHistopathology()">
                <datalist id="fom003_hp_dept_list">
                    <option value="Histopathology">
                    <option value="Cytopathology">
                    <option value="Pathology">
                </datalist>
            </div>
            <button type="button" onclick="clearIqcHistopathology()"
                style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <!-- TABLE 1: TISSUE PROCESSING & MICROTOMY -->
        <div style="overflow-x: auto; margin-bottom: 40px;">
            <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
                <thead>
                    <tr style="background-color: #34495e; color: white;">
                        <th style="border: 1px solid #2c3e50; padding: 10px; text-align: left; min-width: 220px; font-weight: bold;">
                            Date →
                        </th>
                        @for($day = 1; $day <= 31; $day++)
                            <th style="border: 1px solid #2c3e50; padding: 8px; text-align: center; min-width: 35px; font-weight: bold;">
                            {{ $day }}
                            </th>
                            @endfor
                            <th style="border: 1px solid #2c3e50; padding: 10px; text-align: left; min-width: 150px; font-weight: bold;">
                                Remarks
                            </th>
                    </tr>
                </thead>
                <tbody>
                    <!-- HP NUMBER Row -->
                    <tr style="background-color: #f8f9fa;">
                        <td style="border: 1px solid #ddd; padding: 8px; font-weight: 500;">HP NUMBER</td>
                        @for($day = 1; $day <= 31; $day++)
                            <td style="border: 1px solid #ddd; padding: 4px; text-align: center;">
                            <input type="text" name="hp_number[{{ $day }}]"
                                id="fom003_hp_hp_number_{{ $day }}"
                                style="width: 100%; border: none; text-align: center; padding: 4px; font-size: 11px;">
                            </td>
                            @endfor
                            <td style="border: 1px solid #ddd; padding: 4px;">
                                <input type="text" name="hp_number_remarks"
                                    id="fom003_hp_hp_number_remarks"
                                    style="width: 100%; border: none; padding: 4px; font-size: 11px;">
                            </td>
                    </tr>

                    <!-- TISSUE PROCESSING Section Header -->
                    <tr style="background-color: #3498db; color: white;">
                        <td colspan="33" style="border: 1px solid #2980b9; padding: 8px; font-weight: bold;">
                            TISSUE PROCESSING
                        </td>
                    </tr>

                    @foreach([
                    'absence_formation_pigment' => 'Absence of formation pigment',
                    'dehydration' => 'Dehydration',
                    'clearing' => 'Clearing',
                    'paraffin_wax' => 'Paraffin wax impregnation',
                    'orientation_embedding' => 'Orientation during embedding'
                    ] as $key => $label)
                    <tr style="background-color: {{ $loop->iteration % 2 == 0 ? '#f8f9fa' : '#ffffff' }};">
                        <td style="border: 1px solid #ddd; padding: 8px;">{{ $label }}</td>
                        @for($day = 1; $day <= 31; $day++)
                            <td style="border: 1px solid #ddd; padding: 4px; text-align: center;">
                            <input type="checkbox" name="tissue_processing[{{ $key }}][{{ $day }}]" value="1"
                                id="fom003_hp_tp_{{ $key }}_{{ $day }}"
                                style="cursor: pointer;">
                            </td>
                            @endfor
                            <td style="border: 1px solid #ddd; padding: 4px;">
                                <input type="text" name="tissue_processing[{{ $key }}][remarks]"
                                    id="fom003_hp_tp_{{ $key }}_remarks"
                                    style="width: 100%; border: none; padding: 4px; font-size: 11px;">
                            </td>
                    </tr>
                    @endforeach

                    <!-- MICROTOMY Section Header -->
                    <tr style="background-color: #3498db; color: white;">
                        <td colspan="33" style="border: 1px solid #2980b9; padding: 8px; font-weight: bold;">
                            MICROTOMY
                        </td>
                    </tr>

                    @foreach([
                    'thickness_section' => 'Thickness of section',
                    'knife_artefacts' => 'Knife artefacts (nicks/vibration/chatter)',
                    'section_artefacts' => 'Section artefacts (folds/tears/cracks)',
                    'floaters_position' => 'Floaters and position of section of slide'
                    ] as $key => $label)
                    <tr style="background-color: {{ $loop->iteration % 2 == 0 ? '#f8f9fa' : '#ffffff' }};">
                        <td style="border: 1px solid #ddd; padding: 8px;">{{ $label }}</td>
                        @for($day = 1; $day <= 31; $day++)
                            <td style="border: 1px solid #ddd; padding: 4px; text-align: center;">
                            <input type="checkbox" name="microtomy[{{ $key }}][{{ $day }}]" value="1"
                                id="fom003_hp_mc_{{ $key }}_{{ $day }}"
                                style="cursor: pointer;">
                            </td>
                            @endfor
                            <td style="border: 1px solid #ddd; padding: 4px;">
                                <input type="text" name="microtomy[{{ $key }}][remarks]"
                                    id="fom003_hp_mc_{{ $key }}_remarks"
                                    style="width: 100%; border: none; padding: 4px; font-size: 11px;">
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- TABLE 2: STAINING & MOUNTING -->
        <div style="overflow-x: auto; margin-bottom: 40px;">
            <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
                <thead>
                    <tr style="background-color: #34495e; color: white;">
                        <th style="border: 1px solid #2c3e50; padding: 10px; text-align: left; min-width: 220px; font-weight: bold;">
                            Date →
                        </th>
                        @for($day = 1; $day <= 31; $day++)
                            <th style="border: 1px solid #2c3e50; padding: 8px; text-align: center; min-width: 35px; font-weight: bold;">
                            {{ $day }}
                            </th>
                            @endfor
                            <th style="border: 1px solid #2c3e50; padding: 10px; text-align: left; min-width: 150px; font-weight: bold;">
                                Remarks
                            </th>
                    </tr>
                </thead>
                <tbody>
                    <!-- HP NUMBER Row -->
                    <tr style="background-color: #f8f9fa;">
                        <td style="border: 1px solid #ddd; padding: 8px; font-weight: bold;">HP Number</td>
                        @for($day = 1; $day <= 31; $day++)
                            <td style="border: 1px solid #ddd; padding: 4px; text-align: center;">
                            <input type="text" name="hp_number_2[{{ $day }}]"
                                id="fom003_hp_hp_number_2_{{ $day }}"
                                style="width: 100%; border: none; text-align: center; padding: 4px; font-size: 11px;">
                            </td>
                            @endfor
                            <td style="border: 1px solid #ddd; padding: 4px;">
                                <input type="text" name="hp_number_2_remarks"
                                    id="fom003_hp_hp_number_2_remarks"
                                    style="width: 100%; border: none; padding: 4px; font-size: 11px;">
                            </td>
                    </tr>

                    <!-- STAINING Section Header -->
                    <tr style="background-color: #e74c3c; color: white;">
                        <td colspan="33" style="border: 1px solid #c0392b; padding: 8px; font-weight: bold;">
                            STAINING
                        </td>
                    </tr>

                    @foreach([
                    'contrast_lowest_power' => 'Contrast at lowest power',
                    'chromatin_detail' => 'Chromatin detail',
                    'hematoxylin_intensity' => 'Hematoxylin intensity and differentiation',
                    'uniformity_staining' => 'Uniformity of staining',
                    'eosin_intensity' => 'Eosin intensity and selectivity',
                    'residual_wax' => 'Residual Wax'
                    ] as $key => $label)
                    <tr style="background-color: {{ $loop->iteration % 2 == 0 ? '#f8f9fa' : '#ffffff' }};">
                        <td style="border: 1px solid #ddd; padding: 8px;">{{ $label }}</td>
                        @for($day = 1; $day <= 31; $day++)
                            <td style="border: 1px solid #ddd; padding: 4px; text-align: center;">
                            <input type="checkbox" name="staining[{{ $key }}][{{ $day }}]" value="1"
                                id="fom003_hp_st_{{ $key }}_{{ $day }}"
                                style="cursor: pointer;">
                            </td>
                            @endfor
                            <td style="border: 1px solid #ddd; padding: 4px;">
                                <input type="text" name="staining[{{ $key }}][remarks]"
                                    id="fom003_hp_st_{{ $key }}_remarks"
                                    style="width: 100%; border: none; padding: 4px; font-size: 11px;">
                            </td>
                    </tr>
                    @endforeach

                    <!-- MOUNTING AND LABELLING Section Header -->
                    <tr style="background-color: #e74c3c; color: white;">
                        <td colspan="33" style="border: 1px solid #c0392b; padding: 8px; font-weight: bold;">
                            MOUNTING AND LABELLING
                        </td>
                    </tr>

                    @foreach([
                    'dehydration_clarity' => 'Dehydration of section and clarity',
                    'air_bubbles' => 'Air bubbles under cover slip',
                    'messy_mounting' => 'Messy mounting',
                    'tissue_exposed' => 'Tissue section exposed',
                    'label_details' => 'Label details'
                    ] as $key => $label)
                    <tr style="background-color: {{ $loop->iteration % 2 == 0 ? '#f8f9fa' : '#ffffff' }};">
                        <td style="border: 1px solid #ddd; padding: 8px;">{{ $label }}</td>
                        @for($day = 1; $day <= 31; $day++)
                            <td style="border: 1px solid #ddd; padding: 4px; text-align: center;">
                            <input type="checkbox" name="mounting[{{ $key }}][{{ $day }}]" value="1"
                                id="fom003_hp_mt_{{ $key }}_{{ $day }}"
                                style="cursor: pointer;">
                            </td>
                            @endfor
                            <td style="border: 1px solid #ddd; padding: 4px;">
                                <input type="text" name="mounting[{{ $key }}][remarks]"
                                    id="fom003_hp_mt_{{ $key }}_remarks"
                                    style="width: 100%; border: none; padding: 4px; font-size: 11px;">
                            </td>
                    </tr>
                    @endforeach

                    <!-- Signature Rows -->
                    <tr style="background-color: #fff3cd;">
                        <td style="border: 1px solid #ddd; padding: 8px; font-weight: bold;">Technician Signature</td>
                        @for($day = 1; $day <= 31; $day++)
                            <td style="border: 1px solid #ddd; padding: 4px; text-align: center;">
                            <input type="text" name="technician_signature[{{ $day }}]"
                                id="fom003_hp_tech_sig_{{ $day }}"
                                style="width: 100%; border: none; text-align: center; padding: 4px; font-size: 10px;">
                            </td>
                            @endfor
                            <td style="border: 1px solid #ddd; padding: 4px;">
                                <input type="text" name="technician_signature_remarks"
                                    id="fom003_hp_tech_sig_remarks"
                                    style="width: 100%; border: none; padding: 4px; font-size: 11px;">
                            </td>
                    </tr>

                    <tr style="background-color: #d4edda;">
                        <td style="border: 1px solid #ddd; padding: 8px; font-weight: bold;">Doctor Signature</td>
                        @for($day = 1; $day <= 31; $day++)
                            <td style="border: 1px solid #ddd; padding: 4px; text-align: center;">
                            <input type="text" name="doctor_signature[{{ $day }}]"
                                id="fom003_hp_doc_sig_{{ $day }}"
                                style="width: 100%; border: none; text-align: center; padding: 4px; font-size: 10px;">
                            </td>
                            @endfor
                            <td style="border: 1px solid #ddd; padding: 4px;">
                                <input type="text" name="doctor_signature_remarks"
                                    id="fom003_hp_doc_sig_remarks"
                                    style="width: 100%; border: none; padding: 4px; font-size: 11px;">
                            </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <script>
            function loadIqcHistopathology() {
                const monthYear = document.getElementById('fom003_hp_month_year').value;
                const location = document.getElementById('fom003_hp_location').value;
                const department = document.getElementById('fom003_hp_department').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('month_year', monthYear);
                if (location) params.append('location', location);
                if (department) params.append('department', department);

                fetch(`/newforms/hp/iqc-histopathology/load?${params.toString()}`)
                    .then(res => res.json())
                    .then(result => {
                        if (result.locations) {
                            const locList = document.getElementById('fom003_hp_loc_list');
                            const defaultLocs = ['Main Lab', 'Branch Lab', 'Collection Center', 'Hospital Lab', 'Clinic Lab'];
                            const allLocs = [...new Set([...defaultLocs, ...result.locations])];
                            locList.innerHTML = allLocs.map(l => `<option value="${l}">`).join('');
                        }
                        if (result.departments) {
                            const deptList = document.getElementById('fom003_hp_dept_list');
                            const defaultDepts = ['Histopathology', 'Cytopathology', 'Pathology'];
                            const allDepts = [...new Set([...defaultDepts, ...result.departments])];
                            deptList.innerHTML = allDepts.map(d => `<option value="${d}">`).join('');
                        }

                        clearIqcHistopathologyInputs();

                        if (result.success && result.data) {
                            const dd = result.data.daily_data;
                            if (!dd) return;

                            // HP NUMBER (table 1)
                            if (dd.hp_number) {
                                for (const [day, val] of Object.entries(dd.hp_number)) {
                                    const el = document.getElementById('fom003_hp_hp_number_' + day);
                                    if (el) el.value = val;
                                }
                            }
                            if (dd.hp_number_remarks) {
                                const el = document.getElementById('fom003_hp_hp_number_remarks');
                                if (el) el.value = dd.hp_number_remarks;
                            }

                            // TISSUE PROCESSING
                            if (dd.tissue_processing) {
                                for (const [key, days] of Object.entries(dd.tissue_processing)) {
                                    for (const [day, val] of Object.entries(days)) {
                                        if (day === 'remarks') {
                                            const el = document.getElementById('fom003_hp_tp_' + key + '_remarks');
                                            if (el) el.value = val;
                                        } else {
                                            const el = document.getElementById('fom003_hp_tp_' + key + '_' + day);
                                            if (el) el.checked = !!val;
                                        }
                                    }
                                }
                            }

                            // MICROTOMY
                            if (dd.microtomy) {
                                for (const [key, days] of Object.entries(dd.microtomy)) {
                                    for (const [day, val] of Object.entries(days)) {
                                        if (day === 'remarks') {
                                            const el = document.getElementById('fom003_hp_mc_' + key + '_remarks');
                                            if (el) el.value = val;
                                        } else {
                                            const el = document.getElementById('fom003_hp_mc_' + key + '_' + day);
                                            if (el) el.checked = !!val;
                                        }
                                    }
                                }
                            }

                            // HP NUMBER 2 (table 2)
                            if (dd.hp_number_2) {
                                for (const [day, val] of Object.entries(dd.hp_number_2)) {
                                    const el = document.getElementById('fom003_hp_hp_number_2_' + day);
                                    if (el) el.value = val;
                                }
                            }
                            if (dd.hp_number_2_remarks) {
                                const el = document.getElementById('fom003_hp_hp_number_2_remarks');
                                if (el) el.value = dd.hp_number_2_remarks;
                            }

                            // STAINING
                            if (dd.staining) {
                                for (const [key, days] of Object.entries(dd.staining)) {
                                    for (const [day, val] of Object.entries(days)) {
                                        if (day === 'remarks') {
                                            const el = document.getElementById('fom003_hp_st_' + key + '_remarks');
                                            if (el) el.value = val;
                                        } else {
                                            const el = document.getElementById('fom003_hp_st_' + key + '_' + day);
                                            if (el) el.checked = !!val;
                                        }
                                    }
                                }
                            }

                            // MOUNTING
                            if (dd.mounting) {
                                for (const [key, days] of Object.entries(dd.mounting)) {
                                    for (const [day, val] of Object.entries(days)) {
                                        if (day === 'remarks') {
                                            const el = document.getElementById('fom003_hp_mt_' + key + '_remarks');
                                            if (el) el.value = val;
                                        } else {
                                            const el = document.getElementById('fom003_hp_mt_' + key + '_' + day);
                                            if (el) el.checked = !!val;
                                        }
                                    }
                                }
                            }

                            // TECHNICIAN SIGNATURE
                            if (dd.technician_signature) {
                                for (const [day, val] of Object.entries(dd.technician_signature)) {
                                    const el = document.getElementById('fom003_hp_tech_sig_' + day);
                                    if (el) el.value = val;
                                }
                            }
                            if (dd.technician_signature_remarks) {
                                const el = document.getElementById('fom003_hp_tech_sig_remarks');
                                if (el) el.value = dd.technician_signature_remarks;
                            }

                            // DOCTOR SIGNATURE
                            if (dd.doctor_signature) {
                                for (const [day, val] of Object.entries(dd.doctor_signature)) {
                                    const el = document.getElementById('fom003_hp_doc_sig_' + day);
                                    if (el) el.value = val;
                                }
                            }
                            if (dd.doctor_signature_remarks) {
                                const el = document.getElementById('fom003_hp_doc_sig_remarks');
                                if (el) el.value = dd.doctor_signature_remarks;
                            }
                        }
                    })
                    .catch(err => console.error('Load error:', err));
            }

            function clearIqcHistopathologyInputs() {
                const container = document.querySelector('[id="TDPL/HP/FOM-003"]');
                if (!container) return;
                container.querySelectorAll('input[type="text"], input[type="number"]').forEach(el => {
                    if (el.id && el.id.startsWith('fom003_hp_')) el.value = '';
                });
                container.querySelectorAll('input[type="checkbox"]').forEach(el => {
                    if (el.id && el.id.startsWith('fom003_hp_')) el.checked = false;
                });
            }

            function clearIqcHistopathology() {
                document.getElementById('fom003_hp_month_year').value = '';
                document.getElementById('fom003_hp_location').value = '';
                document.getElementById('fom003_hp_department').value = '';
                clearIqcHistopathologyInputs();
            }

            // AJAX Submit for FOM-003
            (function() {
                function initIqcHistopathologyForm() {
                    const formContainer = document.querySelector('[id="TDPL/HP/FOM-003"]');
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
                                showToastHPFOM003('success', result.message || 'Saved successfully!');
                            } else {
                                showToastHPFOM003('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastHPFOM003('error', 'Failed to save. Please try again.');
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

                function showToastHPFOM003(type, message) {
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
                    document.addEventListener('DOMContentLoaded', initIqcHistopathologyForm);
                } else {
                    initIqcHistopathologyForm();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HP/FOM-004"
        docNo="TDPL/HP/FOM-004"
        docName="Tissue Processor Reagent Change Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.hp.forms.submit') }}">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="HP_FOM_004__from_date"
                    onchange="loadTissueProcessorReagent()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="HP_FOM_004__to_date"
                    onchange="loadTissueProcessorReagent()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>Department</strong></label>
                <input type="text" name="department" id="HP_FOM_004__department" list="HP_FOM_004__department_list"
                    onchange="loadTissueProcessorReagent()" onblur="loadTissueProcessorReagent()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="HP_FOM_004__department_list">
                    <option value="Histopathology">
                    <option value="Cytopathology">
                    <option value="Pathology">
                </datalist>
            </div>
            <div>
                <label><strong>Location</strong></label>
                <input type="text" name="location" id="HP_FOM_004__location" list="HP_FOM_004__location_list"
                    onchange="loadTissueProcessorReagent()" onblur="loadTissueProcessorReagent()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="HP_FOM_004__location_list">
                    <option value="Main Lab">
                    <option value="Branch Lab">
                    <option value="Collection Center">
                    <option value="Hospital Lab">
                    <option value="Clinic Lab">
                </datalist>
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearTissueProcessorReagentFilters()"
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
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Formalin 1</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Formalin 2</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Processing Water</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Alcohol 70%</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Alcohol 80%</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Alcohol 90%</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Absolute Alcohol</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Absolute Alcohol</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Absolute Alcohol</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Xylene 1</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Xylene 2</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Wax 1</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Wax 2</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Cleaning Xylene</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Cleaning Alcohol</td>
                </tr>
            </thead>
            <tbody id="HP_FOM_004__tbody">
                <!-- Empty row for new entry -->
                <tr>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="formalin1[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="formalin2[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="processing_water[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="alcohol70[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="alcohol80[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="alcohol90[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="absolute1[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="absolute2[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="absolute3[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="xylene1[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="xylene2[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="wax1[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="wax2[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="cleaning_xylene[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="cleaning_alcohol[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                </tr>
            </tbody>
        </table>

        <p><strong>Note:</strong> Reagent change is scheduled every 15 days.</p>

        <script>
            function loadTissueProcessorReagent() {
                const fromDate = document.getElementById('HP_FOM_004__from_date').value;
                const toDate = document.getElementById('HP_FOM_004__to_date').value;

                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                const department = document.getElementById('HP_FOM_004__department').value;
                if (department) params.append('department', department);

                const location = document.getElementById('HP_FOM_004__location').value;
                if (location) params.append('location', location);

                fetch(`/newforms/hp/tissue-processor-reagent/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    const tbody = document.getElementById('HP_FOM_004__tbody');
                    if (!tbody) return;

                    tbody.innerHTML = '';

                    if (res.departments) {
                        updateFOM004Datalist('HP_FOM_004__department_list', res.departments);
                    }
                    if (res.locations) {
                        updateFOM004Datalist('HP_FOM_004__location_list', res.locations);
                    }

                    if (!res.data || res.data.length === 0) {
                        addEmptyRowFOM004();
                        return;
                    }

                    res.data.forEach(row => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = buildFOM004RowHTML(row);
                        tbody.appendChild(tr);
                    });

                    addEmptyRowFOM004();
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function buildFOM004RowHTML(row) {
                const fields = ['formalin1','formalin2','processing_water','alcohol70','alcohol80','alcohol90','absolute1','absolute2','absolute3','xylene1','xylene2','wax1','wax2','cleaning_xylene','cleaning_alcohol'];
                let html = `<td style="border:1px solid #000; padding:4px;">
                    <input type="hidden" name="row_id[]" value="${row.id}">
                    <input type="date" name="row_date[]" value="${row.row_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                </td>`;
                fields.forEach(f => {
                    html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" value="${row[f] || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
                });
                return html;
            }

            function addEmptyRowFOM004() {
                const tbody = document.getElementById('HP_FOM_004__tbody');
                if (!tbody) return;

                const fields = ['formalin1','formalin2','processing_water','alcohol70','alcohol80','alcohol90','absolute1','absolute2','absolute3','xylene1','xylene2','wax1','wax2','cleaning_xylene','cleaning_alcohol'];
                const tr = document.createElement('tr');
                let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
                fields.forEach(f => {
                    html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
                });
                tr.innerHTML = html;
                tbody.appendChild(tr);
            }

            function clearTissueProcessorReagentForm() {
                const tbody = document.getElementById('HP_FOM_004__tbody');
                if (tbody) {
                    tbody.innerHTML = '';
                    addEmptyRowFOM004();
                }
            }

            function clearTissueProcessorReagentFilters() {
                document.getElementById('HP_FOM_004__from_date').value = '';
                document.getElementById('HP_FOM_004__to_date').value = '';
                document.getElementById('HP_FOM_004__department').value = '';
                document.getElementById('HP_FOM_004__location').value = '';
                clearTissueProcessorReagentForm();
            }

            function updateFOM004Datalist(datalistId, values) {
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

            // AJAX Submit for FOM-004
            (function() {
                function initTissueProcessorReagentForm() {
                    const formContainer = document.querySelector('[id="TDPL/HP/FOM-004"]');
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
                                showToastHPFOM004('success', result.message || 'Saved successfully!');

                                const tbody = document.getElementById('HP_FOM_004__tbody');
                                if (tbody && result.data && result.data.length > 0) {
                                    tbody.innerHTML = '';

                                    result.data.forEach(row => {
                                        const tr = document.createElement('tr');
                                        tr.innerHTML = buildFOM004RowHTML(row);
                                        tbody.appendChild(tr);
                                    });

                                    addEmptyRowFOM004();
                                }
                            } else {
                                showToastHPFOM004('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastHPFOM004('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                function showToastHPFOM004(type, message) {
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
                    document.addEventListener('DOMContentLoaded', initTissueProcessorReagentForm);
                } else {
                    initTissueProcessorReagentForm();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HP/FOM-005"
        docNo="TDPL/HP/FOM-005"
        docName="Used Reagents Discard Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.hp.forms.submit') }}">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="HP_FOM_005__from_date"
                    onchange="loadUsedReagentsDiscard()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="HP_FOM_005__to_date"
                    onchange="loadUsedReagentsDiscard()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>Department</strong></label>
                <input type="text" name="department" id="HP_FOM_005__department" list="HP_FOM_005__department_list"
                    onchange="loadUsedReagentsDiscard()" onblur="loadUsedReagentsDiscard()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="HP_FOM_005__department_list">
                    <option value="Histopathology">
                    <option value="Cytopathology">
                    <option value="Pathology">
                </datalist>
            </div>
            <div>
                <label><strong>Location</strong></label>
                <input type="text" name="location" id="HP_FOM_005__location" list="HP_FOM_005__location_list"
                    onchange="loadUsedReagentsDiscard()" onblur="loadUsedReagentsDiscard()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="HP_FOM_005__location_list">
                    <option value="Main Lab">
                    <option value="Branch Lab">
                    <option value="Collection Center">
                    <option value="Hospital Lab">
                    <option value="Clinic Lab">
                </datalist>
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearUsedReagentsDiscardFilters()"
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
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Reagent Name</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Quantity</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Handover By</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Received By</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Name of the Agency</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Collection Date & Time by Agency</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">HOD Sign</td>
                </tr>
            </thead>
            <tbody id="HP_FOM_005__tbody">
                <!-- Empty row for new entry -->
                <tr>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="reagent_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="quantity[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="handover_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="received_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="agency_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="datetime-local" name="collection_datetime[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="hod_sign[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                </tr>
            </tbody>
        </table>

        <script>
            function loadUsedReagentsDiscard() {
                const fromDate = document.getElementById('HP_FOM_005__from_date').value;
                const toDate = document.getElementById('HP_FOM_005__to_date').value;

                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                const department = document.getElementById('HP_FOM_005__department').value;
                if (department) params.append('department', department);

                const location = document.getElementById('HP_FOM_005__location').value;
                if (location) params.append('location', location);

                fetch(`/newforms/hp/used-reagents-discard/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    const tbody = document.getElementById('HP_FOM_005__tbody');
                    if (!tbody) return;

                    tbody.innerHTML = '';

                    if (res.departments) {
                        updateFOM005Datalist('HP_FOM_005__department_list', res.departments);
                    }
                    if (res.locations) {
                        updateFOM005Datalist('HP_FOM_005__location_list', res.locations);
                    }

                    if (!res.data || res.data.length === 0) {
                        addEmptyRowFOM005();
                        return;
                    }

                    res.data.forEach(row => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = buildFOM005RowHTML(row);
                        tbody.appendChild(tr);
                    });

                    addEmptyRowFOM005();
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function buildFOM005RowHTML(row) {
                return `<td style="border:1px solid #000; padding:4px;">
                        <input type="hidden" name="row_id[]" value="${row.id}">
                        <input type="date" name="row_date[]" value="${row.row_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>
                    <td style="border:1px solid #000; padding:4px;"><input name="reagent_name[]" value="${row.reagent_name || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="quantity[]" value="${row.quantity || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="handover_by[]" value="${row.handover_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="received_by[]" value="${row.received_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="agency_name[]" value="${row.agency_name || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="datetime-local" name="collection_datetime[]" value="${row.collection_datetime || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="hod_sign[]" value="${row.hod_sign || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
            }

            function addEmptyRowFOM005() {
                const tbody = document.getElementById('HP_FOM_005__tbody');
                if (!tbody) return;

                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="reagent_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="quantity[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="handover_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="received_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="agency_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="datetime-local" name="collection_datetime[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="hod_sign[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                `;
                tbody.appendChild(tr);
            }

            function clearUsedReagentsDiscardForm() {
                const tbody = document.getElementById('HP_FOM_005__tbody');
                if (tbody) {
                    tbody.innerHTML = '';
                    addEmptyRowFOM005();
                }
            }

            function clearUsedReagentsDiscardFilters() {
                document.getElementById('HP_FOM_005__from_date').value = '';
                document.getElementById('HP_FOM_005__to_date').value = '';
                document.getElementById('HP_FOM_005__department').value = '';
                document.getElementById('HP_FOM_005__location').value = '';
                clearUsedReagentsDiscardForm();
            }

            function updateFOM005Datalist(datalistId, values) {
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

            // AJAX Submit for FOM-005
            (function() {
                function initUsedReagentsDiscardForm() {
                    const formContainer = document.querySelector('[id="TDPL/HP/FOM-005"]');
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
                                showToastHPFOM005('success', result.message || 'Saved successfully!');

                                const tbody = document.getElementById('HP_FOM_005__tbody');
                                if (tbody && result.data && result.data.length > 0) {
                                    tbody.innerHTML = '';

                                    result.data.forEach(row => {
                                        const tr = document.createElement('tr');
                                        tr.innerHTML = buildFOM005RowHTML(row);
                                        tbody.appendChild(tr);
                                    });

                                    addEmptyRowFOM005();
                                }
                            } else {
                                showToastHPFOM005('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastHPFOM005('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                function showToastHPFOM005(type, message) {
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
                    document.addEventListener('DOMContentLoaded', initUsedReagentsDiscardForm);
                } else {
                    initUsedReagentsDiscardForm();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HP/FOM-006"
        docNo="TDPL/HP/FOM-006"
        docName="Formalin Preparation Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.hp.forms.submit') }}">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="HP_FOM_006__from_date"
                    onchange="loadFormalinPreparation()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="HP_FOM_006__to_date"
                    onchange="loadFormalinPreparation()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>Department</strong></label>
                <input type="text" name="department" id="HP_FOM_006__department" list="HP_FOM_006__department_list"
                    onchange="loadFormalinPreparation()" onblur="loadFormalinPreparation()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="HP_FOM_006__department_list">
                    <option value="Histopathology">
                    <option value="Cytopathology">
                    <option value="Pathology">
                </datalist>
            </div>
            <div>
                <label><strong>Location</strong></label>
                <input type="text" name="location" id="HP_FOM_006__location" list="HP_FOM_006__location_list"
                    onchange="loadFormalinPreparation()" onblur="loadFormalinPreparation()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="HP_FOM_006__location_list">
                    <option value="Main Lab">
                    <option value="Branch Lab">
                    <option value="Collection Center">
                    <option value="Hospital Lab">
                    <option value="Clinic Lab">
                </datalist>
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearFormalinPreparationFilters()"
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
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">pH</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Volume Prepared</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Prepared By</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Verified By</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Remarks</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">HOD Signature</td>
                </tr>
            </thead>
            <tbody id="HP_FOM_006__tbody">
                <tr>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="ph[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="volume_prepared[]" placeholder="ml" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="prepared_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="verified_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="remarks[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="hod_signature[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                </tr>
            </tbody>
        </table>

        <script>
            function loadFormalinPreparation() {
                const fromDate = document.getElementById('HP_FOM_006__from_date').value;
                const toDate = document.getElementById('HP_FOM_006__to_date').value;

                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                const department = document.getElementById('HP_FOM_006__department').value;
                if (department) params.append('department', department);

                const location = document.getElementById('HP_FOM_006__location').value;
                if (location) params.append('location', location);

                fetch(`/newforms/hp/formalin-preparation/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    const tbody = document.getElementById('HP_FOM_006__tbody');
                    if (!tbody) return;

                    tbody.innerHTML = '';

                    if (res.departments) {
                        updateFOM006Datalist('HP_FOM_006__department_list', res.departments);
                    }
                    if (res.locations) {
                        updateFOM006Datalist('HP_FOM_006__location_list', res.locations);
                    }

                    if (!res.data || res.data.length === 0) {
                        addEmptyRowFOM006();
                        return;
                    }

                    res.data.forEach(row => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = buildFOM006RowHTML(row);
                        tbody.appendChild(tr);
                    });

                    addEmptyRowFOM006();
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function buildFOM006RowHTML(row) {
                return `<td style="border:1px solid #000; padding:4px;">
                        <input type="hidden" name="row_id[]" value="${row.id}">
                        <input type="date" name="row_date[]" value="${row.row_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>
                    <td style="border:1px solid #000; padding:4px;"><input name="ph[]" value="${row.ph || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="volume_prepared[]" value="${row.volume_prepared || ''}" placeholder="ml" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="prepared_by[]" value="${row.prepared_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="verified_by[]" value="${row.verified_by || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="remarks[]" value="${row.remarks || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="hod_signature[]" value="${row.hod_signature || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
            }

            function addEmptyRowFOM006() {
                const tbody = document.getElementById('HP_FOM_006__tbody');
                if (!tbody) return;

                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="ph[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="volume_prepared[]" placeholder="ml" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="prepared_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="verified_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="remarks[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="hod_signature[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                `;
                tbody.appendChild(tr);
            }

            function clearFormalinPreparationForm() {
                const tbody = document.getElementById('HP_FOM_006__tbody');
                if (tbody) {
                    tbody.innerHTML = '';
                    addEmptyRowFOM006();
                }
            }

            function clearFormalinPreparationFilters() {
                document.getElementById('HP_FOM_006__from_date').value = '';
                document.getElementById('HP_FOM_006__to_date').value = '';
                document.getElementById('HP_FOM_006__department').value = '';
                document.getElementById('HP_FOM_006__location').value = '';
                clearFormalinPreparationForm();
            }

            function updateFOM006Datalist(datalistId, values) {
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

            // AJAX Submit for FOM-006
            (function() {
                function initFormalinPreparationForm() {
                    const formContainer = document.querySelector('[id="TDPL/HP/FOM-006"]');
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
                                showToastHPFOM006('success', result.message || 'Saved successfully!');

                                const tbody = document.getElementById('HP_FOM_006__tbody');
                                if (tbody && result.data && result.data.length > 0) {
                                    tbody.innerHTML = '';

                                    result.data.forEach(row => {
                                        const tr = document.createElement('tr');
                                        tr.innerHTML = buildFOM006RowHTML(row);
                                        tbody.appendChild(tr);
                                    });

                                    addEmptyRowFOM006();
                                }
                            } else {
                                showToastHPFOM006('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastHPFOM006('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                function showToastHPFOM006(type, message) {
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
                    document.addEventListener('DOMContentLoaded', initFormalinPreparationForm);
                } else {
                    initFormalinPreparationForm();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HP/FOM-007"
        docNo="TDPL/HP/FOM-007"
        docName="Formalin & TVOC Monitoring Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.hp.forms.submit') }}">

        <!-- Header Section -->
        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Month/Year:</strong>
                <input type="month" name="month_year" id="fom007_hp_month_year"
                    style="border:1px solid #000; padding:5px;"
                    onchange="loadFormalinTvocMonitoring()">
            </div>
            <div>
                <strong>Location:</strong>
                <input type="text" name="location" id="fom007_hp_location" list="fom007_hp_loc_list"
                    style="border:1px solid #000; padding:5px; width:150px;"
                    onchange="loadFormalinTvocMonitoring()">
                <datalist id="fom007_hp_loc_list">
                    <option value="Main Lab">
                    <option value="Branch Lab">
                    <option value="Collection Center">
                    <option value="Hospital Lab">
                    <option value="Clinic Lab">
                </datalist>
            </div>
            <div>
                <strong>Department:</strong>
                <input type="text" name="department" id="fom007_hp_department" list="fom007_hp_dept_list"
                    style="border:1px solid #000; padding:5px; width:150px;"
                    onchange="loadFormalinTvocMonitoring()">
                <datalist id="fom007_hp_dept_list">
                    <option value="Histopathology">
                    <option value="Cytopathology">
                    <option value="Pathology">
                </datalist>
            </div>
            <button type="button" onclick="clearFormalinTvocMonitoring()"
                style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        <table border="1" style="width:100%; border-collapse:collapse;">
            <tbody>
                <tr>
                    <td colspan="8" style="padding:6px;">
                        Ref. Formaldehyde (Formalin) levels: &lt; 0.94 mg/m³;
                        Ref. Total Volatile Organic Compounds (TVOC): &lt; 2.0 mg/m³
                    </td>
                </tr>

                <tr>
                    <td colspan="4" style="text-align:center; padding:6px;"><strong>10:00 AM</strong></td>
                    <td colspan="4" style="text-align:center; padding:6px;"><strong>04:00 PM</strong></td>
                </tr>

                <tr>
                    <td style="padding:6px;"><strong>Date</strong></td>
                    <td style="padding:6px;"><strong>Formalin</strong></td>
                    <td style="padding:6px;"><strong>TVOC</strong></td>
                    <td style="padding:6px;"><strong>Sign</strong></td>

                    <td style="padding:6px;"><strong>Formalin</strong></td>
                    <td style="padding:6px;"><strong>TVOC</strong></td>
                    <td style="padding:6px;"><strong>Sign</strong></td>

                    <td style="padding:6px;"><strong>Remarks</strong></td>
                </tr>

                @for($i = 1; $i <= 31; $i++)
                    <tr>
                    <td style="padding:4px; text-align:center; font-weight:bold;">{{ sprintf('%02d', $i) }}</td>

                    @foreach(['formalin_am','tvoc_am','sign_am','formalin_pm','tvoc_pm','sign_pm','remarks'] as $field)
                    <td style="padding:4px;">
                        <input type="text"
                            name="{{ $field }}_{{ $i }}"
                            id="fom007_hp_{{ $field }}_{{ $i }}"
                            style="width:100%; padding:4px; border:1px solid #ccc;">
                    </td>
                    @endforeach
                    </tr>
                @endfor
            </tbody>
        </table>

        <p style="margin-top:10px;">
            <em>Reference: WHO guidelines for indoor air quality: selected pollutants</em>
        </p>

        <script>
            function loadFormalinTvocMonitoring() {
                const monthYear = document.getElementById('fom007_hp_month_year').value;
                const location = document.getElementById('fom007_hp_location').value;
                const department = document.getElementById('fom007_hp_department').value;

                if (!monthYear) return;

                const params = new URLSearchParams();
                params.append('month_year', monthYear);
                if (location) params.append('location', location);
                if (department) params.append('department', department);

                fetch(`/newforms/hp/formalin-tvoc-monitoring/load?${params.toString()}`)
                    .then(res => res.json())
                    .then(result => {
                        if (result.locations) {
                            const locList = document.getElementById('fom007_hp_loc_list');
                            const defaultLocs = ['Main Lab', 'Branch Lab', 'Collection Center', 'Hospital Lab', 'Clinic Lab'];
                            const allLocs = [...new Set([...defaultLocs, ...result.locations])];
                            locList.innerHTML = allLocs.map(l => `<option value="${l}">`).join('');
                        }
                        if (result.departments) {
                            const deptList = document.getElementById('fom007_hp_dept_list');
                            const defaultDepts = ['Histopathology', 'Cytopathology', 'Pathology'];
                            const allDepts = [...new Set([...defaultDepts, ...result.departments])];
                            deptList.innerHTML = allDepts.map(d => `<option value="${d}">`).join('');
                        }

                        clearFormalinTvocMonitoringInputs();

                        if (result.success && result.data) {
                            const data = result.data;
                            if (data.daily_data) {
                                for (const [key, value] of Object.entries(data.daily_data)) {
                                    const el = document.getElementById('fom007_hp_' + key);
                                    if (el) el.value = value;
                                }
                            }
                        }
                    })
                    .catch(err => console.error('Load error:', err));
            }

            function clearFormalinTvocMonitoringInputs() {
                const fields = ['formalin_am','tvoc_am','sign_am','formalin_pm','tvoc_pm','sign_pm','remarks'];
                for (let i = 1; i <= 31; i++) {
                    fields.forEach(field => {
                        const el = document.getElementById(`fom007_hp_${field}_${i}`);
                        if (el) el.value = '';
                    });
                }
            }

            function clearFormalinTvocMonitoring() {
                document.getElementById('fom007_hp_month_year').value = '';
                document.getElementById('fom007_hp_location').value = '';
                document.getElementById('fom007_hp_department').value = '';
                clearFormalinTvocMonitoringInputs();
            }

            // AJAX Submit for FOM-007
            (function() {
                function initFormalinTvocMonitoringForm() {
                    const formContainer = document.querySelector('[id="TDPL/HP/FOM-007"]');
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
                                showToastHPFOM007('success', result.message || 'Saved successfully!');
                            } else {
                                showToastHPFOM007('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastHPFOM007('error', 'Failed to save. Please try again.');
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

                function showToastHPFOM007(type, message) {
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
                    document.addEventListener('DOMContentLoaded', initFormalinTvocMonitoringForm);
                } else {
                    initFormalinTvocMonitoringForm();
                }
            })();
        </script>



    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HP/FOM-008"
        docNo="TDPL/HP/FOM-008"
        docName="Histopathology Requisition Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.hp.forms.submit') }}">

        <div style=" margin: 0 auto; background: white; border-radius: 16px; box-shadow: 0 20px 60px rgba(0,0,0,0.3); overflow: hidden;">

            <!-- Header Section -->
            <div style="background: linear-gradient(135deg, #7a66eaff 0%, #4ba261ff 100%); padding: 30px; text-align: center; color: white;">
                <div style="background: rgba(255,255,255,0.2); padding: 10px; border-radius: 8px; display: inline-block; margin-top: 15px;">
                    <label style="font-weight: 500; margin-right: 10px;">SIN No.</label>
                    <input type="text" name="sin_no" style="border: none; padding: 8px 12px; border-radius: 6px; width: 180px; font-size: 14px;">
                </div>
            </div>

            <!-- Form Content -->
            <div style="padding: 40px;">

                <!-- Patient Information -->
                <div style="background: #f8f9fa; padding: 25px; border-radius: 12px; margin-bottom: 25px; border-left: 4px solid #667eea;">
                    <h2 style="margin: 0 0 20px 0; color: #667eea; font-size: 20px; font-weight: 600;">Patient Information</h2>

                    <div style="margin-bottom: 15px;">
                        <label style="display: inline-block; width: 120px; font-weight: 600; color: #333;">Name:</label>
                        <input type="text" name="name" style="border: 1px solid #ddd; padding: 10px; border-radius: 6px; width: calc(100% - 140px); font-size: 14px;">
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label style="display: inline-block; width: 120px; font-weight: 600; color: #333;">Date of Birth:</label>
                        <input type="date" name="dob" style="border: 1px solid #ddd; padding: 10px; border-radius: 6px; width: 200px; margin-right: 20px; font-size: 14px;">

                        <label style="font-weight: 600; color: #333; margin-left: 20px;">Sex:</label>
                        <select name="sex" style="border: 1px solid #ddd; padding: 10px; border-radius: 6px; margin-left: 10px; font-size: 14px;">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>

                    <div style="margin-bottom: 0;">
                        <label style="display: inline-block; width: 120px; font-weight: 600; color: #333;">Mobile:</label>
                        <input type="text" name="mobile" style="border: 1px solid #ddd; padding: 10px; border-radius: 6px; width: 200px; font-size: 14px;">
                    </div>
                </div>

                <!-- Client & Doctor Information -->
                <div style="background: #f8f9fa; padding: 25px; border-radius: 12px; margin-bottom: 25px; border-left: 4px solid #764ba2;">
                    <h2 style="margin: 0 0 20px 0; color: #764ba2; font-size: 20px; font-weight: 600;">Client & Referral Information</h2>

                    <div style="margin-bottom: 15px;">
                        <label style="display: inline-block; width: 120px; font-weight: 600; color: #333;">Client Name:</label>
                        <input type="text" name="client_name" style="border: 1px solid #ddd; padding: 10px; border-radius: 6px; width: 250px; margin-right: 20px; font-size: 14px;">

                        <label style="font-weight: 600; color: #333;">Client Code:</label>
                        <input type="text" name="client_code" style="border: 1px solid #ddd; padding: 10px; border-radius: 6px; width: 150px; margin-left: 10px; font-size: 14px;">
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label style="display: inline-block; width: 120px; font-weight: 600; color: #333;">Referring Doctor:</label>
                        <input type="text" name="ref_doctor" style="border: 1px solid #ddd; padding: 10px; border-radius: 6px; width: calc(100% - 140px); font-size: 14px;">
                    </div>

                    <div style="margin-bottom: 0;">
                        <label style="display: inline-block; width: 120px; font-weight: 600; color: #333;">Date:</label>
                        <input type="date" name="ref_date" style="border: 1px solid #ddd; padding: 10px; border-radius: 6px; width: 200px; font-size: 14px;">
                    </div>
                </div>

                <!-- Clinical Information -->
                <div style="background: #f8f9fa; padding: 25px; border-radius: 12px; margin-bottom: 25px; border-left: 4px solid #667eea;">
                    <h2 style="margin: 0 0 20px 0; color: #667eea; font-size: 20px; font-weight: 600;">Clinical Information</h2>

                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-weight: 600; color: #333; margin-bottom: 8px;">Site of Specimen:</label>
                        <textarea name="specimen_site" style="width: 100%; height: 60px; border: 1px solid #ddd; padding: 10px; border-radius: 6px; font-family: inherit; font-size: 14px; resize: vertical;"></textarea>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-weight: 600; color: #333; margin-bottom: 8px;">Relevant Clinical History:</label>
                        <textarea name="clinical_history" style="width: 100%; height: 70px; border: 1px solid #ddd; padding: 10px; border-radius: 6px; font-family: inherit; font-size: 14px; resize: vertical;"></textarea>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-weight: 600; color: #333; margin-bottom: 8px;">Additional Clinical & Relevant Data:</label>
                        <textarea name="additional_data" style="width: 100%; height: 70px; border: 1px solid #ddd; padding: 10px; border-radius: 6px; font-family: inherit; font-size: 14px; resize: vertical;"></textarea>
                    </div>

                    <div style="margin-bottom: 0;">
                        <label style="display: block; font-weight: 600; color: #333; margin-bottom: 8px;">Previous Biopsy / FNAC / X-ray etc. Clinical Diagnosis:</label>
                        <textarea name="clinical_diagnosis" style="width: 100%; height: 70px; border: 1px solid #ddd; padding: 10px; border-radius: 6px; font-family: inherit; font-size: 14px; resize: vertical;"></textarea>
                    </div>
                </div>

                <!-- Specimen Type -->
                <div style="background: #f8f9fa; padding: 25px; border-radius: 12px; margin-bottom: 25px; border-left: 4px solid #764ba2;">
                    <h2 style="margin: 0 0 20px 0; color: #764ba2; font-size: 20px; font-weight: 600;">Type of Specimen</h2>

                    <div style="margin-bottom: 15px;">
                        <label style="margin-right: 20px; font-size: 16px;">
                            <input type="checkbox" name="specimen_large" style="margin-right: 8px; transform: scale(1.2);">
                            <span style="font-weight: 600;">Large</span>
                        </label>
                        <label style="margin-right: 20px; font-size: 16px;">
                            <input type="checkbox" name="specimen_medium" style="margin-right: 8px; transform: scale(1.2);">
                            <span style="font-weight: 600;">Medium</span>
                        </label>
                        <label style="margin-right: 20px; font-size: 16px;">
                            <input type="checkbox" name="specimen_small" style="margin-right: 8px; transform: scale(1.2);">
                            <span style="font-weight: 600;">Small</span>
                        </label>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label style="display: inline-block; font-weight: 600; color: #333; margin-right: 10px;">Miscellaneous:</label>
                        <input type="text" name="specimen_misc" style="border: 1px solid #ddd; padding: 10px; border-radius: 6px; width: calc(100% - 150px); font-size: 14px;">
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-weight: 600; color: #333; margin-bottom: 8px;">IHC Markers:</label>
                        <input type="text" name="ihc_markers" style="width: 100%; border: 1px solid #ddd; padding: 10px; border-radius: 6px; font-size: 14px;">
                    </div>

                    <div style="margin-bottom: 0;">
                        <label style="display: block; font-weight: 600; color: #333; margin-bottom: 8px;">Special Stains:</label>
                        <input type="text" name="special_stains" style="width: 100%; border: 1px solid #ddd; padding: 10px; border-radius: 6px; font-size: 14px;">
                    </div>
                </div>

                <!-- Fixation -->
                <div style="background: #f8f9fa; padding: 25px; border-radius: 12px; margin-bottom: 25px; border-left: 4px solid #667eea;">
                    <h2 style="margin: 0 0 15px 0; color: #667eea; font-size: 20px; font-weight: 600;">Histopath Slides / Block for Review - Fixation</h2>

                    <label style="margin-right: 30px; font-size: 16px;">
                        <input type="radio" name="fixation" value="Adequate" style="margin-right: 8px; transform: scale(1.2);">
                        <span style="font-weight: 600;">Adequate</span>
                    </label>
                    <label style="font-size: 16px;">
                        <input type="radio" name="fixation" value="Inadequate" style="margin-right: 8px; transform: scale(1.2);">
                        <span style="font-weight: 600;">Inadequate</span>
                    </label>
                </div>

                <!-- Instructions -->
                <div style="background: #fff3cd; padding: 20px; border-radius: 12px; margin-bottom: 25px; border-left: 4px solid #ffc107;">
                    <h2 style="margin: 0 0 15px 0; color: #856404; font-size: 18px; font-weight: 600;">Instructions for Filling Up Form</h2>
                    <ol style="margin: 0; padding-left: 20px; color: #856404; line-height: 1.8;">
                        <li>Please tick appropriate boxes only as applicable</li>
                        <li>Please furnish complete clinical details along with Request form</li>
                        <li>Samples details not covered above should be entered next to "Miscellaneous"</li>
                        <li>Do not omit telephone number of Patient / Referring Doctor</li>
                        <li>Immerse specimen completely in an appropriate fixative before dispatch</li>
                    </ol>
                </div>

                <!-- Specimen Details Table -->
                <div style="background: #f8f9fa; padding: 25px; border-radius: 12px; border-left: 4px solid #764ba2;">
                    <h2 style="margin: 0 0 20px 0; color: #764ba2; font-size: 20px; font-weight: 600;">Specimen Details</h2>

                    <table style="width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden;">
                        <thead>
                            <tr style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                                <th style="padding: 15px; text-align: center; font-weight: 600; width: 80px;">SELECT</th>
                                <th style="padding: 15px; text-align: center; font-weight: 600; width: 150px;">TEST CODE</th>
                                <th style="padding: 15px; text-align: left; font-weight: 600;">SPECIMEN DETAILS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Small Specimen -->
                            <tr style="border-bottom: 1px solid #e9ecef;">
                                <td style="padding: 20px; text-align: center; vertical-align: top;">
                                    <input type="checkbox" name="type_selected[]" value="small" style="transform: scale(1.3);">
                                </td>
                                <td style="padding: 20px; vertical-align: top;">
                                    <input type="text" name="test_code_small" style="width: 100%; border: 1px solid #ddd; padding: 8px; border-radius: 6px; font-size: 14px;">
                                </td>
                                <td style="padding: 20px;">
                                    <strong style="color: #667eea; font-size: 15px;">BIOPSY, SMALL SPECIMEN - LESS THAN 2 cm:</strong>
                                    <p style="margin: 10px 0; color: #666; line-height: 1.6; font-size: 14px;">
                                        Endometrium, Cervical biopsy, Endoscopic biopsies, Trucut biopsies, Appendix, Fallopian Tubes, Conjunctival Biopsy, Small diagnostic / incision biopsies
                                    </p>
                                    <input type="text" name="small_other" placeholder="Others..." style="width: 100%; border: 1px solid #ddd; padding: 8px; border-radius: 6px; margin-top: 10px; font-size: 14px;">
                                </td>
                            </tr>

                            <!-- Medium Specimen -->
                            <tr style="border-bottom: 1px solid #e9ecef;">
                                <td style="padding: 20px; text-align: center; vertical-align: top;">
                                    <input type="checkbox" name="type_selected[]" value="medium" style="transform: scale(1.3);">
                                </td>
                                <td style="padding: 20px; vertical-align: top;">
                                    <input type="text" name="test_code_medium" style="width: 100%; border: 1px solid #ddd; padding: 8px; border-radius: 6px; font-size: 14px;">
                                </td>
                                <td style="padding: 20px;">
                                    <strong style="color: #667eea; font-size: 15px;">BIOPSY, MEDIUM SPECIMEN - UPTO 5 cm:</strong>
                                    <p style="margin: 10px 0; color: #666; line-height: 1.6; font-size: 14px;">
                                        Breast lump, Pilonidal sinus, Fistula, Lymph Node, Ovarian Cyst, Gall bladder, Prostate (TURP), Brain & Spine tumors, Small excision biopsies, Fibroids, Products of Conception, Bladder TURBT, Ectopic Gestation
                                    </p>
                                    <input type="text" name="medium_other" placeholder="Others..." style="width: 100%; border: 1px solid #ddd; padding: 8px; border-radius: 6px; margin-top: 10px; font-size: 14px;">
                                </td>
                            </tr>

                            <!-- Large Specimen -->
                            <tr style="border-bottom: 1px solid #e9ecef;">
                                <td style="padding: 20px; text-align: center; vertical-align: top;">
                                    <input type="checkbox" name="type_selected[]" value="large" style="transform: scale(1.3);">
                                </td>
                                <td style="padding: 20px; vertical-align: top;">
                                    <input type="text" name="test_code_large" style="width: 100%; border: 1px solid #ddd; padding: 8px; border-radius: 6px; font-size: 14px;">
                                </td>
                                <td style="padding: 20px;">
                                    <strong style="color: #667eea; font-size: 15px;">BIOPSY, LARGE SPECIMEN - GREATER THAN 5 cm:</strong>
                                    <p style="margin: 10px 0; color: #666; line-height: 1.6; font-size: 14px;">
                                        Uterus with cervix, Ovarian tumors, Thyroid/Testes/Kidney resections, Intestinal resections, Lymph node blocks, Placenta, Eyeball, Lipomas, Gall bladder with cancer
                                    </p>
                                    <input type="text" name="large_other" placeholder="Others..." style="width: 100%; border: 1px solid #ddd; padding: 8px; border-radius: 6px; margin-top: 10px; font-size: 14px;">
                                </td>
                            </tr>

                            <!-- Complex Specimen -->
                            <tr>
                                <td style="padding: 20px; text-align: center; vertical-align: top;">
                                    <input type="checkbox" name="type_selected[]" value="complex" style="transform: scale(1.3);">
                                </td>
                                <td style="padding: 20px; vertical-align: top;">
                                    <input type="text" name="test_code_complex" style="width: 100%; border: 1px solid #ddd; padding: 8px; border-radius: 6px; font-size: 14px;">
                                </td>
                                <td style="padding: 20px;">
                                    <strong style="color: #667eea; font-size: 15px;">BIOPSY, LARGE COMPLEX / CANCER RESECTION SPECIMENS:</strong>
                                    <p style="margin: 10px 0; color: #666; line-height: 1.6; font-size: 14px;">
                                        Esophagectomy, Gastrectomy, Mastectomy, Colostomy, Bone resection, Radical surgeries etc.
                                    </p>
                                    <input type="text" name="complex_other" placeholder="Others..." style="width: 100%; border: 1px solid #ddd; padding: 8px; border-radius: 6px; margin-top: 10px; font-size: 14px;">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Submit Button -->
                <div style="text-align: center; margin-top: 30px;">
                    <button type="submit" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 15px 50px; border: none; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer; box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4); transition: transform 0.2s;">
                        Submit Form
                    </button>
                </div>

            </div>

        </div>

        <script>
            (function() {
                const wrapper = document.getElementById('TDPL/HP/FOM-008');
                if (!wrapper) return;
                const formEl = wrapper.querySelector('form');
                if (!formEl) return;

                formEl.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const formData = new FormData(formEl);

                    fetch(formEl.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content,
                            'Accept': 'application/json'
                        },
                        body: formData
                    })
                    .then(r => r.json())
                    .then(resp => {
                        if (resp.success) {
                            // Show success toast
                            let toast = document.getElementById('fom008_hp_toast');
                            if (!toast) {
                                toast = document.createElement('div');
                                toast.id = 'fom008_hp_toast';
                                toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:16px 28px;border-radius:8px;color:#fff;font-size:15px;z-index:9999;transition:opacity 0.5s;';
                                document.body.appendChild(toast);
                            }
                            toast.style.background = '#38a169';
                            toast.textContent = resp.message || 'Saved successfully!';
                            toast.style.opacity = '1';
                            setTimeout(() => { toast.style.opacity = '0'; }, 3000);

                            // Reset form after successful save
                            formEl.reset();
                        } else {
                            alert(resp.message || 'Save failed');
                        }
                    })
                    .catch(err => {
                        console.error('FOM-008 submit error:', err);
                        alert('Network error. Please try again.');
                    });
                });
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HP/FOM-009"
        docNo="TDPL/HP/FOM-009"
        docName="Slides & Blocks Return Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.hp.forms.submit') }}">
        <div style="padding:20px; background: #fff;border:1px solid black; border-radius: 16px; box-shadow: 0 4px 18px rgba(0,0,0,0.08);">


            <!-- SECTION 1 -->
            <div style="border-left: 5px solid #6a11cb; padding-left: 15px; margin-bottom: 20px;">
                <label>Date:</label>
                <input type="text" name="date" style="width:100%; padding:8px; margin-top:4px; margin-bottom:14px; border:1px solid #ccc; border-radius:8px;">

                <label>Place:</label>
                <input type="text" name="place" style="width:100%; padding:8px; margin-top:4px; margin-bottom:14px; border:1px solid #ccc; border-radius:8px;">

                <label>Patient Name:</label>
                <input type="text" name="patient_name" style="width:100%; padding:8px; margin-top:4px; margin-bottom:14px; border:1px solid #ccc; border-radius:8px;">

                <label>Old Barcode:</label>
                <input type="text" name="old_barcode" style="width:100%; padding:8px; margin-top:4px; margin-bottom:14px; border:1px solid #ccc; border-radius:8px;">

                <label>New Barcode:</label>
                <input type="text" name="new_barcode" style="width:100%; padding:8px; margin-top:4px; margin-bottom:14px; border:1px solid #ccc; border-radius:8px;">

                <label>Client Code:</label>
                <input type="text" name="client_code" style="width:100%; padding:8px; margin-top:4px; margin-bottom:14px; border:1px solid #ccc; border-radius:8px;">

                <label>Department:</label>
                <input type="text" name="department" style="width:100%; padding:8px; margin-top:4px; margin-bottom:14px; border:1px solid #ccc; border-radius:8px;">

                <label>Number of Slides & Blocks:</label>
                <input type="number" name="slides_blocks" style="width:100%; padding:8px; margin-top:4px; margin-bottom:14px; border:1px solid #ccc; border-radius:8px;">
            </div>

            <!-- SECTION 2 -->
            <div style="border-left: 5px solid #8e44ad; padding-left: 15px; margin-bottom: 20px;">
                <label>Handed Over By (Employee) Name:</label>
                <input type="text" name="employee_name" style="width:100%; padding:8px; margin-top:4px; margin-bottom:14px; border:1px solid #ccc; border-radius:8px;">

                <label>Signature:</label>
                <input type="text" name="employee_signature" style="width:100%; padding:8px; margin-top:4px; margin-bottom:14px; border:1px solid #ccc; border-radius:8px;">
            </div>

            <!-- IMPORTANT NOTE -->
            <div style="background:#fff7cc; padding:12px 16px; border-radius:10px; margin-bottom:25px;">
                Kindly acknowledge the receipt of the above-mentioned slides & blocks.
            </div>

            <!-- RECEIVER SECTION -->
            <div style="border-left: 5px solid #b76ce6; padding-left: 15px; margin-bottom: 20px;">

                <label>Receiver Name:</label>
                <input type="text" name="receiver_name" style="width:100%; padding:8px; margin-top:4px; margin-bottom:14px; border:1px solid #ccc; border-radius:8px;">

                <label>Signature:</label>
                <input type="text" name="receiver_signature" style="width:100%; padding:8px; margin-top:4px; margin-bottom:14px; border:1px solid #ccc; border-radius:8px;">

                <label>Type of ID Proof Provided:</label>
                <input type="text" name="id_proof" style="width:100%; padding:8px; margin-top:4px; margin-bottom:14px; border:1px solid #ccc; border-radius:8px;">

                <label>Mobile No.:</label>
                <input type="text" name="mobile" style="width:100%; padding:8px; margin-top:4px; margin-bottom:14px; border:1px solid #ccc; border-radius:8px;">
            </div>

        </div>

        <script>
            (function() {
                const wrapper = document.getElementById('TDPL/HP/FOM-009');
                if (!wrapper) return;
                const formEl = wrapper.querySelector('form');
                if (!formEl) return;

                formEl.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const formData = new FormData(formEl);

                    fetch(formEl.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content,
                            'Accept': 'application/json'
                        },
                        body: formData
                    })
                    .then(r => r.json())
                    .then(resp => {
                        if (resp.success) {
                            let toast = document.getElementById('fom009_hp_toast');
                            if (!toast) {
                                toast = document.createElement('div');
                                toast.id = 'fom009_hp_toast';
                                toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:16px 28px;border-radius:8px;color:#fff;font-size:15px;z-index:9999;transition:opacity 0.5s;';
                                document.body.appendChild(toast);
                            }
                            toast.style.background = '#38a169';
                            toast.textContent = resp.message || 'Saved successfully!';
                            toast.style.opacity = '1';
                            setTimeout(() => { toast.style.opacity = '0'; }, 3000);

                            formEl.reset();
                        } else {
                            alert(resp.message || 'Save failed');
                        }
                    })
                    .catch(err => {
                        console.error('FOM-009 submit error:', err);
                        alert('Network error. Please try again.');
                    });
                });
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HP/REG-001"
        docNo="TDPL/HP/REG-001"
        docName="Histopathology Work Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.hp.forms.submit') }}">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="HP_REG_001__from_date"
                    onchange="loadHistopathologyWorkRegister()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="HP_REG_001__to_date"
                    onchange="loadHistopathologyWorkRegister()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>Department</strong></label>
                <input type="text" name="department" id="HP_REG_001__department" list="HP_REG_001__department_list"
                    onchange="loadHistopathologyWorkRegister()" onblur="loadHistopathologyWorkRegister()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="HP_REG_001__department_list">
                    <option value="Histopathology">
                    <option value="Cytopathology">
                    <option value="Pathology">
                </datalist>
            </div>
            <div>
                <label><strong>Location</strong></label>
                <input type="text" name="location" id="HP_REG_001__location" list="HP_REG_001__location_list"
                    onchange="loadHistopathologyWorkRegister()" onblur="loadHistopathologyWorkRegister()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="HP_REG_001__location_list">
                    <option value="Main Lab">
                    <option value="Branch Lab">
                    <option value="Collection Center">
                    <option value="Hospital Lab">
                    <option value="Clinic Lab">
                </datalist>
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearREG001Filters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px;">Date</th>
                    <th style="border:1px solid #000; padding:6px;">HP No</th>
                    <th style="border:1px solid #000; padding:6px;">Patient Name</th>
                    <th style="border:1px solid #000; padding:6px;">Age/Sex</th>
                    <th style="border:1px solid #000; padding:6px;">SIN No.</th>
                    <th style="border:1px solid #000; padding:6px;">Specimen</th>
                    <th style="border:1px solid #000; padding:6px;">Diagnosis</th>
                    <th style="border:1px solid #000; padding:6px;">HOD Sign</th>
                </tr>
            </thead>
            <tbody id="HP_REG_001__tbody">
                <tr>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="hp_no[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="patient_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="age_sex[]" placeholder="45/M" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="sin_no[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="specimen[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="diagnosis[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="hod_sign[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                </tr>
            </tbody>
        </table>

        <script>
            function loadHistopathologyWorkRegister() {
                const fromDate = document.getElementById('HP_REG_001__from_date').value;
                const toDate = document.getElementById('HP_REG_001__to_date').value;

                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                const department = document.getElementById('HP_REG_001__department').value;
                if (department) params.append('department', department);

                const location = document.getElementById('HP_REG_001__location').value;
                if (location) params.append('location', location);

                fetch(`/newforms/hp/histopathology-work-register/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    const tbody = document.getElementById('HP_REG_001__tbody');
                    if (!tbody) return;

                    tbody.innerHTML = '';

                    if (res.departments) {
                        updateREG001Datalist('HP_REG_001__department_list', res.departments);
                    }
                    if (res.locations) {
                        updateREG001Datalist('HP_REG_001__location_list', res.locations);
                    }

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
                const fields = ['hp_no','patient_name','age_sex','sin_no','specimen','diagnosis','hod_sign'];
                let html = `<td style="border:1px solid #000; padding:4px;">
                    <input type="hidden" name="row_id[]" value="${row.id}">
                    <input type="date" name="row_date[]" value="${row.row_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                </td>`;
                fields.forEach(f => {
                    const placeholder = f === 'age_sex' ? ' placeholder="45/M"' : '';
                    html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" value="${row[f] || ''}"${placeholder} style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
                });
                return html;
            }

            function addEmptyRowREG001() {
                const tbody = document.getElementById('HP_REG_001__tbody');
                if (!tbody) return;

                const fields = ['hp_no','patient_name','age_sex','sin_no','specimen','diagnosis','hod_sign'];
                const tr = document.createElement('tr');
                let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
                fields.forEach(f => {
                    const placeholder = f === 'age_sex' ? ' placeholder="45/M"' : '';
                    html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]"${placeholder} style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
                });
                tr.innerHTML = html;
                tbody.appendChild(tr);
            }

            function clearREG001Form() {
                const tbody = document.getElementById('HP_REG_001__tbody');
                if (tbody) {
                    tbody.innerHTML = '';
                    addEmptyRowREG001();
                }
            }

            function clearREG001Filters() {
                document.getElementById('HP_REG_001__from_date').value = '';
                document.getElementById('HP_REG_001__to_date').value = '';
                document.getElementById('HP_REG_001__department').value = '';
                document.getElementById('HP_REG_001__location').value = '';
                clearREG001Form();
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
                function initHistopathologyWorkRegister() {
                    const formContainer = document.querySelector('[id="TDPL/HP/REG-001"]');
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
                                showToastHPREG001('success', result.message || 'Saved successfully!');

                                const tbody = document.getElementById('HP_REG_001__tbody');
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
                                showToastHPREG001('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastHPREG001('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                function showToastHPREG001(type, message) {
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
                    document.addEventListener('DOMContentLoaded', initHistopathologyWorkRegister);
                } else {
                    initHistopathologyWorkRegister();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HP/REG-002"
        docNo="TDPL/HP/REG-002"
        docName="Histopathology Clinical Correlation Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.hp.forms.submit') }}">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="HP_REG_002__from_date"
                    onchange="loadHpClinicalCorrelation()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="HP_REG_002__to_date"
                    onchange="loadHpClinicalCorrelation()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>Department</strong></label>
                <input type="text" name="department" id="HP_REG_002__department" list="HP_REG_002__department_list"
                    onchange="loadHpClinicalCorrelation()" onblur="loadHpClinicalCorrelation()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="HP_REG_002__department_list">
                    <option value="Histopathology">
                    <option value="Cytopathology">
                    <option value="Pathology">
                </datalist>
            </div>
            <div>
                <label><strong>Location</strong></label>
                <input type="text" name="location" id="HP_REG_002__location" list="HP_REG_002__location_list"
                    onchange="loadHpClinicalCorrelation()" onblur="loadHpClinicalCorrelation()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="HP_REG_002__location_list">
                    <option value="Main Lab">
                    <option value="Branch Lab">
                    <option value="Collection Center">
                    <option value="Hospital Lab">
                    <option value="Clinic Lab">
                </datalist>
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearREG002Filters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px;">Date</th>
                    <th style="border:1px solid #000; padding:6px;">SIN No.</th>
                    <th style="border:1px solid #000; padding:6px;">Patient Name</th>
                    <th style="border:1px solid #000; padding:6px;">Age/Sex</th>
                    <th style="border:1px solid #000; padding:6px;">Clinical History</th>
                    <th style="border:1px solid #000; padding:6px;">Site</th>
                    <th style="border:1px solid #000; padding:6px;">Histopathology No. & Impression</th>
                    <th style="border:1px solid #000; padding:6px;">Cytopathology No. & Impression</th>
                    <th style="border:1px solid #000; padding:6px;">Correlated / Not Correlated</th>
                    <th style="border:1px solid #000; padding:6px;">Remarks</th>
                    <th style="border:1px solid #000; padding:6px;">HOD Sign</th>
                </tr>
            </thead>
            <tbody id="HP_REG_002__tbody">
                <tr>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="sin_no[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="patient_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="age_sex[]" placeholder="45/M" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="clinical_history[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="site[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="hp_impression[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="cyto_impression[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;">
                        <select name="correlation[]" style="width:100%; border:1px solid #ccc; padding:4px;">
                            <option value="">-- Select --</option>
                            <option value="Correlated">Correlated</option>
                            <option value="Not Correlated">Not Correlated</option>
                        </select>
                    </td>
                    <td style="border:1px solid #000; padding:4px;"><input name="remarks[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="hod_sign[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                </tr>
            </tbody>
        </table>

        <script>
            function loadHpClinicalCorrelation() {
                const fromDate = document.getElementById('HP_REG_002__from_date').value;
                const toDate = document.getElementById('HP_REG_002__to_date').value;

                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                const department = document.getElementById('HP_REG_002__department').value;
                if (department) params.append('department', department);

                const location = document.getElementById('HP_REG_002__location').value;
                if (location) params.append('location', location);

                fetch(`/newforms/hp/hp-clinical-correlation-register/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    const tbody = document.getElementById('HP_REG_002__tbody');
                    if (!tbody) return;

                    tbody.innerHTML = '';

                    if (res.departments) {
                        updateREG002Datalist('HP_REG_002__department_list', res.departments);
                    }
                    if (res.locations) {
                        updateREG002Datalist('HP_REG_002__location_list', res.locations);
                    }

                    if (!res.data || res.data.length === 0) {
                        addEmptyRowREG002();
                        return;
                    }

                    res.data.forEach(row => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = buildREG002RowHTML(row);
                        tbody.appendChild(tr);
                    });

                    addEmptyRowREG002();
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function buildREG002RowHTML(row) {
                let html = `<td style="border:1px solid #000; padding:4px;">
                    <input type="hidden" name="row_id[]" value="${row.id}">
                    <input type="date" name="row_date[]" value="${row.row_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                </td>`;

                const textFields = ['sin_no','patient_name','age_sex','clinical_history','site','hp_impression','cyto_impression'];
                textFields.forEach(f => {
                    const placeholder = f === 'age_sex' ? ' placeholder="45/M"' : '';
                    html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" value="${row[f] || ''}"${placeholder} style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
                });

                // Correlation select
                const corVal = row.correlation || '';
                html += `<td style="border:1px solid #000; padding:4px;">
                    <select name="correlation[]" style="width:100%; border:1px solid #ccc; padding:4px;">
                        <option value="">-- Select --</option>
                        <option value="Correlated"${corVal === 'Correlated' ? ' selected' : ''}>Correlated</option>
                        <option value="Not Correlated"${corVal === 'Not Correlated' ? ' selected' : ''}>Not Correlated</option>
                    </select>
                </td>`;

                html += `<td style="border:1px solid #000; padding:4px;"><input name="remarks[]" value="${row.remarks || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
                html += `<td style="border:1px solid #000; padding:4px;"><input name="hod_sign[]" value="${row.hod_sign || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;

                return html;
            }

            function addEmptyRowREG002() {
                const tbody = document.getElementById('HP_REG_002__tbody');
                if (!tbody) return;

                const tr = document.createElement('tr');
                let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;

                const textFields = ['sin_no','patient_name','age_sex','clinical_history','site','hp_impression','cyto_impression'];
                textFields.forEach(f => {
                    const placeholder = f === 'age_sex' ? ' placeholder="45/M"' : '';
                    html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]"${placeholder} style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
                });

                html += `<td style="border:1px solid #000; padding:4px;">
                    <select name="correlation[]" style="width:100%; border:1px solid #ccc; padding:4px;">
                        <option value="">-- Select --</option>
                        <option value="Correlated">Correlated</option>
                        <option value="Not Correlated">Not Correlated</option>
                    </select>
                </td>`;
                html += `<td style="border:1px solid #000; padding:4px;"><input name="remarks[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
                html += `<td style="border:1px solid #000; padding:4px;"><input name="hod_sign[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;

                tr.innerHTML = html;
                tbody.appendChild(tr);
            }

            function clearREG002Form() {
                const tbody = document.getElementById('HP_REG_002__tbody');
                if (tbody) {
                    tbody.innerHTML = '';
                    addEmptyRowREG002();
                }
            }

            function clearREG002Filters() {
                document.getElementById('HP_REG_002__from_date').value = '';
                document.getElementById('HP_REG_002__to_date').value = '';
                document.getElementById('HP_REG_002__department').value = '';
                document.getElementById('HP_REG_002__location').value = '';
                clearREG002Form();
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
                function initHpClinicalCorrelation() {
                    const formContainer = document.querySelector('[id="TDPL/HP/REG-002"]');
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
                                showToastHPREG002('success', result.message || 'Saved successfully!');

                                const tbody = document.getElementById('HP_REG_002__tbody');
                                if (tbody && result.data && result.data.length > 0) {
                                    tbody.innerHTML = '';

                                    result.data.forEach(row => {
                                        const tr = document.createElement('tr');
                                        tr.innerHTML = buildREG002RowHTML(row);
                                        tbody.appendChild(tr);
                                    });

                                    addEmptyRowREG002();
                                }
                            } else {
                                showToastHPREG002('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastHPREG002('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                function showToastHPREG002(type, message) {
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
                    document.addEventListener('DOMContentLoaded', initHpClinicalCorrelation);
                } else {
                    initHpClinicalCorrelation();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HP/REG-003"
        docNo="TDPL/HP/REG-003"
        docName="Slides and Blocks Return Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.hp.forms.submit') }}">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="HP_REG_003__from_date"
                    onchange="loadSlidesBlocksReturnRegister()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="HP_REG_003__to_date"
                    onchange="loadSlidesBlocksReturnRegister()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>Department</strong></label>
                <input type="text" name="department" id="HP_REG_003__department" list="HP_REG_003__department_list"
                    onchange="loadSlidesBlocksReturnRegister()" onblur="loadSlidesBlocksReturnRegister()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="HP_REG_003__department_list">
                    <option value="Histopathology">
                    <option value="Cytopathology">
                    <option value="Pathology">
                </datalist>
            </div>
            <div>
                <label><strong>Location</strong></label>
                <input type="text" name="location" id="HP_REG_003__location" list="HP_REG_003__location_list"
                    onchange="loadSlidesBlocksReturnRegister()" onblur="loadSlidesBlocksReturnRegister()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="HP_REG_003__location_list">
                    <option value="Main Lab">
                    <option value="Branch Lab">
                    <option value="Collection Center">
                    <option value="Hospital Lab">
                    <option value="Clinic Lab">
                </datalist>
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearREG003Filters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px;">Date</th>
                    <th style="border:1px solid #000; padding:6px;">SIN No.</th>
                    <th style="border:1px solid #000; padding:6px;">Patient Name</th>
                    <th style="border:1px solid #000; padding:6px;">Age/Sex</th>
                    <th style="border:1px solid #000; padding:6px;">Histopathology Number / Blocks / Slides</th>
                    <th style="border:1px solid #000; padding:6px;">Handover By Signature</th>
                    <th style="border:1px solid #000; padding:6px;">Received By Signature & Contact No.</th>
                    <th style="border:1px solid #000; padding:6px;">Remarks</th>
                    <th style="border:1px solid #000; padding:6px;">HOD Sign</th>
                </tr>
            </thead>
            <tbody id="HP_REG_003__tbody">
                <tr>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="sin_no[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="patient_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="age_sex[]" placeholder="45/M" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="hp_details[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="handover_sign[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="received_by[]" placeholder="Signature / Mobile" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="remarks[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="hod_sign[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                </tr>
            </tbody>
        </table>

        <script>
            function loadSlidesBlocksReturnRegister() {
                const fromDate = document.getElementById('HP_REG_003__from_date').value;
                const toDate = document.getElementById('HP_REG_003__to_date').value;

                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                const department = document.getElementById('HP_REG_003__department').value;
                if (department) params.append('department', department);

                const location = document.getElementById('HP_REG_003__location').value;
                if (location) params.append('location', location);

                fetch(`/newforms/hp/slides-blocks-return-register/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    const tbody = document.getElementById('HP_REG_003__tbody');
                    if (!tbody) return;

                    tbody.innerHTML = '';

                    if (res.departments) {
                        updateREG003Datalist('HP_REG_003__department_list', res.departments);
                    }
                    if (res.locations) {
                        updateREG003Datalist('HP_REG_003__location_list', res.locations);
                    }

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
                const fields = ['sin_no','patient_name','age_sex','hp_details','handover_sign','received_by','remarks','hod_sign'];
                let html = `<td style="border:1px solid #000; padding:4px;">
                    <input type="hidden" name="row_id[]" value="${row.id}">
                    <input type="date" name="row_date[]" value="${row.row_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                </td>`;
                fields.forEach(f => {
                    const placeholder = f === 'age_sex' ? ' placeholder="45/M"' : (f === 'received_by' ? ' placeholder="Signature / Mobile"' : '');
                    html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" value="${row[f] || ''}"${placeholder} style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
                });
                return html;
            }

            function addEmptyRowREG003() {
                const tbody = document.getElementById('HP_REG_003__tbody');
                if (!tbody) return;

                const fields = ['sin_no','patient_name','age_sex','hp_details','handover_sign','received_by','remarks','hod_sign'];
                const tr = document.createElement('tr');
                let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
                fields.forEach(f => {
                    const placeholder = f === 'age_sex' ? ' placeholder="45/M"' : (f === 'received_by' ? ' placeholder="Signature / Mobile"' : '');
                    html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]"${placeholder} style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
                });
                tr.innerHTML = html;
                tbody.appendChild(tr);
            }

            function clearREG003Form() {
                const tbody = document.getElementById('HP_REG_003__tbody');
                if (tbody) {
                    tbody.innerHTML = '';
                    addEmptyRowREG003();
                }
            }

            function clearREG003Filters() {
                document.getElementById('HP_REG_003__from_date').value = '';
                document.getElementById('HP_REG_003__to_date').value = '';
                document.getElementById('HP_REG_003__department').value = '';
                document.getElementById('HP_REG_003__location').value = '';
                clearREG003Form();
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
                function initSlidesBlocksReturnRegister() {
                    const formContainer = document.querySelector('[id="TDPL/HP/REG-003"]');
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
                                showToastHPREG003('success', result.message || 'Saved successfully!');

                                const tbody = document.getElementById('HP_REG_003__tbody');
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
                                showToastHPREG003('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastHPREG003('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                function showToastHPREG003(type, message) {
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
                    document.addEventListener('DOMContentLoaded', initSlidesBlocksReturnRegister);
                } else {
                    initSlidesBlocksReturnRegister();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HP/REG-004"
        docNo="TDPL/HP/REG-004"
        docName="Sample Labelling Errors Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.hp.forms.submit') }}">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="HP_REG_004__from_date"
                    onchange="loadSampleLabellingErrors()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="HP_REG_004__to_date"
                    onchange="loadSampleLabellingErrors()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>Department</strong></label>
                <input type="text" name="department" id="HP_REG_004__department" list="HP_REG_004__department_list"
                    onchange="loadSampleLabellingErrors()" onblur="loadSampleLabellingErrors()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="HP_REG_004__department_list">
                    <option value="Histopathology">
                    <option value="Cytopathology">
                    <option value="Pathology">
                </datalist>
            </div>
            <div>
                <label><strong>Location</strong></label>
                <input type="text" name="location" id="HP_REG_004__location" list="HP_REG_004__location_list"
                    onchange="loadSampleLabellingErrors()" onblur="loadSampleLabellingErrors()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="HP_REG_004__location_list">
                    <option value="Main Lab">
                    <option value="Branch Lab">
                    <option value="Collection Center">
                    <option value="Hospital Lab">
                    <option value="Clinic Lab">
                </datalist>
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearREG004Filters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr style="background:#f2f2f2; text-align:center;">
                    <th style="border:1px solid #000; padding:6px;"><strong>Date</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>SIN No.</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Details of Labelling Error</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Labelling Error Done By</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Corrective Action Done</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Status</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Sign</strong></th>
                </tr>
            </thead>
            <tbody id="HP_REG_004__tbody">
                <tr>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="sin_no[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="label_error[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="error_by[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="corrective_action[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="status[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="sign[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                </tr>
            </tbody>
        </table>

        <script>
            function loadSampleLabellingErrors() {
                const fromDate = document.getElementById('HP_REG_004__from_date').value;
                const toDate = document.getElementById('HP_REG_004__to_date').value;

                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                const department = document.getElementById('HP_REG_004__department').value;
                if (department) params.append('department', department);

                const location = document.getElementById('HP_REG_004__location').value;
                if (location) params.append('location', location);

                fetch(`/newforms/hp/sample-labelling-errors-register/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    const tbody = document.getElementById('HP_REG_004__tbody');
                    if (!tbody) return;

                    tbody.innerHTML = '';

                    if (res.departments) {
                        updateREG004Datalist('HP_REG_004__department_list', res.departments);
                    }
                    if (res.locations) {
                        updateREG004Datalist('HP_REG_004__location_list', res.locations);
                    }

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
                const fields = ['sin_no','label_error','error_by','corrective_action','status','sign'];
                let html = `<td style="border:1px solid #000; padding:4px;">
                    <input type="hidden" name="row_id[]" value="${row.id}">
                    <input type="date" name="row_date[]" value="${row.row_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                </td>`;
                fields.forEach(f => {
                    html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" value="${row[f] || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
                });
                return html;
            }

            function addEmptyRowREG004() {
                const tbody = document.getElementById('HP_REG_004__tbody');
                if (!tbody) return;

                const fields = ['sin_no','label_error','error_by','corrective_action','status','sign'];
                const tr = document.createElement('tr');
                let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
                fields.forEach(f => {
                    html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
                });
                tr.innerHTML = html;
                tbody.appendChild(tr);
            }

            function clearREG004Form() {
                const tbody = document.getElementById('HP_REG_004__tbody');
                if (tbody) {
                    tbody.innerHTML = '';
                    addEmptyRowREG004();
                }
            }

            function clearREG004Filters() {
                document.getElementById('HP_REG_004__from_date').value = '';
                document.getElementById('HP_REG_004__to_date').value = '';
                document.getElementById('HP_REG_004__department').value = '';
                document.getElementById('HP_REG_004__location').value = '';
                clearREG004Form();
            }

            function updateREG004Datalist(datalistId, values) {
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

            // AJAX Submit for REG-004
            (function() {
                function initSampleLabellingErrors() {
                    const formContainer = document.querySelector('[id="TDPL/HP/REG-004"]');
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
                                showToastHPREG004('success', result.message || 'Saved successfully!');

                                const tbody = document.getElementById('HP_REG_004__tbody');
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
                                showToastHPREG004('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastHPREG004('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                function showToastHPREG004(type, message) {
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
                    document.addEventListener('DOMContentLoaded', initSampleLabellingErrors);
                } else {
                    initSampleLabellingErrors();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HP/REG-005"
        docNo="TDPL/HP/REG-005"
        docName="Decalcification Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.hp.forms.submit') }}">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="HP_REG_005__from_date"
                    onchange="loadDecalcificationRegister()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="HP_REG_005__to_date"
                    onchange="loadDecalcificationRegister()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>Department</strong></label>
                <input type="text" name="department" id="HP_REG_005__department" list="HP_REG_005__department_list"
                    onchange="loadDecalcificationRegister()" onblur="loadDecalcificationRegister()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="HP_REG_005__department_list">
                    <option value="Histopathology">
                    <option value="Cytopathology">
                    <option value="Pathology">
                </datalist>
            </div>
            <div>
                <label><strong>Location</strong></label>
                <input type="text" name="location" id="HP_REG_005__location" list="HP_REG_005__location_list"
                    onchange="loadDecalcificationRegister()" onblur="loadDecalcificationRegister()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="HP_REG_005__location_list">
                    <option value="Main Lab">
                    <option value="Branch Lab">
                    <option value="Collection Center">
                    <option value="Hospital Lab">
                    <option value="Clinic Lab">
                </datalist>
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearREG005Filters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr style="background:#f2f2f2; text-align:center;">
                    <th style="border:1px solid #000; padding:6px;"><strong>Date</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>SIN</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>HP No.</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Patient Name</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Age/Sex</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Site of Biopsy</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Decalcification<br>Start Date</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Decalcification<br>Completed Date</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Reagent Used</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Remarks</strong></th>
                </tr>
            </thead>
            <tbody id="HP_REG_005__tbody">
                <tr>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="sin[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="hp_no[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="patient_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="age_sex[]" placeholder="45/M" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="site_of_biopsy[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="start_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="completed_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="reagent[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="remarks[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                </tr>
            </tbody>
        </table>

        <script>
            function loadDecalcificationRegister() {
                const fromDate = document.getElementById('HP_REG_005__from_date').value;
                const toDate = document.getElementById('HP_REG_005__to_date').value;

                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                const department = document.getElementById('HP_REG_005__department').value;
                if (department) params.append('department', department);

                const location = document.getElementById('HP_REG_005__location').value;
                if (location) params.append('location', location);

                fetch(`/newforms/hp/decalcification-register/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    const tbody = document.getElementById('HP_REG_005__tbody');
                    if (!tbody) return;

                    tbody.innerHTML = '';

                    if (res.departments) {
                        updateREG005Datalist('HP_REG_005__department_list', res.departments);
                    }
                    if (res.locations) {
                        updateREG005Datalist('HP_REG_005__location_list', res.locations);
                    }

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
                let html = `<td style="border:1px solid #000; padding:4px;">
                    <input type="hidden" name="row_id[]" value="${row.id}">
                    <input type="date" name="row_date[]" value="${row.row_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                </td>`;
                const textFields = ['sin','hp_no','patient_name','age_sex','site_of_biopsy'];
                textFields.forEach(f => {
                    const placeholder = f === 'age_sex' ? ' placeholder="45/M"' : '';
                    html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" value="${row[f] || ''}"${placeholder} style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
                });
                // Date fields
                html += `<td style="border:1px solid #000; padding:4px;"><input type="date" name="start_date[]" value="${row.start_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
                html += `<td style="border:1px solid #000; padding:4px;"><input type="date" name="completed_date[]" value="${row.completed_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
                // Text fields
                html += `<td style="border:1px solid #000; padding:4px;"><input name="reagent[]" value="${row.reagent || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
                html += `<td style="border:1px solid #000; padding:4px;"><input name="remarks[]" value="${row.remarks || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
                return html;
            }

            function addEmptyRowREG005() {
                const tbody = document.getElementById('HP_REG_005__tbody');
                if (!tbody) return;

                const tr = document.createElement('tr');
                let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
                const textFields = ['sin','hp_no','patient_name','age_sex','site_of_biopsy'];
                textFields.forEach(f => {
                    const placeholder = f === 'age_sex' ? ' placeholder="45/M"' : '';
                    html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]"${placeholder} style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
                });
                html += `<td style="border:1px solid #000; padding:4px;"><input type="date" name="start_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
                html += `<td style="border:1px solid #000; padding:4px;"><input type="date" name="completed_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
                html += `<td style="border:1px solid #000; padding:4px;"><input name="reagent[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
                html += `<td style="border:1px solid #000; padding:4px;"><input name="remarks[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
                tr.innerHTML = html;
                tbody.appendChild(tr);
            }

            function clearREG005Form() {
                const tbody = document.getElementById('HP_REG_005__tbody');
                if (tbody) {
                    tbody.innerHTML = '';
                    addEmptyRowREG005();
                }
            }

            function clearREG005Filters() {
                document.getElementById('HP_REG_005__from_date').value = '';
                document.getElementById('HP_REG_005__to_date').value = '';
                document.getElementById('HP_REG_005__department').value = '';
                document.getElementById('HP_REG_005__location').value = '';
                clearREG005Form();
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
                function initDecalcificationRegister() {
                    const formContainer = document.querySelector('[id="TDPL/HP/REG-005"]');
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
                                showToastHPREG005('success', result.message || 'Saved successfully!');

                                const tbody = document.getElementById('HP_REG_005__tbody');
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
                                showToastHPREG005('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastHPREG005('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                function showToastHPREG005(type, message) {
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
                    document.addEventListener('DOMContentLoaded', initDecalcificationRegister);
                } else {
                    initDecalcificationRegister();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HP/REG-006"
        docNo="TDPL/HP/REG-006"
        docName=" Slides Storage Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.hp.forms.submit') }}">
        <table style="width:100%; border-collapse: collapse;" border="1">

            <thead>
                <tr style="background:#f2f2f2; text-align:center;">
                    <th rowspan="2" style="border:1px solid #000; padding:6px;"><strong>S. No.</strong></th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;"><strong>Cabinet Number</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Slides Serial Numbers</strong></th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;"><strong>Stored By</strong></th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;"><strong>Reviewed By</strong></th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;"><strong>HOD Signature</strong></th>
                </tr>

                <tr style="background:#f2f2f2; text-align:center;">
                    <th style="border:1px solid #000; padding:6px;"><strong>From &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; To</strong></th>
                </tr>
            </thead>

            <tbody>

                @foreach(range(1,12) as $i)
                <tr>

                    <!-- S. No. -->
                    <td style="padding:5px; text-align:center;">
                        <input type="text"
                            name="rows[{{ $i }}][sno]"
                            style="width:100%; border:0; text-align:center;">
                    </td>

                    <!-- Cabinet Number -->
                    <td style="padding:5px;">
                        <input type="text"
                            name="rows[{{ $i }}][cabinet_number]"
                            style="width:100%; border:0;">
                    </td>

                    <!-- Slides Serial Numbers From - To -->
                    <td style="padding:5px; display:flex; gap:6px; justify-content:space-between;">
                        <input type="text"
                            name="rows[{{ $i }}][slide_from]"
                            style="width:48%; border:0;">

                        <input type="text"
                            name="rows[{{ $i }}][slide_to]"
                            style="width:48%; border:0;">
                    </td>

                    <!-- Stored By -->
                    <td style="padding:5px;">
                        <input type="text"
                            name="rows[{{ $i }}][stored_by]"
                            style="width:100%; border:0;">
                    </td>

                    <!-- Reviewed By -->
                    <td style="padding:5px;">
                        <input type="text"
                            name="rows[{{ $i }}][reviewed_by]"
                            style="width:100%; border:0;">
                    </td>

                    <!-- HOD Signature -->
                    <td style="padding:5px;">
                        <input type="text"
                            name="rows[{{ $i }}][hod_signature]"
                            style="width:100%; border:0;">
                    </td>

                </tr>
                @endforeach

            </tbody>

        </table>

        <script>
            (function() {
                const wrapper = document.getElementById('TDPL/HP/REG-006');
                if (!wrapper) return;
                const formEl = wrapper.querySelector('form');
                if (!formEl) return;

                formEl.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const formData = new FormData(formEl);

                    fetch(formEl.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content,
                            'Accept': 'application/json'
                        },
                        body: formData
                    })
                    .then(r => r.json())
                    .then(resp => {
                        if (resp.success) {
                            let toast = document.getElementById('reg006_hp_toast');
                            if (!toast) {
                                toast = document.createElement('div');
                                toast.id = 'reg006_hp_toast';
                                toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:16px 28px;border-radius:8px;color:#fff;font-size:15px;z-index:9999;transition:opacity 0.5s;';
                                document.body.appendChild(toast);
                            }
                            toast.style.background = '#38a169';
                            toast.textContent = resp.message || 'Saved successfully!';
                            toast.style.opacity = '1';
                            setTimeout(() => { toast.style.opacity = '0'; }, 3000);

                            formEl.reset();
                        } else {
                            alert(resp.message || 'Save failed');
                        }
                    })
                    .catch(err => {
                        console.error('REG-006 submit error:', err);
                        alert('Network error. Please try again.');
                    });
                });
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HP/REG-007"
        docNo="TDPL/HP/REG-007"
        docName="Blocks Storage Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.hp.forms.submit') }}">
        <table style="width:100%; border-collapse: collapse;" border="1">

            <thead>
                <tr style="background:#f2f2f2; text-align:center;">
                    <th rowspan="2" style="border:1px solid #000; padding:6px;"><strong>S. No.</strong></th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;"><strong>Cabinet Number</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Block Serial Numbers</strong></th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;"><strong>Stored By</strong></th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;"><strong>Reviewed By</strong></th>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;"><strong>HOD Signature</strong></th>
                </tr>

                <tr style="background:#f2f2f2; text-align:center;">
                    <th style="border:1px solid #000; padding:6px;"><strong>From &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; To</strong></th>
                </tr>
            </thead>

            <tbody>

                @foreach(range(1,12) as $i)
                <tr>

                    <!-- S. No. -->
                    <td style="padding:5px; text-align:center;">
                        <input type="text"
                            name="rows[{{ $i }}][sno]"
                            style="width:100%; border:0; text-align:center;">
                    </td>

                    <!-- Cabinet Number -->
                    <td style="padding:5px;">
                        <input type="text"
                            name="rows[{{ $i }}][cabinet_number]"
                            style="width:100%; border:0;">
                    </td>

                    <!-- Slides Serial Numbers From - To -->
                    <td style="padding:5px; display:flex; gap:6px; justify-content:space-between;">
                        <input type="text"
                            name="rows[{{ $i }}][slide_from]"
                            style="width:48%; border:0;">

                        <input type="text"
                            name="rows[{{ $i }}][slide_to]"
                            style="width:48%; border:0;">
                    </td>

                    <!-- Stored By -->
                    <td style="padding:5px;">
                        <input type="text"
                            name="rows[{{ $i }}][stored_by]"
                            style="width:100%; border:0;">
                    </td>

                    <!-- Reviewed By -->
                    <td style="padding:5px;">
                        <input type="text"
                            name="rows[{{ $i }}][reviewed_by]"
                            style="width:100%; border:0;">
                    </td>

                    <!-- HOD Signature -->
                    <td style="padding:5px;">
                        <input type="text"
                            name="rows[{{ $i }}][hod_signature]"
                            style="width:100%; border:0;">
                    </td>

                </tr>
                @endforeach

            </tbody>

        </table>

        <script>
            (function() {
                const wrapper = document.getElementById('TDPL/HP/REG-007');
                if (!wrapper) return;
                const formEl = wrapper.querySelector('form');
                if (!formEl) return;

                formEl.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const formData = new FormData(formEl);

                    fetch(formEl.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content,
                            'Accept': 'application/json'
                        },
                        body: formData
                    })
                    .then(r => r.json())
                    .then(resp => {
                        if (resp.success) {
                            let toast = document.getElementById('reg007_hp_toast');
                            if (!toast) {
                                toast = document.createElement('div');
                                toast.id = 'reg007_hp_toast';
                                toast.style.cssText = 'position:fixed;top:20px;right:20px;padding:16px 28px;border-radius:8px;color:#fff;font-size:15px;z-index:9999;transition:opacity 0.5s;';
                                document.body.appendChild(toast);
                            }
                            toast.style.background = '#38a169';
                            toast.textContent = resp.message || 'Saved successfully!';
                            toast.style.opacity = '1';
                            setTimeout(() => { toast.style.opacity = '0'; }, 3000);

                            formEl.reset();
                        } else {
                            alert(resp.message || 'Save failed');
                        }
                    })
                    .catch(err => {
                        console.error('REG-007 submit error:', err);
                        alert('Network error. Please try again.');
                    });
                });
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HP/REG-008"
        docNo="TDPL/HP/REG-008"
        docName="Histopathology Grossing Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.hp.forms.submit') }}">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="HP_REG_008__from_date"
                    onchange="loadHpGrossingRegister()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="HP_REG_008__to_date"
                    onchange="loadHpGrossingRegister()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>Department</strong></label>
                <input type="text" name="department" id="HP_REG_008__department" list="HP_REG_008__department_list"
                    onchange="loadHpGrossingRegister()" onblur="loadHpGrossingRegister()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="HP_REG_008__department_list">
                    <option value="Histopathology">
                    <option value="Cytopathology">
                    <option value="Pathology">
                </datalist>
            </div>
            <div>
                <label><strong>Location</strong></label>
                <input type="text" name="location" id="HP_REG_008__location" list="HP_REG_008__location_list"
                    onchange="loadHpGrossingRegister()" onblur="loadHpGrossingRegister()"
                    style="border:1px solid #000; padding:4px; width:180px;" placeholder="Select or type">
                <datalist id="HP_REG_008__location_list">
                    <option value="Main Lab">
                    <option value="Branch Lab">
                    <option value="Collection Center">
                    <option value="Hospital Lab">
                    <option value="Clinic Lab">
                </datalist>
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearREG008Filters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr style="background:#f2f2f2; text-align:center;">
                    <th style="border:1px solid #000; padding:6px;"><strong>Date</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>HP Number</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Alphabets</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Doctor Name & Date</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Technician Signature</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>HOD Signature</strong></th>
                    <th style="border:1px solid #000; padding:6px;"><strong>Remarks</strong></th>
                </tr>
            </thead>
            <tbody id="HP_REG_008__tbody">
                <tr>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="hp_number[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="alphabets[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="doctor_name_date[]" placeholder="Doctor Name, Date" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="technician_signature[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="hod_signature[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="remarks[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                </tr>
            </tbody>
        </table>

        <script>
            function loadHpGrossingRegister() {
                const fromDate = document.getElementById('HP_REG_008__from_date').value;
                const toDate = document.getElementById('HP_REG_008__to_date').value;

                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                const department = document.getElementById('HP_REG_008__department').value;
                if (department) params.append('department', department);

                const location = document.getElementById('HP_REG_008__location').value;
                if (location) params.append('location', location);

                fetch(`/newforms/hp/hp-grossing-register/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    const tbody = document.getElementById('HP_REG_008__tbody');
                    if (!tbody) return;

                    tbody.innerHTML = '';

                    if (res.departments) {
                        updateREG008Datalist('HP_REG_008__department_list', res.departments);
                    }
                    if (res.locations) {
                        updateREG008Datalist('HP_REG_008__location_list', res.locations);
                    }

                    if (!res.data || res.data.length === 0) {
                        addEmptyRowREG008();
                        return;
                    }

                    res.data.forEach(row => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = buildREG008RowHTML(row);
                        tbody.appendChild(tr);
                    });

                    addEmptyRowREG008();
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function buildREG008RowHTML(row) {
                const fields = ['hp_number','alphabets','doctor_name_date','technician_signature','hod_signature','remarks'];
                let html = `<td style="border:1px solid #000; padding:4px;">
                    <input type="hidden" name="row_id[]" value="${row.id}">
                    <input type="date" name="row_date[]" value="${row.row_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                </td>`;
                fields.forEach(f => {
                    const placeholder = f === 'doctor_name_date' ? ' placeholder="Doctor Name, Date"' : '';
                    html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" value="${row[f] || ''}"${placeholder} style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
                });
                return html;
            }

            function addEmptyRowREG008() {
                const tbody = document.getElementById('HP_REG_008__tbody');
                if (!tbody) return;

                const fields = ['hp_number','alphabets','doctor_name_date','technician_signature','hod_signature','remarks'];
                const tr = document.createElement('tr');
                let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
                fields.forEach(f => {
                    const placeholder = f === 'doctor_name_date' ? ' placeholder="Doctor Name, Date"' : '';
                    html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]"${placeholder} style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
                });
                tr.innerHTML = html;
                tbody.appendChild(tr);
            }

            function clearREG008Form() {
                const tbody = document.getElementById('HP_REG_008__tbody');
                if (tbody) {
                    tbody.innerHTML = '';
                    addEmptyRowREG008();
                }
            }

            function clearREG008Filters() {
                document.getElementById('HP_REG_008__from_date').value = '';
                document.getElementById('HP_REG_008__to_date').value = '';
                document.getElementById('HP_REG_008__department').value = '';
                document.getElementById('HP_REG_008__location').value = '';
                clearREG008Form();
            }

            function updateREG008Datalist(datalistId, values) {
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

            // AJAX Submit for REG-008
            (function() {
                function initHpGrossingRegister() {
                    const formContainer = document.querySelector('[id="TDPL/HP/REG-008"]');
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
                                showToastHPREG008('success', result.message || 'Saved successfully!');

                                const tbody = document.getElementById('HP_REG_008__tbody');
                                if (tbody && result.data && result.data.length > 0) {
                                    tbody.innerHTML = '';

                                    result.data.forEach(row => {
                                        const tr = document.createElement('tr');
                                        tr.innerHTML = buildREG008RowHTML(row);
                                        tbody.appendChild(tr);
                                    });

                                    addEmptyRowREG008();
                                }
                            } else {
                                showToastHPREG008('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastHPREG008('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                function showToastHPREG008(type, message) {
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
                    document.addEventListener('DOMContentLoaded', initHpGrossingRegister);
                } else {
                    initHpGrossingRegister();
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
