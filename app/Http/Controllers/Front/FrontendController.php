<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Brand;
use App\Models\Course;
use App\Models\Category;
class FrontendController extends Controller
{
    public function home(){
        $slider = Slider::select('name','image')->where('status',1)->limit(3)->get();
        $brand = Brand::select('name','image')->where('status',1)->get();
        $product = Course::orderBy('id','Desc')->where('status',1)->limit(4)->get()->toArray();
        $isCourse = Course::orderBy('id','Desc')->where(['is_featured'=>'Yes','status'=>1])->limit(4)->get();
        $getCategory = Category::where('status',1)->get()->toArray();
        return view('front.index')->with(['slider'=>$slider,'brand'=>$brand,'product'=>$product,'isCourse'=>$isCourse,'getCategory'=>$getCategory]);
    }
}
