<?php

namespace App\Http\Controllers;

use App\Models\Contenu;
use App\Models\Evenement;
use App\Models\Commentaire;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function newtemplate() {
        return view("newtemplate");
    }
    public function onepage() {
        $contenuMoelle = Contenu::where('designation','=','OnePageMoelle')->get();
        $contenuSang = Contenu::where('designation','OnePageSang')->get();
        $cardSang = Contenu::where('designation','like','cardSang'.'%')->get();
        $cardMoelle = Contenu::where('designation','like','cardMoelle'.'%')->get();
        return view("onepage", compact('contenuMoelle','contenuSang','cardSang','cardMoelle'));
    }
    public function evenement() {
        $events = Evenement::where('dateEvenement','<',Carbon::now())->get();
        $contenuEvent = Evenement::where('dateEvenement','<',Carbon::now())->orderBy("dateEvenement","desc")->with(['promotions' => function ($q) {
            $q->orderBy('pivot_pourcentage', 'desc');
          }])->first();
        $commentaire = Commentaire::where('evenement_id','=',$contenuEvent->id)->get();
        return view("evenement",compact('contenuEvent','events','commentaire'));
    }
    public function evenementShow($event) {
        $events = Evenement::where('dateEvenement','<',Carbon::now())->get();
        $commentaire = Commentaire::where('evenement_id','=',$event)->get();
        $contenuEvent = Evenement::where('id','=',$event)->orderBy("dateEvenement","desc")->with(['promotions' => function ($q) {
            $q->orderBy('pivot_pourcentage', 'desc');
          }])->first();
        return view("event",compact('contenuEvent','events','commentaire'));
    }

}
