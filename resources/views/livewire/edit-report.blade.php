<div>
    <div class="pt-2">
        
        <!-- <div x-data="{ showForm: false }">
            <div class="d-flex main-buttons bd-highlight">
                <div class="row">
                    <div class="col">
                        <button class="btn-custom" @click="showForm = !showForm">
                            Bulk Import
                        </button>
                    </div>

                    <div class="col">
                       

                        <a href="{{ route('download.testfile') }}" > <button class="btn-custom-cancel" @click="showForm = false">
                        Download 
                        </button></a>
                    </div>
                </div>
            </div>

            <div x-show="showForm" class="">
                <form wire:submit.prevent="bulkImport" class=" d-flex">
                    <div class="form-group">
                        <label for="fileUpload" class="form-label">Upload File</label>
                        <input type="file" class="form-control-file" id="fileUpload" wire:model="file">
                        @error('file')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary" style="
                        border: 1px solid gray;
                        box-shadow: none;
                        background-color: #191970;
                        font-size: 12px;
                    ">Import Reports</button>
                </form>
            </div>
        </div>
        <hr> -->
    </div>
    <div>
        <div class="text-center flex-column">

            <div class="details">
                <p class="deatils-heading">
                    Update Details
                </p>
            </div>
            @if (session()->has("vaaa"))
                <div class="text-green-700"> {{ session("vaaa") }}</div>
            @endif
            <form wire:submit.prevent="updateReport">
            <div class="row mt-3">
                    <!-- Item Category -->
                    <div class="form-group row">
                        <label for="itemCategory" class="col-sm-2 col-form-label">Item Category</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control small-placeholder" id="itemCategory"
                                placeholder="Item Category" wire:model="item_category">
                            @error('item_category') <!-- Validation error for item_category -->
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Generic Item Name -->
                    <div class="form-group row">
                        <label for="genericItemName" class="col-sm-2 col-form-label">Generic Item Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control small-placeholder" id="genericItemName"
                                placeholder="Generic Item Name" wire:model="generic_item_name">
                            @error('generic_item_name') <!-- Validation error for generic_item_name -->
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Item Name -->
                    <div class="form-group row">
                        <label for="itemName" class="col-sm-2 col-form-label">Item Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control small-placeholder" id="itemName"
                                placeholder="Item Name" wire:model="item_name">
                            @error('item_name') <!-- Validation error for item_name -->
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Item Code -->
                    <div class="form-group row">
                        <label for="itemCode" class="col-sm-2 col-form-label">Item Code</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control small-placeholder" id="itemCode"
                                placeholder="Item Code" wire:model="item_code">
                            @error('item_code') <!-- Validation error for item_code -->
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row mt-5">
                    <!-- Department -->
                    <div class="form-group row">
                        <label for="department" class="col-sm-2 col-form-label">Department</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control small-placeholder" id="department"
                                placeholder="Department" wire:model="department">
                            @error('department') <!-- Validation error for department -->
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Machine -->
                    <div class="form-group row">
                        <label for="machine" class="col-sm-2 col-form-label">Machine</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control small-placeholder" id="machine" placeholder="Machine"
                                wire:model="machine">
                            @error('machine') <!-- Validation error for machine -->
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Test Code -->
                    <div class="form-group row">
                        <label for="testCode" class="col-sm-2 col-form-label">Test Code</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control small-placeholder" id="testCode"
                                placeholder="Test Code" wire:model="test_code">
                            @error('test_code') <!-- Validation error for test_code -->
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Test Name -->
                    <div class="form-group row">
                        <label for="testName" class="col-sm-2 col-form-label">Test Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control small-placeholder" id="testName"
                                placeholder="Test Name" wire:model="test_name">
                            @error('test_name') <!-- Validation error for test_name -->
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row mt-5">
                    <!-- Supplier Name -->
                    <div class="form-group row">
                        <label for="supplierName" class="col-sm-2 col-form-label">Supplier Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control small-placeholder" id="supplierName"
                                placeholder="Supplier Name" wire:model="supplier_name">
                            @error('supplier_name') <!-- Validation error for supplier_name -->
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control small-placeholder" id="address" placeholder="Address"
                                wire:model="address">
                            @error('address') <!-- Validation error for address -->
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row mt-5">
                    <!-- Manufacture -->
                    <div class="form-group row">
                        <label for="manufacture" class="col-sm-2 col-form-label">Manufacture</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control small-placeholder" id="manufacture"
                                placeholder="Manufacture" wire:model="manufacture">
                            @error('manufacture') <!-- Validation error for manufacture -->
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- HSN Code -->
                    <div class="form-group row">
                        <label for="hsnCode" class="col-sm-2 col-form-label">HSN Code</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control small-placeholder" id="hsnCode"
                                placeholder="HSN Code" wire:model="hsn_code">
                            @error('hsn_code') <!-- Validation error for hsn_code -->
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Unit of Purchase -->
                    <div class="form-group row">
                        <label for="unitOfPurchase" class="col-sm-2 col-form-label">Unit of Purchase</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control small-placeholder" id="unitOfPurchase"
                                placeholder="Unit of Purchase" wire:model="unit_of_purchase">
                            @error('unit_of_purchase') <!-- Validation error for unit_of_purchase -->
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Pack Size -->
                    <div class="form-group row">
                        <label for="packSize" class="col-sm-2 col-form-label">Pack Size</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control small-placeholder" id="packSize"
                                placeholder="Pack Size" wire:model="pack_size">
                            @error('pack_size') <!-- Validation error for pack_size -->
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <!-- Unit Price -->
                    <div class="form-group row">
                        <label for="unitPrice" class="col-sm-2 col-form-label">Unit Price</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control small-placeholder" id="unitPrice"
                                placeholder="Unit Price" wire:model="unit_price">
                            @error('unit_price') <!-- Validation error for unit_price -->
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="packSize" class="col-sm-2 col-form-label">Pack Size</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control small-placeholder" id="packSize"
                                placeholder="Pack Size" wire:model="pack_size">
                                @error('pack_size') <!-- Validation error for pack_size -->
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                  

                    <!-- CGST -->
                    <div class="form-group row">
                        <label for="cgst" class="col-sm-2 col-form-label">CGST</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control small-placeholder" id="cgst" placeholder="CGST"
                                wire:model="cgst">
                                @error('cgst') <!-- Validation error for cgst -->
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- SGST -->
                    <div class="form-group row">
                        <label for="sgst" class="col-sm-2 col-form-label">SGST</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control small-placeholder" id="sgst" placeholder="SGST"
                                wire:model="sgst">
                                @error('sgst') <!-- Validation error for sgst -->
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Price with GST -->
                    <div class="form-group row">
                        <label for="priceGst" class="col-sm-2 col-form-label">Price (Inc GST)</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control small-placeholder" id="priceGst"
                                placeholder="Price with GST" wire:model="price_gst">
                                @error('price_gst') <!-- Validation error for price_gst -->
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="form-group mt-3 text-center">
                    <button type="submit" class="btn-custom">Submit</button>
                </div>
            </form>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireScripts

    <script>
        Livewire.on('fileUploaded', () => {
            const input = document.querySelector('input[type="file"]');
            if (input) {
                input.value = ''; // Clear the file input manually
            }
        });

        Livewire.on('formSubmitted', () => {
            document.querySelector('[x-data]').__x.$data.showForm = false;
        });

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

    <style>
        .btn-custom {
            background-color: #191970;
            /* Primary blue color */
            color: white;
            font-size: 14px;
            padding: 8px 16px;
            border: 1px solid #191970;
            border-radius: 4px;
            transition: background-color 0.3s ease, border-color 0.3s ease;
            cursor: pointer;
            white-space: nowrap;
        }

        .btn-custom-cancel {
            background-color: #0c9207;
            /* Red for cancel */
            color: white;
            font-size: 14px;
            padding: 8px 16px;
            border: 1px solid #0c9207;
            border-radius: 4px;
            transition: background-color 0.3s ease, border-color 0.3s ease;
            cursor: pointer;
        }

        .btn-custom:hover,
        .btn-custom-cancel:hover {
            opacity: 0.8;
            /* Slight fade on hover for both */
        }

        .deatils-heading {
            font-size: 24px;
            font-weight: 600;
            margin: 0px;
        }

        /* Custom styles for better spacing, fonts, and padding */
        .form-group label {
            font-size: 1.1rem;
            font-weight: 500;
        }

        .form-control {
            padding: 10px;
            font-size: 1rem;
            border-radius: 5px;
            border: 1px solid #ced4da;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .form-section {
            margin-bottom: 2rem;
        }

        hr {
            margin: 1.5rem 0;
        }

        .form-group.row {
            padding: 6px 19px;
        }

        .form-group label {
            text-align: left;
        }

        .small-placeholder::placeholder {
            font-size: 0.8em;
            /* Adjust the size as needed */
            color: #999;
            /* Optional: change the color of the placeholder text */
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .form-group label {
                font-size: 1rem;
            }

            .form-control {
                font-size: 0.9rem;
            }

            .btn {
                font-size: 1rem;
                padding: 10px 20px;
            }
        }

        .submit-button {
            /* text-align: start !important; */
            margin-top: 15px;
        }

        .d-flex.main-buttons.bd-highlight {
            display: flex;
            justify-content: end;
        }
    </style>




</div>