<?php

namespace Tests\Unit;

use App\Models\Commande;
use App\Models\Commentaire;
use App\Models\Produit;
use App\Models\Role;
use App\Models\Utilisateur;
use Tests\TestCase;

class APIRoutesTest extends TestCase
{
    private const PREFIX = 'api';

    public function testCommandeGET()
    {
        $response = $this->get(self::PREFIX.'/commande');
        $response->assertStatus(200);
    }

    public function testCommandePOST()
    {
        $response = $this->post(self::PREFIX.'/commande'.'?ID_Utilisateur=1');
        $response->assertStatus(200);
    }

    public function testCommandeNonTermineesGET()
    {
        $response = $this->get(self::PREFIX.'/commande/nonterminees');
        $response->assertStatus(200);
    }

    public function testCommandeTermineesGET()
    {
        $response = $this->get(self::PREFIX.'/commande/terminees');
        $response->assertStatus(200);
    }

    public function testCommandeDELETE()
    {
        $ID = Commande::all()->last()->ID;
        $response = $this->delete(self::PREFIX.'/commande/'.$ID);
        $response->assertStatus(200);
        if(Commande::all()->last()->ID==$ID){self::fail("La commande n'a pas été supprimée.");}
    }

    public function testCommandePUT()
    {
        $commande = Commande::first();
        if($commande->Terminee){
            $commande['Terminee']=0;
            $changement = 0;
        } else {
            $commande['Terminee']=1;
            $changement = 1;
        }
        $response = $this->put(self::PREFIX.'/commande/'.$commande->ID, ['Terminee'=>$changement]);
        $response->assertStatus(200);
        if(Commande::first()->Terminee!=$commande['Terminee']){self::fail("Aucun update n'a été fait.");}
    }

    public function testCommandeNumeroGET()
    {
        $ID = Commande::first()->ID;
        $response = $this->get(self::PREFIX.'/commande/'.$ID);
        $response->assertStatus(200);
    }

    public function testCommandeNumeroProduitsGET()
    {
        $ID = Commande::first()->ID;
        $response = $this->get(self::PREFIX.'/commande/'.$ID.'/produits');
        $response->assertStatus(200);
    }

    public function testCommandeNumeroTerminerPUT()
    {
        $commande = Commande::commandesNonTerminees()->first();
        $response = $this->put(self::PREFIX.'/commande/'.$commande['ID_Commande'].'/terminer');
        $response->assertStatus(200);
        if((Commande::find($commande['ID_Commande']))['Terminee']==$commande['Terminee']){self::fail("La commande n'a pas été terminée.");}
    }

    public function testCommentaireGET()
    {
        $response = $this->get(self::PREFIX.'/commentaire');
        $response->assertStatus(200);
    }

    public function testCommentairePOST()
    {
        $ID_Utilisateur = Utilisateur::first()->ID;
        $ID_Produit = Produit::first()->ID;
        $commentaire = "Test";
        $response = $this->post(self::PREFIX.'/commentaire', ['ID_Utilisateur'=>$ID_Utilisateur, 'ID_Produit'=>$ID_Produit, 'Commentaire'=>$commentaire]);
        $response->assertStatus(200);
        if(Commentaire::all()->last()['Commentaire']!="Test"){self::fail("Le commentaire n'a pas été enregistré.");}
    }

    public function testCommentaireTopTroisGET()
    {
        $response = $this->get(self::PREFIX.'/commentaire/topTrois');
        $response->assertStatus(200);
    }

    public function testCommentaireNumeroGET()
    {
        $ID = Commentaire::first()->ID;
        $response = $this->get(self::PREFIX.'/commentaire/'.$ID);
        $response->assertStatus(200);
    }

    public function testCommentairePUT()
    {
        $commentaire = Commentaire::first();
        $response = $this->put(self::PREFIX.'/commentaire/'.$commentaire['ID'], ['Commentaire'=>($commentaire['Commentaire'].'T')]);
        $response->assertStatus(200);
        if(Commentaire::find($commentaire->ID)['Commentaire']==$commentaire['Commentaire']){self::fail("Le commentaire n'a pas été changé.");}
    }

    public function testCommentaireDELETE()
    {
        $commentaire = Commentaire::all()->last();
        $response = $this->delete(self::PREFIX.'/commentaire/'.$commentaire['ID']);
        $response->assertStatus(200);
        if(Commentaire::find($commentaire['ID'])!=null){self::fail("Le commentaire n'a pas été effacé.");}
    }

    public function testCommentaireLikerUnlikerPOST()
    {
        $ID_Utilisateur = Utilisateur::first()->ID;
        $ID_Commentaire = Commentaire::first()->ID;
        $response = $this->post(self::PREFIX.'/commentaire/'.$ID_Commentaire.'/liker-unliker', ['ID_Utilisateur'=>$ID_Utilisateur, 'ID_Commentaire'=>$ID_Commentaire]);
        $response->assertStatus(200);
    }

    public function testCommentaireLikesCountGET()
    {
        $ID = Commentaire::first()->ID;
        $response = $this->get(self::PREFIX.'/commentaire/'.$ID.'/likesCount');
        $response->assertStatus(200);
    }

    public function testProduitGET()
    {
        $response = $this->get(self::PREFIX.'/produit');
        $response->assertStatus(200);
    }

    public function testProduitPOST()
    {
        $response = $this->post(self::PREFIX.'/produit', ['Nom'=>'Produit', 'Description'=>"Produit de test"]);
        $response->assertStatus(200);
        if(Produit::all()->last()['Nom']!='Produit'){self::fail("Le produit n'a pas été créé.");}
    }

    public function testProduitNumeroGET()
    {
        $produit = Produit::first();
        $response = $this->get(self::PREFIX.'/produit/'.$produit['ID']);
        $response->assertStatus(200);
    }

    public function testProduitNumeroPUT()
    {
        $produit = Produit::first();
        $response = $this->put(self::PREFIX.'/produit/'.$produit['ID'], ['Nom'=>$produit['Nom'].'T']);
        $response->assertStatus(200);
        if(Produit::first()['Nom']==$produit['Nom']){self::fail("Le nom n'a pas été changé.");}
    }

    public function testProduitNumeroDELETE()
    {
        $produit = Produit::all()->last();
        $response = $this->delete(self::PREFIX.'/produit/'.$produit['ID']);
        $response->assertStatus(200);
        if(Produit::all()->last()['ID']==$produit['ID']){self::fail("Le produit n'a pas été supprimé.");}
    }

    public function testProduitNumeroCommentairesGET()
    {
        $ID = Produit::first()['ID'];
        $response = $this->get(self::PREFIX.'/produit/'.$ID.'/commentaires');
        $response->assertStatus(200);
    }

    public function testUtilisateurGET()
    {
        $response = $this->get(self::PREFIX.'/utilisateur');
        $response->assertStatus(200);
    }

    public function testUtilisateurPOST()
    {
        $utilisateur = ['ID_Role'=>Role::first()['ID'], 'Nom'=>"Nom", 'Prenom'=>"Prenom", 'Mail'=>"test@test.test", 'MotDePasse'=>"MotDePasse", 'Entreprise'=>"Entreprise", 'Telephone'=>"0600000000"];
        $response = $this->post(self::PREFIX.'/utilisateur', $utilisateur);
        $response->assertStatus(200);
        if(Utilisateur::all()->last()['Nom']!=$utilisateur['Nom']){self::fail("L'utilisateur n'a pas été créé.");}
    }

    public function testUtilisateurPUT()
    {
        $utilisateur = Utilisateur::first();
        $response = $this->put(self::PREFIX.'/utilisateur/'.$utilisateur['ID'], ['Nom'=>$utilisateur['Nom'].'T']);
        $response->assertStatus(200);
        if(Utilisateur::first()['Nom']==$utilisateur['Nom']){self::fail("L'utilisateur n'a pas été modifié.");}
    }

    public function testUtilisateurNumeroGET()
    {
        $ID = Utilisateur::first()['ID'];
        $response = $this->get(self::PREFIX.'/utilisateur/'.$ID);
        $response->assertStatus(200);
    }

    public function testUtilisateurNumeroDELETE()
    {
        $ID = Utilisateur::all()->last()['ID'];
        $response = $this->delete(self::PREFIX.'/utilisateur/'.$ID);
        $response->assertStatus(200);
        if(Utilisateur::all()->last()['ID']==$ID){self::fail("L'utilisateur n'a pas été supprimé.");}
    }

    public function testUtilisateurNumeroCommandesGET()
    {
        $ID = Utilisateur::first()['ID'];
        $response = $this->get(self::PREFIX.'/utilisateur/'.$ID.'/commandes');
        $response->assertStatus(200);
    }

}
