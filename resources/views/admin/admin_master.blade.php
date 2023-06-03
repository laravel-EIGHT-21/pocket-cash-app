<!doctype html>
<html lang="en">


<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{asset('upload/funzi_wallet_logo.png')}}" type="image/png"/>


	<script src="https://kit.fontawesome.com/02761bcd61.js" crossorigin="anonymous"></script>
  

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/fontawesome.min.css" integrity="sha512-TPigxKHbPcJHJ7ZGgdi2mjdW9XHsQsnptwE+nOUWkoviYBn0rAAt0A5y3B1WGqIHrKFItdhZRteONANT07IipA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css" integrity="sha512-xX2rYBFJSj86W54Fyv1de80DWBq7zYLn2z0I9bIhQG+rxIF6XVJUpdGnsNHWRa6AvP89vtFupEPDP8eZAtu9qA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">


   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
   

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
	<title>Funzi Wallet App</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true" >
			<div class="sidebar-header">
				<div>
					<img src="{{asset('upload/funzi_wallet.png')}}" width="400" class="logo-icon" alt="logo icon">
				</div>


			 </div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="{{ url('dashboard') }}">
						<div class="parent-icon"><i class='bx bx-home-alt'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>

				</li>

				@can('view-admin-users')
				<li>
					<a href="{{ route('view.admin.user') }}" >
						<div class="parent-icon"><i class="lni lni-users bx-spin"></i>
						</div>
						<div class="menu-title">View Admin Users</div>
					</a>
					
				</li>
				@endcan
				
				
				@can('view-schools')
				<li>
					<a href="{{ route('view.schools') }}" >
						<div class="parent-icon"><i class="fadeIn animated bx bx-home-smile bx-spin"></i>
						</div>
						<div class="menu-title">View Schools</div>
					</a>
					
				</li>
				@endcan


				<li>
					<a href="{{ route('view.all.students') }}" >
						<div class="parent-icon"><i class="lni lni-network bx-spin"></i>
						</div>
						<div class="menu-title">View Students</div>
					</a>
					
				</li>


				<li>
					<a href="{{ route('view.all.transfers') }}" >
						<div class="parent-icon"><i class="lni lni-invest-monitor bx-spin"></i>
						</div>
						<div class="menu-title">View All Deposits</div>
					</a>
					
				</li>

				@can('money-transfers')
				<li>
					<a href="{{ route('money.transfers') }}" >
						<div class="parent-icon"><i class="lni lni-invest-monitor bx-spin"></i>
						</div>
						<div class="menu-title">Money Transfers</div>
					</a>
					
				</li>

				@endcan



				@can('role-list')
				
				<li>
					<a href="{{ route('roles.view') }}" >
						<div class="parent-icon"><i class="lni lni-users bx-spin"></i>
						</div>
						<div class="menu-title">View User Groups</div>
					</a>
					
				</li>
@endcan


				@can('permit-list')
				<li>
					<a href="{{ route('permissions.view') }}" >
						<div class="parent-icon"><i class="lni lni-lock bx-spin"></i>
						</div>
						<div class="menu-title">View Permissions</div>
					</a>
					
				</li>
				@endcan















			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
				
@include('admin.header')

		<!--start page wrapper -->
		<div class="page-wrapper">

			
@yield('user')

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


	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js" integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<!-- Bootstrap JS -->
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" ></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" ></script>


		<!--plugins-->

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
	<script src="{{ asset('Backend/assets/js/code.js') }}"></script>
	
	<script src="{{asset('Backend/assets/plugins/datatable/js/datatable-api.init.js')}}"></script>

	

	
<!--SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!--Toastr -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>	


	<script type="text/javascript" src="{{asset('Backend/assets/js/animation.js')}}"></script>

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