<
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
								<li class="breadcrumb-item active" aria-current="page">Update Student</li>
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
								<h5 class="mb-0">Update Student Account</h5>
								<div class="ms-auto" style="float: right;"><a href="{{ route('view.students') }}" class="btn btn-success radius-30 mt-2 mt-lg-0">Back</a></div>
							</div>
							<div class="card-body p-4">
								<form  method="post" action="{{ route('students.update',$editData->id) }}" class="row g-3 needs-validation" novalidate>
                                @csrf
									<div class="col-md-12">
										<label for="bsValidation1" class="form-label">Student Name</label>
										<input type="text" class="form-control" id="bsValidation1" name="name"  value="{{$editData->name}}">
										<div class="invalid-feedback">
											Please Enter Student name.
										  </div>
									</div>



									<div class="col-md-12">
										<div class="d-md-flex d-grid align-items-center gap-3">
											<button type="submit" class="btn btn-primary px-4">Update</button>
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

			

			@endsection
    