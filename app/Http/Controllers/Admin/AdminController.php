<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
Use App\Models\Admin;
Use App\Models\Vendor;
Use App\Models\VendorsBusinessDetail;
Use App\Models\VendorsBankDetail;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Session;
class AdminController extends Controller
{
    public function dashboard(){
        Session::put('page','dashboard');
        return view('admin.dashboard');
    }
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $rules =[
                'email' => 'required|email|max:255',
                'password' => 'required',
            ];

            $customMessages = [
                'email.required' => 'Email is required!',
                'email.email' => 'Valid Email is required!',
                'password.required' => 'Password is required!',
            ];
            $this->validate($request,$rules,$customMessages);
            if (Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>1])) {
                return redirect('admin/dashboard');
             }else{
                return redirect()->back()->with('error_message','Invalid Password or Email!');
             }
        }
        //echo $password = Hash::make('12345678');die; //for hash passwod
        return view('admin.login');
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
    public function updateAdminPassword(Request $request){
        Session::put('page','update_admin_password');
        if ($request->isMethod('post')) {
            $data = $request->all();
            if(Hash::check($data['current_password'],Auth::guard('admin')->user()->password)){
                if($data['confirm_password']==$data['new_password']){
                    Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_password'])]);
                    return redirect()->back()->with('success_message','Password update successfully');
                }else{
                    return redirect()->back()->with('error_message','Your new password and current password does not match');
                }
            }else{
                return redirect()->back()->with('error_message','Invalid password or Email');
            }
        }
        //echo "<pre>"; print_r(Auth::guard('admin')->user());die;
        $adminDetails = Admin::where('email',Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin.admin.update_admin_password')->with(compact('adminDetails'));
    }

    public function updateAdmindetails(Request $request){
        Session::put('page','update_admin_details');
        if ($request->isMethod('post')) {
            Session::forget('error_message');
            Session::forget('success_message');
            $data = $request->all();
            //dd($data);die;
            if ($request->hasFile('image')) {
                $image_tmp = $request->file('image');
                if ($image_tmp->isValid()) {
                 $image_name = $image_tmp->getClientOriginalName();
                 $extension = $image_tmp->getClientOriginalExtension();
                 $imageName = $image_name.'-'.rand(111, 99999).'.'.$extension;
                 $large_image_path = 'admin/admin_images/large/'.$imageName;
                 $small_image_path= 'admin/admin_images/small/'.$imageName;
                 Image::make($image_tmp)->resize(300,169)->save($large_image_path);
                 Image::make($image_tmp)->resize(70,70)->save($small_image_path);
                }
             }else if(!empty($data['current_admin_image'])){
                $imageName = $data['current_admin_image'];
             }else{
                 $imageName = "";
             }
             Admin::where('id',Auth::guard('admin')->user()->id)->update(['name'=>$data['name'],'mobile'=>$data['mobile'],'image'=>$imageName]);
             $message = "Profile update successfully!!";
            Session::flash('success_message',$message);
        }
        $adminDetails = Admin::where('email',Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin.admin.update_admin_details')->with(compact('adminDetails'));
    }

    public function checkCurrentPassword(Request $request){
        $data = $request->all();
        // echo"<pre>";print_r($data);die;
        if(Hash::check($data['current_password'],Auth::guard('admin')->user()->password)){
            return "true";
        }else{
            return "false";
        }
    }

    public function updateVendordetails(Request $request, $slug){
        Session::put('page','update_vendor_details');
        if($slug=="personal"){
            Session::forget('success_message');
            if ($request->isMethod('post')) {
                $data = $request->all();
                $rules =[
                    'email' => 'required|email|max:255',
                    'name' => 'required',
                ];
    
                $customMessages = [
                    'email.required' => 'Email is required!',
                    'email.email' => 'Valid Email is required!',
                    'name.required' => 'Name is required!',
                ];
                $this->validate($request,$rules,$customMessages);
                if ($request->hasFile('image')) {
                    $image_tmp = $request->file('image');
                    if ($image_tmp->isValid()) {
                     $image_name = $image_tmp->getClientOriginalName();
                     $extension = $image_tmp->getClientOriginalExtension();
                     $imageName = $image_name.'-'.rand(111, 99999).'.'.$extension;
                     $large_image_path = 'admin/admin_images/large/'.$imageName;
                     $small_image_path= 'admin/admin_images/small/'.$imageName;
                     Image::make($image_tmp)->resize(300,169)->save($large_image_path);
                     Image::make($image_tmp)->resize(70,70)->save($small_image_path);
                    }
                 }else if(!empty($data['current_admin_image'])){
                    $imageName = $data['current_admin_image'];
                 }else{
                     $imageName = "";
                 }
                 Admin::where('id',Auth::guard('admin')->user()->id)->update(['name'=>$data['name'],'mobile'=>$data['mobile'],'image'=>$imageName]);
                 Vendor::where('id',Auth::guard('admin')->user()->vendor_id)->update(['name'=>$data['name'],'address'=>$data['address'],'city'=>$data['city'],'state'=>$data['state'],'country'=>$data['country'],'pincode'=>$data['pincode'],'mobile'=>$data['mobile']]);
                 $message = "Vendor Profile update successfully!!";
                Session::flash('success_message',$message);
            }
            
            $vendorDetails = Vendor::where('id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();
        }else if($slug=="business"){
            Session::forget('success_message');
            if ($request->isMethod('post')) {
                $data = $request->all();
                //dd($data);die;
                $rules =[
                    'address_proof' => 'required',
                ];
    
                $customMessages = [
                    'address_proof.required' => 'Address Proof is required!',
                ];
                $this->validate($request,$rules,$customMessages);
                if ($request->hasFile('address_proof_image')) {
                    $image_tmp = $request->file('address_proof_image');
                    if ($image_tmp->isValid()) {
                    //  $image_name = $image_tmp->getClientOriginalName();
                     $extension = $image_tmp->getClientOriginalExtension();
                     $imageName = rand(111, 99999).'.'.$extension;
                     $large_image_path = 'admin/admin_images/proofs/'.$imageName;
                     $small_image_path= 'admin/admin_images/small/'.$imageName;
                     Image::make($image_tmp)->resize(300,169)->save($large_image_path);
                     Image::make($image_tmp)->resize(70,70)->save($small_image_path);
                    }
                 }else if(!empty($data['current_address_proof_image'])){
                    $imageName = $data['current_address_proof_image'];
                 }else{
                     $imageName = "";
                 }
                 VendorsBusinessDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->update(['shop_name'=>$data['shop_name'],'shop_address'=>$data['shop_address'],'shop_city'=>$data['shop_city'],'shop_state'=>$data['shop_state'],'shop_country'=>$data['shop_country'],'shop_pincode'=>$data['shop_pincode'],'shop_mobile'=>$data['shop_mobile'],'shop_website'=>$data['shop_website'],'shop_email'=>$data['shop_email'],'address_proof'=>$data['address_proof'],'business_license_number'=>$data['business_license_number'],'gst_number'=>$data['gst_number'],'pan_number'=>$data['pan_number'],'address_proof_image'=>$imageName]);
                 $message = "Vendor Business Details update successfully!!";
                Session::flash('success_message',$message);
            }
            $vendorDetails = VendorsBusinessDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();
        }else if($slug=="bank"){
            Session::forget('success_message');
            if ($request->isMethod('post')) {
                $data = $request->all();
                //dd($data);die;
                $rules =[
                    'account_holder_name' => 'required',
                ];
    
                $customMessages = [
                    'account_holder_name.required' => 'Account holder name is required!',
                ];
                $this->validate($request,$rules,$customMessages);
                if($data['account_number']==$data['confirm_account_number']){
                    VendorsBankDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->update(['account_holder_name'=>$data['account_holder_name'],'bank_name'=>$data['bank_name'],'account_number'=>$data['account_number'],'confirm_account_number'=>$data['confirm_account_number'],'bank_ifsc_code'=>$data['bank_ifsc_code']]);
                    $message = "Vendor Bank Details update successfully!!";
                    Session::flash('success_message',$message);
                }else{
                    return redirect()->back()->with('error_message','Your account number and confirm account number does not match');
                }
            }
            $vendorDetails = VendorsBankDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();
        }
        return view('admin.settings.update_vendor_details')->with(compact('slug','vendorDetails'));
    }

    public function admins($type=null){
        Session::put('page','admins');
        $admins = Admin::query();   //found admin or supperadmin/vendor
        if(!empty($type)){
            $admins = $admins->where('type',$type);
            $title = ucfirst($type);
        }else{
            $title = "All admin/Subadmin/Vendors";
        }
        $admins = $admins->get()->toArray();
        //dd($admins);die;
        return view('admin.admins.admins')->with(compact('admins','title'));
    }

    public function updateAdminStatus(Request $request)
    {
        if ($request->ajax()) {
            $data =  $request->all();
            if ($data['status']=="Active") {
                $status = 0;
            }else{
                $status = 1;
            }
            Admin::where('id',$data['admin_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'admin_id'=>$data['admin_id']]);
        }
    }

    public function vVd($id){
        Session::put('page','view_vendor_details');
        $vendorDetails = Admin::with('vendorPersonal','vendorBusiness','vendorBank')->where('id',$id)->first();
        $vendorDetails = json_decode(json_encode($vendorDetails),true);
        //dd($vendorDetails);die;
        $title = "Vendor details";
        return view('admin.admin.view_vendor_details')->with(compact('vendorDetails','title'));
    }
}
