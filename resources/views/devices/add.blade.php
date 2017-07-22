@extends('layout.main')


@section('content')


    <div class="container-fluid" style="">

        <div class="top-nav green">
            <h3 class="white-text">Add devices</h3>
            <p class="flow-text white-text">
                please enter the following information to add the device.
            </p>

        </div>

        <div class="content">

     <div class="row">
         <form method="post" class="col s12 m6 offset-m3">
             {{csrf_field()}}
             <div class="input-field">
                 <input id="ip_address" type="text" name="ip_address">
                 <label for="ip_address">IP Address</label>
             </div>

             <div class="input-field">
                 <input id="location" type="text" name="location">
                 <label for="location">Location</label>
             </div>

             <button type="submit" class="waves-effect waves-light btn green">Add</button>

         </form>
     </div>

        </div>

    </div>


    <script>
        @if(!empty($added))
            Materialize.toast('Added device to hall {{$added}}', 4000);
        @endif
    </script>


@endsection