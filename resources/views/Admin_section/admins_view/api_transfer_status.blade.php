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
							<table id="example" class="table table-striped table-bordered display text-nowrap" style="width:100%">
								<thead>
									<tr>
                                    <th width="5%">SL</th> 
									<th>Student Account </th>
                                        <th>Parent Tel.</th>
                                        <th>Transfer Date</th>
										<th>Deposits (UGX)</th>

									</tr>
								</thead>
								<tbody>
								@foreach($allData as $key => $value )
								<tr>

                                <td>{{ $key+1 }}</td>
<td> {{ $value->student_acct_no}}</td>
<td> {{ $value->payer_number}}</td>
<td> {{ $value->transfer_date}}</td>
<td> {{ $value->amount}}</td>


</tr>
@endforeach
								</tbody>

								<tfoot>
                          <!-- start row -->
                          <tr>
                            <th colspan="4" style="text-align: right">
                              Total Amount (UGX):
                            </th>
                            <th></th>
                          </tr>
                          <!-- end row -->
                        </tfoot>

							</table>
						</div>
					</div>
				</div>
				
			</div>
<br><br>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js" integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
          

            // Total filtered rows on the selected column (code part added)
            var sumCol4Filtered = display.map(el => data[el][4]).reduce((a, b) => intVal(a) + intVal(b), 0 );
          
            // Update footer
            $( api.column( 4 ).footer() ).html(
                ''+pageTotal +' ( '+ total +' total) (' + sumCol4Filtered +' filtered)'
            );
        }
    } );
} );
</script>

            
@endsection
