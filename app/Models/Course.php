<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public function category(){
        return $this->belongsTo(Category::class, 'id', 'category_id')->select('id','category_name','url');
    }
    public function section(){
        return $this->belongsTo(Section::class, 'id', 'section_id')->select('id','name');
    }
}
