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

  .bdRow {
    border-bottom: 1px solid #ececec;
    margin-bottom: 20px;
    padding-bottom: 30px;
  }

  .acBtn {
    color: #fff;
    background: #0caf60
  }

  .bdRow:last-child {
    border-bottom: 0px;
  }

  .sbHd {
    width: 100px;
  }
  .fxInp{width: 400px;}
  .mrDSbHd{font-size:17px;font-weight:700;}
</style>
<section class="dash-container tab-content" id="relationTab">
  <div class=" dash-content tab-pane fade show active" id="business-details-tab" role="tabpanel" aria-labelledby="profile-tab">
    <div class="row">
      <div class="col-12">
        <form>
          <div id="general">
            <div class="col-xxl-12">
              <div id="tasks">
                <div class="col-md-12">
                  <div class="card table-card">
                    <div class="card-header">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <h5>Relationship</h5>
                        </div>
                      </div>
                    </div>
                    <div class="card-body pt-0 table-border-style bg-none">
                      <div class="">
                        <div class="row bdRow">
                          <div class="form-group col-lg-4 col-12">
                            <label class="col-form-label text-nowrap">Relationship Health</label>
                            <input type="text" class="form-control">
                          </div>
                          <div class="form-group   col-lg-4 col-12">
                            <label class="col-form-label text-nowrap">NPS </label>
                            <input type="text" class="form-control">
                          </div>
                          <div class="form-group  col-lg-4 col-12 d-flex align-items-center" style="padding-top:30px;">
                            <div class="form-check me-4">
                              <input class="form-check-input" type="checkbox" value="" id="lead">
                              <label class="form-check-label" for="lead">Lead</label>
                            </div>
                            <div class="form-check me-4">
                              <input class="form-check-input" type="checkbox" value="" id="lead">
                              <label class="form-check-label" for="lead">Opportunity</label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="lead">
                              <label class="form-check-label" for="lead">Account</label>
                            </div>
                          </div>
                          <div class="form-group   col-lg-4 col-12">
                            <button type="button" class="btn  btn-small mt-4 acBtn">Account Status</button>
                          </div>

                        </div>
                        <div class="row bdRow">
                          <div class="form-group  col-lg-4 col-12">
                            <label class="col-form-label whitespace-nowrap">Type of Customer </label>
                            <div class="flex-grow">
                              <select class="form-control">
                                <option> Select</option>
                                <option> Royal Customer</option>
                                <option> Impulse Customer</option>
                                <option> Discount Customer</option>
                                <option> Need Based Customer</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group col-lg-4 col-12">
                            <label class="col-form-label">Customer Categorisation</label>
                            <input type="text" class="form-control">
                          </div>
                          <div class="form-group col-lg-4 col-12">
                            <label class="col-form-label">Expectation of account classification</label>
                            <input type="text" class="form-control">
                          </div>
                          <div class="form-group col-lg-4 col-12">
                            <label class="col-form-label">Referal Source</label>
                            <input type="text" class="form-control">
                          </div>
                          <div class="form-group col-lg-4 col-12">
                            <label class="col-form-label">Name</label>
                            <input type="text" class="form-control ">
                          </div>
                          <div class="form-group col-lg-4 col-12">
                            <label class="col-form-label">Customer Status</label>
                            <input type="text" class="form-control ">
                          </div>
                          <div class="form-group col-lg-4 col-12">
                            <label class="col-form-label">Account Status</label>
                            <select class="form-control">
                              <option>Active</option>
                              <option> Sleep</option>
                              <option>Inactive</option>
                              <option> Deactivation</option>
                            </select>
                          </div>
                          <div class="form-group col-lg-4 col-12">
                            <label class="col-form-label">TDPL Code</label>
                            <input type="text" class="form-control ">
                          </div>
                          <div class="form-group col-lg-4 col-12">
                            <label class="col-form-label">Risk Profeling</label>
                            <input type="text" class="form-control ">
                          </div>
                          <div class="form-group col-lg-4 col-12">
                            <label class="col-form-label">Lead Status</label>
                            <input type="text" class="form-control ">
                          </div>
                          <div class="form-group col-lg-4 col-12">
                            <label class="col-form-label">Ownership Details</label>
                            <input type="text" class="form-control ">
                          </div>
                          <div class="form-group col-lg-4 col-12">
                            <label class="col-form-label">Number of mandatory Visits per Month</label>
                            <input type="text" class="form-control ">
                          </div>

                        </div>
                        <!-- row start here -->
                        <div class="row bdRow">
                          <div class="form-group col-lg-4 col-12">
                            <label class="col-form-label">Logistics Route</label>
                            <input type="text" class="form-control ">
                          </div>
                          <div class="form-group col-lg-4 col-12">
                            <label class="col-form-label">Kilometer from TDPL Lab</label>
                            <input type="text" class="form-control ">
                          </div>
                        </div>
                        <!-- row end here -->
                        <!-- row start here -->
                        <div class="row bdRow">
                          <div class="form-group col-lg-4 col-12">
                            <label class="col-form-label">Number of Visits</label>
                            <input type="text" class="form-control ">
                          </div>
                          <div class="form-group col-lg-4 col-12">
                            <label class="col-form-label">Number of Incoming Emails</label>
                            <input type="text" class="form-control ">
                          </div>
                          <div class="form-group col-lg-4 col-12">
                            <label class="col-form-label">Number of Outgoing Emails</label>
                            <input type="text" class="form-control ">
                          </div>
                          <div class="form-group col-lg-4 col-12">
                            <label class="col-form-label">Number of Calls Made</label>
                            <input type="text" class="form-control ">
                          </div>
                        </div>
                        <!-- row end here -->
                        <!-- row start here -->
                        <div class="row bdRow">
                          <div class="form-group col-lg-4 col-12">
                            <label class="col-form-label">Relationship Owner</label>
                            <input type="text" class="form-control ">
                          </div>
                          <div class="form-group col-lg-4 col-12">
                            <label class="col-form-label">Relationship Manager</label>
                            <input type="text" class="form-control ">
                          </div>
                          <div class="form-group col-lg-4 col-12">
                            <label class="col-form-label">Account Manager</label>
                            <input type="text" class="form-control ">
                          </div>
                          <div class="form-group col-lg-4 col-12">
                            <label class="col-form-label">Zonal Manager</label>
                            <input type="text" class="form-control ">
                          </div>
                        </div>
                        <!-- row end here -->

                        <!-- row start here -->
                        <div class="row bdRow">
                          <div class="col-6">
                            <div class="form-group  col-8">
                              <label class="col-form-label">Test classification Received from this client</label>
                              <select class="form-control ">
                                <option value="">Routine</option>
                                <option value="">Speciality</option>
                                <option value="">Super Speciality</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="d-flex col-12 mb-2">
                              <div class="col-5"></div>
                              <div class="col-3" style="margin-right:20px;">Quantity</div>
                              <div class="col-3">Value</div>
                            </div>
                            <div class="d-flex col-12 mb-2">
                              <div class="col-5">Customer LifeTime value</div>
                              <div class="col-3" style="margin-right:20px;"><input type="text" class="form-control "></div>
                              <div class="col-3"><input type="text" class="form-control "></div>
                            </div>
                            <div class="d-flex col-12 mb-2">
                              <div class="col-5">Average sales/Month</div>
                              <div class="col-3" style="margin-right:20px;"><input type="text" class="form-control "></div>
                              <div class="col-3"><input type="text" class="form-control "></div>
                            </div>
                            <div class="d-flex col-12 mb-2">
                              <div class="col-5">Sales Trend</div>
                              <div class="col-3" style="margin-right:20px;"><input type="text" class="form-control "></div>
                              <div class="col-3"><input type="text" class="form-control "></div>
                            </div>
                            <div class="d-flex col-12 mb-2">
                              <div class="col-5">Increase in Existing Test Sales</div>
                              <div class="col-3" style="margin-right:20px;"><input type="text" class="form-control "></div>
                              <div class="col-3"><input type="text" class="form-control "></div>
                            </div>
                            <div class="d-flex col-12 mb-2">
                              <div class="col-5">Increase in New Test Sales</div>
                              <div class="col-3" style="margin-right:20px;"><input type="text" class="form-control "></div>
                              <div class="col-3"><input type="text" class="form-control "></div>
                            </div>
                          </div>


                        </div>
                        <!-- row end here -->

                         <!-- row start here -->
                         <div class="row bdRow">
                          <div class="form-group col-12">
                            <label class="col-form-label">Number of Tickets Received</label>
                            <input type="text" class="form-control fxInp">
                          </div>
                          <div class="form-group  col-12">
                            <label class="col-form-label">Number of Complaints Received</label>
                            <input type="text" class="form-control fxInp">
                          </div>
                          <div class="form-group col-12">
                            <label class="col-form-label">Number of Complaints Resolved</label>
                            <input type="text" class="form-control fxInp">
                          </div>
                          <div class="form-group  col-12">
                            <label class="col-form-label">Customer Satisfaction index on Complaint Resolution</label>
                            <input type="text" class="form-control fxInp">
                          </div>
                        </div>
                        <!-- row end here -->

                         <!-- row start here -->
                         <div class="row bdRow">
                         <div class="mrDSbHd mb-2">Survey feedback Analysis</div>
                          <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">Number of Customer Participated this year</label>
                            <input type="text" class="form-control ">
                          </div>
                          <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">Number of Customer Survey's Participated during this Lifetime</label>
                            <input type="text" class="form-control ">
                          </div>
                          <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">Response Rate</label>
                            <input type="text" class="form-control ">
                          </div>
                          <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">Customer satisfaction score</label>
                            <input type="text" class="form-control ">
                          </div>
                          <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">Net Promoter Score</label>
                            <input type="text" class="form-control ">
                          </div>
                          <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">Customer Effort Score</label>
                            <input type="text" class="form-control ">
                          </div>
                          <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">Churn Prediction Score</label>
                            <input type="text" class="form-control ">
                          </div>
                          <div class="form-group col-lg-6 col-12">
                            <label class="col-form-label">Customer Lifetime value(CLV) Impact</label>
                            <input type="text" class="form-control ">
                          </div>
                        </div>
                        <!-- row end here -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>


@endsection