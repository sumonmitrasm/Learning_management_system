<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use App\Models\Section;
use Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
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
}
