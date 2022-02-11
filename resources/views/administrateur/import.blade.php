@extends('administrateur.template')
@section('addons')
<link rel="stylesheet" href="{{asset("css/administrateur/contenu.css")}}">
<style>
    html {
        background:#f4f6f7;
    }
img {
    width: 500px;
    height: auto;
}</style>
@endsection
@section('titre')
    Affichage des photos
@endsection
@section('content')
   <!--====== PORTFOLIO PART START ======-->
   <section id="portfolio" class="contact-area">
</section>

<!--====== PORTFOLIO PART ENDS ======-->
<section id="contact" style="background:#f4f6f7">
    <div class="container">
        <div class="row" id="formEdit">
            <div class="col-lg-12">
                <div class="contact-wrapper form-style-two">
                    <form  action="{{route('import.upload')}}" method='POST' enctype="multipart/form-data">
                        @csrf
                        <input type="text" id='id' name="titre" hidden>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-input mt-25">
                                    <label>Image</label>
                                    <input id="image" type='file' name="csv">
                                </div> <!-- form input -->
                            </div>
                            <div class="col-md-12">
                                <div class="form-input light-rounded-buttons mt-30">
                                    <button type="submit" class="main-btn light-rounded-two">Ajouter</button>
                                </div> <!-- form input -->
                            </div>
                        </div> <!-- row -->
                    </form>
                </div> <!-- contact wrapper form -->
            </div>
        </div> <!-- row -->
    </div>
</section>
@endsection