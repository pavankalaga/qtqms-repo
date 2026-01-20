@extends('layouts.base')

@section('content')
    <div class="main">
        <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
            <div style="font-size: 20px;">Training Completion</div>
            <form id="training-form" action="{{ route('training-completion.store2') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <select id="location" name="location_id" class="form-select form-select-sm EA-dropdown"
                    style="width: auto; margin: 0;" required>
                    <option value="" disabled selected>Select Location</option>
                    @foreach($labs as $location)
                        <option value="{{ $location->id }}" {{ old('location_id') == $location->id ? 'selected' : '' }}>
                            {{ $location->location }}
                        </option>
                    @endforeach
                </select>
        </div>


        <div class="EA-form-container">
            <!-- Course Dropdown -->
            <label for="course">Training Details:</label>
            <select id="course" name="course_id" class="EA-dropdown" required>
                <option value="" disabled selected>Select Course</option>
                @foreach ($data as $item)
                    <option value="{{ $item->id }}" data-employees='@json($item->employees)' {{ old('course_id') == $item->id ? 'selected' : '' }}>
                        {{ $item->training_name }}
                    </option>
                @endforeach
            </select>

            <!-- Hidden Section: Table and File Uploads -->
            <div class="EA-hidden-section"
                style="display: {{ (old('location_id') && old('course_id')) ? 'block' : 'none' }};">
                <!-- Table -->
                <table class="EA-attendance-table">
                    <thead>
                        <tr>
                            <th rowspan="3">S.N.</th>
                            <th rowspan="3">Employee Name</th>
                            <th colspan="2">Attendance</th>
                            <th colspan="4">Competency</th>
                            <th colspan="4">Training Feedback</th>
                            <th colspan="2"></th>
                        </tr>
                        <tr>
                            <th rowspan="2">Present</th>
                            <th rowspan="2">Absent</th>
                            <th colspan="2">Pre Training</th>
                            <th colspan="2">Post Training</th>
                            <th colspan="2">Trainer</th>
                            <th colspan="2">Trainee</th>
                            <th colspan="2"></th>

                        </tr>
                        <tr>
                            <th>Score</th>
                            <th>Doc.</th>
                            <th>Score</th>
                            <th>Doc.</th>
                            <th>Satisfactory</th>
                            <th>Doc.</th>
                            <th>Satisfactory</th>
                            <th>Doc.</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody id="employee-table-body">
                        <tr class="employee-row">
                            <td class="serial-number">1</td>
                            <td>
                                <select name="employees[0][name]" class="form-control employee-dropdown" required>
                                    <option value="" disabled selected>Select Employee</option>
                                </select>
                            </td>

                            <td>
                                <input type="checkbox" name="employees[0][present]" value="1" class="present">
                            </td>
                            <td>
                                <input type="checkbox" name="employees[0][absent]" value="1" class="absent">
                            </td>
                            <td>
                                <input type="text" name="employees[0][pre_training_score]" class="form-control">
                            </td>
                            <td>
                                <input type="file" name="employees[0][pre_training_doc]" class="form-control">
                            </td>
                            <td>
                                <input type="text" name="employees[0][post_training_score]" class="form-control">
                            </td>
                            <td>
                                <input type="file" name="employees[0][post_training_doc]" class="form-control">
                            </td>
                            <td>
                                <select name="employees[0][trainer_feedback]" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Satisfied">Satisfied</option>
                                    <option value="Need Improvement">Need Improvement</option>
                                    <option value="Not Satisfied">Not Satisfied</option>
                                </select>
                            </td>
                            <td>
                                <input type="file" name="employees[0][trainer_feedback_doc]" class="form-control">
                            </td>
                            <td>
                                <select name="employees[0][trainee_feedback]" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Satisfied">Satisfied</option>
                                    <option value="Need Improvement">Need Improvement</option>
                                    <option value="Not Satisfied">Not Satisfied</option>
                                </select>
                            </td>
                            <td>
                                <input type="file" name="employees[0][trainee_feedback_doc]" class="form-control">
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger remove-row" title="Remove">&times;</button>


                            </td>
                        </tr>
                    </tbody>

                </table>
                <button type="button" id="add-row" class="btn btn-primary mb-3">Add Row</button>

                <!-- File Upload Buttons -->
                <label class="mt-3" for="additional_doc">Upload Doc:</label>
                <div class="EA-input-group mb-3">
                    <input type="file" name="additional_doc" class="form-control">
                </div>

                <label for="photo">Upload Photo:</label>
                <div class="EA-input-group mb-3">
                    <input type="file" name="photo" class="form-control">
                </div>

                <!-- Submit Button -->
                <button type="submit" class="EA-submit-button">Submit</button>
            </div>
        </div>
        </form>
    </div>
    <script>
        document.getElementById('course').addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            const employees = JSON.parse(selectedOption.dataset.employees || '[]');

            const employeeSelect = document.querySelector('.employee-dropdown');
            employeeSelect.innerHTML = '<option value="" disabled selected>Select Employee</option>'; // Clear previous options

            employees.forEach(emp => {
                const option = document.createElement('option');
                option.value = emp.name;
                option.textContent = `${emp.name} (${emp.contact})`;
                employeeSelect.appendChild(option);
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let rowIndex = 1;

            const tableBody = document.getElementById('employee-table-body');
            const addRowButton = document.getElementById('add-row');

            addRowButton.addEventListener('click', () => {
                const newRow = document.querySelector('.employee-row').cloneNode(true);
                updateRow(newRow, rowIndex);
                tableBody.appendChild(newRow);
                rowIndex++;
            });

            tableBody.addEventListener('click', (e) => {
                if (e.target && e.target.classList.contains('remove-row')) {
                    const rows = tableBody.querySelectorAll('.employee-row');
                    if (rows.length > 1) {
                        e.target.closest('.employee-row').remove();
                        updateSerialNumbers();
                    } else {
                        alert('At least one row is required.');
                    }
                }
            });

            function updateRow(row, index) {
                row.querySelector('.serial-number').textContent = index + 1;
                const inputs = row.querySelectorAll('input, select');
                inputs.forEach(input => {
                    const name = input.getAttribute('name');
                    if (name) {
                        const newName = name.replace(/\[\d+\]/, `[${index}]`);
                        input.setAttribute('name', newName);
                        if (input.type !== 'checkbox' && input.type !== 'file') {
                            input.value = '';
                        } else if (input.type === 'checkbox') {
                            input.checked = false;
                        }
                    }
                });
            }

            function updateSerialNumbers() {
                const rows = tableBody.querySelectorAll('.employee-row');
                rows.forEach((row, index) => {
                    row.querySelector('.serial-number').textContent = index + 1;
                });
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const locationSelect = document.getElementById('location');
            const courseSelect = document.getElementById('course');
            const tableAndUploads = document.querySelector('.EA-hidden-section');
            const form = document.getElementById('training-form');

            function checkSelections() {
                const location = locationSelect.value;
                const course = courseSelect.value;

                if (location && course) {
                    tableAndUploads.style.display = 'block';
                } else {
                    tableAndUploads.style.display = 'none';
                }
            }

            locationSelect.addEventListener('change', checkSelections);
            courseSelect.addEventListener('change', checkSelections);

            // Make attendance checkboxes mutually exclusive
            document.querySelectorAll('.EA-attendance-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    if (this.classList.contains('present') && this.checked) {
                        const absentCheckbox = this.closest('tr').querySelector('.absent');
                        absentCheckbox.checked = false;
                    } else if (this.classList.contains('absent') && this.checked) {
                        const presentCheckbox = this.closest('tr').querySelector('.present');
                        presentCheckbox.checked = false;
                    }
                });
            });

            // Form submission validation
            form.addEventListener('submit', function (e) {
                const location = locationSelect.value;
                const course = courseSelect.value;

                if (!location || !course) {
                    e.preventDefault();
                    alert('Please select both Location and Course!');
                    return;
                }

                // Show loading state
                const submitButton = this.querySelector('.EA-submit-button');
                submitButton.disabled = true;
                submitButton.textContent = 'Submitting...';
            });

            // Auto-dismiss alerts after 5 seconds
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    if (alert && alert.parentNode) {
                        alert.remove();
                    }
                }, 5000);
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const locationSelect = document.getElementById('location');
            const courseSelect = document.getElementById('course');
            const tableAndUploads = document.querySelector('.EA-hidden-section');
            const form = document.getElementById('training-form');

            function checkSelections() {
                const location = locationSelect.value;
                const course = courseSelect.value;

                if (location && course) {
                    tableAndUploads.style.display = 'block';
                } else {
                    tableAndUploads.style.display = 'none';
                }
            }

            locationSelect.addEventListener('change', checkSelections);
            courseSelect.addEventListener('change', checkSelections);

            // Make attendance checkboxes mutually exclusive
            document.querySelectorAll('.EA-attendance-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    if (this.classList.contains('present') && this.checked) {
                        const absentCheckbox = this.closest('tr').querySelector('.absent');
                        absentCheckbox.checked = false;
                    } else if (this.classList.contains('absent') && this.checked) {
                        const presentCheckbox = this.closest('tr').querySelector('.present');
                        presentCheckbox.checked = false;
                    }
                });
            });

            // Form submission
            form.addEventListener('submit', function (e) {
                const location = locationSelect.value;
                const course = courseSelect.value;

                if (!location || !course) {
                    e.preventDefault();
                    alert('Please select both Location and Course!');
                    return;
                }
            });
        });
    </script>

    <style>
        .EA-hidden-section {
            margin-top: 20px;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }

        .EA-dropdown {
            padding: 8px 12px;
            border-radius: 4px;
            border: 1px solid #ced4da;
        }

        .EA-attendance-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .EA-attendance-table th,
        .EA-attendance-table td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: center;
        }

        .EA-attendance-table th {
            background-color: #e9ecef;
        }

        .EA-input-group {
            display: flex;
            align-items: center;
        }

        .EA-submit-button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .EA-submit-button:hover {
            background-color: #0069d9;
        }
    </style>
@endsection