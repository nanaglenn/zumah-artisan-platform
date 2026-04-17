<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProviderPortal extends Controller
{
    public function checkServiceProviderCustomUrlText(){
        $customText = $_GET['custom-text'];

        $customTextCheck = DB::select("SELECT sp_custom_profile_text FROM service_providers WHERE sp_custom_profile_text = (?)", [$customText]);
        if (count($customTextCheck) == 0) {
            session(["customTextCheck" => $customText]);
            return response()->json(["status"=> 200]);
        } else
            return response()->json(["status"=> 500]);
    }

    public function setServiceProviderCustomUrlText() {
        if (DB::insert("UPDATE service_providers SET sp_custom_profile_text = (?) WHERE id = (?)", [session()->get("customTextCheck"), Auth::id()])){
            return response()->json(["status"=> 200]);
        }else {
            return response()->json(["status"=> 500]);
        }
    }

    public function getServiceProviderData() {
        $userData = DB::select("SELECT * FROM users WHERE id = (?)", [Auth::id()]);
        $spData = DB::select("SELECT * FROM service_providers WHERE id = (?)", [Auth::id()]);
        $spSmp = DB::select("SELECT social_media, username, vibrancy FROM service_providers_smp WHERE service_provider_id = (?)", [Auth::id()]);
        $cities = [];
        foreach ($spData as $item)
            $cities = DB::select("SELECT city FROM location WHERE region_or_state = (?)", [$item->region]);

        $spLogo = DB::select("SELECT logo_name FROM sp_logos WHERE service_provider_id = (?)", [Auth::id()]);

        $image = "";
        foreach ($spLogo as $logo)
            $image = $logo->logo_name;


        return response()->json(["userData"=> $userData, "spData"=>$spData, "spSmp"=>$spSmp, "cities"=>$cities, "logo"=>$image]);
    }

    public function loadSpPortalData() {
        $services = DB::select("SELECT * FROM services WHERE service_provider_id = (?) AND status = (?)", [Auth::id(), "active"]);
        $serviceImages = [];
        $iterator = 0;
        foreach ($services as $service) {
            $serviceImages[$iterator] = DB::select("SELECT * FROM service_images WHERE service_id = (?)", [$service->id]);
            $iterator++;
        }

//        return response()->json(["services"=>$services, "serviceImages"=>$serviceImages]);
        return view("service_provider.portal", compact("services", "serviceImages"));
    }

//    public function updateServiceProviderGbi(){
//        $gbiCompanyName = $_GET["gbi-company-name"];
//        $gbiCountry = $_GET["gbi-country"];
//        $gbiRegion = $_GET["gbi-regions"];
//        $gbiCity = $_GET["gbi-city"];
//        $gbiCompanyWebsiteUrl = $_GET["gbi-business-website-url"];
//        $gbiCompanyAddress = $_GET["gbi-business-address"];
//        $gbiBusinessDesc = $_GET["gbi-business-description"];
//        $gbiBusinessGoals = $_GET["gbi-business-goals"];
//        $gbiBusinessRegistered = $_GET["gbi-business-registered"];
//        $gbiRegistrationNumber = $_GET["gbi-business-reg-no"];
//        $gbiTinNumber = $_GET["gbi-tin-number"];
//        $gbiLogo = $_GET["gbi-logo"];
//        $this->uploadServiceProviderLogo($gbiLogo);
//
//        if(DB::insert("UPDATE service_providers SET country = (?), region = (?), city = (?), business_name = (?), business_desc = (?), business_goals = (?), business_website = (?), business_address = (?), business_registered = (?), registration_num = (?), tin_num = (?) WHERE id = (?)", [
//            $gbiCountry, $gbiRegion, $gbiCity, $gbiCompanyName, $gbiBusinessDesc, $gbiBusinessGoals, $gbiCompanyWebsiteUrl, $gbiCompanyAddress, $gbiBusinessRegistered, $gbiRegistrationNumber, $gbiTinNumber, Auth::id()
//        ])){
//            return response()->json(["status"=> 200]);
//        } else {
//            return response()->json(["status"=> 500]);
//        }
//    }

    public function uploadServiceProviderLogo($imageFile){
        $image      = $imageFile;
        $fileName   = time() . '.' . $image->getClientOriginalExtension();

        $img = Image::make($image->getRealPath());
//        $img->resize(306, 306, function ($constraint) {
//            $constraint->aspectRatio();
//        });

        DB::update("UPDATE sp_logos SET logo_name  = (?) WHERE service_provider_id = (?)", [$fileName, Auth::id()]);
        $img->stream(); // <-- Key point

        //dd();
        Storage::disk('providers')->put($fileName, $img, 'public');
        return;
    }

    public function updateServiceProviderSmp(){
        $facebook = $_GET["facebook"];
        $twitter = $_GET["twitter"];
        $instagram = $_GET["instagram"];
        $googlePlus = $_GET["google-plus"];
        $linkedin = $_GET["linkedin"];
        $whatsapp = $_GET["whatsapp"];
        $facebookVibrancy = $_GET["facebook-vibrancy"];
        $twitterVibrancy = $_GET["twitter-vibrancy"];
        $instagramVibrancy = $_GET["instagram-vibrancy"];
        $googlePlusVibrancy = $_GET["google-plus-vibrancy"];
        $whatsappVibrancy = $_GET["whatsapp-vibrancy"];
        $linkedinVibrancy = $_GET["linkedin-vibrancy"];

        DB::update("UPDATE service_providers_smp SET username = (?), vibrancy = (?) WHERE social_media = (?) AND service_provider_id = (?)", [
            $facebook, $facebookVibrancy, "facebook", Auth::id()
        ]);
        DB::update("UPDATE service_providers_smp SET username = (?), vibrancy = (?) WHERE social_media = (?) AND service_provider_id = (?)", [
            $twitter, $twitterVibrancy, "twitter", Auth::id()
        ]);
        DB::update("UPDATE service_providers_smp SET username = (?), vibrancy = (?) WHERE social_media = (?) AND service_provider_id = (?)", [
            $instagram, $instagramVibrancy, "instagram", Auth::id()
        ]);
        DB::update("UPDATE service_providers_smp SET username = (?), vibrancy = (?) WHERE social_media = (?) AND service_provider_id = (?)", [
            $linkedin, $linkedinVibrancy, "linkedin", Auth::id()
        ]);
        DB::update("UPDATE service_providers_smp SET username = (?), vibrancy = (?) WHERE social_media = (?) AND service_provider_id = (?)", [
            $googlePlus, $googlePlusVibrancy, "google-plus", Auth::id()
        ]);
        DB::update("UPDATE service_providers_smp SET username = (?), vibrancy = (?) WHERE social_media = (?) AND service_provider_id = (?)", [
            $whatsapp, $whatsappVibrancy, "whatsapp", Auth::id()
        ]);

        return response()->json(["status"=>200]);
    }

    public function getRegionCities(){
        $region = $_GET["region"];
        $cities = DB::select("SELECT city FROM location WHERE region_or_state = (?)", [$region]);

        return response()->json(["cities"=> $cities]);
    }

    public function serviceProviderPage($userUrlText){
        $spId = DB::select("SELECT id FROM service_providers WHERE sp_custom_profile_text = (?)", [$userUrlText]);
        $services = [];
        foreach ($spId as $item){
            $services = DB::select("SELECT * FROM services WHERE service_provider_id = (?)", [$item->id]);
        }

        return $services;
    }

    public function updateGbi(Request $request){
        $gbiCompanyName = $request->input("gbi-company-name");
        $gbiCountry = $request->input("gbi-country");
        $gbiRegion = $request->input("gbi-regions");
        $gbiCity = $request->input("gbi-cities");
        $gbiCompanyWebsiteUrl = $request->input("gbi-website-url");
        $gbiCompanyAddress = $request->input("gbi-business-address");
        $gbiBusinessDesc = $request->input("gbi-business-desc");
        $gbiBusinessGoals = $request->input("gbi-business-goals");
        $gbiBusinessRegistered = $request->input("gbi-business-registered");
        $gbiRegistrationNumber = $request->input("gbi-business-reg-no");
        $gbiTinNumber = $request->input("gbi-business-tin-number");
        $gbiLogo = $request->file("gbi-business-logo");

        if ($gbiBusinessRegistered == "on")
            $gbiBusinessRegistered = 1;
        else
            $gbiBusinessRegistered = 0;

        if ($gbiLogo){
            $gbiLogo->store('/public/providers/logos');
            DB::update("UPDATE sp_logos SET logo_name = (?)", [$gbiLogo->hashName()]);
        }

        if(DB::insert(
            "UPDATE service_providers SET country = (?), region = (?), city = (?), business_name = (?), business_desc = (?), business_goals = (?), business_website = (?), business_address = (?), business_registered = (?), registration_num = (?), tin_num = (?) WHERE id = (?)",
            [
                $gbiCountry, $gbiRegion, $gbiCity, $gbiCompanyName, $gbiBusinessDesc, $gbiBusinessGoals, $gbiCompanyWebsiteUrl, $gbiCompanyAddress, $gbiBusinessRegistered, $gbiRegistrationNumber, $gbiTinNumber, Auth::id()
            ]
        )){
            return redirect()->intended('/provider-home');
            return response()->json(["status"=> 200]);
        } else {
            return response()->json(["status"=> 500]);
        }
    }
}
