<?php

namespace App\Http\Controllers\WEB;

use App\Models\Commande;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    public function sandbox(){
//        $data=[];
//        dd(Commande::commandesNonTerminees()->where('ID_Utilisateur',11)->first()->produitsPourCommandeFormatee());
        //dd(Http::get("http://solidaritybond/api/utilisateur")->json());
        Auth::user()->delete();
        Auth::logout();

        dd(Utilisateur::all());

        return view('test', compact('data'));

    }
}
