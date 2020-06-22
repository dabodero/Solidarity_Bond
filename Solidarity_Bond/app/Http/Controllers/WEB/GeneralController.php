<?php

namespace App\Http\Controllers\WEB;

use App\Models\Liker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class GeneralController extends Controller
{
    public function accueil(){
        return view('accueil');
    }

    public function a_propos(){
        return view('a-propos');
    }

    public function mentions(){
        return view('mentions');
    }

    public function contact(){
        return view('contact');
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

    }

    public function cgv(){
        return view('cgv');
    }

    public function partenaires(){
        return view('partenaires');
    }

    public function liker(Request $request){
        $like = Liker::where([['ID_Utilisateur','=', Auth::id()], ['ID_Commentaire', '=', $request->ajoutLike]])->first();
        if($like==null){
            Liker::create([
                "ID_Utilisateur" => Auth::id(),
                "ID_Commentaire" => $request->ajoutLike
            ]);
        } else {
            $like->delete();
        };
        return back();
    }

}
