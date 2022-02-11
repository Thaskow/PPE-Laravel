@extends('administrateur.template')
@section('addons')
<script>$("form").on("change", ".file-upload-field", function(){
    $(this).parent(".file-upload-wrapper").attr("data-text",         $(this).val().replace(/.*(\/|\\)/, '') );
});
</script>
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10">
                <div class="section-title text-center pb-10">
                    <h3 class="title">Vos photos</h3>
                    <p class="text">Ici sont affiché toutes les photos publiée sur le site internet.</p>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="row no-gutters grid mt-50">
                    @forelse ($images as $image)
                        <div class="col-lg-4 col-sm-6">
                            <div class="single-portfolio">
                                <div class="portfolio-image">
                                    <img src="{{url('storage/thumbnail/'.$image->url)}}" alt="{{$image->titre}}">
                                    <div class="portfolio-overlay d-flex align-items-center justify-content-center">
                                        <div class="portfolio-content">
                                            <div class="portfolio-icon">
                                                <a class="image-popup" href="{{url('storage/photos/'.$image->url)}}"><i class="lni lni-zoom-in"></i></a>
                                            </div>
                                            <div class="portfolio-icon">
                                                <a href="#"><i class="lni lni-link"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- single portfolio -->
                        </div>
                    @empty
                    <br>
                    <h4>"Auncune photo pour l'instant"</h4>
                    @endforelse
                </div> <!-- row -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== PORTFOLIO PART ENDS ======-->
<section id="contact" style="background:#f4f6f7">
    <div class="container">
        <div class="row" id="formEdit">
            <div class="col-lg-12">
                <div class="contact-wrapper form-style-two">
                    <form  action="{{route('photo.upload')}}" method='POST' enctype="multipart/form-data">
                        @csrf
                        <input type="text" id='id' name="titre" hidden>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-input mt-25">
                                    <label>Titre</label>
                                    <div class="input-items default">
                                        <input id="titre" name="titre" type="text" placeholder="Nom de la photo">
                                        <i class="lni lni-pencil"></i>
                                    </div>
                                </div> <!-- form input -->
                            </div>

                            <div class="containerfile col-md-6">
                                <div class="form-input mt-25">
                                    <label>Image</label>
                                <form class="formfile">
                                  <div class="file-upload-wrapper" data-text="Selectionnez une image">
                                    <input name="file-upload-field photo" type="file" class="file-upload-field inputfile" >
                                  </div>
                                </form>
                                </div>
                            </div>





                            <!--
                            <div class="col-md-6">
                                <div class="form-input mt-25">
                                    <label>Image</label>
                                    <input type="file" name="photo">
                                </div>
                            </div>



                             <div class="col-md-6">
                                <div class="form-input mt-25">
                                    <label>Image</label>
                                    <div id="divfile" class="buttonfile buttonfilehover">
                                        Selectionner une image
                                        <input class="buttonfile" id="image buttonfilehover" type="file" name="photo"/>
                                    </div>
                                </div>
                            </div> -->


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
