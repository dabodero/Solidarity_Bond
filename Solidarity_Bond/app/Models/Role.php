<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $primaryKey = 'ID';

    public $timestamps = false;

    public function utilisateurs(){
        return $this->hasMany(\App\Models\Utilisateur::class, 'ID_Role')->get();
    }

}
