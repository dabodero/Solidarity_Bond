<?php

namespace Tests\Unit;



use App\Models\Utilisateur;
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
        $response->assertStatus(302);
        $response = $this->post(route('envoimail'));
        $response->assertStatus(302);
    }

    public function testProfilGET()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testProfilDeleteUserPOST()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testProfilUpdateDataPOST()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testFablabGET()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testBoutiqueGET()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testProduitGET()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testPanierGET()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

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

}
