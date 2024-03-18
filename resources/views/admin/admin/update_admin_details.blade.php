@extends('admin.layout.layout')
@section('content')
    <div class="app-content main-content">
        <div class="side-app">
            <div class="container-fluid main-container">

                <!--Page header-->
                <div class="page-header">
                    <div class="page-leftheader">
                        <h4 class="page-title">Profile Settings</h4>
                    </div>
                    <div class="page-rightheader ms-auto d-lg-flex d-none">
                        {{--  <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)" class="d-flex"><svg class="svg-icon"
                                        xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                                        width="24">
                                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                                        <path
                                            d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z">
                                        </path>
                                        <path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"></path>
                                    </svg><span class="breadcrumb-icon"> Home</span></a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Profile</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile 02</li>
                        </ol>  --}}
                    </div>
                </div>
                <!--End Page header-->

                <div class="main-proifle">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="box-widget widget-user">
                                <div class="widget-user-image d-sm-flex">
                                    <img alt="User Avatar" class="rounded-circle border p-0"
                                        src="{{ asset('admin/admin_images/small/'.Auth::guard('admin')->user()->image) }}" style="width: 100px; height: 100px">
                                    <div class="ms-sm-4 mt-4">
                                        <h4 class="pro-user-username mb-3 font-weight-bold">{{ $adminDetails['name'] }} <i
                                                class="fa fa-check-circle text-success"></i></h4>
                                        <div class="d-flex mb-1">
                                            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24"
                                                viewBox="0 0 24 24" width="24">
                                                <path d="M0 0h24v24H0V0z" fill="none"></path>
                                                <path
                                                    d="M5.08 8h2.95c.32-1.25.78-2.45 1.38-3.56-1.84.63-3.37 1.9-4.33 3.56zm2.42 4c0-.68.06-1.34.14-2H4.26c-.16.64-.26 1.31-.26 2s.1 1.36.26 2h3.38c-.08-.66-.14-1.32-.14-2zm-2.42 4c.96 1.66 2.49 2.93 4.33 3.56-.6-1.11-1.06-2.31-1.38-3.56H5.08zM12 4.04c-.83 1.2-1.48 2.53-1.91 3.96h3.82c-.43-1.43-1.08-2.76-1.91-3.96zM18.92 8c-.96-1.65-2.49-2.93-4.33-3.56.6 1.11 1.06 2.31 1.38 3.56h2.95zM12 19.96c.83-1.2 1.48-2.53 1.91-3.96h-3.82c.43 1.43 1.08 2.76 1.91 3.96zm2.59-.4c1.84-.63 3.37-1.91 4.33-3.56h-2.95c-.32 1.25-.78 2.45-1.38 3.56zM19.74 10h-3.38c.08.66.14 1.32.14 2s-.06 1.34-.14 2h3.38c.16-.64.26-1.31.26-2s-.1-1.36-.26-2zM9.66 10c-.09.65-.16 1.32-.16 2s.07 1.34.16 2h4.68c.09-.66.16-1.32.16-2s-.07-1.35-.16-2H9.66z"
                                                    opacity=".3"></path>
                                                <path
                                                    d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm6.93 6h-2.95c-.32-1.25-.78-2.45-1.38-3.56 1.84.63 3.37 1.91 4.33 3.56zM12 4.04c.83 1.2 1.48 2.53 1.91 3.96h-3.82c.43-1.43 1.08-2.76 1.91-3.96zM4.26 14C4.1 13.36 4 12.69 4 12s.1-1.36.26-2h3.38c-.08.66-.14 1.32-.14 2s.06 1.34.14 2H4.26zm.82 2h2.95c.32 1.25.78 2.45 1.38 3.56-1.84-.63-3.37-1.9-4.33-3.56zm2.95-8H5.08c.96-1.66 2.49-2.93 4.33-3.56C8.81 5.55 8.35 6.75 8.03 8zM12 19.96c-.83-1.2-1.48-2.53-1.91-3.96h3.82c-.43 1.43-1.08 2.76-1.91 3.96zM14.34 14H9.66c-.09-.66-.16-1.32-.16-2s.07-1.35.16-2h4.68c.09.65.16 1.32.16 2s-.07 1.34-.16 2zm.25 5.56c.6-1.11 1.06-2.31 1.38-3.56h2.95c-.96 1.65-2.49 2.93-4.33 3.56zM16.36 14c.08-.66.14-1.32.14-2s-.06-1.34-.14-2h3.38c.16.64.26 1.31.26 2s-.1 1.36-.26 2h-3.38z">
                                                </path>
                                            </svg>
                                            <div class="h6 mb-0 ms-3 mt-1">{{ $adminDetails['type'] }}</div>
                                        </div>
                                        <div class="d-flex mb-1">
                                            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24"
                                                viewBox="0 0 24 24" width="24">
                                                <path d="M0 0h24v24H0V0z" fill="none"></path>
                                                <path d="M20 8l-8 5-8-5v10h16zm0-2H4l8 4.99z" opacity=".3"></path>
                                                <path
                                                    d="M4 20h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2zM20 6l-8 4.99L4 6h16zM4 8l8 5 8-5v10H4V8z">
                                                </path>
                                            </svg>
                                            <div class="h6 mb-0 ms-3 mt-1">{{ $adminDetails['email'] }}</div>
                                        </div>
                                        <div class="d-flex">
                                            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24"
                                                viewBox="0 0 24 24" width="24">
                                                <path d="M0 0h24v24H0V0z" fill="none"></path>
                                                <path
                                                    d="M15.2 18.21c1.21.41 2.48.67 3.8.76v-1.5c-.88-.07-1.75-.22-2.6-.45l-1.2 1.19zM6.54 5h-1.5c.09 1.32.35 2.59.75 3.79l1.2-1.21c-.24-.83-.39-1.7-.45-2.58zM14 8h5V5h-5z"
                                                    opacity=".3"></path>
                                                <path
                                                    d="M20 15.5c-1.25 0-2.45-.2-3.57-.57-.1-.03-.21-.05-.31-.05-.26 0-.51.1-.71.29l-2.2 2.2c-2.83-1.44-5.15-3.75-6.59-6.58l2.2-2.21c.28-.27.36-.66.25-1.01C8.7 6.45 8.5 5.25 8.5 4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1 0 9.39 7.61 17 17 17 .55 0 1-.45 1-1v-3.5c0-.55-.45-1-1-1zM5.03 5h1.5c.07.88.22 1.75.46 2.59L5.79 8.8c-.41-1.21-.67-2.48-.76-3.8zM19 18.97c-1.32-.09-2.6-.35-3.8-.76l1.2-1.2c.85.24 1.72.39 2.6.45v1.51zM12 3v10l3-3h6V3h-9zm7 5h-5V5h5v3z">
                                                </path>
                                            </svg>
                                            <div class="h6 mb-0 ms-3 mt-1">{{ $adminDetails['mobile'] }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-auto">
                            {{--  <div class="text-lg-end mt-4 mt-lg-0 btn-list">
                                <a href="javascript:void(0)" class="btn btn-white">Message</a>
                                <a href="javascript:void(0)" class="btn btn-primary">Edit Profile</a>
                            </div>
                            <div class="mt-5">
                                <div class="main-profile-contact-list row">
                                    <div class="media col-sm-4 col-md-6 col-xl-4">
                                        <div class="media-icon bg-light text-primary me-3 mt-1">
                                            <i class="fa fa-sticky-note-o fs-18"></i>
                                        </div>
                                        <div class="media-body">
                                            <small class="text-muted">Posts</small>
                                            <div class="font-weight-bold fs-25">
                                                245
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media col-sm-4 col-md-6 col-xl-4">
                                        <div class="media-icon bg-light text-primary me-3 mt-1">
                                            <i class="fa fa-user fs-18"></i>
                                        </div>
                                        <div class="media-body">
                                            <small class="text-muted">Followers</small>
                                            <div class="font-weight-bold fs-25">
                                                689k
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media col-sm-4 col-md-12 col-xl-4">
                                        <div class="media-icon bg-light text-primary me-3 mt-1">
                                            <i class="fa fa-feed fs-18"></i>
                                        </div>
                                        <div class="media-body">
                                            <small class="text-muted">Following</small>
                                            <div class="font-weight-bold fs-25">
                                                3,765
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  --}}
                        </div>
                    </div>
                    <div class="profile-cover">
                        <div class="wideget-user-tab">
                            <div class="tab-menu-heading p-0">
                                <div class="tabs-menu1 px-3">
                                    <ul class="nav">
                                        <li><a href="#tab-7" class="active" data-bs-toggle="tab">Profile view and update</a></li>
                                        <li><a href="#tab-8" data-bs-toggle="tab" class="">Password Update</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.profile-cover -->
                </div>
                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="border-0">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-7">
                                    <div class="card">
                                        @if (Session::has('success_message'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong>Success:</strong> {{ Session::get('success_message') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                        @if (Session::has('error_message'))
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>Error:</strong> {{ Session::get('error_message') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
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

                                        <div class="card-body">
                                            <form class="forms-sample" action="{{ url('admin/update-admin-details') }}"
                                                method="post" enctype="multipart/form-data">@csrf
                                                <div class="">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Enter admin Email</label>
                                                        <input type="text" class="form-control" id="email " name="email "
                                                            value="{{ $adminDetails['email'] }}" readonly=""
                                                            placeholder="Enter your Email">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Admin Type</label>
                                                        <input type="text" class="form-control" id="type" name="type"
                                                            value="{{ $adminDetails['type'] }}" readonly=""
                                                            placeholder="Enter Admin Type">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Name</label>
                                                        <input type="text" class="form-control" id="name" name="name"
                                                            value="{{ $adminDetails['name'] }}" placeholder="Enter Your Name">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Mobile</label>
                                                        <input type="text" class="form-control" id="mobile" name="mobile"
                                                            value="{{ $adminDetails['mobile'] }}" placeholder="Enter Mobile Number">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Image</label>
                                                        <input type="file" class="form-control" id="image" name="image"
                                                            accept="image/">
                                                        @if (!empty(Auth::guard('admin')->user()->image))
                                                            <a target="_blank"
                                                                href="{{ url('admin/admin_images/small/' . Auth::guard('admin')->user()->image) }}">View
                                                                Image</a>
                                                            <input type="hidden" name="current_admin_image"
                                                                value="{{ Auth::guard('admin')->user()->image }}">
                                                        @endif
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary mt-4 mb-0">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-8">
                                    <div class="card p-5">
                                        <div class="card-body">
                                            <form class="forms-sample" action="{{ url('admin/update-admin-password') }}" method="post"
                                                enctype="multipart/form-data">@csrf
                                                <div class="">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Enter admin Email</label>
                                                        <input type="text" class="form-control" id="email " name="email "
                                                            value="{{ $adminDetails['email'] }}" readonly=""
                                                            placeholder="Enter your Email">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Admin Type</label>
                                                        <input type="text" class="form-control" id="type" name="type"
                                                            value="{{ $adminDetails['type'] }}" readonly=""
                                                            placeholder="Enter Admin Type">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Current Password</label>
                                                        <input type="password" class="form-control" id="current_password"
                                                            name="current_password" placeholder="Enter Current Password">
                                                            <span id="check_password"></span>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">New Password</label>
                                                        <input type="password" class="form-control" id="new_password"
                                                            name="new_password" placeholder="Enter New Password">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Confirm Password</label>
                                                        <input type="password" class="form-control" id="confirm_password"
                                                            name="confirm_password" placeholder="Enter Confirm Password">
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary mt-4 mb-0">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
