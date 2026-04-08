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
</style>
<div class="right-nav-fixed">
  <div class="tr-bg-sidenav-item">
    <span class="d-flex align-items-center gap-3">
      <i class="fa-solid fa-house"></i> Dashboard </span>
  </div>
  <div class="tr-bg-sidenav-item">
    <span class="d-flex align-items-center gap-3">
      <i class="fa-regular fa-chart-bar"></i> Activity </span>
  </div>
  <div class="tr-bg-sidenav-item">
    <span class="d-flex align-items-center gap-3">
      <i class="fa-regular fa-handshake"></i> Relationship </span>
  </div>
  <div class="tr-bg-sidenav-item">
    <span class="d-flex align-items-center gap-3">
      <i class="fa-regular fa-file"></i> Documents </span>
  </div>
  <div class="tr-bg-sidenav-item">
    <span class="d-flex align-items-center gap-3">
      <i class="fa-solid fa-bullhorn"></i> Marketing </span>
  </div>
  <div class="tr-bg-sidenav-item">
    <span class="d-flex align-items-center gap-3">
      <i class="fa-solid fa-pencil"></i> Notes </span>
  </div>
  <div class="tr-bg-sidenav-item">
    <span class="d-flex align-items-center gap-3">
      <i class="fa-solid fa-book"></i> Price Book </span>
  </div>
  <div class="tr-bg-sidenav-item">
    <span class="d-flex align-items-center gap-3">
      <i class="fa-solid fa-dollar-sign"></i> Profitability </span>
  </div>
  <div class="tr-bg-sidenav-item" data-bs-toggle="modal" data-bs-target="#forecastModal">
    <span class="d-flex align-items-center gap-3">
      <i class="fa-solid fa-signal"></i> Forecast </span>
  </div>
</div>
<div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2" id="new-second-nav">
  <div class="user-section">
    <span class="tr-username">
      <i class="far fa-user-circle"></i> Madhu </span>
  </div>
  <div class="d-flex gap-2 align-items-center flex-grow-2 justify-content-end">
    <div class="dropdown">
      <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"> Create </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li onclick="openPopup()">
          <div class="dropdown-item">Lead</div>
        </li>
        <li>
          <a class="dropdown-item" href="#">Account</a>
        </li>
        <li>
          <a class="dropdown-item" href="#">Contact</a>
        </li>
      </ul>
    </div>
    <div class="position-relative d-flex">
      <input class="form-control form-control-search me-2" type="search" placeholder="Search" aria-label="Search">
      <span class="search-span">
        <i class="fa-solid fa-magnifying-glass"></i>
      </span>
    </div>
  </div>
</div>
<div class="tr-triple-nav">
  <div class="row mx-0 justify-content-center">
    <div class="col-12 text-center p-0 mt-3 mb-2">
      <div class="card px-0 pt-2 pb-0 mt-1 mb-2">
        <form id="msform">
          <!-- progressbar -->
          <ul id="progressbar">
            <li class="active" id="account">
              <strong>Lead</strong>
            </li>
            <li id="personal">
              <strong>Qualifying</strong>
            </li>
            <li id="payment">
              <strong>Opportunity</strong>
            </li>
            <li id="confirm">
              <strong>Account</strong>
            </li>
            <li id="followUp">
              <strong>Ongoing</strong>
            </li>
          </ul>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="tr-triple-nav">
  <div class="row mx-0 main-menu nav nav-tabs" id="myTab" role="tablist">
    <div class="tr-20 active" id="tr-details-tab" data-bs-toggle="tab" data-bs-target="#business-details-tab" type="button" role="tab" aria-controls="profile" aria-selected="false">
      <li>Business Details</li>
    </div>
    <div class="tr-20" id="tr-profile-tab" data-bs-toggle="tab" data-bs-target="#business-needs-tab" type="button" role="tab" aria-controls="profile" aria-selected="false">
      <li>Needs & Preferences</li>
    </div>
    <div class="tr-20">
      <li> Price Quotes</li>
    </div>
    <div class="tr-20">
      <li>Sales</li>
    </div>
    <li class="tr-20 br-none">Time Capsule</li>
  </div>
</div>
<section class="dash-container tab-content">
  <div class=" dash-content tab-pane fade show active" id="business-details-tab" role="tabpanel" aria-labelledby="profile-tab">
    <div class="row">
      <div class="col-12 mb-3">
        <div class="row">
          <div class="col-12">
            <form action="{{route('lead.save')}}" method="post"> @csrf <div id="general">
                <div class="col-xxl-12">
                  <div id="tasks">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card table-card">
                            <div class="card-header">
                              <div class="d-flex justify-content-between align-items-center">
                                <div>
                                  <h5>Business Details</h5>
                                </div>
                              </div>
                            </div>
                            <div class="card-body pt-0 table-border-style bg-none">
                              <div class="">
                                <div class="row">
                                  <div class="form-group col-lg-4 col-12">
                                    <label for="business_type" class="col-form-label text-nowrap required">Business Type: </label>
                                    <select id="business_type" name="business_type" class="form-control" name="business_type">
                                      <option value="">Select Business Type</option>
                                      <option value="Hospital">Hospital</option>
                                      <option value="Diagnostic Center">Diagnostic Center</option>
                                      <option value="Independent Doctor">Independent Doctor</option>
                                      <option value="Registered Medical Practitioner"> Registered Medical Practitioner</option>
                                      <option value="Clinic">Clinic</option>
                                      <option value="Clinical Research Business"> Clinical Research Business</option>
                                      <option value="Government Agency">Government Agency</option>
                                    </select> @error('business_type') <span class="text-danger small">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="form-group   col-lg-4 col-12">
                                    <label for="legal_business_type" class="col-form-label text-nowrap required">Legal Business Type: </label>
                                    <select id="legal_business_type" name="legal_business_type" class="form-control" name="legal_business_type">
                                      <option value="">Select Legal Business Type </option>
                                      <option value="Incorporated">Incorporated </option>
                                      <option value="Partnership">Partnership</option>
                                      <option value="LLP">LLP</option>
                                      <option value="Sole Proprietor">Sole Proprietor </option>
                                    </select> @error('legal_business_type') <span class="text-danger small">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="form-group  col-lg-4 col-12">
                                    <label for="business_name" class=" whitespace-nowrap col-form-label required"> Registered Business Name: </label>
                                    <div class="flex-grow">
                                      <input type="text" class="form-control" id="business_name" name="business_name" placeholder="Enter Your Registered Business Name" name="business_name" required> @error('business_name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                  </div>
                                  <div class="form-group  col-lg-4 col-12">
                                    <label for="business_name" class="col-form-label whitespace-nowrap"> Trading Name: </label>
                                    <div class="flex-grow">
                                      <input type="text" class="form-control" id="business_name" name="business_name" placeholder="Enter Your Trading Name" name="business_name"> @error('business_name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                  </div>
                                  <div class="form-group  col-lg-4 col-12">
                                    <label for="registered_no" class="col-form-label whitespace-nowrap">Registered No: </label>
                                    <div class="flex-grow">
                                      <input type="text" class="form-control" id="registered_no" placeholder="Enter Your Registered No" name="registered_no"> @error('registered_no') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                  </div>
                                  <div class="form-group  col-lg-4 col-12">
                                    <label for="registered_no" class="col-form-label whitespace-nowrap">Registration Expiry : </label>
                                    <div class="flex-grow">
                                      <input type="date" class="form-control" id="registered_no_expiry" name="registered_no_expiry"> @error('registered_no') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                  </div>
                                  <div class="form-group col-lg-4 col-12">
                                    <label for="incorporation_date" class="col-form-label">Incorporation Date:</label>
                                    <input type="date" id="incorporation_date" class="form-control" name="incorporation_date"> @error('incorporation_date') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="form-group col-lg-4 col-12">
                                    <label for="incorporation_no" class="col-form-label">INC No:</label>
                                    <input type="number" id="incorporation_no" placeholder="Enter Your Inc No" class="form-control" name="incorporation_no"> @error('incorporation_no') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="form-group col-lg-4 col-12">
                                    <label for="incorporation_no" class="col-form-label">INC State:</label>
                                    <select class="form-control">
                                      <option> Select</option>
                                    </select>
                                  </div>
                                  <div class="form-group col-lg-4 col-12">
                                    <label for="pan_no" class="col-form-label">PAN No:</label>
                                    <input type="text" class="form-control small-placeholder" id="pan_no" placeholder="Enter Your PAN No" name="pan_no"> @error('pan_no') <span class="text-danger small">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="form-group col-lg-4 col-12">
                                    <label for="tan_no" class="col-form-label">TAN No:</label>
                                    <input type="text" class="form-control small-placeholder" id="tan_no" placeholder="Enter Your TAN No" name="tan_no"> @error('tan_no') <span class="text-danger small">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="form-group col-lg-4 col-12">
                                    <label for="tan_no" class="col-form-label">GST No:</label>
                                    <input type="text" class="form-control small-placeholder" id="tan_no" placeholder="Enter Your GST No" name="tan_no"> @error('tan_no') <span class="text-danger small">{{ $message }}</span> @enderror
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
                                  <h5>Address Details</h5>
                                </div>
                              </div>
                            </div>
                            <div class="card-body pt-0 table-border-style bg-none">
                              <div class="">
                                <div class="row">
                                  <div class="form-group col-lg-4">
                                    <label for="address" class="col-form-label">Address 1: </label>
                                    <input type="text" class="form-control small-placeholder" id="address" placeholder="Enter Address" name="address"> @error('address') <span class="text-danger small">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="form-group col-lg-4">
                                    <label for="address" class="col-form-label">Address 2: </label>
                                    <input type="text" class="form-control small-placeholder" id="address" placeholder="Enter Address" name="address"> @error('address') <span class="text-danger small">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="form-group col-lg-4 col-12">
                                    <label for="city" class="col-form-label">City: </label>
                                    <input type="text" class="form-control small-placeholder" id="city" placeholder="City" name="city"> @error('city') <span class="text-danger small">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="form-group col-lg-4 col-12">
                                    <label for="city" class="col-form-label">State: </label>
                                    <input type="text" class="form-control small-placeholder" id="state" placeholder="State" name="state"> @error('city') <span class="text-danger small">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="form-group col-lg-4 col-12">
                                    <label for="pincode" class="col-form-label">Pincode: </label>
                                    <input type="number" class="form-control small-placeholder" id="pincode" placeholder="Pincode" name="pincode" minlength="6" maxlength="6"> @error('pincode') <span class="text-danger small">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="form-group col-lg-4 col-12">
                                    <label for="pincode" class="col-form-label">Sales HeadQuarters: </label>
                                    <select name="salesheadquarter" class="form-select ">
                                      <option selected>Choose...</option> @foreach ($sales_head_quarters as $sales) <option value="{{ $sales->id }}">
                                        {{ $sales->name }}
                                      </option> @endforeach
                                    </select> @error('pincode') <span class="text-danger small">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="form-group col-lg-4 col-12">
                                    <label for="phone" class="col-form-label">Phone: </label>
                                    <input type="number" class="form-control small-placeholder" id="phone" placeholder="Enter Your Phone Number" name="phone" minlength="10" maxlength="10" /> @error('phone') <span class="text-danger small">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="form-group col-lg-4 col-12">
                                    <label for="alternate_phone" class="col-form-label">Alternative Phone: </label>
                                    <input type="number" class="form-control small-placeholder" id="alternate_phone" placeholder="Alternate Phone" name="alternate_phone" minlength="10" maxlength="10"> @error('alternate_phone') <span class="text-danger small">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="form-group col-lg-4 col-12">
                                    <label for="alternate_phone" class="col-form-label">Whatsapp No: </label>
                                    <input type="number" class="form-control small-placeholder" id="company_whatsapp" placeholder="Enter Whatsapp Number" name="company_whatsapp" minlength="10" maxlength="10"> @error('alternate_phone') <span class="text-danger small">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="form-group col-lg-4 col-12">
                                    <label for="email" class="col-form-label">Email: </label>
                                    <input type="email" class="form-control small-placeholder" id="email" placeholder="Enter Your Email" name="email" /> @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="form-group col-lg-4 col-12">
                                    <label for="website" class="col-form-label">Website: </label>
                                    <input type="text" class="form-control small-placeholder" id="website" placeholder="Website" name="website"> @error('website') <span class="text-danger small">{{ $message }}</span> @enderror
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
              <div id="social-media-details">
                <div class="row pt-0">
                  <div class="col-md-12">
                    <div class="card table-card">
                      <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h5>Social Media Details</h5>
                          </div>
                        </div>
                      </div>
                      <div class="card-body pt-0 table-border-style bg-none">
                        <div class="row">
                          <div class="form-group col-lg-4 col-12">
                            <label for="website" class="col-form-label">Facebook: </label>
                            <input type="text" class="form-control small-placeholder" id="facebook" placeholder="Enter Facebook URL" name="website"> @error('website') <span class="text-danger small">{{ $message }}</span> @enderror
                          </div>
                          <div class="form-group col-lg-4 col-12">
                            <label for="website" class="col-form-label">Instagram: </label>
                            <input type="text" class="form-control small-placeholder" id="Instagram" placeholder="Enter Instagram URL" name="Instagram"> @error('website') <span class="text-danger small">{{ $message }}</span> @enderror
                          </div>
                          <div class="form-group col-lg-4 col-12">
                            <label for="website" class="col-form-label">Twitter: </label>
                            <input type="text" class="form-control small-placeholder" id="Twitter" placeholder="Enter Twitter URL" name="Twitter"> @error('website') <span class="text-danger small">{{ $message }}</span> @enderror
                          </div>
                          <div class="form-group col-lg-4 col-12">
                            <label for="website" class="col-form-label">Linkedin: </label>
                            <input type="text" class="form-control small-placeholder" id="Linkedin" placeholder="Enter Linkedin URL" name="Linkedin"> @error('website') <span class="text-danger small">{{ $message }}</span> @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="users-products mb-0">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card table-card deal-card">
                      <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h5>Contact Details</h5>
                          </div>
                        </div>
                      </div>
                      <div class="card-body pt-0 table-border-style bg-none">
                        <div id="business-contacts-container">
                          <div class="row new-contact-row">
                            <div class="form-group col-sm-6 col-lg-4">
                              <label for="salutation" class="col-form-label">salutation : </label>
                              <select id="salutation" class="form-control select2" name="salutation">
                                <option value="">Select salutation</option>
                                <option value="Dr.">Dr.</option>
                                <option value="Mr.">Mr.</option>
                                <option value="Mrs.">Mrs.</option>
                                <option value="Ms.">Ms.</option>
                              </select> @error('salutation') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 col-lg-4">
                              <label for="first_name" class="col-form-label">First Name</label>
                              <input type="first_name" class="form-control small-placeholder" id="first_name" placeholder="Enter First Name" name="first_name"> @error('first_name') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-lg-4">
                              <label for="last_name" class="col-form-label">Last Name</label>
                              <input type="text" class="form-control small-placeholder" id="last_name" placeholder="Enter Last Name" name="last_name"> @error('last_name') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 col-lg-4">
                              <label for="department" class="col-form-label">Department</label>
                              <input type="text" class="form-control small-placeholder" id="department" placeholder="Enter Department" name="department"> @error('department') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 col-lg-4">
                              <label for="designation" class="col-form-label">Designation</label>
                              <input type="text" class="form-control small-placeholder" id="designation" placeholder="Enter Designation" name="designation"> @error('designation') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 col-lg-4">
                              <label for="designation" class="col-form-label">Authority</label>
                              <input type="text" class="form-control small-placeholder" id="designation" placeholder="Enter Authority" name="Authority"> @error('designation') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 col-lg-4">
                              <label for="mobile_no" class="col-form-label">Mobile No</label>
                              <input type="number" class="form-control small-placeholder" id="mobile_no" maxlength="10" minlength="10" placeholder="Enter Mobile No." name="mobile_no"> @error('mobile_no') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 col-lg-4">
                              <label for="office_phone" class="col-form-label">Whatsapp No </label>
                              <input type="number" minlength="10" maxlength="10" class="form-control small-placeholder" id="office_phone" placeholder="Enter Whatsapp Number" name="office_phone"> @error('office_phone') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 col-lg-4">
                              <label for="office_phone" class="col-form-label">Office Phone </label>
                              <input type="number" minlength="10" maxlength="10" class="form-control small-placeholder" id="office_phone" placeholder="Enter Office Phone Number" name="office_phone"> @error('office_phone') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 col-lg-4">
                              <label for="office_email" class="col-form-label">Office Email</label>
                              <input type="email" class="form-control small-placeholder" id="office_email" placeholder="Enter Office Email" name="office_email"> @error('office_email') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 col-lg-4">
                              <label for="office_email" class="col-form-label">Personal Email</label>
                              <input type="email" class="form-control small-placeholder" id="office_email" placeholder="Enter Personal Email" name="office_email"> @error('office_email') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 col-lg-4">
                              <label for="office_email" class="col-form-label">Facebook Id</label>
                              <input type="text" class="form-control small-placeholder" id="office_email" placeholder="Enter Facebook Id" name="office_email"> @error('office_email') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 col-lg-4">
                              <label for="office_email" class="col-form-label">Instagram Id</label>
                              <input type="text" class="form-control small-placeholder" id="office_email" placeholder="Enter Instagram Id" name="office_email"> @error('office_email') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 col-lg-4">
                              <label for="office_email" class="col-form-label">Twitter (X)</label>
                              <input type="text" class="form-control small-placeholder" id="office_email" placeholder="Enter Twitter Id" name="office_email"> @error('office_email') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 col-lg-4">
                              <label for="office_email" class="col-form-label">Linkedin</label>
                              <input type="text" class="form-control small-placeholder" id="office_email" placeholder="Enter Linkedin Id" name="office_email"> @error('office_email') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 col-lg-4">
                              <label for="office_email" class="col-form-label">Birthday</label>
                              <input type="date" class="form-control small-placeholder" id="office_email" name="office_email"> @error('office_email') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 col-lg-4">
                              <label for="office_email" class="col-form-label">Anniversary</label>
                              <input type="date" class="form-control small-placeholder" id="office_email" name="office_email"> @error('office_email') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 col-lg-4">
                              <label for="office_email" class="col-form-label">Religious Belief</label>
                              <input type="text" class="form-control small-placeholder" id="office_email" placeholder="Enter Religious Belief" name="office_email"> @error('office_email') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-sm-6 col-lg-4">
                              <label for="office_email" class="col-form-label">Upload photo</label>
                              <input type="file" class="form-control small-placeholder" id="office_email" name="contact_photo"> @error('office_email') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div>
                            <button class="btn btn-outline-dark mt-3" id="add_more_contact" style="min-width:120px;min-height: 42px;font-size:16px">
                              <i class="fa-solid fa-plus me-1"></i> Add more </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="discussion-notes">
                <div class="row pt-0">
                  <div class="col-md-12">
                    <div class="card table-card">
                      <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h5>Description</h5>
                          </div>
                        </div>
                      </div>
                      <div class="card-body pt-0 table-border-style bg-none">
                        <div class="">
                          <div class="form-group row">
                            <label for="remark_description" class="col-sm-10 col-form-label">Description</label>
                            <div class="col-sm-10">
                              <textarea type="text" class="form-control small-placeholder" cols="2" rows="4" id="remark_description" placeholder="Enter details" name="remark_description"></textarea> @error('remark_description')
                              <!-- Validation error for remark_description -->
                              <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                          </div>
                        </div>
                        <button class="btn btn-lg btn-success" role="button" type="submit" style="min-width:120px;min-height: 42px;font-size:16px">Submit</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="dash-content tab-pane fade" id="business-needs-tab" role="tabpanel" aria-labelledby="profile-tab">
    <div class="row mb-3">
      <div class="col-12">
        <div id="sources-emails">
          <div class="row pt-2">
            <div class="col-md-12">
              <div class="card table-card">
                <div class="card-header">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <h5>Sample Testing Capability</h5>
                    </div>
                  </div>
                </div>
                <div class="card-body pt-0 table-border-style bg-none">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="inc" class="col-form-label">Inhouse Processing Capability</label>
                        <div class="inc-id-check d-flex align-items-center gap-3 pt-1">
                          <div class="form-check d-flex align-items-center gap-2">
                            <input class="form-check-input custom-form-check" type="checkbox" name="inCheck" value="yes" checked id="flexCheckDefault" onclick="toggleCheckbox(this)" />
                            <label class="form-check-label" for="flexCheckDefault"> Yes </label>
                          </div>
                          <div class="form-check d-flex align-items-center gap-2">
                            <input class="form-check-input custom-form-check" type="checkbox" name="inCheck" value="no" id="flexCheckChecked" onclick="toggleCheckbox(this)" />
                            <label class="form-check-label" for="flexCheckChecked"> No </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="lab_departments" class="col-form-label">Lab Departments</label>
                      <textarea class="form-control" name="lab_departments"></textarea>
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="lab_equipments" class="col-form-label">Lab Equipments</label>
                      <textarea class="form-control" name="lab_equipments"></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row pt-2">
            <div class="col-md-12">
              <div class="card table-card">
                <div class="card-header">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <h5>Inhouse Test</h5>
                    </div>
                  </div>
                </div>
                <div class="card-body pt-0 table-border-style bg-none">
                  <div class="row">
                    <div class="col-md-4 form-group">
                      <label for="inhouse_test_volume" class="col-form-label">Inhouse Test Volume per Month</label>
                      <input type="number" class="form-control small-placeholder" name="inhouse_test_volume" id="inhouse_test_volume">
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="outsource_test_volume" class="col-form-label">Outsource Test Volume per Month</label>
                      <input type="number" class="form-control small-placeholder" name="outsource_test_volume" id="outsource_test_volume">
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="daily_patient_footfall" class="col-form-label">Daily patient Footfall</label>
                      <input type="number" class="form-control small-placeholder" name="daily_patient_footfall" id="daily_patient_footfall">
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="inhouse_test_value" class="col-form-label">Inhouse Test Value per Month</label>
                      <input type="number" class="form-control small-placeholder" name="inhouse_test_value" id="inhouse_test_value">
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="outsource_test_value" class="col-form-label">Outsource Test Value per Month</label>
                      <input type="number" class="form-control small-placeholder" name="outsource_test_value" id="outsource_test_value">
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="annual_lab_revenue" class="col-form-label">Annual Lab Revenue</label>
                      <input type="number" class="form-control small-placeholder" name="annual_lab_revenue" id="annual_lab_revenue">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row pt-2">
            <div class="col-md-12">
              <div class="card table-card">
                <div class="card-header">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <h5>Inpatient</h5>
                    </div>
                  </div>
                </div>
                <div class="card-body pt-0 table-border-style bg-none">
                  <div class="row">
                    <div class="col-md-4 form-group">
                      <label for="no_of_beds" class="col-form-label">No. of Beds</label>
                      <input type="number" class="form-control small-placeholder" name="no_of_beds" id="no_of_beds">
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="no_of_doctors" class="col-form-label">No. of Doctors</label>
                        <div class="">
                          <input type="text" class="form-control small-placeholder" id="no_of_doctors" placeholder="Enter No. of Doctors" name="no_of_doctors"> @error('no_of_doctors')
                          <!-- Validation error for no_of_doctors -->
                          <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="hos_revenue" class="col-form-label">Annual Hospital Revenue</label>
                        <div class="">
                          <input type="text" class="form-control small-placeholder" id="hos_revenue" placeholder="Enter hospital revenue" name="hos_revenue"> @error('no_of_doctors')
                          <!-- Validation error for no_of_doctors -->
                          <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <div class="col-sm-12">
                          <table class="table table-bordered align-items-center table-sm" id="expected-speciality-table">
                            <thead>
                              <tr>
                                <th>S.No</th>
                                <th style="width:30%;max-width:30%">Medical Speciality</th>
                                <th>Name of Doctor/s</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td style="width:30%;max-width:30%">
                                  <input type="text" name="expected_speciality[0][speciality_name]" class="form-control">
                                </td>
                                <td>
                                  <input type="text" name="expected_speciality[0][doctor_name]" class="form-control">
                                </td>
                              </tr>
                            </tbody>
                            <tfoot>
                              <tr>
                                <td colspan="6" class="text-right">
                                  <button type="button" class="btn btn-info" id="add-row-new">+ Add Row</button>
                                </td>
                              </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row pt-2">
            <div class="col-md-12">
              <div class="card table-card">
                <div class="card-header">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <h5>Diagnostic Needs</h5>
                    </div>
                  </div>
                </div>
                <div class="card-body pt-0 table-border-style bg-none">
                  <div class="row pt-2">
                    <div class="col-md-3 form-group">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="inCheck" value="routine" checked id="flexCheckDiagnostic" />
                        <label class="form-check-label" for="routine"> Routine </label>
                      </div>
                    </div>
                    <div class="col-md-3 form-group">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="inCheck" value="speciality" id="flexCheckDiagnostic" />
                        <label class="form-check-label" for="speciality"> Speciality </label>
                      </div>
                    </div>
                    <div class="col-md-3 form-group">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="inCheck" value="super_speciality" checked id="flexCheckDiagnostic" />
                        <label class="form-check-label" for="super_speciality"> Super Speciality </label>
                      </div>
                    </div>
                    <div class="col-md-3 form-group">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="inCheck" value="genetics" checked id="flexCheckDiagnostic" />
                        <label class="form-check-label" for="genetics"> Genetics </label>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <div class="col-sm-12" style="max-width:100%;overflow:auto;box-sizing: border-box;">
                          <table class="table table-bordered align-items-center table-sm" id="expected-diagnostic-table" style="max-width: 100%;overflow: auto;">
                            <thead>
                              <tr>
                                <th>S.No</th>
                                <th style="min-width:250px">Test Name</th>
                                <th style="min-width:200px">Method</th>
                                <th style="max-width:140px;min-width:110px; white-space: normal;">Current Load / month</th>
                                <th>In house</th>
                                <th>Outsource</th>
                                <th style="min-width:190px">Outsource To</th>
                                <th style="max-width:140px;min-width:110px;white-space: normal;text-align: center;">Current L2L Price</th>
                                <th style="max-width:140px;min-width:110px;white-space: normal;text-align: center;">Expected L2L Price</th>
                                <th>Expected Revenue</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td>
                                  <input type="text" name="expected_business[0][test_name]" class="form-control">
                                </td>
                                <td>
                                  <input type="number" name="expected_business[0][expected_qty_day]" class="form-control">
                                </td>
                                <td>
                                  <input type="number" name="expected_business[0][expected_l2l_price]" class="form-control">
                                </td>
                                <td class="text-center">
                                  <input type="checkbox" name="expected_diagnostic[0][inhouse]" style="width:20px;height: 20px;">
                                </td>
                                <td class="text-center">
                                  <input type="checkbox" name="expected_diagnostic[0][outsource]" style="width:20px;height: 20px;">
                                </td>
                                <td>
                                  <input type="number" name="expected_business[0][total]" class="form-control">
                                </td>
                                <td>
                                  <input type="number" name="expected_business[0][total]" class="form-control">
                                </td>
                                <td>
                                  <input type="number" name="expected_business[0][total]" class="form-control">
                                </td>
                                <td>
                                  <input type="number" name="expected_business[0][total]" class="form-control">
                                </td>
                              </tr>
                            </tbody>
                            <tfoot>
                              <tr>
                                <td colspan="6" class="text-right">
                                  <button type="button" class="btn btn-info" id="add-row-diagnostic">+ Add Row</button>
                                </td>
                              </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row pt-2">
            <div class="col-md-12">
              <div class="card table-card">
                <div class="card-header">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <h5>Current Service Challenges</h5>
                    </div>
                  </div>
                </div>
                <div class="card-body pt-0 table-border-style bg-none">
                  <div class="row pt-2">
                    <div class="form-group col-sm-6 col-md-4">
                      <input type="text" class="form-control small-placeholder" id="challenges_faced" placeholder="Enter Challenges" name="challenges_faced[]">
                    </div>
                    <div class="form-group col-sm-6 col-md-4">
                      <input type="text" class="form-control small-placeholder" id="challenges_faced" placeholder="Enter Challenges" name="challenges_faced[]">
                    </div>
                    <div class="form-group col-sm-6 col-md-4">
                      <input type="text" class="form-control small-placeholder" id="challenges_faced" placeholder="Enter Challenges" name="challenges_faced[]">
                    </div>
                    <div class="form-group col-sm-6 col-md-4">
                      <input type="text" class="form-control small-placeholder" id="challenges_faced" placeholder="Enter Challenges" name="challenges_faced[]">
                    </div>
                    <div class="form-group col-sm-6 col-md-4">
                      <input type="text" class="form-control small-placeholder" id="challenges_faced" placeholder="Enter Challenges" name="challenges_faced[]">
                    </div>
                    <div class="form-group col-sm-6 col-md-4">
                      <input type="text" class="form-control small-placeholder" id="challenges_faced" placeholder="Enter Challenges" name="challenges_faced[]">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row pt-2">
            <div class="col-md-12">
              <div class="card table-card">
                <div class="card-header">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <h5>Service Expectation</h5>
                    </div>
                  </div>
                </div>
                <div class="card-body pt-0 table-border-style bg-none">
                  <div class="row pt-2">
                    <h3 style="font-size:24px">Logistics</h3>
                    <div class="col-md-12 d-flex form-group">
                      <div class="col-md-6">
                        <label class="col-form-label" style="font-size: 20px;text-decoration: underline;text-align: center;width: 100%;margin-bottom: 16px;"> Weekdays</label>
                        <div style="border-right: 1px solid #eee;">
                          <div class="col-md-12">
                            <div class="form-group d-flex align-items-center gap-2">
                              <label for="no_of_doctors" class="col-form-label">Open timings from</label>
                              <div class="d-flex align-items-center gap-2">
                                <input type="text" class="form-control small-placeholder" id="open_timings_from" name="open_timings_from" style="max-width:65px;max-height: 35px;">
                                <span>AM</span>
                              </div>
                              <label for="no_of_doctors" class="col-form-label">to</label>
                              <div class="d-flex align-items-center gap-2">
                                <input type="text" class="form-control small-placeholder" id="open_timings_to" name="open_timings_to" style="max-width:65px;max-height: 35px;">
                                <span>PM</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12 form-group d-flex align-items-center gap-2">
                            <label for="no_of_pickup" class="col-form-label">No of pickup's required</label>
                            <input type="text" class="form-control small-placeholder" id="no_of_pickup" name="no_of_pickup" style="max-width:65px;max-height: 35px;">
                            <span>per day</span>
                          </div>
                          <div class="col-md-12 form-group d-flex flex-column align-items-start gap-2">
                            <label for="no_of_pickup" class="col-form-label">Preferred pickup timings </label>
                            <div class="d-flex flex-column gap-1">
                              <div class="custom-number d-flex align-items-center gap-2">
                                <label class="col-form-label">1st pickup </label>
                                <div class="position-relative">
                                  <input type="text" class="form-control small-placeholder" id="no_of_pickup" name="no_of_pickup" style="max-width:100px;padding-right: 40px;">
                                  <select id="business_type" name="business_type" class="form-control custom-select" name="business_type">
                                    <option value="Hospital">AM</option>
                                    <option value="Diagnostic Center">PM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="custom-number d-flex align-items-center gap-2">
                                <label class="col-form-label">2nd pickup </label>
                                <div class="position-relative">
                                  <input type="text" class="form-control small-placeholder" id="no_of_pickup" name="no_of_pickup" style="max-width:100px;padding-right: 40px;">
                                  <select id="business_type" name="business_type" class="form-control custom-select" name="business_type">
                                    <option value="Hospital">AM</option>
                                    <option value="Diagnostic Center">PM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="custom-number d-flex align-items-center gap-2">
                                <label class="col-form-label">3rd pickup </label>
                                <div class="position-relative ">
                                  <input type="text" class="form-control small-placeholder" id="no_of_pickup" name="no_of_pickup" style="max-width:100px;padding-right: 40px;">
                                  <select id="business_type" name="business_type" class="form-control custom-select" name="business_type">
                                    <option value="Hospital">AM</option>
                                    <option value="Diagnostic Center">PM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="custom-number d-flex align-items-center gap-2">
                                <label class="col-form-label">4th pickup </label>
                                <div class="position-relative ">
                                  <input type="text" class="form-control small-placeholder" id="no_of_pickup" name="no_of_pickup" style="max-width:100px;padding-right: 40px;">
                                  <select id="business_type" name="business_type" class="form-control custom-select" name="business_type">
                                    <option value="Hospital">AM</option>
                                    <option value="Diagnostic Center">PM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="custom-number d-flex align-items-center gap-2">
                                <label class="col-form-label">5th pickup </label>
                                <div class="position-relative ">
                                  <input type="text" class="form-control small-placeholder" id="no_of_pickup" name="no_of_pickup" style="max-width:100px;padding-right: 40px;">
                                  <select id="business_type" name="business_type" class="form-control custom-select" name="business_type">
                                    <option value="Hospital">AM</option>
                                    <option value="Diagnostic Center">PM</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 ps-3">
                        <label class="col-form-label" style="font-size: 20px;text-decoration: underline;text-align: center;width: 100%;margin-bottom: 16px;"> Sunday/Public meetings</label>
                        <div>
                          <div class="col-md-12">
                            <div class="form-group d-flex align-items-center gap-2">
                              <label for="no_of_doctors" class="col-form-label">Open timings from</label>
                              <div class="d-flex align-items-center gap-2">
                                <input type="text" class="form-control small-placeholder" id="open_timings_from" name="open_timings_from" style="max-width:65px;max-height: 35px;">
                                <span>AM</span>
                              </div>
                              <label for="no_of_doctors" class="col-form-label">to</label>
                              <div class="d-flex align-items-center gap-2">
                                <input type="text" class="form-control small-placeholder" id="open_timings_to" name="open_timings_to" style="max-width:65px;max-height: 35px;">
                                <span>PM</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12 form-group d-flex align-items-center gap-2">
                            <label for="no_of_pickup" class="col-form-label">No of pickup's required</label>
                            <input type="number" class="form-control small-placeholder" id="no_of_pickup" name="no_of_pickup" style="max-width:65px;max-height: 35px;">
                            <span>per day</span>
                          </div>
                          <div class="col-md-12 form-group d-flex flex-column align-items-start gap-2">
                            <label for="no_of_pickup" class="col-form-label">Preferred pickup timings </label>
                            <div class="d-flex flex-column gap-1">
                              <div class="custom-number d-flex align-items-center gap-2">
                                <label class="col-form-label">1st pickup </label>
                                <div class="position-relative">
                                  <input type="text" class="form-control small-placeholder" id="no_of_pickup" name="no_of_pickup" style="max-width:100px;padding-right: 40px;">
                                  <select id="business_type" name="business_type" class="form-control custom-select" name="business_type">
                                    <option value="Hospital">AM</option>
                                    <option value="Diagnostic Center">PM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="custom-number d-flex align-items-center gap-2">
                                <label class="col-form-label">2nd pickup </label>
                                <div class="position-relative">
                                  <input type="text" class="form-control small-placeholder" id="no_of_pickup" name="no_of_pickup" style="max-width:100px;padding-right: 40px;">
                                  <select id="business_type" name="business_type" class="form-control custom-select" name="business_type">
                                    <option value="Hospital">AM</option>
                                    <option value="Diagnostic Center">PM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="custom-number d-flex align-items-center gap-2">
                                <label class="col-form-label">3rd pickup </label>
                                <div class="position-relative ">
                                  <input type="text" class="form-control small-placeholder" id="no_of_pickup" name="no_of_pickup" style="max-width:100px;padding-right: 40px;">
                                  <select id="business_type" name="business_type" class="form-control custom-select" name="business_type">
                                    <option value="Hospital">AM</option>
                                    <option value="Diagnostic Center">PM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="custom-number d-flex align-items-center gap-2">
                                <label class="col-form-label">4th pickup </label>
                                <div class="position-relative ">
                                  <input type="text" class="form-control small-placeholder" id="no_of_pickup" name="no_of_pickup" style="max-width:100px;padding-right: 40px;">
                                  <select id="business_type" name="business_type" class="form-control custom-select" name="business_type">
                                    <option value="Hospital">AM</option>
                                    <option value="Diagnostic Center">PM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="custom-number d-flex align-items-center gap-2">
                                <label class="col-form-label">5th pickup </label>
                                <div class="position-relative ">
                                  <input type="text" class="form-control small-placeholder" id="no_of_pickup" name="no_of_pickup" style="max-width:100px;padding-right: 40px;">
                                  <select id="business_type" name="business_type" class="form-control custom-select" name="business_type">
                                    <option value="Hospital">AM</option>
                                    <option value="Diagnostic Center">PM</option>
                                  </select>
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
          <div class="row">
            <div class="col-md-12">
              <div class="card table-card">
                <div class="card-body pt-0 table-border-style bg-none">
                  <div class="col-12 py-2 d-flex">
                    <div class="col-6 pt-2">
                      <h3 style="font-size:24px;margin-bottom: 16px;">Home Collection Requirement</h3>
                      <div class="d-flex align-items-center justify-content-between w-80">
                        <div class="form-check d-flex align-items-center gap-2">
                          <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNew" value="yes" checked id="flexCheckDefault" onclick="toggleCheckbox2(this)" />
                          <label class="form-check-label" for="flexCheckDefault"> Definitely Needed </label>
                        </div>
                        <div class="form-check d-flex align-items-center gap-2">
                          <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNew" value="preferred" id="flexCheckDefault" onclick="toggleCheckbox2(this)" />
                          <label class="form-check-label" for="flexCheckDefault"> Preferred </label>
                        </div>
                        <div class="form-check d-flex align-items-center gap-2">
                          <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNew" value="no" id="flexCheckDefault" onclick="toggleCheckbox2(this)" />
                          <label class="form-check-label" for="flexCheckDefault"> Not Needed </label>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 pt-2">
                      <h3 style="font-size:24px;margin-bottom: 16px;">IT Integration Required</h3>
                      <div class="d-flex align-items-center justify-content-between w-80">
                        <div class="form-check d-flex align-items-center gap-2">
                          <input class="form-check-input custom-form-check" type="checkbox" name="inCheckIt" value="yes" checked id="flexCheckDefault" onclick="toggleCheckbox3(this)" />
                          <label class="form-check-label" for="flexCheckDefault"> Definitely Needed </label>
                        </div>
                        <div class="form-check d-flex align-items-center gap-2">
                          <input class="form-check-input custom-form-check" type="checkbox" name="inCheckIt" value="preferred" id="flexCheckDefault" onclick="toggleCheckbox3(this)" />
                          <label class="form-check-label" for="flexCheckDefault"> Preferred </label>
                        </div>
                        <div class="form-check d-flex align-items-center gap-2">
                          <input class="form-check-input custom-form-check" type="checkbox" name="inCheckIt" value="no" id="flexCheckDefault" onclick="toggleCheckbox3(this)" />
                          <label class="form-check-label" for="flexCheckDefault"> Not Needed </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card table-card">
                <div class="card-body pt-0 table-border-style bg-none">
                  <div class="col-12 py-2 d-flex">
                    <div class="col-6 pt-2">
                      <h3 style="font-size:24px;margin-bottom: 16px;">NABL Certification Requirement</h3>
                      <div class="d-flex align-items-center justify-content-between w-80">
                        <div class="form-check d-flex align-items-center gap-2">
                          <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNabl" value="yes" checked id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                          <label class="form-check-label" for="flexCheckDefault"> Definitely Needed </label>
                        </div>
                        <div class="form-check d-flex align-items-center gap-2">
                          <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNabl" value="preferred" id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                          <label class="form-check-label" for="flexCheckDefault"> Preferred </label>
                        </div>
                        <div class="form-check d-flex align-items-center gap-2">
                          <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNabl" value="no" id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                          <label class="form-check-label" for="flexCheckDefault"> Not Needed </label>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 pt-2">
                      <h3 style="font-size:24px;margin-bottom: 16px;">NABL Accreditation Required</h3>
                      <div class="d-flex align-items-center justify-content-between w-80">
                        <div class="form-check d-flex align-items-center gap-2">
                          <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNablAc" value="yes" checked id="flexCheckDefault" onclick="toggleCheckbox5(this)" />
                          <label class="form-check-label" for="flexCheckDefault"> Definitely Needed </label>
                        </div>
                        <div class="form-check d-flex align-items-center gap-2">
                          <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNablAc" value="preferred" id="flexCheckDefault" onclick="toggleCheckbox5(this)" />
                          <label class="form-check-label" for="flexCheckDefault"> Preferred </label>
                        </div>
                        <div class="form-check d-flex align-items-center gap-2">
                          <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNablAc" value="no" id="flexCheckDefault" onclick="toggleCheckbox5(this)" />
                          <label class="form-check-label" for="flexCheckDefault"> Not Needed </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card table-card">
                <div class="card-header">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <h5>Customer Persona</h5>
                    </div>
                  </div>
                </div>
                <div class="card-body pt-0 table-border-style bg-none d-flex">
                  <div class="col-6 mb-0 py-2 d-flex flex-column form-group">
                    <h3 style="font-size:24px;margin-bottom: 16px;"> Is the Customer TAT Sensitive : </h3>
                    <div class="d-flex align-items-center justify-content-between w-80 gap-3">
                      <div class="form-check d-flex align-items-center gap-2">
                        <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNabl" value="yes" checked id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                        <label class="form-check-label" for="flexCheckDefault"> Highly </label>
                      </div>
                      <div class="form-check d-flex align-items-center gap-2">
                        <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNabl" value="yes" id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                        <label class="form-check-label" for="flexCheckDefault"> Moderate </label>
                      </div>
                      <div class="form-check d-flex align-items-center gap-2">
                        <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNabl" value="yes" id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                        <label class="form-check-label" for="flexCheckDefault"> Less </label>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 mb-0 py-2 d-flex flex-column form-group">
                    <h3 style="font-size:24px;margin-bottom: 16px;"> Is the Customer willing to pay for expedited TAT : </h3>
                    <div class="d-flex align-items-center justify-content-between w-80 gap-3">
                      <div class="form-check d-flex align-items-center gap-2">
                        <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNabl" value="yes" checked id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                        <label class="form-check-label" for="flexCheckDefault"> Highly </label>
                      </div>
                      <div class="form-check d-flex align-items-center gap-2">
                        <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNabl" value="yes" id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                        <label class="form-check-label" for="flexCheckDefault"> Moderate </label>
                      </div>
                      <div class="form-check d-flex align-items-center gap-2">
                        <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNabl" value="yes" id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                        <label class="form-check-label" for="flexCheckDefault"> Less </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card table-card">
                <div class="card-body pt-0 table-border-style bg-none d-flex">
                  <div class="col-6 mb-0 py-2 d-flex flex-column form-group">
                    <h3 style="font-size:24px;margin-bottom: 16px;"> Is the Customer Quality Focus : </h3>
                    <div class="d-flex align-items-center justify-content-between w-80 gap-3">
                      <div class="form-check d-flex align-items-center gap-2">
                        <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNabl" value="yes" checked id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                        <label class="form-check-label" for="flexCheckDefault"> Highly </label>
                      </div>
                      <div class="form-check d-flex align-items-center gap-2">
                        <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNabl" value="yes" id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                        <label class="form-check-label" for="flexCheckDefault"> Moderate </label>
                      </div>
                      <div class="form-check d-flex align-items-center gap-2">
                        <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNabl" value="yes" id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                        <label class="form-check-label" for="flexCheckDefault"> Less </label>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="col-6 mb-0 py-2 d-flex flex-column form-group">
                      <h3 style="font-size:24px;margin-bottom: 16px;"> Is the Customer Price Sensitive : </h3>
                      <div class="d-flex align-items-center justify-content-between w-80 gap-3">
                          <div class="form-check d-flex align-items-center gap-2">
                            <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNabl" value="yes" checked id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                            <label class="form-check-label" for="flexCheckDefault"> Highly </label>
                          </div>                           
                          <div class="form-check d-flex align-items-center gap-2">
                            <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNabl" value="yes" id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                            <label class="form-check-label" for="flexCheckDefault"> Moderate </label>
                          </div>                           
                          <div class="form-check d-flex align-items-center gap-2">
                            <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNabl" value="yes" id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                            <label class="form-check-label" for="flexCheckDefault"> Less </label>
                          </div> 
                      </div>
                    </div> -->
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="card table-card">
                <div class="card-body pt-0 table-border-style bg-none d-flex">
                  <div class="col-6 mb-0 py-2 d-flex flex-column form-group">
                    <h3 style="font-size:24px;margin-bottom: 16px;"> Is the Customer Price Sensitive : </h3>
                    <div class="d-flex align-items-center justify-content-between w-80 gap-3">
                      <div class="form-check d-flex align-items-center gap-2">
                        <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNabl" value="yes" checked id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                        <label class="form-check-label" for="flexCheckDefault"> Highly </label>
                      </div>
                      <div class="form-check d-flex align-items-center gap-2">
                        <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNabl" value="yes" id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                        <label class="form-check-label" for="flexCheckDefault"> Moderate </label>
                      </div>
                      <div class="form-check d-flex align-items-center gap-2">
                        <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNabl" value="yes" id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                        <label class="form-check-label" for="flexCheckDefault"> Less </label>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="col-6 mb-0 py-2 d-flex flex-column form-group">
                      <h3 style="font-size:24px;margin-bottom: 16px;"> Is the Customer Price Sensitive : </h3>
                      <div class="d-flex align-items-center justify-content-between w-80 gap-3">
                          <div class="form-check d-flex align-items-center gap-2">
                            <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNabl" value="yes" checked id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                            <label class="form-check-label" for="flexCheckDefault"> Highly </label>
                          </div>                           
                          <div class="form-check d-flex align-items-center gap-2">
                            <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNabl" value="yes" id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                            <label class="form-check-label" for="flexCheckDefault"> Moderate </label>
                          </div>                           
                          <div class="form-check d-flex align-items-center gap-2">
                            <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNabl" value="yes" id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                            <label class="form-check-label" for="flexCheckDefault"> Less </label>
                          </div> 
                      </div>
                    </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card table-card">
              <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h5>Financial Preferences</h5>
                  </div>
                </div>
              </div>
              <div class="card-body pt-0 table-border-style bg-none">
                <div class="row">
                  <h3 style="font-size:24px;margin-bottom: 16px;"> Payment Preference </h3>
                  <div class="d-flex align-items-center justify-content-between w-80 gap-3 form-group">
                    <div class="form-check d-flex align-items-center gap-2">
                      <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNabl" value="yes" checked id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                      <label class="form-check-label" for="flexCheckDefault"> Cash </label>
                    </div>
                    <div class="form-check d-flex align-items-center gap-2">
                      <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNabl" value="yes" id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                      <label class="form-check-label" for="flexCheckDefault"> Credit </label>
                    </div>
                    <div class="form-check d-flex align-items-center gap-2">
                      <label class="form-check-label" for="flexCheckDefault" style="white-space: nowrap;"> Payment Term</label>
                      <input type="number" name="payment_term" class="form-control" style="max-width:80px">
                      <span>Days</span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <h3 style="font-size:24px;margin-bottom: 16px;"> Payment Method Preference </h3>
                  <div class="d-flex align-items-center justify-content-between w-80 gap-3 form-group">
                    <div class="form-check d-flex align-items-center gap-2">
                      <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNabl" value="yes" checked id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                      <label class="form-check-label" for="flexCheckDefault"> Bank Transfer </label>
                    </div>
                    <div class="form-check d-flex align-items-center gap-2">
                      <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNabl" value="yes" id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                      <label class="form-check-label" for="flexCheckDefault"> Cheque </label>
                    </div>
                    <div class="form-check d-flex align-items-center gap-2">
                      <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNabl" value="yes" id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                      <label class="form-check-label" for="flexCheckDefault"> UPI </label>
                    </div>
                    <div class="form-check d-flex align-items-center gap-2">
                      <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNabl" value="yes" id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                      <label class="form-check-label" for="flexCheckDefault"> Credit Card </label>
                    </div>
                    <div class="form-check d-flex align-items-center gap-2">
                      <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNabl" value="yes" id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                      <label class="form-check-label" for="flexCheckDefault"> Online Deposit Via IT Dose </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card table-card">
              <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h5>Discount Needs</h5>
                  </div>
                </div>
              </div>
              <div class="card-body pt-0 table-border-style bg-none">
                <div class="row pt-2">
                  <div class="d-flex align-items-center justify-content-between w-80 gap-3 form-group">
                    <div class="form-check d-flex align-items-center gap-2">
                      <label class="form-check-label" for="flexCheckDefault" style="margin-right: 50px"> Seeking Volume Discount </label>
                      <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNabl" value="yes" checked id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                    </div>


                    <div class="form-check d-flex align-items-center gap-2">
                      <label class="form-check-label" for="flexCheckDefault" style="padding-right: 1px"> Expected Volume(Samples) per Month </label>
                      <input type="text" class="form-control" name="pref_day" style="width: 150px" />
                    </div>
                    <div class="form-check d-flex align-items-center gap-2">
                      <label class="form-check-label" for="flexCheckDefault" style="padding-right: 60px"> Expected Value(Rs) per Month </label>
                      <input type="text" class="form-control" name="pref_day" style="width: 150px" />
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card table-card">
              <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h5>Communication Preferences</h5>
                  </div>
                </div>
              </div>
              <div class="card-body pt-0 table-border-style bg-none">
                <div class="row pt-2">
                  <div class="d-flex align-items-center justify-content-between w-80 gap-3 form-group">
                    <div class="form-check d-flex align-items-center gap-2">
                      <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNabl" value="yes" checked id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                      <label class="form-check-label" for="flexCheckDefault"> Email </label>
                    </div>
                    <div class="form-check d-flex align-items-center gap-2">
                      <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNabl" value="yes" id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                      <label class="form-check-label" for="flexCheckDefault"> Phone </label>
                    </div>
                    <div class="form-check d-flex align-items-center gap-2">
                      <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNabl" value="yes" id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                      <label class="form-check-label" for="flexCheckDefault"> SMS </label>
                    </div>
                    <div class="form-check d-flex align-items-center gap-2">
                      <input class="form-check-input custom-form-check" type="checkbox" name="inCheckNabl" value="yes" id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                      <label class="form-check-label" for="flexCheckDefault"> WhatsApp </label>
                    </div>
                  </div>
                </div>
                <div class="row pt-2">
                  <h3 style="font-size:24px;margin-bottom: 16px;"> Preferred Meeting Time </h3>
                  <div class="d-flex align-items-center justify-content-between w-80 gap-3 form-group">
                    <div class="form-check d-flex align-items-center gap-2 ps-0">
                      <label class="form-check-label" for="flexCheckDefault"> Day </label>
                      <input type="text" style="min-width: 380px;" class="form-control" name="pref_day" />
                    </div>
                    <div class="form-check d-flex align-items-center gap-2">
                      <label class="form-check-label" for="flexCheckDefault"> Time </label>
                      <input type="text" class="form-control" name="pref_day" />
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


  <div id="close" class="closeBtn" onclick="closePopup()">
    X
  </div>
  <div id="popup" class="popup">
    <div style="position: relative; height:95%">


      <div class="mb-4 my-activity-title" style="margin-top: 1.9rem;">
        <div style="font-size: 20px;">Create Tour Plan</div>
      </div>
      <!-- <h3 class="mb-3"></h3> -->
      <form class="mb-4">

        <!-- Date -->
        <div class="row">
          <div class="form-group mb-3 col-md-3">
            <label for="employee-name" class="col-form-label">Employee Name</label>
            <input type="text" id="Employee-Name" placeholder="Employee Name" class="form-control">
          </div>
          <div class="form-group mb-3 col-md-3">
            <label for="date" class="col-form-label">Date</label>
            <input type="date" id="date" placeholder="Date" class="form-control">
          </div>

          <!-- Place Worked -->
          <div class="form-group mb-3 col-md-3">
            <label for="time" class="col-form-label">Place Of Work</label>
            <!-- <input type="text" id="location" placeholder="Place Of Work" class="form-control"> -->
            <select id="place-of-work" class="form-select form-control">
              <option value="" disabled selected>Select type</option>
              <option value="HQ">HQ</option>
              <option value="EX HQ">EX HQ</option>
              <option value="OutStation">OutStation</option>
            </select>
          </div>
          <div class="form-group mb-3 col-md-3">
            <label for="full-day-joint-work" class="col-form-label">Full-Day-Joint-Work</label><br>
            <input type="checkbox" style="height: 20px;width: 20px;" id="html" name="fav_language" value="yes" class="form-check-input custom-form-check"> <label class="me-2" for="html">Yes</label>
            <input type="checkbox" style="height: 20px;width: 20px;" id="css" name="fav_language" value="no" class="form-check-input custom-form-check"> <label for="css">No</label>
            <!-- <input type="radio" value="Yes" id="full-day-joint-work-yes" placeholder="Full-Day-Joint-Work" class="form-control">
            <input type="radio" value="No" id="full-day-joint-work-no" placeholder="Full-Day-Joint-Work" class="form-control"> -->
          </div>

        </div>
        <button style="float:inline-end" class="btn btn-primary mb-3"><svg style="width: 22px; height:25px" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
          </svg></button>
        <!-- Submit Button -->
      </form>
      <button style="position: absolute;bottom: 16px;" type="button" class="btn btn-primary btn1 w-100" onclick="closePopup()">Submit</button>
    </div>
  </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
  .popup {

    overflow: auto;
    top: 50px;
    position: fixed;
    /* top: 0; */
    right: -100%;
    width: calc(100% - 283px);
    height: 90%;
    background: #f8f9fa;
    box-shadow: -2px 0px 5px rgba(0, 0, 0, 0.3);
    padding: 0 20px;
    transition: 0.5s ease;
  }

  .popup.open {
    right: 0;
    bottom: 0;
    margin: 20px;
  }

  .closeBtn {
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
  }

  .closeBtn.opened {
    right: calc(100% - 263px);
    top: 113px;
  }

  #popup input {
    border-radius: 0;
  }
</style>
<script>
  function openPopup() {
    document.getElementById('popup').classList.add('open');
    document.getElementById('close').classList.add('opened');
  }

  function closePopup() {
    document.getElementById('popup').classList.remove('open');
    document.getElementById('close').classList.remove('opened');

  }
</script>

<script>
  $(document).ready(function() {
    let rowCount = 1;

    // Add Row
    $('#add-row').click(function() {
      let newRow = `
                <tr>
                    <td>${++rowCount}</td>
                    <td><input type="text" name="expected_business[${rowCount}][test_name]" class="form-control"></td>
                    <td><input type="number" name="expected_business[${rowCount}][expected_qty_day]" class="form-control"></td>
                    <td><input type="number" name="expected_business[${rowCount}][expected_l2l_price]" class="form-control"></td>
                    <td><input type="number" name="expected_business[${rowCount}][amount]" class="form-control"></td>
                    <td><input type="number" name="expected_business[${rowCount}][total]" class="form-control"></td>
                    <td><button type="button" class="btn btn-danger btn-small remove-row">&times;</button></td>
                </tr>
            `;
      $('#expected-business-table tbody').append(newRow);
    });
    $('#add-row-diagnostic').click(function() {
      let newRow = `
                <tr>
                    <td>${++rowCount}</td>
                    <td><input type="text" name="expected_business[${rowCount}][test_name]" class="form-control"></td>
                    <td><input type="number" name="expected_business[${rowCount}][expected_qty_day]" class="form-control"></td>
                    <td><input type="number" name="expected_business[${rowCount}][expected_l2l_price]" class="form-control"></td>
                    <td class="text-center"><input type="checkbox" name="expected_business[${rowCount}][amount]" style="width:20px;height: 20px;"></td>
                    <td class="text-center"><input type="checkbox" name="expected_business[${rowCount}][total]" style="width:20px;height: 20px;"></td>
                    <td><input type="number" name="expected_business[${rowCount}][total]" class="form-control"></td>
                    <td><input type="number" name="expected_business[${rowCount}][total]" class="form-control"></td>
                    <td><input type="number" name="expected_business[${rowCount}][total]" class="form-control"></td>
                    <td><input type="number" name="expected_business[${rowCount}][total]" class="form-control"></td>
                </tr>
            `;
      $('#expected-diagnostic-table tbody').append(newRow);
    });
    $('#add-row-new').click(function() {
      let newRow = `
                <tr>
                    <td>${++rowCount}</td>
                    <td><input type="text" name="expected_speciality[${rowCount}][speciality_name]" class="form-control"></td>
                    <td><input type="text" name="expected_speciality[${rowCount}][doctor_name]" class="form-control"></td>
                </tr>
            `;
      $('#expected-speciality-table tbody').append(newRow);
    });

    // Remove Row
    $(document).on('click', '.remove-row', function() {
      $(this).closest('tr').remove();
      rowCount--;
      updateRowNumbers();
    });

    // Update row numbers after a row is removed
    function updateRowNumbers() {
      $('#expected-business-table tbody tr').each(function(index) {
        $(this).find('td:first').text(index + 1);
      });
    }
  });
</script>
<script>
  document.getElementById('add_more_contact').addEventListener('click', function(event) {
    event.preventDefault();

    const container = document.getElementById('business-contacts-container');
    const newRow = container.querySelector('.new-contact-row').cloneNode(true);

    // Reset input values in the cloned row
    newRow.querySelectorAll('input').forEach(function(input) {
      input.value = '';
    });

    newRow.style.borderTop = '1px solid black';
    newRow.style.marginTop = '15px';
    newRow.style.marginBottom = '15px';

    // Append the cloned row to the container
    container.appendChild(newRow);
  });
</script>
<script>
  function toggleCheckbox(clickedCheckbox) {
    const checkboxes = document.querySelectorAll('input[name="inCheck"]');
    checkboxes.forEach((checkbox) => {
      if (checkbox !== clickedCheckbox) {
        checkbox.checked = false;
      }
    });
  }
</script>
<script>
  function toggleCheckbox2(clickedCheckbox) {
    const checkboxes = document.querySelectorAll('input[name="inCheckNew"]');
    checkboxes.forEach((checkbox) => {
      if (checkbox !== clickedCheckbox) {
        checkbox.checked = false;
      }
    });
  }
</script>
<script>
  function toggleCheckbox3(clickedCheckbox) {
    const checkboxes = document.querySelectorAll('input[name="inCheckIt"]');
    checkboxes.forEach((checkbox) => {
      if (checkbox !== clickedCheckbox) {
        checkbox.checked = false;
      }
    });
  }
</script>
<script>
  function toggleCheckbox4(clickedCheckbox) {
    const checkboxes = document.querySelectorAll('input[name="inCheckNabl"]');
    checkboxes.forEach((checkbox) => {
      if (checkbox !== clickedCheckbox) {
        checkbox.checked = false;
      }
    });
  }
</script>
<script>
  function toggleCheckbox5(clickedCheckbox) {
    const checkboxes = document.querySelectorAll('input[name="inCheckNablAc"]');
    checkboxes.forEach((checkbox) => {
      if (checkbox !== clickedCheckbox) {
        checkbox.checked = false;
      }
    });
  }
</script>

@endsection