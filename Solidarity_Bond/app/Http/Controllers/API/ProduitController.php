<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Retourne tout les produits
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Produit::all();
    }

    /**
     * Créer un produits
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Produit::create($request->all());
    }

    /**
     * Retourne un produit
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        return $produit;
    }

    /**
     * Met à jour les produits
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produit $produit)
    {
        $produit->update($request->all());
    }

    /**
     * Supprime un produit
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produit $produit)
    {
        $produit->delete();
    }

    /**
     * Retourne les commentaires d'un produit
     * @param Produit $produit
     * @return mixed
     */
    public function commentaires(Produit $produit){
        return $produit->commentairesFormates();
    }

}
