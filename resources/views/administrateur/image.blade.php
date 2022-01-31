@extends('administrateur.template')
@section('addons')
@endsection
@section('titre')
    Affichage des photos
@endsection
@section('content')
   <div id="affichagePhotos">
       @forelse ($images as $image)
           <p>{{$image->titre}}</p>
       @empty
           Aucune photo publié pour l'instant
       @endforelse
   </div>
@endsection