<?php

namespace App\Http\Controllers;

use App\Device;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    //

    public function index(){

        $devices = Device::all();
        return view('pages.dashboard')->with('devices', $devices);

    }
}
