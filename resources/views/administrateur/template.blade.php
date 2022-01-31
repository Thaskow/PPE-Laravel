<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("css/template/header.css")}}">
    <link rel="stylesheet" href="{{asset("css/template/footer.css")}}">
    @yield('addons')
    <title>@yield("titre")</title>
</head>
    <header>
        <nav>
            <div id="start">
            <a href="{{route('contenu.index')}}" class="{{Route::currentRouteName()==route('contenu.index')?"active":"";}}">Contenu</a>
            <a href="{{route('photo.index')}}" class="{{Route::currentRouteName()==route('photo.index')?"active":"";}}">Photos</a>
            </div>
            <div id="center">
                <a id="ouDonner" href="{{route('administrateur')}}" class="{{Route::currentRouteName()==route('administrateur')?"active":"";}}">Accueil</a>
            </div>
            <div id="end">
            <a id="userAccount" href="{{route('home')}}"><i class="far fa-user-circle"></i></a>
            </div>
        </nav>
    </header>
    <body>
        <div class="content">
            @yield('content')
        </div>
    </body>
    <footer>
        <br>
        <br>
    </footer>
    </html>