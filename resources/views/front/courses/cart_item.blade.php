<?php use App\Models\Course;?>
<div class="col-lg-9">
    <table class="table table-cart table-mobile">
       <thead>
          <tr>
             <th>Product</th>
             <th>Price</th>
             <th>Quantity</th>
             <th>Subtotal</th>
             <th>Action</th>
             {{-- <th></th> --}}
          </tr>
       </thead>
       <tbody>
        @php $total_price = 0 @endphp
        @foreach($getCartItems as $item)
            <?php $getDiscountAttributePrice = Course::getCourseattrPrtice($item['course_id'],$item['size']); ?>
          <tr>
             <td class="product-col">
                <div class="product">
                   <figure class="product-media">
                      <a href="#">
                      <img src="{{ asset('admin/course/large/'.$item['product']['image'])}}" alt="Product image">
                      </a>
                   </figure>
                   <h3 class="product-title">
                      <a href="#">{{$item['product']['course_name']}}</a>
                   </h3>
                   <!-- End .product-title -->
                </div>
                <!-- End .product -->
             </td>
             @if($getDiscountAttributePrice['discount']>0)
             <td class="price-col"> 
                RS.{{$getDiscountAttributePrice['final_price']}}
               <del>RS.{{$getDiscountAttributePrice['course_price']}}</del>
            </td>
            @else
            <td class="price-col"> 
                RS.{{$getDiscountAttributePrice['final_price']}}</td>
             @endif

             <td class="quantity-col">
                <div class="cart-product-quantity">
                   <input type="number" class="form-control updateCartItem" value="{{$item['quantity']}}" min="1" max="10" step="1" data-cartid="{{$item['id']}}" required>
                </div>
                <!-- End .cart-product-quantity -->
             </td>
             <td class="total-col">
                RS.{{$getDiscountAttributePrice['final_price'] * $item['quantity']}}
             </td>
             <td class="remove-col"><button class="btn-remove"><i class="icon-close"></i></button></td>
          </tr>
          @php $total_price = $total_price + ($getDiscountAttributePrice['final_price'] * $item['quantity'])   @endphp
        @endforeach
       </tbody>
    </table>
    <!-- End .table table-wishlist -->
    <div class="cart-bottom">
       <div class="cart-discount">
         <form id="ApplyCoupon" method="post" action="javascript:void(0)" @if(Auth::check()) user="1" @endif>@csrf
             <div class="input-group">
                <input type="text" class="form-control" id="code" name="code" placeholder="coupon code">
                <div class="input-group-append">
                   <button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
                </div>
                <!-- .End .input-group-append -->
             </div>
             <!-- End .input-group -->
          </form>
       </div>
       <!-- End .cart-discount -->
       <a href="#" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></a>
    </div>
    <!-- End .cart-bottom -->
 </div>
 <!-- End .col-lg-9 -->
 <aside class="col-lg-3">
    <div class="summary summary-cart">
       <h3 class="summary-title">Cart Total</h3>
       <!-- End .summary-title -->
       <table class="table table-summary">
          <tbody>
             <tr class="summary-subtotal">
                <td>Subtotal:</td>
                <td>Rs.{{$total_price}}</td>
             </tr>
             <!-- End .summary-subtotal -->
             <tr class="summary-shipping">
                <td>Shipping:</td>
                <td>&nbsp;</td>
             </tr>
             <tr class="summary-shipping-row">
                <td>
                   <div class="custom-control custom-radio">
                      <input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
                      <label class="custom-control-label" for="free-shipping">Free Shipping</label>
                   </div>
                   <!-- End .custom-control -->
                </td>
                <td>$0.00</td>
             </tr>
             <!-- End .summary-shipping-row -->
             <tr class="summary-shipping-row">
                <td>
                   <div class="custom-control custom-radio">
                      <input type="radio" id="standart-shipping" name="shipping" class="custom-control-input">
                      <label class="custom-control-label" for="standart-shipping">Standart:</label>
                   </div>
                   <!-- End .custom-control -->
                </td>
                <td>$10.00</td>
             </tr>
             <!-- End .summary-shipping-row -->
             <tr class="summary-shipping-row">
                <td>
                   <div class="custom-control custom-radio">
                      <input type="radio" id="express-shipping" name="shipping" class="custom-control-input">
                      <label class="custom-control-label" for="express-shipping">Express:</label>
                   </div>
                   <!-- End .custom-control -->
                </td>
                <td>$20.00</td>
             </tr>
             <!-- End .summary-shipping-row -->
             <tr class="summary-shipping-estimate">
                <td>Estimate for Your Country<br> <a href="dashboard.html">Change address</a></td>
                <td>&nbsp;</td>
             </tr>
             <!-- End .summary-shipping-estimate -->
             <tr class="summary-total">
                <td>Total:</td>
                <td>Rs.{{$total_price}}</td>
             </tr>
             <!-- End .summary-total -->
          </tbody>
       </table>
       <!-- End .table table-summary -->
       <a href="{{url('/checkout')}}" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
    </div>
    <!-- End .summary -->
    <a href="{{url('/')}}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
 </aside>
 <!-- End .col-lg-3 -->