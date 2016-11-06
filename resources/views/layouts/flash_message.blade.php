@if(session()->has('flash_message'))
    <style>
        .alert-icon-float-left {
            font-size: 32px;
            float: left;
            margin: 10px;
        }
    </style>

    <alert :show.sync="alert" placement="top-right" duration="{{session('flash_duration')}}"
           type="{{$lvl = session('flash_level')}}" width="400px" dismissable>
        <span class="fa fa-{{$lvl == 'success' ? 'check' : ($lvl == 'info' ? 'info' : 'exclamation')}}-circle alert-icon-float-left"
              aria-hidden="true"></span>
        <strong>{{session('flash_title')}}</strong>
        <p>{{session('flash_message')}}</p>
    </alert>

    <script>
        store.data.alert = true;
    </script>
@endif