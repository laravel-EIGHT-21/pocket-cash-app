
@extends('students.student_master')

@section('content')

<div class="pcoded-content">
<div class="pcoded-inner-content">


<div class="main-body">
<div class="page-wrapper">

<div class="page-header">
<div class="row">
<div class="col-lg-6">
<div class="page-header-title">
<div class="d-inline">
<h4>All Account Details</h4>
</div>
</div>
</div>

</div>
</div>

<br>
<br>

<div class="page-body">
@php
                                        $id = Auth::user()->id;
                                        $adminData = App\Models\User::find($id);
										$editData = App\Models\User::find($id);
                                        @endphp



										<div class="row simple-cards users-card">


<div class="col-md-12 col-xl-12">
	<div class="card user-card">
	<div class="card-header-img">
	<img class="img-fluid img-radius" src="{{ (!empty($adminData->student_profile_path))? url('upload/student_images/'.$adminData->student_profile_path):url('upload/user.png') }}" width="90" height="90" alt="user-img">
	<h3><b>Account Name : {{$adminData->name}}</b></h3>
	
	<h5><b>Wallet Code : {{$adminData->student_code}}</b></h5>
    <h6><b><span style="color:green;"> Actual Amount : ugx {{ ($acct_bal) }}</span></b></h6>
    <h6><b><span style="color:red;"> Total Deposites : ugx {{($acct) }}</span></b></h6>
	</div>
	

	<div>
	
	</div>
	</div>
	</div>



</div>





<div class="row">
<div class="col-lg-12">

<div class="tab-header card">
    <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
    <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#deposits" role="tab">Deposits Made</a>
    <div class="slide"></div>
    </li>
    <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#withdrawals" role="tab">Withdrawals</a>
    <div class="slide"></div>
    </li>
    <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#loans" role="tab">Loans</a>
    <div class="slide"></div>
    </li>

    </ul>
    </div>


<div class="tab-content">


<div class="tab-pane active" id="deposits" role="tabpanel">
    
    <div class="col-xl-12">
    <div class="row">
    <div class="col-sm-12">
    
    <div class="card">
    <div class="card-header">
    <h5 class="card-header-text">All Deposits Made
    </h5>
    </div>
    <div class="card-block contact-details">
    <div class="data_table_main table-responsive dt-responsive">
    <table id="simpletable" class="table  table-striped table-bordered nowrap">
    <thead>
    <tr>
    <th>Amount Deposited (UGX)</th>
    <th>Date</th>
    <th>Month</th>
    </tr>
    </thead>
    <tbody>
    @foreach($student_deposite as $key => $value )
    <tr>


    <td>{{ $value->amount}}</td>
    <td>{{ $value->transfer_date}}</td>
    <td>{{ $value->transfer_month}}</td>

    </tr>
    @endforeach

    </tbody>
    
    </table>
    </div>
    </div>
    </div>
    
    </div>
    </div>
    </div>
    
    
</div>




<div class="tab-pane" id="withdrawals" role="tabpanel">
    
    <div class="col-xl-12">
    <div class="row">
    <div class="col-sm-12">
    
    <div class="card">
    <div class="card-header">
    <h5 class="card-header-text">All Withdrawals Made
    </h5>
    </div>
    <div class="card-block contact-details">
    <div class="data_table_main table-responsive dt-responsive">
    <table id="dom-jqry" class="table  table-striped table-bordered nowrap">
    <thead>
    <tr>
    <th>Amount Withdrawn (UGX)</th>
    <th>Date</th>
    <th>Month</th>
    </tr>
    </thead>
    <tbody>
    @foreach($student_withdrawal as $key => $value )
    <tr>


    <td>{{ $value->withdrawal_amount}}</td>
    <td>{{ $value->withdrawal_date}}</td>
    <td>{{ $value->withdrawal_month}}</td>

    </tr>
    @endforeach

    </tbody>
    
    </table>
    </div>
    </div>
    </div>
    
    </div>
    </div>
    </div>
    

</div>





<div class="tab-pane" id="loans" role="tabpanel">
    
    <div class="col-xl-12">
    <div class="row">
    <div class="col-sm-12">
    
    <div class="card">
    <div class="card-header">
    <h5 class="card-header-text">All Loans 
    </h5>
    </div>
    <div class="card-block contact-details">
    <div class="data_table_main table-responsive dt-responsive">
    <table id="colum-rendr" class="table  table-striped table-bordered nowrap" style="width:100%">
    <thead>
    <tr>
    <th>Amount (ugx)</th>
    <th> Date</th>
    <th> Month</th>
    <th>Status</th>
    <th>Payment</th>
    </tr>
    </thead>
    <tbody>
    @foreach($student_loans as $key => $value )
    <tr>


    <td>{{ $value->loan_amount}}</td>
    <td>{{ $value->loan_date}}</td>
    <td>{{ $value->loan_month}}</td>
    <td>

    @php 
    $loan = $value->loan_amount;

    $payment_loan = $value->loan_payment_amount;

    $zero = 00 ;


    @endphp


    @if($payment_loan == $zero)
    <div class="badge rounded-pill text-danger bg-light-info p-2 text-uppercase px-3"><i class='bx bxs-circle align-middle me-1'></i>Not Paid</div>
    @elseif($payment_loan >= $loan )
    <div class="badge rounded-pill text-success bg-light-info p-2 text-uppercase px-3"><i class='bx bxs-circle align-middle me-1'></i>Paid</div>
    @endif


    </td>

    <td>{{ $value->loan_payment_amount}}</td>

    </tr>
    @endforeach

    </tbody>
    
    </table>
    </div>
    </div>
    </div>
    
    </div>
    </div>
    </div>
    
    
</div>

</div>


</div>
</div>
</div>

</div>
</div>
</div>
</div>

<script type="text/javascript">

	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src', e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});

</script>

@endsection