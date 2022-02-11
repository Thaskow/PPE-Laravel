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
        <div class="row justify-content-center" style="background-color: white">
                        <div class="col-lg-8 col-md-7 col-sm-9">
                            <div class="single-features">
                                <div class="features-title-icon d-flex justify-content-between">
                                    <h4 class="features-title"><a href="#">{{ $object->titre }}</a></h4>
                                </div>
                                <div class="features-content">
                                    <p class="text">{{ $object->description }}</p>
                                    <a class="features-btn" href="#">LEARN MORE</a>
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
                </div>
                </div> <!-- single features -->
                </div>
            </div>
    </div> <!-- container -->

</section>
@endforeach
@foreach ($contenuMoelle as $object)
<section id="dondemoelle" class="testimonial-area">
    <div class="container">
        <div class="row justify-content-center" style="background-color: white">
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
                                    <h4 class="features-title"><a href="#">{{ $object->titre }}</a></h4>
                                </div>
                                <div class="features-content">
                                    <p class="text">{{ $object->description }}</p>
                                    <a class="features-btn" href="#">LEARN MORE</a>
                                </div>
                            </div>
                        </div>
                        <div class="bodycard">
                            <div class="containercard">

                              <div class="card">
                                <div class="face face1">
                                  <div class="content">
                                    <span class="stars"></span>
                                    <h2 class="java">Java</h2>
                                    <p class="java">Java is a class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible.</p>
                                  </div>
                                </div>
                                <div class="face face2">
                                  <h2><i class="lni lni-blooddrop"></i></h2>
                                </div>
                              </div>

                              <div class="card">
                                <div class="face face1">
                                  <div class="content">
                                    <span class="stars"></span>
                                    <h2 class="python">Python</h2>
                                    <p class="python">Python is an interpreted, high-level and general-purpose programming language.</p>
                                  </div>
                                </div>
                                <div class="face face2">
                                  <h2><i class="lni lni-blooddrop"></i></h2>
                                </div>
                              </div>

                              <div class="card">
                                <div class="face face1">
                                  <div class="content">
                                    <span class="stars"></span>
                                    <h2 class="cSharp">C#</h2>
                                    <p class="cSharp">C# is a general-purpose, multi-paradigm programming language encompassing static typing, strong typing, lexically scoped and component-oriented programming disciplines.</p>
                                  </div>
                                </div>
                                <div class="face face2">
                                  <h2><i class="lni lni-blooddrop"></i></h2>
                                </div>
                              </div>
                            </div>
                            </div>
                </div>
                </div> <!-- single features -->
                </div>
            </div>
    </div> <!-- container -->
</section>
@endforeach
@stop
