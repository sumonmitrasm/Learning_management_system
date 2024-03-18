<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use Illuminate\Support\Facades\Session;
class SectionController extends Controller
{
    public function section(){
        $sections = Section::get()->toArray();
        $title = "Section Details";
        return view('admin.section.section')->with(compact('sections','title'));
    }
    public function updateSectionStatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            if ($data['status']=="Active") {
            $status = 0;
        }else{
            $status = 1;
        }
        Section::where('id',$data['section_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'section_id'=>$data['section_id']]);

        }
    }

    public function addEditSection(Request $request,$id=null)
    {
        if ($id=="") {
            $title = "Add Section";
            $section = new Section;
            $message = "Section add successfully";
        }else{
            $title = "Update Section";
            $section = Section::find($id);
            $message = "Section update successfully";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'name' => 'required|regex:/^[\pL\s\-]+$/u',
            ];
            $customMessages = [
                'name.required' => 'Section Name is required',
                'name.regex' => 'Valid Section name is required',
            ];
            $this->validate($request,$rules,$customMessages);

            $section->name = $data['name'];
            $section->status = 1;
            $section->save();
            session::flash('success_message',$message);
            return redirect('admin/section');
        }
        return view('admin.section.add_edit_section')->with(compact('title','section'));
    }

    public function deleteSection(Request $request,$id){
        Section::where('id',$id)->delete();
        return redirect()->back();
    }
}
