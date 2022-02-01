@extends('administrateur.template')
@section('addons')
<style>img {
    width: 500px;
    height: auto;
}</style>
@endsection
@section('titre')
    Affichage des photos
@endsection
@section('content')
   <div id="affichagePhotos">
       @forelse ($images as $image)
            <img src="{{url('storage/photos/'.$image->url)}}" alt="{{$image->titre}}">
       @empty
           Aucune photo publié pour l'instant
       @endforelse
   </div>
   <div id="ajouterImage">
       <form action="{{route('photo.upload')}}" method='POST' enctype="multipart/form-data">
            @csrf
            <input type="text" name="titre" placeholder="Nom de la photo">
           <input type='file' name="photo">
           <input type="submit" value='Publié'>
       </form>
   </div>
@endsection