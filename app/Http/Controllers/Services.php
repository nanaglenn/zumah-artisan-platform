<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Image;

class Services extends Controller
{
    public function createService(){
        $serviceType = $_GET['service-type'];
        $serviceCategory = $_GET['service-category'];
        $serviceName = $_GET['service-name'];
        $serviceCountry = $_GET['service-country'];
        $serviceRegion = $_GET['service-region'];
        $serviceCity = $_GET['service-city'];
        $workingDays = $_GET['service-working-days'];
        $serviceWorkingHoursStart = $_GET['service-working-hours-start'];
        $serviceWorkingHoursEnd = $_GET['service-working-hours-end'];
        $serviceDescription = $_GET['service-description'];
        $startPrice = $_GET['service-start-price'];
        $priceNegotiable = $_GET['price-negotiable'];

        if ($priceNegotiable == "true")
            $priceNegotiable = 1;
        else
            $priceNegotiable = 0;

        $servicePricingDesc = $_GET['service-pricing-info'];
        $serviceProviderExperience = $_GET['service-provider-experience'];
        $serviceProviderClientele = $_GET['service-provider-clientele'];
        $serviceProviderQualification = $_GET['service-provider-qualification'];

    //        GBI FOR NEW SERVICE
        $servicePhone = $_GET["new-service-gbi-sp-phone"];
        $newServiceCompanyName = $_GET["new-service-gbi-business-name"];
        $newServiceUrl = $_GET["new-service-gbi-business-website-url"];
        $newServiceEmail = $_GET["new-service-gbi-sp-email"];
        $newServiceAddress = $_GET["new-service-gbi-business-address"];
        $newServiceBusinessDesc = $_GET["new-service-gbi-business-description"];
        $newServiceBusinessGoals = $_GET["new-service-gbi-business-goals"];
        $newServiceBusinessRegistered = $_GET["new-service-gbi-business-registered"];
        $newServiceBusinessRegistrationNum = $_GET["new-service-gbi-business-reg-no"];
        $newServiceBusinessTinNum = $_GET["new-service-gbi-tin-number"];
//        SMP FOR NEW SERVICE
        $newServiceFacebook = $_GET["new-service-smp-facebook-name"];
        $newServiceTwitter = $_GET["new-service-smp-twitter-handle"];
        $newServiceInstagram = $_GET["new-service-smp-instagram-handle"];
        $newServiceLinkedin = $_GET["new-service-smp-linkdin-name"];
        $newServiceGooglePlus = $_GET["new-service-smp-google-plus-name"];
        $newServiceWhatsapp = $_GET["new-service-smp-whatsapp-number"];
//        SMP FOR NEW SERVICE
        $newServiceFacebookVibrancy = $_GET["new-service-smp-facebook-vibrancy"];
        $newServiceTwitterVibrancy = $_GET["new-service-smp-twitter-vibrancy"];
        $newServiceInstagramVibrancy = $_GET["new-service-smp-linkdin-vibrancy"];
        $newServiceLinkedinVibrancy = $_GET["new-service-smp-instagram-vibrancy"];
        $newServiceGooglePlusVibrancy = $_GET["new-service-smp-google-plus-vibrancy"];
        $newServiceWhatsappVibrancy = $_GET["new-service-smp-whatsapp-vibrancy"];

        if(DB::insert("INSERT INTO services (service_provider_id, name, category, country, region, city, working_hours_start, working_hours_end, type, service_desc, start_price, price_negotiable, price_desc, number_of_years_ex, clientele, qualification) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", [
                Auth::id(), $serviceName, $serviceCategory, $serviceCountry, $serviceRegion, $serviceCity, $serviceWorkingHoursStart, $serviceWorkingHoursEnd, $serviceType, $serviceDescription, $startPrice, $priceNegotiable, $servicePricingDesc, $serviceProviderExperience, $serviceProviderClientele, $serviceProviderQualification
            ])
        ) {
            $serviceId = DB::select("SELECT id FROM services WHERE service_provider_id = (?) ORDER BY id DESC LIMIT 1",[Auth::id()]);

            foreach ($serviceId as $item){
                $booleanValues = array();
                for ($iterator = 0; $iterator < count($workingDays); $iterator++){

                    if ($workingDays[$iterator] == "true")
                        $booleanValues[$iterator] = 1;
                    else
                        $booleanValues[$iterator] = 0;
                }

                if ($newServiceBusinessRegistered == true)
                    $newServiceBusinessRegistered = 1;
                else
                    $newServiceBusinessRegistered = 0;

                DB::insert("INSERT INTO working_days (service_id, sunday, monday, tuesday, wednesday, thursday, friday, saturday) VALUES (?,?,?,?,?,?,?,?)",
                    [$item->id, $booleanValues[0], $booleanValues[1], $booleanValues[2], $booleanValues[3], $booleanValues[4], $booleanValues[5], $booleanValues[6]]
                );

//                GBI INSERTION
                DB::insert("INSERT INTO services_gbi (service_id, company_name, phone, business_website, business_email, business_address, business_desc, business_goals, business_registered, registration_num, tin_num) VALUES (?,?,?,?,?,?,?,?,?,?,?)", [
                    $item->id, $newServiceCompanyName, $servicePhone, $newServiceUrl, $newServiceEmail, $newServiceAddress, $newServiceBusinessDesc, $newServiceBusinessGoals, $newServiceBusinessRegistered, $newServiceBusinessRegistrationNum, $newServiceBusinessTinNum
                ]);

//                SMP INSERTION
                DB::insert("INSERT INTO services_smp (service_id, social_media, vibrancy) VALUES (?,?,?)", [$item->id, $newServiceFacebook, $newServiceFacebookVibrancy]);
                DB::insert("INSERT INTO services_smp (service_id, social_media, vibrancy) VALUES (?,?,?)", [$item->id, $newServiceTwitter, $newServiceTwitterVibrancy]);
                DB::insert("INSERT INTO services_smp (service_id, social_media, vibrancy) VALUES (?,?,?)", [$item->id, $newServiceWhatsapp, $newServiceWhatsappVibrancy]);
                DB::insert("INSERT INTO services_smp (service_id, social_media, vibrancy) VALUES (?,?,?)", [$item->id, $newServiceInstagram, $newServiceInstagramVibrancy]);
                DB::insert("INSERT INTO services_smp (service_id, social_media, vibrancy) VALUES (?,?,?)", [$item->id, $newServiceLinkedin, $newServiceLinkedinVibrancy]);
                DB::insert("INSERT INTO services_smp (service_id, social_media, vibrancy) VALUES (?,?,?)", [$item->id, $newServiceGooglePlus, $newServiceGooglePlusVibrancy]);

            }
            return response()->json(["status"=> 200]);
        } else {
            return response()->json(["status"=> 500]);
        }
    }

    public function getServiceToEditData(){
        session(["serviceToEdit" => $_GET['serviceId']]);

        $serviceData = DB::select("SELECT * FROM services WHERE id = (?)", [$_GET['serviceId']]);

        $serviceWorkingDays = DB::select("SELECT sunday, monday, tuesday, wednesday, thursday, friday, saturday FROM working_days WHERE service_id = (?)", [$_GET["serviceId"]]);

        $serviceGBI = DB::select("SELECT * FROM services_gbi WHERE service_id = (?)", [$_GET["serviceId"]]);

        $serviceSmp = DB::select("SELECT * FROM services_smp WHERE service_id = (?)", [$_GET["serviceId"]]);

        $serviceImages = DB::select("SELECT * FROM service_images WHERE service_id = (?)", [$_GET['serviceId']]);

        $serviceCities = [];

        foreach ($serviceData as $serviceDatum) {
            $serviceCities = DB::select("SELECT city FROM location WHERE region_or_state = (?)", [$serviceDatum->region]);
        }

        return response()->json(["serviceData"=> $serviceData, "serviceWorkingDays"=> $serviceWorkingDays, "serviceImages"=> $serviceImages, "serviceGbi"=> $serviceGBI, "serviceSmp"=>$serviceSmp, "serviceCities"=>$serviceCities]);
    }

    public function updateServiceInformation(){;
        $editServiceType = $_GET['edit-data-service-type'];
        $editServiceCategory = $_GET['edit-data-service-category'];
        $editServiceName = $_GET['edit-data-service-name'];
        $editServiceCountry = $_GET['edit-data-service-country'];
        $editServiceRegion = $_GET['edit-data-service-region'];
        $editServiceCity = $_GET['edit-data-service-city'];
        $editWorkingDays = $_GET['edit-data-service-working-days'];
        $editServiceStartHours = $_GET['edit-data-service-working-hours-start'];
        $editServiceEndHours = $_GET['edit-data-service-working-hours-end'];
        $editServiceDesc = $_GET['edit-data-service-description'];

        DB::update("UPDATE services SET name = (?), category = (?), country = (?), region = (?), city = (?), working_hours_start = (?), working_hours_end = (?), type = (?), service_desc = (?) WHERE id = (?)", [
            $editServiceName, $editServiceCategory, $editServiceCountry, $editServiceRegion, $editServiceCity, $editServiceStartHours, $editServiceEndHours, $editServiceType, $editServiceDesc, session()->get("serviceToEdit")
        ]);

        $editWorkingDaysBooleanValues = array();

        for ($iterator = 0; $iterator < count($editWorkingDays); $iterator++){
            if ($editWorkingDays[$iterator] == "true")
                $editWorkingDaysBooleanValues[$iterator] = 1;
            else
                $editWorkingDaysBooleanValues[$iterator] = 0;
        }

        if(DB::update("UPDATE working_days set sunday = (?), monday = (?), tuesday = (?), wednesday = (?), thursday = (?), friday = (?), saturday = (?) WHERE service_id = (?)", [
            $editWorkingDaysBooleanValues[0],
            $editWorkingDaysBooleanValues[1],
            $editWorkingDaysBooleanValues[2],
            $editWorkingDaysBooleanValues[3],
            $editWorkingDaysBooleanValues[4],
            $editWorkingDaysBooleanValues[5],
            $editWorkingDaysBooleanValues[6],
            session()->get("serviceToEdit")
        ])){
            return response()->json(["status"=>200]);
        } else
            return response()->json(["status"=>500]);
    }

    public function updateServicePricing(){
        $editServiceStartPrice = $_GET['edit-service-start-price'];
        $editServicePriceNegotiable = $_GET['edit-service-price-negotiable'];
        $editServicePriceDesc = $_GET['edit-service-pricing-guideline'];

        if(DB::update("UPDATE services SET start_price = (?), price_negotiable = (?), price_desc = (?) WHERE id = (?)", [$editServiceStartPrice, $editServicePriceNegotiable, $editServicePriceDesc, session()->get("serviceToEdit")]))
            return response()->json(["status"=>200]);
        else
            return response()->json(["status"=>500]);
    }
    
    public function updateServiceRating(){
        $editServiceExperience = $_GET['edit-service-experience'];
        $editServiceClientele = $_GET['edit-service-clientele'];
        $editServiceProviderQualification = $_GET['edit-service-provider-qualification'];

        if(DB::update("UPDATE services SET number_of_years_ex = (?), clientele = (?), qualification = (?) WHERE id = (?)", [$editServiceExperience, $editServiceClientele, $editServiceProviderQualification, session()->get("serviceToEdit")]))
            return response()->json(["status"=> 200]);
        else
            return response()->json(["status"=> 500]);
    }

    public function deleteService(){
        $serviceId = $_GET['service-id'];

        if (DB::update("UPDATE services SET status = (?) WHERE id = (?)", ["inactive", $serviceId]))
            return response()->json(["status"=> 200]);
        else
            return response()->json(["status"=> 500]);
    }

    public function loadServicePage(){

    }

    public function serviceDetails($serviceId) {
        $serviceDetails = DB::select("SELECT id, service_provider_id, name, category, region, city, service_desc, start_price, price_negotiable, price_desc, type, number_of_years_ex, clientele, qualification, working_hours_start, working_hours_end, created_at, updated_at FROM services WHERE id = (?)", [$serviceId]);
        $workingDays = DB::select("SELECT sunday, monday, tuesday, wednesday, thursday, friday, saturday FROM working_days WHERE service_id = (?)", [$serviceId]);
        $service_smp = DB::select("SELECT social_media, username FROM services_smp WHERE service_id = (?)", [$serviceId]);
        $service_gbi = DB::select("SELECT * FROM services_gbi WHERE service_id = (?)", [$serviceId]);
        $serviceImages = DB::select("SELECT * FROM service_images WHERE service_id = (?) ORDER BY id DESC", [$serviceId]);

        $serviceCreated = ""; $serviceUpdated = "";

        $listOfWorkingDays = [];

        $iterator = 0;
        $daysArrayIterator = 0;
        $daysArray = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

        foreach ($workingDays as $workingDay){

            if($workingDay->sunday == 1){
                $listOfWorkingDays[$iterator] = $daysArray[$daysArrayIterator];
                $iterator++;
            }
            $daysArrayIterator++;

            if($workingDay->monday == 1){
                $listOfWorkingDays[$iterator] = $daysArray[$daysArrayIterator];
                $iterator++;
            }
            $daysArrayIterator++;
            if($workingDay->tuesday == 1){
                $listOfWorkingDays[$iterator] = $daysArray[$daysArrayIterator];
                $iterator++;
            }
            $daysArrayIterator++;
            if($workingDay->wednesday == 1){
                $listOfWorkingDays[$iterator] = $daysArray[$daysArrayIterator];
                $iterator++;
            }
            $daysArrayIterator++;
            if($workingDay->thursday == 1){
                $listOfWorkingDays[$iterator] = $daysArray[$daysArrayIterator];
                $iterator++;
            }
            $daysArrayIterator++;
            if($workingDay->friday == 1){
                $listOfWorkingDays[$iterator] = $daysArray[$daysArrayIterator];
                $iterator++;
            }
            $daysArrayIterator++;

            if($workingDay->saturday == 1){
                $listOfWorkingDays[$iterator] = $daysArray[$daysArrayIterator];
                $iterator++;
            }
            $daysArrayIterator++;
        }
        return view("service", compact("serviceDetails", "listOfWorkingDays", "service_smp", "service_gbi", "serviceImages", "serviceId"));
    }

    public function getSelectedCategoriesServices(){
        $selectedCategories = $_GET['selected-categories'];
        $selectedRegions = $_GET['selected-regions'];
        $selectedCities = $_GET['selected-cities'];


        if ($selectedCategories != 0){
//            $query = "SELECT id, name, category, city, service_desc, start_price FROM services WHERE status = 'active' AND ";
            $query = "SELECT id, name, category, city, service_desc, start_price FROM services WHERE (";

            if (count($selectedCategories) == 1) {
                $query = $query."category = '".$selectedCategories[0]."')";
            } else{
                for ($iterator  = 0; $iterator < count($selectedCategories); $iterator++){
                    if ($iterator < (count($selectedCategories)-1))
                        $query = $query."category = '".$selectedCategories[$iterator]."' OR ";
                    else if ($iterator == (count($selectedCategories)-1))
                        $query = $query."category = '".$selectedCategories[$iterator]."')";
                }
            }
        } else{
//            $query = "SELECT id, name, category, city, service_desc, start_price FROM services WHERE status = 'active' ";
            $query = "SELECT id, name, category, city, service_desc, start_price FROM services WHERE ";
        }

        if ($selectedRegions != 0){
            if (count($selectedRegions) == 1) {
                if ($selectedCategories == 0)
                    $query = "SELECT id, name, category, city, service_desc, start_price FROM services WHERE (region = '".$selectedRegions[0]."')";
                else
                    $query = $query." AND (region = '".$selectedRegions[0]."')";
            } else {
                if ($selectedCategories == 0)
                    $query = "SELECT id, name, category, city, service_desc, start_price FROM services WHERE (";
                else
                    $query = $query." AND (";

                for ($iterator  = 0; $iterator < count($selectedRegions); $iterator++){
                    if ($iterator < (count($selectedRegions)-1))
                        $query = $query."region = '".$selectedRegions[$iterator]."' OR ";
                    else if ($iterator == (count($selectedRegions)-1))
                        $query = $query."region = '".$selectedRegions[$iterator]."')";
                }
            }
        }

//        return $query;
        if ($selectedCities != 0){
            if (count($selectedCities) == 1) {
                if ($selectedRegions == 0)
                    $query = "SELECT id, name, category, city, service_desc, start_price FROM services WHERE (city = '".$selectedCities[0]."')";
                else if (count($selectedRegions) > 0)
                    $query = $query." AND (city = '".$selectedCities[0]."')";

            } else {
                if ($selectedRegions == 0)
                    $query = "SELECT id, name, category, city, service_desc, start_price FROM services WHERE (";
                else
                    $query = $query." AND (";

                for ($iterator  = 0; $iterator < count($selectedCities); $iterator++){
                    if ($iterator < (count($selectedCities)-1))
                        $query = $query."city = '".$selectedCities[$iterator]."' OR ";
                    else if ($iterator == (count($selectedCities)-1))
                        $query = $query."city = '".$selectedCities[$iterator]."')";
                }
            }
        }

        if ($selectedCategories == 0 && $selectedRegions == 0 && $selectedCities == 0)
            $query = "SELECT id, name, category, city, service_desc, start_price FROM services WHERE status = 'active'";
        else
            $query = $query." AND status = 'active'";
//        return $query;

        $services = DB::select($query." ORDER BY id DESC");

        $serviceImages = [];
        $iterator = 0;

        foreach ($services as $service){
            $serviceImages[$iterator] = DB::select("SELECT * FROM service_images WHERE service_id = (?) ORDER BY service_id", [$service->id]);
            $iterator++;
        }

        return response()->json(["services"=> $services, "serviceImages"=> $serviceImages]);
    }

    public function createNewService(Request $request){
        $serviceType = $request->input('service-type');
        $serviceCategory = $request->input('new-service-category');
        $serviceName = $request->input('new-service-name');
        $serviceCountry = $request->input('new-service-country');
        $serviceRegion = $request->input('new-service-regions');
        $serviceCity = $request->input('new-service-cities');
        $serviceImageArray = [];
        $serviceImageArray[0] = $request->file('new-service-image-0');
        $serviceImageArray[1] = $request->file('new-service-image-1');
        $serviceImageArray[2] = $request->file('new-service-image-2');
        $serviceImageArray[3] = $request->file('new-service-image-3');
        $serviceImageArray[4] = $request->file('new-service-image-4');

        $workingDays = [];
        $workingDays[0] = $request->input('new-service-working-days-sun');
        $workingDays[1] = $request->input('new-service-working-days-mon');
        $workingDays[2] = $request->input('new-service-working-days-tues');
        $workingDays[3] = $request->input('new-service-working-days-wed');
        $workingDays[4] = $request->input('new-service-working-days-thurs');
        $workingDays[5] = $request->input('new-service-working-days-fri');
        $workingDays[6] = $request->input('new-service-working-days-sat');

        $serviceWorkingHoursStart = $request->input('new-service-working-hours-start');
        $serviceWorkingHoursEnd = $request->input('new-service-working-hours-end');
        $serviceDescription = $request->input('new-service-description');
        $startPrice = $request->input('new-service-start-price');
        $priceNegotiable = $request->input('new-price-negotiable');

        if ($priceNegotiable == "true")
            $priceNegotiable = 1;
        else
            $priceNegotiable = 0;

        $servicePricingDesc = $request->input('new-service-pricing-info');
        $serviceProviderExperience = $request->input('new-service-provider-experience');
        $serviceProviderClientele = $request->input('new-service-provider-clientele');
        $serviceProviderQualification = $request->input('new-service-provider-qualification');

        //        GBI FOR NEW SERVICE
        $servicePhone = $request->input("new-service-gbi-sp-phone");
        $newServiceCompanyName = $request->input("new-service-gbi-business-name");
        $newServiceUrl = $request->input("new-service-gbi-business-website-url");
        $newServiceEmail = $request->input("new-service-gbi-sp-email");
        $newServiceAddress = $request->input("new-service-gbi-business-address");
        $newServiceBusinessDesc = $request->input("new-service-gbi-business-description");
        $newServiceBusinessGoals = $request->input("new-service-gbi-business-goals");
        $newServiceBusinessRegistered = $request->input("new-service-gbi-business-registered");
        $newServiceBusinessRegistrationNum = $request->input("new-service-gbi-business-reg-no");
        $newServiceBusinessTinNum = $request->input("new-service-gbi-tin-number");
        //        SMP FOR NEW SERVICE
        $newServiceFacebook = $request->input("new-service-smp-facebook");
        $newServiceTwitter = $request->input("new-service-smp-twitter");
        $newServiceInstagram = $request->input("new-service-smp-instagram");
        $newServiceLinkedin = $request->input("new-service-smp-linkedin");
        $newServiceGooglePlus = $request->input("new-service-smp-google-plus");
        $newServiceWhatsapp = $request->input("new-service-smp-whatsapp");
        //        SMP FOR NEW SERVICE
        $newServiceFacebookVibrancy = $request->input("new-service-smp-facebook-vibrancy");
        $newServiceTwitterVibrancy = $request->input("new-service-smp-twitter-vibrancy");
        $newServiceInstagramVibrancy = $request->input("new-service-smp-linkedin-vibrancy");
        $newServiceLinkedinVibrancy = $request->input("new-service-smp-instagram-vibrancy");
        $newServiceGooglePlusVibrancy = $request->input("new-service-smp-google-plus-vibrancy");
        $newServiceWhatsappVibrancy = $request->input("new-service-smp-whatsapp-vibrancy");

        if(DB::insert("INSERT INTO services (service_provider_id, name, category, country, region, city, working_hours_start, working_hours_end, type, service_desc, start_price, price_negotiable, price_desc, number_of_years_ex, clientele, qualification) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", [
            Auth::id(), $serviceName, $serviceCategory, $serviceCountry, $serviceRegion, $serviceCity, $serviceWorkingHoursStart, $serviceWorkingHoursEnd, $serviceType, $serviceDescription, $startPrice, $priceNegotiable, $servicePricingDesc, $serviceProviderExperience, $serviceProviderClientele, $serviceProviderQualification
        ])
        ) {
            $serviceId = DB::select("SELECT id FROM services WHERE service_provider_id = (?) ORDER BY id DESC LIMIT 1",[Auth::id()]);

            foreach ($serviceId as $item){
                $booleanValues = [];

                for ($iterator = 0; $iterator < count($workingDays); $iterator++){
                    if ($workingDays[$iterator] == "on")
                        $booleanValues[$iterator] = 1;
                    else
                        $booleanValues[$iterator] = 0;
                }

                if ($newServiceBusinessRegistered == true)
                    $newServiceBusinessRegistered = 1;
                else
                    $newServiceBusinessRegistered = 0;

                $hashNames = [];
                for ($iterator = 0; $iterator < count($serviceImageArray); $iterator++ ) {
                    if ($serviceImageArray[$iterator]) {
                        $serviceImageArray[$iterator]->store('/public/service_images/');
                        $hashNames[$iterator] = $serviceImageArray[$iterator]->hashName();
                    }else{
                        $hashNames[$iterator] = NULL;
                    }
                }

                DB::insert("INSERT INTO service_images (service_id, image_name_0, image_name_1, image_name_2, image_name_3, image_name_4) VALUES(?,?,?,?,?,?)", [
                    $item->id, $hashNames[0], $hashNames[1], $hashNames[2], $hashNames[3], $hashNames[4]
                ]);


                DB::insert("INSERT INTO working_days (service_id, sunday, monday, tuesday, wednesday, thursday, friday, saturday) VALUES (?,?,?,?,?,?,?,?)",
                    [$item->id, $booleanValues[0], $booleanValues[1], $booleanValues[2], $booleanValues[3], $booleanValues[4], $booleanValues[5], $booleanValues[6]]
                );

//                GBI INSERTION
                DB::insert("INSERT INTO services_gbi (service_id, company_name, phone, business_website, business_email, business_address, business_desc, business_goals, business_registered, registration_num, tin_num) VALUES (?,?,?,?,?,?,?,?,?,?,?)", [
                    $item->id, $newServiceCompanyName, $servicePhone, $newServiceUrl, $newServiceEmail, $newServiceAddress, $newServiceBusinessDesc, $newServiceBusinessGoals, $newServiceBusinessRegistered, $newServiceBusinessRegistrationNum, $newServiceBusinessTinNum
                ]);

//                SMP INSERTION
                DB::insert("INSERT INTO services_smp (service_id, social_media, username, vibrancy) VALUES (?,?,?,?)", [$item->id, "facebook", $newServiceFacebook, $newServiceFacebookVibrancy]);
                DB::insert("INSERT INTO services_smp (service_id, social_media, username, vibrancy) VALUES (?,?,?,?)", [$item->id, "twitter",$newServiceTwitter, $newServiceTwitterVibrancy]);
                DB::insert("INSERT INTO services_smp (service_id, social_media, username, vibrancy) VALUES (?,?,?,?)", [$item->id, "instagram", $newServiceInstagram, $newServiceWhatsappVibrancy]);
                DB::insert("INSERT INTO services_smp (service_id, social_media, username,vibrancy) VALUES (?,?,?,?)", [$item->id, "linkedin", $newServiceLinkedin, $newServiceInstagramVibrancy]);
                DB::insert("INSERT INTO services_smp (service_id, social_media, username, vibrancy) VALUES (?,?,?,?)", [$item->id, "google-plus",$newServiceGooglePlus, $newServiceLinkedinVibrancy]);
                DB::insert("INSERT INTO services_smp (service_id, social_media,  username, vibrancy) VALUES (?,?,?,?)", [$item->id, "whatsapp", $newServiceWhatsapp, $newServiceGooglePlusVibrancy]);
            }
            return redirect()->intended('/provider-home');
        } else {
            return response()->json(["status"=> 500]);
        }
    }

    public function setImageToDeleteCol(){
        session(["service-to-delete-col"=>$_GET["image-to-delete-col"]]);
        return response()->json(["status"=>200]);
    }

    public function deleteServiceImage(){
        $imageToDeleteCol = session()->get("service-to-delete-col");
        $imageToDeleteRowId = $_GET['image-to-del-row-id'];
        $query = "UPDATE service_images SET $imageToDeleteCol = NULL WHERE id = $imageToDeleteRowId";
        if (DB::update($query))
            return response()->json(["status"=>200]);
        else
            return response()->json(["status"=>500]);
    }

    public function getServiceImageForCarousel(){
        $serviceImages = DB::select("SELECT image_name FROM service_images WHERE service_id = (?)", [$_GET['service-id']]);
        return $serviceImages;
    }

    public function updateService(Request $request){
        $editServiceType = $request->input('edit-service-type');
        $editServiceCategory = $request->input('edit-service-category');
        $editServiceName = $request->input('edit-service-name');
        $editServiceCountry = $request->input('edit-service-country');
        $editServiceRegion = $request->input('edit-service-regions');
        $editServiceCity = $request->input('edit-service-cities');
        $editWorkingDays[0] = $request->input('edit-service-working-days-sun');
        $editWorkingDays[1] = $request->input('edit-service-working-days-mon');
        $editWorkingDays[2] = $request->input('edit-service-working-days-tues');
        $editWorkingDays[3] = $request->input('edit-service-working-days-wed');
        $editWorkingDays[4] = $request->input('edit-service-working-days-thurs');
        $editWorkingDays[5] = $request->input('edit-service-working-days-fri');
        $editWorkingDays[6] = $request->input('edit-service-working-days-sat');
        $editServiceStartHours = $request->input('edit-service-working-hours-start');
        $editServiceEndHours = $request->input('edit-service-working-hours-end');
        $editServiceDesc = $request->input('edit-service-desc');
        $editServiceStartPrice = $request->input('edit-service-start-price');
        $editServicePriceDesc = $request->input('edit-service-pricing-guideline');
//
        $editServiceBusinessName = $request->input('edit-service-gbi-business-name');
        $editServicePhone = $request->input('edit-service-gbi-sp-phone');
        $editServiceWebsite = $request->input('edit-service-gbi-business-website-url');
        $editServiceEmail = $request->input('edit-service-gbi-sp-email');
        $editServiceAddress = $request->input('edit-service-gbi-business-address');
        $editServiceBusinessDesc = $request->input('edit-service-gbi-business-description');
        $editServiceGoal = $request->input('edit-service-gbi-business-goals');
        $editServiceBusinessReg = $request->input('edit-service-gbi-business-registered');
        if ($editServiceBusinessReg == "on")
            $editServiceBusinessReg = 1;
        else
            $editServiceBusinessReg = 0;
        $editServiceBusinessRegNo = $request->input('edit-service-gbi-business-reg-no');
        $editServiceBusinessTinNo = $request->input('edit-service-gbi-tin-number');
//
        $editServiceFacebook = $request->input('edit-service-smp-facebook');
        $editServiceInstagram = $request->input('edit-service-smp-instagram');
        $editServiceGooglePlus = $request->input('edit-service-smp-google-plus');
        $editServiceTwitter = $request->input('edit-service-smp-twitter');
        $editServiceLinkedin = $request->input('edit-service-smp-linkedin');
        $editServiceWhatsapp = $request->input('edit-service-smp-whatsapp');
//
        $editServiceFacebookVibrancy = $request->input('edit-service-smp-facebook-vibrancy');
        $editServiceInstagramVibrancy = $request->input('edit-service-smp-instagram-vibrancy');
        $editServiceGooglePlusVibrancy = $request->input('edit-service-smp-google-plus-vibrancy');
        $editServiceTwitterVibrancy = $request->input('edit-service-smp-twitter-vibrancy');
        $editServiceLinkedinVibrancy = $request->input('edit-service-smp-linkedin-vibrancy');
        $editServiceWhatsappVibrancy = $request->input('edit-service-smp-whatsapp-vibrancy');
//
        $editServiceProviderExperience = $request->input('edit-service-provider-experience');
        $editServiceProviderClientele = $request->input('edit-service-provider-clientele');
        $editServiceProviderQualification = $request->input('edit-service-provider-qualification');
//
        $editServiceImageArray[0] = $request->file('edit-service-image-0');
        $editServiceImageArray[1] = $request->file('edit-service-image-1');
        $editServiceImageArray[2] = $request->file('edit-service-image-2');
        $editServiceImageArray[3] = $request->file('edit-service-image-3');
        $editServiceImageArray[4] = $request->file('edit-service-image-4');


        DB::update("UPDATE services SET name = (?), category = (?), country = (?), region = (?), city = (?), working_hours_start = (?), working_hours_end = (?), type = (?), service_desc = (?), start_price = (?), price_desc = (?), number_of_years_ex = (?), clientele = (?), qualification = (?) WHERE id = (?)", [
            $editServiceName, $editServiceCategory, $editServiceCountry, $editServiceRegion, $editServiceCity, $editServiceStartHours, $editServiceEndHours, $editServiceType, $editServiceDesc, $editServiceStartPrice, $editServicePriceDesc, $editServiceProviderExperience, $editServiceProviderClientele, $editServiceProviderQualification, session()->get("serviceToEdit")
        ]);

        $editWorkingDaysBooleanValues = array();

        for ($iterator = 0; $iterator < count($editWorkingDays); $iterator++){
            if ($editWorkingDays[$iterator] == "true")
                $editWorkingDaysBooleanValues[$iterator] = 1;
            else
                $editWorkingDaysBooleanValues[$iterator] = 0;
        }

        DB::update("UPDATE working_days SET sunday = (?), monday = (?), tuesday = (?), wednesday = (?), thursday = (?), friday = (?), saturday = (?) WHERE service_id = (?)", [
            $editWorkingDaysBooleanValues[0],
            $editWorkingDaysBooleanValues[1],
            $editWorkingDaysBooleanValues[2],
            $editWorkingDaysBooleanValues[3],
            $editWorkingDaysBooleanValues[4],
            $editWorkingDaysBooleanValues[5],
            $editWorkingDaysBooleanValues[6],
            session()->get("serviceToEdit")
        ]);

        DB::update("UPDATE services_smp SET username  = (?), vibrancy = (?) WHERE service_id = (?) AND social_media = (?)", [$editServiceFacebook, $editServiceFacebookVibrancy, session()->get("serviceToEdit"), "facebook"]);
        DB::update("UPDATE services_smp SET username  = (?), vibrancy = (?) WHERE service_id = (?) AND social_media = (?)", [$editServiceTwitter, $editServiceTwitterVibrancy, session()->get("serviceToEdit"), "twitter"]);
        DB::update("UPDATE services_smp SET username  = (?), vibrancy = (?) WHERE service_id = (?) AND social_media = (?)", [$editServiceInstagram, $editServiceInstagramVibrancy, session()->get("serviceToEdit"), "instagram"]);
        DB::update("UPDATE services_smp SET username  = (?), vibrancy = (?) WHERE service_id = (?) AND social_media = (?)", [$editServiceWhatsapp, $editServiceWhatsappVibrancy, session()->get("serviceToEdit"), "whatsapp"]);
        DB::update("UPDATE services_smp SET username  = (?), vibrancy = (?) WHERE service_id = (?) AND social_media = (?)", [$editServiceGooglePlus, $editServiceGooglePlusVibrancy, session()->get("serviceToEdit"), "google-plus"]);
        DB::update("UPDATE services_smp SET username  = (?), vibrancy = (?) WHERE service_id = (?) AND social_media = (?)", [$editServiceLinkedin, $editServiceLinkedinVibrancy, session()->get("serviceToEdit"), "linkedin"]);

        DB::update("UPDATE services_gbi SET company_name = (?), phone = (?), business_website = (?), business_email = (?), business_address = (?), business_desc = (?), business_goals = (?), business_registered = (?), registration_num = (?), tin_num = (?) WHERE service_id = (?)", [
            $editServiceBusinessName, $editServicePhone, $editServiceWebsite, $editServiceEmail, $editServiceAddress, $editServiceBusinessDesc, $editServiceGoal, $editServiceBusinessReg, $editServiceBusinessRegNo, $editServiceBusinessTinNo, session()->get("serviceToEdit")
        ]);


        $hashNameArray = [];
        $hashNameArrayIterator = 0;
//        return $editServiceImageArray;
//        for ($iterator = 0; $iterator < count($editServiceImageArray); $iterator++ ){
//            if ($editServiceImageArray[$iterator] != null) {
//                $editServiceImageArray[$iterator]->store('/public/service_images/');
//                $hashNameArray[$hashNameArrayIterator] = $editServiceImageArray[$iterator]->hashName();
//                $hashNameArrayIterator++;
//            }
//        }
//
//        for ($iterator = 0; $iterator < count($hashNameArray); $iterator++){
//            switch ($iterator) {
//                case 0:
//                    DB::insert("UPDATE service_images SET image_name_0 = (?) WHERE service_id = (?)", [$hashNameArray[$iterator], session()->get("serviceToEdit")]);
//                    break;
//                case 1:
//                    DB::insert("UPDATE service_images SET image_name_1 = (?) WHERE service_id = (?)", [$hashNameArray[$iterator], session()->get("serviceToEdit")]);
//                    break;
//                case 2:
//                    DB::insert("UPDATE service_images SET image_name_2 = (?) WHERE service_id = (?)", [$hashNameArray[$iterator], session()->get("serviceToEdit")]);
//                    break;
//                case 3:
//                    DB::insert("UPDATE service_images SET image_name_3 = (?) WHERE service_id = (?)", [$hashNameArray[$iterator], session()->get("serviceToEdit")]);
//                    break;
//                case 4:
//                    DB::insert("UPDATE service_images SET image_name_4 = (?) WHERE service_id = (?)", [$hashNameArray[$iterator], session()->get("serviceToEdit")]);
//                    break;
//            }
//        }
        return redirect()->intended('/provider-home');
    }

    public function getServiceCarouselImages(){
        $serviceId = $_GET['service-id'];

        $serviceImages = DB::select("SELECT image_name_0, image_name_1, image_name_2, image_name_3, image_name_4 FROM service_images WHERE service_id = (?)", [$serviceId]);

        return response()->json(["service-images"=> $serviceImages]);
    }

    public function getSelectedRegionsCities(){
        $selectedRegions = $_GET['selected-regions'];

        if ($selectedRegions != 0){
            $query = "SELECT city FROM location WHERE ";

            if (count($selectedRegions) == 1) {
                $query = $query."region_or_state = '".$selectedRegions[0]."'";
            } else{
                for ($iterator  = 0; $iterator < count($selectedRegions); $iterator++){
                    if ($iterator < (count($selectedRegions)-1))
                        $query = $query."region_or_state = '".$selectedRegions[$iterator]."' OR ";
                    else if ($iterator == (count($selectedRegions)-1))
                        $query = $query."region_or_state = '".$selectedRegions[$iterator]."'";
                }
            }
        } else{
            $query = "SELECT city FROM location WHERE region_or_state = ''";
        }

        $cities = DB::select($query." ORDER BY city");

//        $iterator = 0;
//        foreach ($cities as $service){
//            $serviceImages[$iterator] = DB::select("SELECT * FROM service_images WHERE service_id = (?) ORDER BY service_id", [$service->id]);
//            $iterator++;
//        }

        return response()->json(["cities"=> $cities]);
    }
}
