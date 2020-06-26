<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetMotDePasse extends Mailable
{
    use Queueable, SerializesModels;

    private $token;

    /**
     * Crée une nouvelle instance du mail pour redéfinir son mot de passe.
     *
     * @param infos
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Prépare le mail
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.mailers.smtp.username'))
                    ->subject('Redéfinition de votre mot de passe')
                    ->view('emails.reset')
                    ->with(['token' => $this->token]);
    }
}
