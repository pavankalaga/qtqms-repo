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
<div id="lead-form-container">
<form id="lead-form" method="POST" enctype="multipart/form-data">
               @csrf
<section style="width: calc(100% - 254px);" class="dash-container tab-content">
  <input type="hidden" name="record_id" id="record_id" value="{{$report->id}}">
  <div class="dash-content tab-pane fade show active" id="business-details-tab" role="tabpanel" aria-labelledby="profile-tab">
    <div class="row">
      <div class="col-12 mb-3">
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
                                      <option value="Hospital" {{old('business_type' , $report->business_type) == 'Hospital' ? 'selected' : ''}}>Hospital</option>
                                      <option value="Diagnostic Center" {{old('business_type' , $report->business_type) == 'Diagnostic Center' ? 'selected' : ''}}>Diagnostic Center</option>
                                      <option value="Independent Doctor" {{old('business_type' , $report->business_type) == 'Independent Doctor' ? 'selected' : ''}}>Independent Doctor</option>
                                      <option value="Registered Medical Practitioner" {{old('business_type' , $report->business_type) == 'Registered Medical Practitioner' ? 'selected' : ''}}> Registered Medical Practitioner</option>
                                      <option value="Clinic" {{old('business_type' , $report->business_type) == 'Clinic' ? 'selected' : ''}}>Clinic</option>
                                      <option value="Clinical Research Business" {{old('business_type' , $report->business_type) == 'Clinical Research Business' ? 'selected' : ''}}> Clinical Research Business</option>
                                      <option value="Government Agency" {{old('business_type' , $report->business_type) == 'Government Agency' ? 'selected' : ''}}>Government Agency</option>
                                    </select> @error('business_type') <span class="text-danger small">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="form-group   col-lg-4 col-12">
                                    <label for="legal_business_type" class="col-form-label text-nowrap required">Legal Business Type: </label>
                                    <select id="legal_business_type" name="legal_business_type" class="form-control" name="legal_business_type">
                                      <option value="">Select Legal Business Type </option>
                                      <option value="Incorporated" {{old('business_type' , $report->business_type) == 'Incorporated' ? 'selected' : ''}}>Incorporated </option>
                                      <option value="Partnership" {{old('business_type' , $report->business_type) == 'Partnership' ? 'selected' : ''}}>Partnership</option>
                                      <option value="LLP" {{old('business_type' , $report->business_type) == 'LLP' ? 'selected' : ''}}>LLP</option>
                                      <option value="Sole Proprietor" {{old('business_type' , $report->business_type) == 'Sole Proprietor' ? 'selected' : ''}}>Sole Proprietor </option>
                                    </select> @error('legal_business_type') <span class="text-danger small">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="form-group  col-lg-4 col-12">
                                    <label for="business_name" class=" whitespace-nowrap col-form-label required"> Registered Business Name: </label>
                                    <div class="flex-grow">
                                      <input type="text" class="form-control" id="business_name" name="business_name" placeholder="Enter Your Registered Business Name" value="{{ old('business_name' , $report->business_name) }}" required> @error('business_name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                  </div>
                                  <div class="form-group  col-lg-4 col-12">
                                    <label for="trading_name" class="col-form-label whitespace-nowrap"> Trading Name: </label>
                                    <div class="flex-grow">
                                      <input type="text" class="form-control" id="trading_name" name="trading_name" placeholder="Enter Your Trading Name" value="{{ old('trading_name' , $report->trading_name) }}"> @error('trading_name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                  </div>
                                  <div class="form-group  col-lg-4 col-12">
                                    <label for="registered_no" class="col-form-label whitespace-nowrap">Registered No: </label>
                                    <div class="flex-grow">
                                      <input type="text" class="form-control" id="registered_no" placeholder="Enter Your Registered No" name="registered_no" value="{{ old('registered_no' , $report->registered_no) }}">  @error('registered_no') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                  </div>
                                  <div class="form-group  col-lg-4 col-12">
                                    <label for="registered_no_expiry" class="col-form-label whitespace-nowrap">Registration Expiry : </label>
                                    <div class="flex-grow">
                                      <input type="date" class="form-control" id="registered_no_expiry" name="registered_no_expiry" value="{{ old('registered_no_expiry' , $report->registered_no_expiry) }}"> @error('registered_no_expiry') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                  </div>
                                  <div class="form-group col-lg-4 col-12">
                                    <label for="incorporation_date" class="col-form-label">Incorporation Date:</label>
                                    <input type="date" id="incorporation_date" class="form-control" name="incorporation_date" value="{{old('incorporation_date' , $report->incorporation_date)}}"> @error('incorporation_date') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="form-group col-lg-4 col-12">
                                    <label for="incorporation_no" class="col-form-label">INC No:</label>
                                    <input type="number" id="incorporation_no" placeholder="Enter Your Inc No" class="form-control" name="incorporation_no" value="{{ old('incorporation_no' , $report->incorporation_no) }}"> @error('incorporation_no') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="form-group col-lg-4 col-12">
                                    <label for="inc_state" class="col-form-label">INC State:</label>
                                    <select class="form-control" name="inc_state">
                                      <option> Select</option>
                                    </select>
                                  </div>
                                  <div class="form-group col-lg-4 col-12">
                                    <label for="pan_no" class="col-form-label">PAN No:</label>
                                    <input type="text" class="form-control small-placeholder" id="pan_no" placeholder="Enter Your PAN No" name="pan_no" value="{{old('pan_no',$report->pan_no)}}"> @error('pan_no') <span class="text-danger small">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="form-group col-lg-4 col-12">
                                    <label for="tan_no" class="col-form-label">TAN No:</label>
                                    <input type="number" class="form-control small-placeholder" id="tan_no" placeholder="Enter Your TAN No" name="tan_no" value="{{old('tan_no' , $report->tan_no)}}"> @error('tan_no') <span class="text-danger small">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="form-group col-lg-4 col-12">
                                    <label for="gst_no" class="col-form-label">GST No:</label>
                                    <input type="number" class="form-control small-placeholder" id="gst_no" placeholder="Enter Your GST No" name="gst_no" value="{{old('gst_no', $report->gst_no)}}"> @error('gst_no') <span class="text-danger small">{{ $message }}</span> @enderror
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
                                    <label for="address1" class="col-form-label">Address 1: </label>
                                    <input type="text" class="form-control small-placeholder" id="address1" placeholder="Enter Address" name="address1" value="{{old('address1',$AddressDetails->address1)}}"> @error('address1') <span class="text-danger small">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="form-group col-lg-4">
                                    <label for="address2" class="col-form-label">Address 2: </label>
                                    <input type="text" class="form-control small-placeholder" id="address2" placeholder="Enter Address" name="address2" value="{{old('address2',$AddressDetails->address2)}}"> @error('address2') <span class="text-danger small">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="form-group col-lg-4 col-12">
                                    <label for="city" class="col-form-label">City: </label>
                                    <input type="text" class="form-control small-placeholder" id="city" placeholder="City" name="city" value="{{old('city',$AddressDetails->city)}}"> @error('city') <span class="text-danger small">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="form-group col-lg-4 col-12">
                                    <label for="city" class="col-form-label">State: </label>
                                    <input type="text" class="form-control small-placeholder" id="state" placeholder="State" name="state" value="{{old('state',$AddressDetails->state)}}"> @error('city') <span class="text-danger small">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="form-group col-lg-4 col-12">
                                    <label for="pincode" class="col-form-label">Pincode: </label>
                                    <input type="number" class="form-control small-placeholder" id="pincode" placeholder="Pincode" name="pincode" minlength="6" maxlength="6" value="{{old('pincode',$AddressDetails->pincode)}}"> @error('pincode') <span class="text-danger small">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="form-group col-lg-4 col-12">
                                    <label for="salesheadquarter" class="col-form-label">Sales HeadQuarters: </label>
                                    <select name="salesheadquarter" class="form-select ">
                                      <option selected>Choose...</option> @foreach ($sales_head_quarters as $sales) <option value="{{ $sales->id }}" {{old('salesheadquarter',$AddressDetails->salesheadquarter) == $sales->id ? 'selected' :''}}>
                                        {{ $sales->name }}
                                      </option> @endforeach
                                    </select> @error('pincode') <span class="text-danger small">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="form-group col-lg-4 col-12">
                                    <label for="phone" class="col-form-label">Phone: </label>
                                    <input type="number" class="form-control small-placeholder" id="phone" placeholder="Enter Your Phone Number" name="phone" minlength="10" maxlength="10" value="{{old('phone',$AddressDetails->phone)}}" /> @error('phone') <span class="text-danger small">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="form-group col-lg-4 col-12">
                                    <label for="alternate_phone" class="col-form-label">Alternative Phone: </label>
                                    <input type="number" class="form-control small-placeholder" id="alternate_phone" placeholder="Alternate Phone" value="{{old('alternate_phone',$AddressDetails->alternate_phone)}}" name="alternate_phone" minlength="10" maxlength="10"> @error('alternate_phone') <span class="text-danger small">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="form-group col-lg-4 col-12">
                                    <label for="alternate_phone" class="col-form-label">Whatsapp No: </label>
                                    <input type="number" class="form-control small-placeholder" id="company_whatsapp" placeholder="Enter Whatsapp Number" value="{{old('company_whatsapp',$AddressDetails->company_whatsapp)}}" name="company_whatsapp" minlength="10" maxlength="10"> @error('company_whatsapp') <span class="text-danger small">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="form-group col-lg-4 col-12">
                                    <label for="email" class="col-form-label">Email: </label>
                                    <input type="email" class="form-control small-placeholder" id="email" placeholder="Enter Your Email" name="email" value="{{old('email' , $AddressDetails->email)}}" /> @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                                  </div>
                                  <div class="form-group col-lg-4 col-12">
                                    <label for="website" class="col-form-label">Website: </label>
                                    <input type="text" class="form-control small-placeholder" id="website" placeholder="Website" name="website" value="{{old('website' , $AddressDetails->website)}}"> @error('website') <span class="text-danger small">{{ $message }}</span> @enderror
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
                            <label for="facebook" class="col-form-label">Facebook: </label>
                            <input type="text" class="form-control small-placeholder" id="facebook" placeholder="Enter Facebook URL" name="facebook" value="{{old('feedback', $SocialMedia?->facebook)}}"> @error('facebook') <span class="text-danger small">{{ $message }}</span> @enderror
                          </div>
                          <div class="form-group col-lg-4 col-12">
                            <label for="instagram" class="col-form-label">Instagram: </label>
                            <input type="text" class="form-control small-placeholder" id="instagram" placeholder="Enter Instagram URL" name="instagram" value="{{old('instagram',$SocialMedia?->instagram)}}"> @error('instagram') <span class="text-danger small">{{ $message }}</span> @enderror
                          </div>
                          <div class="form-group col-lg-4 col-12">
                            <label for="twitter" class="col-form-label">Twitter: </label>
                            <input type="text" class="form-control small-placeholder" id="twitter" placeholder="Enter Twitter URL" name="twitter"value="{{old('twitter',$SocialMedia?->twitter)}}" > @error('twitter') <span class="text-danger small">{{ $message }}</span> @enderror
                          </div>
                          <div class="form-group col-lg-4 col-12">
                            <label for="linkedin" class="col-form-label">Linkedin: </label>
                            <input type="text" class="form-control small-placeholder" id="linkedin" placeholder="Enter Linkedin URL" name="linkedin" value="{{old('linkedin',$SocialMedia?->linkedin)}}"> @error('linkedin') <span class="text-danger small">{{ $message }}</span> @enderror
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
                                    @foreach($contact_details as $index => $contact)
                                    <div class="row new-contact-row">
                                        <div class="form-group col-sm-6 col-lg-4">
                                            <label for="salutation" class="col-form-label">Salutation:</label>
                                            <select class="form-control select2" name="contacts[{{ $index }}][salutation]">
                                                <option value="">Select salutation</option>
                                                <option value="Dr." {{ $contact->salutation == 'Dr.' ? 'selected' : '' }}>Dr.</option>
                                                <option value="Mr." {{ $contact->salutation == 'Mr.' ? 'selected' : '' }}>Mr.</option>
                                                <option value="Mrs." {{ $contact->salutation == 'Mrs.' ? 'selected' : '' }}>Mrs.</option>
                                                <option value="Ms." {{ $contact->salutation == 'Ms.' ? 'selected' : '' }}>Ms.</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6 col-lg-4">
                                            <label for="first_name" class="col-form-label">First Name</label>
                                            <input type="text" class="form-control" name="contacts[{{ $index }}][first_name]" value="{{ $contact->first_name }}" placeholder="Enter First Name">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="last_name" class="col-form-label">Last Name</label>
                                            <input type="text" class="form-control" name="contacts[{{ $index }}][last_name]" value="{{ $contact->last_name }}" placeholder="Enter Last Name">
                                        </div>
                                        <div class="form-group col-sm-6 col-lg-4">
                                            <label for="department" class="col-form-label">Department</label>
                                            <input type="text" class="form-control" name="contacts[{{ $index }}][department]" value="{{ $contact->department }}" placeholder="Enter Department">
                                        </div>
                                        <div class="form-group col-sm-6 col-lg-4">
                                            <label for="designation" class="col-form-label">Designation</label>
                                            <input type="text" class="form-control" name="contacts[{{ $index }}][designation]" value="{{ $contact->designation }}" placeholder="Enter Designation">
                                        </div>
                                        <div class="form-group col-sm-6 col-lg-4">
                                            <label for="authority" class="col-form-label">Authority</label>
                                            <input type="text" class="form-control" name="contacts[{{ $index }}][authority]" value="{{ $contact->authority }}" placeholder="Enter Authority">
                                        </div>
                                        <div class="form-group col-sm-6 col-lg-4">
                                            <label for="mobile_no" class="col-form-label">Mobile No</label>
                                            <input type="number" class="form-control" name="contacts[{{ $index }}][mobile_no]" value="{{ $contact->mobile_no }}" placeholder="Enter Mobile No.">
                                        </div>
                                        <div class="form-group col-sm-6 col-lg-4">
                                            <label for="whats_phone" class="col-form-label">Whatsapp No</label>
                                            <input type="number" class="form-control" name="contacts[{{ $index }}][whats_phone]" value="{{ $contact->whats_phone }}" placeholder="Enter Whatsapp Number">
                                        </div>
                                        <div class="form-group col-sm-6 col-lg-4">
                                            <label for="office_phone" class="col-form-label">Office Phone</label>
                                            <input type="number" class="form-control" name="contacts[{{ $index }}][office_phone]" value="{{ $contact->office_phone }}" placeholder="Enter Office Phone Number">
                                        </div>
                                        <div class="form-group col-sm-6 col-lg-4">
                                            <label for="office_email" class="col-form-label">Office Email</label>
                                            <input type="email" class="form-control" name="contacts[{{ $index }}][office_email]" value="{{ $contact->office_email }}" placeholder="Enter Office Email">
                                        </div>
                                        <div class="form-group col-sm-6 col-lg-4">
                                            <label for="personal_email" class="col-form-label">Personal Email</label>
                                            <input type="email" class="form-control" name="contacts[{{ $index }}][personal_email]" value="{{ $contact->personal_email }}" placeholder="Enter Personal Email">
                                        </div>
                                        <div class="form-group col-sm-6 col-lg-4">
                                            <label for="fb_id" class="col-form-label">Facebook Id</label>
                                            <input type="text" class="form-control" name="contacts[{{ $index }}][fb_id]" value="{{ $contact->fb_id }}" placeholder="Enter Facebook Id">
                                        </div>
                                        <div class="form-group col-sm-6 col-lg-4">
                                            <label for="insta_id" class="col-form-label">Instagram Id</label>
                                            <input type="text" class="form-control" name="contacts[{{ $index }}][insta_id]" value="{{ $contact->insta_id }}" placeholder="Enter Instagram Id">
                                        </div>
                                        <div class="form-group col-sm-6 col-lg-4">
                                            <label for="twitter_id" class="col-form-label">Twitter (X)</label>
                                            <input type="text" class="form-control" name="contacts[{{ $index }}][twitter_id]" value="{{ $contact->twitter_id }}" placeholder="Enter Twitter Id">
                                        </div>
                                        <div class="form-group col-sm-6 col-lg-4">
                                            <label for="linked_id" class="col-form-label">Linkedin</label>
                                            <input type="text" class="form-control" name="contacts[{{ $index }}][linked_id]" value="{{ $contact->linked_id }}" placeholder="Enter Linkedin Id">
                                        </div>
                                        <div class="form-group col-sm-6 col-lg-4">
                                            <label for="birthday" class="col-form-label">Birthday</label>
                                            <input type="date" class="form-control" name="contacts[{{ $index }}][birthday]" value="{{ $contact->birthday }}">
                                        </div>
                                        <div class="form-group col-sm-6 col-lg-4">
                                            <label for="anniversary" class="col-form-label">Anniversary</label>
                                            <input type="date" class="form-control" name="contacts[{{ $index }}][anniversary]" value="{{ $contact->anniversary }}">
                                        </div>
                                        <div class="form-group col-sm-6 col-lg-4">
                                            <label for="reli_belief" class="col-form-label">Religious Belief</label>
                                            <input type="text" class="form-control" name="contacts[{{ $index }}][reli_belief]" value="{{ $contact->reli_belief }}" placeholder="Enter Religious Belief">
                                        </div>
                                        <div class="form-group col-sm-6 col-lg-4">
                                            <label for="contact_photo" class="col-form-label">Upload Photo</label>
                                            <input type="file" class="form-control" name="contacts[{{ $index }}][contact_photo]">
                                        </div>
                                        <div class="form-group col-sm-6 col-lg-4">
                                            <label for="remove_contact" class="col-form-label">Remove</label>
                                            <button type="button" class="btn btn-danger btn-sm remove-contact-btn">
                                                <i class="fa fa-trash"></i> Remove
                                            </button>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                <div class="row">
                                    <div>
                                        <button class="btn btn-outline-dark mt-3" id="add_more_contact" style="min-width:120px; min-height: 42px; font-size:16px">
                                            <i class="fa-solid fa-plus me-1"></i> Add more
                                        </button>
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
                              <textarea type="text" class="form-control small-placeholder" cols="2" rows="4" id="remark_description" placeholder="Enter details" value="{{old('remark_description',$report->remark_description)}}" name="remark_description"></textarea> @error('remark_description')
                              <!-- Validation error for remark_description -->
                              <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                          </div>
                        </div>
                        <!-- <button class="btn btn-lg btn-success" role="button" type="submit" style="min-width:120px;min-height: 42px;font-size:16px">Submit</button> -->
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
                              <input 
                                class="form-check-input custom-form-check" 
                                type="radio" 
                                name="in_house_check" 
                                value="yes" 
                                {{ old('in_house_check', $SampleTestCapability?->in_house_check) === 'yes' ? 'checked' : '' }} 
                                id="inHouseYes"
                              />
                              <label class="form-check-label" for="inHouseYes"> Yes </label>
                            </div>
                            <div class="form-check d-flex align-items-center gap-2">
                              <input 
                                class="form-check-input custom-form-check" 
                                type="radio" 
                                name="in_house_check" 
                                value="no" 
                                {{ old('in_house_check', $SampleTestCapability?->in_house_check) === 'no' ? 'checked' : '' }} 
                                id="inHouseNo"
                              />
                              <label class="form-check-label" for="inHouseNo"> No </label>
                            </div>
                          </div>
                        </div>
                      </div>

                    <div class="col-md-4 form-group">
                      <label for="lab_departments" class="col-form-label">Lab Departments</label>
                      <textarea class="form-control" name="lab_departments" >{{old('lab_departments',$SampleTestCapability?->lab_departments)}}</textarea>
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="lab_equipments" class="col-form-label">Lab Equipments</label>
                      <textarea class="form-control" name="lab_equipments">{{old('lab_equipments',$SampleTestCapability?->lab_equipments)}}</textarea>
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
                      <input type="number" class="form-control small-placeholder" value="{{old('inhouse_test_volume',$InHouseTest?->inhouse_test_volume)}}" name="inhouse_test_volume" id="inhouse_test_volume">
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="outsource_test_volume" class="col-form-label">Outsource Test Volume per Month</label>
                      <input type="number" class="form-control small-placeholder" name="outsource_test_volume" id="outsource_test_volume" value="{{old('outsource_test_volume',$InHouseTest?->outsource_test_volume)}}">
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="daily_patient_footfall" class="col-form-label">Daily patient Footfall</label>
                      <input type="number" class="form-control small-placeholder" name="daily_patient_footfall" id="daily_patient_footfall" value="{{old('daily_patient_footfall',$InHouseTest?->daily_patient_footfall)}}">
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="inhouse_test_value" class="col-form-label">Inhouse Test Value per Month</label>
                      <input type="number" class="form-control small-placeholder" name="inhouse_test_value_2" id="inhouse_test_value" value="{{old('inhouse_test_value',$InHouseTest?->inhouse_test_value)}}">
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="outsource_test_value" class="col-form-label">Outsource Test Value per Month</label>
                      <input type="number" class="form-control small-placeholder" value="{{old('outsource_test_value',$InHouseTest?->outsource_test_value)}}" name="outsource_test_value" id="outsource_test_value">
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="annual_lab_revenue" class="col-form-label">Annual Lab Revenue</label>
                      <input type="number" class="form-control small-placeholder" value="{{old('annual_lab_revenue',$InHouseTest?->annual_lab_revenue)}}" name="annual_lab_revenue" id="annual_lab_revenue">
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
                          <input type="text" class="form-control small-placeholder" id="hos_revenue" placeholder="Enter hospital revenue" name="hos_revenue"> @error('hos_revenue')
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
                        <input class="form-check-input" type="radio" name="routine" value="{{old('routine' , $DiagnosticNeeds?->routine) === 'routine' ? 'selected' : ''}}"  id="flexCheckDiagnostic" />
                        <label class="form-check-label" for="routine"> Routine </label>
                      </div>
                    </div>
                    <div class="col-md-3 form-group">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="speciality" value="{{old('speciality',$DiagnosticNeeds?->speciality) === 'speciality' ? 'selected' : ''}}" id="flexCheckDiagnostic" />
                        <label class="form-check-label" for="speciality"> Speciality </label>
                      </div>
                    </div>
                    <div class="col-md-3 form-group">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="super_speciality" value="{{old('super_speciality' ,$DiagnosticNeeds?->super_speciality) === 'super_speciality' ? 'selected' : ''}}"  id="flexCheckDiagnostic" />
                        <label class="form-check-label" for="super_speciality"> Super Speciality </label>
                      </div>
                    </div>
                    <div class="col-md-3 form-group">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="genetics" value="{{old('genetics',$DiagnosticNeeds?->genetics) === 'genetics' ? 'selected' : ''}}"  id="flexCheckDiagnostic" />
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
                             @foreach($ExpectedBusiness as $index => $business)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><input type="text" name="expected_business[{{ $index }}][test_name]" value="{{ old('expected_business.' . $index . '.test_name', $business->test_name) }}" class="form-control"></td>
                                <td><input type="number" name="expected_business[{{ $index }}][expected_qty_day]" value="{{ old('expected_business.' . $index . '.expected_qty_day', $business->expected_qty_day) }}" class="form-control"></td>
                                <td><input type="number" name="expected_business[{{ $index }}][expected_l2l_price]" value="{{ old('expected_business.' . $index . '.expected_l2l_price', $business->expected_l2l_price) }}" class="form-control"></td>
                                <td class="text-center">
                                    <input type="checkbox" name="expected_business[{{ $index }}][amount]" {{ old('expected_business.' . $index . '.amount', $business->amount) ? 'checked' : '' }} style="width:20px;height: 20px;">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="expected_business[{{ $index }}][total]" {{ old('expected_business.' . $index . '.total', $business->total) ? 'checked' : '' }} style="width:20px;height: 20px;">
                                </td>
                                <td><input type="number" name="expected_business[{{ $index }}][total]" value="{{ old('expected_business.' . $index . '.total', $business->total) }}" class="form-control"></td>
                                <td><input type="number" name="expected_business[{{ $index }}][total]" value="{{ old('expected_business.' . $index . '.total', $business->total) }}" class="form-control"></td>
                                <td><input type="number" name="expected_business[{{ $index }}][total]" value="{{ old('expected_business.' . $index . '.total', $business->total) }}" class="form-control"></td>
                                <td><input type="number" name="expected_business[{{ $index }}][total]" value="{{ old('expected_business.' . $index . '.total', $business->total) }}" class="form-control"></td>
                            </tr>
                            @endforeach

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
                      <input type="text" class="form-control small-placeholder" id="challenges_faced" placeholder="Enter Challenges" name="challenges_faced_1" value="{{old('challenges_faced_1',$CurrentServiceChallenges?->challenges_faced_1)}}">
                    </div>
                    <div class="form-group col-sm-6 col-md-4">
                      <input type="text" class="form-control small-placeholder" id="challenges_faced" placeholder="Enter Challenges" name="challenges_faced_2" value="{{old('challenges_faced_1',$CurrentServiceChallenges?->challenges_faced_2)}}">
                    </div>
                    <div class="form-group col-sm-6 col-md-4">
                      <input type="text" class="form-control small-placeholder" id="challenges_faced" placeholder="Enter Challenges" name="challenges_faced_3" value="{{old('challenges_faced_1',$CurrentServiceChallenges?->challenges_faced_3)}}">
                    </div>
                    <div class="form-group col-sm-6 col-md-4">
                      <input type="text" class="form-control small-placeholder" id="challenges_faced" placeholder="Enter Challenges" name="challenges_faced_4" value="{{old('challenges_faced_1',$CurrentServiceChallenges?->challenges_faced_4)}}">
                    </div>
                    <div class="form-group col-sm-6 col-md-4">
                      <input type="text" class="form-control small-placeholder" id="challenges_faced" placeholder="Enter Challenges" name="challenges_faced_5" value="{{old('challenges_faced_1',$CurrentServiceChallenges?->challenges_faced_5)}}">
                    </div>
                    <div class="form-group col-sm-6 col-md-4">
                      <input type="text" class="form-control small-placeholder" id="challenges_faced" placeholder="Enter Challenges" name="challenges_faced_6" value="{{old('challenges_faced_1',$CurrentServiceChallenges?->challenges_faced_6)}}">
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
                                <input type="number" class="form-control small-placeholder" id="open_timings_from_week" name="open_timings_from_week" value="{{old('ServiceExpectation',$ServiceExpectation->open_timings_from_week)}}" style="max-width:65px;max-height: 35px;">
                                <span>AM</span>
                              </div>
                              <label for="no_of_doctors" class="col-form-label">to</label>
                              <div class="d-flex align-items-center gap-2">
                                <input type="number" class="form-control small-placeholder" id="open_timings_to_week" name="open_timings_to_week" value="{{old('open_timings_to_week',$ServiceExpectation->open_timings_to_week)}}" style="max-width:65px;max-height: 35px;">
                                <span>PM</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12 form-group d-flex align-items-center gap-2">
                            <label for="no_of_pickup_week" class="col-form-label">No of pickup's required</label>
                            <input type="number" class="form-control small-placeholder" id="no_of_pickup_week" name="no_of_pickup_week" value="{{old('no_of_pickup_week',$ServiceExpectation->no_of_pickup_week)}}" style="max-width:65px;max-height: 35px;">
                            <span>per day</span>
                          </div>
                          <div class="col-md-12 form-group d-flex flex-column align-items-start gap-2">
                            <label for="no_of_pickup_1" class="col-form-label">Preferred pickup timings </label>
                            <div class="d-flex flex-column gap-1">
                              <div class="custom-number d-flex align-items-center gap-2">
                                <label class="col-form-label">1st pickup </label>
                                <div class="position-relative">
                                  <input type="number" class="form-control small-placeholder" id="no_of_pickup_1" name="no_of_pickup_1" value="{{old('no_of_pickup_1',$ServiceExpectation->no_of_pickup_1)}}" style="max-width:100px;padding-right: 40px;">
                                  <select id="business_type"  class="form-control custom-select" name="business_type_week">
                                    <option value="Hospital" {{old('business_type_week',$ServiceExpectation->business_type_week) == 'Hospital' ? 'selected' : ''}}>AM</option>
                                    <option value="Diagnostic Center" {{old('business_type_week' , $ServiceExpectation->business_type_week ) == 'Diagnostic Center' ? 'selected' : ''}}>PM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="custom-number d-flex align-items-center gap-2">
                                <label class="col-form-label">2nd pickup </label>
                                <div class="position-relative">
                                  <input type="number" class="form-control small-placeholder" id="no_of_pickup_2" name="no_of_pickup_2" style="max-width:100px;padding-right: 40px;" value="{{old('no_of_pickup_2',$ServiceExpectation->no_of_pickup_2)}}">
                                  <select id="business_type" name="business_type" class="form-control custom-select" name="business_type">
                                    <option value="Hospital">AM</option>
                                    <option value="Diagnostic Center">PM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="custom-number d-flex align-items-center gap-2">
                                <label class="col-form-label">3rd pickup </label>
                                <div class="position-relative ">
                                  <input type="number" class="form-control small-placeholder" id="no_of_pickup_3" name="no_of_pickup_3" value="{{old('no_of_pickup_3',$ServiceExpectation->no_of_pickup_3)}}" style="max-width:100px;padding-right: 40px;">
                                  <select id="business_type" name="business_type" class="form-control custom-select" name="business_type">
                                    <option value="Hospital">AM</option>
                                    <option value="Diagnostic Center">PM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="custom-number d-flex align-items-center gap-2">
                                <label class="col-form-label">4th pickup </label>
                                <div class="position-relative ">
                                  <input type="number" class="form-control small-placeholder" id="no_of_pickup_4" name="no_of_pickup_4" value="{{old('no_of_pickup_4',$ServiceExpectation->no_of_pickup_4)}}" style="max-width:100px;padding-right: 40px;">
                                  <select id="business_type" name="business_type" class="form-control custom-select" name="business_type">
                                    <option value="Hospital">AM</option>
                                    <option value="Diagnostic Center">PM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="custom-number d-flex align-items-center gap-2">
                                <label class="col-form-label">5th pickup </label>
                                <div class="position-relative ">
                                  <input type="number" class="form-control small-placeholder" id="no_of_pickup_5" name="no_of_pickup_5" value="{{old('no_of_pickup_5',$ServiceExpectation->no_of_pickup_5)}}" style="max-width:100px;padding-right: 40px;">
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
                                <input type="number" class="form-control small-placeholder" id="open_timings_from_public" name="open_timings_from_public" value="{{old('open_timings_from_public',$ServiceExpectation->open_timings_from_public)}}" style="max-width:65px;max-height: 35px;">
                                <span>AM</span>
                              </div>
                              <label for="no_of_doctors" class="col-form-label">to</label>
                              <div class="d-flex align-items-center gap-2">
                                <input type="number" class="form-control small-placeholder" id="open_timings_to_public" name="open_timings_to_public" value="{{old('open_timings_to_public',$ServiceExpectation->open_timings_to_public)}}" style="max-width:65px;max-height: 35px;">
                                <span>PM</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12 form-group d-flex align-items-center gap-2">
                            <label for="no_of_pickup_public" class="col-form-label">No of pickup's required</label>
                            <input type="number" class="form-control small-placeholder" id="no_of_pickup_public" name="no_of_pickup_public" value="{{old('no_of_pickup_public',$ServiceExpectation->no_of_pickup_public)}}" style="max-width:65px;max-height: 35px;">
                            <span>per day</span>
                          </div>
                          <div class="col-md-12 form-group d-flex flex-column align-items-start gap-2">
                            <label for="no_of_pickup_public_time" class="col-form-label">Preferred pickup timings </label>
                            <div class="d-flex flex-column gap-1">
                              <div class="custom-number d-flex align-items-center gap-2">
                                <label class="col-form-label">1st pickup </label>
                                <div class="position-relative">
                                  <input type="number" class="form-control small-placeholder" id="no_of_pickup_public_1" name="no_of_pickup_public_1" value="{{old('no_of_pickup_public_1',$ServiceExpectation->no_of_pickup_public_1)}}" style="max-width:100px;padding-right: 40px;">
                                  <select id="business_type" name="business_type" class="form-control custom-select" name="business_type_public">
                                    <option value="Hospital">AM</option>
                                    <option value="Diagnostic Center">PM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="custom-number d-flex align-items-center gap-2">
                                <label class="col-form-label">2nd pickup </label>
                                <div class="position-relative">
                                  <input type="number" class="form-control small-placeholder" id="no_of_pickup_public_2" name="no_of_pickup_public_2" value="{{old('no_of_pickup_public_2',$ServiceExpectation->no_of_pickup_public_2)}}" style="max-width:100px;padding-right: 40px;">
                                  <select id="business_type" name="business_type" class="form-control custom-select" name="business_type">
                                    <option value="Hospital">AM</option>
                                    <option value="Diagnostic Center">PM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="custom-number d-flex align-items-center gap-2">
                                <label class="col-form-label">3rd pickup </label>
                                <div class="position-relative ">
                                  <input type="number" class="form-control small-placeholder" id="no_of_pickup_public_3" name="no_of_pickup_public_3" value="{{old('no_of_pickup_public_3',$ServiceExpectation->no_of_pickup_public_3)}}" style="max-width:100px;padding-right: 40px;">
                                  <select id="business_type" name="business_type" class="form-control custom-select" name="business_type">
                                    <option value="Hospital">AM</option>
                                    <option value="Diagnostic Center">PM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="custom-number d-flex align-items-center gap-2">
                                <label class="col-form-label">4th pickup </label>
                                <div class="position-relative ">
                                  <input type="number" class="form-control small-placeholder" id="no_of_pickup_public_4" name="no_of_pickup_public_4" value="{{old('no_of_pickup_public_4',$ServiceExpectation->no_of_pickup_public_4)}}" style="max-width:100px;padding-right: 40px;">
                                  <select id="business_type" name="business_type" class="form-control custom-select" name="business_type">
                                    <option value="Hospital">AM</option>
                                    <option value="Diagnostic Center">PM</option>
                                  </select>
                                </div>
                              </div>
                              <div class="custom-number d-flex align-items-center gap-2">
                                <label class="col-form-label">5th pickup </label>
                                <div class="position-relative ">
                                  <input type="number" class="form-control small-placeholder" id="no_of_pickup_public_5" name="no_of_pickup_public_5" value="{{old('no_of_pickup_public_5',$ServiceExpectation->no_of_pickup_public_5)}}" style="max-width:100px;padding-right: 40px;">
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
                          <input class="form-check-input custom-form-check" type="radio" name="home_collection"  value="{{old('home_collection',$ServiceExpectation->home_collection)}}" {{old('home_collection',$ServiceExpectation->home_collection) == 'yes' ? 'selected' : ''}}  id="flexCheckDefault" onclick="toggleCheckbox2(this)" />
                          <label class="form-check-label" for="flexCheckDefault"> Definitely Needed </label>
                        </div>
                        <div class="form-check d-flex align-items-center gap-2">
                          <input class="form-check-input custom-form-check" type="radio" name="home_collection" value=""{{old('home_collection',$ServiceExpectation->home_collection)}}" {{old('home_collection',$ServiceExpectation->home_collection) == 'preferred' ? 'selected' : ''}}  id="flexCheckDefault" onclick="toggleCheckbox2(this)"  />
                          <label class="form-check-label" for="flexCheckDefault"> Preferred </label>
                        </div>
                        <div class="form-check d-flex align-items-center gap-2">
                          <input class="form-check-input custom-form-check" type="radio" name="home_collection"value=""{{old('home_collection',$ServiceExpectation->home_collection)}}" {{old('home_collection',$ServiceExpectation->home_collection) == 'no' ? 'selected' : ''}}  id="flexCheckDefault" onclick="toggleCheckbox2(this)" />
                          <label class="form-check-label" for="flexCheckDefault"> Not Needed </label>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 pt-2">
                      <h3 style="font-size:24px;margin-bottom: 16px;">IT Integration Required</h3>
                      <div class="d-flex align-items-center justify-content-between w-80">
                        <div class="form-check d-flex align-items-center gap-2">
                          <input class="form-check-input custom-form-check" type="radio" name="it_integration"  value=""{{old('it_integration',$ServiceExpectation->it_integration)}}" {{old('it_integration',$ServiceExpectation->it_integration) == 'yes' ? 'selected' : ''}}  id="flexCheckDefault" onclick="toggleCheckbox3(this)" />
                          <label class="form-check-label" for="flexCheckDefault"> Definitely Needed </label>
                        </div>
                        <div class="form-check d-flex align-items-center gap-2">
                          <input class="form-check-input custom-form-check" type="radio" name="it_integration"  value=""{{old('home_collection',$ServiceExpectation->home_collection)}}" {{old('home_collection',$ServiceExpectation->home_collection) == 'preferred' ? 'selected' : ''}}  id="flexCheckDefault" onclick="toggleCheckbox3(this)" />
                          <label class="form-check-label" for="flexCheckDefault"> Preferred </label>
                        </div>
                        <div class="form-check d-flex align-items-center gap-2">
                          <input class="form-check-input custom-form-check" type="radio" name="it_integration"  value=""{{old('home_collection',$ServiceExpectation->home_collection)}}" {{old('home_collection',$ServiceExpectation->home_collection) == 'no' ? 'selected' : ''}}  id="flexCheckDefault" onclick="toggleCheckbox3(this)" />
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
                          <input class="form-check-input custom-form-check" type="radio" name="nabl_certificate"   value=""{{old('nabl_certificate',$ServiceExpectation->nabl_certificate)}}" {{old('nabl_certificate',$ServiceExpectation->nabl_certificate) == 'yes' ? 'selected' : ''}}  id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                          <label class="form-check-label" for="flexCheckDefault"> Definitely Needed </label>
                        </div>
                        <div class="form-check d-flex align-items-center gap-2">
                          <input class="form-check-input custom-form-check" type="radio" name="nabl_certificate" value=""{{old('nabl_certificate',$ServiceExpectation->nabl_certificate)}}" {{old('nabl_certificate',$ServiceExpectation->nabl_certificate) == 'preferred' ? 'selected' : ''}}  id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                          <label class="form-check-label" for="flexCheckDefault"> Preferred </label>
                        </div>
                        <div class="form-check d-flex align-items-center gap-2">
                          <input class="form-check-input custom-form-check" type="radio" name="nabl_certificate"  value=""{{old('nabl_certificate',$ServiceExpectation->nabl_certificate)}}" {{old('nabl_certificate',$ServiceExpectation->nabl_certificate) == 'preferred' ? 'selected' : ''}}  id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                          <label class="form-check-label" for="flexCheckDefault"> Not Needed </label>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 pt-2">
                      <h3 style="font-size:24px;margin-bottom: 16px;">NABL Accreditation Required</h3>
                      <div class="d-flex align-items-center justify-content-between w-80">
                        <div class="form-check d-flex align-items-center gap-2">
                          <input class="form-check-input custom-form-check" type="radio" name="nabl_accreditation"  value=""{{old('nabl_accreditation',$ServiceExpectation->nabl_accreditation)}}" {{old('nabl_accreditation',$ServiceExpectation->nabl_accreditation) == 'yes' ? 'selected' : ''}}  id="flexCheckDefault" onclick="toggleCheckbox5(this)" />
                          <label class="form-check-label" for="flexCheckDefault"> Definitely Needed </label>
                        </div>
                        <div class="form-check d-flex align-items-center gap-2">
                          <input class="form-check-input custom-form-check" type="radio" name="nabl_accreditation"  value=""{{old('nabl_accreditation',$ServiceExpectation->nabl_accreditation)}}" {{old('nabl_accreditation',$ServiceExpectation->nabl_accreditation) == 'preferred' ? 'selected' : ''}}  id="flexCheckDefault" onclick="toggleCheckbox5(this)" />
                          <label class="form-check-label" for="flexCheckDefault"> Preferred </label>
                        </div>
                        <div class="form-check d-flex align-items-center gap-2">
                          <input class="form-check-input custom-form-check" type="radio" name="nabl_accreditation"  value=""{{old('nabl_accreditation',$ServiceExpectation->nabl_accreditation)}}" {{old('nabl_accreditation',$ServiceExpectation->nabl_accreditation) == 'no' ? 'selected' : ''}}  id="flexCheckDefault" onclick="toggleCheckbox5(this)" />
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
                        <input class="form-check-input custom-form-check" type="radio" name="cus_tat_sensitive" value=" value="{{old('cus_tst_sensitive',$ServiceExpectation->cus_tst_sensitive)}}" {{old('cus_tst_sensitive',$ServiceExpectation->cus_tst_sensitive) == 'high' ? 'selected' : ''}}  id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                        <label class="form-check-label" for="flexCheckDefault"> Highly </label>
                      </div>
                      <div class="form-check d-flex align-items-center gap-2">
                        <input class="form-check-input custom-form-check" type="radio" name="cus_tat_sensitive"  value="{{old('cus_tst_sensitive',$ServiceExpectation->cus_tst_sensitive)}}" {{old('cus_tst_sensitive',$ServiceExpectation->cus_tst_sensitive) == 'moderate' ? 'selected' : ''}}  id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                        <label class="form-check-label" for="flexCheckDefault"> Moderate </label>
                      </div>
                      <div class="form-check d-flex align-items-center gap-2">
                        <input class="form-check-input custom-form-check" type="radio" name="cus_tat_sensitive"  value="{{old('cus_tst_sensitive',$ServiceExpectation->cus_tst_sensitive)}}" {{old('cus_tst_sensitive',$ServiceExpectation->cus_tst_sensitive) == 'less' ? 'selected' : ''}}  id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                        <label class="form-check-label" for="flexCheckDefault"> Less </label>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 mb-0 py-2 d-flex flex-column form-group">
                    <h3 style="font-size:24px;margin-bottom: 16px;"> Is the Customer willing to pay for expedited TAT : </h3>
                    <div class="d-flex align-items-center justify-content-between w-80 gap-3">
                      <div class="form-check d-flex align-items-center gap-2">
                        <input class="form-check-input custom-form-check" type="radio" name="cus_willing_to_pay"  value="{{old('cus_willing_to_pay',$ServiceExpectation->cus_willing_to_pay)}}" {{old('cus_willing_to_pay',$ServiceExpectation->cus_willing_to_pay) == 'highly' ? 'selected' : ''}}  checked id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                        <label class="form-check-label" for="flexCheckDefault"> Highly </label>
                      </div>
                      <div class="form-check d-flex align-items-center gap-2">
                        <input class="form-check-input custom-form-check" type="radio" name="cus_willing_to_pay"  value="{{old('cus_willing_to_pay',$ServiceExpectation->cus_willing_to_pay)}}" {{old('cus_willing_to_pay',$ServiceExpectation->cus_willing_to_pay) == 'moderate' ? 'selected' : ''}}  id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                        <label class="form-check-label" for="flexCheckDefault"> Moderate </label>
                      </div>
                      <div class="form-check d-flex align-items-center gap-2">
                        <input class="form-check-input custom-form-check" type="radio" name="cus_willing_to_pay"  value="{{old('cus_willing_to_pay',$ServiceExpectation->cus_willing_to_pay)}}" {{old('cus_willing_to_pay',$ServiceExpectation->cus_willing_to_pay) == 'less' ? 'selected' : ''}} "  id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
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
                        <input class="form-check-input custom-form-check" type="radio" name="cus_quality_focus"  value="{{old('cus_quality_focus',$ServiceExpectation->cus_quality_focus)}}" {{old('cus_quality_focus',$ServiceExpectation->cus_quality_focus) == 'highly' ? 'selected' : ''}}"  checked id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                        <label class="form-check-label" for="flexCheckDefault"> Highly </label>
                      </div>
                      <div class="form-check d-flex align-items-center gap-2">
                        <input class="form-check-input custom-form-check" type="radio" name="cus_quality_focus"  value="{{old('cus_quality_focus',$ServiceExpectation->cus_quality_focus)}}" {{old('cus_quality_focus',$ServiceExpectation->cus_quality_focus) == 'moderate' ? 'selected' : ''}}"  id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                        <label class="form-check-label" for="flexCheckDefault"> Moderate </label>
                      </div>
                      <div class="form-check d-flex align-items-center gap-2">
                        <input class="form-check-input custom-form-check" type="radio" name="cus_quality_focus"  value="{{old('cus_quality_focus',$ServiceExpectation->cus_quality_focus)}}" {{old('cus_quality_focus',$ServiceExpectation->cus_quality_focus) == 'less' ? 'selected' : ''}}"  id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                        <label class="form-check-label" for="flexCheckDefault"> Less </label>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="col-6 mb-0 py-2 d-flex flex-column form-group">
                      <h3 style="font-size:24px;margin-bottom: 16px;"> Is the Customer Price Sensitive : </h3>
                      <div class="d-flex align-items-center justify-content-between w-80 gap-3">
                          <div class="form-check d-flex align-items-center gap-2">
                            <input class="form-check-input custom-form-check" type="radio" name="inCheckNabl" value="yes" checked id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                            <label class="form-check-label" for="flexCheckDefault"> Highly </label>
                          </div>                           
                          <div class="form-check d-flex align-items-center gap-2">
                            <input class="form-check-input custom-form-check" type="radio" name="inCheckNabl" value="yes" id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                            <label class="form-check-label" for="flexCheckDefault"> Moderate </label>
                          </div>                           
                          <div class="form-check d-flex align-items-center gap-2">
                            <input class="form-check-input custom-form-check" type="radio" name="inCheckNabl" value="yes" id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
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
                        <input class="form-check-input custom-form-check" type="radio" name="cus_price_sensitive"  value="{{old('cus_price_sensitive',$ServiceExpectation->cus_price_sensitive)}}" {{old('cus_price_sensitive',$ServiceExpectation->cus_price_sensitive) == 'highly' ? 'selected' : ''}}  checked id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                        <label class="form-check-label" for="flexCheckDefault"> Highly </label>
                      </div>
                      <div class="form-check d-flex align-items-center gap-2">
                        <input class="form-check-input custom-form-check" type="radio" name="cus_price_sensitive"  value="{{old('cus_price_sensitive',$ServiceExpectation->cus_price_sensitive)}}" {{old('cus_price_sensitive',$ServiceExpectation->cus_price_sensitive) == 'moderate' ? 'selected' : ''}}  id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                        <label class="form-check-label" for="flexCheckDefault"> Moderate </label>
                      </div>
                      <div class="form-check d-flex align-items-center gap-2">
                        <input class="form-check-input custom-form-check" type="radio" name="cus_price_sensitive"  value="{{old('cus_price_sensitive',$ServiceExpectation->cus_price_sensitive)}}" {{old('cus_price_sensitive',$ServiceExpectation->cus_price_sensitive) == 'less' ? 'selected' : ''}}  id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                        <label class="form-check-label" for="flexCheckDefault"> Less </label>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="col-6 mb-0 py-2 d-flex flex-column form-group">
                      <h3 style="font-size:24px;margin-bottom: 16px;"> Is the Customer Price Sensitive : </h3>
                      <div class="d-flex align-items-center justify-content-between w-80 gap-3">
                          <div class="form-check d-flex align-items-center gap-2">
                            <input class="form-check-input custom-form-check" type="radio" name="inCheckNabl" value="yes" checked id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                            <label class="form-check-label" for="flexCheckDefault"> Highly </label>
                          </div>                           
                          <div class="form-check d-flex align-items-center gap-2">
                            <input class="form-check-input custom-form-check" type="radio" name="inCheckNabl" value="yes" id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                            <label class="form-check-label" for="flexCheckDefault"> Moderate </label>
                          </div>                           
                          <div class="form-check d-flex align-items-center gap-2">
                            <input class="form-check-input custom-form-check" type="radio" name="inCheckNabl" value="yes" id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
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
                      <input class="form-check-input custom-form-check" type="radio" name="payment_preference"  value="{{old('payment_preference',$FinancialPreferences->payment_preference)}}" {{old('payment_preference',$FinancialPreferences->payment_preference) == 'cash' ? 'selected' : ''}}
                        id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                      <label class="form-check-label" for="flexCheckDefault"> Cash </label>
                    </div>
                    <div class="form-check d-flex align-items-center gap-2">
                      <input class="form-check-input custom-form-check" type="radio" name="payment_preference"  value=""{{old('payment_preference',$FinancialPreferences->payment_preference)}}" {{old('payment_preference',$FinancialPreferences->payment_preference) == 'credit' ? 'selected' : ''}}" id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                      <label class="form-check-label" for="flexCheckDefault"> Credit </label>
                    </div>
                    <div class="form-check d-flex align-items-center gap-2">
                      <label class="form-check-label" for="flexCheckDefault" style="white-space: nowrap;"> Payment Term</label>
                      <input type="number" name="payment_term" value="{{old('payment_term',$FinancialPreferences->payment_method)}}" class="form-control" style="max-width:80px">
                      <span>Days</span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <h3 style="font-size:24px;margin-bottom: 16px;"> Payment Method Preference </h3>
                  <div class="d-flex align-items-center justify-content-between w-80 gap-3 form-group">
                    <div class="form-check d-flex align-items-center gap-2">
                      <input class="form-check-input custom-form-check" type="radio" name="payment_method"  value=""{{old('payment_method',$FinancialPreferences->payment_method)}}" {{old('payment_method',$FinancialPreferences->payment_method) == 'back_trasfer' ? 'selected' : ''}}" checked id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                      <label class="form-check-label" for="flexCheckDefault"> Bank Transfer </label>
                    </div>
                    <div class="form-check d-flex align-items-center gap-2">
                      <input class="form-check-input custom-form-check" type="radio" name="payment_method"  value=""{{old('payment_method',$FinancialPreferences->payment_method)}}" {{old('payment_method',$FinancialPreferences->payment_method) == 'cheque' ? 'selected' : ''}}" id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                      <label class="form-check-label" for="flexCheckDefault"> Cheque </label>
                    </div>
                    <div class="form-check d-flex align-items-center gap-2">
                      <input class="form-check-input custom-form-check" type="radio" name="payment_method"  value=""{{old('payment_method',$FinancialPreferences->payment_method)}}" {{old('payment_method',$FinancialPreferences->payment_method) == 'upt' ? 'selected' : ''}}" id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                      <label class="form-check-label" for="flexCheckDefault"> UPI </label>
                    </div>
                    <div class="form-check d-flex align-items-center gap-2">
                      <input class="form-check-input custom-form-check" type="radio" name="payment_method"  value=""{{old('payment_method',$FinancialPreferences->payment_method)}}" {{old('payment_method',$FinancialPreferences->payment_method) == 'credit_card' ? 'selected' : ''}}" id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                      <label class="form-check-label" for="flexCheckDefault"> Credit Card </label>
                    </div>
                    <div class="form-check d-flex align-items-center gap-2">
                      <input class="form-check-input custom-form-check" type="radio" name="payment_method"  value=""{{old('payment_method',$FinancialPreferences->payment_method)}}" {{old('payment_method',$FinancialPreferences->payment_method) == 'online_deposit' ? 'selected' : ''}}" id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
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
                      <input class="form-check-input custom-form-check" type="radio" name="volume_discount"  value="{{old('volume_discount',$FinancialPreferences->volume_discount)}}" id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                    </div>


                    <div class="form-check d-flex align-items-center gap-2">
                      <label class="form-check-label" for="flexCheckDefault" style="padding-right: 1px"> Expected Volume(Samples) per Month </label>
                      <input type="text" class="form-control" value="{{old('pref_day_samples',$FinancialPreferences->pref_day_samples)}}" name="pref_day_samples" style="width: 150px" />
                    </div>
                    <div class="form-check d-flex align-items-center gap-2">
                      <label class="form-check-label" for="flexCheckDefault" style="padding-right: 60px"> Expected Value(Rs) per Month </label>
                      <input type="text" class="form-control" name="pref_day_rs" value="{{old('pref_day_rs',$FinancialPreferences->pref_day_rs)}}" style="width: 150px" />
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
                      <input class="form-check-input custom-form-check" type="radio" name="communication_preference"  value="{{old('communication_preference',$ServiceExpectation->communication_preference)}}" {{old('communication_preference',$ServiceExpectation->communication_preference) == 'email' ? 'selected' : ''}}  checked id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                      <label class="form-check-label" for="flexCheckDefault"> Email </label>
                    </div>
                    <div class="form-check d-flex align-items-center gap-2">
                      <input class="form-check-input custom-form-check" type="radio" name="communication_preference"  value="{{old('communication_preference',$ServiceExpectation->communication_preference)}}" {{old('communication_preference',$ServiceExpectation->communication_preference) == 'phone' ? 'selected' : ''}}  id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                      <label class="form-check-label" for="flexCheckDefault"> Phone </label>
                    </div>
                    <div class="form-check d-flex align-items-center gap-2">
                      <input class="form-check-input custom-form-check" type="radio" name="communication_preference"  value="{{old('communication_preference',$ServiceExpectation->communication_preference)}}" {{old('communication_preference',$ServiceExpectation->communication_preference) == 'sms' ? 'selected' : ''}}  id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                      <label class="form-check-label" for="flexCheckDefault"> SMS </label>
                    </div>
                    <div class="form-check d-flex align-items-center gap-2">
                      <input class="form-check-input custom-form-check" type="radio" name="communication_preference"  value="{{old('communication_preference',$ServiceExpectation->communication_preference)}}" {{old('communication_preference',$ServiceExpectation->communication_preference) == 'whatsup' ? 'selected' : ''}}  id="flexCheckDefault" onclick="toggleCheckbox4(this)" />
                      <label class="form-check-label" for="flexCheckDefault"> WhatsApp </label>
                    </div>
                  </div>
                </div>
                <div class="row pt-2">
                  <h3 style="font-size:24px;margin-bottom: 16px;"> Preferred Meeting Time </h3>
                  <div class="d-flex align-items-center justify-content-between w-80 gap-3 form-group">
                    <div class="form-check d-flex align-items-center gap-2 ps-0">
                      <label class="form-check-label" for="flexCheckDefault"> Day </label>
                      <input type="text" style="min-width: 380px;" class="form-control" name="pref_meeting_day" value="{{old('pref_meeting_day',$ServiceExpectation->pref_meeting_day)}}" />
                    </div>
                    <div class="form-check d-flex align-items-center gap-2">
                      <label class="form-check-label" for="flexCheckDefault"> Time </label>
                      <input type="text" class="form-control" name="pref_meeting_time" value="{{old('pref_meeting_time',$ServiceExpectation->pref_meeting_time)}}" />
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
                                    <div class="form-group col-12" style="margin-top:35px">
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
    <form class="p-4 border rounded shadow-sm bg-light">
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
  // document.getElementById('add_more_contact').addEventListener('click', function(event) {
  //   event.preventDefault();

  //   const container = document.getElementById('business-contacts-container');
  //   const newRow = container.querySelector('.new-contact-row').cloneNode(true);

  //   // Reset input values in the cloned row
  //   newRow.querySelectorAll('input').forEach(function(input) {
  //     input.value = '';
  //   });

  //   newRow.style.borderTop = '1px solid black';
  //   newRow.style.marginTop = '15px';
  //   newRow.style.marginBottom = '15px';

  //   // Append the cloned row to the container
  //   container.appendChild(newRow);
  // });
 document.getElementById('add_more_contact').addEventListener('click', function (event) {
        event.preventDefault();

        const container = document.getElementById('business-contacts-container');
        const firstRow = container.querySelector('.new-contact-row');
        const newRow = firstRow.cloneNode(true);

        // Reset input values and update names with new indices
        const rowCount = container.querySelectorAll('.new-contact-row').length;

        newRow.querySelectorAll('input, select').forEach(function (input) {
            const name = input.getAttribute('name');
            if (name) {
                const updatedName = name.replace(/\[\d+\]/, `[${rowCount}]`);
                input.setAttribute('name', updatedName);
            }
            input.value = ''; // Reset input values
        });

        container.appendChild(newRow);
    });

    // Delegate "remove" functionality to the parent container
    document.getElementById('business-contacts-container').addEventListener('click', function (event) {
        if (event.target.classList.contains('remove-contact-btn')) {
            event.preventDefault();
            const allRows = document.querySelectorAll('.new-contact-row');
            if (allRows.length > 1) {
                // Remove the clicked contact row
                event.target.closest('.new-contact-row').remove();

                // Re-index the remaining rows
                document.querySelectorAll('.new-contact-row').forEach((row, index) => {
                    row.querySelectorAll('input, select').forEach(input => {
                        const name = input.getAttribute('name');
                        if (name) {
                            const updatedName = name.replace(/\[\d+\]/, `[${index}]`);
                            input.setAttribute('name', updatedName);
                        }
                    });
                });
            } else {
                alert('At least one contact must be present.');
            }
        }
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
        <div class="modal-header">
          <h5 class="modal-title" id="pricebookModalLabel">Pricebook Details</h5>
          <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
        </div>
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

  .activityModalcloseBtn {
    /* overflow: auto; */
    top: 85px !important;
    position: absolute;
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
  }
</style>
<!-- PRICE BOOK CODE END-->

<!-- ACTIVITY CODE START -->
<div id="activityModal" class="modal right fade " tabindex="-1" aria-labelledby="activityModalLabel" aria-hidden="true">
  <div id="activityModalclose" class="activityModalcloseBtn" data-bs-dismiss="modal" aria-label="Close">
    X
  </div>
  <div>
    <div class="modal-dialog activity-Details">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="activityModalLabel">activity Details</h5>
          <button type="button" class="btn-close"></button>
        </div>
        <div class="modal-body activity-body">
          <!-- activity start -->
          <div class="row container my-4 dash-container text-center" style="left:-23%;">

            <div class="form-group  col-12">
              <label class="col-form-label mb-3 text-nowrap">Activity</label>
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
          <!-- activity end -->
        </div>
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
</style>
<!--ACTIVITY CODE END-->

<!-- DOCUMENTS START -->
<div class="modal right fade " id="documentModal" tabindex="-1" aria-labelledby="documentModalLabel" aria-hidden="true">

  <div class="activityModalcloseBtn" data-bs-dismiss="modal" aria-label="Close">
    X
  </div>
  <div>
    <div class="modal-dialog document-Details">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="documentModalLabel">Document Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body document-body">
          <div class="container dash-container mt-">
            <div class="container" style="width:100%;">
              <h2 class="header">Documents</h2>
              <div class="d-flex mb-4 ms-auto">
                <button class="btn btn-success btn1" data-bs-toggle="offcanvas" data-bs-target="#tableOffcanvas" aria-controls="tableOffcanvas">
                  Create
                </button>
              </div>
              <!-- Document Cards -->
              <div class="row g-3 document-container">
                <div class="col-md-4">
                  <div class="document-card">
                    <!-- Document Display Section (Dummy Document) -->
                    <div class="document-container position-relative mb-2">
                      <i class="fa-solid fa-file file-size"></i>
                      <!-- View and Download Icons placed on top of the document -->
                      <div class="document-actions position-absolute bottom-0 mr-5 p-2">
                        <!-- View icon to open document -->
                        <i class="fa-solid fa-eye text-success me-2" data-bs-toggle="modal" data-bs-target="#viewModal" onclick="openDocument()"></i>
                        <!-- Download icon to download document -->
                        <a href="https://via.placeholder.com/150x200.png?text=Document" download="dummy-document.png">
                          <i class="fa-solid fa-download text-primary"></i>
                        </a>
                      </div>
                    </div>

                    <!-- Notes Textarea -->
                    <textarea class="notes-textarea form-control mt-3" placeholder="Enter your notes here...">
                       Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis a repudiandae expedita odio voluptate nobis.<span>
                    </textarea>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="document-card">
                    <!-- Document Display Section (Dummy Document) -->
                    <div class="document-container position-relative mb-2">
                      <i class="fa-solid fa-file file-size"></i>
                      <!-- View and Download Icons placed on top of the document -->
                      <div class="document-actions position-absolute bottom-0 mr-5 p-2">
                        <!-- View icon to open document -->
                        <i class="fa-solid fa-eye text-success me-2" data-bs-toggle="modal" data-bs-target="#viewModal" onclick="openDocument()"></i>
                        <!-- Download icon to download document -->
                        <a href="https://via.placeholder.com/150x200.png?text=Document" download="dummy-document.png">
                          <i class="fa-solid fa-download text-primary"></i>
                        </a>
                      </div>
                    </div>

                    <!-- Notes Textarea -->
                    <textarea class="notes-textarea form-control mt-3" placeholder="Enter your notes here...">
                       Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis a repudiandae expedita odio voluptate nobis.<span>
                    </textarea>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="document-card">
                    <!-- Document Display Section (Dummy Document) -->
                    <div class="document-container position-relative mb-2">
                      <i class="fa-solid fa-file file-size"></i>
                      <!-- View and Download Icons placed on top of the document -->
                      <div class="document-actions position-absolute bottom-0 mr-5 p-2">
                        <!-- View icon to open document -->
                        <i class="fa-solid fa-eye text-success me-2" data-bs-toggle="modal" data-bs-target="#viewModal" onclick="openDocument()"></i>
                        <!-- Download icon to download document -->
                        <a href="https://via.placeholder.com/150x200.png?text=Document" download="dummy-document.png">
                          <i class="fa-solid fa-download text-primary"></i>
                        </a>
                      </div>
                    </div>

                    <!-- Notes Textarea -->
                    <textarea class="notes-textarea form-control mt-3" placeholder="Enter your notes here...">
                       Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis a repudiandae expedita odio voluptate nobis.<span>
                    </textarea>
                  </div>
                </div>
              </div>
            </div>

            <!-- Create Section as Right-Side Modal -->
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
  }

  .document-card i {
    font-size: 1.5rem;
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
</style>
<!-- DOCUMENT END -->

<!-- NOTES START -->
<div class="modal right fade " id="notesModal" tabindex="-1" aria-labelledby="notesModalLabel" aria-hidden="true">

  <div class="activityModalcloseBtn" data-bs-dismiss="modal" aria-label="Close">
    X
  </div>
  <div>
    <div class="modal-dialog notes-Details">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="notesModalLabel">Notes Details</h5>
          <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
        </div>
        <div class="modal-body notes-body">
          <div class="dash-container container my-4" style="margin-inline: auto;">
            <!-- Notes Table -->
            <h2 class="mb-2 text-center">Notes</h2>
            <div>
              <table class="table  text-center align-middle">
                <thead>
                  <tr>
                    <th>Create Date</th>
                    <th>Created By</th>
                    <th>Title</th>
                    <th>Attachments</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>2024-11-25</td>
                    <td>subani</td>
                    <td>Meeting Notes</td>
                    <td><a href="#" class="btn btn-link btn-sm">View</a></td>
                  </tr>
                  <tr>
                    <td colspan="4" class="text-muted">No additional notes available.</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- Create Notes Button -->
            <button class="btn btn-success btn1" data-bs-toggle="offcanvas" data-bs-target="#createNotePopup">
              Create Notes
            </button>

            <!-- Side Popup for Create Note -->
            <div class="offcanvas offcanvas-end" id="createNotePopup" tabindex="-1">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title">Create Note</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                <form>
                  <h2 class="mb-2 text-center"> Create Notes</h2>
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
                  <div class="d-flex justify-content-between">
                    <button type="reset" class="btn btn-success btn1">Reset</button>
                    <button type="submit" class="btn btn-success btn1">Submit</button>
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
<style>
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
        <div class="modal-header">
          <h5 class="modal-title" id="profitabilityModalLabel">Notes Details</h5>
          <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
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
    height: 100vh;
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
<div class="modal right fade " id="forecastModal" tabindex="-1" aria-labelledby="forecastModalLabel" aria-hidden="true">

  <div class="activityModalcloseBtn" data-bs-dismiss="modal" aria-label="Close">
    X
  </div>
  <div>
    <div class="modal-dialog Forecast-Details">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="forecastModalLabel">Forecast Details</h5>
          <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
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
                                      <div class="col-10 w-100">
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
                                      <div class="col-10 w-100">
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
                                      <div class="col-10 w-100">
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
    height: 100%;
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
</style>
<!-- FORECAST END -->

<!-- MARKETING START -->
<div class="modal right fade " id="marketingModal" tabindex="-1" aria-labelledby="marketingModalLabel" aria-hidden="true">

  <div class="activityModalcloseBtn" data-bs-dismiss="modal" aria-label="Close">
    X
  </div>
  <div>
    <div class="modal-dialog marketing-Details">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="marketingModalLabel">activity Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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



        </div>
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
</style>
<!-- MARKETING END -->

<!-- RELATION SHIP START -->
<div class="modal right fade " id="relationshipModal" tabindex="-1" aria-labelledby="relationshipModalLabel" aria-hidden="true">
  <div class="activityModalcloseBtn" data-bs-dismiss="modal" aria-label="Close">
    X
  </div>
  <div>
    <div class="modal-dialog relationship-Details">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="relationshipModalLabel">activity Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body relationship-body">
          <section class="dash-container tab-content" id="relationTab" style="margin-inline:-12px;">
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

        </div>

      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  
  document.getElementById('add_more_contact').addEventListener('click', function (event) {
    event.preventDefault();

    const container = document.getElementById('business-contacts-container');
    const firstRow = container.querySelector('.new-contact-row');
    const newRow = firstRow.cloneNode(true);

    // Reset input values and update names with new indices
    const rowCount = container.querySelectorAll('.new-contact-row').length;
console.error(container , firstRow , newRow , rowCount)
    newRow.querySelectorAll('input, select').forEach(function (input) {
        const name = input.getAttribute('name');
        if (name) {
            const updatedName = name.replace(/\d+/, rowCount);
            input.setAttribute('name', updatedName);
        }

        // Reset input values
        if (input.type === 'file') {
            input.value = ''; // Reset file input
        } else {
            input.value = ''; // Reset other inputs
        }
    });

    // Ensure the "Remove" button is visible
    const removeButton = newRow.querySelector('.remove-contact-btn');
    if (removeButton) {
        removeButton.style.display = 'block';
    }

    newRow.style.borderTop = '1px solid black';
    newRow.style.marginTop = '15px';
    newRow.style.marginBottom = '15px';

    container.appendChild(newRow);
});

// Delegate "remove" functionality to the parent container
document.getElementById('business-contacts-container').addEventListener('click', function (event) {
    if (event.target.classList.contains('remove-contact-btn')) {
        event.preventDefault();

        const allRows = document.querySelectorAll('.new-contact-row');
        if (allRows.length > 1) {
            event.target.closest('.new-contact-row').remove();

            // Re-index the remaining rows
            document.querySelectorAll('.new-contact-row').forEach((row, index) => {
                row.querySelectorAll('input, select').forEach(input => {
                    const name = input.getAttribute('name');
                    if (name) {
                        const updatedName = name.replace(/\d+/, index);
                        input.setAttribute('name', updatedName);
                    }
                });
            });
        } else {
            alert('At least one contact must be present.');
        }
    }
});


</script>
<style>
  #relationshipModal .relationship-Details {
    max-width: 100%;
    width: 80%
  }

  #relationshipModal .relationship-body {
    width: 105%;
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