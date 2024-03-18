<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    public static function section()
    {
        $getSection = Section::where('status',1)->get()->toArray();
        return $getSection;
    }
    public function categories()
    {
        return $this->hasMany('App\Models\Category','section_id')->where(['parent_id'=>0,'status'=>1])->with('subcategories');
    }
}
