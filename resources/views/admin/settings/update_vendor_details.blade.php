@extends('admin.layout.layout')
@section('content')
<div class="app-content main-content">
   <div class="side-app">
      <div class="container-fluid main-container">
         <!--Page header-->
         <div class="page-header">
            <div class="page-leftheader">
               <h4 class="page-title">Vendor Profile Settings</h4>
            </div>
            <div class="page-rightheader ms-auto d-lg-flex d-none">
            </div>
         </div>
         <!--End Page header-->
         <div class="main-proifle">
            <div class="row">
               <div class="col-lg-7">
                  <div class="box-widget widget-user">
                     <div class="widget-user-image d-sm-flex">
                        <img alt="User Avatar" class="rounded-circle border p-0"
                           src="{{ asset('admin/admin_images/small/'.Auth::guard('admin')->user()->image) }}" style="width: 100px; height: 100px">
                        <div class="ms-sm-4 mt-4">
                           <h4 class="pro-user-username mb-3 font-weight-bold">{{ Auth::guard('admin')->user()->name }}<i
                              class="fa fa-check-circle text-success"></i></h4>
                           <div class="d-flex mb-1">
                              <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24"
                                 viewBox="0 0 24 24" width="24">
                                 <path d="M0 0h24v24H0V0z" fill="none"></path>
                                 <path
                                    d="M5.08 8h2.95c.32-1.25.78-2.45 1.38-3.56-1.84.63-3.37 1.9-4.33 3.56zm2.42 4c0-.68.06-1.34.14-2H4.26c-.16.64-.26 1.31-.26 2s.1 1.36.26 2h3.38c-.08-.66-.14-1.32-.14-2zm-2.42 4c.96 1.66 2.49 2.93 4.33 3.56-.6-1.11-1.06-2.31-1.38-3.56H5.08zM12 4.04c-.83 1.2-1.48 2.53-1.91 3.96h3.82c-.43-1.43-1.08-2.76-1.91-3.96zM18.92 8c-.96-1.65-2.49-2.93-4.33-3.56.6 1.11 1.06 2.31 1.38 3.56h2.95zM12 19.96c.83-1.2 1.48-2.53 1.91-3.96h-3.82c.43 1.43 1.08 2.76 1.91 3.96zm2.59-.4c1.84-.63 3.37-1.91 4.33-3.56h-2.95c-.32 1.25-.78 2.45-1.38 3.56zM19.74 10h-3.38c.08.66.14 1.32.14 2s-.06 1.34-.14 2h3.38c.16-.64.26-1.31.26-2s-.1-1.36-.26-2zM9.66 10c-.09.65-.16 1.32-.16 2s.07 1.34.16 2h4.68c.09-.66.16-1.32.16-2s-.07-1.35-.16-2H9.66z"
                                    opacity=".3"></path>
                                 <path
                                    d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm6.93 6h-2.95c-.32-1.25-.78-2.45-1.38-3.56 1.84.63 3.37 1.91 4.33 3.56zM12 4.04c.83 1.2 1.48 2.53 1.91 3.96h-3.82c.43-1.43 1.08-2.76 1.91-3.96zM4.26 14C4.1 13.36 4 12.69 4 12s.1-1.36.26-2h3.38c-.08.66-.14 1.32-.14 2s.06 1.34.14 2H4.26zm.82 2h2.95c.32 1.25.78 2.45 1.38 3.56-1.84-.63-3.37-1.9-4.33-3.56zm2.95-8H5.08c.96-1.66 2.49-2.93 4.33-3.56C8.81 5.55 8.35 6.75 8.03 8zM12 19.96c-.83-1.2-1.48-2.53-1.91-3.96h3.82c-.43 1.43-1.08 2.76-1.91 3.96zM14.34 14H9.66c-.09-.66-.16-1.32-.16-2s.07-1.35.16-2h4.68c.09.65.16 1.32.16 2s-.07 1.34-.16 2zm.25 5.56c.6-1.11 1.06-2.31 1.38-3.56h2.95c-.96 1.65-2.49 2.93-4.33 3.56zM16.36 14c.08-.66.14-1.32.14-2s-.06-1.34-.14-2h3.38c.16.64.26 1.31.26 2s-.1 1.36-.26 2h-3.38z">
                                 </path>
                              </svg>
                              <div class="h6 mb-0 ms-3 mt-1">{{ Auth::guard('admin')->user()->type }}</div>
                           </div>
                           <div class="d-flex mb-1">
                              <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24"
                                 viewBox="0 0 24 24" width="24">
                                 <path d="M0 0h24v24H0V0z" fill="none"></path>
                                 <path d="M20 8l-8 5-8-5v10h16zm0-2H4l8 4.99z" opacity=".3"></path>
                                 <path
                                    d="M4 20h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2zM20 6l-8 4.99L4 6h16zM4 8l8 5 8-5v10H4V8z">
                                 </path>
                              </svg>
                              <div class="h6 mb-0 ms-3 mt-1">{{ Auth::guard('admin')->user()->email }}</div>
                           </div>
                           <div class="d-flex">
                              <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24"
                                 viewBox="0 0 24 24" width="24">
                                 <path d="M0 0h24v24H0V0z" fill="none"></path>
                                 <path
                                    d="M15.2 18.21c1.21.41 2.48.67 3.8.76v-1.5c-.88-.07-1.75-.22-2.6-.45l-1.2 1.19zM6.54 5h-1.5c.09 1.32.35 2.59.75 3.79l1.2-1.21c-.24-.83-.39-1.7-.45-2.58zM14 8h5V5h-5z"
                                    opacity=".3"></path>
                                 <path
                                    d="M20 15.5c-1.25 0-2.45-.2-3.57-.57-.1-.03-.21-.05-.31-.05-.26 0-.51.1-.71.29l-2.2 2.2c-2.83-1.44-5.15-3.75-6.59-6.58l2.2-2.21c.28-.27.36-.66.25-1.01C8.7 6.45 8.5 5.25 8.5 4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1 0 9.39 7.61 17 17 17 .55 0 1-.45 1-1v-3.5c0-.55-.45-1-1-1zM5.03 5h1.5c.07.88.22 1.75.46 2.59L5.79 8.8c-.41-1.21-.67-2.48-.76-3.8zM19 18.97c-1.32-.09-2.6-.35-3.8-.76l1.2-1.2c.85.24 1.72.39 2.6.45v1.51zM12 3v10l3-3h6V3h-9zm7 5h-5V5h5v3z">
                                 </path>
                              </svg>
                              <div class="h6 mb-0 ms-3 mt-1">{{ Auth::guard('admin')->user()->mobile }}</div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-5 col-md-auto">
               </div>
            </div>
            <div class="profile-cover">
               <div class="wideget-user-tab">
                  <div class="tab-menu-heading p-0">
                     <div class="tabs-menu1 px-3">
                        <ul class="nav">
                           <li><a href="{{ url('admin/update-vendor-details/personal') }}">Vendor Details</a></li>
                           <li><a href="{{ url('admin/update-vendor-details/business') }}" >Update Vendor Business Details</a></li>
                           <li><a href="{{ url('admin/update-vendor-details/bank') }}" >Update Vendor Bank Details</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.profile-cover -->
         </div>
         <!-- Row -->
         <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
               <div class="border-0">
                  <div class="tab-content">
                     <div class="tab-pane active" id="tab-7">
                        <div class="card">
                           @if ($errors->any())
                           <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              @foreach ($errors->all() as $error)
                              <strong>Error Message: </strong>{{ $error }}
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                              <br>
                              @endforeach
                           </div>
                           @endif
                           @if(Session::has('error_message'))
                           <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <strong>Error Message: </strong>{{Session::get('error_message')}}
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           @endif
                           @if(Session::has('success_message'))
                           <div class="alert alert-success alert-dismissible fade show" role="alert">
                              <strong>Success Message: </strong>{{Session::get('success_message')}}
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           @endif
                           <div class="card-body">
                              @if($slug=="personal")
                              <div class="card-header">
                                 <h4 class="card-title">Update Vendor Personal Details</h4>
                              </div><br>
                              <form class="forms-sample" action="{{ url('admin/update-vendor-details/personal') }}"
                                 method="post" enctype="multipart/form-data">
                                 @csrf
                                 <div class="">
                                 <div class="mb-3">
                                       <label for="exampleInputEmail1" class="form-label">Vendor Name</label>
                                       <input type="text" class="form-control" id="name" name="name" value="{{ $vendorDetails['name'] }}"
                                          placeholder="Enter Vendor name">
                                    </div>
                                    <div class="mb-3">
                                       <label for="exampleInputEmail1" class="form-label">Vendor address</label>
                                       <input type="text" class="form-control" id="address" name="address" value="{{ $vendorDetails['address'] }}"
                                          placeholder="Enter Vendor address">
                                    </div>
                                    <div class="mb-3">
                                       <label for="exampleInputEmail1" class="form-label">Vendor city</label>
                                       <input type="text" class="form-control" id="city" name="city" value="{{ $vendorDetails['city'] }}"
                                          placeholder="Enter Vendor city">
                                    </div>
                                    <div class="mb-3">
                                       <label for="exampleInputEmail1" class="form-label">Vendor state</label>
                                       <input type="text" class="form-control" id="state" name="state" value="{{ $vendorDetails['state'] }}"
                                          placeholder="Enter Vendor state">
                                    </div>
                                    <div class="mb-3">
                                       <label for="exampleInputEmail1" class="form-label">Vendor country</label>
                                       <input type="text" class="form-control" id="country" name="country" value="{{ $vendorDetails['country'] }}"
                                          placeholder="Enter Vendor country">
                                    </div>
                                    <div class="mb-3">
                                       <label for="exampleInputEmail1" class="form-label">Vendor pincode</label>
                                       <input type="text" class="form-control" id="pincode" name="pincode" value="{{ $vendorDetails['pincode'] }}"
                                          placeholder="Enter Vendor pincode">
                                    </div>
                                    <div class="mb-3">
                                       <label for="exampleInputEmail1" class="form-label">Vendor mobile</label>
                                       <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $vendorDetails['mobile'] }}"
                                          placeholder="Enter Vendor mobile">
                                    </div>
                                    <div class="mb-3">
                                       <label for="exampleInputEmail1" class="form-label">Enter admin Email</label>
                                       <input type="text" class="form-control" id="email " name="email" value="{{ $vendorDetails['email'] }}"
                                         readonly=""
                                          placeholder="Enter your Email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Image</label>
                                        <input type="file" class="form-control" id="image" name="image"
                                            accept="image/">
                                        @if (!empty(Auth::guard('admin')->user()->image))
                                            <a target="_blank"
                                                href="{{ url('admin/admin_images/small/' . Auth::guard('admin')->user()->image) }}">View
                                                Image</a>
                                            <input type="hidden" name="current_admin_image"
                                                value="{{ Auth::guard('admin')->user()->image }}">
                                        @endif
                                    </div>
                                 </div>
                                 <button type="submit" class="btn btn-primary mt-4 mb-0">Submit</button>
                              </form>
                              @elseif($slug=="business")
                              <div class="card-header">
                                 <h4 class="card-title">Update Vendor Business Details</h4>
                              </div><br>
                              <form class="forms-sample" action="{{ url('admin/update-vendor-details/business') }}"
                                 method="post" enctype="multipart/form-data">
                                 @csrf
                                    <div class="d-flex">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Shop Name</label>
                                            <input type="text" class="form-control" id="shop_name" name="shop_name" value="{{ $vendorDetails['shop_name'] }}"
                                                placeholder="Enter Shop Name">
                                            </div>
                                            <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Shop Address</label>
                                            <input type="text" class="form-control" id="shop_address" name="shop_address" value="{{ $vendorDetails['shop_address'] }}"
                                                placeholder="Enter Shop Address">
                                            </div>
                                            <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Shop City</label>
                                            <input type="text" class="form-control" id="shop_city" name="shop_city" value="{{ $vendorDetails['shop_city'] }}"
                                                placeholder="Enter Shop City">
                                            </div>
                                            <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Shop State</label>
                                            <input type="text" class="form-control" id="shop_state" name="shop_state" value="{{ $vendorDetails['shop_state'] }}"
                                                placeholder="Enter Shop State">
                                            </div>
                                            <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Shop Country</label>
                                            <input type="text" class="form-control" id="shop_country" name="shop_country" value="{{ $vendorDetails['shop_country'] }}"
                                                placeholder="Enter Shop Country">
                                            </div>
                                            <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Shop Pincode</label>
                                            <input type="text" class="form-control" id="shop_pincode" name="shop_pincode" value="{{ $vendorDetails['shop_pincode'] }}"
                                                placeholder="Enter Shop Pincode">
                                            </div>
                                            <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Shop Mobile</label>
                                            <input type="text" class="form-control" id="shop_mobile" name="shop_mobile" value="{{ $vendorDetails['shop_mobile'] }}"
                                                placeholder="Enter Shop Mobile">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Shop Website</label>
                                            <input type="text" class="form-control" id="shop_website" name="shop_website" value="{{ $vendorDetails['shop_website'] }}"
                                                placeholder="Enter Shop Website">
                                            </div>
                                            <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Shop Email</label>
                                            <input type="text" class="form-control" id="shop_email" name="shop_email" value="{{ $vendorDetails['shop_email'] }}"
                                                placeholder="Enter Shop Email">
                                            </div>
                                            <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Address Proof</label>
                                            <select class="form-control" id="address_proof" name="address_proof" value="{{ $vendorDetails['address_proof'] }}">
                                                <option value="">Select</option>
                                                <option value="Passport" @if($vendorDetails['address_proof']=="Passport") selected @endif>Passport</option>
                                                <option value="Voting Card" @if($vendorDetails['address_proof']=="Voting Card") selected @endif>Voting Card</option>
                                                <option value="Driving License" @if($vendorDetails['address_proof']=="Driving License") selected @endif>Driving License</option>
                                                <option value="Smart Card" @if($vendorDetails['address_proof']=="Smart Card") selected @endif>Smart Card</option>
                                            </select>
                                            </div>
                                            <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Address Proof Image</label>
                                             <input type="file" class="form-control" id="address_proof_image" name="address_proof_image">
                                             @if (!empty($vendorDetails['address_proof_image']))
                                                 <a target="_blank"
                                                     href="{{ url('admin/admin_images/proofs/' . $vendorDetails['address_proof_image']) }}">View
                                                     Image</a>
                                                 <input type="hidden" name="current_address_proof_image"
                                                     value="{{ $vendorDetails['address_proof_image'] }}">
                                             @endif
                                         </div>
                                            <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label"> Business License Number</label>
                                            <input type="text" class="form-control" id="business_license_number" name="business_license_number" value="{{ $vendorDetails['business_license_number'] }}"
                                                placeholder="Enter Business License Number">
                                            </div>
                                            <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Gst Number</label>
                                            <input type="text" class="form-control" id="gst_number" name="gst_number" value="{{ $vendorDetails['gst_number'] }}"
                                                placeholder="Enter Gst Number">
                                            </div>
                                            <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Pan Number</label>
                                            <input type="text" class="form-control" id="pan_number" name="pan_number" value="{{ $vendorDetails['pan_number'] }}"
                                                placeholder="Enter Pan Number">
                                            </div>
                                        </div>
                                    </div>
                            
                                  <button type="submit" class="btn btn-primary" style="margin-left:540px;">Submit</button>  
                               
                              </form>
                              @elseif($slug=="bank")
                              <div class="card-header">
                                 <h4 class="card-title">Update Vendor Bank Details</h4>
                              </div><br>
                              <form class="forms-sample" action="{{ url('admin/update-vendor-details/bank') }}"
                                 method="post" enctype="multipart/form-data">
                                 @csrf
                                 <div class="">
                                 <div class="mb-3">
                                       <label for="exampleInputEmail1" class="form-label">Account Holder Name</label>
                                       <input type="text" class="form-control" id="account_holder_name" name="account_holder_name" value="{{ $vendorDetails['account_holder_name'] }}"
                                          placeholder="Enter Account Holder Name">
                                    </div>
                                    <div class="mb-3">
                                       <label for="exampleInputEmail1" class="form-label">Bank Name</label>
                                       <input type="text" class="form-control" id="bank_name" name="bank_name" value="{{ $vendorDetails['bank_name'] }}"
                                          placeholder="Enter Bank Name">
                                    </div>
                                    <div class="mb-3">
                                       <label for="exampleInputEmail1" class="form-label">Account Number</label>
                                       <input type="text" class="form-control" id="account_number" name="account_number" value="{{ $vendorDetails['account_number'] }}"
                                          placeholder="Enter Vendor Account Number">
                                    </div>
                                    <div class="mb-3">
                                       <label for="exampleInputEmail1" class="form-label">Confirm Account Number</label>
                                       <input type="text" class="form-control" id="confirm_account_number" name="confirm_account_number" value="{{ $vendorDetails['confirm_account_number'] }}"
                                          placeholder="Confirm Account Number">
                                    </div>
                                    <div class="mb-3">
                                       <label for="exampleInputEmail1" class="form-label">Bank Ifsc / SWIFT Code </label>
                                       <input type="text" class="form-control" id="bank_ifsc_code" name="bank_ifsc_code" value="{{ $vendorDetails['bank_ifsc_code'] }}"
                                          placeholder="Enter Bank Ifsc Code">
                                    </div>
                                 </div>
                                 <button type="submit" class="btn btn-primary mt-4 mb-0">Submit</button>
                              </form>
                              @endif
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
<!-- Include Bootstrap CSS and JavaScript -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection