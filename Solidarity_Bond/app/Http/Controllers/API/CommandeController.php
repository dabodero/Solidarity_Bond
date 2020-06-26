<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use Carbon\Carbon;
use http\Client\Response;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Retourne toutes les commandes
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Commande::all();
    }

    /**
     * Crée une nouvelle commande
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(! $request->has('Date')){
            $request['Date']=Carbon::now()->translatedFormat('Y-m-d');
        }
        if(! $request->has('Terminee')){
            $request['Terminee']=0;
        }
        Commande::create($request->all());
    }

    /**
     * Retourne une commande spécifique
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function show(Commande $commande)
    {
        return Commande::commandeNumero($commande->ID);
    }

    /**
     * Met à jour une commande
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commande $commande)
    {
        $commande->update($request->all());
    }

    /**
     * Efface une commande
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commande $commande)
    {
        $commande->delete();
    }

    /**
     * Retourne toutes les commandes terminées
     * @return \Illuminate\Support\Collection
     */
    public function terminees(){
        return Commande::commandesTerminees();
    }

    /**
     * Reoturne toutes les commandes non terminées
     * @return \Illuminate\Support\Collection
     */
    public function nonTerminees(){
        return Commande::commandesNonTerminees();
    }

    /**
     * Retourne les produits de la commande
     * @param Commande $commande
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function produitsCommande(Commande $commande){
        return $commande->produitsFormates();
    }

    /**
     * Termine la commande
     * @param Commande $commande
     */
    public function terminer(Commande $commande){
        $commande->terminer();
    }

}
