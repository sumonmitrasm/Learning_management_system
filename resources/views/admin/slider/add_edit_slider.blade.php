@extends('admin.layout.layout')
@section('content')
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
                    <form class="forms-sample" @if(empty($slider['id'])) action="{{route('addEdit.slider')}}" @else action="{{url('addEdit.slider',['id'=>$slider['id']])}}" @endif  method="post"  enctype="multipart/form-data">@csrf
                        <div class="col-sm-12 col-md-12">
                           <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Enter Slider Name</label>
                              <input type="text" class="form-control" id="name" name="name" @if(!empty($slider['name'])) value="{{$slider['name']}}" @else value="{{old('name')}}" placeholder="Enter Slider Name">
                           </div>
                           <div class="col-sm-12 col-md-12">
                            <div class="mb-3">
                               <label for="exampleInputEmail1" class="form-label">Image</label>
                               <input id="img1" type="file" class="form-control" name="image" ><br>
                               <div id="selectedBannerimages"></div>
                               @if(!empty($slider['image']))
                               <div>
                                  <img style="width: 80px; height: 50px; margin-top: 5px;" src="{{ asset('admin/slider/'.$slider['image']) }}" alt=""> &nbsp;
                                  <a target="_blank" href="{{ asset('admin/slider/'.$slider['image']) }}"> <span style="color:green">Click Here</span></a> &nbsp;&nbsp;
                               </div>
                               @endif
                            </div>
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
