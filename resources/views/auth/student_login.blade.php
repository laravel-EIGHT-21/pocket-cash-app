<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <title>Log In | Funzi Wallet</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('upload/funzi_wallet_logo.png')}}">

		<!-- App css -->
		<link href="{{asset('Students/assets/css/default/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
		<link href="{{asset('Students/assets/css/default/app.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

		<link href="{{asset('Students/assets/css/default/bootstrap-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
		<link href="{{asset('Students/assets/css/default/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

		<!-- icons -->
		<link href="{{asset('Students/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

    </head>

    <body class="loading">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <div class="auth-logo">
                                        
                                            <span class="logo-lg">
                                                <img src="{{asset('upload/funzi_wallet.png')}}" width="330" alt="" height="">
                                            </span>
                                       
                    

                                    </div>
                                    <p class="text-muted mb-4 mt-3"><b>Please log in to your Wallet</b></p>
                                </div>

                                <form method="POST" action="{{ isset($guard) ? url($guard.'/login'): route('login') }}">
                                    @csrf

                                    <div class="mb-2">
                                        <label for="auth" class="form-label">Wallet Code</label>

                                        <input id="auth" type="text" name="auth" :value="old('auth')" class="form-control" placeholder="Enter Your Wallet Code">
 
                                    </div>

                                    <div class="mb-2">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" name="password" class="form-control" id="password"  placeholder="xxxx">
                                            
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkbox-signin" checked>
                                            <label class="form-check-label" for="checkbox-signin">
                                                Remember me
                                            </label>
                                        </div>
                                    </div>

                                    <div class="d-grid mb-0 text-center">
                                        <button class="btn btn-primary" type="submit"> Log In </button>
                                    </div>

                                </form>



                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->



                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt">
            <script>document.write(new Date().getFullYear())</script> &copy; Funzi Wallet theme by <a href="#" class="text-dark">Akilibit</a> 
        </footer>

        <!-- Vendor js -->
        <script src="{{asset('Students/assets/js/vendor.min.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('Students/assets/js/app.min.js')}}"></script>
        
    </body>


</html>