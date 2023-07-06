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
<h4>Update File/Document Details</h4>

</div>
</div>
</div>

</div>
</div>


<div class="page-body">
<div class="row">
<div class="col-sm-12">

<div class="card">
<div class="card-header">
<h5>Update File/Document Information</h5>

                <div class="ms-auto" style="float: right;"><a href="{{ route('view.files') }}" class="btn btn-success radius-30 mt-2 mt-lg-0"><i class="fa fa-arrow-circle-left"></i>Back</a></div>


</div>

@if (auth()->user()->type == 2)
<div class="card-block">
<form  method="post" action="{{ route('file.update',$editData->id)}}" enctype="multipart/form-data" novalidate>
	@csrf

    <input type="hidden" name="old_doc" value="{{$editData->docs}}">

<div class="form-group row">
<label class="col-sm-2 col-form-label">File Title</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="title"  value="{{$editData->title}}">
<span class="messages"></span>
</div>
</div>



<div class="row">
<label class="col-sm-2 col-form-label">File Type</label>
<div class="col-sm-10">
<div class="form-check form-check-inline">
<label class="form-check-label">
<input class="form-check-input" type="radio" name="file_type"  value="Academic" checked="checked" {{ ($editData->file_type == 'Academic')?'checked':'' }}> Academic
</label>
</div>
<div class="form-check form-check-inline">
<label class="form-check-label">
<input class="form-check-input" type="radio" name="file_type"  value="Health" {{ ($editData->file_type == 'Health')?'checked':'' }}> Health
</label>
</div>

<div class="form-check form-check-inline">
<label class="form-check-label">
<input class="form-check-input" type="radio" name="file_type"  value="Other" {{ ($editData->file_type == 'Other')?'checked':'' }}> Other
</label>
</div>
<span class="messages"></span>
</div>
</div>

<div class="card-block">
<div class="sub-title">Upload File/Document</div>
<input type="file" name="docs" class="form-control" value="{{$editData->docs}}">
</div>

<div class="form-group row">
<label class="col-sm-2"></label>
<div class="col-sm-10">
<button type="submit" class="btn btn-primary m-b-0">Update</button>
</div>
</div>
</form>
</div>
@endif
</div>






</div>
</div>
</div>

</div>
</div>


</div>
</div>

            
@endsection
