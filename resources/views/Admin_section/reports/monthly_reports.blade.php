@extends('admin.admin_master')

@section('content')



			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3"> Deposits Report</div>

				</div>
				<!--end breadcrumb-->
				<div class="card">
					<div class="card-body">
						<div id="invoice">
							<div class="toolbar hidden-print">
								<div class="text-end d-print-none">
                                <a href="javascript:window.print()" class="btn btn-rounded btn-primary"><b> Print</b></a>
								</div>
								<hr/>
							</div>
							<div class="invoice overflow-auto">
								<div style="min-width: 600px">
									<header>
										<div class="row">
											<div class="col">
												<a href="javascript:;">
													<img src="{{asset('upload/funzi_wallet.png')}}" width="170" alt="" />
												</a>
											</div>
											<div class="col company-details">
												<h2 class="name">
									<a target="_blank" href="javascript:;">
									Funzi Wallet
									</a>
								</h2>
												
											</div>
										</div>
									</header>
									<main>
										<div class="row contacts">
											<div class="col invoice-to">

												<h3 class="to">Monthly Deposits Report</h3>
                                                <div></div>
												<div></div>
												<div></div>
												</div>
											</div>
											<div class="col invoice-details">
												<h4 class="invoice-id">For Month :  <span class="btn btn-success">{{ $month }}</span></h4>
												<div class="date"></div>
												<div class="date">Print Date : {{ date("d M Y") }}</div>
											</div>
										</div>
										<table>
											<thead>
												<tr>
													<th>#</th>
													<th class="text-left">School</th>
												
													<th class="text-right">Total Amount (UGX)</th>

												</tr>
											</thead>
											<tbody>
											@php
											$total_sum = '0';
											@endphp
                                            @foreach($allData as $key => $item)

											@php 

											$total = App\Models\apiTransfers::where('school_id',$item->school_id)->where('transfer_month',$item->transfer_month)->sum('amount');


											@endphp


												<tr>
													<td class="no">{{ $key+1 }}</td>
													<td class="text-left">
														<h3>{{ $item['school']['name']}}</h3>
                                                    </td>
													<td class="total">{{ ($total) }}</td>

												</tr>
                                                @endforeach

											</tbody>
											<tfoot>

                                            @php

                                            $total_sum += $depo_total;


                                            @endphp

												<tr>
													<td colspan="1"></td>
													<td colspan="1"><b>GRAND TOTAL</b></td>
													<td><b>ugx {{ ($total_sum) }}</b></td>
												</tr>
											</tfoot>
										</table>
										

									</main>
									<footer>This Report was created on a computer and is INVALID WITHOUT the Signature and Stump.</footer>
								</div>
								<!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
								<div></div>
							</div>
						</div>
					</div>
				</div>
			</div>


        
@endsection