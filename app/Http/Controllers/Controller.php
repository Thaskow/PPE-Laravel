<?php

namespace App\Http\Controllers;

use App\Models\Contenu;
use App\Models\Evenement;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

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
        $contenuEvent = Evenement::where('dateEvenement','<',Carbon::now())->orderBy("dateEvenement","desc")->first();
        //dd($contenuEvent);
        return view("evenement",compact('contenuEvent'));
    }
}
