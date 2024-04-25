<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DeliveryAddress;
use Auth;
use App\Models\Country;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Validator;
use Session;
class AddressController extends Controller
{
    public function deleveryAddress(Request $request){
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>";print_r($data);die;
            $validator = Validator::make($request->all(),[
                'name'=> 'required|string|max:100',
                'address'=> 'required',
                'city'=> 'required',
                // 'delivery_state'=> 'required',
                'country'=> 'required',
                'pincode'=> 'required|digits:4',
                'mobile'=> 'required|numeric|digits:11',
                'email' => 'required|email',
            ],
            [
                'mobile.required'=>'Please Type right Mobile number'
            ]
            );
            if($validator->passes()){
                $address = array();
                $address['user_id'] = Auth::user()->id;
                $address['name'] = $data['name'];
                $address['address'] = $data['address'];
                $address['city'] = $data['city'];
                // $address['state'] = $data['delivery_state'];
                // $address['company_name'] = $data['company_name'];
                $address['country'] = $data['country'];
                $address['pincode'] = $data['pincode'];
                $address['mobile'] = $data['mobile'];
                $address['email'] = $data['email'];
                $address['status']=1;
            if(!empty($data['delivery_id'])){
                //edit Delivery Address.......
                DeliveryAddress::where('id',$data['delivery_id'])->update($address);
            }else{
               //Add Delivery Address
               DeliveryAddress::create($address);
            }
            $deliveryAddresses = DeliveryAddress::deliveryAddresses();
             $country = Country::where('status',1)->get()->toArray();
             return response()->json(['view'=>(String)View::make('front.courses.delivery_addresses')->with(compact('country','deliveryAddresses'))]);
            }else{
                return response()->json(['type'=>'error','errors'=>$validator->messages()]);
            }
        }
    }
}
