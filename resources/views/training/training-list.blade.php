@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Training</title>
    </head>
    <style>
        .stock-planner-table {
            width: 100% !important;
            border-collapse: collapse !important;
            margin-top: 20px !important;
        }

        .stock-planner-table th,
        .stock-planner-table td {
            padding: 10px !important;
            text-align: center !important;
            border: 1px solid #ddd !important;
        }

        .stock-planner-table th {
            background-color: #007BFF !important;
            color: white !important;
        }

        .create-pop-blur-bg {
            position: fixed;
            background: #80808078;
            width: 100vw;
            top: 0;
            height: 100vh;
            left: 0;
            z-index: 10000;
        }

        .create-pop {
            height: 90%;
            display: flex;
            background: white;
            position: fixed;
            flex-direction: column;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 20px;
            overflow: auto;
        }

        .form-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            width: 600px;

        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
            letter-spacing: 1px;
        }

        .form-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        .form-container input,
        .form-container textarea,
        .form-container select {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        .form-container input:focus,
        .form-container select:focus,
        .form-container textarea:focus {
            border-color: #4facfe;
            outline: none;
        }

        .form-container textarea {
            resize: none;
        }

        .form-container button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            border: none;
            border-radius: 5px;
            color: #ffffff;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .form-container button:hover {
            background: linear-gradient(135deg, #00f2fe, #4facfe);
        }

        .form-container .footer-text {
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
            color: #666;
        }

        .form-container .footer-text a {
            color: #4facfe;
            text-decoration: none;
        }

        .form-container .footer-text a:hover {
            text-decoration: underline;
        }
    </style>

    <body>
        <div class="main ">
            <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
                <div style="font-size: 20px;">Training and Development List</div>

                <!-- <input type="button" class="btn btn-warning" onclick="createDoc()" value='Create'> -->

            </div>
            <div class="table-responsive">
                <table class="stock-planner-table">
                    <thead>
                        <tr>
                            <th>
                                S.No.
                            </th>
                            <th>
                                Date
                            </th>
                            <th>
                                Training Details
                            </th>
                            <th>
                                Source for Training
                            </th>
                            <th>
                                Department
                            </th>
                            <th>
                                Location
                            </th>
                            <th>
                                No. of Participants
                            </th>


                            <th>
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $index => $item)
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{$item->training_date}}</td>
                                <td><a href="{{ route('training.edit', ['id' => $item->id]) }}">{{$item->training_name}}</td>
                                </a>
                                <td>{{$item->training_type}}</td>
                                <td>{{$item->department}}</td>
                                <td>{{$item->location}}</td>
                                <td>{{$item->participants}}</td>

                                <td>{{$item->status}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="create-pop-blur-bg" id="createPop" style="display: none;">
                <div class="create-pop ">
                    <div class="form-container">
                        <form action="{{ route('trainings.store') }}" method="post">
                            @csrf

                            <label for="training-date">Date:</label>
                            <input type="date" id="training-date" name="training_date" required>

                            <label for="training-name">Training Details:</label>
                            <input type="text" id="training-name" name="training_name" required>

                            <label for="training-type">Type of Training:</label>
                            <select name="training_type" id="training-type" required>
                                <option value="Internal">Internal</option>
                                <option value="External">External</option>
                            </select>

                            <label for="department">Department:</label>
                            <input type="text" id="department" name="department" required>

                            <label for="location">Location:</label>
                            <select name="location" id="location" required onchange="onchangeLocation()">
                                <option value="" disabled>Select</option>
                                <option value="Hyd">Hyd</option>
                                <option value="Other">Other</option>
                            </select>

                            <div id="other-location-div" style="display: none;">
                                <label for="other_location">Other Location:</label>
                                <input type="text" id="other_location" name="other_location">
                            </div>

                            <label for="participants">No. of Participants:</label>
                            <input type="number" id="participants" name="participants" min="1" required>

                            <label for="status">Status:</label>
                            <select name="status" id="status" required>
                                <option value="Yet to Schedule">Yet to Schedule</option>
                                <option value="Scheduled">Scheduled</option>
                                <option value="Completed">Completed</option>
                            </select>

                            <label for="trainer_name">Name of Trainer:</label>
                            <input type="text" id="trainer_name" name="trainer_name" required>

                            <button type="submit">Submit</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>

    </body>
    <script>
        document.getElementById("createPop").addEventListener("click", function (event) {
            // Check if the clicked element is the background (not the popup itself)
            if (event.target === this) {
                this.style.display = "none"; // Hide the pop-up
            }
        });

        function createDoc() {
            document.getElementById('createPop').style.display = "block"
        }
    </script>
    <script>
        function onchangeLocation() {
            var location = document.getElementById("location").value;
            var otherLocationDiv = document.getElementById("other-location-div");

            if (location === "Other") {
                otherLocationDiv.style.display = "block";
            } else {
                otherLocationDiv.style.display = "none";
            }
        }
    </script>

    </html>

@endsection