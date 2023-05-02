
@extends('schools.school_master')

@section('school')
@section('title')
Student Account
@endsection

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
                                                              
                                                                
                                                                <td>{{ $value->acct_amount}}</td>
                                                                <td>{{ $value->deposite_date}}</td>
                                        
                                        
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




			
<script type="text/javascript">


$(document).ready(function(){
 
$('.editbtn').on('click',function(){

    $('#loaneditmodal').modal('show');

    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function(){ return $(this).text(); }).get();

    console.log(data);

    $('#id').val(data[0]);
    $('#loan_amount').val(data[1]);
    $('#loan_date').val(data[2]);
    $('#loan_payment_amount').val(data[3]);

});



});
 
</script>




			
<script type="text/javascript">


$(document).ready(function(){
 
$('.updatebtn').on('click',function(){

    $('#withdrawneditmodal').modal('show');

    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function(){ return $(this).text(); }).get();

    console.log(data);

    $('#id').val(data[0]);
    $('#withdrawal_amount').val(data[1]);
    $('#withdrawal_date').val(data[2]);
    
});



});
 
</script>



@endsection