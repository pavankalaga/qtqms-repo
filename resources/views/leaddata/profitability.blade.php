@extends('layouts.base')
@section('content')
<div class="container dash-container">
        <!-- Main content section -->
        <div class="col-12 mt-5">
            <!-- Table Title with Background Color -->
            <div class="table-title text-center mb-3">Profitability</div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <th>Sl No.</th>
                            <th>Test Code</th>
                            <th>Test Name</th>
                            <th>Method</th>
                            <th>Listed L2L Price</th>
                            <th>Customised Price</th>
                            <th>Profitability</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>1</td>
                            <td>TC001</td>
                            <td>Blood Test</td>
                            <td>Automated</td>
                            <td>$100</td>
                            <td>$120</td>
                            <td>20%</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>TC002</td>
                            <td>Urine Test</td>
                            <td>Manual</td>
                            <td>$150</td>
                            <td>$170</td>
                            <td>13.33%</td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
</div>
<style>
    .container{
        width:80%;
    }
    .table-title{
        background: #010046;
        font-size: 1.8rem;
        color: #ffffff;
        border-radius: 5px; 
    }
    .me-5{
        margin: right 180px;
    }
    tbody tr:hover {
        background-color: #f1f1f1 !important; 
        transition: background-color 0.3s ease;
    }
    th{
        background:#b9f6ca !important;
    }
</style>
@endsection