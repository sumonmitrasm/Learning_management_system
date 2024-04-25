<?php 
use App\Models\Country;
$country = Country::where('status',1)->get()->toArray();
?>
<form id="addressAddEditForm" action="javascript:;" method="post">@csrf
{{-- <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title --> --}}
<div class="row">
    <div class="col-sm-6">
        <label>Your Name *</label>
        <input type="text" name="name" id="name" class="form-control">
        <p id="delivery-name"></p>
    </div><!-- End .col-sm-6 -->

    <div class="col-sm-6">
        <label>City *</label>
        <input type="text" name="city" id="city" class="form-control">
        <p id="delivery-city"></p>
    </div><!-- End .col-sm-6 -->
</div><!-- End .row -->

{{-- <label>Company Name (Optional)</label>
<input type="text" name="company_name" id="company_name" class="form-control"> --}}
{{-- <p id="delivery-company_name"></p> --}}

<label>Country *</label>
<select name="country" id="country" class="form-control">
    <option value="" selected>--Select Country--</option>
    @foreach($country as $countries)
        <option value="{{$countries['country_name']}}">{{$countries['country_name']}}</option>
    @endforeach
</select>
<p id="delivery-country"></p>

<label>Street address *</label>
<input type="text" name="address" id="address" class="form-control" placeholder="House number and Street name">
<p id="delivery-address"></p>
<div class="row">
    <div class="col-sm-6">
        <label>Postcode / ZIP *</label>
        <input type="text" name="pincode" id="pincode" class="form-control">
        <p id="delivery-pincode"></p>
    </div><!-- End .col-sm-6 -->

    <div class="col-sm-6">
        <label>Phone *</label>
        <input type="tel" name="mobile" id="mobile" class="form-control">
        <p id="delivery-mobile"></p>
    </div><!-- End .col-sm-6 -->
</div><!-- End .row -->

<label>Email address *</label>
<input type="email" name="email" id="email" class="form-control">
<p id="delivery-email"></p>

<div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="checkout-create-acc">
    <label class="custom-control-label" for="checkout-create-acc">Create an account?</label>
</div><!-- End .custom-checkbox -->

<div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="checkout-diff-address">
    <label class="custom-control-label" for="checkout-diff-address">Ship to a different address?</label>
</div><!-- End .custom-checkbox -->
<div class="custom-control custom-checkbox">
    <button style="width:100%;" type="submit" class="btn btn-outline-primary-2">Save</button>
</div>
{{-- <label>Order notes (optional)</label>
<textarea class="form-control" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery"></textarea> --}}
</form>