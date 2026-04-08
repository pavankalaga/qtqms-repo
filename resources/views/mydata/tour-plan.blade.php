@extends('layouts.base')
@section('content')

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tour Plan</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .add-column-btn {
      cursor: pointer;
      font-size: 20px;
      color: #0d6efd;
      font-weight: bold;
    }

    #tour-plan-table tr {
      height: 4.5rem;
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

    td {
      background-color: white !important;
    }

    /* General Styles */
    .custom-multi-select {
      text-align: center;
      /* margin: 20px; */
    }

    .open-modal-btn {
      padding: 5px 12px;
      background-color: #007bff;
      color: white;
      text-decoration: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 12px;
    }

    .open-modal-btn:hover {
      background-color: #0056b3;
    }

    /* Modal Styles */
    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 1000;
    }

    .modal:target {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .modal-content {
      background-color: white;
      width: 90%;
      max-width: 400px;
      padding: 20px;
      border-radius: 8px;
      text-align: left;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }

    .modal-content h2 {
      margin-top: 0;
    }

    .modal-content label {
      display: block;
      margin: 10px 0;
    }

    .close-modal-btn {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #f44336;
      color: white;
      text-decoration: none;
      border-radius: 4px;
      text-align: center;
      cursor: pointer;
    }

    .close-modal-btn:hover {
      background-color: #d32f2f;
    }

    input {
      border-color: #0CAF60;
      box-shadow: 0 0 0 0.2rem rgba(12, 175, 96, 0.25);
    }
  </style>
</head>
<div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 my-activity-title mb-4">
  <div style="font-size: 20px;">My Tour Plan</div>
  <div class="d-flex" style="align-items: center;">
    <div class="dropdown activity-buttons">
      <button class="btn btn-warning me-2">Publish To DCR</button>
    </div>
    <div class="dropdown activity-buttons">
      <button class="btn btn-warning me-2" onclick="openPopup()">Create</button>
    </div>
  </div>
</div>
<div class="dash-container  mt-2 p-10" style=" padding-right: 3.35rem; padding-left: 2rem;">
  <!-- <h1>Tour Plan</h1> -->


  <!-- Filters -->
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
    <table id="tour-plan-table" class="table table-bordered">
      <thead class="table-dark">
        <tr style="height: 2.5rem;">
          <th>Date</th>
          <th>Day</th>
          <th>Place Of Work</th>
          <th>Call 1</th>
          <th>Call 2</th>
          <th>Call 3</th>
          <th>Call 4</th>
          <th>Call 5</th>
          <th>Call 6</th>
          <th>Call 7</th>
          <th>Call 8</th>
          <th>Call 9</th>
          <th>Call 10</th>
          <!-- <th class="text-center">
            <span class="add-column-btn" onclick="addColumn()">+</span>
          </th> -->
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>29-11-2024</td>
          <td>Monday</td>
          <td>H.Q</td>
          <td>Call Details 1</td>
          <td>Call Details 2</td>
          <td>Call Details 3</td>
          <td>Call Details 4</td>
          <td>Call Details 5</td>
          <td>Call Details 6</td>
          <td>Call Details 7</td>
          <td>Call Details 8</td>
          <td>Call Details 9</td>
          <td>Call Details 10</td>
        </tr>
        <tr>
          <td>30-11-2024</td>
          <td>Tuesday</td>
          <td>E.H.Q</td>
          <td>Call Details 1</td>
          <td>Call Details 2</td>
          <td>Call Details 3</td>
          <td>Call Details 4</td>
          <td>Call Details 5</td>
          <td>Call Details 6</td>
          <td>Call Details 7</td>
          <td>Call Details 8</td>
          <td>Call Details 9</td>
          <td>Call Details 10</td>
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
        <div style="font-size: 20px;">Create Tour Plan</div>
      </div>
      <!-- <h3 class="mb-3"></h3> -->
      <form class="mb-4">

        <!-- Date -->
        <div class="row">
          <div class="form-group mb-3 col-md-3">
            <label for="employee-name" class="col-form-label">Employee Name</label>
            <input type="text" id="Employee-Name" placeholder="Employee Name" class="form-control">
          </div>
          <div class="form-group mb-3 col-md-3">
            <label for="date" class="col-form-label">Date</label>
            <input type="date" id="date" placeholder="Date" class="form-control">
          </div>

          <!-- Place Worked -->
          <div class="form-group mb-3 col-md-3">
            <label for="time" class="col-form-label">Place Of Work</label>
            <!-- <input type="text" id="location" placeholder="Place Of Work" class="form-control"> -->
            <select id="place-of-work" class="form-select form-control">
              <option value="" disabled selected>Select type</option>
              <option value="HQ">HQ</option>
              <option value="EX HQ">EX HQ</option>
              <option value="OutStation">OutStation</option>
            </select>
          </div>
          <div class="form-group mb-3 col-md-3">
            <label for="full-day-joint-work" class="col-form-label">Full-Day-Joint-Work</label><br>
            <input type="checkbox" style="height: 20px;width: 20px;" id="html" name="fav_language" value="yes" class="form-check-input custom-form-check"> <label class="me-2" for="html">Yes</label>
            <input type="checkbox" style="height: 20px;width: 20px;" id="css" name="fav_language" value="no" class="form-check-input custom-form-check"> <label for="css">No</label>
            <!-- <input type="radio" value="Yes" id="full-day-joint-work-yes" placeholder="Full-Day-Joint-Work" class="form-control">
            <input type="radio" value="No" id="full-day-joint-work-no" placeholder="Full-Day-Joint-Work" class="form-control"> -->
          </div>

          <div class="table-responsive mt-4">
            <table id='create-tour-plan-table' class="table table-bordered ">
              <thead class="table-dark">
                <tr style="height: 2.5rem;">
                  <th>Call Sequence</th>
                  <th style="min-width: 3rem; ">Doctor Name</th>
                  <th>Hospital Name</th>
                  <th>From Location</th>
                  <th>To Location</th>
                  <th>Appointment Time</th>
                  <th>Joint Field Work</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <select id="call-sequence" class="form-select form-control">
                      <option value="" disabled selected>Select Sequence</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>

                    </select>
                  </td>
                  <td>Name1</td>
                  <td>01/11/24</td>
                  <td>1</td>
                  <td>300</td>
                  <td>
                    16:42
                  </td>
                  <td>
                    <!-- <select id="joint-field-work"  class="form-select form-control">
                      <option value="" disabled selected>Select Team Member</option>
                      <option value="Member 1">Member 1</option>
                      <option value="Member 2">Member 2</option>
                      <option value="Member 3">Member 3</option>
                    </select> -->
                    <div class="custom-multi-select">
                      <!-- Button to open the modal -->
                      <a href="#multiSelectModal" class="open-modal-btn" id="selectedFruits">Select Member</a>
                      <div id="selectedMembers">
                      </div>
                      <!-- Modal -->
                      <div id="multiSelectModal" class="modal">
                        <div class="modal-content">
                          <div>Select Member</div>
                          <label><input type="checkbox" onchange="selectedMember(this)" id="Member1" value="Member1"> Member1 </label>
                          <label><input type="checkbox" onchange="selectedMember(this)" id="Member2" value="Member2"> Member2</label>
                          <label><input type="checkbox" onchange="selectedMember(this)" id="Member3" value="Member3"> Member3</label>
                          <label><input type="checkbox" onchange="selectedMember(this)" id="Member4" value="Member4"> Member4</label>
                          <label><input type="checkbox" onchange="selectedMember(this)" id="Member5" value="Member5"> Member5</label>
                          <label><input type="checkbox" onchange="selectedMember(this)" id="Member6" value="Member6"> Member6</label>
                          <label><input type="checkbox" onchange="selectedMember(this)" id="Member7" value="Member7"> Member7</label>
                          <!-- Close Modal -->
                          <a href="#" class="close-modal-btn">Close</a>
                        </div>
                      </div>

                      <!-- Placeholder to display selected items -->
                      <div class="selected-display">
                        <!-- Selected: <span id="selected-items">None</span> -->
                      </div>
                    </div>



                  </td>

                </tr>

              </tbody>
            </table>
          </div>
        </div>
        <div style="text-align: right;">
          <button class="btn btn-primary mb-3"><svg style="width: 22px; height:25px" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
              <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
            </svg></button>

        </div>
        <!-- Submit Button -->
      </form>
      <div class="support-query-form-buttons">
        <button type="submit" class="support-query-save mb-3">Submit</button>
      </div>
    </div>
  </div>

</div>

<!-- JavaScript -->
<script>
  function addColumn() {
    const table = document.getElementById('tour-plan-table');
    const headerRow = table.querySelector('thead tr');
    const rows = table.querySelectorAll('tbody tr');

    // Add a new header for the column
    const newHeader = document.createElement('th');
    newHeader.textContent = `Custom Column`;
    headerRow.insertBefore(newHeader, headerRow.lastElementChild);

    // Add a new cell to each row for the new column
    rows.forEach(row => {
      const newCell = document.createElement('td');
      newCell.textContent = 'Custom Data';
      row.insertBefore(newCell, row.lastElementChild);
    });
  }

  function openPopup() {
    document.getElementById('popup').classList.add('open');
    document.getElementById('close').classList.add('opened');
  }

  function closePopup() {
    document.getElementById('popup').classList.remove('open');
    document.getElementById('close').classList.remove('opened');

  }

  function selectedMember(ts) {
    const selectedDiv = document.getElementById('selectedMembers');
    const checkboxes = document.querySelectorAll('.modal-content input[type="checkbox"]');

    // Get all checked members
    const selected = Array.from(checkboxes)
      .filter((cb) => cb.checked)
      .map((cb) => cb.value);

    // Update the selectedDiv content
    selectedDiv.innerHTML = selected.length > 0 ?
      selected.map((item, index) => {
        return index % 2 === 1 ? `${item}<br>` : item; // Add <br> after even-indexed items (index starts from 0)
      }).join(',') : '';
  }
</script>

@endsection