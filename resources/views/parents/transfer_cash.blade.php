<!doctype html>
<html lang="en">


<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{asset('upload/Akilibit.png')}}" type="image/png" />
	<!--plugins-->
	<link href="{{asset('Backend/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{asset('Backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{asset('Backend/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{asset('Backend/assets/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{asset('Backend/assets/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{asset('Backend/assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('Backend/assets/css/bootstrap-extended.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="{{asset('Backend/assets/css/app.css')}}" rel="stylesheet">
	<link href="{{asset('Backend/assets/css/icons.css')}}" rel="stylesheet">

<!-- Toastr -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


	<title>Akilibit-Pocket-Cash App</title>
</head>

<body class="">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-cover"> 
			<div class="">
				<div class="row g-0">

					<div class="col-8 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex">

                        <div class="card shadow-none bg-transparent shadow-none rounded-0 mb-0">
							<div class="card-body">
                                 <img src="{{asset('upload/login-cover.png')}}" width="700" alt=""/>
							</div>
						</div>
						
					</div>

					<div class="col-4 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center">
						<div class="card rounded-0 m-3 shadow-none bg-transparent mb-0">
							<div class="card-body p-sm-5">
								<div class="">
									<div class="mb-3 text-center">
                                    <img src="{{asset('upload/Akilibit.png')}}" width="200" alt="" />
									</div>
									<div class="text-center mb-4">
                                    <h5 class=""><b>Akilibit-Pocket-Cash App</b></h5>
										<p class="mb-0">Please Enter Student Account Number To View</p>
									</div>
									<div class="form-body">
										<form class="row g-3"  action="/transfer/pockek/cash" enctype="multipart/form-data" >
									{{csrf_field()}}

                                        <div class="my-4">
										<label class="form-label">Student Account Number</label>
										<input type="text" class="form-control" name="acct_id" placeholder="example = 02000000" />
									</div>



									<div class="my-4">
										<label class="form-label">Enter Mobile  Number</label>
										<input type="text" class="form-control" name="mobile"  />
									</div>


									<div class="my-4">
										<label class="form-label">Enter Transfer Amount</label>
										<input type="text" class="form-control" name="amount"  />
									</div>


											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary">Submit Transfer</button>
												</div>
											</div>
											<div class="col-12">
												<div class="text-center ">
													
													</p>
												</div>
											</div>
										</form>
									</div>
									<div class="login-separater text-center mb-5"> 
										<hr>
									</div>


								</div>
							</div>
						</div>
					</div>

				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="{{asset('Backend/assets/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
	<script src="{{asset('Backend/assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('Backend/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('Backend/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('Backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="{{asset('Backend/assets/js/app.js')}}"></script>

<!--Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


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