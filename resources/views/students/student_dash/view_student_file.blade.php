@extends('students.student_master')
@section('content')



<div class="pcoded-content">
<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-header">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<div class="d-inline">
<h4>All Files/Documents Information</h4>

</div>
</div>
</div>

</div>
</div>


<div class="page-body">

<div class="card">
<div class="card-header">
<h5>Files/Documents Details</h5>

@if (auth()->user()->type == 2)
                <div class="ms-auto" style="float: right;"><a href="{{ route('add.file') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="fa fa-plus-circle"></i>Add New Document</a></div>
				@endif

</div>
<div class="card-block">
<div class="table-responsive dt-responsive">
<table id="dom-jqry" class="table table-striped table-bordered nowrap" style="width:100%">
<thead>
<tr>
<th>Title</th>
<th>File Type</th>
<th>Date</th>
<th>Month</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@foreach($allData as $key => $value )
<tr>
<td>{{ $value->title }}</td>

<td>{{ $value->file_type }}</td>

<td>{{ $value->date }}</td>

<td>{{ $value->month }}</td>


@if (auth()->user()->type == 2)

<td>

<a href="{{ route('edit.file',$value->id) }}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>


<a href="{{ route('file.details',$value->id) }}" class="btn btn-sm btn-success" title="File Details"><i class="fa fa-eye"></i></a>


<a href="{{ route('delete.file',$value->id) }}" class="btn btn-sm btn-danger" title="Delete" id="delete"><i class="fa fa-trash-o"></i></a>

</td>

@endif

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

            
@endsection
