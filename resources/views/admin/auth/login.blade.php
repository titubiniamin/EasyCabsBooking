<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="Looking for a reliable and affordable easy cabs booking ,taxi cab rental service in Sydney? Look no further! Our professional rental service offers."/>
    <meta name="keywords" content="Easy Cabs Booking, Taxi cab rental, Car rental service, Private transportation, Airport shuttle service, Taxi cab company, Affordable taxi rental, Executive car service, Luxury taxi rental, Chauffeur service,
Reliable taxi rental.">
    <meta name="author" content="Bini Amin Titu">
    <title>Easy Cabs Booking | Rental Service</title>
    <link rel="shortcut icon" href="{{ asset('app-assets/images/ico/favicon-32x32.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('app-assets/images/ico/favicon-32x32.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/semi-dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/bordered-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/page-auth.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v2">
                    <div class="auth-inner row m-0">
                        <div class="d-none d-lg-flex align-items-center p-5 col-lg-8">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="{{ asset('app-assets\images\banner\login.png') }}" alt="Login V2" /></div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Login-->
                        <div class="d-flex align-items-center auth-bg px-2 p-lg-5 col-lg-4">
                            <div class="px-xl-2 mx-auto col-sm-8 col-md-10 col-lg-12">
                                <div class="d-flex justify-content-center">
                                    <a class="" href="{{url('/')}}">
                                        <img style="height:55px;" src="{{ asset('logo.png') }}" />
                                    </a>
                                </div>
                                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                    <h1 class="card-title font-weight-bold mb-1" style="text-align: center;  text-decoration: underline;"><b>Admin Login</b></h1>
                                    <p class="card-text mb-2">Please sign-in to your account and start the adventure</p>
                                    @if ($errors->any())
                                    <div role="alert" aria-live="polite" aria-atomic="true" class="alert alert-primary">
                                        <div class="alert-body font-small-2">
                                            @foreach ($errors->all() as $error)
                                            <p><small class="mr-50">{{ $error }}</small></p>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif

                                    <form class="auth-login-form mt-2" action="{{ route('admin.loginCheck') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-label" for="login-email">Email<span style="color: red;">*</span></label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="mail"></i></span>
                                                </div>
                                                <input type="text" name="email" id="login-email" class="form-control" value="{{ old('email') }}" placeholder="Email" aria-describedby="login-email" autofocus tabindex="1" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex justify-content-between">
                                                <label for="login-password">Password</label><a href="{{route('admin.password.request')}}"><small>Forgot Password?</small></a>
                                            </div>
                                            <div class="input-group input-group-merge form-password-toggle">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i data-feather="lock"></i></span>
                                                </div>
                                                <input type="password" id="login-password" class="form-control form-control-merge" name="password" placeholder="Password" aria-describedby="login-password" tabindex="2" />
                                                <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} tabindex="3" />
                                                <label class="custom-control-label" for="remember"> Remember Me</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-block" tabindex="4">Sign in</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- /Login-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('') }}app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('') }}app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('') }}app-assets/js/core/app-menu.js"></script>
    <script src="{{ asset('') }}app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('') }}app-assets/js/scripts/pages/page-auth-login.js"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>
