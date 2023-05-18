<!doctype html>
<html lang="en">


<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{asset('upload/Akilibit.png')}}" type="image/png"/>


	<script src="https://kit.fontawesome.com/02761bcd61.js" crossorigin="anonymous"></script>
  

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/fontawesome.min.css" integrity="sha512-TPigxKHbPcJHJ7ZGgdi2mjdW9XHsQsnptwE+nOUWkoviYBn0rAAt0A5y3B1WGqIHrKFItdhZRteONANT07IipA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css" integrity="sha512-xX2rYBFJSj86W54Fyv1de80DWBq7zYLn2z0I9bIhQG+rxIF6XVJUpdGnsNHWRa6AvP89vtFupEPDP8eZAtu9qA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">



	<!--plugins-->
	<link href="{{asset('Backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
	<link href="{{asset('Backend/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{asset('Backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{asset('Backend/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet"/>
	<link href="{{asset('Backend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{asset('Backend/assets/css/pace.min.css')}}" rel="stylesheet"/>
	<script src="{{asset('Backend/assets/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{asset('Backend/assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('Backend/assets/css/bootstrap-extended.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="{{asset('Backend/assets/css/app.css')}}" rel="stylesheet">
	<link href="{{asset('Backend/assets/css/icons.css')}}" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="{{asset('Backend/assets/animate.css/animate.css')}}">


<!-- Toastr -->
<link rel='stylesheet' type="text/css" href=" https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css " >

<!-- Sweetalert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	

	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{asset('Backend/assets/css/dark-theme.css')}}"/>
	<link rel="stylesheet" href="{{asset('Backend/assets/css/semi-dark.css')}}"/>
	<link rel="stylesheet" href="{{asset('Backend/assets/css/header-colors.css')}}"/>
	<title>Akilibit - Student-Pocket-Cash-App</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true" >
			<div class="sidebar-header">
				<div>
					<img src="{{asset('upload/Akilibit.png')}}" class="logo-icon" alt="logo icon">
				</div>


			 </div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="{{ route('dashboard') }}">
						<div class="parent-icon"><i class='bx bx-home-alt'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>

				</li>


			



				<li>
					<a href="{{ route('view.students.transactions') }}" >
						<div class="parent-icon"><i class="lni lni-invest-monitor bx-spin"></i>
						</div>
						<div class="menu-title">View Accounts</div>
					</a>
					
				</li>
				


				<li>
					<a href="{{ route('view.students') }}" >
						<div class="parent-icon"><i class="lni lni-network bx-spin"></i>
						</div>
						<div class="menu-title">View Students</div>
					</a>
					
				</li>













			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		


<!--start header -->
@php
		$id = Auth::user()->id;
		$adminData = App\Models\Schools::find($id);
		@endphp

<header>
	<div class="topbar d-flex align-items-center">
		<nav class="navbar navbar-expand gap-3">
			<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
			</div>



			  <div class="top-menu ms-auto">
				<ul class="navbar-nav align-items-center gap-1">
			
				</ul>
			</div>
			<div class="user-box dropdown px-3">
							

<a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					<img src="{{(!empty($adminData->school_logo_path))? url('upload/logo/'.$adminData->school_logo_path):url('upload/no_image.jpg') }}" class="user-img" alt="user avatar">
					<div class="user-info">
						<p class="user-name mb-0">{{$adminData->name}}</p>

					</div>
				</a>
				<ul class="dropdown-menu dropdown-menu-end">
					<li><a class="dropdown-item d-flex align-items-center" href="{{route('school.user.profile.view')}}"><i class="bx bx-user fs-5"></i><span>Profile</span></a>
					</li>
					
				
					<li>
						<div class="dropdown-divider mb-0"></div>
					</li>
					<li><a class="dropdown-item d-flex align-items-center" href="{{route('school.logout') }}"><i class="bx bx-log-out-circle"></i><span>Logout</span></a>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</header>

		<!--end header -->



		<!--start page wrapper -->
		<div class="page-wrapper">


<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Loans Form</li>
							</ol>
						</nav>
					</div>

				</div>
				<!--end breadcrumb-->
			  
				<div class="row">
					<div class="col-xl-6 mx-auto">
						<div class="card">
							<div class="card-header px-4 py-6">
								<h5 class="mb-0">Student Loans</h5>
								<div class="ms-auto" style="float: right;"><a href="{{ route('view.students.transactions') }}" class="btn btn-success radius-30 mt-2 mt-lg-0">Back</a></div>
							</div>
							<div class="card-body p-4">
								<form  method="post" action="{{ route('student.loan.amount.store',$allData->id) }}"  class="row g-3 needs-validation" novalidate>
                                @csrf

								<input type="hidden" name="id" value="{{ $allData->id }}">

                                <div class="col-md-4">
										<label for="bsValidation1" class="form-label"><strong>Name : {{ $allData->name }}</strong></label>
										
									</div>

									<div class="col-md-4">
										<label for="bsValidation1" class="form-label"><b>Account No : {{ $allData->acct_id}}</b></label>
										
									</div>


									<div class="col-md-4">
										<label for="bsValidation1" class="form-label"><b>Account Balance : {{ ($acct_bal)}}</b></label>
										
									</div>


                                <div class="col-md-6">
										<label for="bsValidation1" class="form-label"> Enter Loan Amount</label>
										<input type="text" maxlength="6" name="loan_amount" class="form-control" id="bsValidation1" required>
										<div class="valid-feedback">
											Please!, Enter Loan Amount
										  </div>
									</div>


									<br>
									<hr>

								<div class="col-md-12">
										<div class="d-md-flex d-grid align-items-center gap-3">
											<button type="submit" class="btn btn-primary px-4">Submit</button>
											<button type="reset" class="btn btn-light px-4">Reset</button>
										</div>
									</div>




								</form>
							</div>
						</div>
					</div>
				</div>
			</div>



          
</div>
		<!--end page wrapper -->
		<!--start overlay-->
		 <div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button-->
		  <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2023. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->




	<!-- Bootstrap JS -->
	<script src="{{asset('Backend/assets/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
	<script src="{{asset('Backend/assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('Backend/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('Backend/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('Backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<script src="{{asset('Backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('Backend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
	<script src="{{asset('Backend/assets/plugins/chartjs/js/chart.js')}}"></script>
	<script src="{{asset('Backend/assets/js/index.js')}}"></script>
	<script src="{{asset('Backend/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('Backend/assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>

	<script src="{{asset('Backend/assets/plugins/validation/jquery.validate.min.js')}}"></script>
	<script src="{{asset('Backend/assets/plugins/validation/validation-script.js')}}"></script>

	<script type="text/javascript" src="{{asset('Backend/assets/js/animation.js')}}"></script>

	
<!--SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!--Toastr -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>	

<script src="{{ asset('Backend/assets/js/code.js') }}"></script>




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







	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>

	<!--app JS-->
	<script src="{{asset('Backend/assets/js/app.js')}}"></script>

	<script>
		new PerfectScrollbar(".app-container");
	</script>

<script>
		// Example starter JavaScript for disabling form submissions if there are invalid fields
			(function () {
			  'use strict'
	
			  // Fetch all the forms we want to apply custom Bootstrap validation styles to
			  var forms = document.querySelectorAll('.needs-validation')
	
			  // Loop over them and prevent submission
			  Array.prototype.slice.call(forms)
				.forEach(function (form) {
				  form.addEventListener('submit', function (event) {
					if (!form.checkValidity()) {
					  event.preventDefault()
					  event.stopPropagation()
					}
	
					form.classList.add('was-validated')
				  }, false)
				})
			})()
	</script>


</body> 



</html>