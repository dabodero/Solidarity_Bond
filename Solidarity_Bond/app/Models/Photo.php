<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';

    protected $primaryKey = 'ID';

    protected $fillable = ['ID_Produit', 'Nom', 'CheminAcces'];

    public $timestamps = false;

    public function produit(){
        return $this->belongsTo(\App\Models\Produit::class, 'ID_Produit')->first();
    }
}
