<div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">--Select Category--</label>
        <select id="category_id" name="category_id" class="form-control text-dark">
            <option value="">Select Category</option>
            @foreach($categories as $section)
                <optgroup label="{{$section['name']}}"></optgroup>
                    @foreach($section['categories'] as $category)
                        <option value="{{$category['id']}}" @if(!empty($course['category_id']) && $course['category_id']==$category['category_id']) selected="" @endif>&nbsp;&nbsp;&nbsp;--&nbsp;&nbsp;{{$category['category_name']}}</option>
                            @foreach($category['subcategories'] as $subcategory)
                                <option value="{{$subcategory['id']}}" @if(!empty($course['category_id']) && $course['category_id']==$subcategory['id']) selected="" @endif>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;---&nbsp;&nbsp;{{$subcategory['category_name']}}</option>
                            @endforeach
                    @endforeach
            @endforeach
    </select>
</div>


{{-- <div class="form-group">
    <label for="exampleInputName">Select Category</label>
    <select id="category_id" name="category_id" class="form-control text-dark">
          <option value="">Select</option>
          @foreach($categories as $section)
          <optgroup label="{{$section['name']}}"></optgroup>
              @foreach($section['categories'] as $category)
              <option value="{{$category['id']}}" @if(!empty($product['category_id']) && $product['category_id']==$category['id']) selected="" @endif>&nbsp;&nbsp;&nbsp;--&nbsp;&nbsp;{{$category['category_name']}}</option>
                  @foreach($category['subcategories'] as $subcategory)
                  <option value="{{$subcategory['id']}}" @if(!empty($product['category_id']) && $product['category_id']==$subcategory['id']) selected="" @endif>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;---&nbsp;&nbsp;{{$subcategory['category_name']}}</option>
            @endforeach
        @endforeach
      @endforeach
    </select>
</div> --}}

