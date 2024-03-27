<?php 
use App\Models\ProductsFilter;
$productsFilters = ProductsFilter::productsFilters();
?>
@foreach($productsFilters as $filter)
<label for="exampleInputEmail1" class="form-label">{{$filter['filter_name']}}</label>
<select id="{{$filter['filter_column']}}" name="{{$filter['filter_column']}}" class="form-control text-dark">
    <option value="">--Select Filter Value--</option>
        @foreach($filter['filter_values'] as $value)
            <option value="{{$value['filter_value']}}">{{ucwords($value['filter_value'])}}</option>
        @endforeach
</select>
@endforeach