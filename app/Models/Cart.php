<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;
use Auth;
class Cart extends Model
{
    use HasFactory;

    public static function getCartItems()
    {
    	if (Auth::check()) {
    		$getCartItems = Cart::with(['product'=>function($query){
    			$query->select('id','course_name','slug','category_id','course_code','image','color','product_weight');
    		}])->where('user_id',Auth::user()->id)->orderBy('id','Desc')->get()->toArray();
    	}else{
    		$getCartItems = Cart::with(['product'=>function($query){
    			$query->select('id','course_name','slug','category_id','course_code','image','color','product_weight');
    		}])->where('session_id',Session::get('session_id'))->orderBy('id','Desc')->get()->toArray();
    	}
    	return $getCartItems;
    }
    public function product()
    {
    	return $this->belongsTo('App\Models\Course','course_id');
    }
}
