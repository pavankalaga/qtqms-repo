@extends('layouts.base')
@section('content')

<!-- <section class="dash-container">
    <div class="dash-content">

        <div class="row opportunity">
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
                            </div>
                        </div>
                    </div>

                    <div class="col-12">


                        <div id="sales_funnel" class="oppprtunity-card">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card table-card deal-card">
                                        <div class="card-header">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h5>Sales Funnel</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-bordered table-striped">
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
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Business1</td>
                                                    <td>Business@gmail.com</td>
                                                    <td>1111</td>
                                                    <td>HYD</td>
                                                    <td>Tel</td>
                                                    <td>--</td>
                                                    <td>--</td>
                                                    <td>--</td>
                                                </tr>

                                            </tbody>
                                        </table>

                                        <hr>
                                        <div class='bottom-section' class="mt-4">
                                            <div class="dropdown-container">
                                                <label for="entries-select" class="label">Show</label>
                                                <select id="entries-select" class="select" name="entries">
                                                    <option value="5">5</option>
                                                    <option value="10" selected>10</option>
                                                    <option value="20">20</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select>
                                                <span class="span">entries</span>
                                            </div>

                                            <ul id="pagination" class="pagination mb-0">
                                            </ul>

                                        </div>
                                        <hr>
                                    </div>
                                </div>

                            </div>

                         

                        </div>

                        <div id="calllog" class="oppprtunity-card">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card table-card deal-card">
                                        <div class="card-header">
                                            <d class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h5>Call Logs</h5>
                                                </div>

                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#myModal">
                                                    Add Call Log
                                                </button>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0 table-border-style bg-none"
                                        style="height:300px;overflow: auto;">
                                        <div>
                                            <div class="card-body pt-0 table-border-style bg-none">
                                                @foreach ($call_logs as $call_log)
                                                <div class="card card-1 opportunity-card-real">
                                                    <div class="date-info">
                                                        <span class="check-in">Check In : {{$call_log->check_in}}</span>
                                                        <span class="check-out">Check Out
                                                            :{{$call_log->check_out}}</span>
                                                    </div>
                                                    <div class="date-info">
                                                        <span class="get-in">Follow From date :
                                                            {{$call_log->follow_up_start}}</span>
                                                        <span class="get-in">Remarks :
                                                            {{$call_log->call_log_remarks}}</span>
                                                    </div>
                                                    <div class="date-info">
                                                    </div>
                                                </div>
                                                @endforeach
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

    <div class="modal fade opportunity-modal" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
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
</section> -->
<!-- <style>
        .pagination {
            display: flex;
            justify-content: center;
            list-style-type: none;
            padding: 0;
        }

        .pagination li {
            margin: 0 5px;
        }

        .pagination a {
            text-decoration: none;
            color: black !important;
            padding: 1px 11px;
            border: 1px solid #ddd;
            border-radius: 14px;
            transition: background-color 0.3s, color 0.3s;
        }

        .pagination a:hover {
            background-color: #010046;
            color: #fff !important;
        }

        .pagination .active a {
            background-color: #010046;
            color: #fff !important;
            border-color: #010046;
            pointer-events: none;
        }

        .pagination .disabled a {
            color: #ccc;
            pointer-events: none;
        }

        .label {
            font-size: 16px;
            margin-right: 10px;
        }

        .select {
            font-size: 16px;
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f9f9f9;
            transition: all 0.3s ease;
        }

        .select:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .span {
            font-size: 16px;
            margin-left: 10px;
        }

        .bottom-section {
            display: flex;
            align-items: center;
            justify-content: space-around;
            ;
        }

        .dropdown-container {
            margin-right: 1rem;
        }

        hr {
            margin: 0.5rem 0 !important;
        }



        th {
            width: 2.5rem;
        }

        td {
            background-color: white !important;
        }

        .business-name {
            width: 5rem;
        }

        .location {
            max-width: 4rem;
        }
    </style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script>
    function confirmDelete(id) {
        // Your delete confirmation logic here
    }
</script>
<script>
    $(document).ready(function() {
        let rowCount = 1;

        // Add Row
        $('#add-row').click(function() {
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
        $(document).on('click', '.remove-row', function() {
            $(this).closest('tr').remove();
            rowCount--;
            updateRowNumbers();
        });

        // Update row numbers after a row is removed
        function updateRowNumbers() {
            $('#expected-business-table tbody tr').each(function(index) {
                $(this).find('td:first').text(index + 1);
            });
        }
    });

    const totalPages = 10; // Number of pages
    const pagination = document.getElementById('pagination');

    function createPagination(totalPages) {
        // Create "Previous" button
        const prev = document.createElement('li');
        prev.className = 'disabled';
        prev.innerHTML = '<a href="#">&laquo;</a>';
        pagination.appendChild(prev);

        // Create page numbers
        for (let i = 1; i <= totalPages; i++) {
            const page = document.createElement('li');
            if (i === 1) page.className = 'active';
            page.innerHTML = `<a href="#">${i}</a>`;
            page.addEventListener('click', () => setActivePage(i));
            pagination.appendChild(page);
        }

        // Create "Next" button
        const next = document.createElement('li');
        next.innerHTML = '<a href="#">&raquo;</a>';
        pagination.appendChild(next);
    }

    function setActivePage(pageNumber) {
        // Remove active class from all pages
        const items = pagination.querySelectorAll('li');
        items.forEach(item => item.classList.remove('active'));

        // Add active class to the selected page
        items[pageNumber].classList.add('active');

        // Enable/disable "Previous" and "Next" buttons
        items[0].className = pageNumber === 1 ? 'disabled' : '';
        items[items.length - 1].className = pageNumber === totalPages ? 'disabled' : '';
    }

    // Initialize pagination
    createPagination(totalPages);

    document.getElementById('entries-select').addEventListener('change', function() {
        const selectedValue = this.value;
        console.log(`Selected number of entries: ${selectedValue}`);
        // Add logic here to update your table or list
    });
</script> -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Opportunity</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .pagination {
            display: flex;
            justify-content: center;
            list-style-type: none;
            padding: 0;
        }

        .pagination li {
            margin: 0 5px;
        }

        .pagination a {
            text-decoration: none;
            color: black !important;
            padding: 1px 11px;
            border: 1px solid #ddd;
            border-radius: 14px;
            transition: background-color 0.3s, color 0.3s;
        }

        .pagination a:hover {
            background-color: #010046;
            color: #fff !important;
        }

        .pagination .active a {
            background-color: #010046;
            color: #fff !important;
            border-color: #010046;
            pointer-events: none;
        }

        .pagination .disabled a {
            color: #ccc;
            pointer-events: none;
        }

        .label {
            font-size: 16px;
            margin-right: 10px;
        }

        .select {
            font-size: 16px;
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f9f9f9;
            transition: all 0.3s ease;
        }

        .select:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .span {
            font-size: 16px;
            margin-left: 10px;
        }

        .bottom-section {
            display: flex;
            align-items: center;
            justify-content: space-around;
            ;
        }

        .dropdown-container {
            margin-right: 1rem;
        }

        hr {
            margin: 0.5rem 0 !important;
        }




        th {
            width: 2.5rem;
        }

        td {
            background-color: white !important;
        }

        .business-name {
            min-width: 5rem;
        }

        .location {
            max-width: 4rem;
        }


        .type-of-lead-hot {
            width: 3.5rem;
            text-align: center;
            padding: 0 0.2rem;
            font-weight: 600;
            color: white;
            border-radius: 0.5rem;
            font-size: 14px;
            background-color: red;
        }

        .type-of-lead-moderate {
            width: 3.5rem;
            text-align: center;
            padding: 0 0.2rem;
            color: white;
            font-weight: 600;
            font-size: 14px;
            border-radius: 0.5rem;
            background-color: #e5e500;
        }

        .type-of-lead-cold {
            width: 3.5rem;
            text-align: center;
            padding: 0 0.2rem;
            font-weight: 600;
            color: white;
            font-size: 14px;
            border-radius: 0.5rem;
            background-color: #6165df;
        }
    </style>
</head>

<div style="padding-right: 3.45rem;" class="dash-container p-30">

    <!-- Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th title="Id">S.No</th>
                <th title="Business Name" class="business-name">Business Name</th>
                <th title="Head Quarters">Location</th>
                <th title="State">State</th>
                <th title="Phone">Phone</th>
                <th title="Assign User" style="
    max-width: 6rem;
">Type Of Opportunity</th>
                <th title="Assign User">Assign Owner</th>
                <!-- <th title="Action" width="60">Action</th> -->
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Business1</td>
                <td class="location"> Busines</td>
                <td style="
    min-width: 6rem;
">1111</td>
                <td style="
    min-width: 6rem;
">HYD</td>
                <td style="
    /* max-width: 0rem; */
">
                    <div class="type-of-lead-hot">Hot</div>
                </td>
                <td>Tel</td>

            </tr>
            <tr>
                <td>1</td>
                <td>Business1</td>
                <td class="location"> Hyd</td>
                <td>1111</td>
                <td>HYD</td>
                <td>
                    <div class="type-of-lead-moderate">Warm</div>
                </td>
                <td>Tel</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Business1</td>
                <td class="location"> Hyd</td>
                <td>1111</td>
                <td>HYD</td>
                <td>
                    <div class="type-of-lead-cold">Cold</div>
                </td>
                <td>Tel</td>
            </tr>

        </tbody>
    </table>

    <hr>
    <div class='bottom-section' class="mt-4">
        <div class="dropdown-container">
            <label for="entries-select" class="label">Show</label>
            <select id="entries-select" class="select" name="entries">
                <option value="5">5</option>
                <option value="10" selected>10</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            <span class="span">entries</span>
        </div>

        <ul id="pagination" class="pagination mb-0">
        </ul>

    </div>
    <hr>

</div>
<script>
    const totalPages = 10; // Number of pages
    const pagination = document.getElementById('pagination');

    function createPagination(totalPages) {
        // Create "Previous" button
        const prev = document.createElement('li');
        prev.className = 'disabled';
        prev.innerHTML = '<a href="#">&laquo;</a>';
        pagination.appendChild(prev);

        // Create page numbers
        for (let i = 1; i <= totalPages; i++) {
            const page = document.createElement('li');
            if (i === 1) page.className = 'active';
            page.innerHTML = `<a href="#">${i}</a>`;
            page.addEventListener('click', () => setActivePage(i));
            pagination.appendChild(page);
        }

        // Create "Next" button
        const next = document.createElement('li');
        next.innerHTML = '<a href="#">&raquo;</a>';
        pagination.appendChild(next);
    }

    function setActivePage(pageNumber) {
        // Remove active class from all pages
        const items = pagination.querySelectorAll('li');
        items.forEach(item => item.classList.remove('active'));

        // Add active class to the selected page
        items[pageNumber].classList.add('active');

        // Enable/disable "Previous" and "Next" buttons
        items[0].className = pageNumber === 1 ? 'disabled' : '';
        items[items.length - 1].className = pageNumber === totalPages ? 'disabled' : '';
    }

    // Initialize pagination
    createPagination(totalPages);

    document.getElementById('entries-select').addEventListener('change', function() {
        const selectedValue = this.value;
        console.log(`Selected number of entries: ${selectedValue}`);
        // Add logic here to update your table or list
    });
</script>
@endsection