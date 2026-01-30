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
        buttonText="Submit"
        action="{{ route('newforms.lo.forms.submit') }}">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>Date:</strong>
                <input type="date" id="LO_FOM_005__date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadFOM005Data()">
            </div>
            <div>
                <button type="button" onclick="clearFOM005Filters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== HEADER FIELDS ===== -->
        <p style="font-size:14px; margin-bottom:6px;">
            <strong>Name of CSR:</strong>
            <input type="text" name="csr_name" id="LO_FOM_005__csr_name"
                style="border:1px solid #000; width:150px;">
            &nbsp;&nbsp;
            <strong>Route:</strong>
            <input type="text" name="route" id="LO_FOM_005__route"
                style="border:1px solid #000; width:120px;">
            &nbsp;&nbsp;
            <strong>Route Start Time:</strong>
            <input type="text" name="route_start_time" id="LO_FOM_005__route_start_time"
                style="border:1px solid #000; width:120px;">
            &nbsp;&nbsp;
            <strong>Starting KM:</strong>
            <input type="text" name="start_km" id="LO_FOM_005__start_km"
                style="border:1px solid #000; width:80px;">
            &nbsp;&nbsp;
            <strong>End KM:</strong>
            <input type="text" name="end_km" id="LO_FOM_005__end_km"
                style="border:1px solid #000; width:80px;">
            &nbsp;&nbsp;
            <strong>Total KMS:</strong>
            <input type="text" name="total_km" id="LO_FOM_005__total_km"
                style="border:1px solid #000; width:80px;">
        </p>

        <!-- ===== TABLE ===== -->
        <table id="LO_FOM_005__table" style="width:100%; border-collapse: collapse; font-size:14px;" border="1">
            <thead>
                <tr>
                    <th rowspan="2" style="border:1px solid #000;padding:6px; text-align:center;">S.No.</th>
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
            <tbody id="LO_FOM_005__tbody">
                <!-- rows built by JS -->
            </tbody>
        </table>

        <button type="button" onclick="addEmptyRowFOM005()"
            style="margin-top:8px; padding:6px 18px; background:#007bff; color:#fff; border:none; border-radius:4px; cursor:pointer;">
            + Add Row
        </button>

    </x-formTemplete>


    <x-formTemplete
        id="TDPL/LO/FOM-006"
        docNo="TDPL/LO/FOM-006"
        docName="CSR Sample Tracking - Outliers"
        issueNo="2.0"
        issueDate="01/10/2024"
        buttonText="Submit"
        action="{{ route('newforms.lo.forms.submit') }}">

        <!-- ===== FILTER SECTION ===== -->
        <div style="display:flex; flex-wrap:wrap; gap:12px; align-items:center; font-size:14px; margin-bottom:6px;">
            <div>
                <strong>From Date:</strong>
                <input type="date" id="LO_FOM_006__from_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadFOM006Data()">
            </div>
            <div>
                <strong>To Date:</strong>
                <input type="date" id="LO_FOM_006__to_date"
                    style="border:1px solid #000; padding:4px; width:150px;"
                    onchange="loadFOM006Data()">
            </div>
            <div>
                <button type="button" onclick="clearFOM006Filters()"
                    style="padding:6px 15px; background:#dc3545; color:#fff; border:none; border-radius:4px; cursor:pointer;">
                    Clear
                </button>
            </div>
        </div>

        <!-- ===== TABLE ===== -->
        <table style="width:100%; border-collapse: collapse; font-size:14px;" border="1">
            <thead>
                <tr>
                    <th rowspan="2" style="border:1px solid #000; padding:6px;">Date</th>
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
            <tbody id="LO_FOM_006__tbody">
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
       FOM-005 – CSR Sample Tracking Sheet (Row-based)
       =================================================== */

    // ---- Build one table row HTML ----
    function buildFOM005RowHTML(sno, data) {
        data = data || {};
        return `<tr>
            <td style="padding:6px; text-align:center;">${sno}<input type="hidden" name="row_id[]" value="${data.id || ''}"></td>
            <td><input type="text" name="client_name[]" value="${data.client_name || ''}" style="width:100%; border:none;"></td>
            <td><input type="text" name="client_code[]" value="${data.client_code || ''}" style="width:100%; border:none;"></td>
            <td><input type="text" name="barcode[]" value="${data.barcode || ''}" style="width:100%; border:none;"></td>
            <td><input type="text" name="work_order[]" value="${data.work_order || ''}" style="width:100%; border:none;"></td>
            <td><input type="text" name="trf[]" value="${data.trf || ''}" style="width:100%; border:none;"></td>
            <td><input type="text" name="clinical_history[]" value="${data.clinical_history || ''}" style="width:100%; border:none;"></td>
            <td><input type="text" name="sample_volume[]" value="${data.sample_volume || ''}" style="width:100%; border:none;"></td>
            <td><input type="text" name="temp_pickup[]" value="${data.temp_pickup || ''}" style="width:100%; border:none;"></td>
            <td><input type="text" name="temp_drop[]" value="${data.temp_drop || ''}" style="width:100%; border:none;"></td>
            <td><input type="text" name="client_signature[]" value="${data.client_signature || ''}" style="width:100%; border:none;"></td>
            <td><input type="text" name="pickup_time[]" value="${data.pickup_time || ''}" style="width:100%; border:none;"></td>
        </tr>`;
    }

    // ---- Add empty row ----
    function addEmptyRowFOM005() {
        const tbody = document.getElementById('LO_FOM_005__tbody');
        const sno = tbody.rows.length + 1;
        tbody.insertAdjacentHTML('beforeend', buildFOM005RowHTML(sno, {}));
    }

    // ---- Clear form (keep filters) ----
    function clearFOM005Form() {
        document.getElementById('LO_FOM_005__tbody').innerHTML = '';
        document.getElementById('LO_FOM_005__csr_name').value = '';
        document.getElementById('LO_FOM_005__route').value = '';
        document.getElementById('LO_FOM_005__route_start_time').value = '';
        document.getElementById('LO_FOM_005__start_km').value = '';
        document.getElementById('LO_FOM_005__end_km').value = '';
        document.getElementById('LO_FOM_005__total_km').value = '';
        addEmptyRowFOM005();
    }

    // ---- Clear filters + form ----
    function clearFOM005Filters() {
        document.getElementById('LO_FOM_005__date').value = '';
        clearFOM005Form();
    }

    // ---- Load data from server ----
    function loadFOM005Data() {
        const dateVal = document.getElementById('LO_FOM_005__date').value;

        if (!dateVal) {
            clearFOM005Form();
            return;
        }

        const params = new URLSearchParams();
        params.append('date', dateVal);

        fetch(`/newforms/lo/csr-sample-tracking/load?${params.toString()}`)
            .then(r => r.json())
            .then(result => {
                const tbody = document.getElementById('LO_FOM_005__tbody');
                tbody.innerHTML = '';

                if (result.success && result.data && result.data.length > 0) {
                    // Populate header from first row
                    const first = result.data[0];
                    document.getElementById('LO_FOM_005__csr_name').value = first.csr_name || '';
                    document.getElementById('LO_FOM_005__route').value = first.route || '';
                    document.getElementById('LO_FOM_005__route_start_time').value = first.route_start_time || '';
                    document.getElementById('LO_FOM_005__start_km').value = first.start_km || '';
                    document.getElementById('LO_FOM_005__end_km').value = first.end_km || '';
                    document.getElementById('LO_FOM_005__total_km').value = first.total_km || '';

                    result.data.forEach((row, idx) => {
                        tbody.insertAdjacentHTML('beforeend', buildFOM005RowHTML(idx + 1, row));
                    });
                } else {
                    // No data — clear header and add one empty row
                    clearFOM005Form();
                }
            })
            .catch(() => clearFOM005Form());
    }

    // ---- Toast helper ----
    function showToastFOM005(message, type) {
        const toast = document.createElement('div');
        toast.textContent = message;
        toast.style.cssText =
            'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    // ---- AJAX Submit ----
    (function initFOM005() {
        const wrapper = document.getElementById('TDPL/LO/FOM-005');
        if (!wrapper) return;
        const formEl = wrapper.querySelector('form');
        if (!formEl) return;

        formEl.addEventListener('submit', function (e) {
            e.preventDefault();

            const fd = new FormData(formEl);

            fetch(formEl.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: fd,
            })
            .then(r => r.json())
            .then(data => {
                if (data.success) {
                    showToastFOM005(data.message || 'Saved successfully!', 'success');
                    // Reload to get updated row IDs
                    loadFOM005Data();
                } else {
                    showToastFOM005(data.message || 'Save failed.', 'error');
                }
            })
            .catch(() => showToastFOM005('Network error.', 'error'));
        });

        // Start with one empty row
        addEmptyRowFOM005();
    })();

    /* ===================================================
       FOM-006 – CSR Sample Tracking - Outliers (Row-based)
       Like HP FOM-004: From/To date, dynamic row addition
       =================================================== */

    // ---- Build row HTML from loaded data ----
    function buildFOM006RowHTML(row) {
        const fields = ['client_name','client_code','barcode','work_order','trf','clinical_history','sample_volume','temp_pickup','temp_drop'];
        let html = `<td style="border:1px solid #000; padding:4px;">
            <input type="hidden" name="row_id[]" value="${row.id}">
            <input type="date" name="row_date[]" value="${row.row_date || ''}" style="width:100%; border:1px solid #ccc; padding:4px;">
        </td>`;
        fields.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" value="${row[f] || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        html += `<td style="border:1px solid #000; padding:4px;"><textarea name="observations[]" style="width:100%; border:1px solid #ccc; padding:4px;">${row.observations || ''}</textarea></td>`;
        html += `<td style="border:1px solid #000; padding:4px;"><input name="accession_signature[]" value="${row.accession_signature || ''}" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        return html;
    }

    // ---- Add empty row (dynamic — new row appears automatically) ----
    function addEmptyRowFOM006() {
        const tbody = document.getElementById('LO_FOM_006__tbody');
        if (!tbody) return;

        const fields = ['client_name','client_code','barcode','work_order','trf','clinical_history','sample_volume','temp_pickup','temp_drop'];
        const tr = document.createElement('tr');
        let html = `<td style="border:1px solid #000; padding:4px;"><input type="date" name="row_date[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        fields.forEach(f => {
            html += `<td style="border:1px solid #000; padding:4px;"><input name="${f}[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        });
        html += `<td style="border:1px solid #000; padding:4px;"><textarea name="observations[]" style="width:100%; border:1px solid #ccc; padding:4px;"></textarea></td>`;
        html += `<td style="border:1px solid #000; padding:4px;"><input name="accession_signature[]" style="width:100%; border:1px solid #ccc; padding:4px;"></td>`;
        tr.innerHTML = html;
        tbody.appendChild(tr);
    }

    // ---- Clear form (keep filters) ----
    function clearFOM006Form() {
        const tbody = document.getElementById('LO_FOM_006__tbody');
        if (tbody) {
            tbody.innerHTML = '';
            addEmptyRowFOM006();
        }
    }

    // ---- Clear filters + form ----
    function clearFOM006Filters() {
        document.getElementById('LO_FOM_006__from_date').value = '';
        document.getElementById('LO_FOM_006__to_date').value = '';
        clearFOM006Form();
    }

    // ---- Load data from server ----
    function loadFOM006Data() {
        const fromDate = document.getElementById('LO_FOM_006__from_date').value;
        const toDate   = document.getElementById('LO_FOM_006__to_date').value;

        if (!fromDate && !toDate) return;

        const params = new URLSearchParams();
        // Only fromDate → single day; both → range
        if (fromDate) params.append('from_date', fromDate);
        params.append('to_date', toDate || fromDate);

        fetch(`/newforms/lo/csr-sample-tracking-outliers/load?${params.toString()}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(res => {
            const tbody = document.getElementById('LO_FOM_006__tbody');
            if (!tbody) return;

            tbody.innerHTML = '';

            if (!res.data || res.data.length === 0) {
                addEmptyRowFOM006();
                return;
            }

            res.data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = buildFOM006RowHTML(row);
                tbody.appendChild(tr);
            });

            // Add one empty row at the bottom for new entry
            addEmptyRowFOM006();
        })
        .catch(error => console.error('Error loading data:', error));
    }

    // ---- Toast helper ----
    function showToastFOM006(type, message) {
        const existing = document.querySelector('.lo-toast-006');
        if (existing) existing.remove();

        const toast = document.createElement('div');
        toast.className = 'lo-toast-006';
        toast.textContent = message;
        toast.style.cssText =
            'position:fixed;top:20px;right:20px;padding:12px 24px;border-radius:6px;color:#fff;z-index:9999;font-size:14px;' +
            (type === 'success' ? 'background:#28a745;' : 'background:#dc3545;');
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    // ---- AJAX Submit ----
    (function initFOM006() {
        const formContainer = document.querySelector('[id="TDPL/LO/FOM-006"]');
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
                    showToastFOM006('success', result.message || 'Saved successfully!');

                    const tbody = document.getElementById('LO_FOM_006__tbody');
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

        // Start with one empty row
        addEmptyRowFOM006();
    })();
</script>


</html>


@endsection
