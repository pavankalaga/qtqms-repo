@extends('layouts.base')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Sales</title>
    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <style>
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

        #dcr-table th {
            min-width: 110px;
        }



        #dcr-table a:hover {
            color: #36c !important;
            text-decoration: underline;
            cursor: pointer;
        }

        #dcr-table a {
            color: #36c !important;

        }



        #dcr-table td {
            background-color: white !important;
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

        input {
            border-color: #0CAF60;
            box-shadow: 0 0 0 0.2rem rgba(12, 175, 96, 0.25);
        }
    </style>
</head>
<div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 my-activity-title mb-4">
    <div style="font-size: 20px;">My Sales</div>


    <div class="d-flex" style="align-items: center;">

        <!-- <div class="dropdown activity-buttons">
      <button class="btn btn-warning me-2" onclick="openPopup()">Create DCR</button>
    </div> -->
    </div>
</div>
<div class="dash-container   mt-2 p-10" style=" padding-right: 3.35rem; padding-left: 2rem;">

    <!-- Filters -->
    <div class=" filters mb-4">
        <div class="row">
            <div class="col-md-3">
                <!-- <label for="account-code" class="form-label">Account Code</label> -->
                <input type="text" class="form-control" placeholder="Employee Name">
            </div>
            <div class="col-md-3">
                <!-- <label for="employee-name" class="form-label">Employee Name</label> &nbsp; &nbsp;
        <i class="fas fa-filter"></i> -->
                <input type="text" placeholder="Account Code" class="form-control">
            </div>
            <div class="col-md-3">
                <!-- <label for="employee-name" class="form-label">Employee Name</label> &nbsp; &nbsp;
        <i class="fas fa-filter"></i> -->
                <input type="text" placeholder="Account Name" class="form-control">
            </div>



        </div>
    </div>



    <!-- Table -->
    <div class="table-responsive">
        <table id="dcr-table" class="table table-responsive table-bordered">
            <thead class="table-dark">
                <tr>
                    <th> Account Code</th>
                    <th>Account Name</th>
                    <th>Graph</th>
                    <th>Sales of Current Month</th>
                    <!-- <th>Doctor Name</th> -->
                    <th>Sales of Previous Month</th>
                    <th>Sales From Two Month Ago</th>

                </tr>
            </thead>
            <tbody>
                <tr>

                    <td>2024-11-29</td>
                    <td style="min-width: 14rem;"> <a onclick="openPopup()">Monday</a></td>
                    <td>Hyd</td>
                    <td>2024-11-29</td>
                    <td>Monday</td>
                    <td>Hyd</td>

                </tr>
            </tbody>
        </table>
    </div>
    <!-- Popup -->
    <div id="close" class="closeBtn" onclick="closePopupp()">
        X
    </div>
    <div id="popup" class="popup">
        <div style="position: relative; height:95%">


            <div class="mb-4 my-activity-title" style="margin-top: 0.6rem;">
                <div style="font-size: 20px;">Detailed Monthly Sales </div>
            </div>
            <div class=" filters mb-4 mt-4 row ">
                <div class="col-md-2">
                    <label for="month" class="form-label">From</label>
                    <input type="text" id="from" onfocus="(this.type='date')" placeholder="From" class="form-control">
                </div>
                <div class="col-md-2">
                    <label for="month" class="form-label">To</label>
                    <input type="text" id="to" onfocus="(this.type='date')" placeholder="To" class="form-control">
                </div>
            </div>
            <div class="table-responsive">
                <div style="display:flex">
                    <table style="width: 50%;" id="dcr-table" class="table table-responsive table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th> Period</th>
                                <th>Patient Count</th>
                                <th>Test Count</th>
                                <th>Dise Count</th>
                                <th>Net Revenue</th>
                                <th>Gross Sale</th>


                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td> <a onclick="openPopupp2('Nov-2024')">Nov-2024</a></td>
                                <td>20</td>
                                <td>25</td>
                                <td>5</td>
                                <td>$2500</td>
                                <td>$2000</td>

                            </tr>
                            <tr>

                                <td> <a onclick="openPopupp2('Oct-2024')">Oct-2024</a></td>
                                <td>20</td>
                                <td>25</td>
                                <td>5</td>
                                <td>$2500</td>
                                <td>$2020</td>

                            </tr>
                        </tbody>
                    </table>
                    <img src="https://contexturesblog.com/wp-content/uploads/2022/03/linecharttargetrange01.png" style="width: 30%;margin-left: 1rem;" />

                </div>

            </div>
            <!-- <button style="position: absolute;bottom: 16px;" type="button" class="btn btn-primary btn1 w-100" onclick="closePopup()">Submit</button> -->
        </div>
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

            <div class=" filters mb-4 mt-4 row ">
                <div class="col-md-2">
                    <label for="month" class="form-label">From</label>
                    <input type="text" id="from" onfocus="(this.type='date')" placeholder="From" class="form-control">
                </div>
                <div class="col-md-2">
                    <label for="month" class="form-label">To</label>
                    <input type="text" id="to" onfocus="(this.type='date')" placeholder="To" class="form-control">
                </div>
            </div>
            <div class="table-responsive">
                <div style="display:flex">
                    <table style="width: 50%;" id="dcr-table" class="table table-responsive table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th> Date</th>
                                <th>Patient Count</th>
                                <th>Test Count</th>
                                <th>Dise Count</th>
                                <th>Net Revenue</th>
                                <th>Gross Sale</th>


                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td> 01-11-2024</td>
                                <td>20</td>
                                <td>25</td>
                                <td>5</td>
                                <td>$2500</td>
                                <td>$2000</td>

                            </tr>
                            <tr>

                                <td> 02-11-2024</td>
                                <td>20</td>
                                <td>25</td>
                                <td>5</td>
                                <td>$2500</td>
                                <td>$2020</td>

                            </tr>
                        </tbody>
                    </table>
                    <img src="https://contexturesblog.com/wp-content/uploads/2022/03/linecharttargetrange01.png" style="width: 30%;margin-left: 1rem;" />
                </div>
            </div>

            <!-- <button style="position: absolute;bottom: 16px;" type="button" class="btn btn-primary btn1 w-100" onclick="closePopup()">Submit</button> -->
        </div>
    </div>


    <div id="close3" class="closeBtn3" onclick="closePopupp3()">
        X
    </div>
    <div id="popup3" class="popup3">
        <div style="position: relative; height:95%">



            <div class="mb-4 my-activity-title" style="margin-top: 0.6rem;">
                <div style="font-size: 20px;" id='popupTitle2'>New Sales</div>


                <div class="d-flex" style="align-items: center;">

                    <div class="dropdown activity-buttons">
                        <input class="btn btn-warning me-2" style="width: 16rem;" type="file"></input>
                    </div>
                </div>
            </div>

            <div style="width: 100%;">
                <div class="form-container">

                    <form id="messageForm row" class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="PatientCount" class="form-label">Patient Count</label>
                                <input id="PatientCount" class="form-control" rows="3" required></input>
                            </div>
                            <div class="form-group ">
                                <label for="GrossAmount" class="form-label">Test Count</label>
                                <input id="GrossAmount" class="form-control" rows="3" required></input>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="GrossAmount" class="form-label">Gross Amount</label>
                                <input id="GrossAmount" class="form-control" rows="3" required></input>
                            </div>
                            <div class="form-group">
                                <label for="DiscoutAmount" class="form-label">Discout Amount</label>
                                <input id="DiscoutAmount" class="form-control" rows="3" required></input>
                            </div>
                            <div class="form-group">
                                <label for="PatientCount" class="form-label">Net Revenue</label>
                                <input id="NetRevenue" class="form-control" rows="3" required></input>
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
    <!-- Bootstrap JS -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js">
    </script>
    <script>
        function showTable() {
            document.getElementById('dcr-table').style.display = 'table';
        }

        function openPopupp() {
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
    <div>




        @endsection