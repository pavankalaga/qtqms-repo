@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Training Create</title>
    </head>
    <style>
        .stock-planner-table {
            width: 100% !important;
            border-collapse: collapse !important;
            margin-top: 20px !important;
        }

        .stock-planner-table th,
        .stock-planner-table td {
            padding: 10px !important;
            text-align: center !important;
            border: 1px solid #ddd !important;
        }

        .stock-planner-table th {
            background-color: #007BFF !important;
            color: white !important;
        }

        .create-pop-blur-bg {
            position: fixed;
            background: #80808078;
            width: 100vw;
            top: 0;
            height: 100vh;
            left: 0;
            z-index: 10000;
        }

        .create-pop {
            height: 90%;
            display: flex;
            background: white;
            position: fixed;
            flex-direction: column;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 20px;
            overflow: auto;
        }

        .form-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            width: 600px;
            margin: auto;

        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
            letter-spacing: 1px;
        }

        .form-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        .form-container input,
        .form-container textarea,
        .form-container select {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        .form-container input:focus,
        .form-container select:focus,
        .form-container textarea:focus {
            border-color: #4facfe;
            outline: none;
        }

        .form-container textarea {
            resize: none;
        }

        .form-container button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            border: none;
            border-radius: 5px;
            color: #ffffff;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .form-container button:hover {
            background: linear-gradient(135deg, #00f2fe, #4facfe);
        }

        .form-container .footer-text {
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
            color: #666;
        }

        .form-container .footer-text a {
            color: #4facfe;
            text-decoration: none;
        }

        .form-container .footer-text a:hover {
            text-decoration: underline;
        }

        #employeeList {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.employee-badge {
    background: linear-gradient(135deg, #00f2fe, #4facfe);
    color: black;
    cursor: pointer;
    padding: 10px 15px;
    margin: 5px 0;
    border-radius: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: auto;
    max-width: 100%;
    font-size: 14px;
}

.employee-badge .delete-icon {
    color: white;
    font-size: 20px;
    margin-left: 10px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 26px;
    height: 26px;
    border-radius: 50%;
    transition: background-color 0.3s ease;
}

.employee-badge .delete-icon:hover {
    background-color: #003f7f;
}



    </style>

    <body>
        <div class="main ">
            <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
                <div style="font-size: 20px;">Create Training </div>


            </div>
            <style>
                .btn-gradient-info {
                    background: linear-gradient(to right, #17a2b8, #138496);
                    border: none;
                    color: white;
                }

                .btn-gradient-info:hover {
                    background: linear-gradient(to right, #138496, #117a8b);
                }

                .card {
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                    border-radius: 1rem;
                }

                .form-container label {
                    font-weight: 500;
                    margin-bottom: 0.25rem;
                }
            </style>

            <div class="container mt-4">
                <form action="{{ $training ? route('trainings.update', $training->id) : route('trainings.store') }}"
                    method="POST">
                    @csrf
                    @if($training)
                        @method('PUT')
                    @endif
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body form-container">
                                    <h5 class="mb-3">Training Program Details</h5>

                                    <label for="training-date">Date of Training Program:</label>
                                    <input type="date" id="training-date" name="training_date" class="form-control mb-2"
                                        value="{{ $training->training_date ?? '' }}" required>


                                    <label for="training-name">Title of Training Program:</label>
                                    <input type="text" id="training-name" name="training_name" class="form-control mb-2"
                                        value="{{ $training->training_name ?? '' }}" required>

                                    <label for="training-type">Source for Training Program:</label>
                                    <select name="training_type" id="training-type" class="form-control mb-2" required>
                                        <option value="Internal" {{ ($training->training_type ?? '') == 'Internal' ? 'selected' : '' }}>Internal Source</option>
                                        <option value="External" {{ ($training->training_type ?? '') == 'External' ? 'selected' : '' }}>External Source</option>
                                    </select>

                                    <label for="department">Department Conducting the Training Program:</label>
                                    <input type="text" id="department" value="{{ $training->department ?? '' }}"
                                        name="department" class="form-control mb-2" required>

                                    <label for="location">Location of Training Program:</label>
                                    <select name="location" id="location" class="form-control mb-2"
                                        onchange="onchangeLocation()" required>
                                        <option value="" disabled selected>Select</option>
                                        @foreach ($locations as $item)
                                            <option value="{{ $item->location }}" {{ ($training->location ?? '') == $item->location ? 'selected' : '' }}>
                                                {{ $item->location }}
                                            </option>
                                        @endforeach
                                        <option value="Other" {{ ($training->location ?? '') == 'Other' ? 'selected' : '' }}>
                                            Other</option>
                                    </select>


                                    <div id="other-location-div" style="display: none;" class="mb-2">
                                        <label for="other_location">Other Location:</label>
                                        <input type="text" id="other_location" name="other_location" class="form-control"
                                            value="{{ $training->other_location ?? '' }}">
                                    </div>

                                    <label for="participants">No. of Participants:</label>
                                    <input type="number" id="participants" name="participants" min="1"
                                        class="form-control mb-2" required value="{{ $training->participants ?? '' }}">

                                    <label for="status">Status of the Training Program:</label>
                                    <select name="status" id="status" class="form-control mb-2" required>
                                        <option value="Yet to Schedule">Yet to Schedule</option>
                                        <option value="Scheduled" {{ ($training->status ?? '') == 'Scheduled' ? 'selected' : '' }}>Scheduled</option>
                                        <option value="Completed" {{ ($training->status ?? '') == 'Completed' ? 'selected' : '' }}>Completed</option>
                                    </select>

                                    <label for="trainer_name">Name of Trainer:</label>
                                    <input type="text" id="trainer_name" name="trainer_name" class="form-control mb-3"
                                        required value="{{ $training->trainer_name ?? '' }}">
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body form-container">
                                    <h5 class="mb-3">Add Employees</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="employee_name">
                                                Employee Name: <span class="text-danger"><b>*</b></span>
                                            </label>
                                            <input type="text" id="employee_name" class="form-control mb-2"
                                                placeholder="Enter Name" />
                                        </div>

                                        <div class="col-md-6">
                                            <label for="employee_cont">
                                                Employee ID: <span class="text-danger"><b>*</b></span>
                                            </label>
                                            <input type="text" id="employee_cont" class="form-control mb-2"
                                                placeholder="0000 0000" maxlength="12" pattern="[0-9]{10}"
                                                title="Enter a 10-digit phone number" />
                                        </div>

                                    </div>
                                    <button type="button" id="addEmployee" class="btn btn-gradient-info mb-3">+ Add
                                        Employee</button>

                                    <h6 class="text-center">Added Employees for The Training:</h6>
<div id="employeeList" class="mb-3 d-flex flex-wrap"></div>
<input type="hidden" name="employees_json" id="employees_json" value='{{ $training->employees ?? '' }}'>


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-gradient-info w-50">Submit Training</button>
                    </div>
                </form>
            </div>

            
<script>
    const employeeList = [];
    const listElement = document.getElementById('employeeList');
    const jsonField = document.getElementById('employees_json');

    function renderEmployeeList() {
    listElement.innerHTML = '';

    employeeList.forEach((emp, index) => {
        const li = document.createElement('li');
        li.className = 'employee-badge';

        li.innerHTML = `
            <span>${emp.name} (${emp.contact})</span>
            <span class="delete-icon" onclick="deleteEmployee(${index})">&#10006;</span>

        `;

        listElement.appendChild(li);
    });

    jsonField.value = JSON.stringify(employeeList);
}



    function deleteEmployee(index) {
        const emp = employeeList[index];
        if (confirm(`Do you want to delete employee: ${emp.name} (${emp.contact})?`)) {
            employeeList.splice(index, 1);
            renderEmployeeList();
        }
    }

    // Load existing employees (if editing)
    window.addEventListener('DOMContentLoaded', () => {
        const existingData = jsonField.value;
        if (existingData) {
            try {
                const parsed = JSON.parse(existingData);
                parsed.forEach(emp => {
                    if (emp.name && emp.contact) {
                        employeeList.push(emp);
                    }
                });
                renderEmployeeList();
            } catch (e) {
                console.error('Invalid JSON in employees_json');
            }
        }
    });

    // Add new employee
    document.getElementById('addEmployee').addEventListener('click', function () {
        const contact = document.getElementById('employee_cont').value.trim();
        const name = document.getElementById('employee_name').value.trim();

        if (contact && name) {
            const item = { contact, name };
            employeeList.push(item);

            document.getElementById('employee_cont').value = '';
            document.getElementById('employee_name').value = '';

            renderEmployeeList();
        } else {
            alert('Please enter both employee Contact Number and Name.');
        }
    });

    function onchangeLocation() {
        const locationSelect = document.getElementById('location');
        const otherDiv = document.getElementById('other-location-div');
        otherDiv.style.display = (locationSelect.value === 'Other') ? 'block' : 'none';
    }
</script>




        </div>

    </body>

    <script>
        function onchangeLocation() {
            var location = document.getElementById("location").value;
            var otherLocationDiv = document.getElementById("other-location-div");

            if (location === "Other") {
                otherLocationDiv.style.display = "block";
            } else {
                otherLocationDiv.style.display = "none";
            }
        }
    </script>
    <script>
        function onchangeLocation() {
            if (event.target.value === "Other") {
                // console.log(event.srcElement.nextElementSibling)
                event.srcElement.nextElementSibling.style.display = ""
            } else {
                event.srcElement.nextElementSibling.style.display = "none"

            }
        }
    </script>

    </html>

@endsection

<!-- <script>
                const employeeList = [];
                const listElement = document.getElementById('employeeList');
                const jsonField = document.getElementById('employees_json');

                // 1. Load existing employees from hidden input (if editing)
                window.addEventListener('DOMContentLoaded', () => {
                    const existingData = jsonField.value;
                    if (existingData) {
                        try {
                            const parsed = JSON.parse(existingData);
                            parsed.forEach(emp => {
                                if (emp.name && emp.contact) {
                                    employeeList.push(emp);

                                    const li = document.createElement('li');
                                    li.className = 'list-group-item d-flex justify-content-between align-items-center';
                                    li.innerHTML = `<strong>${emp.name} - (${emp.contact})</strong>`;
                                    listElement.appendChild(li);
                                }
                            });
                        } catch (e) {
                            console.error('Invalid JSON in employees_json');
                        }
                    }
                });

                // 2. Add new employee
                document.getElementById('addEmployee').addEventListener('click', function () {
                    const contact = document.getElementById('employee_cont').value.trim();
                    const name = document.getElementById('employee_name').value.trim();

                    if (contact && name) {
                        const item = { contact, name };
                        employeeList.push(item);

                        const li = document.createElement('li');
                        li.className = 'list-group-item d-flex justify-content-between align-items-center';
                        li.innerHTML = `<strong>${name} - (${contact})</strong>`;

                        listElement.appendChild(li);

                        document.getElementById('employee_cont').value = '';
                        document.getElementById('employee_name').value = '';

                        jsonField.value = JSON.stringify(employeeList);
                    } else {
                        alert('Please enter both employee Contact Number and Name.');
                    }
                });

                function onchangeLocation() {
                    const locationSelect = document.getElementById('location');
                    const otherDiv = document.getElementById('other-location-div');
                    otherDiv.style.display = (locationSelect.value === 'Other') ? 'block' : 'none';
                }
            </script> -->