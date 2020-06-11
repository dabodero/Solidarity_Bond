<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $table = 'produits';

    protected $primaryKey = 'ID';

    protected $fillable = ['Nom', 'Description'];

    public $timestamps = false;

    public function commandes(){
        return $this->composeEloquentBuilder()->join('commandes', 'ID_Commande', '=','commandes.ID')->get();
    }

    public function photos(){
        return $this->hasMany(\App\Models\Photo::class, 'ID_Produit')->get();
    }

    public function compose(){
        return $this->composeEloquentBuilder()->get();
    }

    public function commentaires(){
        return $this->hasMany(\App\Models\Commentaire::class, 'ID_Produit')->get();
    }

    private function composeEloquentBuilder(){
        return $this->hasMany(\App\Models\Composer::class, 'ID_Produit');
    }
}
