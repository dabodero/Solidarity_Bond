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
    //use RefreshDatabase;

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
/*
    public function testContactPOST()
    {
        $response = $this->post('/contact');
        $response->assertStatus(302);
        $response = $this->post(route('envoimail'));
        $response->assertStatus(302);
    }
*/
    public function testProfilGET()
    {
        $response = $this->get('/profil');
        $response->assertStatus(302);
        $response = $this->get(route('profil'));
        $response->assertStatus(302);
    }

    public function testProfilConnecteGET()
    {
        $this->createRoles();
        $utilisateur = factory(Utilisateur::class)->make()->first();
        $response = $this->actingAs($utilisateur)->get('/profil');
        $response->assertStatus(200);
        $response = $this->actingAs($utilisateur)->get(route('profil'));
        $response->assertStatus(200);
    }

    public function testProfilDeleteUserPOST()
    {
        $response = $this->post('/profil/deleteUser');
        $response->assertStatus(302);
        $response = $this->post(route('deleteUser'));
        $response->assertStatus(302);
    }
/*
    public function testProfilDeleteUserConnectePOST()
    {
        $this->createRoles();
        $utilisateur = factory(Utilisateur::class)->create();
        $response = $this->actingAs($utilisateur)->post('/profil/deleteUser');
        $response->assertStatus(200);
        if(Utilisateur::find($utilisateur)->get()==$utilisateur){fail("L'utilisateur n'a pas été supprimé.");}
        $utilisateur = factory(Utilisateur::class)->create();
        $response = $this->actingAs($utilisateur)->post(route('deleteUser', [$utilisateur]));
        $response->assertStatus(200);
        if(Utilisateur::find($utilisateur)->get()==$utilisateur){fail("L'utilisateur n'a pas été supprimé.");}
    }

    public function testProfilUpdateDataPOST()
    {
        $this->createRoles();
        $utilisateur = factory(Utilisateur::class)->create();
        $response = $this->actingAs($utilisateur)->post('/profil/updateData');
        $response->assertStatus(200);
    }
*/
    public function testFablabGET()
    {
        $response = $this->get('/fablab');
        $response->assertStatus(302);
        $response = $this->get(route('fablab'));
        $response->assertStatus(302);
    }

    public function testFablabConnecteGET()
    {
        $utilisateur = factory(Utilisateur::class, 1)->states('Fablab')->make()->first();
        $response = $this->actingAs($utilisateur)->get('/fablab');
        $response->assertStatus(200);
        $response = $this->actingAs($utilisateur)->get(route('fablab'));
        $response->assertStatus(200);
    }

    public function testBoutiqueGET()
    {
//        factory(Produit::class, 1)->states('Vitre')->create();
//        factory(Photo::class,2)->states('Vitre')->create();
        $response = $this->get('/boutique');
        $response->assertStatus(200);
        $response = $this->get(route('boutique'));
        $response->assertStatus(200);
    }

    public function testProduitGET()
    {
//        factory(Produit::class, 1)->states('Vitre')->create();
//        factory(Photo::class,1)->states('Vitre')->create();
        $response = $this->get('/boutique/produit/1');
        $response->assertStatus(200);
        $response = $this->get(route('produit', 1));
        $response->assertStatus(200);
    }

    public function testPanierGET()
    {
        $response = $this->get('/boutique/panier');
        $response->assertStatus(302);
        $response = $this->get(route('panier'));
        $response->assertStatus(302);
    }

    public function testPanierConnecteGET()
    {
        $utilisateur = factory(Utilisateur::class, 1)->states('Client')->make()->first();
        $response = $this->actingAs($utilisateur)->get('/boutique/panier');
        $response->assertStatus(200);
        $response = $this->actingAs($utilisateur)->get(route('panier'));
        $response->assertStatus(200);
    }
/*
    public function testAjoutPanierPOST()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testSupprimerDuPanierPOST()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testValiderPanierPOST()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
*/
    private function createRoles(){
        factory(Role::class, 3)->create();
    }

}
