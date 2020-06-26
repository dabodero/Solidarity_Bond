<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Auth\ValidatorConstants;
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

    /**
     * Affichage du profil en prenant en compte les commandes non terminées et celle qui le son
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profil(){
    	$ID = Auth::id();
        $commandesNonTerminees = Commande::commandesNonTerminees()->where('ID_Utilisateur',$ID);
        $commandesTerminees = Commande::commandesTerminees()->where('ID_Utilisateur',$ID);

        return view(self::nom_dossier.'profil', compact('commandesNonTerminees','commandesTerminees'));
    }

    /**
     * Suppression d'utilisateur avec une redirection sur l'accueil
     * @return mixed
     */
    public function deleteUser()
    {
            Auth::user()->delete();
            return Redirect::route('accueil');
    }

    /**
     * Modification des données personnelles
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateData(Request $request)
    {
        $this->validator($request->all())->validate();
        Auth::user()->update($request->all());
        return back();
    }

    /**
     * Vérification de la modification de données personnelles
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'Nom' => ['required', 'string', 'max:40', function($attribute, $value, $fail){
                if(!preg_match('/^['.ValidatorConstants::REGEX_ALPHABET_AVEC_ACCENTS.']{1,40}$/',$value)){ $fail("Ce champ semble incorrect."); }
            }],
            'Prenom' => ['required', 'string', 'max:40', function($attribute, $value, $fail){
                if(!preg_match('/^['.ValidatorConstants::REGEX_ALPHABET_AVEC_ACCENTS.']{1,40}$/',$value)){ $fail("Ce champ semble incorrect."); }
            }],
            'Entreprise' => ['required', 'string', 'max:100'],
            'Mail' => ['required', 'string', 'max:100'],
            'Telephone' => ['required', 'string', 'max:10', 'regex:/(^(0[1-9])[0-9]{8}$)/'],
        ]);
    }

}
