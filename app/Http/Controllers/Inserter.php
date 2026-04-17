<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Inserter extends Controller
{
    public function insertCities(){

        $file = fopen("../public/cities/western.txt","r");

        while(! feof($file))
        {
            $city = fgets($file);
            $city = rtrim($city, "\r\n");
            DB::insert("INSERT INTO location (country, region_or_state, city) VALUES (?,?,?)", ["Ghana", "Western", $city]);
        }

        echo "success!";
        fclose($file);
    }
}
