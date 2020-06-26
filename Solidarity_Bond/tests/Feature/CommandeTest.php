<?php

namespace Tests\Feature;

use App\Mail\CommandeTerminee;
use App\Models\Commande;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class CommandeTest extends TestCase
{

    public function testTerminer()
    {
       Mail::fake();
       $commande = factory(Commande::class)->create();
       $commande->terminer();
       Mail::assertSent(CommandeTerminee::class, 1);
    }
}
