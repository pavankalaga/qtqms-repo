@extends('layouts.base')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Calendar</title>
    <!-- FullCalendar CSS (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet">

    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
</head>
<style>

</style>

<body>
    <div class="main ">
        <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
            <div style="font-size: 20px;">Control Calendar</div>
            <div style="font-size: 20px;">
                <select>
                    <option value="">-- Select Labs --</option>
                    <option value="pathology">Lab 1</option>
                    <option value="microbiology">Lab 2</option>
                    <option value="biochemistry">Lab 3</option>
                </select>
            </div>
            <!-- <input type="button" class="btn btn-warning" onclick="createDoc()" value='Create'> -->

        </div>

        <section class="calender">


            <div>
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



        </section>
    </div>

</body>
<!-- FullCalendar JS -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKUFG6Vc5a-GdBOYheGswae-H7Cp7cVzA&libraries=places"></script>


<script>
    //    Initialize FullCalendar
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
</script>

</html>

@endsection