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
}
