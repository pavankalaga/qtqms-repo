@extends('layouts.base')
@section('content')


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Leads</title>
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
            width: 5rem;
        }

        .location {
            max-width: 4rem;
        }

        .type-of-lead-hot {
            width: 3.5rem;
            text-align: center;
            padding: 0 0.2rem;
            font-weight: 600;
            font-size: 14px;
            color: white;
            border-radius: 0.5rem;
            background-color: red;
        }

        .type-of-lead-moderate {
            width: 3.5rem;
            text-align: center;
            padding: 0 0.2rem;
            color: white;
            font-weight: 600;
            border-radius: 0.5rem;
            font-size: 14px;
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
                    max-width: 0rem;
                ">Type Of Lead</th>
                <th title="Assign User">Assign Owner</th>
                <!-- <th title="Action" width="60">Action</th> -->
            </tr>
        </thead>
       <tbody>
            @foreach($records as $index => $record)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td><a href="{{route('lead.edit',$record->id)}}">  {{ $record->business_name ?? 'N/A' }} </a></td>
                <td class="location">{{ $record->location ?? 'N/A' }}</td>
                <td style="min-width: 6rem;">{{ $record->state ?? 'N/A' }}</td>
                <td style="min-width: 6rem;">{{ $record->phone ?? 'N/A' }}</td>
                <td>
                    <span class="badge bg-info text-dark">
                        {{ ucfirst($record->lead_type ?? 'Unknown') }}
                    </span>
                </td>
                <td>{{ $record->assign_owner ?? 'N/A' }}</td>
            </tr>
            @endforeach
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

        {{ $records->links('vendor.pagination.bootstrap-4') }}
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