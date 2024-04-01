<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function view_slider(){
        $sliders = Slider::get();
        $title = "Slider Details";
        return view('admin.slider.slider')->with(['sliders'=>$sliders,'title'=>$title]);
    }
    public function add_edit_slider(Request $request, $id=null){
        if ($id=="") {
            $title = "Add Slider";
            $slider = new Slider;
            $message = "Slider add successfully";
        }else{
            $title = "Update Slider";
            $slider = Slider::find($id);
            $message = "Slider update successfully";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'name' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ];
            $customMessages = [
                'name.required' => 'Slider Name is required',
            ];
            $this->validate($request,$rules,$customMessages);
            if ($request->hasFile('image')) {
                $image_tmp = $request->file('image');
            
                if ($image_tmp->isValid()) {
                    // Delete the old image if it exists
                    if ($slider->image && File::exists(public_path('admin/slider/' . $slider->image))) {
                        File::delete(public_path('admin/slider/' . $slider->image));
                    }
                    // Upload the new image
                    $extension = $image_tmp->getClientOriginalExtension();
                    $imageName = rand(111, 99999) . '.' . $extension;
                    $medium_image_path = 'admin/slider/' . $imageName;
                    Image::make($image_tmp)->save($medium_image_path);
                    $slider->image = $imageName;
                }
            }

            $slider->name = $data['name'];
            $slider->status = 1;
            $slider->save();
            session::flash('success_message',$message);
            return redirect('admin/slider');
        }
        return view('admin.slider.add_edit_slider')->with(compact('title','slider'));
    }
    public function updateSliderStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            if ($data['status']=="Active") {
            $status = 0;
        }else{
            $status = 1;
        }
        Slider::where('id',$data['value_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'value_id'=>$data['value_id']]);
        }
    }
    public function deleteStatus($id){
        $slider = Slider::select('image')->where('id',$id)->first();
        $slider_image_path = 'admin/slider/';
        if (file_exists($slider_image_path.$course->image)) {
            unlink($slider_image_path.$course->image);
        }
        Slider::where('id',$id)->delete();
        return redirect()->back();
    }
}
