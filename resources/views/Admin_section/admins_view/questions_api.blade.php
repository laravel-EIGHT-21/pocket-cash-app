@extends('admin.admin_master')
@section('admin')

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
								<li class="breadcrumb-item active" aria-current="page">Questions Api</li>
							</ol>
						</nav>
					</div>

				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Questions Api Information</h6>

				<hr/>
                <br><br>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
									<th width="5%">SL</th> 
										<th>Questions</th>

                                        <th>Answer A</th>
                                        <th>Answer B</th>
                                        <th>Answer C</th>
                                        <th>Answer D</th>
										

									</tr>
								</thead>
								<tbody>
								@foreach($allData as $key => $value )
								<tr>
<td>{{ $key+1 }}</td>

<td> {{ $value->question }}</td>

<td> {{ $value->answer_a }}</td>

<td> {{ $value->answer_b }}</td>
<td> {{ $value->answer_c }}</td>
<td> {{ $value->answer_d }}</td>



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
