@extends('front.layout.layout')
@section('content')
<?php 
use App\Models\Course;
?>
<main class="main">
    <div class="page-header text-center" style="background-image: url('front/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Checkout<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
    <div class="page-content">
        <div class="checkout">
            <div class="container">
                <div class="checkout-discount">
                    <form action="javascript:;">
                        <input type="text" class="form-control" required id="checkout-discount-input">
                        <label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to enter your code</span></label>
                    </form>
                </div><!-- End .checkout-discount -->
                
                    <div class="row">

                        <div class="col-lg-9" id="deliveryAddresses">
                            @include('front.courses.delivery_addresses')

                            {{-- @if(count($deliveryAddresses)>0)
                                <h4 class="section-h4">Delivery Address</h4>
                                    @foreach ($deliveryAddresses as $address)
                                    <div class="control-group" style="float:left; margin-right:5px;"><input type="radio"  id="address{{$address['id']}}" name="address_id" value="{{$address['id']}}"></div>

                                    <div><label class="control-label">{{$address['name']}}, {{$address['address']}}, {{$address['city']}}, {{$address['country']}}, {{$address['mobile']}}</label>
                                        <a style="float:right; margin-left:3px;" href="javascript:;" data-addressid="{{$address['id']}}" class="removeAddress">Remove</a>&nbsp;
                                        <a style="float:right;" href="javascript:;" data-addressid="{{$address['id']}}" class="aditAddress">Edit ||</a>
                                    </div>
                                    @endforeach
                                @endif --}}
                                <form name="checkoutForm" id="checkoutForm" method="post" action="{{url('/checkout')}}">@csrf
                                    @if(count($deliveryAddresses)>0)
                                <h4 class="section-h4">Delivery Address</h4>
                                    @foreach ($deliveryAddresses as $address)
                                    <div class="control-group" style="float:left; margin-right:5px;"><input type="radio"  id="address{{$address['id']}}" name="address_id" value="{{$address['id']}}"></div>

                                    <div><label class="control-label">{{$address['name']}}, {{$address['address']}}, {{$address['city']}}, {{$address['country']}}, {{$address['mobile']}}</label>
                                        <a style="float:right; margin-left:3px;" href="javascript:;" data-addressid="{{$address['id']}}" class="removeAddress">Remove</a>&nbsp;
                                        <a style="float:right;" href="javascript:;" data-addressid="{{$address['id']}}" class="aditAddress">Edit ||</a>
                                    </div>
                                    @endforeach
                                @endif
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3">
                            <div class="summary">
                                <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->
                                
                                <table class="table table-summary">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $total_price = 0 @endphp
                                        @foreach($getCartItems as $item)
                                        <?php $attrprice = Course::getCourseattrPrtice($item['course_id'],$item['size']);
                                        ?>
                                        <tr>
                                            <td><img width="40" src="{{ asset('admin/course/large/'.$item['product']['image'])}}" alt="Product">
                                                <h6 class="order-h6">{{$item['product']['course_name']}}</h6>
                                                <span class="order-span-quantity">{{$item['quantity']}}</span>>{{$item['size']}}>{{$item['product']['color']}}
                                            </td>
                                            <td>Rs.{{$attrprice['final_price'] * $item['quantity']}}</td>
                                        </tr>
                                        @php $total_price = $total_price + ($attrprice['final_price'] * $item['quantity'])  @endphp
                                        @endforeach
                                        <tr>
                                            <td><a href="#">Blue utility pinafore denimdress</a></td>
                                            <td>$76,00</td>
                                        </tr>
                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <td>Rs.{{$total_price}}</td>
                                        </tr><!-- End .summary-subtotal -->
                                        <tr>
                                            <td>Shipping:</td>
                                            <td>Free shipping</td>
                                        </tr>
                                        <tr>
                                            <td>Coupon Discount:</td>
                                            <td class="couponAmount">
                                                @if(Session::has('couponAmount'))
                                                      Rs.{{Session::get('couponAmount')}}
                                                @else
                                                      Rs.0
                                                @endif
                                              </td>
                                        </tr>
                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td class="grand_total">Rs.{{$total_price - Session::get('couponAmount')}}</td>
                                        </tr><!-- End .summary-total -->
                                       
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <div class="accordion-summary" id="accordion-payment">
                                    <div class="u-s-m-b-13 codMethod">
                                        <input type="radio" class="radio-box" name="payment_gateway" id="cash-on-delivery" value="COD">
                                        <label class="label-text" for="cash-on-delivery">Cash on Delivery</label>
                                    </div>
                                    <div class="u-s-m-b-13 prepaidMethod">
                                        <input type="radio" class="radio-box" name="payment_gateway" id="paypal" value="Paypal">
                                        <label class="label-text" for="paypal">Paypal</label>
                                    </div>
                                    <div class="u-s-m-b-13 prepaidMethod">
                                        <input type="radio" class="radio-box" name="payment_gateway" id="iyzipay" value="iyzipay">
                                        <label class="label-text" for="iyzipay">Iyzipay</label>
                                    </div>
                                    <div class="u-s-m-b-13">
                                        <input type="checkbox" class="check-box" id="accept" name="accept" value="Yes" required>
                                        <label class="label-text no-color" for="accept">I’ve read and accept the
                                            <a href="terms-and-conditions.html" class="u-c-brand">terms & conditions</a>
                                        </label>
                                    </div>
                                    <button type="submit" class="button button-outline-secondary">Place Order</button>
                                </div><!-- End .card -->
                                    <div class="card">
                                        <div class="card-header" id="heading-5">
                                            <h2 class="card-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-5" aria-expanded="false" aria-controls="collapse-5">
                                                    Credit Card (Stripe)
                                                    <img src="{{asset('front/assets/images/payments-summary.png')}}" alt="payments cards">
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-5" class="collapse" aria-labelledby="heading-5" data-parent="#accordion-payment">
                                            <div class="card-body"> Donec nec justo eget felis facilisis fermentum.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Lorem ipsum dolor sit ame.
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->
                                </div><!-- End .accordion -->

                                <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                    <span class="btn-text">Place Order</span>
                                    <span class="btn-hover-text">Proceed to Checkout</span>
                                </button>
                            </div><!-- End .summary -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </form>
            </div><!-- End .container -->
        </div><!-- End .checkout -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection