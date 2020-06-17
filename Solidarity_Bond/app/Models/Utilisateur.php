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

    protected $hidden = ['MotDePasse', 'SIRET'];

    public function role(){
        return $this->hasOne(Role::class);
    }

    public function commentaires(){
        return $this->hasMany(Commentaire::class);
    }

    public function commandes(){
        return $this->hasMany(Commande::class, 'ID_Utilisateur');
    }

    public function likes(){
        return $this->hasMany(Liker::class);
    }

}
