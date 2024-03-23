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
                     <form class="forms-sample" @if(empty($filterValue['id'])) action="{{route('addEdit.filtersValue')}}" @else action="{{ route('addEdit.filtersValue', ['id' => $filterValue['id']]) }}" @endif  method="post"  enctype="multipart/form-data">@csrf
                     <div class="">
                        <div class="mb-3">
                           <label for="exampleInputEmail1" class="form-label">Enter filter</label>
                           <select id="filter_id" name="filter_id" class="form-control">
                              <option value="">Select</option>
                              @foreach($filters as $value)
                              <option value="{{$value['id']}}" @if(!empty($filterValue['filter_id']) && $filterValue['filter_id']==$value['id']) selected="" @endif>{{$value['filter_name']}}</option>
                              @endforeach
                           </select>
                        </div>
                        <div class="mb-3">
                           <label for="exampleInputEmail1" class="form-label">Filter Column</label>
                           <input type="text" class="form-control" id="filter_value" name="filter_value" value="{{ $filterValue['filter_value'] }}" placeholder="Enter Filter Value">
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