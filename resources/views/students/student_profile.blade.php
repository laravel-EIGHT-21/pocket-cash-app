
@extends('students.student_master')

@section('content')

<div class="pcoded-content">
<div class="pcoded-inner-content">


<div class="main-body">
<div class="page-wrapper">

<div class="page-header">
<div class="row">
<div class="col-lg-6">
<div class="page-header-title">
<div class="d-inline">
<h4>Student Profile</h4>
</div>
</div>
</div>

</div>
</div>

<br>
<br>

<div class="page-body">
@php
                                        $id = Auth::user()->id;
                                        $adminData = App\Models\User::find($id);
										$editData = App\Models\User::find($id);
                                        @endphp



										<div class="row simple-cards users-card">


<div class="col-md-12 col-xl-12">
	<div class="card user-card">
	<div class="card-header-img">
	<img class="img-fluid img-radius" src="{{ (!empty($adminData->student_profile_path))? url('upload/student_images/'.$adminData->student_profile_path):url('upload/user.png') }}" width="90" height="90" alt="user-img">
	<h3><b>Name : {{$adminData->name}}</b></h3>
	
	<h5><b>Wallet Account : {{$adminData->student_code}}</b></h5>

	</div>
	

	<div>
	
	</div>
	</div>
	</div>



</div>





<div class="row">
<div class="col-lg-12">

<div class="tab-header card">
<ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
<li class="nav-item">
<a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile </a>
<div class="slide"></div>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#password" role="tab">Password Change</a>
<div class="slide"></div>
</li>

<li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#pincode" role="tab">PinCode Change</a>
<div class="slide"></div>
</li>

</ul>
</div>


<div class="tab-content">

<div class="tab-pane active" id="profile" role="tabpanel">

<div class="card">
<div class="card-header">
<h5 class="card-header-text">Update Profile </h5>

</div>
<div class="card-block">
<div class="view-info">
<div class="col-lg-12">
<div class="general-info">
<div class="row">


<div class="col-md-6">
<form method="post" action="{{route('student.profile.photo.update') }}" enctype="multipart/form-data">
@csrf


<div class="form-group row">
<label class="col-sm-3 col-form-label">Name</label>
<div class="col-sm-10">
<input type="text" name="name" class="form-control" value="{{$editData->name}}" >
</div>
</div>


<div class="form-group row">
<label class="col-sm-3 col-form-label">Email</label>
<div class="col-sm-10">
<input type="email" name="email" class="form-control" value="{{$editData->email}}" >
</div>
</div>

		<div class="card-block">
<div class="sub-title">Update Photo</div>
<input type="file" name="student_profile_path" id="image" value="{{$editData->student_profile_path}}">
</div>

		<div class="text-center">
<button type="submit" class="btn btn-primary waves-effect waves-light m-r-20">Update Photo</button>

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






<div class="tab-pane" id="password" role="tabpanel">

<div class="card">
<div class="card-header">
<h5 class="card-header-text">Update Password</h5>

</div>

<div class="card-block">
<div class="view-info">

<div class="col-lg-12">
<div class="general-info">
<div class="row">
<form method="POST" action="{{route('student.password.update') }}" enctype="multipart/form-data">
            @csrf
<div class="col-lg-12 col-xl-12">

<div class="form-group row">
<label class="col-sm-3 col-form-label">Current Password</label>
<div class="col-sm-10">
<input type="password" name="oldpassword" id="current_password" class="form-control" required>
</div>
</div>

<div class="form-group row">
<label class="col-sm-3 col-form-label">New Password</label>
<div class="col-sm-10">
<input type="password" name="password" id="password" class="form-control" required>
</div>
</div>

<div class="form-group row">
<label class="col-sm-3 col-form-label">Confirm Password</label>
<div class="col-sm-10">
<input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
</div>
</div>

</div>

           
<div class="text-center">
           <button type="submit"  class="btn btn-primary waves-effect waves-light m-r-20">Update Password </button>
           
           </div>

		   </form>


</div>

</div>

</div>



</div>


</div>

</div>


</div>





<div class="tab-pane" id="pincode" role="tabpanel">

<div class="card">
<div class="card-header">
<h5 class="card-header-text">Update PinCode</h5>

</div>

<div class="card-block">
<div class="view-info">

<div class="col-lg-12">
<div class="general-info">
<div class="row">
<form method="POST" action="{{route('student.pincode.update') }}" enctype="multipart/form-data">
            @csrf
<div class="col-lg-12 col-xl-12">

<div class="form-group row">
<label class="col-sm-4 col-form-label">PinCode</label>
<div class="col-10">
<input type="text" name="oldpincode" id="current_student_pincode" class="form-control"  required >
</div>
</div>




<div class="form-group row">
<label class="col-sm-3 col-form-label">New PinCode</label>
<div class="col-sm-10">
<input type="text" name="student_pincode" id="student_pincode" class="form-control" maxlength="5" required>
</div>
</div>

<div class="form-group row">
<label class="col-sm-3 col-form-label">Confirm PinCode</label>
<div class="col-sm-10">
<input type="text" name="student_pincode_confirmation" id="student_pincode_confirmation" maxlength="5" class="form-control" required>
</div>
</div>






</div>

           
<div class="text-center">
           <button type="submit"  class="btn btn-primary waves-effect waves-light m-r-20">Update PinCode </button>
           
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

</div>
</div>
</div>

</div>
</div>
</div>
</div>

<script type="text/javascript">

	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src', e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});

</script>

@endsection