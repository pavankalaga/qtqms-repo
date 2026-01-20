@extends('layouts.base')
@section('content')

<section class="dash-container">
    <div class="dash-content">

        <div class="row sales">
            <div class="col-12 mb-3">
                <div class="row">
                    <div class="col-3">
                        <div class="card sticky-top" style="top:30px">
                            <div class="list-group list-group-flush" id="useradd-sidenav">
                                <a class="list-group-item list-group-item-action border-0" href="#sales_funnel">Day Plan
                                    <div class="float-end"><i class="fa-solid fa-chevron-right"></i></div>
                                </a>
                                <a class="list-group-item list-group-item-action border-0" href="#calllog">Call Logs
                                    <div class="float-end"><i class="fa-solid fa-chevron-right"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-9">


                        <div id="sales_funnel" class="sales-calls">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card table-card deal-card">
                                        <div class="card-header">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h5>Day Plan</h5>
                                                </div>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#myModal">
                                                    Add Day Plan
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0 table-border-style bg-none"
                                            style="height:300px;overflow: auto;">
                                            <div>
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
                                                            <!-- <th title="Assign">Change Status</th> -->
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

                        <div id="calllog" class="sales-calls">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card table-card deal-card">
                                        <div class="card-header">
                                            <d class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h5>Call Logs</h5>
                                                </div>


                                        </div>
                                    </div>
                                    <div class="card-body pt-0 table-border-style bg-none"
                                        style="height:300px;overflow: auto;">
                                        <div>
                                            <table class="table" id="datatable1" width="100%">
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
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade sales_calls_contact" id="myModal" tabindex="-1" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add Contact Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('salescall.assign_users') }}" method="post">
                    @csrf
                    <div x-data="{ open: false, selectedUsers: [] }">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="lead_ids" class="col-form-label">Users</label>
                                <select id="lead_ids" name="lead_ids[]" data-mdb-select-init multiple
                                    class="form-control">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('lead_ids')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="assign_date" class="col-form-label">Assign Date</label>
                                <input type="date" name="assign_date" id="assign_date"
                                    class="w-full p-2 border border-gray-300 rounded mt-4 mb-4" required>
                                @error('assign_date') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-end mt-4">
                            <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded mr-2"
                                @click="open = false">Close</button>
                            <button type="submit" class="text-white px-4 py-2 rounded"
                                style="background-color: #0c9207;">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('salescall.data') }}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'business_name', name: 'business_name' },
                { data: 'email', name: 'email' },
                { data: 'phone', name: 'phone' },
                { data: 'headquarters', name: 'headquarters', orderable: false, searchable: false },
                { data: 'state', name: 'state' },
                { data: 'status', name: 'status', orderable: false, searchable: false },
                { data: 'assign', name: 'assign' },
                // { data: 'change_status', name: 'change_status', orderable: false, searchable: false },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });

    $(document).ready(function () {
        $('#datatable1').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('salescall.data') }}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'business_name', name: 'business_name' },
                { data: 'email', name: 'email' },
                { data: 'phone', name: 'phone' },
                { data: 'headquarters', name: 'headquarters', orderable: false, searchable: false },
                { data: 'state', name: 'state' },
                { data: 'status', name: 'status', orderable: false, searchable: false },
                { data: 'assign', name: 'assign' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });

    function confirmDelete(id) {
        // Your delete confirmation logic here
    }
</script>
<script>
    $(document).ready(function () {
        let rowCount = 1;

        // Add Row
        $('#add-row').click(function () {
            let newRow = `
                <tr>
                    <td>${++rowCount}</td>
                    <td><input type="text" name="expected_business[${rowCount}][test_name]" class="form-control"></td>
                    <td><input type="number" name="expected_business[${rowCount}][expected_qty_day]" class="form-control"></td>
                    <td><input type="number" name="expected_business[${rowCount}][expected_l2l_price]" class="form-control"></td>
                    <td><input type="number" name="expected_business[${rowCount}][amount]" class="form-control"></td>
                    <td><input type="number" name="expected_business[${rowCount}][total]" class="form-control"></td>
                    <td><button type="button" class="btn btn-danger btn-small remove-row">&times;</button></td>
                </tr>
            `;
            $('#expected-business-table tbody').append(newRow);
        });

        // Remove Row
        $(document).on('click', '.remove-row', function () {
            $(this).closest('tr').remove();
            rowCount--;
            updateRowNumbers();
        });

        // Update row numbers after a row is removed
        function updateRowNumbers() {
            $('#expected-business-table tbody tr').each(function (index) {
                $(this).find('td:first').text(index + 1);
            });
        }
    });
</script>

@endsection