@extends('layouts.base')
@section('content')
<!-- Main Container -->
<div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 my-activity-title mb-4">
    <div style="font-size: 20px;">My Tickets</div>


    <div class="dropdown activity-buttons">
        <button type="button" class="btn btn-warning me-2" onclick="openPopupp('Raise Ticket')">
            Create
        </button>
    </div>

</div>
<div class="dash-container   mt-2 p-10" style=" padding-right: 3.35rem; padding-left: 2rem;">

    <div class="row mb-4 filters">
        <div class="col-md-2">
            <!-- <label for="account-code" class="form-label">Account Code</label> -->
            <input type="text" id="employee-name" class="form-control" placeholder="Employee Name">
        </div>
        <div class="col-md-2">
            <!-- <label for="account-code" class="form-label">Account Code</label> -->
            <input type="text" id="account-code" class="form-control" placeholder="Account Code">
        </div>
        <div class="col-md-2">
            <!-- <label for="account-name" class="form-label">Account Name</label> -->
            <input type="text" id="account-name" class="form-control" placeholder="Account Name">
        </div>
        <div class="col-md-2">
            <!-- <label for="from" class="form-label">From</label> -->
            <input type="text" onfocus="(this.type='date')" placeholder="From" id="from" class="form-control">
        </div>
        <div class="col-md-2">
            <!-- <label for="to" class="form-label">To</label> -->
            <input type="text" onfocus="(this.type='date')" id="to" placeholder="To" class="form-control">
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered ">
            <thead class="table-dark">
                <tr>
                    <th>S.No</th>
                    <th>Status</th>
                    <th>Accont Name</th>
                    <th>Ticket No.</th>
                    <th>Raise Date</th>
                    <th>Department</th>
                    <th>Subject</th>
                    <th>Category</th>
                    <th>Close Date</th>
                    <th>Resolved Time in hr</th>
                </tr>
            </thead>
            <tbody id="messagesTableBody">
                <!-- Dummy data rows -->
                <tr>
                    <td>1</td>
                    <td>
                        <div style=" display: flex; align-items: center;">
                            <div style="width: 10px; height: 10px; background-color: red; border-radius: 50%; margin-right: 10px;"></div>
                            <span>Open</span>
                        </div>
                    </td>
                    <td style="min-width: 13rem;">Name 1</td>
                    <td>1144</td>
                    <td>2024-11-28 14:02</td>
                    <td>Hr</td>
                    <td>Test</td>
                    <td>Test</td>
                    <td>--</td>
                    <td>--</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>
                        <div style=" display: flex; align-items: center;">
                            <div style="width: 10px; height: 10px; background-color: #ffca2c; border-radius: 50%; margin-right: 10px;"></div>
                            <span>Pending</span>
                        </div>
                    </td>
                    <td>Name 2</td>
                    <td>1144</td>
                    <td>2024-11-28 14:02</td>
                    <td>Hr</td>
                    <td>Test</td>
                    <td>Test</td>
                    <td>--</td>
                    <td>--</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>
                        <div style=" display: flex; align-items: center;">
                            <div style="width: 10px; height: 10px; background-color: green; border-radius: 50%; margin-right: 10px;"></div>
                            <span>Resolved</span>
                        </div>

                    </td>
                    <td>Name 3</td>
                    <td>1144</td>
                    <td>2024-11-28 14:02</td>
                    <td>Hr</td>
                    <td>Test</td>
                    <td>Test</td>
                    <td>2024-11-28 16:48</td>
                    <td>1.4</td>
                </tr>
            </tbody>
        </table>

    </div>
</div>

<!-- Offcanvas (Popup) -->
<!-- <div class="offcanvas offcanvas-end" style="width: 50%;" tabindex="-1" id="createMessageOffcanvas" aria-labelledby="createMessageOffcanvasLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="createMessageOffcanvasLabel">Create Message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        Create Message Form
        <form id="messageForm">
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="sentBy" class="form-label">Sent By</label>
                <input type="text" class="form-control" id="sentBy" required>
            </div>
            <div class="mb-3">
                <label for="sentDate" class="form-label">Sent Date</label>
                <input type="date" class="form-control" id="sentDate" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" required>
                    <option value="Pending">Pending</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="viewedDate" class="form-label">Viewed Date</label>
                <input type="date" class="form-control" id="viewedDate">
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-success btn1">Submit</button>
            </div>
        </form>
    </div>
</div> -->

<div id="close" class="closeBtn" onclick="closePopupp()">
    X
</div>
<div id="popup" class="popup">
    <div style="position: relative; height:95%">
        <div class="mb-4 my-activity-title" style="margin-top: 0.6rem;">
            <lable id='popup-title' style="font-size: 20px;"> </lable>
        </div>
        <div class="support-query-form-container">
            <!-- <h2>Raise a Support Ticket</h2> -->
            <div class="row mb-4">
                <div class="col-md-2">
                    <label for="account-code" class="form-label">Account No</label>
                    <input type="text" id="account-code" class="form-control" placeholder="Account No">
                </div>
                <div class="col-md-4">
                    <label for="account-name" class="form-label">Account Name</label>
                    <input type="text" id="account-name" class="form-control" placeholder="Account Name">
                </div>
            </div>
            <form>
                <div class="support-query-form-group">
                    <label for="group">Group:</label>
                    <select id="group" name="group">
                        <option value="CSD">CSD</option>
                    </select>
                </div>

                <div class="support-query-form-group">
                    <label for="category">Category:</label>
                    <select id="category" name="category">
                        <option value="Change in Reference Ranges">Change in Reference Ranges</option>
                    </select>
                </div>

                <div class="support-query-form-group">
                    <label for="subcategory">Sub Category:</label>
                    <select id="subcategory" name="subcategory">
                        <option value="Change in Reference Ranges">Change in Reference Ranges</option>
                    </select>
                </div>

                <div class="support-query-form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" id="subject" name="subject" value="Change in Reference Ranges" placeholder="Enter subject...">
                </div>

                <div class="support-query-form-group">
                    <label for="detail">Detail:</label>
                    <textarea id="detail" name="detail" placeholder="Enter details..."></textarea>
                </div>

                <div class="support-query-form-group">
                    <label for="sin">SIN No.:</label>
                    <input type="text" id="sin" name="sin" placeholder="Enter SIN No.">
                </div>

                <div class="support-query-form-group">
                    <label for="department">Department:</label>
                    <select id="department" name="department">
                        <option value="">-- Select --</option>
                    </select>
                </div>

                <div class="support-query-form-group">
                    <label for="test-name">Test Name:</label>
                    <select id="test-name" name="test-name">
                        <option value="">-- Select Option --</option>
                    </select>
                </div>

                <!-- <div class="support-query-form-group">
              <label for="resolve-datetime">Resolve Date & Time:</label>
              <input type="datetime-local" id="resolve-datetime" name="resolve-datetime">
            </div> -->

                <div class="support-query-form-group">
                    <label for="attachment">Attachment:</label>
                    <input type="file" id="attachment" name="attachment">
                </div>

                <div class="support-query-form-buttons">
                    <button type="submit" class="support-query-save">Save</button>
                    <button type="button" class="support-query-cancel">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JavaScript -->
<script>
    function openPopupp(Name) {
        document.getElementById('popup').classList.add('open');
        document.getElementById('close').classList.add('opened');
        document.getElementById('popup-title').textContent = Name
        // const label1 = document.createElement('label');
        // label1.className = 'col-form-label col-md-6';
        // label1.textContent = Name;
    }

    function closePopupp() {
        document.getElementById('popup').classList.remove('open');
        document.getElementById('close').classList.remove('opened');

    }
    // const messageForm = document.getElementById('messageForm');
    // const messagesTableBody = document.getElementById('messagesTableBody');

    // // Handle form submission
    // messageForm.addEventListener('submit', (e) => {
    //     e.preventDefault();

    //     // Get form values
    //     const message = document.getElementById('message').value;
    //     const sentBy = document.getElementById('sentBy').value;
    //     const sentDate = document.getElementById('sentDate').value;
    //     const status = document.getElementById('status').value;
    //     const viewedDate = document.getElementById('viewedDate').value;

    //     // Add a new row to the table
    //     const newRow = `
    //             <tr>
    //                 <td>${message}</td>
    //                 <td>${sentBy}</td>
    //                 <td>${sentDate}</td>
    //                 <td>${status}</td>
    //                 <td>${viewedDate || 'N/A'}</td>
    //             </tr>
    //         `;
    //     messagesTableBody.innerHTML += newRow;

    //     // Reset the form
    //     messageForm.reset();

    //     // Close the offcanvas
    //     const offcanvas = bootstrap.Offcanvas.getInstance(document.getElementById('createMessageOffcanvas'));
    //     offcanvas.hide();
    // });
</script>
<style>
    input {
        border-color: #0CAF60;
        box-shadow: 0 0 0 0.2rem rgba(12, 175, 96, 0.25);
    }

    .btn1 {
        background-color: #010046 !important;
        color: white;
        border: 2px solid #0caf60;
    }

    .btn1:hover {
        color: #ffffff;
    }

    #createMessageOffcanvas {
        margin-top: 70px;
    }

    .my-activity-title {
        background: #010046;
        color: white;
        height: 56px;
        border-radius: 4px;
        font-size: 32px;
        align-items: center;
        display: flex;
        justify-content: space-between;
        padding: 1rem;
    }

    .activity-buttons {
        align-items: center;
        display: flex;
    }

    /* Form Container */
    .support-query-form-container {
        background-color: #f9f9f9;
        border-radius: 10px;
        /* padding: 20px; */
        /* max-width: 600px; */
        margin: auto;
        /* box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); */

    }

    /* Form Heading */
    .support-query-form-container h2 {
        text-align: center;
        font-size: 0.9rem;
        color: #333;
        margin-bottom: 20px;
        border-bottom: 2px solid #007bff;
        display: inline-block;
        padding-bottom: 5px;
    }

    /* Form Groups */
    .support-query-form-group {
        margin-bottom: 20px;
    }

    .support-query-form-group label {
        display: block;
        font-size: 0.9rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 8px;
    }

    .support-query-form-group select,
    .support-query-form-group input,
    .support-query-form-group textarea {
        width: 100%;
        padding: 10px;
        font-size: 0.9rem;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        transition: border-color 0.3s ease;
    }

    .support-query-form-group select:focus,
    .support-query-form-group input:focus,
    .support-query-form-group textarea:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0 0 4px rgba(0, 123, 255, 0.5);
    }

    /* Textarea Styling */
    .support-query-form-group textarea {
        height: 120px;
        resize: none;
    }

    /* File Upload Styling */
    input[type="file"] {
        padding: 5px;
        font-size: 0.9rem;
    }

    /* Buttons */
    .support-query-form-buttons {
        display: flex;
        justify-content: space-between;
        gap: 10px;
    }

    .support-query-form-buttons button {
        flex: 1;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        font-size: 0.9rem;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .support-query-form-buttons .support-query-save {
        background-color: #007bff;
        color: #fff;
    }

    .support-query-form-buttons .support-query-save:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
    }

    .support-query-form-buttons .support-query-cancel {
        background-color: #dc3545;
        color: #fff;
    }

    .support-query-form-buttons .support-query-cancel:hover {
        background-color: #c82333;
        transform: translateY(-2px);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .support-query-form-buttons {
            flex-direction: column;
        }

        .support-query-form-buttons button {
            width: 100%;
            margin-bottom: 10px;
        }
    }
</style>


@endsection