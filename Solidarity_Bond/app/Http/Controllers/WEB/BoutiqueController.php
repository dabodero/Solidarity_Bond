<?php

namespace App\Http\Controllers\WEB;

use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function GuzzleHttp\Promise\all;

class BoutiqueController extends Controller
{
    public function boutique(){
       $Produits = Produit::all();
        return view('boutique', compact('Produits'));
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
}
