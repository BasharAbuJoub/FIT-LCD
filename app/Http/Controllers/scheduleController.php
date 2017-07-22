<?php

namespace App\Http\Controllers;

use App\Lecture;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;

class scheduleController extends Controller
{
    //


    public function index(){

        $lectures = Lecture::all();


        return view('schedule.index')->with('lectures', $lectures);


    }



    public function add(Request $r){
        if($r->isMethod('post')){

            $this->validate($r,[
                'course_name'=>'required',
                'instructor_name'=>'required',
                'start_time'=>'required|date_format:H:i',
                'duration'=>'required|integer',
                'device_id'=>'required|integer'
            ]);


            $lecture = Lecture::create($r->all());


            return view('schedule.add')->with('added', $lecture->getCourseName());



        }


        return view('schedule.add');


    }

    public function edit(Request $r, $id){
        $lecture = Lecture::find($id);
        if($r->isMethod('post')){

            $lecture->update($r->all());

            return view('schedule.edit')->with('lecture',$lecture)->with('updated', $lecture->getCourseName());

        }

        return view('schedule.edit')->with('lecture',$lecture);


    }


    public function delete($id){

        $lecture = Lecture::find($id);
        if($lecture != null && $lecture->delete()){
            return redirect('/schedule');
        }else{
            return "Lecture Not Found";
        }

    }


    public function announce(Request $r, $id){

        $lecture = Lecture::find($id);
        if($r->isMethod('post')){



        }


        return view('schedule.announce')->with('lecture', $lecture);


    }









}
