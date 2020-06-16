<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;

class Commande extends Model
{
    protected $table = 'commandes';

    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable = ['ID_Utilisateur', 'Terminee'];

    public function utilisateur(){
        return $this->belongsTo(\App\Models\Utilisateur::class, 'ID_Utilisateur')->first();
    }

    public function composition(){
        return $this->compositionEloquentBuilder()->get();
    }

    public function produits(){
        return $this->produitsBuilder()->get();
    }

    public function produitsFormates(){
        return $this->produitsBuilder()->select('ID_Produit','Nom', 'Description')->get();
    }

    private function produitsBuilder(){
        return $this->compositionEloquentBuilder()->join('produits', 'ID_Produit', '=', 'produits.ID');
    }

    private function compositionEloquentBuilder(){
        return $this->hasMany(\App\Models\Composer::class, 'ID_Commande');
    }

    public static function nonTerminees(){
        return self::commandeFormateeSelonTerminee(0)->get();
    }

    public static function terminees(){
        return self::commandeFormateeSelonTerminee(1)->get();
    }

    private static function commandeFormatee(){
        $utilisateurs = Utilisateur::select('ID as Utilisateur', 'Nom', 'Prenom', 'Entreprise');
        return Commande::join('composer', 'composer.ID_Commande', '=', 'commandes.ID')
            ->join('produits', 'composer.ID_Produit', '=', 'produits.ID')
            ->joinSub($utilisateurs, 'utilisateurs', function($join){
                $join->on('commandes.ID_Utilisateur', '=', 'utilisateurs.Utilisateur');
            })
            ->select('commandes.Date', 'commandes.ID_Utilisateur', 'utilisateurs.Nom', 'utilisateurs.Prenom', 'utilisateurs.Entreprise',
                'commandes.ID as ID_Commande', 'produits.ID as ID_Produit', 'produits.Nom as Produit', 'composer.Quantite')
            ->orderBy('Date', 'asc')->orderBy('ID_Utilisateur', 'asc');
    }

    private static function commandeFormateeSelonTerminee($intBoolean){
        return self::commandeFormatee()->where('Terminee','=', $intBoolean);
    }

    public static function commandeNumero($ID){
        return self::commandeFormateeSelonID($ID)->get();
    }

    private static function commandeFormateeSelonID($ID){
        return self::commandeFormatee()->where('ID_Commande','=',$ID);
    }

}
