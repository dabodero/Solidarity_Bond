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
     * Create a new message instance.
     *
     * @param infos
     * @return void
     */
    public function __construct($commande)
    {
        $this->commande = $commande;
    }

    /**
     * Build the message.
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
