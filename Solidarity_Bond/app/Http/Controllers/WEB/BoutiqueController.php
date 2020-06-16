<?php

namespace App\Http\Controllers\WEB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BoutiqueController extends Controller
{
    public function boutique(){
        return view('boutique');
    }

    public function produit(Request $request){
        $ID_Produit = $request->ID_Produit;
        return view('produit', compact('ID_Produit'));
    }

    public function commande(){
        return view('commande');
    }

    public function panier(){
        return view('panier');
    }
}
