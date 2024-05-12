<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Cart;
use Illuminate\Support\Facades\Mail;
class SslcommerzController extends Controller
{
    public function sslcommerz(Request $request){
        if (Session::has('order_id')) {
            $orderDetails = Order::where('id',Session::get('order_id'))->first()->toArray();
            $namearr = explode(' ',$orderDetails['name']);
            $grand_total = Session::get('grand_total');
            $payment = new Payment;
            $payment->order_id = Session::get('order_id');
            $payment->user_id = Auth::user()->id;
            $payment->payment_id = $request->payment_id; // Get this from the SSLCommerz response
            $payment->payer_id = $request->payer_id; // Get this from the SSLCommerz response
            $payment->payer_email = $request->payer_email; // Get this from the SSLCommerz response
            $payment->amount = $grand_total;
            $payment->currency = 'BDT';
            $payment->payment_status = 'Pending'; // You can update this later based on the response from SSLCommerz
            $payment->save();
            Cart::where('user_id', Auth::user()->id)->delete();
            return redirect()->back();
            // return view('front.paypal.paypal')->with(compact('orderDetails','namearr'));
        }else{
            return redirect('/cart');
        }
    }
}
