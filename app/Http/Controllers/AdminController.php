<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenu;
use App\Models\Image;
use App\Models\Evenement;
use ImageI;
use Session;
use Illuminate\Support\Facades\Validator;


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
    public function eventSelectedGes(Request $request){
        $evenement = Evenement::with("promotions.users")->find($request->id);
        return response()->json($evenement);
    }
    public function contenuEdit(Request $request) {
        $contenu = Contenu::find($request->id);
        $contenu->titre = $request->titre;
        $contenu->description=$request->description;
        $contenu->image_id = $request->image;
        $contenu->save();
        Session::flash("success","Contenu correctement modifié.");
        return redirect()->back();
    }
    public function photoIndex(){
        $images = Image::all();
        return view("administrateur.image",compact('images'));
    }
    public function photoUpload(Request $request){
        $validator = Validator::make($request->all(), [
            'titre' => 'min:3|max:255',
            'photo' => 'required'

        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        else {
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

    public function eventCrea(){
        $evenements = Evenement::all();
        return view("administrateur.evenements.crea",compact("evenements"));
    }
    public function eventGest(){
        $evenements = Evenement::all();
        return view("administrateur.evenements.gestion",compact("evenements"));
    }
    public function eventStat(){
        return view("administrateur.evenements.stats");
    }
    public function eventSelected(Request $request){
        $evenement = Evenement::find($request->id);
        return response()->json($evenement);
    }
    public function eventEdit(Request $request) {
        $validator = Validator::make($request->all(), [
            'titre' => 'min:3|max:255',
            'description' => 'min:10',
            'dateE' => 'required',
            'lieuxE' => 'required',
            'dateR' => 'required',
            'lieuxR' => 'required'

        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        else {
            if($request->id==null) {
                $evenement = new Evenement();
                Session::flash("success","Evenement correctement crée.");

            }
            else {
                $evenement = Evenement::find($request->id);
                Session::flash("success","Evenement correctement modifié.");
            }
            $evenement->titre = $request->nom;
            $evenement->description=$request->description;
            $evenement->dateEvenement = $request->dateE;
            $evenement->lieuEvenement = $request->lieuxE;
            $evenement->dateReunion = $request->dateR;
            $evenement->lieuReunion = $request->lieuxR;
            $evenement->save();
            return redirect()->back();
        }
    }
}
