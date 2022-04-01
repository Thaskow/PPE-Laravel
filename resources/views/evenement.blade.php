@extends('newtemplate')
@section('css')
<link rel="stylesheet" href={{asset('css/correction.css')}}>
@stop
@section('content')
<div class="about-accordion">
    <div id="accordionExample" class="accordion">
        <section id="dondesang" class="marge-area">
        </section>
        <section id="dondemoelle" class="testimonial-area">
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
                                <h2 class="features-title"></h2>
                            </div>
                            <div class="features-content">
                                <p class="text"></p>
                                <a class="collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">En savoir plus ></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- single features -->
        </section>
    </div>
</div>
@stop

