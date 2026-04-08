@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Control Usage</title>
        <style>
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

            .ilc-modal {
                display: none;
                position: fixed;
                z-index: 1;
                left: 0;
                top: 0;
                width: 100%;
                height: calc(100vh);
                background-color: rgba(0, 0, 0, 0.4);
                overflow: auto;
            }

            .ilc-modal-content {
                background-color: #fefefe;
                margin: 8% auto;
                padding: 20px;
                border: 1px solid #888;
                width: 80%;
                overflow: auto;
            }

            .ilc-close {
                color: #aaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }

            .ilc-close:hover,
            .ilc-close:focus {
                color: black;
                text-decoration: none;
                cursor: pointer;
            }

            .ilc-selected-items {
                margin-top: 10px;
            }

            .selection {
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
            }
        </style>
    </head>

    <body>
        <div class="main ">
            <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
                <div style="font-size: 20px;">Control Usage</div>
                <div style="font-size: 20px; gap:10px" class='d-flex'>
                    <select class='form-control' id="labDropdown">
                        <option value="">-- Select Labs --</option>
                        @foreach ($locations as $lab)
                            <option value="{{ $lab->id }}">{{ $lab->location }}</option>
                        @endforeach
                    </select>
                    <button type="button" class="btn btn-warning" id="submitcontrol">Submit</button>
                </div>

            </div>


            <div class="table-responsive" style="padding-right: 1rem;">
                <table class="stock-planner-table" id="controlUsageTable">
                    <thead>
                        <tr>
                            <th rowspan="2">
                                <div class="d-flex" style="justify-content: space-around;">
                                    <span> <i class="fa-solid fa-arrow-down"></i> Parameter</span> <span> Days <i
                                            class="fa-solid fa-arrow-right"></i></span>
                                </div>
                            </th>
                            @for ($i = 1; $i <= 31; $i++)
                                <th colspan="2" rowspan="2">
                                    {{ $i }}<sup>{{ $i == 1 ? 'st' : ($i == 2 ? 'nd' : ($i == 3 ? 'rd' : 'th')) }}</sup>
                                </th>
                            @endfor
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data will be populated dynamically -->
                    </tbody>
                </table>
            </div>
            <div id="modalTemplate" style="display: none;">
                <div class="ilc-modal">
                    <div class="ilc-modal-content">
                        <span class="close">&times;</span>
                        <div class="row" style="gap: 50px;align-items: center;">
                            <table class="table test-parameters-table" style="width: fit-content;">
                                <thead>
                                    <tr>
                                        <th style="width: 20rem;">Parameter</th>
                                        <th><input type="checkbox" class="selectAll"> Select All</th>
                                        <th>Aspiration Qty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Parameters will be populated here -->
                                </tbody>
                            </table>
                            <table class="quantity-table" style="width: fit-content; height: fit-content;">
                                <tbody>
                                    <tr>
                                        <td>Aliquoted Qty</td>
                                        <td><input type="number" class="aliquoted-qty" value="100" min="0" step="0.1"></td>
                                    </tr>
                                    <tr>
                                        <td>Utilized Qty</td>
                                        <td><input type="number" class="utilized-qty" value="90" min="0" step="0.1"></td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td class="total-qty">-10μl</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button class="confirm-selection btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>

    </html>
    <script>
        function callmodel() {
            // Get all modal triggers
            const openModalBtns = document.querySelectorAll('.open-modal-btn');
            const modals = document.querySelectorAll('.ilc-modal');
            // const closeBtns = document.querySelectorAll('.close');
            const confirmBtns = document.querySelectorAll('.confirm-selection');
            const modalOptions = document.querySelectorAll('.ilc-modal-option');

            // Open modal for each button
            openModalBtns.forEach((button, index) => {
                const modal = modals[index];
                const selectionDiv = button.nextElementSibling;
                const confirmBtn = confirmBtns[index];

                button.addEventListener('click', () => {
                    modal.style.display = 'block';
                });

                // Close the modal
                // closeBtns[index].addEventListener('click', () => {
                //     modal.style.display = 'none';
                // });

                // Handle confirm selection
                confirmBtn.addEventListener('click', () => {
                    const selectedOptions = [];

                    // Gather all selected options
                    modal.querySelectorAll('.ilc-modal-option:checked').forEach(option => {
                        selectedOptions.push(option.dataset.option);
                    });

                    // Show selected options below the button
                    if (selectedOptions.length > 0) {
                        // selectionDiv.innerHTML = `Selected: ${selectedOptions.join(', ')}`;
                        selectedOptions.forEach(option => {
                            const span = document.createElement('span');
                            span.textContent = option;
                            span.style.padding = '5px 10px';
                            span.style.border = '1px solid #ccc';
                            span.style.borderRadius = '5px';
                            span.style.backgroundColor = '#f0f0f0';
                            span.style.color = '#333';
                            selectionDiv.appendChild(span);
                        });
                    } else {
                        selectionDiv.innerHTML = 'No options selected.';
                    }

                    // Close the modal
                    modal.style.display = 'none';
                });
            });

            // Close modal if clicked outside
            window.addEventListener('click', (e) => {
                modals.forEach(modal => {
                    if (e.target === modal) {
                        modal.style.display = 'none';
                    }
                });
            });
        }
        callmodel()
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            let currentLabId = null;
            let parametersData = [];

            // Initialize modals with proper selection handling
            function initializeModals() {
                // Open modal when button is clicked
                $(document).on('click', '.open-modal-btn', function () {
                    const modal = $(this).siblings('.ilc-modal');
                    modal.css('display', 'block');

                    // Initialize the modal with proper data
                    const parameterName = $(this).closest('tr').find('td:first').text().trim();
                    const parameter = parametersData.find(p => p.control_name === parameterName);

                    if (parameter && parameter.parameters) {
                        const modalBody = modal.find('#testTable tbody');
                        modalBody.empty();

                        parameter.parameters.forEach((param, index) => {
                            modalBody.append(`
                                                        <tr>
                                                            <td class="align-middle">
                                                                <input type="checkbox" class="ilc-modal-option" 
                                                                    data-option="${param}" 
                                                                    data-code="T00${index + 1}">
                                                            </td>
                                                            <td><input type="text" class="form-control w-100 test-code" value="T00${index + 1}"></td>
                                                            <td><input type="text" class="form-control w-100 test-name" value="${param}"></td>
                                                        </tr>
                                                    `);
                        });
                    }
                });

                // Close modal when X is clicked
                $(document).on('click', '.ilc-modal .close', function () {
                    $(this).closest('.ilc-modal').css('display', 'none');
                });

                // Close modal when clicking outside
                $(window).on('click', function (e) {
                    if ($(e.target).hasClass('ilc-modal')) {
                        $(e.target).css('display', 'none');
                    }
                });

                // Select all checkboxes
                $(document).on('change', '#selectAll', function () {
                    $(this).closest('table').find('.ilc-modal-option').prop('checked', this.checked);
                });

                // Confirm selection
                $(document).on('click', '.confirm-selection', function () {
                    const modal = $(this).closest('.ilc-modal');
                    const selectionDiv = modal.siblings('.selection');

                    const selectedTests = [];
                    modal.find('.ilc-modal-option:checked').each(function () {
                        const row = $(this).closest('tr');
                        selectedTests.push({
                            code: row.find('.test-code').val(),
                            name: row.find('.test-name').val()
                        });
                    });

                    const aliquotedQty = parseFloat(modal.find('.aliquoted-qty').val()) || 0;
                    const utilizedQty = parseFloat(modal.find('.utilized-qty').val()) || 0;

                    selectionDiv.empty();
                    if (selectedTests.length > 0) {
                        selectedTests.forEach(test => {
                            selectionDiv.append(`
                                                        <span class="badge bg-primary me-1">
                                                            ${test.code} (${test.name})
                                                        </span>
                                                    `);
                        });

                        // Store all data for submission
                        selectionDiv.data('selected-tests', selectedTests);
                        selectionDiv.data('aliquoted-qty', aliquotedQty);
                        selectionDiv.data('utilized-qty', utilizedQty);
                    } else {
                        selectionDiv.text('No tests selected');
                    }

                    modal.css('display', 'none');
                });

                // Calculate totals
                $(document).on('input', '.aliquoted-qty, .utilized-qty', function () {
                    const modal = $(this).closest('.ilc-modal');
                    const aliquoted = parseFloat(modal.find('.aliquoted-qty').val()) || 0;
                    const utilized = parseFloat(modal.find('.utilized-qty').val()) || 0;
                    const total = utilized - aliquoted;
                    modal.find('.total-qty').text(total.toFixed(1) + 'μl');
                });
            }

            // Load lab data
            $('#labDropdown').change(function () {
                currentLabId = $(this).val();
                if (!currentLabId) {
                    $('#controlUsageTable tbody').empty();
                    return;
                }

                $.ajax({
                    url: '/get-lab-details',
                    type: 'GET',
                    data: { labId: currentLabId },
                    success: function (response) {
                        if (response.success) {
                            parametersData = response.data.control_setup || [];
                            buildCalendarTable();
                        } else {
                            alert('Error loading parameters: ' + response.message);
                        }
                    },
                    error: function (xhr) {
                        alert('An error occurred while fetching lab details.');
                    }
                });
            });

            function buildCalendarTable() {
                let tableBody = '';

                // Group parameters by department
                const departments = {};
                parametersData.forEach(param => {
                    if (!departments[param.department]) {
                        departments[param.department] = [];
                    }
                    departments[param.department].push(param);
                });

                // Build table rows for each department
                for (const [department, params] of Object.entries(departments)) {
                    tableBody += `<tr><td colspan="94">${department}</td></tr>`;

                    params.forEach(param => {
                        // Scheduled row
                        tableBody += `<tr><td rowspan="2">${param.control_name}</td>`;

                        // Add cells for each day (31 days)
                        for (let day = 1; day <= 31; day++) {
                            tableBody += `
                                                        <td>
                                                            <div class="instance">
                                                                <button class="open-modal-btn btn btn-info mb-4">Scheduled</button>
                                                                <div class="selection"></div>
                                                                <div class="ilc-modal">
                                                                 <div class='ilc-modal-content' style="padding: 20px;">
                            <span class="close">&times;</span>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <input type="text" class="form-control w-100 search-input" placeholder="Search for Test Codes or Names">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 pe-3">
                                    <table class="table table-bordered" style="table-layout: fixed;">
                                        <thead class="thead-light">
                                            <tr>
                                                <th style="width: 50px;"><input type="checkbox" id="selectAll"></th>
                                                <th style="width: 120px;">Test Code</th>
                                                <th>Test Name</th>
                                                <th style="width: 120px;">Aspiration Qty</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="align-middle"><input type="checkbox" class="ilc-modal-option" data-option="Test One"></td>
                                                <td><input type="text" class="form-control w-100 test-code" value="T001"></td>
                                                <td><input type="text" class="form-control w-100 test-name" value="Test One"></td>
                                                <td><input type="number" class="form-control w-100 aspiration-qty" value="100" min="0"></td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle"><input type="checkbox" class="ilc-modal-option" data-option="Test Two"></td>
                                                <td><input type="text" class="form-control w-100 test-code" value="T002"></td>
                                                <td><input type="text" class="form-control w-100 test-name" value="Test Two"></td>
                                                <td><input type="number" class="form-control w-100 aspiration-qty" value="100" min="0"></td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle"><input type="checkbox" class="ilc-modal-option" data-option="Test Three"></td>
                                                <td><input type="text" class="form-control w-100 test-code" value="T003"></td>
                                                <td><input type="text" class="form-control w-100 test-name" value="Test Three"></td>
                                                <td><input type="number" class="form-control w-100 aspiration-qty" value="100" min="0"></td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle"><input type="checkbox" class="ilc-modal-option" data-option="Test Four"></td>
                                                <td><input type="text" class="form-control w-100 test-code" value="T004"></td>
                                                <td><input type="text" class="form-control w-100 test-name" value="Test Four"></td>
                                                <td><input type="number" class="form-control w-100 aspiration-qty" value="100" min="0"></td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle"><input type="checkbox" class="ilc-modal-option" data-option="Test Five"></td>
                                                <td><input type="text" class="form-control w-100 test-code" value="T005"></td>
                                                <td><input type="text" class="form-control w-100 test-name" value="Test Five"></td>
                                                <td><input type="number" class="form-control w-100 aspiration-qty" value="100" min="0"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table class="table table-bordered" style="width: 100%;">
                                        <tbody>
                                            <tr>
                                                <td style="width: 50%;"><strong>Aliquoted Qty</strong></td>
                                                <td style="width: 50%;"><input type="number" class="form-control w-100 aliquoted-qty" value="100" min="0">μl</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Utilized Qty</strong></td>
                                                <td><input type="number" class="form-control w-100 utilized-qty" value="90" min="0">μl</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Total</strong></td>
                                                <td class="total-qty">-10μl</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 text-end">
                                    <button class="confirm-selection btn btn-primary">Confirm Selection</button>
                                </div>
                            </div>
                        </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span><i class="fa-solid fa-circle-check" style="color: #147500;"></i></span></td>`;
                        }

                        tableBody += `</tr><tr>`;

                        // Unscheduled row
                        for (let day = 1; day <= 31; day++) {
                            tableBody += `
                                                        <td>
                                                            <div class="instance">
                                                                <button class="open-modal-btn btn btn-warning mb-4">UnScheduled</button>
                                                                <div class="selection"></div>
                                                                <div class="ilc-modal">
                                                                    <div class='ilc-modal-content' style="padding: 20px;">
                                                                        <span class="close">&times;</span>
                                                                        <div class="row mb-3">
                                                                            <div class="col-12">
                                                                                <input type="text" class="form-control w-100 search-input" placeholder="Search for Test Codes or Names">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-8 pe-3">
                                                                                <table class="table table-bordered" style="table-layout: fixed;">
                                                                                    <thead class="thead-light">
                                                                                        <tr>
                                                                                            <th style="width: 50px;"><input type="checkbox" id="selectAll"></th>
                                                                                            <th style="width: 120px;">Test Code</th>
                                                                                            <th>Test Name</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody></tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <table class="table table-bordered" style="width: 100%;">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td style="width: 50%;"><strong>Aliquoted Qty</strong></td>
                                                                                            <td style="width: 50%;"><input type="number" class="form-control w-100 aliquoted-qty" value="100" min="0">μl</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><strong>Utilized Qty</strong></td>
                                                                                            <td><input type="number" class="form-control w-100 utilized-qty" value="90" min="0">μl</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><strong>Total</strong></td>
                                                                                            <td class="total-qty">-10μl</td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-3">
                                                                            <div class="col-12 text-end">
                                                                                <button class="confirm-selection btn btn-primary">Confirm Selection</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span><i class="fa-solid fa-circle-check" style="color: #FFD43B;"></i></span></td>`;
                        }

                        tableBody += `</tr>`;
                    });
                }

                $('#controlUsageTable tbody').html(tableBody);
                initializeModals();
            }

            // Submit control usage data
            $('#submitcontrol').click(function () {
                if (!currentLabId) {
                    alert('Please select a lab first.');
                    return;
                }

                const usageData = [];
                let hasData = false;

                $('#controlUsageTable tbody tr').each(function () {
                    const parameterCell = $(this).find('td:first');
                    if (parameterCell.attr('rowspan') !== '2') return;

                    const parameterName = parameterCell.text().trim();
                    const dayCells = $(this).find('td').slice(1);

                    dayCells.each(function (index) {
                        const instance = $(this).find('.instance');
                        if (instance.length) {
                            const day = Math.floor(index / 2) + 1;
                            const isScheduled = $(this).find('.btn-info').length > 0;
                            const selectionDiv = instance.find('.selection');

                            const selectedTests = selectionDiv.data('selected-tests') || [];
                            const aliquotedQty = selectionDiv.data('aliquoted-qty') || 0;
                            const utilizedQty = selectionDiv.data('utilized-qty') || 0;

                            if (selectedTests.length > 0) {
                                hasData = true;
                                usageData.push({
                                    day: day,
                                    is_scheduled: isScheduled,
                                    parameter: parameterName,
                                    tests: selectedTests,
                                    aliquoted_qty: aliquotedQty,
                                    utilized_qty: utilizedQty
                                });
                            }
                        }
                    });
                });

                if (!hasData) {
                    alert('No control usage data to submit.');
                    return;
                }

                $.ajax({
                    url: '/save-control-usage',
                    type: 'POST',
                    data: {
                        lab_id: currentLabId,
                        usage_data: usageData,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        if (response.success) {
                            alert('Data saved successfully!');
                            location.reload();
                        } else {
                            alert('Error: ' + response.message);
                        }
                    },
                    error: function (xhr) {
                        let errorMessage = 'Error saving data';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage += ': ' + xhr.responseJSON.message;
                        }
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            errorMessage += '\n' + JSON.stringify(xhr.responseJSON.errors);
                        }
                        alert(errorMessage);
                    }
                });
            });
        });
    </script>
@endsection