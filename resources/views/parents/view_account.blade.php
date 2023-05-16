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
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{asset('Backend/assets/css/dark-theme.css')}}" />
	<link rel="stylesheet" href="{{asset('Backend/assets/css/semi-dark.css')}}" />
	<link rel="stylesheet" href="{{asset('Backend/assets/css/header-colors.css')}}" />
	<title>Akilibit-Pocket-Cash App</title>
</head>

<body>
	
		

			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-6">

                <h6 class="mb-0 text-uppercase"><b><u>Student`s Account Details</u></b></h6>

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
										
                                        

											<div class="mt-4">
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
                                                                <th>Transfer Date</th>
                                        
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
                                                                
                                        
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($student_withdrawal as $key => $value )
                                                            <tr>
                                                              
                                                                
                                                                <td>{{ $value->withdrawal_amount}}</td>
                                                                <td>{{ $value->withdrawal_date}}</td>
                                                                

                                        
                                        
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
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

                                                                
                                                               
                                        
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
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


		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2023. All right reserved.</p>
		</footer>




	
	<!-- Bootstrap JS -->
	<script src="{{asset('Backend/assets/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
	<script src="{{asset('Backend/assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('Backend/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('Backend/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('Backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<!--app JS-->
	<script src="{{asset('Backend/assets/js/app.js')}}"></script>
</body>


</html>