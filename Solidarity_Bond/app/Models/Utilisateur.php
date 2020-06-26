<?php

namespace App\Models;

use App\Mail\ResetMotDePasse;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;

class Utilisateur extends Model implements Authenticatable, CanResetPassword
{
    use BasicAuthenticatable, Notifiable;

    protected $table = 'utilisateurs';

    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable = ['ID_Role', 'Nom', 'Prenom', 'Mail', 'MotDePasse', 'Entreprise', 'Telephone'];

    protected $hidden = ['MotDePasse'];

    /**
     * Retourne le rôle de l'utilisateur
     * @return Model|\Illuminate\Database\Eloquent\Relations\HasOne|object|null
     */
    public function role(){
        return $this->hasOne(Role::class)->first();
    }

    /**
     * Retourne tous les commentaires de l'utilisateur
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function commentaires(){
        return $this->hasMany(Commentaire::class)->get();
    }

    /**
     * Retourne toutes les commandes de l'utilisateur
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function commandes(){
        return $this->hasMany(Commande::class, 'ID_Utilisateur')->get();
    }

    /**
     * Retourne tous les likes que l'utilisateur à réalisés
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function likes(){
        return $this->hasMany(Liker::class)->get();
    }

    /**
     * Retourne le mot de passe de l'utilisateur
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->attributes['MotDePasse'];
    }

    /**
     * Retourne l'adresse mail à laquelle le mail de redéfinition du mot de passe doit être envoyé
     * @return string
     */
    public function getEmailForPasswordReset()
    {
        return $this->Mail;
    }

    /**
     * Envoie la notification de redéfinition de mot de passe
     *
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        Mail::to($this->Mail)->send(new ResetMotDePasse($token));
    }
}
