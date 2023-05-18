
@extends('admin.admin_master')

@section('user')
@section('title')
User Profile
@endsection

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">User Profile</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">User Profile & Password</li>
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
                                        $adminData = App\Models\User::find($id);
										$editData = App\Models\User::find($id);
                                        @endphp
										
										

										<div class="d-flex flex-column align-items-center text-center">
											<img src="{{ (!empty($adminData->profile_photo_path))? url('upload/admin_images/'.$adminData->profile_photo_path):url('upload/no_image.jpg') }}"  class="rounded-circle p-1 bg-primary" width="110">
											<div class="mt-3">
												<h4><b>{{$adminData->name}}</b></h4>
												<p class="text-secondary mb-1"><b>{{$adminData->email}}</b></p>


												<p class="text-secondary mb-1"><b>Tel. {{$adminData->mobile}}</b></p>
												

											</div>
										</div>
										<hr class="my-4" />

									</div>
								</div>
							</div>
							<div class="col-lg-8">


							<h6 class="mb-0 text-uppercase">User Profile & Password Update</h6>
						<hr/>
						<div class="card">
							<div class="card-body">
								<ul class="nav nav-pills nav-pills-success mb-3" role="tablist">
									
								<li class="nav-item" role="presentation">
										<a class="nav-link active" data-bs-toggle="pill" href="#success-pills-profile" role="tab" aria-selected="true">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
												</div>
												<div class="tab-title">Update Profile</div>
											</div>
										</a>
									</li>
									<li class="nav-item" role="presentation">
										<a class="nav-link" data-bs-toggle="pill" href="#success-pills-contact" role="tab" aria-selected="false">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class='lni lni-lock-alt font-18 me-1'></i>
												</div>
												<div class="tab-title">Change Password</div>
											</div>
										</a>
									</li>
								</ul>
								<div class="tab-content">
									
									<div class="tab-pane fade show active" id="success-pills-profile" role="tabpanel">

									

									<div class="card">
									<form method="post" action="{{route('admin.profile.update') }}" enctype="multipart/form-data">
                                       @csrf

									<div class="card-body">
									<div class="col-md-12">
										<label for="bsValidation1" class="form-label"> Name</label>
										<input type="text" name="name" class="form-control" id="bsValidation1" value="{{$editData->name}}" required>
										<div class="valid-feedback">
											Looks good!
										  </div>
									</div>

									<div class="col-md-12">
										<label for="bsValidation4" class="form-label">Email</label>
										<input type="email" name="email" value="{{$editData->email}}" class="form-control" id="bsValidation4" required>
										<div class="invalid-feedback">
											Please provide a valid email.
										  </div>
									</div>
									<br>
									<hr>

									<div class="col-mb-12">
									<label class="form-label">Update Profile Photo</label>
									<input class="form-control form-control-sm" name="profile_photo_path" id="image" value="{{$editData->profile_photo_path}}" type="file">
								</div>
								<br><br>

								<div class="col-md-12">
										<div class="d-md-flex d-grid align-items-center gap-3">
											<button type="submit" class="btn btn-primary px-4">Submit</button>
											<button type="reset" class="btn btn-light px-4">Reset</button>
										</div>
									</div>

									</div>
									</form>
									</div>

										
									</div>
									<div class="tab-pane fade" id="success-pills-contact" role="tabpanel">

									

											<div class="card">

											<form method="POST" action="{{route('admin.password.update') }}" enctype="multipart/form-data">
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