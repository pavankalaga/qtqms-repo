@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Calibration Protocol</title>
        <style>
            .table-container-Calibration {

                width: 100%;

                background: #fff;
                border-radius: 10px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                overflow: hidden;
            }

            .table-container-Calibration table {
                width: 100%;
                border-collapse: collapse;
            }

            .table-container-Calibration thead {
                background-color: #4caf50;
                color: #fff;
            }

            .table-container-Calibration thead th {
                padding: 15px;
                text-align: left;
                font-size: 16px;
                text-transform: uppercase;
            }

            .table-container-Calibration tbody tr:nth-child(odd) {
                background-color: #f9f9f9;
            }

            .table-container-Calibration tbody tr:nth-child(even) {
                background-color: #eaf5ea;
            }

            .table-container-Calibration td,
            .table-container-Calibration th {
                padding: 12px 15px;
                border: 1px solid #ddd;
            }

            .table-container-Calibration tbody td {
                font-size: 14px;
            }

            .table-container-Calibration tbody tr:hover {
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
                <div style="font-size: 20px;">Calibration Protocol</div>
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

            <div class="table-container-Calibration">
                <table id="calibrationTable">
                    <thead>
                        <tr>
                            <th>Department</th>
                            <th>Test Classification</th>
                            <th>Machine Name</th>
                            <th>Parameter</th>
                            <th>Protocol</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data will be populated here dynamically -->
                    </tbody>
                </table>
            </div>
        </div>
    </body>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            let currentLabId = null;

            $('#labDropdown').change(function () {
                currentLabId = $(this).val();
                if (currentLabId) {
                    $.ajax({
                        url: '/get-lab-details',
                        type: 'GET',
                        data: { labId: currentLabId },
                        success: function (response) {
                            if (response.success) {
                                // Populate form fields
                                $('#labName').val(response.data.name || 'N/A');
                                $('#labLocation').val(response.data.location || 'N/A');
                                $('#labType').val(response.data.type || 'N/A');
                                $('#nablStatus').val(response.data.nabl_status || 'N/A');

                                // Populate table
                                let tableBody = '';
                                if (response.data.calibration_setup.length > 0) {
                                    response.data.calibration_setup.forEach(item => {
                                        let parameters = item.parameters;
                                        if (typeof parameters === 'string') {
                                            try {
                                                parameters = JSON.parse(parameters);
                                            } catch (e) {
                                                console.error('Error parsing parameters:', e);
                                                parameters = [];
                                            }
                                        }

                                        if (!Array.isArray(parameters)) {
                                            parameters = [];
                                        }

                                        let parametersList = parameters.length > 0
                                            ? parameters.map(param => `<li>${param}</li>`).join('')
                                            : '<li>N/A</li>';

                                        tableBody += `
                                                        <tr data-calibration-id="${item.id}">
                                                            <td>${item.department || 'N/A'}</td>
                                                            <td>---</td>
                                                            <td>${item.suitable_machine || 'N/A'}</td>
                                                            <td><ul>${parametersList}</ul></td>
                                                            <td>
                                                                <table>
                                                                    <tbody>
                                                                        <tr class="sub-table-header">
                                                                            <td>Yes/No</td>
                                                                            <td style="max-width: 4rem;">Calibration Frequency (Days)</td>
                                                                            <td>Notes</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input type="checkbox" class="protocol-checkbox" 
                                                                                    ${item.is_active ? 'checked' : ''}>
                                                                            </td>
                                                                            <td style="max-width: 4rem;">
                                                                                <input style="width: 100%;" type="number" 
                                                                                    class="frequency-input" value="${item.frequency || 0}">
                                                                            </td>
                                                                            <td>
                                                                                <textarea cols="50" rows="3" class="notes-textarea">${item.notes || ''}</textarea>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        `;
                                    });
                                } else {
                                    tableBody = `<tr><td colspan="5" class="text-center">No data available.</td></tr>`;
                                }
                                $('#calibrationTable tbody').html(tableBody);
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
                    $('#calibrationTable tbody').html('');
                }
            });

            // Submit protocol data
            $('#submitProtocol').click(function () {
                if (!currentLabId) {
                    alert('Please select a lab first.');
                    return;
                }

                let protocolData = [];
                $('#calibrationTable tbody tr[data-calibration-id]').each(function () {
                    const calibrationId = $(this).data('calibration-id');
                    const isChecked = $(this).find('.protocol-checkbox').is(':checked');
                    const frequency = $(this).find('.frequency-input').val();
                    const notes = $(this).find('.notes-textarea').val();

                    if (calibrationId) {
                        protocolData.push({
                            calibration_id: calibrationId,
                            is_active: isChecked,
                            frequency: frequency,
                            notes: notes
                        });
                    }
                });

                if (protocolData.length === 0) {
                    alert('No protocol data to save.');
                    return;
                }

                $.ajax({
                    url: '/save-calibration-protocol',
                    type: 'POST',
                    data: {
                        lab_id: currentLabId,
                        protocols: protocolData
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        if (response.success) {
                            alert('Protocol saved successfully!');
                            location.reload();
                        } else {
                            alert('Error: ' + response.message);
                        }
                    },
                    error: function (xhr) {
                        let errorMessage = 'An error occurred while saving the protocol.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        alert(errorMessage);
                    }
                });
            });
        });
    </script>

    </html>


@endsection