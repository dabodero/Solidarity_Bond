<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $table = 'produits';

    protected $primaryKey = 'ID';

    protected $fillable = ['Nom', 'Description'];

    public $timestamps = false;

    /**
     * Retourne toutes les commandes que le produit compose
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function commandes(){
        return $this->composeEloquentBuilder()->join('commandes', 'ID_Commande', '=','commandes.ID')->get();
    }

    /**
     * Retourne toutes les photos du produit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function photos(){
        return $this->hasMany(\App\Models\Photo::class, 'ID_Produit')->get();
    }

    /**
     * Retourne toutes les compositions que le produit concerne
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function compose(){
        return $this->composeEloquentBuilder()->get();
    }

    /**
     * Retourne tous les commentaires liés au produit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function commentaires(){
        return $this->hasMany(\App\Models\Commentaire::class, 'ID_Produit')->get();
    }

    /**
     * Retourne un Query Builder des compositions que le produit concerne
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    private function composeEloquentBuilder(){
        return $this->hasMany(\App\Models\Composer::class, 'ID_Produit');
    }

    /**
     * Retourne tous les commentaires liés au produit de manière formatée, avec les likes
     * @return mixed
     */
    public function commentairesFormates(){
        $likes = Liker::selectRaw('ID_Commentaire, COUNT(ID_Utilisateur) Likes_Count')->groupBy('ID_Commentaire');
        $commentaires = Commentaire::where('ID_Produit', $this->ID)
            ->join('utilisateurs', 'utilisateurs.ID','=','ID_Utilisateur')
            ->leftJoinSub($likes, 'likes', function($join){
                $join->on('commentaires.ID', '=', 'likes.ID_Commentaire');
            })->select('commentaires.ID as ID_Commentaire', 'Commentaire', 'Likes_Count', 'ID_Utilisateur', 'Nom', 'Prenom', 'Entreprise');
        $commentaires = $commentaires->get()->each(function($item, $key){
            if($item['Likes_Count']==null){
                $item['Likes_Count']=0;
            }
        });
        return $commentaires;
    }
}
