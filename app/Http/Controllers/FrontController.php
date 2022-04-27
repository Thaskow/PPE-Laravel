<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenu;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use App\Models\Evenement;
use ImageI;
use Session;
use Carbon\Carbon;
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
<<<<<<< HEAD
        return view("onepage", compact('contenuMoelle','contenuSang','cardSang'));
=======
>>>>>>> e3602fc5984b4c209f046329008b559c2c01e3aa
        $cardMoelle = Contenu::where('designation','like','cardMoelle'.'%')->get();
        return view("onepage", compact('contenuMoelle','contenuSang','cardSang','cardMoelle'));
    }
    public function contact(){
        return view("contact");
    }
<<<<<<< HEAD
=======
    public function inscription(){
        if(Auth::check()) {
            $evenement = Evenement::orderBy("dateEvenement","desc")->first();
            $sang = $evenement->users()->where('user_id', Auth::id())->where('isDon',1)->exists();
            $moelle = $evenement->users()->where('user_id', Auth::id())->where('isMoelle',1)->exists();
            return view("inscription",compact('sang',"moelle"));
        }
        return view("inscription");
    }
    public function ouDonner() {
        return view("ouDonner");
    }
>>>>>>> e3602fc5984b4c209f046329008b559c2c01e3aa
    public function evenement() {
        $contenuEvent = Evenement::where('dateEvenement','<',Carbon::now())->orderBy("dateEvenement","desc")->first();
        return view("evenement",compact('contenuEvent'));
    }
<<<<<<< HEAD
=======
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
                $evenement->users()->attach(Auth::user(),["isDon" => 0,'datePassage' => Carbon::now(), "isPrimoDonneur" => 0, "isMoelle" => 1]);
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
                $evenement->users()->attach(Auth::user(),["isDon" => 1,'datePassage' => Carbon::now(), "isPrimoDonneur" => 0, "isMoelle" => 0]);
                Session::flash("success","Vous avez correctement été inscrit au don de moelle.");
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
        return redirect()->back();
    }
>>>>>>> e3602fc5984b4c209f046329008b559c2c01e3aa
}
