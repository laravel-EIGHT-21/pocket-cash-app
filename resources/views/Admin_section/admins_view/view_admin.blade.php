@extends('admin.admin_master')
@section('content')

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
								<li class="breadcrumb-item active" aria-current="page">Admin Users</li>
							</ol>
						</nav>
					</div>

				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Admin Users Information</h6>


				@can('create-admin-user')
			

				<div class="col" style="float: right;">
										<a href="{{ route('add.admin.user') }}" class="btn btn-primary px-2 radius-30">Add New Admin</a>
									</div>
@endcan

				<hr/>
                <br><br>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
									
										<th>Name</th>
										<th>Email</th>
										<th>Mobile</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								@foreach($allData as $key => $value )
								<tr>

<td> {{ $value->name }}</td>
<td> {{ $value->email }}</td>	
<td> {{ $value->admin_tel }}</td>	


<td>
@if($value->status == 1)
<div class="badge rounded-pill text-success bg-light-info p-2 text-uppercase px-3"><i class='bx bxs-circle align-middle me-1'></i>Active</div>
@elseif($value->status == 0 )
<div class="badge rounded-pill text-danger bg-light-info p-2 text-uppercase px-3"><i class='bx bxs-circle align-middle me-1'></i>In-Active</div>
@endif


</td>	


@can('edit-admin-user')
			
			 
<td>

	

<a href="{{ route('edit.admin.user',$value->id) }}" class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></a>




@if($value->status == 1)
<a href="{{route('admin.user.inactive',$value->id)}}" class="btn btn-danger" id="deactivate" title="Deactivate ">
  <i class="fa fa-arrow-down"></i></a>
@else
<a href="{{route('admin.user.active',$value->id)}}" class="btn btn-success" id="activate" title="Activate ">
  <i class="fa fa-arrow-up"></i></a>
@endif



</td>

@endcan

</tr>
@endforeach
								</tbody>

							</table>
						</div>
					</div>
				</div>
				
			</div>
<br><br>

            
@endsection
