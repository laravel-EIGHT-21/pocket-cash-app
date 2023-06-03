@extends('admin.admin_master')
@section('user')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">New User Group</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-6 mx-auto">
						<div class="card">
							<div class="card-header px-4 py-6">
								<h5 class="mb-0">Add New User Group </h5>
                                <a href="{{ route('roles.view') }}" class="btn btn-success px-3 radius-0" style="float: right;"> Back</a>
							</div>
							<div class="card-body p-4">
								<form  method="post" action="{{ route('roles.store') }}"  class="row g-3 needs-validation" novalidate>
                                @csrf
									<div class="col-md-12">
										<label for="bsValidation1" class="form-label"> User Group</label>
										<input type="text" class="form-control" id="bsValidation1" name="name" >
										<div class="invalid-feedback">
											Please Enter User Group Name
										  </div>
									</div>



									<hr>

<br>



<div class="row"> <!-- start 2nd row  -->
    
<div class="col-9">

<label for="permissions" class="form-label">Assign Permissions</label>

<table class="table table-striped">
    <thead>
        <th scope="col" width="1%"><input type="checkbox" name="all_permission"></th>
        <th scope="col" width="20%">Name</th>
        <th scope="col" width="1%">Guard</th> 
    </thead>

    @foreach($permissions as $permission)
        <tr>
            <td>
                <input type="checkbox" name="permission[{{ $permission->name }}]" value="{{ $permission->name }}" class='permission'>
            </td>
            <td>{{ $permission->name }}</td>
            <td>{{ $permission->guard_name }}</td>
        </tr>
    @endforeach
</table>



</div>


    
    </div> <!-- end 2nd row  -->


    <hr>

<br>

							

@can('role-create')
									<div class="col-md-12">
										<div class="d-md-flex d-grid align-items-center gap-3">
											<button type="submit" class="btn btn-primary px-4">Add New User Group </button>
											
										</div>
                                        @endcan
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->




			</div>



            <br><br>

            
@endsection
