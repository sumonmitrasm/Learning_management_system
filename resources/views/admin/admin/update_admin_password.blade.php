@extends('admin.layout.layout')
@section('content')
<div class="app-content main-content">
   <div class="side-app">
      <div class="container-fluid main-container">
         <!--Page header-->
         <div class="page-header">
            <div class="page-leftheader">
               <h4 class="page-title">Section-Form-Elements</h4>
            </div>
            <div class="page-rightheader ms-auto d-lg-flex d-none">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                     <a href="javascript:void(0)" class="d-flex">
                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                           <path d="M0 0h24v24H0V0z" fill="none"/>
                           <path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"/>
                           <path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"/>
                        </svg>
                        <span class="breadcrumb-icon"> Home</span>
                     </a>
                  </li>
                  <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
                  <li class="breadcrumb-item"><a href="javascript:void(0)">Elements</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form-Elements</li>
               </ol>
            </div>
         </div>
         <!--End Page header-->
         <!-- End Row-->
         <div class="row">
            <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12">
               <div class="card">
                @if(Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                   <strong>Error:</strong> {{Session::get('error_message')}}
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                   </button>
                </div>
                @endif
                @if(Session::has('success_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                   <strong>Success:</strong> {{Session::get('success_message')}}
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                   </button>
                </div>
                @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                  <div class="card-header">
                     <h4 class="card-title">Update admin Password</h4>
                  </div>
                  <div class="card-body">
                    <form class="forms-sample" action="{{url('admin/update-admin-password')}}" method="post"  enctype="multipart/form-data">@csrf
                        <div class="">
                           <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Enter admin Email</label>
                              <input type="text" class="form-control" id="name" name="name" value="{{ $adminDetails['email'] }}" readonly="" placeholder="Enter your Email">
                           </div>
                           <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Admin Type</label>
                            <input type="text" class="form-control" id="type" name="type" value="{{ $adminDetails['type'] }}" readonly="" placeholder="Enter Admin Type">
                         </div>
                         <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Enter Current Password">
                         </div>
                         <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter New Password">
                         </div>
                         <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Enter Confirm Password">
                         </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4 mb-0">Submit</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <!-- End Row -->
      </div>
   </div>
</div>
@endsection
