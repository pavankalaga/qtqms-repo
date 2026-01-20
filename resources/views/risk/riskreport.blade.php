@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Risk Report</title>
        <style>
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
        </style>
    </head>

    <body>
        <div class="main ">
            <form action="{{ route('risk-report.store') }}" method="POST">
                @csrf
                <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
                    <div style="font-size: 20px;">Risk Report</div>
                    <div style="font-size: 20px;">
                        <select id="lab_name" name="lab_id" required>
                            <option value="">-- Select Labs --</option>
                            @foreach ($labs as $lab)
                                <option value="{{ $lab->id }}">{{ $lab->location }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-container-sub">
                    <label style="background: #049f3b;padding: 10px;border-radius: 10px;color: white;">Risk
                        Identification</label>

                    <div class="row">
                        <div class="col-md-3">
                            <label>Department</label>
                            <select name="department" class="form-control">
                                <option value="">-- Select Department --</option>
                                @foreach ($departments as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-md-3">
                            <label>Risk Category</label>
                            <select name="risk_category">
                                <option value="">-- Select Category --</option>
                                @foreach ($category as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Risk Name</label>
                            <input type="text" name="risk_name">
                        </div>
                        <div class="col-md-12">
                            <label>Description</label>
                            <textarea name="description"></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-container-sub">
                    <label style="background: #049f3b;padding: 10px;border-radius: 10px;color: white;">Inherent Risk-Risk
                        Analysis and
                        Prioritization</label>

                    <div class="row">
                        <div class="col-md-3">
                            <label>Inherent Severity</label>
                            <select name="severity" id="severity" onchange="calculateRiskRating()">
                                <option value="">-- Select Severity --</option>
                                @foreach ($severity as $item)
                                    <option value="{{ $item->name }}" data-value="{{ $item->value }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Inherent Likelihood</label>
                            <select name="likelihood" id="likelihood" onchange="calculateRiskRating()">
                                <option value="">-- Select Likelihood --</option>
                                @foreach ($likehood as $item)
                                    <option value="{{ $item->name }}" data-value="{{ $item->value }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Inherent Risk Rating</label>
                            <input type="number" name="risk_rating" id="risk_rating" readonly
                                style="background-color: #f8f9fa;">
                        </div>
                        <div class="col-md-3">
                            <label>Inherent Risk Priority</label>
                            <input type="text" name="risk_priority" id="risk_priority" readonly
                                style="background-color: #f8f9fa;">
                        </div>
                        <div class="col-md-6">
                            <label>Notes On Inherent Severity</label>
                            <textarea name="notes_severity" rows="4"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label>Notes On Inherent Likelihood</label>
                            <textarea name="notes_likelihood" rows="4"></textarea>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%; font-size: large;">Submit</button>
            </form>


        </div>
        <script>
            // // Risk Rating Calculation Function
            // function calculateRiskRating() {
            //     const severitySelect = document.getElementById('severity');
            //     const likelihoodSelect = document.getElementById('likelihood');
            //     const riskRatingInput = document.getElementById('risk_rating');
            //     const riskPriorityInput = document.getElementById('risk_priority');

            //     // Get selected options
            //     const severityOption = severitySelect.options[severitySelect.selectedIndex];
            //     const likelihoodOption = likelihoodSelect.options[likelihoodSelect.selectedIndex];

            //     // Reset values if no selection
            //     if (!severityOption || !likelihoodOption || severitySelect.value === '' || likelihoodSelect.value === '') {
            //         riskRatingInput.value = '';
            //         riskPriorityInput.value = '';
            //         return;
            //     }

            //     // Get numeric values from data attributes
            //     const severityValue = parseInt(severityOption.getAttribute('data-value'));
            //     const likelihoodValue = parseInt(likelihoodOption.getAttribute('data-value'));

            //     // Calculate risk rating (multiplication)
            //     const riskRating = severityValue * likelihoodValue;

            //     // Set risk rating
            //     riskRatingInput.value = riskRating;

            //     // Determine risk priority based on risk rating
            //     const riskPriority = getRiskPriority(riskRating);
            //     riskPriorityInput.value = riskPriority;

            //     // Optional: Change color based on risk level
            //     updateRiskRatingColor(riskRating);
            // }

            // // Function to determine risk priority based on risk rating
            // // Function to determine risk priority based on risk rating
            // function getRiskPriority(riskRating) {
            //     if (riskRating >= 18) {
            //         return 'High';
            //     } else if (riskRating >= 9 && riskRating <= 17) {
            //         return 'Medium';
            //     } else if (riskRating >= 1 && riskRating <= 8) {
            //         return 'Low';
            //     } else {
            //         return '';
            //     }
            // }

            // // Function to update risk rating input color based on risk level
            // function updateRiskRatingColor(riskRating) {
            //     const riskRatingInput = document.getElementById('risk_rating');
            //     const riskPriorityInput = document.getElementById('risk_priority');

            //     // Remove existing classes
            //     riskRatingInput.classList.remove('risk-high', 'risk-medium', 'risk-low');
            //     riskPriorityInput.classList.remove('risk-high', 'risk-medium', 'risk-low');

            //     // Add appropriate class based on risk rating
            //     let riskClass = '';
            //     if (riskRating >= 18) {
            //         riskClass = 'risk-high';
            //     } else if (riskRating >= 9 && riskRating <= 17) {
            //         riskClass = 'risk-medium';
            //     } else if (riskRating >= 1 && riskRating <= 8) {
            //         riskClass = 'risk-low';
            //     }

            //     if (riskClass) {
            //         riskRatingInput.classList.add(riskClass);
            //         riskPriorityInput.classList.add(riskClass);
            //     }
            // }

            // // Risk Rating Calculation Function
            // function calculateRiskRating() {
            //     const severitySelect = document.getElementById('severity');
            //     const likelihoodSelect = document.getElementById('likelihood');
            //     const riskRatingInput = document.getElementById('risk_rating');
            //     const riskPriorityInput = document.getElementById('risk_priority');

            //     // Get selected options
            //     const severityOption = severitySelect.options[severitySelect.selectedIndex];
            //     const likelihoodOption = likelihoodSelect.options[likelihoodSelect.selectedIndex];

            //     // Reset values if no selection
            //     if (!severityOption || !likelihoodOption || severitySelect.value === '' || likelihoodSelect.value === '') {
            //         riskRatingInput.value = '';
            //         riskPriorityInput.value = '';
            //         updateRiskRatingColor(0);
            //         return;
            //     }

            //     // Get numeric values from data attributes
            //     const severityValue = parseInt(severityOption.getAttribute('data-value'));
            //     const likelihoodValue = parseInt(likelihoodOption.getAttribute('data-value'));

            //     // Validate numeric values
            //     if (isNaN(severityValue) || isNaN(likelihoodValue)) {
            //         console.error('Invalid numeric values for severity or likelihood');
            //         riskRatingInput.value = '';
            //         riskPriorityInput.value = '';
            //         return;
            //     }

            //     // Calculate risk rating (multiplication)
            //     const riskRating = severityValue * likelihoodValue;

            //     // Set risk rating (ensure it's within valid range)
            //     if (riskRating >= 1 && riskRating <= 25) {
            //         riskRatingInput.value = riskRating;

            //         // Determine risk priority based on risk rating
            //         const riskPriority = getRiskPriority(riskRating);
            //         riskPriorityInput.value = riskPriority;

            //         // Update visual indicators
            //         updateRiskRatingColor(riskRating);

            //         // Optional: Log calculation for debugging
            //         console.log(`Risk Calculation: ${severityValue} × ${likelihoodValue} = ${riskRating} (${riskPriority})`);
            //     } else {
            //         console.error('Calculated risk rating is out of valid range (1-25)');
            //         riskRatingInput.value = '';
            //         riskPriorityInput.value = '';
            //     }
            // }

            // // Alternative function using hardcoded values (if data attributes are not available)
            // function calculateRiskRatingAlternative() {
            //     const severitySelect = document.getElementById('severity');
            //     const likelihoodSelect = document.getElementById('likelihood');
            //     const riskRatingInput = document.getElementById('risk_rating');
            //     const riskPriorityInput = document.getElementById('risk_priority');

            //     // Severity mapping
            //     const severityValues = {
            //         'Catastrophic (5)': 5,
            //         'Serious (4)': 4,
            //         'Major (3)': 3,
            //         'Moderate (2)': 2,
            //         'Minor (1)': 1
            //     };

            //     // Likelihood mapping
            //     const likelihoodValues = {
            //         'Very Likely (5)': 5,
            //         'Likely (4)': 4,
            //         'Possible (3)': 3,
            //         'Remote (2)': 2,
            //         'Unlikely (1)': 1
            //     };

            //     const severityValue = severityValues[severitySelect.value];
            //     const likelihoodValue = likelihoodValues[likelihoodSelect.value];

            //     if (!severityValue || !likelihoodValue) {
            //         riskRatingInput.value = '';
            //         riskPriorityInput.value = '';
            //         updateRiskRatingColor(0);
            //         return;
            //     }

            //     // Calculate risk rating
            //     const riskRating = severityValue * likelihoodValue;
            //     riskRatingInput.value = riskRating;

            //     // Set risk priority
            //     const riskPriority = getRiskPriority(riskRating);
            //     riskPriorityInput.value = riskPriority;

            //     // Update colors
            //     updateRiskRatingColor(riskRating);
            // }

            // // Form validation before submission
            // function validateRiskForm() {
            //     const requiredFields = [
            //         { id: 'lab_name', name: 'Lab' },
            //         { id: 'severity', name: 'Severity' },
            //         { id: 'likelihood', name: 'Likelihood' },
            //         { id: 'risk_rating', name: 'Risk Rating' },
            //         { id: 'risk_priority', name: 'Risk Priority' }
            //     ];

            //     let isValid = true;
            //     let missingFields = [];

            //     requiredFields.forEach(field => {
            //         const element = document.getElementById(field.id);
            //         if (!element || !element.value || element.value.trim() === '') {
            //             isValid = false;
            //             missingFields.push(field.name);
            //         }
            //     });

            //     if (!isValid) {
            //         alert(`Please fill in the following required fields: ${missingFields.join(', ')}`);
            //         return false;
            //     }

            //     // Validate risk rating is within expected range
            //     const riskRating = parseInt(document.getElementById('risk_rating').value);
            //     if (riskRating < 1 || riskRating > 25) {
            //         alert('Risk rating must be between 1 and 25. Please recalculate.');
            //         return false;
            //     }

            //     return true;
            // }

            // // Initialize calculation on page load
            // document.addEventListener('DOMContentLoaded', function () {
            //     // Initial calculation if values are already selected
            //     calculateRiskRating();

            //     // Add form validation on submit
            //     const form = document.querySelector('form');
            //     if (form) {
            //         form.addEventListener('submit', function (e) {
            //             if (!validateRiskForm()) {
            //                 e.preventDefault();
            //                 return false;
            //             }
            //         });
            //     }

            //     // Optional: Add real-time validation feedback
            //     const severitySelect = document.getElementById('severity');
            //     const likelihoodSelect = document.getElementById('likelihood');

            //     if (severitySelect && likelihoodSelect) {
            //         [severitySelect, likelihoodSelect].forEach(select => {
            //             select.addEventListener('change', function () {
            //                 // Remove any previous error styling
            //                 this.classList.remove('is-invalid');

            //                 // Recalculate risk rating
            //                 calculateRiskRating();
            //             });
            //         });
            //     }
            // });

            // Risk Rating Calculation Function
            function calculateRiskRating() {
                const severitySelect = document.getElementById('severity');
                const likelihoodSelect = document.getElementById('likelihood');
                const riskRatingInput = document.getElementById('risk_rating');
                const riskPriorityInput = document.getElementById('risk_priority');

                // Get selected options
                const severityOption = severitySelect.options[severitySelect.selectedIndex];
                const likelihoodOption = likelihoodSelect.options[likelihoodSelect.selectedIndex];

                // Reset values if no selection
                if (!severityOption || !likelihoodOption || severitySelect.value === '' || likelihoodSelect.value === '') {
                    riskRatingInput.value = '';
                    riskPriorityInput.value = '';
                    updateRiskRatingColor(0);
                    return;
                }

                // Get numeric values from data attributes
                const severityValue = parseInt(severityOption.getAttribute('data-value'));
                const likelihoodValue = parseInt(likelihoodOption.getAttribute('data-value'));

                // Validate numeric values
                if (isNaN(severityValue) || isNaN(likelihoodValue)) {
                    console.error('Invalid numeric values for severity or likelihood');
                    riskRatingInput.value = '';
                    riskPriorityInput.value = '';
                    return;
                }

                // Calculate risk rating (multiplication)
                const riskRating = severityValue * likelihoodValue;

                // Set risk rating (ensure it's within valid range)
                if (riskRating >= 1 && riskRating <= 25) {
                    riskRatingInput.value = riskRating;

                    // Determine risk priority based on risk rating
                    const riskPriority = getRiskPriority(riskRating);
                    riskPriorityInput.value = riskPriority;

                    // Update visual indicators
                    updateRiskRatingColor(riskRating);

                    // Optional: Log calculation for debugging
                    console.log(`Risk Calculation: ${severityValue} × ${likelihoodValue} = ${riskRating} (${riskPriority})`);
                } else {
                    console.error('Calculated risk rating is out of valid range (1-25)');
                    riskRatingInput.value = '';
                    riskPriorityInput.value = '';
                }
            }

            // Function to determine risk priority based on risk rating
            function getRiskPriority(riskRating) {
                if (riskRating >= 25) {
                    return 'High';
                } else if (riskRating >= 17) {
                    return 'High';
                } else if (riskRating >= 8) {
                    return 'Medium';
                } else if (riskRating >= 1) {
                    return 'Low';
                } else {
                    return '';
                }
            }

            // Function to update risk rating input color based on risk level
            function updateRiskRatingColor(riskRating) {
                const riskRatingInput = document.getElementById('risk_rating');
                const riskPriorityInput = document.getElementById('risk_priority');

                // Remove existing classes
                const riskClasses = ['risk-very-high', 'risk-high', 'risk-medium', 'risk-low', 'risk-very-low'];
                riskClasses.forEach(className => {
                    riskRatingInput.classList.remove(className);
                    riskPriorityInput.classList.remove(className);
                });

                // Add appropriate class based on risk rating
                let riskClass = '';
                if (riskRating >= 25) {
                    riskClass = 'risk-very-high';
                } else if (riskRating >= 17) {
                    riskClass = 'risk-high';
                } else if (riskRating >= 8) {
                    riskClass = 'risk-medium';
                } else if (riskRating >= 1) {
                    riskClass = 'risk-low';
                }

                if (riskClass) {
                    riskRatingInput.classList.add(riskClass);
                    riskPriorityInput.classList.add(riskClass);
                }
            }

            // Form validation before submission
            function validateRiskForm() {
                const requiredFields = [
                    { id: 'lab_name', name: 'Lab' },
                    { id: 'severity', name: 'Severity' },
                    { id: 'likelihood', name: 'Likelihood' },
                    { id: 'risk_rating', name: 'Risk Rating' },
                    { id: 'risk_priority', name: 'Risk Priority' }
                ];

                let isValid = true;
                let missingFields = [];

                requiredFields.forEach(field => {
                    const element = document.getElementById(field.id);
                    if (!element || !element.value || element.value.trim() === '') {
                        isValid = false;
                        missingFields.push(field.name);
                    }
                });

                if (!isValid) {
                    alert(`Please fill in the following required fields: ${missingFields.join(', ')}`);
                    return false;
                }

                // Validate risk rating is within expected range
                const riskRating = parseInt(document.getElementById('risk_rating').value);
                if (riskRating < 1 || riskRating > 25) {
                    alert('Risk rating must be between 1 and 25. Please recalculate.');
                    return false;
                }

                return true;
            }

            // Initialize calculation on page load
            document.addEventListener('DOMContentLoaded', function () {
                // Initial calculation if values are already selected
                calculateRiskRating();

                // Add form validation on submit
                const form = document.querySelector('form');
                if (form) {
                    form.addEventListener('submit', function (e) {
                        if (!validateRiskForm()) {
                            e.preventDefault();
                            return false;
                        }
                    });
                }

                // Optional: Add real-time validation feedback
                const severitySelect = document.getElementById('severity');
                const likelihoodSelect = document.getElementById('likelihood');

                if (severitySelect && likelihoodSelect) {
                    [severitySelect, likelihoodSelect].forEach(select => {
                        select.addEventListener('change', function () {
                            // Remove any previous error styling
                            this.classList.remove('is-invalid');

                            // Recalculate risk rating
                            calculateRiskRating();
                        });
                    });
                }
            });
        </script>
        <style>
            /* Risk Rating Color Styles */
            .risk-very-high {
                background-color: #dc3545 !important;
                color: white !important;
                font-weight: bold;
            }

            .risk-high {
                background-color: #fd7e14 !important;
                color: white !important;
                font-weight: bold;
            }

            .risk-medium {
                background-color: #ffc107 !important;
                color: black !important;
                font-weight: bold;
            }

            .risk-low {
                background-color: #20c997 !important;
                color: white !important;
                font-weight: bold;
            }

            .risk-very-low {
                background-color: #28a745 !important;
                color: white !important;
                font-weight: bold;
            }

            /* Form styling improvements */
            .form-container-sub {
                padding: 20px;
                border: 1px solid #dee2e6;
                border-radius: 10px;
                margin-bottom: 20px;
                background-color: #f8f9fa;
            }

            .form-container-sub label {
                font-weight: 600;
                margin-bottom: 5px;
                display: block;
            }

            .form-container-sub select,
            .form-container-sub input,
            .form-container-sub textarea {
                width: 100%;
                padding: 8px 12px;
                border: 1px solid #ced4da;
                border-radius: 5px;
                margin-bottom: 15px;
                transition: border-color 0.3s ease;
            }

            .form-container-sub select:focus,
            .form-container-sub input:focus,
            .form-container-sub textarea:focus {
                outline: none;
                border-color: #049f3b;
                box-shadow: 0 0 0 0.2rem rgba(4, 159, 59, 0.25);
            }

            /* Risk Matrix Visual Indicator */
            .risk-matrix-indicator {
                display: inline-block;
                width: 20px;
                height: 20px;
                border-radius: 50%;
                margin-left: 10px;
                vertical-align: middle;
            }
        </style>
        <script>
            document.getElementById("lab_name").addEventListener("change", function () {
                document.getElementById("hidden_lab_name").value = this.value;
            });
        </script>
    </body>

    </html>
    <script>
        function addrow() {
            event.preventDefault()
            const row = document.getElementById('newTreatment')
            row.innerHTML += `
                                                                                                                                                                                        <div class="col-md-3">
                                                                                                                                                                                            <label for="email">Progress (%)</label>
                                                                                                                                                                                            <input type="text" name="name">

                                                                                                                                                                                        </div>
                                                                                                                                                                                        <div class="col-md-3">
                                                                                                                                                                                            <label for="email">Status</label>
                                                                                                                                                                                            <select>
                                                                                                                                                                                                <option value="">-- Select --</option>
                                                                                                                                                                                            </select>

                                                                                                                                                                                        </div>
                                                                                                                                                                                        <div class="col-md-3">
                                                                                                                                                                                            <label for="email">Responsible</label>
                                                                                                                                                                                            <input type="text" name="name">
                                                                                                                                                                                        </div>
                                                                                                                                                                                        <div class="col-md-3">
                                                                                                                                                                                            <label for="email">Review Date </label>
                                                                                                                                                                                            <input type="date" name="name">

                                                                                                                                                                                        </div>
                                                                                                                                                                                        <div class="col-md-12">
                                                                                                                                                                                            <label for="email">Action</label>
                                                                                                                                                                                            <textarea name="" id=""></textarea>
                                                                                                                                                                                        </div>
                                                                                                                                                                                        `


        }
    </script>

@endsection