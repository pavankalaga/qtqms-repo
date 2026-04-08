@extends('layouts.base')
@section('content')
<section class="dash-container tab-content">
    <div class="dash-content mt-4">
        <!-- Section Wrapper -->
        <section id="quotes-section" style="margin-right:30px;">
            <h3 class="title text-center mb-4">Quotes Table</h3>

            <!-- Table -->
           <!-- Table -->
<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Quote No.</th>
                <th>Quote Date</th>
                <th>Details</th>
                <th>Status</th>
                <th>Change in Status Date</th>
                <th>Action By</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Q12345</td>
                <td>2024-11-20</td>
                <td>Details about Quote 1</td>
                <td class="status-pending">Pending</td>
                <td>2024-11-22</td>
                <td>Admin</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Q12346</td>
                <td>2024-11-21</td>
                <td>Details about Quote 2</td>
                <td class="status-approved">Approved</td>
                <td>2024-11-23</td>
                <td>Manager</td>
            </tr>
        </tbody>
    </table>
</div>


            <!-- Open Button -->
            <div class="text-center mt-4">
                <button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight">
                    Open Details
                </button>
            </div>
        </section>
    </div>
</section>

<!-- Offcanvas Popup -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">Action Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form>
     
    <style>
        
        .section-title {
            background-color: #343a40;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: center;
        }
        .form-section {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .action-buttons {
            margin-top: 20px;
            text-align: center;
        }
        .form-group-row {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        .form-group-row .form-group {
            flex: 1;
            min-width: 200px;
        }
        .offcanvas {
        width: 70% !important;
    visibility: visible;
    margin-right: 45px;
    }
    </style>


    <div class="container my-4">
        <!-- Page Title -->
        <h2 class="text-center mb-4">Create a Quotation</h2>

        <!-- Quotation Section -->
        <div id="quotation-section">
            <div class="quotation">
                <div class="form-section">
                    <div class="section-title">Quotation Details</div>
                    <div class="form-group-row">
                        <div class="form-group">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" required>
                        </div>
                        <div class="form-group">
                            <label for="no" class="form-label">No</label>
                            <input type="text" class="form-control" id="no" required>
                        </div>
                        <div class="form-group">
                            <label for="file" class="form-label">Attach File</label>
                            <input type="file" class="form-control" id="file">
                        </div>
                        <div class="form-group">
                            <label for="raisedBy" class="form-label">Raised By</label>
                            <input type="text" class="form-control" id="raisedBy" required>
                        </div>
                        <div class="form-group">
                            <label for="priority" class="form-label">Priority</label>
                            <select id="priority" class="form-select" required>
                                <option value="High">High</option>
                                <option value="Medium">Medium</option>
                                <option value="Low">Low</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="validUntil" class="form-label">Valid Until</label>
                            <input type="date" class="form-control" id="validUntil" required>
                        </div>
                        <div class="form-group">
                            <label for="customerEmail" class="form-label">Customer Email</label>
                            <input type="email" class="form-control" id="customerEmail" required>
                        </div>
                        <div class="form-group">
                            <label for="customerWhatsapp" class="form-label">Customer WhatsApp Number</label>
                            <input type="tel" class="form-control" id="customerWhatsapp" required>
                        </div>
                    </div>
                    <p class="text-muted mt-3">This is set by the manager.</p>
                </div>

                <!-- Test Details -->
                <div class="form-section">
                    <div class="section-title">Test Details</div>
                    <div class="form-group-row">
                        <div class="form-group">
                            <label for="testCode" class="form-label">Test Code</label>
                            <select id="testCode" class="form-select">
                                <option value="Code1">Code1</option>
                                <option value="Code2">Code2</option>
                                <option value="Code3">Code3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="testName" class="form-label">Test Name</label>
                            <input type="text" class="form-control" id="testName" required>
                        </div>
                        <div class="form-group">
                            <label for="methodology" class="form-label">Methodology</label>
                            <input type="text" class="form-control" id="methodology" required>
                        </div>
                        <div class="form-group">
                            <label for="testsPerDay" class="form-label">Tests Per Day</label>
                            <input type="number" class="form-control" id="testsPerDay" required>
                        </div>
                        <div class="form-group">
                            <label for="l2lTestedPrice" class="form-label">L2L Tested Price</label>
                            <input type="number" class="form-control" id="l2lTestedPrice" required>
                        </div>
                        <div class="form-group">
                            <label for="requestedL2lPrice" class="form-label">Requested L2L Price</label>
                            <input type="number" class="form-control" id="requestedL2lPrice" required>
                        </div>
                        <div class="form-group">
                            <label for="approvedL2lPrice" class="form-label">Approved L2L Price</label>
                            <input type="number" class="form-control" id="approvedL2lPrice" required>
                        </div>
                        <div class="form-group">
                            <label for="approvalTests" class="form-label">Approved Tests</label>
                            <input type="number" class="form-control" id="approvalTests" required>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="approvalConditions" class="form-label">Approval Conditions</label>
                        <textarea id="approvalConditions" class="form-control" rows="3"></textarea>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="action-buttons">
                    <button class="btn btn-primary mx-2">Escalate</button>
                    <button class="btn btn-success mx-2">Approve</button>
                    <button class="btn btn-danger mx-2">Deny</button>
                    <button class="btn btn-warning mx-2">More Information</button>
                </div>
            </div>
        </div>

        <!-- Footer Button -->
        <div class="text-center">
            <button id="add-section" class="btn btn-info mt-4">Add Section</button>
        </div>
    </div>

    <!-- JavaScript to Clone Sections -->
    <script>
        document.getElementById('add-section').addEventListener('click', function () {
            // Clone the quotation section
            const quotationSection = document.querySelector('.quotation');
            const clonedSection = quotationSection.cloneNode(true);
            document.getElementById('quotation-section').appendChild(clonedSection);
        });
    </script>
        </form>
    </div>
</div>

<!-- Custom Styles -->
<style>
    .offcanvas {
        width: 75%;
    visibility: visible;
    margin-right: 45px;
    }

    .offcanvas-header {
        background-color: #343a40;
        color: #fff;
    }

    .offcanvas-body {
        max-height: 90vh;
        overflow-y: auto;
    }

    .form-label {
        font-weight: bold;
    }
</style>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

@endsection