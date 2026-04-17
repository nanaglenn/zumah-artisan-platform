<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $services = DB::select("SELECT * FROM services WHERE status = (?)ORDER BY id DESC", ["active"]);
        $serviceImages = DB::select("SELECT * FROM service_images ORDER BY service_id DESC");
        $regions = DB::select("SELECT DISTINCT region_or_state FROM location ");
//        return $regions;
        return view("home", compact("services", "serviceImages", "regions"));
        return "x";
    }

}
