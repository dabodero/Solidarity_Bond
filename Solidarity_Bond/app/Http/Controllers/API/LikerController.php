<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Liker;
use Illuminate\Http\Request;

class LikerController extends Controller
{
    /**
     * Retourne tous les enregistrements de like
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Liker::all();
    }

    /**
     * Crée un nouveau like
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Liker::create($request->all());
    }

    /**
     * Retourne un like spécifique
     * @param  \App\Models\Liker  $liker
     * @return \Illuminate\Http\Response
     */
    public function show(Liker $liker)
    {
        return $liker;
    }

    /**
     * Met à jour un like spécifique
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Liker  $liker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Liker $liker)
    {
        $liker->update($request->all());
    }

    /**
     * Supprime un like spécifique
     * @param  \App\Models\Liker  $liker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Liker $liker)
    {
        $liker->delete();
    }
}
