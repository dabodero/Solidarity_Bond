<?php

namespace App\Http\Controllers\WEB;

use App\Models\Liker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class GeneralController extends Controller
{
    private const nom_dossier = 'general.';

    public function accueil(){
        return view(self::nom_dossier.'accueil');
    }

    public function a_propos(){
        return view(self::nom_dossier.'a-propos');
    }

    public function mentions(){
        return view(self::nom_dossier.'mentions-legales');
    }

    public function contact(){
        return view(self::nom_dossier.'contact');
    }

    public function postContact(Request $request){
    $this->validate($request, [
        'mail'=> 'required|email',
        'motif' => 'required']);

    $data = array(
        'mail' => $request ->mail,
        'motif' => $request->subject,
        'bodyMessage' => $request->message
    );

    Mail::send('emails.contact', $data, function($message) use($data){
        $message->from($data['mail']);
        $message->to('solidaritybondcesilyon@gmail.com');
        $message->subject('Contact : '.$data['motif']);

    });

    return redirect('/')->with('mailEnvoye', ['titre'=>'Votre mail a été envoyé !', 'message'=>'Notre équipe va prendre en compte votre mail.']);
    }

    public function cgv(){
        return view(self::nom_dossier.'cgv');
    }

}
