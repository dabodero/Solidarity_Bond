<?php

namespace App\Http\Controllers\WEB;

use App\Models\Commande;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\API\UtilisateurController;
use Illuminate\Foundation\Auth\User;
use Redirect;

class ProfilController extends Controller
{
    private const nom_dossier = 'profil.';

    public function profil(){
    	$ID = Auth::id();
        $commandesNonTerminees = Commande::commandesNonTerminees()->where('ID_Utilisateur',$ID);
        $commandesTerminees = Commande::commandesTerminees()->where('ID_Utilisateur',$ID);

        return view(self::nom_dossier.'profil', compact('commandesNonTerminees','commandesTerminees'));
    }

    public function deleteUser()
    {
            Auth::user()->delete();
            return Redirect::route('accueil');
    }

    public function updateData(Request $request)
    {
            Auth::user()->update($request->all());
            return back();
    }

}