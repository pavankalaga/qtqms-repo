@extends('layouts.base')
@section('content')
<section class="dash-container">
    <div class="dash-content">

        <div class="row lead-profile">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body table-border-style">
                    <a href="{{route('lead.profile.create')}}"><button class="lead-profile-btn">Add</button></a>
                        <div class="table-responsive">
                            <table class="table" id="datatable" width="100%">
                                <thead>
                                    <tr>
                                        <th title="Id">Id</th>
                                        <th title="Name">Name</th>
                                        <th title="Email">Email</th>
                                        <th title="Phone">Phone</th>
                                        <th title="Head Quarters">Head Quarters</th>
                                        <th title="Assign User">Assign User</th>
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
        $(document).ready(function () {
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('lead.getprofile') }}', // Ensure this route is defined
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    { data: 'headquarters', name: 'headquarters', orderable: false, searchable: false },
                    { data: 'assign_user', name: 'assign_user', orderable: false, searchable: false },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });


        function confirmDelete(id) {
            if (confirm('Are you sure you want to delete this record?')) {
                // Make the DELETE request to the server
                fetch(`/lead/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}', // Include CSRF token for protection
                        'Content-Type': 'application/json',
                    },
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            alert(data.success);
                            // Refresh the DataTable or remove the deleted row
                            $('#datatable').DataTable().ajax.reload(); // replace with your DataTable ID
                        }
                    })
                    .catch(error => {
                        alert('Error: ' + error.message);
                    });
            }
        }
    </script>


    @endsection