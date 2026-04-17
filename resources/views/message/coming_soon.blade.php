<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        <!-- Styles -->

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{--FONTS--}}
        <link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet">
        <style>
            .social_icons{
                color: #c5c5c5;
                text-decoration: none;
            }
            .social_icons > i{
                font-size: 3rem;
                padding: 10px;
            }

            .social_icons:hover{
                text-decoration: none;
            }
        </style>
    </head>

    <body style="overflow-x: hidden">
        <div class="container-fluid" style="padding: 0;margin: 0;">
            <div class="row" style="margin: 0; padding: 0; height: 100%">
                <div class="col-md-6" style="padding: 0;">
                    <img src="{{ url('/images/big_logo.jpg') }}" style="width: 100%; padding-top: 0; padding-bottom: 0; height: 100%">
                </div>
                <div class="col-md-6">
                    <p style="text-align: center; font-size: 1.5rem; padding-bottom: 50px;font-family: 'Josefin Slab', serif; font-weight: bold; line-height: 50px">
                        Our aim is to connect Service Providers to people(clients) who require them and vice versa within the shortest possible time.<br>Every single service can be found on this platform, from a programmer, a business consultant to a carpenter near you.
                        <br>
                        This system is under development and will soon be made available to the general public. New and useful features are being integrated into the system while existing ones are being improved upon for a better user experience.
                        <br>
                        <br>

                        <strong style="font-weight: 700">Zumah, </strong> <em>your total services platform</em>.

                        <ul style="position: relative; bottom: 0; width: 100%; padding-left: 0; text-align: center">
                            <li style="display: inline">
                                <a href="https://www.facebook.com/zumahafrica/" class="social_icons" target="_blank">
                                    <i class="fab fa-facebook"> </i>
                                </a>
                            </li>
                            <li style="display: inline">
                                <a href="https://twitter.com/zumahafrica" class="social_icons" target="_blank">
                                    <i class="fab fa-instagram"> </i>
                                </a>
                            </li>
                            <li style="display: inline">
                                <a href="https://www.instagram.com/p/BmvHN2Qg0nD/" class="social_icons" target="">
                                    <i class="fab fa-twitter"> </i>
                                </a>
                            </li>
                        </ul>
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>