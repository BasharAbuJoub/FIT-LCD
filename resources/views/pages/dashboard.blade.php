@extends('layout.main')


@section('content')


    <div class="container-fluid" style="">

        <div class="top-nav green">
            <h3 class="white-text">Dashboard</h3>
            <p class="flow-text white-text">This is current status of all devices
                <span class="lime-text text-accent-3">updated at {{\Carbon\Carbon::now()->toTimeString()}}</span>
            </p>

        </div>

        <div class="content">

            <table class="striped highlight">
                <thead>
                <tr>

                    <th>Hall</th>
                    <th>Currently</th>
                    <th>Course</th>
                    <th>Instructor</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Anc</th>
                </tr>
                </thead>

                <tbody>
                    @foreach($devices as $device)
                        @if($device->hasCurrentLecture())
                            <tr>
                                <td>{{$device->getLocation()}}</td>
                                <td><span class="green-text">{{$device->getCurrentLecture()->getStatusType()}}</span></td>
                                <td>{{$device->getCurrentLecture()->getCourseName() }}</td>
                                <td>{{$device->getCurrentLecture()->getInstructor() }}</td>
                                <td>{{$device->getCurrentLecture()->getStartTime()}}</td>
                                <td>{{\Carbon\Carbon::parse($device->getCurrentLecture()->getStartTime())->addMinutes($device->getCurrentLecture()->getDuration())->toTimeString()}}</td>
                                <td>{{$device->getCurrentLecture()->getAnnouncement()}}</td>
                            </tr>
                        @else
                            <tr>
                                <td>{{$device->getLocation()}}</td>
                                <td><span class="blue-text">No lecture</span></td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        @endif

                    @endforeach
                </tbody>
            </table>
        </div>

    </div>



@endsection