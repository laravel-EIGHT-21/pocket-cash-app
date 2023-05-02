
@extends('schools.school_master')
@section('school')





@php 

$students= App\Models\SchoolStudent::with(['school'])->where('school_id',Auth::id())->where('status',1)->get();


$allData = App\Models\SchoolTransactions::latest()->get();


@endphp
<div class="page-content">
				<div class="row row-cols-md-4 row-cols-xl-4">
                   <div class="col">
					 <div class="card radius-5 border-start border-0 border-3 border-info">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-secondary">Active Accounts</p>
									<h5 class="my-1 text-info">{{ count($students) }}</h5>
									
								</div>
								<div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i class='bx bxs-group'></i>
								</div>
							</div>
						</div>
					 </div>
				   </div>
				   <div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-danger">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Total Revenue</p>
								   <h4 class="my-1 text-danger">$84,245</h4>
								   <p class="mb-0 font-13">+5.4% from last week</p>
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i class='bx bxs-wallet'></i>
							   </div>
						   </div>
					   </div>
					</div>
				  </div>
				  <div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-success">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Bounce Rate</p>
								   <h4 class="my-1 text-success">34.6%</h4>
								   <p class="mb-0 font-13">-4.5% from last week</p>
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='bx bxs-bar-chart-alt-2' ></i>
							   </div>
						   </div>
					   </div>
					</div>
				  </div>
				  <div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-warning">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Total Customers</p>
								   <h4 class="my-1 text-warning">8.4K</h4>
								   <p class="mb-0 font-13">+8.4% from last week</p>
							   </div>
							   <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i class='bx bxs-group'></i>
							   </div>
						   </div>
					   </div>
					</div>
				  </div> 
				</div><!--end row-->


<br>

				<div class="row">

				<div class="card">
    <div class="card-body">

	<div class="d-lg-flex align-items-center mb-4 gap-3">
<h4><b>All Students Deposits</b></h4>
                  </div>

        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th>Students Account No#</th>
                        <th>Amount Deposited (UGX)</th>
                        <th>Deposite Date</th>

                    </tr>
                </thead>
                <tbody>
				@foreach($allData as $key => $value )
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">

                                <div class="ms-2">
                                    <h6 class="mb-0 font-14">{{ $value->student_acct_no}}</h6>
                                </div>
                            </div>
                        </td>
                        
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



			</div>


@endsection