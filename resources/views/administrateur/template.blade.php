
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>@yield('titre')</title>
    @yield('addons')
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href={{asset('images/favicon.png')}} type="image/png">

    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href={{asset('css/magnific-popup.css')}}>

    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href={{asset('css/slick.css')}}>

    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href={{asset('css/LineIcons.css')}}>

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href={{asset('css/bootstrap.min.css')}}>

    <!--====== Default CSS ======-->
    <link rel="stylesheet" href={{asset('css/default.css')}}>

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href={{asset('css/style.css')}}>

</head>

<body>
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->

    <!--====== NAVBAR TWO PART START ======-->

    <section class="navbar-area sticky">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">


                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTwo" aria-controls="navbarTwo" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarTwo">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item {{Route::currentRouteName()=='administrateur'?"active":"";}}"><a class="page-scroll" href="{{route('administrateur')}}">Accueil</a></li>
                                <li class="nav-item {{Route::currentRouteName()=='contenu.index'?"active":"";}}"><a class="page-scroll" href="{{route('contenu.index')}}">Contenu</a></li>
                                <li class="nav-item {{Route::currentRouteName()=='photo.index'?"active":"";}}"><a class="page-scroll" href="{{route('photo.index')}}">Photos</a></li>
                                <li class="nav-item {{Route::currentRouteName()=='event.stats'?"active":"";}}"><a class="page-scroll" href="{{route('event.stats')}}">Statistique</a></li>
                                <li class="nav-item {{Route::currentRouteName()=='event.crea'?"active":"";}}"><a class="page-scroll" href="{{route('event.crea')}}">Évenement</a></li>
                                <li class="nav-item {{Route::currentRouteName()=='event.gestion'?"active":"";}}"><a class="page-scroll" href="{{route('event.gestion')}}">Gestion</a></li>
                            </ul>
                        </div>

                        <div class="navbar-btn d-none d-sm-inline-block">
                            <ul>
                                <li><a class="solid" href="#">Administrateur</a></li>
                            </ul>
                        </div>
                    </nav> <!-- navbar -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

     <!--====== NAVBAR TWO PART ENDS ======-->

    <body>

      
            @yield('content')


    <!--====== BACK TOP TOP PART START ======-->


@if ($errors->any()) 

<div class="back-to-top" style="display: inline-block;width:auto;height:auto;padding:5px;background:red;opacity:65%">
        @foreach ($errors->all() as $error)
        <p style="color:white;">{{$error}}</p>
        @endforeach 
</div>

@endif 
@if (Session::has('success'))
    <a href="#" class="back-to-top" style="display: inline-block;"><i class="lni lni-chevron-up"></i></a>
@elseif (Session::has("error"))
    <a href="#" class="back-to-top" style="display: inline-block;"><i class="lni lni-chevron-up"></i></a>
@endif

    <!--====== BACK TOP TOP PART ENDS ======-->

    <!--====== PART START ======-->

<!--
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-">

                </div>
            </div>
        </div>
    </section>
-->

    <!--====== PART ENDS ======-->




    <!--====== Jquery js ======-->
    <script src={{asset('js/vendor/jquery-1.12.4.min.js')}}></script>
    <script src={{asset('js/vendor/modernizr-3.7.1.min.js')}}></script>

    <!--====== Bootstrap js ======-->
    <script src={{asset('js/popper.min.js')}}></script>
    <script src={{asset('js/bootstrap.min.js')}}></script>

    <!--====== Slick js ======-->
    <script src={{asset('js/slick.min.js')}}></script>

    <!--====== Magnific Popup js ======-->
    <script src={{asset('js/jquery.magnific-popup.min.js')}}></script>

    <!--====== Ajax Contact js ======-->
    <script src={{asset('js/ajax-contact.js')}}></script>

    <!--====== Isotope js ======-->
    <script src={{asset('js/imagesloaded.pkgd.min.js')}}></script>
    <script src={{asset('js/isotope.pkgd.min.js')}}></script>

    <!--====== Scrolling Nav js ======-->
    <script src={{asset('js/jquery.easing.min.js')}}></script>
    <script src={{asset('js/scrolling-nav.js')}}></script>

    <!--====== Main js ======-->
    <script src={{asset('js/mainAdmin.js')}}></script>

</body>

</html>
