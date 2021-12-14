<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">

    @yield('head')
</head>
<body>
    @yield('content')
    <script src="{{ asset('scripts/script.js')}}"></script>
    <script src="{{ asset('scripts/canvas.js')}}"></script>
    <script src="{{ asset('scripts/createRooms.js')}}"></script>
</body>
</html>