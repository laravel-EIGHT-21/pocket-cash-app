
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
								<form  method="post" action="{{ route('student.loan.amount.store',$allData->uuid) }}"  class="row g-3 needs-validation" novalidate>
                                @csrf

								<input type="hidden" name="uuid" value="{{ $allData->uuid }}">

                                <div class="col-md-4">
										<label for="bsValidation1" class="form-label"><strong>Name : {{ $allData->name }}</strong></label>
										
									</div>

									<div class="col-md-4">
										<label for="bsValidation1" class="form-label"><b>Account No : {{ $allData->student_code}}</b></label>
										
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



			@endsection