<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Session;
use Image;
class BrandController extends Controller
{
    public function view_brand(){
        $brands = Brand::get();
        $title = "Brands Details";
        return view('admin.brand.brand')->with(['brands'=>$brands,'title'=>$title]);
    }
    public function add_edit_brand(Request $request, $id=null){
        if ($id=="") {
            $title = "Add brand";
            $brand = new Brand;
            $message = "Brand add successfully";
        }else{
            $title = "Update brand";
            $brand = Brand::find($id);
            $message = "Brand update successfully";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'name' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ];
            $customMessages = [
                'name.required' => 'brand Name is required',
            ];
            $this->validate($request,$rules,$customMessages);
            if ($request->hasFile('image')) {
                $image_tmp = $request->file('image');
            
                if ($image_tmp->isValid()) {
                    // Delete the old image if it exists
                    if ($brand->image && File::exists(public_path('admin/brand/' . $brand->image))) {
                        File::delete(public_path('admin/brand/large/' . $brand->image));
                    }
                    // Upload the new image
                    $extension = $image_tmp->getClientOriginalExtension();
                    $imageName = rand(111, 99999) . '.' . $extension;
                    $medium_image_path = 'admin/brand/' . $imageName;
                    Image::make($image_tmp)->save($medium_image_path);
                    $brand->image = $imageName;
                }
            }

            $brand->name = $data['name'];
            $brand->status = 1;
            $brand->save();
            session::flash('success_message',$message);
            return redirect('admin/brand');
        }
        return view('admin.brand.add_edit_brand')->with(compact('title','brand'));
    }
    public function updateBrandStatus(Request $request, $id=null){
        if($request->ajax()){
            $data = $request->all();
            if ($data['status']=="Active") {
            $status = 0;
        }else{
            $status = 1;
        }
        Brand::where('id',$data['value_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'value_id'=>$data['value_id']]);
        }
    }
    public function deleteStatus($id){
        $brand = Brand::select('image')->where('id',$id)->first();
        $brand_image_path = 'admin/brand/';
        if (file_exists($brand_image_path.$course->image)) {
            unlink($brand_image_path.$course->image);
        }
        Brand::where('id',$id)->delete();
        return redirect()->back();
    }
}
