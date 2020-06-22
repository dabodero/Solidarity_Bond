<?php

namespace App\Http\Controllers\Test;

use App\Models\Commande;
use App\Models\Commentaire;
use App\Models\Produit;
use App\Models\Utilisateur;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    public function sandbox(Request $request){
//        $data=[];
//        dd(Commande::commandesNonTerminees()->where('ID_Utilisateur',11)->first()->produitsPourCommandeFormatee());
        //dd(Http::get("http://solidaritybond/api/utilisateur")->json());
        dd(Commentaire::first()->likeOuUnlikePar(4));
        dd($request->all());

        return view('test', compact('data'));

    }
}
