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
        $politicsDetails = Course::with('brand','category','attributePrice','attribute')->where('status',1)->find($id);
        return view('front.courses.details');
    }
}
