@extends('admin.admin_master')
@section('user')

@section('title')
View Transactions
@endsection

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Money Transfers (Deposits)</li>
							</ol>
						</nav>
					</div>

				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase"><b>All Deposits Transactions Information</b></h6>

				<hr/>
                <br><br>
				<div class="card">
				<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
									
									<th width=5%>SL</th> 

									<th>Student Account </th>
                                        <th>Deposits (UGX)</th>
                                    
                                        <th>Parent Tel.</th>

                                        <th>Transfer Date</th>
										

									</tr>
								</thead>
								<tbody>
								@foreach($allData as $key => $value )
								<tr>
<td>{{ $key+1 }}</td>

<td> {{ $value->student_acct_no}}</td>
<td> {{ $value->amount}}</td>

<td> {{ $value->payer_number}}</td>
<td> {{ $value->transfer_date}}</td>




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
