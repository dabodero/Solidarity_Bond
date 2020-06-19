<?php

namespace App\Http\Controllers\WEB;

use App\Models\Commande;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

// Controller de test permettant de ne pas modifier le fichier de routes tout en faisant les tests que nous souhaitons

class TestController extends Controller
{
    public function sandbox(){
        dd(session()->all());
        return view('test', compact('data'));
    }
}
