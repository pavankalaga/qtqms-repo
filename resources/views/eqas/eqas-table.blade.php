@extends('layouts.base')
@section('content')

    <!DOCTYPE html>


    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EQAS List</title>
        <style>
            .eqas-container {
                padding: 20px;
                background: #fff;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
            }

            .eqas-header {
                text-align: center;
                color: #333;
                margin-bottom: 20px;
            }

            .eqas-table {
                width: 100%;
                border-collapse: collapse;
            }

            .eqas-table th,
            .eqas-table td {
                border: 1px solid #ddd;
                padding: 10px;
                text-align: center;
            }

            .eqas-table th {
                background-color: #f4f4f4;
                color: #333;
            }

            .eqas-btn {
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

            .eqas-filter-section {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 20px;
            }

            .eqas-table select,
            .eqas-table input {
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
                <div style="font-size: 20px;">EQAS List</div>
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


            <div class="eqas-container">

                <div class="eqas-filter-section">

                    <div>
                        <label for="eqas-department">Select Year:</label>
                        <input type="number" id="year" name="year" min="1900" max="2100" placeholder="YYYY" value="2025">
                    </div>
                </div>
                <table class="eqas-table" id="eqasTable">
                    <thead>
                        <tr>
                            <th>S. No</th>
                            <th>Department</th>
                            <th>Provider</th>
                            <th>Program</th>
                            <th>Submission Due Date</th>
                            <th>Submission Date</th>
                            <th>Status</th>
                            <!-- <th>Outcomes</th> -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{$item->department}}</td>
                                <td>{{ $item->eqa_provider }}</td>
                                <td>{{ $item->eqa_program }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->eqa_cycle)->format('d-m-Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->eqas_submission_date)->format('d-m-Y') }}</td>
                                 <td>
                                    {{ $item->program_status == 'completed' ? 'Closed' : ($item->status == 'not_submitted' ? 'Missed Submission' : $item->status) }}
                                </td>
                                <!-- <td>{{ $item->parameters }}</td> -->
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
    <form id="eqasForm" enctype="multipart/form-data" method="POST" >
        <div style="position: relative;">
            <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4" style="margin-top: 0.6rem;">
                <div style="font-size: 20px;" id="documentPanel1Heading">Details</div>
                <div class="btn btn-warning">
                    <input type="file" name="general_file">
                </div>
            </div>
        </div>

        <div class="table-responsive form-container-sub" style="padding-right: 1rem;">
            <table class="parameter-table-unique">
                <thead>
                    <tr>
                        <th>Department</th>
                        <th>EQA Provider</th>
                        <th>EQA Program</th>
                        <th>EQA Cycles</th>
                    </tr>
                </thead>
                <tbody id="documentDetailsTable">
                    <!-- Dynamic Data Will Be Inserted Here -->
                </tbody>
            </table>
        </div>

        <!-- Section 1 -->
        <div class="form-container-sub row">
            <div class="col-md-3">
                <label for="last_submission_date">EQAS Last Submission Date</label>
                <input type="date" id="last_submission_date" name="last_submission_date" disabled readonly>
            </div>
            <div class="col-md-3">
                <label for="eqas_submission_date">EQAS Submission Date</label>
                <input type="date" id="eqas_submission_date" name="eqas_submission_date" disabled readonly>
            </div>
            <div class="col-md-3">
                <label for="status">Status</label>
                <select id="status" name="status" disabled readonly>
                    <option value="">Select</option>
                    <option value="completed">Completed</option>
                    <option value="Inprogress">In Progress</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="attachment">Attachment</label>
                <input type="file" id="attachment" name="attachment" disabled readonly>
                <div id="attachment_link3"></div>
            </div>
            <div class="col-md-6">
                <label for="parameters">All Parameters</label>
                <textarea id="parameters" name="parameters" cols="30" rows="10" disabled readonly></textarea>
            </div>
            <div class="col-md-6">
                <label for="notes">Notes</label>
                <textarea id="notes" name="notes" cols="30" rows="10" disabled readonly></textarea>
            </div>
        </div>

        <!-- Section 2 -->
        <div class="form-container-sub row">
            <div class="col-md-3">
                <label for="results_submission_date">Results Published Date</label>
                <input type="date" id="results_submission_date" name="results_submission_date">
            </div>

            <input type="hidden" name="submission_id" id="submission_id">
            <div class="col-md-3">
                <label>Corrective actions required</label><br>
                <div class="form-check form-check-inline" style="display:inline-flex;">
                    <input class="form-check-input" type="radio" name="corrective_actions_required" id="corrective_yes" value="yes" style="margin-right:10px">
                    <label class="form-check-label" for="corrective_yes">Yes</label>
                </div>
                <div class="form-check form-check-inline" style="display:inline-flex;">
                    <input class="form-check-input" type="radio" name="corrective_actions_required" id="corrective_no" value="no" style="margin-right:10px">
                    <label class="form-check-label" for="corrective_no">No</label>
                </div>
            </div>
            <div class="col-md-3">
                <label for="attachment_of_published_results">Attachment Of published results</label>
                <input type="file" id="attachment_of_published_results" name="attachment_of_published_results">
                <div id="attachment_link1"></div>
            </div>


            <div class="col-md-6">
                <label for="parameters_published_results">All Parameters</label>
                <textarea id="parameters_published_results" name="parameters_published_results" cols="30" rows="10"></textarea>
            </div>
            <div class="col-md-6">
                <label for="notes_published_results">Notes</label>
                <textarea id="notes_published_results" name="notes_published_results" cols="30" rows="10"></textarea>
            </div>
        </div>

        <!-- Section 3 -->
        <div class="form-container-sub row">
            <div class="col-md-6">
                <label for="corrective_actions">Corrective Actions Taken</label>
                <textarea id="corrective_actions" name="corrective_actions" cols="30" rows="5"></textarea>
            </div>
            <div class="col-md-6">
                <label for="corrective_action_doc">Document Of Corrective Actions Taken</label>
                <input type="file" id="corrective_action_doc" name="corrective_action_doc">
                <div id="attachment_link2"></div>
                <label for="program_status">EQAS Program Status</label>
                <select id="program_status" name="program_status">
                    <option value="">Select</option>
                    <option value="completed">Closed</option>
                    <option value="Inprogress">In Progress</option>
                    <option value="Other">Other</option>
                </select>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="form-container-sub ">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

        </div>

        <!-- <script>
                                    function openDocument1(name) {
                                        document.getElementById('documentPanel1Heading').textContent = name
                                        document.getElementById('documentClose1').classList.add('opened');
                                        document.getElementById('documentOpen1').classList.add('open');
                                    }

                                    function documentClose1() {
                                        document.getElementById('documentClose1').classList.remove('opened');
                                        document.getElementById('documentOpen1').classList.remove('open');

                                    }
                                </script> -->


<script>
$(document).ready(function () {
    $('#eqasForm').on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            url: '{{ route("eqas.store_pub_res") }}', // Replace with your actual route
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function (response) {
                alert('Form submitted successfully!');
                console.log(response);
                // Optionally reset the form
                $('#eqasForm')[0].reset();
            },
            error: function (xhr) {
                console.error(xhr);
                alert('Something went wrong.');
            }
        });
    });
});
</script>


        <script>
           function openDocument1(id) {
    fetch(`/get-eqas-data/${id}`)
        .then(response => response.json())
        .then(data => {
            if (data) {
                // Panel Heading
                document.getElementById('documentPanel1Heading').textContent = "Details for " + data.department;

                // Populate Table Data
                document.getElementById('documentDetailsTable').innerHTML = `
                    <tr>
                        <td>${data.department}</td>
                        <td>${data.eqa_provider}</td>
                        <td>${data.eqa_program}</td>
                        <td>${data.eqa_cycle}</td>
                    </tr>
                `;

                // Populate Form Fields
                document.getElementById('last_submission_date').value = data.eqa_cycle ?? "";
                document.getElementById('eqas_submission_date').value = data.eqas_submission_date ?? "";
                // document.getElementById('status').value = data.status ?? "";

                const statusValue = (data.status ?? "").trim();
                const statusSelect = document.getElementById('status');

                if (statusSelect.querySelector(`option[value="${statusValue}"]`)) {
                    statusSelect.value = statusValue;
                } else {
                    statusSelect.value = "";
                }

                console.log('status is ',data.status)
                document.getElementById('parameters').value = data.parameters ?? "";
                document.getElementById('notes').value = data.notes ?? "";
                document.getElementById('submission_id').value = data.id ?? "";

                // Newly Added Fields
                document.getElementById('results_submission_date').value = data.results_submission_date ?? "";
                // document.getElementById('corrective_actions_required').value = data.corrective_actions_required ?? "";

                if (data.corrective_actions_required === 'yes') {
                        document.getElementById('corrective_yes').checked = true;
                    } else if (data.corrective_actions_required === 'no') {
                        document.getElementById('corrective_no').checked = true;
                    }
                document.getElementById('parameters_published_results').value = data.parameters_published_results ?? "";
                document.getElementById('notes_published_results').value = data.notes_published_results ?? "";
                document.getElementById('corrective_actions').value = data.corrective_actions ?? "";
                document.getElementById('program_status').value = data.program_status ?? "";

                // Optional: Display attachment links if needed
                if (data.attachment_published_results) {
                    document.getElementById('attachment_link1').innerHTML = `<a href="/public/${data.attachment_published_results}" target="_blank">View Attachment</a>`;
                } else {
                    document.getElementById('attachment_link1').innerHTML = '';
                }

                if (data.attachment) {
                    document.getElementById('attachment_link3').innerHTML = `<a href="/public/attachments/${data.attachment}" target="_blank">View Attachment</a>`;
                } else {
                    document.getElementById('attachment_link3').innerHTML = '';
                }

                if (data.attachment_corrective_actions) {
                    document.getElementById('attachment_link2').innerHTML = `<a href="/public/${data.attachment_corrective_actions}" target="_blank">View Corrective Doc</a>`;
                } else {
                    document.getElementById('attachment_link2').innerHTML = '';
                }

                // Show the modal or panel
                document.getElementById('documentClose1').classList.add('opened');
                document.getElementById('documentOpen1').classList.add('open');
            }
        })
        .catch(error => console.error("Error fetching data:", error));
}


            function documentClose1() {
                document.getElementById('documentClose1').classList.remove('opened');
                document.getElementById('documentOpen1').classList.remove('open');
            }



            function fetchDataForSelectedLab() {
                let labId = document.getElementById('labDropdown').value;

                if (labId) {
                    fetch(`/get-eqas-data-by-lab/${labId}`)
                        .then(response => response.json())
                        .then(data => {
                            let tbody = document.querySelector("#eqasTable tbody");
                            tbody.innerHTML = ""; // Clear table
console.log(data,'equuuuuuuuuuu')
                            if (data.length > 0) {
                                data.forEach((item, index) => {
                                    let row = `
                                                        <tr>
                                                            <td>${index + 1}</td>
                                                            <td>${item.department}</td>
                                                            <td>${item.eqa_provider}</td>
                                                            <td>${item.eqa_program}</td>
                                                            <td>${item.eqa_cycle}</td>
                                                            <td>${item.eqas_submission_date}</td>
                                                            <td>${item.status}</td>
                                                            
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