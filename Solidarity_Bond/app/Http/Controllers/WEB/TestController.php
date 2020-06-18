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

        $data = Commande::nonTerminees();
      


        //dd($data->first()->utilisateur());
        $data = Commande::commandesNonTerminees();/*
        //$data = Commande::commandesNonTerminees();
        /*
        $data->each(function($item, $key){
           $item['Produits'] = $item->produits();
            //dd($item, $key);
        });*/
        /*$dataProduit = [];
        foreach($data as $d){
            dd($d);
            $dataProduit[$d->ID] = $d->produits();
        }*/
        //dd($data->first()->Produits);
        //dd(Http::get("http://solidaritybond/api/utilisateur")->json());
        return view('test', compact('data'));
    }
}
