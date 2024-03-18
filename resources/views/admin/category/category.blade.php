@extends('admin.layout.layout')
@section('content')
<div class="app-content main-content">
    <div class="side-app">
        <div class="container-fluid main-container">
            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title">All {{ $title }}</h4>
                </div>
            </div>
            <!--End Page header-->
            <!-- Row -->
            <div class="row">
                <div class="col-12">
                    <!--div-->
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <div class="card-title">{{ $title }}</div>
                            <div><a href="{{url('admin/add-edit-category')}}"  class="btn btn-block btn-info">Add Category</a></div>
                        </div>
                        <div class="card-body">
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
                            <div class="">
                                <div class="table-responsive">
                                    <table id="example" class="table table-bordered text-nowrap key-buttons">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom-0">Category ID</th>
                                                <th class="border-bottom-0">Parent Category</th>
                                                <th class="border-bottom-0">Section Name</th>
                                                <th class="border-bottom-0">Category Name</th>
                                                <th class="border-bottom-0">Status</th>
                                                <th class="border-bottom-0">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($categorys as $category)
                                                @if(isset($category['parentcategory']['category_name']) && !empty($category['parentcategory']['category_name']))
                                                @php $parent_category = $category['parentcategory']['category_name']; @endphp
                                                @else
                                                    @php $parent_category = "Root"; @endphp
                                                @endif
                                            <tr>
                                                <td>{{ $category['id'] }}</td>
                                                <td>{{ $parent_category }}</td>
                                                <td>{{ $category['section']['name'] }}</td>
                                                <td>{{ $category['category_name'] }}</td>
                                                <td>
                                                    @if($category['status'] == 1)
                                                    <a class="updatecategoryStatus" id="category-{{$category['id']}}" category_id="{{$category['id']}}" href="javascript:void(0)"><i style="font-size:150%; color: #efa06b;" class="fa-solid fa-toggle-on fa-lg"  status="Active"></i></a>
                                                    @else
                                                    <a class="updatecategoryStatus" id="category-{{$category['id']}}" category_id="{{$category['id']}}" href="javascript:void(0)"><i style="font-size:150%; color: #efa06b;" class="fa-solid fa-toggle-off fa-lg" status="Inactive"></i></a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{url('admin/add-edit-category/'.$category['id'])}}"><i style="font-size:25px;" class="mdi mdi-pencil-box"></i></a>
                                                    <a href="javascript:void(0)" title="Delete Category" class="confirmDelete" module="category" moduleid="{{$category['id']}}"><i style="font-size:25px; color:red;" class="mdi mdi-file-excel-box"></i></a>
                                                </td>
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
<!-- Include Bootstrap CSS and JavaScript -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
