
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
	<h3><b>{{$adminData->name}}</b></h3>
	
	<h5><b>Wallet Code : {{$adminData->student_code}}</b></h5>

	<h5><b>Wallet Code : {{$adminData->student_pincode}}</b></h5>

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
<a class="nav-link active" data-toggle="tab" href="#photo" role="tab">Profile Photo</a>
<div class="slide"></div>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#password" role="tab">Password Change</a>
<div class="slide"></div>
</li>

</ul>
</div>


<div class="tab-content">

<div class="tab-pane active" id="photo" role="tabpanel">

<div class="card">
<div class="card-header">
<h5 class="card-header-text">Update Profile Photo</h5>

</div>
<div class="card-block">
<div class="view-info">
<div class="col-lg-12">
<div class="general-info">
<div class="row">
<div class="col-lg-12 col-xl-6">
<div class="col-lg-6 col-xl-6 col-md-6">
<div class="card rounded-card user-card">
<div class="card-block">
<div class="img-hover">
<img class="img-fluid img-radius" id="showImage" src="{{(!empty($editData->student_profile_path))? url('upload/student_images/'.$editData->student_profile_path):url('upload/user.png') }}" alt="">

</div>

</div>
</div>
</div>

</div>

<div class="col-md-6">
<form method="post" action="{{route('student.profile.photo.update') }}" enctype="multipart/form-data">
@csrf


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