@extends('admin.layout.layout')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
<form class="forms-sample" id="attribiteFrom" action="{{route('addImage.course',['id'=>$coursedata['id']])}}" method="post" enctype="multipart/form-data">
   @csrf
   <div class="row">
   <div class="col-xl-6 col-lg-6">
      <div class="card">
         <div class="card-body">
            <div class="row">
               <div class="col-sm-12 col-md-12">
                <div class="col-md-12">
                        <input multiple="" id="image" name="image[]" type="file" name="image[]" value=""/>
                        {{-- <a href="javascript:void(0);" class="add_button" style="color: orange;" title="Add field">Add Image</a> --}}
                </div>
               </div>
               <div class="col-xl-12 col-lg-12 mb-4">
                  <div class="text-center">
                     <div class="btn-list">
                        @if(empty($attribite['id']))
                        <button type="submit" class="btn btn-primary mt-4 mb-0">Create Attribute</button>
                        @else
                        <button type="submit" class="btn btn-primary mt-4 mb-0">Update Attribute</button>
                        @endif
                     </div>
                  </div>
               </div>
               <br></form>
</div>
<!-- End Row -->
</div>
</div>
<div class="row">
   <div class="col-12">
       <div class="">
           <form name="editimageForm" id="editimageForm" method="post"
               action="{{ route('editAttribute.course',['id'=>$coursedata['id']]) }}">@csrf
               <div class="card">
                   <div class="card-header">
                       <h3 class="card-title">Update Multiple Images</h3>
                   </div>
                   <!-- /.card-header -->
                   <div class="card-body">
                       <div class="table-responsive">
                           <table id="example" class="table table-bordered text-nowrap key-buttons">
                               <thead>
                                   <tr>
                                       <th>ID</th>
                                       <th>Image</th>
                                       <th>Actions</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   @foreach ($coursedata['images'] as $data)
                                   <input style="display: none;" type="text" name="attrId[]" value="{{$data['id']}}">
                                       <tr>
                                           <td>{{ $data['id'] }}</td>
                                           <td>
                                            <img class="form" style="width: 140px; height: 140px;" src="{{asset('admin/multiimage/'.$data['image'])}}" alt="">
                                           </td>                                       
                                           <td>
                                               @if ($data['status'] == 1)
                                                   <a class="updateImageStatus"
                                                       id="video-{{ $data['id'] }}"
                                                       video_id="{{ $data['id'] }}"
                                                       href="javascript:void(0)"><i
                                                           style="font-size:25px;"
                                                           class="mdi mdi-bookmark-check"
                                                           status="Active"></i></a>
                                               @else
                                                   <a class="updateImageStatus"
                                                       id="video-{{ $data['id'] }}"
                                                       video_id="{{ $data['id'] }}"
                                                       href="javascript:void(0)"><i
                                                           style="font-size:25px;"
                                                           class="mdi mdi-bookmark-outline"
                                                           status="Inactive"></i></a>
                                               @endif
                                               &nbsp;
                                               <a title="Attribute" class="confirmDelete"
                                                   href="{{ route('image.delete',['id'=>$data['id']]) }}"><i
                                                       style="font-size:25px;"
                                                       class="mdi mdi-file-excel-box"></i></a>
                                           </td>
                                       </tr>
                                   @endforeach
                               </tbody>
                           </table>
                       </div>
                   </div>
                   <div class="card-footer">
                       <button type="submit" class="btn btn-primary">Update Images</button>
                   </div>
           </form>
       </div>
       <!--/div-->
   </div>
</div>
</div>
<!-- Include Bootstrap CSS and JavaScript -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection