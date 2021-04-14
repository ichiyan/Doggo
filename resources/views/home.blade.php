<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/homeStyle.css') }}">
    <title>Doggo: Home</title>
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

    <main>
        <div class="highlights">
            <div class="highlight-content">

            </div>
        </div>

        <div class="content">
            <div class="AboutSpace">About</div>
            <div class="ContactSpace">Contacts</div>
        </div>
    </main>
</body>
</html>
