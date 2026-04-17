@extends('layouts.app')

@section('content')
    @foreach($serviceDetails as $detail)
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ url('/images/temp1.jpeg') }}" height="" width="100%">
                            <h5 style="text-align: center; margin-top: 17px; margin-bottom: 10px">{{ $detail->name }}</h5>
                            <p style="margin-top: 13px; margin-bottom: 13px; text-align: center">
                                <span>
                                    <em>{{ $detail->category }}</em>
                                </span>
                            </p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="text-align: center; font-size: 20px">
                                        @for($i = 0; $i < 5; $i++)
                                            <i class="far fa-star" style="margin-left: 0; margin-top: 3px;"></i>
                                        @endfor
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div style="height: 2vh;"></div>
                    @foreach($service_gbi as $item)
                        <h5 style="margin-bottom: 0">
                            {{ $item->company_name }}
                        </h5>
                    @endforeach
                    <p style="margin-bottom: 0">
                        <span style="font-size: 20px; margin-right: 13px;">
                            <i class="fas fa-envelope"></i>
                        </span>
                        @foreach($service_gbi as $item)
                            <a href="mailto:serviceprovider@mail.com" class="center-with-icon">{{ $item->business_email }}</a>
                        @endforeach
                    </p>
                    <p style="margin-bottom: 0">
                        <span style="font-size: 20px; margin-right: 13px;">
                            <i class="fas fa-phone"></i>
                        </span>
                        @foreach($service_gbi as $item)
                            <span class="center-with-icon">
                                <a href="javascript:void(0)">+233{{ $item->phone }}</a>
                            </span>
                        @endforeach
                    </p>
                    <p style="margin-bottom: 0">
                        <span style="font-size: 20px; margin-right: 19px;">
                            <i class="fas fa-map-marker-alt"></i>
                        </span>
                        <em class="center-with-icon">{{ $detail->region ." - ". $detail->city }}</em>
                    </p>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div style="padding: 5px;">
                                <p>
                                    <strong>Service Description</strong>
                                    <br>
                                    {{ $detail->service_desc }}
                                    {{--Am a freelance Graphic designer. My passion for designing is much more than sitting at the computer making ugly things look nice. Am always hungry for a  challenge. I believe in teamwork.--}}
                                </p>
                                <p>
                                    <strong>Business Description</strong>
                                    <br>
                                    @foreach($service_gbi as $item)
                                        {{ $item->business_desc }}
                                        {{--Am a freelance Graphic designer. My passion for designing is much more than sitting at the computer making ugly things look nice. Am always hungry for a  challenge. I believe in teamwork.--}}
                                    @endforeach
                                </p>
                                <p>
                                    <strong>Business Goals</strong>
                                    <br>
                                    @foreach($service_gbi as $item)
                                        {{ $item->business_goals }}
                                        {{--Am a freelance Graphic designer. My passion for designing is much more than sitting at the computer making ugly things look nice. Am always hungry for a  challenge. I believe in teamwork.--}}
                                    @endforeach
                                    {{--Graphic Designer, Cartoonist, Minimalist.--}}
                                    {{--Am a freelance Graphic designer. Am always hungry for a  challenge.--}}
                                </p>
                                <div style="margin-top: 20px;">
                                    <div class="row">
                                        @foreach($service_smp as $item)
                                            @if($item->social_media == "facebook" && count($item->username) > 0)
                                                <div class="col-sm-6 col-lg-4" style="">
                                                    <p style="">
                                                    <span>
                                                        <i class="fab fa-facebook" style="margin-right: 5px; font-size: 26px"> </i>
                                                        <a href="http://www.facebook.com/{{ $item->username }}" class="center-with-icon" style="color: inherit" title="Click to visit">{{ $item->username }}</a>
                                                    </span>
                                                    </p>
                                                </div>
                                            @endif
                                            @if($item->social_media == "instagram" && count($item->username) > 0)
                                                <div class="col-sm-6 col-lg-4" style="">
                                                    <p style="">
                                                    <span>
                                                        <i class="fab fa-instagram" style="margin-right: 5px; font-size: 26px"> </i>
                                                        <a href="http://www.instagram.com/{{ $item->username }}" class="center-with-icon" style="color: inherit" title="Click to visit">{{ $item->username }}</a>
                                                    </span>
                                                    </p>
                                                </div>
                                            @endif
                                            @if($item->social_media == "google-plus" && count($item->username) > 0)
                                                <div class="col-sm-6 col-lg-4" style="">
                                                    <p style="">
                                                        <span>
                                                            <i class="fab fa-google-plus-g" style="margin-right: 5px; font-size: 26px"> </i>
                                                            <span class="center-with-icon">{{ $item->username }}</span>/
                                                        </span>
                                                    </p>
                                                </div>
                                            @endif
                                            @if($item->social_media == "twitter" && count($item->username) > 0)
                                                <div class="col-sm-6 col-lg-4" style="">
                                                    <p style="">
                                                        <span>
                                                            <i class="fab fa-twitter" style="margin-right: 5px; font-size: 26px"> </i>
                                                            <a href="http://www.twitter.com/{{ $item->username }}" class="center-with-icon" style="color: inherit" title="Click to visit">{{ $item->username }}</a>
                                                        </span>
                                                    </p>
                                                </div>
                                            @endif
                                            @if($item->social_media == "linkedin" && (count($item->username) > 0))
                                                <div class="col-sm-6 col-lg-4" style="">
                                                    <p style="">
                                                <span>
                                                    <i class="fab fa-linkedin" style="margin-right: 5px; font-size: 26px"> </i>
                                                    <a href="http://www.linkedin.com/{{ $item->username }}" class="center-with-icon" style="color: inherit" title="Click to visit">{{ $item->username }}</a>
                                                </span>
                                                    </p>
                                                </div>
                                            @endif
                                            @if($item->social_media == "whatsapp" && count($item->username) > 0)
                                                <div class="col-sm-6 col-lg-4" style="">
                                                    <p style="">
                                                        <span>
                                                            <i class="fab fa-whatsapp" style="margin-right: 5px; font-size: 26px"> </i>
                                                            <span class="center-with-icon">{{ $item->username }}</span>
                                                        </span>
                                                    </p>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="custom-white-rounded-clickables" style="color: #fff; background-color: #000">
                                {{ $detail->category }}
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 35px">
                            <p>
                                <span>Date Created</span> | <span><em>Date Of Last Update</em></span>
                            </p>
                        </div>
                        <div class="col-md-12">
                            <p>
                        <span>
                            @if($detail->price_negotiable == 1)
                                <strong>{{ $detail->start_price }}&nbsp;(Negotiable)</strong>
                            @else
                                <strong>{{ $detail->start_price }}</strong>
                            @endif
                        </span>
                                <br>
                                <span>{{ $detail->price_desc }}</span>
                            </p>
                            <p>
                            <span>
                                <em>
                                    @for($iterator = 0; $iterator < count($listOfWorkingDays ); $iterator++)
                                        {{$listOfWorkingDays[$iterator]}}@if($iterator != count($listOfWorkingDays)-1),@endif
                                    @endfor
                                </em>
                            </span>
                                <br>
                                <strong>On <span style="text-transform: lowercase">{{ $detail->type }}</span> basis.</strong>
                                <br>
                                <span><strong>Working hours: </strong>{{ $detail->working_hours_start." - ".$detail->working_hours_end }}</span>
                                <br>
                            </p>
                        </div>
                        <div class="col-md-12">
                            <p>
                                <strong>Qualification</strong>
                                <br>
                                <span>{{ $detail->qualification }}</span>
                                <br>
                                <strong>Experience: </strong><span id="service-clientele">{{ $detail->number_of_years_ex }}</span>
                                <br>
                                <strong>Clientele: </strong><span id="service-clientele">{{ $detail->clientele }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <h6 style="font-weight: 300; ">Image Gallery</h6>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-body service-media-card-body">
                                    <img src="{{ url('/images/temp1.jpeg') }}" style="width: 100%">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-body service-media-card-body">
                                    <img src="{{ url('/images/temp2.jpeg') }}" style="width: 100%">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-body service-media-card-body">
                                    <img src="{{ url('/images/temp3.jpeg') }}" style="width: 100%">
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6 style="font-weight: 300; ">Video Gallery</h6>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-body service-media-card-body">
                                    <video style="width: 100%" controls>
                                        <source src="{{ url('/videos/Zumah.mp4') }}" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-body service-media-card-body">
                                    <video style="width: 100%" controls>
                                        <source src="{{ url('/videos/Zumah.mp4') }}" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-body">
                                    <video src="{{ url('/videos/Zumah.mp4') }}" style="width: 100%" controls>
                                        <source src="{{ url('/videos/Zumah.mp4') }}" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            </div>
            <div style="height: 18vh;"></div>
        </div>
    @endforeach
@endsection