@extends('administrateur.template')
@section('addons')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {

           // $(".pricing-area").height(window.innerHeight-200+"px");
            $(".pricing-area").css('min-height',window.innerHeight+"px");
        });
    </script>
@endsection
@section('titre')
    Accueil - Administrateur
@endsection
@section('content')
   <!--====== PRINICNG START ======-->

   <section id="pricing" class="pricing-area ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-7 col-sm-9">
                <div class="pricing-style mt-30">
                    <div class="pricing-icon text-center">
                        <!--<img src="assets/images/basic.svg" alt="">-->
                    </div>
                    <div class="pricing-header text-center">
                        <h5 class="sub-title">Contenu</h5>
                    </div>
                    <div class="pricing-list">
                        <ul>
                            <li><i class="lni lni-check-mark-circle"></i> Voir & Modifier les contenus</li>
                            <li><i class="lni lni-check-mark-circle"></i> Choisir des images </li>
                        </ul>
                    </div>
                    <div class="pricing-btn rounded-buttons text-center">
                        <a class="main-btn rounded-one" href="{{route('contenu.index')}}">Modifier</a>
                    </div>    
                </div> <!-- pricing style one -->
            </div>
            
            <div class="col-lg-4 col-md-7 col-sm-9">
                <div class="pricing-style mt-30">
                    <div class="pricing-icon text-center">
                        <!--<img src="assets/images/pro.svg" alt="">-->
                    </div>
                    <div class="pricing-header text-center">
                        <h5 class="sub-title">Photos</h5>
                    </div>
                    <div class="pricing-list">
                        <ul>
                            <li><i class="lni lni-check-mark-circle"></i> Ajouter & Supprmier des photos</li>
                            <li><i class="lni lni-check-mark-circle"></i> Explorer votre galerie</li>
                        </ul>
                    </div>
                    <div class="pricing-btn rounded-buttons text-center">
                        <a class="main-btn rounded-one" href="{{route('photo.index')}}">Voir</a>
                    </div>
                </div> <!-- pricing style one -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== PRINICNG ENDS ======-->
    
@endsection