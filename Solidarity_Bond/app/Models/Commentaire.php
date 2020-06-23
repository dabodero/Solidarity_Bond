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

    public function utilisateur(){
        return $this->belongsTo(\App\Models\Utilisateur::class, 'ID_Utilisateur')->first();
    }

    public function produit(){
        return $this->belongsTo(\App\Models\Produit::class, 'ID_Produit')->get();
    }

    public function likes(){
        return $this->hasMany(\App\Models\Liker::class, 'ID_Commentaire')->get();
    }

    public function likesCount(){
        return $this->likes()->count();
    }

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

    public static function topTroisCommentaires(){
        $table = Commentaire::all()->each(function($commentaire){
            $commentaire['Likes']=$commentaire->likesCount();
        })->sortByDesc('Likes')->take(3);
        return $table;
    }

}
