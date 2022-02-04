<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenu;
use App\Models\Image;
use ImageI;
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
        $images = Image::all();
        return view("administrateur.contenu",compact("contenus","images"));
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
    public function photoUpload(Request $request){
        $image = new Image();
        $image->titre = $request->titre;
        $image->url= $request->titre.".png";
        $image->save();
        $path = $request->titre.'.png';
        $request->photo->storeAs('public/photos', $path);
        $request->file('photo')->storeAs('public/thumbnail/', $path);
        $mediumthumbnailpath = public_path('storage/thumbnail/'. $path);
        $this->createThumbnail($mediumthumbnailpath, 300, 185);
        return redirect()->back();
    }
    public function newtemplate() {
        return view("newtemplate");
    }

    public function createThumbnail($path, $width, $height)
    {
      //  dd($path);
    $img = ImageI::make($path)->resize($width, $height, function ($constraint) {
        $constraint->aspectRatio();
    });
    $img->save($path);
    }
}
