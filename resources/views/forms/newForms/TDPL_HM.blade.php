@extends('layouts.base')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HM</title>
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
            <div style="font-size: 20px; ">HM </div>

        </div>
        <div class="icon-view">
            <div class="pc-content">
                <div class="pc-folder" onclick="showSection('TDPL/HM/FOM-001')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Coagulation MNPT Form.</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HM/FOM-002')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">ABO & Rh Typing QC Form</span>
                </div>

                <div class="pc-folder" onclick="showSection('TDPL/HM/FOM-003')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Titration of Antibody Reagent in Blood Grouping</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HM/FOM-004')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Avidity of Antibody Reagent in Blood Grouping</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HM/FOM-005')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Bone Marrow Examination Requisition Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HM/FOM-006')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Coagulation Requisition Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HM/REG-001')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">PT APTT Results Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HM/REG-002')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Leishman Stain QC Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HM/REG-003')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label"> ABO & Rh Typing Result Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HM/REG-004')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">ICT DCT Malaria Result Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HM/REG-005')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Erythrocyte Sedimentation Rate (ESR) Results Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/HM/REG-006')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Body Fluids Examination Results Register</span>
                </div>




            </div>
        </div>
    </div>


    <x-formTemplete
        id="TDPL/HM/FOM-001"
        docNo="TDPL/HM/FOM-001"
        docName="Coagulation MNPT Form."
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.hm.forms.submit') }}">

        <div style="margin-bottom:20px;">
            <strong>Location:</strong> <input type="text" name="location" style="width:200px;">
            <strong>Instrument Name:</strong> <input type="text" name="instrument_name" style="width:200px;">
            <strong>Instrument ID:</strong> <input type="text" name="instrument_id" style="width:150px;">
        </div>

        <table style="width:100%; border-collapse:collapse;" border="1">
            <tr>
                <td style="padding:6px;"><strong>S. No</strong></td>
                <td colspan="2" style="padding:6px;"><strong>Name</strong></td>
                <td style="padding:6px;"><strong>PT</strong></td>
                <td style="padding:6px;"><strong>APTT</strong></td>
            </tr>

            @for($i = 1; $i <= 20; $i++)
                <tr>
                <td style="padding:6px;"><strong>{{ $i }}</strong></td>
                <td colspan="2" style="padding:6px;">
                    <input type="text" name="rows[{{ $i }}][name]" style="width:100%;">
                </td>
                <td style="padding:6px;">
                    <input type="text" name="rows[{{ $i }}][pt]" style="width:100%;">
                </td>
                <td style="padding:6px;">
                    <input type="text" name="rows[{{ $i }}][aptt]" style="width:100%;">
                </td>
                </tr>
            @endfor

            <tr>
                <td></td>
                <td colspan="2" style="padding:6px;">Geometric Mean</td>
                <td><input type="text" name="geo_mean_pt" style="width:100%;"></td>
                <td><input type="text" name="geo_mean_aptt" style="width:100%;"></td>
            </tr>

            <tr>
                <td></td>
                <td colspan="2" style="padding:6px;">Arithmetic Mean</td>
                <td><input type="text" name="arith_mean_pt" style="width:100%;"></td>
                <td><input type="text" name="arith_mean_aptt" style="width:100%;"></td>
            </tr>

            <tr>
                <td></td>
                <td colspan="2" style="padding:6px;">SD</td>
                <td><input type="text" name="sd_pt" style="width:100%;"></td>
                <td><input type="text" name="sd_aptt" style="width:100%;"></td>
            </tr>

            <tr>
                <td></td>
                <td colspan="2" style="padding:6px;">Mean + 2SD</td>
                <td><input type="text" name="mean2sd_pt" style="width:100%;"></td>
                <td><input type="text" name="mean2sd_aptt" style="width:100%;"></td>
            </tr>

            <tr>
                <td></td>
                <td colspan="2" style="padding:6px;">Mean - 2SD</td>
                <td><input type="text" name="mean_minus_2sd_pt" style="width:100%;"></td>
                <td><input type="text" name="mean_minus_2sd_aptt" style="width:100%;"></td>
            </tr>

            <tr>
                <td></td>
                <td colspan="2" style="padding:6px;">CV%</td>
                <td><input type="text" name="cv_pt" style="width:100%;"></td>
                <td><input type="text" name="cv_aptt" style="width:100%;"></td>
            </tr>

            <!-- PT Section -->
            <tr>
                <td rowspan="3" style="padding:6px;"><strong>PT</strong></td>
                <td style="padding:6px;">Lot #</td>
                <td colspan="3">
                    <input type="text" name="pt_lot" style="width:100%;">
                </td>
            </tr>
            <tr>
                <td style="padding:6px;">Expiry Date</td>
                <td colspan="3">
                    <input type="date" name="pt_expiry" style="width:100%;">
                </td>
            </tr>
            <tr>
                <td style="padding:6px;">Performed Date</td>
                <td colspan="3">
                    <input type="date" name="pt_performed" style="width:100%;">
                </td>
            </tr>

            <!-- APTT Section -->
            <tr>
                <td rowspan="3" style="padding:6px;"><strong>APTT</strong></td>
                <td style="padding:6px;">Lot #</td>
                <td colspan="3">
                    <input type="text" name="aptt_lot" style="width:100%;">
                </td>
            </tr>
            <tr>
                <td style="padding:6px;">Expiry Date</td>
                <td colspan="3">
                    <input type="date" name="aptt_expiry" style="width:100%;">
                </td>
            </tr>
            <tr>
                <td style="padding:6px;">Performed Date</td>
                <td colspan="3">
                    <input type="date" name="aptt_performed" style="width:100%;">
                </td>
            </tr>
        </table>

        <div style="margin-top:20px;">
            <strong>Performed By:</strong>
            <input type="text" name="performed_by" style="width:200px;">

            <strong>Verified By:</strong>
            <input type="text" name="verified_by" style="width:200px;">
        </div>

        <script>
            // AJAX Submit for Coagulation MNPT Form
            (function() {
                function initCoagulationMnptForm() {
                    const formContainer = document.querySelector('[id="TDPL/HM/FOM-001"]');
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
                                showToastHMFOM001('success', result.message || 'Saved successfully!');
                            } else {
                                showToastHMFOM001('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastHMFOM001('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                function showToastHMFOM001(type, message) {
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
                    document.addEventListener('DOMContentLoaded', initCoagulationMnptForm);
                } else {
                    initCoagulationMnptForm();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HM/FOM-002"
        docNo="TDPL/HM/FOM-002"
        docName="ABO & Rh Typing QC Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.hm.forms.submit') }}">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="HM_FOM_002__from_date"
                    onchange="loadAboRhTypingQcData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="HM_FOM_002__to_date"
                    onchange="loadAboRhTypingQcData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearAboRhTypingQcFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <div style="overflow-x:auto;">
            <table style="width:100%; border-collapse:collapse; min-width:1400px;" border="1">
                <thead>
                    <tr>
                        <td rowspan="2" style="padding:4px; text-align:center; border:1px solid #000; font-weight:bold;">Date</td>
                        <td colspan="4" style="padding:4px; text-align:center; border:1px solid #000; font-weight:bold;">Anti-A</td>
                        <td colspan="4" style="padding:4px; text-align:center; border:1px solid #000; font-weight:bold;">Anti-B</td>
                        <td colspan="4" style="padding:4px; text-align:center; border:1px solid #000; font-weight:bold;">Anti-D IgM</td>
                        <td colspan="4" style="padding:4px; text-align:center; border:1px solid #000; font-weight:bold;">Anti-D IgG</td>
                        <td colspan="4" style="padding:4px; text-align:center; border:1px solid #000; font-weight:bold;">Anti-A1</td>
                        <td colspan="4" style="padding:4px; text-align:center; border:1px solid #000; font-weight:bold;">Anti-H</td>
                        <td rowspan="2" style="padding:4px; text-align:center; border:1px solid #000; font-weight:bold;">Done By</td>
                        <td rowspan="2" style="padding:4px; text-align:center; border:1px solid #000; font-weight:bold;">Verified By</td>
                        <td rowspan="2" style="padding:4px; text-align:center; border:1px solid #000; font-weight:bold;">Remarks</td>
                    </tr>
                    <tr>
                        @for ($i = 0; $i < 6; $i++)
                            <td style="padding:4px; text-align:center; border:1px solid #000; font-weight:bold;">App</td>
                            <td style="padding:4px; text-align:center; border:1px solid #000; font-weight:bold;">A</td>
                            <td style="padding:4px; text-align:center; border:1px solid #000; font-weight:bold;">B</td>
                            <td style="padding:4px; text-align:center; border:1px solid #000; font-weight:bold;">O</td>
                        @endfor
                    </tr>
                </thead>
                <tbody id="HM_FOM_002__tbody">
                    <!-- Empty row for new entry -->
                    <tr>
                        <td style="border:1px solid #000; padding:2px;"><input type="date" name="check_date[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="anti_a_appearance[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="anti_a_a[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="anti_a_b[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="anti_a_o[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="anti_b_appearance[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="anti_b_a[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="anti_b_b[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="anti_b_o[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="anti_d_igm_appearance[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="anti_d_igm_a[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="anti_d_igm_b[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="anti_d_igm_o[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="anti_d_igg_appearance[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="anti_d_igg_a[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="anti_d_igg_b[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="anti_d_igg_o[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="anti_a1_appearance[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="anti_a1_a[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="anti_a1_b[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="anti_a1_o[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="anti_h_appearance[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="anti_h_a[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="anti_h_b[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="anti_h_o[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="done_by[]" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="verified_by[]" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="remarks[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <script>
            // Load ABO & Rh Typing QC records based on date range filters
            function loadAboRhTypingQcData() {
                const fromDate = document.getElementById('HM_FOM_002__from_date').value;
                const toDate = document.getElementById('HM_FOM_002__to_date').value;

                // At least one date filter required
                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                fetch(`/newforms/hm/abo-rh-typing-qc/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    const tbody = document.getElementById('HM_FOM_002__tbody');
                    if (!tbody) return;

                    tbody.innerHTML = '';

                    if (!res.data || res.data.length === 0) {
                        addEmptyRowFOM002();
                        return;
                    }

                    res.data.forEach(row => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td style="border:1px solid #000; padding:2px;">
                                <input type="hidden" name="row_id[]" value="${row.id}">
                                <input type="date" name="check_date[]" value="${row.check_date || ''}" style="width:100%; border:1px solid #ccc; padding:2px;">
                            </td>
                            <td style="border:1px solid #000; padding:2px;"><input name="anti_a_appearance[]" value="${row.anti_a_appearance || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="anti_a_a[]" value="${row.anti_a_a || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="anti_a_b[]" value="${row.anti_a_b || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="anti_a_o[]" value="${row.anti_a_o || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="anti_b_appearance[]" value="${row.anti_b_appearance || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="anti_b_a[]" value="${row.anti_b_a || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="anti_b_b[]" value="${row.anti_b_b || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="anti_b_o[]" value="${row.anti_b_o || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="anti_d_igm_appearance[]" value="${row.anti_d_igm_appearance || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="anti_d_igm_a[]" value="${row.anti_d_igm_a || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="anti_d_igm_b[]" value="${row.anti_d_igm_b || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="anti_d_igm_o[]" value="${row.anti_d_igm_o || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="anti_d_igg_appearance[]" value="${row.anti_d_igg_appearance || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="anti_d_igg_a[]" value="${row.anti_d_igg_a || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="anti_d_igg_b[]" value="${row.anti_d_igg_b || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="anti_d_igg_o[]" value="${row.anti_d_igg_o || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="anti_a1_appearance[]" value="${row.anti_a1_appearance || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="anti_a1_a[]" value="${row.anti_a1_a || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="anti_a1_b[]" value="${row.anti_a1_b || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="anti_a1_o[]" value="${row.anti_a1_o || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="anti_h_appearance[]" value="${row.anti_h_appearance || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="anti_h_a[]" value="${row.anti_h_a || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="anti_h_b[]" value="${row.anti_h_b || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="anti_h_o[]" value="${row.anti_h_o || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="done_by[]" value="${row.done_by || ''}" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="verified_by[]" value="${row.verified_by || ''}" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="remarks[]" value="${row.remarks || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                        `;
                        tbody.appendChild(tr);
                    });

                    addEmptyRowFOM002();
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function clearAboRhTypingQcForm() {
                const tbody = document.getElementById('HM_FOM_002__tbody');
                if (tbody) {
                    tbody.innerHTML = '';
                    addEmptyRowFOM002();
                }
            }

            function addEmptyRowFOM002() {
                const tbody = document.getElementById('HM_FOM_002__tbody');
                if (!tbody) return;

                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td style="border:1px solid #000; padding:2px;"><input type="date" name="check_date[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="anti_a_appearance[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="anti_a_a[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="anti_a_b[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="anti_a_o[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="anti_b_appearance[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="anti_b_a[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="anti_b_b[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="anti_b_o[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="anti_d_igm_appearance[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="anti_d_igm_a[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="anti_d_igm_b[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="anti_d_igm_o[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="anti_d_igg_appearance[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="anti_d_igg_a[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="anti_d_igg_b[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="anti_d_igg_o[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="anti_a1_appearance[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="anti_a1_a[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="anti_a1_b[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="anti_a1_o[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="anti_h_appearance[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="anti_h_a[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="anti_h_b[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="anti_h_o[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="done_by[]" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="verified_by[]" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="remarks[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                `;
                tbody.appendChild(tr);
            }

            function clearAboRhTypingQcFilters() {
                document.getElementById('HM_FOM_002__from_date').value = '';
                document.getElementById('HM_FOM_002__to_date').value = '';
                clearAboRhTypingQcForm();
            }

            // AJAX Submit for FOM-002
            (function() {
                function initAboRhTypingQcForm() {
                    const formContainer = document.querySelector('[id="TDPL/HM/FOM-002"]');
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
                                showToastFOM002('success', result.message || 'Saved successfully!');

                                const tbody = document.getElementById('HM_FOM_002__tbody');
                                if (tbody && result.data && result.data.length > 0) {
                                    tbody.innerHTML = '';

                                    result.data.forEach(row => {
                                        const tr = document.createElement('tr');
                                        tr.innerHTML = `
                                            <td style="border:1px solid #000; padding:2px;">
                                                <input type="hidden" name="row_id[]" value="${row.id}">
                                                <input type="date" name="check_date[]" value="${row.check_date || ''}" style="width:100%; border:1px solid #ccc; padding:2px;">
                                            </td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="anti_a_appearance[]" value="${row.anti_a_appearance || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="anti_a_a[]" value="${row.anti_a_a || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="anti_a_b[]" value="${row.anti_a_b || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="anti_a_o[]" value="${row.anti_a_o || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="anti_b_appearance[]" value="${row.anti_b_appearance || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="anti_b_a[]" value="${row.anti_b_a || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="anti_b_b[]" value="${row.anti_b_b || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="anti_b_o[]" value="${row.anti_b_o || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="anti_d_igm_appearance[]" value="${row.anti_d_igm_appearance || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="anti_d_igm_a[]" value="${row.anti_d_igm_a || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="anti_d_igm_b[]" value="${row.anti_d_igm_b || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="anti_d_igm_o[]" value="${row.anti_d_igm_o || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="anti_d_igg_appearance[]" value="${row.anti_d_igg_appearance || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="anti_d_igg_a[]" value="${row.anti_d_igg_a || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="anti_d_igg_b[]" value="${row.anti_d_igg_b || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="anti_d_igg_o[]" value="${row.anti_d_igg_o || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="anti_a1_appearance[]" value="${row.anti_a1_appearance || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="anti_a1_a[]" value="${row.anti_a1_a || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="anti_a1_b[]" value="${row.anti_a1_b || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="anti_a1_o[]" value="${row.anti_a1_o || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="anti_h_appearance[]" value="${row.anti_h_appearance || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="anti_h_a[]" value="${row.anti_h_a || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="anti_h_b[]" value="${row.anti_h_b || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="anti_h_o[]" value="${row.anti_h_o || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="done_by[]" value="${row.done_by || ''}" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="verified_by[]" value="${row.verified_by || ''}" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="remarks[]" value="${row.remarks || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                                        `;
                                        tbody.appendChild(tr);
                                    });

                                    addEmptyRowFOM002();
                                }
                            } else {
                                showToastFOM002('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastFOM002('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                function showToastFOM002(type, message) {
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
                    document.addEventListener('DOMContentLoaded', initAboRhTypingQcForm);
                } else {
                    initAboRhTypingQcForm();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HM/FOM-003"
        docNo="TDPL/HM/FOM-003"
        docName="Titration of Antibody Reagent in Blood Grouping"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.hm.forms.submit') }}">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="HM_FOM_003__from_date"
                    onchange="loadTitrationData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="HM_FOM_003__to_date"
                    onchange="loadTitrationData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearTitrationFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <div style="overflow-x:auto;">
            <table style="width:100%; border-collapse:collapse;" border="1">
                <thead>
                    <tr>
                        <td style="padding:6px; text-align:center; border:1px solid #000; font-weight:bold;">Date</td>
                        <td style="padding:6px; text-align:center; border:1px solid #000; font-weight:bold;">Antibody Reagent</td>
                        <td style="padding:6px; text-align:center; border:1px solid #000; font-weight:bold;">Company</td>
                        <td style="padding:6px; text-align:center; border:1px solid #000; font-weight:bold;">Lot Number</td>
                        <td style="padding:6px; text-align:center; border:1px solid #000; font-weight:bold;">Expiry Date</td>
                        <td style="padding:6px; text-align:center; border:1px solid #000; font-weight:bold;">Time</td>
                        <td style="padding:6px; text-align:center; border:1px solid #000; font-weight:bold;">Performed By</td>
                        <td style="padding:6px; text-align:center; border:1px solid #000; font-weight:bold;">Reviewed By</td>
                        <td style="padding:6px; text-align:center; border:1px solid #000; font-weight:bold;">Remarks</td>
                    </tr>
                </thead>
                <tbody id="HM_FOM_003__tbody">
                    <!-- Empty row for new entry -->
                    <tr>
                        <td style="border:1px solid #000; padding:2px;"><input type="date" name="check_date[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="antibody_reagent[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="company[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="lot_number[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="expiry_date[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="time[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="performed_by[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="reviewed_by[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="remarks[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <script>
            // Load Titration records based on date range filters
            function loadTitrationData() {
                const fromDate = document.getElementById('HM_FOM_003__from_date').value;
                const toDate = document.getElementById('HM_FOM_003__to_date').value;

                // At least one date filter required
                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                fetch(`/newforms/hm/titration-antibody-reagent/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    const tbody = document.getElementById('HM_FOM_003__tbody');
                    if (!tbody) return;

                    tbody.innerHTML = '';

                    if (!res.data || res.data.length === 0) {
                        addEmptyRowFOM003();
                        return;
                    }

                    res.data.forEach(row => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td style="border:1px solid #000; padding:2px;">
                                <input type="hidden" name="row_id[]" value="${row.id}">
                                <input type="date" name="check_date[]" value="${row.check_date || ''}" style="width:100%; border:1px solid #ccc; padding:2px;">
                            </td>
                            <td style="border:1px solid #000; padding:2px;"><input name="antibody_reagent[]" value="${row.antibody_reagent || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="company[]" value="${row.company || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="lot_number[]" value="${row.lot_number || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="expiry_date[]" value="${row.expiry_date || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="time[]" value="${row.time || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="performed_by[]" value="${row.performed_by || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="reviewed_by[]" value="${row.reviewed_by || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="remarks[]" value="${row.remarks || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                        `;
                        tbody.appendChild(tr);
                    });

                    addEmptyRowFOM003();
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function clearTitrationForm() {
                const tbody = document.getElementById('HM_FOM_003__tbody');
                if (tbody) {
                    tbody.innerHTML = '';
                    addEmptyRowFOM003();
                }
            }

            function addEmptyRowFOM003() {
                const tbody = document.getElementById('HM_FOM_003__tbody');
                if (!tbody) return;

                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td style="border:1px solid #000; padding:2px;"><input type="date" name="check_date[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="antibody_reagent[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="company[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="lot_number[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="expiry_date[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="time[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="performed_by[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="reviewed_by[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="remarks[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                `;
                tbody.appendChild(tr);
            }

            function clearTitrationFilters() {
                document.getElementById('HM_FOM_003__from_date').value = '';
                document.getElementById('HM_FOM_003__to_date').value = '';
                clearTitrationForm();
            }

            // AJAX Submit for FOM-003
            (function() {
                function initTitrationForm() {
                    const formContainer = document.querySelector('[id="TDPL/HM/FOM-003"]');
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
                                showToastFOM003('success', result.message || 'Saved successfully!');

                                const tbody = document.getElementById('HM_FOM_003__tbody');
                                if (tbody && result.data && result.data.length > 0) {
                                    tbody.innerHTML = '';

                                    result.data.forEach(row => {
                                        const tr = document.createElement('tr');
                                        tr.innerHTML = `
                                            <td style="border:1px solid #000; padding:2px;">
                                                <input type="hidden" name="row_id[]" value="${row.id}">
                                                <input type="date" name="check_date[]" value="${row.check_date || ''}" style="width:100%; border:1px solid #ccc; padding:2px;">
                                            </td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="antibody_reagent[]" value="${row.antibody_reagent || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="company[]" value="${row.company || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="lot_number[]" value="${row.lot_number || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="expiry_date[]" value="${row.expiry_date || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="time[]" value="${row.time || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="performed_by[]" value="${row.performed_by || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="reviewed_by[]" value="${row.reviewed_by || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="remarks[]" value="${row.remarks || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                                        `;
                                        tbody.appendChild(tr);
                                    });

                                    addEmptyRowFOM003();
                                }
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
                    document.addEventListener('DOMContentLoaded', initTitrationForm);
                } else {
                    initTitrationForm();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HM/FOM-004"
        docNo="TDPL/HM/FOM-004"
        docName="Avidity of Antibody Reagent in Blood Grouping"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.hm.forms.submit') }}">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="HM_FOM_004__from_date"
                    onchange="loadAvidityData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="HM_FOM_004__to_date"
                    onchange="loadAvidityData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearAvidityFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <div style="overflow-x:auto;">
            <table style="width:100%; border-collapse:collapse;" border="1">
                <thead>
                    <tr>
                        <td style="padding:6px; text-align:center; border:1px solid #000; font-weight:bold;">Date</td>
                        <td style="padding:6px; text-align:center; border:1px solid #000; font-weight:bold;">Antibody Reagent</td>
                        <td style="padding:6px; text-align:center; border:1px solid #000; font-weight:bold;">Company</td>
                        <td style="padding:6px; text-align:center; border:1px solid #000; font-weight:bold;">Lot Number</td>
                        <td style="padding:6px; text-align:center; border:1px solid #000; font-weight:bold;">Expiry Date</td>
                        <td style="padding:6px; text-align:center; border:1px solid #000; font-weight:bold;">Time</td>
                        <td style="padding:6px; text-align:center; border:1px solid #000; font-weight:bold;">Performed By</td>
                        <td style="padding:6px; text-align:center; border:1px solid #000; font-weight:bold;">Reviewed By</td>
                        <td style="padding:6px; text-align:center; border:1px solid #000; font-weight:bold;">Remarks</td>
                    </tr>
                </thead>
                <tbody id="HM_FOM_004__tbody">
                    <!-- Empty row for new entry -->
                    <tr>
                        <td style="border:1px solid #000; padding:2px;"><input type="date" name="check_date[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="antibody_reagent[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="company[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="lot_number[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="expiry_date[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="time[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="performed_by[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="reviewed_by[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="remarks[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <script>
            // Load Avidity records based on date range filters
            function loadAvidityData() {
                const fromDate = document.getElementById('HM_FOM_004__from_date').value;
                const toDate = document.getElementById('HM_FOM_004__to_date').value;

                // At least one date filter required
                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                fetch(`/newforms/hm/avidity-antibody-reagent/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    const tbody = document.getElementById('HM_FOM_004__tbody');
                    if (!tbody) return;

                    tbody.innerHTML = '';

                    if (!res.data || res.data.length === 0) {
                        addEmptyRowFOM004();
                        return;
                    }

                    res.data.forEach(row => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td style="border:1px solid #000; padding:2px;">
                                <input type="hidden" name="row_id[]" value="${row.id}">
                                <input type="date" name="check_date[]" value="${row.check_date || ''}" style="width:100%; border:1px solid #ccc; padding:2px;">
                            </td>
                            <td style="border:1px solid #000; padding:2px;"><input name="antibody_reagent[]" value="${row.antibody_reagent || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="company[]" value="${row.company || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="lot_number[]" value="${row.lot_number || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="expiry_date[]" value="${row.expiry_date || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="time[]" value="${row.time || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="performed_by[]" value="${row.performed_by || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="reviewed_by[]" value="${row.reviewed_by || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="remarks[]" value="${row.remarks || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                        `;
                        tbody.appendChild(tr);
                    });

                    addEmptyRowFOM004();
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function clearAvidityForm() {
                const tbody = document.getElementById('HM_FOM_004__tbody');
                if (tbody) {
                    tbody.innerHTML = '';
                    addEmptyRowFOM004();
                }
            }

            function addEmptyRowFOM004() {
                const tbody = document.getElementById('HM_FOM_004__tbody');
                if (!tbody) return;

                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td style="border:1px solid #000; padding:2px;"><input type="date" name="check_date[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="antibody_reagent[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="company[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="lot_number[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="expiry_date[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="time[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="performed_by[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="reviewed_by[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="remarks[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                `;
                tbody.appendChild(tr);
            }

            function clearAvidityFilters() {
                document.getElementById('HM_FOM_004__from_date').value = '';
                document.getElementById('HM_FOM_004__to_date').value = '';
                clearAvidityForm();
            }

            // AJAX Submit for FOM-004
            (function() {
                function initAvidityForm() {
                    const formContainer = document.querySelector('[id="TDPL/HM/FOM-004"]');
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
                                showToastFOM004('success', result.message || 'Saved successfully!');

                                const tbody = document.getElementById('HM_FOM_004__tbody');
                                if (tbody && result.data && result.data.length > 0) {
                                    tbody.innerHTML = '';

                                    result.data.forEach(row => {
                                        const tr = document.createElement('tr');
                                        tr.innerHTML = `
                                            <td style="border:1px solid #000; padding:2px;">
                                                <input type="hidden" name="row_id[]" value="${row.id}">
                                                <input type="date" name="check_date[]" value="${row.check_date || ''}" style="width:100%; border:1px solid #ccc; padding:2px;">
                                            </td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="antibody_reagent[]" value="${row.antibody_reagent || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="company[]" value="${row.company || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="lot_number[]" value="${row.lot_number || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="expiry_date[]" value="${row.expiry_date || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="time[]" value="${row.time || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="performed_by[]" value="${row.performed_by || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="reviewed_by[]" value="${row.reviewed_by || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="remarks[]" value="${row.remarks || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                                        `;
                                        tbody.appendChild(tr);
                                    });

                                    addEmptyRowFOM004();
                                }
                            } else {
                                showToastFOM004('error', result.message || 'Failed to save');
                            }
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

                function showToastFOM004(type, message) {
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
                    document.addEventListener('DOMContentLoaded', initAvidityForm);
                } else {
                    initAvidityForm();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HM/FOM-005"
        docNo="TDPL/HM/FOM-005"
        docName="Bone Marrow Examination Requisition Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.hm.forms.submit') }}">
        <input type="hidden" name="bone_marrow_exam_form_id" id="HM_FOM_005__record_id">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>Patient Name</strong></label>
                <input type="text" id="HM_FOM_005__filter_name"
                    style="border:1px solid #000; padding:4px; width:250px; display:block;" placeholder="Type patient name">
            </div>
            <div style="display:flex; gap:8px; align-items:flex-end;">
                <button type="button" onclick="loadHmFom005()"
                    style="padding:6px 15px; background:#007bff; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Search
                </button>
                <button type="button" onclick="clearHmFom005()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <div style="width:100%;font-size:14px;background:#fff;padding:25px;border-radius:12px;border:1px solid #ddd;">

            <h3 style="text-align:center; margin-bottom:20px;">
                <strong>BONE MARROW EXAMINATION REQUISITION FORM</strong>
            </h3>

            <!-- TOP FIELDS -->
            <div style="display:flex; margin-bottom:8px; gap:20px;">
                <div style="flex:1;">
                    <label>Patient Name:</label>
                    <input type="text" name="patient_name" id="HM_FOM_005__patient_name" style="width:100%; border:1px solid #000; padding:4px;">
                </div>
                <div style="flex:1;">
                    <label>Lab Number:</label>
                    <input type="text" name="lab_number" id="HM_FOM_005__lab_number" style="width:100%; border:1px solid #000; padding:4px;">
                </div>
            </div>
            <div style="display:flex; margin-bottom:8px; gap:20px;">
                <div style="flex:1;">
                    <label>Age & Sex:</label>
                    <input type="text" name="age_sex" id="HM_FOM_005__age_sex" style="width:100%; border:1px solid #000; padding:4px;">
                </div>
                <div style="flex:1;">
                    <label>Date:</label>
                    <input type="date" name="exam_date" id="HM_FOM_005__exam_date" style="width:100%; border:1px solid #000; padding:4px;">
                </div>
            </div>
            <div style="display:flex; margin-bottom:8px; gap:20px;">
                <div style="flex:1;">
                    <label>Ref. Doctor:</label>
                    <input type="text" name="ref_doctor" id="HM_FOM_005__ref_doctor" style="width:100%; border:1px solid #000; padding:4px;">
                </div>
                <div style="flex:1;">
                    <label>Time:</label>
                    <input type="text" name="time" id="HM_FOM_005__time" style="width:100%; border:1px solid #000; padding:4px;">
                </div>
            </div>
            <div style="display:flex; margin-bottom:8px; gap:20px;">
                <div style="flex:1;">
                    <label>Client Name:</label>
                    <input type="text" name="client_name" id="HM_FOM_005__client_name" style="width:100%; border:1px solid #000; padding:4px;">
                </div>
                <div style="flex:1;">
                    <label>Mobile No.:</label>
                    <input type="text" name="mobile_no" id="HM_FOM_005__mobile_no" style="width:100%; border:1px solid #000; padding:4px;">
                </div>
            </div>
            <div style="display:flex; margin-bottom:8px; gap:20px;">
                <div style="flex:1;">
                    <label>Client Code:</label>
                    <input type="text" name="client_code" id="HM_FOM_005__client_code" style="width:100%; border:1px solid #000; padding:4px;">
                </div>
                <div style="flex:1;"></div>
            </div>

            <!-- CLINICAL HISTORY -->
            <div style="margin:15px 0;">
                <label>Relevant Clinical History:</label>
                <textarea name="clinical_history" id="HM_FOM_005__clinical_history" rows="4" style="width:100%; border:1px solid #000; padding:6px;"></textarea>
            </div>

            <!-- CBC FIELDS -->
            <div style="margin-bottom:8px;">
                <label>Hemoglobin:</label>
                <input type="text" name="hemoglobin" id="HM_FOM_005__hemoglobin" style="width:100%; border:1px solid #000; padding:4px;">
            </div>
            <div style="margin-bottom:8px;">
                <label>RBC count:</label>
                <input type="text" name="rbc_count" id="HM_FOM_005__rbc_count" style="width:100%; border:1px solid #000; padding:4px;">
            </div>
            <div style="margin-bottom:8px;">
                <label>MCV:</label>
                <input type="text" name="mcv" id="HM_FOM_005__mcv" style="width:100%; border:1px solid #000; padding:4px;">
            </div>
            <div style="margin-bottom:8px;">
                <label>RDW:</label>
                <input type="text" name="rdw" id="HM_FOM_005__rdw" style="width:100%; border:1px solid #000; padding:4px;">
            </div>
            <div style="margin-bottom:8px;">
                <label>Total leukocyte count:</label>
                <input type="text" name="total_leukocyte_count" id="HM_FOM_005__total_leukocyte_count" style="width:100%; border:1px solid #000; padding:4px;">
            </div>
            <div style="margin-bottom:8px;">
                <label>Differential leukocyte count:</label>
                <input type="text" name="differential_leukocyte_count" id="HM_FOM_005__differential_leukocyte_count" style="width:100%; border:1px solid #000; padding:4px;">
            </div>
            <div style="margin-bottom:8px;">
                <label>Platelet count:</label>
                <input type="text" name="platelet_count" id="HM_FOM_005__platelet_count" style="width:100%; border:1px solid #000; padding:4px;">
            </div>

            <!-- PERIPHERAL SMEAR -->
            <div style="margin:15px 0;">
                <label>Peripheral Smear Findings:</label>
                <textarea name="peripheral_smear_findings" id="HM_FOM_005__peripheral_smear_findings" rows="4" style="width:100%; border:1px solid #000; padding:6px;"></textarea>
            </div>

            <!-- NOTE -->
            <p><strong>Note:</strong></p>
            <p>Above details are essential for evaluation of bone marrow specimens.</p>
            <p><strong>Kindly fix aspirate slide in Methanol prior to dispatch.</strong></p>

        </div>

        <script>
            // ── LOAD ──
            function loadHmFom005() {
                const patientName = document.getElementById('HM_FOM_005__filter_name').value.trim();
                if (!patientName) return;

                fetch(`/newforms/hm/bone-marrow-examination/load?patient_name=${encodeURIComponent(patientName)}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    clearHmFom005Fields();

                    if (!res.data) {
                        document.getElementById('HM_FOM_005__record_id').value = '';
                        return;
                    }

                    document.getElementById('HM_FOM_005__record_id').value = res.data.id;

                    const textFields = [
                        'patient_name', 'lab_number', 'age_sex', 'exam_date',
                        'ref_doctor', 'time', 'client_name', 'mobile_no',
                        'client_code', 'clinical_history',
                        'hemoglobin', 'rbc_count', 'mcv', 'rdw',
                        'total_leukocyte_count', 'differential_leukocyte_count',
                        'platelet_count', 'peripheral_smear_findings'
                    ];

                    textFields.forEach(field => {
                        const el = document.getElementById('HM_FOM_005__' + field);
                        if (el && res.data[field] != null) el.value = res.data[field];
                    });
                })
                .catch(err => console.error('Load error:', err));
            }

            // ── CLEAR ──
            function clearHmFom005() {
                document.getElementById('HM_FOM_005__filter_name').value = '';
                document.getElementById('HM_FOM_005__record_id').value = '';
                clearHmFom005Fields();
            }

            function clearHmFom005Fields() {
                const container = document.querySelector('[id="TDPL/HM/FOM-005"]');
                if (!container) return;
                container.querySelectorAll('input, textarea, select').forEach(el => {
                    if (el.id === 'HM_FOM_005__filter_name' || el.id === 'HM_FOM_005__record_id' || el.name === 'doc_no') return;
                    if (el.type === 'checkbox') {
                        el.checked = false;
                    } else {
                        el.value = '';
                    }
                });
            }

            // ── AJAX SUBMIT + TOAST ──
            (function() {
                function initHmFom005() {
                    const formContainer = document.querySelector('[id="TDPL/HM/FOM-005"]');
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
                                showToastHmFom005('success', result.message || 'Saved successfully!');
                                if (result.form_id) {
                                    document.getElementById('HM_FOM_005__record_id').value = result.form_id;
                                }
                            } else {
                                showToastHmFom005('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(err => {
                            showToastHmFom005('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });
                    });
                }

                function showToastHmFom005(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = 'position:fixed;top:20px;right:20px;z-index:9999;padding:12px 24px;border-radius:6px;color:#fff;font-size:14px;box-shadow:0 4px 12px rgba(0,0,0,0.15);background:' + (type === 'success' ? '#28a745' : '#dc3545');
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initHmFom005);
                } else {
                    initHmFom005();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HM/FOM-006"
        docNo="TDPL/HM/FOM-006"
        docName="Coagulation Requisition Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.hm.forms.submit') }}">
        <input type="hidden" name="coagulation_req_form_id" id="HM_FOM_006__record_id">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>Patient Name</strong></label>
                <input type="text" id="HM_FOM_006__filter_name"
                    style="border:1px solid #000; padding:4px; width:250px; display:block;" placeholder="Type patient name">
            </div>
            <div style="display:flex; gap:8px; align-items:flex-end;">
                <button type="button" onclick="loadHmFom006()"
                    style="padding:6px 15px; background:#007bff; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Search
                </button>
                <button type="button" onclick="clearHmFom006()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <div style="width:100%;background:#fff;padding:25px;border-radius:12px;border:1px solid #ccc;font-size:14px;line-height:1.6;">

            <h2 style="text-align:center; margin-bottom:20px;">
                <strong>COAGULATION REQUISITION FORM</strong>
            </h2>

            <!-- First Row -->
            <div style="display:flex; gap:20px; margin-bottom:12px;">
                <div style="flex:1;">
                    <label>Lab No.:</label>
                    <input type="text" name="lab_no" id="HM_FOM_006__lab_no"
                        style="width:100%; border:1px solid #777; padding:6px; border-radius:8px;">
                </div>
                <div style="flex:1;">
                    <label>Date:</label>
                    <input type="date" name="form_date" id="HM_FOM_006__form_date"
                        style="width:100%; border:1px solid #777; padding:6px; border-radius:8px;">
                </div>
            </div>

            <!-- Specimen -->
            <div style="margin-bottom:12px;">
                <label>Type of specimen:</label>

                @foreach (['Fasting', 'Non-fasting'] as $option)
                <label style="margin-right:15px; margin-left:10px;">
                    <input type="radio" name="specimen_type" value="{{ $option }}"> {{ $option }}
                </label>
                @endforeach

                <div style="margin-top:8px;">
                    <label>Time of specimen:</label>
                    <input type="text" name="specimen_time" id="HM_FOM_006__specimen_time"
                        style="width:50%; border:1px solid #777; padding:6px; border-radius:8px;">
                </div>
            </div>

            <!-- Name / Age / Sex -->
            <div style="margin-bottom:12px;">
                <div style="margin-bottom:8px;">
                    <label>Name:</label>
                    <input type="text" name="patient_name" id="HM_FOM_006__patient_name"
                        style="width:100%; border:1px solid #777; padding:6px; border-radius:8px;">
                </div>

                <div style="display:flex; gap:20px; margin-bottom:8px;">
                    <div style="flex:1;">
                        <label>Age:</label>
                        <input type="text" name="age" id="HM_FOM_006__age"
                            style="width:100%; border:1px solid #777; padding:6px; border-radius:8px;">
                    </div>

                    <div style="flex:1;">
                        <label>Sex:</label>
                        @foreach (['Male', 'Female'] as $sex)
                        <label style="margin-right:15px; margin-left:10px;">
                            <input type="radio" name="sex" value="{{ $sex }}"> {{ $sex }}
                        </label>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Contact -->
            <div style="margin-bottom:12px;">
                <label>Tel No. Patient:</label>
                <input type="text" name="tel_patient" id="HM_FOM_006__tel_patient"
                    style="width:100%; border:1px solid #777; padding:6px; border-radius:8px; margin-bottom:10px;">

                <label>Tel No. Physician:</label>
                <input type="text" name="tel_physician" id="HM_FOM_006__tel_physician"
                    style="width:100%; border:1px solid #777; padding:6px; border-radius:8px;">
            </div>

            <!-- Clinical History -->
            <h3 style="margin-top:20px;"><strong>Clinical History:</strong></h3>

            @foreach ([
            'Bleeding Disorder',
            'Congenital (Bleeding)',
            'Acquired (Bleeding)',
            'Thrombotic Disorder',
            'Congenital (Thrombotic)',
            'Acquired (Thrombotic)',
            'History of blood transfusion / blood products'
            ] as $index => $label)
            <div style="margin-bottom:10px;">
                <label>{{ $label }}:</label>
                @foreach (['Yes', 'No'] as $option)
                <label style="margin-right:15px; margin-left:10px;">
                    <input type="radio"
                        name="clinical_{{ $index }}"
                        value="{{ $option }}"> {{ $option }}
                </label>
                @endforeach
            </div>
            @endforeach

            <!-- Transfusion Extra -->
            <div style="margin-bottom:20px;">
                <label>If yes, Date of Last Transfusion:</label>
                <input type="date" name="last_transfusion_date" id="HM_FOM_006__last_transfusion_date"
                    style="border:1px solid #777; padding:6px; border-radius:8px; margin-right:20px;">

                <label>Type:</label>
                <input type="text" name="transfusion_type" id="HM_FOM_006__transfusion_type"
                    style="border:1px solid #777; padding:6px; border-radius:8px;">
            </div>

            <!-- Lab Investigation History -->
            <h3><strong>History of Laboratory Investigations:</strong></h3>

            @foreach ([
            'Prothrombin Time',
            'APTT'
            ] as $i => $test)
            <div style="margin-bottom:10px;">
                <label>{{ $test }}:</label>
                @foreach (['Yes', 'No'] as $yn)
                <label style="margin-right:15px; margin-left:10px;">
                    <input type="radio" name="lab_{{ $i }}" value="{{ $yn }}"> {{ $yn }}
                </label>
                @endforeach
            </div>

            <div style="margin-bottom:15px;">
                <label>If yes: Last value:</label>
                <input type="text" name="lab_{{ $i }}_value" id="HM_FOM_006__lab_{{ $i }}_value"
                    style="border:1px solid #777; padding:6px; border-radius:8px; width:50%;">
            </div>
            @endforeach

            <!-- Liver Function -->
            <div style="margin-bottom:12px;">
                <label>Liver function test:</label>
                @foreach (['Normal', 'Abnormal'] as $lft)
                <label style="margin-right:15px; margin-left:10px;">
                    <input type="radio" name="liver_function" value="{{ $lft }}"> {{ $lft }}
                </label>
                @endforeach

                <input type="text" name="liver_function_note" id="HM_FOM_006__liver_function_note"
                    style="border:1px solid #777; padding:6px; border-radius:8px; margin-left:15px;">
            </div>

            <!-- Others -->
            <div style="margin-bottom:15px;">
                <label>Others specify:</label>
                <input type="text" name="others_specify" id="HM_FOM_006__others_specify"
                    style="width:100%; border:1px solid #777; padding:6px; border-radius:8px;">
            </div>

            <!-- Medication -->
            <h3><strong>History of Drug/Medication for Coagulation Disorder:</strong></h3>

            <div style="margin-bottom:12px;">
                <label>Current dose:</label>
                <input type="text" name="current_dose" id="HM_FOM_006__current_dose"
                    style="width:60%; border:1px solid #777; padding:6px; border-radius:8px; margin-left:15px;">
            </div>

            <div style="margin-bottom:20px;">
                <label>Date of last change in dose:</label>
                <input type="date" name="dose_change_date" id="HM_FOM_006__dose_change_date"
                    style="border:1px solid #777; padding:6px; border-radius:8px; margin-left:15px;">
            </div>

            <!-- Medications Loop -->
            @foreach ([
            'Warfarin / Acetrom',
            'Hirudin',
            'Coumarin',
            'Others (specify)'
            ] as $m => $drug)
            <div style="margin-bottom:10px;">
                <label>{{ $drug }}:</label>

                @foreach (['Yes','No'] as $yn)
                <label style="margin-right:15px; margin-left:10px;">
                    <input type="radio" name="drug_{{ $m }}" value="{{ $yn }}"> {{ $yn }}
                </label>
                @endforeach

                <input type="text"
                    name="drug_{{ $m }}_notes" id="HM_FOM_006__drug_{{ $m }}_notes"
                    style="border:1px solid #777; padding:6px; border-radius:8px; width:40%;">
            </div>
            @endforeach

            <!-- Heparin -->
            @foreach ([
            'Low Molecular Weight Heparin',
            'Unfractionated Heparin'
            ] as $h => $hep)
            <div style="margin-bottom:10px;">
                <label>{{ $hep }}:</label>

                @foreach (['Yes','No'] as $yn)
                <label style="margin-right:15px; margin-left:10px;">
                    <input type="radio" name="heparin_{{ $h }}" value="{{ $yn }}"> {{ $yn }}
                </label>
                @endforeach

                <input type="text"
                    name="heparin_{{ $h }}_notes" id="HM_FOM_006__heparin_{{ $h }}_notes"
                    style="border:1px solid #777; padding:6px; border-radius:8px; width:40%;">
            </div>
            @endforeach

            <!-- Surgery -->
            <div style="margin-bottom:20px;">
                <label>History of major surgery (last 1 year):</label>
                @foreach (['Yes','No'] as $yn)
                <label style="margin-left:10px; margin-right:10px;">
                    <input type="radio" name="major_surgery" value="{{ $yn }}"> {{ $yn }}
                </label>
                @endforeach
            </div>

            <!-- Diagnosis -->
            <div style="margin-bottom:15px;">
                <label>Probable Diagnosis:</label>
                <textarea name="probable_diagnosis" id="HM_FOM_006__probable_diagnosis" rows="3"
                    style="width:100%; border:1px solid #777; padding:6px; border-radius:8px;"></textarea>
            </div>

            <!-- Footer Info -->
            <div style="margin-bottom:15px;">
                <label>Sample collected by:</label>
                <input type="text" name="sample_collected_by" id="HM_FOM_006__sample_collected_by"
                    style="width:100%; border:1px solid #777; padding:6px; border-radius:8px; margin-bottom:10px;">

                <label>Client Name & Code:</label>
                <input type="text" name="client_name_code" id="HM_FOM_006__client_name_code"
                    style="width:100%; border:1px solid #777; padding:6px; border-radius:8px;">
            </div>

        </div>

        <script>
            // ── LOAD ──
            function loadHmFom006() {
                const patientName = document.getElementById('HM_FOM_006__filter_name').value.trim();
                if (!patientName) return;

                fetch(`/newforms/hm/coagulation-requisition/load?patient_name=${encodeURIComponent(patientName)}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    clearHmFom006Fields();

                    if (!res.data) {
                        document.getElementById('HM_FOM_006__record_id').value = '';
                        return;
                    }

                    document.getElementById('HM_FOM_006__record_id').value = res.data.id;

                    const container = document.querySelector('[id="TDPL/HM/FOM-006"]');

                    // Simple text / date / textarea fields
                    const textFields = [
                        'lab_no', 'form_date', 'specimen_time',
                        'patient_name', 'age',
                        'tel_patient', 'tel_physician',
                        'last_transfusion_date', 'transfusion_type',
                        'lab_0_value', 'lab_1_value',
                        'liver_function_note', 'others_specify',
                        'current_dose', 'dose_change_date',
                        'drug_0_notes', 'drug_1_notes', 'drug_2_notes', 'drug_3_notes',
                        'heparin_0_notes', 'heparin_1_notes',
                        'probable_diagnosis', 'sample_collected_by', 'client_name_code'
                    ];

                    textFields.forEach(field => {
                        const el = document.getElementById('HM_FOM_006__' + field);
                        if (el && res.data[field] != null) el.value = res.data[field];
                    });

                    // Radio button fields
                    const radioFields = [
                        'specimen_type', 'sex',
                        'clinical_0', 'clinical_1', 'clinical_2', 'clinical_3',
                        'clinical_4', 'clinical_5', 'clinical_6',
                        'lab_0', 'lab_1', 'liver_function',
                        'drug_0', 'drug_1', 'drug_2', 'drug_3',
                        'heparin_0', 'heparin_1', 'major_surgery'
                    ];

                    radioFields.forEach(field => {
                        if (res.data[field] != null) {
                            const radio = container.querySelector('input[name="' + field + '"][value="' + res.data[field] + '"]');
                            if (radio) radio.checked = true;
                        }
                    });
                })
                .catch(err => console.error('Load error:', err));
            }

            // ── CLEAR ──
            function clearHmFom006() {
                document.getElementById('HM_FOM_006__filter_name').value = '';
                document.getElementById('HM_FOM_006__record_id').value = '';
                clearHmFom006Fields();
            }

            function clearHmFom006Fields() {
                const container = document.querySelector('[id="TDPL/HM/FOM-006"]');
                if (!container) return;
                container.querySelectorAll('input, textarea, select').forEach(el => {
                    if (el.id === 'HM_FOM_006__filter_name' || el.id === 'HM_FOM_006__record_id' || el.name === 'doc_no') return;
                    if (el.type === 'checkbox' || el.type === 'radio') {
                        el.checked = false;
                    } else {
                        el.value = '';
                    }
                });
            }

            // ── AJAX SUBMIT + TOAST ──
            (function() {
                function initHmFom006() {
                    const formContainer = document.querySelector('[id="TDPL/HM/FOM-006"]');
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
                                showToastHmFom006('success', result.message || 'Saved successfully!');
                                if (result.form_id) {
                                    document.getElementById('HM_FOM_006__record_id').value = result.form_id;
                                }
                            } else {
                                showToastHmFom006('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(err => {
                            showToastHmFom006('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.textContent = originalText;
                                submitBtn.disabled = false;
                            }
                        });
                    });
                }

                function showToastHmFom006(type, message) {
                    const toast = document.createElement('div');
                    toast.style.cssText = 'position:fixed;top:20px;right:20px;z-index:9999;padding:12px 24px;border-radius:6px;color:#fff;font-size:14px;box-shadow:0 4px 12px rgba(0,0,0,0.15);background:' + (type === 'success' ? '#28a745' : '#dc3545');
                    toast.textContent = message;
                    document.body.appendChild(toast);
                    setTimeout(() => toast.remove(), 3000);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initHmFom006);
                } else {
                    initHmFom006();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HM/REG-001"
        docNo="TDPL/HM/REG-001"
        docName="PT APTT Results Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.hm.forms.submit') }}">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="HM_REG_001__from_date"
                    onchange="loadPtApttData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="HM_REG_001__to_date"
                    onchange="loadPtApttData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearPtApttFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <div style="overflow-x:auto;">
            <table style="width:100%; border-collapse:collapse; font-size:14px;">
                <thead>
                    <tr>
                        <th style="border:1px solid #000; padding:6px;">Date</th>
                        <th style="border:1px solid #000; padding:6px;">SIN No</th>
                        <th style="border:1px solid #000; padding:6px;">Analyte Name</th>
                        <th style="border:1px solid #000; padding:6px;">Result</th>
                        <th style="border:1px solid #000; padding:6px;">Done By</th>
                        <th style="border:1px solid #000; padding:6px;">Verified By</th>
                        <th style="border:1px solid #000; padding:6px;">Remarks</th>
                    </tr>
                </thead>
                <tbody id="HM_REG_001__tbody">
                    <!-- Empty row for new entry -->
                    <tr>
                        <td style="border:1px solid #000; padding:2px;"><input type="date" name="check_date[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="sin_no[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="analyte_name[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="result[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="done_by[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="verified_by[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="remarks[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <script>
            // Load PT APTT records based on date range filters
            function loadPtApttData() {
                const fromDate = document.getElementById('HM_REG_001__from_date').value;
                const toDate = document.getElementById('HM_REG_001__to_date').value;

                // At least one date filter required
                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                fetch(`/newforms/hm/pt-aptt-results/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    const tbody = document.getElementById('HM_REG_001__tbody');
                    if (!tbody) return;

                    tbody.innerHTML = '';

                    if (!res.data || res.data.length === 0) {
                        addEmptyRowREG001();
                        return;
                    }

                    res.data.forEach(row => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td style="border:1px solid #000; padding:2px;">
                                <input type="hidden" name="row_id[]" value="${row.id}">
                                <input type="date" name="check_date[]" value="${row.check_date || ''}" style="width:100%; border:1px solid #ccc; padding:2px;">
                            </td>
                            <td style="border:1px solid #000; padding:2px;"><input name="sin_no[]" value="${row.sin_no || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="analyte_name[]" value="${row.analyte_name || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="result[]" value="${row.result || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="done_by[]" value="${row.done_by || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="verified_by[]" value="${row.verified_by || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="remarks[]" value="${row.remarks || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                        `;
                        tbody.appendChild(tr);
                    });

                    addEmptyRowREG001();
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function clearPtApttForm() {
                const tbody = document.getElementById('HM_REG_001__tbody');
                if (tbody) {
                    tbody.innerHTML = '';
                    addEmptyRowREG001();
                }
            }

            function addEmptyRowREG001() {
                const tbody = document.getElementById('HM_REG_001__tbody');
                if (!tbody) return;

                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td style="border:1px solid #000; padding:2px;"><input type="date" name="check_date[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="sin_no[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="analyte_name[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="result[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="done_by[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="verified_by[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="remarks[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                `;
                tbody.appendChild(tr);
            }

            function clearPtApttFilters() {
                document.getElementById('HM_REG_001__from_date').value = '';
                document.getElementById('HM_REG_001__to_date').value = '';
                clearPtApttForm();
            }

            // AJAX Submit for REG-001
            (function() {
                function initPtApttForm() {
                    const formContainer = document.querySelector('[id="TDPL/HM/REG-001"]');
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

                                const tbody = document.getElementById('HM_REG_001__tbody');
                                if (tbody && result.data && result.data.length > 0) {
                                    tbody.innerHTML = '';

                                    result.data.forEach(row => {
                                        const tr = document.createElement('tr');
                                        tr.innerHTML = `
                                            <td style="border:1px solid #000; padding:2px;">
                                                <input type="hidden" name="row_id[]" value="${row.id}">
                                                <input type="date" name="check_date[]" value="${row.check_date || ''}" style="width:100%; border:1px solid #ccc; padding:2px;">
                                            </td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="sin_no[]" value="${row.sin_no || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="analyte_name[]" value="${row.analyte_name || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="result[]" value="${row.result || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="done_by[]" value="${row.done_by || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="verified_by[]" value="${row.verified_by || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="remarks[]" value="${row.remarks || ''}" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                                        `;
                                        tbody.appendChild(tr);
                                    });

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
                    document.addEventListener('DOMContentLoaded', initPtApttForm);
                } else {
                    initPtApttForm();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HM/REG-002"
        docNo="TDPL/HM/REG-002"
        docName="Leishman Stain QC Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.hm.forms.submit') }}">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="HM_REG_002__from_date"
                    onchange="loadLeishmanData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="HM_REG_002__to_date"
                    onchange="loadLeishmanData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearLeishmanFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <div style="overflow-x:auto;">
            <table style="width:100%; border-collapse:collapse; font-size:13px; min-width:1800px;">
                <thead>
                    <tr>
                        <th style="border:1px solid #000; padding:6px; white-space:nowrap;">Date</th>
                        <th style="border:1px solid #000; padding:6px; white-space:nowrap;">Buffer PH</th>
                        <th style="border:1px solid #000; padding:6px; white-space:nowrap;">SIN No</th>
                        <th style="border:1px solid #000; padding:6px; white-space:nowrap;">Smear Prepared By</th>
                        <th style="border:1px solid #000; padding:6px; white-space:nowrap;">Shape</th>
                        <th style="border:1px solid #000; padding:6px; white-space:nowrap;">Thickness</th>
                        <th style="border:1px solid #000; padding:6px; white-space:nowrap;">Length of Smear</th>
                        <th style="border:1px solid #000; padding:6px; white-space:nowrap;">Distribution of Cells</th>
                        <th style="border:1px solid #000; padding:6px; white-space:nowrap;">Uniform Stain</th>
                        <th style="border:1px solid #000; padding:6px; white-space:nowrap;">Deposit</th>
                        <th style="border:1px solid #000; padding:6px; white-space:nowrap;">RBC Cytoplasm</th>
                        <th style="border:1px solid #000; padding:6px; white-space:nowrap;">WBC Cytoplasm</th>
                        <th style="border:1px solid #000; padding:6px; white-space:nowrap;">Eosinophils Granules</th>
                        <th style="border:1px solid #000; padding:6px; white-space:nowrap;">Overall Stain</th>
                        <th style="border:1px solid #000; padding:6px; white-space:nowrap;">Verified By</th>
                        <th style="border:1px solid #000; padding:6px; white-space:nowrap;">Approved By HOD</th>
                        <th style="border:1px solid #000; padding:6px; white-space:nowrap;">Remarks</th>
                    </tr>
                </thead>
                <tbody id="HM_REG_002__tbody">
                    <!-- Empty row for new entry -->
                    <tr>
                        <td style="border:1px solid #000; padding:2px;"><input type="date" name="check_date[]" style="width:110px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="buffer_ph[]" style="width:70px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="sin_no[]" style="width:90px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="smear_prepared_by[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="shape[]" style="width:70px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="thickness[]" style="width:70px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="length_of_smear[]" style="width:90px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="distribution_of_cells[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="uniform_stain[]" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="deposit[]" style="width:70px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="rbc_cytoplasm[]" style="width:90px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="wbc_cytoplasm[]" style="width:90px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="eosinophils_granules[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="overall_stain[]" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="verified_by[]" style="width:90px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="approved_by_hod[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="remarks[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <script>
            // Load Leishman Stain QC records based on date range filters
            function loadLeishmanData() {
                const fromDate = document.getElementById('HM_REG_002__from_date').value;
                const toDate = document.getElementById('HM_REG_002__to_date').value;

                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                fetch(`/newforms/hm/leishman-stain-qc/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    const tbody = document.getElementById('HM_REG_002__tbody');
                    if (!tbody) return;

                    tbody.innerHTML = '';

                    if (!res.data || res.data.length === 0) {
                        addEmptyRowREG002();
                        return;
                    }

                    res.data.forEach(row => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td style="border:1px solid #000; padding:2px;">
                                <input type="hidden" name="row_id[]" value="${row.id}">
                                <input type="date" name="check_date[]" value="${row.check_date || ''}" style="width:110px; border:1px solid #ccc; padding:2px;">
                            </td>
                            <td style="border:1px solid #000; padding:2px;"><input name="buffer_ph[]" value="${row.buffer_ph || ''}" style="width:70px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="sin_no[]" value="${row.sin_no || ''}" style="width:90px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="smear_prepared_by[]" value="${row.smear_prepared_by || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="shape[]" value="${row.shape || ''}" style="width:70px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="thickness[]" value="${row.thickness || ''}" style="width:70px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="length_of_smear[]" value="${row.length_of_smear || ''}" style="width:90px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="distribution_of_cells[]" value="${row.distribution_of_cells || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="uniform_stain[]" value="${row.uniform_stain || ''}" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="deposit[]" value="${row.deposit || ''}" style="width:70px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="rbc_cytoplasm[]" value="${row.rbc_cytoplasm || ''}" style="width:90px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="wbc_cytoplasm[]" value="${row.wbc_cytoplasm || ''}" style="width:90px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="eosinophils_granules[]" value="${row.eosinophils_granules || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="overall_stain[]" value="${row.overall_stain || ''}" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="verified_by[]" value="${row.verified_by || ''}" style="width:90px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="approved_by_hod[]" value="${row.approved_by_hod || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="remarks[]" value="${row.remarks || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                        `;
                        tbody.appendChild(tr);
                    });

                    addEmptyRowREG002();
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function clearLeishmanForm() {
                const tbody = document.getElementById('HM_REG_002__tbody');
                if (tbody) {
                    tbody.innerHTML = '';
                    addEmptyRowREG002();
                }
            }

            function addEmptyRowREG002() {
                const tbody = document.getElementById('HM_REG_002__tbody');
                if (!tbody) return;

                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td style="border:1px solid #000; padding:2px;"><input type="date" name="check_date[]" style="width:110px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="buffer_ph[]" style="width:70px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="sin_no[]" style="width:90px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="smear_prepared_by[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="shape[]" style="width:70px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="thickness[]" style="width:70px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="length_of_smear[]" style="width:90px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="distribution_of_cells[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="uniform_stain[]" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="deposit[]" style="width:70px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="rbc_cytoplasm[]" style="width:90px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="wbc_cytoplasm[]" style="width:90px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="eosinophils_granules[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="overall_stain[]" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="verified_by[]" style="width:90px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="approved_by_hod[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="remarks[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                `;
                tbody.appendChild(tr);
            }

            function clearLeishmanFilters() {
                document.getElementById('HM_REG_002__from_date').value = '';
                document.getElementById('HM_REG_002__to_date').value = '';
                clearLeishmanForm();
            }

            // AJAX Submit for REG-002
            (function() {
                function initLeishmanForm() {
                    const formContainer = document.querySelector('[id="TDPL/HM/REG-002"]');
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

                                const tbody = document.getElementById('HM_REG_002__tbody');
                                if (tbody && result.data && result.data.length > 0) {
                                    tbody.innerHTML = '';

                                    result.data.forEach(row => {
                                        const tr = document.createElement('tr');
                                        tr.innerHTML = `
                                            <td style="border:1px solid #000; padding:2px;">
                                                <input type="hidden" name="row_id[]" value="${row.id}">
                                                <input type="date" name="check_date[]" value="${row.check_date || ''}" style="width:110px; border:1px solid #ccc; padding:2px;">
                                            </td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="buffer_ph[]" value="${row.buffer_ph || ''}" style="width:70px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="sin_no[]" value="${row.sin_no || ''}" style="width:90px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="smear_prepared_by[]" value="${row.smear_prepared_by || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="shape[]" value="${row.shape || ''}" style="width:70px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="thickness[]" value="${row.thickness || ''}" style="width:70px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="length_of_smear[]" value="${row.length_of_smear || ''}" style="width:90px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="distribution_of_cells[]" value="${row.distribution_of_cells || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="uniform_stain[]" value="${row.uniform_stain || ''}" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="deposit[]" value="${row.deposit || ''}" style="width:70px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="rbc_cytoplasm[]" value="${row.rbc_cytoplasm || ''}" style="width:90px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="wbc_cytoplasm[]" value="${row.wbc_cytoplasm || ''}" style="width:90px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="eosinophils_granules[]" value="${row.eosinophils_granules || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="overall_stain[]" value="${row.overall_stain || ''}" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="verified_by[]" value="${row.verified_by || ''}" style="width:90px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="approved_by_hod[]" value="${row.approved_by_hod || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="remarks[]" value="${row.remarks || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                                        `;
                                        tbody.appendChild(tr);
                                    });

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
                    document.addEventListener('DOMContentLoaded', initLeishmanForm);
                } else {
                    initLeishmanForm();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HM/REG-003"
        docNo="TDPL/HM/REG-003"
        docName="ABO & Rh Typing Result Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.hm.forms.submit') }}">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="HM_REG_003__from_date"
                    onchange="loadAboRhResultData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="HM_REG_003__to_date"
                    onchange="loadAboRhResultData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearAboRhResultFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <div style="overflow-x:auto;">
            <table style="width:100%; border-collapse:collapse; font-size:14px; min-width:1400px;">
                <thead>
                    <tr>
                        <th style="border:1px solid #000; padding:4px;" rowspan="2">Date</th>
                        <th style="border:1px solid #000; padding:4px;" rowspan="2">Time</th>
                        <th style="border:1px solid #000; padding:4px;" rowspan="2">SIN No</th>
                        <th style="border:1px solid #000; padding:4px;" rowspan="2">Patient Name</th>
                        <th style="border:1px solid #000; padding:4px;" rowspan="2">Age/Sex</th>
                        <th style="border:1px solid #000; padding:4px;" colspan="3">Reverse Grouping</th>
                        <th style="border:1px solid #000; padding:4px;" colspan="3">Forward Grouping</th>
                        <th style="border:1px solid #000; padding:4px;" rowspan="2">Result</th>
                        <th style="border:1px solid #000; padding:4px;" rowspan="2">Done By</th>
                        <th style="border:1px solid #000; padding:4px;" rowspan="2">Verified By</th>
                        <th style="border:1px solid #000; padding:4px;" rowspan="2">Approved By</th>
                    </tr>
                    <tr>
                        <th style="border:1px solid #000; padding:4px;">Pool-A</th>
                        <th style="border:1px solid #000; padding:4px;">Pool-B</th>
                        <th style="border:1px solid #000; padding:4px;">Pool-O</th>
                        <th style="border:1px solid #000; padding:4px;">Anti-A</th>
                        <th style="border:1px solid #000; padding:4px;">Anti-B</th>
                        <th style="border:1px solid #000; padding:4px;">Anti-D</th>
                    </tr>
                </thead>
                <tbody id="HM_REG_003__tbody">
                    <!-- Empty row for new entry -->
                    <tr>
                        <td style="border:1px solid #000; padding:2px;"><input type="date" name="check_date[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input type="time" name="check_time[]" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="sin_no[]" style="width:70px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="patient_name[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="age_sex[]" style="width:60px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="pool_a_cells[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="pool_b_cells[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="pool_o_cells[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="anti_a[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="anti_b[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="anti_d[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="result[]" style="width:60px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="test_done_by[]" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="test_verified_by[]" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="approved_by[]" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <script>
            // Load ABO & Rh Typing Result records based on date range filters
            function loadAboRhResultData() {
                const fromDate = document.getElementById('HM_REG_003__from_date').value;
                const toDate = document.getElementById('HM_REG_003__to_date').value;

                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                fetch(`/newforms/hm/abo-rh-typing-result/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    const tbody = document.getElementById('HM_REG_003__tbody');
                    if (!tbody) return;

                    tbody.innerHTML = '';

                    if (!res.data || res.data.length === 0) {
                        addEmptyRowREG003();
                        return;
                    }

                    res.data.forEach(row => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td style="border:1px solid #000; padding:2px;">
                                <input type="hidden" name="row_id[]" value="${row.id}">
                                <input type="date" name="check_date[]" value="${row.check_date || ''}" style="width:100%; border:1px solid #ccc; padding:2px;">
                            </td>
                            <td style="border:1px solid #000; padding:2px;"><input type="time" name="check_time[]" value="${row.check_time || ''}" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="sin_no[]" value="${row.sin_no || ''}" style="width:70px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="patient_name[]" value="${row.patient_name || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="age_sex[]" value="${row.age_sex || ''}" style="width:60px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="pool_a_cells[]" value="${row.pool_a_cells || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="pool_b_cells[]" value="${row.pool_b_cells || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="pool_o_cells[]" value="${row.pool_o_cells || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="anti_a[]" value="${row.anti_a || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="anti_b[]" value="${row.anti_b || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="anti_d[]" value="${row.anti_d || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="result[]" value="${row.result || ''}" style="width:60px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="test_done_by[]" value="${row.test_done_by || ''}" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="test_verified_by[]" value="${row.test_verified_by || ''}" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="approved_by[]" value="${row.approved_by || ''}" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                        `;
                        tbody.appendChild(tr);
                    });

                    addEmptyRowREG003();
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function clearAboRhResultForm() {
                const tbody = document.getElementById('HM_REG_003__tbody');
                if (tbody) {
                    tbody.innerHTML = '';
                    addEmptyRowREG003();
                }
            }

            function addEmptyRowREG003() {
                const tbody = document.getElementById('HM_REG_003__tbody');
                if (!tbody) return;

                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td style="border:1px solid #000; padding:2px;"><input type="date" name="check_date[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input type="time" name="check_time[]" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="sin_no[]" style="width:70px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="patient_name[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="age_sex[]" style="width:60px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="pool_a_cells[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="pool_b_cells[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="pool_o_cells[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="anti_a[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="anti_b[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="anti_d[]" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="result[]" style="width:60px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="test_done_by[]" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="test_verified_by[]" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="approved_by[]" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                `;
                tbody.appendChild(tr);
            }

            function clearAboRhResultFilters() {
                document.getElementById('HM_REG_003__from_date').value = '';
                document.getElementById('HM_REG_003__to_date').value = '';
                clearAboRhResultForm();
            }

            // AJAX Submit for REG-003
            (function() {
                function initAboRhResultForm() {
                    const formContainer = document.querySelector('[id="TDPL/HM/REG-003"]');
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

                                const tbody = document.getElementById('HM_REG_003__tbody');
                                if (tbody && result.data && result.data.length > 0) {
                                    tbody.innerHTML = '';

                                    result.data.forEach(row => {
                                        const tr = document.createElement('tr');
                                        tr.innerHTML = `
                                            <td style="border:1px solid #000; padding:2px;">
                                                <input type="hidden" name="row_id[]" value="${row.id}">
                                                <input type="date" name="check_date[]" value="${row.check_date || ''}" style="width:100%; border:1px solid #ccc; padding:2px;">
                                            </td>
                                            <td style="border:1px solid #000; padding:2px;"><input type="time" name="check_time[]" value="${row.check_time || ''}" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="sin_no[]" value="${row.sin_no || ''}" style="width:70px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="patient_name[]" value="${row.patient_name || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="age_sex[]" value="${row.age_sex || ''}" style="width:60px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="pool_a_cells[]" value="${row.pool_a_cells || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="pool_b_cells[]" value="${row.pool_b_cells || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="pool_o_cells[]" value="${row.pool_o_cells || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="anti_a[]" value="${row.anti_a || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="anti_b[]" value="${row.anti_b || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="anti_d[]" value="${row.anti_d || ''}" style="width:40px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="result[]" value="${row.result || ''}" style="width:60px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="test_done_by[]" value="${row.test_done_by || ''}" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="test_verified_by[]" value="${row.test_verified_by || ''}" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="approved_by[]" value="${row.approved_by || ''}" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                                        `;
                                        tbody.appendChild(tr);
                                    });

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
                    document.addEventListener('DOMContentLoaded', initAboRhResultForm);
                } else {
                    initAboRhResultForm();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HM/REG-004"
        docNo="TDPL/HM/REG-004"
        docName="ICT DCT Malaria Result Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.hm.forms.submit') }}">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="HM_REG_004__from_date"
                    onchange="loadIctDctMalariaData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="HM_REG_004__to_date"
                    onchange="loadIctDctMalariaData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearIctDctMalariaFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <div style="overflow-x:auto;">
            <table style="width:100%; border-collapse:collapse; font-size:14px;">
                <thead>
                    <tr style="text-align: center; font-weight: bold;">
                        <th style="border:1px solid #000; padding:6px;">Date</th>
                        <th style="border:1px solid #000; padding:6px;">Sin No.</th>
                        <th style="border:1px solid #000; padding:6px;">Patient Name</th>
                        <th style="border:1px solid #000; padding:6px;">Age/Sex</th>
                        <th style="border:1px solid #000; padding:6px;">Analyte Name</th>
                        <th style="border:1px solid #000; padding:6px;">Result</th>
                        <th style="border:1px solid #000; padding:6px;">Done By</th>
                        <th style="border:1px solid #000; padding:6px;">Verified By</th>
                        <th style="border:1px solid #000; padding:6px;">Remarks</th>
                    </tr>
                </thead>
                <tbody id="HM_REG_004__tbody">
                    <!-- Empty row for new entry -->
                    <tr>
                        <td style="border:1px solid #000; padding:2px;"><input type="date" name="check_date[]" style="width:130px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="sin_no[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="patient_name[]" style="width:150px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="age_sex[]" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="analyte_name[]" style="width:130px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="result[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="done_by[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="verified_by[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="remarks[]" style="width:150px; border:1px solid #ccc; padding:2px;"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <script>
            // Load ICT DCT Malaria Result records based on date range filters
            function loadIctDctMalariaData() {
                const fromDate = document.getElementById('HM_REG_004__from_date').value;
                const toDate = document.getElementById('HM_REG_004__to_date').value;

                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                fetch(`/newforms/hm/ict-dct-malaria-result/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    const tbody = document.getElementById('HM_REG_004__tbody');
                    if (!tbody) return;

                    tbody.innerHTML = '';

                    if (!res.data || res.data.length === 0) {
                        addEmptyRowREG004();
                        return;
                    }

                    res.data.forEach(row => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td style="border:1px solid #000; padding:2px;">
                                <input type="hidden" name="row_id[]" value="${row.id}">
                                <input type="date" name="check_date[]" value="${row.check_date || ''}" style="width:130px; border:1px solid #ccc; padding:2px;">
                            </td>
                            <td style="border:1px solid #000; padding:2px;"><input name="sin_no[]" value="${row.sin_no || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="patient_name[]" value="${row.patient_name || ''}" style="width:150px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="age_sex[]" value="${row.age_sex || ''}" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="analyte_name[]" value="${row.analyte_name || ''}" style="width:130px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="result[]" value="${row.result || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="done_by[]" value="${row.done_by || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="verified_by[]" value="${row.verified_by || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="remarks[]" value="${row.remarks || ''}" style="width:150px; border:1px solid #ccc; padding:2px;"></td>
                        `;
                        tbody.appendChild(tr);
                    });

                    addEmptyRowREG004();
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function clearIctDctMalariaForm() {
                const tbody = document.getElementById('HM_REG_004__tbody');
                if (tbody) {
                    tbody.innerHTML = '';
                    addEmptyRowREG004();
                }
            }

            function addEmptyRowREG004() {
                const tbody = document.getElementById('HM_REG_004__tbody');
                if (!tbody) return;

                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td style="border:1px solid #000; padding:2px;"><input type="date" name="check_date[]" style="width:130px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="sin_no[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="patient_name[]" style="width:150px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="age_sex[]" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="analyte_name[]" style="width:130px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="result[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="done_by[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="verified_by[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="remarks[]" style="width:150px; border:1px solid #ccc; padding:2px;"></td>
                `;
                tbody.appendChild(tr);
            }

            function clearIctDctMalariaFilters() {
                document.getElementById('HM_REG_004__from_date').value = '';
                document.getElementById('HM_REG_004__to_date').value = '';
                clearIctDctMalariaForm();
            }

            // AJAX Submit for REG-004
            (function() {
                function initIctDctMalariaForm() {
                    const formContainer = document.querySelector('[id="TDPL/HM/REG-004"]');
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

                                const tbody = document.getElementById('HM_REG_004__tbody');
                                if (tbody && result.data && result.data.length > 0) {
                                    tbody.innerHTML = '';

                                    result.data.forEach(row => {
                                        const tr = document.createElement('tr');
                                        tr.innerHTML = `
                                            <td style="border:1px solid #000; padding:2px;">
                                                <input type="hidden" name="row_id[]" value="${row.id}">
                                                <input type="date" name="check_date[]" value="${row.check_date || ''}" style="width:130px; border:1px solid #ccc; padding:2px;">
                                            </td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="sin_no[]" value="${row.sin_no || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="patient_name[]" value="${row.patient_name || ''}" style="width:150px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="age_sex[]" value="${row.age_sex || ''}" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="analyte_name[]" value="${row.analyte_name || ''}" style="width:130px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="result[]" value="${row.result || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="done_by[]" value="${row.done_by || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="verified_by[]" value="${row.verified_by || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="remarks[]" value="${row.remarks || ''}" style="width:150px; border:1px solid #ccc; padding:2px;"></td>
                                        `;
                                        tbody.appendChild(tr);
                                    });

                                    addEmptyRowREG004();
                                }
                            } else {
                                showToastREG004('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastREG004('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                function showToastREG004(type, message) {
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
                    document.addEventListener('DOMContentLoaded', initIctDctMalariaForm);
                } else {
                    initIctDctMalariaForm();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HM/REG-005"
        docNo="TDPL/HM/REG-005"
        docName="Erythrocyte Sedimentation Rate (ESR) Results Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.hm.forms.submit') }}">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="HM_REG_005__from_date"
                    onchange="loadEsrResultsData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="HM_REG_005__to_date"
                    onchange="loadEsrResultsData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearEsrResultsFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <div style="overflow-x:auto;">
            <table style="width:100%; border-collapse:collapse; font-size:14px;">
                <thead>
                    <tr style="text-align: center; font-weight: bold;">
                        <th style="border:1px solid #000; padding:6px;">S. No.</th>
                        <th style="border:1px solid #000; padding:6px;">Date</th>
                        <th style="border:1px solid #000; padding:6px;">SIN No</th>
                        <th style="border:1px solid #000; padding:6px;">ESR Start Time</th>
                        <th style="border:1px solid #000; padding:6px;">ESR End Time</th>
                        <th style="border:1px solid #000; padding:6px;">ESR Result</th>
                        <th style="border:1px solid #000; padding:6px;">Done By</th>
                        <th style="border:1px solid #000; padding:6px;">Verified By</th>
                    </tr>
                </thead>
                <tbody id="HM_REG_005__tbody">
                    <!-- Empty row for new entry -->
                    <tr>
                        <td style="border:1px solid #000; padding:2px; text-align:center;">1</td>
                        <td style="border:1px solid #000; padding:2px;"><input type="date" name="check_date[]" style="width:130px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="sin_no[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input type="time" name="esr_start_time[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input type="time" name="esr_end_time[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="esr_result[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="done_by[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="verified_by[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <script>
            // Load ESR Results records based on date range filters
            function loadEsrResultsData() {
                const fromDate = document.getElementById('HM_REG_005__from_date').value;
                const toDate = document.getElementById('HM_REG_005__to_date').value;

                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                fetch(`/newforms/hm/esr-results/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    const tbody = document.getElementById('HM_REG_005__tbody');
                    if (!tbody) return;

                    tbody.innerHTML = '';

                    if (!res.data || res.data.length === 0) {
                        addEmptyRowREG005(1);
                        return;
                    }

                    res.data.forEach((row, index) => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td style="border:1px solid #000; padding:2px; text-align:center;">${index + 1}</td>
                            <td style="border:1px solid #000; padding:2px;">
                                <input type="hidden" name="row_id[]" value="${row.id}">
                                <input type="date" name="check_date[]" value="${row.check_date || ''}" style="width:130px; border:1px solid #ccc; padding:2px;">
                            </td>
                            <td style="border:1px solid #000; padding:2px;"><input name="sin_no[]" value="${row.sin_no || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input type="time" name="esr_start_time[]" value="${row.esr_start_time || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input type="time" name="esr_end_time[]" value="${row.esr_end_time || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="esr_result[]" value="${row.esr_result || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="done_by[]" value="${row.done_by || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="verified_by[]" value="${row.verified_by || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                        `;
                        tbody.appendChild(tr);
                    });

                    addEmptyRowREG005(res.data.length + 1);
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function clearEsrResultsForm() {
                const tbody = document.getElementById('HM_REG_005__tbody');
                if (tbody) {
                    tbody.innerHTML = '';
                    addEmptyRowREG005(1);
                }
            }

            function addEmptyRowREG005(rowNum) {
                const tbody = document.getElementById('HM_REG_005__tbody');
                if (!tbody) return;

                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td style="border:1px solid #000; padding:2px; text-align:center;">${rowNum}</td>
                    <td style="border:1px solid #000; padding:2px;"><input type="date" name="check_date[]" style="width:130px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="sin_no[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input type="time" name="esr_start_time[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input type="time" name="esr_end_time[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="esr_result[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="done_by[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="verified_by[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                `;
                tbody.appendChild(tr);
            }

            function clearEsrResultsFilters() {
                document.getElementById('HM_REG_005__from_date').value = '';
                document.getElementById('HM_REG_005__to_date').value = '';
                clearEsrResultsForm();
            }

            // AJAX Submit for REG-005
            (function() {
                function initEsrResultsForm() {
                    const formContainer = document.querySelector('[id="TDPL/HM/REG-005"]');
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

                                const tbody = document.getElementById('HM_REG_005__tbody');
                                if (tbody && result.data && result.data.length > 0) {
                                    tbody.innerHTML = '';

                                    result.data.forEach((row, index) => {
                                        const tr = document.createElement('tr');
                                        tr.innerHTML = `
                                            <td style="border:1px solid #000; padding:2px; text-align:center;">${index + 1}</td>
                                            <td style="border:1px solid #000; padding:2px;">
                                                <input type="hidden" name="row_id[]" value="${row.id}">
                                                <input type="date" name="check_date[]" value="${row.check_date || ''}" style="width:130px; border:1px solid #ccc; padding:2px;">
                                            </td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="sin_no[]" value="${row.sin_no || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input type="time" name="esr_start_time[]" value="${row.esr_start_time || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input type="time" name="esr_end_time[]" value="${row.esr_end_time || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="esr_result[]" value="${row.esr_result || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="done_by[]" value="${row.done_by || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="verified_by[]" value="${row.verified_by || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                                        `;
                                        tbody.appendChild(tr);
                                    });

                                    addEmptyRowREG005(result.data.length + 1);
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
                    document.addEventListener('DOMContentLoaded', initEsrResultsForm);
                } else {
                    initEsrResultsForm();
                }
            })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/HM/REG-006"
        docNo="TDPL/HM/REG-006"
        docName="Body Fluids Examination Results Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.hm.forms.submit') }}">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="HM_REG_006__from_date"
                    onchange="loadBodyFluidsResultData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="HM_REG_006__to_date"
                    onchange="loadBodyFluidsResultData()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearBodyFluidsResultFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <div style="overflow-x:auto;">
            <table style="width:100%; border-collapse:collapse; font-size:14px;">
                <thead>
                    <tr style="text-align: center; font-weight: bold;">
                        <th style="border:1px solid #000; padding:6px;">Date</th>
                        <th style="border:1px solid #000; padding:6px;">SIN No</th>
                        <th style="border:1px solid #000; padding:6px;">Analyte Name</th>
                        <th style="border:1px solid #000; padding:6px;">Done By</th>
                        <th style="border:1px solid #000; padding:6px;">Verified By</th>
                        <th style="border:1px solid #000; padding:6px;">Remarks</th>
                    </tr>
                </thead>
                <tbody id="HM_REG_006__tbody">
                    <!-- Empty row for new entry -->
                    <tr>
                        <td style="border:1px solid #000; padding:2px;"><input type="date" name="check_date[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="sin_no[]" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="analyte_name[]" style="width:120px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="done_by[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="verified_by[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                        <td style="border:1px solid #000; padding:2px;"><input name="remarks[]" style="width:120px; border:1px solid #ccc; padding:2px;"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <script>
            // Load Body Fluids Examination Result records based on date range filters
            function loadBodyFluidsResultData() {
                const fromDate = document.getElementById('HM_REG_006__from_date').value;
                const toDate = document.getElementById('HM_REG_006__to_date').value;

                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                fetch(`/newforms/hm/body-fluids-examination-result/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    const tbody = document.getElementById('HM_REG_006__tbody');
                    if (!tbody) return;

                    tbody.innerHTML = '';

                    if (!res.data || res.data.length === 0) {
                        addEmptyRowREG006();
                        return;
                    }

                    res.data.forEach(row => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td style="border:1px solid #000; padding:2px;">
                                <input type="hidden" name="row_id[]" value="${row.id}">
                                <input type="date" name="check_date[]" value="${row.check_date || ''}" style="width:100%; border:1px solid #ccc; padding:2px;">
                            </td>
                            <td style="border:1px solid #000; padding:2px;"><input name="sin_no[]" value="${row.sin_no || ''}" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="analyte_name[]" value="${row.analyte_name || ''}" style="width:120px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="done_by[]" value="${row.done_by || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="verified_by[]" value="${row.verified_by || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                            <td style="border:1px solid #000; padding:2px;"><input name="remarks[]" value="${row.remarks || ''}" style="width:120px; border:1px solid #ccc; padding:2px;"></td>
                        `;
                        tbody.appendChild(tr);
                    });

                    addEmptyRowREG006();
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function clearBodyFluidsResultForm() {
                const tbody = document.getElementById('HM_REG_006__tbody');
                if (tbody) {
                    tbody.innerHTML = '';
                    addEmptyRowREG006();
                }
            }

            function addEmptyRowREG006() {
                const tbody = document.getElementById('HM_REG_006__tbody');
                if (!tbody) return;

                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td style="border:1px solid #000; padding:2px;"><input type="date" name="check_date[]" style="width:100%; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="sin_no[]" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="analyte_name[]" style="width:120px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="done_by[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="verified_by[]" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                    <td style="border:1px solid #000; padding:2px;"><input name="remarks[]" style="width:120px; border:1px solid #ccc; padding:2px;"></td>
                `;
                tbody.appendChild(tr);
            }

            function clearBodyFluidsResultFilters() {
                document.getElementById('HM_REG_006__from_date').value = '';
                document.getElementById('HM_REG_006__to_date').value = '';
                clearBodyFluidsResultForm();
            }

            // AJAX Submit for REG-006
            (function() {
                function initBodyFluidsResultForm() {
                    const formContainer = document.querySelector('[id="TDPL/HM/REG-006"]');
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
                                showToastREG006('success', result.message || 'Saved successfully!');

                                const tbody = document.getElementById('HM_REG_006__tbody');
                                if (tbody && result.data && result.data.length > 0) {
                                    tbody.innerHTML = '';

                                    result.data.forEach(row => {
                                        const tr = document.createElement('tr');
                                        tr.innerHTML = `
                                            <td style="border:1px solid #000; padding:2px;">
                                                <input type="hidden" name="row_id[]" value="${row.id}">
                                                <input type="date" name="check_date[]" value="${row.check_date || ''}" style="width:100%; border:1px solid #ccc; padding:2px;">
                                            </td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="sin_no[]" value="${row.sin_no || ''}" style="width:80px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="analyte_name[]" value="${row.analyte_name || ''}" style="width:120px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="done_by[]" value="${row.done_by || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="verified_by[]" value="${row.verified_by || ''}" style="width:100px; border:1px solid #ccc; padding:2px;"></td>
                                            <td style="border:1px solid #000; padding:2px;"><input name="remarks[]" value="${row.remarks || ''}" style="width:120px; border:1px solid #ccc; padding:2px;"></td>
                                        `;
                                        tbody.appendChild(tr);
                                    });

                                    addEmptyRowREG006();
                                }
                            } else {
                                showToastREG006('error', result.message || 'Failed to save');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastREG006('error', 'Failed to save. Please try again.');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });

                        return false;
                    });
                }

                function showToastREG006(type, message) {
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
                    document.addEventListener('DOMContentLoaded', initBodyFluidsResultForm);
                } else {
                    initBodyFluidsResultForm();
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
