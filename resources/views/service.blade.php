@extends('layouts.app')

@section('content')
    @foreach($serviceDetails as $detail)
        <meta property="og:url"                content="{{ url('/service-details/'.$detail->id) }}" />
        <meta property="og:type"               content="website" />
        <meta property="og:description"        content="{{ $detail->service_desc }}" />
        <meta property="og:image"              content="{{ url('/images/logo.jpg') }}" />
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            @foreach($serviceImages as $serviceImage)
                                <img src="{{ url('/storage/service_images/'.$serviceImage->image_name_0) }}" height="207px" width="100%">
                                @break
                            @endforeach
                            <h5 style="text-align: center; margin-top: 17px; margin-bottom: 10px">{{ $detail->name }}</h5>
                            <p style="margin-top: 13px; margin-bottom: 13px; text-align: center">
                                <span>
                                    <em style="text-transform: capitalize">{{ $detail->category }} - {{ $detail->type }}</em>
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
                    {{----}}
                    <div class="card">
                        <div class="card-body">
                            <table class="table-responsive table " style="width: 100%">
                                <tbody>
                                    <tr>
                                        <td style="border-top: 0; text-align: center">
                                            @foreach($service_gbi as $item)
                                                <h5 style="margin-bottom: 0; display: inline-block">
                                                    {{ $item->company_name }}
                                                </h5>
                                                <br>
                                                <span>
                                                    <i class="fas fa-map-marker-alt"></i>
                                                    <em>{{ $detail->region ." Region - ". $detail->city }}</em>
                                                </span>
                                                <br>
                                                <span>
                                                    <em>{{ $detail->created_at }}</em>
                                                </span>
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="service-detail-title">
                                                <i class="fas fa-tags"></i> Pricing
                                            </span>
                                            <br>
                                            From GH¢ {{ $detail->start_price }}&nbsp;(Negotiable)
                                            <br>
                                            {{ $detail->price_desc }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="service-detail-title"><i class="fas fa-info-circle"></i> Service Description</span>
                                            <br>
                                            {{ $detail->service_desc }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="service-detail-title">
                                                <i class="fas fa-info-circle"></i> Business Description
                                            </span>
                                            <br>
                                            @foreach($service_gbi as $item)
                                                {{ $item->business_desc }}
                                                <meta property="og:title"              content="{{ $item->business_desc }}" />
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="service-detail-title">
                                                <i class="fas fa-info-circle"></i> Business Goals
                                            </span>
                                            <br>
                                            @foreach($service_gbi as $item)
                                                {{ $item->business_goals }}
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="service-detail-title">
                                                <i class="fas fa-clock"></i> Working Days
                                            </span>
                                            <br>
                                            <span>
                                                    @for($iterator = 0; $iterator < count($listOfWorkingDays ); $iterator++)
                                                    {{$listOfWorkingDays[$iterator]}}@if($iterator != count($listOfWorkingDays)-1),@endif
                                                @endfor
                                                </span>
                                            <br>
                                            <span>
                                                    <em style="font-weight: bold">{{ $detail->working_hours_start." - ".$detail->working_hours_end }}</em>
                                                </span>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="service-detail-title">
                                                <i class="fas fa-user-check"></i> Qualification
                                            </span>
                                            <br>
                                            <span>{{ $detail->qualification }}</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{----}}
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="row card-body" style="margin-bottom: 0">
                            <div class="col-lg-12">
                                <h6 style="text-align: center">Contact Information</h6>
                                <hr>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-xs-6">
                                <p>
                                    <span style="font-size: 20px; margin-right: 8px;">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                    @foreach($service_gbi as $item)
                                        <a href="mailto:serviceprovider@mail.com" class="center-with-icon">{{ $item->business_email }}</a>
                                    @endforeach
                                </p>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-xs-6">
                                <p>
                                    <span style="font-size: 20px; margin-right: 8px;">
                                        <i class="fas fa-phone"></i>
                                    </span>
                                    @foreach($service_gbi as $item)
                                        <span class="center-with-icon">
                                            <a href="tel:233{{ $item->phone  }}">+233{{ $item->phone }}</a>
                                        </span>
                                    @endforeach
                                </p>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-xs-6">
                                <p>
                                    <span style="font-size: 20px; margin-right: 8px;">
                                        <i class="fas fa-share-alt"></i>
                                    </span>
                                    <a href="javascript:void(0)" class="center-with-icon" data-url="{{ url('/service-details/'.$serviceId) }}" onclick="document.getElementById('service-url-to-copy-container').value = this.getAttribute('data-url'); copyServiceUrlToClipboard('service-url-to-copy-container')">Share this service</a>
                                </p>
                            </div>
                            {{--<hr style="width: 100%">--}}
                            @foreach($service_smp as $item)
                                @if($item->social_media == "facebook" && count($item->username) > 0)
                                    <div class="col-lg-4 col-sm-6 col-xs-6" style="">
                                        <p style="">
                                            <span>
                                                <i class="fab fa-facebook" style="margin-right: 5px; font-size: 26px"> </i>
                                                <a class="center-with-icon" style="color: inherit" title="Click to visit">{{ $item->username }}</a>
                                            </span>
                                        </p>
                                    </div>
                                @endif
                                @if($item->social_media == "instagram" && count($item->username) > 0)
                                    <div class="col-lg-4 col-sm-6 col-xs-6" style="">
                                        <p style="">
                                            <span>
                                                <i class="fab fa-instagram" style="margin-right: 5px; font-size: 26px"> </i>
                                                <a href="http://www.instagram.com/{{ $item->username }}" target="_blank" class="center-with-icon" style="color: inherit" title="Click to visit">{{ $item->username }}</a>
                                            </span>
                                        </p>
                                    </div>
                                @endif
                                @if($item->social_media == "google-plus" && count($item->username) > 0)
                                    <div class="col-lg-4 col-sm-6 col-xs-6" style="">
                                        <p style="">
                                            <span>
                                                <i class="fab fa-google-plus-g" style="margin-right: 5px; font-size: 26px"> </i>
                                                <span class="center-with-icon">{{ $item->username }}</span>/
                                            </span>
                                        </p>
                                    </div>
                                @endif
                                @if($item->social_media == "twitter" && count($item->username) > 0)
                                    <div class="col-lg-4 col-sm-6 col-xs-6" style="">
                                        <p style="">
                                <span>
                                    <i class="fab fa-twitter" style="margin-right: 5px; font-size: 26px"> </i>
                                    <a href="http://www.twitter.com/{{ $item->username }}" target="_blank" class="center-with-icon" style="color: inherit" title="Click to visit">{{ $item->username }}</a>
                                </span>
                                        </p>
                                    </div>
                                @endif
                                @if($item->social_media == "linkedin" && (count($item->username) > 0))
                                    <div class="col-lg-4 col-sm-6 col-xs-6" style="">
                                        <p style="">
                                <span>
                                    <i class="fab fa-linkedin" style="margin-right: 5px; font-size: 26px"> </i>
                                    <a href="http://www.linkedin.com/{{ $item->username }}" target="_blank" class="center-with-icon" style="color: inherit" title="Click to visit">{{ $item->username }}</a>
                                </span>
                                        </p>
                                    </div>
                                @endif
                                @if($item->social_media == "whatsapp" && count($item->username) > 0)
                                    <div class="col-lg-4 col-sm-6 col-xs-6" style="">
                                        <p style="">
                                <span>
                                    <i class="fab fa-whatsapp" style="margin-right: 5px; font-size: 26px"> </i>
                                    <a href="https://wa.me/{{  $item->username }}" target="_blank" class="center-with-icon">{{ $item->username }}</a>
                                </span>
                                        </p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-12">
                        <h6 style="font-weight: 300; ">Image Gallery</h6>
                    </div>
                    <div class="col-md-12">
                        <div class="" style="white-space: nowrap; overflow-x: scroll">
                            @foreach($serviceImages as $serviceImage)
                                @if($serviceImage->image_name_0)
                                    <div class="card" style="display: inline-block;">
                                        <div class="card-body service-media-card-body" style="display:inline-block;">
                                            <img src="{{ url('/storage/service_images/'.$serviceImage->image_name_0) }}" style="width: 200px; height: 200px">
                                        </div>
                                    </div>

                                    <div class="card" style="display: inline-block;">
                                        <div class="card-body service-media-card-body" style="display:inline-block;">
                                            <img src="{{ url('/storage/service_images/'.$serviceImage->image_name_0) }}" style="width: 200px; height: 200px">
                                        </div>
                                    </div>

                                    <div class="card" style="display: inline-block;">
                                        <div class="card-body service-media-card-body" style="display:inline-block;">
                                            <img src="{{ url('/storage/service_images/'.$serviceImage->image_name_0) }}" style="width: 200px; height: 200px">
                                        </div>
                                    </div>
                                @endif
                                @if($serviceImage->image_name_1)
                                    <div class="card" style="display: inline-block;">
                                        <div class="card-body service-media-card-body" style="display:inline-block;">
                                            <img src="{{ url('/storage/service_images/'.$serviceImage->image_name_1) }}" style="width: 200px; height: 200px">
                                        </div>
                                    </div>
                                    <div class="card" style="display: inline-block;">
                                        <div class="card-body service-media-card-body" style="display:inline-block;">
                                            <img src="{{ url('/storage/service_images/'.$serviceImage->image_name_1) }}" style="width: 200px; height: 200px">
                                        </div>
                                    </div>
                                    <div class="card" style="display: inline-block;">
                                        <div class="card-body service-media-card-body" style="display:inline-block;">
                                            <img src="{{ url('/storage/service_images/'.$serviceImage->image_name_1) }}" style="width: 200px; height: 200px">
                                        </div>
                                    </div>
                                @endif
                                @if($serviceImage->image_name_2)
                                    <div class="card" style="display: inline-block;">
                                        <div class="card-body service-media-card-body" style="display:inline-block;">
                                            <img src="{{ url('/storage/service_images/'.$serviceImage->image_name_2) }}" style="width: 200px;height: 200px">
                                        </div>
                                    </div>
                                @endif
                                @if($serviceImage->image_name_3)
                                    <div class="card" style="display: inline-block;">
                                        <div class="card-body service-media-card-body" style="display:inline-block;">
                                            <img src="{{ url('/storage/service_images/'.$serviceImage->image_name_3) }}" style="width: 200px; height: 200px">
                                        </div>
                                    </div>
                                @endif
                                @if($serviceImage->image_name_4)
                                    <div class="card" style="display: inline-block;">
                                        <div class="card-body service-media-card-body" style="display:inline-block;">
                                            <img src="{{ url('/storage/service_images/'.$serviceImage->image_name_4) }}" style="width: 200px; height: 200px">
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                {{--<div class="col-lg-4">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-12">--}}
                            {{--<div class="custom-white-rounded-clickables" style="color: #fff; background-color: #000">--}}
                                {{--{{ $detail->category }}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-12" style="margin-top: 35px">--}}
                            {{--<p>--}}
                                {{--<span> <strong>Date created:</strong> <em>{{ $detail->created_at }}</em></span>--}}
                                {{--<br>--}}
                                {{--<span> <strong>Last updated:</strong> <em>{{ $detail->updated_at }}</em></span>--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="col-lg-8">

                </div>
            </div>
            <div class="row">
            </div>
            <div style="height: 18vh;"></div>
        </div>
    @endforeach
@endsection