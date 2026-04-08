@extends('layouts.base')
@section('content')

    <!DOCTYPE html>


    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ILC List</title>
        <style>
            .ILC-container {
                padding: 20px;
                background: #fff;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
            }

            .ILC-header {
                text-align: center;
                color: #333;
                margin-bottom: 20px;
            }

            .ILC-table {
                width: 100%;
                border-collapse: collapse;
            }

            .ILC-table th,
            .ILC-table td {
                border: 1px solid #ddd;
                padding: 10px;
                text-align: center;
            }

            .ILC-table th {
                background-color: #f4f4f4;
                color: #333;
            }

            .ILC-btn {
                display: inline-block;
                padding: 8px 12px;
                background-color: #007BFF;
                color: #fff;
                text-decoration: none;
                border-radius: 4px;
                font-size: 14px;
                cursor: pointer;
            }

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

            .open-panel-btn {
                padding: 8px 15px;
                background-color: #007BFF;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 14px;
                margin-top: 10px;
            }

            .open-panel-btn:hover {
                background-color: #0056b3;
            }

            .ILC-filter-section {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 20px;
            }

            .ILC-table select,
            .ILC-table input {
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }

            .form-container-sub {
                margin-top: 1rem;
                /* background: #fff; */
                padding: 20px 30px;
                border-radius: 8px;
                box-shadow: 0 4px 11px 11px rgba(0, 0, 0, 0.1);
                width: 99%;

            }

            .form-container-sub h2 {
                margin-bottom: 20px;
                color: #333;
                text-align: center;
            }

            .form-container-sub form {
                display: flex;
                /* flex-direction: column; */
            }

            .form-container-sub label {
                margin-bottom: 5px;
                /* color: #555; */
                font-weight: 700;
                width: 100%;
                font-size: 14px;
            }

            .form-container-sub input,
            .form-container-sub select,
            .form-container-sub textarea {
                margin-bottom: 15px;
                padding: 10px;
                font-size: 14px;
                border: 1px solid #ccc;
                border-radius: 4px;
                outline: none;
                transition: all 0.3s ease;
                width: 100%;
            }

            .form-container-sub input:focus,
            .form-container-sub select:focus {
                border-color: #007bff;
                box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            }

            .form-container-sub button {
                padding: 10px 15px;
                font-size: 16px;
                color: #fff;
                margin: 1rem 0;
                background-color: #007bff;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            .form-container-sub button:hover {
                background-color: #0056b3;
            }

            .form-container-sub input[type="file"] {
                padding: 5px;
                width: 100%;
            }

            .parameter-table-unique {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            .parameter-table-unique,
            .parameter-table-unique th,
            .parameter-table-unique td {
                border: 1px solid #ddd;
            }

            .parameter-table-unique th,
            .parameter-table-unique td {
                padding: 10px;
                text-align: left;
            }

            .parameter-table-unique select {
                width: 100%;
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }
        </style>
    </head>

    <body>
        <div class="main ">
            <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
                <div style="font-size: 20px;">ILC Table</div>
                <div style="font-size: 20px;">
                    @if(auth()->user()->role == 1)
                        <select id="labDropdown" name="lab" class="form-select" style="width: 200px;"
                            onchange="fetchDataForSelectedLab()">
                            <option value="">-- Select Labs --</option>
                            @foreach ($labs as $lab)
                                <option value="{{ $lab->id }}" {{ $lab->id == auth()->user()->lab_id ? 'selected' : '' }}>
                                    {{ $lab->location }}
                                </option>
                            @endforeach
                        </select>
                    @else
                        <input type="text" value="{{ auth()->user()->lab->location ?? 'My Lab' }}" disabled class="form-control"
                            style="width: 200px;">
                        <input type="hidden" id="labDropdown" name="lab" value="{{ auth()->user()->lab_id }}">
                    @endif
                </div>

            </div>


            <div class="ILC-container">

                <div class="ILC-filter-section">

                    <div>
                        <label for="ILC-department">Select Year:</label>
                        <input type="number" id="year" name="year" min="1900" max="2100" placeholder="YYYY" value="2025">
                    </div>
                </div>
                <table class="ILC-table" id="ILCTable">
                    <thead>
                        <tr>
                            <th>S. No</th>
                            <th>Department</th>
                            <th>Provider</th>
                            <th>Program</th>
                            <th>Status</th>
                            <th>Outcomes</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{$item->department}}</td>
                                <td>{{ $item->ilc_provider }}</td>
                                <td>{{ $item->ilc_program }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->parameters }}</td>
                                <td> <button class="open-panel-btn" onclick="openDocument1({{ $item->id }})">
                                        Show Report
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

            <!-- Overlay and Panel -->
            <div id="documentClose1" class="closeBtn1" onclick="documentClose1()">
                X
            </div>
            <div id="documentOpen1" class="panel1">
                <div style="position: relative;">
                    <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4"
                        style="margin-top: 0.6rem;">
                        <div style="font-size: 20px;" id='documentPanel1Heading'>Details</div>
                        <div class="btn btn-warning">
                            <input type="file">
                        </div>
                    </div>
                </div>

                <div class="table-responsive form-container-sub" style="padding-right: 1rem;">
                    <table class="parameter-table-unique">
                        <thead>
                            <tr>
                                <th>Department</th>
                                <th>ILC Provider</th>
                                <th>ILC Program</th>
                                <th>ILC Cycles</th>
                            </tr>
                        </thead>
                        <tbody id="documentDetailsTable">
                            <!-- Table content will be dynamically inserted here -->
                        </tbody>
                    </table>
                </div>

                <div class="form-container-sub">
                    <form class="row">
                        <div class="col-md-3">
                            <label for="last_submission_date">ILC Last Submission Date</label>
                            <input type="date" id="last_submission_date" disabled readonly>
                        </div>
                        <div class="col-md-3">
                            <label for="ilcs_submission_date">ILC Submission Date</label>
                            <input type="date" id="ilcs_submission_date" disabled readonly>
                        </div>

                        <div class="col-md-3">
                            <label for="status_select">Status</label>
                            <select id="status_select" name="gender" disabled readonly>
                                <option value="">Select</option>
                                <option value="completed">Completed</option>
                                <option value="inprogress">Inprogress</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="attachment">Attachment</label>
                            <input type="file" id="attachment" name="file" disabled readonly>
                        </div>

                        <div class="col-md-6">
                            <label for="parameters_textarea">All Parameters</label>
                            <textarea id="parameters_textarea" cols="30" rows="10" disabled readonly></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="notes_textarea">Notes</label>
                            <textarea id="notes_textarea" cols="30" rows="10" disabled readonly></textarea>
                        </div>
                        <br>
                        <br>
                    </form>
                </div>

                <div class="form-container-sub">
                    <form class="row" id="corrective-actions-form">
                        <div class="col-md-6">
                            <label for="corrective_actions">Corrective Actions Taken</label>
                            <textarea id="corrective_actions" cols="30" rows="5"></textarea>
                        </div>

                        <div class="col-md-6">
                            <label for="corrective_doc">Document Of Corrective Actions Taken</label>
                            <input type="file" id="corrective_doc" name="file">

                            <label for="ilc_status">ILC Program Status</label>
                            <select id="ilc_status" name="gender">
                                <option value="">Select</option>
                                <option value="completed">Completed</option>
                                <option value="inprogress">Inprogress</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-12 mt-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <script>
                function openDocument1(id) {
                    console.log("Opening document for ID:", id);

                    fetch(`/get-ilc-data/${id}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok: ' + response.statusText);
                            }
                            return response.json();
                        })
                        .then(data => {
                            console.log("Received data:", data);

                            if (data) {
                                // Set the panel heading
                                document.getElementById('documentPanel1Heading').textContent = "Details for " + (data.department || "Unknown Department");

                                // Update the table data
                                document.getElementById('documentDetailsTable').innerHTML = `
                            <tr>
                                <td>${data.department || ""}</td>
                                <td>${data.ilc_provider || ""}</td>
                                <td>${data.ilc_program || ""}</td>
                                <td>${data.ilc_cycle || ""}</td>
                            </tr>
                        `;

                                // Update form fields with IDs
                                document.getElementById('last_submission_date').value = data.last_submission_date || "";
                                document.getElementById('ilcs_submission_date').value = data.ilcs_submission_date || "";

                                // Update status dropdown
                                const statusSelect = document.getElementById('status_select');
                                const status = (data.status || "").toLowerCase();
                                for (let i = 0; i < statusSelect.options.length; i++) {
                                    if (statusSelect.options[i].text.toLowerCase().includes(status)) {
                                        statusSelect.selectedIndex = i;
                                        break;
                                    }
                                }

                                // Update textareas
                                document.getElementById('parameters_textarea').value = data.parameters || "";
                                document.getElementById('notes_textarea').value = data.notes || "";

                                // Reset corrective actions form
                                document.getElementById('corrective_actions').value = "";
                                document.getElementById('ilc_status').selectedIndex = 0;

                                // Finally, show the modal
                                document.getElementById('documentClose1').classList.add('opened');
                                document.getElementById('documentOpen1').classList.add('open');
                                console.log("Modal should be visible now");
                            }
                        })
                        .catch(error => {
                            console.error("Error fetching or processing data:", error);
                            alert("Failed to load record details. Please try again later.");
                        });
                }

                function documentClose1() {
                    console.log("Closing modal");
                    document.getElementById('documentClose1').classList.remove('opened');
                    document.getElementById('documentOpen1').classList.remove('open');
                }

                // Event listener for form submission
                document.addEventListener('DOMContentLoaded', function () {
                    const form = document.getElementById('corrective-actions-form');
                    if (form) {
                        form.addEventListener('submit', function (event) {
                            event.preventDefault();

                            const correctiveActions = document.getElementById('corrective_actions').value;
                            const ilcStatus = document.getElementById('ilc_status').value;

                            // Here you would typically send this data to your server
                            console.log("Form submitted with:", { correctiveActions, ilcStatus });

                            // Example ajax request (uncomment and modify as needed)
                            /*
                            fetch('/submit-corrective-actions', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                },
                                body: JSON.stringify({
                                    corrective_actions: correctiveActions,
                                    ilc_status: ilcStatus,
                                    // Add other form data as needed
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    alert('Corrective actions submitted successfully!');
                                    documentClose1();
                                } else {
                                    alert('Error: ' + data.message);
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('An error occurred while submitting the form.');
                            });
                            */

                            alert('Form submitted successfully!');
                            documentClose1();
                        });
                    }
                });

                function fetchDataForSelectedLab() {
                    let labId = document.getElementById('labDropdown').value;

                    if (labId) {
                        fetch(`/get-ilc-data-by-lab/${labId}`)
                            .then(response => response.json())
                            .then(data => {
                                let tbody = document.querySelector("#ILCTable tbody");
                                tbody.innerHTML = ""; // Clear table

                                if (data.length > 0) {
                                    data.forEach((item, index) => {
                                        let row = `
                                                                    <tr>
                                                                        <td>${index + 1}</td>
                                                                        <td>${item.department}</td>
                                                                        <td>${item.ilc_provider}</td>
                                                                        <td>${item.ilc_program}</td>
                                                                        <td>${item.status}</td>
                                                                        <td>${item.parameters}</td>
                                                                        <td>
                                                                            <button class="open-panel-btn" onclick="openDocument1(${item.id})">
                                                                                Show Report
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                `;
                                        tbody.innerHTML += row;
                                    });
                                } else {
                                    tbody.innerHTML = `<tr><td colspan="7" class="text-center">No records found</td></tr>`;
                                }
                            })
                            .catch(error => console.error("Error fetching data:", error));
                    }
                }
            </script>
    </body>

    </html>

@endsection