@extends('admin.layout.layout')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
   $(document).ready(function () {
       var selDiv = $("#selectedBannerimages");
       var storedFiles = [];
   
       $("#img1").on("change", handleFileSelect);
   
       function handleFileSelect(e) {
           var files = e.target.files;
           var filesArr = Array.prototype.slice.call(files);
   
           filesArr.forEach(function (f) {
               if (!f.type.match("image.*")) {
                   return;
               }
               storedFiles.push(f);
   
               var reader = new FileReader();
               reader.onload = function (e) {
                   var html =
                       '<img src="' +
                       e.target.result +
                       '" data-file="' +
                       f.name +
                       '" alt="Category Image1" height="150px" width="150px" style="border-radius: 10px;">';
                   selDiv.html(html);
               };
               reader.readAsDataURL(f);
           });
       }
   });
</script>
<style>
   #container {
   width: 1000px;
   margin: 20px auto;
   }
   .ck-editor__editable[role="textbox"] {
   /* editing area */
   min-height: 100px;
   }
   .ck-content .image {
   /* block images */
   max-width: 80%;
   margin: 20px auto;
   }
</style>
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
         <form class="forms-sample" id="courseFrom" action="javascript:;" method="post" enctype="multipart/form-data">@csrf
         <div class="row">
            <div class="col-xl-6 col-lg-6">
               <div class="card">
                  <div class="card-body">
                     <div class="row">
                        @if(!empty($course['id']))
                        <div class="col-sm-12 col-md-12">
                           <div class="mb-3">
                              <input type="hidden" id="course_id" name="course_id" value="{{ $course['id'] }}">
                           </div>
                        </div>
                        @endif
                        <div class="col-sm-12 col-md-12">
                           <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Course Name</label>
                              <input type="text" class="form-control" id="course_name" name="course_name" @if(!empty($course['course_name'])) value="{{$course['course_name']}}" @else value="{{old('name')}}" @endif placeholder="Enter course">
                              <p id="course-course_name"></p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                           <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Course Code</label>
                              <input type="text" class="form-control" id="course_code" name="course_code" @if(!empty($course['course_code'])) value="{{$course['course_code']}}" @else value="{{old('course_code')}}" @endif placeholder="Enter course_code">
                              <p id="course-course_code"></p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                           <div class="mb-3">
                              <div id="appendCategoriesLevel">
                                 <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">--Select Category--</label>
                                    <select id="category_id" name="category_id" class="form-control text-dark">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $section)
                                            <optgroup label="{{$section['name']}}"></optgroup>
                                                @foreach($section['categories'] as $category)
                                                    <option value="{{$category['id']}}" @if(!empty($course['category_id']) && $course['category_id']==$category['id']) selected="" @endif>&nbsp;&nbsp;&nbsp;--&nbsp;&nbsp;{{$category['category_name']}}</option>
                                                        @foreach($category['subcategories'] as $subcategory)
                                                            <option value="{{$subcategory['id']}}" @if(!empty($course['category_id']) && $course['category_id']==$subcategory['id']) selected="" @endif>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;---&nbsp;&nbsp;{{$subcategory['category_name']}}</option>
                                                        @endforeach
                                                @endforeach
                                        @endforeach
                                </select>
                            </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                           <div class="mb-3">
                              <div class="loadFilters">
                                 @include('admin.course.lode_available_filters')
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                           <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Course Price</label>
                              <input type="number" class="form-control" id="course_price" name="course_price" @if(!empty($course['course_price'])) value="{{$course['course_price']}}" @else value="{{old('course_price')}}" @endif placeholder="Enter course price">
                              <p id="course-course_price"></p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="mb-3">
                               <label for="exampleInputEmail1" class="form-label">Course Discount Price</label>
                               <input type="number" class="form-control" id="course_discount" name="course_discount" @if(!empty($course['course_discount'])) value="{{$course['course_discount']}}" @else value="{{old('course_discount')}}" @endif placeholder="Enter course discount price">
                               <p id="course-course_discount"></p>
                            </div>
                         </div>
                         <div class="col-sm-12 col-md-12">
                            <div class="mb-3">
                               <label for="exampleInputEmail1" class="form-label">Image</label>
                               <input id="img1" type="file" class="form-control" id="image" name="image" ><br>
                               <div id="selectedBannerimages"></div>
                               @if(!empty($course['image']))
                               <div>
                                  <img style="width: 80px; height: 50px; margin-top: 5px;" src="{{ asset('admin/course/large/'.$course['image']) }}" alt=""> &nbsp;
                                  <a target="_blank" href="{{ asset('admin/course/large/'.$course['image']) }}"> <span style="color:green">Click Here</span></a> &nbsp;&nbsp;
                               </div>
                               @endif
                               <p id="course-image"></p>
                            </div>
                         </div>
                         <div class="col-sm-12 col-md-12">
                            <div class="mb-3">
                               <label for="exampleInputEmail1" class="form-label">Course Video</label>
                               <input type="text" class="form-control" id="course_video" name="course_video" @if(!empty($course['course_video'])) value="{{$course['course_video']}}" @else value="{{old('course_video')}}" @endif placeholder="Enter course_video">
                            </div>
                         </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="mb-3">
                               <label for="exampleInputEmail1" class="form-label">Description<span style="color:red">*</span></label>
                               <textarea id="editor" name="description">@if(!empty($course['description'])){{$course['description']}}@else{{old('description')}}@endif</textarea>
                               <p id="course-description"></p>
                            </div>
                         </div>

                         <div class="col-sm-12 col-md-12">
                            <div class="mb-3">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="is_featured"
                                        value="Yes" @if(!empty($course['is_featured']) &&
                                        $course['is_featured']=="Yes" ) checked="" @endif>
                                    <span class="custom-control-label">Is Featured</span>
                                </label>
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
                              {{-- <div class="mb-3">
                                 <label for="exampleInputEmail1" class="form-label">URL Structure</label>
                                 <input type="text" class="form-control" id="url_structure" name="url_structure" @if(!empty($course['url_structure'])) value="{{$course['url_structure']}}" @else value="{{old('url_structure')}}" @endif placeholder="Enter Seo Title">
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                           <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Heading Tags</label>
                              <input type="text" class="form-control" id="heading_tag" name="heading_tag" @if(!empty($course['heading_tag'])) value="{{$course['heading_tag']}}" @else value="{{old('heading_tag')}}" @endif placeholder="Enter Heading Tag">
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                           <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Schema Markup</label>
                              <input type="text" class="form-control" id="schema_markup" name="schema_markup" @if(!empty($course['schema_markup'])) value="{{$course['schema_markup']}}" @else value="{{old('schema_markup')}}" @endif placeholder="Enter Schema Markup">
                           </div>
                        </div> --}}
                        <div class="col-sm-12 col-md-12">
                           <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Meta Title</label>
                              <input type="text" class="form-control" id="meta_title" name="meta_title" @if(!empty($course['meta_title'])) value="{{$course['meta_title']}}" @else value="{{old('meta_title')}}" @endif placeholder="Enter Meta Title">
                           </div>
                        </div>
                        {{-- <div class="col-sm-12 col-md-12">
                           <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Meta data</label>
                              <input type="text" class="form-control" id="meta_data" name="meta_data" @if(!empty($course['meta_data'])) value="{{$course['meta_data']}}" @else value="{{old('meta_data')}}" @endif placeholder="Enter Meta Data">
                           </div>
                        </div> --}}
                        <div class="col-sm-12 col-md-12">
                           <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Meta Description</label>
                              <textarea type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Enter meta Description">@if (!empty($course['meta_description'])){{ $course['meta_description'] }}@else{{ old('meta_description') }}@endif</textarea>
                           </div>
                           <div class="col-sm-12 col-md-12">
                              <div class="mb-3">
                                 <label for="exampleInputEmail1" class="form-label">Meta Keywords</label>
                                 <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" @if(!empty($course['meta_keywords'])) value="{{$course['meta_keywords']}}" @else value="{{old('meta_keywords')}}" @endif placeholder="Enter Meta Keywords">
                              </div>
                           </div>
                           {{-- <div class="col-sm-12 col-md-12">
                              <div class="mb-3">
                                 <label for="exampleInputEmail1" class="form-label">Meta robots</label>
                                 <input type="text" class="form-control" id="meta_robot" name="meta_robot" @if(!empty($course['meta_robot'])) value="{{$course['meta_robot']}}" @else value="{{old('meta_robot')}}" @endif placeholder="Enter Meta Robot">
                              </div>
                           </div> --}}
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-12 col-lg-12 mb-4">
               <div class="text-center">
                  <div class="btn-list">
                     @if(empty($course['id']))
                     <button type="submit" class="btn btn-primary mt-4 mb-0">Create Course</button>
                     @else
                     <button type="submit" class="btn btn-primary mt-4 mb-0">Update Course</button>
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