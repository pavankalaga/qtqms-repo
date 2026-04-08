@extends('layouts.base')
@section('content')
<div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 my-activity-title mb-4">
  <div style="font-size: 20px;">My Expenses</div>
</div>
<div class="dash-container  mt-2 p-10" style=" padding-right: 3.35rem; padding-left: 2rem;">
  <!-- <h1>Expenses</h1> -->

  <div class="filters row  mb-4">
    <div class="col-md-3">
      <!-- <label for="employee-name" class="form-label">Employee Name</label>
      &nbsp; &nbsp;
      <i class="fas fa-filter"></i> -->
      <input placeholder="Employee Name" type="text" id="employee-name" class="form-control">
    </div>

    <div class="col-md-2">
      <!-- <label for="month" class="form-label">Month</label> -->
      <input type="text" id="from" onfocus="(this.type='date')" placeholder="From" class="form-control">
    </div>
    <div class="col-md-2">
      <!-- <label for="month" class="form-label">Month</label> -->
      <input type="text" id="to" onfocus="(this.type='date')" placeholder="To" class="form-control">
    </div>

  </div>

  <!-- Table -->
  <div class="table-responsive">
    <table id='my-expenses' class="table table-bordered">
      <thead class="table-dark">
        <tr>
          <th>Approval Status</th>
          <th>Date</th>
          <th>Day</th>
          <th>Place Of Work</th>
          <th>As per Tour Plan</th>
          <th>Dr. Calls</th>
          <th>D C Calls</th>
          <th>Other Calls</th>
          <th>Total Calls</th>
          <th>Daily Allowances</th>
          <th>Travel Allowances</th>
          <th>L & B Allowances</th>
          <th>Amount Addition</th>
          <th>Amount Deduction</th>
          <th>Total Expenses</th>
        </tr>
      </thead>
      <tbody>
        <!-- Example Rows -->
        <tr>
          <td>
            <div class="status-pending">
              Pending
            </div>
          </td>
          <td><a onclick="openPopup()">29-11-2024</a></td>
          <td>Monday</td>
          <td>New York</td>
          <td>Yes</td>
          <td>5</td>
          <td>2</td>
          <td>3</td>
          <td>9</td>
          <td>$50</td>
          <td>$100</td>
          <td>$100</td>
          <!-- <td>2024-11-28</td> -->
        </tr>
        <tr>
          <td>
            <div class="status-rejected">
              Rejected
            </div>
          </td>
          <td><a onclick="openPopup()">28-11-2024</a></td>
          <td>Sunday</td>
          <td>Boston</td>
          <td>No</td>
          <td>4</td>
          <td>1</td>
          <td>1</td>
          <td>6</td>
          <td>$40</td>
          <td>$80</td>
          <td>$80</td>
          <!-- <td>2024-11-27</td> -->
        </tr>
      </tbody>
    </table>
  </div>



  <div id="close" class="closeBtn" onclick="closePopup()">
    X
  </div>
  <div id="popup" class="popup">
    <div style="position: relative; height:95%">
      <div class="mb-4 my-activity-title" style="margin-top: 0.6rem;">
        <div style="font-size: 20px;">My Expense Details </div>
      </div>


      <form class="mb-4">

        <!-- Date -->
        <div class="row">
          <div class="form-group mb-3 col-md-4">
            <label for="date" class="col-form-label">Date</label>
            <input type="date" id="date" value="2024-12-01" disabled placeholder="Date" class="form-control">
          </div>
          <div class="form-group mb-3 col-md-4">
            <label for="day" class="col-form-label">Day</label>
            <input type="text" id="day" value="Sunday" disabled class="form-control">
          </div>
          <div class="form-group mb-3 col-md-4">
            <label for="town-worked" class="col-form-label">Town Worked</label>
            <input type="text" id="town-worked" value='Hyderabad' disabled class="form-control">
          </div>

          <div class="form-group mb-3 col-md-3">
            <label for="from-town" class="col-form-label">From Town</label>
            <input type="text" id="from-town" value="Hyderabad" disabled class="form-control">
            <input type="text" id="from-town" value="Hyderabad" disabled class="form-control">
            <input type="text" id="from-town" value="Hyderabad" disabled class="form-control">
            <input type="text" id="from-town" value="Hyderabad" disabled class="form-control">
          </div>
          <div class="form-group mb-3 col-md-3">
            <label for="to-town" class="col-form-label">To Town</label>
            <input type="text" id="to-town" value="Bibinagar" disabled class="form-control">
            <input type="text" id="to-town" value="Bibinagar" disabled class="form-control">
            <input type="text" id="to-town" value="Bibinagar" disabled class="form-control">
            <input type="text" id="to-town" value="Bibinagar" disabled class="form-control">
          </div>
          <div class="form-group mb-3 col-md-3">
            <label for="Km" class="col-form-label">Kilo Meters</label>
            <input type="number" id="Km" value='24' disabled class="form-control">
            <input type="number" id="Km" value='24' disabled class="form-control">
            <input type="number" id="Km" value='24' disabled class="form-control">
            <input type="number" id="Km" value='24' disabled class="form-control">
          </div>
          <div class="form-group mb-3 col-md-3">
            <label for="fare" class="col-form-label">Fare</label>
            <input type="number" id="Km" value='347.00' class="form-control">
            <input type="number" id="Km" value='347.00' class="form-control">
            <input type="number" id="Km" value='347.00' class="form-control">
            <input type="number" id="Km" value='347.00' class="form-control">
          </div>

          <div class="form-group mb-3 col-md-4">
            <label for="H Q" class="col-form-label">H Q Allowance</label>
            <input type="number" id="HQ" value='400.00' disabled class="form-control">
          </div>
          <div class="form-group mb-3 col-md-4">
            <label for="Ex-HQ" class="col-form-label">Ex HQ Allowance</label>
            <input type="number" id="Ex-HQ" value='00.00' disabled class="form-control">
          </div>
          <div class="form-group mb-3 col-md-4">
            <label for="outstation" class="col-form-label">OutStation Allowance</label>
            <input type="number" id="outstation" disabled class="form-control">
          </div>

          <div class="form-group mb-3 col-md-4">
            <label for="L&B-Allowance" class="col-form-label">L & B Allowance</label>
            <input type="number" id="L&B-Allowance" class="form-control">
          </div>
          <div class="form-group mb-3 col-md-4">
            <label for="Travel-Allowance" class="col-form-label">Travel Allowance</label>
            <input type="number" id="Travel-Allowance" class="form-control">
          </div>
          <div class="form-group mb-3 col-md-4">
            <label for="amount-addition" class="col-form-label">Amount Addition</label>
            <input type="number" id="amount-addition" class="form-control">
          </div>
          <div class="form-group mb-3 col-md-4">
            <label for="amount-deduction" class="col-form-label">Amount Deduction</label>
            <input type="number" id="amount-deduction" class="form-control">
          </div>
          <div class="form-group mb-3 col-md-4">
            <label for="total-Expenses" class="col-form-label">Total Expenses</label>
            <input type="number" id="total-Expenses" value='1000.00' disabled class="form-control">
          </div>

          <div class="form-group mb-3 col-md-4">
            <label for="myFile" class="col-form-label">Upload Doc</label>
            <input type="file" id="myFile" name="filename">
          </div>


        </div>
      </form>
      <div class="support-query-form-buttons">
        <button type="submit" class="support-query-save mb-3">Submit</button>
      </div>
    </div>
  </div>
</div>
<style>
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



  td {
    background-color: white !important;
  }


  #my-expenses tbody td:nth-child(2):hover {
    cursor: pointer;
    color: #36c !important;
    text-decoration: underline;
    transition: 0.2 ease;
  }

  #my-expenses tbody td:nth-child(2) {

    color: #36c !important;

  }

  /* #my-expenses  */
  #my-expenses tbody a:hover {
    color: #36c !important;
  }

  .popup {

    overflow: auto;
    top: 50px;
    position: fixed;
    /* top: 0; */
    right: -100%;
    width: calc(100% - 265px);
    height: 90%;
    background: #f8f9fa;
    box-shadow: -2px 0px 5px rgba(0, 0, 0, 0.3);
    padding: 0 20px;
    transition: 0.5s ease;
  }

  .popup.open {
    right: 0;
    bottom: 0;
    margin: 20px;
  }

  .closeBtn {
    /* overflow: auto; */
    top: 52px;
    position: fixed;
    /* top: 0; */
    right: -100%;
    width: 30px;
    height: 30px;
    background: #ff2222;
    padding: 5px;
    transition: 0.5s ease;
    border-radius: 50% 0 0 50%;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    color: #f8f9fa;
    font-weight: 700;
    cursor: pointer;
  }

  .closeBtn.opened {
    right: calc(100% - 265px);
    top: 100px;
  }

  #popup input {
    border-radius: 0;
  }

  /* Style for "Rejected" status (Red with icon) */
  .status-rejected {
    background-color: #ff7777dd;
    /* Light red background */
    color: #721c24;
    /* Dark red text */
    border: 1px solid #f5c6cb;
    /* Border to match the background */
    font-weight: bold;
    position: relative;
    font-size: 14px;
    /* Smaller text */
    /* border: 3px solid yellow; */
    border-radius: 16px;
    text-align: center;
    width: 8rem;
  }

  .status-rejected::before {
    content: "\2716";
    /* Cross mark icon */
    font-size: 12px;
    /* Smaller icon */
    position: absolute;
    left: 4px;
    top: 50%;
    transform: translateY(-50%);
    color: #721c24;
  }

  /* Style for "Approved" status (Green with icon) */
  .status-approved {
    background-color: #d4edda;
    /* Light green background */
    color: #155724;
    /* Dark green text */
    border: 1px solid #c3e6cb;
    /* Border to match the background */
    font-weight: bold;
    position: relative;
    font-size: 14px;
    /* Smaller text */
    border-radius: 16px;
    text-align: center;
    width: 8rem;
  }

  .status-approved::before {
    content: "\2714";
    /* Check mark icon */
    font-size: 12px;
    /* Smaller icon */
    position: absolute;
    left: 4px;
    top: 50%;
    transform: translateY(-50%);
    color: #155724;
  }

  /* Style for "Pending" status (Yellow with icon) */
  .status-pending {
    background-color: #fff3cd;
    /* Light yellow background */
    color: #856404;
    /* Dark yellow text */
    border: 1px solid #ffeeba;
    /* Border to match the background */
    font-weight: bold;
    position: relative;
    font-size: 14px;
    /* Smaller text */
    border-radius: 16px;
    text-align: center;
    width: 8rem;
  }

  .status-pending::before {
    content: "\231B";
    /* Hourglass icon */
    font-size: 12px;
    /* Smaller icon */
    position: absolute;
    left: 4px;
    top: 50%;
    transform: translateY(-50%);
    color: #856404;


  }

  input {
    border-color: #0CAF60;
    box-shadow: 0 0 0 0.2rem rgba(12, 175, 96, 0.25);
  }
</style>

<!-- JavaScript -->
<script>
  function openPopup() {
    document.getElementById('popup').classList.add('open');
    document.getElementById('close').classList.add('opened');
  }

  function closePopup() {
    document.getElementById('popup').classList.remove('open');
    document.getElementById('close').classList.remove('opened');

  }
</script>

@endsection