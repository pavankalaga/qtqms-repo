@extends('layouts.base')
@section('content')
<div class="container dash-container mt-5">
    <div class="container mt-5">
        <!-- Top Heading -->
        <h1 class="text-center mb-4">My DCR</h1>

        <!-- Date Inputs and Button -->
        <div class="d-flex justify-content-center align-items-end mb-4 gap-3">
            <div>
                <label for="from-date" class="form-label">From Date:</label>
                <input type="date" class="form-control" id="from-date">
            </div>
            <div>
                <label for="to-date" class="form-label">Today Date:</label>
                <input type="date" class="form-control" id="to-date">
            </div>
            <!-- Button triggers the offcanvas -->
            <button class="btn btn-success btn1" data-bs-toggle="offcanvas" data-bs-target="#tableOffcanvas" aria-controls="tableOffcanvas">
                Create
            </button>
        </div>

        <!-- Cards Section -->
        <div class="row g-3">
            <!-- First Card -->
            <div class="col-md-6">
                <div class="card p-3 shadow-sm bg-light">
                    <div class="checkbox  form-check"><input class="form-check-input custom-form-check" type="checkbox"></div>
                    <div class="card-body">
                        <h5 class="card-title">Vivek Demo Lead</h5>
                        <p class="card-text">
                            <strong>Check-in:</strong> 26/11/2024 5:39 PM<br>
                            <strong>Check-out:</strong> 26/11/2024 4:10 PM<br>
                            <strong>Attendees:</strong> Madhu, Prasad, Kumar
                        </p>
                    </div>
                </div>
            </div>

            <!-- Second Card -->
            <div class="col-md-6">
                <div class="card p-3 shadow-sm bg-light">
                    <div class="checkbox text-danger"><i class="fa-solid fa-circle-minus"></i></div>
                    <div class="icon-group">
                        <i class="fa-solid fa-arrow-turn-down-left"></i>
                        <i class="fa-sharp fa-regular fa-circle-xmark"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Vivek Demo Lead</h5>
                        <p class="card-text">
                            <strong>Check-in:</strong> 26/11/2024 5:39 PM<br>
                            <strong>Check-out:</strong> 26/11/2024 4:10 PM<br>
                            <strong>Attendees:</strong> Madhu, Prasad, Kumar
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Offcanvas for Table -->
   
    <div class="offcanvas offcanvas-end" tabindex="-1" id="tableOffcanvas" aria-labelledby="tableOffcanvasLabel">
    <div class="offcanvas-header">
        <h5 id="tableOffcanvasLabel">DCR Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form>
            <!-- Date and Time Section -->
            <div class="mb-3">
                <label for="dateTime" class="form-label">Date and Time</label>
                <input type="datetime-local" class="form-control" id="dateTime">
            </div>

            <!-- Customers Dropdown -->
            <div class="mb-3">
                <label for="customerSelect" class="form-label">Customers</label>
                <select class="form-select" id="customerSelect">
                    <option value="">Select Customer</option>
                    <option value="customer1">Customer 1</option>
                    <option value="customer2">Customer 2</option>
                    <option value="customer3">Customer 3</option>
                </select>
            </div>

            <!-- Location Section -->
            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" id="location" placeholder="Enter Location">
            </div>

            <!-- Address Section -->
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" placeholder="Enter Address">
            </div>

            <!-- Submit Button -->
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success btn1">Submit</button>
            </div>
        </form>
    </div>
    </div>


</div>
<style>

    .dash-container{
        width:80%;
    }
    .offcanvas{
        visibility: visible;
        margin-top: 70px;
        margin-right: 40px;
    }
        .card {
            position: relative;
            border-radius: 10px;
        }

        .checkbox {
            position: absolute;
            top: 10px;
            right: 10px;
            /* width: 20px;
            height: 20px;*/
            border-radius: 50%; 
            /* border: 2px solid; */
        }

        .checkbox.green {
            background-color: green;
            border-color: green;
        }

        .checkbox.red {
            background-color: red;
            border-color: red;
        }

        .icon-group {
            position: absolute;
            top: 10px;
            right: 50px;
        }

        .icon-group i {
            margin-left: 10px;
            cursor: pointer;
        }
        .btn1{
            background-color: #010046 !important;
            color: white;
            border:2px solid #0caf60;
        }
    </style>

@endsection