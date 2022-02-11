@extends('administrateur.template')
@section('addons')
<style>
    select {
        color: #6c6c6c;
        width: 100%;
        height: 44px;
        border: 2px solid #0067f4;
        font-size: 16px;
        border-radius: 5px;
        padding-left: 12px;
        padding-right: 44px;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
    function selectEvenement(id){
    $.ajax({
        type: 'post',
        url: "{{route('event.selected')}}",
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {id:id},
        success: function(returnBack) {
            console.log(returnBack);
            $("#nom").val(returnBack["titre"]);
            $("#lieuxE").val(returnBack["lieuEvenement"]);
            $("#lieuxR").val(returnBack["lieuReunion"]);
            $("#description").text(returnBack["description"]);
            $("#creaOrEdit").text("Modification d'évenements");
            $("#creaOrEditBtn").text("Modifier");
            $("#dateR").val(returnBack["dateReunion"]);
            $("#dateE").val(returnBack["dateEvenement"]);
            $("#id").val(returnBack["id"]);
        }
    });
}
</script>
@endsection
@section('titre')
    Gestion des évenements
@endsection
@section('content')
    <!--====== CONTACT PART START ======-->

    <section id="contact" class="contact-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-10">
                    <div class="section-title text-center pb-30">
                        <h3 class="title" id="creaOrEdit">Création d'évenements</h3>
                        <p class="text">Ajouter & modifier les évenements en cours ou à venir.</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="contact-info" style="display:show;" id="selectContenu">
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <div class="single-contact-info contact-color-3 mt-30 d-flex ">
                            <select id="selectedContenu" class="feedback-input" onchange="selectEvenement(this.value)">
                                <option selected hidde disabled>Choissisez un évenement à modifié</option>

                                @forelse ($evenements as $evenement)
                                    <option value="{{$evenement->id}}">{{$evenement->titre}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div> <!-- single contact info -->
                    </div>
                </div> <!-- row -->
            </div> <!-- contact info -->
            <div class="row" id="formEdit">
                <div class="col-lg-12">
                    <div class="contact-wrapper form-style-two">
                        <form action="{{route('event.edit')}}" method="POST">
                            @csrf
                            <input type="text" id="id" name="id" value="{{old("id")}}" hidden>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-input mt-25">
                                        <label>Nom</label>
                                        <div class="input-items default">
                                            <input id="nom" name="nom" type="text" value="{{old("nom")}}" placeholder="Nom de l'évenement">
                                            <i class="lni lni-pencil"></i>
                                        </div>
                                    </div> <!-- form input -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-input mt-25">
                                        <label>Lieux évenement</label>
                                        <div class="input-items default">
                                            <input id="lieuxE" name="lieuxE" type="text" value="{{old("lieuxE")}}" placeholder="Lieux de l'évenement">
                                            <i class="lni lni-map"></i>
                                        </div>
                                    </div> <!-- form input -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-input mt-25">
                                        <label>Date évenement</label>
                                        <div class="input-items default">
                                            <input id="dateE" name="dateE" value="{{old("dateE")}}" type="date">
                                            <i class="lni lni-timer"></i>
                                        </div>
                                    </div> <!-- form input -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-input mt-25">
                                        <label>Lieux réunnion</label>
                                        <div class="input-items default">
                                            <input id="lieuxR" name="lieuxR" value="{{old("lieuxR")}}" type="text" placeholder="Lieux de la réunnion primo donneur">
                                            <i class="lni lni-map"></i>
                                        </div>
                                    </div> <!-- form input -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-input mt-25">
                                        <label>Date réunnion</label>
                                        <div class="input-items default">
                                            <input id="dateR" name="dateR" value="{{old("dateR")}}" type="date">
                                            <i class="lni lni-timer"></i>
                                        </div>
                                    </div> <!-- form input -->
                                </div>
                                <div class="col-md-12">
                                    <div class="form-input mt-25">
                                        <label>Description</label>
                                        <div class="input-items default">
                                            <textarea  id="description" name="description" placeholder="Votre description de l'évenement.">{{old("description")}}</textarea>
                                            <i class="lni lni-pencil-alt"></i>
                                        </div>
                                    </div> <!-- form input -->
                                </div>
                                <div class="col-md-12">
                                    <div class="form-input light-rounded-buttons mt-30">
                                        <button id='creaOrEditBtn' class="main-btn light-rounded-two">Créer</button>
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