@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="margin-bottom: 25px">
            <div class="col-md-12">
                <div id="about-lang-switcher" class="custom-white-rounded-clickables" data-current-Lang="ENG" onclick="switchAboutLanguage(this)">
                    Get this page in Twi
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-img">
                        <img src="{{ url('/images/big_logo.jpg') }}" height="100%" width="100%">
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                {{--<p>&nbsp;</p>--}}
                <div id="about-inner-holder" data-about-lang="ENG">
                    <p>
                        Zumah is coined from the Xhosa word, xhuma, a language commonly spoken by the people of the Zulu clan in South Africa. And it simply means connect.
                    </p>
                    <p>
                        Zumah is a total services hub, connecting all service providers to people who require these and vice versa. Every single service can be found on this platform, from a programmer, a business consultant to a carpenter near you.
                    </p>
                    <p>
                        The platform works per your given location, bringing out every single service you seek from the remotest place you could find yourself. Zumah helps you develop your services via AD campaigns and targeted marketing techniques to help you reach wide a variety of audience.
                    </p>
                    <p>
                        Anyone can post their services and anyone can use any of the services from the platform in diverse ways. It is flexible, easy to use works with total efficiency.
                    </p>
                    <p>
                        Zumah is currently the only platform of its kind in Africa, working solely in 360 degrees services.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 18vh;"></div>
@endsection
