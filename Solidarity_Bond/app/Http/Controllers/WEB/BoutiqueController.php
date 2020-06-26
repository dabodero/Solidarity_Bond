<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Auth\LoginController;
use App\Models\Commande;
use App\Models\Composer;
use App\Models\Produit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Session;
use function GuzzleHttp\Promise\all;

class BoutiqueController extends Controller
{
    private const nom_dossier = 'boutique.';

    /**
     * affichage de la boutique  avec les produits
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function boutique(){
       $produits = Produit::all();
        return view(self::nom_dossier.'boutique', compact('produits'));
    }

    /**
     * affichage des produits dans la page produit
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function produit(Request $request){

        $produit = Produit::find($request->ID_Produit);
        $title = $produit->Nom;
        return view(self::nom_dossier.'produit', compact('produit', 'title'));
    }

    /**
     * affichage du panier
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function panier(){

        $panier = session()->get('panier');
        return view(self::nom_dossier.'panier', compact('panier'));
    }

    /**
     * Permet l'ajout de produits dans le panier  avec une quantité
     * @param Request $request
     */
    public function ajouterAuPanier(Request $request){

        $ID_Produit = $request->ID_Produit;
        if(!session()->has(LoginController::getNomPanier().'.'.__($ID_Produit))){
            session()->put(LoginController::getNomPanier().'.'.__($ID_Produit).'.ID', $ID_Produit);
            session()->put(LoginController::getNomPanier().'.'.__($ID_Produit).'.Nom', $request->Produit);
        }

        if($request->has("Quantite")){
            session()->put(LoginController::getNomPanier().'.'.$ID_Produit.'.'.'Quantite', $request->Quantite);
        } else {
            session()->put(LoginController::getNomPanier() . '.' . __($ID_Produit) . '.Quantite',
                session()->get(LoginController::getNomPanier() . '.' . __($ID_Produit) . '.Quantite') + 1
            );
        }
    }

    /**
     * Permet la suppression d'un produit dans le panier
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function supprimerDuPanier(Request $request){

        $ID_Produit = $request->ID_Produit;
        session()->remove(LoginController::getNomPanier().'.'.__($ID_Produit));
        return back();
    }

    /**
     * Permet de valider la commande et d'inscrire en base de données et de vider le panier
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function validerCommande(Request $request){

        $produits = $request->all();
        unset($produits['_token']);
        $ID_Commande = Commande::create(['ID_Utilisateur'=>Auth::id(), 'Date'=>Carbon::now()->translatedFormat('Y-m-d'), 'Terminee'=>0])->ID;
        foreach($produits as $produit){
            Composer::create(['ID_Produit'=>$produit['ID'], 'ID_Commande'=>$ID_Commande,'Quantite'=>$produit['Quantite']]);
        }
        session()->remove('panier');
        return redirect(route('profil'))->with('commandeValidee', ['titre'=>'État de votre commande', 'message'=>'Votre commande a été prise en compte !<br/>Vous recevrez un mail dès qu\'elle sera prête et que vous pourrez venir la retirer.']);
    }

}
