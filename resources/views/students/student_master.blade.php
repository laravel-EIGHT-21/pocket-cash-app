<!DOCTYPE html>
<html lang="en">


<head>
<title>Funzi Wallet App </title>


<!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="funzi wallet">
<meta name="keywords" content="Funzi Wallet">
<meta name="author" content="#">

<link rel="icon" href="{{asset('upload/funzi_wallet_logo.png')}}" type="image/x-icon">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="{{asset('Backend/files/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">


<link href="{{asset('Backend/files/assets/pages/jquery.filer/css/jquery.filer.css')}}" type="text/css" rel="stylesheet" />
<link href="{{asset('Backend/files/assets/pages/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css')}}" type="text/css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="{{asset('Backend/files/bower_components/font-awesome/css/font-awesome.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('Backend/files/assets/pages/advance-elements/css/bootstrap-datetimepicker.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('Backend/files/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}" />

<link rel="stylesheet" type="text/css" href="{{asset('Backend/files/bower_components/datedropper/datedropper.min.css')}}" />

<link rel="stylesheet" type="text/css" href="{{asset('Backend/files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('Backend/files/assets/icon/themify-icons/themify-icons.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('Backend/files/assets/icon/icofont/css/icofont.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('backend/files/assets/icon/feather/css/feather.css')}}">


<link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.html">
<link rel="stylesheet" type="text/css" href="{{asset('Backend/files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('Backend/files/assets/pages/data-table/css/buttons.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('Backend/files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}">


<!-- Toastr -->
<link rel='stylesheet' type="text/css" href=" https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css " >

<!-- Sweetalert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link rel="stylesheet" type="text/css" href="{{asset('Backend/files/bower_components/owl.carousel/dist/assets/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('Backend/files/bower_components/owl.carousel/dist/assets/owl.theme.default.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('Backend/files/assets/pages/hover-effect/normalize.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('Backend/files/assets/pages/hover-effect/set2.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('backend/files/assets/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('backend/files/assets/css/jquery.mCustomScrollbar.css')}}">
</head>
<body>

<div class="theme-loader">
<div class="ball-scale">
<div class="contain">
<div class="ring">
<div class="frame"></div>
</div>

</div>
</div>
</div>



<div id="pcoded" class="pcoded">
<div class="pcoded-overlay-box"></div>
<div class="pcoded-container navbar-wrapper">
<nav class="navbar header-navbar pcoded-header">
<div class="navbar-wrapper">
<div class="navbar-logo">
<a class="mobile-menu" id="mobile-collapse" href="#!">
<i class="feather icon-menu"></i>
</a>
<a href="{{ route('student.dashboard') }}">
<img class="img-fluid" src="{{asset('upload/funzi_wallet.png')}}" alt="Theme-Logo" width="190"/>
</a>
<a class="mobile-options">
<i class="feather icon-more-horizontal"></i>
</a>
</div>
<div class="navbar-container">
<ul class="nav-left">

<li>
<a href="#!" onclick="javascript:toggleFullScreen()">
<i class="feather icon-maximize full-screen"></i>
</a>
</li>
</ul>
<ul class="nav-right">

@php
		$id = Auth::user()->id;
		$student_id = Auth::user()->uuid;
		$adminData = App\Models\User::find($id);
		@endphp

<li class="user-profile header-notification">
<div class="dropdown-primary dropdown">
<div class="dropdown-toggle" data-toggle="dropdown">
<img src="{{(!empty($adminData->student_profile_path))? url('upload/student_images/'.$adminData->student_profile_path):url('upload/user.png') }}" class="img-radius" alt=" ">
<span>{{$adminData->name}}</span>
<i class="feather icon-chevron-down"></i>
</div>
<ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">

<li>
<a href="{{route('student.user.profile.view')}}">
<i class="feather icon-user"></i> Profile
</a>
</li>


<li>
<a href="{{route('student.logout')}}">
<i class="feather icon-log-out"></i> Logout
</a>
</li>
</ul>
</div>
</li>
</ul>
</div>
</div>
</nav>



<div class="pcoded-main-container">
<div class="pcoded-wrapper">
<nav class="pcoded-navbar">
<div class="pcoded-inner-navbar main-menu">
<div class="pcoded-navigatio-lavel">Navigation</div>
<ul class="pcoded-item pcoded-left-item">
<li class="active pcoded-trigger">
<a href="{{route('student.dashboard')}}">
<span class="pcoded-micon"><i class="feather icon-home"></i></span>
<span>Dashboard</span>
</a>

</li>
@if (auth()->user()->type == 2)
<li class="active pcoded-trigger">
<a href="{{ route('view.files') }}">
<span class="pcoded-micon"><i class="fa fa-file"></i></span>
<span class="pcoded-mtext">All Files/Document</span>
</a>

</li>

<li class="active pcoded-trigger">
<a href="{{ route('view.account',$student_id)}}">
<span class="pcoded-micon"><i class="fa fa-money"></i></span>
<span class="pcoded-mtext">Account Transactions</span>
</a>

</li>
@endif

</ul>



</div>
</nav>
@yield('content')
</div>
</div>
</div>
</div>


<!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="./files/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="./files/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="./files/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="./files/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="./files/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->


<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script type="text/javascript" src="{{asset('Backend/files/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Backend/files/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Backend/files/bower_components/popper.js/dist/umd/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Backend/files/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<script type="text/javascript" src="{{asset('Backend/files/bower_components/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

<script type="text/javascript" src="{{asset('Backend/files/bower_components/modernizr/modernizr.js')}}"></script>

<script type="text/javascript" src="{{asset('Backend/files/bower_components/chart.js/dist/Chart.js')}}"></script>

<script src="{{asset('Backend/files/assets/pages/widget/amchart/amcharts.js')}}"></script>
<script src="{{asset('Backend/files/assets/pages/widget/amchart/serial.js')}}"></script>
<script src="{{asset('Backend/files/assets/pages/widget/amchart/light.js')}}"></script>
<script src="{{asset('Backend/files/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Backend/files/assets/js/SmoothScroll.js')}}"></script>
<script src="{{asset('Backend/files/assets/js/pcoded.min.js')}}"></script>

<script src="{{asset('Backend/files/assets/js/vartical-layout.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Backend/files/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

<script type="text/javascript" src="{{asset('Backend/files/bower_components/datedropper/js/datedropper.min.html')}}"></script>


<script src="{{asset('Backend/files/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('Backend/files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('Backend/files/assets/pages/data-table/js/jszip.min.js')}}"></script>
<script src="{{asset('Backend/files/assets/pages/data-table/js/pdfmake.min.js')}}"></script>
<script src="{{asset('Backend/files/assets/pages/data-table/js/vfs_fonts.js')}}"></script>
<script src="{{asset('Backend/files/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('Backend/files/assets/pages/data-table/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('Backend/files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('Backend/files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

<script src="{{asset('Backend/files/assets/pages/ckeditor/ckeditor.js')}}"></script>

<script src="{{asset('Backend/files/assets/pages/chart/echarts/js/echarts-all.js')}}" type="text/javascript"></script>

<script type="text/javascript" src="{{asset('Backend/files/assets/pages/form-validation/form-validation.js')}}"></script>


<script type="text/javascript" src="{{asset('Backend/files/bower_components/owl.carousel/dist/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Backend/files/assets/js/owl-custom.js')}}"></script>

<script type="text/javascript" src="{{asset('Backend/files/bower_components/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

<script type="text/javascript" src="{{asset('Backend/files/bower_components/modernizr/modernizr.js')}}"></script>
<script type="text/javascript" src="{{asset('Backend/files/bower_components/modernizr/feature-detects/css-scrollbars.js')}}"></script>


<script type="text/javascript" src="{{asset('Backend/files/bower_components/jquery-bar-rating/dist/jquery.barrating.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Backend/files/assets/pages/rating/rating.js')}}"></script>

<script type="text/javascript" src="{{asset('Backend/files/bower_components/slick-carousel/slick/slick.min.js')}}"></script>

<script type="text/javascript" src="{{asset('Backend/files/assets/pages/product-detail/product-detail.js')}}"></script>

<script src="{{asset('Backend/files/assets/pages/jquery.filer/js/jquery.filer.min.js')}}"></script>
<script src="{{asset('Backend/files/assets/pages/filer/custom-filer.js')}}" type="text/javascript"></script>
<script src="{{asset('Backend/files/assets/pages/filer/jquery.fileuploads.init.js')}}" type="text/javascript"></script>


<script type="text/javascript" src="{{asset('Backend/files/bower_components/i18next/i18next.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Backend/files/bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Backend/files/bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Backend/files/bower_components/jquery-i18next/jquery-i18next.min.js')}}"></script>
<script src="{{asset('Backend/files/assets/pages/user-profile.js')}}"></script>




<!--SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!--HandleBarsjs-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js"></script>

	<!--Toastr -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>	



<script src="{{asset('Backend/files/assets/pages/data-table/js/data-table-custom.js')}}"></script>
<script src="{{asset('Backend/files/assets/js/vartical-layout.min.js')}}"></script>
<script src="{{asset('Backend/files/assets/js/code.js')}}"></script>
<script type="text/javascript" src="{{asset('Backend/files/assets/pages/dashboard/custom-dashboard.js')}}"></script>
<script type="text/javascript" src="{{asset('Backend/files/assets/js/script.min.js')}}"></script>







<script>

@if(Session::has('message'))

var type = "{{ Session::get('alert-type','info')}}"
switch(type){
  
  case 'info':
    toastr.info("{{Session::get('message')}}");
    break;

  case 'success':
  toastr.success("{{Session::get('message')}}");
  break;

  case 'warning':
  toastr.warning("{{Session::get('message')}}");
  break; 

  case 'error':
  toastr.error("{{Session::get('message')}}");
  break;

}

@endif

</script>	





</body>


</html>