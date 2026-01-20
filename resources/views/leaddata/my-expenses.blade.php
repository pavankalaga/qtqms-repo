@extends('layouts.base')
@section('content')
<div class="container my-4 dash-container" style="width:80%;">
        <div class="table-title text-center mb-4">My Expenses</div>
        <table class="table table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>Check-in</th>
                    <th>--</th>
                    <th>--</th>
                    <th>--</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody id="expenses-body">
                <tr>
                    <td>8</td>
                    <td>1</td>
                    <td>300</td>
                    <td>300</td>
                    <td>01/11/24</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>1</td>
                    <td>300</td>
                    <td>300</td>
                    <td>02/11/24</td>
                </tr>
                <tr>
                    <td>A</td>
                    <td>0</td>
                    <td>300</td>
                    <td>0</td>
                    <td>03/11/24</td>
                </tr>
            </tbody>
        </table>
    </div>
    <style>
        .table-title{
        background: #010046;
        font-size: 1.8rem;
        color: #ffffff;
        border-radius: 5px; 
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