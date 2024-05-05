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
    public function images(){
        return $this->hasMany('App\Models\CoursesImage');
    }
    public function brand()
    {
        return $this->belongsTo('App\Models\Brand','brand_id');
    }
    public static function isProductNew($product_id){
        $isProductNew = Course::select('id')->where('status',1)->orderby('id','Desc')->limit(3)->pluck('id')->toArray();
        if(in_array($product_id,$isProductNew)){
            $isProductNew = "Yes";
        }else{
            $isProductNew = "No";
        }
        return $isProductNew;
    }
    public static function getDiscountPrice($product_id){
        $productPrice = Course::select('course_price','course_discount','id','category_id')->where('id',$product_id)->first()->toarray();
        $categoryDiscount = Category::select('category_discount','id')->where('id',$productPrice['category_id'])->first()->toarray();
        if($productPrice['course_discount']>0){
            $discounted_price = $productPrice['course_price'] - ($productPrice['course_price']*$productPrice['course_discount']/100);
        }elseif($categoryDiscount['category_discount']>0){
            $discounted_price = $productPrice['course_price'] - ($productPrice['course_price']*$categoryDiscount['category_discount']/100);
        }else{
            $discounted_price = 0;
        }
        return $discounted_price;
    }

    public static function getCourseattrPrtice($course_id,$size){
        $proAttrPrice = AttributesPrice::where(['course_id'=>$course_id,'size'=>$size])->first()->toArray();
        //return  $proAttrPrice;
        $proPrice = Course::select('course_price','course_discount','category_id')->where('id',$course_id)->first()->toArray();
        //return  $proPrice;
        $catDiscount = Category::select('category_discount')->where('id',$proPrice['category_id'])->first()->toArray();
        //return  $catDiscount;
        if($proAttrPrice>0){
            $final_price = $proAttrPrice['price'] - ($proAttrPrice['price']*$proPrice['course_discount']/100);
            $discount = $proAttrPrice['price'] - $final_price;
        }elseif ($catDiscount['category_discount']>0) {
            $final_price = $proAttrPrice['price'] - ($proAttrPrice['price']*$catDiscount['category_discount']/100);
            $discount = $proAttrPrice['price'] - $final_price;
        }else{
            $final_price = $proAttrPrice['price'];
            $discount = 0;
        }
        return array('course_price'=>$proAttrPrice['price'],'final_price'=> $final_price,'discount'=>$discount);
    }
    public static function getCourseStatus($course_id){
        $getCourseStatus = Course::select('status')->where('id',$course_id)->first();
        return $getCourseStatus->status;
    }
    public static function deleteCartProduct($course_id){
        Cart::where('course_id',$course_id)->delete();
    }
}
