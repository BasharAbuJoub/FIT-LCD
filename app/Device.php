<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    //

    protected $fillable = ['ip_address', 'location'];




    public function getId(){
        return $this->id;
    }

    public function getLocation(){
        return $this->location;
    }

    public function getIp(){
        return $this->ip_address;
    }

    public function lectures(){
        //return Lecture::where('device_id', $this->id)->get();
        return $this->hasMany('App\Lecture', 'device_id', 'id');
    }

    public function hasCurrentLecture(){

        //Searching for active lecture
        foreach ($this->lectures as $lecture){
            if($lecture->isStarted())
                return true;

        }

        return false;
    }

    public function getCurrentLecture(){

        //Searching for active lecture
        foreach ($this->lectures as $lecture){
            if($lecture->isStarted())
                return $lecture;

        }

        return null;
    }


}
