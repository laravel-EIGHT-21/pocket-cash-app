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
								<li class="breadcrumb-item active" aria-current="page">Bulk Transfers</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
				<div class="row">
					<div class="col-xl-6 mx-auto">
						<div class="card">
							<div class="card-header px-4 py-6">
								<h5 class="mb-0"> Bulk Money Transfes to Schools</h5>
								@can('money-transfers')
                                <a href="{{ route('money.transfers') }}" class="btn btn-success px-3 radius-0" style="float: right;"> Back</a>
@endcan

							</div>
							<div class="card-body p-4">
							@can('money-transfers')
								<form  action="/bulk/money/tranfer" class="row g-3 needs-validation" novalidate>
                                {{csrf_field()}}
									<div class="col-md-6">
										<label for="bsValidation1" class="form-label"> Merchant Number</label>
										<input type="text" class="form-control" id="bsValidation1" name="merchant_no"  required>
										<div class="invalid-feedback">
											Please Enter The Merchant Number.
										  </div>
									</div>


									<div class="col-md-6">
										<label for="date" class="form-label">Date</label>
										<input type="date" class="form-control" name="date" required>
										<div class="invalid-feedback">
											Please provide a Date.
										  </div>
									</div>
									

                                  

									<br>

									<hr>

                                    @foreach($allData as $school )
									<div class="col-md-4">
										<label for="bsValidation4" class="form-label">School</label>
										<input type="text" class="form-control" id="bsValidation4"  name="school_id_no[]" value="{{$school['school']['name']}}">

									</div>


                                    <div class="col-md-4">
										<label for="bsValidation4" class="form-label">School Number</label>
										<input type="text" class="form-control" id="bsValidation4"  name="phone1[]" value="{{$school['school']['phone1']}}">

									</div>

									
		@php



		$formatDate = Carbon\Carbon::now()->format('d F y');

	  $sumamount = App\Models\apiTransfers::select('school_id')->groupBy('school_id')->where('school_id',$school->school_id)->where('transfer_date',$formatDate)->sum('amount');
      @endphp


                                    <div class="col-md-4">
										<label for="amount" class="form-label">Daily Total Amount</label>
										<input type="text" name="amount[]" class="form-control" value="{{($sumamount)}}">

									</div>


@endforeach

								<br>

								<hr>


									<div class="col-md-12">
										<div class="d-md-flex d-grid align-items-center gap-3">
											<button type="submit" class="btn btn-primary px-4">Submit Bulk Transfer</button>
											<button type="reset" class="btn btn-light px-4">Reset</button>
										</div>
									</div>


								</form>
								@endcan
							</div>
						</div>
					</div>
				</div>
				<!--end row-->




			</div>



            <br><br>
   
			
<!--
   
			<script type="text/javascript">
         $(function(){
             $(document).on('change',['#date'],function(){
                 var date = $('#date').val();
                 $.ajax({
                     url:"{{ route('get-school-daily-total-amount') }}",
                     type: "GET",
                     data:{'date':date},
                     success:function(data){                   
                         $('#amount').val(data);
                     }
                 });
             });
         });
     </script>

	  


      
            <script type="text/javascript"> 
         $(function(){
             $(document).on('change','#date',function(){
                 var date = $(this).val();
                 $.ajax({
                     url:"{{ route('get-school-daily-total-amount') }}",
                     type: "GET",
                     data:{date:date},
                     success:function(data){                   
                         $('#amount').val(data);
                     }
                 });
             });
         });
     </script>
     

           
	 
		-->

@endsection
