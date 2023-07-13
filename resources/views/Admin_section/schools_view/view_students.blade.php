@extends('admin.admin_master')
@section('content')

@section('title')
View Students 
@endsection

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page"> Students </li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">All Students Information</h6>
				<hr/>
                <br><br>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>

									<th width="5%">SL</th> 
									
										<th>School</th>
										<th>Student</th>
										<th>Student Code</th>
										<th>Status</th>
										
									</tr>
								</thead>
								<tbody>
								@foreach($allData as $key => $value )
								<tr>
<td>{{ $key+1 }}</td>

@php 


$school = App\Models\User::where('school_id_no',$value->school_std_code)->where('type',1)->get();



@endphp


<td> 
@foreach($school as $sch)

	{{ ($sch->name)}}

@endforeach


</td>


<td> {{ $value->name }}</td>	
<td> {{ $value->student_code }}</td>	


<td>
@if($value->status == 1)
<div class="badge rounded-pill text-success bg-light-info p-2 text-uppercase px-3"><i class='bx bxs-circle align-middle me-1'></i>Active</div>
@elseif($value->status == 0 )
<div class="badge rounded-pill text-danger bg-light-info p-2 text-uppercase px-3"><i class='bx bxs-circle align-middle me-1'></i>In-Active</div>
@endif


</td>	

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
