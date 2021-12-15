<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('head')
</head>
<body>
    @yield('content')
    <script src="{{ asset('scripts/script.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<<<<<<< HEAD
    {{-- <script src="{{ asset('scripts/canvas.js')}}"></script> --}}
    {{-- <script src="{{ asset('scripts/createRooms.js')}}"></script> --}}
=======
>>>>>>> 676238a84ce10920ec77897c5b1482228e639d35
</body>
</html>