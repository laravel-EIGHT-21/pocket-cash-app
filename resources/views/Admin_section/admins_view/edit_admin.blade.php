@extends('admin.admin_master')
@section('user')

@section('title')
View Admins 
@endsection 

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Update Admin</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-6 mx-auto">
						<div class="card">
							<div class="card-header px-4 py-6">
								<h5 class="mb-0">Update Admin Info</h5>
                                <a href="{{ route('view.admin.user') }}" class="btn btn-success px-3 radius-0" style="float: right;"> Back</a>
							</div>
							<div class="card-body p-4">
								<form  method="post" action="{{ route('admin.user.update',$editData->id) }}"  class="row g-3 needs-validation" novalidate>
                                @csrf
									<div class="col-md-12">
										<label for="bsValidation1" class="form-label"> Name</label>
										<input type="text" class="form-control" id="bsValidation1" name="name" value="{{ $editData->name }}">
										<div class="invalid-feedback">
											Please Enter Admin name.
										  </div>
									</div>


									<div class="col-md-12">
										<label for="bsValidation4" class="form-label">Email</label>
										<input type="email" class="form-control" id="bsValidation4" name="email" value="{{ $editData->email }}">
										<div class="invalid-feedback">
											Please provide a valid email.
										  </div>
									</div>
									<div class="col-md-12">
										<label for="bsValidation5" class="form-label">Password</label>
										<input type="password" class="form-control" id="bsValidation5" name="password" id="password" >
										<div class="invalid-feedback">
											Please choose a password.
										</div>
						 			</div>

                                    <div class="col-md-12">
										<label for="bsValidation3" class="form-label">Phone</label>
										<input type="text" class="form-control" id="bsValidation3" name="mobile" value="{{ $editData->mobile }}">
										<div class="invalid-feedback">
											Please Enter Mobile.
										  </div>
									</div>


									<br>

<hr>
@foreach($editRole as $update)

<div class="mb-4">
<label for="single-select-field" class="form-label">Assign User Role</label>
<select name="roles[]"  class="form-select" id="single-select-field" data-placeholder="Choose User Role">
<option value="" selected="" disabled="">Select User Group</option>
@foreach ($roles as $role)
<option value="{{ $role->id }}" {{ ($update->role_id == $role->id)? "selected": ""  }}>{{ $role->name }}</option>
@endforeach

</select>
</div>
@endforeach

<br>

<hr>

@can('edit-admin-user')
									<div class="col-md-12">
										<div class="d-md-flex d-grid align-items-center gap-3">
											<button type="submit" class="btn btn-primary px-4">Update </button>
											<button type="reset" class="btn btn-light px-4">Reset</button>
										</div>
									</div>
@endcan

								</form>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->




			</div>



            <br><br>

            
@endsection
