@extends('admin.layout.layout')
@section('content')
<div class="app-content main-content">
<div class="side-app">
<div class="container-fluid main-container">
   <!--Page header-->
   <div class="page-header">
      <div class="page-leftheader">
         <h4 class="page-title">{{ $title }}</h4>
      </div>
   </div>
   <!--End Page header-->
   <div class="row">
      <div class="col-xl-12 col-lg-12">
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
         <form class="forms-sample" @if(empty($category['id'])) action="{{url('admin/add-edit-category')}}" @else action="{{url('admin/add-edit-category/'.$category['id'])}}" @endif  method="post"  enctype="multipart/form-data">@csrf
         <div class="row">
            <div class="col-xl-6 col-lg-6">
               <div class="card">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-sm-12 col-md-12">
                           <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Category Name</label>
                              <input type="text" class="form-control" id="category_name" name="category_name" @if(!empty($category['category_name'])) value="{{$category['category_name']}}" @else value="{{old('name')}}" @endif placeholder="Enter Category">
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                           <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Select Section</label>
                              <select id="section_id" name="section_id" class="form-control">
                                 <option value="">Select</option>
                                 @foreach($getSection as $section)
                                 <option value="{{ $section['id'] }}" @if(!empty($category['section_id']) && $category['section_id']==$section['id']) selected="" @endif>{{ $section['name'] }}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                           <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">URL</label>
                              <input type="text" class="form-control" id="url" name="url" @if(!empty($category['url'])) value="{{$category['url']}}" @else value="{{old('url')}}" @endif placeholder="Enter URL">
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                           <div class="mb-3">
                              <div id="appendCategoriesLevel">
                                 @include('admin.category.append_categories_label')
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                           <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Category Position</label>
                              <input type="number" class="form-control" id="position" name="position" @if(!empty($category['position'])) value="{{$category['position']}}" @else value="{{old('position')}}" @endif placeholder="Enter Category Position">
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Category description</label>
                              <textarea type="text" class="form-control" id="description" name="description" placeholder="Enter Description">@if (!empty($category['description'])){{ $category['description'] }}@else{{ old('description') }}@endif</textarea>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-6 col-lg-6">
               <div class="card">
                  <div class="card-body">
                     <div class="row">
                        <div style="color:darkturquoise" class="mt-3 mb-3">SEO Section</div>
                        <div class="col-sm-12 col-md-12">
                           <div class="mb-3">
                              <div class="mb-3">
                                 <label for="exampleInputEmail1" class="form-label">URL Structure</label>
                                 <input type="text" class="form-control" id="url_structure" name="url_structure" @if(!empty($category['url_structure'])) value="{{$category['url_structure']}}" @else value="{{old('url_structure')}}" @endif placeholder="Enter Seo Title">
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                           <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Heading Tags</label>
                              <input type="text" class="form-control" id="heading_tag" name="heading_tag" @if(!empty($category['heading_tag'])) value="{{$category['heading_tag']}}" @else value="{{old('heading_tag')}}" @endif placeholder="Enter Heading Tag">
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                           <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Schema Markup</label>
                              <input type="text" class="form-control" id="schema_markup" name="schema_markup" @if(!empty($category['schema_markup'])) value="{{$category['schema_markup']}}" @else value="{{old('schema_markup')}}" @endif placeholder="Enter Schema Markup">
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                           <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Meta Title</label>
                              <input type="text" class="form-control" id="meta_title" name="meta_title" @if(!empty($category['meta_title'])) value="{{$category['meta_title']}}" @else value="{{old('meta_title')}}" @endif placeholder="Enter Meta Title">
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                           <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Meta data</label>
                              <input type="text" class="form-control" id="meta_data" name="meta_data" @if(!empty($category['meta_data'])) value="{{$category['meta_data']}}" @else value="{{old('meta_data')}}" @endif placeholder="Enter Meta Data">
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                           <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Meta Description</label>
                              <textarea type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Enter meta Description">@if (!empty($category['meta_description'])){{ $category['meta_description'] }}@else{{ old('meta_description') }}@endif</textarea>
                           </div>
                           <div class="col-sm-12 col-md-12">
                              <div class="mb-3">
                                 <label for="exampleInputEmail1" class="form-label">Meta Keywords</label>
                                 <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" @if(!empty($category['meta_keywords'])) value="{{$category['meta_keywords']}}" @else value="{{old('meta_keywords')}}" @endif placeholder="Enter Meta Keywords">
                              </div>
                           </div>
                           <div class="col-sm-12 col-md-12">
                              <div class="mb-3">
                                 <label for="exampleInputEmail1" class="form-label">Meta robots</label>
                                 <input type="text" class="form-control" id="meta_robot" name="meta_robot" @if(!empty($category['meta_robot'])) value="{{$category['meta_robot']}}" @else value="{{old('meta_robot')}}" @endif placeholder="Enter Meta Robot">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-12 col-lg-12 mb-4">
               <div class="text-center">
                  <div class="btn-list">
                     @if(empty($category['id']))
                     <button type="submit" class="btn btn-primary mt-4 mb-0">Create Category</button>
                     @else
                     <button type="submit" class="btn btn-primary mt-4 mb-0">Update Category</button>
                     @endif
                  </div>
               </div>
            </div>
            <br>
            </form>
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