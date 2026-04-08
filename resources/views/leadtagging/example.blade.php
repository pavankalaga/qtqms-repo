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

  .rdSbtn {
    border: 1px solid !important;
    /* color: #0caf60; */
    margin-right: 5px;
    border-radius: 30px;
  }

  .modal {
    z-index: 10000;
  }
</style>

<section style="width: calc(100% - 254px);" class="dash-container tab-content">
  <div class="dash-content tab-pane fade show active" id="business-details-tab" role="tabpanel" aria-labelledby="profile-tab">
    <div class="row">
      <div class="col-12 mb-3">

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
                    <div class="support-query-form-buttons">
                      <button type="submit" class="support-query-save mb-3">Submit</button>
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
  <!-- PRICE QUOTES START -->
  <div class="dash-content tab-pane fade" id="price-quotes-tab">
    <section>
      <div role="tabpanel" aria-labelledby="price-quote-tab">
        <!-- Section Wrapper -->
        <section id="quotes-section">
          <h5 class="title mb-0">Price Quotes Status</h5>
          <!-- Table -->
          <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Quote No.</th>
                  <th>Quote Date</th>
                  <th>Details</th>
                  <th>Status</th>
                  <th>Change in Status Date</th>
                  <th>Action By</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td><a onclick="openPopup('Quote No: Q12345')">Q12345 </a></td>
                  <!-- <td>2024-11-20</td> -->
                  <td>20-11-2024</td>
                  <td>Details about Quote 1</td>
                  <td>
                    <div class="status-pending">
                      Pending
                    </div>
                  </td>
                  <!-- <td>2024-11-22</td> -->
                  <td>22-11-2024</td>
                  <td>Admin</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td><a onclick="openPopup('Quote No: Q12346')">Q12346</a></td>
                  <!-- <td>2024-11-21</td> -->
                  <td>21-11-2024</td>
                  <td>Details about Quote 2</td>
                  <td>
                    <div class="status-approved">
                      Approved
                    </div>
                  </td>
                  <!-- <td>2024-11-23</td> -->
                  <td>23-11-2024</td>
                  <td>Manager</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td><a onclick="openPopup('Quote No: Q12347')">Q12347</a></td>
                  <!-- <td>2024-11-21</td> -->
                  <td>21-11-2024</td>
                  <td>Details about Quote 3</td>
                  <td>
                    <div class="status-rejected">
                      Rejected
                  </td>
          </div>
          <!-- <td>2024-11-23</td> -->
          <td>23-11-2024</td>
          <td>Manager</td>
          </tr>
          </tbody>
          </table>
      </div>

      <!-- Open Button -->
      <!-- <div class="text-center mt-4">
        <button class="btn btn-success btn1" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight">
          Open Details
        </button>
      </div> -->
    </section>
  </div>
</section>
</div>
<!-- Offcanvas Popup -->
<div class="offcanvas offcanvas-end w-50" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <!-- <h5 id="offcanvasRightLabel">Action Details</h5> -->
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div class="container my-">
      <!-- Page Title -->
      <h2 class="text-center mb-4">Create a Quotation</h2>

      <!-- Quotation Section -->
      <div id="quotation-section">
        <div class="quotation">
          <div class="form-section">
            <div class="section-title">Quotation Details</div>
            <div class="form-group-row">
              <div class="form-group">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" required>
              </div>
              <div class="form-group">
                <label for="no" class="form-label">No</label>
                <input type="text" class="form-control" id="no" required>
              </div>
              <div class="form-group">
                <label for="file" class="form-label">Attach File</label>
                <input type="file" class="form-control" id="file">
              </div>
              <div class="form-group">
                <label for="raisedBy" class="form-label">Raised By</label>
                <input type="text" class="form-control" id="raisedBy" required>
              </div>
              <div class="form-group">
                <label for="priority" class="form-label">Priority</label>
                <select id="priority" class="form-select" required>
                  <option value="High">High</option>
                  <option value="Medium">Medium</option>
                  <option value="Low">Low</option>
                </select>
              </div>
              <div class="form-group">
                <label for="validUntil" class="form-label">Valid Until</label>
                <input type="date" class="form-control" id="validUntil" required>
              </div>
              <div class="form-group">
                <label for="customerEmail" class="form-label">Customer Email</label>
                <input type="email" class="form-control" id="customerEmail" required>
              </div>
              <div class="form-group">
                <label for="customerWhatsapp" class="form-label">Customer WhatsApp Number</label>
                <input type="tel" class="form-control" id="customerWhatsapp" required>
              </div>
            </div>
            <p class="text-muted mt-3">This is set by the manager.</p>
          </div>

          <!-- Test Details -->
          <div class="form-section">
            <div class="section-title">Test Details</div>
            <div class="form-group-row">
              <div class="form-group">
                <label for="testCode" class="form-label">Test Code</label>
                <select id="testCode" class="form-select">
                  <option value="Code1">Code1</option>
                  <option value="Code2">Code2</option>
                  <option value="Code3">Code3</option>
                </select>
              </div>
              <div class="form-group">
                <label for="testName" class="form-label">Test Name</label>
                <input type="text" class="form-control" id="testName" required>
              </div>
              <div class="form-group">
                <label for="methodology" class="form-label">Methodology</label>
                <input type="text" class="form-control" id="methodology" required>
              </div>
              <div class="form-group">
                <label for="testsPerDay" class="form-label">Tests Per Day</label>
                <input type="number" class="form-control" id="testsPerDay" required>
              </div>
              <div class="form-group">
                <label for="l2lTestedPrice" class="form-label">L2L Tested Price</label>
                <input type="number" class="form-control" id="l2lTestedPrice" required>
              </div>
              <div class="form-group">
                <label for="requestedL2lPrice" class="form-label">Requested L2L Price</label>
                <input type="number" class="form-control" id="requestedL2lPrice" required>
              </div>
              <div class="form-group">
                <label for="approvedL2lPrice" class="form-label">Approved L2L Price</label>
                <input type="number" class="form-control" id="approvedL2lPrice" required>
              </div>
              <div class="form-group">
                <label for="approvalTests" class="form-label">Approved Tests</label>
                <input type="number" class="form-control" id="approvalTests" required>
              </div>
            </div>
            <div class="mt-3">
              <label for="approvalConditions" class="form-label">Approval Conditions</label>
              <textarea id="approvalConditions" class="form-control" rows="3"></textarea>
            </div>
          </div>

          <!-- Action Buttons -->
          <div class="action-buttons mt-3">
            <button class="btn btn-success btn1 mx-2">Escalate</button>
            <button class="btn btn-success btn1 mx-2">Approve</button>
            <button class="btn btn-success btn1 mx-2">Deny</button>
            <button class="btn btn-success btn1 mx-2">More Information</button>
          </div>
        </div>
      </div>

      <!-- Footer Button -->
      <div class="text-center">
        <button id="add-section" class="btn btn-success btn1 mt-4">Add Section</button>
      </div>
    </div>

    <!-- JavaScript to Clone Sections -->
    <script>
      document.getElementById('add-section').addEventListener('click', function() {
        // Clone the quotation section
        const quotationSection = document.querySelector('.quotation');
        const clonedSection = quotationSection.cloneNode(true);
        document.getElementById('quotation-section').appendChild(clonedSection);
      });
    </script>
  </div>
</div>


<!-- Custom Styles -->
<style>
  .title {
    background-color: #069acb !important;
    padding: .5rem 1rem;
    border-radius: 5px;
    color: #ffffff;
    font-size: 16px;
  }

  .offcanvas {
    width: 75%;
    margin-right: 45px;
  }

  .offcanvas-header {
    /* background-color: #343a40;
        color: #ffffff; */
    margin-top: 75px;
  }

  .offcanvas-body {
    max-height: 90vh;
    overflow-y: auto;
  }

  .form-label {
    font-weight: bold;
  }

  .btn1 {
    background-color: #010046 !important;
    color: white;
    border: 2px solid #0caf60;
  }

  /* Default table styles */
  table {
    width: 100%;
    border-collapse: collapse;
    border: 3px solid yellow;
  }

  td {
    padding: 10px;
    text-align: center;
    font-family: Arial, sans-serif;
    border: 3px solid yellow;
  }

  /* Style for "Rejected" status (Red with icon) */
  .status-rejected {
    background-color: #ff7777dd;
    /* Light red background */
    color: #721c24;
    /* Dark red text */
    border: 1px solid #f5c6cb;
    /* Border to match the background */
    font-weight: bold;
    position: relative;
    font-size: 14px;
    /* Smaller text */
    /* border: 3px solid yellow; */
    border-radius: 16px;
  }

  .status-rejected::before {
    content: "\2716";
    /* Cross mark icon */
    font-size: 12px;
    /* Smaller icon */
    position: absolute;
    left: 4px;
    top: 50%;
    transform: translateY(-50%);
    color: #721c24;
  }

  /* Style for "Approved" status (Green with icon) */
  .status-approved {
    background-color: #d4edda;
    /* Light green background */
    color: #155724;
    /* Dark green text */
    border: 1px solid #c3e6cb;
    /* Border to match the background */
    font-weight: bold;
    position: relative;
    font-size: 14px;
    /* Smaller text */
    border-radius: 16px;
  }

  .status-approved::before {
    content: "\2714";
    /* Check mark icon */
    font-size: 12px;
    /* Smaller icon */
    position: absolute;
    left: 4px;
    top: 50%;
    transform: translateY(-50%);
    color: #155724;
  }

  /* Style for "Pending" status (Yellow with icon) */
  .status-pending {
    background-color: #fff3cd;
    /* Light yellow background */
    color: #856404;
    /* Dark yellow text */
    border: 1px solid #ffeeba;
    /* Border to match the background */
    font-weight: bold;
    position: relative;
    font-size: 14px;
    /* Smaller text */
    border-radius: 16px;
  }

  .status-pending::before {
    content: "\231B";
    /* Hourglass icon */
    font-size: 12px;
    /* Smaller icon */
    position: absolute;
    left: 4px;
    top: 50%;
    transform: translateY(-50%);
    color: #856404;


  }
</style>


<!-- PRICE QUOTES END -->


<!-- sales start  here -->

<div class="dash-content tab-pane fade" id="sales-tab" role="tabpanel" aria-labelledby="profile-tab">
  <section class="dash-container tab-content  w-100 ms-0">
    <div class="row">
      <div class="col-12 mb-3">
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
                            <div class="card-header">
                              <div class="d-flex justify-content-between align-items-center">
                                <div>
                                  <h5>Sales</h5>
                                </div>
                              </div>
                            </div>
                            <div class="card-body pt-0 table-border-style bg-none">
                              <div class="">
                                <div class="row">
                                  <div class="col-6 pe-1">
                                    <div class="row">
                                      <div class="form-group col-8">
                                        <label class="col-form-label text-nowrap">Total Lifetime value</label>
                                        <input type="text" class="form-control">
                                      </div>
                                      <div class="form-group col-8">
                                        <label class="col-form-label text-nowrap">Revenueble Summary</label>
                                        <input type="text" class="form-control">
                                      </div>
                                    </div>
                                    <div class=" col-12" style="margin-top:35px">
                                      <input type="radio" class="btn-check rdSbtn" name="options-outlined" id="success-outlined" autocomplete="off" checked>
                                      <label class="btn btn-outline-success rdSbtn" for="success-outlined">No Overdue</label>

                                      <input type="radio" class="btn-check rdSbtn" name="options-outlined" id="LTdays" autocomplete="off">
                                      <label class="btn btn-outline-info rdSbtn gt30Days" for="LTdays">&gt; 30 Days</label>
                                      <input type="radio" class="btn-check rdSbtn" name="options-outlined" id="30days" autocomplete="off">
                                      <label class="btn btn-outline-warning rdSbtn gt60Days" for="30days">&gt; 60 Days</label>
                                      <input type="radio" class="btn-check rdSbtn" name="options-outlined" id="gtdays" autocomplete="off">
                                      <label class="btn btn-outline-danger rdSbtn gt90Days" for="gtdays">&gt; 90 Days</label>
                                    </div>
                                    <div class="table-responsive" style="margin-top:29px">
                                      <table class="table" id="datatable" width="100%">
                                        <thead>
                                          <tr>
                                            <th>Invoice date</th>
                                            <th>Invoice Amount</th>
                                            <th>Status</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                      </table>

                                    </div>
                                    <div class="table-responsive" style="margin-top:43px">
                                      <table class="table" id="datatable" width="100%">
                                        <thead>
                                          <tr>
                                            <th>Month</th>
                                            <th>Invoice Amount</th>
                                            <th>Credit Note Amount</th>
                                            <th>TDS</th>
                                            <th>Deposit Amount</th>
                                            <th>Closing Balance</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                  <div class="col-6 ps-1">
                                    <div class="row">
                                      <div class="form-group col-5 pe-2 " style="margin-right:10px">
                                        <label class="col-form-label text-nowrap">From</label>
                                        <input type="text" class="form-control">
                                      </div>
                                      <div class="form-group col-6 ps-2">
                                        <label class="col-form-label text-nowrap">To</label>
                                        <input type="text" class="form-control">
                                      </div>
                                      <div class="form-group col-12 pe-5">
                                        <label class="col-form-label text-nowrap">Target Monthly Sale</label>
                                        <input type="text" class="form-control">
                                      </div>
                                      <div class="form-group col-12 pe-5">
                                        <label class="col-form-label text-nowrap">Actual Monthly Sale</label>
                                        <input type="text" class="form-control">
                                      </div>
                                      <div>

                                        <div class="table-responsive">
                                          <table class="table" id="datatable" width="100%">
                                            <thead>
                                              <tr>
                                                <th>Date</th>
                                                <th>Patient Count</th>
                                                <th>Test Count</th>
                                                <th>Gross Count</th>
                                                <th>Dise Count</th>
                                                <th>Net Revenue</th>
                                              </tr>
                                            </thead>
                                          </table>
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
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- sales end here -->

<!-- TIME CAPSULE START -->
<!-- <section class="tab-content container" id="my-tabContent"> -->
<!-- Time Capsule Tab Content -->
<div class="dash-content tab-pane fade" id="time-capsule-tab">
  <div role="tabpanel" aria-labelledby="time-capsules-tab">
    <form>
      <div class="d-flex align-items-center justify-content-between mb-4 w-100 position-relative" style="background-color:#069acb; border-radius: 5px;">
        <h5 class="title m-0">Time Capsule</h5>
      </div>
      <!-- <div class="d-flex justify-content-end mt-2">
        <div class="dropdown">
          <i class="fa-solid fa-filter fs-2 text-primary me-3" style="cursor: pointer;"></i>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 200px;">
            <li><a class="dropdown-item" href="#">Time</a></li>
            <li><a class="dropdown-item" href="#">Date</a></li>
            <li><a class="dropdown-item" href="#">Module</a></li>
          </ul>
        </div>
      </div> -->
      <!-- First Row -->
      <!-- <div class="d-flex flex-wrap gap-3 mb-3">
        Date Field
        <div class="form-group flex-fill">
          <label for="date" class="form-label">Date</label>
          <input type="date" class="form-control" id="date" placeholder="Enter Date">
        </div>

        Time Field
        <div class="form-group flex-fill">
          <label for="time" class="form-label">Time</label>
          <input type="time" class="form-control" id="time" placeholder="Enter Time">
        </div>
      </div> -->

      <!-- Second Row -->
      <!-- <div class="d-flex flex-wrap gap-3 mb-3">
        Module Field
        <div class="form-group flex-fill">
          <label for="module" class="form-label">Module</label>
          <input type="text" class="form-control" id="module" placeholder="Enter Module Name">
        </div>

        Observed Activity
        <div class="form-group flex-fill">
          <label for="activity" class="form-label">Observed Activity</label>
          <input type="text" class="form-control" id="activity" placeholder="Describe the Activity">
        </div>
      </div> -->

      <!-- Third Row -->
      <!-- <div class="d-flex flex-wrap gap-3 mb-3">
        Done By
        <div class="form-group flex-fill">
          <label for="done-by" class="form-label">Done By</label>
          <input type="text" class="form-control" id="done-by" placeholder="Enter Name">
        </div>

        Remarks Field
        <div class="form-group flex-fill">
          <label for="remarks" class="form-label">Remarks</label>
          <textarea class="form-control" id="remarks" rows="1" placeholder="Additional Notes"></textarea>
        </div>
      </div> -->

      <!-- Submit Button -->
      <!-- <div class="text-center">
        <button type="submit" class="btn btn-success btn1">Save Entry</button>
      </div> -->
      <table class="timeCapsuleTable" width="100%">
        <thead>
          <tr>
            <th>Date</th>
            <th>Module</th>
            <th>Description</th>
            <th>Modified</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </form>
  </div>
</div>


<style>
  #time-capsule-tab {
    width: 100%;
    background-color: #ffffff;
    box-sizing: border-box;
  }

  .dropdown-menu {
    border-radius: 5px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    background-color: #f9f9f9;
    border: none;
  }

  .dropdown-menu .dropdown-item {
    font-size: 0.9rem;
    color: #333;
    padding: 8px 15px;
  }

  .dropdown-menu .dropdown-item:hover {
    background-color: #e9ecef;
    color: #007bff;
  }

  /* Filter icon styling */
  .fa-filter {
    transition: transform 0.2s ease-in-out;
  }

  .fa-filter:hover {
    transform: rotate(15deg);
    color: #0056b3;
  }

  .timeCapsuleTable {
    border: none;
  }

  .timeCapsuleTable thead th {
    padding: 0px;
    background-color: transparent !important;
    color: #000;
    font-weight: 500;
    border-right: 1px solid gray;
    font-size: 14px;
  }
</style>
<!-- TIME CAPSULE END -->
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- PRICE BOOK CODE START-->
<div class="modal right fade " id="pricebookModal" tabindex="-1" aria-labelledby="pricebookModalLabel" aria-hidden="true">
  <div class="activityModalcloseBtn" data-bs-dismiss="modal" aria-label="Close">
    X
  </div>
  <div>
    <div class="modal-dialog pricebook-Details">
      <div class="modal-content">
        <div class="d-flex align-items-center justify-content-between gap-3  px-3 py-2 my-activity-title mb-4 m-30 mt-2">
          <div style="font-size: 20px;" id="pricebookModalLabel">Pricebook</div>
        </div>
        <!-- <div class="modal-header">
          <h5 class="modal-title" id="pricebookModalLabel">Pricebook Details</h5>
        </div> -->
        <div class="modal-body forecast-body">
          <!-- price book start -->

          <div class="container dash-container" style="margin-inline: auto;">
            <div class="col-12 mt-5">
              <div class="table-title text-center mb-5">Price Book</div>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
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
</div>
<style>
  .container {
    width: 80%;
  }

  .table-title {
    background: #010046;
    font-size: 1.8rem;
    color: #ffffff;
    border-radius: 5px;
  }

  table {
    background-color: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  th,
  td {
    text-align: center;
  }

  th {
    background-color: #e8f5e9 !important;
    color: #ffffff;
  }

  tr:hover {
    background-color: #f1f1f1;
  }

  #pricebookModal .pricebook-Details {
    max-width: 100%;
    width: 80%
  }

  #pricebookModal .pricebook-body {
    width: 100%;
  }

  .pricebook-container {
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
    right: 0;
    /* Slide in from the right */
  }

  .modal-dialog {
    margin: 0;
    /* Ensure no margin when sliding */
    height: 100%;
  }

  .modal-body {
    padding: 20px;
    /* Add any styling you need for modal content */
  }

  @keyframes slideInFromRight {
    0% {
      right: -100%;
    }

    100% {
      right: 80%;
    }
  }

  .activityModalcloseBtn {
    /* overflow: auto; */
    top: 85px !important;
    position: fixed;
    top: 42px;
    right: 80%;
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
    z-index: 10000;
    animation: slideInFromRight 0.5s ease-out forwards;

  }

  .modelStyle {
    /* overflow: auto; */
    top: 85px !important;
    position: absolute;
    top: 42px;
    right: 80%;

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
    z-index: 10000;
    animation: slideInFromRight 0.5s ease-out forwards;
  }
</style>
<!-- PRICE BOOK CODE END-->
<!-- Ticket  CODE START-->
<div class="modal right fade" id="ticketsModal" tabindex="-1" aria-labelledby="pricebookModalLabel" aria-hidden="true">
  <div class="activityModalcloseBtn" onclick="closeDialog('ticketsModal')" data-bs-dismiss="modal" aria-label="Close">
    X
  </div>
  <div>
    <div class="modal-dialog pricebook-Details">
      <div class="modal-content">
        <div class="d-flex align-items-center justify-content-between gap-3  px-3 py-2 my-activity-title mb-4 m-30 mt-2">
          <div style="font-size: 20px;">My Tickets</div>


          <div class="dropdown activity-buttons">
            <button type="button" class="btn btn-warning me-2" onclick="openPopupp2('Raise Ticket')">
              Create
            </button>
          </div>

        </div>
        <div style=" padding-right: 3.35rem; padding-left: 2rem;">

          <div class="row mb-4">

            <div class="col-md-2">
              <!-- <label for="from" class="form-label">From</label> -->
              <input type="text" onfocus="(this.type='date')" placeholder="From" id="from" class="form-control">
            </div>
            <div class="col-md-2">
              <!-- <label for="to" class="form-label">To</label> -->
              <input type="text" onfocus="(this.type='date')" id="to" placeholder="To" class="form-control">
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered ">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Status</th>
                  <th>Accont Name</th>
                  <th>Ticket No.</th>
                  <th>Raise Date</th>
                  <th>Department</th>
                  <th>Subject</th>
                  <th>Category</th>
                  <th>Close Date</th>
                  <th>Resolved Time in hr</th>
                </tr>
              </thead>
              <tbody id="messagesTableBody">
                <!-- Dummy data rows -->
                <tr>
                  <td>1</td>
                  <td>
                    <div style=" display: flex; align-items: center;">
                      <div style="width: 10px; height: 10px; background-color: red; border-radius: 50%; margin-right: 10px;"></div>
                      <span>Open</span>
                    </div>
                  </td>
                  <td style="min-width: 13rem;">Name 1</td>
                  <td>1144</td>
                  <td>2024-11-28 14:02</td>
                  <td>Hr</td>
                  <td>Test</td>
                  <td>Test</td>
                  <td>--</td>
                  <td>--</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>
                    <div style=" display: flex; align-items: center;">
                      <div style="width: 10px; height: 10px; background-color: #ffca2c; border-radius: 50%; margin-right: 10px;"></div>
                      <span>Pending</span>
                    </div>
                  </td>
                  <td>Name 2</td>
                  <td>1144</td>
                  <td>2024-11-28 14:02</td>
                  <td>Hr</td>
                  <td>Test</td>
                  <td>Test</td>
                  <td>--</td>
                  <td>--</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>
                    <div style=" display: flex; align-items: center;">
                      <div style="width: 10px; height: 10px; background-color: green; border-radius: 50%; margin-right: 10px;"></div>
                      <span>Resolved</span>
                    </div>

                  </td>
                  <td>Name 3</td>
                  <td>1144</td>
                  <td>2024-11-28 14:02</td>
                  <td>Hr</td>
                  <td>Test</td>
                  <td>Test</td>
                  <td>2024-11-28 16:48</td>
                  <td>1.4</td>
                </tr>
              </tbody>
            </table>

          </div>
        </div>

        <div id="close21" class="closeBtn2" onclick="closePopupp2()">
          X
        </div>
        <div id="popup21" class="popup2">
          <div style="position: relative; height:95%">
            <div class="mb-4 my-activity-title" style="margin-top: 0.6rem;">
              <lable id='popupTitle21' style="font-size: 20px;"> </lable>
            </div>
            <div class="support-query-form-container">
              <!-- <h2>Raise a Support Ticket</h2> -->
              <!-- <div class="row mb-4">
                <div class="col-md-2">
                  <label for="account-code" class="form-label">Account No</label>
                  <input type="text" id="account-code" class="form-control" placeholder="Account No">
                </div>
                <div class="col-md-4">
                  <label for="account-name" class="form-label">Account Name</label>
                  <input type="text" id="account-name" class="form-control" placeholder="Account Name">
                </div>
              </div> -->
              <form>
                <div class="support-query-form-group">
                  <label for="group">Group:</label>
                  <select id="group" name="group">
                    <option value="CSD">CSD</option>
                  </select>
                </div>

                <div class="support-query-form-group">
                  <label for="category">Category:</label>
                  <select id="category" name="category">
                    <option value="Change in Reference Ranges">Change in Reference Ranges</option>
                  </select>
                </div>

                <div class="support-query-form-group">
                  <label for="subcategory">Sub Category:</label>
                  <select id="subcategory" name="subcategory">
                    <option value="Change in Reference Ranges">Change in Reference Ranges</option>
                  </select>
                </div>

                <div class="support-query-form-group">
                  <label for="subject">Subject:</label>
                  <input type="text" id="subject" name="subject" value="Change in Reference Ranges" placeholder="Enter subject...">
                </div>

                <div class="support-query-form-group">
                  <label for="detail">Detail:</label>
                  <textarea id="detail" name="detail" placeholder="Enter details..."></textarea>
                </div>

                <div class="support-query-form-group">
                  <label for="sin">SIN No.:</label>
                  <input type="text" id="sin" name="sin" placeholder="Enter SIN No.">
                </div>

                <div class="support-query-form-group">
                  <label for="department">Department:</label>
                  <select id="department" name="department">
                    <option value="">-- Select --</option>
                  </select>
                </div>

                <div class="support-query-form-group">
                  <label for="test-name">Test Name:</label>
                  <select id="test-name" name="test-name">
                    <option value="">-- Select Option --</option>
                  </select>
                </div>

                <!-- <div class="support-query-form-group">
              <label for="resolve-datetime">Resolve Date & Time:</label>
              <input type="datetime-local" id="resolve-datetime" name="resolve-datetime">
            </div> -->

                <div class="support-query-form-group">
                  <label for="attachment">Attachment:</label>
                  <input type="file" id="attachment" name="attachment">
                </div>

                <div class="support-query-form-buttons mb-8" style="margin-bottom: 2rem;">
                  <button type="submit" class="support-query-save">Save</button>
                  <button type="button" class="support-query-cancel">Cancel</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
  .container {
    width: 80%;
  }

  .table-title {
    background: #010046;
    font-size: 1.8rem;
    color: #ffffff;
    border-radius: 5px;
  }

  table {
    background-color: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  th,
  td {
    text-align: center;
  }

  th {
    background-color: #e8f5e9 !important;
    color: #ffffff;
  }

  tr:hover {
    background-color: #f1f1f1;
  }

  #ticketsModal .pricebook-Details {
    max-width: 100%;
    width: 80%
  }

  #ticketsModal .pricebook-body {
    width: 100%;
  }

  .pricebook-container {
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
    right: 0;
    /* Slide in from the right */
  }

  .modal-dialog {
    margin: 0;
    /* Ensure no margin when sliding */
    height: 100%;
  }

  .modal-body {
    padding: 20px;
    /* Add any styling you need for modal content */
  }

  /* .activityModalcloseBtn {
    top: 85px !important;
    position: fixed;
    top: 42px;
    right: 80%;
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
    z-index: 10000;
  } */

  /* Form Container */
  .support-query-form-container {
    background-color: #f9f9f9;
    border-radius: 10px;
    /* padding: 20px; */
    /* max-width: 600px; */
    margin: auto;
    /* box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); */

  }

  /* Form Heading */
  .support-query-form-container h2 {
    text-align: center;
    font-size: 0.9rem;
    color: #333;
    margin-bottom: 20px;
    border-bottom: 2px solid #007bff;
    display: inline-block;
    padding-bottom: 5px;
  }

  /* Form Groups */
  .support-query-form-group {
    margin-bottom: 20px;
  }

  .support-query-form-group label {
    display: block;
    font-size: 0.9rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 8px;
  }

  .support-query-form-group select,
  .support-query-form-group input,
  .support-query-form-group textarea {
    width: 100%;
    padding: 10px;
    font-size: 0.9rem;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    transition: border-color 0.3s ease;
  }

  .support-query-form-group select:focus,
  .support-query-form-group input:focus,
  .support-query-form-group textarea:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 4px rgba(0, 123, 255, 0.5);
  }

  /* Textarea Styling */
  .support-query-form-group textarea {
    height: 120px;
    resize: none;
  }

  /* File Upload Styling */
  input[type="file"] {
    padding: 5px;
    font-size: 0.9rem;
  }

  /* Buttons */
  .support-query-form-buttons {
    display: flex;
    justify-content: space-between;
    gap: 10px;
  }

  .support-query-form-buttons button {
    flex: 1;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    font-size: 0.9rem;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
  }

  .support-query-form-buttons .support-query-save {
    background-color: #007bff;
    color: #fff;
  }

  .support-query-form-buttons .support-query-save:hover {
    background-color: #0056b3;
    transform: translateY(-2px);
  }

  .support-query-form-buttons .support-query-cancel {
    background-color: #dc3545;
    color: #fff;
  }

  .support-query-form-buttons .support-query-cancel:hover {
    background-color: #c82333;
    transform: translateY(-2px);
  }

  /* Responsive Design */
  @media (max-width: 768px) {
    .support-query-form-buttons {
      flex-direction: column;
    }

    .support-query-form-buttons button {
      width: 100%;
      margin-bottom: 10px;
    }
  }
</style>
<style>
  /* .form-control {
      border: none;
      border-bottom: 1px solid #ccc;
      border-radius: 0;
      outline: none;
      box-shadow: none;
    } */

  .table th,
  .table td {
    vertical-align: middle;
  }

  .search-box {
    display: flex;
    align-items: center;
  }

  /* .search-box input {
      border: none;
      border-bottom: 1px solid #ccc;
      border-radius: 0;
      box-shadow: none;
      margin-right: 10px;
      border-color: #0CAF60;
      box-shadow: 0 0 0 0.2rem rgba(12, 175, 96, 0.25);
    } */

  .search-box i {
    color: #6c757d;
  }

  .dropdown-toggle::after {
    margin-left: 10px;
  }

  .btn1 {
    background-color: #010046 !important;
    color: white;
    border: 2px solid #0caf60;
  }

  .my-activity-title {
    background: #010046;
    color: white;
    height: 56px;
    border-radius: 4px;
    font-size: 32px;
    align-items: center;
    display: flex;
    justify-content: space-between;
    padding: 1rem;
  }

  .activity-buttons {
    align-items: center;
    display: flex;
  }

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
    background-color: #0078d4;
  }

  .pivot-tab {
    flex: 1;
    padding: 10px 20px;
    color: white;
    background: transparent;
    border: none;
    cursor: pointer;
    font-size: 16px;
    text-align: center;
  }

  .pivot-tab.active {
    background-color: #005a9e;
    font-weight: bold;
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

  /* For Meeting button */
  .button-container {
    display: flex;
    gap: 20px;
  }

  .meetingButton {
    display: flex;
    text-align: center;
    text-decoration: none;
    color: #000;
    border: 2px solid #ccc;
    border-radius: 10px;
    padding: 10px;
    width: 120px;
    background-color: #fff;
    transition: all 0.3s ease;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  .meetingButton img {
    width: 60px;
    height: 60px;
    margin-bottom: 10px;
  }

  .meetingButton:hover {
    background-color: #e0e0e0;
    border-color: #888;
  }

  /* For Meeting */
  /* Form Container */
  .form-container {
    /* max-width: 600px; */
    margin: auto;
    /* padding: 20px; */
    background-color: #f9f9f9;
    border-radius: 8px;
    /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */

  }

  /* Form Heading */
  .form-container h2 {
    text-align: center;
    font-size: 0.9rem;
    color: #333;
    margin-bottom: 20px;
    border-bottom: 2px solid #007bff;
    display: inline-block;
    padding-bottom: 5px;
  }

  /* Form Group */
  .form-group {
    margin-bottom: 20px;
  }

  .form-group label {
    /* display: block; */
    font-size: 0.9rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 8px;
  }

  /* Input and Select Fields */
  .form-group input,
  .form-group select,
  .form-group textarea {
    /* width: 100%; */
    padding: 12px;
    font-size: 0.9rem;
    border: 1px solid #ccc;
    border-radius: 6px;
    box-sizing: border-box;
    transition: border-color 0.3s ease;
  }

  /* Input Focus Style */
  .form-group input:focus,
  .form-group select:focus,
  .form-group textarea:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
  }

  /* Textarea Styling */
  .form-group textarea {
    height: 150px;
    resize: vertical;
  }

  /* Button Group */
  .support-query-form-buttons {
    display: flex;
    justify-content: space-between;
    gap: 20px;
  }

  .support-query-form-buttons button {
    padding: 12px 20px;
    border: none;
    border-radius: 6px;
    font-size: 1rem;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
  }

  .support-query-form-buttons .support-query-save {
    background-color: #007bff;
    color: white;
  }

  .support-query-form-buttons .support-query-save:hover {
    background-color: #0056b3;
    transform: translateY(-2px);
  }

  .support-query-form-buttons .support-query-cancel {
    background-color: #dc3545;
    color: white;
  }

  .support-query-form-buttons .support-query-cancel:hover {
    background-color: #c82333;
    transform: translateY(-2px);
  }

  /* Responsive Design */
  @media (max-width: 768px) {
    .form-container {
      padding: 15px;
    }

    .support-query-form-buttons {
      flex-direction: column;
      gap: 15px;
    }

    .support-query-form-buttons button {
      width: 100%;
    }
  }

  /* For Raise Ticket */
  /* Form Container */
  .support-query-form-container {
    background-color: #f9f9f9;
    border-radius: 10px;
    /* padding: 20px; */
    /* max-width: 600px; */
    margin: auto;
    /* box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); */

  }

  /* Form Heading */
  .support-query-form-container h2 {
    text-align: center;
    font-size: 0.9rem;
    color: #333;
    margin-bottom: 20px;
    border-bottom: 2px solid #007bff;
    display: inline-block;
    padding-bottom: 5px;
  }

  /* Form Groups */
  .support-query-form-group {
    margin-bottom: 20px;
  }

  .support-query-form-group label {
    display: block;
    font-size: 0.9rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 8px;
  }

  .support-query-form-group select,
  .support-query-form-group input,
  .support-query-form-group textarea {
    width: 100%;
    padding: 10px;
    font-size: 0.9rem;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    transition: border-color 0.3s ease;
  }

  .support-query-form-group select:focus,
  .support-query-form-group input:focus,
  .support-query-form-group textarea:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 4px rgba(0, 123, 255, 0.5);
  }

  /* Textarea Styling */
  .support-query-form-group textarea {
    height: 120px;
    resize: none;
  }

  /* File Upload Styling */
  input[type="file"] {
    padding: 5px;
    font-size: 0.9rem;
  }

  /* Buttons */
  .support-query-form-buttons {
    display: flex;
    justify-content: space-between;
    gap: 10px;
  }

  .support-query-form-buttons button {
    flex: 1;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    font-size: 0.9rem;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
  }

  .support-query-form-buttons .support-query-save {
    background-color: #007bff;
    color: #fff;
  }

  .support-query-form-buttons .support-query-save:hover {
    background-color: #0056b3;
    transform: translateY(-2px);
  }

  .support-query-form-buttons .support-query-cancel {
    background-color: #dc3545;
    color: #fff;
  }

  .support-query-form-buttons .support-query-cancel:hover {
    background-color: #c82333;
    transform: translateY(-2px);
  }

  /* Responsive Design */
  @media (max-width: 768px) {
    .support-query-form-buttons {
      flex-direction: column;
    }

    .support-query-form-buttons button {
      width: 100%;
      margin-bottom: 10px;
    }
  }

  .flagStyle {
    display: flex;
    align-items: center;
    /* justify-content: space-around; */
  }

  .flagStyle i {
    margin-right: 0.5rem;
  }

  input {
    border-color: #0CAF60;
    box-shadow: 0 0 0 0.2rem rgba(12, 175, 96, 0.25);
  }
</style>
<!-- Ticket  CODE END-->
<!-- ACTIVITY CODE START -->
<div id="activityModal" class="modal right fade" tabindex="-1" aria-labelledby="activityModalLabel" aria-hidden="true">
  <div id="activityModalclose" class="activityModalcloseBtn" data-bs-dismiss="modal" aria-label="Close">
    X
  </div>
  <div>
    <div class="modal-dialog activity-Details">
      <div class="modal-content">

        <!-- <div class="d-flex align-items-center justify-content-between gap-3  px-3 py-2 my-activity-title mb-4 m-30 mt-2">
          <div style="font-size: 20px;">Activity</div>
        </div>
        <div class="modal-body activity-body">
         
          <div class="row container my-4 dash-container text-center" style="left:-23%;">

            <div class="form-group  col-12">
              <div class="d-flex justify-content-center align-items-center">
                <div class="crdM">
                  <div><i class="fa-solid fa-cloud mb-2"></i><br> Email </div>
                </div>
                <div class="crdM">
                  <div><i class="fa-solid fa-cloud mb-2"></i><br> To-Do-List </div>
                </div>
                <div class="crdM">
                  <div><i class="fa-solid fa-cloud mb-2"></i><br> Marketing </div>
                </div>
              </div>
            </div>

          </div>
        </div> -->

        <div class="d-flex align-items-center justify-content-between gap-3  px-3 py-2 my-activity-title mb-4 m-30 mt-2">
          <div style="font-size: 20px;">My Activities</div>
          <div class="dropdown activity-buttons">
            <button class="btn btn-warning me-2" onclick="MeetingopenPopupp()">Create</button>
          </div>
        </div>
        <div class="mt-2 p-10" style="padding-right: 2rem; padding-left: 2rem;">
          <!-- Title -->


          <!-- Top Buttons -->
          <div class="pivot-container">
            <div class="pivot-tabs">
              <button class="pivot-tab active" data-target="tab1">Task</button>
              <!-- <button class="pivot-tab" data-target="tab4">Message</button> -->
              <button class="pivot-tab" data-target="tab5">Meetings</button>
              <button class="pivot-tab" data-target="tab2">Notes</button>
              <button class="pivot-tab" data-target="tab3">Call</button>
              <!-- <button class="pivot-tab" data-target="tab6">Raise Ticket</button> -->
            </div>
            <div class="pivot-content">
              <div class="pivot-panel active" id="tab1">
                <!-- Secondary Buttons and Search Box -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <button class="btn btn-success me-2">Completed</button>
                    <button class="btn btn-success me-2">Upcoming</button>
                    <button class="btn btn-success">Overdue</button>
                  </div>
                  <div class="search-box">
                    <input type="text" class="form-control" placeholder="Search">
                    <i class="bi bi-search"></i>
                  </div>
                </div>

                <!-- Table -->
                <div class="table-responsive">
                  <table class="table table-bordered ">
                    <thead>
                      <tr>
                        <th>Status</th>
                        <th>Task Name</th>
                        <th>Created Date</th>
                        <th>Due Date</th>
                        <th>Priority</th>
                        <th>Created By</th>
                        <th>Assigned By</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><input type="checkbox"></td>
                        <td>Complete Documentation</td>
                        <td>2024-12-01</td>
                        <td>2024-12-01</td>
                        <td>
                          <div class="flagStyle">
                            <i class="fa-solid fa-flag" style="color: #ff0000;"></i>
                            High
                          </div>
                        </td>
                        <td>John Doe</td>
                        <td>Jane Smith</td>
                      </tr>
                      <tr>
                        <td><input type="checkbox"></td>
                        <td>Team Meeting</td>
                        <td>2024-11-30</td>
                        <td>2024-11-30</td>
                        <td>
                          <div class="flagStyle">
                            <i class="fa-solid fa-flag" style="color: #ffca2c;"></i>
                            Medium
                          </div>
                        </td>
                        <td>John Doe</td>
                        <td>Jane Smith</td>
                      </tr>
                      <tr>
                        <td><input type="checkbox"></td>
                        <td>Submit Project</td>
                        <td>2024-12-05</td>
                        <td>2024-12-05</td>
                        <td>
                          <div class="flagStyle">
                            <i class="fa-solid fa-flag" style="color: #29357c;"></i>
                            Low
                          </div>
                        </td>
                        <td>JHON</td>
                        <td>John</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div id="Meetingclose" class="closeBtn2" onclick="MeetingclosePopupp()">
                  X
                </div>
                <div id="Meetingpopup" class="popup2">
                  <div style="position: relative; height:95%">
                    <div class="mb-4 my-activity-title" style="margin-top: 0.6rem;">
                      <lable id='popup-title' style="font-size: 20px;">Create Task </lable>
                    </div>
                    <div style="width: 100%;" id="createMessageOff">
                      <div class="form-container">

                        <form id="messageForm">
                          <div class="form-group">
                            <label for="message" class="form-label">Task Name</label>
                            <input id="taskName" class="form-control" rows="3" required></input>
                          </div>
                          <div class="form-group">
                            <label for="sentBy" class="form-label">Created Date</label>
                            <input type="date" id="status" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label for="sentDate" class="form-label">Due Date</label>
                            <input type="date" id="dueDate" class="form-control" required>
                          </div>

                          <div class="form-group">
                            <label for="status" class="form-label">Priority</label>
                            <select id="priority" class="form-select" required>
                              <option value="High">High</option>
                              <option value="Medium">Medium</option>
                              <option value="Low">Low</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="viewedDate" class="form-label">Created/Assigned By</label>
                            <input type="text" id="assignedBy" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="viewedDate" class="form-label">Assigned To</label>
                            <input type="text" id="assignedTo" class="form-control">
                          </div>
                          <div class="support-query-form-buttons">
                            <button type="submit" class="support-query-save mb-3">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="pivot-panel" id="tab2">
                <div>
                  <div class="notes-Details">
                    <div>


                      <div class="row">
                        <div class="col-md-2">
                          <input type="text" onfocus="(this.type='date')" placeholder="From" id="from" class="form-control">
                        </div>
                        <div class="col-md-2">
                          <input type="text" onfocus="(this.type='date')" id="to" placeholder="To" class="form-control">
                        </div>
                        <div class="col-md-5"></div>
                        <div class="search-box col-md-3">
                          <input type="text" class="form-control" placeholder="Search">
                          <i class="bi bi-search"></i>
                        </div>
                      </div>
                      <div style="overflow: auto;">
                        <div class="message-container " style="margin: 1rem 0;">
                          <div class="message-header col-md-1">
                            <p>19 Jul 2024</p>
                            <p> 01:35 PM</p>
                          </div>
                          <div style="width: 1px;display: flex;background: #dddddd;margin: 0 1rem;" class="col-md-1"></div>
                          <div class="message-content ">
                            <h6>Test Heading</h6>
                            <p>Generic: Hey James! We tried reaching you but couldn't connect. How about you choose a time to talk again</p>
                            <p class="message-by">By Name 1Name 1Name 1Name 1Name 1Name 1Name 1</p>

                          </div>

                        </div>
                      </div>


                      <div id="close4" class="closeBtn2" onclick="MeetingclosePopupp()">
                        X
                      </div>
                      <div id="popup4" class="popup2">
                        <div style="position: relative; height:95%">



                          <div class="mb-4 my-activity-title" style="margin-top: 0.6rem;">
                            <div style="font-size: 20px;" id='popupTitle2'>Create Notes</div>

                          </div>

                          <div style="width: 100%;">
                            <div class="form-container">

                              <form id="NewLegerForm" class="row">


                                <div class="mb-3">
                                  <label for="noteTitle" class="mb-2 text-center">Note Title</label>
                                  <input type="text" id="noteTitle" class="form-control" placeholder="Enter title" required>
                                </div>
                                <div class="row">
                                  <div class="col-md-6 mb-3">
                                    <label for="noteDate" class="form-label">Date</label>
                                    <input type="date" id="noteDate" class="form-control" required>
                                  </div>
                                  <div class="col-md-6 mb-3">
                                    <label for="noteTime" class="form-label">Time</label>
                                    <input type="time" id="noteTime" class="form-control" required>
                                  </div>
                                </div>
                                <div class="mb-3">
                                  <label for="createdBy" class="form-label">Created By</label>
                                  <input type="text" id="createdBy" class="form-control" placeholder="Enter your name" required>
                                </div>
                                <div class="mb-3">
                                  <label for="noteContent" class="form-label">Write Note</label>
                                  <textarea id="noteContent" class="form-control" rows="5" placeholder="Write your note here..." required></textarea>
                                </div>
                                <div class="mb-3">
                                  <label for="uploadFile" class="form-label">Upload Attachments</label>
                                  <input type="file" id="uploadFile" class="form-control">
                                </div>



                                <div class="support-query-form-buttons">
                                  <button type="submit" class="support-query-save mb-3">Submit</button>
                                </div>
                              </form>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>


                </div>
              </div>
              <div class="pivot-panel" id="tab3">
                <div class="button-container">
                  <a href="https://teams.microsoft.com/" target="_blank" class="meetingButton">
                    <img src="https://techcommunity.microsoft.com/t5/s/gxcuf89792/m_assets/themes/customTheme1/favicon-1730836271365.png?time=1730836274203" alt="Microsoft Teams">
                    Microsoft Teams
                  </a>

                  <a href="https://zoom.us/" target="_blank" class="meetingButton">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/7/7b/Zoom_Communications_Logo.svg" alt="Zoom" style="height: 40Px;width: 80px;">
                    Zoom
                  </a>

                  <a href="https://meet.google.com/" target="_blank" class="meetingButton">
                    <img src="https://www.gstatic.com/meet/google_meet_horizontal_wordmark_2020q4_1x_icon_124_40_2373e79660dabbf194273d27aa7ee1f5.png" alt="Google Meet" style="width: 80px;height: 34px;">
                    Google Meet
                  </a>
                </div>
              </div>
              <div class="pivot-panel" id="tab4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <button class="btn btn-success me-2">Incoming</button>
                    <button class="btn btn-success me-2">Outgoing</button>

                  </div>

                </div>
                <div class="row">
                  <div class="col-12">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Message</th>
                          <th>Sent By</th>
                          <th>Sent Date</th>
                          <th>Status</th>
                          <th>Viewed Date</th>
                        </tr>
                      </thead>
                      <tbody id="messagesTableBody">

                        <tr>
                          <td>Meeting at 3 PM</td>
                          <td>John Doe</td>
                          <td>2024-11-28</td>
                          <td>Completed</td>
                          <td>2024-11-28</td>
                        </tr>
                        <tr>
                          <td>Project deadline extended</td>
                          <td>Jane Smith</td>
                          <td>2024-11-27</td>
                          <td>Pending</td>
                          <td>N/A</td>
                        </tr>
                        <tr>
                          <td>Weekly report submitted</td>
                          <td>Sam Wilson</td>
                          <td>2024-11-25</td>
                          <td>Completed</td>
                          <td>2024-11-26</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div id="close1" class="closeBtn" onclick="MeetingclosePopupp()">
                  X
                </div>
                <div id="popup1" class="popup">
                  <div style="position: relative; height:95%">
                    <div class="mb-4 my-activity-title" style="margin-top: 0.6rem;">
                      <lable id='popup-title' style="font-size: 20px;">Create Message </lable>
                    </div>
                    <div style="width: 100%;" id="createMessageOff">
                      <div class="form-container">

                        <form id="messageForm">
                          <div class="form-group">
                            <label for="to" class="form-label">To</label>
                            <input type="text" id="to" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label for="message" class="form-label">Message</label>
                            <textarea id="message" class="form-control" rows="3" required></textarea>
                          </div>

                          <div class="form-group">
                            <label for="sentDate" class="form-label">Sent Date</label>
                            <input type="date" id="sentDate" class="form-control" required>
                          </div>
                          <div>
                            <input type="checkbox" checked id="readRecipt" class="form-check-input custom-form-check">
                            <label for="readRecipt" class="form-label">Read Recipt</label>
                          </div>

                          <div class="form-group">
                            <label for="status" class="form-label">Priority</label>
                            <select id="priority" class="form-select" required>
                              <option value="High">High</option>
                              <option value="Medium">Medium</option>
                              <option value="Low">Low</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="myFile" class="form-label">Upload Doc</label>
                            <input type="file" id="myFile" name="filename">
                          </div>

                          <div class="support-query-form-buttons">
                            <button type="submit" class="support-query-save mb-3">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="pivot-panel" id="tab5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <button class="btn btn-success me-2">Completed</button>
                    <button class="btn btn-success me-2">Upcoming</button>
                    <button class="btn btn-success">Overdue</button>
                  </div>
                  <div class="search-box">
                    <input type="text" class="form-control" placeholder="Search">
                    <i class="bi bi-search"></i>
                  </div>
                </div>

                <!-- Table -->
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Event Name</th>
                      <th>Start Date and Time</th>
                      <th>End Date and Time</th>
                      <th>Calendar</th>
                      <th>Repeat</th>
                      <th>Location</th>
                      <th>Attendees</th>
                      <th>Agenda</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>test</td>
                      <td>05-12-2024 09:48</td>
                      <td>05-12-2024 19:48</td>
                      <td></td>
                      <td>No</td>
                      <td>Hyd</td>
                      <td>5</td>
                      <td>Test</td>
                    </tr>
                  </tbody>
                </table>


                <div id="Meetingclose2" class="closeBtn2" onclick="MeetingclosePopupp()">
                  X
                </div>
                <div id="Meetingpopup2" class="popup2">
                  <div style="position: relative; height:95%">
                    <div class="mb-4 my-activity-title" style="margin-top: 0.6rem;">
                      <lable id='popup-title' style="font-size: 20px;">Create Meeting</lable>
                    </div>
                    <div style="width: 100%;" id="createMessageOff">
                      <div class="form-container">
                        <!-- <h2>Create Meeting</h2> -->
                        <form>
                          <div class="form-group">
                            <label for="event-name">Event Name:</label>
                            <input type="text" id="event-name" name="event-name" placeholder="Enter event name" required>
                          </div>

                          <div class="form-group">
                            <label for="start-time">Start Date and Time:</label>
                            <input type="datetime-local" id="start-time" name="start-time" required>
                          </div>

                          <div class="form-group">
                            <label for="end-time">End Date and Time:</label>
                            <input type="datetime-local" id="end-time" name="end-time" required>
                          </div>

                          <div class="form-group">
                            <label for="calendar">Calendar:</label>
                            <input type="email" id="calendar" name="calendar" placeholder="Enter calendar email" required>
                          </div>

                          <div class="form-group">
                            <label for="repeat">Repeat:</label>
                            <select id="repeat" name="repeat">
                              <option value="none">Don't repeat</option>
                              <option value="daily">Daily</option>
                              <option value="weekly">Weekly</option>
                              <option value="monthly">Monthly</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="location">Location:</label>
                            <input type="text" id="location" name="location" placeholder="Enter location">
                          </div>

                          <div class="form-group">
                            <label for="attendees">Attendees:</label>
                            <input type="email" id="attendees" name="attendees" placeholder="Enter attendees' emails (comma-separated)">
                          </div>

                          <div class="form-group">
                            <label for="agenda">Agenda:</label>
                            <textarea id="agenda" name="agenda" placeholder="Enter the agenda"></textarea>
                          </div>

                          <div class="support-query-form-buttons mb-4">
                            <button type="submit" class="support-query-save">Save</button>
                            <button type="button" class="support-query-cancel">Cancel</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>


        </div>


        <script>
          function MeetingopenPopupp() {
            document.getElementById('Meetingpopup').classList.add('open');
            document.getElementById('Meetingclose').classList.add('opened');
            document.getElementById('popup1').classList.add('open');
            document.getElementById('close1').classList.add('opened');
            document.getElementById('Meetingclose2').classList.add('opened');
            document.getElementById('Meetingpopup2').classList.add('open');
            document.getElementById('popup4').classList.add('open');
            document.getElementById('close4').classList.add('opened');
            // document.getElementById('popup-title').textContent = Name
            // const label1 = document.createElement('label');
            // label1.className = 'col-form-label col-md-6';
            // label1.textContent = Name;
          }

          function MeetingclosePopupp() {
            document.getElementById('Meetingpopup').classList.remove('open');
            document.getElementById('Meetingclose').classList.remove('opened');
            document.getElementById('popup1').classList.remove('open');
            document.getElementById('close1').classList.remove('opened');

            document.getElementById('Meetingclose2').classList.remove('opened');
            document.getElementById('Meetingpopup2').classList.remove('open');
            document.getElementById('popup4').classList.remove('open');
            document.getElementById('close4').classList.remove('opened');
          }

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
      </div>

    </div>
  </div>
</div>
<style>
  #activityModal .activity-Details {
    max-width: 100%;
    width: 80%
  }

  #activityModal .activity-body {
    width: 100%;
  }

  .activity-container {
    left: -226px;
    width: 100%;
  }

  .my-4 {
    width: 100%;
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

  .text-nowrap {
    font-size: 1.8rem;
  }

  /* Custom CSS to slide modal in from the right */
  .modal.right .modal-dialog {
    position: fixed;
    top: 0;
    right: -100%;
    /* Initially off-screen to the right */
    height: 100%;
    width: 400px;
    /* Set the width of the modal */
    transition: right 0.5s ease-in-out;
    /* Smooth slide animation */
  }

  .modal.right.show .modal-dialog {
    right: 0;
    /* Slide in from the right */
  }

  .modal-dialog {
    margin: 0;
    /* Ensure no margin when sliding */
    height: 100%;
  }

  .modal-body {
    padding: 20px;
    /* Add any styling you need for modal content */
  }

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
    background-color: #0078d4;
  }

  .pivot-tab {

    background: transparent;

  }

  .pivot-tab.active {
    background-color: #afafaf !important;
    font-weight: bold;
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
</style>
<!--ACTIVITY CODE END-->

<!-- DOCUMENTS START -->
<div class="modal right fade" id="documentModal" tabindex="-1" aria-labelledby="documentModalLabel" aria-hidden="true">

  <div class="activityModalcloseBtn" data-bs-dismiss="modal" aria-label="Close">
    X
  </div>
  <div>
    <div class="modal-dialog document-Details">
      <div class="modal-content">

        <div class="d-flex align-items-center justify-content-between gap-3  px-3 py-2 my-activity-title mb-4 m-30 mt-2">
          <div style="font-size: 20px;">Document</div>
          <div class="d-flex" style="align-items: center;">

            <div class="dropdown activity-buttons">
              <input class="btn btn-warning me-2" style="width: 16rem;" type="file"></input>
            </div>
          </div>
        </div>
        <div>
          <div>
            <div class="container" style="width:100%; padding-left: 2rem;">


              <div class="pivot-container">
                <div>
                  <span class="pivot-tab " style="all:unset; margin-right:0.5rem" data-target="tab2" title="Document View">
                    <svg style="width: 16px;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="grid-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-grid-2 fa-lg">
                      <path fill="currentColor" d="M224 80c0-26.5-21.5-48-48-48L80 32C53.5 32 32 53.5 32 80l0 96c0 26.5 21.5 48 48 48l96 0c26.5 0 48-21.5 48-48l0-96zm0 256c0-26.5-21.5-48-48-48l-96 0c-26.5 0-48 21.5-48 48l0 96c0 26.5 21.5 48 48 48l96 0c26.5 0 48-21.5 48-48l0-96zM288 80l0 96c0 26.5 21.5 48 48 48l96 0c26.5 0 48-21.5 48-48l0-96c0-26.5-21.5-48-48-48l-96 0c-26.5 0-48 21.5-48 48zM480 336c0-26.5-21.5-48-48-48l-96 0c-26.5 0-48 21.5-48 48l0 96c0 26.5 21.5 48 48 48l96 0c26.5 0 48-21.5 48-48l0-96z" class=""></path>
                    </svg>
                  </span>
                  <span class="pivot-tab active" style="all:unset" data-target="tab1" title="List View">
                    <svg style="width: 16px;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="list-ul" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-list-ul fa-lg">
                      <path fill="currentColor" d="M64 144a48 48 0 1 0 0-96 48 48 0 1 0 0 96zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32l288 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L192 64zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32l288 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-288 0zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32l288 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-288 0zM64 464a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm48-208a48 48 0 1 0 -96 0 48 48 0 1 0 96 0z" class=""></path>
                    </svg>
                  </span>

                </div>
                <div class="pivot-content">
                  <div class="pivot-panel active" id="tab1">
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped">
                        <thead>
                          <tr class="text-center">
                            <th>Name</th>
                            <th>Size</th>
                            <th>Type</th>
                            <th>Upload Date</th>

                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Doc 1</td>
                            <td>1000KB</td>
                            <td>PDF</td>
                            <td>11-11-2024</td>

                          </tr>
                          <tr>
                            <td>Doc 2</td>
                            <td>100KB</td>
                            <td>JPG</td>
                            <td>11-10-2024</td>

                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="pivot-panel " id="tab2">

                    <div style="display: flex;">

                      <div class="document-card">
                        <!-- Document Display Section (Dummy Document) -->
                        <div class="document-container position-relative mb-2">
                          <i class="fa-regular fa-file-excel"></i>
                        </div>
                        <label class="col-form-label">Doc 1</label>

                      </div>



                      <div class="document-card">
                        <div class="document-container position-relative mb-2">
                          <i class="fa-regular fa-file-word"></i>
                        </div>
                        <label class="col-form-label">Doc 2</label>

                      </div>



                      <div class="document-card">
                        <div class="document-container position-relative mb-2">
                          <i class="fa-regular fa-file-pdf"></i>
                        </div>
                        <label class="col-form-label">Doc 3</label>

                      </div>



                      <div class="document-card">
                        <div class="document-container position-relative mb-2">
                          <i class="fa-solid fa-file-image"></i>
                        </div>
                        <label class="col-form-label">Doc 4</label>


                      </div>

                      <div class="document-card">
                        <div class="document-container position-relative mb-2">
                          <i class="fa-regular fa-file-excel"></i>
                        </div>
                        <label class="col-form-label">Doc 1</label>

                      </div>



                      <div class="document-card">
                        <div class="document-container position-relative mb-2">
                          <i class="fa-regular fa-file-word"></i>
                        </div>
                        <label class="col-form-label">Doc 2</label>

                      </div>



                      <div class="document-card">
                        <div class="document-container position-relative mb-2">
                          <i class="fa-regular fa-file-pdf"></i>
                        </div>
                        <label class="col-form-label">Doc 3</label>

                      </div>



                      <div class="document-card">
                        <div class="document-container position-relative mb-2">
                          <i class="fa-solid fa-file-image"></i>
                        </div>
                        <label class="col-form-label">Doc 4</label>


                      </div>
                    </div>
                  </div>

                  <div class="offcanvas offcanvas-end mt-0" tabindex="-1" id="tableOffcanvas" aria-labelledby="tableOffcanvasLabel">
                    <div class="offcanvas-header">
                      <h5 id="tableOffcanvasLabel">Documents</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                      <form>
                        <div class="mb-3">
                          <label for="choose-file" class="form-label">Choose File:</label>
                          <input type="file" class="form-control" id="choose-file">
                        </div>
                        <div class="mb-3">
                          <label for="notes" class="form-label">Notes:</label>
                          <textarea id="notes" class="form-control" placeholder="Enter notes..."></textarea>
                        </div>
                        <div class="d-flex justify-content-center">
                          <button class="btn btn-primary me-2 btn1" id="cancel-btn">Cancel</button>
                          <button class="btn btn-primary btn1">Save</button>
                        </div>
                      </form>
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
<style>
  #documentModal .document-Details {
    max-width: 100%;
    width: 80%
  }

  #documentModal .document-body {
    width: 100%;
    display: flex;
    left: -85px;
  }

  .document-container {
    left: 0px;
    width: 100%;
  }

  /* Custom CSS to slide modal in from the right */
  .modal.right .modal-dialog {
    position: fixed;
    top: 0;
    right: -100%;
    /* Initially off-screen to the right */
    height: 100%;
    /* width: 400px; Set the width of the modal */
    transition: right 0.5s ease-in-out;
    /* Smooth slide animation */
  }

  .modal.right.show .modal-dialog {
    right: 0;
    /* Slide in from the right */
  }

  .modal-dialog {
    margin: 0;
    /* Ensure no margin when sliding */
    height: 100%;
  }

  .modal-body {
    padding: 20px;
    /* Add any styling you need for modal content */
  }

  .dash-container {
    width: 100%;
  }

  .header {
    background: #069acb !important;
    color: #fff;
    border-radius: 5px;
  }

  .header h5,
  #create-btn {
    margin-inline: 20px;
  }

  .btn1 {
    background-color: #010046;
    color: white;
    border: 2px solid #0caf60;
  }

  .document-card {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 10px;
    text-align: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 10%;
    margin-right: 0.5rem;
  }

  .document-card i {
    font-size: 3.5rem;
    cursor: pointer;

  }

  .notes-textarea {
    width: 100%;
    height: 80px;
    resize: none;
  }

  /* Right-side modal styles */
  .offcanvas {
    margin-top: 70px;
  }

  .file-size {
    font-size: 8rem !important;
  }

  .document-container {
    position: relative;
    width: 100%;
    height: auto;
    display: flex;
    justify-content: center;
  }

  .document-container .file-size {
    max-width: 100%;
    height: auto;
    border-radius: 5px;
  }

  .notes-textarea {
    resize: vertical;
    /* Allow vertical resizing */
    overflow: hidden;
    /* Hide the scrollbar */
    min-height: 80px;
    /* Minimum height */
    max-height: 400px;
    /* Maximum height */
  }

  .message-by {
    margin-bottom: 0;
    font-size: 11px;
    position: absolute;
    bottom: 0;
  }
</style>
<!-- DOCUMENT END -->

<!-- NOTES START -->
<div class="modal right fade" id="notesModal" tabindex="-1" aria-labelledby="notesModalLabel" aria-hidden="true">

  <div class="activityModalcloseBtn" data-bs-dismiss="modal" aria-label="Close">
    X
  </div>
  <div>
    <div class="modal-dialog notes-Details">
      <div class="modal-content">
        <!-- <div class="modal-header">
          <h5 class="modal-title" id="notesModalLabel">Notes Details</h5>
        </div> -->
        <div class="d-flex align-items-center justify-content-between gap-3  px-3 py-2 my-activity-title mb-4 m-30 mt-2">
          <div style="font-size: 20px;">Notes</div>

          <div class="d-flex" style="align-items: center;">

            <div class="dropdown activity-buttons">
              <button type="button" class="btn btn-warning me-2" onclick="openPopup4('Notes')">
                Create
              </button>
            </div>

          </div>
        </div>
        <div class="row" style="margin: 0 1.5rem;">
          <div class="col-md-2">
            <!-- <label for="from" class="form-label">From</label> -->
            <input type="text" onfocus="(this.type='date')" placeholder="From" id="from" class="form-control">
          </div>
          <div class="col-md-2">
            <!-- <label for="to" class="form-label">To</label> -->
            <input type="text" onfocus="(this.type='date')" id="to" placeholder="To" class="form-control">
          </div>
          <div class="col-md-5"></div>
          <div class="search-box col-md-3">
            <input type="text" class="form-control" placeholder="Search">
            <i class="bi bi-search"></i>
          </div>
        </div>
        <div style="overflow: auto;">
          <div class="message-container ">
            <div class="message-header col-md-1">
              <p>19 Jul 2024</p>
              <p> 01:35 PM</p>
            </div>
            <div style="width: 1px;display: flex;background: #dddddd;margin: 0 1rem;" class="col-md-1"></div>
            <div class="message-content ">
              <h6>Test Heading</h6>
              <p>Generic: Hey James! We tried reaching you but couldn't connect. How about you choose a time to talk again</p>
              <p class="message-by">By Name 1Name 1Name 1Name 1Name 1Name 1Name 1</p>

            </div>

          </div>
        </div>


        <div id="close4" class="closeBtn2" onclick="closePopup4()">
          X
        </div>
        <div id="popup4" class="popup2">
          <div style="position: relative; height:95%">



            <div class="mb-4 my-activity-title" style="margin-top: 0.6rem;">
              <div style="font-size: 20px;" id='popupTitle2'>Create Notes</div>


              <!-- <div class="d-flex" style="align-items: center;">

          <div class="dropdown activity-buttons">
            <input class="btn btn-warning me-2" style="width: 16rem;" type="file"></input>
          </div>
        </div> -->
            </div>

            <div style="width: 100%;">
              <div class="form-container">

                <form id="NewLegerForm" class="row">


                  <!-- <h2 class="mb-2 text-center"> Create Notes</h2> -->
                  <div class="mb-3">
                    <label for="noteTitle" class="mb-2 text-center">Note Title</label>
                    <input type="text" id="noteTitle" class="form-control" placeholder="Enter title" required>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="noteDate" class="form-label">Date</label>
                      <input type="date" id="noteDate" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="noteTime" class="form-label">Time</label>
                      <input type="time" id="noteTime" class="form-control" required>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="createdBy" class="form-label">Created By</label>
                    <input type="text" id="createdBy" class="form-control" placeholder="Enter your name" required>
                  </div>
                  <div class="mb-3">
                    <label for="noteContent" class="form-label">Write Note</label>
                    <textarea id="noteContent" class="form-control" rows="5" placeholder="Write your note here..." required></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="uploadFile" class="form-label">Upload Attachments</label>
                    <input type="file" id="uploadFile" class="form-control">
                  </div>



                  <div class="support-query-form-buttons">
                    <button type="submit" class="support-query-save mb-3">Submit</button>
                  </div>
                </form>
              </div>
            </div>

            <!-- <button style="position: absolute;bottom: 16px;" type="button" class="btn btn-primary btn1 w-100" onclick="closePopup()">Submit</button> -->
          </div>
        </div>
      </div>
    </div>


  </div>
</div>
<script>
  function openPopup4(name) {
    const popupTitle = document.getElementById('popupTitle');
    popupTitle.textContent = name;
    document.getElementById('popup4').classList.add('open');
    document.getElementById('close4').classList.add('opened');
  }

  function closePopup4() {


    document.getElementById('popup4').classList.remove('open');
    document.getElementById('close4').classList.remove('opened');
  }
</script>
<style>
  .message-container {
    /* max-width: 500px; */
    margin: 20px 2rem;
    background-color: #ffffff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 15px;
    display: flex;
  }

  .message-header {
    font-size: 0.9rem;
    color: #888;
    margin-bottom: 10px;
  }

  .message-content {
    position: relative;
    font-size: 1rem;
    /* line-height: 1.6; */
    color: #333;
  }



  .message-content span {
    font-weight: bold;
  }

  .footer-note {
    font-size: 0.8rem;
    color: #aaa;
    margin-top: 10px;
    text-align: right;
  }

  .offcanvas-header {
    margin-top: 18px;
  }

  .offcanvas-end {
    width: 100%;
    max-width: 500px;
    margin-right: 50px;
  }

  .offcanvas {
    width: 50% !important;
  }

  .btn1 {
    background-color: #010046;
    color: white;
    border: 2px solid #0caf60;
  }

  textarea {
    resize: none;
  }

  #notesModal .notes-Details {
    max-width: 100%;
    width: 80%
  }

  #notesModal .notes-body {
    width: 100%;
  }

  .notes-container {
    /* left: -226px; */
    width: 100%;
  }

  .table th,
  .table td {
    background-color: transparent !important;
    border: 1px solid #dee2e6;
    /* Optional: Add light borders */
  }

  .text-muted {
    color: #6c757d;
  }

  .btn-link {
    text-decoration: none;
  }

  .btn-link:hover {
    text-decoration: underline;
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
    right: 0;
    /* Slide in from the right */
  }

  .modal-dialog {
    margin: 0;
    /* Ensure no margin when sliding */
    height: 100%;
  }

  .modal-body {
    padding: 20px;
    /* Add any styling you need for modal content */
  }

  #profitabilityModal .profitability-Details {
    max-width: 100%;
    width: 80%;
  }
</style>
<!-- NOTES END -->
<!-- PROFITABILITY START -->
<!-- PROFITABILITY START -->
<div class="modal fade right" id="profitabilityModal" tabindex="-1" aria-labelledby="profitabilityModalLabel" aria-hidden="true">

  <div class="activityModalcloseBtn" data-bs-dismiss="modal" aria-label="Close">
    X
  </div>
  <div>
    <div class="modal-dialog profitability-Details">
      <div class="modal-content">
        <!-- <div class="modal-header">
          <h5 class="modal-title" id="profitabilityModalLabel">Notes Details</h5>
        </div> -->
        <div class="d-flex align-items-center justify-content-between gap-3  px-3 py-2 my-activity-title mb-4 m-30 mt-2">
          <div style="font-size: 20px;">Notes</div>
        </div>
        <div class="modal-body notes-body">
          <div class="container-fluid h-100">
            <!-- Table Title -->
            <div class="table-title text-center mb-3">Profitability</div>
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
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
                <tbody>
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
      </div>
    </div>
  </div>
</div>

<style>
  #quotes-section a:hover {
    cursor: pointer;
    color: #36c !important;
    text-decoration: underline;
    transition: all 0.3s ease;
  }

  #quotes-section a {
    cursor: pointer;
    color: #36c !important;

  }


  /* Modal adjustments */
  .modal-dialog {
    height: 100vh;
    /* Ensure the modal resizes dynamically */
  }

  .modal-content {
    height: calc(100% - 70px);
    /* Full viewport height */
  }

  .modal-body {
    padding: 20px;
  }

  /* Table responsiveness */
  .table-responsive {
    max-height: calc(100vh - 200px);
    /* Prevent table overflow */
    overflow-y: auto;
  }

  .table {
    width: 100%;
    /* Table fits the modal */
    margin: 0;
    border-collapse: collapse;
    /* Cleaner table appearance */
  }

  .table-title {
    background: #010046;
    /* Dark blue background */
    font-size: 1.8rem;
    color: #ffffff;
    border-radius: 5px;
  }

  /* Header column styles */
  thead th {
    background-color: #b9f6ca !important;
    /* Light green */
    text-align: center;
  }

  /* Hover effect on table rows */
  tbody tr:hover {
    background-color: #f1f1f1 !important;
    transition: background-color 0.3s ease;
  }

  /* Right slide animation for the modal */
  .modal.right .modal-dialog {
    position: fixed;
    top: 0;
    right: -100%;
    height: 100%;
    transition: right 0.5s ease-in-out;
  }

  .modal.right.show .modal-dialog {
    right: 0;
    /* Slide in */
  }
</style>
<!-- PROFITABILITY END -->

<!-- FORECASt START -->
<div class="modal right fade" id="forecastModal" tabindex="-1" aria-labelledby="forecastModalLabel" aria-hidden="true">

  <div class="activityModalcloseBtn" data-bs-dismiss="modal" aria-label="Close">
    X
  </div>
  <div>
    <div class="modal-dialog Forecast-Details">
      <div class="modal-content">
        <!-- <div class="modal-header">
          <h5 class="modal-title" id="forecastModalLabel">Forecast Details</h5>
        </div> -->
        <div class="d-flex align-items-center justify-content-between gap-3  px-3 py-2 my-activity-title m-30 mt-2 mb-2">
          <div style="font-size: 20px;">Forecast</div>
        </div>
        <div class="forecast-body" style="overflow: auto;">
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
                                      <div class="col-10 w-100">
                                        <div class="table-responsive">
                                          <table class="table" id="datatable" width="100%">
                                            <thead>
                                              <tr>
                                                <th></th>
                                                <th></th>
                                                <th colspan="3" class="text-center">Q1</th>
                                                <th colspan="3" class="text-center">Q2</th>
                                                <th colspan="3" class="text-center">Q3</th>
                                                <th colspan="3" class="text-center">Q4</th>
                                              </tr>
                                              <tr>
                                                <th>Description</th>
                                                <th>Gross Figure</th>
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
                                      <div class="col-10 w-100">
                                        <div class="table-responsive">
                                          <table class="table" id="datatable" width="100%">
                                            <thead>
                                              <tr>
                                                <th></th>
                                                <th></th>
                                                <th colspan="3" class="text-center">Q1</th>
                                                <th colspan="3" class="text-center">Q2</th>
                                                <th colspan="3" class="text-center">Q3</th>
                                                <th colspan="3" class="text-center">Q4</th>
                                              </tr>
                                              <tr>
                                                <th>Description</th>
                                                <th>Gross Figure</th>
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
                                      <div class="col-10 w-100">
                                        <div class="table-responsive">
                                          <table class="table" id="datatable" width="100%">
                                            <thead>
                                              <tr>
                                                <th></th>
                                                <th></th>
                                                <th colspan="3" class="text-center">Q1</th>
                                                <th colspan="3" class="text-center">Q2</th>
                                                <th colspan="3" class="text-center">Q3</th>
                                                <th colspan="3" class="text-center">Q4</th>
                                              </tr>
                                              <tr>
                                                <th>Description</th>
                                                <th>Gross Figure</th>
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
</div>

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
    padding-right: 10px;
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

  #forecastModal .Forecast-Details {
    max-width: 100%;
    width: 80%
  }

  #forecastModal .forecast-body {
    width: 100%;
  }

  .forecast-container {
    left: -226px;
    width: 100%;
  }

  /* Custom CSS to slide modal in from the right */
  .modal.right .modal-dialog {
    position: fixed;
    top: 0;
    right: -100%;
    height: 100vh;
    width: 400px;
    transition: right 0.5s ease-in-out;
  }

  .modal.right.show .modal-dialog {
    right: 0;
    /* Slide in from the right */
  }

  .modal-dialog {
    margin: 0;
    /* Ensure no margin when sliding */
    height: 100%;
  }

  .modal-content {
    height: calc(100% - 70px);
  }

  .modal-body {
    padding: 20px;
    overflow-y: auto;
    /* Add any styling you need for modal content */
  }


  #price-quotes-tab {
    /* max-width: calc(100% - 254px); */
  }

  #sales-tab {
    /* max-width: calc(100% - 254px); */
  }

  .gt30Days {
    background-color: #068ebb;
    /* color: #155724; */
    color: white;
    border: 1px solid #c3e6cb;
  }

  .gt30Days:hover {
    background-color: #068ebb !important;
    color: white !important;
    border: 1px solid #c3e6cb !important;
  }

  .gt60Days {
    background-color: #198754;
    /* color: #155724; */
    color: white;
    /* border: 1px solid #c3e6cb; */
  }

  .gt60Days:hover {
    background-color: #198754 !important;
    color: white !important;
    /* border: 1px solid #c3e6cb !important; */
  }

  .gt90Days {
    background-color: #721c24;
    /* color: #155724; */
    color: white;
    /* border: 1px solid #c3e6cb; */
  }

  .gt90Days:hover {
    background-color: #721c24 !important;
    color: white !important;
    /* border: 1px solid #c3e6cb !important; */
  }

  #datatable th {
    min-width: 9rem;
  }
</style>
<!-- FORECAST END -->

<!-- MARKETING START -->
<div class="modal right fade" id="marketingModal" tabindex="-1" aria-labelledby="marketingModalLabel" aria-hidden="true">

  <div class="activityModalcloseBtn" data-bs-dismiss="modal" aria-label="Close">
    X
  </div>
  <div>
    <div class="modal-dialog marketing-Details">
      <div class="modal-content">
        <!-- <div class="modal-header">
          <h5 class="modal-title" id="marketingModalLabel">activity Details</h5>
        </div>
        <div class="modal-body marketing-body">

          <section class="dash-container tab-content" id="marketingTab" style="margin-inline: 0px;">
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
                                  <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                      <div>
                                        <h5>Marketing</h5>
                                      </div>
                                    </div>
                                  </div>
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
                                        <div class="form-group  col-12">
                                          <label class="col-form-label text-nowrap">Customer Actions</label>
                                          <div>
                                            <div data-bs-toggle="modal" data-bs-target="#marketingDialog" class="crdM">
                                              <div>Send Feedback forms</div>
                                            </div>

                                          </div>
                                        </div>
                                        <div class="form-group  col-12">
                                          <label class="col-form-label text-nowrap">Sales Boost</label>
                                          <div>
                                            <div data-bs-toggle="modal" data-bs-target="#marketingDialog" class="crdM">Specials</div>
                                          </div>
                                        </div>
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



        </div> -->

        <div class="d-flex align-items-center justify-content-between gap-3  px-3 py-2 my-activity-title mb-0 m-30 mt-2">
          <div style="font-size: 20px;">My Ledger</div>
        </div>
        <div style="padding-right: 3.35rem; padding-left: 2rem;">
          <!-- <h1>Ledger</h1> -->



          <div style="position: relative; height:95%">

            <div class="row mb-4 mt-4">
              <div class="col-md-2">
                <label for="from" class="form-label">From</label>
                <input type="date" placeholder="From" id="from" class="form-control">
              </div>
              <div class="col-md-2">
                <label for="to" class="form-label">To</label>
                <input type="date" id="to" placeholder="To" class="form-control">
              </div>
            </div>

            <div class="table-responsive">
              <table class="table table-bordered table-striped my-ledger-table">
                <thead>
                  <tr>
                    <th>Period</th>
                    <th style="min-width: 12rem;">Opening Balance</th>
                    <th>Invoice Amount</th>
                    <th>Credit Note Amount</th>
                    <th>TDS Amount</th>
                    <th>Deposit Amount</th>
                    <th>Closing Balance</th>
                    <!-- <th>Remarks</th> -->
                  </tr>

                </thead>
                <tbody>

                  <tr>
                    <td><a onclick="openPopupp2('Nov-2024')">Nov-2024</a></td>
                    <td>$12000</td>
                    <td>$10,000</td>
                    <td>$2,000</td>
                    <td>$3,000</td>
                    <td>$4,000</td>
                    <td>$1,000</td>
                    <!-- <td>Pending Payment</td> -->
                  </tr>
                  <tr>
                    <td><a onclick="openPopupp2('Dec-2024')">Dec-2024</a></td>
                    <td>$8000</td>
                    <td>$50,000</td>
                    <td>$5,000</td>
                    <td>$6,000</td>
                    <td>$7,000</td>
                    <td>$2,000</td>
                    <!-- <td>Follow-Up Required</td> -->
                  </tr>
                </tbody>
              </table>
            </div>
          </div>


          <!-- <div id="close" class="closeBtn" onclick="closePopupp()">
            X
          </div>
          <div id="popup" class="popup">
            <div style="position: relative; height:95%">



              <div class="mb-4 my-activity-title" style="margin-top: 0.6rem;">
                <div style="font-size: 20px;" id='popupTitle'></div>
              </div>

              <div class="row mb-4 mt-4">
                <div class="col-md-2">
                  <label for="from" class="form-label">From</label>
                  <input type="date" placeholder="From" id="from" class="form-control">
                </div>
                <div class="col-md-2">
                  <label for="to" class="form-label">To</label>
                  <input type="date" id="to" placeholder="To" class="form-control">
                </div>
              </div>

              <div class="table-responsive">
                <table class="table table-bordered table-striped my-ledger-table">
                  <thead class="table-dark">
                    <tr>
                      <th>Period</th>
                      <th style="min-width: 12rem;">Opening Balance</th>
                      <th>Invoice Amount</th>
                      <th>Credit Note Amount</th>
                      <th>TDS Amount</th>
                      <th>Deposit Amount</th>
                      <th>Closing Balance</th>
                    </tr>

                  </thead>
                  <tbody>

                    <tr>
                      <td><a onclick="openPopupp2('Nov-2024')">Nov-2024</a></td>
                      <td>$12000</td>
                      <td>$10,000</td>
                      <td>$2,000</td>
                      <td>$3,000</td>
                      <td>$4,000</td>
                      <td>$1,000</td>
                    </tr>
                    <tr>
                      <td><a onclick="openPopupp2('Dec-2024')">Dec-2024</a></td>
                      <td>$8000</td>
                      <td>$50,000</td>
                      <td>$5,000</td>
                      <td>$6,000</td>
                      <td>$7,000</td>
                      <td>$2,000</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

          </div> -->

          <div id="close2" class="closeBtn2" onclick="closePopupp2()">
            X
          </div>
          <div id="popup2" class="popup2">
            <div style="position: relative; height:95%">



              <div class="mb-4 mt-4 my-activity-title" style="margin-top: 1.9rem;">
                <div style="font-size: 20px;" id='popupTitle2'></div>
              </div>

              <div class="row mb-4 mt-4">
                <div class="col-md-2">
                  <label for="from" class="form-label">From</label>
                  <input type="date" placeholder="From" id="from" class="form-control">
                </div>
                <div class="col-md-2">
                  <label for="to" class="form-label">To</label>
                  <input type="date" id="to" placeholder="To" class="form-control">
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-bordered table-striped my-ledger-table">
                  <thead>
                    <tr>
                      <th>Period</th>
                      <th style="min-width: 12rem;">Opening Balance</th>
                      <th>Invoice Amount</th>
                      <th>Credit Note Amount</th>
                      <th>TDS Amount</th>
                      <th>Deposit Amount</th>
                      <th>Closing Balance</th>
                      <!-- <th>Remarks</th> -->
                    </tr>

                  </thead>
                  <tbody>

                    <tr>
                      <td>01-11-2024</td>
                      <td>$12000</td>
                      <td>$10,000</td>
                      <td>$2,000</td>
                      <td>$3,000</td>
                      <td>$4,000</td>
                      <td>$1,000</td>
                      <!-- <td>Pending Payment</td> -->
                    </tr>
                    <tr>
                      <td>02-11-2024</td>
                      <td>$8000</td>
                      <td>$50,000</td>
                      <td>$5,000</td>
                      <td>$6,000</td>
                      <td>$7,000</td>
                      <td>$2,000</td>
                      <!-- <td>Follow-Up Required</td> -->
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- <button style="position: absolute;bottom: 16px;" type="button" class="btn btn-primary btn1 w-100" onclick="closePopup()">Submit</button> -->
          </div>
        </div>
        <style>
          input {
            border-color: #0CAF60;
            box-shadow: 0 0 0 0.2rem rgba(12, 175, 96, 0.25);
          }

          .my-activity-title {
            background: #010046;
            color: white;
            height: 56px;
            border-radius: 4px;
            font-size: 32px;
            align-items: center;
            display: flex;
            justify-content: space-between;
            padding: 1rem;
          }

          .my-ledger-table a:hover {
            cursor: pointer;
            color: #36c !important;
            text-decoration: underline !important;
            transition: all 0.3s ease;
          }

          .my-ledger-table a {
            color: #36c !important;

          }


          .popup {

            overflow: auto;
            top: 50px;
            position: fixed;
            /* top: 0; */
            right: -100%;
            width: calc(100% - 265px);
            height: 90%;
            background: #f8f9fa;
            box-shadow: -2px 0px 5px rgba(0, 0, 0, 0.3);
            padding: 0 20px;
            transition: 0.5s ease;
            z-index: 10000;
          }

          .popup.open {
            right: 0;
            bottom: 0;
            margin: 20px 0 20px 20px;
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
            z-index: 10000;
          }

          .closeBtn.opened {
            right: calc(100% - 265px);
            top: 100px;
          }

          #popup input {
            border-radius: 0;
          }


          .popup2 {

            overflow: auto;
            top: 50px;
            position: fixed;
            /* top: 0; */
            right: -100%;
            width: calc(100% - 323px);
            height: 90%;
            background: #f8f9fa;
            box-shadow: -2px 0px 5px rgba(0, 0, 0, 0.3);
            padding: 0 20px;
            transition: 0.5s ease;
            z-index: 10000;
          }

          .popup2.open {
            right: 0;
            bottom: 0;
            margin: 20px 0 20px 20px;
          }

          .closeBtn2 {
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
            z-index: 10000;
          }

          .closeBtn2.opened {
            right: calc(100% - 323px);
            top: 93px;
          }


          @keyframes shake {

            0%,
            100% {
              transform: translateX(0);
            }

            20%,
            60% {
              transform: translateX(-5px);
            }

            40%,
            80% {
              transform: translateX(5px);
            }
          }

          .shake {
            animation: shake 0.5s ease-in-out;
          }
        </style>
        <script>
          function openPopup(name) {
            // Access the child element using its id
            const popupTitle = document.getElementById('popupTitle');

            // Change the text content
            popupTitle.textContent = name;

            document.getElementById('popup').classList.add('open');
            document.getElementById('close').classList.add('opened');
          }

          function closePopup() {
            document.getElementById('popup').classList.remove('open');
            document.getElementById('close').classList.remove('opened');

          }

          function openPopupp(name) {
            const popupTitle = document.getElementById('popupTitle');
            popupTitle.textContent = name;
            document.getElementById('popup').classList.add('open');
            document.getElementById('close').classList.add('opened');
          }

          function closePopupp() {
            if (document.getElementById('popup2').classList.contains('open')) {
              // Add shake animation to the close button of popup2
              const closeBtn2 = document.getElementById('close2');
              closeBtn2.classList.add('shake');

              // Remove the shake class after the animation completes
              setTimeout(() => closeBtn2.classList.remove('shake'), 500);

              // alert("Please close the second popup before closing the first popup.");
              return;
            }
            if (document.getElementById('popup21').classList.contains('open')) {
              // Add shake animation to the close button of popup2
              const closeBtn2 = document.getElementById('close21');
              closeBtn2.classList.add('shake');

              // Remove the shake class after the animation completes
              setTimeout(() => closeBtn2.classList.remove('shake'), 500);

              // alert("Please close the second popup before closing the first popup.");
              return;
            }

            document.getElementById('popup').classList.remove('open');
            document.getElementById('close').classList.remove('opened');
          }

          function openPopupp2(name) {
            document.getElementById('popupTitle2').textContent = name;;
            document.getElementById('popupTitle21').textContent = name;;

            document.getElementById('popup2').classList.add('open');
            document.getElementById('close2').classList.add('opened');
            document.getElementById('popup21').classList.add('open');
            document.getElementById('close21').classList.add('opened');
          }

          function closePopupp2() {
            document.getElementById('popup2').classList.remove('open');
            document.getElementById('close2').classList.remove('opened');
            document.getElementById('popup21').classList.remove('open');
            document.getElementById('close21').classList.remove('opened');
          }
        </script>
      </div>
    </div>
  </div>
</div>
<div class="modal fade mrD" id="marketingDialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" id="modal-right">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Campaign</h5>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
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

  function toggleCheckboxes() {
    const accountCheckbox = document.getElementById('Account');
    const dependentCheckboxes = document.querySelectorAll('.dependent-checkbox');

    dependentCheckboxes.forEach((checkbox) => {
      checkbox.style.display = accountCheckbox.checked ? 'inline-block' : 'none';
    });
  }
</script>
<style type="text/css">
  .text-nowrap {
    font-size: 1.0rem;
  }

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

  #marketingModal .marketing-Details {
    max-width: 100%;
    width: 80%
  }

  #marketingModal .marketing-body {
    width: 100%;
  }

  .marketing-container {
    left: -226px;
    width: 100%;
  }

  #relationTab {
    overflow: auto;
    padding: 0px 1rem 0 2rem;
  }

  .ratings {
    display: flex;
    gap: 20px;
  }

  .rating {
    display: flex;
    align-items: center;
    font-size: 1.2em;
    font-weight: bold;
  }

  .rating .icon {
    font-size: 2.5em;
    margin-right: 10px;
  }

  .diamond {
    color: #b9f2ff;
  }

  .platinum {
    color: #e5e4e2;
  }

  .gold {
    color: #ffd700;
  }

  .silver {
    color: #c0c0c0;
  }

  .bronze {
    color: #cd7f32;
  }

  .graph.up {
    color: green;
    /* For upward trend */
  }

  .graph.down {
    color: red;
    /* For downward trend */
  }
</style>
<!-- MARKETING END -->

<!-- RELATION SHIP START -->
<div class="modal right fade" id="relationshipModal" tabindex="-1" aria-labelledby="relationshipModalLabel" aria-hidden="true">
  <div class="activityModalcloseBtn" data-bs-dismiss="modal" aria-label="Close">
    X
  </div>
  <div>
    <div class="modal-dialog relationship-Details">
      <div class="modal-content">
        <!-- <div class="modal-header">
          <h5 class="modal-title" id="relationshipModalLabel">activity Details</h5>
        </div> -->
        <div class="d-flex align-items-center justify-content-between gap-3  px-3 py-2 my-activity-title mb-4 m-30 mt-2">
          <div style="font-size: 20px;">Relationship</div>
        </div>

        <section id="relationTab">
          <div class="card table-card">
            <div class="card-header">
              <h5>Account Status</h5>
            </div>
            <div class=" card-body pt-0 table-border-style bg-none">
              <div class="row">
                <div class="col-md-5">
                  <h5>Relationship Stage</h5>
                  <div class="form-check me-4 mb-4 mt-3">
                    <input class="form-check-input" type="checkbox" value="" id="lead">
                    <label class="form-check-label" for="lead">Lead</label>
                  </div>
                  <div class="form-check me-4 mb-4">
                    <input class="form-check-input" type="checkbox" value="" id="Opportunity">
                    <label class="form-check-label" for="Opportunity">Opportunity</label>
                  </div>
                  <div style="display: flex;" class="mb-4">
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="checkbox"
                        id="Account"
                        onchange="toggleCheckboxes()" />
                      <label class="form-check-label" for="Account">Account</label>
                    </div>

                    <span style="margin-left: 1rem; display: none;" class="dependent-checkbox">
                      <input class="form-check-input" type="checkbox" id="Active" />
                      <label class="form-check-label" for="Active">Active</label>
                    </span>
                    <span style="margin-left: 1rem; display: none;" class="dependent-checkbox">
                      <input class="form-check-input" type="checkbox" id="Sleeping" />
                      <label class="form-check-label" for="Sleeping">Sleeping</label>
                    </span>
                    <span style="margin-left: 1rem; display: none;" class="dependent-checkbox">
                      <input class="form-check-input" type="checkbox" id="Inactive" />
                      <label class="form-check-label" for="Inactive">Inactive</label>
                    </span>
                  </div>

                </div>
                <div class="col-md-4">
                  <h5>Account Priority</h5>
                  <div class="ratings">
                    <div class="rating diamond">
                      <span class="icon">💎</span>
                      <span class="label">Diamond</span>
                    </div>
                    <!-- <div class="rating platinum">
                      <span class="icon">🏆</span>
                      <span class="label">Platinum</span>
                    </div>
                    <div class="rating gold">
                      <span class="icon">🥇</span>
                      <span class="label">Gold</span>
                    </div>
                    <div class="rating silver">
                      <span class="icon">🥈</span>
                      <span class="label">Silver</span>
                    </div>
                    <div class="rating bronze">
                      <span class="icon">🥉</span>
                      <span class="label">Bronze</span>
                    </div> -->
                  </div>
                </div>
                <div class="col-md-3">
                  <h5>Lifecycle Stage</h5>
                  <div class="form-check me-4 mb-4 mt-3">
                    <input class="form-check-input" type="checkbox" value="" id="New">
                    <label class="form-check-label" for="New">New</label>
                  </div>
                  <div class="form-check me-4 mb-4">
                    <input class="form-check-input" type="checkbox" value="" id="Retained">
                    <label class="form-check-label" for="Retained">Retained</label>
                  </div>
                  <div class="form-check me-4 mb-4">
                    <input class="form-check-input" type="checkbox" value="" id="Revived">
                    <label class="form-check-label" for="Revived">Revived</label>
                  </div>
                </div>
              </div>


            </div>
          </div>

          <div class="card table-card">
            <div class="card-header">
              <h5>Relationship Health Monitoring</h5>
            </div>
            <div class=" card-body pt-0 table-border-style bg-none">
              <div class="row">

                <div class="form-group  col-md-4 col-12">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="business_name" class="col-form-label whitespace-nowrap">Health Score </label>
                      <div class="flex-grow">
                        <input type="text" class="form-control" name="business_name" value="Good" disabled>
                      </div>

                    </div>
                    <div class="col-md-6">
                      <span class="graph up" style="font-size: 4rem;">📈</span>
                    </div>
                    <!-- 📉 -->
                  </div>
                </div>
                <div class="form-group  col-md-4 col-12">
                  <label for="business_name" class="col-form-label whitespace-nowrap">Net Promoter Score (NPS)</label>
                  <div class="row">
                    <input type="text" class="form-control col-md-5" style="width: 15%;" name="business_name" disabled value="8">
                    <span class=" col-md-2" style="width: 10%;">/</span>
                    <input type="text" class="form-control  col-md-5" style="width: 15%;" name="business_name" disabled value="10">
                  </div>
                </div>
                <div class="form-group  col-md-4 col-12">
                  <label for="business_name" class="col-form-label whitespace-nowrap"> Customer Satisfaction Score (CSAT) </label>
                  <div class="row">
                    <input type="text" class="form-control col-md-5" style="width: 15%;" name="business_name" disabled value="7">
                    <span class=" col-md-2 " style="width: 10%;">/</span>
                    <input type="text" class="form-control  col-md-5" style="width: 15%;" name="business_name" disabled value="10">
                  </div>
                </div>
                <div class="form-group   col-lg-4 col-12">
                  <label class="col-form-label text-nowrap">Return on iInvestment (ROI) </label>
                  <input style="width: 50%;" type="text" class="form-control">
                </div>
              </div>
            </div>
          </div>

          <div class="card table-card">
            <div class="card-header">
              <h5>Account Details</h5>
            </div>
            <div class=" card-body pt-0 table-border-style bg-none row">
              <div class="form-group   col-lg-4 col-12">
                <label class="col-form-label text-nowrap">Account Code </label>
                <input type="text" class="form-control">
              </div>
              <div class="form-group   col-lg-4 col-12">
                <label class="col-form-label text-nowrap">Account Name </label>
                <input type="text" class="form-control">
              </div>
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
              <div class="form-group  col-lg-4 col-12">
                <label class="col-form-label whitespace-nowrap">Account Risk Profile</label>
                <div class="flex-grow">
                  <select class="form-control">
                    <option> Select</option>
                    <option> 1</option>
                    <option> 2</option>
                    <option>3</option>
                    <option> 4</option>
                    <option> 5</option>
                  </select>
                </div>
              </div>
              <div class="form-group col-lg-4 col-12">
                <label class="col-form-label">Assigned Logistics Route</label>
                <input type="text" class="form-control ">
              </div>
              <div class="form-group col-lg-4 col-12">
                <label class="col-form-label">Kilometer from TDPL Lab</label>
                <input type="text" class="form-control ">
              </div>
              <div class="form-group col-lg-4 col-12">
                <label class="col-form-label">Assigned Monthly Credit Limit</label>
                <input type="text" class="form-control ">
              </div>
              <div class="form-group col-lg-4 col-12">
                <label class="col-form-label">No. Of Credit Locks Per Month</label>
                <input type="text" class="form-control ">
              </div>
              <div class="form-group col-lg-4 col-12">
                <label class="col-form-label">No. Of Payment Locks Per Month</label>
                <input type="text" class="form-control ">
              </div>
            </div>
          </div>

          <div class="card table-card">
            <div class="card-header">
              <h5>Key Metrics</h5>
            </div>
            <div class=" card-body pt-0 table-border-style bg-none row">
              <div class="form-group col-lg-4 col-12">
                <label class="col-form-label">Customer Lifecycle Value (CLV in Rs.)</label>
                <input type="text" class="form-control ">
              </div>
              <div class="form-group col-lg-4 col-12">
                <label class="col-form-label">Churn Prediction Score</label>
                <input type="text" class="form-control ">
              </div>
              <div class="form-group col-lg-4 col-12">
                <label class="col-form-label">Customer Efforts Score</label>
                <input type="text" class="form-control ">
              </div>
              <div class="form-group  col-lg-4  col-12">
                <label class="col-form-label">Customer Satisfaction index on Complaint Resolution</label>
                <input type="text" class="form-control">
              </div>
            </div>
          </div>

          <div class="card table-card">
            <div class="card-header">
              <h5>Contact & Engagement</h5>
            </div>
            <div class=" card-body pt-0 table-border-style bg-none row ">
              <div class="form-group col-lg-4 col-12">
                <label class="col-form-label">Account Owner (BDE/TM)</label>
                <input type="text" class="form-control ">
              </div>
              <div class="form-group col-lg-4 col-12">
                <label class="col-form-label">Account Manager (ASM)</label>
                <input type="text" class="form-control ">
              </div>
              <div class="form-group col-lg-4 col-12">
                <label class="col-form-label"> Account Relationship Manager (RSM) </label>
                <input type="text" class="form-control ">
              </div>

              <div class="form-group col-lg-4 col-12">
                <label class="col-form-label">Mandatory Account Visits per Month</label>
                <input type="text" class="form-control ">
              </div>
              <div class="form-group col-lg-4 col-12">
                <label class="col-form-label">Avg Account Visits per Month</label>
                <input type="text" class="form-control ">
              </div>
              <div class="form-group col-lg-4 col-12">
                <label class="col-form-label">Participations In Customer Survey</label>
                <div class="row" style="margin-left: 0.5rem;">
                  <input type="text" class="form-control col-md-5" style="width: 15%;" disabled value="8">
                  <span class=" col-md-2" style="width: 10%;">/</span>
                  <input type="text" class="form-control  col-md-5" style="width: 15%;" disabled value="10">
                </div>
              </div>
              <div class="form-group col-lg-4 col-12">
                <label class="col-form-label">Involvment In No. Of PR / Month Activity</label>
                <input type="text" class="form-control ">
              </div>
              <div class="form-group col-lg-4 col-12">
                <label class="col-form-label">Response From PR / Month Activity</label>
                <div class="row" style="margin-left: 0.5rem;">
                  <input type="text" class="form-control col-md-5" style="width: 15%;" disabled value="8">
                  <span class=" col-md-2" style="width: 10%;">/</span>
                  <input type="text" class="form-control  col-md-5" style="width: 15%;" disabled value="10">
                </div>
              </div>
              <div class="form-group col-lg-4 col-12">
                <label class="col-form-label">Response Rate</label>
                <input type="text" class="form-control ">
              </div>



            </div>
          </div>




          <div class="card table-card">
            <div class="card-header">
              <h5>Tasks & Follow-Up Management</h5>
            </div>
            <div class=" card-body pt-0 table-border-style bg-none row">
              <div class="form-group col-lg-4 col-12">
                <label class="col-form-label">Total No. of Account Tasks Per Month</label>
                <input type="text" class="form-control ">
              </div>
              <div class="form-group col-lg-4 col-12">
                <label class="col-form-label">Total No. of Tasks Completed Within Due Date</label>
                <input type="text" class="form-control ">
              </div>
              <div class="form-group col-lg-4 col-12">
                <label class="col-form-label">Total No. of Tasks Completed Post Due Date</label>
                <input type="text" class="form-control ">
              </div>
              <div class="form-group col-lg-4 col-12">
                <label class="col-form-label">Total Task Completion Rate</label>
                <input type="text" class="form-control ">
              </div>
              <div class="form-group col-lg-4 col-12">
                <label class="col-form-label">Total Task Completion Rate Within Due Date</label>
                <input type="text" class="form-control ">
              </div>
              <div class="form-group col-lg-4 col-12">
                <label class="col-form-label">Total Task Completion Rate Post Due Date</label>
                <input type="text" class="form-control ">
              </div>
              <div class="form-group col-lg-4 col-12">
                <label class="col-form-label">Task Response Time</label>
                <input type="text" class="form-control ">
              </div>
              <div class="form-group col-lg-4 col-12">
                <label class="col-form-label">Total No. Of Follow-ups Per Month</label>
                <input type="text" class="form-control ">
              </div>
              <div class="form-group col-lg-4 col-12">
                <label class="col-form-label">Follow-ups Completed Rate</label>
                <input type="text" class="form-control ">
              </div>
              <div class="form-group col-lg-4 col-12">
                <label class="col-form-label">Task Follow-ups Time</label>
                <input type="text" class="form-control ">
              </div>
            </div>
          </div>

          <div class="card table-card">
            <div class="card-header">
              <h5>Deal & Opportunity Tracking</h5>
            </div>
            <div class=" card-body pt-0 table-border-style bg-none row">
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
          </div>

          <div class="card table-card">
            <div class="card-header">
              <h5>Support & Issue Management</h5>
            </div>
            <div class=" card-body pt-0 table-border-style bg-none row">
              <div class="form-group  col-md-4  col-12">
                <label class="col-form-label">Number of Tickets Received</label>
                <input type="text" class="form-control ">
              </div>
              <div class="form-group col-md-4 col-12">
                <label class="col-form-label">Number of Complaints Received</label>
                <input type="text" class="form-control ">
              </div>
              <div class="form-group col-md-4 col-12">
                <label class="col-form-label">Number of Complaints Resolved</label>
                <input type="text" class="form-control ">
              </div>
              <div class="form-group col-md-4 col-12">
                <label class="col-form-label">Response Rate</label>
                <input type="text" class="form-control ">
              </div>
            </div>
          </div>

        </section>


      </div>
    </div>
  </div>
</div>
<style>
  #relationshipModal .relationship-Details {
    max-width: 100%;
    width: 80%
  }

  #relationshipModal .relationship-body {
    overflow: auto;
  }

  .relationship-container {
    left: -226px;
    width: 100%;
  }

  .modal.right .modal-dialog {
    position: fixed;
    top: 0;
    right: -100%;
    height: 100%;
    width: 400px;
    transition: right 0.5s ease-in-out;
  }

  .modal.right.show .modal-dialog {
    right: 0;
    /* Slide in from the right */
  }

  .modal-dialog {
    margin: 0;
    /* Ensure no margin when sliding */
    height: 100%;
  }

  .modal-body {
    padding: 20px;
    /* Add any styling you need for modal content */
  }
</style>
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

  .fxInp {
    width: 400px;
  }

  .mrDSbHd {
    font-size: 17px;
    font-weight: 700;
  }
</style>
<!-- RELATION SHIP END -->
@endsection