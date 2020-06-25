<?php

namespace Tests\Unit;



use App\Models\Photo;
use App\Models\Produit;
use App\Models\Role;
use App\Models\Utilisateur;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WEBRoutesTest extends TestCase
{

    public function testAccueilGET()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response = $this->get(route('accueil'));
        $response->assertStatus(200);
    }

    public function testAProposGET()
    {
        $response = $this->get('/a-propos');
        $response->assertStatus(200);
        $response = $this->get(route('a-propos'));
        $response->assertStatus(200);
    }

    public function testMentionsLegalesGET()
    {
        $response = $this->get('/mentions-legales');
        $response->assertStatus(200);
        $response = $this->get(route('mentions-legales'));
        $response->assertStatus(200);
    }

    public function testCGVGET()
    {
        $response = $this->get('/cgv');
        $response->assertStatus(200);
        $response = $this->get(route('cgv'));
        $response->assertStatus(200);
    }

    public function testContactGET()
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
        $response = $this->get(route('contact'));
        $response->assertStatus(200);
    }

    public function testContactPOST()
    {
        $response = $this->post('/contact');
        $response->assertRedirect('/');
        $response = $this->post(route('envoimail'));
        $response->assertRedirect('/');
    }

    public function testProfilGET()
    {
        $response = $this->get('/profil');
        $response->assertStatus(302);
        $response = $this->get(route('profil'));
        $response->assertStatus(302);
    }

    public function testProfilConnecteGET()
    {
        $utilisateur = factory(Utilisateur::class)->make()->first();
        $response = $this->actingAs($utilisateur)->get('/profil');
        $response->assertStatus(200);
        $response = $this->actingAs($utilisateur)->get(route('profil'));
        $response->assertStatus(200);
    }

    public function testProfilDeleteUserPOST()
    {
        $response = $this->post('/profil/deleteUser');
        $response->assertRedirect(route('login'));
        $response = $this->post(route('deleteUser'));
        $response->assertRedirect(route('login'));
    }

    public function testProfilDeleteUserConnectePOST()
    {
        $utilisateur = factory(Utilisateur::class)->create();
        $response = $this->actingAs($utilisateur)->post('/profil/deleteUser');
        $response->assertRedirect();
        if(Utilisateur::find($utilisateur->ID)!=null){self::fail("L'utilisateur n'a pas été supprimé.");}
        $utilisateur = factory(Utilisateur::class)->create();
        $response = $this->actingAs($utilisateur)->post(route('deleteUser'));
        $response->assertRedirect();
        if(Utilisateur::find($utilisateur->ID)!=null){self::fail("L'utilisateur n'a pas été supprimé.");}
    }

    public function testProfilUpdateDataPOST()
    {
        $response = $this->post('/profil/updateData');
        $response->assertRedirect(route('login'));
        $response = $this->post(route('updateData'));
        $response->assertRedirect(route('login'));
    }

    public function testProfilUpdateDataConnectePOST()
    {
        $utilisateur = Utilisateur::first();
        $response = $this->actingAs($utilisateur)->post('/profil/updateData'.'?Nom=Test&Prenom=Test&Mail=test@test.test&Entreprise=Test&Telephone=0600000000');
        if((Utilisateur::find($utilisateur->ID))['Nom']!='Test'){self::fail("Le nom de l'utilisateur n'a pas été changé.");}
        $response->assertRedirect();
        $response = $this->actingAs($utilisateur)->post(route('updateData'), ['Nom'=>'Testing', 'Prenom'=>'Testing', 'Mail'=>'testing@testing.testing', 'Entreprise'=>'Testing', 'Telephone'=>'0606060606']);
        if((Utilisateur::find($utilisateur->ID))['Nom']!='Testing'){self::fail("Le nom de l'utilisateur n'a pas été changé.");}
        $response->assertRedirect();
    }

    public function testFablabGET()
    {
        $response = $this->get('/fablab');
        $response->assertStatus(302);
        $response = $this->get(route('fablab'));
        $response->assertStatus(302);
    }

    public function testFablabConnecteClientGET()
    {
        $utilisateur = factory(Utilisateur::class, 1)->states('Client')->make()->first();
        $response = $this->actingAs($utilisateur)->get('/fablab');
        $response->assertStatus(404);
        $response = $this->actingAs($utilisateur)->get(route('fablab'));
        $response->assertStatus(404);
    }

    public function testFablabConnecteFablabGET()
    {
        $utilisateur = factory(Utilisateur::class, 1)->states('Fablab')->make()->first();
        $response = $this->actingAs($utilisateur)->get('/fablab');
        $response->assertStatus(200);
        $response = $this->actingAs($utilisateur)->get(route('fablab'));
        $response->assertStatus(200);
    }

    public function testBoutiqueGET()
    {
        $response = $this->get('/boutique');
        $response->assertStatus(200);
        $response = $this->get(route('boutique'));
        $response->assertStatus(200);
    }

    public function testProduitGET()
    {
        $response = $this->get('/boutique/produit/1');
        $response->assertStatus(200);
        $response = $this->get(route('produit', 1));
        $response->assertStatus(200);
    }

    public function testPanierGET()
    {
        $response = $this->get('/boutique/panier');
        $response->assertRedirect(route('login'));
        $response = $this->get(route('panier'));
        $response->assertRedirect(route('login'));
    }

    public function testPanierConnecteGET()
    {
        $utilisateur = factory(Utilisateur::class, 1)->states('Client')->make()->first();
        $response = $this->actingAs($utilisateur)->get('/boutique/panier');
        $response->assertStatus(200);
        $response = $this->actingAs($utilisateur)->get(route('panier'));
        $response->assertStatus(200);
    }

    public function testAjoutPanierPOST()
    {
        $response = $this->post('/boutique/panier'.'?ID=1&Nom=Vitre de Protection&Quantite=1');
        $response->assertRedirect(route('login'));
    }

    public function testAjoutPanierConnectePOST()
    {
        $utilisateur = Utilisateur::first();
        $response = $this->actingAs($utilisateur)->post('/boutique/panier'.'?ID=1&Nom=Vitre de Protection&Quantite=1');
        $response->assertStatus(200);
        $response->assertSessionHas('panier');
        $response = $this->actingAs($utilisateur)->post(route('ajouterAuPanier'), ['ID'=>2, 'Nom'=>'Attache', 'Quantite'=>2]);
        $response->assertStatus(200);
        $response->assertSessionHas('panier');
    }
    
}
