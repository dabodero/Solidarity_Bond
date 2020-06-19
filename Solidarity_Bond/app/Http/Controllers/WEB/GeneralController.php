<?php

namespace App\Http\Controllers\WEB;

use App\Models\Liker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
