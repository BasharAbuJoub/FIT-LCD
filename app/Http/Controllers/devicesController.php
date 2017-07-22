<?php

namespace App\Http\Controllers;

use App\Device;
use Illuminate\Http\Request;

class devicesController extends Controller
{


    //Show the table of all devices in the db with edit action
    public function index(){




        return view('devices.index')->with('devices', Device::all());


    }


    //Add Devices form + Submit implementation
    public function add(Request $r){

        if($r->isMethod('post')){

            $data = $this->validate($r, [
                'ip_address' => 'required|ip',
                'location' => 'required'
            ]);

            $device = Device::create($r->all());
            return view('devices.add')->with('added', $device->getLocation());

        }
        return view('devices.add');

    }


    public function edit(Request $r, $id){

        if($r->isMethod('post')){

            $data = $this->validate($r, [
                'ip_address' => 'required|ip',
                'location' => 'required'
            ]);

            $device = Device::where('id',$id)->first();
            $device->update([
                'ip_address'=>$r->input('ip_address'),
                'location'=>$r->input('location')
            ]);
            return view('devices.edit')->with('edited', $device->getLocation())
                ->with('device', $device);

        }
        return view('devices.edit')->with('device', Device::where('id',$id)->first());

    }

    public function delete($id){

        $device = Device::where('id', $id)->first();
        if($device != null && $device->delete()){
            return redirect('devices');
        }
        return "Device Not Found";

    }

}
