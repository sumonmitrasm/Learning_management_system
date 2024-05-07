<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use App\Models\Section;
use App\Models\Coupon;
use App\Models\ShippingCharge;
use Illuminate\Support\Facades\View;
use DB;
use Session;
use Auth;
use App\Models\Cart;
use App\Models\DeliveryAddress;
use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\AttributesPrice;
use App\Models\Order;
use App\Models\OrdersProduct;
use Illuminate\Support\Facades\Mail;
class CourseController extends Controller
{
    public function listing(){
        $url = Route::getFacadeRoot()->current()->uri();
        $categoryCount = Category::where(['url'=>$url,'status'=>1])->count();
        if($categoryCount>0){
            $categoryDetails = Category::categoryDetails($url);
            $categoryCourses = Course::with('brand')->whereIn('category_id',$categoryDetails['catIds'])->where('status',1);
            $categoryProducts = $categoryCourses->paginate(3);
            return view('front.courses.listing')->with(compact('categoryDetails','categoryProducts','url'));
        }else{
            abort(404);
        }
    }
    public function details($id, $slug){
        $productDetails = Course::with('brand','category','attributePrice','attribute','images')->where('status',1)->find($id);
        $groupProduct = array();
         if (!empty($productDetails['group_code'])) {
           $groupProduct = Course::select('id','product_image','url','id','slug')->where('id','!=',$id)->where(['group_code'=>$productDetails['group_code'],'status'=>1])->get()->toArray();
         }
        return view('front.courses.details')->with(['productDetails'=>$productDetails,'groupProduct'=>$groupProduct]);
    }

    public function getCoursePrice(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            //echo "<pre>";print_r($data);die;
            $getCourseattrPrtice = Course::getCourseattrPrtice($data['course_id'],$data['size']);
            return $getCourseattrPrtice;
        }
    }
    public function addToCart(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            //product quantity is not or available......................
            $getProductStock = AttributesPrice::getProductStock($data['course_id'],$data['size']);
            if($getProductStock<$data['quantity']){
                return redirect()->back()->with('error_message','Required quantity is not available');
            }
            //product allready exist in cart......................
            if(Auth::check()){
                $user_id = Auth::user()->id;
                $countProducts = Cart::where(['course_id'=>$data['course_id'],'size'=>$data['size'],'user_id'=>$user_id])->count();
            }else{
                $session_id = Session::get('session_id');
                $countProducts = Cart::where(['course_id'=>$data['course_id'],'size'=>$data['size'],'session_id'=>$session_id])->count();
            }
            if($countProducts>0){
                return redirect()->back()->with('error_message','Product already exists in cart');
            }
            //create session id...................................
            $session_id = Session::get('session_id');
            if(empty($session_id)){
                $session_id = Session::getId();
                Session::put('session_id',$session_id);
            }
            if($data['quantity']<=0){
                $data['quantity']=1;
            }
            $item = new Cart;
            $item->course_id = $data['course_id'];
            $item->session_id = $session_id;
            // $item->user_id  = 0;
            $item->size = $data['size'];
            $item->quantity = $data['quantity'];
            $item->save();
            $message = "Product has been added in Cart";
            Session::flash('success_message',$message);
            return redirect('cart');
        }
    }

    public function cart(){
        $getCartItems = Cart::getCartItems();
        //dd($getCartItems);
        return view('front.courses.cart')->with(['getCartItems'=>$getCartItems]);
    }

    public function applyCoupon(Request $request){
        if($request->ajax()){
            $data = $request->all();
            Session::forget('couponCode');
            Session::forget('couponAmount');
            $couponCount = Coupon::where('coupon_code',$data['code'])->count();
            $getCartItems = Cart::getCartItems();
            //loded the helpher function
            $totalCartItems = totalCartItems();
            if($couponCount==0){
                return response()->json([
                    'status'=>false,
                    'getCartItems'=>$getCartItems,
                    'totalCartItems'=>$totalCartItems,
                    'message'=>'The coupon is not valid!',
                    'view'=>(String)View::make('front.courses.cart_item')->with(compact('getCartItems'))
                ]);
            }else{
                $couponDetails = Coupon::where('coupon_code',$data['code'])->first();
                    if ($couponDetails->status==0) {
                        $message = 'This coupon is not active!';
                    }
                // coupon is expaire or not
                $expairy_date = $couponDetails->expairy_date;
                    $current_date = date('Y-m-d');
                    if ($expairy_date > $current_date) {
                        $message = 'Coupon offer is expaired!';
                    }
                    //coupon code is alrady availed
                    if ($couponDetails->coupon_type=="Single Times") {
                        $couponCount = Order::where(['coupon_code'=>$data['code'],'user_id'=>Auth::user()->id])->count();
                        if ($couponCount >= 1) {
                            $messages = 'This coupon code is alrady availed you!';
                        }
                    }
                //get all selected categories from coupon
                $catArr = explode(",", $couponDetails->categories);
                $total_amount = 0;
                    foreach ($getCartItems as $key => $item) {
                        if (!in_array($item['product']['category_id'], $catArr)) {
                            $message = 'This coupon code is not for one of the selected products!';
                        }
                        $attrprice = Course::getCourseattrPrtice($item['course_id'],$item['size']);
                        // echo "<pre>";print_r($attrprice);die;
                        $total_amount = $total_amount + ($attrprice['final_price']*$item['quantity']);
                        //echo "<pre>";print_r($total_amount);die;
                    }
                //get all selected users from cart and find id fast...
                if(isset($couponDetails->users) && !empty($couponDetails->users)){
                    $usersArr = explode(",", $couponDetails->users);
                    if(count($usersArr)){
                        foreach ($usersArr as $key => $user) {
                            $getUserId = User::select('id')->where('email',$user)->first()->toArray();
                            $usersId[] = $getUserId['id'];
                        }
                        // Check if any cart item not belong to coupon user.... kno user add na korle..
                        foreach($getCartItems as $item){
                            if (!in_array($item['user_id'], $usersId)) {
                                $message = "This coupon code is not for you. Try with valid coupon code!";
                            }
                        }
                    }
                }

                if(isset($message)){
                    return response()->json([
                        'status'=>false,
                        'getCartItems'=>$getCartItems,
                        'totalCartItems'=>$totalCartItems,
                        'message'=>$message,
                        'view'=>(String)View::make('front.courses.cart_item')->with(compact('getCartItems'))
                        // 'headerview'=>(String)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))    
                    ]);
                }else{
                    //check ammout type is fixd or percentage.................127
                    if ($couponDetails->amount_type=="Fixed") {
                        $couponAmount = $couponDetails->amount;
                    }else{
                        $couponAmount = $total_amount * ($couponDetails->amount/100);
                    }
                    $grand_total = $total_amount - $couponAmount;
                    //echo "<pre>";print_r($grand_total);die;
                    Session::put('couponAmount',$couponAmount);
                    Session::put('couponCode',$data['code']);
                    $message = "Coupon code successfully applied";
                    return response()->json([
                        'status'=>true,
                        'getCartItems'=>$getCartItems,
                        'totalCartItems'=>$totalCartItems,
                        'couponAmount'=>$couponAmount,
                        'grand_total'=>$grand_total,
                        'message'=>$message,
                        'view'=>(String)View::make('front.courses.cart_item')->with(compact('getCartItems'))
                        // 'headerview'=>(String)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))
                    ]);
                }

            }
        }
    }

    public function checkout(Request $request){
        $getCartItems = Cart::getCartItems();
        
        if (count($getCartItems)==0) {
            $message = "Shopping cart is empty..Please add products.";
            Session::put('error_message',$message);
            return redirect('cart');
        }
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>";print_r($data);die;
            if(empty($data['payment_gateway'])){
                $message = "Please select Payment Method";
                return redirect()->back()->with('error_message',$message);
            }
            if(empty($data['address_id'])){
                $message = "Please select Delivery Address";
                return redirect()->back()->with('error_message',$message);
            }
            $deliveryAddress = DeliveryAddress::where('id',$data['address_id'])->first()->toArray();
            if ($data['payment_gateway']=="COD") {
                $payment_method = "COD";
                $order_status = "New";
            }else{
                $payment_method = "Prepaid";
                $order_status = "Pending";
            }
            $total_price = 0;
            foreach($getCartItems as $item){
                $attrprice = Course::getCourseattrPrtice($item['course_id'],$item['size']);
                $total_price = $total_price + ($attrprice['final_price'] * $item['quantity']);
            }
            foreach($getCartItems as $item){
                $product_status = Course::getCourseStatus($item['course_id']);
                //dd($product_status );
                if($product_status==0){
                    Course::deleteCartProduct($item['course_id']);
                    $message = "One of the product is disable! Please try again.";
                    return redirect('/cart')->with('error_message',$message);
                }
                $getProductStock = AttributesPrice::getProductStock($item['course_id'],$item['size']);
                if($getProductStock==0){
                    Course::deleteCartProduct($item['course_id']);
                    $message = "One of the product is Soldout! Please try again.";
                    return redirect('/cart')->with('error_message',$message);
                }
                $getAttributeStatus = AttributesPrice::getAttributeStatus($item['course_id'],$item['size']);
                if($getAttributeStatus==0){
                    $message = $item['product']['course_name']." with ".$item['size']." Size is not available. Please remove from cart and chose some other product.";
                    return redirect('/cart')->with('error_message',$message);
                }
                $getCategoryStatus = Category::getCategoryStatus($item['product']['category_id']);
                if($getCategoryStatus==0){
                    // Product::deleteCartProduct($item['product_id']);
                    // $message = "One of the product is Disable! Please try again.";
                    $message = $item['product']['course_name']." with ".$item['size']." Size is not available. Please remove from cart and chose some other product.";
                    return redirect('/cart')->with('error_message',$message);
                }
            }
            $shipping_charges = 0;
            $total_weight = 0;
            // $shipping_charges = ShippingCharge::getShippingCharges($total_weight,$deliveryAddress['country']);
            $grand_total = $total_price + $shipping_charges - Session::get('couponAmount');
            Session::put('grand_total',$grand_total);

            DB::beginTransaction();

            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->name = $deliveryAddress['name'];
            $order->address = $deliveryAddress['address'];
            $order->city = $deliveryAddress['city'];
            $order->country = $deliveryAddress['country'];
            $order->pincode = $deliveryAddress['pincode'];
            $order->mobile = $deliveryAddress['mobile'];
            $order->email = Auth::user()->email;
            $order->shipping_charges = $shipping_charges; 
            $order->coupon_code = Session::get('couponCode');
            $order->coupon_amount = Session::get('couponAmount');
            $order->order_status = $order_status;
            $order->payment_method = $payment_method;
            $order->payment_gateway = $data['payment_gateway'];
            $order->grand_total = $grand_total;
            $order->save();

            $order_id = DB::getPdo()->lastInsertId();

            foreach($getCartItems as $item){
                $cartItem = new OrdersProduct;
                $cartItem->order_id = $order_id;
                $cartItem->user_id = Auth::user()->id;
                $getProductDetails = Course::select('id','course_code','course_name','color')->where('id',$item['course_id'])->first()->toArray();
                $cartItem->course_id = $item['course_id'];
                $cartItem->course_code = $getProductDetails['course_code'];
                $cartItem->course_name = $getProductDetails['course_name'];
                $cartItem->color = $getProductDetails['color'];
                $cartItem->size = $item['size'];
                $getDiscountedAttrPrice = Course::getCourseattrPrtice($item['course_id'],$item['size']);
                $cartItem->course_price = $getDiscountedAttrPrice['final_price'];
                $getProductStock = AttributesPrice::getProductStock($item['course_id'],$item['size']);
                if($item['quantity']>$getProductStock){
                    $message = $getProductDetails['course_name']." with ".$item['size']." Stock quantity is not available. Please reduce its quantity and try again";
                    return redirect('/cart')->with('error_message',$message);
                }
                $cartItem->product_qty = $item['quantity'];
                $cartItem->save();

                $grtProductStock = AttributesPrice::getProductStock($item['course_id'],$item['size']);
                $newStock = $grtProductStock - $item['quantity'];
                AttributesPrice::where(['course_id'=>$item['course_id'],'size'=>$item['size']])->update(['stock'=>$newStock]);
            }
            Session::put('order_id',$order_id);
            DB::commit();
            $orderDetails = Order::with('orders_products')->where('id',$order_id)->first()->toArray();
            $userDetails = User::where('id',$orderDetails['user_id'])->first()->toArray();
            if ($data['payment_gateway']=="COD") {
                $email = Auth::user()->email;
                $messageData = [
                    'email' => $email,
                    'name' => Auth::user()->name,
                    'order_id' => $order_id,
                    'orderDetails' => $orderDetails,
                    'userDetails' => $userDetails
                ];
                Mail::send('emails.order',$messageData,function($message) use($email){
                    $message->to($email)->subject('Order Placed - Super-shop website');
                });
                //send order sms script...........................................146
                // $message = "Dear Coustomer, Your order ".$order_id." hasbeen successfully plased with E-shop. We will intimate you  once your order is shipped";
                // $mobile = Auth::user()->mobile;
                // Sms::sendSms($message,$mobile);
            }else if($data['payment_gateway']=="Paypal"){
                return redirect('/paypal');
            }else if($data['payment_gateway']=="sslcommerz"){
                return redirect('/sslcommerz');
            }else{
                echo " Other Prepaid Method coming soon";die;
            }
            return redirect('thanks');
        }
        $country = Country::get();
        $deliveryAddresses = DeliveryAddress::deliveryAddresses();
        //dd($deliveryAddresses);die;
        return view('front.courses.checkout')->with(['country'=>$country,'deliveryAddresses'=>$deliveryAddresses,'getCartItems'=>$getCartItems]);
    }
    public function thanks(){
        if (Session::has('order_id')) {
            Cart::where('user_id',Auth::user()->id)->delete();
            return view('front.courses.thanks');
        }else{
            return redirect('/cart');
        } 
    }
}
