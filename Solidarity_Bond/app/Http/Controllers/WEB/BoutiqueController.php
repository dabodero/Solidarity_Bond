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
    private const nom_dossier = 'boutique.';

    public function boutique(){
       $produits = Produit::all();
        return view(self::nom_dossier.'boutique', compact('produits'));
    }

    public function produit(Request $request){
        $produit = Produit::find($request->ID_Produit);
        $title = $produit->Nom;
        return view(self::nom_dossier.'produit', compact('produit', 'title'));
    }

    public function commande(){
        return view(self::nom_dossier.'commande');
    }

    public function panier(){
        return view(self::nom_dossier.'panier');
    }

    public function ajouterAuPanier(Request $request){
        $ID_Produit = $request->ID_Produit;
        session()-> put(LoginController::getNomPanier().'.'.__($ID_Produit).'.Quantite',
                        session()->get(LoginController::getNomPanier().'.'.__($ID_Produit).'.Quantite')+$request->Quantite
                    );
        return back();
    }
}
