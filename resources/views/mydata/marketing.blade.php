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

  #modal-right {
    margin-left: auto;
    margin-right: 0;
    position: relative;
    top: 0;
    right: 0;
    height: 100%;
    max-width: 900px;
  }

  .mrD.modal {
    z-index: 9999;
  }

  #marketingDialog .modal-dialog {
    transform: translateX(100%);
    transition: transform 0.3s ease-in-out;
  }


  #marketingDialog.show .modal-dialog {
    transform: translateX(0);
  }

  #marketingDialog .modal-content {
    display: flex;
    flex-direction: column;
    border: 0px;
    border-radius: 0px;
  }

  #marketingDialog .modal-body {
    overflow-y: auto;
    flex-grow: 1;
  }

  .mrDSbHd {
    font-size: 17px;
    font-weight: 700;
  }

  .crdM {
    width: 200px;
    height: 100px;
    background: #000;
    background: #010046;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 6px;
    margin-right: 10px;
    text-align: center;
    cursor: pointer;
  }
</style>
<div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 my-activity-title mb-4">
  <div style="font-size: 20px;">Marketing</div>

</div>
<section class="dash-container tab-content" id="marketingTab">
  <div class=" dash-content tab-pane fade show active">
    <div class="row">
      <div class="col-12">
        <form>
          <div id="general">
            <div class="col-xxl-12">
              <div id="tasks">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card table-card">
                        <!-- <div class="card-header">
                          <div class="d-flex justify-content-between align-items-center">
                            <div>
                              <h5>Marketing</h5>
                            </div>
                          </div>
                        </div> -->
                        <div class="card-body pt-0 table-border-style bg-none">
                          <div class="">
                            <div class="row">

                              <div class="form-group  col-12">
                                <label class="col-form-label text-nowrap">Create Campaign</label>
                                <div class="d-flex">

                                  <div data-bs-toggle="modal" data-bs-target="#marketingDialog" class="crdM">
                                    <div><i class="fa-solid fa-cloud mb-2"></i></br> Email Campaign</div>
                                  </div>
                                  <div data-bs-toggle="modal" data-bs-target="#marketingDialog" class="crdM">
                                    <div><i class="fa-solid fa-cloud mb-2"></i></br> WhatsApp Campaign</div>
                                  </div>
                                  <div data-bs-toggle="modal" data-bs-target="#marketingDialog" class="crdM">
                                    <div><i class="fa-solid fa-cloud mb-2"></i></br> SMS Campaign</div>
                                  </div>
                                </div>
                              </div>
                              <hr style="margin-top: 0.8rem;">
                              <div class="form-group  col-12">
                                <label class="col-form-label text-nowrap">Customer Actions</label>
                                <div>
                                  <div data-bs-toggle="modal" data-bs-target="#marketingDialog" class="crdM">
                                    <div>Send Feedback forms</div>
                                  </div>

                                </div>
                              </div>
                              <hr style="margin-top: 0.8rem;">
                              <div class="form-group  col-12">
                                <label class="col-form-label text-nowrap">Sales Boost</label>
                                <div>
                                  <div data-bs-toggle="modal" data-bs-target="#marketingDialog" class="crdM">Specials</div>
                                </div>
                              </div>
                              <hr style="margin-top: 0.8rem;">
                              <div class="form-group  col-12">
                                <label class="col-form-label text-nowrap">Wishing on a Special Occassion</label>
                                <div class="d-flex">
                                  <div data-bs-toggle="modal" data-bs-target="#marketingDialog" class="crdM">Birthday</div>
                                  <div data-bs-toggle="modal" data-bs-target="#marketingDialog" class="crdM">Anniversary</div>
                                  <div data-bs-toggle="modal" data-bs-target="#marketingDialog" class="crdM">Religious</div>
                                  <div data-bs-toggle="modal" data-bs-target="#marketingDialog" class="crdM">Special Occassion</div>
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
    </div>
  </div>
</section>


<div class="modal fade mrD" id="marketingDialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" id="modal-right">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Campaign</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="d-flex">
          <div class="col-8">
            <div class="mrDSbHd">Group Broadcast</div>
            <div class="row ">
              <div class="form-group  col-11">
                <label class="col-form-label text-nowrap">Select Segment</label>
                <select class="form-control"></select>
              </div>
              <div class="form-group  col-11">
                <label class="col-form-label text-nowrap">Select Business Type</label>
                <select class="form-control"></select>
              </div>
              <div class="form-group  col-11">
                <label class="col-form-label text-nowrap">New Deal Name</label>
                <input type="text" class="form-control">
              </div>
              <div class="form-group  col-11">
                <div class="d-flex">
                  <div class="col-6 pe-1">
                    <label class="col-form-label text-nowrap">Broadcast Date</label>
                    <input type="date" class="form-control">
                  </div>
                  <div class="col-6 ps-1">
                    <label class="col-form-label text-nowrap">Broadcast Time</label>
                    <input type="text" class="form-control">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="mrDSbHd">Individual Broadcast</div>
            <div class="row">
              <div class="form-group  col-12">
                <label class="col-form-label text-nowrap">Sales Name</label>
                <input type="text" class="form-control">
              </div>
            </div>
          </div>
        </div>
        <div>
          <div class="mrDSbHd ">Automatical</div>
          <div class="d-flex" style="margin-top:10px;">
            <div class="col-8">
              <div class="row ">
                <div class="form-group  col-11">
                  <label class="col-form-label text-nowrap"></label>
                  <select class="form-control" style="margin-top:7px;">
                    <option value="" disabled selected>Select All the Contacts with Birthdays in the Month</option>
                  </select>
                </div>
                <div class="form-group  col-11">
                  <select class="form-control">
                    <option value="" disabled selected>Select All the Contacts with Anniversary in the Month</option>
                  </select>
                </div>
                <div class="form-group  col-11" style="margin-top:10px;">
                  <label class="col-form-label text-nowrap"></label>
                  <select class="form-control">
                    <option value="" disabled selected>Send Message on the day of occassion</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="row">
                <div class="form-group  col-12">
                  <label class="col-form-label text-nowrap" style="padding-top:0px;">Attach Predesign file</label>
                  <input type="text" class="form-control">
                </div>
                <div class="form-group  col-12">
                  <input type="text" class="form-control">
                </div>
                <div class="form-group  col-12">
                  <label class="col-form-label text-nowrap" style="padding-top:0px;">Attach Deals</label>
                  <input type="text" class="form-control">
                </div>
                <div class="form-group  col-12">
                  <input type="text" class="form-control">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<script>
  var screen_height = $(window).height() - 136;
  $('#marketingDialog .modal-body').css({
    'height': screen_height
  });
</script>
@endsection