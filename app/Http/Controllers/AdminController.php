<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenu;
use App\Models\Image;
use Session;

class AdminController extends Controller
{
    public function __construct() 
    { 
        $this->middleware('auth'); 
        $this->middleware('is_admin'); 
    } 
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
<<<<<<< HEAD
    public function photoUpload(Request $request){
        $image = new Image();
        $image->titre = $request->titre;
        $image->url= $request->titre.".png";
        $image->save();
        $request->photo->storeAs('public/photos', $request->titre.'.png');
        return redirect()->back();
=======
    public function newtemplate() {
        return view("newtemplate");
>>>>>>> 91a8e81c0def8dd6827f2ed58b500be94c823eb9
    }
}
