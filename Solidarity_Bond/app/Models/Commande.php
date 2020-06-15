<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $table = 'commandes';

    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable = ['ID_Utilisateur', 'Terminee'];

    public function utilisateur(){
        return $this->belongsTo(\App\Models\Utilisateur::class, 'ID_Utilisateur')->first();
    }

    public function composition(){
        return $this->compositionEloquentBuilder()->get();
    }

    public function produits(){
        return $this->compositionEloquentBuilder()->join('produits', 'ID_Produit', '=', 'produits.ID')->get();
    }

    private function compositionEloquentBuilder(){
        return $this->hasMany(\App\Models\Composer::class, 'ID_Commande');//Commande::where('commandes.ID','=', $this->ID)->join('composer', 'commandes.ID', '=', 'composer.ID_Commande');
    }

    public static function nonTerminees(){
        return Commande::where('Terminee','=', 0)->get();
    }

    public static function terminees(){
        return Commande::where('Terminee', '=', 1)->get();
    }

}
