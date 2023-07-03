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
<h4>Add New File/Document</h4>

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
<h5>Add New File/Document Detals </h5>


                <div class="ms-auto" style="float: right;"><a href="{{ route('view.files') }}" class="btn btn-success radius-30 mt-2 mt-lg-0"><i class="fa fa-arrow-circle-left"></i>Back</a></div>

</div>

@if (auth()->user()->type == 2)
<div class="card-block">
<form  method="post" action="{{ route('file.store')}}" enctype='multipart/form-data' novalidate>
	@csrf

<div class="form-group row">
<label class="col-sm-2 col-form-label">File Title</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="title"  placeholder="File Title">
<span class="messages"></span>
</div>
</div>


<div class="row">
<label class="col-sm-2 col-form-label">File Type</label>
<div class="col-sm-10">
<div class="form-check form-check-inline">
<label class="form-check-label">
<input class="form-check-input" type="radio" name="file_type"  value="Academic" checked="checked"> Academic
</label>
</div>
<div class="form-check form-check-inline">
<label class="form-check-label">
<input class="form-check-input" type="radio" name="file_type"  value="Health"> Health
</label>
</div>

<div class="form-check form-check-inline">
<label class="form-check-label">
<input class="form-check-input" type="radio" name="file_type"  value="Other"> Other
</label>
</div>
<span class="messages"></span>
</div>
</div>

<div class="card-block">
<div class="sub-title">Upload File/Document</div>
<input type="file" name="docs" id="docs" class="form-control">
</div>

<div class="form-group row">
<label class="col-sm-2"></label>
<div class="col-sm-10">
<button type="submit" class="btn btn-primary m-b-0">Submit</button>
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
