<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributesPrice extends Model
{
    use HasFactory;

    public static function getProductStock($course_id,$size){
        $getProductStock = AttributesPrice::select('stock')->where(['course_id'=>$course_id,'size'=>$size])->first();
        return $getProductStock->stock;
    }
}
