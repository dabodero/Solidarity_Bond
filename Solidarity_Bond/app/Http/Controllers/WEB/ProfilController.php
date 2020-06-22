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
use Illuminate\Support\Facades\Validator;
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
        $this->validator($request->all())->validate();
        Auth::user()->update($request->all());
        return back();
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'Nom' => ['required', 'string', 'max:40', function($attribute, $value, $fail){
                if(!preg_match('/^[A-Za-z]{1,40}$/',$value)){ $fail("Ce champ semble incorrect."); }
            }],
            'Prenom' => ['required', 'string', 'max:40', function($attribute, $value, $fail){
                if(!preg_match('/^[A-Za-z]{1,40}$/',$value)){ $fail("Ce champ semble incorrect."); }
            }],
            'Entreprise' => ['required', 'string', 'max:100'],
            'Mail' => ['required', 'string', 'email', 'max:100'],
            'Telephone' => ['required', 'string', 'max:10', 'regex:/(^(0[1-9])[0-9]{8}$)/'],
            'SIRET' => ['required', 'string', 'regex:/^[0-9]{14}$/']
        ]);
    }

}
