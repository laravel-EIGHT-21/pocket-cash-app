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
								<li class="breadcrumb-item active" aria-current="page">Student Account</li>
							</ol>
						</nav>
					</div>

                    <div class="ms-auto" style="float: right;"><a href="{{ route('view.students.transactions') }}" class="btn btn-warning radius-30 mt-2 mt-lg-0"><i class="lni lni-arrow-left-circle"></i>Students Account Details</a></div>
					
				</div>
				<!--end breadcrumb-->
				<br><br>
				<div class="container">
					<div class="main-body">
						<div class="row">
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">

										
										

										<div class="d-flex flex-column align-items-center text-center">
										
                                        

											<div class="mt-3">
                                            @foreach($account as $key => $value )
												<h4><b><span style="color:green;">{{$value->name}}`s</span></b></h4>
												<p class="text-primary mb-1"><b>Account Number : </b><b>{{$value->acct_id}}</b></p>

                                                <p class="text-success mb-1"><b> Actual Amount : ugx </b><b>{{ ($acct_bal) }}</b></p>

                                                <p class="text-danger mb-1"><b> Total Deposites : ugx </b><b>{{($acct) }}</b></p>

												@endforeach

											</div>
										</div>
										<hr class="my-4" />

									</div>
								</div>
							</div>
							<div class="col-lg-8">


							<h6 class="mb-0 text-uppercase"><b>Student Account Details</b></h6>
						<hr/>
						<div class="card">
							<div class="card-body">
								<ul class="nav nav-pills nav-pills-success mb-3" role="tablist">
									
								<li class="nav-item" role="presentation">
										<a class="nav-link active " data-bs-toggle="pill" href="#deposits" role="tab" aria-selected="true">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class='lni lni-money-protection font-18 me-1'></i>
												</div>
												<div class="tab-title">Deposites</div>
											</div>
										</a>
									</li>


									<li class="nav-item" role="presentation">
										<a class="nav-link" data-bs-toggle="pill" href="#withdrawals" role="tab" aria-selected="false">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class='lni lni-money-protection font-18 me-1'></i>
												</div>
												<div class="tab-title">Withdrawals</div>
											</div>
										</a>
									</li>


                                    <li class="nav-item" role="presentation">
										<a class="nav-link" data-bs-toggle="pill" href="#loans" role="tab" aria-selected="false">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class='lni lni-money-protection font-18 me-1'></i>
												</div>
												<div class="tab-title">Loans</div>
											</div>
										</a>
									</li>



								</ul>
								<div class="tab-content">
									
									<div class="tab-pane fade show active" id="deposits" role="tabpanel">

									
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-lg-flex align-items-center mb-4 gap-3">
                                        
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table mb-0">
                                                        <thead class="table-light">
                                                            <tr>
                                        
                                                                <th>Amount Deposited (UGX)</th>
                                                                <th>Deposite Date</th>
                                        
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($student_deposite as $key => $value )
                                                            <tr>
                                                              
                                                                
                                                                <td>{{ $value->amount}}</td>
                                                                <td>{{ $value->transfer_date}}</td>
                                        
                                        
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

										
									</div>


									<div class="tab-pane fade" id="withdrawals" role="tabpanel">


                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-lg-flex align-items-center mb-4 gap-3">
                                        
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table mb-0">
                                                        <thead class="table-light">
                                                            <tr>
                                        
                                                                <th>Amount Withdrawn (UGX)</th>
                                                                <th>Withdrawal Date</th>
                                                                <th>Action</th>
                                        
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($student_withdrawal as $key => $value )
                                                            <tr>
                                                              
                                                                
                                                                <td>{{ $value->withdrawal_amount}}</td>
                                                                <td>{{ $value->withdrawal_date}}</td>
                                                                
                                                                <td>


																<a href="{{ route('withdrawal.update',$value->id) }}" title="Edit Withdrawn Amount"  class="btn btn-sm btn-info "  ><i class="bx bxs-edit"></i></a>


                                                                </td>
                                        
                                        
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>




                                        										
<!-- Edit withdrawal Modal -->
<div class="modal fade" id="withdrawneditmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="myModalLabel">Update Withdrawn Amount</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>


<form method="post" action="{{ route('student.withdrawal.amount.update',$value->id) }}">
 @csrf



<div class="modal-body">

<input type="hidden" name="id" id="id" >

<div class="mb-3">
<label for="withdrawal_amount">Update Withdrawn Amount </label>
<input type="text" name="withdrawal_amount" id="withdrawal_amount" class="form-control" >
</div>


<div class="mb-3">
<label for="withdrawal_date">Withdrawn Date</label>
<input type="text" name="withdrawal_date" id="withdrawal_date" class="form-control" readonly>
</div>



</div>


<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<button type="submit" id="submit"  class="btn btn-success">Update Amount</button>
</div>

</form>
</div>
</div>
</div>


										
									</div>






                                <div class="tab-pane fade" id="loans" role="tabpanel">


                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-lg-flex align-items-center mb-4 gap-3">
                                        
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table mb-0">
                                                        <thead class="table-light">
                                                            <tr>
                                        
                                                                <th>Amount (ugx)</th>
                                                                <th> Date</th>
                                                                <th>Status</th>
                                                                <th>Payment</th>
                                                                <th>Action</th>
                                        
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($student_loans as $key => $value )
                                                            <tr>
                                                              
                                                                
                                                                <td>{{ $value->loan_amount}}</td>
                                                                <td>{{ $value->loan_date}}</td>
                                                                                                                            
                                                            <td>

                                                            @php 
                                                            $loan = $value->loan_amount;

                                                            $payment_loan = $value->loan_payment_amount;

                                                            $zero = 00 ;


                                                            @endphp


                                                            @if($payment_loan == $zero)
                                                            <div class="badge rounded-pill text-danger bg-light-info p-2 text-uppercase px-3"><i class='bx bxs-circle align-middle me-1'></i>Not Paid</div>
                                                            @elseif($payment_loan >= $loan )
                                                            <div class="badge rounded-pill text-success bg-light-info p-2 text-uppercase px-3"><i class='bx bxs-circle align-middle me-1'></i>Paid</div>
                                                            @endif


                                                            </td>

                                                            <td>{{ $value->loan_payment_amount}}</td>

                                                                
                                                                <td>

																<a href="{{ route('loan.update',$value->id) }}" title="Edit Loan Amount"  class="btn btn-sm btn-info "  ><i class="bx bxs-edit"></i></a>

                                                                
																<a href="{{ route('loan.payment.update',$value->id) }}" title="Loan Payment"  class="btn btn-sm btn-warning "  ><i class="lni lni-money-protection"></i></a>


                                                                </td>
                                        
                                        
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>


										
<!-- Edit Modal -->
<div class="modal fade" id="loaneditmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="myModalLabel">Enter Loan Payment Amount</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<form method="post" action="{{ route('loan.payment.update',$value->id) }}">
 @csrf



<div class="modal-body">

<input type="hidden" name="id" id="id" >

<div class="mb-3">
<label for="loan_amount">Loan Amount Given</label>
<input type="text" name="loan_amount" id="loan_amount" class="form-control" readonly>
</div>


<div class="mb-3">
<label for="loan_date">Loan Date</label>
<input type="text" name="loan_date" id="loan_date" class="form-control" readonly>
</div>


<div class="mb-3">
<label for="loan_payment_amount">Loan Payment Amount</label>
<input type="text" name="loan_payment_amount" id="loan_payment_amount" class="form-control" required>
</div>

</div>


<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<button type="submit" id="submit"  class="btn btn-success">Submit Loan Payment</button>
</div>

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
				</div>
                <br><br>
			</div>


            
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>




    
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