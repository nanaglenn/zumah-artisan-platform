<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Authentication extends Controller
{
    public $authObject;

    public function signUpPhoneCheck(){
        $phone = $_GET['phone'];

        $existingPhone = DB::select("SELECT phone FROM users WHERE phone = (?)", [$phone]);

        if (count($existingPhone)){
            return response()->json(["status"=>500]);
        }else
            return response()->json(["status"=>200]);
    }

    public function signUpEmailCheck(){
        $email = $_GET['email'];

        $existingEmail = DB::select("SELECT email FROM users WHERE email = (?)", [$email]);

        if (count($existingEmail)){
            return response()->json(["status"=>500]);
        }else
            return response()->json(["status"=>200]);
    }

    public function serviceProviderSignUp(){
        //Calculate user phone code from IP

        $sp_phoneCode = "+233";
        $sp_name = $_GET['name'];
        $sp_phone = $_GET['phone'];
        $sp_email = $_GET['email'];
        $sp_password = $_GET['password'];

        $sp_signUpData = array(
            "name" => $sp_name,
            "phone"=> $sp_phone,
            "email"=> $sp_email,
            "password"=> $sp_password
        );

        $this->authObject = new Authentication();
        $this->authObject->phoneVerificationCodeGen();

        session(["sp_signUpData" => $sp_signUpData]);

        return response()->json(
            $sp_signUpData
        );
    }

    public function phoneVerificationCodeGen(){
        $code = mt_rand(10000, 99999);
        session(['sp_phoneVerificationCode' => $code]);

        $this->authObject = new Authentication();
        $this->authObject->sendPhoneVerificationCode($code);
        return;
    }

    public function sendPhoneVerificationCode($code){
        //SEND VERIFICATION CODE HERE
        return response()->json(["status"=> 200]);
    }

    public function checkPhoneVerificationCode(Request $request){
        $userCode = $_GET['userCode'];

        if($userCode == $request->session()->get("sp_phoneVerificationCode")){
            $sp_signUpData = $request->session()->get("sp_signUpData");
            $authObject = new Authentication();

            $authObject->registerServiceProvider ( $sp_signUpData["name"], $sp_signUpData["phone"], $sp_signUpData["email"], $sp_signUpData["password"]);

//            if ($status["status"] == 200){
                return response()->json(["status"=> 200]);
//            } else
//                return response()->json(["status"=> 500, "message" => "An error occurred. Contact support for assistance."]);

        } else{
            return response()->json(["status"=> 500]);
        }
    }

    public function registerServiceProvider($sp_name, $sp_phone, $sp_email, $password){
        if(DB::insert("INSERT INTO users (name, email, phone, role, password) VALUES (?,?,?,?,?)", [$sp_name, $sp_email, $sp_phone, "SP", Hash::make($password)])){
            $sp_data = DB::select("SELECT id FROM users WHERE email = (?) AND phone = (?)", [$sp_email, $sp_phone]);

            foreach ($sp_data as $sp_datum){
                DB::insert("INSERT INTO service_providers (id) VALUES ($sp_datum->id)");
                DB::insert("INSERT INTO service_providers_smp (service_provider_id, social_media) VALUES (?,?)", [$sp_datum->id, "facebook"]);
                DB::insert("INSERT INTO service_providers_smp (service_provider_id, social_media) VALUES (?,?)", [$sp_datum->id, "twitter"]);
                DB::insert("INSERT INTO service_providers_smp (service_provider_id, social_media) VALUES (?,?)", [$sp_datum->id, "instagram"]);
                DB::insert("INSERT INTO service_providers_smp (service_provider_id, social_media) VALUES (?,?)", [$sp_datum->id, "whatsapp"]);
                DB::insert("INSERT INTO service_providers_smp (service_provider_id, social_media) VALUES (?,?)", [$sp_datum->id, "google-plus"]);
                DB::insert("INSERT INTO service_providers_smp (service_provider_id, social_media) VALUES (?,?)", [$sp_datum->id, "linkdin"]);
                DB::insert("INSERT INTO sp_logos (service_provider_id) VALUES (?)", [$sp_datum->id]);
            }

            if (Auth::attempt(["phone" => $sp_phone, "password" => $password])){
                return array(["status"=> 200]);
            }else
                return array(["status"=> 500]);
        }
        return;
    }

    public function serviceProviderLoginCheck(){
        $login = $_GET['login'];
        $loginWith = $_GET['login-with'];
    }

    public function serviceProviderLogin(){
        $login = $_GET['login'];
        $loginWith = $_GET['login-with'];
        $password = $_GET['password'];

        if (Auth::attempt(["$loginWith" => $login, "password" => $password])){
            return response()->json(["status"=> 200]);
        }else
            return response()->json(["status"=> 500]);
    }
}
