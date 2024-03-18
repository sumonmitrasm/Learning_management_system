<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Section;
use Illuminate\Support\Facades\Session;
class CategoryController extends Controller
{
    public function category(){
        $categorys = Category::with('section','parentcategory')->get()->toArray();
        $title = "Category Details";
        //dd($categorys);
        return view('admin.category.category')->with(compact('categorys','title'));
    }

    public function updateCategoryStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            if ($data['status']=="Active") {
            $status = 0;
        }else{
            $status = 1;
        }
        Category::where('id',$data['category_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'category_id'=>$data['category_id']]);
        }
    }

    public function deleteCategory($id){
        Category::where('id',$id)->delete();
        return redirect()->back();
    }

    public function addEditCategory(Request $request, $id=null){
        if ($id=="") {
            $title = "Add Category";
            $category = new Category;
            $getCategories = array();
            $message = "Category Add successfully";
        }else{
            $title = "Update Category";
            $category = Category::find($id);
            $getCategories = Category::with('subcategories')->where(['parent_id'=>0,'section_id'=>$category['section_id']])->get();
            $message = "Category Update successfully";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
             $rules = [
            'category_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'section_id' => 'required',
            'url' => 'required',
            //'category_image' => 'image',
            ];

            $customMessages = [
            'category_name.required' => 'Category Name is required',
            'category_name.regex'=>'valid Name is required',
            'section_id.required'=>'Section is required',
            'url.required'=>'Category Url is required',
            'category_name.regex' => 'Valid Category name is required',
            //'category_image.image'=>'Valid Category image is required',
            ];
            $this->validate($request,$rules,$customMessages);

            $category->parent_id = $data['parent_id'];
            $category->section_id = $data['section_id'];
            $category->category_name = $data['category_name'];
            $category->description = $data['description'];
            $category->position = $data['position'];
            $category->url = $data['url'];
            $category->url_structure = $data['url_structure'];
            $category->heading_tag = $data['heading_tag'];
            $category->schema_markup = $data['schema_markup'];
            $category->meta_title = $data['meta_title'];
            $category->meta_data = $data['meta_data'];
            $category->meta_description = $data['meta_description'];
            $category->meta_keywords = $data['meta_keywords'];
            $category->meta_robot = $data['meta_robot'];
            $category->status = 1;
            $category->save();
            Session::flash('success_message',$message);
            return redirect('admin/category');
        }
        $getSection = Section::get()->toArray();
        return view('admin.category.add_edit_category')->with(compact('title','category','getSection','getCategories'));
    }

    public function appendCategoriesLevel(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            //echo"<pre>";print_r($data);die;
            $getCategories = Category::with('subcategories')->where(['parent_id'=>0,'section_id'=>$data['section_id']])->get()->toArray();
            //echo"<pre>";print_r($getCategories);die; //using ajex for this section.
             return view('admin.category.append_categories_label')->with(compact('getCategories'));
        }
    }
}
