<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Liker extends Model
{
    protected $table = 'liker';

    protected $primaryKey = ['ID_Utilisateur', 'ID_Commentaire'];

    protected $fillable = ['ID_Utilisateur', 'ID_Commentaire'];

    public $timestamps = false;

    public $incrementing = false;

    public function utilisateur(){
        return $this->belongsTo(\App\Models\Utilisateur::class, 'ID_Utilisateur')->first();
    }

    public function commentaire(){
        return $this->belongsTo(\App\Models\Commentaire::class, 'ID_Commentaire')->first();
    }

    protected function setKeysForSaveQuery(Builder $query)
    {
        return $query->where($this->primaryKey[0], $this->getAttribute($this->primaryKey[0]))
            ->where($this->primaryKey[1], $this->getAttribute($this->primaryKey[1]));
    }

}
