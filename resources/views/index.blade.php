<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('css')
    <link rel="stylesheet" href="{{asset("css/index/index.css")}}">
@endsection
@extends('template')
@section('content')
    <div class="presentation">
        <div><i class="fas fa-angle-double-down"></i></div>
    </div>
    <div id="donDeMoelle" class="donDeMoelle">
        <div><img src="https://cdn.artec3d.com/styles/og_image/s3/3Dmodels/image/bone-image_0_0.png?ia7TE2_JHvXUDr340EVD.Ckr947lhm59&itok=Q8s_cKBL" alt=""></div>
        <div class="explication">        
            <div class="titre">Le don de moëlle</div>
            <div class="text"><p>Tu comprends, là on voit qu'on a beaucoup à travailler sur nous-mêmes car entre penser et dire, il y a un monde de différence car l'aboutissement de l'instinct, c'est l'amour ! C'est cette année que j'ai eu la révélation !

                Ah non attention, même si on frime comme on appelle ça en France... c'est juste une question d'awareness et parfois c'est bon parfois c'est pas bon. Et là, vraiment, j'essaie de tout coeur de donner la plus belle réponse de la terre !</p></div>
            <div><a href="">En savoir plus <i class="fas fa-caret-down"></i></a></div>
        </div>
    </div>
    <div id="donDuSang" class="donDuSang">
        <div class="explication">        
            <div class="titre">Le don du sang</div>
            <div class="text"><p>Tu comprends, là on voit qu'on a beaucoup à travailler sur nous-mêmes car entre penser et dire, il y a un monde de différence car l'aboutissement de l'instinct, c'est l'amour ! C'est cette année que j'ai eu la révélation !

                Ah non attention, même si on frime comme on appelle ça en France... c'est juste une question d'awareness et parfois c'est bon parfois c'est pas bon. Et là, vraiment, j'essaie de tout coeur de donner la plus belle réponse de la terre !</p></div>
            <div><a href="">En savoir plus <i class="fas fa-caret-down"></i></a></div>
        </div>
        <div><img src="https://static.turbosquid.com/Preview/001307/248/3Y/_600.jpg" alt=""></div>
    </div>
@endsection
<script>
    $(document).ready(function () {
        $(".presentation").height(window.innerHeight-52+"px");
        $(".donDeMoelle").height(window.innerHeight+"px");
        $(".donDuSang").height(window.innerHeight+"px");
    });
</script>