@extends('layouts.base')
@section('content')

<section class="dash-container">
    <div class="dash-content">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="card card-body border-0 shadow mb-4">
                    <h2 class="h5 mb-4">Sales Profile</h2>

                    <form action="{{ route('lead.profile.update', $user->id) }}" method="post" class="leads-profile-form" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div>
                                    <label for="first_name">First Name</label>
                                    <input name="first_name" class="form-control" id="first_name" type="text"
                                        placeholder="Enter your first name"
                                        value="{{ old('first_name', $user->first_name) }}" required>
                                    @error('first_name')
                                    <div class="error_message">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div>
                                    <label for="last_name">Last Name</label>
                                    <input name="last_name" class="form-control" id="last_name" type="text"
                                        placeholder="Also your last name"
                                        value="{{ old('last_name', $user->last_name) }}" required>
                                    @error('last_name')
                                    <div class="error_message">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="email" class="form-control" id="email" type="email"
                                        placeholder="name@company.com" value="{{ old('email', $user->email) }}"
                                        required>
                                    @error('email')
                                    <div class="error_message">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="gender">Gender</label>
                                <select name="gender" class="form-select mb-0" id="gender" required>
                                    <option value="">Choose...</option>
                                    <option value="Female" {{ old('gender', $user->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                                    <option value="Male" {{ old('gender', $user->gender) == 'Male' ? 'selected' : '' }}>
                                        Male</option>
                                    <option value="Other" {{ old('gender', $user->gender) == 'Other' ? 'selected' : '' }}>
                                        Other</option>
                                </select>
                                @error('gender')
                                <div class="error_message">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <h2 class="h5 my-4">Location</h2>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input name="address" class="form-control" id="address" type="text"
                                        placeholder="Enter your home address"
                                        value="{{ old('address', $user->address) }}" required>
                                    @error('address')
                                    <div class="error_message">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="number">Phone Number</label>
                                    <input name="number" class="form-control" id="number" type="tel"
                                        placeholder="Enter Your Phone No." value="{{ old('number', $user->number) }}"
                                        required>
                                    @error('number')
                                    <div class="error_message">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        
                            <div class="col-md-4 ">
                                <div class="form-group">
                                    <label for="state">State</label>
                                    <input name="state" class="form-control" id="state" type="text"
                                        placeholder="Enter Your State" value="{{ old('state', $user->state) }}"
                                        required>
                                    @error('state')
                                    <div class="error_message">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input name="city" class="form-control" id="city" type="text"
                                        placeholder="Enter Your City" value="{{ old('city', $user->city) }}" required>
                                    @error('city')
                                    <div class="error_message">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="sales_headquarter_id">Sales Head Quarters</label>
                                <select name="sales_headquarter_id" class="form-select mb-0" id="sales_headquarter_id"
                                    required>
                                    <option value="">Choose...</option>
                                    @foreach ($sales_headquarters as $sales)
                                        <option value="{{ $sales->id }}" {{ old('sales_headquarter_id', $user->sales_headquarter_id) == $sales->id ? 'selected' : '' }}>
                                            {{ $sales->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('sales_headquarter_id')
                                    <div class="error_message">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="col-md-4 mb-3">
                                <label for="role">Role</label>
                                <select name="role" id="role" class="form-select mb-0" required>
                                    <option value="">Choose...</option>
                                    <option value="General Manager" {{ old('role', $user->role) == 'General Manager' ? 'selected' : '' }}>General Manager</option>
                                    <option value="Sales Manager" {{ old('role', $user->role) == 'Sales Manager' ? 'selected' : '' }}>Sales Manager</option>
                                    <option value="Retail Manager" {{ old('role', $user->role) == 'Retail Manager' ? 'selected' : '' }}>Retail Manager</option>
                                    <option value="Senior Manager" {{ old('role', $user->role) == 'Senior Manager' ? 'selected' : '' }}>Senior Manager</option>
                                </select>
                                @error('role')
                                    <div class="error_message">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="col-md-4 mb-3">
                                <label for="reported_to">Reported To</label>
                                <select name="reported_to" id="reported_to" class="form-select mb-0" required>
                                    <option value="">Choose...</option>
                                    <option value="General Manager" {{ old('reported_to', $user->reported_to) == 'General Manager' ? 'selected' : '' }}>General Manager</option>
                                    <option value="Sales Manager" {{ old('reported_to', $user->reported_to) == 'Sales Manager' ? 'selected' : '' }}>Sales Manager</option>
                                    <option value="Retail Manager" {{ old('reported_to', $user->reported_to) == 'Retail Manager' ? 'selected' : '' }}>Retail Manager</option>
                                    <option value="Senior Manager" {{ old('reported_to', $user->reported_to) == 'Senior Manager' ? 'selected' : '' }}>Senior Manager</option>
                                </select>
                                @error('reported_to')
                                    <div class="error_message">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="col-md-4 mb-3">
                                <label for="parent">Parent Role</label>
                                <select name="parent" id="parent" class="form-select mb-0">
                                    <option value="">Choose...</option>
                                    @foreach ($categories as $role)
                                        <option value="{{ $role->id }}" {{ old('parent', $user->parent) == $role->id ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('parent')
                                    <div class="error_message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary mt-2 animate-up-2">Save</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <style>
            .error_message {
                color: red;
                font-size: 0.875em;
                margin-top: 0.25em;
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const form = document.querySelector('form');

                form.addEventListener('submit', function (event) {
                    let isValid = true;

                    // Reset all error messages
                    const errorMessages = document.querySelectorAll('.error_message');
                    errorMessages.forEach(el => el.style.display = 'none');

                    // Validate required text fields
                    const requiredTextFields = ['first_name', 'last_name', 'email', 'address', 'number', 'state', 'city'];
                    requiredTextFields.forEach(id => {
                        const field = document.getElementById(id);
                        if (field && field.value.trim() === '') {
                            showError(field, 'This field is required.');
                            isValid = false;
                        }
                    });

                    // Validate required select fields
                    const requiredSelectFields = ['gender', 'sales_headquarter_id', 'role', 'reported_to'];
                    requiredSelectFields.forEach(id => {
                        const selectField = document.getElementById(id);
                        if (selectField && (selectField.value === '' || selectField.value === 'Choose...')) {
                            showError(selectField, 'Please select an option.');
                            isValid = false;
                        }
                    });

                    // Validate email format
                    const email = document.getElementById('email');
                    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                    if (email && !emailPattern.test(email.value.trim())) {
                        showError(email, 'Please enter a valid email address.');
                        isValid = false;
                    }

                    // Validate phone number format
                    const phoneNumber = document.getElementById('number');
                    const phonePattern = /^\d{10}$/; // Example: exactly 10 digits
                    if (phoneNumber && !phonePattern.test(phoneNumber.value.trim())) {
                        showError(phoneNumber, 'Please enter a valid phone number (10 digits).');
                        isValid = false;
                    }

                    // Prevent form submission if validation fails
                    if (!isValid) {
                        event.preventDefault();
                    }
                });

                function showError(element, message) {
                    const errorDiv = element.nextElementSibling;
                    if (errorDiv) {
                        errorDiv.textContent = message;
                        errorDiv.style.display = 'block'; // Show error message
                    }
                }
            });
        </script>





        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            // SweetAlert2 alert listener
            Livewire.on('alert', param => {
                Swal.fire({
                    icon: param.type,
                    title: param.message,
                    showConfirmButton: true,
                    timer: 3000 // Auto-close after 3 seconds
                });
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const roleSelect = document.getElementById('role');
                const reportedToSelect = document.getElementById('reported_to');

                // Example user data with roles; ideally, this should be fetched from your server
                const users = [
                    { id: 'General Manager', name: 'General Manager', role: 'General Manager' },
                    { id: 'Sales Manager', name: 'Sales Manager', role: 'Sales Manager' },
                    { id: 'Retail Manager', name: 'Retail Manager', role: 'Retail Manager' },
                    { id: 'Senior Manager', name: 'Senior Manager', role: 'Senior Manager' }
                    // Add more users as needed
                ];

                function updateReportedToOptions(selectedRole) {
                    // Clear existing options while keeping the default
                    reportedToSelect.innerHTML = '<option value="">Choose...</option>';

                    // Populate "Reported To" options, excluding the selected role
                    users.forEach(user => {
                        const option = document.createElement('option');
                        option.value = user.id;
                        option.textContent = user.name;

                        // Exclude the option if the user's role matches the selected role
                        if (user.role !== selectedRole) {
                            reportedToSelect.appendChild(option);
                        }
                    });
                }

                // Update reported_to options when role changes
                roleSelect.addEventListener('change', () => {
                    const selectedRole = roleSelect.value;
                    updateReportedToOptions(selectedRole);
                });

                // Initialize options on page load
                updateReportedToOptions(roleSelect.value);
            });
        </script>

    </div>
</section>
@endsection