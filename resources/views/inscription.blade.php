@extends('newtemplate') 
@section("css")
<link rel="stylesheet" href={{asset('css/correction.css')}}>
@stop
@section('content') <section id="team" class="team-area pt-120 pb-130">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-10">
                <div class="section-title text-center pb-30">
                    <h3 class="title">Inscription</h3>
                    <p class="text">
                        C'est à toi de jouer ! Deviens un super-héro
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-4">
                <div class="team-style-eleven text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
                    <div class="team-image">
                        <img style="height:33.1vh;width:auto;" src="{{asset('images/donSang.png')}}" alt="Team">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                    <div class="team-content">
                        <div class="team-social">
                            <ul class="social">
                                @if (Auth::check())
                                    @if (!$sang)
                                        <li><a href="{{route("inSang")}}">Inscrit toi <i class="lni lni-arrow-down"></i></a></li>
                                    
                                    @else
                                        <li><a href="{{route("unSang")}}">Désinscrit toi <i class="lni lni-arrow-down"></i></a></li>
                                    
                                    @endif
                                @else
                                    <li><a href="{{route("inSang")}}">Inscrit toi <i class="lni lni-arrow-down"></i></a></li>     
                                @endif    
                            </ul>
                        </div>
                        <h4 class="team-name"><a href="{{route("inSang")}}">Don de Sang</a></h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-1">
                <div class="team-style-eleven text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
                    <div class="team-image">
                        <img style="height:33.1vh;width:auto;" src="{{asset('images/donMoelle.png')}}" alt="Team">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                    <div class="team-content">
                        <div class="team-social">
                            <ul class="social">
                                @if (Auth::check())
                                    @if (!$moelle)
                                        <li><a href="{{route("inMoelle")}}">Inscrit toi <i class="lni lni-arrow-down"></i></a></li>
                                    
                                    @else
                                        <li><a href="{{route("unMoelle")}}">Désinscrit toi <i class="lni lni-arrow-down"></i></a></li>
                                    
                                    @endif
                                @else
                                    <li><a href="{{route("inMoelle")}}">Inscrit toi <i class="lni lni-arrow-down"></i></a></li>     
                                @endif                           
                             </ul>
                        </div>
                        <h4 class="team-name"><a href="{{route("inMoelle")}}">Don de Moelle</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    @endsection