@extends('admin.admin_master')
@section('content')

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
								<li class="breadcrumb-item active" aria-current="page"> Schools </li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">All School Information</h6>

				@can('create-school')
				
									<div class="ms-auto" style="float: right;"><a href="{{ route('add.school') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New School</a></div>


@endcan

				<hr/>

                <br><br>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
									<th>Sch.Code</th> 
										<th>Name</th>
										<th>Email</th>
										<th>Tel 1</th>
										<th>Tel 2</th>
										<th>Address</th>
										<th>Logo</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								@foreach($allData as $key => $value )
								<tr>

								<td> {{ $value->school_id_no }}</td>
<td> {{ $value->name }}</td>
<td> {{ $value->email }}</td>	
<td> {{ $value->school_tel1 }}</td>	
<td> {{ $value->school_tel2 }}</td>
<td> {{ $value->school_address }}</td>
<td> 

<img src="{{ asset($value->school_logo_path)}}" style="width: 20px; height: 30px;"> 
</td>
@if (auth()->user()->type == 0)
	
@can('edit-school')
<td>


<a href="{{ route('edit.school',$value->id) }}" class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></a>




@if($value->status == 1)
<a href="{{route('school.inactive',$value->id)}}" class="btn btn-danger" title="Deactivate ">
  <i class="fa fa-arrow-down"></i></a>
@else
<a href="{{route('school.active',$value->id)}}" class="btn btn-success" title="Activate ">
  <i class="fa fa-arrow-up"></i></a>
@endif



</td>
@endcan
@endif

@endforeach									
								</tbody>

							</table>
						</div>
					</div>
				</div>
				
			</div>
<br><br>

            
@endsection
