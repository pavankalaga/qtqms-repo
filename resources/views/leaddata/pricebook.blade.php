@extends('layouts.base')
@section('content')

<div class="modal right fade " id="pricebookModal" tabindex="-1" aria-labelledby="pricebookModalLabel" aria-hidden="true"> 
    <div class="modal-dialog pricebook-Details" style="margin-right: 23px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pricebookModalLabel">Pricebook Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body forecast-body">
                <!-- price book start -->

                <div class="container dash-container">
                    <div class="col-12 mt-5">
                        <div class="table-title text-center mb-5">Price Book</div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Sl No.</th>
                                            <th>Test Code</th>
                                            <th>Test Name</th>
                                            <th>Method</th>
                                            <th>Listed L2L Price</th>
                                            <th>Customised Price</th>
                                        </tr>                   
                                    </thead>
                                <tbody>
                                    <tr>
                                        <td>001</td>
                                        <td>Test A</td>
                                        <td>Method 1</td>
                                        <td>$100</td>
                                        <td>$120</td>
                                        <td>20%</td>
                                    </tr>
                                    <tr>
                                        <td>002</td>
                                        <td>Test B</td>
                                        <td>Method 2</td>
                                        <td>$200</td>
                                        <td>$250</td>
                                        <td>25%</td>
                                    </tr>
                                    <!-- Add more rows as needed -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- price book end --->
            </div>
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
    table {
            background-color: #ffffff; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        }
        th, td {
            text-align: center;
        }
        th {
            background-color: #e8f5e9 !important; 
            color:#ffffff;
        }
        tr:hover {
            background-color: #f1f1f1; 
        }

  #pricebookModal .pricebook-Details {
    max-width: 100%;
    width:80% 
  }
  #pricebookModal .pricebook-body {
    width: 100%; 
  }
  .pricebook-container{
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
  height: 100%;
}

.modal-body {
  padding: 20px;
  /* Add any styling you need for modal content */
}
</style>

@endsection