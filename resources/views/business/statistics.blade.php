@extends('layouts.base')
@section('content')

<section class="dash-container">
    <div class="dash-content">

        <div class="row">
            <div class="col-12 mb-3">
                <div class="row">
                    <div class="col-3">
                        <div class="card sticky-top" style="top:30px">
                            <div class="list-group list-group-flush" id="useradd-sidenav">
                                <a class="list-group-item list-group-item-action border-0" href="#tasks">Business Info
                                    <div class="float-end"><i class="fa-solid fa-chevron-right"></i></div>
                                </a>
                                <a class="list-group-item list-group-item-action border-0"
                                    href="#users-products">Contact Details
                                    <div class="float-end"><i class="fa-solid fa-chevron-right"></i></div>
                                </a>
                                <a class="list-group-item list-group-item-action border-0"
                                    href="#sources-emails">Business Intelligence
                                    <div class="float-end"><i class="fa-solid fa-chevron-right"></i></div>
                                </a>
                                <a class="list-group-item list-group-item-action border-0"
                                    href="#discussion-notes">Remarks
                                    <div class="float-end"><i class="fa-solid fa-chevron-right"></i></div>
                                </a>
                                <a class="list-group-item list-group-item-action border-0" href="#sales_funnel">Sales
                                    Funnel
                                    <div class="float-end"><i class="fa-solid fa-chevron-right"></i></div>
                                </a>
                                <a class="list-group-item list-group-item-action border-0" href="#calllog">Call Logs
                                    <div class="float-end"><i class="fa-solid fa-chevron-right"></i></div>
                                </a>
                                <a class="list-group-item list-group-item-action border-0" href="#statistics">Business
                                    Statistics
                                    <div class="float-end"><i class="fa-solid fa-chevron-right"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-9">


                        <div id="statistics">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card table-card deal-card view-business-statistic">
                                        <div id="Uni7" class="tabcontent">
                                            

                                            <div class="card-row business-statistics">
                                                <div class="card-table">
                                                    <h1 class="ga-actual-head">Expected Business </h1>
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Test</th>
                                                                <th scope="col">Qty/Day</th>
                                                                <th scope="col">L2L Price</th>
                                                                <th scope="col">Amount</th>
                                                                <th scope="col">Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($expectedBusinesses as $ex)
                                                                <tr>
                                                                    <td data-label="Test">{{ $ex->test_name }}</td>
                                                                    <td data-label="Qty/Day">{{ $ex->expected_qty_day }}
                                                                    </td>
                                                                    <td data-label="L2L Price">{{ $ex->expected_l2l_price }}
                                                                    </td>
                                                                    <td data-label="Amount">{{ $ex->amount }}</td>
                                                                    <td data-label="Total">{{ $ex->total }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="card-row business-statistics">
                                                <div class="card-table">
                                                    <h1 class="ga-actual-head">Agreed Business </h1>
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Test</th>
                                                                <th scope="col">Qty/Day</th>
                                                                <th scope="col">L2L Price</th>
                                                                <th scope="col">Amount</th>
                                                                <th scope="col">Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($agreedBusinesses as $ex)
                                                                <tr>
                                                                    <td data-label="Test">{{ $ex->test_name }}</td>
                                                                    <td data-label="Qty/Day">{{ $ex->expected_qty_day }}
                                                                    </td>
                                                                    <td data-label="L2L Price">{{ $ex->expected_l2l_price }}
                                                                    </td>
                                                                    <td data-label="Amount">{{ $ex->amount }}</td>
                                                                    <td data-label="Total">{{ $ex->total }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="card-row business-statistics">
                                                <div class="card-table">
                                                    <h1 class="ga-actual-head">Actual Business </h1>
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Account</th>
                                                                <th scope="col">Due Date</th>
                                                                <th scope="col">Amount</th>
                                                                <th scope="col">Period</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td data-label="Account">Visa - 3412</td>
                                                                <td data-label="Due Date">04/01/2016</td>
                                                                <td data-label="Amount">$1,190</td>
                                                                <td data-label="Period">03/01/2016 - 03/31/2016</td>
                                                            </tr>
                                                            <tr>
                                                                <td scope="row" data-label="Account">Visa - 6076</td>
                                                                <td data-label="Due Date">03/01/2016</td>
                                                                <td data-label="Amount">$2,443</td>
                                                                <td data-label="Period">02/01/2016 - 02/29/2016</td>
                                                            </tr>
                                                            <tr>
                                                                <td scope="row" data-label="Account">Corporate AMEX</td>
                                                                <td data-label="Due Date">03/01/2016</td>
                                                                <td data-label="Amount">$1,181</td>
                                                                <td data-label="Period">02/01/2016 - 02/29/2016</td>
                                                            </tr>
                                                            <tr>
                                                                <td scope="row" data-label="Acount">Visa - 3412</td>
                                                                <td data-label="Due Date">02/01/2016</td>
                                                                <td data-label="Amount">$842</td>
                                                                <td data-label="Period">01/01/2016 - 01/31/2016</td>
                                                            </tr>
                                                        </tbody>
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
        </div>

    </div>

    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add Contact Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('savecalllog')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="check_in" class="col-form-label">Check In</label>
                            <input type="datetime-local" class="form-control small-placeholder" id="check_in"
                                name="check_in" required>
                            @error('check_in') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="check_out" class="col-form-label">Check Out</label>
                            <input type="datetime-local" class="form-control small-placeholder" id="check_out"
                                name="check_out" required>
                            @error('check_out') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="follow_up_start" class="col-form-label">Follow Up Start Date</label>
                            <input type="datetime-local" class="form-control small-placeholder" id="follow_up_start"
                                name="follow_up_start" required>
                            @error('follow_up_start') <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="call_log_remarks" class="col-form-label">Remarks</label>
                            <input type="text" class="form-control small-placeholder" id="call_log_remarks"
                                name="call_log_remarks" required>
                            @error('call_log_remarks') <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end mt-4">
                        <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded mr-2"
                            @click="openModal = false">Close</button>
                        <button type="submit" class="text-white px-4 py-2 rounded"
                            style="background-color: #0c9207;">Save</button>
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
            ajax: '{{ route('business.data') }}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'business_name', name: 'business_name' },
                { data: 'email', name: 'email' },
                { data: 'phone', name: 'phone' },
                { data: 'headquarters', name: 'headquarters', orderable: false, searchable: false },
                { data: 'state', name: 'state' },
                { data: 'status', name: 'status', orderable: false, searchable: false },
                { data: 'assign', name: 'assign' },
                { data: 'change_status', name: 'change_status', orderable: false, searchable: false },
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