<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Liker extends Model
{
    protected $table = 'liker';

    protected $primaryKey = ['ID_Utilisateur', 'ID_Commentaire'];

    public $timestamps = false;

    public $incrementing = false;

    public function utilisateur(){
        return $this->belongsTo(\App\Models\Utilisateur::class, 'ID_Utilisateur')->first();
    }

    public function commentaire(){
        return $this->belongsTo(\App\Models\Commentaire::class, 'ID_Commentaire')->first();
    }

}
