<?php

namespace App\Http\Controllers\WEB;

use App\Models\Commande;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


// Controller de test permettant de ne pas modifier le fichier de routes tout en faisant les tests que nous souhaitons

class ProfileController extends Controller
{
    public function ShowDataProfile(){
        $data = Commande::nonTerminees();
        return view('profile', compact('data'));
    }
}
