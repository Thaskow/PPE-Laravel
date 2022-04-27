<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>Donnez du votre!</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href={{asset('images/gouttetitle.png')}} type="image/png">

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

    <!--====== Card CSS ======-->
    <link rel="stylesheet" href={{asset('css/card.css')}}>

    <!--====== Drop CSS ======-->
    <link rel="stylesheet" href={{asset('css/drop.css')}}>
    @yield('css')

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

    <section class="navbar-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">


                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTwo" aria-controls="navbarTwo" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>

                        <div class="navbar-btn d-none d-sm-inline-block">
                            <ul>
                                <li><a class="solid" href="{{route("ouDonner")}}">Où donner?</a></li>
                            </ul>
                        </div>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarTwo">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item {{Route::currentRouteName()=="onepage/#donDuSang"?"active":"";}}"><a class="page-scroll" href="{{route('onepage')}}#dondesang">Don du sang</a></li>
                                <li class="nav-item {{Route::currentRouteName()=="onepage/#donDuSang"?"active":"";}}"><a class="page-scroll" href="{{route('onepage')}}#dondemoelle">Don de moelle</a></li>
                                <li class="nav-item {{Route::currentRouteName()=="evenement"?"active":"";}}"><a class="page-scroll" href={{route('evenement')}}>Evenements</a></li>
                                <li class="nav-item {{Route::currentRouteName()=="inscription"?"active":"";}}"><a class="page-scroll" href="{{route('inscription')}}">Inscription</a></li>
                                <li class="nav-item {{Route::currentRouteName()=="contact"?"active":"";}}"><a href="{{ route('contact') }}">Contact</a></li>
                            </ul>
                        </div>

                        <div class="navbar-btn d-none d-sm-inline-block">
                            <ul>
                                <li><a class="solid" href="#">Se connecter</a></li>
                            </ul>
                        </div>
                    </nav> <!-- navbar -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

     <!--====== NAVBAR TWO PART ENDS ======-->
    @yield('content')

    @if ($errors->any())

    <div class="back-to-top" style="display: inline-block;width:auto;height:auto;padding:5px;background:red;opacity:65%">
            @foreach ($errors->all() as $error)
            <p style="color:white;">{{$error}}</p>
            @endforeach
    </div>

    @endif
    @if (Session::has('success'))
    <div class="back-to-top" style="display: inline-block;width:auto;height:auto;padding:5px;background:green;opacity:65%">
        <p style="color:white;">{{Session::get('success')}}</p>
    </div>
    @elseif (Session::has("error"))
    <div class="back-to-top" style="display: inline-block;width:auto;height:auto;padding:5px;background:red;opacity:65%">
        <p style="color:white;">{{Session::get('error')}}</p>
    </div>
    @endif

    <!--====== FOOTER PART START ======-->

    <section class="footer-area footer-dark">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="footer-logo text-center">
                        <a class="mt-30" href="index.html"><img src="assets/images/logo.svg" alt="Logo"></a>
                    </div> <!-- footer logo -->
                    <ul class="social text-center mt-60">
                        <li><a href="https://facebook.com/uideckHQ"><i class="lni lni-facebook-filled"></i></a></li>
                        <li><a href="https://twitter.com/uideckHQ"><i class="lni lni-twitter-original"></i></a></li>
                        <li><a href="https://instagram.com/uideckHQ"><i class="lni lni-instagram-original"></i></a></li>
                        <li><a href="#"><i class="lni lni-linkedin-original"></i></a></li>
                    </ul> <!-- social -->
                    <div class="footer-support text-center">
                        <span class="number">+8801234567890</span>
                        <span class="mail">support@uideck.com</span>
                    </div>
                    <div class="copyright text-center mt-35">
                        <p class="text">Designed by <a href="https://uideck.com" rel="nofollow">UIdeck</a> and Built-with <a rel="nofollow" href="https://ayroui.com">Ayro UI</a> </p>
                    </div> <!--  copyright -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a>

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
    <link rel="stylesheet" href={{asset('css/LineIcons.css')}}>


    <!--====== Isotope js ======-->
    <script src={{asset('js/imagesloaded.pkgd.min.js')}}></script>
    <script src={{asset('js/isotope.pkgd.min.js')}}></script>

    <!--====== Scrolling Nav js ======-->
    <script src={{asset('js/jquery.easing.min.js')}}></script>
    <script src={{asset('js/scrolling-nav.js')}}></script>

    <!--====== Main js ======-->
    <script src={{asset('js/main.js')}}></script>
</body>

</html>
