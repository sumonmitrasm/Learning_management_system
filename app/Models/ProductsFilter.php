<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsFilter extends Model
{
    use HasFactory;
    public static function filterValueName($filter_id){
        $valuename = ProductsFilter::select('filter_name')->where('id',$filter_id)->first();
        return $valuename->filter_name;
    }
    public function filter_values()
    {
        return $this->hasMany('App\Models\ProductsFiltersValue','filter_id');
    }
    public static function productsFilters(){
        $productsFilters = ProductsFilter::with('filter_values')->where('status',1)->get()->toArray();
        return $productsFilters;
    }
}
