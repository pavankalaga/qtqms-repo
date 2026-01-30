@extends('layouts.base')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MB</title>
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
            <div style="font-size: 20px; ">MB </div>

        </div>
        <div class="icon-view">
            <div class="pc-content">
                <div class="pc-folder" onclick="showSection('TDPL/MB/REG-001')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Molecular Biology Work Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MB/REG-002')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label"> Master Mix Preparation Register</span>
                </div>
                <div class="pc-folder" onclick="showSection('TDPL/MB/REG-003')">
                    <i class="fa-solid fa-file-signature pc-folder-icon"></i>
                    <span class="pc-folder-label">Nucleic Acid Extraction Register</span>
                </div>



            </div>
        </div>
    </div>


    <x-formTemplete
        id="TDPL/MB/REG-001"
        docNo="TDPL/MB/REG-001"
        docName="Molecular Biology Work Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.mb.forms.submit') }}">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MB_REG_001__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadREG001Data()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MB_REG_001__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadREG001Data()">
            </div>
            <div>
                <button type="button" onclick="clearREG001MBFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse: collapse; font-size:14px;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px;">Date</th>
                    <th style="border:1px solid #000; padding:6px;">Barcode</th>
                    <th style="border:1px solid #000; padding:6px;">Patient Name</th>
                    <th style="border:1px solid #000; padding:6px;">Age/Gender</th>
                    <th style="border:1px solid #000; padding:6px;">Investigation</th>
                    <th style="border:1px solid #000; padding:6px;">Sample Type</th>
                    <th style="border:1px solid #000; padding:6px;">Sample Received Date/Time</th>
                    <th style="border:1px solid #000; padding:6px;">Sample Received By</th>
                    <th style="border:1px solid #000; padding:6px;">Sample Processing Date/Time</th>
                    <th style="border:1px solid #000; padding:6px;">Sample Processed By</th>
                    <th style="border:1px solid #000; padding:6px;">Observations</th>
                    <th style="border:1px solid #000; padding:6px;">HoD Signature</th>
                </tr>
            </thead>
            <tbody id="MB_REG_001__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>

    <x-formTemplete
        id="TDPL/MB/REG-002"
        docNo="TDPL/MB/REG-002"
        docName="Master Mix Preparation Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.mb.forms.submit') }}">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MB_REG_002__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadREG002Data()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MB_REG_002__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadREG002Data()">
            </div>
            <div>
                <button type="button" onclick="clearREG002MBFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse: collapse; font-size:14px;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px;">Date</th>
                    <th style="border:1px solid #000; padding:6px;">Time</th>
                    <th style="border:1px solid #000; padding:6px;">Kit Name & Lot No</th>
                    <th style="border:1px solid #000; padding:6px;">Batch Number</th>
                    <th style="border:1px solid #000; padding:6px;">No. of Reactions</th>
                    <th style="border:1px solid #000; padding:6px;">Reagent Name & Components</th>
                    <th style="border:1px solid #000; padding:6px;">Total Reaction Volume</th>
                    <th style="border:1px solid #000; padding:6px;">Prepared By</th>
                    <th style="border:1px solid #000; padding:6px;">Remarks</th>
                </tr>
            </thead>
            <tbody id="MB_REG_002__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>
    <x-formTemplete
        id="TDPL/MB/REG-003"
        docNo="TDPL/MB/REG-003"
        docName="Nucleic Acid Extraction Register"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.mb.forms.submit') }}">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="MB_REG_003__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadREG003Data()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="MB_REG_003__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadREG003Data()">
            </div>
            <div>
                <button type="button" onclick="clearREG003MBFilters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table border="1" style="width:100%; border-collapse: collapse; font-size:14px;">
            <thead>
                <tr>
                    <th style="border:1px solid #000; padding:6px;">Date</th>
                    <th style="border:1px solid #000; padding:6px;">Time of Sample Receipt</th>
                    <th style="border:1px solid #000; padding:6px;">Extraction Kit Lot No.</th>
                    <th style="border:1px solid #000; padding:6px;">Total Number of Samples</th>
                    <th style="border:1px solid #000; padding:6px;">Sample Barcode</th>
                    <th style="border:1px solid #000; padding:6px;">Performed By (Name & Sign)</th>
                    <th style="border:1px solid #000; padding:6px;">Verified By</th>
                    <th style="border:1px solid #000; padding:6px;">Remarks</th>
                </tr>
            </thead>
            <tbody id="MB_REG_003__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

    </x-formTemplete>

</body>
<script>
    function showSection(sectionId) {
        const sections = document.querySelectorAll('.main');
        sections.forEach(section => section.classList.add('inactive'));

        const selectedSection = document.getElementById(sectionId);
        selectedSection.classList.remove('inactive');
        selectedSection.classList.add('active');
    }

    function goBack() {
        const sections = document.querySelectorAll('.main');
        sections.forEach(section => {
            section.classList.remove('active');
            section.classList.add('inactive');
        });
        document.querySelector('.icon-view').parentElement.classList.remove('inactive');
    }

    /* ===================================================
       REG-001 – Molecular Biology Work Register (Row-based)
       Like LO FOM-006 / HP FOM-004: From/To date, dynamic rows
       =================================================== */

    const MB_REG001_FIELDS = ['barcode','patient_name','age_gender','investigation','sample_type',
        'sample_received_datetime','sample_received_by','sample_processing_datetime','sample_processed_by','observations','hod_signature'];

    // ---- Build row HTML from loaded data ----
    function buildMBREG001RowHTML(row) {
        let html = `<td style="border:1px solid #000; padding:4px;">
            <input type="hidden" name="row_id[]" value="${row.id}">
            <input type="date" name="row_date[]" value="${row.row_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
        </td>`;
        MB_REG001_FIELDS.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" value="${row[f] || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        return html;
    }

    // ---- Add empty row (dynamic) ----
    function addEmptyRowMBREG001() {
        const tbody = document.getElementById('MB_REG_001__tbody');
        if (!tbody) return;

        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        MB_REG001_FIELDS.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    // ---- Clear form ----
    function clearMBREG001Form() {
        const tbody = document.getElementById('MB_REG_001__tbody');
        if (tbody) {
            tbody.innerHTML = '';
            addEmptyRowMBREG001();
        }
    }

    // ---- Clear filters + form ----
    function clearREG001MBFilters() {
        document.getElementById('MB_REG_001__from_date').value = '';
        document.getElementById('MB_REG_001__to_date').value = '';
        clearMBREG001Form();
    }

    // ---- Load data from server ----
    function loadREG001Data() {
        const fromDate = document.getElementById('MB_REG_001__from_date').value;
        const toDate   = document.getElementById('MB_REG_001__to_date').value;

        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mb/mb-work-register/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MB_REG_001__tbody');
            if (!tbody) return;

            tbody.innerHTML = '';

            if (!res.data || res.data.length === 0) {
                addEmptyRowMBREG001();
                return;
            }

            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMBREG001RowHTML(row);
                tbody.appendChild(tr);
            });

            addEmptyRowMBREG001();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    // ---- Toast helper ----
    function showToastMBREG001(type, message) {
        const existing = document.querySelector('.mb-toast-reg001');
        if (existing) existing.remove();

        const toast = document.createElement('div');
        toast.className = 'mb-toast-reg001';
        toast.textContent = message;
        toast.style.cssText =
            'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    // ---- AJAX Submit ----
    (function initMBREG001() {
        const formContainer = document.querySelector('[id="TDPL/MB/REG-001"]');
        if (!formContainer) return;

        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
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
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMBREG001('success', result.message || 'Saved successfully!');

                    const tbody = document.getElementById('MB_REG_001__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';

                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMBREG001RowHTML(row);
                            tbody.appendChild(tr);
                        });

                        addEmptyRowMBREG001();
                    }
                } else {
                    showToastMBREG001('error', result.message || 'Failed to save');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToastMBREG001('error', 'Failed to save. Please try again.');
            })
            .finally(() => {
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            });

            return false;
        });

        // Start with one empty row
        addEmptyRowMBREG001();
    })();

    /* ===================================================
       REG-002 – Master Mix Preparation Register (Row-based)
       Same pattern as REG-001: From/To date, dynamic rows
       =================================================== */

    const MB_REG002_FIELDS = ['row_time','kit_name_lot_no','batch_number','no_of_reactions',
        'reagent_name_components','total_reaction_volume','prepared_by','remarks'];

    function buildMBREG002RowHTML(row) {
        let html = `<td style="border:1px solid #000; padding:4px;">
            <input type="hidden" name="row_id[]" value="${row.id}">
            <input type="date" name="row_date[]" value="${row.row_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
        </td>`;
        html += `<td style="border:1px solid #000; padding:4px;"><input type="time" name="row_time[]" value="${row.row_time || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        const textFields = ['kit_name_lot_no','batch_number','no_of_reactions','reagent_name_components','total_reaction_volume','prepared_by','remarks'];
        textFields.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" value="${row[f] || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        return html;
    }

    function addEmptyRowMBREG002() {
        const tbody = document.getElementById('MB_REG_002__tbody');
        if (!tbody) return;

        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        html += `<td style="border:1px solid #000; padding:4px;"><input type="time" name="row_time[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        const textFields = ['kit_name_lot_no','batch_number','no_of_reactions','reagent_name_components','total_reaction_volume','prepared_by','remarks'];
        textFields.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMBREG002Form() {
        const tbody = document.getElementById('MB_REG_002__tbody');
        if (tbody) {
            tbody.innerHTML = '';
            addEmptyRowMBREG002();
        }
    }

    function clearREG002MBFilters() {
        document.getElementById('MB_REG_002__from_date').value = '';
        document.getElementById('MB_REG_002__to_date').value = '';
        clearMBREG002Form();
    }

    function loadREG002Data() {
        const fromDate = document.getElementById('MB_REG_002__from_date').value;
        const toDate   = document.getElementById('MB_REG_002__to_date').value;

        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mb/master-mix-preparation/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MB_REG_002__tbody');
            if (!tbody) return;

            tbody.innerHTML = '';

            if (!res.data || res.data.length === 0) {
                addEmptyRowMBREG002();
                return;
            }

            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMBREG002RowHTML(row);
                tbody.appendChild(tr);
            });

            addEmptyRowMBREG002();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMBREG002(type, message) {
        const existing = document.querySelector('.mb-toast-reg002');
        if (existing) existing.remove();

        const toast = document.createElement('div');
        toast.className = 'mb-toast-reg002';
        toast.textContent = message;
        toast.style.cssText =
            'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMBREG002() {
        const formContainer = document.querySelector('[id="TDPL/MB/REG-002"]');
        if (!formContainer) return;

        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
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
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMBREG002('success', result.message || 'Saved successfully!');

                    const tbody = document.getElementById('MB_REG_002__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';

                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMBREG002RowHTML(row);
                            tbody.appendChild(tr);
                        });

                        addEmptyRowMBREG002();
                    }
                } else {
                    showToastMBREG002('error', result.message || 'Failed to save');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToastMBREG002('error', 'Failed to save. Please try again.');
            })
            .finally(() => {
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            });

            return false;
        });

        addEmptyRowMBREG002();
    })();

    /* ===================================================
       REG-003 – Nucleic Acid Extraction Register (Row-based)
       Same pattern as REG-001: From/To date, dynamic rows
       =================================================== */

    const MB_REG003_FIELDS = ['time_of_sample_receipt','extraction_kit_lot_no','total_number_of_samples',
        'sample_barcode','performed_by','verified_by','remarks'];

    function buildMBREG003RowHTML(row) {
        let html = `<td style="border:1px solid #000; padding:4px;">
            <input type="hidden" name="row_id[]" value="${row.id}">
            <input type="date" name="row_date[]" value="${row.row_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
        </td>`;
        html += `<td style="border:1px solid #000; padding:4px;"><input type="time" name="time_of_sample_receipt[]" value="${row.time_of_sample_receipt || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        const textFields = ['extraction_kit_lot_no','total_number_of_samples','sample_barcode','performed_by','verified_by','remarks'];
        textFields.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" value="${row[f] || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        return html;
    }

    function addEmptyRowMBREG003() {
        const tbody = document.getElementById('MB_REG_003__tbody');
        if (!tbody) return;

        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        html += `<td style="border:1px solid #000; padding:4px;"><input type="time" name="time_of_sample_receipt[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        const textFields = ['extraction_kit_lot_no','total_number_of_samples','sample_barcode','performed_by','verified_by','remarks'];
        textFields.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    function clearMBREG003Form() {
        const tbody = document.getElementById('MB_REG_003__tbody');
        if (tbody) {
            tbody.innerHTML = '';
            addEmptyRowMBREG003();
        }
    }

    function clearREG003MBFilters() {
        document.getElementById('MB_REG_003__from_date').value = '';
        document.getElementById('MB_REG_003__to_date').value = '';
        clearMBREG003Form();
    }

    function loadREG003Data() {
        const fromDate = document.getElementById('MB_REG_003__from_date').value;
        const toDate   = document.getElementById('MB_REG_003__to_date').value;

        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/mb/nucleic-acid-extraction/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('MB_REG_003__tbody');
            if (!tbody) return;

            tbody.innerHTML = '';

            if (!res.data || res.data.length === 0) {
                addEmptyRowMBREG003();
                return;
            }

            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildMBREG003RowHTML(row);
                tbody.appendChild(tr);
            });

            addEmptyRowMBREG003();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    function showToastMBREG003(type, message) {
        const existing = document.querySelector('.mb-toast-reg003');
        if (existing) existing.remove();

        const toast = document.createElement('div');
        toast.className = 'mb-toast-reg003';
        toast.textContent = message;
        toast.style.cssText =
            'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    (function initMBREG003() {
        const formContainer = document.querySelector('[id="TDPL/MB/REG-003"]');
        if (!formContainer) return;

        const form = formContainer.querySelector('form');
        if (!form || form.dataset.ajaxBound === 'true') return;
        form.dataset.ajaxBound = 'true';

        form.addEventListener('submit', function (e) {
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
            .then(r => r.json())
            .then(result => {
                if (result.success) {
                    showToastMBREG003('success', result.message || 'Saved successfully!');

                    const tbody = document.getElementById('MB_REG_003__tbody');
                    if (tbody && result.data && result.data.length > 0) {
                        tbody.innerHTML = '';

                        result.data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = buildMBREG003RowHTML(row);
                            tbody.appendChild(tr);
                        });

                        addEmptyRowMBREG003();
                    }
                } else {
                    showToastMBREG003('error', result.message || 'Failed to save');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToastMBREG003('error', 'Failed to save. Please try again.');
            })
            .finally(() => {
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            });

            return false;
        });

        addEmptyRowMBREG003();
    })();
</script>


</html>


@endsection
