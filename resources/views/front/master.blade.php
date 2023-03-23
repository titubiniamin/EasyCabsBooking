<!DOCTYPE html>
<html lang="en">

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
    <!--CDN-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="{{ asset('app-assets/images/ico/favicon-32x32.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('app-assets/images/ico/favicon-32x32.png') }}" type="image/x-icon">
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <!--CSS-->
    <!-- <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="{{asset('front-assets')}}/assets/css/main.css">
    <!--SCRIPT-->
    <script src="{{asset('front-assets')}}/assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-2VBB45VX7M"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-2VBB45VX7M');
    </script>
</head>

<body>
<!--Header-->
<header class="header">
    <nav id="b-nav" class="navbar navbar-expand-md navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img style="height: 50%;width: 55%;display: block" src="{{ asset('logo.png') }}" alt="logo">
            </a>




            {{--            <link rel="shortcut icon" href="{{ asset('app-assets/images/ico/favicon.ico') }}">--}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-open">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2 5.99519C2 5.44556 2.44556 5 2.99519 5H11.0048C11.5544 5 12 5.44556 12 5.99519C12 6.54482 11.5544 6.99039 11.0048 6.99039H2.99519C2.44556 6.99039 2 6.54482 2 5.99519Z"/>
                            <path
                                d="M2 11.9998C2 11.4501 2.44556 11.0046 2.99519 11.0046H21.0048C21.5544 11.0046 22 11.4501 22 11.9998C22 12.5494 21.5544 12.9949 21.0048 12.9949H2.99519C2.44556 12.9949 2 12.5494 2 11.9998Z"/>
                            <path
                                d="M2.99519 17.0096C2.44556 17.0096 2 17.4552 2 18.0048C2 18.5544 2.44556 19 2.99519 19H15.0048C15.5544 19 16 18.5544 16 18.0048C16 17.4552 15.5544 17.0096 15.0048 17.0096H2.99519Z"/>
                        </svg>
                    </span>
                <span class="navbar-toggler-close">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6.22526 4.81108C5.83474 4.42056 5.20158 4.42056 4.81105 4.81108C4.42053 5.20161 4.42053 5.83477 4.81105 6.2253L10.5858 12L4.81111 17.7747C4.42059 18.1652 4.42059 18.7984 4.81111 19.1889C5.20164 19.5794 5.8348 19.5794 6.22532 19.1889L12 13.4142L17.7747 19.1889C18.1652 19.5794 18.7984 19.5794 19.1889 19.1889C19.5794 18.7984 19.5794 18.1652 19.1889 17.7747L13.4142 12L19.1889 6.2253C19.5795 5.83477 19.5795 5.20161 19.1889 4.81108C18.7984 4.42056 18.1653 4.42056 17.7747 4.81108L12 10.5858L6.22526 4.81108Z"/>
                        </svg>
                    </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{Route::currentRouteName() == 'frontend.home' ? 'active':''}}"
                           aria-current="page" href="{{ route('frontend.home') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{Route::currentRouteName() == 'frontend.about' ? 'active':''}}"
                           href="{{ route('frontend.about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Route::currentRouteName() == 'frontend.services' ? 'active':''}}"
                           href="{{ route('frontend.services') }}">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Route::currentRouteName() == 'booking' ? 'active':''}}"
                           href="{{ route('booking') }}">Book Now</a>
                    </li>

                </ul>
                <a href="{{ route('admin.login') }}">
                    <button class="btn btn-primary">Login</button>
                </a>
            </div>
        </div>
    </nav>
</header>
<!--/Header-->
<!--Main-->
@yield('content')
<!--/Main-->
<!--Footer-->
<footer class="footer">
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img height="85" src="{{ asset('logo.png') }}" alt="logo">
                    </a>
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-lg-4">
                            <h3 class="footer-title">Important links</h3>
                            <ul class="nav flex-column footer-menu">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Coverage Area</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Privacy Policy</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Terms & Conditions</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">FAQs</a>
                                </li>

                            </ul>
                        </div>
                        <div class="col-lg-4">
                            <h3 class="footer-title">Contact Us</h3>
                            <ul class="nav flex-column footer-menu">
                                <li class="nav-item">
                                    <p class="nav-link">+61 433765183</p>
                                </li>
                                <li class="nav-item">
                                    <p class="nav-link">info@easycabsbooking.com</p>
                                </li>
                                <li class="nav-item">
                                    <p class="nav-link">Sydney, Australia</p>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4">
                            <h3 class="footer-title">Follow us</h3>
                            <ul class="nav flex-row footer-menu-social">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                            <span class="social-icon">
                                                <img width="10" height="16" src="{{asset('front-assets')}}/assets/img/icon/facebook.svg"
                                                     alt="facebook">
                                            </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                            <span class="social-icon">
                                                <img src="{{asset('front-assets')}}/assets/img/icon/twitter.svg" alt="Twitter">
                                            </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                            <span class="social-icon">
                                                <img width="10" height="16" src="{{asset('front-assets')}}/assets/img/icon/googleplus.svg"
                                                     alt="Google plus">
                                            </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                            <span class="social-icon">
                                                <img width="10" height="16" src="{{asset('front-assets')}}/assets/img/icon/youtube.svg" alt="youtube">
                                            </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <p>Copyright © {{date('Y')}} EasyCabsBooking. All Rights Reserved</p>
        </div>
    </div>
</footer>
<!--/Footer-->
</body>

</html>
