<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Main</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >

        <script src="{{ 'js/jquery.js' }}"></script>

        {{--Date time picker--}}
        <link href="{{ asset('datetimepicker/jquery.datetimepicker.css') }}" rel="stylesheet" type="text/css" >
        <script src="{{ 'datetimepicker/jquery.datetimepicker.full.js' }}"></script>

    </head>
    <body>
        @include('inc.navbar')

        <div class="container">
            <div class="pull-left col-lg-4">
                @yield('content')
            </div>
            @include('inc.messages')
        </div>

    </body>
</html>