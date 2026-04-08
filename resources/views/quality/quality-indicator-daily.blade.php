@extends('layouts.base')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quality Indicator</title>
    <!-- FullCalendar CSS (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet">

    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
</head>
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
        background-color: #ffff;
        padding: 5px;
        border: 1px solid #b1b1b1;
        border-radius: 10px;
        width: 100%;
    }

    .pivot-tab {
        flex: 1;
        background: transparent;
        border: none;
        cursor: pointer;
        font-size: 14px;
        text-align: center;
    }

    .pivot-tab.active {
        color: #005a9e;
        background-color: lightblue;
        font-weight: bold;
        border-radius: 5px;
        padding: 0.8rem;
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

    /* for table */
    .stock-planner-table {
        width: 100% !important;
        border-collapse: collapse !important;
        margin-top: 20px !important;
    }

    .stock-planner-table th,
    .stock-planner-table td {
        padding: 10px !important;
        text-align: left !important;
        border: 1px solid #565454 !important;
    }

    .stock-planner-table th {
        background-color: #007BFF !important;
        color: white !important;
    }

    .stock-planner-table input {
        width: 50px;
    }
</style>

<body>
    <div class="main ">
        <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
            <div style="font-size: 20px;">Quality Indicator</div>
            <!-- <button type="button" class="btn btn-warning" onclick="openDocument1()">Create</button> -->
        </div>

        <div class="table-responsive" style="padding-right: 1rem;">
            <table class=" stock-planner-table">

                <tbody>
                    <tr>
                        <td colspan="27">Lab TATReporting August 2024 NRL - BEGUMPET, HYDERABAD</td>

                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>
                        <td>&nbsp;</td>

                        <td>&nbsp;</td>
                        <td colspan="2" rowspan="2">1</td>
                        <td colspan="2" rowspan="2">2</td>
                        <td colspan="2" rowspan="2">3</td>
                        <td colspan="2" rowspan="2">4</td>
                        <td colspan="2" rowspan="2">5</td>
                        <td colspan="2" rowspan="2">6</td>
                        <td colspan="2" rowspan="2">7</td>
                        <td colspan="2" rowspan="2">8</td>
                        <td colspan="2" rowspan="2">9</td>
                        <td colspan="2" rowspan="2">10</td>
                        <td colspan="2" rowspan="2">11</td>
                        <td colspan="2" rowspan="2">12</td>
                        <td colspan="2" rowspan="2">13</td>
                        <td colspan="2" rowspan="2">14</td>
                        <td colspan="2" rowspan="2">15</td>
                        <td colspan="2" rowspan="2">16</td>
                        <td colspan="2" rowspan="2">17</td>
                        <td colspan="2" rowspan="2">18</td>
                        <td colspan="2" rowspan="2">19</td>
                        <td colspan="2" rowspan="2">20</td>
                        <td colspan="2" rowspan="2">21</td>
                        <td colspan="2" rowspan="2">22</td>
                        <td colspan="2" rowspan="2">23</td>
                        <td colspan="2" rowspan="2">24</td>
                        <td colspan="2" rowspan="2">25</td>
                        <td colspan="2" rowspan="2">26</td>
                        <td colspan="2" rowspan="2">27</td>
                        <td colspan="2" rowspan="2">28</td>
                        <td colspan="2" rowspan="2">29</td>
                        <td colspan="2" rowspan="2">30</td>
                        <td colspan="2" rowspan="2">31</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">&nbsp;</td>

                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>

                        <td colspan="4">1. TURNAROUND TIME - INHOUSE</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>

                        <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;ANALYTICAL + POST ANALYTICAL TAT</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="2">1.1</td>
                        <td colspan="2" rowspan="2">Bio-Chemistry</td>
                        <td>DELAYED REPORTS</td>
                        <td rowspan="2">% OUT OF TAT</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">5.74%</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                    </tr>
                    <tr>
                        <td>TOTAL SAMPLES</td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>

                    </tr>
                    <tr>
                        <td colspan="2" rowspan="2">1.2</td>
                        <td colspan="2" rowspan="2">Immunology</td>
                        <td>DELAYED REPORTS</td>
                        <td rowspan="2">% OUT OF TAT</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>

                    </tr>
                    <tr>
                        <td>TOTAL SAMPLES</td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>

                    </tr>
                    <tr>
                        <td colspan="2" rowspan="2">1.3</td>
                        <td colspan="2" rowspan="2">Haematology</td>
                        <td>DELAYED REPORTS</td>
                        <td rowspan="2">% OUT OF TAT</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>

                    </tr>
                    <tr>
                        <td>TOTAL SAMPLES</td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="2">1.4</td>
                        <td colspan="2" rowspan="2">Serology</td>
                        <td>DELAYED REPORTS</td>
                        <td rowspan="2">% OUT OF TAT</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>

                    </tr>
                    <tr>
                        <td>TOTAL SAMPLES</td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="2">1.5</td>
                        <td colspan="2" rowspan="2">Micro Biology</td>
                        <td>DELAYED REPORTS</td>
                        <td rowspan="2">% OUT OF TAT</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>TOTAL SAMPLES</td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="2">1.6</td>
                        <td colspan="2" rowspan="2">Molecular Biology</td>
                        <td>DELAYED REPORTS</td>
                        <td rowspan="2">% OUT OF TAT</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>TOTAL SAMPLES</td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="2">1.7</td>
                        <td colspan="2" rowspan="2">Histo Pathology</td>
                        <td>DELAYED REPORTS</td>
                        <td rowspan="2">% OUT OF TAT</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>TOTAL SAMPLES</td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="2">1.8</td>
                        <td colspan="2" rowspan="2">Cytology</td>
                        <td>DELAYED REPORTS</td>
                        <td rowspan="2">% OUT OF TAT</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>TOTAL SAMPLES</td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="2">1.9</td>
                        <td colspan="2" rowspan="2">Clinical Pathology</td>
                        <td>DELAYED REPORTS</td>
                        <td rowspan="2">% OUT OF TAT</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>TOTAL SAMPLES</td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="2">1.10</td>
                        <td colspan="2" rowspan="2">CytoGenetics</td>
                        <td>DELAYED REPORTS</td>
                        <td rowspan="2">% OUT OF TAT</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>

                    </tr>
                    <tr>
                        <td>TOTAL SAMPLES</td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>

                    </tr>
                    <tr>
                        <td colspan="2" rowspan="2">1.11</td>
                        <td colspan="2" rowspan="2">Genetics</td>
                        <td>DELAYED REPORTS</td>
                        <td rowspan="2">% OUT OF TAT</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>TOTAL SAMPLES</td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="2">&nbsp;</td>
                        <td colspan="2" rowspan="2">&nbsp;</td>
                        <td>DELAYED REPORTS</td>
                        <td rowspan="2">% OUT OF TAT</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>TOTAL SAMPLES</td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>

                        <td colspan="4">1. TURNAROUND TIME - OUTSOURCE</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>

                        <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;ANALYTICAL + POST ANALYTICAL TAT</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="2">1.1</td>
                        <td colspan="2" rowspan="2">Bio-Chemistry</td>
                        <td>DELAYED REPORTS</td>
                        <td rowspan="2">% OUT OF TAT</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>TOTAL SAMPLES</td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="2">1.2</td>
                        <td colspan="2" rowspan="2">Immunology</td>
                        <td>DELAYED REPORTS</td>
                        <td rowspan="2">% OUT OF TAT</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>TOTAL SAMPLES</td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="2">1.3</td>
                        <td colspan="2" rowspan="2">Haematology</td>
                        <td>DELAYED REPORTS</td>
                        <td rowspan="2">% OUT OF TAT</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>TOTAL SAMPLES</td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="2">1.4</td>
                        <td colspan="2" rowspan="2">Serology</td>
                        <td>DELAYED REPORTS</td>
                        <td rowspan="2">% OUT OF TAT</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>TOTAL SAMPLES</td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="2">1.5</td>
                        <td colspan="2" rowspan="2">Micro Biology</td>
                        <td>DELAYED REPORTS</td>
                        <td rowspan="2">% OUT OF TAT</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>TOTAL SAMPLES</td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="2">1.6</td>
                        <td colspan="2" rowspan="2">Molecular Biology</td>
                        <td>DELAYED REPORTS</td>
                        <td rowspan="2">% OUT OF TAT</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>TOTAL SAMPLES</td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="2">1.7</td>
                        <td colspan="2" rowspan="2">Histo Pathology</td>
                        <td>DELAYED REPORTS</td>
                        <td rowspan="2">% OUT OF TAT</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>TOTAL SAMPLES</td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="2">1.8</td>
                        <td colspan="2" rowspan="2">Cytology</td>
                        <td>DELAYED REPORTS</td>
                        <td rowspan="2">% OUT OF TAT</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>TOTAL SAMPLES</td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="2">1.9</td>
                        <td colspan="2" rowspan="2">Clinical Pathology</td>
                        <td>DELAYED REPORTS</td>
                        <td rowspan="2">% OUT OF TAT</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>TOTAL SAMPLES</td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="2">1.10</td>
                        <td colspan="2" rowspan="2">CytoGenetics</td>
                        <td>DELAYED REPORTS</td>
                        <td rowspan="2">% OUT OF TAT</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>TOTAL SAMPLES</td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="2">1.11</td>
                        <td colspan="2" rowspan="2">Genetics</td>
                        <td>DELAYED REPORTS</td>
                        <td rowspan="2">% OUT OF TAT</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">#DIV/0!</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                        <td><input type="text" name="" id=""></td>
                        <td rowspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>TOTAL SAMPLES</td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                    </tr>
                </tbody>


            </table>
        </div>




    </div>

</body>
<script>

</script>

</html>

@endsection