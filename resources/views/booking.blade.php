@extends('front.master')
@section('content')

{{--    @isset($request)--}}
{{--        <script>--}}
{{--            let transfer = "{{$request->transfer}}"--}}
{{--            let pickup_address = "{{$request->pickup_address}}"--}}
{{--            let drop_off_address = "{{$request->drop_off_address}}"--}}
{{--            let pickup_date = "{{$request->pickup_date}}"--}}
{{--            let no_passengers = "{{$request->no_passengers}}"--}}
{{--            let business_name = "{{$request->business_name}}"--}}
{{--            let name = "{{$request->name}}"--}}
{{--            let mobile = "{{$request->mobile}}"--}}
{{--            let email = "{{$request->email}}"--}}
{{--            let vehicle = "{{$request->vehicle}}"--}}
{{--            let trip_type = "{{$request->trip_type}}"--}}
{{--            let driver_instructions = "{{$request->driver_instructions}}"--}}

{{--            window.open("https://wa.me/+61433765183?text="--}}
{{--                +"Transfers: "+transfer+"%0a"--}}
{{--                +"Pickup Address: "+pickup_address+"%0a"--}}
{{--                +"Drop off Address: " + drop_off_address+"%0a"--}}
{{--                +"Pickup Date: "+pickup_date--}}
{{--                +"No. of Passenger : "+no_passengers+"%0a"--}}
{{--                +"Business Name: "+business_name+"%0a"--}}
{{--                +"Name: "+name+"%0a"--}}
{{--                +"Mobile: "+mobile+"%0a"--}}
{{--                +"Email: "+email+"%0a"--}}
{{--                +"Vehicle: "+vehicle+"%0a"--}}
{{--                +"Trip type: "+trip_type+"%0a"--}}
{{--                +"Driver Instructions: "+driver_instructions+"%0a"--}}
{{--            )--}}
{{--        </script>--}}

{{--    @endisset--}}

    <style>
        #b-nav{
            background-color: white!important;
        }
    </style>
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

                        <!-- /Brand logo-->
                        <!-- Left Text-->

                        <!-- /Left Text-->
                        <!-- Register-->
                        <div class="d-flex col-lg-8 align-items-center auth-bg px-2 p-lg-5">

                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto" style="margin-top: 5px">
                                <h2>Booking</h2>
                                <h3 class="card-title font-weight-bold mb-1"></h3>
                                <p class="card-text mb-2"></p>
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

                        <div class="d-lg-flex col-lg-4 align-items-center p-5" style="background: white">
                            <div id="googleMap" style=" width: 64%; height: 353px;margin: 10px auto;">

                            </div>
                            <div id="output" style="text-align: center;font-size: .65em;">

                            </div>
                        </div>
                        <!-- /Register-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Google Maps JavaScript library -->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyCKU7FWs6j3WAGG_y6cG3Pdhw1bi0zocBo"></script>

    <!-- END: Page JS-->
    {!! Toastr::message() !!}
    <!-- Google analytics script-->
    @include('merchant.partials.message')

    <script>
        // $(document).ready(function () {
        //     var autocomplete;
        //     autocomplete = new google.maps.places.Autocomplete((document.getElementById('pickup_address')), {
        //         types: ['geocode'],
        //         /*componentRestrictions: {
        //          country: "USA"
        //         }*/
        //     });
        //
        //     var autocomplete2;
        //     autocomplete = new google.maps.places.Autocomplete((document.getElementById('drop_off_address')), {
        //         types: ['geocode'],
        //         /*componentRestrictions: {
        //          country: "USA"
        //         }*/
        //     });
        //
        //
        // });





        $(window).on('load', function () {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })

        var map = new google.maps.Map(document.getElementById('googleMap'), {
            center: {lat: -33.865143, lng: 151.209900},
            zoom: 10
        });


        var input1 = document.getElementById("pickup_address");
        var autocomplete1 = new google.maps.places.Autocomplete(input1);

        var input2 = document.getElementById("drop_off_address");
        var autocomplete2 = new google.maps.places.Autocomplete(input2);
        var directionsService = new google.maps.DirectionsService();
        var directionsDisplay = new google.maps.DirectionsRenderer({
            map: map
        });
        autocomplete2.addListener('place_changed',function (){
            console.log('place change')

            directionsService.route({
                origin: input1.value,
                destination: input2.value,
                travelMode: 'DRIVING',
                unitSystem: google.maps.UnitSystem.IMPERIAL
            }, function(response, status) {
                if (status === 'OK') {
                    directionsDisplay.setDirections(response);
                } else {
                    directionsDisplay.setDirections({ routes: [] });
                }
            });

        })

    </script>
@endsection
