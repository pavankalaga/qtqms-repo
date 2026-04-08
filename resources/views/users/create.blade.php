<div>
    <div class="row">
        <div class="col-12 col-xl-8">
            <div class="card card-body border-0 shadow mb-4">
                <h2 class="h5 mb-4">Sales Profile</h2>
                <form method="post" action="{{route('profile.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="first_name">First Name</label>
                                <input name="first_name" class="form-control" id="first_name" type="text"
                                    placeholder="Enter your first name" required>
                                @error('first_name')
                                <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="last_name">Last Name</label>
                                <input name="last_name" class="form-control" id="last_name" type="text"
                                    placeholder="Also your last name" required>
                                @error('last_name')
                                <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input name="email" class="form-control" id="email" type="email"
                                    placeholder="name@company.com" required>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="gender">Gender</label>
                            <select name="gender" class="form-select mb-0" id="gender" required>
                                <option selected>Choose...</option>
                                <option value="Female">Female</option>
                                <option value="Male">Male</option>
                                <option value="Other">Other</option>
                            </select>
                            @error('gender')
                            <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <h2 class="h5 my-4">Location</h2>
                    <div class="row">
                        <div class="col-sm-9 mb-3">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input name="address" class="form-control" id="address" type="text"
                                    placeholder="Enter your home address" required>
                                @error('address')
                                <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <div class="form-group">
                                <label for="number">Phone Number</label>
                                <input name="number" class="form-control" id="number" type="tel"
                                    placeholder="Enter Your Phone No." required>
                                @error('number')
                                <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 mb-3">
                            <div class="form-group">
                                <label for="state">State</label>
                                <input name="state" class="form-control" id="state" type="text"
                                    placeholder="Enter Your State" required>
                                @error('state')
                                <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input name="city" class="form-control" id="city" type="text"
                                    placeholder="Enter Your City" required>
                                @error('city')
                                <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="sales_headquarter_id">Sales Head Quarters</label>
                            <select name="sales_headquarter_id" class="form-select mb-0" id="sales_headquarter_id"
                                required>
                                <option selected>Choose...</option>
                                @foreach ($sales_headquarters as $sales)
                                    <option value="{{ $sales->id }}">{{ $sales->name }}</option>
                                @endforeach
                            </select>
                            @error('sales_headquarter_id')
                            <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-select mb-0" required>
                                <option selected>Choose...</option>
                                <option value="1">General Manager</option>
                                <option value="2">Sales Manager</option>
                                <option value="3">Retail Manager</option>
                                <option value="4">Senior Manager</option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="reported_to">Reported To</label>
                            <select name="reported_to" id="reported_to" class="form-select mb-0" required>
                                <option selected>Choose...</option>
                                <option value="1">General Manager</option>
                                <option value="2">Sales Manager</option>
                                <option value="3">Retail Manager</option>
                                <option value="4">Senior Manager</option>
                            </select>
                            @error('reported_to')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="parent">Parent Role</label>
                            <select name="parent" id="parent" class="form-select mb-0">
                                <option selected>Choose...</option>
                                @foreach ($treeRoles as $role)
                                    <option value="{{ $role->id }}">{{ $role->reported_role }}</option>
                                @endforeach
                            </select>
                            @error('parent')
                            <div class="invalid-feedback">{{ $message }}</div>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const roleSelect = document.getElementById('role');
            const reportedToSelect = document.getElementById('reported_to');

            // Example user data with roles; ideally, this should be fetched from your server
            const users = [
                { id: 1, name: 'General Manager', role: 'general_manager' },
                { id: 2, name: 'Sales Manager', role: 'sales_manager' },
                { id: 3, name: 'Retail Manager', role: 'retail_manager' },
                { id: 4, name: 'Senior Manager', role: 'senior_manager' }
                // Add more users as needed
            ];

            function updateReportedToOptions(selectedRole) {
                // Clear existing options while keeping the default
                reportedToSelect.innerHTML = '<option selected>Choose...</option>';

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

            function toggleVisibility() {
                const selectedRole = roleSelect.value;

                // Call the function to update options based on the selected role
                updateReportedToOptions(selectedRole);
            }

            roleSelect.addEventListener('change', toggleVisibility);
            toggleVisibility(); // Initial check on page load
        });
    </script>

</div>