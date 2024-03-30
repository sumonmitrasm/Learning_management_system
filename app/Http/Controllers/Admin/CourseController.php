<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Section;
use App\Models\Category;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\ProductsFilter;
use Intervention\Image\ImageManagerStatic as Image;
class CourseController extends Controller
{
    public function view_course(){
        $course = Course::with(['category','section'])->get();
        //dd($course);die;
        $title = "Course Details";
        return view('admin.course.course')->with(['course'=>$course,'title'=>$title]);
    }
    public function add_edit_course(Request $request, $id=null){
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>";print_r($data);die;
            $validator = Validator::make($request->all(), [
                'course_name' => 'required',
                'description' => 'required',
                'course_code' => 'required',
                'course_discount' => 'required',
                'course_price' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ], [
                'course_name.required' => 'Please enter the course title',
            ]);
            if ($validator->passes()) {
                if ($id === null) {
                    $course = new Course;
                } else {
                    $course = Course::find($id);
                }
                if ($request->hasFile('image')) {
                    $image_tmp = $request->file('image');
                
                    if ($image_tmp->isValid()) {
                        // Delete the old image if it exists
                        if ($course->image && File::exists(public_path('admin/course/large/' . $course->image))) {
                            File::delete(public_path('admin/course/large/' . $course->image));
                        }
                        // Upload the new image
                        $extension = $image_tmp->getClientOriginalExtension();
                        $imageName = rand(111, 99999) . '.' . $extension;
                        $medium_image_path = 'admin/course/large/' . $imageName;
                        Image::make($image_tmp)->save($medium_image_path);
                        $course->image = $imageName;
                    }
                }
                $categoryDetails = Category::find($data['category_id']);
                //echo "<pre>";print_r($categoryDetails);die;
                $course->section_id = $categoryDetails['section_id']; 
                $course->category_id = $data['category_id'];            
                $course->course_name = $data['course_name'];
                $course->slug = Str::slug($course->course_name);
                if ($id=="") {
                    $adminType = Auth::guard('admin')->user()->type;
                    $admin_id = Auth::guard('admin')->user()->id;
                    $course->admin_type = $adminType;
                    $course->admin_id = $admin_id;
                }
                $productsFilters = ProductsFilter::productsFilters();
                foreach($productsFilters as $filter){
                    $filterAvailable = ProductsFilter::filterAvailable($filter['id'],$data['category_id']);
                    if ($filterAvailable=="Yes") {
                        if (isset($filter['filter_column']) && $data[$filter['filter_column']]) {
                            $course->{$filter['filter_column']} = $data[$filter['filter_column']];
                        }
                    }
                }
                $course->course_code = $data['course_code'];
                $course->course_price = $data['course_price'];
                $course->course_discount = $data['course_discount'];
                $course->course_video = $data['course_video'];
                $course->meta_title = $data['meta_title'];
                $course->description = $data['description'];
                $course->meta_title = $data['meta_title'];
                $course->meta_keywords = $data['meta_keywords'];
                if (!empty($data['is_featured'])) {
                    $course->is_featured = $data['is_featured'];
                }else{
                    $course->is_featured = "No";
                }
                $course->meta_description = $data['meta_description'];
                $course->status = 1; 
                $course->save();
            } else {
                return response()->json(['type' => 'error', 'errors' => $validator->messages()]);   
            } 
        }
        $categories = Section::with('categories')->get();
        $course = Course::find($id);
        $title = "Add edit Course";
        return view('admin.course.add_edit_course')->with(['course'=>$course,'title'=>$title,'categories'=>$categories]);
    }

    public function updateCourseStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            if ($data['status']=="Active") {
            $status = 0;
        }else{
            $status = 1;
        }
        Course::where('id',$data['value_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'value_id'=>$data['value_id']]);
        }
    }

    public function deleteStatus($id){
        $course = Course::select('image')->where('id',$id)->first();
        $course_image_path = 'admin/course/large/';
        if (file_exists($course_image_path.$course->image)) {
            unlink($course_image_path.$course->image);
        }
        Course::where('id',$id)->delete();
        return redirect()->back();
    }
}
