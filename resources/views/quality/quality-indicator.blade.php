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
        border: 1px solid #ddd !important;
    }

    .stock-planner-table th {
        background-color: #007BFF !important;
        color: white !important;
    }

    .form-container-search input[type="month"],
    .form-container-search select {
        padding: 10px;
        font-size: 14px !important;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
</style>

<body>
    <div class="main ">
        {{-- <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
            <div style="font-size: 20px;">Quality Indicator</div>
            <div style="font-size: 20px; " class="form-container-search">
                <select>
                    <option value="">-- Select Labs --</option>
                    <option value="pathology">Lab 1</option>
                    <option value="microbiology">Lab 2</option>
                    <option value="biochemistry">Lab 3</option>
                </select>
                <input type="month" class="form-input" name="" id="" style="height: fit-content;font-size: 16px;">

            </div>
            <!-- <button type="button" class="btn btn-warning" onclick="openDocument1()">Create</button> -->
        </div> --}}


        <div class="pivot-tabs">

            <button class="pivot-tab active" data-target="QIReport">QI Report </button>
            <button class="pivot-tab " data-target="PreAnalyticalQualityIndicator">Pre-Analytical Quality Indicator</button>
            <button class="pivot-tab" data-target="AnalyticalQualityIndicator">Analytical Quality Indicator</button>
            <button class="pivot-tab" data-target="PostAnalyticalQualityIndicator">Post-Analytical Quality Indicator</button>


        </div>


        <div class="pivot-content">
            <div class="pivot-panel" id="PreAnalyticalQualityIndicator">
                <div class="table-responsive">
                    <table class=" stock-planner-table">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Sample Rejections</th>
                                <th>Jan</th>
                                <th>Feb</th>
                                <th>Mar</th>
                                <th>Apr</th>
                                <th>May</th>
                                <th>Jun</th>
                                <th>Jul</th>
                                <th>Aug</th>
                                <th>Sep</th>
                                <th>Oct</th>
                                <th>Nov</th>
                                <th>Dec</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Samples Spilled during Transit</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Erroneous / Improper Test requests</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Wrong Sample Collected</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Samples Collected in Inappropriate Container</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Sample Leakages</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Samples Damaged in Transport</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Improperly Labelled Samples</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Sample Clotted</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Sample haemolysed</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Lipemic Sample</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>Total No of Rejections per month</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td>Total No of Rejections per month</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>13</td>
                                <td>Percentage of Rejections</td>
                                <td>#DIV/0!</td>
                                <td>#DIV/0!</td>
                                <td>#DIV/0!</td>
                                <td>#DIV/0!</td>
                                <td>#DIV/0!</td>
                                <td>#DIV/0!</td>
                                <td>#DIV/0!</td>
                                <td>#DIV/0!</td>
                                <td>#DIV/0!</td>
                                <td>#DIV/0!</td>
                                <td>#DIV/0!</td>
                                <td>#DIV/0!</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="pivot-panel " id="AnalyticalQualityIndicator">
                <div class="table-responsive">
                    <table class=" stock-planner-table">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>IT Issues</th>
                                <th>Jan</th>
                                <th>Feb</th>
                                <th>Mar</th>
                                <th>Apr</th>
                                <th>May</th>
                                <th>Jun</th>
                                <th>Jul</th>
                                <th>Aug</th>
                                <th>Sep</th>
                                <th>Oct</th>
                                <th>Nov</th>
                                <th>Dec</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Network Downtime</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>LIS Transfer Issues</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Total IT Issues Per Month</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="pivot-panel " id="PostAnalyticalQualityIndicator">
                <div class="table-responsive">
                    <table class=" stock-planner-table">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Tests Related Issues Categories</th>
                                <th>Jan</th>
                                <th>Feb</th>
                                <th>Mar</th>
                                <th>Apr</th>
                                <th>May</th>
                                <th>Jun</th>
                                <th>Jul</th>
                                <th>Aug</th>
                                <th>Sep</th>
                                <th>Oct</th>
                                <th>Nov</th>
                                <th>Dec</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>No. of Ticket Response Delays</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Percentage of Ticket Response Issues</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Total No of Ticket Response Issues Per Month</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Total No of Tickets Per Month</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Percentage of Ticket Response Issues</td>
                                <td>#DIV/0!</td>
                                <td>#DIV/0!</td>
                                <td>#DIV/0!</td>
                                <td>#DIV/0!</td>
                                <td>#DIV/0!</td>
                                <td>#DIV/0!</td>
                                <td>#DIV/0!</td>
                                <td>#DIV/0!</td>
                                <td>#DIV/0!</td>
                                <td>#DIV/0!</td>
                                <td>#DIV/0!</td>
                                <td>#DIV/0!</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>


    </div>

</body>
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
</script>

</html>

@endsection