@extends('layouts.base')
@section('content')


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Contact</title>
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
            width: fit-content;
            padding: 0 0.2rem;
            font-weight: 600;
            color: white;
            border-radius: 0.5rem;
            font-size: 14px;
            background-color: red;
        }

        .type-of-lead-moderate {
            width: fit-content;
            padding: 0 0.2rem;
            color: white;
            font-weight: 600;
            font-size: 14px;
            border-radius: 0.5rem;
            background-color: #e5e500;
        }

        .type-of-lead-cold {
            width: fit-content;
            padding: 0 0.2rem;
            font-weight: 600;
            color: white;
            font-size: 14px;
            border-radius: 0.5rem;
            background-color: #6165df;
        }

        .profile-pic img {
            width: 2rem;
            border-radius: 50%;
        }
    </style>
</head>

<div style="padding-right: 3.45rem;" class="dash-container p-30">

    <!-- Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Profile</th>
                <th class="business-name">Contact Name</th>
                <th class="business-name">Business Name</th>
                <th>Department</th>
                <th>Designation</th>
                <th>Phone</th>
                <th>Authority</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="profile-pic">
                        <label for="upload">
                            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="Profile Picture" id="profilePreview">
                        </label>
                    </div>
                </td>
                <td>Business1</td>
                <td class="location"> Busines</td>
                <td>1111</td>
                <td>HYD</td>
                <td>
                    112233
                </td>
                <td>Decision Maker</td>
            </tr>
            <tr>
                <td>
                    <div class="profile-pic">
                        <label for="upload">
                            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="Profile Picture" id="profilePreview">
                        </label>
                    </div>
                </td>
                <td>Business1</td>
                <td class="location"> Busines</td>
                <td>1111</td>
                <td>HYD</td>
                <td>
                    112233
                </td>
                <td>Influencer</td>
            </tr>
            <tr>
                <td>
                    <div class="profile-pic">
                        <label for="upload">
                            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="Profile Picture" id="profilePreview">
                        </label>
                    </div>
                </td>
                <td>Business1</td>
                <td class="location"> Busines</td>
                <td>1111</td>
                <td>HYD</td>
                <td>
                    112233
                </td>
                <td>Supporter</td>
            </tr>
            <tr>
                <td>
                    <div class="profile-pic">
                        <label for="upload">
                            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="Profile Picture" id="profilePreview">
                        </label>
                    </div>
                </td>
                <td>Business1</td>
                <td class="location"> Busines</td>
                <td>1111</td>
                <td>HYD</td>
                <td>
                    112233
                </td>
                <td>Neutral</td>
            </tr>
            <tr>
                <td>
                    <div class="profile-pic">
                        <label for="upload">
                            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="Profile Picture" id="profilePreview">
                        </label>
                    </div>
                </td>
                <td>Business1</td>
                <td class="location"> Busines</td>
                <td>1111</td>
                <td>HYD</td>
                <td>
                    112233
                </td>
                <td>Blocker</td>
            </tr>
            <tr>
                <td>
                    <div class="profile-pic">
                        <label for="upload">
                            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="Profile Picture" id="profilePreview">
                        </label>
                    </div>
                </td>
                <td>Business1</td>
                <td class="location"> Busines</td>
                <td>1111</td>
                <td>HYD</td>
                <td>
                    112233
                </td>
                <td>No Role</td>
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