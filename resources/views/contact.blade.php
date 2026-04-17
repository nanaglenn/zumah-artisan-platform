@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-1g-12">
                <h4 style="font-weight: normal !important;">Contact Us</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12"><br>
            </div>
        </div>

        <div class="row" style="margin-bottom: 25px">
            <div class="col-md-6 col-sm-12 col-lg-6">
                <div class="row">
                    <div class="col col-sm-12 col-md-4 col-lg-3">
                        <p>
                            <strong>Emails:</strong>
                        </p>
                    </div>
                    <div class="col col-sm-12 col-md-8 col-lg-9">
                        <p>zumah.net@gmail.com<br>vortexxmarketing@gmail.com</p>
                    </div>
                </div>
                <hr class="divider" style="margin-top: 10px; margin-bottom: 20px; margin-right: 10px;"/>
                <div class="row">
                    <div class="col col-sm-12 col-md-4 col-lg-3">
                        <p>
                            <strong>Address:</strong>
                        </p>
                    </div>
                    <div class="col col-sm-12 col-md-8 col-lg-9">
                        <p>Post Office Box AN 19652 Madina, <br>Beside Ecobank, <br>Market</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-lg-6 white z-depth-half" style="padding: 20px 35px; border-radius: 10px; background-color: #fff; border: 1px solid #d6d6d6; box-shadow: 0 1px 1px 0 rgba(0,0,0,.14), 0 1.5px 0.25px -1px rgba(0,0,0,.12), 0 0.5px 2.5px 0 rgba(0,0,0,.2);">
                <h6>Use this form for any enquiries</h6>
                <div class="row">
                    <div class="input-field col-sm-12">
                        <input type="text" id="fullname" placeholder="Full Name">
                        {{--<label for="fullname">Full Name</label>--}}
                    </div>
                    <div class="input-field col-sm-12">
                        <input type="text" id="phone" placeholder="Phone">
                        {{--<label for="phone">Phone</label>--}}
                    </div>
                    <div class="input-field col-sm-12">
                        <input type="text" id="email" placeholder="Email">
                        {{--<label for="email">Email</label>--}}
                    </div>
                    <div class="input-field col-sm-12">
                        <textarea id="enquiry" class="materialize-textarea" placeholder="Enquiry"></textarea>
                        {{--<label for="enquiry">Enquiry</label>--}}
                    </div>
                    <div class="input-field col-sm-12">
                        <button type="submit" class="btn black white-text right" style="border-radius: 5px;">SUBMIT ENQUIRY</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 18vh;"></div>
@endsection
