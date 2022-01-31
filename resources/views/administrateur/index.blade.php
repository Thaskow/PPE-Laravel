@extends('administrateur.template')
@section('addons')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".content").height(window.innerHeight-112+"px");
        });
    </script>
@endsection
@section('titre')
    Accueil - Administrateur
@endsection
@section('content')
<div id="contenu">Contenus</div>
<div id="photos">Photos</div>
    
@endsection