@extends('layouts.base')
@section('content')

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ageing Receivables</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 my-activity-title mb-4">
  <div style="font-size: 20px;">My Ledger</div>
</div>
<div class="dash-container   mt-2 p-10" style="padding-right: 3.35rem; padding-left: 2rem;">
  <!-- <h1>Ledger</h1> -->

  <!-- Filters -->
  <div class="row mb-4">
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

  </div>

  <!-- Table -->
  <div class="table-responsive">
    <table class="table table-bordered table-striped my-ledger-table">
      <thead class="table-dark">
        <tr>
          <th>Account Code</th>
          <th style="min-width: 12rem;">Account Name</th>
          <th>Sale / Invoice Amount</th>
          <th>Refund / Credit Note Amount</th>
          <th>TDS Amount</th>
          <th>Deposit Amount</th>
          <th>Closing Balance</th>
          <!-- <th>Remarks</th> -->
        </tr>

      </thead>
      <tbody>
        <!-- <tr>
          <td>
            Opening
          </td>
        </tr> -->
        <!-- Example row -->
        <tr>
          <td>AC001</td>
          <td><a onclick="openPopup('Account One')">Account One</a></td>
          <td>$10,000</td>
          <td>$2,000</td>
          <td>$3,000</td>
          <td>$4,000</td>
          <td>$1,000</td>
          <!-- <td>Pending Payment</td> -->
        </tr>
        <tr>
          <td>AC002</td>
          <td><a onclick="openPopup('Account Two')">Account Two</a></td>
          <td>$20,000</td>
          <td>$5,000</td>
          <td>$6,000</td>
          <td>$7,000</td>
          <td>$2,000</td>
          <!-- <td>Follow-Up Required</td> -->
        </tr>
      </tbody>
    </table>
  </div>


  <div id="close" class="closeBtn" onclick="closePopupp()">
    X
  </div>
  <div id="popup" class="popup">
    <div style="position: relative; height:95%">



      <div class="mb-4 my-activity-title" style="margin-top: 0.6rem;">
        <div style="font-size: 20px;" id='popupTitle'></div>
      </div>

      <div class="row mb-4 mt-4">
        <div class="col-md-2">
          <label for="from" class="form-label">From</label>
          <input type="date" placeholder="From" id="from" class="form-control">
        </div>
        <div class="col-md-2">
          <label for="to" class="form-label">To</label>
          <input type="date" id="to" placeholder="To" class="form-control">
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-bordered table-striped my-ledger-table">
          <thead class="table-dark">
            <tr>
              <th>Period</th>
              <th style="min-width: 12rem;">Opening Balance</th>
              <th>Sale / Invoice Amount</th>
              <th>Refund / Credit Note Amount</th>
              <th>TDS Amount</th>
              <th>Deposit Amount</th>
              <th>Closing Balance</th>
              <!-- <th>Remarks</th> -->
            </tr>

          </thead>
          <tbody>
            <!-- <tr>
          <td>
            Opening
          </td>
        </tr> -->
            <!-- Example row -->
            <tr>
              <td><a onclick="openPopupp2('Nov-2024')">Nov-2024</a></td>
              <td>$12000</td>
              <td>$10,000</td>
              <td>$2,000</td>
              <td>$3,000</td>
              <td>$4,000</td>
              <td>$1,000</td>
              <!-- <td>Pending Payment</td> -->
            </tr>
            <tr>
              <td><a onclick="openPopupp2('Dec-2024')">Dec-2024</a></td>
              <td>$8000</td>
              <td>$50,000</td>
              <td>$5,000</td>
              <td>$6,000</td>
              <td>$7,000</td>
              <td>$2,000</td>
              <!-- <td>Follow-Up Required</td> -->
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- <button style="position: absolute;bottom: 16px;" type="button" class="btn btn-primary btn1 w-100" onclick="closePopup()">Submit</button> -->
  </div>

  <div id="close2" class="closeBtn2" onclick="closePopupp2()">
    X
  </div>
  <div id="popup2" class="popup2">
    <div style="position: relative; height:95%">



      <div class="mb-4 my-activity-title" style="margin-top: 0.6rem;">
        <div style="font-size: 20px;" id='popupTitle2'></div>
        <div class="d-flex" style="align-items: center;">

          <div class="dropdown activity-buttons">
            <button class="btn btn-warning me-2" onclick="openPopupp3()">Create</button>
          </div>
        </div>
      </div>

      <div class="row mb-4 mt-4">
        <div class="col-md-2">
          <label for="from" class="form-label">From</label>
          <input type="date" placeholder="From" id="from" class="form-control">
        </div>
        <div class="col-md-2">
          <label for="to" class="form-label">To</label>
          <input type="date" id="to" placeholder="To" class="form-control">
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered table-striped my-ledger-table">
          <thead class="table-dark">
            <tr>
              <th>Period</th>
              <th style="min-width: 12rem;">Opening Balance</th>
              <th>Sale / Invoice Amount</th>
              <th> Refund / Credit Note Amount</th>
              <th>TDS Amount</th>
              <th>Deposit Amount</th>
              <th>Closing Balance</th>
              <!-- <th>Remarks</th> -->
            </tr>

          </thead>
          <tbody>
            <!-- <tr>
          <td>
            Opening
          </td>
        </tr> -->
            <!-- Example row -->
            <tr>
              <td>01-11-2024</td>
              <td>$12000</td>
              <td>$10,000</td>
              <td>$2,000</td>
              <td>$3,000</td>
              <td>$4,000</td>
              <td>$1,000</td>
              <!-- <td>Pending Payment</td> -->
            </tr>
            <tr>
              <td>02-11-2024</td>
              <td>$8000</td>
              <td>$50,000</td>
              <td>$5,000</td>
              <td>$6,000</td>
              <td>$7,000</td>
              <td>$2,000</td>
              <!-- <td>Follow-Up Required</td> -->
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- <button style="position: absolute;bottom: 16px;" type="button" class="btn btn-primary btn1 w-100" onclick="closePopup()">Submit</button> -->
  </div>

  <div id="close3" class="closeBtn3" onclick="closePopupp3()">
    X
  </div>
  <div id="popup3" class="popup3">
    <div style="position: relative; height:95%">



      <div class="mb-4 my-activity-title" style="margin-top: 0.6rem;">
        <div style="font-size: 20px;" id='popupTitle2'>Receipts</div>


        <div class="d-flex" style="align-items: center;">

          <div class="dropdown activity-buttons">
            <input class="btn btn-warning me-2" style="width: 16rem;" type="file"></input>
          </div>
        </div>
      </div>

      <div style="width: 100%;">
        <div class="form-container">

          <form id="NewLegerForm" class="row">
            <div class="col-md-6">
              <div class="form-group col-md-6">
                <label for="InvoiceAmount" class="form-label">Sale / Invoice Amount</label>
                <input id="InvoiceAmount" class="form-control" rows="3" required></input>
              </div>
              <div class="form-group col-md-6">
                <label for="CreditAmount" class="form-label">Refund / Credit Amount</label>
                <input id="CreditAmount" class="form-control" rows="3" required></input>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="TDSAmount" class="form-label">TDS Amount</label>
                <input id="TDSAmount" class="form-control" rows="3" required></input>
              </div>
              <div class="form-group">
                <label for="DepositAmount" class="form-label">Deposit Amount</label>
                <input id="DepositAmount" class="form-control" rows="3" required></input>
              </div>
              <div class="form-group">
                <label for="DepositAmountRep" class="form-label">Deposit Refernce No.</label>
                <input id="DepositAmountRep" class="form-control" rows="3" required></input>
              </div>
            </div>

            <div class="support-query-form-buttons">
              <button type="submit" class="support-query-save mb-3">Submit</button>
            </div>
          </form>
        </div>
      </div>

      <!-- <button style="position: absolute;bottom: 16px;" type="button" class="btn btn-primary btn1 w-100" onclick="closePopup()">Submit</button> -->
    </div>
  </div>
</div>
<style>
  input {
    border-color: #0CAF60;
    box-shadow: 0 0 0 0.2rem rgba(12, 175, 96, 0.25);
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

  .my-ledger-table a:hover {
    cursor: pointer;
    color: #36c !important;
    text-decoration: underline !important;
    transition: all 0.3s ease;
  }

  .my-ledger-table a {
    color: #36c !important;

  }



  .popup2 {

    overflow: auto;
    top: 50px;
    position: fixed;
    /* top: 0; */
    right: -100%;
    width: calc(100% - 298px);
    height: 90%;
    background: #f8f9fa;
    box-shadow: -2px 0px 5px rgba(0, 0, 0, 0.3);
    padding: 0 20px;
    transition: 0.5s ease;
    z-index: 10000;
  }

  .popup2.open {
    right: 0;
    bottom: 0;
    margin: 20px 0 20px 20px;
  }

  .closeBtn2 {
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
    z-index: 10000;
  }

  .closeBtn2.opened {
    right: calc(100% - 298px);
    top: 100px;
  }

  /* .my-ledger-table th {
    min-width: 2rem;
  } */
  @keyframes shake {

    0%,
    100% {
      transform: translateX(0);
    }

    20%,
    60% {
      transform: translateX(-5px);
    }

    40%,
    80% {
      transform: translateX(5px);
    }
  }

  .shake {
    animation: shake 0.5s ease-in-out;
  }

  .popup3 {

    overflow: auto;
    top: 50px;
    position: fixed;
    /* top: 0; */
    right: -100%;
    width: calc(100% - 330px);
    height: 90%;
    background: #f8f9fa;
    box-shadow: -2px 0px 5px rgba(0, 0, 0, 0.3);
    padding: 0 20px;
    transition: 0.5s ease;
    z-index: 10000;
  }

  .popup3.open {
    right: 0;
    bottom: 0;
    margin: 20px 0 20px 20px;
  }

  .closeBtn3 {
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
    z-index: 10000;
  }

  .closeBtn3.opened {
    right: calc(100% - 330px);
    top: 100px;
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
<script>
  function openPopupp(name) {
    const popupTitle = document.getElementById('popupTitle');
    popupTitle.textContent = name;
    document.getElementById('popup').classList.add('open');
    document.getElementById('close').classList.add('opened');
  }

  function closePopupp() {
    if (document.getElementById('popup2').classList.contains('open')) {
      // Add shake animation to the close button of popup2
      const closeBtn2 = document.getElementById('close2');
      closeBtn2.classList.add('shake');

      // Remove the shake class after the animation completes
      setTimeout(() => closeBtn2.classList.remove('shake'), 500);

      // alert("Please close the second popup before closing the first popup.");
      return;
    }

    document.getElementById('popup').classList.remove('open');
    document.getElementById('close').classList.remove('opened');
  }

  function openPopupp2(name) {
    const popupTitle = document.getElementById('popupTitle2');
    popupTitle.textContent = name;
    document.getElementById('popup2').classList.add('open');
    document.getElementById('close2').classList.add('opened');
  }

  function closePopupp2() {
    document.getElementById('popup2').classList.remove('open');
    document.getElementById('close2').classList.remove('opened');
  }


  function openPopupp3(name) {
    // const popupTitle = document.getElementById('popupTitle3');
    // popupTitle.textContent = name;
    document.getElementById('popup3').classList.add('open');
    document.getElementById('close3').classList.add('opened');
  }

  function closePopupp3() {
    document.getElementById('popup3').classList.remove('open');
    document.getElementById('close3').classList.remove('opened');
  }
</script>


@endsection