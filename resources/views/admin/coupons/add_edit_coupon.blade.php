@extends('admin.layout.layout')
@section('content')
<div class="app-content main-content">
   <div class="side-app">
      <div class="container-fluid main-container">
         <!--Page header-->
         <div class="page-header">
            <div class="page-leftheader">
               <h4 class="page-title">{{$title}}</h4>
            </div>
         </div>
         <!--End Page header-->
         <!-- End Row-->
         <div class="row">
            <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12">
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
                  <div class="card-header">
                     <h4 class="card-title">{{$title}} Form</h4>
                  </div>
                  <div class="card-body">
                    <form class="forms-sample" @if(empty($coupon['id'])) action="{{route('addEdit.coupon')}}" @else action="{{url('addEdit.coupon',['id'=>$coupon['id']])}}" @endif  method="post"  enctype="multipart/form-data">@csrf
                        <div class="">
                            @if(empty($coupon['coupon_code']))
                            <div class="mb-3">
                                <label for="couponOption" class="form-label">Coupon Option</label>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" checked="" id="AutomaticCoupon" name="coupon_option" value="Automatic">
                                    <label class="form-check-label" for="AutomaticCoupon">Automatic</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" class="form-check-input" id="ManualCoupon" name="coupon_option" value="Manual">
                                    <label class="form-check-label" for="ManualCoupon">Manual</label>
                                </div>
                                <div class="form-group" style="display:none;" id="couponFild">
                                    <label for="coupon_code">Coupon Code</label>
                                    <input type="text" class="form-control" id="coupon_code" name="coupon_code"placeholder="Enter Coupon Code">
                                </div>
                            </div>
                            @else
                            <div class="mb-3">
                                <input type="hidden" name="coupon_option" value="{{$coupon['coupon_option']}}">
                                <input type="hidden" name="coupon_code" value="{{$coupon['coupon_code']}}">
                                <label for="coupon_code">Coupon Code:</label>
                                <span>{{$coupon['coupon_code']}}</span>
                            </div>
                            @endif
                            <div class="mb-3">
                                <label for="couponOption" class="form-label">Coupon Type</label>
                                <span><input type="radio" name="coupon_type" value="Multiple Times" @if(isset($coupon['coupon_type'])&& $coupon['coupon_type']=="Multiple Times") checked="" @elseif(!isset($coupon['coupon_type'])) checked="" @endif>&nbsp;Multiple Times&nbsp;&nbsp;
                                <span><input type="radio"  name="coupon_type" value="Single Times"  @if(isset($coupon['coupon_type'])&& $coupon['coupon_type']=="Single Times") checked="" @endif>&nbsp;Single Times&nbsp;&nbsp;
                            </div>
                            <div class="mb-3">
                                <label for="couponOption" class="form-label">Amount Type</label>
                                <span><input type="radio" name="amount_type" value="Percentage" @if(isset($coupon['amount_type'])&& $coupon['amount_type']=="Percentage") checked="" @elseif(!isset($coupon['amount_type'])) checked="" @endif>&nbsp;Percentage&nbsp;(in %)&nbsp;
                                <span><input type="radio"  name="amount_type" value="Fixed"  @if(isset($coupon['amount_type'])&& $coupon['amount_type']=="Fixed") checked="" @endif>&nbsp;Fixed&nbsp;(in INR or USD)&nbsp;
                            </div>
                            <div class="mb-3">
                                <label for="couponOption" class="form-label">Amount</label>
                                <input type="number" class="form-control" id="amount" name="amount" @if(!empty($coupon['amount'])) value="{{$coupon['amount']}}" @else value="{{old('amount')}}" @endif placeholder="Enter Amount">
                            </div>
                            <div class="mb-3">
                                <label for="couponOption" class="form-label">Select Users</label>
                                    <select class="form-control" name="users[]" multiple="">
                                        <option value="">--Select Users--</option>
                                        @foreach($users as $user)
                                            <option value="{{$user['email']}}" @if (in_array($user['email'],$selUsers)) selected="" @endif>{{$user['email']}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="mb-3">
                                <label for="couponOption" class="form-label">Select Categories</label>
                                    <select class="form-control" name="categories[]" multiple="">
                                        <option value="">--Select Categories--</option>
                                        @foreach($categories as $section)
                                        <optgroup label="{{$section['name']}}"></optgroup>

                                        @foreach($section['categories'] as $category)
                                        <option value="{{$category['id']}}" @if (in_array($category['id'],$selCats)) selected="" @endif>&nbsp;&raquo;&nbsp;{{$category['category_name']}}</option>
                                        @foreach($category['subcategories'] as $subcategory)
                                        <option value="{{$subcategory['id']}}" @if (in_array($subcategory['id'],$selCats)) selected="" @endif>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;&nbsp;{{$subcategory['category_name']}}</option>
                                        @endforeach
                                        @endforeach
                                        @endforeach
                                    </select>
                            </div>
                            <div class="mb-3">
                                <label for="couponOption" class="form-label">Select Brands</label>
                                    <select id="brands[]" name="brands[]" class="form-control text-dark"  multiple="">
                                        <option value="">Select</option>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand['id']}}" @if (in_array($brand['id'],$selBrands)) selected="" @endif>{{$brand['name']}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="couponOption" class="form-label">Expiry Date</label>
                                <input type="date" class="form-control" id="expiry_date" name="expiry_date" placeholder="Enter Expiry Date" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd/" data-mask @if(isset($coupon['expiry_date'])) value="{{$coupon['expiry_date']}}" @endif>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4 mb-0">Submit Coupon</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <!-- End Row -->
      </div>
   </div>
</div>
	<!-- Include Bootstrap CSS and JavaScript -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
