<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Composer;
use Illuminate\Http\Request;

class ComposerController extends Controller
{
    /**
     * Retourne toutes les compositions
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Composer::all();
    }

    /**
     * Crée une nouvelle composition
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Composer::create($request->all());
    }

    /**
     * Retourne une composition spécifique
     * @param  \App\Models\Composer  $composer
     * @return \Illuminate\Http\Response
     */
    public function show(Composer $composer)
    {
        return $composer;
    }

    /**
     * Met à jour une composition spécifique
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Composer  $composer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Composer $composer)
    {
        $composer->update($request->all());
    }

    /**
     * Supprime une composition spécifique
     * @param  \App\Models\Composer  $composer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Composer $composer)
    {
        $composer->delete();
    }
}
