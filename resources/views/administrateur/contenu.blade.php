@extends('administrateur.template')
@section('addons')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{asset("css/administrateur/contenu.css")}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        $(document).ready(function () {
            $(".contact-area").css('min-height',window.innerHeight+"px");
        });
        function selectContenu(id){
        $.ajax({
            type: 'post',
            url: "{{route('contenu.selected')}}",
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {id:id},
            success: function(returnBack) {
                $("#image").val(returnBack["image_id"]);
                $("#formEdit").show();
                $("#titre:text").val(returnBack["titre"]);
                $("#id:text").val(returnBack["id"]);
                CKEDITOR.instances.description.setData(returnBack["description"]);
            }
        });
    }
    </script>
@endsection
@section('titre')
    Modification du contenu
@endsection
@section('content')
    <!--====== CONTACT PART START ======-->

    <section id="contact" class="contact-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="section-title text-center pb-30">
                        <h3 class="title">Contenu</h3>
                        <p class="text">Séléctionner un contenu pour ensuite pouvoir le modifié.</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="contact-info pt-30" style="display:show;" id="selectContenu">
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <div class="single-contact-info contact-color-3 mt-30 d-flex ">
                            <select id="selectedContenu" class="feedback-input" onchange="selectContenu(this.value)">
                                <option selected hidde disabled>Choissisez un contenu à modifié</option>

                                @forelse ($contenus as $contenu)
                                    <option value="{{$contenu->id}}">{{$contenu->designation}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div> <!-- single contact info -->
                    </div>
                </div> <!-- row -->
            </div> <!-- contact info -->
            <div class="row" id="formEdit" style="display: none;">
                <div class="col-lg-12">
                    <div class="contact-wrapper form-style-two">
                        <form action="{{route('contenu.edit')}}" method="POST">
                            @csrf
                            <input type="text" id='id' name="id" hidden>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-input mt-25">
                                        <label>Titre</label>
                                        <div class="input-items default">
                                            <input id="titre" name="titre" type="text" placeholder="Titre">
                                            <i class="lni lni-pencil"></i>
                                        </div>
                                    </div> <!-- form input -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-input mt-25">
                                        <label>Image</label>
                                        <div class="input-items default">
                                            <select name="image" id='image'>
                                            @foreach ($images as $image)
                                                <option value="{{$image->id}}">{{$image->titre}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div> <!-- form input -->
                                </div>
                                <div class="col-md-12">
                                    <div class="form-input mt-25">
                                        <label>Description</label>
                                        <div class="input-items default">
                                            <textarea class="form-control" id="description" name="description" placeholder="Message"></textarea>
                                            <script src="//cdn.ckeditor.com/4.16.2/basic/ckeditor.js"></script>
                                            <script>
                                            CKEDITOR.replace( 'description' );
                                            </script>
                                            <i class="lni lni-pencil-alt"></i>
                                        </div>
                                    </div> <!-- form input -->
                                </div>
                                <div class="col-md-12">
                                    <div class="form-input light-rounded-buttons mt-30">
                                        <button class="main-btn light-rounded-two">Modifier</button>
                                    </div> <!-- form input -->
                                </div>
                            </div> <!-- row -->
                        </form>
                    </div> <!-- contact wrapper form -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CONTACT PART ENDS ======-->
@endsection