@extends('admin.admin_master')
@section('user')


<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page"> User Groups</li>
							</ol>
						</nav>
					</div>

				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">User Groups Information</h6>

				@can('role-create')
				<div class="col" style="float: right;">
										<a href="{{ route('roles.create') }}" class="btn btn-primary px-2 radius-30">New User Group</a>
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
<th scope="col">Role Name</th>
<th scope="col">Action</th>

</tr>
</thead>

<tbody>
@foreach($roles as $key => $item)
<tr>
<td>{{ $key+1 }}</td>
<td>
{{$item->name}}

</td>
<td width="25%">

@can('role-list')
<a href="{{route('role.show',$item->id)}}" class="btn btn-success btn-sm" title="Permissions ">
        <i class="lni lni-eye"></i></a>
		@endcan

		@can('role-edit')
    <a href="{{route('role.edit',$item->id)}}" class="btn btn-info btn-sm" title="Edit ">
        <i class="fa fa-edit"></i></a>
       @endcan

        
        @can('role-delete')
    <a href="{{route('role.delete',$item->id)}}"class="btn btn-danger btn-sm" title="Delete" id="delete">
    <i class="lni lni-trash"></i></a>
    @endcan

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

            
@endsection

