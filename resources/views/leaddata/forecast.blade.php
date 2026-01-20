@extends('layouts.base')
@section('content')
<style type="text/css">
    .required::after {
        Content: "*";
        Color: #f00;
    }

    .col-lg-4 {
        margin-bottom: 5px;
    }

    .dash-content {
        padding-top: 20px !important;
    }

    .dash-container {
        margin-left: 225px;
        margin-right: 25px;
    }

    .dash-container .dash-content {
        padding-right: 30px;
    }

    .table-card .card-header {
        background-color: #069acb !important;
    }

    .card .card-header h5 {
        color: #fff;
    }

    .w-80 {
        max-width: 80%;
    }

    .custom-select {
        max-width: max-content;
        margin: 0;
        position: absolute;
        top: 0;
        right: 0;
        border-left: none;
        outline: none;
        appearance: none;

    }

    .custom-number input::-webkit-outer-spin-button,
    .custom-number input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .custom-number label {
        min-width: 85px;
    }

    .custom-number input:focus {
        border: 1px solid #ced4da !important;
        box-shadow: none;
    }

    .custom-select {
        -webkit-appearance: none !important;
        -moz-appearance: none !important;
        text-indent: 1px !important;
        text-overflow: '' !important;
        appearance: none;
        background: #010046 !important;
        padding: 6px 4px;
        color: #fff;
    }

    .custom-select option {
        color: #fff;
    }

    .custom-form-check {
        width: 22px;
        height: 22px;
    }

    .custom-select:focus {
        border: none !important;
        box-shadow: none !important;
        color: #fff;
    }

    .mrDSbHd {
        font-size: 17px;
        font-weight: 700;
    }

    .thTd {
        font-weight: 600
    }
</style>


<div class="modal right fade " id="forecastModal" tabindex="-1" aria-labelledby="forecastModalLabel" aria-hidden="true"> 
    <div class="modal-dialog Forecast-Details" style="margin-right: 23px;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="forecastModalLabel">Forecast Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body forecast-body">
          <!-- Fourcast model start -->
        <section class="dash-container tab-content forecast-container">
    <div class=" dash-content tab-pane fade show active ">
        <div class="row">
            <div class="col-12">

                <div id="general">
                    <div class="col-xxl-12">
                        <div id="tasks">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card table-card">
                                            <div class="card-header">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h5>Previous Year</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body pt-0 table-border-style bg-none">
                                                <div class="">
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <div class="table-responsive">
                                                                <table class="table" id="datatable" width="100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th></th>
                                                                            <th colspan="3" class="text-center">Q1</th>
                                                                            <th colspan="3" class="text-center">Q2</th>
                                                                            <th colspan="3" class="text-center">Q3</th>
                                                                            <th colspan="3" class="text-center">Q4</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th></th>
                                                                            <th class="text-center">A</th>
                                                                            <th class="text-center">M</th>
                                                                            <th class="text-center">J</th>
                                                                            <th class="text-center">J</th>
                                                                            <th class="text-center">A</th>
                                                                            <th class="text-center">S</th>
                                                                            <th class="text-center">O</th>
                                                                            <th class="text-center">N</th>
                                                                            <th class="text-center">D</th>
                                                                            <th class="text-center">J</th>
                                                                            <th class="text-center">F</th>
                                                                            <th class="text-center">M</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="thTd">Number of Patient</td>
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
                                                                            <td class="thTd">Number of Tests</td>
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
                                                                            <td class="thTd">ARPD</td>
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
                                                                            <td class="thTd">ARPT</td>
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
                                                                            <td class="thTd">Gross Revenue</td>
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
                                                                            <td class="thTd">P:T Ratio</td>
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
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-2">
                                                            <div class="mrDSbHd">Individual Broadcast</div>
                                                            <div class="row">
                                                                <div class="form-group  col-12">
                                                                    <label class="col-form-label text-nowrap">P:T Ratio By</label>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                                <div class="form-group  col-12">
                                                                    <label class="col-form-label text-nowrap">Yearly Increase %</label>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=" dash-content tab-pane fade show active">
        <div class="row">
            <div class="col-12">

                <div id="general">
                    <div class="col-xxl-12">
                        <div id="tasks">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card table-card">
                                            <div class="card-header">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h5>Current Year</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body pt-0 table-border-style bg-none">
                                                <div class="">
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <div class="table-responsive">
                                                                <table class="table" id="datatable" width="100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th></th>
                                                                            <th colspan="3" class="text-center">Q1</th>
                                                                            <th colspan="3" class="text-center">Q2</th>
                                                                            <th colspan="3" class="text-center">Q3</th>
                                                                            <th colspan="3" class="text-center">Q4</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th></th>
                                                                            <th class="text-center">A</th>
                                                                            <th class="text-center">M</th>
                                                                            <th class="text-center">J</th>
                                                                            <th class="text-center">J</th>
                                                                            <th class="text-center">A</th>
                                                                            <th class="text-center">S</th>
                                                                            <th class="text-center">O</th>
                                                                            <th class="text-center">N</th>
                                                                            <th class="text-center">D</th>
                                                                            <th class="text-center">J</th>
                                                                            <th class="text-center">F</th>
                                                                            <th class="text-center">M</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="thTd">Number of Patient</td>
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
                                                                            <td class="thTd">Number of Tests</td>
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
                                                                            <td class="thTd">ARPD</td>
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
                                                                            <td class="thTd">ARPT</td>
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
                                                                            <td class="thTd">Gross Revenue</td>
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
                                                                            <td class="thTd">P:T Ratio</td>
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
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-2">
                                                            <div class="mrDSbHd">Individual Broadcast</div>
                                                            <div class="row">
                                                                <div class="form-group  col-12">
                                                                    <label class="col-form-label text-nowrap">P:T Ratio By</label>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                                <div class="form-group  col-12">
                                                                    <label class="col-form-label text-nowrap">Yearly Increase %</label>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" dash-content tab-pane fade show active">
        <div class="row">
            <div class="col-12">

                <div id="general">
                    <div class="col-xxl-12">
                        <div id="tasks">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card table-card">
                                            <div class="card-header">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h5>Next Year</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body pt-0 table-border-style bg-none">
                                                <div class="">
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <div class="table-responsive">
                                                                <table class="table" id="datatable" width="100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th></th>
                                                                            <th colspan="3" class="text-center">Q1</th>
                                                                            <th colspan="3" class="text-center">Q2</th>
                                                                            <th colspan="3" class="text-center">Q3</th>
                                                                            <th colspan="3" class="text-center">Q4</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th></th>
                                                                            <th class="text-center">A</th>
                                                                            <th class="text-center">M</th>
                                                                            <th class="text-center">J</th>
                                                                            <th class="text-center">J</th>
                                                                            <th class="text-center">A</th>
                                                                            <th class="text-center">S</th>
                                                                            <th class="text-center">O</th>
                                                                            <th class="text-center">N</th>
                                                                            <th class="text-center">D</th>
                                                                            <th class="text-center">J</th>
                                                                            <th class="text-center">F</th>
                                                                            <th class="text-center">M</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="thTd">Number of Patient</td>
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
                                                                            <td class="thTd">Number of Tests</td>
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
                                                                            <td class="thTd">ARPD</td>
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
                                                                            <td class="thTd">ARPT</td>
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
                                                                            <td class="thTd">Gross Revenue</td>
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
                                                                            <td class="thTd">P:T Ratio</td>
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
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-2">
                                                            <div class="mrDSbHd">Individual Broadcast</div>
                                                            <div class="row">
                                                                <div class="form-group  col-12">
                                                                    <label class="col-form-label text-nowrap">P:T Ratio By</label>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                                <div class="form-group  col-12">
                                                                    <label class="col-form-label text-nowrap">Yearly Increase %</label>
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
           <!-- Fourcast model end -->
        </div>
      </div>
    </div>
  </div>
  <style>
    #forecastModal .Forecast-Details {
    max-width: 100%;
    width:80% 
  }
  #forecastModal .forecast-body {
    width: 100%; 
  }
  .forecast-container{
    left: -226px;
    width: 100%;
  }
   /* Custom CSS to slide modal in from the right */
.modal.right .modal-dialog {
  position: fixed;
  top: 0;
  right: -100%; 
  height: 100%;
  width: 400px; 
  transition: right 0.5s ease-in-out; 
}

.modal.right.show .modal-dialog {
  right: 0; /* Slide in from the right */
}

.modal-dialog {
  margin: 0; /* Ensure no margin when sliding */
  height: 100vh;
}

.modal-body {
  padding: 20px;
  overflow-y: auto;
  /* Add any styling you need for modal content */
}
  </style>
@endsection