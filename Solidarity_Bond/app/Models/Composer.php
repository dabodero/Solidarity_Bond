<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Composer extends Model
{
    protected $table = 'composer';

    public $incrementing = false;

    protected $primaryKey = ['ID_Produit', 'ID_Commande'];

    protected $fillable = ['ID_Produit', 'ID_Commande', 'Quantite'];

    public $timestamps = false;

    /**
     * Retourne le commande que la composition concerne
     * @return Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|object|null
     */
    public function commande(){
        return $this->belongsTo(\App\Models\Commande::class, 'ID_Commande')->first();
    }

    /**
     * Retourne le produit que la composition concerne
     * @return Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|object|null
     */
    public function produit(){
        return $this->belongsTo(\App\Models\Produit::class, 'ID_Produit')->first();
    }

}
