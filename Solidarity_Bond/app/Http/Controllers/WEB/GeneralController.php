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
        'email'=> 'required|email',
        'subject' => 'min:3',
        'message' => 'min:10']);

    $data = array(
        'email' => $request ->email,
        'subject' => $request->subject,
        'bodyMessage' => $request->message
    );

    Mail::send('emails.contact', $data, function($message) use($data){
        $message ->from($data['email']);
        $message->to('contact@solidaritybond.fr');
        $message->subject($data['subject']);

    });
    return redirect('/');
    }

    public function cgv(){
        return view(self::nom_dossier.'cgv');
    }

}
