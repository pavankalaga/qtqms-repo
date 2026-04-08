@extends('layouts.base')
@section('content')
<section class="dash-container">
    <div class="dash-content">

        <div class="row">
            <div class="col-xl-12">
                <div class="card lead-tag">
                    <div class="card-body table-border-style">
                        <h5></h5>
                        <div class="table-responsive">
                            <table class="table" id="datatable" width="100%">
                                <thead>
                                    <tr>
                                        <th title="Id">Id</th>
                                        <th title="Business Name">Business Name</th>
                                        <th title="Email">Email</th>
                                        <th title="Phone">Phone</th>
                                        <th title="Head Quarters">Head Quarters</th>
                                        <th title="State">State</th>
                                        <th title="Status">Status</th>
                                        <th title="Assign User">Assign User</th>
                                        <th title="Assign">Assign</th>
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
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
    $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('leadtagging.data') }}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'business_name', name: 'business_name' },
            { data: 'email', name: 'email' },
            { data: 'phone', name: 'phone' },
            { data: 'headquarters', name: 'headquarters', orderable: false, searchable: false },
            { data: 'state', name: 'state' },
            { data: 'status', name: 'status', orderable: false, searchable: false },
            { data: 'assign', name: 'assign' },
            { data: 'assign_user', name: 'assign_user', orderable: false, searchable: false },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});


        function confirmDelete(id) {
            // Your delete confirmation logic here
        }
    </script>
    @endsection