@extends('admin.admin_master')

@section('admin')

@section('title')
User Password Edit
@endsection


<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Password Update</h1>
</div>
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">update Password</li>
</ol>
</div>
</div>
</div>
</section>

<section class="content">
<div class="container-fluid">
<div class="row">

<div class="col-md-12">

<div class="card card-primary">



    <form method="POST" action="{{route('admin.password.update') }}" enctype="multipart/form-data">
        @csrf
<div class="card-body">

<div class="form-group">
<label >Current Password</label>
<input type="password" name="oldpassword" id="current_password" class="form-control" required="">
</div>


<div class="form-group">
<label >New Password</label>
<input type="password" name="password" id="password" class="form-control" required="">
</div>

<div class="form-group">
    <label >Confirm Password</label>
    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required="">
    </div>



</div>

<div class="card-footer">
<button type="submit" class="btn btn-primary">Update Your Password</button>
</div>
</form>
</div>

</div>


<div class="col-md-6">
</div>

</div>

</div>
</section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



@endsection
