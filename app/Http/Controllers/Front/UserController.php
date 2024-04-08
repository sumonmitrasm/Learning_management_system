<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cart;
use Auth;
use Validator;
use Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserController extends Controller
{
    public function userRegister(Request $request){
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>"; print_r($data);die;
            $validator = Validator::make($request->all(),[
                'name'=> 'required|string|max:100',
                'mobile'=> 'required|numeric|digits:11',
                'email'=> 'required|email|max:150|unique:users',
                'password'=> 'required|min:6',
            ],
            [
                'email.required'=>'Please accept our Terms & Conditions'
            ]
        );

        if($validator->passes()){
            $user = New User;
            $user->name = $data['name'];
            $user->mobile = $data['mobile'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->status = 0;
            $user->save();

            //send confirmation Email................................................111 
            $email = $data['email'];
            $messageData = [
                'email' => $data['email'],
                'name' => $data['name'],
                'code' => base64_encode($data['email'])
            ];
            Mail::send('emails.confirmation',$messageData,function($message) use($email){
                $message->to($email)->subject('Please Confirm your account');
            });
            //redirect back with success message
                $redirectTo = url('user/login-register');
                return response()->json(['type'=>'success','url'=>$redirectTo,'message'=>'Please confirm your email to active your account']);

            //send register sms ........................................................109
            // $message = "Dear Customer, You are successfully login the site";
            // $mobile = $data['mobile'];
            // Sms::sendSms($message,$mobile);
        }else{
             return response()->json(['type'=>'error','errors'=>$validator->messages()]);
        }
            
        }
    }

    public function userLogin(Request $request){
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>"; print_r($data);die; //incomplete
            $validator = Validator::make($request->all(),[
                'email'=> 'required|email|max:150|exists:users',
                'password'=> 'required|min:6',
            ]);
            if($validator->passes()){
                if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                    if(Auth::user()->status==0){
                        Auth::logout();
                        return response()->json(['type'=>'inactive','message'=>'Your account is not active. Please confirm your account']);
                    }
                     //update user cart with user id.........................................110
                if (!empty(Session::get('session_id'))) {
                    $user_id = Auth::user()->id;
                    $session_id = Session::get('session_id');
                    Cart::where('session_id',$session_id)->update(['user_id'=>$user_id]);
                }
                    $redirectTo = url('cart');
                    return response()->json(['type'=>'success','url'=>$redirectTo]);
                }else{
                    return response()->json(['type'=>'incorrect','message'=>'Incorrect Email or Pssword!']);
                }
            }else{
             return response()->json(['type'=>'error','errors'=>$validator->messages()]);
            }
        }
    }

    public function userLogout(){
        Auth::logout();
        //v169 if logout then cart session expaired
        Session::flush();
        return redirect('/');
    }
}
