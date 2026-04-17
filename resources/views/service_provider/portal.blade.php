@extends('layouts.providerlayout')

@section('content')
    <div id="portal-content-container" class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12">

                    <div class="col-sm-12">
                        <div class="divider grey lighten-2"></div>
                    </div>

                    {{--------------------------------------------NEW SERVICE FORM------------------------------------}}

                    <div class="row">
                        <div class="col-sm-12 col-md-12" style="padding-right: 0">
                            <h6 style="margin-top: 15px;">
                                <p style="display: inline; float: left; margin-top: 10px">
                                    <i class="fas fa-share-alt" style=""></i> https://zumah.net/
                                </p>
                                <p style="display: inline; float: left; width: 310px;">
                                    <input id="provider-custom-text-for-url" type="" class="form-control" style="display: inline; float: left; width: 90%; font-weight: bold;" onkeyup="checkServiceProviderUrlText(this.value)" onblur="setServiceProviderUrlText(this.value)">
                                    <span id="sp-url-process-indicator-holder">
                                    </span>
                                </p>
                            </h6>
                        </div>
                    </div>
                    <ul class="col-sm-12 browser-default"></ul>

                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-12">
                                    <h5 style="font-weight: 300;">Services
                                        <a class="btn black white-text right" href="javascript:void(0)"
                                           onclick="showOverlay('add-service-overlay')"
                                           style="border-radius: 250px; margin-top: -5px; line-height: initial;">
                                            New Service
                                            <i class="far fa-plus-square"></i>
                                        </a>
                                    </h5>
                                    <div class="divider grey lighten-2"></div>
                                </div>
                            </div>
                            <div class="row"></div>

                            <div class="col-sm-12">
                                <div class="row">
                                    @if(count($services))
                                        @foreach($services as $service)
                                            <span style="display: none">{{ $checker = 0 }}</span>
                                            <span style="display: none">{{ $slideTo = 0 }}</span>
                                            <div class="col-sm-6 col-md-4 col-lg-4">
                                                {{--<div class="row">--}}
                                                    <div class="card" style="border-radius: 30px;">
                                                        <div id="service-carousel-{{ $service->id }}" class="carousel slide service-carousel" data-ride="carousel" data-interval="false">
                                                            <!-- Indicators -->
                                                            <ul class="carousel-indicators" style="">
                                                                @for($iterator = 0; $iterator < count($serviceImages); $iterator++)
                                                                    @for($innerIterator = 0; $innerIterator < count($serviceImages[$iterator]); $innerIterator++)
                                                                        @if($serviceImages[$iterator][$innerIterator]->service_id == $service->id)
                                                                            @if($serviceImages[$iterator][$innerIterator]->image_name_0)
                                                                                <li data-target="#service-carousel-{{ $service->id }}" data-slide-to="0" class="indicator-item active"></li>
                                                                            @endif
                                                                                @if($serviceImages[$iterator][$innerIterator]->image_name_1)
                                                                                    <li data-target="#service-carousel-{{ $service->id }}" data-slide-to="1" class="indicator-item"></li>
                                                                                @endif
                                                                                @if($serviceImages[$iterator][$innerIterator]->image_name_2)
                                                                                    <li data-target="#service-carousel-{{ $service->id }}" data-slide-to="2" class="indicator-item"></li>
                                                                                @endif
                                                                                @if($serviceImages[$iterator][$innerIterator]->image_name_3)
                                                                                    <li data-target="#service-carousel-{{ $service->id }}" data-slide-to="3" class="indicator-item"></li>
                                                                                @endif
                                                                                @if($serviceImages[$iterator][$innerIterator]->image_name_4)
                                                                                    <li data-target="#service-carousel-{{ $service->id }}" data-slide-to="4" class="indicator-item"></li>
                                                                                @endif
                                                                            {{--@if($slideTo == 0)--}}
                                                                                {{--<li data-target="#service-carousel-{{ $service->id }}" data-slide-to="{{ $slideTo }}" class="indicator-item active"></li>--}}
                                                                            {{--@elseif($slideTo > 0)--}}
                                                                                {{--<script>--}}
                                                                                    {{--alert("{{ $slideTo }}")--}}
                                                                                {{--</script>--}}
                                                                                {{--<li data-target="#service-carousel-{{ $service->id }}" data-slide-to="{{ $slideTo }}"></li>--}}
                                                                            {{--@endif--}}
                                                                        @endif
                                                                        {{--<span style="display: none">{{ ++$slideTo }}</span>--}}
                                                                    @endfor
                                                                @endfor
                                                            </ul>

                                                            <!-- The slideshow -->
                                                            <div class="carousel-inner service-carousel-inner" style="max-height: 200px; min-height: 200px">
                                                                @for($iterator = 0; $iterator < count($serviceImages); $iterator++)
                                                                    @for($innerIterator = 0; $innerIterator < count($serviceImages[$iterator]); $innerIterator++)
                                                                        @if($serviceImages[$iterator][$innerIterator]->service_id == $service->id)
                                                                            @if($serviceImages[$iterator][$innerIterator]->image_name_0)
                                                                                <div class="carousel-item active">
                                                                                    <span style="display: none">{{ ++$checker }}</span>
                                                                                    <img src="{{ url('/storage/service_images/'.$serviceImages[$iterator][$innerIterator]->image_name_0) }}" alt="Planner" width="100%" height="100%" style="height:  -webkit-fill-available; border-radius: 30px 30px 0px 0px;">
                                                                                </div>
                                                                            @endif
                                                                            @if($serviceImages[$iterator][$innerIterator]->image_name_1)
                                                                                <div class="carousel-item">
                                                                                    <span style="display: none">{{ ++$checker }}</span>
                                                                                    <img src="{{ url('/storage/service_images/'.$serviceImages[$iterator][$innerIterator]->image_name_1) }}" alt="Planner" width="100%" height="100%" style="height:  -webkit-fill-available; border-radius: 30px 30px 0px 0px;">
                                                                                </div>
                                                                            @endif
                                                                                @if($serviceImages[$iterator][$innerIterator]->image_name_2)
                                                                                    <div class="carousel-item">
                                                                                        <span style="display: none">{{ ++$checker }}</span>
                                                                                        <img src="{{ url('/storage/service_images/'.$serviceImages[$iterator][$innerIterator]->image_name_2) }}" alt="Planner" width="100%" height="100%" style="height:  -webkit-fill-available; border-radius: 30px 30px 0px 0px;">
                                                                                    </div>
                                                                                @endif
                                                                                @if($serviceImages[$iterator][$innerIterator]->image_name_3)
                                                                                    <div class="carousel-item">
                                                                                        <span style="display: none">{{ ++$checker }}</span>
                                                                                        <img src="{{ url('/storage/service_images/'.$serviceImages[$iterator][$innerIterator]->image_name_3) }}" alt="Planner" width="100%" height="100%" style="height:  -webkit-fill-available; border-radius: 30px 30px 0px 0px;">
                                                                                    </div>
                                                                                @endif
                                                                                @if($serviceImages[$iterator][$innerIterator]->image_name_4)
                                                                                    <div class="carousel-item">
                                                                                        <span style="display: none">{{ ++$checker }}</span>
                                                                                        <img src="{{ url('/storage/service_images/'.$serviceImages[$iterator][$innerIterator]->image_name_4) }}" alt="Planner" width="100%" height="100%" style="height:  -webkit-fill-available; border-radius: 30px 30px 0px 0px;">
                                                                                    </div>
                                                                                @endif


                                                                            {{--@if($checker == 0)--}}
                                                                                {{--<div class="carousel-item active">--}}
                                                                                    {{--<span style="display: none">{{ ++$checker }}</span>--}}
                                                                                    {{--<img src="{{ url('/storage/service_images/'.$serviceImages[$iterator][$innerIterator]->image_name_0) }}" alt="Planner" width="100%" height="100%" style="height:  -webkit-fill-available; border-radius: 30px 30px 0px 0px;">--}}
                                                                                {{--</div>--}}
                                                                            {{--@else--}}
                                                                                {{--<div class="carousel-item">--}}
                                                                                    {{--<img src="{{ url('/storage/service_images/'.$serviceImages[$iterator][$innerIterator]->image_name_1) }}" alt="Planner" width="100%" height="100%" style="height:  -webkit-fill-available; border-radius: 30px 30px 0px 0px;">--}}
                                                                                {{--</div>--}}
                                                                            {{--@endif--}}
                                                                        @endif
                                                                    @endfor
                                                                @endfor
                                                            </div>
                                                            <!-- Left and right controls -->
                                                        </div>
                                                        <div class="card-content">
                                                            <div class="card-title">
                                                                <h6 style="display: inline;">
                                                                    <a href="javascript:void(0)">{{ $service->name }}</a>
                                                                </h6>
                                                                <span style="float: right;">
                                                                <i class="fas fa-pen" data-service-id="{{ $service->id }}" style="color: #000; line-height: initial !important; font-size: 16px" onclick="getServiceToEditData(this.getAttribute('data-service-id'));showOverlay('edit-service-overlay')" ></i>
                                                                {{--<i class="fas fa-trash-alt media-delete-icon" style="line-height: initial !important; font-size: 16px" data-service-id="{{ $service->id }}" onclick="deleteService(this.getAttribute('data-service-id'))"></i>--}}
                                                                <i class="fas fa-trash-alt media-delete-icon" style="line-height: initial !important; font-size: 16px" data-service-id="{{ $service->id }}" onclick="showConfirm(this.getAttribute('data-service-id'), 'Delete Service', 'Do you really want to delete this service?', 'Delete', 'Cancel')"></i>
                                                        </span>
                                                            </div>

                                                            <div class="">
                                                                <div class="service-description-paragraph-holder">
                                                                    <p class="service-description-paragraph">
                                                                        {{ $service->service_desc }}
                                                                        {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.--}}
                                                                    </p>
                                                                </div>
                                                                <br/>
                                                                <div class="" style="width: 100%">

                                                                    <p style="float: left; display: inline">
                                                                        <a href="" style="float: left">{{ $service->category }}</a>
                                                                    </p>
                                                                    @if($service->crowns > 0)
                                                                        <p style="float: right; display: inline">
                                                                            <small style="">{{ $service->crowns }} <i id="service-crown-{{$service->id}}" class="fas fa-crown crown"></i></small>
                                                                        </p>
                                                                    @elseif($service->crowns == 0)

                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                {{--</div>--}}
                                            </div>
                                        @endforeach
                                    @else
                                        @foreach($services as $service)
                                            <div class="col-sm-6 col-md-4 col-lg-4">

                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-12">
                                    <h5 style="font-weight: 300;">General Business Information (GBI)</h5>
                                    <div class="divider grey lighten-2"></div>
                                </div>
                            </div>
                            <div class="row"></div>

                            {{---------------------------------START OF General Business Information (GBI)------------------------------------}}
                            <div class="col-sm-12">
                                {{--<div class="col-sm-12">--}}
                                    <div class="card z-depth-quarter" style="margin-left: auto; margin-right: auto;">
                                        <div class="card-content">
                                            <div class="row">
                                                <form class="col-sm-12" enctype="multipart/form-data" method="POST" action="{{ url('/update-gbi') }}">
                                                    {{ csrf_field() }}
                                                    <br>
                                                    <div class="row">
                                                        <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                                            <input id="gbi-company-name" type="text" class="validate" name="gbi-company-name" placeholder="Company Name Limited" required="">
                                                        </div>

                                                        <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                                            <input id="gbi-country" type="text" class="validate" name="gbi-country" required="" placeholder="Ghana" value="Ghana">
                                                        </div>

                                                        <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                                            <select class="browser-default" id="gbi-regions" required="" name="gbi-regions" style="border: none; border-bottom: 1px solid #9e9e9e; color: #d1d2d7" onchange="getRegionCities(this.value, 'gbi-city')">
                                                                <option value="" class="gbi-region">Choose your region</option>
                                                                <option value="Ashanti" class="gbi-region">Ashanti</option>
                                                                <option value="Brong-Ahafo" class="gbi-region">Brong-Ahafo</option>
                                                                <option value="Central" class="gbi-region">Central</option>
                                                                <option value="Eastern" class="gbi-region">Eastern</option>
                                                                <option value="Greater Accra" class="gbi-region">Greater Accra</option>
                                                                <option value="Northern" class="gbi-region">Northern</option>
                                                                <option value="Upper East" class="gbi-region">Upper East</option>
                                                                <option value="Upper West" class="gbi-region">Upper West</option>
                                                                <option value="Volta" class="gbi-region">Volta</option>
                                                                <option value="Western" class="gbi-region">Western</option>
                                                            </select>
                                                        </div>

                                                        <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                                            <select class="browser-default" id="gbi-cities" name="gbi-cities" style="">
                                                                <option value="">Choose your city</option>
                                                            </select>
                                                        </div>

                                                        <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                                            <input id="gbi-country-code" type="text" class="validate" name="gbi-country-code" disabled="" value="+233">
                                                        </div>

                                                        <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                                            <input id="gbi-phone" type="text" class="validate" required="" name="gbi-phone" placeholder="+233 30 000 0000" disabled>
                                                        </div>

                                                        <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                                            <input id="gbi-business-website-url" type="url" class="validate" name="gbi-website-url" placeholder="Bus. Website (www.company.com)">
                                                        </div>

                                                        <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                                            <input id="gbi-email" type="email" class="validate" name="gbi-email" placeholder="email@company.com" disabled>
                                                        </div>

                                                        <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                                            <textarea id="gbi-business-address" class="validate materialize-textarea" name="gbi-business-address" placeholder="Box 0998"></textarea>
                                                        </div>

                                                        <div class="input-field col-sm-12">
                                                            <textarea id="gbi-business-description" class="validate materialize-textarea" name="gbi-business-desc" placeholder="Short company description"></textarea>
                                                        </div>

                                                        <div class="input-field col-sm-12">
                                                            <textarea id="gbi-business-goals" class="validate materialize-textarea" name="gbi-business-goals" placeholder="Business Goals"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12 col-lg-4">
                                                            <p style="margin-top: 25px;">
                                                                <label>
                                                                    <input type="checkbox" id="gbi-business-registered" class="browser-default" name="gbi-business-registered" onclick="businessRegistered(this);businessRegisteredCBChangeState(this)">
                                                                    <span class="grey-text text-darken-2">Is Business registered?</span>
                                                                </label>
                                                            </p>
                                                        </div>

                                                        <div class="input-field col-sm-12 col-lg-4">
                                                            <input id="gbi-business-reg-no" type="text" class="validate" name="gbi-business-reg-num" placeholder="Business Registration No." disabled="">
                                                        </div>

                                                        <div class="input-field col-sm-12 col-lg-4">
                                                            <input id="gbi-tin-number" type="text" class="validate" name="gbi-business-tin-num" placeholder="Tax Identification No." disabled>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12 col-lg-4">
                                                            <div class="input-field">
                                                                <div class="image-upload">
                                                                    <label for="gbi-image-input">
                                                                        <i class="far fa-image"></i>
                                                                    </label>
                                                                    <input id="gbi-image-input" type="file" name="gbi-business-logo" onchange="imageValidation('logo', this.id, 'gbi-image-preview')"/> <span style="vertical-align: super">Upload business logo</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-lg-4">
                                                            <div id="gbi-image-preview" class="card">
                                                                <div id="gbi-image-preview" class="card-body service-media-card-body">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col-sm-12 col-md-6 offset-lg-6">
                                                            {{--<button type="submit" class="btn black right white-text" style="width: 200px; border-radius: 30px; height: 40px;" onclick="updateServiceProviderGbi()">Update</button>--}}
                                                            <button type="submit" class="btn black right white-text" style="width: 200px; border-radius: 30px; height: 40px;">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                {{--</div>--}}
                            </div>

                            {{------------------------------------------END OF General Business Information (GBI)----------------------------------------------------}}

                            <div class="row"></div>
                            <div class="col-sm-12">
                                <div class="col-sm-12">
                                    <h5 style="font-weight: 300;">Social Media Presence (SMP)</h5>
                                    <div class="divider grey lighten-2"></div>
                                </div>
                            </div>
                            <div class="row"></div>

                            {{--------------------------------------------START OF Social Media Presence (SMP)-------------------------------------------}}
                            <div class="col-sm-12">
                                {{--<div class="col-sm-12">--}}
                                    <div class="card z-depth-quater" style="margin-left: auto; margin-right: auto;">
                                        <div class="card-content">
                                            <div class="row">
                                                <form class="col-sm-12" onclick="return false">
                                                    <br>
                                                    <div class="row">
                                                        <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                                            <i class="fab fa-facebook-square prefix social-media-icon-forms"></i>
                                                            <input id="smp-facebook" type="text" class="validate" placeholder="Facebook Name" value="">
                                                        </div>
                                                        <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                                            <i class="fab fa-instagram prefix social-media-icon-forms"></i>
                                                            <input id="smp-instagram" type="text" class="validate" placeholder="Instagram Handle" value="">
                                                        </div>
                                                        <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                                            <i class="fab fa-google-plus-square prefix social-media-icon-forms"></i>
                                                            <input id="smp-google-plus" type="text" class="validate" placeholder="Google Plus Name" value="">
                                                        </div>
                                                        <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                                            <i class="fab fa-twitter-square prefix social-media-icon-forms"></i>
                                                            <input id="smp-twitter" type="text" class="validate" placeholder="Twitter Handle" value="">
                                                        </div>
                                                        <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                                            <i class="fab fa-linkedin prefix social-media-icon-forms"></i>
                                                            <input id="smp-linkedin" type="text" placeholder="LinkedIn Name" value="">
                                                        </div>
                                                        <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                                            <i class="fab fa-whatsapp-square prefix social-media-icon-forms"></i>
                                                            <input id="smp-whatsapp" type="text" class="validate" placeholder="Whatsapp Number" value="">
                                                        </div>
                                                    </div>

                                                    <h6>Social Media Activity</h6>

                                                    <div style="padding-left: 5px; padding-right: 5px;">
                                                        <div class="row">
                                                            <div class="input-field col-sm-6 col-md-6 col-lg-4">
                                                                <i class="fab fa-facebook-square prefix social-media-icon-forms"></i>
                                                                <select id="smp-facebook-vibrancy" tabindex="-1" class="browser-default social-media-vibrancy">
                                                                    <option value="">--select vibrancy--</option>
                                                                    <option value="Vibrant">Vibrant</option>
                                                                    <option value="Mild">Mild</option>
                                                                    <option value="Dull">Dull</option>
                                                                </select>
                                                            </div>

                                                            <div class="input-field col-sm-6 col-md-6 col-lg-4">
                                                                <i class="fab fa-instagram prefix social-media-icon-forms"></i>
                                                                <select id="smp-instagram-vibrancy" tabindex="-1" class="browser-default social-media-vibrancy">
                                                                    <option value="">--select vibrancy--</option>
                                                                    <option value="Vibrant">Vibrant</option>
                                                                    <option value="Mild">Mild</option>
                                                                    <option value="Dull">Dull</option>
                                                                </select>
                                                            </div>

                                                            <div class="input-field col-sm-6 col-md-6 col-lg-4">
                                                                <i class="fab fa-google-plus-square prefix social-media-icon-forms"></i>
                                                                <select id="smp-google-plus-vibrancy" class="browser-default social-media-vibrancy">
                                                                    <option value="">--select vibrancy--</option>
                                                                    <option value="Vibrant">Vibrant</option>
                                                                    <option value="Mild">Mild</option>
                                                                    <option value="Dull">Dull</option>
                                                                </select>
                                                            </div>

                                                            <div class="input-field col-sm-6 col-md-6 col-lg-4">
                                                                <i class="fab fa-twitter-square prefix social-media-icon-forms"></i>
                                                                <select id="smp-twitter-vibrancy" class="browser-default social-media-vibrancy">
                                                                    <option value="">--select vibrancy--</option>
                                                                    <option value="Vibrant">Vibrant</option>
                                                                    <option value="Mild">Mild</option>
                                                                    <option value="Dull">Dull</option>
                                                                </select>
                                                            </div>

                                                            <div class="input-field col-sm-6 col-md-6 col-lg-4">
                                                                <i class="fab fa-linkedin prefix social-media-icon-forms"></i>
                                                                <select id="smp-linkedin-vibrancy" class="browser-default social-media-vibrancy">
                                                                    <option value="">--select vibrancy--</option>
                                                                    <option value="Vibrant">Vibrant</option>
                                                                    <option value="Mild">Mild</option>
                                                                    <option value="Dull">Dull</option>
                                                                </select>
                                                            </div>

                                                            <div class="input-field col-sm-6 col-md-6 col-lg-4">
                                                                <i class="fab fa-whatsapp-square prefix social-media-icon-forms"></i>
                                                                <select id="smp-whatsapp-vibrancy" class="browser-default social-media-vibrancy" style="">
                                                                    <option value="">--select vibrancy--</option>
                                                                    <option value="Vibrant">Vibrant</option>
                                                                    <option value="Mild">Mild</option>
                                                                    <option value="Dull">Dull</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row"></div>
                                                    <div class="row">
                                                        <div class="input-field col-sm-12 col-md-6 offset-lg-6">
                                                            <button type="submit" class="btn black right white-text" style="width: 200px; border-radius: 30px; height: 40px;" onclick="updateServiceProviderSmp()">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                {{--</div>--}}
                            </div>
                            {{--------------------------------------------END OF Social Media Presence (SMP)-------------------------------------------}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{---------------------------------------------------------ADD SERVICE OVERLAY--------------------------------------------------------}}
    <div id="add-service-overlay" class="overlay">
        <div class="container" style="height: 100%; display: flex; flex-direction: column; align-items: center">
            <div class="row fixsidenav">
                <div class="col-sm-12">
                    <div class="card z-depth-quater" style="margin-left: auto; margin-right: auto;">
                        <div class="card-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h5 style="text-align: center">Service Information</h5>
                                    <br>
                                </div>

                                <form class="col-sm-12" enctype="multipart/form-data" method="POST" action="{{ url('/new-service') }}">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 col-lg-4" style="margin-bottom: 30px">
                                            <select id="new-service-category" name="new-service-category" class="select browser-default" required="">
                                                <option value="">Select Category</option>
                                                <option value="agriculture">Agriculture</option>
                                                <option value="building and engineering">Building &amp; Engineering</option>
                                                <option value="documentation">Documentation</option>
                                                <option value="education">Education</option>
                                                <option value="entertainment and media">Entertainment &amp; Media</option>
                                                <option value="events">Events</option>
                                                <option value="fashion and beauty">Fashion &amp; Beauty</option>
                                                <option value="finance">Finance</option>
                                                <option value="general business">General Business</option>
                                                <option value="hospitality">Hospitality</option>
                                                <option value="housing">Housing</option>
                                                <option value="hand work">Hand Work</option>
                                                <option value="information technology">Information Technology</option>
                                                <option value="logistics">Logistics</option>
                                                <option value="sports">Sports</option>
                                                <option value="others">Others</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-4" style="margin-bottom: 30px">
                                            <input id="new-service-name" name="new-service-name" type="text" required="" class="validate" placeholder="Service Name/Career">
                                        </div>

                                        <div class="col-sm-12 col-lg-4" style="">
                                            <div class="row" style="padding-top: 25px">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <p style="margin-top: 25px;display: inline">
                                                        <label>
                                                            <input type="radio" name="service-type" id="new-service-full-time" value="Full Time" class="browser-default new-service-type">
                                                            <span class="grey-text text-darken-2">Full Time</span>
                                                        </label>
                                                    </p>

                                                    <p style="display: inline; float: right">
                                                        <label>
                                                            <input type="radio" name="service-type" id="new-service-contract" value="Contract" class="browser-default new-service-type">
                                                            <span class="grey-text text-darken-2">Contract</span>
                                                        </label>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-4" style="margin-bottom: 30px">
                                            <input id="new-service-country" name="new-service-country" type="text" class="validate" required="" placeholder="Ghana" value="Ghana">
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-4" style="margin-bottom: 30px">
                                            <select id="new-service-regions" name="new-service-regions" class="browser-default" onchange="getRegionCities(this.value, 'new-service-cities')">
                                                <option value="">Choose your region</option>
                                                <option value="Ashanti">Ashanti</option>
                                                <option value="Brong-Ahafo">Brong-Ahafo</option>
                                                <option value="Central">Central</option>
                                                <option value="Eastern">Eastern</option>
                                                <option value="Greater Accra">Greater Accra</option>
                                                <option value="Northern">Northern</option>
                                                <option value="Upper East">Upper East</option>
                                                <option value="Upper West">Upper West</option>
                                                <option value="Volta">Volta</option>
                                                <option value="Western">Western</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-4" style="margin-bottom: 30px">
                                            <select id="new-service-cities" name="new-service-cities" class="browser-default" required="" >
                                                <option>Choose your City</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 30px">
                                            <p>Working Days:</p>
                                            <label class="checkbox-text">
                                                <input type="checkbox" name="new-service-working-days-sun" class="browser-default service-working-days">
                                                <span class="grey-text text-darken-2">Sunday</span>
                                            </label>
                                            <label class="checkbox-text">
                                                <input type="checkbox" name="new-service-working-days-mon" class="browser-default service-working-days">
                                                <span class="grey-text text-darken-2">Monday</span>
                                            </label>
                                            <label class="checkbox-text">
                                                <input type="checkbox" name="new-service-working-days-tues" class="browser-default service-working-days">
                                                <span class="grey-text text-darken-2">Tuesday</span>
                                            </label>
                                            <label class="checkbox-text">
                                                <input type="checkbox" name="new-service-working-days-wed" class="browser-default service-working-days">
                                                <span class="grey-text text-darken-2">Wednesday</span>
                                            </label>
                                            <label class="checkbox-text">
                                                <input type="checkbox" name="new-service-working-days-thurs" class="browser-default service-working-days">
                                                <span class="grey-text text-darken-2">Thursday</span>
                                            </label>
                                            <label class="checkbox-text">
                                                <input type="checkbox" name="new-service-working-days-fri" class="browser-default service-working-days">
                                                <span class="grey-text text-darken-2">Friday</span>
                                            </label>
                                            <label class="checkbox-text">
                                                <input type="checkbox" name="new-service-working-days-sat" class="browser-default service-working-days">
                                                <span class="grey-text text-darken-2">Saturday</span>
                                            </label>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-4" style="margin-bottom: 30px">
                                            <select id="new-service-working-hours-start" name="new-service-working-hours-start" class="browser-default">
                                                <option>Working Hours(Start)</option>
                                                <option>12:00 AM</option>
                                                <option>1 :00 AM</option>
                                                <option>2 :00 AM</option>
                                                <option>3 :00 AM</option>
                                                <option>4 :00 AM</option>
                                                <option>5 :00 AM</option>
                                                <option>6 :00 AM</option>
                                                <option>7 :00 AM</option>
                                                <option>8 :00 AM</option>
                                                <option>9 :00 AM</option>
                                                <option>10:00 AM</option>
                                                <option>11:00 AM</option>
                                                <option>12:00 PM</option>
                                                <option>1 :00 PM</option>
                                                <option>2 :00 PM</option>
                                                <option>3 :00 PM</option>
                                                <option>4 :00 PM</option>
                                                <option>5 :00 PM</option>
                                                <option>6 :00 PM</option>
                                                <option>7 :00 PM</option>
                                                <option>8 :00 PM</option>
                                                <option>9 :00 PM</option>
                                                <option>10:00 PM</option>
                                                <option>11:00 PM</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-4" style="margin-bottom: 30px">
                                            <select id="new-service-working-hours-end" name="new-service-working-hours-end"  class="browser-default">
                                                <option>Working Hours(End)</option>
                                                <option>12:00 AM</option>
                                                <option>1 :00 AM</option>
                                                <option>2 :00 AM</option>
                                                <option>3 :00 AM</option>
                                                <option>4 :00 AM</option>
                                                <option>5 :00 AM</option>
                                                <option>6 :00 AM</option>
                                                <option>7 :00 AM</option>
                                                <option>8 :00 AM</option>
                                                <option>9 :00 AM</option>
                                                <option>10:00 AM</option>
                                                <option>11:00 AM</option>
                                                <option>12:00 PM</option>
                                                <option>1 :00 PM</option>
                                                <option>2 :00 PM</option>
                                                <option>3 :00 PM</option>
                                                <option>4 :00 PM</option>
                                                <option>5 :00 PM</option>
                                                <option>6 :00 PM</option>
                                                <option>7 :00 PM</option>
                                                <option>8 :00 PM</option>
                                                <option>9 :00 PM</option>
                                                <option>10:00 PM</option>
                                                <option>11:00 PM</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <textarea id="new-service-description" name="new-service-description" class="validate materialize-textarea" placeholder="Brief description of your service"></textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 col-md-5 col-lg-5">
                                            <input id="new-service-start-price" name="new-service-start-price" step="0.01" type="number" required="" class="validate" placeholder="Starting Price (GH¢)">
                                        </div>

                                        <div class="col-sm-12 col-md-2 col-lg-2">
                                            <p style="padding-top: 25px">
                                                <label>
                                                    <input type="checkbox" id="new-service-price-negotiable" name="new-service-price-negotiable" class="browser-default">
                                                    <span class="grey-text text-darken-2">Negotiable</span>
                                                </label>
                                            </p>
                                        </div>

                                        <div class="col-sm-12 col-md-5 col-lg-5">
                                            <textarea id="new-service-pricing-info" name="new-service-pricing-info" class="validate materialize-textarea" placeholder="Pricing Info/Description"></textarea>
                                            <p>
                                                <em>
                                                    Assure that your price is within expectation with regards to your cost and the expertise you put in the service you render.
                                                </em>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 col-lg-4">
                                            <select id="new-service-provider-experience" name="new-service-provider-experience" required="" class="select browser-default">
                                                <option value="">Select number of years</option>
                                                <option value="1 year">1 Year</option>
                                                <option value="2 - 3 years">2 - 3 Years</option>
                                                <option value="4 - 5 years">4 - 5 Years</option>
                                                <option value="5 - 10 years">5 - 10 Years</option>
                                                <option value="10 - 15 years">10 - 15 Years</option>
                                                <option value="15 years + ">15 years +</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-4">
                                            <select id="new-service-provider-clientele" name="new-service-provider-clientele" class="select browser-default">
                                                <option value="">Select number of clients</option>
                                                <option value="1 - 5">1 - 5</option>
                                                <option value="6 - 10">6 - 10</option>
                                                <option value="11 -20">11 - 20</option>
                                                <option value="21 - 50">21 - 50</option>
                                                <option value="51 - 100">51 - 100</option>
                                                <option value="101 - 500">101 - 500</option>
                                                <option value="501 - 1000">501 - 1000</option>
                                                <option value="1000+">1000+</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <textarea id="new-service-provider-qualification" name="new-service-provider-qualification" required="" class="validate materialize-textarea" placeholder="Qualification"></textarea>
                                            <b>Note:</b> Provide valid information to increases your rating.
                                        </div>
                                    </div>
                                    {{---------------------------------------------------------------------------------------------------------------------}}
                                    <div class="row" style="text-align: center">
                                        <div class="col-sm-12 col-lg-1">

                                        </div>
                                        <div class="col-sm-12 col-lg-2">
                                            <div class="">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="image-upload">
                                                            <label for="new-service-image-0">
                                                                <i class="far fa-image"></i>
                                                            </label>
                                                            <input id="new-service-image-0" name="new-service-image-0" type="file" onchange="imageValidation('create', this.id, 'new-service-image-preview-0')"/>
                                                            <br>
                                                            <span style="vertical-align: super">Upload service image</span>
                                                        </div>
                                                    </div>
                                                    <div id="new-service-image-preview-0" class="card-body service-media-card-body" style="max-height: 150px; min-height: 150px">

                                                    </div>
                                                    <div class="card-footer">
                                                        <p class="media-delete-icon" data-image-preview-id="new-service-image-preview-0" onclick="unsetImagePreview('create', this.getAttribute('data-image-preview-id'))">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-2">
                                            <div class="">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="image-upload">
                                                            <label for="new-service-image-1">
                                                                <i class="far fa-image"></i>
                                                            </label>
                                                            <input id="new-service-image-1" name="new-service-image-1" type="file" onchange="imageValidation('create', this.id, 'new-service-image-preview-1')"/>
                                                            <br>
                                                            <span style="vertical-align: super">Upload service image</span>
                                                        </div>
                                                    </div>
                                                    <div id="new-service-image-preview-1" class="card-body service-media-card-body" style="max-height: 150px; min-height: 150px">

                                                    </div>
                                                    <div class="card-footer">
                                                        <p class="media-delete-icon" data-image-preview-id="new-service-image-preview-1" onclick="unsetImagePreview('create', this.getAttribute('data-image-preview-id'))">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-2">
                                            <div class="">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="image-upload">
                                                            <label for="new-service-image-2">
                                                                <i class="far fa-image"></i>
                                                            </label>
                                                            <input id="new-service-image-2" name="new-service-image-2" type="file" onchange="imageValidation('create', this.id, 'new-service-image-preview-2')"/>
                                                            <br>
                                                            <span style="vertical-align: super">Upload service image</span>
                                                        </div>
                                                    </div>
                                                    <div id="new-service-image-preview-2" class="card-body service-media-card-body" style="max-height: 150px; min-height: 150px">

                                                    </div>
                                                    <div class="card-footer">
                                                        <p class="media-delete-icon" data-image-preview-id="new-service-image-preview-2" onclick="unsetImagePreview('create', this.getAttribute('data-image-preview-id'))">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-2">
                                            <div class="">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="image-upload">
                                                            <label for="new-service-image-3">
                                                                <i class="far fa-image"></i>
                                                            </label>
                                                            <input id="new-service-image-3" name="new-service-image-3" type="file" onchange="imageValidation('create', this.id, 'new-service-image-preview-3')"/>
                                                            <br>
                                                            <span style="vertical-align: super">Upload service image</span>
                                                        </div>
                                                    </div>
                                                    <div id="new-service-image-preview-3" class="card-body service-media-card-body" style="max-height: 150px; min-height: 150px">

                                                    </div>
                                                    <div class="card-footer">
                                                        <p class="media-delete-icon" data-image-preview-id="new-service-image-preview-3" onclick="unsetImagePreview('create', this.getAttribute('data-image-preview-id'))">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-2">
                                            <div class="">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="image-upload">
                                                            <label for="new-service-image-4">
                                                                <i class="far fa-image"></i>
                                                            </label>
                                                            <input id="new-service-image-4" name="new-service-image-4" type="file" onchange="imageValidation('create', this.id, 'new-service-image-preview-4')"/>
                                                            <br>
                                                            <span style="vertical-align: super">Upload service image</span>
                                                        </div>
                                                    </div>
                                                    <div id="new-service-image-preview-4" class="card-body service-media-card-body" style="max-height: 150px; min-height: 150px">

                                                    </div>
                                                    <div class="card-footer">
                                                        <p class="media-delete-icon" data-image-preview-id="new-service-image-preview-4" onclick="unsetImagePreview('create', this.getAttribute('data-image-preview-id'))">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--------------------------------------------------------------------------------------------------------------------------------------------}}
                                    <h5 style="text-align:center; margin-top: 10px">General Business Information For New Service</h5>
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-12">
                                            <p style="margin-top: 25px;">
                                                <label>
                                                    <input type="checkbox" id="use-gbi-for-new-service" name="use-gbi-for-new-service" class="browser-default" onclick="useSpGbiSmpForNewService()">
                                                    <strong class="grey-text text-darken-2">Use my General Business Information (GBI) & Social Media Presence (SMP) for this service.</strong>
                                                </label>
                                            </p>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                            <input id="new-service-gbi-business-name" name="new-service-gbi-business-name" type="text" class="validate" placeholder="Business Name">
                                        </div>

                                        <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                            <input id="new-service-gbi-country-code" name="new-service-gbi-country-code" type="text" class="validate" disabled="" value="+233">
                                        </div>

                                        <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                            <input id="new-service-gbi-sp-phone" name="new-service-gbi-sp-phone" type="text" class="validate" required="" placeholder="+233 30 000 0000">
                                        </div>

                                        <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                            <input id="new-service-gbi-business-website-url" name="new-service-gbi-business-website-url" type="url" class="validate" placeholder="Bus. Website (www.company.com)">
                                        </div>

                                        <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                            <input id="new-service-gbi-sp-email" name="new-service-gbi-sp-email" type="email" class="validate" placeholder="email@company.com">
                                        </div>

                                        <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                            <textarea id="new-service-gbi-business-address" name="new-service-gbi-business-address" class="validate materialize-textarea" placeholder="Box 0998"></textarea>
                                        </div>

                                        <div class="input-field col-sm-12">
                                            <textarea id="new-service-gbi-business-description" name="new-service-gbi-business-description" class="validate materialize-textarea" placeholder="Short company description"></textarea>
                                        </div>

                                        <div class="input-field col-sm-12">
                                            <textarea id="new-service-gbi-business-goals" name="new-service-gbi-business-goals" class="validate materialize-textarea" placeholder="Business Goals"></textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 col-lg-4">
                                            <p style="margin-top: 25px;">
                                                <label>
                                                    <input type="checkbox" id="new-service-gbi-business-registered" name="new-service-gbi-business-registered" class="browser-default" onclick="businessRegistered(this);businessRegisteredCBChangeState(this)">
                                                    <span class="grey-text text-darken-2">Is Business registered?</span>
                                                </label>
                                            </p>
                                        </div>

                                        <div class="input-field col-sm-12 col-lg-4">
                                            <input id="new-service-gbi-business-reg-no" name="new-service-gbi-business-reg-no" type="text" class="validate" placeholder="Business Registration No." disabled="">
                                        </div>

                                        <div class="input-field col-sm-12 col-lg-4">
                                            <input id="new-service-gbi-tin-number" name="new-service-gbi-tin-number" type="text" class="validate" placeholder="Tax Identification No." disabled>
                                        </div>
                                    </div>

                                    {{--------------------------------------------------------------------------------------------------------------------------------------------}}
                                    <h5 style="text-align:center; margin-top: 10px">Social Media Presence For New Service</h5>
                                    <div class="row">
                                        <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                            <i class="fab fa-facebook-square prefix social-media-icon-forms"></i>
                                            <input id="new-service-smp-facebook" name="new-service-smp-facebook" type="text" class="validate" placeholder="Facebook Name" value="">
                                        </div>
                                        <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                            <i class="fab fa-instagram prefix social-media-icon-forms"></i>
                                            <input id="new-service-smp-instagram" name="new-service-smp-instagram" type="text" class="validate" placeholder="Instagram Handle" value="">
                                        </div>
                                        <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                            <i class="fab fa-google-plus-square prefix social-media-icon-forms"></i>
                                            <input id="new-service-smp-google-plus" name="new-service-smp-google-plus" type="text" class="validate" placeholder="Google Plus Name" value="">
                                        </div>
                                        <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                            <i class="fab fa-twitter-square prefix social-media-icon-forms"></i>
                                            <input id="new-service-smp-twitter" name="new-service-smp-twitter" type="text" class="validate" placeholder="Twitter Handle" value="">
                                        </div>
                                        <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                            <i class="fab fa-linkedin prefix social-media-icon-forms"></i>
                                            <input id="new-service-smp-linkedin" type="text" placeholder="LinkedIn Name" value="">
                                        </div>
                                        <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                            <i class="fab fa-whatsapp-square prefix social-media-icon-forms"></i>
                                            <input id="new-service-smp-whatsapp" name="new-service-smp-whatsapp" type="text" class="validate" placeholder="Whatsapp Number" value="">
                                        </div>
                                    </div>

                                    <h6>Social Media Activity</h6>

                                    <div style="padding-left: 5px; padding-right: 5px;">
                                        <div class="row">
                                            <div class="input-field col-sm-6 col-md-6 col-lg-4">
                                                <i class="fab fa-facebook-square prefix social-media-icon-forms"></i>
                                                <select id="new-service-smp-facebook-vibrancy" name="new-service-smp-facebook-vibrancy" tabindex="-1" class="browser-default social-media-vibrancy">
                                                    <option value="">--select vibrancy--</option>
                                                    <option value="Vibrant">Vibrant</option>
                                                    <option value="Mild">Mild</option>
                                                    <option value="Dull">Dull</option>
                                                </select>
                                            </div>

                                            <div class="input-field col-sm-6 col-md-6 col-lg-4">
                                                <i class="fab fa-instagram prefix social-media-icon-forms"></i>
                                                <select id="new-service-smp-instagram-vibrancy" name="new-service-smp-instagram-vibrancy" tabindex="-1" class="browser-default social-media-vibrancy">
                                                    <option value="">--select vibrancy--</option>
                                                    <option value="Vibrant">Vibrant</option>
                                                    <option value="Mild">Mild</option>
                                                    <option value="Dull">Dull</option>
                                                </select>
                                            </div>

                                            <div class="input-field col-sm-6 col-md-6 col-lg-4">
                                                <i class="fab fa-google-plus-square prefix social-media-icon-forms"></i>
                                                <select id="new-service-smp-google-plus-vibrancy" name="new-service-smp-google-plus-vibrancy" class="browser-default social-media-vibrancy">
                                                    <option value="">--select vibrancy--</option>
                                                    <option value="Vibrant">Vibrant</option>
                                                    <option value="Mild">Mild</option>
                                                    <option value="Dull">Dull</option>
                                                </select>
                                            </div>

                                            <div class="input-field col-sm-6 col-md-6 col-lg-4">
                                                <i class="fab fa-twitter-square prefix social-media-icon-forms"></i>
                                                <select id="new-service-smp-twitter-vibrancy" name="new-service-smp-twitter-vibrancy" class="browser-default social-media-vibrancy">
                                                    <option value="">--select vibrancy--</option>
                                                    <option value="Vibrant">Vibrant</option>
                                                    <option value="Mild">Mild</option>
                                                    <option value="Dull">Dull</option>
                                                </select>
                                            </div>

                                            <div class="input-field col-sm-6 col-md-6 col-lg-4">
                                                <i class="fab fa-linkedin prefix social-media-icon-forms"></i>
                                                <select id="new-service-smp-linkedin-vibrancy" name="new-service-smp-linkedin-vibrancy" class="browser-default social-media-vibrancy">
                                                    <option value="">--select vibrancy--</option>
                                                    <option value="Vibrant">Vibrant</option>
                                                    <option value="Mild">Mild</option>
                                                    <option value="Dull">Dull</option>
                                                </select>
                                            </div>

                                            <div class="input-field col-sm-6 col-md-6 col-lg-4">
                                                <i class="fab fa-whatsapp-square prefix social-media-icon-forms"></i>
                                                <select id="new-service-smp-whatsapp-vibrancy" name="new-service-smp-whatsapp-vibrancy" class="browser-default social-media-vibrancy" style="">
                                                    <option value="">--select vibrancy--</option>
                                                    <option value="Vibrant">Vibrant</option>
                                                    <option value="Mild">Mild</option>
                                                    <option value="Dull">Dull</option>
                                                </select>
                                            </div>

                                            <div class="input-field col-sm-12 col-md-6 offset-lg-6">
                                                {{--<button type="submit" class="btn black right white-text" style="width: 200px; border-radius: 30px; height: 40px;" onclick="createService()">Create</button>--}}
                                                <button type="submit" class="btn black right white-text" style="width: 200px; border-radius: 30px; height: 40px;" onclick="">Create</button>
                                            </div>
                                        </div>
                                        <div style="text-align: center">
                                            <span class="overlay-close" onclick="hideOverlay('add-service-overlay')">[close]</span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{---------------------------------------------------------EDIT SERVICE OVERLAY--------------------------------------------------------}}
    <div id="edit-service-overlay" class="overlay">
        <div class="container" style="height: 100%">
            <div style="text-align: center">
                <span class="overlay-close" style="color: #fff;font-size: 20px; margin-top: 25px; text-align: center" onclick="hideOverlay('edit-service-overlay')">[close]</span>
            </div>
            <div class="card">
                <h5 style="text-align: center">Edit Service Information</h5>
                <div class="card-body">
                    <div class="row">
                        <form class="col-sm-12" enctype="multipart/form-data" method="POST" action="{{ url('/edit-service-data') }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-12 col-md-4 col-xs-l2 col-lg-4">
                                    <select id="edit-service-category" name="edit-service-category" class="select browser-default" required="">
                                        <option value="">Select Category</option>
                                        <option value="agriculture">Agriculture</option>
                                        <option value="building and engineering">Building &amp; Engineering</option>
                                        <option value="documentation">Documentation</option>
                                        <option value="education">Education</option>
                                        <option value="entertainment and media">Entertainment &amp; Media</option>
                                        <option value="events">Events</option>
                                        <option value="fashion and beauty">Fashion &amp; Beauty</option>
                                        <option value="finance">Finance</option>
                                        <option value="general business">General Business</option>
                                        <option value="hospitality">Hospitality</option>
                                        <option value="housing">Housing</option>
                                        <option value="hand work">Hand Work</option>
                                        <option value="information technology">Information Technology</option>
                                        <option value="logistics">Logistics</option>
                                        <option value="sports">Sports</option>
                                        <option value="others">Others</option>
                                    </select>
                                </div>

                                <div class="col-md-4 col-sm-12 col-xs-12 col-lg-4">
                                    <input id="edit-service-name" name="edit-service-name" type="text" required="" class="validate" placeholder="Career / Service Name">
                                </div>

                                <div class="col-md-4" style="padding-top: 20px;">
                                    <div class="row" style="margin-bottom: 0 !important;">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <p style="margin-top: 25px;display: inline">
                                                <label>
                                                    <input type="radio" value="Full Time" id="edit-service-full-time" name="edit-service-type" required class="browser-default">
                                                    <span class="grey-text text-darken-2">Full Time</span>
                                                </label>
                                            </p>

                                            <p style="display: inline; float: right">
                                                <label>
                                                    <input type="radio" value="Contract" id="edit-service-contract" name="edit-service-type" required class="browser-default">
                                                    <span class="grey-text text-darken-2">Contract</span>
                                                </label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-sm-12 col-xs-12 col-lg-4">
                                    <input id="edit-service-country" name="edit-service-country" type="text" class="validate valid" required="" placeholder="Ghana" value="Ghana" >
                                </div>

                                <div class="col-md-4 col-sm-12 col-xs-12 col-lg-4">
                                    <select id="edit-service-regions" name="edit-service-regions" class="browser-default required" onchange="getRegionCities(this.value, 'edit-service-city')">
                                        <option value="">Choose your region</option>
                                        <option value="Ashanti">Ashanti</option>
                                        <option value="Brong-Ahafo">Brong-Ahafo</option>
                                        <option value="Central">Central</option>
                                        <option value="Eastern">Eastern</option>
                                        <option value="Greater Accra">Greater Accra</option>
                                        <option value="Northern">Northern</option>
                                        <option value="Upper East">Upper East</option>
                                        <option value="Upper West">Upper West</option>
                                        <option value="Volta">Volta</option>
                                        <option value="Western">Western</option>
                                    </select>
                                </div>

                                <div class="col-md-4 col-sm-12 col-xs-12 col-lg-4">
                                    <select id="edit-service-cities" name="edit-service-cities" class="browser-default">
                                        <option value="">Choose your city</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-sm-12 col-xs-12 col-lg-4">
                                    <select id="edit-service-working-hours-start" name="edit-service-working-hours-start" class="browser-default">
                                        <option>Working Hours(Start)</option>
                                        <option>12:00 AM</option>
                                        <option>1 :00 AM</option>
                                        <option>2 :00 AM</option>
                                        <option>3 :00 AM</option>
                                        <option>4 :00 AM</option>
                                        <option>5 :00 AM</option>
                                        <option>6 :00 AM</option>
                                        <option>7 :00 AM</option>
                                        <option>8 :00 AM</option>
                                        <option>9 :00 AM</option>
                                        <option>10:00 AM</option>
                                        <option>11:00 AM</option>
                                        <option>12:00 PM</option>
                                        <option>1 :00 PM</option>
                                        <option>2 :00 PM</option>
                                        <option>3 :00 PM</option>
                                        <option>4 :00 PM</option>
                                        <option>5 :00 PM</option>
                                        <option>6 :00 PM</option>
                                        <option>7 :00 PM</option>
                                        <option>8 :00 PM</option>
                                        <option>9 :00 PM</option>
                                        <option>10:00 PM</option>
                                        <option>11:00 PM</option>
                                    </select>
                                </div>

                                <div class="col-md-4 col-sm-12 col-xs-12 col-lg-4">
                                    <select id="edit-service-working-hours-end" name="edit-service-working-hours-end" class="browser-default">
                                        <option>Working Hours (End)</option>
                                        <option>12:00 AM</option>
                                        <option>1 :00 AM</option>
                                        <option>2 :00 AM</option>
                                        <option>3 :00 AM</option>
                                        <option>4 :00 AM</option>
                                        <option>5 :00 AM</option>
                                        <option>6 :00 AM</option>
                                        <option>7 :00 AM</option>
                                        <option>8 :00 AM</option>
                                        <option>9 :00 AM</option>
                                        <option>10:00 AM</option>
                                        <option>11:00 AM</option>
                                        <option>12:00 PM</option>
                                        <option>1 :00 PM</option>
                                        <option>2 :00 PM</option>
                                        <option>3 :00 PM</option>
                                        <option>4 :00 PM</option>
                                        <option>5 :00 PM</option>
                                        <option>6 :00 PM</option>
                                        <option>7 :00 PM</option>
                                        <option>8 :00 PM</option>
                                        <option>9 :00 PM</option>
                                        <option>10:00 PM</option>
                                        <option>11:00 PM</option>
                                    </select>
                                </div>

                                <div class="col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 30px">
                                    <p style="margin-top: 10px">Working Days:</p>
                                    <label class="checkbox-text">
                                        <input type="checkbox" value="sunday" name="edit-service-working-days-sun" class="browser-default edit-service-working-days">
                                        <span class="grey-text text-darken-2">Sunday</span>
                                    </label>
                                    <label class="checkbox-text">
                                        <input type="checkbox" value="monday" name="edit-service-working-days-mon" class="browser-default edit-service-working-days">
                                        <span class="grey-text text-darken-2">Monday</span>
                                    </label>
                                    <label class="checkbox-text">
                                        <input type="checkbox" value="tuesday" name="edit-service-working-days-tues" class="browser-default edit-service-working-days">
                                        <span class="grey-text text-darken-2">Tuesday</span>
                                    </label>
                                    <label class="checkbox-text">
                                        <input type="checkbox" value="wednesday" name="edit-service-working-days-wed" class="browser-default edit-service-working-days">
                                        <span class="grey-text text-darken-2">Wednesday</span>
                                    </label>
                                    <label class="checkbox-text">
                                        <input type="checkbox" value="thursday" name="edit-service-working-days-thurs" class="browser-default edit-service-working-days">
                                        <span class="grey-text text-darken-2">Thursday</span>
                                    </label>
                                    <label class="checkbox-text">
                                        <input type="checkbox" value="friday" name="edit-service-working-days-friday" class="browser-default edit-service-working-days">
                                        <span class="grey-text text-darken-2">Friday</span>
                                    </label>
                                    <label class="checkbox-text">
                                        <input type="checkbox" value="saturday" name="edit-service-working-days-sat" class="browser-default edit-service-working-days">
                                        <span class="grey-text text-darken-2">Saturday</span>
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <textarea id="edit-service-desc" name="edit-service-desc" class="validate materialize-textarea valid" placeholder="Brief description of your service"></textarea>
                                </div>
                            </div>

{{------------------------------------------------------------Edit Service Pricing------------------------------------------------------------------------------------}}
                            <div class="row">
                                {{--<div class="col-lg-12">--}}
                                    {{--<h5 style="text-align: center">Edit Service Pricing</h5>--}}
                                {{--</div>--}}
                                <div class="col-sm-12 col-md-5 col-lg-5">
                                    <input id="edit-service-start-price" name="edit-service-start-price" step="0.01" type="number" required="" class="validate" placeholder="Starting Price (GH¢)">
                                </div>

                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <p style="padding-top: 25px">
                                        <label>
                                            <input type="checkbox" id="edit-service-price-negotiable" name="edit-service-price-negotiable" class="browser-default" onclick="">
                                            <span class="grey-text text-darken-2">Negotiable</span>
                                        </label>
                                    </p>
                                </div>

                                <div class="input-field col-sm-12 col-md-5 col-lg-5">
                                    <textarea id="edit-service-pricing-guideline" name="edit-service-pricing-guideline" class="validate materialize-textarea" placeholder="Pricing Info/Description"></textarea>
                                    <em>
                                        Assure that your price
                                        is within expectation with regards to your cost and the
                                        expertise you put in the service you render.
                                    </em>
                                </div>
                            </div>
{{------------------------------------------------------------------General Business Information ------------------------------------------------------------------------------}}
                                <div class="row">
                                    <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                        <input id="edit-service-gbi-business-name" name="edit-service-gbi-business-name" required type="text" class="validate" placeholder="Business Name">
                                    </div>

                                    <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                        <input id="edit-service-gbi-country-code" name="edit-service-gbi-country-code" type="text" class="validate" disabled="" value="+233">
                                    </div>

                                    <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                        <input id="edit-service-gbi-sp-phone" name="edit-service-gbi-sp-phone" type="text" class="validate" required="" placeholder="+233 30 000 0000">
                                    </div>

                                    <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                        <input id="edit-service-gbi-business-website-url" name="edit-service-gbi-business-website-url" type="url" class="validate" placeholder="Bus. Website (www.company.com)">
                                    </div>

                                    <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                        <input id="edit-service-gbi-sp-email" name="edit-service-gbi-sp-email" type="email" class="validate" placeholder="email@company.com">
                                    </div>

                                    <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                        <textarea id="edit-service-gbi-business-address" name="edit-service-gbi-business-address" class="validate materialize-textarea" placeholder="Box 0998"></textarea>
                                    </div>

                                    <div class="input-field col-sm-12">
                                        <textarea id="edit-service-gbi-business-description" name="edit-service-gbi-business-description" class="validate materialize-textarea" placeholder="Short company description"></textarea>
                                    </div>

                                    <div class="input-field col-sm-12">
                                        <textarea id="edit-service-gbi-business-goals" name="edit-service-gbi-business-goals" class="validate materialize-textarea" placeholder="Business Goals"></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-lg-4">
                                        <p style="margin-top: 25px;">
                                            <label>
                                                <input type="checkbox" id="edit-service-gbi-business-registered" name="edit-service-gbi-business-registered" class="browser-default" onclick="businessRegistered(this);businessRegisteredCBChangeState(this)">
                                                <span class="grey-text text-darken-2">Is Business registered?</span>
                                            </label>
                                        </p>
                                    </div>

                                    <div class="input-field col-sm-12 col-lg-4">
                                        <input id="edit-service-gbi-business-reg-number" name="edit-service-gbi-business-reg-no" type="text" class="validate" placeholder="Business Registration No." disabled="">
                                    </div>

                                    <div class="input-field col-sm-12 col-lg-4">
                                        <input id="edit-service-gbi-tin-number" name="edit-service-gbi-tin-number" type="text" class="validate" placeholder="Tax Identification No." disabled>
                                    </div>
                                </div>

                                {{--------------------------------------------------------------------------------------------------------------------------------------------}}

                                <div class="row">
                                    <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                        <i class="fab fa-facebook-square prefix social-media-icon-forms"></i>
                                        <input id="edit-service-smp-facebook" name="edit-service-smp-facebook" type="text" class="validate" placeholder="Facebook Name" value="">
                                    </div>
                                    <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                        <i class="fab fa-instagram prefix social-media-icon-forms"></i>
                                        <input id="edit-service-smp-instagram" name="edit-service-smp-instagram" type="text" class="validate" placeholder="Instagram Handle" value="">
                                    </div>
                                    <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                        <i class="fab fa-google-plus-square prefix social-media-icon-forms"></i>
                                        <input id="edit-service-smp-google-plus" name="edit-service-smp-google-plus" type="text" class="validate" placeholder="Google Plus Name" value="">
                                    </div>
                                    <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                        <i class="fab fa-twitter-square prefix social-media-icon-forms"></i>
                                        <input id="edit-service-smp-twitter" name="edit-service-smp-twitter" type="text" class="validate" placeholder="Twitter Handle" value="">
                                    </div>
                                    <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                        <i class="fab fa-linkedin prefix social-media-icon-forms"></i>
                                        <input id="edit-service-smp-linkedin" name="edit-service-smp-linkedin" type="text" placeholder="LinkedIn Name" value="">
                                    </div>
                                    <div class="input-field col-sm-12 col-md-6 col-lg-4">
                                        <i class="fab fa-whatsapp-square prefix social-media-icon-forms"></i>
                                        <input id="edit-service-smp-whatsapp" name="edit-service-smp-whatsapp" type="text" class="validate" placeholder="Whatsapp Number" value="">
                                    </div>
                                </div>

                                {{--<h6>Social Media Activity</h6>--}}

                                {{--<div style="padding-left: 5px; padding-right: 5px;">--}}
                                    <div class="row">
                                        <div class="input-field col-sm-6 col-md-6 col-lg-4">
                                            <i class="fab fa-facebook-square prefix social-media-icon-forms"></i>
                                            <select id="edit-service-smp-facebook-vibrancy" name="edit-service-smp-facebook-vibrancy" tabindex="-1" class="browser-default social-media-vibrancy">
                                                <option value="NULL">--select vibrancy--</option>
                                                <option value="Vibrant">Vibrant</option>
                                                <option value="Mild">Mild</option>
                                                <option value="Dull">Dull</option>
                                            </select>
                                        </div>

                                        <div class="input-field col-sm-6 col-md-6 col-lg-4">
                                            <i class="fab fa-instagram prefix social-media-icon-forms"></i>
                                            <select id="edit-service-smp-instagram-vibrancy" name="edit-service-smp-instagram-vibrancy" tabindex="-1" class="browser-default social-media-vibrancy">
                                                <option value="NULL">--select vibrancy--</option>
                                                <option value="Vibrant">Vibrant</option>
                                                <option value="Mild">Mild</option>
                                                <option value="Dull">Dull</option>
                                            </select>
                                        </div>

                                        <div class="input-field col-sm-6 col-md-6 col-lg-4">
                                            <i class="fab fa-google-plus-square prefix social-media-icon-forms"></i>
                                            <select id="edit-service-smp-google-plus-vibrancy" name="edit-service-smp-google-plus-vibrancy" class="browser-default social-media-vibrancy">
                                                <option value="NULL">--select vibrancy--</option>
                                                <option value="Vibrant">Vibrant</option>
                                                <option value="Mild">Mild</option>
                                                <option value="Dull">Dull</option>
                                            </select>
                                        </div>

                                        <div class="input-field col-sm-6 col-md-6 col-lg-4">
                                            <i class="fab fa-twitter-square prefix social-media-icon-forms"></i>
                                            <select id="edit-service-smp-twitter-vibrancy" name="edit-service-smp-twitter-vibrancy" class="browser-default social-media-vibrancy">
                                                <option value="NULL">--select vibrancy--</option>
                                                <option value="Vibrant">Vibrant</option>
                                                <option value="Mild">Mild</option>
                                                <option value="Dull">Dull</option>
                                            </select>
                                        </div>

                                        <div class="input-field col-sm-6 col-md-6 col-lg-4">
                                            <i class="fab fa-linkedin prefix social-media-icon-forms"></i>
                                            <select id="edit-service-smp-linkedin-vibrancy" name="edit-service-smp-linkedin-vibrancy" class="browser-default social-media-vibrancy">
                                                <option value="NULL">--select vibrancy--</option>
                                                <option value="Vibrant">Vibrant</option>
                                                <option value="Mild">Mild</option>
                                                <option value="Dull">Dull</option>
                                            </select>
                                        </div>

                                        <div class="input-field col-sm-6 col-md-6 col-lg-4">
                                            <i class="fab fa-whatsapp-square prefix social-media-icon-forms"></i>
                                            <select id="edit-service-smp-whatsapp-vibrancy" name="edit-service-smp-whatsapp-vibrancy" class="browser-default social-media-vibrancy" style="">
                                                <option value="NULL">--select vibrancy--</option>
                                                <option value="Vibrant">Vibrant</option>
                                                <option value="Mild">Mild</option>
                                                <option value="Dull">Dull</option>
                                            </select>
                                        </div>
                                    </div>

                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <select id="edit-service-provider-experience" name="edit-service-provider-experience" required="" class="select browser-default">
                                        <option value="">Select number of years of experience</option>
                                        <option value="1 year">1 Year</option>
                                        <option value="2 - 3 years">2 - 3 Years</option>
                                        <option value="4 - 5 years">4 - 5 Years</option>
                                        <option value="5 - 10 years">5 - 10 Years</option>
                                        <option value="10 - 15 years">10 - 15 Years</option>
                                        <option value="15 years + ">15 years +</option>
                                    </select>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <select id="edit-service-provider-clientele" name="edit-service-provider-clientele" required="" class="select browser-default">
                                        <option value="">Select number of clients you have had</option>
                                        <option value="1 - 5">1 - 5</option>
                                        <option value="6 - 10">6 - 10</option>
                                        <option value="11 -20">11 - 20</option>
                                        <option value="21 - 50">21 - 50</option>
                                        <option value="51 - 100">51 - 100</option>
                                        <option value="101 - 500">101 - 500</option>
                                        <option value="501 - 1000">501 - 1000</option>
                                        <option value="1000+">1000+</option>
                                    </select>
                                </div>

                                <div class="input-field col-sm-12">
                                    <textarea id="edit-service-provider-qualification" name="edit-service-provider-qualification" required="" class="validate materialize-textarea" placeholder="Qualification"></textarea>
                                </div>
                            </div>

{{------------------------------------------------------------------------------------------------------------------------------------------------}}

{{---------------------------------------------------------------------Images of service---------------------------------------------------------------------------}}
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        {{--<div class="col-sm-12">--}}
                                            {{--<h5 style="font-weight: 300; text-align: center">Images of service</h5>--}}
                                            {{--<p>Enough convincing images increase your rating</p>--}}
                                            {{--<br>--}}
                                        {{--</div>--}}

                                        <div class="row" style="text-align: center" id="">
                                            <div class="col-sm-12 col-lg-1">

                                            </div>
                                            <div class="col-sm-12 col-lg-2">
                                                <div class="">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="image-upload">
                                                                <label for="edit-service-image-0">
                                                                    <i class="far fa-image"></i>
                                                                </label>
                                                                <input id="edit-service-image-0" name="edit-service-image-0" type="file" onchange="imageValidation('create', 'edit', this.id, 'edit-service-image-preview-0')"/>
                                                                <br>
                                                                <span style="vertical-align: super">Upload service image</span>
                                                            </div>
                                                        </div>
                                                        <div id="edit-service-image-preview-0" class="card-body service-media-card-body" style="max-height: 150px; min-height: 150px">

                                                        </div>
                                                        <div class="card-footer">
                                                            <p class="media-delete-icon" id="edit-service-image-delete-0" onclick="showConfirm(this.getAttribute('data-image-id'), 'Delete Image', 'Do you want to delete the image?', 'Delete', 'Cancel');">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-lg-2">
                                                <div class="">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="image-upload">
                                                                <label for="edit-service-image-1">
                                                                    <i class="far fa-image"></i>
                                                                </label>
                                                                <input id="edit-service-image-1" name="edit-service-image-1" type="file" onchange="imageValidation('edit', this.id, 'edit-service-image-preview-1')"/>
                                                                <br>
                                                                <span style="vertical-align: super">Upload service image</span>
                                                            </div>
                                                        </div>
                                                        <div id="edit-service-image-preview-1" class="card-body service-media-card-body" style="max-height: 150px; min-height: 150px">

                                                        </div>
                                                        <div class="card-footer">
                                                            <p class="media-delete-icon" id="edit-service-image-delete-1" onclick="showConfirm(this.getAttribute('data-image-id'), 'Delete Image', 'Do you want to delete the image?', 'Delete', 'Cancel');">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-lg-2">
                                                <div class="">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="image-upload">
                                                                <label for="edit-service-image-2">
                                                                    <i class="far fa-image"></i>
                                                                </label>
                                                                <input id="edit-service-image-2" name="edit-service-image-2" type="file" onchange="imageValidation('edit', this.id, 'edit-service-image-preview-2')"/>
                                                                <br>
                                                                <span style="vertical-align: super">Upload service image</span>
                                                            </div>
                                                        </div>
                                                        <div id="edit-service-image-preview-2" class="card-body service-media-card-body" style="max-height: 150px; min-height: 150px">

                                                        </div>
                                                        <div class="card-footer">
                                                            <p class="media-delete-icon" id="edit-service-image-delete-2" onclick="showConfirm(this.getAttribute('data-image-id'), 'Delete Image', 'Do you want to delete the image?', 'Delete', 'Cancel');">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-lg-2">
                                                <div class="">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="image-upload">
                                                                <label for="edit-service-image-3">
                                                                    <i class="far fa-image"></i>
                                                                </label>
                                                                <input id="edit-service-image-3" name="edit-service-image-3" type="file" onchange="imageValidation('edit', this.id, 'edit-service-image-preview-3')"/>
                                                                <br>
                                                                <span style="vertical-align: super">Upload service image</span>
                                                            </div>
                                                        </div>
                                                        <div id="edit-service-image-preview-3" class="card-body service-media-card-body" style="max-height: 150px; min-height: 150px">

                                                        </div>
                                                        <div class="card-footer">
                                                            <p class="media-delete-icon" id="edit-service-image-delete-3" onclick="showConfirm(this.getAttribute('data-image-id'), 'Delete Image', 'Do you want to delete the image?', 'Delete', 'Cancel');">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-lg-2">
                                                <div class="">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="image-upload">
                                                                <label for="edit-service-image-4">
                                                                    <i class="far fa-image"></i>
                                                                </label>
                                                                <input id="edit-service-image-4" name="edit-service-image-4" type="file" onchange="imageValidation('edit', this.id, 'edit-service-image-preview-4')"/>
                                                                <br>
                                                                <span style="vertical-align: super">Upload service image</span>
                                                            </div>
                                                        </div>
                                                        <div id="edit-service-image-preview-4" class="card-body service-media-card-body" style="max-height: 150px; min-height: 150px">

                                                        </div>
                                                        <div class="card-footer">
                                                            <p class="media-delete-icon" id="edit-service-image-delete-4">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn black right white-text" style="width: 200px; border-radius: 30px; height: 40px;">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection