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

// Controller de test permettant de ne pas modifier le fichier de routes tout en faisant les tests que nous souhaitons

class ProfileController extends Controller
{
    public function ShowDataProfile(){
    	$ID = Auth::user()->ID;
$data = Commande::commandesNonTerminees()->where('ID_Utilisateur',$ID);
$data2 = Commande::commandesTerminees()->where('ID_Utilisateur',$ID);
        $help = $data->first()->Produits;
        $help2 = $data2->first()->Produits;

        return view('profile', compact('data','data2','help','help2'));
	
}

public function deleteUser()
	{
    	$ID = Auth::user()->ID;
		$obj = Utilisateur::find($ID);
		$obj->delete();
		return Redirect::route('accueil');
}
    

public function updateData(Request $request)
{

		$user = Auth::user();
		$user->Nom = $request->input('Nom');
		$user->Prenom = $request->input('Prenom');
		$user->Mail = $request->input('Mail');
		$user->Entreprise = $request->input('Entreprise'); 
		$user->Telephone = $request->input('Telephone');
		$user->SIRET = $request->input('SIRET');
		$user->save();
		return back();



}

}