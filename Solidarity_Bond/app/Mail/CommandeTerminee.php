<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommandeTerminee extends Mailable
{
    use Queueable, SerializesModels;

    private $commande;

    /**
     * Crée une nouvelle instance du mail de commande terminée.
     *
     * @param infos
     * @return void
     */
    public function __construct($commande)
    {
        $this->commande = $commande;
    }

    /**
     * Prépare le mail.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.mailers.smtp.username'))
                    ->subject('Votre commande est terminée !')
                    ->view('emails.commandeTerminee')
                    ->with(['commande' => $this->commande]);
    }
}
