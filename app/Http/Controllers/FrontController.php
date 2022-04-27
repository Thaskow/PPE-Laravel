<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenu;
use App\Models\Image;
use App\Models\Commentaire;
use Illuminate\Support\Facades\Auth;
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
        $cardMoelle = Contenu::where('designation','like','cardMoelle'.'%')->get();
        return view("onepage", compact('contenuMoelle','contenuSang','cardSang','cardMoelle'));
    }
    public function contact(){
        return view("contact");
    }
    public function inscription(){
        if(Auth::check()) {
            $evenement = Evenement::orderBy("dateEvenement","desc")->first();
            $sang = $evenement->users()->where('user_id', Auth::id())->where('isDon',1)->exists();
            $moelle = $evenement->users()->where('user_id', Auth::id())->where('isMoelle',1)->exists();
            return view("inscription",compact('sang',"moelle"));
        }
        return view("inscription");
    }
    public function inMoelle() {
        if(Auth::check()) {
            $evenement = Evenement::orderBy("dateEvenement","desc")->first();
            try {
                $evenement->promotions()->attach(Auth::user()->promotion()->get());
            } catch (\Throwable $th) {
                Session::flash("error","Une erreur et survenu.");
            }
            try {
                $evenement = Evenement::orderBy("dateEvenement","desc")->first();
                // Carbon::now() => le mettre en NULL
                $evenement->users()->attach(Auth::user(),["isDon" => 0,'datePassage' => Carbon::now(),'isVenir' => 0, "isPrimoDonneur" => 0, "isMoelle" => 1]);
                Session::flash("success","Vous avez correctement été inscrit au don de moelle.");
            } catch (\Throwable $th) {
                $evenement->users()->updateExistingPivot(Auth::user(), array("isMoelle" => 1));
                Session::flash("success","Votre inscription à été prise en compte.");
            }
        }
        else {
            Session::flash("error","Vous ne pouvez pas vous inscrire, vous n'êtes pas connecter.");
        }
        return redirect()->back();
    }
    public function ouDonner() {
        return view("ouDonner");
    }
    public function inSang() {
        if(Auth::check()) {
            $evenement = Evenement::orderBy("dateEvenement","desc")->first();
            try {
                $evenement->promotions()->attach(Auth::user()->promotion()->get());
            } catch (\Throwable $th) {
                Session::flash("error","Une erreur et survenu.");
            }
            try {
                $evenement = Evenement::orderBy("dateEvenement","desc")->first();
                // Carbon::now() => le mettre en NULL
                $evenement->users()->attach(Auth::user(),["isDon" => 1,'datePassage' => Carbon::now(),"isVenir" => 0, "isPrimoDonneur" => 0, "isMoelle" => 0]);
                Session::flash("success","Vous avez correctement été inscrit au don de sang.");
            } catch (\Throwable $th) {
                $evenement->users()->updateExistingPivot(Auth::user(), array("isDon" => 1));
                Session::flash("success","Votre inscription à été prise en compte.");
            }
        }
        else {
            Session::flash("error","Vous ne pouvez pas vous inscrire, vous n'êtes pas connecter.");
        }
        return redirect()->back();
    }
    public function unSang() {
        $evenement = Evenement::orderBy("dateEvenement","desc")->first();
        $evenement->users()->updateExistingPivot(Auth::user(), array("isDon" => 0));
        $sang = $evenement->users()->where('user_id', Auth::id())->where('isDon',1)->exists();
        $moelle = $evenement->users()->where('user_id', Auth::id())->where('isMoelle',1)->exists();
        if (!$sang && !$moelle) {
            $evenement->users()->detach(Auth::user());
        }
        Session::flash("success","Vous avez correctement été désinscrit au don de sang.");
        return redirect()->back();
    }
    public function unMoelle() {
        $evenement = Evenement::orderBy("dateEvenement","desc")->first();
        $evenement->users()->updateExistingPivot(Auth::user(), array("isMoelle" => 0));
        $sang = $evenement->users()->where('user_id', Auth::id())->where('isDon',1)->exists();
        $moelle = $evenement->users()->where('user_id', Auth::id())->where('isMoelle',1)->exists();
        if (!$sang && !$moelle) {
            $evenement->users()->detach(Auth::user());
        }
        Session::flash("success","Vous avez correctement été désinscrit au don de moelle.");
        return redirect()->back();
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
