
@extends('schools.school_master')
@section('content')




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" ></script>




<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Register Old Students</li>
							</ol>
						</nav>
					</div>

				</div>
				<!--end breadcrumb-->

				@if (auth()->user()->type == 1)
			  
				<div class="row">
					<div class="col-xl-6 mx-auto">
						<div class="card">
							<div class="card-header px-4 py-6">
								<h5 class="mb-0"><b>Register Old Student </b></h5>
								<div class="ms-auto" style="float: right;"><a href="{{ route('view.students') }}" class="btn btn-success radius-30 mt-2 mt-lg-0">Back</a></div>
							</div>
							<div class="card-body p-4">
								<form  method="post" action="{{ route('old.students.store') }}"  enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                                @csrf



  <div class="col-6">
  <div class="form-group">
  <label>Select Student</label>
  <select name="id"  class="form-control js-example-basic-single" aria-readonly="">
  <option value="" selected="" disabled="">Search For Student</option>
  @foreach($students as $class)
  <option value="{{ $class->id }}">{{ $class->name }}&nbsp; - &nbsp;{{ $class->student_code }}</option>
  @endforeach

  </select>
  </div> 
  </div>
		



                <hr>

<br>

                <div class="col-md-6">
										<label for="name" class="form-label">Enter Student Name</label>
										<input type="text" class="form-control" name="name" id="name" required>

									</div>

								<div class="col-md-6">
										<label for="acct_id" class="form-label">Enter Student Code</label>
										<input type="text" class="form-control" name="acct_id" id="acct_id" required>

									</div>


									<div class="col-md-12">
										<label for="bsValidation1" class="form-label">Student Password</label>
										<input type="password" class="form-control" id="bsValidation1" name="password"  required>
										<div class="invalid-feedback">
											Please Enter Student Password.
										  </div>
									</div>
		



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
				@endif
			</div>






<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();


        //Initialize Select2 Elements
        $('.select2bs4').select2({
      theme: 'bootstrap5'
    })
});

</script>




			@endsection
    