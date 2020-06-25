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

    public function role(){
        return $this->hasOne(Role::class)->first();
    }

    public function commentaires(){
        return $this->hasMany(Commentaire::class)->get();
    }

    public function commandes(){
        return $this->hasMany(Commande::class, 'ID_Utilisateur')->get();
    }

    public function likes(){
        return $this->hasMany(Liker::class)->get();
    }

    public function getAuthPassword()
    {
        return $this->attributes['MotDePasse'];
    }

    /**
     * Get the e-mail address where password reset links are sent.
     *
     * @return string
     */
    public function getEmailForPasswordReset()
    {
        return $this->Mail;
    }

    /**
     * Send the password reset notification.
     *
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        Mail::to($this->Mail)->send(new ResetMotDePasse($token));
    }
}
