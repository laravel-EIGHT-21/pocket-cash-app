@extends('admin.admin_master')
@section('content')


<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Money Transfers </li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Bulk Money Transactions </h6>

				@can('money-transfers')
				<div class="col" style="float: right;">
										<a href="{{ route('bulk.money.transfers') }}" class="btn btn-primary px-2 radius-30">Bulk Transfers</a>
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
									<th width="5%">SL</th> 
										<th>Date</th>
										<th>Total Amount Transfered</th>
										<th>Action</th>
										

									</tr>
								</thead>
								<tbody>
								@foreach($allData as $key => $value )
								<tr>
<td>{{ $key+1 }}</td>

<td> {{ $value->date}}</td>
<td> {{ ($amount_total)}}</td>

@can('money-transfers')			 
<td>

<a href="{{ route('bulk.money.transfers.details',$value->date) }}" class="btn btn-success btn-sm radius-10 px-2" title="View Details" target="_blank"><i class="lni lni-eye"></i></a>


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
