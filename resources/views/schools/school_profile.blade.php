
@extends('schools.school_master')

@section('school')
@section('title')
School Profile
@endsection

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">School Profile</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">School Profile & Password</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
				<br><br>
				<div class="container">
					<div class="main-body">
						<div class="row">
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
                                        @php
                                        $id = Auth::user()->id;
                                        $adminData = App\Models\Schools::find($id);
										$editData = App\Models\Schools::find($id);
                                        @endphp
										
										

										<div class="d-flex flex-column align-items-center text-center">
											<img src="{{(!empty($adminData->school_logo_path))? url('upload/logo/'.$adminData->school_logo_path):url('upload/no_image.jpg') }}"  class="rounded-circle p-1 bg-primary" width="130">
											<div class="mt-4">
												<h4><b>{{$adminData->name}}</b></h4>
												<p class="text-secondary mb-1"><b>{{$adminData->email}}</b></p>
												<p class="text-secondary mb-1"><b>School-Code :{{$adminData->school_id_no}}</b></p>
												<p class="text-secondary mb-1"><b>Telephones:{{$adminData->phone1}} ,{{$adminData->phone2}}</b></p>
												<p class="text-secondary mb-1"><b>Address :{{$adminData->address}}</b></p>
												

											</div>
										</div>
										<hr class="my-4" />

									</div>
								</div>
							</div>
							<div class="col-lg-8">


							<h6 class="mb-0 text-uppercase">School Profile & Password Update</h6>
						<hr/>
						<div class="card">
							<div class="card-body">
								<ul class="nav nav-pills nav-pills-success mb-3" role="tablist">
									
								
									<li class="nav-item" role="presentation">
										<a class="nav-link active" data-bs-toggle="pill" href="#success-pills-contact" role="tab" aria-selected="true">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class='lni lni-lock-alt font-18 me-1'></i>
												</div>
												<div class="tab-title">Change Password</div>
											</div>
										</a>
									</li>
								</ul>
								<div class="tab-content">
									
									<div class="tab-pane fade show active" id="success-pills-contact" role="tabpanel">

									

											<div class="card">

											<form method="POST" action="{{route('school.password.update') }}" enctype="multipart/form-data">
       																		 @csrf

											<div class="card-body">

											<div class="mb-3 mt-4">
									<label class="form-label">Current Password</label>
									<input type="password" name="oldpassword" id="current_password" class="form-control" />
								</div>

											<div class="mt-4">
									<label class="form-label">New Password</label>
									<input type="password" name="password" id="password" class="form-control" />
								</div>


								<div class="mb-4">
									<label class="form-label">Confirm Password</label>
									<input type="password" name="password_confirmation" id="password_confirmation" class="form-control"  />
								</div>




								<div class="d-grid gap-2">
									<button type="submit" class="btn btn-primary">Change Password</button> 
								</div>
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


<script type="text/javascript">

	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src', e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});

</script>

@endsection