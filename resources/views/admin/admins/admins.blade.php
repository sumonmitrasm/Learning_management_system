@extends('admin.layout.layout')
@section('content')
<div class="app-content main-content">
    <div class="side-app">
        <div class="container-fluid main-container">

            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title">Data Tables</h4>
                </div>
                <div class="page-rightheader ms-auto d-lg-flex d-none">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)" class="d-flex"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"/><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"/></svg><span class="breadcrumb-icon"> Home</span></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Tables</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->
            <!-- Row -->
            <div class="row">
                <div class="col-12">
                    <!--div-->
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">{{$title}}</div>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <div class="table-responsive">
                                    <table id="example" class="table table-bordered text-nowrap key-buttons">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom-0">Action</th>
                                                <th class="border-bottom-0">Status</th>
                                                <th class="border-bottom-0">Admin ID</th>
                                                <th class="border-bottom-0">Name</th>
                                                <th class="border-bottom-0">Type</th>
                                                <th class="border-bottom-0">Mobile</th>
                                                <th class="border-bottom-0">Email</th>
                                                <th class="border-bottom-0">Image</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($admins as $admin)
                                            <tr><br><br>
                                                <td>
                                                    @if($admin['type']=="vendor")
                                                    <a href="{{url('admin/view-vendor-details/'.$admin['id'])}}"><i style="font-size:120%;" class="ti-layers"></i></a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($admin['status'] == 1)
                                                    <a class="updateadminStatus" id="admin-{{$admin['id']}}" admin_id="{{$admin['id']}}" href="javascript:void(0)"><i style="font-size:150%; color: #efa06b;" class="fa-solid fa-toggle-on fa-lg"  status="Active"></i></a>
                                                    @else
                                                    <a class="updateadminStatus" id="admin-{{$admin['id']}}" admin_id="{{$admin['id']}}" href="javascript:void(0)"><i style="font-size:150%; color: #efa06b;" class="fa-solid fa-toggle-off fa-lg" status="Inactive"></i></a>
                                                    @endif
                                                </td>
                                                <td>{{$admin['id']}}</td>
                                                <td>{{$admin['name']}}</td>
                                                <td>{{$admin['type']}}</td>
                                                <td>{{$admin['mobile']}}</td>
                                                <td>{{$admin['email']}}</td>
                                                <td><img width="250px;" src="{{asset('admin/admin_images/small/'.$admin['image'])}}"></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/div-->
                </div>
            </div>
            <!-- /Row -->
        </div>
    </div>
</div>

@endsection