<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head style="overflow-x: hidden !important;">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">--}}
    <link href="{{ url('/css/materialize.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css">
    <link href="{{ url('/css/style.css') }}" rel="stylesheet">
    <link href="{{ url('/css/alerts.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="padding: 0; height: 100%">
        <div class="container" >
            <button class="navbar-toggler" type="button" onclick="switchForCollapsibles('navbarSupportedContent')" style="border: 0; padding: 0; margin-left: 10px" >
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand" href="{{ route('home') }}"  style="padding: 0">
                <img src="{{ url('/images/logo.jpg') }}" height="100%" width="125">
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 10px">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">
                            <span>Your Total Service Provider</span>
                        </a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Zumah News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('help') }}">Help</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)" onclick="showOverlay('loginOverlay')">{{ __('Login') }}</a>
                        </li>
                    @else

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle drop-down-items" href="#" onclick="switchForCollapsibles('aut-drop-down')">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div id="aut-drop-down" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item drop-down-items" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4" style="padding-bottom: 0 !important; padding-top: 5px !important;">
        <div class="container-fluid" style="margin-left: 0">
            <div class="row">
                <div class="col-md-2" style="padding-left: 0">
                    <div id="service-provider-side-bar" class="hide-on-med-and-down" style="">
                        <ul>
                            <li class="" style="padding: 15px 15px 10px 17px;margin: 0px; text-align: center; font-weight: bold">
                                <img src="{{ url('/images/logo.jpg') }}" id="sp-business-logo" height="70px" width="70px" style="border-radius: 50%">
                                <h6 style="font-weight: bold" id="business-name"></h6>
                                <h6>{{ \Illuminate\Support\Facades\Auth::user()->name }}</h6>
                            </li>

                            <li class="divider" style="margin-bottom: 10px;"></li>

                            <a class="side-bar-link" href="/profile">
                                <li class="" style="padding: 10px 15px; border-radius: 0px 40px 40px 0px; text-decoration: none; font-weight: 300; background-color: #000; color: #fff">
                                    All Details
                                </li>
                            </a>

                            <a class="side-bar-link" href="/profile/gbi">
                                <li class="" style="padding: 10px 15px; border-radius: 0px 40px 40px 0px; text-decoration: none; font-weight: 300;">
                                    Gen. Business Info.(GBI)
                                </li>
                            </a>

                            <a class="side-bar-link" href="/profile/smp">
                                <li class="mysidenav" style="padding: 10px 15px; border-radius: 0px 40px 40px 0px; text-decoration: none; font-weight: 300;">
                                    Social Media Pr. (SMP)
                                </li>
                            </a>
                            <a class="side-bar-link" href="/profile/services">
                                <li class="mysidenav" style="padding: 10px 15px; border-radius: 0px 40px 40px 0px; text-decoration: none; font-weight: 300;">
                                    Services
                                </li>
                            </a>
                            <li class="divider" style="margin: 5px 0px;"></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-10">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>

    <div id="alerts-container" style="position: fixed; height: auto; top: 0; width: 300px; right: 5px; z-index: 1000;">

    </div>
    <input type="text" id="service-url-to-copy-container" class="text-to-copy-container">
    <div id="customConfirmBox" class="new-custom-alert" style="width: 100%; display: none">
        <span class="closebtn" onclick="closeConfirm()">&times;</span>
        <strong id="confirm-title">Title</strong>
        <br>
        <span id="confirm-message">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur</span>
        <br>
        <br>
        <div style="text-align: center">
            <a href="javascript:void(0)" id="confirm-positive" class="btn confirm-positive white-text black" data-status="1" data-for="" data-id="" onclick="confirmResponse(this)" style="font-weight: bolder;">
                accept
            </a>
            <a href="javascript:void(0)" id="confirm-negative" class="btn confirm-negative black-text white" data-status="0" data-for="" data-id="" onclick="closeConfirm()" style="font-weight: bolder;">
                decline
            </a>
        </div>
    </div>

    <span id="data-store" data-confirm="" data-for-0="" data-for-1="" data-for-2="" data-for-3="" data-for-4="" data-for-5="" style="display: none"></span>

    <footer class="page-footer grey darken-1">
        <div class="container">
            <div class="row fixsidenav">
                <div class="col-sm-12 col-lg-4 col-md-10">
                    <h5 class="white-text">Zumah Company Limited</h5>
                    <p class="grey-text text-lighten-4">Zumah is a total services hub, connecting all service providers to their respective clients. All services can be found on the platform, from programming to carpentry.The platform works per your given location. Zumah helps you develop your services via AD campaigns and targeted marketing techniques, reaching enough people as possible.</p>
                </div>
                <div class="col-sm-12 col-sm-6 col-lg-4"><h5 class="white-text">Services</h5> <div class="row"><div class="col-sm-6"><ul class="footer-links-list"><li><a href="#!" class="grey-text text-lighten-3">Security</a></li> <li><a href="#!" class="grey-text text-lighten-3">Fashion &amp; Beauty</a></li> <li><a href="#!" class="grey-text text-lighten-3">Housing</a></li> <li><a href="#!" class="grey-text text-lighten-3">Education</a></li> <li><a href="#!" class="grey-text text-lighten-3">Sports</a></li> <li><a href="#!" class="grey-text text-lighten-3">Events</a></li> <li><a href="#!" class="grey-text text-lighten-3">Documentation</a></li> <li><a href="#!" class="grey-text text-lighten-3">Logistics</a></li></ul></div> <div class="col-sm-6"><ul class="footer-links-list"><li><a href="#!" class="grey-text text-lighten-3">Finance</a></li> <li><a href="#!" class="grey-text text-lighten-3">Hospitality</a></li> <li><a href="#!" class="grey-text text-lighten-3">Info. Technology (IT)</a></li> <li><a href="#!" class="grey-text text-lighten-3">Building &amp; Engineering</a></li> <li><a href="#!" class="grey-text text-lighten-3">Entertainment &amp; Media</a></li> <li><a href="#!" class="grey-text text-lighten-3">General Business</a></li> <li><a href="#!" class="grey-text text-lighten-3">Agriculture</a></li> <li><a href="#!" class="grey-text text-lighten-3">Hand Work</a></li></ul></div></div></div>

                <div class="col-sm-12 col-md-6 col-lg-2">
                    <h5 class="white-text">Quick Links</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="/about">About</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Events</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Jobs</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Contact</a></li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-2"><h5 class="white-text">Contact</h5> <ul class="footer-links-list"><li><a href="#!" class="grey-text text-lighten-3">zumah.net@gmail.com / vortexxmarketing@gmail.com<br> <strong>Address:</strong> Post Office Box AN 19652 Madina, Beside Ecobank, Market</a></li></ul></div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p style="display: inline; float: left; margin: 0">© 2019 Copyright Zumah</p>
                        <p style="display: inline; float: right; margin: 0">
                            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
</body>
<!-- Scripts -->
<script src="{{ url('/js/custom_sidebar.js') }}" defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.js"></script>
<script src="{{ url('/js/script.js') }}" defer></script>
<script src="{{ url('/js/messages.js') }}" defer></script>
<script>
    $(document).ready(function(){
        $('select').formSelect();
    });

    function checkServiceProviderUrlText(text){
        var icon = document.createElement("i");
        icon.setAttribute("class", "fas fa-spinner fa-spin sp-url-icon-indicators");
        document.getElementById('sp-url-process-indicator-holder').innerHTML = "";
        document.getElementById('sp-url-process-indicator-holder').appendChild(icon);

        $.ajax({
            type: "GET",
            url: "{{ url('/check-service-provider-custom-url-text') }}",
            data: {"custom-text": text},

            success:function(result){
                if (result.status === 200){
                    icon.setAttribute("class", "fas fa-check sp-url-icon-indicators");
                    document.getElementById('sp-url-process-indicator-holder').innerHTML = "";
                    document.getElementById('sp-url-process-indicator-holder').appendChild(icon);
                } else {
                    icon.setAttribute("class", "fas fa-times sp-url-icon-indicators");
                    document.getElementById('sp-url-process-indicator-holder').innerHTML = "";
                    document.getElementById('sp-url-process-indicator-holder').appendChild(icon);
                }
            }
        })
    }

    function setServiceProviderUrlText(text){
        var icon = document.createElement("i");
        $.ajax({
            type: "GET",
            url: "{{ url('/set-service-provider-custom-url-text') }}",

            success:function(result){
                if (result.status === 200){
                    icon.setAttribute("class", "fas fa-check sp-url-icon-indicators fa-check-success");
                    document.getElementById('sp-url-process-indicator-holder').innerHTML = "";
                    document.getElementById('sp-url-process-indicator-holder').appendChild(icon);
                    
                    setTimeout(function () {
                        document.getElementById('sp-url-process-indicator-holder').innerHTML = "";
                    }, 3000)
                } else {
                    icon.setAttribute("class", "fas fa-times sp-url-icon-indicators");
                    document.getElementById('sp-url-process-indicator-holder').innerHTML = "";
                    document.getElementById('sp-url-process-indicator-holder').appendChild(icon);
                }
            }
        })
    }

    function getServiceProviderData() {
        $.ajax({
            type: "GET",
            url: "{{ url('/get-service-provider-data') }}",

            success:function(result){
                for (var iterator = 0; iterator < result["spData"].length; iterator++){
                    document.getElementById("provider-custom-text-for-url").value = result["spData"][0]["sp_custom_profile_text"];
                    document.getElementById("gbi-business-website-url").value = result["spData"][0]["business_website"];
                    document.getElementById("gbi-business-address").value = result["spData"][0]["business_address"];
                    document.getElementById("gbi-business-description").value = result["spData"][0]["business_desc"];
                    document.getElementById("gbi-business-goals").value = result["spData"][0]["business_goals"];
                    document.getElementById("business-name").innerHTML = result["spData"][0]["business_name"];
                    document.getElementById("gbi-company-name").value = result["spData"][0]["business_name"];

                    document.getElementById("gbi-regions").value = result["spData"][0]["region"];
                    getRegionCities(result["spData"][0]["region"], "gbi-cities");
//                    document.getElementById("gbi-cities").value = result["spData"][0]["city"];

                    if (result["spData"][0]["business_registered"] === 1){
                        document.getElementById("gbi-business-registered").setAttribute("checked", "");
                        document.getElementById("gbi-business-reg-no").removeAttribute("disabled");
                        document.getElementById("gbi-tin-number").removeAttribute("disabled");
                    }else {
                        document.getElementById("gbi-business-registered").removeAttribute("checked");
                        document.getElementById("gbi-business-reg-no").setAttribute("disabled", "");
                        document.getElementById("gbi-tin-number").setAttribute("disabled", "");
                    }
                }

                document.getElementById('gbi-image-preview').innerHTML = '<img src="{{ url('/storage/') }}/providers/logos/'+result["logo"]+'" style="width: 100%"/>';
                document.getElementById('sp-business-logo').setAttribute("src", "{{ url('/storage/providers/logos/') }}/"+result["logo"]);

                for (iterator = 0; iterator < result["userData"].length; iterator++){
                    document.getElementById("gbi-phone").value = result["userData"][0]["phone"];
                    document.getElementById("gbi-email").value = result["userData"][0]["email"];
                }

                for (iterator = 0; iterator < result["spSmp"].length; iterator++){
                    switch (result["spSmp"][iterator].social_media){
                        case "facebook":
                            document.getElementById("smp-facebook").value = result["spSmp"][iterator].username;
                            document.getElementById("smp-facebook-vibrancy").value = result["spSmp"][iterator].vibrancy;
                            break;
                        case "twitter":
                            document.getElementById("smp-twitter").value = result["spSmp"][iterator].username;
                            document.getElementById("smp-twitter-vibrancy").value = result["spSmp"][iterator].vibrancy;
                            break;
                        case "instagram":
                            document.getElementById("smp-instagram").value = result["spSmp"][iterator].username;
                            document.getElementById("smp-instagram-vibrancy").value = result["spSmp"][iterator].vibrancy;
                            break;
                        case "linkedin":
                            document.getElementById("smp-linkedin").value = result["spSmp"][iterator].username;
                            document.getElementById("smp-linkedin-vibrancy").value = result["spSmp"][iterator].vibrancy;
                            break;
                        case "whatsapp":
                            document.getElementById("smp-whatsapp").value = result["spSmp"][iterator].username;
                            document.getElementById("smp-whatsapp-vibrancy").value = result["spSmp"][iterator].vibrancy;
                            break;
                        case "google-plus":
                            document.getElementById("smp-google-plus").value = result["spSmp"][iterator].username;
                            document.getElementById("smp-google-plus-vibrancy").value = result["spSmp"][iterator].vibrancy;
                            break;
                    }
                }
            }
        })
    }

    function getRegionCities(region, citySelectId){
        $.ajax({
            type: "GET",
            url: "{{ url('/get-region-cities') }}",
            data: {"region": region},

            success:function (result) {
                setRegionCities(result.cities, citySelectId);
            }
        })
    }
    function setRegionCities(cities, citySelectId){
        var citySelect = document.getElementById(citySelectId);
        for (var iterator = 0; iterator < cities.length; iterator++){
            var option = document.createElement("OPTION");
            option.value = cities[iterator].city;
            option.innerHTML = cities[iterator].city;
            option.style.color = "#000";
            citySelect.appendChild(option);
        }
    }

    function createService(){
        if(document.getElementById("new-service-gbi-sp-phone").value.length === 0){
            alert("Phone number required")
        } else {
            //        SERVICE INFORMATION
            var serviceTypeClass = document.getElementsByClassName("new-service-type");
            var serviceType = "";

            if (serviceTypeClass[0].selected)
                serviceType = "Full Time";
            else if (serviceTypeClass[1].selected)
                serviceType = "Contract";
            else if(serviceTypeClass[0].selected === false && serviceTypeClass[0].selected === false)
                serviceType = "";

            var serviceCategory = document.getElementById("new-service-category").value;
            var serviceName = document.getElementById("new-service-name").value;
            var serviceCountry = document.getElementById("new-service-country").value;
            var serviceRegion = document.getElementById("new-service-regions").value;
            var serviceCity = document.getElementById("new-service-city").value;

            var workingDaysCheckBoxes = document.getElementsByName("new-service-working-days");
            var workingDays = [];

            for (var iterator = 0; iterator < workingDaysCheckBoxes.length; iterator++)
                workingDays[iterator] = workingDaysCheckBoxes[iterator].checked

            var serviceWorkingHoursStart = document.getElementById("new-service-working-hours-start").value;
            var serviceWorkingHoursEnd = document.getElementById("new-service-working-hours-end").value;

            var serviceDescription = document.getElementById("new-service-description").value;

            var startPrice = document.getElementById("new-service-start-price").value;

            var priceNegotiable = document.getElementById("new-service-price-negotiable").checked;

            var servicePricingInfo = document.getElementById("new-service-pricing-info").value;

            var serviceProviderExperience = document.getElementById("new-service-provider-experience").value;

            var serviceProviderClientele = document.getElementById("new-service-provider-clientele").value;

            var serviceProviderQualification = document.getElementById("new-service-provider-qualification").value;

            //        GENERAL BUSINESS INFORMATION
            var newServicePhone = document.getElementById("new-service-gbi-sp-phone").value;
            var newServiceBusinessName = document.getElementById("new-service-gbi-business-name").value;
            var newServiceUrl = document.getElementById("new-service-gbi-business-website-url").value;
            var newServiceEmail = document.getElementById("new-service-gbi-sp-email").value;
            var newServiceAddress = document.getElementById("new-service-gbi-business-address").value;
            var newServiceBusinessDesc = document.getElementById("new-service-gbi-business-description").value;
            var newServiceBusinessGoals = document.getElementById("new-service-gbi-business-goals").value;
            var newServiceBusinessRegistered = document.getElementById("new-service-gbi-business-registered").checked;
            var newServiceBusinessRegistrationNum = document.getElementById("new-service-gbi-business-reg-no").value;
            var newServiceBusinessTinNum = document.getElementById("new-service-gbi-tin-number").value;
            var newServiceFacebook = document.getElementById("new-service-smp-facebook").value;
            var newServiceTwitter = document.getElementById("new-service-smp-twitter").value;
            var newServiceInstagram = document.getElementById("new-service-smp-instagram").value;
            var newServiceLinkdin = document.getElementById("new-service-smp-linkedin").value;
            var newServiceWhatsapp = document.getElementById("new-service-smp-whatsapp").value;
            var newServiceGooglePlus = document.getElementById("new-service-smp-google-plus").value;
            //---------------------
            var newServiceFacebookVibrancy = document.getElementById("new-service-smp-facebook-vibrancy").value;
            var newServiceTwitterVibrancy = document.getElementById("new-service-smp-twitter-vibrancy").value;
            var newServiceInstagramVibrancy = document.getElementById("new-service-smp-instagram-vibrancy").value;
            var newServiceLinkdinVibrancy = document.getElementById("new-service-smp-linkedin-vibrancy").value;
            var newServiceWhatsappVibrancy = document.getElementById("new-service-smp-whatsapp-vibrancy").value;
            var newServiceGooglePlusVibrancy = document.getElementById("new-service-smp-google-plus-vibrancy").value;

            console.log(workingDays);
            $.ajax({
                type: 'GET',
                url: "{{ url('/create-service') }}",
                data: {
                    "service-type": serviceType,
                    "service-category": serviceCategory,
                    "service-name": serviceName,
                    "service-country": serviceCountry,
                    "service-region": serviceRegion,
                    "service-city": serviceCity,
                    "service-working-days": workingDays,
                    "service-working-hours-start": serviceWorkingHoursStart,
                    "service-working-hours-end": serviceWorkingHoursEnd,
                    "service-description": serviceDescription,
                    "service-start-price": startPrice,
                    "price-negotiable": priceNegotiable,
                    "service-pricing-info": servicePricingInfo,
                    "service-provider-experience": serviceProviderExperience,
                    "service-provider-clientele": serviceProviderClientele,
                    "service-provider-qualification": serviceProviderQualification,
//----------------------------------------------------------------------------------
                    "new-service-gbi-sp-phone": newServicePhone,
                    "new-service-gbi-business-name": newServiceBusinessName,
                    "new-service-gbi-business-website-url": newServiceUrl,
                    "new-service-gbi-sp-email": newServiceEmail,
                    "new-service-gbi-business-address": newServiceAddress,
                    "new-service-gbi-business-description": newServiceBusinessDesc,
                    "new-service-gbi-business-goals": newServiceBusinessGoals,
                    "new-service-gbi-business-registered": newServiceBusinessRegistered,
                    "new-service-gbi-business-reg-no": newServiceBusinessRegistrationNum,
                    "new-service-gbi-tin-number": newServiceBusinessTinNum,
                    "new-service-smp-facebook-name": newServiceFacebook,
                    "new-service-smp-twitter-handle": newServiceTwitter,
                    "new-service-smp-instagram-handle": newServiceInstagram,
                    "new-service-smp-linkdin-name": newServiceLinkdin,
                    "new-service-smp-google-plus-name": newServiceGooglePlus,
                    "new-service-smp-whatsapp-number": newServiceWhatsapp,
                    "new-service-smp-facebook-vibrancy": newServiceFacebookVibrancy,
                    "new-service-smp-twitter-vibrancy": newServiceTwitterVibrancy,
                    "new-service-smp-linkdin-vibrancy": newServiceLinkdinVibrancy,
                    "new-service-smp-instagram-vibrancy": newServiceInstagramVibrancy,
                    "new-service-smp-google-plus-vibrancy": newServiceGooglePlusVibrancy,
                    "new-service-smp-whatsapp-vibrancy": newServiceWhatsappVibrancy
                },

                success:function(result) {
                    if (result.status === 200)
                        alert("Service Posted Successfully");
                    else
                        alert("Service not posted");
                }
            })
        }
    }

    function useSpGbiSmpForNewService(){
        var useCheckBoxStatus = document.getElementById("use-gbi-for-new-service").checked;
        if (useCheckBoxStatus === true){
            $.ajax({
                type: "GET",
                url: "{{ url('/get-service-provider-data') }}",

                success:function(result){
                    console.log(result);
                    for (var iterator = 0; iterator < result["spData"].length; iterator++){
                        document.getElementById("new-service-gbi-business-website-url").value = result["spData"][0]["business_website"];
                        document.getElementById("new-service-gbi-business-address").value = result["spData"][0]["business_address"];
                        document.getElementById("new-service-gbi-business-description").value = result["spData"][0]["business_desc"];
                        document.getElementById("new-service-gbi-business-goals").value = result["spData"][0]["business_goals"];
                        document.getElementById("new-service-gbi-business-name").value = result["spData"][0]["business_name"];

                        if (result["spData"][0]["business_registered"] === 1){
                            document.getElementById("new-service-gbi-business-registered").setAttribute("checked", "");
                            document.getElementById("new-service-gbi-business-reg-no").removeAttribute("disabled");
                            document.getElementById("new-service-gbi-tin-number").removeAttribute("disabled");
                        }else if(result["spData"][0]["business_registered"] === 0){
                            document.getElementById("new-service-gbi-business-registered").removeAttribute("checked");
                            document.getElementById("new-service-gbi-business-reg-no").setAttribute("disabled", "");
                            document.getElementById("new-service-gbi-tin-number").setAttribute("disabled", "");
                        }
                    }

                    for (iterator = 0; iterator < result["userData"].length; iterator++){
                        document.getElementById("new-service-gbi-sp-phone").value = result["userData"][iterator].phone;
                        document.getElementById("new-service-gbi-sp-email").value = result["userData"][iterator].email;
                    }

                    for (iterator = 0; iterator < result["spSmp"].length; iterator++){
                        switch (result["spSmp"][iterator].social_media){
                            case "facebook":
                                document.getElementById("new-service-smp-facebook").value = result["spSmp"][iterator].username;
                                document.getElementById("new-service-smp-facebook-vibrancy").value = result["spSmp"][iterator].vibrancy;
                                break;
                            case "twitter":
                                document.getElementById("new-service-smp-twitter").value = result["spSmp"][iterator].username;
                                document.getElementById("new-service-smp-twitter-vibrancy").value = result["spSmp"][iterator].vibrancy;
                                break;
                            case "instagram":
                                document.getElementById("new-service-smp-instagram").value = result["spSmp"][iterator].username;
                                document.getElementById("new-service-smp-instagram-vibrancy").value = result["spSmp"][iterator].vibrancy;

                                break;
                            case "linkedin":
                                document.getElementById("new-service-smp-linkedin").value = result["spSmp"][iterator].username;
                                document.getElementById("new-service-smp-linkedin-vibrancy").value = result["spSmp"][iterator].vibrancy;
                                break;
                            case "whatsapp":
                                document.getElementById("new-service-smp-whatsapp").value = result["spSmp"][iterator].username;
                                document.getElementById("new-service-smp-whatsapp-vibrancy").value = result["spSmp"][iterator].vibrancy;
                                break;
                            case "google-plus":
                                document.getElementById("new-service-smp-google-plus").value = result["spSmp"][iterator].username;
                                document.getElementById("new-service-smp-google-plus-vibrancy").value = result["spSmp"][iterator].vibrancy;
                                break;
                        }
                    }

                }
            });
        } else{

        }
    }

    function getServiceToEditData(serviceId){
        $.ajax({
            type: "GET",
            url: "{{ url('/get-service-to-edit-data') }}",
            data: {"serviceId": serviceId},

            success:function(result) {
                console.log(result);
                for (var iterator = 0; iterator < result.serviceData.length; iterator++){
                    document.getElementById("edit-service-category").value = result.serviceData[0].category;
                    document.getElementById("edit-service-name").value = result.serviceData[0].name;

                    if (result.serviceData[0].type === "Full Time")
                        document.getElementById("edit-service-full-time").checked = true;
                    else
                        document.getElementById("edit-service-contract").checked = true;

                    document.getElementById("edit-service-country").value = result.serviceData[0].country;

                    document.getElementById("edit-service-regions").value = result.serviceData[0].region;

//                    document.getElementById("edit-service-cities").value = result.serviceData[0].city;

                    document.getElementById("edit-service-working-hours-start").value = result.serviceData[0].working_hours_start;

                    document.getElementById("edit-service-working-hours-end").value = result.serviceData[0].working_hours_end;

                    var editServiceWorkingDays = document.getElementsByClassName("edit-service-working-days");

                    for (var innerIterator = 0; innerIterator < editServiceWorkingDays.length; innerIterator++){
                        switch (innerIterator){
                            case 0:
                                editServiceWorkingDays[innerIterator].checked = result["serviceWorkingDays"][0].sunday === 1;
                                break;
                            case 1:
                                editServiceWorkingDays[innerIterator].checked = result["serviceWorkingDays"][0].monday === 1;
                                break;
                            case 2:
                                editServiceWorkingDays[innerIterator].checked = result["serviceWorkingDays"][0].tuesday === 1;
                                break;
                            case 3:
                                editServiceWorkingDays[innerIterator].checked = result["serviceWorkingDays"][0].wednesday === 1;
                                break;
                            case 4:
                                editServiceWorkingDays[innerIterator].checked = result["serviceWorkingDays"][0].thursday === 1;
                                break;
                            case 5:
                                editServiceWorkingDays[innerIterator].checked = result["serviceWorkingDays"][0].friday === 1;
                                break;
                            case 6:
                                editServiceWorkingDays[innerIterator].checked = result["serviceWorkingDays"][0].saturday === 1;
                                break;
                        }
                    }

                    var imageCounter = 0;
                    for (imageCounter = 0; imageCounter < 5; imageCounter++){
                        document.getElementById("edit-service-image-preview-"+imageCounter).innerHTML = "";
                    }

                    imageCounter = 0;
                    for (innerIterator = 0; innerIterator < result["serviceImages"].length; innerIterator++) {
                        var image;
                        var deleteIconHolder;
                        if (result['serviceImages'][innerIterator]["image_name_" + imageCounter]){
                            image = document.createElement("IMG");
                            image.src = "{{ url('/storage/service_images/') }}/" + result['serviceImages'][innerIterator]["image_name_" + imageCounter];
                            image.style.height = "-webkit-fill-available";
                            image.style.width = "100%";
//                            document.getElementById("edit-service-image-"+imageCounter).value = result['serviceImages'][innerIterator]["image_name_" + imageCounter];
                            document.getElementById("edit-service-image-preview-" + imageCounter).innerHTML = "";
                            document.getElementById("edit-service-image-preview-" + imageCounter).appendChild(image);
                            deleteIconHolder = document.getElementById("edit-service-image-delete-" + imageCounter);

                            deleteIconHolder.setAttribute("data-image-column", "image_name_0");
                            deleteIconHolder.setAttribute("data-image-row-id", result["serviceImages"][innerIterator].id);
                            deleteIconHolder.setAttribute("onclick", "setImageToDeleteColName(this.getAttribute('data-image-column'), this.getAttribute('data-image-row-id'))");
                            imageCounter++;
                        }
                        if (result['serviceImages'][innerIterator]["image_name_" + imageCounter]){
                            image = document.createElement("IMG");
                            image.src = "{{ url('/storage/service_images/') }}/" + result['serviceImages'][innerIterator]["image_name_" + imageCounter];
                            image.style.height = "-webkit-fill-available";
                            image.style.width = "100%";
//                            document.getElementById("edit-service-image-"+imageCounter).value = result['serviceImages'][innerIterator]["image_name_" + imageCounter];
                            document.getElementById("edit-service-image-preview-" + imageCounter).innerHTML = "";
                            document.getElementById("edit-service-image-preview-" + imageCounter).appendChild(image);
                            deleteIconHolder = document.getElementById("edit-service-image-delete-" + imageCounter);
                            deleteIconHolder.setAttribute("data-image-column", "image_name_1");
                            deleteIconHolder.setAttribute("data-image-row-id", result["serviceImages"][innerIterator].id);
                            deleteIconHolder.setAttribute("onclick", "setImageToDeleteColName(this.getAttribute('data-image-column'), this.getAttribute('data-image-row-id'))");
                            imageCounter++;
                        }
                        if (result['serviceImages'][innerIterator]["image_name_" + imageCounter]){
                            image = document.createElement("IMG");
                            image.src = "{{ url('/storage/service_images/') }}/" + result['serviceImages'][innerIterator]["image_name_" + imageCounter];
                            image.style.height = "-webkit-fill-available";
                            image.style.width = "100%";
//                            document.getElementById("edit-service-image-"+imageCounter).value = result['serviceImages'][innerIterator]["image_name_" + imageCounter];
                            document.getElementById("edit-service-image-preview-" + imageCounter).innerHTML = "";
                            document.getElementById("edit-service-image-preview-" + imageCounter).appendChild(image);
                            deleteIconHolder = document.getElementById("edit-service-image-delete-" + imageCounter);

                            deleteIconHolder.setAttribute("data-image-column", "image_name_2");
                            deleteIconHolder.setAttribute("data-image-row-id", result["serviceImages"][innerIterator].id);
                            deleteIconHolder.setAttribute("onclick", "setImageToDeleteColName(this.getAttribute('data-image-column'), this.getAttribute('data-image-row-id'))");
                            imageCounter++;
                        }
                        if (result['serviceImages'][innerIterator]["image_name_" + imageCounter]){
                            image = document.createElement("IMG");
                            image.src = "{{ url('/storage/service_images/') }}/" + result['serviceImages'][innerIterator]["image_name_" + imageCounter];
                            image.style.height = "-webkit-fill-available";
                            image.style.width = "100%";
//                            document.getElementById("edit-service-image-"+imageCounter).value = result['serviceImages'][innerIterator]["image_name_" + imageCounter];
                            document.getElementById("edit-service-image-preview-" + imageCounter).innerHTML = "";
                            document.getElementById("edit-service-image-preview-" + imageCounter).appendChild(image);
                            deleteIconHolder = document.getElementById("edit-service-image-delete-" + imageCounter);

                            deleteIconHolder.setAttribute("data-image-column", "image_name_3");
                            deleteIconHolder.setAttribute("data-image-row-id", result["serviceImages"][innerIterator].id);
                            deleteIconHolder.setAttribute("onclick", "setImageToDeleteColName(this.getAttribute('data-image-column'), this.getAttribute('data-image-row-id'))");
                            imageCounter++;
                        }
                        if (result['serviceImages'][innerIterator]["image_name_" + imageCounter]){
                            image = document.createElement("IMG");
                            image.src = "{{ url('/storage/service_images/') }}/" + result['serviceImages'][innerIterator]["image_name_" + imageCounter];
                            image.style.height = "-webkit-fill-available";
                            image.style.width = "100%";
//                            document.getElementById("edit-service-image-"+imageCounter).name = result['serviceImages'][innerIterator]["image_name_" + imageCounter];
                            document.getElementById("edit-service-image-preview-" + imageCounter).innerHTML = "";
                            document.getElementById("edit-service-image-preview-" + imageCounter).appendChild(image);
                            deleteIconHolder = document.getElementById("edit-service-image-delete-" + imageCounter);

                            deleteIconHolder.setAttribute("data-image-column", "image_name_4");
                            deleteIconHolder.setAttribute("data-image-row-id", result["serviceImages"][innerIterator].id);
                            deleteIconHolder.setAttribute("onclick", "setImageToDeleteColName(this.getAttribute('data-image-column'), this.getAttribute('data-image-row-id'))");
                            imageCounter++;
                        }
                    }

                    for (innerIterator = 0; innerIterator < result["serviceGbi"].length; innerIterator++){
                        document.getElementById("edit-service-gbi-business-name").value = result["serviceGbi"][innerIterator].company_name;
                        document.getElementById("edit-service-gbi-sp-phone").value = result["serviceGbi"][innerIterator].phone;
                        document.getElementById("edit-service-gbi-business-website-url").value = result["serviceGbi"][innerIterator].business_website;
                        document.getElementById("edit-service-gbi-sp-email").value = result["serviceGbi"][innerIterator].business_email;
                        document.getElementById("edit-service-gbi-business-address").value = result["serviceGbi"][innerIterator].business_address;
                        document.getElementById("edit-service-gbi-business-description").value = result["serviceGbi"][innerIterator].business_desc;
                        document.getElementById("edit-service-gbi-business-goals").value = result["serviceGbi"][innerIterator].business_goals;

                        if (result["serviceGbi"][innerIterator].business_registered === 1) {
                            document.getElementById("edit-service-gbi-business-registered").checked = true;
                            document.getElementById("edit-service-gbi-business-reg-number").value = result["serviceGbi"][innerIterator].registration_num;
                            document.getElementById("edit-service-gbi-tin-number").value = result["serviceGbi"][innerIterator].tin_num;
                        }
                        else
                            document.getElementById("edit-service-gbi-business-registered").checked = false;
                    }

                    for (innerIterator = 0; innerIterator < result["serviceSmp"].length; innerIterator++){
                        if (result["serviceSmp"][innerIterator].social_media === "facebook") {
                            document.getElementById("edit-service-smp-facebook").value = result["serviceSmp"][innerIterator].username;
                            document.getElementById("edit-service-smp-facebook-vibrancy").value = result["serviceSmp"][innerIterator].vibrancy;
                        }

                        if (result["serviceSmp"][innerIterator].social_media === "twitter") {
                            document.getElementById("edit-service-smp-twitter").value = result["serviceSmp"][innerIterator].username;
                            document.getElementById("edit-service-smp-twitter-vibrancy").value = result["serviceSmp"][innerIterator].vibrancy;
                        }

                        if (result["serviceSmp"][innerIterator].social_media === "instagram") {
                            document.getElementById("edit-service-smp-instagram").value = result["serviceSmp"][innerIterator].username;
                            document.getElementById("edit-service-smp-instagram-vibrancy").value = result["serviceSmp"][innerIterator].vibrancy;
                        }

                        if (result["serviceSmp"][innerIterator].social_media === "whatsapp") {
                            document.getElementById("edit-service-smp-whatsapp").value = result["serviceSmp"][innerIterator].username;
                            document.getElementById("edit-service-smp-whatsapp-vibrancy").value = result["serviceSmp"][innerIterator].vibrancy;
                        }

                        if (result["serviceSmp"][innerIterator].social_media === "google-plus") {
                            document.getElementById("edit-service-smp-google-plus").value = result["serviceSmp"][innerIterator].username;
                            document.getElementById("edit-service-smp-google-plus-vibrancy").value = result["serviceSmp"][innerIterator].vibrancy;
                        }

                        if (result["serviceSmp"][innerIterator].social_media === "linkedin") {
                            document.getElementById("edit-service-smp-linkedin").value = result["serviceSmp"][innerIterator].username;
                            document.getElementById("edit-service-smp-linkedin-vibrancy").value = result["serviceSmp"][innerIterator].vibrancy;
                        }
//                        document.getElementById("edit-service-gbi-business-address").value = result["serviceGbi"][innerIterator].business_address;
//                        document.getElementById("edit-service-gbi-business-address").value = result["serviceGbi"][innerIterator].business_address;
//                        document.getElementById("edit-service-gbi-business-address").value = result["serviceGbi"][innerIterator].business_address;
//                        document.getElementById("edit-service-gbi-business-address").value = result["serviceGbi"][innerIterator].business_address;
//                        document.getElementById("edit-service-gbi-business-address").value = result["serviceGbi"][innerIterator].business_address;
                    }

                    var serviceCitiesSelect = document.getElementById("edit-service-cities");
                    for (innerIterator = 0; innerIterator < result["serviceCities"].length; innerIterator++){
                        var option = document.createElement("OPTION");
                        option.innerHTML = result["serviceCities"][innerIterator].city;
                        option.value = result["serviceCities"][innerIterator].city;
                        if (result["serviceData"][0].city == result["serviceCities"][innerIterator].city) {
                            option.selected = result["serviceCities"][innerIterator].city;
                        }
                        serviceCitiesSelect.appendChild(option);
                    }
//                    serviceCitiesSelect.value = result.serviceData[0].city;

                    document.getElementById("edit-service-desc").value = result.serviceData[0].service_desc;
                    document.getElementById("edit-service-start-price").value = result.serviceData[0].start_price;
                    document.getElementById("edit-service-price-negotiable").checked = result.serviceData[0].price_negotiable;
                    document.getElementById("edit-service-pricing-guideline").value = result.serviceData[0].price_desc;

                    document.getElementById("edit-service-provider-experience").value = result.serviceData[0].number_of_years_ex;
                    document.getElementById("edit-service-provider-clientele").value = result.serviceData[0].clientele;
                    document.getElementById("edit-service-provider-qualification").value = result.serviceData[0].qualification;
                }
            }
        })
    }

    function updateServiceInformation(){
        var editServiceCategory = document.getElementById("edit-service-category").value;
        var editServiceName = document.getElementById("edit-service-name").value;

        var editServiceType = document.getElementsByName("edit-service-type");
        var typeBoolValue;
        for (var iterator = 0; iterator < editServiceType.length; iterator++){
            if (editServiceType[iterator].checked)
                typeBoolValue = editServiceType[iterator].value;
        }

        var editServiceCountry = document.getElementById("edit-service-country").value;
        var editServiceRegion = document.getElementById("edit-service-regions").value;
        var editServiceCity = document.getElementById("edit-service-cities").value;
        var editServiceStartHours = document.getElementById("edit-service-working-hours-start").value;
        var editServiceEndHours = document.getElementById("edit-service-working-hours-end").value;

        var editWorkingDaysCheckBoxes = document.getElementsByClassName("edit-service-working-days");
        var editWorkingDays = [7];

        for (iterator = 0; iterator < editWorkingDaysCheckBoxes.length; iterator++)
            editWorkingDays[iterator] = editWorkingDaysCheckBoxes[iterator].checked

        var editServiceDesc = document.getElementById("edit-service-desc").value;

        $.ajax({
            type: "GET",
            url: "{{ url('/update-service-information') }}",
            data: {
                "edit-data-service-type": typeBoolValue,
                "edit-data-service-category": editServiceCategory,
                "edit-data-service-name": editServiceName,
                "edit-data-service-country": editServiceCountry,
                "edit-data-service-region": editServiceRegion,
                "edit-data-service-city": editServiceCity,
                "edit-data-service-working-days": editWorkingDays,
                "edit-data-service-working-hours-start": editServiceStartHours,
                "edit-data-service-working-hours-end": editServiceEndHours,
                "edit-data-service-description": editServiceDesc
            },

            success:function (result) {
                if (result.status = 200)
                    alert("success");
            }
        })
    }

    function updateServicePricing(){
        var editServiceStartPrice = document.getElementById("edit-service-start-price").value;
        var editServicePriceNegotiable = document.getElementById("edit-service-price-negotiable").checked;
        var priceNegotiableBooleanValue;

        if (editServicePriceNegotiable === true)
            priceNegotiableBooleanValue = 1;
        else
            priceNegotiableBooleanValue = 0;

            var editServicePriceDesc = document.getElementById("edit-service-pricing-guideline").value;

        $.ajax({
            type: "GET",
            url: "{{ url('/update-service-pricing') }}",
            data: {"edit-service-start-price": editServiceStartPrice, "edit-service-price-negotiable": priceNegotiableBooleanValue, "edit-service-pricing-guideline": editServicePriceDesc},

            success:function(result){
                if(result.status === 200)
                    alert("success");
                else
                    alert("failed");
            }
        })
    }

    function updateServiceRating(){
        var editServiceExperience = document.getElementById("edit-service-provider-experience").value;
        var editServiceClientele = document.getElementById("edit-service-provider-clientele").value;
        var editServiceProviderQualification = document.getElementById("edit-service-provider-qualification").value;

        $.ajax({
            type: "GET",
            url: "{{ url('/update-service-rating') }}",
            data: {"edit-service-experience": editServiceExperience, "edit-service-clientele": editServiceClientele, "edit-service-provider-qualification": editServiceProviderQualification},

            success:function(result) {
//                console.log(result);
                if (result.status === 200)
                    alert("success");
                else
                    alert("failed");
            }
        })
    }

    function deleteService(serviceId){
        $.ajax({
            type: "GET",
            url: "{{ url('/delete-service') }}",
            data: {"service-id": serviceId},

            success:function (result) {
                if (result.status === 200) {
                    closeConfirm();
//                    showAlert("Success", "Service successfully deleted");
                    window.location.href = "{{ url('/provider-home') }}";
                }
                else
                    alert("Unable to delete service. Please contact support");
            }
        });
    }

    function updateServiceProviderGbi(){
        var gbiCompanyName = document.getElementById("gbi-company-name").value;
        var gbiCountry = document.getElementById("gbi-country").value;
        var gbiRegion = document.getElementById("gbi-regions").value;
        var gbiCity = document.getElementById("gbi-city").value;
        var gbiCompanyWebsiteUrl = document.getElementById("gbi-business-website-url").value;
        var gbiCompanyAddress = document.getElementById("gbi-business-address").value;
        var gbiBusinessDesc = document.getElementById("gbi-business-description").value;
        var gbiBusinessGoals = document.getElementById("gbi-business-goals").value;
        var gbiIsBusinessRegistered = document.getElementById("gbi-business-registered").checked;
        var gbiRegistrationNumber = document.getElementById("gbi-business-reg-no").value;
        var gbiTinNumber = document.getElementById("gbi-tin-number").value;
        var gbiLogo = "";

        if (document.getElementById("gbi-image-input").value)
            gbiLogo = document.getElementById("gbi-image-input").value;


        var gbiBusinessRegisteredBool = "";
        if(gbiIsBusinessRegistered === true){
            gbiBusinessRegisteredBool = 1;
        }else
            gbiBusinessRegisteredBool = 0;

        $.ajax({
            type: "GET",
            url: "{{ url('/update-service-provider-gbi') }}",
            data: {
                "gbi-company-name": gbiCompanyName,
                "gbi-country": gbiCountry,
                "gbi-regions": gbiRegion,
                "gbi-city": gbiCity,
                "gbi-business-website-url": gbiCompanyWebsiteUrl,
                "gbi-business-address": gbiCompanyAddress,
                "gbi-business-description": gbiBusinessDesc,
                "gbi-business-goals": gbiBusinessGoals,
                "gbi-business-registered": gbiBusinessRegisteredBool,
                "gbi-business-reg-no": gbiRegistrationNumber,
                "gbi-tin-number": gbiTinNumber,
                "gbi-logo": gbiLogo
            },

            success:function (result) {
                if(result.status === 200)
                    alert("Success");
                else
                    alert("failed");
            }
        })
    }

    function updateServiceProviderSmp(){
        var facebook = document.getElementById("smp-facebook").value;
        var twitter = document.getElementById("smp-twitter").value;
        var instagram = document.getElementById("smp-instagram").value;
        var whatsapp = document.getElementById("smp-whatsapp").value;
        var linkedin = document.getElementById("smp-linkedin").value;
        var googlePlus = document.getElementById("smp-google-plus").value;
        var facebookVibrancy = document.getElementById("smp-facebook-vibrancy").value;
        var twitterVibrancy = document.getElementById("smp-twitter-vibrancy").value;
        var instagramVibrancy = document.getElementById("smp-instagram-vibrancy").value;
        var googlePlusVibrancy = document.getElementById("smp-google-plus-vibrancy").value;
        var whatsappVibrancy = document.getElementById("smp-whatsapp-vibrancy").value;
        var linkedinVibrancy = document.getElementById("smp-linkedin-vibrancy").value;

        $.ajax({
            type: "GET",
            url: "{{ url('/update-service-provider-smp') }}",
            data: {
                "facebook": facebook,
                "twitter": twitter,
                "instagram": instagram,
                "whatsapp": whatsapp,
                "linkedin": linkedin,
                "google-plus": googlePlus,
                "facebook-vibrancy": facebookVibrancy,
                "twitter-vibrancy": twitterVibrancy,
                "instagram-vibrancy": instagramVibrancy,
                "google-plus-vibrancy": googlePlusVibrancy,
                "whatsapp-vibrancy": whatsappVibrancy,
                "linkedin-vibrancy": linkedinVibrancy
            },

            success: function (result) {
                if (result.status === 200)
                    alert("success");
                else
                    alert("failed")
            }
        })
    }

    function uploadServiceImage(){

    }

    function deleteServiceImage(imageToDeleteRowId){
        $.ajax({
            type: "GET",
            url: "{{ url('/delete-service-image') }}",
            data: {"image-to-del-row-id": imageToDeleteRowId},

            success:function (result) {
                closeConfirm();
                if (result.status === 200){
                    showAlert("Success", "Service image deleted.");
                } else{
                    showAlert("Failed", "Failed to delete service image.");
                }
            }
        })
    }

    function setImageToDeleteColName(imageToDeleteCol, imageRowId){
        $.ajax({
            type:  "GET",
            url: "{{ url('/set-image-to-delete-col') }}",
            data: {"image-to-delete-col": imageToDeleteCol},

            success:function (result) {
                if (result.status === 200){
//                    closeConfirm();
                    showConfirm(imageRowId, 'Delete Image', 'Do you want to delete the image?', 'Delete', 'Cancel')
                }
            }
        });
    }

    function imageUploaded(){

    }

    function uploadServiceVideo(){

    }

    function deleteServiceVideo(){

    }

    $(document).ready(function(){
       getServiceProviderData();
    });

    $(document).ready(function(){
        $('#service-provider-side-bar').sidenav();
    });
</script>
</html>


