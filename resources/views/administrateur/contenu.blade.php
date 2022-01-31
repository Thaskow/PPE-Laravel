@extends('administrateur.template')
@section('addons')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{asset("css/administrateur/contenu.css")}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        $(document).ready(function () {
            $(".content").height(window.innerHeight-112+"px");
        });
        function selectContenu(id){
        $.ajax({
            type: 'post',
            url: "{{route('contenu.selected')}}",
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {id:id},
            success: function(returnBack) {
                $("#formEdit").show();
                $("#titre:text").val(returnBack["titre"]);
                $("#id:text").val(returnBack["id"]);
                $("#description").text(returnBack["description"]);
            }
        });
    }
    </script>
@endsection
@section('titre')
    Modification du contenu
@endsection
@section('content')
    <div id="selectContenu">
        <select id="selectedContenu" class="feedback-input" onchange="selectContenu(this.value)">
            <option selected hidde disabled>Choissisez un contenu à modifié</option>
            @forelse ($contenus as $contenu)
                <option value="{{$contenu->id}}">{{$contenu->designation}}</option>
            @empty
                <option>Aucun contenu</option>
            @endforelse
        </select>
    </div>
    <div id="formEdit" style="display: none;">
        <form action="{{route('contenu.edit')}}" method="POST">
            @csrf
            <input type="text" id='id' name="id" hidden>
            <input id='titre' name="titre" class="feedback-input" type="text">
            <textarea id='description' name="description" class="feedback-input" type="text"></textarea>
            <input id='photo'class="feedback-input" name='photo' type="file">
            <input type="submit" value="Valider">
        </form>
    </div>
@endsection