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

    /**
     * Affichage de la page accueil avec les 3 commentaires les plus populaires
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function accueil(){

        $top3 = Commentaire::topTroisCommentaires();
       // $title = $produit->Nom;
        return view(self::nom_dossier.'accueil', compact('top3'));

    }

    /**
     * Affichage de la page a-propos
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function a_propos(){
        return view(self::nom_dossier.'a-propos');
    }

    /**
     * Affichage de la page mentions-legales
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function mentions(){
        return view(self::nom_dossier.'mentions-legales');
    }

    /**
     * Affichage de la page contact
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact(){
        return view(self::nom_dossier.'contact');
    }

    /**
     * Validation du formulaire de contact et envoi à l'adresse solidaritybondcesilyon@gmail.com
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
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

    /**
     * Affichage des cgv
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cgv(){
        return view(self::nom_dossier.'cgv');
    }

}
