@extends('newtemplate')
@section("css")
<link rel="stylesheet" href={{asset('css/correction.css')}}>
@stop
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>
<section id="contact" class="contact-area">
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-lg-6 col-md-10">
    <div class="section-title text-center pb-30">
    <h3 class="title">Où donner ?</h3>
    <img style="height:33.1vh;width:auto;" src="{{asset('images/ouDonner.png')}}" alt="Team">
    <p class="text">Pour un recherche dans d'autre lieux je te laisse voir directement avec le site officiel du don du sang, <a target="_blank" href="https://dondesang.efs.sante.fr/trouver-une-collecte?menu=da">Allez vers le site.</a></p>
    </div> 
    </div>
    </div> 
    <div class="row">
    <div class="col-lg-12">
    <div class="contact-map mt-30">
    <iframe id="gmap_canvas" src="https://mapthenews.maps.arcgis.com/apps/instant/media/index.html?appid=ef4643359ecb4de39ec57afb96385aa4" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
    </div> 
    </div>
    </div> 
    <div class="contact-info pt-30">
    <div class="row">
    <div class="col-lg-4 col-md-6">
    <div class="single-contact-info contact-color-1 mt-30 d-flex ">
    </div>
    </div> 
    </div>
    </div> 
    </div> 
    </section>
@endsection