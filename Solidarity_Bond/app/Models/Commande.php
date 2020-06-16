<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;
use Ramsey\Collection\Collection;

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
        return $this->produitsBuilder()->select('composer.ID_Produit','produits.Nom','composer.Quantite', 'produits.Description')->get();
    }

    private function produitsBuilder(){
        return $this->compositionEloquentBuilder()->join('produits', 'ID_Produit', '=', 'produits.ID');
    }

    private function compositionEloquentBuilder(){
        return $this->hasMany(\App\Models\Composer::class, 'ID_Commande');
    }

    public static function commandeNumero($ID){
        return self::liaisonCommandesProduits(self::liaisonCommandesUtilisateursSelonID($ID)->get());
    }

    public static function commandesTerminees(){
        return self::commandesSelonTerminees(1);
    }

    public static function commandesNonTerminees(){
        return self::commandesSelonTerminees(0);
    }

    private static function commandesSelonTerminees($intBoolean){
        return self::liaisonCommandesProduits(self::liaisonCommandesUtilisateursSelonTerminees($intBoolean)->get());
    }

    private static function liaisonCommandesProduits(\Illuminate\Support\Collection $collection){
        $collection->each(function($item, $key){
            $item['ID_Commande'] = $item->ID;
            $item['Produits'] = $item->produitsFormates();
            unset($item['ID']);
        });
        return $collection;
    }

    private static function liaisonCommandesUtilisateurs(){
        return Commande::join('utilisateurs','utilisateurs.ID','=','commandes.ID_Utilisateur')
            ->select('commandes.Date', 'commandes.ID_Utilisateur', 'utilisateurs.Nom', 'utilisateurs.Prenom',
                'utilisateurs.Entreprise', 'commandes.ID');
    }

    private static function liaisonCommandesUtilisateursSelonTerminees($intBoolean){
        return self::liaisonCommandesUtilisateurs()->where('Terminee','=',$intBoolean);
    }

    private static function liaisonCommandesUtilisateursSelonID($ID){
        return self::liaisonCommandesUtilisateurs()->where('commandes.ID','=',$ID);
    }

}
