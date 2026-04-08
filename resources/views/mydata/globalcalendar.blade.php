@extends('layouts.base')
@section('content')

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- FullCalendar CSS (optional) -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet">

<!-- FontAwesome for icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<style>
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
</style>
<div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 my-activity-title mb-4">
    <div style="font-size: 20px;">Global Calendar</div>



</div>
<div class="dash-container  mt-2 p-10" style="padding-right: 3.35rem; padding-left: 2rem;">

    <div class="pivot-container">
        <div class="pivot-tabs">
            <button class="pivot-tab active" data-target="tab1">Gross Receipts Calender</button>
            <button class="pivot-tab" data-target="tab1">Sales Calender</button>
            <button class="pivot-tab" data-target="tab1">PR Calender</button>
            <button class="pivot-tab" data-target="tab1">Global Calender</button>
        </div>
        <div class="pivot-content">
            <div class="pivot-panel active" id="tab1">
                <div id="calendar"></div>
            </div>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
<script>
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