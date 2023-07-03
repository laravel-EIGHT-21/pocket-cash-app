
@extends('schools.school_master')
@section('content')

            
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
												<p class="text-primary mb-1"><b>Account Number : </b><b>{{$value->student_code}}</b></p>

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
                                                    <table class="table mb-0 table-striped table-bordered display text-nowrap"  id="example" >
                                                        <thead class="table-light">
                                                            <tr>
                                        

                                                                <th>Withdrawal Date</th>
                                                                <th>Amount Withdrawn (UGX)</th>
                                                                <th>Action</th>
                                        
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($student_withdrawal as $key => $value )
                                                            <tr>
                                                              
                                                                

                                                                <td>{{ $value->withdrawal_date}}</td>
                                                                <td>{{ $value->withdrawal_amount}}</td>
                                                                
                                                                <td>


																<a href="{{ route('withdrawal.update',$value->id) }}" title="Edit Withdrawn Amount"  class="btn btn-sm btn-info "  ><i class="bx bxs-edit"></i></a>


                                                                </td>
                                        
                                        
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                          <!-- start row -->
                          <tr>
                            <th colspan="1" style="text-align: right">
                              Total (ugx):
                            </th>
                            <th></th>
                          </tr>
                          <!-- end row -->

                        </tfoot>
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js" ></script>

<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 1 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 1, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
          

            // Total filtered rows on the selected column (code part added)
            var sumCol4Filtered = display.map(el => data[el][1]).reduce((a, b) => intVal(a) + intVal(b), 0 );
          
            // Update footer
            $( api.column( 1 ).footer() ).html(
                ''+pageTotal +' ( '+ total +' total) '
            );
        }
    } );
} );
</script>




@endsection