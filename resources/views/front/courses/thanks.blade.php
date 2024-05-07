<?php 
use App\Models\Course;
?>
@extends('front.layout.layout')
@section('content')
<!-- Page Introduction Wrapper -->
<div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Cart</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">Home</a>
                    </li>
                    <li class="is-marked">
                        <a href="#">Thanks</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Cart-Page -->
    <div class="page-cart u-s-p-t-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="text-align: center">
                    <h3>Your order has been plased successfully</h3>
                    <p> Your order number is {{Session::get('order_id')}} & GRAND TOTAL IS TK.{{Session::get('grand_total')}}<p>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart-Page /- -->
<!-- Include Bootstrap CSS and JavaScript -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
<?php
    Session::forget('order_id');
    Session::forget('grand_total');
    Session::forget('couponCode');
    Session::forget('couponAmount');
?>