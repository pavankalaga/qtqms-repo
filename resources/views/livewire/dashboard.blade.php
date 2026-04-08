<title>Dashboard</title>

<div class="search-container">
    <input type="text" id="voice-search" 
        wire:model.debounce.300ms="searchFeeds" 
        wire:change="searchFeedMessage"
        class="search-input"
        placeholder="Search Feeds..." />

    <input type="text" id="item-search" 
        wire:model.debounce.300ms="searchItems" 
        wire:change="searchItemMessage"
        class="search-input"
        placeholder="Search Items..." />
</div>

<div x-data="{ search: '' }" class="tabs">
    <!-- Tab content -->
    <div class="tabs-content">
        <!-- Details Tab -->
        <div class="tab-content" id="details">
            <div class="m-2">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Item Name</th>
                                <th scope="col">Item Code</th>
                                <th scope="col">Generic Item Name</th>
                                <th scope="col">Item Category</th>
                                <th scope="col">Department</th>
                                <th scope="col">Machine</th>
                                <th scope="col">Test Code</th>
                                <th scope="col">Test Name</th>
                                <th scope="col">Supplier Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Manufacture</th>
                                <th scope="col">HSN Code</th>
                                <th scope="col">Unit of Purchase</th>
                                <th scope="col">Pack Size</th>
                                <th scope="col">Test</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">CGST</th>
                                <th scope="col">SGST</th>
                                <th scope="col">Price (GST)</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reports as $report)
                            <tr>
                                <td>{{ $report->item_name }}</td>
                                <td>{{ $report->item_code }}</td>
                                <td>{{ $report->generic_item_name }}</td>
                                <td>{{ $report->item_category }}</td>
                                <td>{{ $report->department }}</td>
                                <td>{{ $report->machine }}</td>
                                <td>{{ $report->test_code }}</td>
                                <td>{{ $report->test_name }}</td>
                                <td>{{ $report->supplier_name }}</td>
                                <td>{{ $report->address }}</td>
                                <td>{{ $report->manufacture }}</td>
                                <td>{{ $report->hsn_code }}</td>
                                <td>{{ $report->unit_of_purchase }}</td>
                                <td>{{ $report->pack_size }}</td>
                                <td>{{ $report->test }}</td>
                                <td>{{ $report->unit_price }}</td>
                                <td>{{ $report->cgst }}</td>
                                <td>{{ $report->sgst }}</td>
                                <td>{{ $report->price_gst }}</td>
                                <td>
                                    <a href="{{ route('reports.edit', $report->id) }}">Edit</a>
                                    <span wire:click="confirmDelete('{{ $report->id }}')">Delete</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Delete Confirmation Modal -->
                @if($confirmingDelete)
                    <div class="alert alert-warning">
                        <p>Are you sure you want to delete this report?</p>
                        <button wire:click="delete" class="btn btn-danger">Yes, Delete</button>
                        <button wire:click="$set('confirmingDelete', false)" class="btn btn-secondary">Cancel</button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Styles for responsive table and search bars -->
<style>
    .search-container {
        display: flex;
        gap: 10px; /* Space between the search inputs */
        margin-bottom: 16px; /* Space below the search inputs */
    }

    .search-input {
        flex: 1; /* Allow inputs to grow equally */
        padding: 10px; /* Padding inside input */
        border: 1px solid #ccc; /* Border color */
        border-radius: 4px; /* Rounded corners */
        font-size: 14px; /* Font size */
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
    }

    .search-input:focus {
        border-color: #007BFF; /* Focus border color */
        outline: none; /* Remove default outline */
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Shadow on focus */
    }

    .table-responsive {
        max-height: 400px;
        overflow-y: auto;
    }
    .table .thead-dark th {
    background-color: #1F2937;
    color: #ffffff;
}
</style>
