<div>
        <div class="row">
            <div class="col-12 col-xl-8">
                <div class="card card-body border-0 shadow mb-4">
                    <h2 class="h5 mb-4">Sales HeadQuarters Details</h2>
                    <form wire:submit.prevent="save">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div>
                                    <label for="name"> Name</label>
                                    <input wire:model="name" class="form-control" id="name" type="text"
                                           placeholder="Enter Name" required>
                                </div>
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