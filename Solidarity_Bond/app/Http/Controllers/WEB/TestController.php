<?php

namespace App\Http\Controllers\WEB;

use App\Models\Commande;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Controller de test permettant de ne pas modifier le fichier de routes tout en faisant les tests que nous souhaitons

class TestController extends Controller
{
    public function sandbox(){
        $data = Commande::nonTerminees();

        //dd($data->first()->utilisateur());
        return view('test', compact('data'));
    }
}
