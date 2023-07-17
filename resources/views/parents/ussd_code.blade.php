<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Funzi Wallet</title>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

<link rel="stylesheet" href="{{asset('Backend/plugins/fontawesome-free/css/all.min.css')}}">

<link rel="stylesheet" href="{{asset('Backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">


<link rel="stylesheet" href="{{asset('Backend/plugins/summernote/summernote-bs4.min.css')}}">


<link rel="stylesheet" href="{{asset('Backend/plugins/summernote/summernote-bs4.min.css')}}">


<!-- Toastr -->
<link rel='stylesheet' type="text/css" href=" https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css " >

<!-- Sweetalert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link rel="stylesheet" href="{{asset('Backend/dist/css/adminlte.min2167.css?v=3.2.0')}}">
<script nonce="617296f0-b0ad-4a49-8c36-1832de404220">(function(w,d){!function(a,e,t,r,z){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zarazData.tracks=[],a.zaraz={deferred:[]};var s=e.getElementsByTagName("title")[0];s&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),a.dataLayer=a.dataLayer||[],a.zaraz.track=(e,t)=>{for(key in a.zarazData.tracks.push(e),t)a.zarazData["z_"+key]=t[key]},a.zaraz._preSet=[],a.zaraz.set=(e,t,r)=>{a.zarazData["z_"+e]=t,a.zaraz._preSet.push([e,t,r])},a.dataLayer.push({"zaraz.start":(new Date).getTime()}),a.addEventListener("DOMContentLoaded",(()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r);z.defer=!0,z.src="../../../../cdn-cgi/zaraz/sd0d9.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)}))}(w,d,0,"script");})(window,document);</script></head>
<body class="">
<div class="wrapper">
<br/><br/>

<div class="login-logo">
<img src="{{asset('upload/funzi_wallet.png')}}" width="200" alt="" />
</div>
<div class="col-6 mx-auto">
<div class="card">
<div class="card-body login-card-body">
<p class="login-box-msg"><b>Select MTN or Airtel</b></p>

<div class="card-body">
<div class="row">
<div class="col-md-12 text-center">

<strong> MTN </strong>
            <input type="radio" name="ussd_code" value="mtn_wise" class="search_value"> &nbsp;&nbsp;


            <strong> Airtel </strong>
            <input type="radio" name="ussd_code" value="airtel_wise" class="search_value">



                            </div>
                        </div><!--End of row-->


                            </div>


                            
<!--  /// MTN Wise  -->
    <div class="show_mtn" style="display:none">
        <form method="GET" action="{{ route('mtn.wise.get') }}" id="myForm" >

            <div class="row">
                <div class="col-sm-4 form-group">
                    <label>Enter MTN USSD Code </label>
                    <input type="text" name="mtn_ussd_code"  class="form-control" placeholder="e.g *165#">                
                </div>

                <div class="col-sm-4" style="padding-top: 28px;">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                
            </div>
            
        </form>
        
    </div>
<!--  /// End MTN Wise  -->



<!--  /// Airtel Wise  -->
<div class="show_airtel" style="display:none; ">
<form method="GET" action="{{ route('airtel.wise.get') }}" id="myForm" >

<div class="row">
    <div class="col-sm-4 form-group">
        <label>Enter Airtel USSD Code </label>
        <input type="text" name="airtel_ussd_code"  class="form-control" placeholder="e.g *185#">                
    </div>

    <div class="col-sm-4" style="padding-top: 28px;">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    
</div>

</form>        
    </div>
<!--  /// End Airtel Wise  -->







</div>

</div>
</div>
</div>


<script src="{{asset('Backend/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{asset('Backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('Backend/dist/js/adminlte.min2167.js?v=3.2.0')}}"></script>


<script src="{{asset('Backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>


<script src="{{asset('Backend/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('Backend/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('Backend/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('Backend/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>



<script src="{{asset('Backend/plugins/select2/js/select2.full.min.js')}}"></script>

<script src="{{asset('Backend/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>

<script src="{{asset('Backend/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('Backend/plugins/inputmask/jquery.inputmask.min.js')}}"></script>

<script src="{{asset('Backend/plugins/daterangepicker/daterangepicker.js')}}"></script>

<script src="{{asset('Backend/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>

<script src="{{asset('Backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

<script src="{{asset('Backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>

<script src="{{asset('Backend/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>

<script src="{{asset('Backend/plugins/dropzone/min/dropzone.min.js')}}"></script>

<script src="{{asset('Backend/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('Backend/plugins/jquery-validation/additional-methods.min.js')}}"></script>


<script src="{{asset('Backend/plugins/summernote/summernote-bs4.min.js')}}"></script>


<!--SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


	<!--Toastr -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>	

    
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



<script type="text/javascript">
    $(document).on('change','.search_value', function(){
        var search_value = $(this).val();
        if (search_value == 'mtn_wise') {
            $('.show_mtn').show();
        }else{
            $('.show_mtn').hide();
        }
    }); 
</script>


<script type="text/javascript">
    $(document).on('change','.search_value', function(){
        var search_value = $(this).val();
        if (search_value == 'airtel_wise') {
            $('.show_airtel').show();
        }else{
            $('.show_airtel').hide();
        }
    }); 
</script>




</body>


</html>
