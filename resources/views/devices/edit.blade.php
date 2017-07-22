@extends('layout.main')


@section('content')


    <div class="container-fluid" style="">

        <div class="top-nav green">
            <h3 class="white-text">Edit devices</h3>
            <p class="flow-text white-text">
                please update the following information.
            </p>

        </div>

        <div class="content">

            <div class="row">
                <form method="post" class="col s12 m6 offset-m3">
                    {{csrf_field()}}
                    <div class="input-field">
                        <input id="ip_address" type="text" name="ip_address" value="{{$device->getIp()}}">
                        <label for="ip_address">IP Address</label>
                    </div>

                    <div class="input-field">
                        <input id="location" type="text" name="location" value="{{$device->getLocation()}}">
                        <label for="location">Location</label>
                    </div>

                    <button type="submit" class="waves-effect waves-light btn green">Save</button>

                </form>
            </div>

        </div>

    </div>


    <script>
        @if(!empty($edited))
            Materialize.toast('Successfully Updated Hall {{$edited}} Device.', 4000);
        @endif
    </script>


@endsection