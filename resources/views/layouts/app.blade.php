<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Main</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
        {{--<link href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" media="screen">--}}
        {{--<link href="{{ asset('css/bootstrap-combined.min.css') }}" rel="stylesheet">--}}

        {{--<script type="text/javascript"--}}
                {{--src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js">--}}
        {{--</script>--}}
        {{--<script type="text/javascript"--}}
                {{--src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js">--}}
        {{--</script>--}}
        {{--<script type="text/javascript"--}}
                {{--src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">--}}
        {{--</script>--}}
        {{--<script type="text/javascript"--}}
                {{--src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">--}}
        {{--</script>--}}

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