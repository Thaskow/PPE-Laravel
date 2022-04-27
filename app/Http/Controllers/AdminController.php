<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenu;
use App\Models\Image;
use App\Models\Evenement;
use App\Models\User;
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
        $value= "";
        $int = 1;
        foreach ($evenement->promotions as $promo) {
            $value = $value . '<div class="card">';
            $value = $value . '<div class="card-header" id="heading'.$int.'">';
            $value = $value . '<a href="#" data-toggle="collapse" data-target="#collapse'.$int.'" aria-expanded="false" aria-controls="collapse'.$int.'" class="collapsed">'.$promo->libelle.'</a>';
            $value = $value . '</div>';
            $value = $value . '<div id="collapse'.$int.'" class="collapse" aria-labelledby="heading'.$int.'" data-parent="#accordionExample" style="">';
            $value = $value . '<div class="card-body">';
            $value = $value . '<p class="text">';
            foreach ($promo->users as $user) {
                $value = $value . $user->prenom . " " . $user->name."<br>";
            }
            $value = $value . "</p></div></div></div>";
            $int += 1;
        }
        return response()->json($value);
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
            $request->photo->storeAs('public\photos', $path);
            $request->file('photo')->storeAs('public\thumbnail\\', $path);
            $mediumthumbnailpath = public_path('storage\thumbnail\\'. $path);
            $this->createThumbnail($mediumthumbnailpath, 300, 185);
            return redirect()->back();
        }
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
    public function importCSV() {
        return view("administrateur.import");
    }
    public function importUpload(Request $request) {
        /* 
        Rechercher la promotion de l'user
        Si elle existe
            Récupérer son ID
            Ajouter l'utilisateur
            Liée l'user avec l'id de promo
        Si elle existe pas 
            Crée la promotion
            Récupérer son id
            Ajouter l'utilisateur
            Liée l'user avec l'id de promo
        Fin
        */
        $validator = Validator::make($request->all(), [
            'csv' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        else {
            $request->csv->storeAs('public\csv', $request->csv->getClientOriginalName());
            $file = fopen(url('storage/csv/'.$request->csv->getClientOriginalName()),"r");
            $lines = array();
            while(! feof($file))
            {
                $a = array();
                foreach (explode(';',fgetcsv($file)[0]) as $line) {
                    array_push($a,$line);
                }
                array_push($lines, $a);
            }
            array_splice($lines, 0, 1);
            fclose($file);
            foreach ($lines as $line) {
                $user = new User();
                $user->name = $line[1];
                $user->email = $line[4];
                $user->prenom = $line[0];
                $user->password = bcrypt("admin");
                $user->save();
                // vérifier la promotion si elle existe ou non
                //      ajouter l'user à la promotion
                // Sinon
                //      ajouter la promotion
                //      ajouter l'utilisateur
                //      associer l'user à la promotion
            }
            Session::flash("success","Fichier CSV correctement importé.");
            return redirect()->back();
        }
    }
}
