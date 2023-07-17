<!DOCTYPE html>
<html lang="en">


<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Funzi Wallet</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

<link rel="stylesheet" href="{{asset('Backend/plugins/fontawesome-free/css/all.min.css')}}">

<link rel="stylesheet" href="{{asset('Backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


<link rel="stylesheet" href="{{asset('Backend/dist/css/adminlte.min2167.css?v=3.2.0')}}">
<script nonce="617296f0-b0ad-4a49-8c36-1832de404220">(function(w,d){!function(a,e,t,r,z){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zarazData.tracks=[],a.zaraz={deferred:[]};var s=e.getElementsByTagName("title")[0];s&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),a.dataLayer=a.dataLayer||[],a.zaraz.track=(e,t)=>{for(key in a.zarazData.tracks.push(e),t)a.zarazData["z_"+key]=t[key]},a.zaraz._preSet=[],a.zaraz.set=(e,t,r)=>{a.zarazData["z_"+e]=t,a.zaraz._preSet.push([e,t,r])},a.dataLayer.push({"zaraz.start":(new Date).getTime()}),a.addEventListener("DOMContentLoaded",(()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r);z.defer=!0,z.src="../../../../cdn-cgi/zaraz/sd0d9.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)}))}(w,d,0,"script");})(window,document);</script></head>
<body class="hold-transition login-page">
<div class="login-box">
<div class="login-logo">
<img src="{{asset('upload/funzi_wallet.png')}}" width="250" alt="" />
</div>

<div class="card">
<div class="card-body login-card-body">
<p class="login-box-msg"> Enter Student Wallet Code To Transfer Money</p>


<form class="row g-3"  action="/transfer/pocket/cash" enctype="multipart/form-data" >
										@csrf



	<label class="form-label">Student Wallet Code</label>
	<div class="input-group mb-3">
	<input type="text" class="form-control" name="acct_id" placeholder="example = 02000000" />
	<div class="input-group-append">
	<div class="input-group-text">
	<span class="fas fa-fa-lock"></span>
	</div>
	</div>
	</div>



	
	<label class="form-label">Enter Amount</label>
	<div class="input-group mb-3">
	<input type="text" class="form-control" name="amount" maxlength="6" />
	<div class="input-group-append">
	<div class="input-group-text">
	<span class="fas fa-fa-lock"></span>
	</div>
	</div>
	</div>




	
	<label class="form-label">Send To</label>
	<div class="input-group mb-3">
	<input type="text" class="form-control" name="mobile" maxlength="10" placeholder="Enter Receiver Number"  />
	<div class="input-group-append">
	<div class="input-group-text">
	<span class="fas fa-fa-lock"></span>
	</div>
	</div>
	</div>



	<div class="row">

<div class="col-4">
<div class="d-grid">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>

</div>
</form>


</div>

</div>
</div>


<script src="{{asset('Backend/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{asset('Backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('Backend/dist/js/adminlte.min2167.js?v=3.2.0')}}"></script>



<!--Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>

@if(Session::has('message'))

var type = "{{ Session::get('alert-type','info')}}"
switch(type){
  
  case 'info':
    toastr.info("{{Session::get('message')}}");
    break;

  case 'success':
  toastr.success("{{Session::get('message')}}");
  break;

  case 'warning':
  toastr.warning("{{Session::get('message')}}");
  break; 

  case 'error':
  toastr.error("{{Session::get('message')}}");
  break;

}

@endif

</script>	



</body>


</html>
