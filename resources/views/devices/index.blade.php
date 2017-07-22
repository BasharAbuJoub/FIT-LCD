@extends('layout.main')


@section('content')


    <div class="container-fluid" style="">

        <div class="top-nav green ">


                <h3 class="white-text">Devices</h3>
                <p class="flow-text white-text">
                    All devices stored in the database
                </p>

                <a class="waves-effect waves-light btn amber accent-3" href="{{url('devices/add')}}">Add New Device</a>






        </div>

        <div class="content">

            <table class="striped highlight" id="app">
                <thead>
                <tr>

                    <th>Location</th>
                    <th>Status</th>
                    <th>IP</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody >


                        <tr v-for="device in devices">
                            <td>@{{ device.location }}</td>
                            <td :id="device.id">@{{ getStatus(device.id, device.ip_address) }}
                                <div class="progress" style="width: 40px;">
                                    <div class="indeterminate"></div>
                                </div>
                            </td>
                            <td>@{{ device.ip_address }}</td>
                            <td>
                                <a class="waves-effect waves-light btn blue" :href="getEditLink(device.id)"><i class="material-icons">mode_edit</i></a>
                                <a class="waves-effect waves-light btn red" :href="getDeleteLink(device.id)"><i class="material-icons">delete</i></a>
                            </td>
                        </tr>



                </tbody>
            </table>

        </div>

    </div>

    <script>

        var app = new Vue({

            el: '#app',
            data: {
                devices: {!! json_encode($devices) !!}
            },
            methods: {
                
                getStatus: function (id, ip) {

                    $.ajax({
                        url: "http://" + ip + "/",
                        error: function(){

                            $('#' + id).html('<span class="red-text"><i class="tiny material-icons">clear</i> Offline</span>');
                        },
                        success: function(){
                            $('#' + id).html('<span class="green-text"><i class="tiny material-icons">done</i> Online</span>');
                        },
                        timeout: 3000
                    });
                    
                },
                getEditLink: function (id) {
                    return "devices/edit/" + id;
                },
                getDeleteLink: function (id) {

                    return "devices/delete/" + id;
                }


            }


        });

    </script>

    <sciript>
        @if(!empty($deleted))
            Materialize.toast('Successfully Removed Hall {{$deleted}} Device.', 4000);
        @endif
    </sciript>


@endsection