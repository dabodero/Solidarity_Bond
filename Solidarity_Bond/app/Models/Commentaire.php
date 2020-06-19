<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

}
