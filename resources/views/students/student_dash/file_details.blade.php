@extends('students.student_master')
@section('content')




<div class="pcoded-content">
<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-header">
<div class="row align-items-end">
<div class="col-lg-12">
<div class="page-header-title">
<div class="d-inline">
<h4><b>File Details</b></h4>

</div>
</div>
</div>

</div>
</div>



<div class="page-body">
<div class="row">
<div class="col-md-12">

<div class="card product-detail-page">
<div class="card-block">
    

@if (auth()->user()->type == 2)
                <div class="ms-auto" style="float: right;"><a href="{{ route('view.files') }}" class="btn btn-success radius-30 mt-2 mt-lg-0"><i class="fa fa-arrow-circle-left"></i>Back</a></div>
				@endif

<div class="row">



<div class="col-lg-12   product-detail" id="product-detail">
<div class="row">


<div class="col-lg-12">
<h4 class="pro-desc"><b>Document Title : {{$student_docs->title}}</b></h4>
</div>


<div class="col-lg-6 col-sm-6 mob-product-btn">
    <p><b>Date Uploaded : </b></p>
<button type="button" class="btn btn-primary waves-effect waves-light m-r-10">
<i class="icofont icofont-calendar "></i><span class="m-l-10">{{$student_docs->date}}</span>
</button>

</div>


<div class="col-lg-6 col-sm-6 mob-product-btn">
    <p><b>Document Type : </b></p>
<button type="button" class="btn btn-warning waves-effect waves-light m-r-10">
<i class="icofont icofont-file f-16 m-0 "></i><span class="m-l-10">{{$student_docs->file_type}}</span>
</button>


</div>
</div>
</div>

</div>
<br>

<div class="row">
<div class="col-lg-12  ">
<div class="port_details_all_img row">
<div class="col-lg-12 m-b-20">
<div id="big_banner">

<iframe height="600" width="250" src="{{asset($student_docs->docs) }}">


</iframe>



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



@endsection
