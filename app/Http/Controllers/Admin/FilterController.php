<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductsFilter;
use App\Models\ProductsFiltersValue;
use App\Models\Section;
use App\Models\Category;
use Session;
class FilterController extends Controller
{
    public function filters()
    {
        $filters = ProductsFilter::get()->toArray();
        $title = "Add Filter";
        return view('admin.filters.filters')->with(compact('filters','title'));
    }
    public function filtersValues()
    {
        $filters_values = ProductsFiltersValue::get()->toArray();
        $title = "Add Filter Value";
        return view('admin.filters.filters_values')->with(compact('filters_values','title'));
    }
    public function add_edit_filter(Request $request,$id=null){
        if ($id=="") {
            $title = "Add Filter";
            $filter = new ProductsFilter;
            $message = "Product Filter add successfully";
        }else{
            $title = "Update Filter";
            $filter = ProductsFilter::find($id);
            $message = "Product Filter update successfully";
        }
        if($request->isMethod('post')){
            $data = $request->all();
            $cat_ids = implode(',',$data['cat_ids']);
            //echo"<pre>";print_r($cat_ids);die;
            $filter->cat_ids = $cat_ids;
            $filter->filter_name = $data['filter_name'];
            $filter->filter_column = $data['filter_column'];
            $filter->status = 1;
            $filter->save();
        }
        $categories = Section::with('categories')->get()->toArray();
        return view('admin.filters.add_edit_filter')->with(compact('title','categories','filter'));
    }
    public function add_edit_filter_value(Request $request,$id=null){
        if ($id=="") {
            $title = "Add Filter Value";
            $filter = new ProductsFiltersValue;
            $message = "Product Filter value add successfully";
        }else{
            $title = "Update Filter value";
            $filter = ProductsFiltersValue::find($id);
            $message = "Product Filter value update successfully";
        }
        $filters = ProductsFilter::where('status',1)->get()->toArray();
        return view('admin.filters.add_edit_filter_value')->with(compact('title','filter','filters'));
    }
}
