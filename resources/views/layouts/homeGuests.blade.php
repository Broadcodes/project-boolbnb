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

            <div class="d-flex">
                <input type="text" placeholder="Dove?" aria-label="" class="form-control text-center rounded-5">
                <input placeholder="Quando?" class="ms-1 mx-3 form-control text-center rounded-5" type="text"
                    onfocus="(this.type='date')" onblur="(this.type='text')" id="date" />
                <button type="button" class="ms-1 btn btn-light rounded-5"><i
                        class="fa-solid fa-magnifying-glass"></i></button>
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

    <div class="selection fixed-top d-flex align-items-center justify-content-around w-100">
        <div class="flex-column text-center">
            <a href=""><span class="flex-column"><i class="fa-solid fa-mountain-sun"></i></span>
                <p>Montagna</p>
            </a>
        </div>

        <div class="flex-column text-center">
            <a href=""><span class="flex-column"><i class="fa-solid fa-house-crack"></i></span>
                <p>Baite</p>
            </a>
        </div>

        <div class="flex-column text-center">
            <a href=""><span class="flex-column"><i class="fa-solid fa-campground"></i></span>
                <p>Campeggio</p>
            </a>
        </div>

        <div class="flex-column text-center">
            <a href=""><span class="flex-column"><i class="fa-solid fa-panorama"></i></span>
                <p>Panorama</p>
            </a>
        </div>

        <div class="flex-column text-center">
            <a href=""><span class="flex-column"><i class="fa-solid fa-person-skiing"></i></span>
                <p>Sulle piste</p>
            </a>
        </div>

        <div class="flex-column text-center">
            <a href=""><span class="flex-column"><i class="fa-solid fa-igloo"></i></span>
                <p>Igloo</p>
            </a>
        </div>

        <div class="flex-column text-center">
            <a href=""><span class="flex-column"><i class="fa-solid fa-city"></i></span>
                <p>Città</p>
            </a>
        </div>

        <div class="flex-column text-center">
            <a href=""><span class="flex-column"><i class="fa-solid fa-landmark"></i></span>
                <p>Città d'Arte</p>
            </a>
        </div>

    </div>
    @yield('content')
</body>

</html>
