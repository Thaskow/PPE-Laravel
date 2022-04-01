<?php

namespace App\Http\Controllers;

use App\Models\Contenu;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

<<<<<<< HEAD
        return view("onepage", compact('contenuMoelle','contenuSang'));
    }
    public function ouDonner() {
        return view("ouDonner");
    }
    public function inputCity(Request $request) {
        $json = "test";
        dd($request->city);
        return response()->json($json);
    }
=======
>>>>>>> 61096f154d14032252808990c329abecd1c53e16
}
