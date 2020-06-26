<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class Commentaire extends Model
{

    protected $table = 'commentaires';

    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable = ['ID_Utilisateur', 'ID_Produit', 'Commentaire', 'Date'];

    /**
     * Retourne l'utilisateur lié au commentaire
     * @return Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|object|null
     */
    public function utilisateur(){
        return $this->belongsTo(\App\Models\Utilisateur::class, 'ID_Utilisateur')->first();
    }

    /**
     * Retourne le produit que le commentaire concerne
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function produit(){
        return $this->belongsTo(\App\Models\Produit::class, 'ID_Produit')->get();
    }

    /**
     * Retourne tous les enregistrements de likes que le commentaire possède
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function likes(){
        return $this->hasMany(\App\Models\Liker::class, 'ID_Commentaire')->get();
    }

    /**
     * Retourne le nombre de likes que le commentaire possède
     * @return int
     */
    public function likesCount(){
        return $this->likes()->count();
    }

    /**
     * Permet de liker le commentaire ou enlever le like si l'utilisateur l'avait déjà liké
     * @param $ID_Utilisateur
     */
    public function likeOuUnlikePar($ID_Utilisateur)
    {
        try {
            Liker::create([
                'ID_Utilisateur' => $ID_Utilisateur,
                'ID_Commentaire' => $this->ID
            ]);
        }catch (QueryException $queryException){
            Liker::where([['ID_Utilisateur','=',$ID_Utilisateur],['ID_Commentaire','=', $this->ID]])->first()->delete();
        }
    }

    /**
     * Retourne les 3 commentaires le plus likés
     * @return Commentaire[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function topTroisCommentaires(){
        $table = Commentaire::all()->each(function($commentaire){
            $commentaire['Likes']=$commentaire->likesCount();
        })->sortByDesc('Likes')->take(3);
        return $table;
    }

}
