<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenu;
use App\Models\Image;
use Session;

class AdminController extends Controller
{
    public function administrateur() {
        return view("administrateur.index");
    }
    public function contenuIndex(){
        $contenus = Contenu::all();
        return view("administrateur.contenu",compact("contenus"));
    }
    public function contenuSelected(Request $request){
        $contenu = Contenu::find($request->id);
        return response()->json($contenu);
    }
    public function contenuEdit(Request $request) {
        $contenu = Contenu::find($request->id);
        $contenu->titre = $request->titre;
        $contenu->description=$request->description;
        $contenu->save();
        Session::flash("success","Contenu correctement modifié.");
        return redirect()->back();
    }
    public function photoIndex(){
        $images = Image::all();
        return view("administrateur.image",compact('images'));
    }
}
