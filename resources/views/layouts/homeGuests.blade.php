<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Roboto&display=swap" rel="stylesheet">

    <script type="text/javascript" src="{{ asset('js/homeGuest.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/2b5def4d88.js" crossorigin="anonymous"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light fixed-top">
        <div class="d-flex align-items-center justify-content-around w-100">
            <div class="logo-area">
                <a href="index.html"><img id="logo" src="img/Airbnb_Logo.svg" alt="logo"></a>
            </div>


            <ul class="d-flex">
                <li class="nav-item">
                    <a class="btn btn-lg" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-lg" href="{{ route('register') }}">Register</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- TYPE NAVBAR -->


    @yield('content')
</body>

</html>
