<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    /**
     *
     * Affiche une liste des ressources
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Utilisateur::all();
    }

    /**
     *
     * Enregistre une nouvelle entrée dans les ressources.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Utilisateur::create($request->all());
    }

    /**
     *
     * Affiche une ressource précise.
     * @param  \App\Models\Utilisateur  $utilisateur
     * @return \Illuminate\Http\Response
     */
    public function show(Utilisateur $utilisateur)
    {
        return $utilisateur;
    }

    /**
     *
     * Met à jour une ressource précise.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Utilisateur  $utilisateur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Utilisateur $utilisateur)
    {
        $utilisateur->update($request->all());
    }

    /**
     * Supprime une ressource précise
     *
     * @param  \App\Models\Utilisateur  $utilisateur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Utilisateur $utilisateur)
    {
        $utilisateur->delete();
    }

    /**
     * Retourne toutes les commandes d'un utilisateur
     * @param Utilisateur $utilisateur
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function commandes(Utilisateur $utilisateur){
        return $utilisateur->commandes();
    }
}
