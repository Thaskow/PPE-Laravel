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
@foreach ($contenuSang as $object)
<section id="dondesang" class="about-area">
    <div class="container">
        <div class="row justify-content-center">
                <div class="single-features mt-40">
                    <div class="features-title-icon d-flex justify-content-between">
                        <h4 class="features-title"><a href="#">{{ $object->titre }}</a></h4>
                    </div>
                    <div class="features-content">
                        <p class="text">{{ $object->description }}</p>
                        <a class="features-btn" href="#">LEARN MORE</a>
                    </div>
                </div> <!-- single features -->
            </div>
    </div> <!-- container -->
</section>
@endforeach
@foreach ($contenuMoelle as $object)
<section id="dondemoelle" class="testimonial-area">
    <div class="container">
        <div class="row justify-content-center">
                <div class="single-features mt-40">
                    <div class="features-title-icon d-flex justify-content-between">
                        <h4 class="features-title"><a href="#">{{ $object->titre }}</a></h4>
                    </div>
                    <div class="features-content">
                        <p class="text">{{ $object->description }}</p>
                        <a class="features-btn" href="#">LEARN MORE</a>
                    </div>
                </div> <!-- single features -->
            </div>
    </div> <!-- container -->
</section>
@endforeach
@stop
