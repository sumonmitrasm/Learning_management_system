<?php 
use App\Models\ProductsFilter;
$productsFilters = ProductsFilter::productsFilters();

if (isset($course['category_id'])) {
      $category_id = $course['category_id'];
}
?>
@foreach($productsFilters as $filter)
@if(isset($category_id))
@php 
  $filterAvailable = ProductsFilter::filterAvailable($filter['id'],$category_id);
@endphp
@if($filterAvailable=="Yes")
<label for="exampleInputEmail1" class="form-label">{{$filter['filter_name']}}</label>
<select id="{{$filter['filter_column']}}" name="{{$filter['filter_column']}}" class="form-control text-dark">
    <option value="">--Select Filter Value--</option>
        @foreach($filter['filter_values'] as $value)
            <option value="{{$value['filter_value']}}" @if(!empty($course[$filter['filter_column']]) && $value['filter_value']==$course[$filter['filter_column']]) selected="" @endif>{{ucwords($value['filter_value'])}}</option>
        @endforeach
</select>
@endif
@endif
@endforeach