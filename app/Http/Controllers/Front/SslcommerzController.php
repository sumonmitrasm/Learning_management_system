<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\Mail;
class SslcommerzController extends Controller
{
    public function sslcommerz(){
        if (Session::has('order_id')) {
            // $orderDetails = Session::get('order_id');
            // dd($orderDetails);
            $orderDetails = Order::where('id',Session::get('order_id'))->first()->toArray();
            $namearr = explode(' ',$orderDetails['name']);
            dd($namearr);
            return view('front.paypal.paypal')->with(compact('orderDetails','namearr'));
        }else{
            return redirect('/cart');
        }
    }
}
