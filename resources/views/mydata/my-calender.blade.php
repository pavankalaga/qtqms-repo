@extends('layouts.base')
@section('content')

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Calendar</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FullCalendar CSS (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet">

    <!-- FontAwesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        /* Custom styles */
        .calendar-container {
            width: 1200px;
            height: 800px;
            margin: 0 auto;
        }

        .btn-group button {
            margin-right: 10px;
        }

        .modal-content {
            padding: 20px;
        }

        /* .calender {} */

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

        .form-container {
            margin: auto;
            /* padding: 20px; */

        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select,
        .form-group button {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group button {
            background-color: #007BFF;
            color: white;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }

        input {
            border-color: #0CAF60;
            box-shadow: 0 0 0 0.2rem rgba(12, 175, 96, 0.25);
        }
    </style>
</head>
<div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 my-activity-title mb-4">
    <!-- <h2>My Calendar</h2> -->
    <div style="font-size: 20px;">My Calendar</div>
    <!-- Create button (for adding events) -->

    <div class="d-flex" style="align-items: center;">
        <div class="dropdown activity-buttons">
            <button type="button" class="btn btn-warning me-2" onclick="openPopup()">Create</button>
        </div>
    </div>
</div>
<section class="calender">


    <div class="dash-container   mt-2 p-10" style=" padding-right: 3.35rem; padding-left: 2rem;">
        <div class="row mb-4">
            <div class="col-md-3">
                <!-- <label for="account-code" class="form-label">Account Code</label> -->
                <input type="text" id="employee-name" class="form-control" placeholder="Employee Name">
            </div>

        </div>

        <!-- Calendar will be displayed here -->
        <div id="calendar"></div>
    </div>

    <!-- Event Creation Modal -->
    <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventModalLabel">Create Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="eventForm">
                        <div class="mb-3">
                            <label for="eventTitle" class="form-label">Event Title</label>
                            <input type="text" class="form-control" id="eventTitle" required>
                        </div>
                        <div class="mb-3">
                            <label for="eventDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="eventDescription"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="eventDate" class="form-label">Date and Time</label>
                            <input type="datetime-local" class="form-control" id="eventDate" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success  btn1" id="saveEventButton">Save Event</button>
                </div>
            </div>
        </div>
    </div>


    <div id="close" class="closeBtn" onclick="closePopup()">
        X
    </div>
    <div id="popup" class="popup">
        <div style="position: relative; height:95%">
            <div class="mb-4 my-activity-title" style="margin-top: 0.6rem;">
                <div style="font-size: 20px;">Create Calendar</div>
            </div>

            <div class="form-container">

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
                        <label for="agenda ">Agenda:</label>
                        <textarea type="text" id="agenda" name="agenda " style="width: 100%;"></textarea>
                    </div>
                    <div class="support-query-form-buttons">
                        <button type="submit" class="support-query-save mb-3">Submit</button>
                    </div>
                </form>
            </div>

            <!-- <button type="button" class="btn btn-success btn1 w-100  mb-4" onclick="closePopup()">Submit</button> -->
        </div>
    </div>
</section>
<!-- FullCalendar JS -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<script>
    // Initialize FullCalendar
    const calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
        initialView: 'dayGridMonth', // Default view is Month
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events: [{
            title: 'Meeting with client',
            start: '2024-11-29T10:00:00',
            end: '2024-11-29T12:00:00',
            description: 'Discuss project requirements'
        }],
        eventClick: function(info) {
            alert('Event clicked: ' + info.event.title);
        }
    });
    calendar.render();

    // Switch to Day, Week, and Month views
    document.getElementById('dayView').addEventListener('click', function() {
        calendar.changeView('timeGridDay');
    });

    document.getElementById('weekView').addEventListener('click', function() {
        calendar.changeView('timeGridWeek');
    });

    document.getElementById('monthView').addEventListener('click', function() {
        calendar.changeView('dayGridMonth');
    });

    // Open the Create Event Modal
    document.getElementById('createEventButton').addEventListener('click', function() {
        const modal = new bootstrap.Modal(document.getElementById('eventModal'));
        modal.show();
    });

    // Save Event and Add to Calendar
    document.getElementById('saveEventButton').addEventListener('click', function() {
        const title = document.getElementById('eventTitle').value;
        const description = document.getElementById('eventDescription').value;
        const eventDate = document.getElementById('eventDate').value;

        if (title && eventDate) {
            // Add event to calendar
            calendar.addEvent({
                title: title,
                start: eventDate,
                description: description,
                allDay: true
            });

            // Close the modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('eventModal'));
            modal.hide();

            // Clear form fields
            document.getElementById('eventForm').reset();
        } else {
            alert('Please fill in all required fields.');
        }
    });
</script>




@endsection