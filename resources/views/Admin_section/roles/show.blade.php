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
								<li class="breadcrumb-item active" aria-current="page">User Group Details</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-6 mx-auto">
						<div class="card">
							<div class="card-header px-4 py-6">
								<h5 class="mb-0"><b>User Group : {{ ucfirst($role->name) }}</b> </h5>
                                <a href="{{ route('roles.view') }}" class="btn btn-success px-3 radius-0" style="float: right;"> Back</a>
							</div>
							<div class="card-body p-4">





<br>



<div class="row"> <!-- start 2nd row  -->
    
<div class="col-9">

<label for="permissions" class="form-label">Assigned Permissions</label>

<table class="table table-striped">
    <thead>
        <th scope="col" width="20%">Name</th>
        <th scope="col" width="1%">Guard</th> 
    </thead>

	@foreach($rolePermissions as $permission)
        <tr>

            <td>{{ $permission->name }}</td>
            <td>{{ $permission->guard_name }}</td>
        </tr>
    @endforeach
</table>



</div>


    
    </div> <!-- end 2nd row  -->


    <hr>

<br>

							



							</div>
						</div>
					</div>
				</div>
				<!--end row-->




			</div>



            <br><br>

            
@endsection
