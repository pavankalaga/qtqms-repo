@extends('layouts.base')
@section('content')


<style>
       #activityModal .activity-Details {
    max-width: 100%;
    width:80% 
  }
  #activityModal .activity-body {
    width: 100%; 
  }
  .activity-container{
    left: -226px;
    width: 100%;
  }
    .my-4{
        width:100%;
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
    margin: 0 10px;
    text-align: center;
    cursor: pointer;
}
.text-nowrap{
    font-size:1.8rem;
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
<div class="modal right fade " id="activityModal" tabindex="-1" aria-labelledby="activityModalLabel" aria-hidden="true"> 
    <div class="modal-dialog activity-Details" style="margin-right: 23px;">
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="activityModalLabel">activity Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
                <div class="modal-body activity-body">
                    <!-- activity start -->
                    <div class="row container my-4 dash-container text-center" style="left:-23%;">
                                  
                                  <div class="form-group  col-12">
                                      <label class="col-form-label mb-3 text-nowrap">Activity</label>
                                          <div class="d-flex justify-content-center align-items-center">
                                              <div class="crdM"><div><i class="fa-solid fa-cloud mb-2"></i><br> Email </div></div>
                                              <div class="crdM"><div><i class="fa-solid fa-cloud mb-2"></i><br> To-Do-List </div></div>
                                              <div class="crdM"><div><i class="fa-solid fa-cloud mb-2"></i><br> Marketing </div></div>
                                          </div>
                                  </div>
                                          
                              </div>
                  <!-- activity end -->
                </div>
        </div>
    </div>

</div>                      
@endsection