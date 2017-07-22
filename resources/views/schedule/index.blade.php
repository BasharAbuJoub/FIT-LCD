@extends('layout.main')


@section('content')


    <div class="container-fluid" style="">

        <div class="top-nav green">
            <h3 class="white-text">Schedule</h3>
            <p class="flow-text white-text">
                All lectures stored in the database
            </p>

            <a class="waves-effect waves-light btn amber accent-3" href="{{url('schedule/add')}}">Add New Lecture</a>

        </div>

        <div class="content">

            <table class="striped highlight" id="app">
                <thead>
                    <tr>

                        <th>Course</th>
                        <th>Instructor</th>
                        <th>Start</th>
                        <th>Duration</th>
                        <th>End</th>
                        <th>Hall</th>
                        <th>Device ID</th>
                        <th>Action</th>

                    </tr>
                </thead>

                <tbody >


                    @foreach($lectures as $lecture)

                        <tr>
                            <td>{{$lecture->getCourseName()}}</td>
                            <td>{{$lecture->getInstructor()}}</td>
                            <td>{{$lecture->getStartTime()}}</td>
                            <td>{{$lecture->getDuration()}}m</td>
                            <td>{{\Carbon\Carbon::parse($lecture->getStartTime())->addMinutes($lecture->getDuration())->toTimeString()}}</td>
                            <td>{{$lecture->getLocation()}}</td>
                            <td>{{$lecture->getDeviceId()}}</td>
                            <td>
                                <a href="{{url('schedule/edit/' . $lecture->getId())}}" class="btn blue"><i class="material-icons">mode_edit</i></a>
                                <a href="{{url('schedule/delete/' . $lecture->getId())}}" class="btn red"><i class="material-icons">delete</i></a>
                                <a href="{{url('schedule/announce/' . $lecture->getId())}}" class="btn orange"><i class="material-icons">notifications</i></a>
                          </td>
                        </tr>

                    @endforeach




                </tbody>
            </table>
        </div>

    </div>

@endsection