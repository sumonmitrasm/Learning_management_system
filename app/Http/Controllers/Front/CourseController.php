<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use App\Models\Section;
use Illuminate\Support\Facades\View;
use DB;
use Session;
use Auth;
use App\Models\Cart;
use Illuminate\Support\Facades\Route;
use App\Models\AttributesPrice;
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

    public function checkout(){
        echo "hi";die;
    }
}
