@extends('layouts.base')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EQAS Calendar</title>

        <!-- FullCalendar CSS -->
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet">

        <!-- FullCalendar JS -->
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
    </head>

    <body>
        <div class="main">
            <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
                <div style="font-size: 20px;">EQAS Calendar</div>
                <select id="yearSelect" class="form-control" style="width: 150px;">
                    @for ($i = date('Y'); $i >= date('Y') - 5; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <section class="calendar">
                <div>
                    <!-- Calendar will be displayed here -->
                    <div id="calendar"></div>
                </div>
            </section>
        </div>

    </body>

    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let calendarEl = document.getElementById('calendar');
            let calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: [] // Initially empty
            });

            function fetchEqasData(year) {
                fetch("{{ route('eqas.calendarDates') }}?year=" + year)
                    .then(response => response.json())
                    .then(events => {

                        console.log(events)
                        console.log("Fetched Events:", events); // Debugging
                        calendar.removeAllEvents();
                        calendar.addEventSource(events);
                    })
                    .catch(error => console.error('Error fetching EQAS data:', error));
            }

            document.getElementById('yearSelect').addEventListener('change', function () {
                fetchEqasData(this.value);
            });

            fetchEqasData(document.getElementById('yearSelect').value);
            calendar.render();
        });

    </script>

    </html>

@endsection