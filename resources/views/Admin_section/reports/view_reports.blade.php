					
@extends('admin.admin_master')

@section('content')

        

			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3"> Deposits Reports</div>


				</div>
				<!--end breadcrumb-->


				
				<div class="row">
					

					<div class="col-xl-6 mx-auto">
						<h6 class="mb-0 text-uppercase">Generate Deposite Reports</h6>
						<hr/>
						<div class="card">
							<div class="card-body">
								<ul class="nav nav-pills mb-3" role="tablist">
									<li class="nav-item" role="presentation">
										<a class="nav-link active" data-bs-toggle="pill" href="#primary-pills-weekly" role="tab" aria-selected="true">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class='bx bx-file font-18 me-1'></i>
												</div>
												<div class="tab-title">Weekly Reports</div>
											</div>
										</a>
									</li>
									<li class="nav-item" role="presentation">
										<a class="nav-link" data-bs-toggle="pill" href="#primary-pills-monthly" role="tab" aria-selected="false">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class='bx bx-file font-18 me-1'></i>
												</div>
												<div class="tab-title">Monthly Reports</div>
											</div>
										</a>
									</li>
									<li class="nav-item" role="presentation">
										<a class="nav-link" data-bs-toggle="pill" href="#primary-pills-yearly" role="tab" aria-selected="false">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class='bx bx-file font-18 me-1'></i>
												</div>
												<div class="tab-title">Yearly Reports</div>
											</div>
										</a>
									</li>
								</ul>
        <div class="tab-content" id="pills-tabContent">



        <div class="tab-pane fade show active" id="primary-pills-weekly" role="tabpanel">
       							<div class="col-lg-8">
								<div class="card">
									<div class="card-body">
                                    <form method="post" action="{{ route('search-deposits-by-week') }}" target="_blank">
                                                  @csrf
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Start Date</h6>
											</div>
											<div class="col-sm-9 text-secondary">

                                            <input type="date" name="start_date" class="form-control" id="start_date" >
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">End Date</h6>
											</div>
											<div class="col-sm-9 text-secondary">
                                            <input type="date" name="end_date" class="form-control" id="end_date" > 
											</div>
										</div>



										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
		
												<input type="submit" class="btn btn-rounded btn-primary px-4" value="Generate Report" />
											</div>
										</div>
									</div>
                </form>
								</div>

							</div>
        </div>


        <div class="tab-pane fade" id="primary-pills-monthly" role="tabpanel">


        <div class="col-lg-8">
								<div class="card">
									<div class="card-body">
                                    <form method="post" action="{{ route('search-deposits-by-month') }}" target="_blank">
                                                  @csrf
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Month</h6>
											</div>
											<div class="col-sm-9 text-secondary">

                                            <input type="month" name="month" class="form-control" id="month" > 
											</div>
										</div>




										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
		
												<input type="submit" class="btn btn-rounded btn-primary px-4" value="Generate Report" />
											</div>
										</div>
									</div>
                </form>
								</div>

							</div>


        </div>



        <div class="tab-pane fade" id="primary-pills-yearly" role="tabpanel">
       

        <div class="col-lg-8">
								<div class="card">
									<div class="card-body">
                                    <form method="post" action="{{ route('search-deposits-by-year') }}" target="_blank">
                                                  @csrf
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Year</h6>
											</div>
											<div class="col-sm-9 text-secondary">

                                            <input type="month" name="year" class="form-control" id="year" > 
											</div>
										</div>




										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
		
												<input type="submit" class="btn btn-rounded btn-primary px-4" value="Generate Report" />
											</div>
										</div>
									</div>
                </form>
								</div>

							</div>

        </div>



        </div>
        </div>
        </div>
					</div>





				</div>
				<!--end row-->
			</div>



                        
@endsection