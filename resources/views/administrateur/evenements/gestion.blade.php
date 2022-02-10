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
        $(document).ready(function () {
            $(".contact-area").css('min-height',window.innerHeight+"px");
        });
    function selectEvenement(id){
    $.ajax({
        type: 'post',
        url: "{{route('event.selectedGes')}}",
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {id:id},
        success: function(returnBack) {
            returnBack["promotions"].forEach(promotion => {
                $(".refresh").append('<div class="card"><div class="card-header" id="headingTwo"><a href="#" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">'+promotion["libelle"]+'</a></div><div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordiTwoxample" style=""><div class="card-body"><p class="text">');
                promotion["users"].forEach(user => {
                    $(".refresh").append(user["name"]);
                });
                $(".refresh").append('</p></div></div></div>');
            });
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
                        <h3 class="title" id="creaOrEdit">Gestion d'évenements</h3>
                        <p class="text">Temps de passage, création des convocation.</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="contact-info" style="display:show;" id="selectContenu">
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <div class="single-contact-info contact-color-3 mt-30 d-flex ">
                            <select id="selectedContenu" class="feedback-input" onchange="selectEvenement(this.value)">
                                <option selected hidde disabled>Choissisez un évenement pour sa gestion</option>

                                @forelse ($evenements as $evenement)
                                    <option value="{{$evenement->id}}">{{$evenement->titre}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div> <!-- single contact info -->
                    </div>
                </div> <!-- row -->
            </div> <!-- contact info -->
        </div> <!-- container -->
        <section id="about" class="about-area" style="padding-top: 0px;">
            <div class="container">
            <div class="row">
            <div class="col-lg-5">
            <div class="faq-content mt-45">
            <div class="about-accordion">
            <div class="accordion refresh" id="accordiTwoxample">
            </div>
            </div> 
            </div> 
            </div>
            </div> 
            </div> 
            </section>
    </section>


    <!--====== CONTACT PART ENDS ======-->
@endsection