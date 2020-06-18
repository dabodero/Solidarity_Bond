<?php

namespace App\Http\Controllers\WEB;

use App\Models\Commande;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\API\UtilisateurController;


// Controller de test permettant de ne pas modifier le fichier de routes tout en faisant les tests que nous souhaitons

class ProfileController extends Controller
{
    public function ShowDataProfile(){
    	$ID = Auth::user()->ID;
        $data = Commande::commandesNonTerminees()->where('ID_Utilisateur',$ID);
        //dd($data);

request()->validate
		([
			'Nom'=>'required',
			//'Prenom'=>'required',
		]);

		// define variables
		$Nom = request()->Nom;
	//	$Prenom = request()->Prenom;
    

    		//dd($Nom);
        	$response = Http::get('http://127.0.0.1:8000/api/utilisateur')->update(['Nom'=>$Nom]);

        return view('profile', compact('data'));

        // get post
	
}
}

		//dd($response);

		//$obj = Utilisateur::update(['Nom'=>$Nom]);
		//return redirect('/profile'); */
    

  