@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Examination Quality Daily Report</title>
        <!-- FullCalendar CSS (optional) -->
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet">

        <!-- FullCalendar JS -->
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
    </head>
    <style>
        /* fOR PIVOT */
        .pivot-container {
            width: 100%;
            /* max-width: 600px;
                                                                                                                            margin: 50px auto; */
            background-color: white;
            border-radius: 8px;
            /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); */
            /* overflow: hidden; */
        }

        .pivot-tabs {
            display: flex;
            background-color: #ffff;
            padding: 5px;
            border: 1px solid #b1b1b1;
            border-radius: 10px;
            width: 100%;
        }

        .pivot-tab {
            flex: 1;
            background: transparent;
            border: none;
            cursor: pointer;
            font-size: 14px;
            text-align: center;
        }

        .pivot-tab.active {
            color: #005a9e;
            background-color: lightblue;
            font-weight: bold;
            border-radius: 5px;
            padding: 0.8rem;
        }

        .pivot-content {
            padding: 20px 0;
        }

        .pivot-panel {
            display: none;
        }

        .pivot-panel.active {
            display: block;
        }

        /* for table */
        .stock-planner-table {
            width: 100% !important;
            border-collapse: collapse !important;
            margin-top: 20px !important;
        }

        .stock-planner-table th,
        .stock-planner-table td {
            padding: 10px !important;
            text-align: left !important;
            border: 1px solid #565454 !important;
        }

        .stock-planner-table th {
            background-color: #007BFF !important;
            color: white !important;
            text-align: center !important;
            padding: 10px !important;
        }

        .stock-planner-table input {
            width: 50px;
        }


        .wapp-sidebar {
            height: calc(100vh - 185px);
            width: 20%;
            background-color: #010046;
            color: white;
            display: flex;
            flex-direction: column;
        }

        .wapp-sidebar-header {
            padding: 10px;
            background-color: #177445;
            text-align: center;
            font-size: 1.5em;
        }

        .wapp-chat-list {
            flex: 1;
            overflow-y: auto;
        }

        .wapp-chat-item {
            padding: 10px;
            cursor: pointer;
            border-bottom: 1px solid #ccc;
        }

        .wapp-chat-item:hover {
            background-color: #0b8065;
        }

        .wapp-chat-item.active {
            background-color: #0b8065;
        }

        .wapp-main-chat {
            /* height: calc(100% - 70px); */
            flex: 1;
            display: none;
            /* Initially hide all chats */
            flex-direction: column;
            position: relative;
        }

        .wapp-main-chat.active {
            display: flex;

            /* Show only the active chat */
        }

        .wapp-chat-header {
            padding: 10px;
            background-color: #009348;
            color: white;
            font-size: 1.2em;
        }

        .wapp-messages {
            display: contents;
            flex: 1;
            padding: 10px;
            overflow-y: auto;
            background-color: white;
        }

        .wapp-message {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 10px;
            max-width: 70%;
        }

        .wapp-message.sent {
            background-color: #DCF8C6;
            align-self: flex-end;
        }

        .wapp-message.received {
            background-color: lightblue;
            align-self: flex-start;
        }

        .wapp-message-input {
            display: flex;
            position: absolute;
            width: 100%;
            padding: 10px;
            background-color: #f1f1f1;
            border-top: 1px solid #ccc;
            bottom: 0;
        }

        .wapp-message-input input {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 20px;
            outline: none;
        }

        .wapp-message-input button {
            margin-left: 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            background-color: #075E54;
            color: white;
            cursor: pointer;
        }

        .form-container-search input[type="month"],
        .form-container-search select {
            padding: 10px;
            font-size: 14px !important;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>

    <style>
        /* Add these styles to your head section or CSS file */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fff;
            margin: 5% auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: black;
        }

        .numerator-input-container {
            position: relative;
        }

        .numerator-details-btn {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #6c757d;
            cursor: pointer;
        }

        .numerator-details-btn:hover {
            color: #0056b3;
        }

        .list-group-item {
            padding: 10px 15px;
            border-bottom: 1px solid #eee;
        }

        .list-group-item:last-child {
            border-bottom: none;
        }
    </style>

    <body>
        <div class="main ">
            <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
                <div style="font-size: 20px;">Examination Phase Daily Report</div>
                <div style="font-size: 20px; " class="form-container-search">
                    @if(auth()->user()->role == 1)
                        <select id="labDropdown" onchange="fetchDataForSelectedLab()">
                            <option value="">-- Select Labs --</option>
                            @foreach ($labs as $lab)
                                <option value="{{ $lab->id }}" {{ $lab->id == auth()->user()->lab_id ? 'selected' : '' }}>
                                    {{ $lab->location }}
                                </option>
                            @endforeach
                        </select>
                    @else
                        <input type="text" value="{{ auth()->user()->lab->location ?? 'My Lab' }}" disabled
                            style="height: fit-content; font-size: 16px;">
                        <input type="hidden" id="labDropdown" value="{{ auth()->user()->lab_id }}">
                    @endif
                    <input type="month" class="form-input" id="reportMonth" style="height: fit-content;font-size: 16px;">
                    <button type="button" onclick="submitFormData()" id="submitButton"
                        class="btn btn-warning">Submit</button>
                </div>
                <!-- <button type="button" class="btn btn-warning" onclick="openDocument1()">Create</button> -->
            </div>
            <div style="height: calc(100vh - 185px); display: flex; width: 100%; gap: 20px;">
                <div class="wapp-sidebar col-md-3">
                    <div class="wapp-chat-list">
                        @foreach ($master_quality as $menu)
                            <div class="wapp-chat-item {{ $loop->first ? 'active' : '' }}" data-target="TAT"
                                data-id="{{ $menu->id }}">
                                {{ $menu->indicator }}
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-9" style="padding-right: 3px; height: 100%; width: 78%;">
                    <div class="wapp-main-chat active" style="height: 100%;" id="TAT">
                        <div class="table-responsive" style="padding-right: 1rem;">
                            <table class="stock-planner-table">
                                <thead>
                                    <tr style="position: sticky; top: 0px;">
                                        <th colspan="6" rowspan="2">
                                            <div class="d-flex" style="justify-content: space-around;">
                                                <span><i class="fa-solid fa-arrow-down"></i> Department</span>
                                                <span>Days <i class="fa-solid fa-arrow-right"></i></span>
                                            </div>
                                        </th>
                                        @for ($i = 1; $i <= 31; $i++)
                                            <th colspan="2" rowspan="2">{{ $i }}<sup>
                                                    @if($i == 1) st
                                                    @elseif($i == 2) nd
                                                    @elseif($i == 3) rd
                                                        @else th
                                                    @endif
                                                </sup></th>
                                        @endfor
                                        <th rowspan="2" class="average-column">Average</th>
                                        <th rowspan="2" class="average-column">Total</th>
                                    </tr>
                                </thead>
                                <tbody id="dynamicForm">
                                    <!-- Dynamic form rows will be inserted here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- Add this right before the closing </body> tag -->
        <div id="numeratorDetailsModal" class="modal" style="display: none;">
            <div class="modal-content"
                style="margin: 10% auto; width: 50%; max-width: 600px;">
                <div class="modal-header"
                    style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #eee; padding-bottom: 10px; margin-bottom: 15px;">
                    <h5 style="margin: 0;">Details for Day <span id="modalDayNumber"></span> - <span
                            id="modalDepartment"></span></h5>
                    <span class="close" onclick="closeModal()" style="cursor: pointer; font-size: 24px;">&times;</span>
                </div>
                <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
<form id="numeratorDetailsForm">
    <input type="hidden" name="row_id" id="modalRowId">
    <input type="hidden" name="day" id="modalDay">
    <input type="hidden" name="department" id="modalDepartmentId">
    <input type="hidden" name="indicator_id" id="modalIndicatorId">


    
   <div class="form-group">
                                <label for="barcode">Barcode</label>
                                <input type="text" class="form-control" id="barcode" name="barcode" required>
                            </div>
                            <div class="form-group">
                                <label for="lis_ticket">LIS Ticket Number</label>
                                <input type="text" class="form-control" id="lis_ticket" name="lis_ticket_number" required>
                            </div>
   <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save mr-2"></i>Save Details
                            </button>
</form>
                    <div style="margin-top: 20px; border-top: 1px solid #eee; padding-top: 15px;">
                        <h6 style="margin-bottom: 10px;">Previous Entries</h6>
                        <div id="detailsList"></div>
                    </div>
                </div>
            </div>
        </div>

    </body>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const tabs = document.querySelectorAll(".wapp-chat-item");
            const panels = document.querySelectorAll(".wapp-main-chat");
            const dynamicForm = document.getElementById('dynamicForm');
            const activeItem = document.querySelector(".wapp-chat-item.active");
            const now = new Date();
            document.getElementById('reportMonth').value = now.toISOString().slice(0, 7);
            // Fetch data for the active menu item on page load
            if (activeItem) {
                const menuId = activeItem.getAttribute('data-id');
                fetchData(menuId);
            }

            document.getElementById('labDropdown').addEventListener('change', fetchDataForSelectedLab);
            document.getElementById('reportMonth').addEventListener('change', function () {
                const activeItem = document.querySelector(".wapp-chat-item.active");
                if (activeItem) {
                    const menuId = activeItem.getAttribute('data-id');
                    fetchData(menuId);
                }
            });

            // Add click event listeners to menu items
            tabs.forEach((tab) => {
                tab.addEventListener("click", () => {
                    // Remove active class from all tabs and panels
                    tabs.forEach((t) => t.classList.remove("active"));
                    panels.forEach((p) => p.classList.remove("active"));

                    // Add active class to the clicked tab and corresponding panel
                    tab.classList.add("active");
                    const target = document.getElementById(tab.dataset.target);
                    target.classList.add("active");

                    // Fetch data for the selected menu item
                    const menuId = tab.getAttribute('data-id');
                    fetchData(menuId);
                });
            });
        });


        document.getElementById('reportMonth').addEventListener('change', function () {
            const activeItem = document.querySelector(".wapp-chat-item.active");
            if (activeItem) {
                const menuId = activeItem.getAttribute('data-id');
                fetchData(menuId);
            }
        });

        function fetchDataForSelectedLab() {
            const labId = document.getElementById('labDropdown').value;
            const activeItem = document.querySelector(".wapp-chat-item.active");

            if (activeItem) {
                const menuId = activeItem.getAttribute('data-id');
                fetchData(menuId, labId);
            }
        }

        // Add these new functions to your script
        async function openNumeratorDetailsModal(rowId, day, department, indicatorId) {
            try {
                const labId = document.getElementById('labDropdown').value || '{{ auth()->user()->lab_id }}';
                const month = document.getElementById('reportMonth').value;

                if (!month) {
                    alert('Please select a month first');
                    return;
                }

                // Set modal title and hidden fields
                document.getElementById('modalDayNumber').textContent = day;
                document.getElementById('modalDepartment').textContent = department;
                document.getElementById('modalRowId').value = rowId;
                document.getElementById('modalDay').value = day;
                document.getElementById('modalDepartmentId').value = department;
                document.getElementById('modalIndicatorId').value = indicatorId;

                // Clear form and show loading state
                document.getElementById('numeratorDetailsForm').reset();
                const detailsList = document.getElementById('detailsList');
                detailsList.innerHTML = '<div style="text-align: center; padding: 20px;">Loading details...</div>';

                // Fetch existing details
                try {
                    const params = new URLSearchParams({
                        row_id: rowId,
                        day: day,
                        department: department,
                        indicator_id: indicatorId,
                        lab_id: labId,
                        month: month
                    });

                    const response = await fetch(`/get-examination-numerator-details?${params.toString()}`);

                    // Check response content type
                    const contentType = response.headers.get('content-type');
                    if (!contentType || !contentType.includes('application/json')) {
                        throw new Error('Server returned unexpected response');
                    }

                    const data = await response.json();

                    if (data.success) {
                        if (data.data && data.data.length > 0) {
                            renderDetailsList(data.data);
                            // Auto-fill with latest entry
                            const latest = data.data[0];
                            document.getElementById('barcode').value = latest.barcode || '';
                            document.getElementById('lis_ticket').value = latest.lis_ticket_number || '';
                        } else {
                            detailsList.innerHTML = '<div style="padding: 10px; background: #f8f9fa; border-radius: 4px; text-align: center;">No details found for this entry.</div>';
                        }
                    } else {
                        detailsList.innerHTML = `<div style="padding: 10px; background: #fff3cd; border-radius: 4px; text-align: center;">${data.message || 'Error loading details'}</div>`;
                    }
                } catch (error) {
                    console.error('Fetch error:', error);
                    detailsList.innerHTML = '<div style="padding: 10px; background: #f8f9fa; border-radius: 4px; text-align: center;">No existing details found. You can add new ones below.</div>';
                }

                // Show modal
                document.getElementById('numeratorDetailsModal').style.display = 'block';
            } catch (error) {
                console.error('Modal error:', error);
                alert('Error opening details: ' + error.message);
            }
        }

        function renderDetailsList(details) {
            const detailsList = document.getElementById('detailsList');
            detailsList.innerHTML = '';

            if (!details || details.length === 0) {
                detailsList.innerHTML = '<div style="padding: 10px; background: #f8f9fa; border-radius: 4px; text-align: center;">No details found</div>';
                return;
            }

            const listGroup = document.createElement('div');
            listGroup.style.border = '1px solid #ddd';
            listGroup.style.borderRadius = '4px';

            details.forEach(detail => {
                const item = document.createElement('div');
                item.style.padding = '10px 15px';
                item.style.borderBottom = '1px solid #eee';
                item.style.display = 'flex';
                item.style.justifyContent = 'space-between';
                item.style.alignItems = 'center';

                item.innerHTML = `
                            <div>
                                <div><strong>Barcode:</strong> ${detail.barcode || 'N/A'}</div>
                                <div><strong>LIS Ticket:</strong> ${detail.lis_ticket_number || 'N/A'}</div>
                                <small style="color: #6c757d;">${new Date(detail.created_at).toLocaleString()}</small>
                            </div>
                            <div>
                                <button class="edit-detail" data-id="${detail.id}" style="background: none; border: none; color: #007bff; cursor: pointer; margin-right: 10px;">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="delete-detail" data-id="${detail.id}" style="background: none; border: none; color: #dc3545; cursor: pointer;">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        `;
                listGroup.appendChild(item);
            });

            detailsList.appendChild(listGroup);

            // Add event listeners
            document.querySelectorAll('.edit-detail').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    const detail = details.find(d => d.id == btn.dataset.id);
                    if (detail) {
                        document.getElementById('barcode').value = detail.barcode || '';
                        document.getElementById('lis_ticket').value = detail.lis_ticket_number || '';
                    }
                });
            });

            document.querySelectorAll('.delete-detail').forEach(btn => {
                btn.addEventListener('click', async (e) => {
                    e.preventDefault();
                    if (confirm('Are you sure you want to delete this entry?')) {
                        try {
                            await deleteNumeratorDetail(btn.dataset.id);
                            // Refresh the list
                            const rowId = document.getElementById('modalRowId').value;
                            const day = document.getElementById('modalDay').value;
                            const department = document.getElementById('modalDepartmentId').value;
                            const indicatorId = document.getElementById('modalIndicatorId').value;
                            await openNumeratorDetailsModal(rowId, day, department, indicatorId);
                        } catch (error) {
                            console.error('Delete error:', error);
                            alert('Error deleting entry: ' + error.message);
                        }
                    }
                });
            });
        }

        async function deleteNumeratorDetail(id) {
            const response = await fetch(`/delete-examination-numerator-detail/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            });

            if (!response.ok) {
                throw new Error('Failed to delete detail');
            }

            return await response.json();
        }

        function closeModal() {
            document.getElementById('numeratorDetailsModal').style.display = 'none';
        }

        // Handle form submission
        document.getElementById('numeratorDetailsForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            const labId = document.getElementById('labDropdown').value || '{{ auth()->user()->lab_id }}';
            const month = document.getElementById('reportMonth').value;

            formData.append('lab_id', labId);
            formData.append('month', month);

            try {
                const submitBtn = this.querySelector('button[type="submit"]');
                submitBtn.disabled = true;
                submitBtn.innerHTML = 'Saving...';

                const response = await fetch('/save-examination-numerator-details', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                const data = await response.json();

                if (!data.success) {
                    throw new Error(data.message || 'Failed to save details');
                }

                // Refresh the details list
                const rowId = formData.get('row_id');
                const day = formData.get('day');
                const department = formData.get('department');
                const indicatorId = formData.get('indicator_id');
                await openNumeratorDetailsModal(rowId, day, department, indicatorId);

                this.reset();
            } catch (error) {
                console.error('Save error:', error);
                alert('Error saving details: ' + error.message);
            } finally {
                const submitBtn = this.querySelector('button[type="submit"]');
                submitBtn.disabled = false;
                submitBtn.innerHTML = 'Save Details';
            }
        });

        // Update your renderForm function to include clickable numerators
        function renderForm(description, submittedData = [], indicatorId) {
            const departments = [
                "Bio-Chemistry", "Immunology", "Haematology", "Serology", "Micro Biology",
                "Molecular Biology", "Histo Pathology", "Cytology", "Clinical Pathology",
                "CytoGenetics", "Genetics"
            ];

            let formRows = '';

            departments.forEach((department, index) => {
                const rowId = index + 1;
                const rowData = submittedData.find(item => parseInt(item.id) === rowId) || {
                    days: [],
                    average: '0%',
                    total_misidentified: '0',
                    total_samples: '0'
                };

                let typeInputs = '';
                let totalInputs = '';

                for (let day = 1; day <= 31; day++) {
                    const dayData = rowData.days.find(d => parseInt(d.day) === day) || {};
                    const typeValue = dayData.type === 0 ? '0' : (dayData.type || '');
                    const totalValue = dayData.total === 0 ? '0' : (dayData.total || '');

                    typeInputs += `
                                <td>
        <div style="display: flex; align-items: center; gap: 5px;">
            <input type="text" class="form-control" 
                   name="row${rowId}_day${day}_type" 
                   value="${typeValue}"
                   oninput="updateCalculations(${rowId}, ${day})">
            <button onclick="openNumeratorDetailsModal(${rowId}, ${day}, '${department}', ${indicatorId})"
                    type="button"
                    style="background: none; border: none; color: #6c757d; cursor: pointer;">
                <i class="fas fa-info-circle"></i>
            </button>
        </div>
    </td>
                                <td rowspan="2" id="percentage_${rowId}_${day}" class="percentage-cell">
                                    ${dayData.percentage || '0%'}
                                </td>
                            `;

                    totalInputs += `
                                <td>
                                    <input type="text" class="form-control" 
                                           name="row${rowId}_day${day}_total" 
                                           value="${totalValue}"
                                           oninput="updateCalculations(${rowId}, ${day})">
                                </td>
                            `;
                }

                formRows += `
                            <tr>
                                <td colspan="2" rowspan="2">${rowId}</td>
                                <td colspan="2" rowspan="2">${department}</td>
                                <td>${description}</td>
                                <td rowspan="2"></td>
                                ${typeInputs}
                                <td rowspan="2" class="average-column" id="row${rowId}_average">
                                    <strong>${rowData.average}</strong>
                                </td>
                                <td rowspan="2" class="average-column" id="row${rowId}_total">
                                    <strong>${rowData.total_misidentified}/${rowData.total_samples}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>TOTAL SAMPLES</td>
                                ${totalInputs}
                            </tr>
                        `;
            });

            document.getElementById('dynamicForm').innerHTML = formRows;
            setupInputListeners();
        }

        // Update your fetchData function to pass indicatorId
        function fetchData(menuId, labId = null) {
            if (!labId) labId = document.getElementById('labDropdown').value || '{{ auth()->user()->lab_id }}';
            const month = document.getElementById('reportMonth').value;

            if (!month) {
                document.getElementById('dynamicForm').innerHTML =
                    '<tr><td colspan="69" style="text-align: center; padding: 20px; color: red;">Please select a month first</td></tr>';
                return;
            }

            const dynamicForm = document.getElementById('dynamicForm');
            dynamicForm.innerHTML = '<tr><td colspan="69" style="text-align: center; padding: 20px;">Loading data...</td></tr>';

            fetch(`/api/get-menu-description/${menuId}`)
                .then(response => response.json())
                .then(data => {
                    if (!data.success) throw new Error(data.message || 'Failed to fetch description');
                    window.currentDescription = data.description || '';
                    return fetch(`/api/get-submitted-data/${menuId}?lab_id=${labId}&month=${month}`);
                })
                .then(response => response.json())
                .then(data => {
                    if (!data.success) {
                        throw new Error(data.message || 'Failed to fetch data');
                    } else {
                        renderForm(window.currentDescription, data.data, menuId);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('dynamicForm').innerHTML =
                        `<tr><td colspan="69" style="text-align: center; padding: 20px; color: red;">${error.message}</td></tr>`;
                });
        }

        function calculateRowAverage(rowId) {
            let totalPercentage = 0;
            let count = 0;

            for (let day = 1; day <= 31; day++) {
                const percentCell = document.getElementById(`percentage_${rowId}_${day}`);
                if (percentCell) {
                    const percentText = percentCell.textContent || percentCell.innerText;
                    const percentValue = parseFloat(percentText.replace('%', '')) || 0;

                    const typeInput = document.querySelector(`input[name="row${rowId}_day${day}_type"]`);
                    const totalInput = document.querySelector(`input[name="row${rowId}_day${day}_total"]`);

                    if (typeInput && totalInput && typeInput.value && totalInput.value) {
                        totalPercentage += percentValue;
                        count++;
                    }
                }
            }

            const average = count > 0 ? (totalPercentage / count) : 0;
            return average.toFixed(2) + "%";
        }

        function calculateRowTotal(rowId) {
            let sumType = 0;
            let sumTotal = 0;

            for (let day = 1; day <= 31; day++) {
                const typeInput = document.querySelector(`input[name="row${rowId}_day${day}_type"]`);
                const totalInput = document.querySelector(`input[name="row${rowId}_day${day}_total"]`);

                sumType += parseFloat(typeInput?.value) || 0;
                sumTotal += parseFloat(totalInput?.value) || 0;
            }

            return `${sumType.toFixed(2)}/${sumTotal.toFixed(2)}`;
        }

        function updateCalculations(rowId, day) {
            const typeInput = document.querySelector(`input[name="row${rowId}_day${day}_type"]`);
            const totalInput = document.querySelector(`input[name="row${rowId}_day${day}_total"]`);
            const percentageCell = document.getElementById(`percentage_${rowId}_${day}`);

            if (typeInput && totalInput && percentageCell) {
                const typeValue = typeInput.value;
                const totalValue = totalInput.value;

                // Calculate percentage
                let percentage = '0%';
                if (typeValue && totalValue && !isNaN(typeValue) && !isNaN(totalValue) && parseFloat(totalValue) > 0) {
                    percentage = ((parseFloat(typeValue) / parseFloat(totalValue))) * 100;
                    percentage = percentage.toFixed(2) + '%';
                }
                percentageCell.textContent = percentage;

                // Update row average and total
                updateRowAverage(rowId);
                updateRowTotal(rowId);
            }
        }

        function updateRowAverage(rowId) {
            let totalPercentage = 0;
            let count = 0;

            for (let day = 1; day <= 31; day++) {
                const percentCell = document.getElementById(`percentage_${rowId}_${day}`);
                if (percentCell) {
                    const percentText = percentCell.textContent;
                    const percentValue = parseFloat(percentText) || 0;

                    const typeInput = document.querySelector(`input[name="row${rowId}_day${day}_type"]`);
                    const totalInput = document.querySelector(`input[name="row${rowId}_day${day}_total"]`);

                    if (typeInput && totalInput && typeInput.value && totalInput.value) {
                        totalPercentage += percentValue;
                        count++;
                    }
                }
            }

            const average = count > 0 ? (totalPercentage / count).toFixed(2) + '%' : '0%';
            const avgCell = document.getElementById(`row${rowId}_average`);
            if (avgCell) {
                avgCell.innerHTML = `<strong>${average}</strong>`;
            }
        }

        function updateRowTotal(rowId) {
            let sumType = 0;
            let sumTotal = 0;

            for (let day = 1; day <= 31; day++) {
                const typeInput = document.querySelector(`input[name="row${rowId}_day${day}_type"]`);
                const totalInput = document.querySelector(`input[name="row${rowId}_day${day}_total"]`);

                sumType += parseFloat(typeInput?.value) || 0;
                sumTotal += parseFloat(totalInput?.value) || 0;
            }

            const totalCell = document.getElementById(`row${rowId}_total`);
            if (totalCell) {
                totalCell.innerHTML = `<strong>${sumType.toFixed(2)}/${sumTotal.toFixed(2)}</strong>`;
            }
        }

        function updateRowAverage(rowId) {
            const avgCell = document.getElementById(`row${rowId}_average`);
            if (avgCell) {
                avgCell.innerHTML = `<strong>${calculateRowAverage(rowId)}</strong>`;
            }
        }

        function updateRowTotal(rowId) {
            const totalCell = document.getElementById(`row${rowId}_total`);
            if (totalCell) {
                totalCell.innerHTML = `<strong>${calculateRowTotal(rowId)}</strong>`;
            }
        }




        function generateInputFields(count, fieldType, rowId, daysData = []) {
            let inputs = '';
            for (let day = 1; day <= count; day++) {
                // Find the data for the current day
                const dayData = daysData.find(item => parseInt(item.day) === day) || {};
                const typeValue = dayData.type || '';
                const totalValue = dayData.total || '';

                if (fieldType === 'type') {
                    // Calculate percentage
                    const percentage = calculatePercentage(typeValue, totalValue);

                    inputs += `
                                                                                                                                                                            <td><input type="text" class="form-control" name="row${rowId}_day${day}_type" value="${typeValue}"></td>
                                                                                                                                                                            <td rowspan="2" id="percentage_${rowId}_${day}" class="percentage-cell">${percentage}</td>
                                                                                                                                                                        `;
                } else if (fieldType === 'total') {
                    inputs += `
                                                                                                                                                                            <td><input type="text" class="form-control" name="row${rowId}_day${day}_total" value="${totalValue}"></td>
                                                                                                                                                                        `;
                }
            }
            return inputs;
        }

        function calculatePercentage(typeValue, totalValue) {
            if (!typeValue || !totalValue || isNaN(parseFloat(typeValue)) || isNaN(parseFloat(totalValue)) || parseFloat(totalValue) == 0) {
                return '0%';
            }
            return ((parseFloat(typeValue) / parseFloat(totalValue)) * 100).toFixed(2) + '%';
        }

        function setupInputListeners() {
            // Add input event listeners to all type and total inputs
            document.querySelectorAll('input[name^="row"]').forEach(input => {
                input.addEventListener('input', function () {
                    const nameParts = this.name.match(/row(\d+)_day(\d+)_(\w+)/);
                    if (nameParts) {
                        const rowId = nameParts[1];
                        const day = nameParts[2];

                        updatePercentage(rowId, day);
                        updateRowAverage(rowId);
                        updateRowTotal(rowId);
                    }
                });
            });
        }

        function updatePercentage(rowId, day) {
            const typeInput = document.querySelector(`input[name="row${rowId}_day${day}_type"]`);
            const totalInput = document.querySelector(`input[name="row${rowId}_day${day}_total"]`);
            const percentageCell = document.getElementById(`percentage_${rowId}_${day}`);

            if (typeInput && totalInput && percentageCell) {
                const percentage = calculatePercentage(typeInput.value, totalInput.value);
                percentageCell.textContent = percentage;
            }
        }


        function submitFormData() {
            console.log("Submit button clicked!");

            const formData = [];
            const activeItem = document.querySelector(".wapp-chat-item.active");
            const labId = document.getElementById('labDropdown').value || '{{ auth()->user()->lab_id }}';
            const reportMonth = document.getElementById('reportMonth').value;

            if (!activeItem) {
                console.error("No active menu item found!");
                return;
            }

            const menuId = activeItem.getAttribute('data-id');
            const title = activeItem.textContent.trim();
            const subtitle = window.currentDescription || '';

            const departments = [
                "Bio-Chemistry", "Immunology", "Haematology", "Serology", "Micro Biology",
                "Molecular Biology", "Histo Pathology", "Cytology", "Clinical Pathology",
                "CytoGenetics", "Genetics"
            ];

            departments.forEach((department, index) => {
                const rowId = index + 1;
                const avgCell = document.getElementById(`row${rowId}_average`);
                const totalCell = document.getElementById(`row${rowId}_total`);

                const rowData = {
                    id: rowId,
                    title: menuId,
                    subtitle: subtitle,
                    lab_id: labId,
                    report_month: reportMonth,
                    average: avgCell ? avgCell.textContent.replace('%', '') : '0',
                    total_misidentified: totalCell ? totalCell.textContent.split('/')[0] : '0',
                    total_samples: totalCell ? totalCell.textContent.split('/')[1] : '0',
                    days: []
                };

                for (let day = 1; day <= 31; day++) {
                    const typeInput = document.querySelector(`input[name="row${rowId}_day${day}_type"]`);
                    const totalInput = document.querySelector(`input[name="row${rowId}_day${day}_total"]`);

                    const typeValue = typeInput ? typeInput.value : '';
                    const totalValue = totalInput ? totalInput.value : '';

                    if (typeValue || totalValue) {
                        rowData.days.push({
                            day: day,
                            type: typeValue,
                            total: totalValue,
                            percentage: document.getElementById(`percentage_${rowId}_${day}`)?.textContent.replace('%', '') || '0'
                        });
                    }
                }

                formData.push(rowData);
            });

            console.log('Form Data:', formData);

            fetch('/api/submit-quality-form2', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({
                    lab_id: labId,
                    report_month: reportMonth,
                    rows: formData
                }),
            })
                .then(response => {
                    if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
                    return response.json();
                })
                .then(data => {
                    console.log('Success:', data);
                    alert('Form submitted successfully!');
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while submitting the form: ' + error.message);
                });
        }
    </script>

    </html>

@endsection