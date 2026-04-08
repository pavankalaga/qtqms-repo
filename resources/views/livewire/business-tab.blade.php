<div>
  <div class="contain-tabs">
    <div class="tab bg-gray-200 p-3 rounded-lg mt-2">
      <a class="nav-link " id="v-pills-link1-tab" data-mdb-pill-init href="#businessinfo" role="tab" aria-controls="v-pills-link1" aria-selected="true">Business Info</a>
      <a class="nav-link" id="v-pills-link2-tab" data-mdb-pill-init href="#contactdetails" role="tab" aria-controls="v-pills-link2" aria-selected="false">Contact Details</a>
      <a class="nav-link" id="v-pills-link3-tab" data-mdb-pill-init href="#businessintelligence" role="tab" aria-controls="v-pills-link3" aria-selected="false">Business Intelligence
      </a>
      <a class="nav-link" id="v-pills-link4-tab" data-mdb-pill-init href="#remarks" role="tab" aria-controls="v-pills-link4" aria-selected="false">Remarks
      </a>
      <a class="nav-link" id="v-pills-link5-tab" data-mdb-pill-init href="{{route('sales_funnel')}}" role="tab" aria-controls="v-pills-link5" aria-selected="false">Sales Funnel</a>
      <a class="nav-link" id="v-pills-link6-tab" data-mdb-pill-init href="{{route('opportunity')}}" role="tab" aria-controls="v-pills-link6" aria-selected="false">Call Logs</a>
      <a class="nav-link active" id="v-pills-link6-tab" data-mdb-pill-init href="business" role="tab" aria-controls="v-pills-link6" aria-selected="false">Business Statistics</a>
    </div>

    <div id="Uni7" class="tabcontent">
      <h1>Business Statistics</h1>
      <div class="table-responsive mt-4">
        <table class="table table-striped">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Business Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Head Quarters</th>
              <th scope="col">State</th>
              <th scope="col">Status</th>
              <th scope="col">Assigned User</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @if ($reports && $reports->count() > 0)
              @foreach($reports->take(10) as $report) <!-- Limit to 10 entries -->
                <tr>
                  <td>{{ $report->business_name }}</td>
                  <td>{{ $report->email }}</td>
                  <td>{{ $report->phone }}</td>
                  <td>{{ $report->salesheadquarters?->name }}</td>
                  <td>{{ $report->state }}</td>
                  <td class="{{ $report->status === 'own' ? 'text-success' : 'text-danger' }}">
                    {{ $report->status }}
                  </td>
                  <td>{{ $report->user?->first_name }} {{ $report->user?->last_name }}</td>
                  <td>
                    <a href="{{ route('business_statistics', ['selectedId' => $report->id]) }}">View Business Details</a>
                  </td>
                </tr>
              @endforeach
            @else
              <tr>
                <td colspan="8" class="text-center">No Reports Found</td>
              </tr>
            @endif
          </tbody>
        </table>
        <div class="d-flex justify-content-center">
          {{ $reports->links() }} <!-- Pagination if $reports is paginated -->
        </div>
      </div>
      @if ($showDetails)
      <div id="View_Business_Details" class="tabcontent" style="padding: 20px;">
        <h1>Expected Business</h1>
        <table>
          <caption>Statement Summary</caption>
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
                <td data-label="Qty/Day">{{ $ex->expected_qty_day }}</td>
                <td data-label="L2L Price">{{ $ex->expected_l2l_price }}</td>
                <td data-label="Amount">{{ $ex->amount }}</td>
                <td data-label="Total">{{ $ex->total }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
  
        <h1>Agreed Business</h1>
        <table>
          <caption>Statement Summary</caption>
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
                <td data-label="Qty/Day">{{ $ex->expected_qty_day }}</td>
                <td data-label="L2L Price">{{ $ex->expected_l2l_price }}</td>
                <td data-label="Amount">{{ $ex->amount }}</td>
                <td data-label="Total">{{ $ex->total }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @else
      <div id="View_Business_Details" class="tabcontent" style="padding: 20px; display: none;">
        <p>No details to show.</p>
      </div>
    @endif
    </div>

  </div>

  <style>
    .contain-tabs {
      display: flex;
      width: 100%;
    }

    .tab {
      width: 250px;
      background-color: #eee;
      /* height: 100vh; */
      overflow-y: auto;
      display: flex;
      flex-direction: column;
      align-items: left;
      padding: 15px;
      position: fixed;
    }

    .tab a {
      background-color: white;
    color: black;
    padding: 10px;
    width: 100%;
    border-radius: 8px;
    border: none;
    text-align: left;
    cursor: pointer;
    transition: 0.3s;
    font-size: 14px;
    margin-bottom: 10px;
    text-decoration: none;
    }

    .tab a:hover {
      background-color: #ddd;
      border-radius: 8px;
    }

    .tab a.active {
      background-color: #0c9207;
      color: #fff;
      font-weight: bold;
      border-radius: 8px;
    }

    .tabcontent {
      margin-left: 260px;
      padding: 20px;
      width: calc(100% - 260px);
    }

    .table-responsive {
      overflow-x: auto;
    }
    .table .thead-dark th {
    background-color: #1F2937;
    color: #ffffff;
}
  </style>

  <script>
    // Make sure the correct tab is shown when the page loads
    // document.addEventListener('DOMContentLoaded', function () {
    //   // Set default tab to open
    //   const defaultTab = document.querySelector('.tab a.active');
    //   if (defaultTab) {
    //     defaultTab.click();
    //   }

    //   // Add click event listeners to the tab links
    //   const tabLinks = document.querySelectorAll('.tab a');
    //   tabLinks.forEach(link => {
    //     link.addEventListener('click', function (evt) {
    //       // Remove active class from all links
    //       tabLinks.forEach(l => l.classList.remove('active'));
    //       // Add active class to the clicked link
    //       this.classList.add('active');
    //     });
    //   });
    // });
  </script>
</div>
