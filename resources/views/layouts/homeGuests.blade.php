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

    <script type="text/javascript" src="{{ asset('js/homeGuest.js') }}" defer></script>
</head>

<body>
    <nav class="navbar navbar-expand-md flex-md-nowrap px-4 py-2 border border-dark">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ route('homePage') }}">
            <h1>@yield('title')</h1>
        </a>
        <ul class="navbar-nav px-3 ml-auto">
            <li class="nav-item">
                <a class="btn btn-lg" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-lg" href="{{ route('register') }}">Register</a>
            </li>
        </ul>
    </nav>
    @yield('content')
</body>

</html>
