<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Retourne toutes les photos
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Photo::all();
    }

    /**
     * Crée une nouvelle photo
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Photo::create($request->all());
    }

    /**
     * Retourne une photo spécifique
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        return $photo;
    }

    /**
     * Met à jour une photo spécifique
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        $photo->update($request->all());
    }

    /**
     * Supprime une photo spécifique
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        $photo->delete();
    }
}
