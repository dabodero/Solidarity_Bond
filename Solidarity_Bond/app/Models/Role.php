<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $primaryKey = 'ID';

    protected $fillable = ['Role'];

    public $timestamps = false;

    /**
     * Retourne tous les utilisateurs possédant ce rôle
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function utilisateurs(){
        return $this->hasMany(\App\Models\Utilisateur::class, 'ID_Role')->get();
    }

}
