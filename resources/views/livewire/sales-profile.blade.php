<div>
    <div class="row">
        <div class="col-12 col-xl-8">
            <div class="card card-body border-0 shadow mb-4">
                <h2 class="h5 mb-4">Sales Profile</h2>
                <form wire:submit.prevent="test">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="first_name">First Name</label>
                                <input wire:model="first_name" class="form-control" id="first_name" type="text" placeholder="Enter your first name" required>
                                @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="last_name">Last Name</label>
                                <input wire:model="last_name" class="form-control" id="last_name" type="text" placeholder="Also your last name" required>
                                @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input wire:model="email" class="form-control" id="email" type="email" placeholder="name@company.com" required>
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="gender">Gender</label>
                            <select wire:model="gender" class="form-select mb-0" id="gender">
                                <option selected>Choose...</option>
                                <option value="Female">Female</option>
                                <option value="Male">Male</option>
                                <option value="Other">Other</option>
                            </select>
                            @error('gender') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <h2 class="h5 my-4">Location</h2>
                    <div class="row">
                        <div class="col-sm-9 mb-3">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input wire:model="address" class="form-control" id="address" type="text" placeholder="Enter your home address" required>
                                @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <div class="form-group">
                                <label for="number">Phone Number</label>
                                <input wire:model="number" class="form-control" id="number" type="tel" placeholder="Enter Your Phone No." required>
                                @error('number') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 mb-3">
                            <div class="form-group">
                                <label for="state">State</label>
                                <input wire:model="state" class="form-control" id="state" type="text" placeholder="Enter Your State" required>
                                @error('state') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input wire:model="city" class="form-control" id="city" type="text" placeholder="Enter Your City" required>
                                @error('city') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="sales_headquarter_id">Sales Head Quarters</label>
                            <select wire:model="sales_headquarter_id" class="form-select mb-0" id="sales_headquarter_id" required>
                                <option selected>Choose...</option>
                                @foreach ($sales_headquarters as $sales)
                                    <option value="{{ $sales->id }}">{{ $sales->name }}</option>
                                @endforeach
                            </select>
                            @error('sales_headquarter_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary mt-2 animate-up-2">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @livewireScripts
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
</div>
