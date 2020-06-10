<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Composer extends Model
{
    protected $table = 'composer';

    public $incrementing = false;

    protected $primaryKey = ['ID_Produit', 'ID_Commande'];

    protected $fillable = ['ID_Produit', 'ID_Commande', 'Quantite', 'Mail', 'MotDePasse', 'Entreprise', 'Telephone', 'SIRET'];

    public $timestamps = false;

    public function commande(){
        return $this->belongsTo(\App\Models\Commande::class, 'ID_Commande')->first();
    }

    public function produit(){
        return $this->belongsTo(\App\Models\Produit::class, 'ID_Produit')->first();
    }

}
