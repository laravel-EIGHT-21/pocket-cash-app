@extends('admin.admin_master')
@section('user')

@section('title')
View Schools  
@endsection 

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add School</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-6 mx-auto">
						<div class="card">
							<div class="card-header px-4 py-6">
								<h5 class="mb-0">Add New School Infor</h5>
                                <a href="{{ route('view.schools') }}" class="btn btn-success px-3 radius-0" style="float: right;"> Back</a>
							</div>
							<div class="card-body p-4">
								<form  method="post" action="{{ route('school.store') }}"  enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                                @csrf
									<div class="col-md-12">
										<label for="bsValidation1" class="form-label">School Name</label>
										<input type="text" class="form-control" id="bsValidation1" name="name"  required>
										<div class="invalid-feedback">
											Please Enter School name.
										  </div>
									</div>


									<div class="col-md-12">
										<label for="bsValidation4" class="form-label">Email</label>
										<input type="email" class="form-control" id="bsValidation4" name="email" required>
										<div class="invalid-feedback">
											Please provide a valid email.
										  </div>
									</div>
                                    <div class="col-md-12">
										<label for="bsValidation3" class="form-label">Telephone 1</label>
										<input type="text" class="form-control" id="bsValidation3" name="phone1" maxlength="10" required>
										<div class="invalid-feedback">
											Please Enter Mobile.
										  </div>
									</div>

                                    <div class="col-md-12">
										<label for="bsValidation3" class="form-label">Telephone 2</label>
										<input type="text" class="form-control" id="bsValidation3" name="phone2" maxlength="10" required>
										<div class="invalid-feedback">
											Please Enter Mobile.
										  </div>
									</div>

                                  
                                    <div class="col-md-12">
										<label for="bsValidation3" class="form-label">Address</label>
										<input type="text" class="form-control" id="bsValidation3" name="address" required>
										<div class="invalid-feedback">
											Please Enter School Address.
										  </div>
									</div>


									<div class="col-md-12">
										<label for="bsValidation3" class="form-label">Password</label>
										<input type="password" class="form-control" id="bsValidation3" name="password" required>
										<div class="invalid-feedback">
											Please Enter Password.
										  </div>
									</div>


                                   
                                    <div class="col-md-12">
										<label for="bsValidation3" class="form-label">School Logo</label>
										<input type="file" class="form-control" id="images" name="school_logo_path">
										<div class="invalid-feedback">
											Please Enter School logo
										  </div>
									</div>


									@can('create-school')
									<div class="col-md-12">
										<div class="d-md-flex d-grid align-items-center gap-3">
											<button type="submit" class="btn btn-primary px-4">Submit</button>
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


            <script type="text/javascript">
	$(document).ready(function(){
		$('#images').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImages').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>

	  


            <br><br>

            
@endsection
