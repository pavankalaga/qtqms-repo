@extends('layouts.base')
@section('content')
<section class="dash-container">
    <div class="dash-content">
        <div class="sales-headquarters">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
        data-bs-target="#myModal">
        Add
    </button>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body table-border-style">
                        <h5></h5>
                        <div class="table-responsive">
                            <table class="table" id="datatable" width="100%">
                                <thead>
                                    <tr>
                                        <th title="Id">Id</th>
                                        <th title="Name">Name</th>
                                        <th title="Action" width="60">Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade opportunity-modal" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add Sales Head Quarters</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('sales_headquarters.save')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="name" class="col-form-label">Name</label>
                            <input type="text" class="form-control small-placeholder" id="name"
                                name="name" required>
                            @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-end mt-4">
                        <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded mr-2"
                            @click="openModal = false">Close</button>
                        <button type="submit" class="text-white px-4 py-2 rounded"
                            style="background-color: #0c9207;">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
      $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('sales_headquarters.data') }}'
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });


        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this record?")) {
        $.ajax({
            url: '/sales_headquarters/' + id,
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                alert(response.success);
                $('#datatable').DataTable().ajax.reload(); // Refresh the DataTable
            },
            error: function(xhr) {
                alert("An error occurred. Please try again.");
            }
        });
    }
        }
    </script>
    @endsection