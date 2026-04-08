@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Control Protocol</title>
        <style>
            .table-container-Control {

                width: 100%;

                background: #fff;
                border-radius: 10px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                overflow: hidden;
            }

            .table-container-Control table {
                width: 100%;
                border-collapse: collapse;
            }

            .table-container-Control thead {
                background-color: #4caf50;
                color: #fff;
            }

            .table-container-Control thead th {
                padding: 15px;
                text-align: left;
                font-size: 16px;
                text-transform: uppercase;
            }

            .table-container-Control tbody tr:nth-child(odd) {
                background-color: #f9f9f9;
            }

            .table-container-Control tbody tr:nth-child(even) {
                background-color: #eaf5ea;
            }

            .table-container-Control td,
            .table-container-Control th {
                padding: 12px 15px;
                border: 1px solid #ddd;
            }

            .table-container-Control tbody td {
                font-size: 14px;
            }

            .table-container-Control tbody tr:hover {
                background-color: #d4ebd4;
                cursor: pointer;
            }

            .proto-high {
                background: #b70000;
                padding: 5px;
                border-radius: 10px;
                font-weight: 700;
                color: white;
                margin: .5rem;
            }

            .proto-medi {
                background: #b4b700;
                padding: 5px;
                border-radius: 10px;
                font-weight: 700;
                color: white;
                margin: .5rem;
            }

            .proto-low {
                background: #25af03;
                padding: 5px;
                border-radius: 10px;
                font-weight: 700;
                color: white;
                margin: .5rem;
            }


            .form-container-sub {
                margin-top: 1rem;
                /* background: #fff; */
                padding: 20px 30px;
                border-radius: 8px;
                box-shadow: 0 4px 11px 11px rgba(0, 0, 0, 0.1);
                width: 99%;
                margin-bottom: 1rem;
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

            .sub-table-header td {
                background-color: rgb(15, 27, 134);
                color: white;
                font-weight: 700;
                padding: .5rem;

            }
        </style>
    </head>

    <body>
        <div class="main ">
            <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
                <div style="font-size: 20px;">Control Protocol</div>
                <div style="font-size: 20px; gap:10px" class='d-flex'>
                    <select class='form-control' id="labDropdown">
                        <option value="">-- Select Labs --</option>
                        @foreach ($locations as $lab)
                            <option value="{{ $lab->id }}">{{ $lab->location }}</option>
                        @endforeach
                    </select>
                    <button type="button" id="submitProtocol" class="btn btn-warning">Submit</button>
                </div>
            </div>

            <div class="form-container-sub">
                <form class="row" id="labForm">
                    <div class="col-md-3">
                        <label for="name">Lab Name</label>
                        <input type="text" name="name" id="labName" disabled>
                    </div>
                    <div class="col-md-3">
                        <label for="location">Lab Location</label>
                        <input type="text" name="location" id="labLocation" disabled>
                    </div>
                    <div class="col-md-3">
                        <label for="type">Type of Lab</label>
                        <input type="text" name="type" id="labType" disabled>
                    </div>
                    <div class="col-md-3">
                        <label for="nablStatus">NABL Status</label>
                        <input type="text" name="nablStatus" id="nablStatus" disabled>
                    </div>
                </form>
            </div>

            <div class="table-container-Control">
                <table id="controlTable">
                    <thead>
                        <tr>
                            <th>Department</th>
                            <th>Test Classification</th>
                            <th>Protocol</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data will be populated here -->
                    </tbody>
                </table>
            </div>

        </div>
    </body>

    </html>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            let currentLabId = null;

            // Handle lab selection
            $('#labDropdown').change(function () {
                currentLabId = $(this).val();
                if (currentLabId) {
                    $.ajax({
                        url: '/get-lab-details',
                        type: 'GET',
                        data: { labId: currentLabId },
                        success: function (response) {
                            if (response.success && response.data) {
                                // Populate form fields
                                $('#labName').val(response.data.name || 'N/A');
                                $('#labLocation').val(response.data.location || 'N/A');
                                $('#labType').val(response.data.type || 'N/A');
                                $('#nablStatus').val(response.data.nabl_status || 'N/A');

                                // Ensure the form is displayed
                                $('.form-container-sub').show();

                                // Populate table
                                let tableBody = '';
                                if (response.data.control_setup.length > 0) {
                                    response.data.control_setup.forEach(item => {
                                        tableBody += `
                                                            <tr data-control-id="${item.id}">
                                                                <td>${item.department || 'N/A'}</td>
                                                                <td>${item.test_classification || '---'}</td>
                                                                <td>
                                                                    <table class="protocol-table">
                                                                        <tbody>
                                                                            <tr class="sub-table-header">
                                                                                <td>Frequency</td>
                                                                                <td>Yes/No</td>
                                                                                <td style="max-width: 4rem;">No. of Controls</td>
                                                                                <td>Type of Control</td>
                                                                                <td>Notes</td>
                                                                            </tr>
                                                                            ${generateProtocolRows(item)}
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        `;
                                    });
                                } else {
                                    tableBody = `<tr><td colspan="3" class="text-center">No data available.</td></tr>`;
                                }

                                $('#controlTable tbody').html(tableBody);
                            } else {
                                alert('No data found for the selected lab.');
                            }
                        },
                        error: function (xhr) {
                            alert('An error occurred while fetching lab details.');
                        }
                    });
                } else {
                    $('#labForm input').val('');
                    $('#controlTable tbody').html('');
                    $('.form-container-sub').hide(); // Hide form if no lab is selected
                }
            });

            // Generate protocol rows for morning, afternoon, and evening
            function generateProtocolRows(item) {
                return `
                                    ${generateSingleRow('Morning', item.is_active_morning, item.number_of_controls_morning, item.type_of_control_morning, item.notes_morning)}
                                    ${generateSingleRow('Afternoon', item.is_active_afternoon, item.number_of_controls_afternoon, item.type_of_control_afternoon, item.notes_afternoon)}
                                    ${generateSingleRow('Evening', item.is_active_evening, item.number_of_controls_evening, item.type_of_control_evening, item.notes_evening)}
                                `;
            }

            function generateSingleRow(time, isActive, numControls, controlType, notes) {
                return `
                                    <tr>
                                        <td>${time}</td>
                                        <td><input type="checkbox" class="protocol-checkbox" ${isActive ? 'checked' : ''}></td>
                                        <td style="max-width: 4rem;">
                                            <input style="width: 100%;" type="number" class="controls-input form-control" value="${numControls || 2}" min="0">
                                        </td>
                                        <td>
                                            <select class="form-control type-of-control">
                                                <option value="">Select Type</option>
                                                <option value="High" ${controlType === 'High' ? 'selected' : ''}>High</option>
                                                <option value="Medium" ${controlType === 'Medium' ? 'selected' : ''}>Medium</option>
                                                <option value="Low" ${controlType === 'Low' ? 'selected' : ''}>Low</option>
                                            </select>
                                        </td>
                                        <td>
                                            <textarea class="notes-textarea form-control" cols="50" rows="3">${notes || ''}</textarea>
                                        </td>
                                    </tr>
                                `;
            }

            // Handle protocol submission
            $('#submitProtocol').click(function () {
                if (!currentLabId) {
                    alert('Please select a lab first.');
                    return;
                }

                let protocolData = [];
                $('#controlTable tbody tr').each(function () {
                    const id = $(this).data('control-id') || null;
                    const department = $(this).find('td:eq(0)').text().trim();

                    protocolData.push({
                        id: id,
                        department: department,
                        morning: getProtocolData($(this), 2),
                        afternoon: getProtocolData($(this), 3),
                        evening: getProtocolData($(this), 4),
                    });
                });

                $.ajax({
                    url: '/save-control-protocol',
                    type: 'POST',
                    data: {
                        labId: currentLabId,
                        protocols: protocolData,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        if (response.success) {
                            alert('Protocol submitted successfully.');
                            location.reload();
                        } else {
                            alert('Failed to submit protocol.');
                        }
                    },
                    error: function () {
                        alert('An error occurred while submitting protocol.');
                    }
                });
            });

            function getProtocolData(row, index) {
                return {
                    isActive: row.find(`.protocol-table tr:nth-child(${index}) .protocol-checkbox`).prop('checked'),
                    numControls: row.find(`.protocol-table tr:nth-child(${index}) .controls-input`).val(),
                    controlType: row.find(`.protocol-table tr:nth-child(${index}) .type-of-control`).val(),
                    notes: row.find(`.protocol-table tr:nth-child(${index}) .notes-textarea`).val(),
                };
            }
        });
    </script>


@endsection