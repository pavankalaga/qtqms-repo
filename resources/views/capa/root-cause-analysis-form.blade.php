@extends('layouts.base')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Root Cause Analysis Form</title>
    <style>
        .rca-form-container {
            background: linear-gradient(145deg, #ffffff, #f8f8f8);
            padding: 30px;
            border-style: solid;
            border-color: lightgray;
            border-radius: 15px;
            box-shadow: 1px 0px 10px rgba(0, 0, 0, 0.15);
            margin-bottom: 1rem;
        }

        .rca-form-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .rca-form-header h2 {
            font-size: 24px;
            color: #333;
            margin: 0;
        }

        .rca-form-header p {
            font-size: 18px;
            color: #555;
            margin-top: 5px;
        }

        .rca-form-group {
            margin-bottom: 20px;
        }

        .rca-form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .rca-form-group input,
        .rca-form-group textarea,
        .rca-form-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .rca-form-group input:focus,
        .rca-form-group textarea:focus,
        .rca-form-group select:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            outline: none;
        }

        .rca-form-group textarea {
            resize: vertical;
        }

        .rca-section-title {
            /* font-size: 20px; */
            font-weight: 500;
            margin-top: 15px;
            margin-bottom: 15px;
            color: #716fff;
            border-bottom: 1px solid #d7d7d7;
            padding-bottom: 5px;
        }

        .rca-form-submit {
            text-align: center;
            margin-top: 20px;
        }

        .rca-submit-button {
            width: 100%;
            padding: 12px 30px;
            font-size: 16px;
            background: linear-gradient(145deg, #007bff, #0056b3);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s ease, background 0.3s ease;
        }

        .rca-submit-button:hover {
            background: linear-gradient(145deg, #0056b3, #004080);
            transform: translateY(-2px);
        }
    </style>
</head>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<body>
    <div class="main ">
        <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
            <div style="font-size: 20px;">Root Cause Analysis (RCA) Form </div>
        </div>

        <div>

        <form action="{{ route('rca.store') }}" method="post" class="rca-form">
        @csrf
                <div class="rca-form-container row">

                    <div class="rca-section-title col-md-12">Basic Information</div>
                    <div class="rca-form-group col-md-3">
                        <label for="rca-incident-id">Incident ID:</label>
                        <input type="text" id="rca-incident-id" name="incident-id" placeholder="Enter a unique incident ID" required>
                    </div>
                    <div class="rca-form-group col-md-3">
                        <label for="rca-incident-date">Date of Incident:</label>
                        <input type="date" id="rca-incident-date" name="incident-date" required>
                    </div>
                    <div class="rca-form-group col-md-3">
                        <label for="rca-reported-by">Reported By:</label>
                        <input type="text" id="rca-reported-by" name="reported-by" placeholder="Name of the person reporting" required>
                    </div>
                    <div class="rca-form-group col-md-3">
                        <label for="rca-department">Department/Team:</label>
                        <input type="text" id="rca-department" name="department" placeholder="Enter the affected department or team" required>
                    </div>
                </div>
                <!-- Section: Problem Description -->
                <div class="rca-form-container row">
                    <div class="rca-section-title col-md-12">Problem Description</div>
                    <div class="rca-form-group col-md-2">
                        <label for="rca-problem-title">Problem Title:</label>
                        <input type="text" id="rca-problem-title" name="problem-title" placeholder="Brief title of the problem" required>
                    </div>
                    <div class="rca-form-group col-md-5">
                        <label for="rca-problem-description">Detailed Description:</label>
                        <textarea id="rca-problem-description" name="problem-description" rows="5" placeholder="Describe the issue in detail" required></textarea>
                    </div>
                    <div class="rca-form-group col-md-5">
                        <label for="rca-impact">Impact:</label>
                        <textarea id="rca-impact" name="impact" rows="5" placeholder="Describe the impact (e.g., financial, operational)" required></textarea>
                    </div>
                </div>

                <!-- Section: Incident Details -->
                <div class="rca-form-container row">
                    <div class="rca-section-title col-md-12">Incident Details</div>
                    <div class="row col-md-6">
                        <div class="rca-form-group col-md-12">
                            <label for="rca-location">Location:</label>
                            <input type="text" id="rca-location" name="location" placeholder="Enter the location of the incident" required>
                        </div>
                        <div class="rca-form-group col-md-12">
                            <label for="rca-priority">Priority Level:</label>
                            <select id="rca-priority" name="priority" required>
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                        </div>
                    </div>
                    <div class="rca-form-group col-md-6">
                        <label for="rca-affected-systems">Affected Systems/Processes:</label>
                        <textarea id="rca-affected-systems" name="affected-systems" rows="5" placeholder="List the affected systems or processes" required></textarea>
                    </div>
                </div>

                <!-- Section: Root Cause Analysis -->
                <div class="rca-form-container row">
                    <div class="rca-section-title col-md-12">Root Cause Analysis</div>
                    <div class="rca-form-group col-md-6">
                        <label for="rca-root-cause">Root Cause:</label>
                        <textarea id="rca-root-cause" name="root-cause" rows="4" placeholder="Describe the root cause(s) identified" required></textarea>
                    </div>
                    <div class="rca-form-group col-md-3">
                        <label for="rca-analysis-method">Analysis Method Used:</label>
                        <input type="text" id="rca-analysis-method" name="analysis-method" placeholder="E.g., Fishbone Diagram, 5 Whys" required>
                    </div>
                </div>

                <!-- Section: Corrective Actions -->
                <div class="rca-form-container row ">
                    <div class="rca-section-title col-md-12">Corrective Actions</div>

                    <div class="rca-form-group col-md-3">
                        <label for="rca-assigned-to">Assigned To:</label>
                        <input type="text" id="rca-assigned-to" name="assigned-to" placeholder="Person or team responsible" required>
                    </div>
                    <div class="rca-form-group col-md-3">
                        <label for="rca-completion-date">Target Completion Date:</label>
                        <input type="date" id="rca-completion-date" name="completion-date" required>
                    </div>
                    <div class="rca-form-group col-md-3">
                        <label for="rca-status">Status:</label>
                        <select id="rca-status" name="status" required>
                            <option value="not-started">Not Started</option>
                            <option value="in-progress">In Progress</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>
                    <div class="rca-form-group col-md-9">
                        <label for="rca-actions">Actions Taken:</label>
                        <textarea id="rca-actions" name="actions" rows="4" placeholder="Describe the actions taken to resolve the issue" required></textarea>
                    </div>
                </div>

                <!-- Submit Section -->
                <div class="rca-form-submit">
                    <button type="submit" class="rca-submit-button">Submit RCA</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>


@endsection