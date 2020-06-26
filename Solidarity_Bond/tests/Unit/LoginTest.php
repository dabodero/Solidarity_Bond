<?php

namespace Tests\Unit;

use App\User;
use App\Models\Utilisateur;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
   public function testRedirectionAfterLogin()
    {           

  $user = factory(Utilisateur::class)->make();

        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect('/profil');

    }
    public function test_user_cannot_login_with_incorrect_password()
    {
        $user = factory(Utilisateur::class)->create([
        	'Mail' => 'lodi5h5s.cebe@gmail.com',
            'MotDePasse' => 'password-valide',
        ]);
        
        $response = $this->from('/login')->post('/login', [
            'Mail' => $user->Mail,
            'password' => 'invalid-password',
        ]);
        
        $response->assertRedirect('/login'); //Vérifie qu'on est bien toujours sur la page de login
        $this->assertTrue(session()->hasOldInput('Mail')); //Vérifie que le champs à bien reçu une entrée précedemment
        $this->assertFalse(session()->hasOldInput('MotDePasse')); //Vérifie que le champs à bien reçu une entrée précedemment
        $this->assertGuest(); // Vérifie que l'utilisateur n'est pas authentifier, qu'il est toujours un guest
       
    }
}
