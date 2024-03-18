<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
      <!-- Meta data -->
      <meta charset="UTF-8">
      <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
      <meta content="Blood Donation Camp" name="description">
      <meta content="PATHWAY" name="author">
      <meta name="keywords" content="admin, admin template, dashboard, admin dashboard, bootstrap 5, responsive, clean, ui, admin panel, ui kit, responsive admin, application, bootstrap 4, flat, bootstrap5, admin dashboard template" />
      <!-- Title -->
      <title>Blood Donation Camp</title>
      <!--Favicon -->
      <link rel="icon" href="{{ asset('admin/assets/images/brand/favicon.ico') }}" type="image/x-icon" />
      <!-- Bootstrap css -->
      <link id="style" href="{{ url('admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
      <!-- Style css -->
      <link href="{{ url('admin/assets/css/style.css') }}" rel="stylesheet" />
      <!-- Plugin css -->
      <link href="{{ url('admin/assets/css/plugin.css') }}" rel="stylesheet" />
      <!-- Animate css -->
      <link href="{{ url('admin/assets/css/animated.css') }}" rel="stylesheet" />
      <!---Icons css-->
      <link href="{{ url('admin/assets/plugins/web-fonts/icons.css') }}" rel="stylesheet" />
      <link href="{{ url('admin/assets/plugins/web-fonts/font-awesome/font-awesome.min.css') }}" rel="stylesheet">
      <link href="{{ url('admin/assets/plugins/web-fonts/plugin.css') }}" rel="stylesheet" />
   </head>

<body class="main-body light-mode ltr page-style1 page-style2 error-page">

	<div class="page">
		<div class="row">
		</div>
		<div class="d-md-flex">
			<div class="w-40 bg-style h-100vh page-style">
				<div class="page-content" >
					<div class="page-single-content">
						<img src="{{ asset('admin/assets/images/brand/logos.png') }}" alt="img" class="header-brand-img mb-5">
						<div class="card-body text-white py-5 px-8 text-center">
							<img src="{{ asset('admin/assets/images/png/blood.jpg') }}" alt="img" class="w-100 mx-auto text-center">
						</div>
					</div>
				</div>
			</div>
			<div class="w-80 page-content">
				<div class="page-single-content">
					<div class="card-body p-6">
						<div class="row">
							<div class="col-md-8 mx-auto d-block">
								<div class="">
									<h1 class="mb-2">Login</h1>
									<p class="text-muted">Sign In to your account</p>
								</div>
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
								<form class="pt-3" action="{{url('admin/login')}}" method="post">@csrf
									<div class="input-group mb-3">
										<span class="input-group-addon"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 16c-2.69 0-5.77 1.28-6 2h12c-.2-.71-3.3-2-6-2z" opacity=".3"/><circle cx="12" cy="8" opacity=".3" r="2"/><path d="M12 14c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4zm-6 4c.22-.72 3.31-2 6-2 2.7 0 5.8 1.29 6 2H6zm6-6c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z"/></svg></span>
										<input type="text" name="email" class="form-control" placeholder="Enter your Email">
									</div>
									<div class="input-group mb-4">
										<span class="input-group-addon"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><g fill="none"><path d="M0 0h24v24H0V0z"/><path d="M0 0h24v24H0V0z" opacity=".87"/></g><path d="M6 20h12V10H6v10zm6-7c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z" opacity=".3"/><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6zm9 14H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/></svg></span>
										<input type="password" name="password" class="form-control" placeholder="Enter your Password">
									</div>
									<div class="row">
										<!-- <div class="col-12">
											<a href="forgot-password-1.html" class="btn btn-link box-shadow-0 px-0">Forgot password?</a>
										</div> -->
										<div class="col-12">
											<button class="btn btn-primary btn-block"> <i class="fe fe-arrow-right"></i> Login</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Jquery js-->
	<script src="{{ url('admin/assets/js/vendors/jquery.min.js') }}"></script>

	<!-- Bootstrap5 js-->
	<script src="{{ url('admin/assets/plugins/bootstrap/js/popper.min.js') }}"></script>
	<script src="{{ url('admin/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

	<!--Othercharts js-->
	<script src="{{ url('admin/assets/plugins/othercharts/jquery.sparkline.min.js') }}"></script>

	<!-- Circle-progress js-->
	<script src="{{ url('admin/assets/js/vendors/circle-progress.min.js') }}"></script>

	<!-- Jquery-rating js-->
	<script src="{{ url('admin/assets/plugins/rating/jquery.rating-stars.js') }}"></script>

	<!-- P-scroll js-->
	<script src="{{ url('admin/assets/plugins/p-scrollbar/p-scrollbar.js') }}"></script>

	<!-- Color Theme js -->
	 <script src="{{ url('admin/assets/js/themeColors.js') }}"></script>

	 <!-- Switcher-Styles js -->
    <script src="{{ url('admin/assets/js/switcher-styles.js') }}"></script>

	<!-- Custom js-->
	<script src="{{ url('admin/assets/js/custom.js') }}"></script>
	<!-- Include Bootstrap CSS and JavaScript -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
