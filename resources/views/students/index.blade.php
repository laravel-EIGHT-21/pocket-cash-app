
@extends('students.student_master')
@section('content')


@php 
$id = Auth::user()->id;

$all = App\Models\student_files::with(['student'])->where('student_id',$id)->get();


$academic = App\Models\student_files::with(['student'])->where('student_id',$id)->where('file_type','Academic')->get();


$health = App\Models\student_files::with(['student'])->where('student_id',$id)->where('file_type','Health')->get();


$others = App\Models\student_files::with(['student'])->where('student_id',$id)->where('file_type','Other')->get();



@endphp

<div class="pcoded-content">
<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper">
<div class="page-body">


<div class="row">


<div class="col-xl-12 col-md-12">
<div class="card bg-c-blue update-card">
<div class="card-block">
<div class="row align-items-end">
<div class="col-8">
<h4 class="text-white">{{count($all)}}</h4>
<h6 class="text-white m-b-0"><b>Total Documents Uploaded</b></h6>
</div>

</div>
</div>
<div class="card-footer">

</div>
</div>
</div>
</div>


<div class="row">

<div class="col-xl-4 col-md-4">
<div class="card bg-c-yellow update-card">
<div class="card-block">
<div class="row align-items-end">
<div class="col-8">
<h4 class="text-white">{{count($academic)}}</h4>
<h6 class="text-white m-b-0"><b>Academic Documents</b></h6>
</div>

</div>
</div>
<div class="card-footer">

</div>
</div>
</div>


<div class="col-xl-4 col-md-4">
<div class="card bg-c-green update-card">
<div class="card-block">
<div class="row align-items-end">
<div class="col-8">
<h4 class="text-white">{{count($health)}}</h4>
<h6 class="text-white m-b-0"><b>Health Documents</b></h6>
</div>

</div>
</div>
<div class="card-footer">

</div>
</div>
</div>
<div class="col-xl-4 col-md-4">
<div class="card bg-c-pink update-card">
<div class="card-block">
<div class="row align-items-end">
<div class="col-8">
<h4 class="text-white">{{count($others)}}</h4>
<h6 class="text-white m-b-0"><b>Other Documents</b></h6>
</div>

</div>
</div>
<div class="card-footer">

</div>
</div>
</div>






</div>





<br><br>





</div>
</div>
</div>		



@endsection