<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//use Faker\ProviderPortal\Image;
use Intervention\Image\Facades\Image;

Route::get('/', function () {
    return redirect()->intended('/home');
});

//Route::get('/', function () {
//    return view('message.coming_soon');
//});

//Route::any('/{any}', function(){
//    return view('message.coming_soon');
//});

Route::get('/home', "HomeController@index")->name('home');

Route::get('/about', function (){
    return view('about');
})->name('about');

Route::get('/contact', function (){
    return view('contact');
})->name('contact');

Route::get('/service', function (){
    return view('service');
})->name('service');

Route::get('/help', function (){
    return view('help');
})->name('help');

Route::get('/terms&conditions', function (){
    return view('terms');
})->name('terms');

Auth::routes();

Route::get('/provider-home', "ProviderPortal@loadSpPortalData")->name('provider')->middleware("auth");

//API
Route::get('/sign-up-data', 'Authentication@serviceProviderSignUp');


//------------------------------------------------------------------------TEST
Route::get('/test', function(){
    return request()->session()->get("sp_signUpData");
});

Route::get('/verify-phone', "Authentication@checkPhoneVerificationCode");

//------------------------------------------------------------------------TEST
Route::get('/get-phone-verification-code', function (){
    return request()->session()->get("sp_phoneVerificationCode");
});

Route::get('/sp-sign-up-email-check', "Authentication@signUpEmailCheck");

Route::get('/sp-sign-up-phone-check', "Authentication@signUpPhoneCheck");

Route::get('/service-provider-login', "Authentication@serviceProviderLogin");

Route::get('/sp-login-email-check', "Authentication@serviceProviderLoginCheck");

Route::get('/resend-verification-code', "Authentication@phoneVerificationCodeGen");

//PROVIDER PORTAL
Route::get('/check-service-provider-custom-url-text', "ProviderPortal@checkServiceProviderCustomUrlText");

Route::get('/set-service-provider-custom-url-text', "ProviderPortal@setServiceProviderCustomUrlText");

Route::get('/get-service-provider-data', "ProviderPortal@getServiceProviderData");

Route::get('/update-service-provider-smp', "ProviderPortal@updateServiceProviderSmp");

//SERVICES
Route::get('/create-service', "Services@createService");

Route::get('/get-service-to-edit-data', "Services@getServiceToEditData");

Route::get('/update-service-information', "Services@updateServiceInformation");

Route::get('/update-service-pricing', "Services@updateServicePricing");

Route::get('/update-service-rating', "Services@updateServiceRating");

Route::get('/delete-service', "Services@deleteService");

Route::get('/service-details/{serviceId}', "Services@serviceDetails");

Route::get('/update-service-provider-gbi', "ProviderPortal@updateServiceProviderGbi");


Route::get('/test', function (){
    $img = Image::make('../public/images/googleplay.png')->resize(300, 300);

    return $img->response('jpg');
});

Route::get('/get-selected-categories-services', "Services@getSelectedCategoriesServices");

Route::get('/create-service', "Services@createService");
Route::post('/new-service', "Services@createNewService");


//-----------------------
Route::get('/get-cities', "Inserter@insertCities");

Route::get('/get-region-cities', "ProviderPortal@getRegionCities");

Route::get('/provider-services/{userUrlText}', "ProviderPortal@serviceProviderPage");

Route::post('/update-gbi', "ProviderPortal@updateGbi");

Route::get('/delete-service-image', "Services@deleteServiceImage");

Route::get('/get-service-images-for-carousel', "Services@getServiceImageForCarousel");

Route::get('/my-test', function (){
   return view('test');
});

Route::post('/edit-service-data', "Services@updateService");

Route::get('/set-image-to-delete-col', "Services@setImageToDeleteCol");

Route::get('/get-service-carousel-images', "Services@getServiceCarouselImages");

//URL::forceScheme('https');

Route::get('/get-selected-regions-cities', "Services@getSelectedRegionsCities");