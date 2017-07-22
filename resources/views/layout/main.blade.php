<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>FIT LCD</title>
    <link rel="stylesheet" href="{{asset('materialize/sass/materialize.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('materialize/js/bin/materialize.min.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/vue.js')}}"></script>
</head>
<body >


<div class="wrapper">

    @yield('content')

</div>
<div>

    <ul id="slide-out" class="side-nav fixed">

        <li><a class="subheader">Control</a></li>
        <li><a class="waves-effect" href="{{url('/')}}"><i class="material-icons">dashboard</i>Dashboard</a></li>
        <li><a class="waves-effect" href="{{url('/devices')}}"><i class="material-icons">memory</i>Devices</a></li>
        <li><a class="waves-effect" href="{{url('/schedule')}}"><i class="material-icons">schedule</i>Schedule</a></li>
        <li><a class="waves-effect" href="#"><i class="material-icons">add</i>Add User</a></li>
        <li>
            <div class="divider"></div>
        </li>
        <li><a class="subheader">User</a></li>
        <li><a class="waves-effect" href="#"><i class="material-icons">exit_to_app</i>Logout</a></li>
    </ul>



</div>



</body>
</html>
