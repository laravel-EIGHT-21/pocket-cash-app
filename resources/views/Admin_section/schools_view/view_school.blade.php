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
								<li class="breadcrumb-item active" aria-current="page"> Schools </li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">All School Information</h6>

									<div class="ms-auto" style="float: right;"><a href="{{ route('add.school') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New School</a></div>
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
										<th>Phone 1</th>
										<th>Phone 2</th>
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
<td> {{ $value->phone1 }}</td>	
<td> {{ $value->phone2 }}</td>
<td> {{ $value->address }}</td>
<td> 

<img src="{{ (!empty($value->school_logo_path))? url('upload/logo/'.$value->school_logo_path):url('upload/no_image.jpg') }}" style="width: 60px; width: 60px;"> 
</td>

			 
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
@endforeach									
								</tbody>

							</table>
						</div>
					</div>
				</div>
				
			</div>
<br><br>

            
@endsection
