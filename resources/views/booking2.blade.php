<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
          content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    {{--    <title>Register | {{ env('APP_NAME') }}</title>--}}
    {{--    <link rel="apple-touch-icon" href="{{ asset('') }}app-assets/images/ico/apple-icon-120.png">--}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('') }}app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
          rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}app-assets/css/themes/semi-dark-layout.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}app-assets/css/pages/page-auth.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/css/style.css"> -->
    <!-- END: Custom CSS-->
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCkm4blXQtDDwjuBLAr8t1t1YK-Axw9kA0"></script>

</head>
{{--<script>--}}
{{--    alert({{$request}})--}}
{{--</script>--}}
{{--let currentDistrict = "{{$mwApplicantAddress?$mwApplicantAddress->district_id:null}}";--}}
@isset($request)
    <script>
        let transfer = "{{$request->transfer}}"
        let pickup_address = "{{$request->pickup_address}}"
        let drop_off_address = "{{$request->drop_off_address}}"
        let pickup_date = "{{$request->pickup_date}}"
        let no_passengers = "{{$request->no_passengers}}"
        let business_name = "{{$request->business_name}}"
        let name = "{{$request->name}}"
        let mobile = "{{$request->mobile}}"
        let email = "{{$request->email}}"
        let vehicle = "{{$request->vehicle}}"
        let trip_type = "{{$request->trip_type}}"
        let driver_instructions = "{{$request->driver_instructions}}"

        window.open("https://wa.me/+61433765183?text="
            +"Transfers: "+transfer+"%0a"
            +"Pickup Address: "+pickup_address+"%0a"
            +"Drop off Address: " + drop_off_address+"%0a"
            +"Pickup Date: "+pickup_date
            +"No. of Passenger : "+no_passengers+"%0a"
            +"Business Name: "+business_name+"%0a"
            +"Name: "+name+"%0a"
            +"Mobile: "+mobile+"%0a"
            +"Email: "+email+"%0a"
            +"Vehicle: "+vehicle+"%0a"
            +"Trip type: "+trip_type+"%0a"
            +"Driver Instructions: "+driver_instructions+"%0a"
            )
    </script>
@endisset
<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click"
      data-menu="vertical-menu-modern" data-col="blank-page">
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
                    <!-- Brand logo-->
                    <a class="brand-logo" href="{{url('/')}}">
                        <img class="" height="60" src="{{ asset('logo.png') }}" alt="logo">
                        <h4 class="brand-text ml-1" style="color:#4882ca;">Booking Register</h4>
                    </a>
                    <!-- /Brand logo-->
                    <!-- Left Text-->
                    <div class="d-none d-lg-flex col-lg-4 align-items-center p-5" style="background: white">
                        <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img
                                class="img-fluid" src="{{ asset('') }}app-assets/images/pages/booking.png"
                                alt="Register V2"/></div>
                    </div>
                    <!-- /Left Text-->
                    <!-- Register-->
                    <div class="d-flex col-lg-8 align-items-center auth-bg px-2 p-lg-5">
                        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto" style="margin-top: 5px">
                            <h3 class="card-title font-weight-bold mb-1">Welcome to 13cabs2!</h3>
                            <p class="card-text mb-2"></p><br>
                            <form class="auth-register-form mt-2" action="{{ route('booking.store') }}"
                                  method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label" for="transfer">Transfers</label>
                                    <select class="form-control form-control" id="transfer" name="transfer">
                                        <option value="general">General Transfer</option>
                                        <option value="airport">Airport Transfer</option>
                                        <option value="cruise">Cruise Transfer</option>
                                        <option value="racecourse">Racecourse Transfer</option>
                                        <option value="wedding">Wedding Transfer</option>
                                        <option value="birthday">Birthday Transfer</option>
                                        <option value="school">School Transfer</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="name">Pickup Address</label>
                                    <input class="form-control" id="pickup_address" autocomplete="off" type="text" name="pickup_address"
                                           placeholder="Pickup Address"
                                           aria-describedby="name" autofocus="" tabindex="1"/>
                                    <div style="height: auto;max-height: 110px;overflow:hidden; overflow-y:scroll;" id="location_suggestion">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="name">Drop Off Address</label>
                                    <input class="form-control" id="drop_off_address" type="text"
                                           name="drop_off_address" autocomplete="off" placeholder="Drop Off Address"
                                           aria-describedby="name" autofocus="" tabindex="1"/>
                                    <div style="height: auto;max-height: 110px;overflow:hidden; overflow-y:scroll;" id="location_suggestion2">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="name">Pickup Date</label>
                                    <input class="form-control" id="pickup_date" type="datetime-local"
                                           name="pickup_date" placeholder="Drop Off Address"
                                           aria-describedby="name" autofocus="" tabindex="1"/>
                                </div>


                                <div class="form-group">
                                    <label class="form-label" for="area_id">No. of Passengers</label>
                                    <select class="form-control form-control" id="no_passengers" name="no_passengers">
                                        <option value="" selected disabled>Select One</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="business_name">Business Name</label>
                                    <span>(if any)</span>
                                    <input class="form-control" id="business_name" type="text" name="business_name"
                                           placeholder="Business Name"
                                           aria-describedby="name" autofocus="" tabindex="1"/>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="name">Name</label>
                                    <input class="form-control" id="name" type="text" name="name" placeholder="Name"
                                           aria-describedby="name" autofocus="" tabindex="1"/>
                                </div>


                                <div class="form-group">
                                    <label class="form-label" for="email">Email</label>
                                    <input class="form-control" id="email" type="text" name="email"
                                           placeholder="john@example.com" aria-describedby="email" tabindex="2"/>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="mobile">Mobile</label>
                                    <input class="form-control" id="mobile" type="text" name="mobile"
                                           placeholder="Mobile" aria-describedby="mobile" autofocus="" tabindex="1"/>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="area_id">Select Vehicle</label>
                                    <select class="form-control form-control" id="vehicle" name="vehicle">
                                        <option value="" selected disabled>Select One</option>
                                        <option value="Sedan">Sedan</option>
                                        <option value="Luxury">Luxury</option>
                                        <option value="Maxi 7 seat">Maxi 7 seat</option>
                                        <option value="Maxi 11 seat">Maxi 11 seat</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="area_id">Select Trip Type</label>
                                    <select class="form-control form-control" id="trip_type" name="trip_type">
                                        <option value="" selected disabled>Select One</option>
                                        <option value="Sedan">One Way</option>
                                        <option value="Rount Trip">Rount Trip</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="mobile">Driver Instructions</label>
                                    <textarea class="form-control" id="driver_instructions" type="text"
                                              name="driver_instructions"
                                              placeholder="Driver Instructions" aria-describedby="mobile" autofocus=""
                                              tabindex="1">
                                    </textarea>

                                </div>

                                <button class="btn btn-primary btn-block" tabindex="5">Book Now</button>
                            </form>
                           
                        </div>
                    </div>
                    <!-- /Register-->
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
<script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<!-- BEGIN: Page JS-->
<script src="{{ asset('') }}app-assets/js/scripts/pages/page-auth-register.js"></script>
<!-- END: Page JS-->
{!! Toastr::message() !!}
<!-- Google analytics script-->
@include('merchant.partials.message')
<input class="typeahead form-control" id="search" type="text">
<script>
$("#pickup_address").on('keyup',function(){
    let pickup_address=this.value
    if(pickup_address != ''){
        $.ajax(
            {
                type: 'get',
                url: "{{ route('location.suggestion') }}?search="+pickup_address,
                success: function(result){
                    $("#location_suggestion").fadeIn();
                    $("#location_suggestion").html(result)
                }
            }
        )

        $(document).on('click','#location_suggestion li',function(){
            console.log($(this).closest("li"))
            $("#pickup_address").val($(this).text())
            $("#location_suggestion").fadeOut()
        })
    }
    else $("#location_suggestion").html("")


})

$("#drop_off_address").on('keyup',function(){
    let drop_off_address=this.value
    if(drop_off_address != ''){
        $.ajax(
            {
                type: 'get',
                url: "{{ route('location.suggestion2') }}?search="+drop_off_address,
                success: function(result){
                    $("#location_suggestion2").fadeIn();
                    $("#location_suggestion2").html(result)

                }
            }
        )

        $(document).on('click','#location_suggestion li',function(){

            $("#drop_off_address").val($(this).text())
            $("#location_suggestion2").fadeOut()
        })
    }
    else $("#location_suggestion2").html("")


})



    $(window).on('load', function () {
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
