<?php
use App\Models\Cart;
function totalCartItems(){
	if(Auth::check()){
		$user_id = Auth::user()->id;
		$totalCartItems = Cart::where('user_id',$user_id)->sum('quantity');
	}else{
		$session_id = Session::get('session_id');
		$totalCartItems = Cart::where('session_id',$session_id)->sum('quantity');
	}
	return $totalCartItems;
}

function getCartItems()
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