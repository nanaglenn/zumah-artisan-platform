<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css">
    <link href="{{ url('/css/style.css') }}" rel="stylesheet">
    <link href="{{ url('/css/alerts.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ url('/css/materialize.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="padding: 0; height: 100%">
            <div class="container" >
                {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}" style="border: 0; padding: 0; margin-left: 10px" >--}}
                <button class="navbar-toggler" type="button" onclick="switchForCollapsibles('navbarSupportedContent')" style="border: 0; padding: 0; margin-left: 10px" >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <a class="navbar-brand" href="{{ route('home') }}"  style="padding: 0">
                    <img src="{{ url('/images/logo.jpg') }}" height="100%" width="125">
                </a>

                {{--<div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 10px">--}}
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
                                <a class="nav-link" href="{{ route('help') }}">Help</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0)" onclick="showOverlay('loginOverlay')">{{ __('Login') }}</a>
                            </li>
                        @else

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about') }}">About</a>
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="page-footer grey darken-1" style="position: relative !important;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <h5 class="white-text">
                            <i class="fas fa-globe-africa" style="cursor: pointer; margin-right: 3px;"></i>
                            <span class="left" style="font-size: 12px; margin-right: 10px;">EN</span>Zumah Company Limited
                        </h5>
                        <p class="grey-text text-lighten-4">
                            Zumah is coined from the Xhosa word, xhuma, a language commonly spoken by the people of the Zulu clan in South Africa.
                            And it simply means connect. Zumah is a total services hub, connecting all service providers to people who require these and vice versa.
                            Every single service can be found on this platform, from a programmer, a business consultant to a carpenter near you.
                            The platform works per your given location, bringing out every single service you seek from theremotest place you could find yourself.
                            Zumah helps you develop your services via AD campaigns and targeted marketing techniques to help you reach wide a variety of audience.
                            Anyone can post their services and anyone can use any of the services from the platform in diverse ways.
                            It is flexible, easy to use works with total efficiency. Zumah is currently the only platform of its kind in Africa, working solely in 360 degrees services.
                        </p>
                    </div>
                    <div class="col-sm-12 col-sm-6 col-lg-4">
                        <h5 class="white-text">Services</h5>
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="footer-links-list">
                                    <li>
                                        <a class="grey-text text-lighten-3" href="#!">Security</a>
                                    </li>
                                    <li>
                                        <a class="grey-text text-lighten-3" href="#!">Fashion &amp; Beauty</a>
                                    </li>
                                    <li>
                                        <a class="grey-text text-lighten-3" href="#!">Housing</a>
                                    </li>
                                    <li>
                                        <a class="grey-text text-lighten-3" href="#!">Education</a>
                                    </li>
                                    <li>
                                        <a class="grey-text text-lighten-3" href="#!">Sports</a>
                                    </li>
                                    <li>
                                        <a class="grey-text text-lighten-3" href="#!">Events</a>
                                    </li>
                                    <li>
                                        <a class="grey-text text-lighten-3" href="#!">Documentation</a>
                                    </li>
                                    <li>
                                        <a class="grey-text text-lighten-3" href="#!">Logistics</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="footer-links-list">
                                    <li>
                                        <a class="grey-text text-lighten-3" href="#!">Finance</a>
                                    </li>
                                    <li>
                                        <a class="grey-text text-lighten-3" href="#!">Hospitality</a>
                                    </li>
                                    <li>
                                        <a class="grey-text text-lighten-3" href="#!">Info. Technology (IT)</a>
                                    </li>
                                    <li>
                                        <a class="grey-text text-lighten-3" href="#!">Building &amp; Engineering</a>
                                    </li>
                                    <li>
                                        <a class="grey-text text-lighten-3" href="#!">Entertainment &amp; Media</a>
                                    </li>
                                    <li>
                                        <a class="grey-text text-lighten-3" href="#!">General Business</a>
                                    </li>
                                    <li>
                                        <a class="grey-text text-lighten-3" href="#!">Agriculture</a>
                                    </li>
                                    <li>
                                        <a class="grey-text text-lighten-3" href="#!">Hand Work</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l2">
                        <h5 class="white-text">Quick Links</h5>
                        <ul class="footer-links-list">
                            <li>
                                <a class="grey-text text-lighten-3" href="{{ route('about') }}">About</a>
                            </li>
                            <li>
                                <a class="grey-text text-lighten-3" href="#!">Services</a>
                            </li>
                            <li>
                                <a class="grey-text text-lighten-3" href="#!">Events</a>
                            </li>
                            <li>
                                <a class="grey-text text-lighten-3" href="#!">Jobs</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col s12 m6 l2">
                        <h5 class="white-text">Contact</h5>
                        <ul class="footer-links-list">
                            <li>
                                <a class="grey-text text-lighten-3" href="#!">zumah.net@gmail.com / vortexxmarketing@gmail.com<br>
                                    <strong>Address:</strong> Post Office Box AN 19652 Madina, Beside Ecobank, Market</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">© 2019 Copyright Zumah</div>
            </div>
        </footer>

        <div id="signupOverlay" class="overlay">
            <div class="container" style="height: 100%;">
                <div class="row" style="margin-bottom: 25px; display: flex; align-items: center; justify-content: center; padding: 30px">
                    <div id="sign-up" class="col-sm-8 col-lg-4 col-xs-8 col-md-4 white z-depth-half" style="padding: 20px 35px; border-radius: 10px; background-color: #fff; border: 1px solid #d6d6d6; box-shadow: 0 1px 1px 0 rgba(0,0,0,.14), 0 1.5px 0.25px -1px rgba(0,0,0,.12), 0 0.5px 2.5px 0 rgba(0,0,0,.2);">
                        <h6 style="font-weight: 300; text-align: center">Service Provider Registration</h6>
                        <div class="row">
                            <div style="height: 250px; overflow-y: auto; overflow-x: hidden">
                                <form id="sign-up-form">
                                    <div class="row">
                                        <div class="input-field col col-sm-12">
                                            <input id="signup_full_name" type="text" class="validate invalid" required="">
                                            <label for="signup_full_name" class="">Full Name</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col col-md-3">
                                            <input id="signup_country_code" type="text" class="validate" required="" disabled="" value="+233">
                                            {{--<label for="signup_country_code" class="active">Country Code</label>--}}
                                        </div>
                                        <div class="input-field col col-md-9">
                                            <input id="signup_contact" type="text" class="validate invalid" required="" onkeyup="serviceProviderSignUpPhoneCheck(this.value)">
                                            <p id="phone-error-msg" class="input-error-message">Invalid phone number</p>
                                            <label for="signup_contact" class="">Contact</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col col-md-6">
                                            <input id="signup_email" type="email" autocomplete="email" class="validate invalid" required="" onkeyup="serviceProviderSignUpEmailCheck(this.value)">
                                            <p id="email-error-msg" class="input-error-message">Email already in use</p>
                                            <label for="signup_email" class="">Email</label>
                                        </div>
                                        <div class="input-field col col-md-6">
                                            <input id="signup_password" type="password" class="validate invalid" autocomplete="new-password" required="">
                                            <p id="password-error-msg" class="input-error-message">Minimum of 6 characters</p>
                                            <label for="signup_password" class="">Password</label>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 0px;">
                                        <div class="col-sm-12 col-lg-12">
                                            <p>
                                                <label>
                                                    <input type="checkbox" id="agree_to_terms" class="browser-default filled-in" required="true" checked="" onclick="checkBoxState('agree_to_terms')">
                                                    <span class="grey-text text-darken-2" style="font-size: 0.8rem;">
                                                    By checking you agree that you have read and accept our<a href="javascript:void(0)" data-toggle="collapse" data-target="#terms-and-conditions-container" onclick="termsAndConditionsClicked()"> Terms &amp; Conditions</a>&nbsp; and that you have also read our <a href="javascript:void(0)" onclick="termsAndConditionsClicked()" class="modal-trigger">Privacy Policy</a>.</span>
                                                </label>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row" style="text-align: center">
                                        <div class="col-sm-12 col-md-12">
                                            <a class="btn black white-text" href="javascript:void(0)" style="border-radius: 30px;" onclick="serviceProviderSignUp(document.getElementById('signup_full_name').value, document.getElementById('signup_contact').value, document.getElementById('signup_email').value, document.getElementById('signup_password').value)">
                                                Register
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 20px !important;">
                            <div class="col-sm-12 col-md-12" style="text-align: center">
                                <span>© Zumah 2019</span>
                            </div>
                        </div>

                        <div class="overlay-close" style="" onclick="hideOverlay('signupOverlay')">
                            <span>[close]</span>
                        </div>
                    </div>
                </div>

                <div id="terms-and-conditions-container" class="row collapse" >
                    <div class="col-sm-12">
                        <div class="card z-depth-quater" style="border-radius: 30px;">
                            <div class="card-content">
                                <div class="col-md-12 col-1g-12">
                                    <h4 style="font-weight: normal !important;">Terms and Conditions / Privacy Policy</h4>
                                </div>

                                <h5 style="font-weight: 300;">Website/App Usage Terms and Conditions</h5>

                                <p>Welcome to our website. If you continue to browse and use this website, you are agreeing to comply with and be bound by the following terms and conditions of use, which together with our privacy policy govern Vacation Exchange International (Proprietary) Limited’s (trading as RCI Africa) relationship with you in relation to this website. If you disagree with any part of these terms and conditions, please do not use our website.</p>
                                <p>The terms “RCI” or ‘us’ or ‘we’ refers to the owner of the website whose registered office is MADINA, ACCRA GHANA.
                                    <br>
                                    Our company registration number is 1990/005818/07. The term ‘you’ refers to the user or viewer of our website.
                                    <br>
                                    The use of this website is subject to the following terms of use:
                                </p>
                                <ul class="browser-default" style="padding-left: 15px;">
                                    <li>
                                        The content of the pages of this website is for your general information and use only. It is subject to change without notice
                                    </li>
                                    <li>
                                        This website uses cookies to monitor browsing preferences. If you do allow cookies to be used, the following personal information may be stored by us for use by third parties: name, location, membership number, IP address and browsing history.
                                    </li>
                                    <li>
                                        Neither we nor any third parties provide any warranty or guarantee as to the accuracy, timeliness, performance, completeness or suitability of the information and materials found or offered on this website for any particular purpose. You acknowledge that such information and materials may contain inaccuracies or errors and we expressly exclude liability for any such inaccuracies or errors to the fullest extent permitted by law.
                                    </li>
                                    <li>
                                        Your use of any information or materials on this website is entirely at your own risk, for which we shall not be liable. It shall be your own responsibility to ensure that any products, services or information available through this website meet your specific requirements.
                                    </li>
                                    <li>
                                        This website contains material which is owned by or licensed to us. This material includes, but is not limited to design, layout, look, appearance, photos and graphics. Reproduction is prohibited other than in accordance with the copyright notice, which forms part of these terms and conditions.
                                    </li>
                                    <li>
                                        All trademarks reproduced in this website, which are not the property of, or licensed to the operator, are acknowledged on the website.
                                    </li>
                                    <li>
                                        Unauthorised use of this website may give rise to a claim for damages and/or be a criminal offence.
                                    </li>
                                    <li>
                                        From time to time, this website may also include links to other websites.
                                        These links are provided for your convenience to provide further information. They do not signify that we endorse the website(s).
                                        We have no responsibility for the content of the linked website(s). Some information provided on this Website has been obtained from third parties and is provided for informational purposes only.
                                        We are not liable for any inaccuracies in any third party information provided on this Web Site and does not endorse any of the activities, guides, vendors or service providers described.
                                        It is your responsibility to investigate the safety and suitability of any activity, and the credentials and fitness of any third party guide, vendor or service provider.
                                        We expressly deny any liability for engagement in any activity, and for use of any third party guide, vendor or service provider that may be mentioned or described on this Website.
                                        Additional fees, terms and conditions, and restrictions may apply to any activity or service and are determined solely by the third party vendor, guide, or service provider.
                                        Please contact the third party service provider, guide or vendor for complete details. We do not book, nor do we make any representations regarding the availability of third party activities or services.
                                    </li>
                                    <li>
                                        Your use of this website and any dispute arising out of such use of the website is subject to the laws of the Republic of of GHANA.
                                    </li>
                                    <li>
                                        Words and expressions used in these website usage terms and conditions shall bear the ordinary meaning assigned to them unless the context dictates otherwise.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="card z-depth-quater" style="border-radius: 30px;">
                            <div class="card-content">
                                <h5 style="font-weight: 300;">Zumah Privacy Policy</h5>
                                <p>
                                    We (ZUMAH) respect the privacy of our users. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our mobile application ZUMAH.
                                    Please read this Privacy Policy carefully. IF YOU DO NOT AGREE WITH THE TERMS OF THIS PRIVACY POLICY, PLEASE DO NOT ACCESS THE APPLICATION.</p>
                                <p>
                                    We reserve the right to make changes to this Privacy Policy at any time and for any reason. We will alert you about any changes by updating the “Last updated” date of this Privacy Policy.
                                    You are encouraged to periodically review this Privacy Policy to stay informed of updates. You will be deemed to have been made aware of, will be subject to, and will be deemed to have accepted the changes in any revised Privacy Policy by your continued use of the Application after the date such revised Privacy Policy is posted.</p>
                                <p>
                                    This Privacy Policy does not apply to the third-party online/mobile store from which you install the Application or make payments, including any in-game virtual items, which may also collect and use data about you.
                                    We are not responsible for any of the data collected by any such third party.
                                </p>
                                <h6>
                                    COLLECTION OF YOUR INFORMATION
                                </h6>
                                <p>We may collect information about you in a variety of ways. The information we may collect via the Application depends on the content and materials you use, and includes: </p><h6>Personal Data</h6>
                                <p>
                                    Demographic and other personally identifiable information (such as your name and email address) that you voluntarily give to us when choosing to participate in various activities related to the Application, such as chats, posting messages in comment sections or in our forums, liking posts, sending feedback, and responding to surveys.
                                    If you choose to share data about yourself via your profile, online chat, or other interactive areas of the Application, please be advised that all data you disclose in these areas is public and your data will be accessible to anyone who accesses the Application.
                                </p>
                                <h6>Derivative Data</h6>
                                <p>
                                    Information our servers automatically collect when you access the Application, such as your native actions that are integral to the Application, including liking, re-blogging, or replying to a post, as well as other interactions with the Application and other users via server log files.
                                </p>
                                <h6>Financial Data</h6>
                                <p>
                                    Financial information, such as data related to your payment method (e.g. valid credit card number, card brand, expiration date) that we may collect when you purchase, order, return, exchange, or request information about our services from the Application. We store only very limited, if any, financial information that we collect. Otherwise, all financial information is stored by our payment processor, Mobile money companies such as MTN MOBILE MONEY, TIGO CASH, AIRTEL MONEY OR VODAFONE CASH and CREDIT CARD COMPANIES such as PAYPAL, VISA, and MASTERCARD, and you are encouraged to review their privacy policy and contact them directly for responses to your questions.
                                </p>
                                <h6>Facebook Permissions</h6>
                                <p>
                                    The Application may by default access your Facebook basic account information, including your name, email, gender, birthday, current city, and profile picture URL, as well as other information that you choose to make public. We may also request access to other permissions related to your account, such as friends, check-ins, and likes, and you may choose to grant or deny us access to each individual permission. For more information regarding Facebook permissions, refer to the <a href="https://developers.facebook.com/docs/facebook-login/permissions" target="_blank" rel="noopener noreferrer">Facebook Permissions Reference page</a>.
                                </p>
                                <h6>
                                    Data from Social Networks
                                </h6>
                                <p>
                                    User information from social networking sites, such as [Apple’s Game Center, Facebook, Google+, Instagram, Pinterest, Twitter], including your name, your social network username, location, gender, date of birth, email address, profile picture, and public data for contacts, if you connect your account to such social networks. This information may also include the contact information of anyone you invite to use and/or join the Application.
                                </p>
                                <h6>
                                    Geo-Location Information
                                </h6>
                                <p>
                                    We may request access or permission to and track location-based information from your mobile device, either continuously or while you are using the Application, to provide location-based services. If you wish to change our access or permissions, you may do so in your device’s settings.
                                </p>
                                <h6>
                                    Mobile Device Access
                                </h6>
                                <p>
                                    We may request access or permission to certain features from your mobile device, including your mobile device’s [bluetooth, calendar, camera, contacts, microphone, reminders, sensors, SMS, social media accounts, storage,] and other features. If you wish to change our access or permissions, you may do so in your device’s settings.
                                </p>
                                <h6>
                                    Mobile Device Data
                                </h6>
                                <p>
                                    Device information such as your mobile device ID number, model, and manufacturer, version of your operating system, phone number, country, location, and any other data you choose to provide.
                                </p>
                                <h6>
                                    Push Notifications
                                </h6>
                                <p>
                                    We may request to send you push notifications regarding your account or the Application. If you wish to opt-out from receiving these types of communications, you may turn them off in your device’s settings.
                                </p>
                                <h6>
                                    Third-Party Data
                                </h6>
                                <p>
                                    Information from third parties, such as personal information or network friends, if you connect your account to the third party and grant the Application permission to access this information.
                                </p>
                                <h6>
                                    Data From Contests, Giveaways, and Surveys
                                </h6>
                                <p>
                                    Personal and other information you may provide when entering contests or giveaways and/or responding to surveys.
                                </p>
                                <h6>
                                    USE OF YOUR INFORMATION
                                </h6>
                                <p>
                                    Having accurate information about you permits us to provide you with a smooth, efficient, and customized experience. Specifically, we may use information collected about you via the Application to: </p>
                                <ul class="browser-default" style="padding-left: 15px;">
                                    <li>
                                        Administer sweepstakes, promotions, and contests.
                                    </li>
                                    <li>
                                        Assist law enforcement and respond to subpoena.
                                    </li>
                                    <li>
                                        Compile anonymous statistical data and analysis for use internally or with third parties.
                                    </li>
                                    <li>
                                        Create and manage your account.
                                    </li>
                                    <li>
                                        Deliver targeted advertisement, coupons, newsletters, and other information regarding promotions and the Application to you.
                                    </li>
                                    <li>
                                        Email you regarding your account or order.
                                    </li>
                                    <li>
                                        Enable user-to-user communications.
                                    </li>
                                    <li>
                                        Fulfill and manage purchases, orders, payments, and other transactions related to the Application.
                                    </li>
                                    <li>
                                        Generate a personal profile about you to make future visits to the Application more personalized.
                                    </li>
                                    <li>
                                        Increase the efficiency and operation of the Application.
                                    </li>
                                    <li>
                                        Monitor and analyze usage and trends to improve your experience with the Application.
                                    </li>
                                    <li>
                                        Notify you of updates to the Application.
                                    </li>
                                    <li>
                                        Offer new products, services, mobile applications, and/or recommendations to you.
                                    </li>
                                    <li>
                                        Perform other business activities as needed.
                                    </li>
                                    <li>
                                        Prevent fraudulent transactions, monitor against theft, and protect against criminal activities.
                                    </li>
                                    <li>Process payments and refunds.</li>
                                    <li>Request feedback and contact you about your use of the Application.</li>
                                    <li>Resolve disputes and troubleshoot problems.</li>
                                    <li>Respond to product and customer service requests.</li>
                                    <li>Send you a newsletter.</li>
                                    <li>Solicit support for the Application.</li>
                                    <li>[Others]</li>
                                </ul>
                                <h6>DISCLOSURE OF YOUR INFORMATION</h6>
                                <p>We may share information we have collected about you in certain situations. Your information may be disclosed as follows:</p>
                                <h6>By Law or to Protect Rights</h6>
                                <p>If we believe the release of information about you is necessary to respond to legal process, to investigate or remedy potential violations of our policies, or to protect the rights, property, and safety of others, we may share your information as permitted or required by any applicable law, rule, or regulation. This includes giving out information to other entities for fraud protection and credit risk reduction.</p>
                                <h6>Third-Party Service Providers</h6>
                                <p>We may share your information with third parties that perform services for us or on our behalf, including payment processing, data analysis, email delivery, hosting services, customer service, and marketing assistance.</p>
                                <h6>Marketing Communications</h6>
                                <p>With your consent, or with an opportunity for you to withdraw consent, we may share your information with third parties for marketing purposes, as permitted by law.</p>
                                <h6>Interactions with Other Users</h6>
                                <p>If you interact with other users of the Application, those users may see your name, profile photo, and descriptions of your activity, including sending invitations to other users, chatting with other users, liking posts, following blogs.</p>
                                <h6>Online Postings</h6>
                                <p>When you post comments, contributions or other content to the Applications, your posts may be viewed by all users and may be publicly distributed outside the Application in perpetuity.</p>
                                <h6>Third-Party Advertisers</h6>
                                <p>We may use third-party advertising companies to serve ads when you visit the Application. These companies may use information about your visits to the Application and other websites that are contained in web cookies in order to provide advertisements about goods and services of interest to you.</p>
                                <h6>Affiliates</h6>
                                <p>We may share your information with our affiliates, in which case we will require those affiliates to honor this Privacy Policy. Affiliates include our parent company and any subsidiaries, joint venture partners or other companies that we control or that are under common control with us.</p>
                                <h6>Business Partners</h6>
                                <p>We may share your information with our business partners to offer you certain products, services or promotions.</p>
                                <h6>Offer Wall</h6>
                                <p>The Application may display a third-party-hosted “offer wall.” Such an offer wall allows third-party advertisers to offer virtual currency, gifts, or other items to users in return for acceptance and completion of an advertisement offer. Such an offer wall may appear in the Application and be displayed to you based on certain data, such as your geographic area or demographic information. When you click on an offer wall, you will leave the Application. A unique identifier, such as your user ID, will be shared with the offer wall provider in order to prevent fraud and properly credit your account.</p>
                                <h6>Social Media Contacts</h6>
                                <p>If you connect to the Application through a social network, your contacts on the social network will see your name, profile photo, and descriptions of your activity.</p>
                                <h6>Other Third Parties</h6>
                                <p>We may share your information with advertisers and investors for the purpose of conducting general business analysis. We may also share your information with such third parties for marketing purposes, as permitted by law.</p>
                                <h6>Sale or Bankruptcy</h6>
                                <p>If we reorganize or sell all or a portion of our assets, undergo a merger, or are acquired by another entity, we may transfer your information to the acquiring entity. If we go out of business or enter bankruptcy, your information would be an asset transferred or acquired by a third party. You acknowledge that such transfers may occur and that the transferee may decline honor commitments we made in this Privacy Policy.</p>
                                <p>We are not responsible for the actions of third parties with whom you share personal or sensitive data, and we have no authority to manage or control third-party solicitations. If you no longer wish to receive correspondence, emails or other communications from third parties, you are responsible for contacting the third party directly.</p>
                                <h6>TRACKING TECHNOLOGIES</h6>
                                <h6>Cookies and Web Beacons</h6>
                                <p>We may use cookies, web beacons, tracking pixels, and other tracking technologies on the Application to help customize the Application and improve your experience. When you access the Application, your personal information is not collected through the use of tracking technology. Most browsers are set to accept cookies by default. You can remove or reject cookies, but be aware that such action could affect the availability and functionality of the Application. You may not decline web beacons. However, they can be rendered ineffective by declining all cookies or by modifying your web browser’s settings to notify you each time a cookie is tendered, permitting you to accept or decline cookies on an individual basis.</p>
                                <h6>Internet-Based Advertising</h6>
                                <p>Additionally, we may use third-party software to serve ads on the Application, implement email marketing campaigns, and manage other interactive marketing initiatives. This third-party software may use cookies or similar tracking technology to help manage and optimize your online experience with us. For more information about opting-out of interest-based ads, visit the Network Advertising Initiative Opt-Out Tool or Digital Advertising Alliance Opt-Out Tool.</p>
                                <h6>Website Analytics</h6>
                                <p>We may also partner with selected third-party vendors[, such as [Adobe Analytics,] [Clicktale HYPERLINK "https://www.clicktale.com/company/privacy-policy/",] [Clicky,] [Cloudfare,] [Crazy Egg,] [Flurry Analytics,] [Google Analytics,] [Heap Analytics,] [Inspectlet HYPERLINK "https://www.inspectlet.com/legal",] [Kissmetrics HYPERLINK "https://signin.kissmetrics.com/privacy",] [Mixpanel HYPERLINK "https://mixpanel.com/privacy/",] [Piwik HYPERLINK "https://piwik.org/privacy/",] and others], to allow tracking technologies and remarketing services on the Application through the use of first party cookies and third-party cookies, to, among other things, analyze and track users’ use of the Application, determine the popularity of certain content, and better understand online activity. By accessing the Application, you consent to the collection and use of your information by these third-party vendors. You are encouraged to review their privacy policy and contact them directly for responses to your questions. We do not transfer personal information to these third-party vendors. However, if you do not want any information to be collected and used by tracking technologies, you can install and/or update your settings for one of the following: [Adobe Privacy Ch HYPERLINK "http://www.adobe.com/privacy/opt-out.html"oices Page HYPERLINK "http://www.adobe.com/privacy/opt-out.html"] [Clicktale HYPERLINK "http://www.clicktale.net/disable.aspx" Opt-Out Feature] [Crazy Egg Opt-Out Feature] Digital Advertising Alliance Opt-Out Tool [Flurry Analytics Yahoo Opt-Out Manager] [Google Analytics Opt-Out Plugin] [Google Ads Settings Page] [Inspectlet HYPERLINK "https://www.inspectlet.com/optout" Opt-Out Cookie] [Kissmetrics HYPERLINK "https://www.kissmetrics.com/user-privacy/" Opt-Out Feature] [Mixpanel HYPERLINK "https://mixpanel.com/optout/" Opt-Out Cookie] Network Advertising Initiative Opt-Out Tool</p>
                                <p>You should be aware that getting a new computer, installing a new browser, upgrading an existing browser, or erasing or otherwise altering your browser’s cookies files may also clear certain opt-out cookies, plug-ins, or settings.</p>
                                <h6>THIRD-PARTY WEBSITES</h6>
                                <p>The Application may contain links to third-party websites and applications of interest, including advertisements and external services that are not affiliated with us. Once you have used these links to leave the Application, any information you provide to these third parties is not covered by this Privacy Policy, and we cannot guarantee the safety and privacy of your information. Before visiting and providing any information to any third-party websites, you should inform yourself of the privacy policies and practices (if any) of the third party responsible for that website, and should take those steps necessary to, in your discretion, protect the privacy of your information. We are not responsible for the content or privacy and security practices and policies of any third parties, including other sites, services or applications that may be linked to or from the Application.</p>
                                <h6>SECURITY OF YOUR INFORMATION</h6>
                                <p>We use administrative, technical, and physical security measures to help protect your personal information. While we have taken reasonable steps to secure the personal information you provide to us, please be aware that despite our efforts, no security measures are perfect or impenetrable, and no method of data transmission can be guaranteed against any interception or other type of misuse. Any information disclosed online is vulnerable to interception and misuse by unauthorized parties. Therefore, we cannot guarantee complete security if you provide personal information.</p>
                                <h6>POLICY FOR CHILDREN</h6>
                                <p>We do not knowingly solicit information from or market to children under the age of 13. If you become aware of any data we have collected from children under age 13, please contact us using the contact information provided below.</p>
                                <h6>CONTROLS FOR DO-NOT-TRACK FEATURES</h6>
                                <p>Most web browsers and some mobile operating systems [and our mobile applications] include a Do-Not-Track (“DNT”) feature or setting you can activate to signal your privacy preference not to have data about your online browsing activities monitored and collected. No uniform technology standard for recognizing and implementing DNT signals has been finalized. As such, we do not currently respond to DNT browser signals or any other mechanism that automatically communicates your choice not to be tracked online. If a standard for online tracking is adopted that we must follow in the future, we will inform you about that practice in a revised version of this Privacy Policy.</p>
                                <h6>OPTIONS REGARDING YOUR INFORMATION</h6>
                                <h6>Account Information</h6>
                                <p>You may at any time review or change the information in your account or terminate your account by:</p>
                                <ul class="browser-default" style="padding-left: 15px;">
                                    <li>Logging into your account settings and updating your account</li>
                                    <li>Contacting us using the contact information provided below</li>
                                    <li>[Other]</li>
                                </ul>
                                <p> Upon your request to terminate your account, we will deactivate or delete your account and information from our active databases. However, some information may be retained in our files to prevent fraud, troubleshoot problems, assist with any investigations, enforce our Terms of Use and/or comply with legal requirements.]</p>
                                <h6>Emails and Communications</h6>
                                <p>If you no longer wish to receive correspondence, emails, or other communications from us, you may opt-out by:</p>
                                <ul class="browser-default" style="padding-left: 15px;">
                                    <li>Noting your preferences at the time you register your account with the Application</li>
                                    <li>Logging into your account settings and updating your preferences.</li>
                                    <li>Contacting us using the contact information provided below</li>
                                </ul>
                                <p>If you no longer wish to receive correspondence, emails, or other communications from third parties, you are responsible for contacting the third party directly.</p>
                                <h6>CONTACT US</h6>
                                <p>If you have questions or comments about this Privacy Policy, please contact us at:</p>
                                <p>ZUMAH<br>M17 ASOFAN, OFANKOR<br>ACCRA-GHANA<br>+233-248547162<br>zumah.net@gmail.com<br></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="sign-up-to-top-arrow" style="width: 50px; height: 50px; border-radius: 50%; background-color: #fff; text-align: center; float: right; position: fixed; right: 50px; bottom: 50px; display: none; cursor: pointer; box-shadow: 0 1px 1px 0 rgba(0,0,0,.14), 0 1.5px 0.25px -1px rgba(0,0,0,.12), 0 0.5px 2.5px 0 rgba(0,0,0,.2);" title="Back to top">
                    <a href="#sign-up">
                        <span style="font-size: 26px; font-weight: bold">&uparrow;</span>
                    </a>
                </div>
            </div>
        </div>

        <div id="loginOverlay" class="overlay">
            <div class="container">
                <div class="row" style="margin-bottom: 25px; display: flex; align-items: center; justify-content: center;padding: 30px">
                    <div class="col-sm-8 col-lg-4 col-xs-8 col-md-4 white z-depth-half" style="border-radius: 10px; background-color: #fff; border: 1px solid #d6d6d6; box-shadow: 0 1px 1px 0 rgba(0,0,0,.14), 0 1.5px 0.25px -1px rgba(0,0,0,.12), 0 0.5px 2.5px 0 rgba(0,0,0,.2); margin-top: 20px; padding: 20px 35px 0;">
                        <div class="row">
                            <form class="col s12">
                                <div class="row">
                                    <div class="input-field col">
                                        <input id="login" type="text" class="validate invalid" required="" onkeyup="serviceProviderLoginCheck(this.value)">
                                        <label for="login" class="">Email / Phone</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col col-sm-12">
                                        <input id="login-password" type="password" autocomplete="current-password" class="validate invalid" required="">
                                        <label for="login-password" class="active">Password</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <a class="" href="">Forgot Password?</a>
                                    </div>
                                </div>
                                <div class="row" style="text-align: center">
                                    <div class="col-sm-12 col-md-12">
                                        <a class="btn black white-text" href="javascript:void(0)" style="width: 50%; border-radius: 30px;" onclick="login(document.getElementById('login').value, document.getElementById('login-password').value)">
                                            Login
                                        </a>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 20px !important;">
                                    <div class="col-sm-12 col-md-12" style="text-align: center">
                                        <span>© Zumah 2019</span>
                                    </div>
                                </div>

                                {{--<div class="row" style="margin-top: 20px !important; margin-bottom: 0">--}}
                                    <div class="overlay-close">
                                        <span onclick="hideOverlay('loginOverlay')">[close]</span>
                                    </div>
                                {{--</div>--}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="verifyPhoneOverlay" class="overlay">
            <div class="container">
                <div class="row" style="margin-bottom: 25px; display: flex; align-items: center; justify-content: center;padding: 30px">
                    <div class="col-sm-8 col-lg-4 col-xs-8 col-md-4 white z-depth-half" style="border-radius: 10px; background-color: #fff; border: 1px solid #d6d6d6; box-shadow: 0 1px 1px 0 rgba(0,0,0,.14), 0 1.5px 0.25px -1px rgba(0,0,0,.12), 0 0.5px 2.5px 0 rgba(0,0,0,.2); margin-top: 20px; padding: 20px 35px 0;">
                        <div class="row">
                            <form class="col-sm-12">
                                <div class="row" style="margin-bottom: 0">
                                    <div class="input-field col-sm-12">
                                        <input id="phone_verification_code" type="text" class="validate invalid verification-code" maxlength="6" required="" >
                                        <label for="phone_verification_code" class="active">Verification code</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a href="javascript:void(0)" onclick="resendVerificationCode()">Resend code</a>
                                    </div>
                                </div>
                                <div class="row" style="text-align: center">
                                    <div class="col-sm-12 col-md-12">
                                        <a class="btn black white-text" href="javascript:void(0)" style="width: 50%; border-radius: 30px;" onclick="verifyPhone(document.getElementById('phone_verification_code').value)">
                                            Verify
                                        </a>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 20px !important;">
                                    <div class="col-sm-12 col-md-12" style="text-align: center">
                                        <span>© Zumah 2019</span>
                                    </div>
                                </div>

                                {{--<div class="row" style="margin-top: 20px !important; margin-bottom: 0">--}}
                                <div class="overlay-close">
                                    <span onclick="hideOverlay('verifyPhoneOverlay')">[close]</span>
                                </div>
                                {{--</div>--}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="process-loading" class="overlay">
            <i class="fas fa-spinner fa-spin" style="font-size: 4rem;"></i>
        </div>

        <div id="alerts-container" style="position: fixed; height: auto; top: 0; width: 260px; right: 0">

        </div>
        <div id="customConfirmBox" class="new-custom-alert" style="width: 300px; display: none">
            <span class="closebtn" onclick="closeConfirm()">&times;</span>
            <strong id="confirm-title">Title</strong>
            <br>
            <span id="confirm-message">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur</span>
            <br>
            <br>
            <div style="text-align: center">
                <a href="javascript:void(0)" id="confirm-positive" class="btn confirm-positive white-text black" data-status="1" data-for="" onclick="confirmResponse(this)" style="font-weight: bolder;">
                    accept
                </a>
                <a href="javascript:void(0)" id="confirm-negative" class="btn confirm-negative black-text white" data-status="0" data-for="" onclick="confirmResponse(this)" style="font-weight: bolder;">
                    decline
                </a>
            </div>
        </div>

        <span id="data-store" data-delete-id="" style="display: none"></span>
    </div>
</body>
<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.js"></script>
<script src="{{ url('/js/script.js') }}" defer></script>
<script src="{{ url('/js/messages.js') }}" defer></script>

<script>
    {{--LOGIN WITH PHONE OR EMAIL--}}
    function login(login, password){
        var loginWith;

        if (isNaN(login))
            loginWith = "email";
        else
            loginWith = "phone";

        $.ajax({
            type: "GET",
            url: "{{ url('/service-provider-login') }}",
            data: {"login": login, "login-with": loginWith, "password": password},

            success:function (result) {
                if(result.status === 200)
                    window.location.href = "{{ url('/provider-home') }}";
                else
                    alert("Login inncorrect.");
            }
        });
    }

    function serviceProviderLoginCheck(login){
        var loginWith;

        if (isNaN(login))
            loginWith = "email";
        else
            loginWith = "phone";

        $.ajax({
            type: "GET",
            url: "{{ url('/sp-login-email-check') }}",
            data: {"login": login, "login-with": loginWith},

            success:function(result){
                if (result.status === 200)
                    document.getElementById("email-error-msg").style.display = "none";
                else{
                    document.getElementById("email-error-msg").innerHTML = "This email is taken.";
                    document.getElementById("email-error-msg").style.display = "block";
                }
            }
        });
    }

    function serviceProviderSignUpEmailCheck(email){
        var containsAt = 0, containsDot = 0;

        for (var iterator = 0; iterator < email.length; iterator++){
            if (email.charAt(iterator) === "@")
                containsAt = 1;
            if (email.charAt(iterator) === ".")
                containsDot = 1;
        }

        if (containsAt === 1 && containsDot >= 1){
            $.ajax({
                type: "GET",
                url: "{{ url('/sp-sign-up-email-check') }}",
                data: {"email": email},

                success:function(result){
                    if (result.status === 200)
                        document.getElementById("email-error-msg").style.display = "none";
                    else{
                        document.getElementById("email-error-msg").innerHTML = "This email is taken.";
                        document.getElementById("email-error-msg").style.display = "block";
                    }
                }
            });
        } else{
            document.getElementById("email-error-msg").innerHTML = "Invalid email provided.";
            document.getElementById("email-error-msg").style.display = "block";
        }
    }

    function serviceProviderSignUpPhoneCheck(phone){
        if (isNaN(phone)){
            document.getElementById("phone-error-msg").innerHTML = "Invalid phone provided.";
            document.getElementById("phone-error-msg").style.display = "block";
        } else{
            if (phone.length === 9 || (phone.length === 10 && phone.charAt(0) === '0')){
                $.ajax({
                    type: "GET",
                    url: "{{ url('/sp-sign-up-phone-check') }}",
                    data: {"phone": phone},

                    success:function(result) {
                        if (result.status === 200)
                            document.getElementById("phone-error-msg").style.display = "none";
                        else{
                            document.getElementById("phone-error-msg").innerHTML = "This phone is taken.";
                            document.getElementById("phone-error-msg").style.display = "block";
                        }
                    }
                });
            } else{
                document.getElementById("phone-error-msg").innerHTML = "Invalid phone provided.";
                document.getElementById("phone-error-msg").style.display = "block";
            }
        }
    }

    function serviceProviderSignUp(name, phone, email, password){
        if(name.length > 0 && phone.length > 0 && email.length > 0 && password.length > 0){
            if(document.getElementById('agree_to_terms').getAttribute("checked") === "checked"){
                $.ajax({
                    type: "GET",
                    url: "{{ url('/sign-up-data') }}",
                    data: {"name": name, "email": email, "phone": phone, "password": password},

                    success:function(result){
                        hideOverlay("signupOverlay");
                        showOverlay("verifyPhoneOverlay");
                    }
                });

            } else
                alert("Please agree to our Terms & Conditions by checking the provided box to proceed.");
        }
    }

    function verifyPhone(userCode){
        if(userCode.length === 5){
            $.ajax({
                type: "GET",
                url: "{{ url('/verify-phone') }}",
                data: {"userCode": userCode},

                success:function(result){
                    if (result.status === 200){
                        window.location.href = "{{ url('/provider-home') }}";
                    }
                }
            });
        }else{
            showAlert("Alert","Please enter verification code sent to your phone.");
        }
    }

    function resendVerificationCode(){
        $.ajax({
            type: "GET",
            url: "{{ url('/resend-verification-code') }}",

            success:function(result){
                showAlert("Alert","Verification code sent");

            }
        });
    }

    function getServiceListings(){
//        document.getElementById("process-loading").style.display = "flex";

        var categories = document.getElementsByName("category");

        var regions = document.getElementsByName("region");

        var cities = document.getElementsByName("city");

        var selectedCategories = [];
        var selectedRegions = [];
        var selectedCities = [];

        var selectedFiltersIndex = 0;

        for (var iterator = 0; iterator < categories.length; iterator++){
            if (categories[iterator].checked === true) {
                selectedCategories[selectedFiltersIndex] = categories[iterator].value;
                selectedFiltersIndex++;
            }
        }

        selectedFiltersIndex = 0;
        for (iterator = 0; iterator < regions.length; iterator++){
            if(regions[iterator].checked === true){
                selectedRegions[selectedFiltersIndex] = regions[iterator].value;
                selectedFiltersIndex++;
            }
        }

        selectedFiltersIndex = 0;
        for (iterator = 0; iterator < cities.length; iterator++){
            if(cities[iterator].checked === true){
                selectedCities[selectedFiltersIndex] = cities[iterator].value;
                selectedFiltersIndex++;
            }
        }

        if (selectedCategories.length === 0)
            selectedCategories = 0;

        if (selectedRegions.length === 0)
            selectedRegions = 0;

        if (selectedCities.length === 0)
            selectedCities = 0;

        $.ajax({
            type: "GET",
            url: "{{ url('/get-selected-categories-services') }}",
            data: {"selected-categories": selectedCategories, "selected-regions": selectedRegions, "selected-cities": selectedCities},

            success:function (result) {
                console.log(result);
                setFilteredServices(result);
            }
        })
    }

    function getServiceCarouselImages(serviceId) {
        if (document.getElementById("loading-service-carousel-"+serviceId)){
            var existingOverlay = document.getElementById(serviceId);
            existingOverlay.removeChild(existingOverlay.childNodes[(existingOverlay.childNodes.length - 1)]);
            existingOverlay.removeChild(existingOverlay.childNodes[(existingOverlay.childNodes.length - 1)]);
        }
        var loadingServiceCarousel = document.createElement("DIV");
        loadingServiceCarousel.id = "loading-service-carousel-"+serviceId;
        loadingServiceCarousel.className = "service-overlaying-carousel";

        var serviceCarouselLoadingIcon = document.createElement("I");
        serviceCarouselLoadingIcon.className = "fas fa-spinner fa-spin";
        serviceCarouselLoadingIcon.style.fontSize = "2rem";
        serviceCarouselLoadingIcon.style.color = "#FFF";

        loadingServiceCarousel.appendChild(serviceCarouselLoadingIcon);
        document.getElementById(serviceId).appendChild(loadingServiceCarousel);
        loadingServiceCarousel.style.display = "flex";

        $.ajax({
            type: "GET",
            url: "{{ url('/get-service-carousel-images') }}",
            data: {"service-id": serviceId},

            success:function (result) {
                var serviceImagesCarouselOverlay = document.createElement("DIV");
                serviceImagesCarouselOverlay.id = "service-images-carousel-overlay-"+serviceId;
                serviceImagesCarouselOverlay.className = "service-overlaying-carousel";

                var serviceImagesCarousel = document.createElement("DIV");
                serviceImagesCarousel.id = "service-images-carousel-"+serviceId;
                serviceImagesCarousel.className = "carousel slide";
                serviceImagesCarousel.setAttribute("data-ride", "carousel");
                serviceImagesCarousel.setAttribute("data-interval", "false");
                serviceImagesCarousel.setAttribute("data-service-id", "");
                serviceImagesCarousel.style.width = "100%";
                serviceImagesCarousel.style.height = "50%";

                var serviceImagesCarouselIndicators = document.createElement("UL");
                serviceImagesCarouselIndicators.className = "carousel-indicators dot";
//                serviceImagesCarouselIndicators.id = "service-images-carousel-indicators-"+serviceId;

                var serviceImagesCarouselInner = document.createElement("DIV");
                serviceImagesCarouselInner.className = "carousel-inner";
                serviceImagesCarouselInner.id = "service-images-carousel-inner";
                serviceImagesCarouselInner.style.height = "100%";

                var serviceCarouselCancelButtonHolder = document.createElement("DIV");
                serviceCarouselCancelButtonHolder.style.textAlign = "center";
                serviceCarouselCancelButtonHolder.style.bottom = "50px";
                serviceCarouselCancelButtonHolder.style.left = "0";
                serviceCarouselCancelButtonHolder.style.right = "0";

                var serviceCarouselCancelButton = document.createElement("BUTTON");
                serviceCarouselCancelButton.innerHTML = "CANCEL";
                serviceCarouselCancelButton.setAttribute("type", "submit");
                serviceCarouselCancelButton.id = "service-images-carousel-close";
                serviceCarouselCancelButton.className = "btn white center black-text";
                serviceCarouselCancelButton.setAttribute("data-service-id", "");
                serviceCarouselCancelButton.style.width = "100px";
                serviceCarouselCancelButton.style.borderRadius = "30px";
                serviceCarouselCancelButton.style.height = "40px";
                serviceCarouselCancelButton.style.marginBottom = "10px";
                serviceCarouselCancelButton.style.marginTop = "10px";
                serviceCarouselCancelButton.setAttribute("onclick", "hideOverlay('service-images-carousel-overlay-"+serviceId+"')");

                serviceImagesCarousel.appendChild(serviceImagesCarouselIndicators);
                serviceImagesCarousel.appendChild(serviceImagesCarouselInner);
                serviceCarouselCancelButtonHolder.appendChild(serviceCarouselCancelButton);
                serviceImagesCarouselOverlay.appendChild(serviceImagesCarousel);
                serviceImagesCarouselOverlay.appendChild(serviceCarouselCancelButtonHolder);

                serviceCarouselCancelButton.setAttribute("data-service-id", ""+serviceId);

                for (var iterator = 0; iterator < result["service-images"].length; iterator++){
                    if (result["service-images"][iterator].image_name_0){
                        var serviceImageIndicator_0 = document.createElement("LI");
                        serviceImageIndicator_0.setAttribute("data-target", "#service-images-carousel-"+serviceId);
                        serviceImageIndicator_0.setAttribute("data-slide-to", "0");
                        serviceImageIndicator_0.className = "indicator-item active";

                        serviceImagesCarouselIndicators.appendChild(serviceImageIndicator_0);

                        var serviceCarouselItem_0 = document.createElement("DIV");
                        serviceCarouselItem_0.className = "carousel-item active ";
                        serviceCarouselItem_0.style.height = "100%";

                        var serviceCarouselImage_0 = document.createElement("IMG");
                        serviceCarouselImage_0.style.height = "100%";
                        serviceCarouselImage_0.style.width = "100%";
                        serviceCarouselImage_0.setAttribute("src", "{{ url('/storage/service_images/') }}/"+result["service-images"][iterator].image_name_0);

                        serviceCarouselItem_0.appendChild(serviceCarouselImage_0);
                        serviceImagesCarouselInner.appendChild(serviceCarouselItem_0);
                    }

                    if (result["service-images"][iterator].image_name_1){
                        var serviceImageIndicator_1 = document.createElement("LI");
                        serviceImageIndicator_1.setAttribute("data-target", "#service-images-carousel-"+serviceId);
                        serviceImageIndicator_1.setAttribute("data-slide-to", "1");
                        serviceImageIndicator_1.className = "indicator-item";

                        serviceImagesCarouselIndicators.appendChild(serviceImageIndicator_1);

                        var serviceCarouselItem_1 = document.createElement("DIV");
                        serviceCarouselItem_1.className = "carousel-item";
                        serviceCarouselItem_1.style.height = "100%";

                        var serviceCarouselImage_1 = document.createElement("IMG");
                        serviceCarouselImage_1.style.height = "100%";
                        serviceCarouselImage_1.style.width = "100%";
                        serviceCarouselImage_1.setAttribute("src", "{{ url('/storage/service_images/') }}/"+result["service-images"][iterator].image_name_1);

                        serviceCarouselItem_1.appendChild(serviceCarouselImage_1);
                        serviceImagesCarouselInner.appendChild(serviceCarouselItem_1);
                    }

                    if (result["service-images"][iterator].image_name_2){
                        var serviceImageIndicator_2 = document.createElement("LI");
                        serviceImageIndicator_2.setAttribute("data-target", "#service-images-carousel-"+serviceId);
                        serviceImageIndicator_2.setAttribute("data-slide-to", "2");
                        serviceImageIndicator_2.className = "indicator-item";

                        serviceImagesCarouselIndicators.appendChild(serviceImageIndicator_2);

                        var serviceCarouselItem_2 = document.createElement("DIV");
                        serviceCarouselItem_2.className = "carousel-item";
                        serviceCarouselItem_2.style.height = "100%";

                        var serviceCarouselImage_2 = document.createElement("IMG");
                        serviceCarouselImage_2.style.height = "100%";
                        serviceCarouselImage_2.style.width = "100%";
                        serviceCarouselImage_2.setAttribute("src", "{{ url('/storage/service_images/') }}/"+result["service-images"][iterator].image_name_2);

                        serviceCarouselItem_2.appendChild(serviceCarouselImage_2);
                        serviceImagesCarouselInner.appendChild(serviceCarouselItem_2);
                    }

                    if (result["service-images"][iterator].image_name_3){
                        var serviceImageIndicator_3 = document.createElement("LI");
                        serviceImageIndicator_3.setAttribute("data-target", "#service-images-carousel-"+serviceId);
                        serviceImageIndicator_3.setAttribute("data-slide-to", "3");
                        serviceImageIndicator_3.className = "indicator-item";

                        serviceImagesCarouselIndicators.appendChild(serviceImageIndicator_3);

                        var serviceCarouselItem_3 = document.createElement("DIV");
                        serviceCarouselItem_3.className = "carousel-item";
                        serviceCarouselItem_3.style.height = "100%";

                        var serviceCarouselImage_3 = document.createElement("IMG");
                        serviceCarouselImage_3.style.height = "100%";
                        serviceCarouselImage_3.style.width = "100%";
                        serviceCarouselImage_3.setAttribute("src", "{{ url('/storage/service_images/') }}/"+result["service-images"][iterator].image_name_3);

                        serviceCarouselItem_3.appendChild(serviceCarouselImage_3);
                        serviceImagesCarouselInner.appendChild(serviceCarouselItem_3);
                    }

                    if (result["service-images"][iterator].image_name_4){
                        var serviceImageIndicator_4 = document.createElement("LI");
                        serviceImageIndicator_4.setAttribute("data-target", "#service-images-carousel-"+serviceId);
                        serviceImageIndicator_4.setAttribute("data-slide-to", "4");
                        serviceImageIndicator_4.className = "indicator-item";

                        serviceImagesCarouselIndicators.appendChild(serviceImageIndicator_4);

                        var serviceCarouselItem_4 = document.createElement("DIV");
                        serviceCarouselItem_4.className = "carousel-item";
                        serviceCarouselItem_4.style.height = "100%";
                        var serviceCarouselImage_4 = document.createElement("IMG");
                        serviceCarouselImage_4.style.height = "100%";
                        serviceCarouselImage_4.style.width = "100%";
                        serviceCarouselImage_4.setAttribute("src", "{{ url('/storage/service_images/') }}/"+result["service-images"][iterator].image_name_4);

                        serviceCarouselItem_4.appendChild(serviceCarouselImage_4);
                        serviceImagesCarouselInner.appendChild(serviceCarouselItem_4);
                    }
                }
                if (result["service-images"]){
                    hideOverlay("loading-service-carousel-"+serviceId);
                    serviceImagesCarouselOverlay.style.display = "flex";
                    document.getElementById(serviceId).appendChild(serviceImagesCarouselOverlay);
                }
            }
        });
    }

    function getSelectedRegionsCities(){
        var selectedRegions = null;
        var regions = document.getElementsByName("region");
        var selectedRegionsIndex = 0;

        selectedRegions = [];
        for (var iterator = 0; iterator < regions.length; iterator++){
            if (regions[iterator].checked === true) {
                selectedRegions[selectedRegionsIndex] = regions[iterator].value;
                selectedRegionsIndex++;
            }
        }

        if (selectedRegions.length === 0)
            selectedRegions = 0;

        $.ajax({
            type: "GET",
            data: {"selected-regions": selectedRegions},
            url: "{{ url('/get-selected-regions-cities') }}",

            success:function (result) {
                var serviceCitiesHolder = document.getElementById("service-cities-holder");
                if (result.cities.length > 0){
                    serviceCitiesHolder.innerHTML = "";
                    for (var iterator = 0; iterator < result.cities.length; iterator++){
                        var containingDiv = document.createElement("DIV");
                        containingDiv.className = "filter-city-holder";

                        var containingP = document.createElement("P");
                        containingP.className = "service-name-left-panel";

                        var cityLabel = document.createElement("LABEL");

                        var cityCheckBox = document.createElement("INPUT");
                        cityCheckBox.className = "filled-in";
                        cityCheckBox.setAttribute("type", "checkbox");
                        cityCheckBox.setAttribute("name", "city");
                        cityCheckBox.setAttribute("onclick", "getServiceListings()");
                        cityCheckBox.setAttribute("value", ""+result.cities[iterator].city);

                        var citySpan = document.createElement("SPAN");
                        citySpan.className = "grey-text text-darken-2 check-box-span";
                        citySpan.innerHTML = result.cities[iterator].city;

                        cityLabel.appendChild(cityCheckBox);
                        cityLabel.appendChild(citySpan);
                        containingP.appendChild(cityLabel);
                        containingDiv.appendChild(containingP);

                        serviceCitiesHolder.appendChild(containingDiv);
                    }
                } else
                    serviceCitiesHolder.innerHTML = "";
            }
        });
    }

    function setFilteredServices(result) {
        var servicesHolder = document.getElementById("services-container");
        servicesHolder.innerHTML = "";

        for (var iterator = 0; iterator < result["services"].length; iterator++) {

            var service = result["services"][iterator];

            var mainCol = document.createElement("DIV");
            mainCol.className = "col-md-6 col-sm-6 col-xs-12 col-lg-4";

            var serviceCard = document.createElement("DIV");
            serviceCard.className = "card service-listing-card";

            //DO THIS ACCORDING TO NUMBER OF IMAGES SERVICE HAS//
            //INDICATORS
            var leadServiceImageHolder;
            var leadServiceImage;

            for (var innerIterator = 0; innerIterator < result["serviceImages"].length; innerIterator++) {
                for (var dimensionTwoIterator = 0; dimensionTwoIterator < result["serviceImages"][innerIterator].length; dimensionTwoIterator++){
                    if (result["serviceImages"][innerIterator][dimensionTwoIterator].service_id === service["id"]){
                        if (result["serviceImages"][innerIterator][dimensionTwoIterator].image_name_0){

                            //DO THIS ACCORDING TO NUMBER OF IMAGES SERVICE HAS//
                            leadServiceImageHolder = document.createElement("DIV");
//                                    leadServiceImageHolder.setAttribute("onclick", "getServiceCarouselImages("+service["id"]+")");
                            leadServiceImageHolder.className = "service-lead-image-holder";//active for first image

                            //CAROUSEL IMAGE
                            leadServiceImage = document.createElement("IMG");
                            leadServiceImage.className = "service-lead-image";
                            leadServiceImage.setAttribute("width", "100%");

                            leadServiceImage.setAttribute("src", "{{ url('/storage/service_images/') }}/" + result["serviceImages"][innerIterator][dimensionTwoIterator].image_name_0);
                            leadServiceImageHolder.appendChild(leadServiceImage);

                            serviceCard.appendChild(leadServiceImageHolder)
                        }
                    }
                }
            }
            //APPEND INDICATORS CAROUSEL TO CAROUSEL
//----------------------------------------------------------------------------------------------------------------------
            //CARD BODY
            var cardBody = document.createElement("DIV");
            cardBody.id = service["id"];
            cardBody.className = "card-body service-card-body";

            var serviceName = document.createElement("H6");
            serviceName.className = "card-title";
            var serviceAnchor = document.createElement("A");
            serviceAnchor.setAttribute("href", "{{ url('/service-details/') }}"+"/"+service["id"]);//add service id to url
            serviceAnchor.innerHTML = service["name"];

            var serviceCategoryAndCity = document.createElement("DIV");
            serviceCategoryAndCity.style.marginBottom = "5px";
            var serviceCategoryP = document.createElement("P");
            serviceCategoryP.style.display = "inline";
            var serviceCategoryStrong = document.createElement("STRONG");
            serviceCategoryStrong.className = "service-listing-category";
            serviceCategoryStrong.innerHTML = service["category"]; //SERVICE CATEGORY GOES HERE
            var serviceCityP = document.createElement("P");
            serviceCityP.style.display = "inline";
            serviceCityP.style.float = "right";
            var serviceCityEM = document.createElement("EM");
            serviceCityEM.innerHTML = service["city"]; //SERVICE CITY GOES HERE

            var serviceDescP = document.createElement("P");
            serviceDescP.className = "service-description-paragraph";
            serviceDescP.style.minHeight = "50%";
            serviceDescP.style.marginBottom = "0";
            serviceDescP.innerHTML = service["service_desc"]; //SERVICE DESC GOES HERE

            //SERVICE PRICING AND STARS
            var servicePriceAndStarsHolder = document.createElement("DIV");
            servicePriceAndStarsHolder.className = "price-and-rating-holder";
            servicePriceAndStarsHolder.style.position = "absolute";
            servicePriceAndStarsHolder.style.bottom = "50px";
            servicePriceAndStarsHolder.style.width = "88%";
            var servicePriceP = document.createElement("P");
            servicePriceP.className = "service-price";
            servicePriceP.style.display = "inline";
            servicePriceP.style.float = "left";
            servicePriceP.innerHTML = "GH¢ "+service["start_price"]; // SERVICE START PRICE GOES HERE
            var serviceStars = document.createElement("SMALL");
            serviceStars.className = "rating-star";
            serviceStars.style.display = "inline";
            serviceStars.style.float = "right";
            serviceStars.innerHTML = "<i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i>"
            //RUN LOOP TO INSERT STARS HERE

            var cardFooter = document.createElement("DIV");
            cardFooter.className = "card-footer";
            cardFooter.style.height = "50px";
            var crownHolder = document.createElement("SPAN");
            crownHolder.style.display = "inline";
            crownHolder.style.float = "left";
            crownHolder.style.cursor = "pointer";
            var crownIcon = document.createElement("I");
            crownIcon.id = "service-crown-"+service["id"]; //ADD SERVICE ID TO crown-id
            crownIcon.className = "fas fa-crown";
            crownIcon.setAttribute("onclick", "crownService("+crownIcon+")");
            crownIcon.setAttribute("data-crowned", "0");
            var crownNumber = document.createElement("SMALL");
            crownNumber.className = "crown-crown-number";
            crownNumber.innerHTML = "";//crowns go here

            var serviceShareP = document.createElement("P");
            serviceShareP.style.display = "inline";
            serviceShareP.style.float = "right";
            serviceShareP.setAttribute("data-url", "{{ url('/service-details') }}/"+service["id"]);
            serviceShareP.setAttribute("onclick", "document.getElementById('service-url-to-copy-container').value = this.getAttribute('data-url'); copyServiceUrlToClipboard('service-url-to-copy-container')");
            var serviceShareIcon = document.createElement("P");
            serviceShareIcon.className = "fas fa-share-alt";
            //MAIN ROW
            servicesHolder.appendChild(mainCol);
            //MAIN COL
            mainCol.appendChild(serviceCard);
            //CARD
//                    serviceCard.appendChild(serviceCarousel);

            //CARD BODY
            //APPEND SERVICE NAME TO CARD BODY
            serviceCard.appendChild(cardBody);
            cardBody.appendChild(serviceName);
            serviceName.appendChild(serviceAnchor);
            //APPEND SERVICE CITY AND CATEGORY ROW
            cardBody.appendChild(serviceCategoryAndCity);
            serviceCategoryAndCity.appendChild(serviceCategoryP);
            serviceCategoryP.appendChild(serviceCategoryStrong);
            serviceCategoryAndCity.appendChild(serviceCityP);
            serviceCityP.appendChild(serviceCityEM);
            //APPEND SERVICE DESCRIPTION
            cardBody.appendChild(serviceDescP);
            //STARS AND PRICING
            cardBody.appendChild(servicePriceAndStarsHolder);
            //APPEND PRICE
            servicePriceAndStarsHolder.appendChild(servicePriceP);
            //APPEND STARS
            servicePriceAndStarsHolder.appendChild(serviceStars);

            //CARD FOOTER
            serviceCard.appendChild(cardFooter);
            cardFooter.appendChild(crownHolder);
            crownHolder.appendChild(crownIcon);
            crownHolder.appendChild(crownNumber);
            cardFooter.appendChild(serviceShareP);
            serviceShareP.appendChild(serviceShareIcon);
        }
//                document.getElementById("process-loading").style.display = "none";

        document.getElementById("top-of-service-listing").scrollIntoView();
    }

    $('.top-services-container').each(element, new SimpleBar);
</script>
</html>


