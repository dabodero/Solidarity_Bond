<?php

namespace Tests\Unit;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Utilisateur;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRedirectionAfterLogin()
    {           

  $user = factory(Utilisateur::class)->make();

        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect('/profil');

    }

    public function testFormOnContact()
{
    $this->get('/contact')
        ->assertSee('form');
}
	


	    public function test_user_cannot_login_with_incorrect_password()
    {
        $user = factory(Utilisateur::class)->create([
        	'Mail' => 'lois.cebe@gmail.com',
            'MotDePasse' => 'i-love-laravel',
        ]);
        
        $response = $this->from('/login')->post('/login', [
            'Mail' => $user->Mail,
            'password' => 'invalid-password',
        ]);
        
        $response->assertRedirect('/login');
       
    }
}

 

