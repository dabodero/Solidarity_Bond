<?php

namespace App\Models;

use App\Mail\CommandeTerminee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use phpDocumentor\Reflection\Types\Boolean;
use Ramsey\Collection\Collection;

class Commande extends Model
{
    protected $table = 'commandes';

    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable = ['ID_Utilisateur', 'Date', 'Terminee'];

    /**
     * Retrouve l'utilisateur lié à la commande
     * @return Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|object|null
     */
    public function utilisateur(){
        return $this->belongsTo(\App\Models\Utilisateur::class, 'ID_Utilisateur')->first();
    }

    /**
     * Retourne la composition (ID des produits) de la commande
     * @param string $primaryKey
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function composition($primaryKey = 'ID'){
        return $this->compositionEloquentBuilder()->get($primaryKey);
    }

    /**
     * Retourne les produits liés à la commande formatée
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function produitsPourCommandeFormatee(){
        return $this->produits("ID_Commande");
    }

    /**
     * Retourne les produits liés à la commande
     * @param string $primaryKey
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function produits($primaryKey='ID'){
        return $this->produitsBuilder($primaryKey)->get();
    }

    /**
     * Retourne les produits, liés à la commande, avec des champs formatés
     * @param string $primaryKey
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function produitsFormates($primaryKey='ID'){
        return $this->produitsBuilder($primaryKey)->select('composer.ID_Produit','produits.Nom','composer.Quantite', 'produits.Description')->get();
    }

    /**
     * Retourne un QueryBuilder avec les produits
     * @param $primaryKey
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    private function produitsBuilder($primaryKey){
        return $this->compositionEloquentBuilder($primaryKey)->join('produits', 'ID_Produit', '=', 'produits.ID');
    }

    /**
     * Retourne un QueryBuilder avec la composition de la commande
     * @param $primaryKey
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    private function compositionEloquentBuilder($primaryKey){
        return $this->hasMany(\App\Models\Composer::class, 'ID_Commande', $primaryKey);
    }

    /**
     * Termine une commande et envoie un mail à l'utilisateur ayant passé la commande
     */
    public function terminer(){
        $this->update(['Terminee' => 1]);
        Mail::to($this->utilisateur()->Mail)->send(new CommandeTerminee($this));
    }

    /**
     * Retourne la commande portant l'ID entré en paramètre
     * @param $ID
     * @return \Illuminate\Support\Collection
     */
    public static function commandeNumero($ID){
        return self::liaisonCommandesProduits(self::liaisonCommandesUtilisateursSelonID($ID)->get());
    }

    /**
     * Retourne toutes les commandes terminées
     * @return \Illuminate\Support\Collection
     */
    public static function commandesTerminees(){
        return self::commandesSelonTerminees(1);
    }

    /**
     * Retourne toutes les commandes non terminées
     * @return \Illuminate\Support\Collection
     */
    public static function commandesNonTerminees(){
        return self::commandesSelonTerminees(0);
    }

    /**
     * Retourne toutes les commandes selon leur état (terminee ou non)
     * @param $intBoolean
     * @return \Illuminate\Support\Collection
     */
    private static function commandesSelonTerminees($intBoolean){
        return self::liaisonCommandesProduits(self::liaisonCommandesUtilisateursSelonTerminees($intBoolean)->get());
    }

    /**
     * Retourne une collection avec tous les produits pour chaque commande
     * @param \Illuminate\Support\Collection $collection
     * @return \Illuminate\Support\Collection
     */
    private static function liaisonCommandesProduits(\Illuminate\Support\Collection $collection){
        $collection->each(function($item, $key){
            $item['ID_Commande'] = $item->ID;
            $item['Produits'] = $item->produitsFormates('ID_Commande');
            unset($item['ID']);
        });
        return $collection;
    }

    /**
     * Retourne un Builder liant les commandes et les utilisateurs
     * @return mixed
     */
    private static function liaisonCommandesUtilisateurs(){
        return Commande::join('utilisateurs','utilisateurs.ID','=','commandes.ID_Utilisateur')
            ->select('commandes.Date', 'commandes.ID_Utilisateur', 'utilisateurs.Nom', 'utilisateurs.Prenom',
                'utilisateurs.Entreprise', 'utilisateurs.Telephone', 'commandes.ID');
    }

    /**
     * Retourne un Builder liant les commandes et les utilisateurs selon l'état de la commande
     * @param $intBoolean
     * @return mixed
     */
    private static function liaisonCommandesUtilisateursSelonTerminees($intBoolean){
        return self::liaisonCommandesUtilisateurs()->where('Terminee','=',$intBoolean);
    }

    /**
     * Retourne un Builder liant les commandes et les utilisateurs selon l'ID de la commande
     * @param $ID
     * @return mixed
     */
    private static function liaisonCommandesUtilisateursSelonID($ID){
        return self::liaisonCommandesUtilisateurs()->where('commandes.ID','=',$ID);
    }

}
