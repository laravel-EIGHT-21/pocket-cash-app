
@extends('admin.admin_master')
@section('user')





@php 

$students= App\Models\SchoolStudent::where('status',1)->get();


$schools= App\Models\Schools::where('status',1)->get();



$day = date('d F y');
$today_depo = App\Models\apiTransfers::whereDate('created_at',Carbon\Carbon::today())->sum('amount');

$months = date('F y');
$month_depo = DB::table('api_transfers')->where('transfer_month',$months)->sum('amount');

$years = date('y');
$year_depo = DB::table('api_transfers')->where('transfer_year',$years)->sum('amount');





$allData1 = App\Models\apiTransfers::whereDate('created_at',Carbon\Carbon::today())->get();


$allData2 = App\Models\apiTransfers::where('transfer_month',$months)->get();



$allData3 = App\Models\apiTransfers::where('transfer_year',$years)->get();



@endphp

<div class="page-content">
				<div class="row row-cols-md-6 row-cols-xl-6">
                   <div class="col-md-6">
					 <div class="card radius-10 border-start border-0 border-info">
						<div class="card-body">
						<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-dark">Total Active Accounts</p>
									<h5 class="my-1 text-info">{{ count($students) }}</h5>
									
								</div>
								<div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i class='bx bxs-group bx-spin'></i>
								</div>
							</div>
						</div>
					 </div>
				   </div>
				   <div class="col-md-6">
					<div class="card radius-10 border-start border-0 border-danger">
					   <div class="card-body">
					   <div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-dark">Total Active Schools</p>
									<h5 class="my-1 text-success">{{ count($schools) }}</h5>
									
								</div>
								<div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='lni lni-home bx-spin'></i>
								</div>
							</div>
					   </div>
					</div>
				  </div>
				 

				</div><!--end row-->








				<div class="row row-cols-md-6 row-cols-xl-6">
                   <div class="col-md-4">
					 <div class="card radius-10 border-start border-0 border-warning">
						<div class="card-body">
						<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-dark">Total Daily Deposits</p>
									<h5 class="my-1 text-info"> UGX {{ ($today_depo) }}</h5>
									
								</div>
								<div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='lni lni-investment bx-spin' ></i>
								</div>
							</div>
						</div>
					 </div>
				   </div>
				   <div class="col-md-4">
					<div class="card radius-10 border-start border-0 border-success">
					   <div class="card-body">
					   <div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-dark">Total Monthly Deposits</p>
									<h5 class="my-1 text-success">UGX {{ ($month_depo) }}</h5>
									
								</div>
								<div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i class='lni lni-investment bx-spin'></i>
								</div>
							</div>
					   </div>
					</div>
				  </div>


				  <div class="col-md-4">
					<div class="card radius-10 border-start border-0 border-primary">
					   <div class="card-body">
					   <div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-dark">Total Yearly Deposits</p>
									<h5 class="my-1 text-success"> UGX {{ ($year_depo) }}</h5>
									
								</div>
								<div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i class='lni lni-investment bx-spin'></i>
								</div>
							</div>
					   </div>
					</div>
				  </div>
				 

				</div><!--end row-->







				<div class="row row-cols-md-6 row-cols-xl-6">
                   <div class="col-md-4">
					 <div class="card radius-10 border-start border-0 border-dark">
						<div class="card-body">
						<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-dark"> Daily Deposits Made</p>
									<h5 class="my-1 text-info">{{ count($allData1) }}</h5>
									
								</div>
								<div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i class='lni lni-money-protection bx-spin' ></i>
								</div>
							</div>
						</div>
					 </div>
				   </div>
				   <div class="col-md-4">
					<div class="card radius-10 border-start border-0 border-secondary">
					   <div class="card-body">
					   <div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-dark"> Monthly Deposits Made</p>
									<h5 class="my-1 text-success">{{ count($allData2) }}</h5>
									
								</div>
								<div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='lni lni-money-protection bx-spin'></i>
								</div>
							</div>
					   </div>
					</div>
				  </div>


				  <div class="col-md-4">
					<div class="card radius-10 border-start border-0 border-light">
					   <div class="card-body">
					   <div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-dark"> Yearly Deposits Made</p>
									<h5 class="my-1 text-success">{{ count($allData3) }}</h5>
									
								</div>
								<div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i class='lni lni-money-protection bx-spin'></i>
								</div>
							</div>
					   </div>
					</div>
				  </div>
				 

				</div><!--end row-->







<br>


@php 
$year = Carbon\Carbon::parse()->format('y');
	
$fees = App\Models\apiTransfers::select(DB::raw('SUM(amount) AS deposits,transfer_month'))->groupBy('transfer_month')->orderBY('created_at')->where('transfer_year',$year)->get();
             
             foreach($fees->toArray() as $row)
             {
             
                $month[] = $row['transfer_month'];
                $deposits_total[] = $row['deposits'];
				$deposits_made = $row['deposits'];
             
             }

			



@endphp 


				<div class="row">
                   <div class="col-6 col-lg-6 d-flex">
                      <div class="card radius-10 w-100">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<div>
									<h6 class="mb-0 text-uppercase"><b>BarChart Showing Deposits Overview</b></h6>
								</div>

							</div>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="chart-container1">
									<canvas id="chart100"></canvas>
								</div>
							</div>
						</div>

					  </div>
				   </div>


                   <div class="col-6 col-lg-6 d-flex">
                      <div class="card radius-10 w-100">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<div>
									<h6 class="mb-0 text-uppercase"><b>LineChart Showing Deposits Overview</b></h6>
								</div>

							</div>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="chart-container1">
									<canvas id="chartline"></canvas>
								</div>
							</div>
						</div>

					  </div>
				   </div>


				   
				</div><!--end row-->


<br>

			</div>



<!-- ChartJS -->
<script src="{{asset('Backend/assets/plugins/chart.js/Chart.min.js')}}"></script>

<script src="{{asset('Backend/assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>


			<script type="text/javascript">
    // chart1
    var ctx = document.getElementById('chart100').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels:<?php echo json_encode($month); ?>,
            datasets: [{
                label: 'Total Amount of Deposits',
				backgroundColor     : 'rgba(100, 149, 237,0.8)',
				borderWidth          : 2,
				borderColor         : 'rgba(100, 149, 237,1)',
				pointRadius          : false,
				pointColor          : 'rgba(100, 149, 237,0.8)',
				pointHighlightFill  : '#fff',
				pointHighlightStroke: 'rgba(100, 149, 237,0.8)',
                data: <?php echo json_encode($deposits_total);?>,
                
            },

		
		]
        },
        options: {
                maintainAspectRatio : false,
                responsive : true,
                legend:{
                  display:true

                },
                    scales: {
            xAxes: [{
              gridLines : {
                display : false,
              }
            }],
            yAxes: [{
              gridLines : {
                display : true,
              },
              ticks:{
                beginAtZero:true
              }

            }]
          }
       }


    });






				</script>













<script type="text/javascript">
    // chart1
    var ctx = document.getElementById('chartline').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels:<?php echo json_encode($month); ?>,
            datasets: [{
                label: 'Total Amount of Deposits',
				backgroundColor     : 'rgba(102, 205, 170,0.8)',
				borderWidth          : 2,
				borderColor         : 'rgba(102, 205, 170,1)',
				pointRadius: 5,
     			pointHoverRadius: 10,
				pointDotStrokeWidth : 70,
				pointColor          : 'rgba(102, 205, 170,0.8)',
				pointHighlightFill  : '#fff',
				pointHighlightStroke: 'rgba(102, 205, 170,0.8)',
                data: <?php echo json_encode($deposits_total);?>,
                
            },

		
		]
        },
		options: {
                maintainAspectRatio : false,
                responsive : true,
                pointDot   :true,
                legend:{
                  display:true

                },
                    scales: {
            xAxes: [{
              gridLines : {
                display : false,
              }
            }],
            yAxes: [{
              gridLines : {
                display : true,
              },
              ticks:{
                beginAtZero:true
              }

            }]
          }
       }




    });






				</script>












@endsection