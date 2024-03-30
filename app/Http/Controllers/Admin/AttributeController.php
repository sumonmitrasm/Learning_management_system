<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Attribute;
use App\Models\Course;
use Session;
class AttributeController extends Controller
{
    public function add_attributes(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            foreach($data['title'] as $key => $value){
                $attribute = new Attribute;
                $attribute->title = $value;
                $attribute->course_id  = $id;
                if(isset($data['video'][$key])) {
                    $video_tmp = $data['video'][$key];
                    if ($video_tmp && $video_tmp->isValid()) {
                        $previousVideo = $attribute->video;
                        if ($previousVideo && File::exists(public_path('admin/course/video/' . $previousVideo))) {
                            File::delete(public_path('admin/course/video/' . $previousVideo));
                        }
                        $extension = $video_tmp->getClientOriginalExtension();
                        $videoName = rand(111, 99999).'.'.$extension;
                        $video_path = 'admin/course/video/';
                        $video_tmp->move($video_path, $videoName);
                        $attribute->video = $videoName;
                    }
                }
                $attribute->description = $data['description'][$key];
                $attribute->status = 1;
                $attribute->save();
            }
            $message = 'New Additional Video has been uploaded successfully!';
            Session::flash('success_message',$message);
            return redirect()->back();
        }
        $title = "Attributes Details";
        $coursedata = Course::with('attribute')->select('id')->find($id);
        $attributes = Attribute::all();
        return view('admin.course.attribute')->with(['title' => $title, 'coursedata'=>$coursedata, 'attributes'=>$attributes]);
    }

    public function editattributes(Request $request, $id=null){
        if ($request->isMethod('post')) {
            $data = $request->all();
            //dd($data);
            foreach ($data['attrId'] as $key => $attr) {
                if (!empty($attr)) {
                    Attribute::where(['id'=>$data['attrId'][$key]])->update(['title'=>$data['title'][$key],'description'=>$data['description'][$key]]);
                }
            }
            $message = "Image details has been updated successfully";
             session::flash('success_message',$message);
             return redirect()->back();

        }
    }
}
