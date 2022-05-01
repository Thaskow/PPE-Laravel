@extends('newtemplate')
@section('css')
<link rel="stylesheet" href={{asset('css/correction.css')}}>
<link rel="stylesheet" href={{asset('css/carousel.css')}}>
@stop
@section('content')
<div class="about-accordion">
    <div id="accordionExample" class="accordion">
        <section class="marge-area">
        </section>
        <section class="testimonial-area">
            <div class="container">
                <div class="row justify-content-center" style="background-color: white">
                    <div class="col-lg-8 col-md-7 col-sm-9">
                        <div class="single-features">
                            <div class="about-image">
                                <div id="carousel" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        @php
                                        $i = 0
                                        @endphp
                                        @foreach ( $contenuEvent->images as $object)
                                            <li data-target=".carousel" data-slide-to="{{ $i }}"  class="{{ $i==0 ? 'active': '' }}"></li>
                                            @php
                                            $i ++
                                            @endphp
                                        @endforeach

                                    </ol>
                                    <div class="carousel-inner">
                                        @php
                                        $i = 0
                                        @endphp
                                        @foreach ( $contenuEvent->images as $object)
                                            <div class="carousel-item {{ $i==0 ? 'active': '' }}">
                                                <img class="d-block w-100" src={{ asset("images/".$object->url) }} width="200" height="500" style="object-fit: cover">
                                                <div class="carousel-caption">
                                                </div>
                                            </div>
                                            @php
                                            $i ++
                                            @endphp
                                            @endforeach

                                    </div>
                                    <a class="carousel-control-prev" href="#carousel" data-slide="prev">
                                      <span class="carousel-control-prev-icon"></span>
                                    </a>
                                    <a class="carousel-control-next" href="#carousel" data-slide="next">
                                      <span class="carousel-control-next-icon"></span>
                                    </a>
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-7 col-sm-9">
                        <div class="single-features">
                            <div class="features-title-icon d-flex justify-content-between">
                                <h4 class="features-title">Tableau des scores :</h4>
                            </div>
                            <div class="features-content">
                                <p style="line-height: 250%">
                                @php($i=0)
                                @foreach ($contenuEvent->promotions as $promo)
                                @php($i = $i+ 1)
                                @if ($i===1)
                                <i class="icofont-medal" style="color: gold"></i> 1er {{  $promo->libelle }} avec {{  $promo->pivot->pourcentage }}%  de donneurs<br>
                                @elseif ($i===2)
                                <i class="icofont-medal" style="color: silver"></i> 2ème {{  $promo->libelle }} avec {{  $promo->pivot->pourcentage }}% de donneurs<br>
                                @elseif ($i===3)
                                <i class="icofont-medal" style="color: brown"></i> 3ème {{  $promo->libelle }} avec {{  $promo->pivot->pourcentage }}% de donneurs<br>
                                @else
                                {{ $i }}ème {{  $promo->libelle }} avec {{  $promo->pivot->pourcentage }}% de donneurs<br>
                                @endif
                                @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- single features -->
            <section class="testimonial-area">
            <div class="container">
                <div class="row justify-content-center" style="background-color: white">
                    <div class="single-features">
                    <p>{{ $contenuEvent->description }}</p>
                    </div>
                    <h4>Les évenements précedents:</h4>
                <div class="mhn-slide owl-carousel owl-loaded owl-drag">
                    @foreach ( $events as $event)
                    @if ($contenuEvent->dateEvenement <> $event->dateEvenement)
                    <div class="mhn-item">
                        <div class="mhn-inner">
                            <a href="{{ route('evenement.show', [$event]) }}" class="button">
                            <img src="{{ asset("images/".$event->images->first()->url) }}">
                            <div class="mhn-img"><div class="loader-circle"><div class="loader-stroke-left"></div><div class="loader-stroke-right"></div></div></div>
                            <div class="mhn-text">
                                <h4>{{ $event->titre }}</h4>
                            </div>
                        </a>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                <h4 style="text-align: center;width: 100%;margin: 30px;">Commentaires:</h4>
                @foreach ($commentaire as $comm)
                <div class="commentaire">
                <p style="color: white;">{{ $comm->contenu }}</p>
                </div>
            @endforeach
            <form method="post" action="{{ route('createCommentaire', [$contenuEvent]) }}">
                @csrf
                <label for="commentaire">Nouveau commentaire :</label>
                <input type="text" class="form-control" name="contenu"/>
                <button type="submit" class="btn btn-primary">Créer</button>
        </form>
                </div>
        </div>
        </section>
    </div>
</div>
@stop

