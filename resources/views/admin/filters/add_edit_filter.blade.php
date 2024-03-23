@extends('admin.layout.layout')
@section('content')
<div class="app-content main-content">
   <div class="side-app">
      <div class="container-fluid main-container">
         <!--Page header-->
         <div class="page-header">
            <div class="page-leftheader">
               <h4 class="page-title">{{$title}}</h4>
            </div>
         </div>
         <!--End Page header-->
         <!-- End Row-->
         <div class="row">
            <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12">
               <div class="card">
                  @if ($errors->any())
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                     @foreach ($errors->all() as $error)
                     <strong>Error Message: </strong>{{ $error }}
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                     <br>
                     @endforeach
                  </div>
                  @endif
                  @if(Session::has('error_message'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                     <strong>Error Message: </strong>{{Session::get('error_message')}}
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  @endif
                  @if(Session::has('success_message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                     <strong>Success Message: </strong>{{Session::get('success_message')}}
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  @endif
                  <div class="card-header">
                     <h4 class="card-title">{{$title}} Form</h4>
                  </div>
                  <div class="card-body">
                     <form class="forms-sample" @if(empty($filter['id'])) action="{{route('addEdit.filter')}}" @else action="{{ route('addEdit.filter', ['id' => $filter['id']]) }}" @endif  method="post"  enctype="multipart/form-data">@csrf
                     <div class="">
                        <div class="mb-3">
                           <label for="exampleInputEmail1" class="form-label">Enter filter</label>
                           <input type="text" class="form-control" id="filter_name" name="filter_name" value="{{ $filter['filter_name'] }}" placeholder="Enter Filter Name">
                        </div>
                        <div class="mb-3">
                           <label for="exampleInputEmail1" class="form-label">Select Category</label>
                           @php
                           $selectedCatIds = !empty($filter->cat_ids) ? explode(',', $filter->cat_ids) : [];
                           @endphp
                           <select class="form-control" id="cat_ids" name="cat_ids[]" multiple="" style="height: 200px;">
                              <option value="">--Select Category--</option>
                              @foreach($categories as $value)
                              <optgroup label="{{$value['name']}}"></optgroup>
                              @foreach($value['categories'] as $category)
                              <option value="{{$category['id']}}" @if(in_array($category['id'], $selectedCatIds)) selected @endif>
                              &nbsp;&nbsp;&nbsp;>>&nbsp;&nbsp;{{$category['category_name']}}
                              </option>
                              @foreach($category['subcategories'] as $subcategory)
                              <option value="{{$subcategory['id']}}" @if(in_array($subcategory['id'], $selectedCatIds)) selected @endif>
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>>>&nbsp;&nbsp;{{$subcategory['category_name']}}
                              </option>
                              @endforeach
                              @endforeach
                              @endforeach
                           </select>
                        </div>
                        <div class="mb-3">
                           <label for="exampleInputEmail1" class="form-label">Filter Column</label>
                           <input type="text" class="form-control" id="filter_column" name="filter_column" value="{{ $filter['filter_column'] }}" placeholder="Enter filter Column">
                        </div>
                     </div>
                     <button type="submit" class="btn btn-primary mt-4 mb-0">Create</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <!-- End Row -->
      </div>
   </div>
</div>
<!-- Include Bootstrap CSS and JavaScript -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection