<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenu;
use App\Models\Image;
use App\Models\Evenement;
use ImageI;
use Session;
use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;

class FrontController extends Controller
{

    public function newtemplate() {
        return view("newtemplate");
    }
    public function onepage() {
        $contenuMoelle = Contenu::where('designation','=','OnePageMoelle')->get();
        $contenuSang = Contenu::where('designation','OnePageSang')->get();
        $cardSang = Contenu::where('designation','like','cardSang'.'%')->get();
        return view("onepage", compact('contenuMoelle','contenuSang','cardSang'));
        $cardMoelle = Contenu::where('designation','like','cardMoelle'.'%')->get();
        return view("onepage", compact('contenuMoelle','contenuSang','cardSang','cardMoelle'));
    }
    public function contact(){
        return view("contact");
    }
    public function evenement() {
        $contenuEvent = Evenement::where('dateEvenement','<',Carbon::now())->orderBy("dateEvenement","desc")->first();
        return view("evenement",compact('contenuEvent'));
    }
}
