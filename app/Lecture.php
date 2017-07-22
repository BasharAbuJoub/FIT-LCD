<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    //

    protected $fillable = ['course_name', 'instructor_name', 'start_time', 'duration', 'device_id'];

    public function getId(){
        return $this->id;
    }

    public function getCourseName(){
        return $this->course_name;
    }

    public function getInstructor(){
        return $this->instructor_name;
    }

    public function getStartTime(){
        return $this->start_time;
    }


    public function getDuration(){
        return $this->duration;
    }

    public function getAnnouncement(){
        return $this->announcement;
    }

    public function getStatus(){
        return $this->status;
    }

    public function getStatusType(){
        if($this->getStatus() == 0)
            return 'Normal';
        else if($this->getStatus() == 1)
            return 'Delayed';
        else
            return 'Canceled';
    }

    public function getLocation(){
        return $this->device->getLocation();
    }

    public function getDeviceIp(){
        return $this->device->getIp();
    }

    public function getDeviceId(){
        return $this->device->getId();
    }

    public function isStarted(){
        /**
         * TODO
         * - Check if the lecture is started .
         * - Delete expired announcement .
         * - Reset Status .
         */

        //Comparing the time to decide wither it's started or not ....
        $start = new Carbon($this->start_time);
        $now = Carbon::now();
        $end = $start->copy()->addMinutes($this->duration);

        $started = $now->gt($start) && $now->lt($end);

        //checking if it has expired announcement and remove it with resetting status to 0
        if($this->hasAnnouncement()){
            $now = Carbon::now();
            $end = new Carbon($this->start_time);
            $end->addMinutes($this->duration);

            //Checking if the announcement has expired and delete it ...
            if($now->gt($end))
                $this->deleteAnnouncement();

        }

        return $started;

    }

    public function hasAnnouncement(){
        return ($this->getStatus() != 0 || $this->getAnnouncement() != null);
    }

    public function deleteAnnouncement(){

        //Delete Announcement & reset status
        $this->status = 0;
        $this->announcement = null;
        $this->save();
    }


    public function device(){
        return $this->belongsTo('App\Device','device_id');
    }
}
