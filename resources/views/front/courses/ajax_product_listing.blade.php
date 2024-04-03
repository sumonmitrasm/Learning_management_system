<?php use App\Models\Course;?>
<div class="products mb-3">
    <div class="row justify-content-center">
        @foreach($categoryProducts as $product)
        <div class="col-6 col-md-4 col-lg-4 col-xl-3">
            <div class="product product-7 text-center">
                <figure class="product-media">
                    <?php $isProductNew = Course::isProductNew($product['id']); ?>
                    @if($isProductNew=="Yes")
                        <span class="product-label label-new">New</span>
                    @endif
                    <a href="{{ url($product['url'].'/'.$product['id'].'/'.$product['slug']) }}">
                        <img src="{{ asset('admin/course/large/'.$product['image'])}}" alt="Product image" class="product-image">
                    </a>
                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                        <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                    </div><!-- End .product-action-vertical -->

                    <div class="product-action">
                        <a href="{{ url($product['url'].'/'.$product['id'].'/'.$product['slug']) }}" class="btn-product btn-cart"><span>add to cart</span></a>
                    </div><!-- End .product-action -->
                </figure><!-- End .product-media -->

                <div class="product-body">
                    <div class="product-cat">
                        @if(!empty($product['brand']['name']))
                        <a href="#">{{$product['brand']['name']}}</a>
                        @endif
                    </div><!-- End .product-cat -->
                    <h3 class="product-title"><a href="{{ url($product['url'].'/'.$product['id'].'/'.$product['slug']) }}">{{$product['course_name']}}</a></h3><!-- End .product-title -->
                    
                    <?php $getDiscountPrice = Course::getDiscountPrice($product['id']);?>
                    @if($getDiscountPrice>0)
                    <div class="product-price" style="display: inline-block;">
                        <del style="float: left;"> ${{$product['course_price']}}</del>&nbsp;&nbsp;&nbsp;
                        <span style="float: right;">${{$getDiscountPrice}}</span>
                        <div style="clear: both;"></div>
                    </div>
                    @else
                    <div class="product-price">
                        ${{$product['course_price']}} 
                    </div>
                    @endif
                    <div class="product-title" style="display: inline-block;">
                        <span style="float: left;"> COD: {{$product['course_code']}}</span>&nbsp;&nbsp;&nbsp;
                        {{-- <span style="float: right;">${{count($product)}}</span> --}}
                        <div style="clear: both;"></div>
                    </div>
                    
                    <!-- End .product-price -->
                    <div class="ratings-container">
                        <div class="ratings">
                            <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                        </div><!-- End .ratings -->
                        <span class="ratings-text">( 2 Reviews )</span>
                    </div><!-- End .rating-container -->

                    <div class="product-nav product-nav-thumbs">
                        <a href="#" class="active">
                            <img src="{{ asset('front/assets/images/products/product-4-thumb.jpg')}}" alt="product desc">
                        </a>
                        <a href="#">
                            <img src="{{ asset('front/assets/images/products/product-4-2-thumb.jpg')}}" alt="product desc">
                        </a>
                        <a href="#">
                            <img src="{{ asset('front/assets/images/products/product-4-3-thumb.jpg')}}" alt="product desc">
                        </a>
                    </div><!-- End .product-nav -->
                </div><!-- End .product-body -->
            </div><!-- End .product -->
        </div>
        @endforeach
        <!-- End .col-sm-6 col-lg-4 col-xl-3 -->
    </div><!-- End .row -->
</div>