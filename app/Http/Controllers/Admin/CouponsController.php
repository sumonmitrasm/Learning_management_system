<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Category;
use App\Models\Section;
use App\Models\User;
use App\Models\Brand;
class CouponsController extends Controller
{
    public function coupons(){
        $title = "Coupon Details";
        $coupons = Coupon::get()->toArray();
        return view('admin.coupons.coupons')->with(compact('coupons','title'));
    }
    public function addEditCoupon(Request $request, $id=null){
        if ($id=="") {
    		$coupon = new Coupon;
            $title = "Add Coupon";
            $message = "Coupon Added successully";
            $selCats = array();
            $selUsers = array();
            $selBrands = array();
        }else{
            $coupon = Coupon::find($id);
    		$title = "Edit Coupon";
            $message = "Coupon Uploded successully";
            $selCats = explode(',', $coupon['categories']);
            $selUsers = explode(',', $coupon['users']);
            $selBrands = explode(',', $coupon['brands']);
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'categories' => 'required',
                'coupon_option' => 'required',
                'coupon_type' => 'required',
                'amount_type' => 'required',
                'amount' => 'required|numeric',
                'expiry_date' => 'required',
                ];
                $customMessages = [
                'categories.required'=>'Select Categories',
                'coupon_option.required' => 'Select Cupon Option',
                'coupon_type.required'=>'Select Cupon Type',
                'amount_type.required' => 'Select Amount type',
                'amount.numeric'=>'Enter valid amount',
                'expiry_date.required'=>'Enter expire date',
                ];
                $this->validate($request,$rules,$customMessages);

                if (isset($data['users'])) {
                    $users = implode(",", $data['users']);
               }else{
                   $users = "";
               }
               //echo "<pre>";print_r($users);die;
               if (isset($data['categories'])) {
                    $categories = implode(",", $data['categories']);
               }else{
                   $categories = "";
               }
               //echo "<pre>";print_r($categories);die;
               if (isset($data['brands'])) {
                   $brands = implode(",", $data['brands']);
              }else{
                  $brands = "";
              }
              if ($data['coupon_option']=="Automatic") {
                $coupon_code = str_random(8);
            }else{
                $coupon_code = $data['coupon_code'];
            }

            $coupon->coupon_option = $data['coupon_option'];
            $coupon->coupon_code = $coupon_code;
            $coupon->categories = $categories;
            $coupon->brands = $brands;
            $coupon->users = $users;
            $coupon->coupon_type = $data['coupon_type'];
            $coupon->amount_type = $data['amount_type'];
            $coupon->amount = $data['amount'];
            $coupon->expiry_date = $data['expiry_date'];
            $coupon->status = 1;
            $coupon->save();
            session::flash('success_message',$message);
            return redirect('admin/coupons');
        }
        $categories = Section::with('categories')->get();
        $categories = json_decode(json_encode($categories),true);
        $users = User::select('email')->get()->toArray();
        $users = User::select('email')->get()->toArray();
        $brands = Brand::where('status',1)->get()->toArray();
        return view('admin.coupons.add_edit_coupon')->with(['coupon'=>$coupon,
        'title'=>$title,'selCats'=>$selCats, 
        'selUsers'=>$selUsers,'categories'=>$categories,
         'users'=>$users,'brands'=>$brands,
         'selBrands'=>$selBrands,'selUsers'=>$selUsers,
        'selCats'=>$selCats]);
    }
    public function updateCouponsStatus(Request $request)
    {
    	if ($request->ajax()) {
    		$data =  $request->all();
    		//echo "<pre>"; print_r($data); die;
    		if ($data['status']=="Active") {
    			$status = 0;
    		}else{
    			$status = 1;
    		}
    		Coupon::where('id',$data['value_id'])->update(['status'=>$status]);
    		return response()->json(['status'=>$status, 'value_id' =>$data['value_id']]);
    	}
    }
}
