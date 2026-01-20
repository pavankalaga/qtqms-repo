@extends('layouts.base')
@section('content')


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Plan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 my-activity-title mb-4">
    <div style="font-size: 20px;">My Quote Approvals</div>

    <div class="d-flex" style="align-items: center;">
        <div class="dropdown activity-buttons">
            <button class="btn btn-warning me-2" onclick="openPopup('Create')">Create</button>
        </div>
    </div>
</div>
<div class="dash-container my-5 mt-2 p-10" style=" padding-right: 3.35rem; padding-left: 2rem;">
    <!-- <div class="table-title mb-4">My Approvals</div> -->


    <!-- Filters -->
    <div class="row mb-4">
        <div class="col-md-3">
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
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Account Code</th>
                    <th style="min-width: 3rem; ">Account Name</th>
                    <th>Quote Number</th>
                    <th>Quote Date</th>
                    <th>Details</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="expenses-body">
                <tr>
                    <td>8</td>
                    <td>Name1</td>
                    <td><a onclick="openPopup('Quote No: Q12345')">Q12345 </a></td>
                    <td>01/11/24</td>
                    <td>300</td>
                    <td>
                        <div class="status-approved">
                            Approved
                        </div>
                    </td>

                </tr>
                <tr>
                    <td>8</td>
                    <td>Name2</td>
                    <td><a onclick="openPopup('Quote No: Q12346')">Q12346 </a></td>
                    <td>02/11/24</td>
                    <td>300</td>
                    <td>
                        <div class="status-rejected">
                            Rejected
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>A</td>
                    <td>Name3</td>
                    <td><a onclick="openPopup('Quote No: Q12347')">Q12347 </a></td>
                    <td>03/11/24</td>
                    <td>300</td>
                    <td>
                        <div class="status-pending">
                            Pending
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div id="close" class="closeBtn" onclick="closePopup()">
    X
</div>
<div id="popup" class="popup">
    <div style="position: relative; height:95%">


        <div class="mb-4 my-activity-title" style="margin-top: 0.6rem;">
            <div style="font-size: 20px;" id='popupTitle'>Create Quote</div>

            <div class="d-flex" style="align-items: center;">
                <div class="dropdown activity-buttons">
                    <button class="btn btn-warning me-2 dropdown-toggle" id="package" data-bs-toggle="dropdown" aria-expanded="false">Package</button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li>
                            <div onclick="showFormm('existing','Package')" class="dropdown-item">Existing TDPL Package</div>
                        </li>
                        <li>
                            <div onclick="showFormm('new','Package')" class="dropdown-item">New Customised Package</div>
                        </li>
                    </ul>
                </div>
                <div class="dropdown activity-buttons">
                    <button class="btn btn-warning me-2 dropdown-toggle" id="profile" data-bs-toggle="dropdown" aria-expanded="false">Profile</button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li>
                            <div onclick="showFormm('existing','Profile')" class="dropdown-item">Existing TDPL Profile</div>
                        </li>
                        <li>
                            <div onclick="showFormm('new','Profile')" class="dropdown-item">New Customised Profile</div>
                        </li>
                    </ul>
                </div>
                <div class="dropdown activity-buttons">
                    <button onclick="showFormm()" class="btn btn-warning me-2" id="quote-test">Test</button>
                </div>

            </div>
        </div>
        <div style="margin: 1rem;" id="create-quote1">



        </div>
    </div>

    <div class="support-query-form-buttons">
        <button type="submit" class="support-query-save mb-3">Submit</button>
    </div>
</div>


</div>
</div>


<!-- JavaScript -->
<script>
    function showFormm(option, Name) {
        const createQuoteDiv = document.getElementById('create-quote1');
        // createQuoteDiv.style.display = "flex"
        if (option === 'existing') {
            // createQuoteDiv.classList.remove('create-quote');
            createQuoteDiv.innerHTML = `
        <h4>Existing  TDPL ${Name}</h4>
        <hr>
          <div class="row">
                <div class="form-group mb-3 col-md-3">
                    <label for="employee-name" class="col-form-label">Account Code</label>
                    <input type="text"  placeholder="Account Code" class="form-control">
                </div>
                
                <div class="form-group mb-3 col-md-3">
                    <label for="date" class="col-form-label">Account Name</label>
                    <input type="text" placeholder="Account Name"  value="2255" disabled class="form-control">
                </div>
            </div>
      <hr>
            <div class="row">
                <div class="form-group mb-3 col-md-3">
                    <label for="employee-name" class="col-form-label">Employee Name</label>
                    <input type="text"  placeholder="Employee Name" class="form-control">
                </div>
                
                <div class="form-group mb-3 col-md-3">
                    <label for="date" class="col-form-label">Quote</label>
                    <input type="test" placeholder="Date"  value="2255" disabled class="form-control">
                </div>
            </div>
              <hr>


           <table style="width: 100%;"  class="table table-bordered">
              <thead>
                <tr>
                  <th >S.No</th>
                  <th style="max-width: 4rem; white-space: break-spaces;" >Test Code</th>
                  <th style="min-width: 14rem;" >${Name} Name</th>
                  <th  style="max-width: 4rem; white-space: break-spaces;" >Parameters</th>
                  <th  style="max-width: 4rem; white-space: break-spaces;" >Current Quantity per Month</th>
                  <th  style="max-width: 4rem; white-space: break-spaces;" >Expected Quantity per Month</th>
                  <th  style="max-width: 4rem; white-space: break-spaces;" >Listed L2L Price</th>
                  <th  style="max-width: 4rem; white-space: break-spaces;" >Ideal L2L Price</th>
                  <th  style="max-width: 4rem; white-space: break-spaces;" >Requested L2L Price</th>
                  <th  style="max-width: 4rem; white-space: break-spaces;" >Total Revenue</th>
                  <!-- <th title="Action" width="60">Action</th> -->
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    1
                  </td>
                  <td>
                    <input class='form-control ' type="text" class="form-control">
                  </td>
                  <td class="location">
                    <input class='form-control ' type="text" class="form-control">
                  </td>
                  <td> <input class='form-control ' type="text" class="form-control">
                  </td>
                  <td> <input class='form-control ' type="text" class="form-control">
                  </td>
                  <td> <input class='form-control ' type="text" class="form-control">
                  </td>
                  <td> <input class='form-control ' type="text" class="form-control">
                  </td>
                  <td> <input class='form-control ' type="text" class="form-control">
                  </td>
                  <td> <input class='form-control ' type="text" class="form-control">
                  </td>
                  <td> <input class='form-control ' type="text" class="form-control">
                  </td>
                </tr>
              </tbody>
            </table>
            
<div style="float:inline-end;">
              <button style="float:inline-end; width: fit-content;" class="btn btn-primary mt-2  mb-3"><svg style="width: 22px; height:25px" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
          </svg></button>
          </div>`;
        } else if (option === 'new') {
            // createQuoteDiv.classList.add('create-quote');
            createQuoteDiv.innerHTML =

                `
     <h4>New Customised ${Name}</h4>
          <hr>
          <div class="row">
                <div class="form-group mb-3 col-md-3">
                    <label for="employee-name" class="col-form-label">Account Code</label>
                    <input type="text"  placeholder="Account Code" class="form-control">
                </div>
                
                <div class="form-group mb-3 col-md-3">
                    <label for="date" class="col-form-label">Account Name</label>
                    <input type="text" placeholder="Account Name"  value="2255" disabled class="form-control">
                </div>
            </div>
      <hr>
            <div class="row">
                <div class="form-group mb-3 col-md-3">
                    <label for="employee-name" class="col-form-label">Employee Name</label>
                    <input type="text"  placeholder="Employee Name" class="form-control">
                </div>
                
                <div class="form-group mb-3 col-md-3">
                    <label for="date" class="col-form-label">Quote</label>
                    <input type="test" placeholder="Date"  value="2255" disabled class="form-control">
                </div>
            </div>
              <hr>

      <table style="width: 100%;"  class="table table-bordered">
              <thead>
                <tr>
                  <th >S.No</th>
                  <th  style="min-width: 14rem;" >Name Of ${Name}</th>
                  <th  style="max-width: 4rem; white-space: break-spaces;" >Parameters</th>
                  <th  style="max-width: 4rem; white-space: break-spaces;" >Requested L2L Price</th>
                  <th  style="max-width: 4rem; white-space: break-spaces;" >Expected ${Name} per Month</th>
                  <th  style="max-width: 4rem; white-space: break-spaces;" >Total Revenue</th>
                  <!-- <th title="Action" width="60">Action</th> -->
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    1
                  </td>
                  <td>
                    <input class='form-control ' type="text" class="form-control">
                  </td>
                  <td class="location">
                    <input class='form-control ' type="text" class="form-control">
                  </td>
                  <td> <input class='form-control ' type="text" class="form-control">
                  </td>
                  <td> <input class='form-control ' type="text" class="form-control">
                  </td>
                 
                  <td> <input class='form-control ' type="text" class="form-control">
                  </td>
                    </td>
                </tr>
              </tbody>
            </table>
            
<div style="float:inline-end;">
              <button style="float:inline-end; width: fit-content;" class="btn btn-primary mt-2  mb-3"><svg style="width: 22px; height:25px" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
          </svg></button>
          </div>`;
        } else {

            createQuoteDiv.innerHTML = `
         <h4>Test</h4>
             <hr>
          <div class="row">
                <div class="form-group mb-3 col-md-3">
                    <label for="employee-name" class="col-form-label">Account Code</label>
                    <input type="text"  placeholder="Account Code" class="form-control">
                </div>
                
                <div class="form-group mb-3 col-md-3">
                    <label for="date" class="col-form-label">Account Name</label>
                    <input type="text" placeholder="Account Name"  value="2255" disabled class="form-control">
                </div>
            </div>
      <hr>
            <div class="row">
                <div class="form-group mb-3 col-md-3">
                    <label for="employee-name" class="col-form-label">Employee Name</label>
                    <input type="text"  placeholder="Employee Name" class="form-control">
                </div>
                
                <div class="form-group mb-3 col-md-3">
                    <label for="date" class="col-form-label">Quote</label>
                    <input type="test" placeholder="Date"  value="2255" disabled class="form-control">
                </div>
            </div>
              <hr>

       <table style="width: 100%;"  class="table table-bordered">
              <thead>
                <tr>
                  <th >S.No</th>
                  <th title="Test Code" style="max-width: 4rem; white-space: break-spaces;" >Test Code</th>
                  <th title="Test Name" style="min-width: 14rem;" >Test Name</th>
                  <th  style="max-width: 4rem; white-space: break-spaces;" >Method</th>
                  <th  style="max-width: 4rem; white-space: break-spaces;" >Expected Quantity per Month</th>
                  <th style="max-width: 4rem; white-space: break-spaces;" >Listed L2L Price</th>
                  <th style="max-width: 4rem; white-space: break-spaces;" >Ideal L2L Price</th>
                  <th style="max-width: 4rem; white-space: break-spaces;" >Requested L2L Price</th>
                  <th  style="max-width: 4rem; white-space: break-spaces;" >Total Revenue</th>
                  <!-- <th title="Action" width="60">Action</th> -->
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    1
                  </td>
                  <td>
                    <input class='form-control ' type="text" class="form-control">
                  </td>
                  <td class="location">
                    <input class='form-control ' type="text" class="form-control">
                  </td>
                  <td> <input class='form-control ' type="text" class="form-control">
                  </td>
                  <td> <input class='form-control ' type="text" class="form-control">
                  </td>
                 
                  <td> <input class='form-control ' type="text" class="form-control">
                  </td>
                    </td>
                 
                  <td> <input class='form-control ' type="text" class="form-control">
                  </td>  
                  <td> <input class='form-control ' type="text" class="form-control">
                  <td> <input class='form-control ' type="text" class="form-control">
                  </td>
                </tr>
              </tbody>
            </table>
            
<div style="float:inline-end;">
              <button style="float:inline-end; width: fit-content;" class="btn btn-primary mt-2  mb-3"><svg style="width: 22px; height:25px" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
          </svg></button>
          </div>
            `
        }
    }

    function openPopup() {
        // Access the child element using its id
        const popupTitle = document.getElementById('popupTitle');

        // Change the text content
        popupTitle.textContent = name;
        document.getElementById('popup').classList.add('open');
        document.getElementById('close').classList.add('opened');
    }

    function closePopup() {
        document.getElementById('popup').classList.remove('open');
        document.getElementById('close').classList.remove('opened');

    }
</script>
<style>
    .create-quote {
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        overflow: hidden;
        margin: 0 0.5rem 0.5rem 0.5rem;
        padding: 0.5rem;
        transition: transform 0.3s ease;
    }

    .create-quote select {
        width: 50% !important;
    }

    .create-quote input {
        width: 50% !important;
    }

    .activity-buttons {
        align-items: center;
        display: flex;
    }

    .label-pakage {
        margin-right: 0.5rem;
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
        z-index: 10000;
    }

    .popup.open {
        right: 0;
        bottom: 0;
        margin: 20px 0 20px 20px;
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
        z-index: 10000;
    }

    .closeBtn.opened {
        right: calc(100% - 265px);
        top: 100px;
    }

    #popup input {
        border-radius: 0;
    }

    #expenses-body a:hover {
        color: #36c !important;
        cursor: pointer;
        text-decoration: underline !important;
    }

    #expenses-body a {
        color: #36c !important;

    }
</style>

<style>
    .table-title {
        background: #010046;
        font-size: 1.8rem;
        color: #ffffff;
        border-radius: 5px;
    }

    tbody tr:hover {
        background-color: #f1f1f1 !important;
        transition: background-color 0.3s ease;
    }

    th:nth-child(1) {
        min-width: 2rem !important;
        max-width: 2.5rem !important;
    }

    th:nth-child(3) {
        text-align: center;
        min-width: 1.5rem !important;
        max-width: 2rem !important;
    }

    th:nth-child(4) {
        text-align: center;
        min-width: 2rem !important;
        max-width: 2.5rem !important;
    }

    th:nth-child(5) {
        text-align: center;
        min-width: 1.5rem !important;
        max-width: 2rem !important;
    }

    /* 
    th:nth-child(2) {
        min-width: 3rem !important;
        max-width: 4rem !important;
    } */
    th:nth-child(6) {
        text-align: center;
        min-width: 2.5rem !important;
        max-width: 4rem !important;
    }

    td:nth-child(6) {
        width: 1rem;
    }

    td:nth-child(3) {
        width: 9rem;
        text-align: center;
    }

    td:nth-child(4) {
        width: 9rem;
        text-align: center;
    }

    td:nth-child(5) {
        width: 9rem;
        text-align: center;
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

@endsection