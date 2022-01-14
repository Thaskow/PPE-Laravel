<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("css/template/header.css")}}">
    <link rel="stylesheet" href="{{asset("css/template/footer.css")}}">
    @yield('css')
    <title>@yield("titre")</title>
</head>
<header>
    <nav>
        <div id="start">
        <a href="#donDuSang" class="{{Route::currentRouteName()=="#donDuSang"?"active":"";}}">Don du sang</a>
        <a href="#donDeMoelle" class="{{Route::currentRouteName()=="home/#donDeMoelle"?"active":"";}}">Don de moëlle</a>
        <a href="{{route('home')}}" class="{{Route::currentRouteName()=="home"?"active":"";}}">Évenement</a>
        <a href="{{route('home')}}" class="{{Route::currentRouteName()=="home"?"active":"";}}">Inscription</a>
        <a href="{{route('home')}}" class="{{Route::currentRouteName()=="home"?"active":"";}}">Contact</a>
        </div>
        <div id="center">
            <a id="ouDonner" href="{{route('home')}}" class="{{Route::currentRouteName()=="home"?"active":"";}}">Où donner</a>
        </div>
        <div id="end">
        <a id="userAccount" href="{{route('home')}}" class="{{Route::currentRouteName()=="home"?"active":"";}}"><i class="far fa-user-circle"></i></a>

        </div>
    </nav>
</header>
<body>
    <div id="content">
        @yield('content')
    </div>
</body>
<footer>
    <br>
    <br>
</footer>
</html>