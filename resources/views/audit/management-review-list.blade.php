@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Management Review Meeting List</title>
        <!-- FullCalendar CSS (optional) -->
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet">

        <!-- FullCalendar JS -->
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
    </head>
    <style>
        .panel1 {

            overflow: auto;
            top: 50px;
            position: fixed;
            /* top: 0; */
            right: -100%;
            width: calc(100% - 120px);
            height: 90%;
            background: #f8f9fa;
            box-shadow: -2px 0px 5px rgba(0, 0, 0, 0.3);
            padding: 0 20px;
            transition: 0.5s ease;
        }

        .panel1.open {
            right: 0;
            bottom: 0;
            margin: 20px;
            z-index: 1000;
        }

        .closeBtn1 {
            /* overflow: auto; */
            top: 52px;
            position: fixed;
            /* top: 0; */
            right: -100%;
            width: 30px;
            height: 30px;
            background: #ff2222;
            padding: 5px;
            transition: 0.5s ease;
            border-radius: 50% 0 0 50%;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            color: #f8f9fa;
            font-weight: 700;
            cursor: pointer;
        }

        .closeBtn1.opened {
            right: calc(100% - 100px);
            top: 100px;
            z-index: 1000;
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
            border: 1px solid #ddd !important;
        }

        .stock-planner-table th {
            background-color: #007BFF !important;
            color: white !important;
        }

        .sticky {
            position: sticky;
            background: white;
            z-index: 2;
            box-shadow: 2px 0px 5px rgba(0, 0, 0, 0.1);
            /* Optional for better visibility */
        }
    </style>

    <body>
        <div class="main ">
            <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
                <div style="font-size: 20px;">Management Review Meeting List</div>
            </div>
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="stock-planner-table">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Scheduled MRM Date</th>
                            <th>Competed MRM Date</th>
                            <th>Meeting Minutes</th>
                            <th>No. Of Action Items</th>
                            <th>MRM Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->target_date }}</td>
                                <td>{{ $item->completed_date ?? '--' }}</td>
                                <td><a href="javascript:void(0)"
                                        onclick="openDocument1('{{ $item->id }}', '{{ $item->item }}')">{{ $item->item }}</a>
                                </td>
                                <td>22</td>
                                <td>{{ $item->status ?? '--' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <!-- This is the updated modal panel with the form for updating records -->
        <div id="documentClose1" class="closeBtn1" onclick="documentClose1()">
            X
        </div>
        <div id="documentOpen1" class="panel1">
            <form action="{{ route('management.review.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" id="record_id" name="record_id">
                <div style="position: relative; ">
                    <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4"
                        style="margin-top: 0.6rem;">
                        <div style="font-size: 20px;" id='documentPanel1Heading'></div>
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="stock-planner-table" id="stickyTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Item</th>
                                <th>Discussion Guidance</th>
                                <th>Key Notes</th>
                                <th>Actions Agreed</th>
                                <th>Responsible</th>
                                <th>Target Date</th>
                                <th>Actions Taken</th>
                                <th>Completion Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $items = [
                                    ['id' => 1, 'item' => 'Review previous actions', 'discussion' => 'Review and confirm the status of actions raised or carried over from last management review'],
                                    ['id' => 2, 'item' => 'Customer complaints', 'discussion' => 'Review any customer complaints reported since the last meeting. Confirm the status of investigations and corrective actions'],
                                    ['id' => 3, 'item' => 'Environmental incidents / complaints', 'discussion' => 'Review any environmental incidents reported since the last meeting. Confirm the status of investigations and corrective actions'],
                                    ['id' => 4, 'item' => 'Accidents and near misses', 'discussion' => 'Review any accidents and near misses reported since the last meeting. Confirm the status of investigations and corrective actions'],
                                    ['id' => 5, 'item' => 'Information security incidents', 'discussion' => 'Review any information security incidents and personal information breaches reported since the last meeting. Confirm the status of communications with the ICO and affected personal information subjects. Confirm the status of the investigations and corrective/ preventive actions raised.'],
                                    ['id' => 6, 'item' => 'Customer Feedback', 'discussion' => 'Review any customer feedback received since the last meeting and confirm the status of the investigations and corrective actions.'],
                                    ['id' => 7, 'item' => 'Control measures assessments – Information Security', 'discussion' => 'Review the results of any information security control measures assessments completed. Confirm the status of any corrective/ preventive actions raised. Review the schedule for control measures assessments and the status of planned assessments.'],
                                    ['id' => 8, 'item' => 'Control measures assessments – Health and Safety', 'discussion' => 'Review the results of any health and safety control measures assessments completed. Confirm the status of any corrective/preventive actions raised. Review the schedule for control measures assessments and the status of planned assessments. Confirm the involvement of employees in relation to determining and implementing controls.'],
                                    ['id' => 9, 'item' => 'Communication', 'discussion' => 'Confirm and review any external third-party communications received (or meetings held) involving health, safety, environmental and information security matters. Confirm employee communications involving health, safety, environmental and information security matters completed or planned. Confirm any other communication with interested parties about health and safety.'],
                                    ['id' => 10, 'item' => 'Internal resources', 'discussion' => 'Review training requirements and confirm the status of any training planned'],
                                    ['id' => 11, 'item' => 'Equipment / infrastructure maintenance', 'discussion' => 'Confirm equipment/infrastructure inspections, maintenance and calibration completed and planned. Confirm proposed changes to the Equipment and Maintenance Register. Confirm areas where additional resource is required to complete the schedule. Review any complaints received relating to the organisation’s environmental performance or BMS.'],
                                    ['id' => 12, 'item' => 'Suppliers and subcontractors', 'discussion' => 'Review any supplier-related complaints/problems or audits since the last meeting. Confirm the status of any investigations and actions. Review and agree any changes to suppliers’ approved status on the Approved Suppliers Register. Confirm the involvement of employees in establishing controls for the use of external resources.'],
                                    ['id' => 13, 'item' => 'Environmental aspects', 'discussion' => 'Confirm the organisation’s Significant Environmental Aspects on the Environmental Aspects Register. Confirm any new environmental aspect assessments completed or reviewed and the results of this work. Confirm the status of actions and of any environmental aspect assessments/reviews planned.'],
                                    ['id' => 14, 'item' => 'Risk assessments – Information Security', 'discussion' => 'Review all new information security threats or vulnerabilities. Confirm proposed changes to the information security risk treatment plan or Statement of Applicability. Confirm areas where additional resource is required to achieve the plans.'],
                                    ['id' => 15, 'item' => 'Risk assessments – Health and Safety', 'discussion' => 'Confirm health and safety risk assessments completed or reviewed and the results of this work. Confirm areas where additional resource is required to achieve the plans.'],
                                    ['id' => 16, 'item' => 'Compliance requirements', 'discussion' => 'Confirm any new, legal or other requirements identified. Confirm the results of any compliance audits completed. Confirm the status of any actions. Confirm the status of any information security compliance audits planned.'],
                                    ['id' => 17, 'item' => 'Emergency plans', 'discussion' => 'Confirm the results of any fire drills or other emergency drills completed. Confirm the status of any corrective actions. Review the Emergency Plan and confirm any proposed changes.'],
                                    ['id' => 18, 'item' => 'Business continuity', 'discussion' => 'Confirm the results of any tests completed. Confirm the status of any corrective/ preventive actions raised. Review the Business Continuity Plan and confirm any proposed changes'],
                                    ['id' => 19, 'item' => 'Objectives and Process Performance', 'discussion' => 'Review the quality, environmental, health and safety, and information security objectives and performance indicators (including any trends) on the Objectives and KPI Register. Confirm proposed changes to quality, environmental, health and safety, and information security objectives. Confirm the involvement of employees in setting the objectives and in determining how to achieve them. Confirm areas where additional resource is required to achieve the plans.'],
                                    ['id' => 20, 'item' => 'Internal audits', 'discussion' => 'Confirm the results of any internal audits completed. Confirm the status of any corrective actions. Review the Internal Audit Plan and confirm the status of internal audits planned. Confirm the involvement of employees in establishing the audit schedule.'],
                                    ['id' => 21, 'item' => 'External audits', 'discussion' => 'Confirm the results of any external audits completed. Confirm the status of any corrective actions. Review the status of any external audits planned.'],
                                    ['id' => 22, 'item' => 'Problems / nonconformities/ Improvement opportunities', 'discussion' => 'Review any outstanding BMS- related improvement ideas, problems or nonconformities (not covered on agenda items above). Review any BMS-related improvement ideas, problems or nonconformities raised/reported since the last meeting. Confirm the status of the investigations and corrective/ preventive actions raised. Review any improvement opportunities not covered under other agenda items (not covered on agenda items above).'],
                                    ['id' => 23, 'item' => 'Needs and expectations of interested parties', 'discussion' => 'Review the needs and expectations of relevant interested parties. Confirm any changes to the needs and expectations of relevant interested parties. Confirm any new interested parties identified and their needs and expectations. Confirm the involvement of employees in establishing these needs and expectations.'],
                                    ['id' => 24, 'item' => 'Business risks and opportunities', 'discussion' => 'Review business risks and opportunities and any actions to address them. Confirm any new business risks/ opportunities identified and any changes to the business risks and opportunities assessment. Confirm any actions arising from changes to the Business Risks, Opportunities and Interested Parties Register. Confirm the involvement of employees in assessing these risks and opportunities.'],
                                    ['id' => 25, 'item' => 'Changes affecting the BMS', 'discussion' => 'Review changes to internal issues, external issues and interested parties that affect the organisation. Review the impact of changes and confirm any actions. Review the current management system scope and confirm it still adequately reflects the scope of the certification.'],
                                    ['id' => 26, 'item' => 'Policy review', 'discussion' => 'Review the Quality Policy, Environmental Policy, Occupational Health and Safety Policy and Information Security Policy. Confirm the involvement of employees in setting the Occupational Health and Safety Policy. Confirm whether they are still appropriate to the organisation and any changes required.'],
                                    ['id' => 27, 'item' => 'A.O.B.', 'discussion' => ''],
                                ];
                            @endphp
                            @foreach($items as $index => $data)
                                <tr>
                                    <td>{{ $data['id'] }}</td>
                                    <td>
                                        <strong>{{ $data['item'] }}</strong>
                                        <input type="hidden" name="items[{{ $index }}][item]" value="{{ $data['item'] }}">
                                        <input type="hidden" name="items[{{ $index }}][id]" value="{{ $data['id'] }}">
                                    </td>
                                    <td>
                                        {{ $data['discussion'] }}
                                        <input type="hidden" name="items[{{ $index }}][discussion_guidance]"
                                            value="{{ $data['discussion'] }}">
                                    </td>
                                    <td>
                                        <textarea name="items[{{ $index }}][key_notes]" cols="30" rows="2"></textarea>
                                    </td>
                                    <td>
                                        <textarea name="items[{{ $index }}][actions_agreed]" cols="30" rows="2"></textarea>
                                    </td>
                                    <td>
                                        <textarea name="items[{{ $index }}][responsibility]" cols="30" rows="2"></textarea>
                                    </td>
                                    <td>
                                        <input type="date" name="items[{{ $index }}][target_date]">
                                    </td>
                                    <td>
                                        <textarea name="items[{{ $index }}][actions_taken]" cols="30" rows="2"></textarea>
                                    </td>
                                    <td>
                                        <input type="date" name="items[{{ $index }}][completed_date]">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </body>
    <script>
        // Improved JavaScript for fetching and populating form data
        function openDocument1(id, title) {
            // Set the ID in a hidden input field for form submission
            document.getElementById('record_id').value = id;

            // Set the title in the modal heading
            document.getElementById('documentPanel1Heading').textContent = title;

            // Add the 'opened' class to the close button
            document.getElementById('documentClose1').classList.add('opened');

            // Add the 'open' class to the modal
            document.getElementById('documentOpen1').classList.add('open');

            // Fetch the record data
            fetchRecordData(id);
        }

        function documentClose1() {
            document.getElementById('documentClose1').classList.remove('opened');
            document.getElementById('documentOpen1').classList.remove('open');
        }

        function fetchRecordData(id) {
            // Get CSRF token from the meta tag
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Use AJAX to fetch the record data
            fetch(`/management/review/${id}/edit`, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    // Populate form fields with the data
                    populateFormFields(data);
                })
                .catch(error => {
                    console.error('Error fetching record data:', error);
                    alert('Failed to load record data. Please try again.');
                });
        }

        function populateFormFields(data) {
            // Reset any existing populated data first
            resetFormFields();

            // Debug the received data
            console.log("Received data:", data);

            // Loop through the items and populate the form fields
            if (data.items && data.items.length > 0) {
                data.items.forEach(item => {
                    console.log("Processing item:", item);

                    // Find the row with matching item id
                    const allRows = document.querySelectorAll("#stickyTable tbody tr");
                    let matchingRow = null;

                    allRows.forEach(row => {
                        const idInput = row.querySelector('input[name$="[id]"]');
                        if (idInput && parseInt(idInput.value) === parseInt(item.id)) {
                            matchingRow = row;
                        }
                    });

                    // If no matching row by ID, try to match by item name
                    if (!matchingRow) {
                        allRows.forEach(row => {
                            const itemInputs = row.querySelectorAll('input[name$="[item]"]');
                            itemInputs.forEach(input => {
                                if (input.value === item.item) {
                                    matchingRow = row;
                                }
                            });
                        });
                    }

                    // If still no match, get by index
                    if (!matchingRow && item.id <= allRows.length) {
                        matchingRow = allRows[item.id - 1];
                    }

                    if (matchingRow) {
                        console.log("Found matching row for item:", item.id);

                        // Get all textareas in this row
                        const textareas = matchingRow.querySelectorAll('textarea');
                        if (textareas.length >= 1 && item.key_notes) textareas[0].value = item.key_notes;
                        if (textareas.length >= 2 && item.actions_agreed) textareas[1].value = item.actions_agreed;
                        if (textareas.length >= 3 && item.responsibility) textareas[2].value = item.responsibility;
                        if (textareas.length >= 4 && item.actions_taken) textareas[3].value = item.actions_taken;

                        // Get all date inputs in this row
                        const dateInputs = matchingRow.querySelectorAll('input[type="date"]');
                        if (dateInputs.length >= 1 && item.target_date) dateInputs[0].value = item.target_date;
                        if (dateInputs.length >= 2 && item.completed_date) dateInputs[1].value = item.completed_date;

                        // Show existing file if available
                        if (item.file_path) {
                            const cells = matchingRow.querySelectorAll('td');
                            if (cells.length >= 8) {
                                const fileCell = cells[7]; // 8th cell (index 7)
                                // Check if the file info already exists
                                const existingFileInfo = fileCell.querySelector('.existing-file-info');
                                if (!existingFileInfo) {
                                    const fileInfoDiv = document.createElement('div');
                                    fileInfoDiv.className = 'existing-file-info mb-2';
                                    // fileInfoDiv.innerHTML = `
                                    //                     <a href="/storage/${item.file_path}" target="_blank" class="existing-file">
                                    //                         Current file
                                    //                     </a>
                                    //                 `;
                                    fileInfoDiv.innerHTML = `
  <a href="/storage/app/public/${item.file_path}" target="_blank">Current file</a>
`;
                                    fileCell.insertBefore(fileInfoDiv, fileCell.firstChild);
                                }
                            }
                        }
                    } else {
                        console.warn("No matching row found for item:", item);
                    }
                });
            } else {
                console.warn("No items found in the data or data.items is empty");
            }
        }

        function resetFormFields() {
            // Clear all textareas
            document.querySelectorAll('#stickyTable textarea').forEach(textarea => {
                textarea.value = '';
            });

            // Clear all date inputs
            document.querySelectorAll('#stickyTable input[type="date"]').forEach(input => {
                input.value = '';
            });

            // Remove existing file info
            document.querySelectorAll('.existing-file-info').forEach(div => {
                div.remove();
            });
        }

        // Make sure the table sticky positioning works correctly
        document.addEventListener("DOMContentLoaded", function () {
            const table = document.querySelector("#stickyTable");

            if (table) {
                const rows = table.querySelectorAll("tr");

                rows.forEach(row => {
                    const cells = row.querySelectorAll("th, td");

                    if (cells.length >= 3) {
                        // Apply sticky positioning dynamically
                        cells[0].classList.add("sticky");
                        cells[0].style.left = "0px";

                        cells[1].classList.add("sticky");
                        cells[1].style.left = `${cells[0].offsetWidth}px`;

                        cells[2].classList.add("sticky");
                        cells[2].style.left = `${cells[0].offsetWidth + cells[1].offsetWidth}px`;
                    }
                });

                // Update column position on window resize
                window.addEventListener("resize", () => {
                    rows.forEach(row => {
                        const cells = row.querySelectorAll("th, td");
                        if (cells.length >= 3) {
                            cells[1].style.left = `${cells[0].offsetWidth}px`;
                            cells[2].style.left = `${cells[0].offsetWidth + cells[1].offsetWidth}px`;
                        }
                    });
                });
            }
        });
    </script>
    <script>
        // Set up CSRF token for all AJAX requests
        document.addEventListener('DOMContentLoaded', function () {
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Configure all AJAX requests to include the CSRF token
            window.fetch = new Proxy(window.fetch, {
                apply: function (fetch, that, args) {
                    // Only modify requests to our own domain
                    if (args[0].toString().startsWith('/') || args[0].toString().startsWith(window.location.origin)) {
                        // If the first argument is a Request object
                        if (args[0] instanceof Request) {
                            if (!args[0].headers.has('X-CSRF-TOKEN')) {
                                args[0] = new Request(args[0], {
                                    headers: new Headers({
                                        ...Object.fromEntries(args[0].headers.entries()),
                                        'X-CSRF-TOKEN': token
                                    })
                                });
                            }
                        }
                        // If the first argument is a URL and the second is options
                        else if (args[1] && typeof args[1] === 'object') {
                            if (!args[1].headers || !args[1].headers['X-CSRF-TOKEN']) {
                                args[1] = {
                                    ...args[1],
                                    headers: {
                                        ...args[1].headers,
                                        'X-CSRF-TOKEN': token
                                    }
                                };
                            }
                        }
                    }

                    return fetch.apply(that, args);
                }
            });
        });

        // Add this script to debug form submission issues
        document.addEventListener('DOMContentLoaded', function () {
            // Find the form
            const form = document.querySelector('form[action*="management.review.update"]');

            if (form) {
                console.log('Form found, adding submission handler');

                // Add submit event listener
                form.addEventListener('submit', function (e) {
                    console.log('Form submit triggered');

                    // Log form data
                    const formData = new FormData(form);
                    console.log('Form action:', form.action);
                    console.log('Form method:', form.method);

                    // Log key fields
                    console.log('record_id:', formData.get('record_id'));

                    // Check if any input fields have the same name
                    const inputNames = {};
                    const duplicates = [];

                    form.querySelectorAll('input, textarea, select').forEach(input => {
                        if (input.name) {
                            if (inputNames[input.name]) {
                                duplicates.push(input.name);
                            } else {
                                inputNames[input.name] = true;
                            }
                        }
                    });

                    if (duplicates.length > 0) {
                        console.warn('Duplicate input names found:', duplicates);
                    }

                    // Don't prevent default, let the form submit
                });

                console.log('Form submission debugging set up successfully');
            } else {
                console.error('Form not found in the DOM');
            }
        });
    </script>

    </html>

@endsection