@extends('layouts.app')

@section('content')

<div class="row" style="margin-right: 0; margin-left: 0;">
    <div class="col-md-12" style="padding-left: 0; padding-right: 0">
        <div id="demo" class="carousel slide" data-ride="carousel" style="">
            <!-- Indicators -->

            <ul class="carousel-indicators dot">
                <li data-target="#demo" data-slide-to="0" class="indicator-item active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                {{--<li data-target="#demo" data-slide-to="2"></li>--}}
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner" style="">
                <div class="carousel-item active banner-carousel-item">
                    <img src="{{ url('/images/banner1.jpg') }}" alt="fashion designer" width="100%" height="100%">
                </div>
                <div class="carousel-item banner-carousel-item">
                    <img src="{{ url('/images/banner2.jpg') }}" alt="gardner" width="100%" height="100%">
                </div>
                {{--<div class="carousel-item banner-carousel-item">--}}
                    {{--<img src="{{ url('/images/temp3.jpeg') }}" alt="Planner" width="100%" height="100%">--}}
                {{--</div>--}}

                <div style="text-align: center; position: absolute; bottom: 50px; left: 0; right: 0;">
                    <button type="submit" class="btn white center black-text" style="width: 100px; border-radius: 30px; height: 40px; margin-bottom: 10px; margin-top: 10px" onclick="showOverlay('signupOverlay')">
                        SIGN UP
                    </button>
                </div>
            </div>
            <!-- Left and right controls -->
        </div>
    </div>
</div>

<div class="container" style="margin-top: 15px">
    <div class="row" style="margin-bottom: 20px">
        <div class="col-md-5 col-sm-12 col-lg-3 col-xs-l2">
            <p>Top Services</p>
        </div>

        {{--<div class="col-md-7 col-sm-12">--}}
        <div class="col-md-7 col-sm-12 col-lg-9 col-xs-l2">
            <div class="" style="width: 100%; overflow-x: scroll; overflow-y: hidden">
                <div style="width: 800px">
                    <ul class="top-service-list" style="width: 900px">
                        <li class="button top-service-list-item">
                            <small class="top-service-icon"><i class="fas fa-tshirt"></i></small> Fashion / Beauty
                            <div class="top-service-digit" style="">
                                <small>20</small>
                            </div>
                        </li>
                        <li class="button top-service-list-item">
                            <small class="top-service-icon"><i class="fas fa-laptop"></i></small> IT
                            <div class="top-service-digit" style="">
                                <small>20</small>
                            </div>
                        </li>
                        <li class="button top-service-list-item">
                            <small class="top-service-icon"><i class="fas fa-graduation-cap"></i></small> Education
                            <div class="top-service-digit" style="">
                                <small>20</small>
                            </div>
                        </li>
                        <li class="button top-service-list-item">
                            <small class="top-service-icon"><i class="fas fa-music"></i></small> Entertainment & Media
                            <div class="top-service-digit" style="">
                                <small>20</small>
                            </div>
                        </li>
                        <li class="button top-service-list-item">
                            <small class="top-service-icon"><i class="fas fa-leaf"></i></small> Agriculture
                            <div class="top-service-digit" style="">
                                <small>20</small>
                            </div>
                        </li>
                        <li class="button top-service-list-item">
                            <small class="top-service-icon"><i class="fas fa-concierge-bell"></i></small> hospitality
                            <div class="top-service-digit" style="">
                                <small>20</small>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        {{--FILTERS ON LEFT SIDE--}}

        <div class="col-md-5 col-sm-12 col-lg-3 col-xs-l2">
            <p>Filter by</p>
            <div class="card" style="">
                <div class="card-header">
                    <div class="row" style="margin-bottom: 0">
                        <div class="col-md-2">
                            <span class="filter-icons">
                                <i class="fas fa-map-marked-alt"></i>
                            </span>
                        </div>
                        <div class="col-md-10">
                            <p style="margin-top: 7px; margin-bottom: 0">Regions</p>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @foreach($regions as $region)
                        <div>
                            <p class="service-name-left-panel">
                                <label>
                                    <input type="checkbox" name="region" class="filled-in" id="" value="{{ $region->region_or_state }}" onclick="getSelectedRegionsCities();getServiceListings()">
                                    <span class="grey-text text-darken-2" style="font-size: 0.85rem">{{ $region->region_or_state }}</span>
                                </label>
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>

            {{--<div style="overflow-y: scroll;">--}}
                <div class="card" style="margin-bottom: 10px;">
                    <div class="card-header">
                        <div class="row" style="margin-bottom: 0">
                            <div class="col-md-2">
                            <span class="filter-icons">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                            </div>
                            <div class="col-md-10">
                                Top Places (No. of Service Providers)
                            </div>
                        </div>
                    </div>

                    <div class="card-body service-filter-holder">
                        <div id="service-cities-holder">

                        </div>
                    </div>
                </div>
            {{--</div>--}}

            {{--END OF LIST OF SERVICES--}}

            <div class="card">
                <div class="card-header">
                    <a href="javascript:void(0)" style="color: inherit; " onclick="switchForCollapsibles('services-list')">
                        <div class="row" style="margin-bottom: 0">
                            <div class="col-md-2">
                                <span class="filter-icons">
                                    <i class="fas fa-paw"></i>
                                </span>
                            </div>
                            <div class="col-md-10">
                                <span style="vertical-align: -webkit-baseline-middle;">Services</span>
                            </div>
                        </div>
                    </a>
                </div>

                <div id="services-list" class="card-body service-filter-holder" style="">
                    <div style="height: auto">

                    </div>
                    <div>
                        <p class="service-name-left-panel">
                            <label>
                                <input type="checkbox" name="category" class="filled-in" id="service-agriculture" value="agriculture" onclick="getServiceListings()">
                                <span class="grey-text text-darken-2" style="font-size: 0.85rem">Agriculture</span>
                            </label>
                        </p>
                        <p class="service-icon-left-panel">
                            <small class="top-service-icon"><i class="fas fa-leaf"></i></small>
                        </p>
                    </div>

                    <div>
                        <p class="service-name-left-panel">
                            <label>
                                <input type="checkbox" name="category" class="filled-in" id="service-building-and-engineering" value="building and engineering" onclick="getServiceListings()">
                                <span class="grey-text text-darken-2" style="font-size: 0.85rem">Building & Engineering</span>
                            </label>
                        </p>
                        <p class="service-icon-left-panel">
                            <small class="top-service-icon">
                                <i class="fas fa-city"></i>
                            </small>
                        </p>
                    </div>

                    <div>
                        <p class="service-name-left-panel">
                            <label>
                                <input type="checkbox" name="category" class="filled-in" id="service-documentation" value="documentation" onclick="getServiceListings()">
                                <span class="grey-text text-darken-2" style="font-size: 0.85rem">Documentation</span>
                            </label>
                        </p>
                        <p class="service-icon-left-panel">
                            <small class="top-service-icon">
                                <i class="fas fa-file-alt"></i>
                            </small>
                        </p>
                    </div>


                    <div>
                        <p class="service-name-left-panel">
                            <label>
                                <input type="checkbox" name="category" class="filled-in" id="service-education" value="education" onclick="getServiceListings()">
                                <span class="grey-text text-darken-2" style="font-size: 0.85rem">Education</span>
                            </label>
                        </p>
                        <p class="service-icon-left-panel">
                            <small class="top-service-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </small>
                        </p>
                    </div>

                    <div>
                        <p class="service-name-left-panel">
                            <label>
                                <input type="checkbox" name="category" class="filled-in" id="service-entertainment-and-media" value="entertainment and media" onclick="getServiceListings()">
                                <span class="grey-text text-darken-2" style="font-size: 0.85rem">Entertainment & Media</span>
                            </label>
                        </p>
                        <p class="service-icon-left-panel">
                            <small class="top-service-icon">
                                <i class="fas fa-music"></i>
                            </small>
                        </p>
                    </div>

                    <div>
                        <p class="service-name-left-panel">
                            <label>
                                <input type="checkbox" name="category" class="filled-in" id="service-events" value="events" onclick="getServiceListings()">
                                <span class="grey-text text-darken-2" style="font-size: 0.85rem">Events</span>
                            </label>
                        </p>
                        <p class="service-icon-left-panel">
                            <small class="top-service-icon">
                                <i class="fas fa-chair"></i>
                            </small>
                        </p>
                    </div>

                    <div>
                        <p class="service-name-left-panel">
                            <label>
                                <input type="checkbox" name="category" class="filled-in" id="service-fashion-and-beauty" value="fashion and beauty" onclick="getServiceListings()">
                                <span class="grey-text text-darken-2" style="font-size: 0.85rem">Fashion & Beauty</span>
                            </label>
                        </p>
                        <p class="service-icon-left-panel">
                            <small class="top-service-icon">
                                <i class="fas fa-tshirt"></i>
                            </small>
                        </p>
                    </div>

                    <div>
                        <p class="service-name-left-panel">
                            <label>
                                <input type="checkbox" name="category" class="filled-in" id="service-finance" value="finance" onclick="getServiceListings()">
                                <span class="grey-text text-darken-2" style="font-size: 0.85rem">Finance</span>
                            </label>
                        </p>
                        <p class="service-icon-left-panel">
                            <small class="top-service-icon">
                                <i class="fas fa-hand-holding-usd"></i>
                            </small>
                        </p>
                    </div>

                    <div>
                        <p class="service-name-left-panel">
                            <label>
                                <input type="checkbox" name="category" class="filled-in" id="service-general-business" value="general business" onclick="getServiceListings()">
                                <span class="grey-text text-darken-2" style="font-size: 0.85rem">General Business</span>
                            </label>
                        </p>
                        <p class="service-icon-left-panel">
                            <small class="top-service-icon">
                                <i class="fas fa-briefcase"></i>
                            </small>
                        </p>
                    </div>

                    <div>
                        <p class="service-name-left-panel">
                            <label>
                                <input type="checkbox" name="category" class="filled-in" id="service-hand-work" value="hand work" onclick="getServiceListings()">
                                <span class="grey-text text-darken-2" style="font-size: 0.85rem">Hand Work</span>
                            </label>
                        </p>
                        <p class="service-icon-left-panel">
                            <small class="top-service-icon">
                                <i class="fas fa-wrench"></i>
                            </small>
                        </p>
                    </div>

                    <div>
                        <p class="service-name-left-panel">
                            <label>
                                <input type="checkbox" name="category" class="filled-in" id="service-health" value="health" onclick="getServiceListings()">
                                <span class="grey-text text-darken-2" style="font-size: 0.85rem">Health</span>
                            </label>
                        </p>
                        <p class="service-icon-left-panel">
                            <small class="top-service-icon">
                                <i class="fas fa-briefcase-medical"></i>
                            </small>
                        </p>
                    </div>

                    <div>
                        <p class="service-name-left-panel">
                            <label>
                                <input type="checkbox" name="category" class="filled-in" id="service-hospitality" value="hospitality" onclick="getServiceListings()">
                                <span class="grey-text text-darken-2" style="font-size: 0.85rem">Hospitality</span>
                            </label>
                        </p>
                        <p class="service-icon-left-panel">
                            <small class="top-service-icon">
                                <i class="fas fa-concierge-bell"></i>
                            </small>
                        </p>
                    </div>

                    <div>
                        <p class="service-name-left-panel">
                            <label>
                                <input type="checkbox" name="category" class="filled-in" id="service-housing" value="housing" onclick="getServiceListings()">
                                <span class="grey-text text-darken-2" style="font-size: 0.85rem">Housing</span>
                            </label>
                        </p>
                        <p class="service-icon-left-panel">
                            <small class="top-service-icon">
                                <i class="fas fa-home"></i>
                            </small>
                        </p>
                    </div>

                    <div>
                        <p class="service-name-left-panel">
                            <label>
                                <input type="checkbox" name="category" class="filled-in" id="service-info-technology" value="information technology" onclick="getServiceListings()">
                                <span class="grey-text text-darken-2" style="font-size: 0.85rem">Info. Technology (IT)</span>
                            </label>
                        </p>
                        <p class="service-icon-left-panel">
                            <small class="top-service-icon">
                                <i class="fas fa-laptop"></i>
                            </small>
                        </p>
                    </div>

                    <div>
                        <p class="service-name-left-panel">
                            <label>
                                <input type="checkbox" name="category" class="filled-in" id="service-logistics" value="logistics" onclick="getServiceListings()">
                                <span class="grey-text text-darken-2" style="font-size: 0.85rem">Logistics</span>
                            </label>
                        </p>
                        <p class="service-icon-left-panel">
                            <small class="top-service-icon">
                                <i class="fas fa-people-carry"></i>
                            </small>
                        </p>
                    </div>

                    <div>
                        <p class="service-name-left-panel">
                            <label>
                                <input type="checkbox" name="category" class="filled-in" id="service-security" value="security" onclick="getServiceListings()">
                                <span class="grey-text text-darken-2" style="font-size: 0.85rem">Security</span>
                            </label>
                        </p>
                        <p class="service-icon-left-panel">
                            <small class="top-service-icon">
                                <i class="fas fa-shield-alt"></i>
                            </small>
                        </p>
                    </div>

                    <div>
                        <p class="service-name-left-panel">
                            <label>
                                <input type="checkbox" name="category" class="filled-in" id="service-sports" value="sports" onclick="getServiceListings()">
                                <span class="grey-text text-darken-2" style="font-size: 0.85rem">Sports</span>
                            </label>
                        </p>
                        <p class="service-icon-left-panel">
                            <small class="top-service-icon">
                                <i class="fas fa-bowling-ball"></i>
                            </small>
                        </p>
                    </div>

                    <div>
                        <p class="service-name-left-panel">
                            <label>
                                <input type="checkbox" name="category" class="filled-in" id="service-others" value="others" onclick="getServiceListings()">
                                <span class="grey-text text-darken-2" style="font-size: 0.85rem">Others</span>
                            </label>
                        </p>
                        <p class="service-icon-left-panel">
                            <small class="top-service-icon">
                                <i class="fas fa-star-of-life"></i>
                            </small>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{--START OF LIST OF SERVICES--}}

        <div class="col-md-7 col-sm-12 col-lg-9 col-xs-l2">
            <div class="row" id="top-of-service-listing">
                <div class="col-md-6">
                    <p style="margin-bottom: 0; margin-top: 0; font-size: 12px">Location: <span id="selected-location">No places selected</span></p>
                    <p style="margin-bottom: 0; margin-top: 0; font-size: 12px">Categories: <span id="selected-location">No categories selected</span></p>
                </div>

                <div class="col-md-6">
                    <form class="form">
                        <input class="form-control" type="" placeholder="search for services">
                    </form>
                </div>
            </div>

            <div class="row" id="services-container">
                @foreach($services as $service)
                    <span style="display: none">{{ $checker = 0 }}</span>
                    <span style="display: none">{{ $slideTo = 0 }}</span>
                    <div class="col-md-12 col-sm-6 col-xs-12 col-lg-4" id="">
                        <div class="card service-listing-card">
                            @foreach($serviceImages as $image)
                                @if($image->service_id == $service->id)
                                    @if($image->image_name_0)
                                        {{--<div class="service-lead-image-holder" onclick="getServiceCarouselImages({{ $service->id }});">--}}
                                        <div class="service-lead-image-holder">
                                            <img src="{{ url('/storage/service_images/'.$image->image_name_0) }}" class="service-lead-image" alt="{{ $service->name }}" width="100%" height="100%" style="height:  -webkit-fill-available">
                                        </div>
                                    @endif
                                @endif
                            @endforeach


                            <div class="card-body service-card-body" id="{{ $service->id }}">
                                <h6 class="card-title">
                                    <a href="{{ url('/service-details/'.$service->id) }}">
                                        {{ $service->name }}
                                    </a>
                                </h6>

                                <div style="margin-bottom: 5px">
                                    <p style="display: inline">
                                        <strong class="service-listing-category">
                                            {{ $service->category }}
                                        </strong>
                                    </p>
                                    <small style="display:inline; float: right; margin-bottom: 0">
                                        <em>{{ $service->city }}</em>
                                    </small>
                                </div>

                                <div style="max-height: 80px; overflow: hidden">
                                    <p class="service-description-paragraph" style="min-height: 50%; margin-bottom: 0;">
                                        {{ $service->service_desc }}
                                        {{--I work only an hour a day but achieve so much by the time the hour is up. I just work how i feel like.I work only an hour a day but achieve so much by the time the hour is up. I just work how i feel like.I work only an hour a day but achieve so much by the time the hour is up. I just work how i feel like.I work only an hour a day but achieve so much by the time the hour is up. I just work how i feel like.I work only an hour a day but achieve so much by the time the hour is up. I just work how i feel like.I work only an hour a day but achieve so much by the time the hour is up. I just work how i feel like.I work only an hour a day but achieve so much by the time the hour is up. I just work how i feel like.I work only an hour a day but achieve so much by the time the hour is up. I just work how i feel like.I work only an hour a day but achieve so much by the time the hour is up. I just work how i feel like.I work only an hour a day but achieve so much by the time the hour is up. I just work how i feel like.I work only an hour a day but achieve so much by the time the hour is up. I just work how i feel like.I work only an hour a day but achieve so much by the time the hour is up. I just work how i feel like.I work only an hour a day but achieve so much by the time the hour is up. I just work how i feel like.--}}
                                    </p>
                                </div>

                                <div class="price-and-rating-holder" style="position: absolute;bottom: 50px; width: 88%;">

                                    <p class="service-price" style="display:inline; float: left">GH¢ {{ $service->start_price }}</p>

                                    <small class="rating-star" style="display: inline; float: right;">
                                        @for($i = 0; $i < 3; $i++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                        @for($i = 0; $i < 2; $i++)
                                            <i class="far fa-star" style=""></i>
                                        @endfor
                                    </small>
                                </div>
                            </div>

                            <div class="card-footer" style="height: 50px">
                                <span style="display: inline; float: left; cursor: pointer">
                                    <i id="service-crown-{{$service->id}}" class="fas fa-crown"
                                       @if($service->crowns == 0)
                                            data-crowned="0"
                                       @elseif($service->crowns > 0)
                                            data-crowned="1"
                                       @endif

                                       onclick="crownService(this);"
                                    ></i>

                                    @if($service->crowns > 0)
                                        <small class="crown-crown-number">{{ $service->crowns }}</small>
                                    @endif
                                </span>
                                <div id="share_dialog_{{ $service->id }}" class='share_dialog' style="display: none">
                                    <p class='logo' style="margin-bottom: 0; text-align: center; font-size: 1.2rem">
                                        <a href="javascript:void(0)" style="padding: 3px; color: #535353" onclick='shareToFacebook( "{{ url('/service-details/'.$service->id) }}" )'>
                                            <i class="fab fa-facebook-square"></i>
                                        </a>
                                        <a href="whatsapp://send?text={{ url('/service-details/'.$service->id) }}" style="padding: 3px; color: #535353">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                        {{--<a href="" style="padding: 3px; color: #535353">--}}
                                            {{--<i class="fab fa-twitter"></i>--}}
                                        {{--</a>--}}
                                        <a class="" href="http://twitter.com/share?text=Check out this service on Zumah.net&url={{ url('/service-details/'.$service->id) }}&hashtags=" target="_blank" data-size="small" style="padding: 3px; color: #535353">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a href="" style="padding: 3px; color: #535353">
                                            <i class="far fa-clone"></i>
                                        </a>
                                    </p>
                                </div>
                                {{--<p style="display: inline; float: right; margin-right: 3px" data-url="{{ url('/service-details/'.$service->id) }}" onclick="copyServiceUrlToClipboard(this.getAttribute('data-url'))">--}}
                                <p style="display: inline; float: right; margin-right: 3px" onclick="showShareDialog({{ $service->id }})">
                                    <i class="fas fa-share-alt"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <hr/>

    <div class="row">
        <div class="col-md-12">
            <h4>How To's</h4>
        </div>
        <div class="col-md-12">
            <div class="col-md-6 col-sm-12 col-lg-4 col-xs-l3" style="padding-left: 0">
                <div class="card">
                    <img class="card-img-top" src="{{ url('/images/registerteaser.png') }}" alt="Card image cap">
                </div>
                <h6 style="font-weight: bold">Register as a Service Provider</h6>
                <span style="font-family: 'Roboto Mono', monospace;">
                    <small>July 25, 2018</small>
                </span>
                <p style="font-size: 13px;">Are you interested in putting your services on Zumah. By providing some few details you can register as a service provider on Zumah.</p>
                <a href="{{ url('/help') }}" style="font-size: 13px;">Read More</a>
            </div>
        </div>
    </div>

    <hr/>

    <div class="row center" style="text-align: center">
        <div class="col-md-12" style="text-align: center">
            <h2>Get The Mobile App</h2>
        </div>
        <div class="col-md-12">
            <a target="_blank" href="https://play.google.com/store/apps/details?id=net.zumah.zumah">
                <img src="{{ url('/images/googleplay.png') }}" alt="Google Play Store" style="width: 30.5%; margin-right: 30px;">
            </a>
            <img src="{{ url('/images/appstore.png') }}" alt="App Store" style="width: 30%;">
        </div>
    </div>
</div>
@endsection
