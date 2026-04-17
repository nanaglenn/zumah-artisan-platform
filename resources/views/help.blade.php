@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-1g-12">
                <h4 style="font-weight: normal !important;">Register as a Service Provider</h4>
                <span>
                    <small>September 20, 2018 &nbsp;&nbsp;<span style="font-size: 15px;">|</span>&nbsp;&nbsp; Published by <strong> Zumah </strong> Administrator</small>
                </span>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <p>Are you interested in Advertising your services on the best total 360 services platform, <strong> Zumah </strong>? It only takes a few steps to register as a service provider. Just follow these simple steps to do so.</p>
            </div>

            <div class="col-sm-12 col-md-12">
                <p>
                    <strong>Click the "SIGN UP" button on the carousel of the <a href="{{ url('/home') }}" target="_blank" rel="noopener noreferrer"><strong> Zumah </strong> Homepage</a></strong>
                </p>
                <div class="grey lighten-2 valign-wrapper" style="width: 100%; height: 100px;">
                    <img src="{{ url('/images/Navbar.png') }}" alt="" width="100%">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <p>This displays an overlay with a simple registration form.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <p>Please fill out the form, read and agree to the <a href="{{ url('/terms&conditions') }}">terms and conditions</a> and also the <a href="{{ url('/terms&conditions') }}">privacy policy</a> of <strong> Zumah </strong>.</p>
                <br>
            </div>
            <div class="col-sm-12 col-md-12">
                {{--<div class="grey lighten-2 valign-wrapper center" style="height: 500px;">--}}
                    <img src="{{ url('/images/signup_pop_up_sc.png') }}" alt="" width="100%" style="margin: auto;">
                {{--</div>--}}
            </div>
            {{--<div class="col-sm-12">--}}
                {{--<br>--}}
                {{--<p>Click the register button. After successful registration you will receive a success message on the screen indicating a redirect to your service provider platform where you can load your services' information. Verify your phone number and login. You can now upload all your services.</p>--}}
            {{--</div>--}}
        </div>

        {{--<div class="row">--}}
            {{--<div class="col-sm-12">--}}
                {{--<p>Read and agree to the terms and conditions of <strong> Zumah </strong>.</p>--}}
                {{--<br>--}}
                {{--<img src="{{ url('/images/tandc_sc.png') }}" alt="" width="100%">--}}
            {{--</div>--}}
        {{--</div>--}}

        <div class="row">
            <div class="col-sm-12">
                <br>
                <p>Click the register button. After successful registration you will receive a success message on the screen indicating a redirect to your service provider platform where you can load your services' information. Verify your phone number and login. You can now upload all your services.</p>
            </div>
        </div>
</div>
    <div style="height: 18vh;"></div>
@endsection
