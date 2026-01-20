@extends('layouts.base')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Folder View</title>
</head>
<style>
    .stock-planner-table {
        width: 100% !important;
        border-collapse: collapse !important;
        margin-top: 20px !important;
    }

    .stock-planner-table th,
    .stock-planner-table td {
        padding: 10px !important;
        text-align: left !important;
        max-width: 3rem;
    }

    .stock-planner-table th {
        font-size: 12px;
        background-color: #5e0000 !important;
        color: white !important;
    }



    .stock-planner-table tbody tr:hover {
        color: #5e0000;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out;
    }

    .stock-planner-table tbody a {
        color: inherit !important;
        text-decoration: none;

    }

    .stock-planner-table tbody a:hover {
        text-decoration: underline;
    }


    .stock-planner-table tbody tr:hover>td a {
        color: #5e0000 !important;

    }

    .stock-planner-table td {
        font-size: 12px;
        border-bottom: 1px solid #adbfc8;
        transition: all 0.3s ease;
    }

    .stock-planner-table tbody tr:hover>td {
        font-weight: 600;
        font-size: 14px;
        transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out;
    }

    .search-style {
        width: 200px;
        font-size: medium;
        height: 40px;
        border-radius: 8px;
        padding: 8px;
    }

    .create-pop-blur-bg {
        position: fixed;
        background: #80808078;
        width: 100vw;
        top: 0;
        height: 100vh;
        left: 0;
        z-index: 10000;
    }

    .create-pop {
        height: 90%;
        display: flex;
        background: white;
        position: fixed;
        flex-direction: column;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border-radius: 20px;
        overflow: auto;
    }

    .form-container {
        background: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        width: 600px;

    }

    .form-container h1 {
        text-align: center;
        margin-bottom: 20px;
        font-size: 24px;
        color: #333;
        letter-spacing: 1px;
    }

    .form-container label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #555;
    }

    .form-container input,
    .form-container textarea,
    .form-container select {
        width: 100%;
        padding: 12px 15px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
        transition: border-color 0.3s ease;
    }

    .form-container input:focus,
    .form-container select:focus,
    .form-container textarea:focus {
        border-color: #4facfe;
        outline: none;
    }

    .form-container textarea {
        resize: none;
    }

    .form-container button {
        width: 100%;
        padding: 12px;
        background: linear-gradient(135deg, #4facfe, #00f2fe);
        border: none;
        border-radius: 5px;
        color: #ffffff;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .form-container button:hover {
        background: linear-gradient(135deg, #00f2fe, #4facfe);
    }

    .form-container .footer-text {
        text-align: center;
        margin-top: 10px;
        font-size: 14px;
        color: #666;
    }

    .form-container .footer-text a {
        color: #4facfe;
        text-decoration: none;
    }

    .form-container .footer-text a:hover {
        text-decoration: underline;
    }
</style>

<body>
    <div class="main">
        <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
            <div style="font-size: 20px;">Document </div>
            <div>
                <input class="search-style" placeholder="Search" />
                <button class="btn btn-warning" onclick="createDoc()">Add New Doc. </button>
            </div>
        </div>

        <div class="slb_leaderboard">

            <div class="table-responsive" style="overflow-x: auto; max-width: 100%;">
                <table class="stock-planner-table">
                    <thead>

                        <tr>
                            <th style="border-top-left-radius: 8px;">Document No.</th>
                            <th style="min-width: 5rem;">Document Name</th>
                            <th>Version No.</th>
                            <th>Upload Date</th>
                            <th>Upload By</th>
                            <th>Retention Period</th>
                            <th style="border-top-right-radius: 8px;">Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example Row 1 -->
                        <tr>
                            <td>12</td>
                            <td><a href="{{route('document.view','12')}}">Document</a></td>
                            <td>1.15</td>
                            <td>28-12-2024</td>
                            <td>Hemanth</td>
                            <td>2 years</td>
                            <td>Approved</td>
                        </tr>

                    </tbody>


                </table>


                <table class="stock-planner-table">
                    <thead>

                        <tr>
                            <th style="border-top-left-radius: 8px;">Document No.</th>
                            <th style="min-width: 5rem;">Document Name</th>
                            <th>Version No.</th>
                            <th>Upload Date</th>
                            <th>Upload By</th>
                            <th>Retention Period</th>
                            <th style="border-top-right-radius: 8px;">Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example Row 1 -->
                        <tr>
                            <td>12</td>
                            <td><a href="{{route('document.view','12')}}">Document</a></td>
                            <td>1.15</td>
                            <td>28-12-2024</td>
                            <td>Hemanth</td>
                            <td>2 years</td>
                            <td>Approved</td>
                        </tr>

                    </tbody>


                </table>

                <table class="stock-planner-table">
                    <thead>

                        <tr>
                            <th style="border-top-left-radius: 8px;">Document No.</th>
                            <th style="min-width: 5rem;">Document Name</th>
                            <th>Version No.</th>
                            <th>Upload Date</th>
                            <th>Upload By</th>
                            <th>Retention Period</th>
                            <th style="border-top-right-radius: 8px;">Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example Row 1 -->
                        <tr>
                            <td>12</td>
                            <td><a href="{{route('document.view','12')}}">Document</a></td>
                            <td>1.15</td>
                            <td>28-12-2024</td>
                            <td>Hemanth</td>
                            <td>2 years</td>
                            <td>Approved</td>
                        </tr>

                    </tbody>


                </table>
            </div>
        </div>

        <div class="create-pop-blur-bg" id="createPop" style="display: none;">
            <div class="create-pop ">
                <div class="form-container">
                    <h1>New Document</h1>
                    <form action="/submit" method="post" enctype="multipart/form-data">
                        <label for="name">Document Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter your name" required>

                        <label for="document-no">Document No.</label>
                        <input type="text" name="document_no" id="document-no" placeholder="Enter your Document No." required>

                        <label for="version-no">Version No.</label>
                        <input type="text" name="document_no" id="version-no" placeholder="Enter your Version No." required>

                        <label for="status">Status</label>
                        <select name="status" id="status">
                            <option value="">Select Status</option>
                            <option value="Draft">Draft</option>
                            <option value="Approved">Approved</option>
                        </select>
                        <!-- <input type="text" name="document_no" id="status" placeholder="Enter your Document No." required> -->

                        <label for="upload-date">Upload Date</label>
                        <input type="date" name="upload_date" id="upload-date" required>

                        <label for="retention-period">Retention Period</label>
                        <input type="date" name="retention_period" id="retention-period" required>

                        <label for="tags">Tags</label>
                        <input type="text" name="tags" id="tags" placeholder="Enter tags" required>

                        <label for="upload-doc">Upload Document</label>
                        <input type="file" name="upload_doc" id="upload-doc" accept=".pdf,.doc,.docx,.txt,.jpg,.png" required>

                        <label for="description">Description</label>
                        <textarea id="description" name="description" rows="5" placeholder="Write your description here..."></textarea>

                        <button type="submit">Submit</button>
                    </form>

                    <!-- <div class="footer-text">
                        Need help? <a href="#">Contact Support</a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    document.getElementById("createPop").addEventListener("click", function(event) {
        // Check if the clicked element is the background (not the popup itself)
        if (event.target === this) {
            this.style.display = "none"; // Hide the pop-up
        }
    });

    function createDoc() {
        document.getElementById('createPop').style.display = "block"
    }
</script>

</html>


@endsection