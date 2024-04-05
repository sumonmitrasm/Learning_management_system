<!DOCTYPE html>
<html lang="en">
<!-- molla/index-13.html  22 Nov 2019 09:59:06 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Learing management and product sell</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('front/assets/images/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('front/assets/images/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('front/assets/images/icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ url('front/assets/images/icons/site.html') }}">
    <link rel="mask-icon" href="{{ asset('front/assets/images/icons/safari-pinned-tab.svg') }}" color="#666666">
    <link rel="shortcut icon" href="{{ asset('front/assets/images/icons/favicon.ico') }}">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{ url('front/assets/images/icons/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{ url('front/assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css') }}">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ url('front/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('front/assets/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ url('front/assets/css/plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ url('front/assets/css/plugins/jquery.countdown.css') }}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ url('front/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('front/assets/css/skins/skin-demo-13.css') }}">
    <link rel="stylesheet" href="{{ url('front/assets/css/demos/demo-13.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="page-wrapper">
        @include('front.layout.header')
        <!-- End .header -->

        @yield('content')
        <!-- End .main -->

        @include('front.layout.footer')
        <!-- End .footer -->
    </div><!-- End .page-wrapper -->
    @include('front.layout.aditional')
    <!-- Plugins JS File -->
    <script src="{{ url('front/assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('front/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('front/assets/js/jquery.hoverIntent.min.js') }}"></script>
    <script src="{{ url('front/assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ url('front/assets/js/superfish.min.js') }}"></script>
    <script src="{{ url('front/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('front/assets/js/bootstrap-input-spinner.js') }}"></script>
    <script src="{{ url('front/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ url('front/assets/js/jquery.plugin.min.js') }}"></script>
    <script src="{{ url('front/assets/js/jquery.countdown.min.js') }}"></script>
    
    <!-- Main JS File -->
    <script src="{{ url('front/assets/js/main.js') }}"></script>
    <script src="{{ url('front/assets/js/demos/demo-13.js') }}"></script>
     <!-- Main JS File -->
    <script src="{{ url('front/assets/js/custom.js') }}"></script>
</body>


<!-- molla/index-13.html  22 Nov 2019 09:59:31 GMT -->
</html>