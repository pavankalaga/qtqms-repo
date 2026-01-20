@extends('layouts.base')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Root Cause Analysis List</title>
    <style>
        .rca-list-container {

            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .rca-list-header {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .rca-list-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .rca-list-table thead {
            background-color: #007bff;
            color: white;
        }

        .rca-list-table th,
        .rca-list-table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .rca-list-table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .rca-list-table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .rca-view-button {
            display: inline-block;
            padding: 8px 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
        }

        .rca-view-button:hover {
            background-color: #0056b3;
        }

        .rca-details-panel {
            position: fixed;
            top: 71px;
            right: -100%;
            width: 50%;
            height: calc(100vh - 71px);
            background: #ffffff;
            box-shadow: -5px -4px 6px 0px rgba(0, 0, 0, 0.2);
            overflow-y: auto;
            padding: 20px;
            transition: 0.5s ease;
            z-index: 9999;
            border-radius: .5rem;
        }

        .rca-details-panel.active {
            right: 0;
        }



        .rca-details-body {
            font-size: 16px;
            line-height: 1.6;
        }

        .rca-details-body p {
            margin: 10px 0;
        }

        .rca-details-body strong {
            color: black;
        }

        .rca-details-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }

        .rca-details-item:last-child {
            border-bottom: none;
        }

        .rca-details-item span {
            font-weight: 600;
        }

        .rca-details-body .rca-details-description {
            margin-top: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border-left: 4px solid #007bff;
            font-size: 14px;
            font-style: italic;
        }

        .rca-details-body .rca-details-actions {
            margin-top: 20px;
            padding: 15px;
            background-color: #f1f1f1;
            border-left: 4px solid #28a745;
        }

        .rca-details-actions ul {
            list-style-type: none;
            padding: 0;
        }

        .rca-details-actions ul li {
            margin: 10px 0;
            font-size: 14px;
            line-height: 1.5;
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
            right: calc(100% - 50%);
            top: 100px;
            z-index: 1000;
        }


        .rca-details-panel.active {
            right: 0;
        }

        .rca-details-close {
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 30px;
            color: #999;
            cursor: pointer;
        }

        .rca-details-close:hover {
            color: #333;
        }

        .rca-details-header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #007bff;
        }

        .rca-details-body {
            font-size: 16px;
            line-height: 1.6;
        }

        .rca-details-body p {
            margin: 10px 0;
        }

        /* .rca-details-body strong {
            color: black;
        } */

        .rca-details-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }

        .rca-details-item:last-child {
            border-bottom: none;
        }

        .rca-details-item span {
            font-weight: 600;
        }

        /* Form Style for Better Layout */
        .rca-details-form {
            display: grid;
            grid-template-columns: 1fr;
            gap: 10px;
            margin-top: 20px;
        }

        .rca-details-form .rca-details-div {
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid lightgrey;
            padding: 0.5rem;
        }

        .rca-details-form label {
            font-weight: 500;

            text-align: left;
        }

        .rca-details-form .rca-details-value {
            text-align: right;
            color: #555;
        }

        /* Styling for additional description sections */
        .rca-details-description,
        .rca-details-actions {
            margin-top: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border-left: 4px solid #007bff;
        }

        .rca-details-description p,
        .rca-details-actions ul {
            font-size: 14px;
            line-height: 1.5;
        }

        .rca-details-actions ul {
            list-style-type: none;
            padding: 0;
        }

        .rca-details-actions ul li {
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <div class="main ">
        <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
            <div style="font-size: 20px;">Root Cause Analysis List </div>
        </div>

        <div class="rca-list-container">

            <table class="rca-list-table">
                <thead>
                    <tr>
                        <th>Incident ID</th>
                        <th>Title</th>
                        <th>Reported By</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($rcas as $rca)
        <tr>
            <td>{{ $rca->incident_id }}</td>
            <td>{{ $rca->problem_title }}</td>
            <td>{{ $rca->reported_by }}</td>
            <td>{{ ucfirst($rca->priority) }}</td>
            <td>{{ ucfirst(str_replace('-', ' ', $rca->status)) }}</td>
            <td>
                <button class="rca-view-button" onclick="showDetails('{{ $rca->incident_id }}')">View Details</button>
            </td>
        </tr>
        @endforeach
                </tbody>
            </table>
        </div>

        <!-- Details Panel -->
        <div class="closeBtn1" id="detailsPanelCLose" onclick="closeDetails()">
            X
        </div>
        <div class="rca-details-panel" id="detailsPanel">

            <div class="rca-details-content">
                <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
                    <div style="font-size: 20px;">Root Cause Analysis - Incident Details</div>
                </div>
                <div id="rca-details-data" class="rca-details-body">
                    <!-- Dynamic content will go here -->
                </div>
            </div>
        </div>


    </div>
</body>
<script>
function showDetails(incidentId) {
    fetch(`/rca/details/${incidentId}`)
    .then(response => response.json())
    .then(details => {
        const detailsPanel = document.getElementById("detailsPanel");
        const detailsData = document.getElementById("rca-details-data");

        if (details) {
            detailsData.innerHTML = `
                <div class="rca-details-form">
                    <div class="rca-details-div"><label>Incident ID:</label><span class="rca-details-value">${incidentId}</span></div>
                    <div class="rca-details-div"><label>Title:</label><span class="rca-details-value">${details.problem_title}</span></div>
                    <div class="rca-details-div"><label>Reported By:</label><span class="rca-details-value">${details.reported_by}</span></div>
                    <div class="rca-details-div"><label>Date:</label><span class="rca-details-value">${details.incident_date}</span></div>
                    <div class="rca-details-div"><label>Priority:</label><span class="rca-details-value">${details.priority}</span></div>
                    <div class="rca-details-div"><label>Status:</label><span class="rca-details-value">${details.status}</span></div>
                </div>

                <div class="rca-details-description">
                    <strong>Description:</strong>
                    <p>${details.problem_description}</p>
                </div>

                <div class="rca-details-form">
                    <div class="rca-details-div"><label>Root Cause: </label><span class="rca-details-value">${details.root_cause}</span></div>
                    <div class="rca-details-div"><label>Resolution: </label><span class="rca-details-value">${details.impact}</span></div>
                </div>

                <div class="rca-details-form">
                    <div class="rca-details-div" style="display:block">
                        <div><strong>Affected Systems:</strong></div>
                        <ul>
                            ${details.affected_systems ? details.affected_systems.split(',').map(system => `<li>${system.trim()}</li>`).join('') : "<li>No systems affected</li>"}
                        </ul>
                    </div>
                </div>

                <div class="rca-details-actions">
                    <strong>Corrective Actions Taken:</strong>
                    <ul>
                        ${details.actions ? details.actions.split(',').map(action => `<li>${action.trim()}</li>`).join('') : "<li>No corrective actions recorded</li>"}
                    </ul>
                    <strong>Prevention Actions Taken:</strong>
                    <ul>
                        ${details.prevention_actions ? details.prevention_actions.split(',').map(action => `<li>${action.trim()}</li>`).join('') : "<li>No prevention actions recorded</li>"}
                    </ul>
                </div>

                <div class="rca-details-form">
                    <div class="rca-details-div"><strong>Mitigation Plan: </strong><span class="rca-details-value">${details.analysis_method}</span></div>
                </div>
            `;

            detailsPanel.classList.add("active");
            document.getElementById("detailsPanelCLose").classList.add("opened");
        }
    })
    .catch(error => console.error("Error fetching details:", error));
}

    // Close the details panel
    function closeDetails() {
        const detailsPanel = document.getElementById("detailsPanel");
        detailsPanel.classList.remove("active");
        const detailsPanelCLose = document.getElementById("detailsPanelCLose");
        detailsPanelCLose.classList.remove("opened");

    }
</script>

</html>


@endsection