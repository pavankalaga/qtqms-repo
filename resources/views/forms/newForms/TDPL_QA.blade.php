@extends('layouts.base')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QA</title>
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
            <div style="font-size: 20px; ">QA </div>

        </div>
        <div class="icon-view">
            <div class="pc-content">
                <div class="pc-folder" onclick="showSection('TDPL/QA/FOM-001')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Document Change Request Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/QA/FOM-004')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">List of Internal Auditors</span>
                </div>

                <div class="pc-folder" onclick="showSection('TDPL/QA/FOM-013')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label"> Annual IQ Audit Plan</span>
                </div>

                <div class="pc-folder" onclick="showSection('TDPL/QA/FOM-017')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Authorized Specimen-Signatures Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/QA/FOM-018')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Authorized Signatory List</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/QA/FOM-019')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Vaccination Procurement & Traceability Form</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/QA/REC-0##')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Employee Vaccination Records</span>
                </div>
            </div>
        </div>
    </div>


    <x-formTemplete
        id="TDPL/QA/FOM-001"
        docNo="TDPL/QA/FOM-001"
        docName="Document Change Request Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ url('/newforms/qa/forms/submit') }}"
        buttonText="Submit">

        {{-- ===== FILTER / SEARCH SECTION ===== --}}
        <div style="margin-bottom:15px; display:flex; gap:20px; align-items:center; flex-wrap:wrap;">
            <div>
                <strong>Requester Name:</strong>
                <input type="text" id="dcr_filter_name" style="border:1px solid #000; padding:5px; width:250px;"
                    placeholder="Type requester name">
            </div>
            <button type="button" onclick="loadDcrForm()"
                style="padding:6px 15px; background:#007bff; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                Search
            </button>
            <button type="button" onclick="clearDcrForm()"
                style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                Clear
            </button>
        </div>

        {{-- Hidden Form ID for create/update --}}
        <input type="hidden" name="form_id" id="dcr_form_id">

        <table style="width:100%; border-collapse: collapse;" border="1">
            <tbody>

                <!-- TITLE -->
                <tr>
                    <td colspan="7" style="text-align:center; padding:8px; font-weight:bold;">
                        DOCUMENT CHANGE REQUEST
                    </td>
                </tr>

                <!-- NAME & DEPT -->
                <tr>
                    <td colspan="4" style="padding:6px; font-weight:bold;">
                        Name and Designation of the person requesting the change:
                        <br>
                        <input type="text" name="requester_name" id="dcr_requester_name" style="width:100%; padding:4px;">
                    </td>

                    <td colspan="3" style="padding:6px;">
                        Department:
                        <br>
                        <input type="text" name="department" id="dcr_department" style="width:100%; padding:4px;">
                    </td>
                </tr>

                <!-- DOCUMENT TYPE + DOCUMENT DETAILS -->
                <tr>
                    <td colspan="4" style="padding:6px; font-weight:bold;">
                        Document Type requiring change:
                    </td>
                    <td colspan="3" rowspan="6" style="padding:6px;">
                        Document Name:
                        <br><input type="text" name="document_name" id="dcr_document_name" style="width:100%; padding:4px;">

                        <br><br>Document No.:
                        <br><input type="text" name="document_no" id="dcr_document_no" style="width:100%; padding:4px;">

                        <br><br>Page No.:
                        <br><input type="text" name="page_no" id="dcr_page_no" style="width:100%; padding:4px;">

                        <br><br>Clause/Entry No.:
                        <br><input type="text" name="clause_no" id="dcr_clause_no" style="width:100%; padding:4px;">
                    </td>
                </tr>

                <!-- DOCUMENT TYPE LOOP -->
                @foreach([
                'Management System Procedures',
                'Quality Manual',
                'Standard Operating Procedure',
                'Work Instruction',
                'Form / Record / Register'
                ] as $type)

                <tr>
                    <td colspan="2" style="padding:6px;">
                        {{ $type }}
                    </td>
                    <td colspan="2" style="padding:6px; text-align:center;">
                        <input type="checkbox" name="document_types[]" value="{{ $type }}">
                    </td>
                </tr>

                @endforeach

                <!-- NATURE OF CHANGE -->
                <tr>
                    <td colspan="7" style="padding:6px; font-weight:bold;">
                        Nature of Change Requested:
                        <textarea name="nature_of_change" id="dcr_nature_of_change" style="width:100%; height:120px; padding:6px;"></textarea>
                    </td>
                </tr>

                <!-- REASONS -->
                <tr>
                    <td colspan="7" style="padding:6px; font-weight:bold;">
                        Reason/s for Change:
                        <textarea name="reason_for_change" id="dcr_reason_for_change" style="width:100%; height:120px; padding:6px;"></textarea>
                    </td>
                </tr>

                <!-- PARTICULARS HEADER -->
                <tr>
                    <td colspan="3" style="padding:6px; font-weight:bold;">Particulars</td>
                    <td colspan="3" style="padding:6px; font-weight:bold;">Date</td>
                    <td style="padding:6px; font-weight:bold;">Signature</td>
                </tr>

                <!-- Request Approved / Rejected -->
                <tr>
                    <td colspan="3" style="padding:6px;">
                        Request Approved / Rejected
                        <br>
                        <label><input type="radio" name="request_status" value="Approved"> Approved</label>
                        &nbsp;&nbsp;
                        <label><input type="radio" name="request_status" value="Rejected"> Rejected</label>
                    </td>
                    <td colspan="3" style="padding:6px;">
                        <input type="date" name="request_status_date" id="dcr_request_status_date" style="width:100%; padding:4px;">
                    </td>
                    <td style="padding:6px;">
                        <input type="text" name="request_status_signature" id="dcr_request_status_signature" style="width:100%; padding:4px;">
                    </td>
                </tr>

                <!-- Approved By -->
                <tr>
                    <td colspan="3" style="padding:6px;">
                        Approved By
                        <br>
                        <input type="text" name="approved_by" id="dcr_approved_by" style="width:90%; padding:4px;">
                    </td>
                    <td colspan="3" style="padding:6px;">
                        <input type="date" name="approved_by_date" id="dcr_approved_by_date" style="width:100%; padding:4px;">
                    </td>
                    <td style="padding:6px;">
                        <input type="text" name="approved_by_signature" id="dcr_approved_by_signature" style="width:100%; padding:4px;">
                    </td>
                </tr>

                <!-- CURRENT / NEW VERSION -->
                <tr>
                    <td colspan="7" style="padding:6px;">
                        Current Version No & Date:
                        <input type="text" name="current_version" id="dcr_current_version" style="width:50%; padding:4px;">
                    </td>
                </tr>

                <tr>
                    <td colspan="7" style="padding:6px;">
                        New Version No & Date:
                        <input type="text" name="new_version" id="dcr_new_version" style="width:50%; padding:4px;">
                    </td>
                </tr>

                <!-- OTHER CHANGES -->
                <tr>
                    <td colspan="7" style="padding:6px; font-weight:bold;">
                        Other changes needed after approval:
                    </td>
                </tr>

                <!-- BULLET ITEMS -->
                @foreach([
                'Change the Version No. & Date and No. of Pages of the changed or amended section.',
                'Update the Version No and No of Pages in Table of contents.',
                'Retain one old copy for reference along with this DCR and stamp it obsolete.',
                'Update in Amendment Record Sheet and get approval from QM / HOD.',
                'Retrieve old copy of procedure and insert the new copy in Departmental Manual and / or QMS.'
                ] as $index => $change)

                <tr>
                    <td colspan="{{ $index < 3 ? 3 : 4 }}" style="padding:6px;">
                        <input type="checkbox" name="followup_changes[]" value="{{ $change }}">
                        {{ $change }}
                    </td>

                    @if($index == 0)
                    <td colspan="4"></td>
                    @elseif($index == 1)
                    <td colspan="4"></td>
                    @elseif($index == 2)
                    <td colspan="2"></td>
                    @elseif($index >= 3)
                    <td colspan="3"></td>
                    @endif

                </tr>

                @endforeach

            </tbody>
        </table>

        <script>
        /* =========================================================
         *  Document Change Request Form – Inline AJAX (FOM-001)
         * ========================================================= */
        var DCR_WRAPPER = document.getElementById('TDPL/QA/FOM-001');

        var DCR_TEXT_FIELDS = [
            'requester_name','department',
            'document_name','document_no','page_no','clause_no',
            'nature_of_change','reason_for_change',
            'request_status_date','request_status_signature',
            'approved_by','approved_by_date','approved_by_signature',
            'current_version','new_version'
        ];

        var DCR_RADIO_FIELDS = ['request_status'];
        var DCR_CHECKBOX_FIELDS = ['document_types','followup_changes'];

        function loadDcrForm() {
            var name = document.getElementById('dcr_filter_name').value.trim();
            if (!name) return;

            var url = "{{ url('/newforms/qa/dcr/load') }}?requester_name=" + encodeURIComponent(name);

            fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                .then(function(r) { return r.json(); })
                .then(function(res) {
                    clearDcrFields();
                    if (res.data) {
                        document.getElementById('dcr_form_id').value = res.data.id;

                        // Text / textarea / date fields
                        DCR_TEXT_FIELDS.forEach(function(f) {
                            var el = DCR_WRAPPER.querySelector('[name="' + f + '"]');
                            if (el && res.data[f] !== null && res.data[f] !== undefined) el.value = res.data[f];
                        });

                        // Radio buttons
                        DCR_RADIO_FIELDS.forEach(function(f) {
                            if (res.data[f]) {
                                var radio = DCR_WRAPPER.querySelector('input[name="' + f + '"][value="' + res.data[f] + '"]');
                                if (radio) radio.checked = true;
                            }
                        });

                        // Checkboxes (JSON arrays)
                        DCR_CHECKBOX_FIELDS.forEach(function(f) {
                            var arr = res.data[f];
                            if (!arr || !arr.length) return;
                            var boxes = DCR_WRAPPER.querySelectorAll('input[name="' + f + '[]"]');
                            boxes.forEach(function(cb) {
                                cb.checked = arr.indexOf(cb.value) !== -1;
                            });
                        });
                    } else {
                        document.getElementById('dcr_form_id').value = '';
                    }
                })
                .catch(function(err) { console.error('Load DCR error:', err); });
        }

        function clearDcrFields() {
            document.getElementById('dcr_form_id').value = '';

            DCR_TEXT_FIELDS.forEach(function(f) {
                var el = DCR_WRAPPER.querySelector('[name="' + f + '"]');
                if (el) el.value = '';
            });

            DCR_RADIO_FIELDS.forEach(function(f) {
                var radios = DCR_WRAPPER.querySelectorAll('input[name="' + f + '"]');
                radios.forEach(function(r) { r.checked = false; });
            });

            DCR_CHECKBOX_FIELDS.forEach(function(f) {
                var boxes = DCR_WRAPPER.querySelectorAll('input[name="' + f + '[]"]');
                boxes.forEach(function(cb) { cb.checked = false; });
            });
        }

        function clearDcrForm() {
            document.getElementById('dcr_filter_name').value = '';
            clearDcrFields();
        }

        function showToastDCR(msg, isError) {
            var t = document.getElementById('dcrToast');
            if (!t) {
                t = document.createElement('div');
                t.id = 'dcrToast';
                t.style.cssText = 'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-weight:600;transition:opacity .4s;';
                document.body.appendChild(t);
            }
            t.textContent = msg;
            t.style.background = isError ? '#dc3545' : '#28a745';
            t.style.opacity = '1';
            setTimeout(function() { t.style.opacity = '0'; }, 3000);
        }

        (function() {
            if (!DCR_WRAPPER) return;
            var form = DCR_WRAPPER.querySelector('form');
            if (!form) return;

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                var fd = new FormData(form);
                fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: fd
                })
                .then(function(r) { return r.json(); })
                .then(function(res) {
                    if (res.success) {
                        showToastDCR(res.message || 'Saved successfully');
                        if (res.form_id) {
                            document.getElementById('dcr_form_id').value = res.form_id;
                        }
                    } else {
                        showToastDCR(res.message || 'Save failed', true);
                    }
                })
                .catch(function(err) {
                    console.error('DCR submit error:', err);
                    showToastDCR('Network error', true);
                });
            });
        })();
        </script>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/QA/FOM-004"
        docNo="TDPL/QA/FOM-004"
        docName="List of Internal Auditors"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ url('/newforms/qa/forms/submit') }}"
        buttonText="Submit">

        {{-- Hidden Form ID for create/update --}}
        <input type="hidden" name="form_id" id="lia_form_id">

        <table border="1" style="width:100%; border-collapse:collapse; text-align:left;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">S. No.</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Name of the Auditor and Designation</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Qualification</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Affiliation (Internal/External)</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Training status (ISO 15189)</th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Training organization & duration</th>
                </tr>
            </thead>

            <tbody>
                @foreach([
                [
                'name' => 'Dr. Anusha K',
                'designation' => 'HoD Biochemistry',
                'qualification' => 'MD Biochemistry',
                'affiliation' => 'Internal',
                'training' => 'Trained on ISO 15189:2022',
                'details' => 'ISQM'
                ],
                [
                'name' => 'Dr. Sai Varun K',
                'designation' => 'Quality Manager',
                'qualification' => 'Ph.D. Biochemistry',
                'affiliation' => 'Internal',
                'training' => 'Trained on ISO 15189:2022',
                'details' => 'FQI'
                ],
                [
                'name' => 'Mr. Apparao P',
                'designation' => 'Lab Manager',
                'qualification' => 'M.Sc. Medical Biochemistry',
                'affiliation' => 'Internal',
                'training' => 'Trained on ISO 15189:2022',
                'details' => 'FQI'
                ]
                ] as $index => $auditor)
                <tr>
                    <td style="padding:6px; width:50px; text-align:center;">
                        {{ $index + 1 }}
                    </td>

                    <td style="padding:6px;">
                        <input type="text"
                            name="auditors[{{ $index }}][name]"
                            placeholder="Auditor Name"
                            value="{{ $auditor['name'] }}"
                            style="width:100%; padding:4px; margin-bottom:4px;">

                        <input type="text"
                            name="auditors[{{ $index }}][designation]"
                            placeholder="Designation"
                            value="{{ $auditor['designation'] }}"
                            style="width:100%; padding:4px;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text"
                            name="auditors[{{ $index }}][qualification]"
                            value="{{ $auditor['qualification'] }}"
                            style="width:100%; padding:4px;">
                    </td>

                    <td style="padding:6px;">
                        <select name="auditors[{{ $index }}][affiliation]"
                            style="width:100%; padding:4px;">
                            <option value="">Select</option>
                            <option value="Internal" {{ $auditor['affiliation'] === 'Internal' ? 'selected' : '' }}>Internal</option>
                            <option value="External" {{ $auditor['affiliation'] === 'External' ? 'selected' : '' }}>External</option>
                        </select>
                    </td>

                    <td style="padding:6px;">
                        <input type="text"
                            name="auditors[{{ $index }}][training]"
                            placeholder="Training status"
                            value="{{ $auditor['training'] }}"
                            style="width:100%; padding:4px;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text"
                            name="auditors[{{ $index }}][details]"
                            placeholder="Training organization & duration"
                            value="{{ $auditor['details'] }}"
                            style="width:100%; padding:4px;">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <p style="font-weight:bold; margin-top:20px;">Signatures:</p>

        <p>
            <strong>Prepared By:</strong>
            <input type="text" name="prepared_by" id="lia_prepared_by" style="width:250px; padding:4px; margin-left:10px;">

            &nbsp;&nbsp;&nbsp;

            <strong>Approved By:</strong>
            <input type="text" name="approved_by" id="lia_approved_by" style="width:250px; padding:4px; margin-left:10px;">
        </p>

        <p>
            <strong>Quality Manager:</strong>
            <input type="text" name="quality_manager" id="lia_quality_manager" style="width:250px; padding:4px; margin-left:10px;">

            &nbsp;&nbsp;&nbsp;

            <strong>Lab Director:</strong>
            <input type="text" name="lab_director" id="lia_lab_director" style="width:250px; padding:4px; margin-left:10px;">
        </p>

        <script>
        /* =========================================================
         *  List of Internal Auditors – AJAX save/load (FOM-004)
         * ========================================================= */
        (function() {
            var wrapper = document.getElementById('TDPL/QA/FOM-004');
            if (!wrapper) return;
            var form = wrapper.querySelector('form');
            if (!form) return;

            var LIA_SIG_FIELDS = ['prepared_by','approved_by','quality_manager','lab_director'];
            var AUDITOR_KEYS = ['name','designation','qualification','affiliation','training','details'];

            /* Populate auditor rows from saved JSON */
            function populateAuditors(arr) {
                if (!arr || !arr.length) return;
                arr.forEach(function(row, i) {
                    AUDITOR_KEYS.forEach(function(k) {
                        var el = wrapper.querySelector('[name="auditors[' + i + '][' + k + ']"]');
                        if (el && row[k] !== null && row[k] !== undefined) el.value = row[k];
                    });
                });
            }

            /* Load existing data on page init */
            function loadLiaData() {
                fetch("{{ url('/newforms/qa/internal-auditors/load') }}", {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(function(r) { return r.json(); })
                .then(function(res) {
                    if (res.data) {
                        document.getElementById('lia_form_id').value = res.data.id;
                        var aud = res.data.auditors;
                        if (typeof aud === 'string') aud = JSON.parse(aud);
                        populateAuditors(aud);
                        LIA_SIG_FIELDS.forEach(function(f) {
                            var el = wrapper.querySelector('[name="' + f + '"]');
                            if (el && res.data[f]) el.value = res.data[f];
                        });
                    }
                })
                .catch(function(err) { console.error('Load LIA error:', err); });
            }

            /* Toast */
            function showToastLIA(msg, isError) {
                var t = document.getElementById('liaToast');
                if (!t) {
                    t = document.createElement('div');
                    t.id = 'liaToast';
                    t.style.cssText = 'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-weight:600;transition:opacity .4s;';
                    document.body.appendChild(t);
                }
                t.textContent = msg;
                t.style.background = isError ? '#dc3545' : '#28a745';
                t.style.opacity = '1';
                setTimeout(function() { t.style.opacity = '0'; }, 3000);
            }

            /* AJAX Submit */
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                var fd = new FormData(form);
                fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: fd
                })
                .then(function(r) { return r.json(); })
                .then(function(res) {
                    if (res.success) {
                        showToastLIA(res.message || 'Saved successfully');
                        if (res.form_id) {
                            document.getElementById('lia_form_id').value = res.form_id;
                        }
                    } else {
                        showToastLIA(res.message || 'Save failed', true);
                    }
                })
                .catch(function(err) {
                    console.error('LIA submit error:', err);
                    showToastLIA('Network error', true);
                });
            });

            /* Auto-load on init */
            loadLiaData();
        })();
        </script>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/QA/FOM-013"
        docNo="TDPL/QA/FOM-013"
        docName="Annual IQ Audit Plan"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ route('newforms.qa.forms.submit') }}"
        buttonText="Submit">

        {{-- Filter Section --}}
        <div style="margin-bottom:15px; padding:10px; background:#f8f9fa; border:1px solid #ddd; border-radius:5px; display:flex; align-items:center; gap:10px; flex-wrap:wrap;">
            <label for="aap_plan_year" style="font-weight:bold;">Plan Year:</label>
            <input type="text" id="aap_plan_year" placeholder="e.g. 2024-2025" style="padding:5px 10px; border:1px solid #ccc; border-radius:4px; width:160px;">
            <button type="button" id="aap_search_btn" style="padding:5px 15px; background:#007bff; color:#fff; border:none; border-radius:4px; cursor:pointer;">Search</button>
            <button type="button" id="aap_clear_btn" style="padding:5px 15px; background:#6c757d; color:#fff; border:none; border-radius:4px; cursor:pointer;">Clear</button>
        </div>

        <input type="hidden" name="form_id" id="aap_form_id">
        <input type="hidden" name="plan_year" id="aap_plan_year_hidden">
        <input type="hidden" name="plan_data" id="aap_plan_data_hidden">

        <table id="aap_table" style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;">Department</th>

                    @foreach([
                    'Nov 2024','Dec 2024','Jan 2025','Feb 2025','Mar 2025',
                    'Apr 2025','May 2025','June 2025','July 2025','Aug 2025',
                    'Sep 2025','Oct 2025','Nov 2025'
                    ] as $month)
                    <th style="border:1px solid #000; padding:6px; text-align:center;">
                        <strong>{{ $month }}</strong>
                    </th>
                    @endforeach
                </tr>
            </thead>

            <tbody>
                @foreach([
                'Clinical Biochemistry',
                'Clinical Pathology',
                'Hematology',
                'Serology',
                'Molecular Biology',
                ] as $dept)
                <tr>
                    <td style="padding:6px; font-weight:bold;">{{ $dept }}</td>

                    @foreach([
                    'Nov 2024','Dec 2024','Jan 2025','Feb 2025','Mar 2025',
                    'Apr 2025','May 2025','June 2025','July 2025','Aug 2025',
                    'Sep 2025','Oct 2025','Nov 2025'
                    ] as $month)
                    <td style="padding:6px; text-align:center;">
                        <input type="text"
                               data-dept="{{ $dept }}"
                               data-month="{{ $month }}"
                               style="width:30px; text-align:center; border:none; font-weight:bold;">
                    </td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>

        <p>
            <strong>&#10003;</strong> - Completed;
            <strong>*</strong> - Planned
        </p>

        <script>
        (function(){
            const WRAPPER  = document.getElementById('TDPL/QA/FOM-013');
            const FORM     = WRAPPER.querySelector('form');
            const TABLE    = document.getElementById('aap_table');
            const YEAR_INP = document.getElementById('aap_plan_year');
            const YEAR_HID = document.getElementById('aap_plan_year_hidden');
            const DATA_HID = document.getElementById('aap_plan_data_hidden');
            const FORM_ID  = document.getElementById('aap_form_id');
            const SEARCH   = document.getElementById('aap_search_btn');
            const CLEAR    = document.getElementById('aap_clear_btn');

            /* ---- Collect grid data into JSON ---- */
            function collectGrid(){
                const data = {};
                TABLE.querySelectorAll('input[data-dept]').forEach(inp => {
                    const dept  = inp.getAttribute('data-dept');
                    const month = inp.getAttribute('data-month');
                    if(!data[dept]) data[dept] = {};
                    data[dept][month] = inp.value;
                });
                return data;
            }

            /* ---- Populate grid from JSON ---- */
            function populateGrid(data){
                TABLE.querySelectorAll('input[data-dept]').forEach(inp => {
                    const dept  = inp.getAttribute('data-dept');
                    const month = inp.getAttribute('data-month');
                    inp.value = (data && data[dept] && data[dept][month]) ? data[dept][month] : '';
                });
            }

            /* ---- Clear entire form ---- */
            function clearForm(){
                YEAR_INP.value = '';
                YEAR_HID.value = '';
                DATA_HID.value = '';
                FORM_ID.value  = '';
                TABLE.querySelectorAll('input[data-dept]').forEach(inp => inp.value = '');
            }

            /* ---- Load from server ---- */
            function loadPlan(planYear){
                let url = '/newforms/qa/annual-audit-plan/load';
                if(planYear) url += '?plan_year=' + encodeURIComponent(planYear);

                fetch(url, { headers: { 'Accept':'application/json' } })
                .then(r => r.json())
                .then(res => {
                    if(res.data){
                        FORM_ID.value  = res.data.id || '';
                        YEAR_INP.value = res.data.plan_year || '';
                        YEAR_HID.value = res.data.plan_year || '';
                        populateGrid(res.data.plan_data);
                        alert('Plan loaded successfully');
                    } else {
                        alert('No plan found' + (planYear ? ' for year: ' + planYear : ''));
                    }
                })
                .catch(err => { console.error(err); alert('Error loading plan'); });
            }

            /* ---- Search button ---- */
            SEARCH.addEventListener('click', function(){
                const yr = YEAR_INP.value.trim();
                if(!yr){ alert('Please enter a Plan Year to search'); return; }
                loadPlan(yr);
            });

            /* ---- Clear button ---- */
            CLEAR.addEventListener('click', clearForm);

            /* ---- AJAX submit ---- */
            FORM.addEventListener('submit', function(e){
                e.preventDefault();

                const yr = YEAR_INP.value.trim();
                if(!yr){ alert('Please enter a Plan Year before submitting'); return; }

                YEAR_HID.value = yr;
                DATA_HID.value = JSON.stringify(collectGrid());

                const fd = new FormData(FORM);

                fetch(FORM.action, {
                    method : 'POST',
                    headers: { 'X-Requested-With':'XMLHttpRequest' },
                    body   : fd
                })
                .then(r => r.json())
                .then(res => {
                    if(res.success){
                        FORM_ID.value = res.form_id;
                        alert(res.message);
                    } else {
                        alert(res.message || 'Error saving plan');
                    }
                })
                .catch(err => { console.error(err); alert('Error saving plan'); });
            });
        })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/QA/FOM-017"
        docNo="TDPL/QA/FOM-017"
        docName=" Authorized Specimen-Signatures Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ route('newforms.qa.forms.submit') }}"
        buttonText="Submit">

        <input type="hidden" name="form_id" id="ass_form_id">

        <div style="display:flex; gap:16px; margin-bottom:12px; flex-wrap:wrap; align-items:center;">
            <div>
                <strong>Month & Year:</strong>
                <input type="month" name="month_year" id="ass_month_year"
                       onchange="loadAuthorizedSignaturesData()"
                       style="border:1px solid #000; padding:4px;">
            </div>
            <div>
                <strong>Department:</strong>
                <input type="text" name="department" id="ass_department"
                       onchange="loadAuthorizedSignaturesData()"
                       onblur="loadAuthorizedSignaturesData()"
                       style="width:150px; border:1px solid #000; padding:4px;">
            </div>
            <div>
                <strong>Location:</strong>
                <input type="text" name="location" id="ass_location"
                       style="width:150px; border:1px solid #000; padding:4px;">
            </div>
            <div>
                <button type="button" onclick="clearAuthorizedSignaturesFormFull()" style="padding:5px 15px; background:#6c757d; color:#fff; border:none; border-radius:4px; cursor:pointer;">Clear</button>
            </div>
        </div>

        <table id="ass_table" style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>S. No.</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Employee Name</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Designation</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Full Signature</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Short Signature</strong></th>
                </tr>
            </thead>

            <tbody>
                @foreach(range(1, 15) as $i)
                <tr>
                    <td style="padding:6px; text-align:center;">
                        <input type="text" value="{{ $i }}" style="width:40px; border:none; text-align:center;" readonly>
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="employee_name[]" id="ass_employee_name_{{ $i }}" style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="designation[]" id="ass_designation_{{ $i }}" style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px; text-align:center;">
                        <input type="text" name="full_signature[]" id="ass_full_signature_{{ $i }}" style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px; text-align:center;">
                        <input type="text" name="short_signature[]" id="ass_short_signature_{{ $i }}" style="width:100%; border:none;">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <script>
        /* ---- Load Authorized Specimen-Signatures data ---- */
        function loadAuthorizedSignaturesData() {
            const monthYear = document.getElementById('ass_month_year').value;
            if (!monthYear) return;

            const params = new URLSearchParams();
            params.append('month_year', monthYear);
            const dept = document.getElementById('ass_department').value;
            if (dept) params.append('department', dept);

            fetch('/newforms/qa/authorized-signatures/load?' + params.toString(), {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.json())
            .then(res => {
                clearAuthorizedSignaturesForm();
                document.getElementById('ass_month_year').value = monthYear;
                if (dept) document.getElementById('ass_department').value = dept;

                if (!res.data) return;

                document.getElementById('ass_form_id').value = res.data.id || '';
                document.getElementById('ass_location').value = res.data.location || '';
                document.getElementById('ass_department').value = res.data.department || '';

                if (res.data.signatures && Array.isArray(res.data.signatures)) {
                    res.data.signatures.forEach(function(row, idx) {
                        var i = idx + 1;
                        var en = document.getElementById('ass_employee_name_' + i);
                        var dg = document.getElementById('ass_designation_' + i);
                        var fs = document.getElementById('ass_full_signature_' + i);
                        var ss = document.getElementById('ass_short_signature_' + i);
                        if (en) en.value = row.employee_name || '';
                        if (dg) dg.value = row.designation || '';
                        if (fs) fs.value = row.full_signature || '';
                        if (ss) ss.value = row.short_signature || '';
                    });
                }
            })
            .catch(function(error) { console.error('Error loading data:', error); });
        }

        /* ---- Clear form (data fields only, keeps filters) ---- */
        function clearAuthorizedSignaturesForm() {
            document.getElementById('ass_form_id').value = '';
            document.getElementById('ass_location').value = '';
            for (var i = 1; i <= 15; i++) {
                document.getElementById('ass_employee_name_' + i).value = '';
                document.getElementById('ass_designation_' + i).value = '';
                document.getElementById('ass_full_signature_' + i).value = '';
                document.getElementById('ass_short_signature_' + i).value = '';
            }
        }

        /* ---- Clear everything including filters ---- */
        function clearAuthorizedSignaturesFormFull() {
            document.getElementById('ass_month_year').value = '';
            document.getElementById('ass_department').value = '';
            clearAuthorizedSignaturesForm();
        }

        /* ---- Toast notification ---- */
        function showToastFOM017(type, message) {
            var existing = document.querySelector('.qa-toast-fom017');
            if (existing) existing.remove();
            var toast = document.createElement('div');
            toast.className = 'qa-toast-fom017';
            toast.style.cssText = 'position:fixed; top:20px; right:20px; padding:15px 25px; border-radius:5px; color:white; font-weight:bold; z-index:9999; background-color:' + (type === 'success' ? '#28a745' : '#dc3545') + ';';
            toast.textContent = message;
            document.body.appendChild(toast);
            setTimeout(function() { toast.remove(); }, 3000);
        }

        /* ---- AJAX submit ---- */
        (function() {
            function initAuthorizedSignaturesForm() {
                var formContainer = document.querySelector('[id="TDPL/QA/FOM-017"]');
                var form = formContainer.querySelector('form');
                if (!form || form.dataset.ajaxBound === 'true') return;
                form.dataset.ajaxBound = 'true';

                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    var formData = new FormData(form);
                    var submitBtn = form.querySelector('button[type="submit"]');
                    var originalText = submitBtn.textContent;

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
                    .then(function(response) { return response.json(); })
                    .then(function(result) {
                        if (result.success) {
                            if (result.form_id) document.getElementById('ass_form_id').value = result.form_id;
                            showToastFOM017('success', result.message || 'Saved successfully!');
                        } else {
                            showToastFOM017('error', result.message || 'Failed to save');
                        }
                    })
                    .catch(function(error) {
                        console.error('Error:', error);
                        showToastFOM017('error', 'Failed to save. Please try again.');
                    })
                    .finally(function() {
                        submitBtn.textContent = originalText;
                        submitBtn.disabled = false;
                    });
                });
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initAuthorizedSignaturesForm);
            } else {
                initAuthorizedSignaturesForm();
            }
        })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/QA/FOM-018"
        docNo="TDPL/QA/FOM-018"
        docName="Authorized Signatory List"
        issueNo="2.0"
        issueDate="01/10/2024"
        action="{{ route('newforms.qa.forms.submit') }}"
        buttonText="Submit">

        <input type="hidden" name="form_id" id="asl_form_id">

        <table id="asl_table" style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>S. No.</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Laboratory/ Department/ Section</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Name & Designation of Signatory</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Qualification with Specialization</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Experience (Years)</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Relevant Training</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Part time / Full time</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Authorized Area of Testing</strong></th>
                    <th style="border:1px solid #000; padding:6px; text-align:center;"><strong>Specimen Signature</strong></th>
                </tr>
            </thead>

            <tbody>
                @foreach([
                ['id' => 1, 'dept' => 'Biochemistry'],
                ['id' => 2, 'dept' => 'Hematology & Clinical Pathology'],
                ['id' => 3, 'dept' => 'Histopathology'],
                ['id' => 4, 'dept' => 'Serology & Microbiology'],
                ['id' => 5, 'dept' => 'Molecular Biology'],
                ] as $row)
                <tr>
                    <td style="padding:6px; text-align:center;">
                        <input type="text" value="{{ $row['id'] }}" style="width:40px; border:none; text-align:center;" readonly>
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="dept[]" id="asl_dept_{{ $row['id'] }}" value="{{ $row['dept'] }}" style="width:100%; border:none; font-weight:bold;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="signatory_name[]" id="asl_signatory_name_{{ $row['id'] }}" style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="qualification[]" id="asl_qualification_{{ $row['id'] }}" style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="experience[]" id="asl_experience_{{ $row['id'] }}" style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="training[]" id="asl_training_{{ $row['id'] }}" style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px; text-align:center;">
                        <select name="worktype[]" id="asl_worktype_{{ $row['id'] }}" style="width:100%; border:none;">
                            <option value=""></option>
                            <option value="Part Time">Part Time</option>
                            <option value="Full Time">Full Time</option>
                        </select>
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="authorized_area[]" id="asl_authorized_area_{{ $row['id'] }}" style="width:100%; border:none;">
                    </td>

                    <td style="padding:6px;">
                        <input type="text" name="specimen_signature[]" id="asl_specimen_signature_{{ $row['id'] }}" style="width:100%; border:none;">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <script>
        (function(){
            var WRAPPER = document.getElementById('TDPL/QA/FOM-018');
            var FORM    = WRAPPER.querySelector('form');

            /* ---- Auto-load latest record on page init ---- */
            fetch('/newforms/qa/authorized-signatory-list/load', {
                headers: { 'Accept': 'application/json' }
            })
            .then(function(r){ return r.json(); })
            .then(function(res){
                if(!res.data) return;
                document.getElementById('asl_form_id').value = res.data.id || '';

                if(res.data.signatories && Array.isArray(res.data.signatories)){
                    res.data.signatories.forEach(function(row, idx){
                        var i = idx + 1;
                        var dp = document.getElementById('asl_dept_' + i);
                        var sn = document.getElementById('asl_signatory_name_' + i);
                        var qu = document.getElementById('asl_qualification_' + i);
                        var ex = document.getElementById('asl_experience_' + i);
                        var tr = document.getElementById('asl_training_' + i);
                        var wt = document.getElementById('asl_worktype_' + i);
                        var aa = document.getElementById('asl_authorized_area_' + i);
                        var ss = document.getElementById('asl_specimen_signature_' + i);

                        if(dp && row.dept) dp.value = row.dept;
                        if(sn) sn.value = row.signatory_name || '';
                        if(qu) qu.value = row.qualification || '';
                        if(ex) ex.value = row.experience || '';
                        if(tr) tr.value = row.training || '';
                        if(wt) wt.value = row.worktype || '';
                        if(aa) aa.value = row.authorized_area || '';
                        if(ss) ss.value = row.specimen_signature || '';
                    });
                }
            })
            .catch(function(err){ console.error('Error loading data:', err); });

            /* ---- Toast notification ---- */
            function showToastFOM018(type, message) {
                var existing = document.querySelector('.qa-toast-fom018');
                if (existing) existing.remove();
                var toast = document.createElement('div');
                toast.className = 'qa-toast-fom018';
                toast.style.cssText = 'position:fixed; top:20px; right:20px; padding:15px 25px; border-radius:5px; color:white; font-weight:bold; z-index:9999; background-color:' + (type === 'success' ? '#28a745' : '#dc3545') + ';';
                toast.textContent = message;
                document.body.appendChild(toast);
                setTimeout(function() { toast.remove(); }, 3000);
            }

            /* ---- AJAX submit ---- */
            FORM.addEventListener('submit', function(e){
                e.preventDefault();

                var fd = new FormData(FORM);
                var submitBtn = FORM.querySelector('button[type="submit"]');
                var originalText = submitBtn.textContent;

                submitBtn.textContent = 'Saving...';
                submitBtn.disabled = true;

                fetch(FORM.action, {
                    method: 'POST',
                    headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' },
                    body: fd
                })
                .then(function(r){ return r.json(); })
                .then(function(res){
                    if(res.success){
                        if(res.form_id) document.getElementById('asl_form_id').value = res.form_id;
                        showToastFOM018('success', res.message || 'Saved successfully!');
                    } else {
                        showToastFOM018('error', res.message || 'Failed to save');
                    }
                })
                .catch(function(err){ console.error(err); showToastFOM018('error', 'Failed to save. Please try again.'); })
                .finally(function(){
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                });
            });
        })();
        </script>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/QA/FOM-019"
        docNo="TDPL/QA/FOM-019"
        docName="Vaccination Procurement & Traceability Form"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.qa.forms.submit') }}">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>From Date</strong></label>
                <input type="date" id="vpFromDate" name="vpFromDate"
                    onchange="loadVaccinationProcurement()" oninput="loadVaccinationProcurement()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div>
                <label><strong>To Date</strong></label>
                <input type="date" id="vpToDate"
                    onchange="loadVaccinationProcurement()" oninput="loadVaccinationProcurement()"
                    style="border:1px solid #000; padding:4px; width:140px; display:block;">
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearVaccinationProcurementFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <table style="width:100%; border-collapse:collapse;" border="1">
            <thead>
                <tr>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Date of Purchase</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Name of Vaccine</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Vaccine Manufacturer Name</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Vaccine Purchased from (Supplier Name)</td>
                    <td style="padding:6px; border:1px solid #000; font-weight:bold;">Lot No.</td>
                </tr>
            </thead>
            <tbody id="vpTableBody">
                <tr>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_purchase_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_vaccine_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_manufacturer_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_supplier_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_lot_no[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                </tr>
            </tbody>
        </table>

        <script>
            function loadVaccinationProcurement() {
                const fromDate = document.getElementById('vpFromDate').value;
                const toDate = document.getElementById('vpToDate').value;

                if (!fromDate && !toDate) return;

                const params = new URLSearchParams();
                if (fromDate) params.append('from_date', fromDate);
                if (toDate) params.append('to_date', toDate);

                fetch(`/newforms/qa/vaccination-procurement/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    const tbody = document.getElementById('vpTableBody');
                    if (!tbody) return;

                    tbody.innerHTML = '';

                    if (!res.data || res.data.length === 0) {
                        showToastFOM019('info', 'No records found. You can add new entries below.');
                        addEmptyRowFOM019();
                        return;
                    }

                    showToastFOM019('success', res.data.length + ' record(s) loaded.');
                    res.data.forEach(row => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = buildFOM019RowHTML(row);
                        tbody.appendChild(tr);
                    });

                    addEmptyRowFOM019();
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function buildFOM019RowHTML(row) {
                return `
                    <td style="border:1px solid #000; padding:4px;">
                        <input type="hidden" name="row_id[]" value="${row.id}">
                        <input type="date" name="row_purchase_date[]" value="${row.purchase_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
                    </td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_vaccine_name[]" value="${row.vaccine_name || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_manufacturer_name[]" value="${row.manufacturer_name || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_supplier_name[]" value="${row.supplier_name || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_lot_no[]" value="${row.lot_no || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                `;
            }

            function addEmptyRowFOM019() {
                const tbody = document.getElementById('vpTableBody');
                if (!tbody) return;

                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_purchase_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_vaccine_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_manufacturer_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_supplier_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_lot_no[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                `;
                tbody.appendChild(tr);
            }

            function clearVaccinationProcurementFilters() {
                document.getElementById('vpFromDate').value = '';
                document.getElementById('vpToDate').value = '';
                const tbody = document.getElementById('vpTableBody');
                if (tbody) {
                    tbody.innerHTML = '';
                    addEmptyRowFOM019();
                }
            }

            // AJAX Submit for FOM-019
            (function() {
                function initVaccinationProcurementForm() {
                    const formContainer = document.querySelector('[id="TDPL/QA/FOM-019"]');
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
                                showToastFOM019('success', result.message || 'Saved successfully!');

                                const tbody = document.getElementById('vpTableBody');
                                if (tbody && result.data && result.data.length > 0) {
                                    tbody.innerHTML = '';
                                    result.data.forEach(row => {
                                        const tr = document.createElement('tr');
                                        tr.innerHTML = buildFOM019RowHTML(row);
                                        tbody.appendChild(tr);
                                    });
                                    addEmptyRowFOM019();
                                }
                            } else {
                                showToastFOM019('error', result.message || 'Save failed!');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastFOM019('error', 'Failed to save data');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });
                    });
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initVaccinationProcurementForm);
                } else {
                    initVaccinationProcurementForm();
                }
            })();

            function showToastFOM019(type, message) {
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
        id="TDPL/QA/REC-0##"
        docNo="TDPL/HR/FOM-036"
        docName="Employee Vaccination Records"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.qa.forms.submit') }}">

        <!-- Filter Section -->
        <div style="margin-bottom:15px; display:flex; gap:15px; align-items:flex-end; flex-wrap:wrap;">
            <div>
                <label><strong>Department</strong></label>
                <input type="text" id="evrDepartment" list="evrDeptList"
                    onchange="loadEmployeeVaccinationRecords()" onblur="loadEmployeeVaccinationRecords()"
                    style="border:1px solid #000; padding:4px; width:180px; display:block;" placeholder="Select or type">
                <datalist id="evrDeptList">
                    <option value="Microbiology">
                    <option value="Biochemistry">
                    <option value="Pathology">
                    <option value="Hematology">
                    <option value="Serology">
                </datalist>
            </div>
            <div>
                <label><strong>Status</strong></label>
                <select id="evrStatus" onchange="loadEmployeeVaccinationRecords()"
                    style="border:1px solid #000; padding:4px; width:180px; display:block;">
                    <option value="">All</option>
                    <option value="Responder">Responder</option>
                    <option value="Non-Responder">Non-Responder</option>
                    <option value="Hypo-Responder">Hypo-Responder</option>
                </select>
            </div>
            <div style="display:flex; align-items:flex-end;">
                <button type="button" onclick="clearEvrFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- Data Table -->
        <table border="1" style="width:100%; border-collapse:collapse; text-align:left;">
            <thead>
                <tr>
                    <td rowspan="3" style="padding:6px; border:1px solid #000;"><strong>S.No</strong></td>
                    <td style="padding:6px; border:1px solid #000;"><strong>&nbsp;</strong></td>
                    <td rowspan="3" style="padding:6px; border:1px solid #000;"><strong>NAME OF THE STAFF</strong></td>
                    <td rowspan="3" style="padding:6px; border:1px solid #000;"><strong>DEPARTMENT</strong></td>
                    <td rowspan="3" style="padding:6px; border:1px solid #000;"><strong>DESIGNATION</strong></td>

                    <td colspan="11" style="padding:6px; text-align:center; border:1px solid #000;"><strong>HEPATITIS B VACCINE</strong></td>

                    <td rowspan="3" style="padding:6px; border:1px solid #000;"><strong>ANTI HBS TITRE (mIU/ml)</strong></td>
                    <td rowspan="3" style="padding:6px; border:1px solid #000;"><strong>STATUS (Responder / Non-Responder / Hypo-Responder)</strong></td>
                    <td rowspan="3" style="padding:6px; border:1px solid #000;"><strong>SIGNATURE OF MICROBIOLOGIST / ICO</strong></td>
                </tr>

                <tr>
                    <td style="padding:6px; border:1px solid #000;"><strong>Emp ID</strong></td>

                    <td colspan="3" style="padding:6px; text-align:center; border:1px solid #000;"><strong>I DOSE</strong></td>
                    <td colspan="5" style="padding:6px; text-align:center; border:1px solid #000;"><strong>II DOSE</strong></td>
                    <td colspan="3" style="padding:6px; text-align:center; border:1px solid #000;"><strong>III DOSE</strong></td>
                </tr>

                <tr>
                    <td style="padding:6px; border:1px solid #000;"><strong>&nbsp;</strong></td>

                    <td style="padding:6px; border:1px solid #000;"><strong>Due on</strong></td>
                    <td style="padding:6px; border:1px solid #000;"><strong>Given on</strong></td>
                    <td style="padding:6px; border:1px solid #000;"><strong>Lot No</strong></td>

                    <td style="padding:6px; border:1px solid #000;"><strong>Due on</strong></td>
                    <td colspan="2" style="padding:6px; border:1px solid #000;"><strong>Given on</strong></td>
                    <td colspan="2" style="padding:6px; border:1px solid #000;"><strong>Lot No</strong></td>

                    <td style="padding:6px; border:1px solid #000;"><strong>Due on</strong></td>
                    <td style="padding:6px; border:1px solid #000;"><strong>Given on</strong></td>
                    <td style="padding:6px; border:1px solid #000;"><strong>Lot No</strong></td>
                </tr>
            </thead>
            <tbody id="evrTableBody">
                <tr>
                    <td style="border:1px solid #000; padding:4px; text-align:center;"><strong>1</strong></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_emp_id[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_department[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_designation[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_dose1_due[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_dose1_given[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_dose1_lot[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_dose2_due[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td colspan="2" style="border:1px solid #000; padding:4px;"><input type="date" name="row_dose2_given[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td colspan="2" style="border:1px solid #000; padding:4px;"><input name="row_dose2_lot[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_dose3_due[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_dose3_given[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_dose3_lot[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_titre[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;">
                        <select name="row_status[]" style="width:100%; border:1px solid #ccc; padding:4px;">
                            <option value="">--</option>
                            <option value="Responder">Responder</option>
                            <option value="Non-Responder">Non-Responder</option>
                            <option value="Hypo-Responder">Hypo-Responder</option>
                        </select>
                    </td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_signature[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="19" style="padding:6px; border:1px solid #000;">* Minimum Interval between 1 and 2 dose should be 4 weeks</td>
                </tr>
                <tr>
                    <td colspan="19" style="padding:6px; border:1px solid #000;">* Minimum Interval between 2 and 3 dose should be __ weeks</td>
                </tr>
                <tr>
                    <td colspan="19" style="padding:6px; border:1px solid #000;">* Anti HBs titre to be checked 8 weeks after the third dose</td>
                </tr>
                <tr>
                    <td colspan="19" style="padding:6px; border:1px solid #000;">* Responder – Anti HBs titre > 100 mIU/ml</td>
                </tr>
                <tr>
                    <td colspan="19" style="padding:6px; border:1px solid #000;">* Hypo Responder – Anti HBs titre 10 - 100 mIU/ml</td>
                </tr>
                <tr>
                    <td colspan="19" style="padding:6px; border:1px solid #000;">* Non-Responder – Anti HBs titre &lt; 10 mIU/ml</td>
                </tr>
            </tfoot>
        </table>

        <script>
            var evrRowCounter = 1;

            function loadEmployeeVaccinationRecords() {
                const department = document.getElementById('evrDepartment').value;
                const status = document.getElementById('evrStatus').value;

                if (!department && !status) return;

                const params = new URLSearchParams();
                if (department) params.append('department', department);
                if (status) params.append('status', status);

                fetch(`/newforms/qa/employee-vaccination-records/load?${params.toString()}`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(res => {
                    const tbody = document.getElementById('evrTableBody');
                    if (!tbody) return;

                    tbody.innerHTML = '';
                    evrRowCounter = 0;

                    if (!res.data || res.data.length === 0) {
                        showToastFOM036('info', 'No records found. You can add new entries below.');
                        addEmptyRowFOM036();
                        return;
                    }

                    showToastFOM036('success', res.data.length + ' record(s) loaded.');
                    res.data.forEach(row => {
                        evrRowCounter++;
                        const tr = document.createElement('tr');
                        tr.innerHTML = buildFOM036RowHTML(row, evrRowCounter);
                        tbody.appendChild(tr);
                    });

                    addEmptyRowFOM036();
                })
                .catch(error => console.error('Error loading data:', error));
            }

            function buildFOM036RowHTML(row, sno) {
                const statusOptions = ['', 'Responder', 'Non-Responder', 'Hypo-Responder'];
                let statusSelect = '<select name="row_status[]" style="width:100%; border:1px solid #ccc; padding:4px;">';
                statusOptions.forEach(opt => {
                    const label = opt || '--';
                    const selected = (row.status === opt) ? ' selected' : '';
                    statusSelect += `<option value="${opt}"${selected}>${label}</option>`;
                });
                statusSelect += '</select>';

                return `
                    <td style="border:1px solid #000; padding:4px; text-align:center;">
                        <input type="hidden" name="row_id[]" value="${row.id}">
                        <strong>${sno}</strong>
                    </td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_emp_id[]" value="${row.emp_id || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_name[]" value="${row.name || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_department[]" value="${row.department || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_designation[]" value="${row.designation || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_dose1_due[]" value="${row.dose1_due || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_dose1_given[]" value="${row.dose1_given || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_dose1_lot[]" value="${row.dose1_lot || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_dose2_due[]" value="${row.dose2_due || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td colspan="2" style="border:1px solid #000; padding:4px;"><input type="date" name="row_dose2_given[]" value="${row.dose2_given || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td colspan="2" style="border:1px solid #000; padding:4px;"><input name="row_dose2_lot[]" value="${row.dose2_lot || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_dose3_due[]" value="${row.dose3_due || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_dose3_given[]" value="${row.dose3_given || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_dose3_lot[]" value="${row.dose3_lot || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_titre[]" value="${row.titre || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;">${statusSelect}</td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_signature[]" value="${row.signature || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                `;
            }

            function addEmptyRowFOM036() {
                const tbody = document.getElementById('evrTableBody');
                if (!tbody) return;

                evrRowCounter++;
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td style="border:1px solid #000; padding:4px; text-align:center;"><strong>${evrRowCounter}</strong></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_emp_id[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_name[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_department[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_designation[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_dose1_due[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_dose1_given[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_dose1_lot[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_dose2_due[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td colspan="2" style="border:1px solid #000; padding:4px;"><input type="date" name="row_dose2_given[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td colspan="2" style="border:1px solid #000; padding:4px;"><input name="row_dose2_lot[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_dose3_due[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input type="date" name="row_dose3_given[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_dose3_lot[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_titre[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                    <td style="border:1px solid #000; padding:4px;">
                        <select name="row_status[]" style="width:100%; border:1px solid #ccc; padding:4px;">
                            <option value="">--</option>
                            <option value="Responder">Responder</option>
                            <option value="Non-Responder">Non-Responder</option>
                            <option value="Hypo-Responder">Hypo-Responder</option>
                        </select>
                    </td>
                    <td style="border:1px solid #000; padding:4px;"><input name="row_signature[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>
                `;
                tbody.appendChild(tr);
            }

            function clearEvrFilters() {
                document.getElementById('evrDepartment').value = '';
                document.getElementById('evrStatus').value = '';
                const tbody = document.getElementById('evrTableBody');
                if (tbody) {
                    tbody.innerHTML = '';
                    evrRowCounter = 0;
                    addEmptyRowFOM036();
                }
            }

            // AJAX Submit for FOM-036
            (function() {
                function initEmployeeVaccinationForm() {
                    const formContainer = document.querySelector('[id="TDPL/QA/REC-0##"]');
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

                                const tbody = document.getElementById('evrTableBody');
                                if (tbody && result.data && result.data.length > 0) {
                                    tbody.innerHTML = '';
                                    evrRowCounter = 0;
                                    result.data.forEach(row => {
                                        evrRowCounter++;
                                        const tr = document.createElement('tr');
                                        tr.innerHTML = buildFOM036RowHTML(row, evrRowCounter);
                                        tbody.appendChild(tr);
                                    });
                                    addEmptyRowFOM036();
                                }
                            } else {
                                showToastFOM036('error', result.message || 'Save failed!');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            showToastFOM036('error', 'Failed to save data');
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });
                    });
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initEmployeeVaccinationForm);
                } else {
                    initEmployeeVaccinationForm();
                }
            })();

            function showToastFOM036(type, message) {
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