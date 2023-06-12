@extends('admin.admin_master')
@section('content')

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-9">
<h3>User Groups Permissions Management</h3>
</div>

</div>
</div>
</section>

<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-8">

<div class="card">
<div class="card-header">
<h5 class="card-title">Permissions<span class="badge badge-pill badge-danger"> {{ count($permits) }} </span></h5>
</div>

<div class="card-body">
<table id="example" class="table table-striped table-bordered" style="width:100%">
<thead>
<tr> 
<th>SL</th>
<th scope="col">Permission Name</th>
<th scope="col">Action</th>

</tr>
</thead>

<tbody>
@foreach($permits as $key => $item)
<tr>
<td>{{ $key+1 }}</td>


<td>
{{$item->name}}

</td>
@if (auth()->user()->type == 0)
<td width="20%">

@can('permit-edit')
    <a href="{{route('permission.edit',$item->id)}}" class="btn btn-info btn-sm" title="Edit ">
        <i class="fa fa-edit"></i></a>
@endcan


@can('permit-delete') 
    <a href="{{route('permission.delete',$item->id)}}"class="btn btn-danger btn-sm" title="Delete" id="delete">
    <i class="lni lni-trash"></i></a>
   @endcan

</td>
@endif
</tr>
@endforeach  

</tbody>


</table>
</div>

</div>

</div>


<!--Add New Blog Category-->
@if (auth()->user()->type == 0)
<div class="col-4 ">

    <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title"><b> Add New Permission</b></h3>

          
        </div>
        <!-- /.card-header -->

<div class="card-body">
<div class="row">
<div class="col-md-9 col-md-offset-1">

<form method="post" action="{{route('permissions.store')}}" enctype="multipart/form-data">

        @csrf
        @method('POST')

<div class="form-group">
<label>Name</label>
<input type="text" name="name" class="form-control" > 
@error('name')
<span class="text-danger">{{$message}}</span>
@enderror
</div>
<br>

@can('permit-create')
<button type="submit" class="btn btn-rounded btn-primary">Add Permission </button>
@endcan

                                  </form>
                          </div>
                      </div>
                          </div>

      </div>



</div>
@endif

</div>




</div>

</section>


@endsection
