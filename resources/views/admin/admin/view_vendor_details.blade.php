@extends('admin.layout.layout')
@section('content')
<div class="app-content main-content">
   <div class="side-app">
      <div class="container-fluid main-container">
         <!--Page header-->
         <div class="page-header">
            <div class="page-leftheader">
               <h4 class="page-title">Vendor Profile</h4>
               <a href="{{url('admin/admins/vendor')}}">Back to Vendor</a>
            </div>
            <div class="page-rightheader ms-auto d-lg-flex d-none">
            </div>
         </div>
         <!--End Page header-->
         <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
               <div class="border-0">
                  <div class="tab-content">
                     <div class="tab-pane active" id="tab-7">
                        <div class="card">
                           <div class="card-body">
                              <div class="card-header">
                                 <h4 class="card-title">Vendor Personal and bank details Details</h4>
                              </div><br>
                                 <div class="d-flex">
                                       <div class="col-md-6">
                                          <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">Name</label>
                                          <input type="text" class="form-control" id="name" name="name" value="{{ $vendorDetails['vendor_personal']['name'] }}"
                                             placeholder="Enter Shop Name">
                                          </div>
                                          <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">Address</label>
                                          <input type="text" class="form-control" id="address" name="address" value="{{ $vendorDetails['vendor_personal']['address'] }}"
                                             placeholder="Enter Address">
                                          </div>
                                          <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">City</label>
                                          <input type="text" class="form-control" id="city" name="city" value="{{ $vendorDetails['vendor_personal']['city'] }}"
                                             placeholder="Enter City">
                                          </div>
                                          <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">State</label>
                                          <input type="text" class="form-control" id="state" name="state" value="{{ $vendorDetails['vendor_personal']['state'] }}"
                                             placeholder="Enter State">
                                          </div>
                                          <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">Country</label>
                                          <input type="text" class="form-control" id="country" name="country" value="{{ $vendorDetails['vendor_personal']['country'] }}"
                                             placeholder="Enter Country">
                                          </div>
                                          <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">Pincode</label>
                                          <input type="text" class="form-control" id="pincode" name="pincode" value="{{ $vendorDetails['vendor_personal']['pincode'] }}"
                                             placeholder="Enter Pincode">
                                          </div>
                                          <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">Mobile</label>
                                          <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $vendorDetails['vendor_personal']['mobile'] }}"
                                             placeholder="Enter Mobile">
                                          </div>
                                          <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Email</label>
                                             <input type="text" class="form-control" id="email" name="email" value="{{ $vendorDetails['vendor_personal']['email'] }}"
                                                placeholder="Enter email">
                                             </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">Account Holder Name</label>
                                          <input type="text" class="form-control" id="account_holder_name" name="account_holder_name" value="{{ $vendorDetails['vendor_bank']['account_holder_name'] }}"
                                             placeholder="Enter account_holder_name">
                                          </div>
                                          <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label"> Bank Name</label>
                                          <input type="text" class="form-control" id="bank_name" name="bank_name" value="{{ $vendorDetails['vendor_bank']['bank_name'] }}"
                                             placeholder="Enter bank_name">
                                          </div>
                                          <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">Account Number</label>
                                          <input type="text" class="form-control" id="account_number" name="account_number" value="{{ $vendorDetails['vendor_bank']['account_number'] }}"
                                             placeholder="Enter account_number">
                                          </div>
                                          <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">Bank ifsc Code</label>
                                          <input type="text" class="form-control" id="bank_ifsc_code" name="bank_ifsc_code" value="{{ $vendorDetails['vendor_bank']['bank_ifsc_code'] }}"
                                             placeholder="Enter bank_ifsc_code">
                                          </div>
                                          <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Vendor Image</label>
                                             <img alt="User Avatar" class="border p-0"
                                                   src="{{ url('admin/admin_images/large/' . $vendorDetails['image']) }}" width="70%">
                                          </div>
                                       </div>
                                 </div>

                                 <div class="card-header">
                                    <h4 class="card-title">Vendor Business Details</h4>
                                 </div><br>
                                    <div class="d-flex">
                                          <div class="col-md-6">
                                             <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Shop Name</label>
                                             <input type="text" class="form-control" id="shop_name" name="shop_name" value="{{ $vendorDetails['vendor_business']['shop_name'] }}"
                                                placeholder="Enter Shop Name">
                                             </div>
                                             <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Shop Address</label>
                                             <input type="text" class="form-control" id="shop_address" name="shop_address" value="{{ $vendorDetails['vendor_business']['shop_address'] }}"
                                                placeholder="Enter Shop Address">
                                             </div>
                                             <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Shop City</label>
                                             <input type="text" class="form-control" id="shop_city" name="shop_city" value="{{ $vendorDetails['vendor_business']['shop_city'] }}"
                                                placeholder="Enter Shop City">
                                             </div>
                                             <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Shop State</label>
                                             <input type="text" class="form-control" id="shop_state" name="shop_state" value="{{ $vendorDetails['vendor_business']['shop_state'] }}"
                                                placeholder="Enter Shop State">
                                             </div>
                                             <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Shop Country</label>
                                             <input type="text" class="form-control" id="shop_country" name="shop_country" value="{{ $vendorDetails['vendor_business']['shop_country'] }}"
                                                placeholder="Enter Shop Country">
                                             </div>
                                             <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Shop Pincode</label>
                                             <input type="text" class="form-control" id="shop_pincode" name="shop_pincode" value="{{ $vendorDetails['vendor_business']['shop_pincode'] }}"
                                                placeholder="Enter Shop Pincode">
                                             </div>
                                             <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Shop Mobile</label>
                                             <input type="text" class="form-control" id="shop_mobile" name="shop_mobile" value="{{ $vendorDetails['vendor_business']['shop_mobile'] }}"
                                                placeholder="Enter Shop Mobile">
                                             </div>
                                             <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Shop Website</label>
                                                <input type="text" class="form-control" id="shop_website" name="shop_website" value="{{ $vendorDetails['vendor_business']['shop_website'] }}"
                                                   placeholder="Enter Shop Website">
                                                </div>
                                          </div>
                                          <div class="col-md-6">
                                          
                                             <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Shop Email</label>
                                             <input type="text" class="form-control" id="shop_email" name="shop_email" value="{{ $vendorDetails['vendor_business']['shop_email'] }}"
                                                placeholder="Enter Shop Email">
                                             </div>
                                             <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Address Proof</label>
                                             <select class="form-control" id="address_proof" name="address_proof" value="{{ $vendorDetails['vendor_business']['address_proof'] }}">
                                                <option value="">Select</option>
                                                <option value="Passport" @if($vendorDetails['vendor_business']['address_proof']=="Passport") selected @endif>Passport</option>
                                                <option value="Voting Card" @if($vendorDetails['vendor_business']['address_proof']=="Voting Card") selected @endif>Voting Card</option>
                                                <option value="Driving License" @if($vendorDetails['vendor_business']['address_proof']=="Driving License") selected @endif>Driving License</option>
                                                <option value="Smart Card" @if($vendorDetails['vendor_business']['address_proof']=="Smart Card") selected @endif>Smart Card</option>
                                             </select>
                                             </div>
                                             <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Address Proof Image</label>
                                             <img alt="User Avatar" class="border p-0"
                                                   src="{{ url('admin/admin_images/proofs/' . $vendorDetails['vendor_business']['address_proof_image']) }}" width="60%">
                                          </div><br>
                                             <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label"> Business License Number</label>
                                             <input type="text" class="form-control" id="business_license_number" name="business_license_number" value="{{ $vendorDetails['vendor_business']['business_license_number'] }}"
                                                placeholder="Enter Business License Number">
                                             </div>
                                             <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Gst Number</label>
                                             <input type="text" class="form-control" id="gst_number" name="gst_number" value="{{ $vendorDetails['vendor_business']['gst_number'] }}"
                                                placeholder="Enter Gst Number">
                                             </div>
                                             <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Pan Number</label>
                                             <input type="text" class="form-control" id="pan_number" name="pan_number" value="{{ $vendorDetails['vendor_business']['pan_number'] }}"
                                                placeholder="Enter Pan Number">
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
<!-- Include Bootstrap CSS and JavaScript -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection