<!DOCTYPE html>
<html lang="en">



<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{asset('upload/funzi_wallet_logo.png')}}" type="image/png" />
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
	<title>Funzi Wallet App</title>
</head>


<body class="">
	<!-- wrapper -->
	<div class="wrapper">
		<div class="authentication-forgot d-flex align-items-center justify-content-center">

		
			<div class="card forgot-box">
				<div class="card-body">

					<div class="p-3">
						<div class="text-center">
							<img src="{{asset('upload/funzi_wallet.png')}}" width="250" alt="" />
						</div>
						<h4 class="mt-5 font-weight-bold">Forgot Password?</h4>
						<p class="text-muted">Enter your registered email to reset the password</p>

						@if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
		

						<form method="POST" action="{{ route('password.email') }}">
							@csrf

						<div class="my-4">
							<label class="form-label">Email </label>
							<input type="email" name="email" :value="old('email')" class="form-control" />
						</div>
						<div class="d-grid gap-2">
							<button type="submit" class="btn btn-primary">Email Password Reset Link</button>
							
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
</body>


</html>