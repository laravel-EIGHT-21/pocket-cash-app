
@extends('schools.school_master')
@section('content')


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
				<h6 class="mb-0 text-uppercase">All Students Account Information</h6>
                <div class="ms-auto" style="float: right;"><a href="{{ route('add.students') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New Student</a></div>
				<hr/>
                <br><br>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>

									<th width="2%">SL</th> 
										<th>Student</th>
										<th>Student Code</th>
                                        <th>Status</th>
										<th>Actual Amount</th>
                                        <th width="18%">Action</th>
										
									</tr>
								</thead>
								<tbody>
								@foreach($allData as $key => $value )
								<tr>
<td>{{ $key+1 }}</td>

<td> {{ $value->name }}</td>	
<td> {{ $value->student_code }}</td>



<td>
@if($value->status == 1)
<div class="badge rounded-pill text-success bg-light-info p-2 text-uppercase px-3"><i class='bx bxs-circle align-middle me-1'></i>Active</div>
@elseif($value->status == 0 )
<div class="badge rounded-pill text-danger bg-light-info p-2 text-uppercase px-3"><i class='bx bxs-circle align-middle me-1'></i>In-Active</div>
@endif


</td>	


@php 

$account = App\Models\User::where('type',2)->where('uuid',$value->uuid)->where('status',1)->get();

    $acct = App\Models\apiTransfers::with(['student'])->select('uuid')->groupBY('uuid')->where('uuid',$value->uuid)->sum('amount');


    $withdrawal = App\Models\withdrawal::with(['student'])->select('uuid')->groupBY('uuid')->where('uuid',$value->uuid)->sum('withdrawal_amount');

    
    $loans = App\Models\loan::with(['student'])->select('uuid')->groupBY('uuid')->where('uuid',$value->uuid)->sum('loan_amount');


    $acct_bal = ((float)$acct-(float)$withdrawal)+(float)$loans; 


	@endphp
<td>
<span class="badge rounded-pill text-primary bg-dark-info p-2 text-uppercase px-3"><b><i class='align-middle me-1'></i>ugx {{ ($acct_bal) }}</b></span>


</td>

			 
<td>

<a href="{{ route('view.student.account',$value->uuid) }}" class="btn btn-success btn-sm radius-10 px-2 " title="Account Details" target="_blank"><i class="lni lni-eye"></i></a>



<a href="{{ route('student.withdrawal.form',$value->uuid) }}" class="btn btn-warning btn-sm radius-10 px-2" title="Withdrawal Money" ><i class="lni lni-money-protection"></i></a>


<a href="{{ route('student.loan.form',$value->uuid) }}" class="btn btn-danger btn-sm radius-10 px-2" title="Give Loan" ><i class="lni lni-money-protection"></i></a>




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

<script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });

        $(document).ready(function () {
            $('[data-toggle="popover"]').popover({
                html: true,
                content: function () {
                    return $('#primary-popover-content').html();
                }
            });
        });

    </script>

@endsection
    