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

    public function produitsPourCommandeFormatee(){
        return $this->produits("ID_Commande");
    }

    public function produits($primaryKey='ID'){
        return $this->produitsBuilder($primaryKey)->get();
    }

    public function produitsFormates($primaryKey='ID'){
        return $this->produitsBuilder($primaryKey)->select('composer.ID_Produit','produits.Nom','composer.Quantite', 'produits.Description')->get();
    }

    private function produitsBuilder($primaryKey){
        return $this->compositionEloquentBuilder($primaryKey)->join('produits', 'ID_Produit', '=', 'produits.ID');
    }

    private function compositionEloquentBuilder($primaryKey){
        return $this->hasMany(\App\Models\Composer::class, 'ID_Commande', $primaryKey);
    }

    public function terminer(){
        $this->update(['Terminee' => 1]);
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
            $item['Produits'] = $item->produitsFormates('ID_Commande');
            unset($item['ID']);
        });
        return $collection;
    }

    private static function liaisonCommandesUtilisateurs(){
        return Commande::join('utilisateurs','utilisateurs.ID','=','commandes.ID_Utilisateur')
            ->select('commandes.Date', 'commandes.ID_Utilisateur', 'utilisateurs.Nom', 'utilisateurs.Prenom',
                'utilisateurs.Entreprise', 'utilisateurs.Telephone', 'commandes.ID');
    }

    private static function liaisonCommandesUtilisateursSelonTerminees($intBoolean){
        return self::liaisonCommandesUtilisateurs()->where('Terminee','=',$intBoolean);
    }

    private static function liaisonCommandesUtilisateursSelonID($ID){
        return self::liaisonCommandesUtilisateurs()->where('commandes.ID','=',$ID);
    }

}
