@extends('layouts.base')
@section('content')

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Activity</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* .form-control {
      border: none;
      border-bottom: 1px solid #ccc;
      border-radius: 0;
      outline: none;
      box-shadow: none;
    } */

    .table th,
    .table td {
      vertical-align: middle;
    }

    .search-box {
      display: flex;
      align-items: center;
    }

    /* .search-box input {
      border: none;
      border-bottom: 1px solid #ccc;
      border-radius: 0;
      box-shadow: none;
      margin-right: 10px;
      border-color: #0CAF60;
      box-shadow: 0 0 0 0.2rem rgba(12, 175, 96, 0.25);
    } */

    .search-box i {
      color: #6c757d;
    }

    .dropdown-toggle::after {
      margin-left: 10px;
    }

    .btn1 {
      background-color: #010046 !important;
      color: white;
      border: 2px solid #0caf60;
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

    /* fOR PIVOT */
    .pivot-container {
      width: 100%;
      /* max-width: 600px;
      margin: 50px auto; */
      background-color: white;
      border-radius: 8px;
      /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); */
      /* overflow: hidden; */
    }

    .pivot-tabs {
      display: flex;
      background-color: #0078d4;
    }

    .pivot-tab {
      flex: 1;
      padding: 10px 20px;
      color: white;
      background: transparent;
      border: none;
      cursor: pointer;
      font-size: 16px;
      text-align: center;
    }

    .pivot-tab.active {
      background-color: #005a9e;
      font-weight: bold;
    }

    .pivot-content {
      padding: 20px 0;
    }

    .pivot-panel {
      display: none;
    }

    .pivot-panel.active {
      display: block;
    }

    /* For Meeting button */
    .button-container {
      display: flex;
      gap: 20px;
    }

    .meetingButton {
      display: flex;
      text-align: center;
      text-decoration: none;
      color: #000;
      border: 2px solid #ccc;
      border-radius: 10px;
      padding: 10px;
      width: 120px;
      background-color: #fff;
      transition: all 0.3s ease;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .meetingButton img {
      width: 60px;
      height: 60px;
      margin-bottom: 10px;
    }

    .meetingButton:hover {
      background-color: #e0e0e0;
      border-color: #888;
    }

    /* For Meeting */
    /* Form Container */
    .form-container {
      /* max-width: 600px; */
      margin: auto;
      /* padding: 20px; */
      background-color: #f9f9f9;
      border-radius: 8px;
      /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */

    }

    /* Form Heading */
    .form-container h2 {
      text-align: center;
      font-size: 0.9rem;
      color: #333;
      margin-bottom: 20px;
      border-bottom: 2px solid #007bff;
      display: inline-block;
      padding-bottom: 5px;
    }

    /* Form Group */
    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      font-size: 0.9rem;
      font-weight: bold;
      color: #333;
      margin-bottom: 8px;
    }

    /* Input and Select Fields */
    .form-group input,
    .form-group select,
    .form-group textarea {
      /* width: 100%; */
      padding: 12px;
      font-size: 0.9rem;
      border: 1px solid #ccc;
      border-radius: 6px;
      box-sizing: border-box;
      transition: border-color 0.3s ease;
    }

    /* Input Focus Style */
    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
      border-color: #007bff;
      outline: none;
      box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    /* Textarea Styling */
    .form-group textarea {
      height: 150px;
      resize: vertical;
    }

    /* Button Group */
    .support-query-form-buttons {
      display: flex;
      justify-content: space-between;
      gap: 20px;
    }

    .support-query-form-buttons button {
      padding: 12px 20px;
      border: none;
      border-radius: 6px;
      font-size: 1rem;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .support-query-form-buttons .support-query-save {
      background-color: #007bff;
      color: white;
    }

    .support-query-form-buttons .support-query-save:hover {
      background-color: #0056b3;
      transform: translateY(-2px);
    }

    .support-query-form-buttons .support-query-cancel {
      background-color: #dc3545;
      color: white;
    }

    .support-query-form-buttons .support-query-cancel:hover {
      background-color: #c82333;
      transform: translateY(-2px);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .form-container {
        padding: 15px;
      }

      .support-query-form-buttons {
        flex-direction: column;
        gap: 15px;
      }

      .support-query-form-buttons button {
        width: 100%;
      }
    }

    /* For Raise Ticket */
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

    .flagStyle {
      display: flex;
      align-items: center;
      /* justify-content: space-around; */
    }

    .flagStyle i {
      margin-right: 0.5rem;
    }

    .message-container {
      /* max-width: 500px; */
      margin: 20px 0;
      background-color: #ffffff;
      border: 1px solid #ddd;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      padding: 15px;
      display: flex;
    }

    .message-header {
      font-size: 0.9rem;
      color: #888;
      margin-bottom: 10px;
    }

    .message-content {
      position: relative;
      font-size: 1rem;
      /* line-height: 1.6; */
      color: #333;
    }



    .message-content span {
      font-weight: bold;
    }

    input {
      border-color: #0CAF60;
      box-shadow: 0 0 0 0.2rem rgba(12, 175, 96, 0.25);
    }
  </style>
</head>

<div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 my-activity-title mb-4">
  <div style="font-size: 20px;">My Activities</div>
  <div class="dropdown activity-buttons">
    <button class="btn btn-warning me-2" onclick="openPopupp()">Create</button>
  </div>
</div>
<div class="dash-container  mt-2 p-10" style="padding-right: 3.35rem; padding-left: 2rem;">
  <!-- Title -->

  <div class="row mb-4">
    <div class="col-md-3">
      <!-- <label for="account-code" class="form-label">Account Code</label> -->
      <input type="text" id="employee-name" class="form-control" placeholder="Employee Name">
    </div>

  </div>
  <!-- Top Buttons -->
  <div class="pivot-container">
    <div class="pivot-tabs">
      <button class="pivot-tab active" data-target="tab1">Task</button>
      <!-- <button class="pivot-tab" data-target="tab4">Message</button> -->
      <button class="pivot-tab" data-target="tab5">Meetings</button>
      <button class="pivot-tab" data-target="tab2">Notes</button>
      <button class="pivot-tab" data-target="tab3">Call</button>
      <!-- <button class="pivot-tab" data-target="tab6">Raise Ticket</button> -->
    </div>
    <div class="pivot-content">
      <div class="pivot-panel active" id="tab1">
        <!-- Secondary Buttons and Search Box -->
        <div class="d-flex justify-content-between align-items-center mb-4">
          <div>
            <button class="btn btn-success me-2">Completed</button>
            <button class="btn btn-success me-2">Upcoming</button>
            <button class="btn btn-success">Overdue</button>
          </div>
          <div class="search-box">
            <input type="text" class="form-control" placeholder="Search">
            <i class="bi bi-search"></i>
          </div>
        </div>

        <!-- Table -->
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead class="table-dark">
              <tr>
                <th>Status</th>
                <th>Task Name</th>
                <th>Created Date</th>
                <th>Due Date</th>
                <th>Priority</th>
                <th>Created By</th>
                <th>Assigned By</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input type="checkbox"></td>
                <td>Complete Documentation</td>
                <td>2024-12-01</td>
                <td>2024-12-01</td>
                <td>
                  <div class="flagStyle">
                    <i class="fa-solid fa-flag" style="color: #ff0000;"></i>
                    High
                  </div>
                </td>
                <td>John Doe</td>
                <td>Jane Smith</td>
              </tr>
              <tr>
                <td><input type="checkbox"></td>
                <td>Team Meeting</td>
                <td>2024-11-30</td>
                <td>2024-11-30</td>
                <td>
                  <div class="flagStyle">
                    <i class="fa-solid fa-flag" style="color: #ffca2c;"></i>
                    Medium
                  </div>
                </td>
                <td>John Doe</td>
                <td>Jane Smith</td>
              </tr>
              <tr>
                <td><input type="checkbox"></td>
                <td>Submit Project</td>
                <td>2024-12-05</td>
                <td>2024-12-05</td>
                <td>
                  <div class="flagStyle">
                    <i class="fa-solid fa-flag" style="color: #29357c;"></i>
                    Low
                  </div>
                </td>
                <td>JHON</td>
                <td>John</td>
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
              <lable id='popup-title' style="font-size: 20px;">Create Task </lable>
            </div>
            <div style="width: 100%;" id="createMessageOff">
              <div class="form-container">

                <form id="messageForm">
                  <div class="form-group">
                    <label for="message" class="form-label">Task Name</label>
                    <input id="taskName" class="form-control" rows="3" required></input>
                  </div>
                  <div class="form-group">
                    <label for="sentBy" class="form-label">Created Date</label>
                    <input type="date" id="status" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="sentDate" class="form-label">Due Date</label>
                    <input type="date" id="dueDate" class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label for="status" class="form-label">Priority</label>
                    <select id="priority" class="form-select" required>
                      <option value="High">High</option>
                      <option value="Medium">Medium</option>
                      <option value="Low">Low</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="viewedDate" class="form-label">Created/Assigned By</label>
                    <input type="text" id="assignedBy" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="viewedDate" class="form-label">Assigned To</label>
                    <input type="text" id="assignedTo" class="form-control">
                  </div>
                  <div class="support-query-form-buttons">
                    <button type="submit" class="support-query-save mb-3">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="pivot-panel" id="tab2">
        <div>
          <div class="notes-Details">
            <div class="modal-content">
              <!-- <div class="modal-header">
          <h5 class="modal-title" id="notesModalLabel">Notes Details</h5>
        </div> -->

              <div class="row">
                <div class="col-md-2">
                  <!-- <label for="from" class="form-label">From</label> -->
                  <input type="text" onfocus="(this.type='date')" placeholder="From" id="from" class="form-control">
                </div>
                <div class="col-md-2">
                  <!-- <label for="to" class="form-label">To</label> -->
                  <input type="text" onfocus="(this.type='date')" id="to" placeholder="To" class="form-control">
                </div>
                <div class="col-md-5"></div>
                <div class="search-box col-md-3">
                  <input type="text" class="form-control" placeholder="Search">
                  <i class="bi bi-search"></i>
                </div>
              </div>
              <div style="overflow: auto;">
                <div class="message-container ">
                  <div class="message-header col-md-1">
                    <p>19 Jul 2024</p>
                    <p> 01:35 PM</p>
                  </div>
                  <div style="width: 1px;display: flex;background: #dddddd;margin: 0 1rem;" class="col-md-1"></div>
                  <div class="message-content ">
                    <h6>Test Heading</h6>
                    <p>Generic: Hey James! We tried reaching you but couldn't connect. How about you choose a time to talk again</p>
                    <p class="message-by">By Name 1Name 1Name 1Name 1Name 1Name 1Name 1</p>

                  </div>

                </div>
              </div>


              <div id="close4" class="closeBtn" onclick="closePopupp()">
                X
              </div>
              <div id="popup4" class="popup">
                <div style="position: relative; height:95%">



                  <div class="mb-4 my-activity-title" style="margin-top: 0.6rem;">
                    <div style="font-size: 20px;" id='popupTitle2'>Create Notes</div>


                    <!-- <div class="d-flex" style="align-items: center;">

          <div class="dropdown activity-buttons">
            <input class="btn btn-warning me-2" style="width: 16rem;" type="file"></input>
          </div>
        </div> -->
                  </div>

                  <div style="width: 100%;">
                    <div class="form-container">

                      <form id="NewLegerForm" class="row">


                        <!-- <h2 class="mb-2 text-center"> Create Notes</h2> -->
                        <div class="mb-3">
                          <label for="noteTitle" class="mb-2 text-center">Note Title</label>
                          <input type="text" id="noteTitle" class="form-control" placeholder="Enter title" required>
                        </div>
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="noteDate" class="form-label">Date</label>
                            <input type="date" id="noteDate" class="form-control" required>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="noteTime" class="form-label">Time</label>
                            <input type="time" id="noteTime" class="form-control" required>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="createdBy" class="form-label">Created By</label>
                          <input type="text" id="createdBy" class="form-control" placeholder="Enter your name" required>
                        </div>
                        <div class="mb-3">
                          <label for="noteContent" class="form-label">Write Note</label>
                          <textarea id="noteContent" class="form-control" rows="5" placeholder="Write your note here..." required></textarea>
                        </div>
                        <div class="mb-3">
                          <label for="uploadFile" class="form-label">Upload Attachments</label>
                          <input type="file" id="uploadFile" class="form-control">
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
          </div>


        </div>
      </div>
      <div class="pivot-panel" id="tab3">
        <div class="button-container">
          <a href="https://teams.microsoft.com/" target="_blank" class="meetingButton">
            <img src="https://techcommunity.microsoft.com/t5/s/gxcuf89792/m_assets/themes/customTheme1/favicon-1730836271365.png?time=1730836274203" alt="Microsoft Teams">
            Microsoft Teams
          </a>

          <a href="https://zoom.us/" target="_blank" class="meetingButton">
            <img src="https://upload.wikimedia.org/wikipedia/commons/7/7b/Zoom_Communications_Logo.svg" alt="Zoom" style="height: 40Px;width: 80px;">
            Zoom
          </a>

          <a href="https://meet.google.com/" target="_blank" class="meetingButton">
            <img src="https://www.gstatic.com/meet/google_meet_horizontal_wordmark_2020q4_1x_icon_124_40_2373e79660dabbf194273d27aa7ee1f5.png" alt="Google Meet" style="width: 80px;height: 34px;">
            Google Meet
          </a>
        </div>
      </div>
      <div class="pivot-panel" id="tab4">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <div>
            <button class="btn btn-success me-2">Incoming</button>
            <button class="btn btn-success me-2">Outgoing</button>
            <!-- <button class="btn btn-success">Create Message</button> -->
          </div>
          <!-- <div class="search-box">
            <input type="text" class="form-control" placeholder="Search">
            <i class="bi bi-search"></i>
          </div> -->
        </div>
        <div class="row">
          <div class="col-12">
            <table class="table table-bordered">
              <thead class="table-dark">
                <tr>
                  <th>Message</th>
                  <th>Sent By</th>
                  <th>Sent Date</th>
                  <th>Status</th>
                  <th>Viewed Date</th>
                </tr>
              </thead>
              <tbody id="messagesTableBody">
                <!-- Dummy data rows -->
                <tr>
                  <td>Meeting at 3 PM</td>
                  <td>John Doe</td>
                  <td>2024-11-28</td>
                  <td>Completed</td>
                  <td>2024-11-28</td>
                </tr>
                <tr>
                  <td>Project deadline extended</td>
                  <td>Jane Smith</td>
                  <td>2024-11-27</td>
                  <td>Pending</td>
                  <td>N/A</td>
                </tr>
                <tr>
                  <td>Weekly report submitted</td>
                  <td>Sam Wilson</td>
                  <td>2024-11-25</td>
                  <td>Completed</td>
                  <td>2024-11-26</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div id="close1" class="closeBtn" onclick="closePopupp()">
          X
        </div>
        <div id="popup1" class="popup">
          <div style="position: relative; height:95%">
            <div class="mb-4 my-activity-title" style="margin-top: 0.6rem;">
              <lable id='popup-title' style="font-size: 20px;">Create Message </lable>
            </div>
            <div style="width: 100%;" id="createMessageOff">
              <div class="form-container">
                <!-- <h2>Create Message</h2> -->
                <!-- Create Message Form -->
                <form id="messageForm">
                  <div class="form-group">
                    <label for="to" class="form-label">To</label>
                    <input type="text" id="to" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="message" class="form-label">Message</label>
                    <textarea id="message" class="form-control" rows="3" required></textarea>
                  </div>

                  <div class="form-group">
                    <label for="sentDate" class="form-label">Sent Date</label>
                    <input type="date" id="sentDate" class="form-control" required>
                  </div>
                  <div>
                    <input type="checkbox" checked id="readRecipt" class="form-check-input custom-form-check">
                    <label for="readRecipt" class="form-label">Read Recipt</label>
                  </div>

                  <div class="form-group">
                    <label for="status" class="form-label">Priority</label>
                    <select id="priority" class="form-select" required>
                      <option value="High">High</option>
                      <option value="Medium">Medium</option>
                      <option value="Low">Low</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="myFile" class="form-label">Upload Doc</label>
                    <input type="file" id="myFile" name="filename">
                  </div>
                  <!-- <div class="form-group">
                    <label for="status" class="form-label">Status</label>
                    <select id="status" class="form-select" required>
                      <option value="Pending">Pending</option>
                      <option value="Completed">Completed</option>
                    </select>
                  </div> -->
                  <!-- <div class="form-group">
                    <label for="viewedDate" class="form-label">Viewed Date</label>
                    <input type="date" id="viewedDate" class="form-control">
                  </div> -->
                  <div class="support-query-form-buttons">
                    <button type="submit" class="support-query-save mb-3">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="pivot-panel" id="tab5">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <div>
            <button class="btn btn-success me-2">Completed</button>
            <button class="btn btn-success me-2">Upcoming</button>
            <button class="btn btn-success">Overdue</button>
          </div>
          <div class="search-box">
            <input type="text" class="form-control" placeholder="Search">
            <i class="bi bi-search"></i>
          </div>
        </div>

        <!-- Table -->
        <table class="table table-bordered table-striped">
          <thead class="table-dark">
            <tr>
              <th>Event Name</th>
              <th>Start Date and Time</th>
              <th>End Date and Time</th>
              <th>Calendar</th>
              <th>Repeat</th>
              <th>Location</th>
              <th>Attendees</th>
              <th>Agenda</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>test</td>
              <td>05-12-2024 09:48</td>
              <td>05-12-2024 19:48</td>
              <td></td>
              <td>No</td>
              <td>Hyd</td>
              <td>5</td>
              <td>Test</td>
            </tr>
          </tbody>
        </table>


        <div id="close2" class="closeBtn" onclick="closePopupp()">
          X
        </div>
        <div id="popup2" class="popup">
          <div style="position: relative; height:95%">
            <div class="mb-4 my-activity-title" style="margin-top: 0.6rem;">
              <lable id='popup-title' style="font-size: 20px;">Create Meeting</lable>
            </div>
            <div style="width: 100%;" id="createMessageOff">
              <div class="form-container">
                <!-- <h2>Create Meeting</h2> -->
                <form>
                  <div class="form-group">
                    <label for="event-name">Event Name:</label>
                    <input type="text" id="event-name" name="event-name" placeholder="Enter event name" required>
                  </div>

                  <div class="form-group">
                    <label for="start-time">Start Date and Time:</label>
                    <input type="datetime-local" id="start-time" name="start-time" required>
                  </div>

                  <div class="form-group">
                    <label for="end-time">End Date and Time:</label>
                    <input type="datetime-local" id="end-time" name="end-time" required>
                  </div>

                  <div class="form-group">
                    <label for="calendar">Calendar:</label>
                    <input type="email" id="calendar" name="calendar" placeholder="Enter calendar email" required>
                  </div>

                  <div class="form-group">
                    <label for="repeat">Repeat:</label>
                    <select id="repeat" name="repeat">
                      <option value="none">Don't repeat</option>
                      <option value="daily">Daily</option>
                      <option value="weekly">Weekly</option>
                      <option value="monthly">Monthly</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location" placeholder="Enter location">
                  </div>

                  <div class="form-group">
                    <label for="attendees">Attendees:</label>
                    <input type="email" id="attendees" name="attendees" placeholder="Enter attendees' emails (comma-separated)">
                  </div>

                  <div class="form-group">
                    <label for="agenda">Agenda:</label>
                    <textarea id="agenda" name="agenda" placeholder="Enter the agenda"></textarea>
                  </div>

                  <div class="support-query-form-buttons">
                    <button type="submit" class="support-query-save mb-3">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>


</div>


<script>
  function openPopupp() {
    document.getElementById('popup').classList.add('open');
    document.getElementById('close').classList.add('opened');
    document.getElementById('popup1').classList.add('open');
    document.getElementById('close1').classList.add('opened');
    document.getElementById('popup2').classList.add('open');
    document.getElementById('close2').classList.add('opened');
    document.getElementById('popup4').classList.add('open');
    document.getElementById('close4').classList.add('opened');
    // document.getElementById('popup-title').textContent = Name
    // const label1 = document.createElement('label');
    // label1.className = 'col-form-label col-md-6';
    // label1.textContent = Name;
  }

  function closePopupp() {
    document.getElementById('popup').classList.remove('open');
    document.getElementById('close').classList.remove('opened');
    document.getElementById('popup1').classList.remove('open');
    document.getElementById('close1').classList.remove('opened');

    document.getElementById('popup2').classList.remove('open');
    document.getElementById('close2').classList.remove('opened');
    document.getElementById('popup4').classList.remove('open');
    document.getElementById('close4').classList.remove('opened');
  }

  document.addEventListener("DOMContentLoaded", () => {
    const tabs = document.querySelectorAll(".pivot-tab");
    const panels = document.querySelectorAll(".pivot-panel");

    tabs.forEach((tab) => {
      tab.addEventListener("click", () => {
        // Remove active class from all tabs and panels
        tabs.forEach((t) => t.classList.remove("active"));
        panels.forEach((p) => p.classList.remove("active"));

        // Add active class to the clicked tab and corresponding panel
        tab.classList.add("active");
        const target = document.getElementById(tab.dataset.target);
        target.classList.add("active");
      });
    });
  });
</script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
@endsection