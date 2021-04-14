<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/homeStyle.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('/js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="Header">
            <div class="NavBar">
                <div class="Logo">
                    <h1>Doggo</h1>
                </div>

                <div class="NavButtonList">
                    <a href="{{ url('/') }}">Home</a>
                    <a href="{{ url('/adopt') }}">Adopt</a>
                    <a href="{{ url('/buy') }}">Shop</a>
                    <a href="{{ url('/about') }}">About</a>
                </div>

                <div class="BoxContact">
                    <img src="#" alt="loc pinpoint">
                    <div class="info">
                        <b>1289 Travis Street Miami, FL</b>
                    </div>
                </div>
                <div class="BoxContact">
                    <img src="#" alt="telephone">
                    <div class="info">
                        <b>772-619-6309</b>
                    </div>
                </div>
            </div>
        </div>

        <main id="App">

                @yield('body')
        </main>
</body>
</html>
