<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Commentaire;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    /**
     * Retourne tous les commentaires
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Commentaire::all();
    }

    /**
     * Crée un nouveau commentaire
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(! $request->has('Date')){
            $request['Date']=Carbon::now()->translatedFormat('Y-m-d');
        }
        Commentaire::create($request->all());
    }

    /**
     * Retourne un commentaire spécifique
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function show(Commentaire $commentaire)
    {
        return $commentaire;
    }

    /**
     * Met à jour un commentaire spécifique
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commentaire $commentaire)
    {
        $commentaire->update($request->all());
    }

    /**
     * Supprime un commentaire spécifique
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();
    }

    /**
     * Like un commentaire spécifique
     * @param Request $request
     * @param Commentaire $commentaire
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function liker(Request $request, Commentaire $commentaire){
        $commentaire->likeOuUnlikePar($request->ID_Utilisateur);
        return response('');
    }

    /**
     * Retourne le nombre de likes d'un commentaire spécifique
     * @param Commentaire $commentaire
     * @return int
     */
    public function likesCount(Commentaire $commentaire){
        return $commentaire->likesCount();
    }

    /**
     * Retourne les 3 commentaires les plus likés
     * @return Commentaire[]|\Illuminate\Database\Eloquent\Collection
     */
    public function topTrois(){
        return Commentaire::topTroisCommentaires();
    }
}
