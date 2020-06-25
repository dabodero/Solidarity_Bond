<?php

namespace App\Http\Controllers\WEB;

use App\Models\Liker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\CommentaireController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Produit;
use App\Models\Commentaire;


class GeneralController extends Controller
{
    private const nom_dossier = 'general.';

    public function accueil(){

        $top3 = Commentaire::topTroisCommentaires();
       // $title = $produit->Nom;
        return view(self::nom_dossier.'accueil', compact('top3'));

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
        'motif' => $request->motif,
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
