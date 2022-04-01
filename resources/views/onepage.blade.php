@extends('newtemplate')
@section('content')
<section id="home" class="slider_area">
    <div id="carouselThree" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="slider-content">
                                <h1 class="title">DONNEZ DU VOTRE</h1>
                                <p class="text">Tu vois, là on voit qu'on a beaucoup à travailler sur nous-mêmes car entre penser et dire, il y a un monde de différence et cela même si les gens ne le savent pas ! Et j'ai toujours grandi parmi les chiens. </p>
                            </div> <!-- slider-content -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
                <div class="slider-image-box d-none d-lg-flex align-items-end">
                    <div class="slider-image">
                        <img src="{{asset('/images/slider/goutte_sang.png')}}" alt="Hero">
                    </div><!-- slider-imgae -->
                </div> <!-- slider-imgae box -->
            </div> <!-- carousel-item -->
        </div>
    </div>
</section>
<div class="about-accordion">
    <div id="accordionExample" class="accordion">
        <section id="dondesang" class="about-area">
            <div class="container">
                <div class="row justify-content-center" style="background-color: white">
                    @foreach ($contenuSang as $object)
                        <div class="col-lg-8 col-md-7 col-sm-9">
                            <div class="single-features">
                                <div class="features-title-icon d-flex justify-content-between">
                                    <h2 class="features-title">{{ $object->titre }}</h2>
                                </div>
                                <div class="features-content">
                                    <p class="text">{{ $object->description }}</p>
                                    <a class="collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">En savoir plus ></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-7 col-sm-9">
                            <div class="single-features">
                                <div class="about-image">
                                    <img src="images/{{ $object->image->url }}" alt="about">
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                        <div class="bodycard">
                            <div class="containercard">
                                @foreach ($cardSang as $object)
                                    <div class="card">
                                        <div class="face face1">
                                            <div class="cardcontenu">
                                                <span class="stars"></span>
                                                <h2 class="cardsangh2">{{ $object->titre }}</h2>
                                                <h3 class="cardsangh3">{{ $object->description }}</h3>
                                            </div>
                                        </div>
                                        <div class="face face2">
                                            <h2><i class="lni lni-blooddrop"></i></h2>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- single features -->
        </section>
        <section id="dondemoelle" class="testimonial-area">
            <div class="container">
                <div class="row justify-content-center" style="background-color: white">
                    @foreach ($contenuMoelle as $object)
                        <div class="col-lg-4 col-md-7 col-sm-9">
                            <div class="single-features">
                                <div class="about-image">
                                    <img src="images/{{ $object->image->url }}" alt="about">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-7 col-sm-9">
                            <div class="single-features">
                                <div class="features-title-icon d-flex justify-content-between">
                                    <h2 class="features-title">{{ $object->titre }}</h2>
                                </div>
                                <div class="features-content">
                                    <p class="text">{{ $object->description }}</p>
                                    <a class="collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">En savoir plus ></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample" style="">
                        <div class="bodycard">
                            <div class="containercard">
                                @foreach ($cardMoelle as $object)
                                    <div class="card">
                                        <div class="face face1">
                                            <div class="cardcontenu">
                                                <span class="stars"></span>
                                                <h2 class="cardsangh2">{{ $object->titre }}</h2>
                                                <h3 class="cardsangh3">{{ $object->description }}</h3>
                                            </div>
                                        </div>
                                        <div class="face face2">
                                            <h2><i class="lni lni-blooddrop"></i></h2>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- single features -->
        </section>
    </div>
</div>
@stop
