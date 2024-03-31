<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id')->select('id','category_name','url');
    }
    public function section(){
        return $this->belongsTo(Section::class, 'section_id', 'id')->select('id','name');
    }
    public function attribute()
    {
        return $this->hasMany('App\Models\Attribute');
    }
    public function attributePrice()
    {
        return $this->hasMany('App\Models\AttributesPrice');
    }
}
