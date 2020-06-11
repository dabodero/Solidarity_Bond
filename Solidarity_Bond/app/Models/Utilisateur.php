<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model implements Authenticatable
{
    use BasicAuthenticatable;

    protected $table = 'utilisateurs';

    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable = ['ID_Role', 'Nom', 'Prenom', 'Mail', 'MotDePasse', 'Entreprise', 'Telephone', 'SIRET'];

    public function role(){
        return $this->hasOne(\App\Models\Role::class);
    }

    public function commentaires(){
        return $this->hasMany(\App\Models\Commentaire::class);
    }

    public function commandes(){
        return $this->hasMany(\App\Models\Commande::class);
    }

    public function likes(){
        return $this->hasMany(\App\Models\Liker::class);
    }

}
