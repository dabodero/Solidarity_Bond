<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Auth\LoginController;
use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;

class BoutiqueController extends Controller
{
    public function boutique(){
       $produits = Produit::all();
        return view('boutique', compact('produits'));
    }

    public function produit(Request $request){
        $produit = Produit::find($request->ID_Produit);
        $title = $produit->Nom;
        return view('produit', compact('produit', 'title'));
    }

    public function commande(){
        return view('commande');
    }

    public function panier(){
        return view('panier');
    }

    public function ajouterAuPanier(Request $request){
        $ID_Produit = $request->ID_Produit;
        session()-> put(LoginController::getNomPanier().'.'.__($ID_Produit).'.Quantite',
                        session()->get(LoginController::getNomPanier().'.'.__($ID_Produit).'.Quantite')+$request->Quantite
                    );
        return back();
    }
}
